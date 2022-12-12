<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_retur_barang_pinjaman extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $CI =& get_instance();
        $CI->load->library('status');
        $CI->load->library('ajax_page');
        $this->load->model('users_model');
    }
    public function index(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_9");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['index_menu'] = 9;
            $y['contentTitle'] = "Laporan Retur Barang Pinjaman";
            
            $y['datlokasi'] = $this->db->get('tbl04_lokasi');
            $x['content'] = $this->load->view('laporan/laporan_retur_barang_pinjaman',$y,true);
            $this->load->view('template/theme',$x);
        }
    }
    function cetak_lap(){
        $KDLOKASI = (isset($_GET['kLok'])) ? $_GET['kLok'] : ""; 
        $TGL_AWAL = (isset($_GET['tAwal'])) ? $_GET['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_GET['tAkhir'])) ? $_GET['tAkhir'] : "";
        $STATUS = (isset($_GET['st'])) ? $_GET['st'] : "";
        
        $SQL_MAIN = "SELECT a.KDLOKASI,b.NMLOKASI 
        FROM stok_barang_fifo a
        LEFT JOIN tbl04_lokasi b ON a.KDLOKASI=b.KDLOKASI
        WHERE a.KDLOKASI = '$KDLOKASI' 
        GROUP BY KDLOKASI";
            
        $cek = $this->db->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
                $x['KDLOKASI'] = $res['KDLOKASI'];
                $x['NMLOKASI'] = $res['NMLOKASI'];
                $x['TGL_AWAL'] = $TGL_AWAL;
                $x['TGL_AKHIR'] = $TGL_AKHIR;
                
                if($STATUS == 'cetak'){
                    $this->load->view('laporan/print_retur_barang_pinjaman',$x);
                }
                if($STATUS == 'export'){
                    $SQL = "SELECT a.KDBRG,c.NMBRG,SUM(a.SISA) AS JUAL FROM tbl04_penjualan_detail a 
                    LEFT JOIN penjualan b ON a.KDJL = b.KDJL
                    LEFT JOIN barang c ON a.KDBRG = c.KDBRG
                    WHERE c.KDKTBRG = '10' AND b.KDLOKASI= '$KDLOKASI' AND DATE(b.DTJL) >= '". setDateEng($TGL_AWAL)."' AND DATE(b.DTJL) <= '". setDateEng($TGL_AKHIR)."'  GROUP BY a.KDBRG";
                    $dataPreview = $this->db->query("$SQL");
                    $x['dataPreview'] = $dataPreview;
                    
                    $this->load->view('laporan/export_psikotropika',$x);
                }
                
        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                window.close();
            </script>";
        }        
    }
    function get_data_lap(){
        $KDLOKASI = (isset($_POST['kLok'])) ? $_POST['kLok'] : ""; 
        $TGL_AWAL = (isset($_POST['tAwal'])) ? $_POST['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_POST['tAkhir'])) ? $_POST['tAkhir'] : "";
        
        $SQL = "SELECT  a.`KDBMK_RET`,a.`DTBMK_RET`,b.`NOFAKTUR`,b.`NMREKANAN` ,b.`KDLOKASI`
        FROM `tbl04_barang_masuk_khusus_batal` a
        JOIN tbl04_barang_masuk_khusus b ON a.KDBMK = b.KDBMK
        WHERE b.`KDLOKASI`='$KDLOKASI' AND a.`DTBMK_RET` >= '". setDateEng($TGL_AWAL)."' 
        AND a.`DTBMK_RET` <= '". setDateEng($TGL_AKHIR)."' ORDER BY a.`KDBMK` ASC";
        //echo $SQL;exit;
        $dataPreview = $this->db->query("$SQL");
        //print_r($dataPreview);exit;
        $x['dataPreview'] = $dataPreview;

        $this->load->view('laporan/get_retur_pinjaman',$x); 
    }
    
}

