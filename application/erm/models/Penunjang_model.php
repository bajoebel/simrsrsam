<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Penunjang_model extends CI_Model
{
   public function insertHasilPenunjang($id,$hasil) {
        $db2 = $this->load->database("dberm",TRUE);
        $data = [
            "hasil" => $hasil
        ];
        $db2->where("id",$id)->update("rj_p_penunjang_detail",$data);
        return $db2->affected_rows();
   }

   public function updateStatusPermintaanPenunjang($id,$status) {
        $db2 = $this->load->database("dberm",TRUE);
        $data = [
            "status_form" => $status
        ];
        $db2->where("id",$id)->update("rj_p_penunjang",$data);
        return $db2->affected_rows();
   }
}