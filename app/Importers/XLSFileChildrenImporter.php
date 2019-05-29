<?php

namespace BuscaAtivaEscolar\Importers;

use BuscaAtivaEscolar\ImportJob;
use BuscaAtivaEscolar\User;
use Config;
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

        Config::set('excel.import.startRow', 1);
        Excel::selectSheetsByIndex(0)->filter('chunk')->load($this->file)->chunk(
            250,
            function ($results) {
                foreach ($results->toArray() as $rowNumber => $row) {

                    if(!array_key_exists('nome_do_aluno', $row)){
                        throw new Exception("Arquivo inválido. Não tem a coluna Nome do aluno");
                    }

                    if(!array_key_exists('data_de_nascimento', $row)){
                        throw new Exception("Arquivo inválido. Não tem a coluna Data de nascimento");
                    }

                    if(!array_key_exists('nome_da_mae', $row)){
                        throw new Exception("Arquivo inválido. Não tem a coluna Data de nascimento");
                    }

                    if(!array_key_exists('nome_do_pai', $row)){
                        throw new Exception("Arquivo inválido. Não tem a coluna Nome do pai");
                    }

                    if(!array_key_exists('endereco' , $row)){
                        throw new Exception("Arquivo inválido. Não tem a coluna Endereço");
                    }

                    if(!array_key_exists('bairro' , $row)){
                        throw new Exception("Arquivo inválido. Não tem a coluna Bairro");
                    }

                    if(!array_key_exists('uf' , $row)){
                        throw new Exception("Arquivo inválido. Não tem a coluna Bairro");
                    }

                    if(!array_key_exists('cidade' , $row)){
                        throw new Exception("Arquivo inválido. Não tem a coluna Cidade");
                    }

                    if(!array_key_exists('cep' , $row)){
                        throw new Exception("Arquivo inválido. Não tem a coluna CEP");
                    }

                    if(!array_key_exists('telefone' , $row)){
                        throw new Exception("Arquivo inválido. Não tem a coluna Telefone");
                    }

                    if(!array_key_exists('observacoes' , $row)){
                        throw new Exception("Arquivo inválido. Não tem a coluna Observações");
                    }

                    //TODO Parse dos campos...

                }
            },
            false
        );

        Log::info("[educacenso_import] Completed parsing all records");
        Log::info("[educacenso_import] Job completed!");

    }
}