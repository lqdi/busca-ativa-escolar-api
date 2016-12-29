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


use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use BuscaAtivaEscolar\Traits\Data\TenantScopedModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChildCase extends Model  {

	use SoftDeletes;
	use IndexedByUUID;
	use TenantScopedModel;

	const STATUS_CANCELLED = "cancelled";
	const STATUS_IN_PROGRESS = "in_progress";
	const STATUS_INTERRUPTED = "interrupted";
	const STATUS_COMPLETED = "completed";

	const RISK_LEVEL_HIGH = "high";
	const RISK_LEVEL_MEDIUM = "medium";
	const RISK_LEVEL_LOW = "low";

	static $REQUIRED_STEPS = [ // TODO: on creation, these get created as well
		1 => ['index' => 1, 'class' => 'Alerta'],
		2 => ['index' => 2, 'class' => 'Pesquisa'],
		3 => ['index' => 3, 'class' => 'GestaoDoCaso'],
		4 => ['index' => 4, 'class' => 'Reinsercao'],
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

	protected $_steps = null;

	public function child() {
		return $this->hasOne('BuscaAtivaEscolar\Child', 'id', 'child_id');
	}

	public function assignedUser() {
		return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'assigned_user_id');
	}

	public function currentStep() {
		return $this->morphTo();
	}

	public function getSteps() {
		if($this->_steps != null) return $this->_steps;

		$this->_steps = [];

		foreach($this->linked_steps as $step) {
			// TODO: does this work? test in CLI beforehand
			$step = ($step->type)::find($step->id);
			array_push($this->_steps, $step);
		}

		return $this->_steps;
	}

	public static function generateName(Child $child) {
		$numCases = self::query()->where('child_id', $child->id)->count();
		return date('Y') . '/' . (intval($numCases) + 1);
	}

	public static function create(Tenant $tenant, Child $child, array $data) {

		$data['child_id'] = $child->id;
		$data['risk_level'] = self::RISK_LEVEL_HIGH; // TODO: fetch from tenant settings
		$data['is_current'] = true;

		$data['name'] = self::generateName($child);

		// TODO: set assigned group/user via tenant settings
		// TODO: figure out which user created this case

		$case = parent::create($data); /* @var $case ChildCase */
		$steps = [];

		foreach(self::$REQUIRED_STEPS as $index => $step) {
			array_push($steps, CaseStep::generate($tenant, $case, $step['class'], $step['fill'] ?? []));
		}

		$case->linked_steps = collect($steps)->map(function ($step, $key) {
			return ['id' => $step->id, 'type' => $step->step_type];
		});

		$current_step = array_shift($steps);
		$case->current_step_id = $current_step->id;
		$case->current_step_type = $current_step->step_type;

		$case->save();

		return $case;
	}

}