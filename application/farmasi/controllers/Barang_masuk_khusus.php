<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class barang_masuk_khusus extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
    }
    public function index(){
        /*$ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_5");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            /**
            * Note : Tambahkan Set Lokasi (Yang Akses Barang Masuk Bukan Pembelian) 
            * Kode Lokasi Manual 2. Gudang
            */
            /*$UID = $this->session->userdata('get_uid');
            $SQL = "SELECT * FROM tbl04_lokasi WHERE KDLOKASI IN(SELECT ruang_akses 
            FROM tbl01_users_farmasi WHERE NRP = '$UID') AND KDGRLOKASI='2'";

            $y['contentTitle'] = "Transaksi Barang Masuk Bukan Pembelian";        
            $y['getRuang'] = $this->db->query("$SQL");
            $jmlruang=$y['getRuang']->num_rows();
            if($jmlruang==1) {
                $kdlok=$y['getRuang']->row()->KDLOKASI;
                header('location:'.base_url() ."farmasi.php/barang_masuk_khusus/goForm?kLok=" .$kdlok);
            }else{
                $x['content'] = $this->load->view('barang_masuk_khusus/template_ruang',$y,true);
                $this->load->view('template/theme',$x);
            }
            
       }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }*/

        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if ($this->session->userdata('kdlokasi')) {
                $y['kLok'] = $this->session->userdata('kdlokasi');
                if ($y['kLok']=="") {
                    echo "<script>alert('Ops. Lokasi tidak ditemukan.');history.back();</script>";
                }else{
                    $x['header'] = $this->load->view('template/header','',true);
                    $z = setNav("nav_5");
                    $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
                    $y['index_menu'] = 5;
                    $y['contentTitle'] = "Transaksi Barang Masuk Bukan Pembelian";
                    $y['contentTitle'] .= "<br/>Lokasi Barang : " . getLokasiById($y['kLok']);        
                    $x['content'] = $this->load->view('barang_masuk_khusus/template_table',$y,true);
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
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if (isset($_GET['kLok'])) {
                $y['kLok'] = $this->input->get('kLok',true);
                if ($y['kLok']=="") {
                    echo "<script>alert('Ops. Lokasi tidak ditemukan.');history.back();</script>";
                }else{
                    $x['header'] = $this->load->view('template/header','',true);
                    $z = setNav("nav_5");
                    $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
                    $y['index_menu'] = 5;
                    $y['contentTitle'] = "Transaksi Barang Masuk Bukan Pembelian";
                    $y['contentTitle'] .= "<br/>Lokasi Barang : " . getLokasiById($y['kLok']);        
                    $x['content'] = $this->load->view('barang_masuk_khusus/template_table',$y,true);
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
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "AND (KDBMK LIKE '%$sLike%' OR NMREKANAN LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (KDBMK LIKE '%$sLike%' OR NMREKANAN LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT * FROM tbl04_barang_masuk_khusus $condition ORDER BY KDBMK DESC";

        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['kdlokasi']    = $KDLOKASI;
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'farmasi.php/barang_masuk_khusus/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        // echo "$SQL LIMIT $offset,$limit";
        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('barang_masuk_khusus/get_data',$x);
    }
    
    function cekRetur(){
        $KDBMK = (isset($_POST['KDBMK'])) ? $this->input->post('KDBMK',true) : "";
        $this->db->where('KDBMK',$KDBMK);
        $resQuery = $this->db->get('tbl04_barang_masuk_khusus_batal');
        if($resQuery->num_rows() > 0){
            $response['code'] = 200;
        }else{
            $response['code'] = 201;
        }
        echo json_encode($response);
    }

    function tambah(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_5");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['index_menu'] = 5;
            $y['kLok'] = ($this->session->userdata('kdlokasi')) ? $this->session->userdata('kdlokasi') : "";
            $y['contentTitle'] = "Entry Barang Masuk Bukan Pembelian";
            $y['datrekanan'] = $this->db->get('tbl04_rekanan_khusus');
            $x['content'] = $this->load->view('barang_masuk_khusus/template_entry',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }            
    } 
    
    function getObat(){
        $keyword = (isset($_POST['keyword'])) ? $this->input->post('keyword',true) : "";
        $SQL = "SELECT * FROM tbl04_barang WHERE KDBRG LIKE '%$keyword%' OR NMBRG LIKE '%$keyword%' 
        ORDER BY NMBRG LIMIT 20";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('barang_masuk_khusus/getObat_cari',$x);
    }

    function getTemp(){
        $this->db->where('UEXEC',getUserID());
        $this->db->where('SESSION_ID',getSessionID());
        $x['SQL'] = $this->db->get('tbl04_temp_barang_masuk_khusus');
        $this->load->view('barang_masuk_khusus/get_temp',$x);        
    }

    function hapusTemp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['IDX'])){
                    $IDX = $this->input->post('IDX',true);
                    if($IDX==""){
                        $response['code'] = 402;
                        $response['message'] = "Ops. Data tidak boleh kosong.";
                    }else{
                        $this->db->where('IDX',$IDX);
                        $cekCommand = $this->db->delete('tbl04_temp_barang_masuk_khusus');
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Delete Sukses";                                            
                        }else{
                            $response['code'] = 401;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";      
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
    function emptyTemp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $this->db->where('UEXEC',getUserID());
            $cekCommand = $this->db->delete('tbl04_temp_barang_masuk_khusus');
            if($cekCommand){
                $response['code'] = 200;
                $response['message'] = "Pengosongan Temporary Pembelian Sukses";                                            
            }else{
                $response['code'] = 401;
                $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";      
            }            
        }else{
            $response['code'] = 402;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
        }
        echo json_encode($response);
    }

    function simpanTemp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['KDBRG']) &&
                    isset($_POST['NMBRG']) &&
                    isset($_POST['EXPDATE']) &&
                    isset($_POST['HMODAL']) &&
                    isset($_POST['JMLMASUK']) &&
                    isset($_POST['SUBTOTAL'])
                ){
                    $params = array(
                        'KDBRG' => trim($this->input->post('KDBRG',true)),
                        'NMBRG' => trim($this->input->post('NMBRG',true)),
                        'EXPDATE' => setDateEng(trim($this->input->post('EXPDATE',true))),
                        'HMODAL' => str_replace(",","",trim($this->input->post('HMODAL',true))),
                        'JMLMASUK' => str_replace(",","",trim($this->input->post('JMLMASUK',true))),
                        'SUBTOTAL' => str_replace(",","",trim($this->input->post('SUBTOTAL',true))),
                        'UEXEC' => getUserID(),
                        'SESSION_ID' => getSessionID()
                    );

                    if($params['KDBRG'] == ""){
                        $response['code'] = 402;
                        $response['message'] = "Ops. Obat/Alkes tidak boleh kosong.\nCoba ulangi kembali.";                
                    }elseif($params['HMODAL'] == ""){
                        $response['code'] = 402;
                        $response['message'] = "Ops. Harga modal tidak boleh kosong.\nCoba ulangi kembali.";                
                    }elseif($params['JMLMASUK'] == ""){
                        $response['code'] = 402;
                        $response['message'] = "Ops. Jumlah masuk tidak boleh kosong.\nCoba ulangi kembali.";                
                    }else{
                        $this->db->where('KDBRG',$params['KDBRG']);
                        $this->db->where('UEXEC',getUserID());
                        $resData = $this->db->get('tbl04_temp_barang_masuk_khusus');
                        if($resData->num_rows() > 0){
                            $this->db->where('KDBRG',$params['KDBRG']);
                            $this->db->where('UEXEC',getUserID());
                            $this->db->update('tbl04_temp_barang_masuk_khusus',$params);
                            $response = array(
                                'code'    => 200,
                                'message' => 'Update Sukses'
                            );    
                        }else{
                            $this->db->insert('tbl04_temp_barang_masuk_khusus',$params);                
                            $response = array(
                                'code'    => 200,
                                'message' => 'Simpan Sukses'
                            );
                        }
                    }
                }else{
                    $response['code'] = 402;
                    $response['message'] = "Ops. Variable tidak ditemukan.\nCoba ulangi kembali.";                
                }
            }else{
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak ditemukan.\nCoba ulangi kembali.";                
            }
        }else{
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
        }
        echo json_encode($response);
    }

    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['KDREKANAN']) &&
                    isset($_POST['NMREKANAN']) &&
                    isset($_POST['NOFAKTUR']) &&
                    isset($_POST['TGLFAKTUR']) &&
                    isset($_POST['TGLTERIMA']) &&
                    isset($_POST['KDLOKASI']) &&
                    isset($_POST['NMLOKASI']) &&
                    isset($_POST['KETBMK'])
                ){
                    $params = array(
                        'KDBMK'          => '',
                        'KDREKANAN'    => trim($this->input->post('KDREKANAN',true)),
                        'NMREKANAN'    => trim($this->input->post('NMREKANAN',true)),
                        'NOFAKTUR'      => trim($this->input->post('NOFAKTUR',true)),
                        'TGLFAKTUR'     => setDateEng(trim($this->input->post('TGLFAKTUR',true))),
                        'TGLTERIMA'     => setDateEng(trim($this->input->post('TGLTERIMA',true))),
                        'KDLOKASI'      => trim($this->input->post('KDLOKASI',true)),
                        'NMLOKASI'      => trim($this->input->post('NMLOKASI',true)),
                        'KETBMK'         => trim($this->input->post('KETBMK',true)),
                        'UEXEC'         => getUserID()
                    );

                    if(
                        $params['KDREKANAN']=="" ||
                        $params['NMREKANAN']=="" ||
                        $params['NOFAKTUR']=="" ||
                        $params['TGLFAKTUR']=="" ||
                        $params['TGLTERIMA']=="" ||
                        $params['KDLOKASI']=="" ||
                        $params['NMLOKASI']==""
                    ){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Masih ada data yang kosong. Silahkan lengkapi data.";     
                    }else{
                        $this->db->where('UEXEC',getUserID());
                        $cek = $this->db->get('tbl04_temp_barang_masuk_khusus');
                        if($cek->num_rows() > 0){
                            $cekData = "SELECT * FROM tbl04_barang_masuk_khusus WHERE NOFAKTUR = '$params[NOFAKTUR]' 
                            AND KDREKANAN = '$params[KDREKANAN]' 
                            AND KDBMK NOT IN(SELECT KDBMK FROM tbl04_barang_masuk_khusus_batal)";

                            $cekFaktur = $this->db->query("$cekData");
                            if($cekFaktur->num_rows() > 0){
                                $response['code'] = 402;
                                $response['message'] = "Data faktur untuk rekanan ini telah ada".chr(10)."Cek kembali No Bukti Transaksi Anda!";
                            }else{
                                $cekCommand = $this->db->insert('tbl04_barang_masuk_khusus',$params); 
                                if($cekCommand){

                                    $this->db->where('UEXEC',getUserID());
                                    $this->db->where('NOFAKTUR',$params['NOFAKTUR']);
                                    $this->db->where('KDREKANAN',$params['KDREKANAN']);
                                    $this->db->order_by('KDBMK','DESC');
                                    $this->db->limit(1);
                                    $rsBarangMasuk = $this->db->get('tbl04_barang_masuk_khusus')->row_array();
                                    $KDBMK = $rsBarangMasuk['KDBMK'];

                                    $sqlItemMasuk = "SELECT * FROM tbl04_temp_barang_masuk_khusus WHERE UEXEC='".getUserID()."'";
                                    $resItem = $this->db->query("$sqlItemMasuk")->result_array();
                                    foreach($resItem as $item){
                                        $dataItem = array(
                                            'KDBMK' => $KDBMK,
                                            'KDBRG' => $item['KDBRG'],
                                            'NMBRG' => $item['NMBRG'],
                                            'EXPDATE' => $item['EXPDATE'],
                                            'HMODAL' => $item['HMODAL'],
                                            'JMLMASUK' => $item['JMLMASUK'],
                                            'SUBTOTAL' => $item['SUBTOTAL'],
                                            'TGLBELI' => $params['TGLTERIMA']
                                        );
                                        $this->db->insert('tbl04_barang_masuk_khusus_detail',$dataItem);
                                    }                                        
                                    $this->db->query("DELETE FROM tbl04_temp_barang_masuk_khusus WHERE UEXEC='".getUserID()."'");

                                    $response['code'] = 200;
                                    $response['message'] = "Simpan data sukses.";                                            
                                }else{
                                    $response['code'] = 403;
                                    $response['message'] = "Ops. Query error! Silahkan hubungi farmasi.";     
                                }
                            }                        
                        }else{
                            $response['code'] = 404;
                            $response['message'] = "Ops. Item barang masih kosong.";
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
            $response['code'] = 407;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
        }
        echo json_encode($response);
    }

    function cetak(){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            if(isset($_GET['kode'])){
                if($_GET['kode'] == ""){
                    echo "<script>alert('Ops. Data tidak boleh kosong. Silahkan coba kembali');
                    window.history.back();</script>";
                }else{
                    $queCommand = "SELECT * FROM tbl04_barang_masuk_khusus WHERE KDBMK = '$_GET[kode]'";
                    $cekCommand = $this->db->query("$queCommand"); 
                    if($cekCommand->num_rows() > 0){
                        $x = $cekCommand->row_array();
                        $this->db->where('KDBMK',$_GET['kode']);
                        $x['dataPreview'] = $this->db->get('tbl04_barang_masuk_khusus_detail');
                        $this->load->view('barang_masuk_khusus/print_preview',$x);
                    }else{
                        echo "<script>alert('Ops. Data tidak ditemukan. Silahkan coba kembali');
                        window.history.back();</script>";
                    }
                }
            }else{
                echo "<script>alert('Ops. Kode request tidak ditemukan. Silahkan coba kembali');
                window.history.back();</script>";
            }
        }else{
            echo "<script>alert('Ops. Ada kesalahan request. Silahkan coba kembali');
            window.history.back();</script>";
        }
    }

    function batalRecord(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state):
            $validStok = TRUE;
            $UEXEC = getUserID();
            $KDBMK = $_POST['KDBMK'];
            $this->db->where('KDBMK',$_POST['KDBMK']);
            $resBL = $this->db->get('tbl04_barang_masuk_khusus')->row_array();
            $resItem = $this->db->query("SELECT * FROM tbl04_barang_masuk_khusus_detail WHERE KDBMK='$KDBMK'")->result_array();

            foreach($resItem as $item){
                $cek = $this->db->query("SELECT * FROM stok_barang_fifo 
                WHERE KDLOKASI='$resBL[KDLOKASI]' AND TGLBELI='$resBL[TGLTERIMA]'
                AND KDBRG='$item[KDBRG]' AND HMODAL=$item[HMODAL] AND JSTOK>=$item[JMLMASUK]");
                if(!($cek->num_rows() > 0)){
                    $validStok = FALSE; 
                    $NMBRG = $item['NMBRG'];
                    break;
                } 
            }

            if($validStok){
                $dataItem = array(
                    'KDBMK' => $KDBMK,
                    'ALASAN' => $_POST['ALASAN'],
                    'UEXEC' => $UEXEC
                );
                $this->db->insert('tbl04_barang_masuk_khusus_batal',$dataItem);
                
                $this->db->where('UEXEC',$UEXEC);
                $this->db->where('KDBMK',$KDBMK);
                $res_Batal_Beli = $this->db->get('tbl04_barang_masuk_khusus_batal')->row_array();
                $KDBMK_RET = $res_Batal_Beli['KDBMK_RET'];

                foreach($resItem as $itemOP){
                    // Insert Item Batal
                    $params_batal = array(
                        'KDBMK_RET' => $KDBMK_RET,
                        'KDBRG' => $itemOP['KDBRG'],
                        'KDBRG' => $itemOP['KDBRG'],
                        'NMBRG' => $itemOP['NMBRG'],
                        'HMODAL' => $itemOP['HMODAL'],
                        'EXPDATE' => $itemOP['EXPDATE'],
                        'TGLBELI' => $itemOP['TGLBELI'],
                        'JMLRET' => $itemOP['JMLMASUK']
                    );
                    $this->db->insert('tbl04_barang_masuk_khusus_batal_detail',$params_batal);
                }

                $response['code'] = 200;
                $response['message'] = 'Retur Transaksi Barang Masuk Bukan Pembelian Success';
            }else{
                $response['code'] = 401;
                $response['message'] = 'Obat '.$NMBRG.' tidak bisa diretur.'.chr(10).'Jumlah obat telah berkurang';
            }
        else:
            $response['code'] = 402;
            $response['message'] = 'Sesi Anda Telah Berakhir. Silahkan Login Kembali';
        endif;
        echo json_encode($response); 
    }
}
