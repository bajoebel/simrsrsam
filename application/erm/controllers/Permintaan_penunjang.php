<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class permintaan_penunjang extends CI_Controller {
    public function __construct(){
        parent ::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
        $this->load->model('nota_model');
    }

    public function index(){      
        /*$ses_state = $this->users_model->cek_session_id();        
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_3");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Lokasi Pelayanan";        

            $NRP = $this->session->userdata('get_uid');
            $y['getRuang'] = $this->db->query("SELECT * FROM tbl01_ruang 
                WHERE idx IN (SELECT ruang_akses FROM tbl01_users_nota_tagihan 
                WHERE NRP = '$NRP') AND grid = '3' ORDER BY ruang");
            $jmlruang=$y['getRuang']->num_rows();
            if($jmlruang==1) {
                $kdlok=$y['getRuang']->row()->idx;
                header('location:'.base_url() ."erm.php/permintaan_penunjang/tambah?kLok=" .$kdlok);
            }else{
                $x['content'] = $this->load->view('permintaan_penunjang/template_ruang',$y,true);
                $this->load->view('template/theme',$x);
            }
        }else{
            $sid = getSessionID();
            $url_login = base_url().'erm.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }   */
        
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if($this->session->userdata('kdlokasi')){
                    $this->session->unset_userdata('sPage');
                    $this->session->unset_userdata('sLike');

                    if($this->session->userdata('kdlokasi') == ""){
                        $response['code'] = 402;
                        $response['message'] = "Ops. Lokasi Layanan tidak ditemukan. Coba ulangi kembali.";
                    }else{
                        $y['ruangID'] = $this->session->userdata('kdlokasi');                        
                        $x['header'] = $this->load->view('template/header','',true);
                        $z = setNav("nav_3");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                        $y['contentTitle'] = "Cari dan Registrasikan Pasien ke ";  

                        $this->db->where('tbl01_dokter.idruang',$y['ruangID']);
                        $this->db->select("tbl01_dokter.NRP,tbl01_pegawai.pgwNama");
                        $this->db->join('tbl01_pegawai','tbl01_dokter.NRP=tbl01_pegawai.NRP');
                        $y['getDokter'] = $this->db->get('tbl01_dokter');

                        $x['content'] = $this->load->view('permintaan_penunjang/template_table',$y,true);
                        $this->load->view('template/theme',$x);
                    }
                }else{
                    $response['code'] = 402;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }            
        }else{
            $sid = getSessionID();
            $url_login = base_url().'erm.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }  
    }
    
    public function tambah(){      
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if($this->session->userdata('kdlokasi')){
                    $this->session->unset_userdata('sPage');
                    $this->session->unset_userdata('sLike');

                    if($this->session->userdata('kdlokasi') == ""){
                        $response['code'] = 402;
                        $response['message'] = "Ops. Lokasi Layanan tidak ditemukan. Coba ulangi kembali.";
                    }else{
                        $y['ruangID'] = $this->session->userdata('kdlokasi');                        
                        $x['header'] = $this->load->view('template/header','',true);
                        $z = setNav("nav_3");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

                        $y['contentTitle'] = "Cari dan Registrasikan Pasien ke ";  

                        $this->db->where('tbl01_dokter.idruang',$y['ruangID']);
                        $this->db->select("tbl01_dokter.NRP,tbl01_pegawai.pgwNama");
                        $this->db->join('tbl01_pegawai','tbl01_dokter.NRP=tbl01_pegawai.NRP');
                        $y['getDokter'] = $this->db->get('tbl01_dokter');

                        $x['content'] = $this->load->view('permintaan_penunjang/template_table',$y,true);
                        $this->load->view('template/theme',$x);
                    }
                }else{
                    $response['code'] = 402;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            }else{
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }            
        }else{
            $sid = getSessionID();
            $url_login = base_url().'erm.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }        
    }

    function getView(){
        if(isset($_POST['ruangID'])):
            $id_ruang = $this->input->post('ruangID',true);
        else:
            $id_ruang = 0;
        endif;

        if(isset($_POST['page'])):
            $offset = $this->input->post('page');
            $this->session->set_userdata('sPage',$offset);
        else:
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;

        $limit = $this->perPage;
        $condition = "WHERE id_penunjang = '$id_ruang' ";
        if(isset($_POST['sLike'])){
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike',true));
            $condition .= "AND (nomr = '$sLike' OR id_daftar LIKE '%$sLike%' OR reg_unit LIKE '%$sLike%')";
            $this->session->set_userdata('sLike',$sLike);
        }else{
            if($this->session->userdata('sLike')){
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (nomr = '$sLike' OR id_daftar LIKE '%$sLike%' OR reg_unit LIKE '%$sLike%')";
            }else{
                $condition .= "AND DATE_FORMAT(tgl_minta,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d')";
            }
        }
        $SQL = "SELECT * FROM tbl02_permintaan_penunjang $condition ORDER BY idx DESC";
        //echo $SQL;    
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url().'erm.php/permintaan_penunjang/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('permintaan_penunjang/getDataKunjunganUnit',$x);
    }

    function registrasiPasien(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(
                    isset($_POST['no_permintaan']) &&
                    isset($_POST['id_ruang']) &&
                    isset($_POST['dokterJaga'])
                ){
                    $no_permintaan = $this->input->post('no_permintaan',TRUE);
                    $id_ruang = $this->input->post('id_ruang',TRUE);
                    $datPermintaanPenunjang = getDataPermintaanPenunjangById($no_permintaan);
                    $datPendaftaran = getDataPendaftaranByRegUnit($datPermintaanPenunjang['reg_unit']);
                    $params = array(
                        'id_daftar' => $datPermintaanPenunjang['id_daftar'],
                        'nomr' => $datPermintaanPenunjang['nomr'],
                        'no_ktp' => $datPendaftaran['no_ktp'],
                        'nama_pasien' => $datPermintaanPenunjang['nama_pasien'],
                        'tempat_lahir' => $datPendaftaran['tempat_lahir'],
                        'tgl_lahir' => $datPendaftaran['tgl_lahir'],
                        'jns_kelamin' => $datPendaftaran['jns_kelamin'],
                        'jns_layanan' => "PJ",
                        'id_ruang' => $id_ruang,
                        'nama_ruang' => getRuangByID($id_ruang),
                        'id_rujuk' => '6',
                        'rujukan' => 'PERMINTAAN PENUNJANG',
                        'no_rujuk' => $datPermintaanPenunjang['reg_unit'],
                        'asal_ruang' => $datPermintaanPenunjang['ruang_pengirim'],
                        'nama_asal_ruang' => $datPermintaanPenunjang['nama_ruang_pengirim'],
                        'dokter_pengirim' =>$datPermintaanPenunjang['dokter_pengirim'],
                        'nama_dokter_pengirim' => $datPermintaanPenunjang['nama_dokter_pengirim'],
                        'id_cara_bayar' => $datPendaftaran['id_cara_bayar'],
                        'cara_bayar' => $datPendaftaran['cara_bayar'],
                        'no_bpjs' => $datPendaftaran['no_bpjs'],
                        'no_jaminan' => $datPendaftaran['no_jaminan'],
                        'tgl_jaminan' => $datPendaftaran['tgl_jaminan'],
                        'id_kelas' => $datPendaftaran['id_kelas'],
                        'kelas_layanan' => $datPendaftaran['kelas_layanan'],
                        'pjPasienNama' => $datPendaftaran['pjPasienNama'],
                        'pjPasienUmur' => $datPendaftaran['pjPasienUmur'],
                        'pjPasienPekerjaan' => $datPendaftaran['pjPasienPekerjaan'],
                        'pjPasienAlamat' => $datPendaftaran['pjPasienAlamat'],
                        'pjPasienTelp' => $datPendaftaran['pjPasienTelp'],
                        'pjPasienHubKel' => $datPendaftaran['pjPasienHubKel'],
                        'pjPasienDikirimOleh' => $datPendaftaran['pjPasienDikirimOleh'],
                        'pjPasienAlmtPengirim' => $datPendaftaran['pjPasienAlmtPengirim'],
                        'dokterJaga'    => $this->input->post('dokterJaga'),
                        'namaDokterJaga'    => $this->input->post('namaDokterJaga'),
                        'kode_permintaan'   => $datPermintaanPenunjang["idx"],
                        'user_daftar' => $this->session->userdata('get_uid'),
                        'session_id' => session_id()
                    );


                    if($no_permintaan == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. ID Permintaan penunjang tidak boleh kosong!";
                    }elseif($id_ruang == ""){
                        $response['code'] = 401;
                        $response['message'] = "Ops. ID tujuan pelayanan tidak boleh kosong!";
                    }else{
                        //Insert Ke tabel pendaftaran
                        $this->db->trans_start();
                        $cekCommand = $this->db->insert('tbl02_pendaftaran',$params); 
                        $insertID=$this->db->insert_id();
                        if($cekCommand){
                            $this->db->from('tbl02_pendaftaran'); 
                            $this->db->where('session_id', session_id());
                            $this->db->order_by('idx', 'desc');
                            $this->db->limit(1);
                            $cekQuery = $this->db->get(); 
                            if($cekQuery->num_rows() > 0){
                                $resData = $cekQuery->row_array();
                                $paramsResponse = array(
                                    'id_permintaan_penunjang' => $no_permintaan,
                                    'id_daftar' => $params['id_daftar'],
                                    'reg_unit' => $resData['reg_unit'],
                                    'user_id' => $this->session->userdata('get_uid')
                                );

                                //Ambil data dari tabel permintaan tindakan penunjang kemudian Insert Ke tabel nota tagihan
                                /*$this->db->select('*,tbl02_permintaan_tindakan_penunjang.idx AS idx_permintaan');
                                $this->db->where('id_permintaan', $no_permintaan);
                                $this->db->join('tbl01_tarif_layanan', 'tbl01_tarif_layanan.idx=tbl02_permintaan_tindakan_penunjang.id_tarif');
                                $row=$this->db->get('tbl02_permintaan_tindakan_penunjang')->result();
                                foreach ($row as $row) {
                                    //$st=$row->jasa_pelayanan+$row->jasa_sarana;
                                    $dilayani = $this->input->post('status_dilayani_'.$row->idx_permintaan);
                                    $ly=array('control'=>'status_dilayani'.$row->idx_permintaan,'status_dilayani'=>$dilayani);
                                    if($dilayani=="1"){
                                        $tindakan[]=array(
                                            'id_daftar' => $params['id_daftar'],
                                            'reg_unit' => $resData['reg_unit'],
                                            'nomr' => $resData['nomr'],
                                            'id_tarif' => $row->id_tarif,
                                            'layanan' => $row->layanan,
                                            'jasa_sarana' => $row->jasa_sarana,
                                            'jasa_pelayanan' => $row->jasa_pelayanan,
                                            'tarif_layanan' => $row->tarif_layanan,
                                            'kategori_id' => $row->kategori_id,
                                            'kelas_id' => $row->kelas_id,
                                            'jml' => 1,
                                            'sub_total_tarif' => $row->tarif_layanan,
                                            'id_dokter' => $this->input->post('dokterJaga',TRUE),
                                            'user_exec' => $this->session->userdata('get_uid')
                                        );
                                    }else{
                                        $dilayani=0;
                                    }
                                    $jadwal[]=array(
                                        'idx_pendaftaran'   => $insertID,
                                        'jadwal_tindakan'   => $row->jadwal_tindakan,
                                        'status_dilayani'   => $dilayani,
                                        'id_tarif' => $row->id_tarif,
                                        'layanan' => $row->layanan,
                                        'id_dokter' => $this->input->post('dokterJaga',TRUE),
                                        'user_exec' => $this->session->userdata('get_uid')
                                    );
                                    
                                }*/
                                //if(!empty($tindakan)) $this->db->insert_batch('tbl03_nota_detail', $tindakan);
                                //if(!empty($jadwal)) $this->db->insert_batch('tbl02_jadwal_tindakan_penunjang', $jadwal);

                                
                                $cekCmdPenunjang = $this->db->insert('tbl02_permintaan_penunjang_response',$paramsResponse);
                                if ($cekCmdPenunjang) {
                                    /**
                                     * Ambil data pemeriksaan penunjang
                                     */
                                    $permintaan=$this->nota_model->getPermintaan($no_permintaan);
                                    foreach ($permintaan as $p ) {
                                        $insert_permintaan[]=array(
                                            'idx_pendaftaran'       => $insertID,
                                            'id_jenis_pemeriksaan'  => $p->idjenispemeriksaan,
                                            'jenis_pemeriksaan'     => $p->jenispemeriksaan,
                                            'id_subjenispemeriksaan'  => $p->idsubjenispemeriksaan,
                                            'subjenispemeriksaan'     => $p->subjenispemeriksaan,
                                            'id_pemeriksaan'        => $p->id_pemeriksaan,
                                            'nama_pemeriksaan'      => $p->nama_pemeriksaan,
                                            'id_dokter'             => $this->input->post('dokterJaga'),
                                            'status_dilayani'       => 0,
                                            'user_exec'             => $this->session->userdata('get_uid')
                                        );
                                    }
                                    $this->db->insert_batch('tbl02_pemeriksaan_penunjang',$insert_permintaan);
                                    

                                    $response['code'] = 200;
                                    $response['message'] = "Simpan data sukses.";
                                    $response['idx'] = $insertID;
                                    $response['klok'] = $id_ruang;
                                    $response['url'] = encrypt_decrypt('encrypt',$resData['reg_unit'],true);
                                    $response['permintaan']= $permintaan;
                                }else{
                                    $response['code'] = 202;
                                    $response['message'] = "Simpan data sukses. Update response penunjang gagal. Silahkan hubungi administrator";
                                    $response['url'] = null;                                            
                                }
                            }else{
                                $response['code'] = 202;
                                $response['message'] = "Simpan data sukses namun cookies telah dihapus.";
                                $response['url'] = null;                                            
                            }

                        }else{
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        } 
                        $this->db->trans_complete();
                    }
                }else{
                    $response['code'] = 401;
                    $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
                }
            }else{ 
                $response['code'] = 402;
                $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

    function tindakan($id_permintaan){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $this->db->select('*');
            $this->db->where('id_permintaan',$id_permintaan);
            $this->db->order_by('idjenispemeriksaan');
            $tindakan=$this->db->get('tbl02_permintaan_tindakan_penunjang a');
            $response=array('status'=>true,'data'=>$tindakan->result(),'row_count'=>$tindakan->num_rows(),'message'=> "OK");
        }else{
            $response=array('status'=>false,'data'=>array(),'row_count'=>0,'message'=>'session Expired');
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function reg_success_penunjang(){
        $ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_3");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            $y['contentTitle'] = "Pendaftaran Pasien Penunjang Medis";        

            $reg_unit = encrypt_decrypt('decrypt',$_GET['uid'],true);
            $this->db->where('reg_unit',$reg_unit);
            $cekNum = $this->db->get('tbl02_pendaftaran');
            if($cekNum->num_rows() > 0){
                $resArr = $cekNum->row_array();
                $y['idx'] = $resArr['idx'];
                $y['id_daftar'] = $resArr['id_daftar'];
                $y['reg_unit'] = $resArr['reg_unit'];
                $y['nomr'] = $resArr['nomr'];
                $y['no_ktp'] = $resArr['no_ktp'];
                $y['nama_pasien'] = $resArr['nama_pasien'];
                $y['tempat_lahir'] = $resArr['tempat_lahir'];
                $y['tgl_lahir'] = setDateInd($resArr['tgl_lahir']);
                $y['jns_kelamin'] = $resArr['jns_kelamin'];
                $y['jns_layanan'] = $resArr['jns_layanan'];
                $y['tgl_masuk'] = $resArr['tgl_masuk'];
                $y['id_ruang'] = $resArr['id_ruang'];
                $y['nama_ruang'] = $resArr['nama_ruang'];
                $y['no_jaminan'] = $resArr['no_jaminan'];
                $y['id_kelas'] = $resArr['id_kelas'];
                $y['kelas_layanan'] = $resArr['kelas_layanan'];
                $y['id_cara_bayar'] = $resArr['id_cara_bayar'];
                $y['cara_bayar'] = $resArr['cara_bayar'];
            }else{
                $y['idx'] = "";
                $y['id_daftar'] = "";
                $y['reg_unit'] = "";
                $y['nomr'] = "";
                $y['no_ktp'] = "";
                $y['nama_pasien'] = "";
                $y['tempat_lahir'] = "";
                $y['tgl_lahir'] = "";
                $y['jns_kelamin'] = "1";
                $y['jns_layanan'] = "";
                $y['tgl_masuk'] = "";
                $y['id_ruang'] = "";
                $y['nama_ruang'] = "";
                $y['no_jaminan'] = "";
                $y['id_kelas'] = "";
                $y['kelas_layanan'] = "";
                $y['id_cara_bayar'] = "";
                $y['cara_bayar'] = "";
            }

            $x['content'] = $this->load->view('permintaan_penunjang/template_daftar_penunjang_sukses',$y,true);
            $this->load->view('template/theme',$x);
        }else{
            $sid = getSessionID();
            $url_login = base_url().'erm.php/login?sid='.$sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        } 
    }
    function cetakReg(){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            if(isset($_GET['kode'])){
                $kode = encrypt_decrypt('decrypt',$_GET['kode'],true);
                $this->db->where('reg_unit',$kode);
                $cekQuery = $this->db->get('tbl02_pendaftaran');
                if($cekQuery->num_rows() > 0){
                    $resData = $cekQuery->row_array();
                    $x['reg_unit'] = $resData['reg_unit'];
                    $x['nomr'] = $resData['nomr'];
                    $x['nama'] = $resData['nama_pasien'];
                    $x['jns_kelamin'] = $resData['jns_kelamin'];
                    $x['tgl_lahir'] = $resData['tgl_lahir'];
                    $x['ruang'] = $resData['nama_ruang'];
                    $x['id_daftar'] = $resData['id_daftar'];
                    $x['tgl_masuk'] = $resData['tgl_masuk'];
                    $x['user_daftar'] = getNamaUserByID($resData['user_daftar']);
                    $this->load->view('cetak/v_registrasi',$x);
                }else{
                    echo "<script>alert('Ops. Data pendaftaran pasien tidak ditemukan. Silahkan coba kembali.');
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
}