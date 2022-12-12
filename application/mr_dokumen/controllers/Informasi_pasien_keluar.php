<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class informasi_pasien_keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
    }
    function index()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->session->unset_userdata('sPage');
            $this->session->unset_userdata('sLike');

            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_3");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['index_menu'] = 3;
            $y['contentTitle'] = "Lokasi Pelayanan";
            $NRP = $this->session->userdata('get_uid');
            $y['getRuang'] = $this->db->query("SELECT * FROM tbl01_ruang 
                WHERE grid IN(1,2,4) AND status_ruang=1 ORDER BY ruang");

            $x['content'] = $this->load->view('informasi_pasien_keluar/template_ruang', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $url_login = base_url() . 'mr_dokumen.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function data_informasi_pasien_keluar()
    {
        $ses_state = $this->users_model->cek_session_id();
        $y['index_menu'] = 3;
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if (isset($_GET['kLok'])) {
                    if ($_GET['kLok'] == "") {
                        echo "<script>alert('Ops. Lokasi Layanan tidak ditemukan.');history.back();</script>";
                    } else {
                        $y['ruangID'] = $_GET['kLok'];
                        $this->db->where('idx', $y['ruangID']);
                        $cekRecord = $this->db->get('tbl01_ruang');
                        if ($cekRecord->num_rows() > 0) {
                            $x['header'] = $this->load->view('template/header', '', true);
                            $z = setNav("nav_3");
                            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

                            $y['contentTitle'] = "Data Pasien Keluar";
                            $x['content'] = $this->load->view('informasi_pasien_keluar/template_table', $y, true);
                            $this->load->view('template/theme', $x);
                        } else {
                            echo "<script>alert('Ops. Lokasi Layanan tidak ditemukan.');history.back();</script>";
                        }
                    }
                } else {
                    echo "<script>alert('Ops. Variable tidak ditemukan.');history.back();</script>";
                }
            } else {
                echo "<script>alert('Ops. Mehtod tidak diizinkan.');history.back();</script>";
            }
        } else {
            $url_login = base_url() . 'mr_dokumen.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }

    function getView()
    {
        if (isset($_POST['ruangID'])) :
            $id_ruang = $this->input->post('ruangID', true);
        else :
            $id_ruang = 0;
        endif;

        if (isset($_POST['page'])) :
            $offset = $this->input->post('page');
            $this->session->set_userdata('sPage', $offset);
        else :
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;

        $limit = $this->perPage;
        $condition = "WHERE id_ruang = '$id_ruang' ";
        if (isset($_POST['sLike'])) {
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike', true));
            $condition .= "AND (nomr = '$sLike' OR id_daftar LIKE '%$sLike%' OR nama_pasien LIKE '%$sLike%')";
            $this->session->set_userdata('sLike', $sLike);
        } else {
            if ($this->session->userdata('sLike')) {
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (nomr = '$sLike' OR id_daftar LIKE '%$sLike%' OR nama_pasien LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT * FROM tbl07_report_sirs $condition ORDER BY idx DESC";

        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url() . 'nota_tagihan.php/informasi_pasien_keluar/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('informasi_pasien_keluar/getDataKunjunganUnit', $x);
    }

    public function tambah()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if (isset($_GET['kLok'])) {
                    if ($_GET['kLok'] == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Lokasi Layanan tidak ditemukan. Coba ulangi kembali.";
                    } else {
                        $x['header'] = $this->load->view('template/header', '', true);
                        $z = setNav("nav_3");
                        $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
                        $y['index_menu'] = 3;
                        $y['ruangID'] = $_GET['kLok'];
                        $y['contentTitle'] = "Data Pasien Keluar";

                        $this->db->where('dokter', 1);
                        $this->db->join('tbl01_dokter','tbl01_dokter.NRP=tbl01_pegawai.NRP');
                        $y['getDokter'] = $this->db->get('tbl01_pegawai');
                        $y['getCaraKeluar'] = $this->db->get('tbl01_cara_keluar');
                        $y['getKeadaanKeluar'] = $this->db->get('tbl01_keadaan_keluar');
                        $y['getCaraBayar'] = $this->db->get('tbl01_cara_bayar');
                        $y['getJenisPelayanan'] = $this->db->get('tbl01_jenis_pelayanan');

                        $x['content'] = $this->load->view('informasi_pasien_keluar/template_entry', $y, true);
                        $this->load->view('template/theme', $x);
                    }
                } else {
                    $response['code'] = 402;
                    $response['message'] = "Ops. Ada kesalahan permintaan {I-NA}. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 403;
                $response['message'] = "Ops. Ada kesalahan permintaan {RM-NA}. Coba ulangi kembali.";
            }
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'mr_dokumen.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }
    function getViewDataKunjunganPasien()
    {
        $id_ruang = $_POST['txtRuangID'];
        $nomor = $_POST['txtNomor'];
        $mode = $_POST['rbnomor'];

        $SQL = "SELECT a.*,b.idx AS PK_INDEX FROM tbl02_pendaftaran a 
        LEFT JOIN tbl07_report_sirs b ON a.reg_unit=b.reg_unit
        WHERE a.id_ruang = '$id_ruang' ";
        if ($mode == 'nomr') {
            $SQL .= "AND a.nomr = '$nomor'";
        } elseif ($mode == 'reg_rs') {
            $SQL .= "AND a.reg_unit = '$nomor'";
        } else {
            $SQL .= "AND a.id_daftar = '$nomor'";
        }
        $SQL .= "ORDER BY a.idx DESC";

        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('informasi_pasien_keluar/getDataKunjunganPasien', $x);
    }
    function getDataKunjunganPasien()
    {
        $reg_unit = $_POST['reg_unit'];
        $this->db->where('reg_unit', $reg_unit);
        $data = $this->db->get('tbl02_pendaftaran')->row_array();
        $data['umur'] = getUmur($data['tgl_lahir'], $data['tgl_masuk']);
        echo json_encode($data);
    }

    function getDTD()
    {
        if (isset($_POST['term'])) {
            $term = $_POST['term'];
            if (strlen($term) >= 1) {
                $SQL = "SELECT * FROM tbl01_morbiditas WHERE DTD LIKE '%$term%' OR Grup_ICD LIKE '%$term%'";
                $cari = $this->db->query("$SQL")->result();
                echo json_encode($cari);
            } else {
                echo "Minimal 2 Karakter";
            }
        } else {
            echo "Variable tidak diketahui";
        }
    }

    function simpan()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['id_daftar']) &&
                    isset($_POST['reg_unit']) &&
                    isset($_POST['nomr']) &&
                    isset($_POST['nama_pasien']) &&
                    isset($_POST['jns_kelamin']) &&
                    isset($_POST['tgl_lahir']) &&
                    isset($_POST['umur']) &&
                    isset($_POST['id_ruang']) &&
                    isset($_POST['nama_ruang']) &&
                    isset($_POST['los']) &&
                    isset($_POST['id_kelas']) &&
                    isset($_POST['kelas_layanan']) &&
                    isset($_POST['tgl_masuk']) &&
                    isset($_POST['tgl_keluar']) &&
                    isset($_POST['id_cara_keluar']) &&
                    isset($_POST['cara_keluar']) &&
                    isset($_POST['dpjp']) &&
                    isset($_POST['nama_dpjp']) &&
                    isset($_POST['id_keadaan_keluar']) &&
                    isset($_POST['keadaan_keluar']) &&
                    isset($_POST['kode_icd']) &&
                    isset($_POST['icd']) &&
                    isset($_POST['dtd']) &&
                    isset($_POST['grup_icd']) &&
                    isset($_POST['morbiditas']) &&
                    isset($_POST['kecelakaan']) &&
                    isset($_POST['jns_layanan']) &&
                    isset($_POST['jns_kunjungan']) &&
                    isset($_POST['kasus_penyakit']) &&
                    isset($_POST['id_cara_bayar']) &&
                    isset($_POST['cara_bayar']) &&
                    isset($_POST['no_bpjs']) &&
                    isset($_POST['no_jaminan']) &&
                    isset($_POST['id_tindakan_pelayanan']) &&
                    isset($_POST['tindakan_pelayanan'])
                ) {
                    $params = array(
                        'id_daftar' => $this->input->post('id_daftar', TRUE),
                        'reg_unit' => $this->input->post('reg_unit', TRUE),
                        'nomr' => $this->input->post('nomr', TRUE),
                        'nama_pasien' => $this->input->post('nama_pasien', TRUE),
                        'jns_kelamin' => $this->input->post('jns_kelamin', TRUE),
                        'tgl_lahir' => setDateEng($this->input->post('tgl_lahir', TRUE)),
                        'umur' => $this->input->post('umur', TRUE),
                        'id_ruang' => $this->input->post('id_ruang', TRUE),
                        'nama_ruang' => $this->input->post('nama_ruang', TRUE),
                        'los' => $this->input->post('los', TRUE),
                        'id_kelas' => $this->input->post('id_kelas', TRUE),
                        'kelas_layanan' => $this->input->post('kelas_layanan', TRUE),
                        'tgl_masuk' => setDateEng($this->input->post('tgl_masuk', TRUE)),
                        'tgl_keluar' => setDateEng($this->input->post('tgl_keluar', TRUE)),
                        'id_cara_keluar' => $this->input->post('id_cara_keluar', TRUE),
                        'cara_keluar' => $this->input->post('cara_keluar', TRUE),
                        'dpjp' => $this->input->post('dpjp', TRUE),
                        'nama_dpjp' => $this->input->post('nama_dpjp', TRUE),
                        'id_keadaan_keluar' => $this->input->post('id_keadaan_keluar', TRUE),
                        'keadaan_keluar' => $this->input->post('keadaan_keluar', TRUE),
                        'kode_icd' => $this->input->post('kode_icd', TRUE),
                        'icd' => $this->input->post('icd', TRUE),
                        'dtd' => $this->input->post('dtd', TRUE),
                        'grup_icd' => $this->input->post('grup_icd', TRUE),
                        'morbiditas' => $this->input->post('morbiditas', TRUE),
                        'kecelakaan' => $this->input->post('kecelakaan', TRUE),
                        'jns_layanan' => $this->input->post('jns_layanan', TRUE),
                        'jns_kunjungan' => $this->input->post('jns_kunjungan', TRUE),
                        'kasus_penyakit' => $this->input->post('kasus_penyakit', TRUE),
                        'id_cara_bayar' => $this->input->post('id_cara_bayar', TRUE),
                        'cara_bayar' => $this->input->post('cara_bayar', TRUE),
                        'no_bpjs' => $this->input->post('no_bpjs', TRUE),
                        'no_jaminan' => $this->input->post('no_jaminan', TRUE),
                        'id_tindakan_pelayanan' => $this->input->post('id_tindakan_pelayanan', TRUE),
                        'tindakan_pelayanan' => $this->input->post('tindakan_pelayanan', TRUE),
                        'user_exec' => $this->session->userdata('get_uid')
                    );
                    // header('Content-Type: application/json');
                    // echo json_encode($params); exit;
                    if (
                        $params['id_daftar'] == "" ||
                        $params['reg_unit'] == "" ||
                        $params['nomr'] == "" ||
                        $params['id_ruang'] == "" ||
                        $params['tgl_masuk'] == "" ||
                        $params['tgl_keluar'] == "" ||
                        $params['id_cara_keluar'] == "" ||
                        $params['dpjp'] == "" ||
                        $params['id_keadaan_keluar'] == ""
                    ) {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Data masih ada yang kosong!";
                    } else {
                        //Cek Pasien Pulang
                        $this->db->where('reg_unit', $params['reg_unit']);
                        $pul = $this->db->get('tbl02_pasien_pulang')->row();
                        if (empty($pul)) {
                            //Jika Pasien Belum Di Pulangkan/ Maka Insert Ke Data Pasien Pulang
                            $pulang = array(
                                'id_daftar' => $this->input->post('id_daftar', TRUE),
                                'reg_unit' => $this->input->post('reg_unit', TRUE),
                                'nomr' => $this->input->post('nomr', TRUE),
                                'nama_pasien' => $this->input->post('nama_pasien', TRUE),
                                'jns_kelamin' => $this->input->post('jns_kelamin', TRUE),
                                'tgl_lahir' => setDateEng($this->input->post('tgl_lahir', TRUE)),
                                'umur' => $this->input->post('umur', TRUE),
                                'id_ruang' => $this->input->post('id_ruang', TRUE),
                                'nama_ruang' => $this->input->post('nama_ruang', TRUE),
                                'los' => $this->input->post('los', TRUE),
                                'id_kelas' => $this->input->post('id_kelas', TRUE),
                                'kelas_layanan' => $this->input->post('kelas_layanan', TRUE),
                                'tgl_masuk' => setDateEng($this->input->post('tgl_masuk', TRUE)),
                                'tgl_keluar' => setDateEng($this->input->post('tgl_keluar', TRUE)),
                                'id_cara_keluar' => $this->input->post('id_cara_keluar', TRUE),
                                'cara_keluar' => $this->input->post('cara_keluar', TRUE),
                                'dpjp' => $this->input->post('dpjp', TRUE),
                                'nama_dpjp' => $this->input->post('nama_dpjp', TRUE),
                                'id_keadaan_keluar' => $this->input->post(
                                    'id_keadaan_keluar',
                                    TRUE
                                ),
                                'keadaan_keluar' => $this->input->post('keadaan_keluar', TRUE),
                                'jns_layanan' => $this->input->post('jns_layanan', TRUE),
                                'jns_kunjungan' => $this->input->post('jns_kunjungan', TRUE),
                                'kasus_penyakit' => $this->input->post('kasus_penyakit', TRUE),
                                'id_cara_bayar' => $this->input->post('id_cara_bayar', TRUE),
                                'cara_bayar' => $this->input->post('cara_bayar', TRUE),
                                'no_bpjs' => $this->input->post('no_bpjs', TRUE),
                                'no_jaminan' => $this->input->post('no_jaminan', TRUE),
                                'id_tindakan_pelayanan' => $this->input->post('id_tindakan_pelayanan', TRUE),
                                'tindakan_pelayanan' => $this->input->post('tindakan_pelayanan', TRUE),
                                'user_exec' => $this->session->userdata('get_uid')
                            );
                            $this->db->insert('tbl02_pasien_pulang', $pulang);
                        }
                        //exit;
                        $cekCommand = $this->db->insert('tbl07_report_sirs', $params);
                        //Input Data ICD Diagnosa Sekunder
                        $icd_sec = $this->input->post('icd_sec');
                        $diagnosa[] = array(
                            'id_daftar' => $params['id_daftar'],
                            'reg_unit'  => $params['reg_unit'],
                            'kode_icd'  => $this->input->post('kode_icd', TRUE),
                            'icd'       => $this->input->post('icd', TRUE),
                            'jenis_diagnosa' => 'Primer'
                        );
                        $ada = $this->input->post('ada');
                        if (!$ada) {
                            $new_icd[] = array(
                                'kode_icd'  => $this->input->post('kode_icd', TRUE),
                                'icd'       => $this->input->post('icd', TRUE)
                            );
                        }
                        if(!empty($icd_sec)){
                            foreach ($icd_sec as $icd) {
                                $diagnosa[] = array(
                                    'id_daftar' => $params['id_daftar'],
                                    'reg_unit'  => $params['reg_unit'],
                                    'kode_icd'  => $icd["kode"],
                                    'icd'       => $icd["icd"],
                                    'jenis_diagnosa' => 'Sekunder'
                                );
                                if (!$icd["ada"]) {
                                    $new_icd[] = array(
                                        'kode_icd'  => $icd["kode"],
                                        'icd'       => $icd["icd"]
                                    );
                                }
                            }
                        }
                        
                        if (!empty($diagnosa)) $this->db->insert_batch('tbl07_report_sirs_diagnosa', $diagnosa);
                        if (!empty($new_icd)) $this->db->insert_batch('tbl01_icd', $new_icd);

                        if ($cekCommand) {
                            $response['code'] = 200;
                            $response['message'] = "Data pasien keluar sukses disimpan.";
                        } else {
                            $response['code'] = 402;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                } else {
                    $response['code'] = 403;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 404;
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 405;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

    function batalPulang()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['idx'])) {
                    if ($_POST['idx'] == "") {
                        $response['code'] = 501;
                        $response['message'] = "Ops. Kode tidak boleh kosong!";
                    } else {
                        $this->db->where('idx', $_POST['idx']);
                        $cekCommand = $this->db->delete('tbl07_report_sirs');
                        if ($cekCommand) {
                            $response['code'] = 200;
                            $response['message'] = "Pasien sukses batal dipulangkan.";
                        } else {
                            $response['code'] = 502;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                } else {
                    $response['code'] = 503;
                    $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 504;
                $response['message'] = "Ops. Ada kesalahan permintaan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 505;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
}
