<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class nota_tagihan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
        $this->load->model('nota_model');
        $this->load->model('Layanan_model');
        $this->load->model('Smart_model');
    }

    function index()
    {
        /*$ses_state = $this->users_model->cek_session_id();        
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $x['index_menu'] = 2;
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Lokasi Pelayanan";        

            $NRP = $this->session->userdata('get_uid');
            $SQL = "SELECT * FROM tbl01_ruang 
            WHERE idx IN (SELECT ruang_akses FROM tbl01_users_nota_tagihan 
            WHERE NRP = '$NRP') AND grid=1 ORDER BY ruang"; 
            $y['getRuang'] = $this->db->query("$SQL");
            $jmlruang=$y['getRuang']->num_rows();
            if($jmlruang==1) {
                $kdlok=$y['getRuang']->row()->idx;
                header('location:'.base_url() ."nota_tagihan.php/nota_tagihan/tambah?kLok=" .$kdlok);
            }else{
                $x['content'] = $this->load->view('nota_tagihan/template_ruang',$y,true);
                $this->load->view('template/theme',$x);
            }
            
        }else{
            $sid = getSessionID();
            $url_login = base_url().'nota_tagihan.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }   */

        /*$ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if ($this->session->userdata('kdlokasi')) {
                    $this->session->unset_userdata('sPage');
                    $this->session->unset_userdata('sLike');
                    if ($this->session->userdata('kdlokasi') == "") {
                        $response['code'] = 402;
                        $response['message'] = "Ops. Lokasi Layanan tidak ditemukan. Coba ulangi kembali.";
                    } else {
                        $x['header'] = $this->load->view('template/header', '', true);
                        $x['index_menu'] = 2;
                        $z = setNav("nav_2");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
                        $y['contentTitle'] = "Cari Pasien";
                        $y['ruangID'] = $this->session->userdata('kdlokasi');
                        $y["ruang"] = $this->nota_model->getRuang($this->session->userdata('kdlokasi'));
                        $y["notif"] = 0;
                        $idlevel = $this->session->userdata('level');
                        $idmodul = MODUL_ID;
                        if (!empty($y["ruang"])) {
                            if ($y["ruang"]->grid == 1) {
                                //get notif rujukan internal Rawat Jalan
                                $y["notif"] = $this->nota_model->getNotif('internal', $this->session->userdata('kdlokasi'));
                            } elseif ($y["ruang"]->grid == 2) {
                                //get notif rujukan pindah kamar Rawat Inap
                                $y["notif"] = $this->nota_model->getNotif('kamar', $this->session->userdata('kdlokasi'));
                            } elseif ($y["ruang"]->grid == 3) {
                                # Get Notifikasi permintaan Penunjang Penunjang
                                $y["notif"] = $this->nota_model->getNotif('penunjang', $this->session->userdata('kdlokasi'));
                            }
                        }
                        $x['content'] = $this->load->view('nota_tagihan/template_table', $y, true);
                        $this->load->view('template/theme', $x);
                    }
                } else {
                    $response['code'] = 402;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
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
        }*/

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
                            $field = array('id_daftar', 'reg_unit', 'tgl_masuk', 'nomr', 'nama_pasien', 'tgl_lahir', '=jekel[{{jns_kelamin}}]', 'namaDokterJaga', '{{nama_ruang}} / {{nama_kamar}} ', 'kelas_layanan', 'cara_bayar', '=action[{{status_pasien}}]');
                        } elseif ($ruang->grid == 3) {
                            $jns_layanan = 'PJ';
                            $kondisi = array('idruang' => $this->session->userdata('kdlokasi'), 'dokter' => 1);
                            $dokter = $this->Layanan_model->getDokter($kondisi);
                            $notif = $this->nota_model->getNotif('penunjang', $this->session->userdata('kdlokasi'));
                            $field = array('id_daftar', 'reg_unit', 'tgl_masuk', 'nomr', 'nama_pasien', 'tgl_lahir', 'jns_kelamin', 'namaDokterJaga', '{{nama_ruang}}', 'cara_bayar');
                        } else $notif = 0;

                        $action = "<div class='btn-group'><button onclick='pilihPasien({{idx}})' class='btn btn-danger btn-sm'><span class='fa fa-search'></span> Pilih</button></div>";
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
                            $action = "<div class='btn-group'><button onclick='registrasiPasien({{idx}})' class='btn btn-success btn-sm' id='terima{{idx}}'><span class='fa fa-check'></span> Terima</button></div>";
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
                            'variable'      => array('idx' => 'idx', 'nama_ruang_pengirim' => 'nama_ruang_pengirim', 'nama_kamar_pengirim' => 'nama_kamar_pengirim', 'jns_kelamin' => 'jns_kelamin'),
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
                            'getDokter' => $dokter,
                            'kelas'=>$this->db->get('tbl01_kelas_layanan')->result()
                        );
                        //echo "<script>".getData($config2)."</script>";exit;

                        //$actionbatal= "var batal = {'$btnbatal','Sudah Diresponse'}";
                        $theme = array(
                            'header' => $this->load->view('template/header', '', true),
                            'index_menu' => 2,
                            'nav_sidebar' => $this->load->view('template/nav_sidebar', $z, true),
                            'content' => $this->load->view('layanan/layanan_index', $data, true),
                            'ajaxdata' => "var jekel = {'0':'Perempuan','1':'Laki-Laki','P':'Perempuan','L':'Laki-Laki'};
                                            var response = {'0':'<span class=\"btn btn-danger btn-xs\" >Belum Diresponse</span>','1':'<span class=\"btn btn-success btn-xs\">Sudah Diresponse</span>'}; 
                                            var action = {'1':'<span class=\"pull-right badge bg-green\">Aktif</span>','2':'<span class=\"pull-right badge bg-yellow\">Dirawat</span>','3':'<span class=\"pull-right badge bg-yellow\">Menunggu Response <br>Pindah</span>','4':'<span class=\"pull-right badge bg-yellow\">Sudah Pindah</span>','5':'<span class=\"pull-right badge bg-yellow\">Sudah Pulang</span>','6':'<span class=\"pull-right badge bg-yellow\">Batal Berobat</span>'}; 
                                            var dis=['','disabled']" . getData($config) . getData($config1) . getData($config2) . getData($config3),
                            'lib' => array('js/layanan.js')
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
            $url_login = base_url() . 'mr_registrasi.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }

    function ranap()
    {
        /*$ses_state = $this->users_model->cek_session_id();        
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $x['index_menu'] = 2;
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Lokasi Pelayanan";        

            $NRP = $this->session->userdata('get_uid');
            $SQL = "SELECT * FROM tbl01_ruang 
            WHERE idx IN (SELECT ruang_akses FROM tbl01_users_nota_tagihan 
            WHERE NRP = '$NRP') AND grid=2 ORDER BY ruang"; 
            $y['getRuang'] = $this->db->query("$SQL");
            $jmlruang=$y['getRuang']->num_rows();
            if($jmlruang==1) {
                $kdlok=$y['getRuang']->row()->idx;
                header('location:'.base_url() ."nota_tagihan.php/nota_tagihan/tambah?kLok=" .$kdlok);
            }else{
                $x['content'] = $this->load->view('nota_tagihan/template_ruang',$y,true);
                $this->load->view('template/theme',$x);
            }
            
        }else{
            $sid = getSessionID();
            $url_login = base_url().'nota_tagihan.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }  */
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
                        $x['header'] = $this->load->view('template/header', '', true);
                        $x['index_menu'] = 2;
                        $z = setNav("nav_2");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
                        $y['contentTitle'] = "Cari Pasien";
                        $y['ruangID'] = $this->session->userdata('kdlokasi');
                        $y["ruang"] = $this->nota_model->getRuang($this->session->userdata('kdlokasi'));
                        $y["notif"] = 0;
                        $idlevel = $this->session->userdata('level');
                        $idmodul = MODUL_ID;
                        if (!empty($y["ruang"])) {
                            if ($y["ruang"]->grid == 1) {
                                //get notif rujukan internal Rawat Jalan
                                $y["notif"] = $this->nota_model->getNotif('internal', $this->session->userdata('kdlokasi'));
                            } elseif ($y["ruang"]->grid == 2) {
                                //get notif rujukan pindah kamar Rawat Inap
                                $y["notif"] = $this->nota_model->getNotif('kamar', $this->session->userdata('kdlokasi'));
                            } elseif ($y["ruang"]->grid == 3) {
                                # Get Notifikasi permintaan Penunjang Penunjang
                                $y["notif"] = $this->nota_model->getNotif('penunjang', $this->session->userdata('kdlokasi'));
                            }
                        }
                        $x['content'] = $this->load->view('nota_tagihan/template_table', $y, true);
                        $this->load->view('template/theme', $x);
                    }
                } else {
                    $response['code'] = 402;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
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

    function penunjang()
    {
        /*$ses_state = $this->users_model->cek_session_id();        
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $x['index_menu'] = 2;
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['contentTitle'] = "Lokasi Pelayanan";
            $NRP = $this->session->userdata('get_uid');
            $SQL = "SELECT * FROM tbl01_ruang 
            WHERE idx IN (SELECT ruang_akses FROM tbl01_users_nota_tagihan 
            WHERE NRP = '$NRP') AND grid=3 ORDER BY ruang"; 
            $y['getRuang'] = $this->db->query("$SQL");
            $jmlruang=$y['getRuang']->num_rows();
            if($jmlruang==1) {
                $kdlok=$y['getRuang']->row()->idx;
                header('location:'.base_url() ."nota_tagihan.php/nota_tagihan/tambah?kLok=" .$kdlok);
            }else{
                $x['content'] = $this->load->view('nota_tagihan/template_ruang',$y,true);
                $this->load->view('template/theme',$x);
            }
            
        }else{
            $sid = getSessionID();
            $url_login = base_url().'nota_tagihan.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }  */
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
                        $x['header'] = $this->load->view('template/header', '', true);
                        $x['index_menu'] = 2;
                        $z = setNav("nav_2");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
                        $y['contentTitle'] = "Cari Pasien";
                        $y['ruangID'] = $this->session->userdata('kdlokasi');
                        $y["ruang"] = $this->nota_model->getRuang($this->session->userdata('kdlokasi'));
                        $y["notif"] = 0;
                        $idlevel = $this->session->userdata('level');
                        $idmodul = MODUL_ID;
                        if (!empty($y["ruang"])) {
                            if ($y["ruang"]->grid == 1) {
                                //get notif rujukan internal Rawat Jalan
                                $y["notif"] = $this->nota_model->getNotif('internal', $this->session->userdata('kdlokasi'));
                            } elseif ($y["ruang"]->grid == 2) {
                                //get notif rujukan pindah kamar Rawat Inap
                                $y["notif"] = $this->nota_model->getNotif('kamar', $this->session->userdata('kdlokasi'));
                            } elseif ($y["ruang"]->grid == 3) {
                                # Get Notifikasi permintaan Penunjang Penunjang
                                $y["notif"] = $this->nota_model->getNotif('penunjang', $this->session->userdata('kdlokasi'));
                            }
                        }
                        $x['content'] = $this->load->view('nota_tagihan/template_table', $y, true);
                        $this->load->view('template/theme', $x);
                    }
                } else {
                    $response['code'] = 402;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
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

    function tambah()
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
                        $x['header'] = $this->load->view('template/header', '', true);
                        $x['index_menu'] = 2;
                        $z = setNav("nav_2");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
                        $y['contentTitle'] = "Cari Pasien";
                        $y['ruangID'] = $this->session->userdata('kdlokasi');
                        $y["ruang"] = $this->nota_model->getRuang($this->session->userdata('kdlokasi'));
                        $y["notif"] = 0;
                        $idlevel = $this->session->userdata('level');
                        $idmodul = MODUL_ID;
                        if (!empty($y["ruang"])) {
                            if ($y["ruang"]->grid == 1) {
                                //get notif rujukan internal Rawat Jalan
                                $y["notif"] = $this->nota_model->getNotif('internal', $this->session->userdata('kdlokasi'));
                            } elseif ($y["ruang"]->grid == 2) {
                                //get notif rujukan pindah kamar Rawat Inap
                                $y["notif"] = $this->nota_model->getNotif('kamar', $this->session->userdata('kdlokasi'));
                            } elseif ($y["ruang"]->grid == 3) {
                                # Get Notifikasi permintaan Penunjang Penunjang
                                $y["notif"] = $this->nota_model->getNotif('penunjang', $this->session->userdata('kdlokasi'));
                            }
                        }
                        $x['content'] = $this->load->view('nota_tagihan/template_table', $y, true);
                        $this->load->view('template/theme', $x);
                    }
                } else {
                    $response['code'] = 402;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
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

    function igd()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                $this->session->unset_userdata('sPage');
                $this->session->unset_userdata('sLike');
                $x['index_menu'] = 2;
                $x['header'] = $this->load->view('template/header', '', true);
                $z = setNav("nav_2");
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
                $y['contentTitle'] = "Cari Pasien";
                $x['content'] = $this->load->view('nota_tagihan/template_igd', $y, true);
                $this->load->view('template/theme', $x);
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
    function list_permintaan_penunjang()
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
                        $x['index_menu'] = 2;
                        $y['ruangID'] = $this->session->userdata('kdlokasi');
                        $x['header'] = $this->load->view('template/header', '', true);
                        //$z = setNav("nav_3");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                        $y['contentTitle'] = "Cari dan Registrasikan Pasien ke ";

                        $this->db->where('tbl01_dokter.idruang', $y['ruangID']);
                        $this->db->select("tbl01_dokter.NRP,tbl01_pegawai.pgwNama");
                        $this->db->join('tbl01_pegawai', 'tbl01_dokter.NRP=tbl01_pegawai.NRP');
                        $y['getDokter'] = $this->db->get('tbl01_dokter');

                        $x['content'] = $this->load->view('nota_tagihan/template_permintaan_penunjang', $y, true);
                        $this->load->view('template/theme', $x);
                    }
                } else {
                    $response['code'] = 402;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'nota_tagihan.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }
    function list_rujuk_internal()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if ($this->session->userdata('kdlokasi')) {
                    $this->session->unset_userdata('sPage');
                    $this->session->unset_userdata('sLike');

                    if ($this->session->userdata('kdlokasi') == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Lokasi Layanan tidak ditemukan. Coba ulangi kembali.";
                    } else {
                        $x['index_menu'] = 2;
                        $x['header'] = $this->load->view('template/header', '', true);
                        $z = setNav("nav_2");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                        $y['contentTitle'] = "Cari dan Registrasikan Pasien ke ";
                        $y['ruangID'] = $this->session->userdata('kdlokasi');

                        $this->db->where('idruang', $y['ruangID']);
                        $this->db->join('tbl01_pegawai', 'tbl01_pegawai.NRP=tbl01_dokter.NRP');
                        $y['getDokter'] = $this->db->get('tbl01_dokter');

                        $x['content'] = $this->load->view('nota_tagihan/template_rujukan_internal', $y, true);
                        $this->load->view('template/theme', $x);
                    }
                } else {
                    $response['code'] = 402;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 403;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'nota_tagihan.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }

    function list_pindah_kamar()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if ($this->session->userdata('kdlokasi')) {
                    $this->session->unset_userdata('sPage');
                    $this->session->unset_userdata('sLike');

                    if ($this->session->userdata('kdlokasi') == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Lokasi Layanan tidak ditemukan. Coba ulangi kembali.";
                    } else {
                        $x['header'] = $this->load->view('template/header', '', true);
                        $z = setNav("nav_2");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                        $y['contentTitle'] = "Cari dan Registrasikan Pasien ke ";
                        $y['ruangID'] = $this->session->userdata('kdlokasi');
                        $y['kelas']=$this->db->get('tbl01_kelas_layanan')->result();
                        $x['content'] = $this->load->view('nota_tagihan/template_pindah_kamar', $y, true);
                        $this->load->view('template/theme', $x);
                    }
                } else {
                    $response['code'] = 402;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 403;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'nota_tagihan.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }

    function getView()
    {
        if (isset($_POST['ruangID'])) :
            $id_ruang = $this->input->post('ruangID', true);
        else :
            $id_ruang = $this->session->userdata('kdlokasi');
        endif;

        if (isset($_POST['page'])) :
            $offset = $this->input->post('page');
            //$offset = $this->uri_segment;
            $this->session->set_userdata('sPage', $offset);
        else :
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;

        $limit = $this->perPage;
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $condition = "WHERE id_ruang = '$id_ruang' ";

        if(!empty($dari)&&!empty($sampai)){
            if($dari==$sampai) $condition.= "AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = '$dari' ";
            else $condition.= "AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') BETWEEN '$dari' AND '$sampai' ";
            $this->session->set_userdata('dari', $dari);
            $this->session->set_userdata('sampai', $sampai);
        }else{
            $dari = ($this->session->userdata('dari')) ? $this->session->userdata('dari') : '';
            $sampai = ($this->session->userdata('sampai')) ? $this->session->userdata('sampai') : '';
            if(!empty($dari)&&!empty($sampai)){
                if ($dari == $sampai) $condition .= "AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = '$dari' ";
                else $condition .= "AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') BETWEEN '$dari' AND '$sampai' ";
            }
        }
        if (isset($_POST['sLike'])) {
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike', true));
            $condition .= "AND (nomr = '$sLike' OR a.id_daftar LIKE '%$sLike%' OR a.reg_unit LIKE '%$sLike%') ";
            $this->session->set_userdata('sLike', $sLike);
        } else {
            if ($this->session->userdata('sLike')) {
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (nomr = '$sLike' OR a.id_daftar LIKE '%$sLike%' OR a.reg_unit LIKE '%$sLike%') ";
            } else {
                //$condition .= "AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d')";
            }
        }

        /*$SQL = "SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,
        a.namaDokterJaga,a.nama_ruang,a.tgl_lahir,a.jns_kelamin,a.cara_bayar,a.id_ruang,
        IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal\n',b.tgl_created)) AS State,
        b.user_id AS userBatal 
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_batal b ON a.reg_unit=b.reg_unit
        $condition ORDER BY tgl_masuk DESC";*/

        $SQL = "SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,a.kelas_layanan,a.jns_layanan,
        a.namaDokterJaga,a.nama_ruang,a.tgl_lahir,a.jns_kelamin,a.cara_bayar,a.id_ruang,a.nama_kamar
        FROM tbl02_pendaftaran a 
        $condition ORDER BY tgl_masuk DESC";

        //echo "$SQL LIMIT $offset,$limit";    exit;
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url() . 'nota_tagihan.php/nota_tagihan/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        //echo "$SQL LIMIT $offset,$limit";
        //exit;
        $this->load->view('nota_tagihan/getDataKunjunganUnit', $x);
    }

    function getViewigd()
    {
        /*if(isset($_POST['ruangID'])):
            $jns_layanan = $this->input->post('jns_layanan',true);
        else:
            $jns_layanan = 0;
        endif;
        */
        if (isset($_POST['page'])) :
            $offset = $this->input->post('page');
            $this->session->set_userdata('sPage', $offset);
        else :
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;


        $limit = $this->perPage;

        $condition = "WHERE jns_layanan = 'GD' ";
        if (isset($_POST['sLike'])) {
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike', true));
            $condition .= "AND (nomr = '$sLike' OR a.id_daftar LIKE '%$sLike%' OR a.reg_unit LIKE '%$sLike%')";
            $this->session->set_userdata('sLike', $sLike);
        } else {
            if ($this->session->userdata('sLike')) {
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (nomr = '$sLike' OR a.id_daftar LIKE '%$sLike%' OR a.reg_unit LIKE '%$sLike%')";
            } else {
                $condition .= "AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d')";
            }
        }

        $SQL = "SELECT a.*,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal\n',b.tgl_created)) AS State,
        b.user_id AS userBatal 
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_batal b ON a.reg_unit=b.reg_unit
        $condition ORDER BY tgl_masuk DESC";

        //echo $SQL;    
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url() . 'nota_tagihan.php/nota_tagihan/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('nota_tagihan/getDataKunjunganUnit', $x);
    }
    function entry_nota()
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
                        //header('location:'.base_url()."nota_tagihan.php/nota_tagihan/histori?idx=" . $_GET['idx'] ."&kLok=". $this->session->userdata('kdlokasi'));
                        $this->session->unset_userdata('sPage');
                        $this->session->unset_userdata('sLike');
                        $this->session->unset_userdata('sKelas');
                        $x['index_menu'] = 2;
                        $x['ruangID'] = $this->session->userdata('kdlokasi');
                        $x['idx'] = $_GET['idx'];
                        $y['ruangID'] = $this->session->userdata('kdlokasi');
                        $y['idx'] = $_GET['idx'];
                        $y['mod'] = 'tindakan';

                        $z = setNav("nav_2");

                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                        $y['header'] = $this->load->view('template/header', '', true);
                        $y['contentTitle'] = "Entry Nota Tagihan Layanan";
                        $y['detail'] = $this->nota_model->getPendaftaran($x['idx']);
                        //print_r($y["detail"]); exit;ha
                        $this->db->where('idx', $_GET['idx']);
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
                            $y['idx'] = $_GET['idx'];
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
                        $y['modul']   = $this->load->view('nota_tagihan/template_notatagihan', $y, true);
                        $x['content'] = $this->load->view('nota_tagihan/template_entry', $y, true);
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

    function diagnosa()
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
                        $y['mod'] = 'diagnosa';
                        $z = setNav("nav_2");

                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                        $y['header'] = $this->load->view('template/header', '', true);
                        $y['contentTitle'] = "Entry Nota Tagihan Layanan";

                        $y['detail'] = $this->nota_model->getPendaftaran($x['idx']);
                        $y['diagnosa']  = $this->nota_model->getDiagnosa($x["idx"]);
                        $y["pulang"] = 0;
                        if (!empty($y["detail"])) {
                            if ($y["detail"]->jns_layanan == "RI") {
                                $y["getDokter"] = $this->nota_model->getDokter();
                            } else {
                                $y["getDokter"] = $this->nota_model->getDokter($x['idx']);
                            }
                            $pulang = $this->nota_model->getPulang($y["detail"]->reg_unit);
                            if (!empty($pulang)) $y["pulang"] = 1;
                        }
                        // List Ruang Penunjang
                        $this->db->where('grid', '3');
                        $y['getRuang'] = $this->db->get('tbl01_ruang');

                        $this->db->where('grid', '1');
                        $this->db->where_not_in('idx', $this->session->userdata('kdlokasi'));
                        $y['getRuangRujukan'] = $this->db->get('tbl01_ruang');

                        $idlevel = $this->session->userdata('level');
                        $idmodul = MODUL_ID;
                        if ($y["detail"]->jns_layanan == "RJ") $kodemenu = 45;
                        elseif ($y["detail"]->jns_layanan == "RI") $kodemenu = 46;
                        elseif ($y["detail"]->jns_layanan == "PJ") $kodemenu = 47;
                        elseif ($y["detail"]->jns_layanan == "GD") $kodemenu = 48;
                        else $kodemenu = "";
                        $y["hakakses"] = $this->nota_model->getAkses($idlevel, $idmodul, $kodemenu);

                        $y['modul']   = $this->load->view('nota_tagihan/template_diagnosa', $y, true);
                        $x['content'] = $this->load->view('nota_tagihan/template_entry', $y, true);
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

    function rujukanjkn()
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

                        $x['ruangID'] = $this->input->get('kLok');
                        $x['idx'] = $this->input->get('idx');
                        $y['ruangID'] = $this->session->userdata('kdlokasi');
                        $y['idx'] = $_GET['idx'];
                        $y['mod'] = 'rujukanjkn';
                        $z = setNav("nav_2");

                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                        $y['header'] = $this->load->view('template/header', '', true);
                        $y['contentTitle'] = "Entry Nota Tagihan Layanan";

                        $y['detail'] = $this->nota_model->getPendaftaran($x['idx']);
                        $y['diagnosa']  = $this->nota_model->getDiagnosa($x["idx"]);
                        $y["pulang"] = 0;
                        if (!empty($y["detail"])) {
                            if ($y["detail"]->jns_layanan == "RI") {
                                $y["getDokter"] = $this->nota_model->getDokter();
                            } else {
                                $y["getDokter"] = $this->nota_model->getDokter($x['idx']);
                            }
                            $pulang = $this->nota_model->getPulang($y["detail"]->reg_unit);
                            if (!empty($pulang)) $y["pulang"] = 1;
                        }
                        // List Ruang Penunjang
                        $this->db->where('grid', '3');
                        $y['getRuang'] = $this->db->get('tbl01_ruang');

                        $this->db->where('grid', '1');
                        $this->db->where_not_in('idx', $this->session->userdata('kdlokasi'));
                        $y['getRuangRujukan'] = $this->db->get('tbl01_ruang');

                        $y['modul']   = $this->load->view('nota_tagihan/template_diagnosa', $y, true);
                        $x['content'] = $this->load->view('nota_tagihan/template_entry', $y, true);
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

    function diagnosa_akhir()
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

                        $x['ruangID'] = $this->input->get('kLok');
                        $x['idx'] = $this->input->get('idx');
                        $y['ruangID'] = $this->session->userdata('kdlokasi');
                        $y['idx'] = $_GET['idx'];
                        $y['mod'] = 'diagnosa-akhir';
                        $z = setNav("nav_2");

                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                        $y['header'] = $this->load->view('template/header', '', true);
                        $y['contentTitle'] = "Entry Nota Tagihan Layanan";

                        $y['detail'] = $this->nota_model->getPendaftaran($x['idx']);
                        $y["pulang"] = 0;
                        $y["diagnosa_akhir"] = array('idx' => 0);
                        if (!empty($y["detail"])) {
                            if ($y["detail"]->jns_layanan == "RI") {
                                $y["getDokter"] = $this->nota_model->getDokter();
                            } else {
                                $y["getDokter"] = $this->nota_model->getDokter($x['idx']);
                            }
                            $pulang = $this->nota_model->getPulang($y["detail"]->reg_unit);
                            if (!empty($pulang)) $y["pulang"] = 1;
                            //$y["diagnosa_akhir"] = $this->nota_model->getDiagnosaAkhir($y["detail"]->id_daftar, $y["detail"]->reg_unit);
                        }
                        // List Ruang Penunjang
                        $this->db->where('grid', '3');
                        $y['getRuang'] = $this->db->get('tbl01_ruang');

                        $this->db->where('grid', '1');
                        $this->db->where_not_in('idx', $this->session->userdata('kdlokasi'));
                        $y['getRuangRujukan'] = $this->db->get('tbl01_ruang');
                        $idlevel = $this->session->userdata('level');
                        $idmodul = MODUL_ID;
                        if ($y["detail"]->jns_layanan == "RJ") $kodemenu = 45;
                        elseif ($y["detail"]->jns_layanan == "RI") $kodemenu = 46;
                        elseif ($y["detail"]->jns_layanan == "PJ") $kodemenu = 47;
                        elseif ($y["detail"]->jns_layanan == "GD") $kodemenu = 48;
                        else $kodemenu = "";
                        $y["hakakses"] = $this->nota_model->getAkses($idlevel, $idmodul, $kodemenu);
                        $y['modul']   = $this->load->view('nota_tagihan/template_diagnosa_akhir', $y, true);
                        $x['content'] = $this->load->view('nota_tagihan/template_entry', $y, true);
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

    function simpan_diagnosa()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $kasus_baru = $this->input->post('kasus_baru');
            if ($kasus_baru <> 1) $kasus_baru = 0;
            $kunjungan_baru = $this->input->post('kunjungan_baru');
            if ($kunjungan_baru <> 1) $kunjungan_baru = 0;
            $data = array(
                'idx'               => $this->input->post('idx'),
                'idx_pendaftaran'   => $this->input->post('idx_pendaftaran'),
                'kasus_baru'        => $kasus_baru,
                'kunjungan_baru'    => $kunjungan_baru,
                'diagnosa'          => $this->input->post('diagnosa'),
                'tekanan_darah'     => $this->input->post('tekanan_darah'),
                'golongan_darah'    => $this->input->post('golongan_darah'),
                'berat_badan'       => $this->input->post('berat_badan'),
                'tinggi_badan'      => $this->input->post('tinggi_badan'),
                'terapi'            => $this->input->post('terapi'),
            );
            $res = $this->nota_model->setDiagnosa($data);
            if (!empty($res)) {
                if ($this->input->post('idx') == $res) {
                    $response = array('status' => true, 'message' => "Sukses Update Data");
                } else {
                    $response = array('status' => true, 'message' => "Sukses Insert  Data");
                }
            } else {
                $response = array('status' => false, 'message' => "Gagal Insert / Update Data");
            }
        } else {
            $response = array('status' => false, 'message' => "Session Expired");
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function resep()
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

                        $x['ruangID'] = $this->input->get('kLok');
                        $x['idx'] = $this->input->get('idx');
                        $y['ruangID'] = $this->session->userdata('kdlokasi');
                        $y['idx'] = $_GET['idx'];
                        $y['mod'] = 'resep';
                        $z = setNav("nav_2");

                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                        $y['header'] = $this->load->view('template/header', '', true);
                        $y['contentTitle'] = "Entry Nota Tagihan Layanan";

                        $y['detail'] = $this->nota_model->getPendaftaran($x['idx']);
                        $y['diagnosa']  = $this->nota_model->getDiagnosa($x["idx"]);
                        $y["pulang"] = 0;
                        if (!empty($y["detail"])) {
                            if ($y["detail"]->jns_layanan == "RI") {
                                $y["getDokter"] = $this->nota_model->getDokter();
                            } else {
                                $y["getDokter"] = $this->nota_model->getDokter($x['idx']);
                            }
                            $pulang = $this->nota_model->getPulang($y["detail"]->reg_unit);
                            if (!empty($pulang)) $y["pulang"] = 1;
                        }
                        // List Ruang Penunjang
                        $this->db->where('grid', '3');
                        $y['getRuang'] = $this->db->get('tbl01_ruang');

                        $this->db->where('grid', '1');
                        $this->db->where_not_in('idx', $this->session->userdata('kdlokasi'));
                        $y['getRuangRujukan'] = $this->db->get('tbl01_ruang');

                        $this->db->where('KDGRLOKASI', 1);
                        $this->db->where('eresep', 1);
                        $y["getLokasi"] = $this->db->get('tbl04_lokasi');
                        if ($y["detail"]->jns_layanan == "RJ") $kodemenu = 45;
                        elseif ($y["detail"]->jns_layanan == "RI") $kodemenu = 46;
                        elseif ($y["detail"]->jns_layanan == "PJ") $kodemenu = 47;
                        elseif ($y["detail"]->jns_layanan == "GD") $kodemenu = 48;
                        else $kodemenu = "";
                        $idlevel = $this->session->userdata('level');
                        $idmodul = MODUL_ID;
                        $x['lib']=array('js/eresep.js');
                        $y["hakakses"] = $this->nota_model->getAkses($idlevel, $idmodul, $kodemenu);
                        //$y['depo'] = $this->nota_model->getDepo();
                        $y['modul']   = $this->load->view('nota_tagihan/template_resep', $y, true);
                        $x['content'] = $this->load->view('nota_tagihan/template_entry', $y, true);
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
                        $y['mod'] = 'pasien-pulang';
                        $z = setNav("nav_2");

                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                        $y['header'] = $this->load->view('template/header', '', true);
                        $y['contentTitle'] = "Entry Nota Tagihan Layanan";

                        $y['detail'] = $this->nota_model->getPendaftaran($x['idx']);
                        $y['diagnosa']  = $this->nota_model->getDiagnosa($x["idx"]);
                        $y["pulang"]    = 0;
                        $y["datapulang"] = array();
                        $y["surat_kontrol"] = array();
                        /**
                         * Ruang Penunjang
                         */
                        $this->db->where('grid', '3');
                        $y['getRuang'] = $this->db->get('tbl01_ruang');

                        /**
                         * Ruang Poliklinik
                         */
                        $this->db->where('grid', '1');
                        $this->db->where_not_in('idx', $this->session->userdata('kdlokasi'));
                        $y['getRuangRujukan']   = $this->db->get('tbl01_ruang');
                        $y['ranap'] = 0;
                        if (!empty($y["detail"])) {
                            $nomr = $y["detail"]->nomr;
                            if ($y["detail"]->jns_layanan == "RI") {
                                $y["getDokter"] = $this->nota_model->getDokter();
                                $pulang = $this->nota_model->getPulang($y["detail"]->reg_unit);
                                //print_r($pulang);exit;
                                if (!empty($pulang)) {
                                    $y["pulang"] = 1;
                                    $y["datapulang"] = $pulang;
                                    if ($pulang->id_keadaan_keluar == 1) {
                                        $surat = array(
                                            'detail' => $y["detail"],
                                            'dokter' => $y["getDokter"],
                                            'judul' => "Surat Keterangan",
                                            'ruang' => $y["getRuangRujukan"],
                                            'pulang' => $y["datapulang"],
                                            'surat' => $this->nota_model->getSuratKontrol($y["detail"]->reg_unit)
                                        );
                                        $y["priv_surat"] = $this->load->view('nota_tagihan/template_surat_kontrol', $surat, true);
                                    } elseif ($pulang->id_keadaan_keluar == 4) {
                                        $surat = array(
                                            'detail' => $y["detail"],
                                            'dokter' => $y["getDokter"],
                                            'judul' => "Surat Keterangan",
                                            'ruang' => $y["getRuangRujukan"],
                                            'pulang' => $y["datapulang"],
                                            'surat' => $this->nota_model->getSuratRujukan($y["detail"]->reg_unit)
                                        );
                                        $y["priv_surat"] = $this->load->view('nota_tagihan/template_surat_rujukan', $surat, true);
                                    }
                                }
                            } else {
                                $ranap = $this->nota_model->cekRanap($y["detail"]->id_daftar,'RI');
                                $y["getDokter"] = $this->nota_model->getDokter($this->session->userdata('kdlokasi'));
                                if(empty($ranap)){
                                    //Pasien tidak di rawat inap
                                    $pulang = $this->nota_model->getPulang($y["detail"]->id_daftar);
                                    if (!empty($pulang)) {
                                        $y["pulang"] = 1;
                                        $y["datapulang"] = $pulang;
                                        if ($pulang->id_keadaan_keluar == 1) {
                                            $surat = array(
                                                'detail' => $y["detail"],
                                                'dokter' => $y["getDokter"],
                                                'judul' => "Surat Keterangan",
                                                'ruang' => $y["getRuangRujukan"],
                                                'pulang' => $y["datapulang"],
                                                'surat' => $this->nota_model->getSuratKontrol($y["detail"]->reg_unit)
                                            );
                                            $y["priv_surat"] = $this->load->view('nota_tagihan/template_surat_kontrol', $surat, true);
                                        } elseif ($pulang->id_keadaan_keluar == 4) {
                                            $surat = array(
                                                'detail' => $y["detail"],
                                                'dokter' => $y["getDokter"],
                                                'judul' => "Surat Keterangan",
                                                'ruang' => $y["getRuangRujukan"],
                                                'pulang' => $y["datapulang"],
                                                'surat' => $this->nota_model->getSuratRujukan($y["detail"]->reg_unit)
                                            );
                                            $y["priv_surat"] = $this->load->view('nota_tagihan/template_surat_rujukan', $surat, true);
                                        }
                                    }
                                    
                                }else{
                                    $pulang=array();
                                    $y['ranap']=1;
                                }
                            }
                            
                        } else {
                            $pulang = array();
                            $nomr = "";
                        }
                        // List Ruang Penunjang



                        $y['getCaraBayar']      = $this->db->get('tbl01_cara_bayar');
                        $y['getJenisPelayanan'] = $this->db->get('tbl01_jenis_pelayanan');
                        $y['getCaraKeluar']     = $this->db->get('tbl01_cara_keluar');
                        $y['getKeadaanKeluar']  = $this->db->get('tbl01_keadaan_keluar');
                        $y['tgl_daftar']        = $this->nota_model->getTgldaftar($nomr);

                        $y['pasien_pulang']     = $pulang;
                        $idlevel = $this->session->userdata('level');
                        $idmodul = MODUL_ID;
                        if ($y["detail"]->jns_layanan == "RJ") $kodemenu = 45;
                        elseif ($y["detail"]->jns_layanan == "RI") $kodemenu = 46;
                        elseif ($y["detail"]->jns_layanan == "PJ") $kodemenu = 47;
                        elseif ($y["detail"]->jns_layanan == "GD") $kodemenu = 48;
                        else $kodemenu = "";
                        $y['pindah']    = $this->nota_model->getPindah($y["detail"]->reg_unit, $x['ruangID']);
                        $y["hakakses"]  = $this->nota_model->getAkses($idlevel, $idmodul, $kodemenu);
                        $y['modul']     = $this->load->view('nota_tagihan/template_pulang', $y, true);
                        $x['content']   = $this->load->view('nota_tagihan/template_entry', $y, true);
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

                        $x['ruangID'] = $this->input->get('kLok');
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
                            $pulang = $this->nota_model->getPulang($y["detail"]->id_daftar);
                            // print_r($pulang); exit;
                            $pindah = $this->nota_model->getPindah($y["detail"]->reg_unit, $x['ruangID']);
                            if (!empty($pulang)) $y["pulang"] = 1;
                            if(!empty($y["detail"]->reg_unitibu) && $y['detail']->rawatgabung==1){
                                //Pasien Merupakan Bayi Rawat Gabung
                                $y['regibu']=$this->nota_model->getDatapendaftaran(array('reg_unit'=> $y["detail"]->reg_unitibu));
                                $y['regnanak']=array();
                            }else{
                                $y['regibu']=array();
                                $y['reganak'] = $this->nota_model->getDatapendaftaran(array('reg_unitibu'=>$y['detail']->reg_unit),'result');
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
                        $x['content']           = $this->load->view('nota_tagihan/template_entry', $y, true);
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
    function datapindah($idx)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->select('a.*,b.idx as idx_response');
            $this->db->where('a.idx', $idx);
            $this->db->join('tbl02_pindah_ranap_response b','a.idx = b.id_pindah_ranap','LEFT');
            $row = $this->db->get('tbl02_pindah_ranap a')->row();
            if(empty($row)){
                $response = array('status' => false, 'message' => 'Data Tidak Ditemukan');
            }else{
                if(!empty($row->id_response)){
                    //Sudah Diresponse maka tidak bisa dibatalkan
                    $response = array('status' => false, 'message' => 'Permintaan Pindah Ruang tidak bisa dibatalkan karena pasien sudah terdaftar di ' .$row->nama_ruang ." Kamar " .$row->nama_kamar);
                }else{
                    //$this->db->where('')
                    $response = array('status' => true, 'message' => 'OK', 'data' => $row);
                }
            }
            
        } else {
            $response = array('status' => false, 'message' => 'Session Expired');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function batalpindah(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $batal=array(
                'id_pindah_ranap'=>$this->input->post('id_pindah_ranap'),
                'id_daftar' => $this->input->post('id_daftar'),
                'reg_unit' => $this->input->post('reg_unit'),
                'alasan' => $this->input->post('alasan')
            );
            $this->db->insert('tbl02_pindah_ranap_batal', $batal);
            $insert = $this->db->insert_id();
            if($insert) $response = array('status' => true, 'message' => 'Permintaan Pindah Ruang Berhasil Dibatalkan');
            else $response = array('status' => false, 'message' => 'Gagal Membatalkan permintaan pindah ruang');
        } else {
            $response = array('status' => false, 'message' => 'Session Expired');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function surat_rekomendasi_pindah_ruang($idx=""){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $row=$this->nota_model->getSuratRekomendasiPindah($idx);
            $data = array(
                'judul'=>'Surat Pindah Ruangan',
                'surat'=> $row
            );
            $this->load->view('nota_tagihan/template_suratpindah', $data);
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'nota_tagihan.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }
    function simpan_pulang()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['id_daftar']) &&
                    isset($_POST['reg_unit']) &&
                    isset($_POST['nomr']) &&
                    isset($_POST['nama_pasien']) &&
                    isset($_POST['jns_kelamin']) &&
                    isset($_POST['tgl_lahir']) &&
                    isset($_POST['umur']) &&
                    isset($_POST['id_ruang']) &&
                    isset($_POST['nama_ruang']) &&
                    isset($_POST['los']) &&
                    isset($_POST['id_kelas']) &&
                    isset($_POST['kelas_layanan']) &&
                    isset($_POST['tgl_masuk']) &&
                    isset($_POST['tgl_keluar']) &&
                    isset($_POST['id_cara_keluar']) &&
                    isset($_POST['cara_keluar']) &&
                    isset($_POST['dpjp']) &&
                    isset($_POST['nama_dpjp']) &&
                    isset($_POST['id_keadaan_keluar']) &&
                    isset($_POST['keadaan_keluar']) &&
                    isset($_POST['jns_layanan']) &&
                    isset($_POST['jns_kunjungan']) &&
                    isset($_POST['kasus_penyakit']) &&
                    isset($_POST['id_cara_bayar']) &&
                    isset($_POST['cara_bayar']) &&
                    isset($_POST['no_bpjs']) &&
                    isset($_POST['no_jaminan']) &&
                    isset($_POST['id_tindakan_pelayanan']) &&
                    isset($_POST['tindakan_pelayanan'])
                ) {
                    $params = array(
                        'id_daftar' => $this->input->post('id_daftar', TRUE),
                        'reg_unit' => $this->input->post('reg_unit', TRUE),
                        'nomr' => $this->input->post('nomr', TRUE),
                        'nama_pasien' => $this->input->post('nama_pasien', TRUE),
                        'jns_kelamin' => $this->input->post('jns_kelamin', TRUE),
                        'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
                        'umur' => $this->input->post('umur', TRUE),
                        'id_ruang' => $this->input->post('id_ruang', TRUE),
                        'nama_ruang' => $this->input->post('nama_ruang', TRUE),
                        'los' => $this->input->post('los', TRUE),
                        'id_kelas' => $this->input->post('id_kelas', TRUE),
                        'kelas_layanan' => $this->input->post('kelas_layanan', TRUE),
                        /*'tgl_masuk' => setDateEng($this->input->post('tgl_masuk',TRUE)),
                        'tgl_keluar' => setDateEng($this->input->post('tgl_keluar',TRUE)),*/
                        'tgl_masuk' => $this->input->post('tgl_masuk', TRUE),
                        'tgl_keluar' => $this->input->post('tgl_keluar', TRUE),
                        'id_cara_keluar' => $this->input->post('id_cara_keluar', TRUE),
                        'cara_keluar' => $this->input->post('cara_keluar', TRUE),
                        'dpjp' => $this->input->post('dpjp', TRUE),
                        'nama_dpjp' => $this->input->post('nama_dpjp', TRUE),
                        'id_keadaan_keluar' => $this->input->post('id_keadaan_keluar', TRUE),
                        'keadaan_keluar' => $this->input->post('keadaan_keluar', TRUE),
                        'jns_layanan' => $this->input->post('jns_layanan', TRUE),
                        'jns_kunjungan' => $this->input->post('jns_kunjungan', TRUE),
                        'kasus_penyakit' => $this->input->post('kasus_penyakit', TRUE),
                        'id_cara_bayar' => $this->input->post('id_cara_bayar', TRUE),
                        'cara_bayar' => $this->input->post('cara_bayar', TRUE),
                        'no_bpjs' => $this->input->post('no_bpjs', TRUE),
                        'no_jaminan' => $this->input->post('no_jaminan', TRUE),
                        'id_tindakan_pelayanan' => $this->input->post('id_tindakan_pelayanan', TRUE),
                        'tindakan_pelayanan' => $this->input->post('tindakan_pelayanan', TRUE),
                        'user_exec' => $this->session->userdata('get_uid')
                    );

                    if (
                        $params['id_daftar'] == "" ||
                        $params['reg_unit'] == "" ||
                        $params['nomr'] == "" ||
                        $params['id_ruang'] == "" ||
                        $params['tgl_masuk'] == "" ||
                        $params['tgl_keluar'] == "" ||
                        $params['id_cara_keluar'] == "" ||
                        $params['dpjp'] == "" ||
                        $params['id_keadaan_keluar'] == ""
                    ) {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Data masih ada yang kosong!";
                    } else {
                        $SqlLayananRI = "SELECT id_ruang,id_kamar FROM tbl02_pendaftaran 
                        WHERE id_daftar = '$_POST[id_daftar]' AND jns_layanan = 'RI' ORDER BY idx DESC";
                        $cekLayananRI = $this->db->query("$SqlLayananRI");
                        if ($cekLayananRI->num_rows() > 0) {
                            $resLayananRI = $cekLayananRI->row_array();
                            if ($params['id_ruang'] != $resLayananRI['id_ruang']) {
                                $response['code'] = 501;
                                $response['message'] = "Ops. Pasien tidak dapat dipulangkan. Pasien terdaftar di " . getRuangByID($resLayananRI['id_ruang']) . ".\nHanya " . getRuangByID($resLayananRI['id_ruang']) . " yang boleh memulangkan pasien.";
                            } else {
                                $kondisi = array('id_daftar' => $params['id_daftar']);
                                $status = array('status_pasien' => 5);
                                $this->nota_model->updatePendaftaran($status, $kondisi);
                                $cekCommand = $this->db->insert('tbl02_pasien_pulang', $params);
                                if ($cekCommand) {
                                    $this->nota_model->updatebed($resLayananRI["id_kamar"]);
                                    $response['code'] = 200;
                                    $response['message'] = "Data pasien keluar sukses disimpan.";
                                } else {
                                    $response['code'] = 402;
                                    $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                                }
                            }
                        } else {
                            $response['code'] = 200;
                            $response['message'] = "Data tidak terdaftar sebagai pasien rawat inap.";
                            //$cekCommand = $this->db->insert('tbl02_pasien_pulang', $params);
                            /*$kondisi = array('id_daftar'=> $params['id_daftar']);
                            $status = array('status_pasien' => 5);
                            $this->nota_model->updatePendaftaran($status, $kondisi);

                            if ($cekCommand) {
                                $response['code'] = 200;
                                $response['message'] = "Data pasien keluar sukses disimpan.";
                            } else {
                                $response['code'] = 403;
                                $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                            }*/
                        }
                    }
                } else {
                    $response['code'] = 404;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 405;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 406;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

    function buat_surat_kontrol()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $data = array(
                'nomor_surat_kontrol'   => $this->nota_model->buatSuratKontrol($this->input->post('id_ruang')),
                'id_daftar'             => $this->input->post("id_daftar"),
                'reg_unit'              => $this->input->post("reg_unit"),
                'nomr'                  => $this->input->post("nomr"),
                'nama_pasien'           => $this->input->post("nama_pasien"),
                'jns_kelamin'           => $this->input->post("jns_kelamin"),
                'tgl_lahir'             => $this->input->post("tgl_lahir"),
                'kodeicd'               => $this->input->post("kodeicd"),
                'diagnosa'              => $this->input->post("diagnosa"),
                'terapi'                => $this->input->post("terapi"),
                'tgl_rujukan'           => $this->input->post("tgl_rujukan"),
                'alasan_kontrol'        => $this->input->post("alasan_kontrol"),
                'rencana_tindaklanjut'  => $this->input->post("rencana_tindak_lanjut"),
                'id_ruang'              => $this->input->post("id_ruang"),
                'nama_ruang'              => $this->input->post("nama_ruang"),
                'iddokter'              => $this->input->post("iddokter"),
                'nama_dokter'              => $this->input->post("nama_dokter"),
                'tgl_kontrol'           => $this->input->post("tgl_kontrol"),
                'tgl_buat'              => date('Y-m-d')
            );
            $this->db->insert('tbl02_surat_kontrol_ulang', $data);
            $insert_id = $this->db->insert_id();
            if ($insert_id) {
                $response['code'] = 200;
                $response['message'] = "OK";
                $response['id'] = $insert_id;
            } else {
                $response['code'] = 201;
                $response['message'] = "Error Saat Penyimpanan Data";
            }
        } else {
            $response['code'] = 406;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

    function buat_surat_rujukan()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $data = array(
                'noSep' =>    $this->input->post('noSep'),
                'tglRujukan'    => $this->input->post('tglRujukan'),
                'jnsPelayanan'  => $this->input->post('jnsPelayanan'),
                'tipeRujukan'   => $this->input->post('tipeRujukan'),
                'diagnosaDokter' => $this->input->post('diagnosaDokter'),
                'poliRujukan'   => $this->input->post('poliRujukan'),
                'namaPoliRujukan' => $this->input->post('namaPoliRujukan'),
                'kodeppkDirujuk' => $this->input->post('kodeppkDirujuk'),
                'namappkDirujuk' => $this->input->post('namappkDirujuk'),
                'terapi'    => $this->input->post('terapi'),
                'tglRencanaKunjungan' => $this->input->post('tglRencanaKunjungan'),
                'id_daftar' => $this->input->post('id_daftar'),
                'reg_unit'  => $this->input->post('reg_unit'),
                'noMr'  => $this->input->post('noMr'),
                'nama'  => $this->input->post('nama'),
                'kelamin' => $this->input->post('kelamin'),
                'noKartu' => $this->input->post('noKartu'),
                'iddokter' => $this->input->post('iddokter'),
                'nama_dokter' => $this->input->post('nama_dokter'),
                'poliPerujuk' => $this->input->post('poliPerujuk'),
                'namaPoliPerujuk' => $this->input->post('namaPoliPerujuk'),
                'catatan' => $this->input->post('catatan')
            );
            $this->db->insert('tbl02_surat_rujukan', $data);
            $insert_id = $this->db->insert_id();
            if ($insert_id) {
                $response['code'] = 200;
                $response['message'] = "OK";
                $response['id'] = $insert_id;
            } else {
                $response['code'] = 201;
                $response['message'] = "Error Saat Penyimpanan Data";
            }
        } else {
            $response['code'] = 406;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
    function cetak_surat_kontrol()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $reg_unit = $this->input->get("reg_unit");

            $data = array(
                'surat' => $this->nota_model->getSuratKontrol($reg_unit),
                'judul'         => "Surat Keterangan",
                'reg_unit' => $reg_unit
            );
            $this->load->view('nota_tagihan/cetak_surat_kontrol', $data);
        }
    }
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

                        $y['modul']             = $this->load->view('nota_tagihan/template_operasi', $y, true);
                        $x['content']           = $this->load->view('nota_tagihan/template_entry', $y, true);
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
    function getTarif1()
    {

        if (isset($_GET['kelas_id'])) :
            $kelas_id = $this->input->get('kelas_id', true);
            $this->session->set_userdata('sKelas', $kelas_id);
        else :
            $kelas_id = ($this->session->userdata('sKelas')) ? $this->session->userdata('sKelas') : 0;
        endif;

        if (isset($_GET['page'])) :
            $offset = $this->input->get('page');
            $this->session->set_userdata('sPage', $offset);
        else :
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;
        $limit = $this->perPage;

        if ($kelas_id == 0) {
            $condition = "WHERE kelas_id= 0 ";
        } else {
            $condition = "WHERE (kelas_id = $kelas_id OR kelas_id=0) ";
        }

        if (isset($_GET['jns_layanan'])) {
            $jns_layanan = $this->input->get('jns_layanan');
            $this->session->set_userdata('jns_layanan', $jns_layanan);
        } else {
            $jns_layanan = "";
        }
        if (isset($_GET['id_ruang'])) {
            $id_ruang = $this->input->post('id_ruang');
            $this->session->set_userdata('id_ruang', $id_ruang);
        } else {
            $id_ruang = "";
        }

        if (!empty($jns_layanan)) $condition .= " AND jns_layanan='$jns_layanan' ";
        else {
            if ($this->session->userdata('jns_layanan')) {
                $jns_layanan = $this->session->userdata('jns_layanan');
                $condition .= " AND jns_layanan='$jns_layanan' ";
            }
        }
        if (!empty($id_ruang)) $condition .= " AND tbl01_tarif_ruang.idruang='$id_ruang' ";
        else {
            if ($this->session->userdata('id_ruang')) {
                $id_ruang = $this->session->userdata('id_ruang');
                $condition .= " AND idruang='$id_ruang' ";
            }
        }
        if (isset($_GET['sLike'])) {
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->get('sLike', true));
            $condition .= "AND (layanan LIKE '%$sLike%' OR kategori_tarif LIKE '%$sLike%')";
            $this->session->set_userdata('sLike', $sLike);
        } else {
            if ($this->session->userdata('sLike')) {
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (layanan LIKE '%$sLike%' OR kategori_tarif LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT * FROM tbl01_tarif_ruang JOIN tbl01_tarif_layanan ON tbl01_tarif_ruang.idtarif=tbl01_tarif_layanan.idx  $condition  ORDER BY layanan ASC ";

        //echo $SQL;exit; 

        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getTarif';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url() . 'nota_tagihan.php/nota_tagihan/getTarif';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);
        $x["query"] = $SQL;
        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('nota_tagihan/getDataTarif', $x);
    }
    function getTarif($start = 0)
    {
        $kelas_id   = $this->input->get('kelas_id');
        $jns_layanan = $this->input->get('jns_layanan');
        $id_ruang   = $this->input->get('id_ruang');
        $q          = $this->input->get('sLike');
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
    function getNota()
    {
        $reg_unit = $this->input->post('reg_unit', true);
        $SQL = "SELECT a.*,SUM(b.sub_total_tarif) AS sub_total
        FROM tbl03_nota a 
        LEFT JOIN tbl03_nota_detail b ON a.id_nota=b.id_nota
        WHERE a.reg_unit = '$reg_unit'
        GROUP BY a.id_nota ORDER BY a.idx DESC";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('nota_tagihan/getNota', $x);
    }
    function hasil_pemeriksaan()
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
                        $x['idx'] = $_GET['idx'];
                        $y['ruangID'] = $this->session->userdata('kdlokasi');
                        $y['idx'] = $_GET['idx'];
                        $y['mod'] = 'hasil_labor';

                        $z = setNav("nav_2");

                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
                        $x['index_menu'] = 2;
                        $y['header'] = $this->load->view('template/header', '', true);
                        $y['contentTitle'] = "Entry Nota Tagihan Layanan";
                        $y['detail'] = $this->nota_model->getPendaftaran($x['idx']);
                        $y['diagnosa']  = '';
                        if (!empty($y["detail"])) {
                            //$y["tindakan"]  = $this->nota_model->getTindakan($y["detail"]->reg_unit);
                            $y["jns_layanan"] = $y['detail']->jns_layanan;
                            $y["id_daftar"] = $y['detail']->id_daftar;
                            $y["idx_pendaftaran"] = $y['detail']->idx;
                            $permintaan = $this->nota_model->getPermintaanPenunjang($y['detail']->kode_permintaan);
                            //print_r($permintaan);exit;
                            if (!empty($permintaan)) $y['diagnosa'] = $permintaan->diagnosa;
                        } else {
                            $y["tindakan"]  = array();
                            $y["jns_layanan"] = "";
                            $y["id_daftar"] = "";
                            $y["idx_pendaftaran"] = "";
                        }

                        if ($y['jns_layanan'] == 'RI') {
                            $this->db->where_in('profId', array('1', '2'));
                        } else {
                            $this->db->where('idruang', $x['ruangID']);
                        }
                        $this->db->join('tbl01_pegawai', 'tbl01_pegawai.NRP=tbl01_dokter.NRP');
                        $y['getDokter'] = $this->db->get('tbl01_dokter');

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


                        // List Ruang Penunjang
                        $this->db->where('grid', '3');
                        $y['getRuang'] = $this->db->get('tbl01_ruang');

                        // List Ruang Konsul Internal
                        $this->db->where('grid', '1');
                        $this->db->where_not_in('idx', $this->session->userdata('kdlokasi'));
                        $y['getRuangRujukan'] = $this->db->get('tbl01_ruang');

                        /**
                         * Jenis Pemeriksaan
                         */
                        $y["jenispemeriksaan"] = $this->nota_model->getPermintaanJenisPemeriksaan($y["idx_pendaftaran"]);

                        $idlevel = $this->session->userdata('level');
                        $idmodul = MODUL_ID;
                        if ($y["detail"]->jns_layanan == "RJ") $kodemenu = 45;
                        elseif ($y["detail"]->jns_layanan == "RI") $kodemenu = 46;
                        elseif ($y["detail"]->jns_layanan == "PJ") $kodemenu = 47;
                        elseif ($y["detail"]->jns_layanan == "GD") $kodemenu = 48;
                        else $kodemenu = "";
                        $y["hakakses"] = $this->nota_model->getAkses($idlevel, $idmodul, $kodemenu);
                        $y['modul']   = $this->load->view('nota_tagihan/template_hasil_pemeriksaan', $y, true);
                        $x['content'] = $this->load->view('nota_tagihan/template_entry', $y, true);
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
    function histori()
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
                        $x['ruangID'] = $this->session->userdata('kdlokasi');
                        $x['idx'] = $_GET['idx'];
                        $y['ruangID'] = $this->session->userdata('kdlokasi');
                        $y['idx'] = $_GET['idx'];
                        $y['mod'] = 'histori';

                        $z = setNav("nav_2");

                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                        $y['header'] = $this->load->view('template/header', '', true);
                        $y['contentTitle'] = "Entry Nota Tagihan Layanan";
                        $y['detail'] = $this->nota_model->getPendaftaran($x['idx']);
                        if (!empty($y["detail"])) {
                            //$y["tindakan"]  = $this->nota_model->getTindakan($y["detail"]->reg_unit);
                            $y["jns_layanan"] = $y['detail']->jns_layanan;
                            $y["id_daftar"] = $y['detail']->id_daftar;
                        } else {
                            $y["tindakan"]  = array();
                            $y["jns_layanan"] = "";
                            $y["id_daftar"] = "";
                        }

                        if ($y['jns_layanan'] == 'RI') {
                            $this->db->where_in('profId', array('1', '2'));
                        } else {
                            $this->db->where('idruang', $x['ruangID']);
                        }
                        $this->db->join('tbl01_pegawai', 'tbl01_pegawai.NRP=tbl01_dokter.NRP');
                        $y['getDokter'] = $this->db->get('tbl01_dokter');

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


                        // List Ruang Penunjang
                        $this->db->where('grid', '3');
                        $y['getRuang'] = $this->db->get('tbl01_ruang');

                        // List Ruang Konsul Internal
                        $this->db->where('grid', '1');
                        $this->db->where_not_in('idx', $this->session->userdata('kdlokasi'));
                        $y['getRuangRujukan'] = $this->db->get('tbl01_ruang');

                        //List Data Jenis Tindakan
                        $y["jenispemeriksaan"] = $this->nota_model->getJenisPemeriksaan($this->session->userdata('kdlokasi'));

                        $idlevel = $this->session->userdata('level');
                        $idmodul = MODUL_ID;
                        if ($y["detail"]->jns_layanan == "RJ") $kodemenu = 45;
                        elseif ($y["detail"]->jns_layanan == "RI") $kodemenu = 46;
                        elseif ($y["detail"]->jns_layanan == "PJ") $kodemenu = 47;
                        elseif ($y["detail"]->jns_layanan == "GD") $kodemenu = 48;
                        else $kodemenu = "";
                        if (!empty($y["detail"])) {
                            $carabayar = $this->nota_model->getCaraBayar($y["detail"]->id_cara_bayar);
                            $y["jkn"] = $carabayar->jkn;
                        } else $y["jkn"] = 0;
                        $y["hakakses"] = $this->nota_model->getAkses($idlevel, $idmodul, $kodemenu);

                        $y['modul']   = $this->load->view('nota_tagihan/template_histori', $y, true);
                        $x['content'] = $this->load->view('nota_tagihan/template_entry', $y, true);
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
    function cetakhasilpemeriksaan($idjenis, $reg_unit)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->where('idjenispemeriksaan', $idjenis);
            $this->db->where('reg_unit', $reg_unit);
            $hasil = $this->db->get('tbl03_hasil_pemeriksaan_penunjang')->result();
            //print_r($hasil); exit;
            if (!empty($hasil)) {
                $this->db->where('nomr', $hasil[0]->nomr);
                $pasien = $this->db->get('tbl01_pasien')->row();
                $this->db->where('reg_unit', $reg_unit);
                $reg = $this->db->get('tbl02_pendaftaran')->row();

                $this->db->where('idx', $idjenis);
                $jenis = $this->db->get('tbl01_jenis_pemeriksaan')->row();
            } else {
                $pasien = array();
                $reg = array();
                $jenis = array();
            }
            $data = array('hasil' => $hasil, 'pasien' => $pasien, 'reg' => $reg, 'jenis' => $jenis);
            $this->load->view('nota_tagihan/cetak_hasil_pemeriksaan', $data);
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'nota_tagihan.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }
    function getNotaItem()
    {
        $reg_unit = $this->input->post('reg_unit', true);

        $SQL = "SELECT * FROM tbl03_nota_detail a 
        WHERE reg_unit = '$reg_unit'
        ORDER BY a.idx DESC";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('nota_tagihan/getNotaDetail', $x);
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
                        if ($cekCommand) {
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

    function hapusItem()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['idx'])
                ) {
                    $idx = $this->input->post('idx', true);
                    if ($idx == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Post data kosong! Silahkan coba kembali.";
                    } else {
                        $this->db->where('idx', $idx);
                        $cekCommand = $this->db->delete('tbl03_nota_detail');
                        if ($cekCommand) {
                            $response['code'] = 200;
                            $response['message'] = "Delete data sukses.";
                        } else {
                            $response['code'] = 402;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                } else {
                    $response['code'] = 403;
                    $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 404;
                $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 405;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

    function simpanPermintaanPenunjang()
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
                    isset($_POST['id_penunjang']) &&
                    isset($_POST['nama_penunjang']) &&
                    isset($_POST['dokter_pengirim']) &&
                    isset($_POST['nama_dokter_pengirim']) &&
                    isset($_POST['keterangan']) &&
                    isset($_POST['diagnosa']) &&
                    isset($_POST['alasanpemeriksaan']) &&
                    isset($_POST['bulanke']) &&
                    isset($_POST['template'])
                ) {
                    $diagnosa = $this->input->post('diagnosa');
                    $template = $this->input->post('template');
                    if ($template == "Patologi") {
                        $asal_jaringan = $this->input->post('asal_jaringan');
                        $bahan_fiksasi = $this->input->post('bahan_fiksasi');
                        $haid_terakhir = $this->input->post('haid_terakhir');
                        $lokasi_jaringan = $this->input->post('lokasi_jaringan');
                    } else {
                        $asal_jaringan = "";
                        $bahan_fiksasi = "";
                        $haid_terakhir = "";
                        $lokasi_jaringan = "";
                    }
                    $params = array(
                        'id_daftar'         => $this->input->post('id_daftar', TRUE),
                        'reg_unit'          => $this->input->post('reg_unit', TRUE),
                        'nomr'              => $this->input->post('nomr', TRUE),
                        'nama_pasien'       => $this->input->post('nama_pasien', TRUE),
                        'ruang_pengirim'    => $this->input->post('ruang_pengirim', TRUE),
                        'nama_ruang_pengirim' => $this->input->post('nama_ruang_pengirim', TRUE),
                        'id_penunjang'      => $this->input->post('id_penunjang', TRUE),
                        'nama_penunjang'    => $this->input->post('nama_penunjang', TRUE),
                        'dokter_pengirim'   => $this->input->post('dokter_pengirim', TRUE),
                        'nama_dokter_pengirim' => $this->input->post('nama_dokter_pengirim', TRUE),
                        'keterangan'        => $this->input->post('keterangan', TRUE),
                        'alasanpemeriksaan' => $this->input->post('alasanpemeriksaan', TRUE),
                        'diagnosa'          => $this->input->post('diagnosa', TRUE),
                        'bulanke'           => $this->input->post('bulanke', TRUE),
                        'asal_jaringan'     => $this->input->post('asal_jaringan'),
                        'bahan_fiksasi'     => $this->input->post('bahan_fiksasi'),
                        'haid_terakhir'     => $this->input->post('haid_terakhir'),
                        'lokasi_jaringan'   => $this->input->post('lokasi_jaringan'),
                        'user_exec'         => $this->session->userdata('get_uid')
                    );

                    /**
                     * Load Data Temp Permintaan dari tabel tbl02_temp_permintaan_tindakan_penunjang
                     */

                    $id_daftar = $this->input->post('id_daftar');
                    $reg_unit = $this->input->post('reg_unit');
                    $tmp = $this->nota_model->getTemp($id_daftar, $reg_unit);

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
                    } elseif ($params['id_penunjang'] == "") {
                        $response['code'] = 405;
                        $response['message'] = "Ops. Tujuan penunjang belum di pilih! Silahkan coba kembali.";
                    } elseif ($params['dokter_pengirim'] == "") {
                        $response['code'] = 406;
                        $response['message'] = "Ops. Dokter pengirim belum dipilih! Silahkan coba kembali.";
                    } elseif ($params['diagnosa'] == "") {
                        $response['code'] = 407;
                        $response['message'] = "Ops. Keterangan tidak boleh kosong! Silahkan coba kembali.";
                    } elseif ($params['keterangan'] == "") {
                        $response['code'] = 407;
                        $response['message'] = "Ops. Keterangan tidak boleh kosong! Silahkan coba kembali.";
                    } elseif (empty($tmp)) {
                        $response['code'] = 408;
                        $response['message'] = "Ops. Permintaan Tindakan belum dipilih! Silahkan coba kembali.";
                    } else {
                        $cekCommand = $this->db->insert('tbl02_permintaan_penunjang', $params);
                        $idpermintaan = $this->db->insert_id();


                        if ($cekCommand) {
                            /*$exp_layanan=explode(',', $layanan);
                            if(!empty($exp_layanan)){
                                $this->db->where_in('idx',$exp_layanan);
                                $td=$this->db->get('tbl01_tarif_layanan')->result();
                                foreach ($td as $t) {
                                    $data_tindakan[]=array(
                                        'date_created'   => date('Y-m-d H:i:s'),
                                        'id_permintaan' => $idpermintaan,
                                        'id_tarif'      => $t->idx,
                                        'layanan'       => $t->layanan,
                                        'jadwal_tindakan'       => $this->input->post('jadwal_tindakan'),
                                        'user_exec'     => $this->session->userdata('get_uid')
                                    );
                                }
                                if(!empty($data_tindakan)){
                                    $this->db->insert_batch('tbl02_permintaan_tindakan_penunjang', $data_tindakan);
                                }
                                $this->db->where('user_exec',$this->session->userdata('get_uid'));
                                $this->db->delete('tbl02_temp_permintaan_tindakan_penunjang');
                            }*/

                            foreach ($tmp as $t) {
                                $temp[] = array(
                                    'id_permintaan'     => $idpermintaan,
                                    'idjenispemeriksaan' => $t->id_jenispemeriksaan,
                                    'jenispemeriksaan'  => $t->jenis_pemeriksaan,
                                    'idsubjenispemeriksaan' => $t->id_subjenispemeriksaan,
                                    'subjenispemeriksaan'  => $t->subjenispemeriksaan,
                                    'id_pemeriksaan'    => $t->id_pemeriksaan,
                                    'nama_pemeriksaan'  => $t->nama_pemeriksaan,
                                    'status_dilayani'   => 0,
                                    'user_exec'         => $this->session->userdata('get_uid')
                                );
                            }
                            if (!empty($temp)) $this->db->insert_batch('tbl02_permintaan_tindakan_penunjang', $temp);
                            $response['code'] = 200;
                            $response['message'] = "Simpan data sukses.";
                        } else {
                            $response['code'] = 408;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                } else {
                    $response['code'] = 409;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 410;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 411;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
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

    function cetak()
    {
        $reg_unit = @$_GET['kode'];
        $this->db->where('reg_unit', $reg_unit);
        $cekMain = $this->db->get('tbl03_nota_detail');
        if ($cekMain->num_rows() > 0) {
            $x['datDetail'] = $cekMain;
            $x['reg_unit'] = $reg_unit;
            $this->load->view('nota_tagihan/print', $x);
        } else {
            echo "<script>
                alert('Maaf! Tindakan masih kosong. Silahkan entry tindakan layanan');
                window.close();
            </script>";
        }
    }

    function tindakan($id_ruang = "")
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $q = urldecode($this->input->get('q', TRUE));
            $id_daftar = urldecode($this->input->get('id_daftar', TRUE));
            $reg_unit = urldecode($this->input->get('reg_unit', TRUE));
            $start = intval($this->input->get('start'));
            $pilihan = intval($this->input->get('pilihan'));
            $limit = 10;
            $row_count = $this->nota_model->countTindakan($id_ruang, $q, $pilihan, $id_daftar, $reg_unit);
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'start'     => $start,
                'row_count' => $row_count,
                'limit'     => $limit,
                'data'      => $this->nota_model->getTindakanlimit($id_ruang, $limit, $start, $q, $pilihan, $id_daftar, $reg_unit),
            );
        } else {
            $response = array('status' => false, 'message' => 'Opps... Session Expired', 'data' => array());
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function pemeriksaan_pilihan($reg_unit)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'data'      => $this->nota_model->getPemeriksaanPilihan($reg_unit),
            );
        } else {
            $response = array('status' => false, 'message' => 'Opps... Session Expired', 'data' => array());
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function setPermintaantindakan()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                //$this->db->where('idx', $this->input->post('idtarif',TRUE));
                //$layanan=$this->db->get('tbl01_tarif_layanan')->row()->layanan;
                $params = array(
                    'id_daftar' => $this->input->post('id_daftar', TRUE),
                    'reg_unit'  => $this->input->post('reg_unit', TRUE),
                    'id_jenispemeriksaan'  => $this->input->post('id_jenispemeriksaan', TRUE),
                    'jenis_pemeriksaan'   => $this->input->post('jenis_pemeriksaan', TRUE),
                    'id_subjenispemeriksaan'  => $this->input->post('id_subjenispemeriksaan', TRUE),
                    'subjenispemeriksaan'   => $this->input->post('subjenispemeriksaan', TRUE),
                    'id_pemeriksaan'      => $this->input->post('id_pemeriksaan'),
                    'nama_pemeriksaan'    => $this->input->post('nama_pemeriksaan'),
                    'user_exec' => $this->session->userdata('get_uid')
                );
                if (
                    isset($_POST['id_daftar']) &&
                    isset($_POST['reg_unit']) &&
                    isset($_POST['id_jenispemeriksaan']) &&
                    isset($_POST['jenis_pemeriksaan']) &&
                    isset($_POST['id_pemeriksaan']) &&
                    isset($_POST['nama_pemeriksaan'])
                ) {
                    if ($params['id_daftar'] == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. No. Registrasi RS tidak dikenali! Silahkan coba kembali.";
                    } elseif ($params['reg_unit'] == "") {
                        $response['code'] = 402;
                        $response['message'] = "Ops. No. Registrasi Unit tidak dikenali! Silahkan coba kembali.";
                    } elseif ($params['id_jenispemeriksaan'] == "") {
                        $response['code'] = 403;
                        $response['message'] = "Ops. Jenis Pemeriksaan tidak dikenali! Silahkan coba kembali.";
                    } else {


                        $cekCommand = $this->db->insert('tbl02_temp_permintaan_tindakan_penunjang', $params);
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

    function hapustemptindakan($idtemp = 0)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->where('user_exec', $this->session->userdata('get_uid'));
            if ($idtemp > 0) $this->db->where('idtemp', $idtemp);
            $this->db->delete('tbl02_temp_permintaan_tindakan_penunjang');
            $response = array('status' => true, 'message' => 'OK');
        } else {
            $response = array('status' => false, 'message' => 'Ops. Sesi anda telah berubah! Silahkan login kembali');
        }
        echo json_encode($response);
    }

    function kamar($id_ruang = "", $id_kelas = "", $idkamar = "")
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->select("a.id_kamar,a.nama_kamar,a.id_ruang,a.nama_ruang,a.jml_tt,
            IFNULL(b.terisi_lk,0) AS terisi_lk,IFNULL(b.terisi_pr,0) AS terisi_pr");
            $this->db->where('a.id_ruang', $id_ruang);
            $this->db->where('a.status_kamar', 1);
            $this->db->group_start();
            $this->db->where('a.kelas_id', $id_kelas);
            $this->db->or_where('a.kelas_id', '0');
            $this->db->group_end();
            if (!empty($idkamar)) $this->db->where_not_in('a.id_kamar', array($idkamar));
            $this->db->join('view_bedterisi b', 'a.`id_kamar`=b.`id_kamar`','LEFT');
            $data = $this->db->get('tbl01_kamar a')->result();
            $response = array('status' => true, 'message' => 'OK', 'data' => $data);
        } else {
            $response = array('status' => false, 'message' => 'Ops Session Expired', 'data' => array());
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function simpanPindahRanap()
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
                    isset($_POST['id_ruang']) &&
                    isset($_POST['nama_ruang']) &&
                    isset($_POST['id_kamar']) &&
                    isset($_POST['nama_kamar']) &&
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
                        'kamar_pengirim' => $this->input->post('kamar_pengirim', TRUE),
                        'nama_kamar_pengirim' => $this->input->post('nama_kamar_pengirim', TRUE),
                        'id_kelas' => $this->input->post('id_kelas', TRUE),
                        'kelas_layanan' => $this->input->post('kelas_layanan', TRUE),
                        'id_ruang' => $this->input->post('id_ruang', TRUE),
                        'nama_ruang' => $this->input->post('nama_ruang', TRUE),
                        'id_kamar' => $this->input->post('id_kamar', TRUE),
                        'nama_kamar' => $this->input->post('nama_kamar', TRUE),
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
                    } elseif ($params['id_ruang'] == "") {
                        $response['code'] = 405;
                        $response['message'] = "Ops. Ruang tujuan belum di pilih! Silahkan coba kembali.";
                    } elseif ($params['dokter_pengirim'] == "") {
                        $response['code'] = 406;
                        $response['message'] = "Ops. Dokter pengirim belum dipilih! Silahkan coba kembali.";
                    } elseif ($params['keterangan'] == "") {
                        $response['code'] = 407;
                        $response['message'] = "Ops. Keterangan tidak boleh kosong! Silahkan coba kembali.";
                    } else {
                        $ruang_pengirim = $this->input->post('ruang_pengirim');
                        $ruang_penerima = $this->input->post('id_ruang');
                        if ($ruang_pengirim == $ruang_penerima) {
                            /*
                            Jika Pasien pindah kamar di ruangan yang sama, maka pasien tidak diregistrasikan ulang sebagai pasien baru pasien hanya di update ruangan saja
                            */
                            $id_daftar = $this->input->post('id_daftar', TRUE);
                            $reg_unit = $this->input->post('reg_unit', TRUE);
                            $kamar = array(
                                'id_kelas'      => $this->input->post('id_kelas'),
                                'kelas_layanan' => $this->input->post('kelas_layanan'),
                                'id_kamar'      => $this->input->post('id_kamar', TRUE),
                                'nama_kamar'    => $this->input->post('nama_kamar', TRUE),
                                'rawatgabung'   => 0
                            );
                            $this->nota_model->updateKunjungan($kamar, $id_daftar, $reg_unit);
                            
                            
                            $cekCommand = $this->db->insert('tbl02_pindah_ranap', $params);
                            $no_permintaan = $this->db->insert_id();
                            $paramsResponse = array(
                                'id_pindah_ranap' => $no_permintaan,
                                'id_daftar' => $this->input->post('id_daftar', true),
                                'reg_unit' => $this->input->post('reg_unit', true),
                                'user_id' => $this->session->userdata('get_uid')
                            );
                            $cekCmdPenunjang = $this->db->insert('tbl02_pindah_ranap_response', $paramsResponse);

                            //Cek apakah pasien memiliki anak yang dirawat gabung
                            $cekanak = $this->nota_model->getDatapendaftaran(array('reg_unitibu' => $reg_unit),'result');
                            //print_r($cekanak); exit;
                            if($cekanak){
                                //Pindahkan juga anak
                                foreach ($cekanak as $a ) {
                                    //print_r($a);
                                    //echo "<br>";
                                    $kamaranak[] = array(
                                        'idx'=>$a->idx,
                                        'id_kelas'      => $this->input->post('id_kelas'),
                                        'kelas_layanan' => $this->input->post('kelas_layanan'),
                                        'id_kamar'      => $this->input->post('id_kamar', TRUE),
                                        'nama_kamar'    => $this->input->post('nama_kamar', TRUE)
                                    );
                                }
                                //echo json_encode($kamaranak);
                                //exit;
                                $this->db->update_batch('tbl02_pendaftaran', $kamaranak, 'idx');
                            }
                            
                            //
                            if ($cekCommand) {
                                $response['code'] = 200;
                                $response['message'] = "Simpan data sukses.";
                            } else {
                                $response['code'] = 408;
                                $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                            }
                        } else {
                            //Insert Pindah Ranap
                            $cekCommand = $this->db->insert('tbl02_pindah_ranap', $params);
                            //$cekCommand=true;
                            /*$reg_unit = array('reg_unit'=> trim($this->input->post('reg_unit', TRUE)));
                            $status = array('status_pasien' => 3);
                            $this->nota_model->updatePendaftaran($status, $reg_unit);*/

                            //Cek apakah pasien mempunyai anak yang dirawat gabung jika ada maka pindahkan juga anaknya
                            $reg_unit = $this->input->post('reg_unit', TRUE);
                            $cekanak = $this->nota_model->getDatapendaftaran(array('reg_unitibu' => $reg_unit),'result');
                            if($cekanak){
                                //Pindahkan juga anak
                                foreach ($cekanak as $a ) {
                                    $params_anak[] = array(
                                        'id_daftar' => $a->id_daftar,
                                        'reg_unit' => $a->reg_unit,
                                        'nomr' => $a->nomr,
                                        'nama_pasien' => $a->nama_pasien,
                                        'ruang_pengirim' => $this->input->post('ruang_pengirim', TRUE),
                                        'nama_ruang_pengirim' => $this->input->post('nama_ruang_pengirim', TRUE),
                                        'kamar_pengirim' => $this->input->post('kamar_pengirim', TRUE),
                                        'nama_kamar_pengirim' => $this->input->post('nama_kamar_pengirim', TRUE),
                                        'id_kelas' => $this->input->post('id_kelas', TRUE),
                                        'kelas_layanan' => $this->input->post('kelas_layanan', TRUE),
                                        'id_ruang' => $this->input->post('id_ruang', TRUE),
                                        'nama_ruang' => $this->input->post('nama_ruang', TRUE),
                                        'id_kamar' => $this->input->post('id_kamar', TRUE),
                                        'nama_kamar' => $this->input->post('nama_kamar', TRUE),
                                        'dokter_pengirim' => $this->input->post('dokter_pengirim', TRUE),
                                        'nama_dokter_pengirim' => $this->input->post('nama_dokter_pengirim', TRUE),
                                        'keterangan' => $this->input->post('keterangan', TRUE),
                                        'rawatgabung'=>1,
                                        'reg_unitibu'=>$reg_unit,
                                        'user_exec' => $this->session->userdata('get_uid')
                                    );
                                    /*$status_pasien[]=array(
                                        'reg_unit'=>$a->reg_unit,
                                        'status_pasien'=>3
                                    );*/
                                }
                                $this->db->insert_batch('tbl02_pindah_ranap', $params_anak);
                                //$this->db->update_batch('tbl02_pindah_ranap',$status_pasien,'reg_unit');
                            }
                            if ($cekCommand) {
                                $response['code'] = 200;
                                $response['message'] = "Simpan data sukses.";
                            } else {
                                $response['code'] = 408;
                                $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                            }
                        }
                    }
                } else {
                    $response['code'] = 409;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 410;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 411;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

    function finsihTransksi($reg_unit, $ada_resep = 1)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            
            //get Token
            $token=$this->session->userdata('token');

            $this->db->select('id_pendaftaranonline');
            $this->db->where('reg_unit', $reg_unit);
            $row=$this->db->get('tbl02_pendaftaran')->row();
            if(!empty($row)){
                $status = array(
                    'status_transaksi' => 1,
                    'ada_resep'      => $ada_resep
                );
                $this->db->where('reg_unit', $reg_unit);
                $this->db->update('tbl02_pendaftaran', $status);
                $this->nota_model->pushNotification($reg_unit);
                if(!empty($row->id_pendaftaranonline)){
                    $request=array(
                        'param'=>array(
                            'idx' => $row->id_pendaftaranonline,
                        ),
                        'data'=>array(
                            'status_berobat'=>'Selesai Berobat',
                        )
                    );
                    $res = $this->Smart_model->http_request($request,SMART_CALL_BACK ."sim/pendaftaran/update",$token);
                }
                
    
                $response['code'] = 200;
                $response['message'] = "Terima Kasih, Semua Transaksi Sudah Diinput";
            }else{
                $response['code'] = 201;
                $response['message'] = "Data Pendaftaran Tidak DItemukan";
            }
            
        } else {
            $response['code'] = 411;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    function unfinsihTransksi($reg_unit)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->where('kode_item', $reg_unit);
            $res = $this->db->get('tbl05_kwitansi_detail')->num_rows();
            if ($res > 0) {
                $response['code'] = 201;
                $response['message'] = "Maaf kwitansi sudah dicetak \nAnda tidak bisa lagi menambahkan tindakan";
            } else {
                $status = array(
                    'status_transaksi' => 0, 'ada_resep' => 1
                );
                $this->db->where('reg_unit', $reg_unit);
                $this->db->update('tbl02_pendaftaran', $status);
                $response['code'] = 200;
                $response['message'] = "Ok";
            }
        } else {
            $response['code'] = 411;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    function showjadwal($id_daftar)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $param = $this->input->get('param');
            $data = $this->nota_model->getJadwaloperasi($param, $id_daftar);
            $response = array('status' => true, 'message' => "Ok", 'data' => $data);
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    function getlayananoperasi($kelas_id, $anestesi = 0, $cito = 0)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $param = $this->input->get('param');
            $data = $this->nota_model->getlayananoperasi($kelas_id, $anestesi, $cito);
            $response = array('status' => true, 'message' => "Ok", 'data' => $data);
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    function getpoli($idpoli = "")
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $data = $this->nota_model->getPoli($idpoli);
            if (!empty($data)) $response = array('status' => true, 'message' => "Ok", 'data' => $data);
            else $response = array('status' => false, 'message' => "Poli Tidak ditemukan", 'data' => $data);
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    function editoperasi($idjadwal = "")
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $data = $this->nota_model->getJadwalbyId($idjadwal);
            if (!empty($data)) $response = array('status' => true, 'message' => "Ok", 'data' => $data);
            else $response = array('status' => false, 'message' => "Jadwal Tidak ditemukan", 'data' => $data);
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    function simpanjadwaloperasi()
    {
        $ses_state = $this->users_model->cek_session_id();
        $kodebooking = $this->nota_model->getBookingID();
        if ($ses_state) {
            $status_kirim = 0;
            $token="";
            $jkn_antrian=array();
            $res=array();
            /*$token = $this->nota_model->ws_token();
            $jkn_antrian = array(
                'nopeserta'     => $this->input->post('nopeserta'),
                'kodebooking'   => $kodebooking,
                'tanggaloperasi' => $this->input->post('tanggaloperasi'),
                'jenistindakan' => $this->input->post('jenistindakan'),
                'kodepoli'      => $this->input->post('kodepoli'),
                'namapoli'      => $this->input->post('namapoli'),
                'terlaksana'    => 0
            );
            $status_kirim=0;
            $res = $this->nota_model->ws_antrean($jkn_antrian, "rsud/set_no_antrean", $token);
            $arr_res = json_decode($res);
            if (!$arr_res) {
                //Jika Gagal koneksi ke ws_antrean, dimasukkan ke log antrean di beri flag di status kirim = 0
                $status_kirim = 0;
            } else {
                if ($arr_res->response == "Error") $status_kirim = 0;
                else $status_kirim = 1;
            }*/
            $antrean = array(
                'id_daftar'     => $this->input->post('id_daftar'),
                'reg_unit'      => $this->input->post('reg_unit'),
                'nomr'          => $this->input->post('nomr'),
                'nama_pasien'   => $this->input->post('nama_pasien'),
                'tempat_lahir'  => $this->input->post('tempat_lahir'),
                'tgl_lahir'     => $this->input->post('tgl_lahir'),
                'jns_kelamin'   => $this->input->post('jns_kelamin'),
                'nopeserta'     => $this->input->post('nopeserta'),
                'kodebooking'   => $kodebooking, //Otomatis
                'tanggaloperasi' => $this->input->post('tanggaloperasi'),
                'jamoperasi'    => $this->input->post('jamoperasi'),
                'idjenistindakan' => $this->input->post('idjenistindakan'),
                'jenistindakan' => $this->input->post('jenistindakan'), //Cari dari tabel jenis tindakan
                'idkelas'       => $this->input->post('idkelas'),
                'kelas_layanan' => $this->input->post('kelas_layanan'),
                'anestesi'      => $this->input->post('anestesi'),
                'idtarif'       => $this->input->post('idtarif'),
                'layanan'       => $this->input->post('layanan'),
                'diagnosa'      => $this->input->post('diagnosa'),
                'polipengirim'  => $this->input->post('polipengirim'),
                'namapolipengirim' => $this->input->post('namapolipengirim'),
                'id_dokter'  => $this->input->post('id_dokter'),
                'namadokter' => $this->input->post('namadokter'),
                'kodepoli'      => $this->input->post('kodepoli'),
                'namapoli'      => $this->input->post('namapoli'),
                'terlaksana'    => 0,
                'cito'          => $this->input->post('cito'),
                'status_kirim'  => $status_kirim
            );
            $idx = $this->input->post('idx');
            if (empty($idx)) $idx = $this->nota_model->insertJadwalOperasi($antrean);
            else $idx = $this->nota_model->updateJadwalOperasi($antrean, $idx);
            if (empty($idx)) $response = array('status' => false, 'message' => "Gagal Simpan Jadwal");
            else $response = array('status' => true, 'message' => "OK", 'token' => $token, 'antrian' => $jkn_antrian, 'res' => $res);
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    function laksanakan_operasi()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $idx = $this->input->post('idx');
            $jadwal = $this->nota_model->getJadwalbyId($idx);
            $terlaksana = array('terlaksana' => $this->input->post('terlaksana'));
            $this->nota_model->updateJadwal($terlaksana, $idx);
            $nota = array(
                'id_daftar' => $jadwal->id_daftar,
                'reg_unit' => $jadwal->reg_unit,
                'nomr' => $jadwal->nomr,
                'id_tarif' => $jadwal->idtarif,
                'layanan' => $jadwal->layanan,
                'jasa_sarana' => $jadwal->jasa_sarana,
                'jasa_pelayanan' => $jadwal->jasa_pelayanan,
                'tarif_layanan' => $jadwal->tarif_layanan,
                'kategori_id' => $jadwal->kategori_id,
                'kelas_id' => $jadwal->kategori_tarif,
                'jml' => 1,
                'sub_total_tarif' => $jadwal->tarif_layanan,
                'id_dokter' => $jadwal->id_dokter,
                'user_exec' => $this->session->userdata('get_uid')
            );
            $id = $this->nota_model->insertNota($nota);
            $response = array('status' => true, 'message' => "Tindakan Operasi Berhasil diinput");
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    function hasil_pemeriksaan_penunjang($reg_unit, $idjenis)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $hasil = $this->nota_model->getHasilPemeriksaan($reg_unit, $idjenis);

            $response = array('status' => false, 'message' => "OK", 'data' => $hasil);
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    function simpanhasilpemeriksaan()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $id_subpemeriksaan = $this->input->post("id_subpemeriksaan");
            $petugas = $this->input->post("petugaspemeriksa");

            foreach ($id_subpemeriksaan as $id) {
                $hasil = $this->input->post('hasil' . $id);
                if (empty($hasil)) $hasil = "-";
                $template = $this->input->post('template');
                $tingkatpositif = '-';
                $nanah_lendir = 0;
                $bercak_darah = 0;
                $air_liur = 0;
                $proyeksi = "";
                if ($template == "DahakTB") {
                    $tingkatpositif = $this->input->post('tingkat_positif' . $id);
                    if ($this->input->post('nanah_lendir' . $id) == 1) $nanah_lendir = 1;
                    if ($this->input->post('bercak_darah' . $id) == 1) $bercak_darah = 1;
                    if ($this->input->post('air_liur' . $id) == 1)     $air_liur = 1;
                } else if ($template = 'Radiologi') {
                    //$idsubjenispemeriksaan=
                    $proyeksi = $this->input->post('proyeksi');
                }
                $data[] = array(
                    'tanggal_periksa'   => $this->input->post('tgl_pemeriksaan'),
                    'id_daftar'         => $this->input->post('id_daftar'),
                    'reg_unit'          => $this->input->post('reg_unit'),
                    'nomr'              => $this->input->post('nomr'),
                    'nama_pasien'       => $this->input->post('nama_pasien'),
                    'umur'              => $this->input->post('umur'),
                    'idruangpengirim'   => $this->input->post('idruangpengirim'),
                    'ruangpengirim'     => $this->input->post('ruangpengirim'),
                    'diagnosa'          => $this->input->post('diagnosa'),
                    'idjenispemeriksaan' => $this->input->post('idjenis'),
                    'jenispemeriksaan'  => $this->input->post('jenispemeriksaan'),
                    'idsubjenispemeriksaan' => $this->input->post('idsubjenis'),
                    'subjenispemeriksaan'  => $this->input->post('subjenis'),
                    'idpemeriksaan'     => $this->input->post('id_pemeriksaan'),
                    'namapemeriksaan'   => $this->input->post('namapemeriksaan'),
                    'proyeksi'          => $this->input->post('proyeksi'),
                    'idsubpemeriksaan'  => $id,
                    'subpemeriksaan'    => $this->input->post('subpemeriksaan' . $id),
                    'hasil'             => $this->input->post('hasil' . $id),
                    'tingkatpositif'    => $tingkatpositif,
                    'nanah_lendir'      => $nanah_lendir,
                    'bercak_darah'      => $bercak_darah,
                    'air_liur'          => $air_liur,
                    'satuan'            => $this->input->post('satuan' . $id),
                    'rujukan_lk'        => $this->input->post('nilai_rujukan_lk' . $id),
                    'rujukan_pr'        => $this->input->post('nilai_rujukan_pr' . $id),
                    'datecreate'        => date('Y-m-d H:i:s'),
                    'petugaspemeriksa'  => $this->input->post('petugaspemeriksa'),
                    'nama_petugas'      => getField('pgwNama', 'NRP', $this->input->post('petugaspemeriksa'), 'tbl01_pegawai'),
                    'userinput'         => $this->session->userdata('get_uid')
                );
            }
            if (!empty($data)) {
                $this->nota_model->simpanPemeriksaan($data);
                $response = array('status' => true, 'message' => "Hasil Pemeriksaan Berhasil Diinput", 'idjenis' => $this->input->post('idjenis'));
            } else {
                $response = array('status' => false, 'message' => "Data Tidak Lengkap", 'idjenis' => $this->input->post('idjenis'));
            }
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    public function _file_upload($path, $filename, $filetype)
    {
        $config['upload_path']          = $path;
        $config['allowed_types']        = $filetype;
        $config['max_size']             = 1000;
        $config['max_width']            = 750;
        $config['max_height']           = 450;
        $config['overwrite']        = true;
        $config['file_name']            = $filename;
        $this->load->library('upload', $config);
    }

    function showpemeriksaan($reg_unit = "", $idjenis = "")
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $data = $this->nota_model->showPemeriksaan($reg_unit, $idjenis);
            $jenis = $this->nota_model->cekJenisPemeriksaan($idjenis);
            if (!empty($data)) $response = array('status' => true, 'message' => "Ok", 'data' => $data, 'jenis' => $jenis);
            else $response = array('status' => false, 'message' => "Data Pemeriksaan Belum Ada", 'data' => $data, 'jenis' => $jenis);
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    function list_pemeriksaan($idjenis)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $data = $this->nota_model->listPemeriksaan($idjenis);
            if (!empty($data)) $response = array('status' => true, 'message' => "OK", 'data' => $data);
            else $response = array('status' => false, 'message' => "Data Pemeriksaan Belum Ada", 'data' => $data);
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    function permintaan_pemeriksaan($idjenis, $idx_pendaftaran, $reg_unit)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $data = $this->nota_model->permintaanPemeriksaan($idjenis, $idx_pendaftaran, $reg_unit);
            $jenis = $this->nota_model->cekJenisPemeriksaan($idjenis);
            if (!empty($data)) $response = array('status' => true, 'message' => "OK", 'data' => $data, 'jenis' => $jenis);
            else $response = array('status' => false, 'message' => "Data Pemeriksaan Belum Ada", 'data' => $data, 'jenis' => $jenis);
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    function list_sub_pemeriksaan($idperiksa)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $data = $this->nota_model->listSubPemeriksaan($idperiksa);
            if (!empty($data)) {
                $response = array('status' => true, 'message' => "Ok", 'data' => $data);
            } else {
                $data = $this->nota_model->getPemeriksaanByid($idperiksa);
                $response = array('status' => false, 'message' => "Data Pemeriksaan Belum Ada", 'data' => $data);
            }
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    function hapuspemeriksaan($reg_unit, $idjenis, $idpemeriksaan)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $cek = $this->nota_model->getPemeriksaan($reg_unit, $idpemeriksaan);
            if (empty($cek)) {
                $response = array('status' => false, 'message' => "Data Pemeriksaan Tidak Ditemukan", 'idjenis' => $idjenis);
            } else {
                if ($cek->userinput != $this->session->userdata('get_uid')) {
                    $response = array('status' => false, 'message' => "Maaf Anda tidak berhak menghapus data hasil pemeriksaan", 'idjenis' => $idjenis);
                } else {
                    $this->db->where('reg_unit', $reg_unit);
                    $this->db->where('idpemeriksaan', $idpemeriksaan);
                    $this->db->delete('tbl03_hasil_pemeriksaan_penunjang');
                    $response = array('status' => true, 'message' => "Hasil pemeriksaan berhasil dihapus", 'idjenis' => $idjenis);
                }
            }
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali", 'idjenis' => $idjenis);
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    function kode()
    {
        //echo $this->nota_model->getBookingID();
    }
    function riwayat_kunjungan($nomr)
    {
        $ses_state = $this->users_model->cek_session_id();
        $start = intval($this->input->get("start"));
        $limit = intval($this->input->get("limit"));
        $q = $this->input->get("q");
        if ($ses_state) {
            $mulai = ($start * $limit) - $limit;
            $row_count = $this->nota_model->countRiwayatKunjungan($nomr, $q);
            $data = $this->nota_model->getRiwayatKunjungan($nomr, $limit, $mulai, $q);

            $response = array(
                'status'    => true,
                'message'   => "OK",
                'start'     => $start,
                'row_count' => $row_count,
                'limit'     => $limit,
                'data'      => $data,
            );
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    function viewhasilpemeriksaan($nomr, $idruang)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'jenispemeriksaan' => $this->nota_model->getJenisPemeriksaan($idruang)
            );
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    function gethasilpemeriksaan($nomr, $idjenis)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $jenis = $this->nota_model->cekJenisPemeriksaan($idjenis);
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'jenis'     => $jenis,
                'data' => $this->nota_model->getHasilPemeriksaanByPasien($nomr, $idjenis)
            );
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali", 'idjenis' => $idjenis);
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    function data_tagihan($iddaftar, $jkn)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'data' => $this->nota_model->getTagihan($iddaftar, $jkn)
            );
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    function simpandiagnosaakhir()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $data = array(
                'id_daftar' => $this->input->post('id_daftar'),
                'reg_unit' => $this->input->post('reg_unit'),
                'idruang' => $this->input->post('idruang'),
                'nama_ruang' => $this->input->post('nama_ruang'),
                'diagnosa_utama' => $this->input->post('diagnosa_utama'),
                'diagnosa_sekunder' => $this->input->post('diagnosa_sekunder'),
                'user_exec' => $this->session->userdata('get_uid')
            );
            $idx = $this->input->post('idx');
            if (empty($idx)) {
                $this->db->insert('tbl03_diagnosa_akhir', $data);
                $idx = $this->db->insert_id();
                $message = "Diagnosa Akhir Berhasil Di Masukkan";
            } else {
                $message = "Diagnosa Akhir Berhasil di update";
            }

            $response = array(
                'status'    => true,
                'message'   => $message,
                'idx' => $idx
            );
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    function data_diagnosa_akhir($id_daftar, $reg_unit)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'data' => $this->nota_model->getDiagnosaAkhir($id_daftar, $reg_unit)
            );
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    function jenispemeriksaan($idruang)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $jenis = $this->nota_model->getJenisPemeriksaan($idruang);
            //print_r($jenis);exit;
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'data' => $jenis,

            );
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
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

                                $y["getDokter"] = $this->nota_model->getDokter();
                            } else {
                                $y["getDokter"] = $this->nota_model->getDokter($x['ruangID']);
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

                        $y['modul']             = $this->load->view('nota_tagihan/template_penunjang', $y, true);
                        $x['content']           = $this->load->view('nota_tagihan/template_entry', $y, true);
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
    function data_permintaan_penunjang($reg_unit)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'data' => $this->nota_model->data_permintaan_penunjang($reg_unit),
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
                        $x['content']           = $this->load->view('nota_tagihan/template_entry', $y, true);
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

    function cek_kwitansi($id_daftar)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->where('id_daftar', $id_daftar);
            $row = $this->db->get('tbl05_kwitansi')->num_rows();
            if ($row > 0) {
                $response = array(
                    'status' => 1,
                    'message' => "Transaksi Pasien Sudah Selesai"
                );
            } else {
                $response = array(
                    'status' => 2,
                    'message' => "Pasien Belum Menyelesaikan Transaksi di kasir, Apakah  anda akan melanjutkan pemulangan pasien"
                );
            }
        } else {
            $response = array(
                'status' => 0,
                'message' => "Session Expired"
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function verifikasi($idx, $value)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($value == 1) $uv = $this->session->userdata('get_uid');
            else $uv = "";
            $data = array('dokterVerifikasi' => $uv);

            $this->db->where('idx', $idx);
            $this->db->update('tbl03_hasil_pemeriksaan_penunjang', $data);
            $response = array(
                'status'    => true,
                'message'   => "OK",
            );
        } else {
            $response = array(
                'status'    => false,
                'message'   => "Session Expire"
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
