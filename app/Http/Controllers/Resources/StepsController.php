<?php
/**
 * busca-ativa-escolar-api
 * StepsController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 08/01/2017, 01:29
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use BuscaAtivaEscolar\CaseSteps\CaseStep;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Transformers\StepTransformer;

class StepsController extends BaseController {

	public function show($step_type, $step_id) {

		$step = CaseStep::fetch($step_type, $step_id);

		return fractal()
			->item($step)
			->transformWith(new StepTransformer())
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();
	}

}