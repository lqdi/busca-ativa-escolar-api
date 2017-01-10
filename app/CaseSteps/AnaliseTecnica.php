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

namespace BuscaAtivaEscolar\CaseSteps;

class AnaliseTecnica extends CaseStep {

	protected $table = "case_steps_analise_tecnica";

	public $stepFields = [
		'analysis_description'
	];

}