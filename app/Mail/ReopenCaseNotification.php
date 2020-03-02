<?php


namespace BuscaAtivaEscolar\Mail;


use BuscaAtivaEscolar\ReopeningRequests;
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
    protected $reopening_request_id;

    protected $tenant_requester;
    protected $tenant_recipient;
    protected $type_request;


    /**
     * ReopenCaseNotification constructor.
     * @param $child_id
     * @param $child_name
     * @param $child_case_id
     * @param $reason
     * @param $recipient
     * @param $requester
     * @param $reopening_request_id
     */
    public function __construct($child_id, $child_name, $child_case_id, $reason, $recipient, $requester, $reopening_request_id, $tenant_requester = null, $tenant_recipient = null, $type_request)
    {
        $this->child_id = $child_id;
        $this->child_name = $child_name;
        $this->child_case_id = $child_case_id;
        $this->reason = $reason;
        $this->recipient = $recipient;
        $this->requester = $requester;
        $this->reopening_request_id = $reopening_request_id;
        $this->tenant_requester = $tenant_requester;
        $this->tenant_recipient = $tenant_recipient;
        $this->type_request = $type_request;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if ( $this->type_request == ReopeningRequests::TYPE_REQUEST_REOPEN) {

            $message = (new MailMessage())
                ->success()
                ->line($this->recipient.", ")
                ->line("O usuário ".$this->requester." solicitou sua autorização para reabertura do caso #".$this->child_case_id." - ".$this->child_name)
                ->line("Motivo: ".$this->reason)
                ->line("Para autorizar, clique no botão abaixo.")
                ->action('Visualizar solicitações', $this->getUrlReopenToken());

            $this->subject("[Busca Ativa Escolar] Reabertura de caso - ".$this->child_name);

            return $this->view('vendor.notifications.email', $message->toArray());
        }

        if ( $this->type_request == ReopeningRequests::TYPE_REQUEST_TRANSFER) {

            $message = (new MailMessage())
                ->success()
                ->line($this->recipient.", ")
                ->line("O usuário ".$this->requester." do município de ".$this->tenant_requester->name." solicitou sua autorização para transferência do caso #".$this->child_case_id." - ".$this->child_name)
                ->line("Motivo: ".$this->reason)
                ->line("Para visualizar as solicitações, clique no botão abaixo.")
                ->action('Visualizar solicitações', $this->getUrlTransferToken());

            $this->subject("[Busca Ativa Escolar] Solicitação de transferência de caso - ".$this->child_name);

            return $this->view('vendor.notifications.email', $message->toArray());
        }

    }

    private function getUrlTransferToken (){
        return env('APP_PANEL_URL')."/checks";
    }

    private function getUrlReopenToken (){
        return env('APP_PANEL_URL')."/checks";
    }

}