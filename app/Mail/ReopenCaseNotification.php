<?php


namespace BuscaAtivaEscolar\Mail;


use BuscaAtivaEscolar\ReopeningRequests;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

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

    const TYPE_REOPEN = "reopen";
    const TYPE_TRANSFER = "transfer";
    const TYPE_ACCEPT_REOPEN = "accept_reopen";
    const TYPE_REJECT_REOPEN = "reject_reopen";
    const TYPE_ACCEPT_TRANSFER = "accept_transfer";
    const TYPE_REJECT_TRANSFER = "reject_transfer";


    /**
     * ReopenCaseNotification constructor.
     * @param $child_id
     * @param $child_name
     * @param $child_case_id
     * @param null $reason
     * @param $recipient
     * @param $requester
     * @param $reopening_request_id
     * @param null $tenant_requester
     * @param null $tenant_recipient
     * @param $type_notification
     */
    public function __construct(
        $child_id,
        $child_name,
        $child_case_id,
        $reason = null,
        $recipient,
        $requester,
        $reopening_request_id,
        $tenant_requester = null,
        $tenant_recipient = null,
        $type_notification)
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
        $this->type_request = $type_notification;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if ( $this->type_request == ReopenCaseNotification::TYPE_REOPEN ) {

            $message = (new MailMessage())
                ->success()
                ->line($this->recipient.", ")
                ->line( "O usuário(a) ".$this->requester." solicitou sua autorização para reabertura do caso abaixo: ")
                ->line( new HtmlString( env('APP_PANEL_URL')."/children/view/".$this->child_id."/consolidated" ) )
                ->line("Motivo: ".$this->reason)
                ->line("Para visualizar todas as solicitações de reabertura e transferência de casos, clique no botão abaixo.")
                ->action('Visualizar solicitações', $this->getUrlReopenToken());

            $this->subject("[Busca Ativa Escolar] Reabertura de caso - ".$this->child_name);

            return $this->view('vendor.notifications.email', $message->toArray());
        }

        if ( $this->type_request == ReopenCaseNotification::TYPE_TRANSFER ) {

            $message = (new MailMessage())
                ->success()
                ->line($this->recipient.", ")
                ->line("O usuário(a) ".$this->requester." do município de ".$this->tenant_requester->name." solicitou sua autorização para a transferência de município do caso abaixo: ")
                ->line( new HtmlString( env('APP_PANEL_URL')."/children/view/".$this->child_id."/consolidated" ) )
                ->line("Motivo: ".$this->reason)
                ->line("Para visualizar as solicitações, clique no botão abaixo.")
                ->action('Visualizar solicitações', $this->getUrlTransferToken());

            $this->subject("[Busca Ativa Escolar] Solicitação de transferência de caso - ".$this->child_name);

            return $this->view('vendor.notifications.email', $message->toArray());
        }

        if ( $this->type_request == ReopenCaseNotification::TYPE_ACCEPT_REOPEN) {

            $message = (new MailMessage())
                ->success()
                ->line($this->recipient.", ")
                ->line("O usuário(a) ".$this->requester." aprovou a sua solicitação para reabertura do caso - ".$this->child_name.". Para acessar o caso interrompido e o novo caso em andamento clique no link abaixo:")
                ->line( new HtmlString( env('APP_PANEL_URL')."/children/view/".$this->child_id."/consolidated" ) );

            $this->subject("[Busca Ativa Escolar] Solicitação de reabertura de caso - ".$this->child_name);

            return $this->view('vendor.notifications.email', $message->toArray());
        }

        if ( $this->type_request == ReopenCaseNotification::TYPE_REJECT_REOPEN ) {

            $message = (new MailMessage())
                ->success()
                ->line($this->recipient.", ")
                ->line("O usuário(a) ".$this->requester." não aprovou a sua solicitação para reabertura do caso - ".$this->child_name.". Para acessar o caso clique no link abaixo:")
                ->line( new HtmlString( env('APP_PANEL_URL')."/children/view/".$this->child_id."/consolidated" ) );

            $this->subject("[Busca Ativa Escolar] Solicitação de reabertura de caso - ".$this->child_name);

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