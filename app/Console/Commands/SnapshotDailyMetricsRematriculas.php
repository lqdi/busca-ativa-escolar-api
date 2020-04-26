<?php

namespace BuscaAtivaEscolar\Console\Commands;

use BuscaAtivaEscolar\CaseSteps\Rematricula;
use BuscaAtivaEscolar\DailyMetricRematricula;
use BuscaAtivaEscolar\Tenant;
use Illuminate\Console\Command;

class SnapshotDailyMetricsRematriculas extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'snapshot:daily_metrics_rematriculas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria o snapshot do número de rematriculas diariamente';

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

                //Faz a soma relativa ao dia:
                $count = Rematricula::whereHas('cases', function ($query) {
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

                $this->comment("[index:{$today}] Tenant #{$tenant->id} - {$tenant->name} - {$count}");

                $dailyMetric = new DailyMetricRematricula(
                    [
                        'tenant_id' => $tenant->id,
                        'date' => $today,
                        'region' => $tenant->city->region,
                        'state' => $tenant->city->uf,
                        'city' => $tenant->city->name,
                        'count' => $count,
                        'data' => null,
                    ]
                );

                $dailyMetric->save();


            }

        });


    }
}
