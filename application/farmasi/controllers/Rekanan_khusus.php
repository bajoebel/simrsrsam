<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rekanan_khusus extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
    }

    public function index(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_3");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Data Rekanan";
            $x['content'] = $this->load->view('rekanan_khusus/template_table',$y,true);
            $this->load->view('template/theme',$x);
       }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
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
            $condition .= "WHERE NMREKANAN LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE NMREKANAN LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT * FROM tbl04_rekanan_khusus $condition ORDER BY KDREKANAN";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'farmasi.php/rekanan_khusus/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('rekanan_khusus/getdata',$x);
    }

    function tambah(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_3");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            
            $IDX = $this->uri->segment(3);
            $queSQL = "SELECT * FROM tbl04_rekanan_khusus WHERE KDREKANAN = '$IDX'";
            $cekSQL = $this->db->query("$queSQL");
            if($cekSQL->num_rows() > 0){
                $resSQL = $cekSQL->row_array();
                $y['KDREKANAN'] = $resSQL['KDREKANAN'];
                $y['NMREKANAN'] = $resSQL['NMREKANAN'];
                $y['ALAMAT'] = $resSQL['ALAMAT'];
                $y['KOTA'] = $resSQL['KOTA'];
                $y['CONTACTP'] = $resSQL['CONTACTP'];
                $y['TELP'] = $resSQL['TELP'];
                $y['FAKS'] = $resSQL['FAKS'];
                $y['EMAIL'] = $resSQL['EMAIL'];
            }else{
                $y['KDREKANAN'] = "";
                $y['NMREKANAN'] = "";
                $y['ALAMAT'] = "";
                $y['KOTA'] = "";
                $y['CONTACTP'] = "";
                $y['TELP'] = "";
                $y['FAKS'] = "";
                $y['EMAIL'] = "";
            }
            $y['contentTitle'] = "Entry Data Rekanan";
            $x['content'] = $this->load->view('rekanan_khusus/template_entry',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $url_login = base_url().'farmasi.php/login?sid='.getSessionID();
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
                    isset($_POST['KDREKANAN']) &&
                    isset($_POST['NMREKANAN']) &&
                    isset($_POST['ALAMAT']) &&
                    isset($_POST['KOTA']) &&
                    isset($_POST['CONTACTP']) &&
                    isset($_POST['TELP']) &&
                    isset($_POST['FAKS']) &&
                    isset($_POST['EMAIL'])
                ){

                    $params = array(
                        'KDREKANAN' => trim($this->input->post('KDREKANAN',TRUE)),
                        'NMREKANAN' => trim($this->input->post('NMREKANAN',TRUE)),
                        'ALAMAT' => trim($this->input->post('ALAMAT',TRUE)),
                        'KOTA' => trim($this->input->post('KOTA',TRUE)),
                        'CONTACTP' => trim($this->input->post('CONTACTP',TRUE)),
                        'TELP' => trim($this->input->post('TELP',TRUE)),
                        'FAKS' => trim($this->input->post('FAKS',TRUE)),
                        'EMAIL' => trim($this->input->post('EMAIL',TRUE))
                    );

                    if($params['KDREKANAN'] == ""){
                        $cekCommand = $this->db->insert('tbl04_rekanan_khusus',$params); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Simpan data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi farmasi.";      
                        }
                    }else{
                        $this->db->where('KDREKANAN',  $params['KDREKANAN']);
                        $cekCommand = $this->db->update('tbl04_rekanan_khusus',$params); 
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
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
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
                if(isset($_POST['KDREKANAN'])){
                    if($_POST['KDREKANAN'] == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{
                        $queAvailable = "SELECT * FROM tbl04_barang_masuk_khusus 
                        WHERE KDREKANAN = '$_POST[KDREKANAN]' LIMIT 1";
                        $cekAvailable = $this->db->query("$queAvailable");
                        if ($cekAvailable->num_rows() > 0) {
                            $resAvailable = $cekAvailable->row_array();
                            $response['code'] = 402;
                            $response['message'] = "Ops. Data tidak bisa dihapus. rekanan_khusus digunakan pada transaksi pembelian dengan nomor : (".$resAvailable['KDBL'].").";
                        }else{
                            $queCommand = "DELETE FROM tbl04_rekanan_khusus WHERE KDREKANAN = '$_POST[KDREKANAN]'";
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
