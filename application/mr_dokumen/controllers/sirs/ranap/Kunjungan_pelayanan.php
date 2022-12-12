<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class kunjungan_pelayanan extends CI_Controller{
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
            $y['index_menu'] = 8;
            $y['contentTitle'] = "SIRS - [KUNJUNGAN BULANAN PER PELAYANAN]";        
            $y['contentTitle'] .= "<br/>Jns. Layanan : RANAP";        
            $x['content'] = $this->load->view('sirs/ranap/kunjungan_pelayanan/template_form',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'mr_dokumen.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function getReport(){
        $thn = (isset($_POST['Tahun'])) ? trim($this->input->post('Tahun',true)) : '';
        $SQL = "SELECT a.*,
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='01',1,0)) AS '01',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='02',1,0)) AS '02',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='03',1,0)) AS '03',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='04',1,0)) AS '04',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='05',1,0)) AS '05',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='06',1,0)) AS '06',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='07',1,0)) AS '07',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='08',1,0)) AS '08',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='09',1,0)) AS '09',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='10',1,0)) AS '10',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='11',1,0)) AS '11',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='12',1,0)) AS '12'
        FROM tbl01_jenis_pelayanan a LEFT JOIN 
        (SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_masuk,'%Y') = '$thn'
        AND jns_layanan='RI') b ON a.idx = b.id_tindakan_pelayanan
        GROUP BY a.idx"; 
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('sirs/ranap/kunjungan_pelayanan/getdata',$x);
    }
    function cetak(){
        $x['thn'] = (isset($_GET['thn'])) ? trim($_GET['thn']) : '';
        $SQL = "SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_masuk,'%Y') = '$x[thn]'
        AND jns_layanan='RI'";
        $cek = $this->db->query("$SQL");
        if ($cek->num_rows() > 0) {
            $x['SQL'] = $cek;
            $this->load->view('sirs/ranap/kunjungan_pelayanan/print',$x);
        }else{
            echo "<script>alert('Ops. Data tidak ditemukan.');window.close();</script>";
        }
    }
    function getdata(){
        $thn = (isset($_POST['thn'])) ? $_POST['thn'] : ""; 
        $SQL = "SELECT a.*,
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='01',1,0)) AS '01',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='02',1,0)) AS '02',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='03',1,0)) AS '03',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='04',1,0)) AS '04',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='05',1,0)) AS '05',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='06',1,0)) AS '06',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='07',1,0)) AS '07',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='08',1,0)) AS '08',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='09',1,0)) AS '09',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='10',1,0)) AS '10',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='11',1,0)) AS '11',
        SUM(IF(DATE_FORMAT(tgl_masuk,'%m')='12',1,0)) AS '12'
        FROM tbl01_jenis_pelayanan a LEFT JOIN 
        (SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_masuk,'%Y') = '$thn'
        AND jns_layanan='RI') b ON a.idx = b.id_tindakan_pelayanan
        GROUP BY a.idx"; 

        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('sirs/ranap/kunjungan_pelayanan/getitem',$x);        
    }
}
?>