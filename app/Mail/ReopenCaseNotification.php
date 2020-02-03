<?php


namespace BuscaAtivaEscolar\Mail;


use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;

class ReopenCaseNotification extends Mailable
{

    protected $child_id;
    protected $child_name;
    protected $child_case_id;
    protected $reason;
    protected $recipient;
    protected $requester;

    /**
     * ReopenCaseNotification constructor.
     * @param $child_id
     * @param $child_name
     * @param $child_case_id
     * @param $reason
     * @param $recipient
     * @param $requester
     */
    public function __construct($child_id, $child_name, $child_case_id, $reason, $recipient, $requester)
    {
        $this->child_id = $child_id;
        $this->child_name = $child_name;
        $this->child_case_id = $child_case_id;
        $this->reason = $reason;
        $this->recipient = $recipient;
        $this->requester = $requester;
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
            ->line($this->recipient.", ")
            ->line("O usuário ".$this->requester." solicitou sua autorização para reabertura do caso #".$this->child_case_id." - ".$this->child_name)
            ->line("Motivo: ".$this->reason)
            ->line("Para autorizar, clique no botão abaixo.")
            ->action('Autorizar', $this->getUrlToken());

        $this->subject("[Busca Ativa Escolar] Reabertura de caso - ".$this->child_name);

        return $this->view('vendor.notifications.email', $message->toArray());
    }

    private function getUrlToken (){
        return env('APP_URL_ESCOLAS')."/children/view/".$this->child_id."/consolidated?reason".$this->reason;
    }

}