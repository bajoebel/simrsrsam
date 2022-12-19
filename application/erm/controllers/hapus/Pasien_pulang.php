<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class pasien_pulang extends CI_Controller {
    function __construct(){
        parent ::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
        $this->load->model('nota_model');
    }
    function index(){        
        /*$ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $this->session->unset_userdata('sPage');
            $this->session->unset_userdata('sLike');
            $x['index_menu'] = 4;
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_7");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Lokasi Pelayanan";
            $NRP = $this->session->userdata('get_uid');
            $y['getRuang'] = $this->db->query("SELECT * FROM tbl01_ruang 
                WHERE idx IN (SELECT ruang_akses FROM tbl01_users_nota_tagihan 
                WHERE NRP = '$NRP') AND grid = '2' ORDER BY ruang");
            $jmlruang=$y['getRuang']->num_rows();
            if($jmlruang==1) {
                $kdlok=$y['getRuang']->row()->idx;
                header('location:'.base_url() ."erm.php/pasien_pulang/data_pasien_pulang?kLok=" .$kdlok);
            }else{
                $x['content'] = $this->load->view('pasien_pulang/template_ruang',$y,true);
                $this->load->view('template/theme',$x);
            }
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }  */
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if($this->session->userdata('kdlokasi')){
                    if($this->session->userdata('kdlokasi') == ""){
                        echo "<script>alert('Ops. Lokasi Layanan tidak ditemukan.');history.back();</script>";
                    }else{
                        $x['index_menu'] = 4;
                        $y['ruangID'] = $this->session->userdata('kdlokasi');   
                        $this->db->where('idx',$y['ruangID']);                     
                        $cekRecord = $this->db->get('tbl01_ruang');
                        if ($cekRecord->num_rows() > 0) {
                            $z = setNav("nav_7");
                            $x['header'] = $this->load->view('template/header','',true);
                            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
                            $y['contentTitle'] = "Data Pasien Keluar";
                            $x['content'] = $this->load->view('pasien_pulang/template_table',$y,true);
                            $this->load->view('template/theme',$x);
                        }else{
                            echo "<script>alert('Ops. Lokasi Layanan tidak ditemukan.');history.back();</script>";
                        }                        
                    }
                }else{
                    echo "<script>alert('Ops. Variable tidak ditemukan.');history.back();</script>";
                }
            }else{
                echo "<script>alert('Ops. Mehtod tidak diizinkan.');history.back();</script>";
            }            
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }        
    }    
    function data_pasien_pulang(){      
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if($this->session->userdata('kdlokasi')){
                    if($this->session->userdata('kdlokasi') == ""){
                        echo "<script>alert('Ops. Lokasi Layanan tidak ditemukan.');history.back();</script>";
                    }else{
                        $x['index_menu'] = 4;
                        $y['ruangID'] = $this->session->userdata('kdlokasi');   
                        $this->db->where('idx',$y['ruangID']);                     
                        $cekRecord = $this->db->get('tbl01_ruang');
                        if ($cekRecord->num_rows() > 0) {
                            $x['header'] = $this->load->view('template/header','',true);
                            $z = setNav("nav_6");
                            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
                            
                            $y['contentTitle'] = "Data Pasien Keluar";
                            $x['content'] = $this->load->view('pasien_pulang/template_table',$y,true);
                            $this->load->view('template/theme',$x);
                        }else{
                            echo "<script>alert('Ops. Lokasi Layanan tidak ditemukan.');history.back();</script>";
                        }                        
                    }
                }else{
                    echo "<script>alert('Ops. Variable tidak ditemukan.');history.back();</script>";
                }
            }else{
                echo "<script>alert('Ops. Mehtod tidak diizinkan.');history.back();</script>";
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
        // if(isset($_POST['ruangID'])):
        //     $id_ruang = $this->input->post('ruangID',true);
        // else:
        //     $id_ruang = 0;
        // endif;
        $id_ruang=$this->session->userdata('kdlokasi');
        if(isset($_POST['page'])):
            $offset = $this->input->post('page');
            $this->session->set_userdata('sPage',$offset);
        else:
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;

        $limit = $this->perPage;
        $condition = "WHERE id_ruang = '$id_ruang' ";
        if(isset($_POST['sLike'])){
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "AND (nomr = '$sLike' OR id_daftar LIKE '%$sLike%' OR nama_pasien LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (nomr = '$sLike' OR id_daftar LIKE '%$sLike%' OR nama_pasien LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT * FROM tbl02_pasien_pulang $condition ORDER BY idx DESC";
        //echo $SQL;    
            
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'erm.php/pasien_pulang/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('pasien_pulang/getDataKunjunganUnit',$x);
    }

    public function tambah(){      
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if($this->session->userdata('kdlokasi')){
                    if($this->session->userdata('kdlokasi') == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Lokasi Layanan tidak ditemukan. Coba ulangi kembali.";
                    }else{
                        $x['index_menu'] = 4;
                        $x['header'] = $this->load->view('template/header','',true);
                        $z = setNav("nav_6");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                        $y['ruangID'] = $this->session->userdata('kdlokasi');                        
                        $y['contentTitle'] = "Data Pasien Pulang";        

                        $this->db->where_in('profId',array('1','2'));
                        $y['getDokter'] = $this->db->get('tbl01_pegawai');
                        $y['getCaraKeluar'] = $this->db->get('tbl01_cara_keluar');
                        $y['getKeadaanKeluar'] = $this->db->get('tbl01_keadaan_keluar');
                        $y['getCaraBayar'] = $this->db->get('tbl01_cara_bayar');
                        $y['getJenisPelayanan'] = $this->db->get('tbl01_jenis_pelayanan');

                        $x['content'] = $this->load->view('pasien_pulang/template_entry',$y,true);
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
            $url_login = base_url().'mr_registrasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }        
    }
    function getViewDataKunjunganPasien(){
        $id_ruang = $_POST['txtRuangID'];
        $nomor = $_POST['txtNomor'];
        $mode = $_POST['rbnomor'];

        $SQL = "SELECT a.*,b.idx AS PK_INDEX FROM tbl02_pendaftaran a 
        LEFT JOIN tbl02_pasien_pulang b ON a.reg_unit=b.reg_unit
        WHERE a.id_ruang = '$id_ruang' ";
        if($mode == 'nomr'){
            $SQL .= "AND a.nomr = '$nomor'";
            $this->db->where('nomr',$nomor);
        }elseif($mode == 'reg_unit'){
            $SQL .= "AND a.reg_unit = '$nomor'";
            $this->db->where('reg_unit',$nomor);
        }else{
            $SQL .= "AND a.id_daftar = '$nomor'";
        }
        $SQL .= "ORDER BY a.idx DESC";

        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('pasien_pulang/getDataKunjunganPasien',$x);
    }
    function getDataKunjunganPasien(){
        $reg_unit = $_POST['reg_unit'];
        $this->db->select("tbl02_pendaftaran.*,DATE_FORMAT(tbl01_pasien.tgl_daftar,'%Y-%m-%d') as tgl_daftar,DATE_FORMAT(tbl02_pendaftaran.tgl_masuk,'%Y-%m-%d') as tgl_masuk ");
        $this->db->where('reg_unit',$reg_unit);
        $this->db->join('tbl01_pasien', 'tbl02_pendaftaran.nomr=tbl01_pasien.nomr');
        $data = $this->db->get('tbl02_pendaftaran')->row_array();
        $data['umur'] = getUmur($data['tgl_lahir'],$data['tgl_masuk']);
        echo json_encode($data);
    }
    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
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
                ){
                    $params = array(
                        'id_daftar' => $this->input->post('id_daftar',TRUE),
                        'reg_unit' => $this->input->post('reg_unit',TRUE),
                        'nomr' => $this->input->post('nomr',TRUE),
                        'nama_pasien' => $this->input->post('nama_pasien',TRUE),
                        'jns_kelamin' => $this->input->post('jns_kelamin',TRUE),
                        'tgl_lahir' => setDateEng($this->input->post('tgl_lahir',TRUE)),
                        'umur' => $this->input->post('umur',TRUE),
                        'id_ruang' => $this->input->post('id_ruang',TRUE),
                        'nama_ruang' => $this->input->post('nama_ruang',TRUE),
                        'los' => $this->input->post('los',TRUE),
                        'id_kelas' => $this->input->post('id_kelas',TRUE),
                        'kelas_layanan' => $this->input->post('kelas_layanan',TRUE),
                        'tgl_masuk' => setDateEng($this->input->post('tgl_masuk',TRUE)),
                        'tgl_keluar' => setDateEng($this->input->post('tgl_keluar',TRUE)),
                        'id_cara_keluar' => $this->input->post('id_cara_keluar',TRUE),
                        'cara_keluar' => $this->input->post('cara_keluar',TRUE),
                        'dpjp' => $this->input->post('dpjp',TRUE),
                        'nama_dpjp' => $this->input->post('nama_dpjp',TRUE),
                        'id_keadaan_keluar' => $this->input->post('id_keadaan_keluar',TRUE),
                        'keadaan_keluar' => $this->input->post('keadaan_keluar',TRUE),
                        'jns_layanan' => $this->input->post('jns_layanan',TRUE),
                        'jns_kunjungan' => $this->input->post('jns_kunjungan',TRUE),
                        'kasus_penyakit' => $this->input->post('kasus_penyakit',TRUE),
                        'id_cara_bayar' => $this->input->post('id_cara_bayar',TRUE),
                        'cara_bayar' => $this->input->post('cara_bayar',TRUE),
                        'no_bpjs' => $this->input->post('no_bpjs',TRUE),
                        'no_jaminan' => $this->input->post('no_jaminan',TRUE),
                        'id_tindakan_pelayanan' => $this->input->post('id_tindakan_pelayanan',TRUE),
                        'tindakan_pelayanan' => $this->input->post('tindakan_pelayanan',TRUE),
                        'user_exec' => $this->session->userdata('get_uid')
                    );

                    if(
                        $params['id_daftar'] == "" || 
                        $params['reg_unit'] == "" || 
                        $params['nomr'] == "" || 
                        $params['id_ruang'] == "" || 
                        $params['tgl_masuk'] == "" || 
                        $params['tgl_keluar'] == "" || 
                        $params['id_cara_keluar'] == "" || 
                        $params['dpjp'] == "" || 
                        $params['id_keadaan_keluar'] == ""
                    ){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Data masih ada yang kosong!";
                    }else{
                        $SqlLayananRI = "SELECT id_ruang FROM tbl02_pendaftaran 
                        WHERE id_daftar = '$_POST[id_daftar]' AND jns_layanan = 'RI'";
                        $cekLayananRI = $this->db->query("$SqlLayananRI"); 
                        if($cekLayananRI->num_rows() > 0){
                            $resLayananRI = $cekLayananRI->row_array();
                            if($params['id_ruang'] != $resLayananRI['id_ruang']){
                                $response['code'] = 501;
                                $response['message'] = "Ops. Pasien tidak dapat dipulangkan. Pasien terdaftar di ". getRuangByID($resLayananRI['id_ruang']) . ".\nHanya " . getRuangByID($resLayananRI['id_ruang']) . " yang boleh memulangkan pasien.";
                            }else{
                                $cekCommand = $this->db->insert('tbl02_pasien_pulang',$params); 
                                if($cekCommand){
                                    $response['code'] = 200;
                                    $response['message'] = "Data pasien keluar sukses disimpan.";
                                }else{
                                    $response['code'] = 402;
                                    $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                                }
                            }
                        }else{
                            $cekCommand = $this->db->insert('tbl02_pasien_pulang',$params); 
                            if($cekCommand){
                                $response['code'] = 200;
                                $response['message'] = "Data pasien keluar sukses disimpan.";
                            }else{
                                $response['code'] = 403;
                                $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                            }
                        }
                    }
                }else{
                    $response['code'] = 404;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 405;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 406;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
    
    function batalPulang(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['idx'])){
                    if($_POST['idx'] == ""){
                        $response['code'] = 501;
                        $response['message'] = "Ops. Kode tidak boleh kosong!";
                    }else{
                        $this->db->where('idx',$_POST['idx']); 
                        $cekCommand = $this->db->delete('tbl02_pasien_pulang'); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Pasien sukses batal dipulangkan.";
                        }else{
                            $response['code'] = 502;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }   
                    }
                }else{
                    $response['code'] = 503;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 504;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 505;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
}

