<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $CI = &get_instance();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $CI = &get_instance();
        $CI->load->library('status');
        $CI->load->library('ajax_page');
        $this->load->model('users_model');
        $this->load->model('laporan_model');
    }
    public function index()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
        } else {
            $url_login = base_url() . 'farmasi.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    //Laporan Stok Barang
    function stok()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $data = array(
                'index_menu' => 9,
                'contentTitle'  => "Laporan Stok",
                'lokasi'        => $this->laporan_model->getLokasi(),
                'jenis'         => $this->laporan_model->getJenis(),
                'kategori'         => $this->laporan_model->getKategori(),
            );
            $z = setNav("nav_9");
            $view = array(
                'header'        => $this->load->view('template/header', '', true),
                'nav_sidebar'   => $this->load->view('template/nav_sidebar', $z, true),
                'content'       => $this->load->view('laporan/view_laporan_stok', $data, true),
                'lib'           => 'laporan_farmasi.js',
                'func'          => "getLaporanStok(0)"
            );
            $this->load->view('template/theme', $view);
        } else {
            $url_login = base_url() . 'farmasi.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function data_stok()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $lokasi = intval($this->input->get('lokasi'));
            $jenis = intval($this->input->get('jenis'));
            $kategori = intval($this->input->get('kategori'));
            $start = intval($this->input->get('start'));
            $keyword = urldecode($this->input->get('keyword'));
            $action = urldecode($this->input->get('action'));
            $header = '<tr>
                <th>#</th>';
            if (empty($lokasi)) $header .= '<th>LOKASI</th>';
            $header .= '<th>KODE BARANG</th>
                <th>NAMA BARANG</th>
                <th>NAMA GENERIK</th>
                <th>SATUAN</th>
                <th>HMODAL</th>
                <th>HJUAL</th>
                <th>TGL MASUK</th>
                <th>TGL EXP</th>';
            if (empty($kategori)) $header .= '<th>KATEGORI</th>';
            if (empty($jenis)) $header .= '<th>JENIS BARANG</th>';
            $header .= '<th>STOK</th>';
            if ($action == 1) $header .= '<th>#</th>';
            $header .= '</tr>';
            $limit = 20;
            $response = array(
                'status'    => true,
                'start'     => $start,
                'header'    => $header,
                'row_count' => $this->laporan_model->countDataStok($lokasi, $jenis, $kategori, $keyword),
                'limit'     => $limit,
                'data'      => $this->laporan_model->getDataStok($limit, $start, $lokasi, $jenis, $kategori, $keyword),
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => false, 'message' => 'Session Expired');
            header('Content-Type: application/json');
            echo json_encode($response);
            /*
            * $url_login = base_url() . 'farmasi.php/login?sid=' . getSessionID();
            * echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            * window.location.href = '$url_login';</script>";
            */
        }
    }
    function data_kartu_stok()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $lokasi = intval($this->input->get('lokasi'));
            $jenis = intval($this->input->get('jenis'));
            $kategori = intval($this->input->get('kategori'));
            $start = intval($this->input->get('start'));
            $keyword = urldecode($this->input->get('keyword'));
            $action = urldecode($this->input->get('action'));
            $header = '<tr>
                <th>#</th>';
            if (empty($lokasi)) $header .= '<th>LOKASI</th>';
            $header .= '<th>KODE BARANG</th>
                <th>NAMA BARANG</th>
                <th>NAMA GENERIK</th>
                <th>SATUAN</th>';
            if (empty($kategori)) $header .= '<th>KATEGORI</th>';
            if (empty($jenis)) $header .= '<th>JENIS BARANG</th>';
            $header .= '<th>STOK</th>';
            if ($action == 1) $header .= '<th>#</th>';
            $header .= '</tr>';
            $limit = 20;
            $response = array(
                'status'    => true,
                'start'     => $start,
                'header'    => $header,
                'row_count' => $this->laporan_model->countDataKartuStok($lokasi, $jenis, $kategori, $keyword),
                'limit'     => $limit,
                'data'      => $this->laporan_model->getDataKartuStok($limit, $start, $lokasi, $jenis, $kategori, $keyword),
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => false, 'message' => 'Session Expired');
            header('Content-Type: application/json');
            echo json_encode($response);
            /*
            * $url_login = base_url() . 'farmasi.php/login?sid=' . getSessionID();
            * echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            * window.location.href = '$url_login';</script>";
            */
        }
    }
    function data_stok_awal()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $lokasi = intval($this->input->get('lokasi'));
            $jenis = intval($this->input->get('jenis'));
            $kategori = intval($this->input->get('kategori'));
            $start = intval($this->input->get('start'));
            $keyword = urldecode($this->input->get('keyword'));
            $header = '<tr>
                <th>#</th>';
            if (empty($lokasi)) $header .= '<th>LOKASI</th>';
            $header .= '<th>TANGGAL</th>';
            $header .= '<th>NOMOR SA</th>';
            $header .= '<th>KODE BARANG</th>
                <th>NAMA BARANG</th>
                <th>NAMA GENERIK</th>
                <th>HMODAL</th>
                <th>TGLEXP</th>
                <th>SATUAN</th>';
            if (empty($kategori)) $header .= '<th>KATEGORI</th>';
            if (empty($jenis)) $header .= '<th>JENIS BARANG</th>';
            $header .= '<th>STOK</th>
            </tr>';
            $limit = 20;
            $response = array(
                'status'    => true,
                'start'     => $start,
                'header'    => $header,
                'row_count' => $this->laporan_model->countDataStokAwal($lokasi, $jenis, $kategori, $keyword),
                'limit'     => $limit,
                'data'      => $this->laporan_model->getDataStokAwal($limit, $start, $lokasi, $jenis, $kategori, $keyword),
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => false, 'message' => 'Session Expired');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
    function cetakstok()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $lokasi = intval($this->input->get('lokasi'));
            $jenis = intval($this->input->get('jenis'));
            $kategori = intval($this->input->get('kategori'));
            $header = '<tr>
                <th>#</th>';
            if (empty($lokasi)) $header .= '<th>LOKASI</th>';
            $header .= '<th>KODE BARANG</th>
                <th>NAMA BARANG</th>
                <th>NAMA GENERIK</th>
                <th>SATUAN</th>';
            if (empty($kategori)) $header .= '<th>KATEGORI</th>';
            if (empty($jenis)) $header .= '<th>JENIS BARANG</th>';
            $header .= '<th>STOK</th>';
            $header .= '</tr>';
            $subtitle = "";
            if (!empty($lokasi)) $subtitle .= "<tr><td style='width:130px'>LOKASI </td> <td>: " . $this->laporan_model->field('NMLOKASI', 'KDLOKASI', $lokasi, 'tbl04_lokasi') . "</td></tr>";
            if (!empty($jenis)) $subtitle .= "<tr><td>JENIS OBAT</td> <td>: " . $this->laporan_model->field('JENISBRG', 'KDJENISBRG', $jenis, 'tbl04_jenis_barang') . "</td></tr>";
            if (!empty($kategori)) $subtitle .= "<tr><td>KATEGORI </td> <td>: " . $this->laporan_model->field('NMKTBRG', 'KDKTBRG', $kategori, 'tbl04_kategori_barang') . "</td></tr>";
            $data = array(
                'header'    => $header,
                'lokasi'    => $lokasi,
                'jenis'     => $jenis,
                'kategori'  => $kategori,
                'title'     => "Laporan Sisa Stok Barang",
                'subtitle'  => $subtitle,
                'data'      => $this->laporan_model->getDataStok(0, 0, $lokasi, $jenis, $kategori, ''),
            );
            $this->load->view('laporan/cetak_laporan_stok', $data);
        } else {
            $url_login = base_url() . 'farmasi.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function cetakstokawal()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $lokasi = intval($this->input->get('lokasi'));
            $jenis = intval($this->input->get('jenis'));
            $kategori = intval($this->input->get('kategori'));
            $header = '<tr>
                <th>#</th>';
            if (empty($lokasi)) $header .= '<th>LOKASI</th>';
            $header .= '<th>TANGGAL</th>';
            $header .= '<th>NOMOR SA</th>';
            $header .= '<th>KODE BARANG</th>
                <th>NAMA BARANG</th>
                <th>NAMA GENERIK</th>
                <th>HMODAL</th>
                <th>TGLEXP</th>
                <th>SATUAN</th>';
            if (empty($kategori)) $header .= '<th>KATEGORI</th>';
            if (empty($jenis)) $header .= '<th>JENIS BARANG</th>';
            $header .= '<th>STOK</th>
            </tr>';
            $subtitle = "";
            if (!empty($lokasi)) $subtitle .= "<tr><td style='width:130px'>LOKASI </td> <td>: " . $this->laporan_model->field('NMLOKASI', 'KDLOKASI', $lokasi, 'tbl04_lokasi') . "</td></tr>";
            if (!empty($jenis)) $subtitle .= "<tr><td>JENIS OBAT</td> <td>: " . $this->laporan_model->field('JENISBRG', 'KDJENISBRG', $jenis, 'tbl04_jenis_barang') . "</td></tr>";
            if (!empty($kategori)) $subtitle .= "<tr><td>KATEGORI </td> <td>: " . $this->laporan_model->field('NMKTBRG', 'KDKTBRG', $kategori, 'tbl04_kategori_barang') . "</td></tr>";

            $data = array(
                'header'    => $header,
                'lokasi'    => $lokasi,
                'jenis'     => $jenis,
                'kategori'  => $kategori,
                'title'     => "Laporan Stok Awal Barang",
                'subtitle'  => $subtitle,
                'data'      => $this->laporan_model->getDataStokAwal(0, 0, $lokasi, $jenis, $kategori, ''),
            );
            $this->load->view('laporan/cetak_laporan_stok_awal', $data);
        } else {
            $response = array('status' => false, 'message' => 'Session Expired');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
    //Laporan Pembelian
    function pembelian()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $data = array(
                'index_menu' => 9,
                'contentTitle'  => "Laporan Pembelian",
                'lokasi'        => $this->laporan_model->getLokasi(),
                'jenis'         => $this->laporan_model->getJenis(),
                'kategori'      => $this->laporan_model->getKategori(),
                'supplier'      => $this->laporan_model->getSupplier(),
            );
            $z = setNav("nav_9");
            $view = array(
                'header'        => $this->load->view('template/header', '', true),
                'nav_sidebar'   => $this->load->view('template/nav_sidebar', $z, true),
                'content'       => $this->load->view('laporan/view_laporan_pembelian', $data, true),
                'lib'           => 'laporan_farmasi.js',
                'func'          => "getLaporanPembelian(0)"
            );
            $this->load->view('template/theme', $view);
        } else {
            $url_login = base_url() . 'farmasi.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }

    function data_pembelian()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $lokasi = intval($this->input->get('lokasi'));
            $jenis = intval($this->input->get('jenis'));
            $kategori = intval($this->input->get('kategori'));
            $supplier = intval($this->input->get('supplier'));
            $start = intval($this->input->get('start'));
            $keyword = urldecode($this->input->get('keyword'));
            $dari = urldecode($this->input->get('dari'));
            $sampai = urldecode($this->input->get('sampai'));
            if (!empty($dari)) $dari = setDateEng($dari);
            if (!empty($sampai)) $sampai = setDateEng($sampai);
            $action = urldecode($this->input->get('action'));
            $header = '<tr class="bg-navy">
                <th>#</th>';
            if (empty($lokasi)) $header .= '<th>LOKASI</th>';
            $header .= '<th>KODE BARANG</th>
                <th>NAMA BARANG</th>
                <th>NAMA GENERIK</th>
                <th>SATUAN</th>';
            if (empty($kategori)) $header .= '<th>KATEGORI</th>';
            if (empty($jenis)) $header .= '<th>JENIS BARANG</th>';
            $header .= '<th class="text-right">JML BELI</th>';
            $header .= '<th class="text-right">HARGA BELI</th>';
            $header .= '<th class="text-right">DISKON</th>';
            $header .= '<th class="text-right">HMODAL</th>';
            $header .= '<th class="text-right">SUB TOTAL</th>';
            if ($action == 1) $header .= '<th>#</th>';
            $header .= '</tr>';
            $limit = 20;
            $response = array(
                'status'    => true,
                'start'     => $start,
                'header'    => $header,
                'row_count' => $this->laporan_model->countDataPembelian($lokasi, $jenis, $kategori, $supplier, $dari, $sampai, $keyword),
                'limit'     => $limit,
                'data'      => $this->laporan_model->getDataPembelian($limit, $start, $lokasi, $jenis, $kategori, $supplier, $dari, $sampai, $keyword),
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => false, 'message' => 'Session Expired');
            header('Content-Type: application/json');
            echo json_encode($response);
            /*
            * $url_login = base_url() . 'farmasi.php/login?sid=' . getSessionID();
            * echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            * window.location.href = '$url_login';</script>";
            */
        }
    }
    function histori_pembelian(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $kdbrg=$this->input->get('kode');
            $data = $this->laporan_model->getHistoriPembelian($kdbrg);
            $response = array('status' => true, 'message' => 'OK', 'data'=> $data);
        } else {
            $response = array('status' => false, 'message' => 'Session Expired');
            
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function cetakpembelian()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $lokasi = intval($this->input->get('lokasi'));
            $jenis = intval($this->input->get('jenis'));
            $supplier = intval($this->input->get('supplier'));
            $kategori = intval($this->input->get('kategori'));
            $dari = urldecode($this->input->get('dari'));
            $sampai = urldecode($this->input->get('sampai'));
            if (!empty($dari)) $dari = setDateEng($dari);
            if (!empty($sampai)) $sampai = setDateEng($sampai);
            $header = '<tr class="bg-navy">
                <th>#</th>';
            if (empty($lokasi)) $header .= '<th>LOKASI</th>';
            $header .= '<th>KODE BARANG</th>
                <th>NAMA BARANG</th>
                <th>NAMA GENERIK</th>
                <th>SATUAN</th>';
            if (empty($kategori)) $header .= '<th>KATEGORI</th>';
            if (empty($jenis)) $header .= '<th>JENIS BARANG</th>';
            $header .= '<th>JMl BELI</th>';
            $header .= '<th>HARGA BELI</th>';
            $header .= '<th>DISKON</th>';
            $header .= '<th>HMODAL</th>';
            $header .= '<th>SUB TOTAL</th>';
            $header .= '</tr>';
            $subtitle = "";
            if (!empty($lokasi)) $subtitle .= "<tr><td style='width:130px'>LOKASI </td> <td>: " . $this->laporan_model->field('NMLOKASI', 'KDLOKASI', $lokasi, 'tbl04_lokasi') . "</td></tr>";
            if (!empty($supplier)) $subtitle .= "<tr><td style='width:130px'>SUPPLIER </td> <td>: " . $this->laporan_model->field('NMSUPPLIER', 'KDSUPPLIER', $supplier, 'tbl04_supplier') . "</td></tr>";
            if (!empty($jenis)) $subtitle .= "<tr><td>JENIS OBAT</td> <td>: " . $this->laporan_model->field('JENISBRG', 'KDJENISBRG', $jenis, 'tbl04_jenis_barang') . "</td></tr>";
            if (!empty($kategori)) $subtitle .= "<tr><td>KATEGORI </td> <td>: " . $this->laporan_model->field('NMKTBRG', 'KDKTBRG', $kategori, 'tbl04_kategori_barang') . "</td></tr>";
            if (!empty($dari) && !empty($sampai)) $subtitle .= "<tr><td>Periode </td> <td>: " . $dari . " s/d " . $sampai . "</td></tr>";
            $data = array(
                'header'    => $header,
                'lokasi'    => $lokasi,
                'supplier'     => $supplier,
                'jenis'     => $jenis,
                'kategori'  => $kategori,
                'title'     => "Laporan Pembelian Barang",
                'subtitle'  => $subtitle,
                'data'      => $this->laporan_model->getDataPembelian(0, 0, $lokasi, $jenis, $kategori, $supplier, $dari, $sampai, ''),
            );
            $this->load->view('laporan/cetak_laporan_pembelian', $data);
        } else {
            $url_login = base_url() . 'farmasi.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }

    //Laporan retur pembelian
    function data_retur_pembelian()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $lokasi = intval($this->input->get('lokasi'));
            $jenis = intval($this->input->get('jenis'));
            $kategori = intval($this->input->get('kategori'));
            $supplier = intval($this->input->get('supplier'));
            $start = intval($this->input->get('start'));
            $keyword = urldecode($this->input->get('keyword'));
            $dari = urldecode($this->input->get('dari'));
            $sampai = urldecode($this->input->get('sampai'));
            if (!empty($dari)) $dari = setDateEng($dari);
            if (!empty($sampai)) $sampai = setDateEng($sampai);
            $action = urldecode($this->input->get('action'));
            $header = '<tr class="bg-navy">
                <th>#</th>';
            if (empty($lokasi)) $header .= '<th>LOKASI</th>';
            $header .= '<th>KODE BARANG</th>
                <th>NAMA BARANG</th>
                <th>NAMA GENERIK</th>
                <th>SATUAN</th>';
            if (empty($kategori)) $header .= '<th>KATEGORI</th>';
            if (empty($jenis)) $header .= '<th>JENIS BARANG</th>';
            $header .= '<th class="text-right">JML RET</th>';
            $header .= '<th class="text-right">HARGA MODAL</th>';
            $header .= '<th class="text-right">SUB TOTAL</th>';
            if ($action == 1) $header .= '<th>#</th>';
            $header .= '</tr>';
            $limit = 20;
            $response = array(
                'status'    => true,
                'start'     => $start,
                'header'    => $header,
                'row_count' => $this->laporan_model->countDataReturPembelian($lokasi, $jenis, $kategori, $supplier, $dari, $sampai, $keyword),
                'limit'     => $limit,
                'data'      => $this->laporan_model->getDataReturPembelian($limit, $start, $lokasi, $jenis, $kategori, $supplier, $dari, $sampai, $keyword),
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array('status' => false, 'message' => 'Session Expired');
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}
