<?php
/**
 * busca-ativa-escolar-api
 * StepFieldsTransformer.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 08/01/2017, 24:04
 */

namespace BuscaAtivaEscolar\Transformers;


use BuscaAtivaEscolar\CaseSteps\CaseStep;
use League\Fractal\TransformerAbstract;

class StepFieldsTransformer extends TransformerAbstract {

	public function transform($step) {
		return collect($step->stepFields)
			->mapWithKeys(function ($item) use ($step) {
				return [$item => ($step->$item ?? null)];
			})
			->toArray();
	}

}