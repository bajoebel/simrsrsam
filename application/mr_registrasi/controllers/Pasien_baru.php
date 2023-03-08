<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class pasien_baru extends CI_Controller {
    public function __construct(){
        parent ::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
        $this->load->model('Smart_model');
        $this->load->helper('http');
    }

    public function index(){      
        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        $this->session->unset_userdata('method');
        $this->session->unset_userdata('keynama');
        $this->session->unset_userdata('keytgllahir');
        $y['index_menu'] = 3;
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_3");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Data Pasien";        
            $x['content'] = $this->load->view('pasien_baru/template_table',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }        
    }
    function getView(){
        $method = ($this->session->userdata('method')) ? $this->session->userdata('method') : "";
        if(empty($method)){
            if(isset($_POST['method'])):
                $method = $this->input->post('method',true);
                $tgl_lahir = setDateEng($this->input->post('keyDob',true));
                $nama = $this->input->post('keyNama',true);    
                $this->session->set_userdata('method',$method);
                $this->session->set_userdata('keynama',$nama);
                $this->session->set_userdata('keytgllahir',$tgl_lahir);
            else:
                $method = "";
                $this->session->unset_userdata('method');
                $this->session->unset_userdata('keynama');
                $this->session->unset_userdata('keytgllahir');
            endif;
        }
        
        
        if(isset($_POST['page'])):
            $offset = $this->input->post('page');
            $this->session->set_userdata('sPage',$offset);
        else:
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;

        $limit = $this->perPage;

        $condition = "";
        if($method == "Inquery"){
            $nama=$this->session->userdata('keynama');
            $tgl_lahir=$this->session->userdata('keytgllahir');
            $condition .= "WHERE nama LIKE '%$nama%' AND tgl_lahir='$tgl_lahir'";
        }else{
            if(isset($_POST['sLike'])){
                $offset = 0;
                $sLike = $this->db->escape_str($this->input->post('sLike',true));
                $condition .= "WHERE nomr LIKE '%$sLike%' OR  nama LIKE '%$sLike%' OR no_ktp LIKE '%$sLike%'";
                $this->session->set_userdata('sLike',$sLike);

            }else{
                if($this->session->userdata('sLike')){
                    $sLike = $this->session->userdata('sLike');
                    $condition .= "WHERE nomr LIKE '%$sLike%' OR nama LIKE '%$sLike%' OR no_ktp LIKE '%$sLike%'";
                }
            }            
        }
        
        $SQL = "SELECT * FROM tbl01_pasien $condition";
        // echo $SQL; exit;
        $SQLROW="SELECT count(idx) as total FROM tbl01_pasien $condition";
        $SQL_Count = $this->db->query("$SQLROW")->row();
        $totalRec = $SQL_Count->total;
        $config['target']      = 'tbody#getdata';
        $config['loadingView'] = '<tr><td colspan=9>Loading... Please wait</td></tr>';
        $config['uri_segment'] = $this->uri_segment;
        $config['base_url']    = base_url().'mr_registrasi.php/pasien_baru/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        // echo "$SQL LIMIT $offset,$limit"; exit;
        $x['SQL'] = $this->db->query("$SQL  ORDER BY idx DESC LIMIT $offset,$limit");
        $this->load->view('pasien_baru/getdata',$x);
    }
    function getNegara(){
        $this->db->where_not_in('idx',4);
        $query = $this->db->get('tbl01_negara');
        $data = array();
        foreach($query->result_array() as $x){
            $item_row['idx'] = $x['idx'];
            $item_row['nama_negara'] = $x['nama_negara'];
            array_push($data,$item_row);
        }
        echo json_encode($data); 
    }
    function getProv(){
        $query = $this->db->get('tbl01_provinsi');
        $data = array();
        foreach($query->result_array() as $x){
            $item_row['idx'] = $x['idx'];
            $item_row['nama_provinsi'] = $x['nama_provinsi'];
            array_push($data,$item_row);
        }
        echo json_encode($data); 
    }
    function getKab(){
        $nama_provinsi = $this->input->post('nama_provinsi',true);
        $this->db->where("SUBSTR(kode,1,2)",$nama_provinsi);
        $this->db->where("LENGTH(kode)",5);
        $data = $this->db->get('tbl01_wilayah')->result();
        
        echo json_encode($data); 
    }
    function getKec(){
        $nama_kab_kota = $this->input->post('nama_kab_kota',true);
        $this->db->where('SUBSTR(kode,1,5)',$nama_kab_kota);
        $this->db->where("LENGTH(kode)",8);
        $query = $this->db->get('tbl01_wilayah');
        $data = $query->result_array();
        echo json_encode($data); 
    }
    function getKel(){
        $nama_kecamatan = $this->input->post('nama_kecamatan',true);
        $this->db->where('SUBSTR(kode,1,8)',$nama_kecamatan);
        $this->db->where("LENGTH(kode)",13);
        $query = $this->db->get('tbl01_wilayah');
        $data = $query->result_array();
        echo json_encode($data); 
    }
    public function tambah(){      
        $ses_state = $this->users_model->cek_session_id();
        $idx = $this->uri->segment(3);
        if($ses_state){
            
            $this->db->where('idx',$idx);
            $cekNum = $this->db->get('tbl01_pasien');
            if($cekNum->num_rows() > 0){
                $y = $cekNum->row_array();
                $y['contentTitle'] = "Update Data Pasien";  
                $this->db->where("SUBSTR(kode,1,2)",$y['id_provinsi']);
                $this->db->where("LENGTH(kode)",5);
                $y['kab'] = $this->db->get('tbl01_wilayah')->result();
                // print_r($y['kab']);
                $this->db->where('SUBSTR(kode,1,5)',$y['id_kab_kota']);
                $this->db->where("LENGTH(kode)",8);
                $query = $this->db->get('tbl01_wilayah');
                $y['kec'] = $query->result();

                $this->db->where('SUBSTR(kode,1,8)',$y["id_kecamatan"]);
                $this->db->where("LENGTH(kode)",13);
                $query = $this->db->get('tbl01_wilayah');
                $y['kel'] = $query->result();

                $this->db->where("SUBSTR(kode,1,2)",$y['id_provinsi_domisili']);
                $this->db->where("LENGTH(kode)",5);
                $y['kabdom'] = $this->db->get('tbl01_wilayah')->result();

                $this->db->where('SUBSTR(kode,1,5)',$y['id_kab_kota_domisili']);
                $this->db->where("LENGTH(kode)",8);
                $query = $this->db->get('tbl01_wilayah');
                $y['kecdom'] = $query->result();

                $this->db->where('SUBSTR(kode,1,8)',$y["id_kecamatan_domisili"]);
                $this->db->where("LENGTH(kode)",13);
                $query = $this->db->get('tbl01_wilayah');
                $y['keldom'] = $query->result();
                $y['index_menu'] = 4;
                $y['jns_layanan'] = $this->input->get('jns');
                $y['booking']=array();
                $y['kodebooking']="";
                $y['bookingjkn']="";
            }else{
                $kode=$this->input->get('kodebooking');
                $bookingjkn=$this->input->get('bookingjkn');
                
                // $this->onlineDB = $this->load->database('online', true);
                if(!empty($kode)) {
                    $url=WSMYRSAM."simrs/booking/kode/".$kode."/baru";
                    $res=httprequest("",$url,"","GET");
                    $arr=json_decode($res);
                    // print_r($arr);exit;
                    $y=(array) $arr->response;
                    $y['bookingjkn']="";
                }else{
                    if(!empty($bookingjkn)){
                        $data=array(
                            "kodebooking"=>$bookingjkn
                        );
                        $res=httprequest($data, ONLINE_CALL_BACK."jkn/rsud/pasienbaru",$token="",$method="POST");
                        // echo $res;exit;
                        $arr=json_decode($res);
                        if($arr->metadata->code==200){
                            $sekarang=strtotime(date('Y-m-d H:i:s'))*1000;
                            $req=array(
                                'kodebooking'=>$bookingjkn,
                                'taskid'=>1,
                                'waktu'=>$sekarang
                            );
                            // print_r($req);exit;
                            $response=jknrequest("antrean/updatewaktu",json_encode($req),"POST");
                            // echo $response; exit;
                            $y['jkn'] = $arr->response;
                            $y['idx'] = "";
                            $y['nomr'] = "";
                            $y['bookingjkn'] = $bookingjkn;
                            $y['nomr_lama'] = "";
                            $y['no_ktp'] = $arr->response->nik;
                            $y['nama'] = $arr->response->nama;
                            $y['tempat_lahir'] = "";
                            $y['tgl_lahir'] = $arr->response->tanggallahir;
                            $y['jns_kelamin'] = ($arr->response->jeniskelamin=="L"?1:2);
                            $y['pekerjaan'] = "";
                            $y['agama'] = "";
                            $y['suku'] = "";
                            $y['bahasa'] = "";
                            $y['no_telpon'] = "";
                            $y['kewarganegaraan'] = "";
                            $y['nama_negara'] = "";
                            $y['nama_provinsi'] = "";
                            $y['nama_kab_kota'] = "";
                            $y['nama_kecamatan'] = "";
                            $y['nama_kelurahan'] = "";
                            $y['alamat'] = $arr->response->alamat;
                            $y['status_kawin'] = "";
                            $y['penanggung_jawab'] = "";
                            $y['no_penanggung_jawab'] = "";
                            $y['no_bpjs'] = $arr->response->nomorkartu;
                            $y['rt'] = $arr->response->rt;
                            $y['rw'] = $arr->response->rw;
                            $y['status_kawin'] = "";
                            $y['id_jenis_peserta'] = '';
                            $y['jenis_peserta'] = '';
                            $y['kodeppk'] = '';
                            $y['namappk'] = '';
                            $y['id_provinsi'] = "";
                            $y['id_kab_kota'] = '';
                            $y['id_kecamatan'] = '';
                            $y['id_kelurahan'] = '';
                            $y['id_tk_pddkn'] = '';
                            $y['id_etnis'] = '';
                            $y['id_bahasa'] = '';
                            $y['hambatan_bahasa'] = '';
                            $y['umur_pj'] = '';
                            $y['pekerjaan_pj'] = '';
                            $y['alamat_pj'] = '';
                            $y['hub_keluarga'] = '';
                            $y['tujuan_daftar'] = '';
                            $y['kodebooking'] = '';
                            $y['jns_layanan'] = $this->input->get('jns');
                        }
                        // header('Content-Type: application/json');
                        // echo $res; exit;
                    }
                    
                }
                if(empty($y)){
                    $y['idx'] = "";
                    $y['bookingjkn'] ="";
                    $y['nomr'] = "";
                    $y['nomr_lama'] = "";
                    $y['no_ktp'] = "";
                    $y['nama'] = "";
                    $y['tempat_lahir'] = "";
                    $y['tgl_lahir'] = "";
                    $y['jns_kelamin'] = "1";
                    $y['pekerjaan'] = "";
                    $y['agama'] = "";
                    $y['suku'] = "";
                    $y['bahasa'] = "";
                    $y['no_telpon'] = "";
                    $y['kewarganegaraan'] = "";
                    $y['nama_negara'] = "";
                    $y['nama_provinsi'] = "";
                    $y['nama_kab_kota'] = "";
                    $y['nama_kecamatan'] = "";
                    $y['nama_kelurahan'] = "";
                    $y['alamat'] = "";
                    $y['status_kawin'] = "";
                    $y['penanggung_jawab'] = "";
                    $y['no_penanggung_jawab'] = "";
                    $y['no_bpjs'] = "";
                    $y['status_kawin'] = "";
                    $y['id_jenis_peserta'] = '';
                    $y['jenis_peserta'] = '';
                    $y['kodeppk'] = '';
                    $y['namappk'] = '';
                    $y['id_provinsi'] = "";
                    $y['id_kab_kota'] = '';
                    $y['id_kecamatan'] = '';
                    $y['id_kelurahan'] = '';
                    $y['id_tk_pddkn'] = '';
                    $y['id_etnis'] = '';
                    $y['id_bahasa'] = '';
                    $y['hambatan_bahasa'] = '';
                    $y['umur_pj'] = '';
                    $y['pekerjaan_pj'] = '';
                    $y['alamat_pj'] = '';
                    $y['hub_keluarga'] = '';
                    $y['tujuan_daftar'] = '';
                    $y['kodebooking'] = '';
                    $y['jns_layanan'] = $this->input->get('jns');
                }else{
                    $y['idx'] = "";
                    $y['nomr'] = "";
                    $y['id_jenis_peserta'] = "";
                    $y['jenis_peserta'] = "";
                    $y['kodeppk'] = "";
                    $y['namappk'] = "";
                    $y['kodebooking'] = $kode;
                    
                    // $y['jns_layanan'] = "rj";
                    $y['jns_layanan'] = $this->input->get('jns');
                    $y['id_pekerjaan'] = 5;
                    $y['kewarganegaraan'] = "WNI";
                    $this->db->where("SUBSTR(kode,1,2)",$y['id_provinsi']);
                    $this->db->where("LENGTH(kode)",5);
                    $y['kab'] = $this->db->get('tbl01_wilayah')->result();
                    // print_r($y['kab']);
                    $this->db->where('SUBSTR(kode,1,5)',$y['id_kab_kota']);
                    $this->db->where("LENGTH(kode)",8);
                    $query = $this->db->get('tbl01_wilayah');
                    $y['kec'] = $query->result();

                    $this->db->where('SUBSTR(kode,1,8)',$y["id_kecamatan"]);
                    $this->db->where("LENGTH(kode)",13);
                    $query = $this->db->get('tbl01_wilayah');
                    $y['kel'] = $query->result();
                    // print_r($y);exit;
                }
                $y['contentTitle'] = "Entry Pasien Baru";  
                

            }
            //echo $y["agama"];exit;
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_3");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            
            $y['getAgama'] = $this->db->get('tbl01_agama');   
            $this->db->where_not_in('idx',360);
            $y['getNegara'] = $this->db->get('tbl01_negara');   
            $y['getProvinsi'] = $this->db->where("LENGTH(kode)",2)->get('tbl01_wilayah');
            $y['pendidikan'] = $this->db->get('tbl01_tk_pddkn')->result();
            $y['getSuku'] = $this->db->get('tbl01_suku');
            $y['getBahasa'] = $this->db->get('tbl01_bahasa');
            $y['getPekerjaan'] = $this->db->get('tbl01_pekerjaan');
            $y['getStatus'] = $this->db->get('tbl01_status_kawin');
            
            $x['content'] = $this->load->view('pasien_baru/template_entry',$y,true);
            $x['libjs']=array(
                'js/pasienbaru.js'
            );
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }        
    }
    function cekantrian($param,$value){
        $ses_state = $this->users_model->cek_session_id();
        $idx = $this->uri->segment(3);
        if($ses_state){
            $antrian=$this->db->where($param,$value)->where('status_kirim',1)->where('tanggalperiksa',date('Y-m-d'))->get("jkn_antrean")->row();
            // print_r($antrian); exit;
            if(!empty($antrian)){
                $sekarang=strtotime(date('Y-m-d H:i:s'))*1000;
                $req=array(
                    'kodebooking'=>$antrian->kodebooking,
                    'taskid'=>2,
                    'waktu'=>$sekarang
                );
                // print_r($req);exit;
                $response=jknrequest("antrean/updatewaktu",json_encode($req),"POST");
            }else{
                $response=json_encode(array(
                    'metadata'=>array(
                        'code'=>201,
                        'message'=>"Antrian yang dibooking tidak ditemukan"
                    )
                ));
            }
        }else{
            $response=json_encode(array(
                'metadata'=>array(
                    'code'=>201,
                    'message'=>"Session Expired"
                )
            ));
        }
        header('Content-Type: application/json');
        echo $response;
    }
    function simpan(){
        $ses_state = $this->users_model->cek_session_id();
        $this->load->model('patch_model');
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['idx']) &&
                    isset($_POST['nomr']) &&
                    isset($_POST['no_ktp']) &&
                    isset($_POST['nama']) &&
                    isset($_POST['tempat_lahir']) &&
                    isset($_POST['tgl_lahir']) &&
                    isset($_POST['jns_kelamin']) &&
                    isset($_POST['pekerjaan']) &&
                    isset($_POST['agama']) &&
                    isset($_POST['no_telpon']) &&
                    isset($_POST['kewarganegaraan']) &&
                    isset($_POST['nama_negara']) &&
                    isset($_POST['nama_provinsi']) &&
                    isset($_POST['nama_kab_kota']) &&
                    isset($_POST['nama_kecamatan']) &&
                    isset($_POST['nama_kelurahan']) &&
                    isset($_POST['alamat']) &&
                    isset($_POST['penanggung_jawab']) &&
                    isset($_POST['no_penanggung_jawab']) &&
                    isset($_POST['no_bpjs'])
                ){
                    $this->load->library('form_validation');
                    $kwn=$this->input->post('kewarganegaraan');
                    if($kwn=="WNI") $wilayah='required'; else $wilayah='trim';
                    $config = array(
                        
                        array(
                            'field' => 'nama',
                            'label' => 'Nama Pasien',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'tempat_lahir',
                            'label' => 'Tempat Lahir',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'tgl_lahir',
                            'label' => 'Tanggal Lahir',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'no_hp',
                            'label' => 'No HP',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'nama_ibu_kandung',
                            'label' => 'Nama Ibu Kandung',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'kewarganegaraan',
                            'label' => 'Kewarga negaraan',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'id_provinsi',
                            'label' => 'Provinsi',
                            'rules' => $wilayah
                        ),
                        array(
                            'field' => 'id_kab_kota',
                            'label' => 'Kab / Kota',
                            'rules' => $wilayah
                        ),
                        array(
                            'field' => 'id_kecamatan',
                            'label' => 'Kecamatan',
                            'rules' => $wilayah
                        ),
                        array(
                            'field' => 'id_kelurahan',
                            'label' => 'Kelurahan',
                            'rules' => $wilayah
                        ),
                        array(
                            'field' => 'alamat',
                            'label' => 'Alamat',
                            'rules' => $wilayah
                        ),
                        array(
                            'field' => 'rt',
                            'label' => 'RT',
                            'rules' => $wilayah
                        ),
                        array(
                            'field' => 'rw',
                            'label' => 'RW',
                            'rules' => $wilayah
                        ),
                        array(
                            'field' => 'kodepos',
                            'label' => 'Kode Pos',
                            'rules' => $wilayah
                        ),
                        array(
                            'field' => 'id_provinsi_domisili',
                            'label' => 'Provinsi Domisili',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'id_kab_kota_domisili',
                            'label' => 'Kab / Kota Domisili',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'id_kecamatan_domisili',
                            'label' => 'Kecamatan Domisili',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'id_kelurahan_domisili',
                            'label' => 'Kelurahan Domisili',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'alamat_domisili',
                            'label' => 'Alamat Domisili',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'rt_domisili',
                            'label' => 'RT Domisili',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'rw_domisili',
                            'label' => 'RW Domisili',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'kodepos_domisili',
                            'label' => 'Kode Pos Domisili',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'penanggung_jawab',
                            'label' => 'Penanggung Jawab ',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'umur_pj',
                            'label' => 'Umur Penanggung jawab Jawab',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'pekerjaan_pj',
                            'label' => 'Pekerjaan Penanggung Jawab',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'alamat_pj',
                            'label' => 'Alamat Penanggung Jawab',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'no_penanggung_jawab',
                            'label' => 'Nomor Penanggung Jawab',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'hub_keluarga',
                            'label' => 'hubungan keluarga',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'jns_kelamin',
                            'label' => 'Jenis Kelamin',
                            'rules' => 'required'
                        ),
                    );
                    $this->form_validation->set_rules($config);
                    $this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
                    if ($this->form_validation->run() == FALSE)
                    {
                        $response['code'] = 203;
                        $response['message'] = "Ops. Data Belum Lengkap.";
                        $response['error']=array(
                            'nama'=>form_error('nama'),
                            'tempat_lahir'=>form_error('tempat_lahir'),
                            'tgl_lahir'=>form_error('tgl_lahir'),
                            'no_hp'=>form_error('no_hp'),
                            'nama_ibu_kandung'=>form_error('nama_ibu_kandung'),
                            'kewarganegaraan'=>form_error('kewarganegaraan'),
                            'nama_negara'=>form_error('nama_negara'),
                            'nama_provinsi'=>form_error('id_provinsi'),
                            'nama_kab_kota'=>form_error('id_kab_kota'),
                            'nama_kecamatan'=>form_error('id_kecamatan'),
                            'nama_kelurahan'=>form_error('id_kelurahan'),
                            'alamat'=>form_error('alamat'),
                            'rt'=>form_error('rt'),
                            'rw'=>form_error('rw'),
                            'kodepos'=>form_error('kodepos'),
                            'nama_provinsi_domisili'=>form_error('id_provinsi_domisili'),
                            'nama_kab_kota_domisili'=>form_error('id_kab_kota_domisili'),
                            'nama_kecamatan_domisili'=>form_error('id_kecamatan_domisili'),
                            'nama_kelurahan_domisili'=>form_error('id_kelurahan_domisili'),
                            'alamat_domisili'=>form_error('alamat_domisili'),
                            'rt_domisili'=>form_error('rt_domisili'),
                            'rw_domisili'=>form_error('rw_domisili'),
                            'kodepos_domisili'=>form_error('kodepos_domisili'), 
                            'penanggung_jawab'=>form_error('penanggung_jawab'), 
                            'umur_pj'=>form_error('umur_pj'), 
                            'pekerjaan_pj'=>form_error('pekerjaan_pj'), 
                            'alamat_pj'=>form_error('alamat_pj'),  
                            'no_penanggung_jawab'=>form_error('no_penanggung_jawab'),  
                            'jns_kelamin'=>form_error('jns_kelamin'),  
                        );
                    }else{
                        $hambatan=$this->input->post('hambatan_bahasa',TRUE);
                        if($hambatan!=1) $hambatan=2;
                        $params['idx'] = trim($this->input->post('idx',TRUE));
                        $params['no_ktp'] = trim($this->input->post('no_ktp',TRUE));
                        $params['nama'] = trim($this->input->post('nama',TRUE));
                        $params['tempat_lahir'] = trim($this->input->post('tempat_lahir',TRUE));
                        $params['tgl_lahir'] = setDateEng($this->input->post('tgl_lahir',TRUE));
                        $params['jns_kelamin'] = trim($this->input->post('jns_kelamin',TRUE));
                        $whereagama=array('id_agama',$this->input->post('id_agama',TRUE));
                        $params['id_agama_lama']=getField('idlama',$whereagama,'tbl01_agama');
                        $params['id_agama'] = trim($this->input->post('id_agama',TRUE));
                        $params['agama'] = trim($this->input->post('agama',TRUE));
                        $params['id_tk_pddkn'] = trim($this->input->post('id_tk_pddkn',TRUE));
                        $params['pendidikan'] = trim($this->input->post('pendidikan',TRUE));
                        
                        $params['id_pekerjaan'] = trim($this->input->post('id_pekerjaan',TRUE));
                        
                        $params['pekerjaan'] = trim($this->input->post('pekerjaan',TRUE));
                        $params['id_status_kawin'] = trim($this->input->post('id_status_kawin',TRUE));
                        $params['status_kawin'] = trim($this->input->post('status_kawin',TRUE));
                        $params['id_etnis'] = trim($this->input->post('id_etnis',TRUE));
                        $params['suku'] = trim($this->input->post('suku',TRUE));
                        $params['id_bahasa'] = trim($this->input->post('id_bahasa',TRUE));
                        $params['bahasa'] = trim($this->input->post('bahasa',TRUE));
                        $params['hambatan_bahasa'] = $hambatan;
                        $params['no_telpon'] = trim($this->input->post('no_telpon',TRUE));
                        $params['no_hp'] = trim($this->input->post('no_hp',TRUE));
                        $params['nama_ibu_kandung'] = trim($this->input->post('nama_ibu_kandung',TRUE));
                        $params['kewarganegaraan'] = trim($this->input->post('kewarganegaraan',TRUE));
                        $nama_negara = trim($this->input->post('nama_negara',TRUE));
                        $params['id_negara_lama'] = getField('kodelama',array('idx'=>trim($this->input->post('id_negara',TRUE))),'tbl01_negara') ;
                        $params['id_negara'] = trim($this->input->post('id_negara',TRUE));
                        $params['nama_negara'] = ($nama_negara == "") ? "Indonesia" : $nama_negara;
                        
                        $params['id_provinsi'] = trim($this->input->post('id_provinsi',TRUE));
                        $params['id_provinsi_lama'] = getField('id_provinsi',array('id_provinsi_kemendagri'=>$params["id_provinsi"]),'tbl01_provinsi') ;
                        $params['nama_provinsi'] = trim($this->input->post('nama_provinsi',TRUE));
                        $params['id_kab_kota'] = trim($this->input->post('id_kab_kota',TRUE));
                        $params['id_kab_kota_lama'] = getField('id_kab_kota',array('id_kab_kota_kemendagri'=>$params["id_kab_kota"]),'tbl01_kab_kota') ;
                        $params['nama_kab_kota'] = trim($this->input->post('nama_kab_kota',TRUE));
                        if($params['id_kab_kota']=='13.75') $params['dalam_kota']=1; else $params['dalam_kota']=0;
                        
                        $params['id_kecamatan'] = trim($this->input->post('id_kecamatan',TRUE));
                        $params['id_kecamatan_lama'] = getField('id_kecamatan',array('id_kecamatan_kemendagri'=>$params["id_kecamatan"]),'tbl01_kecamatan') ;
                        $params['nama_kecamatan'] = trim($this->input->post('nama_kecamatan',TRUE));
                        $params['id_kelurahan'] = trim($this->input->post('id_kelurahan',TRUE));
                        $params['id_kelurahan_lama'] = getField('id_kelurahan',array('id_kelurahan_kemendagri'=>$params["id_kelurahan"]),'tbl01_kelurahan') ;
                        $params['nama_kelurahan'] = trim($this->input->post('nama_kelurahan',TRUE));
                        $params['alamat'] = trim($this->input->post('alamat',TRUE));
                        $params['rt'] = trim($this->input->post('rt',TRUE));
                        $params['rw'] = trim($this->input->post('rw',TRUE));
                        $params['kodepos'] = trim($this->input->post('kodepos',TRUE));
                        $params['id_provinsi_domisili'] = trim($this->input->post('id_provinsi_domisili',TRUE));
                        $params['nama_provinsi_domisili'] = trim($this->input->post('nama_provinsi_domisili',TRUE));
                        $params['id_kab_kota_domisili'] = trim($this->input->post('id_kab_kota_domisili',TRUE));
                        $params['nama_kab_kota_domisili'] = trim($this->input->post('nama_kab_kota_domisili',TRUE));
                        $params['id_kecamatan_domisili'] = trim($this->input->post('id_kecamatan_domisili',TRUE));
                        $params['nama_kecamatan_domisili'] = trim($this->input->post('nama_kecamatan_domisili',TRUE));
                        $params['id_kelurahan_domisili'] = trim($this->input->post('id_kelurahan_domisili',TRUE));
                        $params['nama_kelurahan_domisili'] = trim($this->input->post('nama_kelurahan_domisili',TRUE));
                        $params['alamat_domisili'] = trim($this->input->post('alamat_domisili',TRUE));
                        $params['rt_domisili'] = trim($this->input->post('rt_domisili',TRUE));
                        $params['rw_domisili'] = trim($this->input->post('rw_domisili',TRUE));
                        $params['kodepos_domisili'] = trim($this->input->post('kodepos_domisili',TRUE));
                        $params['penanggung_jawab'] = trim($this->input->post('penanggung_jawab',TRUE));
                        $params['no_penanggung_jawab'] = trim($this->input->post('no_penanggung_jawab',TRUE));
                        $params['umur_pj'] = trim($this->input->post('umur_pj',TRUE));
                        $params['pekerjaan_pj'] = trim($this->input->post('pekerjaan_pj',TRUE));
                        $params['alamat_pj'] = trim($this->input->post('alamat_pj',TRUE));
                        $params['no_penanggung_jawab'] = trim($this->input->post('no_penanggung_jawab',TRUE));
                        $params['hub_keluarga'] = trim($this->input->post('hub_keluarga',TRUE));
                        $params['no_bpjs'] = trim($this->input->post('no_bpjs',TRUE));
                        $params['id_jenis_peserta'] = trim($this->input->post('id_jenis_peserta',TRUE));
                        $params['jenis_peserta'] = trim($this->input->post('jenis_peserta',TRUE));
                        $params['kodeppk'] = trim($this->input->post('kodeppk',TRUE));
                        $params['namappk'] = trim($this->input->post('namappk',TRUE));
                        $params['erm'] = trim($this->input->post('erm',TRUE));
                        $params['status_lengkap']=1;
                        $params['user_created'] = $this->session->userdata('get_uid');
                        $params['session_id'] = getSessionID();
                        if($_POST['idx'] == ""){
                            // Insert Pasien Baru
                            // Validasi nama dan tgl_lahir 
                            $skip=$this->input->post('skip');
                            if($skip==0) $validasi=$this->patch_model->validasiPasien($params['nama'],$params['tgl_lahir']);
                            else $validasi=array();
                            if(empty($validasi)){
                                $params['nomr'] = $this->patch_model->get_nomr(); 
                                $cekCommand = $this->db->insert('tbl01_pasien',$params);
                                
                                if($cekCommand){
                                    $this->db->from('tbl01_pasien');
                                    $this->db->where('session_id', getSessionID());
                                    $this->db->order_by('idx', 'desc');
                                    $this->db->limit(1);
                                    $cekQuery = $this->db->get(); 
                                    if($cekQuery->num_rows() > 0){
                                        // Insert Ke database pendaftaran online
                                        // $this->onlineDB = $this->load->database('online', true);
                                        
                                        // $cek=$this->onlineDB->where('nomr',$params['nomr'])->get('m_pasien')->row();
                                        if(empty($cek)){
                                            $data = array(
                                                'nomr' => $params['nomr'],
                                                'nama' => $params['nama'],
                                                'tgl_lahir' => $params['tgl_lahir'],
                                                'alamat' => $params['alamat']
                                            );
                                            $url=WSMYRSAM."simrs/pasien";
                                            $res=httprequest($data,$url,"","POST");
                                            // $this->onlineDB->insert('m_pasien', $data);
                                        }
                                        
                                        $kode = $this->input->post('kodebooking');
                                        if(!empty($kode)){
                                            $data = array(
                                                'kode_booking' => $kode,
                                                'jnspasien'=>'baru',
                                                'data'=>array(
                                                    'verifikasi' => '1'
                                                )
                                            );
                                            $url=WSMYRSAM."simrs/booking";
                                            $res=httprequest($data,$url,"","PUT");
                                            // $this->onlineDB->where('kode_booking', $kode);
                                            // $update = $this->onlineDB->update('m_pasien_baru', $data);
                                        }
                                        $bookingjkn=$this->input->post('bookingjkn');
                                        if(!empty($bookingjkn)){
                                            $sekarang=strtotime(date('Y-m-d H:i:s'))*1000;
                                            $req=array(
                                                'kodebooking'=>$bookingjkn,
                                                'taskid'=>2,
                                                'waktu'=>$sekarang
                                            );
                                            // print_r($req);exit;
                                            $res=jknrequest("antrean/updatewaktu",json_encode($req),"POST");
                                        }
                                        
                                        $resPasien = $cekQuery->row_array();
                                        $response['code'] = 200;
                                        $response['message'] = "Simpan data sukses";
                                        $response['nomr'] = $resPasien['nomr']; 
                                        $response['bookingjkn'] = $bookingjkn; 
                                    }else{
                                        $response['code'] = 202;
                                        $response['message'] = "Simpan data sukses namun cookies telah dihapus. Silahkan cari dan pilih pasien";
                                        $response['nomr'] = null;                                            
                                    }
                                }else{
                                    $response['code'] = 501;
                                    $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";                                            
                                }
                            }else{
                                $response['code'] = 204;
                                $response['message'] = "Pasien dengan nama dan tgl lahir ini sudah ada";
                                $response['metod']= "POST";
                                $response['response']= $validasi;
                            }
                            
                        }else{
                            if($_POST['nomr'] == ''){
                                $nomr=$this->patch_model->get_nomr();
                                //$nomr = getNoMrBaru();
                            }else{
                                $nomr = $this->input->post('nomr',TRUE);
                            }
    
                            $params['nomr'] = $nomr;
                            $params['status_lengkap'] = 1;
                            // update Pasien BAru
                            $this->db->where('idx',  $this->input->post('idx',TRUE));
                            $cekCommand = $this->db->update('tbl01_pasien',$params); 
                            
                            if($cekCommand){
                                
                                $updateregistrasi=array(
                                    'no_ktp'=>$params['no_ktp'],
                                    'nama_pasien'=>$params['nama'],
                                    'tempat_lahir'=>$params['tempat_lahir'],
                                    'tgl_lahir'=>$params['tgl_lahir'],
                                    'jns_kelamin'=>$params['jns_kelamin'],
                                );
                                $this->db->where('nomr',$params['nomr']);
                                $this->db->update('tbl02_pendaftaran',$updateregistrasi);
                                $response['code'] = 201;
                                $response['message'] = "Update data sukses.";     
                                $response['nomr'] = $nomr;                                            
                            }else{
                                $response['code'] = 501;
                                $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                            }
                        }
                    }
                    
                }else{
                    $response['code'] = 401;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                    $response['metod']= "POST";
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

    function nomr(){
        $this->load->model('patch_model');
        echo $this->patch_model->get_nomr();
    }

    function lihatDetail(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $z = setNav("nav_3");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $x['header'] = $this->load->view('template/header','',true);

                  

            $nomr = $this->uri->segment(3);
            $this->db->select('idx,nomr,no_ktp,nama,tempat_lahir,tgl_lahir,
            jns_kelamin,pekerjaan,agama, suku,bahasa,no_telpon,kewarganegaraan,nama_negara,nama_provinsi,nama_kecamatan,nama_kab_kota,
            nama_kelurahan,alamat,penanggung_jawab,no_penanggung_jawab,no_bpjs');
            $this->db->where('nomr',$nomr);
            $cekNum = $this->db->get('tbl01_pasien');
            if($cekNum->num_rows() > 0){
                $y = $cekNum->row_array();
                $y['tgl_lahir'] = setDateInd($y['tgl_lahir']);
                $this->db->select('id_daftar,reg_unit,jns_layanan,nama_ruang,tgl_masuk,id_cara_bayar,cara_bayar');
                $this->db->from('tbl02_pendaftaran');
                $this->db->where('nomr',$nomr);
                $this->db->order_by('idx','desc');
                $this->db->limit('10');
                $y['getHistory'] = $this->db->get();
                $y['contentTitle'] = "Detail Pasien";  
                $x['content'] = $this->load->view('pasien_baru/template_detail',$y,true);
                $this->load->view('template/theme',$x);
            }else{
                echo "<script>alert('Ops. data pasien tidak ditemukan.');
                window.history.back();
                </script>";
            }
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        } 
    }
    function history(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_3");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "History Berobat Pasien";

            $nomr = $this->uri->segment(3);
            $this->db->where('nomr',$nomr);
            $cekNum = $this->db->get('tbl01_pasien');
            if($cekNum->num_rows() > 0){
                $resArr = $cekNum->row_array();
                $y['idx'] = $resArr['idx'];
                $y['nomr'] = $resArr['nomr'];
                $y['no_ktp'] = $resArr['no_ktp'];
                $y['nama'] = $resArr['nama'];
                $y['tempat_lahir'] = $resArr['tempat_lahir'];
                $y['tgl_lahir'] = setDateInd($resArr['tgl_lahir']);
                $y['jns_kelamin'] = $resArr['jns_kelamin'];
                $y['pekerjaan'] = $resArr['pekerjaan'];
                $y['agama'] = $resArr['agama'];
                $y['suku'] = $resArr['suku'];
                $y['bahasa'] = $resArr['bahasa'];
                $y['no_telpon'] = $resArr['no_telpon'];
                $y['kewarganegaraan'] = $resArr['kewarganegaraan'];
                $y['nama_negara'] = $resArr['nama_negara'];
                $y['nama_provinsi'] = $resArr['nama_provinsi'];
                $y['nama_kab_kota'] = $resArr['nama_kab_kota'];
                $y['nama_kecamatan'] = $resArr['nama_kecamatan'];
                $y['nama_kelurahan'] = $resArr['nama_kelurahan'];                
                $y['alamat'] = $resArr['alamat'];
                $y['penanggung_jawab'] = $resArr['penanggung_jawab'];
                $y['no_penanggung_jawab'] = $resArr['no_penanggung_jawab'];
                $y['no_bpjs'] = $resArr['no_bpjs'];
    
                $this->db->from('tbl02_pendaftaran');
                $this->db->where('nomr',$nomr);
                $this->db->order_by('idx','desc');
                $y['getHistory'] = $this->db->get();

                $x['content'] = $this->load->view('pasien_baru/template_history',$y,true);
                $this->load->view('template/theme',$x);                
            }else{
                echo "<script>alert('Ops. data pasien tidak ditemukan.');
                window.history.back();
                </script>";
            }
        }else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        } 
    }
    function cetakKartu(){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            if(isset($_GET['kode'])){
                $kode = $_GET['kode'];
                $this->db->select('nomr,nama,tgl_lahir,alamat,nama_kab_kota');
                $this->db->from('tbl01_pasien');
                $this->db->where('nomr',$kode);
                $cekQuery = $this->db->get();
                if($cekQuery->num_rows() > 0){
                    $resData = $cekQuery->row_array();
                    $x['nomr'] = $resData['nomr'];
                    $x['nama'] = $resData['nama'];
                    $x['tgl_lahir'] = $resData['tgl_lahir'];
                    $x['alamat'] = $resData['alamat'];
                    $x['nama_kab_kota'] = $resData['nama_kab_kota'];
                    $this->load->view('cetak/v_kartupasien',$x);
                }else{
                    echo "<script>alert('Ops. Data pasien tidak ditemukan. Silahkan coba kembali.');
                    window.close();
                    </script>";                
                }
            }else{
                echo "<script>alert('Ops. Variable tidak ditemukan. Silahkan coba kembali.');
                window.close();
                </script>";                
            }
        }else{
            echo "<script>alert('Ops. Request method tidak diizinkan. Silahkan coba kembali.');
            window.close();
            </script>";
        }
    }
    function cetakStiker(){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            if(isset($_GET['kode'])){
                $kode = $_GET['kode'];
                $this->db->select('nomr,nama,tgl_lahir,jns_kelamin');
                $this->db->from('tbl01_pasien');
                $this->db->join('tbl01_kab_kota','tbl01_pasien.nama_kab_kota=tbl01_kab_kota.idx','left');
                $this->db->where('nomr',$kode);
                $cekQuery = $this->db->get();
                if($cekQuery->num_rows() > 0){
                    $resData = $cekQuery->row_array();
                    $x['nomr'] = $resData['nomr'];
                    $x['nama'] = $resData['nama'];
                    $x['tgl_lahir'] = $resData['tgl_lahir'];
                    $x['jns_kelamin'] = $resData['jns_kelamin'];
                    $this->load->view('cetak/v_stiker',$x);
                }else{
                    echo "<script>alert('Ops. Data pasien tidak ditemukan. Silahkan coba kembali.');
                    window.close();
                    </script>";                
                }
            }else{
                echo "<script>alert('Ops. Variable tidak ditemukan. Silahkan coba kembali.');
                window.close();
                </script>";                
            }
        }else{
            echo "<script>alert('Ops. Request method tidak diizinkan. Silahkan coba kembali.');
            window.close();
            </script>";
        }
    }
    
    function getNoMr(){
        //echo getNoMrBaru();
        $this->load->model('patch_model');
        echo $this->patch_model->get_nomr();
    }
}

