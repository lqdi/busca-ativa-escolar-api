<?php

namespace BuscaAtivaEscolar\Http\Controllers\Auth;

use BuscaAtivaEscolar\Http\Controllers\BaseController;
use GuzzleHttp\Exception\RequestException;

class AADController extends BaseController
{
    //
    public function getCredentials($username, $password)
    {
        $guzzle = new \GuzzleHttp\Client();
        $url_l = config('aad_login_setup');
        try {
            $guzzle->post("https://" .
                $url_l['tenant_name'] . "." .
                $url_l['login_prefix']  . ".com/" .
                $url_l['tenant_name'] . "." .
                $url_l['login_sufix'] . ".com/" .
                $url_l['method'] . "/" .
                $url_l['version'] . "/" .
                $url_l['call'] . "?p=" .
                $url_l['signup'] . "&" .
                $url_l['user'] . "=" . $username . "&" .
                $url_l['pass'] . "=" . $password . "&" .
                $url_l['type']  . "=" .
                $url_l['pass'] . "&" .
                $url_l['scope'] . "=" .
                $url_l['prefix'] . " " .
                $url_l['id'] . " " .
                $url_l['sufix'] . "&" .
                $url_l['client_name'] . "=" .
                $url_l['id'] . "&" .
                $url_l['response'] . "=" .
                $url_l['call'] . " " .
                $url_l['response_sufix'] . "");
            return true;
        } catch (RequestException $e) {
        }
    }
}