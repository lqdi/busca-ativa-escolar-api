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


use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Tenant;

class TenantsController extends BaseController  {

	public function show(Tenant $tenant) {
		return response()->json($tenant);
	}

}