<?php 
class Prb extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('vclaim_model');
        $this->load->model('users_model');
        $this->load->helper('lz');
        $ses_state = $this->users_model->cek_session_id();
        if(!$ses_state){  
            $response=array('code'=>201,'message'=>'Anda Belum Login Atau Session Expired');
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }
    function index(){
        $data=array(
            'contentTitle'=>'Data PRB (Pasien Rujuk Balik)',
        );
        $z = setNav("nav_7");
        $y['index_menu'] = 7;
        $view=array(
            'header'=>$this->load->view('template/header', '', true),
            'nav_sidebar'=>$this->load->view('template/nav_sidebar', $z, true),
            'content'=>$this->load->view('vclaim/prb', $data, true),
            'index_menu'=>6,
            'libjs'=>array(
                'js/prb.js'
            )
        );
        $this->load->view('template/theme', $view);
    }
    function nosrb($nosrb='',$nosep=''){
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
        $res = $this->vclaim_model->getData("prb/$nosrb/nosep/$nosep",$header);
        $arr=json_decode($res);
        if($arr->metaData->code==200){
            $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
            $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
        }
        header('Content-Type: application/json');
        echo $res;
    }
    function listprb($dari='',$sampai=''){
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
        if(empty($dari)) $dari=date('Y-m-d');
        if(empty($sampai)) $sampai=date('Y-m-d');
        // Generate Header
        $header = "";
        $header .= "X-cons-id: " . CONS_ID_VC . "\r\n";
        $header .= "X-timestamp: " . $tStamp . "\r\n";
        $header .= "X-signature: " . $encodedSignature ."\r\n";
        $header .= "user_key: ".KEY_VC;
        $res = $this->vclaim_model->getData("prb/tglMulai/$dari/tglAkhir/$sampai",$header);
        $arr=json_decode($res);
        if($arr->metaData->code==200){
            $data=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
            $res=json_encode(array('metaData'=>$arr->metaData,'response'=>json_decode(hasil($data))));
        }
        header('Content-Type: application/json');
        echo $res;
    }

    function insert(){
        $idx=$this->input->post('idx');
        if(count($idx)>=0){
            // echo $jmlobat;
            $idx=$this->input->post('idx');
            foreach ($idx as $i ) {
                $obat[]=array(
                    'kdObat'=>$this->input->post('kode'.$i),
                    'signa1'=>$this->input->post('signa1'.$i),
                    'signa2'=>$this->input->post('signa2'.$i),
                    'jmlObat'=>$this->input->post('jmlObat'.$i)
                );
            }
            
            // exit;
            $req=array(
                'request'=>array(
                    't_prb'=>array(
                        'noSep'=>$this->input->post('noSep'),
                        'noKartu'=>$this->input->post('noKartu'),
                        'alamat'=>$this->input->post('alamat'),
                        'email'=>$this->input->post('email'),
                        'programPRB'=>$this->input->post('programPRB'),
                        'kodeDPJP'=>$this->input->post('kodeDPJP'),
                        'keterangan'=>$this->input->post('keterangan'),
                        'saran'=>$this->input->post('saran'),
                        'user'=>$this->session->userdata('get_uid'),
                        'obat'=>$obat,
                    )
                )
            );
            // header('Content-Type: application/json');
            // echo json_encode($req);exit;
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
            $res=$this->vclaim_model->postData('PRB/insert',$header,json_encode($req));
            // echo $res; exit;
            $arr=json_decode($res);
            if(is_array($arr)){
                if($arr->metaData->code==200){
                    $lz=$this->vclaim_model->stringDecrypt(CONS_ID_VC.SECREET_ID_VC.$tStamp,$arr->response);
                    $data=json_decode(hasil($lz));
                    
                    $res=json_encode(array('metaData'=>$arr->metaData,'response'=>$data));
                }
            }
            
            header('Content-Type: application/json');
            echo $res;
        }
        
    }
    function addobat(){
        $data=array(
            'noSep'=>$this->input->post('noSep'),
            'kdObat'=>$this->input->post('kdObat'),
            'nmObat'=>$this->input->post('nmObat'),
            'user'=>$this->session->userdata('get_uid')
        );
        $this->db->insert('tbl02_tempobatprb',$data);
        $id=$this->db->insert_id();
        if($id){
            $res=array('status'=>true,'message'=>'Obat Berhasil Ditambahkan');
        }else{
            $res=array('status'=>false,'message'=>'Gagal menambahkan obat');
        }
        header('Content-Type: application/json');
        echo json_encode($res);
    }
    function listtempprb($nosep){
        $this->db->where('user',$this->session->userdata('get_uid'));
        $this->db->where('noSep',$nosep);
        $data=$this->db->get('tbl02_tempobatprb')->result();
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    function deletetempobat($idx){
        $this->db->where('idx',$idx);
        $this->db->delete('tbl02_tempobatprb');
        $res=array('status'=>true,'message'=>'Obat Berhasil di hapus');
        echo json_encode($res);
    }
}