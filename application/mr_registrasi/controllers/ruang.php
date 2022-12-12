<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ruang extends CI_Controller
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
            $z = setNav("nav_5");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

            $y['contentTitle'] = "Ruang Pelayanan";
            $x['content'] = $this->load->view('ruang/template_table', $y, true);
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
            $condition .= "WHERE ruang_layanan LIKE '%$sLike%'";
            $this->session->set_userdata('sLike', $sLike);
        } else {
            if ($this->session->userdata('sLike')) {
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE ruang_layanan LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT * FROM tbl_ruang $condition ORDER BY idx";
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target'] = 'tbody#getdata';
        $config['uri_segment'] = $this->uri_segment;
        $config['base_url'] = base_url() . 'ruang/getView';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('ruang/getdata', $x);
    }

    function simpan()
    {
        if (isAdminLogin()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['idx']) &&
                    isset($_POST['ruang_layanan'])
                ) {
                    $params['idx'] = trim($this->input->post('idx', true));
                    $params['ruang_layanan'] = trim($this->input->post('ruang_layanan', true));

                    if ($params['idx'] == "") {
                        $this->db->insert('tbl_ruang', $params);
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
                        $cekCommand = $this->db->update('tbl_ruang', $params);
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
                    if ($_POST['idx'] == "") {
                        $response['code'] = 501;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    } else {
                        $cekCommand = $this->db->query("DELETE FROM tbl_ruang WHERE idx = '$_POST[idx]'");
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
