<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class retur_trans_penjualan extends CI_Controller {
    function __construct(){
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
            $SQL = "SELECT * FROM tbl04_lokasi WHERE KDLOKASI IN(SELECT ruang_akses 
            FROM tbl01_users_farmasi WHERE NRP = '$UID') AND KDGRLOKASI='1'";

            $y['contentTitle'] = "Retur Transaksi Penjualan";        
            $y['getRuang'] = $this->db->query("$SQL");
            $jmlruang=$y['getRuang']->num_rows();
            if($jmlruang==1) {
                $kdlok=$y['getRuang']->row()->KDLOKASI;
                header('location:'.base_url() ."farmasi.php/retur_trans_penjualan/goForm?kLok=" .$kdlok);
            }else{
                $x['content'] = $this->load->view('retur_trans_penjualan/template_ruang',$y,true);
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
                    $y['contentTitle'] = "Retur Transaksi Penjualan";
                    $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);        
                    $x['content'] = $this->load->view('retur_trans_penjualan/template_table',$y,true);
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

                    $y['contentTitle'] = "Retur Transaksi Penjualan";
                    $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);        
                    $x['content'] = $this->load->view('retur_trans_penjualan/template_table',$y,true);
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
            $offset = $this->input->post('page');
            $this->session->set_userdata('sPage',$offset);
        else:
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;

        $KDLOKASI = (isset($_POST['kLok'])) ? $this->input->post('kLok',true) : "";
        $limit = $this->perPage;
        $condition = "WHERE KDLOKASI='$KDLOKASI' ";
        
        if(isset($_POST['sLike'])){
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "AND (NOMR LIKE '%$sLike%' OR NMPASIEN LIKE '%$sLike%' OR KDJL LIKE '%$sLike%' OR KDJL_RET LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (NOMR LIKE '%$sLike%' OR NMPASIEN LIKE '%$sLike%' OR KDJL LIKE '%$sLike%' OR KDJL_RET LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT * FROM tbl04_penjualan_retur $condition ORDER BY DTJL_RET DESC";
        
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['kdlokasi']    = $KDLOKASI;
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'farmasi.php/retur_trans_penjualan/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);
        
        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('retur_trans_penjualan/getdata',$x);
    } 

    function tambah(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_7");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['kLok'] = ($this->session->userdata('kdlokasi')) ? $this->session->userdata('kdlokasi') : "";
            $y['index_menu'] = 7;
            $y['contentTitle'] = "Entry Retur Transaksi Penjualan";
            $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);        

            $this->db->where_not_in('KDLOKASI',$y['kLok']);
            $y['datlokasi'] = $this->db->get('tbl04_lokasi');

            $x['content'] = $this->load->view('retur_trans_penjualan/template_entry',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }  
    }

    function getTemp(){
        $this->db->where('UEXEC',getUserID());
        $x['SQL'] = $this->db->get('tbl04_temp_penjualan_retur');
        $this->load->view('retur_trans_penjualan/gettemp',$x);        
    }

    function getArrPenjualan(){
        $KDJL = (isset($_POST['KDJL'])) ? $this->input->post('KDJL',true) : "";
        $SQL = "SELECT * FROM tbl04_penjualan WHERE KDJL = '$KDJL'";
        $response = $this->db->query("$SQL")->row_array();
        echo json_encode($response);
    }

    function getPenjualan(){
        $KDLOKASI = (isset($_POST['KDLOKASI'])) ? $this->input->post('KDLOKASI',true) : "";
        $Keyword = (isset($_POST['Keyword'])) ? $this->input->post('Keyword',true) : "";
        $SQL = "SELECT * FROM tbl04_penjualan WHERE KDLOKASI='$KDLOKASI' 
        AND (KDJL LIKE '%$Keyword%' OR REG_UNIT LIKE '%$Keyword%' OR ID_DAFTAR LIKE '%$Keyword%' 
        OR NOMR LIKE '%$Keyword%')
        ORDER BY DTJL DESC LIMIT 100";

        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('retur_trans_penjualan/get_penjualan_cari',$x);
    }

    function getObat(){
        $keyword = (isset($_POST['keyword'])) ? $this->input->post('keyword',true) : "";
        $KDJL = (isset($_POST['KDJL'])) ? $this->input->post('KDJL',true) : "";

        $SQL = "SELECT KDBRG,NMBRG,SUM(SISA) AS SISA,HJUAL
        FROM tbl04_penjualan_detail WHERE (KDBRG LIKE '%$keyword%' OR NMBRG LIKE '%$keyword%') 
        AND KDJL = '$KDJL' 
        GROUP BY KDBRG ORDER BY NMBRG LIMIT 100";

        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('retur_trans_penjualan/getObat_cari',$x);
    }

    function hapusTemp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $this->db->where('IDX',$_POST['IDX']);
            $cek = $this->db->delete('tbl04_temp_penjualan_retur');
            if ($cek) {
                $x['code'] = 200;
                $x['message'] = 'Delete Sukses';
            }else{
                $x['code'] = 401;
                $x['message'] = 'Query Delete Not Success';            
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
            $cek = $this->db->delete('tbl04_temp_penjualan_retur');
            if ($cek) {
                $x['code'] = 200;
                $x['message'] = 'Delete history sukses';
            }else{
                $x['code'] = 401;
                $x['message'] = 'Query Delete history not success';            
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
                    isset($_POST['HJUAL']) &&
                    isset($_POST['JMLJUAL']) &&
                    isset($_POST['JMLRET'])
                ){
                    $params = array(
                        'KDBRG' => trim($this->input->post('KDBRG',true)),
                        'NMBRG' => trim($this->input->post('NMBRG',true)),
                        'NMSATUAN' => trim($this->input->post('NMSATUAN',true)),
                        'HJUAL' => str_replace(",","",trim($this->input->post('HJUAL',true))),
                        'JMLJUAL' => str_replace(",","",trim($this->input->post('JMLJUAL',true))),
                        'JMLRET' => str_replace(",","",trim($this->input->post('JMLRET',true))),
                        'UEXEC' => getUserID(),
                        'SESSION_ID' => getSessionID()
                    );

                    if($params['KDBRG'] == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Obat/Alkes tidak boleh kosong.\nCoba ulangi kembali.";                
                    }elseif($params['HJUAL'] == ""){
                        $response['code'] = 402;
                        $response['message'] = "Ops. Harga jual tidak boleh kosong.\nCoba ulangi kembali.";
                    }elseif($params['JMLJUAL'] == "" || $params['JMLJUAL'] == "0"){
                        $response['code'] = 403;
                        $response['message'] = "Ops. Jumlah sisa penjualan tidak boleh kosong.\nCoba ulangi kembali.";
                    }elseif($params['JMLRET'] == "" || $params['JMLRET'] == "0"){
                        $response['code'] = 404;
                        $response['message'] = "Ops. Jumlah retur tidak boleh kosong.\nCoba ulangi kembali.";                
                    }elseif($params['JMLRET'] > $params['JMLJUAL']){
                        $response['code'] = 405;
                        $response['message'] = "Ops. Jumlah retur tidak boleh lebih besar dari jumlah sisa penjualan.";
                    }else{
                        $this->db->where('KDBRG',$params['KDBRG']);
                        $this->db->where('UEXEC',getUserID());
                        $resData = $this->db->get('tbl04_temp_penjualan_retur');
                        if($resData->num_rows() > 0){
                            $this->db->where('KDBRG',$params['KDBRG']);
                            $this->db->where('UEXEC',getUserID());
                            $this->db->update('tbl04_temp_penjualan_retur',$params);
                            $response['code'] = 201;
                            $response['message'] = 'Update Sukses';
                        }else{
                            $this->db->insert('tbl04_temp_penjualan_retur',$params);                
                            $response['code'] = 200;
                            $response['message'] = 'Simpan Sukses';
                        }
                    }
                }else{
                    $response['code'] = 406;
                    $response['message'] = "Ops. Variable tidak ditemukan.\nCoba ulangi kembali.";                
                }
            }else{
                $response['code'] = 407;
                $response['message'] = "Ops. Method tidak ditemukan.\nCoba ulangi kembali.";                
            }
        }else{
            $response['code'] = 408;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
        }
        echo json_encode($response);
    }
    
    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['TGL_RETUR']) &&
                    isset($_POST['KDJL']) &&
                    isset($_POST['REG_UNIT']) &&
                    isset($_POST['ID_DAFTAR']) &&
                    isset($_POST['NOMR']) &&
                    isset($_POST['NMPASIEN']) &&
                    isset($_POST['JNSLAYANAN']) &&
                    isset($_POST['KDLOKASI']) &&
                    isset($_POST['NMLOKASI']) &&
                    isset($_POST['KDRUANGAN']) &&
                    isset($_POST['NMRUANGAN']) &&
                    isset($_POST['ALASAN_RET'])
                ){
                    $params = array(
                        'KDJL_RET'      => '',
                        'DTJL_RET'      => date('Y-m-d H:i:s'),
                        'TGL_RETUR'     => setDateEng(trim($this->input->post('TGL_RETUR',true))),
                        'KDJL'          => trim($this->input->post('KDJL',true)),
                        'REG_UNIT'      => trim($this->input->post('REG_UNIT',true)),
                        'ID_DAFTAR'     => trim($this->input->post('ID_DAFTAR',true)),
                        'NOMR'          => trim($this->input->post('NOMR',true)),
                        'NMPASIEN'      => trim($this->input->post('NMPASIEN',true)),
                        'JNSLAYANAN'    => trim($this->input->post('JNSLAYANAN',true)),
                        'KDLOKASI'      => trim($this->input->post('KDLOKASI',true)),
                        'NMLOKASI'      => trim($this->input->post('NMLOKASI',true)),
                        'KDRUANGAN'     => trim($this->input->post('KDRUANGAN',true)),
                        'NMRUANGAN'     => trim($this->input->post('NMRUANGAN',true)),
                        'ALASAN_RET'    => trim($this->input->post('ALASAN_RET',true)),
                        'UEXEC'         => getUserID()
                    );

                    if(
                        $params['TGL_RETUR']=="" ||
                        $params['KDJL']=="" ||
                        $params['REG_UNIT']=="" ||
                        $params['ID_DAFTAR']=="" ||
                        $params['NOMR']=="" ||
                        $params['JNSLAYANAN']=="" ||
                        $params['KDLOKASI']=="" ||
                        $params['KDRUANGAN']=="" 
                    ){
                        $x['code'] = 401;
                        $x['message'] = "Ops. Masih ada data yang kosong. Silahkan lengkapi data.";                        
                    }else{

                        $this->db->where('UEXEC',getUserID());
                        $cek = $this->db->get('tbl04_temp_penjualan_retur');
                        if($cek->num_rows() > 0){
                            # Cek kondisi Stok Kembali 
                            $validStok = TRUE;
                            $UEXEC = getUserID();

                            # Cek Sisa Yang Boleh Diretur Pada Detail penjualan
                            $resTemp = $this->db->query("SELECT * FROM tbl04_temp_penjualan_retur WHERE UEXEC='$UEXEC'")->result_array();
                            foreach($resTemp as $itemTemp){
                                $cekMutasiItem = $this->db->query("SELECT KDBRG,NMBRG,SUM(SISA) AS SISA
                                    FROM tbl04_penjualan_detail WHERE KDBRG = '$itemTemp[KDBRG]' 
                                    AND KDJL = '$params[KDJL]' GROUP BY KDBRG");

                                if($cekMutasiItem->num_rows() > 0){
                                    $rsCekMutasiItem = $cekMutasiItem->row_array();
                                    if($rsCekMutasiItem['SISA'] < $itemTemp['JMLRET']){
                                        $validStok = FALSE; 
                                        $NMBRG = $rsCekMutasiItem['NMBRG'];
                                        $DESKRIPSI = "Jumlah item retur melebihi jumlah sisa item penjualan";
                                        break;
                                    }
                                }else{
                                    $validStok = FALSE; 
                                    $NMBRG = "";
                                    $DESKRIPSI = "Stok tidak ditemukan";                                
                                    break;
                                }                                        
                            } 

                            if($validStok){
                                $this->db->insert('tbl04_penjualan_retur',$params);

                                $this->db->where('UEXEC',$UEXEC);
                                $this->db->order_by('KDJL_RET','DESC');
                                $this->db->limit(1);
                                $resMIns = $this->db->get('tbl04_penjualan_retur')->row_array();

                                foreach($resTemp as $itemOP){
                                    $KDJL_RET = $resMIns['KDJL_RET'];
                                    $KDBRG = $itemOP['KDBRG'];
                                    $NMBRG = $itemOP['NMBRG'];
                                    $JMLRET = $itemOP['JMLRET'];
                                    $this->loop_item($KDJL_RET,$params['KDJL'],$KDBRG,$NMBRG,$JMLRET);
                                }

                                $this->db->where('UEXEC',getUserID());
                                $this->db->delete('tbl04_temp_penjualan_retur');

                                $x['code'] = 200;
                                $x['message'] = 'Simpan Sukses';                
                            }else{
                                $x['code'] = 402;
                                $x['message'] = 'Obat '.$NMBRG.' tidak bisa diretur.'.chr(10).$DESKRIPSI;                
                            }
                        }else{
                            $x['code'] = 402;
                            $x['message'] = 'Data Obat / Alat Kesehatan masih kosong';                
                        }

                    }
                }else{
                    $response['code'] = 405;
                    $response['message'] = "Ops. Variable tidak ditemukan.\nCoba ulangi kembali.";
                }
            }else{
                $response['code'] = 406;
                $response['message'] = "Ops. Method tidak ditemukan.\nCoba ulangi kembali.";
            }            
        }else{
            $x['code'] = 402;
            $x['message'] = 'Sesi anda telah habis. Silahkan login kembali';            
        }
        echo json_encode($x);
    }

    function loop_item($KDJL_RET,$KDJL,$KDBRG,$NMBRG,$KELUAR){
        $rqSTOK = $this->db->query("SELECT * FROM tbl04_penjualan_detail 
            WHERE KDJL='$KDJL' AND KDBRG='$KDBRG' AND SISA > 0 
            ORDER BY IDX DESC LIMIT 1")->row_array();

        if($KELUAR < $rqSTOK['SISA']) {
            // Insert Item
            $params_item_retur = array(
                'KDJL_RET' => $KDJL_RET,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'EXPDATE'=> $rqSTOK['AP_EXPDATE'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'JMLRET' => $KELUAR,
                'HJUAL' => $rqSTOK['HJUAL']
            );
            $this->db->insert('tbl04_penjualan_retur_detail',$params_item_retur);

            $params_item_update = array(
                'JMLRET' => $KELUAR,
                'SISA' => $rqSTOK['JMLJUAL'] - $KELUAR
            );
            $this->db->where('KDJL',$KDJL);
            $this->db->where('KDBRG',$KDBRG);
            $this->db->where('HMODAL',$rqSTOK['HMODAL']);
            $this->db->where('TGLBELI',$rqSTOK['TGLBELI']);
            $this->db->update('tbl04_penjualan_detail',$params_item_update);

        }elseif ($KELUAR > $rqSTOK['SISA']) {
            $params_item_retur = array(
                'KDJL_RET' => $KDJL_RET,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'EXPDATE' => $rqSTOK['AP_EXPDATE'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'JMLRET' => $rqSTOK['SISA'],
                'HJUAL' => $rqSTOK['HJUAL']
            );
            $this->db->insert('tbl04_penjualan_retur_detail',$params_item_retur); 

            $params_item_update = array(
                'JMLRET' => $rqSTOK['SISA'],
                'SISA' => $rqSTOK['JMLJUAL'] - $rqSTOK['SISA']
            );
            $this->db->where('KDJL',$KDJL);
            $this->db->where('KDBRG',$KDBRG);
            $this->db->where('HMODAL',$rqSTOK['HMODAL']);
            $this->db->where('TGLBELI',$rqSTOK['TGLBELI']);
            $this->db->update('tbl04_penjualan_detail',$params_item_update);

            $KELUAR = $KELUAR - $rqSTOK['SISA'];                      
            $this->loop_item($KDJL_RET,$KDJL,$KDBRG,$NMBRG,$KELUAR);
        }elseif ($KELUAR = $rqSTOK['SISA']) {
            $params_item_retur = array(
                'KDJL_RET' => $KDJL_RET,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'EXPDATE' => $rqSTOK['AP_EXPDATE'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'JMLRET' => $KELUAR,
                'HJUAL' => $rqSTOK['HJUAL']
            );
            $this->db->insert('tbl04_penjualan_retur_detail',$params_item_retur);

            $params_item_update = array(
                'JMLRET' => $rqSTOK['SISA'] + $KELUAR,
                'SISA' => $rqSTOK['SISA'] - $KELUAR
            );
            $this->db->where('KDJL',$KDJL);
            $this->db->where('KDBRG',$KDBRG);
            $this->db->where('HMODAL',$rqSTOK['HMODAL']);
            $this->db->where('TGLBELI',$rqSTOK['TGLBELI']);
            $this->db->update('tbl04_penjualan_detail',$params_item_update);
        }         
    }

    function cetak(){
        $KDJL_RET = (isset($_GET['kode'])) ? $_GET['kode'] : ""; 
        $this->db->where('KDJL_RET',$KDJL_RET);
        $cek = $this->db->get('tbl04_penjualan_retur');
        if($cek->num_rows() > 0){
            $x = $cek->row_array();

            $SQL = "SELECT KDBRG,NMBRG,SUM(JMLRET) AS JMLRET,HJUAL 
            FROM tbl04_penjualan_retur_detail  
            WHERE KDJL_RET = '$KDJL_RET' GROUP BY KDBRG ORDER BY NMBRG";
            $dataPreview = $this->db->query("$SQL");
            $x['dataPreview'] = $dataPreview;

            $this->load->view('retur_trans_penjualan/print_preview',$x);

        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                history.back();
            </script>";
        }        
    }
}
