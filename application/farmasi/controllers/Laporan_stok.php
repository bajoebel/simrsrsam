<?php defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_stok extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $CI =& get_instance();
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
            $y['sub_menu'] = $this->load->view('laporan_stok/sub_menu_lap','',true);
            $x['content'] = $this->load->view('laporan_stok/laporan_stok',$y,true);
            $this->load->view('themes/main',$x);
        endif;
    }
    function cetak_1(){
        $KDLOKASI = (isset($_GET['kLok'])) ? $_GET['kLok'] : ""; 
        if($KDLOKASI=="ALL"){
            $SQL_MAIN = "SELECT a.KDLOKASI,b.NMLOKASI 
            FROM stok_awal a
            LEFT JOIN lokasi b ON a.KDLOKASI=b.KDLOKASI
            GROUP BY KDLOKASI";
        }else{
            $SQL_MAIN = "SELECT a.KDLOKASI,b.NMLOKASI 
            FROM stok_awal a
            LEFT JOIN lokasi b ON a.KDLOKASI=b.KDLOKASI
            WHERE a.KDLOKASI = '$KDLOKASI' 
            GROUP BY KDLOKASI";
        }
        
        $cek = $this->db->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
            if($KDLOKASI=="ALL"){
                $x['KDLOKASI'] = "ALL";
                $x['NMLOKASI'] = "Semua Lokasi";
                $this->load->view('laporan_stok/print_preview_1a',$x);
            }else{
                $x['KDLOKASI'] = $res['KDLOKASI'];
                $x['NMLOKASI'] = $res['NMLOKASI'];
                $this->load->view('laporan_stok/print_preview_1b',$x);
            }
        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                window.close();
            </script>";
        }        
    }
    function get_data_1(){
        $KDLOKASI = (isset($_POST['kLok'])) ? $_POST['kLok'] : ""; 
        if($KDLOKASI=="ALL"){
            $SQL = "SELECT a.*,b.NMBRG,c.NMLOKASI,d.NMSATUAN,e.NMGRBRG 
            FROM stok_awal a
            LEFT JOIN barang b ON a.KDBRG=b.KDBRG
            LEFT JOIN lokasi c ON a.KDLOKASI=c.KDLOKASI
            LEFT JOIN satuan d ON b.KDSATUAN=d.KDSATUAN
            LEFT JOIN group_barang e ON b.KDGRBRG=e.KDGRBRG
            ORDER BY KDLOKASI,NMBRG";
            $dataPreview = $this->db->query("$SQL");
            $x['dataPreview'] = $dataPreview;
    
            $this->load->view('laporan_stok/get_preview_1a',$x);      
        }else{
            $SQL = "SELECT a.*,b.NMBRG,c.NMLOKASI,d.NMSATUAN,e.NMGRBRG 
            FROM stok_awal a
            LEFT JOIN barang b ON a.KDBRG=b.KDBRG
            LEFT JOIN lokasi c ON a.KDLOKASI=c.KDLOKASI
            LEFT JOIN satuan d ON b.KDSATUAN=d.KDSATUAN
            LEFT JOIN group_barang e ON b.KDGRBRG=e.KDGRBRG
            WHERE a.KDLOKASI = '$KDLOKASI' 
            ORDER BY NMBRG";
            $dataPreview = $this->db->query("$SQL");
            $x['dataPreview'] = $dataPreview;
    
            $this->load->view('laporan_stok/get_preview_1b',$x);      
        }
    }  
    
    function laporan_stok_rs(){
        if(isLogin()):
            $y['datlokasi'] = $this->db->get('lokasi');
            $y['sub_menu'] = $this->load->view('laporan_stok/sub_menu_lap','',true);
            $x['content'] = $this->load->view('laporan_stok/laporan_stok_rs',$y,true);
            $this->load->view('themes/main',$x);
        endif;
    }
	
	function laporan_rekap_stok(){
        if(isLogin()):
            $y['datlokasi'] = $this->db->get('lokasi');
            $y['sub_menu'] = $this->load->view('laporan_stok/sub_menu_lap','',true);
            $x['content'] = $this->load->view('laporan_stok/laporan_rekap_stok',$y,true);
            $this->load->view('themes/main',$x);
        endif;
    }
    function cetak_2(){
        $KDLOKASI = (isset($_GET['kLok'])) ? $_GET['kLok'] : ""; 
        if($KDLOKASI=="ALL"){
            $SQL_MAIN = "SELECT a.KDLOKASI,b.NMLOKASI 
            FROM stok_barang a
            LEFT JOIN lokasi b ON a.KDLOKASI=b.KDLOKASI
            GROUP BY KDLOKASI";
        }else{
            $SQL_MAIN = "SELECT a.KDLOKASI,b.NMLOKASI 
            FROM stok_barang a
            LEFT JOIN lokasi b ON a.KDLOKASI=b.KDLOKASI
            WHERE a.KDLOKASI = '$KDLOKASI' 
            GROUP BY KDLOKASI";
        }
        
        $cek = $this->db->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
            if($KDLOKASI=="ALL"){
                $x['KDLOKASI'] = "ALL";
                $x['NMLOKASI'] = "Semua Lokasi";
                $this->load->view('laporan_stok/print_preview_2a',$x);
            }else{
                $x['KDLOKASI'] = $res['KDLOKASI'];
                $x['NMLOKASI'] = $res['NMLOKASI'];
                $this->load->view('laporan_stok/print_preview_2b',$x);
            }
        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                window.close();
            </script>";
        }        
    }
    function get_data_2(){
        $KDLOKASI = (isset($_POST['kLok'])) ? $_POST['kLok'] : ""; 
        if($KDLOKASI=="ALL"){
            $SQL = "SELECT a.KDBRG,b.NMBRG,c.NMLOKASI,d.NMSATUAN,e.NMGRBRG,SUM(JSTOK) AS JSTOK
            FROM stok_barang a
            LEFT JOIN barang b ON a.KDBRG=b.KDBRG
            LEFT JOIN lokasi c ON a.KDLOKASI=c.KDLOKASI
            LEFT JOIN satuan d ON b.KDSATUAN=d.KDSATUAN
            LEFT JOIN group_barang e ON b.KDGRBRG=e.KDGRBRG
            GROUP BY a.KDBRG,a.KDLOKASI
            ORDER BY a.KDLOKASI,NMBRG";
            $dataPreview = $this->db->query("$SQL");
            $x['dataPreview'] = $dataPreview;
    
            $this->load->view('laporan_stok/get_preview_2a',$x);      
        }else{
            $SQL = "SELECT a.KDBRG,b.NMBRG,c.NMLOKASI,d.NMSATUAN,e.NMGRBRG,SUM(JSTOK) AS JSTOK
            FROM stok_barang a
            LEFT JOIN barang b ON a.KDBRG=b.KDBRG
            LEFT JOIN lokasi c ON a.KDLOKASI=c.KDLOKASI
            LEFT JOIN satuan d ON b.KDSATUAN=d.KDSATUAN
            LEFT JOIN group_barang e ON b.KDGRBRG=e.KDGRBRG
            WHERE a.KDLOKASI = '$KDLOKASI' 
            GROUP BY a.KDBRG,a.KDLOKASI
            ORDER BY NMBRG";
            $dataPreview = $this->db->query("$SQL");
            $x['dataPreview'] = $dataPreview;
    
            $this->load->view('laporan_stok/get_preview_2b',$x);      
        }
    } 
	
	function cetak_21(){
        $KDLOKASI = (isset($_GET['kLok'])) ? $_GET['kLok'] : ""; 
        $TGL_AWAL = (isset($_GET['tAwal'])) ? $_GET['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_GET['tAkhir'])) ? $_GET['tAkhir'] : "";
        $STATUS = (isset($_GET['st'])) ? $_GET['st'] : "";
        
        if($KDLOKASI == "ALL"){
            $x = array(
                'KDLOKASI' => $KDLOKASI,
                'TGL_AWAL' => $TGL_AWAL,
                'TGL_AKHIR' => $TGL_AKHIR
            );
            $SQL_MAIN = "SELECT COUNT(*) AS JmlRecord FROM log_transaksi 
            WHERE DATE_FORMAT(TGLTRANS,'%Y-%m-%d') BETWEEN '".setTglEng($TGL_AWAL)."' AND '".setTglEng($TGL_AKHIR)."'";
            $res = $this->db->query("$SQL_MAIN")->row_array();
            
            if($res['JmlRecord'] > 0){
                if($STATUS == 'cetak'){
                    $this->load->view('laporan_stok/print_preview_22b',$x);
                }
                if($STATUS == 'export'){
                    $SQL = "SELECT a.`DTLT`,a.`KDBRG`,b.`NMBRG`,a.`HMODAL`,
                        SUM(IF(DATE(a.`TGLTRANS`)<'".setTglEng($TGL_AWAL)."',a.`JKELUAR`,0)) AS STAWAL,
                        SUM(IF(DATE(a.`TGLTRANS`)<'".setTglEng($TGL_AWAL)."',a.`JKELUAR`,0)) AS STKELUAR,
                        SUM(IF(DATE(a.`TGLTRANS`)>='".setTglEng($TGL_AWAL)."' AND DATE(a.`TGLTRANS`)<='".setTglEng($TGL_AKHIR)."',a.`JKELUAR`,0)) AS MASUK,
                        SUM(IF(DATE(a.`TGLTRANS`)>='".setTglEng($TGL_AWAL)."' AND DATE(a.`TGLTRANS`)<='".setTglEng($TGL_AKHIR)."',a.`JKELUAR`,0)) AS KELUAR
                        FROM `log_transaksi` a 
                        LEFT JOIN barang b ON a.KDBRG=b.KDBRG
                        WHERE a.`KDLOKASI`='$KDLOKASI' GROUP BY a.`KDBRG` ORDER BY b.`NMBRG`";
                    $dataPreview = $this->db->query("$SQL");
                    $x['dataPreview'] = $dataPreview;
                    $this->load->view('laporan_stok/print_export_22b',$x);
                }
            }else{
                echo "<script>
                    alert('Maaf! Data tidak ditemukan');
                    window.close();
                </script>";
            } 
            
        }else{

            $SQL_MAIN = "SELECT a.KDLOKASI,b.NMLOKASI 
                FROM stok_barang a
                LEFT JOIN lokasi b ON a.KDLOKASI=b.KDLOKASI
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
                        $this->load->view('laporan_stok/print_preview_21b',$x);
                    }
                    if($STATUS == 'export'){
                        $SQL = "SELECT a.`DTLT`,a.`KDBRG`,b.`NMBRG`,a.`HMODAL`,
                            SUM(IF(DATE(a.`TGLTRANS`)<'".setTglEng($TGL_AWAL)."',a.`JMASUK`,0)) AS STAWAL,
                            SUM(IF(DATE(a.`TGLTRANS`)<'".setTglEng($TGL_AWAL)."',a.`JKELUAR`,0)) AS STKELUAR,
                            SUM(IF(DATE(a.`TGLTRANS`)>='".setTglEng($TGL_AWAL)."' AND DATE(a.`TGLTRANS`)<='".setTglEng($TGL_AKHIR)."',a.`JMASUK`,0)) AS MASUK,
                            SUM(IF(DATE(a.`TGLTRANS`)>='".setTglEng($TGL_AWAL)."' AND DATE(a.`TGLTRANS`)<='".setTglEng($TGL_AKHIR)."',a.`JKELUAR`,0)) AS KELUAR
                            FROM `log_transaksi` a 
                            LEFT JOIN barang b ON a.KDBRG=b.KDBRG
                            WHERE a.`KDLOKASI`='$KDLOKASI' GROUP BY a.`KDBRG` ORDER BY b.`NMBRG`";
                        $dataPreview = $this->db->query("$SQL");
                        $x['dataPreview'] = $dataPreview;
                        $this->load->view('laporan_stok/print_export_21b',$x);
                    }
            }else{
                echo "<script>
                    alert('Maaf! Data tidak ditemukan');
                    window.close();
                </script>";
            } 
            
        }
    }
    function get_data_21(){
        $KDLOKASI = (isset($_POST['kLok'])) ? $_POST['kLok'] : ""; 
        $TGL_AWAL = (isset($_POST['tAwal'])) ? $_POST['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_POST['tAkhir'])) ? $_POST['tAkhir'] : "";
        if($KDLOKASI == "ALL"){
            $SQL = "SELECT a.`DTLT`,a.`KDBRG`,b.`NMBRG`,a.`HMODAL`,
            SUM(IF(DATE(a.`TGLTRANS`)<'".setTglEng($TGL_AWAL)."',a.`JMASUK`,0)) AS STAWAL,
    		SUM(IF(DATE(a.`TGLTRANS`)<'".setTglEng($TGL_AWAL)."',a.`JKELUAR`,0)) AS STKELUAR,
            SUM(IF(DATE(a.`TGLTRANS`)>='".setTglEng($TGL_AWAL)."' AND DATE(a.`TGLTRANS`)<='".setTglEng($TGL_AKHIR)."',a.`JMASUK`,0)) AS MASUK,
            SUM(IF(DATE(a.`TGLTRANS`)>='".setTglEng($TGL_AWAL)."' AND DATE(a.`TGLTRANS`)<='".setTglEng($TGL_AKHIR)."',a.`JKELUAR`,0)) AS KELUAR
            FROM `log_transaksi` a 
            LEFT JOIN barang b ON a.KDBRG=b.KDBRG
            GROUP BY a.`KDBRG` ORDER BY b.`NMBRG`";
            $dataPreview = $this->db->query("$SQL");
            $x['dataPreview'] = $dataPreview;
    
            $this->load->view('laporan_stok/get_preview_22b',$x); 
        }else{
            $SQL = "SELECT a.`DTLT`,a.`KDBRG`,b.`NMBRG`,a.`HMODAL`,
            SUM(IF(DATE(a.`TGLTRANS`)<'".setTglEng($TGL_AWAL)."',a.`JMASUK`,0)) AS STAWAL,
    		SUM(IF(DATE(a.`TGLTRANS`)<'".setTglEng($TGL_AWAL)."',a.`JKELUAR`,0)) AS STKELUAR,
            SUM(IF(DATE(a.`TGLTRANS`)>='".setTglEng($TGL_AWAL)."' AND DATE(a.`TGLTRANS`)<='".setTglEng($TGL_AKHIR)."',a.`JMASUK`,0)) AS MASUK,
            SUM(IF(DATE(a.`TGLTRANS`)>='".setTglEng($TGL_AWAL)."' AND DATE(a.`TGLTRANS`)<='".setTglEng($TGL_AKHIR)."',a.`JKELUAR`,0)) AS KELUAR
            FROM `log_transaksi` a 
            LEFT JOIN barang b ON a.KDBRG=b.KDBRG
            WHERE a.`KDLOKASI`='$KDLOKASI' GROUP BY a.`KDBRG` ORDER BY b.`NMBRG`";
            $dataPreview = $this->db->query("$SQL");
            $x['dataPreview'] = $dataPreview;
    
            $this->load->view('laporan_stok/get_preview_21b',$x); 
            
        }
    }

    function kartu_stok(){
        if(isLogin()):
            $this->session->unset_userdata('sLike');
            $this->session->unset_userdata('sFilter');
            $this->session->unset_userdata('sPage');
            $y['datlokasi'] = $this->db->get('lokasi');
            $y['sub_menu'] = $this->load->view('laporan_stok/sub_menu_lap','',true);
            $x['content'] = $this->load->view('laporan_stok/kartu_stok',$y,true);
            $this->load->view('themes/main',$x);
        endif;
    }
    function getStokObat(){
        if(isset($_POST['page'])):
            $offset = $this->input->post('page');
            $this->session->set_userdata('sPage',$offset);
        else:
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;
        
        if(isset($_POST['sFilter'])):
            $limit = $this->input->post('sFilter');
            $this->session->set_userdata('sFilter',$limit);
        else:
            $limit = ($this->session->userdata('sFilter')) ? $this->session->userdata('sFilter') : $this->perPage;
        endif;
        
        $condition = "";
        if(isset($_POST['sLike'])){
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "WHERE NMKTBRG LIKE '%$sLike%' OR NMBRG LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);
            
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE NMKTBRG LIKE '%$sLike%' OR NMBRG LIKE '%$sLike%'";
            }
        }
        $SQL = "SELECT a.*,b.NMSATUAN,c.NMKTBRG,d.NMGRBRG,e.JENISBRG
        FROM barang a 
        LEFT JOIN satuan b ON a.KDSATUAN=b.KDSATUAN
        LEFT JOIN kategori_barang c ON a.KDKTBRG=c.KDKTBRG
        LEFT JOIN group_barang d ON a.KDGRBRG=d.KDGRBRG
        LEFT JOIN jenis_barang e ON a.KDJENISBRG=e.KDJENISBRG $condition";
        
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getData';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'laporan_stok/getStokObat';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);
        
        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL ORDER BY NMBRG LIMIT $offset,$limit");
        echo $this->load->view('laporan_stok/getStokObat',$x);
    } 

    function cetak_3(){
        $KDBRG = (isset($_GET['kode'])) ? $_GET['kode'] : ""; 
        $KDLOKASI = (isset($_GET['kLok'])) ? $_GET['kLok'] : ""; 
        $SQL_MAIN = "SELECT a.*,b.NMBRG,c.NMLOKASI FROM stok_barang a 
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG
        LEFT JOIN lokasi c ON a.KDLOKASI=c.KDLOKASI         
        WHERE a.KDBRG = '$KDBRG' AND a.KDLOKASI = '$KDLOKASI'";
        $cek = $this->db->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
            $x['KDBRG'] = $res['KDBRG'];
            $x['NMBRG'] = $res['NMBRG'];
            $x['KDLOKASI'] = $res['KDLOKASI'];
            $x['NMLOKASI'] = $res['NMLOKASI'];
            $this->load->view('laporan_stok/print_preview_3',$x);
        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                window.close();
            </script>";
        }        
    }
    function get_data_3(){
        $KDBRG = (isset($_POST['kBrg'])) ? $_POST['kBrg'] : ""; 
        $KDLOKASI = (isset($_POST['kLok'])) ? $_POST['kLok'] : ""; 
        
        $SQL = "SELECT a.DTLT,a.NOREFF,a.JTRANS,a.JMASUK,a.JKELUAR
        FROM log_transaksi a
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG
        LEFT JOIN lokasi c ON a.KDLOKASI=c.KDLOKASI
        WHERE a.KDBRG = '$KDBRG' AND a.KDLOKASI='$KDLOKASI' ORDER BY a.DTLT";
        $dataPreview = $this->db->query("$SQL");
        $x['dataPreview'] = $dataPreview;

        $this->load->view('laporan_stok/get_preview_3',$x);      
        
    }    
}
