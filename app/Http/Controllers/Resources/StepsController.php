<?php
/**
 * busca-ativa-escolar-api
 * StepsController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 08/01/2017, 01:29
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use BuscaAtivaEscolar\CaseSteps\CaseStep;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Scopes\TenantScope;
use BuscaAtivaEscolar\Search\Search;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Transformers\StepTransformer;
use BuscaAtivaEscolar\Transformers\UserTransformer;
use BuscaAtivaEscolar\User;

class StepsController extends BaseController {

	public function show($step_type, $step_id) {

		try {
			$step = CaseStep::fetch($step_type, $step_id);

			return fractal()
				->item($step)
				->transformWith(new StepTransformer())
				->serializeWith(new SimpleArraySerializer())
				->parseIncludes(request('with'))
				->respond();

		} catch (\Exception $ex) {
			return response()->json(['status' => 'error', 'reason' => $ex->getMessage()]);
		}
	}

	public function update($step_type, $step_id) {
		try {

			$data = request()->all();

			$step = CaseStep::fetch($step_type, $step_id);
			$validation = $step->validate($data);

			if($validation->fails()) return $this->api_validation_failed('validation_failed', $validation);

			$input = $step->setFields($data);

			return response()->json(['status' => 'ok', 'updated' => $input]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function complete($step_type, $step_id) {

		try {

			$step = CaseStep::fetch($step_type, $step_id);

			if($step->is_completed) return response()->json(['status' => 'error', 'reason' => 'step_already_completed']);
			if(!$step->assigned_user_id) return response()->json(['status' => 'error', 'reason' => 'no_assigned_user']);

			$validation = $step->validate($step->toArray(), true);

			if($validation->fails()) return $this->api_validation_failed('validation_failed', $validation);

			$next = $step->complete();

			// TODO: $step->canBeCompletedBy(Auth::user());

			if(!$next) return response()->json(['status' => 'ok', 'hasNext' => false]);

			return response()->json([
				'status' => 'ok',
				'hasNext' => true,
				'nextStep' => fractal()
					->item($next)
					->transformWith(new StepTransformer())
					->serializeWith(new SimpleArraySerializer())
			]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}

	}

	public function getAssignableUsers($step_type, $step_id) {
		try {
			$step = CaseStep::fetch($step_type, $step_id);

			$query = User::withoutGlobalScope(TenantScope::class)->orderBy('type', 'ASC');
			$query = $step->applyAssignableUsersFilter($query);

			$query->where(function($q) use ($step) {
				return $q // Allow both tenant users or state agent users
					->where('tenant_id', $step->tenant_id)
					->orWhereRaw('(tenant_id IS NULL AND uf = ?)', [$step->tenant->uf]);
			});

			$users = $query->get();

			return fractal()
				->collection($users, new UserTransformer(), 'users')
				->serializeWith(new SimpleArraySerializer())
				->respond();

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function assignUser($step_type, $step_id, Search $search) {
		try {
			$user = User::withoutGlobalScope(TenantScope::class)->findOrFail(request('user_id'));
			$step = CaseStep::fetch($step_type, $step_id);

			$step->assignToUser($user);

			// TODO: fix assignment not reindexing

			return response()->json(['status' => 'ok', 'user' => fractal()->item($user, new UserTransformer())]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

}