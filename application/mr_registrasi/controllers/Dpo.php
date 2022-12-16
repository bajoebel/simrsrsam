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
            $y['index_menu'] = 12; 
            $x['header'] = $this->load->view('template/header','',true);
            $action = "<div class=\'btn-group\'><button onclick=\'editDpo({{Id}})\' class=\'btn btn-warning btn-sm\'><span class=\'fa fa-pencil\'></span> Edit</button><button onclick=\'hapusDpo({{Id}})\' class=\'btn btn-danger btn-sm\'><span class=\'fa fa-remove\'></span> Hapus</button></div>";
            $config = array(
                'url'           => 'mr_registrasi.php/dpo/datadpo',
                'variable'      => array('Id' => 'Id','status_dpo'=>'status_dpo'),
                'field'         =>  array('nomr', 'nama', 'keterangan','=verifikasi[{{status_dpo}}]','user_verifikasi','tgl_entri_dpo'),
                'function'      => 'getData',
                'keyword_id'    => 'q',
                'param_id'      => 'param',
                'limit_id'      => 'limit',
                'data_id'       => 'data',
                'page_id'       => 'pagination',
                'number'        => true,
                'action'        => true,
                'load'          => true,
                'action_button' => $action,
            );
            $z = setNav("nav_7");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['contentTitle'] = "List Pasien DPO";
            $x['content'] = $this->load->view('registrasi/v_dpo',$y,true);
            $x['getData']="var verifikasi = {'0':'DPO','1':'Selesai'};".getData($config);
            // echo $x['getData']; exit;
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
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){  
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
        }
        else{
            $response = array(
                'status'    => true,
                'message'   => "Session Expired "
            );
        }  
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function hapus($id){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){  
            $this->db->where('Id',$id)->delete('tbl01_dpo_rs');
            $response = array(
                'status'    => true,
                'message'   => "Hapus Data DPO Berhasil",
            );
        }
        else{
            $response = array(
                'status'    => true,
                'message'   => "Session Expired "
            );
        }  
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function edit($id){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){  
            
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'data'      => $this->Dpo_model->editDpo($id),
            );
        }
        else{
            $response = array(
                'status'    => true,
                'message'   => "Session Expired "
            );
        }  
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function caripasien(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $nomr=$this->input->get('nomr');
            $param=$this->input->get('param');
            if($param=="nomr") $response = $this->db->like('nomr',$nomr)->order_by('nomr')->limit(20)->get('tbl01_pasien')->result();
            else $response = $this->db->like('nama',$nomr)->order_by('nomr')->limit(20)->get('tbl01_pasien')->result();
            // print_r($response);
        }
        else{
            $response = array(
                'status'    => true,
                'message'   => "Session Expired "
            );
        }  
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){  
            $id=$this->input->post('Id');
            $data=array(
                'nomr'=>$this->input->post('nomr'),
                'nama'=>$this->input->post('nama'),
                'keterangan'=>$this->input->post('keterangan'),
                'status_dpo'=>$this->input->post('status_dpo'),
                'tgl_entri_dpo'=>date('Y-m-d H:i:s'),
            );
            if(!empty($id)){
                $this->db->where('Id',$id)->update('tbl01_dpo_rs',$data);
                $pesan="Data DPO Berhasil Di Update";
                
            }else{
                $this->db->insert('tbl01_dpo_rs',$data);
                $pesan="Data DPO Berhasil Di Simpan";
            }
            $response = array(
                'status'    => true,
                'message'   => $pesan,
            );
        }
        else{
            $response = array(
                'status'    => true,
                'message'   => "Session Expired "
            );
        }  
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}