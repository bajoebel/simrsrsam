<?php
defined('BASEPATH') or exit('No direct script access allowed');
class lap_kartu_stok extends CI_Controller
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
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_9");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['index_menu'] = 9;
            $y['contentTitle'] = "Kartu Stok";
            $y['datLokasi'] = $this->db->get('tbl04_lokasi');
            $x['content'] = $this->load->view('lap_kartu_stok/template_form', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $url_login = base_url() . 'farmasi.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }

    function getObat()
    {
        $keywords = (isset($_POST['keywords'])) ? trim($this->input->post('keywords', true)) : '';
        $SQL = "SELECT * FROM tbl04_barang
        WHERE KDBRG LIKE '%$keywords%' OR NMBRG LIKE '%$keywords%' LIMIT 100";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('lap_kartu_stok/getdata', $x);
    }
    function cetak()
    {
        $x['KDBRG'] = (isset($_GET['kode'])) ? trim($_GET['kode']) : '';
        $x['TGLAWAL'] = (isset($_GET['tAwal'])) ? setDateEng(trim($_GET['tAwal'])) : '';
        $x['TGLAKHIR'] = (isset($_GET['tAkhir'])) ? setDateEng(trim($_GET['tAkhir'])) : '';
        $x['KDLOKASI'] = (isset($_GET['kLok'])) ? trim($_GET['kLok']) : '';

        $SQL = "SELECT * FROM tbl04_log_transaksi WHERE KDBRG = '$x[KDBRG]'";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('lap_kartu_stok/print', $x);
    }
    function getDataKartuStok()
    {
        $KDBRG = (isset($_POST['kBrg'])) ? $_POST['kBrg'] : "";
        $KDLOKASI = (isset($_POST['kLok'])) ? $_POST['kLok'] : "";
        $TGLAWAL = (isset($_POST['tAwal'])) ? $_POST['tAwal'] : "";
        $TGLAKHIR = (isset($_POST['tAkhir'])) ? $_POST['tAkhir'] : "";
        $SQL_STOK_AKHIR = "SELECT SUM(JMASUK) - SUM(JKELUAR) AS StokAwal  FROM tbl04_log_transaksi 
        WHERE KDBRG = '$KDBRG' AND KDLOKASI='$KDLOKASI' 
        AND DATE_FORMAT(DTTRANS,'%Y-%m-%d') < '$TGLAWAL'";
        $queryTotal = $this->db->query("$SQL_STOK_AKHIR")->row_array();
        $x['StokAwal'] = $queryTotal['StokAwal'];
        $x['TGLAWAL'] = $TGLAWAL;

        $SQL = "SELECT KDLT,DTTRANS,NOREFF,JTRANS,JMASUK,JKELUAR,
        IF(JTRANS='SA','STOK AWAL',
        IF(JTRANS='JL',(SELECT NMPASIEN FROM tbl04_penjualan WHERE KDJL = NOREFF),
        IF(JTRANS='KS',(SELECT NMLOKASI FROM tbl04_koreksi_stok WHERE KDKOREKSI = NOREFF),
        IF(JTRANS='RJL',(SELECT NMPASIEN FROM tbl04_penjualan_retur WHERE KDJL_RET = NOREFF),
        IF(JTRANS='MT' && JMASUK = 0,(SELECT NAMA_LOKASI_TUJUAN FROM tbl04_mutasi WHERE KDMT = NOREFF),
        IF(JTRANS='MT' && JKELUAR = 0,(SELECT NAMA_LOKASI_ASAL FROM tbl04_mutasi WHERE KDMT = NOREFF),
        IF(JTRANS='RMT' && JMASUK = 0,(SELECT NAMA_LOKASI_ASAL FROM tbl04_mutasi_retur WHERE KDMT_RET = NOREFF),
        IF(JTRANS='RMT' && JKELUAR = 0,(SELECT NAMA_LOKASI_TUJUAN FROM tbl04_mutasi_retur WHERE KDMT_RET = NOREFF),
        IF(JTRANS='BL',(SELECT NMSUPPLIER FROM tbl04_pembelian WHERE KDBL = NOREFF),
        IF(JTRANS='RBL',(SELECT NMSUPPLIER FROM tbl04_pembelian WHERE tbl04_pembelian.KDBL IN (SELECT KDBL FROM tbl04_pembelian_batal WHERE KDBL_RET = NOREFF)),
        IF(JTRANS='MTB',(SELECT NAMA_LOKASI_TUJUAN FROM tbl04_mutasi_bhp WHERE KDMTBHP = NOREFF),
        IF(JTRANS='RMTB',(SELECT NAMA_LOKASI_TUJUAN FROM tbl04_mutasi_bhp_retur WHERE KDMTBHP_RET = NOREFF),
        IF(JTRANS='BMK',(SELECT NMREKANAN FROM tbl04_barang_masuk_khusus WHERE KDBMK = NOREFF),
        IF(JTRANS='RBMK',(SELECT NMREKANAN FROM tbl04_barang_masuk_khusus WHERE KDBMK IN(SELECT KDBMK FROM tbl04_barang_masuk_khusus_batal WHERE KDBMK_RET = NOREFF)),
        IF(JTRANS='BKK',(SELECT NMREKANAN FROM tbl04_barang_keluar_khusus WHERE KDBKK = NOREFF),
        IF(JTRANS='RBKK',(SELECT NMREKANAN FROM tbl04_barang_keluar_khusus_retur WHERE KDBKK_RET = NOREFF),NULL)))))))))))))))) AS KETERANGAN
        FROM tbl04_log_transaksi
        WHERE KDBRG = '$KDBRG' AND KDLOKASI='$KDLOKASI' 
        AND (DATE_FORMAT(DTTRANS,'%Y-%m-%d') BETWEEN '$TGLAWAL' AND '$TGLAKHIR')
        ORDER BY DTTRANS, KDLT";

        $x['dataPreview'] = $this->db->query("$SQL");
        $this->load->view('lap_kartu_stok/getitem', $x);
    }
}
