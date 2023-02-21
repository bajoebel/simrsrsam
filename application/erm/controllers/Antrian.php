<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Antrian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->helper('ajaxdata');
        $this->load->model('users_model');
        $this->load->model('Antrian_model');
        $this->load->model('nota_model');
    }
    function index(){
        $z = setNav("nav_2");
        $dokter=$this->Antrian_model->getDokter($this->session->userdata('kdlokasi'));
        // print_r($dokter); exit;
        $dokterid=(!empty($dokter) ? $dokter[0]->NRP : "");
        // $hari=hariIni();
        $data=array(
            'contentTitle'=>'ANTRIAN PASIEN',
            'lastantrean'=>$this->Antrian_model->lastAntrian($this->session->userdata('kdlokasi')),
            'ruangID'=>$this->session->userdata('kdlokasi'),
            'antreandokter'=>$this->Antrian_model->getDokter($this->session->userdata('kdlokasi')),
            'jadwal'=>$this->Antrian_model->getJadwal($this->session->userdata('kdlokasi'),$dokterid,hariIni())
        );
        $theme=array(
            'header'=> $this->load->view('template/header', '', true),
            'index_menu'=>2,
            'nav_sidebar'=> $this->load->view('template/nav_sidebar', $z, true),
            'content'=> $this->load->view('antrian/antrian_index', $data, true),
            'lib'=>array('js/antrian.js')
        );
        $this->load->view('template/theme', $theme);
    }
    function lastantrian(){
        $kdlokasi=$this->session->userdata('kdlokasi');
        $ant=$this->db->select("a.*,b.nomr")
        ->where("status_panggil",0)
        ->where("antrianruang",$kdlokasi)
        // ->where("tanggal",date('Y-m-d'))
        ->join("tbl02_pendaftaran b","a.id_daftar=b.id_daftar")
        ->get("tbl02_antrian a")->row();
        print_r($ant); exit;
    }

    function lastantrean($dj,$jns=1,$curent=""){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $lastantrean=$this->Antrian_model->getLastAntrean($this->session->userdata('kdlokasi'),$dj,$jns,$curent);
            $response=array(
                'status'    => true,
                'data'      => $lastantrean,
                'sekarang'  => date('Y-m-d H:i:s'),
                'message'   => "OK"
            );
        }else{
            $response=array(
                'status'    => false,
                'message'   => "Session Expired"
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function listantrean($dj,$jns=1){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $lastantrean=$this->Antrian_model->getListAntrean($this->session->userdata('kdlokasi'),$dj,$jns);
            $response=array(
                'status'    => true,
                'data'      => $lastantrean,
                'sekarang'  => date('Y-m-d H:i:s'),
                'message'   => "OK"
            );
        }else{
            $response=array(
                'status'    => false,
                'message'   => "Session Expired"
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function panggilantrean(){
        $dokter=$this->input->get('dokter');
        $jns=$this->input->get('jns');
        $nomor=$this->input->get('nomor');
        // $this->db->select("a.*,a.kodedokterjkn as dokterjkn,c.kodejkn");
        // $this->db->join("tbl01_pegawai b","a.antriandokter = b.NRP");
        // $this->db->join("tbl01_ruang c","a.antrianruang=c.idx");
        $this->db->select("*,a.kodedokterjkn as dokterjkn,a.kodepolijkn AS kodejkn");
        $this->db->where('aktiftaskid <=',4);
        $this->db->where('tanggal',date('Y-m-d'));
        $this->db->where('antriandokter',$dokter);
        $this->db->where('jnsantrean',$jns);
        if(!empty($nomor)) $this->db->where('no_antrian_poly',$nomor);
        $this->db->where('antrianruang',$this->session->userdata('kdlokasi'));
        $this->db->order_by('no_antrian_poly');
        $data=$this->db->get('tbl02_antrian a')->row();
        if(empty($data)){
            $response=array('status'=>false,'message'=>'Antrian Habis');
        }else{
            $update=array('status_panggil'=>1);
            $this->db->where('idx',$data->idx);
            $this->db->update('tbl02_antrian',$update);
            $request=array(
                'kodepoli'=>$data->kodejkn,
                'kodedokter'=>$data->dokterjkn,
                'tanggalperiksa'=>date('Y-m-d'),
                'jampraktek'=>'08:00-16:00',
                'nomorantrean'=>$data->no_antrian_poly,
                'angkaantrean'=>$data->no_antrian_poly
            );
            $kirim = $this->Antrian_model->jkn_request($request,ONLINE_CALL_BACK ."jkn/rsud/antrianpanggil","",array('username'=>'simrs','password'=>'@simrs2022'));
            // echo $kirim; exit;
            $response=array('status'=>true,'message'=>'Memanggil...','no_antrian_poly'=>$data->no_antrian_poly,'update'=>$kirim);
        }
        header('Content-Type: application/json');
        echo json_encode($response);

    }
    function skipantrian(){
        $data=array('jnsantrean'=>3);
        $this->db->where('kodebooking',$this->input->post('kodebooking'));
        $this->db->update('tbl02_antrian',$data);
        $response=array('status'=>true,'message'=>'OK');
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function batalkanantrean(){
        // Create TimeStamps
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_JKN."&".$tStamp, SECREET_ID_JKN, true);
        $encodedSignature = base64_encode($signature);
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_JKN . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_JKN;
        // $hari=$this->input->post('hari');
        $sekarang=strtotime(date('Y-m-d H:i:s')) *1000;
        $req=array(
            'kodebooking'=>$this->input->post('kodebooking'),
            'taskid'=>99,
            'waktu'=>$sekarang
        );
        
        $res = $this->Antrian_model->postData("antrean/updatewaktu",$header,json_encode($req));
        // echo $res; exit;
        $arr_res=json_decode($res);
        if($arr_res->metadata->code==200){
            $id_daftar=$this->input->post('id_daftar');
            $localtask=array(
                'id_daftar'=>$id_daftar,
                'kodebooking'=>$this->input->post('kodebooking'),
                'taskid'=>99,
                'waktu'=>$sekarang
            );
            $this->db->insert('tbl02_task',$localtask);

            $aktiftask=array('aktiftaskid'=>99,'alasanbatal'=>$this->input->post('keterangan'));
            $this->db->where('kodebooking',$this->input->post('kodebooking'));
            $this->db->update('tbl02_antrian',$aktiftask);

            // Batalkan Kunjungan
            $bk=array(
                'id_daftar'=>$this->input->post('id_daftar'),
                'reg_unit'=>$this->input->post('reg_unit'),
                'tgl_created'=>date('Y-m-d H:i:s'),
                'alasan'=>$this->input->post('keterangan')
            );
            $this->db->insert('tbl02_pendaftaran_batal',$bk);
            
        }else{
            if($arr_res->metadata->code=208){
                $aktiftask=array('aktiftaskid'=>99,'alasanbatal'=>$this->input->post('keterangan'));
                $this->db->where('kodebooking',$this->input->post('kodebooking'));
                $this->db->update('tbl02_antrian',$aktiftask);
            }
        }
        header('Content-Type: application/json');
        echo $res;
    }
}