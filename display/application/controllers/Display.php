<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model("Display_model");
    }
    
	public function index()
	{
		$limit=20;
		$start=0;
		$jmlData=$this->Display_model->jmlData();
		$data=array(
			'jmlData'		=> $jmlData,
			'limit'			=>$limit,
			'setting'		=> $this->Display_model->getSetting()
		);
		$x['content']		= $this->load->view('view_content',$data,true);
		$this->load->view('view_display',$x);
	}
	function mode(){
		$mode=$this->Display_model->getSetting();
		header('Content-Type: application/json');
		echo json_encode($mode);
	}
	function ruangan(){
		$data=$this->Display_model->getMonitoring();
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	function datakelas(){
		$kelas=$this->Display_model->ketersediaan_kamar('');
		header('Content-Type: application/json');
		echo json_encode($kelas);
	}
	function datakamar($start=0){
		$limit=20;
		$kamar=$this->Display_model->getKetersediaan($limit, $start);
		header('Content-Type: application/json');
		echo json_encode($kamar);
	}
}
