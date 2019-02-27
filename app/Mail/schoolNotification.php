<?php

namespace BuscaAtivaEscolar\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class schoolNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
            ->subject("Nova solicitação de ajuda")
            ->greeting("Solicitante:")
            ->line("Município")
            ->line("E-mail:")
            ->line("Telefone:")
            ->line("Navegador:");

        return $this->view('vendor.notifications.email', $message->toArray());
    }
}
