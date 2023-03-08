<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mobile extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('jkn_model');
        $this->load->model('users_model');
        $this->load->helper('lz');
        // $ses_state = $this->users_model->cek_session_id();
        // if(!$ses_state){  
        //     $metadata=array(
        //         'code'=>201,
        //         'message'=>'Anda Belum Login Atau Session Expired'
        //     );
        //     $response=array(
        //         'metadata'=>$metadata
        //     );
        //     header('Content-Type: application/json');
        //     echo json_encode($response);
        //     exit;
        // }
    }
    function index(){
        echo "Service Actived";
    }
    function poli(){
        // Create TimeStamps
        // $param=urlencode($this->input->get('param'));
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_JKN."&".$tStamp, SECREET_ID_JKN, true);
        $encodedSignature = base64_encode($signature);
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_JKN . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_JKN;

        $res = $this->jkn_model->getData("ref/poli",$header);
        // echo $res; exit;
        if(isJSON($res)){
            $arr=json_decode($res);
            // print_r($arr->metadata->Code);exit;
            if(!empty($arr->metadata->code)){
                if($arr->metadata->code==1){
                    $data=$this->jkn_model->stringDecrypt(CONS_ID_JKN.SECREET_ID_JKN.$tStamp,$arr->response);
                    $res=json_encode(array('metadata'=>$arr->metadata,'response'=>json_decode(hasil($data))));
                }
            }
            header('Content-Type: application/json');
            echo $res;
        }else{
            echo $res;
        }
        
    }
    function dokter(){
        // Create TimeStamps
        // $param=urlencode($this->input->get('param'));
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_JKN."&".$tStamp, SECREET_ID_JKN, true);
        $encodedSignature = base64_encode($signature);
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_JKN . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_JKN;

        $res = $this->jkn_model->getData("ref/dokter",$header);
        // echo $res; exit;
        $arr=json_decode($res);
        if(!empty($arr->metadata->code)){
            if($arr->metadata->code==1){
                $data=$this->jkn_model->stringDecrypt(CONS_ID_JKN.SECREET_ID_JKN.$tStamp,$arr->response);
                $res=json_encode(array('metadata'=>$arr->metadata,'response'=>json_decode(hasil($data))));
            }
        }
        
        header('Content-Type: application/json');
        echo $res;
    }
    function jadwaldokter(){
        // Create TimeStamps
        $poli=urlencode($this->input->get('poli'));
        $tgl=urlencode($this->input->get('tgl'));
        if(empty($tgl)) $tgl=date('Y-m-d');
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_JKN."&".$tStamp, SECREET_ID_JKN, true);
        $encodedSignature = base64_encode($signature);
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_JKN . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_JKN;

        $res = $this->jkn_model->getData("jadwaldokter/kodepoli/".$poli."/tanggal"."/".$tgl,$header);
        // echo $res; exit;
        $arr=json_decode($res);
        if($arr->metadata->code==200){
            $data=$this->jkn_model->stringDecrypt(CONS_ID_JKN.SECREET_ID_JKN.$tStamp,$arr->response);
            $res=json_encode(array('metadata'=>$arr->metadata,'response'=>json_decode(hasil($data))));
        }
        header('Content-Type: application/json');
        echo $res;
    }
    function updatejadwaldokter(){
        // Create TimeStamps
        
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_JKN."&".$tStamp, SECREET_ID_JKN, true);
        $encodedSignature = base64_encode($signature);
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_JKN . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_JKN;
        $hari=$this->ionput->post('hari');
        $req=array(
            'kodepoli'=>$this->input->post('kodepoli'),
            'kodesubspesialis'=>$this->input->post('kodesubspesialis'),
            'kodedokter'=>$this->input->post('kodedokter'),
            'jadwal'=>array(
                'hari'=>$hari[0],
                'buka'=>$buka[0],
                'tutup'=>$tutup[0]
            )
        );
        $res = $this->jkn_model->postData("jadwaldokter/updatejadwaldokter",$header,json_encode($req));
        header('Content-Type: application/json');
        echo $res;
    }
    function updatewaktuantrean(){
        // Create TimeStamps
        if(STATUS_JKN=="1"){
            date_default_timezone_set('UTC');
            $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
            // Create Signature
            $signature = hash_hmac('sha256', CONS_ID_JKN."&".$tStamp, SECREET_ID_JKN, true);
            $encodedSignature = base64_encode($signature);
            // Generate Header
            $header = "";
            $header .= "X-cons-id: " . CONS_ID_JKN . "\r\n";
            $header .= "X-timestamp: " . $tStamp . "\r\n";
            $header .= "X-signature: " . $encodedSignature ."\r\n";
            $header .= "user_key: ".KEY_JKN;
            // $hari=$this->input->post('hari');
            $sekarang=strtotime(date('Y-m-d H:i:s')) *1000;
            $req=array(
                'kodebooking'=>$this->input->post('kodebooking'),
                'taskid'=>$this->input->post('taskid'),
                'waktu'=>$sekarang
            );
            
            $res = $this->jkn_model->postData("antrean/updatewaktu",$header,json_encode($req));
            $arr_res=json_decode($res);
            if($arr_res->metadata->code==200){
                // $id_daftar=$this->input->post('id_daftar');
                // $localtask=array(
                //     'id_daftar'=>$id_daftar,
                //     'kodebooking'=>$this->input->post('kodebooking'),
                //     'taskid'=>$this->input->post('taskid'),
                //     'waktu'=>$sekarang
                // );
                // $this->db->insert('tbl02_task',$localtask);
                    
                $aktiftask=array('aktiftaskid'=>$this->input->post('taskid'));
                $this->db->where('kodebooking',$this->input->post('kodebooking'));
                $this->db->update('tbl02_antrian',$aktiftask);
            }else{
                if($arr_res->metadata->code=208){
                    $aktiftask=array('aktiftaskid'=>$this->input->post('taskid'));
                    $this->db->where('kodebooking',$this->input->post('kodebooking'));
                    $this->db->update('tbl02_antrian',$aktiftask);
                }    
            }
        }else{
            $response=array(
                'metadata'=>array(
                    'code'=>200,
                    'message'=>'OK'
                )
            );
            $res=json_encode($response);
        }
        
        header('Content-Type: application/json');
        echo $res;
    }
    function batalantrean(){
        // Create TimeStamps
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_JKN."&".$tStamp, SECREET_ID_JKN, true);
        $encodedSignature = base64_encode($signature);
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_JKN . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_JKN;
        // $hari=$this->input->post('hari');
        $req=array(
            'kodebooking'=>$this->input->post('kodebooking'),
            'keterangan'=>$this->input->post('keterangan')
        );
        $res = $this->jkn_model->postData("antrean/batal",$header,json_encode($req));
        header('Content-Type: application/json');
        echo $res;
    }
    function listtask($kodebooking){
        // Create TimeStamps
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_JKN."&".$tStamp, SECREET_ID_JKN, true);
        $encodedSignature = base64_encode($signature);
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_JKN . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_JKN;
        $req=array(
            'kodebooking'=>$kodebooking,
        );
        $res = $this->jkn_model->postData("antrean/getlisttask",$header,json_encode($req));
        $arr=json_decode($res);
        if($arr->metadata->code==200){
            $data=$this->jkn_model->stringDecrypt(CONS_ID_JKN.SECREET_ID_JKN.$tStamp,$arr->response);
            $res=json_encode(array('metadata'=>$arr->metadata,'response'=>json_decode(hasil($data))));
        }
        header('Content-Type: application/json');
        echo $res;
    }
    function waktutunggupertanggal($waktu='rs'){
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $tgl=urlencode($this->input->get('tgl'));
        if(empty($tgl)) $tgl=date('Y-m-d');
        // $waktu=strtotime(date('Y-m-d'))*1000;
        // $waktu='rs';
        $signature = hash_hmac('sha256', CONS_ID_JKN."&".$tStamp, SECREET_ID_JKN, true);
        $encodedSignature = base64_encode($signature);
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_JKN . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_JKN;

        $res = $this->jkn_model->getData("dashboard/waktutunggu/tanggal/".$tgl."/waktu/".$waktu,$header);
        // echo $res; exit;
        // $arr=json_decode($res);
        // if($arr->metadata->code==200){
        //     $data=$this->jkn_model->stringDecrypt(CONS_ID_JKN.SECREET_ID_JKN.$tStamp,$arr->response);
        //     $res=json_encode(array('metadata'=>$arr->metadata,'response'=>json_decode(hasil($data))));
        // }
        header('Content-Type: application/json');
        echo $res;
    }

    function waktutungguperbulan($waktu='rs'){
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $bulan=urlencode($this->input->get('bulan'));
        $tahun=intval($this->input->get('tahun'));
        // if(empty($tgl)) $tgl=date('Y-m-d');
        // $waktu=strtotime(date('Y-m-d'))*1000;
        
        $signature = hash_hmac('sha256', CONS_ID_JKN."&".$tStamp, SECREET_ID_JKN, true);
        $encodedSignature = base64_encode($signature);
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_JKN . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_JKN;

        $res = $this->jkn_model->getData("dashboard/waktutunggu/bulan/".$bulan."/tahun/".$tahun."/waktu/".$waktu,$header);
        // echo $res; exit;
        // $arr=json_decode($res);
        // if($arr->metadata->code==200){
        //     $data=$this->jkn_model->stringDecrypt(CONS_ID_JKN.SECREET_ID_JKN.$tStamp,$arr->response);
        //     $res=json_encode(array('metadata'=>$arr->metadata,'response'=>json_decode(hasil($data))));
        // }
        header('Content-Type: application/json');
        echo $res;
    }
    function add(){
        $spm=$this->input->post('spm');
        $antrianpoly=$this->input->post('antrian');
        $estimasitunggu=$antrianpoly*$spm;
        $sekarang=date('H:i:s');
        $time = strtotime($sekarang);
        $estimasilayan = date("H:i", strtotime('+'.$estimasitunggu.' minutes', $time));
        $estimasilayanms=strtotime($estimasilayan)*1000;
        // echo $estimasilayanms; exit;
        $antreanjkn=array(
            'kodebooking'=>$this->input->post('kodebooking'),
            'jenispasien'=> 'JKN',
            'nomorkartu'=> '0002007706948',
            'nik'=> '1304034802760003',
            'nohp'=> '0000148327029',
            'kodepoli'=> 'JAN',
            'namapoli'=> 'JANTUNG',
            'pasienbaru'=> 0,
            'norm'=> '303002',
            'tanggalperiksa'=> date('Y-m-d'),
            'kodedokter'=> 18817,
            'namadokter'=> 'dr. SUSIYANTI, Sp.JP',
            'jampraktek'=> '08:00-14:00',
            'jeniskunjungan'=> 3, //1 (Rujukan FKTP), 2 (Rujukan Internal), 3 (Kontrol), 4 (Rujukan Antar RS)
            'nomorreferensi'=> '030704010422P000001',
            'nomorantrean'=> $antrianpoly,
            'angkaantrean'=> $antrianpoly,
            'estimasidilayani'=> $estimasilayanms,
            'sisakuotajkn'=> 47,
            'kuotajkn'=> 48,
            'sisakuotanonjkn'=> 12,
            'kuotanonjkn'=> 12,
            'keterangan'=> 'Peserta harap 30 menit lebih awal guna pencatatan administrasi.'
        );
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_JKN."&".$tStamp, SECREET_ID_JKN, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        $contentType = "application/x-www-form-urlencoded";

        $header = "";
        $header .= "Content-Type: " . $contentType . "\r\n";
        $header .= "X-cons-id: " . CONS_ID_JKN . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_JKN;

        $res=$this->jkn_model->postData('antrean/add',$header,json_encode($antreanjkn));
        // echo $res;
        // $arr=json_decode($res);
        // print_r($arr);
        echo json_encode($antreanjkn);
    }
    function headerbpjs(){
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_JKN."&".$tStamp, SECREET_ID_JKN, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        $contentType = "application/x-www-form-urlencoded";

        $header = "";
        $header .= "Content-Type: " . $contentType . "\r\n";
        $header .= "X-cons-id: " . CONS_ID_JKN . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_JKN;
        echo $header;
    }

    function cekbooking($nokartu){
        $param=array(
            'nokartu'=>$nokartu
        );
        $auth=array(
            'username'=>ONLINE_ID,
            'password'=>ONLINE_KEY
        );
        $this->load->model("pendaftaran_model");
        $res=$this->pendaftaran_model->jkn_request($param,ONLINE_CALL_BACK."jkn/rsud/cekbookingpb","",$auth);
        // $arr=json_decode($res);
        header('Content-Type: application/json');
        echo $res;
        // echo ONLINE_CALL_BACK."jkn/rsud/cekbookingpb";
    }
}