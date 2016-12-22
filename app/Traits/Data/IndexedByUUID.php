<?php
/**
 * busca-ativa-escolar-api
 * IndexedByUUID.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/12/2016, 20:37
 */

namespace BuscaAtivaEscolar\Traits\Data;


use Webpatser\Uuid\Uuid;

trait IndexedByUUID {

	protected static function boot() {
		parent::boot();

		static::creating(function ($model) {
			$model->{$model->getKeyName()} = Uuid::generate()->string;
		});
	}

}