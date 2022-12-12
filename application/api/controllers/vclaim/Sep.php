<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Sep extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('Vclaim');
    }

    function index()
    {
        echo "Service Actived";
    }

    function insertSEP()
    {
        $response = null;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {sep
            if (isset($_POST['noKartu']) && isset($_POST['tglSep'])) {
                $noKartu = $this->input->post('noKartu', true); // nokartu BPJS
                $tglSep = $this->input->post('tglSep', true); // tanggal penerbitan sep format yyyy-mm-dd
                $ppkPelayanan = $this->input->post('ppkPelayanan', true); // kode faskes pemberi pelayanan -> Default : 0306R001 (RSPP)
                $jnsPelayanan = $this->input->post('jnsPelayanan', true); // jenis pelayanan = 1. r.inap 2. r.jalan 
                $klsRawat = $this->input->post('klsRawat', true); // kelas rawat 1. kelas 1, 2. kelas 2 3.kelas 3
                $noMR = $this->input->post('noMR', true); // nomor medical record RS
                $asalRujukan = $this->input->post('asalRujukan', true); // asal rujukan ->1.Faskes 1, 2. Faskes 2(RS)
                $tglRujukan = $this->input->post('tglRujukan', true); // tanggal rujukan format: yyyy-mm-dd 
                $noRujukan = $this->input->post('noRujukan', true); // nomor rujukan
                $ppkRujukan = $this->input->post('ppkRujukan', true); // kode faskes rujukam -> baca di referensi faskes
                $catatan = $this->input->post('catatan', true); // catatan peserta

                $diagAwal = $this->input->post('diagAwal', true); // diagnosa awal ICD10 -> baca di referensi diagnosa
                $tujuan = $this->input->post('tujuan', true); // kode poli -> baca di referensi poli
                $eksekutif = $this->input->post('eksekutif', true); // poli eksekutif -> 0. Tidak 1.Ya
                if (empty($eksekutif)) $eksekutif = 0;
                $cob = $this->input->post('cob', true); // cob -> 0.Tidak 1. Ya
                if (empty($cob)) $cob = 0;
                $katarak = $this->input->post('katarak', true); // katarak --> 0.Tidak 1.Ya
                if (empty($katarak)) $katarak = 0;
                $lakaLantas = $this->input->post('lakaLantas', true); // Kecelakaan Lalu Lintas --> 0.Tidak 1.Ya
                if (empty($lakaLantas)) $lakaLantas = 0;
                //$penjamin = implode(',',$this->input->post('penjamin',true)); // penjamin lakalantas -> 1=Jasa raharja PT, 2=BPJS Ketenagakerjaan, 3=TASPEN PT, 4=ASABRI PT} jika lebih dari 1 isi -> 1,2 (pakai delimiter koma)
                $pj = $this->input->post('penjamin', true);
                if (!empty($pj)) $penjamin = implode(',', $pj);
                else $penjamin = "";
                $tglKejadian = $this->input->post('tglKejadian', true); // tanggal kejadian KLL format: yyyy-mm-dd
                $keterangan = $this->input->post('keterangan', true); // Keterangan Kejadian KLL

                $suplesi = $this->input->post('suplesi', true); // Suplesi --> 0.Tidak 1. Ya
                $noSepSuplesi = $this->input->post('noSepSuplesi', true); // No.SEP yang Jika Terdapat Suplesi
                $kdPropinsi = $this->input->post('kdPropinsi', true); // Kode Propinsi
                $kdKabupaten = $this->input->post('kdKabupaten', true); // Kode Kabupaten
                $kdKecamatan = $this->input->post('kdKecamatan', true); // Kode Kecamatan
                $noSurat = $this->input->post('noSurat', true); // Nomor Surat Kontrol
                $kodeDPJP = $this->input->post('kodeDPJP', true); // kode dokter DPJP --> baca di referensi dokter DPJP
                $noTelp = $this->input->post('noTelp', true); // nomor telepon
                $user = $this->input->post('user', true); // user pembuat SEP
                $namaPpkRujukan = $this->input->post('namaPpkRujukan');
                $namaTujuan = $this->input->post('namaTujuan');
                $kodeDPJP_melayani = $this->input->post('kodeDokter');
                $namaDPJP_melayani = $this->input->post('namaDokter');
                $namaDPJP = $this->input->post('namaDPJP');
                if ($noKartu !== "" || $tglSep !== "") {

                    $x['request']['t_sep']['noKartu'] = $noKartu;
                    $x['request']['t_sep']['tglSep'] = $tglSep;
                    $x['request']['t_sep']['ppkPelayanan'] = $ppkPelayanan;
                    $x['request']['t_sep']['jnsPelayanan'] = $jnsPelayanan;
                    $x['request']['t_sep']['klsRawat'] = $klsRawat;
                    $x['request']['t_sep']['noMR'] = $noMR;
                    $x['request']['t_sep']['rujukan']['asalRujukan'] = $asalRujukan;
                    $x['request']['t_sep']['rujukan']['tglRujukan'] = $tglRujukan;
                    $x['request']['t_sep']['rujukan']['noRujukan'] = $noRujukan;
                    $x['request']['t_sep']['rujukan']['ppkRujukan'] = $ppkRujukan;
                    $x['request']['t_sep']['catatan'] = $catatan;

                    $x['request']['t_sep']['diagAwal'] = $diagAwal;
                    $x['request']['t_sep']['poli']['tujuan'] = $tujuan;
                    $x['request']['t_sep']['poli']['eksekutif'] = "$eksekutif";
                    $x['request']['t_sep']['cob']['cob'] = "$cob";
                    $x['request']['t_sep']['katarak']['katarak'] = "$katarak";
                    $x['request']['t_sep']['jaminan']['lakaLantas'] = "$lakaLantas";
                    $x['request']['t_sep']['jaminan']['penjamin']['penjamin'] = $penjamin;
                    $x['request']['t_sep']['jaminan']['penjamin']['tglKejadian'] = $tglKejadian;
                    $x['request']['t_sep']['jaminan']['penjamin']['keterangan'] = $keterangan;
                    $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['suplesi'] = $suplesi;
                    $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['noSepSuplesi'] = $noSepSuplesi;
                    $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdPropinsi'] = $kdPropinsi;
                    $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdKabupaten'] = $kdKabupaten;
                    $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdKecamatan'] = $kdKecamatan;
                    $x['request']['t_sep']['skdp']['noSurat'] = $noSurat;
                    $x['request']['t_sep']['skdp']['kodeDPJP'] = $kodeDPJP;
                    $x['request']['t_sep']['noTelp'] = $noTelp;
                    $x['request']['t_sep']['user'] = $user;
                    $response = json_encode($x);
                    //echo $response;
                    //exit;
                    $response = insertSEP(json_encode($x));
                    $res_array = json_decode($response);
                    if ($res_array->metaData->code == 200) {
                        $sep = array(
                            'catatan'       => $res_array->response->sep->catatan,
                            'diagnosa'      => $res_array->response->sep->diagnosa,
                            'jnsPelayanan'  => $res_array->response->sep->jnsPelayanan,
                            'kelasRawat'    => $res_array->response->sep->kelasRawat,
                            'noSep'         => $res_array->response->sep->noSep,
                            'penjamin'      => $res_array->response->sep->penjamin,
                            'asuransi'      => $res_array->response->sep->peserta->asuransi,
                            'hakKelas'      => $res_array->response->sep->peserta->hakKelas,
                            'jnsPeserta'    => $res_array->response->sep->peserta->jnsPeserta,
                            'kelamin'       => $res_array->response->sep->peserta->kelamin,
                            'nama'          => $res_array->response->sep->peserta->nama,
                            'noKartu'       => $res_array->response->sep->peserta->noKartu,
                            'noMr'          => $res_array->response->sep->peserta->noMr,
                            'tglLahir'      => $res_array->response->sep->peserta->tglLahir,
                            'Dinsos'        => $res_array->response->sep->informasi->dinsos,
                            'prolanisPRB'   => $res_array->response->sep->informasi->prolanisPRB,
                            'noSKTM'        => $res_array->response->sep->informasi->noSKTM,
                            'poli'          => $res_array->response->sep->poli,
                            'poliEksekutif' => $res_array->response->sep->poliEksekutif,
                            'tglSep'        => $res_array->response->sep->tglSep,
                            'ppkPelayanan'  =>  $ppkPelayanan,
                            'klsRawat'  => $klsRawat,
                            'asalRujukan'  =>  $asalRujukan,
                            'tglRujukan'  =>  $tglRujukan,
                            'noRujukan'  =>  $noRujukan,
                            'ppkRujukan'  =>  $ppkRujukan,
                            'namaPpkRujukan'  =>  $namaPpkRujukan,
                            'tujuan'  => $tujuan,
                            'namaTujuan'  =>  $namaTujuan,
                            'eksekutif'  =>  $eksekutif,
                            'cob'  =>  $cob,
                            'katarak'  =>  $katarak,
                            'lakaLantas'  =>  $lakaLantas,
                            'tglKejadian'  =>  $tglKejadian,
                            'keterangan'  =>  $keterangan,
                            'suplesi'  => $suplesi,
                            'noSepSuplesi'  => $noSepSuplesi,
                            'kdPropinsi'  =>  $kdPropinsi,
                            'kdKabupaten'  =>  $kdKabupaten,
                            'kdKecamatan'  =>  $kdKecamatan,
                            'noSurat'  =>  $noSurat,
                            'kodeDPJP'  =>  $kodeDPJP,
                            'namaDPJP'  => $namaDPJP,
                            'kodeDPJP_melayani'  =>  $kodeDPJP_melayani,
                            'namaDPJP_melayani'  =>  $namaDPJP_melayani,
                            'noTelp'  =>  $noTelp,
                            'user' => $user

                        );
                        //print_r($sep);
                        $this->db->insert('tbl02_sep_response', $sep);

                        $idx = intval($this->input->post('idx'));
                        if (!empty($idx)) {
                            $update = array(
                                'id_cara_bayar' => 2,
                                'no_jaminan' => $res_array->response->sep->noSep,
                                'no_rujuk'  => $noRujukan,
                            );
                            $this->db->where('idx', $idx);
                            $this->db->update('tbl02_pendaftaran', $update);
                        }
                    } else {

                        $res_array->req = $x;
                        $response = json_encode($res_array);
                    }
                } else {
                    $x['metaData']['code'] = 201;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            } else {
                $x['metaData']['code'] = 201;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        } else {
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }

    function updateSEP()
    {
        $response = null;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['noKartu']) && isset($_POST['tglSep'])) {
                $noKartu = $this->input->post('noKartu', true); // nokartu BPJS
                $tglSep = $this->input->post('tglSep', true); // tanggal penerbitan sep format yyyy-mm-dd
                $ppkPelayanan = $this->input->post('ppkPelayanan', true); // kode faskes pemberi pelayanan -> Default : 0306R001 (RSPP)
                $jnsPelayanan = $this->input->post('jnsPelayanan', true); // jenis pelayanan = 1. r.inap 2. r.jalan 
                $klsRawat = $this->input->post('klsRawat', true); // kelas rawat 1. kelas 1, 2. kelas 2 3.kelas 3
                $noMR = $this->input->post('noMR', true); // nomor medical record RS
                $asalRujukan = $this->input->post('asalRujukan', true); // asal rujukan ->1.Faskes 1, 2. Faskes 2(RS)
                $tglRujukan = $this->input->post('tglRujukan', true); // tanggal rujukan format: yyyy-mm-dd 
                $noRujukan = $this->input->post('noRujukan', true); // nomor rujukan
                $ppkRujukan = $this->input->post('ppkRujukan', true); // kode faskes rujukam -> baca di referensi faskes
                $catatan = $this->input->post('catatan', true); // catatan peserta

                $diagAwal = $this->input->post('diagAwal', true); // diagnosa awal ICD10 -> baca di referensi diagnosa
                $tujuan = $this->input->post('tujuan', true); // kode poli -> baca di referensi poli
                $eksekutif = $this->input->post('eksekutif', true); // poli eksekutif -> 0. Tidak 1.Ya
                $cob = $this->input->post('cob', true); // cob -> 0.Tidak 1. Ya
                $katarak = $this->input->post('katarak', true); // katarak --> 0.Tidak 1.Ya
                $lakaLantas = $this->input->post('lakaLantas', true); // Kecelakaan Lalu Lintas --> 0.Tidak 1.Ya
                $penjamin = $this->input->post('penjamin', true); // penjamin lakalantas -> 1=Jasa raharja PT, 2=BPJS Ketenagakerjaan, 3=TASPEN PT, 4=ASABRI PT} jika lebih dari 1 isi -> 1,2 (pakai delimiter koma)
                $tglKejadian = $this->input->post('tglKejadian', true); // tanggal kejadian KLL format: yyyy-mm-dd
                $keterangan = $this->input->post('keterangan', true); // Keterangan Kejadian KLL

                $suplesi = $this->input->post('suplesi', true); // Suplesi --> 0.Tidak 1. Ya
                $noSepSuplesi = $this->input->post('noSepSuplesi', true); // No.SEP yang Jika Terdapat Suplesi
                $kdPropinsi = $this->input->post('kdPropinsi', true); // Kode Propinsi
                $kdKabupaten = $this->input->post('kdKabupaten', true); // Kode Kabupaten
                $kdKecamatan = $this->input->post('kdKecamatan', true); // Kode Kecamatan
                $noSurat = $this->input->post('noSurat', true); // Nomor Surat Kontrol
                $kodeDPJP = $this->input->post('kodeDPJP', true); // kode dokter DPJP --> baca di referensi dokter DPJP
                $noTelp = $this->input->post('noTelp', true); // nomor telepon
                $user = $this->input->post('user', true); // user pembuat SEP

                if ($noKartu !== "" || $tglSep !== "") {

                    $x['request']['t_sep']['noKartu'] = $noKartu;
                    $x['request']['t_sep']['tglSep'] = $tglSep;
                    $x['request']['t_sep']['ppkPelayanan'] = $ppkPelayanan;
                    $x['request']['t_sep']['jnsPelayanan'] = $jnsPelayanan;
                    $x['request']['t_sep']['klsRawat'] = $klsRawat;
                    $x['request']['t_sep']['noMR'] = $noMR;
                    $x['request']['t_sep']['rujukan']['asalRujukan'] = $asalRujukan;
                    $x['request']['t_sep']['rujukan']['tglRujukan'] = $tglRujukan;
                    $x['request']['t_sep']['rujukan']['noRujukan'] = $noRujukan;
                    $x['request']['t_sep']['rujukan']['ppkRujukan'] = $ppkRujukan;
                    $x['request']['t_sep']['catatan'] = $catatan;

                    $x['request']['t_sep']['diagAwal'] = $diagAwal;
                    $x['request']['t_sep']['poli']['tujuan'] = $tujuan;
                    $x['request']['t_sep']['poli']['eksekutif'] = $eksekutif;
                    $x['request']['t_sep']['cob']['cob'] = $cob;
                    $x['request']['t_sep']['katarak']['katarak'] = $katarak;
                    $x['request']['t_sep']['jaminan']['lakaLantas'] = $lakaLantas;
                    $x['request']['t_sep']['jaminan']['penjamin']['penjamin'] = $penjamin;
                    $x['request']['t_sep']['jaminan']['penjamin']['tglKejadian'] = $tglKejadian;
                    $x['request']['t_sep']['jaminan']['penjamin']['keterangan'] = $keterangan;
                    $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['suplesi'] = $suplesi;
                    $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['noSepSuplesi'] = $noSepSuplesi;
                    $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdPropinsi'] = $kdPropinsi;
                    $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdKabupaten'] = $kdKabupaten;
                    $x['request']['t_sep']['jaminan']['penjamin']['suplesi']['lokasiLaka']['kdKecamatan'] = $kdKecamatan;
                    $x['request']['t_sep']['skdp']['noSurat'] = $noSurat;
                    $x['request']['t_sep']['skdp']['kodeDPJP'] = $kodeDPJP;
                    $x['request']['t_sep']['noTelp'] = $noTelp;
                    $x['request']['t_sep']['user'] = $user;
                    //$response = json_encode($x);  
                    $response = updateSEP(json_encode($x));
                } else {
                    $x['metaData']['code'] = 201;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            } else {
                $x['metaData']['code'] = 201;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        } else {
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }

    function cariSEP()
    {
        $response = null;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['param1'])) {
                $param1 = $this->input->post('param1', true); // Nomor SEP
                if ($param1 !== "") {
                    $response = cariSEP($param1);
                } else {
                    $x['metaData']['code'] = 201;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            } else {
                $x['metaData']['code'] = 201;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        } else {
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }

    function hapusSEP()
    {
        $response = null;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['param1']) && isset($_POST['param2'])) {
                $nosep = $this->input->post('param1', true); // Nomor SEP
                $user = $this->input->post('param2', true); // user pembuat SEP

                if ($nosep !== "") {
                    $x['request']['t_sep']['noSep'] = $nosep;
                    $x['request']['t_sep']['user'] = $user;
                    //echo json_encode($x);
                    $batal=array('batal'=>1,'userbatal'=> $user);
                    $this->db->where('noSep', $nosep);
                    $this->db->update('tbl02_sep_response',$batal);
                    $response = hapusSEP(json_encode($x));
                } else {
                    $x['metaData']['code'] = 201;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            } else {
                $x['metaData']['code'] = 201;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        } else {
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }
}
