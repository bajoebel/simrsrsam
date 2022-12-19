<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dpo_model extends CI_Model{
    function countDpo($q){
        return $this->db->like('nomr',$q)
        ->or_like('nama',$q)
        ->or_like('keterangan',$q)
        ->get('tbl01_dpo_rs')->num_rows();
    }
    function getDataDpo($start, $limit, $q){
        return $this->db->like('nomr',$q)
        ->or_like('nama',$q)
        ->or_like('keterangan',$q)
        ->limit($limit,$start)
        ->get('tbl01_dpo_rs')->result_array();
    }
    function editDpo($id){
        return $this->db->where('Id',$id)->get('tbl01_dpo_rs')->row();
    }
}