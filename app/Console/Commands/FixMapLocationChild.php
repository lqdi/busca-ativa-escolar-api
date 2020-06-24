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


use BuscaAtivaEscolar\CaseSteps\Pesquisa;
use BuscaAtivaEscolar\Child;
use Carbon\Carbon;
use Log;

class FixMapLocationChild extends Command
{

    protected $signature = 'maintenance:fix_map_location_child';
    protected $description = 'Set Geo Location in Children';
    private $chunk = 500;

    public function handle()
    {
        $casosAtivos = Child::whereHas('cases', function ($query) {
            $query->where(['case_status' => 'in_progress']);
        })->where(
            [
                'alert_status' => 'accepted'
            ])->chunk($this->chunk, function ($cases) {

            foreach ($cases as $case) {
                var_dump($case->pesquisa);exit;
                if (empty($case->pesquisa->place)) {
                    if (($case->pesquisa->place_uf && $case->pesquisa->place_city_name && $case->pesquisa->place_address)) {
                        try {
                            $address = "{$case->pesquisa->place_address} {$this->place_neighborhood} {$case->pesquisa->place_city_name} {$case->pesquisa->place_uf} {$case->pesquisa->place_cep}";

                            $location = $case->updateCoordinatesThroughGeocoding($address);

                            $case->pesquisa->update([
                                'place_lat' => ($location->MapView) ? $location->MapView->TopLeft->Latitude : null,
                                'place_lng' => ($location->MapView) ? $location->MapView->TopLeft->Longitude : null,
                                'place_map_region' => ($location->Address) ? $location->Address->District : null,
                                'place_cep' => ($location->Address) ? $location->Address->PostalCode : null,
                                'place_map_geocoded_address' => ($location) ? $location : null,
                            ]);

                        } catch (\Exception $ex) {
                            Log::debug("[pesquisa.on_update.geocode_addr] ({$case->id}) Failed to geocode address: {$ex->getMessage()}");
                        }
                        Log::info('success update location children_id: ' . $case->id);
                        $this->comment("putting location in: {$case->id}");
                    } else {
                        Log::error('fail set location children_id: ' . $case->id);
                        $this->comment("Incomplete address or location already used: {$case->id}");
                    }
                }
            }
            $this->comment("Grupo de {$this->chunk} finalizado");

        });


//        $childObj = Child::whereHas('cases', function ($query) {
//            $query->where(['case_status' => 'in_progress']);
//        })->where(
//            [
//                'id' => $pesquisa->child_id,
//            ])->first();
//
//
//        Pesquisa::chunk($this->chunk, function ($pesquisas) {
//            $today = Carbon::today();
//            foreach ($pesquisas as $pesquisa) {
//
//                $childObj = Child::whereHas('cases', function ($query) {
//                    $query->where(['case_status' => 'in_progress']);
//                })->where(
//                    [
//                        'id' => $pesquisa->child_id,
//                    ])->whereNull('lat')->first();
//
//                var_dump($childObj);
//                exit;
//
//                if (($pesquisa->place_address && $pesquisa->place_city_name && $pesquisa->place_uf) && !$childObj->map_geocoded_address) {
//                    var_dump($childObj->map_geocoded_address['country']);
//                    try {
//                        $placeAdress = rtrim($pesquisa->place_address, ',');
//                        $address = "{$pesquisa->place_city_name},'{$placeAdress}',{$pesquisa->place_uf},{$pesquisa->place_cep}";
//                        var_dump($this->getCep($pesquisa, $placeAdress));
//                        exit;
//
//                        $location = $childObj->updateCoordinatesThroughGeocoding($address);
//                        $pesquisa->update([
//                            'place_lat' => ($location->MapView) ? $location->MapView->TopLeft->Latitude : null,
//                            'place_lng' => ($location->MapView) ? $location->MapView->TopLeft->Longitude : null,
//                            'place_map_region' => ($location->Address) ? $location->Address->District : null,
//                            'Place_map_geocoded_address' => ($location) ? $location : null,
//                        ]);
//                    } catch (\Exception $ex) {
//                        Log::debug("[pesquisa.on_update.geocode_addr] ({$childObj->id}) Failed to geocode address: {$ex->getMessage()}");
//                    }
//                    Log::info('success update location children_id: ' . $childObj->id);
//                    $this->comment("putting location in: {$childObj->id}");
//                } else {
//                    Log::error('fail set location children_id: ' . $childObj->id);
//                    $this->comment("Incomplete address or location already used: {$childObj->id}");
//                }
//            }
//            $this->comment("Grupo de {$this->chunk} finalizado");
//        });
    }


    private function getCep($entity)
    {
        $endPoint = 'https://viacep.com.br/ws/';
        $client = new \GuzzleHttp\Client();

        $url = $endPoint . $entity->place_uf . '/' . $entity->place_city_name . '/' . $entity->place_address . '/json';

        var_dump($entity->place_address);


        $request = $client->request('GET', $url);
        var_dump($request);
        exit;

//        $zipcodeaddressinfo = zipcodeaddress($entity->place_uf, $entity->place_city_name, $entity->place_address);
//        var_dump($zipcodeaddressinfo);exit;
//        if ($zipcodeaddressinfo)
//            return $zipcodeaddressinfo;
//        return false;
    }


}