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

use BuscaAtivaEscolar\CaseSteps\Alerta;
use BuscaAtivaEscolar\CaseSteps\CaseStep;
use BuscaAtivaEscolar\Data\AlertCause;
use BuscaAtivaEscolar\Data\CaseCause;
use BuscaAtivaEscolar\Events\AlertAccepted;
use BuscaAtivaEscolar\Events\AlertRejected;
use BuscaAtivaEscolar\Events\AlertSpawned;
use BuscaAtivaEscolar\Events\AlertStatusChanged;
use BuscaAtivaEscolar\Events\ChildStatusChanged;
use BuscaAtivaEscolar\Events\SearchableNeedsReindexing;
use BuscaAtivaEscolar\Reports\Interfaces\CanBeAggregated;
use BuscaAtivaEscolar\Reports\Interfaces\CollectsDailyMetrics;
use BuscaAtivaEscolar\Reports\Traits\AggregatedBySearchDocument;
use BuscaAtivaEscolar\Search\Search;
use BuscaAtivaEscolar\Settings\TenantSettings;
use BuscaAtivaEscolar\Traits\Data\IndexedByUUID;
use BuscaAtivaEscolar\Traits\Data\Sortable;
use BuscaAtivaEscolar\Traits\Data\TenantScopedModel;
use BuscaAtivaEscolar\Search\Interfaces\Searchable;
use Carbon\Carbon;
use Geocoder\Geocoder;
use Geocoder\Model\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Log;

class Child extends Model implements Searchable, CanBeAggregated, CollectsDailyMetrics {

	use SoftDeletes;
	use IndexedByUUID;
	use TenantScopedModel;
	use Sortable;

	use AggregatedBySearchDocument;

	const STATUS_OUT_OF_SCHOOL = "out_of_school";
	const STATUS_OBSERVATION = "in_observation";
	const STATUS_IN_SCHOOL = "in_school";
	const STATUS_CANCELLED = "cancelled";

	const ALERT_STATUS_PENDING = "pending";
	const ALERT_STATUS_ACCEPTED = "accepted";
	const ALERT_STATUS_REJECTED = "rejected";

	const DEADLINE_STATUS_NORMAL = "normal";
	const DEADLINE_STATUS_LATE = "late";

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

		'alert_submitter_id',
		'alert_status',

		'current_case_id',

		'current_step_type',
		'current_step_id',

		'deadline_status',
		'child_status',

