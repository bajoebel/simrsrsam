<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kelurahan extends CI_Controller{
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
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Kelurahan";        
            $y['datProvinsi'] = $this->db->get('tbl01_provinsi'); 
            $y['datKabKota'] = $this->db->get('tbl01_kab_kota'); 
            $y['datKecamatan'] = $this->db->get('tbl01_kecamatan'); 

            $x['content'] = $this->load->view('kelurahan/template_table',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah!\\nSilahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function getKab(){
        $id_provinsi = $this->input->post('id_provinsi',true);
        $this->db->where('id_provinsi',$id_provinsi);
        $query = $this->db->get('tbl01_kab_kota');
        $data = array();
        foreach($query->result_array() as $x){
            $item_row['idx'] = $x['idx'];
            $item_row['nama_kab_kota'] = $x['nama_kab_kota'];
            array_push($data,$item_row);
        }
        echo json_encode($data); 
    }
    function getKec(){
        $id_provinsi = $this->input->post('id_kab_kota',true);
        $this->db->where('id_kab_kota',$id_provinsi);
        $query = $this->db->get('tbl01_kecamatan');
        $data = array();
        foreach($query->result_array() as $x){
            $item_row['idx'] = $x['idx'];
            $item_row['nama_kecamatan'] = $x['nama_kecamatan'];
            array_push($data,$item_row);
        }
        echo json_encode($data); 
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
            $condition .= "WHERE nama_provinsi LIKE '%$sLike%' OR nama_kab_kota LIKE '%$sLike%' OR nama_kecamatan LIKE '%$sLike%' OR nama_kelurahan LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);

        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE nama_provinsi LIKE '%$sLike%' OR nama_kab_kota LIKE '%$sLike%' OR nama_kecamatan LIKE '%$sLike%' OR nama_kelurahan LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT * FROM tbl01_kelurahan $condition ORDER BY idx";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'mr_registrasi.php/kelurahan/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('kelurahan/getdata',$x);
    }
    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['idx']) &&
                    isset($_POST['nama_kelurahan']) &&
                    isset($_POST['id_kecamatan']) &&
                    isset($_POST['nama_kecamatan']) &&
                    isset($_POST['id_kab_kota']) &&
                    isset($_POST['nama_kab_kota']) &&
                    isset($_POST['id_provinsi']) &&
                    isset($_POST['nama_provinsi'])
                ){
                    $params = array(
                        'idx' => trim($this->input->post('idx',TRUE)),
                        'nama_kelurahan' => trim($this->input->post('nama_kelurahan',TRUE)),
                        'id_kecamatan' => trim($this->input->post('id_kecamatan',TRUE)),
                        'nama_kecamatan' => trim($this->input->post('nama_kecamatan',TRUE)),
                        'id_kab_kota' => trim($this->input->post('id_kab_kota',TRUE)),
                        'nama_kab_kota' => trim($this->input->post('nama_kab_kota',TRUE)),
                        'id_provinsi' => trim($this->input->post('id_provinsi',TRUE)),
                        'nama_provinsi' => trim($this->input->post('nama_provinsi',TRUE))
                    );

                    if($params['idx'] == ""){
                        $cekCommand = $this->db->insert('tbl01_kelurahan',$params); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Simpan data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";                                            
                        }
                    }else{
                        $this->db->where('idx', $params['idx']);
                        $cekCommand = $this->db->update('tbl01_kelurahan',$params); 
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
                if(isset($_POST['idx'])){
                    if($_POST['idx'] == ""){
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{
                        $cekCommand = $this->db->query("DELETE FROM tbl01_kelurahan WHERE idx = '$_POST[idx]'"); 
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
