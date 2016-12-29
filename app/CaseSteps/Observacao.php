<?php
/**
 * busca-ativa-escolar-api
 * Observacao.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 29/12/2016, 14:15
 */

namespace BuscaAtivaEscolar;


class Observacao extends CaseStep {

	protected $table = "case_steps_observacao";

	public $stepFields = [
		'child_id',
		'case_id',
		'step_type',
		'is_completed',

		'report_date',
		'report_index',

		'is_child_still_in_school',

		'observations',
	];

}