<?php
/**
 * busca-ativa-escolar-api
 * ChildActivityLogObserver.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 26/01/2017, 14:02
 */

namespace BuscaAtivaEscolar\Observers;


use BuscaAtivaEscolar\ActivityLog;
use BuscaAtivaEscolar\Child;

class ChildActivityLogObserver {

	public function created(Child $child) {
		ActivityLog::writeEntry($child, 'created', ['child_name' => $child->name, 'child' => $child, 'request' => request()->all()], ['source' => get_class()]);
	}
//Todo vericar a necessidade desse update
//	public function updated(Child $child) {
//		ActivityLog::writeEntry($child, 'updated', ['child_name' => $child->name, 'child' => $child, 'request' => request()->all()], ['source' => get_class()]);
//	}

	public function deleted(Child $child) {
		ActivityLog::writeEntry($child, 'deleted', ['child_name' => $child->name, 'child' => $child, 'request' => request()->all()], ['source' => get_class()]);
	}

}