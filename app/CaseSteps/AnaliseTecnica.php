<?php
/**
 * busca-ativa-escolar-api
 * AnaliseTecnica.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 29/12/2016, 14:10
 */

namespace BuscaAtivaEscolar;


class AnaliseTecnica extends CaseStep {

	protected $table = "case_steps_analise_tecnica";
	protected $fillable = [
		'child_id',
		'case_id',
		'step_type',

		'identified_causes',
		'risk_level',

		'analysis_description'
	];

}