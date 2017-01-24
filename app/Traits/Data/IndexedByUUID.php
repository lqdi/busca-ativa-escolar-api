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

	public function __construct() {
		$this->incrementing = false;
		call_user_func_array(['parent','__construct'], func_get_args());
	}

	protected static function bootIndexedByUUID() {
		static::creating(function ($model) {
			if(isset($model->{$model->getKeyName()})) return;
			$model->{$model->getKeyName()} = Uuid::generate()->string;
		});
	}

}