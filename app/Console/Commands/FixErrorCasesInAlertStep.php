<?php

namespace BuscaAtivaEscolar\Console\Commands;

use BuscaAtivaEscolar\CaseSteps\Alerta;
use BuscaAtivaEscolar\CaseSteps\Pesquisa;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\ChildCase;
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

        $this->comment("INICIANDO A CORRECAO DO NIS EXISTENTE EM PESQUISA E NAO LOCALIZADO NA ETAPA ALERTA");
        Pesquisa::chunk(200, function ($pesquisas){
            foreach ($pesquisas as $pesquisa){
                if($pesquisa->nis != null OR $pesquisa->nis != ""){
                    $alerta = Alerta::where('child_id', $pesquisa->child_id)->first();
                    $this->comment('ATUALIZANDO O NIS DO ALERTA DA CRIANCA '.$alerta->name);
                    $alerta->nis = $pesquisa->nis;
                    $alerta->save();
                }
            }
        });
        $this->comment("FINALIZANDO A CORRECAO DO NIS");

        $this->comment("INICIANDO A CORRECAO DOS ALERTAS");
        $this->comment("Procurando alertas aprovados que estão travados na etapa Alerta");

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
        $this->comment("FINALIZANDO A CORRECAO DOS ".$qtd_alerts." ALERTAS");


        $this->comment("VERIFICANDO CASOS COM ETAPA DIFERENTE");
        $this->comment("Buscando case_types das criancas que diferem do seus respectivos case_types de CaseStep");


        Child::chunk(200, function ($children){

            foreach ( $children as $child ){

                $case = ChildCase::where('child_id', $child->id)->first();

                if( $case != null
                    AND $child->alert_status != "rejected"
                    AND $child->alert_status != "pending"
                    AND (
                        $child->current_step_type != $case->current_step_type
                        OR $child->current_step_id != $case->current_step_id) ) {

                    $this->comment("CHILD ". $child->name. " - ".$child->id);

                    $this->comment("CASE current_step_type ". $case->current_step_type);
                    $this->comment("CASE current_step_id ". $case->current_step_id);

                    $this->comment("CHILD current_step_type ". $child->current_step_type);
                    $this->comment("CHILD current_step_id ". $child->current_step_id);

                    $case->current_step_type = $child->current_step_type;
                    $case->current_step_id = $child->current_step_id;

                    $case->save();
                    $child->save();

                    $this->comment("DIFERENTES!");
                    $this->comment("--------------------------------------");
                }

            }

        });

        $this->comment("FINALIZANDO A VERIFICACAO DOS CASOS COM ETAPA DIFERENTES");

    }
}
