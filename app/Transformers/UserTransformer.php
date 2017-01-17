<?php
/**
 * busca-ativa-escolar-api
 * UserTransformer.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 08/01/2017, 24:12
 */

namespace BuscaAtivaEscolar\Transformers;


use BuscaAtivaEscolar\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract {

	public function transform(User $user) {

		return [
			'id' => $user->id,
			'type' => $user->type,

			'name' => $user->name,
			'email' => $user->email,

			'tenant_id' => $user->tenant_id,
		];

	}

}