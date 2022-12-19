<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rajal_model extends CI_Model
{
    function insertSetujuUmum($data)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->insert("setuju_umum", $data);
    }

    function getSetujuUmum($nomr)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->where('nomr', $nomr)
            ->order_by("id desc")
            ->get("setuju_umum");
    }

    function getSetujuUmumById($idx, $id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->where(['id' => $id, "idx" => $idx])
            ->order_by("id desc")
            ->get("setuju_umum")->row();
    }

    function deleteSetujuUmum($idx, $id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        $db2
            ->where(["idx" => $idx, "id" => $id])
            ->delete("setuju_umum");
        return $this->db->affected_rows();
    }
}
