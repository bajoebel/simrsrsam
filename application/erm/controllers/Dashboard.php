<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('nota_model');
    }
    function index()
    {
        // var_dump($this->session->userdata());
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->load->model('Smart_model');
            if(SMART_STATUS=="1"){
                $token=$this->session->userdata('token');
                if(empty($token)){
                    $param=array(
                        'client'=>SMART_ID,
                        'key'=> SMART_KEY
                    );
                    $response = $this->Smart_model->http_request($param,SMART_CALL_BACK ."sim/auth/gettoken");
                    // echo SMART_CALL_BACK; exit;
                    $t=json_decode($response);
                    $token = $t->response->token;
                    $this->session->set_userdata(array('token'=>$token));
                }
            }
            
            
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_1");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['contentTitle'] = "Home";
            $x['content'] = $this->load->view('dashboard/main', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'mr_registrasi.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
                window.location.href = '$url_login'
                </script>";
        }
    }

    function lokasi()
    {
        $UID = $this->session->userdata('get_uid');

        $lokasi = $this->session->userdata('kdlokasi');
        $this->db->select("*,idx as KDLOKASI,ruang AS NMLOKASI");
        $this->db->where('idx', $lokasi);
        $lokasi_aktif = $this->db->get('tbl01_ruang')->row();

        $this->db->select("*,idx as KDLOKASI,ruang AS NMLOKASI");
        $this->db->where("idx IN (SELECT ruang_akses 
            FROM tbl01_users_nota_tagihan WHERE NRP = '$UID')");
        $this->db->where("idx NOT IN ('$lokasi')");
        $this->db->order_by('grid,idx');
        $ruang = $this->db->get('tbl01_ruang');
        $res = array('lokasi' => $ruang->result(), 'lokasi_aktif' => $lokasi_aktif);
        header('Content-Type: application/json');
        echo json_encode($res);
    }
    function pilih_lokasi($kdlokasi)
    {
        $this->db->select("*,idx as KDLOKASI,ruang AS NMLOKASI");
        $this->db->where('idx', $kdlokasi);
        $row = $this->db->get('tbl01_ruang')->row();
        if (!empty($row)) {
            $this->session->set_userdata('kdlokasi', $row->idx);
            $this->session->set_userdata('grlokasi', $row->grid);
            $this->session->set_userdata('grRuang', $row->koderuanglama);
        }
        echo json_encode(array('status' => true));
    }
}
