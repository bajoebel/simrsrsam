<?php 
class Retensi extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('users_model');
        $ses_state = $this->users_model->cek_session_id();
        if(!$ses_state){
            redirect(base_url("mr_dokumen.php/login"));
        }
        $this->load->model('retensi_model');
    }   
    public function index(){
        
        $y=array(
            'menu5'     => "active open",
            'poly'      => $this->retensi_model->getPoly()
        );
        $x['header'] = $this->load->view('template/header','',true);
        $z = setNav("nav_1");
        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

        $y['contentTitle'] = "Retensi";        
        $x['content'] = $this->load->view('retensi/v_retensi',$y,true);
        $this->load->view('template/theme',$x);

    }
    function ceknomr(){
        $nomr=$this->input->post('nomr');
        $cek=$this->retensi_model->cekRetensi($nomr);
        if($cek->num_rows()>0){
            $data=array('status'=>false, 'message'=> "Pasien sudah diretensi", 'pasien'=>$cek->row());
        }else{
            $pasien=$this->retensi_model->getPasien($nomr);
            if(empty($pasien)){
                $data=array('status'=>false, 'message'=> "Pasien Tidak Ditemukan", 'pasien'=>array());
            }else{
                $data=array('status'=>true, 'message'=> "OK", 'pasien'=>$pasien);
            }
            
        }
        header('Content-Type: application/json');
        echo json_encode($data);
        
    }

    function data(){
        $q = urldecode($this->input->get('q', TRUE));
            $start = intval($this->input->get('start'));
            $limit = 15;
            $row_count=$this->retensi_model->countRetensi($q);
            $list=array(
                'status'    => true,
                'message'   => "OK",
                'start'     => $start,
                'row_count' => $row_count,
                'limit'     => $limit,
                'data'     => $this->retensi_model->getRetensi($limit,$start,$q),
            );
            header('Content-Type: application/json');
            echo json_encode($list);
    }
    public function wilayah(){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $param = urldecode($this->input->get('param'));
        $limit = 10;
        //echo $param;
        
        $data=$this->retensi_model->get_wilayah($q,$param,$start, $limit);
        //print_r($data);
        $row_count=$this->retensi_model->count_wilayah($q, $param);
        $x=array('wilayah'=>$data);
        
        //$data = $this->Asesi_model->get_limit_data($limit, $start, $q);
        $list=array();
        $tabel=$this->load->view('retensi/v_cari_wilayah', $x, true);
        //$row_count=$this->Asesi_model->total_rows($q);
        $level=$this->session->userdata('level');
        
        $list=array(
            'start'     => $start,
            'row_count' => $row_count,
            'limit'     => $limit,
            'tabel'     => $tabel,
        );
        echo json_encode($list);
    }

    public function pasien(){
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        $limit = 10;
        $this->db->like('nomr', $q);
        $this->db->or_like('no_ktp', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('alamat', $q);
        $this->db->limit($limit, $start);
        $pasien=$this->db->get('tbl01_pasien');
        $data=$pasien->result();
        $row_count=$this->db->get('tbl01_pasien')->num_rows();
        $x=array('pasien'=>$data);
        
        //$data = $this->Asesi_model->get_limit_data($limit, $start, $q);
        $list=array();
        $tabel=$this->load->view('retensi/v_cari_pasien', $x, true);
        //$row_count=$this->Asesi_model->total_rows($q);
        $level=$this->session->userdata('level');
        
        $list=array(
            'start'     => $start,
            'row_count' => $row_count,
            'limit'     => $limit,
            'tabel'     => $tabel,
        );
        echo json_encode($list);
    }
    function simpan_retensi(){
        $data=array(
            'nomr'  => $this->input->post('nomr'),
            'nama_pasien' => $this->input->post('nama_pasien'),
            'tanggal_terakhir_berobat'=> $this->input->post('tanggal_terakhir_berobat'),
            'grId'=> $this->input->post('grId'),
            'grNama'=> $this->input->post('grNama'),
            'rawat_terakhir'=> $this->input->post('rawat_terakhir'),
            'diagnosa'=> $this->input->post('diagnosa'),
        );
        $nomr=$this->input->post('nomr');
        $cek=$this->retensi_model->cekRetensi($nomr);
        if($cek->num_rows()>0){
            $this->db->where('nomr', $nomr);
            $this->db->update('tbl06_retensi', $data);
            $response=array('status'=>true, 'message'=>"Data Berhasil Di update");
        }else{
            $this->db->insert('tbl06_retensi', $data);
            $insert_id=$this->db->insert_id();
            if($insert_id){
                $response=array('status'=>true, 'message'=>"Data Retensi Berhasil Dimasukkan");
            }else{
                $response=array('status'=>false, 'message'=>"Gagal Menambahkan Data Retensi");
            }
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function hapus($idx){
        $this->db->where('idx', $idx);
        $this->db->delete('tbl06_retensi');
        $response = array('status' => true, 'message' => "Data Retensi berhasil dihapus");
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function excel(){
        //header('Content-Type: application/vnd.ms-excel');
        //header('Content-disposition: attachment; filename=' . rand() . '.xls');
        $this->db->order_by('idx');
        $data = $this->db->get('tbl06_retensi')->result();
        
        $x["data"]=$data;
        $this->load->view('retensi/excel', $x);
    }
    function excel1(){
        $this->db->order_by('idx');
        $x['data'] = $this->db->get('tbl06_retensi')->result();
        $this->load->view('retensi/excel', $x);
    }
    function exceldata(){
        $this->db->order_by('idx');
        $data=$this->db->get('tbl06_retensi')->result();
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    
}