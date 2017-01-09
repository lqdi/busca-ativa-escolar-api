<?php
/**
 * busca-ativa-escolar-api
 * StepTransformer.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 07/01/2017, 23:53
 */

namespace BuscaAtivaEscolar\Transformers;


use BuscaAtivaEscolar\CaseSteps\CaseStep;
use League\Fractal\TransformerAbstract;

class StepTransformer extends TransformerAbstract {

	protected $availableIncludes = [
		'fields'
	];

	public function transform(CaseStep $step) {
		$data = [
			'id' => $step->id,
			'child_id' => $step->child_id,
			'case_id' => $step->case_id,
			'order' => $step->order,

			'name' => trans('case_step.name.' . $step->step_type, ['report_index' => ($step->report_index ?? '')]),

			'step_type' => $step->step_type,
			'is_completed' => $step->is_completed,

			'created_at' => $step->created_at->toIso8601String(),
			'updated_at' => $step->created_at->toIso8601String(),
		];

		if($step->step_type == 'BuscaAtivaEscolar\\CaseSteps\\Observacao') {
			$data['report_index'] = $step->report_index;
		}

		return $data;
	}

	public function includeFields(CaseStep $step) {
		return $this->item($step, new StepFieldsTransformer, false);
	}

}