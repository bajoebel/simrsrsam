<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {
    private $akses=array();
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Layanan_model');
        $this->load->model('users_model');
        
    }
        
	public function index(){
        $ses_state = $this->users_model->cek_session_id();
        $y['index_menu'] = 2;
        if ($ses_state) {
            $z = setNav("nav_2");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $x['header'] = $this->load->view('template/header', '', true);
            $y["kategori"]=$this->Layanan_model->getKategori();
            $y['contentTitle'] = "Layanan";

            $x['content'] = $this->load->view('layanan/main', $y, true);
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
            $row_count=$this->Layanan_model->countLayanan($q);
            $list=array(
                'status'    => true,
                'message'   => "OK",
                'start'     => $start,
                'row_count' => $row_count,
                'limit'     => $limit,
                'data'     => $this->Layanan_model->getLayananlimit($limit,$start,$q),
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
            $row=$this->Layanan_model->getLayanan_by_id($id);
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
	function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $idx=$this->input->post('idx');
            $data = array(
                'layanan' => $this->input->post('layanan'),
                'kategori_id' => $this->input->post('kategori_id'),
                'kategori_tarif' => $this->input->post('kategori_tarif'),
            );
            if(empty($idx)){
                $this->Layanan_model->insertLayanan($data);
                header('Content-Type: application/json');
                echo json_encode(array("status" => true, "message" => "Berhasil menambahkan data Layanan"));
            }
            else{
                $this->Layanan_model->updateLayanan($data, $idx);
                header('Content-Type: application/json');
                echo json_encode(array("status" => true, "message" => "Berhasil Mengedit Data Layanan"));
            }
            
           
        }else{
            header('Content-Type: application/json');
            echo json_encode(array("status" => false,"message"=> "Anda tidak berhak untuk mengakases halaman ini"));
        }
    }
	function hapus($id){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->Layanan_model->deleteLayanan($id);
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
                'data'  => $this->Layanan_model->getLayanan(),
            );
            $this->load->view('admin/Layanan/view_data_excel',$data);
        }else{
            $this->session->set_flashdata('error', 'Opps... Session expired' );
            header('location:'.base_url() ."login");
        }
    }
	function pdf(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $data=array(
                'data'  => $this->Layanan_model->getLayanan(),
            );
            $html=$this->load->view('admin/Layanan/view_data_pdf',$data, true);
            $pdfFilePath = "DATA_Layanan.pdf";
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