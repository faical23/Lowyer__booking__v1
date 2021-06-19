<?php


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");


include 'methodes.php';
// include '../model/db.php';
include '../controlles/regix.php';


function Data($res){
    $arr_post['historique'] = array();
    foreach($res  as $value){
    $article = array("Topic" => $value['Topic'],
                "Day" => $value['Day'],
                "time_start" => $value['time_start'],
                "time_end" => $value['time_end'],
                "status" => $value['status']);
                array_push($arr_post['users'],$article);
    }
     return $arr_post['users'];
}

function historique__Api($contentType,$method,$params){
    $get_Db = new CRUD("booking");
    $check_regix = new REGIX($params);
    $get_Api = new API();

    if($contentType ==='application/json'){
        if($method === "get"){
            $data = $get_Api->$method($params,$get_Db);
            

            //// coparaisone between the today date and book date
            //// if he is expired we make a requet to change status from avaible to expired
            foreach($data as $user){
                $date = $user['day'];
                $date_book = $date;//string variable
                $date_today = date('Y/m/d');//date variable
                $time1 = strtotime($date_book);
                $time2 = strtotime($date_today);
                if($time1 < $time2){
                    $params=["status" => "Expired"];
                    $condition = ['ID' => $user['ID']];
                    $get_Api->put($params,$get_Db,$condition);
                }
            }
            $response['data'] = $data;
        }
        else{
            $response['data'] = "null";
        }
        echo json_encode($response);

    }
}


$method = strtolower($_SERVER["REQUEST_METHOD"]);
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
$params = json_decode(file_get_contents('php://input'),true);
historique__Api($contentType,$method,$params);