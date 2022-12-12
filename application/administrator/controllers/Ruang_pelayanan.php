<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ruang_pelayanan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
        $this->load->model('ruang_pelayanan_model');
        $this->load->model('group_layanan_model');
        $this->load->model('kelas_model');
    }
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        $y['index_menu'] = 2;
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);

            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Ruang Pelayanan";
            
            $x['content'] = $this->load->view('ruang_pelayanan/main',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'administrator.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function tambah(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $idx = $this->uri->segment(3);
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['contentTitle'] = "Ruang Pelayanan";

            $y['glayanan'] = $this->group_layanan_model->get_data();
            $y['klayanan'] = $this->kelas_model->get_data();

            $kondisi = array('idx'=>$idx);
            $rec = $this->ruang_pelayanan_model->get_data_where($kondisi);
            if ($rec ->num_rows() > 0) {
                $res = $rec->row_array();
                $y['idx'] = $res['idx'];                
                $y['ruang'] = $res['ruang'];
                $y['grid'] = $res['grid'];                
                $y['grNama'] = $res['grNama'];
                $y['kodejkn'] = $res['kodejkn'];                
                $y['status_ruang'] = $res['status_ruang'];       
            }else{
                $y['idx'] = "";
                $y['ruang'] = "";
                $y['grid'] = "";
                $y['grNama'] = "";
                $y['kodejkn'] = ""; 
                $y['status_ruang'] = "";
            }
            $x['content'] = $this->load->view('ruang_pelayanan/entry',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'administrator.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function tambahkamar($idx, $idkamar="")
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            //$idx = $this->uri->segment(3);
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['contentTitle'] = "Ruang Pelayanan";

            $y['glayanan'] = $this->group_layanan_model->get_data();
            $y['klayanan'] = $this->kelas_model->get_data();
            $y['ruangan_kemkes'] = $this->ruang_pelayanan_model->getRuangKemkes();
            $y['kelas_kemkes'] = $this->ruang_pelayanan_model->getKelasKemkes();
            //print_r($y['ruangan_kemkes']); exit;
            $kondisi = array('idx' => $idx);
            $rec = $this->ruang_pelayanan_model->get_data_where($kondisi);
            if ($rec->num_rows() > 0) {
                $res = $rec->row_array();
                $y['contentTitle'] = "TAMBAH KAMAR UNTUK RUANG " .$res["ruang"];
                $y['idx'] = $res['idx'];
                $y['ruang'] = $res['ruang'];
                $y['grid'] = $res['grid'];
                $y['grNama'] = $res['grNama'];
                $y['kodejkn'] = $res['kodejkn'];
                $y['status_ruang'] = $res['status_ruang'];
                $y["kamar"] = $this->ruang_pelayanan_model->getKamarById($idkamar);
            } else {
                $y['contentTitle'] = "TAMBAH KAMAR";
                $y['idx'] = "";
                $y['ruang'] = "";
                $y['grid'] = "";
                $y['grNama'] = "";
                $y['kodejkn'] = "";
                $y['status_ruang'] = "";
            }
            $x['content'] = $this->load->view('ruang_pelayanan/entrykamar', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'administrator.php/login?sid=' . $sid;
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

        $condition = "";
        if(isset($_POST['sLike'])){
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "WHERE (ruang LIKE '%$sLike%' OR grNama LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);

        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE (ruang LIKE '%$sLike%' OR grNama LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT * FROM tbl01_ruang $condition ORDER BY grid,ruang,kelas_id";
        $SQL_Count = $this->ruang_pelayanan_model->query_data("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'administrator.php/ruang_pelayanan/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->ruang_pelayanan_model->query_data("$SQL LIMIT $offset,$limit");
        $this->load->view('ruang_pelayanan/getdata',$x);
    }

    function getkamar($ruangid)
    {
        if (isset($_POST['page'])) :
            $offset = $this->input->post('page');
            $this->session->set_userdata('sPage', $offset);
        else :
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;

        $limit = $this->perPage;

        $condition = "WHERE id_ruang='$ruangid' ";
        if (isset($_POST['sLike'])) {
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike', true));
            $condition .= "AND (nama_kamar LIKE '%$sLike%' OR kelas_layanan LIKE '%$sLike%')";
            $this->session->set_userdata('sLike', $sLike);
        } else {
            if ($this->session->userdata('sLike')) {
                $sLike = $this->session->userdata('sLike');
                $condition .= " AND (nama_kamar LIKE '%$sLike%' OR kelas_layanan LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT * FROM tbl01_kamar $condition ORDER BY id_kamar,kelas_id";
        $SQL_Count = $this->ruang_pelayanan_model->query_data("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url() . 'administrator.php/ruang_pelayanan/getkamar/' .$ruangid;
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->ruang_pelayanan_model->query_data("$SQL LIMIT $offset,$limit");
        $this->load->view('ruang_pelayanan/getdatakamar', $x);
    }

    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['idx']) &&
                    isset($_POST['ruang']) &&
                    isset($_POST['grid']) &&
                    isset($_POST['grNama']) 

                ){
                    $idx = trim($this->input->post('idx',TRUE));
                    $ruang = trim($this->input->post('ruang',TRUE));
                    $grid = trim($this->input->post('grid',TRUE));
                    $grNama = trim($this->input->post('grNama',TRUE));
                    $kodejkn = trim($this->input->post('kodejkn', TRUE));
                    $status = trim($this->input->post('status_ruang', TRUE));
                    
                    if($ruang=="" || $grid=="" || $grNama==""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Masih data yang kosong.";                  
                    }else{
                        $params = array(
                            'idx' => $idx,
                            'ruang' => $ruang,
                            'grid' => $grid,
                            'grNama' => $grNama,
                            'kodejkn'=> $kodejkn,
                            'status_ruang'=> $status
                        );

                        if($idx==""){
                            $cekCommand = $this->ruang_pelayanan_model->add_data($params); 
                            if($cekCommand){
                                $response['code'] = 200;
                                $response['message'] = "Simpan data sukses.";                                            
                            }else{
                                $response['code'] = 402;
                                $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";        
                            }
                        }else{
                            $kondisi = array('idx' => $idx);
                            $cekCommand = $this->ruang_pelayanan_model->update_data($params,$kondisi); 
                            if($cekCommand){
                                $response['code'] = 201;
                                $response['message'] = "Update data sukses.";                                            
                            }else{
                                $response['code'] = 403;
                                $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                            }
                        }
                    }
                }else{
                    $response['code'] = 404;
                    $response['message'] = "Ops. Variable tidak ditemukan.";
                }
            }else{
                $response['code'] = 405;
                $response['message'] = "Ops. Method not allowed.";
            }
        }else{
            $response['code'] = 406;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
        }
        echo json_encode($response);
    }

    function simpankamar()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['id_kamar']) &&
                    isset($_POST['nama_kamar']) &&
                    isset($_POST['id_ruang']) &&
                    isset($_POST['nama_ruang']) &&
                    isset($_POST['kelas_id']) &&
                    isset($_POST['kelas_layanan']) &&
                    isset($_POST['jml_tt']) &&
                    isset($_POST['jekel'])

                ) {
                    $id_kamar = trim($this->input->post('id_kamar', TRUE));
                    $nama_kamar = trim($this->input->post('nama_kamar', TRUE));
                    $id_ruang = trim($this->input->post('id_ruang', TRUE));
                    $kelas_id = trim($this->input->post('kelas_id', TRUE));

                    if ($nama_kamar == "" || $id_ruang == "" || $kelas_id == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Masih data yang kosong.";
                    } else {
                        $params = array(
                            'id_kamar' => trim($this->input->post('id_kamar', TRUE)),
                            'nama_kamar' => trim($this->input->post('nama_kamar', TRUE)),
                            'id_ruang' => trim($this->input->post('id_ruang', TRUE)),
                            'nama_ruang' => trim($this->input->post('nama_ruang', TRUE)),
                            'kelas_id' => trim($this->input->post('kelas_id', TRUE)),
                            'kelas_layanan' => trim($this->input->post('kelas_layanan', TRUE)),
                            'jml_tt' => trim($this->input->post('jml_tt', TRUE)),
                            'jekel' => trim($this->input->post('jekel', TRUE)),
                            'idruang_display' => trim($this->input->post('idruang_display', TRUE)),
                            'ruang_display' => trim($this->input->post('ruang_display', TRUE)),
                            'idkelas_display' => trim($this->input->post('idkelas_display', TRUE)),
                            'kelas_display' =>  trim($this->input->post('kelas_display', TRUE)),
                            'status_kamar'=> trim($this->input->post('status_kamar', TRUE))
                        );

                        if ($id_kamar == "") {
                            $cekCommand = $this->ruang_pelayanan_model->add_datakamar($params);
                            if ($cekCommand) {
                                $response['code'] = 200;
                                $response['message'] = "Simpan data sukses.";
                            } else {
                                $response['code'] = 402;
                                $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                            }
                        } else {
                            $kondisi = array('id_kamar' => $id_kamar);
                            $cekCommand = $this->ruang_pelayanan_model->update_datakamar($params, $kondisi);
                            if ($cekCommand) {
                                $response['code'] = 201;
                                $response['message'] = "Update data sukses.";
                            } else {
                                $response['code'] = 403;
                                $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                            }
                        }
                    }
                } else {
                    $response['code'] = 404;
                    $response['message'] = "Ops. Variable tidak ditemukan.";
                }
            } else {
                $response['code'] = 405;
                $response['message'] = "Ops. Method not allowed.";
            }
        } else {
            $response['code'] = 406;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
        }
        echo json_encode($response);
    }

    function hapus(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['idx'])){
                    $idx = trim($this->input->post('idx',TRUE));

                    if($idx==""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{
                        $kondisi = array('idx' => $idx);
                        $cekCommand = $this->ruang_pelayanan_model->delete_data($kondisi);
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Hapus data sukses.";                                            
                        }else{
                            $response['code'] = 402;
                            $response['message'] = "Ops. Query error!";   
                        }
                    }
                }else{
                    $response['code'] = 403;
                    $response['message'] = "Ops. Variable tidak ditemukan.";
                }
            }else{
                $response['code'] = 404;
                $response['message'] = "Ops. Method not allowed.";
            }
        }else{
            $response['code'] = 405;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
        }
        echo json_encode($response);
    }
    function hapuskamar($idruang)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['idx'])) {
                    $idx = trim($this->input->post('idx', TRUE));

                    if ($idx == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    } else {
                        $kondisi = array('id_kamar' => $idx);
                        $cekCommand = $this->ruang_pelayanan_model->delete_datakamar($kondisi);
                        if ($cekCommand) {
                            $response['code'] = 200;
                            $response['message'] = "Hapus data sukses.";
                        } else {
                            $response['code'] = 402;
                            $response['message'] = "Ops. Query error!";
                        }
                    }
                } else {
                    $response['code'] = 403;
                    $response['message'] = "Ops. Variable tidak ditemukan.";
                }
            } else {
                $response['code'] = 404;
                $response['message'] = "Ops. Method not allowed.";
            }
        } else {
            $response['code'] = 405;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
        }
        echo json_encode($response);
    }
    
    function kamar($a){
        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');

        if ($ses_state) {
            $x['header'] = $this->load->view('template/header', '', true);

            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $kondisi = array('idx' => $a);
            $ruang = $this->ruang_pelayanan_model->get_data_where($kondisi);
            if(!empty($ruang)) $y['contentTitle'] = "LIST DATA KAMAR DI " .$ruang->row()->ruang;
            else $y['contentTitle'] = "LIST DATA KAMAR "; 
            $y['ruangid'] = $a;
            $x['content'] = $this->load->view('ruang_pelayanan/kamar', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'administrator.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
}
