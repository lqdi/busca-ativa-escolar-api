<?php
/**
 * busca-ativa-escolar-api
 * LanguageController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 18/01/2017, 14:25
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use BuscaAtivaEscolar\Http\Controllers\BaseController;
use Lang;

class LanguageController extends BaseController {

	public function generateLanguageFile() {

		$base = [];
		$dictionaries = ['case_step', 'child_case', 'risk_level', 'user'];

		foreach($dictionaries as $dictionary) {
			$base[$dictionary] = Lang::get($dictionary);
		}

		// TODO: cache this

		$timestamp = date("Y-m-d\TH:i:s");
		$database = array_dot($base);

		return response()->json([
			'version' => 'v1',
			'timestamp' => $timestamp,
			'database' => $database
		]);
	}

}