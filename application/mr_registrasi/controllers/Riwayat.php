<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class riwayat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
    }
    public function index()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $y['index_menu'] = 7;
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_5");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

            $y['contentTitle'] = "Riwayat Kunjungan Pasien";
            $x['content'] = $this->load->view('riwayat/template_cari_pasien', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'mr_registrasi.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }

    public function generate()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_5");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

            $y['contentTitle'] = "Generate Registrasi Unit";
            $x['content'] = $this->load->view('riwayat/template_generate', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'mr_registrasi.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function cari_pasien()
    {
        $tglAwal = $_POST['tglAwal'];
        $tglAkhir = $_POST['tglAkhir'];
        $jns_layanan = $_POST['jns_layanan'];
        $q = $_POST['q'];
        if ($tglAwal == "" && $tglAkhir == "") $tgl = "";
        elseif ($tglAwal != "" && $tglAkhir == "") $tgl = " DATE_FORMAT(tgl_masuk,'%Y-%m-%d') >= '$tglAwal' AND ";
        elseif ($tglAwal == "" && $tglAkhir != "") $tgl = " DATE_FORMAT(tgl_masuk,'%Y-%m-%d') <= '$tglAkhir' AND ";
        else $tgl = " DATE_FORMAT(tgl_masuk,'%Y-%m-%d') BETWEEN '$tglAwal' AND '$tglAkhir' AND ";
        if (!empty($jns_layanan)) {
            if (!empty($tgl)) $condition = "  jns_layanan = '$jns_layanan' AND";
            else $condition = " jns_layanan = '$jns_layanan' AND";
        } else $condition = " ";
        $like = "  (nomr LIKE '%$q%' OR nama_pasien LIKE '%$q%' OR a.id_daftar LIKE '%$q%' OR nama_ruang LIKE '%$q%' OR cara_bayar LIKE '%$q%' OR jns_layanan LIKE '%$q%' )";
        //echo "KONDISI " .$condition ."<br>";
        $SQL = "SELECT a.idx,a.id_daftar,a.reg_unit,a.tgl_masuk,a.nomr,a.nama_pasien,a.nama_ruang,a.cara_bayar,a.jns_layanan,IF(IFNULL(b.user_id,TRUE),'Active',CONCAT('Batal\n',b.tgl_created)) AS State,
        b.user_id AS userBatal,a.user_daftar 
        FROM tbl02_pendaftaran a LEFT JOIN tbl02_pendaftaran_batal b ON a.reg_unit=b.reg_unit
        WHERE $tgl $condition $like
        ORDER BY idx DESC";
        //echo $SQL;exit;
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('riwayat/getdata', $x);
    }
    function cari_kunjungan()
    {

        $SQL = "SELECT *
        FROM tbl02_pendaftaran WHERE reg_unit=''
        ORDER BY idx limit 200";
        //echo $SQL;
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('riwayat/getdatakunjungan', $x);
    }
    function buat_regunit($limit = 100)
    {
        $SQL = "SELECT * FROM tbl02_pendaftaran 
        ORDER BY idx limit $limit";
        $data = $this->db->query("$SQL")->result_array();
        foreach ($data as $x) {
            $sep = $x['jns_layanan'] . "-" . date('Ymd', strtotime($x['tgl_masuk'])) . "-" . str_pad($x["id_ruang"], 2, "0", STR_PAD_LEFT) . "-";
            $reg_unit = $this->users_model->generate_kode($x["idx"], $sep, date('Y-m-d', strtotime($x['tgl_masuk'])), $x["id_ruang"]);
            echo $reg_unit . "<br>";
        }
    }
}
