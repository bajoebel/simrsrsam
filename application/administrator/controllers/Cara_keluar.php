<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Cara_keluar extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
        $this->load->model('cara_keluar_model');
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

            $y['contentTitle'] = "Cara Keluar";
            $x['content'] = $this->load->view('cara_keluar/main',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'administrator.php/login?sid='.$sid;
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
            $condition .= "WHERE cara_keluar LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);

        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE cara_keluar LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT * FROM tbl01_cara_keluar $condition ORDER BY idx";
        $SQL_Count = $this->cara_keluar_model->query_data("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment'] = $this->uri_segment;
        $config['base_url']    = base_url().'administrator.php/cara_keluar/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        echo "$SQL";
        $x['SQL'] = $this->cara_keluar_model->query_data("$SQL LIMIT $offset,$limit");
        $this->load->view('cara_keluar/getdata',$x);
    }

    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['idx']) &&
                    isset($_POST['cara_keluar'])
                ){
                    $idx = trim($this->input->post('idx',TRUE));
                    $cara_keluar = trim($this->input->post('cara_keluar',TRUE));

                    if($cara_keluar==""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Jenis pelayanan tidak boleh kosong.";                  
                    }else{
                        if($idx==""){
                            $params = array(
                                'cara_keluar' => $cara_keluar
                            );
                            $cekCommand = $this->cara_keluar_model->add_data($params); 
                            if($cekCommand){
                                $response['code'] = 200;
                                $response['message'] = "Simpan data sukses.";                                            
                            }else{
                                $response['code'] = 402;
                                $response['message'] = "Ops. Query simpan error!";               
                            }
                        }else{
                            $params = array('cara_keluar' => $cara_keluar);
                            $kondisi = array('idx' => $idx);

                            $cekCommand = $this->cara_keluar_model->update_data($params,$kondisi); 
                            if($cekCommand){
                                $response['code'] = 201;
                                $response['message'] = "Update data sukses.";                                            
                            }else{
                                $response['code'] = 403;
                                $response['message'] = "Ops. Query update error!";                                            
                            }
                        }
                    }    
                }else{
                    $response['code'] = 404;
                    $response['message'] = "Ops. Variable tidak ditemukan.";
                }
            }else{
                $response['code'] = 405;
                $response['message'] = "Ops. Method not allowed.";
            }
        }else{
            $response['code'] = 406;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
        }
        echo json_encode($response);
    }
    function hapus(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['idx'])){
                    $idx = trim($this->input->post('idx',TRUE));

                    if($idx==""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{
                        $kondisi = array('idx' => $idx);
                        $cekCommand = $this->cara_keluar_model->delete_data($kondisi); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Hapus data sukses.";                                            
                        }else{
                            $response['code'] = 402;
                            $response['message'] = "Ops. Query hapus error!";                             
                        }
                    }
                }else{
                    $response['code'] = 403;
                    $response['message'] = "Ops. Variable tidak ditemukan.";
                }
            }else{
                $response['code'] = 404;
                $response['message'] = "Ops. Method not allowed.";
            }
        }else{
            $response['code'] = 405;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
    
}
?>