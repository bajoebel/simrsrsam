<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Erm_model extends CI_Model
{
    function getPendaftaran($idx)
    {
        return $this->db->where('idx', $idx)->get('tbl02_pendaftaran')->row();
    }

    function getPendaftaranList($nomr = "")
    {
        if ($nomr != "") {
            return $this->db->where('nomr', $nomr)->order_by("idx desc")->get('tbl02_pendaftaran')->result();
        } else {
            return $this->db->get('tbl02_pendaftaran')->result();
        }
    }

    function getPendaftaranListByTipe($nomr = "",$tipe="")
    {
        if ($nomr != "") {
            return $this->db->where(['nomr'=> $nomr,"jns_layanan"=>$tipe])->order_by("idx desc")->get('tbl02_pendaftaran')->result();
        } else {
            return $this->db->get('tbl02_pendaftaran')->result();
        }
    }

    function getPasien($nomr)
    {
        return $this->db->where('nomr', $nomr)->get('tbl01_pasien')->row();
    }
}
