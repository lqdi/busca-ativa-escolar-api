<?php

namespace BuscaAtivaEscolar\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Log;

class InserirDiaAusenteGraficoRematriculas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maintenance:inserir_dia_ausente_grafico_rematriculas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rotina para inserir dia ausente no gráfico de rematriculas';

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
        set_time_limit(0);
        ini_set('memory_limit', '2G');

        $this->comment('Processo de inserção iniciado!');

        $sql = "SELECT * FROM daily_metrics_consolidated where date = '2020-03-30'";
        $values = DB::select($sql);

        foreach ($values as $value) {
            $this->insereDados($value);
        }

        $this->comment('Processo de inserção Finalizado!');
    }

    private function insereDados($dados)
    {
        $sql = "INSERT into daily_metrics_consolidated (tenant_id, date, region,state, city, in_observation, out_of_school, cancelled, in_school, interrupted, transferred, justified_cancelled, selo, data) 
values ('$dados->tenant_id', '2020-03-31', '$dados->region', '$dados->state', '$dados->city', '$dados->in_observation', '$dados->out_of_school','$dados->cancelled', '$dados->in_school', '$dados->interrupted', '$dados->transferred', '$dados->justified_cancelled', '$dados->selo','$dados->data')";
        try {
            DB::insert($sql);
            $this->comment($dados->tenant_id . ' atualizado ');
            Log::info($dados->tenant_id . ' atualizado ');
        } catch (\Exception $e) {
            $this->comment('erro ');
            return false;
        }
    }
}
