<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Erm_model extends CI_Model
{
    function getPendaftaran($idx){
        return $this->db->where('idx',$idx)->get('tbl02_pendaftaran')->row();
    }
    function getPasien($nomr){
        return $this->db->where('nomr',$nomr)->get('tbl01_pasien')->row();
    }
}