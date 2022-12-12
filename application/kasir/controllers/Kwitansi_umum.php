<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class kwitansi_umum extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
    }    
    public function index(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $this->session->unset_userdata('sLike');
            $this->session->unset_userdata('sPage');

            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_3");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            
            $y['contentTitle'] = "Kwitansi Umum";        
            $x['content'] = $this->load->view('kwitansi_umum/template_table',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'kasir.php/login?sid='.getSessionID();
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

        $limit = $this->perPage;
        $condition = "";
        if(isset($_POST['sLike'])){
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "AND (nomr LIKE '%$sLike%' OR id_daftar LIKE '%$sLike%' 
            OR nama_pasien LIKE '%$sLike%' OR no_kwitansi LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (nomr LIKE '%$sLike%' OR id_daftar LIKE '%$sLike%' 
                OR nama_pasien LIKE '%$sLike%' OR no_kwitansi LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT * FROM tbl05_kwitansi WHERE id_cara_bayar = 1 $condition 
        ORDER BY tgl_kwitansi DESC";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'kasir.php/kwitansi_umum/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);
        
        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('kwitansi_umum/getdata',$x);
    }    
    function cekRetur(){
        $no_kwitansi = (isset($_POST['no_kwitansi'])) ? $this->input->post('no_kwitansi',true) : "";
        $this->db->where('no_kwitansi',$no_kwitansi);
        $resQuery = $this->db->get('tbl05_kwitansi_retur');
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
            $z = setNav("nav_3");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            
            $this->db->where_in('profId',array('1','2'));
            $y['datDokter'] = $this->db->get('tbl01_pegawai');
            $y['contentTitle'] = "Kwitansi Umum";        
            $x['content'] = $this->load->view('kwitansi_umum/template_entry',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'kasir.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function getPasienDetail(){
        $keyword = $this->input->post('sText',true);
        $SQL = "SELECT * FROM tbl02_pasien_pulang WHERE id_daftar = '$keyword' 
        AND id_cara_bayar = 1";
        $cek = $this->db->query("$SQL");
        if ($cek->num_rows() > 0) {
            $x['code'] = 200;
            $x['response'] = $cek->row_array();
        }else{
            $x['code'] = 401;
            $x['response'] = "Ops. Data pasien tidak ditemukan/belum dipulangkan/bukan pasien umum.\nPeriksa kembali No.Registrasi RS Anda";
        }
        echo json_encode($x);
    }
    function getPasien(){
        $keyword = $this->input->post('keyword',true);
        $SQL = "SELECT * FROM tbl02_pasien_pulang WHERE id_cara_bayar = 1 AND
        (nomr LIKE '%$keyword%' OR nama_pasien LIKE '%$keyword%') 
        ORDER BY tgl_masuk DESC LIMIT 100";
        
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('kwitansi_umum/getpasien_cari',$x);
    }
    function getKwitansi(){
        $sText = $this->input->post('sText',true);
        $SQL_LAYANAN = "SELECT reg_unit AS idx,IFNULL(SUM(sub_total_tarif),0) as subTotal 
        FROM tbl03_nota_detail WHERE id_daftar = '$sText' 
        AND reg_unit NOT IN(SELECT kode_item FROM tbl05_kwitansi_detail 
        WHERE no_kwitansi NOT IN(SELECT no_kwitansi FROM tbl05_kwitansi_retur))
        GROUP BY reg_unit";
        $x['SQL_LAYANAN'] = $this->db->query("$SQL_LAYANAN");
        $this->load->view('kwitansi_umum/get_nota_layanan',$x);
        
        $SQL_FARMASI = "SELECT a.KDJL AS idx,b.NMLOKASI,SUM((a.SISA * a.HJUAL) - a.DISKON + a.R) AS subTotal 
        FROM tbl04_penjualan_detail a 
        LEFT JOIN tbl04_penjualan b ON a.KDJL=b.KDJL
        WHERE ID_DAFTAR = '$sText' AND SISA != 0
        AND a.KDJL NOT IN(SELECT kode_item FROM tbl05_kwitansi_detail 
        WHERE no_kwitansi NOT IN(SELECT no_kwitansi FROM tbl05_kwitansi_retur))
        GROUP BY a.KDJL";
        $x['SQL_FARMASI'] = $this->db->query("$SQL_FARMASI");
        $this->load->view('kwitansi_umum/get_nota_farmasi',$x);        
    }
    function getTotalTagihan(){
        $sText = $this->input->post('sText',true);
        $SQL_LAYANAN = "SELECT IFNULL(SUM(sub_total_tarif),0) AS totTagihan FROM tbl03_nota_detail 
        WHERE id_daftar = '$sText'
        AND reg_unit NOT IN(SELECT kode_item FROM tbl05_kwitansi_detail 
        WHERE no_kwitansi NOT IN(SELECT no_kwitansi FROM tbl05_kwitansi_retur))";
        $rsLayanan = $this->db->query("$SQL_LAYANAN")->row_array();
        $totLayanan = $rsLayanan['totTagihan'];
        
        
        $SQL_FARMASI = "SELECT SUM((a.SISA * a.HJUAL) - a.DISKON + a.R) AS totTagihan
        FROM tbl04_penjualan_detail a 
        LEFT JOIN tbl04_penjualan b ON a.KDJL=b.KDJL
        WHERE ID_DAFTAR = '$sText' AND SISA != 0
        AND a.KDJL NOT IN(SELECT kode_item FROM tbl05_kwitansi_detail 
        WHERE no_kwitansi NOT IN(SELECT no_kwitansi FROM tbl05_kwitansi_retur))";
        $rsFarmasi = $this->db->query("$SQL_FARMASI")->row_array();
        $totFarmasi = $rsFarmasi['totTagihan'];

        $totAllTagihan =  $totFarmasi + $totLayanan;
        echo $totAllTagihan;
    }

    
    function getLampiranKwitansi(){
        $no_kwitansi = $this->input->post('no_kwitansi',true);
        $SQL = "SELECT * FROM tbl05_kwitansi_detail WHERE no_kwitansi = '$no_kwitansi'";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('kwitansi_umum/getdata_lampiran',$x);
    }
    /**
    function getTotal(){
        $nomr = $this->input->post('nomr',true);
        $SQL = "SELECT IFNULL(SUM(grandTot),0) AS totkwitansi_umum FROM view_transaksi WHERE nomr = '$nomr' AND status_kwintansi NOT IN('Batal','Tutup')";
        $queryTot = $this->db->query("$SQL");
        $res = $queryTot->row_array();
        echo $res['totkwitansi_umum'];
    }
    **/
    
    function simpan_kwitansi(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['id_daftar']) &&
                    isset($_POST['nomr']) &&
                    isset($_POST['psNama']) &&
                    isset($_POST['psJenkel']) &&
                    isset($_POST['psTglLhr']) &&
                    isset($_POST['psUmur']) &&
                    isset($_POST['tgl_masuk']) &&
                    isset($_POST['tgl_keluar']) &&
                    isset($_POST['total_tagihan']) &&
                    isset($_POST['biaya_lainnya']) &&
                    isset($_POST['grand_total']) &&
                    isset($_POST['dpjp']) &&
                    isset($_POST['nama_dpjp']) &&
                    isset($_POST['id_cara_bayar']) &&
                    isset($_POST['cara_bayar']) &&
                    isset($_POST['items'])
                ){
                    $params = array(
                        'id_daftar'     => trim($this->input->post('id_daftar',true)),
                        'nomr'          => trim($this->input->post('nomr',true)),
                        'nama_pasien'   => trim($this->input->post('psNama',true)),
                        'jns_kelamin'   => trim($this->input->post('psJenkel',true)),
                        'tgl_lahir'     => setDateEng(trim($this->input->post('psTglLhr',true))),
                        'umur'          => trim($this->input->post('psUmur',true)),
                        'id_cara_bayar' => trim($this->input->post('id_cara_bayar',true)),
                        'cara_bayar'    => trim($this->input->post('cara_bayar',true)),
                        'tgl_masuk'     => setDateEng(trim($this->input->post('tgl_masuk',true))),
                        'tgl_keluar'    => setDateEng(trim($this->input->post('tgl_keluar',true))),
                        'dpjp'          => trim($this->input->post('dpjp',true)),
                        'nama_dpjp'     => trim($this->input->post('nama_dpjp',true)),
                        'total_tagihan' => str_replace(",","",trim($this->input->post('total_tagihan',true))),
                        'biaya_lainnya' => str_replace(",","",trim($this->input->post('biaya_lainnya',true))),
                        'grand_total'   => str_replace(",","",trim($this->input->post('grand_total',true))),
                        'userExec'      => getUserID(),
                        'session_id'    => getSessionID()
                    );

                    $paramsItem = $this->input->post('items',true);

                    if(
                        $params['id_daftar']=="" ||
                        $params['nomr']=="" ||
                        $params['nama_pasien']=="" ||
                        $params['jns_kelamin']=="" ||
                        $params['tgl_lahir']=="" ||
                        $params['umur']=="" ||
                        $params['id_cara_bayar']=="" ||
                        $params['cara_bayar']=="" ||
                        $params['tgl_masuk']=="" ||
                        $params['tgl_keluar']=="" ||
                        $params['dpjp']=="" ||
                        $params['nama_dpjp']=="" ||
                        $params['total_tagihan']=="" ||
                        $params['grand_total']==""
                    ){
                        $x['code'] = 401;
                        $x['message'] = "Ops. Masih ada data yang kosong. Silahkan lengkapi data.";
                    }elseif(date('Y-m-d',strtotime($params['tgl_masuk'])) > date('Y-m-d',strtotime($params['tgl_keluar']))){
                        $x['code'] = 402;
                        $x['message'] = "Tanggal pulang tidak boleh lebih awal dari tanggal masuk";
                    }elseif($params['total_tagihan']=="0" || $params['grand_total']=="0"){
                        $x['code'] = 403;
                        $x['message'] = "Ops. Total tagihan tidak boleh kosong.";
                    }else{
                        $this->db->insert('tbl05_kwitansi',$params);
                        $qGetKwintansi = "SELECT * FROM tbl05_kwitansi 
                        WHERE session_id = '$params[session_id]' ORDER BY idx DESC LIMIT 1";
                        $getNK = $this->db->query("$qGetKwintansi");
                        $resNK = $getNK->row_array();
                        
                        for($i=0; $i < count($paramsItem); $i++){
                            $item = explode("##",$paramsItem[$i]);
                            $itemDetail = array(
                                'no_kwitansi' => $resNK['no_kwitansi'],
                                'kode_item' => $item[0],
                                'kode_unit' => $item[1],
                                'nama_unit' => $item[2],
                                'total_item' => $item[3],
                                'jenis_item' => $item[4]
                            );
                            $this->db->insert('tbl05_kwitansi_detail',$itemDetail);   
                        }

                        $x['code'] = 200;
                        $x['message'] = $resNK['no_kwitansi'];
                    }
                }else{
                    $x['code'] = 404;
                    $x['message'] = "Ops. Variable tidak ditemukan/Data belum lengkap.\nCoba ulangi kembali.";
                }
            }else{
                $x['code'] = 404;
                $x['message'] = "Ops. Method tidak ditemukan.\nCoba ulangi kembali.";
            }
        }else{
            $x['code'] = 404;
            $x['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
        }    
        echo json_encode($x);
    }

    function returKwitansi(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['no_kwitansi']) &&
                    isset($_POST['alasan_retur'])
                ){
                    $params = array(
                        'no_kwitansi' => trim($this->input->post('no_kwitansi',true)),
                        'alasan' => trim($this->input->post('alasan_retur',true))            
                    );
                    if(
                        $params['no_kwitansi']=="" ||
                        $params['alasan']==""
                    ){
                        $x['code'] = 401;
                        $x['message'] = "Ops. Masih ada data yang kosong. Silahkan lengkapi data.";
                    }else{
                        $cek = $this->db->insert('tbl05_kwitansi_retur',$params);
                        if ($cek) {
                            $x['code'] = 200;
                            $x['message'] = "Faktur Sukses Di Retur";                
                        }else{
                            $x['code'] = 402;
                            $x['message'] = "Query retur tidak sukses. Silahkan coba kembali.";                
                        }                         
                    }
                }else{
                    $x['code'] = 403;
                    $x['message'] = "Ops. Variable tidak ditemukan.\nCoba ulangi kembali.";
                }
            }else{
                $x['code'] = 404;
                $x['message'] = "Ops. Method tidak ditemukan.\nCoba ulangi kembali.";
            }       
        }else{
            $x['code'] = 405;
            $x['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
        }
        echo json_encode($x);
    }

    function cetak_kwitansi(){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            if(isset($_GET['kode'])){
                $kode = $_GET['kode'];
                if ($kode=="") {
                    echo "<script>alert('Ops. No. Invoice tidak boleh kosong');
                    window.close();</script>";
                }else{
                    $this->db->where('no_kwitansi',$kode);
                    $cek = $this->db->get('tbl05_kwitansi');
                    if($cek->num_rows() > 0){
                        $x = $cek->row_array();

                        $this->db->where('no_kwitansi',$kode);
                        $x['datDetail'] = $this->db->get('tbl05_kwitansi_detail');
                        $this->load->view('kwitansi_umum/invoice',$x);
                    }else{
                        echo "<script>alert('Ops. No. Invoice $kode tidak ditemukan');
                        window.close();</script>";
                    }
                }
            }else{
                echo "<script>alert('Ops. Variable tidak ditemukan');
                window.close();</script>";
            }
        }else{
            echo "<script>alert('Ops. Method tidak diizinkan');
            window.close();</script>";
        }
    } 
    function cetakLayanan(){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            if(isset($_GET['kode'])){
                $kode = $_GET['kode'];
                if ($kode=="") {
                    echo "<script>alert('Ops. No. Transaksi tidak boleh kosong');
                    window.close();</script>";
                }else{
                    $this->db->where('kode_item',$kode);
                    $cek = $this->db->get('tbl05_kwitansi_detail');
                    if($cek->num_rows() > 0){
                        $x = $cek->row_array();

                        $this->db->where('kode_item',$kode);
                        $x['datDetail'] = $this->db->get('tbl05_kwitansi_detail_item');
                        $this->load->view('kwitansi_umum/print_layanan',$x);
                    }else{
                        echo "<script>alert('Ops. No. Transaksi $kode tidak ditemukan');
                        window.close();</script>";
                    }
                }
            }else{
                echo "<script>alert('Ops. Variable tidak ditemukan');
                window.close();</script>";
            }
        }else{
            echo "<script>alert('Ops. Method tidak diizinkan');
            window.close();</script>";
        }
    }
    function cetakFarmasi(){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            if(isset($_GET['kode'])){
                $kode = $_GET['kode'];
                if ($kode=="") {
                    echo "<script>alert('Ops. No. Transaksi tidak boleh kosong');
                    window.close();</script>";
                }else{
                    $this->db->where('kode_item',$kode);
                    $cek = $this->db->get('tbl05_kwitansi_detail');
                    if($cek->num_rows() > 0){
                        $x = $cek->row_array();

                        $this->db->where('kode_item',$kode);
                        $x['datDetail'] = $this->db->get('tbl05_kwitansi_detail_item');
                        $this->load->view('kwitansi_umum/print_farmasi',$x);
                    }else{
                        echo "<script>alert('Ops. No. Transaksi $kode tidak ditemukan');
                        window.close();</script>";
                    }
                }
            }else{
                echo "<script>alert('Ops. Variable tidak ditemukan');
                window.close();</script>";
            }
        }else{
            echo "<script>alert('Ops. Method tidak diizinkan');
            window.close();</script>";
        }
    }
}
