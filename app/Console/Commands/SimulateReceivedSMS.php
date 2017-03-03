<?php
/**
 * busca-ativa-escolar-api
 * SimulateReceivedSMS.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 03/03/2017, 14:23
 */

namespace BuscaAtivaEscolar\Console\Commands;


use Request;
use Route;

class SimulateReceivedSMS extends Command {

	protected $signature = 'debug:simulate_received_sms {msisdn} {message}';
	protected $description = 'Simulates a received SMS';

	public function handle() {

		$msisdn = $this->argument('msisdn');
		$message = $this->argument('message');

		$request = Request::create('api/v1/integration/sms/on_receive', 'POST', [
			'callbackMoRequest' => [
				'id' => time(),
				'body' => $message,
				'mobile' => $msisdn,
				'account' => env('ZENVIA_USER'),
				'received' => date("T-m-d\TH:i:s"),
				'shortCode' => env('ZENVIA_SHORTCODE'),
				'mobileOperatorName' => 'Claro'
			]
		]);

		Route::dispatch($request);

	}

}