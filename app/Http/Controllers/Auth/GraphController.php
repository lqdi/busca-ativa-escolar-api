<?php

namespace BuscaAtivaEscolar\Http\Controllers\Auth;

use BuscaAtivaEscolar\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use Microsoft\Graph\Model\User;
use Microsoft\Graph\Model\PasswordProfile;
use Microsoft\Graph\Model\ObjectIdentity;

class GraphController extends BaseController
{
    //

    protected function getToken()
    {
        $guzzle = new \GuzzleHttp\Client();
        $config = config('ms_graph');
        $url = $config['prefix'] . '/' . $config['tenant'] . '/' . $config['method'] . '/' . $config['version'] . '/' . $config['call'];
        $token = json_decode($guzzle->post($url, [
            'form_params' => [
                'client_id' => $config['id'],
                'client_secret' => $config['secret'],
                'scope' => $config['scope'],
                'grant_type' => $config['credentials'],
            ]
        ])->getBody()->getContents());
        $accessToken = $token->access_token;
        return $accessToken;
    }
    public function getUsers()
    {
        $accessToken = $this->getToken();
        $graph = new Graph();
        $graph->setAccessToken($accessToken);
        $user = $graph->createRequest("GET", "/users")
            ->setReturnType(Model\User::class)
            ->execute();
        print_r($user);
        //echo "Hello, I am $user->getGivenName() ";
    }
    public function createUser($name, $job, $pass, $mail)
    {
        $accessToken = $this->getToken();
        $config = config('ms_graph');
        $graph = new Graph();
        $graph->setAccessToken($accessToken);
        $newUser = new User();
        $newUser->setDisplayName($name);
        $newUser->setJobTitle($job);
        $newUser->setPasswordPolicies($config['policy']);
        $password = new PasswordProfile();
        $password->setPassword($pass);
        $password->setForceChangePasswordNextSignIn(false);
        $identity = new ObjectIdentity();
        $identity->setSignInType($config['sign']);
        $identity->setIssuer($config['tenant_name'] . '.' . $config['login'] . '.com');
        $identity->setIssuerAssignedId($mail);
        $newUser->setIdentities([$identity]);
        $newUser->setPasswordProfile($password);
        $user = $graph->createRequest("post", "/users")
            ->attachBody($newUser)
            ->execute();
        //print_r($user);
        return "Usuário adicionado";
    }

    public function updateUser()
    {
        $accessToken = $this->getToken();
        $graph = new Graph();
        $graph->setAccessToken($accessToken);
        $user = $graph->createRequest("GET", "/users")
            ->setReturnType(Model\User::class)
            ->execute();
        for ($i = 0; $i < count($user); $i++) {
            if ($user[0]->getGivenName()) {
            }
        }
        var_dump($user[0]->getGivenName());
    }
}
