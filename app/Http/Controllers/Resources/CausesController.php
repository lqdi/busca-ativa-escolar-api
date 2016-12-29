<?php
/**
 * busca-ativa-escolar-api
 * CausesController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 28/12/2016, 20:33
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use BuscaAtivaEscolar\Data\AlertCause;
use BuscaAtivaEscolar\Data\CaseCause;
use BuscaAtivaEscolar\Http\Controllers\BaseController;

class CausesController extends BaseController  {

	public function alert_causes() {
		$causes = AlertCause::getAllAsArray();
		return response()->json(['alert_causes' => $causes]);
	}

	public function case_causes() {
		$causes = CaseCause::getAllAsArray();
		return response()->json(['case_causes' => $causes]);
	}

}