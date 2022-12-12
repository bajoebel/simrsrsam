<?php 
class Rujukan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('vclaim_model');
        $this->load->model('users_model');
        $this->load->helper('lz');
        // $ses_state = $this->users_model->cek_session_id();
        // if(!$ses_state){  
        //     $response=array('code'=>201,'message'=>'Anda Belum Login Atau Session Expired');
        //     header('Content-Type: application/json');
        //     echo json_encode($response);
        //     exit;
        // }
    }
    function khusus(){
        $data=array(
            'contentTitle'=>'Riwayat SEP'
        );
        $z = setNav("nav_6");
        // $y['index_menu'] = 7;
        $view=array(
            'header'=>$this->load->view('template/header', '', true),
            'nav_sidebar'=>$this->load->view('template/nav_sidebar', $z, true),
            'content'=>$this->load->view('vclaim/rujukankhusus', $data, true),
            'index_menu'=>6,
            'libjs'=>array(
                'js/rujukan.js'
            )
        );
        $this->load->view('template/theme', $view);
    }
    function norujuk($faskes=1,$norujuk=''){
        // Create TimeStamps
        /**
         * 1 Untuk Rujukan Faskes 1
         * 2 Untuk Rujukan Faskes 2
         */
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        if($faskes==1) $res = $this->vclaim_model->getData("Rujukan/$norujuk",$header);
        else $res = $this->vclaim_model->getData("Rujukan/RS/$norujuk",$header);
        $arr=json_decode($res);
        if($arr->metaData->code==200){
            $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
           
            $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
        }
        header('Content-Type: application/json');
        echo $res;
    }
    function nokartu($faskes=1,$nokartu=''){
        // Create TimeStamps
        /**
         * 1 Untuk Rujukan Faskes 1
         * 2 Untuk Rujukan Faskes 2
         */
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        if($faskes==1) $res = $this->vclaim_model->getData("Rujukan/Peserta/$nokartu",$header);
        else $res = $this->vclaim_model->getData("Rujukan/RS/Peserta/$nokartu",$header);
        $arr=json_decode($res);
        if($arr->metaData->code==200){
            $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
            $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
        }
        header('Content-Type: application/json');
        echo $res;
    }
    function listrujukan($faskes=1,$nokartu=''){
        // Create TimeStamps
        /**
         * 1 Untuk Rujukan Faskes 1
         * 2 Untuk Rujukan Faskes 2
         */
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        if($faskes==1) $res = $this->vclaim_model->getData("Rujukan/List/Peserta/$nokartu",$header);
        else $res = $this->vclaim_model->getData("Rujukan/RS/List/Peserta/$nokartu",$header);
        if(isJSON($res)){
            $arr=json_decode($res);
            if($arr->metaData->code==200){
                $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
                $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
            }
            header('Content-Type: application/json');
            echo $res;
        }else {
            echo $res;
        }
        
        // if(is_array($arr)){
        //     if($arr->metaData->code==200){
        //         $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
        //         $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
        //     }
        //     header('Content-Type: application/json');
        //     echo $res;
        // }else{
        //     echo $res;
        // }
        
    }
    function listrujukankhusus($bulan='',$tahun=''){
        // Create TimeStamps
        /**
         * 1 Untuk Rujukan Faskes 1
         * 2 Untuk Rujukan Faskes 2
         */
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        if(empty($bulan)) $bulan=intval(date('m'));
        if(empty($tahun)) $tahun=intval(date('Y'));
        $res = $this->vclaim_model->getData("Rujukan/Khusus/List/Bulan/$bulan/Tahun/$tahun",$header);
        $arr=json_decode($res);
        if($arr->metaData->code==200){
            $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
            $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
        }
        header('Content-Type: application/json');
        echo $res;
    }
    function spesialistik($ppkrujukan='',$tglrujukan=''){
        // Create TimeStamps
        /**
         * 1 Untuk Rujukan Faskes 1
         * 2 Untuk Rujukan Faskes 2
         */
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        // if(empty($ppkrujukan)) $ppkrujukan=intval(date('m'));
        if(empty($tglrujukan)) $tglrujukan=date('Y-m-d');
        $res = $this->vclaim_model->getData("Rujukan/ListSpesialistik/PPKRujukan/$ppkrujukan/TglRujukan/$tglrujukan",$header);
        $arr=json_decode($res);
        if($arr->metaData->code==200){
            $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
            $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
        }
        header('Content-Type: application/json');
        echo $res;
    }
    function sarana($kodeppk=''){
        // Create TimeStamps
        /**
         * 1 Untuk Rujukan Faskes 1
         * 2 Untuk Rujukan Faskes 2
         */
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        // if(empty($ppkrujukan)) $ppkrujukan=intval(date('m'));
        // if(empty($tglrujukan)) $tglrujukan=date('Y-m-d');
        $res = $this->vclaim_model->getData("Rujukan/ListSarana/PPKRujukan/$kodeppk",$header);
        $arr=json_decode($res);
        if($arr->metaData->code==200){
            $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
            $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
        }
        header('Content-Type: application/json');
        echo $res;
    }
    function insert(){
        $req=array(
            'request'=>array(
                't_rujukan'=>array(
                    "noSep"=>$this->input->post('noSep'),
                    "tglRujukan"=>$this->input->post('tglRujukan'),
                    "tglRencanaKunjungan"=>$this->input->post('tglRencanaKunjungan'),
                    "ppkDirujuk"=>$this->input->post('ppkDirujuk'),
                    "jnsPelayanan"=>$this->input->post('jnsPelayanan'),
                    "catatan"=>$this->input->post('catatan'),
                    "diagRujukan"=>$this->input->post('diagRujukan'),
                    "tipeRujukan"=>$this->input->post('tipeRujukan'),
                    "poliRujukan"=>$this->input->post('poliRujukan'),
                    "user"=>$this->session->userdata('get_uid'),
                )
            )
        );
        // echo json_encode($req); exit;
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        $contentType = "application/x-www-form-urlencoded";
        // Generate Header
        $header = "";
        $header .= "Content-Type: " . $contentType . "\r\n";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        $res=$this->vclaim_model->postData('Rujukan/2.0/insert',$header,json_encode($req));
        // echo "Error"
        // echo $res; exit;
        $arr=json_decode($res);
        if($arr->metaData->code==200){
            $lz=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
            $data=json_decode(hasil($lz));
            $rujuk=array(
                'id_daftar'=>$this->input->post('id_daftar'),
                'reg_unit'=>$this->input->post('reg_unit'),
                'noSep'=>$this->input->post('noSep'),
                'ppkDirujuk'=>$this->input->post('ppkDirujuk'),
                'jnsPelayanan'=>$this->input->post('jnsPelayanan'),
                'catatan'=>$this->input->post('catatan'),
                'diagRujukan'=>$this->input->post('diagRujukan'),
                'tipeRujukan'=>$this->input->post('tipeRujukan'),
                'poliRujukan'=>$this->input->post('poliRujukan'),
                'kodeAsalRujukan'=>$data->rujukan->AsalRujukan->kode,
                'namaAsalRujukan'=>$data->rujukan->AsalRujukan->nama,
                'diagnosakode'=>$data->rujukan->diagnosa->kode,
                'diagnosanama'=>$data->rujukan->diagnosa->nama,
                'noRujukan'=>$data->rujukan->noRujukan,
                'asuransi'=>$data->rujukan->peserta->asuransi,
                'hakKelas'=>$data->rujukan->peserta->hakKelas,
                'jnsPeserta'=>$data->rujukan->peserta->jnsPeserta,
                'kelamin'=>$data->rujukan->peserta->kelamin,
                'nama'=>$data->rujukan->peserta->nama,
                'noKartu'=>$data->rujukan->peserta->noKartu,
                'noMr'=>$data->rujukan->peserta->noMr,
                'tglLahir'=>$data->rujukan->peserta->tglLahir,
                'kodepoliTujuan'=>$data->rujukan->poliTujuan->kode,
                'namapoliTujuan'=>$data->rujukan->poliTujuan->nama,
                'tglBerlakuKunjungan'=>$data->rujukan->tglBerlakuKunjungan,
                'tglRencanaKunjungan'=>$data->rujukan->tglRencanaKunjungan,
                'tglRujukan'=>$data->rujukan->tglRujukan,
                'kodetujuanRujukan'=>$data->rujukan->tujuanRujukan->kode,
                'namatujuanRujukan'=>$data->rujukan->tujuanRujukan->nama,
                'users'=>$this->session->userdata('get_uid')
            );
            $this->db->insert('tbl02_rujukanonline',$rujuk);
            $res=json_encode(array('metaData'=>$arr->metaData,'response'=>$data));
        }
        header('Content-Type: application/json');
        echo $res;
    }
    function update(){
        $req=array(
            'request'=>array(
                't_rujukan'=>array(
                    "noRujukan"=>$this->input->post('noRujukan'),
                    "tglRujukan"=>$this->input->post('tglRujukan'),
                    "tglRencanaKunjungan"=>$this->input->post('tglRencanaKunjungan'),
                    "ppkDirujuk"=>$this->input->post('ppkDirujuk'),
                    "jnsPelayanan"=>$this->input->post('jnsPelayanan'),
                    "catatan"=>$this->input->post('catatan'),
                    "diagRujukan"=>$this->input->post('diagRujukan'),
                    "tipeRujukan"=>$this->input->post('tipeRujukan'),
                    "poliRujukan"=>$this->input->post('poliRujukan'),
                    "user"=>$this->session->userdata('get_uid'),
                )
            )
        );

        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        $contentType = "application/x-www-form-urlencoded";
        // Generate Header
        $header = "";
        $header .= "Content-Type: " . $contentType . "\r\n";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        $res=$this->vclaim_model->putData('Rujukan/2.0/Update',$header,json_encode($req));
        // echo $res;exit;
        // echo "<br>test<br>";
        // $jsonData = rtrim($res, "\0");
        $arr=json_decode($res);
        // print_r($arr); exit;
        if(is_array($arr)){
            if($arr->metaData->code==200){
                $lz=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
                $data=json_decode(hasil($lz));
                $rujuk=array(
                    'id_daftar'=>$this->input->post('id_daftar'),
                    'reg_unit'=>$this->input->post('reg_unit'),
                    'noSep'=>$this->input->post('noSep'),
                    'ppkDirujuk'=>$this->input->post('ppkDirujuk'),
                    'jnsPelayanan'=>$this->input->post('jnsPelayanan'),
                    'catatan'=>$this->input->post('catatan'),
                    'diagRujukan'=>$this->input->post('diagRujukan'),
                    'tipeRujukan'=>$this->input->post('tipeRujukan'),
                    'poliRujukan'=>$this->input->post('poliRujukan'),
                    'kodeAsalRujukan'=>$data->rujukan->AsalRujukan->kode,
                    'namaAsalRujukan'=>$data->rujukan->AsalRujukan->nama,
                    'diagnosakode'=>$data->rujukan->diagnosa->kode,
                    'diagnosanama'=>$data->rujukan->diagnosa->nama,
                    'noRujukan'=>$data->rujukan->noRujukan,
                    'asuransi'=>$data->rujukan->peserta->asuransi,
                    'hakKelas'=>$data->rujukan->peserta->hakKelas,
                    'jnsPeserta'=>$data->rujukan->peserta->jnsPeserta,
                    'kelamin'=>$data->rujukan->peserta->kelamin,
                    'nama'=>$data->rujukan->peserta->nama,
                    'noKartu'=>$data->rujukan->peserta->noKartu,
                    'noMr'=>$data->rujukan->peserta->noMr,
                    'tglLahir'=>$data->rujukan->peserta->tglLahir,
                    'kodepoliTujuan'=>$data->rujukan->poliTujuan->kode,
                    'namapoliTujuan'=>$data->rujukan->poliTujuan->nama,
                    'tglBerlakuKunjungan'=>$data->rujukan->tglBerlakuKunjungan,
                    'tglRencanaKunjungan'=>$data->rujukan->tglRencanaKunjungan,
                    'tglRujukan'=>$data->rujukan->tglRujukan,
                    'kodetujuanRujukan'=>$data->rujukan->tujuanRujukan->kode,
                    'namatujuanRujukan'=>$data->rujukan->tujuanRujukan->nama,
                    'users'=>$this->session->userdata('get_uid')
                );
                // $this->db->where('id_daftar',$this->input->post('id_daftar'));
                // $this->db->where('reg_unit',$this->input->post('reg_unit'));
                $this->db->where('noRujukan',$this->input->post('noRujukan'));
                $this->db->update('tbl02_rujukanonline',$rujuk);
                $res=json_encode(array('metaData'=>$arr->metaData,'response'=>$data));
            }else{
                $lz=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
                $data=json_decode(hasil($lz));
                $res=json_encode(array('metaData'=>$arr->metaData,'response'=>$data));
            }
        }
        
        header('Content-Type: application/json');
        echo $res;
    }

    function updatelokal(){
        $rujuk=array(
            'id_daftar'=>$this->input->post('id_daftar'),
            'reg_unit'=>$this->input->post('reg_unit'),
            'ppkDirujuk'=>$this->input->post('ppkDirujuk'),
            'jnsPelayanan'=>$this->input->post('jnsPelayanan'),
            'catatan'=>$this->input->post('catatan'),
            'diagRujukan'=>$this->input->post('diagRujukan'),
            'diagnosakode'=>$this->input->post('diagRujukan'),
            'diagnosanama'=>$this->input->post('diagnosanama'),
            'tglRencanaKunjungan'=>$this->input->post('tglRencanaKunjungan'),
            'tipeRujukan'=>$this->input->post('tipeRujukan'),
            'poliRujukan'=>$this->input->post('poliRujukan'),
            'kodepoliTujuan'=>$this->input->post('poliRujukan'),
            'namapoliTujuan'=>$this->input->post('namapoliRujukan'),
            'kodetujuanRujukan'=>$this->input->post('ppkDirujuk'),
            'namatujuanRujukan'=>$this->input->post('namappkDirujuk'),
            'users'=>$this->session->userdata('get_uid')
        );
        // echo json_encode($rujuk);exit;
        // $this->db->where('id_daftar',$this->input->post('id_daftar'));
        // $this->db->where('reg_unit',$this->input->post('reg_unit'));
        $this->db->where('noRujukan',$this->input->post('noRujukan'));
        $this->db->update('tbl02_rujukanonline',$rujuk);
        $res=json_encode(array('metaData'=>array('code'=>200,'message'=>'Update Rujukan Sukses')));
        header('Content-Type: application/json');
        echo $res;
    }
    function hapus($norujukan){
        $req=array(
            'request'=>array(
                't_rujukan'=>array(
                    'noRujukan'=>$norujukan,
                    'user'=>$this->session->userdata('get_uid')
                )
            )
        );
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $tgl=date('Y-m-d');
        $contentType = "application/x-www-form-urlencoded";
        // Generate Header
        $header = "";
        $header .= "Content-Type: " . $contentType . "\r\n";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        $res=$this->vclaim_model->deleteData('Rujukan/delete',$header,json_encode($req));
        
        // $arr=json_decode($res);
        // $data = str_replace('null','""',$res);
        // echo "test<br>";
        // echo $data;
        // exit;
        // echo "<br>";
        
        $arr = json_decode(trim($res), TRUE);
        if(is_array($arr)){
            if($arr->metaData->code==200){
                $batal=array(
                    'batal'=>1,
                    'userbatal'=>$this->session->userdata('get_uid')
                );
                $this->db->where('noRujukan',$norujukan);
                $this->db->update('tbl02_rujukanonline',$batal);
    
                $lz=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
                $data=json_decode(hasil($lz));
    
                $res=json_encode(array('metaData'=>$arr->metaData,'response'=>$data));
            }
        }
        
        header('Content-Type: application/json');
        echo $res;
    }
    function hapuslokal($norujukan){
        $batal=array(
            'batal'=>1,
            'userbatal'=>$this->session->userdata('get_uid')
        );
        $this->db->where('noRujukan',$norujukan);
        $this->db->update('tbl02_rujukanonline',$batal);
        $res=json_encode(array('metaData'=>array('code'=>200,'message'=>'Rujukan berhasil dibatalkan')));
        header('Content-Type: application/json');
        echo $res;
    }
    function jmlsep($norujuk,$faskes=1){
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;

        $res = $this->vclaim_model->getData("Rujukan/JumlahSEP/".$faskes."/".$norujuk,$header);
        $arr=json_decode($res);
        if($arr->metaData->code==200){
            $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
            $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
        }
        header('Content-Type: application/json');
        echo $res;
    }
}