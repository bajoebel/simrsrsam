<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Eklaim extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('users_model');
        $this->load->helper('Eklaim');
        $this->load->helper('Vclaim');
    }
    function isJSON($string){
       return is_string($string) && is_array(json_decode($string, true)) && (json_last_error()==JSON_ERROR_NONE) ? true : false;
    }
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_5");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['index_menu'] = 5;
            $y['contentTitle'] = "SIMRS-EKlaim";        
            $x['content'] = $this->load->view('eklaim/template_table',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'mr_dokumen.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function getKunjungan(){
        $keyword = (isset($_POST['keyword'])) ? $this->input->post('keyword',true) : "";

        $SQL = "SELECT * FROM tbl05_kwitansi WHERE 
        (no_kwitansi LIKE '%$keyword%' 
        OR id_daftar LIKE '%$keyword%' 
        OR nomr LIKE '%$keyword%' 
        OR nama_pasien LIKE '%$keyword%' 
        OR no_bpjs LIKE '%$keyword%' 
        OR no_sep LIKE '%$keyword%') 
        AND id_cara_bayar IN(SELECT idx FROM tbl01_cara_bayar WHERE jkn=1)
        AND no_kwitansi NOT IN(SELECT no_kwitansi FROM tbl05_kwitansi_retur)";
        $x['SQL'] = $this->db->query("$SQL LIMIT 10");
        $this->load->view('eklaim/getdata',$x);
    }

    function getItemICD(){
        $no_sep = (isset($_POST['no_sep'])) ? $this->input->post('no_sep',true) : "";
        $SQL = "SELECT * FROM tbl07_icd_temp WHERE no_sep='$no_sep' ORDER BY icd_index DESC";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('eklaim/getdata_icd',$x);        
    }
    function deleteItemICD(){
        $idx = (isset($_POST['idx'])) ? $this->input->post('idx',true) : "";
        $datArr = explode('^', $idx);
        $no_sep = $datArr[0];
        $icd_cd = $datArr[1];
        $icd_index = $datArr[2];

        $SQL_Delete = "DELETE FROM tbl07_icd_temp WHERE no_sep='$no_sep' AND icd_cd='$icd_cd'";
        $this->db->query("$SQL_Delete");

        if ($icd_index=='1') {
            $SQL_Update_Sekunder = "UPDATE tbl07_icd_temp SET icd_index='0' WHERE no_sep='$no_sep'";
            $this->db->query("$SQL_Update_Sekunder");
            
            $SQL_Update_Primer = "UPDATE tbl07_icd_temp SET icd_index='1' WHERE no_sep='$no_sep' ORDER BY icd_index DESC LIMIT 1";
            $this->db->query("$SQL_Update_Primer");
        }

        $SQL = "SELECT * FROM tbl07_icd_temp WHERE no_sep='$no_sep' ORDER BY icd_index DESC";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('eklaim/getdata_icd',$x);                
    }
    function simpanICD(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(
                isset($_POST['no_sep']) &&
                isset($_POST['icd_cd']) &&
                isset($_POST['icd_desc'])
            ){
                $params['no_sep'] = $this->input->post('no_sep',true);
                $params['icd_cd'] = $this->input->post('icd_cd',true);
                $params['icd_desc'] = $this->input->post('icd_desc',true);

                if(
                    $params['no_sep'] !== "" || 
                    $params['icd_cd'] !=="" || 
                    $params['icd_desc'] !==""
                ){
                    $this->db->where('no_sep',$params['no_sep']);
                    $getCount = $this->db->get('tbl07_icd_temp');
                    if ($getCount->num_rows() > 0) {
                        $params['icd_index'] = 0;
                    }else{
                        $params['icd_index'] = 1;
                    }

                    $insert_query = $this->db->insert_string('tbl07_icd_temp', $params);
                    $insert_query = str_replace('INSERT INTO','INSERT IGNORE INTO',$insert_query);
                    $cek = $this->db->query($insert_query);

                    if ($cek) {
                        $x['code'] = 200;
                        $x['message'] = "OK";
                    }else{
                        $x['code'] = 401;
                        $x['message'] = "Insert Error";
                    }
                }else{
                    $x['code'] = 402;
                    $x['message'] = "Variable masih ada yang kosong";
                }
            }else{
                $x['code'] = 403;
                $x['message'] = "Variable tidak diketahui";
            }
        }else{
            $x['code'] = 404;
            $x['message'] = "Method tidak diketahui";
        }
        echo json_encode($x);
    }

    function getItemProcedure(){
        $no_sep = (isset($_POST['no_sep'])) ? $this->input->post('no_sep',true) : "";
        $SQL = "SELECT * FROM tbl07_proc_temp WHERE no_sep='$no_sep'";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('eklaim/getdata_procedure',$x);        
    }
    function deleteItemProcedure(){
        $idx = (isset($_POST['idx'])) ? $this->input->post('idx',true) : "";
        $datArr = explode('^', $idx);
        $no_sep = $datArr[0];
        $proc_cd = $datArr[1];

        $SQL_Delete = "DELETE FROM tbl07_proc_temp WHERE no_sep='$no_sep' AND proc_cd='$proc_cd'";
        $this->db->query("$SQL_Delete");

        $SQL = "SELECT * FROM tbl07_proc_temp WHERE no_sep='$no_sep'";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('eklaim/getdata_procedure',$x);                
    }
    function simpanProcedure(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(
                isset($_POST['no_sep']) &&
                isset($_POST['proc_cd']) &&
                isset($_POST['proc_desc'])
            ){
                $params['no_sep'] = $this->input->post('no_sep',true);
                $params['proc_cd'] = $this->input->post('proc_cd',true);
                $params['proc_desc'] = $this->input->post('proc_desc',true);

                if(
                    $params['no_sep'] !== "" || 
                    $params['proc_cd'] !=="" || 
                    $params['proc_desc'] !==""
                ){
                    $insert_query = $this->db->insert_string('tbl07_proc_temp', $params);
                    $insert_query = str_replace('INSERT INTO','INSERT IGNORE INTO',$insert_query);
                    $cek = $this->db->query($insert_query);

                    if ($cek) {
                        $x['code'] = 200;
                        $x['message'] = "OK";
                    }else{
                        $x['code'] = 401;
                        $x['message'] = "Insert Error";
                    }
                }else{
                    $x['code'] = 402;
                    $x['message'] = "Variable masih ada yang kosong";
                }
            }else{
                $x['code'] = 403;
                $x['message'] = "Variable tidak diketahui";
            }
        }else{
            $x['code'] = 404;
            $x['message'] = "Method tidak diketahui";
        }
        echo json_encode($x);
    }

    function cariSEP(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1'])){
                $param1 = $this->input->post('param1',true); // Nomor SEP
                if($param1 !== ""){
                    $response = cariSEP($param1); 
                }else{
                    $x['metaData']['code'] = 201;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            }else{
                $x['metaData']['code'] = 201;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }
    function new_claim_post(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(
                isset($_POST['no_kwitansi']) && 
                isset($_POST['noKartu']) && 
                isset($_POST['noSep']) && 
                isset($_POST['noMr']) && 
                isset($_POST['nama']) && 
                isset($_POST['tglLahir']) && 
                isset($_POST['gender'])
            ){
                $no_kwitansi = $this->input->post('no_kwitansi',true);
                $noKartu = $this->input->post('noKartu',true);
                $noSep = $this->input->post('noSep',true);
                $noMr = $this->input->post('noMr',true);
                $nama = $this->input->post('nama',true);
                $tgl_lahir = date('Y-m-d H:i:s',strtotime($this->input->post('tglLahir',true)));
                $gender = ($this->input->post('gender',true)=="L") ? 1 : 2;

                if(
                    $no_kwitansi !== "" || 
                    $nomor_kartu !== "" || 
                    $nomor_sep !== "" || 
                    $nomor_rm !== "" || 
                    $nama_pasien !== "" || 
                    $tgl_lahir !== "" || 
                    $gender !== ""
                ){
                    // cek Klaim;
                    $x['metadata']['method'] = "get_claim_data";
                    $x['data']['nomor_sep']= $noSep;

                    $cek_klaim = initJSON(json_encode($x));                    
                    $decodeCK = json_decode($cek_klaim,true);                    
                    if ($decodeCK['metadata']['code'] == 200) {
                        if (
                            $decodeCK['response']['data']['nomor_rm'] !== $noMr ||
                            $decodeCK['response']['data']['nomor_kartu'] !== $noKartu
                        ) {
                            $arr_msg['metadata']['code'] = 900;
                            $arr_msg['metadata']['message'] = 'No.MR atau No.Kartu tidak sama dengan No.MR atau No.Kartu pada data klaim';
                            $response = json_encode($arr_msg);
                        }else{
                            $response = $cek_klaim;
                        }
                    }else{
                        // Create Claim
                        $y['metadata']['method'] = "new_claim";
                        $y['data']['nomor_kartu']= $noKartu;
                        $y['data']['nomor_sep']= $noSep;
                        $y['data']['nomor_rm']= $noMr;
                        $y['data']['nama_pasien']= $nama;
                        $y['data']['tgl_lahir']= $tgl_lahir;
                        $y['data']['gender']= $gender;
                        $response = initJSON(json_encode($y));  
                    }
                }else{
                    $x['metaData']['code'] = 401;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            }else{
                $x['metaData']['code'] = 402;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 403;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }
    function clearDiagnosa(){
        $noSEP = $this->input->post('noSEP',true);
        $cmd = $this->db->query("DELETE FROM tbl07_icd_temp WHERE no_sep = '$noSEP'");
        if ($cmd) {
            echo $noSEP;
        }else{
            echo "Query tidak dapat diproses";
        }
    }
    function clearProcedure(){
        $noSEP = (isset($_POST['noSEP'])) ? $this->input->post('noSEP',true) : '';
        $query = "DELETE FROM tbl07_proc_temp WHERE no_sep = '$noSEP'";
        $cmd = $this->db->query("$query");
        if ($cmd) {
            echo "Sukses";
        }else{
            echo "Query tidak dapat diproses";
        }
    }    
    function createClaim(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if (
                    isset($_GET['no_kwitansi']) &&
                    isset($_GET['noSep']) &&
                    isset($_GET['noMr']) &&
                    isset($_GET['nama']) &&
                    isset($_GET['noKartu']) &&
                    isset($_GET['tglLahir']) &&
                    isset($_GET['gender'])
                ) {
                    $params = $_GET;
                    $this->db->where('no_kwitansi',$params['no_kwitansi']);
                    $this->db->where('no_bpjs',$params['noKartu']);
                    $this->db->where('no_sep',$params['noSep']);
                    $cek = $this->db->get('tbl05_kwitansi');
                    if ($cek->num_rows() > 0) {
                        $x['header'] = $this->load->view('template/header','',true);
                        $z = setNav("nav_5");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                        $y['contentTitle'] = "Klaim"; 
                        $arrIndex = array("noMr"=>$params['noMr']);   
                        $y['data'] = array_merge($arrIndex,$cek->row_array());   

                        $this->db->where_in('profId',['1','2']);   
                        $y['datDokter'] = $this->db->get('tbl01_pegawai');   
                        $y['datCOB'] = $this->db->get('tbl07_cob');   
                        
                        $qGetKwitansi = "SELECT a.*,DATEDIFF(tgl_masuk,tgl_keluar)+1 AS LOS FROM tbl05_kwitansi a WHERE no_kwitansi='$params[no_kwitansi]'";
                        $y['datKwitansi'] = $this->db->query("$qGetKwitansi")->row_array();   

                        $qItem = "SELECT 
                        SUM(IF(kategori_id=1,IFNULL(sub_total_item,0),0)) AS KT01,
                        SUM(IF(kategori_id=2,IFNULL(sub_total_item,0),0)) AS KT02,
                        SUM(IF(kategori_id=3,IFNULL(sub_total_item,0),0)) AS KT03,
                        SUM(IF(kategori_id=4,IFNULL(sub_total_item,0),0)) AS KT04,
                        SUM(IF(kategori_id=5,IFNULL(sub_total_item,0),0)) AS KT05,
                        SUM(IF(kategori_id=6,IFNULL(sub_total_item,0),0)) AS KT06,
                        SUM(IF(kategori_id=7,IFNULL(sub_total_item,0),0)) AS KT07,
                        SUM(IF(kategori_id=8,IFNULL(sub_total_item,0),0)) AS KT08,
                        SUM(IF(kategori_id=9,IFNULL(sub_total_item,0),0)) AS KT09,
                        SUM(IF(kategori_id=10,IFNULL(sub_total_item,0),0)) AS KT10,
                        SUM(IF(kategori_id=11,IFNULL(sub_total_item,0),0)) AS KT11,
                        SUM(IF(kategori_id=12,IFNULL(sub_total_item,0),0)) AS KT12,
                        SUM(IF(kategori_id=13,IFNULL(sub_total_item,0),0)) AS KT13,
                        SUM(IF(kategori_id=14,IFNULL(sub_total_item,0),0)) AS KT14,
                        SUM(IF(kategori_id=15,IFNULL(sub_total_item,0),0)) AS KT15,
                        SUM(IF(kategori_id=16,IFNULL(sub_total_item,0),0)) AS KT16,
                        SUM(IF(kategori_id=17,IFNULL(sub_total_item,0),0)) AS KT17,
                        SUM(IF(kategori_id=18,IFNULL(sub_total_item,0),0)) AS KT18
                        FROM tbl05_kwitansi_detail_item WHERE no_kwitansi='$params[no_kwitansi]' 
                        GROUP BY no_kwitansi ASC";
                        
                        $y['datDetailKwitansi'] = $this->db->query("$qItem")->row_array();

                        $x['content'] = $this->load->view('eklaim/template_entry',$y,true);
                        $this->load->view('template/theme',$x);                        
                    }else{
                        echo "<script>alert('Ops. Data tidak ditemukan pada transaksi kasir. Periksa kembali data anda.');
                        window.history.back();</script>";
                    }
                }else{
                    echo "<script>alert('Ops. Variable tidak lengkap. Silahkan coba kembali');
                    window.history.back();</script>";
                }
            }else{
                echo "<script>alert('Ops. Method tidak diizinkan. Silahkan coba kembali');
                window.history.back();</script>";
            }
        }else{
            $url_login = base_url().'mr_dokumen.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    
    function set_claim_data(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(
                isset($_POST['nomor_sep']) && 
                isset($_POST['nomor_kartu']) && 
                isset($_POST['tgl_masuk']) && 
                isset($_POST['tgl_pulang']) && 
                isset($_POST['jenis_rawat']) && 
                isset($_POST['kelas_rawat']) && 
                isset($_POST['adl_sub_acute']) && 
                isset($_POST['adl_chronic']) && 
                isset($_POST['icu_indikator']) && 
                isset($_POST['icu_los']) && 
                isset($_POST['ventilator_hour']) && 
                isset($_POST['upgrade_class_ind']) && 
                isset($_POST['upgrade_class_class']) && 
                isset($_POST['upgrade_class_los']) && 
                isset($_POST['add_payment_pct']) && 
                isset($_POST['birth_weight']) && 
                isset($_POST['discharge_status']) && 
                isset($_POST['diagnosa']) && 
                isset($_POST['procedure']) && 
                isset($_POST['prosedur_non_bedah']) && 
                isset($_POST['prosedur_bedah']) && 
                isset($_POST['konsultasi']) && 
                isset($_POST['tenaga_ahli']) && 
                isset($_POST['keperawatan']) && 
                isset($_POST['penunjang']) && 
                isset($_POST['radiologi']) && 
                isset($_POST['laboratorium']) && 
                isset($_POST['pelayanan_darah']) && 
                isset($_POST['rehabilitasi']) && 
                isset($_POST['kamar']) && 
                isset($_POST['rawat_intensif']) && 
                isset($_POST['obat']) && 
                isset($_POST['obat_kronis']) && 
                isset($_POST['obat_kemoterapi']) && 
                isset($_POST['alkes']) && 
                isset($_POST['bmhp']) && 
                isset($_POST['sewa_alat']) && 
                isset($_POST['tarif_poli_eks']) && 
                isset($_POST['nama_dokter']) && 
                isset($_POST['payor_id']) && 
                isset($_POST['payor_cd']) && 
                isset($_POST['cob_cd'])
            ){
                $noSEP = $this->input->post('nomor_sep',true);

                $qDiagData = "SELECT IFNULL(REPLACE(GROUP_CONCAT(icd_cd ORDER BY icd_index DESC),',','#'),'#') AS icd_cd 
                FROM tbl07_icd_temp WHERE no_sep = '$noSEP'";
                $resDiagData = $this->db->query($qDiagData)->row_array();

                $qProcData = "SELECT IFNULL(REPLACE(GROUP_CONCAT(proc_cd),',','#'),'#') AS proc_cd 
                FROM tbl07_proc_temp WHERE no_sep = '$noSEP'";
                $resProcData = $this->db->query($qProcData)->row_array();

                $y['metadata']['method'] = "set_claim_data";
                $y['metadata']['nomor_sep'] = $this->input->post('nomor_sep',true);

                $y['data']['nomor_sep'] = $this->input->post('nomor_sep',true);
                $y['data']['nomor_kartu'] = $this->input->post('nomor_kartu',true);
                $y['data']['tgl_masuk'] = trim($this->input->post('tgl_masuk',true));
                $y['data']['tgl_pulang'] = trim($this->input->post('tgl_pulang',true));
                $y['data']['jenis_rawat'] = $this->input->post('jenis_rawat',true);
                $y['data']['kelas_rawat'] = $this->input->post('kelas_rawat',true);
                $y['data']['adl_sub_acute'] = $this->input->post('adl_sub_acute',true);
                $y['data']['adl_chronic'] = $this->input->post('adl_chronic',true);
                $y['data']['icu_indikator'] = $this->input->post('icu_indikator',true);
                $y['data']['icu_los'] = str_replace(",","",trim($this->input->post('icu_los',true)));
                $y['data']['ventilator_hour'] = $this->input->post('ventilator_hour',true);
                $y['data']['upgrade_class_ind'] = $this->input->post('upgrade_class_ind',true);
                $y['data']['upgrade_class_class'] = $this->input->post('upgrade_class_class',true);
                $y['data']['upgrade_class_los'] = str_replace(",","",trim($this->input->post('upgrade_class_los',true)));
                $y['data']['add_payment_pct'] = $this->input->post('add_payment_pct',true);
                $y['data']['birth_weight'] = $this->input->post('birth_weight',true);
                $y['data']['discharge_status'] = $this->input->post('discharge_status',true);
                $y['data']['diagnosa'] = $resDiagData['icd_cd'];
                $y['data']['procedure'] = $resProcData['proc_cd'];

                $y['data']['tarif_rs']['prosedur_non_bedah'] = str_replace(",","",trim($this->input->post('prosedur_non_bedah',true)));
                $y['data']['tarif_rs']['prosedur_bedah'] = str_replace(",","",trim($this->input->post('prosedur_bedah',true)));
                $y['data']['tarif_rs']['konsultasi'] = str_replace(",","",trim($this->input->post('konsultasi',true)));
                $y['data']['tarif_rs']['tenaga_ahli'] = str_replace(",","",trim($this->input->post('tenaga_ahli',true)));
                $y['data']['tarif_rs']['keperawatan'] = str_replace(",","",trim($this->input->post('keperawatan',true)));
                $y['data']['tarif_rs']['penunjang'] = str_replace(",","",trim($this->input->post('penunjang',true)));
                $y['data']['tarif_rs']['radiologi'] = str_replace(",","",trim($this->input->post('radiologi',true)));
                $y['data']['tarif_rs']['laboratorium'] = str_replace(",","",trim($this->input->post('laboratorium',true)));
                $y['data']['tarif_rs']['pelayanan_darah'] = str_replace(",","",trim($this->input->post('pelayanan_darah',true)));
                $y['data']['tarif_rs']['rehabilitasi'] = str_replace(",","",trim($this->input->post('rehabilitasi',true)));
                $y['data']['tarif_rs']['kamar'] = str_replace(",","",trim($this->input->post('kamar',true)));
                $y['data']['tarif_rs']['rawat_intensif'] = str_replace(",","",trim($this->input->post('rawat_intensif',true)));
                $y['data']['tarif_rs']['obat'] = str_replace(",","",trim($this->input->post('obat',true)));
                $y['data']['tarif_rs']['obat_kronis'] = str_replace(",","",trim($this->input->post('obat_kronis',true)));
                $y['data']['tarif_rs']['obat_kemoterapi'] = str_replace(",","",trim($this->input->post('obat_kemoterapi',true)));
                $y['data']['tarif_rs']['alkes'] = str_replace(",","",trim($this->input->post('alkes',true)));
                $y['data']['tarif_rs']['bmhp'] = str_replace(",","",trim($this->input->post('bmhp',true)));
                $y['data']['tarif_rs']['sewa_alat'] = str_replace(",","",trim($this->input->post('sewa_alat',true)));

                $y['data']['tarif_poli_eks'] = str_replace(",","",trim($this->input->post('tarif_poli_eks',true)));
                $y['data']['nama_dokter'] = $this->input->post('nama_dokter',true);
                $y['data']['kode_tarif'] = RS_KD_TARIF;
                $y['data']['payor_id'] = $this->input->post('payor_id',true);
                $y['data']['payor_cd'] = $this->input->post('payor_cd',true);
                $y['data']['cob_cd'] = $this->input->post('cob_cd',true);
                $y['data']['coder_nik'] = getUserID();
                
                // set_claim_data;
                $response = initJSON(json_encode($y));  
            }else{
                $x['metadata']['code'] = 401;
                $x['metadata']['message'] = "Masih ada input yang kosong. Silahkan lengkapi data.";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metadata']['code'] = 402;
            $x['metadata']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }

    function delete_claim(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(
                isset($_POST['noSep'])
            ){
                $noSep = $this->input->post('noSep',true);

                if($noSep !== ""){
                    // delete Klaim;
                    $x['metadata']['method'] = "delete_claim";
                    $x['data']['nomor_sep']= $noSep;
                    $x['data']['coder_nik']= getUserID();
                    $cek_klaim = initJSON(json_encode($x));                    
                    $response = $cek_klaim;
                }else{
                    $x['metaData']['code'] = 401;
                    $x['metaData']['message'] = "No.SEP tidak ditemukan";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            }else{
                $x['metaData']['code'] = 402;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 403;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }

    function grouper(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(
                isset($_POST['noSep'])
            ){
                $noSep = $this->input->post('noSep',true);

                if($noSep !== ""){
                    // delete Klaim;
                    $x['metadata']['method'] = "grouper";
                    $x['metadata']['stage'] = "1";
                    $x['data']['nomor_sep']= $noSep;

                    $cek_klaim = initJSON(json_encode($x));                    
                    $response = $cek_klaim;
                }else{
                    $x['metaData']['code'] = 401;
                    $x['metaData']['message'] = "No.SEP tidak ditemukan";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            }else{
                $x['metaData']['code'] = 402;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 403;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }

    /**
    ********************************** 
    * Klaim function POST - formdata 
    */
    function showSignature(){
        echo showSignature(); 
    }
    
    function update_patient_post(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(
                isset($_POST['noMrLama']) && 
                isset($_POST['noKartu']) && 
                isset($_POST['noSep']) && 
                isset($_POST['noMr']) && 
                isset($_POST['nama']) && 
                isset($_POST['tglLahir']) && 
                isset($_POST['gender'])
            ){
                $x['metadata']['method'] = "update_patient";
                $x['metadata']['nomor_rm'] = $this->input->post('noMrLama',true);

                $x['data']['nomor_kartu']= $this->input->post('noKartu',true);
                $x['data']['nomor_sep']= $this->input->post('noSep',true);
                $x['data']['nomor_rm']= $this->input->post('noMr',true);
                $x['data']['nama_pasien']= $this->input->post('nama',true);
                $x['data']['tgl_lahir']= date('Y-m-d H:i:s',strtotime($this->input->post('tglLahir',true)));
                $x['data']['gender']= ($this->input->post('gender',true)=="L") ? 1 : 2;
                
                if(
                    $x['metadata']['method'] !== "" || 
                    $x['data']['nomor_kartu'] !== "" || 
                    $x['data']['nomor_sep'] !== "" || 
                    $x['data']['nomor_rm'] !== "" || 
                    $x['data']['nama_pasien'] !== "" || 
                    $x['data']['tgl_lahir'] !== "" || 
                    $x['data']['gender'] !== ""
                ){
                    $response = initJSON(json_encode($x)); 
                    if ($response['metadata']['code'] == 200) {
                        $x['data']['idx'] = null;
                        $x['data']['no_kwitansi'] = $this->input->post('no_kwitansi',true);
                    }
                }else{
                    $x['metaData']['code'] = 401;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            }else{
                $x['metaData']['code'] = 402;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 403;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }
    function delete_patient_post(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(
                isset($_POST['peserta']['noKartu']) && 
                isset($_POST['noSep']) && 
                isset($_POST['peserta']['noMr']) && 
                isset($_POST['peserta']['nama']) && 
                isset($_POST['peserta']['tglLahir']) && 
                isset($_POST['peserta']['kelamin'])
            ){
                $x['metadata']['method'] = "new_claim";

                $x['data']['nomor_kartu']= $this->input->post('noKartu',true);
                $x['data']['nomor_sep']= $this->input->post('nomor_sep',true);
                $x['data']['nomor_rm']= $this->input->post('nomor_rm',true);
                $x['data']['nama_pasien']= $this->input->post('nama_pasien',true);
                $x['data']['tgl_lahir']= $this->input->post('tgl_lahir',true);
                $x['data']['gender']= $this->input->post('gender',true);
                
                if(
                    $x['metadata']['method'] !== "" || 
                    $x['data']['nomor_kartu'] !== "" || 
                    $x['data']['nomor_sep'] !== "" || 
                    $x['data']['nomor_rm'] !== "" || 
                    $x['data']['nama_pasien'] !== "" || 
                    $x['data']['tgl_lahir'] !== "" || 
                    $x['data']['gender'] !== ""
                ){
                    $response = initJSON(json_encode($x)); 
                }else{
                    $x['metaData']['code'] = 401;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            }else{
                $x['metaData']['code'] = 402;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 403;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }
    
    /**
    ******************************************************************** 
    * Klaim function JSON - formdata 
    */
    function eklaim_json(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $json = file_get_contents('php://input');
            if ($this->isJSON($json)) {
                $data = json_decode($json);
                $response = initJSON(json_encode($data));
            }else{
                $x['metaData']['code'] = 401;
                $x['metaData']['message'] = "Error reading JObject from JsonReader.";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 402;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response; 
    }


    function test_eklaim_json(){
$json_request = <<<EOT
{
    "metadata": {
        "method": "get_claim_data"
    },
    "data": {
        "nomor_sep": "0304R0010819V000003"
    }
}
EOT;
$response = initJSON($json_request);
//echo $response; 
print_r('<pre>');          
print_r(json_decode($response,true));          
print_r('</pre>');    

    }

    function get_claim_data(){
$json_request = <<<EOT
{
    "metadata": {
        "method": "get_claim_data"
    },
    "data": {
        "nomor_sep": "0304R0010819V000003"
    }
}
EOT;
    
    $key = ENCRYPT_KEY;
    $payload = inacbg_encrypt($json_request,$key);
    $header = array("Content-Type: application/x-www-form-urlencoded");

    $url = HOST_EC;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    $response = curl_exec($ch);

    // terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
    // dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
    $first  = strpos($response, "\n")+1;
    $last   = strrpos($response, "\n")-1;
    $response  = substr($response,$first,strlen($response)-$first-$last);
    // decrypt dengan fungsi inacbg_decrypt
    $response = inacbg_decrypt($response,$key);
    echo $response;
}

    /** 
    print_r('<pre>');          
    print_r(json_decode($response,true));          
    print_r('</pre>');          
    ********************************************************************
    * End of Klaim 
    */
}
?>