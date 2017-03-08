<?php
/**
 * busca-ativa-escolar-api
 * ValidationException.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 08/03/2017, 14:52
 */

namespace BuscaAtivaEscolar\Exceptions;


class ValidationException extends \Exception {

	protected $reason = null;
	protected $fields = [];

	public function __construct($reason, $fields = []) {
		$this->reason = $reason;
		$this->fields = $fields;
		parent::__construct($reason, 100, null);
	}

	public function getReason() {
		return $this->reason;
	}

	public function getFields() {
		return $this->fields;
	}

}