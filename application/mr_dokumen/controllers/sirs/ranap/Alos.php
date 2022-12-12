<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class alos extends CI_Controller{
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
            $y['contentTitle'] = "SIRS - [Average Long Of Stay (ALOS)]";        
            $y['contentTitle'] .= "<br/>Jns. Layanan : RANAP";   

            $this->db->where('grid','2');     
            $this->db->where('status_ruang', '1');
            $y['datRanap'] = $this->db->get('tbl01_ruang');     
            $x['content'] = $this->load->view('sirs/ranap/alos/template_form',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'mr_dokumen.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function getReport(){
        $thn = (isset($_POST['Tahun'])) ? trim($this->input->post('Tahun',true)) : '';
        $ranap = (isset($_POST['ranap'])) ? trim($this->input->post('ranap',true)) : '';

        if ($ranap=="ALL") {
            $condition = "";
        }else{
            $condition = " AND a.idx = '$ranap' ";
        }

        $SQL = "SELECT a.*,
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='01',los-1,0)) AS 'M01',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='02',los-1,0)) AS 'M02',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='03',los-1,0)) AS 'M03',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='04',los-1,0)) AS 'M04',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='05',los-1,0)) AS 'M05',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='06',los-1,0)) AS 'M06',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='07',los-1,0)) AS 'M07',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='08',los-1,0)) AS 'M08',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='09',los-1,0)) AS 'M09',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='10',los-1,0)) AS 'M10',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='11',los-1,0)) AS 'M11',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='12',los-1,0)) AS 'M12',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='01',1,0)) AS 'K01',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='02',1,0)) AS 'K02',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='03',1,0)) AS 'K03',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='04',1,0)) AS 'K04',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='05',1,0)) AS 'K05',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='06',1,0)) AS 'K06',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='07',1,0)) AS 'K07',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='08',1,0)) AS 'K08',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='09',1,0)) AS 'K09',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='10',1,0)) AS 'K10',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='11',1,0)) AS 'K11',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='12',1,0)) AS 'K12'
        FROM tbl01_ruang a LEFT JOIN 
        (SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_keluar,'%Y') = '$thn'
        AND jns_layanan='RI') b ON a.idx = b.id_ruang
        WHERE grid = 2 $condition
        GROUP BY a.idx"; 
        $x['SQL'] = $this->db->query("$SQL");
        $x['tahun'] = ($thn=="") ? date('Y') : $thn;
        $x['ranap'] = $ranap;
        $this->load->view('sirs/ranap/alos/getdata',$x);
    }
    function cetak(){
        $x['thn'] = (isset($_GET['thn'])) ? trim($_GET['thn']) : '';
        $x['ranap'] = (isset($_GET['ranap'])) ? trim($_GET['ranap']) : '';

        if ($x['ranap']=="ALL") {
            $SQL = "SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_keluar,'%Y') = '$x[thn]'
            AND jns_layanan='RI'";
        }else{
            $SQL = "SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_keluar,'%Y') = '$x[thn]'
            AND jns_layanan='RI' AND id_ruang = '$x[ranap]'";
        }

        $cek = $this->db->query("$SQL");
        if ($cek->num_rows() > 0) {
            $x['SQL'] = $cek;
            $this->load->view('sirs/ranap/alos/print',$x);
        }else{
            echo "<script>alert('Ops. Data tidak ditemukan.');window.close();</script>";
        }
    }
    function getdata(){
        $thn = (isset($_POST['Tahun'])) ? $_POST['Tahun'] : ""; 
        $ranap = (isset($_POST['ranap'])) ? trim($this->input->post('ranap',true)) : '';

        if ($ranap=="ALL") {
            $condition = "";
        }else{
            $condition = " AND a.idx = '$ranap' ";
        }

        $SQL = "SELECT a.*,
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='01',los-1,0)) AS 'M01',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='02',los-1,0)) AS 'M02',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='03',los-1,0)) AS 'M03',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='04',los-1,0)) AS 'M04',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='05',los-1,0)) AS 'M05',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='06',los-1,0)) AS 'M06',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='07',los-1,0)) AS 'M07',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='08',los-1,0)) AS 'M08',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='09',los-1,0)) AS 'M09',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='10',los-1,0)) AS 'M10',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='11',los-1,0)) AS 'M11',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='12',los-1,0)) AS 'M12',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='01',1,0)) AS 'K01',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='02',1,0)) AS 'K02',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='03',1,0)) AS 'K03',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='04',1,0)) AS 'K04',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='05',1,0)) AS 'K05',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='06',1,0)) AS 'K06',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='07',1,0)) AS 'K07',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='08',1,0)) AS 'K08',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='09',1,0)) AS 'K09',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='10',1,0)) AS 'K10',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='11',1,0)) AS 'K11',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%m')='12',1,0)) AS 'K12'
        FROM tbl01_ruang a LEFT JOIN 
        (SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_keluar,'%Y') = '$thn'
        AND jns_layanan='RI') b ON a.idx = b.id_ruang
        WHERE grid = 2 $condition
        GROUP BY a.idx"; 
        
        $x['tahun'] = ($thn=="") ? date('Y') : $thn;
        $x['ranap'] = $ranap;
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('sirs/ranap/alos/getitem',$x);        
    }
}
?>