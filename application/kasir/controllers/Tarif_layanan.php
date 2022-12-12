<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class tarif_layanan extends CI_Controller {
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
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        $y['index_menu'] = 2;
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Tarif layanan";        
            $x['content'] = $this->load->view('tarif_layanan/template_table',$y,true);
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
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "WHERE layanan LIKE '%$sLike%' OR kategori_tarif LIKE '%$sLike%' OR kelas_layanan LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE layanan LIKE '%$sLike%' OR kategori_tarif LIKE '%$sLike%' OR kelas_layanan LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT * FROM tbl01_tarif_layanan $condition ORDER BY layanan ASC";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'kasir.php/tarif_layanan/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('tarif_layanan/getdata',$x);
    }
}

