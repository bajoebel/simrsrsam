<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class kamar_rawat extends CI_Controller {
    public function __construct(){
        parent ::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
    }

    public function index(){      
        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        
        if($ses_state){
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $x['header'] = $this->load->view('template/header','',true);

            $y['contentTitle'] = "Kamar Rawat Inap";
            
            $y['get_kelas_layanan'] = $this->db->get('tbl01_kelas_layanan');   
            $this->db->where('grid','2');
            $y['get_ruang'] = $this->db->get('tbl01_ruang');   
            $x['content'] = $this->load->view('kamar_rawat/main',$y,true);
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
            $condition .= "WHERE nama_kamar LIKE '%$sLike%' OR  kelas_layanan LIKE '%$sLike%' OR  ruang LIKE '%$sLike%'";
            $this->session->set_userdata('sLike',$sLike);

        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE nama_kamar LIKE '%$sLike%' OR  kelas_layanan LIKE '%$sLike%' OR  ruang LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT a.*,b.kelas_layanan,c.ruang,
        SUM(IF(d.status_bed = 'Rusak',1,0)) AS jmlRusak,
        SUM(IF(d.status_bed = 'Kosong',1,0)) AS jmlKosong,
        SUM(IF(d.status_bed = 'Terisi',1,0)) AS jmlTerisi
        FROM tbl01_ruang_kamar a 
        LEFT JOIN tbl01_kelas_layanan b ON a.id_kelas=b.idx
        LEFT JOIN tbl01_ruang c ON a.id_ruang=c.idx
        LEFT JOIN tbl01_ruang_kamar_bed d ON a.idx=d.id_kamar
        $condition GROUP BY a.idx ORDER BY a.idx";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'administrator.php/kamar_rawat/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('kamar_rawat/getdata',$x);
    }

    function getBed(){
        $id_kamar = $_POST['id_kamar'];
        $SQL = "SELECT * FROM tbl01_ruang_kamar_bed WHERE id_kamar = '$id_kamar' ORDER BY idx";
        $x['SQL_Bed'] = $this->db->query("$SQL");
        $this->load->view('kamar_rawat/getdatabed',$x);
    }

    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['idx'])){
                    if($_POST['idx'] == ""){
                        $params = array(
                            'nama_kamar' => $this->input->post('nama_kamar',TRUE),
                            'id_kelas' => $this->input->post('id_kelas',TRUE),
                            'id_ruang' => $this->input->post('id_ruang',TRUE)
                        );
                        $cekCommand = $this->db->insert('tbl01_ruang_kamar',$params); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Simpan data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";      
                        }
                    }else{
                        $params = array(
                            'nama_kamar' => $this->input->post('nama_kamar',TRUE),
                            'id_kelas' => $this->input->post('id_kelas',TRUE),
                            'id_ruang' => $this->input->post('id_ruang',TRUE)
                        );
                        $this->db->where('idx',  $this->input->post('idx',TRUE));
                        $cekCommand = $this->db->update('tbl01_ruang_kamar',$params); 
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

    function simpanBed(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['id_kamar'])){
                    $this->db->where('id_kamar',$_POST['id_kamar']);
                    $this->db->where('nomor_bed',trim($_POST['nomor_bed']));
                    $cek = $this->db->get('tbl01_ruang_kamar_bed');
                    if($cek->num_rows() > 0){
                        $response['code'] = 401;
                        $response['message'] = "Ops. No Bed telah ada. Coba ulangi kembali.";
                    }else{
                        $params = array(
                            'id_kamar' => $this->input->post('id_kamar',TRUE),
                            'nomor_bed' => trim($this->input->post('nomor_bed',TRUE)),
                            'status_bed' => $this->input->post('status_bed',TRUE)
                        );
                        $cekCommand = $this->db->insert('tbl01_ruang_kamar_bed',$params); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Simpan data sukses.";                                            
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

    function hapus(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['idx'])){
                    if($_POST['idx'] == ""){
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{
                        $cekCommand = $this->db->query("DELETE FROM tbl01_ruang_kamar WHERE idx = '$_POST[idx]'"); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Hapus data sukses.";                                            
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

    function hapusBed(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['idx'])){
                    if($_POST['idx'] == ""){
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{
                        $cekCommand = $this->db->query("DELETE FROM tbl01_ruang_kamar_bed WHERE idx = '$_POST[idx]'"); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Hapus data sukses.";                                            
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

