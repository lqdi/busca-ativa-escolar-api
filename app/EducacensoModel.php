<?php

namespace BuscaAtivaEscolar;

use Illuminate\Database\Eloquent\Model;

class EducacensoModel extends Model{

    protected $attributes = [
        'identificacao_unica' => null,
        'nome_do_aluno' => null,
        'data_de_nascimento' => null,
        'filiacao_1' => null,
        'localizacao' => null,
        'codigo_da_escola' => null,
        'nome_da_escola' => null
    ];

}