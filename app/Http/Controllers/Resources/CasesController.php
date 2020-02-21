<?php
/**
 * busca-ativa-escolar-api
 * CasesController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 30/12/2016, 16:22
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use BuscaAtivaEscolar\ChildCase;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Transformers\CaseTransformer;

class CasesController extends BaseController  {

	public function show(ChildCase $case) {
		return fractal()
			->item($case)
			->transformWith(new CaseTransformer())
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();
	}

	public function cancel(ChildCase $case) {
		try {

			$reason = request('reason');

			if (!$reason) return $this->api_failure('reason_required');

			$case->cancel($reason);

			return response()->json(['status' => 'ok']);

		} catch (\Exception $ex) {
			return response()->json(['status' => 'error', 'reason' => $ex->getMessage()]);
		}
	}

    public function reopen(ChildCase $case) {
        try {

            $reason = request('reason');

            if (!$reason) return $this->api_failure('reason_required');

            return $case->reopen($reason);


        } catch (\Exception $ex) {
            return response()->json(['status' => 'error', 'reason' => $ex->getMessage()]);
        }
    }


    public function requestReopen(ChildCase $case) {

        try {

            $reason = request('reason');

            if (!$reason) return $this->api_failure('reason_required');

            return $case->requestReopen($reason);

        } catch (\Exception $ex) {
            return response()->json(['status' => 'error', 'reason' => $ex->getMessage()]);
        }

    }

    public function requestTransfer(ChildCase $case){

        try {

            $reason = request('reason');
            $child_id = request('child_id');
            $tenant_recipient_id = request('tenant_recipient_id');
            $city_id = request('city_id');

            if (!$reason) return $this->api_failure('reason_required');
            if (!$child_id) return $this->api_failure('child_id_required');
            if (!$tenant_recipient_id) return $this->api_failure('tenant_recipient_id_required');
            if (!$city_id) return $this->api_failure('city_id_required');

            return $case->transfer($reason, $child_id, $tenant_recipient_id, $city_id);

        } catch (\Exception $ex) {
            return response()->json(['status' => 'error', 'reason' => $ex->getMessage()]);
        }

    }



}