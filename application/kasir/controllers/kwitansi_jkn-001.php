<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class kwitansi_jkn extends CI_Controller {
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
            $z = setNav("nav_4");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            
            $y['contentTitle'] = "Kwitansi BPJS";        
            $x['content'] = $this->load->view('kwitansi_jkn/template_table',$y,true);
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
            $condition .= "AND (nomr LIKE '%$sLike%' OR id_daftar LIKE '%$sLike%' OR psNama LIKE '%$sLike%' OR no_kwintansi LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);
            
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (nomr LIKE '%$sLike%' OR id_daftar LIKE '%$sLike%' OR psNama LIKE '%$sLike%' OR no_kwintansi LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT * FROM tbl05_kwitansi WHERE status_kwintansi = 0 
        AND cara_bayar = 2 $condition 
        ORDER BY tgl_kwitansi DESC";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getData';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'kasir.php/kwitansi_jkn/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);
        
        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('kwitansi_jkn/getdata',$x);
    }    
    public function tambah(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_4");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            

            $this->db->where_in('profId',array('1','2'));
            $y['datDokter'] = $this->db->get('tbl01_pegawai');
            $y['contentTitle'] = "Kwitansi BPJS";        
            $x['content'] = $this->load->view('kwitansi_jkn/template_entry',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'kasir.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function getPasienDetail(){
        $keyword = $this->input->post('sText',true);
        $SQL = "SELECT a.*,b.nama,b.jns_kelamin,b.tgl_lahir FROM tbl02_pendaftaran a
        LEFT JOIN tbl01_pasien b ON a.nomr=b.nomr
        WHERE id_daftar = '$keyword' GROUP BY id_daftar";
        $SQL = $this->db->query("$SQL")->row_array();
        echo json_encode($SQL);
    }
    function getPasien(){
        $keyword = $this->input->post('keyword',true);
        $SQL = "SELECT a.*,b.nama,b.jns_kelamin,b.tgl_lahir,b.alamat FROM tbl02_pendaftaran a
        LEFT JOIN tbl01_pasien b ON a.nomr=b.nomr
        WHERE a.nomr LIKE '%$keyword%' OR b.nama LIKE '%$keyword%' 
        GROUP BY a.id_daftar ORDER BY a.tgl_masuk DESC LIMIT 100";
        
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('kwitansi_jkn/getpasien_cari',$x);
    }
    function getKwitansi(){
        $sText = $this->input->post('sText',true);
        $SQL_LAYANAN = "SELECT a.*,b.nama,SUM(c.sub_total_tarif) AS subTotal FROM tbl03_nota a 
        LEFT JOIN tbl01_pasien b ON a.nomr=b.nomr
        LEFT JOIN tbl03_nota_detail c ON a.id_nota=c.id_nota
        WHERE a.id_daftar IN (
        SELECT id_daftar FROM tbl02_pendaftaran WHERE id_daftar = '$sText' AND id_daftar NOT IN('1')) 
        AND status_batal NOT IN('1') 
        AND a.id_nota NOT IN(
        SELECT id_nota FROM tbl05_kwitansi_detail 
        WHERE no_kwintansi NOT IN(SELECT no_kwintansi FROM tbl05_kwitansi_retur))
        GROUP BY a.id_nota";
        $x['SQL_LAYANAN'] = $this->db->query("$SQL_LAYANAN");
        $this->load->view('kwitansi_jkn/get_nota_layanan',$x);
        
        
        $SQL_FARMASI = "SELECT a.KDJL,b.DTJL,b.KDLOKASI,c.NMLOKASI,b.nomr,b.ID_DAFTAR,
        SUM((a.SISA * a.HJUAL) - a.DISKON + a.R) AS GRANDTOT 
        FROM tbl04_penjualan_detail a 
        LEFT JOIN tbl04_penjualan b ON a.KDJL=b.KDJL
        LEFT JOIN tbl04_lokasi c ON b.KDLOKASI=c.KDLOKASI
        WHERE ID_DAFTAR IN (
        SELECT id_daftar FROM tbl02_pendaftaran WHERE id_daftar = '$sText' AND id_daftar NOT IN('1')) 
        AND ID_DAFTAR != '' AND SISA != 0
        AND a.KDJL NOT IN(
        SELECT id_nota FROM tbl05_kwitansi_detail 
        WHERE no_kwintansi NOT IN(SELECT no_kwintansi FROM tbl05_kwitansi_retur))
        GROUP BY a.KDJL";
        $x['SQL_FARMASI'] = $this->db->query("$SQL_FARMASI");
        $this->load->view('kwitansi_jkn/get_nota_farmasi',$x);        
    }
    function getLampiranKwitansi(){
        $no_kwintansi = $this->input->post('no_kwintansi',true);
        $SQL = "SELECT a.*,b.id_daftar FROM tbl05_kwitansi_detail a
        LEFT JOIN tbl05_kwitansi b ON a.no_kwintansi=b.no_kwintansi
        WHERE a.no_kwintansi = '$no_kwintansi' ORDER BY a.no_kwintansi";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('kwitansi_jkn/getdata_lampiran',$x);
    }
    function getTotal(){
        $nomr = $this->input->post('nomr',true);
        $SQL = "SELECT IFNULL(SUM(grandTot),0) AS totkwitansi_jkn FROM view_transaksi WHERE nomr = '$nomr' AND status_kwintansi NOT IN('Batal','Tutup')";
        $queryTot = $this->db->query("$SQL");
        $res = $queryTot->row_array();
        echo $res['totkwitansi_jkn'];
    }
    
    function simpan_kwitansi(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $id_daftar = $this->input->post('id_daftar',true);
            $nomr = $this->input->post('nomr',true);
            $cara_bayar = 2;
            $dpjp = $this->input->post('dpjp',true);
            $tgl_masuk = $this->input->post('tgl_masuk',true);
            $tgl_keluar = $this->input->post('tgl_keluar',true);
            $total_tagihan = $this->input->post('total_tagihan',true);
            $biaya_lainnya = $this->input->post('biaya_lainnya',true);
            $grand_total = $this->input->post('grand_total',true);
            $tot_tanggungan_jasa_raharja = $this->input->post('tot_tanggungan_jasa_raharja',true);
            $tot_tanggungan_pasien = $this->input->post('tot_tanggungan_pasien',true);
            $userExec = $this->session->userdata('get_uid');

            if($id_daftar==""){
                $params = array(
                    'code'    => 201,
                    'message' => 'No.Registrasi RS tidak ditemukan'
                );
            }elseif($nomr==""){
                $params = array(
                    'code'    => 201,
                    'message' => 'Data pasien tidak ditemukan'
                );
            }elseif($dpjp==""){
                $params = array(
                    'code'    => 201,
                    'message' => 'DPJP belum dipilih'
                );
            }elseif($tgl_masuk==""){
                $params = array(
                    'code'    => 201,
                    'message' => 'Tanggal Masuk tidak boleh kosong'
                );
            }elseif($tgl_keluar==""){
                $params = array(
                    'code'    => 201,
                    'message' => 'Tanggal Pulang tidak boleh kosong'
                );
            }elseif(! preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",setDateEng($tgl_masuk))){
                $params = array(
                    'code'    => 201,
                    'message' => 'Format Tanggal Masuk Salah'.chr(10).'Format yang benar : Tanggal-Bulan-Tahun'.chr(10).'Contoh : 31-12-2018'
                );
            }elseif(! preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",setDateEng($tgl_keluar))){
                $params = array(
                    'code'    => 201,
                    'message' => 'Format Tanggal Pulang Salah'.chr(10).'Format yang benar : Tanggal-Bulan-Tahun'.chr(10).'Contoh : 31-12-2018'
                );
            }elseif(date('Y-m-d',strtotime($tgl_masuk)) > date('Y-m-d',strtotime($tgl_keluar))){
                $params = array(
                    'code'    => 201,
                    'message' => 'Tanggal pulang tidak boleh lebih awal dari tanggal masuk'
                );
            }elseif($total_tagihan=="" || $total_tagihan=="0"){
                $params = array(
                    'code'    => 201,
                    'message' => 'Total tagihan tidak boleh kosong'
                );
            }elseif($grand_total=="" || $grand_total=="0"){
                $params = array(
                    'code'    => 201,
                    'message' => 'Total kwitansi tidak boleh kosong'
                );
            }else{
                $data = array(
                    'id_daftar' => $id_daftar,
                    'nomr' => $nomr,
                    'cara_bayar' => $cara_bayar,
                    'dpjp' => $dpjp,
                    'tgl_masuk' => setDateEng($tgl_masuk),
                    'tgl_keluar' => setDateEng($tgl_keluar),
                    'total_tagihan' => str_replace('.','',$total_tagihan),
                    'biaya_lainnya' => str_replace('.','',$biaya_lainnya),
                    'grand_total' => str_replace('.','',$grand_total),
                    'tot_tanggungan_jasa_raharja' => str_replace('.','',$tot_tanggungan_jasa_raharja),
                    'tot_tanggungan_pasien' => str_replace('.','',$tot_tanggungan_pasien),
                    'userExec' => $userExec,
                    'session_id' => session_id()
                );
                $this->db->insert('tbl05_kwitansi',$data);
                $getNK = $this->db->query("SELECT * FROM tbl05_kwitansi WHERE session_id = '".session_id()."' ORDER BY idx DESC LIMIT 1");
                $resNK = $getNK->row_array();
                
                for($i=0; $i < count($_POST['kode']); $i++){
                    $item = explode("##",$_POST['kode'][$i]);
                    $dataDetail = array(
                        'no_kwintansi' => $resNK['no_kwintansi'],
                        'id_nota' => $item[0],
                        'total_nota' => $item[1],
                        'jenis_nota' => $item[2]
                    );
                    $this->db->insert('tbl05_kwitansi_detail',$dataDetail);   
                }
                $params = array(
                    'code'    => 200,
                    'message' => $resNK['no_kwintansi']
                );           
            }
        }else{
            $params = array(
                'code'    => 401,
                'message' => 'Sesi anda telah habis. Silahkan login kembali'
            );
        }
        echo json_encode($params);
    }

    function returKwitansi(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $no_kwintansi = $_POST['no_kwintansi'];
            $alasan_retur = $_POST['alasan_retur'];
            $data = array(
                'no_kwintansi' => $no_kwintansi,
                'alasan' => $alasan_retur                
            );
            $this->db->insert('tbl05_kwitansi_retur',$data);
            $params = array(
                'code'    => 200,
                'message' => 'Faktur Sukses Di Retur'
            );
        }else{
            $params = array(
                'code'    => 401,
                'message' => 'Sesi anda telah habis. Silahkan login kembali'
            );
        }
        echo json_encode($params);
    }

    function cetak_kwitansi(){
        $no_kwintansi = $this->uri->segment(3);
        $this->db->where('no_kwintansi',$no_kwintansi);
        $cekMain = $this->db->get('tbl05_kwitansi');
        if($cekMain->num_rows() > 0){
            $resMain = $cekMain->row_array();
            $x['no_kwintansi'] = $resMain['no_kwintansi'];
            $x['tgl_kwitansi'] = $resMain['tgl_kwitansi'];
            $x['id_daftar'] = $resMain['id_daftar'];
            $x['nomr'] = $resMain['nomr'];
            $x['cara_bayar'] = $resMain['cara_bayar'];
            $x['dpjp'] = $resMain['dpjp'];
            $x['tgl_masuk'] = $resMain['tgl_masuk'];
            $x['tgl_keluar'] = $resMain['tgl_keluar'];
            $x['total_tagihan'] = $resMain['total_tagihan'];
            $x['biaya_lainnya'] = $resMain['biaya_lainnya'];
            $x['grand_total'] = $resMain['grand_total'];
            $x['tot_tanggungan_jasa_raharja'] = $resMain['tot_tanggungan_jasa_raharja'];
            $x['tot_tanggungan_pasien'] = $resMain['tot_tanggungan_pasien'];
            $x['status_kwintansi'] = $resMain['status_kwintansi'];
            
            $this->db->where('no_kwintansi',$no_kwintansi);
            $x['datDetail'] = $this->db->get('tbl05_kwitansi_detail');

            $this->load->view('kwitansi_jkn/invoice',$x);
        }else{
            echo "<script>
                alert('Maaf! ada yang tidak beres.\\nCek kembali data anda');
                window.close();
            </script>";
        }
    } 
    
    function cetak_farmasi(){
        $KDJL = (isset($_GET['kode'])) ? $_GET['kode'] : ""; 
        $SQL_MAIN = "SELECT a.*,b.ruang AS NMRUANGAN,c.NMLOKASI 
        FROM tbl04_penjualan a 
        LEFT JOIN tbl01_ruang b ON a.KDRUANGAN=b.idx
        LEFT JOIN tbl04_lokasi c ON a.KDLOKASI=c.KDLOKASI
        WHERE KDJL = '$KDJL'";
        $cek = $this->db->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $res = $cek->row_array();
            $x['KDJL'] = $res['KDJL'];
            $x['ID_DAFTAR'] = $res['ID_DAFTAR'];
            $x['REG_UNIT'] = $res['REG_UNIT'];
            $x['DTJL'] = $res['DTJL'];
            $x['NOMR'] = $res['NOMR'];
            $x['NMPASIEN'] = $res['NMPASIEN'];
            $x['ALMTPASIEN'] = $res['ALMTPASIEN'];
            $x['KDRUANGAN'] = $res['KDRUANGAN'];
            $x['NMRUANGAN'] = $res['NMRUANGAN'];

            $x['NORESEP'] = $res['NORESEP'];
            $x['TGLRESEP'] = $res['TGLRESEP'];
            $x['KDJPASIEN'] = $res['KDJPASIEN'];
            $x['KDDOKTER'] = $res['KDDOKTER'];
            $x['KDPELAYANAN'] = $res['KDPELAYANAN'];
            $x['KDLOKASI'] = $res['KDLOKASI'];
            $x['NMLOKASI'] = $res['NMLOKASI'];
            
            $x['GRANDTOT'] = $res['GRANDTOT'];
            $x['KETJL'] = $res['KETJL'];

            $SQL = "SELECT a.KDBRG,b.NMBRG,c.NMSATUAN,a.HJUAL,a.SISA,
            a.DISKON,a.R
            FROM tbl04_penjualan_detail a 
            LEFT JOIN tbl04_barang b ON a.KDBRG=b.KDBRG 
            LEFT JOIN tbl04_satuan c ON b.KDSATUAN=c.KDSATUAN 
            WHERE KDJL = '$KDJL' GROUP BY a.KDBRG ORDER BY NMBRG";
            $x['dataPreview'] = $this->db->query("$SQL");
            $this->load->view('cetak/print_preview',$x);

        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                history.back();
            </script>";
        }            
    }
       
}
