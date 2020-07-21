<?php


namespace BuscaAtivaEscolar\Traits;


trait LocationHereTrait
{

    public function getLocationByRawAddress($rawAddress){

        $endPoint = env('HERE_API_ENDPOINT');
        $key = env('HERE_API_KEY');
        $client = new \GuzzleHttp\Client();
        $request = $client->request('GET', $endPoint . '?searchtext=' . $rawAddress . '&gen=9&apiKey=' . $key);
        $stream = json_decode($request->getBody()->getContents());
        $location = $stream->Response->View[0]->Result[0]->Location;
        return $location;

    }

}