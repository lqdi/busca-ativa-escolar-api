<?php
/**
 * busca-ativa-escolar-api
 * SmsConversationController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 16/02/2017, 20:01
 */

namespace BuscaAtivaEscolar\Http\Controllers\Integration;


use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\SmsConversation;
use Log;

class SmsConversationController extends BaseController {

	public function not_implemented() {
		return response(['status' => 'ok']);
	}

	public function on_message_received() {

		Log::notice("SMS received: " . json_encode(request()->all()));

		$conversation = SmsConversation::handleRequest(request());

		return response()->json(['status' => 'ok', 'conversation_id' => $conversation->id, 'step' => $conversation->conversation_step]);
	}

}