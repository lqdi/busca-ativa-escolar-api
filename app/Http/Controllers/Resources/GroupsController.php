<?php
/**
 * busca-ativa-escolar-api
 * GroupsController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 24/01/2017, 11:52
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use BuscaAtivaEscolar\Group;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Transformers\GroupTransformer;

class GroupsController extends BaseController {

	public function index() {

		$groups = Group::all();

		return fractal()
			->collection($groups)
			->transformWith(new GroupTransformer())
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();

	}

}