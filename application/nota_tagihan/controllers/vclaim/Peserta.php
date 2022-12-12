<?php 
class Peserta extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('vclaim_model');
        $this->load->model('users_model');
        $this->load->helper('lz');
        // $ses_state = $this->users_model->cek_session_id();
        // if(!$ses_state){  
        //     $response=array('code'=>201,'message'=>'Anda Belum Login Atau Session Expired');
        //     header('Content-Type: application/json');
        //     echo json_encode($response);
        //     exit;
        // }
    }
    function nokartu($nokartu="",$tgl=""){
        // Create TimeStamps
        // $param=urlencode($this->input->get('param'));
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        // echo $header; exit;
        $res = $this->vclaim_model->getData("Peserta/nokartu/$nokartu/tglSEP/$tgl",$header);
        // $test=$this->db->query("SELECT * FROM tbl02_sep_responseok")->row();
        if(isJSON($res)){
            $arr=json_decode($res);
            if($arr->metaData->code==200){
                $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
                $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
            }
            header('Content-Type: application/json');
            echo $res;
        }else{
            echo $res;
        }
        // echo "Error Bro..";
    }
    function nik($nik="",$tgl=""){
        // Create TimeStamps
        // $param=urlencode($this->input->get('param'));
        // echo $nik;exit;
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;

        $res = $this->vclaim_model->getData("Peserta/nik/$nik/tglSEP/$tgl",$header);
        // echo "Peserta/nik/$nik/tglSEP/$tgl"; exit;
        if(isJSON($res)){
            $arr=json_decode($res);
            if($arr->metaData->code==200){
                $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
                $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
            }
            header('Content-Type: application/json');
            echo $res;
        }else{
            echo $res;
        }
        
    }
}