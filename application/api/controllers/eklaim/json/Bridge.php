<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bridge extends CI_Controller {
    function __construct(){
        parent ::__construct();
        $this->load->helper('Eklaim');
    }

    function index(){      
        echo "Service Actived";       
    }
    function isJSON($string){
       return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
    }
    function new_claim(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $json = file_get_contents('php://input');
            if ($this->isJSON($json)) {
                $data = json_decode($json);
                $response = initJSON(json_encode($data));
            }else{
                $x['metaData']['code'] = 401;
                $x['metaData']['message'] = "Error reading JObject from JsonReader.";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 402;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response; 
    }
    function delete_patient(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $json = file_get_contents('php://input');
            if ($this->isJSON($json)) {
                $data = json_decode($json);
                $response = initJSON(json_encode($data));
            }else{
                $x['metaData']['code'] = 401;
                $x['metaData']['message'] = "Error reading JObject from JsonReader.";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 402;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response; 
    }
    function update_patient(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $json = file_get_contents('php://input');
            if ($this->isJSON($json)) {
                $data = json_decode($json);
                $response = initJSON(json_encode($data));
            }else{
                $x['metaData']['code'] = 401;
                $x['metaData']['message'] = "Error reading JObject from JsonReader.";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 402;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response; 
    }
}

