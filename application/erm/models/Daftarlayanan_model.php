<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Daftarlayanan_model extends CI_Model
{
    function getPasien($nomr){
        if(strlen($nomr)==6){
            return $this->db->where('nomr',$nomr)->get('tbl01_pasien')->row();
        }else if(strlen($nomr)==13){
            return $this->db->where('no_bpjs',$nomr)->get('tbl01_pasien')->row();
        }else{
            return $this->db->where('no_ktp',$nomr)->get('tbl01_pasien')->row();
        }
    }
    function insertPermintaan($data){
        $this->db->insert('tbl02_permintaan_penunjang',$data);
        return $this->db->insert_id();
    }
    function insertDetailPermintaanPenunjang($data){
        $this->db->insert_batch('tbl02_permintaan_tindakan_penunjang',$data);
    }
    function insertPendaftaran($data){
        $this->db->insert('tbl02_pendaftaran',$data);
        return $this->db->insert_id();
    }
    function getVariabel($idjenispemeriksaan){
        return $this->db->where('id_pemeriksaan',$idjenispemeriksaan)
        ->get('tbl01_variabelpemeriksaan')->result();
    }
    function getPendaftaranById($idx){
        return $this->db->where('idx',$idx)->get('tbl02_pendaftaran')->row_array();
    }
    function getListPemeriksaan($idjenis){
        return $this->db->where('id_jenis_pemeriksaan',$idjenis)
        ->get('tbl01_pemeriksaan')->result();
    }
}