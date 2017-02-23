<?php
/**
 * busca-ativa-escolar-api
 * TenantsController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 28/12/2016, 21:12
 */

namespace BuscaAtivaEscolar\Http\Controllers\Tenants;


use BuscaAtivaEscolar\ActivityLog;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\Transformers\LogEntryTransformer;
use BuscaAtivaEscolar\Transformers\TenantTransformer;

class TenantsController extends BaseController  {

	public function index() {
		$tenants = Tenant::all();

		return fractal()
			->collection($tenants)
			->transformWith(new TenantTransformer())
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes('city') // Does not include user info
			->respond();
	}

	public function all() {
		$tenants = Tenant::all();

		return fractal()
			->collection($tenants)
			->transformWith(new TenantTransformer())
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();
	}

	public function show(Tenant $tenant) {
		return response()->json($tenant);
	}

	public function get_recent_activity() {
		$max = max(1, min(32, intval(request('max'))));
		$recentActivity = ActivityLog::fetchRecentEntries(null, $max, true);

		return fractal()
			->collection($recentActivity)
			->transformWith(new LogEntryTransformer())
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();
	}

}