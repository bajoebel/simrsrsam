<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        $ses_state = $this->session->userdata('isLogin');
        if($ses_state){
            $y['contentTitle'] = "Dashboard";        
            $y['breadcrumbTitle'] = "Home";   

            $z = setNav("nav_1");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $this->load->view('template/template_header',$x);
            $this->load->view('dashboard/main',$y);
            $this->load->view('template/template_footer');
        }else{
            $url_login = base_url().'index.php/login?sid='.session_id();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'</script>";
        }
        
    }
    
}
?>