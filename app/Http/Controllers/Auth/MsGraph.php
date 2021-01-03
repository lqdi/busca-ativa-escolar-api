<?php

namespace BuscaAtivaEscolar\Http\Controllers\Auth;

use BuscaAtivaEscolar\Http\Controllers\BaseController;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use Microsoft\Graph\Model\User;
use Microsoft\Graph\Model\PasswordProfile;
use Microsoft\Graph\Model\ObjectIdentity;

class MsGraph extends BaseController
{
    protected function getToken()
    {
        $guzzle = new \GuzzleHttp\Client();
        $config = config('ms_graph');
        $url = $config['ms_endpoint_prefix'] . '/' . $config['ms_id_gs'] . '/' . $config['ms_method'] . '/' . $config['ms_version'] . '/' . $config['ms_call'];
        $token = json_decode($guzzle->post($url, [
            'form_params' => [
                'client_id' => $config['ms_id'],
                'client_secret' => $config['ms_secret'],
                'scope' => $config['ms_graph_scope'],
                'grant_type' => $config['ms_type_client'],
            ]
        ])->getBody()->getContents());
        $accessToken = $token->access_token;
        return $accessToken;
    }
    public function createUser($id, $name, $job, $mail)
    {
        $length = 10;
        $pass = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$&', ceil($length / strlen($x)))), 1, $length);
        $accessToken = $this->getToken();
        $config = config('ms_graph');
        $graph = new Graph();
        $graph->setAccessToken($accessToken);
        $newUser = new User();
        $newUser->setDisplayName($name);
        $newUser->setJobTitle($job);
        $newUser->setMail($mail);
        $newUser->setSurname($id);
        $newUser->setPasswordPolicies($config['ms_graphp']);
        $password = new PasswordProfile();
        $password->setPassword($pass);
        $password->setForceChangePasswordNextSignIn(false);
        $identity = new ObjectIdentity();
        $identity->setSignInType($config['ms_graphs']);
        $identity->setIssuer($config['ms_name'] . '.' . $config['ms_sufix'] . '.com');
        $identity->setIssuerAssignedId($mail);
        $newUser->setIdentities([$identity]);
        $newUser->setPasswordProfile($password);
        $graph->createRequest("post", "/users")
            ->attachBody($newUser)
            ->execute();
    }

    public function getCredentials($id)
    {
        $accessToken = $this->getToken();
        $graph = new Graph();
        $graph->setAccessToken($accessToken);
        $users = $graph->createRequest("GET", "/users")
            ->setReturnType(Model\User::class)
            ->execute();
        $result = 0;
        for ($i = 0; $i < count($users); $i++) {
            if ($users[$i]->getSurname() == $id) {
                $result = 1;
            }
        }
        return  $result == 1 ? 'true' :  'false';
    }
}
