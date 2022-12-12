<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Bayi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;
        $this->load->library('ajax_page');
        $this->load->model('users_model');
        $this->load->model('pendaftaran_model');
    }
    function index(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $z = setNav("nav_4");
            $data=array(
                'index_menu'    => 4,
                'contentTitle'  => 'Registrasi bayi baru lahir rawat gabung',
                'getRuang'      => $this->pendaftaran_model->getRuang(array('grid'=>2,'status_ruang'=>1)),
                'getIgd'      => $this->pendaftaran_model->getRuang(array('grid' => 4, 'status_ruang' => 1)),
                'getDokter'     => $this->pendaftaran_model->getTenagaMedis(array('dokter'=>1)), //Data Semua  Dokter
                'getDokterjaga' => $this->pendaftaran_model->getTenagaMedis(array('dokter' => 1, 'profId'=>2)), //Data Dokter Spesialis
                'getJenis'      => $this->pendaftaran_model->getJenis(array('jenis_status'=>1)),
                'getKelas'      => $this->pendaftaran_model->getKelas(),
                'getCaraBayar'  => $this->pendaftaran_model->getCaraBayar()
            );
            $theme=array(
                'header'=> $this->load->view('template/header', '', true),
                'nav_sidebar'=> $this->load->view('template/nav_sidebar', $z, true),
                'content'=> $this->load->view('registrasi/bayi_baru_lahir', $data, true),
                'libjs' => array('js/bayi.js')
            );
            $this->load->view('template/theme', $theme);
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'mr_registrasi.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function datasuku(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $q=$this->input->get('keyword');
            $response=$this->pendaftaran_model->getSuku($q);
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    function kunjunganibu(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $q = $this->input->get('keyword');
            $response = $this->pendaftaran_model->getKunjungan($q);
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
    function daftar_ranap(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            //data Pasien Baru
            $this->load->model('patch_model');
            $pasien['nomr'] = $this->patch_model->get_nomr();
            //echo json_decode($pasien['nomr']); exit;
            $nomr=$pasien["nomr"];
            $pasien['no_ktp'] = '0';
            $pasien['nama'] = trim($this->input->post('nama', TRUE));
            $pasien['tempat_lahir'] = trim($this->input->post('tempat_lahir', TRUE));
            $pasien['tgl_lahir'] = setDateEng($this->input->post('tgl_lahir', TRUE));
            $pasien['jns_kelamin'] = trim($this->input->post('jns_kelamin', TRUE));
            $pasien['pekerjaan'] = 'BELUM BEKERJA';
            $pasien['status_kawin'] = 'BELUM KAWIN';
            $pasien['suku'] = trim($this->input->post('nama_suku', TRUE));
            //Diambil Dari Data Sosial Ibu
            $ibu = $this->pendaftaran_model->getKunjunganByUnit($this->input->post('reg_unitibu'));
            if ($ibu) {
                $pasien['agama'] = $ibu->agama;
                $pasien['bahasa'] = $ibu->bahasa;
                $pasien['no_telpon'] = $ibu->no_telpon;
                $pasien['kewarganegaraan'] = $ibu->kewarganegaraan;
                $nama_negara = $ibu->nama_negara;
                $pasien['nama_negara'] = ($nama_negara == "") ? "Indonesia" : $nama_negara;
                $pasien['nama_provinsi'] = $ibu->nama_provinsi;
                $pasien['nama_kab_kota'] = $ibu->nama_kab_kota;
                $pasien['nama_kecamatan'] = $ibu->nama_kecamatan;
                $pasien['nama_kelurahan'] = $ibu->nama_kelurahan;
                $pasien['alamat'] = $ibu->alamat;
                $pasien['penanggung_jawab'] = $ibu->penanggung_jawab;
                $pasien['no_penanggung_jawab'] = $ibu->no_penanggung_jawab;
            }else{
                $pasien['agama'] = $ibu->agama;
                $pasien['bahasa'] = $ibu->bahasa;
                $pasien['no_telpon'] = $ibu->no_telpon;
                $pasien['kewarganegaraan'] = $ibu->kewarganegaraan;
                $nama_negara = $ibu->nama_negara;
                $pasien['nama_negara'] = ($nama_negara == "") ? "Indonesia" : $nama_negara;
                $pasien['nama_provinsi'] = $ibu->nama_provinsi;
                $pasien['nama_kab_kota'] = $ibu->nama_kab_kota;
                $pasien['nama_kecamatan'] = $ibu->nama_kecamatan;
                $pasien['nama_kelurahan'] = $ibu->nama_kelurahan;
                $pasien['alamat'] = $ibu->alamat;
                $pasien['penanggung_jawab'] = $ibu->penanggung_jawab;
                $pasien['no_penanggung_jawab'] = $ibu->no_penanggung_jawab;
            }
            $pasien['no_bpjs'] = '0';
            $pasien['user_created'] = $this->session->userdata('get_uid');
            $pasien['session_id'] = getSessionID();
            // print_r($pasien); exit;
            $cekCommand = $this->db->insert('tbl01_pasien', $pasien);

            //Input data pendaftaran 
            $rg=$this->input->post('rawatgabung');
            if($rg) $rg=1; else $rg=0;
            $igd = $this->input->post('masukigd');
            if ($igd) $igd = 1;
            else $igd = 0;
            //Jika Masuk Dari Igd Insert Reservasi IGD
            if ($igd) {
                //Insert Kunjungan IGD
                $regigd['nomr']    = $nomr;
                $regigd['no_ktp']  = '0';
                $regigd['nama_pasien']     = trim($this->input->post('nama', TRUE));
                $regigd['tempat_lahir']    = trim($this->input->post('tempat_lahir', TRUE));
                $regigd['tgl_lahir']       = setDateEng(trim($this->input->post('tgl_lahir', TRUE)));
                $regigd['jns_kelamin']     = trim($this->input->post('jns_kelamin', TRUE));
                $regigd['nama_provinsi']   = $ibu->nama_provinsi;
                $regigd['nama_kab_kota']   = $ibu->nama_kab_kota;
                $regigd['nama_kecamatan']  = $ibu->nama_kecamatan;
                $regigd['nama_kelurahan']  = $ibu->nama_kelurahan;
                $regigd['jns_layanan']     = 'GD';
                $regigd['id_rujuk']        = 8;
                $regigd['rujukan']         = 'RAWAT INAP';
                $regigd['pjPasienNama']    = trim($this->input->post('pjPasienNama', TRUE));
                $regigd['pjPasienPekerjaan'] = trim($this->input->post('pjPasienPekerjaan', TRUE));
                $regigd['pjPasienAlamat']  = trim($this->input->post('pjPasienAlamat', TRUE));
                $regigd['pjPasienTelp']    = trim($this->input->post('pjPasienTelp', TRUE));
                $regigd['pjPasienHubKel']  = trim($this->input->post('pjPasienHubKel', TRUE));
                $regigd['pjPasienDikirimOleh']     = '';
                $regigd['pjPasienAlmtPengirim']    = '';
                $regigd['id_rujuk']    = 1;
                $regigd['rujukan']     = 'DATANG SENDIRI';
                $cb= getCaraBayarByID($this->input->post('id_cara_bayar'));
                if($cb) $cara_bayar=$cb->cara_bayar; else $cara_bayar="";
                $regigd['id_cara_bayar']    = $this->input->post('id_cara_bayar');
                $regigd['cara_bayar']     = $cara_bayar;
                $regigd['id_ruang']    = trim($this->input->post('ruang_pengirim', TRUE));
                $regigd['nama_ruang']  = getNamaRuangByID(trim($this->input->post('ruang_pengirim', TRUE)));;
                $regigd['dokterJaga']  = trim($this->input->post('dokter_pengirim', TRUE));
                $regigd['namaDokterJaga'] = getNamaUserByID(trim($this->input->post('dokter_pengirim', TRUE)));
                $regigd['no_rujuk'] = '';
                $regigd['no_bpjs'] = '0';
                $regigd['no_jaminan'] = '';
                $regigd['id_jenis_peserta']  = $ibu->id_jenis_peserta;
                $regigd['jenis_peserta']  = $ibu->jenis_peserta;
                $regigd['tgl_daftar'] = date('Y-m-d');
                $regigd['user_daftar'] = $this->session->userdata('get_uid');
                $regigd['session_id'] = getSessionID();
                $res_igd=$this->pendaftaran_model->insertPendaftaran($regigd);
                if($res_igd) {
                    $params['no_rujuk'] = $res_igd->reg_unit;
                    $params['id_daftar'] = $res_igd->id_daftar;
                }
            }

            $params['id_jenis_peserta'] = $ibu->id_cara_bayar;
            $params['jenis_peserta'] = $ibu->cara_bayar;
            //$params['id_daftar'] = trim($this->input->post('id_daftar', TRUE));
            $params['nomr'] = $pasien['nomr'];
            $params['no_ktp'] = '0';
            $params['nama_pasien'] = trim($this->input->post('nama', TRUE));
            $params['tempat_lahir'] = trim($this->input->post('tempat_lahir', TRUE));
            $params['tgl_lahir'] = setDateEng(trim($this->input->post('tgl_lahir', TRUE)));
            $params['jns_kelamin'] = trim($this->input->post('jns_kelamin', TRUE));
            $params['nama_provinsi'] = $ibu->nama_provinsi;
            $params['nama_kab_kota'] = $ibu->nama_kab_kota;
            $params['nama_kecamatan'] = $ibu->nama_kecamatan;
            $params['nama_kelurahan'] = $ibu->nama_kelurahan;
            $params['jns_layanan'] = 'RI';
            $params['id_rujuk'] = 8;
            $params['rujukan'] = 'RAWAT INAP';
            $params['pjPasienNama'] = trim($this->input->post('pjPasienNama', TRUE));
            $params['pjPasienPekerjaan'] = trim($this->input->post('pjPasienPekerjaan', TRUE));
            $params['pjPasienAlamat'] = trim($this->input->post('pjPasienAlamat', TRUE));
            $params['pjPasienTelp'] = trim($this->input->post('pjPasienTelp', TRUE));
            $params['pjPasienHubKel'] = trim($this->input->post('pjPasienHubKel', TRUE));
            $params['pjPasienDikirimOleh'] = '';
            $params['pjPasienAlmtPengirim'] = '';
            $params['id_cara_bayar'] = $ibu->id_cara_bayar;
            $params['cara_bayar'] = $ibu->cara_bayar;
            if($rg){
                //Jika Rawat Gabung
                if($igd){
                    $params['asal_ruang'] = trim($this->input->post('ruang_pengirim', TRUE));
                    $params['nama_asal_ruang'] = getNamaRuangByID(trim($this->input->post('ruang_pengirim', TRUE)));
                    $params['dokter_pengirim'] = trim($this->input->post('dokter_pengirim', TRUE));
                    $params['nama_dokter_pengirim'] = getNamaUserByID(trim($this->input->post('dokter_pengirim', TRUE)));
                    
                }
                $params['dokterJaga'] = $ibu->dokterJaga;
                $params['namaDokterJaga'] = $ibu->namaDokterJaga;
                $params['id_ruang'] = $ibu->id_ruang;
                $params['nama_ruang'] = $ibu->nama_ruang;
                $params['id_kamar'] = $ibu->id_kamar;
                $params['nama_kamar'] = $ibu->nama_kamar;
                $params['id_kelas'] = $ibu->id_kelas;
                $params['kelas_layanan'] = $ibu->kelas_layanan;
                
                $params['no_bpjs'] = '0';
                $params['rawatgabung'] = '1';
                $params['tgl_daftar'] = date('Y-m-d');
                $params['no_jaminan'] = '';
                $params['hakKelasid'] = $ibu->hakKelasid;
                $params['hakKelas'] = $ibu->hakKelas;
                $params['user_daftar'] = $this->session->userdata('get_uid');
                $params['reg_unitibu'] = $this->input->post('reg_unitibu');
                $params['session_id'] = getSessionID();
            }else{
                //Jika Bukan Rawat Gabung
                if ($igd) {
                    $params['asal_ruang'] = trim($this->input->post('ruang_pengirim', TRUE));
                    $params['nama_asal_ruang'] = getNamaRuangByID(trim($this->input->post('ruang_pengirim', TRUE)));
                    $params['dokter_pengirim'] = trim($this->input->post('dokter_pengirim', TRUE));
                    $params['nama_dokter_pengirim'] = getNamaUserByID(trim($this->input->post('dokter_pengirim', TRUE)));
                }

                $params['dokterJaga'] = $this->input->post('dokterJaga');
                $params['namaDokterJaga'] = getNamaUserByID($this->input->post('dokterJaga'));
                $params['id_ruang'] = $this->input->post('id_ruang');
                $params['nama_ruang'] = getNamaRuangByID($this->input->post('id_ruang'));
                $params['id_kamar'] = $this->input->post('id_kamar');
                $params['nama_kamar'] = getNamaKamarByID($this->input->post('id_kamar'));;
                $params['id_kelas'] = $this->input->post('id_kelas');
                $params['kelas_layanan'] = getKelasByID($this->input->post('id_kelas'));
                
                
                $params['no_jaminan'] = '';
                $params['hakKelasid'] = $ibu->hakKelasid;
                $params['hakKelas'] = $ibu->hakKelas;
                $params['user_daftar'] = $this->session->userdata('get_uid');
                $params['session_id'] = getSessionID();
            }
            $params['no_bpjs'] = '0';
            $params['tgl_daftar'] = date('Y-m-d');
            
            if ($pasien['nomr'] == "") {
                $response['code'] = 501;
                $response['message'] = "Ops. No.MR atau No Registrasi RS tidak boleh kosong!";
            } else {
                $this->db->where('nomr', $pasien['nomr']);
                $cekQuery = $this->db->get('tbl01_pasien');
                if ($cekQuery->num_rows() > 0) {
                    $SQL_CEREG = "SELECT * FROM tbl02_pendaftaran WHERE nomr = '$pasien[nomr]' 
                            AND DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d') 
                            AND id_ruang = '$params[id_ruang]' AND reg_unit NOT IN(SELECT reg_unit FROM tbl02_pendaftaran_batal)";
                    $cekRegis = $this->db->query("$SQL_CEREG");

                    if (
                        $cekRegis->num_rows() > 0
                    ) {
                        $response['code'] = 501;
                        $response['message'] = "Ops. Pasien telah terdaftar dengan tujuan layanan, pada hari yang sama!\nSilahkan periksa kembali tujuan layanan anda.";
                    } else {
                        //Insert Pendaftaran Rawat Inap
                        $reg = $this->pendaftaran_model->insertPendaftaran($params);
                        if ($reg) {
                            /*$this->db->from('tbl02_pendaftaran');
                            $this->db->where('session_id', session_id());
                            $this->db->order_by('idx', 'desc');
                            $this->db->limit(1);
                            $cekQuery = $this->db->get();
                            if ($cekQuery->num_rows() > 0) {
                                $resData = $cekQuery->row_array();
                                $response['code'] = 200;
                                $response['message'] = "Simpan data sukses.";
                                $response['unikID'] = encrypt_decrypt('encrypt', $resData['reg_unit'], true);
                            } else {
                                $response['code'] = 202;
                                $response['message'] = "Simpan data sukses namun cookies telah dihapus.";
                                $response['unikID'] = null;
                            }*/
                            $response['code'] = 200;
                            $response['message'] = "Simpan data sukses.";
                            $response['unikID'] = encrypt_decrypt('encrypt', $reg->reg_unit, true);
                        } else {
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                } else {
                    $response['code'] = 402;
                    $response['message'] = "Data pasien tidak ditemukan.";
                }
            }
        }else{
            $response['code'] = 201;
            $response['message'] = "Ops. Session Expired!";
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function sub(){
        $row=substr('abc',0,1);
        echo $row;
    }
}