<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model("Backend_model");
    }
    public function index(){
    	$data['content']	= $this->load->view('admin/view_login','',true);
    	$this->load->view('view_display',$data);
    }
    public function notfound(){
    	$data['content']	= $this->load->view('admin/view_notfound','',true);
    	$this->load->view('view_display',$data);
    }
    public function cekuser(){
    	$user=$this->Backend_model->cekuser($this->input->post('username'),$this->input->post('userpass'));
    	if(empty($user)){
    		$this->session->set_flashdata('error', 'Maaf Username Atau Password Yang Anda masukkan Salah!' );
    		header('location:' .base_url() ."login");
    	}else{
    		$data=array(
    			'userid'			=> $user->id,
                'username'          => $this->input->post('username'),
                'ruang'             => $user->user_jenisruang,
                'admin'            	=> $user->user_admin,
                'user_namalengkap'  => $user->user_namalengkap
            );  //print_r($data);exit;
            $this->session->set_userdata($data);
    		$this->session->set_flashdata('Info', 'Selamat Datang ' .$user->user_namalengkap );
    		header('location:' .base_url() ."home");
    	}
    }
    public function logout(){
		$this->session->sess_destroy();
		header('location:'.base_url().'login');

	}
    public function home(){
    	$username=$this->session->userdata('username');
    	$admin=$this->session->userdata('admin');
    	if(empty($admin)) header('location:' .base_url() ."ketersediaan");
    	if(!empty($username)){
    		$this->load->model('display_model');
    		$data['mode']	= $this->display_model->getSetting();
    		$data['content']	= $this->load->view('admin/view_home',$data,true);
    		$this->load->view('admin/view_layout',$data);
    	}else{
    		$this->session->set_flashdata('error', 'Session expire' );
    		header('location:' .base_url() ."login");
    	}
    	
    }
    function setmode($mode){
    	$a=$this->db->query("UPDATE tb_setting SET display_mode='$mode'");
    	if($a){
    		$response=array('status'=>true,'message'=>"Mode Display Berhasil diubah ke mode " .$mode);
    	}else{
    		$response=array('status'=>false,'message'=>"Gagal menubah mode display ke mode " .$mode);
    	}
    	echo json_encode($response);
    }

	public function jenis($page="",$id="")
	{
		$username=$this->session->userdata('username');
    	if(!empty($username)){
			if($page==""){
				$q=urlencode($this->input->get('q'));
				$start=intval($this->input->get('start'));
				//echo "test";
				if($q<>''){
					$config['base_url']		= base_url() ."jenis?q=" .$q;
					$config['first_url']	= base_url() ."jenis?q=" .$q;
				}else{
					$config['base_url']		= base_url() ."jenis?q=" .$q;
					$config['first_url']	= base_url() ."jenis?q=" .$q;
				}
				$config['query_string_segment']='start';
				$config['per_page']			= 15;
				$config['page_query_string']= true;
				$config['total_rows']		= $this->Backend_model->jmlJenis($q);
				$this->pagination->initialize($config);
				$data=array(
					'jenis'	=> $this->Backend_model->dataJenis($config['per_page'],$start,$q),
					'q'			=> $q,
					'pagination'=> $this->pagination->create_links(),
					'start'		=> $start,
					'total'=> $config['total_rows']	
				);
				$x['content']	= $this->load->view('admin/view_jenis',$data,true);
				$this->load->view('admin/view_layout',$x);
			}elseif($page=="form"){
				$q=urlencode($this->input->get('q'));
				$start=intval($this->input->get('start'));
				//echo "test";
				if($q<>''){
					$config['base_url']		= base_url() ."jenis?q=" .$q;
					$config['first_url']	= base_url() ."jenis?q=" .$q;
				}else{
					$config['base_url']		= base_url() ."jenis?q=" .$q;
					$config['first_url']	= base_url() ."jenis?q=" .$q;
				}
				$config['query_string_segment']='start';
				$config['per_page']			= 15;
				$config['page_query_string']= true;
				$config['total_rows']		= $this->Backend_model->jmlJenis($q);
				$this->pagination->initialize($config);
				$data=array(
					'jenis'	=> $this->Backend_model->dataJenis($config['per_page'],$start,$q),
					'row'	=> $this->Backend_model->dataJenisByid($id),
					'q'			=> $q,
					'pagination'=> $this->pagination->create_links(),
					'start'		=> $start,
					'total'=> $config['total_rows']	
				);
				$x['content']	= $this->load->view('admin/view_jenis',$data,true);
				$this->load->view('admin/view_layout',$x);

			}elseif ($page=="simpan") {
				$jenis_status=$this->input->post('jenis_status');
				if(empty($jenis_status)) $jenis_status="0";
				$data=array('jenis_id'=>$this->input->post('jenis_id'),'jenis_ruangan'=>$this->input->post('jenis_ruangan'),'jenis_status'=> $jenis_status);
				$this->Backend_model->insert_jenis($data);
				$this->session->set_flashdata('success', "Data berhasil disimpan" );
				header('location:' .base_url() ."jenis");
			}elseif($page=="update"){
				$jenis_status=$this->input->post('jenis_status');
				if(empty($jenis_status)) $jenis_status="0";
				$data=array('jenis_ruangan'=>$this->input->post('jenis_ruangan'),'jenis_status'=> $jenis_status);
				$this->Backend_model->update_jenis($this->input->post('jenis_id'),$data);
				$this->session->set_flashdata('success', "Data berhasil disimpan" );
				header('location:' .base_url() ."jenis");
			}elseif($page="delete"){
				$this->Backend_model->delete_jenis($id);
				$this->session->set_flashdata('success', "Data berhasil dihapus" );
				header('location:' .base_url() ."jenis");
			}else{
				$this->session->set_flashdata('warning', "Tidak ada aksi" );
				header('location:' .base_url() ."jenis");
			}
		}else{
			$this->session->set_flashdata('error', "Session Expire" );
			header('location:' .base_url() ."login");
			
		}
		
	}

	public function kelas($page="",$id="")
	{
		$username=$this->session->userdata('username');
    	if(!empty($username)){
			if($page==""){
				$q=urlencode($this->input->get('q'));
				$start=intval($this->input->get('start'));
				//echo "test";
				if($q<>''){
					$config['base_url']		= base_url() ."kelas?q=" .$q;
					$config['first_url']	= base_url() ."kelas?q=" .$q;
				}else{
					$config['base_url']		= base_url() ."kelas?q=" .$q;
					$config['first_url']	= base_url() ."kelas?q=" .$q;
				}
				$config['query_string_segment']='start';
				$config['per_page']			= 15;
				$config['page_query_string']= true;
				$config['total_rows']		= $this->Backend_model->jmlkelas($q);
				$this->pagination->initialize($config);
				$data=array(
					'kelas'	=> $this->Backend_model->datakelas($config['per_page'],$start,$q),
					'q'			=> $q,
					'pagination'=> $this->pagination->create_links(),
					'start'		=> $start,
					'total'=> $config['total_rows']	
				);
				$x['content']	= $this->load->view('admin/view_kelas',$data,true);
				$this->load->view('admin/view_layout',$x);
			}elseif($page=="form"){
				$q=urlencode($this->input->get('q'));
				$start=intval($this->input->get('start'));
				//echo "test";
				if($q<>''){
					$config['base_url']		= base_url() ."kelas?q=" .$q;
					$config['first_url']	= base_url() ."kelas?q=" .$q;
				}else{
					$config['base_url']		= base_url() ."kelas?q=" .$q;
					$config['first_url']	= base_url() ."kelas?q=" .$q;
				}
				$config['query_string_segment']='start';
				$config['per_page']			= 15;
				$config['page_query_string']= true;
				$config['total_rows']		= $this->Backend_model->jmlkelas($q);
				$this->pagination->initialize($config);
				$data=array(
					'kelas'	=> $this->Backend_model->datakelas($config['per_page'],$start,$q),
					'row'	=> $this->Backend_model->datakelasByid($id),
					'q'			=> $q,
					'pagination'=> $this->pagination->create_links(),
					'start'		=> $start,
					'total'=> $config['total_rows']	
				);
				$x['content']	= $this->load->view('admin/view_kelas',$data,true);
				$this->load->view('admin/view_layout',$x);

			}elseif ($page=="simpan") {
				$kelas_status=$this->input->post('kelas_status');
				$kelas_kemenkes=$this->input->post('kelas_kemenkes');
				if(empty($kelas_status)) $kelas_status="0";
				if(empty($kelas_kemenkes)) $kelas_kemenkes="0";
				$data=array('kelas_id'=>$this->input->post('kelas_id'),'kelas_nama'=>$this->input->post('kelas_nama'),'kelas_status'=> $kelas_status,'kelas_kemenkes'=>$kelas_kemenkes);
				$this->Backend_model->insert_kelas($data);
				$this->session->set_flashdata('success', "Data berhasil disimpan" );
				header('location:' .base_url() ."kelas");
			}elseif($page=="update"){
				$kelas_status=$this->input->post('kelas_status');
				$kelas_kemenkes=$this->input->post('kelas_kemenkes');
				if(empty($kelas_status)) $kelas_status="0";
				if(empty($kelas_kemenkes)) $kelas_kemenkes="0";
				$data=array('kelas_nama'=>$this->input->post('kelas_nama'),'kelas_status'=> $kelas_status,'kelas_kemenkes'=>$kelas_kemenkes);
				$this->Backend_model->update_kelas($this->input->post('kelas_id'),$data);
				$this->session->set_flashdata('success', "Data berhasil disimpan" );
				header('location:' .base_url() ."kelas");
			}elseif($page="delete"){
				$this->Backend_model->delete_kelas($id);
				$this->session->set_flashdata('success', "Data berhasil dihapus" );
				header('location:' .base_url() ."kelas");
			}else{
				$this->session->set_flashdata('warning', "Tidak ada aksi" );
				header('location:' .base_url() ."kelas");
			}
		}else{
			$this->session->set_flashdata('error', "Session Expire" );
			header('location:' .base_url() ."login");
			
		}
		
	}

	public function ruang($page="",$id="")
	{
		$username=$this->session->userdata('username');
    	if(!empty($username)){
			if($page==""){
				$q=urlencode($this->input->get('q'));
				$start=intval($this->input->get('start'));
				//echo "test";
				if($q<>''){
					$config['base_url']		= base_url() ."ruang?q=" .$q;
					$config['first_url']	= base_url() ."ruang?q=" .$q;
				}else{
					$config['base_url']		= base_url() ."ruang?q=" .$q;
					$config['first_url']	= base_url() ."ruang?q=" .$q;
				}
				$config['query_string_segment']='start';
				$config['per_page']			= 15;
				$config['page_query_string']= true;
				$config['total_rows']		= $this->Backend_model->jmlruang($q);
				$this->pagination->initialize($config);
				$data=array(
					'kamar'	=> $this->Backend_model->dataruang($config['per_page'],$start,$q),
					'q'			=> $q,
					'pagination'=> $this->pagination->create_links(),
					'start'		=> $start,
					'total'=> $config['total_rows']	
				);
				$x['content']	= $this->load->view('admin/view_ruang',$data,true);
				$this->load->view('admin/view_layout',$x);
			}elseif($page=="form"){
				$q=urlencode($this->input->get('q'));
				$start=intval($this->input->get('start'));
				//echo "test";
				if($q<>''){
					$config['base_url']		= base_url() ."ruang?q=" .$q;
					$config['first_url']	= base_url() ."ruang?q=" .$q;
				}else{
					$config['base_url']		= base_url() ."ruang?q=" .$q;
					$config['first_url']	= base_url() ."ruang?q=" .$q;
				}
				$config['query_string_segment']='start';
				$config['per_page']			= 15;
				$config['page_query_string']= true;
				$config['total_rows']		= $this->Backend_model->jmlruang($q);
				$this->pagination->initialize($config);
				$data=array(
					'kamar'	=> $this->Backend_model->dataruang($config['per_page'],$start,$q),
					'row'	=> $this->Backend_model->dataruangByid($id),
					'q'			=> $q,
					'pagination'=> $this->pagination->create_links(),
					'start'		=> $start,
					'total'=> $config['total_rows']	
				);
				$x['content']	= $this->load->view('admin/view_ruang',$data,true);
				$this->load->view('admin/view_layout',$x);

			}elseif ($page=="simpan") {
				$grStatus=$this->input->post('grStatus');
				if(empty($grStatus)) $grStatus="0";
				$data=array('grId'=>$this->input->post('grId'),
					'grNama'=>$this->input->post('grNama'),
					'totTmpTidur'	=> $this->input->post('totTmpTidur'),
					'grPenempatan'	=> $this->input->post('grPenempatan'),
					'grStatus'=> $grStatus);
				$this->Backend_model->insert_ruang($data);
				$this->session->set_flashdata('success', "Data berhasil disimpan" );
				//print_r($data);
				header('location:' .base_url() ."ruang?start=" .$this->input->post('start') ."&q=" .$this->input->post('q'));
			}elseif($page=="update"){
				$grStatus=$this->input->post('grStatus');
				if(empty($grStatus)) $grStatus="0";
				$data=array('grId'=>$this->input->post('grId'),
					'grNama'=>$this->input->post('grNama'),
					'totTmpTidur'	=> $this->input->post('totTmpTidur'),
					'grPenempatan'	=> $this->input->post('grPenempatan'),
					'grStatus'=> $grStatus);
				$this->Backend_model->update_ruang($this->input->post('grId'),$data);
				$this->session->set_flashdata('success', "Data berhasil disimpan" );
				header('location:' .base_url() ."ruang?start=" .$this->input->post('start') ."&q=" .$this->input->post('q'));
			}elseif($page="delete"){
				$this->Backend_model->delete_ruang($id);
				$this->session->set_flashdata('success', "Data berhasil dihapus" );
				header('location:' .base_url() ."ruang");
			}else{
				$this->session->set_flashdata('warning', "Tidak ada aksi" );
				header('location:' .base_url() ."ruang");
			}
		}else{
			$this->session->set_flashdata('error', "Session Expire" );
			header('location:' .base_url() ."login");
			
		}
		
	}

	public function user($page="",$id="")
	{
		$username=$this->session->userdata('username');
    	if(!empty($username)){
			if($page==""){
				$q=urlencode($this->input->get('q'));
				$start=intval($this->input->get('start'));
				//echo "test";
				if($q<>''){
					$config['base_url']		= base_url() ."user?q=" .$q;
					$config['first_url']	= base_url() ."user?q=" .$q;
				}else{
					$config['base_url']		= base_url() ."user?q=" .$q;
					$config['first_url']	= base_url() ."user?q=" .$q;
				}
				$config['query_string_segment']='start';
				$config['per_page']			= 15;
				$config['page_query_string']= true;
				$config['total_rows']		= $this->Backend_model->jmluser($q);
				$this->pagination->initialize($config);
				$data=array(
					'user'	=> $this->Backend_model->datauser($config['per_page'],$start,$q),
					'ruang'	=> $this->Backend_model->semuaJenis(),
					'q'			=> $q,
					'pagination'=> $this->pagination->create_links(),
					'start'		=> $start,
					'total'=> $config['total_rows']	
				);
				$x['content']	= $this->load->view('admin/view_user',$data,true);
				$this->load->view('admin/view_layout',$x);
			}elseif($page=="form"){
				$q=urlencode($this->input->get('q'));
				$start=intval($this->input->get('start'));
				//echo "test";
				if($q<>''){
					$config['base_url']		= base_url() ."user?q=" .$q;
					$config['first_url']	= base_url() ."user?q=" .$q;
				}else{
					$config['base_url']		= base_url() ."user?q=" .$q;
					$config['first_url']	= base_url() ."user?q=" .$q;
				}
				$config['query_string_segment']='start';
				$config['per_page']			= 10;
				$config['page_query_string']= true;
				$config['total_rows']		= $this->Backend_model->jmluser($q);
				$this->pagination->initialize($config);
				$data=array(
					'user'	=> $this->Backend_model->datauser($config['per_page'],$start,$q),
					'ruang'	=> $this->Backend_model->semuaJenis(),
					'row'	=> $this->Backend_model->datauserByid($id),
					'q'			=> $q,
					'pagination'=> $this->pagination->create_links(),
					'start'		=> $start,
					'total'=> $config['total_rows']	
				);
				$x['content']	= $this->load->view('admin/view_user',$data,true);
				$this->load->view('admin/view_layout',$x);

			}elseif ($page=="simpan") {
				$user_status=$this->input->post('user_status');
				if(empty($user_status)) $user_status="0";
				$user_admin=$this->input->post('user_admin');
				if(empty($user_admin)) $user_admin="0";
				$data=array(
					'username'=>$this->input->post('username'),
					'user_namalengkap'	=> $this->input->post('user_namalengkap'),
					'user_jenisruang'	=> $this->input->post('user_jenisruang'),
					'user_pass'	=> md5($this->input->post('user_pass')),
					'user_admin'=> $user_amdin,
					'user_status'=> $user_status);
				$this->Backend_model->insert_user($data);
				$this->session->set_flashdata('success', "Data berhasil disimpan" );
				//print_r($data);
				header('location:' .base_url() ."user");
			}elseif($page=="update"){
				$user_status=$this->input->post('user_status');
				if(empty($user_status)) $user_status="0";
				$data=array(
					'user_namalengkap'	=> $this->input->post('user_namalengkap'),
					'user_jenisruang'	=> $this->input->post('user_jenisruang'),
					'user_admin'=> $user_amdin,
					'user_status'=> $user_status);
				$this->Backend_model->update_user($this->input->post('id'),$data);
				$this->session->set_flashdata('success', "Data berhasil disimpan" );
				header('location:' .base_url() ."user");
			}elseif($page="delete"){
				$this->Backend_model->delete_user($id);
				$this->session->set_flashdata('success', "Data berhasil dihapus" );
				header('location:' .base_url() ."user");
			}else{
				$this->session->set_flashdata('warning', "Tidak ada aksi" );
				header('location:' .base_url() ."user");
			}
		}else{
			$this->session->set_flashdata('error', "Session Expire" );
			header('location:' .base_url() ."login");
			
		}
		
	}	

	public function ketersediaan($page="",$id="")
	{
		$username=$this->session->userdata('username');
    	if(!empty($username)){
			if($page==""){
				$q=urlencode($this->input->get('q'));
				$start=intval($this->input->get('start'));
				//echo "test";
				if($q<>''){
					$config['base_url']		= base_url() ."ketersediaan?q=" .$q;
					$config['first_url']	= base_url() ."ketersediaan?q=" .$q;
				}else{
					$config['base_url']		= base_url() ."ketersediaan?q=" .$q;
					$config['first_url']	= base_url() ."ketersediaan?q=" .$q;
				}
				$config['query_string_segment']='start';
				$config['per_page']			= 15;
				$config['page_query_string']= true;
				$config['total_rows']		= $this->Backend_model->jmlketersediaan($q);
				$this->pagination->initialize($config);
				$data=array(
					'ketersediaan'	=> $this->Backend_model->dataketersediaan($config['per_page'],$start,$q),
					'jenis'			=> $this->Backend_model->semuaJenis(),
					'kelas'			=> $this->Backend_model->semuaKelas(),
					'ruang'			=> $this->Backend_model->semuaRuangkeperawatan(),
					'kamar'			=> $this->Backend_model->semuaRuang(1),
					'q'			=> $q,
					'pagination'=> $this->pagination->create_links(),
					'start'		=> $start,
					'total'=> $config['total_rows']	
				);
				$x['content']	= $this->load->view('admin/view_ketersediaan',$data,true);
				$this->load->view('admin/view_layout',$x);
			}elseif($page=="form"){
				$q=urlencode($this->input->get('q'));
				$start=intval($this->input->get('start'));
				//echo "test";
				if($q<>''){
					$config['base_url']		= base_url() ."ketersediaan?q=" .$q;
					$config['first_url']	= base_url() ."ketersediaan?q=" .$q;
				}else{
					$config['base_url']		= base_url() ."ketersediaan?q=" .$q;
					$config['first_url']	= base_url() ."ketersediaan?q=" .$q;
				}
				$config['query_string_segment']='start';
				$config['per_page']			= 10;
				$config['page_query_string']= true;
				$config['total_rows']		= $this->Backend_model->jmlketersediaan($q);
				$this->pagination->initialize($config);
				$data=array(
					'ketersediaan'	=> $this->Backend_model->dataketersediaan($config['per_page'],$start,$q),
					'jenis'			=> $this->Backend_model->semuaJenis(),
					'kelas'			=> $this->Backend_model->semuaKelas(),
					'ruang'			=> $this->Backend_model->semuaRuangkeperawatan(),
					'kamar'			=> $this->Backend_model->semuaRuang(1),
					'row'	=> $this->Backend_model->dataketersediaanByid($id),
					'q'			=> $q,
					'pagination'=> $this->pagination->create_links(),
					'start'		=> $start,
					'total'=> $config['total_rows']	
				);
				$x['content']	= $this->load->view('admin/view_ketersediaan',$data,true);
				$this->load->view('admin/view_layout',$x);

			}elseif ($page=="simpan") {
				
				$data=array(
					'map_ruangid'	=> $this->input->post('map_ruangid'),
					'map_kelasid'	=> $this->input->post('map_kelasid'),
					'map_kamarid'	=> $this->input->post('map_kamarid'),
					'map_kapasitas'	=> $this->input->post('map_kapasitas'),
					'map_penempatan'	=> $this->input->post('map_penempatan'),
					'map_isilk'=> 0,
					'map_isipr'=> 0,
					'map_tglupdate'	=> date('Y-m-d H:i:s'),
					'map_userupdate'=> $this->session->userdata('userid')
				);
				$res=array(
					'client_id'			=> '00001',
					'client_secret_key'	=> 'RF3XS15QY15TPK91',
					'ketersediaan'		=> $data
				);
				$url="http://rsud.padangpanjang.go.id/api/ketersediaan";
				$data_string = json_encode($res);  
				$ch = curl_init($url);                                                                      
			    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
			    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
			    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			        'Content-Type: application/json',                                                                                
			        'Content-Length: ' . strlen($data_string))                                                                       
			    );                                                                                                                   
			    $result = curl_exec($ch);
			    //exit;
				$this->Backend_model->insert_ketersediaan($data);
				$this->session->set_flashdata('success', "Data berhasil disimpan" );
				//print_r($data);

				header('location:' .base_url() ."ketersediaan");
			}elseif($page=="update"){
				$map_isipr=$this->input->post('map_isipr');
				if(empty($map_isipr)) $map_isipr="0";
				$kapasitas_lk=$this->input->post('kapasitas_lk');
				$kapasitas_pr=$this->input->post('kapasitas_pr');
				$map_isilk	= intval($this->input->post('map_isilk'));
				$map_isipr= intval($this->input->post('map_isipr'));
				$kapasitas=$this->input->post('map_kapasitas');
				$masuk=$map_isilk+$map_isipr;
				if($kapasitas<$masuk){
				//if($kapasitas_lk<$map_isilk||$kapasitas_pr<$map_isipr){
					$this->session->set_flashdata('error', "Jumlah Bed Terisi tidak boleh melebihi kapasitas bed yang tersedia" );
					header('location:' .base_url() ."ketersediaan/" .$this->input->post('map_id'));
				}else{
					$kelas=$this->input->post('map_kelasid');
					$kelas_khusus = array('0010','0011','0012','0013');
					if(in_array($kelas,$kelas_khusus)){
						$kelas_kemenkes='0008';
					}else{
						$kelas_kemenkes=$kelas;
					}
					$data=array(
						'map_ruangid'	=> $this->input->post('map_ruangid'),
						'map_kelasid'	=> $this->input->post('map_kelasid'),
						'map_kelas_kemenkes'	=> $kelas_kemenkes,
						'map_kamarid'	=> $this->input->post('map_kamarid'),
						'map_kapasitas'	=> $this->input->post('map_kapasitas'),
						'map_penempatan'	=> $this->input->post('map_penempatan'),
						'map_isilk'=> $this->input->post('map_isilk'),
						'map_isipr'=> $this->input->post('map_isipr'),
						'map_tglupdate'	=> date('Y-m-d H:i:s'),
						'map_userupdate'=> $this->session->userdata('userid')
					);
					$res=array(
						'client_id'			=> '00001',
						'client_secret_key'	=> 'RF3XS15QY15TPK91',
						'ketersediaan'		=> $data
					);
					$url="http://rsud.padangpanjang.go.id/api/ketersediaan";
					$data_string = json_encode($res);  
					$ch = curl_init($url);                                                                      
				    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
				    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
				    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
				    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
				        'Content-Type: application/json',                                                                                
				        'Content-Length: ' . strlen($data_string))                                                                       
				    );                                                                                                                   
				    $result = curl_exec($ch);

					$this->Backend_model->update_ketersediaan($this->input->post('map_id'),$data);
					$this->session->set_flashdata('success', "Data berhasil disimpan" );
					//echo $result;
					//header('Content-Type: application/json');
					///echo json_encode($result);
					//print_r($data_string);
					//echo "UPDATE...";
					//echo $result;exit;
					header('location:' .base_url() ."ketersediaan");
				}
					
			}elseif($page="delete"){
				$this->Backend_model->delete_ketersediaan($id);
				$this->session->set_flashdata('success', "Data berhasil dihapus" );
				header('location:' .base_url() ."ketersediaan");
			}else{
				$this->session->set_flashdata('warning', "Tidak ada aksi" );
				header('location:' .base_url() ."ketersediaan");
			}
		}else{
			$this->session->set_flashdata('error', "Session Expire" );
			header('location:' .base_url() ."login");
			
		}
		
	}
}
