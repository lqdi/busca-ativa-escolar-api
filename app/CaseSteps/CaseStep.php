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
use BuscaAtivaEscolar\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

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
		'assigned_user_id',
		'assigned_group_id',
		'is_pending_assignment',
		'completed_at',
		'is_completed',
	];

	protected $casts = [
		'completed_at' => 'datetime',
		'is_completed' => 'boolean',
		'is_pending_assignment' => 'boolean',
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
	 * @var $child \BuscaAtivaEscolar\Child
	 */
	public function child() {
		return $this->hasOne('BuscaAtivaEscolar\Child', 'id', 'child_id');
	}

	/**
	 * The case this step belongs to.
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 * * @var $childCase \BuscaAtivaEscolar\ChildCase
	 */
	public function childCase() {
		return $this->hasOne('BuscaAtivaEscolar\ChildCase', 'id', 'case_id');
	}

	/**
	 * The user currently assigned to this step. (null if step is unassigned)
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 * @var $assignedUser \BuscaAtivaEscolar\User
	 */
	public function assignedUser() {
		return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'assigned_user_id');
	}

	/**
	 * The group currently assigned to this step.
	 * When no user is assigned, this group indicates which group supervisor should (re)assign.
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 * @var $assignedGroup \BuscaAtivaEscolar\Group
	 */
	public function assignedGroup() {
		return $this->hasOne('BuscaAtivaEscolar\Group', 'id', 'assigned_group_id');
	}

	/**
	 * Fetches the next step in the sequence, or null if no step is next.
	 * @return CaseStep|null
	 */
	public function fetchNextStep() {
		if(!$this->next_type || !$this->next_index) return null;

		if($this->_next === null) {
			$this->_next = self::fetchWithinCase($this->case_id, $this->next_type, $this->next_index);
		}

		return $this->_next;
	}

	/**
	 * Starts a step, clearing the completion flag and firing appropriate events.
	 * This will call onStart(), which is responsible for determining if a step begins by waiting for assignment.
	 *
	 * @param CaseStep|null $prevStep The step that preceded this one, or null if none
	 */
	public function start($prevStep) {
		$this->is_completed = false;
		$this->save();

		$this->onStart($prevStep);

		event('case_step.start', ['step' => $this, 'previous' => $prevStep]);
	}

	/**
	 * Completes a step, marking it as completed and advancing the case to the next step.
	 * @return CaseStep|null Returns the next step, or null if none
	 */
	public function complete() {

		$this->is_completed = true;
		$this->save();

		$nextStep = $this->childCase->advanceToNextStep($this);

		$this->onComplete($nextStep);

		event('case_step.complete', ['step' => $this, 'next' => $nextStep]);

		return $nextStep;
	}

	/**
	 * Flags the step as currently pending assignment.
	 * This will make the step show up in the list of "assignments pending".
	 */
	public function flagAsPendingAssignment() {
		$this->is_pending_assignment = true;
		$this->save();
	}

	/**
	 * Assigns this step to a specific user.
	 * This will clear the "is pending assignment" flag.
	 *
	 * @param User $user
	 */
	public function assignToUser(User $user) {

		$this->is_pending_assignment = false;
		$this->assigned_user_id = $user->id;
		$this->save();

		$this->onAssign($user);

		event('case_step.assigned', ['step' => $this, 'user' => $user]);
	}

	/**
	 * Updates the step fields, ignoring fields not in stepFields.
	 * Emits the "updated" event.
	 *
	 * @param array $data The fields that should be updated
	 * @return array $input The actual updated fields
	 */
	public function setFields(array $data) {
		$input = collect($data)->only($this->stepFields)->toArray();
		$this->fill($input);
		$this->save();

		event('case_step.updated', ['data' => $data]);

		return $input;
	}

	// ------------------------------------------------------------------------
	// These are not abstract because they're optional

	protected function onStart($prevStep = null) {}
	protected function onComplete($nextStep = null) {}
	protected function onAssign(User $user) {}

	// ------------------------------------------------------------------------
	// These are meant to be overriden as necessary

	/**
	 * Can the case be interrupted (@see ChildCase::interrupt()) at this step?
	 * @return bool
	 */
	public function canInterrupt() {
		return false;
	}

	/**
	 * Gets a list of "column => value" filters for the list of assignable users.
	 * Defaults to any user (within tenant scope)
	 * @return array
	 */
	public function getAssignableUsersFilter() {
		return [];
	}

	/**
	 * Returns a validator that validates adequately the step fields.
	 * @param array $data The input data (usually Request::all())
	 * @param boolean $isCompletingStep Is the validation being done at step completion?
	 * @return \Illuminate\Contracts\Validation\Validator The Validator instance
	 */
	public function validate($data, $isCompletingStep = false) {
		return validator($data, []);
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
			->where('step_index', $index)
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