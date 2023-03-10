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
        $this->load->helper('http');
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
                // print_r($y); exit;
                $y["kodedokterjkn"]="";
                $y['antrian_poly']="";
                $y["antrian"]=$this->db->where('tanggalperiksa',date('Y-m-d'))->where("nik",$y["no_ktp"])->where("status_kirim",1)->get("jkn_antrean")->row();
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
                $y["id_cara_bayar"]="";
                $y["id_rujuk"]="";
                $y['bookingjkn']=!empty($this->input->get('bookingjkn'))?$this->input->get('bookingjkn'):"";
                if(!empty($kodebooking)){
                    $y['kodebooking']=$kodebooking;
                    // $this->onlineDB = $this->load->database('online', true);
                    // $y['booking']=$this->onlineDB->where('kode_booking',$kodebooking)
                    //     ->join('m_poli b','a.`grId`=b.`grId`')
                    //     ->join('m_dokter c','a.`id_dokter`=c.`id_dokter`')
                    //     ->get('t_online a')->row_array();
                    $url=WSMYRSAM."simrs/booking/kode/".$kodebooking."/lama";
                    $res=httprequest("",$url,"","GET");
                    $arr=json_decode($res);
                    $y['booking']=(array) $arr->response;
                    $y['bookingjkn']="";
                    print_r($y['booking']); exit;
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
                        $y['dokter'] = $this->db->select("jadwal_dokter_id as NRP,dokterjkn, jadwal_dokter_nama as pgwNama")
                        ->where('jadwal_hari',$hari[$day])
                        ->where('jadwal_poly_id',$id)
                        ->get('tbl02_jadwal_dokter')->result();
                    }else $y['dokter']=array();

                }else{
                    if(!empty($y['bookingjkn'])){
                        $this->load->model('patch_model');
                        $data=array(
                            "kodebooking"=>$y['bookingjkn']
                        );
                        $res=httprequest($data, ONLINE_CALL_BACK."jkn/rsud/cekbooking",$token="",$method="POST");
                        // echo $res; exit;
                        $arr=json_decode($res);
                        // print_r($arr); exit;
                        if($arr->response->jeniskunjungan==1) $idrujuk=2;
                        else if($arr->response->jeniskunjungan==2) $idrujuk=7;
                        else if($arr->response->jeniskunjungan==3) $idrujuk=6;
                        else $idrujuk=3;
                        $y["id_cara_bayar"]=2;
                        $y["id_rujuk"]=$idrujuk;
                        $y["no_bpjs"]=$arr->response->nomorkartu;
                        $y["kodedokterjkn"]=$arr->response->kodedokter;
                        $ruang=$this->pendaftaran_model->getPolyByJknKode($arr->response->kodepoli);
                        $y["id"]=!empty($ruang) ? $ruang->idx : "";
                        
                        $y["dokter"]=$this->patch_model->getdokter($y["id"]);
                        $y['kodebooking']="";
                        $y['antrian_poly']=$arr->response->angkaantrean;
                        // print_r($y["id"]); exit;
                    }else{
                        $y['booking']=array();
                        $y['dokter']=array();
                    }
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
        ORDER BY tgl_masuk DESC LIMIT 20";
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
                    $params['status_tracert'] = trim($this->input->post('status_tracert', TRUE));
                    $params['erm'] = trim($this->input->post('erm', TRUE));
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

                                            if(STATUS_JKN=="1"){
                                                // Jika Integrasi Antrian JKN Diaktifkan
                                                $kodebookingonsite=$this->input->post('kodebookingonsite');
                                                $bookingjkn=$this->input->post('bookingjkn');
                                                $antrianpoly=$this->input->post('antrian_poly');
                                                if(empty($antrianpoly)) $antrianpoly=$this->patch_model->getAntrianpoly($resData["id_ruang"],$resData["dokterJaga"]);
                                                if(!empty($kodebookingonsite)) $book=$kodebookingonsite;
                                                else if(!empty($bookingjkn)) $book=$bookingjkn;
                                                else $book=$resData["reg_unit"];

                                                $antri = array(
                                                    'id_daftar' => $resData["id_daftar"], 
                                                    'kodebooking'=>$book,
                                                    'no_antrian_poly' => $antrianpoly,
                                                    'tanggal'=>date('Y-m-d'),
                                                    'antrianruang'=>$resData["id_ruang"],
                                                    'antriandokter'=>$resData["dokterJaga"],
                                                    'kodepolijkn'=>$this->input->post('kodepoli'),
                                                    'kodedokterjkn'=>$this->input->post('kodedokter'),
                                                    'nokartu'=>$this->input->post('no_bpjs'),
                                                    'jampraktek'=>$this->input->post('jampraktek'),
                                                    'labelantrean'=>'',
                                                );
                                                $this->db->insert('tbl02_antrian', $antri);
                                                
                                                // Kirim Booking Antrian Onsite
                                                if(empty($kodebookingonsite) && empty($bookingjkn)){
                                                    // jika belum ada booking antrian onsite, lakukan proses booking antrian poli
                                                    $spm=intval($this->input->post('spm'));
                                                    $jammulai=$this->input->post('jammulai');
                                                    $jamselesai=$this->input->post('jamselesai');
                                                    $jampraktek=$this->input->post('jampraktek');
                                                    $kuotajkn=intval($this->input->post('kuotajkn'));
                                                    $kuotanonjkn=intval($this->input->post('kuotanonjkn'));
                                                    $terisijkn=jmlPasien(1);
                                                    $terisinonjkn=jmlPasien(0);
                                                    if($idcb==2) {
                                                        $jenispasien="JKN"; 
                                                        $sisakuotajkn=$kuotajkn-($terisijkn+1);
                                                        $sisakuotanonjkn=$kuotanonjkn-$terisinonjkn;
                                                    }else {
                                                        $jenispasien="NON JKN";
                                                        $sisakuotajkn=$kuotajkn-$terisijkn;
                                                        $sisakuotanonjkn=$kuotanonjkn-($terisinonjkn+1);
                                                    }
                                                    if($params['id_rujuk']==2 ||$params['id_rujuk']==5) $jeniskunjungan=1;
                                                    else if($params['id_rujuk']==3) $jeniskunjungan=4;
                                                    else if($params['id_rujuk']==6) $jeniskunjungan=3;
                                                    else if($params['id_rujuk']==7) $jeniskunjungan=2;
                                                    else $jeniskunjungan=2;
                                                    // $spm=$this->input->post('spm');
                                                    $estimasitunggu=$antrianpoly*$spm;
                                                    $time = strtotime($jammulai);
                                                    $estimasilayan = date("H:i", strtotime('+'.$estimasitunggu.' minutes', $time));
                                                    $estimasilayanms=strtotime($estimasilayan)*1000;
                                                    $antreanjkn=array(
                                                        'kodebooking'=>$antri['kodebooking'],
                                                        'jenispasien'=> $jenispasien,
                                                        'nomorkartu'=> $params['no_bpjs'],
                                                        'nik'=> $params['no_ktp'],
                                                        'nohp'=> $params['no_bpjs'],
                                                        'kodepoli'=> $this->input->post('kodepoli'),
                                                        'namapoli'=> $params['nama_ruang'],
                                                        'pasienbaru'=> 0,
                                                        'norm'=> $params['nomr'],
                                                        'tanggalperiksa'=> date('Y-m-d'),
                                                        'kodedokter'=> intval($this->input->post('kodedokter')),
                                                        'namadokter'=> $this->input->post("namadokter"),
                                                        'jampraktek'=> $jampraktek,
                                                        'jeniskunjungan'=> $jeniskunjungan, //1 (Rujukan FKTP), 2 (Rujukan Internal), 3 (Kontrol), 4 (Rujukan Antar RS)
                                                        'nomorreferensi'=> $params['no_rujuk'],
                                                        'nomorantrean'=> $antrianpoly,
                                                        'angkaantrean'=> $antrianpoly,
                                                        'estimasidilayani'=> $estimasilayanms,
                                                        'sisakuotajkn'=> $sisakuotajkn,
                                                        'kuotajkn'=> $kuotajkn,
                                                        'sisakuotanonjkn'=> $sisakuotanonjkn,
                                                        'kuotanonjkn'=> $kuotanonjkn,
                                                        'keterangan'=> 'Peserta harap 30 menit lebih awal guna pencatatan administrasi.'
                                                    );
                                                    $res = jknrequest('antrean/add',json_encode($antreanjkn),"POST");
                                                    $resarr=json_decode($res);
                                                    if($resarr->metadata->code==200){
                                                        // $log=array(
                                                        //     'idxreference'=>$resData["idx"],
                                                        //     'moderequest'=>'Tambah Antrean',
                                                        //     'wakturequest'=>date('Y-m-d H:i:s'),
                                                        //     'bodyrequest'=>json_encode($antreanjkn),
                                                        //     'failedmessage'=>$resarr->metadata->message
                                                        // );
                                                        // $this->db->insert('tbl02_jknfailedrequest',$log);
                                                        
                                                        $sekarang=strtotime(date('Y-m-d'))*1000;
                                                        $taskid=array(
                                                            'kodebooking'=>$antri['kodebooking'],
                                                            'taskid'=>3,
                                                            'waktu'=>$sekarang
                                                        );
                                                        $task=jknrequest('antrean/updatewaktu',json_encode($taskid),"POST");
                                                        $taskarr=json_decode($task);
                                                        if($taskarr->metadata->code != 200) {
                                                            $response["antrianjkn"]=$taskarr->metadata->message;
                                                            $response["antrianrequest"]=$taskarr;

                                                            $log=array(
                                                                'idxreference'=>$resData["idx"],
                                                                'moderequest'=>'Update Task',
                                                                'wakturequest'=>date('Y-m-d H:i:s'),
                                                                'bodyrequest'=>json_encode($taskid),
                                                                'failedmessage'=>$resarr->metadata->message
                                                            );
                                                            $this->db->insert('tbl02_jknfailedrequest',$log);
                                                        }
                                                    }else{
                                                        $response["antrianjkn"]=$resarr->metadata->message;
                                                        $response["antrianrequest"]=$antreanjkn;
                                                        // Save Log
                                                        $log=array(
                                                            'idxreference'=>$resData["idx"],
                                                            'moderequest'=>'Tambah Antrean',
                                                            'wakturequest'=>date('Y-m-d H:i:s'),
                                                            'bodyrequest'=>json_encode($antreanjkn),
                                                            'failedmessage'=>$resarr->metadata->message
                                                        );
                                                        $this->db->insert('tbl02_jknfailedrequest',$log);
                                                    }
                                                }else{
                                                    // Update task 3 berdasarkan kodebooking onsite
                                                    $sekarang=strtotime(date('Y-m-d'))*1000;
                                                    $taskid=array(
                                                        'kodebooking'=>$antri["kodebooking"],
                                                        'taskid'=>3,
                                                        'waktu'=>$sekarang
                                                    );
                                                    $task=jknrequest('antrean/updatewaktu',json_encode($taskid),"POST");
                                                    // echo $task; exit;
                                                    $taskarr=json_decode($task);
                                                    // print_r($taskarr);exit;
                                                    if($taskarr->metadata->code != 200) {
                                                        $response["antrianjkn"]=$taskarr->metadata->message;
                                                        $response["antrianrequest"]=$taskarr;

                                                        $log=array(
                                                            'idxreference'=>$resData["idx"],
                                                            'moderequest'=>'Update Task',
                                                            'wakturequest'=>date('Y-m-d H:i:s'),
                                                            'bodyrequest'=>json_encode($taskid),
                                                            'failedmessage'=>$taskarr->metadata->message
                                                        );
                                                        $this->db->insert('tbl02_jknfailedrequest',$log);
                                                    }
                                                }
                                            }else{
                                                $antri = array(
                                                    'id_daftar' => $resData["id_daftar"], 
                                                    'no_antrian_poly' => $this->patch_model->getAntrianpoly($resData["id_ruang"]),
                                                    'tanggal'=>date('Y-m-d'),
                                                    'antrianruang'=>$resData["id_ruang"],
                                                    'antriandokter'=>$resData["dokterJaga"]
                                                );
                                                $this->db->insert('tbl02_antrian', $antri);
                                            }
                                            // Kirim data pendaftaran ke server mobile rsam
                                            
                                            $kirim=$this->db->query("SELECT id_daftar AS kode_booking,`nama_pasien` AS nama,
                                            CONCAT(TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()),' Tahun ',TIMESTAMPDIFF(MONTH, `tgl_lahir`, CURDATE()) MOD TIMESTAMPDIFF(YEAR, `tgl_lahir`, CURDATE()),' Bulan') AS umur,
                                            'ONSITE' AS cara_daftar,(CASE WHEN(`tgl_daftar`=DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d')) THEN 'baru' ELSE 'lama' END) AS jenis_pasien ,dokterJaga AS nrpdokter,tgl_masuk AS tgllayanan
                                            FROM `tbl02_pendaftaran` WHERE idx=".$resData["idx"])->row_array();
                                            httprequest($kirim,WSMYRSAM."simrs/registrasi","","POST");
                                            
                                        }

                                        // Update booking
                                        $kode=$this->input->post('kodebooking');
                                        if(!empty($kode)){
                                            // $this->onlineDB = $this->load->database('online', true);
                                            // $data = array(
                                            //     'kode_booking' => $kode,
                                            //     'verifikasi' => '1'
                                            // );
                                            // $this->onlineDB->where('kode_booking', $kode);
                                            // $update = $this->onlineDB->update('t_online', $data);
                                            $data = array(
                                                'kode_booking' => $kode,
                                                'jnspasien'=>'lama',
                                                'data'=>array(
                                                    'verifikasi' => '1'
                                                )
                                            );
                                            $url=WSMYRSAM."simrs/booking";
                                            $res=httprequest($data,$url,"","PUT");
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
                `id_cara_bayar`,`cara_bayar`,`no_bpjs`,`no_jaminan`,`id_rujuk`,`rujukan`,alamat,rt,rw,nama_provinsi,nama_kab_kota,nama_kecamatan,nama_kelurahan,
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
                    ->join('tbl01_pegawai','NRP=user_daftar','LEFT')
                    ->get('tbl02_pendaftaran')->row();
                    if(!empty($dataregis)){
                        // if($dataregis->jns_layanan=="RI") $jnsLayanan=1; else $jnsLayanan=2;
                        $jnsLayanan = ($dataregis->jns_layanan=="RI") ? 1 : 2;

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
                                'jnsPelayanan'=>$jnsLayanan,
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
                $SQL_SMRJ = "SELECT b.nomr,b.id_daftar,a.nama,a.tempat_lahir,a.tgl_lahir,a.jns_kelamin,agama,suku,bahasa,hambatan_bahasa,no_hp,pendidikan,
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

                $SQL_SMRI = "SELECT a.nomr,b.id_daftar,b.reg_unit,a.nama,a.tempat_lahir,a.tgl_lahir,a.jns_kelamin,agama,suku,bahasa,hambatan_bahasa,no_hp,pendidikan,
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

                                    // Batal Online
                                    $this->load->helper('http');
                                    $batal=array('kode_booking'=>$params['id_daftar']);
                                    httprequest($batal,"http://192.168.2.223/wsonline/simrs/registrasi","","DELETE");
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
                $SQL_SMRJ = "SELECT a.nomr,b.id_daftar,a.nama,a.tempat_lahir,a.tgl_lahir,a.jns_kelamin,agama,agama,suku,bahasa,hambatan_bahasa,no_hp,pendidikan,
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
            $jns_layanan=$this->input->post('jns_layanan');
            $id_ruang_asal=$this->input->post('id_ruang_asal');
            $data['tgl_masuk']=$this->input->post('tgl_masuk');
            $tgl_masuk_lama=$this->input->post('tgl_masuk_lama');
            $tl=explode(' ',$tgl_masuk_lama);
            $tb=explode(' ',$data['tgl_masuk']);
            $data['id_ruang']=$this->input->post('id_ruang');
            $data['reg_unit']=$this->input->post('reg_unit');
            if($id_ruang_asal!=$data['id_ruang'] || $tl[0]!=$tb[0]){
                // generate Regunit baru
                $auto=$this->pendaftaran_model->getRegUnit($data['tgl_masuk'],$data['id_ruang'],$jns_layanan);
                $data['reg_unit']=$auto["reg_unit"];
                $data['no_urut_unit']=$auto["no_urut"];
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
    function simpangc(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            
            $customttd=$this->input->post('customttd');
            if($customttd==1){
                $namattd=$this->input->post('gc_namattd');
                $tempat_lahirttd=$this->input->post('gc_tempat_lahirttd');
                $tanggal_lahirttd=$this->input->post('gc_tgl_lahirttd');
                $jkttd=$this->input->post('gc_jnskelaminttd');
                $alamatttd=$this->input->post('gc_alamatttd');
                $selaku=$this->input->post('sebagai');
            }else{
                $namattd=$this->input->post('gc_nama_lengkap');
                $tempat_lahirttd=$this->input->post('gc_tempat_lahir');
                $tanggal_lahirttd=$this->input->post('gc_tgl_lahir');
                $jkttd=$this->input->post('gc_jns_kelamin');
                $alamatttd=$this->input->post('gc_alamatpasien');
                $selaku="pasien";
            }
            $izinbesuk=(empty($this->input->post('gc_izinaksesbesuk'))) ? 0:1;
            $terbatas=(empty($this->input->post('terbatas'))) ? 0:1;
            $izininformasidiagnosis=(empty($this->input->post('gc_izinpemberianinformasidiagnosis'))) ? 0:1;
            $privasi=(empty($this->input->post('privasi'))) ? "":implode(";",$this->input->post('privasi'));
            $terbatas_list=(empty($this->input->post('terbatas_list'))) ? "":implode(";",$this->input->post('terbatas_list'));
            $data=array(
                'idx'=>$this->input->post('gc_idx'),
                'nomr'=>$this->input->post('gc_nomr'),
                'nama'=>$this->input->post('gc_nama_lengkap'),
                'tempat_lahir'=>$this->input->post('gc_tempat_lahir'),
                'tanggal_lahir'=>$this->input->post('gc_tgl_lahir'),
                'jk'=>$this->input->post('gc_jns_kelamin'),
                'alamat'=>$this->input->post('gc_alamatpasien'),
                'phone'=>$this->input->post('gc_no_telpon'),
                'namattd'=>$namattd,
                'tempat_lahirttd'=>$tempat_lahirttd,
                'tanggal_lahirttd'=>$tanggal_lahirttd,
                'jkttd'=>$jkttd,
                'alamatttd'=>$alamatttd,
                'izinbesuk'=>$izinbesuk,
                'izininformasidiagnosis'=>$izininformasidiagnosis,
                'users_id'=>$this->session->userdata('get_uid'),
                'privasi_list'=>$privasi,
                'terbatas'=>$terbatas,
                'terbatas_list'=>$terbatas_list,
                'selaku'=>$selaku,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
                'selaku_lainnya'=>$this->input->post('selakulainnya'),
            );
            $id=$this->input->post('gc_id');
            if(empty($id)){
                $simpan=$this->pendaftaran_model->simpanGeneralConsent($data);
                if($simpan) $response = array('status' => true, 'message' => 'Persetujuan Umum Berhasi Diinput', 'data' => $data);
                else $response = array('status' => false, 'Gagal Input Data Persetujuan Umum', 'data' => $data);
            }else{
                $this->pendaftaran_model->updateGeneralConsent($data,$id);
                $response = array('status' => true, 'message' => 'Persetujuan Umum Berhasi Diupdate', 'data' => $data);
            }
            
        
        }else {
            $response = array('status' => false, 'message' => 'Ops Session Expired', 'data' => array());
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function datagc($idx){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->erm = $this->load->database('erm', true);
            $data=$this->erm->where('idx',$idx)->get('rj_setuju_umum')->row();
            if(!empty($data)) $response = array('status' => true, 'message' => 'OK', 'data' => $data);
            else $response=array('status'=>false,'message'=>"Belum Input General Consent");
        }else {
            $response = array('status' => false, 'message' => 'Ops Session Expired', 'data' => array());
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function persetujuan_umum($idx){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->erm = $this->load->database('erm', true);
            $data=$this->erm->where('idx',$idx)->get('rj_setuju_umum')->row_array();
            if(!empty($data)) {
                if(empty($data->petugasSign)) $data["sign"]=array();
                else{
                    $petugasSign=base64_decode($data->petugasSign);
                    $data['sign']=$this->db->where('id',$petugasSign)->get('log_assign')->row_array();
                }
                // print_r($data);exit;
                $this->load->view('cetak/setuju_umum_cetak',$data);
            }
        }else {
            $response = array('status' => false, 'message' => 'Ops Session Expired', 'data' => array());
        }
    }
    function simpanttd(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $hub=$this->input->post('hubkeluarga');
            $this->db->where('nomr_pasien',$this->input->post('nomr_pasien'));
            $this->db->where('hubkeluarga',$hub);
            if($hub!="Diri Sendiri"){
                $this->db->where('namattd',$this->input->post('namattd'));
            }
            $cek=$this->db->get('tbl01_pasien_ttd')->row();
            if(empty($cek)){
                $ttd=array(
                    'nomr_pasien'=>$this->input->post('nomr_pasien'),
                    'nama_pasien'=>$this->input->post('nama_pasien'),
                    'namattd'=>$this->input->post('namattd'),
                    'hubkeluarga'=>$this->input->post('hubkeluarga'),
                    'ttd'=>$this->input->post('ttd'),
                    'tglbuat'=>date('Y-m-d H:i:s'),
                );
                $this->db->insert('tbl01_pasien_ttd',$ttd);
            }else{
                $ttd=array(
                    'ttd'=>$this->input->post('ttd'),
                    'tglbuat'=>date('Y-m-d H:i:s'),
                );
                $this->db->where('nomr_pasien',$this->input->post('nomr_pasien'));
                $this->db->where('hubkeluarga',$hub);
                if($hub!="Diri Sendiri"){
                    $this->db->where('namattd',$this->input->post('namattd'));
                }
                $this->db->update('tbl01_pasien_ttd',$ttd);
            }
            

            // Update ttd GC
            $this->erm = $this->load->database('erm', true);
            $gcttd=array(
                'ttd'=>$this->input->post('ttd')
            );
            $this->erm->where('id',$this->input->post('id'));
            $this->erm->update('rj_setuju_umum',$gcttd);
            $response = array('status' => true, 'message' => 'Dokumen Berhasil Di Tanda Tangani', 'data' => array());
        }else {
            $response = array('status' => false, 'message' => 'Ops Session Expired', 'data' => array());
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function signgc(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $cek=cekPasswordUser($this->input->post('pin'),$this->session->userdata('get_uid'));
            if($cek){
                $id=$this->input->post('id');
                // IDENTITAS DOKUMEN
                $param = [
                    "id" => $id,
                    "tabel" => "rj_setuju_umum",
                    "petugas" => $this->session->userdata('get_uid') 
                ];
                $code = base64_encode(json_encode($param));
                // ENCRYPSI DATA
                $this->erm = $this->load->database('erm', true);
                $data=$this->erm->where('id',$id)->get('rj_setuju_umum')->row_array();
                $code_detail = base64_encode(json_encode($data));
                $signdata=array(
                    'kode'=>$code,
                    'kode_detail'=>$code_detail,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s')
                );
                $this->erm->insert('log_assign',$signdata);
                $insert_id=$this->erm->insert_id();
                $signcode=base64_encode($insert_id);
                $update=array(
                    'petugasSign'=>$signcode
                );
                $this->erm->where('id',$id);
                $this->erm->update('rj_setuju_umum',$update);
                $response = array('status' => true, 'message' => 'Dokumen Berhasil Di Tanda Tangani', 'data' => $signcode);
            }else{
                $response = array('status' => false, 'message' => 'Pin yang anda masukkan salah');
            }
            
        }else {
            $response = array('status' => false, 'message' => 'Ops Session Expired', 'data' => array());
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function sign(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $cek=cekPasswordUser($this->input->post('pin'),$this->session->userdata('get_uid'));
            if($cek){
                $id_persetujuan=$this->input->post('id_persetujuan');
                // IDENTITAS DOKUMEN
                // echo $id_persetujuan; exit;
                if(!empty($id_persetujuan)){
                    $param = [
                        "id" => $id_persetujuan,
                        "tabel" => "rj_setuju_umum",
                        "petugas" => $this->session->userdata('get_uid'),
                        'dokumen' => 'FORM RM 1.1.00 Rev. 02'
                    ];
                    $code = base64_encode(json_encode($param));
                    // ENCRYPSI DATA
                    $this->erm = $this->load->database('erm', true);
                    $data=$this->erm->where('id',$id_persetujuan)->get('rj_setuju_umum')->row_array();
                    $code_detail = base64_encode(json_encode($data));
                    $signdata=array(
                        'kode'=>$code,
                        'kode_detail'=>$code_detail,
                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s')
                    );
                    $this->erm->insert('log_assign',$signdata);
                    $insert_id=$this->erm->insert_id();
                    $signcode=base64_encode($insert_id);
                    $update=array(
                        'petugasSign'=>$signcode
                    );
                    // print_r($update);exit;
                    $this->erm->where('id',$id_persetujuan);
                    $this->erm->update('rj_setuju_umum',$update);
                }
                $id_edukasi=$this->input->post('id_edukasi');
                if(!empty($id_edukasi)){
                    $this->erm = $this->load->database('erm', true);
                    $data=$this->erm->where('id_rj_iep',$id_edukasi)
                    ->where("topik_id",1)
                    ->get("rj_iep_detail")->row();
                    $param = [
                        "id" => $data->id,
                        "tabel" => "id_rj_iep",
                        "petugas" => $this->session->userdata('get_uid'),
                        'dokumen' => 'FORM RM 6.3.00 Rev 02'
                    ];
                    $code = base64_encode(json_encode($param));
                    $code_detail = base64_encode(json_encode($data));
                    $signdata=array(
                        'kode'=>$code,
                        'kode_detail'=>$code_detail,
                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s')
                    );
                    $this->erm->insert('log_assign',$signdata);
                    $insert_id=$this->erm->insert_id();
                    $signcode=base64_encode($insert_id);
                    
                    $update=array(
                        'pemberiSign'=>$signcode
                    );

                    $this->erm->where('id_rj_iep',$id_edukasi)
                    ->where("topik_id",1)
                    ->update("rj_iep_detail",$update);

                }
                $idx_pendaftaran=$this->input->post('idx_pendaftaran');
                if(!empty($idx_pendaftaran)){
                    $cek=$this->db->where('idx_pendaftaran',$idx_pendaftaran)
                        ->where('jenis_dokumen','Surat Masuk Rawat Jalan')
                        ->get('tbl02_dokumerekammedis')->row_array();
                    if(empty($cek)){
                        $param = [
                            "id" => $idx_pendaftaran,
                            "tabel" => "tbl02_pendaftaran",
                            "petugas" => $this->session->userdata('get_uid'),
                            'dokumen' => 'FORM RM 02.00 Rev. 01'
                        ];
                        $code = base64_encode(json_encode($param));
                        // ENCRYPSI DATA
                        
                        $data=$this->db->select("b.nomr,b.id_daftar,a.nama,a.tempat_lahir,a.tgl_lahir,a.jns_kelamin,agama,suku,bahasa,hambatan_bahasa,no_hp,pendidikan,
                        a.pekerjaan,a.no_ktp,a.no_telpon,a.alamat,nama_negara,b.tgl_masuk AS tgl_reg,a.no_bpjs,rujukan,
                        b.nama_provinsi,b.nama_kab_kota,b.nama_kecamatan,b.nama_kelurahan,pjPasienNama,pjPasienUmur,pjPasienPekerjaan,
                        pjPasienAlamat,pjPasienTelp,pjPasienHubKel,pjPasienDikirimOleh,pjPasienAlmtPengirim,
                        dokterJaga,namaDokterJaga,TIME(b.tgl_masuk) AS JAM")
                        ->join('tbl01_pasien a','a.nomr=b.nomr')
                        ->where('a.idx',$idx_pendaftaran)
                        ->get('tbl02_pendaftaran b')->row_array();
                        $code_detail = base64_encode(json_encode($data));
                        $signdata=array(
                            'kode'=>$code,
                            'kode_detail'=>$code_detail,
                            'created_at'=>date('Y-m-d H:i:s'),
                            'updated_at'=>date('Y-m-d H:i:s')
                        );
                        $this->erm = $this->load->database('erm', true);
                        $this->erm->insert('log_assign',$signdata);
                        $insert_id=$this->erm->insert_id();
    
                        $signcode=base64_encode($insert_id);
                        
                        $ttd=array(
                            'idx_pendaftaran'=>$idx_pendaftaran,
                            'jenis_dokumen'=>'Surat Masuk Rawat Jalan',
                            'petugasSign'=>$signcode
                        );
                        $this->db->insert('tbl02_dokumerekammedis',$ttd);
                    }
                    
                }
                $response = array('status' => true, 'message' => 'Dokumen Berhasil Di Tanda Tangani', 'data' => $signcode);
            }else{
                $response = array('status' => false, 'message' => 'Pin yang anda masukkan salah');
            }
            
        }else {
            $response = array('status' => false, 'message' => 'Ops Session Expired', 'data' => array());
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function priviewpersetujuanumum($idx){
        $this->erm = $this->load->database('erm', true);
        $data=$this->erm->where('idx',$idx)->get('rj_setuju_umum')->row_array();
        if(!empty($data)) {
            if(empty($data['petugasSign'])) $data["sign"]=array();
            else{
                $petugasSign=base64_decode($data['petugasSign']);
                $data['ttdpetugas']=$petugasSign;
                $data['sign']=$this->erm->where('id',$petugasSign)->get('log_assign')->row_array();
            }
            // print_r($data);exit;
            $this->load->view('priview/priview_persetujuan_umum',$data);
        }else{
            $this->db->select('`idx`,`id_daftar`,`id_admisi`,`reg_unit`,`nomr`,`no_ktp`,
                `nama_pasien`,`tempat_lahir`,`tgl_lahir`,`jns_kelamin`,`id_ruang`,`nama_ruang`,
                `id_cara_bayar`,`cara_bayar`,`no_bpjs`,`no_jaminan`,`id_rujuk`,`rujukan`,alamat,rt,rw,nama_provinsi,nama_kab_kota,nama_kecamatan,nama_kelurahan,
                jns_layanan,tgl_jaminan,tgl_masuk,dokterJaga');
            // $this->db->from('tbl02_pendaftaran');
            // $this->db->join('tbl02_antrian', 'tbl02_pendaftaran.id_daftar=tbl02_antrian.id_daftar', 'LEFT');
            $this->db->where('idx', $idx);
            $data = $this->db->get('tbl02_pendaftaran')->row_array();
            // print_r($data);exit;
            $data['ttdpetugas']='';
            $this->load->view('priview/form_persetujuan_umum',$data);
        }
    }
    function priviewhakkewajiban($idx){
        $this->erm = $this->load->database('erm', true);
        $data=$this->erm->where('idx',$idx)->get('rj_setuju_umum')->row_array();
        if(empty($data)){
            $SQL_SMRJ = "SELECT b.nomr,b.id_daftar,a.nama,a.tempat_lahir,a.tgl_lahir as tanggal_lahir,a.jns_kelamin as jk,'' as selaku,user_daftar,
                dokterJaga,namaDokterJaga,TIME(b.tgl_masuk) AS JAM,petugasSign
                FROM tbl02_pendaftaran b LEFT JOIN tbl01_pasien a ON a.nomr=b.nomr
                WHERE b.idx='$idx'";

            $data = $this->db->query("$SQL_SMRJ")->row_array();
        }
        if(empty($data->petugasSign)) $data["sign"]=array();
        else{
            $petugasSign=base64_decode($data->petugasSign);
            $data['sign']=$this->db->where('id',$petugasSign)->get('log_assign')->row_array();
        }
        // print_r($data); exit;
        if(empty($data)){
            $SQL_SMRJ = "SELECT b.nomr,b.id_daftar,a.nama,a.tempat_lahir,a.tgl_lahir,a.jns_kelamin,agama,suku,bahasa,hambatan_bahasa,no_hp,pendidikan,
                a.pekerjaan,a.no_ktp,a.no_telpon,a.alamat,nama_negara,b.tgl_masuk AS tgl_reg,a.no_bpjs,rujukan,
                b.nama_provinsi,b.nama_kab_kota,b.nama_kecamatan,b.nama_kelurahan,pjPasienNama,pjPasienUmur,pjPasienPekerjaan,
                pjPasienAlamat,pjPasienTelp,pjPasienHubKel,pjPasienDikirimOleh,pjPasienAlmtPengirim,user_daftar,
                dokterJaga,namaDokterJaga,TIME(b.tgl_masuk) AS JAM,petugasSign
                FROM tbl02_pendaftaran b LEFT JOIN tbl01_pasien a ON a.nomr=b.nomr
                WHERE b.idx='$idx'";

            $data = $this->db->query("$SQL_SMRJ")->row_array();
        }
        // print_r($data);exit;
        $this->load->view('priview/priview_hakkewajiban',$data);
    }
    function priviewsuratmasukrajal($idx){
        $SQL_SMRJ = "SELECT b.nomr,b.id_daftar,a.nama,a.tempat_lahir,a.tgl_lahir,a.jns_kelamin,agama,suku,bahasa,hambatan_bahasa,no_hp,pendidikan,
                a.pekerjaan,a.no_ktp,a.no_telpon,a.alamat,nama_negara,b.tgl_masuk AS tgl_reg,a.no_bpjs,rujukan,
                b.nama_provinsi,b.nama_kab_kota,b.nama_kecamatan,b.nama_kelurahan,pjPasienNama,pjPasienUmur,pjPasienPekerjaan,
                pjPasienAlamat,pjPasienTelp,pjPasienHubKel,pjPasienDikirimOleh,pjPasienAlmtPengirim,user_daftar,
                dokterJaga,namaDokterJaga,TIME(b.tgl_masuk) AS JAM,petugasSign
                FROM tbl02_pendaftaran b LEFT JOIN tbl01_pasien a ON a.nomr=b.nomr
                WHERE b.idx='$idx'";

                $cekQuery = $this->db->query("$SQL_SMRJ");
                if ($cekQuery->num_rows() > 0) {
                    $resData['data'] = $cekQuery->row_array();
                    $d=$this->db->where('idx_pendaftaran',$idx)->where("jenis_dokumen",'Surat Masuk Rawat Jalan')->get('tbl02_dokumerekammedis')->row_array();
                    if(!empty($d)) $resData['ttdpetugas']=$d['petugasSign'];
                    else $resData['ttdpetugas']="";
                    $this->load->view('priview/priview_suratmasukrj', $resData);
                } else {
                    echo "<script>alert('Ops. Data pendaftaran pasien tidak ditemukan. Silahkan coba kembali.');
                    window.close();</script>";
                }
    }
    function priviewedukasi($idx){
        $this->erm = $this->load->database('erm', true);
        $data['iep']=$this->erm->where('idx',$idx)->get('rj_iep')->row_array();
        if(empty($data['iep']))  $data['iepdetail']=array();
        else $data['iepdetail'] = $this->erm->where('topik_id',1)->where("id_rj_iep",$data['iep']['id'])->get("rj_iep_detail")->result_array();

        $SQL_SMRJ = "SELECT b.idx,b.nomr,b.id_daftar,a.nama,a.tempat_lahir,a.tgl_lahir,a.jns_kelamin,id_agama,agama,suku,id_bahasa,bahasa,hambatan_bahasa,no_hp,id_tk_pddkn,pendidikan,
                a.pekerjaan,a.no_ktp,a.no_telpon,a.alamat,nama_negara,b.tgl_masuk AS tgl_reg,a.no_bpjs,rujukan,
                b.nama_provinsi,b.nama_kab_kota,b.nama_kecamatan,b.nama_kelurahan,pjPasienNama,pjPasienUmur,pjPasienPekerjaan,
                pjPasienAlamat,pjPasienTelp,pjPasienHubKel,pjPasienDikirimOleh,pjPasienAlmtPengirim,user_daftar,
                dokterJaga,namaDokterJaga,TIME(b.tgl_masuk) AS JAM,petugasSign
                FROM tbl02_pendaftaran b LEFT JOIN tbl01_pasien a ON a.nomr=b.nomr
                WHERE b.idx='$idx'";
        $data['pasien']=$this->db->query("$SQL_SMRJ")->row_array();
        $this->load->view('priview/priview_edukasi',$data);
        
    }
    function simpanedukasi(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $peterjemah=(!empty($this->input->post('peterjemah')) ? $this->input->post('peterjemah'): 0);
            $bersedia=(!empty($this->input->post('bersedia')) ? $this->input->post('bersedia'): 0);
            $alasan=($bersedia==0 ? $this->input->post('alasantidakbersedia'): "");
            $terbatas_fisik=$this->input->post('terbatas_fisik');
            $hambatan=$this->input->post('hambatan');
            $bahasa=$this->input->post('bahasa');
            if(!empty($bahasa)){
                foreach ($bahasa as $b) {
                    if($b=="Daerah") $ba[]=$b."(".$this->input->post('daerahlain').")";
                    else if($b=="bahasalain") $ba[]=$b."(".$this->input->post('bahasalain').")";
                    else $ba[]=$b;
                }
            }else $ba=array();
            
            
            if(!empty($ba)) $bl=implode(";",$ba);else $bl="";
            $tf= empty($terbatas_fisik) ? "Tidak Ada":implode(";",$terbatas_fisik);
            if(!empty($hambatan)){
                foreach ($hambatan as $ha) {
                    if($ha=="Lain-Lain") $ham[]=$ha."(".$this->input->post('hambatanlain').")";
                    else $ham[]=$ha;
                }
                $hamb=implode(';',$ham);
            }else $hamb="Tidak Ada";
            
            $rencana_edukasi=$this->input->post('topiklist');
            $topiklist=!empty($rencana_edukasi)?implode(";",$rencana_edukasi):"Tidak Ada";
            $metode=$this->input->post('metode');
            if(!empty($metode)){
                foreach ($metode as $me ) {
                    $met[]=($me=1?"1-Diskusi":($me==2 ? "2-Ceramah":"3-Demonstrasi"));
                }
            }else $met=array();
            
            $strmet=empty($met)?"Tidak Ada":implode(';',$met);
            $media=$this->input->post('media');
            if(!empty($media)){
                foreach ($media as $me ) {
                    $med[]=($me=1?"1-Liflet":($me==2 ? "2-Lembar Balik":($me==3? "3-Audio Visual": "4-Lain-Lain")));
                }
                
            }else $med;
            $strmed=empty($med)?"Tidak Ada":implode(';',$med);
            
            $sasaran=$this->input->post('sasaran');
            if(!empty($sasaran)){
                foreach ($sasaran as $me ) {
                    $sas[]=($me=1?"1-Pasien": "2-Keluarga Pasien");
                    $hubk=($me=2 ? $this->input->post('hubungan_keluarga') : "");
                    $namasas[]=($me=1? $this->input->post('nama'): $this->input->post('namakeluarga'));
                }
                
            }else {
                $sas=array();
                $hubk=$this->input->post('hubungan_keluarga');
                $namasas[]="";
            }
            $strsas=empty($sas)?"Tidak Ada":implode(';',$sas);

            $this->erm = $this->load->database('erm', true);
            $insertid=$this->input->post('iepid');
            $data=array(
                'idx'=>$this->input->post('eduidx'),
                'nomr'=>$this->input->post('edunomr'),
                'nama'=>$this->input->post('edunama'),
                'bahasa'=>$bl,
                'bahasa_lain'=>'',
                'penerjemah'=>$peterjemah,
                'agama'=>$this->input->post('agama'),
                'pendidikan'=>$this->input->post('pendidikan'),
                'kesediaan'=>$this->input->post('kesediaan'),
                'kesediaan_alasan'=>$alasan,
                'baca'=>$this->input->post('baca'),
                'keyakinan'=>$this->input->post('keyakinan'),
                'terbatas_fisik'=>(!empty($tf) ? $tf:"Tidak ada"),
                'terbatas_fisik_lain'=>'',
                'hambatan'=>(empty($hamb) ? "Tidak ada": $hamb),
                'hambatan_lain'=>'',
                'kebutuhan_edukasi'=>'Pendaftaran Admisi',
                'kebutuhan_edukasi_lain'=>'',
                'rencana_edukasi'=>$topiklist,
                'metode'=>$strmet,
                'media'=>$strmed,
                'sasaran_edukasi'=>$strsas,
                'hubungan_keluarga'=>$hubk,
                'user_daftar'=>$this->session->userdata('get_uid'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            );
            if(empty($insertid)){
                $this->erm->insert('rj_iep',$data);
                $insertid=$this->erm->insert_id();
            }else{
                $this->erm->where('id',$insertid);
                $this->erm->update('rj_iep',$data);
            }
            
            if(!empty($insertid)){
                $det=array(
                    'id_rj_iep'=>$insertid,
                    'tgl'=>date('Y-m-d'),
                    'jam'=>date('H:i:s'),
                    'topik_id'=>1,
                    'topik_title'=>'Pendaftaran Admisi',
                    'topik_list'=>$topiklist,
                    'metode'=>$strmet,
                    'media'=>$strmed,
                    'sasaran'=>implode(';',$namasas),
                    'evaluasi_awal'=>$this->input->post('evaluasi_awal'),
                    'pemberi_edukasi_id'=>$this->session->userdata('get_uid'),
                    'pemberi_edukasi'=>getNmLengkap(),
                    'verifikasi'=>'',
                    'evaluasi_lanjut'=>$this->input->post('evaluasi_lanjut'),
                    'user_daftar'=>$this->session->userdata('get_uid'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                    'created_at'=>date('Y-m-d H:i:s'),
                );
                $this->erm->insert('rj_iep_detail',$det);
                $response = array('status' => true, 'message' => 'Data berhasil Diinput', 'data' => array());
            }else{
                $response = array('status' => false, 'message' => 'Gagal Input Data', 'data' => array());
            }
        }else {
            $response = array('status' => false, 'message' => 'Ops Session Expired', 'data' => array());
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
