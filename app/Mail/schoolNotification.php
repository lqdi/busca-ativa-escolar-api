<?php

namespace BuscaAtivaEscolar\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;

class SchoolNotification extends Mailable
{

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $name;

    protected $email;

    protected $job_id;

    public function __construct($school, $job_id)
    {
        $this->name = $school->name;
        $this->email = $school->school_email;
        $this->job_id = $job_id;
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
            ->line("Agradecemos imensamente sua disposição em colaborar para a garantia do direito à educação de todas as crianças que residem em nosso município!")
            ->action('Ajudar', $this->getUrlToken());

		$this->subject("Precisamos da sua colaboração!");

		$this->withSwiftMessage(function($message){
            $headers = $message->getHeaders();
            $headers->addTextHeader('message-id', $this->job_id);
        });

        return $this->view('vendor.notifications.email', $message->toArray());
    }

    private function getUrlToken (){
        return env('APP_URL_ESCOLAS')."?email=&token='akjdfkajsdfjaksdfjlkasdjflksd'";
    }
}
