<?php
/**
 * busca-ativa-escolar-api
 * Alerta.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 29/12/2016, 13:43
 */

namespace BuscaAtivaEscolar;


class Alerta extends CaseStep  {

	protected $table = "case_steps_alerta";

	protected $fillable = [

		'child_id',
		'case_id',
		'step_type',

		'name',
		'gender',
		'race',
		'dob',
		'rg',

		'cpf',
		'nis',
		'alert_cause',

		'mother_name',
		'mother_rg',
		'mother_phone',

		'father_name',
		'father_rg',
		'father_phone',

		'place_address',
		'place_cep',
		'place_reference',
		'place_neighborhood',
		'place_city',
		'place_uf',
		'place_phone',
		'place_mobile'
	];

}