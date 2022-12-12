<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
        
    }
	public function cekuser($username,$userpass)
	{
		$this->db->where('username',$username);
		$this->db->where('user_pass', md5($userpass));
		return $this->db->get('tb_user')->row();
	}
	//Data jenis
	function dataJenis($limit, $start=0, $q=NULL){
		$this->db->like('jenis_ruangan',$q);
		$this->db->limit($limit,$start);
		$this->db->order_by('jenis_id','desc');
		return $this->db->get('tb_jenisruang')->result();
	}
	function semuaJenis(){
		return $this->db->get('group_ruang')->result();
	}
	function dataJenisByid($id){
		$this->db->where('jenis_id',$id);
		return $this->db->get('tb_jenisruang')->row();
	}
	function jmlJenis($q){
		$this->db->like('jenis_ruangan',$q);
		return $this->db->get('tb_jenisruang')->num_rows();
	}
	function insert_jenis($data){
		$this->db->insert('tb_jenisruang',$data);
		return $this->db->insert_id();
	}
	function update_jenis($id,$data){
		$this->db->where('jenis_id',$id);
		$this->db->update('tb_jenisruang', $data);
	}
	function delete_jenis($id){
		$this->db->where('jenis_id', $id);
		$this->db->delete('tb_jenisruang');
	}

	//Data kelas
	function datakelas($limit, $start=0, $q=NULL){
		$this->db->like('kelas_nama',$q);
		$this->db->limit($limit,$start);
		$this->db->order_by('kelas_id','desc');
		return $this->db->get('tb_kelas')->result();
	}
	function datakelasByid($id){
		$this->db->where('kelas_id',$id);
		return $this->db->get('tb_kelas')->row();
	}
	function jmlkelas($q){
		$this->db->like('kelas_nama',$q);
		return $this->db->get('tb_kelas')->num_rows();
	}
	function insert_kelas($data){
		$this->db->insert('tb_kelas',$data);
		return $this->db->insert_id();
	}
	function update_kelas($id,$data){
		$this->db->where('kelas_id',$id);
		$this->db->update('tb_kelas', $data);
	}
	function delete_kelas($id){
		$this->db->where('kelas_id', $id);
		$this->db->delete('tb_kelas');
	}
	function semuaKelas(){
		return $this->db->get('tb_kelas')->result();
	}

	//Data ruang
	function dataruang($limit, $start=0, $q=NULL){
		$this->db->like('grNama',$q);
		$this->db->limit($limit,$start);
		$this->db->order_by('grId','desc');
		return $this->db->get('group_ruang')->result();
	}
	function dataruangByid($id){
		$this->db->where('grId',$id);
		return $this->db->get('group_ruang')->row();
	}
	function jmlruang($q){
		$this->db->like('grNama',$q);
		return $this->db->get('group_ruang')->num_rows();
	}
	function insert_ruang($data){
		$this->db->insert('group_ruang',$data);
		return $this->db->insert_id();
	}
	function update_ruang($id,$data){
		$this->db->where('grId',$id);
		$this->db->update('group_ruang', $data);
	}
	function delete_ruang($id){
		$this->db->where('grId', $id);
		$this->db->delete('group_ruang');
	}
	function semuaRuang($status=""){
		if($status!="") $this->db->where('grStatus',$status);
		$this->db->where('glId','GL001');
		//$this->db->order_by('grNama');
		return $this->db->get('group_ruang')->result();
	}
	function semuaRuangkeperawatan(){
		return $this->db->get('tb_ruang_perawatan')->result();
	}

	//Data user
	function datauser($limit, $start=0, $q=NULL){
		$this->db->join('group_ruang','user_jenisruang=grId','left');
		$this->db->like('user_namalengkap',$q);
		$this->db->or_like('grNama',$q);
		$this->db->limit($limit,$start);
		$this->db->order_by('id','desc');
		return $this->db->get('tb_user')->result();
	}
	function datauserByid($id){
		$this->db->where('id',$id);
		return $this->db->get('tb_user')->row();
	}
	function jmluser($q){
		$this->db->join('group_ruang','user_jenisruang=grId','left');
		$this->db->like('user_namalengkap',$q);
		$this->db->or_like('grNama',$q);
		return $this->db->get('tb_user')->num_rows();
	}
	function insert_user($data){
		$this->db->insert('tb_user',$data);
		return $this->db->insert_id();
	}
	function update_user($id,$data){
		$this->db->where('id',$id);
		$this->db->update('tb_user', $data);
	}
	function delete_user($id){
		$this->db->where('id', $id);
		$this->db->delete('tb_user');
	}
	function semuauser(){
		return $this->db->get('tb_user')->result();
	}
	//Data ketersediaan
	function dataketersediaan($limit, $start=0, $q=NULL){
		$ruang=$this->session->userdata('ruang');
		$user_admin=$this->session->userdata('admin');
		$this->db->join('group_ruang','grId=map_kamarid');
		$this->db->join('tb_ruang_perawatan','ruang_id=map_ruangid');
		$this->db->join('tb_kelas','kelas_id=map_kelasid','left');
		$this->db->join('tb_user','map_userupdate=id','left');
		if($user_admin==0){
			$this->db->where('map_kamarid',$ruang);	
		}
		$this->db->group_start();
		$this->db->or_like('kelas_nama',$q);
		$this->db->or_like('grNama',$q);
		$this->db->or_like('ruang_perawatan',$q);
		$this->db->group_end();
		$this->db->limit($limit,$start);
		$this->db->order_by('map_id','desc');
		return $this->db->get('tb_ketersediaan')->result();
	}
	function dataketersediaanByid($id){
		$this->db->where('map_id',$id);
		$this->db->join('group_ruang','grId=map_kamarid');
		$this->db->join('tb_ruang_perawatan','ruang_id=map_ruangid');
		$this->db->join('tb_kelas','map_kelasid=kelas_id','left');
		return $this->db->get('tb_ketersediaan')->row();
	}
	function jmlketersediaan($q){
		$ruang=$this->session->userdata('ruang');
		$user_admin=$this->session->userdata('admin');
		$this->db->join('tb_ruang_perawatan','ruang_id=map_ruangid');
		$this->db->join('group_ruang','grId=map_kamarid');
		$this->db->join('tb_kelas','kelas_id=map_kelasid','LEFT');
		$this->db->join('tb_user','map_userupdate=id','left');
		if($user_admin==0){
			$this->db->where('map_kamarid',$ruang);	
		}
		$this->db->group_start();		
		$this->db->or_like('kelas_nama',$q);
		$this->db->or_like('grNama',$q);
		$this->db->or_like('ruang_perawatan',$q);
		$this->db->group_end();
		return $this->db->get('tb_ketersediaan')->num_rows();
	}
	function insert_ketersediaan($data){
		$this->db->insert('tb_ketersediaan',$data);
		return $this->db->insert_id();
	}
	function update_ketersediaan($id,$data){
		$this->db->where('map_id',$id);
		$this->db->update('tb_ketersediaan', $data);
	}
	function delete_ketersediaan($id){
		$this->db->where('map_id', $id);
		$this->db->delete('tb_ketersediaan');
	}

	function getDatakemkes1($map_kelasid="",$map_ruangid=""){
		$this->db->select("
			map_ruangid AS tipe_pasien ,
			ruang_perawatan,
			map_kelasid AS kode_ruang, 
			kelas_nama AS kelas_perawatan,
			SUM(map_kapasitas) AS total_TT,
			SUM(map_isilk) AS terpakai_male,
			SUM(map_isipr) AS terpakai_female,
			NOW() AS tgl_update");
		$this->db->join('tb_kelas','map_kelasid=kelas_id');
		$this->db->join('tb_ruang_perawatan','map_ruangid=ruang_id');
		$this->db->join('group_ruang','map_kamarid=grId');
		if(!empty($map_ruangid)) $this->db->where('map_ruangid', $map_ruangid);
		if(!empty($map_kelasid)) $this->db->where('map_kelasid', $map_kelasid);
		$this->db->group_by('map_kelasid');
		return $this->db->get('tb_ketersediaan')->result();
	}

	function getDatakemkes($map_kelasid="",$map_ruangid=""){
		$this->db->select("
			tipe_pasien,ruang_perawatan,kode_ruang,kelas_perawatan,total_TT,terpakai_male,terpakai_female,
(SELECT SUM(map_kapasitas) FROM tb_ketersediaan LEFT JOIN group_ruang ON map_kamarid=grId WHERE map_ruangid=tipe_pasien AND map_kelasid=kode_ruang AND map_penempatan='LK') AS kapasitas_male,
(SELECT SUM(map_kapasitas) FROM tb_ketersediaan LEFT JOIN group_ruang ON map_kamarid=grId WHERE map_ruangid=tipe_pasien AND map_kelasid=kode_ruang AND map_penempatan='PR') AS kapasitas_female, 
map_waiting AS waiting_list");
		if(!empty($map_ruangid)) $this->db->where('tipe_pasien', $map_ruangid);
		if(!empty($map_kelasid)) $this->db->where('kode_ruang', $map_kelasid);
		return $this->db->get('view_siranap_kemkes')->result();
	}

}
