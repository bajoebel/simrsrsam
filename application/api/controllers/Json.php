<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Json extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('json_model');
    }
    function index(){
        $res=array('status'=>true,'message'=>'OK');
        header('Content-Type: application/json');
        echo json_encode($res);
    }
    function hakakses($modul="",$level="",$select="",$ruang=""){ 

        $menu=$this->json_model->getMenu($modul,$level,$ruang);
        $res=array( 
            'menu'=>$menu,
            'select' => $select
        );
        header('Content-Type: application/json');
        echo json_encode($res); 

    }
    function bed(){
        $res=$this->json_model->getBed();
        header('Content-Type: application/json');
        echo json_encode($res);
    }
    function getaplicare(){
        $res=$this->json_model->getbedaplicare();
        header('Content-Type: application/json');
        echo json_encode($res);
    }
    function http_request($url,$jsondata=""){
        if(empty($jsondata)){
            $result = $this->getResult();
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array($result));
            $json_response = curl_exec($curl);
            if (curl_errno($curl)) {
                $error_msg = curl_error($curl);
            }
            curl_close($curl);
            if (!empty($error_msg)) {
                $error = array('metaData' => array('code' => 201, 'message' => $error_msg));
                $json_response = json_encode($error);
            }
            return $json_response;
        }else{
            
            $contentType = "application/json";
            $consID = CONS_ID_VC;
            $tStamp = $this->getTimestamp();
            $encodedSignature = $this->getSignature();

            $result = "";
            $result .= "Content-Type: " . $contentType . "\r\n";
            $result .= "X-cons-id: " . $consID . "\r\n";
            $result .= "X-timestamp: " . $tStamp . "\r\n";
            $result .= "X-signature: " . $encodedSignature;

            $curl = curl_init($url); 
            curl_setopt($curl, CURLOPT_HEADER, false); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE); 
            curl_setopt($curl, CURLOPT_HTTPHEADER,array($result));
            curl_setopt($curl, CURLOPT_POST, false); 
            curl_setopt($curl, CURLOPT_TIMEOUT, 30); 
            curl_setopt($curl, CURLOPT_POSTFIELDS, $jsondata); 
            $return = curl_exec($curl); 
            curl_close($curl);
            return $return;
            
        }
        
    }
    function datakemkes(){
        $result=$this->json_model->getMapKemkes();
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
?> 