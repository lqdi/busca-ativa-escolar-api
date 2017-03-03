<?php
/**
 * busca-ativa-escolar-api
 * ZenviaHandler.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 03/03/2017, 16:00
 */

namespace BuscaAtivaEscolar\SMS\Handlers;


use BuscaAtivaEscolar\SMS\SmsMessage;
use BuscaAtivaEscolar\SMS\SmsProvider;
use Curl;
use Webpatser\Uuid\Uuid;

class Zenvia implements SmsProvider {

	protected function getAuthHeader() {
		return base64_encode(env('ZENVIA_USER') . ':' . env('ZENVIA_KEY'));
	}

	public function send($number, $message) {

		$headers = [
			'Content-Type: application/json',
			'Accept: application/json',
			'Authorization: ' . $this->getAuthHeader()
		];

		$data = [
			'sendSmsRequest' => [
				'to' => $number,
				'msg' => $message,
				'callbackOption' => 'NONE',
				'id' => Uuid::generate()->string,
				'aggregateId' => env('ZENVIA_AGGREGATE_ID')
			]
		];

		Curl::to('https://api-rest.zenvia360.com.br/services/send-sms')
			->asJsonRequest()
			->withHeaders($headers)
			->withData($data)
			->post();

		return true;

	}

	public function handle(\Illuminate\Http\Request $request): SmsMessage {
		$id = $request['callbackMoRequest']['id'] ?? null;
		$number = $request['callbackMoRequest']['mobile'] ?? null;
		$message = $request['callbackMoRequest']['body'] ?? null;
		$shortCode = $request['callbackMoRequest']['shortCode'] ?? null;
		$carrier = $request['callbackMoRequest']['mobileOperatorName'] ?? null;

		$keyword = env('ZENVIA_KEYWORD');

		// Strips the keyword from the message
		if(substr(trim($message), 0, strlen($keyword)) == $keyword) {
			$message = trim(substr(trim($message), strlen($keyword)));
		}

		return new SmsMessage($id, $number, $message, $shortCode, $carrier);
	}


}