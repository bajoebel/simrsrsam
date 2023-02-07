<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Apiresep_model extends CI_Model
{
    public function getPermintaanResep() {
        $ci = get_instance();
        $db2 = $ci->load->database('dberm', TRUE);
        // if (!empty($_POST['cari'])) {
        //     $db2->like("a.nama",$_POST['cari']);
        // }
        return $db2
            ->select("*")
            ->order_by("a.id","desc")
            ->get("rj_p_resep a")
            ->result();
    }

    public function getPermintaanResepById($id) {
        $ci = get_instance();
        $db2 = $ci->load->database('dberm', TRUE);
        return $db2
            ->select("*")
            ->where("a.id",$id)
            ->get("rj_p_resep a")
            ->result();
    }

    public function getPermintaanResepDetail($id) {
        $ci = get_instance();
        $db2 = $ci->load->database('dberm', TRUE);
        return $db2
            ->select("*")
            ->where("rj_p_resep_id",$id)
            ->get("rj_p_resep_detail")
            ->result();
    }

    public function updatePermintaanResep($id,$status) {
        $ci = get_instance();
        $db2 = $ci->load->database('dberm', TRUE);
        $data = [
            "status_form" => $status
        ];
        $db2
            ->select("*")
            ->where("a.id",$id)
            ->update("rj_p_resep a",$data);
        return $db2->affected_rows();
    }
  
}