<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class laporan_kunjungan extends CI_Controller {
    public function __construct(){
        parent ::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
    }
    public function index(){      
        $this->kunjungan_rs();       
    }
    public function kunjungan_rs(){      
        $ses_state = $this->users_model->cek_session_id();
        $y['index_menu'] = 8;
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_6");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Laporan Kunjungan Pasien di Rumah Sakit";

            $x['content'] = $this->load->view('laporan_kunjungan/template_cari_kunjungan_rs',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }        
    }
    public function cari_kunjungan_rs(){
        $tglAwal = $_POST['tglAwal'];
        $SQL = "SELECT * FROM tbl02_pendaftaran a JOIN tbl01_pasien b on a.nomr=b.nomr
        WHERE DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = '$tglAwal' 
        AND reg_unit NOT IN(SELECT reg_unit FROM tbl02_pendaftaran_batal)
        GROUP BY id_daftar";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('laporan_kunjungan/get_data_kunjungan_rs',$x);
    }
    
    public function kunjungan_unit(){      
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_6");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['index_menu'] = 8;
            $y['contentTitle'] = "Laporan Kunjungan Pasien di Unit Pelayanan";        

            $this->db->order_by('ruang','asc');  
            $y['getRuang'] = $this->db->get('tbl01_ruang');

            $x['content'] = $this->load->view('laporan_kunjungan/template_cari_kunjungan_unit',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }        
    }
    public function cari_kunjungan_unit(){
        $tglAwal = $_POST['tglAwal'];
        $cmbUnit = $_POST['cmbUnit'];
        if($cmbUnit == ""){
            $SQL = "SELECT a.*, b.alamat FROM tbl02_pendaftaran a JOIN tbl01_pasien b on a.nomr=b.nomr
            WHERE DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = '$tglAwal' 
            AND reg_unit NOT IN(SELECT reg_unit FROM tbl02_pendaftaran_batal)";
        }else{
            $SQL = "SELECT a.*, b.alamat FROM tbl02_pendaftaran a JOIN tbl01_pasien b on a.nomr=b.nomr
            WHERE (DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = '$tglAwal') AND id_ruang = '$cmbUnit'
            AND reg_unit NOT IN(SELECT reg_unit FROM tbl02_pendaftaran_batal)";
        }
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('laporan_kunjungan/get_data_kunjungan_unit',$x);
    }
    
}

