<?php 
class Rencanakontrol extends CI_Controller{
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
    function index(){
        $data=array(
            'contentTitle'=>'List Rencana KOntrol'
        );
        $z = setNav("nav_6");
        // $y['index_menu'] = 7;
        $view=array(
            'header'=>$this->load->view('template/header', '', true),
            'nav_sidebar'=>$this->load->view('template/nav_sidebar', $z, true),
            'content'=>$this->load->view('vclaim/rencanakontrol', $data, true),
            'index_menu'=>6,
            'libjs'=>array(
                'js/rencanakontrol.js'
            )
        );
        $this->load->view('template/theme', $view);
    }
    
    function spesialistik($jnsKontrol=2,$nomor="",$tgl="")
    {
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $mulai=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;

        $res = $this->vclaim_model->getData("RencanaKontrol/ListSpesialistik/JnsKontrol/$jnsKontrol/nomor/$nomor/TglRencanaKontrol/".$tgl,$header);
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
    }
    function dokter($jnsKontrol=2,$poli="",$tgl="")
    {
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $mulai=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;

        $res = $this->vclaim_model->getData("RencanaKontrol/JadwalPraktekDokter/JnsKontrol/$jnsKontrol/KdPoli/$poli/TglRencanaKontrol/".$tgl,$header);
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
    }
    function insert(){
        $jnsKontrol=$this->input->post('jnsKontrol');
        if($jnsKontrol==2){
            $req=array(
                'request'=>array(
                    'noSEP'=>$this->input->post('noSEP'),
                    'kodeDokter'=>$this->input->post('kodeDokter'),
                    'poliKontrol'=>$this->input->post('poliKontrol'),
                    'tglRencanaKontrol'=>$this->input->post('tglRencanaKontrol'),
                    'user'=>$this->session->userdata('get_uid')
                )
            );
        }else{
            $req=array(
                'request'=>array(
                    'noKartu'=>$this->input->post('noSEP'),
                    'kodeDokter'=>$this->input->post('kodeDokter'),
                    'poliKontrol'=>$this->input->post('poliKontrol'),
                    'tglRencanaKontrol'=>$this->input->post('tglRencanaKontrol'),
                    'user'=>$this->session->userdata('get_uid')
                )
            );
        }
        
        
        // header('Content-Type: application/json');
        // echo json_encode($req);
        // exit;
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
        if($jnsKontrol==2){
            $res=$this->vclaim_model->postData('RencanaKontrol/insert',$header,json_encode($req));
        }else{
            $res=$this->vclaim_model->postData('RencanaKontrol/insertSPRI',$header,json_encode($req));
        }
        
        // echo $res; exit;
        if(isJSON($res)){
            $arr=json_decode($res);
            if($arr->metaData->code==200){
                $lz=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
                $data=json_decode(hasil($lz));
                if($jnsKontrol==2){
                    // Jika Yang dibuat Surat Kontrol Rawat Jalan
                    $sk=$data->noSuratKontrol;
                }else{
                    $sk=$data->noSPRI;
                }
                $localkontrol=array(
                    'jnsKontrol'=>$this->input->post('jnsKontrol'),
                    'noSuratKontrol'=>$sk,
                    'tglRencanaKontrol'=>$data->tglRencanaKontrol,
                    'namaDokter'=>$data->namaDokter,
                    'noKartu'=>$data->noKartu,
                    'nama'=>$data->nama,
                    'kelamin'=>$data->kelamin,
                    'tglLahir'=>$data->tglLahir,
                    'noSEP'=>$this->input->post('noSEP'),
                    'kodeDokter'=>$this->input->post('kodeDokter'),
                    'poliKontrol'=>$this->input->post('poliKontrol'),
                    'namapoliKontrol'=>$this->input->post('namapoliKontrol'),
                    'user'=>$this->session->userdata('get_uid')
                );
                $this->db->insert('tbl02_suratkontrol',$localkontrol);
                
                $res=json_encode(array('metaData'=>$arr->metaData,'response'=>$data));
            }
            header('Content-Type: application/json');
            echo $res;
        }else {
            echo $res;
        }

        
        // header('Content-Type: application/json');
        // echo json_encode($req);
    }
    function update(){
        $jnsKontrol=$this->input->post('jnsKontrol');
        if($jnsKontrol==2){
            $req=array(
                'request'=>array(
                    'noSuratKontrol'=>$this->input->post('noSuratKontrol'),
                    'noSEP'=>$this->input->post('noSEP'),
                    'kodeDokter'=>$this->input->post('kodeDokter'),
                    'poliKontrol'=>$this->input->post('poliKontrol'),
                    'tglRencanaKontrol'=>$this->input->post('tglRencanaKontrol'),
                    'user'=>$this->session->userdata('get_uid')
                )
            );
        }else{
            $req=array(
                'request'=>array(
                    'noSPRI'=>$this->input->post('noSuratKontrol'),
                    'kodeDokter'=>$this->input->post('kodeDokter'),
                    'poliKontrol'=>$this->input->post('poliKontrol'),
                    'tglRencanaKontrol'=>$this->input->post('tglRencanaKontrol'),
                    'user'=>$this->session->userdata('get_uid')
                )
            );
        }
        
        
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
        if($jnsKontrol==2){
            $res=$this->vclaim_model->putData('RencanaKontrol/Update',$header,json_encode($req));
        }else{
            $res=$this->vclaim_model->putData('RencanaKontrol/UpdateSPRI',$header,json_encode($req));
        }
        
        // echo $res; exit;
        if(isJSON($res)){
            $arr=json_decode($res);
            if(is_array($arr)){
                if($arr->metaData->code==200){
                    $lz=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
                    $data=json_decode(hasil($lz));
                    if($jnsKontrol==2){
                        // Jika Yang dibuat Surat Kontrol Rawat Jalan
                        $sk=$data->noSuratKontrol;
                    }else{
                        $sk=$data->noSPRI;
                    }
                    $localkontrol=array(
                        'jnsKontrol'=>$this->input->post('jnsKontrol'),
                        'noSuratKontrol'=>$sk,
                        'tglRencanaKontrol'=>$data->tglRencanaKontrol,
                        'namaDokter'=>$data->namaDokter,
                        'noKartu'=>$data->noKartu,
                        'nama'=>$data->nama,
                        'kelamin'=>$data->kelamin,
                        'tglLahir'=>$data->tglLahir,
                        'noSEP'=>$this->input->post('noSEP'),
                        'kodeDokter'=>$this->input->post('kodeDokter'),
                        'poliKontrol'=>$this->input->post('poliKontrol'),
                        'namapoliKontrol'=>$this->input->post('namapoliKontrol'),
                        'user'=>$this->session->userdata('get_uid')
                    );
                    $this->db->where('noSuratKontrol',$sk);
                    $this->db->update('tbl02_suratkontrol',$localkontrol);
                    
                    $res=json_encode(array('metaData'=>$arr->metaData,'response'=>$data));
                }
            }
            
            header('Content-Type: application/json');
            echo $res;
        }else {
            echo $res;
        }
        
    }
    function listkontrol($filter=2,$tglAwal="",$tglAkhir=""){
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $mulai=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        if($tglAwal=="") $tglAwal=date('Y-m-d');
        if($tglAkhir=="") $tglAkhir=date('Y-m-d');
        $res = $this->vclaim_model->getData("RencanaKontrol/ListRencanaKontrol/tglAwal/$tglAwal/tglAkhir/$tglAkhir/filter/".$filter,$header);
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
        
    }
    function nosuratkontrol($nokontrol=""){
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $mulai=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        
        $res = $this->vclaim_model->getData("RencanaKontrol/noSuratKontrol/".$nokontrol,$header);
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
        
    }

