<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Page_response extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('users_model');
            $this->load->model('nota_model');
        }
        function index(){
            $ses_state = $this->users_model->cek_session_id();
            if($ses_state){
                $y['contentTitle'] = "";        
                $y['breadcrumbTitle'] = "404";   
                $x['content'] = $this->load->view('errors/template/main',$y,true);
                $x['header'] = $this->load->view('template/header','',true);
                $z = setNav("");
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
                $this->load->view('dashboard/template_form',$x);
            }else{
                $url_login = base_url().'erm.php/login?sid='.session_id();
                echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
                window.location.href = '$url_login'
                </script>";
            }
        }

        function error_404(){
            $ses_state = $this->users_model->cek_session_id();
            if($ses_state){
                $y['contentTitle'] = "";        
                $y['breadcrumbTitle'] = "404";   
                $x['content'] = $this->load->view('errors/template/main',$y,true);
                $x['header'] = $this->load->view('template/header','',true);

                $z = setNav("");
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
                $this->load->view('dashboard/template_form',$x);
            }else{
                $url_login = base_url().'erm.php/login?sid='.session_id();
                echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
                window.location.href = '$url_login'
                </script>";
            }        	
        }
    }
?>