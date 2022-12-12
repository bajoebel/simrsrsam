<?php defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_penjualan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $CI =& get_instance();
        $CI->load->library('status');
        $this->load->model('m_laporan');
        $this->load->model('users_model');
    }
    function coba(){
        $data=$this->m_laporan->get_field('nama','m_pasien','nomr','040100','simrs');
        print_r($data);
    }
    public function index(){
        $ses_state = $this->users_model->cek_session_id();
        
        if ($ses_state) {
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_9");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['contentTitle'] = "Laporan Penjualan Per Pasien";
            $y['index_menu'] = 9;
            //$y['datpelayanan'] = $this->db->get('tbl01_cara_bayar');
            $y['datjenis_pasien'] = $this->db->get('tbl01_cara_bayar');
            $y['sub_menu'] = $this->load->view('laporan/sub_menu_lap_penjualan','',true);
            $x['content'] = $this->load->view('laporan/laporan_penjualan',$y,true);
            $this->load->view('template/theme', $x);
        }
    }
    function getPasien(){
        if(isset($_POST['KEYWORDS'])){
            $KEYWORDS = $this->input->post('KEYWORDS',true);
            $SQL = "SELECT * FROM tbl01_pasien WHERE nomr LIKE '%$KEYWORDS%' OR nama LIKE '%$KEYWORDS%' ORDER BY substr(nomr, 5,6) DESC LIMIT 100";
        }        
        //$this->simrsDB = $this->load->database('simrs',true);  
        $x['SQL'] = $this->db->query("$SQL");
        //echo $SQL;
        $this->load->view('laporan/getPasien_1',$x);
    }
    function cetak_1(){
        $NOMR = (isset($_GET['nmr'])) ? $_GET['nmr'] : ""; 
        $TGL_AWAL = (isset($_GET['tAwal'])) ? $_GET['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_GET['tAkhir'])) ? $_GET['tAkhir'] : ""; 
        $KDJPASIEN = (isset($_GET['kdj'])) ? $_GET['kdj'] : ""; 
        $KDPELAYANAN = (isset($_GET['kdp'])) ? $_GET['kdp'] : ""; 
        
        $SQL_MAIN = "SELECT a.*,b.*,c.cara_bayar AS NMJPASIEN 
        FROM tbl04_penjualan a 
        JOIN tbl01_pasien b ON a.NOMR=b.nomr
        LEFT JOIN tbl01_cara_bayar c ON a.id_cara_bayar=c.idx
        WHERE a.NOMR = '$NOMR' AND a.id_cara_bayar = '$KDJPASIEN' AND a.JNSLAYANAN = '$KDPELAYANAN' 
        AND (DATE_FORMAT(a.TGLRESEP,'%Y-%m-%d') BETWEEN '".setDateEng($TGL_AWAL)."' AND '".setDateEng($TGL_AKHIR)."') 
        GROUP BY a.NOMR";
        $cek = $this->db->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
            $x['NOMR'] = $res['NOMR'];
            $x['NMPASIEN'] = $res['NMPASIEN'];
            $x['ALMTPASIEN'] = $res['alamat'];
            $x['JNSLAYANAN'] = $res['JNSLAYANAN'];
            $jns_layanan=array('RJ'=>"Rawat Jalan",'RI'=>'Rawat Inap','GD'=>"Gawat Darurat",'PJ'=>'Penunjang');
            $x['NMPELAYANAN'] = $jns_layanan[$res['JNSLAYANAN']];
            $x['ID_CARA_BAYAR'] = $res['ID_CARA_BAYAR'];
            $x['CARA_BAYAR'] = $res['CARA_BAYAR'];
        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                window.close();
            </script>";
        }        
        $SQL = "SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
        FROM tbl04_penjualan_detail a 
        LEFT JOIN tbl04_barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN tbl04_satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN tbl04_penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '$NOMR' AND d.ID_CARA_BAYAR = '$KDJPASIEN' AND d.JNSLAYANAN = '$KDPELAYANAN' 
        AND (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '".setDateEng($TGL_AWAL)."' AND '".setDateEng($TGL_AKHIR)."') 
        ORDER BY d.TGLRESEP";
        //echo $SQL;
        $dataPreview = $this->db->query("$SQL");
        $x['dataPreview'] = $dataPreview;

        $x['TGL_AWAL'] = $TGL_AWAL;
        $x['TGL_AKHIR'] = $TGL_AKHIR;

        $this->load->view('laporan/print_preview_1',$x);
    }
    function get_data_1(){
        $NOMR = (isset($_POST['nmr'])) ? $_POST['nmr'] : ""; 
        $KDJPASIEN = (isset($_POST['kdj'])) ? $_POST['kdj'] : ""; 
        $KDPELAYANAN = (isset($_POST['kdp'])) ? $_POST['kdp'] : ""; 
        $TGL_AWAL = (isset($_POST['tAwal'])) ? $_POST['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_POST['tAkhir'])) ? $_POST['tAkhir'] : ""; 
        
        $SQL = "SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL 
        FROM penjualan_detail a 
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '$NOMR' AND d.KDJPASIEN = '$KDJPASIEN' AND d.KDPELAYANAN = '$KDPELAYANAN' 
        AND (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '".setDateEng($TGL_AWAL)."' AND '".setDateEng($TGL_AKHIR)."') 
        ORDER BY d.TGLRESEP";
        $x['dataPreview'] = $this->db->query("$SQL");

        $this->load->view('laporan/get_preview_1',$x);      
    }  
    
    function laporan_penjualan_per_dokter(){
        $ses_state = $this->users_model->cek_session_id();
        
        if ($ses_state) {
            $y['index_menu'] = 9;
            $y['datdokter'] = $this->db->get('dokter');
            $this->db->where('KDGRLOKASI','1');
            $y['datlokasi'] = $this->db->get('lokasi');
            $y['datpelayanan'] = $this->db->get('pelayanan');
            $y['datruangan'] = $this->db->get('ruangan');
            $y['datjenis_pasien'] = $this->db->get('jenis_pasien');
            $y['sub_menu'] = $this->load->view('laporan/sub_menu_lap_penjualan','',true);
            $x['content'] = $this->load->view('laporan/laporan_penjualan_per_dokter',$y,true);
            $this->load->view('template/theme', $x);
        }
    }
    function laporan_penjualan_per_periode(){
        $ses_state = $this->users_model->cek_session_id();
        
        if ($ses_state) {
            $y['index_menu'] = 9;
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_9");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

            $y['contentTitle'] = "Laporan Penjualan Per Pasien";
            $this->db->join('tbl01_dokter b','a.NRP=b.NRP');
            $y['datdokter'] = $this->db->get('tbl01_pegawai a');
            $this->db->where('KDGRLOKASI','1');
            $y['datlokasi'] = $this->db->get('tbl04_lokasi');
            //$y['datpelayanan'] = $this->db->get('pelayanan');
            $this->db->where('status_ruang',1);
            $y['datruangan'] = $this->db->get('tbl01_ruang');
            $y['datjenis_pasien'] = $this->db->get('tbl01_cara_bayar');
            $y['sub_menu'] = $this->load->view('laporan/sub_menu_lap_penjualan','',true);
            $x['content'] = $this->load->view('laporan/laporan_penjualan_per_dokter',$y,true);
            $this->load->view('template/theme', $x);
        }
    }
    function cetak_2(){
        $KDDOKTER = (isset($_GET['kDok'])) ? $_GET['kDok'] : ""; 
        $KDLOKASI = (isset($_GET['kLok'])) ? $_GET['kLok'] : ""; 
        $KDRUANGAN = (isset($_GET['kRua'])) ? $_GET['kRua'] : ""; 
        $KDJPASIEN = (isset($_GET['kJen'])) ? $_GET['kJen'] : ""; 
        $KDPELAYANAN = (isset($_GET['kPel'])) ? $_GET['kPel'] : ""; 
        $TGL_AWAL = (isset($_GET['tAwal'])) ? $_GET['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_GET['tAkhir'])) ? $_GET['tAkhir'] : "";        

        $this->db->select('a.KDDOKTER,a.NMDOKTER,a.KDLOKASI,a.NMLOKASI,a.JNSLAYANAN,a.ID_CARA_BAYAR,a.CARA_BAYAR,
        a.KDRUANGAN,a.NMRUANGAN');
        $this->db->from('tbl04_penjualan a');
        
        if($KDDOKTER !== "ALL"){
            $this->db->where("a.KDDOKTER","$KDDOKTER");
            $this->db->group_by("a.KDDOKTER");
        }
        
        if($KDLOKASI !== "ALL"){
            $this->db->where("a.KDLOKASI","$KDLOKASI");
            $this->db->group_by("a.KDLOKASI");
        }
        
        if($KDRUANGAN !== "ALL"){
            $this->db->where("a.KDRUANGAN","$KDRUANGAN");
            $this->db->group_by("a.KDRUANGAN");
        }

        if($KDJPASIEN !== "ALL"){
            $this->db->where("a.ID_CARA_BAYAR","$KDJPASIEN");
            $this->db->group_by("a.CARA_BAYAR");
        }

        if($KDPELAYANAN !== "ALL"){
            $this->db->where("a.JNSLAYANAN","$KDPELAYANAN");
            $this->db->group_by("a.JNSLAYANAN");
        }

        $this->db->where('DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") >=',setDateEng($TGL_AWAL));
        $this->db->where('DATE_FORMAT(a.TGLRESEP,"%Y-%m-%d") <=',setDateEng($TGL_AKHIR));
        $cek = $this->db->get();
        //echo $this->db->last_query();

        if($cek->num_rows() > 0){
            $res = $cek->row_array();
            //print_r($res);
            if($KDDOKTER == "ALL"){
                $x['KDDOKTER'] = "ALL";
                $x['NMDOKTER'] = "Semua Dokter";
            }else{
                $x['KDDOKTER'] = $res['KDDOKTER'];
                $x['NMDOKTER'] = $res['NMDOKTER'];
            }
            
            if($KDLOKASI == "ALL"){
                $x['KDLOKASI'] = "ALL";
                $x['NMLOKASI'] = "Semua Lokasi";
            }else{
                $x['KDLOKASI'] = $res['KDLOKASI'];
                $x['NMLOKASI'] = $res['NMLOKASI'];
            }
            
            if($KDRUANGAN == "ALL"){
                $x['KDRUANGAN'] = "ALL";
                $x['NMRUANGAN'] = "Semua Ruangan";
            }else{
                $x['KDRUANGAN'] = $res['KDRUANGAN'];
                $x['NMRUANGAN'] = $res['NMRUANGAN'];
            }

            if($KDJPASIEN == "ALL"){
                $x['KDJPASIEN'] = "ALL";
                $x['NMJPASIEN'] = "Semua Jenis Pasien";
            }else{
                $x['KDJPASIEN'] = $res['ID_CARA_BAYAR'];
                $x['NMJPASIEN'] = $res['CARA_BAYAR'];
            }

            if($KDPELAYANAN == "ALL"){
                $x['KDPELAYANAN'] = "ALL";
                $x['NMPELAYANAN'] = "Semua Jenis Pelayanan";
            }else{
                $x['JNSLAYANAN'] = $res['JNSLAYANAN'];
                if($res['JNSLAYANAN']=='RJ') $x['NMPELAYANAN'] = 'Rawat Jalan';
                elseif($res['JNSLAYANAN'] == 'RI') $x['NMPELAYANAN'] = 'Rawat Inap';
                elseif($res['JNSLAYANAN'] == 'GD') $x['NMPELAYANAN'] = 'Gawat Darurat';
                else $x['NMPELAYANAN'] = 'Penunjang';
                //$x['NMPELAYANAN'] = $res['NMPELAYANAN'];
            }

            $x['TGL_AWAL'] = $TGL_AWAL;
            $x['TGL_AKHIR'] = $TGL_AKHIR;
            //echo $this->db->last_query();
            $this->load->view('laporan/print_preview_7',$x);

        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                window.close();
            </script>";
        }        
    }
    function get_data_2(){
        $KDDOKTER = (isset($_POST['kDok'])) ? $_POST['kDok'] : ""; 
        $KDLOKASI = (isset($_POST['kLok'])) ? $_POST['kLok'] : ""; 
        $KDRUANGAN = (isset($_POST['kRua'])) ? $_POST['kRua'] : ""; 
        $KDJPASIEN = (isset($_POST['kJen'])) ? $_POST['kJen'] : ""; 
        $KDPELAYANAN = (isset($_POST['kPel'])) ? $_POST['kPel'] : ""; 
        $TGL_AWAL = (isset($_POST['tAwal'])) ? $_POST['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_POST['tAkhir'])) ? $_POST['tAkhir'] : ""; 

        $this->db->select('b.KDJL,b.DTJL,b.TGLRESEP,b.ID_DAFTAR,b.NOMR,b.NMPASIEN,b.CARA_BAYAR AS NMJPASIEN,
        b.NMDOKTER,b.NMRUANGAN,SUM((a.HJUAL * a.SISA) + a.R) AS SubTotal,
        SUM(a.HJUAL * a.SISA * a.DISKON / 100) AS DISKON,
        SUM((a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a.DISKON / 100) + a.R) AS Total');
        $this->db->from('tbl04_penjualan_detail a');
        $this->db->join('tbl04_penjualan b', 'a.KDJL=b.KDJL','left');
        $this->db->where('DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") >=',setDateEng($TGL_AWAL));
        $this->db->where('DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") <=',setDateEng($TGL_AKHIR));

        if($KDDOKTER !== "ALL"){
            $this->db->where("b.KDDOKTER","$KDDOKTER");
        }
        if($KDLOKASI !== "ALL"){
            $this->db->where("b.KDLOKASI","$KDLOKASI");
        }
        if($KDRUANGAN !== "ALL"){
            $this->db->where("b.KDRUANGAN","$KDRUANGAN");
        }
        if($KDJPASIEN !== "ALL"){
            $this->db->where("b.ID_CARA_BAYAR","$KDJPASIEN");
        }
        if($KDPELAYANAN !== "ALL"){
            $this->db->where("b.JNSLAYANAN","$KDPELAYANAN");
        }
        
        $this->db->group_by("b.KDJL");
        $this->db->order_by("b.TGLRESEP,b.KDDOKTER");
        $x['dataPreview'] = $this->db->get();


        $this->db->select("a.KDJL,b.DTJL,b.TGLRESEP,b.NOMR,b.NMPASIEN,b.CARA_BAYAR AS NMJPASIEN,
        b.NMDOKTER,b.NMRUANGAN,a.KDBRG,a.NMBRG,SUM(a.SISA) AS SISA,a.HJUAL,
        (a.HJUAL * SUM(a.SISA) * a.DISKON / 100) AS DISKON,a.R,
        (a.HJUAL * SUM(a.SISA)) - (a.HJUAL * SUM(a.SISA) * a.DISKON / 100) + a.R AS Total");
        $this->db->from('tbl04_penjualan_detail a');
        $this->db->join('tbl04_penjualan b', 'a.KDJL=b.KDJL','left');
        $this->db->where('DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") >=',setDateEng($TGL_AWAL));
        $this->db->where('DATE_FORMAT(b.TGLRESEP,"%Y-%m-%d") <=',setDateEng($TGL_AKHIR));

        if($KDDOKTER !== "ALL"){
            $this->db->where("b.KDDOKTER","$KDDOKTER");
        }
        if($KDLOKASI !== "ALL"){
            $this->db->where("b.KDLOKASI","$KDLOKASI");
        }
        if($KDRUANGAN !== "ALL"){
            $this->db->where("b.KDRUANGAN","$KDRUANGAN");
        }
        if($KDJPASIEN !== "ALL"){
            $this->db->where("b.ID_CARA_BAYAR","$KDJPASIEN");
        }
        if($KDPELAYANAN !== "ALL"){
            $this->db->where("b.JNSLAYANAN","$KDPELAYANAN");
        }

        $this->db->group_by("b.KDJL,a.KDBRG");
        $this->db->order_by("b.TGLRESEP,b.KDDOKTER");
        $x['dataDetailPreview'] = $this->db->get();
        //echo $this->db->last_query();
        $this->load->view('laporan/get_preview_7',$x);      
    }    
    
    function laporan_harian_detail_penjualan(){
        $ses_state = $this->users_model->cek_session_id();
        
        if ($ses_state) {
            //$this->db->where_in('KDGRLOKASI','1');
            $x['header'] = $this->load->view('template/header', '',
                true
            );
            $y['index_menu'] = 9;
            $z = setNav("nav_9");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

            $y['contentTitle'] = "Laporan Harian Detail Penjualan";

            $y['datlokasi'] = $this->db->get('tbl04_lokasi');
            $y['sub_menu'] = $this->load->view('laporan/sub_menu_lap_penjualan','',true);
            $x['content'] = $this->load->view('laporan/laporan_harian_detail_penjualan',$y,true);
            $this->load->view('template/theme', $x);
        }
    }
    function cetak_3(){
        $KDLOKASI = (isset($_GET['kode'])) ? $_GET['kode'] : ""; 
        $TGL_AWAL = (isset($_GET['tAwal'])) ? $_GET['tAwal'] : ""; 
        
        $SQL_MAIN = "SELECT a.KDLOKASI,b.NMLOKASI FROM tbl04_penjualan a 
        LEFT JOIN tbl04_lokasi b ON a.KDLOKASI=b.KDLOKASI
        WHERE a.KDLOKASI = '$KDLOKASI'
        AND DATE_FORMAT(a.TGLRESEP,'%Y-%m-%d') = '".setDateEng($TGL_AWAL)."' GROUP BY a.KDLOKASI";
        $cek = $this->db->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
            $x['KDLOKASI'] = $res['KDLOKASI'];
            $x['NMLOKASI'] = $res['NMLOKASI'];

            $SQL = "SELECT b.KDJL,b.TGLRESEP,b.NOMR,b.NMPASIEN,b.CARA_BAYAR AS NMJPASIEN,b.NMDOKTER,b.NMRUANGAN,
            SUM((a.HJUAL * a.SISA) + a.R) AS SubTotal,
            SUM(a.HJUAL * a.SISA * a.DISKON / 100) AS DISKON,
            SUM((a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a.DISKON / 100) + a.R) AS Total FROM tbl04_penjualan_detail a 
            LEFT JOIN tbl04_penjualan b ON a.KDJL=b.KDJL 
            WHERE KDLOKASI = '$KDLOKASI' 
            AND DATE_FORMAT(b.TGLRESEP,'%Y-%m-%d') = '".setDateEng($TGL_AWAL)."'
            GROUP BY b.KDJL ORDER BY b.TGLRESEP";
            //echo $SQL;
            $dataPreview = $this->db->query("$SQL");
            $x['dataPreview'] = $dataPreview;
            

            $SQL_DETAIL = "SELECT a.KDJL,a.KDBRG,a.NMBRG,a.SISA,a.HJUAL,a.HJUAL * a.SISA * a.DISKON / 100 AS DISKON,a.R,
            (a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a.DISKON / 100) + a.R AS Total FROM tbl04_penjualan_detail a 
            LEFT JOIN tbl04_penjualan b ON a.KDJL=b.KDJL 
            WHERE KDLOKASI = '$KDLOKASI'  
            AND DATE_FORMAT(b.TGLRESEP,'%Y-%m-%d') = '".setDateEng($TGL_AWAL)."'
            GROUP BY a.KDJL,a.KDBRG ORDER BY b.TGLRESEP";
            //echo $SQL_DETAIL;
            $dataDetailPreview = $this->db->query("$SQL_DETAIL");
            $x['dataDetailPreview'] = $dataDetailPreview;

            $x['TGL_AWAL'] = $TGL_AWAL;
            $this->load->view('laporan/print_preview_3',$x);
        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                window.close();
            </script>";
        }        
    }
    
    function laporan_resep_dokter(){
        $ses_state = $this->users_model->cek_session_id();
        
        if ($ses_state) {
            $x['header'] = $this->load->view(
                'template/header',
                '',
                true
            );
            $z = setNav("nav_9");
            $y['index_menu'] = 9;
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['contentTitle'] = "Laporan Penjualan Per Periode";
            $this->db->join('tbl01_dokter','tbl01_dokter.NRP=tbl01_pegawai.NRP');
            $y['datdokter'] = $this->db->get('tbl01_pegawai');
            $y['sub_menu'] = $this->load->view('laporan/sub_menu_lap_penjualan','',true);
            $x['content'] = $this->load->view('laporan/laporan_resep_dokter',$y,true);
            $this->load->view('template/theme', $x);
        }
    }
    function cetak_4(){
        $TGL_AWAL = (isset($_GET['tAwal'])) ? $_GET['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_GET['tAkhir'])) ? $_GET['tAkhir'] : ""; 
        
        $SQL_MAIN = "SELECT * FROM tbl04_penjualan a
        WHERE (DATE_FORMAT(a.TGLRESEP,'%Y-%m-%d') BETWEEN '".setDateEng($TGL_AWAL)."' AND '".setDateEng($TGL_AKHIR)."')";
        $cek = $this->db->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $SQL = "SELECT b.KDJL,b.TGLRESEP,b.NOMR,b.NMPASIEN,b.NMDOKTER,
            SUM(a.R) AS TotalR FROM tbl04_penjualan_detail a 
            LEFT JOIN tbl04_penjualan b ON a.KDJL=b.KDJL 
            WHERE (DATE_FORMAT(b.TGLRESEP,'%Y-%m-%d') BETWEEN '".setDateEng($TGL_AWAL)."' AND '".setDateEng($TGL_AKHIR)."') 
            GROUP BY b.KDDOKTER ORDER BY b.NMDOKTER";
            //echo $SQL;
            $dataPreview = $this->db->query("$SQL");
            $x['dataPreview'] = $dataPreview;
            $x['TGL_AWAL'] = $TGL_AWAL;
            $x['TGL_AKHIR'] = $TGL_AKHIR;
            $this->load->view('laporan/print_preview_4',$x);

        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                window.close();
            </script>";
        }        
    }
    
    function laporan_penjualan_per_group_barang(){
        $ses_state = $this->users_model->cek_session_id();
        
        if ($ses_state) {
            $x['header'] = $this->load->view(
                'template/header',
                '',
                true
            );
            $y['index_menu'] = 9;
            $z = setNav("nav_9");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['contentTitle'] = "Laporan Penjualan Per Group Barang";

            $y['datgroup_barang'] = $this->db->get('group_barang');
            $y['sub_menu'] = $this->load->view('laporan/sub_menu_lap_penjualan','',true);
            $x['content'] = $this->load->view('laporan/laporan_penjualan_per_group_barang',$y,true);
            $this->load->view('template/theme', $x);
        }
    }
    function cetak_5(){
        $KDGRBRG = (isset($_GET['kode'])) ? $_GET['kode'] : ""; 
        $TGL_AWAL = (isset($_GET['tAwal'])) ? $_GET['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_GET['tAkhir'])) ? $_GET['tAkhir'] : ""; 
        
        $SQL_MAIN = "SELECT c.KDGRBRG,d.NMGRBRG FROM penjualan a 
        LEFT JOIN penjualan_detail b ON a.KDJL=b.KDJL
        LEFT JOIN barang c ON b.KDBRG=c.KDBRG
        LEFT JOIN group_barang d ON c.KDGRBRG=d.KDGRBRG WHERE c.KDGRBRG = '$KDGRBRG'
        AND (DATE_FORMAT(a.TGLRESEP,'%Y-%m-%d') BETWEEN '".setDateEng($TGL_AWAL)."' AND '".setDateEng($TGL_AKHIR)."') 
        GROUP BY c.KDGRBRG";
        $cek = $this->db->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
            $x['KDGRBRG'] = $res['KDGRBRG'];
            $x['NMGRBRG'] = $res['NMGRBRG'];

            $x['KDGRBRG'] = $KDGRBRG;
            $x['TGL_AWAL'] = $TGL_AWAL;
            $x['TGL_AKHIR'] = $TGL_AKHIR;
            $this->load->view('laporan/print_preview_5',$x);
        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                window.close();
            </script>";
        }        
    }
    function get_data_5(){
        $KDGRBRG = (isset($_POST['kode'])) ? $_POST['kode'] : ""; 
        $TGL_AWAL = (isset($_POST['tAwal'])) ? $_POST['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_POST['tAkhir'])) ? $_POST['tAkhir'] : ""; 
    
        $SQL = "SELECT b.KDJL,b.DTJL,b.TGLRESEP,b.NOMR,b.NMPASIEN,c.NMJPASIEN,d.nama_dokter AS NMDOKTER,e.grNama AS NMRUANGAN,
        SUM((a.HJUAL * a.SISA) + a.R) AS SubTotal,
        SUM(a.HJUAL * a.SISA * a.DISKON / 100) AS DISKON,
        SUM((a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a.DISKON / 100) + a.R) AS Total FROM penjualan_detail a 
        LEFT JOIN penjualan b ON a.KDJL=b.KDJL 
        LEFT JOIN jenis_pasien c ON b.KDJPASIEN=c.KDJPASIEN 
        LEFT JOIN dokter d ON b.KDDOKTER=d.id_dokter 
        LEFT JOIN group_ruang e ON b.KDRUANGAN=e.grId 
        LEFT JOIN barang f ON a.KDBRG=f.KDBRG
        WHERE KDGRBRG = '$KDGRBRG' 
        AND (DATE_FORMAT(b.TGLRESEP,'%Y-%m-%d') BETWEEN '".setDateEng($TGL_AWAL)."' AND '".setDateEng($TGL_AKHIR)."') 
        GROUP BY b.KDJL ORDER BY b.TGLRESEP";
        $dataPreview = $this->db->query("$SQL");
        $x['dataPreview'] = $dataPreview;
        

        $SQL_DETAIL = "SELECT a.KDJL,a.KDBRG,c.NMBRG,a.SISA,a.HJUAL,a.HJUAL * a.SISA * a.DISKON / 100 AS DISKON,a.R,
        (a.HJUAL * a.SISA) - (a.HJUAL * a.SISA * a.DISKON / 100) + a.R AS Total FROM penjualan_detail a 
        LEFT JOIN penjualan b ON a.KDJL=b.KDJL 
        LEFT JOIN barang c ON a.KDBRG=c.KDBRG
        WHERE KDGRBRG = '$KDGRBRG'  
        AND (DATE_FORMAT(b.TGLRESEP,'%Y-%m-%d') BETWEEN '".setDateEng($TGL_AWAL)."' AND '".setDateEng($TGL_AKHIR)."') 
        GROUP BY a.KDJL,a.KDBRG ORDER BY b.TGLRESEP";
        $dataDetailPreview = $this->db->query("$SQL_DETAIL");
        $x['dataDetailPreview'] = $dataDetailPreview;

        $this->load->view('laporan/get_preview_5',$x);      
    }
    
    function laporan_periode_detail_penjualan(){
        $ses_state = $this->users_model->cek_session_id();
        
        if ($ses_state) {
            //$this->db->where_in('KDGRLOKASI','1');
            $x['header'] = $this->load->view(
                'template/header',
                '',
                true
            );
            $y['index_menu'] = 9;
            $z = setNav("nav_9");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['contentTitle'] = "Laporan Penjualan Per Periode";
            $y['datlokasi'] = $this->db->get('tbl04_lokasi');
            $y['sub_menu'] = $this->load->view('laporan/sub_menu_lap_penjualan','',true);
            $x['content'] = $this->load->view('laporan/laporan_periode_detail_penjualan',$y,true);
            $this->load->view('template/theme', $x);
        }
    }
    
    function laporan_periode_penjualan(){
        $ses_state = $this->users_model->cek_session_id();
        
        if ($ses_state) {
            //$this->db->where_in('KDGRLOKASI','1');
            $x['header'] = $this->load->view('template/header', '',
                true
            );
            $z = setNav("nav_9");
            $y['index_menu'] = 9;
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['contentTitle'] = "Laporan Penjualan Per Periode";

            $y['datlokasi'] = $this->db->get('tbl04_lokasi');
            $y['sub_menu'] = $this->load->view('laporan/sub_menu_lap_penjualan','',true);
            $x['content'] = $this->load->view('laporan/laporan_periode_penjualan',$y,true);
            $this->load->view('template/theme', $x);
        }
    }
    
    function cetak_6(){
        $KDLOKASI = (isset($_GET['kode'])) ? $_GET['kode'] : ""; 
        $TGL_AWAL = (isset($_GET['tAwal'])) ? $_GET['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_GET['tAkhir'])) ? $_GET['tAkhir'] : ""; 
        $LAYANAN = (isset($_GET['layanan'])) ? $_GET['layanan'] : "";
        
        $SQL_MAIN = "SELECT* FROM tbl04_penjualan a 
        WHERE a.KDLOKASI = '$KDLOKASI' AND a.JNSLAYANAN = '$LAYANAN'
        AND (DATE_FORMAT(a.TGLRESEP,'%Y-%m-%d') BETWEEN '".setDateEng($TGL_AWAL)."' AND '".setDateEng($TGL_AKHIR)."') 
        GROUP BY a.KDLOKASI";
        $cek = $this->db->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
            $x['KDLOKASI'] = $res['KDLOKASI'];
            $x['NMLOKASI'] = $res['NMLOKASI'];
            $x['LAYANAN'] = $LAYANAN;
            $NAMA_LAYANAN = array('RJ' => 'Rawat Jalan', 'RI' => 'Rawat Inap', 'GD' => 'Gawat Darurat', 'PJ' => 'Penunjang');
            $x['NMPELAYANAN'] = $NAMA_LAYANAN[$LAYANAN];
            $x['TGL_AWAL'] = $TGL_AWAL;
            $x['TGL_AKHIR'] = $TGL_AKHIR;
            $this->load->view('laporan/print_preview_6',$x);
        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                window.close();
            </script>";
        }        
    }
    function get_data_6(){
        $KDLOKASI = (isset($_POST['kode'])) ? $_POST['kode'] : ""; 
        $TGL_AWAL = (isset($_POST['tAwal'])) ? $_POST['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_POST['tAkhir'])) ? $_POST['tAkhir'] : ""; 
        $LAYANAN = (isset($_POST['layanan'])) ? $_POST['layanan'] : "";
    
        $SQL = "SELECT b.KDJL,b.DTJL,b.TGLRESEP,b.NOMR,b.NMPASIEN,b.CARA_BAYAR AS NMJPASIEN,b.NMDOKTER,b.NMRUANGAN,
        SUM((a.HJUAL * a.SISA) + a.R) AS SubTotal,
        SUM(a.DISKON) AS DISKON,
        SUM((a.HJUAL * a.SISA) - (a.DISKON) + a.R) AS Total FROM tbl04_penjualan_detail a 
        LEFT JOIN tbl04_penjualan b ON a.KDJL=b.KDJL 
        WHERE KDLOKASI = '$KDLOKASI' AND b.JNSLAYANAN = '$LAYANAN'
        AND (DATE_FORMAT(b.TGLRESEP,'%Y-%m-%d') BETWEEN '".setDateEng($TGL_AWAL)."' AND '".setDateEng($TGL_AKHIR)."') 
        GROUP BY b.KDJL ORDER BY b.TGLRESEP";
        //echo $SQL;
        $dataPreview = $this->db->query("$SQL");
        $x['dataPreview'] = $dataPreview;
        

        $SQL_DETAIL = "SELECT a.KDJL,a.KDBRG,a.NMBRG,a.SISA,a.HJUAL, a.DISKON AS DISKON,a.R,
        (a.HJUAL * a.SISA) - (a.DISKON) + a.R AS Total FROM tbl04_penjualan_detail a 
        LEFT JOIN tbl04_penjualan b ON a.KDJL=b.KDJL 
        WHERE KDLOKASI = '$KDLOKASI' AND b.JNSLAYANAN = '$LAYANAN' 
        AND (DATE_FORMAT(b.TGLRESEP,'%Y-%m-%d') BETWEEN '".setDateEng($TGL_AWAL)."' AND '".setDateEng($TGL_AKHIR)."') 
        GROUP BY a.KDJL,a.KDBRG ORDER BY b.TGLRESEP";
        $dataDetailPreview = $this->db->query("$SQL_DETAIL");
        $x['dataDetailPreview'] = $dataDetailPreview;

        $this->load->view('laporan/get_preview_6',$x);      
    }
    
    function cetak_7(){
        $KDLOKASI = (isset($_GET['kode'])) ? $_GET['kode'] : ""; 
        $TGL_AWAL = (isset($_GET['tAwal'])) ? $_GET['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_GET['tAkhir'])) ? $_GET['tAkhir'] : "";
        $LAYANAN = (isset($_GET['layanan'])) ? $_GET['layanan'] : "";
        
        $SQL_MAIN = "SELECT * FROM tbl04_penjualan a 
        WHERE a.KDLOKASI = '$KDLOKASI' AND a.JNSLAYANAN = '$LAYANAN'
        AND (DATE_FORMAT(a.TGLRESEP,'%Y-%m-%d') BETWEEN '".setDateEng($TGL_AWAL)."' AND '".setDateEng($TGL_AKHIR)."') 
        GROUP BY a.KDLOKASI";
        //echo $SQL_MAIN;
        $cek = $this->db->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
            $x['KDLOKASI'] = $res['KDLOKASI'];
            $x['NMLOKASI'] = $res['NMLOKASI'];
            $x['LAYANAN'] = $LAYANAN;
            $NAMA_LAYANAN=array('RJ'=>'Rawat Jalan','RI'=> 'Rawat Inap','GD'=>'Gawat Darurat','PJ'=>'Penunjang');
            $x['NMPELAYANAN'] = $NAMA_LAYANAN[$LAYANAN];
            $x['TGL_AWAL'] = $TGL_AWAL;
            $x['TGL_AKHIR'] = $TGL_AKHIR;
            $this->load->view('laporan/print_preview_8',$x);
        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                window.close();
            </script>";
        }        
    }
    function get_data_7(){
        $KDLOKASI = (isset($_POST['kode'])) ? $_POST['kode'] : ""; 
        $TGL_AWAL = (isset($_POST['tAwal'])) ? $_POST['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_POST['tAkhir'])) ? $_POST['tAkhir'] : ""; 
        $LAYANAN = (isset($_POST['layanan'])) ? $_POST['layanan'] : "";
    
        $SQL = "SELECT b.KDJL,b.DTJL,b.TGLRESEP,b.NOMR,b.NMPASIEN,a.R AS NILAI_R,b.CARA_BAYAR AS NMJPASIEN,
        b.NMDOKTER,b.NMRUANGAN,
        SUM((a.HJUAL * a.SISA) + a.R) AS SubTotal,
        SUM(a.DISKON) AS DISKON,
        SUM((a.HJUAL * a.SISA) - (a.DISKON)) AS Total FROM tbl04_penjualan_detail a 
        LEFT JOIN tbl04_penjualan b ON a.KDJL=b.KDJL 
        WHERE b.KDLOKASI = '$KDLOKASI' AND b.JNSLAYANAN = '$LAYANAN'
        AND (DATE_FORMAT(b.TGLRESEP,'%Y-%m-%d') BETWEEN '".setDateEng($TGL_AWAL)."' AND '".setDateEng($TGL_AKHIR)."') 
        GROUP BY b.KDJL ORDER BY b.TGLRESEP";
        //echo $SQL;
        $dataPreview = $this->db->query("$SQL");
        $x['dataPreview'] = $dataPreview;
        $this->load->view('laporan/get_preview_8',$x);      
    }
    
    function cetak_8(){
        $KDLOKASI = (isset($_GET['kLok'])) ? $_GET['kLok'] : ""; 
        $TGL_AWAL = (isset($_GET['tAwal'])) ? $_GET['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_GET['tAkhir'])) ? $_GET['tAkhir'] : "";
        
        $SQL_MAIN = "SELECT * FROM tbl04_penjualan_retur a 
        WHERE a.KDLOKASI = '$KDLOKASI' AND (DATE_FORMAT(a.TGL_RETUR,'%Y-%m-%d') 
        BETWEEN '".setDateEng($TGL_AWAL)."' AND '".setDateEng($TGL_AKHIR)."') 
        GROUP BY a.KDLOKASI";
        //echo $SQL_MAIN;exit;
        $cek = $this->db->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
            $x['KDLOKASI'] = $res['KDLOKASI'];
            $x['NMLOKASI'] = $res['NMLOKASI'];
            
            $x['TGL_AWAL'] = $TGL_AWAL;
            $x['TGL_AKHIR'] = $TGL_AKHIR;
            $this->load->view('laporan/print_laporan_retur_penjualan',$x);
        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                window.close();
            </script>";
        }        
    }
    function get_data_8(){
        /*$KDLOKASI = (isset($_POST['kode'])) ? $_POST['kode'] : ""; 
        $TGL_AWAL = (isset($_POST['tAwal'])) ? $_POST['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_POST['tAkhir'])) ? $_POST['tAkhir'] : ""; 
        $LAYANAN = (isset($_POST['layanan'])) ? $_POST['layanan'] : "";
    
        $SQL = "SELECT b.KDJL,b.DTJL,b.TGLRESEP,b.NOMR,b.NMPASIEN,a.R AS NILAI_R,b.CARA_BAYAR AS NMJPASIEN,
        b.NMDOKTER,b.NMRUANGAN,
        SUM((a.HJUAL * a.SISA) + a.R) AS SubTotal,
        SUM(a.DISKON) AS DISKON,
        SUM((a.HJUAL * a.SISA) - (a.DISKON)) AS Total FROM tbl04_penjualan_detail a 
        LEFT JOIN tbl04_penjualan b ON a.KDJL=b.KDJL 
        WHERE b.KDLOKASI = '$KDLOKASI' AND b.JNSLAYANAN = '$LAYANAN'
        AND (DATE_FORMAT(b.TGLRESEP,'%Y-%m-%d') BETWEEN '".setDateEng($TGL_AWAL)."' AND '".setDateEng($TGL_AKHIR)."') 
        GROUP BY b.KDJL ORDER BY b.TGLRESEP";
        //echo $SQL;
        $dataPreview = $this->db->query("$SQL");
        $x['dataPreview'] = $dataPreview;*/

        $tAwal = (isset($_POST['tAwal'])) ? $_POST['tAwal'] : ""; 
        $tAkhir = (isset($_POST['tAkhir'])) ? $_POST['tAkhir'] : ""; 
        $kLok = (isset($_POST['kLok'])) ? $_POST['kLok'] : ""; 
        $SQL="SELECT * FROM tbl04_penjualan_retur a  JOIN tbl04_penjualan_retur_detail b ON a.KDJL_RET = b.KDJL_RET 
        WHERE KDLOKASI = '$kLok' AND DATE_FORMAT(DTJL_RET,'%d-%m-%Y') BETWEEN '$tAwal' AND '$tAkhir'";
            //echo $SQL;
        $dataPreview = $this->db->query("$SQL");
        $x['dataPreview'] = $dataPreview;
        $this->load->view('laporan/get_preview_retur_penjualan',$x);      
    }

    public function laporan_retur_penjualan(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_9");
            $y['index_menu'] = 9;
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['lokasi']=$this->db->get('tbl04_lokasi')->result();
            $y['contentTitle'] = "Laporan Retur Penjualan";
            $y['sub_menu'] = $this->load->view('laporan/sub_menu_lap_penjualan','',true);
            $x['content'] = $this->load->view('laporan/laporan_return_penjualan',$y,true);
            $this->load->view('template/theme', $x);
        }
    }
}
