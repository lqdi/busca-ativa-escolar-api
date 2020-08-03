<?php

namespace BuscaAtivaEscolar\Console\Commands;

use BuscaAtivaEscolar\Classe;
use BuscaAtivaEscolar\EmailTypes\ClassFrequencyNotification;
use BuscaAtivaEscolar\Frequency;
use BuscaAtivaEscolar\School;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailsActualizeFrequency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maintenance:send_emails_actualize_frequency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a email to all schools that have classes with controll of frequency';

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
        //ini_set('memory_limit', '2G');

        $this->comment("INICIANDO PROCESSO DE ENVIO DE EMAILS PARA AS ESCOLAS COM BASE NAS ESCOLAS");
        School::has('classes')->chunk(50, function($schools){

            foreach ($schools as $school){

                $today = date('d'); //number of day in the month
                $today_week = date('w'); //number of day in the week (1 - 7)
                $dayOfMidleOfMonth = intval(date("t")/2); //number

                //DIARIA
                if( $school->periodicidade === School::PERIODICIDADE_DIARIA ) {
                    $this->createFrequenciesBySchool($school);
                    try {
                        $message = new ClassFrequencyNotification($school, School::PERIODICIDADE_DIARIA);
                        Mail::to($school->school_email)->send($message);
                        $this->info("MENSAGEM ENCAMINHADA COM SUCESSO - INEP: ". $school->id. " | ". $school->name);
                    } catch (\Exception $ex) {
                        $this->info($ex->getMessage());
                        $this->info("ERRO NO ENVIO DE MENSAGEM INEP: ". $school->id. " | ". $school->name);
                    }
                }

                //SEMANAL
                if( $school->periodicidade === School::PERIODICIDADE_SEMANAL AND ( $today_week === 1) ) {
                    try {
                        $message = new ClassFrequencyNotification($school, School::PERIODICIDADE_SEMANAL);
                        Mail::to($school->school_email)->send($message);
                        $this->info("MENSAGEM ENCAMINHADA COM SUCESSO - INEP: ". $school->id. " | ". $school->name);
                    } catch (\Exception $ex) {
                        $this->info($ex->getMessage());
                        $this->info("ERRO NO ENVIO DE MENSAGEM INEP: ". $school->id. " | ". $school->name);
                    }
                }

                //QUINZENAL
                if( $school->periodicidade === School::PERIODICIDADE_QUINZENAL AND ( $today === ($dayOfMidleOfMonth + 1) OR $today === 1 ) ) {
                    try {
                        $message = new ClassFrequencyNotification($school, School::PERIODICIDADE_QUINZENAL);
                        Mail::to($school->school_email)->send($message);
                        $this->info("MENSAGEM ENCAMINHADA COM SUCESSO - INEP: ". $school->id. " | ". $school->name);
                    } catch (\Exception $ex) {
                        $this->info($ex->getMessage());
                        $this->info("ERRO NO ENVIO DE MENSAGEM INEP: ". $school->id. " | ". $school->name);
                    }
                }

                //MENSAL
                if( $school->periodicidade === School::PERIODICIDADE_MENSAL AND ( $today === 1 ) ) {
                    try {
                        $message = new ClassFrequencyNotification($school, School::PERIODICIDADE_MENSAL);
                        Mail::to($school->school_email)->send($message);
                        $this->info("MENSAGEM ENCAMINHADA COM SUCESSO - INEP: ". $school->id. " | ". $school->name);
                    } catch (\Exception $ex) {
                        $this->info($ex->getMessage());
                        $this->info("ERRO NO ENVIO DE MENSAGEM INEP: ". $school->id. " | ". $school->name);
                    }
                }

            }

        });
        $this->comment("FINALIZANDO PROCESSO DE ENVIO DE EMAILS PARA AS ESCOLAS COM BASE NAS ESCOLAS");

    }

    //CRIA FREQUENCIAS DEFAULT PARA AS TURMAS DE UMA ESCOLA
    public function createFrequenciesBySchool($school){
        foreach ($school->classes as $classe){

            //VERIFICA SE TEM FREQUENCIA HOJE!
            $savedFrequency = Frequency::where([
                ['created_at', '>=', Carbon::today()],
                ['classes_id', '>=', $classe->id]
            ])->first();

            if ( $savedFrequency == null ){
                $frequency = new Frequency();
                $frequency->qty_presence = 0;
                $frequency->qty_enrollment = 0;
                $frequency->classes_id = $classe->id;
                $frequency->save();
            }
        }
    }
}
