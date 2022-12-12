<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class list_nota_tagihan extends CI_Controller {
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
        /*$ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $x['index_menu'] = 3;
            $z = setNav("nav_6");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Lokasi Pelayanan";        
            
            $NRP = $this->session->userdata('get_uid');
            $y['getRuang'] = $this->db->query("SELECT * FROM tbl01_ruang 
                WHERE idx IN (SELECT ruang_akses FROM tbl01_users_nota_tagihan 
                WHERE NRP = '$NRP') AND grid=1 ORDER BY ruang");
            $jmlruang=$y['getRuang']->num_rows();
            //$jmlruang=2;
            if($jmlruang==1) {
                $kdlok=$y['getRuang']->row()->idx;
                header('location:'.base_url() ."nota_tagihan.php/list_nota_tagihan/list_nota_tagihan_by_ruang?kLok=" .$kdlok);
            }else{
                $x['content'] = $this->load->view('list_nota_tagihan/template_ruang',$y,true);
                $this->load->view('template/theme',$x);
            }
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        } */
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if($this->session->userdata('kdlokasi')){
                    if($this->session->userdata('kdlokasi') == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Lokasi Layanan tidak ditemukan. Coba ulangi kembali.";
                    }else{
                        $y['ruangID'] = $this->session->userdata('kdlokasi');    
                        $x['index_menu']=3;
                        $x['header'] = $this->load->view('template/header','',true);
                        $z = setNav("nav_6");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                        $y['contentTitle'] = "List Nota Tagihan Pasien";        

                        $x['content'] = $this->load->view('list_nota_tagihan/template_cari_data',$y,true);
                        $this->load->view('template/theme',$x);
                    }
                }else{
                    $response['code'] = 402;
                    $response['message'] = "Ops. Ada kesalahan permintaan {I-NA}. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 403;
                $response['message'] = "Ops. Ada kesalahan permintaan {RM-NA}. Coba ulangi kembali.";
            }            
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }           
    }

    public function ranap(){        
        /*$ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['index_menu'] = 3;
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_6");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Lokasi Pelayanan";        
            
            $NRP = $this->session->userdata('get_uid');
            $y['getRuang'] = $this->db->query("SELECT * FROM tbl01_ruang 
                WHERE idx IN (SELECT ruang_akses FROM tbl01_users_nota_tagihan 
                WHERE NRP = '$NRP') AND grid=2 ORDER BY ruang");
            $jmlruang=$y['getRuang']->num_rows();
            if($jmlruang==1) {
                $kdlok=$y['getRuang']->row()->idx;
                header('location:'.base_url() ."nota_tagihan.php/list_nota_tagihan/list_nota_tagihan_by_ruang?kLok=" .$kdlok);
            }else{
                $x['content'] = $this->load->view('list_nota_tagihan/template_ruang',$y,true);
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
                        $response['code'] = 401;
                        $response['message'] = "Ops. Lokasi Layanan tidak ditemukan. Coba ulangi kembali.";
                    }else{
                        $y['ruangID'] = $this->session->userdata('kdlokasi');    
                        $x['index_menu']=3;
                        $x['header'] = $this->load->view('template/header','',true);
                        $z = setNav("nav_6");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                        $y['contentTitle'] = "List Nota Tagihan Pasien";        

                        $x['content'] = $this->load->view('list_nota_tagihan/template_cari_data',$y,true);
                        $this->load->view('template/theme',$x);
                    }
                }else{
                    $response['code'] = 402;
                    $response['message'] = "Ops. Ada kesalahan permintaan {I-NA}. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 403;
                $response['message'] = "Ops. Ada kesalahan permintaan {RM-NA}. Coba ulangi kembali.";
            }            
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }          
    }

    public function penunjang(){        
        /*$ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['index_menu'] = 3;
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_6");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Lokasi Pelayanan";        
            
            $NRP = $this->session->userdata('get_uid');
            $y['getRuang'] = $this->db->query("SELECT * FROM tbl01_ruang 
                WHERE idx IN (SELECT ruang_akses FROM tbl01_users_nota_tagihan 
                WHERE NRP = '$NRP') AND grid=3 ORDER BY ruang");
            $jmlruang=$y['getRuang']->num_rows();
            if($jmlruang==1) {
                $kdlok=$y['getRuang']->row()->idx;
                header('location:'.base_url() ."nota_tagihan.php/list_nota_tagihan/list_nota_tagihan_by_ruang?kLok=" .$kdlok);
            }else{
                $x['content'] = $this->load->view('list_nota_tagihan/template_ruang',$y,true);
                $this->load->view('template/theme',$x);
            }
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }   */
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if($this->session->userdata('kdlokasi')){
                    if($this->session->userdata('kdlokasi') == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Lokasi Layanan tidak ditemukan. Coba ulangi kembali.";
                    }else{
                        $y['ruangID'] = $this->session->userdata('kdlokasi');    
                        $x['index_menu']=3;
                        $x['header'] = $this->load->view('template/header','',true);
                        $z = setNav("nav_6");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                        $y['contentTitle'] = "List Nota Tagihan Pasien";        

                        $x['content'] = $this->load->view('list_nota_tagihan/template_cari_data',$y,true);
                        $this->load->view('template/theme',$x);
                    }
                }else{
                    $response['code'] = 402;
                    $response['message'] = "Ops. Ada kesalahan permintaan {I-NA}. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 403;
                $response['message'] = "Ops. Ada kesalahan permintaan {RM-NA}. Coba ulangi kembali.";
            }            
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }         
    }

    function igd(){      
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                $this->session->unset_userdata('sPage');
                $this->session->unset_userdata('sLike');
                $x['header'] = $this->load->view('template/header','',true);
                $z = setNav("nav_6");
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
                $y['contentTitle'] = "Cari Pasien";        
                $x['content'] = $this->load->view('list_nota_tagihan/template_igd',$y,true);
                $this->load->view('template/theme',$x);
                    
            }else{
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
            }            
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }        
    }
    public function list_nota_tagihan_by_ruang(){      
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if($this->session->userdata('kdlokasi')){
                    if($this->session->userdata('kdlokasi') == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Lokasi Layanan tidak ditemukan. Coba ulangi kembali.";
                    }else{
                        $y['ruangID'] = $this->session->userdata('kdlokasi');    
                        $x['index_menu']=3;
                        $x['header'] = $this->load->view('template/header','',true);
                        $z = setNav("nav_6");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                        $y['contentTitle'] = "List Nota Tagihan Pasien";        

                        $x['content'] = $this->load->view('list_nota_tagihan/template_cari_data',$y,true);
                        $this->load->view('template/theme',$x);
                    }
                }else{
                    $response['code'] = 402;
                    $response['message'] = "Ops. Ada kesalahan permintaan {I-NA}. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 403;
                $response['message'] = "Ops. Ada kesalahan permintaan {RM-NA}. Coba ulangi kembali.";
            }            
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }        
    }
    
    public function cari_nota(){
        $ruangID = @$_POST['ruangID'];
        $cmbFilter = @$_POST['cmbFilter'];
        $keyword = @$_POST['keyword'];

        $SQL = "SELECT a.*,b.nama_pasien,b.nama_ruang,SUM(sub_total_tarif) AS subTotal 
        FROM tbl03_nota_detail a LEFT JOIN tbl02_pendaftaran b ON a.reg_unit=b.reg_unit";
        if($ruangID=="IGD") $SQL.=" WHERE b.jns_layanan='GD' ";
        else $SQL .= " WHERE b.id_ruang = '$ruangID' ";

        if($cmbFilter == 'id_daftar'){
            $SQL .= "AND a.id_daftar = '$keyword' ";
        }elseif($cmbFilter == 'reg_unit'){
            $SQL .= "AND a.reg_unit = '$keyword' ";
        }elseif($cmbFilter == 'nomr'){
            $SQL .= "AND a.nomr = '$keyword' ";
        }
        $SQL .= "GROUP BY a.reg_unit LIMIT 20";
        $x['SQL'] = $this->db->query("$SQL");
        //echo $SQL;exit;
        $this->load->view('list_nota_tagihan/getdata',$x);
    }
    
    
}

