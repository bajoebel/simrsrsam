<?php 
class Dpo extends CI_Controller{
    function __construct(){
       parent::__construct();
        $this->load->model('users_model');
        $this->load->model('Dpo_model');
    }
    
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){  
            $y['index_menu'] = 5; 
            $x['header'] = $this->load->view('template/header','',true);
            
            $z = setNav("nav_7");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['contentTitle'] = "List Pasien DPO";
            $x['content'] = $this->load->view('registrasi/v_dpo',$y,true);
            $this->load->view('template/theme',$x);  
        }
        else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }         
        //$this->template->pendaftaran('pendaftaran/v_pendaftaranonline',$x);
        //print_r($data);
    }

    function datadpo(){
        $q = urldecode($this->input->get('keyword', TRUE));
        $index=intval($this->input->get('start'));
        $limit=intval($this->input->get('limit'));
        $start=($index*$limit)-$limit;
        //$res = $this->Aplicares_model->getDatars($start,$limit);
        $response = array(
            'status'    => true,
            'message'   => "OK",
            'start'     => $start,
            'row_count' => $this->Dpo_model->countDpo($q),
            'limit'     => $limit,
            'data'      => $this->Dpo_model->getDataDpo($start, $limit, $q),
        );
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
        
}