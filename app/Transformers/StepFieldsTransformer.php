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
		$data = collect($step->stepFields)
			->mapWithKeys(function ($item) use ($step) {
				return [$item => ($step->$item ?? null)];
			})
			->toArray();

		// TODO: refactor this for clarity

		if(isset($data['place_city_id'])) {
			$data['place_city'] = [
				'id' => $data['place_city_id'],
				'uf' => $data['place_uf'],
				'name' => $data['place_city_name'],
			];
		}

		if(isset($data['school_city_id'])) {
			$data['school_city'] = [
				'id' => $data['school_city_id'],
				'uf' => $data['school_uf'],
				'name' => $data['school_city_name'],
			];
		}

		return $data;
	}

}