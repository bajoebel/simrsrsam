<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Patch extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('patch_model');
    }
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_1");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            
            $y['contentTitle'] = "Home";
            
            $x['content'] = $this->load->view('dashboard/main',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }

    function getwilayah(){
        $prov=$this->input->get("prov");
        $kab=$this->input->get("kab");
        $kec=$this->input->get("kec");
        $kel=$this->input->get("kel");
        $start=intval($this->input->get('start'));
        $limit=10;
        $data=$this->patch_model->getWilayah($start,$limit,$prov,$kab,$kec,$kel);
        $row_count=$this->patch_model->countWilayah($prov,$kab,$kec,$kel);
        $list=array(
                'status'    => true,
                'message'   => "OK",
                'start'     => $start,
                'row_count' => $row_count,
                'limit'     => $limit,
                'data'     => $data,
        );
        header('Content-Type: application/json');
        echo json_encode($list);
    }

    function getdokter($idruang=""){
        $data=$this->patch_model->getdokter($idruang);
        $list=array(
            'status'    => true,
            'message'   => "OK",
            'data'     => $data,
        );
        header('Content-Type: application/json');
        echo json_encode($list);
    }

    function setdokter($iddokter){ 
        $data=$this->patch_model->setdokter($iddokter);
        $list=array(
            'status'    => true,
            'message'   => "OK",
            'data'     => $data,
        );
        header('Content-Type: application/json');
        echo json_encode($list);
    }
    function getpengirim($idrujuk=""){
        $data=$this->patch_model->getpengirim($idrujuk);
        $rujukan=$this->patch_model->getRujukanByid($idrujuk);
        $list=array(
            'status'    => true,
            'message'   => "OK",
            'data'     => $data,
            'rujukan'   => $rujukan,
        );
        header('Content-Type: application/json');
        echo json_encode($list);
    }
    function pilihpengirim($idpengirim){
        $data=$this->patch_model->pilihpengirim($idpengirim);
        if(!empty($data)){
            $list=array(
                'status'    => true,
                'message'   => "OK",
                'data'     => $data,
            );
        }else{
            $list=array(
                'status'    => false,
                'message'   => "Data Tidak Ada",
                'data'     => $data,
            );
        }
        
        header('Content-Type: application/json');
        echo json_encode($list);
    }
    function addtime(){
        $time = strtotime('10:00:00');
        $startTime = date("H:i:s", strtotime('-30 minutes', $time));
        $endTime = date("H:i:s", strtotime('+30 minutes', $time));
        echo "statr: 10:00:00";
        echo "<br> END TIME : ". $endTime;
    }
}
