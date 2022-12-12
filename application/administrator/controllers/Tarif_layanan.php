<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tarif_layanan extends CI_Controller{
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
        $y['index_menu'] = 3;
        if($ses_state){
            $z = setNav("nav_3");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $x['header'] = $this->load->view('template/header','',true);

            $y['contentTitle'] = "Tarif Layanan";
            
            $y['datgroupruang'] = $this->db->get('tbl01_group_ruang');
            $y['datkategoritarif'] = $this->db->get('tbl01_kategori_tarif');
            $y['datkelaslayanan'] = $this->db->get('tbl01_kelas_layanan');
            
            $x['content'] = $this->load->view('tarif_layanan/main',$y,true);
            $this->load->view('template/theme',$x);
        }else{ 
            $sid = getSessionID();
            $url_login = base_url().'administrator.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }

    function layanan(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $param=$this->input->post('param1');
            $this->db->like('layanan', $param);
            $this->db->or_like('kategori_tarif', $param);
            $data=$this->db->get('tbl01_layanan')->result();
            $response = array('status' => true, 'message' => 'OK','data'=>$data);
        }else{
            $response=array('status'=>false,'message'=>'Sesiion Expired');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
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
            $condition .= "WHERE (layanan LIKE '%$sLike%' OR kelas_layanan LIKE '%$sLike%' OR kategori_tarif LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);

        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE (layanan LIKE '%$sLike%' OR kelas_layanan LIKE '%$sLike%' OR kategori_tarif LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT * FROM tbl01_tarif_layanan $condition ORDER BY idx";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'administrator.php/tarif_layanan/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);
        //echo $SQL . " LIMIT $offset,$limit";
        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('tarif_layanan/getdata',$x);
    }

    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['idx']) &&
                    isset($_POST['layanan']) &&
                    isset($_POST['kategori_id']) &&
                    isset($_POST['kelas_id']) &&
                    isset($_POST['keterangan'])
                ){
                    $idx = trim($this->input->post('idx',true));
                    $idx_layanan= trim($this->input->post('idxlayanan', true));
                    $layanan = trim($this->input->post('layanan',true));
                    $kategori_id = trim($this->input->post('kategori_id',true));
                    if($kategori_id==0) $kategori_tarif="-";
                    else{
                        $this->db->where('idx',$kategori_id);
                        $kat=$this->db->get('tbl01_kategori_tarif')->row();
                        if(!empty($kat)) $kategori_tarif=$kat->kategori_tarif;
                        else $kategori_tarif="-";
                    }
                    //$kategori_tarif = trim($this->input->post('kategori_tarif',true));
                    $kelas_id = $this->input->post('kelas_id', true);
                    $keterangan = trim($this->input->post('keterangan',true));
                    if(empty($idx_layanan)){
                        $data_layanan=array(
                            'layanan'=>$layanan,
                            'kategori_id'=> $kategori_id,
                            'kategori_tarif'=> $kategori_tarif
                        );
                        $this->db->insert('tbl01_layanan', $data_layanan);
                        $idx_layanan=$this->db->insert_id();
                    }else{
                        $data_layanan = array(
                            'layanan' => $layanan,
                            'kategori_id' => $kategori_id,
                            'kategori_tarif' => $kategori_tarif
                        );
                        $this->db->where('idx',$idx_layanan);
                        $this->db->update('tbl01_layanan',$data_layanan);
                    }
                    foreach ($kelas_id as $kelas ) {
                        $idx_tarif=$this->input->post('idx_tarif'.$kelas);
                        if(!empty($idx_tarif)){
                            $update[] = array(
                                'idx' => $idx_tarif,
                                'idxlayanan'    => $idx_layanan,
                                'layanan'       => $layanan,
                                'jasa_sarana'   => $this->input->post('jasa_sarana'.$kelas),
                                'jasa_pelayanan'=> $this->input->post('jasa_pelayanan' . $kelas),
                                'tarif_layanan' => $this->input->post('tarif_layanan' . $kelas),
                                'jasa_operator' => $this->input->post('jasa_operator' . $kelas),
                                'jasa_anestesi' => $this->input->post('jasa_anestesi' . $kelas),
                                'jasa_perawat'  => $this->input->post('jasa_perawat' . $kelas),
                                'kategori_id'   => $kategori_id,
                                'kategori_tarif'=> $kategori_tarif,
                                'kelas_id'      => $kelas,
                                'kelas_layanan' => $this->input->post('kelas_layanan' . $kelas),
                                'jns_layanan'   => $this->input->post('jns_layanan'),
                                'keterangan' => $keterangan
                            );
                        }else{
                            $js= $this->input->post('jasa_sarana' . $kelas);
                            $jp= $this->input->post('jasa_pelayanan' . $kelas);
                            if(!empty($js) || !empty($jp)){
                                $params[] = array(
                                    'idxlayanan' => $idx_layanan,
                                    'layanan' => $layanan,
                                    'jasa_sarana' => $this->input->post('jasa_sarana' . $kelas),
                                    'jasa_pelayanan' => $this->input->post('jasa_pelayanan' . $kelas),
                                    'jasa_operator' => $this->input->post('jasa_operator' . $kelas),
                                    'jasa_anestesi' => $this->input->post('jasa_anestesi' . $kelas),
                                    'jasa_perawat' => $this->input->post('jasa_perawat' . $kelas),
                                    'tarif_layanan' => $this->input->post('tarif_layanan' . $kelas),
                                    'kategori_id' => $kategori_id,
                                    'kategori_tarif' => $kategori_tarif,
                                    'kelas_id' => $kelas,
                                    'kelas_layanan' => $this->input->post('kelas_layanan' . $kelas),
                                    'jns_layanan'   => $this->input->post('jns_layanan'),
                                    'keterangan' => $keterangan
                                );
                            }
                            
                        }
                    }
                    if(!empty($update)) $this->db->update_batch('tbl01_tarif_layanan',$update,'idx');
                    if(!empty($params)) $this->db->insert_batch('tbl01_tarif_layanan', $params);
                    if(!empty($update)) $response['update'] = $update;
                    if(!empty($params)) $response['insert'] = $params;
                    if(!empty($update) && empty($insert)){
                        $response['code'] = 200;
                        $response['message'] = "Tarif berhasil update.";  
                    }elseif(empty($update) && !empty($insert)){
                        $response['code'] = 200;
                        $response['message'] = "Tarif berhasil ditambahkan.";  
                    }else{
                        $response['code'] = 201;
                        $response['message'] = "Tarif belum diinput";  
                    }
                    /*if($idx==""){
                        $cekCommand = $this->db->insert('tbl01_tarif_layanan',$params); 
                        if($cekCommand){
                            $response['code'] = 200;
                            $response['message'] = "Simpan data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }else{
                        $this->db->where('idx', $idx);
                        $cekCommand = $this->db->update('tbl01_tarif_layanan',$params); 
                        if($cekCommand){
                            $response['code'] = 201;
                            $response['message'] = "Update data sukses.";                                            
                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }*/
                }else{
                    $response['code'] = 401;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 402;
                $response['message'] = "Ops. Method not allowed. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
    function tarif($idlayanan=0,$kelas){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->where('idxlayanan',$idlayanan);
            $this->db->where('kelas_id',$kelas);
            $data= $this->db->get('tbl01_tarif_layanan')->row();
            if(empty($data)){
                $response['code'] = 201;
                $response['message'] = "Data Belum Ada";
                
            }else{
                $response['code'] = 200;
                $response['message'] = "OK";
            }
            $response['data'] = $data;
        } else {
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function listtarif($idlayanan = 0)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $jns_layanan=$this->input->get('jns');
            $this->db->order_by("FIELD(kelas_id,3,2,1,4,5,6)");
            $this->db->where('idxlayanan', $idlayanan);
            $this->db->where('jns_layanan', $jns_layanan);
            $data = $this->db->get('tbl01_tarif_layanan')->result();
            if($jns_layanan=="RI" || $jns_layanan=="OP"){
                $kelas = $this->db->query("select * from tbl01_kelas_layanan 
                WHERE idx NOT IN (SELECT kelas_id FROM tbl01_tarif_layanan WHERE idxlayanan='$idlayanan') 
                ORDER BY FIELD(idx,3,2,1,4,5,6)")->result();
            }else{
                $kelas=array();
            }
            $response['code'] = 200;
            $response['message'] = "OK";
            $response['data'] = $data;
            $response['kelas']=$kelas;
        } else {
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function hapus(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['idx'])){
                    $idx = trim($this->input->post('idx',true));
                    if($idx==""){
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    }else{                            
                        $validQuery = $this->db->query("SELECT * FROM tbl03_nota_detail WHERE id_tarif='$idx'");
                        if($validQuery->num_rows() > 0){
                            $response['code'] = 403;
                            $response['message'] = "Ops. data tidak bisa di hapus! Record telah digunakan pada nota tagihan.";
                        }else{
                            $cekCommand = $this->db->query("DELETE FROM tbl01_tarif_layanan WHERE idx='$idx'"); 
                            if($cekCommand){
                                $response['code'] = 200;
                                $response['message'] = "Hapus data sukses.";                                            
                            }else{
                                $response['code'] = 501;
                                $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                            }                            
                        }
                    }
                }else{
                    $response['code'] = 401;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 402;
                $response['message'] = "Ops. Method not allowed. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
}
