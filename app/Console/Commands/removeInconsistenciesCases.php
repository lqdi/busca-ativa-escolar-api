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

        //Consulta crianças alguma valor no conjunto de tabelas
        $sql = "SELECT * FROM children c WHERE 
                c.id NOT IN (SELECT child_id FROM case_steps_alerta) || 
                c.id NOT IN (SELECT child_id FROM case_steps_analise_tecnica) ||
                c.id NOT IN (SELECT child_id FROM case_steps_gestao_do_caso) || 
                c.id NOT IN (SELECT child_id FROM case_steps_observacao) ||
                c.id NOT IN (SELECT child_id FROM case_steps_pesquisa) ||
                c.id NOT IN (SELECT child_id FROM case_steps_rematricula) ||
                c.id NOT IN (SELECT child_id FROM children_cases)";
        $queryCriancaSemAlerta = DB::select($sql);
        $resultArrayQueryCriancaSemAlerta = json_decode(json_encode($queryCriancaSemAlerta), true);
        //Contagem
        $totalCriancaSemAlerta = count($resultArrayQueryCriancaSemAlerta);

        if(($totalCriancaSemAlerta == 0) && ($totalCriancaInconsistentes == 0)){
            $this->comment('Banco de dados consistente!');
            return;
        }

        $resposta = $this->ask("Essa ação removera $totalCriancaSemAlerta crianças sem alerta e $totalCriancaInconsistentes criancas inconsistencias no banco de dados\n faça um backup antes pois as mudanças não poderão ser desfeitas.\n Deseja continuar? sim ou não.");

        if ($resposta == 'sim') {
            foreach ($resultArrayQueryCriancaSemAlerta as $child) {
                $id = $child['id'];
                $this->comment('Crianca sem alerta id: ' . $id . ' excluido!');
                DB::table('children')->where('id', $id)->delete();
                DB::table('children_cases')->where('child_id', $id)->delete();
                DB::table('case_steps_alerta')->where('child_id', $id)->delete();
                DB::table('case_steps_analise_tecnica')->where('child_id', $id)->delete();
                DB::table('case_steps_gestao_do_caso')->where('child_id', $id)->delete();
                DB::table('case_steps_observacao')->where('child_id', $id)->delete();
                DB::table('case_steps_pesquisa')->where('child_id', $id)->delete();
                DB::table('case_steps_rematricula')->where('child_id', $id)->delete();
                Log::info('Criança sem alerta exluída id: ' . $id);

            }

            foreach ($resultArrayQueryChildrenInconsistencies as $child) {
                $id = $child['id'];
                $this->comment('inconsistencia id: ' . $id . ' excluído!');
                DB::table('children')->where('id', $id)->delete();
                DB::table('children_cases')->where('child_id', $id)->delete();
                DB::table('case_steps_alerta')->where('child_id', $id)->delete();
                DB::table('case_steps_analise_tecnica')->where('child_id', $id)->delete();
                DB::table('case_steps_gestao_do_caso')->where('child_id', $id)->delete();
                DB::table('case_steps_observacao')->where('child_id', $id)->delete();
                DB::table('case_steps_pesquisa')->where('child_id', $id)->delete();
                DB::table('case_steps_rematricula')->where('child_id', $id)->delete();
                Log::info('Caso inconsistente exluída id: ' . $id);
            }
        }
        $this->comment('Concluído! ' . $totalCriancaSemAlerta . ' Crianças sem alerta, ' . $totalCriancaInconsistentes . ' Inconsistências');
        Log::info('Processo finalizado: ' . $totalCriancaSemAlerta . ' Crianças sem alerta' . $totalCriancaInconsistentes . ' Inconsistências');

    }
}
