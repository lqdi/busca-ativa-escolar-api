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
		$filters = request('filters', []);

		// Scope the query within the tenant
		if(Auth::user()->isRestrictedToTenant()) $filters['tenant_id'] = Auth::user()->tenant_id;

		$entity = new Child();
		$query = ElasticSearchQuery::withParameters($filters)
			->filterByTerm('tenant_id', false)
			//->filterByTerms('deadline_status', false)
			//->filterByTerms('case_status', false)
			->filterByTerms('alert_status', false)
			->filterByTerm('step_slug',false)
			->filterByTerm('case_cause_ids',false)
			->filterByTerms('child_status', false)
			->filterByTerms('risk_level', $filters['risk_level_null'] ?? false)
			->filterByTerms('gender',$filters['gender_null'] ?? false)
			->filterByTerms('place_kind',$filters['place_kind_null'] ?? false)
			//->filterByTerm('race',$filters['race_null'] ?? false)
			//->filterByTerm('guardian_schooling',$filters['guardian_schooling_null'] ?? false)
			//->filterByTerm('parents_income',$filters['parents_income_null'] ?? false)
			->filterByRange('age',$filters['age_null'] ?? false);


		$index = ($params['view'] == 'linear') ? $entity->getAggregationIndex() : $entity->getTimeSeriesIndex();
		$type = ($params['view'] == 'linear') ? $entity->getAggregationType() : $entity->getTimeSeriesType();

		try {
			$response = $reports->query($index, $type, $params['dimension'], $query);
		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}

		// TODO: return with Fractal transformation

		return response()->json([
			'query' => $query->getQuery(),
			'attempted' => $query->getAttemptedQuery(),
			'response' => $response
		]);
	}

}