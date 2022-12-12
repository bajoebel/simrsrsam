<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Bahasa extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
        $this->load->model('bahasa_model');
    }
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        $y['index_menu'] = 2;
        if($ses_state){
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $x['header'] = $this->load->view('template/header','',true);

            $y['contentTitle'] = "Bahasa Daerah";
            
            $x['content'] = $this->load->view('bahasa/main',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'administrator.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah!\\nSilahkan login kembali');
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
            $condition .= "WHERE bahasa LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE bahasa LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT * FROM tbl01_bahasa $condition ORDER BY idx";
        $SQL_Count = $this->bahasa_model->query_data("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'administrator.php/bahasa/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        echo "$SQL";
        $x['SQL'] = $this->bahasa_model->query_data("$SQL LIMIT $offset,$limit");
        $this->load->view('bahasa/getdata',$x);
    }

    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['idx']) &&
                    isset($_POST['bahasa'])
                ){
                    $idx = trim($this->input->post('idx',TRUE));
                    $bahasa = trim($this->input->post('bahasa',TRUE));

                    if($bahasa==""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Nama bahasa tidak boleh kosong.";                  
                    }else{
                        if($idx==""){
                            $params = array(
                                'bahasa' => $bahasa
                            );
                            $cekCommand = $this->bahasa_model->add_data($params); 
                            if($cekCommand){
                                $response['code'] = 200;
                                $response['message'] = "Simpan data sukses.";                                            
                            }else{
                                $response['code'] = 402;
                                $response['message'] = "Ops. Query simpan error!";                  
                            }                      
                        }else{
                            $params = array('bahasa' => $bahasa);
                            $kondisi = array('idx' => $idx);
                            $cekCommand = $this->bahasa_model->update_data($params,$kondisi); 
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
                        $response['message'] = "Ops. Data empty! Coba ulangi kembali.";
                    }else{
                        $kondisi = array('idx' => $idx);
                        $cekCommand = $this->bahasa_model->delete_data($kondisi); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Hapus data sukses.";                                            
                        }else{
                            $response['code'] = 402;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                }else{
                    $response['code'] = 403;
                    $response['message'] = "Ops. Variable tidak ditemukan";
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