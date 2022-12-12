<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Level_model extends CI_Model
{
    public $table = 'tbl01_acc_level';
    public $key = 'tbl01_acc_level.idx';
    public $order = 'DESC';
    function __construct()
    {
        parent::__construct();
    }
    function getlevel()
    {
        $this->db->order_by($this->key, $this->order);
        return $this->db->get($this->table)->result();
    }
    function getlevellimit($limit, $start = 0, $q = NULL) {
        $this->db->select("*,tbl01_acc_level.idx as idx");
        $this->db->order_by($this->key, $this->order);
        $this->db->join('tbl01_acc_modul','tbl01_acc_level.id_modul=tbl01_acc_modul.idx');
       $this->db->like('level', $q);
                $this->db->or_like('nama_modul', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    function getMenu($modul){
        $this->db->select("a.`idx`,a.`judul_menu`,a.`kode`,SUBSTRING_INDEX(a.`kode`, '.', 1) AS index_menu,
        SUBSTRING_INDEX(a.`kode`, '.', -1) AS sub_index_menu ,a.`file_index`,a.`file_kontrol`,a.`aksi`,a.id_modul");
        $this->db->where('id_modul',$modul);
        $this->db->order_by("CONVERT(SUBSTRING_INDEX(a.`kode`, '.', 1),UNSIGNED INTEGER) , CONVERT(SUBSTRING_INDEX(a.`kode`, '.', -1),UNSIGNED INTEGER)");
        return $this->db->get('tbl01_acc_menu a')->result();
    }
    function getModul(){
        return $this->db->get('tbl01_acc_modul')->result();
    }
    function getHakAkses($level,$modulid,$menuid){
        $this->db->where('idlevel',$level);
        $this->db->where('idmodul',$modulid);
        $this->db->where('idmenu',$menuid);
        return $this->db->get('tbl01_acc_hakakses')->row();
    }
    function removeHakAkses($level,$modulid,$menuid){
        $this->db->where('idlevel',$level);
        $this->db->where('idmodul',$modulid);
        $this->db->where('idmenu',$menuid);
        return $this->db->delete('tbl01_acc_hakakses');
    }
    function countlevel($q = NULL) {
        
        $this->db->or_like('level', $q);
        $this->db->or_like('nama_modul', $q);
        $this->db->join('tbl01_acc_modul','tbl01_acc_level.id_modul=tbl01_acc_modul.idx');
        return $this->db->get($this->table)->num_rows();
    }
    public function insertlevel($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function deletelevel($id)
    {
        $this->db->where($this->key, $id);
        $this->db->delete($this->table);
    }
    public function getlevel_by_id($id){
        $this->db->where($this->key,$id);
        return $this->db->get($this->table)->row();
    }
    function updatelevel($data,$id){
        $this->db->where($this->key, $id);
        $this->db->update($this->table, $data);
    }
    function getAksi($kode)
    {
        $this->db->where('kode', $kode);
        return $this->db->get('actions')->row_array();
    }
}