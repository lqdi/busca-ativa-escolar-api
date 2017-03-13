<?php
/**
 * busca-ativa-escolar-api
 * Sortable.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 13/03/2017, 17:30
 */

namespace BuscaAtivaEscolar\Traits\Data;


use Illuminate\Database\Eloquent\Builder;

trait Sortable {

	public static function applySorting(Builder $query, array $sortArray) {
		$instance = new self();

		foreach($sortArray as $field => $mode) {
			if(!in_array($field, $instance->fillable)) continue;
			$query->orderBy($field, ($mode == 'desc') ? 'desc' : 'asc');
		}

		return $query;
	}

}