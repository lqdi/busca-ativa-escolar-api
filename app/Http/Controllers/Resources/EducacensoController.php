<?php
/**
 * busca-ativa-escolar-api
 * EducacensoController.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2018
 *
 * @author Aryel Tupinamba <aryel.tupinamba@lqdi.net>
 *
 * Created at: 05/03/2018, 13:09
 */

namespace BuscaAtivaEscolar\Http\Controllers\Resources;


use BuscaAtivaEscolar\Attachment;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Jobs\ParseEducacensoFile;

class EducacensoController extends BaseController {

	public function import() {
		$file = request()->file('file');
		$tenant = auth()->user()->tenant;

		if(!$tenant) {
			return $this->api_failure("user_must_be_bound_to_tenant");
		}

		if(!$file || !$file->isValid()) {
			return $this->api_failure('file_not_uploaded', ['file' => $file]);
		}

		$file = Attachment::createFromUpload($file, $tenant, auth()->user(), "educacenso import " . date('Y-m-d H:i:s'));

		dispatch(new ParseEducacensoFile($tenant, $file));

		return response()->json(['status' => 'ok', 'attachment_id' => $file->id]);
	}

}