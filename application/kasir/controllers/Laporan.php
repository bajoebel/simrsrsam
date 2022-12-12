<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class laporan extends CI_Controller {
    function __construct(){
        parent ::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
    }
    function index(){      
        $this->pendapatan();       
    }
    function pendapatan(){      
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_6");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['index_menu'] = 5;
            $y['getCaraBayar'] = $this->db->get('tbl01_cara_bayar');
            $y['contentTitle'] = "Laporan Pendapatan";        
            $x['content'] = $this->load->view('laporan/template_cari_kwitansi',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'kasir.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }        
    }

    function cari_kwitansi(){
        $tglAwal = $_POST['tglAwal'];
        $tglAkhir = $_POST['tglAkhir'];
        $cmbCaraBayar = $_POST['cmbCaraBayar'];

        if($cmbCaraBayar == "ALL"){
            $SQL = "SELECT * FROM tbl05_kwitansi LEFT JOIN tbl01_cara_bayar ON tbl05_kwitansi.id_cara_bayar=tbl01_cara_bayar.idx
            WHERE (DATE_FORMAT(tgl_kwitansi,'%Y-%m-%d') BETWEEN '$tglAwal' AND '$tglAkhir') 
            AND no_kwitansi NOT IN (SELECT no_kwitansi FROM tbl05_kwitansi_retur)";
        }else{
            $SQL = "SELECT * FROM tbl05_kwitansi LEFT JOIN tbl01_cara_bayar ON tbl05_kwitansi.id_cara_bayar=tbl01_cara_bayar.idx
            WHERE (DATE_FORMAT(tgl_kwitansi,'%Y-%m-%d') BETWEEN '$tglAwal' AND '$tglAkhir')  
            AND no_kwitansi NOT IN (SELECT no_kwitansi FROM tbl05_kwitansi_retur)
            AND id_cara_bayar = '$cmbCaraBayar'";
        }
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('laporan/get_data_kwitansi',$x);
    }

    function cetak_kwitansi(){
        $tAwal = $_GET['tAwal'];
        $tAkhir = $_GET['tAkhir'];
        $cara_bayar = $_GET['cara_bayar'];
        
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if(isset($_GET['tAwal']) && isset($_GET['tAkhir'])){
                    if($_GET['tAwal'] == "" || $_GET['tAkhir'] == ""){
                        echo "<script>alert('Ops. Post data kosong! Silahkan coba kembali.');
                        window.close();
                        </script>";
                    }else{

                        if($cara_bayar == "ALL"){
                            $SQL = "SELECT * FROM tbl05_kwitansi 
                            WHERE (DATE_FORMAT(tgl_kwitansi,'%Y-%m-%d') BETWEEN '$tAwal' AND '$tAkhir')
                            AND no_kwitansi NOT IN (SELECT no_kwitansi FROM tbl05_kwitansi_retur)";
                        }else{
                            $SQL = "SELECT * FROM tbl05_kwitansi
                            WHERE (DATE_FORMAT(tgl_kwitansi,'%Y-%m-%d') BETWEEN '$tAwal' AND '$tAkhir')
                            AND no_kwitansi NOT IN (SELECT no_kwitansi FROM tbl05_kwitansi_retur)
                            AND id_cara_bayar = '$cara_bayar'";
                        }

                        $cekCommand = $this->db->query("$SQL"); 
                        if($cekCommand->num_rows() > 0){
                            $x['tAwal'] = $tAwal;
                            $x['tAkhir'] = $tAkhir;
                            $x['cara_bayar'] = $cara_bayar;
                            $this->load->view('laporan/print_preview_1',$x);
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
        $tAwal = $_POST['tAwal'];
        $tAkhir = $_POST['tAkhir'];
        $cara_bayar = $_POST['cara_bayar'];
        if($cara_bayar == "ALL"){
            $SQL = "SELECT * FROM tbl05_kwitansi 
            WHERE (DATE_FORMAT(tgl_kwitansi,'%Y-%m-%d') BETWEEN '$tAwal' AND '$tAkhir')
            AND no_kwitansi NOT IN (SELECT no_kwitansi FROM tbl05_kwitansi_retur)
            ORDER BY tgl_kwitansi";
        }else{
            $SQL = "SELECT * FROM tbl05_kwitansi
            WHERE (DATE_FORMAT(tgl_kwitansi,'%Y-%m-%d') BETWEEN '$tAwal' AND '$tAkhir')
            AND no_kwitansi NOT IN (SELECT no_kwitansi FROM tbl05_kwitansi_retur)
            AND id_cara_bayar = '$cara_bayar' ORDER BY tgl_kwitansi";
        }
        $x['SQLItem'] = $this->db->query("$SQL"); 
        $this->load->view('laporan/get_print_data_1',$x);
    }

    function kwitansi_batal(){      
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_6");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['index_menu'] = 5;
            $y['contentTitle'] = "Laporan Kwitansi Batal";
            $x['content'] = $this->load->view('laporan/template_cari_kwitansi_batal',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'kasir.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }        
    }

    function cari_kwitansi_batal(){
        $tglAwal = $_POST['tglAwal'];
        $tglAkhir = $_POST['tglAkhir'];

        $SQL = "SELECT * FROM tbl05_kwitansi 
        WHERE (DATE_FORMAT(tgl_kwitansi,'%Y-%m-%d') BETWEEN '$tglAwal' AND '$tglAkhir')
        AND no_kwitansi IN (SELECT no_kwitansi FROM tbl05_kwitansi_retur)
        ORDER BY tgl_kwitansi";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('laporan/get_data_kwitansi_batal',$x);
    }
    function cetak_kwitansi_batal(){
        $tAwal = $_GET['tAwal'];
        $tAkhir = $_GET['tAkhir'];
        
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if(isset($_GET['tAwal']) && isset($_GET['tAkhir'])){
                    if($_GET['tAwal'] == "" || $_GET['tAkhir'] == ""){
                        echo "<script>alert('Ops. Post data kosong! Silahkan coba kembali.');
                        window.close();
                        </script>";
                    }else{
                        $SQL = "SELECT * FROM tbl05_kwitansi
                        WHERE (DATE_FORMAT(tgl_kwitansi,'%Y-%m-%d') BETWEEN '$tAwal' AND '$tAkhir')
                        AND no_kwitansi IN (SELECT no_kwitansi FROM tbl05_kwitansi_retur)";

                        $cekCommand = $this->db->query("$SQL"); 
                        if($cekCommand->num_rows() > 0){
                            $x['tAwal'] = $tAwal;
                            $x['tAkhir'] = $tAkhir;
                            $this->load->view('laporan/print_preview_2',$x);
                        }else{
                            echo "<script>alert('Ops. Data tidak ditemukan.\nPeriksa kode rekap anda.');
                            window.close();</script>";
                        }
                    }
                }else{
                    echo "<script>alert('Ops. Ada kesalahan permintaan. Coba ulangi kembali.');
                    window.close();</script>";
                }
            }else{
                echo "<script>alert('Ops. Ada kesalahan permintaan. Coba ulangi kembali.');
                window.close();</script>";
            }
        }else{
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.close();</script>";
        }
    }
    function get_print_data_batal(){
        $tAwal = $_POST['tAwal'];
        $tAkhir = $_POST['tAkhir'];
        $SQL = "SELECT * FROM tbl05_kwitansi
        WHERE (DATE_FORMAT(tgl_kwitansi,'%Y-%m-%d') BETWEEN '$tAwal' AND '$tAkhir')
        AND no_kwitansi IN (SELECT no_kwitansi FROM tbl05_kwitansi_retur)
        ORDER BY tgl_kwitansi";
        $x['SQLItem'] = $this->db->query("$SQL"); 
        $this->load->view('laporan/get_print_data_2',$x);
    }

}

