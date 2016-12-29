<?php
/**
 * busca-ativa-escolar-api
 * GestaoDoCaso.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 29/12/2016, 14:11
 */

namespace BuscaAtivaEscolar;


class GestaoDoCaso extends CaseStep {

	protected $table = "case_steps_gestao_do_caso";
	protected $fillable = [
		'child_id',
		'case_id',
		'step_type',

		'actions_description',
	];

}