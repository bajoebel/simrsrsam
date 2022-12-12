<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rekapitulasi extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('rekapitulasi_model');
    }
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_7");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Dashboard";        
            $x['content'] = $this->load->view('dashboard/main',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'mr_dokumen.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function kunjungan(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_7");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['index_menu'] = 9;
            $y['contentTitle'] = "Rekapitulasi Kunjungan Harian";
            $x['content'] = $this->load->view('rekapitulasi/kunjungan', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $url_login = base_url() . 'mr_dokumen.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function bulanan()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_7");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['index_menu'] = 9;
            $y['contentTitle'] = "Rekapitulasi Kunjungan Bulanan";
            $x['content'] = $this->load->view('rekapitulasi/bulanan', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $url_login = base_url() . 'mr_dokumen.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function tahunan()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_7");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['index_menu'] = 9;
            $y['contentTitle'] = "Rekapitulasi Kunjungan Tahunan";
            $x['content'] = $this->load->view('rekapitulasi/tahunan', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $url_login = base_url() . 'mr_dokumen.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function data()
    {
        $dari = urldecode($this->input->get('dari'));
        $sampai = urldecode($this->input->get('sampai'));
        $group = urldecode($this->input->get('group'));
        $urut = urldecode($this->input->get('urut'));
        $layanan = urldecode($this->input->get('layanan'));
        //echo $group;
        //exit;
        $content = $this->rekapitulasi_model->data_kunjungan_pertanggal($dari, $sampai, $group, $layanan);
        $header="";
        if ($group == "") {
            $header = "<tr><th class=\"center\">TANGGAL KUNJUNGAN</th><th class=\"center\">JML KUNJUNGAN</th><tr>";
        } elseif ($group == "jenis") {
            $header = "<tr><th class=\"center\">TANGGAL KUNJUNGAN</th><th class=\"center\">PASIEN BARU</th><th class=\"center\">PASIEN LAMA</th><th class=\"center\">JUMLAH KUNJUNGAN</th><tr>";
        }
        elseif ($group == "wilayah") {
            $header = "<tr><th class=\"center\">TANGGAL KUNJUNGAN</th><th class=\"center\">DALAM KOTA</th><th class=\"center\">LUAR KOTA</th><th class=\"center\">JUMLAH KUNJUNGAN</th><tr>";
        }
        elseif ($group == "poly") {
            
            $judul = "";
            $ruang = $this->rekapitulasi_model->getRuangrj($layanan);
            //print_r($ruang);exit;
            foreach ($ruang as $r) {
                $field[] = "ruang_".$r->idx;
                $judul .= "<td>" . ucwords($r->ruang) . "</td>";
            }
            $header = "<tr><td>TANGGAL</td>" . $judul . "</tr>";
        }
        elseif ($group == "carabayar") {
            $carabayar = $this->rekapitulasi_model->get_carabayar();
            $jml_carabayar = count($carabayar);

            $header = "<tr><th class=\"center\" rowspan='2'>TANGGAL</th><th class=\"center\" colspan='$jml_carabayar'>CARA BAYAR</th><th rowspan='2'></th><tr>";
            //$header.="<tr>";
            foreach ($carabayar as $c) {
                $header .= "<th>" . $c->cara_bayar . "</th>";
                $field[] = "cara_" . $c->idx;
                $field_carabayar[] = $c->idx;
            }
            //$header.="</tr>";

            //$content="<tr><td colspan='$jml_carabayar'>Kosong</td></tr>";
        }
        if (empty($field)) $field = array();
        header('Content-Type: application/json');
        echo json_encode(array('header' => $header, 'content' => $content, 'field' => $field));
    }
    function databulanan()
    {
        $dari = urldecode($this->input->get('dari'));
        $sampai = urldecode($this->input->get('sampai'));
        $group = urldecode($this->input->get('group'));
        $urut = urldecode($this->input->get('urut'));
        $layanan = urldecode($this->input->get('layanan'));
        //echo $group;
        //exit;
        $content = $this->rekapitulasi_model->data_kunjungan_perbulan($dari, $sampai, $group, $layanan);
        $header = "";
        if ($group == "") {
            $header = "<tr><th class=\"center\">BULAN KUNJUNGAN</th><th class=\"center\">JML KUNJUNGAN</th><tr>";
        } elseif ($group == "jenis") {
            $header = "<tr><th class=\"center\">BULAN KUNJUNGAN</th><th class=\"center\">PASIEN BARU</th><th class=\"center\">PASIEN LAMA</th><th class=\"center\">JUMLAH KUNJUNGAN</th><tr>";
        } elseif ($group == "wilayah") {
            $header = "<tr><th class=\"center\">BULAN KUNJUNGAN</th><th class=\"center\">DALAM KOTA</th><th class=\"center\">LUAR KOTA</th><th class=\"center\">JUMLAH KUNJUNGAN</th><tr>";
        } elseif ($group == "poly") {

            $judul = "";
            $ruang = $this->rekapitulasi_model->getRuangrj($layanan);
            //print_r($ruang);exit;
            foreach ($ruang as $r) {
                $field[] = "ruang_" . $r->idx;
                $judul .= "<td>" . ucwords($r->ruang) . "</td>";
            }
            $header = "<tr><td>BULAN</td>" . $judul . "</tr>";
        } elseif ($group == "carabayar") {
            $carabayar = $this->rekapitulasi_model->get_jenisPeserta();
            $jml_carabayar = count($carabayar);

            $header = "<tr><th class=\"center\" rowspan='2'>BULAN</th><th class=\"center\" colspan='$jml_carabayar'>CARA BAYAR</th><th rowspan='2'></th><tr>";
            //$header.="<tr>";
            foreach ($carabayar as $c) {
                $header .= "<th>" . $c->cara_bayar . "</th>";
                $field[] = "cara_" . $c->idx;
                $field_carabayar[] = $c->idx;
            }
            //$header.="</tr>";

            //$content="<tr><td colspan='$jml_carabayar'>Kosong</td></tr>";
        }
        if (empty($field)) $field = array();
        header('Content-Type: application/json');
        echo json_encode(array('header' => $header, 'content' => $content, 'field' => $field));
    }

    function datatahunan()
    {
        $dari = urldecode($this->input->get('dari'));
        $sampai = urldecode($this->input->get('sampai'));
        $group = urldecode($this->input->get('group'));
        $urut = urldecode($this->input->get('urut'));
        $layanan = urldecode($this->input->get('layanan'));
        //echo $group;
        //exit;
        $content = $this->rekapitulasi_model->data_kunjungan_pertahun($dari, $sampai, $group, $layanan);
        $header = "";
        if ($group == "") {
            $header = "<tr><th class=\"center\">TAHUN KUNJUNGAN</th><th class=\"center\">JML KUNJUNGAN</th><tr>";
        } elseif ($group == "jenis") {
            $header = "<tr><th class=\"center\">TAHUN KUNJUNGAN</th><th class=\"center\">PASIEN BARU</th><th class=\"center\">PASIEN LAMA</th><th class=\"center\">JUMLAH KUNJUNGAN</th><tr>";
        } elseif ($group == "wilayah") {
            $header = "<tr><th class=\"center\">TAHUN KUNJUNGAN</th><th class=\"center\">DALAM KOTA</th><th class=\"center\">LUAR KOTA</th><th class=\"center\">JUMLAH KUNJUNGAN</th><tr>";
        } elseif ($group == "poly") {

            $judul = "";
            $ruang = $this->rekapitulasi_model->getRuangrj($layanan);
            //print_r($ruang);exit;
            foreach ($ruang as $r) {
                $field[] = "ruang_" . $r->idx;
                $judul .= "<td>" . ucwords($r->ruang) . "</td>";
            }
            $header = "<tr><td>TAHUN</td>" . $judul . "</tr>";
        } elseif ($group == "carabayar") {
            $carabayar = $this->rekapitulasi_model->get_jenisPeserta();
            $jml_carabayar = count($carabayar);

            $header = "<tr><th class=\"center\" rowspan='2'>TAHUN</th><th class=\"center\" colspan='$jml_carabayar'>CARA BAYAR</th><th rowspan='2'></th><tr>";
            //$header.="<tr>";
            foreach ($carabayar as $c) {
                $header .= "<th>" . $c->cara_bayar . "</th>";
                $field[] = "cara_" . $c->idx;
                $field_carabayar[] = $c->idx;
            }
            //$header.="</tr>";

            //$content="<tr><td colspan='$jml_carabayar'>Kosong</td></tr>";
        }
        if (empty($field)) $field = array();
        header('Content-Type: application/json');
        echo json_encode(array('header' => $header, 'content' => $content, 'field' => $field));
    }
}
?>