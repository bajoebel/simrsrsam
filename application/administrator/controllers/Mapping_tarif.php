<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapping_tarif extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('mapping_tarif_model');
        $this->load->model('users_model');
        
    }
        
	public function index(){
        $ses_state = $this->users_model->cek_session_id();
        $y['index_menu'] = 3;
        if ($ses_state) {
            $z = setNav("nav_3");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $x['header'] = $this->load->view('template/header', '', true);
            $y["kategori"]=$this->mapping_tarif_model->getKategori();
            $y["ruang"] = $this->mapping_tarif_model->getRuang();
            $y['contentTitle'] = "Layanan";

            $x['content'] = $this->load->view('mapping_tarif/main', $y, true);
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
            $ruang = urldecode($this->input->get('ruang'));
            $limit = 20;
            $row_count=$this->mapping_tarif_model->countLayanan($q, $ruang);
            $list=array(
                'status'    => true,
                'message'   => "OK",
                'start'     => $start,
                'row_count' => $row_count,
                'limit'     => $limit,
                'data'     => $this->mapping_tarif_model->getLayananlimit($limit,$start,$q, $ruang),
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

    public function data_layanan()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $q = urldecode($this->input->get('q', TRUE));
            $jenis = urldecode($this->input->get('jenis', TRUE));
            $start = intval($this->input->get('start'));
            $ruang = intval($this->input->get('ruang'));
            $limit = 20;
            $row_count = $this->mapping_tarif_model->countDataLayanan($q, $ruang, $jenis);
            $list = array(
                'status'    => true,
                'message'   => "OK",
                'start'     => $start,
                'row_count' => $row_count,
                'limit'     => $limit,
                'data'     => $this->mapping_tarif_model->getDataLayananlimit($limit, $start, $q, $ruang, $jenis),
            );
        } else {
            $list = array(
                'status'    => false,
                'message'   => "Anda tidak berhak untuk mengakases halaman ini",
                'data'      => array()
            );
        }
        header('Content-Type: application/json');
        echo json_encode($list);
    }
	function add($id_tarif=""){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $idruang = urlencode($this->input->get('ruang'));
            $row=$this->mapping_tarif_model->mapTarif($id_tarif, $idruang);
            if($row==true){ 
                $response = array(
                    'status'    => true,
                    'message'   => "OK",
                    'csrf'      => $this->security->get_csrf_hash(),
                );
            }else{
                $response = array(
                    'status'    => false,
                    'message'   => "Data Tidak Ditemukan",
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
                $this->mapping_tarif_model->insertLayanan($data);
                header('Content-Type: application/json');
                echo json_encode(array("status" => true, "message" => "Berhasil menambahkan data Layanan"));
            }
            else{
                $this->mapping_tarif_model->updateLayanan($data, $idx);
                header('Content-Type: application/json');
                echo json_encode(array("status" => true, "message" => "Berhasil Mengedit Data Layanan"));
            }
            
           
        }else{
            header('Content-Type: application/json');
            echo json_encode(array("status" => false,"message"=> "Anda tidak berhak untuk mengakases halaman ini"));
        }
    }
    function contoh(){
        // persiapkan curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.google.co.id/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;
    }
	function hapus($id){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->mapping_tarif_model->deleteLayanan($id);
            header('Content-Type: application/json');
            echo json_encode(array("status" => TRUE, "message"=> "Data Berhasil dihapus"));
        }else{
            header('Content-Type: application/json');
            echo json_encode(array("status" => FALSE, "message"=> "Anda tidak berhak untuk mengakases halaman ini"));
        }
        
    }
    function hapus_tarif_operasi($id)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->mapping_tarif_model->deleteLayananoperasi($id);
            header('Content-Type: application/json');
            echo json_encode(array("status" => TRUE, "message" => "Data Berhasil dihapus"));
        } else {
            header('Content-Type: application/json');
            echo json_encode(array("status" => FALSE, "message" => "Anda tidak berhak untuk mengakases halaman ini"));
        }
    }
	function excel(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $data=array(
                'data'  => $this->mapping_tarif_model->getLayanan(),
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
                'data'  => $this->mapping_tarif_model->getLayanan(),
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