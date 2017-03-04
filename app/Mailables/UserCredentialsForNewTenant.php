<?php
/**
 * busca-ativa-escolar-api
 * SignupApproved.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/02/2017, 15:57
 */

namespace BuscaAtivaEscolar\Mailables;


use BuscaAtivaEscolar\SignUp;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\User;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;

class UserCredentialsForNewTenant extends Mailable {

	public $signup;
	public $tenant;
	public $user;
	public $initialPassword;

	public function __construct(SignUp $signup, Tenant $tenant, User $user, $initialPassword) {
		$this->signup = $signup;
		$this->tenant = $tenant;
		$this->user = $user;
		$this->initialPassword = $initialPassword;
	}

	public function build() {

		$loginURL = env('APP_PANEL_URL') . "/login";

		$message = (new MailMessage())
			->subject("A plataforma de {$this->tenant->name} está pronta para acesso!")
			->greeting('Olá!')
			->line("A adesão de {$this->tenant->name} ao programa Busca Ativa Escolar foi aprovada, e a plataforma está pronta para uso!")
			->line("Seus dados de acesso são:")
			->line("**Usuário:** --{$this->user->email}--")
			->line("**Senha:** --{$this->initialPassword}--")
			->line("**Seu perfil de acesso:** --" . trans('user.type.' . $this->user->type) . '--')
			->line("Os dados de acesso podem ser alterados no menu 'Configurações'.")
			->line('Clique no botão abaixo para acessar a plataforma:')
			->success()
			->action('Configurar', $loginURL);

		$this->from(env('MAIL_USERNAME'), 'Busca Ativa Escolar');
		$this->subject("[Busca Ativa Escolar] A plataforma de {$this->tenant->name} está pronta para acesso!");

		return $this->view('vendor.notifications.email', $message->toArray());

	}

}