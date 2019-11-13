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
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\ChildCase;
use BuscaAtivaEscolar\City;
use BuscaAtivaEscolar\Data\AgeRange;
use BuscaAtivaEscolar\Data\AlertCause;
use BuscaAtivaEscolar\Data\CaseCause;
use BuscaAtivaEscolar\Data\IncomeRange;
use BuscaAtivaEscolar\Data\Race;
use BuscaAtivaEscolar\Data\SchoolingLevel;
use BuscaAtivaEscolar\Data\WorkActivity;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\IBGE\Region;
use BuscaAtivaEscolar\IBGE\UF;
use BuscaAtivaEscolar\Reports\Reports;
use BuscaAtivaEscolar\School;
use BuscaAtivaEscolar\Search\ElasticSearchQuery;
use BuscaAtivaEscolar\StateSignup;
use BuscaAtivaEscolar\TenantSignup;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\User;
use Cache;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Str;

class ReportsController extends BaseController
{

    public function query_children(Reports $reports)
    {

        // TODO: this needs a major refactoring to clear up the complexity that crept in

        $params = request()->all();
        $filters = request('filters', []);
        $format = request('format', 'json');

        // Scope the query within the tenant
        if (Auth::user()->isRestrictedToTenant()) $filters['tenant_id'] = Auth::user()->tenant_id;
        if (Auth::user()->isRestrictedToUF()) $filters['uf'] = Auth::user()->uf;

        if (isset($filters['place_uf'])) $filters['place_uf'] = Str::lower($filters['place_uf']);
        if (isset($filters['uf'])) $filters['uf'] = Str::lower($filters['uf']);

        if (!isset($params['view'])) {
            $params['view'] = "linear";
        }

        $entity = new Child();
        $query = ElasticSearchQuery::withParameters($filters)
            ->filterByTerm('tenant_id', false, 'filter', Auth::user()->isRestrictedToTenant() ? 'must' : 'should')
            ->filterByTerm('uf', false, 'filter', Auth::user()->isRestrictedToUF() ? 'must' : 'should')
            //->filterByTerms('deadline_status', false)
            ->filterByTerms('case_status', false)
            ->filterByTerms('alert_status', false)
            ->filterByTerm('step_slug', false)
            ->filterByTerm('place_uf', $filters['place_uf_null'] ?? false)
            ->filterByTerm('place_uf', $filters['place_uf_null'] ?? false)
            ->filterByTerm('place_city_id', $filters['place_city_id_null'] ?? false)
            ->filterByTerm('case_cause_ids', false)
            ->filterByTerms('child_status', false)
            ->filterByTerm('school_last_grade', $params['school_last_grade_null'] ?? false)
            ->filterByTerms('risk_level', $filters['risk_level_null'] ?? false)
            ->filterByTerms('gender', $filters['gender_null'] ?? false)
            ->filterByTerms('place_kind', $filters['place_kind_null'] ?? false);
        //->filterByTerm('race',$filters['race_null'] ?? false)
        //->filterByTerm('guardian_schooling',$filters['guardian_schooling_null'] ?? false)
        //->filterByTerm('parents_income',$filters['parents_income_null'] ?? false)
        //->filterByRange('age',$filters['age_null'] ?? false);

        if (isset($filters['age_ranges'])) {
            $rangesQuery = collect($filters['age_ranges'])->map(function ($rangeSlug) {
                $range = AgeRange::getBySlug($rangeSlug);
                return ['range' => ['age' => ['from' => $range->from, 'to' => $range->to]]];
            });

            $ageQuery = ['should' => [$rangesQuery->toArray()]];

            if ($filters['age_null'] ?? false) {
                array_push($ageQuery['should'], ['missing' => ['field' => 'age']]);
            }

            $query->appendBoolQuery('filter', ['bool' => $ageQuery]);
        }

        if ($params['view'] == "time_series") {
            if (!isset($filters['date'])) $filters['date'] = ['lte' => 'now', 'gte' => 'now-2d'];
            $query->filterByRange('date', false);
        }

        if ($params['view'] == "linear") {
            if (!isset($filters['created_at'])) $filters['created_at'] = ['lte' => 'now', 'gte' => 'now-2d'];
            $query->filterByRange('created_at', false);
        }

        $index = ($params['view'] == 'linear') ? $entity->getAggregationIndex() : $entity->getTimeSeriesIndex();
        $type = ($params['view'] == 'linear') ? $entity->getAggregationType() : $entity->getTimeSeriesType();


        try {
            $response = ($params['view'] == 'time_series') ?
                $reports->timeline($index, $type, $params['dimension'], $query) :
                $reports->linear($index, $type, $params['dimension'], $query);

            $ids = $this->extractDimensionIDs($response['report'], $params['view']);
            $labels = $this->fetchDimensionLabels($params['dimension'], $ids);

            //todo gambi, o correto é remover do elastic search
            if ($params['dimension'] == 'case_cause_ids') {
                unset($response['report'][500]);
                unset($response['report'][600]);
            }
            if ($params['dimension'] == 'parents_income') {
                $response['report']['no_info'] = $response['records_total'] - array_sum($response['report']);
            }
            if ($params['dimension'] == 'race') {
                $response['report']['no_info'] = $response['records_total'] - array_sum($response['report']);
            }
            if ($params['dimension'] == 'work_activity') {
                $response['report']['no_info'] = $response['records_total'] - array_sum($response['report']);
            }
            if ($params['dimension'] == 'guardian_schooling') {
                $response['report']['no_info'] = $response['records_total'] - array_sum($response['report']);
            }
//            if ($params['dimension'] == 'case_cause_ids') {
//                $total = $response['records_total'];
//                $response['records_total'] = array_sum($response['report']);
//                $semInformacao = $response['records_total'] - $total;
//                $response['report']['Sem informação'] = $semInformacao > 0 ? $semInformacao : 0 ;
//            }

        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }

        if ($format === 'xls') {
            return $this->exportResults($params['view'], $response, $labels);
        }

        if (isset($filters['place_city_id'])) {
            $tentant = Tenant::where('city_id', $filters['place_city_id'])->first();
            $tentant != null ? $response['tenant'] = true : $response['tenant'] = false;
        }

        return response()->json(
            [
                'query' => $query->getQuery(),
                'attempted' => $query->getAttemptedQuery(),
                'response' => $response,
                'labels' => $labels
            ]
        );
    }

