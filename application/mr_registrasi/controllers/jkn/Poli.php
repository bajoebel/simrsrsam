<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Poli extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('jkn_model');
        $this->load->model('users_model');
        $this->load->helper('lz');
        $ses_state = $this->users_model->cek_session_id();
        if(!$ses_state){  
            $metadata=array(
                'code'=>201,
                'message'=>'Anda Belum Login Atau Session Expired'
            );
            $response=array(
                'metadata'=>$metadata
            );
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }
    function index(){
        
        // $y['index_menu'] = 7;
        // Get Data
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_JKN."&".$tStamp, SECREET_ID_JKN, true);
        $encodedSignature = base64_encode($signature);
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_JKN . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_JKN;

        $res = $this->jkn_model->getData("ref/poli",$header);
        // echo $res; exit;
        if(isJSON($res)){
            $arr=json_decode($res);
            // print_r($arr->metadata->Code);exit;
            if(!empty($arr->metadata->code)){
                if($arr->metadata->code==1){
                    $datax=$this->jkn_model->stringDecrypt(CONS_ID_JKN.SECREET_ID_JKN.$tStamp,$arr->response);
                    $poli=json_decode(hasil($datax));
                    // print_r($poli);exit;
                }else{
                    $poli=array();
                }
            }
            // header('Content-Type: application/json');
            // echo $res;
        }else{
            // echo $res;
            $poli=array();
        }

        $data=array(
            'contentTitle'=>'List Poliklinik',
            'poli'=>$poli
        );
        $z = setNav("nav_6");

        $view=array(
            'header'=>$this->load->view('template/header', '', true),
            'nav_sidebar'=>$this->load->view('template/nav_sidebar', $z, true),
            'content'=>$this->load->view('jkn/poli', $data, true),
            'index_menu'=>5,
            'libjs'=>array(
                'js/jkn.js'
            )
        );
        $this->load->view('template/theme', $view);
    }
    
}