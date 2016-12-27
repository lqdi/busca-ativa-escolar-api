<?php
/**
 * busca-ativa-escolar-api
 * Iser.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/12/2016, 20:26
 */

namespace BuscaAtivaEscolar;

use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

	use IndexedByUUID;
	use Notifiable;

	const TYPE_SUPERUSER = "superuser";
	const TYPE_GESTOR_NACIONAL = "gestor_nacional";
	const TYPE_GESTOR_POLITICO = "gestor_politico";
	const TYPE_GESTOR_OPERACIONAL = "gestor_operacional";
	const TYPE_SUPERVISOR_INSTITUCIONAL = "supervisor_institucional";
	const TYPE_TECNICO_VERIFICADOR = "tecnico_verificador";
	const TYPE_AGENTE_COMUNITARIO = "agente_comunitario";

    protected $fillable = [
        'name',
	    'email',
	    'password',

	    'tenant_id',
	    'city_id',

	    'type',
    ];

    protected $hidden = [
        'password',
	    'remember_token',
    ];

	public function tenant() {
		return $this->hasOne('BuscaAtivaEscolar\Tenant', 'id', 'tenant_id');
	}

	public function city() {
		return $this->hasOne('BuscaAtivaEscolar\City', 'id', 'city_id');
	}

	public function getRouteKeyName() {
		return 'id';
	}

	public function isRestrictedToTenant() {
		return !($this->type == self::TYPE_SUPERUSER || $this->type == self::TYPE_GESTOR_NACIONAL);
	}

	public static function register(array $data) {
		$data['email'] = trim(strtolower($data['email']));
		$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

		$existingUser = self::query()->where('email', $data['email'])->first();
		if($existingUser) throw new \Exception("email_already_exists");

		return self::create($data);
	}
}
