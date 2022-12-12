<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Dashboard extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('users_model');
        }
        function index(){
            $ses_state = $this->users_model->cek_session_id();
            //echo $ses_state; exit;
            if($ses_state){
                $this->load->model('Smart_model');
                $token=$this->session->userdata('token');
                if(empty($token)){
                    $param=array(
                        'client'=>SMART_ID,
                        'key'=> SMART_KEY
                    );
                    $response = $this->Smart_model->http_request($param,SMART_CALL_BACK ."sim/auth/gettoken");
                    $t=json_decode($response);
                    $token = $t->response->token;
                    $this->session->set_userdata(array('token'=>$token));
                }
                $x['header'] = $this->load->view('template/header','',true);
                $z = setNav("nav_1");
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
                $y['contentTitle'] = "Dashboard";
                $x['content'] = $this->load->view('dashboard/main',$y,true);
                $this->load->view('template/theme',$x);
            }else{
                $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
                echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
                window.location.href = '$url_login';</script>";
            }
        }
        function lokasi(){
            $UID = $this->session->userdata('get_uid');
            
            $lokasi = $this->session->userdata('kdlokasi');
            //echo $lokasi; exit;
            $lokasi = $this->session->userdata('kdlokasi');
            $this->db->where('KDLOKASI', $lokasi);
            $lokasi_aktif = $this->db->get('tbl04_lokasi')->row();
            
            $this->db->where("KDLOKASI IN (SELECT ruang_akses 
            FROM tbl01_users_farmasi WHERE NRP = '$UID')");
            $this->db->where("KDLOKASI NOT IN ('$lokasi')");
            $ruang = $this->db->get('tbl04_lokasi');

            $res = array('lokasi' => $ruang->result(), 'lokasi_aktif' => $lokasi_aktif);
            header('Content-Type: application/json');
            echo json_encode($res);
        }
        function pilih_lokasi($kdlokasi){
            $this->db->where('KDLOKASI',$kdlokasi);
            $row=$this->db->get('tbl04_lokasi')->row();
            if(!empty($row)){
                $this->session->set_userdata('kdlokasi',$row->KDLOKASI);
            }
            echo json_encode(array('status'=>true));
        }
    }
?>