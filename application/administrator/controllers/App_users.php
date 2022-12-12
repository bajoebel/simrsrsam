<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class App_users extends CI_Controller {
    public function __construct(){
        parent ::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
    }
    public function index(){      
        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        $y['index_menu'] = 2;
        if($ses_state){
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $x['header'] = $this->load->view('template/header','',true);

            $y['contentTitle'] = "Data App Users";        
            
            $y['get_profesi'] = $this->db->get('tbl01_pegawai');   
            $y['get_agama'] = $this->db->get('tbl01_agama');   
            $x['content'] = $this->load->view('app_users/template_table',$y,true); 
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'administrator.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }        
    }

    # Tab Admin App
    public function getTabAdminApp(){      
        $this->load->view('app_users/adminApp/tabAdminApp');
    }
    function getViewAdminApp(){
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
            $condition .= "WHERE a.NRP = '$sLike' OR  pgwNama LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);

        }else{
            if($this->session->userdata('sLcike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE a.NRP = '$sLike' OR  pgwNama LIKE '%$sLike%'";
            }
        }
        $modul=1;
        $SQL = "SELECT a.*,b.pgwNama,d.level FROM tbl01_users_admin a LEFT JOIN tbl01_pegawai b ON a.NRP=b.nrp 
        JOIN tbl01_acc_level d ON a.levelid = d.idx
        $condition ORDER BY a.idx DESC";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getDataAdminApp';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'administrator.php/app_users/getViewAdminApp';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('app_users/adminApp/getDataAdminApp',$x);
    }
    public function tambahAdminApp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $x['header'] = $this->load->view('template/header','',true);
            $y['contentTitle'] = "Entry User Admin App";
            $x['content'] = $this->load->view('app_users/adminApp/templateEntryAdminApp',$y,true); 
            $this->load->view('template/theme',$x); 
        }else{
            $sid = getSessionID();
            $url_login = base_url().'administrator.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }        
    }
    function getSelectViewAdminApp(){
        $sLike = $_POST['sLike'];
        $SQL = "SELECT a.*,b.profesi FROM tbl01_pegawai a LEFT JOIN tbl01_profesi b ON a.profId=b.idx  
        WHERE NRP NOT IN(SELECT NRP FROM tbl01_users_admin) AND 
        (NRP LIKE '%$sLike%' OR profesi LIKE '%$sLike%' OR pgwNama LIKE '%$sLike%') LIMIT 50";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('app_users/adminApp/getSelectAdminApp',$x);
    }
    function pilihAdminApp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $this->db->where('NRP',  $this->input->post('NRP',TRUE));
                $cekQuery = $this->db->get('tbl01_users_admin'); 
                if($cekQuery->num_rows() > 0){
                    $response['code'] = 101;
                    $response['message'] = "Ops. User telah terdaftar. Coba ulangi kembali.";                    
                }else{
                    $level = $this->users_model->getLevel(1);
                    if($level->num_rows() == 1){
                        $level_user = array(
                            'nrp_user'  => $this->input->post('NRP',TRUE),
                            'modulid'   => MODUL_ID,
                            'levelid'   => $level->row()->idx
                        );
                        $this->db->insert('tbl01_acc_level_user', $level_user);
                    }
                    if(!empty($level)){
                        $data_level = $level->result();
                        $levelid=$data_level[0]->idx;
                    }else{
                        $levelid=0;
                    }
                    
                    $params = array(
                        'NRP' => $this->input->post('NRP',TRUE)
                    );
                    $cekCommand = $this->db->insert('tbl01_users_admin',$params); 
                    if($cekCommand){
                        $response['code'] = 200;
                        $response['message'] = "Data sukses disimpan.";                                            
                    }else{
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                    }
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
    function hapusAdminApp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['idx'])){
                    if($_POST['idx'] == ""){
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{
                        $cekCommand = $this->db->query("DELETE FROM tbl01_users_admin WHERE idx = '$_POST[idx]'"); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Hapus data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";                 
                        }
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

    
    # Tab MR Registrasi
    public function getTabMrRegistrasiApp(){      
        $this->load->view('app_users/MrRegistrasiApp/tableMain');
    }
    function getViewMrRegistrasiApp(){
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
            $condition .= "WHERE a.NRP = '$sLike' OR  pgwNama LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);

        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE a.NRP = '$sLike' OR  pgwNama LIKE '%$sLike%'";
            }
        }
        //$modul = MODUL_ID ; 
        //echo $modul;
        $SQL = "SELECT a.*,b.pgwNama, d.level FROM tbl01_users_mr_registrasi a 
        LEFT JOIN tbl01_pegawai b ON a.NRP=b.nrp JOIN tbl01_acc_level d ON a.levelid = d.idx
        $condition ORDER BY a.idx DESC";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getDataMrRegistrasiApp';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'administrator.php/app_users/getViewMrRegistrasiApp';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('app_users/MrRegistrasiApp/getData',$x);
    }
    public function tambahMrRegistrasiApp(){      
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $x['header'] = $this->load->view('template/header','',true);
            $y['contentTitle'] = "Entry User MR Registrasi App"; 
            $x['content'] = $this->load->view('app_users/MrRegistrasiApp/templateEntry',$y,true); 
            $this->load->view('template/theme',$x);            
        }else{
            $sid = getSessionID();
            $url_login = base_url().'administrator.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }        
    }
    function getSelectViewMrRegistrasiApp(){
        $sLike = $_POST['sLike'];
        $SQL = "SELECT a.*,b.profesi FROM tbl01_pegawai a LEFT JOIN tbl01_profesi b ON a.profId=b.idx  
        WHERE NRP NOT IN(SELECT NRP FROM tbl01_users_mr_registrasi) AND 
        (NRP LIKE '%$sLike%' OR profesi LIKE '%$sLike%' OR pgwNama LIKE '%$sLike%') LIMIT 50";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('app_users/MrRegistrasiApp/getSelect',$x);
    }
    function pilihMrRegistrasiApp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $this->db->where('NRP',  $this->input->post('NRP',TRUE));
                $cekQuery = $this->db->get('tbl01_users_mr_registrasi'); 
                if($cekQuery->num_rows() > 0){
                    $response['code'] = 101;
                    $response['message'] = "Ops. User telah terdaftar. Coba ulangi kembali.";                    
                }else{
                    
                    $level = $this->users_model->getLevel(2);
                    if($level->num_rows() == 1){
                        $level_user = array(
                            'nrp_user'  => $this->input->post('NRP',TRUE),
                            'modulid'   => 2,
                            'levelid'   => $level->row()->idx
                        );
                        $this->db->insert('tbl01_acc_level_user', $level_user);
                    }
                    $params = array(
                        'NRP' => $this->input->post('NRP',TRUE),
                        'levelid'=>2
                    );
                    $cekCommand = $this->db->insert('tbl01_users_mr_registrasi',$params); 
                    if($cekCommand){
                        $response['code'] = 200;
                        $response['message'] = "Data sukses disimpan.";                                            
                    }else{
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                    }
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
    function hapusMrRegistrasiApp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['idx'])){
                    if($_POST['idx'] == ""){
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{
                        $cekCommand = $this->db->query("DELETE FROM tbl01_users_mr_registrasi WHERE idx = '$_POST[idx]'"); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Hapus data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";                                            
                        }
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

    #MrDokumenApp
    public function getTabMrDokumenApp(){      
        $this->load->view('app_users/MrDokumenApp/tableMain');
    }
    function getViewMrDokumenApp(){
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
            $condition .= "WHERE a.NRP = '$sLike' OR  pgwNama LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);

        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE a.NRP = '$sLike' OR  pgwNama LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT a.*,b.pgwNama,c.level FROM tbl01_users_mr_dokumen a LEFT JOIN tbl01_pegawai b ON a.NRP=b.nrp JOIN tbl01_acc_level c ON a.levelid=c.idx
        $condition ORDER BY a.idx DESC";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getDataMrDokumenApp';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'administrator.php/app_users/getViewMrDokumenApp';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        //Get Level
        $this->db->where('id_modul',6);
        $x['level'] = $this->db->get('tbl01_acc_level')->result();
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('app_users/MrDokumenApp/getData',$x);
    }
    public function tambahMrDokumenApp(){      
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $x['header'] = $this->load->view('template/header','',true);
            $y['contentTitle'] = "Entry User MR Dokumen App";
            $x['content'] = $this->load->view('app_users/MrDokumenApp/templateEntry',$y,true); 
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'administrator.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }        
    }
    function getSelectViewMrDokumenApp(){
        $sLike = $_POST['sLike'];
        $SQL = "SELECT a.*,b.profesi FROM tbl01_pegawai a LEFT JOIN tbl01_profesi b ON a.profId=b.idx  
        WHERE NRP NOT IN(SELECT NRP FROM tbl01_users_mr_dokumen) AND 
        (NRP LIKE '%$sLike%' OR profesi LIKE '%$sLike%' OR pgwNama LIKE '%$sLike%') LIMIT 50";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('app_users/MrDokumenApp/getSelect',$x);
    }
    function pilihMrDokumenApp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $this->db->where('NRP',  $this->input->post('NRP',TRUE));
                $cekQuery = $this->db->get('tbl01_users_mr_dokumen'); 
                if($cekQuery->num_rows() > 0){
                    $response['code'] = 101;
                    $response['message'] = "Ops. User telah terdaftar. Coba ulangi kembali.";                    
                }else{
                    $level = $this->users_model->getLevel(6);
                    if(!empty($level->num_rows())){
                        $level_user = array(
                            'nrp_user'  => $this->input->post('NRP',TRUE),
                            'modulid'   => 2,
                            'levelid'   => $level->row()->idx
                        );
                        $this->db->insert('tbl01_acc_level_user', $level_user);
                    }

                    $params = array(
                        'NRP' => $this->input->post('NRP',TRUE), 'levelid'   => $level->row()->idx
                    );
                    $cekCommand = $this->db->insert('tbl01_users_mr_dokumen',$params); 
                    if($cekCommand){
                        $response['code'] = 200;
                        $response['message'] = "Data sukses disimpan.";                                            
                    }else{
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                    }
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
    function hapusMrDokumenApp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['idx'])){
                    if($_POST['idx'] == ""){
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{
                        $cekCommand = $this->db->query("DELETE FROM tbl01_users_mr_dokumen WHERE idx = '$_POST[idx]'"); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Hapus data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
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

    #NotaTagihanApp
    public function getTabNotaTagihanApp(){    
        $this->load->view('app_users/NotaTagihanApp/tableMain');
    }
    function getViewRuangNotaTagihanApp(){
        $this->db->select("GROUP_CONCAT(DISTINCT c.ruang_akses ORDER BY c.ruang_akses DESC SEPARATOR ',') AS ruang,levelid");
        $this->db->where('NRP',$_POST['NRP']);  
        $x['getAksesAvailable'] = $this->db->get('tbl01_users_nota_tagihan c');  
        $x['getRuang'] = $this->db->get('tbl01_ruang');  
       
        $this->load->view('app_users/NotaTagihanApp/getDataRuang',$x);
    }
    function simpanRuangNotaTagihanApp(){
        if(isset($_POST['chkRuang']) AND isset($_POST['NRP'])){
            $queDelete = $this->db->query("DELETE FROM tbl01_users_nota_tagihan WHERE NRP = '$_POST[NRP]'");
            if($queDelete){
                for($i=0; $i < count($_POST['chkRuang']); $i++){
                    $item = $_POST['chkRuang'][$i];
                    $idlevel= $this->input->post('levelid');
                    $menu = $this->db->query("SELECT GROUP_CONCAT(DISTINCT idmenu ORDER BY idmenu DESC SEPARATOR ',') AS menu FROM `tbl01_acc_hakakses` WHERE idlevel=$idlevel")->row();
                    
                    $dataDetail = array(
                        'NRP' => $_POST['NRP'],
                        'ruang_akses' => $item,
                        'levelid'=> $idlevel,
                        'menu'=> $menu->menu
                    );
                    $this->db->insert('tbl01_users_nota_tagihan',$dataDetail);
                }
                $response['code'] = 200;
                $response['message'] = "Ruang akses telah di set.";
            }else{
                $response['code'] = 404;
                $response['message'] = "Ops. Query error. Periksa koneksi database anda atau hubungi administrator";
            }
        }else{
            $response['code'] = 404;
            $response['message'] = "Ops. Option ruang tidak ada yang dipilih atau petugas tidak diset.";
        }

        echo json_encode($response);
    }
    function getViewNotaTagihanApp(){
        if(isset($_POST['page'])):
            $offset = $this->input->post('page');
            $this->session->set_userdata('sPage',$offset);
        else:
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;

        $limit = $this->perPage;
        //$condition = "WHERE a.NRP NOT IN('NRP1810001') ";
        $condition = "";
        if(isset($_POST['sLike'])){
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "WHERE (a.NRP = '$sLike' OR  pgwNama LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);

        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE (a.NRP = '$sLike' OR  pgwNama LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT a.*,b.pgwNama,d.level,
        GROUP_CONCAT(DISTINCT c.ruang ORDER BY c.ruang DESC SEPARATOR '<br/>') AS ruang 
        FROM tbl01_users_nota_tagihan a 
        LEFT JOIN tbl01_pegawai b ON a.NRP=b.nrp
        LEFT JOIN tbl01_ruang c ON a.ruang_akses=c.idx 
        LEFT JOIN tbl01_acc_level d ON a.levelid = d.idx
        $condition GROUP BY NRP ORDER BY a.idx DESC";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getDataNotaTagihanApp';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'administrator.php/app_users/getViewNotaTagihanApp';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);
        $this->db->where('id_modul',3);
        $x['level'] = $this->db->get('tbl01_acc_level')->result();

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('app_users/NotaTagihanApp/getData',$x);
    }
    public function tambahNotaTagihanApp(){      
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $x['header'] = $this->load->view('template/header','',true);
            $y['contentTitle'] = "Entry User Nota Tagihan App";        
            $x['content'] = $this->load->view('app_users/NotaTagihanApp/templateEntry',$y,true); 
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'administrator.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }        
    }
    function getSelectViewNotaTagihanApp(){
        $sLike = $_POST['sLike'];
        $SQL = "SELECT a.*,b.profesi FROM tbl01_pegawai a LEFT JOIN tbl01_profesi b ON a.profId=b.idx  
        WHERE NRP NOT IN(SELECT NRP FROM tbl01_users_nota_tagihan) AND 
        (NRP LIKE '%$sLike%' OR profesi LIKE '%$sLike%' OR pgwNama LIKE '%$sLike%') LIMIT 50";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('app_users/NotaTagihanApp/getSelect',$x);
    }
    function pilihNotaTagihanApp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $this->db->where('NRP',  $this->input->post('NRP',TRUE));
                $cekQuery = $this->db->get('tbl01_users_nota_tagihan'); 
                if($cekQuery->num_rows() > 0){
                    $response['code'] = 101;
                    $response['message'] = "Ops. User telah terdaftar. Coba ulangi kembali.";                    
                }else{
                    $params = array(
                        'NRP' => $this->input->post('NRP',TRUE),'levelid'=>4
                    );
                    $cekCommand = $this->db->insert('tbl01_users_nota_tagihan',$params); 
                    if($cekCommand){
                        $response['code'] = 200;
                        $response['message'] = "Data sukses disimpan.";                                            
                    }else{
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                    }
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
    function hapusNotaTagihanApp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['NRP'])){
                    if($_POST['NRP'] == ""){
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{
                        $cekCommand = $this->db->query("DELETE FROM tbl01_users_nota_tagihan WHERE NRP = '$_POST[NRP]'"); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Hapus data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
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

    #FarmasiApp
    public function getTabFarmasiApp(){      
        $this->load->view('app_users/FarmasiApp/tableMain');
    }
    function getViewRuangFarmasiApp(){
        $this->db->where('NRP',$_POST['NRP']);  
        $x['getAksesAvailable'] = $this->db->get('tbl01_users_farmasi');  
        $x['getRuang'] = $this->db->get('tbl04_lokasi');  
        $this->load->view('app_users/FarmasiApp/getDataRuang',$x);
    }
    function simpanRuangFarmasiApp(){
        if(isset($_POST['chkRuang']) AND isset($_POST['NRP'])){
            $queDelete = $this->db->query("DELETE FROM tbl01_users_farmasi WHERE NRP = '$_POST[NRP]'");
            if($queDelete){
                for($i=0; $i < count($_POST['chkRuang']); $i++){
                    $item = $_POST['chkRuang'][$i];
                    $dataDetail = array(
                        'NRP' => $_POST['NRP'],
                        'ruang_akses' => $item,
                    );
                    $this->db->insert('tbl01_users_farmasi',$dataDetail);
                }
                $response['code'] = 200;
                $response['message'] = "Ruang akses telah di set.";
            }else{
                $response['code'] = 404;
                $response['message'] = "Ops. Query error. Periksa koneksi database anda atau hubungi administrator";
            }
        }else{
            $response['code'] = 404;
            $response['message'] = "Ops. Option ruang tidak ada yang dipilih atau petugas tidak diset.";
        }

        echo json_encode($response);
    }
    function getViewFarmasiApp(){
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
            $condition .= "WHERE a.NRP = '$sLike' OR  pgwNama LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);

        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE a.NRP = '$sLike' OR  pgwNama LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT a.*,b.pgwNama,d.level,
        GROUP_CONCAT(DISTINCT c.NMLOKASI ORDER BY c.NMLOKASI DESC SEPARATOR '<br/>') AS ruang 
        FROM tbl01_users_farmasi a 
        LEFT JOIN tbl01_pegawai b ON a.NRP=b.nrp 
        LEFT JOIN tbl04_lokasi c ON a.ruang_akses=c.KDLOKASI 
        LEFT join tbl01_acc_level d ON a.levelid=d.idx 
        $condition GROUP BY NRP ORDER BY a.idx DESC";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getDataFarmasiApp';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'administrator.php/app_users/getViewFarmasiApp';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);
        //Get Level
        $this->db->where('id_modul',4);
        $x['level'] = $this->db->get('tbl01_acc_level')->result();

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('app_users/FarmasiApp/getData',$x);
    }
    function setlevel(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $nrp        = $this->input->post('nrp');
                $levelid    = $this->input->post('levelid');
                $modul      = $this->input->post('modul');
                $level = array('levelid'=>$levelid);
                $tabel = array('1'=>'tbl01_users_admin','2'=>'tbl01_users_mr_registrasi','3'=>'tbl01_users_nota_tagihan','4'=>'tbl01_users_farmasi','5'=>'tbl01_users_kasir','6'=>'tbl01_users_mr_dokumen');
                $this->db->where('NRP',$nrp);
                $this->db->update($tabel[$modul],$level);
                $response['code'] = 200;
                $response['message'] = "OK";
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
    public function tambahFarmasiApp(){      
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $x['header'] = $this->load->view('template/header','',true);
            $y['contentTitle'] = "Entry User Farmasi App";
            $x['content'] = $this->load->view('app_users/FarmasiApp/templateEntry',$y,true); 
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'administrator.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }        
    }
    function getSelectViewFarmasiApp(){
        $sLike = $_POST['sLike'];
        $SQL = "SELECT a.*,b.profesi FROM tbl01_pegawai a LEFT JOIN tbl01_profesi b ON a.profId=b.idx  
        WHERE NRP NOT IN(SELECT NRP FROM tbl01_users_farmasi) AND 
        (NRP LIKE '%$sLike%' OR profesi LIKE '%$sLike%' OR pgwNama LIKE '%$sLike%') LIMIT 50";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('app_users/FarmasiApp/getSelect',$x);
    }
    function pilihFarmasiApp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $this->db->where('NRP',  $this->input->post('NRP',TRUE));
                $cekQuery = $this->db->get('tbl01_users_farmasi'); 
                if($cekQuery->num_rows() > 0){
                    $response['code'] = 101;
                    $response['message'] = "Ops. User telah terdaftar. Coba ulangi kembali.";                    
                }else{
                    $params = array(
                        'NRP' => $this->input->post('NRP',TRUE)
                    );
                    $cekCommand = $this->db->insert('tbl01_users_farmasi',$params); 
                    if($cekCommand){
                        $response['code'] = 200;
                        $response['message'] = "Data sukses disimpan.";                                            
                    }else{
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                    }
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
    function hapusFarmasiApp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['idx'])){
                    if($_POST['idx'] == ""){
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{
                        $cekCommand = $this->db->query("DELETE FROM tbl01_users_farmasi WHERE NRP = '$_POST[idx]'"); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Hapus data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
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

    #KasirApp
    public function getTabKasirApp(){      
        $this->load->view('app_users/KasirApp/tableMain');
    }
    function getViewKasirApp(){
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
            $condition .= "WHERE a.NRP = '$sLike' OR  pgwNama LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);

        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE a.NRP = '$sLike' OR  pgwNama LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT a.*,b.pgwNama,c.level FROM tbl01_users_kasir a LEFT JOIN tbl01_pegawai b ON a.NRP=b.nrp LEFT JOIN tbl01_acc_level c ON a.levelid = c.idx
        $condition ORDER BY a.idx DESC";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getDataKasirApp';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'administrator.php/app_users/getViewKasirApp';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);
        $this->db->where('id_modul',5);
        $x['level'] = $this->db->get('tbl01_acc_level')->result();
        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('app_users/KasirApp/getData',$x);
    }
    public function tambahKasirApp(){      
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $x['header'] = $this->load->view('template/header','',true);
            $y['contentTitle'] = "Entry User Kasir App";
            $x['content'] = $this->load->view('app_users/KasirApp/templateEntry',$y,true); 
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'administrator.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }        
    }
    function getSelectViewKasirApp(){
        $sLike = $_POST['sLike'];
        $SQL = "SELECT a.*,b.profesi FROM tbl01_pegawai a LEFT JOIN tbl01_profesi b ON a.profId=b.idx  
        WHERE NRP NOT IN(SELECT NRP FROM tbl01_users_kasir) AND 
        (NRP LIKE '%$sLike%' OR profesi LIKE '%$sLike%' OR pgwNama LIKE '%$sLike%') LIMIT 50";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('app_users/KasirApp/getSelect',$x);
    }
    function pilihKasirApp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $this->db->where('NRP',  $this->input->post('NRP',TRUE));
                $cekQuery = $this->db->get('tbl01_users_kasir'); 
                if($cekQuery->num_rows() > 0){
                    $response['code'] = 101;
                    $response['message'] = "Ops. User telah terdaftar. Coba ulangi kembali.";                    
                }else{
                    $params = array(
                        'NRP' => $this->input->post('NRP',TRUE)
                    );
                    $cekCommand = $this->db->insert('tbl01_users_kasir',$params); 
                    if($cekCommand){
                        $response['code'] = 200;
                        $response['message'] = "Data sukses disimpan.";                                            
                    }else{
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                    }
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
    function hapusKasirApp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['idx'])){
                    if($_POST['idx'] == ""){
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{
                        $cekCommand = $this->db->query("DELETE FROM tbl01_users_kasir WHERE idx = '$_POST[idx]'"); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Hapus data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
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
}

