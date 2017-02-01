<?php
/**
 * busca-ativa-escolar-api
 * ReportsController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 01/02/2017, 17:22
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use Auth;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Reports\Reports;
use BuscaAtivaEscolar\Search\ElasticSearchQuery;

class ReportsController extends BaseController {

	public function query_children(Reports $reports) {

		$params = request()->all();

		// Scope the query within the tenant
		if(Auth::user()->isRestrictedToTenant()) $params['tenant_id'] = Auth::user()->tenant_id;

		$entity = new Child();
		$query = ElasticSearchQuery::withParameters($params)
			->filterByTerm('tenant_id', false)
			->filterByTerms('risk_level', $params['risk_level_null'] ?? false)
			->filterByTerms('gender',$params['gender_null'] ?? false)
			->filterByTerms('place_kind',$params['place_kind_null'] ?? false)
			->filterByRange('age',$params['age_null'] ?? false);


		$index = ($params['view'] == 'linear') ? $entity->getAggregationIndex() : $entity->getTimeSeriesIndex();
		$type = ($params['view'] == 'linear') ? $entity->getAggregationType() : $entity->getTimeSeriesType();

		try {
			$response = $reports->query($index, $type, $params['dimension'], $query);
		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}

		// TODO: return with Fractal transformation

		return response()->json([
			'query' => $query,
			'response' => $response
		]);
	}

}