<?php

namespace BuscaAtivaEscolar\Jobs;

use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\City;
use BuscaAtivaEscolar\Tenant;
use Carbon\Carbon;
use DB;
use Excel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;

class ProcessReportSeloJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public function handle() {

        Log::info("Iniciando processo de exportacao dos dados do Selo UNICEF");
        set_time_limit(0);

        $cities = [];
        $cities_with_goal = City::has('goal')->get();

        foreach ($cities_with_goal as $city) {

            $tenant = Tenant::where('is_registered', true)->where('city_id', $city->id)->first();

            if( $tenant != null ){

                $obs1 =
                    DB::table('children')
                        ->join('case_steps_observacao','children.current_step_id', '=', 'case_steps_observacao.id')
                        ->join('children_cases','children.id', '=', 'children_cases.child_id')
                        ->where('children.alert_status', '=', Child::ALERT_STATUS_ACCEPTED)
                        ->where('children.tenant_id', '=', $tenant->id)
                        ->where('children_cases.case_status', '=', 'in_progress')
                        ->where('case_steps_observacao.step_index', '=', 60)
                        ->count();
                $obs2 =
                    DB::table('children')
                        ->join('case_steps_observacao','children.current_step_id', '=', 'case_steps_observacao.id')
                        ->join('children_cases','children.id', '=', 'children_cases.child_id')
                        ->where('children.alert_status', '=', Child::ALERT_STATUS_ACCEPTED)
                        ->where('children.tenant_id', '=', $tenant->id)
                        ->where('children_cases.case_status', '=', 'in_progress')
                        ->where('case_steps_observacao.step_index', '=', 70)
                        ->count();
                $obs3 =
                    DB::table('children')
                        ->join('case_steps_observacao','children.current_step_id', '=', 'case_steps_observacao.id')
                        ->join('children_cases','children.id', '=', 'children_cases.child_id')
                        ->where('children.alert_status', '=', Child::ALERT_STATUS_ACCEPTED)
                        ->where('children.tenant_id', '=', $tenant->id)
                        ->where('children_cases.case_status', '=', 'in_progress')
                        ->where('case_steps_observacao.step_index', '=', 80)
                        ->count();
                $obs4 =
                    DB::table('children')
                        ->join('case_steps_observacao','children.current_step_id', '=', 'case_steps_observacao.id')
                        ->join('children_cases','children.id', '=', 'children_cases.child_id')
                        ->where('children.alert_status', '=', Child::ALERT_STATUS_ACCEPTED)
                        ->where('children.tenant_id', '=', $tenant->id)
                        ->where('children_cases.case_status', '=', 'in_progress')
                        ->where('case_steps_observacao.step_index', '=', 90)
                        ->count();
                $goal = $tenant->city->goal->goal;

                array_push(
                    $cities,
                    [
                        'Adesão' => 'Sim',
                        'Código IBGE 7 Dígitos' => $city->ibge_city_id,
                        'Código IBGE 6 Dígitos' => '',
                        'Código DevInfo' => '',
                        'UF' => $city->uf,
                        'Município' => $city->name,
                        'Não Localizados (2017, INEP/MEC)' => '',

                        'Meta (20%)' => $goal,

                        'Aprovados' =>
                            DB::table('children')
                                ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                                ->where('case_steps_alerta.tenant_id', '=', $tenant->id)
                                ->where('children.alert_status', '=', Child::ALERT_STATUS_ACCEPTED)
                                ->where('case_steps_alerta.alert_status', '=', Child::ALERT_STATUS_ACCEPTED)
                                ->count(),

                        'Rejeitados' =>
                            DB::table('children')
                                ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                                ->where('case_steps_alerta.tenant_id', '=', $tenant->id)
                                ->where('children.alert_status', '=', Child::ALERT_STATUS_REJECTED)
                                ->where('case_steps_alerta.alert_status', '=', Child::ALERT_STATUS_REJECTED)
                                ->count(),
                        'Pendentes' =>
                            DB::table('children')
                                ->join('case_steps_alerta', 'children.id', '=', 'case_steps_alerta.child_id')
                                ->where('case_steps_alerta.tenant_id', '=', $tenant->id)
                                ->where('children.alert_status', '=', Child::ALERT_STATUS_PENDING)
                                ->where('case_steps_alerta.alert_status', '=', Child::ALERT_STATUS_PENDING)
                                ->count(),
                        'Pesquisa' =>
                            Child::whereHas('cases', function ($query){
                                $query->where(['case_status'=> 'in_progress']);
                            })->where(
                                [
                                    'tenant_id' => $tenant->id,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                    'current_step_type' => "BuscaAtivaEscolar\CaseSteps\Pesquisa"
                                ])->count(),
                        'Análise' =>
                            Child::whereHas('cases', function ($query){
                                $query->where(['case_status'=> 'in_progress']);
                            })->where(
                                [
                                    'tenant_id' => $tenant->id,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                    'current_step_type' => "BuscaAtivaEscolar\CaseSteps\AnaliseTecnica"
                                ])->count(),
                        'Gestão' =>
                            Child::whereHas('cases', function ($query){
                                $query->where(['case_status'=> 'in_progress']);
                            })->where(
                                [
                                    'tenant_id' => $tenant->id,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                    'current_step_type' => "BuscaAtivaEscolar\CaseSteps\GestaoDoCaso"
                                ])->count(),
                        '(Re)Matrícula' =>
                            Child::whereHas('cases', function ($query){
                                $query->where(['case_status'=> 'in_progress']);
                            })->where(
                                [
                                    'tenant_id' => $tenant->id,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                    'current_step_type' => "BuscaAtivaEscolar\CaseSteps\Rematricula"
                                ])->count(),

                        'OBS 1' => $obs1,
                        'OBS 2' => $obs2,
                        'OBS 3' => $obs3,
                        'OBS 4' => $obs4,

                        'Interrompidos' =>
                            Child::whereHas('cases', function ($query){
                                $query->where(['case_status'=> 'interrupted']);
                            })->where(
                                [
                                    'tenant_id' => $tenant->id,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                    'child_status' => Child::STATUS_OUT_OF_SCHOOL
                                ])->count(),
                        'Cancelados' =>
                            Child::whereHas('cases', function ($query){
                                $query->where(['case_status'=> 'cancelled']);
                            })->where(
                                [
                                    'tenant_id' => $tenant->id,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                    'child_status' => Child::STATUS_CANCELLED
                                ])->count(),
                        'Concluídos' =>
                            Child::whereHas('cases', function ($query){
                                $query->where(['case_status'=> 'completed']);
                            })->where(
                                [
                                    'tenant_id' => $tenant->id,
                                    'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                    'child_status' => Child::STATUS_IN_SCHOOL
                                ])->count(),
                        'CeA na Escola' => '=SUM(P2:S2)',
                        '% Atingimento da Meta' => (($obs1+$obs2+$obs3+$obs4)*100)/$goal
                    ]
                );
            }else{
                array_push(
                    $cities,
                    [
                        'Adesão' => 'Não',
                        'Código IBGE 7 Dígitos' => $city->ibge_city_id,
                        'Código IBGE 6 Dígitos' => '',
                        'Código DevInfo' => '',
                        'UF' => $city->uf,
                        'Município' => $city->name,
                        'Não Localizados (2017, INEP/MEC)' => '',
                        'Meta (20%)' => '',
                        'Aprovados' => '',
                        'Rejeitados' => '',
                        'Pendentes' => '',
                        'Pesquisa' => '',
                        'Análise' => '',
                        'Gestão' => '',
                        '(Re)Matrícula' => '',
                        'OBS 1' =>'',
                        'OBS 2' =>'',
                        'OBS 3' =>'',
                        'OBS 4' =>'',
                        'Interrompidos' => '',
                        'Cancelados' => '',
                        'Concluídos' => '',
                        'CeA na Escola' => '',
                        '% Atingimento da Meta' => '',
                    ]
                );
            }
        }

        Excel::create('buscaativaescolar_report_selo'.Carbon::now()->timestamp, function($report_xls) use ($cities) {
            $report_xls->sheet('municipio', function($sheet) use ($cities) {
                $sheet->setOrientation('landscape');
                $sheet->fromArray($cities);
            });
        })->store('xls', storage_path('app/attachments/selo_reports'));

        Log::info("Finalizando processo de exportacao dos dados do Selo UNICEF");

    }

}