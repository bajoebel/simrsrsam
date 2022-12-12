<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Lap_koreksi_stok extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('users_model');
    }
    
    public function index(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $z = setNav("nav_9");
            $data=array(
                'contentTitle'  => 'Laporan Koreksi Stok',
                'datLokasi'     => $this->db->get('tbl04_lokasi')
            );
            $theme=array(
                'index_menu'    => 9,
                'header'        => $this->load->view('template/header','',true),
                'nav_sidebar'   => $this->load->view('template/nav_sidebar',$z,true),
                'content'       => $this->load->view('lap_koreksi_stok/template_form',$data,true)
            );
            $this->load->view('template/theme',$theme);
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }

    function getObat(){
        $keywords = (isset($_POST['keywords'])) ? trim($this->input->post('keywords',true)) : '';
        $tglawal = (isset($_POST['tglawal'])) ? trim($this->input->post('tglawal',true)) : '';
        $tglakhir = (isset($_POST['tglakhir'])) ? trim($this->input->post('tglakhir',true)) : '';
        $kdlokasi = (isset($_POST['kdlokasi'])) ? trim($this->input->post('kdlokasi', true)) : '';
        $WHERE="";
        if(!empty($tglawal)) $WHERE .= " AND DATE_FORMAT(TGLKOREKSI,'%Y-%m-%d') >= '".setDateEng($tglawal)."' ";
        if(!empty($tglakhir)) $WHERE .= " AND DATE_FORMAT(TGLKOREKSI,'%Y-%m-%d') <= '".setDateEng($tglakhir)."' ";
        if (!empty($kdlokasi)) $WHERE .= " AND KDLOKASI = '" . $kdlokasi . "' ";
        $SQL = "SELECT * FROM tbl04_koreksi_stok
        WHERE (KDBRG LIKE '%$keywords%' OR NMBRG LIKE '%$keywords%') $WHERE LIMIT 100";
        $x['SQL'] = $this->db->query("$SQL");
        //echo $SQL;
        $this->load->view('lap_koreksi_stok/getdata',$x);
    } 
    function cetak(){
        $x['KDBRG'] = (isset($_GET['kode'])) ? trim($_GET['kode']) : '';
        $x['TGLAWAL'] = (isset($_GET['tAwal'])) ? setDateEng(trim($_GET['tAwal'])) : '';
        $x['TGLAKHIR'] = (isset($_GET['tAkhir'])) ? setDateEng(trim($_GET['tAkhir'])) : '';
        $x['KDLOKASI'] = (isset($_GET['kLok'])) ? trim($_GET['kLok']) : '';
        $WHERE="";
        if(!empty($tglawal)) $WHERE .= " AND DATE_FORMAT(TGLKOREKSI,'%Y-%m-%d') >= '".$x['TGLAWAL']."' ";
        if(!empty($tglakhir)) $WHERE .= " AND DATE_FORMAT(TGLKOREKSI,'%Y-%m-%d') <= '".$x['TGLAKHIR']."' ";

        $SQL = "SELECT * FROM tbl04_koreksi_stok WHERE KDLOKASI = '".$x['KDLOKASI']."' $WHERE" ;
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('lap_koreksi_stok/print',$x);
    }
    function getDataKartuStok(){
        $KDLOKASI = (isset($_POST['kLok'])) ? $_POST['kLok'] : ""; 
        $tglawal = (isset($_POST['tglawal'])) ? trim($this->input->post('tAwal',true)) : '';
        $tglakhir = (isset($_POST['tglakhir'])) ? trim($this->input->post('tAkhir',true)) : '';
        $WHERE="";
        if(!empty($tglawal)) $WHERE .= " AND DATE_FORMAT(TGLKOREKSI,'%Y-%m-%d') >= '".setDateEng($tglawal)."' ";
        if(!empty($tglakhir)) $WHERE .= " AND DATE_FORMAT(TGLKOREKSI,'%Y-%m-%d') <= '".setDateEng($tglakhir)."' ";
        $SQL = "SELECT * FROM tbl04_koreksi_stok
        WHERE KDLOKASI='$KDLOKASI'  $WHERE ";
        $x['dataPreview'] = $this->db->query("$SQL");
        $this->load->view('lap_koreksi_stok/getitem',$x);        
    }
}
