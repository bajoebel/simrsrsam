<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Layanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->helper('ajaxdata');
        $this->load->model('users_model');
        $this->load->model('nota_model');
        $this->load->model('Layanan_model');
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
                            //Ambil data dokter per ruangan
                            $kondisi = array('idruang' => $this->session->userdata('kdlokasi'), 'dokter' => 1);
                            $dokter = $this->Layanan_model->getDokter($kondisi);
                            $notif = $this->nota_model->getNotif('internal', $this->session->userdata('kdlokasi'));
                            $field = array('id_daftar', 'reg_unit', 'tgl_masuk', 'nomr', 'nama_pasien', 'tgl_lahir', '=jekel[{{jns_kelamin}}]', 'namaDokterJaga', '{{nama_ruang}}', 'cara_bayar', '=action[{{status_pasien}}]');
                            $param = array('jns_layanan' => 'jns_layanan', 'dari' => 'tglAwal', 'sampai' => 'tglAkhir');
                        } elseif ($ruang->grid == 2) {
                            $jns_layanan = 'RI';
                            $kondisi = array('idruang' => $this->session->userdata('kdlokasi'), 'dokter' => 1);
                            $dokter = $this->Layanan_model->getDokter($kondisi);
                            $notif = $this->nota_model->getNotif('kamar', $this->session->userdata('kdlokasi'));
                            //Config Tampil Data Rawat Inap
                            $field = array('id_daftar', 'reg_unit', 'tgl_masuk', 'nomr', 'nama_pasien', 'tgl_lahir', '=jekel[{{jns_kelamin}}]', 'namaDokterJaga', '{{nama_ruang}} / {{nama_kamar}}', 'kelas_layanan', 'cara_bayar', '=action[{{status_pasien}}]');
                        } elseif ($ruang->grid == 3) {
                            $jns_layanan = 'PJ';
                            $kondisi = array('idruang' => $this->session->userdata('kdlokasi'), 'dokter' => 1);
                            $dokter = $this->Layanan_model->getDokter($kondisi);
                            $notif = $this->nota_model->getNotif('penunjang', $this->session->userdata('kdlokasi'));
                            $field = array('id_daftar', 'reg_unit', 'tgl_masuk', 'nomr', 'nama_pasien', 'tgl_lahir', 'jns_kelamin', 'namaDokterJaga', '{{nama_ruang}}', 'cara_bayar');
                        } else $notif = 0;

                        $action = "<div class='btn-group'><button onclick='pilih({{idx}})' class='btn btn-success btn-sm'><span class='fa fa-search'></span> Pilih</button></div>";
                        $config = array(
                            'url'           => 'nota_tagihan.php/layanan/getdata',
                            'variable'      => array('idx' => 'idx', 'nama_ruang' => 'nama_ruang', 'nama_kamar' => 'nama_kamar', 'jns_kelamin' => 'jns_kelamin', 'status_pasien' => 'status_pasien'),
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
                        if ($jns_layanan == "RI") {
                            $action = "<div class='btn-group'><button onclick='registrasiPasien({{idx}})' class='btn btn-success btn-sm'><span class='fa fa-check'></span> Terima</button></div>";
                            $field = array('id_daftar', 'reg_unit', 'tgl_minta', 'nomr', 'nama_pasien', '{{nama_ruang_pengirim}} / {{nama_kamar_pengirim}}', 'nama_dokter_pengirim');
                        } elseif ($jns_layanan == "RJ") {
                            $action = "<div class='btn-group'><button onclick='registrasiPasienRujukInternal({{idx}})' class='btn btn-success btn-sm'><span class='fa fa-check'></span> Terima</button></div>";
                            $field = array('id_daftar', 'reg_unit', 'tgl_minta', 'nomr', 'nama_pasien', '{{nama_ruang_pengirim}} ', 'nama_dokter_pengirim');
                        } else {
                            $action = "<div class='btn-group'><button onclick='persetujuanRegistrasi({{idx}})' class='btn btn-success btn-sm'><span class='fa fa-check'></span> Terima</button></div>";
                            $field = array('id_daftar', 'reg_unit', 'tgl_minta', 'nomr', 'nama_pasien', '{{nama_ruang_pengirim}} ', 'nama_dokter_pengirim');
                        }

                        $config1 = array(
                            'url'           => 'nota_tagihan.php/layanan/datapermintaanpindah',
                            'variable'      => array('idx' => 'idx', 'nama_ruang_pengirim' => 'nama_ruang_pengirim', 'nama_kamar_pengirim' => 'nama_kamar_pengirim', 'jns_kelamin' => 'jns_kelamin', 'status_pasien' => 'status_pasien'),
                            'field'         => $field,
                            'function'      => 'getPermintaan',
                            'keyword_id'    => 'q1',
                            'param_id'      => $param,
                            'limit_id'      => 'limit1',
                            'data_id'       => 'data1',
                            'page_id'       => 'pagination1',
                            'number'        => true,
                            'action'        => true,
                            'load'          => false,
                            'action_button' => $action,
                        );
                        $btnbatal = "<div class=\'btn-group\'><button onclick=\'batal({{idx}})\' \"+dis[[[status_pindah]]]+\" class=\'btn btn-danger btn-sm\'><span class=\'fa fa-remove\'></span> Batal Pindah</button></div>";
                        $config2 = array(
                            'url'           => 'nota_tagihan.php/layanan/riwayatpindah',
                            'variable'      => array('idx' => 'idx', 'nama_ruang' => 'nama_ruang', 'nama_kamar' => 'nama_kamar', 'jns_kelamin' => 'jns_kelamin', 'status_pindah' => 'status_pindah', 'disabled' => 'disabled'),
                            'field'         =>  array('id_daftar', 'reg_unit', 'tgl_minta', 'nomr', 'nama_pasien', '{{nama_ruang}} / {{nama_kamar}}', 'nama_dokter_pengirim', '=response[{{status_pindah}}]'),
                            'function'      => 'riwayatPindah',
                            'keyword_id'    => 'q2',
                            'param_id'      => $param,
                            'limit_id'      => 'limit2',
                            'data_id'       => 'data2',
                            'page_id'       => 'pagination2',
                            'number'        => true,
                            'action'        => true,
                            'load'          => false,
                            'action_button' => $btnbatal,
                        );
                        $btnbatal = "<div class=\'btn-group\'><button onclick=\'batalPulang({{idx}})\' class=\'btn btn-danger btn-sm\'><span class=\'fa fa-remove\'></span> Batal Pulang</button></div>";
                        $config3 = array(
                            'url'           => 'nota_tagihan.php/layanan/riwayatpulang',
                            'variable'      => array('idx' => 'idx', 'nama_ruang' => 'nama_ruang', 'los' => 'los', 'jns_kelamin' => 'jns_kelamin', 'status_pindah' => 'status_pindah', 'disabled' => 'disabled'),
                            'field'         =>  array('id_daftar', 'reg_unit', 'tgl_keluar', '{{los}} Hari', 'nomr', 'nama_pasien', 'nama_ruang', 'cara_keluar', 'keadaan_keluar'),
                            'function'      => 'riwayatPulang',
                            'keyword_id'    => 'q3',
                            'param_id'      => $param,
                            'limit_id'      => 'limit3',
                            'data_id'       => 'data3',
                            'page_id'       => 'pagination3',
                            'number'        => true,
                            'action'        => true,
                            'load'          => false,
                            'action_button' => $btnbatal,
                        );
                        $data = array(
                            'contentTitle' => 'Cari Pasien',
                            'ruangID' => $this->session->userdata('kdlokasi'),
                            'ruang' => $ruang,
                            'notif' => $notif,
                            'getDokter' => $dokter
                        );
                        //echo "<script>".getData($config2)."</script>";exit;

                        //$actionbatal= "var batal = {'$btnbatal','Sudah Diresponse'}";
                        $theme = array(
                            'header' => $this->load->view('template/header', '', true),
                            'index_menu' => 2,
                            'nav_sidebar' => $this->load->view('template/nav_sidebar', $z, true),
                            'content' => $this->load->view('layanan/layanan_index', $data, true),
                            'ajaxdata' =>  "var jekel = {'0':'Perempuan','1':'Laki-Laki','P':'Perempuan','L':'Laki-Laki'};
                            var response = {'0':'<span class=\"btn btn-danger btn-xs\" >Belum Diresponse</span>','1':'<span class=\"btn btn-success btn-xs\">Sudah Diresponse</span>'}; 
                            var action = {'1':'<span class=\"pull-right badge bg-green\">Aktif</span>','2':'<span class=\"pull-right badge bg-yellow\">Dirawat</span>','3':'<span class=\"pull-right badge bg-yellow\">Menunggu Response <br>Pindah</span>','4':'<span class=\"pull-right badge bg-yellow\">Sudah Pindah</span>','5':'<span class=\"pull-right badge bg-yellow\">Sudah Pulang</span>','6':'<span class=\"pull-right badge bg-yellow\">Batal Berobat</span>'}; 
                            var dis=['','disabled']"
                                . getData($config) . getData($config1) . getData($config2) . getData($config3),
                            'lib' => array('js/layanan.js')
                        );
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
            $url_login = base_url() . 'nota_tagihan.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }
    function getdata()
    {
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
    function datapermintaanpindah()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $q = urldecode($this->input->get('keyword', TRUE));
            $start = intval($this->input->get('start'));
            $limit = intval($this->input->get('limit'));
            $jenis_layanan = urldecode($this->input->get('jns_layanan', TRUE));

            $kondisi = array();
            $mulai = ($start * $limit) - $limit;
            $ruangid = $this->session->userdata('kdlokasi');
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'start'     => $mulai,
                'row_count' => $this->Layanan_model->countDataPermintaan($q, $ruangid, $jenis_layanan, $kondisi),
                'limit'     => $limit,
                'data'      => $this->Layanan_model->getDataPermintaan($limit, $mulai, $q, $ruangid, $jenis_layanan, $kondisi),
            );
            //print_r($response['data']);exit;
        } else {
            $response = array('status' => false, 'message' => 'Session Expired');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function riwayatpindah()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $q = urldecode($this->input->get('keyword', TRUE));
            $start = intval($this->input->get('start'));
            $limit = intval($this->input->get('limit'));
            $kondisi = array();
            $mulai = ($start * $limit) - $limit;
            $ruangid = $this->session->userdata('kdlokasi');
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'start'     => $mulai,
                'row_count' => $this->Layanan_model->countDataRiwayatPindah($q, $ruangid, $kondisi),
                'limit'     => $limit,
                'data'      => $this->Layanan_model->getDataRiwayatPindah($limit, $mulai, $q, $ruangid, $kondisi),
            );
        } else {
            $response = array('status' => false, 'message' => 'Session Expired');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function riwayatpulang()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $q = urldecode($this->input->get('keyword', TRUE));
            $start = intval($this->input->get('start'));
            $limit = intval($this->input->get('limit'));
            $kondisi = array();
            $mulai = ($start * $limit) - $limit;
            $ruangid = $this->session->userdata('kdlokasi');
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'start'     => $mulai,
                'row_count' => $this->Layanan_model->countDataRiwayatPulang($q, $ruangid, $kondisi),
                'limit'     => $limit,
                'data'      => $this->Layanan_model->getDataRiwayatPulang($limit, $mulai, $q, $ruangid, $kondisi),
            );
        } else {
            $response = array('status' => false, 'message' => 'Session Expired');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function batalPulang()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['idx'])) {
                    if ($_POST['idx'] == "") {
                        $response['code'] = 501;
                        $response['message'] = "Ops. Kode tidak boleh kosong!";
                    } else {
                        $this->db->where('idx', $_POST['idx']);
                        $cekCommand = $this->db->delete('tbl02_pasien_pulang');
                        if ($cekCommand) {
                            $response['code'] = 200;
                            $response['message'] = "Pasien sukses batal dipulangkan.";
                        } else {
                            $response['code'] = 502;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                } else {
                    $response['code'] = 503;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 504;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 505;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
    function datapindah($idx)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->select('a.*,b.idx as idx_response');
            $this->db->where('a.idx', $idx);
            $this->db->join('tbl02_pindah_ranap_response b', 'a.idx = b.id_pindah_ranap', 'LEFT');
            $row = $this->db->get('tbl02_pindah_ranap a')->row();
            if (empty($row)) {
                $response = array('status' => false, 'message' => 'Data Tidak Ditemukan');
            } else {
                if (!empty($row->id_response)) {
                    //Sudah Diresponse maka tidak bisa dibatalkan
                    $response = array('status' => false, 'message' => 'Permintaan Pindah Ruang tidak bisa dibatalkan karena pasien sudah terdaftar di ' . $row->nama_ruang . " Kamar " . $row->nama_kamar);
                } else {
                    $response = array('status' => true, 'message' => 'OK', 'data' => $row);
                }
            }
        } else {
            $response = array('status' => false, 'message' => 'Session Expired');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function registrasipindahkamar()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['no_permintaan']) &&
                    isset($_POST['id_ruang'])
                ) {

                    $no_permintaan = $this->input->post('no_permintaan', TRUE);
                    $id_ruang = $this->input->post('id_ruang', TRUE);
                    $datPindahKamar = getDataPindahRanapById($no_permintaan);
                    $datPendaftaran = getDataPendaftaranByRegUnit($datPindahKamar['reg_unit']);
                    if ($datPindahKamar) {
                        $cekKamar = $this->nota_model->cekKamar($datPindahKamar["id_kamar"]);
                        $jmltt = $cekKamar->jml_tt;
                        $isipr = $cekKamar->terisi_pr;
                        $isilk = $cekKamar->terisi_lk;
                        $totisi = $isipr + $isilk;
                        if ($totisi >= $jmltt) {
                            $response['code'] = 201;
                            $response['message'] = "Ops. Kamar " . $cekKamar->nama_kamar . " Penuh";
                            $response['data'] = $datPindahKamar;
                        } else {
                            $params = array(
                                'id_daftar' => $datPindahKamar['id_daftar'],
                                'nomr' => $datPindahKamar['nomr'],
                                'no_ktp' => $datPendaftaran['no_ktp'],
                                'nama_pasien' => $datPindahKamar['nama_pasien'],
                                'tempat_lahir' => $datPendaftaran['tempat_lahir'],
                                'tgl_lahir' => $datPendaftaran['tgl_lahir'],
                                'jns_kelamin' => $datPendaftaran['jns_kelamin'],
                                'nama_provinsi' => $datPendaftaran['nama_provinsi'],
                                'nama_kab_kota' => $datPendaftaran['nama_kab_kota'],
                                'nama_kecamatan' => $datPendaftaran['nama_kecamatan'],
                                'nama_kelurahan' => $datPendaftaran['nama_kelurahan'],
                                'jns_layanan' => "RI",
                                'tgl_daftar' => $datPendaftaran['tgl_daftar'],
                                'id_ruang' => $id_ruang,
                                'nama_ruang' => getRuangByID($id_ruang),
                                'id_kamar' => $datPindahKamar['id_kamar'],
                                'nama_kamar' => $datPindahKamar['nama_kamar'],
                                'id_rujuk' => '9',
                                'rujukan' => 'PINDAH RUANG RAWAT',
                                'no_rujuk' => $datPindahKamar['reg_unit'],
                                'asal_ruang' => $datPindahKamar['ruang_pengirim'],
                                'nama_asal_ruang' => $datPindahKamar['nama_ruang_pengirim'],
                                'asal_kamar' => $datPindahKamar['kamar_pengirim'],
                                'nama_asal_kamar' => $datPindahKamar['nama_kamar_pengirim'],
                                'dokter_pengirim' => $datPindahKamar['dokter_pengirim'],
                                'nama_dokter_pengirim' => $datPindahKamar['nama_dokter_pengirim'],
                                'id_cara_bayar' => $datPendaftaran['id_cara_bayar'],
                                'cara_bayar' => $datPendaftaran['cara_bayar'],
                                'id_jenis_peserta' => $datPendaftaran['id_jenis_peserta'],
                                'jenis_peserta' => $datPendaftaran['jenis_peserta'],
                                'no_bpjs' => $datPendaftaran['no_bpjs'],
                                'no_jaminan' => $datPendaftaran['no_jaminan'],
                                'tgl_jaminan' => $datPendaftaran['tgl_jaminan'],
                                'id_kelas' => $datPindahKamar['id_kelas'],
                                'kelas_layanan' => $datPindahKamar['kelas_layanan'],
                                'hakKelasId' => $datPendaftaran['hakKelasid'],
                                'hakKelas' => $datPendaftaran['hakKelas'],
                                'pjPasienNama' => $datPendaftaran['pjPasienNama'],
                                'pjPasienUmur' => $datPendaftaran['pjPasienUmur'],
                                'pjPasienPekerjaan' => $datPendaftaran['pjPasienPekerjaan'],
                                'pjPasienAlamat' => $datPendaftaran['pjPasienAlamat'],
                                'pjPasienTelp' => $datPendaftaran['pjPasienTelp'],
                                'pjPasienHubKel' => $datPendaftaran['pjPasienHubKel'],
                                'pjPasienDikirimOleh' => $datPendaftaran['pjPasienDikirimOleh'],
                                'pjPasienAlmtPengirim' => $datPendaftaran['pjPasienAlmtPengirim'],
                                'dokterJaga' => $datPendaftaran['dokterJaga'],
                                'namaDokterJaga' => $datPendaftaran['namaDokterJaga'],
                                'kode_permintaan' => $datPindahKamar['idx'],
                                'user_daftar' => $this->session->userdata('get_uid'),
                                'session_id' => session_id()
                            );

                            if ($no_permintaan == "") {
                                $response['code'] = 401;
                                $response['message'] = "Ops. ID rujukan internal tidak boleh kosong!";
                            } elseif ($id_ruang == "") {
                                $response['code'] = 401;
                                $response['message'] = "Ops. ID tujuan pelayanan tidak boleh kosong!";
                            } else {
                                $cekCommand = $this->db->insert('tbl02_pendaftaran', $params);
                                //Cek 
                                if ($cekCommand) {
                                    $this->db->from('tbl02_pendaftaran');
                                    $this->db->where('session_id', session_id());
                                    $this->db->order_by('idx', 'desc');
                                    $this->db->limit(1);
                                    $cekQuery = $this->db->get();
                                    if ($cekQuery->num_rows() > 0) {
                                        $resData = $cekQuery->row_array();
                                        $paramsResponse = array(
                                            'id_pindah_ranap' => $no_permintaan,
                                            'id_daftar' => $params['id_daftar'],
                                            'reg_unit' => $resData['reg_unit'],
                                            'user_id' => $this->session->userdata('get_uid')
                                        );
                                        $cekCmdPenunjang = $this->db->insert('tbl02_pindah_ranap_response', $paramsResponse);
                                        //cek rawat gabung anak
                                        $cekanak = $this->nota_model->getPermintaanPindah(array('rawatgabung' => 1, 'reg_unitibu' => $datPindahKamar['reg_unit']), 'result');
                                        if ($cekanak) {
                                            foreach ($cekanak as $c) {
                                                $d = getDataPendaftaranByRegUnit($c->reg_unit);
                                                //print_r($d);
                                                $params_anak = array(
                                                    'id_daftar' => $c->id_daftar,
                                                    'nomr' => $c->nomr,
                                                    'no_ktp' => $d['no_ktp'],
                                                    'nama_pasien' => $c->nama_pasien,
                                                    'tempat_lahir' => $d['tempat_lahir'],
                                                    'tgl_lahir' => $d['tgl_lahir'],
                                                    'jns_kelamin' => $d['jns_kelamin'],
                                                    'nama_provinsi' => $d['nama_provinsi'],
                                                    'nama_kab_kota' => $d['nama_kab_kota'],
                                                    'nama_kecamatan' => $d['nama_kecamatan'],
                                                    'nama_kelurahan' => $d['nama_kelurahan'],
                                                    'jns_layanan' => "RI",
                                                    'tgl_daftar' => $d['tgl_daftar'],
                                                    'id_ruang' => $c->id_ruang,
                                                    'nama_ruang' => getRuangByID($c->id_ruang),
                                                    'id_kamar' => $c->id_kamar,
                                                    'nama_kamar' => $c->nama_kamar,
                                                    'id_rujuk' => '9',
                                                    'rujukan' => 'PINDAH RUANG RAWAT',
                                                    'no_rujuk' => $d['reg_unit'],
                                                    'asal_ruang' => $c->ruang_pengirim,
                                                    'nama_asal_ruang' => $c->nama_ruang_pengirim,
                                                    'asal_kamar' => $c->kamar_pengirim,
                                                    'nama_asal_kamar' => $c->nama_kamar_pengirim,
                                                    'dokter_pengirim' => $c->dokter_pengirim,
                                                    'nama_dokter_pengirim' => $c->nama_dokter_pengirim,
                                                    'id_cara_bayar' => $d['id_cara_bayar'],
                                                    'cara_bayar' => $d['cara_bayar'],
                                                    'id_jenis_peserta' => $d['id_jenis_peserta'],
                                                    'jenis_peserta' => $d['jenis_peserta'],
                                                    'no_bpjs' => $d['no_bpjs'],
                                                    'id_kelas' => $c->id_kelas,
                                                    'kelas_layanan' => $c->kelas_layanan,
                                                    'hakKelasId' => $d['hakKelasid'],
                                                    'hakKelas' => $d['hakKelas'],
                                                    'pjPasienNama' => $d['pjPasienNama'],
                                                    'pjPasienPekerjaan' => $d['pjPasienPekerjaan'],
                                                    'pjPasienAlamat' => $d['pjPasienAlamat'],
                                                    'pjPasienTelp' => $d['pjPasienTelp'],
                                                    'pjPasienHubKel' => $d['pjPasienHubKel'],
                                                    'pjPasienDikirimOleh' => $d['pjPasienDikirimOleh'],
                                                    'pjPasienAlmtPengirim' => $d['pjPasienAlmtPengirim'],
                                                    'dokterJaga' => $d['dokterJaga'],
                                                    'namaDokterJaga' => $d['namaDokterJaga'],
                                                    'kode_permintaan' => $c->idx,
                                                    'rawatgabung' => 1,
                                                    'reg_unitibu' => $resData['reg_unit'],
                                                    'user_daftar' => $this->session->userdata('get_uid'),
                                                    'session_id' => session_id()
                                                );
                                                $this->db->insert('tbl02_pendaftaran', $params_anak);
                                                $idx = $this->db->insert_id();
                                                $newreg = $this->nota_model->getDatapendaftaran(array('idx' => $idx));
                                                $paramsResponseanak = array(
                                                    'id_pindah_ranap' => $c->idx,
                                                    'id_daftar' => $d['id_daftar'],
                                                    'reg_unit' => $newreg->reg_unit,
                                                    'user_id' => $this->session->userdata('get_uid')
                                                );
                                                $this->db->insert('tbl02_pindah_ranap_response', $paramsResponseanak);
                                            }
                                        }
                                        if ($cekCmdPenunjang) {
                                            $response['code'] = 200;
                                            $response['message'] = "Simpan data sukses.";
                                            $response['url'] = encrypt_decrypt('encrypt', $resData['reg_unit'], true);
                                        } else {
                                            $response['code'] = 202;
                                            $response['message'] = "Simpan data sukses. Update response rujuk internal gagal. Silahkan hubungi administrator";
                                            $response['url'] = null;
                                        }
                                    } else {
                                        $response['code'] = 202;
                                        $response['message'] = "Simpan data sukses namun cookies telah dihapus.";
                                        $response['url'] = null;
                                    }
                                } else {
                                    $response['code'] = 501;
                                    $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                                }
                            }
                        }
                    } else {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Data Permintaan Pindah Kamar Belum Ada!";
                    }
                } else {
                    $no_permintaan = $this->input->post('no_permintaan', TRUE);
                    $id_ruang = $this->input->post('id_ruang', TRUE);
                    $response['variabel'] = array('no_permintaan' => $no_permintaan, 'id_ruang' => $id_ruang);
                    $response['code'] = 401;
                    $response['message'] = "Ops. Variabel Tidak Lengkap. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Methode Tidak Diketahui. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
    function registrasikan()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['no_permintaan']) &&
                    isset($_POST['id_ruang']) &&
                    isset($_POST['id_kelas']) &&
                    isset($_POST['id_kamar'])
                ) {
                    if (
                        empty($this->input->post('no_permintaan')) ||
                        empty($this->input->post('id_ruang')) ||
                        empty($this->input->post('id_kelas')) ||
                        empty($this->input->post('id_kamar'))
                    ) {
                        if (empty($this->input->post('id_kelas'))) {
                            $response['code'] = 401;
                            $response['message'] = "Ops. Kelas Layanan Belum Dipilih.";
                        } elseif (empty($this->input->post('id_kamar'))) {
                            $response['code'] = 401;
                            $response['message'] = "Ops. Kamar Belum Dipilih.";
                        } else {
                            $response['code'] = 401;
                            $response['message'] = "Ops. Data Permintaan tidak lengkap";
                        }
                    } else {
                        $this->db->select('jml_tt,(terisi_pr+terisi_lk) as terisi');
                        $this->db->where('id_kamar', $this->input->post('id_kamar'));
                        $row = $this->db->get('tbl01_kamar')->row();
                        if ($row->terisi >= $row->jml_tt) {
                            $response['code'] = 401;
                            $response['message'] = "Ops. Kamar Penuh";
                        } else {
                            $no_permintaan = $this->input->post('no_permintaan', TRUE);
                            $id_ruang = $this->input->post('id_ruang', TRUE);
                            $datPindahKamar = getDataPindahRanapById($no_permintaan);
                            $datPendaftaran = getDataPendaftaranByRegUnit($datPindahKamar['reg_unit']);
                            if ($datPindahKamar) {
                                $params = array(
                                    'id_daftar' => $datPindahKamar['id_daftar'],
                                    'nomr' => $datPindahKamar['nomr'],
                                    'no_ktp' => $datPendaftaran['no_ktp'],
                                    'nama_pasien' => $datPindahKamar['nama_pasien'],
                                    'tempat_lahir' => $datPendaftaran['tempat_lahir'],
                                    'tgl_lahir' => $datPendaftaran['tgl_lahir'],
                                    'jns_kelamin' => $datPendaftaran['jns_kelamin'],
                                    'nama_provinsi' => $datPendaftaran['nama_provinsi'],
                                    'nama_kab_kota' => $datPendaftaran['nama_kab_kota'],
                                    'nama_kecamatan' => $datPendaftaran['nama_kecamatan'],
                                    'nama_kelurahan' => $datPendaftaran['nama_kelurahan'],
                                    'jns_layanan' => "RI",
                                    'tgl_daftar' => $datPendaftaran['tgl_daftar'],
                                    'id_ruang' => $id_ruang,
                                    'nama_ruang' => getRuangByID($id_ruang),
                                    'id_kamar' => $this->input->post('id_kamar'),
                                    'nama_kamar' => $this->input->post('nama_kamar'),
                                    'id_rujuk' => '9',
                                    'rujukan' => 'PINDAH RUANG RAWAT',
                                    'no_rujuk' => $datPindahKamar['reg_unit'],
                                    'asal_ruang' => $datPindahKamar['ruang_pengirim'],
                                    'nama_asal_ruang' => $datPindahKamar['nama_ruang_pengirim'],
                                    'asal_kamar' => $datPindahKamar['kamar_pengirim'],
                                    'nama_asal_kamar' => $datPindahKamar['nama_kamar_pengirim'],
                                    'dokter_pengirim' => $datPindahKamar['dokter_pengirim'],
                                    'nama_dokter_pengirim' => $datPindahKamar['nama_dokter_pengirim'],
                                    'id_cara_bayar' => $datPendaftaran['id_cara_bayar'],
                                    'cara_bayar' => $datPendaftaran['cara_bayar'],
                                    'id_jenis_peserta' => $datPendaftaran['id_jenis_peserta'],
                                    'jenis_peserta' => $datPendaftaran['jenis_peserta'],
                                    'no_bpjs' => $datPendaftaran['no_bpjs'],
                                    'no_jaminan' => $datPendaftaran['no_jaminan'],
                                    'tgl_jaminan' => $datPendaftaran['tgl_jaminan'],
                                    'id_kelas' => $this->input->post('id_kelas'),
                                    'kelas_layanan' => $this->input->post('kelas_layanan'),
                                    'hakKelasId' => $datPendaftaran['hakKelasid'],
                                    'hakKelas' => $datPendaftaran['hakKelas'],
                                    'pjPasienNama' => $datPendaftaran['pjPasienNama'],
                                    'pjPasienUmur' => $datPendaftaran['pjPasienUmur'],
                                    'pjPasienPekerjaan' => $datPendaftaran['pjPasienPekerjaan'],
                                    'pjPasienAlamat' => $datPendaftaran['pjPasienAlamat'],
                                    'pjPasienTelp' => $datPendaftaran['pjPasienTelp'],
                                    'pjPasienHubKel' => $datPendaftaran['pjPasienHubKel'],
                                    'pjPasienDikirimOleh' => $datPendaftaran['pjPasienDikirimOleh'],
                                    'pjPasienAlmtPengirim' => $datPendaftaran['pjPasienAlmtPengirim'],
                                    'dokterJaga' => $datPendaftaran['dokterJaga'],
                                    'namaDokterJaga' => $datPendaftaran['namaDokterJaga'],
                                    'kode_permintaan' => $datPindahKamar['idx'],
                                    'user_daftar' => $this->session->userdata('get_uid'),
                                    'session_id' => session_id()
                                );

                                if ($no_permintaan == "") {
                                    $response['code'] = 401;
                                    $response['message'] = "Ops. ID rujukan internal tidak boleh kosong!";
                                } elseif ($id_ruang == "") {
                                    $response['code'] = 401;
                                    $response['message'] = "Ops. ID tujuan pelayanan tidak boleh kosong!";
                                } else {
                                    $cekCommand = $this->db->insert('tbl02_pendaftaran', $params);
                                    if ($cekCommand) {
                                        $this->db->from('tbl02_pendaftaran');
                                        $this->db->where('session_id', session_id());
                                        $this->db->order_by('idx', 'desc');
                                        $this->db->limit(1);
                                        $cekQuery = $this->db->get();
                                        if ($cekQuery->num_rows() > 0) {
                                            $resData = $cekQuery->row_array();
                                            $paramsResponse = array(
                                                'id_pindah_ranap' => $no_permintaan,
                                                'id_daftar' => $params['id_daftar'],
                                                'reg_unit' => $resData['reg_unit'],
                                                'user_id' => $this->session->userdata('get_uid')
                                            );
                                            $cekCmdPenunjang = $this->db->insert('tbl02_pindah_ranap_response', $paramsResponse);
                                            if ($cekCmdPenunjang) {
                                                $response['code'] = 200;
                                                $response['message'] = "Simpan data sukses.";
                                                $response['url'] = encrypt_decrypt('encrypt', $resData['reg_unit'], true);
                                            } else {
                                                $response['code'] = 202;
                                                $response['message'] = "Simpan data sukses. Update response rujuk internal gagal. Silahkan hubungi administrator";
                                                $response['url'] = null;
                                            }
                                        } else {
                                            $response['code'] = 202;
                                            $response['message'] = "Simpan data sukses namun cookies telah dihapus.";
                                            $response['url'] = null;
                                        }
                                    } else {
                                        $response['code'] = 501;
                                        $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                                    }
                                }
                            } else {
                                $response['code'] = 401;
                                $response['message'] = "Ops. Data Permintaan Pindah Kamar Belum Ada!";
                            }
                        }
                    }
                } else {
                    $response['code'] = 401;
                    $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
    function reg_success()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_4");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

            $y['contentTitle'] = "Pendaftaran Pasien Pindah Kamar";

            $reg_unit = encrypt_decrypt('decrypt', $_GET['uid'], true);
            $this->db->where('reg_unit', $reg_unit);
            $cekNum = $this->db->get('tbl02_pendaftaran');
            if ($cekNum->num_rows() > 0) {
                $resArr = $cekNum->row_array();
                $y['idx'] = $resArr['idx'];
                $y['id_daftar'] = $resArr['id_daftar'];
                $y['reg_unit'] = $resArr['reg_unit'];
                $y['tgl_masuk'] = $resArr['tgl_masuk'];
                $y['nomr'] = $resArr['nomr'];
                $y['nama_pasien'] = $resArr['nama_pasien'];
                $y['tempat_lahir'] = $resArr['tempat_lahir'];
                $y['tgl_lahir'] = setDateInd($resArr['tgl_lahir']);
                $y['jns_kelamin'] = $resArr['jns_kelamin'];
                $y['id_ruang'] = $resArr['id_ruang'];
                $y['nama_ruang'] = $resArr['nama_ruang'];
                $y['no_jaminan'] = $resArr['no_jaminan'];
                $y['jns_layanan'] = $resArr['jns_layanan'];
                $y['id_kelas'] = $resArr['id_kelas'];
                $y['kelas_layanan'] = $resArr['kelas_layanan'];
                $y['id_cara_bayar'] = $resArr['id_cara_bayar'];
                $y['cara_bayar'] = $resArr['cara_bayar'];
            } else {
                $y['idx'] = "";
                $y['id_daftar'] = "";
                $y['reg_unit'] = "";
                $y['tgl_masuk'] = "";
                $y['nomr'] = "";
                $y['nama_pasien'] = "";
                $y['tempat_lahir'] = "";
                $y['tgl_lahir'] = "";
                $y['jns_kelamin'] = "1";
                $y['id_ruang'] = "";
                $y['nama_ruang'] = "";
                $y['no_jaminan'] = "";
                $y['jns_layanan'] = "";
                $y['id_kelas'] = "";
                $y['kelas_layanan'] = "";
                $y['id_cara_bayar'] = "";
                $y['cara_bayar'] = "";
            }

            $x['content'] = $this->load->view('layanan/pindah_kamar/template_daftar_sukses', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'nota_tagihan.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }
    function cetakReg()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (isset($_GET['kode'])) {
                $kode = encrypt_decrypt('decrypt', $_GET['kode'], true);
                $this->db->where('reg_unit', $kode);
                $cekQuery = $this->db->get('tbl02_pendaftaran');
                if ($cekQuery->num_rows() > 0) {
                    $resData = $cekQuery->row_array();
                    $x['reg_unit'] = $resData['reg_unit'];
                    $x['nomr'] = $resData['nomr'];
                    $x['nama'] = $resData['nama_pasien'];
                    $x['jns_kelamin'] = $resData['jns_kelamin'];
                    $x['tgl_lahir'] = $resData['tgl_lahir'];
                    $x['ruang'] = $resData['nama_ruang'];
                    $x['id_daftar'] = $resData['id_daftar'];
                    $x['tgl_masuk'] = $resData['tgl_masuk'];
                    $x['user_daftar'] = getNamaUserByID($resData['user_daftar']);
                    $this->load->view('cetak/v_registrasi', $x);
                } else {
                    echo "<script>alert('Ops. Data pendaftaran pasien tidak ditemukan. Silahkan coba kembali.');
                    window.close();
                    </script>";
                }
            } else {
                echo "<script>alert('Ops. Variable tidak ditemukan. Silahkan coba kembali.');
                window.close();
                </script>";
            }
        } else {
            echo "<script>alert('Ops. Request method tidak diizinkan. Silahkan coba kembali.');
            window.close();
            </script>";
        }
    }
    function entry_nota()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if ($this->session->userdata('kdlokasi') && isset($_GET['idx'])) {
                    if ($this->session->userdata('kdlokasi') == "" || $this->input->get('idx') == "") {
                        echo "<script>alert('Ops. Kode lokasi atau Kode Registrasi Unit kosong. {I.idx#kLok-Empty}');
                        history.back();
                        </script>";
                    } else {
                        //header('location:' . base_url() . "nota_tagihan.php/layanan/histori?idx=" . $this->input->get('idx'));
                        $this->session->unset_userdata('sPage');
                        $this->session->unset_userdata('sLike');
                        $this->session->unset_userdata('sKelas');
                        $x['index_menu'] = 2;
                        $x['ruangID'] = $this->session->userdata('kdlokasi');
                        $x['idx'] = $this->input->get('idx');
                        $y['ruangID'] = $this->session->userdata('kdlokasi');
                        $y['idx'] = $this->input->get('idx');
                        $y['mod'] = 'tindakan';

                        $z = setNav("nav_2");

                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                        $y['header'] = $this->load->view('template/header', '', true);
                        $y['contentTitle'] = "Entry Nota Tagihan Layanan";
                        $y['detail'] = $this->nota_model->getPendaftaran($x['idx']);
                        //print_r($y["detail"]); exit;ha
                        $this->db->where('idx', $this->input->get('idx'));
                        $cekQuery = $this->db->get('tbl02_pendaftaran');
                        $idlevel = $this->session->userdata('level');
                        $idmodul = MODUL_ID;

                        if ($cekQuery->num_rows() > 0) {
                            $res = $cekQuery->row_array();
                            $y['idx'] = $res['idx'];
                            $y['id_daftar'] = $res['id_daftar'];
                            $y['reg_unit'] = $res['reg_unit'];
                            $y['id_ruang'] = $res['id_ruang'];
                            $y['nama_ruang'] = $res['nama_ruang'];
                            $y['nomr'] = $res['nomr'];
                            $y['nama_pasien'] = $res['nama_pasien'];
                            $y['tgl_lahir'] = $res['tgl_lahir'];
                            $y['jns_kelamin'] = $res['jns_kelamin'];
                            $y['jns_layanan'] = $res['jns_layanan'];
                            $y['tgl_masuk'] = $res['tgl_masuk'];
                            $y['id_cara_bayar'] = $res['id_cara_bayar'];
                            $y['cara_bayar'] = $res['cara_bayar'];
                            $y['id_kelas'] = $res['id_kelas'];
                            $y['kelas_layanan'] = $res['kelas_layanan'];
                            $y["dokterJaga"]    = $res['dokterJaga'];
                        } else {
                            $y['idx'] = $this->input->get('idx');
                            $y['id_daftar'] = "";
                            $y['reg_unit'] = "";
                            $y['id_ruang'] = "";
                            $y['nama_ruang'] = "";
                            $y['nomr'] = "";
                            $y['nama_pasien'] = "";
                            $y['tgl_lahir'] = "";
                            $y['jns_kelamin'] = "";
                            $y['jns_layanan'] = "";
                            $y['tgl_masuk'] = "";
                            $y['id_cara_bayar'] = "";
                            $y['cara_bayar'] = "";
                            $y['id_kelas'] = "";
                            $y['kelas_layanan'] = "";
                            $y['dokterJaga']    = "";
                        }
                        if ($y["jns_layanan"] == "RJ") $kodemenu = 45;
                        elseif ($y["jns_layanan"] == "RI") $kodemenu = 46;
                        elseif ($y["jns_layanan"] == "PJ") $kodemenu = 47;
                        elseif ($y["jns_layanan"] == "GD") $kodemenu = 48;
                        else $kodemenu = "";
                        $y["hakakses"] = $this->nota_model->getAkses($idlevel, $idmodul, $kodemenu);
                        //echo $y["hakakses"];
                        //exit;
                        if ($y['jns_layanan'] == 'RI') {
                            $this->db->where_in('profId', array('1', '2'));
                        } else {
                            $this->db->where('idruang', $x['ruangID']);
                        }
                        $this->db->join('tbl01_pegawai', 'tbl01_pegawai.NRP=tbl01_dokter.NRP');
                        $y['getDokter'] = $this->db->get('tbl01_dokter');


                        //Cek Kwitansi Pembayaran
                        $cekKw = $this->db->query("SELECT * FROM tbl05_kwitansi WHERE tbl05_kwitansi.no_kwitansi NOT IN (SELECT no_kwitansi FROM tbl05_kwitansi_retur) AND id_daftar='" . $y['id_daftar'] . "'")->row();

                        //Cek Rawat Inap
                        $y["pulang"] = 0;

                        $this->db->select('id_daftar,reg_unit');
                        $this->db->where('id_daftar', $y['id_daftar']);
                        $this->db->where('jns_layanan', 'RI');
                        $ri = $this->db->get('tbl02_pendaftaran');
                        if ($ri->num_rows() > 0) {
                            //Cek Pasien Pulang 
                            $dri = $ri->row();
                            //print_r($dri); exit;
                            $this->db->where('id_daftar', $dri->id_daftar);
                            $this->db->where('reg_unit', $dri->reg_unit);
                            $y["pulang"] = $this->db->get("tbl02_pasien_pulang")->num_rows();
                        }

                        $pulang = $this->nota_model->getPulang($y["detail"]->reg_unit);
                        if (!empty($pulang)) $y["pulang"] = 1;

                        $y['getGroupTarif'] = $this->db->get('tbl01_kategori_tarif');

                        // List Ruang Penunjang
                        $this->db->where('grid', '3');
                        $y['getRuang'] = $this->db->get('tbl01_ruang');

                        // List Ruang Konsul Internal
                        $this->db->where('grid', '1');
                        $this->db->where_not_in('idx', $this->session->userdata('kdlokasi'));
                        $y['getRuangRujukan'] = $this->db->get('tbl01_ruang');
                        $y['getKelasTarif'] = $this->db->get('tbl01_kelas_layanan');
                        $y['modul']   = $this->load->view('layanan/template_notatagihan', $y, true);
                        $x['content'] = $this->load->view('layanan/template_entry', $y, true);
                        $action = "<div class='btn-group'><button onclick='hapusNota({{idx}})' class='btn btn-danger btn-sm'><span class='fa fa-remove'></span> Hapus</button></div>";
                        $nota = array(
                            'url'           => 'nota_tagihan.php/layanan/datanota',
                            'variable'      => array('idx' => 'idx', 'subtotal' => 'subtotal'),
                            'field'         => array('pgwNama', 'layanan', 'tarif_layanan', 'jml', 'Rp. {{subtotal}}'),
                            'function'      => 'getNota',
                            'keyword_id'    => 'q',
                            'param_id'      => array('reg_unit' => 'reg_unit'),
                            'limit_id'      => 'limit',
                            'data_id'       => 'getNotaItem',
                            'page_id'       => 'pagination',
                            'number'        => true,
                            'action'        => true,
                            'load'          => true,
                            'action_button' => $action,
                        );
                        $x['ajaxdata'] = getData($nota);
                        $x['lib'] = array('js/entry_nota.js');
                        $this->load->view('template/theme', $x);
                    }
                } else {
                    echo "<script>alert('Ops. Permintaan halaman tidak di sesuai. {I.idx#kLok-NA}');
                    history.back();
                    </script>";
                }
            } else {
                echo "<script>alert('Ops. Permintaan halaman tidak di sesuai. {MG-NA}!');
                history.back();
                </script>";
            }
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'nota_tagihan.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }
    function datanota()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $reg_unit = urldecode($this->input->get('reg_unit', TRUE));
            $SQL = "SELECT *,(a.tarif_layanan * a.jml) as subtotal FROM tbl03_nota_detail a LEFT JOIN tbl01_pegawai b ON a.id_dokter=b.NRP
            WHERE reg_unit = '$reg_unit'
            ORDER BY a.idx DESC";
            $datanota = $this->db->query("$SQL")->result();
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'start'     => 0,
                'row_count' => 0,
                'limit'     => 0,
                'data'      => $datanota,
            );
        } else {
            $response = array('status' => false, 'message' => 'Session Expired');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function hapusnota()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $idx = intval($this->input->get('idx'));
            $this->db->where('idx', $idx);
            $this->db->delete('tbl03_nota_detail');
            $response = array('status' => true, 'message' => 'Tindakan berhasil dihapus dari nota tagihan');
        } else {
            $response = array('status' => false, 'message' => 'Session Expired');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function histori()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if ($this->session->userdata('kdlokasi') && isset($_GET['idx'])) {
                    if ($this->session->userdata('kdlokasi') == "" || $this->input->get('idx') == "") {
                        echo "<script>alert('Ops. Kode lokasi atau Kode Registrasi Unit kosong. {I.idx#kLok-Empty}');
                        history.back();
                        </script>";
                    } else {
                        $z = setNav("nav_2");
                        $idx = $this->input->get('idx');
                        $detail = $this->nota_model->getPendaftaran($idx);
                        if ($detail) {

                            if ($detail->jns_layanan == "RI") $getDokter = $this->Layanan_model->getDokter()->result_array();
                            else $getDokter = $this->Layanan_model->getDokter($detail->id_ruang)->result_array();
                            $getRuang = $this->Layanan_model->getRuang(array('grid' => 3))->result();
                            $carabayar = $this->nota_model->getCaraBayar($detail->id_cara_bayar);
                            $jkn = $carabayar->jkn;
                            $var = array(
                                'detail'    => $detail,
                                'getRuang'  => $getRuang,
                                'jkn'       => $jkn
                            );
                            $idlevel = $this->session->userdata('level');
                            $idmodul = MODUL_ID;
                            if ($detail->jns_layanan == "RJ") $kodemenu = 45;
                            elseif ($detail->jns_layanan == "RI") $kodemenu = 46;
                            elseif ($detail->jns_layanan == "PJ") $kodemenu = 47;
                            elseif ($detail->jns_layanan == "GD") $kodemenu = 48;
                            else $kodemenu = "";

                            $data = array(
                                'ruangID'   => $this->session->userdata('kdlokasi'),
                                'idx'       => $idx,
                                'mod'       => 'histori',
                                'header'    => $this->load->view('template/header', '', true),
                                'contentTitle'  => "Entry Nota Tagihan Layanan",
                                'detail'        => $detail,
                                'pulang'        => $this->Layanan_model->cekKepulangan($detail->id_daftar, 'RI'),
                                'modul'         => $this->load->view('layanan/template_histori', $var, true),
                                'hakakses'      => $this->nota_model->getAkses($idlevel, $idmodul, $kodemenu)
                            );

                            $theme = array(
                                'idx'           => $idx,
                                'index_menu'    => 2,
                                'ruangID'       => $this->session->userdata('kdlokasi'),
                                'nav_sidebar'   => $this->load->view('template/nav_sidebar', $z, true),
                                'content'       => $this->load->view('layanan/template_entry', $data, true)
                            );

                            $this->load->view('template/theme', $theme);
                        } else {
                            echo "Data Pasien Belum Ditemukan";
                        }
                    }
                } else {
                    echo "<script>alert('Ops. Permintaan halaman tidak di sesuai. {I.idx#kLok-NA}');
                    history.back();
                    </script>";
                }
            } else {
                echo "<script>alert('Ops. Permintaan halaman tidak di sesuai. {MG-NA}!');
                history.back();
                </script>";
            }
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'nota_tagihan.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }
    /*function pindah_ruang()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if ($this->session->userdata('kdlokasi') && isset($_GET['idx'])) {
                    if ($this->session->userdata('kdlokasi') == "" || $this->input->get('idx') == "") {
                        echo "<script>alert('Ops. Kode lokasi atau Kode Registrasi Unit kosong. {I.idx#kLok-Empty}');
                        history.back();
                        </script>";
                    } else {
                        $z = setNav("nav_2");
                        $z = setNav("nav_2");
                        $idx = $this->input->get('idx');
                        $detail = $this->nota_model->getPendaftaran($idx);
                        if ($detail) {
                            $pulang= $this->Layanan_model->cekKepulangan($detail->id_daftar, 'RI');
                            $pindah = $this->nota_model->getPindah($detail->reg_unit, $this->session->userdata('kdlokasi'));
                            if (!empty($pindah)) {
                                $id_kelas = $pindah->id_kelas;
                                $ruang_tujuan = $pindah->id_ruang;
                            } else {
                                $id_kelas = "";
                                $ruang_tujuan = "";
                            }
                            $idlevel = $this->session->userdata('level');
                            $idmodul = MODUL_ID;
                            if ($detail->jns_layanan == "RJ") $kodemenu = 45;
                            elseif ($detail->jns_layanan == "RI") $kodemenu = 46;
                            elseif ($detail->jns_layanan == "PJ") $kodemenu = 47;
                            elseif ($detail->jns_layanan == "GD") $kodemenu = 48;
                            else $kodemenu = "";
                            $var=array(
                                'pulang'        => $pulang,
                                'detail' => $detail,
                                'getKelas'=> $this->db->get('tbl01_kelas_layanan'),
                                'getRuangPindah'=>$this->Layanan_model->getRuang(array('status_ruang'=>1,'grid'=>2)),
                                'getKamar'=>$this->Layanan_model->getKamar(array('kelas_id'=>$id_kelas,'id_ruang'=>$ruang_tujuan)),
                                'getDokter' => $this->Layanan_model->getDokter(array('dokter'=>1))->result(),

                            );
                            $data=array(
                                'ruangID' => $this->session->userdata('kdlokasi'),
                                'idx' => $this->input->get('idx'),
                                'mod'=>'pindah-ruang',
                                'header'=> $this->load->view('template/header', '', true),
                                'contentTitle'=>"Entry Data Pindah Ruang",
                                'modul' => $this->load->view('layanan/template_pindah', $var, true),
                                'pasien_pulang'     => $pulang,
                                'pasien_pindah'     => $pindah,
                                'hakakses'      => $this->nota_model->getAkses($idlevel, $idmodul, $kodemenu)
                            );
                            $theme=array(
                                'ruangID'=> $this->session->userdata('kdlokasi'),
                                'idx'=> $this->input->get('idx'),
                                'nav_sidebar'=> $this->load->view('template/nav_sidebar', $z, true),
                                'content'=> $this->load->view('layanan/template_entry', $data, true),
                                'detail'=>$detail,
                                
                            );
                            $this->load->view('template/theme', $theme);
                        }else{
                            echo "Pasien Tidak Ditemukan";
                        }
                        
                    }
                } else {
                    echo "<script>alert('Ops. Permintaan halaman tidak di sesuai. {I.idx#kLok-NA}');
                    history.back();
                    </script>";
                }
            } else {
                echo "<script>alert('Ops. Permintaan halaman tidak di sesuai. {MG-NA}!');
                history.back();
                </script>";
            }
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'nota_tagihan.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }*/

    function pindah_ruang()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if ($this->session->userdata('kdlokasi') && isset($_GET['idx'])) {
                    if ($this->session->userdata('kdlokasi') == "" || $_GET['idx'] == "") {
                        echo "<script>alert('Ops. Kode lokasi atau Kode Registrasi Unit kosong. {I.idx#kLok-Empty}');
                        history.back();
                        </script>";
                    } else {
                        $this->session->unset_userdata('sPage');
                        $this->session->unset_userdata('sLike');
                        $this->session->unset_userdata('sKelas');

                        $x['ruangID'] = $this->session->userdata('kdlokasi');
                        $x['idx'] = $this->input->get('idx');
                        $y['ruangID'] = $this->session->userdata('kdlokasi');
                        $y['idx'] = $_GET['idx'];
                        $y['mod'] = 'pindah-ruang';
                        $z = setNav("nav_2");

                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                        $y['header'] = $this->load->view('template/header', '', true);
                        $y['contentTitle'] = "Entry Nota Tagihan Layanan";

                        $y['detail'] = $this->nota_model->getPendaftaran($x['idx']);
                        $y['diagnosa']  = $this->nota_model->getDiagnosa($x["idx"]);
                        $y["pulang"]    = 0;
                        if (!empty($y["detail"])) {
                            $nomr = $y["detail"]->nomr;
                            if ($y["detail"]->jns_layanan == "RI") {
                                $y["getDokter"] = $this->nota_model->getDokter();
                            } else {
                                $y["getDokter"] = $this->nota_model->getDokter($x['ruangID']);
                            }
                            $pulang = $this->nota_model->getPulang($y["detail"]->reg_unit);
                            $pindah = $this->nota_model->getPindah($y["detail"]->reg_unit, $x['ruangID']);
                            if (!empty($pulang)) $y["pulang"] = 1;
                            if (!empty($y["detail"]->reg_unitibu) && $y['detail']->rawatgabung == 1) {
                                //Pasien Merupakan Bayi Rawat Gabung
                                $y['regibu'] = $this->nota_model->getDatapendaftaran(array('reg_unit' => $y["detail"]->reg_unitibu));
                                $y['regnanak'] = array();
                            } else {
                                $y['regibu'] = array();
                                $y['reganak'] = $this->nota_model->getDatapendaftaran(array('reg_unitibu' => $y['detail']->reg_unit), 'result');
                            }
                        } else {
                            $pulang = array();
                            $pindah = array();
                            $nomr = "";
                        }
                        // List Ruang Penunjang
                        $this->db->where('grid', '3');
                        $y['getRuang'] = $this->db->get('tbl01_ruang');

                        $this->db->where('grid', '1');
                        //$this->db->where_not_in('idx',$this->session->userdata('kdlokasi'));
                        $y['getRuangRujukan']   = $this->db->get('tbl01_ruang');
                        $y['getCaraBayar']      = $this->db->get('tbl01_cara_bayar');
                        $y['getJenisPelayanan'] = $this->db->get('tbl01_jenis_pelayanan');
                        $y['getCaraKeluar']     = $this->db->get('tbl01_cara_keluar');
                        $y['getKeadaanKeluar']  = $this->db->get('tbl01_keadaan_keluar');
                        $y['tgl_daftar']        = $this->nota_model->getTgldaftar($nomr);
                        $y['pasien_pulang']     = $pulang;
                        $y['pasien_pindah']     = $pindah;

                        $this->db->where('status_ruang', 1);
                        $this->db->where('grid', '2');
                        //$this->db->where_not_in('idx',$this->session->userdata('kdlokasi'));
                        $y['getRuangPindah'] = $this->db->get('tbl01_ruang');
                        if (!empty($pindah)) {
                            $id_kelas = $pindah->id_kelas;
                            $ruang_tujuan = $pindah->id_ruang;
                        } else {
                            $id_kelas = "";
                            $ruang_tujuan = "";
                        }
                        $this->db->where('kelas_id', $id_kelas);
                        $this->db->where('id_ruang', $ruang_tujuan);
                        //$this->db->join('tbl01_kamar', 'tbl01_kamar.id_ruang=tbl01_ruang.idx');
                        $y["getKamar"] = $this->db->get("tbl01_kamar");
                        $y['getKelas'] = $this->db->get('tbl01_kelas_layanan');
                        $idlevel = $this->session->userdata('level');
                        $idmodul = MODUL_ID;
                        if ($y["detail"]->jns_layanan == "RJ") $kodemenu = 45;
                        elseif ($y["detail"]->jns_layanan == "RI") $kodemenu = 46;
                        elseif ($y["detail"]->jns_layanan == "PJ") $kodemenu = 47;
                        elseif ($y["detail"]->jns_layanan == "GD") $kodemenu = 48;
                        else $kodemenu = "";
                        $y["hakakses"] = $this->nota_model->getAkses($idlevel, $idmodul, $kodemenu);
                        $y['modul']             = $this->load->view('nota_tagihan/template_pindah', $y, true);
                        $x['content']           = $this->load->view('layanan/template_entry', $y, true);
                        $this->load->view('template/theme', $x);
                    }
                } else {
                    echo "<script>alert('Ops. Permintaan halaman tidak di sesuai. {I.idx#kLok-NA}');
                    history.back();
                    </script>";
                }
            } else {
                echo "<script>alert('Ops. Permintaan halaman tidak di sesuai. {MG-NA}!');
                history.back();
                </script>";
            }
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'nota_tagihan.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }

    function pasien_pulang()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if ($this->session->userdata('kdlokasi') && isset($_GET['idx'])) {
                    if ($this->session->userdata('kdlokasi') == "" || $this->input->get('idx') == "") {
                        echo "<script>alert('Ops. Kode lokasi atau Kode Registrasi Unit kosong. {I.idx#kLok-Empty}');
                        history.back();
                        </script>";
                    } else {
                        $z = setNav("nav_2");
                        $idx = $this->input->get('idx');
                        $detail = $this->nota_model->getPendaftaran($idx);
                        if ($detail) {
                            //$nomr = $detail->nomr;
                            //$ranap = $this->nota_model->cekRanap($detail->id_daftar, 'RI');
                            $statusranap = 0;
                            if ($detail->jns_layanan == "RI") {
                                $getDokter = $this->Layanan_model->getDokter(array('dokter' => 1));
                                $pulang = $this->nota_model->getPulang($detail->reg_unit);
                                if (!empty($pulang)) {
                                    $y["pulang"] = 1;
                                    $y["datapulang"] = $pulang;
                                    if ($pulang->id_keadaan_keluar == 1) {
                                        $surat = array(
                                            'detail' => $detail,
                                            'dokter' => $getDokter,
                                            'judul' => "Surat Keterangan",
                                            'ruang' => $y["getRuangRujukan"],
                                            'pulang' => $pulang,
                                            'surat' => $this->nota_model->getSuratKontrol($detail->reg_unit)
                                        );
                                        $y["priv_surat"] = $this->load->view('layanan/template_surat_kontrol', $surat, true);
                                    } elseif ($pulang->id_keadaan_keluar == 4) {
                                        $surat = array(
                                            'detail' => $y["detail"],
                                            'dokter' => $y["getDokter"],
                                            'judul' => "Surat Keterangan",
                                            'ruang' => $y["getRuangRujukan"],
                                            'pulang' => $y["datapulang"],
                                            'surat' => $this->nota_model->getSuratRujukan($detail->reg_unit)
                                        );
                                        $y["priv_surat"] = $this->load->view('layanan/template_surat_rujukan', $surat, true);
                                    }
                                } else {
                                    $status_pulang = 0;
                                }
                            } else {
                                //Jika Jenis Layanan Bukan Rawat Inap/ cek apakah pasien terdaftar di ruang rawat inap
                                $ranap = $this->nota_model->cekRanap($detail->id_daftar, 'RI');
                                $getDokter = $this->Layanan_model->getDokter(array('dokter' => 1, 'idruang' => $this->session->userdata('kdlokasi')));
                                if (empty($ranap)) {
                                    //Pasien tidak di rawat inap
                                    $statusranap = 0;
                                    $pulang = $this->nota_model->getPulang($detail->id_daftar);
                                    if (!empty($pulang)) {
                                        $status_pulang = 1;
                                        $datapulang = $pulang;
                                        if ($pulang->id_keadaan_keluar == 1) {
                                            $surat = array(
                                                'detail' => $detail,
                                                'dokter' => $getDokter,
                                                'judul' => "Surat Keterangan",
                                                'ruang' => $y["getRuangRujukan"],
                                                'pulang' => $datapulang,
                                                'surat' => $this->nota_model->getSuratKontrol($detail->reg_unit)
                                            );
                                            $y["priv_surat"] = $this->load->view('layanan/template_surat_kontrol', $surat, true);
                                        } elseif ($pulang->id_keadaan_keluar == 4) {
                                            $surat = array(
                                                'detail' => $detail,
                                                'dokter' => $getDokter,
                                                'judul' => "Surat Keterangan",
                                                'ruang' => $y["getRuangRujukan"],
                                                'pulang' => $datapulang,
                                                'surat' => $this->nota_model->getSuratRujukan($detail->reg_unit)
                                            );
                                            $y["priv_surat"] = $this->load->view('layanan/template_surat_rujukan', $surat, true);
                                        }
                                    } else {
                                        $status_pulang = 0;
                                    }
                                } else {
                                    $pulang = array();
                                    $statusranap = 1;
                                }
                            }
                            $idlevel = $this->session->userdata('level');
                            $idmodul = MODUL_ID;
                            if (
                                $detail->jns_layanan == "RJ"
                            ) $kodemenu = 45;
                            elseif ($detail->jns_layanan == "RI") $kodemenu = 46;
                            elseif ($detail->jns_layanan == "PJ") $kodemenu = 47;
                            elseif ($detail->jns_layanan == "GD") $kodemenu = 48;
                            else $kodemenu = "";
                            //$pulang = $this->Layanan_model->cekKepulangan($detail->id_daftar, 'RI');
                            $var = array(
                                'pulang' => $status_pulang,
                                'ranap' => $statusranap,
                                'detail' => $detail,
                                'tgl_daftar' => $this->nota_model->getTgldaftar($detail->nomr),
                                'getCaraBayar' => $this->db->get('tbl01_cara_bayar'),
                                'getJenisPelayanan' => $this->db->get('tbl01_jenis_pelayanan'),
                                'getCaraKeluar' => $this->db->get('tbl01_cara_keluar'),
                                'getKeadaanKeluar' => $this->db->get('tbl01_keadaan_keluar'),
                                'getDokter' => $getDokter
                            );
                            $data = array(
                                'ruangID' => $this->session->userdata('kdlokasi'),
                                'idx'   => $idx,
                                'mod' => 'pasien-pulang',
                                'header' => $this->load->view('template/header', '', true),
                                'contentTitle' => "Pasien Pulang",
                                'detail'    => $detail,
                                'hakakses'      => $this->nota_model->getAkses($idlevel, $idmodul, $kodemenu),
                                'modul' => $this->load->view('layanan/template_pulang', $var, true)
                            );
                            $theme = array(
                                'index_menu'    => 2,
                                'ruangID'       => $this->session->userdata('kdlokasi'),
                                'idx'           => $idx,
                                'nav_sidebar'   => $this->load->view('template/nav_sidebar', $z, true),
                                'content'       => $this->load->view('layanan/template_entry', $data, true)
                            );
                            $this->load->view('template/theme', $theme);
                        } else {
                            echo "Pasien Tidak ditemukan";
                        }
                    }
                } else {
                    echo "<script>alert('Ops. Permintaan halaman tidak di sesuai. {I.idx#kLok-NA}');
                    history.back();
                    </script>";
                }
            } else {
                echo "<script>alert('Ops. Permintaan halaman tidak di sesuai. {MG-NA}!');
                history.back();
                </script>";
            }
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'nota_tagihan.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }
    function caritindakan()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $param = $this->input->get('param1');
            $kelas_id   = $this->input->get('kelas_id');
            $jns_layanan = $this->input->get('jns_layanan');
            $id_ruang   = $this->input->get('id_ruang');
            $all          = $this->input->get('all');
            $tindakan = $this->Layanan_model->getTarif($param, $jns_layanan, $id_ruang, $kelas_id, $all);
        } else {
            $tindakan = array();
        }
        header('Content-Type: application/json');
        echo json_encode($tindakan);
    }
    function getTarif($start = 0)
    {
        $kelas_id   = $this->input->get('kelas_id');
        $jns_layanan = $this->input->get('jns_layanan');
        $id_ruang   = $this->input->get('id_ruang');
        $q          = $this->input->get('q');
        $all          = $this->input->get('all');
        $res_array = array(
            'status'    => true,
            'message'   => 'OK',
            'start'     => $start,
            'limit'     => $this->perPage,
            'row_count' => $this->nota_model->getTarif(0, 0, $q, $jns_layanan, $id_ruang, $kelas_id, $all)->num_rows(),
            'data'      => $this->nota_model->getTarif($this->perPage, intval($start), $q, $jns_layanan, $id_ruang, $kelas_id, $all)->result()
        );

        header('Content-Type: application/json');
        echo json_encode($res_array);
    }
    function simpanItem()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['id_daftar']) &&
                    isset($_POST['reg_unit']) &&
                    isset($_POST['nomr']) &&
                    isset($_POST['id_tarif']) &&
                    isset($_POST['layanan']) &&
                    isset($_POST['jasa_sarana']) &&
                    isset($_POST['jasa_pelayanan']) &&
                    isset($_POST['tarif_layanan']) &&
                    isset($_POST['kategori_id']) &&
                    isset($_POST['kelas_id']) &&
                    isset($_POST['jml']) &&
                    isset($_POST['sub_total_tarif']) &&
                    isset($_POST['id_dokter'])
                ) {
                    $params = array(
                        'id_daftar' => $this->input->post('id_daftar', TRUE),
                        'reg_unit' => $this->input->post('reg_unit', TRUE),
                        'nomr' => $this->input->post('nomr', TRUE),
                        'id_tarif' => $this->input->post('id_tarif', TRUE),
                        'layanan' => $this->input->post('layanan', TRUE),
                        'jasa_sarana' => $this->input->post('jasa_sarana', TRUE),
                        'jasa_pelayanan' => $this->input->post('jasa_pelayanan', TRUE),
                        'tarif_layanan' => $this->input->post('tarif_layanan', TRUE),
                        'kategori_id' => $this->input->post('kategori_id', TRUE),
                        'kelas_id' => $this->input->post('kelas_id', TRUE),
                        'jml' => $this->input->post('jml', TRUE),
                        'sub_total_tarif' => $this->input->post('sub_total_tarif', TRUE),
                        'id_dokter' => $this->input->post('id_dokter', TRUE),
                        'user_exec' => $this->session->userdata('get_uid')
                    );

                    if ($params['id_daftar'] == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. No Registrasi RS tidak boleh kosong! Silahkan coba kembali.";
                    } elseif ($params['reg_unit'] == "") {
                        $response['code'] = 402;
                        $response['message'] = "Ops. No Registrasi Unit tidak boleh kosong! Silahkan coba kembali.";
                    } elseif ($params['nomr'] == "") {
                        $response['code'] = 403;
                        $response['message'] = "Ops. No Registrasi Unit tidak boleh kosong! Silahkan coba kembali.";
                    } else {
                        $cekCommand = $this->db->insert('tbl03_nota_detail', $params);
                        $insert_id = $this->db->insert_id();
                        if ($cekCommand) {
                            $data = array(
                                'noref' => $insert_id,
                                'id_daftar' => $params['id_daftar'],
                                'reg_unit' => $params['reg_unit'],
                                'nomr' => $params['nomr'],
                                'kode_unit' => $this->session->userdata('kdlokasi'),
                                'nama_unit' => getPoliByID($this->session->userdata('kdlokasi')),
                                'kode_item_detail' => $params['id_tarif'],
                                'deskripsi' => $params["layanan"],
                                'item_sarana' => $params["jasa_sarana"],
                                'item_pelayanan' => $params["jasa_pelayanan"],
                                'nilai_item' => $params["tarif_layanan"],
                                'jml_item' => $params["jml"],
                                'sub_total_item' => $params["sub_total_tarif"],
                                'kategori_id' => $params["kategori_id"],
                                'kelas_id' => $params["kelas_id"],
                                'id_dokter' => $params['id_dokter'],
                                'jenis_item' => 1,
                                'userinput' => $params['user_exec']
                            );
                            $this->db->insert('tbl05_logtagihan', $data);

                            $response['code'] = 200;
                            $response['message'] = "Simpan data sukses.";
                        } else {
                            $response['code'] = 404;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                } else {
                    $response['code'] = 405;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 406;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

    function permintaan_penunjang()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if ($this->session->userdata('kdlokasi') && isset($_GET['idx'])) {
                    if ($this->session->userdata('kdlokasi') == "" || $_GET['idx'] == "") {
                        echo "<script>alert('Ops. Kode lokasi atau Kode Registrasi Unit kosong. {I.idx#kLok-Empty}');
                        history.back();
                        </script>";
                    } else {
                        $this->session->unset_userdata('sPage');
                        $this->session->unset_userdata('sLike');
                        $this->session->unset_userdata('sKelas');
                        $x['index_menu'] = 2;
                        $x['ruangID'] = $this->input->get('kLok');
                        $x['idx'] = $this->input->get('idx');
                        $y['ruangID'] = $this->session->userdata('kdlokasi');
                        $y['idx'] = $_GET['idx'];
                        $y['mod'] = 'penunjang';
                        $z = setNav("nav_2");

                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                        $y['header'] = $this->load->view('template/header', '', true);
                        $y['contentTitle'] = "Entry Nota Tagihan Layanan";

                        $y['detail'] = $this->nota_model->getPendaftaran($x['idx']);
                        //print_r($y["detail"]);exit;
                        $y['diagnosa']  = $this->nota_model->getDiagnosa($x["idx"]);
                        $y["pulang"]    = 0;
                        $kelas_id = 2;
                        if (!empty($y["detail"])) {
                            $nomr = $y["detail"]->nomr;
                            $kelas_id = $y["detail"]->id_kelas;
                            $y["poliklinik"]    = $this->nota_model->getPolyAsal($y["detail"]->id_daftar);
                            //$y['layanan']       = $this->nota_model->getLayanan(52,$kelas_id);
                            if ($y["detail"]->jns_layanan == "RI") {

                                $y["getDokter"] = $this->nota_model->getDokter()->result();
                            } else {
                                $y["getDokter"] = $this->nota_model->getDokter($x['ruangID'])->result();
                            }
                            $pulang = $this->nota_model->getPulang($y["detail"]->reg_unit);
                            //getPindah($y["detail"]->reg_unit, $x['ruangID'])

                            if (!empty($pulang)) $y["pulang"] = 1;
                        } else {
                            $pulang = array();

                            $nomr = "";
                            $y["poliklinik"] = array();
                        }
                        // List Ruang Penunjang
                        $this->db->where('grid', '3');
                        $y['getRuang'] = $this->db->get('tbl01_ruang')->result();

                        $this->db->where('grid', '1');
                        //$this->db->where_not_in('idx',$this->session->userdata('kdlokasi'));
                        $y['getRuangRujukan']   = $this->db->get('tbl01_ruang');

                        $idlevel = $this->session->userdata('level');
                        $idmodul = MODUL_ID;
                        if ($y["detail"]->jns_layanan == "RJ") $kodemenu = 45;
                        elseif ($y["detail"]->jns_layanan == "RI") $kodemenu = 46;
                        elseif ($y["detail"]->jns_layanan == "PJ") $kodemenu = 47;
                        elseif ($y["detail"]->jns_layanan == "GD") $kodemenu = 48;
                        else $kodemenu = "";
                        $y["hakakses"] = $this->nota_model->getAkses($idlevel, $idmodul, $kodemenu);

                        $y['modul']             = $this->load->view('layanan/template_penunjang', $y, true);
                        $x['content']           = $this->load->view('layanan/template_entry', $y, true);
                        $x['lib'] = array('js/entry_nota.js');
                        $this->load->view('template/theme', $x);
                    }
                } else {
                    echo "<script>alert('Ops. Permintaan halaman tidak di sesuai. {I.idx#kLok-NA}');
                    history.back();
                    </script>";
                }
            } else {
                echo "<script>alert('Ops. Permintaan halaman tidak di sesuai. {MG-NA}!');
                history.back();
                </script>";
            }
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'nota_tagihan.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }

    function pemeriksaan($idjenis, $reg_unit)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $pemeriksaan = $this->nota_model->listPemeriksaan($idjenis, $reg_unit);
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'data' => $pemeriksaan,

            );
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali", 'idjenis' => $idjenis);
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    function cekpemeriksaan($idjenis)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $pemeriksaan = $this->nota_model->cekJenisPemeriksaan($idjenis);
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'data' => $pemeriksaan,

            );
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali", 'idjenis' => $idjenis);
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    function subjenispemeriksaan($idjenis = "")
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $pemeriksaan = $this->nota_model->subjenispemeriksaan($idjenis);
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'data' => $pemeriksaan,

            );
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali", 'idjenis' => $idjenis);
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    /**
     * Rujukan Internal
     */
    function rujukan_internal()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if ($this->session->userdata('kdlokasi') && isset($_GET['idx'])) {
                    if ($this->session->userdata('kdlokasi') == "" || $_GET['idx'] == "") {
                        echo "<script>alert('Ops. Kode lokasi atau Kode Registrasi Unit kosong. {I.idx#kLok-Empty}');
                        history.back();
                        </script>";
                    } else {
                        $x['index_menu'] = 2;
                        $this->session->unset_userdata('sPage');
                        $this->session->unset_userdata('sLike');
                        $this->session->unset_userdata('sKelas');

                        $x['ruangID'] = $this->input->get('kLok');
                        $x['idx'] = $this->input->get('idx');
                        $y['ruangID'] = $this->session->userdata('kdlokasi');
                        $y['idx'] = $_GET['idx'];
                        $y['mod'] = 'rujukan';
                        $z = setNav("nav_2");

                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                        $y['header'] = $this->load->view('template/header', '', true);
                        $y['contentTitle'] = "Entry Nota Tagihan Layanan";

                        $y['detail'] = $this->nota_model->getPendaftaran($x['idx']);
                        $y['diagnosa']  = $this->nota_model->getDiagnosa($x["idx"]);
                        $y["pulang"]    = 0;
                        $kelas_id = 2;
                        if (!empty($y["detail"])) {
                            $nomr = $y["detail"]->nomr;
                            $kelas_id = $y["detail"]->id_kelas;
                            $y["poliklinik"]    = $this->nota_model->getPolyAsal($y["detail"]->id_daftar);
                            //$y['layanan']       = $this->nota_model->getLayanan(52,$kelas_id);
                            if ($y["detail"]->jns_layanan == "RI") {

                                $y["getDokter"] = $this->nota_model->getDokter();
                            } else {
                                $y["getDokter"] = $this->nota_model->getDokter($x['ruangID']);
                            }
                            $pulang = $this->nota_model->getPulang($y["detail"]->reg_unit);
                            if (!empty($pulang)) $y["pulang"] = 1;
                        } else {
                            $pulang = array();
                            $nomr = "";
                            $y["poliklinik"] = array();
                        }
                        // List Ruang Penunjang
                        $this->db->where('grid', '3');
                        $y['getRuang'] = $this->db->get('tbl01_ruang');

                        $this->db->where('grid', '1');
                        //$this->db->where_not_in('idx',$this->session->userdata('kdlokasi'));
                        $y['getRuangRujukan']   = $this->db->get('tbl01_ruang');

                        $idlevel = $this->session->userdata('level');
                        $idmodul = MODUL_ID;
                        if ($y["detail"]->jns_layanan == "RJ") $kodemenu = 45;
                        elseif ($y["detail"]->jns_layanan == "RI") $kodemenu = 46;
                        elseif ($y["detail"]->jns_layanan == "PJ") $kodemenu = 47;
                        elseif ($y["detail"]->jns_layanan == "GD") $kodemenu = 48;
                        else $kodemenu = "";
                        $y["hakakses"] = $this->nota_model->getAkses($idlevel, $idmodul, $kodemenu);

                        $y['modul']             = $this->load->view('nota_tagihan/template_rujukan', $y, true);
                        $x['content']           = $this->load->view('layanan/template_entry', $y, true);
                        $x['lib'] = array('js/layanan.js');
                        $this->load->view('template/theme', $x);
                    }
                } else {
                    echo "<script>alert('Ops. Permintaan halaman tidak di sesuai. {I.idx#kLok-NA}');
                    history.back();
                    </script>";
                }
            } else {
                echo "<script>alert('Ops. Permintaan halaman tidak di sesuai. {MG-NA}!');
                history.back();
                </script>";
            }
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'nota_tagihan.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }
    function data_rujukan_internal($reg_unit)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'data' => $this->nota_model->data_rujukan_internal($reg_unit),
            );
        } else {
            $response = array(
                'status'    => false,
                'message'   => "Session Expire",
                'data'      => array(),
            );
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    function surat_permintaan($idx)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $permintaan = $this->nota_model->getPermintaanByid($idx);
            if ($permintaan->id_penunjang == "49") $judul = "Formulir Pemeriksaan Radiologi";
            else if ($permintaan->id_penunjang == "50") $judul = "Formulir Pemeriksaan Laboratorium";
            else if ($permintaan->id_penunjang == "51") $judul = "Formulir Pemeriksaan Patologi Anatomi";
            else if ($permintaan->id_penunjang == "52") $judul = "Formulir Pemeriksaan IDT";

            $data = array(
                'id_penunjang'  => $permintaan->id_penunjang,
                'judul'         => $judul,
                'permintaan'    => $permintaan,
                'id_permintaan' => $idx
            );
            $this->load->view('nota_tagihan/template_surat_permintaan', $data);
        } else {
            echo "session expire";
        }
    }
    /** Jadwal Operasi */
    function operasi()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if ($this->session->userdata('kdlokasi') && isset($_GET['idx'])) {
                    if ($this->session->userdata('kdlokasi') == "" || $_GET['idx'] == "") {
                        echo "<script>alert('Ops. Kode lokasi atau Kode Registrasi Unit kosong. {I.idx#kLok-Empty}');
                        history.back();
                        </script>";
                    } else {
                        $x['index_menu'] = 2;
                        $this->session->unset_userdata('sPage');
                        $this->session->unset_userdata('sLike');
                        $this->session->unset_userdata('sKelas');

                        $x['ruangID'] = $this->input->get('kLok');
                        $x['idx'] = $this->input->get('idx');
                        $y['ruangID'] = $this->session->userdata('kdlokasi');
                        $y['idx'] = $_GET['idx'];
                        $y['mod'] = 'operasi';
                        $z = setNav("nav_2");

                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                        $y['header'] = $this->load->view('template/header', '', true);
                        $y['contentTitle'] = "Entry Nota Tagihan Layanan";

                        $y['detail'] = $this->nota_model->getPendaftaran($x['idx']);
                        $y['diagnosa']  = $this->nota_model->getDiagnosa($x["idx"]);
                        $y["pulang"]    = 0;
                        $kelas_id = 2;
                        if (!empty($y["detail"])) {
                            $nomr = $y["detail"]->nomr;
                            $kelas_id = $y["detail"]->id_kelas;
                            $y["poliklinik"]    = $this->nota_model->getPolyAsal($y["detail"]->id_daftar);
                            //$y['layanan']       = $this->nota_model->getLayanan(52,$kelas_id);
                            if ($y["detail"]->jns_layanan == "RI") {

                                $y["getDokter"] = $this->nota_model->getDokter();
                            } else {
                                $y["getDokter"] = $this->nota_model->getDokter($x['ruangID']);
                            }
                            $pulang = $this->nota_model->getPulang($y["detail"]->reg_unit);
                            if (!empty($pulang)) $y["pulang"] = 1;
                        } else {
                            $pulang = array();
                            $nomr = "";
                            $y["poliklinik"] = array();
                        }
                        // List Ruang Penunjang
                        $this->db->where('grid', '3');
                        $y['getRuang'] = $this->db->get('tbl01_ruang');

                        $this->db->where('grid', '1');
                        //$this->db->where_not_in('idx',$this->session->userdata('kdlokasi'));
                        $y['getRuangRujukan']   = $this->db->get('tbl01_ruang');
                        //$y['getJenisTindakan']   = $this->db->get('tbl01_jenis_tindakan_operasi');
                        $y['getCaraBayar']      = $this->db->get('tbl01_cara_bayar');
                        $y['getJenisPelayanan'] = $this->db->get('tbl01_jenis_pelayanan');
                        $y['getCaraKeluar']     = $this->db->get('tbl01_cara_keluar');
                        $y['getKeadaanKeluar']  = $this->db->get('tbl01_keadaan_keluar');
                        $y['tgl_daftar']        = $this->nota_model->getTgldaftar($nomr);


                        $y['pasien_pulang']     = $pulang;
                        //$y['pasien_pindah']     = $pindah;

                        $this->db->where('status_ruang', 1);
                        $this->db->where('grid', '2');
                        //$this->db->where_not_in('idx',$this->session->userdata('kdlokasi'));
                        $y['getRuangPindah'] = $this->db->get('tbl01_ruang');
                        if (!empty($pindah)) {
                            $id_kelas = $pindah->id_kelas;
                            $ruang_tujuan = $pindah->id_ruang;
                        } else {
                            $id_kelas = "";
                            $ruang_tujuan = "";
                        }
                        $this->db->where('kelas_id', $id_kelas);
                        $this->db->where('id_ruang', $ruang_tujuan);
                        //$this->db->join('tbl01_kamar', 'tbl01_kamar.id_ruang=tbl01_ruang.idx');
                        $y["getKamar"] = $this->db->get("tbl01_kamar");
                        $y['getKelas'] = $this->db->get('tbl01_kelas_layanan');

                        $idlevel = $this->session->userdata('level');
                        $idmodul = MODUL_ID;
                        if ($y["detail"]->jns_layanan == "RJ") $kodemenu = 45;
                        elseif ($y["detail"]->jns_layanan == "RI") $kodemenu = 46;
                        elseif ($y["detail"]->jns_layanan == "PJ") $kodemenu = 47;
                        elseif ($y["detail"]->jns_layanan == "GD") $kodemenu = 48;
                        else $kodemenu = "";
                        $y["hakakses"] = $this->nota_model->getAkses($idlevel, $idmodul, $kodemenu);

                        $y['modul']             = $this->load->view('layanan/template_operasi', $y, true);
                        $x['content']           = $this->load->view('layanan/template_entry', $y, true);
                        $this->load->view('template/theme', $x);
                    }
                } else {
                    echo "<script>alert('Ops. Permintaan halaman tidak di sesuai. {I.idx#kLok-NA}');
                    history.back();
                    </script>";
                }
            } else {
                echo "<script>alert('Ops. Permintaan halaman tidak di sesuai. {MG-NA}!');
                history.back();
                </script>";
            }
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'nota_tagihan.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }

    function detail_rujukan($id)
    {
        $this->db->where('idx', $id);
        $data = $this->db->get('tbl02_rujuk_internal')->row();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    function registrasiPasien()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['no_permintaan']) &&
                    isset($_POST['id_ruang']) &&
                    isset($_POST['dokterJaga']) &&
                    isset($_POST['namaDokterJaga'])
                ) {

                    $no_permintaan = $this->input->post('no_permintaan', TRUE);
                    $id_ruang = $this->input->post('id_ruang', TRUE);
                    $datRujukInternal = getDataRujukInternalById($no_permintaan);
                    $datPendaftaran = getDataPendaftaranByRegUnit($datRujukInternal['reg_unit']);

                    $params = array(
                        'id_daftar' => $datRujukInternal['id_daftar'],
                        'nomr' => $datRujukInternal['nomr'],
                        'no_ktp' => $datPendaftaran['no_ktp'],
                        'nama_pasien' => $datRujukInternal['nama_pasien'],
                        'tempat_lahir' => $datPendaftaran['tempat_lahir'],
                        'tgl_lahir' => $datPendaftaran['tgl_lahir'],
                        'jns_kelamin' => $datPendaftaran['jns_kelamin'],
                        'jns_layanan' => "RJ",
                        'id_ruang' => $id_ruang,
                        'nama_ruang' => getRuangByID($id_ruang),
                        'id_rujuk' => '7',
                        'rujukan' => 'RUJUK INTERNAL',
                        'no_rujuk' => $datRujukInternal['reg_unit'],
                        'asal_ruang' => $datRujukInternal['ruang_pengirim'],
                        'nama_asal_ruang' => $datRujukInternal['nama_ruang_pengirim'],
                        'dokter_pengirim' => $datRujukInternal['dokter_pengirim'],
                        'nama_dokter_pengirim' => $datRujukInternal['nama_dokter_pengirim'],
                        'id_cara_bayar' => $datPendaftaran['id_cara_bayar'],
                        'cara_bayar' => $datPendaftaran['cara_bayar'],
                        'no_bpjs' => $datPendaftaran['no_bpjs'],
                        'no_jaminan' => $datPendaftaran['no_jaminan'],
                        'tgl_jaminan' => $datPendaftaran['tgl_jaminan'],
                        'id_kelas' => $datPendaftaran['id_kelas'],
                        'kelas_layanan' => $datPendaftaran['kelas_layanan'],
                        'pjPasienNama' => $datPendaftaran['pjPasienNama'],
                        'pjPasienUmur' => $datPendaftaran['pjPasienUmur'],
                        'pjPasienPekerjaan' => $datPendaftaran['pjPasienPekerjaan'],
                        'pjPasienAlamat' => $datPendaftaran['pjPasienAlamat'],
                        'pjPasienTelp' => $datPendaftaran['pjPasienTelp'],
                        'pjPasienHubKel' => $datPendaftaran['pjPasienHubKel'],
                        'pjPasienDikirimOleh' => $datPendaftaran['pjPasienDikirimOleh'],
                        'pjPasienAlmtPengirim' => $datPendaftaran['pjPasienAlmtPengirim'],
                        'dokterJaga'    => $this->input->post('dokterJaga'),
                        'namaDokterJaga'    => $this->input->post('namaDokterJaga'),
                        'user_daftar' => $this->session->userdata('get_uid'),
                        'session_id' => session_id()
                    );

                    if ($no_permintaan == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. ID rujukan internal tidak boleh kosong!";
                    } elseif ($id_ruang == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. ID tujuan pelayanan tidak boleh kosong!";
                    } else {
                        $cekCommand = $this->db->insert('tbl02_pendaftaran', $params);
                        $insertID = $this->db->insert_id();
                        if ($cekCommand) {
                            $this->db->from('tbl02_pendaftaran');
                            $this->db->where('session_id', session_id());
                            $this->db->order_by('idx', 'desc');
                            $this->db->limit(1);
                            $cekQuery = $this->db->get();
                            if ($cekQuery->num_rows() > 0) {
                                $resData = $cekQuery->row_array();
                                $paramsResponse = array(
                                    'id_rujuk_internal' => $no_permintaan,
                                    'id_daftar' => $params['id_daftar'],
                                    'reg_unit' => $resData['reg_unit'],
                                    'user_id' => $this->session->userdata('get_uid')
                                );
                                $cekCmdPenunjang = $this->db->insert('tbl02_rujuk_internal_response', $paramsResponse);
                                if ($cekCmdPenunjang) {
                                    $response['code'] = 200;
                                    $response['idx']    = $insertID;
                                    $response['klok']   = $id_ruang;
                                    $response['message'] = "Simpan data sukses.";
                                    $response['url'] = encrypt_decrypt('encrypt', $resData['reg_unit'], true);
                                } else {
                                    $response['code'] = 202;
                                    $response['message'] = "Simpan data sukses. Update response rujuk internal gagal. Silahkan hubungi administrator";
                                    $response['url'] = null;
                                }
                            } else {
                                $response['code'] = 202;
                                $response['message'] = "Simpan data sukses namun cookies telah dihapus.";
                                $response['url'] = null;
                            }
                        } else {
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                } else {
                    $response['code'] = 401;
                    $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
    // Registrasi Pasien Penunjang
    function registrasiPasienpp()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['no_permintaan']) &&
                    isset($_POST['id_ruang']) &&
                    isset($_POST['dokterJaga'])
                ) {
                    $no_permintaan = $this->input->post('no_permintaan', TRUE);
                    $id_ruang = $this->input->post('id_ruang', TRUE);
                    $datPermintaanPenunjang = getDataPermintaanPenunjangById($no_permintaan);
                    $datPendaftaran = getDataPendaftaranByRegUnit($datPermintaanPenunjang['reg_unit']);
                    $params = array(
                        'id_daftar' => $datPermintaanPenunjang['id_daftar'],
                        'nomr' => $datPermintaanPenunjang['nomr'],
                        'no_ktp' => $datPendaftaran['no_ktp'],
                        'nama_pasien' => $datPermintaanPenunjang['nama_pasien'],
                        'tempat_lahir' => $datPendaftaran['tempat_lahir'],
                        'tgl_lahir' => $datPendaftaran['tgl_lahir'],
                        'jns_kelamin' => $datPendaftaran['jns_kelamin'],
                        'nama_provinsi' => $datPendaftaran['nama_provinsi'],
                        'nama_kab_kota' => $datPendaftaran['nama_kab_kota'],
                        'nama_kecamatan' => $datPendaftaran['nama_kecamatan'],
                        'nama_kelurahan' => $datPendaftaran['nama_kelurahan'],
                        'jns_layanan' => "PJ",
                        'tgl_daftar' => $datPendaftaran['tgl_daftar'],
                        'id_ruang' => $id_ruang,
                        'nama_ruang' => getRuangByID($id_ruang),
                        'id_rujuk' => '7',
                        'rujukan' => 'PERMINTAAN PENUNJANG',
                        'no_rujuk' => $datPermintaanPenunjang['reg_unit'],
                        'asal_ruang' => $datPermintaanPenunjang['ruang_pengirim'],
                        'nama_asal_ruang' => $datPermintaanPenunjang['nama_ruang_pengirim'],
                        'dokter_pengirim' => $datPermintaanPenunjang['dokter_pengirim'],
                        'nama_dokter_pengirim' => $datPermintaanPenunjang['nama_dokter_pengirim'],
                        'id_cara_bayar' => $datPendaftaran['id_cara_bayar'],
                        'cara_bayar' => $datPendaftaran['cara_bayar'],
                        'id_jenis_peserta' => $datPendaftaran['id_jenis_peserta'],
                        'jenis_peserta' => $datPendaftaran['jenis_peserta'],
                        'no_bpjs' => $datPendaftaran['no_bpjs'],
                        'no_jaminan' => $datPendaftaran['no_jaminan'],
                        'tgl_jaminan' => $datPendaftaran['tgl_jaminan'],
                        'id_kelas' => $datPendaftaran['id_kelas'],
                        'kelas_layanan' => $datPendaftaran['kelas_layanan'],
                        'pjPasienNama' => $datPendaftaran['pjPasienNama'],
                        'pjPasienUmur' => $datPendaftaran['pjPasienUmur'],
                        'pjPasienPekerjaan' => $datPendaftaran['pjPasienPekerjaan'],
                        'pjPasienAlamat' => $datPendaftaran['pjPasienAlamat'],
                        'pjPasienTelp' => $datPendaftaran['pjPasienTelp'],
                        'pjPasienHubKel' => $datPendaftaran['pjPasienHubKel'],
                        'pjPasienDikirimOleh' => $datPendaftaran['pjPasienDikirimOleh'],
                        'pjPasienAlmtPengirim' => $datPendaftaran['pjPasienAlmtPengirim'],
                        'dokterJaga'    => $this->input->post('dokterJaga'),
                        'namaDokterJaga'    => getNamaDokter($this->input->post('dokterJaga')),
                        'kode_permintaan'   => $datPermintaanPenunjang["idx"],
                        'user_daftar' => $this->session->userdata('get_uid'),
                        'session_id' => session_id()
                    );


                    if ($no_permintaan == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. ID Permintaan penunjang tidak boleh kosong!";
                    } elseif ($id_ruang == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. ID tujuan pelayanan tidak boleh kosong!";
                    } else {
                        //Insert Ke tabel pendaftaran
                        $this->db->trans_start();
                        $cekCommand = $this->db->insert('tbl02_pendaftaran', $params);
                        $insertID = $this->db->insert_id();
                        if ($cekCommand) {
                            $this->db->from('tbl02_pendaftaran');
                            $this->db->where('session_id', session_id());
                            $this->db->order_by('idx', 'desc');
                            $this->db->limit(1);
                            $cekQuery = $this->db->get();
                            if ($cekQuery->num_rows() > 0) {
                                $resData = $cekQuery->row_array();
                                $paramsResponse = array(
                                    'id_permintaan_penunjang' => $no_permintaan,
                                    'id_daftar' => $params['id_daftar'],
                                    'reg_unit' => $resData['reg_unit'],
                                    'user_id' => $this->session->userdata('get_uid')
                                );

                                //Ambil data dari tabel permintaan tindakan penunjang kemudian Insert Ke tabel nota tagihan
                                /*$this->db->select('*,tbl02_permintaan_tindakan_penunjang.idx AS idx_permintaan');
                                $this->db->where('id_permintaan', $no_permintaan);
                                $this->db->join('tbl01_tarif_layanan', 'tbl01_tarif_layanan.idx=tbl02_permintaan_tindakan_penunjang.id_tarif');
                                $row=$this->db->get('tbl02_permintaan_tindakan_penunjang')->result();
                                foreach ($row as $row) {
                                    //$st=$row->jasa_pelayanan+$row->jasa_sarana;
                                    $dilayani = $this->input->post('status_dilayani_'.$row->idx_permintaan);
                                    $ly=array('control'=>'status_dilayani'.$row->idx_permintaan,'status_dilayani'=>$dilayani);
                                    if($dilayani=="1"){
                                        $tindakan[]=array(
                                            'id_daftar' => $params['id_daftar'],
                                            'reg_unit' => $resData['reg_unit'],
                                            'nomr' => $resData['nomr'],
                                            'id_tarif' => $row->id_tarif,
                                            'layanan' => $row->layanan,
                                            'jasa_sarana' => $row->jasa_sarana,
                                            'jasa_pelayanan' => $row->jasa_pelayanan,
                                            'tarif_layanan' => $row->tarif_layanan,
                                            'kategori_id' => $row->kategori_id,
                                            'kelas_id' => $row->kelas_id,
                                            'jml' => 1,
                                            'sub_total_tarif' => $row->tarif_layanan,
                                            'id_dokter' => $this->input->post('dokterJaga',TRUE),
                                            'user_exec' => $this->session->userdata('get_uid')
                                        );
                                    }else{
                                        $dilayani=0;
                                    }
                                    $jadwal[]=array(
                                        'idx_pendaftaran'   => $insertID,
                                        'jadwal_tindakan'   => $row->jadwal_tindakan,
                                        'status_dilayani'   => $dilayani,
                                        'id_tarif' => $row->id_tarif,
                                        'layanan' => $row->layanan,
                                        'id_dokter' => $this->input->post('dokterJaga',TRUE),
                                        'user_exec' => $this->session->userdata('get_uid')
                                    );
                                    
                                }*/
                                //if(!empty($tindakan)) $this->db->insert_batch('tbl03_nota_detail', $tindakan);
                                //if(!empty($jadwal)) $this->db->insert_batch('tbl02_jadwal_tindakan_penunjang', $jadwal);


                                $cekCmdPenunjang = $this->db->insert('tbl02_permintaan_penunjang_response', $paramsResponse);
                                if ($cekCmdPenunjang) {
                                    /**
                                     * Ambil data pemeriksaan penunjang
                                     */
                                    $permintaan = $this->nota_model->getPermintaan($no_permintaan);
                                    foreach ($permintaan as $p) {
                                        $insert_permintaan[] = array(
                                            'idx_pendaftaran'       => $insertID,
                                            'id_jenis_pemeriksaan'  => $p->idjenispemeriksaan,
                                            'jenis_pemeriksaan'     => $p->jenispemeriksaan,
                                            'id_subjenispemeriksaan'  => $p->idsubjenispemeriksaan,
                                            'subjenispemeriksaan'     => $p->subjenispemeriksaan,
                                            'id_pemeriksaan'        => $p->id_pemeriksaan,
                                            'nama_pemeriksaan'      => $p->nama_pemeriksaan,
                                            'id_dokter'             => $this->input->post('dokterJaga'),
                                            'status_dilayani'       => 0,
                                            'user_exec'             => $this->session->userdata('get_uid')
                                        );
                                    }
                                    $this->db->insert_batch('tbl02_pemeriksaan_penunjang', $insert_permintaan);


                                    $response['code'] = 200;
                                    $response['message'] = "Simpan data sukses.";
                                    $response['idx'] = $insertID;
                                    $response['klok'] = $id_ruang;
                                    $response['url'] = encrypt_decrypt('encrypt', $resData['reg_unit'], true);
                                    $response['permintaan'] = $permintaan;
                                } else {
                                    $response['code'] = 202;
                                    $response['message'] = "Simpan data sukses. Update response penunjang gagal. Silahkan hubungi administrator";
                                    $response['url'] = null;
                                }
                            } else {
                                $response['code'] = 202;
                                $response['message'] = "Simpan data sukses namun cookies telah dihapus.";
                                $response['url'] = null;
                            }
                        } else {
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                        $this->db->trans_complete();
                    }
                } else {
                    $response['code'] = 401;
                    $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
                    $response['request'] = array('no_permintaan' => $this->input->post('no_permintaan', TRUE));
                }
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
    function tindakan($id_permintaan)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->select('*');
            $this->db->join('tbl01_jenis_pemeriksaan b', 'b.idx=a.idjenispemeriksaan');
            $this->db->where('id_permintaan', $id_permintaan);
            $this->db->order_by('idjenispemeriksaan');
            $tindakan = $this->db->get('tbl02_permintaan_tindakan_penunjang a');
            $response = array('status' => true, 'data' => $tindakan->result(), 'row_count' => $tindakan->num_rows(), 'message' => "OK");
        } else {
            $response = array('status' => false, 'data' => array(), 'row_count' => 0, 'message' => 'session Expired');
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function simpanRujukInternal()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['id_daftar']) &&
                    isset($_POST['reg_unit']) &&
                    isset($_POST['nomr']) &&
                    isset($_POST['nama_pasien']) &&
                    isset($_POST['ruang_pengirim']) &&
                    isset($_POST['nama_ruang_pengirim']) &&
                    isset($_POST['id_poli']) &&
                    isset($_POST['nama_poli']) &&
                    isset($_POST['dokter_pengirim']) &&
                    isset($_POST['nama_dokter_pengirim']) &&
                    isset($_POST['keterangan'])
                ) {
                    $params = array(
                        'id_daftar' => $this->input->post('id_daftar', TRUE),
                        'reg_unit' => $this->input->post('reg_unit', TRUE),
                        'nomr' => $this->input->post('nomr', TRUE),
                        'nama_pasien' => $this->input->post('nama_pasien', TRUE),
                        'ruang_pengirim' => $this->input->post('ruang_pengirim', TRUE),
                        'nama_ruang_pengirim' => $this->input->post('nama_ruang_pengirim', TRUE),
                        'id_poli' => $this->input->post('id_poli', TRUE),
                        'nama_poli' => $this->input->post('nama_poli', TRUE),
                        'dokter_pengirim' => $this->input->post('dokter_pengirim', TRUE),
                        'nama_dokter_pengirim' => $this->input->post('nama_dokter_pengirim', TRUE),
                        'keterangan' => $this->input->post('keterangan', TRUE),
                        'user_exec' => $this->session->userdata('get_uid')
                    );

                    if ($params['id_daftar'] == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. No. Registrasi RS tidak dikenali! Silahkan coba kembali.";
                    } elseif ($params['reg_unit'] == "") {
                        $response['code'] = 402;
                        $response['message'] = "Ops. No. Registrasi Unit tidak dikenali! Silahkan coba kembali.";
                    } elseif ($params['nomr'] == "") {
                        $response['code'] = 403;
                        $response['message'] = "Ops. No. MR tidak dikenali! Silahkan coba kembali.";
                    } elseif ($params['ruang_pengirim'] == "") {
                        $response['code'] = 404;
                        $response['message'] = "Ops. Ruang pengirim tidak dikenali! Silahkan coba kembali.";
                    } elseif ($params['id_poli'] == "") {
                        $response['code'] = 405;
                        $response['message'] = "Ops. Poli rujukan belum di pilih! Silahkan coba kembali.";
                    } elseif ($params['dokter_pengirim'] == "") {
                        $response['code'] = 406;
                        $response['message'] = "Ops. Dokter pengirim belum dipilih! Silahkan coba kembali.";
                    } elseif ($params['keterangan'] == "") {
                        $response['code'] = 407;
                        $response['message'] = "Ops. Keterangan tidak boleh kosong! Silahkan coba kembali.";
                    } else {
                        $cekCommand = $this->db->insert('tbl02_rujuk_internal', $params);
                        if ($cekCommand) {
                            $response['code'] = 200;
                            $response['message'] = "Simpan data sukses.";
                        } else {
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                } else {
                    $response['code'] = 401;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
    //Yang Lama

}
