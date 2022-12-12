<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wilayah extends CI_Controller{
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
        $y['index_menu'] = 2;
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "wilayah";
            $x['content'] = $this->load->view('wilayah/template_table',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
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
            $condition .= " WHERE provinsi LIKE '%$sLike%'";
            $condition .= " OR kabkota LIKE '%$sLike%'";
            $condition .= " OR nama_kabkota LIKE '%$sLike%'";
            $condition .= " OR kecamatan LIKE '%$sLike%'";
            $condition .= " OR desa LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);

        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE provinsi LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT * FROM tbl01_wilayah $condition ORDER BY wilayah_id";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'mr_registrasi.php/wilayah/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('wilayah/getdata',$x);
    }
    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['wilayah_id'])){
                    if($_POST['wilayah_id'] == ""){
                        $this->db->select('wilayah_id');
                        $this->db->order_by('wilayah_id','DESC');
                        $this->db->limit(1);
                        $d=$this->db->get('tbl01_wilayah')->row();
                        if(!empty($d)) {
                            $id=intval($d->wilayah_id)+1;
                            $wilayah_id=str_pad($id, 5,'0',STR_PAD_LEFT);
                        }
                        else $wilayah_id='00001';
                        $params = array(
                            'wilayah_id'=> $wilayah_id,
                            'provinsi'  => $this->input->post('provinsi',TRUE),
                            'kabkota'   => $this->input->post('kabkota',TRUE),
                            'nama_kabkota' => $this->input->post('nama_kabkota',TRUE),
                            'kecamatan' => $this->input->post('kecamatan',TRUE),
                            'desa'      => $this->input->post('desa',TRUE)
                        );
                        $cekCommand = $this->db->insert('tbl01_wilayah',$params); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Simpan data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }else{
                        $params = array(
                            'provinsi'  => $this->input->post('provinsi',TRUE),
                            'kabkota'   => $this->input->post('kabkota',TRUE),
                            'nama_kabkota' => $this->input->post('nama_kabkota',TRUE),
                            'kecamatan' => $this->input->post('kecamatan',TRUE),
                            'desa'      => $this->input->post('desa',TRUE)
                        );
                        $this->db->where('wilayah_id',  $this->input->post('wilayah_id',TRUE));
                        $cekCommand = $this->db->update('tbl01_wilayah',$params); 
                        if($cekCommand){
                            $response['code'] = 201;
                            $response['message'] = "Update data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";           
                        }
                    }
                }else{
                    $response['code'] = 401;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
    function hapus(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['wilayah_id'])){
                    if($_POST['wilayah_id'] == ""){
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{
                        $cekCommand = $this->db->query("DELETE FROM tbl01_wilayah WHERE wilayah_id = '$_POST[wilayah_id]'"); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Hapus data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";   
                        }
                    }
                }else{
                    $response['code'] = 401;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }    
}
