<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dtd extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
        $this->load->model('dtd_model');
    }
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        $y['index_menu'] = 5;
        if($ses_state){
            $z = setNav("nav_5");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $x['header'] = $this->load->view('template/header','',true);

            $y['contentTitle'] = "Kelompok DTD KIP/10";
            
            $x['content'] = $this->load->view('dtd/main',$y,true);
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
            $condition .= "WHERE DTD LIKE '%$sLike%' OR Grup_ICD LIKE '%$sLike%' OR Morbiditas LIKE '%$sLike%' OR kecelakaan LIKE '%$sLike%' ";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE DTD LIKE '%$sLike%' OR Grup_ICD LIKE '%$sLike%' OR Morbiditas LIKE '%$sLike%' OR kecelakaan LIKE '%$sLike%' ";
            }
        }

        $SQL = "SELECT * FROM tbl01_morbiditas $condition ORDER BY ABS(kecelakaan),DTD";
        $SQL_Count = $this->dtd_model->query_data("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'administrator.php/dtd/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        echo "$SQL";
        $x['SQL'] = $this->dtd_model->query_data("$SQL LIMIT $offset,$limit");
        $this->load->view('dtd/getdata',$x);
    }


    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['Aksi']) &&
                    isset($_POST['DTD']) &&
                    isset($_POST['Grup_ICD']) &&
                    isset($_POST['Morbiditas']) &&
                    isset($_POST['kecelakaan'])
                ){
                    $aksi = trim($this->input->post('Aksi',TRUE));
                    $params = array(
                        'DTD' => trim($this->input->post('DTD',TRUE)),
                        'Grup_ICD' => trim($this->input->post('Grup_ICD',TRUE)),
                        'Morbiditas' => trim($this->input->post('Morbiditas',TRUE)),
                        'kecelakaan' => trim($this->input->post('kecelakaan',TRUE))
                    );

                    if($params['DTD']==""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. No.DTD tidak boleh kosong.";                  
                    }elseif($params['Grup_ICD']==""){
                        $response['code'] = 402;
                        $response['message'] = "Ops. Group ICD tidak boleh kosong.";                  
                    }elseif($params['Morbiditas']==""){
                        $response['code'] = 403;
                        $response['message'] = "Ops. Morbiditas / Golongan Sebab Penyakit tidak boleh kosong.";                  
                    }else{
                        if($aksi=="Simpan"){
                            $this->db->where('DTD',$params['DTD']);
                            $cekRecord = $this->db->get('tbl01_morbiditas');
                            if ($cekRecord->num_rows() > 0) {
                                $resArr = $cekRecord->row_array();
                                $response['code'] = 404;
                                $response['message'] = "Ops. No.DTD sudah ada!\nSilahkan entry No.DTD lainnya.\nMorbiditas : ".$resArr['Morbiditas']."\nGroup ICD : ".$resArr['Grup_ICD'];
                            }else{
                                $cekCommand = $this->dtd_model->add_data($params); 
                                if($cekCommand){
                                    $response['code'] = 200;
                                    $response['message'] = "Simpan data sukses.";                                            
                                }else{
                                    $response['code'] = 405;
                                    $response['message'] = "Ops. Query simpan error! $cekCommand";                  
                                }
                            }                                           
                        }elseif($aksi=="Update"){
                            $paramWhere = array('DTD' => $params['DTD']);
                            $cekCommand = $this->dtd_model->update_data($params,$paramWhere); 
                            if($cekCommand){
                                $response['code'] = 201;
                                $response['message'] = "Update data sukses.";                                            
                            }else{
                                $response['code'] = 405;
                                $response['message'] = "Ops. Query update error!";
                            }
                        }else{
                            $response['code'] = 406;
                            $response['message'] = "Ops. Aksi tidak dikenal!";
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
                    $DTD = trim($this->input->post('idx',TRUE));
                    
                    if($DTD==""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Data empty! Coba ulangi kembali.";
                    }else{
                        $kondisi = array('DTD' => $DTD);
                        $cekCommand = $this->dtd_model->delete_data($kondisi); 
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
