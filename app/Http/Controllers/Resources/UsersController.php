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
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Transformers\UserTransformer;
use BuscaAtivaEscolar\User;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class UsersController extends BaseController {

	public function search() {
		$query = User::with('group');

		if(!Auth::user()->isRestrictedToTenant() && request()->has('tenant_id')) {
			$query->where('tenant_id', request('tenant_id'));
		}

		if(request()->has('group_id')) $query->where('group_id', request('group_id'));
		if(request()->has('type')) $query->where('type', request('type'));
		if(request()->has('email')) $query->where('email', 'LIKE', request('email') . '%');

		if(request('show_suspended', false)) $query->withTrashed();

		$max = intval(request('max', 128));
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
			$input = request()->except(['email']);

			$validation = $user->validate($input, false);

			if($validation->fails()) return $this->api_validation_failed('validation_failed', $validation);

			if(isset($input['password'])) {
				$input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
			}

			$user->update($input);

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

			$validation = $user->validate($input, true);

			if($validation->fails()) return $this->api_validation_failed('validation_failed', $validation);

			$input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);

			$user->fill($input);
			$user->save();

			return response()->json(['status' => 'ok', 'id' => $user->id]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function destroy(User $user) {
		try {
			$user->delete(); // Soft-deletes internally
		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function restore($user_id) {
		try {
			$user = User::withTrashed()->findOrFail($user_id);
			$user->restore();
		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

}