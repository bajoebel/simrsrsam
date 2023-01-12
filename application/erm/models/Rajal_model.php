<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rajal_model extends CI_Model
{

    // form masuk rajal
    function masukRajal($nomr, $idx) {
        return $this->db->where(['nomr'=> $nomr,"idx"=>$idx])->order_by("idx desc")->get('tbl02_pendaftaran')->result();
    }
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

    function getSetujuUmumByIdx($idx)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->where(["idx" => $idx])
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

    // form kajian awal keperawatan
    function insertAwalRawat($data)
    {
        $db2 = $this->load->database('dberm', TRUE);
        $idx = $data['idx'];
        $nomr = $data['nomr'];
        $cek = $db2->where(['idx' => $idx, 'nomr' => $nomr])->get("rj_awal_rawat")->num_rows();
        if ($cek > 0) {
            unset($data["idx"]);
            unset($data["nomr"]);
            return $db2->where(['idx' => $idx, 'nomr' => $nomr])->update("rj_awal_rawat", $data);
        } else {
            return $db2->insert("rj_awal_rawat", $data);
        }
    }

    function getAwalRawat($nomr, $idx)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->where(['idx' => $idx, "nomr" => $nomr])
            ->order_by("id desc")
            ->get("rj_awal_rawat");
    }
    function getAwalRawatById($nomr, $idx, $id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->where(['idx' => $idx, "nomr" => $nomr, "id" => $id])
            ->get("rj_awal_rawat")
            ->row();
    }

    function getAwalRawatByNomr($nomr) {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2
            ->select("a.id,a.idx,a.nomr,a.perawat_id,a.perawat,a.tgl,a.jam")
            ->where(["a.nomr" => $nomr])
            ->order_by("id desc")
            ->get("rj_awal_rawat a")
            ->result();
    }

    function deleteAwalRawat($idx, $id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        $db2
            ->where(["idx" => $idx, "id" => $id])
            ->delete("rj_awal_rawat");
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

    function getAwalMedisById($nomr, $idx, $id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->where(['idx' => $idx, "nomr" => $nomr, "id" => $id])
            ->order_by("id desc")
            ->get("rj_awal_medis")
            ->row();
    }

    function getAwalMedisByNomr($nomr) {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2
            ->select("a.id,a.idx,a.nomr,a.dokter_id,a.dokter,a.tgl,a.jam")
            ->where(["a.nomr" => $nomr])
            ->order_by("id desc")
            ->get("rj_awal_medis a")
            ->result();
    }

    function insertAwalMedis($data)
    {

        $db2 = $this->load->database('dberm', TRUE);
        $idx = $data['idx'];
        $nomr = $data['nomr'];
        $cek = $db2->where(['idx' => $idx, 'nomr' => $nomr])->get("rj_awal_medis")->num_rows();
        if ($cek > 0) {
            unset($data["idx"]);
            unset($data["nomr"]);
            return $db2->where(['idx' => $idx, 'nomr' => $nomr])->update("rj_awal_medis", $data);
        } else {
            return $db2->insert("rj_awal_medis", $data);
        }
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

    function getKembangPasienById($nomr, $idx,$id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->where(['id' => $id,'nomr'=>$nomr,'idx'=>$idx])
            ->get("rj_ppt")->row();
    }

    function getKembangPasienByNomr($nomr) {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2
            ->select("a.id,a.idx,a.nomr,a.tenaga_medis,a.jenis_tenaga_medis,a.tgl,a.jam")
            ->where(["a.nomr" => $nomr])
            ->order_by("id desc")
            ->get("rj_ppt a")
            ->result();
    }

    function insertKembangPasien($data)
    {
        $db2 = $this->load->database('dberm', TRUE);
        $id = $this->input->post("id_kembang_pasien");
        if ($id!="") {
            return $db2->where("id", $id)->update("rj_ppt", $data);
        } else {
            return $db2->insert("rj_ppt", $data);
        }
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

    function getEdukasiPasienById($nomr, $idx, $id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->where(['id' => $id, "idx" => $idx])
            ->order_by("id desc")
            ->get("rj_iep")->row();
    }

    function getEdukasiPasienByNomr($nomr) {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2
            ->select("a.id,a.idx,a.nomr,a.updated_at")
            ->where(["a.nomr" => $nomr])
            ->order_by("id desc")
            ->get("rj_iep a")
            ->result();
    }

    function insertEdukasiPasien($data)
    {
        // $db2 = $this->load->database('dberm', TRUE);
        // $db2->insert("rj_iep", $data);
        // return $db2->insert_id();
        $db2 = $this->load->database('dberm', TRUE);
        $idx = $data['idx'];
        $nomr = $data['nomr'];
        $cek = $db2->where(['idx' => $idx, 'nomr' => $nomr])->get("rj_iep");
        if ($cek->num_rows() > 0) {
            unset($data["idx"]);
            unset($data["nomr"]);
            $db2->where(['idx' => $idx, 'nomr' => $nomr])->update("rj_iep", $data);
            return $cek->row()->id;
        } else {
            $db2->insert("rj_iep", $data);
            return $db2->insert_id();
        }
    }

    function insertEdukasiPasienDetail($data)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->insert("rj_iep_detail", $data);
    }

    function deleteEdukasiPasien($idx, $id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        $db2
            ->where(["idx" => $idx, "id" => $id])
            ->delete("rj_iep");
        $db2
            ->where(["id_rj_iep" => $id])
            ->delete("rj_iep_detail");
        return $this->db->affected_rows();
    }

    function getEdukasiPasienDetail($id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        $id_rj = $db2->select("id")->where("idx",$id)->get("rj_iep")->row();
        if ($id_rj) {
            return $db2
            ->where(["id_rj_iep" => $id_rj->id])
            ->get("rj_iep_detail");
        }
        
    }
    function deleteEdukasiPasienDetail($id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        $db2
            ->where(["id" => $id])
            ->delete("rj_iep_detail");
        return $this->db->affected_rows();
    }

    function setFinalRekamMedis($id,$status) {
        $this->db
        ->where(["idx"=> $id])
        ->update("tbl02_pendaftaran",["status_erm"=>$status]);
        return $this->db->affected_rows();
    }
}
