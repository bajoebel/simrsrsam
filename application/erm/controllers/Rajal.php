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
        $c = [
            1 => "", // nomor rekam medis
            2 => "", // nama pasien
            3 => "", // tempat tanggal lahir
            4 => "", // jenis kelamin
            5 => "", // kebangsaan
            6 => "", // agama
            7 => "", // pekerjaan
            8 => "", // alama kantor
            9 => "", // no ktp
            10 => "", // no telp
            11 => "", // alamat rumah
            12 => "", // tanggal kunjungan
            13 => "", // jam
            14 => "", // nama pj
            15 => "", // umur pj
            16 => "", // pekerjaan pj
            17 => "", // alamat pj
            18 => "", // no telp
            19 => "", // hub keluarga
            20 => "", // dikirim oleh
            21 => "", // alamat pengirim,
            22 => "" // dokter jaga
        ];
        $p = $this->erm->getPendaftaran($idx);

        if ($idx != "") {
            $d = $this->erm->getPendaftaran($idx);
            $p = $this->erm->getPasien($d->nomr);
            $c[1] = $p->nomr;
            $c[2] = $p->nama;
            $c[3] = $p->tempat_lahir . "/" . date("d-m-Y", strtotime($p->tgl_lahir));
            $c[4] = jns_kelamin($p->jns_kelamin);
            $c[5] = $p->kewarganegaraan;
            $c[6] = $p->agama;
            $c[7] = $p->pekerjaan;
            $c[8] = $p->alamat;
            $c[9] = $p->no_ktp;
            $c[10] = $p->no_telpon . "." . $p->no_hp;
            $c[11] = $p->alamat;
            $c[12] = date("d-m-Y", strtotime($p->tgl_daftar));
            $c[13] = date("h:i:s", strtotime($p->tgl_daftar));
            $c[14] = $p->penanggung_jawab;
            $c[15] = $p->umur_pj;
            $c[16] = $p->pekerjaan_pj;
            $c[17] = $p->alamat_pj;
            $c[18] = $p->no_penanggung_jawab;
            $c[19] = $p->hub_keluarga;
            $c[20] = $p->tujuan_daftar;
            $c[21] = $p->tujuan_daftar;
            $c[22] = $p->sdmrs;
            $data = [
                "status" => true,
                "p" => $p,
            ];
        } else {
            $data = [
                "status" => false
            ];
        }
        $data['c'] = $c;

        $this->load->view($this->folder . "/" . $this->subfolder . "/masuk_rj/masuk_rj_cetak", $data);
    }

    public function setuju_umum($idx = "", $id = "")
    {
        // form rm 1.1.00 rev.02
        // data pendaftaran
        $d = $this->erm->getPendaftaran($idx);
        // data pasien
        $p = $this->erm->getPasien($d->nomr);

        $c = [
            1 => "", // nomor rekam medis
            2 => "", // nama pasien
            3 => "", // tanggal lahir
            4 => "", // jenis kelamin
            5 => "", // nama ttd
            6 => "", // tempat tanggal lahir ttd
            7 => "", // alamat
            8 => "", // no telp
            9 => "", // selaku
            10 => "", // privasi list
            11 => "", // 
            12 => "", // 
            13 => "", // 
            14 => "", // 
            15 => "", // 
        ];
        if ($idx != "" && $id != "") {

            // data table setuju umum
            $s = $this->rajal->getSetujuUmumById($idx, $id);
            if ($s->selaku == "lainnya") {
                $s->selaku = $s->selaku_lainnya;
            }
            // $arr_privasi = explode(";", $s->privasi_list);
            // $privasi = "";
            // for ($ap = 1; $ap < count($arr_privasi); $ap++) {
            //     $privasi .= "<span>&nbsp;&nbsp;&nbsp;" . $ap . ". " . $arr_privasi[$ap] . " </span><br/>";
            // }
            $privasi_list = arr_to_list($s->privasi_list);
            if ($s->terbatas == 1) {
                $terbatas = "&#9745;";
            } else {
                $terbatas = "&#9744;";
            }
            $terbatas_list = arr_to_list($s->terbatas_list);
            $c[1] = $p->nomr;
            $c[2] = $p->nama;
            $c[3] = date("d-m-Y", strtotime($p->tgl_lahir));
            $c[4] = jns_kelamin($p->jns_kelamin);
            $c[5] = $s->nama;
            $c[6] = $s->tempat_lahir . "/" . date("d-m-Y", strtotime($s->tanggal_lahir));
            $c[7] = $s->alamat;
            $c[8] = $s->phone;
            $c[9] = $s->selaku;
            $c[10] = $privasi_list;
            $c[11] = $terbatas;
            $c[12] = $terbatas_list;
            $c[13] = $s->selaku;
            $c[14] = strtoupper($s->nama);
            $c[15] = getNamaDokter($d->user_daftar);


            $data = [
                "status" => true,
                "p" => $p,
                "s" => $s
            ];
        } else {
            $data = [
                "status" => false
            ];
        }
        $data['c'] = $c;
        $this->load->view($this->folder . "/" . $this->subfolder . "/setuju_umum/setuju_umum_cetak", $data);
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

    public function kaji_awal()
    {
        // form rm 0200 rev.01 surat masuk rawat jalan
        $data = [
            "data" => []
        ];
        $this->load->view($this->folder . "/" . $this->subfolder . "/kaji_awal/kaji_awal_cetak", compact('data'));
    }

    public function kaji_awal_medis()
    {
        // form rm 0203 rev.01 surat masuk rawat jalan
        $c = [
            1 => "", // hari
            2 => "", // tanggal
            3 => "", // jam
            4 => "", // auto
            5 => "", // auto_detail
            6 => "", // allo
            7 => "", // allo_detail
            8 => "", // TD
            9 => "", // Nadi
            10 => "", // Pernapasan
            11 => "", // Suhu
            12 => "", // Keterangan Pemeriksaan fisik
            13 => "", // diagnosis kerja
            14 => "", // diagnosis banding
            15 => "", // pemeriksaan penunjang
            16 => "", // therapi/tindakan
            17 => "", // kontrol
            18 => "", // kontrol tanggal
            19 => "", // kontrol jam
            20 => "", // kontrol tujuan
            21 => "", // penjelasan,
            22 => "" // lainnya...
        ];
        $data = [
            "data" => []
        ];
        $this->load->view($this->folder . "/" . $this->subfolder . "/kaji_awal_medis/kaji_awal_medis_cetak", compact('data'));
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
            "fisik_detail_m" => $this->input->post("fisik_detail_m"),
            "diagnosis_kerja" => $this->input->post("diagnosis_kerja_m"),
            "diagnosis_banding" => $this->input->post("diagnosis_banding_m"),
            "penunjang" => $this->input->post("penunjang_m"),
            "terapi" => $this->input->post("terapi_m"),
            "kontrol" => $this->input->post("kontrol_m"),
            "kontrol_tgl" => $this->input->post("kontrol_tanggal_m"),
            "kontrol_jam" => $this->input->post("kontrol_jam_m"),
            "kontrol_tujuan" => $this->input->post("kontrol_tujuan_m"),
            "pj" => $this->input->post("pj_m"),
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

    public function delete_kaji_awal_medis($idx, $id)
    {
        $delete = $this->rajal->deleteAwalMedis($idx, $id);
        if ($delete) {
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => true]);
        }
    }

    public function kembang_pasien()
    {
        // form rm 0.2.03 rev.02 catatan perkembangan pasien terintegrasi rawat jalan
        $data = [
            "data" => []
        ];
        $this->load->view($this->folder . "/" . $this->subfolder . "/kembang_pasien/kembang_pasien_cetak", compact('data'));
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
            "jenis_tenaga_medis" => jenis_tenaga_medis($this->input->post("jenis_tenaga_medis_id_k")),
            "nama_tenaga_medis" => $this->input->post("nama_tenaga_medis_k"),
            "subyektif" => $this->input->post("subyektif_k"),
            "obyektif" => $this->input->post("obyektif_k"),
            "assesment" => $this->input->post("assesment_k"),
            "planning" => $this->input->post("planning_k"),
            "intruksi" => $this->input->post("intruksi_k"),
            "review" => $this->input->post("review_k"),
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
    public function informasi_edukasi()
    {
        // form rm 0.2.03 rev.02 catatan perkembangan pasien terintegrasi rawat jalan
        $data = [
            "data" => []
        ];
        $this->load->view($this->folder . "/" . $this->subfolder . "/informasi_edukasi/informasi_edukasi_cetak", compact('data'));
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
            "topik_list" => $this->input->post("topik_list"),
            "metode" => $this->input->post("metode"),
            "media" => $this->input->post("media"),
            "sasaran" => $this->input->post("sasaran"),
            "evaluasi_awal" => $this->input->post("evaluasi_awal"),
            "pemberi_edukasi" => $this->input->post("pemberi_edukasi"),
            "verifikasi" => $this->input->post("verifikasi"),
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
}
