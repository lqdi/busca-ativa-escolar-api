<?php

namespace BuscaAtivaEscolar\EmailTypes;

use BuscaAtivaEscolar\Mail\SchoolFrequencyNotification;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;

class ClassFrequencyNotification extends Mailable
{

    protected $periodicidade;
    protected $class;

    public function __construct($class, $periodicidade)
    {
        $this->class = $class;
        $this->periodicidade = $periodicidade;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        //FAZER O CONTROLE DO PERIODO AQUI
        //VERIFICAR SE O USUÁRIO SETOU DIÁRIO, SEMANAL, QUINZENAL OU MENSAL

        $message = (new MailMessage())
            ->success()
            ->subject("[Busca Ativa Escolar] Registro de frequência")

            ->line("Caro responsável pela turma ". $this->class->name)
            ->line("Precisamos de sua colaboração para auxílio no cadastro da frequência das turmas de sua escola.")
            ->action('Registrar frequência', $this->getUrlToken());

        $this->subject("[Busca Ativa Escolar] Registro de frequência");

//        $this->withSwiftMessage(function ($message) {
//            $headers = $message->getHeaders();
//            $headers->addTextHeader('message-id', $this->job_id);
//        });

        return $this->view('vendor.notifications.email', $message->toArray());
    }

    private function getUrlToken()
    {
        return env('APP_PANEL_URL') . "/classes/" . $this->class->school->id . "/" .$this->class->id;
    }
}