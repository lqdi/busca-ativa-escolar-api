<?php
/**
 * busca-ativa-escolar-api
 * StaticDataController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 10/01/2017, 18:31
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;

use BuscaAtivaEscolar\Http\Controllers\BaseController;

class StaticDataController extends BaseController {

	public function render() {

		// TODO: cache this

		return response()->json([
			'version' => 'latest',
			'timestamp' => date('Y-m-d\TH:i:s'),
			'data' => [
				'AlertCause' => \BuscaAtivaEscolar\Data\AlertCause::getAllAsArray(),
				'CaseCause' => \BuscaAtivaEscolar\Data\CaseCause::getAllAsArray(),
				'Gender' => \BuscaAtivaEscolar\Data\Gender::getAllAsArray(),
				'HandicappedRejectReason' => \BuscaAtivaEscolar\Data\HandicappedRejectReason::getAllAsArray(),
				'IncomeRange' => \BuscaAtivaEscolar\Data\IncomeRange::getAllAsArray(),
				'Race' => \BuscaAtivaEscolar\Data\Race::getAllAsArray(),
				'SchoolGrade' => \BuscaAtivaEscolar\Data\SchoolGrade::getAllAsArray(),
				'SchoolingLevel' => \BuscaAtivaEscolar\Data\SchoolingLevel::getAllAsArray(),
				'WorkActivity' => \BuscaAtivaEscolar\Data\WorkActivity::getAllAsArray(),
				'Config' => [
					'uploads' => [
						'allowed_mime_types' => config('uploads.allowed_mime_types'),
					]
				],
			]
		]);

	}

}