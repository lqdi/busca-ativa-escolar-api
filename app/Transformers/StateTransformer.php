<?php
/**
 * busca-ativa-escolar-api
 * TenantTransformer.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 18/01/2017, 18:33
 */

namespace BuscaAtivaEscolar\Transformers;


use BuscaAtivaEscolar\StateSignup;
use League\Fractal\TransformerAbstract;

class StateTransformer extends TransformerAbstract {

	protected $defaultIncludes = [
		'user',
	];

	protected $availableIncludes = [
		'users',
		'user',
	];

	public function transform(StateSignup $state) {

		return [
			'id' => $state->id,
			'uf' => $state->uf,

			'user_id' => $state->user_id,

			'is_approved' => $state->is_approved,

			'created_at' => $state->created_at ? $state->created_at->toIso8601String() : null,
			'updated_at' => $state->updated_at ? $state->updated_at->toIso8601String() : null,
		];

	}

	public function includeUser(StateSignup $state) {
		if(!$state->user) return null;
		return $this->item($state->user, new UserTransformer(), false);
	}

	public function includeUsers(StateSignup $state) {
		if(!$state->users) return null;
		return $this->collection($state->users, new UserTransformer(), false);
	}

}