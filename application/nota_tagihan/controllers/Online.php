<?php 
class Online extends CI_Controller{
    function __construct(){
       parent::__construct();
        /*$this->load->model('m_daftarpasien');
        $this->load->model('m_cetak');
        $this->load->model('pendaftaran_model');*/
        $this->load->model('users_model');
        $this->load->model('patch_model');
        $this->load->model('pendaftaran_model');
    }
    
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){      
            // echo SMART_STATUS; exit; 
            if(SMART_STATUS==1) {
                header('location:'.base_url()."mr_registrasi.php/smart");
                exit;
            }
            $y['index_menu'] = 5; 
            $x['header'] = $this->load->view('template/header','',true);
            $this->db->where('grid',1);
            $y["poly"]=$this->db->get('tbl01_ruang')->result();
            $z = setNav("nav_7");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);
            $y['contentTitle'] = "Pendaftaran Pasien Online";
            $x['content'] = $this->load->view('registrasi/v_pendaftaranonline',$y,true);
            $this->load->view('template/theme',$x);  
        }
        else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }         
        //$this->template->pendaftaran('pendaftaran/v_pendaftaranonline',$x);
        //print_r($data);
    }
    function pasien_baru(){
        $x=array(
            'poly'  => $this->pendaftaran_model->get_poly(),
            'active3'     => "active open",
            'active32'      => 'active',
        );
        $this->template->pendaftaran('pendaftaran/v_pendaftaranonline_lama',$x);
        //print_r($data);
    }
    
    function antrian(){
        $tgl_reg=date('Y-m-d H:i:s');
        $antrian=$this->pendaftaran_model->get_antrian_poly('GR018',$tgl_reg,'26');
        echo $antrian;
    }

    function get_book_antrian(){
        $ws=$this->bridging_model->get_web_service('rsud');
            if(!empty($ws)){
                $api_url    = $ws->url_call_back;
                $client_id  = $ws->client_id;
                $key        = $ws->secret_key;
                $param=array(
                    'client_id'             => $client_id,
                    'client_secret_key'     => $key,
                    'daftar_tglkunjungan'   => date('Y-m-d'),
                    'daftar_poly_id'        => $this->input->get('tujuan'),

                );
                $respone = $this->bridging_model->request_rsud($param,$api_url ."get_antrian");
                //echo $respone;
                //exit;
                $res_array=json_decode($respone);
                $booking_antrian=$res_array->antrian;
            }else{
                $booking_antrian="0";
            }
            $new = $this->pendaftaran_model->get_antrian_poly($this->input->get('tujuan'),date('Y-m-d'),'',$booking_antrian);
            echo $new;
    }
    
    function online_data(){

        $api_url    = ONLINE_CALL_BACK;
            $client_id  = ONLINE_ID;
            $key        = ONLINE_KEY;
            //echo $api_url;
            $daftar_tglkunjungan=$this->input->get('tgl');
            $daftar_poly_id=$this->input->get('poly');
            $start = intval($this->input->get('start'));
            $q=urlencode($this->input->get('q'));
            $filter=urlencode($this->input->get('filter'));
            if(empty($daftar_tglkunjungan)) $daftar_tglkunjungan=date('Y-m-d');
            if(empty($daftar_poly_id)) $daftar_poly_id="";
            if(empty($start)) $start= 0;
            $limit=50;
            $param=array(
                'client_id'             => $client_id,
                'client_secret_key'     => $key,
                'daftar_tglkunjungan'   => $daftar_tglkunjungan,
                'daftar_poly_id'        => $daftar_poly_id,
                'start'                 => $start,
                'state'                 =>'ALL',
                'limit'                 => $limit,
                'q'                     => $q,
                'filter'                => $filter,
            );
            //print_r($param);
            //echo $api_url;
            //exit;
            $this->load->model('patch_model');
            $respone = $this->patch_model->request_online($param,$api_url ."get_reg");
            //echo $respone;
            //exit;
            $respone_array=json_decode($respone);
            //print_r($respone_array->pasien);
            //exit;
            $data=array(
                'data'  => $respone_array->pasien,
                'count' => $respone_array->jmldata
            );

            $tabel=$this->load->view('registrasi/v_data_pendaftaran_online',$data, true);
            $list=array(
                'start'     => $start,
                'row_count' => $respone_array->jmldata,
                'limit'     => $limit,
                'tabel'     => $tabel,
            );
            header('Content-Type: application/json');
            echo json_encode($list);
    }

    function data_excel(){
        /*$api_url    = "http://rsud.padangpanjang.go.id/api/";
        $client_id  = "00001";
        $key        = "RF3XS15QY15TPK91";
        */
        $ws=$this->bridging_model->get_web_service('rsud');
        if(!empty($ws)){
            $api_url    = $ws->url_call_back;
            $client_id  = $ws->client_id;
            $key        = $ws->secret_key;
            $daftar_tglkunjungan=$this->input->get('tgl');
            $daftar_poly_id=$this->input->get('poly');
            $start = intval($this->input->get('start'));
            $q=urlencode($this->input->get('q'));
            if(empty($daftar_tglkunjungan)) $daftar_tglkunjungan=date('Y-m-d');
            if(empty($daftar_poly_id)) $daftar_poly_id="";
            if(empty($start)) $start= 0;
            $limit=50;
            $param=array(
                'client_id'             => $client_id,
                'client_secret_key'     => $key,
                'daftar_tglkunjungan'   => $daftar_tglkunjungan,
                'daftar_poly_id'        => $daftar_poly_id,
                'start'                 => $start,
                'limit'                 => $limit,
                'q'                     => $q
            );
            //print_r($param);
            $respone = $this->bridging_model->request_rsud($param,$api_url ."get_reg");
            $respone_array=json_decode($respone);
            //print_r($respone_array->pasien);
            //exit;
            $data=array(
                'data'  => $respone_array->pasien,
                'count' => $respone_array->jmldata
            );
            $this->load->view('pendaftaran/v_data_pendaftaran_online_excel',$data);
        }else{
            $data=array(
                'data'  => array(),
                'count' => 0
            );
            $this->load->view('pendaftaran/v_data_pendaftaran_online_excel',$data);
        }
            
    }

    function aprove($id){
            $api_url    = ONLINE_CALL_BACK;
            $client_id  = ONLINE_ID;
            $key        = ONLINE_KEY;

            $param=array(
                'client_id'             => $client_id,
                'client_secret_key'     => $key
            );
            $respone = $this->patch_model->request_online($param,$api_url ."get_pendaftaran/" .$id);
            header('Content-Type: application/json');
            echo $respone;
            //exit;
            
    }

    function pendaftaran($id){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){        
            $z['index_menu'] = 5;
            $z = setNav("nav_7");
            /*$api_url    = ONLINE_CALL_BACK;
            $client_id  = ONLINE_ID;
            $key        = ONLINE_KEY;

            $param=array(
                'client_id'             => $client_id,
                'client_secret_key'     => $key
            );
            $respone = $this->patch_model->request_online($param,$api_url ."get_pendaftaran/" .$id);
            $res_array=json_decode($respone);
            if($res_array->code==200){
                $pasien = $res_array->pasien;
            }else{
                $pasien = array();
            }*/
            $cara_bayar = $this->db->get('tbl01_cara_bayar');
            /**
             * Rujukan
             */
            $this->db->where_not_in('idx',array('7','8','9','10'));
            $this->db->order_by("FIELD(idx,1,2,5,3,6,4)");
            $getRujukan = $this->db->get('tbl01_rujukan');
            
            /*
            Cek Persyaratan pengecualian 
            1. Cari Umur
            2. Cek Pengecualaian ruangan berdasarkan umur dan jekel
            */

            /*$tgl_lahir = new DateTime($resArr['tgl_lahir']);
            $sekarang = new DateTime('today');
            $umur = $sekarang->diff($tgl_lahir)->y;
            $this->db->select('id_ruang');
            $this->db->where('jekel', $resArr['jns_kelamin']);
            $this->db->where('umur_min < ', $umur);
            $this->db->where('umur_max > ', $umur);
            $id_ruang=$this->db->get('tbl01_pengecualian')->result();
            foreach ($id_ruang as $i) {
                $exc[]=$i->id_ruang;
            }
            if(!empty($exc)) $this->db->where_not_in('idx', $exc);*/
            $this->db->where_in('grid',array('1'));
            $this->db->where('status_ruang',1);
            $getPoli = $this->db->get('tbl01_ruang');
            //get Data Online
            $api_url    = ONLINE_CALL_BACK;
            $client_id  = ONLINE_ID;
            $key        = ONLINE_KEY;

            $param = array(
                'client_id'             => $client_id,
                'client_secret_key'     => $key
            );
            $respone = $this->patch_model->request_online($param, $api_url . "get_pendaftaran/" . $id);
            $arr=json_decode($respone);
            if($arr->code==200){
                $pasien = $arr->pasien;
            }else{
                $pasien = array();
            }
            //echo $arr->code; exit;
            //if($arr->status)
            //header('Content-Type: application/json');
            //echo $respone; exit;
            $this->db->where('nomr', $pasien->nomr);
            $this->db->order_by('idx', 'desc');
            $this->db->limit(1);
            $pj = $this->db->get('tbl01_penanggung_jawab')->row();
            //print_r($pj); exit;
            $data=array(
                'contentTitle' => "Form Pasien Online",
                'pasien'    => $pasien,
                'id'        => $id,
                'getCaraBayar'=>$cara_bayar,
                'getRujukan'  => $getRujukan,
                'getPoli'   => $getPoli,
                'pj'        => $pj
            );
            
            //header('Content-Type: application/json');
            //echo json_encode($pj); exit;;

            $theme=array( 
                'header'    => $this->load->view('template/header','',true),
                'nav_sidebar'=> $this->load->view('template/nav_sidebar',$z,true),
                'content'   => $this->load->view('registrasi/v_formpendaftaranonline',$data,true),
                'index_menu'=>5
            );
            $this->load->view('template/theme',$theme);  
        }
        else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }       
    }

    function aprove_pasien(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['nomr']) &&
                    isset($_POST['no_ktp']) &&
                    isset($_POST['nama_pasien']) &&
                    isset($_POST['tempat_lahir']) &&
                    isset($_POST['tgl_lahir']) &&
                    isset($_POST['jns_kelamin']) &&
                    isset($_POST['jns_layanan']) &&
                    isset($_POST['id_ruang']) &&
                    isset($_POST['nama_ruang']) &&
                    isset($_POST['id_rujuk']) &&
                    isset($_POST['rujukan']) &&
                    isset($_POST['pjPasienNama']) &&
                    isset($_POST['pjPasienUmur']) &&
                    isset($_POST['pjPasienPekerjaan']) &&
                    isset($_POST['pjPasienAlamat']) &&
                    isset($_POST['pjPasienTelp']) &&
                    isset($_POST['pjPasienHubKel']) &&
                    isset($_POST['pjPasienDikirimOleh']) &&
                    isset($_POST['pjPasienAlmtPengirim']) &&
                    isset($_POST['dokterJaga']) &&
                    isset($_POST['namaDokterJaga']) &&                    
                    isset($_POST['id_cara_bayar']) &&
                    isset($_POST['cara_bayar']) &&
                    isset($_POST['no_bpjs']) &&
                    isset($_POST['no_jaminan'])
                ){
                    
                    if(empty($this->input->post('nomr'))){
                        //INPUT PASIEN BARU

                        $pasien=array(
                            'nomr'  => $this->patch_model->buat_nomr(),
                            'no_ktp'=> $this->input->post('no_ktp'),
                            'nama' => $this->input->post('nama_pasien'),
                            'tempat_lahir' => $this->input->post('tempat_lahir'),
                            'tgl_lahir' => setDateEng($this->input->post('tgl_lahir')),
                            'jns_kelamin' => $this->input->post('jns_kelamin'),
                            'status_kawin' => $this->input->post('status_kawin'),
                            'pekerjaan' => $this->input->post('pekerjaan'),
                            'agama' => $this->input->post('agama'),
                            'no_telpon' => $this->input->post('no_telpon'),
                            'kewarganegaraan' => $this->input->post('kewarganegaraan'),
                            'nama_negara' => $this->input->post('nama_negara'),
                            'nama_provinsi' => $this->input->post('nama_provinsi'),
                            'nama_kab_kota' => $this->input->post('nama_kab_kota'),
                            'nama_kecamatan' => $this->input->post('nama_kecamatan'),
                            'nama_kelurahan' => $this->input->post('nama_kelurahan'),
                            'suku' => $this->input->post('suku'),
                            'bahasa' => $this->input->post('bahasa'),
                            'alamat' => $this->input->post('alamat'),
                            'penanggung_jawab' => $this->input->post('penanggung_jawab'),
                            'no_penanggung_jawab' => $this->input->post('no_penanggung_jawab'),
                            'no_bpjs' => $this->input->post('no_bpjs'),
                            'tgl_daftar' => date('Y-m-d H:i:s'),
                            'user_created' => $this->session->userdata('get_uid'),
                            'session_id' => getSessionID()
                        );

                        // echo json_encode(array('status'=>true,'data'=>$pasien));
                        // exit;
                        $this->db->insert('tbl01_pasien', $pasien);

                        //Update Nomr Pasien Pendaftaran Online
                        $pasien=array(
                            'nomr' =>$pasien["nomr"]
                        );
                        $req=array(
                                'client_id'             => ONLINE_ID,
                                'client_secret_key'     => ONLINE_KEY,
                                'action'                => 'UPDATE_PASIEN',
                                'param_key'             => 'id',
                                'param_val'             => $this->input->post('id_pasien'),
                                'data'                  => $pasien
                        );
                        $update_pasien = $this->patch_model->request_online($req,ONLINE_CALL_BACK ."action");

                        $params['nomr'] = $pasien["nomr"];
                        $params['tgl_daftar'] = date('Y-m-d H:i:s');
                    }
                    else{
                        $params['nomr'] = trim($this->input->post('nomr',TRUE));
                        $params['tgl_daftar'] = $this->patch_model->get_field("tgl_daftar", 'tbl01_pasien', 'nomr', $params['nomr']);
                    }
                    
                    $params['no_ktp'] = trim($this->input->post('no_ktp',TRUE));
                    $params['nama_pasien'] = trim($this->input->post('nama_pasien',TRUE));
                    $params['tempat_lahir'] = trim($this->input->post('tempat_lahir',TRUE));
                    $params['tgl_lahir'] = trim($this->input->post('tgl_lahir', TRUE));
                    $params['jns_kelamin'] = trim($this->input->post('jns_kelamin',TRUE));

                    $params['nama_provinsi'] = $this->input->post('nama_provinsi');
                    $params['nama_kab_kota'] = $this->input->post('nama_kab_kota');
                    $params['nama_kecamatan'] = $this->input->post('nama_kecamatan');
                    $params['nama_kelurahan'] = $this->input->post('nama_kelurahan');

                    $params['jns_layanan'] = trim($this->input->post('jns_layanan',TRUE));
                    $params['id_ruang'] = trim($this->input->post('id_ruang',TRUE));
                    $params['nama_ruang'] = trim($this->input->post('nama_ruang',TRUE));
                    $params['id_rujuk'] = trim($this->input->post('id_rujuk',TRUE));
                    $params['rujukan'] = trim($this->input->post('rujukan',TRUE));
                    $params['no_rujuk']=trim($this->input->post('no_rujuk'),TRUE);
                    $params['pjPasienNama'] = trim($this->input->post('pjPasienNama',TRUE));
                    $params['pjPasienUmur'] = trim($this->input->post('pjPasienUmur',TRUE));
                    $params['pjPasienPekerjaan'] = trim($this->input->post('pjPasienPekerjaan',TRUE));
                    $params['pjPasienAlamat'] = trim($this->input->post('pjPasienAlamat',TRUE));
                    $params['pjPasienTelp'] = trim($this->input->post('pjPasienTelp',TRUE));
                    $params['pjPasienHubKel'] = trim($this->input->post('pjPasienHubKel',TRUE));
                    $params['pjPasienDikirimOleh'] = trim($this->input->post('pjPasienDikirimOleh',TRUE));
                    $params['pjPasienAlmtPengirim'] = trim($this->input->post('pjPasienAlmtPengirim',TRUE));

                    $params['dokterJaga'] = trim($this->input->post('dokterJaga', TRUE));
                    $params['namaDokterJaga'] = trim($this->input->post('namaDokterJaga', TRUE));
                    $params['id_cara_bayar'] = trim($this->input->post('id_cara_bayar',TRUE));
                    $params['cara_bayar'] = trim($this->input->post('cara_bayar',TRUE));
                    $idcb = trim($this->input->post('id_cara_bayar'));
                    //$id_jenis_peserta =  trim($this->input->post('id_jenis_peserta', TRUE));
                    if ($idcb == 2) {
                        //Jika Pasien PBPJS
                        $id_jenis = trim($this->input->post('id_jenis_peserta', TRUE));
                        $jenis_peserta = trim($this->input->post('jenis_peserta', TRUE));
                    } else {
                        $id_jenis = $idcb;
                        $jenis_peserta = trim($this->input->post('cara_bayar', TRUE));
                        //$params['id_jenis_peserta'] = $idcb . "." . trim($this->input->post('id_cara_bayar', TRUE));
                        //$params['jenis_peserta'] =  trim($this->input->post('cara_bayar', TRUE));
                    }
                    $params['id_jenis_peserta'] = $idcb . "." . $id_jenis;
                    $params['jenis_peserta'] = $jenis_peserta;
                    //$params['id_jenis_peserta'] = trim($this->input->post('id_jenis_peserta', TRUE));
                    //$params['jenis_peserta'] = trim($this->input->post('jenis_peserta', TRUE));
                    $params['no_bpjs'] = trim($this->input->post('no_bpjs',TRUE));
                    $params['id_pendaftaranonline'] = trim($this->input->post('daftar_id',TRUE));
                    $params['no_jaminan'] = trim($this->input->post('no_jaminan',TRUE));
                    $params['tgl_jaminan'] = date('Y-m-d');
                    $params['user_daftar'] = $this->session->userdata('get_uid');
                    $params['session_id'] = getSessionID();

                    if($params['nomr'] == ""){
                        $response['code'] = 501;
                        $response['message'] = "Ops. No.MR tidak boleh kosong!";
                    }else{
                        $this->db->where('nomr', $params['nomr']);
                        $cekQuery = $this->db->get('tbl01_pasien'); 
                        if($cekQuery->num_rows() > 0){
                            $SQLRegis = "SELECT * FROM tbl02_pendaftaran WHERE nomr = '$params[nomr]' 
                            AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') 
                            AND id_ruang = '$params[id_ruang]' AND reg_unit NOT IN(SELECT reg_unit FROM tbl02_pendaftaran_batal)";

                            $cekRegis = $this->db->query("$SQLRegis"); 
                            if($cekRegis->num_rows() > 0){
                                $response['code'] = 501;
                                $response['message'] = "Ops. Pasien telah terdaftar dengan tujuan layanan, pada hari yang sama!\nSilahkan periksa kembali tujuan layanan anda.";
                            }else{
                                $this->db->insert('tbl02_pendaftaran',$params); 
                                $id=$this->db->insert_id();
                                if ($params['tgl_daftar'] == date('Y-m-d')) {
                                    $baru = 1;
                                    $lama = 0;
                                } else {
                                    $baru = 0;
                                    $lama = 1;
                                }
                                if ($params['nama_kab_kota'] == "Kota Padang Panjang") {
                                    $dalam_kota = 1;
                                    $luar_kota = 0;
                                } else {
                                    $dalam_kota = 0;
                                    $luar_kota = 1;
                                }
                                if ($params['jns_kelamin'] == "L" || $params['jns_kelamin'] == "1") {
                                    $laki = 1;
                                    $perempuan = 0;
                                } else {
                                    $laki = 0;
                                    $perempuan = 1;
                                }
                                $statistik = array(
                                    'tgl_kunjungan' => date('Y-m-d'),
                                    'ruangid' => $params['id_ruang'],
                                    'nama_ruang' => $params['nama_ruang'],
                                    'id_cara_bayar' => $params['id_jenis_peserta'],
                                    'cara_bayar' => $params['jenis_peserta'],
                                    'provinsi' => $params['nama_provinsi'],
                                    'kabupaten' => $params['nama_kab_kota'],
                                    'kecamatan' => $params['nama_kecamatan'],
                                    'kelurahan' => $params['nama_kelurahan'],
                                    'jumlah_kunjungan' => 1,
                                    'pasien_baru' => $baru,
                                    'pasien_lama' => $lama,
                                    'dalam_kota' => $dalam_kota,
                                    'luar_kota' => $luar_kota,
                                    'laki_laki' => $laki,
                                    'perempuan' => $perempuan
                                );
                                $res=$this->pendaftaran_model->hitStatistik($statistik);
                                //echo $res; exit;
                                //Update Data Penanggung jawab
                                $pj["nomr"] = $params['nomr'];
                                $pj['nama_penanggung_jawab'] = trim($this->input->post('pjPasienNama',TRUE));
                                $pj['tahun_lahir'] = date('Y') - intval(trim($this->input->post('pjPasienUmur',TRUE)));
                                $pj['pekerjaan'] = trim($this->input->post('pjPasienPekerjaan',TRUE));
                                $pj['alamat'] = trim($this->input->post('pjPasienAlamat',TRUE));
                                $pj['no_telp'] = trim($this->input->post('pjPasienTelp',TRUE));
                                $pj['hub_keluarga'] = trim($this->input->post('pjPasienHubKel',TRUE));
                                $this->db->where('nomr',$params['nomr']);
                                $this->db->where('nama_penanggung_jawab',$params['pjPasienNama']);
                                $cek_pj = $this->db->get('tbl01_penanggung_jawab')->row();
                                if(empty($cek_pj)){
                                    $this->db->insert('tbl01_penanggung_jawab',$pj);
                                }else{
                                    $this->db->where('nomr',$params['nomr']);
                                    $this->db->where('nama_penanggung_jawab',$params['pjPasienNama']);
                                    $this->db->update('tbl01_penanggung_jawab', $pj);
                                }

                                if($id){
                                    $this->db->from('tbl02_pendaftaran'); 
                                    //$this->db->where('session_id', getSessionID());
                                    $this->db->where('idx',$id);
                                    $this->db->order_by('idx', 'desc');
                                    $this->db->limit(1);
                                    $cekQuery = $this->db->get(); 
                                    if($cekQuery->num_rows() > 0){
                                        $resData = $cekQuery->row_array();
                                        //Insert Data Antrian Poly
                                        $antri=array('id_daftar'=>$resData["id_daftar"],'no_antrian_poly'=>$this->input->post('antrian_poly'));
                                        $this->db->insert('tbl02_antrian',$antri);
                                        //Update Status Aprove ID server pendaftaran Online
                                        $daftar=array(
                                            'daftar_aprove' => "1"
                                        );
                                        $req=array(
                                                'client_id'             => ONLINE_ID,
                                                'client_secret_key'     => ONLINE_KEY,
                                                'action'                => 'UPDATE_PENDAFTARAN',
                                                'param_key'             => 'daftar_id',
                                                'param_val'             => $this->input->post('daftar_id'),
                                                'data'                  => $daftar
                                        );
                                        $update_daftar = $this->patch_model->request_online($req,ONLINE_CALL_BACK ."action");
                                        
                                        //Insert Nota Biaya Rekam Medis Ke tabel nota_tagihan
                                        $this->db->select('id_daftar,id_pendaftaranonline, reg_unit,nomr,dokterJaga,user_daftar, tgl_daftar, tgl_masuk');
                                        $this->db->where('idx', $id);
                                        $row=$this->db->get('tbl02_pendaftaran')->row();
                                        $trace=array(
                                            'reg_unit'=>$row->reg_unit
                                        );
                                        $this->db->where('id_daftar',$this->input->post('daftar_id'));
                                        $this->db->update('tbl02_tracer_mr',$trace);
                                        $tgld = date("Y-m-d", strtotime($row->tgl_daftar));
                                        $tglm = date("Y-m-d", strtotime($row->tgl_masuk));
                                        //$tgl_daftar = new DateTime($tgld);
                                        //$tgl_masuk = new DateTime($tglm);
                                        if($tgld < $tglm){
                                            //Jika Tanggal daftar kecil dari tanggal Masuk pasien lama
                                            $this->db->where('idxlayanan', 7);
                                            $tarif=$this->db->get("tbl01_tarif_layanan")->row();
                                        }else{
                                            //Jika Tanggal daftar kecil dari tanggal Masuk pasien baru
                                            $this->db->where('idxlayanan', 6);
                                            $tarif = $this->db->get("tbl01_tarif_layanan")->row();
                                        }
                                        if(!empty($tarif)){
                                            $data = array(
                                                'id_daftar' => $row->id_daftar,
                                                'reg_unit' => $row->reg_unit,
                                                'nomr' => $row->nomr,
                                                'id_tarif' => $tarif->idxlayanan,
                                                'layanan' => $tarif->layanan,
                                                'jasa_sarana' => $tarif->jasa_sarana,
                                                'jasa_pelayanan' => $tarif->jasa_pelayanan,
                                                'tarif_layanan' => $tarif->tarif_layanan,
                                                'kategori_id' => $tarif->kategori_id,
                                                'kelas_id' => $tarif->kelas_id,
                                                'jml' => 1,
                                                'sub_total_tarif' => $tarif->tarif_layanan,
                                                'id_dokter' => $row->user_daftar,
                                                'user_exec' => $row->user_daftar
                                            );
                                            $this->db->insert('tbl03_nota_detail', $data);
                                        }

                                        $response['code'] = 200;
                                        $response['message'] = "Simpan data sukses.";
                                        $response['unikID'] = encrypt_decrypt('encrypt',$resData['reg_unit'],true);                                            
                                    }else{
                                        $response['code'] = 202;
                                        $response['message'] = "Simpan data sukses namun cookies telah dihapus.";
                                        $response['unikID'] = null;                                            
                                    }
                                }else{
                                    $response['code'] = 501;
                                    $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                                }
                            }
                        }else{
                            $response['code'] = 402;
                            $response['message'] = "Data pasien tidak ditemukan.";
                        }
                    }
                }else{
                    $response['code'] = 401;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
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
    function contoh(){
        $pasien=array('nama'=>'Wanhar Azri');
        echo $pasien["nama"];
    }
    function cek(){
        $this->pendaftaran_model->cek_koneksi();
    }
    function cek_antrian($tgl,$poly){
        $api_url = ONLINE_CALL_BACK ;
        $client_id = ONLINE_ID;
        $key = ONLINE_KEY;
        $param = array(
            'client_id' => $client_id,
            'client_secret_key' => $key,
            'daftar_tglkunjungan' => $tgl,
            'daftar_poly_id' => $poly,
        );
        $respone=$this->patch_model->request_online($param,ONLINE_CALL_BACK ."get_antrian");
        
        $res_array = json_decode($respone);
        $booking_antrian = $res_array->antrian;
        //$respone = $this->bridging_model->request_rsud($param,$api_url ."get_antrian");
        echo $respone;
    }
}