<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class instansi extends CI_Controller{
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
                $y['contentTitle'] = "Instansi";        
                $y['breadcrumbTitle'] = "Instansi";   
                
                $z = setNav("nav_2");
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                $this->load->view('template/template_header',$x);

                $SQL = "SELECT * FROM tbl_instansi";
                $cek = $this->db->query("$SQL");
                if ($cek->num_rows() > 0) {
                    $res = $cek->row_array();
                    $y['kode_instansi'] = $res['kode_instansi'];
                    $y['nama_instansi'] = $res['nama_instansi'];
                    $y['alamat_instansi'] = $res['alamat_instansi'];
                    $y['kab_kota'] = $res['kab_kota'];
                    $y['kode_pos'] = $res['kode_pos'];
                    $y['no_telp'] = $res['no_telp'];
                    $y['no_fax'] = $res['no_fax'];
                    $y['email'] = $res['email'];
                    $y['direktur'] = $res['direktur'];
                    $y['pemilik_rs'] = $res['pemilik_rs'];
                    $y['kelas_rs'] = $res['kelas_rs'];
                    $y['jenis_rs'] = $res['jenis_rs'];
                }else{
                    $y['kode_instansi'] = "";
                    $y['nama_instansi'] = "";
                    $y['alamat_instansi'] = "";
                    $y['kab_kota'] = "";
                    $y['kode_pos'] = "0";
                    $y['no_telp'] = "0";
                    $y['no_fax'] = "0";
                    $y['email'] = "0";
                    $y['direktur'] = "0";
                    $y['pemilik_rs'] = "0";
                    $y['kelas_rs'] = "0";
                    $y['jenis_rs'] = "0";
                }
                $this->load->view('instansi/entry',$y);
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
                        isset($_POST['kode_instansi']) &&
                        isset($_POST['nama_instansi']) &&
                        isset($_POST['alamat_instansi']) &&
                        isset($_POST['kab_kota']) &&
                        isset($_POST['kode_pos']) &&
                        isset($_POST['no_telp']) &&
                        isset($_POST['no_fax']) &&
                        isset($_POST['email']) &&
                        isset($_POST['direktur']) &&
                        isset($_POST['pemilik_rs']) &&
                        isset($_POST['kelas_rs']) &&
                        isset($_POST['jenis_rs'])
                    ){
                        $kode_instansi = $this->input->post('kode_instansi',true);
                        $nama_instansi = $this->input->post('nama_instansi',true);
                        $alamat_instansi = $this->input->post('alamat_instansi',true);
                        $kab_kota = $this->input->post('kab_kota',true);
                        $kode_pos = $this->input->post('kode_pos',true);
                        $no_telp = $this->input->post('no_telp',true);
                        $no_fax = $this->input->post('no_fax',true);
                        $email = $this->input->post('email',true);
                        $direktur = $this->input->post('direktur',true);
                        $pemilik_rs = $this->input->post('pemilik_rs',true);
                        $kelas_rs = $this->input->post('kelas_rs',true);
                        $jenis_rs = $this->input->post('jenis_rs',true);

                        if($kode_instansi == ""){
                            $response['code'] = 401;
                            $response['message'] = "Ops. Kode Instansi harus di isi. Silahkan coba kembali";
                        }else{
                            $SQL = "SELECT * FROM tbl_instansi WHERE kode_instansi='$kode_instansi'";
                            $cek = $this->db->query("$SQL");
                            if ($cek->num_rows() > 0) {
                                $params = array(
                                    'nama_instansi' => $nama_instansi,
                                    'alamat_instansi' => $alamat_instansi,
                                    'kab_kota' => $kab_kota,
                                    'kode_pos' => $kode_pos,
                                    'no_telp' => $no_telp,
                                    'no_fax' => $no_fax,
                                    'email' => $email,
                                    'direktur' => $direktur,
                                    'pemilik_rs' => $pemilik_rs,
                                    'kelas_rs' => $kelas_rs,
                                    'jenis_rs' => $jenis_rs
                                );
                                $this->db->where('kode_instansi',$kode_instansi);
                                $cekCommand = $this->db->update('tbl_instansi',$params);                                 
                            }else{
                                $params = array(
                                    'kode_instansi' => $kode_instansi,
                                    'nama_instansi' => $nama_instansi,
                                    'alamat_instansi' => $alamat_instansi,
                                    'kab_kota' => $kab_kota,
                                    'kode_pos' => $kode_pos,
                                    'no_telp' => $no_telp,
                                    'no_fax' => $no_fax,
                                    'email' => $email,
                                    'direktur' => $direktur,
                                    'pemilik_rs' => $pemilik_rs,
                                    'kelas_rs' => $kelas_rs,
                                    'jenis_rs' => $jenis_rs
                                );
                                $cekCommand = $this->db->insert('tbl_instansi',$params);                                 
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
