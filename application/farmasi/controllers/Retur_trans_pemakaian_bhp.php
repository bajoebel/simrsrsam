<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class retur_trans_pemakaian_bhp extends CI_Controller{
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
            $z = setNav("nav_6");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $UID = $this->session->userdata('get_uid');
            $SQL = "SELECT * FROM tbl04_lokasi WHERE KDLOKASI IN(SELECT ruang_akses 
            FROM tbl01_users_farmasi WHERE NRP = '$UID')";

            $y['contentTitle'] = "Retur Transaksi Pemakaian BHP";        
            $y['getRuang'] = $this->db->query("$SQL");
            $jmlruang=$y['getRuang']->num_rows();
            if($jmlruang==1) {
                $kdlok=$y['getRuang']->row()->KDLOKASI;
                header('location:'.base_url() ."farmasi.php/retur_trans_pemakaian_bhp/goForm?kLok=" .$kdlok);
            }else{
                $x['content'] = $this->load->view('retur_trans_pemakaian_bhp/template_ruang',$y,true);
                $this->load->view('template/theme',$x);
            }
            
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
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
                    $z = setNav("nav_6");
                    $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
                    $y['index_menu'] = 6;
                    $y['contentTitle'] = "Retur Transaksi Mutasi Barang";
                    $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);   
                         
                    $x['content'] = $this->load->view('retur_trans_pemakaian_bhp/template_table',$y,true);
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
                    $z = setNav("nav_6");
                    $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
                    $y['index_menu'] = 6;
                    $y['contentTitle'] = "Retur Transaksi Mutasi Barang";
                    $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);   
                         
                    $x['content'] = $this->load->view('retur_trans_pemakaian_bhp/template_table',$y,true);
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
        $condition = "WHERE LOKASI_ASAL='$KDLOKASI' ";
        if(isset($_POST['sLike'])){
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "AND (KDMTBHP_RET LIKE '%$sLike%' OR KDMTBHP LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (KDMTBHP_RET LIKE '%$sLike%' OR KDMTBHP LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT * FROM tbl04_mutasi_bhp_retur $condition ORDER BY KDMTBHP_RET DESC";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['kdlokasi']    = $KDLOKASI;
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'farmasi.php/retur_trans_pemakaian_bhp/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('retur_trans_pemakaian_bhp/get_data',$x);
    }
    
    function tambah(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_6");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['kLok'] = ($this->session->userdata('kdlokasi')) ? $this->session->userdata('kdlokasi') : "";
            $y['index_menu'] = 6;
            $y['contentTitle'] = "Entry Retur Transaksi Pemakaian BHP";
            $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);        

            $y['datruang'] = $this->db->get('tbl01_ruang');
            $x['content'] = $this->load->view('retur_trans_pemakaian_bhp/template_entry',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }            
    }
    function getArrMutasi(){
        $KDMTBHP = (isset($_POST['KDMTBHP'])) ? $this->input->post('KDMTBHP',true) : "";
        $SQL = "SELECT * FROM tbl04_mutasi_bhp WHERE KDMTBHP = '$KDMTBHP'";
        $response = $this->db->query("$SQL")->row_array();
        echo json_encode($response);
    }
    function getMutasi(){
        $LOKASI_ASAL = (isset($_POST['LOKASI_ASAL'])) ? $this->input->post('LOKASI_ASAL',true) : "";
        if(isset($_POST['KDMTBHP'])){
            $KDMTBHP = $this->input->post('KDMTBHP',true);
            $SQL = "SELECT * FROM tbl04_mutasi_bhp WHERE KDMTBHP = '$KDMTBHP' AND LOKASI_ASAL='$LOKASI_ASAL'
            ORDER BY DTMTBHP DESC LIMIT 100";
        }
        if(isset($_POST['LOKASI_TUJUAN'])){
            $LOKASI_TUJUAN = $this->input->post('LOKASI_TUJUAN',true);
            $SQL = "SELECT * FROM tbl04_mutasi_bhp WHERE LOKASI_TUJUAN = '$LOKASI_TUJUAN' AND LOKASI_ASAL='$LOKASI_ASAL'
            ORDER BY DTMTBHP DESC LIMIT 100";
        }        
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('retur_trans_pemakaian_bhp/getMutasi_cari',$x);
    }
    function getObat(){
        $keyword = (isset($_POST['keyword'])) ? $this->input->post('keyword',true) : "";
        $KDMTBHP = (isset($_POST['KDMTBHP'])) ? $this->input->post('KDMTBHP',true) : "";

        $SQL = "SELECT KDBRG,NMBRG,SUM(SISA) AS SISA
        FROM tbl04_mutasi_bhp_detail WHERE (KDBRG LIKE '%$keyword%' OR NMBRG LIKE '%$keyword%') 
        AND KDMTBHP = '$KDMTBHP' 
        GROUP BY KDBRG ORDER BY NMBRG LIMIT 100";

        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('retur_trans_pemakaian_bhp/getObat_cari',$x);
    }
    function getTemp(){
        $this->db->where('UEXEC',getUserID());
        $this->db->where('SESSION_ID',getSessionID());
        $x['SQL'] = $this->db->get('tbl04_temp_mutasi_bhp_retur');
        $this->load->view('retur_trans_pemakaian_bhp/get_temp',$x);        
    }
    
    function simpanTemp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['KDBRG']) &&
                    isset($_POST['NMBRG']) &&
                    isset($_POST['NMSATUAN']) &&
                    isset($_POST['JMLMTBHP']) &&
                    isset($_POST['JMLRET'])
                ){
                    $params = array(
                        'KDBRG' => trim($this->input->post('KDBRG',true)),
                        'NMBRG' => trim($this->input->post('NMBRG',true)),
                        'NMSATUAN' => trim($this->input->post('NMSATUAN',true)),
                        'JMLMTBHP' => str_replace(",","",trim($this->input->post('JMLMTBHP',true))),
                        'JMLRET' => str_replace(",","",trim($this->input->post('JMLRET',true))),
                        'UEXEC' => getUserID(),
                        'SESSION_ID' => getSessionID()
                    );

                    if($params['KDBRG'] == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Obat/Alkes tidak boleh kosong.\nCoba ulangi kembali.";                
                    }elseif($params['JMLMTBHP'] == "" || $params['JMLMTBHP'] == "0"){
                        $response['code'] = 402;
                        $response['message'] = "Ops. Jumlah sisa mutasi tidak boleh kosong.\nCoba ulangi kembali.";                
                    }elseif($params['JMLRET'] == "" || $params['JMLRET'] == "0"){
                        $response['code'] = 403;
                        $response['message'] = "Ops. Jumlah retur tidak boleh kosong.\nCoba ulangi kembali.";                
                    }elseif($params['JMLRET'] > $params['JMLMTBHP']){
                        $response['code'] = 404;
                        $response['message'] = "Ops. Jumlah retur tidak boleh lebih besar dari jumlah sisa mutasi.";
                    }else{
                        $this->db->where('KDBRG',$params['KDBRG']);
                        $this->db->where('UEXEC',getUserID());
                        $resData = $this->db->get('tbl04_temp_mutasi_bhp_retur');
                        if($resData->num_rows() > 0){
                            $this->db->where('KDBRG',$params['KDBRG']);
                            $this->db->where('UEXEC',getUserID());
                            $this->db->update('tbl04_temp_mutasi_bhp_retur',$params);
                            $response['code'] = 201;
                            $response['message'] = 'Update Sukses';
                        }else{
                            $this->db->insert('tbl04_temp_mutasi_bhp_retur',$params);                
                            $response['code'] = 200;
                            $response['message'] = 'Simpan Sukses';
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

    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['TGL_RETUR']) &&
                    isset($_POST['KDMTBHP']) &&
                    isset($_POST['LOKASI_ASAL']) &&
                    isset($_POST['NAMA_LOKASI_ASAL']) &&
                    isset($_POST['LOKASI_TUJUAN']) &&
                    isset($_POST['NAMA_LOKASI_TUJUAN']) &&
                    isset($_POST['ALASAN_RET'])
                ){
                    $params = array(
                        'KDMTBHP_RET'       => '',
                        'TGL_RETUR'         => setDateEng(trim($this->input->post('TGL_RETUR',true))),
                        'KDMTBHP'           => trim($this->input->post('KDMTBHP',true)),
                        'LOKASI_ASAL'       => trim($this->input->post('LOKASI_ASAL',true)),
                        'NAMA_LOKASI_ASAL'  => trim($this->input->post('NAMA_LOKASI_ASAL',true)),
                        'LOKASI_TUJUAN'     => trim($this->input->post('LOKASI_TUJUAN',true)),
                        'NAMA_LOKASI_TUJUAN'=> trim($this->input->post('NAMA_LOKASI_TUJUAN',true)),
                        'ALASAN_RET'        => trim($this->input->post('ALASAN_RET',true)),
                        'UEXEC'             => getUserID()
                    );

                    if(
                        $params['TGL_RETUR']=="" ||
                        $params['KDMTBHP']=="" ||
                        $params['LOKASI_ASAL']=="" ||
                        $params['NAMA_LOKASI_ASAL']=="" ||
                        $params['LOKASI_TUJUAN']=="" ||
                        $params['NAMA_LOKASI_TUJUAN']=="" 
                    ){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Masih ada data yang kosong. Silahkan lengkapi data.";
                    }else{
                        $this->db->where('UEXEC',getUserID());
                        $cek = $this->db->get('tbl04_temp_mutasi_bhp_retur');
                        if($cek->num_rows() > 0){

                            # Cek kondisi Stok Kembali 
                            $validStok = TRUE;
                            $UEXEC = getUserID();
                            $TGL_RETUR = $params['TGL_RETUR'];
                            $KDMTBHP = $params['KDMTBHP'];
                            $LOKASI_ASAL = $params['LOKASI_ASAL'];
                            $NAMA_LOKASI_ASAL = $params['NAMA_LOKASI_ASAL'];
                            $LOKASI_TUJUAN = $params['LOKASI_TUJUAN'];
                            $NAMA_LOKASI_TUJUAN = $params['NAMA_LOKASI_TUJUAN'];
                            $ALASAN_RET = $params['ALASAN_RET'];

                            # Cek Sisa Yang Boleh Diretur Pada Detail Mutasi
                            $resTemp = $this->db->query("SELECT * FROM tbl04_temp_mutasi_bhp_retur WHERE UEXEC='$UEXEC'")->result_array();
                            foreach($resTemp as $itemTemp){
                                $sqlMutasiItem = "SELECT KDBRG,NMBRG,SUM(SISA) AS SISA
                                FROM tbl04_mutasi_bhp_detail
                                WHERE KDBRG = '$itemTemp[KDBRG]' AND KDMTBHP='$KDMTBHP' GROUP BY KDBRG";
                                $cekMutasiItem = $this->db->query("$sqlMutasiItem");

                                if($cekMutasiItem->num_rows() > 0){
                                    $rsCekMutasiItem = $cekMutasiItem->row_array();
                                    if($rsCekMutasiItem['SISA'] < $itemTemp['JMLRET']){
                                        $validStok = FALSE; 
                                        $NMBRG = $rsCekMutasiItem['NMBRG'];
                                        $DESKRIPSI = "Jumlah item retur melebihi jumlah sisa item pemakaian BHP";
                                        break;
                                    }else{
                                        # Cek Sisa Yang Boleh Diretur Pada Data Stok
                                        $resStok = $this->db->query("SELECT * FROM tbl04_mutasi_bhp_detail
                                        WHERE KDMTBHP='$KDMTBHP' AND KDBRG='$itemTemp[KDBRG]'");
                                        foreach($resStok->result_array() as $itemStok){
                                            $cekStokItem = $this->db->query("SELECT a.*,b.NMBRG 
                                                FROM stok_barang_fifo a
                                                JOIN tbl04_barang b ON a.KDBRG=b.KDBRG
                                                WHERE a.KDLOKASI='$LOKASI_ASAL' AND a.KDBRG='$itemStok[KDBRG]'
                                                AND HMODAL = $itemStok[HMODAL] AND TGLBELI = '$itemStok[TGLBELI]' 
                                                AND TGLEXP = '$itemStok[TGLEXP]'");

                                            if($cekStokItem->num_rows() > 0){
                                                $rsCekStokItem = $cekStokItem->row_array();
                                                //if($rsCekStokItem['JSTOK'] < $itemStok['SISA']){
                                                    $validStok = TRUE; 
                                                    $NMBRG = $rsCekStokItem['NMBRG'];
                                                    $DESKRIPSI = "Stok telah berkurang";                                
                                                    break;
                                                //}
                                            }else{
                                                $validStok = FALSE; 
                                                $NMBRG = "";
                                                $DESKRIPSI = "Stok tidak ditemukan";                                
                                                break;
                                            } 
                                        }                             
                                    }
                                }else{
                                    $validStok = FALSE; 
                                    $NMBRG = "";
                                    $DESKRIPSI = "Stok tidak ditemukan";                                
                                    break;
                                }                                        
                            } 

                            if($validStok){
                                $dataItem = array(
                                    'DTMTBHP_RET' => date('Y-m-d H:i:s'),
                                    'TGL_RETUR' => $TGL_RETUR,
                                    'KDMTBHP' => $KDMTBHP,
                                    'LOKASI_ASAL' => $LOKASI_ASAL,
                                    'NAMA_LOKASI_ASAL' => $NAMA_LOKASI_ASAL,
                                    'LOKASI_TUJUAN' => $LOKASI_TUJUAN,
                                    'NAMA_LOKASI_TUJUAN' => $NAMA_LOKASI_TUJUAN,
                                    'ALASAN_RET' => $ALASAN_RET,
                                    'UEXEC' => getUserID()
                                );
                                $this->db->insert('tbl04_mutasi_bhp_retur',$dataItem);
                                
                                $this->db->where('UEXEC',$UEXEC);
                                $this->db->where('KDMTBHP',$KDMTBHP);
                                $this->db->order_by('KDMTBHP_RET','DESC');
                                $this->db->limit(1);
                                $resMainInsert = $this->db->get('tbl04_mutasi_bhp_retur')->row_array();

                                foreach($resTemp as $itemOP){
                                    $KDMTBHP_RET = $resMainInsert['KDMTBHP_RET'];
                                    $KDBRG = $itemOP['KDBRG'];
                                    $NMBRG = $itemOP['NMBRG'];
                                    $JMLRET = $itemOP['JMLRET'];
                                    $this->loop_item($KDMTBHP_RET,$KDMTBHP,$KDBRG,$NMBRG,$JMLRET);
                                }

                                $this->db->where('UEXEC',getUserID());
                                $this->db->delete('tbl04_temp_mutasi_bhp_retur');

                                $response = array(
                                    'code' => 200,
                                    'message'   => 'Simpan Sukses'
                                );
                            }else{
                                $response = array(
                                    'code'    => 201,
                                    'message' => 'Obat '.$NMBRG.' tidak bisa di retur.'.chr(10).$DESKRIPSI
                                );                    
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

    function loop_item($KDMTBHP_RET,$KDMTBHP,$KDBRG,$NMBRG,$KELUAR){
        $sqlLoop = "SELECT * FROM tbl04_mutasi_bhp_detail 
        WHERE KDMTBHP='$KDMTBHP' AND KDBRG='$KDBRG' 
        AND SISA > 0 ORDER BY IDX DESC LIMIT 1";
        $rqSTOK = $this->db->query("$sqlLoop")->row_array();

        if($KELUAR < $rqSTOK['SISA']) {
            // Insert Item
            $params_item_retur = array(
                'KDMTBHP_RET' => $KDMTBHP_RET,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'EXPDATE' => $rqSTOK['TGLEXP'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'JMLRET' => $KELUAR
            );
            $this->db->insert('tbl04_mutasi_bhp_retur_detail',$params_item_retur);

            $params_item_update = array(
                'JMLRET' => $KELUAR,
                'SISA' => $rqSTOK['JMLMTBHP'] - $KELUAR
            );
            $this->db->where('KDMTBHP',$KDMTBHP);
            $this->db->where('KDBRG',$KDBRG);
            $this->db->where('HMODAL',$rqSTOK['HMODAL']);
            $this->db->where('TGLBELI',$rqSTOK['TGLBELI']);
            $this->db->where('TGLEXP', $rqSTOK['TGLEXP']);
            $this->db->update('tbl04_mutasi_bhp_detail',$params_item_update);

        }elseif ($KELUAR > $rqSTOK['SISA']) {
            $params_item_retur = array(
                'KDMTBHP_RET' => $KDMTBHP_RET,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'EXPDATE' => $rqSTOK['TGLEXP'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'JMLRET' => $rqSTOK['SISA']
            );
            $this->db->insert('tbl04_mutasi_bhp_retur_detail',$params_item_retur); 

            $params_item_update = array(
                'JMLRET' => $rqSTOK['SISA'],
                'SISA' => $rqSTOK['JMLMTBHP'] - $rqSTOK['SISA']
            );
            $this->db->where('KDMTBHP',$KDMTBHP);
            $this->db->where('KDBRG',$KDBRG);
            $this->db->where('HMODAL',$rqSTOK['HMODAL']);
            $this->db->where('TGLBELI',$rqSTOK['TGLBELI']);
            $this->db->where('TGLEXP', $rqSTOK['TGLEXP']);
            $this->db->update('tbl04_mutasi_bhp_detail',$params_item_update);

            $KELUAR = $KELUAR - $rqSTOK['SISA'];                      
            $this->loop_item($KDMTBHP_RET,$KDMTBHP,$KDBRG,$NMBRG,$KELUAR);
        }elseif ($KELUAR = $rqSTOK['SISA']) {
            $params_item_retur = array(
                'KDMTBHP_RET' => $KDMTBHP_RET,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'EXPDATE' => $rqSTOK['TGLEXP'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'JMLRET' => $KELUAR
            );
            $this->db->insert('tbl04_mutasi_bhp_retur_detail',$params_item_retur);

            $params_item_update = array(
                'JMLRET' => $rqSTOK['SISA'] + $KELUAR,
                'SISA' => $rqSTOK['SISA'] - $KELUAR
            );
            $this->db->where('KDMTBHP',$KDMTBHP);
            $this->db->where('KDBRG',$KDBRG);
            $this->db->where('HMODAL',$rqSTOK['HMODAL']);
            $this->db->where('TGLEXP', $rqSTOK['TGLEXP']);
            $this->db->where('TGLBELI',$rqSTOK['TGLBELI']);
            $this->db->update('tbl04_mutasi_bhp_detail',$params_item_update);
        }         
    }


    function cetak(){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            if(isset($_GET['kode'])){
                if($_GET['kode'] == ""){
                    echo "<script>alert('Ops. Data tidak boleh kosong. Silahkan coba kembali');
                    window.history.back();</script>";
                }else{
                    $queCommand = "SELECT * FROM tbl04_mutasi_bhp_retur WHERE KDMTBHP_RET = '$_GET[kode]'";
                    $cekCommand = $this->db->query("$queCommand"); 
                    if($cekCommand->num_rows() > 0){
                        $x = $cekCommand->row_array();
                        $this->db->where('KDMTBHP_RET',$_GET['kode']);
                        $x['dataPreview'] = $this->db->get('tbl04_mutasi_bhp_retur_detail');
                        $this->load->view('retur_trans_pemakaian_bhp/print_preview',$x);
                    }else{
                        echo "<script>alert('Ops. Data tidak ditemukan. Silahkan coba kembali');
                        window.history.back();</script>";
                    }
                }
            }else{
                echo "<script>alert('Ops. Kode request tidak ditemukan. Silahkan coba kembali');
                window.history.back();
                </script>";
            }
        }else{
            echo "<script>alert('Ops. Ada kesalahan request. Silahkan coba kembali');
            window.history.back();
            </script>";
        }
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
                        $cekCommand = $this->db->delete('tbl04_temp_mutasi_bhp_retur');
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
            $cekCommand = $this->db->delete('tbl04_temp_mutasi_bhp_retur');
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
}
?>