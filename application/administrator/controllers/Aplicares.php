<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Aplicares extends CI_Controller {
    public function __construct(){
        parent ::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
        $this->load->model('Aplicares_model');
    }
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $ses_state = $this->users_model->cek_session_id();
            
            $y['index_menu'] = 2;
            if($ses_state){
                $z = setNav("nav_2");
                $y['contentTitle'] = "Ketersediaan Tempat Tidur Di BPJS";
                $y['kelas']=$this->Aplicares_model->getKelas();
                //print_r($y['kelas']); exit;
                $view=array(
                    'nav_sidebar'=>$this->load->view('template/nav_sidebar',$z,true),
                    'header'=>$this->load->view('template/header','',true),
                    'content'=>$this->load->view('aplicares/index',$y,true)
                );
                $this->load->view('template/theme',$view);
            }else{
                $sid = getSessionID();
                $url_login = base_url().'administrator.php/login?sid='.$sid;
                echo "<script>alert('Ops. Sesi anda telah berubah!\\nSilahkan login kembali');
                window.location.href = '$url_login';</script>";
            }
        }
    }
    function updatebed(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $ses_state = $this->users_model->cek_session_id();
            
            $y['index_menu'] = 2;
            if($ses_state){
                $data=array(
                    'kodekelas'=>$this->input->post('kodekelas'),
                    'koderuang'=>$this->input->post('koderuang'),
                    'namaruang'=>$this->input->post('namaruang'),
                    'kapasitas'=>$this->input->post('kapasitas'),
                    'tersedia'=>$this->input->post('tersedia'),
                    'tersediapria'=>$this->input->post('tersediapria'),
                    'tersediawanita'=>$this->input->post('tersediawanita'),
                    'tersediapriawanita'=>$this->input->post('tersediapriawanita'),
                );
                $jsonData=json_encode($data);
                // header('Content-Type: application/json');
                // echo $jsonData;exit;
                $url = $this->Aplicares_model->webServiceURL() . "aplicaresws/rest/bed/update/".KODERS_VC;
                //echo $url; exit;
                $response = $this->Aplicares_model->http_request($url,$jsonData);
            }else{
                $response=json_encode(array('status'=>false,'message'=>'Session Expired'));
            }
            header('Content-Type: application/json');
            echo $response;
        }
    }
    function autoupdate(){
        $data=$this->Aplicares_model->getdatabed();
        // header('Content-Type: application/json');
        // echo json_encode($data);exit;
        foreach ($data as $d ) {
            $res=array(
                'kodekelas'=>$d->kodekelas,
                'koderuang'=>$d->koderuang,
                'namaruang'=>$d->namaruang,
                'kapasitas'=>$d->kapasitas,
                'tersedia'=>intval($d->tersediapria) + intval($d->tersediawanita)+intval($d->tersediapriawanita),
                'tersediapria'=>$d->tersediapria,
                'tersediawanita'=>$d->tersediawanita,
                'tersediapriawanita'=>$d->tersediapriawanita,
            );
            $jsonData=json_encode($res);
            // header('Content-Type: application/json');
            // echo $jsonData;exit;
            $url = $this->Aplicares_model->webServiceURL() . "aplicaresws/rest/bed/update/".KODERS_VC;
            //echo $url; exit;
            $response = $this->Aplicares_model->http_request($url,$jsonData);
            $arr=json_decode($response);
            if($arr->metadata->code==1) echo $arr->metadata->message ."<br>";
            else{
                $url = $this->Aplicares_model->webServiceURL() . "aplicaresws/rest/bed/create/".KODERS_VC;
                //echo $url; exit;
                $res = $this->Aplicares_model->http_request($url,$jsonData);
                $arr1=json_decode($res);
                echo $arr1->metadata->message ."<br>";
            }
            // print_r($res);
            // echo "<br>";
        }
    }
    function export(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $ses_state = $this->users_model->cek_session_id();
            
            $y['index_menu'] = 2;
            if($ses_state){
                $data=array(
                    'kodekelas'=>$this->input->post('kodekelas'),
                    'koderuang'=>$this->input->post('koderuang'),
                    'namaruang'=>$this->input->post('namaruang'),
                    'kapasitas'=>$this->input->post('kapasitas'),
                    'tersedia'=>$this->input->post('tersedia'),
                    'tersediapria'=>$this->input->post('tersediapria'),
                    'tersediawanita'=>$this->input->post('tersediawanita'),
                    'tersediapriawanita'=>$this->input->post('tersediapriawanita'),
                );
                $jsonData=json_encode($data);
                // header('Content-Type: application/json');
                // echo $jsonData;exit;
                $url = $this->Aplicares_model->webServiceURL() . "aplicaresws/rest/bed/create/".KODERS_VC;
                //echo $url; exit;
                $response = $this->Aplicares_model->http_request($url,$jsonData);
            }else{
                $response=json_encode(array('status'=>false,'message'=>'Session Expired'));
            }
            header('Content-Type: application/json');
            echo $response;
        }
    }
    function hapus(){
        $data=array(
            'kodekelas'=>$this->input->post('kodekelas'),
            'koderuang'=>$this->input->post('koderuang')
        );
        $jsonData=json_encode($data);
        $url = $this->Aplicares_model->webServiceURL() . "aplicaresws/rest/bed/delete/".KODERS_VC;
        $response = $this->Aplicares_model->http_request($url,$jsonData);
        header('Content-Type: application/json');
        echo $response;
    }
    function databed(){
        $index=intval($this->input->get('start'));
        $limit=intval($this->input->get('limit'));
        $start=($index*$limit)-$limit+1;
        $res = $this->Aplicares_model->getData($start,$limit);
        header('Content-Type: application/json');
        echo $res;
    }
    function databedrs(){
        $q = urldecode($this->input->get('keyword', TRUE));
        $index=intval($this->input->get('start'));
        $limit=intval($this->input->get('limit'));
        $start=($index*$limit)-$limit;
        //$res = $this->Aplicares_model->getDatars($start,$limit);
        $response = array(
            'status'    => true,
            'message'   => "OK",
            'start'     => $start,
            'row_count' => $this->Aplicares_model->countDatars($q),
            'limit'     => $limit,
            'data'      => $this->Aplicares_model->getDatars($start, $limit, $q),
        );
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function datakelas(){
        $res = $this->Aplicares_model->getKelas();
        header('Content-Type: application/json');
        echo $res;
    }
    function kemkes(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $ses_state = $this->users_model->cek_session_id();
            
            $y['index_menu'] = 2;
            if($ses_state){
                $z = setNav("nav_2");
                $y['contentTitle'] = "Ketersediaan Tempat Tidur Di BPJS";
                $y['kelas']=$this->Aplicares_model->getKelas();
                //print_r($y['kelas']); exit;
                $view=array(
                    'nav_sidebar'=>$this->load->view('template/nav_sidebar',$z,true),
                    'header'=>$this->load->view('template/header','',true),
                    'content'=>$this->load->view('aplicares/kemkes',$y,true)
                );
                $this->load->view('template/theme',$view);
            }else{
                $sid = getSessionID();
                $url_login = base_url().'administrator.php/login?sid='.$sid;
                echo "<script>alert('Ops. Sesi anda telah berubah!\\nSilahkan login kembali');
                window.location.href = '$url_login';</script>";
            }
        }
    }
    function datakemkes(){
        $res = $this->Aplicares_model->requestKemkes();
        header('Content-Type: application/json');
        echo $res;    
    }

    function insertsiranap(){
        $data=array(
            'id_tt'=>$this->input->post('id_tt'),
            'ruang'=>$this->input->post('ruang'),
            'jumlah_ruang'=>$this->input->post('jumlah_ruang'),
            'jumlah'=>$this->input->post('jumlah'),
            'terpakai'=>$this->input->post('terpakai'),
            'antrian'=>0,
            'prepare'=>0,
            'prepare_plan'=>0,
            'covid'=>0
        );
        $res = $this->Aplicares_model->requestKemkes("POST","http://sirs.kemkes.go.id/fo/index.php/Fasyankes",$data);
        header('Content-Type: application/json');
        echo $res;   
    }

    function updatesiranap(){
        $data=array(
            'id_tt'=>$this->input->post('id_tt'),
            'ruang'=>$this->input->post('ruang'),
            'jumlah_ruang'=>$this->input->post('jumlah_ruang'),
            'jumlah'=>$this->input->post('jumlah'),
            'terpakai'=>$this->input->post('terpakai'),
            'antrian'=>0,
            'prepare'=>0,
            'prepare_plan'=>0,
            'covid'=>0
        );
        //print_r($data); exit;
        $res = $this->Aplicares_model->requestKemkes("PUT","http://sirs.kemkes.go.id/fo/index.php/Fasyankes",$data);
        header('Content-Type: application/json');
        echo $res;   
    }
    function loopkemkes(){
        $result=$this->Aplicares_model->getMapKemkes();
        //print_r($result); exit;
        foreach ($result as $data ) {
            $res = $this->Aplicares_model->requestKemkes("PUT","http://sirs.kemkes.go.id/fo/index.php/Fasyankes",$data);
            //echo $res;exit;
            $arr=json_decode($res);
            echo $arr->fasyankes[0]->message ."<br>";
            
        }
    }
}