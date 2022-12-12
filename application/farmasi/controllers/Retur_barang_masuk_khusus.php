<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class retur_barang_masuk_khusus extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $CI =& get_instance();
        $CI->load->library('ajax_page');
        $this->load->model('users_model');
    }
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_5");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['index_menu'] = 5;
            $y['contentTitle'] = "Retur Transaksi Barang Pinjaman";
            $x['content'] = $this->load->view('retur_barang_masuk_khusus/template_table',$y,true);
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
            $condition .= "WHERE KDBMK LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE KDBMK LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT * FROM tbl04_barang_masuk_khusus_batal $condition ORDER BY DTBMK_RET DESC";
        
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getData';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'retur_barang_masuk_khusus/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);
        
        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('retur_barang_masuk_khusus/getdata',$x);
    }

    function cetak(){
        $KDBMK_RET = (isset($_GET['kode'])) ? $_GET['kode'] : ""; 
        $SQL_MAIN = "SELECT * FROM tbl04_barang_masuk_khusus_batal 
        WHERE KDBMK_RET = '$KDBMK_RET'";
        $cek = $this->db->query("$SQL_MAIN");
        if($cek->num_rows() > 0){
            $x['res'] = $cek->row_array();
            $res1 = $cek->row_array();
            $SQL = "SELECT * FROM tbl04_barang_masuk_khusus_batal_detail 
            WHERE KDBMK_RET = '$KDBMK_RET' ORDER BY NMBRG";
            $dataPreview = $this->db->query("$SQL");
            $x['dataPreview'] = $dataPreview;

            $this->load->view('retur_barang_masuk_khusus/print_preview',$x);
        }else{
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                history.back();
            </script>";
        }  
    }
    
}