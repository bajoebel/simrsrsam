<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Page_response extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('users_model');
        }
        function index(){
            $ses_state = $this->users_model->cek_session_id();
            if($ses_state){
                $x['header'] = $this->load->view('template/header','',true);
                $z = setNav("");
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
                $y['contentTitle'] = "";        
                $x['content'] = $this->load->view('errors/template/main',$y,true);
                $this->load->view('template/theme',$x);
            }else{
                $sid = getSessionID();
                $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
                echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
                window.location.href = '$url_login';</script>";
            }
        }

        function error_404(){
            $ses_state = $this->users_model->cek_session_id();
            if($ses_state){
                $z = setNav("");
                $x['header'] = $this->load->view('template/header','',true);
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                $y['contentTitle'] = "";        

                $x['content'] = $this->load->view('errors/template/main',$y,true);
                $this->load->view('template/theme',$x);
            }else{
                $sid = getSessionID();
                $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
                echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
                window.location.href = '$url_login';</script>";
            }        	
        }
    }
?>