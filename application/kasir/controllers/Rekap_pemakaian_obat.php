<?php defined('BASEPATH') OR exit('No direct script access allowed');
class rekap_pemakaian_obat extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $CI =& get_instance();
        $CI->load->library('status');
    }
    function index(){
        if(isLogin()):
            $this->farmasiDB = $this->load->database('farmasi',true); 
            $y['datpelayanan'] = $this->farmasiDB->get('pelayanan');
            $y['datjenis_pasien'] = $this->farmasiDB->get('jenis_pasien');
            $y['sub_menu'] = $this->load->view('laporan/sub_menu_lap_penjualan','',true);
            $x['content'] = $this->load->view('laporan/laporan_penjualan_per_reg',$y,true);
            $this->load->view('themes/main',$x);
        endif;
    }
    function getRegPasienKeyEnter(){
        if(isset($_POST['NOREG'])){
            $NOREG = $this->input->post('NOREG',true);
            $SQL = "SELECT * FROM t_pendaftaran WHERE id_daftar = '$NOREG'";

            $this->simrsDB = $this->load->database('simrs',true);  
            $query = $this->simrsDB->query("$SQL");
            if($query->num_rows() > 0){
                $res = $query->row_array();
                $params = array(
                    'code' => 200,
                    'message'  => ''
                );
            }else{
                $params = array(
                    'code' => 201,
                    'message'  => 'Maaf data tidak ditemukan'
                );
            }
        }else{
            $params = array(
                'code' => 401,
                'message'  => 'Ops. request anda tidak diizinkan. Silahkan hubungi administrator'
            );
        }
        echo json_encode($params);
    }
    function getRegPasien(){
        if(isset($_POST['KEYWORDS'])){
            $KEYWORDS = $this->input->post('KEYWORDS',true);
            $SQL = "SELECT a.nomr,a.id_daftar,a.tgl_reg,
            (SELECT nama FROM m_pasien WHERE m_pasien.nomr = a.nomr) AS nama,
            (SELECT jns_kelamin FROM m_pasien WHERE m_pasien.nomr = a.nomr) AS jns_kelamin,
            (SELECT tgl_lahir FROM m_pasien WHERE m_pasien.nomr = a.nomr) AS tgl_lahir,
            (SELECT alamat FROM m_pasien WHERE m_pasien.nomr = a.nomr) AS alamat
            FROM t_pendaftaran a
            WHERE a.nomr LIKE '%$KEYWORDS%' OR a.id_daftar LIKE '%$KEYWORDS%' OR 
            (SELECT nama FROM m_pasien WHERE m_pasien.nomr = a.nomr) LIKE '%$KEYWORDS%' 
            ORDER BY a.nomr DESC LIMIT 100";
        }        
        $this->simrsDB = $this->load->database('simrs',true);  
        $x['SQL'] = $this->simrsDB->query("$SQL");
        echo $SQL;
        echo $this->load->view('laporan/getPasien_2',$x);
    }
    function cetak_2(){
        $tmpdir = sys_get_temp_dir();   # ambil direktori temporary untuk simpan file.
        $file =  tempnam($tmpdir, 'temp'.date('dmYHis'));  # nama file temporary yang akan dicetak
        $handle = fopen($file, 'w');
        $condensed = Chr(27) . Chr(33) . Chr(4);
        $bold1 = Chr(27) . Chr(69);
        $bold0 = Chr(27) . Chr(70);
        $initialized = chr(27).chr(64);
        $condensed1 = chr(15);
        $condensed0 = chr(18);
        $tab0 = chr(9);
        $tab1 = chr(9).chr(9).chr(9).chr(9).chr(9).chr(9);
        $space = chr(32);
        
        $title = getCompanyOK();
        $address = getAddressOK_1();
        $telp = getAddressOK_2();
        
        $x['Data']  = $initialized;
        $x['Data'] .= $condensed1;
        $x['Data'] .= "\n";
                
        $NOREG = (isset($_GET['nreg'])) ? $_GET['nreg'] : ""; 
        $KDJPASIEN = (isset($_GET['kdj'])) ? $_GET['kdj'] : ""; 
        $KDPELAYANAN = (isset($_GET['kdp'])) ? $_GET['kdp'] : ""; 
        $GROUPING = (isset($_GET['grouping'])) ? $_GET['grouping'] : ""; 
        
        if($KDJPASIEN=="ALL"){
            $QM_JENIS_PASIEN = ""; 
            $QSM_JENIS_PASIEN = ""; 
        }else{
            $QM_JENIS_PASIEN = "a.KDJPASIEN = '$KDJPASIEN' AND"; 
            $QSM_JENIS_PASIEN = "d.KDJPASIEN = '$KDJPASIEN' AND"; 
        }
        
        if($KDPELAYANAN=="ALL"){
            $QM_JENIS_PELAYANAN = ""; 
            $QSM_JENIS_PELAYANAN = ""; 
        }else{
            $QM_JENIS_PELAYANAN = "a.KDPELAYANAN = '$KDPELAYANAN' AND"; 
            $QSM_JENIS_PELAYANAN = "d.KDPELAYANAN = '$KDPELAYANAN' AND"; 
        }

        $SQL_MAIN = "SELECT a.*,b.NMPELAYANAN,c.NMJPASIEN 
        FROM penjualan a 
        LEFT JOIN pelayanan b ON a.KDPELAYANAN=b.KDPELAYANAN
        LEFT JOIN jenis_pasien c ON a.KDJPASIEN=c.KDJPASIEN
        WHERE $QM_JENIS_PASIEN  $QM_JENIS_PELAYANAN ID_DAFTAR = '$NOREG'
        GROUP BY NOMR";
        $this->farmasiDB = $this->load->database('farmasi',true); 
        
        $cek = $this->farmasiDB->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
            $x['NOREG'] = $res['ID_DAFTAR'];
            $x['NOMR'] = $res['NOMR'];
            $x['NMPASIEN'] = $res['NMPASIEN'];
            $x['ALMTPASIEN'] = $res['ALMTPASIEN'];

            if($KDJPASIEN=="ALL"){
                $x['KDJPASIEN'] = "ALL";
                $x['NMJPASIEN'] = "Semua Jenis Pasien";
            }else{
                $x['KDJPASIEN'] = $res['KDJPASIEN'];
                $x['NMJPASIEN'] = $res['NMJPASIEN'];
            }
            
            if($KDPELAYANAN=="ALL"){
                $x['KDPELAYANAN'] = "ALL";
                $x['NMPELAYANAN'] = "Semua Jenis Pelayanan";
            }else{
                $x['KDPELAYANAN'] = $res['KDPELAYANAN'];
                $x['NMPELAYANAN'] = $res['NMPELAYANAN'];
            }

            $x['Data'] .= str_pad($title, 137, " ", STR_PAD_BOTH) . "\n";
            $x['Data'] .= str_pad($address, 137, " ", STR_PAD_BOTH) . "\n";
            $x['Data'] .= str_pad($telp, 137, " ", STR_PAD_BOTH) . "\n";
            $x['Data'] .= "=========================================================================================================================================\n";
            $x['Data'] .= str_pad("Rekap Pemakaian Obat Pasien Per No Registrasi", 137, " ", STR_PAD_BOTH) . "\n\n";
            
            $x['Data'] .= str_pad("No Reg", 15, " ", STR_PAD_RIGHT) . " : ";
            $x['Data'] .= str_pad($x['NOREG'], 50, " ", STR_PAD_RIGHT) . "";
            $x['Data'] .= str_pad("Jenis Pasien", 15, " ", STR_PAD_RIGHT) . " : ";
            $x['Data'] .= str_pad($x['NMJPASIEN'], 50, " ", STR_PAD_RIGHT) . "\n";

            $x['Data'] .= str_pad("No MR", 15, " ", STR_PAD_RIGHT) . " : ";
            $x['Data'] .= str_pad($x['NOMR'], 50, " ", STR_PAD_RIGHT) . "";
            $x['Data'] .= str_pad("Jenis Layanan", 15, " ", STR_PAD_RIGHT) . " : ";
            $x['Data'] .= str_pad($x['NMPELAYANAN'], 50, " ", STR_PAD_RIGHT) . "\n";

            $x['Data'] .= str_pad("Nama Pasien", 15, " ", STR_PAD_RIGHT) . " : ";
            $x['Data'] .= str_pad($x['NMPASIEN'], 50, " ", STR_PAD_RIGHT) . "\n";

            if($GROUPING=="0"){
                $x['Data'] .= "-----------------------------------------------------------------------------------------------------------------------------------------\n";
                $x['Data'] .= "|" . str_pad("No", 6, " ", STR_PAD_BOTH) . "|";
                $x['Data'] .= str_pad("Tgl Faktur", 12, " ", STR_PAD_BOTH) . "|";
                $x['Data'] .= str_pad("No Faktur", 12, " ", STR_PAD_BOTH) . "|";
                $x['Data'] .= str_pad("Tgl Resep", 12, " ", STR_PAD_BOTH) . "|";
                $x['Data'] .= str_pad("Nama Obat / Alat Kesehatan", 33, " ", STR_PAD_BOTH) . "|";
                $x['Data'] .= str_pad("Satuan", 12, " ", STR_PAD_BOTH) . "|";
                $x['Data'] .= str_pad("Jml", 10, " ", STR_PAD_BOTH) . "|";
                $x['Data'] .= str_pad("Harga", 14, " ", STR_PAD_BOTH) . "|";
                $x['Data'] .= str_pad("Total", 16, " ", STR_PAD_BOTH) . "|\n";
                $x['Data'] .= "-----------------------------------------------------------------------------------------------------------------------------------------\n";
                
                $SQL = "SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
                FROM penjualan_detail a 
                LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
                LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
                LEFT JOIN penjualan d ON a.KDJL=d.KDJL
                WHERE $QSM_JENIS_PASIEN  $QSM_JENIS_PELAYANAN ID_DAFTAR = '$NOREG' AND SISA != 0
                ORDER BY d.TGLRESEP";
                $dataPreview = $this->farmasiDB->query("$SQL");
                $x['dataPreview'] = $dataPreview;
        
                $i = 1;
                $subTotal = 0;
                $subTotalR = 0;
                foreach($dataPreview->result_array() as $y): 
                    $x['Data'] .= "|" . str_pad($i++, 5, " ", STR_PAD_BOTH) . " | ";
                    $x['Data'] .= str_pad(date('d-m-Y',strtotime($y['DTJL'])), 10, " ", STR_PAD_BOTH) . " | ";
                    $x['Data'] .= str_pad($y['KDJL'], 10, " ", STR_PAD_BOTH) . " | ";
                    $x['Data'] .= str_pad(date('d-m-Y',strtotime($y['TGLRESEP'])), 10, " ", STR_PAD_BOTH) . " | ";
                    $x['Data'] .= str_pad(substr($y['NMBRG'],0,29), 31, " ", STR_PAD_RIGHT) . " | ";
                    $x['Data'] .= str_pad($y['NMSATUAN'], 10, " ", STR_PAD_LEFT) . " | ";
                    $x['Data'] .= str_pad(number_format($y['SISA'],0,',','.'), 8, " ", STR_PAD_LEFT) . " | ";
                    $x['Data'] .= str_pad(number_format($y['HJUAL'],0,',','.'), 12, " ", STR_PAD_LEFT) . " | ";
                    $x['Data'] .= str_pad(number_format($y['HJUAL'] * $y['SISA'],0,',','.'), 14, " ", STR_PAD_LEFT) . " |\n";
                    
                    $subTotalR = $subTotalR + ($y['R']);
                    $subTotal = $subTotal + ($y['HJUAL'] * $y['SISA']);
                endforeach;
        
                $x['Data'] .= "-----------------------------------------------------------------------------------------------------------------------------------------\n";
                $x['Data'] .= " " . str_pad("Total", 117, " ", STR_PAD_LEFT) . " | ";
                $x['Data'] .= " " . str_pad(number_format($subTotal,0,',','.'), 14, " ", STR_PAD_LEFT) . "\n";
                $x['Data'] .= " " . str_pad("Total R", 117, " ", STR_PAD_LEFT) . " | ";
                $x['Data'] .= " " . str_pad(number_format($subTotalR,0,',','.'), 14, " ", STR_PAD_LEFT) . "\n";
                $x['Data'] .= " " . str_pad("Grand Total", 117, " ", STR_PAD_LEFT) . " | ";
                $x['Data'] .= " " . str_pad(number_format($subTotalR + $subTotal,0,',','.'), 14, " ", STR_PAD_LEFT) . "\n";
                $x['Data'] .= "-----------------------------------------------------------------------------------------------------------------------------------------\n";
                $x['Data'] .= "     " . $tab0 . "  " . "Diketahui," . $tab1 . "Dicetak Oleh," . $tab0 . "\n";
                $x['Data'] .= "\n\n";
                $x['Data'] .= "     " . $tab0 . "  " . "..........." . $tab1 . getNmLengkap() . $tab0 . "\n";
        
                $this->load->view('laporan/print_preview_2a',$x);
            }else{
                $x['Data'] .= "-----------------------------------------------------------------------------------------------------------------------------------------\n";
                $x['Data'] .= "|" . str_pad("No", 6, " ", STR_PAD_BOTH) . "|";
                $x['Data'] .= str_pad("Nama Obat / Alat Kesehatan", 72, " ", STR_PAD_BOTH) . "|";
                $x['Data'] .= str_pad("Satuan", 12, " ", STR_PAD_BOTH) . "|";
                $x['Data'] .= str_pad("Jml", 10, " ", STR_PAD_BOTH) . "|";
                $x['Data'] .= str_pad("Harga", 14, " ", STR_PAD_BOTH) . "|";
                $x['Data'] .= str_pad("Total", 16, " ", STR_PAD_BOTH) . "|\n";
                $x['Data'] .= "-----------------------------------------------------------------------------------------------------------------------------------------\n";
                
                $SQL = "SELECT b.*,SUM(a.JMLJUAL) AS JMLJUAL,
                a.HJUAL,SUM(a.R) AS R,a.SUBTOTAL,c.NMSATUAN,SUM(a.SISA) AS SISA,
                a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
                FROM penjualan_detail a 
                LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
                LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
                LEFT JOIN penjualan d ON a.KDJL=d.KDJL
                WHERE $QSM_JENIS_PASIEN  $QSM_JENIS_PELAYANAN ID_DAFTAR = '$NOREG' AND SISA != 0
                GROUP BY a.KDBRG
                ORDER BY d.TGLRESEP";
                $dataPreview = $this->farmasiDB->query("$SQL");
                $x['dataPreview'] = $dataPreview;
        
                $i = 1;
                $subTotal = 0;
                $subTotalR = 0;
                foreach($dataPreview->result_array() as $y): 
                    $x['Data'] .= "|" . str_pad($i++, 5, " ", STR_PAD_BOTH) . " | ";
                    $x['Data'] .= str_pad(substr($y['NMBRG'],0,29), 70, " ", STR_PAD_RIGHT) . " | ";
                    $x['Data'] .= str_pad($y['NMSATUAN'], 10, " ", STR_PAD_LEFT) . " | ";
                    $x['Data'] .= str_pad(number_format($y['SISA'],0,',','.'), 8, " ", STR_PAD_LEFT) . " | ";
                    $x['Data'] .= str_pad(number_format($y['HJUAL'],0,',','.'), 12, " ", STR_PAD_LEFT) . " | ";
                    $x['Data'] .= str_pad(number_format($y['HJUAL'] * $y['SISA'],0,',','.'), 14, " ", STR_PAD_LEFT) . " |\n";
                    
                    $subTotalR = $subTotalR + ($y['R']);
                    $subTotal = $subTotal + ($y['HJUAL'] * $y['SISA']);
                endforeach;
        
                $x['Data'] .= "-----------------------------------------------------------------------------------------------------------------------------------------\n";
                $x['Data'] .= " " . str_pad("Total", 117, " ", STR_PAD_LEFT) . " | ";
                $x['Data'] .= " " . str_pad(number_format($subTotal,0,',','.'), 14, " ", STR_PAD_LEFT) . "\n";
                $x['Data'] .= " " . str_pad("Total R", 117, " ", STR_PAD_LEFT) . " | ";
                $x['Data'] .= " " . str_pad(number_format($subTotalR,0,',','.'), 14, " ", STR_PAD_LEFT) . "\n";
                $x['Data'] .= " " . str_pad("Grand Total", 117, " ", STR_PAD_LEFT) . " | ";
                $x['Data'] .= " " . str_pad(number_format($subTotalR + $subTotal,0,',','.'), 14, " ", STR_PAD_LEFT) . "\n";
                $x['Data'] .= "-----------------------------------------------------------------------------------------------------------------------------------------\n";
                $x['Data'] .= "     " . $tab0 . "  " . "Diketahui," . $tab1 . "Dicetak Oleh," . $tab0 . "\n";
                $x['Data'] .= "\n\n";
                $x['Data'] .= "     " . $tab0 . "  " . "..........." . $tab1 . getNmLengkap() . $tab0 . "\n";
        
                $this->load->view('laporan/print_preview_2b',$x);
            }


            
        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                window.close();
            </script>";
        }        
    }   

    function laporan_penjualan_nomr(){
        if(isLogin()):
            $this->farmasiDB = $this->load->database('farmasi',true); 
            $y['datpelayanan'] = $this->farmasiDB->get('pelayanan');
            $y['datjenis_pasien'] = $this->farmasiDB->get('jenis_pasien');
            
            $y['sub_menu'] = $this->load->view('laporan/sub_menu_lap_penjualan','',true);
            $x['content'] = $this->load->view('laporan/laporan_penjualan',$y,true);
            $this->load->view('themes/main',$x);
        endif;
    }
    function getPasienKeyEnter(){
        if(isset($_POST['NOMR'])){
            $NOMR = $this->input->post('NOMR',true);
            $SQL = "SELECT * FROM m_pasien WHERE nomr = '$NOMR'";

            $this->simrsDB = $this->load->database('simrs',true);  
            $query = $this->simrsDB->query("$SQL");
            if($query->num_rows() > 0){
                $res = $query->row_array();
                $params = array(
                    'code' => 200,
                    'message'  => $res['nama']
                );
            }else{
                $params = array(
                    'code' => 201,
                    'message'  => 'Maaf data tidak ditemukan'
                );
            }
        }else{
            $params = array(
                'code' => 401,
                'message'  => 'Ops. request anda tidak diizinkan. Silahkan hubungi administrator'
            );
        }
        echo json_encode($params);
    }
    function getPasien(){
        if(isset($_POST['KEYWORDS'])){
            $KEYWORDS = $this->input->post('KEYWORDS',true);
            $SQL = "SELECT * FROM m_pasien WHERE nomr LIKE '%$KEYWORDS%' OR nama LIKE '%$KEYWORDS%' ORDER BY nomr DESC LIMIT 100";
        }        
        $this->simrsDB = $this->load->database('simrs',true);  
        $x['SQL'] = $this->simrsDB->query("$SQL");
        echo $this->load->view('laporan/getPasien_1',$x);
    }
    function cetak_1(){
        $tmpdir = sys_get_temp_dir();   # ambil direktori temporary untuk simpan file.
        $file =  tempnam($tmpdir, 'temp'.date('dmYHis'));  # nama file temporary yang akan dicetak
        $handle = fopen($file, 'w');
        $condensed = Chr(27) . Chr(33) . Chr(4);
        $bold1 = Chr(27) . Chr(69);
        $bold0 = Chr(27) . Chr(70);
        $initialized = chr(27).chr(64);
        $condensed1 = chr(15);
        $condensed0 = chr(18);
        $tab0 = chr(9);
        $tab1 = chr(9).chr(9).chr(9).chr(9).chr(9).chr(9);
        $space = chr(32);
        
        $title = getCompanyOK();
        $address = getAddressOK_1();
        $telp = getAddressOK_2();
        
        $x['Data']  = $initialized;
        $x['Data'] .= $condensed1;
        $x['Data'] .= "\n";
                
        $NOMR = (isset($_GET['nmr'])) ? $_GET['nmr'] : ""; 
        $TGL_AWAL = (isset($_GET['tAwal'])) ? $_GET['tAwal'] : ""; 
        $TGL_AKHIR = (isset($_GET['tAkhir'])) ? $_GET['tAkhir'] : ""; 
        $KDJPASIEN = (isset($_GET['kdj'])) ? $_GET['kdj'] : ""; 
        $KDPELAYANAN = (isset($_GET['kdp'])) ? $_GET['kdp'] : ""; 
        
        $this->farmasiDB = $this->load->database('farmasi',true); 
        
        if($KDJPASIEN=="ALL"){
            $QM_JENIS_PASIEN = ""; 
            $QSM_JENIS_PASIEN = ""; 
        }else{
            $QM_JENIS_PASIEN = "a.KDJPASIEN = '$KDJPASIEN' AND"; 
            $QSM_JENIS_PASIEN = "d.KDJPASIEN = '$KDJPASIEN' AND"; 
        }
        
        if($KDPELAYANAN=="ALL"){
            $QM_JENIS_PELAYANAN = ""; 
            $QSM_JENIS_PELAYANAN = ""; 
        }else{
            $QM_JENIS_PELAYANAN = "a.KDPELAYANAN = '$KDPELAYANAN' AND"; 
            $QSM_JENIS_PELAYANAN = "d.KDPELAYANAN = '$KDPELAYANAN' AND"; 
        }
        
        $SQL_MAIN = "SELECT a.*,b.NMPELAYANAN,c.NMJPASIEN 
        FROM penjualan a 
        LEFT JOIN pelayanan b ON a.KDPELAYANAN=b.KDPELAYANAN
        LEFT JOIN jenis_pasien c ON a.KDJPASIEN=c.KDJPASIEN
        WHERE NOMR = '$NOMR' AND $QM_JENIS_PASIEN  $QM_JENIS_PELAYANAN
        (DATE_FORMAT(a.TGLRESEP,'%Y-%m-%d') BETWEEN '".setTglEng($TGL_AWAL)."' AND '".setTglEng($TGL_AKHIR)."') 
        GROUP BY NOMR";
        
        $cek = $this->farmasiDB->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
            $x['NOMR'] = $res['NOMR'];
            $x['NMPASIEN'] = $res['NMPASIEN'];
            $x['ALMTPASIEN'] = $res['ALMTPASIEN'];

            if($KDJPASIEN=="ALL"){
                $x['KDJPASIEN'] = "ALL";
                $x['NMJPASIEN'] = "Semua Jenis Pasien";
            }else{
                $x['KDJPASIEN'] = $res['KDJPASIEN'];
                $x['NMJPASIEN'] = $res['NMJPASIEN'];
            }
            
            if($KDPELAYANAN=="ALL"){
                $x['KDPELAYANAN'] = "ALL";
                $x['NMPELAYANAN'] = "Semua Jenis Pelayanan";
            }else{
                $x['KDPELAYANAN'] = $res['KDPELAYANAN'];
                $x['NMPELAYANAN'] = $res['NMPELAYANAN'];
            }

            $x['Data'] .= str_pad($title, 137, " ", STR_PAD_BOTH) . "\n";
            $x['Data'] .= str_pad($address, 137, " ", STR_PAD_BOTH) . "\n";
            $x['Data'] .= str_pad($telp, 137, " ", STR_PAD_BOTH) . "\n";
            $x['Data'] .= "=========================================================================================================================================\n";
            $x['Data'] .= str_pad("Rekap Pemakaian Obat Pasien Per Periode Layanan", 137, " ", STR_PAD_BOTH) . "\n\n";
            
            $x['Data'] .= str_pad("No MR", 15, " ", STR_PAD_RIGHT) . " : ";
            $x['Data'] .= str_pad($x['NOMR'], 50, " ", STR_PAD_RIGHT) . "";
            $x['Data'] .= str_pad("Jenis Layanan", 15, " ", STR_PAD_RIGHT) . " : ";
            $x['Data'] .= str_pad($x['NMPELAYANAN'], 50, " ", STR_PAD_RIGHT) . "\n";

            $x['Data'] .= str_pad("Nama Pasien", 15, " ", STR_PAD_RIGHT) . " : ";
            $x['Data'] .= str_pad($x['NMPASIEN'], 50, " ", STR_PAD_RIGHT) . "";
            $x['Data'] .= str_pad("Tgl Masuk", 15, " ", STR_PAD_RIGHT) . " : ";
            $x['Data'] .= str_pad(date('d-m-Y',strtotime($TGL_AWAL)), 50, " ", STR_PAD_RIGHT) . "\n";

            $x['Data'] .= str_pad("Jenis Pasien", 15, " ", STR_PAD_RIGHT) . " : ";
            $x['Data'] .= str_pad($x['NMJPASIEN'], 50, " ", STR_PAD_RIGHT) . "";
            $x['Data'] .= str_pad("Tgl Keluar", 15, " ", STR_PAD_RIGHT) . " : ";
            $x['Data'] .= str_pad(date('d-m-Y',strtotime($TGL_AKHIR)), 50, " ", STR_PAD_RIGHT) . "\n";

            $x['Data'] .= "=========================================================================================================================================\n";
            $x['Data'] .= "|" . str_pad("No", 6, " ", STR_PAD_BOTH) . "|";
            $x['Data'] .= str_pad("Tgl Faktur", 12, " ", STR_PAD_BOTH) . "|";
            $x['Data'] .= str_pad("No Faktur", 12, " ", STR_PAD_BOTH) . "|";
            $x['Data'] .= str_pad("Tgl Resep", 12, " ", STR_PAD_BOTH) . "|";
            $x['Data'] .= str_pad("Nama Obat / Alat Kesehatan", 33, " ", STR_PAD_BOTH) . "|";
            $x['Data'] .= str_pad("Satuan", 12, " ", STR_PAD_BOTH) . "|";
            $x['Data'] .= str_pad("Jml", 10, " ", STR_PAD_BOTH) . "|";
            $x['Data'] .= str_pad("Harga", 14, " ", STR_PAD_BOTH) . "|";
            $x['Data'] .= str_pad("Total", 16, " ", STR_PAD_BOTH) . "|\n";
            $x['Data'] .= "-----------------------------------------------------------------------------------------------------------------------------------------\n";

        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                window.close();
            </script>";
        }        
        
        $SQL = "SELECT b.*,a.JMLJUAL,a.HJUAL,a.R,a.SUBTOTAL,c.NMSATUAN,a.SISA,a.JMLRET,d.DTJL,d.KDJL,d.TGLRESEP 
        FROM penjualan_detail a 
        LEFT JOIN barang b ON a.KDBRG=b.KDBRG 
        LEFT JOIN satuan c ON b.KDSATUAN=c.KDSATUAN 
        LEFT JOIN penjualan d ON a.KDJL=d.KDJL
        WHERE NOMR = '$NOMR' AND $QSM_JENIS_PASIEN  $QSM_JENIS_PELAYANAN
        (DATE_FORMAT(d.TGLRESEP,'%Y-%m-%d') BETWEEN '".setTglEng($TGL_AWAL)."' AND '".setTglEng($TGL_AKHIR)."') 
        ORDER BY d.TGLRESEP";
        $dataPreview = $this->farmasiDB->query("$SQL");
        $x['dataPreview'] = $dataPreview;

        $i = 1;
        $subTotal = 0;
        $subTotalR = 0;
        foreach($dataPreview->result_array() as $y): 
            $x['Data'] .= "|" . str_pad($i++, 5, " ", STR_PAD_BOTH) . " | ";
            $x['Data'] .= str_pad(date('d-m-Y',strtotime($y['DTJL'])), 10, " ", STR_PAD_BOTH) . " | ";
            $x['Data'] .= str_pad($y['KDJL'], 10, " ", STR_PAD_BOTH) . " | ";
            $x['Data'] .= str_pad(date('d-m-Y',strtotime($y['TGLRESEP'])), 10, " ", STR_PAD_BOTH) . " | ";
            $x['Data'] .= str_pad(substr($y['NMBRG'],0,29), 31, " ", STR_PAD_RIGHT) . " | ";
            $x['Data'] .= str_pad($y['NMSATUAN'], 10, " ", STR_PAD_LEFT) . " | ";
            $x['Data'] .= str_pad(number_format($y['SISA'],0,',','.'), 8, " ", STR_PAD_LEFT) . " | ";
            $x['Data'] .= str_pad(number_format($y['HJUAL'],0,',','.'), 12, " ", STR_PAD_LEFT) . " | ";
            $x['Data'] .= str_pad(number_format($y['HJUAL'] * $y['SISA'],0,',','.'), 14, " ", STR_PAD_LEFT) . " |\n";
            
            $subTotalR = $subTotalR + ($y['R']);
            $subTotal = $subTotal + ($y['HJUAL'] * $y['SISA']);
        endforeach;

        $x['Data'] .= "-----------------------------------------------------------------------------------------------------------------------------------------\n";
        $x['Data'] .= " " . str_pad("Total", 117, " ", STR_PAD_LEFT) . " | ";
        $x['Data'] .= " " . str_pad(number_format($subTotal,0,',','.'), 14, " ", STR_PAD_LEFT) . "\n";
        $x['Data'] .= " " . str_pad("Total R", 117, " ", STR_PAD_LEFT) . " | ";
        $x['Data'] .= " " . str_pad(number_format($subTotalR,0,',','.'), 14, " ", STR_PAD_LEFT) . "\n";
        $x['Data'] .= " " . str_pad("Grand Total", 117, " ", STR_PAD_LEFT) . " | ";
        $x['Data'] .= " " . str_pad(number_format($subTotalR + $subTotal,0,',','.'), 14, " ", STR_PAD_LEFT) . "\n";
        $x['Data'] .= "-----------------------------------------------------------------------------------------------------------------------------------------\n";
        $x['Data'] .= "     " . $tab0 . "  " . "Diketahui," . $tab1 . "Dicetak Oleh," . $tab0 . "\n";
        $x['Data'] .= "\n\n";
        $x['Data'] .= "     " . $tab0 . "  " . "..........." . $tab1 . getNmLengkap() . $tab0 . "\n";

        $x['TGL_AWAL'] = $TGL_AWAL;
        $x['TGL_AKHIR'] = $TGL_AKHIR;
        $this->load->view('laporan/print_preview_1',$x);
    }
}
