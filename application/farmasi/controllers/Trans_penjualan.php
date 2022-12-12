<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class trans_penjualan extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
        $this->load->model('farmasi_model');
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
            FROM tbl01_users_farmasi WHERE NRP = '$UID') AND KDGRLOKASI='1'";

            $y['contentTitle'] = "Transaksi Penjualan";

            $y['getRuang'] = $this->db->query("$SQL");
            $jmlruang=$y['getRuang']->num_rows();
            if($jmlruang==1) {
                $kdlok=$y['getRuang']->row()->KDLOKASI;
                header('location:'.base_url() ."farmasi.php/trans_penjualan/goForm?kLok=" .$kdlok);
            }else{
                $x['content'] = $this->load->view('trans_penjualan/template_ruang',$y,true);
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
                    $y['contentTitle'] = "Transaksi Penjualan";
                    $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);        
                    $x['content'] = $this->load->view('trans_penjualan/template_table',$y,true);
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

                    $y['contentTitle'] = "Transaksi Penjualan";
                    $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);        
                    $x['content'] = $this->load->view('trans_penjualan/template_table',$y,true);
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
        $condition = "WHERE KDLOKASI='$KDLOKASI'";

        if(isset($_POST['sLike'])){
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= " AND (NOMR LIKE '%$sLike%' OR NMPASIEN LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);
            
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= " AND (NOMR LIKE '%$sLike%' OR NMPASIEN LIKE '%$sLike%')";
            }
        }
        
        $SQL = "SELECT * FROM tbl04_penjualan $condition ORDER BY DTJL DESC";            
                
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['kdlokasi']    = $KDLOKASI;
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'farmasi.php/trans_penjualan/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);
        
        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('trans_penjualan/get_data',$x);
    } 
    
    function cekRetur(){
        $reg_unit = (isset($_POST['reg_unit'])) ? $this->input->post('reg_unit',true) : "";
        $this->db->where('reg_unit',$reg_unit);
        $resQuery = $this->db->get('tbl02_pendaftaran_batal');
        if($resQuery->num_rows() > 0){
            $response['code'] = 200;
        }else{
            $response['code'] = 201;
        }
        echo json_encode($response);
    }

    function getPendaftaran(){
        $reg_unit = (isset($_POST['reg_unit'])) ? $this->input->post('reg_unit',true) : "";
        $this->db->where('reg_unit',$reg_unit);
        $resQuery = $this->db->get('tbl02_pendaftaran');
        if($resQuery->num_rows() > 0){
            $x['code'] = 200;
            $x['response'] = $resQuery->row_array();
        }else{
            $x['code'] = 201;
            $x['response'] = NULL;
        }
        echo json_encode($x);
    }

    function tambah(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_7");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['kLok'] = ($this->session->userdata('kdlokasi')) ? $this->session->userdata('kdlokasi') : "";
            $y['index_menu'] = 7;
            $y['contentTitle'] = "Entry Transaksi Penjualan";
            $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);        

            $this->db->where_in('profId',array('1','2'));
            $y['datdokter'] = $this->db->get('tbl01_pegawai');

            $x['content'] = $this->load->view('trans_penjualan/template_entry',$y,true);
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
        SUM(JSTOK) AS JSTOK,MAX(a.HMODAL) * 1.2 AS HJUAL
        FROM stok_barang_fifo a 
        LEFT JOIN tbl04_barang b ON a.KDBRG=b.KDBRG
        WHERE (a.KDBRG LIKE '%$keyword%' OR b.NMBRG LIKE '%$keyword%')
        AND a.KDLOKASI = '$KDLOKASI' 
        GROUP BY a.KDBRG,a.KDLOKASI ORDER BY NMBRG LIMIT 100";

        echo $SQL;    
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('trans_penjualan/getObat_cari',$x);
    }
    function getPasien(){
        $keyword = (isset($_POST['keyword'])) ? $this->input->post('keyword',true) : "";
        $SQL = "SELECT * FROM tbl02_pendaftaran WHERE ada_resep =1 AND 
        (reg_unit LIKE '%$keyword%' OR id_daftar LIKE '%$keyword%' OR 
                nomr LIKE '%$keyword%' OR nama_pasien LIKE '%$keyword%') AND id_daftar NOT IN (SELECT id_daftar FROM tbl02_pasien_pulang) 
        ORDER BY idx DESC LIMIT 100";
        //echo $SQL; exit;
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('trans_penjualan/get_pasien_cari',$x);
    }
    function getTemp(){
        $UEXEC = getUserID();
        $SQL = "SELECT *,SUM(JMLJUAL) AS JMLJUAL, 
        SUM((CASE WHEN (AP= 'Sebelum Makan Pagi') THEN JMLJUAL ELSE 0 END)) AS `SBM_PAGI`,
        SUM((CASE WHEN (AP= 'Sebelum Makan Siang') THEN JMLJUAL ELSE 0 END)) AS `SBM_SIANG`,
        SUM((CASE WHEN (AP= 'Sebelum Makan Malam') THEN JMLJUAL ELSE 0 END)) AS `SBM_MALAM`,
        SUM((CASE WHEN (AP= 'Setelah Makan Pagi') THEN JMLJUAL ELSE 0 END)) AS `STM_PAGI`,
        SUM((CASE WHEN (AP= 'Setelah Makan Siang') THEN JMLJUAL ELSE 0 END)) AS `STM_SIANG`,
        SUM((CASE WHEN (AP= 'Setelah Makan Malam') THEN JMLJUAL ELSE 0 END)) AS `STM_MALAM`,
        SUM((CASE WHEN (AP= 'Malam Jam 22:00') THEN JMLJUAL ELSE 0 END)) AS `MALAM`,
        SUM(SUBTOTAL) AS SUBTOTAL, SUM(DISKON) AS DISKON FROM tbl04_temp_penjualan WHERE UEXEC = '$UEXEC' GROUP BY KDBRG ";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('trans_penjualan/get_temp',$x);         
    }

    function getTotalTemp(){
        $UEXEC = getUserID();
        $SQL = "SELECT IFNULL(SUM((JMLJUAL * HJUAL) - DISKON + R),0) AS GT  FROM tbl04_temp_penjualan 
        WHERE UEXEC = '$UEXEC'";
        $cek = $this->db->query("$SQL");
        if($cek->num_rows() > 0){
            $x = $cek->row_array();
            $params['TOTAL'] = $x['GT'];
        }else{
            $params['TOTAL'] = 0;
        }
        echo json_encode($params);
    }

    function emptyTemp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $this->db->where('UEXEC',getUserID());
            $cek = $this->db->delete('tbl04_temp_penjualan');
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
                    isset($_POST['JSTOK']) &&
                    isset($_POST['HJUAL']) &&
                    isset($_POST['JMLJUAL']) &&
                    isset($_POST['DISKON']) &&
                    isset($_POST['R']) &&
                    isset($_POST['SUBTOTAL']) &&
                    isset($_POST['AP'])
                ){
                    
                    $params = array(
                        'KDBRG'     => trim($this->input->post('KDBRG',true)),
                        'NMBRG' => trim($this->input->post('NMBRG',true)),
                        'JSTOK' => str_replace(",","",trim($this->input->post('JSTOK',true))),
                        'HJUAL' => str_replace(",","",trim($this->input->post('HJUAL',true))),
                        'JMLJUAL' => str_replace(",","",trim($this->input->post('JMLJUAL',true))),
                        'DISKON' => str_replace(",","",trim($this->input->post('DISKON',true))),
                        'R' => str_replace(",","",trim($this->input->post('R',true))),
                        'SUBTOTAL' => str_replace(",","",trim($this->input->post('SUBTOTAL',true))),
                        'AP' => trim($this->input->post('AP',true)),
                        'AP_JENISOBAT'=> trim($this->input->post('AP_JENISOBAT',true)),
                        'AP_JMLHARI'=> trim($this->input->post('AP_JMLHARI',true)),
                        'AP_JMLSATUAN'=> trim($this->input->post('AP_JMLSATUAN',true)),
                        'AP_SATUAN'=> trim($this->input->post('AP_SATUAN',true)),
                        'AP_CARAPAKAI'=> trim($this->input->post('AP_CARAPAKAI',true)),
                        'AP_WAKTUJML'=> trim($this->input->post('AP_WAKTUJML',true)),
                        'AP_WAKTUPAKAI'=> trim($this->input->post('AP_WAKTUPAKAI',true)),
                        'AP_WAKTUKET'=> trim($this->input->post('AP_WAKTUKET',true)),
                        'AP_KET'=> trim($this->input->post('AP_KET',true)),
                        'UEXEC' => getUserID()
                    );

                    if(
                        $params['KDBRG']=="" ||
                        $params['NMBRG']=="" ||
                        $params['JSTOK']=="" ||
                        $params['HJUAL']=="" ||
                        $params['JMLJUAL']=="" ||
                        $params['R']=="" ||
                        $params['SUBTOTAL']==""
                    ){
                        $x['code'] = 401;
                        $x['message'] = "Ops. Masih ada data yang kosong. Silahkan lengkapi data.";
                    }elseif($params['JMLJUAL'] > $params['JSTOK']){
                        $x['code'] = 402;
                        $x['message'] = "Ops. Jumlah jual tidak boleh lebih besar dari jumlah stok.";
                    }else{
                        $this->db->where('KDBRG',$params['KDBRG']);
                        $this->db->where('UEXEC',getUserID());
                        $resData = $this->db->get('tbl04_temp_penjualan');
                        if($resData->num_rows() > 0){
                            $this->db->where('KDBRG',$params['KDBRG']);
                            $this->db->where('UEXEC',getUserID());
                            $cek = $this->db->update('tbl04_temp_penjualan',$params);
                            if ($cek) {
                                $x['code'] = 201;
                                $x['message'] = 'Update Sukses';                
                            }else{
                                $x['code'] = 402;
                                $x['message'] = 'Query update not success';                
                            }
                        }else{
                            $cek = $this->db->insert('tbl04_temp_penjualan',$params);
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

    function hapusTemp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $this->db->where('IDX',$_POST['IDX']);
            $cek = $this->db->delete('tbl04_temp_penjualan');
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
    
    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['REG_UNIT']) &&
                    isset($_POST['ID_DAFTAR']) &&
                    isset($_POST['NOMR']) &&
                    isset($_POST['NMPASIEN']) &&
                    isset($_POST['KDRUANGAN']) &&
                    isset($_POST['NMRUANGAN']) &&
                    isset($_POST['JNSLAYANAN']) &&
                    isset($_POST['ID_CARA_BAYAR']) &&
                    isset($_POST['CARA_BAYAR']) &&
                    isset($_POST['KDLOKASI']) &&
                    isset($_POST['NMLOKASI']) &&
                    isset($_POST['KDDOKTER']) &&
                    isset($_POST['NMDOKTER']) &&
                    isset($_POST['NORESEP']) &&
                    isset($_POST['TGLRESEP']) &&
                    isset($_POST['TGLJUAL']) &&
                    isset($_POST['KETJL'])
                ){
                    $params = array(
                        'KDJL'          => '',
                        'DTJL'          => date('Y-m-d H:i:s'),
                        'REG_UNIT'      => trim($this->input->post('REG_UNIT',true)),
                        'ID_DAFTAR'     => trim($this->input->post('ID_DAFTAR',true)),
                        'NOMR'          => trim($this->input->post('NOMR',true)),
                        'NMPASIEN'      => trim($this->input->post('NMPASIEN',true)),
                        'KDRUANGAN'     => trim($this->input->post('KDRUANGAN',true)),
                        'NMRUANGAN'     => trim($this->input->post('NMRUANGAN',true)),
                        'JNSLAYANAN'    => trim($this->input->post('JNSLAYANAN',true)),
                        'ID_CARA_BAYAR' => trim($this->input->post('ID_CARA_BAYAR',true)),
                        'CARA_BAYAR'    => trim($this->input->post('CARA_BAYAR',true)),
                        'KDLOKASI'      => trim($this->input->post('KDLOKASI',true)),
                        'NMLOKASI'      => trim($this->input->post('NMLOKASI',true)),
                        'KDDOKTER'      => trim($this->input->post('KDDOKTER',true)),
                        'NMDOKTER'      => trim($this->input->post('NMDOKTER',true)),
                        'NORESEP'       => trim($this->input->post('NORESEP',true)),
                        'TGLRESEP'      => setDateEng(trim($this->input->post('TGLRESEP',true))),
                        'TGLJUAL'       => setDateEng(trim($this->input->post('TGLJUAL',true))),
                        'KETJL'         => trim($this->input->post('KETJL',true)),
                        'UEXEC'         => getUserID()
                    );

                    if(
                        $params['REG_UNIT']=="" ||
                        $params['ID_DAFTAR']=="" ||
                        $params['NOMR']=="" ||
                        $params['NMPASIEN']=="" ||
                        $params['KDRUANGAN']=="" ||
                        $params['NMRUANGAN']=="" ||
                        $params['JNSLAYANAN']=="" ||
                        $params['ID_CARA_BAYAR']=="" ||
                        $params['CARA_BAYAR']=="" ||
                        $params['KDLOKASI']=="" ||
                        $params['NMLOKASI']=="" ||
                        $params['KDDOKTER']=="" ||
                        $params['NMDOKTER']=="" ||
                        $params['NORESEP']=="" ||
                        $params['TGLRESEP']=="" ||
                        $params['TGLJUAL']==""
                    ){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Masih ada data yang kosong. Silahkan lengkapi data.";                        
                    }else{
                        $this->db->where('UEXEC',getUserID());
                        $cek = $this->db->get('tbl04_temp_penjualan');
                        if($cek->num_rows() > 0){
                            # Cek kondisi Stok Kembali 
                            $validStok = TRUE;
                            $UEXEC = getUserID();
                            $KDLOKASI = $params['KDLOKASI'];
                            $NOMR = $params['NOMR'];

                            $resTemp = $this->db->query("SELECT * FROM tbl04_temp_penjualan WHERE UEXEC='$UEXEC'")->result_array();
                            foreach($resTemp as $item){
                                $cekItem = $this->db->query("SELECT a.KDBRG,b.NMBRG,KDLOKASI,SUM(JSTOK) AS JSTOK 
                                    FROM stok_barang_fifo a
                                    LEFT JOIN tbl04_barang b ON a.KDBRG=b.KDBRG
                                    WHERE a.KDLOKASI='$KDLOKASI' AND a.KDBRG='$item[KDBRG]'
                                    GROUP BY a.KDBRG,a.KDLOKASI");

                                if($cekItem->num_rows() > 0){
                                    $rsCekItem = $cekItem->row_array();
                                    if($rsCekItem['JSTOK'] < $item['JMLJUAL']){
                                        $validStok = FALSE; 
                                        $NMBRG = $item['NMBRG'];
                                        break;
                                    }
                                } 
                            }

                            if($validStok){
                                $this->db->insert('tbl04_penjualan',$params);

                                $this->db->where('UEXEC',$UEXEC);
                                $this->db->where('KDLOKASI',$KDLOKASI);
                                $this->db->where('NOMR',$NOMR);
                                $this->db->order_by('KDJL','DESC');
                                $this->db->limit(1);
                                $resMainInsert = $this->db->get('tbl04_penjualan')->row_array();

                                foreach($resTemp as $itemOP){
                                    $KDJL = $resMainInsert['KDJL'];
                                    $KDBRG = $itemOP['KDBRG'];
                                    $NMBRG = $itemOP['NMBRG'];
                                    $HJUAL = $itemOP['HJUAL'];
                                    $JMLJUAL = $itemOP['JMLJUAL'];
                                    $DISKON = $itemOP['DISKON'];
                                    $R = $itemOP['R'];
                                    $SUBTOTAL = $itemOP['SUBTOTAL'];
                                    $AP = $itemOP['AP'];
                                    $AP_JENISOBAT= $itemOP['AP_JENISOBAT'];
                                    $AP_JMLHARI= $itemOP['AP_JMLHARI'];
                                    $AP_JMLSATUAN= $itemOP['AP_JMLSATUAN'];
                                    $AP_SATUAN= $itemOP['AP_SATUAN'];
                                    $AP_CARAPAKAI= $itemOP['AP_CARAPAKAI'];
                                    $AP_WAKTUJML= $itemOP['AP_WAKTUJML'];
                                    $AP_WAKTUPAKAI= $itemOP['AP_WAKTUPAKAI'];
                                    $AP_WAKTUKET= $itemOP['AP_WAKTUKET'];
                                    $AP_KET= $itemOP['AP_KET'];
                                    $this->loop_item($KDJL,$KDBRG,$NMBRG,$KDLOKASI,$HJUAL,$JMLJUAL,$DISKON,$R,$SUBTOTAL,$AP,$AP_JENISOBAT,$AP_JMLHARI,$AP_JMLSATUAN,$AP_SATUAN,$AP_CARAPAKAI,$AP_WAKTUJML,$AP_WAKTUPAKAI,$AP_WAKTUKET,$AP_KET);
                                }

                                $this->db->where('UEXEC',getUserID());
                                $this->db->delete('tbl04_temp_penjualan');

                                $response['code'] = 200;
                                $response['message'] = $KDJL;
                            }else{
                                $response['code'] = 201;
                                $response['message'] = 'Obat '.$NMBRG.' tidak bisa dimutasi.'.chr(10).'Jumlah obat tidak mencukupi';
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
    
    function loop_item($KDJL,$KDBRG,$NMBRG,$KDLOKASI,$HJUAL,$JMLJUAL,$DISKON,$R,$SUBTOTAL,$AP,$AP_JENISOBAT,
        $AP_JMLHARI,
        $AP_JMLSATUAN,
        $AP_SATUAN,
        $AP_CARAPAKAI,
        $AP_WAKTUJML,
        $AP_WAKTUPAKAI,
        $AP_WAKTUKET,
        $AP_KET){
        /*$rqSTOK = $this->db->query("SELECT * FROM stok_barang_fifo 
            WHERE KDBRG = '$KDBRG' 
            AND KDLOKASI = '$KDLOKASI' 
            AND TGLBELI = (SELECT TGLBELI FROM stok_barang_fifo 
            WHERE JSTOK > 0 AND KDBRG = '$KDBRG' AND KDLOKASI = '$KDLOKASI' 
            ORDER BY TGLBELI ASC, TGLEXP DESC LIMIT 1)
            AND JSTOK > 0 LIMIT 1")->row_array();*/
        $rqSTOK =$this->db->query("SELECT * FROM stok_barang_fifo 
            WHERE KDBRG = '$KDBRG' 
            AND KDLOKASI = '$KDLOKASI' 
            AND JSTOK > 0 ORDER BY TGLBELI ASC, TGLEXP ASC LIMIT 1")->row_array();

        if($JMLJUAL < $rqSTOK['JSTOK']) {
            // Insert Item
            $params_item = array(
                'KDJL' => $KDJL,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'HJUAL' => $HJUAL,
                'JMLJUAL' => $JMLJUAL,
                'DISKON' => $DISKON,
                'R' => $R,
                'SUBTOTAL' => $SUBTOTAL,
                'AP' => $AP,
                'AP_JENISOBAT'=> $AP_JENISOBAT,
                'AP_JMLHARI'=> $AP_JMLHARI,
                'AP_JMLSATUAN'=> $AP_JMLSATUAN,
                'AP_SATUAN'=> $AP_SATUAN,
                'AP_CARAPAKAI'=> $AP_CARAPAKAI,
                'AP_WAKTUJML'=> $AP_WAKTUJML,
                'AP_WAKTUPAKAI'=> $AP_WAKTUPAKAI,
                'AP_WAKTUKET'=> $AP_WAKTUKET,
                'AP_KET'=> $AP_KET,
                'AP_EXPDATE'=> $rqSTOK['TGLEXP'],
                'JMLRET' => 0,
                'SISA' => $JMLJUAL
            );
            $this->db->insert('tbl04_penjualan_detail',$params_item);
        }elseif ($JMLJUAL > $rqSTOK['JSTOK']) {
            $params_item = array(
                'KDJL' => $KDJL,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'HJUAL' => $HJUAL,
                'JMLJUAL' => $rqSTOK['JSTOK'],
                'DISKON' => $DISKON,
                'R' => $R,
                'SUBTOTAL' => $SUBTOTAL,
                'AP' => $AP,
                'AP_JENISOBAT' => $AP_JENISOBAT,
                'AP_JMLHARI' => $AP_JMLHARI,
                'AP_JMLSATUAN' => $AP_JMLSATUAN,
                'AP_SATUAN' => $AP_SATUAN,
                'AP_CARAPAKAI' => $AP_CARAPAKAI,
                'AP_WAKTUJML' => $AP_WAKTUJML,
                'AP_WAKTUPAKAI' => $AP_WAKTUPAKAI,
                'AP_WAKTUKET' => $AP_WAKTUKET,
                'AP_KET' => $AP_KET,
                'AP_EXPDATE' => $rqSTOK['TGLEXP'],
                'JMLRET' => 0,
                'SISA' => $rqSTOK['JSTOK']
            );
            $this->db->insert('tbl04_penjualan_detail',$params_item);  
            $JMLJUAL = $JMLJUAL - $rqSTOK['JSTOK'];                      
            $this->loop_item(
                $KDJL,
                $KDBRG,
                $NMBRG,
                $KDLOKASI,
                $HJUAL,
                $JMLJUAL,
                $DISKON,
                $R,
                $SUBTOTAL,
                $AP,
                $AP_JENISOBAT,
                $AP_JMLHARI,
                $AP_JMLSATUAN,
                $AP_SATUAN,
                $AP_CARAPAKAI,
                $AP_WAKTUJML,
                $AP_WAKTUPAKAI,
                $AP_WAKTUKET,
                $AP_KET);
        }elseif ($JMLJUAL = $rqSTOK['JSTOK']) {
            $params_item = array(
                'KDJL' => $KDJL,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'HJUAL' => $HJUAL,
                'JMLJUAL' => $JMLJUAL,
                'DISKON' => $DISKON,
                'R' => $R,
                'SUBTOTAL' => $SUBTOTAL,
                'AP' => $AP,
                'AP_JENISOBAT' => $AP_JENISOBAT,
                'AP_JMLHARI' => $AP_JMLHARI,
                'AP_JMLSATUAN' => $AP_JMLSATUAN,
                'AP_SATUAN' => $AP_SATUAN,
                'AP_CARAPAKAI' => $AP_CARAPAKAI,
                'AP_WAKTUJML' => $AP_WAKTUJML,
                'AP_WAKTUPAKAI' => $AP_WAKTUPAKAI,
                'AP_WAKTUKET' => $AP_WAKTUKET,
                'AP_KET' => $AP_KET,
                'AP_EXPDATE' => $rqSTOK['TGLEXP'],
                'JMLRET' => 0,
                'SISA' => $JMLJUAL
            );
            $this->db->insert('tbl04_penjualan_detail',$params_item);
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
        
        $KDJL = (isset($_GET['kode'])) ? $_GET['kode'] : ""; 
        $SQL_MAIN = "SELECT * FROM tbl04_penjualan WHERE KDJL = '$KDJL'";
        $cek = $this->db->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
            $x['KDJL'] = $res['KDJL'];
            $x['DTJL'] = $res['DTJL'];
            $x['REG_UNIT'] = $res['REG_UNIT'];
            $x['ID_DAFTAR'] = $res['ID_DAFTAR'];
            $x['NOMR'] = $res['NOMR'];
            $x['NMPASIEN'] = $res['NMPASIEN'];
            $x['KDRUANGAN'] = $res['KDRUANGAN'];
            $x['NMRUANGAN'] = $res['NMRUANGAN'];
            $x['JNSLAYANAN'] = $res['JNSLAYANAN'];
            $x['ID_CARA_BAYAR'] = $res['ID_CARA_BAYAR'];
            $x['CARA_BAYAR'] = $res['CARA_BAYAR'];
            $x['KDLOKASI'] = $res['KDLOKASI'];
            $x['NMLOKASI'] = $res['NMLOKASI'];            
            $x['KDDOKTER'] = $res['KDDOKTER'];
            $x['NMDOKTER'] = $res['NMDOKTER'];
            $x['NORESEP'] = $res['NORESEP'];
            $x['TGLRESEP'] = $res['TGLRESEP'];
            $x['TGLJUAL'] = $res['TGLJUAL'];
            $x['KETJL'] = $res['KETJL'];

            $SQL = "SELECT KDBRG,NMBRG,HJUAL,SUM(JMLJUAL) AS JMLJUAL,SUM(DISKON) AS DISKON,R,
            SUM(SUBTOTAL) AS SUBTOTAL FROM tbl04_penjualan_detail
            WHERE KDJL = '$KDJL' GROUP BY KDBRG ORDER BY NMBRG";
            $dataPreview = $this->db->query("$SQL");
            $x['dataPreview'] = $dataPreview;
            $this->load->view('trans_penjualan/print_preview',$x);

        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                history.back();
            </script>";
        }        
    }
    function cetakTicket(){

        $KDJL = (isset($_GET['kode'])) ? $_GET['kode'] : ""; 
        $action = (isset($_GET['action'])) ? $_GET['action'] : ""; 
        $y['kLok'] = (isset($_GET['kLok'])) ? $this->input->get('kLok',true) : "";

        $SQL_MAIN = "SELECT * FROM tbl04_penjualan WHERE KDJL = '$KDJL'";
        $cek = $this->db->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
            $y['KDJL'] = $res['KDJL'];
            $y['DTJL'] = $res['DTJL'];
            $y['REG_UNIT'] = $res['REG_UNIT'];
            $y['ID_DAFTAR'] = $res['ID_DAFTAR'];
            $y['NOMR'] = $res['NOMR'];
            $y['NMPASIEN'] = $res['NMPASIEN'];
            $y['KDRUANGAN'] = $res['KDRUANGAN'];
            $y['NMRUANGAN'] = $res['NMRUANGAN'];
            $y['JNSLAYANAN'] = $res['JNSLAYANAN'];
            $y['ID_CARA_BAYAR'] = $res['ID_CARA_BAYAR'];
            $y['CARA_BAYAR'] = $res['CARA_BAYAR'];
            $y['KDLOKASI'] = $res['KDLOKASI'];
            $y['NMLOKASI'] = $res['NMLOKASI'];            
            $y['KDDOKTER'] = $res['KDDOKTER'];
            $y['NMDOKTER'] = $res['NMDOKTER'];
            $y['NORESEP'] = $res['NORESEP'];
            $y['TGLRESEP'] = $res['TGLRESEP'];
            $y['TGLJUAL'] = $res['TGLJUAL'];
            $y['KETJL'] = $res['KETJL'];

            $SQL = "SELECT *,MAX(AP_EXPDATE) as AP_EXPDATE FROM tbl04_penjualan_detail
            WHERE KDJL = '$KDJL' GROUP BY KDBRG ORDER BY NMBRG";
            $y['dataPreview'] =  $this->db->query("$SQL");

            if (empty($action)) {
                $x['header'] = $this->load->view('template/header','',true);
                $z = setNav("nav_7");
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                $UID = $this->session->userdata('get_uid');

                $y['contentTitle'] = "Form E-Ticket";

                $x['content'] = $this->load->view('trans_penjualan/form_eticket',$y,true);
                $this->load->view('template/theme',$x);
            }else{
                $this->load->view('trans_penjualan/print_eticket_group',$y);
            }
            
        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                history.back();
            </script>";
        }
    }

    function eticket(){
        $this->load->view('trans_penjualan/print_eticket');
    }
    function updateAP(){
        $this->db->where('KDJL',$_POST['KDJL']);
        $this->db->where('KDBRG',$_POST['KDBRG']);
        $cek = $this->db->get('tbl04_penjualan_detail');
        if($cek->num_rows() > 0){
            $data = array(
                'AP' => $_POST['AP'],
                'AP_JENISOBAT'=> $_POST['AP_JENISOBAT'],
                'AP_JMLHARI'=> $_POST['AP_JMLHARI'],
                'AP_JMLSATUAN'=> $_POST['AP_JMLSATUAN'],
                'AP_SATUAN'=> $_POST['AP_SATUAN'],
                'AP_CARAPAKAI'=> $_POST['AP_CARAPAKAI'],
                'AP_WAKTUJML'=> $_POST['AP_WAKTUJML'],
                'AP_WAKTUPAKAI'=> $_POST['AP_WAKTUPAKAI'],
                'AP_WAKTUKET'=> $_POST['AP_WAKTUKET'],
                'AP_KET'=> $_POST['AP_KET'],
                'AP_EXPDATE'=> $_POST['AP_EXPDATE'],
            );
            $this->db->where('KDJL',$_POST['KDJL']);
            $this->db->where('KDBRG',$_POST['KDBRG']);
            $this->db->update('tbl04_penjualan_detail',$data);
            $params = array(
                'code'    => 200,
                'message' => 'Update sukses'
            );        
        }else{
            $params = array(
                'code'    => 201,
                'message' => 'Update Failed'
            );        
        }
        echo json_encode($params);
    }
}
