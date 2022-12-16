<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class registrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
        $this->load->model('pendaftaran_model');
        $this->load->helper('lz');
    }
    public function index()
    {
        $this->rawat_jalan();
    }

    /**
     * Registrasi Rawat Inap
     */

    function rawat_jalan()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $y['index_menu'] = 4;
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_4");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

            $y['contentTitle'] = "Registrasi pasien rawat jalan";

            $x['content'] = $this->load->view('registrasi/template_cari_pasien_rajal', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'mr_registrasi.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function cari_pasien()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $mode = $_POST['rbnomor'];
            $nomor = $_POST['txtNokartu'];
            if ($mode == 'nomr') {
                $this->db->where('nomr', $nomor);
            } elseif ($mode == 'bpjs') {
                $this->db->where('no_bpjs', $nomor);
            } else {
                $this->db->where('no_ktp', $nomor);
            }
            $this->db->where_not_in('nomr', '');
            $cekQuery = $this->db->get('tbl01_pasien');
            if ($cekQuery->num_rows() > 0) {
                $res = $cekQuery->row_array();
                $response['code'] = 200;
                $response['message'] = $res['nomr'];
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Data pasien tidak ditemukan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 402;
            $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
        }
        echo json_encode($response);
    }

    function updateNoBPJS()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['nomr']) &&
                    isset($_POST['no_bpjs'])
                ) {
                    $nomr = $this->input->post('nomr', true);
                    $no_bpjs = $this->input->post('no_bpjs', true);

                    $this->db->where('nomr', $nomr);
                    $cekCommand = $this->db->update('tbl01_pasien', array('no_bpjs' => $no_bpjs));
                    if ($cekCommand) {
                        $response['code'] = 200;
                        $response['message'] = "Data sukses diupdate.";
                    } else {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Data tidak dapat diupdate. Coba ulangi kembali.";
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
            $response['code'] = 402;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali.";
        }
        echo json_encode($response);
    }

    function cekBPJS()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['nomr']) &&
                    isset($_POST['no_bpjs'])
                ) {
                    $nomr = $this->input->post('nomr', true);
                } else {
                    $response['code'] = 402;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 402;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali.";
        }
        echo json_encode($response);
    }

    function daftar_rawat_jalan()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_4");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $nomr = $this->uri->segment(3);
            $cekNum = $this->db->where('nomr',$nomr)->get('tbl01_pasien');
            if ($cekNum->num_rows() > 0) {
                // Data detail pasien
                $y = $cekNum->row_array();
                $y['contentTitle'] = "Registrasi pasien rawat jalan";
                $y['index_menu'] = 4;
                $this->db->where_in('profId', array('1', '2'));
                $y['getDokter'] = $this->db->get('tbl01_pegawai');

                // Data Ruangan
                $this->db->where_in('grid', array('1','3'));
                $this->db->where('status_ruang', 1);
                $y['getPoli'] = $this->db->get('tbl01_ruang');
                $y['ranap'] = 0;
                $y["ruangranap"]='';

                // Data Rujukan
                $this->db->where_not_in('idx', array('9', '10'));
                $this->db->order_by("FIELD(idx,1,2,5,3,6,7,4)");
                $y['getRujukan'] = $this->db->get('tbl01_rujukan');

                // Data Cara Bayar
                $y['getCaraBayar'] = $this->db->get('tbl01_cara_bayar');
                
                // Data Agama
                $y['getAgama'] = $this->db->get('tbl01_agama');
                $this->db->where_not_in('idx', 4);
                $y['getNegara'] = $this->db->get('tbl01_negara');
                $y['getProvinsi'] = $this->db->get('tbl01_provinsi');
                $y['getSuku'] = $this->db->get('tbl01_suku');
                $y['getBahasa'] = $this->db->get('tbl01_bahasa');
                $y['getPekerjaan'] = $this->db->get('tbl01_pekerjaan');
                $y['getStatus'] = $this->db->get('tbl01_status_kawin');
                $y['getProvinsi'] = $this->db->where("LENGTH(kode)",2)->get('tbl01_wilayah');
                $y['pendidikan'] = $this->db->get('tbl01_tk_pddkn')->result();
                // Untuk Kebutuhan Pasien Baru
                $this->db->where("SUBSTR(kode,1,2)",$y['id_provinsi']);
                $this->db->where("LENGTH(kode)",5);
                $y['kab'] = $this->db->get('tbl01_wilayah')->result();
                // print_r($y['kab']);
                $this->db->where('SUBSTR(kode,1,5)',$y['id_kab_kota']);
                $this->db->where("LENGTH(kode)",8);
                $query = $this->db->get('tbl01_wilayah');
                $y['kec'] = $query->result();

                $this->db->where('SUBSTR(kode,1,8)',$y["id_kecamatan"]);
                $this->db->where("LENGTH(kode)",13);
                $query = $this->db->get('tbl01_wilayah');
                $y['kel'] = $query->result();

                $this->db->where("SUBSTR(kode,1,2)",$y['id_provinsi_domisili']);
                $this->db->where("LENGTH(kode)",5);
                $y['kabdom'] = $this->db->get('tbl01_wilayah')->result();

                $this->db->where('SUBSTR(kode,1,5)',$y['id_kab_kota_domisili']);
                $this->db->where("LENGTH(kode)",8);
                $query = $this->db->get('tbl01_wilayah');
                $y['kecdom'] = $query->result();

                $this->db->where('SUBSTR(kode,1,8)',$y["id_kecamatan_domisili"]);
                $this->db->where("LENGTH(kode)",13);
                $query = $this->db->get('tbl01_wilayah');
                $y['keldom'] = $query->result();
                $y['dpo'] = $this->db->where('nomr',$nomr)->where('status_dpo',0)->get('tbl01_dpo_rs')->row();
                // $this->db->where('nomr', $nomr);
                // $this->db->order_by('idx', 'desc');
                // $this->db->limit(1);
                // $y['pj'] = $this->db->get('tbl01_penanggung_jawab')->row();
                $kodebooking=$this->input->get('kodebooking');
                $y['kodebooking']="";
                if(!empty($kodebooking)){
                    $y['kodebooking']=$kodebooking;
                    $this->onlineDB = $this->load->database('online', true);
                    $y['booking']=$this->onlineDB->where('kode_booking',$kodebooking)
                    ->join('m_poli b','a.`grId`=b.`grId`')
                    ->join('m_dokter c','a.`id_dokter`=c.`id_dokter`')
                    ->get('t_online a')->row_array();

                    if(!empty($y['booking'])){
                        // $id="";
                        $id=getField('idx',array('grid_lama'=>$y['booking']['grId']),'tbl01_ruang');
                        $tgl=date('Y-m-d');
                        $timestamp = strtotime($tgl);
                        $day = date('D', $timestamp);
                        $hari=array(
                            'Sun'=>'Minggu',
                            'Mon'=>'Senin',
                            'Tue'=>'Selasa',
                            'Wed'=>'Rabu',
                            'Thu'=>'Kamis',
                            'Fri'=>'Jumat',
                            'Sat'=>'Sabtu'
                        );
                        $y['dokter'] = $this->db->select("jadwal_dokter_id as NRP, jadwal_dokter_nama as pgwNama")
                        ->where('jadwal_hari',$hari[$day])
                        ->where('jadwal_poly_id',$id)
                        ->get('tbl02_jadwal_dokter')->result();
                    }else $y['dokter']=array();
                }else{
                    $y['booking']=array();
                    $y['dokter']=array();
                }
                
                $x['libjs']=array(
                    'js/pendaftaran.js'
                );
                $x['content'] = $this->load->view('registrasi/template_rajal', $y, true);
                $this->load->view('template/theme', $x);
            } else {
                $y['contentTitle'] = "Pasien tidak ditemukan";
                $y['index_menu'] = 4;
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
                $x['content'] = $this->load->view('registrasi/template_pasien_kosong', $y, true);
                $this->load->view('template/theme', $x);
            }
            
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'mr_registrasi.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }
    function getHistoryPasien()
    {
        $nomr = $this->input->post('nomr', true);
        $SQL_HISTORY = "SELECT * FROM tbl02_pendaftaran WHERE nomr = '$nomr' 
        AND reg_unit NOT IN(SELECT reg_unit FROM tbl02_pendaftaran_batal)
        ORDER BY tgl_masuk DESC LIMIT 10";
        $y['getHistory'] = $this->db->query("$SQL_HISTORY");
        $this->load->view('registrasi/getHistoryPasien', $y);
    }
    function daftar_rajal()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['nomr']) &&
                    isset($_POST['no_ktp']) &&
                    isset($_POST['nama_pasien']) &&
                    isset($_POST['tempat_lahir']) &&
                    isset($_POST['tgl_lahir']) &&
                    isset($_POST['jns_kelamin']) &&
                    isset($_POST['jns_layanan']) &&
                    isset($_POST['id_ruang']) &&
                    isset($_POST['nama_ruang']) &&
                    isset($_POST['id_rujuk']) &&
                    isset($_POST['rujukan']) &&
                    isset($_POST['pjPasienNama']) &&
                    isset($_POST['pjPasienPekerjaan']) &&
                    isset($_POST['pjPasienAlamat']) &&
                    isset($_POST['pjPasienTelp']) &&
                    isset($_POST['pjPasienHubKel']) &&
                    isset($_POST['pjPasienDikirimOleh']) &&
                    isset($_POST['pjPasienAlmtPengirim']) &&
                    isset($_POST['dokterJaga']) &&
                    isset($_POST['namaDokterJaga']) &&
                    isset($_POST['id_cara_bayar']) &&
                    isset($_POST['cara_bayar']) &&
                    isset($_POST['id_jenis_peserta']) &&
                    isset($_POST['jenis_peserta']) &&
                    isset($_POST['no_bpjs']) &&
                    isset($_POST['no_jaminan'])
                ) {
                    $idcb=$this->input->post('id_cara_bayar');
                    $id_jenis_peserta =  trim($this->input->post('id_jenis_peserta', TRUE));
                    if ($idcb == 2) {
                        //Jika Pasien PBPJS
                        $params['id_jenis_peserta'] = $idcb . "." . $id_jenis_peserta;
                        $params['jenis_peserta'] = trim($this->input->post('jenis_peserta', TRUE));
                    } else {
                        $params['id_jenis_peserta'] = $idcb . "." . trim($this->input->post('id_cara_bayar', TRUE));
                        $params['jenis_peserta'] = trim($this->input->post('cara_bayar', TRUE));
                    }
                    $idrujuk=trim($this->input->post('id_rujuk', TRUE));
                    
                    $params['nomr'] = trim($this->input->post('nomr', TRUE));
                    $params['id_daftar'] = $this->pendaftaran_model->getIdDaftar();
                    $no_rujuk=trim($this->input->post('no_rujuk', TRUE));
                    if ($idrujuk == "7") {
                        $cKir = $this->db->from('tbl02_pendaftaran')->where('id_daftar', $no_rujuk)->get()->row_array();
                        $params['ckir'] = $cKir['ckir'];
                        $bayar = $cKir['id_cara_bayar'];
                    } else {
                        $params['ckir'] = $params['id_daftar'] . "R" . $params['nomr'];
                        $bayar = trim($this->input->post('id_cara_bayar', TRUE));
                    }
                    $params['c19'] = !empty($this->input->post('c19')) ? "1" : "0";
                    $params['icdkode']=$this->input->post('icdkode');
                    $params['icd']=$this->input->post('icd');
                    
                    $params['no_ktp'] = trim($this->input->post('no_ktp', TRUE));
                    $params['nama_pasien'] = trim($this->input->post('nama_pasien', TRUE));
                    $params['tempat_lahir'] = trim($this->input->post('tempat_lahir', TRUE));
                    // $params['tgl_lahir'] = setDateEng(trim($this->input->post('tgl_lahir', TRUE)));
                    $params['tgl_lahir'] = trim($this->input->post('tgl_lahir', TRUE));
                    $params['jns_kelamin'] = trim($this->input->post('jns_kelamin', TRUE));
                    
                    $params['jns_layanan'] = trim($this->input->post('jns_layanan', TRUE));
                    $params['id_ruang'] = trim($this->input->post('id_ruang', TRUE));
                    
                    $params['nama_ruang'] = trim($this->input->post('nama_ruang', TRUE));
                    $params['id_rujuk'] = $idrujuk;
                    $params['rujukan'] = trim($this->input->post('rujukan', TRUE));
                    $params['no_rujuk'] = $no_rujuk;
                    $params['pjPasienNama'] = trim($this->input->post('pjPasienNama', TRUE));
                    $params['pjPasienUmur'] = trim($this->input->post('pjPasienUmur', TRUE));
                    $params['pjPasienPekerjaan'] = trim($this->input->post('pjPasienPekerjaan', TRUE));
                    $params['pjPasienAlamat'] = trim($this->input->post('pjPasienAlamat', TRUE));
                    $params['pjPasienTelp'] = trim($this->input->post('pjPasienTelp', TRUE));
                    $params['pjPasienHubKel'] = trim($this->input->post('pjPasienHubKel', TRUE));
                    $params['pjPasienDikirimOleh'] = trim($this->input->post('pjPasienDikirimOleh', TRUE)); //PPK Pengirim
                    $params['pjPasienAlmtPengirim'] = trim($this->input->post('pjPasienAlmtPengirim', TRUE)); // Alamat PPK pengirim

                    $params['dokterJaga'] = trim($this->input->post('dokterJaga', TRUE));
                    $params['namaDokterJaga'] = trim($this->input->post('namaDokterJaga', TRUE));

                    $params['provinsi_id'] = trim($this->input->post('id_provinsi', TRUE));
                    $params['kabkota_id'] = trim($this->input->post('id_kab_kota', TRUE));
                    $params['kecamatan_id'] = trim($this->input->post('id_kecamatan', TRUE));
                    $params['kelurahan_id'] = trim($this->input->post('id_kelurahan', TRUE));
                    $params['nama_provinsi'] = trim($this->input->post('nama_provinsi', TRUE));
                    $params['nama_kab_kota'] = trim($this->input->post('nama_kab_kota', TRUE));
                    $params['nama_kecamatan'] = trim($this->input->post('nama_kecamatan', TRUE));
                    $params['nama_kelurahan'] = trim($this->input->post('nama_kelurahan', TRUE));
                    $params['rt'] = trim($this->input->post('rt', TRUE));
                    $params['alamat'] = trim($this->input->post('alamat', TRUE));
                    $params['rw'] = trim($this->input->post('rw', TRUE));
                    $params['kodepos'] = trim($this->input->post('kodepos', TRUE));
                    $params['provinsi_id_domisili'] = trim($this->input->post('id_provinsi_domisili', TRUE));
                    $params['kabkota_id_domisili'] = trim($this->input->post('id_kab_kota_domisili', TRUE));
                    $params['kecamatan_id_domisili'] = trim($this->input->post('id_kecamatan_domisili', TRUE));
                    $params['kelurahan_id_domisili'] = trim($this->input->post('id_kelurahan_domisili', TRUE));
                    $params['nama_provinsi_domisili'] = trim($this->input->post('nama_provinsi_domisili', TRUE));
                    $params['nama_kab_kota_domisili'] = trim($this->input->post('nama_kab_kota_domisili', TRUE));
                    $params['nama_kecamatan_domisili'] = trim($this->input->post('nama_kecamatan_domisili', TRUE));
                    $params['nama_kelurahan_domisili'] = trim($this->input->post('nama_kelurahan_domisili', TRUE));
                    $params['rt_domisili'] = trim($this->input->post('rt_domisili', TRUE));
                    $params['rw_domisili'] = trim($this->input->post('rw_domisili', TRUE));
                    $params['alamat_domisili'] = trim($this->input->post('alamat_domisili', TRUE));
                    $params['kodepos_domisili'] = trim($this->input->post('kodepos_domisili', TRUE));
                    
                    $params['id_cara_bayar'] = $bayar;
                    $params['cara_bayar'] = trim($this->input->post('cara_bayar', TRUE));
                    $params['no_bpjs'] = trim($this->input->post('no_bpjs', TRUE));
                    $params['no_jaminan'] = trim($this->input->post('no_jaminan', TRUE));
                    $params['tgl_jaminan'] = trim($this->input->post('tgl_jaminan', TRUE));
                    $params['tgl_daftar'] = trim($this->input->post('tgl_daftar', TRUE));
                    $params['user_daftar'] = $this->session->userdata('get_uid');
                    $params['session_id'] = getSessionID();

                    $params['id_ruanglama']=getField('koderuanglama',array('idx'=>trim($this->input->post('id_ruang',TRUE))),'tbl01_ruang'); 
                    //echo json_encode($params); exit;
                    if ($params['nomr'] == "") {
                        $response['code'] = 501;
                        $response['message'] = "Ops. No.MR tidak boleh kosong!";
                    } else {
                        
                        $SQLRegis = "SELECT idx FROM tbl02_pendaftaran WHERE nomr = '$params[nomr]' 
                            AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') 
                            AND id_ruang = '$params[id_ruang]' AND reg_unit NOT IN(SELECT reg_unit FROM tbl02_pendaftaran_batal)";

                            $cekRegis = $this->db->query("$SQLRegis");
                            if ($cekRegis->num_rows() > 0) {
                                $response['code'] = 501;
                                $response['message'] = "Ops. Pasien telah terdaftar dengan tujuan layanan, pada hari yang sama!\nSilahkan periksa kembali tujuan layanan anda.";
                            } else {
                                $this->db->insert('tbl02_pendaftaran', $params);
                                $insert_id = $this->db->insert_id();
                                if ($insert_id) {
                                    $this->db->select('idx,id_daftar,reg_unit,id_ruang,dokterJaga');
                                    $this->db->where('idx', $insert_id);
                                    $cekQuery = $this->db->get('tbl02_pendaftaran');
                                    if ($cekQuery->num_rows() > 0) {
                                        $resData = $cekQuery->row_array();
                                        //Insert Data Antrian Poly
                                        if ($params['jns_layanan'] == "RJ") {
                                            $this->load->model('patch_model');
                                                $antri = array(
                                                    'id_daftar' => $resData["id_daftar"], 
                                                    'no_antrian_poly' => $this->patch_model->getAntrianpoly($resData["id_ruang"]),
                                                    'tanggal'=>date('Y-m-d'),
                                                    'antrianruang'=>$resData["id_ruang"],
                                                    'antriandokter'=>$resData["dokterJaga"]
                                                );
                                                $this->db->insert('tbl02_antrian', $antri);
                                        }

                                        // Update booking
                                        $kode=$this->input->post('kodebooking');
                                        if(!empty($kode)){
                                            $this->onlineDB = $this->load->database('online', true);
                                            $data = array(
                                                'kode_booking' => $kode,
                                                'verifikasi' => '1'
                                            );
                                            $this->onlineDB->where('kode_booking', $kode);
                                            $update = $this->onlineDB->update('t_online', $data);
                                        }
                                        

                                        $response['code'] = 200;
                                        $response['message'] = "Simpan data sukses.";
                                        $response['unikID'] = encrypt_decrypt('encrypt', $resData['reg_unit'], true);
                                    } else {
                                        $response['code'] = 202;
                                        $response['message'] = "Simpan data sukses namun cookies telah dihapus.";
                                        $response['unikID'] = null;
                                    }
                                } else {
                                    $response['code'] = 501;
                                    $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                                }
                            }
                    }
                } else {
                    $response['code'] = 401;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
    function cekRegUnit()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['regUnitRajal'])) {
                    if ($_POST['regUnitRajal'] == "") {
                        $response['code'] = 501;
                        $response['message'] = "Ops. No registrasi unit rawat jalan tidak boleh kosong!";
                    } else {
                        $this->db->where('reg_unit', $_POST['regUnitRajal']);
                        $this->db->where_in('jns_layanan', array('RJ', 'PG'));
                        $cekQuery = $this->db->get('tbl02_pendaftaran');
                        if ($cekQuery->num_rows() > 0) {
                            $response['code'] = 200;
                            $response['message'] = "";
                            $response['unikID'] = encrypt_decrypt('encrypt', $_POST['regUnitRajal'], true);
                        } else {
                            $response['code'] = 402;
                            $response['message'] = "Data registrasi unit rawat jalan tidak ditemukan.";
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
    function cetakulang()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['reg_unit'])) {
                    if ($_POST['reg_unit'] == "") {
                        $response['code'] = 501;
                        $response['message'] = "Ops. No registrasi unit rawat jalan tidak boleh kosong!";
                    } else {
                        $this->db->where('reg_unit', $_POST['reg_unit']);
                        $cekQuery = $this->db->get('tbl02_pendaftaran');
                        if ($cekQuery->num_rows() > 0) {
                            $reg = $cekQuery->row();
                            if ($reg->jns_layanan == "RI") {
                                $response['url'] = base_url() . "mr_registrasi.php/registrasi/reg_success_ranap?uid=" . encrypt_decrypt('encrypt', $_POST['reg_unit'], true);
                            } elseif ($reg->jns_layanan == "GD") {
                                $response['url'] = base_url() . "mr_registrasi.php/registrasi/reg_success_igd?uid=" . encrypt_decrypt('encrypt', $_POST['reg_unit'], true);
                            } else {
                                $response['url'] = base_url() . "mr_registrasi.php/registrasi/reg_success?uid=" . encrypt_decrypt('encrypt', $_POST['reg_unit'], true);
                            }
                            $response['code'] = 200;
                            $response['message'] = "";
                            $response['unikID'] = encrypt_decrypt('encrypt', $_POST['regUnitRajal'], true);
                        } else {
                            $response['code'] = 402;
                            $response['message'] = "Data registrasi unit rawat jalan tidak ditemukan.";
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
            // Cek status batal
            $reg_unit = encrypt_decrypt('decrypt', $_GET['uid'], true);

            $this->db->where('reg_unit', $reg_unit);
            $cekBatal = $this->db->get('tbl02_pendaftaran_batal');

            // $this->db->where('reg_unit', $reg_unit);
            // $cekPendaftaran = $this->db->get('tbl02_pendaftaran');

            if ($cekBatal->num_rows() > 0) {
                $url_reg = base_url() . 'mr_registrasi.php/registrasi';
                echo "<script>alert('Ops. Anda tidak bisa membuka registrasi ini. Registrasi ini telah dibatalkan');
                window.location.href = '$url_reg';</script>";
            }else {
                $x['header'] = $this->load->view('template/header', '', true);
                $z = setNav("nav_4");
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                
                $this->db->select('`idx`,`id_daftar`,`id_admisi`,`reg_unit`,`nomr`,`no_ktp`,
                `nama_pasien`,`tempat_lahir`,`tgl_lahir`,`jns_kelamin`,`id_ruang`,`nama_ruang`,
                `id_cara_bayar`,`cara_bayar`,`no_bpjs`,`no_jaminan`,`id_rujuk`,`rujukan`,
                jns_layanan,tgl_jaminan,tgl_masuk,dokterJaga');
                $this->db->from('tbl02_pendaftaran');
                // $this->db->join('tbl02_antrian', 'tbl02_pendaftaran.id_daftar=tbl02_antrian.id_daftar', 'LEFT');
                $this->db->where('reg_unit', $reg_unit);
                $cekNum = $this->db->get();
                if ($cekNum->num_rows() > 0) {
                    $y = $cekNum->row_array();
                    // print_r($y); exit;
                    $this->db->where('idx', $y['id_cara_bayar']);
                    $cb = $this->db->get('tbl01_cara_bayar')->row();
                    if (empty($cb)) $y["jkn"] = 0;
                    else $y["jkn"] = $cb->jkn;

                    $this->db->where_in('grid', array('1','3'));
                    $this->db->where('status_ruang', 1);
                    $y['poli'] = $this->db->get('tbl01_ruang')->result();
                    $tgl=explode(' ',$y['tgl_masuk']);
                    $timestamp = strtotime($tgl[0]);
                    $day = date('D', $timestamp);
                    $hari=array(
                        'Sun'=>'Minggu',
                        'Mon'=>'Senin',
                        'Tue'=>'Selasa',
                        'Wed'=>'Rabu',
                        'Thu'=>'Kamis',
                        'Fri'=>'Jumat',
                        'Sat'=>'Sabtu'
                    );
                    
                    $y['dokter'] = $this->db->select("jadwal_dokter_id as NRP, jadwal_dokter_nama as pgwNama")
                    ->where('jadwal_hari',$hari[$day])
                    ->where('jadwal_poly_id',$y['id_ruang'])
                    ->get('tbl02_jadwal_dokter')->result();
                    $y['antrian']=$this->db->where('id_daftar',$y['id_daftar'])->get('tbl02_antrian')->row_array();
                    $x['libjs']=array(
                        'js/pendaftaran.js',
                        'js/jspdf.js',
                        'js/cetaksep.js'
                    );
                    $y['contentTitle'] = "Pendaftaran Pasien Rawat Jalan";
                    $x['content'] = $this->load->view('registrasi/template_daftar_rajal_sukses', $y, true);
                    $this->load->view('template/theme', $x);

                } else {
                    $url_reg = base_url() . 'mr_registrasi.php/registrasi';
                    echo "<script>alert('Ops. Data tidak ditemukan. periksa kembali data anda');
                    window.location.href = '$url_reg';</script>";
                    // $y["jkn"] = 0;
                    // $y["idx"] = "";
                    // $y["id_rujuk"] = "";
                    // $y['no_bpjs'] = "";
                    // $y['id_daftar'] = "";
                    // $y['reg_unit'] = "";
                    // $y['tgl_masuk'] = "";
                    // $y['nomr'] = "";
                    // $y['nama_pasien'] = "";
                    // $y['tempat_lahir'] = "";
                    // $y['tgl_lahir'] = "";
                    // $y['jns_kelamin'] = "1";
                    // $y['id_ruang'] = "";
                    // $y['ruang'] = "";
                    // $y['jns_layanan'] = "";
                    // $y['no_antrian_poly'] = "";
                    // $y['batch'] = '';
                    // $y['estimasi'] = "";
                    // $y['tgl_jaminan'] = "";
                    // $y['label_antrian'] = "";
                }
                
            }
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'mr_registrasi.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }

    function cetakKartu()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (isset($_GET['kode'])) {
                $kode = $_GET['kode'];
                $this->db->select('nomr,nama,tgl_lahir,alamat,nama_kab_kota');
                $this->db->from('tbl01_pasien');
                $this->db->where('nomr', $kode);
                $cekQuery = $this->db->get();
                if ($cekQuery->num_rows() > 0) {
                    $resData = $cekQuery->row_array();
                    $x['nomr'] = $resData['nomr'];
                    $x['nama'] = $resData['nama'];
                    $x['tgl_lahir'] = $resData['tgl_lahir'];
                    $x['alamat'] = $resData['alamat'];
                    $x['nama_kab_kota'] = $resData['nama_kab_kota'];
                    $this->load->view('cetak/v_kartupasien', $x);
                } else {
                    echo "<script>alert('Ops. Data pasien tidak ditemukan. Silahkan coba kembali.');
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
    function cetakStiker()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (isset($_GET['kode'])) {
                $kode = $_GET['kode'];
                $this->db->select('nomr,nama,tgl_lahir,jns_kelamin');
                $this->db->from('tbl01_pasien');
                $this->db->where('nomr', $kode);
                $cekQuery = $this->db->get();
                if ($cekQuery->num_rows() > 0) {
                    $resData = $cekQuery->row_array();
                    $x['idmr'] = $resData['nomr'];
                    $x['nama'] = $resData['nama'];
                    $x['tgl_lahir'] = $resData['tgl_lahir'];
                    $x['jenkel'] = $resData['jns_kelamin'];
                    $x['aCek']=15;
                    $this->load->view('cetak/v_stiker', $x);
                } else {
                    echo "<script>alert('Ops. Data pasien tidak ditemukan. Silahkan coba kembali.');
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
    function sep($nojaminan,$tgl="")
    {
        $raw = intval($this->input->get('raw'));
        if ($raw == 0) {
            $ses_state = $this->users_model->cek_session_id();
            if ($ses_state) {
                date_default_timezone_set('UTC');
                $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
                // Create Signature
                $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
                $encodedSignature = base64_encode($signature);
                if(empty($mulai)) $mulai=date('Y-m-d');
                if(empty($selesai)) $selesai=date('Y-m-d');
                // Generate Header
                $header = "";
                $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
                $header .= "X-timestamp: " . $tStamp . "\r\n";
                $header .= "X-signature: " . $encodedSignature ."\r\n";
                $header .= "user_key: ".KEY_VC;
                $this->load->model('vclaim_model');
                $res = $this->vclaim_model->getData("SEP/$nojaminan",$header);
                $res_arr=json_decode($res);
                if($res_arr->metaData->code==200){
                    $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$res_arr->response);
                    $res=json_encode(array('metaData'=>$res_arr->metaData,'response'=>json_decode(hasil($data))));
                }
                // $res = $this->pendaftaran_model->cariSEP($nojaminan);
                // header('Content-Type: application/json');
                // echo $res; exit;
                // $res_arr = json_decode($res);
                if ($res_arr->metaData->code == 200) {
                    $res = $this->pendaftaran_model->cariSEPLokal($nojaminan,$tgl);
                    if(!empty($res)){
                        $this->load->helper('lz');
                        $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$res_arr->response);
                        // echo hasil($data); exit;
                        // print_r(json_decode(hasil($data))); exit;
                        $response = array('local' => 1, 'response' => $res,'sep'=>json_decode(hasil($data)));
                        // print_r($response);exit;
                        $this->load->view('cetak/v_print_sep_rj', $response);
                    }else{
                        //AmbilData Sep Online
                        // print_r($res_arr); exit;
                        if ($res_arr->response->noRujukan != "") {
                            $rujukan = $this->pendaftaran_model->cariRujukan($res_arr->response->noRujukan);
                            $rujukan_arr = json_decode($rujukan);
                            // print_r($rujukan_arr);
                            if ($rujukan_arr->metaData->code != 200) {
                                $rujukan = $this->pendaftaran_model->cariRujukan($res_arr->response->noRujukan, 2);
                                $rujukan_arr = json_decode($rujukan);
                                $data_rujukan = $rujukan_arr->response;
                            } else {
                                $data_rujukan = array();
                            }
                        } else {
                            $data_rujukan = array();
                        }

                        $response = array('local' => 0, 'response' => $res_arr->response, 'rujukan' => $data_rujukan);
                        
                        $this->load->view('cetak/v_print_sep_rj', $response);
                    }
                } else {
                    echo $res_arr->metaData->message;
                }
                //print_r($response); exit;
            } else {

                echo "session Expire";
            }
        } else {
            $res = $this->pendaftaran_model->cariSEPLokal($nojaminan);
            if (empty($res)) {
                $res = $this->pendaftaran_model->cariSEP($nojaminan);
                $res_arr = json_decode($res);
                $response = array('local' => 0, 'response' => $res_arr->response);
            } else {
                $response = array('local' => 1, 'response' => $res);
            }
            //$response = $this->pendaftaran_model->cariSEP($nojaminan);
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    function datacetaksep($nojaminan,$tgl="")
    {
        $raw = intval($this->input->get('raw'));
        $sekarang=date('d-m-Y H:i:s');
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            
            
            date_default_timezone_set('UTC');
            $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
            // Create Signature
            $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
            $encodedSignature = base64_encode($signature);
            if(empty($mulai)) $mulai=date('Y-m-d');
            if(empty($selesai)) $selesai=date('Y-m-d');
            // Generate Header
            $header = "";
            $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
            $header .= "X-timestamp: " . $tStamp . "\r\n";
            $header .= "X-signature: " . $encodedSignature ."\r\n";
            $header .= "user_key: ".KEY_VC;
            $this->load->model('vclaim_model');
            $res = $this->vclaim_model->getData("SEP/$nojaminan",$header);
            // echo $res; exit;
            $res_arr=json_decode($res);
            if ($res_arr->metaData->code == 200) {
                $res = $this->pendaftaran_model->cariSEPLokal($nojaminan,$tgl);
                // print_r($res);exit;
                $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$res_arr->response);
                $regunit=$this->input->get('regunit');
                // echo $regunit;exit;
                if(!empty($regunit)){
                    $dataregis=$this->db->where('reg_unit',$regunit)
                    ->select("reg_unit,`id_ruanglama` AS poliTujuan, nomr AS noMr,id_daftar,jns_layanan,pgwNama")
                    ->join('tbl01_pegawai','NRP=user_daftar')
                    ->get('tbl02_pendaftaran')->row();
                    if(!empty($dataregis)){
                        if($dataregis->jns_layanan=="RI") $jnsLayanan=1; else $jnsLayanan=2;
                        $sep=json_decode(hasil($data));
                        // print_r($res);exit;
                        if(!empty($res)){
                            $t_sep=array(
                                'NO_SEP'=>$sep->noSep,
                                'noKartu'=>$sep->peserta->noKartu,
                                'tglSep'=>$sep->tglSep,
                                'tglRujukan'=>$res->tglRujukan,
                                'noRujukan'=>$sep->noRujukan,
                                'ppkRujukan'=>$res->ppkRujukan,
                                'faskes'=> '',
                                'ppkPelayanan'=>$res->ppkPelayanan,
                                'jnsPelayanan'=>$res->jnsPelayanan,
                                'catatan'=>$sep->catatan,
                                'diagAwal'=>$res->diagnosa,
                                'poliTujuan'=>$dataregis->poliTujuan,
                                'klsRawat'=>$res->kelasRawat,
                                'lakaLantas'=>$res->lakaLantas,
                                'lokasiLaka'=>'',
                                'user'=>$res->user,
                                'noMr'=>$dataregis->noMr,
                                'id_daftar'=>$dataregis->id_daftar,
                                'jnsPeserta'=>$sep->peserta->jnsPeserta,
                                'user_edit'=>'',
                            );
                        }else{
                            $t_sep=array(
                                'NO_SEP'=>$sep->noSep,
                                'noKartu'=>$sep->peserta->noKartu,
                                'tglSep'=>$sep->tglSep,
                                'tglRujukan'=>'',
                                'noRujukan'=>$sep->noRujukan,
                                'ppkRujukan'=>'',
                                'faskes'=> '',
                                'ppkPelayanan'=>'',
                                'jnsPelayanan'=>$jnsLayanan,
                                'catatan'=>$sep->catatan,
                                'diagAwal'=>'',
                                'poliTujuan'=>$dataregis->poliTujuan,
                                'klsRawat'=>'',
                                'lakaLantas'=>'',
                                'lokasiLaka'=>'',
                                'user'=>'',
                                'noMr'=>$dataregis->noMr,
                                'id_daftar'=>$dataregis->id_daftar,
                                'jnsPeserta'=>$sep->peserta->jnsPeserta,
                                'user_edit'=>'',
                            );
                        }
                        $this->rsam = $this->load->database('rsam2', true);
                        if(!empty($t_sep)) {
                            $y = $this->rsam->where('NO_SEP',$nojaminan)
                            ->where('id_daftar',$dataregis->id_daftar)
                            ->get('t_sep')->num_rows();
                            if($y <= 0){
                                $this->rsam->insert('t_sep',$t_sep);
                            }else{
                                // $this->rsam->where('NO_SEP',$nojaminan);
                                // $this->rsam->update('t_sep',$t_sep);
                                // echo "SEP SUDAH ADA";exit;
                            }
                        }
                    }
                    

                    // header('Content-Type: application/json');
                    // echo json_encode($res);
                    // exit;
                }


                if(!empty($res)){
                    $this->load->helper('lz');
                    
                    $response = array(
                        'status'    => true,
                        'local'     => 1, 
                        'response'  => $res,
                        'seponline' => json_decode(hasil($data)),
                        'tgl'       => $sekarang,
                        'dataregis' => $dataregis
                    );
                    $this->db->query("UPDATE tbl02_sep_response SET cetakke=cetakke+1 WHERE noSep='$nojaminan'");
                }else{
                    $this->load->helper('lz');
                    // $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$res_arr->response);
                    $response = array(
                        'status'=>true,
                        'local' => 0, 
                        'seponline' => json_decode(hasil($data)), 
                        'rujukan' => array(),
                        'tgl'=>$sekarang,
                        'dataregis' => $dataregis
                    );
                }
            } else {
                
                $res = $this->pendaftaran_model->cariSEPLokal($nojaminan,$tgl);
                $response = array(
                    'status'    => true,
                    'local'     => 1, 
                    'response'  => $res,
                    'seponline' => array(),
                    'tgl'       => $sekarang,
                    'dataregis' => array()
                );
            }
        } else {
            $response=array('status'=>false,'message'=>"session Expire");
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function rujukan($norujuk){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->where('noRujukan',$norujuk);
            $rujukan=$this->db->get('tbl02_rujukanonline')->row();
            $data=array('rujukan'=>$rujukan);

            $this->load->view('cetak/v_print_rujukan_online', $data);
        }else{
            echo "session Expire";
        }
    }
    function mapping(){
        $data=$this->db->query("SELECT b.idx,b.reg_unit,b.nomr,b.nama_pasien,b.id_ruang, b.nama_ruang,SUBSTR(reg_unit,14,4) as no_urut, date_format(tgl_masuk,'%Y-%m-%d') as tgl_masuk FROM tbl02_pendaftaran b WHERE LENGTH(reg_unit)=17 AND b.reg_unit IN (SELECT reg_unit FROM (SELECT reg_unit, COUNT(reg_unit) AS jml  FROM tbl02_pendaftaran GROUP BY reg_unit) AS temp WHERE jml>1) order by reg_unit LIMIT 100")->result();
        echo '<table><tr><td>Reg Unit</td><td>Nomr</td><td>Nama Pasien</td><td>Nama Ruang</td><td>No Urut</td><td>Tanggal</td><td>Urut</td></tr>';
        foreach ($data as $d) {
            $urut = $this->db->query("SELECT max(no_urut_unit) as no_urut_unit FROM tbl02_pendaftaran WHERE date_format(tgl_masuk,'%Y-%m-%d')='".$d->tgl_masuk."' AND id_ruang = '".$d->id_ruang."' order by no_urut_unit desc limit 1")->row();
            if(empty($urut)) $no_urut= '0001'; else $no_urut=$urut->no_urut_unit;
            $no_urut_baru = intval($no_urut)+1;
            $x=explode("-",$d->reg_unit);
            $new_unit = $x[0] ."-" .$x[1]."-".$x[2]."-". str_pad($no_urut_baru, 4, "0", STR_PAD_LEFT);
            $this->db->query("UPDATE tbl02_pendaftaran SET reg_unit ='".$new_unit."',no_urut_unit='".$no_urut_baru."' WHERE idx='".$d->idx."'");
            echo '<tr><td>'.$d->reg_unit. '</td><td>' . $d->nomr . '</td><td>' . $d->nama_pasien . '</td><td>' . $d->nama_ruang . '</td><td>' . $d->no_urut . '</td><td>' . $d->tgl_masuk . '</td><td>' . $no_urut ." BARU :" .$new_unit .'</td></tr>';
        }
        echo '</table>';
    }
    function setcarabayar(){
        $SQL= "SELECT * FROM tbl02_pendaftaran WHERE id_cara_bayar=2 AND (id_jenis_peserta=2 OR id_jenis_peserta=jenis_peserta)";
        $data=$this->db->query("$SQL order by idx limit 50")->result();
        
        $jml=$this->db->query("$SQL GROUP BY nomr")->num_rows();
        echo '<table border="1">
        <tr><td colspan=8>'.$jml.'</td></tr>
        <tr><td>Reg Unit</td><td>Nomr</td><td>NIK</td><td>Nama Pasien</td><td>Nama Ruang</td><td>o BPJS</td><td>Cara Bayar</td><td>#</td></tr>';
        foreach ($data as $d ) {
            echo '<tr><td>' . $d->reg_unit . '</td><td>' . $d->no_ktp . '</td><td>'.$d->nomr.'</td><td>'.$d->nama_pasien. '</td><td>' . $d->nama_ruang . '</td><td>' . $d->no_bpjs . '</td><td>' . $d->cara_bayar . '</td>
            <td>
            <a href="'.base_url()."mr_registrasi.php/registrasi/updatejenis/".$d->id_daftar."/".$d->no_ktp. '">Update</a>|
            <a href="' . base_url() . "mr_registrasi.php/registrasi/updatejenisbynobpjs/" . $d->id_daftar . "/" . $d->no_bpjs . '">Update</a>
            </td>
            </tr>';
        }
        echo "</table>";
    }
    function updatejenis($id_daftar,$param1){
        $param2 = date('Y-m-d');
        $response = getPesertaByKartuNIK($param1, $param2);
        //header('Content-Type: application/json');
        //echo $response;exit;

        $res=json_decode($response);
        //echo "Data : ";
        $id_jenis_peserta= $res->response->peserta->jenisPeserta->kode;
        $jenis_peserta= $res->response->peserta->jenisPeserta->keterangan;
        $this->db->query("UPDATE tbl02_pendaftaran 
        SET id_jenis_peserta='$id_jenis_peserta',jenis_peserta='$jenis_peserta' 
        WHERE id_daftar='$id_daftar'");
        if($res->metaData->code==200){
            header('location:' . base_url() . "mr_registrasi.php/registrasi/setcarabayar");
        }else{
            echo $res->metaData->message;
        }
        
        //print_r($res['response']['peserta']['JenisPeserta']['kode']);

    }
    function updatejenisbynobpjs($id_daftar,$param1){
        $param2 = date('Y-m-d');
        $response = getPesertaByKartuBPJS($param1, $param2);
        //header('Content-Type: application/json');
        //echo $response;exit;

        $res = json_decode($response);
        //echo "Data : ";
        $id_jenis_peserta = $res->response->peserta->jenisPeserta->kode;
        $jenis_peserta = $res->response->peserta->jenisPeserta->keterangan;
        $this->db->query("UPDATE tbl02_pendaftaran 
        SET id_jenis_peserta='$id_jenis_peserta',jenis_peserta='$jenis_peserta' 
        WHERE id_daftar='$id_daftar'");
        if ($res->metaData->code == 200) {
            header('location:' . base_url() . "mr_registrasi.php/registrasi/setcarabayar");
        } else {
            echo $res->metaData->message;
        }
    }
    function datasep()
    {
        $json = '{"metaData":{"code":"200","message":"Sukses"},"response":{"sep":{"catatan":"-","diagnosa":"R04.2 - Haemoptysis","informasi":{"dinsos":null,"noSKTM":null,"prolanisPRB":null},"jnsPelayanan":"R.Jalan","kelasRawat":"-","noRujukan":null,"noSep":"0306R0010420V004006","penjamin":"-","peserta":{"asuransi":"-","hakKelas":"Kelas 3","jnsPeserta":"PBI (APBN)","kelamin":"Laki-Laki","nama":"YUSMAN EFFENDI","noKartu":"0000283809598","noMr":"023713","tglLahir":"1960-04-26"},"poli":"PARU","poliEksekutif":"Tidak","tglSep":"2020-04-29"}}}';
        $data = json_decode($json);
        echo $data->metaData->code;
        echo $data->response->sep->noSep;
        //print_r($data);


        //header('Content-Type: application/json');
        //echo $json;
    }
    function cetakGelang()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (isset($_GET['kode'])) {
                $kode = $_GET['kode'];
                $this->db->select('nomr,nama,tgl_lahir,jns_kelamin');
                $this->db->from('tbl01_pasien');
                $this->db->where('nomr', $kode);
                $cekQuery = $this->db->get();
                if ($cekQuery->num_rows() > 0) {
                    $resData = $cekQuery->row_array();
                    //print_r($resData);
                    $x['nomr'] = $resData['nomr'];
                    //echo $x["nomr"];
                    $x['nama'] = $resData['nama'];
                    $x['tgl_lahir'] = $resData['tgl_lahir'];
                    $x['jns_kelamin'] = $resData['jns_kelamin'];
                    $this->load->view('cetak/v_gelang', $x);
                } else {
                    echo "<script>alert('Ops. Data pasien tidak ditemukan. Silahkan coba kembali.');
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
    function cetakRegRajal()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (isset($_GET['kode'])) {
                $kode = encrypt_decrypt('decrypt', $_GET['kode'], true);
                $this->db->select('tbl02_pendaftaran.id_daftar,reg_unit,tgl_masuk,nomr,nama_pasien,jns_kelamin,tempat_lahir,tgl_lahir,id_ruang,nama_ruang,user_daftar,no_antrian_poly');
                $this->db->from('tbl02_pendaftaran');
                $this->db->join('tbl02_antrian', 'tbl02_antrian.id_daftar=tbl02_pendaftaran.id_daftar', 'LEFT');
                $this->db->where('tbl02_pendaftaran.reg_unit', $kode);
                $cekQuery = $this->db->get();
                if ($cekQuery->num_rows() > 0) {
                    $resData = $cekQuery->row_array();
                    $x['reg_unit'] = $resData['reg_unit'];
                    $x['nomr'] = $resData['nomr'];
                    $x['nama_pasien'] = $resData['nama_pasien'];
                    $x['jns_kelamin'] = $resData['jns_kelamin'];
                    $x['tgl_lahir'] = $resData['tgl_lahir'];
                    $x['nama_ruang'] = $resData['nama_ruang'];
                    $x['id_daftar'] = $resData['id_daftar'];
                    $x['tgl_masuk'] = $resData['tgl_masuk'];
                    $x['no_antrian_poly'] = $resData['no_antrian_poly'];
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
    function cetakSuratRegRajal()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (isset($_GET['kode'])) {
                $kode = encrypt_decrypt('decrypt', $_GET['kode'], true);
                $this->db->select('id_daftar,reg_unit,tgl_masuk,nomr,nama_pasien,jns_kelamin,tempat_lahir,tgl_lahir,id_ruang,nama_ruang,user_daftar,asal_ruang,nama_asal_ruang,ckir,no_rujuk,cara_bayar');
                $this->db->from('tbl02_pendaftaran');
                $this->db->where('reg_unit', $kode);
                $cekQuery = $this->db->get();
                if ($cekQuery->num_rows() > 0) {
                    $resData = $cekQuery->row_array();
                    $x['reg_unit'] = $resData['reg_unit'];
                    $x['id_daftar'] = $resData['id_daftar'];
                    $x['ckir'] = $resData['ckir'];
                    $x['nomr'] = $resData['nomr'];
                    $x['nama'] = $resData['nama_pasien'];
                    $x['jns_kelamin'] = $resData['jns_kelamin'];
                    $x['tgl_lahir'] = $resData['tgl_lahir'];
                    $x['ruang'] = $resData['nama_ruang'];
                    $x['id_daftar'] = $resData['id_daftar'];
                    $x['asal_ruang'] = $resData['asal_ruang'];
                    $x['nama_asal_ruang'] = $resData['nama_asal_ruang'];
                    $x['tgl_masuk'] = $resData['tgl_masuk'];
                    $x['no_rujuk'] = $resData['no_rujuk'];
                    $x['cara_bayar'] = $resData['cara_bayar'];
                    $x['user_daftar'] = getNamaUserByID($resData['user_daftar']);
                    $x['antrian']= $this->db->where('id_daftar',$resData['id_daftar'])->get('tbl02_antrian')->row_array();
                    $this->load->view('cetak/v_printregistrasijalan', $x);
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
    function cetakSuratMasukRajal()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (isset($_GET['kode'])) {
                $kode = $_GET['kode'];
                $SQL_SMRJ = "SELECT b.nomr,b.id_daftar,a.nama,a.tempat_lahir,a.tgl_lahir,a.jns_kelamin,agama,
                a.pekerjaan,a.no_ktp,a.no_telpon,a.alamat,nama_negara,b.tgl_masuk AS tgl_reg,a.no_bpjs,rujukan,
                b.nama_provinsi,b.nama_kab_kota,b.nama_kecamatan,b.nama_kelurahan,pjPasienNama,pjPasienUmur,pjPasienPekerjaan,
                pjPasienAlamat,pjPasienTelp,pjPasienHubKel,pjPasienDikirimOleh,pjPasienAlmtPengirim,
                dokterJaga,namaDokterJaga,TIME(b.tgl_masuk) AS JAM
                FROM tbl02_pendaftaran b LEFT JOIN tbl01_pasien a ON a.nomr=b.nomr
                WHERE b.reg_unit='$kode'";

                $cekQuery = $this->db->query("$SQL_SMRJ");
                if ($cekQuery->num_rows() > 0) {
                    $resData['data'] = $cekQuery->row_array();
                    $this->load->view('cetak/v_suratmasukrj', $resData);
                } else {
                    echo "<script>alert('Ops. Data pendaftaran pasien tidak ditemukan. Silahkan coba kembali.');
                    window.close();</script>";
                }
            } else {
                echo "<script>alert('Ops. Variable tidak ditemukan. Silahkan coba kembali.');
                window.close();</script>";
            }
        } else {
            echo "<script>alert('Ops. Method tidak ditemukan. Silahkan coba kembali.');
            window.close();</script>";
        }
    }

    /***
    Registrasi Rawat Inap
     */

    public function rawat_inap()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $y['index_menu'] = 4;
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_4");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

            $y['contentTitle'] = "Registrasi pasien rawat inap";
            $x['content'] = $this->load->view('registrasi/template_cari_pasien_ranap', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'mr_registrasi.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    public function cari_pasien_rajal()
    {
        $mode = trim($this->input->post('rbnomor', true));
        $nomor = trim($this->input->post('txtNokartu', true));

        $condition = 'WHERE jns_layanan NOT IN ("RI") 
        AND reg_unit NOT IN(SELECT reg_unit FROM tbl02_pendaftaran_batal) ';

        if ($mode == 'nomr') {
            $condition .= "AND nomr = '$nomor'";
        } elseif ($mode == 'noregrs') {
            $condition .= "AND id_daftar = '$nomor'";
        } else {
            $condition .= "AND reg_unit = '$nomor'";
        }
        //$sekarang=date('Y-m-d');
        $SQL = "SELECT * FROM tbl02_pendaftaran $condition AND (jns_layanan='RJ' OR jns_layanan='GD')  ORDER BY idx DESC LIMIT 10";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('registrasi/getdata', $x);
    }

    public function daftar_rawat_inap()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_4");
            

            $reg_unit = $_GET['uid'];
            

            // $SQL_CEREG = "SELECT idx,id_daftar,reg_unit,nomr,no_ktp,nama_pasien,tempat_lahir,tgl_masuk,
            // tgl_lahir,jns_kelamin,no_bpjs,nama_provinsi, nama_kab_kota,nama_kecamatan,nama_kelurahan,
            // tgl_daftar,id_cara_bayar,cara_bayar,id_ruang,nama_ruang,dokterJaga,namaDokterJaga,jns_layanan,
            // pjPasienNama,pjPasienUmur,pjPasienPekerjaan,pjPasienAlamat,pjPasienTelp,pjPasienHubKel,no_jaminan,
            // pjPasienDikirimOleh,pjPasienAlmtPengirim,kelas_layanan,icdkode,icd FROM tbl02_pendaftaran WHERE reg_unit = '$reg_unit' 
            // AND reg_unit NOT IN(SELECT reg_unit FROM tbl02_pendaftaran_batal)";
            $SQL_CEREG = "SELECT * FROM tbl02_pendaftaran WHERE reg_unit = '$reg_unit' 
            AND reg_unit NOT IN(SELECT reg_unit FROM tbl02_pendaftaran_batal)";
            $cekNum = $this->db->query("$SQL_CEREG");
            if ($cekNum->num_rows() > 0) {
                $y = $cekNum->row_array();
                // print_r($y);exit;
                $y['index_menu'] = 4;
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
                $y['contentTitle'] = "Registrasi pasien rawat inap";
                // Cek Reservasi
                $y['getDokter']= $this->db->select("jadwal_dokter_id as NRP, jadwal_dokter_nama as pgwNama")
                    ->where('jadwal_poly_id',$y['id_ruang'])
                    ->group_by('jadwal_dokter_id')
                    ->get('tbl02_jadwal_dokter');
                $this->db->select('idx');
                $this->db->where('no_rujuk',$reg_unit);
                $this->db->where("reg_unit NOT IN (SELECT b.reg_unit from tbl02_pendaftaran_batal b)");
                $y['reservasi']=$this->db->get('tbl02_pendaftaran')->num_rows();
                
                //Data Referensi
                $this->db->where('grid', '2');
                $this->db->where('status_ruang', 1);
                $this->db->order_by('ruang', 'ASC');
                $y['getRuang'] = $this->db->get('tbl01_ruang');

                $this->db->where_in('profId', array('2'));
                $y['getDokterjaga'] = $this->db->get('tbl01_pegawai');

                $this->db->where_in('jenis_status', array('1'));
                $y['getJenis'] = $this->db->get('tbl01_jenisruang');

                $y['getKelas'] = $this->db->get('tbl01_kelas_layanan');

                $this->db->from('tbl02_pendaftaran');
                $this->db->where('nomr', $y['nomr']);
                $this->db->order_by('tgl_masuk', 'desc');
                $this->db->limit(10);
                $y['getHistory'] = $this->db->get();

                /*
                Cek Status Kepulangan pasien Rawat inap
                */
                // $this->db->select("a.nomr,a.id_daftar,a.reg_unit,b.idx,b.jns_layanan,a.nama_ruang");
                // $this->db->join("tbl02_pasien_pulang b","a.id_daftar = b.id_daftar AND a.jns_layanan=b.jns_layanan","LEFT");
                // $this->db->where('a.jns_layanan','RI');
                // $this->db->where('a.nomr',$y['nomr']);
                // $this->db->where('a.tgl_masuk > ',_TGL_LOUNCHING);
                // $this->db->where('a.reg_unit NOT IN (SELECT c.reg_unit FROM tbl02_pendaftaran_batal c)');
                // $this->db->order_by('a.id_daftar', 'DESC');
                // $this->db->limit(1);
                // $pulang=$this->db->get('tbl02_pendaftaran a')->row();
                // if(empty($pulang)){
                //     $y['ranap'] = 0;
                //     $y["ruangranap"]='';
                // }else{
                //     if (empty($pulang->idx)) {
                //         $y["ranap"] = 1;
                //         $y["ruangranap"]=$pulang->nama_ruang;
                //     }
                //     else {
                //         $y['ranap'] = 0;
                //         $y["ruangranap"]='';
                //     }
                // }
                $y['ranap'] = 0;
                $y["ruangranap"]='';
                $y['getCaraBayar'] = $this->db->get('tbl01_cara_bayar');
                
                //Cek Laporan SIrs
                // $this->db->where('reg_unit', $resArr['reg_unit']);
                // $report_sirs = $this->db->get('tbl07_report_sirs')->row();
                // if(empty($report_sirs)){
                //     $this->db->where_in('profId', array('1', '2'));
                //     $y['getDokter']         = $this->db->get('tbl01_pegawai');
                //     $y['getCaraKeluar']     = $this->db->get('tbl01_cara_keluar');
                //     $y['getKeadaanKeluar']  = $this->db->get('tbl01_keadaan_keluar');
                //     $y['getJenisPelayanan'] = $this->db->get('tbl01_jenis_pelayanan');
                //     $y["form_admisi"]       = $this->load->view('registrasi/template_pasien_keluar',$y,true);
                //     $r['ruangID'] = $resArr['id_ruang'];
                //     $y["js_lib"]    = $this->load->view('registrasi/js_pulang',$r,true);
                // }else{
                //     $y["form_admisi"] = $this->load->view('registrasi/template_registrasi_ranap', $y, true);
                //     $y["js_lib"]    = $this->load->view('registrasi/js_ranap', '', true);
                // }
                $y["form_admisi"] = $this->load->view('registrasi/template_registrasi_ranap', $y, true);
                $y["js_lib"]    = $this->load->view('registrasi/js_ranap', '', true);
                $x['libjs']=array(
                    'js/pendaftaran.js'
                );
                $x['content'] = $this->load->view('registrasi/template_ranap', $y, true);
                $this->load->view('template/theme', $x);
            } else {
                // $y['id_daftar'] = "";
                // $y['reg_unit'] = "";
                // $y['nomr'] = "";

                // $y['no_ktp'] = '';
                // $y['nama_pasien'] = '';
                // $y['tempat_lahir'] = "";
                // $y['tgl_lahir'] = "";
                // $y['jns_kelamin'] = "";
                // $y['no_bpjs'] = "";

                // $y['id_cara_bayar'] = "";
                // $y['cara_bayar'] = "";
                // $y['id_ruang'] = "";
                // $y['nama_asal_ruang'] = "";
                // $y['dokterJaga'] = "";
                // $y['namaDokterJaga'] = "";

                // $y['pjPasienNama'] = "";
                // $y['pjPasienUmur'] = "";
                // $y['pjPasienPekerjaan'] = "";
                // $y['pjPasienAlamat'] = "";
                // $y['pjPasienTelp'] = "";
                // $y['pjPasienHubKel'] = "";
                // $y['pjPasienDikirimOleh'] = "";
                // $y['pjPasienAlmtPengirim'] = "";
                // $y['tgl_daftar'] = "";
                $y['contentTitle'] = "Pasien tidak ditemukan";
                $y['index_menu'] = 4;
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
                $x['content'] = $this->load->view('registrasi/template_pasien_kosong', $y, true);
                $this->load->view('template/theme', $x);
            }
            //echo $y["id_cara_bayar"];exit;
            
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'mr_registrasi.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function simpan_informasi_pulang()
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
                    isset($_POST['kode_icd']) &&
                    isset($_POST['icd']) &&
                    isset($_POST['dtd']) &&
                    isset($_POST['grup_icd']) &&
                    isset($_POST['morbiditas']) &&
                    isset($_POST['kecelakaan']) &&
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
                        'tgl_masuk' => $this->input->post('tgl_masuk', TRUE),
                        'tgl_keluar' => $this->input->post('tgl_keluar', TRUE),
                        'id_cara_keluar' => $this->input->post('id_cara_keluar', TRUE),
                        'cara_keluar' => $this->input->post('cara_keluar', TRUE),
                        'dpjp' => $this->input->post('dpjp', TRUE),
                        'nama_dpjp' => $this->input->post('nama_dpjp', TRUE),
                        'id_keadaan_keluar' => $this->input->post('id_keadaan_keluar', TRUE),
                        'keadaan_keluar' => $this->input->post('keadaan_keluar', TRUE),
                        'kode_icd' => $this->input->post('kode_icd', TRUE),
                        'icd' => $this->input->post('icd', TRUE),
                        'dtd' => $this->input->post('dtd', TRUE),
                        'grup_icd' => $this->input->post('grup_icd', TRUE),
                        'morbiditas' => $this->input->post('morbiditas', TRUE),
                        'kecelakaan' => $this->input->post('kecelakaan', TRUE),
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
                        //Cek Pasien Pulang
                        $this->db->where('reg_unit', $params['reg_unit']);
                        $pul = $this->db->get('tbl02_pasien_pulang')->row();
                        if (empty($pul)) {
                            //Jika Pasien Belum Di Pulangkan/ Maka Insert Ke Data Pasien Pulang
                            $pulang = array(
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
                                'tgl_masuk' => $this->input->post('tgl_masuk', TRUE),
                                'tgl_keluar' => $this->input->post('tgl_keluar', TRUE),
                                'id_cara_keluar' => $this->input->post('id_cara_keluar', TRUE),
                                'cara_keluar' => $this->input->post('cara_keluar', TRUE),
                                'dpjp' => $this->input->post('dpjp', TRUE),
                                'nama_dpjp' => $this->input->post('nama_dpjp', TRUE),
                                'id_keadaan_keluar' => $this->input->post(
                                    'id_keadaan_keluar',
                                    TRUE
                                ),
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
                            $this->db->insert('tbl02_pasien_pulang', $pulang);
                        }
                        //exit;
                        $cekCommand = $this->db->insert('tbl07_report_sirs', $params);
                        //Input Data ICD Diagnosa Sekunder
                        $icd_sec = $this->input->post('icd_sec');
                        $diagnosa[] = array(
                            'id_daftar' => $params['id_daftar'],
                            'reg_unit'  => $params['reg_unit'],
                            'kode_icd'  => $this->input->post('kode_icd', TRUE),
                            'icd'       => $this->input->post('icd', TRUE),
                            'jenis_diagnosa' => 'Primer'
                        );
                        $ada = $this->input->post('ada');
                        if(!$ada){
                            $new_icd[]=array(
                                'kode_icd'  => $this->input->post('kode_icd', TRUE),
                                'icd'       => $this->input->post('icd', TRUE)
                            );
                        }
                        if(!empty($icd_sec)){
                            foreach ($icd_sec as $icd) {
                                $diagnosa[] = array(
                                    'id_daftar' => $params['id_daftar'],
                                    'reg_unit'  => $params['reg_unit'],
                                    'kode_icd'  => $icd["kode"],
                                    'icd'       => $icd["icd"],
                                    'jenis_diagnosa' => 'Sekunder'
                                );
                                if (!$icd["ada"]) {
                                    $new_icd[] = array(
                                        'kode_icd'  => $icd["kode"],
                                        'icd'       => $icd["icd"]
                                    );
                                }
                            }
                        }
                        
                        if(!empty($diagnosa)) $this->db->insert_batch('tbl07_report_sirs_diagnosa', $diagnosa);
                        if(!empty($new_icd)) $this->db->insert_batch('tbl01_icd',$new_icd);
                        
                        if ($cekCommand) {
                            $response['code'] = 200;
                            $response['message'] = "Data pasien keluar sukses disimpan.";
                        } else {
                            $response['code'] = 402;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                } else {
                    $response['code'] = 403;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 404;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 405;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
    function daftar_ranap()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['id_daftar']) &&
                    isset($_POST['reg_unit']) &&
                    isset($_POST['nomr']) &&
                    isset($_POST['no_ktp']) &&
                    isset($_POST['nama_pasien']) &&
                    isset($_POST['tempat_lahir']) &&
                    isset($_POST['tgl_lahir']) &&
                    isset($_POST['jns_kelamin']) &&
                    isset($_POST['asal_ruang']) &&
                    isset($_POST['nama_asal_ruang']) &&
                    isset($_POST['jns_layanan']) &&
                    isset($_POST['pjPasienNama']) &&
                    isset($_POST['pjPasienUmur']) &&
                    isset($_POST['pjPasienPekerjaan']) &&
                    isset($_POST['pjPasienAlamat']) &&
                    isset($_POST['pjPasienTelp']) &&
                    isset($_POST['pjPasienHubKel']) &&
                    isset($_POST['pjPasienDikirimOleh']) &&
                    isset($_POST['pjPasienAlmtPengirim']) &&
                    isset($_POST['dokter_pengirim']) &&
                    isset($_POST['nama_dokter_pengirim']) &&
                    isset($_POST['dokterJaga']) &&
                    isset($_POST['namaDokterJaga']) &&
                    isset($_POST['id_ruang']) &&
                    isset($_POST['nama_ruang']) &&
                    isset($_POST['id_kelas']) &&
                    isset($_POST['kelas_layanan']) &&
                    isset($_POST['id_cara_bayar']) &&
                    isset($_POST['cara_bayar']) &&
                    isset($_POST['id_jenis_peserta']) &&
                    isset($_POST['jenis_peserta']) &&
                    isset($_POST['no_bpjs']) &&
                    isset($_POST['no_jaminan'])
                ) {
                    $idcb = trim($this->input->post('id_cara_bayar'));
                    //$id_jenis_peserta =  trim($this->input->post('id_jenis_peserta', TRUE));
                    if ($idcb == 2) {
                        //Jika Pasien PBPJS
                        $id_jenis= trim($this->input->post('id_jenis_peserta', TRUE));
                        $jenis_peserta= trim($this->input->post('jenis_peserta', TRUE));
                    } else {
                        $id_jenis=$idcb;
                        $jenis_peserta= trim($this->input->post('cara_bayar', TRUE));
                        //$params['id_jenis_peserta'] = $idcb . "." . trim($this->input->post('id_cara_bayar', TRUE));
                        //$params['jenis_peserta'] =  trim($this->input->post('cara_bayar', TRUE));
                    }
                    $params['id_jenis_peserta'] = $idcb . "." . $id_jenis;
                    $params['jenis_peserta'] = $jenis_peserta;
                    
                    $params['id_daftar'] = trim($this->input->post('id_daftar', TRUE));
                      
                     
                    $params['nomr'] = trim($this->input->post('nomr', TRUE));
                    $params['no_ktp'] = trim($this->input->post('no_ktp', TRUE));
                    $params['nama_pasien'] = trim($this->input->post('nama_pasien', TRUE));
                    $params['tempat_lahir'] = trim($this->input->post('tempat_lahir', TRUE));
                    $params['tgl_lahir'] = trim($this->input->post('tgl_lahir', TRUE));
                    $params['jns_kelamin'] = trim($this->input->post('jns_kelamin', TRUE));
                    $params['nama_provinsi'] = trim($this->input->post('nama_provinsi', TRUE));
                    $params['nama_kab_kota'] = trim($this->input->post('nama_kab_kota', TRUE));
                    $params['nama_kecamatan'] = trim($this->input->post('nama_kecamatan', TRUE));
                    $params['nama_kelurahan'] = trim($this->input->post('nama_kelurahan', TRUE));

                    $params['provinsi_id'] = trim($this->input->post('id_provinsi', TRUE));
                    $params['kabkota_id'] = trim($this->input->post('id_kab_kota', TRUE));
                    $params['kecamatan_id'] = trim($this->input->post('id_kecamatan', TRUE));
                    $params['kelurahan_id'] = trim($this->input->post('id_kelurahan', TRUE));
                    $params['rt'] = trim($this->input->post('rt', TRUE));
                    $params['alamat'] = trim($this->input->post('alamat', TRUE));
                    $params['rw'] = trim($this->input->post('rw', TRUE));
                    $params['kodepos'] = trim($this->input->post('kodepos', TRUE));
                    $params['provinsi_id_domisili'] = trim($this->input->post('id_provinsi_domisili', TRUE));
                    $params['kabkota_id_domisili'] = trim($this->input->post('id_kab_kota_domisili', TRUE));
                    $params['kecamatan_id_domisili'] = trim($this->input->post('id_kecamatan_domisili', TRUE));
                    $params['kelurahan_id_domisili'] = trim($this->input->post('id_kelurahan_domisili', TRUE));
                    $params['nama_provinsi_domisili'] = trim($this->input->post('nama_provinsi_domisili', TRUE));
                    $params['nama_kab_kota_domisili'] = trim($this->input->post('nama_kab_kota_domisili', TRUE));
                    $params['nama_kecamatan_domisili'] = trim($this->input->post('nama_kecamatan_domisili', TRUE));
                    $params['nama_kelurahan_domisili'] = trim($this->input->post('nama_kelurahan_domisili', TRUE));
                    $params['rt_domisili'] = trim($this->input->post('rt_domisili', TRUE));
                    $params['rw_domisili'] = trim($this->input->post('rw_domisili', TRUE));
                    $params['alamat_domisili'] = trim($this->input->post('alamat_domisili', TRUE));
                    $params['kodepos_domisili'] = trim($this->input->post('kodepos_domisili', TRUE));
                    $params['c19'] = !empty($this->input->post('c19')) ? "1" : "0";
                    $params['icdkode']=$this->input->post('icdkode');
                    $params['icd']=$this->input->post('icd');

                    $params['asal_ruang'] = trim($this->input->post('asal_ruang', TRUE));
                    $params['nama_asal_ruang'] = trim($this->input->post('nama_asal_ruang', TRUE));

                    $params['jns_layanan'] = trim($this->input->post('jns_layanan', TRUE));
                    $params['id_rujuk'] = 8;
                    $params['rujukan'] = 'RAWAT INAP';
                    $params['no_rujuk'] = trim($this->input->post('reg_unit', TRUE));

                    $params['pjPasienNama'] = trim($this->input->post('pjPasienNama', TRUE));
                    $params['pjPasienUmur'] = trim($this->input->post('pjPasienUmur', TRUE));
                    $params['pjPasienPekerjaan'] = trim($this->input->post('pjPasienPekerjaan', TRUE));
                    $params['pjPasienAlamat'] = trim($this->input->post('pjPasienAlamat', TRUE));
                    $params['pjPasienTelp'] = trim($this->input->post('pjPasienTelp', TRUE));
                    $params['pjPasienHubKel'] = trim($this->input->post('pjPasienHubKel', TRUE));
                    $params['pjPasienDikirimOleh'] = trim($this->input->post('pjPasienDikirimOleh', TRUE));
                    $params['pjPasienAlmtPengirim'] = trim($this->input->post('pjPasienAlmtPengirim', TRUE));

                    $params['dokter_pengirim'] = trim($this->input->post('dokter_pengirim', TRUE));
                    $params['nama_dokter_pengirim'] = trim($this->input->post('nama_dokter_pengirim', TRUE));
                    $params['dokterJaga'] = trim($this->input->post('dokterJaga', TRUE));
                    $params['namaDokterJaga'] = trim($this->input->post('namaDokterJaga', TRUE));

                    $params['id_ruang'] = trim($this->input->post('id_ruang', TRUE));
                    $params['nama_ruang'] = trim($this->input->post('nama_ruang', TRUE));
                    $params['id_kamar'] = trim($this->input->post('id_kamar', TRUE));
                    $params['nama_kamar'] = trim($this->input->post('nama_kamar', TRUE));

                    $params['id_kelas'] = trim($this->input->post('id_kelas', TRUE));
                    $params['kelas_layanan'] = trim($this->input->post('kelas_layanan', TRUE));

                    $params['id_cara_bayar'] = trim($this->input->post('id_cara_bayar', TRUE));
                    $params['cara_bayar'] = trim($this->input->post('cara_bayar', TRUE));
                    $params['no_bpjs'] = trim($this->input->post('no_bpjs', TRUE));
                    $params['tgl_daftar'] = trim($this->input->post('tgl_daftar', TRUE));
                    $params['no_jaminan'] = trim($this->input->post('no_jaminan', TRUE));
                    $params['tgl_jaminan'] = trim($this->input->post('tgl_jaminan', TRUE));
                    $params['hakKelasid'] = trim($this->input->post('hakKelasid', TRUE));
                    $params['hakKelas'] = trim($this->input->post('hakKelas', TRUE));
                    $params['user_daftar'] = $this->session->userdata('get_uid');
                    $params['session_id'] = getSessionID();
                    // Tambahan RSAM
                    $params['id_admisi'] = $this->pendaftaran_model->get_daftarranap();
                    $params['id_ruanglama']=getField('koderuanglama',array('idx'=>trim($this->input->post('id_ruang',TRUE))),'tbl01_ruang');
                    $params['asal_ruang_lama']=getField('koderuanglama',array('idx'=>trim($this->input->post('asal_ruang',TRUE))),'tbl01_ruang');
                    $params['dokter_pengirim_lama']=getField('iddokter',array('NRP'=>trim($this->input->post('dokter_pengirim',TRUE))),'tbl01_pegawai');
                    $params['dokterJaga_lama']=getField('iddokter',array('NRP'=>trim($this->input->post('dokterJaga',TRUE))),'tbl01_pegawai');

                    if ($params['nomr'] == "" || $params['id_daftar'] == "") {
                        $response['code'] = 501;
                        $response['message'] = "Ops. No.MR atau No Registrasi RS tidak boleh kosong!";
                    }else {
                        $this->db->where('nomr', $_POST['nomr']);
                        $cekQuery = $this->db->get('tbl01_pasien');
                        if ($cekQuery->num_rows() > 0) {
                            $SQL_CEREG = "SELECT * FROM tbl02_pendaftaran WHERE nomr = '$_POST[nomr]' 
                            AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') 
                            AND id_ruang = '$params[id_ruang]' AND reg_unit NOT IN(SELECT reg_unit FROM tbl02_pendaftaran_batal)";
                            $cekRegis = $this->db->query("$SQL_CEREG");

                            if ($cekRegis->num_rows() > 0) {
                                $response['code'] = 501;
                                $response['message'] = "Ops. Pasien telah terdaftar dengan tujuan layanan, pada hari yang sama!\nSilahkan periksa kembali tujuan layanan anda.";
                            } else {
                                //Insert ke tabel pendaftaran
                                $cekCommand = $this->db->insert('tbl02_pendaftaran', $params);
                                $insertid=$this->db->insert_id();
                                //Update Status
                                // $reg_unit = trim($this->input->post('reg_unit', TRUE));
                                // $status=array('status_pasien'=>2);
                                // $this->pendaftaran_model->updatePendaftaran($status,$reg_unit);
                                if ($cekCommand) {
                                    
                                    $this->db->from('tbl02_pendaftaran');
                                    $this->db->where('idx', $insertid);
                                    $cekQuery = $this->db->get();
                                    if ($cekQuery->num_rows() > 0) {
                                        $resData = $cekQuery->row_array();
                                        $response['code'] = 200;
                                        $response['message'] = "Simpan data sukses.";
                                        $response['unikID'] = encrypt_decrypt('encrypt', $resData['reg_unit'], true);
                                    } else {
                                        $response['code'] = 202;
                                        $response['message'] = "Simpan data sukses namun cookies telah dihapus.";
                                        $response['unikID'] = null;
                                    }
                                } else {
                                    $response['code'] = 501;
                                    $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                                }
                            }
                        } else {
                            $response['code'] = 402;
                            $response['message'] = "Data pasien tidak ditemukan.";
                        }
                    }
                } else {
                    $response['code'] = 401;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

    function cekRegUnitRanap()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['regUnitRajal'])) {
                    if ($_POST['regUnitRajal'] == "") {
                        $response['code'] = 501;
                        $response['message'] = "Ops. No registrasi unit rawat inap tidak boleh kosong!";
                    } else {
                        $this->db->where('reg_unit', $_POST['regUnitRajal']);
                        $this->db->where('jns_layanan', 'RI');
                        $cekQuery = $this->db->get('tbl02_pendaftaran');
                        if ($cekQuery->num_rows() > 0) {
                            $response['code'] = 200;
                            $response['message'] = "";
                            $response['unikID'] = encrypt_decrypt('encrypt', $_POST['regUnitRajal'], true);
                        } else {
                            $response['code'] = 402;
                            $response['message'] = "Data registrasi unit rawat inap tidak ditemukan.";
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
    function reg_success_ranap()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            

            $reg_unit = encrypt_decrypt('decrypt', $_GET['uid'], true);

            $this->db->where('reg_unit', $reg_unit);
            $cekBatal = $this->db->get('tbl02_pendaftaran_batal');

            

            if ($cekBatal->num_rows() > 0) {
                $url_reg = base_url() . 'mr_registrasi.php/registrasi/rawat_inap';
                echo "<script>alert('Ops. Anda tidak bisa membuka registrasi ini. Registrasi ini telah dibatalkan');
                window.location.href = '$url_reg';</script>";
            } else{
                $this->db->select('`idx`,`id_daftar`,`id_admisi`,`reg_unit`,`nomr`,
                `no_ktp`,`nama_pasien`,`tempat_lahir`,`tgl_lahir`,`jns_kelamin`,
                `id_ruang`,`nama_ruang`,`id_cara_bayar`,`cara_bayar`,`no_bpjs`,tgl_masuk,
                `no_jaminan`,`id_rujuk`,`rujukan`,jns_layanan,tgl_jaminan,kelas_layanan,dokterJaga');
                $this->db->where('reg_unit', $reg_unit);
                $cekPendaftaran = $this->db->get('tbl02_pendaftaran');
                if (!$cekPendaftaran->num_rows() > 0) {
                    $url_reg = base_url() . 'mr_registrasi.php/registrasi/rawat_inap';
                    echo "<script>alert('Ops. Data tidak ditemukan. periksa kembali data anda');
                    window.location.href = '$url_reg';</script>";
                } else {
    
                    $y = $cekPendaftaran->row_array();
                    $y['rujukanonline']=$this->pendaftaran_model->getRujukanOnline($y['reg_unit']);
                        
                    $this->db->where('idx', $y['id_cara_bayar']);
                    $cb = $this->db->get('tbl01_cara_bayar')->row();
                    if (empty($cb)) $y["jkn"] = 0;
                    else $y["jkn"] = $cb->jkn;
                    
                    $y['dokter']= $this->db->select("jadwal_dokter_id as NRP, jadwal_dokter_nama as pgwNama")
                    ->group_by('jadwal_dokter_id')
                    ->get('tbl02_jadwal_dokter')->result();

                    $this->db->where('grid', '2');
                    $this->db->where('status_ruang', 1);
                    $this->db->order_by('ruang', 'ASC');
                    $y['poli'] = $this->db->get('tbl01_ruang')->result();
                    
                    $x['header'] = $this->load->view('template/header', '', true);
                    $z = setNav("nav_4");
                    $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
                    $y['contentTitle'] = "Pendaftaran Pasien Rawat Inap";
                    $x['libjs']=array(
                        'js/pendaftaran.js',
                        'js/jspdf.js',
                        'js/cetaksep.js'
                    );
                    $x['content'] = $this->load->view('registrasi/template_daftar_ranap_sukses', $y, true);
                    $this->load->view('template/theme', $x);
                }
            }
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'mr_registrasi.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function cetakRegRanap()
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
                    $x['nama_pasien'] = $resData['nama_pasien'];
                    $x['jns_kelamin'] = $resData['jns_kelamin'];
                    $x['tgl_lahir'] = $resData['tgl_lahir'];
                    $x['nama_ruang'] = $resData['nama_ruang'];
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
    function cetakSuratRegRanap()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (isset($_GET['kode'])) {
                $kode = $_GET['kode'];
                $SQL_SREG_RI = "SELECT b.nomr,b.id_daftar,b.reg_unit,b.nama_pasien,b.tempat_lahir,b.tgl_lahir,b.jns_kelamin,
                a.agama,a.pekerjaan,b.no_ktp,no_telpon,a.alamat,nama_ruang,nama_asal_ruang,nama_negara,
                b.tgl_masuk AS tgl_reg,a.no_bpjs,rujukan,cara_bayar,tgl_masuk,kewarganegaraan,user_daftar,
                a.nama_provinsi,a.nama_kab_kota,a.nama_kecamatan,a.nama_kelurahan,pjPasienNama,pjPasienUmur,pjPasienPekerjaan,
                pjPasienAlamat,pjPasienTelp,pjPasienHubKel,pjPasienDikirimOleh,pjPasienAlmtPengirim,
                dokterJaga,namaDokterJaga,TIME(b.tgl_masuk) AS JAM
                FROM tbl02_pendaftaran b LEFT JOIN tbl01_pasien a on b.nomr = a.nomr
                WHERE b.reg_unit='$kode'";

                $cekQuery = $this->db->query("$SQL_SREG_RI");
                if ($cekQuery->num_rows() > 0) {
                    $resData = $cekQuery->row_array();
                    $x['id_daftar'] = $resData['id_daftar'];
                    $x['reg_unit'] = $resData['reg_unit'];
                    $x['nomr'] = $resData['nomr'];
                    $x['nama_pasien'] = $resData['nama_pasien'];
                    $x['jns_kelamin'] = $resData['jns_kelamin'];
                    $x['tempat_lahir'] = $resData['tempat_lahir'];
                    $x['tgl_lahir'] = $resData['tgl_lahir'];
                    $x['ruang'] = $resData['nama_ruang'];
                    $x['asal_poli'] = $resData['nama_asal_ruang'];
                    $x['cara_bayar'] = $resData['cara_bayar'];
                    $x['tgl_masuk'] = $resData['tgl_masuk'];
                    $x['kewarganegaraan'] = $resData['kewarganegaraan'];
                    $x['nama_negara'] = $resData['nama_negara'];
                    $x['pjPasienNama'] = $resData['pjPasienNama'];
                    $x['pjPasienTelp'] = $resData['pjPasienTelp'];
                    $x['alamat'] = $resData['alamat'];
                    $x['nama_provinsi'] = $resData['nama_provinsi'];
                    $x['nama_kab_kota'] = $resData['nama_kab_kota'];
                    $x['nama_kecamatan'] = $resData['nama_kecamatan'];
                    $x['nama_kelurahan'] = $resData['nama_kelurahan'];
                    $x['user_daftar'] = getNamaUserByID($resData['user_daftar']);
                    $this->load->view('cetak/v_printregistrasiinap', $x);
                } else {
                    echo "<script>alert('Ops. Data pendaftaran pasien tidak ditemukan. Silahkan coba kembali.');
                    window.close();</script>";
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
    function cetakSuratMasukRanap()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (isset($_GET['kode'])) {
                $kode = $_GET['kode'];

                $SQL_SMRI = "SELECT a.nomr,b.id_daftar,b.reg_unit,a.nama,a.tempat_lahir,a.tgl_lahir,a.jns_kelamin,
                agama,a.pekerjaan,a.no_ktp,no_telpon,a.alamat,nama_ruang,nama_asal_ruang,nama_negara,jns_layanan,
                b.tgl_masuk AS tgl_reg,a.no_bpjs,rujukan,cara_bayar,tgl_masuk,kewarganegaraan,user_daftar,
                b.nama_provinsi,b.nama_kab_kota,b.nama_kecamatan,b.nama_kelurahan,pjPasienNama,pjPasienUmur,pjPasienPekerjaan,
                pjPasienAlamat,pjPasienTelp,pjPasienHubKel,pjPasienDikirimOleh,pjPasienAlmtPengirim,nama_dokter_pengirim,
                TIME(b.tgl_masuk) AS JAM
                FROM tbl02_pendaftaran b LEFT JOIN tbl01_pasien a ON a.nomr=b.nomr
                WHERE b.reg_unit='$kode'";

                $cekQuery = $this->db->query("$SQL_SMRI");
                if ($cekQuery->num_rows() > 0) {
                    $resData['data'] = $cekQuery->row_array();
                    $this->load->view('cetak/v_suratmasukinap', $resData);
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

    // Pendaftaran Batal
    function  simpan_batal_daftar()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['id_daftar']) &&
                    isset($_POST['reg_unit']) &&
                    isset($_POST['alasan'])
                ) {
                    $params = array(
                        'id_daftar' => trim($this->input->post('id_daftar', true)),
                        'reg_unit' => trim($this->input->post('reg_unit', true)),
                        'alasan' => trim($this->input->post('alasan', true)),
                        'user_id' => $this->session->userdata('get_uid')
                    );
                    $reg_unit = trim($this->input->post('reg_unit', TRUE));
                    $status = array('status_pasien' => 6);
                    $this->pendaftaran_model->updatePendaftaran($status, $reg_unit);

                    if ($params['id_daftar'] == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. No Registrasi RS tidak boleh kosong";
                    } elseif ($params['reg_unit'] == "") {
                        $response['code'] = 402;
                        $response['message'] = "Ops. No Registrasi Unit tidak boleh kosong";
                    } elseif ($params['alasan'] == "") {
                        $response['code'] = 403;
                        $response['message'] = "Ops. Alasan pembatalan tidak boleh kosong";
                    } else {
                        $this->db->where('id_daftar', $params['id_daftar']);
                        $this->db->where('reg_unit', $params['reg_unit']);
                        $cek = $this->db->get('tbl02_pendaftaran');
                        if ($cek->num_rows() > 0) {
                            $this->db->where('id_daftar', $params['id_daftar']);
                            $this->db->where('reg_unit', $params['reg_unit']);
                            $cekRecord = $this->db->get('tbl02_pendaftaran_batal');
                            if ($cekRecord->num_rows() > 0) {
                                $response['code'] = 404;
                                $response['message'] = "Ops. Registrasi ini telah dibatalkan";
                            } else {
                                $cekCommand = $this->db->insert('tbl02_pendaftaran_batal', $params);
                                if ($cekCommand) {  
                                    // Hapus DI Dalam Tabel TSEP
                                    $this->rsam = $this->load->database('rsam2', true);
                                    $this->rsam->where('id_daftar',$params['id_daftar'])
                                        ->delete('t_sep');
                                    $response['code'] = 200;
                                    $response['message'] = "Registrasi telah dibatalkan.";
                                } else {
                                    $response['code'] = 405;
                                    $response['message'] = "Ops. Query tidak dapat diproses. Silahkan coba kembali";
                                }
                            }
                        } else {
                            $response['code'] = 406;
                            $response['message'] = "Ops. Query tidak dapat diproses. Silahkan coba kembali";
                        }
                    }
                } else {
                    $response['code'] = 407;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 408;
                $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 409;
            $response['message'] = "Ops. Sesi anda habis. Silahkan login kembali";
        }
        echo json_encode($response);
    }

    /**
    Registrasi IGD
     */
    function gawat_darurat()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $y['index_menu'] = 4;
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_4");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

            $y['contentTitle'] = "Registrasi pasien IGD";

            $x['content'] = $this->load->view('registrasi/template_cari_pasien_igd', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'mr_registrasi.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function cari_pasien_igd()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $mode = $_POST['rbnomor'];
            $nomor = $_POST['txtNokartu'];
            if ($mode == 'nomr') {
                $this->db->where('nomr', $nomor);
            } elseif ($mode == 'bpjs') {
                $this->db->where('no_bpjs', $nomor);
            } else {
                $this->db->where('no_ktp', $nomor);
            }
            $this->db->where_not_in('nomr', '');
            $cekQuery = $this->db->get('tbl01_pasien');
            if ($cekQuery->num_rows() > 0) {
                $res = $cekQuery->row_array();
                $response['code'] = 200;
                $response['message'] = $res['nomr'];
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Data pasien tidak ditemukan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 402;
            $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
        }
        echo json_encode($response);
    }
    function daftar_igd()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_4");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $nomr = $this->uri->segment(3);
            
            $this->db->where('nomr', $nomr);
            $cekNum = $this->db->get('tbl01_pasien');
            if ($cekNum->num_rows() > 0) {
                $y = $cekNum->row_array();
                $y['index_menu'] = 4;
                $y['contentTitle'] = "Registrasi pasien IGD";
                // $y['idx'] = "";
                /*uNTUK pASIEN BARU*/
                $y['getAgama'] = $this->db->get('tbl01_agama');
                $this->db->where_not_in('idx', 4);
                $y['getNegara'] = $this->db->get('tbl01_negara');
                $y['getProvinsi'] = $this->db->get('tbl01_provinsi');
                $y['getSuku'] = $this->db->get('tbl01_suku');
                $y['getBahasa'] = $this->db->get('tbl01_bahasa');
                $y['getPekerjaan'] = $this->db->get('tbl01_pekerjaan');
                $y['getStatus'] = $this->db->get('tbl01_status_kawin');

                $this->db->where_in('profId', array('1', '2'));
                $y['getDokter'] = $this->db->get('tbl01_pegawai');

                $this->db->where_in('grid', array('4'));
                $this->db->where('status_ruang', 1);
                $y['getPoli'] = $this->db->get('tbl01_ruang');

                $this->db->where_not_in('idx', array('8', '9', '10'));
                $this->db->order_by("FIELD(idx,1,2,5,3,6,7,4)");
                $y['getRujukan'] = $this->db->get('tbl01_rujukan');

                $y['getCaraBayar'] = $this->db->get('tbl01_cara_bayar');

                $y['getProvinsi'] = $this->db->where("LENGTH(kode)",2)->get('tbl01_wilayah');
                $y['pendidikan'] = $this->db->get('tbl01_tk_pddkn')->result();
                // Untuk Kebutuhan Pasien Baru
                $this->db->where("SUBSTR(kode,1,2)",$y['id_provinsi']);
                $this->db->where("LENGTH(kode)",5);
                $y['kab'] = $this->db->get('tbl01_wilayah')->result();
                // print_r($y['kab']);
                $this->db->where('SUBSTR(kode,1,5)',$y['id_kab_kota']);
                $this->db->where("LENGTH(kode)",8);
                $query = $this->db->get('tbl01_wilayah');
                $y['kec'] = $query->result();

                $this->db->where('SUBSTR(kode,1,8)',$y["id_kecamatan"]);
                $this->db->where("LENGTH(kode)",13);
                $query = $this->db->get('tbl01_wilayah');
                $y['kel'] = $query->result();

                $this->db->where("SUBSTR(kode,1,2)",$y['id_provinsi_domisili']);
                $this->db->where("LENGTH(kode)",5);
                $y['kabdom'] = $this->db->get('tbl01_wilayah')->result();

                $this->db->where('SUBSTR(kode,1,5)',$y['id_kab_kota_domisili']);
                $this->db->where("LENGTH(kode)",8);
                $query = $this->db->get('tbl01_wilayah');
                $y['kecdom'] = $query->result();

                $this->db->where('SUBSTR(kode,1,8)',$y["id_kecamatan_domisili"]);
                $this->db->where("LENGTH(kode)",13);
                $query = $this->db->get('tbl01_wilayah');
                $y['keldom'] = $query->result();

                $y['dpo'] = $this->db->where('nomr',$nomr)->where('status_dpo',0)->get('tbl01_dpo_rs')->row();
                
                $y['ranap'] = 0;
                $y["ruangranap"]='';
                $x['libjs']=array(
                    'js/pendaftaran.js'
                );
                $x['content'] = $this->load->view('registrasi/template_igd', $y, true);
                $this->load->view('template/theme', $x);
            } else {
                $y['idx'] = "";
                $y['tgl_daftar'] = "";
                $y['nomr'] = "";
                $y['no_ktp'] = "";
                $y['nama'] = "";
                $y['tempat_lahir'] = "";
                $y['tgl_lahir'] = "";
                $y['jns_kelamin'] = "1";
                $y['pekerjaan'] = "";
                $y['agama'] = "";
                $y['suku'] = "";
                $y['bahasa'] = "";
                $y['no_telpon'] = "";
                $y['kewarganegaraan'] = "";
                $y['nama_negara'] = "";
                $y['nama_provinsi'] = "";
                $y['nama_kab_kota'] = "";
                $y['nama_kecamatan'] = "";
                $y['nama_kelurahan'] = "";
                $y['alamat'] = "";
                $y['penanggung_jawab'] = "";
                $y['no_penanggung_jawab'] = "";
                $y['no_bpjs'] = "";
            }
            
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'mr_registrasi.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function simpan_reg_igd()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['nomr']) &&
                    isset($_POST['no_ktp']) &&
                    isset($_POST['nama_pasien']) &&
                    isset($_POST['tempat_lahir']) &&
                    isset($_POST['tgl_lahir']) &&
                    isset($_POST['jns_kelamin']) &&
                    isset($_POST['jns_layanan']) &&
                    isset($_POST['id_ruang']) &&
                    isset($_POST['nama_ruang']) &&
                    isset($_POST['id_rujuk']) &&
                    isset($_POST['rujukan']) &&
                    isset($_POST['pjPasienNama']) &&
                    isset($_POST['pjPasienUmur']) &&
                    isset($_POST['pjPasienPekerjaan']) &&
                    isset($_POST['pjPasienAlamat']) &&
                    isset($_POST['pjPasienTelp']) &&
                    isset($_POST['pjPasienHubKel']) &&
                    isset($_POST['pjPasienDikirimOleh']) &&
                    isset($_POST['pjPasienAlmtPengirim']) &&
                    isset($_POST['dokterJaga']) &&
                    isset($_POST['namaDokterJaga']) &&
                    isset($_POST['id_cara_bayar']) &&
                    isset($_POST['cara_bayar']) &&
                    isset($_POST['no_bpjs']) &&
                    isset($_POST['no_jaminan'])
                ) {
                    $params['nomr'] = trim($this->input->post('nomr', TRUE));
                    $params['no_ktp'] = trim($this->input->post('no_ktp', TRUE));
                    $params['nama_pasien'] = trim($this->input->post('nama_pasien', TRUE));
                    $params['tempat_lahir'] = trim($this->input->post('tempat_lahir', TRUE));
                    $params['tgl_lahir'] = setDateEng(trim($this->input->post('tgl_lahir', TRUE)));
                    $params['jns_kelamin'] = trim($this->input->post('jns_kelamin', TRUE));
                    $params['jns_layanan'] = trim($this->input->post('jns_layanan', TRUE));
                    $params['id_ruang'] = trim($this->input->post('id_ruang', TRUE));
                    $params['nama_ruang'] = trim($this->input->post('nama_ruang', TRUE));
                    $params['id_rujuk'] = trim($this->input->post('id_rujuk', TRUE));
                    $params['rujukan'] = trim($this->input->post('rujukan', TRUE));

                    $params['pjPasienNama'] = trim($this->input->post('pjPasienNama', TRUE));
                    $params['pjPasienUmur'] = trim($this->input->post('pjPasienUmur', TRUE));
                    $params['pjPasienPekerjaan'] = trim($this->input->post('pjPasienPekerjaan', TRUE));
                    $params['pjPasienAlamat'] = trim($this->input->post('pjPasienAlamat', TRUE));
                    $params['pjPasienTelp'] = trim($this->input->post('pjPasienTelp', TRUE));
                    $params['pjPasienHubKel'] = trim($this->input->post('pjPasienHubKel', TRUE));
                    $params['pjPasienDikirimOleh'] = trim($this->input->post('pjPasienDikirimOleh', TRUE));
                    $params['pjPasienAlmtPengirim'] = trim($this->input->post('pjPasienAlmtPengirim', TRUE));

                    $params['dokterJaga'] = trim($this->input->post('dokterJaga', TRUE));
                    $params['namaDokterJaga'] = trim($this->input->post('namaDokterJaga', TRUE));

                    $params['id_cara_bayar'] = trim($this->input->post('id_cara_bayar', TRUE));
                    $params['cara_bayar'] = trim($this->input->post('cara_bayar', TRUE));
                    $params['no_bpjs'] = trim($this->input->post('no_bpjs', TRUE));
                    $params['no_jaminan'] = trim($this->input->post('no_jaminan', TRUE));

                    $params['user_daftar'] = $this->session->userdata('get_uid');
                    $params['session_id'] = getSessionID();

                    if ($params['nomr'] == "") {
                        $response['code'] = 501;
                        $response['message'] = "Ops. No.MR tidak boleh kosong!";
                    } else {
                        $this->db->where('nomr', $params['nomr']);
                        $cekQuery = $this->db->get('tbl01_pasien');
                        if ($cekQuery->num_rows() > 0) {
                            $SQLRegis = "SELECT * FROM tbl02_pendaftaran WHERE nomr = '$params[nomr]' 
                            AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') 
                            AND id_ruang = '$params[id_ruang]' AND reg_unit NOT IN(SELECT reg_unit FROM tbl02_pendaftaran_batal)";

                            $cekRegis = $this->db->query("$SQLRegis");
                            if ($cekRegis->num_rows() > 0) {
                                $response['code'] = 501;
                                $response['message'] = "Ops. Pasien telah terdaftar dengan tujuan layanan, pada hari yang sama!\nSilahkan periksa kembali tujuan layanan anda.";
                            } else {
                                $cekCommand = $this->db->insert('tbl02_pendaftaran', $params);
                                if ($cekCommand) {
                                    $this->db->from('tbl02_pendaftaran');
                                    $this->db->where('session_id', getSessionID());
                                    $this->db->order_by('idx', 'desc');
                                    $this->db->limit(1);
                                    $cekQuery = $this->db->get();
                                    if ($cekQuery->num_rows() > 0) {
                                        $resData = $cekQuery->row_array();
                                        $response['code'] = 200;
                                        $response['message'] = "Simpan data sukses.";
                                        $response['unikID'] = encrypt_decrypt('encrypt', $resData['reg_unit'], true);
                                    } else {
                                        $response['code'] = 202;
                                        $response['message'] = "Simpan data sukses namun cookies telah dihapus.";
                                        $response['unikID'] = null;
                                    }
                                } else {
                                    $response['code'] = 501;
                                    $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                                }
                            }
                        } else {
                            $response['code'] = 402;
                            $response['message'] = "Data pasien tidak ditemukan.";
                        }
                    }
                } else {
                    $response['code'] = 401;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
    function cekRegUnitIGD()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['regUnitRajal'])) {
                    if ($_POST['regUnitRajal'] == "") {
                        $response['code'] = 501;
                        $response['message'] = "Ops. No registrasi unit rawat jalan tidak boleh kosong!";
                    } else {
                        $this->db->where('reg_unit', $_POST['regUnitRajal']);
                        $this->db->where_in('jns_layanan', 'GD');
                        $cekQuery = $this->db->get('tbl02_pendaftaran');
                        if ($cekQuery->num_rows() > 0) {
                            $response['code'] = 200;
                            $response['message'] = "";
                            $response['unikID'] = encrypt_decrypt('encrypt', $_POST['regUnitRajal'], true);
                        } else {
                            $response['code'] = 402;
                            $response['message'] = "Data registrasi unit IGD tidak ditemukan.";
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
    function reg_success_igd()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $reg_unit = encrypt_decrypt('decrypt', $_GET['uid'], true);
            $this->db->where('reg_unit', $reg_unit);
            $cekBatal = $this->db->get('tbl02_pendaftaran_batal');
            if ($cekBatal->num_rows() > 0) {
                $url_reg = base_url() . 'mr_registrasi.php/registrasi/gawat_darurat';
                echo "<script>alert('Ops. Anda tidak bisa membuka registrasi ini. Registrasi ini telah dibatalkan');
                window.location.href = '$url_reg';</script>";
            } else{
                $this->db->select('`idx`,`id_daftar`,`id_admisi`,`reg_unit`,`tgl_masuk`,
                `nomr`,`no_ktp`,`nama_pasien`,`tempat_lahir`,`tgl_lahir`,`jns_kelamin`,
                `id_ruang`,`nama_ruang`,`id_cara_bayar`,`cara_bayar`,`no_bpjs`,
                `no_jaminan`,`id_rujuk`,`rujukan`,jns_layanan,tgl_jaminan,dokterJaga,
                dokterJaga as kodeDokter,namaDokterJaga as namaDokter');
                $this->db->where('reg_unit', $reg_unit);
                $cekPendaftaran = $this->db->get('tbl02_pendaftaran');
                if (!$cekPendaftaran->num_rows() > 0) {
                    $url_reg = base_url() . 'mr_registrasi.php/registrasi/gawat_darurat';
                    echo "<script>alert('Ops. Data tidak ditemukan. periksa kembali data anda');
                    window.location.href = '$url_reg';</script>";
                } else {
                    $x['header'] = $this->load->view('template/header', '', true);
                    $z = setNav("nav_4");
                    $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
    
                    $y = $cekPendaftaran->row_array();
                    $this->db->where('idx', $y['id_cara_bayar']);
                    $cb = $this->db->get('tbl01_cara_bayar')->row();
                    $y['rujukanonline']=$this->pendaftaran_model->getRujukanOnline($y['no_jaminan']);
                    if (empty($cb)) $y["jkn"] = 0;
                    else $y["jkn"] = $cb->jkn;

                    $this->db->where_in('grid', array('4'));
                    $this->db->where('status_ruang', 1);
                    $y['poli'] = $this->db->get('tbl01_ruang')->result();
                    $tgl=explode(' ',$y['tgl_masuk']);
                    $timestamp = strtotime($tgl[0]);
                    $day = date('D', $timestamp);
                    $hari=array(
                        'Sun'=>'Minggu',
                        'Mon'=>'Senin',
                        'Tue'=>'Selasa',
                        'Wed'=>'Rabu',
                        'Thu'=>'Kamis',
                        'Fri'=>'Jumat',
                        'Sat'=>'Sabtu'
                    );
                    
                    $y['dokter'] = $this->db->select("jadwal_dokter_id as NRP, jadwal_dokter_nama as pgwNama")
                    ->where('jadwal_hari',$hari[$day])
                    ->where('jadwal_poly_id',$y['id_ruang'])
                    ->get('tbl02_jadwal_dokter')->result();

                    $y['contentTitle'] = "Pendaftaran Pasien IGD";
    
                    $x['libjs']=array(
                        'js/pendaftaran.js',
                        'js/jspdf.js',
                        'js/cetaksep.js'
                    );
                    $x['content'] = $this->load->view('registrasi/template_daftar_igd_sukses', $y, true);
                    $this->load->view('template/theme', $x);
                }
            }
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'mr_registrasi.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function editkunjungan($idx){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $data=$this->db->select('idx,id_daftar,id_ruang,nama_ruang,dokterJaga,namaDokterJaga,no_jaminan')->where('idx',$idx)->get('tbl02_pendaftaran')->row();
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'data'=>$data
            );
        }else{
            $response = array(
                'status'    => false,
                'message'   => "Session Expired "
            );
        }  
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function cetakRegIGD()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (isset($_GET['kode'])) {
                $kode = encrypt_decrypt('decrypt', $_GET['kode'], true);
                $this->db->select('id_daftar,reg_unit,tgl_masuk,nomr,nama_pasien,jns_kelamin,tempat_lahir,tgl_lahir,id_ruang,nama_ruang,user_daftar');
                $this->db->from('tbl02_pendaftaran');
                $this->db->where('tbl02_pendaftaran.reg_unit', $kode);
                $cekQuery = $this->db->get();
                if ($cekQuery->num_rows() > 0) {
                    $resData = $cekQuery->row_array();
                    $x['reg_unit'] = $resData['reg_unit'];
                    $x['nomr'] = $resData['nomr'];
                    $x['nama_pasien'] = $resData['nama_pasien'];
                    $x['jns_kelamin'] = $resData['jns_kelamin'];
                    $x['tgl_lahir'] = $resData['tgl_lahir'];
                    $x['nama_ruang'] = $resData['nama_ruang'];
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
    function cetakSuratRegIGD()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (isset($_GET['kode'])) {
                $kode = encrypt_decrypt('decrypt', $_GET['kode'], true);
                $this->db->select('id_daftar,reg_unit,tgl_masuk,nomr,nama_pasien,jns_kelamin,tempat_lahir,tgl_lahir,id_ruang,nama_ruang,user_daftar,asal_ruang,nama_asal_ruang');
                $this->db->from('tbl02_pendaftaran');
                $this->db->where('reg_unit', $kode);
                $cekQuery = $this->db->get();
                if ($cekQuery->num_rows() > 0) {
                    $resData = $cekQuery->row_array();
                    $x['reg_unit'] = $resData['reg_unit'];
                    $x['nomr'] = $resData['nomr'];
                    $x['nama'] = $resData['nama_pasien'];
                    $x['jns_kelamin'] = $resData['jns_kelamin'];
                    $x['tgl_lahir'] = $resData['tgl_lahir'];
                    $x['ruang'] = $resData['nama_ruang'];
                    $x['id_daftar'] = $resData['id_daftar'];
                    $x['asal_ruang'] = $resData['asal_ruang'];
                    $x['nama_asal_ruang'] = $resData['nama_asal_ruang'];
                    $x['tgl_masuk'] = $resData['tgl_masuk'];
                    $x['user_daftar'] = getNamaUserByID($resData['user_daftar']);
                    $this->load->view('cetak/v_printregistrasiigd', $x);
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
    function cetakSuratMasukIGD()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (isset($_GET['kode'])) {
                $kode = $_GET['kode'];
                $SQL_SMRJ = "SELECT a.nomr,b.id_daftar,a.nama,a.tempat_lahir,a.tgl_lahir,a.jns_kelamin,agama,
                a.pekerjaan,a.no_ktp,a.no_telpon,a.alamat,nama_negara,b.tgl_masuk AS tgl_reg,a.no_bpjs,rujukan,
                b.nama_provinsi,b.nama_kab_kota,b.nama_kecamatan,b.nama_kelurahan,pjPasienNama,pjPasienUmur,pjPasienPekerjaan,
                pjPasienAlamat,pjPasienTelp,pjPasienHubKel,pjPasienDikirimOleh,pjPasienAlmtPengirim,
                dokterJaga,namaDokterJaga,TIME(b.tgl_masuk) AS JAM
                FROM tbl02_pendaftaran b LEFT JOIN tbl01_pasien a ON a.nomr=b.nomr
                WHERE b.reg_unit='$kode'";

                $cekQuery = $this->db->query("$SQL_SMRJ");
                if ($cekQuery->num_rows() > 0) {
                    $resData['data'] = $cekQuery->row_array();
                    $this->load->view('cetak/v_suratmasukigd', $resData);
                } else {
                    echo "<script>alert('Ops. Data pendaftaran pasien tidak ditemukan. Silahkan coba kembali.');
                    window.close();</script>";
                }
            } else {
                echo "<script>alert('Ops. Variable tidak ditemukan. Silahkan coba kembali.');
                window.close();</script>";
            }
        } else {
            echo "<script>alert('Ops. Method tidak ditemukan. Silahkan coba kembali.');
            window.close();</script>";
        }
    }
    /*DIUPDATE TANGGAL 05-12-2019 OLEH WANHAR AZRI*/
    function editpasien($nomr)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->where('nomr', $nomr);
            $data = $this->db->get('tbl01_pasien')->row();
            $response = array('status' => true, 'message' => 'OK', 'data' => $data);
        } else {
            $response = array('status' => false, 'message' => 'Ops Session Expired', 'data' => array());
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function kamar($id_ruang = "", $id_kelas = "")
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
            $this->db->join('view_bedterisi b', 'a.`id_kamar`=b.`id_kamar`', 'LEFT');
            $this->db->order_by('indexs,id_kamar');
            $data = $this->db->get('tbl01_kamar a')->result();
            $response = array('status' => true, 'message' => 'OK', 'data' => $data);
        } else {
            $response = array('status' => false, 'message' => 'Ops Session Expired', 'data' => array());
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function mapruang($kode)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->where('kodejkn', $kode);
            $ruang = $this->db->get('tbl01_ruang')->row();
            if (empty($ruang)) {
                $response = array('status' => false, 'message' => 'Ruangan Tidak Ditemukan', 'data' => array());
            } else {
                $response = array('status' => true, 'message' => 'OK', 'data' => $ruang);
            }
        } else {
            $response = array('status' => false, 'message' => 'Ops Session Expired', 'data' => array());
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function carabayar($id)
    {
        // $ses_state = $this->users_model->cek_session_id();
        // if ($ses_state) {
            $this->db->where('idx', $id);
            $carabayar = $this->db->get('tbl01_cara_bayar')->row();
            if (empty($carabayar)) {
                $response = array('status' => false, 'message' => 'Cara Bayar Tidak Ditemukan', 'data' => array());
            } else {
                $response = array('status' => true, 'message' => 'OK', 'data' => $carabayar);
            }
        // } else {
        //     $response = array('status' => false, 'message' => 'Ops Session Expired', 'data' => array());
        // }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function getpj()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->select('`nama_penanggung_jawab`,`pekerjaan`,`alamat`,`no_telp`,`hub_keluarga`,tahun_lahir');
            $this->db->where('nomr', $this->input->post('param2'));
            $this->db->like('nama_penanggung_jawab', $this->input->post('param1'));
            $data = $this->db->get('tbl01_penanggung_jawab')->result();
            $response = array('status' => true, 'message' => 'OK', 'data' => $data);
        } else {
            $response = array('status' => false, 'message' => 'Ops Session Expired', 'data' => array());
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function cekkunjungan($noRujuk){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->where('no_rujuk', $noRujuk);
            $jml = $this->db->get('tbl02_pendaftaran')->num_rows();
            $response = array('status' => true, 'message' => 'Ok', 'data' => $jml);
        } else {
            $response = array('status' => false, 'message' => 'Ops Session Expired', 'data' => array());
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function jadwaldokter($poly,$dokter){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $data=$this->pendaftaran_model->getJadwal($poly,$dokter);
            $response = array('status' => true, 'message' => 'OK', 'data' => $data);
        }else {
            $response = array('status' => false, 'message' => 'Ops Session Expired', 'data' => array());
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function tgl()
    {
        echo date('Y-m-d H:i:s');
    }

    function riwayat($nomr){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            // $nomr=$this->input->get('nomr');
            $data=$this->pendaftaran_model->getRiwayat($nomr,'RJ');
            $response = array('status' => true, 'message' => 'OK', 'data' => $data);
        }else {
            $response = array('status' => false, 'message' => 'Ops Session Expired', 'data' => array());
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function updatelayanan(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $idx=$this->input->post('idx');
            $id_ruang_asal=$this->input->post('id_ruang_asal');
            $data['tgl_masuk']=$this->input->post('tgl_masuk');
            $tgl_masuk_lama=$this->input->post('tgl_masuk_lama');
            $tl=explode(' ',$tgl_masuk_lama);
            $tb=explode(' ',$data['tgl_masuk']);
            $data['id_ruang']=$this->input->post('id_ruang');
            $data['reg_unit']=$this->input->post('reg_unit');
            if($id_ruang_asal!=$data['id_ruang'] || $tl[0]!=$tb[0]){
                // generate Regunit baru
                $data['reg_unit']=$this->pendaftaran_model->getRegUnit($data['tgl_masuk'],$data['id_ruang']);
                $data['id_ruanglama']=getField('koderuanglama',array('idx'=>$data["id_ruang"]),'tbl01_ruang'); 
                $t_daftar['grId']=$data['id_ruanglama'];
            }
            $data['nama_ruang']=$this->input->post('nama_ruang');
            $data['dokterJaga']=$this->input->post('dokterJaga');
            $data['namaDokterJaga']=$this->input->post('namaDokterJaga');
            $data['no_jaminan']=$this->input->post('no_jaminan');
            if(!empty($this->input->post('no_jaminan'))) {
                $data['id_cara_bayar']=2;
                $t_daftar['id_cara_bayar']=2;
                $t_daftar['nosep']=$data['no_jaminan'];
            }
            $this->db->where('idx',$idx);
            $this->db->update('tbl02_pendaftaran',$data);

            // Update r_pendaftaran rsamv2
            $t_daftar['tgl_reg']=$data['tgl_masuk'];
            
            $id_daftar=$this->input->post('id_daftar');
            
            $this->rsam = $this->load->database('rsam2', true);
            $this->rsam->where('id_daftar', $id_daftar);
            $this->rsam->update('t_pendaftaran', $t_daftar);
            // $response['unikID'] = encrypt_decrypt('encrypt', $resData['reg_unit'], true);
            $response = array(
                'status' => true, 
                'message' => 'Berhasil Update Layanan',
                'unikID'=>encrypt_decrypt('encrypt', $data['reg_unit'], true)
            );
        }else {
            $response = array('status' => false, 'message' => 'Ops Session Expired', 'data' => array());
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
