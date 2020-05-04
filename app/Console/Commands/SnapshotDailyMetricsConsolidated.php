<?php

namespace BuscaAtivaEscolar\Console\Commands;

use BuscaAtivaEscolar\CaseSteps\Rematricula;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\DailyMetricsConsolidated;
use BuscaAtivaEscolar\Tenant;
use Illuminate\Console\Command;

class SnapshotDailyMetricsConsolidated extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'snapshot:daily_metrics_consolidated';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria o snapshot do número de rematriculas diariamente e demais status por cidade, estado e pais';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $today = date('Y-m-d');

        $this->info("Iniciando Snapshot do número de rematriculas - {$today}");

        Tenant::chunk(500, function ($t) use ($today) {

            foreach($t as $tenant) {

                $in_observation = Child::query()
                ->where([
                        ['tenant_id', '=', $tenant->id],
                        ['child_status', '=',Child::STATUS_OBSERVATION]
                    ])
                    ->count();

                $out_of_school = Child::query()
                ->where([
                    ['tenant_id', '=', $tenant->id],
                    ['child_status', '=', Child::STATUS_OUT_OF_SCHOOL],
                    ['alert_status', '=', Child::ALERT_STATUS_ACCEPTED]
                ])
                ->count();

                $cancelled = Child::query()
                ->where([
                    ['tenant_id', '=', $tenant->id],
                    ['child_status', '=', Child::STATUS_CANCELLED],
                    ['alert_status', '=', Child::ALERT_STATUS_ACCEPTED]
                ])
                ->count();

                $in_school = Child::query()
                ->where([
                    ['tenant_id', '=', $tenant->id],
                    ['child_status', '=',Child::STATUS_IN_SCHOOL]
                ])
                ->count();

                $interrupted = Child::query()
                ->where([
                    ['tenant_id', '=', $tenant->id],
                    ['child_status', '=', Child::STATUS_INTERRUPTED],
                ])
                ->count();

                $transferred = Child::query()
                ->where([
                    ['tenant_id', '=', $tenant->id],
                    ['child_status', '=', Child::STATUS_TRANSFERRED]
                ])
                ->count();

                $enrollment = Rematricula::whereHas('cases', function ($query) {
                    $query->where(['case_status' => 'in_progress'])
                        ->orWhere(['cancel_reason' => 'city_transfer'])
                        ->orWhere(['cancel_reason' => 'death'])
                        ->orWhere(['cancel_reason' => 'not_found'])
                        ->orWhere(['case_status' => 'completed'])
                        ->orWhere(['case_status' => 'interrupted'])
                        ->orWhere(['case_status' => 'transferred']);
                })->where(
                    [
                        'tenant_id' => $tenant->id,
                        'is_completed' => true
                    ]
                )
                ->orderBy('completed_at', 'asc')
                ->count();

                $this->comment("[index:{$today}] Tenant #{$tenant->id} - {$tenant->name} - {$enrollment}");

                $dailyMetric = new DailyMetricsConsolidated(
                    [
                        'tenant_id' => $tenant->id,
                        'date' => $today,
                        'region' => $tenant->city->region,
                        'state' => $tenant->city->uf,
                        'city' => $tenant->city->name,

                        'in_observation' => $in_observation,
                        'out_of_school' => $out_of_school,
                        'cancelled' => $cancelled,
                        'in_school' => $in_school,
                        'interrupted' => $interrupted,
                        'transferred' => $transferred,

                        'enrollment' => $enrollment,
                        'data' => null,
                    ]
                );

                $dailyMetric->save();


            }

        });


    }
}
