<?php defined('BASEPATH') OR exit('No direct script access allowed');
class supplier extends CI_Controller{
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
            $y['contentTitle'] = "Supplier (PBF)"; 
            $x['content'] = $this->load->view('supplier/template_table',$y,true);
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
            $condition .= "WHERE NMSUPPLIER LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE NMSUPPLIER LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT * FROM tbl04_supplier $condition ORDER BY KDSUPPLIER";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'farmasi.php/supplier/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('supplier/getdata',$x);
    }
    function tambah(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_3");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            
            $IDX = $this->uri->segment(3);
            $queSQL = "SELECT * FROM tbl04_supplier WHERE KDSUPPLIER = '$IDX'";
            $cekSQL = $this->db->query("$queSQL");
            if($cekSQL->num_rows() > 0){
                $resSQL = $cekSQL->row_array();
                $y['KDSUPPLIER'] = $resSQL['KDSUPPLIER'];
                $y['NMSUPPLIER'] = $resSQL['NMSUPPLIER'];
                $y['ALAMAT'] = $resSQL['ALAMAT'];
                $y['KOTA'] = $resSQL['KOTA'];
                $y['NPWP'] = $resSQL['NPWP'];
                $y['CONTACTP'] = $resSQL['CONTACTP'];
                $y['TELP'] = $resSQL['TELP'];
                $y['FAKS'] = $resSQL['FAKS'];
                $y['EMAIL'] = $resSQL['EMAIL'];
            }else{
                $y['KDSUPPLIER'] = "";
                $y['NMSUPPLIER'] = "";
                $y['ALAMAT'] = "";
                $y['KOTA'] = "";
                $y['NPWP'] = "";
                $y['CONTACTP'] = "";
                $y['TELP'] = "";
                $y['FAKS'] = "";
                $y['EMAIL'] = "";
            }

            $y['contentTitle'] = "Entry Supplier (PBF)";
            $x['content'] = $this->load->view('supplier/template_entry',$y,true);
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
                if(isset($_POST['KDSUPPLIER'])){
                    if($_POST['KDSUPPLIER'] == ""){
                        $params = array(
                            'NMSUPPLIER' => $this->input->post('NMSUPPLIER',TRUE),
                            'ALAMAT' => $this->input->post('ALAMAT',TRUE),
                            'KOTA' => $this->input->post('KOTA',TRUE),
                            'NPWP' => $this->input->post('NPWP',TRUE),
                            'CONTACTP' => $this->input->post('CONTACTP',TRUE),
                            'TELP' => $this->input->post('TELP',TRUE),
                            'FAKS' => $this->input->post('FAKS',TRUE),
                            'EMAIL' => $this->input->post('EMAIL',TRUE)
                        );
                        $cekCommand = $this->db->insert('tbl04_supplier',$params); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Simpan data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi farmasi.";      
                        }
                    }else{
                        $params = array(
                            'NMSUPPLIER' => $this->input->post('NMSUPPLIER',TRUE),
                            'ALAMAT' => $this->input->post('ALAMAT',TRUE),
                            'KOTA' => $this->input->post('KOTA',TRUE),
                            'NPWP' => $this->input->post('NPWP',TRUE),
                            'CONTACTP' => $this->input->post('CONTACTP',TRUE),
                            'TELP' => $this->input->post('TELP',TRUE),
                            'FAKS' => $this->input->post('FAKS',TRUE),
                            'EMAIL' => $this->input->post('EMAIL',TRUE)
                        );
                        $this->db->where('KDSUPPLIER',  $this->input->post('KDSUPPLIER',TRUE));
                        $cekCommand = $this->db->update('tbl04_supplier',$params); 
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
                if(isset($_POST['KDSUPPLIER'])){
                    if($_POST['KDSUPPLIER'] == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{
                        $queAvailable = "SELECT * FROM tbl04_pembelian 
                        WHERE KDSUPPLIER = '$_POST[KDSUPPLIER]' LIMIT 1";
                        $cekAvailable = $this->db->query("$queAvailable");
                        if ($cekAvailable->num_rows() > 0) {
                            $resAvailable = $cekAvailable->row_array();
                            $response['code'] = 402;
                            $response['message'] = "Ops. Data tidak bisa dihapus. Supplier digunakan pada transaksi pembelian dengan nomor : (".$resAvailable['KDBL'].").";
                        }else{
                            $queCommand = "DELETE FROM tbl04_supplier WHERE KDSUPPLIER = '$_POST[KDSUPPLIER]'";
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