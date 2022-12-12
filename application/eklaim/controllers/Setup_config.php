<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class setup_config extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->perPage = 10;
            $this->offset = 0;
            $this->uri_segment = 3;

            $this->load->library('ajax_page');
            $this->load->model('users_model');
        }
        function index(){
            $ses_state = $this->session->userdata('isLogin');
            $this->session->unset_userdata('sPage');
            $this->session->unset_userdata('sLike');
            
            if($ses_state){
                $y['contentTitle'] = "Setup Config";        
                $y['breadcrumbTitle'] = "Setup Config";   
                
                $z = setNav("nav_2");
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                $this->load->view('template/template_header',$x);

                $SQL = "SELECT * FROM tbl_config";
                $cek = $this->db->query("$SQL");
                if ($cek->num_rows() > 0) {
                    $res = $cek->row_array();
                    $y['kode_rs'] = $res['kode_rs'];
                    $y['host_dest'] = $res['host_dest'];
                    $y['key_value'] = $res['key_value'];
                }else{
                    $y['kode_rs'] = "";
                    $y['host_dest'] = "";
                    $y['key_value'] = "";
                }
                $this->load->view('setup_config/entry',$y);
                $this->load->view('template/template_footer');
            }else{
                $url_login = base_url().'index.php/login?sid='.session_id();
                echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
                window.location.href = '$url_login'
                </script>";
            }
        }

        function simpan(){
            $ses_state = $this->session->userdata('isLogin');
            if($ses_state){
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    if(
                        isset($_POST['kode_rs']) &&
                        isset($_POST['host_dest']) &&
                        isset($_POST['key_value'])
                    ){
                        $kode_rs = $this->input->post('kode_rs',true);
                        $host_dest = $this->input->post('host_dest',true);
                        $key_value = $this->input->post('key_value',true);

                        if($kode_rs == ""){
                            $response['code'] = 401;
                            $response['message'] = "Ops. Kode RS harus di isi. Silahkan coba kembali";
                        }else{
                            $SQL = "SELECT * FROM tbl_config WHERE kode_rs='$kode_rs'";
                            $cek = $this->db->query("$SQL");
                            if ($cek->num_rows() > 0) {
                                $params = array(
                                    'host_dest' => $host_dest,
                                    'key_value' => $key_value
                                );
                                $this->db->where('kode_rs',$kode_rs);
                                $cekCommand = $this->db->update('tbl_config',$params);                                 
                            }else{
                                $params = array(
                                    'kode_rs' => $kode_rs,
                                    'host_dest' => $host_dest,
                                    'key_value' => $key_value
                                );
                                $cekCommand = $this->db->insert('tbl_config',$params);                                 
                            }

                            if($cekCommand){
                                $response['code'] = 201;
                                $response['message'] = "Update data sukses.";                                            
                            }else{
                                $response['code'] = 402;
                                $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                            }
                        }
                    }else{
                        $response['code'] = 403;
                        $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                    }
                }else{
                    $response['code'] = 404;
                    $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 405;
                $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
            }
            echo json_encode($response);
        }
    }
