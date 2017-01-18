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


use BuscaAtivaEscolar\Tenant;
use League\Fractal\TransformerAbstract;

class TenantTransformer extends TransformerAbstract {

	protected $availableIncludes = [
		'city'
	];

	public function transform(Tenant $tenant) {

		return [
			'id' => $tenant->id,
			'name' => $tenant->name,

			'city_id' => $tenant->city_id,
			'operational_admin_id' => $tenant->operational_admin_id,
			'political_admin_id' => $tenant->political_admin_id,

			'is_registered' => $tenant->is_registered,
			'is_active' => $tenant->is_active,

			'last_active_at' => $tenant->last_active_at,

			'registered_at' => $tenant->registered_at,
			'activated_at' => $tenant->activated_at,
		];

	}

	public function includeCity(Tenant $tenant) {
		return $this->item($tenant->city, new CityTransformer(), false);
	}

}