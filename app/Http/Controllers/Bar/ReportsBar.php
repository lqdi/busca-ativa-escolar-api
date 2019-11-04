<?php

namespace BuscaAtivaEscolar\Http\Controllers\Bar;

use Auth;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\CaseSteps\Alerta;
use BuscaAtivaEscolar\CaseSteps\Rematricula;
use Cache;
use DB;
use PhpParser\Builder;

class ReportsBar extends BaseController
{

    public function city_bar(){

        try {

            $report = [

                'bar' => [

                    'registered_at' => $this->currentUser()->tenant->registered_at->toDateTimeString(),

                    'config' => [
                        'is_configured' => $this->currentUser()->tenant->settings ? true : false,
                        'updated_at' => $this->currentUser()->tenant->settings ? $this->currentUser()->tenant->updated_at->toDateTimeString() : null
                    ],

                    'first_alert' =>

                        DB::table('children')
                            ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                            ->where('case_steps_alerta.tenant_id', '=', $this->currentUser()->tenant->id)
                            ->orderBy('case_steps_alerta.created_at', 'asc')
                            ->first()->created_at ?? null,

                    'first_case' =>

                        DB::table('children')
                            ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                            ->where(
                                [
                                    'case_steps_alerta.tenant_id' => $this->currentUser()->tenant->id,
                                    'case_steps_alerta.is_completed' => true
                                ]
                            )
                            ->orderBy('case_steps_alerta.completed_at', 'asc')
                            ->first()->completed_at ?? null,

                    'first_reinsertion_class' =>

                        DB::table('children')
                            ->join('case_steps_rematricula', 'children.id', '=', 'case_steps_rematricula.child_id')
                            ->where(
                                [
                                    'case_steps_rematricula.tenant_id' => $this->currentUser()->tenant->id,
                                    'case_steps_rematricula.is_completed' => true
                                ]
                            )
                            ->orderBy('case_steps_rematricula.completed_at', 'asc')
                            ->first()->completed_at ?? null,

                ],

                'alert_box' => [

                    'alerts_created' =>
                        DB::table('children')
                            ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                            ->where('children.tenant_id', '=', $this->currentUser()->tenant->id)
                            ->count(),

                    'alerts_accepted' =>
                        DB::table('children')
                            ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                            ->where('case_steps_alerta.tenant_id', '=', $this->currentUser()->tenant->id)
                            ->where('children.alert_status', '=', Child::ALERT_STATUS_ACCEPTED)
                            ->count(),

                    'alerts_pending' =>
                        DB::table('children')
                            ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                            ->where('case_steps_alerta.tenant_id', '=', $this->currentUser()->tenant->id)
                            ->where('children.alert_status', '=', Child::ALERT_STATUS_PENDING)
                            ->count(),

                    'alerts_rejected' =>
                        DB::table('children')
                            ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                            ->where('case_steps_alerta.tenant_id', '=', $this->currentUser()->tenant->id)
                            ->where('children.alert_status', '=', Child::ALERT_STATUS_REJECTED)
                            ->count(),

                ],

                'cases_box' => [

                    'cases_on_time' =>
                        Child::whereHas('cases', function ($query){
                            $query->where(['case_status'=> 'in_progress']);
                        })->where(
                            [
                                'tenant_id' => $this->currentUser()->tenant->id,
                                'deadline_status' => Child::DEADLINE_STATUS_NORMAL,
                                'alert_status' => Child::ALERT_STATUS_ACCEPTED
                            ])->count(),

                    'steps_on_time' => [

                        'pesquisa' =>

                            Child::whereHas('cases', function ($query){
                                $query->where(['case_status'=> 'in_progress']);
                            })->where(
                                [
                                    'tenant_id' => $this->currentUser()->tenant->id,
                                    'deadline_status' => Child::DEADLINE_STATUS_NORMAL,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                    'current_step_type' => "BuscaAtivaEscolar\CaseSteps\Pesquisa"
                                ])->count(),

                        'analise_tecnica' =>

                            Child::whereHas('cases', function ($query){
                                $query->where(['case_status'=> 'in_progress']);
                            })->where(
                                [
                                    'tenant_id' => $this->currentUser()->tenant->id,
                                    'deadline_status' => Child::DEADLINE_STATUS_NORMAL,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                    'current_step_type' => "BuscaAtivaEscolar\CaseSteps\AnaliseTecnica"
                                ])->count(),

                        'gestao_do_caso' =>

                            Child::whereHas('cases', function ($query){
                                $query->where(['case_status'=> 'in_progress']);
                            })->where(
                                [
                                    'tenant_id' => $this->currentUser()->tenant->id,
                                    'deadline_status' => Child::DEADLINE_STATUS_NORMAL,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                    'current_step_type' => "BuscaAtivaEscolar\CaseSteps\GestaoDoCaso"
                                ])->count(),

                        'rematricula' =>

                            Child::whereHas('cases', function ($query){
                                $query->where(['case_status'=> 'in_progress']);
                            })->where(
                                [
                                    'tenant_id' => $this->currentUser()->tenant->id,
                                    'deadline_status' => Child::DEADLINE_STATUS_NORMAL,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                    'current_step_type' => "BuscaAtivaEscolar\CaseSteps\Rematricula"
                                ])->count(),

                        'observacao' =>

                            Child::whereHas('cases', function ($query){
                                $query->where(['case_status'=> 'in_progress']);
                            })->where(
                                [
                                    'tenant_id' => $this->currentUser()->tenant->id,
                                    'deadline_status' => Child::DEADLINE_STATUS_NORMAL,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                    'current_step_type' => "BuscaAtivaEscolar\CaseSteps\Observacao"
                                ])->count(),
                    ],

                    'cases_late' =>
                        Child::whereHas('cases', function ($query){
                            $query->where(['case_status'=> 'in_progress']);
                        })->where(
                            [
                                'tenant_id' => $this->currentUser()->tenant->id,
                                'deadline_status' => Child::DEADLINE_STATUS_LATE,
                                'alert_status' => Child::ALERT_STATUS_ACCEPTED
                            ])->count(),

                    'steps_late' => [
                        'pesquisa' =>

                            Child::has('cases')->where(
                                [
                                    'tenant_id' => $this->currentUser()->tenant->id,
                                    'deadline_status' => Child::DEADLINE_STATUS_LATE,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                    'current_step_type' => "BuscaAtivaEscolar\CaseSteps\Pesquisa"
                                ])->count(),

                        'analise_tecnica' =>

                            Child::has('cases')->where(
                                [
                                    'tenant_id' => $this->currentUser()->tenant->id,
                                    'deadline_status' => Child::DEADLINE_STATUS_LATE,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                    'current_step_type' => "BuscaAtivaEscolar\CaseSteps\AnaliseTecnica"
                                ])->count(),

                        'gestao_do_caso' =>

                            Child::has('cases')->where(
                                [
                                    'tenant_id' => $this->currentUser()->tenant->id,
                                    'deadline_status' => Child::DEADLINE_STATUS_LATE,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                    'current_step_type' => "BuscaAtivaEscolar\CaseSteps\GestaoDoCaso"
                                ])->count(),

                        'rematricula' =>

                            Child::has('cases')->where(
                                [
                                    'tenant_id' => $this->currentUser()->tenant->id,
                                    'deadline_status' => Child::DEADLINE_STATUS_LATE,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                    'current_step_type' => "BuscaAtivaEscolar\CaseSteps\Rematricula"
                                ])->count(),

                        'observacao' =>

                            Child::has('cases')->where(
                                [
                                    'tenant_id' => $this->currentUser()->tenant->id,
                                    'deadline_status' => Child::DEADLINE_STATUS_LATE,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                    'current_step_type' => "BuscaAtivaEscolar\CaseSteps\Observacao"
                                ])->count(),
                    ],

                ],

                'goal_box' => [

                    'goal' => $this->currentUser()->tenant->city->goal ? $this->currentUser()->tenant->city->goal->goal : null,

                    'reinsertions_classes' =>
                        Rematricula::where(['tenant_id' => $this->currentUser()->tenant->id, 'is_completed' => true])
                            ->orderBy('completed_at', 'asc')
                            ->count(),

                    'observations' => $this->getObseravtionsValues($this->currentUser()->tenant)
                ]
            ];

//            $report = Cache::remember('city_bar_tenant'.$this->currentUser()->tenant->id, config('cache.timeouts.status_bar_city'), function() {
//
//               return
//
//            });

            return response()->json($report);

        } catch (\Exception $ex) {
            return $this->api_exception($ex);
        }
    }

    private function getObseravtionsValues($tenant)
    {
        $qtd_observations_1 = 0;
        $qtd_observations_2 = 0;
        $qtd_observations_3 = 0;
        $qtd_observations_4 = 0;

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
                    $qtd_observations_1++;
                    break;
                case 70:
                    $qtd_observations_2++;
                    break;
                case 80:
                    $qtd_observations_3++;
                    break;
                case 90:
                    $qtd_observations_4++;
                    break;
            }

        }

        return [
            'qtd_observations_1' => $qtd_observations_1,
            'qtd_observations_2' => $qtd_observations_2,
            'qtd_observations_3' => $qtd_observations_3,
            'qtd_observations_4' => $qtd_observations_4,
        ];

    }

}
