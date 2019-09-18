<?php

namespace BuscaAtivaEscolar\Http\Controllers\Bar;

use Auth;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\CaseSteps\Alerta;
use BuscaAtivaEscolar\CaseSteps\Rematricula;
use Cache;

class ReportsBar extends BaseController
{

    public function city_bar(){

        try {

            $report = Cache::remember('city_bar_tenant'.$this->currentUser()->tenant->id, config('cache.timeouts.status_bar_city'), function() {

                return [

                    'bar' => [

                        'registered_at' => $this->currentUser()->tenant->registered_at,

                        'config' => [
                            'is_configured' => $this->currentUser()->tenant->is_setup,
                            'updated_at' => $this->currentUser()->tenant->is_setup ? $this->currentUser()->tenant->updated_at : null
                        ],

                        'first_alert' =>
                            Alerta::where(['tenant_id' => $this->currentUser()->tenant->id, 'alert_status' => Child::ALERT_STATUS_ACCEPTED])
                                ->orderBy('created_at', 'asc')
                                ->first()->created_at,

                        'first_case' =>
                            Alerta::where(['tenant_id' => $this->currentUser()->tenant->id, 'alert_status' => Child::ALERT_STATUS_ACCEPTED])
                                ->orderBy('completed_at', 'asc')
                                ->first()->completed_at,

                        'first_reinsertion_class' =>
                            Rematricula::where(['tenant_id' => $this->currentUser()->tenant->id, 'is_completed' => true])
                                ->orderBy('completed_at', 'asc')
                                ->first()->completed_at,
                    ],

                    'alert_box' => [

                        'alerts_created' =>
                            Alerta::where(['tenant_id' => $this->currentUser()->tenant->id])->count(),

                        'alerts_accepted' =>
                            Alerta::where(
                                [
                                    'tenant_id' => $this->currentUser()->tenant->id,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED
                                ])->count(),

                        'alerts_pending' =>
                            Alerta::where(
                                [
                                    'tenant_id' => $this->currentUser()->tenant->id,
                                    'alert_status' => Child::ALERT_STATUS_PENDING
                                ])->count(),

                        'alerts_rejected' =>
                            Alerta::where(
                                [
                                    'tenant_id' => $this->currentUser()->tenant->id,
                                    'alert_status' => Child::ALERT_STATUS_REJECTED
                                ])->count(),

                    ],

                    'cases_box' => [

                        'cases_on_time' =>
                            Child::has('cases')->where(
                                [
                                    'tenant_id' => $this->currentUser()->tenant->id,
                                    'deadline_status' => Child::DEADLINE_STATUS_NORMAL,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED
                                ])->count(),

                        'cases_late' =>
                            Child::has('cases')->where(
                                [
                                    'tenant_id' => $this->currentUser()->tenant->id,
                                    'deadline_status' => Child::DEADLINE_STATUS_LATE,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED
                                ])->count(),

                    ],

                    'goal_box' => [

                        'goal' => $this->currentUser()->tenant->goal,

                        'reinsertions_classes' =>
                            Rematricula::where(['tenant_id' => $this->currentUser()->tenant->id, 'is_completed' => true])
                                ->orderBy('completed_at', 'asc')
                                ->count(),

                        'observations' => $this->getObseravtionsValues($this->currentUser()->tenant)
                    ]
                ];

            });

            return response()->json($report);

        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }
    }

    private function getObseravtionsValues($tenant)
    {
        $qdt_observations_1 = 0;
        $qdt_observations_2 = 0;
        $qdt_observations_3 = 0;
        $qdt_observations_4 = 0;

        $children = Child::has('cases')->where(
            [
                'tenant_id' => $tenant->id,
                'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                'current_step_type' => 'BuscaAtivaEscolar\CaseSteps\Observacao',
                'child_status' => Child::STATUS_OBSERVATION
            ])->get();

        foreach ( $children as $child ){

            switch ( $child->currentStep->step_index ) {
                case 60:
                    $qdt_observations_1++;
                    break;
                case 70:
                    $qdt_observations_2++;
                    break;
                case 80:
                    $qdt_observations_3++;
                    break;
                case 90:
                    $qdt_observations_4++;
                    break;
            }

        }

        return [
            'qdt_observations_1' => $qdt_observations_1,
            'qdt_observations_2' => $qdt_observations_2,
            'qdt_observations_3' => $qdt_observations_3,
            'qdt_observations_4' => $qdt_observations_4,
        ];

    }

}
