<?php


namespace BuscaAtivaEscolar\Jobs;


use BuscaAtivaEscolar\SMS\Handlers\Zenvia;

class ProcessSmsFrequencySchool
{

    private $school;

    /**
     * ProcessSmsFrequencySchool constructor.
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
        return "Por gentileza, acesse o email ".strtolower($this->school->school_email)." e contribua para o cadastro de turmas e frequência da sua escola.";
    }

}