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
use BuscaAtivaEscolar\Importers\EducacensoXLSChunkImporter;
use BuscaAtivaEscolar\ImportJob;
use BuscaAtivaEscolar\Jobs\ProcessImportJob;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Tenant;
use BuscaAtivaEscolar\Transformers\ImportJobTransformer;
use Excel;


class EducacensoController extends BaseController {

	public $erro = false;
	public $msg_erro = "";

    const PERMITED_FILES_MIME_TYPES = [
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
		'application/vnd.ms-excel',
		'application/octet-stream'
    ];

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function import() {
		$file = request()->file('file');

		if(!in_array($file->getMimeType(), self::PERMITED_FILES_MIME_TYPES)){
            return response()->json(["reason" => "File not permitted",  "status" => "error"], 400);
		}

		$tenant = auth()->user()->tenant; /* @var $tenant Tenant */

		if(!$tenant) {
			return $this->api_failure("user_must_be_bound_to_tenant");
		}

		if(!$file || !$file->isValid()) {
            return response()->json(["reason" => "File not permitted",  "status" => "error"], 400);
		}

		try {

			$attachment = Attachment::createFromUpload($file, $tenant, auth()->user(), "Planilha Educacenso - " . date('Y-m-d H:i:s'));
			$attachment->tenant_id = $tenant->id;
			$attachment->save();

			$job = ImportJob::createFromAttachment(EducacensoXLSChunkImporter::TYPE, $attachment);

			//validate file
			// Excel::load($job->getAbsolutePath(), function($doc){
			// 	$sheet = $doc->getSheetByName('Relatório'); 
			// 	if( $sheet == null ){
			// 		$this->erro = true;
			// 		$this->msg_erro = "Aba Relatório não localizada";
			// 		return;
			// 	}
			// 	if( trim($sheet->getCell("B5")) != "Resultados finais do Censo Escolar da Educação Básica 2018 - Educacenso"){
			// 		$this->erro = true;
			// 		$this->msg_erro = "Cabeçalho do arquivo diferente do padrão do Educacenso 2018";
			// 	}
			// });

			// if($this->erro){
			// 	$job->setStatus(ImportJob::STATUS_FAILED);
			// 	return response()->json(["reason" => $this->msg_erro,  "status" => "error"], 400);
			// }
			//-------------

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

		$jobs = ImportJob::fetchTenantJobs($tenant->id, EducacensoXLSChunkImporter::TYPE);

		return fractal($jobs)
			->parseIncludes(['user', 'tenant'])
			->transformWith(new ImportJobTransformer())
			->serializeWith(new SimpleArraySerializer())
			->respond();
	}

}