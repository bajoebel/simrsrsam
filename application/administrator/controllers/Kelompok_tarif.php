<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Kelompok_tarif extends CI_Controller{
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
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $x['header'] = $this->load->view('template/header','',true);

            $y['contentTitle'] = "Kelompok Tarif";        
            $y['breadcrumbTitle'] = "Master";   

            $x['content'] = $this->load->view('kelompok_tarif/main',$y,true);
            $this->load->view('kelompok_tarif/template_table',$x);
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
            $condition .= "WHERE kelompokJasaDesc LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);

        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE kelompokJasaDesc LIKE '%$sLike%'";
            }
        }

        $SQL = "select * from kelompok_jasa $condition ORDER BY kelompokJasaId";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'kelompok_tarif/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);
        echo $SQL . " LIMIT $offset,$limit";
        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('kelompok_tarif/getdata',$x);
    }

    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['kelompokJasaId'])){
                    if($_POST['kelompokJasaId'] == ""){
                        $params = array(
                            'kelompokJasaDesc' => $this->input->post('kelompokJasaDesc',TRUE)
                        );
                        $cekCommand = $this->db->insert('kelompok_jasa',$params); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Simpan data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";                                            
                        }
                    }else{
                            $params = array(
                                'kelompokJasaDesc' => $this->input->post('kelompokJasaDesc',TRUE),
                                'profId' => $this->input->post('profId',TRUE)
                            );
                            $this->db->where('kelompokJasaId',  $this->input->post('kelompokJasaId',TRUE));
                            $cekCommand = $this->db->update('kelompok_jasa',$params); 
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
                    $response['message'] = "Ops. Ada keselahan permintaan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 402;
                $response['message'] = "Ops. Ada keselahan permintaan. Coba ulangi kembali.";
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
                if(isset($_POST['kelompokJasaId'])){
                    if($_POST['kelompokJasaId'] == ""){
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{                            
                        $validQuery = $this->db->query("SELECT kelompokJasaId FROM tarif_layanan WHERE kelompokJasaId = '$_POST[kelompokJasaId]'");
                        if($validQuery->num_rows() > 0){
                            $response['code'] = 403;
                            $response['message'] = "Ops. data tidak bisa di hapus! Record digunakan pada tarif layanan.";                                                                        
                        }else{
                            $cekCommand = $this->db->query("DELETE FROM kelompok_jasa WHERE kelompokJasaId = '$_POST[kelompokJasaId]'"); 
                            if($cekCommand){
                                $response['code'] = 200;
                                $response['message'] = "Hapus data sukses.";                                            
                            }else{
                                $response['code'] = 501;
                                $response['message'] = "Ops. Query error! Silahkan hubungi administrator."; 
                            }                            
                        }
                    }
                }else{
                    $response['code'] = 401;
                    $response['message'] = "Ops. Ada keselahan permintaan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 402;
                $response['message'] = "Ops. Ada keselahan permintaan. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
    
}
