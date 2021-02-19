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
  public function __construct($tenants)
  {
    $this->tenants = $tenants;
  }

  public function query()
  {
    return TenantSignup::query()
      ->with(['city', 'judge', 'tenant.operationalAdmin', 'tenant.politicalAdmin'])
      ->withTrashed()
      ->orderBy('created_at', 'ASC');
  }

  public function prepareRows($tenantsSignups)
  {
    return $tenantsSignups->transform(function ($tenantSignup) {
      //$child->name .= ' (pwrepared)';
      //$tenantSignup->gender = isset($tenantSignup->gender) ? trans('child.gender.' . $tenantSignup->gender) : 'N/I';
      //$tenantSignup->city = $tenantSignup->city ? $tenantSignup->city->getRegion()->name : null;
      //return $tenantSignup;
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
