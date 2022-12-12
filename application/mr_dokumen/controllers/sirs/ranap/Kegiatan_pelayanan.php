<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class kegiatan_pelayanan extends CI_Controller{
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
            $y['contentTitle'] = "SIRS - [KEGIATAN PELAYANAN]";        
            $y['contentTitle'] .= "<br/>Jns. Layanan : RANAP";        
            $x['content'] = $this->load->view('sirs/ranap/kegiatan_pelayanan/template_form',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'mr_dokumen.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function getReport(){
        $thn = (isset($_POST['Tahun'])) ? trim($this->input->post('Tahun',true)) : '';
        $SQL = "SELECT a.jenis_pelayanan,
        SUM(IF(DATE_FORMAT(tgl_masuk,'%Y')='2019',1,0)) AS 'PM',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%Y')='2019',los,0)) AS 'LR',
        SUM(IF(id_kelas=3,los,0)) AS 'HR3',
        SUM(IF(id_kelas=2,los,0)) AS 'HR2',
        SUM(IF(id_kelas=1,los,0)) AS 'HR1',
        SUM(IF(id_kelas=4,los,0)) AS 'HR4',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%Y')='2019' AND id_keadaan_keluar=2,1,0)) AS 'PK_48M',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%Y')='2019' AND id_keadaan_keluar=5,1,0)) AS 'PK_M48'
        FROM tbl01_jenis_pelayanan a LEFT JOIN 
        (SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_masuk,'%Y') = '$thn'
        AND jns_layanan='RI') b ON a.idx = b.id_tindakan_pelayanan
        GROUP BY a.idx"; 
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('sirs/ranap/kegiatan_pelayanan/getdata',$x);
    }
    function cetak(){
        $x['thn'] = (isset($_GET['thn'])) ? trim($_GET['thn']) : '';
        $SQL = "SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_masuk,'%Y') = '$x[thn]'
        AND jns_layanan='RI'";
        $cek = $this->db->query("$SQL");
        if ($cek->num_rows() > 0) {
            $x['SQL'] = $cek;
            $this->load->view('sirs/ranap/kegiatan_pelayanan/print',$x);
        }else{
            echo "<script>alert('Ops. Data tidak ditemukan.');window.close();</script>";
        }
    }
    function getdata(){
        $thn = (isset($_POST['thn'])) ? $_POST['thn'] : ""; 
        $SQL = "SELECT a.jenis_pelayanan,
        SUM(IF(DATE_FORMAT(tgl_masuk,'%Y')='2019',1,0)) AS 'PM',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%Y')='2019',los,0)) AS 'LR',
        SUM(IF(id_kelas=3,los,0)) AS 'HR3',
        SUM(IF(id_kelas=2,los,0)) AS 'HR2',
        SUM(IF(id_kelas=1,los,0)) AS 'HR1',
        SUM(IF(id_kelas=4,los,0)) AS 'HR4',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%Y')='2019' AND id_keadaan_keluar=2,1,0)) AS 'PK_48M',
        SUM(IF(DATE_FORMAT(tgl_keluar,'%Y')='2019' AND id_keadaan_keluar=5,1,0)) AS 'PK_M48'
        FROM tbl01_jenis_pelayanan a LEFT JOIN 
        (SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_masuk,'%Y') = '$thn'
        AND jns_layanan='RI') b ON a.idx = b.id_tindakan_pelayanan
        GROUP BY a.idx";
        
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('sirs/ranap/kegiatan_pelayanan/getitem',$x);        
    }
}
?>