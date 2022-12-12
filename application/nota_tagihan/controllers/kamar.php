<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kamar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
    }

    function index()
    {
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');

        if (isAdminLogin()) {
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_6");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

            $y['contentTitle'] = "Kamar Rawat";
            $y['datRuang'] = $this->db->get('tbl_ruang');
            $y['datKelas'] = $this->db->get('tbl_kelas');
            $y['datSmf'] = $this->db->get('tbl_smf');
            $x['content'] = $this->load->view('kamar/template_table', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $url_login = base_url() . 'login';
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }

    function getView()
    {
        if (isset($_POST['page'])) :
            $offset = $this->input->post('page');
            $this->session->set_userdata('sPage', $offset);
        else :
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;

        $limit = $this->perPage;
        $condition = "";
        if (isset($_POST['sLike'])) {
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike', true));
            $condition .= "WHERE kamar_layanan LIKE '%$sLike%'";
            $this->session->set_userdata('sLike', $sLike);
        } else {
            if ($this->session->userdata('sLike')) {
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE kamar_layanan LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT * FROM tbl_kamar $condition ORDER BY idx";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target'] = 'tbody#getdata';
        $config['uri_segment'] = $this->uri_segment;
        $config['base_url'] = base_url() . 'kamar/getView';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('kamar/getdata', $x);
    }

    function simpan()
    {
        if (isAdminLogin()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['idx']) &&
                    isset($_POST['kamar_layanan']) &&
                    isset($_POST['ruang_id']) &&
                    isset($_POST['kelas_id']) &&
                    isset($_POST['smf_id']) 
                ) {
                    $params['idx'] = trim($this->input->post('idx', true));
                    $params['kamar_layanan'] = trim($this->input->post('kamar_layanan', true));
                    $params['ruang_id'] = trim($this->input->post('ruang_id', true));
                    $params['kelas_id'] = trim($this->input->post('kelas_id', true));
                    $params['smf_id'] = trim($this->input->post('smf_id', true));

                    if ($params['idx'] == "") {
                        $this->db->insert('tbl_kamar', $params);
                        if ($this->db->affected_rows() > 0) {
                            $response['code'] = 200;
                            $response['message'] = "Insert data sukses.";
                        } else {
                            $err = $this->db->error();
                            $response['code'] = 403;
                            $response['message'] = "Ops. Query error!\n" . $err['message'];
                        }                    
                    } else {
                        $this->db->where('idx', $params['idx']);
                        $cekCommand = $this->db->update('tbl_kamar', $params);
                        if ($cekCommand) {
                            $response['code'] = 201;
                            $response['message'] = "Update data sukses.";
                        } else {
                            $response['code'] = 401;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                } else {
                    $response['code'] = 401;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

    function hapus()
    {
        if (isAdminLogin()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['idx'])) {
                    $idx = $this->input->post('idx',true);
                    if ($idx == "") {
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    } else {
                        // $this->db->transStart();
                        // $this->db->transBegin();
                        $this->db->query("DELETE FROM tbl_tempat_tidur WHERE kamar_id = '$idx'");
                        $cmdQuery = $this->db->query("DELETE FROM tbl_kamar WHERE idx = '$idx'");
                        // $this->db->transComplete();
                        // if ($this->db->transStatus() === false) {
                        if ($cmdQuery) {
                            // $this->db->transRollback();
                            $response['code'] = 200;
                            $response['message'] = "Hapus data sukses.";
                        } else {
                            // $this->db->transCommit();
                            $response['code'] = 401;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                } else {
                    $response['code'] = 401;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

    function infoTT()
    {

        if (isAdminLogin()) {
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_6");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

            $y['contentTitle'] = "Info Tempat Tidur";
            $kamar_id = (isset($_GET['kode'])) ? $this->input->get('kode',true) : "";
            $y['datKamar'] = getKamarById($kamar_id);
            if ($y['datKamar']['idx']=="") {
                echo "<script>alert('Ops. Kamar tidak ditemukan.');
                window.history.back();</script>";
            }else {
                $x['content'] = $this->load->view('kamar/form_tt', $y, true);
                $this->load->view('template/theme', $x);
            }
        } else {
            $url_login = base_url() . 'login';
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }

    function getTt()
    {
        $kamar_id = (isset($_GET['kode'])) ? $this->input->get('kode',true) : "";
        $SQL = "SELECT * FROM tbl_tempat_tidur WHERE kamar_id='$kamar_id' ORDER BY idx";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('kamar/get_tt', $x);
    }

    function simpanTt()
    {
        if (isAdminLogin()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['idx']) &&
                    isset($_POST['kamar_id']) &&
                    isset($_POST['no_tt']) &&
                    isset($_POST['kondisi']) 
                ) {
                    $params['idx'] = trim($this->input->post('idx', true));
                    $params['kamar_id'] = trim($this->input->post('kamar_id', true));
                    $params['no_tt'] = trim($this->input->post('no_tt', true));
                    $params['kondisi'] = trim($this->input->post('kondisi', true));

                    if ($params['idx'] == "") {
                        $this->db->insert('tbl_tempat_tidur', $params);
                        if ($this->db->affected_rows() > 0) {
                            $response['code'] = 200;
                            $response['message'] = "Insert data sukses.";
                        } else {
                            $err = $this->db->error();
                            $response['code'] = 403;
                            $response['message'] = "Ops. Query error!\n" . $err['message'];
                        }                    
                    } else {
                        $this->db->where('idx', $params['idx']);
                        $cekCommand = $this->db->update('tbl_tempat_tidur', $params);
                        if ($cekCommand) {
                            $response['code'] = 201;
                            $response['message'] = "Update data sukses.";
                        } else {
                            $response['code'] = 401;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                } else {
                    $response['code'] = 401;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

    
    function hapusTt()
    {
        if (isAdminLogin()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['idx'])) {
                    $idx = $this->input->post('idx',true);
                    if ($idx == "") {
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    } else {
                        $cekCommand = $this->db->query("DELETE FROM tbl_tempat_tidur WHERE idx = '$idx'");
                        if ($cekCommand) {
                            $response['code'] = 200;
                            $response['message'] = "Hapus data sukses.";
                        } else {
                            $response['code'] = 501;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                } else {
                    $response['code'] = 401;
                    $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
                }
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

}
