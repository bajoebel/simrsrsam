<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class lokasi extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
    }
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_3");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['index_menu'] = 3;
            $y['contentTitle'] = "Lokasi Barang";
            $y['getGroupLokasi'] = $this->db->get('tbl04_group_lokasi');
            
            $x['content'] = $this->load->view('lokasi/template_table',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
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
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "WHERE a.NMLOKASI LIKE '%$sLike%' OR a.GRLOKASI LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE a.NMLOKASI LIKE '%$sLike%' OR a.GRLOKASI LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT a.*,b.GRLOKASI FROM tbl04_lokasi a 
        LEFT JOIN tbl04_group_lokasi b ON a.KDGRLOKASI=b.KDGRLOKASI $condition ORDER BY KDLOKASI";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'farmasi.php/lokasi/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('lokasi/getdata',$x);
    }  
}
?>