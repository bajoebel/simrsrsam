<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Erm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        $this->load->model('users_model');
        $this->load->model('erm_model');
        $this->load->model('nota_model');
        $this->load->model('Layanan_model');
        $this->load->model('Rekammedis_model');
        $this->load->model('Rajal_model', 'rajal');
        $this->load->library("Datatables");
    }
    function index()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if ($this->session->userdata('kdlokasi')) {
                    $this->session->unset_userdata('sPage');
                    $this->session->unset_userdata('sLike');
                    if ($this->session->userdata('kdlokasi') == "") {
                        $response['code'] = 402;
                        $response['message'] = "Ops. Lokasi Layanan tidak ditemukan. Coba ulangi kembali.";
                    } else {
                        $z = setNav("nav_2");
                        $ruang = $this->nota_model->getRuang($this->session->userdata('kdlokasi'));
                        $param = array('jns_layanan' => 'jns_layanan');
                        $jns_layanan = 'RJ';
                        if ($ruang->grid == 1 || $ruang->grid == 4) {
                            $jns_layanan = 'RJ';
                            $field = array('id_daftar', 'reg_unit', 'tgl_masuk', 'nomr', 'nama_pasien', 'tgl_lahir', '=jekel[{{jns_kelamin}}]', 'namaDokterJaga', '{{nama_ruang}}', 'cara_bayar', '=action[{{status_pasien}}]','=erm[{{status_erm}}]');
                            $param = array('jns_layanan' => 'jns_layanan', 'dari' => 'tglAwal', 'sampai' => 'tglAkhir');
                            $kondisi = array('idruang' => $this->session->userdata('kdlokasi'), 'dokter' => 1);
                            $dokter = $this->Layanan_model->getDokter($kondisi);
                        } elseif ($ruang->grid == 2) {
                            $jns_layanan = 'RI';
                            $kondisi = array('idruang' => $this->session->userdata('kdlokasi'), 'dokter' => 1);
                            $dokter = $this->Layanan_model->getDokter($kondisi);

                            $field = array('id_daftar', 'reg_unit', 'tgl_masuk', 'nomr', 'nama_pasien', 'tgl_lahir', '=jekel[{{jns_kelamin}}]', 'namaDokterJaga', '{{nama_ruang}} / {{nama_kamar}} ', 'kelas_layanan', 'cara_bayar', '=action[{{status_pasien}}]');
                        } elseif ($ruang->grid == 3) {
                            $jns_layanan = 'PJ';
                            $kondisi = array('idruang' => $this->session->userdata('kdlokasi'), 'dokter' => 1);
                            $dokter = $this->Layanan_model->getDokter($kondisi);
                            $param = array('jns_layanan' => 'jns_layanan', 'dari' => 'tglAwal', 'sampai' => 'tglAkhir');
                            $field = array('id_daftar', 'reg_unit', 'tgl_masuk', 'nomr', 'nama_pasien', 'tgl_lahir', 'jns_kelamin', 'namaDokterJaga', '{{nama_ruang}}', 'cara_bayar', '=action[{{status_pasien}}]');
                        } else $notif = 0;

                        $action = "<div class='btn-group'><button onclick='pilihPasien({{idx}})' class='btn btn-danger btn-sm'><span class='fa fa-search'></span> Pilih</button></div>";
                        $config = array(
                            'url'           => 'erm.php/layanan/getdata',
                            'variable'      => array('idx' => 'idx', 'nama_ruang' => 'nama_ruang', 'nama_kamar' => 'nama_kamar', 'jns_kelamin' => 'jns_kelamin', 'status_pasien' => 'status_pasien','status_erm' => 'status_erm'),
                            'field'         => $field,
                            'function'      => 'getPasienSaatini',
                            'keyword_id'    => 'q',
                            'param_id'      => $param,
                            'limit_id'      => 'limit',
                            'data_id'       => 'data',
                            'page_id'       => 'pagination',
                            'number'        => true,
                            'action'        => true,
                            'load'          => true,
                            'action_button' => $action,
                        );
                        // if ($jns_layanan == "RI") {
                        //     $action = "<div class='btn-group'><button onclick='registrasiPasien({{idx}})' class='btn btn-success btn-sm' id='terima{{idx}}'><span class='fa fa-check'></span> Terima</button></div>";
                        //     $field = array('id_daftar', 'reg_unit', 'tgl_minta', 'nomr', 'nama_pasien', '{{nama_ruang_pengirim}} / {{nama_kamar_pengirim}}', 'nama_dokter_pengirim');
                        // } elseif ($jns_layanan == "RJ") {
                        //     $action = "<div class='btn-group'><button onclick='registrasiPasienRujukInternal({{idx}})' class='btn btn-success btn-sm'><span class='fa fa-check'></span> Terima</button></div>";
                        //     $field = array('id_daftar', 'reg_unit', 'tgl_minta', 'nomr', 'nama_pasien', '{{nama_ruang_pengirim}} ', 'nama_dokter_pengirim');
                        // } else {
                        //     $action = "<div class='btn-group'><button onclick='persetujuanRegistrasi({{idx}})' class='btn btn-success btn-sm'><span class='fa fa-check'></span> Terima</button></div>";
                        //     $field = array('id_daftar', 'reg_unit', 'tgl_minta', 'nomr', 'nama_pasien', '{{nama_ruang_pengirim}} ', 'nama_dokter_pengirim');
                        // }

                        $data = array(
                            'contentTitle' => 'Cari Pasien',
                            'ruangID' => $this->session->userdata('kdlokasi'),
                            'ruang' => $ruang,
                            'getDokter' => $dokter,
                            'kelas' => $this->db->get('tbl01_kelas_layanan')->result()
                        );
                        //echo "<script>".getData($config2)."</script>";exit;

                        //$actionbatal= "var batal = {'$btnbatal','Sudah Diresponse'}";
                        $theme = array(
                            'header' => $this->load->view('template/header', '', true),
                            'index_menu' => 2,
                            'nav_sidebar' => $this->load->view('template/nav_sidebar', $z, true),
                            'content' => $this->load->view('erm/erm_index', $data, true),
                            'ajaxdata' => "var jekel = {'1':'Laki-Laki','2':'Perempuan','3':'Tidak Dapat Didefenisikan','4':'Tidak Diketahui'};
                                            var response = {'0':'<span class=\"btn btn-danger btn-xs\" >Belum Diresponse</span>','1':'<span class=\"btn btn-success btn-xs\">Sudah Diresponse</span>'}; 
                                            var erm = {'0':'<span class=\"pull-right badge bg-yellow\" >Proses</span>','1':'<span class=\"pull-right badge bg-green btn-xs\">Final</span>'}; 
                                            var action = {'1':'<span class=\"pull-right badge bg-green\">Aktif</span>','2':'<span class=\"pull-right badge bg-yellow\">Dirawat</span>','3':'<span class=\"pull-right badge bg-yellow\">Menunggu Response <br>Pindah</span>','4':'<span class=\"pull-right badge bg-yellow\">Sudah Pindah</span>','5':'<span class=\"pull-right badge bg-yellow\">Sudah Pulang</span>','6':'<span class=\"pull-right badge bg-yellow\">Batal Berobat</span>'}; 
                                            var dis=['','disabled']" . getData($config),
                            'lib' => array('js/layanan.js', 'js/daftarlayanan.js')
                        );
                        //<button onclick='pilihPasien({{idx}})' class='btn btn-danger btn-sm'><span class='fa fa-search'></span> Pilih</button>
                        $this->load->view('template/theme', $theme);
                    }
                } else {
                    $response['code'] = 402;
                    $response['message'] = "Ops. Lokasi Login tidak diketahui. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
            }
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'erm.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }

    function detail()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $idx = intval($this->input->get('idx'));
            $detail = $this->erm_model->getPendaftaran($idx);
            $folder = "rajal";
            $pasien = array();
            $s = $this->rajal->getSetujuUmumByIdx($idx);
            $ar = $this->rajal->getAwalRawatByIdx($idx);
            $am = $this->rajal->getAwalMedisByIdx($idx);
            $ep = $this->rajal->getEdukasiPasienByIdx($idx);
            $pp = $this->rajal->getPermintaanPenunjangByIdx($idx);
            $pr = $this->rajal->getPermintaanResepDetailByIdx($idx);
            if (!empty($detail)) {
                if ($detail->jns_layanan == "PJ") $folder = 'penunjang';
                else if ($detail->jns_layanan == "GD") $folder = 'igd';
                else if ($detail->jns_layanan == "RI") $folder = 'ranap';
                $pasien = $this->erm_model->getPasien($detail->nomr);
            }

            $z = setNav("nav_2");
            $ta = [
                "1" => "", //surat masuk rawat jalan
                "2" => "", //persetujuan umum
                "3" => "", //kajian awal keperawatan 
                "4" => "", //kajian awal medis
                "5" => "", //cppt
                "6" => "", //edukasi pasien
                "7" => "", //Permintaan Penunjang
                "8" => "", //Permintaan Resep
                "9" => "", //Permintaan Resep
                "10" => "", //Permintaan Resep
            ];
            $ta["1"] = "active";
            $data = array(
                'contentTitle' => 'E Rekam Medis',
                'detail' => $detail,
                'pasien' => $pasien,
                "ta" => $ta,
                "ruang" => get_list_ruang("RJ"),
                "dpjp" => get_list_dpjp(),
                "profesi" => get_list_profesi(1),
                "sdki" => get_list_sdki(),
                "siki" => get_list_siki(),
                "slki" => get_list_slki(),
                "s" => $s,
                "ar" => ($ar)?$ar->id:"",
                "am" => ($am)?$am->id:"",
                "kp" => 0,
                "pp" => $pp,
                "pr" => $pr

            );

            $view = array(
                'header' => $this->load->view('template/header', '', true),
                'nav_sidebar' => $this->load->view('template/nav_sidebar', $z, true),
                'content' => $this->load->view('erm/' . $folder . '/' . $folder . '_index', $data, true),
            );
            $this->load->view('template/theme', $view);
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'erm.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }

    function detail_permintaan() {

        $id = $this->input->get("id");
        $idx = $this->input->get("idx");
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $idx = intval($this->input->get('idx'));
            $detail = $this->erm_model->getPendaftaran($idx);
             if (!empty($detail)) {
                $folder = "penunjang";
                $pasien = $this->erm_model->getPasien($detail->nomr);
            }
            $z = setNav("nav_2");
            $data = array(
                'contentTitle' => 'E Rekam Medis',
                'detail' => $detail,
                'pasien' => $pasien,
                "penunjang" => getPermintaanPenunjangById($id),
                "penunjang_detail" => getPermintaanPenunjangDetail($id)
            );

            $view = array(
                'header' => $this->load->view('template/header', '', true),
                'nav_sidebar' => $this->load->view('template/nav_sidebar', $z, true),
                'content' => $this->load->view('erm/' . $folder . '/' . $folder . '_index', $data, true),
            );
            $this->load->view('template/theme', $view);
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'erm.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }

    function detail_resep() {

    }

    function riwayat()
    {
        $pil = $this->input->post("pil");
        $idx = $this->input->post("idx");

        $d = $this->erm_model->getPendaftaran($idx);
        $data = [
            "pil" => $pil,
            "jns_layanan" => "RJ",
            "detail" => $d
        ];
        if ($pil == 1) {
            $data['list'] = $this->rajal->masukRajal($d->nomr,$idx);
        } else if ($pil == 2) {
            $data['list'] = $this->rajal->getSetujuUmum($d->nomr, $d->idx)->result();
        } else if ($pil==3) {
            $data['list'] = $this->rajal->getAwalRawat($d->nomr, $d->idx)->result();
        } else if ($pil == 4) {
            $data['list'] = $this->rajal->getAwalMedis($d->nomr, $d->idx)->result();
        } else if ($pil == 5) {
            $data['list'] = $this->rajal->getKembangPasien($d->nomr, $d->idx)->result();
        } else if ($pil == 6) {
            $data['list'] = $this->rajal->getEdukasiPasien($d->nomr, $d->idx)->result();
        }

        $this->load->view("erm/rajal/rajal_riwayat", $data);
    }

    function get_permintaan_json() {
        header('Content-Type: application/json');
        echo $this->erm_model->getPermintaan();
    }
    function get_permintaan_json_() {
		$ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $q = urldecode($this->input->get('keyword', TRUE));
            $start = intval($this->input->get('start'));
            $limit = intval($this->input->get('limit'));
            $jenis_layanan = urldecode($this->input->get('jns_layanan', TRUE));
            //echo $jenis_layanan;exit;
            if ($jenis_layanan == 'RJ' || $jenis_layanan == 'GD' || $jenis_layanan == "PJ") {
                $kondisi = array('status_pasien != ' => 6, "DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') >=" => urldecode($this->input->get('dari', TRUE)), "DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <=" => urldecode($this->input->get('sampai', TRUE)));
            } else $kondisi = " (status_pasien=1 OR status_pasien=3) ";
            $mulai = ($start * $limit) - $limit;
            $ruangid = $this->session->userdata('kdlokasi');

            $response = array(
                'status'    => true,
                'message'   => "OK",
                'start'     => $mulai,
                'row_count' => $this->Layanan_model->countData($q, $ruangid, $jenis_layanan, $kondisi),
                'limit'     => $limit,
                'data'      => $this->Layanan_model->getData($limit, $mulai, $q, $ruangid, $jenis_layanan, $kondisi),
            );
        } else {
            $response = array('status' => false, 'message' => 'Session Expired');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}