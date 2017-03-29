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

			$dotPosition = strpos($field, '.');

			// Dot-notation means sort by relationship
			/*if($dotPosition !== false) {
				$relation = substr($field, 0, $dotPosition);
				$field = substr($field, $dotPosition + 1);

				$query->whereHas($relation, function($sub) use ($field, $mode) {
					return $sub->orderBy($field, $mode);
				});

				continue;
			}*/

			// TODO: fix dot-notation sorting (need a way to resolve table/pk from relationship name to apply join())

			$query->orderBy($field, ($mode == 'desc') ? 'desc' : 'asc');
		}

		return $query;
	}

}