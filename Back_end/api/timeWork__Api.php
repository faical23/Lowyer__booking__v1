<?php 


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");


include 'methodes.php';
// include '../model/db.php';
include '../controlles/regix.php';


function Data($res){

    $arr_post['timeWork'] = array();
    foreach($res  as $value){
    $article = array(
                "ID" => $value['ID'],
                "start_time" => $value['start_time'],
                "end_time" => $value['end_time']);
                array_push($arr_post['timeWork'],$article);
    }
     return $arr_post['timeWork'];
}

function timeWork_Api($contentType,$method,$params){
    $response = [
        'value' => 0,
        'error' => 'All good',
        'data' => null,
    ];
    $get_Db = new CRUD("time_work");
    $get_Api = new API();
    if($contentType ==='application/json'){
        $data = $get_Api->get($params,$get_Db);
        $response['data'] = $data;
    }
    echo json_encode($response);

}

$method = strtolower($_SERVER["REQUEST_METHOD"]);
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
$params = json_decode(file_get_contents('php://input'),true);
timeWork_Api($contentType,$method,$params);