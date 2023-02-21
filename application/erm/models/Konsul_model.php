
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Konsul_model extends CI_Model
{
    protected $table = "rj_konsul_internal";
    protected $id = "id";
    public function insertHasilKonsul($id,$data) {
        $db2 = $this->load->database("dberm",TRUE);
        $db2->where($this->id,$id)->update($this->table,$data);
        return $db2->affected_rows();
   }
   public function updateStatusKonsulInternal($id,$status) {
    $db2 = $this->load->database("dberm",TRUE);
    $data = [
        "status_form" => $status
    ];
    $db2->where($this->id,$id)->update($this->table,$data);
    return $db2->affected_rows();
}
}