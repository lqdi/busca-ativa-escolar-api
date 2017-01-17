<?php
/**
 * busca-ativa-escolar-api
 * Child.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 22/12/2016, 21:20
 */

namespace BuscaAtivaEscolar;

use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use BuscaAtivaEscolar\Traits\Data\TenantScopedModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Child extends Model  {

	use SoftDeletes;
	use IndexedByUUID;
	use TenantScopedModel;

	const STATUS_OUT_OF_SCHOOL = "out_of_school";
	const STATUS_OBSERVATION = "in_observation";
	const STATUS_IN_SCHOOL = "in_school";
	const STATUS_CANCELLED = "cancelled";

	protected $table = "children";
	protected $fillable = [
		'name',

		'tenant_id',
		'city_id',

		'mother_name',
		'father_name',

		'risk_level',
		'gender',
		'age',

		'current_case_id',

		'current_step_type',
		'current_step_id',

		'child_status',
	];

	/**
	 * The tenant that "owns" this child.
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function tenant() {
		return $this->hasOne('BuscaAtivaEscolar\Tenant', 'id', 'tenant_id');
	}

	/**
	 * This child's origin instance city.
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function city() {
		return $this->hasOne('BuscaAtivaEscolar\City', 'id', 'city_id');
	}

	/**
	 * The current case that is dealing with this child.
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function currentCase() {
		return $this->hasOne('BuscaAtivaEscolar\ChildCase', 'id', 'current_case_id');
	}

	/**
	 * The current case step this child is at.
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function currentStep() {
		return $this->morphTo();
	}

	/**
	 * Cases belonging to this child
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function cases() {
		return $this->hasMany('BuscaAtivaEscolar\ChildCase', 'child_id', 'id');
	}

	// ------------------------------------------------------------------------

	/**
	 * Sets the child's current status
	 * @param string $status The child status. See Child::STATUS_*
	 */
	public function setStatus($status) {
		$this->child_status = $status;
		$this->save();

		event("child.status_change", [$status]);
	}

	// ------------------------------------------------------------------------

	/**
	 * Creates a new Child case chain by data received by an alert.
	 * This will create a new child, with a new ChildCase and the default CaseStep structure.
	 *
	 * @param Tenant $tenant The tenant this child will be attached to
	 * @param mixed $creatorUserID The ID of the user that created this alert (null if not available)
	 * @param array $data The data received
	 * @return Child
	 */
	public static function spawnFromAlertData(Tenant $tenant, $creatorUserID = null, array $data) {

		$data['tenant_id'] = $tenant->id;
		$data['city_id'] = $tenant->city_id;

		$data['created_by_user_id'] = $creatorUserID;

		$data['child_status'] = self::STATUS_OUT_OF_SCHOOL;
		$data['risk_level'] = ChildCase::RISK_LEVEL_HIGH; // TODO: fetch risk level from tenant settings

		$child = self::create($data);

		$case = ChildCase::spawn($child, $data);
		$alertStep = $case->currentStep;

		$child->current_case_id = $case->id;
		$child->current_step_type = $alertStep->step_type;
		$child->current_step_id = $alertStep->id;
		$child->save();

		$alertStep->fill($data);
		$alertStep->assigned_user_id = $creatorUserID;
		$alertStep->save();

		// Advances to Pesquisa step
		$alertStep->complete();

		return $child;

	}

}