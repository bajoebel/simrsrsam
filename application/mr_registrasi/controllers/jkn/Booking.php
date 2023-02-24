<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Booking extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('jkn_model');
        $this->load->model('users_model');
        $this->load->helper('lz');
        $this->load->helper('http');
        $ses_state = $this->users_model->cek_session_id();
        if(!$ses_state){  
            $metadata=array(
                'code'=>201,
                'message'=>'Anda Belum Login Atau Session Expired'
            );
            $response=array(
                'metadata'=>$metadata
            );
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }
    function index(){
        $z = setNav("nav_6");
        $data=array(
            'contentTitle'=>'Pembatalan Booking',
        );
        $view=array(
            'header'=>$this->load->view('template/header', '', true),
            'nav_sidebar'=>$this->load->view('template/nav_sidebar', $z, true),
            'content'=>$this->load->view('jkn/booking', $data, true),
            'index_menu'=>7,
            'libjs'=>array(
                'js/jkn.js',
                'js/booking.js'
            )
        );
        $this->load->view('template/theme', $view);
    }
    function listbooking(){
        $keyword=$this->input->get('keyword');

        $tgl=$this->input->get('tgl');
        $tanggal=empty($tgl)?date('Y-m-d'):$tgl;
        $request=array(
            'tanggal'=>$tanggal,
            'keyword'=>$keyword
        );
        $response=httprequest($request,ONLINE_CALL_BACK."jkn/rsud/listbooking");
        header('Content-Type: application/json');
        echo $response;
    }
}