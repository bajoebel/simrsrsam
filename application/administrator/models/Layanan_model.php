<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Layanan_model extends CI_Model
{
    public $table = 'tbl01_layanan';
    public $key = 'idx';
    public $order = 'DESC';
    function __construct()
    {
        parent::__construct();
    }
    function getLayanan()
    {
        $this->db->order_by($this->key, $this->order);
        return $this->db->get($this->table)->result();
    }
    function getLayananlimit($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->key, $this->order);
        $this->db->like('idx', $q);
                $this->db->or_like('layanan', $q);
                $this->db->or_like('kategori_tarif', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    function getKategori(){
        return $this->db->get('tbl01_kategori_tarif')->result();
    }
    function countLayanan($q = NULL) {
        
        $this->db->like('idx', $q);
        $this->db->or_like('layanan', $q);
        $this->db->or_like('kategori_tarif', $q);
        return $this->db->get($this->table)->num_rows();
    }
    public function insertLayanan($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function deleteLayanan($id)
    {
        $this->db->where($this->key, $id);
        $this->db->delete($this->table);
    }
    public function getLayanan_by_id($id){
        $this->db->where($this->key,$id);
        return $this->db->get($this->table)->row();
    }
    function updateLayanan($data,$id){
        $this->db->where($this->key, $id);
        $this->db->update($this->table, $data);
    }

    /** Resep Obat */
}