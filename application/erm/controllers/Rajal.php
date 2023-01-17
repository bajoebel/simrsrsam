<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Rajal extends CI_Controller
{
    public $folder = "erm";
    public $subfolder = "rajal";
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Erm_model", "erm");
        $this->load->model("Rajal_model", "rajal");
        date_default_timezone_set("Asia/Bangkok");
    }

    public function masuk_rajal($idx = "")
    {

        // form rm 0200 rev.01 surat masuk rawat jalan
        
        $p = $this->erm->getPendaftaran($idx);

        if ($idx != "") {
            $d = $this->erm->getPendaftaran($idx);
            $p = $this->erm->getPasien($d->nomr);
            $data = [
                "status" => true,
                "p" => $p,
                "d" => $d
            ];
            $this->load->view($this->folder . "/" . $this->subfolder . "/masuk_rj/masuk_rj_cetak", $data);
        } else {
            $data = [
                "status" => false
            ];
            $this->load->view($this->folder . "/" . $this->subfolder . "/masuk_rj/masuk_rj_cetak_master", $data);
        }

    }

    public function setuju_umum($idx = "", $id = "")
    {
        // form rm 1.1.00 rev.02
        // data pendaftaran
        $d = $this->erm->getPendaftaran($idx);
        // data pasien
        $p = $this->erm->getPasien($d->nomr);
        if ($idx != "" && $id != "") {

            // data table setuju umum
            $s = $this->rajal->getSetujuUmumById($idx, $id);
            $data = [
                "status" => true,
                "d" => $d,
                "p" => $p,
                "s" => $s
            ];
            $this->load->view($this->folder . "/" . $this->subfolder . "/setuju_umum/setuju_umum_cetak", $data);
        } else {
            $data = [
                "status" => false
            ];
            $this->load->view($this->folder . "/" . $this->subfolder . "/setuju_umum/setuju_umum_cetak_master", $data);
        }
    }
    public function insert_setuju_umum()
    {
        $nama = $this->input->post('nama_ttd');
        $tempat_lahir = $this->input->post('tempat_lahir_ttd');
        $tanggal_lahir = $this->input->post('tgl_lahir_ttd');
        $jk = $this->input->post('jk_ttd');
        $phone = $this->input->post('phone_ttd');
        $idx = $this->input->post('idx');
        $nomr = $this->input->post('nomr');
        $privasi_list = implode(';', removeChar($this->input->post('privasi')));
        $terbatas = $this->input->post('terbatas');
        $terbatas_list = implode(';', removeChar($this->input->post('terbatas_list')));
        $alamat = $this->input->post('alamat');
        $selaku = $this->input->post('selaku');
        $lainnya = $this->input->post('lainnya');
        $data = [
            "idx" => $idx,
            "nomr" => $nomr,
            "nama" => $nama,
            "tempat_lahir" => $tempat_lahir,
            "tanggal_lahir" => $tanggal_lahir,
            "jk" => $jk,
            "privasi_list" => $privasi_list,
            "terbatas" => $terbatas,
            "terbatas_list" => $terbatas_list,
            "alamat" => $alamat,
            "selaku" => $selaku,
            "selaku_lainnya" => $lainnya,
            "phone" => $phone,
            "created_at" => date("Y-m-d h:i:s"),
            "updated_at" => date("Y-m-d h:i:s")
        ];
        $insert = $this->rajal->insertSetujuUmum($data);
        if ($insert) {
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => false]);
        }
    }

    public function delete_setuju_umum($idx, $id)
    {
        $delete = $this->rajal->deleteSetujuUmum($idx, $id);
        if ($delete) {
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => true]);
        }
    }
    public function hak_wajib()
    {
        // form rm 0200 rev.01 surat masuk rawat jalan
        $data = [
            "data" => []
        ];
        $this->load->view($this->folder . "/" . $this->subfolder . "/hak_wajib/hak_wajib_cetak", compact('data'));
    }

    public function kaji_awal($id = "", $idx = "", $nomr = "")
    {
        // form rm 0200 rev.01 surat masuk rawat jalan
        if ($id != "" and $idx != "" and $nomr != "") {
            // data pendaftaran
            $d = $this->erm->getPendaftaran($idx);
            // data pasien
            $p = $this->erm->getPasien($nomr);
            // kaji awal data
            $k = $this->rajal->getAwalRawatById($nomr, $idx, $id);
            $data = [
                "d" => $d,
                "p" => $p,
                "k" => $k
            ];
            $this->load->view($this->folder . "/" . $this->subfolder . "/kaji_awal/kaji_awal_cetak", $data);
        } else {
            $data = [
                "data" => []
            ];
            $this->load->view($this->folder . "/" . $this->subfolder . "/kaji_awal/kaji_awal_cetak_master", compact('data'));
        }
    }

    public function insert_kaji_awal()
    {
        $data_post = [
            "idx" => $this->input->post("idx_ka"),
            "nomr" => $this->input->post("nomr_ka"),
            "nama" => $this->input->post("nama_ka"),
            "tgl" => $this->input->post("tgl_ka"),
            "jam" => $this->input->post("jam_ka"),
            "poli" => $this->input->post("poli_ka"),
            "poli_text" => $this->input->post("poli_text_ka"),
            "dpjp" => $this->input->post("dpjp_ka"),
            "dpjp_text" => $this->input->post("dpjp_text_ka"),
            "tgl" => $this->input->post("tgl_ka"),
            "jam" => $this->input->post("jam_ka"),
            "tiba" => $this->input->post("tiba_ka"),
            "rujukan" => $this->input->post("rujukan_ka"),
            "rujukan_lain" => $this->input->post("rujukan_lainnya_ka"),
            "keluhan" => $this->input->post("keluhan_ka"),
            "dirawat" => $this->input->post("dirawat_ka"),
            "kapan_dirawat" => $this->input->post("kapan_dirawat_ka"),
            "dimana_dirawat" => $this->input->post("dimana_dirawat_ka"),
            "diagnosis" => $this->input->post("diagnosis_ka"),
            "implant" => $this->input->post("implant_ka"),
            "implant_detail" => $this->input->post("implant_detail_ka"),
            "riwayat_sakit" => $this->input->post("riwayat_sakit_ka"),
            "riwayat_operasi" => $this->input->post("riwayat_operasi_ka"),
            "riwayat_operasi_tahun" => $this->input->post("riwayat_operasi_tahun_ka"),
            "riwayat_sakit_keluarga" => $this->input->post("riwayat_sakit_keluarga_ka"),
            "riwayat_psikologis" => $this->input->post("riwayat_psikologis_ka"),
            "status_mental_sadar" => $this->input->post("status_mental_sadar_ka"),
            "status_mental_prilaku" => $this->input->post("status_mental_prilaku_ka"),
            "status_mental_prilaku_detail" => $this->input->post("status_mental_prilaku_detail_ka"),
            "status_mental_keras" => $this->input->post("status_mental_keras_ka"),
            "status_mental_keras_detail" => $this->input->post("status_mental_keras_detail_ka"),
            "kultural" => $this->input->post("kultural_ka"),
            "kultural_nama" => $this->input->post("kultural_nama_ka"),
            "kultural_hubungan" => $this->input->post("kultural_hubungan_ka"),
            "kultural_phone" => $this->input->post("kultural_phone_ka"),
            "nilai_kepercayaan" => $this->input->post("nilai_kepercayaan_ka"),
            "status_ekonomi" => $this->input->post("status_ekonomi_ka"),
            "spiritual_biasa" => $this->input->post("spiritual_biasa_ka"),
            "spiritual_butuh" => $this->input->post("spiritual_butuh_ka"),
            "budaya" => $this->input->post("budaya_ka"),
            "obat" => $this->input->post("obat_ka"),
            "makanan" => $this->input->post("makanan_ka"),
            "obat_detail" => $this->input->post("obat_detail_ka"),
            "makanan_detail" => $this->input->post("makanan_detail_ka"),
            "riwayat_lain" => $this->input->post("riwayat_lain_ka"),
            "nyeri" => $this->input->post("nyeri_ka"),
            "profokatif" => $this->input->post("profokatif_ka"),
            "quality" => $this->input->post("quality_ka"),
            "region" => $this->input->post("region_ka"),
            "skala" => $this->input->post("skala_ka"),
            "timing" => $this->input->post("timing_ka"),
            "tidur_malam" => $this->input->post("tidur_malam_ka"),
            "halangan_aktivitas" => $this->input->post("halangan_aktivitas_ka"),
            "nyeri_sakit" => $this->input->post("nyeri_sakit_ka"),
            "metode" => $this->input->post("metode_ka"),
            "skala_vas" => $this->input->post("skala_vas_ka"),
            "skala_wbfs" => $this->input->post("skala_wbfs_ka"),
            "wajah" => $this->input->post("wajah_ka"),
            "leg" => $this->input->post("leg_ka"),
            "gerakan" => $this->input->post("gerakan_ka"),
            "tangis" => $this->input->post("tangis_ka"),
            "kemampuan" => $this->input->post("kemampuan_ka"),
            "flacc_skor" => $this->input->post("flacc_skor_ka"),
            "flacc_skor_detail" => $this->input->post("flacc_skor_detail_ka"),
            "gizi" => $this->input->post("gizi_ka"),
            "gizi_detail" => $this->input->post("gizi_detail_ka"),
            "gizi_value" => $this->input->post("gizi_value_ka"),
            "gizi_makan" => $this->input->post("gizi_makan_ka"),
            "gizi_makan_detail" => $this->input->post("gizi_makan_detail_ka"),
            "gizi_makan_value" => $this->input->post("gizi_makan_value_ka"),
            "skor_gizi" => $this->input->post("skor_gizi_ka"),
            "strong_kids" => $this->input->post("strong_kids_ka"),
            "aktivitas" => $this->input->post("aktivitas_ka"),
            "aktivitas_detail" => $this->input->post("aktivitas_detail_ka"),
            "aktivitas_info" => $this->input->post("aktivitas_info_ka"),
            "aktivitas_info_detail" => $this->input->post("aktivitas_info_detail_ka"),
            "jatuh" => $this->input->post("jatuh_ka"),
            "jatuh_detail" => $this->input->post("jatuh_detail_ka"),
            "gelang_risiko" => $this->input->post("gelang_risiko_ka"),
            "risiko_info" => $this->input->post("risiko_info_ka"),
            "risiko_info_detail" => $this->input->post("risiko_info_detail_ka"),
            "keadaan_umum" => $this->input->post("keadaan_umum_ka"),
            "kesadaran_umum" => $this->input->post("kesadaran_umum_ka"),
            "gcs_e" => $this->input->post("gcs_e_ka"),
            "gcs_m" => $this->input->post("gcs_m_ka"),
            "gcs_v" => $this->input->post("gcs_v_ka"),
            "ttv_sh" => $this->input->post("ttv_sh_ka"),
            "ttv_nd" => $this->input->post("ttv_nd_ka"),
            "ttv_rr" => $this->input->post("ttv_rr_ka"),
            "ttv_td" => $this->input->post("ttv_td_ka"),
            "ttv_ds" => $this->input->post("ttv_ds_ka"),
            "status_generalis" => $this->input->post("status_generalis_ka"),
            "penunjang_rad" => $this->input->post("penunjang_rad_ka"),
            "penunjang_rad_detail" => $this->input->post("penunjang_rad_detail_ka"),
            "penunjang_lab" => $this->input->post("penunjang_lab_ka"),
            "penunjang_lab_detail" => $this->input->post("penunjang_lab_detail_ka"),
            "penunjang_lain" => $this->input->post("penunjang_lain_ka"),
            "penunjang_lain_detail" => $this->input->post("penunjang_lain_detail_ka"),
            "komunikasi" => $this->input->post("komunikasi_ka"),
            "komunikasi_detail" => $this->input->post("komunikasi_detail_ka"),
            "komunikasi_lain" => $this->input->post("komunikasi_lain_ka"),
            "komunikasi_penerjemah" => $this->input->post("komunikasi_penerjemah_ka"),
            "komunikasi_penerjemah_detail" => $this->input->post("komunikasi_penerjemah_detail_ka"),
            "komunikasi_isyarat" => $this->input->post("komunikasi_isyarat_ka"),
            "kebutuhan_edukasi" => $this->input->post("kebutuhan_edukasi_ka"),
            "diagnosa_keperawatan" => $this->input->post("diagnosa_keperawatan_kat"),
            "tindakan_keperawatan" => $this->input->post("tindakan_keperawatan_kat"),
            "dijelaskan" => $this->input->post("dijelaskan_ka"),
            "dijelaskan_hubungan" => $this->input->post("dijelaskan_hubungan_ka"),
            "dijelaskan_nama" => $this->input->post("dijelaskan_nama_ka"),
            "perawat_id" => $this->input->post("perawat_id_ka"),
            "perawat" => $this->input->post("perawat_ka"),
            "status" => 0,
            "created_at" => date("Y-m-d h:i:s"),
            "updated_at" => date("Y-m-d h:i:s"),
            "user_daftar" => $this->input->post("user_daftar_ka")
        ];
        // riwayat_sakit_ka
        if (is_array($this->input->post("riwayat_sakit_ka"))) {
            $data_post['riwayat_sakit'] = implode(";", removeChar($this->input->post("riwayat_sakit_ka")));
        }
        // riwayat_sakit_keluarga_ka[]
        if (is_array($this->input->post("riwayat_sakit_keluarga_ka"))) {
            $data_post['riwayat_sakit_keluarga'] = implode(";", removeChar($this->input->post("riwayat_sakit_keluarga_ka")));
        }
        // riwayat_psikologis_ka
        if (is_array($this->input->post("riwayat_psikologis_ka"))) {
            $data_post['riwayat_psikologis'] = implode(";", removeChar($this->input->post("riwayat_psikologis_ka")));
        }
        // status_ekonomi_ka[]
        if (is_array($this->input->post("status_ekonomi_ka"))) {
            $data_post['status_ekonomi'] = implode(";", removeChar($this->input->post("status_ekonomi_ka")));
        }
        // komunikasi_detail_ka
        if (is_array($this->input->post("komunikasi_detail_ka"))) {
            $data_post['komunikasi_detail'] = implode(";", removeChar($this->input->post("komunikasi_detail_ka")));
        }
        // kebutuhan edukasi
        if (is_array($this->input->post("kebutuhan_edukasi_ka"))) {
            $data_post['kebutuhan_edukasi'] = implode(";", removeChar($this->input->post("kebutuhan_edukasi_ka")));
        }
        // kebutuhan edukasi
        if (is_array($this->input->post("strong_kids_ka"))) {
            $data_post['strong_kids'] = implode(";", removeChar($this->input->post("strong_kids_ka")));
        }
        // header("Content-Type:text/html");
        // echo json_encode(["data" => $data_post]);
        // exit();
        $insert = $this->rajal->insertAwalRawat($data_post);
        if ($insert) {
            echo json_encode(["status" => true, "data" => $data_post]);
        } else {
            echo json_encode(["status" => false]);
        }
    }

    public function delete_kaji_awal($idx, $id)
    {
        $delete = $this->rajal->deleteAwalRawat($idx, $id);
        if ($delete) {
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => true]);
        }
    }

    public function kaji_awal_medis($id = "", $idx = "", $nomr = "")
    {
        // form rm 0203 rev.01 surat masuk rawat jalan
        if ($id != "" and $idx != "" and $nomr != "") {
            // data pendaftaran
            $d = $this->erm->getPendaftaran($idx);
            // data pasien
            $p = $this->erm->getPasien($nomr);
            // kaji awal data
            $k = $this->rajal->getAwalMedisById($nomr, $idx, $id);
            $data = [
                "d" => $d,
                "p" => $p,
                "k" => $k
            ];
            $this->load->view($this->folder . "/" . $this->subfolder . "/kaji_awal_medis/kaji_awal_medis_cetak", $data);
        } else {
            $data = [
                "data" => []
            ];
            $this->load->view($this->folder . "/" . $this->subfolder . "/kaji_awal_medis/kaji_awal_medis_cetak_master", compact('data'));
        }
    }

    public function sign_awal_medis() {
        $idx = $this->input->post("idx");
        $id = $this->input->post("id");
        $nomr = $this->input->post("nomr");
        $dokter = $this->input->post("dokter");
        $param = [
            "id" => $id,
            "tabel" => "rj_awal_medis",
            "dokter" => $dokter 
        ];
        $data = $this->rajal->getAwalMedisById($nomr,$idx,$id);
        if ($data) {
            $code = base64_encode(json_encode($param));
            $code_detail = base64_encode(json_encode($data));
            $update = $this->rajal->updateSignAwalMedis($id,$code,$code_detail);
            echo json_encode(["status"=>true,"msg"=>"QRCODE berhasil di generate"]); 
        } else {
            echo json_encode(["status"=>false,"msg"=>"QRCODE gagal di generate"]); 
        }
    }

    public function sign_kembang_pasien() {
        $idx = $this->input->post("idx");
        $id = $this->input->post("id");
        $nomr = $this->input->post("nomr");
        $user = $this->input->post("user");
        $param = [
            "id" => $id,
            "tabel" => "rj_ppt",
            "tenaga_medis" => $user 
        ];
        $data = $this->rajal->getKembangPasienById($nomr,$idx,$id);
        if ($data) {
            $code = base64_encode(json_encode($param));
            $code_detail = base64_encode(json_encode($data));
            $update = $this->rajal->updateSignKembangPasien($id,$code,$code_detail);
            echo json_encode(["status"=>true,"msg"=>"QRCODE berhasil di generate"]); 
        } else {
            echo json_encode(["status"=>false,"msg"=>"QRCODE gagal di generate"]); 
        }
    }

    public function sign_edukasi_pasien_detail() {
        $id = $this->input->post("id");
        $user = $this->input->post("user");
        $param = [
            "id" => $id,
            "tabel" => "rj_iep_detail",
            "tenaga_medis" => $user 
        ];
        $data = $this->rajal->getEdukasiPasienDetailById($id);
        
        if ($data) {
            $code = base64_encode(json_encode($param));
            $code_detail = base64_encode(json_encode($data));
            $update = $this->rajal->updateSignEdukasiPasienDetail($id,$code,$code_detail);
            echo json_encode(["status"=>true,"msg"=>"QRCODE berhasil di generate"]); 
        } else {
            echo json_encode(["status"=>false,"msg"=>"QRCODE gagal di generate"]); 
        }
    }

    public function sign_awal_rawat() {
        $idx = $this->input->post("idx");
        $id = $this->input->post("id");
        $nomr = $this->input->post("nomr");
        $user = $this->input->post("user");
        $param = [
            "id" => $id,
            "tabel" => "rj_awal_rawat",
            "perawat_id" => $user 
        ];
        $data = $this->rajal->getAwalRawatById($nomr,$idx,$id);
        if ($data) {
            $code = base64_encode(json_encode($param));
            $code_detail = base64_encode(json_encode($data));
            $update = $this->rajal->updateSignAwalRawat($id,$code,$code_detail);
            echo json_encode(["status"=>true,"msg"=>"QRCODE berhasil di generate"]); 
        } else {
            echo json_encode(["status"=>false,"msg"=>"QRCODE gagal di generate"]); 
        }
    }

    public function insert_kaji_awal_medis()
    {
        $data_post = [
            "idx" => $this->input->post("idx_m"),
            "nomr" => $this->input->post("nomr_m"),
            "nama" => $this->input->post("nama_m"),
            "hari" => $this->input->post("hari_m"),
            "tgl" => $this->input->post("tgl_m"),
            "jam" => $this->input->post("jam_m"),
            "auto" => $this->input->post("auto_m"),
            "auto_detail" => $this->input->post("auto_detail_m"),
            "allo" => $this->input->post("allo_m"),
            "allo_detail" => $this->input->post("allo_detail_m"),
            "td" => $this->input->post("td_m"),
            "nadi" => $this->input->post("nadi_m"),
            "napas" => $this->input->post("napas_m"),
            "suhu" => $this->input->post("suhu_m"),
            "fisik_detail" => $this->input->post("fisik_detail_m"),
            "diagnosis_kerja" => $this->input->post("diagnosis_kerja_mt"),
            "diagnosis_banding" => $this->input->post("diagnosis_banding_mt"),
            "penunjang" => $this->input->post("penunjang_mt"),
            "terapi" => $this->input->post("terapi_mt"),
            "kontrol" => $this->input->post("kontrol_m"),
            "kontrol_tgl" => $this->input->post("kontrol_tanggal_m"),
            "kontrol_jam" => $this->input->post("kontrol_jam_m"),
            "kontrol_tujuan_id" => $this->input->post("kontrol_tujuan_id_m"),
            "kontrol_tujuan" => $this->input->post("kontrol_tujuan_m"),
            "pj" => $this->input->post("pj_m"),
            "pj_detail" => $this->input->post("pj_detail_m"),
            "pj_nama" => $this->input->post("pj_nama_m"),
            "dokter" => $this->input->post("dokter_m"),
            "dokter_id" => $this->input->post("dokter_id_m"),
            "created_at" => date("Y-m-d h:i:s"),
            "updated_at" => date("Y-m-d h:i:s"),
            "user_daftar" => $this->input->post("user_daftar_m")
        ];
        // header("Content-Type:text/html");
        // echo json_encode(["data" => $data_post]);
        // exit();
        $insert = $this->rajal->insertAwalMedis($data_post);
        if ($insert) {
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => false]);
        }
    }

    public function edit_awal_medis() {
        $idx = $this->input->post("idx");
        $id = $this->input->post("id");
        $nomr = $this->input->post("nomr");
        $data = $this->rajal->getAwalMedisById($nomr,$idx,$id);
        echo json_encode(["status"=>true,"data"=> $data]);
    }

    public function delete_kaji_awal_medis($idx, $id)
    {
        $delete = $this->rajal->deleteAwalMedis($idx, $id);
        if ($delete) {
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => true]);
        }
    }

    public function kembang_pasien($id = "", $idx = "", $nomr = "")
    {
        // form rm 0.2.03 rev.02 catatan perkembangan pasien terintegrasi rawat jalan
        if ($id != "" and $idx != "" and $nomr != "") {
            // data pendaftaran
            $d = $this->erm->getPendaftaran($idx);
            // data pasien
            $p = $this->erm->getPasien($nomr);
            // kaji awal data
            $k = $this->rajal->getKembangPasien($nomr, $idx);
            $data = [
                "d" => $d,
                "p" => $p,
                "k" => $k
            ];
            $this->load->view($this->folder . "/" . $this->subfolder . "/kembang_pasien/kembang_pasien_cetak", $data);
        } else {
            $data = [
                "data" => []
            ];
            $this->load->view($this->folder . "/" . $this->subfolder . "/kembang_pasien/kembang_pasien_cetak_master", compact('data'));
        }
    }

    public function insert_kembang_pasien()
    {

        $data_post = [
            "idx" => $this->input->post("idx_k"),
            "nomr" => $this->input->post("nomr_k"),
            "nama" => $this->input->post("nama_k"),
            "tgl" => $this->input->post("tgl_k"),
            "jam" => $this->input->post("jam_k"),
            "jenis_tenaga_medis_id" => $this->input->post("jenis_tenaga_medis_id_k"),
            "jenis_tenaga_medis" => $this->input->post("jenis_tenaga_medis_k"),
            "tenaga_medis_id" => $this->input->post("tenaga_medis_id_k"),
            "tenaga_medis" => $this->input->post("tenaga_medis_k"),
            "subyektif" => $this->input->post("subyektif_kt"),
            "obyektif" => $this->input->post("obyektif_kt"),
            "assesment" => $this->input->post("assesment_kt"),
            "planning" => $this->input->post("planning_kt"),
            "instruksi" => $this->input->post("instruksi_kt"),
            "review" => $this->input->post("review_kt"),
            "created_at" => date("Y-m-d h:i:s"),
            "updated_at" => date("Y-m-d h:i:s"),
            "user_daftar" => $this->input->post("user_daftar_k")
        ];
        // header("Content-Type:text/html");
        // echo json_encode(["data" => $data_post]);
        // exit();
        $insert = $this->rajal->insertKembangPasien($data_post);
        if ($insert) {
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => false]);
        }
    }

    public function edit_kembang_pasien() {
        $idx = $this->input->post("idx");
        $id = $this->input->post("id");
        $nomr = $this->input->post("nomr");
        $data = $this->rajal->getKembangPasienById($nomr,$idx,$id);
        echo json_encode(["status"=>true,"data"=> $data]);
    }

    public function delete_kembang_pasien($idx, $id)
    {
        $delete = $this->rajal->deleteKembangPasien($idx, $id);
        if ($delete) {
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => true]);
        }
    }

    // edukasi pasien
    public function edukasi_pasien($id = "", $idx = "", $nomr = "")
    {
        // form rm 0.2.03 rev.02 catatan perkembangan pasien terintegrasi rawat jalan
        if ($id != "" and $idx != "" and $nomr != "") {
            // data pendaftaran
            $d = $this->erm->getPendaftaran($idx);
            // data pasien
            $p = $this->erm->getPasien($nomr);
            // kaji awal data
            $k = $this->rajal->getEdukasiPasienById($nomr, $idx, $id);
            $data = [
                "d" => $d,
                "p" => $p,
                "k" => $k
            ];

            $this->load->view($this->folder . "/" . $this->subfolder . "/informasi_edukasi/informasi_edukasi_cetak", $data);
        } else {
            $data = [
                "data" => []
            ];
            $this->load->view($this->folder . "/" . $this->subfolder . "/informasi_edukasi/informasi_edukasi_cetak_master", compact('data'));
        }
    }

    public function insert_edukasi_pasien()
    {
        $data_post = [
            "idx" => $this->input->post("idx_e"),
            "nomr" => $this->input->post("nomr_e"),
            "nama" => $this->input->post("nama_e"),
            "bahasa" => $this->input->post("bahasa_e"),
            "bahasa_lain" => $this->input->post("bahasa_lainnya_e"),
            "penerjemah" => $this->input->post("penerjemah_e"),
            "agama" => $this->input->post("agama_e"),
            "pendidikan" => $this->input->post("pendidikan_e"),
            "kesediaan" => $this->input->post("kesediaan_e"),
            "kesediaan_alasan" => $this->input->post("kesediaan_alasan_e"),
            "baca" => $this->input->post("baca_e"),
            "keyakinan" => $this->input->post("keyakinan_e"),
            "terbatas_fisik" => $this->input->post("terbatas_fisik_e"),
            "terbatas_fisik_lain" => $this->input->post("terbatas_fisik_lain_e"),
            "hambatan" => $this->input->post("hambatan_e"),
            "kebutuhan_edukasi" => $this->input->post("kebutuhan_edukasi_e"),
            "kebutuhan_edukasi_lain" => $this->input->post("kebutuhan_edukasi_lain_e"),
            "metode" => $this->input->post("metode_e"),
            "media" => $this->input->post("media_e"),
            "sasaran_edukasi" => $this->input->post("sasaran_edukasi_e"),
            "hubungan_keluarga" => $this->input->post("hubungan_keluarga_e"),
            "created_at" => date("Y-m-d h:i:s"),
            "updated_at" => date("Y-m-d h:i:s"),
            "user_daftar" => $this->input->post("user_daftar_e")
        ];
        if (is_array($this->input->post("bahasa_e"))) {
            $data_post['bahasa'] = implode(";", removeChar($this->input->post("bahasa_e")));
        }
        if (is_array($this->input->post("terbatas_fisik_e"))) {
            $data_post['terbatas_fisik'] = implode(";", removeChar($this->input->post("terbatas_fisik_e")));
        }
        if (is_array($this->input->post("hambatan_e"))) {
            $data_post['hambatan'] = implode(";", removeChar($this->input->post("hambatan_e")));
        }
        if (is_array($this->input->post("kebutuhan_edukasi_e"))) {
            $data_post['kebutuhan_edukasi'] = implode(";", removeChar($this->input->post("kebutuhan_edukasi_e")));
        }
        if (is_array($this->input->post("metode_e"))) {
            $data_post['metode'] = implode(";", removeChar($this->input->post("metode_e")));
        }
        if (is_array($this->input->post("media_e"))) {
            $data_post['media'] = implode(";", removeChar($this->input->post("media_e")));
        }
        // header("Content-Type:text/html");
        // echo json_encode(["data" => $data_post]);
        // exit();
        $insert = $this->rajal->insertEdukasiPasien($data_post);
        if ($insert) {
            echo json_encode(["status" => true, "id" => $insert]);
        } else {
            echo json_encode(["status" => false]);
        }
    }

    public function insert_edukasi_pasien_detail()
    {
        $data_post = [
            "id_rj_iep" => $this->input->post("id_rj_iep"),
            "tgl" => $this->input->post("tgl"),
            "jam" => $this->input->post("jam"),
            "topik_id" => $this->input->post("topik_id"),
            "topik_title" => $this->input->post("topik_title"),
            "topik_list" => $this->input->post("topik_list"),
            "metode" => $this->input->post("metode"),
            "media" => $this->input->post("media"),
            "sasaran" => $this->input->post("sasaran"),
            "evaluasi_awal" => $this->input->post("evaluasi_awal"),
            "pemberi_edukasi" => $this->input->post("pemberi_edukasi"),
            "pemberi_edukasi_id" => $this->input->post("pemberi_edukasi_id"),
            // "verifikasi" => $this->input->post("verifikasi"),
            "evaluasi_lanjut" => $this->input->post("evaluasi_lanjut"),
            "created_at" => date("Y-m-d h:i:s"),
            "updated_at" => date("Y-m-d h:i:s"),
            "user_daftar" => $this->input->post("user_daftar")
        ];
        if (is_array($this->input->post("topik_list"))) {
            $data_post['topik_list'] = implode(";", removeChar($this->input->post("topik_list")));
        }

        $insert = $this->rajal->insertEdukasiPasienDetail($data_post);

        if ($insert) {
            echo json_encode(["status" => true, "data" => $data_post]);
        } else {
            echo json_encode(["status" => false]);
        }
    }

    function get_edukasi_pasien_detail($id)
    {
        $data = [
            "data" => $this->rajal->getEdukasiPasienDetail($id)
        ];
        $this->load->view("erm/rajal/informasi_edukasi/informasi_edukasi_table", $data);
    }

    function get_topik_list()
    {
        $id = $this->input->get("id");
        $data = [
            "pil" => $id
        ];
        $this->load->view("erm/rajal/informasi_edukasi/informasi_edukasi_detail", $data);
    }

    public function delete_edukasi_pasien($idx, $id)
    {
        $delete = $this->rajal->deleteEdukasiPasien($idx, $id);
        if ($delete) {
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => true]);
        }
    }

    public function delete_edukasi_pasien_detail($id)
    {
        $delete = $this->rajal->deleteEdukasiPasienDetail($id);
        if ($delete) {
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => true]);
        }
    }

    public function set_final_rekam_medis() {
        $id = $this->input->post("id");
        $status = $this->input->post("status");
        $update = $this->rajal->setFinalRekamMedis($id,$status);
        if ($update) {
            echo json_encode(["status"=>TRUE]);
        } else {
            echo json_encode(["status"=>FALSE]);
        }
    }

    public function get_riwayat_rajal() {
        $nomr = $this->input->post("nomr");
        $list = $this->erm->getPendaftaranListByTipe($nomr,"RJ");
        echo json_encode(["status"=>true,"list"=> $list]);
    }

    public function get_tenaga_medis() {
        $pil = $this->input->post("pil");
        $list = getPegawai([$pil])->result();
        echo json_encode(["status"=>true,"data"=>$list]);
    }

    public function get_riwayat_form() {
        $pil = $this->input->post("pil");
        $nomr = $this->input->post("nomr");
        $idx = $this->input->post("idx");
        $data = [
            "pil" => $pil
        ];
        if ($pil=="awal_rawat") {
            $data["list"] = $this->rajal->getAwalRawatByNomr($nomr);
            $data['idx'] = $idx;
        } else if ($pil=="awal_medis") {
            $data["list"] = $this->rajal->getAwalMedisByNomr($nomr);
            $data['idx'] = $idx;
        } else if ($pil=="cppt") {
            $data["list"] = $this->rajal->getKembangPasienByNomr($nomr);
            $data['idx'] = $idx;
        } else if ($pil=="edukasi_pasien") {
            $data["list"] = $this->rajal->getEdukasiPasienByNomr($nomr);
            $data['idx'] = $idx;
        } else if ($pil=="prmrj") {
            $data["list"] = $this->rajal->getPrmrjByNomr($nomr);
            $data['idx'] = $idx;
            $data['nomr'] = $nomr;
        }

        $this->load->view("erm/rajal/rajal_modal",$data);
        // echo json_encode(["data"=>true]);
    }

    public function prmrj($nomr="") {
        if ($nomr != "") {
           
            $p = $this->erm->getPasien($nomr);
            // kaji awal data
            $k = $this->rajal->getPrmrjByNomr($nomr);
            $data = [
                "p" => $p,
                "k" => $k
            ];

            $this->load->view($this->folder . "/" . $this->subfolder . "/prmrj/prmrj_cetak", $data);
        } else {
            $data = [
                "data" => []
            ];
            $this->load->view($this->folder . "/" . $this->subfolder . "/prmrj/prmrj_cetak_master", compact('data'));
        }
    }

    public function cekPin() {
        $pass = $this->input->post("x");
        $user = $this->input->post("user");
        $cek = cekPasswordUser($pass,$user);
        if ($cek) {
            echo json_encode(["status"=>true]);
        } else {
            echo json_encode(["status"=>false]);
        }
    }

}
