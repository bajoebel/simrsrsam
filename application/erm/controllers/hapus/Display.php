<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Display extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('Layanan_model');
        $this->load->model('nota_model');
    }
    function index()
    {
      $lastantrean=$this->Layanan_model->getAntreanPanggil($this->session->userdata('kdlokasi'));
      if(!empty($lastantrean)) $dj= $lastantrean->dokterJaga; else $dj=0;
      $jadwal=$this->Layanan_model->getJadwal($this->session->userdata('kdlokasi'),$dj);
      
      $data = array(
        'contentTitle' => 'Antrean Poliklinik Pasien',
        'ruangID' => $this->session->userdata('kdlokasi'),
        'jadwal'=>$jadwal,
        'lastantrean'=>$lastantrean,
      );
		  $x['content']		= $this->load->view('display_antrean',$data,true);
		  $this->load->view('display_layout',$x);
    }

    function getantrean(){
      $antrean=$this->Layanan_model->getAntreanPanggil($this->session->userdata('kdlokasi'));
      if(!empty($antrean)) $dj= $antrean->dokterJaga; else $dj=0;
      $jadwal=$this->Layanan_model->getJadwal($this->session->userdata('kdlokasi'),$dj);
      
      $data=array(
        'lastantrean'=>$antrean,
        'jadwal'=>$jadwal,
        'waktupanggil'=>date('Y-m-d H:i:s')
      );
      header('Content-Type: application/json');
      echo json_encode($data);
    }
}
