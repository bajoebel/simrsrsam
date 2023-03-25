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
        

        // exit;
        // print_r($book);exit;
        // echo $response; exit;

        if($ses_state){
            redirect(base_url().'mr_registrasi.php/dashboard');
        }else{
            $this->load->view('login');
        }
    }

    function importantrian(){
        $this->load->helper('http');
        $cek=$this->db->where("tanggal",date('Y-m-d'))->where("booking",1)->get("tbl02_antrian")->row();
        if(empty($cek)){
            $keyword='';
            $tanggal=date('Y-m-d');
            $poli='';
            $request=array(
                'tanggal'=>$tanggal,
                'keyword'=>$keyword,
                'poli'=>$poli
            );
            $response=httprequest($request,ONLINE_CALL_BACK."jkn/rsud/listbooking");
            $arr=json_decode($response);
            foreach ($arr->response as $r ) {
                $book[]=array(
                    'id_daftar'=>'',
                    'kodebooking'=>$r->kodebooking,
                    'tanggal'=>date('Y-m-d'),
                    'antrianruang'=>getField('idx',array('kodejkn'=>$r->kodepoli),'tbl01_ruang'), //id ruang rs
                    'antriandokter'=>getField('jadwal_dokter_id',array('dokterjkn'=>$r->kodedokter),'tbl02_jadwal_dokter'), // dokter rs
                    'no_antrian_poly' => $r->nomorantrean,
                    'kodepolijkn' => $r->kodepoli,
                    'kodedokterjkn'=> $r->kodedokter,
                    'nokartu'=> $r->nomorkartu,
                    'labelantrean'=>'',
                    'aktiftaskid'=>3,
                    'jnsantrean'=>3,
                    'jampraktek'=>$r->jampraktek,
                    'status_panggil'=>3,
                    'booking'=>1
                );
            }
            if(!empty($book)) {
                $this->db->insert_batch("tbl02_antrian",$book);
                $response=array(
                    'status'=>true,
                    'message'=>'Berhasil Menarik Data Booking Antrian'
                );
            }else{
                $response=array(
                    'status'=>false,
                    'message'=>'Tidak ada antrian yang dibboking'
                );
            }
        }else{
            $response=array(
                'status'=>false,
                'message'=>"Booking antrian sudah di tarik"
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
        
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
