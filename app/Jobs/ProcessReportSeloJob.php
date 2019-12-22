<?php

namespace BuscaAtivaEscolar\Jobs;

use Excel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessReportSeloJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public function handle() {

        Log::info("Iniciando processo de exportacao dos dados do Selo UNICEF");
        set_time_limit(0);



        Excel::create('buscaativaescolar_selo_report'.Carbon::now()->timestamp, function($excel) use ($query) {
            $excel->sheet('users', function($sheet) use ($query) {
                //All columns are defined in class User -> toExportArray
                $sheet->appendRow(array(
                    'UF','Município','Nome interno','Data de adesão','Data de cadastro','Nome do usuário','E-mail','Telefone Institucional','Celular Institucional','Celular Pessoal','Data de nascimento','Tipo','Grupo','Instituição','Posição','Cadastro','Data de desativacao'
                ));
                $query->chunk(1000, function ($rows) use ($sheet) {
                    foreach ($rows as $row) {
                        $sheet->appendRow(
                            $row->toExportArray()
                        );
                    }
                });
            });
        })->store('xls', storage_path('app/attachments/selo_reports'));

        Log::info("Finalizando processo de exportacao dos dados do Selo UNICEF");

    }

}