<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rajal_model extends CI_Model
{
    // form persetujuan umum
    function insertSetujuUmum($data)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->insert("rj_setuju_umum", $data);
    }

    function getSetujuUmum($nomr)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->where('nomr', $nomr)
            ->order_by("id desc")
            ->get("rj_setuju_umum");
    }

    function getSetujuUmumById($idx, $id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->where(['id' => $id, "idx" => $idx])
            ->order_by("id desc")
            ->get("rj_setuju_umum")->row();
    }

    function deleteSetujuUmum($idx, $id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        $db2
            ->where(["idx" => $idx, "id" => $id])
            ->delete("rj_setuju_umum");
        return $this->db->affected_rows();
    }

    // form kajian awal medis
    function getAwalMedis($nomr, $idx)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->where(['idx' => $idx, "nomr" => $nomr])
            ->order_by("id desc")
            ->get("rj_awal_medis");
    }

    function insertAwalMedis($data)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->insert("rj_awal_medis", $data);
    }

    function deleteAwalMedis($idx, $id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        $db2
            ->where(["idx" => $idx, "id" => $id])
            ->delete("rj_awal_medis");
        return $this->db->affected_rows();
    }

    // form perkembangan pasien terintegrasi
    function getKembangPasien($nomr, $idx)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->where(['idx' => $idx, "nomr" => $nomr])
            ->order_by("id desc")
            ->get("rj_ppt");
    }

    function insertKembangPasien($data)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->insert("rj_ppt", $data);
    }

    function deleteKembangPasien($idx, $id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        $db2
            ->where(["idx" => $idx, "id" => $id])
            ->delete("rj_ppt");
        return $this->db->affected_rows();
    }

    // informasi edukasi pasien
    function getEdukasiPasien($nomr, $idx)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->where(['idx' => $idx, "nomr" => $nomr])
            ->order_by("id desc")
            ->get("rj_iep");
    }
}
