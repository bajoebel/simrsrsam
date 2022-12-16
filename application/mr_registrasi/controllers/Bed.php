<?php 
class Bed extends CI_Controller{
    function __construct(){
       parent::__construct();
        /*
        * $this->load->model('m_daftarpasien');
        * $this->load->model('m_cetak');
        * $this->load->model('pendaftaran_model');
        */
        $this->load->model('users_model');
        $this->load->model('patch_model');
            
    }
    
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $limit = 20;
            $start = 0;
            $jmlData = $this->patch_model->jmlData();
            $z = setNav("nav_8");
            $x['index_menu'] = 7;
            $data = array(
                'jmlData'       => $jmlData,
                'limit'         => $limit,
                'contentTitle'  => "Bed Monitoring",
                'header'        => $this->load->view('template/header', '', true),
                'nav_sidebar'   => $this->load->view('template/nav_sidebar', $z, true),
                'setting'       => $this->patch_model->getSetting()
            );
            $x['content']        = $this->load->view('registrasi/view_content', $data, true);
            $this->load->view('template/theme', $x);
        }
        else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }         
        //$this->template->pendaftaran('pendaftaran/v_pendaftaranonline',$x);
        //print_r($data);
    }
    
}