<?php
/**
 * busca-ativa-escolar-api
 * CaseStep.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 29/12/2016, 13:22
 */

namespace BuscaAtivaEscolar\CaseSteps;

use BuscaAtivaEscolar\ChildCase;
use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use BuscaAtivaEscolar\Traits\Data\TenantScopedModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class CaseStep extends Model {

	use SoftDeletes;
	use IndexedByUUID;
	use TenantScopedModel;

	/**
	 * Base array of fillable fields, shared between all case steps.
	 * @var array
	 */
	protected $baseFillable = [
		'child_id',
		'case_id',
		'step_type',
		'is_completed',
	];

	/**
	 * List of fillable fields for each step; this is extended by each step class.
	 * @var array
	 */
	public $stepFields = [];

	// ------------------------------------------------------------------------

	/**
	 * CaseStep constructor.
	 * Generates the "fillable" model property by combining shared and specific fields.
	 *
	 * @param array $attributes
	 */
	public function __construct(array $attributes = []) {
		$this->fillable = array_merge($this->baseFillable, $this->stepFields);
		$this->incrementing = false; // This is already defined by IndexedByUUID, but we're overriding __construct here

		parent::__construct($attributes);
	}

	/**
	 * Internal, determines primary key for API routing.
	 * @return string
	 */
	public function getRouteKeyName() {
		return 'id';
	}

	// ------------------------------------------------------------------------

	/**
	 * The child this step belongs to.
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function child() {
		return $this->hasOne('BuscaAtivaEscolar\Child', 'id', 'child_id');
	}

	/**
	 * The case this step belongs to.
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function childCase() {
		return $this->hasOne('BuscaAtivaEscolar\ChildCase', 'id', 'case_id');
	}

	// ------------------------------------------------------------------------

	/**
	 * Spawns a case step by it's class, pre-filling it with data and attaching it to a case.
	 * Does not modify the parent ChildCase instance.
	 *
	 * @param ChildCase $case The case this step belongs to.
	 * @param string $class The fully-qualified step class name to use. Must inherit this class (CaseStep).
	 * @param array $data The data to fill this step with.
	 * @return CaseStep
	 */
	public static function spawn(ChildCase $case, string $class, array $data) {
		$data['tenant_id'] = $case->tenant_id;
		$data['case_id'] = $case->id;
		$data['child_id'] = $case->child_id;

		$data['step_type'] = "BuscaAtivaEscolar\\CaseSteps\\{$class}";

		$data['is_completed'] = false;

		return ($data['step_type'])::create($data);
	}

}