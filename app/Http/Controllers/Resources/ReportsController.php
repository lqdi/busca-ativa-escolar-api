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
use BuscaAtivaEscolar\CaseSteps\Alerta;
use BuscaAtivaEscolar\CaseSteps\CaseStep;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\ChildCase;
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
use BuscaAtivaEscolar\SignUp;
use BuscaAtivaEscolar\Tenant;
use Cache;
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

		if($params['view'] == "time_series") {
			if(!isset($filters['date'])) $filters['date'] = ['lte' => 'now', 'gte' => 'now-2d'];
			$query->filterByRange('date', false);
		}

		$index = ($params['view'] == 'linear') ? $entity->getAggregationIndex() : $entity->getTimeSeriesIndex();
		$type = ($params['view'] == 'linear') ? $entity->getAggregationType() : $entity->getTimeSeriesType();

		try {
			$response = ($params['view'] == 'time_series') ?
				$reports->timeline($index, $type, $params['dimension'], $query) :
				$reports->linear($index, $type, $params['dimension'], $query);

			$ids = $this->extractDimensionIDs($response['report'], $params['view']);
			$labels = $this->fetchDimensionLabels($params['dimension'], $ids);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}

		return response()->json([
			'query' => $query->getQuery(),
			'attempted' => $query->getAttemptedQuery(),
			'response' => $response,
			'labels' => $labels
		]);
	}

	public function country_stats() {

		try {

			$stats = Cache::remember('stats_country', config('cache.timeouts.stats_platform'), function() {
				return [
					'num_tenants' => Tenant::query()->count(),
					'num_signups' => SignUp::query()->count(),
					'num_pending_setup' => Tenant::query()->where('is_setup', 0)->count(),
					'num_alerts' => Alerta::query()->count(),
					'num_cases_in_progress' => ChildCase::query()->where('case_status', ChildCase::STATUS_IN_PROGRESS)->count(),
					'num_children_reinserted' => Child::query()->where('child_status', Child::STATUS_IN_SCHOOL)->count(),
					'num_pending_signups' => SignUp::query()->whereNull('judged_by')->count(),
				];
			});

			return response()->json(['status' => 'ok', 'stats' => $stats]);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}

	}

	protected function extractDimensionIDs($report, $view) {
		if($view !== 'time_series') return array_keys($report ?? []);

		$results = collect($report)->map(function ($results) {
				return array_keys($results ?? []);
		})->toArray();

		return array_reduce($results, function ($carry, $item) {
				return array_merge($carry ?? [], $item);
		});
	}

	protected function fetchDimensionLabels($dimension, $ids = []) {

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