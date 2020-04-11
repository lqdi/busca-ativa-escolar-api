<?php

namespace BuscaAtivaEscolar\Console\Commands;

use Illuminate\Console\Command;
use BuscaAtivaEscolar\Child;
use DB;
use Log;

class removeInconsistenciesCases extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maintenance:remove_inconsistencies_cases';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove casos inconsistencias da base de dados';

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
        //Consulta casos inconsistêntes
        $sql = "SELECT c.id
                    FROM children c
                    JOIN case_steps_alerta csa ON csa.child_id = c.id
                    where c.alert_status <> csa.alert_status";

        $queryChildrenInconsistencies = DB::select($sql);
        $resultArrayQueryChildrenInconsistencies = json_decode(json_encode($queryChildrenInconsistencies), true);
        //Contagem
        $totalCriancaInconsistentes = count($resultArrayQueryChildrenInconsistencies);

        //Consulta crianças sem alerta
        $queryCriancaSemAlerta = Child::doesntHave('alert')->get();
        //Contagem
        $totalCriancaSemAlerta = Child::doesntHave('alert')->count();

        if(($totalCriancaSemAlerta == 0) && ($totalCriancaInconsistentes == 0)){
            $this->comment('Banco de dados consistente!');
            return;
        }

        $resposta = $this->ask("Essa ação removera $totalCriancaSemAlerta crianças sem alerta e $totalCriancaInconsistentes criancas inconsistencias no banco de dados\n faça um backup antes pois as mudanças não poderão ser desfeitas.\n Deseja continuar? sim ou não.");

        if ($resposta == 'sim') {

            foreach ($queryCriancaSemAlerta as $child) {
                $this->comment('Crianca sem alerta id: ' . $child->id . ' excluido!');
                $sql = "DELETE c FROM children c where c.id = '$child->id'";
                DB::select($sql);
                Log::info('Criança sem alerta exluída id: ' . $child->id);

            }

            foreach ($resultArrayQueryChildrenInconsistencies as $child) {
                $id = $child['id'];
                $this->comment('inconsistencia id: ' . $id . ' excluído!');
                $sql = "DELETE c FROM children c where c.id = '$id'";
                DB::select($sql);
                Log::info('Criança inconsistente exluída id: ' . $id);
            }
        }
        $this->comment('Concluído! ' . $totalCriancaSemAlerta . ' Crianças sem alerta, ' . $totalCriancaInconsistentes . ' Inconsistências');
        Log::info('Processo finalizado: ' . $totalCriancaSemAlerta . ' Crianças sem alerta' . $totalCriancaInconsistentes . ' Inconsistências');

    }
}
