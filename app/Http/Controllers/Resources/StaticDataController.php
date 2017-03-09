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
use Route;

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
				'UserType' => \BuscaAtivaEscolar\User::$ALLOWED_TYPES,
				'CaseStepSlugs' => \BuscaAtivaEscolar\CaseSteps\CaseStep::SLUGS,
				'UFs' => \BuscaAtivaEscolar\IBGE\UF::getAllAsArray(),
				'Regions' => \BuscaAtivaEscolar\IBGE\Region::getAllAsArray(),
				'APIEndpoints' => $this->buildAPIEndpointList(),
				'CaseCancelReasons' => \BuscaAtivaEscolar\ChildCase::CANCEL_REASONS,
				'Config' => [
					'uploads' => [
						'allowed_mime_types' => config('uploads.allowed_mime_types'),
					]
				],
			]
		]);

	}

	public function buildAPIEndpointList() {
		$methods = Route::getRoutes()->getRoutesByMethod();
		$list = [];

		$prefix = 'api/v1/';

		foreach($methods as $method => $routes) {
			if($method == "HEAD") continue;
			if($method == "PATCH") continue;
			if($method == "OPTIONS") continue;

			foreach($routes as $route) {
				$path = $route->getPath();
				if(substr($path, 0, 7) !== $prefix) continue;

				$path = substr($path, 7);

				array_push($list, [
					'name' => "{$method} {$path}",
					'method' => $method,
					'path' => $path,
					'action' => $route->getAction()
				]);
			}
		}

		return $list;
	}

}