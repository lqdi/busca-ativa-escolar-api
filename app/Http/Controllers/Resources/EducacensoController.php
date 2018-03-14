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
use BuscaAtivaEscolar\Importers\EducacensoXLSImporter;
use BuscaAtivaEscolar\ImportJob;
use BuscaAtivaEscolar\Jobs\ProcessImportJob;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\Transformers\ImportJobTransformer;

class EducacensoController extends BaseController {

	public function import() {
		$file = request()->file('file');
		$tenant = auth()->user()->tenant; /* @var $tenant Tenant */

		if(!$tenant) {
			return $this->api_failure("user_must_be_bound_to_tenant");
		}

		if(!$file || !$file->isValid()) {
			return $this->api_failure('file_not_uploaded', ['file' => $file]);
		}

		try {

			$attachment = Attachment::createFromUpload($file, $tenant, auth()->user(), "Planilha Educacenso - " . date('Y-m-d H:i:s'));
			$attachment->tenant_id = $tenant->id;
			$attachment->save();

			$job = ImportJob::createFromAttachment(EducacensoXLSImporter::TYPE, $attachment);

			dispatch(new ProcessImportJob($job));

		} catch (\Exception $ex) {
			return $this->api_exception($ex);
		}

		return $this->api_success(['job_id' => $job->id, 'attachment_id' => $attachment->id]);
	}

	public function list_jobs() {
		$tenant = auth()->user()->tenant;

		if(!$tenant) {
			return $this->api_failure("user_must_be_bound_to_tenant");
		}

		$jobs = ImportJob::fetchTenantJobs($tenant->id, EducacensoXLSImporter::TYPE);

		return fractal($jobs)
			->parseIncludes(['user', 'tenant'])
			->transformWith(new ImportJobTransformer())
			->serializeWith(new SimpleArraySerializer())
			->respond();
	}

}