    public function query_tenants()
    {

        $filters = request('filters', []);
        $format = request('format', 'json');

        if (isset($filters['uf'])) $filters['uf'] = Str::lower($filters['uf']);

        // Scope the query within the tenant
        if (Auth::user()->isRestrictedToTenant()) $filters['tenant_id'] = Auth::user()->tenant_id;
        if (Auth::user()->isRestrictedToUF()) $filters['uf'] = Auth::user()->uf;

        $query = Tenant::query();

        if (isset($filters['uf'])) $query->where('uf', $filters['uf']);

        $tenants = $query->get();
        $recordsTotal = $tenants->count();

        $report = null;
        $labels = [];

        switch (request('dimension')) {

            case "uf":

                $report = $tenants
                    ->sortBy('uf')
                    ->groupBy('uf')
                    ->map(function ($group) {
                        return $group->count();
                    });

                $labels = $report->keys()->sort();

                break;

            case "region":

                $labels = collect(Region::getAll())->pluck('name', 'id');

                $report = collect(Region::getAll())
                    ->sortBy('name')
                    ->map(function ($region) use ($tenants, $labels) {
                        $ufs = collect(UF::getAll())
                            ->where('region_id', $region->id)
                            ->pluck('code')
                            ->toArray();

                        return [
                            'name' => $labels[$region->id],
                            'count' => $tenants->whereIn('uf', $ufs)->count()
                        ];
                    })
                    ->pluck('count', 'name');

                break;

        }

        $response = [
            'records_total' => $recordsTotal,
            'report' => $report,
        ];

        if ($format === 'xls') {
            return $this->exportResults('linear', $response, $labels);
        }

        return response()->json([
            'response' => $response,
            'labels' => $labels
        ]);
    }

    public function query_ufs()
    {

        $ufs = collect(UF::getAllByCode());
        $regionLabels = collect(Region::getAll())->sortBy('name')->pluck('name', 'id');

        $dimension = request('dimension');
        $format = request('format', 'json');

        $report = DB::table("users")
            ->whereIn('type', User::$UF_SCOPED_TYPES)
            ->groupBy('uf')
            ->select(['uf', DB::raw('COUNT(id) as num')])
            ->get()
            ->map(function ($user) use ($ufs, $regionLabels) {
                $user->region_id = $ufs[$user->uf]['region_id'];
                $user->region_name = $labels[$user->region_id] ?? '';
                return $user;
            });

        switch ($dimension) {
            case "uf":
                $seriesName = 'Número de usuários por estado';
                $report = $report
                    ->sortBy('uf')
                    ->keyBy('uf')
                    ->map(function ($dimension) {
                        return $dimension->num;
                    });

                break;

            case "region":
            default:
                $seriesName = 'Número de estados participantes';
                $report = $report
                    ->groupBy('region_id')
                    ->sortBy('region_name')
                    ->map(function ($dimension) {
                        return $dimension->count();
                    });

                break;
        }

        $recordsTotal = $report->sum();
        $response = [
            'records_total' => $recordsTotal,
            'report' => $report,
            'seriesName' => $seriesName,
        ];

        if ($format === 'xls') {
            return $this->exportResults('linear', $response, $regionLabels);
        }

        return response()->json([
            'response' => $response,
            'labels' => $regionLabels
        ]);
    }

