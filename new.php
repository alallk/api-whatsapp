<?php
require __DIR__ . '/vendor/autoload.php';

$privateKey = <<<EOD
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

$publicKey = <<<EOD
-----BEGIN PUBLIC KEY-----
MFswDQYJKoZIhvcNAQEBBQADSgAwRwJARYIi9DOKhYJBCqqwd4CSQ70RJrcVFRyJ
XtqziOMBoCjarvdNp3rW7H2zdj5VSgYzuKoHEm7YoHCT4ElJdMrdGwIDAQAB
-----END PUBLIC KEY-----
EOD;

$token = array(
    "iss" => "example.org",
    "aud" => "example.com",
    "iat" => 1356999524,
    "nbf" => 1357000000,
    "nbf2" => 1357000000,
    "nbf3" => 1357000000,
    "nbf4" => 1357000000,
    "nbf5" => 1357000000,
    "nbf6" => 1357000000,
    "nbf7" => 1357000000,
    "teste" => 'vazio'
);



$jwt = Firebase\JWT\JWT::encode($token, $privateKey, 'RS256');
echo "Encode:\n" . print_r($jwt, true) . "\n";

$decoded = Firebase\JWT\JWT::decode($jwt, $publicKey, array('RS256'));

/*
 NOTE: This will now be an object instead of an associative array. To get
 an associative array, you will need to cast it as such:
*/

$decoded_array = (array) $decoded;
echo "Decode:\n" . print_r($decoded_array, true) . "\n";
