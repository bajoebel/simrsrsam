<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class online extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
        
    }
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        $this->session->unset_userdata('sIdRuang');
        $this->session->unset_userdata('sTglLayanan');
        $this->session->unset_userdata('sTrace');
        
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_4");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['index_menu'] = 4;

            $params = array('20','23','28','33','34','35','36','37','38','40','41');
            $this->db->where_in('grid',array('1','3'));
            $this->db->where_not_in('idx',$params);
            $y['datRuang'] = $this->db->get('tbl01_ruang');

            $y['contentTitle'] = "Tracer Rekam Medik";        
            $x['content'] = $this->load->view('trace_rekam_medik/template_table_online',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'mr_dokumen.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function getView(){
        $start   = $this->input->get('start');
        $ruang   = $this->input->get('ruang');
        $state   = $this->input->get('state');
        $tgl     = $this->input->get('tgl');
        $keyword = $this->input->get('keyword');
        $limit = $this->perPage;
        $tgl=setDateEng($tgl);
        $param = array(
            'daftar_tglkunjungan'=>$tgl,
            'daftar_poly_id'=> $ruang,
            'daftar_state_trace'=> $state
        );
        if(ONLINE_STATUS==1){
            $param = array(
                'client_id'             => ONLINE_ID,
                'client_secret_key'     => ONLINE_KEY,
                'daftar_tglkunjungan'   => $tgl,
                'daftar_poly_id'        => $ruang,
                'start'                 => $start,
                'state'                 => $state,
                'limit'                 => $limit,
                'q'                     => $keyword,
                'filter'                => 'lama',
            );
            $response = $this->get_online_data($param, ONLINE_CALL_BACK . "get_reg");
            //header('Content-Type: application/json');
            //echo $response; exit;
            $res_array=json_decode($response);
            //print_r($res_array); exit;
            $res_array->status = true;
            $res_array->message = 'OK';
            $res_array->start=$start;
            $res_array->limit=$limit;
            header('Content-Type: application/json');
            echo json_encode($res_array);
        }else{
            $res=array('status'=>false,'message'=>'Webservice tidak aktif');
        }
    }

    
    function get_online_data($data, $url){
        $data_string = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));
        $result = curl_exec($ch);
        return $result;
    }

    function updateState()
    {
        //$idx = $this->input->post('id_daftar', true);
        $params = array('daftar_stateTrace' => 1);
        $req = array(
            'client_id'             => ONLINE_ID,
            'client_secret_key'     => ONLINE_KEY,
            'action'                => 'UPDATE_PENDAFTARAN',
            'param_key'             => 'daftar_id',
            'param_val'             => $this->input->post("id_daftar"),
            'data'                  => $params
        );
        if (ONLINE_STATUS==1) {
            $update_pasien = $this->get_online_data($req, ONLINE_CALL_BACK . "action");
            //Insert Data Tracert Rekam Medik
            $api_url    = ONLINE_CALL_BACK;
            $client_id  = ONLINE_ID;
            $key        = ONLINE_KEY;

            $param = array(
                'client_id'             => $client_id,
                'client_secret_key'     => $key
            );
            $id = $this->input->post("id_daftar");
            $res        = $this->get_online_data($param, $api_url . "get_pendaftaran/" . $id);
            $arr_res    = json_decode($res);

            $pasien = $arr_res->pasien;
            //print_r($pasien);exit;
            $tracert = array(
                'id_daftar' => $pasien->daftar_id,
                'reg_unit'  => '',
                'nomr'      => $pasien->nomr,
                'nama_pasien' => $pasien->nama_pasien,
                'tempat_lahir' => $pasien->tempat_lahir,
                'tgl_lahir' => $pasien->tgl_lahir,
                'jns_kelamin' => $pasien->jns_kelamin,
                'jns_layanan' => 'RJ',
                'tgl_masuk'     => date('Y-m-d H:i:s'),
                'id_ruang'      => $pasien->id_ruang,
                'nama_ruang'    => $pasien->nama_ruang,
                'no_urut_unit'  => $pasien->log_antrianpoly,
                'id_rujuk'  => $pasien->id_rujuk,
                'rujukan'   => $pasien->rujukan,
                'no_rujuk'  => $pasien->no_rujuk,
                'asal_ruang' => '',
                'nama_asal_ruang' => '',
                'dokter_pengirim' => '',
                'id_cara_bayar' => $pasien->id_cara_bayar,
                'nama_dokter_pengirim' => '',
                'cara_bayar' => $pasien->cara_bayar,
                'no_bpjs' => $pasien->no_bpjs,
                'no_jaminan' => '',
                'tgl_jaminan' => '',
                'user_daftar' => '',
                'session_id' => '',
            );
            $this->db->insert('tbl02_tracer_mr', $tracert);
        }else {
            $response=array('status'=>false,'message'=>"Conection Timeout");
            $update_pasien=json_encode($response);
        }
        echo $update_pasien;
    }

    function updateState2()
    {
        $params = array('daftar_stateTrace' => 0);
        $req = array(
            'client_id'             => ONLINE_ID,
            'client_secret_key'     => ONLINE_KEY,
            'action'                => 'UPDATE_PENDAFTARAN',
            'param_key'             => 'daftar_id',
            'param_val'             => $this->input->post("id_daftar"),
            'data'                  => $params
        );
        if (ONLINE_STATUS == 1) {
            $update_pasien = $this->get_online_data($req, ONLINE_CALL_BACK . "action");
        }else $update_pasien=false;
        echo $update_pasien;
    }
    function setPrint()
    {
        $idx = $this->input->get('kode');
        
        $params = array('daftar_stateTrace' => 1);
        $update = array(
            'client_id'             => ONLINE_ID,
            'client_secret_key'     => ONLINE_KEY,
            'action'                => 'UPDATE_PENDAFTARAN',
            'param_key'             => 'daftar_id',
            'param_val'             => $idx,
            'data'                  => $params
        );
        $update_pasien = $this->get_online_data($update, ONLINE_CALL_BACK . "action");
        //header('Content-Type: application/json');
        //echo $update_pasien;exit;
        $req = array(
            'client_id'             => ONLINE_ID,
            'client_secret_key'     => ONLINE_KEY,
        );
        $reg = $this->get_online_data($req, ONLINE_CALL_BACK . "get_pendaftaran/" . $idx);
        $arr_res    = json_decode($reg);
        //print_r($reg); exit;
        $pasien = $arr_res->pasien;
        // print_r($pasien);
        // exit;
        $tracert = array(
            'id_daftar' => $pasien->daftar_id,
            'reg_unit'  => 'OL-'. $pasien->daftar_kode,
            'nomr'      => $pasien->nomr,
            'nama_pasien' => $pasien->nama_pasien,
            'tempat_lahir' => $pasien->tempat_lahir,
            'tgl_lahir' => $pasien->tgl_lahir,
            'jns_kelamin' => $pasien->jns_kelamin,
            'jns_layanan' => 'RJ',
            'tgl_masuk'     => date('Y-m-d H:i:s'),
            'id_ruang'      => $pasien->id_ruang,
            'nama_ruang'    => $pasien->nama_ruang,
            'no_urut_unit'  => $pasien->log_antrianpoly,
            'id_rujuk'  => $pasien->id_rujuk,
            'rujukan'   => $pasien->rujukan,
            'no_rujuk'  => $pasien->no_rujuk,
            'no_antrian_poly'=> $pasien->log_antrianpoly,
            'asal_ruang' => '',
            'nama_asal_ruang' => '',
            'dokter_pengirim' => '',
            'id_cara_bayar' => $pasien->id_cara_bayar,
            'nama_dokter_pengirim' => '',
            'cara_bayar' => $pasien->cara_bayar,
            'no_bpjs' => $pasien->no_bpjs,
            'no_jaminan' => '',
            'tgl_jaminan' => '',
            'user_daftar' => '',
            'session_id' => '',
        );
        $this->db->where('reg_unit',"OL-".$pasien->daftar_id);
        $cek=$this->db->get('tbl02_tracer_mr')->row();
        if(!$cek) $this->db->insert('tbl02_tracer_mr', $tracert);

        //header('Content-Type: application/json');
        //echo $reg;exit;
        //$pasien = json_decode($reg);
        //print_r($pasien);
        //$x['data'] = $pasien;
        //echo $reg;
        echo $this->load->view('trace_rekam_medik/v_registrasi_online', $tracert);
    }
}
