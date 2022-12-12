<?php defined('BASEPATH') OR exit('No direct script access allowed');
class group_lokasi extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
    }
    function index(){
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        $y['index_menu'] = 4;
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_4");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Group Lokasi";

            $x['content'] = $this->load->view('group_lokasi/template_table',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'administrator.php/login?sid='.$sid;
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
            $condition .= "WHERE GRLOKASI LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);

        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE GRLOKASI LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT * FROM tbl04_group_lokasi $condition ORDER BY KDGRLOKASI";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'farmasi.php/group_lokasi/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('group_lokasi/getdata',$x);
    }

    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['KDGRLOKASI'])){
                    if($_POST['KDGRLOKASI'] == ""){
                        $params = array(
                            'GRLOKASI' => $this->input->post('GRLOKASI',TRUE)
                        );
                        $cekCommand = $this->db->insert('tbl04_group_lokasi',$params); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Simpan data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";     
                        }
                    }else{
                        $params = array(
                            'GRLOKASI' => $this->input->post('GRLOKASI',TRUE)
                        );
                        $this->db->where('KDGRLOKASI',  $this->input->post('KDGRLOKASI',TRUE));
                        $cekCommand = $this->db->update('tbl04_group_lokasi',$params); 
                        if($cekCommand){
                            $response['code'] = 201;
                            $response['message'] = "Update data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                }else{
                    $response['code'] = 404;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 405;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 406;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

    function hapus(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['KDGRLOKASI'])){
                    if($_POST['KDGRLOKASI'] == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{
                        $queAvailable = "SELECT * FROM tbl04_lokasi WHERE KDGRLOKASI = '$_POST[KDGRLOKASI]'";
                        $cekAvailable = $this->db->query("$queAvailable");
                        if ($cekAvailable->num_rows() > 0) {
                            $resAvailable = $cekAvailable->row_array();
                            $response['code'] = 402;
                            $response['message'] = "Ops. Data tidak bisa dihapus. group digunakan data lokasi (".$resAvailable['NMLOKASI'].").";
                        }else{
                            $queCommand = "DELETE FROM tbl04_group_lokasi WHERE KDGRLOKASI = '$_POST[KDGRLOKASI]'";
                            $cekCommand = $this->db->query("$queCommand"); 
                            if($cekCommand){
                                $response['code'] = 200;
                                $response['message'] = "Hapus data sukses.";  
                            }else{
                                $response['code'] = 403;
                                $response['message'] = "Ops. Query error! Silahkan hubungi farmasi.";       
                            }
                        }
                    }
                }else{
                    $response['code'] = 404;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 405;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 406;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
}
?>