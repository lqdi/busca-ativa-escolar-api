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

class UserRegistered extends Mailable {

	public $tenant;
	public $user;
	public $initialPassword;

	public function __construct(Tenant $tenant, User $user, $initialPassword) {
		$this->tenant = $tenant;
		$this->user = $user;
		$this->initialPassword = $initialPassword;
	}

	public function build() {

		$loginURL = env('APP_PANEL_URL') . "/login";

		$message = (new MailMessage())
			->subject("Novo usuário em {$this->tenant->name}")
			->greeting('Olá!')
			->line("Foi criado um novo usuário para você na plataforma Busca Ativa Escolar em seu município.")
			->line("Seus dados de acesso são:")
			->line("**Usuário:** --{$this->user->email}--")
			->line("**Senha temporária:** --{$this->initialPassword}--")
			->line("**Seu perfil de acesso:** --" . trans('user.type.' . $this->user->type) . '--')
			->line("Os dados de acesso podem ser alterados no menu 'Preferências'.")
			->line('Clique no botão abaixo para acessar a plataforma:')
			->success()
			->action('Acessar', $loginURL);

		$this->from(env('MAIL_USERNAME'), 'Busca Ativa Escolar');
		$this->subject("[Busca Ativa Escolar] Novo usuário em {$this->tenant->name}");

		return $this->view('vendor.notifications.email', $message->toArray());

	}

}