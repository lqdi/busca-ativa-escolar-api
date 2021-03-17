<?php

namespace BuscaAtivaEscolar\Jobs;

use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\City;
use BuscaAtivaEscolar\Goal;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\TenantSignup;
use Carbon\Carbon;
use DB;
use Excel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;
use Rap2hpoutre\FastExcel\FastExcel;
use File;

class ProcessReportSeloJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {

        Log::info("Iniciando processo de exportacao dos dados do Selo UNICEF");
        set_time_limit(0);
        File::makeDirectory(storage_path("app/attachments/selo_reports/" . Carbon::now()->timestamp), $mode = 0777, true, true);

        $cities = [];
        $cities_with_goal = City::has('goal')->get();

        foreach ($cities_with_goal as $city) {

            $tenant = Tenant::where('is_registered', true)->where('city_id', $city->id)->first();

            $tenant_signup = TenantSignup::where('city_id', $city->id)->first();

            if ($tenant != null) {

                $adesao = 'Sim';
            } else {

                if ($tenant_signup != null) {
                    $adesao = 'Sim';
                } else {
                    $adesao = 'Não';
                }
            }

            $status = $this->renderStatusTenant($adesao, $tenant_signup, $tenant);


            if ($tenant != null and $tenant->deleted_at == null) {

                $obs1 =
                    DB::table('children')
                    ->join('case_steps_observacao', 'children.current_step_id', '=', 'case_steps_observacao.id')
                    ->join('children_cases', 'children.id', '=', 'children_cases.child_id')
                    ->where('children.alert_status', '=', Child::ALERT_STATUS_ACCEPTED)
                    ->where('children.tenant_id', '=', $tenant->id)
                    ->where('children_cases.case_status', '=', 'in_progress')
                    ->where('case_steps_observacao.step_index', '=', 60)
                    ->count();
                $obs2 =
                    DB::table('children')
                    ->join('case_steps_observacao', 'children.current_step_id', '=', 'case_steps_observacao.id')
                    ->join('children_cases', 'children.id', '=', 'children_cases.child_id')
                    ->where('children.alert_status', '=', Child::ALERT_STATUS_ACCEPTED)
                    ->where('children.tenant_id', '=', $tenant->id)
                    ->where('children_cases.case_status', '=', 'in_progress')
                    ->where('case_steps_observacao.step_index', '=', 70)
                    ->count();
                $obs3 =
                    DB::table('children')
                    ->join('case_steps_observacao', 'children.current_step_id', '=', 'case_steps_observacao.id')
                    ->join('children_cases', 'children.id', '=', 'children_cases.child_id')
                    ->where('children.alert_status', '=', Child::ALERT_STATUS_ACCEPTED)
                    ->where('children.tenant_id', '=', $tenant->id)
                    ->where('children_cases.case_status', '=', 'in_progress')
                    ->where('case_steps_observacao.step_index', '=', 80)
                    ->count();
                $obs4 =
                    DB::table('children')
                    ->join('case_steps_observacao', 'children.current_step_id', '=', 'case_steps_observacao.id')
                    ->join('children_cases', 'children.id', '=', 'children_cases.child_id')
                    ->where('children.alert_status', '=', Child::ALERT_STATUS_ACCEPTED)
                    ->where('children.tenant_id', '=', $tenant->id)
                    ->where('children_cases.case_status', '=', 'in_progress')
                    ->where('case_steps_observacao.step_index', '=', 90)
                    ->count();

                $concluidos =

                    Child::whereHas('cases', function ($query) {
                        $query->where(['case_status' => 'completed']);
                    })->where(
                        [
                            'tenant_id' => $tenant->id,
                            'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                            'child_status' => Child::STATUS_IN_SCHOOL
                        ]
                    )->count();


                array_push(
                    $cities,
                    [
                        'Adesão' => $adesao,

                        'Código IBGE 7 Dígitos' => $city->ibge_city_id,

                        'UF' => $city->uf,

                        'Município' => $city->name,

                        'Status na plataforma' => $status,

                        'Último acesso' => $tenant->last_active_at->format('d/m/Y'),

                        'Não Localizados (2017, INEP/MEC)' => '',

                        'Meta (20%)' => $city->goal->goal,

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
                        Child::whereHas('cases', function ($query) {
                            $query->where(['case_status' => 'in_progress']);
                        })->where(
                            [
                                'tenant_id' => $tenant->id,
                                'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                'current_step_type' => "BuscaAtivaEscolar\CaseSteps\Pesquisa"
                            ]
                        )->count(),
                        'Análise' =>
                        Child::whereHas('cases', function ($query) {
                            $query->where(['case_status' => 'in_progress']);
                        })->where(
                            [
                                'tenant_id' => $tenant->id,
                                'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                'current_step_type' => "BuscaAtivaEscolar\CaseSteps\AnaliseTecnica"
                            ]
                        )->count(),
                        'Gestão' =>
                        Child::whereHas('cases', function ($query) {
                            $query->where(['case_status' => 'in_progress']);
                        })->where(
                            [
                                'tenant_id' => $tenant->id,
                                'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                'current_step_type' => "BuscaAtivaEscolar\CaseSteps\GestaoDoCaso"
                            ]
                        )->count(),
                        '(Re)Matrícula' =>
                        Child::whereHas('cases', function ($query) {
                            $query->where(['case_status' => 'in_progress']);
                        })->where(
                            [
                                'tenant_id' => $tenant->id,
                                'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                'current_step_type' => "BuscaAtivaEscolar\CaseSteps\Rematricula"
                            ]
                        )->count(),

                        'OBS 1' => $obs1,
                        'OBS 2' => $obs2,
                        'OBS 3' => $obs3,
                        'OBS 4' => $obs4,

                        'Interrompidos' =>
                        Child::whereHas('cases', function ($query) {
                            $query->where(['case_status' => 'interrupted']);
                        })->where(
                            [
                                'tenant_id' => $tenant->id,
                                'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                'child_status' => Child::STATUS_OUT_OF_SCHOOL
                            ]
                        )->count(),
                        'Cancelados' =>
                        Child::whereHas('cases', function ($query) {
                            $query->where(['case_status' => 'cancelled']);
                        })->where(
                            [
                                'tenant_id' => $tenant->id,
                                'alert_status' => Child::ALERT_STATUS_ACCEPTED,
                                'child_status' => Child::STATUS_CANCELLED
                            ]
                        )->count(),

                        'Concluídos' => $concluidos,

                        'CeA na Escola' => $obs1 + $obs2 + $obs3 + $obs4 + $concluidos,
                        '% Atingimento da Meta' => (($obs1 + $obs2 + $obs3 + $obs4 + $concluidos) * 100) / $city->goal->goal,

                        'ID-CIDADE' => $city->id
                    ]
                );
            } else {
                array_push(
                    $cities,
                    [
                        'Adesão' => $adesao,
                        'Código IBGE 7 Dígitos' => $city->ibge_city_id,
                        'UF' => $city->uf,
                        'Município' => $city->name,

                        'Status na plataforma' => $status,
                        'Último acesso' => '',

                        'Não Localizados (2017, INEP/MEC)' => '',
                        'Meta (20%)' => $city->goal->goal,
                        'Aprovados' => '',
                        'Rejeitados' => '',
                        'Pendentes' => '',
                        'Pesquisa' => '',
                        'Análise' => '',
                        'Gestão' => '',
                        '(Re)Matrícula' => '',
                        'OBS 1' => '',
                        'OBS 2' => '',
                        'OBS 3' => '',
                        'OBS 4' => '',
                        'Interrompidos' => '',
                        'Cancelados' => '',
                        'Concluídos' => '',
                        'CeA na Escola' => '',
                        '% Atingimento da Meta' => '',
                    ]
                );
            }
        }

