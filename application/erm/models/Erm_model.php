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

    function getPermintaan() {
        $cari = $this->input->post("cari");
        $tglAwal = $this->input->post("tglAwal");
        $tglAkhir = $this->input->post("tglAkhir");
        $grRuang = $this->session->userdata('grRuang');


        $this->datatables->set_database("dberm");
        $this->datatables->select('id,idx,id_daftar,reg_unit,created_at,nomr,nama,ringkasan_tindakan,group_name,dpjp_name,status_form');
        if ($this->input->post("cari")!="") {
            $this->datatables->like("nama",$this->input->post("cari"));
            $this->datatables->or_like("reg_unit",$this->input->post("cari"));
            $this->datatables->or_like("id_daftar",$this->input->post("cari"));
        }
        $this->datatables->where("grId",$grRuang);
        $this->datatables->where(["DATE_FORMAT(`created_at`,'%Y-%m-%d') >="=>$tglAwal,"DATE_FORMAT(`created_at`,'%Y-%m-%d') <="=>$tglAkhir]);
        $this->datatables->from('rj_p_penunjang');
        $this->datatables->add_column('view', '
            <button onclick="detailPermintaan($1,$2)" class="btn btn-success btn-sm"><span class="fa fa-check"></span> Detail</button>
        ',"idx,id");
        $this->datatables->unset_column("idx");
        return $this->datatables->generate();
    }

    function getKonsul() {
        $cari = $this->input->post("cari");
        $tglAwal = $this->input->post("tglAwal");
        $tglAkhir = $this->input->post("tglAkhir");
        $grId = $this->session->userdata("kdlokasi");


        $this->datatables->set_database("dberm");
        $this->datatables->select("id,idx,id_daftar,reg_unit,created_at,nomr,nama,konsul_harap,unit_minta,dpjp_minta,status_form");
        if ($this->input->post("cari")!="") {
            $this->datatables->like("nama",$this->input->post("cari"));
            $this->datatables->or_like("reg_unit",$this->input->post("cari"));
            $this->datatables->or_like("id_daftar",$this->input->post("cari"));
        }
        $this->datatables->where(["DATE_FORMAT(`created_at`,'%Y-%m-%d') >="=>$tglAwal,"DATE_FORMAT(`created_at`,'%Y-%m-%d') <="=>$tglAkhir]);
        $this->datatables->where("unit_diminta_id",$grId);
        $this->datatables->from("rj_konsul_internal");
        $this->datatables->add_column('view', '
            <button onclick="detailKonsul($1,$2)" class="btn btn-success btn-sm"><span class="fa fa-check"></span> Detail</button>
        ',"idx,id");
        $this->datatables->unset_column("idx");
        return $this->datatables->generate();
    }

    function getDaftar() {
        $cari = $this->input->post("cari");
        $tglAwal = $this->input->post("tglAwal");
        $tglAkhir = $this->input->post("tglAkhir");
        $grId = $this->session->userdata("kdlokasi");


        // $this->datatables->set_database("dberm");
        $this->datatables->select("idx,id_daftar,reg_unit,tgl_masuk,nomr,nama_pasien,tgl_lahir,jns_kelamin,namaDokterJaga,nama_ruang,cara_bayar,status_pasien,status_erm,id_ruang");
        if ($this->input->post("cari")!="") {
            $this->db->group_start();
            $this->datatables->like("nama_pasien",$this->input->post("cari"));
            // $this->datatables->or_like("reg_unit",$this->input->post("cari"));
            $this->datatables->or_like("nomr",$this->input->post("cari"));
            $this->datatables->or_like("id_daftar",$this->input->post("cari"));
            $this->db->group_end();
        }
        $this->datatables->where(["DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') >="=>$tglAwal,"DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <="=>$tglAkhir]);
        $this->datatables->where("id_ruang",$grId);
        $this->datatables->from("tbl02_pendaftaran");
        $this->datatables->add_column('view', '
            <button onclick="pilihPasien($1)" class="btn btn-danger btn-sm"><span class="fa fa-search"></span> Detail</button>
        ',"idx");
        $this->datatables->unset_column("idx");
        return $this->datatables->generate();
    }
    
}
