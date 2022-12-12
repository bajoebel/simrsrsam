<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
    public function __construct(){
        parent ::__construct(); 
        $this->load->model('users_model');
    }
    public function index(){        
        // echo base_url(); exit;
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            redirect(base_url().'mr_registrasi.php/dashboard');
        }else{
            $this->load->view('login');
        }
    }
    public function cek(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $sid = session_id();
            $last_login = date('Y-m-d H:i:s');
            $get_res = $this->users_model->cek_user($_POST['userID'],$_POST['password']);
            if($get_res['error']){
                $uid = $get_res['message'];
                $level = $get_res['level'];
                $get_res = $this->users_model->update_login_info($uid,$sid,$last_login);
                if($get_res){
                    $params = array('get_uid' => $uid,'level'=>$level);
                    $this->session->set_userdata($params);
                    
                    $response['error'] = true;
                    $response['message'] = base_url().'mr_registrasi.php/dashboard';
                }else{
                    $response['error'] = false;
                    $response['message'] = "Ops. Query Error! Silahkan hubungi administrator.";
                }
            }else{
                $response = $get_res;
            }
        }else{
            $response['error'] = false;
            $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
        }
        echo json_encode($response);
    }

    public function logout(){
        $this->session->sess_destroy();
        $this->session->unset_userdata('get_uid');
        redirect(base_url().'mr_registrasi.php/login');
    }

    function getsid(){
        echo session_id();
    }
}