        /*Excel::create('buscaativaescolar_report_selo'.Carbon::now()->timestamp, function($report_xls) use ($cities) {
            $report_xls->sheet('municipio', function($sheet) use ($cities) {
                $sheet->setOrientation('landscape');
                $sheet->fromArray($cities);
            });
        })->store('xls', storage_path('app/attachments/selo_reports'));*/
        function usersGenerator($cities)
        {
            foreach ($cities as $city) {
                yield $city;
            }
        }
        $cityResult = usersGenerator($cities);
        File::makeDirectory(storage_path("app/attachments/selo_reports/" . Carbon::now()->timestamp), $mode = 0777, true, true);
        (new FastExcel($cityResult))->export(storage_path('app/attachments/selo_reports/' . Carbon::now()->timestamp . '/buscaativaescolar_selo_' . Carbon::now()->timestamp . '.xlsx'));
        Log::info("Finalizando processo de exportacao dos dados do Selo UNICEF");
    }

    public function renderStatusTenant($adesao, $tenant_signup, $tenant)
    {

        if ($adesao == "Não") {
            return "";
        }

        if ($tenant == null and $tenant_signup != null) {

            if (!$tenant_signup->judged_by) return 'pendente';
            if (!$tenant_signup->is_approved) return 'rejeitado';
            if (!$tenant_signup->is_provisioned) return 'aguardando configuração';
        }

        if ($tenant != null) {
            if ($tenant->deleted_at != null) {
                return 'desativado';
            }
            if ($tenant->last_active_at->diffInDays(Carbon::now()) >= 30) {
                return 'inativo';
            }
            if ($tenant->last_active_at->diffInDays(Carbon::now()) < 30) {
                return 'ativo';
            }
        }
    }
}
