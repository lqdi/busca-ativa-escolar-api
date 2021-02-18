<?php

namespace BuscaAtivaEscolar\Exports;

use BuscaAtivaEscolar\TenantSignup;
use BuscaAtivaEscolar\City;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

/**
 * @property City|null $city
 */
class TenantSignupExport implements FromQuery, ShouldAutoSize, WithHeadings
{
    use Exportable;
    public function __construct($status)
    {
        $this->status = $status;
    }

    public function query()
    {

        $query =  TenantSignup::query()
            ->with(['city', 'judge', 'tenant.operationalAdmin', 'tenant.politicalAdmin'])
            ->orderBy('created_at', 'ASC');
        switch ($this->status) {
            case "all":
                $query->withTrashed();
                break;
            case "rejected":
                $query->withTrashed()->whereNotNull('deleted_at')->where('is_approved', 0);
                break;
            case "canceled":
                $query->withTrashed()->whereNotNull('deleted_at')->where('is_approved', 1);
                break;
            case "pending_approval":
                $query->where('is_approved', 0);
                break;
            case "pending_setup":
                $query->where('is_approved', 1)->where('is_provisioned', 0);
                break;
            case "active":
                $query->where('is_approved', 1)->where('is_provisioned', 1);
                break;
            case "pending":
            default:
                break;
        }
        return $query;
    }

    public function prepareRows($tenantsSignups)
    {
        return $tenantsSignups->transform(function ($tenantSignup) {
            return $tenantSignup->toExportArray();
        });
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
