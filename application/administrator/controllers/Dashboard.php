<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{
    function __construct(){
    parent::__construct();
        $this->load->model('users_model');
    }
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $y['contentTitle'] = "Dashboard";        
            $y['breadcrumbTitle'] = "Home";   
            $x['content'] = $this->load->view('dashboard/main',$y,true);
            $x['header'] = $this->load->view('template/header','',true);

            $z = setNav("nav_1");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'administrator.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah!\\nSilahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
}
?>