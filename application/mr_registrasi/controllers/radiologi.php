<?php
class Radiologi extends CI_Controller{
    function __construct(){
       parent::__construct();
        $this->load->model('m_daftarpasien');
        $this->load->model('m_radiologi');
        $this->load->model('m_cetak');
            if($this->session->userdata('status') != "login"){
                    redirect(base_url("login"));
            }
    }
        
    public function pemeriksaan(){
        $data['poli']           = $this->m_radiologi->poli();
        $data['dokter']         = $this->m_radiologi->dokter();
        $data['bacaan']         = $this->m_radiologi->bacaanFoto();
        $data['no_rad']         = $this->m_radiologi->get_daftar();
        $data['active1']     = "active";
        $this->template->radiologi('radiologi/v_pemeriksaan',$data);
    }
    
    function simpanrad(){
        $no_rad       = $this->input->post('nofoto');
        $rs     = $this->input->post('rs');
        if($rs == 1){
            $dokter = $this->input->post('dokter');
        }else{
            $dokter = $this->input->post('dokter_luar');
        }
        $datapendaftaran = array(
            'id_tr_rad'             =>$no_rad,
            'tanggal_order'         =>$this->input->post('tglorder'),
            'tanggal_diagnosa'      =>$this->input->post('tglreg'),
            'id_daftar'             =>$this->input->post('noreg'),
            'id_instansi'           =>$rs,
            'grId'                  =>$this->input->post('poli'),
            'id_diagnosa'           =>$this->input->post('dk'),
            'id_foto'               =>$this->input->post('foto'),
            'bacaan_diagnosa_klinis'=>$this->input->post('bacaan'),
            'bacaan_kesan'          =>$this->input->post('kesan'),
            'bacaan_saran'          =>$this->input->post('saran'),
            'id_dokter_rad'         =>$this->session->userdata('nama'),
            'dokter_meminta'        =>$dokter
        );
        $this->db->insert('t_radiologi',$datapendaftaran);
        redirect(base_url('radiologi/cetak_rad/'.$no_rad));
    }
    
    public function editrad(){
        $norad   = $this->input->post("nofoto");
        $rs     = $this->input->post('rs');
        if($rs == 1){
            $dokter = $this->input->post('dokter');
        }else{
            $dokter = $this->input->post('dokter_luar');
        }
        $datapemeriksaan = array(
            'tanggal_order'         =>$this->input->post('tglorder'),
            'tanggal_diagnosa'      =>$this->input->post('tglreg'),
            'id_instansi'           =>$rs,
            'grId'                  =>$this->input->post('poli'),
            'id_diagnosa'           =>$this->input->post('dk'),
            'id_foto'               =>$this->input->post('foto'),
            'bacaan_diagnosa_klinis'=>$this->input->post('bacaan'),
            'bacaan_kesan'          =>$this->input->post('kesan'),
            'bacaan_saran'          =>$this->input->post('saran'),
            'id_dokter_rad'         =>$this->session->userdata('nama'),
            'dokter_meminta'        =>$dokter
        );
        $this->db->where('id_tr_rad',$norad);
        $this->db->update('t_radiologi',$datapemeriksaan);
        redirect('radiologi/list_pemeriksaan');
	}
    
    function hapus_rad(){
        $no_foto        = $this->uri->segment(3);
        $this->db->where('id_tr_rad',$no_foto);
        $this->db->delete('t_radiologi');
        redirect('radiologi/list_pemeriksaan');
    }
    
    function cetak_rad(){
        $no_rad       = $this->uri->segment(3);

        $data['data']  = $this->m_cetak->get_hasilrad($no_rad);
        $data['nama']  = $this->session->userdata('nm_lengkap');
        $this->load->view('cetak/v_hasilrad',$data);
    }
    
    function simpan_radpdf(){
        $no_rad       = $this->uri->segment(3);

        $data['data']  = $this->m_cetak->get_hasilrad($no_rad);
        $data['nama']  = $this->session->userdata('nm_lengkap');
        
        $this->load->view('cetak/v_hasilradpdf',$data);
        
    }
    
    function no_foto(){
    $nofoto   = $this->input->post("nofoto");
    $cek    = $this->m_radiologi->get_nofoto($nofoto)->get();
        if($cek->num_rows() > 0){
            $data = array(
                'MESSAGE'       => 'No Foto sudah terdaftar'
            );
        }else{
            $data = array(
                'MESSAGE'       => 'OK'
            ); 
        }
        echo json_encode($data);
    }
    
