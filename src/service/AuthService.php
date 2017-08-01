<?php

namespace APIWhatsapp\Service;
use Firebase\JWT\JWT;
require __DIR__ . '/../../vendor/autoload.php';

class AuthService
{
    private $algorithm = 'RS256';
    private $domain = 'apiwhatsapp.fafy.com.br';
    private $token_life_time = 3600;
    private $privateKey = <<<EOD
-----BEGIN RSA PRIVATE KEY-----
MIIBOAIBAAJARYIi9DOKhYJBCqqwd4CSQ70RJrcVFRyJXtqziOMBoCjarvdNp3rW
7H2zdj5VSgYzuKoHEm7YoHCT4ElJdMrdGwIDAQABAkAJ+ZQEkYT2hevJmRc7/xJ+
cBqPAMUgw3ifSSlsoo8wKaZ1ZBCSM4YGqETDZvB/yLFgbJNsjg30yGB7kLI+3U0Z
AiEAh9nqzBYsjfX1mhvOyxV7V38bKx9ZgFkY54c7PgQhDd8CIQCC+4XoCsHFfNMv
taEcADGoSWav7pRBeR40nE89niHgRQIgGZ73sVXdQUjJ8S6daZ+7i1zletSGxLYJ
BGF0wtV0hnECIH+kkXfxk6fa3wstWxWocrvm2/Uy8LNlTrRCZ05K3gRpAiAyTEf/
Gpk0unnyoLTGZz7NxBHczioRtrI5i+JqJYqEkA==
-----END RSA PRIVATE KEY-----
EOD;
    private $publicKey = <<<EOD
-----BEGIN PUBLIC KEY-----
MFswDQYJKoZIhvcNAQEBBQADSgAwRwJARYIi9DOKhYJBCqqwd4CSQ70RJrcVFRyJ
XtqziOMBoCjarvdNp3rW7H2zdj5VSgYzuKoHEm7YoHCT4ElJdMrdGwIDAQAB
-----END PUBLIC KEY-----
EOD;

    /**
     * AuthService constructor.
     */
    public function __construct()
    {}


    public function getToken($user){
        $now = time();
        $data = array(
            'iat'  => $now,                                          // Issued at: time when the token was generated
            'jti'  => base64_encode(mcrypt_create_iv(32)),          // Json Token Id: an unique identifier for the token
            'iss'  => $this->domain,       // Issuer
            'nbf'  => $now,        // Not before
            'exp'  => $now + $this->token_life_time,           // Expire
//            'data' => [                  // Data related to the signer user
//                'user'=>[
//                    'id'=> $user->getId(),
//                    'login' => $user->getLogin()
//                ]
//            ]
        );
        return JWT::encode($data, $this->privateKey, $this->algorithm);
    }

    public function decodeToken($jwt){
        return JWT::decode($jwt, $this->publicKey, array($this->algorithm));
    }

}