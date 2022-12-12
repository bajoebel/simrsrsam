<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class stok_lokasi extends CI_Controller {
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
        $this->session->unset_userdata('sKDLOKASI');

        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_8");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['index_menu'] = 8;
            $y['contentTitle'] = "Data Stok Obat / Alkes Per Lokasi Obat";
            
            $y['datLokasi'] = $this->db->get("tbl04_lokasi");
            $x['content'] = $this->load->view('stok_lokasi/template_table',$y,true);
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

        if(isset($_POST['KDLOKASI'])):
            $KDLOKASI = $this->input->post('KDLOKASI');
            $this->session->set_userdata('sKDLOKASI',$KDLOKASI);
        else:
            $KDLOKASI = ($this->session->userdata('sKDLOKASI')) ? $this->session->userdata('sKDLOKASI') : "";
        endif;

        $limit = $this->perPage;
        $condition = "";
        if(isset($_POST['sLike'])){
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $this->session->set_userdata('sLike',$sLike);
            if($KDLOKASI==""){
                $condition .= "WHERE NMBRG LIKE '%$sLike%'";
            }else{
                $condition .= "WHERE NMBRG LIKE '%$sLike%' AND a.KDLOKASI = '$KDLOKASI'";
            }
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                if($KDLOKASI==""){
                    $condition .= "WHERE NMBRG LIKE '%$sLike%'";
                }else{
                    $condition .= "WHERE NMBRG LIKE '%$sLike%' AND a.KDLOKASI = '$KDLOKASI'";
                }
            }
        }
        
        $SQL = "SELECT a.KDBRG,b.NMBRG,b.KDSATUAN,b.NMSATUAN,a.TGLBELI,a.HMODAL,SUM(a.JSTOK) AS JSTOK,
        a.KDLOKASI,c.NMLOKASI
        FROM stok_barang_fifo a 
        JOIN tbl04_barang b ON a.KDBRG=b.KDBRG
        LEFT JOIN tbl04_lokasi c ON a.KDLOKASI=c.KDLOKASI
        $condition GROUP BY a.KDBRG,a.KDLOKASI";
        echo $SQL;
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'farmasi.php/stok_lokasi/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);
        
        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('stok_lokasi/getdata',$x);
    } 
}
