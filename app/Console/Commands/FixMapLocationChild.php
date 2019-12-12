<?php
/**
 * busca-ativa-escolar-api
 * CheckCaseDeadlines.php
 *
 * Copyright (c) LQDI Digital
 * www.lqdi.net - 2017
 *
 * @author Aryel Tupinambá <aryel.tupinamba@lqdi.net>
 *
 * Created at: 16/02/2017, 19:15
 */

namespace BuscaAtivaEscolar\Console\Commands;


use BuscaAtivaEscolar\CaseSteps\Alerta;
use BuscaAtivaEscolar\CaseSteps\CaseStep;
use BuscaAtivaEscolar\CaseSteps\Pesquisa;
use BuscaAtivaEscolar\Child;
use Carbon\Carbon;
use Log;

class FixMapLocationChild extends Command
{

    protected $signature = 'maintenance:fix_map_location_child';
    protected $description = 'Set Geo Location in Children';

    public function handle()
    {

        Pesquisa::chunk(500, function ($children) {
            $today = Carbon::today();
            foreach ($children as $child) {
                if ($child->place_address && $child->place_city_name && $child->place_uf) {
                    try {
                        $address = $child->updateCoordinatesThroughGeocoding("{$child->place_address},{$child->place_city_name},{$child->place_uf}");
                        $child->update([
                            'place_lat' => ($address) ? $address->getLatitude() : null,
                            'place_lng' => ($address) ? $address->getLongitude() : null,
                            'place_map_region' => ($address) ? $address->getSubLocality() : null,
                            'place_map_geocoded_address' => ($address) ? $address->toArray() : null,
                        ]);

                    } catch (\Exception $ex) {
                        //Log::debug("[pesquisa.on_update.geocode_addr] ({$this->id}) Failed to geocode address: {$ex->getMessage()}");
                    }
                    Log::info('success update location children_id: ' . $child->id);
                    $this->comment("Processing: {$child->id}: \t Etapa: {} days \t {} \t {} -> {}");
                } else {
                    Log::error('fail set location children_id: ' . $child->id);

                    $this->comment("Endereço incompleto: {$child->id}: \t Etapa: {} days \t {} \t {} -> {}");
                }
            }
            $this->comment("Finalizando grupo de 500 casos");
        });
    }
}