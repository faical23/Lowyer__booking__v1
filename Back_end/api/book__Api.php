<?php


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");


include 'methodes.php';
include '../controlles/regix.php';





function reserve__Api($contentType,$params){
    $response = [
        'value' => 0,
        'error' => 'All good'
    ];
    $get_Db = new CRUD("booking");
    $check_regix = new REGIX($params);
    $get_Api = new API();
    if($contentType ==='application/json'){

        $RG__valide = $check_regix->check($params);
        if($RG__valide){
            $get_Api->post($params,$get_Db);
            $response['error'] = "valide";
        }
        else{
            $response['error'] = "Invalide regix";
        }
    }
    echo json_encode($response);
}




$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
$params = json_decode(file_get_contents('php://input'),true);
reserve__Api($contentType,$params);