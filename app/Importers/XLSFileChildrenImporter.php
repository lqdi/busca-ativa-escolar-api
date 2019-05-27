<?php

namespace BuscaAtivaEscolar\Importers;

use BuscaAtivaEscolar\ImportJob;
use BuscaAtivaEscolar\User;
use Excel;
use Log;
use Exception;

class XLSFileChildrenImporter implements Importer
{
    const TYPE = "xls_file_children";

    /**
     * @var ImportJob The import job submitted
     */
    public $job;

    /**
     * @var Tenant The tenant that is importing the alerts
     */
    public $tenant;

    /**
     * @var string The XLS file absolute path
     */
    public $file;

    /**
     * @var User The agent that is identified as the creator of the alerts
     */
    private $agent;

    public function handle(ImportJob $job)
    {

        $this->job = $job;
        $this->tenant = $job->tenant;
        $this->file = $job->getAbsolutePath();

        $this->agent = User::find(User::ID_EDUCACENSO_BOT);

        if(!$this->agent) {
            throw new Exception("Failed to find Educacenso bot user!");
        }

        Log::info("[educacenso_import] Tenant {$this->tenant->name}, file {$this->file}");
        Log::info("[educacenso_import] Loading spreadsheet data into memory ...");

        Excel::selectSheetsByIndex(0)->filter('chunk')->load($this->file)->chunk(
            250,
            function ($results) {
                foreach ($results->toArray() as $rowNumber => $row) {

                    if(!array_key_exists('teste', $row)){
                        Log::info("[Importacao do Arquivo XLS] \t Coluna ");
                        throw new Exception("Arquivo inválido. Não tem a coluna teste");
                    }

                }
            },
            false
        );

        Log::info("[educacenso_import] Completed parsing all records");
        Log::info("[educacenso_import] Job completed!");

    }
}