    function hapus($noSuratKontrol){
        $req=array(
            'request'=>array(
                't_suratkontrol'=>array(
                    'noSuratKontrol'=>$noSuratKontrol,
                    'user'=>$this->session->userdata('get_uid')
                )
            )
        );
        // header('Content-Type: application/json');
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
        $res=$this->vclaim_model->deleteData('RencanaKontrol/Delete',$header,json_encode($req));
        
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
                $this->db->where('noSuratKontrol',$noSuratKontrol);
                $this->db->update('tbl02_suratkontrol',$batal);
    
                $lz=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
                $data=json_decode(hasil($lz));
    
                $res=json_encode(array('metaData'=>$arr->metaData,'response'=>$data));
            }
        }
        header('Content-Type: application/json');
        echo $res;
    }
    function hapuslokal($nosurat){
        $batal=array(
            'batal'=>1,
            'userbatal'=>$this->session->userdata('get_uid')
        );
        $this->db->where('noSuratKontrol',$nosurat);
        $this->db->update('tbl02_suratkontrol',$batal);
        $res=json_encode(array('metaData'=>array('code'=>201,'message'=>'Hapus Surat Kontrol /SPRI Berhasil')));
        header('Content-Type: application/json');
        echo $res;
    }
    function sep($nosep="")
    {
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $mulai=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;

        $res = $this->vclaim_model->getData("RencanaKontrol/nosep/$nosep",$header);
        // echo $res; exit;
        $arr=json_decode($res);
        if($arr->metaData->code==200){
            $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
            $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
        }
        header('Content-Type: application/json');
        echo $res;
    }
    function cetak($nokontrol){
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $mulai=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        
        $res = $this->vclaim_model->getData("RencanaKontrol/noSuratKontrol/".$nokontrol,$header);
        $arr=json_decode($res);
        if($arr->metaData->code==200){
            $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
            // print_r(json_decode(hasil($data))); exit;
            $this->load->view('cetak/v_print_surat_kontrol', json_decode(hasil($data)));
            // $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
        }else{
            // $this->load->view('cetak/v_print_sep_rj', $data);
            $row=$this->vclaim_model->getSuratKontrol($nokontrol);
            if($row->jnsKontrol==2) $jnsKontrol="Kontrol"; else $jnsKontrol="SPRI";
            // echo $jnsKontrol; exit;
            $data=array(
                'noSuratKontrol'=>$row->noSuratKontrol,
                'tglRencanaKontrol'=>$row->tglRencanaKontrol,
                'tglTerbit'=>'',
                'jnsKontrol'=>$row->jnsKontrol,
                'poliTujuan'=>'',
                'namaPoliTujuan'=>$row->namapoliKontrol,
                'kodeDokter'=>'',
                'namaDokter'=>$row->namaDokter,
                'flagKontrol'=>'',
                'kodeDokterPembuat'=>'',
                'namaDokterPembuat'=>'',
                'namaJnsKontrol'=>$jnsKontrol,
                'sep'=>array(
                    'noSep'=>'',
                    'tglSep'=>'',
                    'jnsPelayanan'=>'',
                    'poli'=>'',
                    'diagnosa'=>'',
                    'peserta'=>array(
                        'noKartu'=>'',
                        'nama'=>'',
                        'tglLahir'=>'',
                        'kelamin'=>'',
                        'hakKelas'=>'',
                    ),
                    'provUmum'=>array(
                        'kdProvider'=>'',
                        'nmProvider'=>''
                    ),
                    'provPerujuk'=>array(
                        'kdProviderPerujuk'=>'',
                        'nmProviderPerujuk'=>'',
                        'asalRujukan'=>'',
                        'noRujukan'=>'',
                        'tglRujukan'=>''
                    )
                )
            );
            $this->load->view('cetak/v_print_surat_kontrol', $data);
            // header('Content-Type: application/json');
            // echo $res;
        }
        
    }

    function listrencanakontrol($nokartu,$bulan="",$tahun="",$filter=2){
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
        // Create Signature
        $signature = hash_hmac('sha256', CONS_ID_VC."&".$tStamp, SECREET_ID_VC, true);
        $encodedSignature = base64_encode($signature);
        if(empty($tgl)) $mulai=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        if(empty($bulan)) $bulan=date('m');
        if(empty($tahun)) $tahun=date('Y');
        $res = $this->vclaim_model->getData("RencanaKontrol/ListRencanaKontrol/Bulan/$bulan/Tahun/$tahun/Nokartu/$nokartu/filter/$filter",$header);
        // echo $res; exit;
        $arr=json_decode($res);
        if($arr->metaData->code==200){
            $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
            $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
        }
        header('Content-Type: application/json');
        echo $res;
    }
}