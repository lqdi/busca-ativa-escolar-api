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

        $message = (new MailMessage())
            ->success()

            ->subject("[Busca Ativa Escolar] Controle de frequência - Turma ".$this->class->name)

            ->line($this->class->school->name. " - INEP: " .$this->class->school->id)

            ->line("A secretaria de educação do seu município solicita o registro de frequência da turma ".$this->class->name. " ".$this->class->shift )

            ->action('Cadastrar turmas', $this->getUrlToken());

        $this->subject("[Busca Ativa Escolar] Controle de frequência - Turma ".$this->class->name);

        return $this->view('vendor.notifications.email', $message->toArray());
    }

    private function getUrlToken()
    {
        return env('APP_PANEL_URL') . "/classes/" . $this->class->school->id . "/" .$this->class->id;
    }
}