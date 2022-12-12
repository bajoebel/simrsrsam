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
		$this->db->group_by('id_ruang,idkelas_display');
		return $this->db->get('tbl01_kamar')->num_rows();
	}
	function getKetersediaan($limit=null, $start=0){
		$this->db->select("id_ruang AS jenis_id, nama_ruang AS jenis_ruangan,idkelas_display  AS kelas_id,
		kelas_display AS  kelas_perawatan, SUM(jml_tt) AS total_TT, SUM(terisi_pr) AS terpakai_female, SUM(terisi_lk) AS terpakai_male,
		SUM(jml_tt) - SUM(terisi_pr) - SUM(terisi_lk) AS kosong, '0' AS waiting");
		$this->db->group_by('id_ruang, idkelas_display');
		if(!empty($limit)) $this->db->limit($limit,$start);
		return $this->db->get('tbl01_kamar')->result();
	}
	function getSetting(){
		return $this->db->get('tb_setting')->row();
	}
	function getRuangan(){

	}
	function getMonitoring(){
		$kelas = $this->getKelas()->result();
		$jmlkelas = $this->getMaxKelas();
		foreach ($kelas as $k ) {
			$header[]=array('kode'=> str_replace(' ','_',strtolower($k->kelas_display)),'alias'=>$k->kelas_display);
			$field[]="SUM(CASE WHEN `idkelas_display` = '".$k->idkelas_display."' THEN a.`jml_tt` ELSE 0 END) AS `jml_tt_".str_replace(' ','_',strtolower($k->kelas_display))."`";
			$field[]="SUM(CASE WHEN `idkelas_display` = '".$k->idkelas_display."' THEN IFNULL(b.`terisi_lk`,0) ELSE 0 END) AS `tlk_".str_replace(' ','_',strtolower($k->kelas_display))."`";
			$field[]="SUM(CASE WHEN `idkelas_display` = '".$k->idkelas_display. "' THEN IFNULL(b.`terisi_pr`,0) ELSE 0 END) AS `tpr_".str_replace(' ','_',strtolower($k->kelas_display))."`";
		}
		$pivot=implode(',',$field);
		$this->db->select("
			a.`id_ruang`,
			a.`nama_ruang`,
			SUM(a.`jml_tt`) AS jml_tt,$pivot
		");
		$this->db->join('view_bedterisi b','a.id_kamar=b.id_kamar','LEFT');
		$this->db->group_by('id_ruang');
		$this->db->where('status_kamar',1);
		$this->db->where('status_publish',1);
		return array('kelas'=>$header,'jmlkelas'=>$jmlkelas,'ruang'=>$this->db->get('tbl01_kamar a')->result());
	}

	function getMonitoringAll(){
		$kelas = $this->getKelas()->result();
		$jmlkelas = $this->getMaxKelas();
		foreach ($kelas as $k ) {
			$header[]=array('kode'=> str_replace(' ','_',strtolower($k->kelas_display)),'alias'=>$k->kelas_display);
			$field[]="SUM(CASE WHEN `idkelas_display` = '".$k->idkelas_display."' THEN a.`jml_tt` ELSE 0 END) AS `jml_tt_".str_replace(' ','_',strtolower($k->kelas_display))."`";
			$field[]="SUM(CASE WHEN `idkelas_display` = '".$k->idkelas_display."' THEN IFNULL(b.`terisi_lk`,0) ELSE 0 END) AS `tlk_".str_replace(' ','_',strtolower($k->kelas_display))."`";
			$field[]="SUM(CASE WHEN `idkelas_display` = '".$k->idkelas_display. "' THEN IFNULL(b.`terisi_pr`,0) ELSE 0 END) AS `tpr_".str_replace(' ','_',strtolower($k->kelas_display))."`";
		}
		$pivot=implode(',',$field);
		$this->db->select("
			a.`id_ruang`,
			a.`nama_ruang`,
			SUM(a.`jml_tt`) AS jml_tt,$pivot
		");
		$this->db->join('view_bedterisi b','a.id_kamar=b.id_kamar','LEFT');
		$this->db->group_by('id_ruang');
		$this->db->where('status_kamar',1);
		return array('kelas'=>$header,'jmlkelas'=>$jmlkelas,'ruang'=>$this->db->get('tbl01_kamar a')->result());
	}

	function getKelas(){
		$this->db->select('idkelas_display,kelas_display');
		$this->db->where('status_kamar',1);
		$this->db->group_by('idkelas_display');
		return $this->db->get('tbl01_kamar');
	}

	function getMaxKelas(){
		return $this->db->query("SELECT MAX(`jml_kelas`) AS max_kelas FROM (
			SELECT `id_ruang`,`nama_ruang`,COUNT(DISTINCT(`idkelas_display`)) AS jml_kelas,`idkelas_display`,`kelas_display` FROM `tbl01_kamar` GROUP BY `id_ruang`) AS temp ")->row()->max_kelas;
		
	}
}
