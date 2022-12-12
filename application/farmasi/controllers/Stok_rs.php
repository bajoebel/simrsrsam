<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class stok_rs extends CI_Controller {
    public function __construct(){
        parent::__construct();
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
        
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_8");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['index_menu'] = 8;
            $UID = $this->session->userdata('get_uid');

            $y['contentTitle'] = "Data Stok Obat / Alkes Instalasi Farmasi";

            $x['content'] = $this->load->view('stok_rs/template_table',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
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
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "WHERE NMKTBRG LIKE '%$sLike%' OR NMBRG LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE NMKTBRG LIKE '%$sLike%' OR NMBRG LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT a.*,IFNULL(SUM(JSTOK),0) AS JMLSTOK
        FROM tbl04_barang a 
        LEFT JOIN stok_barang_fifo b ON a.KDBRG = b.KDBRG
        $condition GROUP BY a.KDBRG";
        
        $SQLDetail = "SELECT a.KDLOKASI,c.NMLOKASI,a.KDBRG,SUM(a.JSTOK) AS JSTOK,a.KDLOKASI,c.NMLOKASI
        FROM stok_barang_fifo a 
        LEFT JOIN tbl04_lokasi c ON a.KDLOKASI=c.KDLOKASI
        LEFT JOIN tbl04_barang d ON a.KDBRG=d.KDBRG
        $condition GROUP BY a.KDBRG,a.KDLOKASI";

        echo $SQLDetail;
        
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'farmasi.php/stok_rs/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL ORDER BY NMBRG LIMIT $offset,$limit");
        $x['SQLDetail'] = $this->db->query("$SQLDetail");
        $this->load->view('stok_rs/getdata',$x);
    } 
}
