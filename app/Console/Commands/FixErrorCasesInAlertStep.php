<?php

namespace BuscaAtivaEscolar\Console\Commands;

use BuscaAtivaEscolar\CaseSteps\Alerta;
use BuscaAtivaEscolar\CaseSteps\Pesquisa;
use BuscaAtivaEscolar\Child;
use function foo\func;
use Illuminate\Console\Command;
use Log;

class FixErrorCasesInAlertStep extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'correcoes:casos_travados_etapa_alerta';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Corrigir erro dos casos que permanecem na etapa de Alerta e deveriam estar na etapa de Pesquisa, considerando a possibilidade de erros como falta de endereço e bairro (campos obrigatórios para aprovacao de um alerta)';

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
        $this->comment("Iniciando correcoes");
        $qtd_alerts = Child::where(['current_step_type' => 'BuscaAtivaEscolar\CaseSteps\Alerta', 'alert_status' => 'accepted'])->count();
        $children = Child::where(['current_step_type' => 'BuscaAtivaEscolar\CaseSteps\Alerta', 'alert_status' => 'accepted'])->get();
        foreach ($children as $child){
            $alerta = Alerta::where('child_id', $child->id)->first();
            $pesquisa = Pesquisa::where('child_id', $child->id)->first();

            if( $alerta->nis == ""){ $alerta->nis = null; }

            $child->current_step_id = $pesquisa->id;
            $child->current_step_type = 'BuscaAtivaEscolar\CaseSteps\Pesquisa';

            $pesquisa->setFields($alerta->toArray());

            $alerta->save();
            $pesquisa->save();
            $child->save();
        }
        $this->comment("Finalizando correcoes dos ".$qtd_alerts." alertas");
    }
}
