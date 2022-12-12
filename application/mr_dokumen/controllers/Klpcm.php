<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class klpcm extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
    }
    function index(){
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['index_menu'] = 2;
            $y['contentTitle'] = "KetidakLengkapan Pengisian Catatan Medis (KLPCM)";        
            $x['content'] = $this->load->view('klpcm/template_table',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'mr_dokumen.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function getView(){
        if(isset($_POST['page'])):
            $offset = $this->input->post('page');
            $this->session->set_userdata('sPage',$offset);
        else:
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;

        $limit = $this->perPage;

        $condition = "WHERE a.idx NOT IN (SELECT id_klpcm FROM tbl06_klpcm_batal) ";
        if(isset($_POST['sLike'])){
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "AND a.idx = '$sLike'";
            $this->session->set_userdata('sLike',$sLike);

        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND a.idx = '$sLike'";
            }
        }

        $SQL = "SELECT a.*,COUNT(b.idx) AS jmlDokumen FROM tbl06_klpcm a 
        LEFT JOIN tbl06_klpcm_item b ON a.idx=b.id_klpcm
        $condition GROUP BY a.idx ORDER BY idx";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'mr_dokumen.php/klpcm/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('klpcm/getdata',$x);
    }
    function tambah(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $this->session->unset_userdata('sPage');
            $this->session->unset_userdata('sLike');
            $y['index_menu'] = 2;
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Pemeriksaan KLPCM";

            $id_klpcm = $this->uri->segment(3);
            if(empty($id_klpcm)){
                $params = array(
                    'userID' => $this->session->userdata('get_uid')
                );
                $cekCommand = $this->db->insert('tbl06_klpcm',$params);
                if($cekCommand){
                    $this->db->from('tbl06_klpcm');
                    $this->db->order_by('idx','DESC');
                    $this->db->limit(1);
                    $cekQuery = $this->db->get();
                    if($cekQuery->num_rows() > 0){
                        $res = $cekQuery->row_array();
                        $y['idx'] = $res['idx'];
                        $y['tanggal'] = $res['tanggal'];
                        
                        $x['content'] = $this->load->view('klpcm/template_entry',$y,true);
                        $this->load->view('template/theme',$x);        
                    }else{
                        echo "<script>alert('Ops. Data tidak ditemukan! Silahkan coba kembali');
                        window.history.back();</script>";
                    }                    
                }else{
                    echo "<script>alert('Ops. Data tidak disimpan! Silahkan coba kembali');
                    window.history.back();</script>";
                }
            }else{
                $this->db->from('tbl06_klpcm');
                $this->db->where('idx',$id_klpcm);
                $cekQuery = $this->db->get();
                if($cekQuery->num_rows() > 0){
                    $res = $cekQuery->row_array();
                    $y['idx'] = $res['idx'];
                    $y['tanggal'] = $res['tanggal'];

                    $x['content'] = $this->load->view('klpcm/template_entry',$y,true);
                    $this->load->view('template/theme',$x);        
                }else{
                    echo "<script>alert('Ops. Data tidak ditemukan! Silahkan coba kembali');
                    window.history.back();</script>";
                }                    
            }
        }else{
            $url_login = base_url().'mr_dokumen.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }
    function getPasien(){
        if(isset($_POST['page'])):
            $offset = $this->input->post('page');
            $this->session->set_userdata('sPage',$offset);
        else:
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;
        
        $limit = $this->perPage;

        $condition = "WHERE id_daftar NOT IN(
        SELECT id_daftar FROM tbl06_klpcm_item WHERE id_klpcm NOT IN(
        SELECT id_klpcm FROM tbl06_klpcm_batal)) ";

        if(isset($_POST['sLike'])){
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "AND (id_daftar LIKE '%$sLike%' OR nomr LIKE '%$sLike%' OR nama_pasien LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (id_daftar LIKE '%$sLike%' OR nomr LIKE '%$sLike%' OR nama_pasien LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT * FROM tbl06_status_kembali_item
        $condition ORDER BY idx DESC";

        echo $SQL; 
                  
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getPasien';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'mr_dokumen.php/klpcm/getPasien';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('klpcm/getDataKunjungan',$x);
    }
    function getPengembalianStatus(){
        $id_klpcm = $this->input->post('id_klpcm',true);
        $SQL = "SELECT * FROM tbl06_klpcm_item WHERE id_klpcm = '$id_klpcm' ORDER BY idx DESC";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('klpcm/getItem',$x);
    }
    function cekRekap(){
        $id_klpcm = $this->input->post('id_klpcm',true);
        $SQL = "SELECT * FROM tbl06_klpcm_item WHERE id_klpcm = '$id_klpcm'";
        $cekCount = $this->db->query("$SQL");
        if($cekCount->num_rows() > 0){
            $response['error'] = false;
            $response['message'] = null;
        }else{
            $response['error'] = true;
            $response['message'] = "Item dokumen tidak ditemukan";
        }
        echo json_encode($response);
    }
    function simpanItem(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['id_klpcm'])){
                    if($_POST['id_klpcm'] == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. No.Nota kosong! Silahkan coba kembali.";
                    }else{
                        $params = array(
                            'id_klpcm' => $this->input->post('id_klpcm',TRUE),
                            'id_daftar' => $this->input->post('id_daftar',TRUE),
                            'nomr' => $this->input->post('nomr',TRUE),
                            'nama_pasien' => $this->input->post('nama_pasien',TRUE),
                            'id_ruang' => $this->input->post('id_ruang',TRUE),
                            'nama_ruang' => $this->input->post('nama_ruang',TRUE),
                            'tgl_proses' => setDateEng($this->input->post('tgl_proses',TRUE)),
                            'keterangan' => $this->input->post('keterangan',TRUE)
                        );
                        $this->db->where('id_klpcm',$params['id_klpcm']); 
                        $this->db->where('id_daftar',$params['id_daftar']); 
                        $cekInsert = $this->db->get('tbl06_klpcm_item'); 
                        if ($cekInsert->num_rows() > 0) {
                            $response['code'] = 402;
                            $response['message'] = "Ops. Data telah ada. Silahkan masukan data lainnya";
                        }else{
                            $cekCommand = $this->db->insert('tbl06_klpcm_item',$params); 
                            if($cekCommand){
                                $response['code'] = 200;
                                $response['message'] = "Simpan data sukses.";                      
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
                $response['message'] = "Ops. Ada method tidak diizinkan. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 406;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

    function hapusItem(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['idx'])){
                    if($_POST['idx'] == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Post data kosong! Silahkan coba kembali.";
                    }else{
                        $this->db->where('idx',$_POST['idx']); 
                        $cekCommand = $this->db->delete('tbl06_klpcm_item'); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Delete data sukses.";                      
                        }else{
                            $response['code'] = 402;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                }else{
                    $response['code'] = 403;
                    $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 404;
                $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 405;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
    function cetak(){
        $kode = $_GET['kode'];
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if(isset($_GET['kode'])){
                    if($_GET['kode'] == ""){
                        echo "<script>alert('Ops. Post data kosong! Silahkan coba kembali.');
                        window.close();
                        </script>";
                    }else{
                        $this->db->from('tbl06_klpcm'); 
                        $this->db->where('idx',$_GET['kode']); 
                        $cekCommand = $this->db->get(); 
                        if($cekCommand->num_rows() > 0){
                            $resData = $cekCommand->row_array();
                            $x['idx'] = $resData['idx'];
                            $x['tanggal'] = $resData['tanggal'];
                            $this->load->view('klpcm/print_preview',$x);
                        }else{
                            echo "<script>alert('Ops. Data tidak ditemukan.\nPeriksa kode rekap anda.');
                            window.close();
                            </script>";
                        }
                    }
                }else{
                    echo "<script>alert('Ops. Ada kesalahan permintaan. Coba ulangi kembali.');
                    window.close();
                    </script>";
                }
            }else{
                echo "<script>alert('Ops. Ada kesalahan permintaan. Coba ulangi kembali.');
                window.close();
                </script>";
            }
        }else{
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.close();
            </script>";
        }
    }
    function get_print_data(){
        $this->db->from('tbl06_klpcm_item'); 
        $this->db->where('id_klpcm',$_POST['kode']); 
        $x['SQLItem'] = $this->db->get(); 
        $this->load->view('klpcm/get_print_data',$x);
    }
    function hapus(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['idx'])){
                    if($_POST['idx'] == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Post data kosong! Silahkan coba kembali.";
                    }else{
                        $params = array(
                            'id_klpcm' => $_POST['idx'],
                            'userID' => $this->session->userdata('get_uid')
                        );
                        $cekCommand = $this->db->insert('tbl06_klpcm_batal',$params); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Data sukses dibatalkan.";                      
                        }else{
                            $response['code'] = 402;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                }else{
                    $response['code'] = 403;
                    $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 404;
                $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 405;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
}
?>