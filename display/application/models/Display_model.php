<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
        
    }
	public function ketersediaan_kamar($group='bed_jenisid',$limit=0,$start=0)
	{
		$this->db->select('jenis_ruangan,ruang_nama,kelas_nama,
			SUM(ruang_kapasitas_lk) AS kapasitas_pria,
			SUM(ruang_kapasitas_pr) AS kapasitas_wanita,
			SUM(ruang_kapasitas_lkpr) AS kapasitas_priawanita,
			SUM(ruang_kapasitas_rusak) AS bed_rusak, 
			SUM(bed_lkterisi) as terisi_pria,
			SUM(bed_prterisi) as terisi_wanita,
			SUM(bed_lkprterisi) as terisi_priawanita');
		$this->db->join('tb_jenisruang','bed_jenisid=jenis_id');
		$this->db->join('tb_ruang', 'bed_ruangid=ruang_id');
		$this->db->join('tb_kelas','bed_kelasid=kelas_id');
		$this->db->group_by('kelas_id');
		if(!empty($group)) $this->db->group_by($group);
		$this->db->order_by('jenis_id');
		$this->db->order_by('kelas_id');
		if(!empty($limit)) $this->db->limit($limit,$start);
		return $this->db->get('tb_ketersediaan')->result();
	}
	function jmlData(){
		
		return $this->db->get('view_ketersediaan_rsud')->num_rows();
	}
	function getKetersediaan($limit=null, $start=0){
		$this->db->select('*');
		if(!empty($limit)) $this->db->limit($limit,$start);
		return $this->db->get('view_ketersediaan_rsud')->result();
	}
	function getSetting(){
		return $this->db->get('tb_setting')->row();
	}
	function getRuangan(){

	}
	function getMonitoring(){
		return $this->db->get('view_monitoring')->result();
	}
}
