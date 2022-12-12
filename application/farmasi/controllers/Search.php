<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class search extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
        $this->load->model('search_model');
    }

    function barang($kode_lokasi=""){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $start=intval($this->input->get('start'));
            $kode=$this->input->get('kode');
            $nama=$this->input->get('nama');
            $satuan=$this->input->get('satuan');
            $kategori=$this->input->get('kategori');
            $keyword=$this->input->get('keyword');
            $limit=10;  
            $data=$this->search_model->getBarang($start,$limit,$kode,$nama,$satuan,$kategori,$keyword,$kode_lokasi);
                $row_count=$this->search_model->countBarang($kode,$nama,$satuan,$kategori,$keyword,$kode_lokasi);
                $list=array(
                    'status'    => true,
                    'message'   => "OK", 
                    'start'     => $start,
                    'row_count' => $row_count,
                    'limit'     => $limit,
                    'data'     => $data,
                );
                header('Content-Type: application/json');
                echo json_encode($list);
            
        }else{
            $list=array(
                    'status'    => false,
                    'message'   => "Session Expired",
                    'start'     => 0,
                    'row_count' => 0,
                    'limit'     => 0,
                    'data'     => array(),
            );
            header('Content-Type: application/json');
            echo json_encode($list);
        }
    }
    
    function pasien(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $start=intval($this->input->get('start'));
            $tgl=$this->input->get('tgl');
            //$tgl=str_replace('/', '-', $tgl);
            
            //echo $tgl;exit;
            if(!empty($tgl)){
                $t=explode('/', $tgl);
                $tb=$t[2]."-".$t[1]."-".$t[0];
            }else{
                $tb="";
            }
            

            $nomr=$this->input->get('nomr');
            $iddaftar=$this->input->get('iddaftar');
            $regunit=$this->input->get('regunit');
            $nama=$this->input->get('nama');
            $ruang=$this->input->get('ruang');
            $layanan=$this->input->get('layanan');
            $limit=10;
            $data=$this->search_model->getPasien($start,$limit,$tb,$nomr,$iddaftar,$regunit,$nama,$ruang, $layanan);
                $row_count=$this->search_model->countPasien($tb,$nomr,$iddaftar,$regunit,$nama,$ruang, $layanan);
                $list=array(
                    'status'    => true,
                    'message'   => "OK",
                    'start'     => $start,
                    'row_count' => $row_count,
                    'limit'     => $limit,
                    'data'     => $data,
                );
                header('Content-Type: application/json');
                echo json_encode($list);
            
        }else{
            $list=array(
                    'status'    => false,
                    'message'   => "Session Expired",
                    'start'     => 0,
                    'row_count' => 0,
                    'limit'     => 0,
                    'data'     => array(),
            );
            header('Content-Type: application/json');
            echo json_encode($list);
        }
    }

    function satuan_pemakaian($jenis_obat){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $list=array(
                'status'    => true,
                'message'   => "OK",
                'data'      => $this->search_model->getSatuanpemakaian($jenis_obat),
            );
            header('Content-Type: application/json');
            echo json_encode($list);
        }else{
            $list=array(
                'status'    => false,
                'message'   => "Session Expired",
                'data'     => array(),
            );
            header('Content-Type: application/json');
            echo json_encode($list);
        }
    }

    function cara_pakai($jenis_obat){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $list=array(
                'status'    => true,
                'message'   => "OK", 
                'data'     => $this->search_model->getCarapakai($jenis_obat),
            );
            header('Content-Type: application/json');
            echo json_encode($list);
        }else{
            $list=array(
                'status'    => false,
                'message'   => "Session Expired",
                'data'     => array(),
            );
            header('Content-Type: application/json');
            echo json_encode($list);
        }
    }

    function waktu_pakai($jenis_obat){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $list=array(
                'status'    => true,
                'message'   => "OK",
                'waktu1'     => $this->search_model->getWaktupakai(0), 
                'waktu2'     => $this->search_model->getWaktupakai($jenis_obat),
            );
            header('Content-Type: application/json');
            echo json_encode($list);
        }else{
            $list=array(
                'status'    => false,
                'message'   => "Session Expired",
                'data'     => array(),
            );
            header('Content-Type: application/json');
            echo json_encode($list);
        }
    }
    function keterangan($jenis_layanan=""){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $list=array(
                'status'    => true,
                'message'   => "OK",
                'data'     => $this->search_model->getKeterangan($jenis_layanan),
            );
            header('Content-Type: application/json');
            echo json_encode($list);
        }else{
            $list=array(
                'status'    => false,
                'message'   => "Session Expired",
                'data'     => array(),
            );
            header('Content-Type: application/json');
            echo json_encode($list);
        }
    }
}
