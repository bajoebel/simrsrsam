<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class kwitansi_batal extends CI_Controller {
    public function __construct(){
        parent ::__construct();
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
            $y['index_menu'] = 4;
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_5");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            
            $y['contentTitle'] = "Kwitansi Batal";        
            $x['content'] = $this->load->view('kwitansi_batal/template_table',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'kasir.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
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
            $condition .= "WHERE no_kwitansi LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);
            
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE no_kwitansi LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT * FROM tbl05_kwitansi_retur $condition ORDER BY tgl_retur DESC";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'kasir.php/kwitansi_batal/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);
        
        // echo "$SQL LIMIT $offset,$limit";
        
        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('kwitansi_batal/getdata',$x);
    }    
}
