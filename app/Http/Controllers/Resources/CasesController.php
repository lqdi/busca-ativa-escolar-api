<?php
/**
 * busca-ativa-escolar-api
 * CasesController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 30/12/2016, 16:22
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use BuscaAtivaEscolar\ChildCase;
use BuscaAtivaEscolar\Http\Controllers\BaseController;

class CasesController extends BaseController  {

	public function show(ChildCase $case) {
		return response()->json($case);
	}

}