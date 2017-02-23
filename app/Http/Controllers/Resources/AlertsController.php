<?php
/**
 * busca-ativa-escolar-api
 * AlertsController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 09/02/2017, 19:57
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use Auth;
use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Transformers\AgentAlertTransformer;
use BuscaAtivaEscolar\Transformers\PendingAlertTransformer;

class AlertsController extends BaseController {

	public function get_pending() {
		$pending = Child::with('alert')->where('alert_status', 'pending')->get();

		return fractal()
			->collection($pending)
			->transformWith(new PendingAlertTransformer())
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();

	}

	public function accept(Child $child) {
		try {
			if($child->alert_status != 'pending') {
				return response()->json(['status' => 'failed', 'reason' => 'not_pending']);
			}

			$child->acceptAlert();

			return response()->json(['status' => 'ok']);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function reject(Child $child) {
		try {
			if($child->alert_status != 'pending') {
				return response()->json(['status' => 'failed', 'reason' => 'not_pending']);
			}

			$child->rejectAlert();

			return response()->json(['status' => 'ok']);

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}
	}

	public function get_mine() {
		$myAlerts = Child::with('alert')
			->orderBy('created_at', 'DESC')
			->where('alert_submitter_id', Auth::id())
			->get();

		return fractal()
			->collection($myAlerts)
			->transformWith(new AgentAlertTransformer())
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();
	}

}