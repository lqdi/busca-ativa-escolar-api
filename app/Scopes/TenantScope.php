<?php
/**
 * busca-ativa-escolar-api
 * TenantScope.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/12/2016, 21:24
 */

namespace BuscaAtivaEscolar\Scopes;


use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope  {

	public function apply(Builder $builder, Model $model) {
		$currentUser = Auth::user();

		// Let superusers access all tenants
		if(!$currentUser->isRestrictedToTenant()) return;

		$builder->where('tenant_id', $currentUser->tenant_id);
	}

}