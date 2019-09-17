<?php

namespace BuscaAtivaEscolar\Console\Commands;

use BuscaAtivaEscolar\CaseSteps\Alerta;
use BuscaAtivaEscolar\CaseSteps\Pesquisa;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\ChildCase;
use Illuminate\Console\Command;

class FixErrorCasesDisabled extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'correcoes:casos_travados_em_todas_as_etapas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Localiza casos bloqueados em determinadas etapas e os libera para avançar para a etapa seguinte';

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

        Child::chunk(200, function ($children){

            foreach ($children as $child){

                //Se a crianca/ adolescente tem um current case
                if( $child->currentCase != null ) {

                    $currentStep = $child->currentStep;

                    //se a crianca/ adolescente tem o current case completo
                    if( $currentStep->is_completed ) {

                        $tenant = \BuscaAtivaEscolar\Tenant::where('id', $child->tenant_id)->first();

                        $this->comment("Cidade: " . $tenant->name);

                        $this->comment("Crianca: " . $child->name);

                        $this->comment("Child | Current step id: " . $child->current_step_id);
                        $this->comment("Child | Current step type: " . $child->current_step_type);

                        $this->comment("Case | Current step id: " . $child->currentCase->current_step_id);
                        $this->comment("Case | Current step type: " . $child->currentCase->current_step_type);

                        $this->comment("");

                        //se está no alerta precisa avancar para pesquisa
                        if( $child->current_step_type == "BuscaAtivaEscolar\CaseSteps\Alerta"){

//                            $case = ChildCase::where('child_id', $child->id)->first();
//                            $alerta = Alerta::where('child_id', $child->id)->first();
//                            $pesquisa = Pesquisa::where('child_id', $child->id)->first();
//
//                            if( $alerta->nis == ""){ $alerta->nis = null; }
//
//                            $alerta->is_completed = true;
//
//                            $child->current_step_id = $pesquisa->id;
//                            $child->current_step_type = 'BuscaAtivaEscolar\CaseSteps\Pesquisa';
//
//                            $case->current_step_id = $pesquisa->id;
//                            $case->current_step_type = 'BuscaAtivaEscolar\CaseSteps\Pesquisa';
//
//                            $pesquisa->setFields($alerta->toArray());
//
//                            $pesquisa->is_completed = false;
//
//                            $alerta->save();
//                            $pesquisa->save();
//                            $case->save();
//                            $child->save();

                        } else {

                            $currentStep->is_completed = false;
                            $currentStep->save();

                        }

                    }

                }
            }

        });
    }
}
