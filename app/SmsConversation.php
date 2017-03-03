<?php
/**
 * busca-ativa-escolar-api
 * SmsConversation.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 02/03/2017, 23:34
 */

namespace BuscaAtivaEscolar;


use BuscaAtivaEscolar\CaseSteps\Alerta;
use BuscaAtivaEscolar\Data\AlertCause;
use BuscaAtivaEscolar\SMS\SMS;
use BuscaAtivaEscolar\SMS\SmsProvider;
use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SmsConversation extends Model {

	use IndexedByUUID;

	const STEP_CONFIRM = 'confirm';
	const STEP_IDENTIFY = 'identify';
	const STEP_CANCELLED = 'cancelled';
	const STEP_ASK_NAME = 'ask_name';
	const STEP_ASK_MOTHER_NAME = 'ask_mother_name';
	const STEP_ASK_ADDRESS = 'ask_address';
	const STEP_ASK_NEIGHBORHOOD = 'ask_neighborhood';
	const STEP_ASK_CAUSE = 'ask_cause';
	const STEP_COMPLETED = 'completed';

	/* @var $sms SmsProvider */
	protected $sms;

	protected $fillable = [
		'user_id',
		'tenant_id',

		'spawned_child_id',

		'phone_number',

		'conversation_step',

		'received_messages',
		'metadata',
		'fields',
	];

	protected $casts = [
		'received_messages' => 'collection',
		'metadata' => 'array',
		'fields' => 'array'
	];

	public function __construct() {
		parent::__construct();
		$this->sms = app(SmsProvider::class);
	}

	public function user() {
		return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'user_id');
	}

	public function tenant() {
		return $this->hasOne('BuscaAtivaEscolar\Tenant', 'id', 'tenant_id');
	}

	public function spawnedChild() {
		return $this->hasOne('BuscaAtivaEscolar\Child', 'id', 'spawned_child_id');
	}

	public function setStep($step) {
		$this->conversation_step = $step;
		$this->save();

		$this->onStepEnter($step);
	}

	public function reply($message) {
		return $this->sms->send($this->phone_number, $message);
	}

	public function onStepEnter($step) {
		switch($step) {
			case self::STEP_CONFIRM:
				$this->reply("Voce gostaria de enviar um alerta ao Busca Ativa Escolar (S/N)");
				break;

			case self::STEP_IDENTIFY:
				$this->reply("Qual o seu e-mail de cadastro?");
				break;

			case self::STEP_ASK_NAME:
				$this->reply("Qual o nome completo da crianca? (nao coloque acentos ou caracteres especiais)");
				break;

			case self::STEP_ASK_MOTHER_NAME:
				$this->reply("Qual o nome completo da mae ou responsavel? (nao coloque acentos ou caracteres especiais)");
				break;

			case self::STEP_ASK_ADDRESS:
				$this->reply("Qual o logradouro do endereco? (nao coloque acentos ou caracteres especiais)");
				break;

			case self::STEP_ASK_NEIGHBORHOOD:
				$this->reply("Qual o bairro? (nao coloque acentos ou caracteres especiais)");
				break;

			case self::STEP_ASK_CAUSE:
				$this->reply("Qual a possivel causa da crianca estar fora da escola? Responda conforme a tabela de causas de 1 a 16");

				$i = 1;

				$causeList = collect(AlertCause::getAll())
					->map(function ($item) use ($i) {
						return $i++ . ' - ' . Str::ascii($item->label);
					})
					->implode("\n");

				$this->reply($causeList);

				break;

			case self::STEP_COMPLETED:
				$this->reply("O seu alerta foi recebido com sucesso! Obrigado!");
				break;

		}
	}

	public function handleMessage($message) {
		switch($this->conversation_step) {

			case self::STEP_CONFIRM:

				if(strtolower($message) != 's') {
					$this->cancel();
					return;
				}

				$this->setStep(self::STEP_IDENTIFY);

				break;

			case self::STEP_IDENTIFY:

				$email = strtolower(Str::ascii(str_replace(' ', '', $message)));
				$user = User::whereEmail($email)->first();

				if(!$user) {
					$this->reply("O email informado nao esta cadastrado. Verifique se digitou corretamente e tente novamente.");
					$this->setStep(self::STEP_IDENTIFY);
					return;
				}

				if(!$user->tenant) {
					$this->reply("Gestores nacionais e superusuarios nao podem cadastrar alertas.");
					$this->setStep(self::STEP_IDENTIFY);
					return;
				}

				$this->user_id = $user->id;
				$this->tenant_id = $user->tenant_id;
				$this->fields = [
					'place_city_id' => $user->tenant->city_id,
					'place_city_name' => $user->tenant->city->name,
					'place_uf' => $user->tenant->city->uf,
				];

				$this->save();

				$this->setStep(self::STEP_ASK_NAME);

				break;

			case self::STEP_ASK_NAME:
				$this->validateAndUpdateField('name', $message);
				$this->setStep(self::STEP_ASK_MOTHER_NAME);
				break;

			case self::STEP_ASK_MOTHER_NAME:
				$this->validateAndUpdateField('name', $message);
				$this->setStep(self::STEP_ASK_ADDRESS);
				break;

			case self::STEP_ASK_ADDRESS:
				$this->validateAndUpdateField('place_address', $message);
				$this->setStep(self::STEP_ASK_NEIGHBORHOOD);
				break;

			case self::STEP_ASK_NEIGHBORHOOD:
				$this->validateAndUpdateField('place_neighborhood', $message);
				$this->setStep(self::STEP_ASK_CAUSE);
				break;

			case self::STEP_ASK_CAUSE:

				$causeIndex = intval($message);

				if($causeIndex < 1 || $causeIndex > 16) {
					$this->reply('Voce deve indicar um numero de 1 a 16, de acordo com a tabela de causas.');
					$this->setStep(self::STEP_ASK_CAUSE);
					return;
				}

				$cause = AlertCause::getBySMSIndex($causeIndex);

				if(!$cause) {
					$this->reply('Voce deve indicar um numero de 1 a 16, de acordo com a tabela de causas.');
					$this->setStep(self::STEP_ASK_CAUSE);
					return;
				}

				$this->fields['alert_cause_id'] = $cause->id;
				$this->save();

				$this->setStep(self::STEP_COMPLETED);

				$child = Child::spawnFromAlertData($this->tenant, $this->user, $this->fields);

				if(!$child) {
					$this->reply("Ocorreu um erro ao gerar o caso relacionado ao alerta!");
					return;
				}

				$this->spawned_child_id = $child->id;
				$this->save();

				$this->reply("Codigo do alerta gerado: {$child->id}");

				break;

		}
	}

	protected function validateAndUpdateField($field, $message) {
		$value = strtolower(Str::ascii($message));

		if(strlen($value) < 1) return false;

		$this->fields[$field] = $message;
		$this->save();

		return true;
	}

	// -------------------------------------------------

	public static function handleRequest($request) {
		$provider = app(SmsProvider::class); /* @var $provider SmsProvider */
		$sms = $provider->handle($request);

		$conversation = self::findExisting($sms->number); /* @var $conversation self */

		if(!$conversation) {
			return self::begin($sms->number);
		}

		$conversation->handleMessage($sms->message);

		return $conversation;

	}

	public static function findExisting($phoneNumber) {
		self::query()
			->where('phone_number', $phoneNumber)
			->where('conversation_step', '!=', self::STEP_COMPLETED)
			->first();
	}

	public static function begin($phoneNumber) {
		$conversation = self::create([
			'user_id' => null,
			'tenant_id' => null,
			'spawned_child_id' => null,
			'phone_number' => $phoneNumber,
			'conversation_step' => 'begin',
			'received_messages' => [],
			'metadata' => null,
			'fields' => []
		]);

		$conversation->setStep(self::STEP_CONFIRM);

		return $conversation;
	}

}