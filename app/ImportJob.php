<?php
/**
 * busca-ativa-escolar-api
 * ImportJob.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 05/04/2017, 16:48
 */

namespace BuscaAtivaEscolar;


use BuscaAtivaEscolar\Importers\Importer;
use BuscaAtivaEscolar\Importers\SchoolCSVImporter;
use Illuminate\Database\Eloquent\Model;

class ImportJob extends Model {

	const PUBLIC_FIELDS = [
		'id',
		'created_at',

		'type',
		'status',

		'path',

		'offset',
		'total_records',
	];

	const TYPES = [
		'school_csv' => SchoolCSVImporter::class,
	];

	const STATUS_PENDING = "pending";
	const STATUS_PROCESSING = "processing";
	const STATUS_COMPLETED = "completed";
	const STATUS_FAILED = "failed";

	protected $table = "import_jobs";

	protected $fillable = [
		'type',
		'status',

		'path',
		'errors',

		'offset',
		'total_records',
	];

	protected $casts = [
		'offset' => 'integer',
		'total_records' => 'integer',
		'errors' => 'array',
	];

	public function storeError(\Exception $ex) {
		if(!$this->errors) $this->errors = [];

		$errors = $this->errors;
		array_push($errors, $ex->getMessage());
		$this->errors = $errors;
	}

	public function setOffset($offset) {
		$this->update(['offset' => $offset]);
	}

	public function setStatus($status) {
		$this->update(['status' => $status]);
	}

	public function setTotalRecords($total_records) {
		$this->update(['total_records' => $total_records]);
	}

	public function handle() {

		set_time_limit(0);
		ignore_user_abort(true);

		$class = self::TYPES[$this->type];

		if(!$class) throw new \InvalidArgumentException("No handler for import type: {$this->type}");

		$handler = new $class(); /* @var $handler Importer */

		return $handler->handle($this);

	}

	public function getAbsolutePath() {
		return storage_path('app/' . $this->path);
	}

}