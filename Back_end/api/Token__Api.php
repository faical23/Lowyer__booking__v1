<?php


require "../../vendor/autoload.php";

use Firebase\JWT\JWT;


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

include 'methodes.php';
include '../controlles/regix.php';


function Data($res){
    $arr_post['users'] = array();
    foreach($res  as $value){
    $article = array("FirstName" => $value['Fname'],
                "LastName" => $value['Lname'],
                "Email" => $value['Email'],
                "PhoneNumber" => $value['PhoneNumber'],
                "Token" => $value['Token']);
                array_push($arr_post['users'],$article);
    }
     return $arr_post['users'];
}
function Use__Api($contentType,$method,$params){
    $get_Db = new CRUD("user");
    $check_regix = new REGIX($params);
    $get_Api = new API();
    $response = [
        'value' => 0,
        'error' => 'All good',
        'JWT' => "",
        'data' => null,
    ];
    if($contentType ==='application/json'){
            if($method === "get"){
                $data = $get_Api->$method($params,$get_Db);
                $url = parse_url($_SERVER['REQUEST_URI']);
                if(isset($url['query'])){
                    $params =  explode("=",$url['query']);
                    if($params[0] == "Email"){
                        count($data) > 0 ? $response['data'] = "exist email" : $response['data'] = "email valide";
                    }
                    elseif($params[0] == "Token"){
                        if(count($data) === 1){
                            $secretKey  = 'bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew='; // dont try to copy this cuz i will change this jwt secretkey
                            $issuedAt   = new DateTimeImmutable();
                            $expire     = $issuedAt->modify('+60 minutes')->getTimestamp();      // Add 60 seconds
                            $serverName = "Fical.com";
                            $ID  = $data[0]["ID"]; 
                            $data_jwt = [
                                'iat'  => $issuedAt->getTimestamp(),         // Issued at: time when the token was generated
                                'iss'  => $serverName,                       // Issuer
                                'nbf'  => $issuedAt->getTimestamp(),         // Not before
                                'exp'  => $expire,                           // Expire
                                'ID' => $ID,      
                                'Status' => "user__is__login"               //ID
                            ];
                            $jwt = JWT::encode($data_jwt, $secretKey , "HS256");     /// if u want to decode this token dont forgot to add this the some this parametrs 
                            $response['JWT'] = $jwt;
                            $response['data'] = "valide token";
                        }
                        else{
                            $response['data'] = "invalide token";
                        }
                    }
                    else{
                        $response['data'] = $data;
                    }
                }
                else{
                    $response['data'] = $data;
                }
            }
            elseif($method === "post"){
                if(isset($params['jwt'])){
                    //// if we get jwt we need to decode this jwt and fetch data agai, with DI and return this data to profile page;
                    $secretKey  = 'bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew='; 
                    try { 
                        $usertoken_to_verify = $params['jwt']; 
                        $decodejwt = JWT::decode($usertoken_to_verify, $secretKey, array('HS256'));
                       $user_ID = $decodejwt->ID;

                        $data = $get_Api->get(['ID' => $user_ID],$get_Db);
                        $response['data'] = $data; 
                      } catch (UnexpectedValueException $e) {
                        echo $e->getMessage(); 
                      }
                }
                else{
                    $RG__valide = $check_regix->check($params);
                    if($RG__valide){
                        $token_user =  uniqid() . "";
                        $params['Token'] = $token_user . $params['Lname'];
                        $response['Token'] = $token_user. $params['Lname'];
                        $response['value'] = 1;
                        $condition = ['Token' ,$params['Token']];
                        $data = $get_Api->$method($params,$get_Db,$condition);
                    }
                    else{
                        $response['error'] = "Invalide Regix";
                    }
                }
            }
            else{
                $data = $get_Api->$method($params,$get_Db);

            }
    }
    else{
        $response['error'] = "Content is not Json Data";
    }
    
    echo json_encode($response);
}
$method = strtolower($_SERVER["REQUEST_METHOD"]);
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
$params = json_decode(file_get_contents('php://input'),true);
Use__Api($contentType,$method,$params);

