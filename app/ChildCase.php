<?php
/**
 * busca-ativa-escolar-api
 * ChildCase.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2016
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 28/12/2016, 22:00
 */

namespace BuscaAtivaEscolar;

use BuscaAtivaEscolar\CaseSteps\CaseStep;
use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use BuscaAtivaEscolar\Traits\Data\TenantScopedModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChildCase extends Model  {

	use SoftDeletes;
	use IndexedByUUID;
	use TenantScopedModel;

	// Case statuses
	const STATUS_CANCELLED = "cancelled";
	const STATUS_IN_PROGRESS = "in_progress";
	const STATUS_INTERRUPTED = "interrupted";
	const STATUS_COMPLETED = "completed";

	// Case risk levels
	const RISK_LEVEL_HIGH = "high";
	const RISK_LEVEL_MEDIUM = "medium";
	const RISK_LEVEL_LOW = "low";

	/**
	 * The list and order of the default steps a case has.
	 * @var array
	 */
	public static $REQUIRED_STEPS = [
		1 => ['index' => 1, 'class' => 'Alerta'],
		2 => ['index' => 2, 'class' => 'Pesquisa'],
		3 => ['index' => 3, 'class' => 'GestaoDoCaso'],
		4 => ['index' => 4, 'class' => 'Rematricula'],
		5 => ['index' => 5, 'class' => 'Observacao', 'fill' => ['report_index' => 1]],
		6 => ['index' => 6, 'class' => 'Observacao', 'fill' => ['report_index' => 2]],
		7 => ['index' => 7, 'class' => 'Observacao', 'fill' => ['report_index' => 3]],
		8 => ['index' => 8, 'class' => 'Observacao', 'fill' => ['report_index' => 4]],
	];

	protected $table = "children_cases";
	protected $fillable = [
		'child_id',

		'case_status',

		'name',

		'risk_level',

		'is_current',

		'assigned_group_id',
		'assigned_user_id',

		'created_by_user_id',

		'current_step_id',
		'current_step_type',

		'linked_steps',
	];

	protected $casts = [
		'is_current' => 'boolean',
		'linked_steps' => 'collection',
	];

	/**
	 * Internal cache of steps filled by fetchSteps()
	 * @var CaseStep[]
	 */
	protected $_steps = null;

	/**
	 * The child this case belongs to.
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function child() {
		return $this->hasOne('BuscaAtivaEscolar\Child', 'id', 'child_id');
	}

	/**
	 * The user that is assigned as responsible for this case.
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function assignedUser() {
		return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'assigned_user_id');
	}

	/**
	 * The current step this case is at.
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function currentStep() {
		return $this->morphTo();
	}

	// ------------------------------------------------------------------------

	/**
	 * Fetches (as model instances) all steps associated with this case.
	 * This method uses the linked_steps JSON to resolve step type and IDs.
	 *
	 * @return CaseStep[]
	 */
	public function fetchSteps() {
		if($this->_steps != null) return $this->_steps;

		$this->_steps = [];

		foreach($this->linked_steps as $step) {
			$step = ($step['type'])::find($step['id']);
			array_push($this->_steps, $step);
		}

		return $this->_steps;
	}

	// ------------------------------------------------------------------------

	/**
	 * Generates a name for a new case, based on the current year and how many cases there has been for this child.
	 *
	 * @param Child $child The child we're creating a new case for
	 * @return string The generated name
	 */
	public static function generateName(Child $child) {
		$numCases = self::query()->where('child_id', $child->id)->count();
		return date('Y') . '/' . (intval($numCases) + 1);
	}

	/**
	 * Spawns a new Child Case, along with the default Case Steps.
	 * Internally resolves risk level and responsability via Tenant workflow settings.
	 * Also handles linking the spawned steps, and pre-fills the Alerta step with given data.
	 *
	 * @param Child $child The child this case belongs to
	 * @param array $data Data to pre-fill the Alerta step (as well as internal child data, such as "name" and "age")
	 * @param bool $is_current Is this case the current case (does NOT mark other cases as non-current!)
	 * @return ChildCase The spawned case
	 */
	public static function spawn(Child $child, array $data, bool $is_current = true) {

		$tenant = $child->tenant;

		$data['tenant_id'] = $tenant->id;
		$data['child_id'] = $child->id;

		$data['is_current'] = $is_current;

		$data['name'] = self::generateName($child);

		// TODO: set assigned group/user via tenant settings
		// TODO: figure out which user created this case

		$case = parent::create($data); /* @var $case ChildCase */
		$steps = [];

		foreach(self::$REQUIRED_STEPS as $index => $step) { // Spawns out the default step structure
			array_push($steps, CaseStep::spawn($case, $step['class'], $step['fill'] ?? []));
		}

		$case->linked_steps = collect($steps)->map(function ($step, $key) { // Builds linked steps structure
			return ['id' => $step->id, 'type' => $step->step_type];
		});

		// Sets the first step as the current step (Alerta)
		$current_step = array_shift($steps);
		$case->current_step_id = $current_step->id;
		$case->current_step_type = $current_step->step_type;

		$case->save();

		return $case;
	}

}