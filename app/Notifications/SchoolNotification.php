<?php
/**
 * busca-ativa-escolar-api
 * PasswordReset.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 20/03/2017, 12:35
 */

namespace BuscaAtivaEscolar\Notifications;


use BuscaAtivaEscolar\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SchoolNotification extends Notification implements ShouldQueue {

	use Queueable;

	public function via($notifiable) {
		return ['mail'];
	}

	public function toMail($notifiable) {
		return (new MailMessage)
			->subject("[Busca Ativa Escolar] Escolas")
			->line("Ola")
			->line("Precisamos")
			->action('Acesse o link', '')
			->line("Caso você não tenha solicitado a recuperação de senha, ignore essa mensagem.");
	}

	protected function getResetURL($user) {
		return $user->getPasswordResetURL();
	}

	public function toArray($notifiable) {
		return [
			'user_id' => $this->user->id,
			'user_email' => $this->user->email
		];
	}
}
