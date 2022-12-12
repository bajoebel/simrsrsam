<?php
defined('BASEPATH') or exit('No direct script access allowed');
class element_penilaian extends CI_Controller
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
        if (isAdminLogin()) {
            $this->session->unset_userdata('sPage');
            $this->session->unset_userdata('sLike');

            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_4");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

            $y['contentTitle'] = "Element Penilaian Akreditas RS";

            $x['content'] = $this->load->view('element_penilaian/template_table', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $url_login = base_url() . 'login';
            echo "<script>alert('Ops. Sesi anda telah berubah!\\nSilahkan login kembali');
            window.location.href = '$url_login'
            </script>";
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
            $condition .= "WHERE ep_sars LIKE '%$sLike%' OR sars LIKE '%$sLike%'";
            $this->session->set_userdata('sLike', $sLike);
        } else {
            if ($this->session->userdata('sLike')) {
                $sLike = $this->session->userdata('sLike');
                $condition .= "WHERE ep_sars LIKE '%$sLike%' OR sars LIKE '%$sLike%'";
            }
        }

        $SQL = "SELECT a.*,sars FROM tbl_ep_sars a LEFT JOIN tbl_sars b ON a.sars_id=b.idx $condition 
        ORDER BY a.sars_id,a.idx ASC";

        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target'] = 'tbody#getdata';
        $config['uri_segment'] = $this->uri_segment;
        $config['base_url'] = base_url() . 'element_penilaian/getView';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        $this->load->view('element_penilaian/getdata', $x);
    }

    function tambah()
    {
        if (isAdminLogin()) {
            $idx = trim($this->input->get('idx', true));
            $y['row'] = getEpSarsById($idx);

            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_4");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

            $y['contentTitle'] = "Data Element Penilaian";

            $x['content'] = $this->load->view('element_penilaian/template_entry', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            echo "<script>alert('Session anda telah habis. Silahkan login kembali');history.back()</script>";
        }
    }

    function simpan()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (
                isset($_POST['idx']) &&
                isset($_POST['ep_sars']) &&
                isset($_POST['sars_id'])
            ) {
                $params = array(
                    'idx' => trim($this->input->post('idx', true)),
                    'ep_sars' => trim($this->input->post('ep_sars', true)),
                    'sars_id' => trim($this->input->post('sars_id', true))
                );

                if ($params['ep_sars'] == "") {
                    $response['code'] = 402;
                    $response['message'] = "Element penilaian tidak boleh kosong";
                } elseif ($params['sars_id'] == "") {
                    $response['code'] = 405;
                    $response['message'] = "Standar akreditas rs harus dipilih";
                } else {
                    if ($params['idx'] == "") {
                        $cekCommand = $this->db->insert('tbl_ep_sars', $params);
                        if ($cekCommand) {
                            $response['code'] = 200;
                            $response['message'] = "Simpan data pelatihan sukses.";
                        } else {
                            $response['code'] = 409;
                            $response['message'] = "Ops. Data tidak dapat disimpan. Coba ulangi lagi";
                        }
                    } else {
                        $this->db->where('idx', $params['idx']);
                        $cekCommand = $this->db->update('tbl_ep_sars', $params);
                        if ($cekCommand) {
                            $response['code'] = 201;
                            $response['message'] = "Update data pelatihan sukses.";
                        } else {
                            $response['code'] = 409;
                            $response['message'] = "Ops. Data tidak dapat disimpan. Coba ulangi lagi";
                        }
                    }
                }
            } else {
                $response['code'] = 411;
                $response['message'] = "Variable tidak ditemukan";
            }
        } else {
            $response['code'] = 412;
            $response['message'] = "Method tidak diizinkan";
        }
        echo json_encode($response);
    }

    function hapus()
    {
        if (isAdminLogin()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['idx'])) {
                    $idx = $this->input->post('idx', TRUE);
                    if ($idx == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    } else {
                        $cekCommand = $this->db->query("DELETE FROM tbl_ep_sars WHERE idx = '$idx'");
                        if ($cekCommand) {
                            $response['code'] = 200;
                            $response['message'] = "Hapus data sukses.";
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
                $response['message'] = "Ops. Method tidak ditemukan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 405;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }
}