    public function query_signups()
    {

        $today = Carbon::now();
        $format = request('format', 'json');

        $numSignups = DB::table("tenant_signups")
            ->select([DB::raw('CONCAT(YEAR(created_at), CONCAT("-", MONTH(created_at))) as month'), DB::raw('COUNT(id) as qty')])
            ->groupBy('month')
            ->get()
            ->pluck('qty', 'month');

        $lastTwelveMonths = collect(range(0, 11))
            ->reverse()
            ->map(function ($i) use ($today) {
                $date = $today->copy()->addMonths(-$i);

                return [
                    'index' => $i,
                    'date' => $date->format('Y-m') . "-01",
                    'month' => $date->format('Y-n'),
                    'label' => $date->formatLocalized('%b/%Y'),
                ];
            })
            ->keyBy('label')
            ->map(function ($period) use ($numSignups) {
                //$this->debug_push('period', $period['month'], $numSignups[$period['month']] ?? null);
                return ['num_tenant_signups' => $numSignups[$period['month']] ?? 0];
            });

        //return $this->debug_output();


        $labels = ['num_tenant_signups' => 'Qtd. de adesões municipais'];
        $response = [
            'records_total' => 0,
            'report' => $lastTwelveMonths,
        ];

        if ($format === 'xls') {
            return $this->exportResults('linear', $response, $labels);
        }

        return response()->json([
            'response' => $response,
            'labels' => $labels
        ]);

    }

    private function exportResults($view, $response, $labels)
    {

        $exportFile = uniqid("report_export_", true);
        $exportFolder = storage_path('app/export/' . auth()->user()->id);

        if ($view === 'linear') {

            $data = collect($response['report'])
                ->map(function ($value, $column) use ($labels) {
                    return [$labels[$column] ?? $column, $value ?? 0];
                })
                ->values()
                ->toArray();

        } else if ($view === "time_series") { // TODO: optimize for performance

            $header = null;
            $data = collect($response['report'])
                ->map(function ($stats, $date) use ($labels, &$header) {
                    if ($header === null) {
                        $header = collect($stats)
                            ->map(function ($_, $column) use ($labels) {
                                return $labels[$column] ?? $column;
                            })
                            ->values()
                            ->toArray();
                    }

                    array_unshift($stats, $date);

                    return collect($stats)->values()->toArray();
                })
                ->values()
                ->toArray();

            if ($header === null) { // In case no header was built due to no records found
                $header = [];
            }

            array_unshift($header, 'Data');
            array_unshift($data, $header);

        }

        $exported = \Excel::create($exportFile, function ($excel) use ($data) {

            $excel->sheet('export', function ($sheet) use ($data) {
                $sheet->fromArray($data, null, 'A1', false, false);
            });

        })->store('xls', $exportFolder, true);

        $token = \JWTAuth::fromUser(auth()->user());

        return $this->api_success([
            'export_file' => $exported['file'],
            'download_url' => route('api.reports.download_exported', ['filename' => $exported['file'], 'token' => $token])
        ]);


    }

    public function download_exported($filename)
    {

        $token = request('token');

        \JWTAuth::invalidate($token);

        return response()->download(storage_path('app/export/' . auth()->user()->id . '/' . basename($filename)));

    }

    public function country_stats()
    {

        try {

            $stats = Cache::remember('stats_country', config('cache.timeouts.stats_platform'), function () {
                return [
                    'num_tenants' => Tenant::query()
                        ->count(),

                    'num_ufs' => StateSignup::query()->count(),

                    'num_signups' => TenantSignup::query()
                        ->count(),

                    'num_pending_setup' => TenantSignup::query()
                        ->where('is_approved', 1)
                        ->where('is_provisioned', 0)
                        ->count(),

                    'num_alerts' => Alerta::query()
                        ->accepted()
                        ->count(),

                    'num_pending_alerts' => Child::whereHas('alert', function ($query) {
                        $query->where(['alert_status' => 'pending']);
                    })->pending()->count(),
//todo corrigir consulta pois rejeitado tem que estar no alerta e no child
                    'num_rejected_alerts' => Child::whereHas('alert', function ($query) {
                        $query->where(['alert_status' => 'rejected']);
                    })->rejected()->count(),

                    'num_total_alerts' => ChildCase::query()
                        ->count(),

                    'num_cases_in_progress' => Child::with(['currentCase'])
                        ->hasCaseInProgress()
                        ->count(),

                    'num_children_reinserted' => Child::query()
                        ->whereIn('child_status', [Child::STATUS_IN_SCHOOL, Child::STATUS_OBSERVATION])
                        ->count(),

                    'num_pending_signups' => TenantSignup::query()
                        ->whereNull('judged_by')
                        ->count(),

                    'num_pending_state_signups' => StateSignup::query()
                        ->whereNull('judged_by')
                        ->count(),
                ];
            });

            return response()->json(['status' => 'ok', 'stats' => $stats]);

        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }

    }

