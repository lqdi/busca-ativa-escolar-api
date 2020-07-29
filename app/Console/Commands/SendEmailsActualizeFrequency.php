<?php

namespace BuscaAtivaEscolar\Console\Commands;

use BuscaAtivaEscolar\Classe;
use BuscaAtivaEscolar\EmailTypes\ClassFrequencyNotification;
use BuscaAtivaEscolar\School;
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

        $this->comment("INICIANDO PROCESSO DE ENVIO DE EMAILS PARA AS ESCOLAS COM BASE NAS TURMAS");

        Classe::chunk(50, function($classes){

            foreach ($classes as $class){

                $today = date('d'); //number day
                $today_week = date('w'); //number of day in the week
                $lastDayThisMonth = date("t");
                $dayOfMidleOfMonth = intval(date("t")/2);

                //DIARIO
                if( $class->school->periodicidade === School::PERIODICIDADE_DIARIA) {

                    try {

                        $message = new ClassFrequencyNotification($class, School::PERIODICIDADE_DIARIA);

                        Mail::to($class->school->school_email)
                            ->send($message);

                        $this->info("MENSAGEM ENCAMINHADA COM SUCESSO - INEP: ". $class->school->id. " | ". $class->school->name);

                    } catch (\Exception $ex) {
                        $this->info($ex->getMessage());
                        $this->info("ERRO NO ENVIO DE MENSAGEM INEP: ". $class->school->id. " | ". $class->school->name);

                    }

                }

                //SEMANAL
                if( $class->school->periodicidade === School::PERIODICIDADE_SEMANAL and ( $today_week === 1) ) {

                    try {

                        $message = new ClassFrequencyNotification($class, School::PERIODICIDADE_DIARIA);

                        Mail::to($class->school->school_email)
                            ->send($message);

                        $this->info("MENSAGEM ENCAMINHADA COM SUCESSO - INEP: ". $class->school->id. " | ". $class->school->name);

                    } catch (\Exception $ex) {
                        $this->info($ex->getMessage());
                        $this->info("ERRO NO ENVIO DE MENSAGEM INEP: ". $class->school->id. " | ". $class->school->name);

                    }

                }

                //QUINZENAL
                if( $class->school->periodicidade === School::PERIODICIDADE_QUINZENAL AND ($today === $dayOfMidleOfMonth) ) {

                    try {

                        $message = new ClassFrequencyNotification($class, School::PERIODICIDADE_QUINZENAL);

                        Mail::to($class->school->school_email)
                            ->send($message);

                        $this->info("MENSAGEM ENCAMINHADA COM SUCESSO - INEP: ". $class->school->id. " | ". $class->school->name);

                    } catch (\Exception $ex) {

                        $this->info("ERRO NO ENVIO DE MENSAGEM INEP: ". $class->school->id. " | ". $class->school->name);

                    }

                }

                //MENSAL
                if( $class->school->periodicidade === School::PERIODICIDADE_MENSAL AND ($today === $lastDayThisMonth ) ) {

                    try {

                        $message = new ClassFrequencyNotification($class, School::PERIODICIDADE_MENSAL);

                        Mail::to($class->school->school_email)
                            ->send($message);

                        $this->info("MENSAGEM ENCAMINHADA COM SUCESSO - INEP: ". $class->school->id. " | ". $class->school->name);

                    } catch (\Exception $ex) {

                        $this->info("ERRO NO ENVIO DE MENSAGEM INEP: ". $class->school->id. " | ". $class->school->name);

                    }

                }

            }

        });
        $this->comment("FINALIZANDO PROCESSO DE ENVIO DE EMAILS PARA AS ESCOLAS COM BASE NAS TURMAS");

    }
}
