<?php

namespace BuscaAtivaEscolar\Exports;

use BuscaAtivaEscolar\TenantSignup;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TenantSignupExport implements FromArray, ShouldAutoSize, WithHeadings
{
    use Exportable;
    public function __construct($tenants)
    {
        $this->tenants = $tenants;
    }

    public function array(): array
    {
        return $this->tenants;
    }

    public function headings(): array
    {
        return [
            'ID Adesão',
            'Região',
            'UF',
            'Município',
            'Status (Considerando últimos 30 dias)',
            'Último acesso',
            'Adesão - Gestor - Nome',
            'Adesão - Gestor - E-mail',
            'Adesão - Gestor - Telefone',
            'Adesão - Prefeito - Nome',
            'Adesão - Prefeito - E-mail',
            'Adesão - Prefeito - Telefone',
            'Instância - Gestor Operacional - Nome',
            'Instância - Gestor Operacional - E-mail',
            'Instância - Gestor Operacional - Telefone',
            'Instância - Gestor Político - Nome',
            'Instância - Gestor Político - E-mail',
            'Instância - Gestor Político - Telefone',
            'Data adesão',
            'Data ativação',
            'Data exclusão/ rejeição',
            'Endereço IP',
            'Navegador',
            'Instância - ID',
            'Instância - Nome',
            'Código - IBGE'
        ];
    }
}
