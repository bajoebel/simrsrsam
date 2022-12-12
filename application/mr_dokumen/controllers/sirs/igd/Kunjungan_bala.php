<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class kunjungan_bala extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('users_model');
    }
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_6");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['index_menu'] = 6;
            $y['contentTitle'] = "SIRS - [Kunjungan Baru-Lama]";        
            $y['contentTitle'] .= "<br/>Jns. Layanan : IGD";        
            $x['content'] = $this->load->view('sirs/igd/kunjungan_bala/template_form',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'mr_dokumen.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function getReport(){
        $thn = (isset($_POST['Tahun'])) ? trim($this->input->post('Tahun',true)) : '';
        $SQL = "SELECT 
        IF(a.jns_kunjungan=0,'Baru',IF(a.jns_kunjungan=1,'Lama',NULL)) AS kunjungan,
        SUM(IF(b.jns_kunjungan=0,1,IF(b.jns_kunjungan=1,1,0))) AS Jumlah
        FROM (SELECT 0 AS jns_kunjungan UNION SELECT 1 AS jns_kunjungan) a LEFT JOIN
        (SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_masuk,'%Y') = '$thn' AND jns_layanan='GD') b 
        ON a.jns_kunjungan=b.jns_kunjungan
        GROUP BY a.jns_kunjungan";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('sirs/igd/kunjungan_bala/getdata',$x);
    }
    function cetak(){
        $x['thn'] = (isset($_GET['thn'])) ? trim($_GET['thn']) : '';
        $SQL = "SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_masuk,'%Y') = '$x[thn]' 
        AND jns_layanan='GD'";
        $cek = $this->db->query("$SQL");
        if ($cek->num_rows() > 0) {
            $x['SQL'] = $cek;
            $this->load->view('sirs/igd/kunjungan_bala/print',$x);
        }else{
            echo "<script>alert('Ops. Data tidak ditemukan.');window.close();</script>";
        }
    }
    function getdata(){
        $thn = (isset($_POST['thn'])) ? $_POST['thn'] : ""; 
        $SQL = "SELECT 
        IF(a.jns_kunjungan=0,'Baru',IF(a.jns_kunjungan=1,'Lama',NULL)) AS kunjungan,
        SUM(IF(b.jns_kunjungan=0,1,IF(b.jns_kunjungan=1,1,0))) AS Jumlah
        FROM (SELECT 0 AS jns_kunjungan UNION SELECT 1 AS jns_kunjungan) a LEFT JOIN
        (SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_masuk,'%Y') = '$thn' AND jns_layanan='GD') b 
        ON a.jns_kunjungan=b.jns_kunjungan
        GROUP BY a.jns_kunjungan"; 

        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('sirs/igd/kunjungan_bala/getitem',$x);        
    }
}
?>