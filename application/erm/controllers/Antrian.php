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
        // echo $this->Antrian_model->lastAntrian($this->session->userdata('kdlokasi'));
        // echo "TST";
        // print_r($data['lastantrean']); 
        // exit;
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
    // function test(){
    //     echo "TEST";
    // }
}