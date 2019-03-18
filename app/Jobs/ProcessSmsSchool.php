<?php
/**
 * Created by PhpStorm.
 * User: mansouza
 * Date: 3/14/2019
 * Time: 4:51 PM
 */

namespace BuscaAtivaEscolar\Jobs;


use BuscaAtivaEscolar\SMS\Handlers\Zenvia;

class ProcessSmsSchool
{

    private $school;

    /**
     * ProcessSmsSchool constructor.
     * @param $school
     */
    public function __construct($school)
    {
        $this->school = $school;
    }

    /**
     * Handles a queued sms
     * @throws \Exception
     */
    public function handle() {
        $zenvia = new Zenvia();
        $zenvia->send('55'.$this->school->school_cell_phone, $this->getMessage());
    }

    private function getMessage()
    {
        return $this->school->name." | A BUSCA ATIVA ESCOLAR PRECISA DE SUA AJUDA! POR FAVOR, ACESSE O EMAIL ".strtoupper($this->school->school_email)." E AJUDE A ENCONTRAR AS CRIANÇAS FORA DA ESCOLA.";
    }
}