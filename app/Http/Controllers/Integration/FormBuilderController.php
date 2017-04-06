<?php
/**
 * busca-ativa-escolar-api
 * FormBuilderController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 06/04/2017, 17:48
 */

namespace BuscaAtivaEscolar\Http\Controllers\Integration;


use BuscaAtivaEscolar\CaseSteps\Pesquisa;
use BuscaAtivaEscolar\Http\Controllers\BaseController;

class FormBuilderController extends BaseController {

	public function render_pesquisa_form() {
		$form = Pesquisa::getFormFields(); // TODO: cache this
		return response()->json(['form' => $form->buildTree()]);
	}

}