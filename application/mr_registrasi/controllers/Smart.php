<?php 
class Smart extends CI_Controller{
    function __construct(){
       parent::__construct();
        $this->load->model('users_model');
        $this->load->model('Smart_model');
        $this->load->model('patch_model');
    }
    
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $z = setNav("nav_7");
            $x_token=$this->session->userdata('token');
            if(empty($token)){
                $param=array(
                    'client'=>SMART_ID,
                    'key'=> SMART_KEY
                );
                $response = $this->Smart_model->http_request($param,SMART_CALL_BACK ."sim/auth/gettoken");
                $token=json_decode($response);
                $x_token = $token->response->token;
                $this->session->set_userdata(array('token'=>$x_token));
            }
            
            $data=array(
                'index_menu'=>5,
                'poly'=> $this->Smart_model->getPoly(1),
                'contentTitle'=> "Pendaftaran Pasien Online",
                'token'=>$x_token,
                'getData'=>'getData(1)'
            );
            $view=array(
                'header'=>$this->load->view('template/header','',true),
                'nav_sidebar'=> $this->load->view('template/nav_sidebar',$z,true),
                'content'=>$this->load->view('smart/v_pendaftaranonline',$data,true),
                'libjs'=>array('js/smart.js')
            );
            $this->load->view('template/theme',$view);  
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
    
    function getdata(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $tanggal_kunjungan=$this->input->get('tgl');
            $id_ruang=$this->input->get('poly');
            $page = intval($this->input->get('page'));
            $q=urlencode($this->input->get('q'));
            $token=$this->session->userdata('token');
            $filter=urlencode($this->input->get('filter'));
            if($filter=='lama') $pasien_lama=1; else $pasien_lama=0;
            if(empty($tanggal_kunjungan)) $tanggal_kunjungan=date('Y-m-d');
            if(empty($id_ruang)) $id_ruang="";
            if(empty($page)) $page= 1;
            $limit=50;
            $request=array(
                'param'=>array(
                    'tanggal_kunjungan' => $tanggal_kunjungan,
                    'id_ruang'          => $id_ruang,
                    'status_berobat'    => 'Mendaftar',
                    'page'              => $page,
                    'state'             =>'ALL',
                    'limit'             => $limit,
                    'keyword'           => $q,
                    'pasien_lama'       => $pasien_lama,
                )
            );
            $response = $this->Smart_model->http_request($request,SMART_CALL_BACK ."sim/pendaftaran/getdata",$token);
            header('Content-Type: application/json');
            echo $response;
            
        }
        else{
            $sid = getSessionID();
            $url_login = base_url().'mr_registrasi.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        } 
    }

