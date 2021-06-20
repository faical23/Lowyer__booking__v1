<?php 


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");


include '../model/db.php';



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

function timeReserve_Api($contentType){
    $response = [
        'value' => 0,
        'error' => 'All good',
        'data' => null,
    ];
    $get_Api= new CRUD("booking");
    if($contentType ==='application/json'){
        $url = parse_url($_SERVER['REQUEST_URI']);
        if(isset($url['query'])){
            $params =  explode("=",$url['query']);
            $condition = ['Token' => $url['query']];
            // var_dump($condition);
            // exit;
            // $condition = [ $params]
            $data = $get_Api->select("",$condition);
        }
        else{
            $data = $get_Api->select();
        }
        $response['data'] = $data;

    }
    echo json_encode($response);

}

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
timeReserve_Api($contentType);