    public function state_stats()
    {

        $uf = request('uf', $this->currentUser()->uf);

        if (!$uf) {
            return $this->api_failure('invalid_uf');
        }

        $tenantIDs = Tenant::getIDsWithinUF($uf);
        $cityIDs = City::getIDsWithinUF($uf);

        try {

            $stats = Cache::remember('stats_state_' . $uf, config('cache.timeouts.stats_platform'), function () use ($uf, $cityIDs, $tenantIDs) {
                return [
                    'num_tenants' => Tenant::query()
                        ->where('uf', $uf)
                        ->count(),

                    'num_signups' => TenantSignup::query()
                        ->whereIn('city_id', $cityIDs)
                        ->count(),

                    'num_pending_setup' => TenantSignup::query()
                        ->whereIn('city_id', $cityIDs)
                        ->where('is_approved', 1)
                        ->where('is_provisioned', 0)
                        ->count(),

                    'num_alerts' => Alerta::query()
                        ->whereIn('tenant_id', $tenantIDs)
                        ->notRejected()
                        ->count(),

                    'num_cases_in_progress' => ChildCase::query()
                        ->whereIn('tenant_id', $tenantIDs)
                        ->where('case_status', ChildCase::STATUS_IN_PROGRESS)
                        ->count(),

                    'num_children_reinserted' => Child::query()
                        ->whereIn('tenant_id', $tenantIDs)
                        ->whereIn('child_status', [Child::STATUS_IN_SCHOOL, Child::STATUS_OBSERVATION])
                        ->count(),

                    'num_pending_signups' => TenantSignup::query()
                        ->whereIn('city_id', $cityIDs)
                        ->whereNull('judged_by')
                        ->count(),
                ];
            });

            return response()->json(['status' => 'ok', 'stats' => $stats, 'uf' => $uf, 'tenant_ids' => $tenantIDs, 'city_ids' => $cityIDs]);

        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }

    }

    protected function extractDimensionIDs($report, $view)
    {
        if ($view !== 'time_series') return array_keys($report ?? []);

        $results = collect($report)->map(function ($results) {
            return array_keys($results ?? []);
        })->toArray();

        return array_reduce($results, function ($carry, $item) {
            return array_merge($carry ?? [], $item);
        });
    }

    protected function fetchDimensionLabels($dimension, $ids = [])
    {

        $hasIDs = is_array($ids) && sizeof($ids) > 0;

        switch ($dimension) {
            case 'child_status':
                return trans('child.status');
            case 'step_slug':
                return trans('case_step.name_by_slug');
            case 'age':
                return ['0' => 'menos de 1 ano']; // TODO: return age ranges
            case 'gender':
                return trans('child.gender');
            case 'parents_income':
                return array_pluck(IncomeRange::getAllAsArray(), 'label', 'slug');
            case 'place_kind':
                return trans('child.place_kind');
            case 'work_activity':
                return array_pluck(WorkActivity::getAllAsArray(), 'label', 'slug');
            case 'case_cause_ids':
                return array_pluck(CaseCause::getAllAsArray(), 'label', 'id');
            case 'alert_cause_id':
                return array_pluck(AlertCause::getAllAsArray(), 'label', 'id');
            case 'place_uf':
                return array_pluck(UF::getAllAsArray(), 'code', 'slug');
            case 'place_city_id':
                return $hasIDs ? City::whereIn('id', $ids)->get()->pluck('name', 'id') : []; // TODO: create full_name field that contains UF
            case 'school_last_id':
                return $hasIDs ? School::whereIn('id', $ids)->get()->pluck('name', 'id') : [];
            case 'race':
                return array_pluck(Race::getAllAsArray(), 'label', 'slug');
            case 'guardian_schooling':
                return array_pluck(SchoolingLevel::getAllAsArray(), 'label', 'slug');
            default:
                return [];
        }

    }

}
