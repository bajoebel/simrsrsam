<?php defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_pengembalian_barang extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $CI =& get_instance();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $CI =& get_instance();
        $CI->load->library('status');
        $CI->load->library('ajax_page');   
        $this->load->model('m_laporan');
        $this->load->model('users_model');
    }
    public function index(){
        $ses_state = $this->users_model->cek_session_id();
        
        if ($ses_state) {
            //echo "TEst";
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_9");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['index_menu'] = 9;
            $y['contentTitle'] = "Laporan Pengembalian Barang";
            $y['sub_menu'] = $this->load->view('laporan_mutasi/sub_menu_lap','',true);
            $x['content'] = $this->load->view('laporan_pengembalian_barang/laporan_pengembalian_barang',$y,true);

            $this->load->view('template/theme', $x);
        }
    }

    public function laporan_retur_pengembalian_barang(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_9");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['index_menu'] = 9;
            $y['contentTitle'] = "Laporan Retur Pengembalian Barang";
            $y['sub_menu'] = $this->load->view('laporan_mutasi/sub_menu_lap','',true);
            $x['content'] = $this->load->view('laporan_pengembalian_barang/laporan_return_pengembalian_barang',$y,true);
            $this->load->view('template/theme', $x);
        }
    }

    function cetak_1()
    {
        $TGL_AWAL = (isset($_GET['tAwal'])) ? $_GET['tAwal'] : "";
        $TGL_AKHIR = (isset($_GET['tAkhir'])) ? $_GET['tAkhir'] : "";
        $SQL_MAIN = "SELECT * FROM tbl04_barang_keluar_khusus WHERE DATE_FORMAT(TGLTRANSAKSI,'%Y-%m-%d') BETWEEN '". setDateEng($TGL_AWAL) ."' AND '". setDateEng($TGL_AKHIR)."'";

        $cek = $this->db->query("$SQL_MAIN");
        if ($cek->num_rows() > 0) {
            $res = $cek->row_array();
            $x['TGL_AWAL'] = $TGL_AWAL;
            $x['TGL_AKHIR'] = $TGL_AKHIR;
            $this->load->view('laporan_pengembalian_barang/print_preview_1', $x);
        } else {
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                window.close();
            </script>";
        }
    }
    function get_data_1(){
        $tAwal=$this->input->post('tAwal');
        $tAkhir=$this->input->post('tAkhir');
        $SQL = "SELECT * FROM `tbl04_barang_keluar_khusus` a 
        JOIN `tbl04_barang_keluar_khusus_detail` b ON a.`KDBKK`=b.`KDBKK` 
        JOIN tbl04_barang c ON b.KDBRG=c.KDBRG LEFT JOIN tbl04_satuan d ON c.KDSATUAN=d.KDSATUAN 
        WHERE TGLTRANSAKSI BETWEEN '".setDateEng($tAwal). "' AND '" . setDateEng($tAkhir) . "'
        ORDER BY a.KDBKK, b.NMBRG";
            $dataPreview = $this->db->query("$SQL");
            $x['dataPreview'] = $dataPreview;
    
            $this->load->view('laporan_pengembalian_barang/get_preview_1b',$x);  
        
        
    }  
    
    function laporan_mutasi_rs(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $y['index_menu'] = 9;
            $y['datlokasi'] = $this->db->get('lokasi');
            $y['sub_menu'] = $this->load->view('laporan_mutasi/sub_menu_lap','',true);
            $x['content'] = $this->load->view('laporan_mutasi/laporan_mutasi_rs',$y,true);
            $this->load->view('themes/main',$x);
        }
    }
    function cetak_2(){
        
        $TGL_AWAL = (isset($_GET['tAwal'])) ? $_GET['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_GET['tAkhir'])) ? $_GET['tAkhir'] : ""; 
        $SQL_MAIN = "SELECT *
        FROM tbl04_barang_keluar_khusus_retur ";
        
        $cek = $this->db->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
            $x['TGL_AWAL'] = $TGL_AWAL;
            $x['TGL_AKHIR'] = $TGL_AKHIR;
            $this->load->view('laporan_pengembalian_barang/print_preview_2',$x);
        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                window.close();
            </script>";
        }             
    }
    function get_data_2(){
        $tAwal = (isset($_POST['tAwal'])) ? $_POST['tAwal'] : ""; 
        $tAkhir = (isset($_POST['tAkhir'])) ? $_POST['tAkhir'] : ""; 
        $SQL="SELECT * FROM `tbl04_barang_keluar_khusus_retur` a 
        JOIN `tbl04_barang_keluar_khusus_retur_detail` b ON a.`KDBKK_RET`=b.`KDBKK_RET`
        JOIN tbl04_barang c ON b.KDBRG=c.KDBRG LEFT JOIN tbl04_satuan d ON c.KDSATUAN=d.KDSATUAN
        WHERE DATE_FORMAT(DTBKK_RET,'%Y-%m-%d') BETWEEN '".setDateEng($tAwal)."' AND '".setDateEng($tAkhir)."' 
        ORDER BY a.KDBKK_RET, b.KDBRG";
            //echo $SQL;
        $dataPreview = $this->db->query("$SQL");
        $x['dataPreview'] = $dataPreview;
        $this->load->view('laporan_pengembalian_barang/get_preview_2',$x);  
    } 

    function kartu_stok(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $y['index_menu'] = 9;
            $this->session->unset_userdata('sLike');
            $this->session->unset_userdata('sFilter');
            $this->session->unset_userdata('sPage');
            $y['datlokasi'] = $this->db->get('lokasi');
            $y['sub_menu'] = $this->load->view('laporan_mutasi/sub_menu_lap','',true);
            $x['content'] = $this->load->view('laporan_mutasi/kartu_stok',$y,true);
            $this->load->view('themes/main',$x);
        }
    }
    function getStokObat(){
        if(isset($_POST['page'])){
            $offset = $this->input->post('page');
            $this->session->set_userdata('sPage',$offset);
        }else{
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        };
        
        if(isset($_POST['sFilter'])){
            $limit = $this->input->post('sFilter');
            $this->session->set_userdata('sFilter',$limit);
        }else{
            $limit = ($this->session->userdata('sFilter')) ? $this->session->userdata('sFilter') : $this->perPage;
        }
        
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
        $config['base_url']    = base_url().'laporan_mutasi/getStokObat';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);
        
        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL ORDER BY NMBRG LIMIT $offset,$limit");
        echo $this->load->view('laporan_mutasi/getStokObat',$x);
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
            $this->load->view('laporan_mutasi/print_preview_3',$x);
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
        FROM log_transaksi_fifo a
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG
        LEFT JOIN lokasi c ON a.KDLOKASI=c.KDLOKASI
        WHERE a.KDBRG = '$KDBRG' AND a.KDLOKASI='$KDLOKASI' ORDER BY a.DTLT";
        $dataPreview = $this->db->query("$SQL");
        $x['dataPreview'] = $dataPreview;

        $this->load->view('laporan_mutasi/get_preview_3',$x);      
        
    }    
}
