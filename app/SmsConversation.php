<?php
/**
 * busca-ativa-escolar-api
 * SmsConversation.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 02/03/2017, 23:34
 */

namespace BuscaAtivaEscolar;


use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use Illuminate\Database\Eloquent\Model;

class SmsConversation extends Model {

	use IndexedByUUID;

	protected $fillable = [
		'user_id',
		'tenant_id',

		'spawned_child_id',

		'phone_number',

		'conversation_step',

		'received_messages',
		'metadata',
		'fields',
	];

	protected $casts = [
		'received_messages' => 'collection',
		'metadata' => 'array',
		'fields' => 'array'
	];

	public function user() {
		return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'user_id');
	}

	public function tenant() {
		return $this->hasOne('BuscaAtivaEscolar\Tenant', 'id', 'tenant_id');
	}

	public function spawnedChild() {
		return $this->hasOne('BuscaAtivaEscolar\Child', 'id', 'spawned_child_id');
	}

}