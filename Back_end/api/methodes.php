<?php

include '../model/db.php';


class API{
    public function get($para,$get_Db){
        $url = parse_url($_SERVER['REQUEST_URI']);
        if(isset($url['query'])){
            $params =  explode("=",$url['query']);
            $condition =[$params[0] =>  $params[1]];
            $resultat = $get_Db->select("" ,$condition);
        }
        elseif(isset($para['ID'])){
            $condition=['ID' => $para['ID']];
            $resultat = $get_Db->select("" ,$condition);
        }
        else{
            $resultat = $get_Db->select();
        }
            return $resultat;
    } 
    public function post($para,$get_Db){

        $get_Db->insert($para);
    }
    public function delete($para,$get_Db){
        reset($para);
        $first_key = key($para); 
        $where_id =$first_key;
        $condition = $para[$first_key];
        $get_Db->delete($where_id , $condition);
    }
    public function put($para,$get_Db ,$condiiton){
        reset($condiiton);
        $first_key = key($condiiton);
        $get_Db-> update($para,$first_key,$condiiton[$first_key]);
    }
}