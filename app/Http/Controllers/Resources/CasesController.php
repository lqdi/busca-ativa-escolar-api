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

            $newChildId = $case->reopen($reason);

            return response()->json(['child_id'=> $newChildId,'status' => 'ok']);

        } catch (\Exception $ex) {
            return response()->json(['status' => 'error', 'reason' => $ex->getMessage()]);
        }
    }

}