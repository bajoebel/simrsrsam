<?php
class Riwayat_model extends CI_Model{
    function getRegistrasi($page,$limit=10,$dari,$sampai,$jnslayanan,$id_ruang,$jnspasien,$keyword){
        if($page==1) $start=0;
        else $start=($page * $limit)-$limit;
        $this->db->select("a.`nomr`,a.`nama_pasien`,a.`id_daftar`,a.reg_unit,a.`tgl_masuk`,a.`nama_ruang`,
        a.`namaDokterJaga`,a.`cara_bayar`,a.`no_bpjs`,a.`jns_layanan`,a.`status_pasien`,
        (CASE WHEN a.status_pasien = 6 THEN CONCAT('batal<br>',(SELECT tgl_created FROM `tbl02_pendaftaran_batal` b WHERE b.`reg_unit`=a.`reg_unit`)) ELSE 'Active' END) AS status_daftar,
        (CASE WHEN(DATE_FORMAT(tgl_masuk,'%Y-%m-%d')=a.`tgl_daftar`) THEN 'Pasien Baru' ELSE 'Pasien Lama' END) AS jns_pasien,user_daftar,
        (CASE WHEN SUBSTR(user_daftar,1,3)='NRP' THEN (SELECT pgwNama FROM tbl01_pegawai WHERE NRP=a.`user_daftar`) ELSE user_daftar END)  AS pgwNama");
        $this->db->where("jns_layanan",$jnslayanan);
        if(!empty($id_ruang)) $this->db->where("id_ruang",$id_ruang);
        if(!empty($dari)) $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d') >=",$dari);
        if(!empty($sampai)) $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d') <=",$sampai);
        if(!empty($jnspasien)){
            if($jnspasien=="baru") $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d')=tgl_daftar");
            else $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d')!=tgl_daftar");
        }
        $this->db->group_start();
        $this->db->like('nomr',$keyword);
        $this->db->or_like('nama_pasien',$keyword);
        $this->db->or_like('id_daftar',$keyword);
        $this->db->or_like('reg_unit',$keyword);
        $this->db->or_like('nama_ruang',$keyword);
        $this->db->or_like('namaDokterJaga',$keyword);
        $this->db->or_like('cara_bayar',$keyword);
        $this->db->or_like('no_bpjs',$keyword);
        $this->db->group_end();
        $this->db->limit($limit,$start);
        return $this->db->get("tbl02_pendaftaran a")->result();
    }
    function getRegistrasiAll($dari,$sampai,$jnslayanan,$id_ruang,$jnspasien){
        $this->db->select("a.`nomr`,a.`nama_pasien`,a.`id_daftar`,a.reg_unit,a.`tgl_masuk`,a.`nama_ruang`,
        a.`namaDokterJaga`,a.`cara_bayar`,a.`no_bpjs`,a.`jns_layanan`,a.`status_pasien`,
        (CASE WHEN a.status_pasien = 6 THEN CONCAT('batal<br>',(SELECT tgl_created FROM `tbl02_pendaftaran_batal` b WHERE b.`reg_unit`=a.`reg_unit`)) ELSE 'Active' END) AS status_daftar,
        (CASE WHEN(DATE_FORMAT(tgl_masuk,'%Y-%m-%d')=a.`tgl_daftar`) THEN 'Pasien Baru' ELSE 'Pasien Lama' END) AS jns_pasien,user_daftar,
        (CASE WHEN SUBSTR(user_daftar,1,3)='NRP' THEN (SELECT pgwNama FROM tbl01_pegawai WHERE NRP=a.`user_daftar`) ELSE user_daftar END)  AS pgwNama");
        $this->db->where("jns_layanan",$jnslayanan);
        if(!empty($id_ruang)) $this->db->where("id_ruang",$id_ruang);
        if(!empty($dari)) $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d') >=",$dari);
        if(!empty($sampai)) $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d') <=",$sampai);
        if(!empty($jnspasien)){
            if($jnspasien=="baru") $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d')=tgl_daftar");
            else $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d')!=tgl_daftar");
        }
        return $this->db->get("tbl02_pendaftaran a")->result();
    }
    function countRegistrasi($dari,$sampai,$jnslayanan,$id_ruang,$jnspasien,$keyword){
        $this->db->select("count(idx) as jmldata");
        $this->db->where("jns_layanan",$jnslayanan);
        if(!empty($id_ruang)) $this->db->where("id_ruang",$id_ruang);
        if(!empty($dari)) $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d') >=",$dari);
        if(!empty($sampai)) $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d') <=",$sampai);
        if(!empty($jnspasien)){
            if($jnspasien=="baru") $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d')=tgl_daftar");
            else $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d')!=tgl_daftar");
        }
        $this->db->group_start();
        $this->db->like('nomr',$keyword);
        $this->db->or_like('nama_pasien',$keyword);
        $this->db->or_like('id_daftar',$keyword);
        $this->db->or_like('reg_unit',$keyword);
        $this->db->or_like('nama_ruang',$keyword);
        $this->db->or_like('namaDokterJaga',$keyword);
        $this->db->or_like('cara_bayar',$keyword);
        $this->db->or_like('no_bpjs',$keyword);
        $this->db->group_end();
        $data= $this->db->get("tbl02_pendaftaran a")->row();
        return $data->jmldata;
    }
}