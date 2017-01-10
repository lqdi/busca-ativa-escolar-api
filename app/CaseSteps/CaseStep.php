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
		'step_index',
		'next_index',
		'next_type',
		'completed_at',
		'is_completed',
	];

	protected $casts = [
		'completed_at' => 'datetime',
		'is_completed' => 'boolean',
		'index' => 'integer',
		'next_index' => 'integer',
	];

	/**
	 * List of fillable fields for each step; this is extended by each step class.
	 * @var array
	 */
	public $stepFields = [];

	/**
	 * Internal: The cached next case step in the sequence
	 * @var CaseStep
	 */
	protected $_next = null;

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

	public function nextStep() {
		if($this->_next === null) {
			$this->_next = self::fetchWithinCase($this->case_id, $this->next_type, $this->next_index);
		}

		return $this->_next;
	}

	// ------------------------------------------------------------------------

	/**
	 * Finds a Child case step by it's type class name and ID
	 *
	 * @param string $step_type The fully-qualified (w/ namespace) step class name
	 * @param string $step_id The step ID
	 * @return CaseStep
	 */
	public static function fetch($step_type, $step_id) {
		return ($step_type)::findOrFail($step_id);
	}

	/**
	 * Finds a Child case step by it's case and internal index
	 *
	 * @param string $case_id The child case ID
	 * @param string $step_type The type of step
	 * @param integer $index The case step sequence index
	 * @return CaseStep
	 */
	public static function fetchWithinCase($case_id, $step_type, $index) {
		return ($step_type)::query()
			->where('case_id', $case_id)
			->where('index', $index)
			->firstOrFail();
	}

	/**
	 * Spawns a case step by it's class, pre-filling it with data and attaching it to a case.
	 * Does not modify the parent ChildCase instance.
	 *
	 * @param ChildCase $case The case this step belongs to.
	 * @param int $index The ordering index
	 * @param string $class The step class name (without namespace) to use. Must inherit this class (CaseStep).
	 * @param array $next The data for the next step (should contain keys "index" and "class")
	 * @param array $data The data to fill this step with.
	 * @return CaseStep
	 */
	public static function spawn(ChildCase $case, int $index, string $class, array $next, array $data) {
		$data['tenant_id'] = $case->tenant_id;
		$data['case_id'] = $case->id;
		$data['child_id'] = $case->child_id;

		$data['step_index'] = $index;
		$data['next_index'] = $next['index'] ?? null;
		$data['next_type'] = isset($next['class']) ? "BuscaAtivaEscolar\\CaseSteps\\" . $next['class'] : null;

		$data['step_type'] = "BuscaAtivaEscolar\\CaseSteps\\{$class}";

		$data['is_completed'] = false;

		return ($data['step_type'])::create($data);
	}

}