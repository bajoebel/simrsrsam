<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pasien_pelayanan extends CI_Controller{
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
            $y['contentTitle'] = "SIRS - [JUMLAH PASIEN BERDASARKAN PELAYANAN]";        
            $y['contentTitle'] .= "<br/>Jns. Layanan : RANAP";        
            $x['content'] = $this->load->view('sirs/ranap/pasien_pelayanan/template_form',$y,true);
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
        SUM(IF(id_kelas=4 AND jns_kelamin=1,1,0)) AS 'KU_L',
        SUM(IF(id_kelas=4 AND jns_kelamin=0,1,0)) AS 'KU_P',
        SUM(IF(id_kelas=3 AND jns_kelamin=1,1,0)) AS 'K3_L',
        SUM(IF(id_kelas=3 AND jns_kelamin=0,1,0)) AS 'K3_P',
        SUM(IF(id_kelas=2 AND jns_kelamin=1,1,0)) AS 'K2_L',
        SUM(IF(id_kelas=2 AND jns_kelamin=0,1,0)) AS 'K2_P',
        SUM(IF(id_kelas=1 AND jns_kelamin=1,1,0)) AS 'K1_L',
        SUM(IF(id_kelas=1 AND jns_kelamin=0,1,0)) AS 'K1_P'
        FROM tbl01_jenis_pelayanan a LEFT JOIN 
        (SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_masuk,'%Y') = '$thn'
        AND jns_layanan='RI') b ON a.idx = b.id_tindakan_pelayanan
        GROUP BY a.idx"; 
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('sirs/ranap/pasien_pelayanan/getdata',$x);
    }
    function cetak(){
        $x['thn'] = (isset($_GET['thn'])) ? trim($_GET['thn']) : '';
        $SQL = "SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_masuk,'%Y') = '$x[thn]'
        AND jns_layanan='RI'";
        $cek = $this->db->query("$SQL");
        if ($cek->num_rows() > 0) {
            $x['SQL'] = $cek;
            $this->load->view('sirs/ranap/pasien_pelayanan/print',$x);
        }else{
            echo "<script>alert('Ops. Data tidak ditemukan.');window.close();</script>";
        }
    }
    function getdata(){
        $thn = (isset($_POST['thn'])) ? $_POST['thn'] : ""; 
        $SQL = "SELECT a.jenis_pelayanan,
        SUM(IF(id_kelas=4 AND jns_kelamin=1,1,0)) AS 'KU_L',
        SUM(IF(id_kelas=4 AND jns_kelamin=0,1,0)) AS 'KU_P',
        SUM(IF(id_kelas=3 AND jns_kelamin=1,1,0)) AS 'K3_L',
        SUM(IF(id_kelas=3 AND jns_kelamin=0,1,0)) AS 'K3_P',
        SUM(IF(id_kelas=2 AND jns_kelamin=1,1,0)) AS 'K2_L',
        SUM(IF(id_kelas=2 AND jns_kelamin=0,1,0)) AS 'K2_P',
        SUM(IF(id_kelas=1 AND jns_kelamin=1,1,0)) AS 'K1_L',
        SUM(IF(id_kelas=1 AND jns_kelamin=0,1,0)) AS 'K1_P'
        FROM tbl01_jenis_pelayanan a LEFT JOIN 
        (SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_masuk,'%Y') = '$thn'
        AND jns_layanan='RI') b ON a.idx = b.id_tindakan_pelayanan
        GROUP BY a.idx"; 

        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('sirs/ranap/pasien_pelayanan/getitem',$x);        
    }
}
?>