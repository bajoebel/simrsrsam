<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    public function __construct(){
        parent ::__construct();
        $this->load->model('users_model');
    }
    public function index(){        
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            redirect(base_url().'farmasi.php/dashboard');
        }else{
            $this->load->view('login');
        }
    }
    public function cek(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $sid = session_id();
            //echo $sid;
            $last_login = date('Y-m-d H:i:s');
            $get_res = $this->users_model->cek_user($_POST['userID'],$_POST['password']);
            if($get_res['error']){
                $uid = $get_res['message']; 
                $level = $get_res['level'];
                $ruang = explode(',',$get_res['ruang_akses']);
                $get_res = $this->users_model->update_login_info($uid,$sid,$last_login);
                if($get_res){
                    if(count($ruang)==1) $lokasi=$ruang[0]; else $lokasi="";
                    $params = array('get_uid' => $uid,'level'=>$level, 'kdlokasi'=>$lokasi);
                    $this->session->set_userdata($params);
                    $response['error'] = true;
                    $response['message'] = base_url().'farmasi.php/dashboard';
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
        redirect(base_url().'farmasi.php/login');
    }

    function getsid(){
        echo session_id();
    }
}
