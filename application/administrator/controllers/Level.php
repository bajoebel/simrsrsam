<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {
    private $akses=array();
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('level_model');
        $this->load->model('users_model');
        
    }
        
	public function index(){
        $ses_state = $this->users_model->cek_session_id();
        $y['index_menu'] = 6;
        if ($ses_state) {
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $x['header'] = $this->load->view('template/header', '', true);
            $y["kategori"]=$this->level_model->getmodul();
            $y['contentTitle'] = "Level";

            $x['content'] = $this->load->view('level/main', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'administrator.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah!\\nSilahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
        
    }
	public function data(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $q = urldecode($this->input->get('q', TRUE));
            $start = intval($this->input->get('start'));
            $limit = 20;
            $row_count=$this->level_model->countlevel($q);
            $list=array(
                'status'    => true,
                'message'   => "OK",
                'start'     => $start,
                'row_count' => $row_count,
                'limit'     => $limit,
                'data'     => $this->level_model->getlevellimit($limit,$start,$q),
            );
        }else{
            $list=array(
                'status'    => false,
                'message'   => "Anda tidak berhak untuk mengakases halaman ini",
                'data'      => array()
            );
        }
        header('Content-Type: application/json');
        echo json_encode($list);
    }
	function edit($id=""){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $row=$this->level_model->getlevel_by_id($id);
            if(!empty($row)){
                $response=array(
                    'status'    => true,
                    'message'   => "OK",
                    'data'      => $row,
                    'csrf'      => $this->security->get_csrf_hash(),
                );
            }else{
                $response=array(
                    'status'    => false,
                    'message'   => "Data Tidak ditemukan",
                    'data'      => array(),
                    'csrf'      => $this->security->get_csrf_hash(),
                );
            }
            
        }else{
            $response=array(
                'status'    => false,
                'message'   => "Anda tidak berhak untuk mengakases halaman ini"
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function hakakses(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $level=$this->input->get('level');
            $modul=$this->input->get('modul');
            $data=array(
                'level'=>$level,
                'modul'=>$modul,
                'row_level'=> $this->level_model->getlevel_by_id($level),
                'list_menu' => $this->level_model->getMenu($modul)
            );
            $this->load->view('level/view_hakakses',$data);
        }
    }
    function simpanhakakses(){
        $idmodul=$this->input->post('idmodul');
        $idlevel=$this->input->post('idlevel');
        $id_menu = $this->input->post('id_menu');//array
        foreach ($id_menu as $idm) {
            $menu = $this->input->post('menu'.$idm);
            $menu_aksi = $this->input->post('aksi'.$idm);
            if(!empty($menu)){
                //Jika Menu Dicentang
                $cek = $this->level_model->getHakAkses($idlevel,$idmodul,$menu);
                if(!empty($cek)){
                    //Update Hak Aksi
                    if(!empty($menu_aksi)){
                        $arr_menu_aksi = explode(',',$menu_aksi);
                        foreach ($arr_menu_aksi as $a ) {
                            $pilih_aksi = $this->input->post('aksi_'.$idm."_".$a);
                            if(!empty($pilih_aksi)) {
                                $arr_pilih_aksi[] = $a;
                            }
                        }
                        if(!empty($arr_pilih_aksi)) $pilih_aksi=implode(',',$arr_pilih_aksi);
                        else $pilih_aksi="0";
                        $hak=array('hak_aksi'=> $pilih_aksi);
                        $kondisi=array('idlevel'=>$idlevel,'idmodul'=>$idmodul,'idmenu'=>$idm);
                        $this->db->where($kondisi);
                        $this->db->update('tbl01_acc_hakakses',$hak);
                        $status = true;
                    }
                }else{
                    //Insert Hak Akses
                    if(!empty($menu_aksi)){
                        $arr_menu_aksi = explode(',',$menu_aksi);
                        foreach ($arr_menu_aksi as $a ) {
                            $pilih_aksi = $this->input->post('aksi_'.$idm."_".$a);
                            if(!empty($pilih_aksi)) {
                                $arr_pilih_aksi[] = $a;
                            }
                        }
                        if(!empty($arr_pilih_aksi)) $pilih_aksi=implode(',',$arr_pilih_aksi);
                        else $pilih_aksi="0";
                    }else $pilih_aksi="0";
                    $hak=array(
                        'idlevel'=>$idlevel,'idmodul'=>$idmodul,'idmenu'=>$idm,'hak_aksi'=> $pilih_aksi
                    );
                    $this->db->insert('tbl01_acc_hakakses',$hak);
                    $insert_id = $this->db->insert_id();
                    if($insert_id) $status = true; else $status=false;
                }
            }else{
                //Jika Menu Tidak Dicentang
                $this->level_model->removeHakAkses($idlevel,$idmodul,$idm);
                $status=true;
            }
        }
        if($status) $message = "Hak Akses Berhasil Disimpan"; else $message = "Terjadi Kesalahan Gagal menyimpan hak akses";
        $response=array('status'=>$status,'message'=>$message,'level'=>$idlevel,'modul'=>$idmodul);
        echo json_encode($response);
    }

	function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $idx=$this->input->post('idx');
            $status=$this->input->post('status');
            if(empty($status)) $status = 0; 
            $data = array(
                'level' => $this->input->post('level'),
                'id_modul' => $this->input->post('id_modul'),
                'status' => $status,
            );
            if(empty($idx)){
                $this->level_model->insertlevel($data);
                header('Content-Type: application/json');
                echo json_encode(array("status" => true, "message" => "Berhasil menambahkan data level"));
            }
            else{
                $this->level_model->updatelevel($data, $idx);
                header('Content-Type: application/json');
                echo json_encode(array("status" => true, "message" => "Berhasil Mengedit Data level"));
            }
            
           
        }else{
            header('Content-Type: application/json');
            echo json_encode(array("status" => false,"message"=> "Anda tidak berhak untuk mengakases halaman ini"));
        }
    }
	function hapus($id){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->level_model->deletelevel($id);
            header('Content-Type: application/json');
            echo json_encode(array("status" => TRUE, "message"=> "Data Berhasil dihapus"));
        }else{
            header('Content-Type: application/json');
            echo json_encode(array("status" => FALSE, "message"=> "Anda tidak berhak untuk mengakases halaman ini"));
        }
        
    }
	function excel(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $data=array(
                'data'  => $this->level_model->getlevel(),
            );
            $this->load->view('admin/level/view_data_excel',$data);
        }else{
            $this->session->set_flashdata('error', 'Opps... Session expired' );
            header('location:'.base_url() ."login");
        }
    }
	function pdf(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $data=array(
                'data'  => $this->level_model->getlevel(),
            );
            $html=$this->load->view('admin/level/view_data_pdf',$data, true);
            $pdfFilePath = "DATA_level.pdf";
            $this->load->library('m_pdf');
            $pdf = $this->m_pdf->load();
            $pdf->WriteHTML($html);
            $pdf->Output($pdfFilePath, "D");
        }else{
            $this->session->set_flashdata('error', 'Opps... Session expired' );
            header('location:'.base_url() ."login");
        }
        
    }

    public function _file_upload($path,$filename,$filetype){
        $config['upload_path']          = $path;
        $config['allowed_types']        = $filetype;
        $config['max_size']             = 1000;
        $config['max_width']            = 1500;
        $config['max_height']           = 800;
        $config['overwrite']        = true;
        $config['file_name']            = $filename;
        $this->load->library('upload', $config);
    }

    public function _file_resize($source=null, $dest=null, $width=0, $height=0){
        $thumb['image_library']     = 'gd2';
        $thumb['source_image']      = $source;
        $thumb['create_thumb']      = FALSE;
        $thumb['maintain_ratio']    = TRUE;
        $thumb['width']             = $width;
        $thumb['height']            = $height;
        $thumb['new_image']         = $dest; 
        $this->load->library('image_lib', $thumb);
        $this->image_lib->clear();
        $this->image_lib->initialize($thumb);
        if (!$this->image_lib->resize()) {
            $error['thumb']= $this->image_lib->display_errors();
        }else{
            $error['thumb']= "";
        }
        $this->image_lib->clear();
        return $error['thumb'];
    }
}