<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class pindah_kamar extends CI_Controller {
    public function __construct(){
        parent ::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
        $this->load->model('nota_model');
    }

    public function index(){      
        $ses_state = $this->users_model->cek_session_id();        
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_5");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Lokasi Pelayanan";
            $NRP = $this->session->userdata('get_uid');
            $y['getRuang'] = $this->db->query("SELECT * FROM tbl01_ruang 
                WHERE idx IN (SELECT ruang_akses FROM tbl01_users_nota_tagihan 
                WHERE NRP = '$NRP') AND grid = '2' ORDER BY ruang");

            $x['content'] = $this->load->view('pindah_kamar/template_ruang',$y,true);
            $this->load->view('template/theme',$x);            
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }        
    }
    
    public function tambah(){      
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if(isset($_GET['kLok'])){
                    $this->session->unset_userdata('sPage');
                    $this->session->unset_userdata('sLike');

                    if($_GET['kLok'] == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Lokasi Layanan tidak ditemukan. Coba ulangi kembali.";
                    }else{
                        $x['header'] = $this->load->view('template/header','',true);
                        $z = setNav("nav_4");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                        $y['contentTitle'] = "Cari dan Registrasikan Pasien ke ";        
                        $y['ruangID'] = $_GET['kLok'];  

                        $x['content'] = $this->load->view('pindah_kamar/template_table',$y,true);
                        $this->load->view('template/theme',$x); 
                    }
                }else{
                    $response['code'] = 402;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 403;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }            
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }        
    }

    function getView(){
        if(isset($_POST['ruangID'])):
            $id_ruang = $this->input->post('ruangID',true);
        else:
            $id_ruang = 0;
        endif;
        //echo $this->input->post('page'); exit;
        if(isset($_POST['page'])):
            $offset = $this->input->post('page');
            //$offset=$this->uri->segment(3);
            // echo $offset;
            $this->session->set_userdata('sPage',$offset);
        else:
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;

        $limit = $this->perPage;

        $condition = "WHERE id_ruang = '$id_ruang' ";
        if(isset($_POST['sLike'])){
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "AND (nomr = '$sLike' OR a.id_daftar LIKE '%$sLike%' OR a.reg_unit LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (nomr = '$sLike' OR a.id_daftar LIKE '%$sLike%' OR a.reg_unit LIKE '%$sLike%')";
            }else{
                $condition .= "AND a.idx NOT IN (SELECT id_pindah_ranap FROM tbl02_pindah_ranap_response) AND b.idx IS NULL";
            }
        }

        $SQL = "SELECT a.*,b.idx as idx_batal FROM tbl02_pindah_ranap a LEFT JOIN tbl02_pindah_ranap_batal b ON a.idx=b.id_pindah_ranap  $condition ORDER BY idx DESC";

        // echo $SQL;    
        // exit;
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'nota_tagihan.php/pindah_kamar/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        //echo "$SQL LIMIT $offset,$limit"; exit;
        $this->load->view('pindah_kamar/getDataKunjunganUnit',$x);
    }

    function registrasiPasien(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['no_permintaan']) &&
                    isset($_POST['id_ruang'])
                ){

                    $no_permintaan = $this->input->post('no_permintaan',TRUE);
                    $id_ruang = $this->input->post('id_ruang',TRUE);
                    $datPindahKamar = getDataPindahRanapById($no_permintaan);
                    $datPendaftaran = getDataPendaftaranByRegUnit($datPindahKamar['reg_unit']);
                    if($datPindahKamar){
                        $cekKamar=$this->nota_model->cekKamar($datPindahKamar["id_kamar"]);
                        
                        if(empty($cekKamar)){
                            $response['code'] = 201;
                            $response['message'] = "Ops. Kamar Belum di penuh";
                            $response['data']=$datPindahKamar;
                        }else{
                            $jmltt=$cekKamar->jml_tt;
                            $isipr=$cekKamar->terisi_pr;
                            $isilk = $cekKamar->terisi_lk;
                            $totisi = $isipr+$isilk;
                            if($totisi>=$jmltt){
                                $response['code'] = 201;
                                $response['message'] = "Ops. Kamar ".$cekKamar->nama_kamar ." Penuh";
                                $response['data']=$datPindahKamar;
                            }else{
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
                                    $reg_unit = array('reg_unit'=> $datPindahKamar['reg_unit']) ;
                                    $status = array('status_pasien' => 4);
                                    $this->nota_model->updatePendaftaran($status, $reg_unit);
                                    
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
                                            $cekanak=$this->nota_model->getPermintaanPindah(array('rawatgabung'=>1,'reg_unitibu'=> $datPindahKamar['reg_unit']),'result');
                                            if($cekanak){
                                                foreach ($cekanak as $c ) {
                                                    $d= getDataPendaftaranByRegUnit($c->reg_unit);
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
                                                        'rawatgabung'=>1,
                                                        'reg_unitibu'=> $resData['reg_unit'],
                                                        'user_daftar' => $this->session->userdata('get_uid'),
                                                        'session_id' => session_id()
                                                    );
                                                    $this->db->insert('tbl02_pendaftaran',$params_anak);
                                                    $idx=$this->db->insert_id();
                                                    $newreg=$this->nota_model->getDatapendaftaran(array('idx'=>$idx));
                                                    $paramsResponseanak = array(
                                                        'id_pindah_ranap' => $c->idx,
                                                        'id_daftar' => $d['id_daftar'],
                                                        'reg_unit' => $newreg->reg_unit,
                                                        'user_id' => $this->session->userdata('get_uid')
                                                    );
                                                    $this->db->insert('tbl02_pindah_ranap_response', $paramsResponseanak);
                                                }
                                            }
                                            $this->nota_model->updatebed($params["id_kamar"]);
                                            $this->nota_model->updatebed($params["asal_kamar"]);
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
                        }
                        
                    }else{
                        $response['code'] = 401;
                        $response['message'] = "Ops. Data Permintaan Pindah Kamar Belum Ada!";
                    }
                    
                }else{
                    $response['code'] = 401;
                    $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 402;
                $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
            }
        }else{
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
                    if(empty($this->input->post('no_permintaan'))||
                        empty($this->input->post('id_ruang'))||
                        empty($this->input->post('id_kelas'))||
                        empty($this->input->post('id_kamar'))
                    ){
                        if(empty($this->input->post('id_kelas'))){
                            $response['code'] = 401;
                            $response['message'] = "Ops. Kelas Layanan Belum Dipilih.";
                        }elseif(empty($this->input->post('id_kamar'))){
                            $response['code'] = 401;
                            $response['message'] = "Ops. Kamar Belum Dipilih.";
                        }else{
                            $response['code'] = 401;
                            $response['message'] = "Ops. Data Permintaan tidak lengkap";
                        }
                    }else{
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
    function reg_success(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_4");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Pendaftaran Pasien Rujuk Internal";

            $reg_unit = encrypt_decrypt('decrypt',$_GET['uid'],true);
            $this->db->where('reg_unit',$reg_unit);
            $cekNum = $this->db->get('tbl02_pendaftaran');
            if($cekNum->num_rows() > 0){
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
            }else{
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

            $x['content'] = $this->load->view('pindah_kamar/template_daftar_sukses',$y,true);
            $this->load->view('template/theme',$x);             
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        } 
    }
    function cetakReg(){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            if(isset($_GET['kode'])){
                $kode = encrypt_decrypt('decrypt',$_GET['kode'],true);
                $this->db->where('reg_unit',$kode);
                $cekQuery = $this->db->get('tbl02_pendaftaran');
                if($cekQuery->num_rows() > 0){
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
                    $this->load->view('cetak/v_registrasi',$x);
                }else{
                    echo "<script>alert('Ops. Data pendaftaran pasien tidak ditemukan. Silahkan coba kembali.');
                    window.close();
                    </script>";                
                }
            }else{
                echo "<script>alert('Ops. Variable tidak ditemukan. Silahkan coba kembali.');
                window.close();
                </script>";                
            }
        }else{
            echo "<script>alert('Ops. Request method tidak diizinkan. Silahkan coba kembali.');
            window.close();
            </script>";
        }
    }
    

}

