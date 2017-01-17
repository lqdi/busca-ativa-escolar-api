<?php
/**
 * busca-ativa-escolar-api
 * ChildrenController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 30/12/2016, 16:16
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use Auth;
use BuscaAtivaEscolar\CaseSteps\Alerta;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\Transformers\ChildTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ChildrenController extends BaseController  {

	public function index() {
		$paginator = Child::with('cases')->paginate(64);
		$collection = $paginator->getCollection();

		// TODO: child searching

		return fractal()
			->collection($collection)
			->transformWith(new ChildTransformer)
			->paginateWith(new IlluminatePaginatorAdapter($paginator))
			->excludeCases()
			->respond();
	}

	public function show(Child $child) {

		return fractal()
			->item($child)
			->transformWith(new ChildTransformer)
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();
	}

	public function store() {

		try {
			$user = Auth::user();
			$tenant = $user->isRestrictedToTenant() ? $user->tenant : Tenant::findOrFail(request('tenant_id'));

			$data = request()->toArray();
			$validation = (new Alerta())->validate($data);

			if($validation->fails()) {
				return response()->json(['status' => 'error', 'reason' => 'validation_failed', 'fields' => $validation->failed()]);
			}

			$child = Child::spawnFromAlertData($tenant, $user->id, $data);

			return response()->json([
				'status' => 'ok',
				'tenant_id' => $tenant->id,
				'child_id' => $child->id,
			]);

		} catch (\Exception $ex) {
			return response()->json(['status' => 'error', 'error' => 'child_spawn_failed', 'reason' => $ex->getMessage()], 500);
		}

	}

}