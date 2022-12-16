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

    function getSetujuUmumById($id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->where('id', $id)
            ->order_by("id desc")
            ->get("setuju_umum")->row();
    }
}
