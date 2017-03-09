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

	protected $availableIncludes = [
		'tenant',
		'group',
	];

	protected $defaultIncludes = [
		'group'
	];

	public function __construct($mode = 'short') {
		$this->mode = $mode;
	}

	public function transform(User $user) {

		return [
			'id' => $user->id,
			'type' => $user->type,

			'name' => $user->name,
			'email' => $user->email,

			'tenant_id' => $user->tenant_id,
			'group_id' => $user->group_id,
			'city_id' => $user->city_id,

			'institution' => $user->institution,
			'position' => $user->position,

			'created_at' => $user->created_at,
			'deleted_at' => $user->deleted_at,

			] + (($this->mode == 'long') ? [

				'permissions' => $user->getPermissions(),

				'cpf' => $user->cpf,
				'dob' => $user->dob,
				'work_phone' => $user->work_phone,
				'work_mobile' => $user->work_mobile,
				'personal_mobile' => $user->personal_mobile,
				'skype_username' => $user->skype_username,
				'work_address' => $user->work_address,
				'work_cep' => $user->work_cep,
				'work_neighborhood' => $user->work_neighborhood,
				'work_city' => ($user->work_city_id) ? [
					'id' => $user->work_city_id,
					'name' => $user->work_city_name,
					'uf' => $user->work_uf,
				] : null,
				'work_uf' => $user->work_uf,

			] : []);

	}

	public function includeTenant(User $user) {
		if(!$user->tenant) return null;
		return $this->item($user->tenant, new TenantTransformer(), false);
	}

	public function includeGroup(User $user) {
		if(!$user->group) return null;
		return $this->item($user->group, new GroupTransformer(), false);
	}

}