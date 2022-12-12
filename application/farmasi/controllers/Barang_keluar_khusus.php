<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class barang_keluar_khusus extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
    } 
    function index(){
        /*$ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_7");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $UID = $this->session->userdata('get_uid');

            // Config Group Lokasi Set Auto
            $SQL = "SELECT * FROM tbl04_lokasi WHERE KDLOKASI IN(SELECT ruang_akses 
            FROM tbl01_users_farmasi WHERE NRP = '$UID') AND KDGRLOKASI='2'";

            $y['contentTitle'] = "Transaksi Pengembalian Barang";

            $y['getRuang'] = $this->db->query("$SQL");
            $jmlruang=$y['getRuang']->num_rows();
            if($jmlruang==1) {
                $kdlok=$y['getRuang']->row()->KDLOKASI;
                header('location:'.base_url() ."farmasi.php/barang_keluar_khusus/goForm?kLok=" .$kdlok);
            }else{
                $x['content'] = $this->load->view('barang_keluar_khusus/template_ruang',$y,true);
                $this->load->view('template/theme',$x);
            }
            
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }*/

        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        if($ses_state){
            if ($this->session->userdata('kdlokasi')) {
                $y['kLok'] = $this->session->userdata('kdlokasi');
                if ($y['kLok']=="") {
                    echo "<script>alert('Ops. Lokasi tidak ditemukan.');history.back();</script>";
                }else{
                    $x['header'] = $this->load->view('template/header','',true);
                    $z = setNav("nav_7");
                    $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
                    $y['index_menu'] = 7;
                    $y['contentTitle'] = "Transaksi Pengembalian Barang";
                    $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);        
                    $x['content'] = $this->load->view('barang_keluar_khusus/template_table',$y,true);
                    $this->load->view('template/theme',$x);
                }
            }else{
                echo "<script>alert('Ops. Variable tidak ditemukan.');history.back();</script>";
            }
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }  
    }
    
    function goForm(){
        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        if($ses_state){
            if (isset($_GET['kLok'])) {
                $y['kLok'] = $this->input->get('kLok',true);
                if ($y['kLok']=="") {
                    echo "<script>alert('Ops. Lokasi tidak ditemukan.');history.back();</script>";
                }else{
                    $x['header'] = $this->load->view('template/header','',true);
                    $z = setNav("nav_7");
                    $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
                    $y['index_menu'] = 7;
                    $y['contentTitle'] = "Transaksi Pengembalian Barang";
                    $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);        
                    $x['content'] = $this->load->view('barang_keluar_khusus/template_table',$y,true);
                    $this->load->view('template/theme',$x);
                }
            }else{
                echo "<script>alert('Ops. Variable tidak ditemukan.');history.back();</script>";
            }
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }            
    }

    function getView(){
        if(isset($_POST['page'])):
            $offset = $this->input->post('page',true);
            $this->session->set_userdata('sPage',$offset);
        else:
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;
        
        $KDLOKASI = (isset($_POST['kLok'])) ? $this->input->post('kLok',true) : "";
        $limit = $this->perPage;
        $condition = "WHERE KDLOKASI='$KDLOKASI' ";
        if(isset($_POST['sLike'])){
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "AND (KDBKK LIKE '%$sLike%' OR NMREKANAN LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);
            
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (KDBKK LIKE '%$sLike%' OR NMREKANAN LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT * FROM tbl04_barang_keluar_khusus $condition ORDER BY DTBKK DESC";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['kdlokasi']    = $KDLOKASI;
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'farmasi.php/barang_keluar_khusus/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('barang_keluar_khusus/getdata',$x);
    }

    function tambah(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_7");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['kLok'] = ($this->session->userdata('kdlokasi')) ? $this->session->userdata('kdlokasi') : "";
            $y['index_menu'] = 7;
            $y['contentTitle'] = "Entry Transaksi Pengembalian Barang";
            $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);        

            $y['datrekanan'] = $this->db->get('tbl04_rekanan_khusus');
            $x['content'] = $this->load->view('barang_keluar_khusus/template_entry',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }   
    }

    function getObat(){
        $keyword = (isset($_POST['keyword'])) ? $this->input->post('keyword',true) : "";
        $KDLOKASI = (isset($_POST['KDLOKASI'])) ? $this->input->post('KDLOKASI',true) : "";
        $SQL = "SELECT a.KDBRG,b.NMBRG,b.KDSATUAN,b.NMSATUAN,a.KDLOKASI,
        SUM(JSTOK) AS JSTOK,b.HJUAL
        FROM stok_barang_fifo a 
        JOIN tbl04_barang b ON a.KDBRG=b.KDBRG
        WHERE (a.KDBRG LIKE '%$keyword%' OR b.NMBRG LIKE '%$keyword%') AND a.KDLOKASI = '$KDLOKASI' 
        GROUP BY a.KDBRG,a.KDLOKASI ORDER BY NMBRG LIMIT 100";

        //echo $SQL;  exit;  
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('barang_keluar_khusus/getObat_cari',$x);
    }
    function getTemp(){
        $UEXEC = getUserID();
        $SQL = "SELECT * FROM tbl04_temp_barang_keluar_khusus WHERE UEXEC = '$UEXEC'";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('barang_keluar_khusus/get_temp',$x);        
    }
    function hapusTemp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $this->db->where('IDX',$_POST['IDX']);
            $cek = $this->db->delete('tbl04_temp_barang_keluar_khusus');
            if ($cek) {
                $x['code'] = 200;
                $x['message'] = 'Delete Sukses';                
            }else{
                $x['code'] = 401;
                $x['message'] = 'Query delete not success';                
            }
        }else{
            $x['code'] = 402;
            $x['message'] = 'Sesi anda telah habis. Silahkan login kembali';                
        }
        echo json_encode($x);           
    }
    
    function emptyTemp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $this->db->where('UEXEC',getUserID());
            $cek = $this->db->delete('tbl04_temp_barang_keluar_khusus');
            if ($cek) {
                $x['code'] = 200;
                $x['message'] = 'Delete Sukses';                
            }else{
                $x['code'] = 401;
                $x['message'] = 'Query delete not success';                
            }
        }else{
            $x['code'] = 402;
            $x['message'] = 'Sesi anda telah habis. Silahkan login kembali';                
        }
        echo json_encode($x);   
    }
    function simpanTemp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['KDBRG']) &&
                    isset($_POST['NMBRG']) &&
                    isset($_POST['NMSATUAN']) &&
                    isset($_POST['JSTOK']) &&
                    isset($_POST['JMLKELUAR'])
                ){
                    $params = array(
                        'KDBRG'     => trim($this->input->post('KDBRG',true)),
                        'NMBRG'     => trim($this->input->post('NMBRG',true)),
                        'NMSATUAN'  => trim($this->input->post('NMSATUAN',true)),
                        'JSTOK'     => str_replace(",","",trim($this->input->post('JSTOK',true))),
                        'JMLKELUAR' => str_replace(",","",trim($this->input->post('JMLKELUAR',true))),
                        'UEXEC'     => getUserID()
                    );

                    if(
                        $params['KDBRG']=="" ||
                        $params['NMBRG']=="" ||
                        $params['JSTOK']=="" ||
                        $params['JMLKELUAR']==""
                    ){
                        $x['code'] = 401;
                        $x['message'] = "Ops. Masih ada data yang kosong. Silahkan lengkapi data.";
                    }elseif($params['JMLKELUAR'] > $params['JSTOK']){
                        $x['code'] = 402;
                        $x['message'] = "Ops. Jumlah keluar tidak boleh lebih besar dari jumlah stok.";
                    }else{

                        $this->db->where('KDBRG',$params['KDBRG']);
                        $this->db->where('UEXEC',getUserID());
                        $resData = $this->db->get('tbl04_temp_barang_keluar_khusus');
                        if($resData->num_rows() > 0){
                            
                            $this->db->where('KDBRG',$params['KDBRG']);
                            $this->db->where('UEXEC',getUserID());
                            $cek = $this->db->update('tbl04_temp_barang_keluar_khusus',$params);
                            if ($cek) {
                                $x['code'] = 201;
                                $x['message'] = 'Update Sukses';                
                            }else{
                                $x['code'] = 402;
                                $x['message'] = 'Query update not success';                
                            }
                        }else{
                            $cek = $this->db->insert('tbl04_temp_barang_keluar_khusus',$params);
                            if ($cek) {
                                $x['code'] = 200;
                                $x['message'] = 'Simpan Sukses';                      
                            }else{
                                $x['code'] = 403;
                                $x['message'] = 'Query simpan not success';                
                            }
                        }  
                    }  
                }else{
                    $response['code'] = 404;
                    $response['message'] = "Ops. Variable tidak ditemukan.\nCoba ulangi kembali.";
                }  
            }else{
                $response['code'] = 405;
                $response['message'] = "Ops. Method tidak ditemukan.\nCoba ulangi kembali.";
            }  
        }else{
            $x['code'] = 406;
            $x['message'] = 'Sesi anda telah habis. Silahkan login kembali';  
        }
        echo json_encode($x);
    }    
     
    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['TGLTRANSAKSI']) &&
                    isset($_POST['KDLOKASI']) &&
                    isset($_POST['NMLOKASI']) &&
                    isset($_POST['KDREKANAN']) &&
                    isset($_POST['NMREKANAN']) &&
                    isset($_POST['KETBKK'])
                ){
                    $params = array(
                        'KDBKK'        => '',
                        'DTBKK'        => date('Y-m-d H:i:s'),
                        'TGLTRANSAKSI' => setDateEng(trim($this->input->post('TGLTRANSAKSI',true))),
                        'KDLOKASI'     => trim($this->input->post('KDLOKASI',true)),
                        'NMLOKASI'     => trim($this->input->post('NMLOKASI',true)),
                        'KDREKANAN'    => trim($this->input->post('KDREKANAN',true)),
                        'NMREKANAN'    => trim($this->input->post('NMREKANAN',true)),
                        'KETBKK'       => trim($this->input->post('KETBKK',true)),
                        'UEXEC'        => getUserID()
                    );

                    if(
                        $params['TGLTRANSAKSI']=="" ||
                        $params['KDLOKASI']=="" ||
                        $params['NMLOKASI']=="" ||
                        $params['KDREKANAN']=="" ||
                        $params['NMREKANAN']==""
                    ){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Masih ada data yang kosong. Silahkan lengkapi data.";                        
                    }else{
                        $this->db->where('UEXEC',getUserID());
                        $cek = $this->db->get('tbl04_temp_barang_keluar_khusus');
                        if($cek->num_rows() > 0){
                            # Cek kondisi Stok Kembali 
                            $validStok = TRUE;
                            $UEXEC = getUserID();
                            $KDLOKASI = $params['KDLOKASI'];

                            $resTemp = $this->db->query("SELECT * FROM tbl04_temp_barang_keluar_khusus WHERE UEXEC='$UEXEC'")->result_array();
                            foreach($resTemp as $item){
                                $cekItem = $this->db->query("SELECT a.KDBRG,b.NMBRG,KDLOKASI,SUM(JSTOK) AS JSTOK 
                                    FROM stok_barang_fifo a
                                    LEFT JOIN tbl04_barang b ON a.KDBRG=b.KDBRG
                                    WHERE a.KDLOKASI='$KDLOKASI' AND a.KDBRG='$item[KDBRG]'
                                    GROUP BY a.KDBRG,a.KDLOKASI");

                                if($cekItem->num_rows() > 0){
                                    $rsCekItem = $cekItem->row_array();
                                    if($rsCekItem['JSTOK'] < $item['JMLKELUAR']){
                                        $validStok = FALSE; 
                                        $NMBRG = $item['NMBRG'];
                                        break;
                                    }
                                } 
                            }

                            if($validStok){
                                $this->db->insert('tbl04_barang_keluar_khusus',$params);

                                $this->db->where('UEXEC',$UEXEC);
                                $this->db->where('KDLOKASI',$KDLOKASI);
                                $this->db->order_by('KDBKK','DESC');
                                $this->db->limit(1);
                                $resMainInsert = $this->db->get('tbl04_barang_keluar_khusus')->row_array();

                                foreach($resTemp as $itemOP){
                                    $KDBKK = $resMainInsert['KDBKK'];
                                    $KDBRG = $itemOP['KDBRG'];
                                    $NMBRG = $itemOP['NMBRG'];
                                    $JMLKELUAR = $itemOP['JMLKELUAR'];
                                    $this->loop_item($KDBKK,$KDBRG,$NMBRG,$KDLOKASI,$JMLKELUAR);
                                }

                                $this->db->where('UEXEC',getUserID());
                                $this->db->delete('tbl04_temp_barang_keluar_khusus');

                                $response['code'] = 200;
                                $response['message'] = $KDBKK;
                            }else{
                                $params = array(
                                    'code'    => 201,
                                    'message' => 'Obat '.$NMBRG.' tidak bisa dikembalikan.'.chr(10).'Jumlah obat tidak mencukupi'
                                );                    
                            }                    
                        }else{
                            $response['code'] = 402;
                            $response['message'] = "Ops. Item barang masih kosong.";
                        }
                    }
                }else{
                    $response['code'] = 403;
                    $response['message'] = "Ops. Variable tidak ditemukan.\nCoba ulangi kembali.";
                }
            }else{
                $response['code'] = 404;
                $response['message'] = "Ops. Method tidak ditemukan.\nCoba ulangi kembali.";
            }
        }else{
            $response['code'] = 405;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
        }
        echo json_encode($response);
    }

    function loop_item($KDBKK,$KDBRG,$NMBRG,$KDLOKASI,$KELUAR){
        $rqSTOK = $this->db->query("SELECT * FROM stok_barang_fifo 
            WHERE KDBRG = '$KDBRG' 
            AND KDLOKASI = '$KDLOKASI' 
            AND TGLBELI = (SELECT TGLBELI FROM stok_barang_fifo 
            WHERE JSTOK > 0 AND KDBRG = '$KDBRG' AND KDLOKASI = '$KDLOKASI' 
            ORDER BY TGLBELI ASC LIMIT 1)
            AND JSTOK > 0 LIMIT 1")->row_array();

        if($KELUAR < $rqSTOK['JSTOK']) {
            // Insert Item
            $params_item = array(
                'KDBKK' => $KDBKK,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'EXPDATE'=> $rqSTOK['TGLEXP'],
                'JMLBKK' => $KELUAR,
                'JMLRET' => 0,
                'SISA' => $KELUAR
            );
            $this->db->insert('tbl04_barang_keluar_khusus_detail',$params_item);
        }elseif ($KELUAR > $rqSTOK['JSTOK']) {
            $params_item = array(
                'KDBKK' => $KDBKK,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'EXPDATE' => $rqSTOK['TGLEXP'],
                'JMLBKK' => $rqSTOK['JSTOK'],
                'JMLRET' => 0,
                'SISA' => $rqSTOK['JSTOK']
            );
            $this->db->insert('tbl04_barang_keluar_khusus_detail',$params_item);  
            $KELUAR = $KELUAR - $rqSTOK['JSTOK'];                      
            $this->loop_item($KDBKK,$KDBRG,$NMBRG,$KDLOKASI,$KELUAR);
        }elseif ($KELUAR = $rqSTOK['JSTOK']) {
            $params_item = array(
                'KDBKK' => $KDBKK,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'EXPDATE' => $rqSTOK['TGLEXP'],
                'JMLBKK' => $KELUAR,
                'JMLRET' => 0,
                'SISA' => $KELUAR
            );
            $this->db->insert('tbl04_barang_keluar_khusus_detail',$params_item);
        }         
    }

    function cetak(){
        $tmpdir = sys_get_temp_dir();   # ambil direktori temporary untuk simpan file.
        $file =  tempnam($tmpdir, 'ctk');  # nama file temporary yang akan dicetak
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
        
        $title = COMPANY_NAME;
        $address = REPORT_ADDRESS_1;
        $telp = REPORT_ADDRESS_2;
        
        $x['Data']  = $initialized;
        $x['Data'] .= $condensed1;
        $x['Data'] .= "\n";
        
        $KDBKK = (isset($_GET['kode'])) ? $_GET['kode'] : ""; 
        $this->db->where('KDBKK',$KDBKK);
        $cek = $this->db->get('tbl04_barang_keluar_khusus');
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
            $x['KDBKK'] = $res['KDBKK'];
            $x['DTBKK'] = $res['DTBKK'];
            $x['TGLTRANSAKSI'] = $res['TGLTRANSAKSI'];
            $x['KDLOKASI'] = $res['KDLOKASI'];
            $x['NMLOKASI'] = $res['NMLOKASI'];
            $x['KDREKANAN'] = $res['KDREKANAN'];
            $x['NMREKANAN'] = $res['NMREKANAN'];
            $x['KETBKK'] = $res['KETBKK'];
            $KETBKK = $res['KETBKK'];
            
            $x['Data'] .= str_pad($title, 137, " ", STR_PAD_BOTH) . "\n";
            $x['Data'] .= str_pad($address, 137, " ", STR_PAD_BOTH) . "\n";
            $x['Data'] .= str_pad($telp, 137, " ", STR_PAD_BOTH) . "\n";
            $x['Data'] .= "=========================================================================================================================================\n";
            $x['Data'] .= "Kode BKK" . $tab0 . ": " . $bold1 . $KDBKK . $bold0 . $tab1 . "Lokasi Asal" . $tab0 . $tab0 . ": ". $res['NMLOKASI'] . "\n";
            $x['Data'] .= "Tgl.Transaksi" . $tab0 . ": ". date('d-m-Y',strtotime($res['TGLTRANSAKSI'])) . $tab1 . "Rekanan" . $tab0  . $tab0 . ": ". $res['NMREKANAN'] . "\n";
            $x['Data'] .= "=========================================================================================================================================\n";
            $x['Data'] .= "|" . str_pad("No", 6, " ", STR_PAD_BOTH) . "|";
            $x['Data'] .= str_pad("Kode", 12, " ", STR_PAD_BOTH) . "|";
            $x['Data'] .= str_pad("Nama Obat / Alat Kesehatan", 87, " ", STR_PAD_BOTH) . "|";
            $x['Data'] .= str_pad("Satuan", 16, " ", STR_PAD_BOTH) . "|";
            $x['Data'] .= str_pad("Jml", 10, " ", STR_PAD_BOTH) . "|\n";
            $x['Data'] .= "-----------------------------------------------------------------------------------------------------------------------------------------\n";

            $SQL = "SELECT KDBRG,NMBRG,SUM(JMLBKK) AS JMLBKK FROM tbl04_barang_keluar_khusus_detail 
            WHERE KDBKK = '$KDBKK' GROUP BY KDBRG ORDER BY NMBRG";
            $dataPreview = $this->db->query("$SQL");
            $x['dataPreview'] = $dataPreview;

            $i = 1;
            foreach($dataPreview->result_array() as $y): 
                $x['Data'] .= "|" . str_pad($i++, 5, " ", STR_PAD_BOTH) . " | ";
                $x['Data'] .= str_pad($y['KDBRG'], 10, " ", STR_PAD_BOTH) . " | ";
                $x['Data'] .= str_pad($y['NMBRG'], 85, " ", STR_PAD_RIGHT) . " | ";
                $x['Data'] .= str_pad(getSatuanObatById($y['KDBRG']), 14, " ", STR_PAD_LEFT) . " | ";
                $x['Data'] .= str_pad(number_format($y['JMLBKK'],0,',','.'), 8, " ", STR_PAD_LEFT) . " |\n";
            endforeach;

            $x['Data'] .= "=========================================================================================================================================\n";
            $x['Data'] .= " " . str_pad("Keterangan", 137, " ", STR_PAD_LEFT) . "\n";
            $x['Data'] .= "-----------------------------------------------------------------------------------------------------------------------------------------\n";
            $x['Data'] .= " " . str_pad($KETBKK, 137, " ", STR_PAD_LEFT) . "\n";
            $x['Data'] .= "-----------------------------------------------------------------------------------------------------------------------------------------\n";
            $x['Data'] .= "     " . $tab0 . "  " . "Pasien" . $tab1 . "Petugas" . $tab0 . "\n";
            $x['Data'] .= "\n\n";
            $x['Data'] .= "     " . $tab0 . "  " . "..........." . $tab1 . getNmLengkap() . $tab0 . "\n";
            
            $this->load->view('barang_keluar_khusus/print_preview',$x);
        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                history.back();
            </script>";
        }
        
        
    }
    
}
