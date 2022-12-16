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
            11 => "", // terbatas
            12 => "", // terbatas list
        ];
        if ($idx != "" && $id != "") {
            // data table setuju umum
            $s = $this->rajal->getSetujuUmumById($id);
            $c[1] = $p->nomr;
            $c[2] = $p->nama;
            $c[3] = date("d-m-Y", strtotime($p->tgl_lahir));
            $c[4] = jns_kelamin($p->jns_kelamin);
            $c[5] = $s->nama;
            $c[6] = $s->tempat_lahir . "/" . date("d-m-Y", strtotime($s->tanggal_lahir));
            $c[7] = $s->alamat;
            $c[8] = $s->phone;
            $c[9] = $s->selaku;

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
        $idx = $this->input->post('idx');
        $nomr = $this->input->post('nomr');
        $privasi_list = implode(';', removeChar($this->input->post('privasi')));
        $terbatas = $this->input->post('terbatas');
        $terbatas_list = implode(';', removeChar($this->input->post('terbatas_list')));
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
        $data = [
            "data" => []
        ];
        $this->load->view($this->folder . "/" . $this->subfolder . "/kaji_awal_medis/kaji_awal_medis_cetak", compact('data'));
    }

    public function kembang_pasien()
    {
        // form rm 0.2.03 rev.02 catatan perkembangan pasien terintegrasi rawat jalan
        $data = [
            "data" => []
        ];
        $this->load->view($this->folder . "/" . $this->subfolder . "/kembang_pasien/kembang_pasien_cetak", compact('data'));
    }

    public function informasi_edukasi()
    {
        // form rm 0.2.03 rev.02 catatan perkembangan pasien terintegrasi rawat jalan
        $data = [
            "data" => []
        ];
        $this->load->view($this->folder . "/" . $this->subfolder . "/informasi_edukasi/informasi_edukasi_cetak", compact('data'));
    }
}
