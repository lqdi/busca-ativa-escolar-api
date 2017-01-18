<?php
/**
 * busca-ativa-escolar-api
 * UsersController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 18/01/2017, 18:36
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Transformers\UserTransformer;
use BuscaAtivaEscolar\User;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class UsersController extends BaseController {

	public function index() {
		$paginator = User::query()->paginate(64);
		$collection = $paginator->getCollection();

		return fractal()
			->collection($collection)
			->transformWith(new UserTransformer())
			->paginateWith(new IlluminatePaginatorAdapter($paginator))
			->respond();
	}

	public function show(User $user) {

		return fractal()
			->item($user)
			->transformWith(new UserTransformer())
			->serializeWith(new SimpleArraySerializer())
			->parseIncludes(request('with'))
			->respond();
	}

}