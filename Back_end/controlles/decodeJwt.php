<?php

require "../../vendor/autoload.php";
use Firebase\JWT\JWT;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

$params = json_decode(file_get_contents('php://input'),true);

$jwt = $params['jwt'];
$secretKey  = 'bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew='; 

$response = [
    'status' => '',
    'value' => 0,
    'error' => 'All good',
];
try{
    $decodejwt = JWT::decode($jwt, $secretKey, array('HS256'));
    $status= $decodejwt->Status;
    $status === "user__is__login" ? $response['token'] ="valide" : $response['token'] ="not valide" ;
}
catch (Exception $e) {
    $response['token'] ="not valide" ;
}

echo json_encode($response);


