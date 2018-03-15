<?php
/**
 * busca-ativa-escolar-api
 * UsersController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 18/01/2017, 18:36
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use Auth;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Mailables\StateUserRegistered;
use BuscaAtivaEscolar\Mailables\UserRegistered;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Transformers\UserTransformer;
use BuscaAtivaEscolar\User;
use Excel;
use Exception;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Mail;

class UsersController extends BaseController {

	public function search() {
		$query = User::with('group');

		// If user is global user, they can filter by tenant_id
		if(!$this->currentUser()->isRestrictedToTenant() && request()->has('tenant_id')) {
			$query->where('tenant_id', request('tenant_id'));
		} else {
			$query->where('tenant_id', '!=', 'global');
		}


		// If user is UF-bound, they can only see other UF-bound users in their UF
		if($this->currentUser()->isRestrictedToUF()) {
			$query->where('uf', $this->currentUser()->uf);
			$query->whereIn('type', [User::TYPE_GESTOR_ESTADUAL, User::TYPE_SUPERVISOR_ESTADUAL]);
		}

		if(request()->has('group_id')) $query->where('group_id', request('group_id'));
		if(request()->has('type')) $query->where('type', request('type'));
		if(request()->has('email')) $query->where('email', 'LIKE', request('email') . '%');

		if(request('show_suspended', false)) $query->withTrashed();

		if(request()->has('sort')) {
			User::applySorting($query, request('sort', []));
		}

		$max = request('max', 128);
		if($max > 128) $max = 128;
		if($max < 16) $max = 16;

		$paginator = $query->paginate($max);
		$collection = $paginator->getCollection();

		return fractal()
			->collection($collection)
			->transformWith(new UserTransformer('short'))
			->serializeWith(new SimpleArraySerializer())
			->paginateWith(new IlluminatePaginatorAdapter($paginator))
			->parseIncludes(request('with'))
			->respond();
	}

	public function export() {
		$query= User::query()
			->with(['group', 'tenant'])
			->withTrashed()
			->orderBy('name', 'ASC');

		// If user is UF-bound, they can only see other UF-bound users in their UF
		if($this->currentUser()->isRestrictedToUF()) {
			$query->where('uf', $this->currentUser()->uf);
			$query->whereIn('type', [User::TYPE_GESTOR_ESTADUAL, User::TYPE_SUPERVISOR_ESTADUAL]);
		}

		$users = $query
			->get()
			->map(function ($user) { /* @var $user User */
				return $user->toExportArray();
			})
			->toArray();

		Excel::create('buscaativaescolar_users', function($excel) use ($users) {

			$excel->sheet('users', function($sheet) use ($users) {

				$sheet->setOrientation('landscape');
				$sheet->fromArray($users);

			});

		})->export('xls');
	}

	public function show(User $user) {

		return fractal()
			->item($user)
			->transformWith(new UserTransformer('long'))
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();
	}

	public function update(User $user) {
		try {

			// Here we check if we have enough permission to edit the target user
			if(!Auth::user()->canManageUser($user)) {
				return $this->api_failure('not_enough_permissions');
			}

			$input = request()->all();

			if($input['email'] === $user->email) {
				unset($input['email']);
			}

			if(Auth::user()->isRestrictedToTenant()) {
				$input['tenant_id'] = Auth::user()->tenant_id;
			}

			$isTenantUser = in_array($input['type'] ?? '', User::$TENANT_SCOPED_TYPES);
			$isUFUser = in_array($input['type'] ?? '', User::$UF_SCOPED_TYPES);

			$validation = $user->validate($input, false, $isTenantUser, $isUFUser);

			if($validation->fails()) {
				return $this->api_validation_failed('validation_failed', $validation);
			}

			if(isset($input['password'])) {
				$input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
			}

			$user->fill($input);

			if(!$user->tenant_id && in_array($user->type, User::$TENANT_SCOPED_TYPES)) {
				throw new Exception("tenant_id_inconsistency");
			}

			// Here we check if we have enough permission to set the target user to this new state
			if(!Auth::user()->canManageUser($user)) {
				return $this->api_failure('not_enough_permissions');
			}

			$user->save();

			if(!$user->uf && $user->tenant_id) {
				$user->uf = $user->tenant->uf;
				$user->save();
			}

			return response()->json(['status' => 'ok', 'updated' => $input]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function store() {
		try {

			$user = new User();
			$input = request()->all();

			if(Auth::user()->isRestrictedToTenant()) {
				$input['tenant_id'] = Auth::user()->tenant_id;
			}

			$isTenantUser = in_array($input['type'] ?? '', User::$TENANT_SCOPED_TYPES);
			$isUFUser = in_array($input['type'] ?? '', User::$UF_SCOPED_TYPES);

			$validation = $user->validate($input, true, $isTenantUser, $isUFUser);

			if($validation->fails()) {
				return $this->api_validation_failed('validation_failed', $validation);
			}

			$initialPassword = $input['password'];

			$input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);

			$user->fill($input);

			if(!$user->tenant_id && in_array($user->type, User::$TENANT_SCOPED_TYPES)) {
				throw new Exception("tenant_id_inconsistency");
			}
			
			// Check if the resulting user can be created by the current user
			if(!Auth::user()->canManageUser($user)) {
				return $this->api_failure('not_enough_permissions');
			}

			$user->save();

			if(!$user->uf && $user->tenant_id) {
				$user->uf = $user->tenant->uf;
				$user->save();
			}

			if($user->tenant) {
				Mail::to($user->email)->send(new UserRegistered($user->tenant, $user, $initialPassword));
			} else if($isUFUser) {
				Mail::to($user->email)->send(new StateUserRegistered($user->uf, $user, $initialPassword));
			}

			return response()->json(['status' => 'ok', 'id' => $user->id]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function destroy(User $user) {

		if(!Auth::user()->canManageUser($user)) {
			return $this->api_failure('not_enough_permissions');
		}

		try {
			$user->delete(); // Soft-deletes internally
		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function restore($user_id) {
		try {
			$user = User::withTrashed()->findOrFail($user_id);

			if(!Auth::user()->canManageUser($user)) {
				return $this->api_failure('not_enough_permissions');
			}

			$user->restore();
		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

}