<?php

namespace BuscaAtivaEscolar\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;


class RepostsExport implements FromArray, ShouldAutoSize /*WithHeadings*/
{
    use Exportable;
    public function __construct($childrens)
    {
        $this->childrens = $childrens;
    }
    public function array(): array
    {
        return $this->childrens;
    }
}
