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

namespace BuscaAtivaEscolar\SMS;


use Curl;
use Webpatser\Uuid\Uuid;

class Zenvia implements SmsProvider {

	protected function getAuthHeader() {
		return base64_encode(env('ZENVIA_USER') . ':' . env('ZENVIA_KEY'));
	}

	public function send($number, $message): string {
		Curl::to('https://api-rest.zenvia360.com.br/services/send-sms')
			->withHeaders([
				'Content-Type' => 'application/json',
				'Accept' => 'application/json',
				'Authorization' => $this->getAuthHeader()
			])
			->asJsonRequest()
			->withData([
				'sendSmsRequest' => [
					'to' => $number,
					'msg' => $message,
					'callbackOption' => 'NONE',
					'id' => Uuid::generate(),
					'aggregateId' => env('ZENVIA_AGGREGATE_ID')
				]
			])
			->post();

	}

	public function handle(\Illuminate\Http\Request $request): SmsMessage {
		$id = $request['callbackMoRequest']['id'] ?? null;
		$number = $request['callbackMoRequest']['mobile'] ?? null;
		$message = $request['callbackMoRequest']['body'] ?? null;
		$shortCode = $request['callbackMoRequest']['shortCode'] ?? null;
		$carrier = $request['callbackMoRequest']['mobileOperatorName'] ?? null;

		return new SmsMessage($id, $number, $message, $shortCode, $carrier);
	}


}