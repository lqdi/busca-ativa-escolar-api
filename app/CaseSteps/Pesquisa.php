<?php
/**
 * busca-ativa-escolar-api
 * PesquisaCaseStep.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 29/12/2016, 13:51
 */

namespace BuscaAtivaEscolar\CaseSteps;

class Pesquisa extends CaseStep {

	protected $table = "case_steps_pesquisa";

	public $stepFields = [
		'name',
		'gender',
		'race',
		'dob',
		'rg',
		'cpf',

		'has_been_in_school',
		'school_last_grade',
		'school_last_year',
		'school_last_status',
		'school_last_age',
		'school_last_address',

		'is_working',
		'work_activity',
		'work_is_paid',
		'work_weekly_hours',

		'parents_has_mother',
		'parents_has_father',
		'parents_has_brother',

		'parents_who_is_guardian',
		'parents_income',
		'mother_name',

		'guardian_name',
		'guardian_rg',
		'guardian_cpf',
		'guardian_dob',
		'guardian_phone',
		'guardian_race',
		'guardian_schooling',
		'guardian_job',

		'case_cause_ids',

		'place_address',
		'place_cep',
		'place_reference',
		'place_neighborhood',
		'place_city',
		'place_uf',
		'place_kind',
		'place_is_quilombola',

	];

	// TODO: when this step is filled, calculate "age" field via "dob" field

}