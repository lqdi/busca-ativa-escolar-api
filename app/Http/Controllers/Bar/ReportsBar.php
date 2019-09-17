<?php

namespace BuscaAtivaEscolar\Http\Controllers\Bar;

use Auth;
use BuscaAtivaEscolar\CaseSteps\Observacao;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\ChildCase;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Tenant;

class ReportsBar extends BaseController
{

    public function city_bar(){

        try {

            /** @var Tenant $query */
            $tenant = Auth::user()->tenant;

            $report = [

                'bar' => [

                    'registered_at' => $tenant->registered_at,

                    'config' => [
                        'is_configured' => $tenant->is_setup,
                        'updated_at' => $tenant->is_setup ? $tenant->updated_at : null
                    ],

                    'first_alert' =>
                        \BuscaAtivaEscolar\CaseSteps\Alerta::where(['tenant_id' => $tenant->id, 'alert_status' => 'accepted'])
                            ->orderBy('created_at', 'asc')
                            ->first()->created_at,

                    'first_case' =>
                        \BuscaAtivaEscolar\CaseSteps\Alerta::where(['tenant_id' => $tenant->id, 'alert_status' => 'accepted'])
                            ->orderBy('completed_at', 'asc')
                            ->first()->completed_at,

                    'first_reinsertion_class' =>
                        \BuscaAtivaEscolar\CaseSteps\Rematricula::where(['tenant_id' => $tenant->id, 'is_completed' => true])
                            ->orderBy('completed_at', 'asc')
                            ->first()->completed_at,
                ],

                'alert_box' => [

                    'alerts_created' =>
                        \BuscaAtivaEscolar\CaseSteps\Alerta::where(['tenant_id' => $tenant->id])->count(),

                    'alerts_accepted' =>
                        \BuscaAtivaEscolar\CaseSteps\Alerta::where(
                            [
                                'tenant_id' => $tenant->id,
                                'alert_status' => Child::ALERT_STATUS_ACCEPTED
                            ])->count(),

                    'alerts_pending' =>
                        \BuscaAtivaEscolar\CaseSteps\Alerta::where(
                            [
                                'tenant_id' => $tenant->id,
                                'alert_status' => Child::ALERT_STATUS_PENDING
                            ])->count(),

                    'alerts_rejected' =>
                        \BuscaAtivaEscolar\CaseSteps\Alerta::where(
                            [
                                'tenant_id' => $tenant->id,
                                'alert_status' => Child::ALERT_STATUS_REJECTED
                            ])->count(),

                ],

                'cases_box' => [

                    'cases_on_time' =>
                        \BuscaAtivaEscolar\Child::has('cases')->where(
                            [
                                'tenant_id' => $tenant->id,
                                'deadline_status' => Child::DEADLINE_STATUS_NORMAL,
                                'alert_status' => Child::ALERT_STATUS_ACCEPTED
                            ])->count(),

                    'cases_late' =>
                        \BuscaAtivaEscolar\Child::has('cases')->where(
                            [
                                'tenant_id' => $tenant->id,
                                'deadline_status' => Child::DEADLINE_STATUS_LATE,
                                'alert_status' => Child::ALERT_STATUS_ACCEPTED
                            ])->count(),

                ],

                'goal_box' => [

                    'goal' => $tenant->goal,

                    'reinsertions_class' =>
                        \BuscaAtivaEscolar\CaseSteps\Rematricula::where(['tenant_id' => $tenant->id, 'is_completed' => true])
                        ->orderBy('completed_at', 'asc')
                        ->count(),

                    'in_observation_1' => '',

                    'in_observation_2' => '',

                    'in_observation_3' => '',

                    'in_observation_4' => '',
                ]

            ];

//            $stats = Cache::remember('city_bar', config('cache.timeouts.status_bar_city'), function() {
//
//
//            });

            return response()->json($report);

        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }
    }

}