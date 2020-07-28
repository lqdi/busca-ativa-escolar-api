<?php

namespace BuscaAtivaEscolar\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;

class SchoolFrequencyNotification extends Mailable
{

    protected $job_id;
    protected $school;

    public function __construct($school, $job_id)
    {
        $this->job_id = $job_id;
        $this->school = $school;
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
            ->subject("[Busca Ativa Escolar] Turmas")
            ->line($this->school->name)
            ->line("Precisamos da sua colaboração!")
            ->line("MENSAGEM AQUI ...")
            ->action('Colaborar', $this->getUrlToken());

        $this->subject("Precisamos da sua colaboração!");

        $this->withSwiftMessage(function ($message) {
            $headers = $message->getHeaders();
            $headers->addTextHeader('message-id', $this->job_id);
        });

        return $this->view('vendor.notifications.email', $message->toArray());
    }

    private function getUrlToken()
    {
        return env('APP_PANEL_URL') . "/classes/" . $this->school->id;
    }
}
