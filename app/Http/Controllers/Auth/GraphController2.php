<?php

namespace BuscaAtivaEscolar\Http\Controllers\Auth;

use BuscaAtivaEscolar\Http\Controllers\BaseController;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

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
  public function createUser(/*$name, $email, $password, $job, $uf*/)
  {


    // Validate password strength
    /*$uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        } else {
            echo 'Strong password.';
        }*/
    $guzzle = new \GuzzleHttp\Client();
    $url = config('ms_graph.users');
    $headers = [
      'Authorization' => 'Bearer ' . $this->getToken(),
      'Accept'        => 'application/json',
      'Content-Type' => 'application/json'
    ];
    $body  = array(

      "displayName" => "Testinho da silva",
      "identities" => [
        [
          "signInType" => "emailAddress",
          "issuer" => config('aad_login_setup.tenant_name') . ".onmicrosoft.com",
          "issuerAssignedId" => "testinho123@gmail.com"
        ]
      ],
      "passwordProfile" => [
        "password" => "1q2w3e4r!",
        "forceChangePasswordNextSignIn" => false
      ],
      "passwordPolicies" => "DisablePasswordExpiration",
      "jobTitle" => "gestor nacional",
      "state" => "DF"

    );
    $user = json_decode($guzzle->post($url, [
      'headers' => $headers,
      'body' => json_encode($body)
    ])->getBody()->getContents());

    return "Usuário criado.";
  }
}
