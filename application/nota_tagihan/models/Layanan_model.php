<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Layanan_model extends CI_Model
{
    //Mengambil data level nanti akan digunakan ketika membuat halaman untukmenampilkan data
    function getData($limit, $start, $q, $ruang_id,$jns_layanan="RJ",$where)
    {
        $this->db->where($where);
        if($jns_layanan !="GD") $this->db->where('id_ruang', $ruang_id);
        //echo $jns_layanan;exit;
        $this->db->where('jns_layanan',$jns_layanan);
        if($jns_layanan=="RI"){
            /*$kondisi= " (reg_unit NOT IN (SELECT a.reg_unit FROM tbl02_pendaftaran_batal a)
            AND reg_unit NOT IN (SELECT b.reg_unit FROM tbl02_pindah_ranap b WHERE b.ruang_pengirim !=b.id_ruang AND b.idx NOT IN(SELECT id_pindah_ranap FROM tbl02_pindah_ranap_response))
            AND reg_unit NOT IN (SELECT c.reg_unit FROM tbl02_pasien_pulang c))
            ";*/
            //$kondisi=" (status_pasien=1 OR status_pasien=3) "; // Cek status aktif atau pindah yang belum di konfirmasi
            //$this->db->where($kondisi);
        }else{
            //$kondisi = " reg_unit NOT IN (SELECT a.reg_unit FROM tbl02_pendaftaran_batal a)";
            //$kondisi = "( status_pasien !=6)"; //Pasien Belum dibatalkan
            //$this->db->where($kondisi);
        }
        $this->db->group_start();
        $this->db->like('nomr', $q);
        $this->db->or_like('id_daftar', $q);
        $this->db->or_like('reg_unit', $q);
        $this->db->or_like('nama_pasien', $q);
        $this->db->or_like('nama_kamar', $q);
        $this->db->group_end();
        $this->db->order_by('tgl_masuk','desc');
        $this->db->limit($limit, $start);
        return $this->db->get('tbl02_pendaftaran')->result();
    }
    
    //Mengambil data level nanti akan digunakan menghitung total seluruh data yang ada di database level
    function countData($q,$ruang_id,$jns_layanan="RJ",$where)
    {
        $this->db->where($where);
        if ($jns_layanan != "GD") $this->db->where('id_ruang', $ruang_id);
        $this->db->where('jns_layanan', $jns_layanan);
        if ($jns_layanan == "RI") {
            /*$kondisi= " (reg_unit NOT IN (SELECT a.reg_unit FROM tbl02_pendaftaran_batal a)
            AND reg_unit NOT IN (SELECT b.reg_unit FROM tbl02_pindah_ranap b WHERE b.ruang_pengirim !=b.id_ruang AND b.idx NOT IN(SELECT id_pindah_ranap FROM tbl02_pindah_ranap_response))
            AND reg_unit NOT IN (SELECT c.reg_unit FROM tbl02_pasien_pulang c))
            ";*/
            //$kondisi = " (status_pasien=1 OR status_pasien=3) "; // Cek status aktif atau pindah yang belum di konfirmasi
            //$this->db->where($kondisi);
        } else {
            //$kondisi = " reg_unit NOT IN (SELECT a.reg_unit FROM tbl02_pendaftaran_batal a)";
            //$kondisi = "( status_pasien !=6)"; //Pasien Belum dibatalkan
            //$this->db->where($kondisi);
        }
        $this->db->group_start();
        $this->db->like('nomr', $q);
        $this->db->or_like('id_daftar', $q);
        $this->db->or_like('reg_unit', $q);
        $this->db->or_like('nama_pasien', $q);
        $this->db->or_like('nama_kamar', $q);
        $this->db->group_end();
        return $this->db->get('tbl02_pendaftaran')->num_rows();
    }

    function getDataPermintaan($limit, $start, $q, $ruang_id, $jns_layanan = "RJ", $where)
    {
        
        if ($jns_layanan == "RI") {
            $this->db->where($where);
            $this->db->where('id_ruang', $ruang_id);
            $kondisi = " (idx NOT IN (SELECT a.id_pindah_ranap FROM tbl02_pindah_ranap_batal a)
            AND idx NOT IN (SELECT b.id_pindah_ranap FROM tbl02_pindah_ranap_response b))";
            $this->db->where($kondisi);
            $this->db->group_start();
            $this->db->like('nomr', $q);
            $this->db->or_like('id_daftar', $q);
            $this->db->or_like('reg_unit', $q);
            $this->db->or_like('nama_pasien', $q);
            $this->db->or_like('nama_ruang_pengirim', $q);
            $this->db->group_end();
            $this->db->order_by('tgl_minta', 'desc');
            $this->db->limit($limit, $start);
            return $this->db->get('tbl02_pindah_ranap')->result();
        } elseif($jns_layanan == "RJ"){
            $this->db->select("*,id_poli as id_ruang,nama_poli as nama_ruang");
            $this->db->where($where);
            $this->db->where('id_poli', $ruang_id);
            $kondisi = " (idx NOT IN (SELECT a.id_rujuk_internal FROM tbl02_rujuk_internal_batal a)
            AND idx NOT IN (SELECT b.id_rujuk_internal FROM tbl02_rujuk_internal_response b))";
            $this->db->where($kondisi);
            $this->db->group_start();
            $this->db->like('nomr', $q);
            $this->db->or_like('id_daftar', $q);
            $this->db->or_like('reg_unit', $q);
            $this->db->or_like('nama_pasien', $q);
            $this->db->or_like('nama_ruang_pengirim', $q);
            $this->db->group_end();
            $this->db->order_by('tgl_minta', 'desc');
            $this->db->limit($limit, $start);
            return $this->db->get('tbl02_rujuk_internal')->result();
        }elseif($jns_layanan="PJ"){
            $this->db->select("*,id_penunjang as id_ruang,nama_penunjang as nama_ruang");
            $this->db->where($where);
            $this->db->where('id_penunjang', $ruang_id);
            $kondisi = " (idx NOT IN (SELECT a.id_permintaan_penunjang FROM tbl02_permintaan_penunjang_batal a)
            AND idx NOT IN (SELECT b.id_permintaan_penunjang FROM tbl02_permintaan_penunjang_response b))";
            $this->db->where($kondisi);
            $this->db->group_start();
            $this->db->like('nomr', $q);
            $this->db->or_like('id_daftar', $q);
            $this->db->or_like('reg_unit', $q);
            $this->db->or_like('nama_pasien', $q);
            $this->db->or_like('nama_ruang_pengirim', $q);
            $this->db->group_end();
            $this->db->order_by('tgl_minta', 'desc');
            $this->db->limit($limit, $start);
            return $this->db->get('tbl02_permintaan_penunjang')->result();
        }
        
    }

    function countDataPermintaan($q, $ruang_id, $jns_layanan = "RJ", $where)
    {

        if ($jns_layanan == "RI") {
            $this->db->where($where);
            $this->db->where('id_ruang', $ruang_id);
            $kondisi = " (idx NOT IN (SELECT a.id_pindah_ranap FROM tbl02_pindah_ranap_batal a)
            AND idx NOT IN (SELECT b.id_pindah_ranap FROM tbl02_pindah_ranap_response b))";
            $this->db->where($kondisi);
            $this->db->group_start();
            $this->db->like('nomr', $q);
            $this->db->or_like('id_daftar', $q);
            $this->db->or_like('reg_unit', $q);
            $this->db->or_like('nama_pasien', $q);
            $this->db->or_like('nama_ruang_pengirim', $q);
            $this->db->group_end();
            return $this->db->get('tbl02_pindah_ranap')->num_rows();
        }
    }

    function getDataRiwayatPindah($limit, $start, $q, $ruang_id, $where)
    {
        $this->db->select("a.*,(CASE WHEN (b.idx IS NOT NULL) THEN 1 ELSE 0 END) AS `status_pindah`");
        $this->db->where($where);
        $this->db->where('a.ruang_pengirim', $ruang_id);
        $kondisi = " (a.idx NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))";
        $this->db->where($kondisi);
        $this->db->join('tbl02_pindah_ranap_response b','a.idx=b.id_pindah_ranap','LEFT');
        $this->db->group_start();
        $this->db->like('a.nomr', $q);
        $this->db->or_like('a.id_daftar', $q);
        $this->db->or_like('a.reg_unit', $q);
        $this->db->or_like('a.nama_pasien', $q);
        $this->db->or_like('a.nama_ruang_pengirim', $q);
        $this->db->group_end();
        $this->db->order_by('tgl_minta', 'desc');
        $this->db->limit($limit, $start);
        return $this->db->get('tbl02_pindah_ranap a')->result();
    }

    function countDataRiwayatPindah($q, $ruang_id,$where) {
        //$this->db->select("a.*,");
        $this->db->where($where);
        $this->db->where('a.ruang_pengirim', $ruang_id);
        $kondisi = " (a.idx NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))";
        $this->db->where($kondisi);
        $this->db->join('tbl02_pindah_ranap_response b', 'a.idx=b.id_pindah_ranap', 'LEFT');
        $this->db->group_start();
        $this->db->like('a.nomr', $q);
        $this->db->or_like('a.id_daftar', $q);
        $this->db->or_like('a.reg_unit', $q);
        $this->db->or_like('a.nama_pasien', $q);
        $this->db->or_like('a.nama_ruang_pengirim', $q);
        $this->db->group_end();
        $this->db->order_by('a.tgl_minta', 'desc');
        return $this->db->get('tbl02_pindah_ranap a')->num_rows();
    }

    function getDataRiwayatPulang($limit, $start, $q, $ruang_id, $where)
    {
        //$this->db->select("a.*,(CASE WHEN (b.idx IS NOT NULL) THEN 1 ELSE 0 END) AS `status_pindah`");
        $this->db->where($where);
        $this->db->where('a.id_ruang', $ruang_id);
        $kondisi = " (a.idx NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))";
        $this->db->where($kondisi);
        $this->db->group_start();
        $this->db->like('a.nomr', $q);
        $this->db->or_like('a.id_daftar', $q);
        $this->db->or_like('a.reg_unit', $q);
        $this->db->or_like('a.nama_pasien', $q);
        $this->db->or_like('a.cara_keluar', $q);
        $this->db->or_like('a.keadaan_keluar', $q);
        $this->db->group_end();
        $this->db->order_by('tgl_keluar', 'desc');
        $this->db->limit($limit, $start);
        return $this->db->get('tbl02_pasien_pulang a')->result();
    }

    function countDataRiwayatPulang($q, $ruang_id, $where)
    {
        //$this->db->select("a.*,");
        $this->db->where($where);
        $this->db->where('a.id_ruang', $ruang_id);
        $kondisi = " (a.idx NOT IN (SELECT c.id_pindah_ranap FROM tbl02_pindah_ranap_batal c))";
        $this->db->where($kondisi);
        $this->db->group_start();
        $this->db->like('a.nomr', $q);
        $this->db->or_like('a.id_daftar', $q);
        $this->db->or_like('a.reg_unit', $q);
        $this->db->or_like('a.nama_pasien', $q);
        $this->db->or_like('a.cara_keluar', $q);
        $this->db->or_like('a.keadaan_keluar', $q);
        $this->db->group_end();
        $this->db->order_by('a.tgl_keluar', 'desc');
        return $this->db->get('tbl02_pasien_pulang a')->num_rows();
    }
    function cekKepulangan($id_daftar,$jns_layanan){
        $this->db->where('a.id_daftar',$id_daftar);
        $this->db->where('a.jns_layanan',$jns_layanan);
        return $this->db->get('tbl02_pasien_pulang a')->num_rows();
    }
    function getRuang($kondisi){
        $this->db->where($kondisi);
        return $this->db->get('tbl01_ruang');
    }
    function getKamar($kondisi)
    {
        $this->db->where($kondisi);
        return $this->db->get('tbl01_kamar');
    }
    function getDokter($kondisi=array()){
        if(!empty($kondisi)) $this->db->where($kondisi);
        $this->db->join('tbl01_pegawai', 'tbl01_pegawai.NRP=tbl01_dokter.NRP');
        return $this->db->get('tbl01_dokter');
    }
    function getTarif($param, $jns_layanan, $id_ruang, $kelas_id, $all = 0){
        if (!empty($jns_layanan)) {
            if ($jns_layanan == "PJ") $this->db->where_in('jns_layanan', array('PJ', 'RJ', 'RI'));
            else $this->db->where('jns_layanan', $jns_layanan);
        }
        if ($all == 0) {
            $this->db->group_start();
            if ($jns_layanan != "PJ")  $this->db->where('idruang', '0');
            if (!empty($id_ruang)) $this->db->or_where('idruang', $id_ruang);
            $this->db->group_end();
        }
        $this->db->group_start();
        $this->db->where('kelas_id', '0');
        if (!empty($kelas_id)) $this->db->or_where('kelas_id', $kelas_id);
        $this->db->group_end();
        $this->db->group_start();
        $this->db->like('layanan', $param);
        $this->db->or_like('kategori_tarif', $param);
        $this->db->or_like('kelas_layanan', $param);
        $this->db->group_end();
        $this->db->join('tbl01_tarif_layanan', 'tbl01_tarif_layanan.idx=tbl01_tarif_ruang.idtarif');
        $this->db->order_by("FIELD(kelas_id,'1','2','3','4','5') DESC");
        return $this->db->get('tbl01_tarif_ruang')->result();
    }
    function getTarif1($limit = 0, $start = 0, $q, $jns_layanan, $id_ruang, $kelas_id, $all = 0)
    {
        if (!empty($jns_layanan)) {
            if ($jns_layanan == "PJ") $this->db->where_in('jns_layanan', array('PJ', 'RJ', 'RI'));
            else $this->db->where('jns_layanan', $jns_layanan);
        }

        if ($all == 0) {
            $this->db->group_start();
            if ($jns_layanan != "PJ")  $this->db->where('idruang', '0');
            if (!empty($id_ruang)) $this->db->or_where('idruang', $id_ruang);
            $this->db->group_end();
        }
        $this->db->group_start();
        $this->db->where('kelas_id', '0');
        if (!empty($kelas_id)) $this->db->or_where('kelas_id', $kelas_id);
        $this->db->group_end();
        $this->db->group_start();
        $this->db->like('layanan', $q);
        $this->db->or_like('kategori_tarif', $q);
        $this->db->group_end();
        $this->db->join('tbl01_tarif_layanan', 'tbl01_tarif_layanan.idx=tbl01_tarif_ruang.idtarif');
        $this->db->order_by("FIELD(kelas_id,'1','2','3','4','5') DESC");
        if ($limit > 0) $this->db->limit($limit, $start);
        return $this->db->get('tbl01_tarif_ruang');
    }
}