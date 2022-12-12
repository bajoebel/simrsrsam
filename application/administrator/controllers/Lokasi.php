<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class lokasi extends CI_Controller{
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
            $y['index_menu'] = 4;
            if($ses_state){
                $x['header'] = $this->load->view('template/header','',true);
                $z = setNav("nav_4");
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                $y['contentTitle'] = "Lokasi Barang";        
                $y['getGroupLokasi'] = $this->db->get('tbl04_group_lokasi');                 

                $x['content'] = $this->load->view('lokasi/template_table',$y,true);
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
                $condition .= "WHERE NMLOKASI LIKE '%$sLike%' OR GRLOKASI LIKE '%$sLike%'";
                $this->session->set_userdata('sLike',$sLike);
            }else{
                if($this->session->userdata('sLike')){
                    $sLike = $this->session->userdata('sLike');
                    $condition .= "WHERE NMLOKASI LIKE '%$sLike%' OR GRLOKASI LIKE '%$sLike%'";
                }
            }

            $SQL = "SELECT a.*,b.GRLOKASI FROM tbl04_lokasi a 
            LEFT JOIN tbl04_group_lokasi b ON a.KDGRLOKASI=b.KDGRLOKASI $condition ORDER BY KDLOKASI";
            $SQL_Count = $this->db->query("$SQL");
            $totalRec = $SQL_Count->num_rows();
            $config['target']      = 'tbody#getdata';
            $config['uri_segment']  = $this->uri_segment;
            $config['base_url']    = base_url().'farmasi.php/lokasi/getView';
            $config['total_rows']  = $totalRec;
            $config['per_page']    = $limit;
            $this->ajax_page->initialize($config);

            $x['offset'] = $offset;
            $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
            $this->load->view('lokasi/getdata',$x);
        }
        function simpan(){
            $ses_state = $this->users_model->cek_session_id();
            if($ses_state){
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    if(isset($_POST['KDLOKASI'])){
                        if($_POST['KDLOKASI'] == ""){
                            $params = array(
                                'NMLOKASI' => $this->input->post('NMLOKASI',TRUE),
                                'KDGRLOKASI' => $this->input->post('KDGRLOKASI',TRUE)
                            );
                            $cekCommand = $this->db->insert('tbl04_lokasi',$params); 
                            if($cekCommand){
                                $response['code'] = 200;
                                $response['message'] = "Simpan data sukses.";                                            
                            }else{
                                $response['code'] = 501;
                                $response['message'] = "Ops. Query error! Silahkan hubungi farmasi.";      
                            }
                        }else{
                            $params = array(
                                'NMLOKASI' => $this->input->post('NMLOKASI',TRUE),
                                'KDGRLOKASI' => $this->input->post('KDGRLOKASI',TRUE)
                            );
                            $this->db->where('KDLOKASI',  $this->input->post('KDLOKASI',TRUE));
                            $cekCommand = $this->db->update('tbl04_lokasi',$params); 
                            if($cekCommand){
                                $response['code'] = 201;
                                $response['message'] = "Update data sukses.";                                            
                            }else{
                                $response['code'] = 501;
                                $response['message'] = "Ops. Query error! Silahkan hubungi farmasi.";     
                            }
                        }
                    }else{
                        $response['code'] = 401;
                        $response['message'] = "Ops. Ada keselahan permintaan.\nCoba ulangi kembali.";
                    }
                }else{
                    $response['code'] = 402;
                    $response['message'] = "Ops. Ada keselahan permintaan.\nCoba ulangi kembali.";
                }
            }else{
                $response['code'] = 404;
                $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
            }
            echo json_encode($response);
        }
        function hapus(){
            $ses_state = $this->users_model->cek_session_id();
            if($ses_state){
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    if(isset($_POST['KDLOKASI'])){
                        if($_POST['KDLOKASI'] == ""){
                            $response['code'] = 401;
                            $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                        }else{
                            $queAvailable = "SELECT * FROM tbl04_log_transaksi 
                            WHERE KDLOKASI = '$_POST[KDLOKASI]' LIMIT 1";
                            $cekAvailable = $this->db->query("$queAvailable");
                            if ($cekAvailable->num_rows() > 0) {
                                $resAvailable = $cekAvailable->row_array();
                                $response['code'] = 402;
                                $response['message'] = "Ops. Data tidak bisa dihapus. Lokasi digunakan pada transaksi (".$resAvailable['NOREFF'].").";
                            }else{
                                $queCommand = "DELETE FROM tbl04_lokasi WHERE KDLOKASI = '$_POST[KDLOKASI]'";
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
                        $response['message'] = "Ops. Ada kesalahan permintaan.\nCoba ulangi kembali.";
                    }
                }else{
                    $response['code'] = 405;
                    $response['message'] = "Ops. Ada kesalahan permintaan.\nCoba ulangi kembali.";
                }
            }else{
                $response['code'] = 406;
                $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
            }
            echo json_encode($response);
        }
        
    }
?>