		'lat',
		'lng',
		'map_region',
		'map_geocoded_address',
	];

	protected $casts = [
		'map_geocoded_address' => 'array',
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
	 * The alert data that originated the current case
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function alert() {
		// TODO: figure out how to filter this by current case
		return $this
			->hasOne('BuscaAtivaEscolar\CaseSteps\Alerta', 'child_id', 'id');
			//->where('case_id', $this->current_case_id);
	}

	/**
	 * The user that submitted the child alert
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function submitter() {
		return $this->hasOne('BuscaAtivaEscolar\User', 'id', 'alert_submitter_id');
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

	/**
	 * Comments registered on this child's file
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function comments() {
		return $this->morphMany( 'BuscaAtivaEscolar\Comment', 'content')->ordered();
	}

	/**
	 * Attachments uploaded on this child's file
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function attachments() {
		return $this->morphMany( 'BuscaAtivaEscolar\Attachment', 'content')->ordered();
	}

	/**
	 * Activity log entries related to this child's file.
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function activity() {
		return $this->morphMany('BuscaAtivaEscolar\ActivityLog', 'content')->ordered();
	}

	// ------------------------------------------------------------------------

	/**
	 * Gets the URL for viewing a child
	 * @return string
	 */
	public function getViewURL() {
		return str_finish(env('APP_PANEL_URL'), '/') . "children/view/{$this->id}";
	}

	/**
	 * Gets a shorthand identifier for the child (name, gender and age).
	 * Used for notifications, etc.
	 * @return string
	 */
	public function getShorthandIdentifier() {
		return ucwords($this->name)
			. ($this->gender ?
				(" / " . trans('child.gender.' . $this->gender)) : ''
			)
			. ($this->age ?
				(" / " . ($this->age != 1 ? "{$this->age} anos" : "1 ano")) : ''
			);
	}

	/**
	 * Sets the child's current status
	 * @param string $status The child status. See Child::STATUS_*
	 */
	public function setStatus($status) {
		$prevStatus = $this->child_status;
		$this->child_status = $status;
		$this->save();

		event(new ChildStatusChanged($this, $prevStatus, $status));
	}

	/**
	 * Accepts a child alert, moving it to the list of ongoing cases
	 */
	public function acceptAlert() {
		$prevStatus = $this->alert_status;
		$this->alert_status = 'accepted';
		$this->save();

		$alertStep = $this->currentStep; /* @var $alertStep Alerta */
		$alertStep->complete();

		event(new AlertStatusChanged($this, $prevStatus, 'accepted'));
		event(new AlertAccepted($this));
	}

	/**
	 * Rejects a child alert, moving it to the list of rejected cases
	 */
	public function rejectAlert() {
		$prevStatus = $this->alert_status;
		$this->alert_status = 'rejected';
		$this->save();

		event(new AlertStatusChanged($this, $prevStatus, 'rejected'));
		event(new AlertRejected($this));
	}

	/**
	 * Recalculates and updates the child's age through their birthday.
	 * Internally users Carbon for the calculations.
	 * Emits "age_updated" event.
	 *
	 * @param string $birthday The birthday in ISO format (YYYY-MM-DD)
	 */
	public function recalculateAgeThroughBirthday(string $birthday) {
		$this->age = self::calculateAgeThroughBirthday($birthday);
		$this->save();

		event("child.age_updated", [$this]);
	}

	/**
	 * Updates the child's latitude and longitude based on a raw address string
	 * @param string $rawAddress The full address to geocode
	 * @return \Geocoder\Model\Address|null The geocoded address, or null if failed
	 */
	public function updateCoordinatesThroughGeocoding($rawAddress) {
		$geocoder = app('geocoder'); /* @var $geocoder Geocoder */
		$address = null;

		try {
			$address = $geocoder->geocode($rawAddress)->get()->first(); /* @var $address Address */
		} catch (\Exception $ex) {
			Log::error("Failed to geocode child (id={$this->id}) coords with address '{$rawAddress}': " . $ex->getMessage());
		}

		$this->update([
			'lat' => ($address) ? $address->getLatitude() : null,
			'lng' => ($address) ? $address->getLongitude() : null,
			'map_region' => ($address) ? $address->getSubLocality() : null,
			'map_geocoded_address' => ($address) ? $address->toArray() : null,
		]);

		return $address;
	}

	// ------------------------------------------------------------------------

	public function getSearchIndex() : string { return 'children'; }
	public function getSearchType() : string { return 'child'; }
	public function getSearchID() { return $this->id; }

	/**
	 * Triggers a document reindex for the child.
	 */
	public function reindex() {
		event(new SearchableNeedsReindexing($this));
	}

	/**
	 * Builds the searchable document for the child.
	 * @return array
	 */
	public function buildSearchDocument() : array {

		if(!$this->exists) return null;

		$data = [];

		if($this->currentCase) {
			$steps = $this->currentCase->fetchSteps(); /* @var $steps CaseStep[] */

			foreach($steps as $step) {
				$fields = $step->getFields();
				$data = array_filter($fields)
					+ array_filter($data)
					+ array_fill_keys(array_keys($fields) + array_keys($data),null);
			}
		}

		$data = $this->getAttributes() + $data;


		if($this->currentStep) {
			$data['assigned_user_id'] = $this->currentStep->assignedUser->id ?? null;
			$data['assigned_user_name'] = $this->currentStep->assignedUser->name ?? null;
			$data['step_name'] = $this->currentStep->getName() ?? null;
			$data['step_slug'] = str_slug($this->currentStep->getName(), '_') ?? null;
		}

		if($this->submitter) {
			$data['alert_submitter_name'] = $this->submitter->name;
		}

		if($this->currentCase) {
			$data['case_status'] = $this->currentCase->case_status;

			if($this->currentCase->case_cause_ids) { // TODO: refactor this
				$data['cause_name'] = join(", ", array_map(function ($cause_id) {
					return CaseCause::getByID(intval($cause_id))->label ?? '';
				}, $this->currentCase->case_cause_ids));
			} else if($this->currentCase->alert_cause_id) {
				$data['cause_name'] = AlertCause::getByID(intval($this->currentCase->alert_cause_id))->label ?? '';
			}

		}

		$data['city_name'] = $this->city->name ?? null;
		$data['uf'] = $this->city->uf ?? null;
		$data['country_region'] = $this->city->region ?? null;

		return $data;

	}

	// ------------------------------------------------------------------------

	public function getTimeSeriesIndex() : string { return 'children_daily'; }
	public function getTimeSeriesType(): string { return 'child'; }

	/**
	 * Builds a documents with aggregable & filterable metrics for the reporting system
	 * @return array
	 */
	public function buildMetricsDocument(): array {

		return Arr::only($this->buildSearchDocument(), [
			"id",
            "tenant_id",
            "city_id",
            "child_status",
            "case_status",
            "alert_status",
            "deadline_status",
            "age",
            "gender",
            "risk_level",
            "step_slug",
            "is_child_still_in_school",
            "reinsertion_grade",
            "school_city_id",
            "school_id",
            "school_uf",
            "race",
            "has_been_in_school",
            "school_last_grade",
            "school_last_year",
            "school_last_status",
            "school_last_age",
            "is_working",
            "work_activity",
            "work_is_paid",
            "work_weekly_hours",
            "parents_has_mother",
            "parents_has_father",
            "parents_has_brother",
            "parents_who_is_guardian",
            "parents_income",
            "guardian_race",
            "guardian_schooling",
            "case_cause_ids",
            "handicapped_reason_not_enrolled",
            "handicapped_at_sus",
            "place_city_id",
            "place_uf",
            "place_kind",
            "place_is_quilombola",
            "school_last_id",
            "alert_cause_id",
            "assigned_user_id",
            "alert_submitter_id",
            "uf",
            "country_region",
		]);

	}

	// ------------------------------------------------------------------------

	/**
	 * Calculates a children's age by their birthday.
	 * @param string $birthday The birthday in ISO format (YYYY-MM-DD)
	 * @return int|null The age, in years. Will return null if no/invalid date is given.
	 */
	public static function calculateAgeThroughBirthday(string $birthday) {
		if(!$birthday) return null;

		$dob = Carbon::createFromFormat('Y-m-d', $birthday);

		if(!$dob) return null;

		return $dob->diffInYears();
	}

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
		$data['alert_submitter_id'] = $creatorUserID;

		$data['child_status'] = self::STATUS_OUT_OF_SCHOOL;
		$data['alert_status'] = self::ALERT_STATUS_PENDING;
		$data['risk_level'] = $tenant->getSettings()->getAlertPriority($data['alert_cause_id']) ?? ChildCase::RISK_LEVEL_MEDIUM;

		$child = self::create($data);

		$case = ChildCase::spawn($child, $data);
		$alertStep = $case->currentStep;

		$child->current_case_id = $case->id;
		$child->current_step_type = $alertStep->step_type;
		$child->current_step_id = $alertStep->id;

		if(isset($data['dob'])) {
			$child->age = self::calculateAgeThroughBirthday($data['dob']);
		}

		$child->save();

		$alertStep->fill($data);
		$alertStep->assigned_user_id = $creatorUserID;
		$alertStep->save();

		event(new AlertSpawned($child, $case, $alertStep));

		return $child;

	}

	/**
	 * Gets all children with active cases
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public static function getAllActive() {
		return self::query()
			->with(['tenant', 'currentStep'])
			->whereIn('child_status', [self::STATUS_OUT_OF_SCHOOL, self::STATUS_OBSERVATION])
			->where('alert_status', self::ALERT_STATUS_ACCEPTED)
			->get();
	}
}