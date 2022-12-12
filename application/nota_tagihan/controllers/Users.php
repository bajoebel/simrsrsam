<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller{
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

            $y['contentTitle'] = "Ubah Password";
            $x['content'] = $this->load->view('users/table',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'administrator.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }
    function ubahPass(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['oldPass']) && isset($_POST['newPass'])){
                    $oldPass = MD5($this->input->post('oldPass',TRUE));
                    $newPass = MD5($this->input->post('newPass',TRUE));

                    $this->db->where('NRP',  $this->session->userdata('get_uid'));
                    $this->db->where('userPasw',  $oldPass);
                    $cekAvailable = $this->db->get('tbl01_pegawai'); 
                    if($cekAvailable->num_rows() > 0){
                        $params = array(
                            'userPasw' => $newPass,
                        );
                        $this->db->where('NRP',  $this->session->userdata('get_uid'));
                        $cekCommand = $this->db->update('tbl01_pegawai',$params); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Update data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }else{
                        $response['code'] = 501;
                        $response['message'] = "Ops. Users tidak ditemukan! Silahkan coba kembali atau hubungi administrator.";
                    }
                }else{
                    $response['code'] = 401;
                    $response['message'] = "Ops. Request empty. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 402;
                $response['message'] = "Ops. Request not found. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
}
