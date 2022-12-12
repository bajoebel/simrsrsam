<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class pegawai extends CI_Controller {
    public function __construct(){
        parent ::__construct();
        $this->perPage = 15;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
    }

    public function index(){      
        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        $y['index_menu'] = 2;
        if($ses_state){
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $x['header'] = $this->load->view('template/header','',true);

            $y['contentTitle'] = "Pegawai";
            
            $y['get_profesi'] = $this->db->get('tbl01_profesi');   
            $y['get_agama'] = $this->db->get('tbl01_agama');  
            $x['content'] = $this->load->view('pegawai/template_table',$y,true); 
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'administrator.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }        
    }

    public function tambah(){      
        $ses_state = $this->users_model->cek_session_id();
        $NRP = $this->uri->segment(3);
        if($ses_state){
            $this->db->where('NRP',$NRP);
            $cekNum = $this->db->get('tbl01_pegawai');
            if($cekNum->num_rows() > 0){
                $resArr = $cekNum->row_array();
                $y['NRP'] = $resArr['NRP'];
                $y['NIP'] = $resArr['NIP'];
                $y['pgwNama'] = $resArr['pgwNama'];
                $y['pgwJenkel'] = $resArr['pgwJenkel'];
                $y['pgwTmpLahir'] = $resArr['pgwTmpLahir'];
                $y['pgwTglLahir'] = setDateInd($resArr['pgwTglLahir']);
                $y['pgwAgama'] = $resArr['pgwAgama'];
                $y['pgwAlmt'] = $resArr['pgwAlmt'];
                $y['pgwTelp'] = $resArr['pgwTelp'];
                $y['profId'] = $resArr['profId'];
                $y['userStatus'] = $resArr['userStatus'];
            }else{
                $y['NRP'] = "";
                $y['NIP'] = "";
                $y['pgwNama'] = "";
                $y['pgwJenkel'] = "1";
                $y['pgwTmpLahir'] = "";
                $y['pgwTglLahir'] = "";
                $y['pgwAgama'] = "";
                $y['pgwAlmt'] = "";
                $y['pgwTelp'] = "";
                $y['profId'] = "";
                $y['userStatus'] = "";
            }

            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $x['header'] = $this->load->view('template/header','',true);

            $y['contentTitle'] = "Entry Pegawai";        
            
            $y['get_profesi'] = $this->db->get('tbl01_profesi');   
            $y['get_agama'] = $this->db->get('tbl01_agama');  

            $x['content'] = $this->load->view('pegawai/template_entry',$y,true); 
            $this->load->view('template/theme',$x); 
        }else{
            $url_login = base_url().'administrator.php/login?sid='.session_id();
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
            $condition .= "WHERE NRP = '$sLike' OR  (pgwNama LIKE '%$sLike%' OR  profesi LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);

        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE NRP = '$sLike' OR  (pgwNama LIKE '%$sLike%' OR  profesi LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT a.*,b.profesi FROM tbl01_pegawai a LEFT JOIN tbl01_profesi b ON a.profId=b.idx $condition 
        ORDER BY ABS(REPLACE(NRP,'NRP','')) DESC";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'administrator.php/pegawai/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('pegawai/getdata',$x);
    }

    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['NRP'])){
                    $params = array(
                        'NRP' => $this->input->post('NRP',TRUE),
                        'NIP' => $this->input->post('NIP',TRUE),
                        'pgwNama' => $this->input->post('pgwNama',TRUE),
                        'pgwJenkel' => $this->input->post('pgwJenkel',TRUE),
                        'pgwTmpLahir' => $this->input->post('pgwTmpLahir',TRUE),
                        'pgwTglLahir' => setDateEng($this->input->post('pgwTglLahir',TRUE)),
                        'pgwAgama' => $this->input->post('pgwAgama',TRUE),
                        'pgwAlmt' => $this->input->post('pgwAlmt',TRUE),
                        'pgwTelp' => $this->input->post('pgwTelp',TRUE),
                        'profId' => $this->input->post('profId',TRUE),
                        'userStatus' => $this->input->post('userStatus',TRUE)
                    );

                    if($params['NRP'] == ""){
                        $params['userPasw'] = MD5('12345');
                        $cekCommand = $this->db->insert('tbl01_pegawai',$params); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Simpan data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";                                            
                        }
                    }else{
                        $this->db->where('NRP',$params['NRP']);
                        $cekCommand = $this->db->update('tbl01_pegawai',$params); 
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
                    $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 402;
                $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

    function resetAdminApp(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['NRP'])){
                    if($_POST['NRP'] == ""){
                        $response['code'] = 501;
                        $response['message'] = "Ops. Data pegawai kosong! Silahkan hubungi administrator.";
                    }else{
                        $params = array(
                            'userPasw' => MD5('12345')
                        );
                        $this->db->where('NRP',  $this->input->post('NRP',TRUE));
                        $cekCommand = $this->db->update('tbl01_pegawai',$params); 
                        if($cekCommand){
                            $response['code'] = 201;
                            $response['message'] = "Reset password sukses.\nPassword baru 12345";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                }else{
                    $response['code'] = 401;
                    $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 402;
                $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

}

