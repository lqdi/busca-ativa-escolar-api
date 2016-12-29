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

namespace BuscaAtivaEscolar;


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

}