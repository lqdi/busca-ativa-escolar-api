<?php


namespace BuscaAtivaEscolar\Importers\TypeImporters;


use BuscaAtivaEscolar\EducacensoModel;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class EducacensoImporter implements ToModel, WithChunkReading, WithHeadingRow
{

    use RemembersChunkOffset;

    public function model(array $row)
    {
        $chunkOffset = $this->getChunkOffset();

        return new EducacensoModel([
            'identificacao_unica' => $row['identificacao_unica'],
            'nome_do_aluno' => $row['nome_do_aluno'],
            'data_de_nascimento' => $row['data_de_nascimento'],
            'filiacao_1' => $row['filiacao_1'],
            'localizacao' => $row['localizacao'],
            'codigo_da_escola' => $row['codigo_da_escola'],
            'nome_da_escola' => $row['nome_da_escola']
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function headingRow(): int
    {
        return 12;
    }
}