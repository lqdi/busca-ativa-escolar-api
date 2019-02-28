<?php

namespace BuscaAtivaEscolar\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class schoolNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $name;
    private $email;

    public function __construct($school)
    {
        $this->name = $school->name;
        $this->email = $school->school_email;
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
            ->subject("[Busca Ativa Escolar] Escolas")
            ->line($this->name)
            ->line("Precisamos da sua colaboração!")
            ->line("Por meio da plataforma Busca Ativa Escolar, identificamos crianças que evadiram da escola recentemente, sendo que a última escola que estudaram foi a sua. Necessitamos localizá-las e, para tanto, precisamos da sua colaboração para adicionar informações dos endereços das crianças em destaque.")
            ->line("O procedimento é muito simples. Basta clicar no botão abaixo, acessar o cadastro de cada criança e complementar as informações requeridas.")
            ->action('Ajudar', $this->getUrlToken())
            ->line("Agradecemos imensamente sua disposição em colaborar para a garantia do direito à educação de todas as crianças que residem em nosso município!");

		$this->subject("Precisamos da sua colaboração!");
;
        return $this->view('vendor.notifications.email', $message->toArray());
    }
    private function getUrlToken (){
        return env('APP_URL_ESCOLAS')."?email={$this->email}&token='akjdfkajsdfjaksdfjlkasdjflksd'";
    }
}
