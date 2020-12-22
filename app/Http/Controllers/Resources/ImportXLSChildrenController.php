<?php

namespace BuscaAtivaEscolar\Http\Controllers\Resources;

use BuscaAtivaEscolar\Attachment;
use BuscaAtivaEscolar\Http\Controllers\BaseController;
use BuscaAtivaEscolar\Importers\XLSFileChildrenImporter;
use BuscaAtivaEscolar\ImportJob;
use BuscaAtivaEscolar\Jobs\ProcessImportJob;
use BuscaAtivaEscolar\Serializers\SimpleArraySerializer;
use BuscaAtivaEscolar\Transformers\ImportJobTransformer;
use Exception;

class ImportXLSChildrenController extends BaseController
{


    const PERMITED_FILES_MIME_TYPES = [
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'application/vnd.ms-excel',
        'application/octet-stream'
    ];

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function list_jobs() {

        $tenant = auth()->user()->tenant;

        if(!$tenant) {
            return $this->api_failure("user_must_be_bound_to_tenant");
        }

        $jobs = ImportJob::fetchTenantJobs($tenant->id, XLSFileChildrenImporter::TYPE);

        return fractal($jobs)
            ->parseIncludes(['user', 'tenant'])
            ->transformWith(new ImportJobTransformer())
            ->serializeWith(new SimpleArraySerializer())
            ->respond();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function import_xls(){


        $file = request()->file('file');

        if(!in_array($file->getMimeType(), self::PERMITED_FILES_MIME_TYPES)){
            return response()->json(["reason" => "Arquivo inválido!",  "status" => "error"], 400);
        }

        $tenant = auth()->user()->tenant; /* @var $tenant Tenant */

        if(!$tenant) {
            return $this->api_failure("user_must_be_bound_to_tenant");
        }

        if(!$file || !$file->isValid()) {
            return response()->json(["reason" => "File not permitted",  "status" => "error"], 400);
        }

        try {

            $attachment = Attachment::createFromUpload($file, $tenant, auth()->user(), "Planilha XLS - " . date('Y-m-d H:i:s'));
            $attachment->tenant_id = $tenant->id;
            $attachment->save();

            $job = ImportJob::createFromAttachment(XLSFileChildrenImporter::TYPE, $attachment);

            dispatch(new ProcessImportJob($job));

        } catch (Exception $ex) {
            return $this->api_exception($ex);
        }

        return $this->api_success(['job_id' => $job->id, 'attachment_id' => $attachment->id]);
    }

}