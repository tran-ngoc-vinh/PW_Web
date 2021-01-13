<?php
require __DIR__ . '/../vendor/autoload.php';
  use \Firebase\JWT\JWT;
  use GuzzleHttp\Client;

   class Sample{
     public function boxapi(){
       
      $json = file_get_contents('config.json');
      $config = json_decode($json);
      
      $private_key = $config->boxAppSettings->appAuth->privateKey;
      $passphrase = $config->boxAppSettings->appAuth->passphrase;
      $key = openssl_pkey_get_private($private_key, $passphrase);
      
      // We will need the authenticationUrl  again later,
      // so it is handy to define here
      $authenticationUrl = 'https://api.box.com/oauth2/token';
      
      $claims = [
        'iss' => $config->boxAppSettings->clientID,
        'sub' => $config->enterpriseID,
        'box_sub_type' => 'enterprise',
        'aud' => $authenticationUrl,
        // This is an identifier that helps protect against
        // replay attacks
        'jti' => base64_encode(random_bytes(64)),
        // We give the assertion a lifetime of 45 seconds 
        // before it expires
        'exp' => time() + 81,
        'kid' => $config->boxAppSettings->appAuth->publicKeyID
      ];
      $assertion = JWT::encode($claims, $key, 'RS512');
      
      // We are using the excellent guzzlehttp/guzzle package 
      // to simplify the API call
      
      
      $params = [
        'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
        'assertion' => $assertion,
        'client_id' => $config->boxAppSettings->clientID,
        'client_secret' => $config->boxAppSettings->clientSecret
      ];
      
      // Make the request
      $client = new Client();
      $response = $client->request('POST', $authenticationUrl, [
        'form_params' => $params
      ]);
      
      // Parse the JSON and extract the access token
      $data = $response->getBody()->getContents();
      $access_token = json_decode($data)->access_token;
    //   print_r($access_token);

            return $access_token;

     }
    
    }  
    
?>

