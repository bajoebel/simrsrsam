<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class morbodotas extends CI_Controller{
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
            $y['contentTitle'] = "SIRS - [Morbodotas Mortalitas]";        
            $y['contentTitle'] .= "<br/>Jns. Layanan : RANAP";        
            $x['content'] = $this->load->view('sirs/ranap/morbodotas/template_form',$y,true);
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
        SUM(IF(DATEDIFF(dc,tl) > 0 AND DATEDIFF(dc,tl) <= 6 AND jk=1,1,0)) AS 'L0H6H',
        SUM(IF(DATEDIFF(dc,tl) > 0 AND DATEDIFF(dc,tl) <= 6 AND jk=0,1,0)) AS 'P0H6H',
        SUM(IF(DATEDIFF(dc,tl) > 6 AND DATEDIFF(dc,tl) <= 28 AND jk=1,1,0)) AS 'L6H28H',
        SUM(IF(DATEDIFF(dc,tl) > 6 AND DATEDIFF(dc,tl) <= 28 AND jk=0,1,0)) AS 'P6H28H',
        SUM(IF(DATEDIFF(dc,tl) > 28 AND FLOOR(DATEDIFF(dc,tl)/365) <= 1 AND jk=1,1,0)) AS 'L28H1T',
        SUM(IF(DATEDIFF(dc,tl) > 28 AND FLOOR(DATEDIFF(dc,tl)/365) <= 1 AND jk=0,1,0)) AS 'P28H1T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 1 AND FLOOR(DATEDIFF(dc,tl)/365) <= 4 AND jk=1,1,0)) AS 'L1T4T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 1 AND FLOOR(DATEDIFF(dc,tl)/365) <= 4 AND jk=0,1,0)) AS 'P1T4T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 4 AND FLOOR(DATEDIFF(dc,tl)/365) <= 14 AND jk=1,1,0)) AS 'L4T14T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 4 AND FLOOR(DATEDIFF(dc,tl)/365) <= 14 AND jk=0,1,0)) AS 'P4T14T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 14 AND FLOOR(DATEDIFF(dc,tl)/365) <= 24 AND jk=1,1,0)) AS 'L14T24T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 14 AND FLOOR(DATEDIFF(dc,tl)/365) <= 24 AND jk=0,1,0)) AS 'P14T24T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 24 AND FLOOR(DATEDIFF(dc,tl)/365) <= 44 AND jk=1,1,0)) AS 'L24T44T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 24 AND FLOOR(DATEDIFF(dc,tl)/365) <= 44 AND jk=0,1,0)) AS 'P24T44T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 44 AND FLOOR(DATEDIFF(dc,tl)/365) <= 64 AND jk=1,1,0)) AS 'L44T64T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 44 AND FLOOR(DATEDIFF(dc,tl)/365) <= 64 AND jk=0,1,0)) AS 'P44T64T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 64 AND jk=1,1,0)) AS 'L64T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 64 AND jk=0,1,0)) AS 'P64T',
        SUM(IF(jk=1,1,0)) AS 'PKHMLK',
        SUM(IF(jk=0,1,0)) AS 'PKHMPR',
        SUM(IF(idk NOT IN(2,5),1,0)) AS 'JPKH',
        SUM(IF(idk IN(2,5),1,0)) AS 'JPKM'
        FROM tbl01_morbiditas a LEFT JOIN 
        (SELECT datecreated AS dc,tgl_lahir AS tl,jns_kelamin AS jk,dtd,id_keadaan_keluar AS idk 
        FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_keluar,'%Y') = '$thn'
        AND jns_layanan='RI') b ON a.DTD = b.dtd
        WHERE kecelakaan='0'
        GROUP BY a.DTD"; 
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('sirs/ranap/morbodotas/getdata',$x);
    }
    function cetak(){
        $x['thn'] = (isset($_GET['thn'])) ? trim($_GET['thn']) : '';
        $SQL = "SELECT * FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_keluar,'%Y') = '$x[thn]'
        AND jns_layanan='RI' AND kecelakaan='0'";
        $cek = $this->db->query("$SQL");
        if ($cek->num_rows() > 0) {
            $x['SQL'] = $cek;
            $this->load->view('sirs/ranap/morbodotas/print',$x);
        }else{
            echo "<script>alert('Ops. Data tidak ditemukan.');window.close();</script>";
        }
    }
    function getdata(){
        $thn = (isset($_POST['thn'])) ? $_POST['thn'] : ""; 
        $SQL = "SELECT a.*,
        SUM(IF(DATEDIFF(dc,tl) > 0 AND DATEDIFF(dc,tl) <= 6 AND jk=1,1,0)) AS 'L0H6H',
        SUM(IF(DATEDIFF(dc,tl) > 0 AND DATEDIFF(dc,tl) <= 6 AND jk=0,1,0)) AS 'P0H6H',
        SUM(IF(DATEDIFF(dc,tl) > 6 AND DATEDIFF(dc,tl) <= 28 AND jk=1,1,0)) AS 'L6H28H',
        SUM(IF(DATEDIFF(dc,tl) > 6 AND DATEDIFF(dc,tl) <= 28 AND jk=0,1,0)) AS 'P6H28H',
        SUM(IF(DATEDIFF(dc,tl) > 28 AND FLOOR(DATEDIFF(dc,tl)/365) <= 1 AND jk=1,1,0)) AS 'L28H1T',
        SUM(IF(DATEDIFF(dc,tl) > 28 AND FLOOR(DATEDIFF(dc,tl)/365) <= 1 AND jk=0,1,0)) AS 'P28H1T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 1 AND FLOOR(DATEDIFF(dc,tl)/365) <= 4 AND jk=1,1,0)) AS 'L1T4T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 1 AND FLOOR(DATEDIFF(dc,tl)/365) <= 4 AND jk=0,1,0)) AS 'P1T4T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 4 AND FLOOR(DATEDIFF(dc,tl)/365) <= 14 AND jk=1,1,0)) AS 'L4T14T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 4 AND FLOOR(DATEDIFF(dc,tl)/365) <= 14 AND jk=0,1,0)) AS 'P4T14T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 14 AND FLOOR(DATEDIFF(dc,tl)/365) <= 24 AND jk=1,1,0)) AS 'L14T24T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 14 AND FLOOR(DATEDIFF(dc,tl)/365) <= 24 AND jk=0,1,0)) AS 'P14T24T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 24 AND FLOOR(DATEDIFF(dc,tl)/365) <= 44 AND jk=1,1,0)) AS 'L24T44T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 24 AND FLOOR(DATEDIFF(dc,tl)/365) <= 44 AND jk=0,1,0)) AS 'P24T44T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 44 AND FLOOR(DATEDIFF(dc,tl)/365) <= 64 AND jk=1,1,0)) AS 'L44T64T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 44 AND FLOOR(DATEDIFF(dc,tl)/365) <= 64 AND jk=0,1,0)) AS 'P44T64T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 64 AND jk=1,1,0)) AS 'L64T',
        SUM(IF(FLOOR(DATEDIFF(dc,tl)/365) > 64 AND jk=0,1,0)) AS 'P64T',
        SUM(IF(jk=1,1,0)) AS 'PKHMLK',
        SUM(IF(jk=0,1,0)) AS 'PKHMPR',
        SUM(IF(idk NOT IN(2,5),1,0)) AS 'JPKH',
        SUM(IF(idk IN(2,5),1,0)) AS 'JPKM'
        FROM tbl01_morbiditas a LEFT JOIN 
        (SELECT datecreated AS dc,tgl_lahir AS tl,jns_kelamin AS jk,dtd,id_keadaan_keluar AS idk 
        FROM tbl07_report_sirs WHERE DATE_FORMAT(tgl_keluar,'%Y') = '$thn'
        AND jns_layanan='RI') b ON a.DTD = b.dtd
        WHERE kecelakaan='0'
        GROUP BY a.DTD"; 

        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('sirs/ranap/morbodotas/getitem',$x);        
    }
}
?>