    function noreg_pasien(){
    $iddaftar   = $this->input->post("noreg");
    $cek    = $this->m_daftarpasien->get_kunjungan($iddaftar)->get();
    $dataP   = $cek->row_array();
        if($cek->num_rows() > 0){
            if($dataP['jns_kelamin'] == 'L'){
                $jk = "LAKI-LAKI";
            }else if($dataP['jns_kelamin'] == 'P'){
                $jk = "PEREMPUAN";
            }else{
                $jk = "";
            }
            if($dataP['status_daftar'] == 1){
                $data = array(
                'MESSAGE'       => 'Pendaftaran pasien telah dibatalkan...'
                );
            }else{
            $data = array(
                'MESSAGE'   => 'OK',
                'NOMR'      => $dataP['nomr'],
                'NAMA'      => $dataP['nama'],
                'JK'        => $jk,
                'TL'        => $dataP['tempat_lahir'],
                'TGLL'      => $dataP['tgl_lahir'],
                'ALAMAT'    => $dataP['alamat'],
                'TGLREG'    => $dataP['tgl_reg'],
                'POLI'      => $dataP['grNama'],
                'KDPOLI'    => $dataP['grId'],
                'KDMAPPING' => $dataP['gr_mapping'],
                'BAYAR'     => $dataP['cara_bayar'],
                'NOBPJS'    => $dataP['no_bpjs']
            );
            }
            echo json_encode($data);
        }else{
            $data = array(
                'MESSAGE'       => 'Pasien Tidak Terdaftar'
            );             
            echo json_encode($data);
        }
    }
    
    function add_ajax_bacaan($id_foto){
        $data['value'] = $this->db->get_where('m_bacaan_foto',array('id_foto'=>$id_foto))->row_array();
        $this->load->view('radiologi/add_bacaan',$data);
    }
    
    function add_edit_bacaan($no_foto){
        $data['edit']  = $this->m_radiologi->get_rad($no_foto);
        $this->load->view('radiologi/add_editbacaan',$data);
    }
    
    public function list_pemeriksaan(){
        $tgl   = $this->input->get("tgl");
        $nomr   = $this->input->get("nomr");
        $jumlah_data = $this->m_radiologi->jumlah_pemeriksaan($tgl,$nomr);
        $config['base_url'] = base_url().'radiologi/list_pemeriksaan';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 10;
        $from = $this->uri->segment(3);
        $config['suffix'] = (!empty($_GET)) ? '?'.http_build_query($_GET, '', "&") : '';
        $config['first_url'] = $config['base_url'] . $config['suffix'];
    
        $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-35px;'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        
        $this->pagination->initialize($config);		
        $data['pasien'] = $this->m_radiologi->list_pemeriksaan($config['per_page'],$from,$tgl,$nomr);
        $data['jumlah'] = $jumlah_data;
        $data['active2']= "active";
        $this->template->radiologi('radiologi/v_listrad',$data);
    }
    
    public function edit_pemeriksaan(){
        $no_foto        = $this->uri->segment(3);
        $data['edit']  = $this->m_radiologi->get_rad($no_foto);
        $data['instansi']       = $this->m_radiologi->instansi();
        $data['diagnosa']       = $this->m_radiologi->d_klinis();
        $data['poli']           = $this->m_radiologi->poli();
        $data['dokter']         = $this->m_radiologi->dokter();
        $data['bacaan']         = $this->m_radiologi->bacaanFoto();
        $data['no_rad']         = $this->m_radiologi->get_daftar();
        $this->template->radiologi('radiologi/v_editpemeriksaan',$data);
    }
    
    function add_ajax_rs(){
        $dataD  = $this->m_radiologi->rumah_sakit();
            $data .= "<option value=''>Klik untuk memilih Rumah Sakit...</option>";
        foreach ($dataD as $value) {
            $data .= "<option value='".$value->id_instansi."'>".$value->nama_instansi."</option>";
        }
        echo $data;
    }
    
    function add_ajax_dk(){
        $dataD  = $this->m_radiologi->diagnosa_klinis();
            $data .= "<option value=''>Klik untuk memilih Diagnosa Klinis...</option>";
        foreach ($dataD as $value) {
            $data .= "<option value='".$value->id_diagnosa."'>".$value->diagnosa_klinis."</option>";
        }
        echo $data;
    }
    
    function simpan_rs(){
        $datars = array(
            'nama_instansi'  => $this->input->post("rSakit")
        );
        $this->db->insert('m_instansi',$datars);
    }
    
    function simpan_dk(){
        $datadk = array(
            'diagnosa_klinis'  => $this->input->post("dKlinis")
        );
        $this->db->insert('m_diagnosa_klinis',$datadk);
    }
}

