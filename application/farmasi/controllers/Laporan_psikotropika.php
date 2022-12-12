<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_psikotropika extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $CI =& get_instance();
        $CI->load->library('status');
        $CI->load->library('ajax_page');
    }
    public function index(){
        if(isLogin()):
            $y['datlokasi'] = $this->db->get('lokasi');
            $x['content'] = $this->load->view('laporan/laporan_psikotropika',$y,true);
            $this->load->view('themes/main',$x);
        endif;
    }
    function cetak_lap(){
        $KDLOKASI = (isset($_GET['kLok'])) ? $_GET['kLok'] : ""; 
        $TGL_AWAL = (isset($_GET['tAwal'])) ? $_GET['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_GET['tAkhir'])) ? $_GET['tAkhir'] : "";
        $STATUS = (isset($_GET['st'])) ? $_GET['st'] : "";
        
            $SQL_MAIN = "SELECT KDLOKASI,NMLOKASI FROM lokasi
            WHERE KDLOKASI = '$KDLOKASI'";
            
        $cek = $this->db->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
                $x['KDLOKASI'] = $res['KDLOKASI'];
                $x['NMLOKASI'] = $res['NMLOKASI'];
                $x['TGL_AWAL'] = $TGL_AWAL;
                $x['TGL_AKHIR'] = $TGL_AKHIR;
                
                if($STATUS == 'cetak'){
                    $this->load->view('laporan/print_psikotropika',$x);
                }
                if($STATUS == 'export'){
                    $SQL = "SELECT a.KDBRG,c.NMBRG,SUM(a.SISA) AS JUAL FROM penjualan_detail a 
                    LEFT JOIN penjualan b ON a.KDJL = b.KDJL
                    LEFT JOIN barang c ON a.KDBRG = c.KDBRG
                    WHERE c.KDKTBRG = '10' AND b.KDLOKASI= '$KDLOKASI' AND DATE(b.DTJL) >= '".setTglEng($TGL_AWAL)."' AND DATE(b.DTJL) <= '".setTglEng($TGL_AKHIR)."'  GROUP BY a.KDBRG";
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
        
        $SQL = "SELECT a.KDBRG,c.NMBRG,SUM(a.SISA) AS JUAL FROM penjualan_detail a 
        LEFT JOIN penjualan b ON a.KDJL = b.KDJL
        LEFT JOIN barang c ON a.KDBRG = c.KDBRG
        WHERE (c.KDKTBRG = '1' OR c.KDKTBRG='2') AND b.KDLOKASI= '$KDLOKASI' AND DATE(b.DTJL) >= '".setTglEng($TGL_AWAL)."' AND DATE(b.DTJL) <= '".setTglEng($TGL_AKHIR)."'  GROUP BY a.KDBRG";
        //echo $SQL;
        $dataPreview = $this->db->query("$SQL");
        $x['dataPreview'] = $dataPreview;

        $this->load->view('laporan/get_psikotropika',$x); 
    }
}

