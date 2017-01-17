<?php
/**
 * busca-ativa-escolar-api
 * Rematricula.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 29/12/2016, 14:12
 */

namespace BuscaAtivaEscolar\CaseSteps;

class Rematricula extends CaseStep {

	protected $table = 'case_steps_rematricula';

	public $stepFields = [
		'reinsertion_date',
		'reinsertion_grade',

		'school_name',
		'school_censo_id',
		'school_address',
		'school_cep',
		'school_neighborhood',
		'school_city',
		'school_uf',
		'school_contact_name',
		'school_contact_email',
		'school_contact_position',
		'school_phone',
		'school_email',

		'observations',
	];

	protected function onStart($prevStep = null) {
		$this->flagAsPendingAssignment();
	}

	protected function onComplete($nextStep = null) {
		$this->childCase->enrolled_at = $this->reinsertion_date;
		$this->childCase->save();
	}

	public function validate($data, $isCompletingStep = false) {
		$data['is_completing_step'] = $isCompletingStep;

		return validator($data, [
			'reinsertion_date' => 'required_for_completion|date',
			'reinsertion_grade' => 'required_for_completion|' . \BuscaAtivaEscolar\Data\SchoolGrade::getSlugValidationMask(),

			'school_name' => 'required_for_completion|string',
			'school_censo_id' => 'string',
			'school_address' => 'required_for_completion|string',
			'school_cep' => 'digits:8',
			'school_neighborhood' => 'string',
			'school_city' => 'required_for_completion|string',
			'school_uf' => 'required_for_completion|string|size:2',
			'school_contact_name' => 'required_for_completion|string',
			'school_contact_email' => 'email',
			'school_contact_position' => 'string',
			'school_phone' => 'required_for_completion|alpha_dash',
			'school_email' => 'email',

			'observations' => 'string',
		]);
	}

}