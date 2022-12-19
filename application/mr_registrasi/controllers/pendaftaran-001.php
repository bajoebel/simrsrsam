<?php 
class Pendaftaran extends CI_Controller{
    function __construct(){
       parent::__construct();
        $this->load->model('m_daftarpasien');
        $this->load->model('m_cetak');
            if($this->session->userdata('status') != "login"){
                redirect(base_url("login"));
            }
        backButtonHandle();
    }
        
    public function daftar(){
        $data['poly']       = $this->m_daftarpasien->poly();
        $data['rujukan']    = $this->m_daftarpasien->rujukan();
        $data['menu1']       = "active open";
        $data['active11']     = "active";
        $this->template->pendaftaran('pendaftaran/v_pendaftaranlama',$data);
    }
    
    public function daftar_ranap(){
        $data['ruang']       = $this->m_daftarpasien->ruang();
        $data['rujukan']    = $this->m_daftarpasien->rujukan();
        $data['dokter']    = $this->m_daftarpasien->dokter();
        $data['menu1']       = "active open";
        $data['active12']     = "active";
        $this->template->pendaftaran('pendaftaran/v_pendaftaranranap',$data);
    }
    
    function simpanranap(){
        $daftar       = $this->m_daftarpasien->get_daftarranap();
        $nomr         = $this->input->post('noreg');
        $datapendaftaran = array(
            'id_admisi'             =>$daftar,
            'id_daftar'             =>$this->input->post('noreg'),
            'grId'                  =>$this->input->post('ruang'),
            'tgl_masuk'             =>$this->input->post('tglreg'),
            'dktr_pengirim'         =>$this->input->post('dokter'),
            'asal_poli'             =>$this->input->post('kdpoli'),
            'user_admisi'           =>$this->session->userdata('nama')
        );
        $this->db->insert('t_admissi_ranap',$datapendaftaran);
        redirect(base_url('pendaftaran/cetaksuratmasukinap/'.$nomr));
        
    }
    
    function simpanlama(){
        $daftar       = $this->m_daftarpasien->get_daftar();
        $datapendaftaran = array(
            'id_daftar'             =>$daftar,
            'nomr'                  =>$this->input->post('nomr'),
            'tgl_reg'               =>date("Y-m-d H:i:s"),
            'grId'                  =>$this->input->post('tujuan'),
            'id_rujuk'              =>$this->input->post('rujukan'),
            'id_user'               =>$this->session->userdata('nama')
        );
        $this->db->insert('t_pendaftaran',$datapendaftaran);
        redirect(base_url('pendaftaran/cetak_pendaftaran/'.$daftar));
    }
    
    function batal_daftar(){
        $iddaftar = $this->input->post('rowid');
        $cek        = $this->m_daftarpasien->get_kunjungan($iddaftar)->get();
        
            if($cek->num_rows() > 0){
                $cekinap    = $this->db->from('t_admissi_ranap')->where('id_daftar',$iddaftar)->get()->num_rows();
                if($cekinap > 0){
                    $dataid = array(
                    'MESSAGE'         => 'Pasien sudah terdaftar di rawat inap...'
                    );
                }else{
                $data = array(
                    'status_daftar'         => 1,
                    'user_batal'            => $this->session->userdata('nama')
                );
                $this->db->where('id_daftar',$iddaftar);
                $this->db->update('t_pendaftaran',$data);
                
                $dataid = array(
                    'MESSAGE'         => 'OK'
                );
                }
                
            }else{
                $dataid = array(
                    'MESSAGE'         => 'Data gagal dibatalkan'
                );
            }
        
        
        echo json_encode($dataid);
    }
    function batal_ranap(){
        $idadmisi = $this->input->post('rowid');
        $cek      = $this->m_daftarpasien->get_rawat($idadmisi)->get();
        
            if($cek->num_rows() > 0){
                $data = array(
                    'status_ranap'          => 1,
                    'user_batal'            => $this->session->userdata('nama')
                );
                $this->db->where('id_admisi',$idadmisi);
                $this->db->update('t_admissi_ranap',$data);
                
                $dataid = array(
                    'MESSAGE'         => 'OK'
                );
                
            }else{
                $dataid = array(
                    'MESSAGE'         => 'Data gagal dibatalkan'
                );
            }
        
        
        echo json_encode($dataid);
    }
     
    public function pendaftaran_baru(){
        $data['agama']      = $this->m_daftarpasien->agama();
        $data['negara']     = $this->m_daftarpasien->negara();
        $data['provinsi']   = $this->m_daftarpasien->provinsi();
        $data['menu1']      = "active open";
        $data['active11']   = "active";
        $this->template->pendaftaran('pendaftaran/v_pendaftaranbaru',$data);
	}
    
