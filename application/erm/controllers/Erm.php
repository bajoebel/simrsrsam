<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Erm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('erm_model');
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
                            // $kondisi = array('idruang' => $this->session->userdata('kdlokasi'), 'dokter' => 1);
                            $dokter = $this->Layanan_model->getDokterAktif($this->session->userdata('kdlokasi'));
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
                            $param = array('jns_layanan' => 'jns_layanan', 'dari' => 'tglAwal', 'sampai' => 'tglAkhir');
                            $field = array('id_daftar', 'reg_unit', 'tgl_masuk', 'nomr', 'nama_pasien', 'tgl_lahir', 'jns_kelamin', 'namaDokterJaga', '{{nama_ruang}}', 'cara_bayar','=action[{{status_pasien}}]');
                        } else $notif = 0;

                        $action = "<div class='btn-group'><button onclick='pilihPasien({{idx}})' class='btn btn-danger btn-sm'><span class='fa fa-search'></span> Pilih</button></div>";
                        $config = array(
                            'url'           => 'erm.php/layanan/getdata',
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
                            'url'           => 'erm.php/layanan/datapermintaanpindah',
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
                            'url'           => 'erm.php/layanan/riwayatpindah',
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
                            'url'           => 'erm.php/layanan/riwayatpulang',
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
                        $antreandokter=$this->Layanan_model->getAntreanDokter($this->session->userdata('kdlokasi'));
                        if(!empty($antreandokter)) $dj= $antreandokter[0]->dokterJaga; else $dj=0;
                        $jadwal=$this->Layanan_model->getJadwal($this->session->userdata('kdlokasi'),$dj);
                        $lastantrean=$this->Layanan_model->getLastAntrean($this->session->userdata('kdlokasi'),$dj);
                        $data = array(
                            'contentTitle' => 'Cari Pasien',
                            'ruangID' => $this->session->userdata('kdlokasi'),
                            'ruang' => $ruang,
                            'notif' => $notif,
                            'getDokter' => $dokter,
                            'antreandokter'=>$antreandokter,
                            'jadwal'=>$jadwal,
                            'lastantrean'=>$lastantrean,
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
                            'lib' => array('js/layanan.js','js/daftarlayanan.js')
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
    function detail(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $idx=intval($this->input->get('idx'));
            $detail=$this->erm_model->getPendaftaran($idx);
            $folder="rajal";
            $pasien=array();
            if(!empty($detail)){
                if($detail->jns_layanan=="PJ") $folder='penunjang';
                else if($detail->jns_layanan=="GD") $folder='igd';
                else if($detail->jns_layanan=="RI") $folder='ranap';
                $pasien=$this->erm_model->getPasien($detail->nomr);
            }
            
            $z=setNav("nav_2");
            $data=array(
                'contentTitle'=>'E Rekam Medis',
                'detail'=>$detail,
                'pasien'=>$pasien
            );
            $view=array(
                'header'=>$this->load->view('template/header', '', true),
                'nav_sidebar'=>$this->load->view('template/nav_sidebar', $z, true),
                'content'=>$this->load->view('erm/'.$folder.'/ermindex',$data, true)
            );
            $this->load->view('template/theme', $view);
        }else {
            $sid = getSessionID();
            $url_login = base_url() . 'erm.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }
}