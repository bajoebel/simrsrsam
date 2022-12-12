<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Ruang_pelayanan_model extends CI_Model{
    var $table = "tbl01_ruang";
    function __construct() {
        parent::__construct();
    }
    function get_data(){
        $rec = $this->db->get($this->table);
        return $rec;
    }
    function get_data_where($kondisi){
        $this->db->where($kondisi);
        $rec = $this->db->get($this->table);
        return $rec;
    }
    function query_data($sql){
        $rec = $this->db->query($sql);
        return $rec;
    }
    function add_data($params){
        $rec = $this->db->insert($this->table,$params);
        return $rec;
    }
    function add_datakamar($params)
    {
        $rec = $this->db->insert('tbl01_kamar', $params);
        return $rec;
    }
    function update_data($params,$kondisi){
        $this->db->where($kondisi);
        $rec = $this->db->update($this->table,$params);
        return $rec;
    }
    function update_datakamar($params, $kondisi)
    {
        $this->db->where($kondisi);
        $rec = $this->db->update('tbl01_kamar', $params);
        return $rec;
    }
    function delete_data($kondisi){
        $this->db->where($kondisi);
        $rec = $this->db->delete($this->table);
        return $rec;
    }
    function delete_datakamar($kondisi)
    {
        $this->db->where($kondisi);
        $rec = $this->db->delete('tbl01_kamar');
        return $rec;
    }
    function getKamar($ruangid){
        $this->db->where('id_ruang', $ruangid);
        return $this->db->get('tbl01_kamar')->result();
    }
    function getKamarById($idkamar){
        $this->db->where('id_kamar', $idkamar);
        return $this->db->get('tbl01_kamar')->row();
    }
    function getRuangKemkes(){
        return $this->db->get('tb_ruang_perawatan')->result_array();
    }
    function getKelasKemkes(){
        return $this->db->get('tb_kelas')->result_array();
    }
}

?>