    function simpanbaru(){
        $nomr       = $this->m_daftarpasien->get_nomr();
        $tgldaftar  = date("Y/m/d");
        $datapasien = array(
            'nomr'                  =>$nomr,
            'no_ktp'                =>$this->input->post('noktp'),
            'nama'                  =>$this->input->post('nama'),
            'tempat_lahir'          =>$this->input->post('tl'),
            'tgl_lahir'             =>$this->input->post('tgll'),
            'jns_kelamin'           =>$this->input->post('jk'),
            'pekerjaan'             =>$this->input->post('pekerjaan'),
            'id_agama'              =>$this->input->post('agama'),
            'no_telpon'             =>$this->input->post('telp1'),
            'id_negara'             =>$this->input->post('negara'),
            'id_provinsi'           =>$this->input->post('provinsi'),
            'id_kab_kota'           =>$this->input->post('kota'),
            'id_kecamatan'          =>$this->input->post('kec'),
            'id_kelurahan'          =>$this->input->post('desa'),
            'alamat'                =>$this->input->post('alamat'),
            'penanggung_jawab'      =>$this->input->post('tgjwb'),
            'no_penanggung_jawab'   =>$this->input->post('telp2'),
            'no_bpjs'               =>$this->input->post('nobpjs'),
            'tgl_daftar'            =>$tgldaftar
        );
        $this->db->insert('m_pasien',$datapasien);
        redirect(base_url('pendaftaran/cetak/'.$nomr.'/cetak_kartu'));
    }
          
    public function create_sep(){
        $data['noreg']      = $this->uri->segment(3);
        $data['diagnosa']   = $this->m_daftarpasien->get_diagnosa()->get()->result();
        $data['active2']     = "active";
        $this->template->pendaftaran('pendaftaran/v_createsep',$data);
    }
    
    function simpan_regsep(){
        $nosep = $_POST['nosep'];
        $data = "20419";//20419 - 9wXA881141
        $secretKey = "9wXA881141";//1000 - 7789
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
    	$tgl=date("Y-m-d H:i:s");
        #$ip = "http://api.asterix.co.id/SepWebRest/peserta/";
        #$ip = "http://172.162.121.6:85/WsLokalRest/Peserta/peserta/";
        #$ip = "http://172.162.121.6:8082/SepLokalRest/peserta/0001151420883";
        $ip = "http://api.bpjs-kesehatan.go.id:8080/VClaim-rest/SEP/";
        $url = $ip."$nosep";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array("Accept: application/json\r\n" . "X-cons-id: $data\r\n" . "X-Timestamp: $tStamp\r\n" . "X-Signature: $encodedSignature"));
        //curl_setopt($curl, CURLOPT_GET, true);
        $json_response = curl_exec($curl);        
        curl_close($curl);
        
        $response = json_decode($json_response, true);
        
        $code = $response['metaData']['code'];
        if($code == '200'){
            $datasep = array(
                'NO_SEP'                =>$nosep,
                'noKartu'               =>$response['response']['peserta']['noKartu'],
                'tglSep'                =>$response['response']['tglSep'],
                'noRujukan'             =>"-",
                'ppkPelayanan'          =>"0304R001",
                'jnsPelayanan'          =>$this->input->post('layanan'),
                'catatan'               =>$response['response']['catatan'],
                'klsRawat'              =>$response['response']['kelasRawat'],
                'user'                  =>$this->session->userdata('nama'),
                'noMr'                  =>$response['response']['peserta']['noMr'],
                'id_daftar'             =>$this->input->post('noreg'),
                'jnsPeserta'            =>$response['response']['peserta']['jnsPeserta']
            );
            $this->db->insert('t_sep',$datasep);
        }
        
