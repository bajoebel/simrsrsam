<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Antrian_model extends CI_Model
{
    function lastAntrian($kdlokasi=""){
        return $this->db->select("a.*,b.nomr,b.reg_unit,b.id_daftar,b.namaDokterJaga,b.tgl_masuk,b.no_ktp,b.nama_pasien,a.idx as idx_daftar")
            ->where("status_panggil",0)
            ->where("antrianruang",$kdlokasi)
            // ->where("tanggal",date('Y-m-d'))
            ->join("tbl02_pendaftaran b","a.id_daftar=b.id_daftar")
            ->get("tbl02_antrian a")
            ->row();
    }
    function getDokter($kdlokasi){
        return $this->db->where("antrianruang",$kdlokasi)
            // ->where("tanggal",date('Y-m-d'))
            ->join("tbl01_pegawai","antriandokter=NRP")
            ->group_by("antriandokter")
            ->get("tbl02_antrian")
            ->result();
    }
    function getJadwal($lokasi,$dokter,$hari){
        return $this->db->where("jadwal_dokter_id",$dokter)
        ->where("jadwal_poly_id",$lokasi)
        ->where("jadwal_hari",$hari)
        ->get("tbl02_jadwal_dokter")
        ->row();
    }
}