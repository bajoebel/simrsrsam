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
        return $db2
            ->select("id")
            ->where(["idx" => $idx])
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
        $cppt = [
            "idx" => $data['idx'],
            "nomr" => $data['nomr'],
            "nama" => $data['nama'],
            "tgl" => $data['tgl'],
            "jam" => $data['jam'],
            "jenis_tenaga_medis_id" => 4,
            "jenis_tenaga_medis" => "Perawat Terampil",
            "tenaga_medis_id" => $data['perawat_id'],
            "tenaga_medis" => $data['perawat'],
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => date("Y-m-d h:i:s")
        ];
        if ($cek > 0) {
            unset($data["idx"]);
            unset($data["nomr"]);
            $db2->where("id",$data['cppt_id'])->update("rj_ppt",$cppt);
            return $db2->where(['idx' => $idx, 'nomr' => $nomr])->update("rj_awal_rawat", $data);
        } else {
            $db2->insert("rj_ppt",$cppt);
            $data['cppt_id'] = $db2->insert_id();
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

    function getAwalRawatByIdx($idx) {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2
            ->select("id")
            ->where(['idx' => $idx])
            ->get("rj_awal_rawat")
            ->row();
    }

    function getAllAwalRawatByIdx($idx) {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2
            ->select("*")
            ->where(['idx' => $idx])
            ->get("rj_awal_rawat")
            ->row();
    }

    function getAwalRawatByNomr($nomr) {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2
            ->select("a.id,a.idx,a.nomr,a.perawat_id,a.perawat,a.tgl,a.jam")
            ->where(["a.nomr" => $nomr])
            ->order_by("a.idx desc")
            ->get("rj_awal_rawat a")
            ->result();
    }

    function deleteAwalRawat($idx, $id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        $db2
        ->where(["idx" => $idx, "id" => $id])
        ->delete("rj_awal_rawat");
        $id_cppt = $db2->select("cppt_id")->where("id",$id)->get("rj_awal_rawat")->row();
        if($id_cppt) {
            $db2
            ->where(["id" => $id_cppt->cppt_id])
            ->delete("rj_ppt");
        }
        
        return $db2->affected_rows();
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

    function getAwalMedisByIdx($idx)
    {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2->where(['idx' => $idx])
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
        $cppt = [
            "idx" => $data['idx'],
            "nomr" => $data['nomr'],
            "nama" => $data['nama'],
            "tgl" => $data['tgl'],
            "jam" => $data['jam'],
            "jenis_tenaga_medis_id" => 2,
            "jenis_tenaga_medis" => "Dokter Spesialis",
            "tenaga_medis_id" => $data['dokter_id'],
            "tenaga_medis" => $data['dokter'],
            "updated_at" => date("Y-m-d h:i:s"),
            "created_at" => date("Y-m-d h:i:s")
        ];
        $cek = $db2->where(['idx' => $idx, 'nomr' => $nomr])->get("rj_awal_medis")->num_rows();
        if ($cek > 0) {
            unset($data["idx"]);
            unset($data["nomr"]);
            $db2->where("id",$data['cppt_id'])->update("rj_ppt",$cppt);
            return $db2->where(['idx' => $idx, 'nomr' => $nomr])->update("rj_awal_medis", $data);
        } else {
            $db2->insert("rj_ppt",$cppt);
            $data['cppt_id'] = $db2->insert_id();
            return $db2->insert("rj_awal_medis", $data);
        }
    }

    function deleteAwalMedis($idx, $id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        $db2
            ->where(["idx" => $idx, "id" => $id])
            ->delete("rj_awal_medis");
        $id_cppt = $db2->select("cppt_id")->where("id",$id)->get("rj_awal_medis")->row();
        // return $id_cppt;
        if($id_cppt) {
            $db2
            ->where(["id" => $id_cppt->cppt_id])
            ->delete("rj_ppt");
        }
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

    function getEdukasiPasienByIdx($idx) {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2
            ->select("a.id")
            ->where(["a.idx" => $idx])
            ->order_by("id desc")
            ->get("rj_iep a")
            ->row();
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

    function getEdukasiPasienDetailById($id) {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2
            ->where(["id" => $id])
            ->get("rj_iep_detail")
            ->row();
    }

    function insertKonsulInternal($data) {
        $db2 = $this->load->database('dberm', TRUE);
        $idx = $data['idx'];
        $nomr = $data['nomr'];
        $cek = $db2->where(['idx' => $idx, 'nomr' => $nomr])->get("rj_konsul_internal")->num_rows();
        if ($cek>0) {
            return $db2->where(['idx' => $idx, 'nomr' => $nomr])->update("rj_konsul_internal", $data);
        } else {
            return $db2->insert("rj_konsul_internal", $data);
        }
    }

    function getKonsulInternal($nomr, $idx) {
        $db2 = $this->load->database('dberm', TRUE);
        $db2->where(["nomr"=>$nomr,"idx"=>$idx]);
        return $db2->get("rj_konsul_internal");
    }

    function getKonsulInternalById($nomr, $idx,$id) {
        $db2 = $this->load->database('dberm', TRUE);
        $db2->where(["nomr"=>$nomr,"idx"=>$idx,"id"=>$id]);
        return $db2->get("rj_konsul_internal")->row();
    }


    function deleteKonsulInternal($idx,$id)
    {
        $db2 = $this->load->database('dberm', TRUE);
        $db2
            ->where(["idx"=>$idx,"id" => $id])
            ->delete("rj_konsul_internal");
        return $this->db->affected_rows();
    }

    function updateSignKonsulInternal($id,$kode,$kode_detail) {
        $db2 = $this->load->database('dberm', TRUE);
        $db2->trans_begin();
        $insert = $db2->insert("log_assign",[
            "kode" => $kode,
            "kode_detail" => $kode_detail,
            "created_at" => date("Y-m-d"),
            "updated_at" => date("Y-m-d"),

        ]);
        $insert_id = $db2->insert_id();
        $insert_id = base64_encode(str_pad($insert_id,10,"0",STR_PAD_LEFT));
        $update = $db2->where("id",$id)->update("rj_konsul_internal",[
            "dpjpMintaSign" => $insert_id,
            "status_form" => 1
        ]);
        if ($db2->trans_status() === FALSE)
        {
                $db2->trans_rollback();
                return false;
        }
        else
        {
                $db2->trans_commit();
                return true;
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

    function getPrmrjByNomr($nomr) {
        $db2 = $this->load->database('dberm', TRUE);
        return $db2
            ->select("a.*,b.diagnosis_kerja,b.terapi,b.dokter")
            ->join("rj_awal_medis b","a.idx=b.idx","LEFT")
            ->where(["a.nomr" => $nomr])
            ->where_in("a.jenis_tenaga_medis_id",[1,2])
            ->order_by("a.id desc")
            ->get("rj_ppt a");
    }

    public function updateSignAwalMedis($id,$kode,$kode_detail) {
        $db2 = $this->load->database('dberm', TRUE);
        $db2->trans_begin();
        $insert = $db2->insert("log_assign",[
            "kode" => $kode,
            "kode_detail" => $kode_detail,
            "created_at" => date("Y-m-d"),
            "updated_at" => date("Y-m-d"),

        ]);
        $insert_id = $db2->insert_id();
        $insert_id = base64_encode(str_pad($insert_id,10,"0",STR_PAD_LEFT));
        $update = $db2->where("id",$id)->update("rj_awal_medis",[
            "dokterSign" => $insert_id,
            "status_form" => 1
        ]);
        if ($db2->trans_status() === FALSE)
        {
                $db2->trans_rollback();
                return false;
        }
        else
        {
                $db2->trans_commit();
                return true;
        }
    }

    public function updateSignKembangPasien($id,$kode,$kode_detail) {
        $db2 = $this->load->database('dberm', TRUE);
        $db2->trans_begin();
        $insert = $db2->insert("log_assign",[
            "kode" => $kode,
            "kode_detail" => $kode_detail,
            "created_at" => date("Y-m-d"),
            "updated_at" => date("Y-m-d"),

        ]);
        $insert_id = $db2->insert_id();
        $insert_id = base64_encode(str_pad($insert_id,10,"0",STR_PAD_LEFT));
        $update = $db2->where("id",$id)->update("rj_ppt",[
            "tenagaMedisSign" => $insert_id,
            "status_form" => 1
        ]);
        if ($db2->trans_status() === FALSE)
        {
                $db2->trans_rollback();
                return false;
        }
        else
        {
                $db2->trans_commit();
                return true;
        }
    }

    
    public function updateSignReviewKembangPasien($id,$kode,$kode_detail,$review,$dokterNama,$dokter) {
        $db2 = $this->load->database('dberm', TRUE);
        $db2->trans_begin();
        $insert = $db2->insert("log_assign",[
            "kode" => $kode,
            "kode_detail" => $kode_detail,
            "created_at" => date("Y-m-d"),
            "updated_at" => date("Y-m-d"),

        ]);
        $insert_id = $db2->insert_id();
        $insert_id = base64_encode(str_pad($insert_id,10,"0",STR_PAD_LEFT));
        $update = $db2->where("id",$id)->update("rj_ppt",[
            "review" => $review,
            "dpjpSign" => $insert_id,
            "status_form" => 1,
            "dpjpName" => $dokterNama,
            "dpjpId" => $dokter
        ]);
        if ($db2->trans_status() === FALSE)
        {
                $db2->trans_rollback();
                return false;
        }
        else
        {
                $db2->trans_commit();
                return true;
        }
    }

    public function updateSignAwalRawat($id,$kode,$kode_detail) {
        $db2 = $this->load->database('dberm', TRUE);
        $db2->trans_begin();
        $insert = $db2->insert("log_assign",[
            "kode" => $kode,
            "kode_detail" => $kode_detail,
            "created_at" => date("Y-m-d"),
            "updated_at" => date("Y-m-d"),

        ]);
        $insert_id = $db2->insert_id();
        $insert_id = base64_encode(str_pad($insert_id,10,"0",STR_PAD_LEFT));
        $update = $db2->where("id",$id)->update("rj_awal_rawat",[
            "perawatSign" => $insert_id,
            "status_form" => 1
        ]);
        if ($db2->trans_status() === FALSE)
        {
                $db2->trans_rollback();
                return false;
        }
        else
        {
                $db2->trans_commit();
                return true;
        }
    }

    public function updateSignEdukasiPasienDetail($id,$kode,$kode_detail) {
        $db2 = $this->load->database('dberm', TRUE);
        $db2->trans_begin();
        $insert = $db2->insert("log_assign",[
            "kode" => $kode,
            "kode_detail" => $kode_detail,
            "created_at" => date("Y-m-d"),
            "updated_at" => date("Y-m-d"),

        ]);
        $insert_id = $db2->insert_id();
        $insert_id = base64_encode(str_pad($insert_id,10,"0",STR_PAD_LEFT));
        $update = $db2->where("id",$id)->update("rj_iep_detail",[
            "pemberiSign" => $insert_id,
            "status_form" => 1,
            "updated_at" => date("Y-m-d"),
            "status_form_disetujui" => date("Y-m-d")
        ]);
        if ($db2->trans_status() === FALSE)
        {
                $db2->trans_rollback();
                return false;
        }
        else
        {
                $db2->trans_commit();
                return true;
        }
    }

    public function getTindakanPenunjang($ruang) {
         $db3 = $this->load->database('dbsimrs', TRUE);
         return $db3
         ->join("tbl_json_tarif_2020","tbl_json_tarif_2020.kelas2=tarif_layanan.tlId","LEFT")
         ->where(["grId"=>$ruang,"tahun_tarif!="=>"TARIF LAMA","klId"=>"KL02"])
         ->get("tarif_layanan");
    }

    public function getPermintaanPenunjangByIdx($idx) {
         $db2 = $this->load->database('dberm', TRUE);
         return $db2
         ->where(["idx"=>$idx])
         ->get("rj_p_penunjang");
    }
    public function getPermintaanPenunjangById($id) {
         $db2 = $this->load->database('dberm', TRUE);
         return $db2
         ->where(["id"=>$id])
         ->get("rj_p_penunjang");
    }

    public function getPermintaanPenunjangDetail($id) {
        $db2 = $this->load->database('dberm', TRUE);
         return $db2
         ->where(["rj_p_penunjang_id"=>$id])
         ->get("rj_p_penunjang_detail");
    }

    public function insertPermintaanPenunjang($data) {  
        $db2 = $this->load->database('dberm', TRUE);
        $db3 = $this->load->database('dbsimrs', TRUE);
        if (!empty($data['tindakan']) or !empty($data['tindakan_lain'])) {
            $tindakan = $data['tindakan'];
            $tindakan_lain = $data['tindakan_lain'];
            $dataArrTindakan = [];
            $ringkasan = "";
            // $db2->trans_begin();
            unset($data['tindakan']);
            unset($data['tindakan_lain']);
            $db2->trans_begin();
            $insert = $db2->insert("rj_p_penunjang",$data);
            $id_rjpp = $db2->insert_id();

            if (!empty($tindakan)) {
                $dataTindakan = $db3
                ->select("tarif_layanan.*,tbl_json_tarif_2020.group")
                ->join("tbl_json_tarif_2020","tbl_json_tarif_2020.kelas2=tarif_layanan.tlId","LEFT")
                ->where_in('tlId',$tindakan)->get("tarif_layanan");
            
                if ($dataTindakan->num_rows()>0) {
                    foreach ($dataTindakan->result() as $r) {
                        $dataArrTindakan[] = [
                            "rj_p_penunjang_id" => $id_rjpp,
                            "tlId" => $r->tlId,
                            "tlTitle" => $r->tlTitle,
                            "jasaSarana" => $r->jasaSarana,
                            "jasaPelayanan" => $r->jasaPelayanan,
                            "tarifLayanan" => $r->tarifLayanan,
                            "group" => $r->group
                        ];
                        $ringkasan .= "$r->tlTitle, ";
                    }
                }
            }
            if (!empty($tindakan_lain)) {
                foreach ($tindakan_lain as $tl) {
                    $dataArrTindakan[] = [
                        "rj_p_penunjang_id" => $id_rjpp,
                        "tlId" => "nonlist",
                        "tlTitle" => $tl,
                        "jasaSarana" => "-",
                        "jasaPelayanan" => "-",
                        "tarifLayanan" => "0",
                        "group" => "Nonlist"
                    ];
                        $ringkasan .= "$tl, ";
                }
            }
          
            $db2->insert_batch('rj_p_penunjang_detail',$dataArrTindakan);
            $db2->where("id",$id_rjpp)->update("rj_p_penunjang",["ringkasan_tindakan"=>rtrim($ringkasan,", ")]);
            if ($db2->trans_status()===FALSE) {
                $db2->trans_rollback();
                return false;
            } else {
                 $db2->trans_commit();
                return true;
            }
        } else {
            return false;
        }
    }

    public function deletePermintaanPenunjang($idx,$id) {
        $db2 = $this->load->database('dberm', TRUE);
        $db2->trans_begin();
        $db2->where(["idx"=>$idx,"id"=>$id])->delete("rj_p_penunjang");
        $db2->where(["rj_p_penunjang_id"=>$id])->delete("rj_p_penunjang_detail");
        if ($db2->trans_status()===FALSE) {
            $db2->trans_rollback();
            return false;
        } else {
            $db2->trans_commit();
            return true;
        }
    }

    public function updateSignPermintaanPenunjang($id,$kode,$kode_detail) {
        $db2 = $this->load->database('dberm', TRUE);
        $db2->trans_begin();
        $insert = $db2->insert("log_assign",[
            "kode" => $kode,
            "kode_detail" => $kode_detail,
            "created_at" => date("Y-m-d"),
            "updated_at" => date("Y-m-d"),
        ]);
        $insert_id = $db2->insert_id();
        $insert_id = base64_encode(str_pad($insert_id,10,"0",STR_PAD_LEFT));
        $update = $db2->where("id",$id)->update("rj_p_penunjang",[
            "signDokter" => $insert_id,
            "status_form" => 1
        ]);
        if ($db2->trans_status() === FALSE)
        {
                $db2->trans_rollback();
                return false;
        }
        else
        {
                $db2->trans_commit();
                return true;
        }
    }

    public function getPanduanKlinik($kode) {
         $db2 = $this->load->database('dberm', TRUE);
         $pk = $db2->where("kode",$kode)->get("m_pk")->row();
         $pk_detail = $db2->where("kode_m_pk",$kode)->get("m_pk_detail")->result();
         if ($pk && $pk_detail) {
            return [
                "status" => TRUE,
                "utama" => $pk,
                "detail" => $pk_detail
            ];
         } else if ($pk) {
            return [
                "status" => TRUE,
                "utama" => $pk,
                "detail" => []
            ];
         } else {
            return [
                "status" => FALSE
            ];
         }
    }

    public function getResepById($id) {
        $ci = get_instance();
        $db3 = $ci->load->database('dbfarmasi', TRUE);
        return $db3
            ->select("*")
            ->where("KDBRG",$id)
            ->get("tbl04_barang a")
            ->row();
    }

    public function getPermintaanResepByIdx($idx) {
        $ci = get_instance();
        $db2 = $ci->load->database('dberm', TRUE);
        return $db2
            ->select("*")
            ->where("idx",$idx)
            ->get("rj_p_resep")
            ->row();
    }

    public function insertResep($data) {
        $ci = get_instance();
        $db2 = $ci->load->database('dberm', TRUE);
        $hasil = [];
        $hasil["status"] = $db2
            ->insert("rj_p_resep_detail",$data);
        $hasil["id"] = $db2->insert_id();
        return $hasil;
    }

    public function getPermintaanResepDetailByIdx($idx) {
        $ci = get_instance();
        $db2 = $ci->load->database('dberm', TRUE);
        return $db2
            ->where("a.idx",$idx)
            ->get("rj_p_resep_detail a")->result();
    }

    public function deleteObat($id) {
        $ci = get_instance();
        $db2 = $ci->load->database('dberm', TRUE);
        $db2
            ->where("a.id",$id)
            ->delete("rj_p_resep_detail a");
        return $db2->affected_rows();
    }

    public function ajukanPermintaanResep($data) {
        $ci = get_instance();
        $db2 = $ci->load->database('dberm', TRUE);
        $db2->trans_begin();
        $cek = $db2->where("idx",$data['idx'])->get("rj_p_resep")->row();
        if ($cek) {
            $id = $cek->id;
        } else {
            $db2->insert("rj_p_resep",$data);
            $id = $db2->insert_id();
        }
        $db2->where("idx",$data['idx'])->update("rj_p_resep_detail",["rj_p_resep_id"=>$id]);
        if ($db2->trans_status()===FALSE) {
            $db2->trans_rollback();
            return false;
        } else {
             $db2->trans_commit();
            return true;
        }
    }

    public function deletePermintaanResep($idx) {
        $ci = get_instance();
        $db2 = $ci->load->database('dberm', TRUE);
        $db2->where("idx",$idx)->delete("rj_p_resep");
        return  $db2->affected_rows();
    }
}