        echo $json_response;
    }
        
    public function edit_pasien(){
        $nomr         = $this->uri->segment(3);
        $data['edit']  = $this->m_daftarpasien->get_pasien($nomr)->get()->row_array();
        $data['agama'] = $this->m_daftarpasien->agama();
        $data['negara'] = $this->m_daftarpasien->negara();
        $data['provinsi'] = $this->m_daftarpasien->provinsi();
        $this->template->pendaftaran('pendaftaran/v_editpasien',$data);
	}
        
    public function updatepasien(){
        $nomr   = $this->input->post("nomr");
        $datapasien = array(
            'no_ktp'        =>$this->input->post('noktp'),
            'nama'          =>$this->input->post('nama'),
            'tempat_lahir'  =>$this->input->post('tl'),
            'tgl_lahir'     =>$this->input->post('tgll'),
            'jns_kelamin'   =>$this->input->post('jk'),
            'pekerjaan'     =>$this->input->post('pekerjaan'),
            'id_agama'      =>$this->input->post('agama'),
            'no_telpon'     =>$this->input->post('telp1'),
            'id_negara'     =>$this->input->post('negara'),
            'id_provinsi'   =>$this->input->post('provinsi'),
            'id_kab_kota'   =>$this->input->post('kota'),
            'id_kecamatan'  =>$this->input->post('kec'),
            'id_kelurahan'  =>$this->input->post('desa'),
            'alamat'        =>$this->input->post('alamat'),
            'penanggung_jawab'=>$this->input->post('tgjwb'),
            'no_penanggung_jawab'=>$this->input->post('telp2'),
            'no_bpjs'       =>$this->input->post('nobpjs')
        );
        $this->db->where('nomr',$nomr);
        $this->db->update('m_pasien',$datapasien);
        redirect('pendaftaran/list_pasien');
	}
        
    public function cetak_pendaftaran(){
        $daftar         = $this->uri->segment(3);
        $data['cetak']  = $this->m_daftarpasien->get_cetak($daftar);
        $this->template->pendaftaran('pendaftaran/v_cetakkartu',$data);
	}
        
    function cetak(){
        $reqData    = $this->uri->segment(4);
        $nomr       = $this->uri->segment(3);
        $poli       = $this->uri->segment(5);
        $data1['pas']  = $this->m_cetak->get_kartu($nomr);
        $data2['pas']  = $this->m_cetak->get_stiker($nomr);
        $data3['data']  = $this->m_cetak->get_registrasi($nomr);
        $data3['cek']  = $this->m_cetak->get_antrian($poli);
        
        if($reqData=="cetak_kartu"){
            $this->load->view('cetak/v_kartupasien',$data1);
        }else if($reqData=="cetak_registrasi"){
            $this->load->view('cetak/v_registrasi',$data3);
        }else{
            $this->load->view('cetak/v_stiker',$data2);
        }
    }
    
    public function cetak_sep(){
        $nosep          = $this->uri->segment(3);
        $data['data']   = $this->m_cetak->get_sep($nosep);
        $this->load->view('cetak/v_printsep',$data);
	}
       
    function cetaksuratmasuk(){
        $reqData    = $this->uri->segment(4);
        $nomr       = $this->uri->segment(3);
        
        $data1['data']  = $this->m_cetak->get_suratmasukri($nomr);
        $data2['data']  = $this->m_cetak->get_suratmasukrj($nomr);
        if($reqData=="cetak_ri"){
            $this->load->view('cetak/v_suratmasukri',$data1);
        }else{
            $this->load->view('cetak/v_suratmasukrj',$data2);
        }
	}
    function cetaksuratmasukinap(){
        $nomr       = $this->uri->segment(3);
        
            $data['data']  = $this->m_cetak->get_suratmasukri($nomr);
            $this->load->view('cetak/v_suratmasukinap',$data);
	}
        
    function modalcetak(){
            $this->load->view('pendaftaran/v_modalcetak');
	}
    function modalview(){
        $nomr   = $this->input->post("rowid");
        $view['detail']  = $this->m_daftarpasien->get_pasien($nomr)->get()->row_array();
            $this->load->view('pendaftaran/v_modaldetail',$view);
	}
    function modalkunjungan(){
        $iddaftar   = $this->input->post("rowid");
        $view['detail']  = $this->m_daftarpasien->get_kunjungan($iddaftar)->get()->row_array();
        $this->load->view('pendaftaran/v_modalkunjungan',$view);
	}
    function modalrawat(){
        $idadmisi   = $this->input->post("rowid");
        $view['detail']  = $this->m_daftarpasien->get_rawat($idadmisi)->get()->row_array();
        $this->load->view('pendaftaran/v_modalrawat',$view);
	}
    
    function modalsuratmasuk(){
            $noreg = $this->input->post("rowid");
            $data['cek'] = $this->m_daftarpasien->get_modalkunjungan($noreg);
            $this->load->view('pendaftaran/v_modalsuratmasuk',$data);
	}
 
    public function list_pasien(){
        $nama   = $this->input->get("nama");
        $nomr   = $this->input->get("nomr");
        $tgll   = $this->input->get("tgll");
        $jumlah_data = $this->m_daftarpasien->jumlah_data($nama,$nomr,$tgll);
        $config['base_url'] = base_url().'pendaftaran/list_pasien';
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
        $data['pasien'] = $this->m_daftarpasien->list_datapasien($config['per_page'],$from,$nama,$nomr,$tgll);
        $data['jumlah'] = $jumlah_data;
        $data['menu3']      = "active open";
        $data['active31']   = "active";
        $this->template->pendaftaran('pendaftaran/v_listpasien',$data);
	}
    
    public function list_sep(){
        $data['menu3']      = "active open";
        $data['active34']   = "active";
        $this->template->pendaftaran('pendaftaran/v_listsep',$data);
	}
        
    public function list_kunjungan(){
        $tgl   = $this->input->get("tgl");
        $nomr   = $this->input->get("nomr");
        $poli   = $this->input->get("poli");
        $jumlah_data = $this->m_daftarpasien->jumlah_kunjungan($tgl,$nomr,$poli);
        $config['base_url'] = base_url().'pendaftaran/list_kunjungan';
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
        $data['poly']   = $this->m_daftarpasien->poly();
        $data['pasien'] = $this->m_daftarpasien->list_kunjungan($config['per_page'],$from,$tgl,$nomr,$poli);
        $data['jumlah'] = $jumlah_data;
        $data['menu3']      = "active open";
        $data['active32']   = "active";
        $this->template->pendaftaran('pendaftaran/v_listkunjungan',$data);
	}
        
     public function list_rawatinap(){
        $tgl   = $this->input->get("tgl");
        $nomr   = $this->input->get("nomr");
        $ruang   = $this->input->get("ruang");
        $jumlah_data = $this->m_daftarpasien->jumlah_rawat($tgl,$nomr,$ruang);
        $config['base_url'] = base_url().'pendaftaran/list_rawatinap';
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
        $data['ruang']   = $this->m_daftarpasien->ruang();
        $data['pasien'] = $this->m_daftarpasien->list_rawat($config['per_page'],$from,$tgl,$nomr,$ruang);
        $data['jumlah'] = $jumlah_data;
        $data['menu3']      = "active open";
        $data['active33']   = "active";
        $this->template->pendaftaran('pendaftaran/v_listrawatinap',$data);
	}
        
    public function get_riwayatkunjungan(){
        $nomr       = $this->input->post("nomr_pasien");
        $data       = $this->m_daftarpasien->list_riwayatrj($nomr);	
        $jml_data   = $data->num_rows();

        foreach($data->result() as $row)
        {
            $arr['jumlah'] = $jml_data;
            $arr['pasien'][] = array(
                'noreg'         =>$row->id_daftar,
                'tglreg'        =>$row->tgl_reg,
                'tujuan'        =>$row->grNama,
                'jns_bayar'     =>$row->id_cara_bayar,
                'user'          =>$row->id_user,
                'status'        =>$row->status_daftar
            );
        }
        echo json_encode($arr);
	}
    public function list_riwayatrajal(){
        $data['menu4']      = "active open";
        $data['active41']   = "active";
        $this->template->pendaftaran('pendaftaran/v_riwayatrajal',$data);
    }
    
    public function get_riwayatranap(){
        $nomr       = $this->input->post("nomr_pasien");
        $data       = $this->m_daftarpasien->list_riwayatri($nomr);	
        $jml_data   = $data->num_rows();

        foreach($data->result() as $row)
        {
            $arr['jumlah'] = $jml_data;
            $arr['pasien'][] = array(
                'noreg'         =>$row->id_daftar,
                'tglmasuk'      =>$row->tgl_masuk,
                'tglkeluar'     =>$row->tgl_keluar,
                'ruang'         =>$row->grNama,
                'jns_bayar'     =>$row->id_cara_bayar,
                'user'          =>$row->user_admisi
            );
        }
        echo json_encode($arr);
	}
        
    public function list_riwayatranap(){
        $data['menu4']      = "active open";
        $data['active42']   = "active";
        $this->template->pendaftaran('pendaftaran/v_riwayatranap',$data);
    }
        
    function add_ajax_prov(){
        $dataD  = $this->m_daftarpasien->provinsi();
            $data .= "<option value=''>Klik untuk memilih Provinsi...</option>";
        foreach ($dataD as $value) {
            $data .= "<option value='".$value->id_provinsi."'>".$value->nama_provinsi."</option>";
        }
        echo $data;
    }
    
    function add_ajax_kab($id_prov,$kab){
        $data['kota']  = $kab;
        $data['val']   = $this->db->get_where('m_kab_kota',array('id_provinsi'=>$id_prov))->result();
        $this->load->view('alamat/add_kabkota',$data);
    }
    
    function add_ajax_kec($id_kab,$kec){
        $data['kec']  = $kec;
        $data['val'] = $this->db->get_where('m_kecamatan',array('id_kab_kota'=>$id_kab))->result();
        $this->load->view('alamat/add_kecamatan',$data);
    }
    function add_ajax_des($id_kec,$kel){
        $data['kel']  = $kel;
        $data['val'] = $this->db->get_where('m_kelurahan',array('id_kecamatan'=>$id_kec))->result();
        $this->load->view('alamat/add_kelurahan',$data);
    }
    
    function add_ajax_dokter($grId){
        $dataD  = $this->m_daftarpasien->get_dokter($grId);
        $data = "<option value=''>-- Pilih Dokter --</option>";
        foreach ($dataD->get()->result() as $value) {
            $data .= "<option value='".$value->id_dokter."'>".$value->nama_dokter."</option>";
        }
        echo $data;
    }
    
    function nomr_pasien(){
    $nomr   = $this->input->post("nomr");
    $dataP  = $this->m_daftarpasien->get_pasien($nomr)->get()->row_array();
    $cek    = $this->m_daftarpasien->get_pasien($nomr)->get()->num_rows();
    
        if($cek > 0){
            if($dataP['jns_kelamin'] == 'L'){
                $jk = "LAKI-LAKI";
            }else if($dataP['jns_kelamin'] == 'P'){
                $jk = "PEREMPUAN";
            }else{
                $jk = "";
            }
        $data = array(
                'MESSAGE'   => 'OK', 
                'KTP'       => $dataP['no_ktp'],
                'NAMA'      => $dataP['nama'],
                'TL'        => $dataP['tempat_lahir'],
                'TGLL'      => $dataP['tgl_lahir'],
                'JK'        => $jk,
                'ALAMAT'    => $dataP['alamat'],
                'NOBPJS'    => $dataP['no_bpjs']
            );            
            echo json_encode($data);
        }else{
        $data = array(
            'MESSAGE'       => 'No MR Tidak Terdaftar'
        );             
        echo json_encode($data);
        }
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
                'NOBPJS'    => $dataP['no_bpjs'],
                'TELP'      => $dataP['no_telpon']
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
    
    function get_jkn(){
        $nopeserta = $_POST['nopeserta'];
        $data = "20419";//20419 - 9wXA881141
        $secretKey = "9wXA881141";//1000 - 7789
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
    	$tgl=date("Y-M-d");
        #$ip = "http://api.asterix.co.id/SepWebRest/peserta/";
        #$ip = "http://172.162.121.6:85/WsLokalRest/Peserta/peserta/";
        #$ip = "http://172.162.121.6:8082/SepLokalRest/peserta/0001151420883";
        $ip = "http://api.bpjs-kesehatan.go.id:8080/VClaim-rest/Peserta/nokartu/$nopeserta/tglSEP/$tgl";
        
        $curl = curl_init($ip);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array("Accept: application/json\r\n" . "X-cons-id: $data\r\n" . "X-Timestamp: $tStamp\r\n" . "X-Signature: $encodedSignature"));
        //curl_setopt($curl, CURLOPT_GET, true);
        $json_response = curl_exec($curl);        
        curl_close($curl);
        echo $json_response;
          
    }
    
    function get_nik(){
        $noktp = $_POST['noktp'];
        $data = "20419";//20419 - 9wXA881141
        $secretKey = "9wXA881141";//1000 - 7789
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
    	$tgl=date("Y-M-d");
        #$ip = "http://api.asterix.co.id/SepWebRest/peserta/";
        #$ip = "http://172.162.121.6:85/WsLokalRest/Peserta/peserta/";
        #$ip = "http://172.162.121.6:8082/SepLokalRest/peserta/0001151420883";
        $ip = "http://api.bpjs-kesehatan.go.id:8080/VClaim-rest/Peserta/nik/$noktp/tglSEP/$tgl";
        $curl = curl_init($ip);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array("Accept: application/json\r\n" . "X-cons-id: $data\r\n" . "X-Timestamp: $tStamp\r\n" . "X-Signature: $encodedSignature"));
        //curl_setopt($curl, CURLOPT_GET, true);
        $json_response = curl_exec($curl);        
        curl_close($curl);
        echo $json_response;
          
    }
    
    function get_riwayat(){
        $nopeserta = $_POST['nopeserta'];
        $data       = $this->m_daftarpasien->list_riwayatsep($nopeserta);	
        $jml_data   = $data->num_rows();

        foreach($data->result() as $row)
        {
            $arr['jumlah'] = $jml_data;
            $arr['list'][] = array(
                'nosep'         =>$row->NO_SEP,
                'tglsep'        =>$row->tglSep,
                'poli'          =>$row->grNama,
                'layanan'       =>$row->jnsPelayanan,
                'kodediag'      =>$row->diagAwal,
                'diag'          =>$row->jenis_penyakit
            );
        }
        echo json_encode($arr);   
    }
    
    function get_cetaksep(){
        $nosep = $_POST['nosep'];
        $data = "20419";//20419 - 9wXA881141
        $secretKey = "9wXA881141";//1000 - 7789
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
    	$tgl=date("Y-m-d H:i:s");
        #$ip = "http://api.asterix.co.id/SepWebRest/peserta/";
        #$ip = "http://172.162.121.6:85/WsLokalRest/Peserta/peserta/";
        #$ip = "http://172.162.121.6:8082/SepLokalRest/peserta/0001151420883";
        $ip = "http://api.bpjs-kesehatan.go.id:8080/VClaim-rest/SEP/";
        $url = $ip."$nosep";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array("Accept: application/json\r\n" . "X-cons-id: $data\r\n" . "X-Timestamp: $tStamp\r\n" . "X-Signature: $encodedSignature"));
        //curl_setopt($curl, CURLOPT_GET, true);
        $json_response = curl_exec($curl);        
        curl_close($curl);
        echo $json_response;   
    }
    
    function get_ceknosep(){
        $nosep  = $this->input->post("nosep");
        $nomr  = $this->input->post("nomr");
        $cek    = $this->m_daftarpasien->list_datasep($nosep);
        $dataP  = $cek->row_array();

            if($cek->num_rows() > 0){
            $data = array(
                'MESSAGE'   => 'OK',
                'NOSEP'     => $dataP['NO_SEP']
                );
            }else{
            $data = array(
                'MESSAGE'       => 'Tidak dapat cetak SEP... No Registrasi Pasien tidak ditemukan.'
            ); 
            }  
            echo json_encode($data);
    }
    
    function get_faskes(){
        $faskes = $this->uri->segment(4);
        $jnsFaskes = $this->uri->segment(3);
        $data = "20419";//20419 - 9wXA881141
        $secretKey = "9wXA881141";//1000 - 7789
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
    	$tgl=date("Y-m-d H:i:s");
        #$ip = "http://api.asterix.co.id/SepWebRest/peserta/";
        #$ip = "http://172.162.121.6:85/WsLokalRest/Peserta/peserta/";
        #$ip = "http://172.162.121.6:8082/SepLokalRest/peserta/0001151420883";
        $url = "http://api.bpjs-kesehatan.go.id:8080/VClaim-rest/referensi/faskes/$faskes/$jnsFaskes";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array("Accept: application/json\r\n" . "X-cons-id: $data\r\n" . "X-Timestamp: $tStamp\r\n" . "X-Signature: $encodedSignature"));
        //curl_setopt($curl, CURLOPT_GET, true);
        $return = curl_exec($curl);        
        curl_close($curl);
        
        $response = json_decode($return, true);
        $jml = sizeof($response['response']['faskes']);
        for($i=0; $i<$jml; $i++){
            $arr['query'] = $faskes;
            $arr['suggestions'][] = array(
                'value'    =>$response['response']['faskes'][$i]['nama'],
                'code'     =>$response['response']['faskes'][$i]['kode']
            );
        }
        echo json_encode($arr);
          
    }
    
    function get_sep(){
        $time           =date("H:i:s");
        $noKartu	= $this->input->post("noKartu");
        $tglSep		= $this->input->post("tglSep");
        $ppkPelayanan 	= "0304R001";
	$jnsPelayanan 	= $this->input->post("jnsPelayanan");
        $klsRawat 	= $this->input->post("klsRawat");
        $noMR		= $this->input->post("noMR");
        
	$asalRujukan	= $this->input->post("asalRujukan");
        $tglRujukan	= $this->input->post("tglRujukan");
        $noRujukan	= $this->input->post("noRujukan");
	$ppkRujukan 	= $this->input->post("ppkRujukan");
        
        $catatan 	= $this->input->post("catatan");
	$diagAwal 	= $this->input->post("diagAwal");
        
        $tujuan 	= $this->input->post("tujuan");
        $eksekutif 	= "0";
        
        $cob            = $this->input->post("cob");
	
        $lakaLantas 	= $this->input->post("lakaLantas");
        $penjamin 	= $this->input->post("penjamin");
        $lokasiLaka 	= $this->input->post("lokasiLaka");
        
        $noTelp 	= $this->input->post("noTelp");
	$user 		= $this->session->userdata('nama');
        
        
        $faskes 	= $this->input->post("faskes");
        $jnspeserta 	= $this->input->post("jnspeserta");
        $noreg 		= $this->input->post("noreg");
        $poli 		= $this->input->post("poli");
            
        $data = "20419"; // 20419 - 9wXA881141
        $secretKey = "9wXA881141"; //1000 - 7789
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
        $scml ="";
        $scml['request']['t_sep'] = array(
                'noKartu'           => $noKartu,
                'tglSep'            => $tglSep,
                'ppkPelayanan'      => $ppkPelayanan,
                'jnsPelayanan'      => $jnsPelayanan,
                'klsRawat'          => $klsRawat,
                'noMR'              => $noMR,
                'rujukan'           => array(
                    'asalRujukan'   => $asalRujukan,
                    'tglRujukan'    => $tglRujukan,
                    'noRujukan'     => $noRujukan,
                    'ppkRujukan'    => $ppkRujukan,
                    ),
                
                'catatan'           => $catatan,
                'diagAwal'          => $diagAwal,
                'poli'              => array(
                    'tujuan'        => $tujuan,
                    'eksekutif'     => $eksekutif,
                    ),
                
                'cob'              => array(
                    'cob'          => $cob,
                    ),
                'jaminan'          => array(
                    'lakaLantas'   => $lakaLantas,
                    'penjamin'     => $penjamin,
                    'lokasiLaka'   => $lokasiLaka,
                    ),
                'noTelp'           => $noTelp,
                'user'             => $user
            );
        
        #$url = "http://api.bpjs-kesehatan.go.id:8080/devWsLokalRest/SEP/sep";
        #$url = "http://api.bpjs-kesehatan.go.id:8080
        #$url = "http://172.162.121.6:85/WsLokalRest/SEP/sep";
        #$url = "http://api.asterix.co.id/SepWebRest/sep/create/";
        #$url = "http://192.168.2.101:85/WsLokalRest/SEP/sep";
        $url = "http://api.bpjs-kesehatan.go.id:8080/VClaim-rest/SEP/insert";
        $content_type = "application/x-www-form-urlencoded";
        $process = curl_init($url); 
        curl_setopt($process, CURLOPT_HEADER, false); 
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($process, CURLOPT_HTTPHEADER,array("Content-Type: $content_type\r\n" . "X-cons-id: $data\r\n" . "X-Timestamp: $tStamp\r\n" . "X-Signature: $encodedSignature"));
        curl_setopt($process, CURLOPT_POST, false); 
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        $resp = json_encode($scml);
        curl_setopt($process, CURLOPT_POSTFIELDS, $resp); 
        $return = curl_exec($process); 
        curl_close($process);
        
        $response = json_decode($return, true);
        
        $code = $response['metaData']['code'];
        $nosep = $response['response']['sep']['noSep'];
        if($code == '200'){
            $datasep = array(
                'NO_SEP'                =>$nosep,
                'noKartu'               =>$noKartu,
                'tglSep'                =>$tglSep,
                'tglRujukan'            =>$tglRujukan,
                'noRujukan'             =>$noRujukan,
                'ppkRujukan'            =>$ppkRujukan,
                'faskes'                =>$faskes,
                'ppkPelayanan'          =>$ppkPelayanan,
                'jnsPelayanan'          =>$jnsPelayanan,
                'catatan'               =>$catatan,
                'diagAwal'              =>$diagAwal,
                'poliTujuan'            =>$poli,
                'klsRawat'              =>$klsRawat,
                'lakaLantas'            =>$lakaLantas,
                'user'                  =>$user,
                'noMr'                  =>$noMR,
                'id_daftar'             =>$noreg,
                'jnsPeserta'            =>$jnspeserta
            );
            $this->db->insert('t_sep',$datasep);
        }
        echo $return;   
    }
    
    function get_hapussep(){
        $nosep  = $_POST['sep'];
        $user   = $this->session->userdata('nama');
        $data   = "20419";//20419 - 9wXA881141
        $secretKey = "9wXA881141";//1000 - 7789
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
        $scml ="";
        $scml['request']['t_sep'] = array(
                'noSep'           => $nosep,
                'user'            => $user
            );
        #$ip = "http://api.asterix.co.id/SepWebRest/peserta/";
        #$ip = "http://172.162.121.6:85/WsLokalRest/Peserta/peserta/";
        #$ip = "http://172.162.121.6:8082/SepLokalRest/peserta/0001151420883";
        $url = "http://api.bpjs-kesehatan.go.id:8080/VClaim-rest/SEP/Delete";
        $content_type = "application/x-www-form-urlencoded";
        $process = curl_init($url); 
        curl_setopt($process, CURLOPT_HEADER, false); 
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($process, CURLOPT_HTTPHEADER,array("Content-Type: $content_type\r\n" . "X-cons-id: $data\r\n" . "X-Timestamp: $tStamp\r\n" . "X-Signature: $encodedSignature"));
        //curl_setopt($process, CURLOPT_POST, false); 
        curl_setopt($process, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        $resp = json_encode($scml);
        curl_setopt($process, CURLOPT_POSTFIELDS, $resp); 
        $return = curl_exec($process); 
        curl_close($process);
        
        $response = json_decode($return, true);
        
        $code = $response['metaData']['code'];
        $nosep = $response['response'];
        if($code == '200'){
            $this->db->delete('t_sep', array('NO_SEP' => $nosep));
        }
        echo $return;   
    }
    
    function get_updatetgl(){
        $nosep  = $_POST['nosep'];
        $tglplg = $_POST['tgl'];
        $user   = $this->session->userdata('nama');
        $data   = "20419";//20419 - 9wXA881141
        $secretKey = "9wXA881141";//1000 - 7789
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
        $scml ="";
        $scml['request']['t_sep'] = array(
                'noSep'           => $nosep,
                'tglPulang'       => $tglplg,
                'user'            => $user
            );
        #$ip = "http://api.asterix.co.id/SepWebRest/peserta/";
        #$ip = "http://172.162.121.6:85/WsLokalRest/Peserta/peserta/";
        #$ip = "http://172.162.121.6:8082/SepLokalRest/peserta/0001151420883";
        $url = "http://api.bpjs-kesehatan.go.id:8080/VClaim-rest/Sep/updtglplg";
        $content_type = "application/x-www-form-urlencoded";
        $process = curl_init($url); 
        curl_setopt($process, CURLOPT_HEADER, false); 
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($process, CURLOPT_HTTPHEADER,array("Content-Type: $content_type\r\n" . "X-cons-id: $data\r\n" . "X-Timestamp: $tStamp\r\n" . "X-Signature: $encodedSignature"));
        //curl_setopt($process, CURLOPT_POST, false); 
        curl_setopt($process, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        $resp = json_encode($scml);
        curl_setopt($process, CURLOPT_POSTFIELDS, $resp); 
        $return = curl_exec($process); 
        curl_close($process);
        
        $response = json_decode($return, true);
        
        echo $return;   
    }
    
    function get_ajukan(){
        $nokartu  = $_POST['nobpjs'];
        $tglsep   = $_POST['tgl'];
        $layanan  = $_POST['layanan'];
        $keterangan   = $_POST['ket'];
        $user         = $this->session->userdata('nama');
        $data   = "20419";//20419 - 9wXA881141
        $secretKey = "9wXA881141";//1000 - 7789
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
        $scml ="";
        $scml['request']['t_sep'] = array(
                'noKartu'      => $nokartu,
                'tglSep'       => $tglsep,
                'jnsPelayanan' => $layanan,
                'keterangan'   => $keterangan,
                'user'         => $user
            );
        #$ip = "http://api.asterix.co.id/SepWebRest/peserta/";
        #$ip = "http://172.162.121.6:85/WsLokalRest/Peserta/peserta/";
        #$ip = "http://172.162.121.6:8082/SepLokalRest/peserta/0001151420883";
        $url = "http://api.bpjs-kesehatan.go.id:8080/VClaim-rest/Sep/pengajuanSEP";
        $content_type = "application/x-www-form-urlencoded";
        $process = curl_init($url); 
        curl_setopt($process, CURLOPT_HEADER, false); 
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($process, CURLOPT_HTTPHEADER,array("Content-Type: $content_type\r\n" . "X-cons-id: $data\r\n" . "X-Timestamp: $tStamp\r\n" . "X-Signature: $encodedSignature"));
        curl_setopt($process, CURLOPT_POST, false); 
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        $resp = json_encode($scml);
        curl_setopt($process, CURLOPT_POSTFIELDS, $resp); 
        $return = curl_exec($process); 
        curl_close($process);
        
        echo $return;   
    }
    
    function get_setujui(){
        $nokartu  = $_POST['nobpjs'];
        $tglsep   = $_POST['tgl'];
        $layanan  = $_POST['layanan'];
        $keterangan   = $_POST['ket'];
        $user         = $this->session->userdata('nama');
        $data   = "20419";//20419 - 9wXA881141
        $secretKey = "9wXA881141";//1000 - 7789
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
        $scml ="";
        $scml['request']['t_sep'] = array(
                'noKartu'      => $nokartu,
                'tglSep'       => $tglsep,
                'jnsPelayanan' => $layanan,
                'keterangan'   => $keterangan,
                'user'         => $user
            );
        #$ip = "http://api.asterix.co.id/SepWebRest/peserta/";
        #$ip = "http://172.162.121.6:85/WsLokalRest/Peserta/peserta/";
        #$ip = "http://172.162.121.6:8082/SepLokalRest/peserta/0001151420883";
        $url = "http://api.bpjs-kesehatan.go.id:8080/VClaim-rest/Sep/aprovalSEP";
        $content_type = "application/x-www-form-urlencoded";
        $process = curl_init($url); 
        curl_setopt($process, CURLOPT_HEADER, false); 
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($process, CURLOPT_HTTPHEADER,array("Content-Type: $content_type\r\n" . "X-cons-id: $data\r\n" . "X-Timestamp: $tStamp\r\n" . "X-Signature: $encodedSignature"));
        curl_setopt($process, CURLOPT_POST, false); 
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        $resp = json_encode($scml);
        curl_setopt($process, CURLOPT_POSTFIELDS, $resp); 
        $return = curl_exec($process); 
        curl_close($process);
        
        echo $return;   
    }
    
    function get_diagnosa(){
        $diag = $this->uri->segment(3);
        $data = "20419";//20419 - 9wXA881141
        $secretKey = "9wXA881141";//1000 - 7789
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
    	$tgl=date("Y-m-d H:i:s");
        #$ip = "http://api.asterix.co.id/SepWebRest/peserta/";
        #$ip = "http://172.162.121.6:85/WsLokalRest/Peserta/peserta/";
        #$ip = "http://172.162.121.6:8082/SepLokalRest/peserta/0001151420883";
        $url = "http://api.bpjs-kesehatan.go.id:8080/VClaim-rest/referensi/diagnosa/$diag";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array("Accept: application/json\r\n" . "X-cons-id: $data\r\n" . "X-Timestamp: $tStamp\r\n" . "X-Signature: $encodedSignature"));
        //curl_setopt($curl, CURLOPT_GET, true);
        $return = curl_exec($curl);        
        curl_close($curl);
        
        $response = json_decode($return, true);
        $jml = sizeof($response['response']['diagnosa']);
        for($i=0; $i<$jml; $i++){
            $arr['query'] = $diag;
            $arr['suggestions'][] = array(
                'value'    =>$response['response']['diagnosa'][$i]['nama'],
                'code'     =>$response['response']['diagnosa'][$i]['kode']
            );
        }
        echo json_encode($arr);
          
    }
    
    function add_noreg(){
        $nomr     = $this->input->post("nomr");
        $layanan  = $this->input->post("jns_layanan");
        if($layanan == "Rawat Inap"){
            $dataD    = $this->m_daftarpasien->get_ceknoregri($nomr);
        }
        if($layanan == "Rawat Jalan"){
            $dataD    = $this->m_daftarpasien->get_ceknoregrj($nomr);
        }
        $jml   = $dataD->num_rows();
        foreach ($dataD->result() as $value) {
            $data['jml']    = $jml;
            $data['suggestions'][] = array(
                'noreg'    =>$value->id_daftar,
                'tgl'      =>$value->tgl_reg,
                'ruang'    =>$value->grNama
            );
        }
        echo json_encode($data);
    }
    
    function get_cekdpo(){
        $nobpjs  = $this->input->post("nopeserta");
        $cek    = $this->m_daftarpasien->get_cekdpo($nobpjs);
        $dataP  = $cek->row_array();

            $data = array(
                'NOBPJS'    => $dataP['no_kartu'],
                'NAMA'      => $dataP['nama'],
                'KET'       => $dataP['ket']
                );
            echo json_encode($data);
    }
    
    function get_cekdaftar(){
        $nomr       = $this->input->post("noMr");
        $tglreg     = $this->input->post("tglreg");
        $tujuan     = $this->input->post("tujuan");
        $cek    = $this->m_daftarpasien->get_cekdaftar($nomr,$tglreg,$tujuan);

            if($cek->num_rows() > 0){
            $data = array(
                'MESSAGE'   => 'OK'
                );
            }else{
                $data = array(
                'MESSAGE'   => 'NO'
                );
            }  
            echo json_encode($data);
    }
    
    function simpan_prov(){
        $dataprov = array(
            'nama_provinsi'  => $this->input->post("prov")
        );
        $this->db->insert('m_provinsi',$dataprov);
    }
    
    function simpan_kota(){
        $datakota = array(
            'nama_kab_kota'  => $this->input->post("kota"),
            'id_provinsi'    => $this->input->post("prov")
        );
        $this->db->insert('m_kab_kota',$datakota);
    }
    function simpan_kec(){
        $datakec = array(
            'nama_kecamatan' => $this->input->post("kec"),
            'id_kab_kota'    => $this->input->post("kota")
        );
        $this->db->insert('m_kecamatan',$datakec);
    }
    function simpan_desa(){
        $datadesa = array(
            'nama_kelurahan'  => $this->input->post("desa"),
            'id_kecamatan'    => $this->input->post("kec")
        );
        $this->db->insert('m_kelurahan',$datadesa);
    }
       
}