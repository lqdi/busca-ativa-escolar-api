<?php
/**
 * busca-ativa-escolar-api
 * ChildrenController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 30/12/2016, 16:16
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use BuscaAtivaEscolar\Child;
use BuscaAtivaEscolar\Http\Controllers\BaseController;

class ChildrenController extends BaseController  {

	// TODO: use Fractal/Larasponse to separate models from API resources (via transformers)

	public function index() {
		$children = Child::query()->simplePaginate(64);
		// TODO: child searching
		return response()->json($children);
	}

	public function show(Child $child) {

		return response()->json($child);
	}

}