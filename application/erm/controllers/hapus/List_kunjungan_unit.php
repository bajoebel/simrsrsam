<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class list_kunjungan_unit extends CI_Controller {
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
            $z = setNav("nav_8");
            $x['index_menu'] = 5;
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Lokasi Pelayanan";        
            $NRP = $this->session->userdata('get_uid');
            $y['getRuang'] = $this->db->query("SELECT * FROM tbl01_ruang 
                WHERE idx IN (SELECT ruang_akses FROM tbl01_users_nota_tagihan 
                WHERE NRP = '$NRP') ORDER BY ruang");

            $x['content'] = $this->load->view('list_kunjungan_unit/template_ruang',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'erm.php/login?sid='.$sid;
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
                        $x['index_menu'] = 5;
                        $x['header'] = $this->load->view('template/header','',true);
                        $z = setNav("nav_7");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                        $y['ruangID'] = $this->session->userdata('kdlokasi');                        
                        $y['contentTitle'] = "List Pasien Keluar di " . getRuangByID($this->session->userdata('kdlokasi'));        

                        $x['content'] = $this->load->view('list_kunjungan_unit/template_cari_kunjungan_unit',$y,true);
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
            $url_login = base_url().'erm.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }        
    }
    public function list_kunjungan_unit_by_ruang(){      
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if($this->session->userdata('kdlokasi')){
                    if($this->session->userdata('kdlokasi') == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Lokasi Layanan tidak ditemukan. Coba ulangi kembali.";
                    }else{
                        $x['index_menu'] = 5;
                        $x['header'] = $this->load->view('template/header','',true);
                        $z = setNav("nav_7");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                        $y['ruangID'] = $this->session->userdata('kdlokasi');                        
                        $y['contentTitle'] = "List Pasien Keluar di " . getRuangByID($this->session->userdata('kdlokasi'));        

                        $x['content'] = $this->load->view('list_kunjungan_unit/template_cari_kunjungan_unit',$y,true);
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
            $url_login = base_url().'erm.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }        
    }
    
    public function cari_kunjungan_unit(){
        $tglAwal = $_POST['tglAwal'];
        $tglAkhir = $_POST['tglAkhir'];
        $id_ruang = $_POST['id_ruang'];

        $SQL = "SELECT * FROM tbl02_pasien_pulang 
        WHERE (DATE_FORMAT(tgl_keluar,'%Y-%m-%d') BETWEEN '$tglAwal' AND '$tglAkhir') 
        AND id_ruang = '$id_ruang'";
        // echo $SQL;
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('list_kunjungan_unit/get_data_kunjungan_unit',$x);
    }

    function cetak_kunjungan_unit(){
        $tAwal = $_GET['tAwal'];
        $tAkhir = $_GET['tAkhir'];
        $id_ruang = $_GET['id_ruang'];
        
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if(isset($_GET['tAwal']) && isset($_GET['tAkhir'])){
                    if($_GET['tAwal'] == "" || $_GET['tAkhir'] == ""){
                        echo "<script>alert('Ops. Post data kosong! Silahkan coba kembali.');
                        window.close();
                        </script>";
                    }else{
                        $SQL = "SELECT * FROM tbl02_pasien_pulang 
                        WHERE (DATE_FORMAT(tgl_keluar,'%Y-%m-%d') BETWEEN '$tAwal' AND '$tAkhir')
                        AND id_ruang = '$id_ruang'";

                        $cekCommand = $this->db->query("$SQL"); 
                        if($cekCommand->num_rows() > 0){
                            $x['tAwal'] = $tAwal;
                            $x['tAkhir'] = $tAkhir;
                            $x['id_ruang'] = $id_ruang;
                            $this->load->view('list_kunjungan_unit/print_preview',$x);
                        }else{
                            echo "<script>alert('Ops. Data tidak ditemukan.\nPeriksa kode rekap anda.');
                            window.close();</script>";
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
        $tAwal = $_POST['tAwal'];
        $tAkhir = $_POST['tAkhir'];
        $id_ruang = $_POST['id_ruang'];

        $SQL = "SELECT * FROM tbl02_pasien_pulang
        WHERE (DATE_FORMAT(tgl_keluar,'%Y-%m-%d') BETWEEN '$tAwal' AND '$tAkhir')
        AND id_ruang = '$id_ruang' ORDER BY tgl_masuk";

        $x['SQLItem'] = $this->db->query("$SQL"); 
        $this->load->view('list_kunjungan_unit/get_print_data',$x);
    }
    
    
}

