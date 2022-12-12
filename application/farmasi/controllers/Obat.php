<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class obat extends CI_Controller{
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
            
            $ses_state = $this->users_model->cek_session_id();
            if($ses_state){
                $x['header'] = $this->load->view('template/header','',true);
                $z = setNav("nav_3");
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
                $y['index_menu'] = 3;
                $y['contentTitle'] = "Obat / Alat Kesehatan";
                $x['content'] = $this->load->view('obat/template_table',$y,true);
                $this->load->view('template/theme',$x);
            }else{
                $sid = getSessionID();
                $url_login = base_url().'farmasi.php/login?sid='.$sid;
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
                $condition .= "WHERE NMBRG LIKE '%$sLike%' OR NMSATUAN LIKE '%$sLike%'";
                $this->session->set_userdata('sLike',$sLike);
            }else{
                if($this->session->userdata('sLike')){
                    $sLike = $this->session->userdata('sLike');
                    $condition .= "WHERE NMBRG LIKE '%$sLike%' OR NMSATUAN LIKE '%$sLike%'";
                }
            }

            $SQL = "SELECT * FROM tbl04_barang $condition ORDER BY CONVERT(KDBRG,UNSIGNED INTEGER) DESC";
            $SQL_Count = $this->db->query("$SQL");
            $totalRec = $SQL_Count->num_rows();
            $config['target']      = 'tbody#getdata';
            $config['uri_segment']  = $this->uri_segment;
            $config['base_url']    = base_url().'farmasi.php/obat/getView';
            $config['total_rows']  = $totalRec;
            $config['per_page']    = $limit;
            $this->ajax_page->initialize($config);

            $x['offset'] = $offset;
            $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
            $this->load->view('obat/getdata',$x);
        }

        function tambah(){
            $ses_state = $this->users_model->cek_session_id();
            if($ses_state){
                $IDX = $this->uri->segment(3);
                $x['header'] = $this->load->view('template/header','',true);
                $z = setNav("nav_3");
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
                
                $queSQL = "SELECT * FROM tbl04_barang WHERE KDBRG = '$IDX'";
                $cekSQL = $this->db->query("$queSQL");
                if($cekSQL->num_rows() > 0){
                    $resSQL = $cekSQL->row_array();
                    $y['KDBRG'] = $resSQL['KDBRG'];
                    $y['NMBRG'] = $resSQL['NMBRG'];
                    $y['NMGENERIK'] = $resSQL['NMGENERIK'];
                    $y['KDSATUAN'] = $resSQL['KDSATUAN'];
                    $y['KDKTBRG'] = $resSQL['KDKTBRG'];
                    $y['KDJENISBRG'] = $resSQL['KDJENISBRG'];
                    $y['MARKUP'] = $resSQL['MARKUP'];
                    $y['MINSTOK'] = $resSQL['MINSTOK'];
                    $y['JUMLAH_MAXIMUM_TANGGUNGAN_BPJS']=$resSQL["JUMLAH_MAXIMUM_TANGGUNGAN_BPJS"];
                    $y['AP'] = $resSQL['AP'];
                    $y['HJUAL'] = number_format($resSQL['HJUAL'],0,'','');
                }else{
                    $y['KDBRG'] = "";
                    $y['NMBRG'] = "";
                    $y['NMGENERIK'] = "";
                    $y['KDSATUAN'] = "";
                    $y['KDKTBRG'] = "";
                    $y['KDJENISBRG'] = "";
                    $y['MARKUP'] = "0";
                    $y['MINSTOK'] = "0";
                    $y['HJUAL'] = "0";
                    $y['AP'] = "";
                    $y['JUMLAH_MAXIMUM_TANGGUNGAN_BPJS']="";
                }

                $y['contentTitle'] = "Entry Obat / Alat Kesehatan";        
                $y['getSatuan'] = $this->db->get('tbl04_satuan');                 
                $y['getKatBrg'] = $this->db->get('tbl04_kategori_barang');                 
                $y['getJnsBrg'] = $this->db->get('tbl04_jenis_barang');     

                $x['content'] = $this->load->view('obat/template_entry',$y,true);
                $this->load->view('template/theme',$x);
            }else{
                $sid = getSessionID();
                $url_login = base_url().'farmasi.php/login?sid='.$sid;
                echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
                window.location.href = '$url_login'
                </script>";
            }            
        }
        function simpan(){
            $ses_state = $this->users_model->cek_session_id();
            if($ses_state){
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    if(
                        isset($_POST['KDBRG']) &&
                        isset($_POST['NMBRG']) &&
                        isset($_POST['NMGENERIK']) &&
                        isset($_POST['KDSATUAN']) &&
                        isset($_POST['NMSATUAN']) &&
                        isset($_POST['KDKTBRG']) &&
                        isset($_POST['NMKTBRG']) &&
                        isset($_POST['KDJENISBRG']) &&
                        isset($_POST['JENISBRG']) &&
                        isset($_POST['MARKUP']) &&
                        isset($_POST['MINSTOK']) &&
                        isset($_POST['HJUAL'])
                    ){
                        $params = array(
                            'KDBRG' => $this->input->post('KDBRG',TRUE),
                            'NMBRG' => $this->input->post('NMBRG',TRUE),
                            'NMGENERIK' => $this->input->post('NMGENERIK',TRUE),
                            'KDSATUAN' => $this->input->post('KDSATUAN',TRUE),
                            'NMSATUAN' => $this->input->post('NMSATUAN',TRUE),
                            'KDKTBRG' => $this->input->post('KDKTBRG',TRUE),
                            'NMKTBRG' => $this->input->post('NMKTBRG',TRUE),
                            'KDJENISBRG' => $this->input->post('KDJENISBRG',TRUE),
                            'JENISBRG' => $this->input->post('JENISBRG',TRUE),
                            'MARKUP' => $this->input->post('MARKUP',TRUE),
                            'MINSTOK' => $this->input->post('MINSTOK',TRUE),
                            'HJUAL' => $this->input->post('HJUAL',TRUE),
                            'JUMLAH_MAXIMUM_TANGGUNGAN_BPJS' => $this->input->post('JUMLAH_MAXIMUM_TANGGUNGAN_BPJS', TRUE),
                            'AP' => $this->input->post('AP', TRUE)
                        );

                        if($params['KDBRG'] == ""){
                            $cekCommand = $this->db->insert('tbl04_barang',$params); 
                            if($cekCommand){
                                $response['code'] = 200;
                                $response['message'] = "Simpan data sukses.";                                            
                            }else{
                                $response['code'] = 401;
                                $response['message'] = "Ops. Query error! Silahkan hubungi farmasi.";      
                            }
                        }else{
                            $this->db->where('KDBRG',$params['KDBRG']);
                            $cekCommand = $this->db->update('tbl04_barang',$params); 
                            if($cekCommand){
                                $response['code'] = 201;
                                $response['message'] = "Update data sukses.";                                            
                            }else{
                                $response['code'] = 402;
                                $response['message'] = "Ops. Query error! Silahkan hubungi farmasi.";     
                            }
                        }
                    }else{
                        $response['code'] = 403;
                        $response['message'] = "Ops. Varibale tidak ditemukan. Coba ulangi kembali.";
                    }
                }else{
                    $response['code'] = 404;
                    $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 405;
                $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
            }
            echo json_encode($response);
        }

        function hapus(){
            $ses_state = $this->users_model->cek_session_id();
            if($ses_state){
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    if(isset($_POST['KDBRG'])){
                        $KDBRG = $this->input->post('KDBRG',true);

                        if($KDBRG==""){
                            $response['code'] = 401;
                            $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                        }else{
                            $queAvailable = "SELECT * FROM tbl04_log_transaksi WHERE KDBRG = '$KDBRG' LIMIT 1";
                            $cekAvailable = $this->db->query("$queAvailable");
                            if ($cekAvailable->num_rows() > 0) {
                                $resAvailable = $cekAvailable->row_array();
                                $response['code'] = 402;
                                $response['message'] = "Ops. Data tidak bisa dihapus. obat digunakan pada transaksi (".$resAvailable['NOREFF'].").";
                            }else{
                                $queCommand = "DELETE FROM tbl04_barang WHERE KDBRG = '$KDBRG'";
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
                        $response['code'] = 403;
                        $response['message'] = "Ops. Varibale tidak ditemukan. Coba ulangi kembali.";
                    }
                }else{
                    $response['code'] = 404;
                    $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 405;
                $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
            }
            echo json_encode($response);
        }
        
    }
?>