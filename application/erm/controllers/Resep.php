<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Resep extends CI_Controller
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
        $this->load->model('resep_model');
    }
    function cariobat($kode_lokasi = "")
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $param1 = $this->input->post('param1');
            $data = $this->resep_model->getBarang($param1, $kode_lokasi);
            $list = array(
                'status'    => true,
                'message'   => "OK",
                'data'     => $data,
            );
            header('Content-Type: application/json');
            echo json_encode($list);
        } else {
            $list = array(
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