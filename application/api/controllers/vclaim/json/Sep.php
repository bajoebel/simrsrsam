<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sep extends CI_Controller {
    function __construct(){
        parent ::__construct();
        $this->load->helper('Vclaim');
    }

    function index(){      
        echo "Service Actived";       
    }
    function isJSON($string){
       return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
    }
    function insertSEP(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $json = file_get_contents('php://input');
            if ($this->isJSON($json)) {
                $data = json_decode($json);
                $response = insertSEP(json_encode($data));
            }else{
                $x['metaData']['code'] = 201;
                $x['metaData']['message'] = "Error reading JObject from JsonReader.";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response; 
    }
    function updateSEP(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $json = file_get_contents('php://input');
            if ($this->isJSON($json)) {
                $data = json_decode($json);
                $response = updateSEP(json_encode($data));
            }else{
                $x['metaData']['code'] = 201;
                $x['metaData']['message'] = "Error reading JObject from JsonReader.";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;   
    }
    function cariSEP(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1'])){
                $param1 = $this->input->post('param1',true); // Nomor SEP
                if($param1 !== ""){
                    $response = cariSEP($param1); 
                }else{
                    $x['metaData']['code'] = 201;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            }else{
                $x['metaData']['code'] = 201;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }

    function hapusSEP(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1']) && isset($_POST['param2'])){
                $nosep = $this->input->post('param1',true); // Nomor SEP
                $user = $this->input->post('param2',true); // user pembuat SEP
                
                if($param1 !== ""){
                    $x['request']['t_sep']['noKartu'] = $nosep;
                    $x['request']['t_sep']['user'] = $user;
                    $response = hapusSEP(json_encode($x)); 
                }else{
                    $x['metaData']['code'] = 201;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            }else{
                $x['metaData']['code'] = 201;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }

    function updateTanggalPulang(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $json = file_get_contents('php://input');
            if ($this->isJSON($json)) {
                $data = json_decode($json);
                $response = updateTanggalPulang(json_encode($data));
            }else{
                $x['metaData']['code'] = 202;
                $x['metaData']['message'] = "Error reading JObject from JsonReader.";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 401;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response; 
    }
}

