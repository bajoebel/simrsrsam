<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class trans_mutasi extends CI_Controller{
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

            $y['contentTitle'] = "Transaksi Mutasi Barang";        
            $y['getRuang'] = $this->db->query("$SQL");
            $jmlruang=$y['getRuang']->num_rows();
            if($jmlruang==1) {
                $kdlok=$y['getRuang']->row()->KDLOKASI;
                header('location:'.base_url() ."farmasi.php/trans_mutasi/goForm?kLok=" .$kdlok);
            }else{ 
                $x['content'] = $this->load->view('trans_mutasi/template_ruang',$y,true);
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
                    $y['contentTitle'] = "Transaksi Mutasi Barang";
                    $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);        
                    $x['content'] = $this->load->view('trans_mutasi/template_table',$y,true);
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
                    $y['contentTitle'] = "Transaksi Mutasi Barang";
                    $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);        
                    $x['content'] = $this->load->view('trans_mutasi/template_table',$y,true);
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
            $condition .= "AND (KDMT LIKE '%$sLike%' OR NAMA_LOKASI_TUJUAN LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (KDMT LIKE '%$sLike%' OR NAMA_LOKASI_TUJUAN LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT * FROM tbl04_mutasi $condition ORDER BY KDMT DESC";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['kdlokasi']    = $KDLOKASI;
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'farmasi.php/trans_mutasi/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('trans_mutasi/get_data',$x);
    }
    function cekRetur(){
        $KDMT = (isset($_POST['KDMT'])) ? $this->input->post('KDMT',true) : "";
        $this->db->where('KDMT',$KDMT);
        $resQuery = $this->db->get('tbl04_mutasi_batal');
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
            $z = setNav("nav_6");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['kLok'] = ($this->session->userdata('kdlokasi')) ? $this->session->userdata('kdlokasi') : "";
            $y['index_menu'] = 6;
            $y['contentTitle'] = "Entry Transaksi Mutasi Barang";
            $y['contentTitle'] .= "<br/>Asal Barang : " . getLokasiById($y['kLok']);        

            $this->db->where_not_in('KDLOKASI',$y['kLok']);
            $y['datlokasi'] = $this->db->get('tbl04_lokasi');
            $x['content'] = $this->load->view('trans_mutasi/template_entry',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }            
    }
    function getTemp(){
        $this->db->where('UEXEC',getUserID());
        $this->db->where('SESSION_ID',getSessionID());
        $x['SQL'] = $this->db->get('tbl04_temp_mutasi');
        $this->load->view('trans_mutasi/get_temp',$x);        
    }
    function getTotalTemp(){
        $UEXEC = getUserID();
        $SQL = "SELECT IFNULL(SUM(JSTOK * JMLMT),0) AS TOTFAKTUR,
        IFNULL(SUM(HDISKON),0) AS TOTDISKON_ITEM,
        IFNULL(SUM(SUBTOTAL),0) AS TOTFAKTUR_NETTO
        FROM tbl04_temp_mutasi WHERE UEXEC = '$UEXEC'";
        $cek = $this->db->query("$SQL");
        if($cek->num_rows() > 0){
            $x = $cek->row_array();
            $params = array(
                'TOTFAKTUR' => $x['TOTFAKTUR'],
                'TOTDISKON_ITEM' => $x['TOTDISKON_ITEM'],
                'TOTFAKTUR_NETTO' => $x['TOTFAKTUR_NETTO']
            );
        }else{
            $params = array(
                'TOTFAKTUR' => 0,
                'TOTDISKON_ITEM' => 0,
                'TOTFAKTUR_NETTO' => 0
            );
        }
        echo json_encode($params);
    }
    function getObat(){
        $keyword = (isset($_POST['keyword'])) ? $this->input->post('keyword',true) : "";
        $KDLOKASI = (isset($_POST['KDLOKASI'])) ? $this->input->post('KDLOKASI',true) : "";
        $SQL = "SELECT a.KDBRG,b.NMBRG,b.KDSATUAN,b.NMSATUAN,a.KDLOKASI,SUM(JSTOK) AS JSTOK
        FROM stok_barang_fifo a 
        JOIN tbl04_barang b ON a.KDBRG=b.KDBRG
        WHERE (a.KDBRG LIKE '%$keyword%' OR b.NMBRG LIKE '%$keyword%')
        AND a.KDLOKASI = '$KDLOKASI' 
        GROUP BY a.KDBRG,a.KDLOKASI ORDER BY NMBRG LIMIT 100";

        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('trans_mutasi/getObat_cari',$x);
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
                    isset($_POST['JMLMT'])
                ){
                    $params = array(
                        'KDBRG' => trim($this->input->post('KDBRG',true)),
                        'NMBRG' => trim($this->input->post('NMBRG',true)),
                        'NMSATUAN' => trim($this->input->post('NMSATUAN',true)),
                        'JSTOK' => str_replace(",","",trim($this->input->post('JSTOK',true))),
                        'JMLMT' => str_replace(",","",trim($this->input->post('JMLMT',true))),
                        'UEXEC' => getUserID(),
                        'SESSION_ID' => getSessionID()
                    );

                    if($params['KDBRG'] == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Obat/Alkes tidak boleh kosong.\nCoba ulangi kembali.";                
                    }elseif($params['JSTOK'] == "" || $params['JSTOK'] == "0"){
                        $response['code'] = 402;
                        $response['message'] = "Ops. Jumlah stok tidak boleh kosong.\nCoba ulangi kembali.";                
                    }elseif($params['JMLMT'] == "" || $params['JMLMT'] == "0"){
                        $response['code'] = 403;
                        $response['message'] = "Ops. Jumlah mutasi tidak boleh kosong.\nCoba ulangi kembali.";                
                    }elseif($params['JMLMT'] > $params['JSTOK']){
                        $response['code'] = 404;
                        $response['message'] = "Ops. Jumlah mutasi tidak boleh lebih besar dari jumlah stok.";                
                    }else{
                        $this->db->where('KDBRG',$params['KDBRG']);
                        $this->db->where('UEXEC',getUserID());
                        $resData = $this->db->get('tbl04_temp_mutasi');
                        if($resData->num_rows() > 0){
                            $this->db->where('KDBRG',$params['KDBRG']);
                            $this->db->where('UEXEC',getUserID());
                            $this->db->update('tbl04_temp_mutasi',$params);
                            $response['code'] = 201;
                            $response['message'] = 'Update Sukses';
                        }else{
                            $this->db->insert('tbl04_temp_mutasi',$params);                
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
                    isset($_POST['TGL_MUTASI']) &&
                    isset($_POST['LOKASI_ASAL']) &&
                    isset($_POST['NAMA_LOKASI_ASAL']) &&
                    isset($_POST['LOKASI_TUJUAN']) &&
                    isset($_POST['NAMA_LOKASI_TUJUAN']) &&
                    isset($_POST['KETMT'])
                ){
                    $params = array(
                        'KDMT'              => '',
                        'TGL_MUTASI'        => setDateEng(trim($this->input->post('TGL_MUTASI',true))),
                        'LOKASI_ASAL'       => trim($this->input->post('LOKASI_ASAL',true)),
                        'NAMA_LOKASI_ASAL'  => trim($this->input->post('NAMA_LOKASI_ASAL',true)),
                        'LOKASI_TUJUAN'     => trim($this->input->post('LOKASI_TUJUAN',true)),
                        'NAMA_LOKASI_TUJUAN'=> trim($this->input->post('NAMA_LOKASI_TUJUAN',true)),
                        'KETMT'             => trim($this->input->post('KETMT',true)),
                        'UEXEC'             => getUserID()
                    );

                    if(
                        $params['TGL_MUTASI']=="" ||
                        $params['LOKASI_ASAL']=="" ||
                        $params['NAMA_LOKASI_ASAL']=="" ||
                        $params['LOKASI_TUJUAN']==""
                    ){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Masih ada data yang kosong. Silahkan lengkapi data.";                        
                    }else{
                        $this->db->where('UEXEC',getUserID());
                        $cek = $this->db->get('tbl04_temp_mutasi');
                        if($cek->num_rows() > 0){
                            # Cek kondisi Stok Kembali 
                            $validStok = TRUE;
                            $UEXEC = getUserID();
                            $KDLOKASI = $params['LOKASI_ASAL'];
                            $resTemp = $this->db->query("SELECT * FROM tbl04_temp_mutasi WHERE UEXEC='$UEXEC'")->result_array();
                            foreach($resTemp as $item){
                                $cekItem = $this->db->query("SELECT a.KDBRG,b.NMBRG,KDLOKASI,SUM(JSTOK) AS JSTOK 
                                    FROM stok_barang_fifo a
                                    LEFT JOIN tbl04_barang b ON a.KDBRG=b.KDBRG
                                    WHERE a.KDLOKASI='$KDLOKASI' AND a.KDBRG='$item[KDBRG]'
                                    GROUP BY a.KDBRG,a.KDLOKASI");

                                if($cekItem->num_rows() > 0){
                                    $rsCekItem = $cekItem->row_array();
                                    if($rsCekItem['JSTOK'] < $item['JMLMT']){
                                        $validStok = FALSE; 
                                        $NMBRG = $item['NMBRG'];
                                        break;
                                    }
                                } 
                            }

                            if($validStok){
                                $dataItem = array(
                                    'DTMT' => date("Y-m-d H:i:s"),
                                    'TGL_MUTASI' => $params['TGL_MUTASI'],
                                    'LOKASI_ASAL' => $params['LOKASI_ASAL'],
                                    'NAMA_LOKASI_ASAL' => $params['NAMA_LOKASI_ASAL'],
                                    'LOKASI_TUJUAN' => $params['LOKASI_TUJUAN'],
                                    'NAMA_LOKASI_TUJUAN' => $params['NAMA_LOKASI_TUJUAN'],
                                    'KETMT' => $params['KETMT'],
                                    'UEXEC' => getUserID()
                                );
                                $this->db->insert('tbl04_mutasi',$dataItem);
                                
                                $this->db->where('UEXEC',$UEXEC);
                                $this->db->where('LOKASI_ASAL',$KDLOKASI);
                                $this->db->order_by('KDMT','DESC');
                                $this->db->limit(1);
                                $resMainInsert = $this->db->get('tbl04_mutasi')->row_array();

                                foreach($resTemp as $itemOP){
                                    $KDMT = $resMainInsert['KDMT'];
                                    $KDBRG = $itemOP['KDBRG'];
                                    $NMBRG = $itemOP['NMBRG'];
                                    $JMLMT = $itemOP['JMLMT'];
                                    $this->loop_item($KDMT,$KDBRG,$NMBRG,$KDLOKASI,$JMLMT);
                                }

                                $this->db->where('UEXEC',getUserID());
                                $this->db->delete('tbl04_temp_mutasi');

                                $response = array(
                                    'code' => 200,
                                    'message'   => 'Simpan Sukses'
                                );
                            }else{
                                $response = array(
                                    'code'    => 201,
                                    'message' => 'Obat '.$NMBRG.' tidak bisa dimutasi.'.chr(10).'Jumlah obat tidak mencukupi'
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

    function loop_item($kdmt,$kdbrg,$nmbrg,$kdlokasi,$keluar){
        $rqSTOK = $this->db->query("SELECT * FROM stok_barang_fifo 
            WHERE KDBRG = '$kdbrg' 
            AND KDLOKASI = '$kdlokasi' 
            AND JSTOK > 0 ORDER BY TGLBELI ASC, TGLEXP ASC LIMIT 1")->row_array();

        /*$rqSTOK = $this->db->query("SELECT * FROM stok_barang_fifo 
            WHERE KDBRG = '$kdbrg' 
            AND KDLOKASI = '$kdlokasi' 
            AND TGLBELI = (SELECT TGLBELI FROM stok_barang_fifo 
            WHERE JSTOK > 0 AND KDBRG = '$kdbrg' AND KDLOKASI = '$kdlokasi' 
            ORDER BY TGLBELI ASC LIMIT 1)
            AND JSTOK > 0 LIMIT 1")->row_array();*/

        if($keluar < $rqSTOK['JSTOK']) {
            // Insert Item
            $params_item = array(
                'KDMT' => $kdmt,
                'KDBRG' => $kdbrg,
                'NMBRG' => $nmbrg,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'EXPDATE' => $rqSTOK['TGLEXP'],
                'JMLMT' => $keluar,
                'JMLRET' => 0,
                'SISA' => $keluar
            );
            $this->db->insert('tbl04_mutasi_detail',$params_item);
        }elseif ($keluar > $rqSTOK['JSTOK']) {
            $params_item = array(
                'KDMT' => $kdmt,
                'KDBRG' => $kdbrg,
                'NMBRG' => $nmbrg,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'EXPDATE'=> $rqSTOK['TGLEXP'],
                'JMLMT' => $rqSTOK['JSTOK'],
                'JMLRET' => 0,
                'SISA' => $rqSTOK['JSTOK']
            );
            $this->db->insert('tbl04_mutasi_detail',$params_item);  
            $keluar = $keluar - $rqSTOK['JSTOK'];                      
            $this->loop_item($kdmt,$kdbrg,$nmbrg,$kdlokasi,$keluar);
        }elseif ($keluar == $rqSTOK['JSTOK']) {
            $params_item = array(
                'KDMT' => $kdmt,
                'KDBRG' => $kdbrg,
                'NMBRG' => $nmbrg,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'EXPDATE' => $rqSTOK['TGLEXP'],
                'JMLMT' => $keluar,
                'JMLRET' => 0,
                'SISA' => $keluar
            );
            $this->db->insert('tbl04_mutasi_detail',$params_item);
        }         
    }

    function cetak(){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            if(isset($_GET['kode'])){
                if($_GET['kode'] == ""){
                    echo "<script>alert('Ops. Data tidak boleh kosong. Silahkan coba kembali');
                    window.history.back();
                    </script>";
                }else{
                    $queCommand = "SELECT * FROM tbl04_mutasi WHERE KDMT = '$_GET[kode]'";
                    $cekCommand = $this->db->query("$queCommand"); 
                    if($cekCommand->num_rows() > 0){
                        $x = $cekCommand->row_array();
                        $this->db->select('*,SUM(JMLMT) AS JMLMT');
                        $this->db->where('KDMT',$_GET['kode']); 
                        $this->db->group_by('KDBRG');
                        $x['dataPreview'] = $this->db->get('tbl04_mutasi_detail');
                        $this->load->view('trans_mutasi/print_preview',$x);
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
                        $cekCommand = $this->db->delete('tbl04_temp_mutasi');
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
            $cekCommand = $this->db->delete('tbl04_temp_mutasi');
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
