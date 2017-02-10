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
use BuscaAtivaEscolar\City;
use BuscaAtivaEscolar\Data\AlertCause;
use BuscaAtivaEscolar\Data\CaseCause;
use BuscaAtivaEscolar\Data\IncomeRange;
use BuscaAtivaEscolar\Data\WorkActivity;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\IBGE\UF;
use BuscaAtivaEscolar\Reports\Reports;
use BuscaAtivaEscolar\School;
use BuscaAtivaEscolar\Search\ElasticSearchQuery;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use Illuminate\Support\Str;

class ReportsController extends BaseController {

	public function query_children(Reports $reports) {

		$params = request()->all();
		$filters = request('filters', []);

		// Scope the query within the tenant
		if(Auth::user()->isRestrictedToTenant()) $filters['tenant_id'] = Auth::user()->tenant_id;

		//if(isset($filters['place_uf'])) $filters['place_uf'] = Str::lower($filters['place_uf']);

		$entity = new Child();
		$query = ElasticSearchQuery::withParameters($filters)
			->filterByTerm('tenant_id', false)
			//->filterByTerms('deadline_status', false)
			->filterByTerms('case_status', false)
			->filterByTerms('alert_status', false)
			->filterByTerm('step_slug',false)
			->filterByTerm('place_uf',$filters['place_uf_null'] ?? false)
			->filterByTerm('place_city_id',$filters['place_city_id_null'] ?? false)
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
			$ids = array_keys($response['report'] ?? []);
			$labels = $this->fetchDimensionLabels($params['dimension'], $ids);
		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}

		// TODO: return with Fractal transformation

		return response()->json([
			'query' => $query->getQuery(),
			'attempted' => $query->getAttemptedQuery(),
			'response' => $response,
			'labels' => $labels
		]);
	}

	protected function fetchDimensionLabels($dimension, $ids) {

		switch($dimension) {
			case 'child_status': return trans('child.status');
			case 'step_slug': return trans('case_step.name_by_slug');
			case 'age': return []; // TODO: return age ranges
			case 'gender': return trans('child.gender');
			case 'parents_income': return array_pluck(IncomeRange::getAllAsArray(), 'label', 'slug');
			case 'place_kind': return trans('child.place_kind');
			case 'work_activity': return array_pluck(WorkActivity::getAllAsArray(), 'label', 'slug');
			case 'case_cause_ids': return array_pluck(CaseCause::getAllAsArray(), 'label', 'id');
			case 'alert_cause_id': return array_pluck(AlertCause::getAllAsArray(), 'label', 'id');
			case 'place_uf': return array_pluck(UF::getAllAsArray(), 'code', 'slug');
			case 'place_city_id': return City::whereIn('id', $ids)->get()->pluck('name', 'id'); // TODO: create full_name field that contains UF
			case 'school_last_id': return School::whereIn('id', $ids)->get()->pluck('name', 'id');
			default: return [];
		}

	}

}