    function detail($idx){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $token=$this->session->userdata('token');
            $request=array(
                'param'=>array(
                    'idx' => $idx
                )
            );
            $response = $this->Smart_model->http_request($request,SMART_CALL_BACK ."sim/pendaftaran/getdetail",$token);
            // header('Content-Type: application/json');
            // echo $response;exit;
            $resdata=json_decode($response);
            $z['index_menu'] = 5;
            $z = setNav("nav_7");

            $this->db->where('nomr', $resdata->pendaftaran->nomr);
            $this->db->order_by('idx', 'desc');
            $this->db->limit(1);
            $pj = $this->db->get('tbl01_penanggung_jawab')->row();

            $data=array(
                'index_menu'    => 5,
                'poly'          => $this->Smart_model->getPoly(1),
                'contentTitle'  => "Pendaftaran Pasien Online",
                'getCaraBayar'  => $this->Smart_model->getCaraBayar(),
                'getRujukan'    => $this->Smart_model->getRujukan(),
                'getPoli'       => $this->Smart_model->getPoly(1),
                'pasien'        => $resdata->pasien,
                'pendaftaran'   => $resdata->pendaftaran,
                'pj'            => $pj
            );
            //print_r($data); exit;
            $view=array(
                'header'=>$this->load->view('template/header','',true),
                'nav_sidebar'=> $this->load->view('template/nav_sidebar',$z,true),
                'content'=>$this->load->view('smart/v_formpendaftaranonline',$data,true),
                'libjs'=>array('js/pendaftaran.js','js/smart.js')
            );
            $this->load->view('template/theme',$view);  
            //header('Content-Type: application/json');
            //echo $response;
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
            $nama_pasien=$this->input->post('nama_pasien');
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
                    $token=$this->session->userdata('token');
                    if(empty($this->input->post('nomr'))){
                        //INPUT PASIEN BARU

                        $pasien=array(
                            'nomr'  => $this->patch_model->buat_nomr(),
                            'no_ktp'=> $this->input->post('no_ktp'),
                            'nama' => $this->input->post('nama_pasien'),
                            'tempat_lahir' => $this->input->post('tempat_lahir'),
                            'tgl_lahir' => $this->input->post('tgl_lahir'),
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
                        $this->db->insert('tbl01_pasien', $pasien);
                        $params['nomr'] = $pasien["nomr"];
                        $params['tgl_daftar'] = date('Y-m-d H:i:s');

                        //Update Nomr Pasien Pendaftaran Online
                        $pasien=array(
                            'nomr' =>$pasien["nomr"]
                        );
                        $request=array(
                            'param'=>array('idx' => $this->input->post('id_pasien')),
                            'data'=>array('nomr'=>$pasien["nomr"])
                        );
                        $respasien = $this->Smart_model->http_request($request,SMART_CALL_BACK ."sim/pasien/updatepasien",$token);
                        // echo $respasien;
                        // exit;
                        
                    }
                    else{
                        $params['nomr'] = trim($this->input->post('nomr',TRUE));
                        $params['tgl_daftar'] = $this->patch_model->get_field("tgl_daftar", 'tbl01_pasien', 'nomr', $params['nomr']);
                    }
                    $params['id_pendaftaranonline']=trim($this->input->post('id_pendaftaranonline',TRUE));
                    
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
                    $params['id_userdaftar']=trim($this->input->post('id_userdaftar',TRUE));
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
                    $params['no_jaminan'] = trim($this->input->post('no_jaminan',TRUE));
                    $params['tgl_jaminan'] = date('Y-m-d');
                    $params['user_daftar'] = $this->session->userdata('get_uid');
                    $params['session_id'] = getSessionID();
                    //echo json_encode(array('pendaftaran'=>$params)); exit;
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
                                
                                //Hits Data statistik
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
                                $this->load->model('pendaftaran_model');
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

                                        $this->db->where('id_pendaftaranonline',$params['id_pendaftaranonline']);
                                        $this->db->where('tgl_kunjungan',date('Y-m-d'));
                                        $cek=$this->db->get('tbl02_antrianv2')->num_rows();
                                        if($cek>0){
                                            $antri=array(
                                                'id_daftar'=>$resData["id_daftar"],
                                                'reg_unit'=>$resData["reg_unit"],
                                                'jam_kunjunganLabel'=>$this->input->post('jam_kunjunganLabel'),
                                                'jam_kunjunganAntrian'=>$this->input->post('jam_kunjunganAntrian'),
                                                'label_antrian'=>$this->input->post('label_antrian'),
                                                'ruangid'=>$params['id_ruang'],
                                                'nrpdokter'=>$params['dokterJaga'],
                                                'nomor_antrian'=> $this->input->post('nomor_antrian')
                                            );
                                            $this->db->where('id_pendaftaranonline',$params['id_pendaftaranonline']);
                                            $this->db->update('tbl02_antrianv2',$antri);
                                        }else{
                                            $antri=array(
                                                'id_pendaftaranonline'=>$params['id_pendaftaranonline'],
                                                'id_daftar'=>$resData["id_daftar"],
                                                'reg_unit'=>$resData["reg_unit"],
                                                'tgl_kunjungan'=>date('Y-m-d'),
                                                'jam_kunjunganLabel'=>$this->input->post('jam_kunjunganLabel'),
                                                'jam_kunjunganAntrian'=>$this->input->post('jam_kunjunganAntrian'),
                                                'label_antrian'=>$this->input->post('label_antrian'),
                                                'ruangid'=>$params['id_ruang'],
                                                'nrpdokter'=>$params['dokterJaga'],
                                                'nomor_antrian'=> $this->input->post('nomor_antrian')
                                            );
                                            $this->db->insert('tbl02_antrianv2',$antri);
                                        }
                                        
                                        //Update Status Aprove ID server pendaftaran Online
                                        
                                        $request=array(
                                            'param'=>array(
                                                'idx' => $params['id_pendaftaranonline'],
                                            ),
                                            'data'=>array(
                                                'status_berobat'=>'Checkin',
                                                'id_daftar'=>$resData["id_daftar"],
                                                'reg_unit'=>$resData["reg_unit"],
                                                'nomr'=>$resData['nomr'],
                                            )
                                        );
                                        $res = $this->Smart_model->http_request($request,SMART_CALL_BACK ."sim/pendaftaran/update",$token);
                                        // $daftar=array(
                                        //     'daftar_aprove' => "1"
                                        // );
                                        
                                        // $req=array(
                                        //         'client_id'             => ONLINE_ID,
                                        //         'client_secret_key'     => ONLINE_KEY,
                                        //         'action'                => 'UPDATE_PENDAFTARAN',
                                        //         'param_key'             => 'daftar_id',
                                        //         'param_val'             => $this->input->post('daftar_id'),
                                        //         'data'                  => $daftar
                                        // );
                                        // $update_daftar = $this->patch_model->request_online($req,ONLINE_CALL_BACK ."action");
                                        
                                        //Insert Nota Biaya Rekam Medis Ke tabel nota_tagihan
                                        $this->db->select('id_daftar, reg_unit,nomr,dokterJaga,user_daftar, tgl_daftar, tgl_masuk');
                                        $this->db->where('idx', $id);
                                        $row=$this->db->get('tbl02_pendaftaran')->row();
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
                    $response['nama_pasien']= $nama_pasien;
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

    function reg_success()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            // Cek status batal
            $reg_unit = encrypt_decrypt('decrypt', $_GET['uid'], true);

            $this->db->where('reg_unit', $reg_unit);
            $cekBatal = $this->db->get('tbl02_pendaftaran_batal');

            $this->db->where('reg_unit', $reg_unit);
            $cekPendaftaran = $this->db->get('tbl02_pendaftaran');

            if ($cekBatal->num_rows() > 0) {
                $url_reg = base_url() . 'mr_registrasi.php/registrasi';
                echo "<script>alert('Ops. Anda tidak bisa membuka registrasi ini. Registrasi ini telah dibatalkan');
                window.location.href = '$url_reg';</script>";
            } elseif (!$cekPendaftaran->num_rows() > 0) {
                $url_reg = base_url() . 'mr_registrasi.php/registrasi';
                echo "<script>alert('Ops. Data tidak ditemukan. periksa kembali data anda');
                window.location.href = '$url_reg';</script>";
            } else {
                $x['header'] = $this->load->view('template/header', '', true);
                $z = setNav("nav_4");
                $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                $y['contentTitle'] = "Pendaftaran Pasien Rawat Jalan";

                $this->db->select('*,tbl02_pendaftaran.id_daftar as id_daftar');
                $this->db->from('tbl02_pendaftaran');
                $this->db->join('tbl02_antrianv2', 'tbl02_pendaftaran.id_daftar=tbl02_antrianv2.id_daftar', 'LEFT');
                $this->db->where('tbl02_pendaftaran.reg_unit', $reg_unit);
                $cekNum = $this->db->get();
                if ($cekNum->num_rows() > 0) {
                    $resArr = $cekNum->row_array();
                    $y['idx'] = $resArr['idx'];
                    $y['id_daftar'] = $resArr['id_daftar'];
                    $y['no_bpjs'] = $resArr['no_bpjs'];
                    $y['reg_unit'] = $resArr['reg_unit'];
                    $y['tgl_masuk'] = $resArr['tgl_masuk'];
                    $y['id_rujuk'] = $resArr['id_rujuk'];
                    $y['nomr'] = $resArr['nomr'];
                    $y['nama_pasien'] = $resArr['nama_pasien'];
                    $y['tempat_lahir'] = $resArr['tempat_lahir'];
                    $y['tgl_lahir'] = $resArr['tgl_lahir'];
                    $y['jns_kelamin'] = $resArr['jns_kelamin'];
                    $y['id_ruang'] = $resArr['id_ruang'];
                    $y['nama_ruang'] = $resArr['nama_ruang'];
                    $y['jns_layanan'] = $resArr['jns_layanan'];
                    $y['cara_bayar'] = $resArr['cara_bayar'];
                    $y['no_jaminan'] = $resArr['no_jaminan'];
                    $y['no_antrian_poly'] = $resArr['label_antrian'].".".$resArr['nomor_antrian'];
                    $y['batch']=$resArr['jam_kunjunganLabel'];
                    $y['estimasi']=$resArr['jam_kunjunganAntrian'];
                    $this->db->where('idx', $resArr['id_cara_bayar']);
                    $cb = $this->db->get('tbl01_cara_bayar')->row();
                    if (empty($cb)) $y["jkn"] = 0;
                    else $y["jkn"] = $cb->jkn;
                } else {
                    $y["jkn"] = 0;
                    $y["idx"] = "";
                    $y["id_rujuk"] = "";
                    $y['no_bpjs'] = "";
                    $y['id_daftar'] = "";
                    $y['reg_unit'] = "";
                    $y['tgl_masuk'] = "";
                    $y['nomr'] = "";
                    $y['nama_pasien'] = "";
                    $y['tempat_lahir'] = "";
                    $y['tgl_lahir'] = "";
                    $y['jns_kelamin'] = "1";
                    $y['id_ruang'] = "";
                    $y['ruang'] = "";
                    $y['jns_layanan'] = "";
                    $y['no_antrian_poly'] = "";
                }
                $x['content'] = $this->load->view('smart/template_daftar_rajal_sukses', $y, true);
                $this->load->view('template/theme', $x);
            }
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'mr_registrasi.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
}