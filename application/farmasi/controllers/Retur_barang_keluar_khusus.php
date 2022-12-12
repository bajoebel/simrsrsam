<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class retur_barang_keluar_khusus extends CI_Controller {
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
            FROM tbl01_users_farmasi WHERE NRP = '$UID') AND KDGRLOKASI='2'";

            $y['contentTitle'] = "Retur Pengembalian Barang";        
            $y['getRuang'] = $this->db->query("$SQL");
            $jmlruang=$y['getRuang']->num_rows();
            if($jmlruang==1) {
                $kdlok=$y['getRuang']->row()->KDLOKASI;
                header('location:'.base_url() ."farmasi.php/retur_barang_keluar_khusus/goForm?kLok=" .$kdlok);
            }else{
                $x['content'] = $this->load->view('retur_barang_keluar_khusus/template_ruang',$y,true);
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

                    $y['contentTitle'] = "Retur Pengembalian Barang";
                    $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);        
                    $x['content'] = $this->load->view('retur_barang_keluar_khusus/template_table',$y,true);
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

                    $y['contentTitle'] = "Retur Pengembalian Barang";
                    $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);        
                    $x['content'] = $this->load->view('retur_barang_keluar_khusus/template_table',$y,true);
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
            $condition .= "AND (KDBKK_RET LIKE '%$sLike%' OR KDBKK LIKE '%$sLike%' OR NMREKANAN LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (KDBKK_RET LIKE '%$sLike%' OR KDBKK LIKE '%$sLike%' OR NMREKANAN LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT * FROM tbl04_barang_keluar_khusus_retur $condition ORDER BY DTBKK_RET DESC";
        
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['kdlokasi']    = $KDLOKASI;
        $config['uri_segment'] = $this->uri_segment;
        $config['base_url']    = base_url().'farmasi.php/retur_barang_keluar_khusus/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);
        
        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        // echo $SQL;
        $this->load->view('retur_barang_keluar_khusus/getdata',$x);
    } 
    function tambah(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_7");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['kLok'] = ($this->session->userdata('kdlokasi')) ? $this->session->userdata('kdlokasi') : "";
            
            $y['contentTitle'] = "Entry Retur Pengembalian Barang";
            $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);        

            $x['content'] = $this->load->view('retur_barang_keluar_khusus/template_entry',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }   
    }
    function emptyTemp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $this->db->where('UEXEC',getUserID());
            $cek = $this->db->delete('tbl04_temp_barang_keluar_khusus_retur');
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
    function hapusTemp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $this->db->where('IDX',$_POST['IDX']);
            $cek = $this->db->delete('tbl04_temp_barang_keluar_khusus_retur');
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
    function getTemp(){
        $this->db->where('UEXEC',getUserID());
        $x['SQL'] = $this->db->get('tbl04_temp_barang_keluar_khusus_retur');
        $this->load->view('retur_barang_keluar_khusus/get_temp',$x);        
    }
    function getArrBKK(){
        $KDBKK = (isset($_POST['KDBKK'])) ? $this->input->post('KDBKK',true) : "";
        $SQL = "SELECT * FROM tbl04_barang_keluar_khusus WHERE KDBKK = '$KDBKK'";
        $response = $this->db->query("$SQL")->row_array();
        echo json_encode($response);
    }
    function getBKK(){
        $KDLOKASI = (isset($_POST['KDLOKASI'])) ? $this->input->post('KDLOKASI',true) : "";
        $Keyword = (isset($_POST['Keyword'])) ? $this->input->post('Keyword',true) : "";
        $SQL = "SELECT * FROM tbl04_barang_keluar_khusus WHERE KDLOKASI='$KDLOKASI' 
        AND (KDBKK LIKE '%$Keyword%' OR NMREKANAN LIKE '%$Keyword%')
        ORDER BY DTBKK DESC LIMIT 100";

        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('retur_barang_keluar_khusus/getTransaksi_cari',$x);
    }
    function getObat(){
        $keyword = (isset($_POST['keyword'])) ? $this->input->post('keyword',true) : "";
        $KDBKK = (isset($_POST['KDBKK'])) ? $this->input->post('KDBKK',true) : "";

        $SQL = "SELECT KDBRG,NMBRG,SUM(SISA) AS SISA
        FROM tbl04_barang_keluar_khusus_detail WHERE (KDBRG LIKE '%$keyword%' OR NMBRG LIKE '%$keyword%') 
        AND KDBKK = '$KDBKK' 
        GROUP BY KDBRG ORDER BY NMBRG LIMIT 100";

        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('retur_barang_keluar_khusus/getObat_cari',$x);
    }
    
    
    function simpanTemp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['KDBRG']) &&
                    isset($_POST['NMBRG']) &&
                    isset($_POST['NMSATUAN']) &&
                    isset($_POST['JMLBKK']) &&
                    isset($_POST['JMLRET'])
                ){
                    $params = array(
                        'KDBRG' => trim($this->input->post('KDBRG',true)),
                        'NMBRG' => trim($this->input->post('NMBRG',true)),
                        'NMSATUAN' => trim($this->input->post('NMSATUAN',true)),
                        'JMLBKK' => str_replace(",","",trim($this->input->post('JMLBKK',true))),
                        'JMLRET' => str_replace(",","",trim($this->input->post('JMLRET',true))),
                        'UEXEC' => getUserID(),
                        'SESSION_ID' => getSessionID()
                    );

                    if($params['KDBRG'] == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Obat/Alkes tidak boleh kosong.\nCoba ulangi kembali.";
                    }elseif($params['JMLBKK'] == "" || $params['JMLBKK'] == "0"){
                        $response['code'] = 403;
                        $response['message'] = "Ops. Jumlah sisa pengembalian barang tidak boleh kosong.\nCoba ulangi kembali.";
                    }elseif($params['JMLRET'] == "" || $params['JMLRET'] == "0"){
                        $response['code'] = 404;
                        $response['message'] = "Ops. Jumlah retur tidak boleh kosong.\nCoba ulangi kembali.";                
                    }elseif($params['JMLRET'] > $params['JMLBKK']){
                        $response['code'] = 405;
                        $response['message'] = "Ops. Jumlah retur tidak boleh lebih besar dari jumlah sisa pengembalian barang.";
                    }else{
                        $this->db->where('KDBRG',$params['KDBRG']);
                        $this->db->where('UEXEC',getUserID());
                        $resData = $this->db->get('tbl04_temp_barang_keluar_khusus_retur');
                        if($resData->num_rows() > 0){
                            $this->db->where('KDBRG',$params['KDBRG']);
                            $this->db->where('UEXEC',getUserID());
                            $this->db->update('tbl04_temp_barang_keluar_khusus_retur',$params);
                            $response['code'] = 201;
                            $response['message'] = 'Update Sukses';
                        }else{
                            $this->db->insert('tbl04_temp_barang_keluar_khusus_retur',$params);                
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
                    isset($_POST['KDBKK']) &&
                    isset($_POST['KDLOKASI']) &&
                    isset($_POST['NMLOKASI']) &&
                    isset($_POST['KDREKANAN']) &&
                    isset($_POST['NMREKANAN']) &&
                    isset($_POST['ALASAN_RET'])
                ){
                    $params = array(
                        'KDBKK_RET'      => '',
                        'DTBKK_RET'      => date('Y-m-d H:i:s'),
                        'TGL_RETUR'     => setDateEng(trim($this->input->post('TGL_RETUR',true))),
                        'KDBKK'          => trim($this->input->post('KDBKK',true)),
                        'KDLOKASI'      => trim($this->input->post('KDLOKASI',true)),
                        'NMLOKASI'      => trim($this->input->post('NMLOKASI',true)),
                        'KDREKANAN'     => trim($this->input->post('KDREKANAN',true)),
                        'NMREKANAN'     => trim($this->input->post('NMREKANAN',true)),
                        'ALASAN_RET'    => trim($this->input->post('ALASAN_RET',true)),
                        'UEXEC'         => getUserID()
                    );

                    if(
                        $params['TGL_RETUR']=="" ||
                        $params['KDBKK']=="" ||
                        $params['KDLOKASI']=="" ||
                        $params['KDREKANAN']=="" 
                    ){
                        $x['code'] = 401;
                        $x['message'] = "Ops. Masih ada data yang kosong. Silahkan lengkapi data.";                        
                    }else{
                        $this->db->where('UEXEC',getUserID());
                        $cek = $this->db->get('tbl04_temp_barang_keluar_khusus_retur');
                        if($cek->num_rows() > 0){
                            # Cek kondisi Stok Kembali 
                            $validStok = TRUE;
                            $UEXEC = getUserID();

                            # Cek Sisa Yang Boleh Diretur Pada Detail
                            $resTemp = $this->db->query("SELECT * FROM tbl04_temp_barang_keluar_khusus_retur WHERE UEXEC='$UEXEC'")->result_array();
                            foreach($resTemp as $itemTemp){
                                $cekTransItem = $this->db->query("SELECT KDBRG,NMBRG,SUM(SISA) AS SISA
                                    FROM tbl04_barang_keluar_khusus_detail WHERE KDBRG = '$itemTemp[KDBRG]' 
                                    AND KDBKK = '$params[KDBKK]' GROUP BY KDBRG");

                                if($cekTransItem->num_rows() > 0){
                                    $rcTransItem = $cekTransItem->row_array();
                                    if($rcTransItem['SISA'] < $itemTemp['JMLRET']){
                                        $validStok = FALSE; 
                                        $NMBRG = $rcTransItem['NMBRG'];
                                        $DESKRIPSI = "Jumlah item retur melebihi jumlah sisa item pengembalian barang";
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
                                $this->db->insert('tbl04_barang_keluar_khusus_retur',$params);
                                $this->db->where('UEXEC',$UEXEC);
                                $this->db->order_by('KDBKK_RET','DESC');
                                $this->db->limit(1);
                                $resMIns = $this->db->get('tbl04_barang_keluar_khusus_retur')->row_array();

                                foreach($resTemp as $itemOP){
                                    $KDBKK_RET = $resMIns['KDBKK_RET'];
                                    $KDBRG = $itemOP['KDBRG'];
                                    $NMBRG = $itemOP['NMBRG'];
                                    $JMLRET = $itemOP['JMLRET'];
                                    $this->loop_item($KDBKK_RET,$params['KDBKK'],$KDBRG,$NMBRG,$JMLRET);
                                }

                                $this->db->where('UEXEC',getUserID());
                                $this->db->delete('tbl04_temp_barang_keluar_khusus_retur');

                                $x['code'] = 200;
                                $x['message'] = 'Simpan Sukses';                
                            }else{
                                $x['code'] = 402;
                                $x['message'] = 'Obat '.$NMBRG.' tidak bisa di retur.'.chr(10).$DESKRIPSI;
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

    function loop_item($KDBKK_RET,$KDBKK,$KDBRG,$NMBRG,$KELUAR){
        $rqSTOK = $this->db->query("SELECT * FROM tbl04_barang_keluar_khusus_detail 
            WHERE KDBKK='$KDBKK' AND KDBRG='$KDBRG' AND SISA > 0 ORDER BY IDX DESC LIMIT 1")->row_array();

        if($KELUAR < $rqSTOK['SISA']) {
            // Insert Item
            $params_item_retur = array(
                'KDBKK_RET' => $KDBKK_RET,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'EXPDATE'=>$rqSTOK['EXPDATE'],
                'JMLRET' => $KELUAR
            );
            $this->db->insert('tbl04_barang_keluar_khusus_retur_detail',$params_item_retur);

            $params_item_update = array(
                'JMLRET' => $KELUAR,
                'SISA' => $rqSTOK['JMLBKK'] - $KELUAR
            );
            $this->db->where('KDBKK',$KDBKK);
            $this->db->where('KDBRG',$KDBRG);
            $this->db->where('HMODAL',$rqSTOK['HMODAL']);
            $this->db->where('TGLBELI',$rqSTOK['TGLBELI']);
            $this->db->update('tbl04_barang_keluar_khusus_detail',$params_item_update);

        }elseif ($KELUAR > $rqSTOK['SISA']) {
            $params_item_retur = array(
                'KDBKK_RET' => $KDBKK_RET,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'EXPDATE' => $rqSTOK['EXPDATE'],
                'JMLRET' => $rqSTOK['SISA']
            );
            $this->db->insert('tbl04_barang_keluar_khusus_retur_detail',$params_item_retur); 

            $params_item_update = array(
                'JMLRET' => $rqSTOK['SISA'],
                'SISA' => $rqSTOK['JMLBKK'] - $rqSTOK['SISA']
            );
            $this->db->where('KDBKK',$KDBKK);
            $this->db->where('KDBRG',$KDBRG);
            $this->db->where('HMODAL',$rqSTOK['HMODAL']);
            $this->db->where('TGLBELI',$rqSTOK['TGLBELI']);
            $this->db->update('tbl04_barang_keluar_khusus_detail',$params_item_update);

            $KELUAR = $KELUAR - $rqSTOK['SISA'];                      
            $this->loop_item($KDBKK_RET,$KDBKK,$KDBRG,$NMBRG,$KELUAR);
        }elseif ($KELUAR = $rqSTOK['SISA']) {
            $params_item_retur = array(
                'KDBKK_RET' => $KDBKK_RET,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'EXPDATE' => $rqSTOK['EXPDATE'],
                'JMLRET' => $KELUAR
            );
            $this->db->insert('tbl04_barang_keluar_khusus_retur_detail',$params_item_retur);

            $params_item_update = array(
                'JMLRET' => $rqSTOK['SISA'] + $KELUAR,
                'SISA' => $rqSTOK['SISA'] - $KELUAR
            );
            $this->db->where('KDBKK',$KDBKK);
            $this->db->where('KDBRG',$KDBRG);
            $this->db->where('HMODAL',$rqSTOK['HMODAL']);
            $this->db->where('TGLBELI',$rqSTOK['TGLBELI']);
            $this->db->update('tbl04_barang_keluar_khusus_detail',$params_item_update);
        }         
    }

    function cetak(){
        $KDBKK_RET = (isset($_GET['kode'])) ? $_GET['kode'] : ""; 
        $this->db->where('KDBKK_RET',$KDBKK_RET);
        $cek = $this->db->get('tbl04_barang_keluar_khusus_retur');
        if($cek->num_rows() > 0){
            $x = $cek->row_array();
            
            $SQL = "SELECT KDBRG,NMBRG,SUM(JMLRET) AS JMLRET FROM 
            tbl04_barang_keluar_khusus_retur_detail WHERE KDBKK_RET = '$KDBKK_RET' 
            GROUP BY KDBRG ORDER BY NMBRG";
            $dataPreview = $this->db->query("$SQL");
            $x['dataPreview'] = $dataPreview;

            $this->load->view('retur_barang_keluar_khusus/print_preview',$x);
        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                history.back();
            </script>";
        }
    }
}
