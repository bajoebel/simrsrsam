<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class stok_opname extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
    }
    function index(){
        /*$ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_4");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $UID = $this->session->userdata('get_uid');
            $SQL = "SELECT * FROM tbl04_lokasi 
            WHERE KDLOKASI IN(SELECT ruang_akses FROM tbl01_users_farmasi WHERE NRP = '$UID')";
            $y['getRuang'] = $this->db->query("$SQL");

            $y['contentTitle'] = "Data Koreksi Stok Opname"; 
            $x['content'] = $this->load->view('stok_opname/template_ruang',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }*/

        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        if($ses_state){
            if ($this->session->userdata('kdlokasi')) {
                $y['kLok'] = $this->session->userdata('kdlokasi');
                if ($y['kLok']=="") {
                    echo "<script>alert('Ops. Lokasi tidak ditemukan.');history.back();</script>";                        
                }else{
                    $x['header'] = $this->load->view('template/header','',true);
                    $z = setNav("nav_4");
                    $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
                    $y['index_menu'] = 4;
                    $y['contentTitle'] = "Data Koreksi Stok Opname";
                    $y['contentTitle'] .= "<br/>Lokasi : " . getLokasiById($y['kLok']);        
                    $x['content'] = $this->load->view('stok_opname/template_table',$y,true);
                    $this->load->view('template/theme',$x);
                }
            }else{
                echo "<script>alert('Ops. Variable tidak ditemukan.');history.back();</script>";
            }
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }            
    }

    function goForm(){
        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        if($ses_state){
            if (isset($_GET['kLok'])) {
                $y['kLok'] = $this->input->get('kLok',true);
                if ($y['kLok']=="") {
                    echo "<script>alert('Ops. Lokasi tidak ditemukan.');history.back();</script>";                        
                }else{
                    $x['header'] = $this->load->view('template/header','',true);
                    $z = setNav("nav_4");
                    $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                    $y['contentTitle'] = "Data Koreksi Stok Opname";
                    $y['contentTitle'] .= "<br/>Lokasi : " . getLokasiById($y['kLok']);        
                    $x['content'] = $this->load->view('stok_opname/template_table',$y,true);
                    $this->load->view('template/theme',$x);
                }
            }else{
                echo "<script>alert('Ops. Variable tidak ditemukan.');history.back();</script>";
            }
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }            
    }

    function getView(){
        if(isset($_POST['page'])):
            $offset = $this->input->post('page',true);
            $this->session->set_userdata('sPage',$offset);
        else:
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;

        $KDLOKASI = (isset($_POST['kLok'])) ? $this->input->post('kLok',true) : "";

        $limit = $this->perPage;
        $condition = "WHERE KDLOKASI='$KDLOKASI' ";
        if(isset($_POST['sLike'])){
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "AND (NOBUKTI LIKE '%$sLike%' OR NMBRG LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (NOBUKTI LIKE '%$sLike%' OR NMBRG LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT * FROM tbl04_koreksi_stok $condition ORDER BY KDKOREKSI";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'farmasi.php/stok_opname/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        echo "$SQL LIMIT $offset,$limit";
        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('stok_opname/getdata',$x);
    }

    function tambah(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if ($this->session->userdata('kdlokasi')) {
                $y['kLok'] = $this->session->userdata('kdlokasi');
                if ($y['kLok']=="") {
                    echo "<script>alert('Ops. Lokasi tidak ditemukan.');history.back();</script>";
                }else{
                    $x['header'] = $this->load->view('template/header','',true);
                    $z = setNav("nav_4");
                    $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
                    $y['index_menu'] = 4;
                    $y['contentTitle'] = "Entry Data Koreksi Stok Opname";        
                    $y['contentTitle'] .= "<br/>Lokasi : " . getLokasiById($y['kLok']);        
                    
                    $x['content'] = $this->load->view('stok_opname/template_entry',$y,true);
                    $this->load->view('template/theme',$x);
                }
            }else{
                echo "<script>alert('Ops. Variable tidak ditemukan.');history.back();</script>";
            }
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }            
    }


    function getObat(){
        $KDLOKASI = $_POST['KDLOKASI'];
        $KEYWORDS = $_POST['KEYWORDS'];
            
        $SQL = "SELECT a.KDBRG,b.NMBRG,a.KDLOKASI,c.NMLOKASI,a.TGLBELI,a.HMODAL,SUM(a.JSTOK) AS JSTOK
        FROM stok_barang_fifo a 
        LEFT JOIN tbl04_barang b ON a.KDBRG=b.KDBRG
        LEFT JOIN tbl04_lokasi c ON a.KDLOKASI=c.KDLOKASI
        WHERE (NMBRG LIKE '%$KEYWORDS%' OR a.KDBRG LIKE '%$KEYWORDS%') AND a.KDLOKASI = '$KDLOKASI' 
        GROUP BY a.KDBRG,a.KDLOKASI ORDER BY NMBRG LIMIT 100";
        
        echo "$SQL";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('stok_opname/getstok',$x);
    }

    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['KDLOKASI']) &&
                    isset($_POST['NMLOKASI']) &&
                    isset($_POST['KDBRG']) &&
                    isset($_POST['NMBRG']) &&
                    isset($_POST['JMLSTOK_DIKOREKSI']) &&
                    isset($_POST['JMLKOREKSI']) &&
                    isset($_POST['JMLREAL']) &&
                    isset($_POST['NOBUKTI']) &&
                    isset($_POST['ALASAN'])
                ){
                    $params = array(
                        'KDLOKASI' => $this->input->post('KDLOKASI',TRUE),
                        'NMLOKASI' => $this->input->post('NMLOKASI',TRUE),
                        'KDBRG' => $this->input->post('KDBRG',TRUE),
                        'NMBRG' => $this->input->post('NMBRG',TRUE),
                        'JMLSTOK_DIKOREKSI' => $this->input->post('JMLSTOK_DIKOREKSI',TRUE),
                        'JMLKOREKSI' => $this->input->post('JMLKOREKSI',TRUE),
                        'JMLREAL' => $this->input->post('JMLREAL',TRUE),
                        'NOBUKTI' => $this->input->post('NOBUKTI',TRUE),
                        'ALASAN' => $this->input->post('ALASAN',TRUE),
                        'UEXEC' => $this->session->userdata('get_uid')
                    );
                    if(
                        $params['KDLOKASI'] == "" || 
                        $params['KDBRG'] == "" || 
                        $params['JMLSTOK_DIKOREKSI'] == "" || 
                        $params['JMLKOREKSI'] == "" || 
                        $params['JMLREAL'] == "" || 
                        $params['NOBUKTI'] == "" || 
                        $params['ALASAN'] == ""
                    ){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Data masih ada yang kosong. Silahkan lengkapi data";
                        $response['csrf']= $this->security->get_csrf_hash();    
                    }else{
                        $queSQL = "SELECT * FROM stok_barang_fifo 
                            WHERE KDLOKASI='$params[KDLOKASI]' AND KDBRG='$params[KDBRG]' 
                            ORDER BY TGLBELI DESC, TGLEXP DESC LIMIT 1";
                        
                        $cekSQL = $this->db->query("$queSQL");
                        if($cekSQL->num_rows() > 0){
                            $resSQL = $cekSQL->row_array();
                            $params['TGLBELI'] = $resSQL['TGLBELI'];
                            $params['HMODAL'] = $resSQL['HMODAL'];
                            $params['EXPDATE'] = $resSQL['TGLEXP'];
                            $cekCommand = $this->db->insert('tbl04_koreksi_stok',$params); 
                            if($cekCommand){
                                $response['code'] = 200;
                                $response['message'] = "Simpan data sukses.";
                                $response['csrf'] = $this->security->get_csrf_hash();
                            }else{
                                $response['code'] = 402;
                                $response['message'] = "Ops. Query error! Silahkan hubungi farmasi.";
                                $response['csrf'] = $this->security->get_csrf_hash();
                            }
                        }else{
                            $response['code'] = 402;
                            $response['message'] = "Ops. Query error! Silahkan hubungi farmasi.";
                            $response['csrf'] = $this->security->get_csrf_hash();
                        } 
                    }
                }else{
                    $response['code'] = 403;
                    $response['message'] = "Ops. Variable tidak ditemukan.\nCoba ulangi kembali.";
                    $response['csrf'] = $this->security->get_csrf_hash();
                }
            }else{
                $response['code'] = 404;
                $response['message'] = "Ops. Method tidak diizinkan.\nCoba ulangi kembali.";
                $response['csrf'] = $this->security->get_csrf_hash();
            }
        }else{
            $response['code'] = 405;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
            $response['csrf'] = $this->security->get_csrf_hash();
        }
        echo json_encode($response);
    }
}
?>