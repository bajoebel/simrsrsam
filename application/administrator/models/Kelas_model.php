<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Kelas_model extends CI_Model{
    var $table = "tbl01_kelas_layanan";
    function __construct() {
        parent::__construct();
    }
    function get_data(){
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
    function update_data($params,$kondisi){
        $this->db->where($kondisi);
        $rec = $this->db->update($this->table,$params);
        return $rec;
    }
    function delete_data($kondisi){
        $this->db->where($kondisi);
        $rec = $this->db->delete($this->table);
        return $rec;
    }
}

?>