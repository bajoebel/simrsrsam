<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Antrean extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('jkn_model');
        $this->load->helper('lz');
        $this->load->helper('http');
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
    function tanggal($tgl=""){
        if($tgl=="") $tgl = date('Y-m-d');
        $res=jknrequest('antrean/pendaftaran/tanggal/'.$tgl,"GET");
        header('Content-Type: application/json');
        echo $res;
    }
    function kodebooking($kode=""){
        $res=jknrequest('antrean/pendaftaran/kodebooking/'.$kode,"GET");
        header('Content-Type: application/json');
        echo $res;
    }
    function aktif(){
        $res=jknrequest('antrean/pendaftaran/aktif',"GET");
        header('Content-Type: application/json');
        echo $res;
    }
    function detail($poli,$dokter,$hari){
        // $url= "antrean/pendaftaran/kodepoli/".$poli."/kodedokter/".$dokter."/hari/";exit;
        $res=jknrequest("antrean/pendaftaran/kodepoli/".$poli."/kodedokter/".$dokter."/hari/".$hari,"GET");
        // header('Content-Type: application/json');
        echo $res;
    }
}