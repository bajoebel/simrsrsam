<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class top_teen extends CI_Controller{
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
            $y['index_menu'] = 7;
            $y['contentTitle'] = "SIRS - [TOP 10 PENYAKIT]";        
            $y['contentTitle'] .= "<br/>Jns. Layanan : RAJAL";        
            $x['content'] = $this->load->view('sirs/rajal/top_teen/template_form',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'mr_dokumen.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function getReport(){
        $thn = (isset($_POST['Tahun'])) ? trim($this->input->post('Tahun',true)) : '';
        $SQL = "SELECT kode_icd,icd,COUNT(kode_icd) AS num_kunjungan,
        SUM(IF(jns_kelamin='1',1,0)) AS 'Pria',
        SUM(IF(jns_kelamin='0',1,0)) AS 'Wanita',
        SUM(IF(kasus_penyakit='0',1,0)) AS 'Kasus_Baru',
        SUM(IF(kasus_penyakit='1',1,0)) AS 'Kasus_Lama'
        FROM tbl07_report_sirs
        WHERE DATE_FORMAT(tgl_masuk,'%Y') = '$thn' AND jns_layanan='RJ'
        GROUP BY kode_icd 
        ORDER BY num_kunjungan DESC"; 
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('sirs/rajal/top_teen/getdata',$x);
    }
    function cetak(){
        $x['thn'] = (isset($_GET['thn'])) ? trim($_GET['thn']) : '';
        $SQL = "SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_masuk,'%Y') = '$x[thn]'
        AND jns_layanan='RJ'";
        
        $cek = $this->db->query("$SQL");
        if ($cek->num_rows() > 0) {
            $x['SQL'] = $cek;
            $this->load->view('sirs/rajal/top_teen/print',$x);
        }else{
            echo "<script>alert('Ops. Data tidak ditemukan.');window.close();</script>";
        }
    }
    function getdata(){
        $thn = (isset($_POST['thn'])) ? $_POST['thn'] : ""; 
        $SQL = "SELECT kode_icd,icd,COUNT(kode_icd) AS num_kunjungan,
        SUM(IF(jns_kelamin='1',1,0)) AS 'Pria',
        SUM(IF(jns_kelamin='0',1,0)) AS 'Wanita',
        SUM(IF(kasus_penyakit='0',1,0)) AS 'Kasus_Baru',
        SUM(IF(kasus_penyakit='1',1,0)) AS 'Kasus_Lama'
        FROM tbl07_report_sirs
        WHERE DATE_FORMAT(tgl_masuk,'%Y') = '$thn' AND jns_layanan='RJ'
        GROUP BY kode_icd 
        ORDER BY num_kunjungan DESC"; 

        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('sirs/rajal/top_teen/getitem',$x);        
    }
}
?>