<?php
defined('BASEPATH') or exit('No direct script access allowed');
class doc_element_penilaian extends CI_Controller
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
            $z = setNav("nav_5");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

            $y['contentTitle'] = "Dokumen Element Penilaian";
            $datUser = getUserById(getUID());
            if ($datUser['level'] == "administrator") {
                $y['datSARS'] = $this->db->get('tbl_sars');
            } else {
                $this->db->where('idx', $datUser['sars_id']);
                $y['datSARS'] = $this->db->get('tbl_sars');
            }
            $x['content'] = $this->load->view('doc_element_penilaian/template_table', $y, true);
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
        $sars_id = $this->input->post('sars_id', true);
        $ep_sars_id = $this->input->post('ep_sars_id', true);


        $condition = "WHERE sars_id = '$sars_id' AND ep_sars_id='$ep_sars_id' ";
        if (isset($_POST['sLike'])) {
            $sLike = $this->db->escape_str($this->input->post('sLike', true));
            $condition .= "AND ep_sars_item LIKE '%$sLike%'";
            $this->session->set_userdata('sLike', $sLike);
        }

        $SQL = "SELECT * FROM tbl_ep_sars_item $condition ORDER BY idx ASC";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('doc_element_penilaian/getdata', $x);
    }

    function tambah()
    {
        if (isAdminLogin()) {
            $idx = (isset($_GET['idx'])) ? $this->input->get('idx', true) : "";
            $sars_id = (isset($_GET['sars_id'])) ? $this->input->get('sars_id', true) : "";
            $ep_sars_id = (isset($_GET['ep_sars_id'])) ? $this->input->get('ep_sars_id', true) : "";
            $y = getEpSarsItemById($idx);
            if ($idx == "" && ($sars_id == "" || $ep_sars_id == "")) {
                echo "<script>alert('Ops. Data tidak ditemukan');
                window.history.back() 
                </script>";
            } elseif ($idx == "" && ($sars_id !== "" || $ep_sars_id !== "")) {
                $y['sars_id'] = $sars_id;
                $y['ep_sars_id'] = $ep_sars_id;
            }

            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_5");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['contentTitle'] = "Dokumen Element Penilaian";
            $x['content'] = $this->load->view('doc_element_penilaian/template_entry', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $url_login = base_url() . 'login';
            echo "<script>alert('Ops. Sesi anda telah berubah!\\nSilahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }

    function getElementPenilaian()
    {
        $sars_id = $this->input->post('sars_id', true);
        $this->db->where('sars_id', $sars_id);
        $this->db->order_by('idx', 'ASC');
        $query = $this->db->get('tbl_ep_sars');
        $data = array();
        foreach ($query->result_array() as $x) {
            $item_row['idx'] = (int)$x['idx'];
            $item_row['ep_sars'] = $x['ep_sars'];
            array_push($data, $item_row);
        }
        echo json_encode($data);
    }

    function simpan()
    {
        if (isAdminLogin()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['idx']) &&
                    isset($_POST['sars_id']) &&
                    isset($_POST['ep_sars_id']) &&
                    isset($_POST['ep_sars_item'])
                ) {

                    $params = array(
                        'idx' => trim($this->input->post('idx', true)),
                        'sars_id' => trim($this->input->post('sars_id', true)),
                        'ep_sars_id' => trim($this->input->post('ep_sars_id', true)),
                        'ep_sars_item' => trim($this->input->post('ep_sars_item', true))
                    );


                    if ($params['sars_id'] == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Standar Akreditasi RS belum dipilih.";
                    } elseif ($params['ep_sars_id'] == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Element Penilaian belum dipilih.";
                    } elseif ($params['ep_sars_item'] == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Point Element Penilaian tidak boleh kosong.";
                    } else {
                        if ($params['idx'] == "") {
                            $cekCommand = $this->db->insert('tbl_ep_sars_item', $params);
                            if ($cekCommand) {
                                $response['code'] = 200;
                                $response['message'] = "Simpan data sukses.";
                            } else {
                                $response['code'] = 403;
                                $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                            }
                        } else {
                            $this->db->where('idx', $params['idx']);
                            $cekCommand = $this->db->update('tbl_ep_sars_item', $params);
                            if ($cekCommand) {
                                $response['code'] = 201;
                                $response['message'] = "2014 - Update data sukses.";
                            } else {
                                $response['code'] = 406;
                                $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                            }
                        }
                    }
                } else {
                    $response['code'] = 408;
                    $response['message'] = "Ops. Ada variable tidak ditemukan.\nCoba ulangi kembali.";
                }
            } else {
                $response['code'] = 409;
                $response['message'] = "Ops. Method tidak diizinkan.\nCoba ulangi kembali.";
            }
        } else {
            $response['code'] = 410;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
        }
        echo json_encode($response);
    }

    function upload_dokumen()
    {
        if (isAdminLogin()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['idx']) &&
                    isset($_POST['jns_dokumen'])
                ) {
                    $ep_sars_item_idx = trim($this->input->post('idx', true));
                    $fileparams['jns_dokumen'] = trim($this->input->post('jns_dokumen', true));

                    if ($fileparams['jns_dokumen'] == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Jenis dokumen belum dipilih.";
                    } else {
                        $path = realpath(APPPATH . "../uploads");
                        $config['upload_path'] = $path;
                        $config['allowed_types'] = 'pdf';
                        $config['encrypt_name'] = true;
                        $this->load->library('upload', $config);
                        $files_upload = $_FILES['files_upload'];
                        if ($files_upload['name'] == "") {
                            $response['code'] = 401;
                            $response['message'] = "File tidak boleh kosong.";
                        } else {
                            if (!$this->upload->do_upload('files_upload')) {
                                $msg = $this->upload->display_errors();
                                $msg = str_ireplace('<p>', '', $msg);
                                $msg = str_ireplace('</p>', '', $msg);
                                $response['code'] = 400;
                                $response['message'] = "Ops. Ada kesalahan\n" . $msg;
                            } else {
                                $data = $this->upload->data();
                                $fileparams['ep_sars_item_idx'] = $ep_sars_item_idx;
                                $fileparams['files_upload'] = $data['file_name'];
                                $fileparams['tgl_upload'] = date('Y-m-d H:i:s');
                                $cekCommand = $this->db->insert('tbl_ep_sars_item_doc', $fileparams);

                                if ($cekCommand) {
                                    $response['code'] = 200;
                                    $response['message'] = "Upload dokumen sukses.";
                                } else {
                                    $response['code'] = 403;
                                    $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                                }
                            }
                        }
                    }
                } else {
                    $response['code'] = 408;
                    $response['message'] = "Ops. Ada variable tidak ditemukan.\nCoba ulangi kembali.";
                }
            } else {
                $response['code'] = 409;
                $response['message'] = "Ops. Method tidak diizinkan.\nCoba ulangi kembali.";
            }
        } else {
            $response['code'] = 410;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
        }
        echo json_encode($response);
    }

    function set_nilai()
    {
        if (isAdminLogin()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['idx']) &&
                    isset($_POST['nilai'])
                ) {

                    $params = array(
                        'idx' => trim($this->input->post('idx', true)),
                        'nilai' => trim($this->input->post('nilai', true))
                    );


                    if ($params['idx'] == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Point EP tidak dikenali. Silahkan coba lagi";
                    } elseif ($params['nilai'] == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Nilai EP belum dipilih.";
                    } else {
                        $this->db->where('idx', $params['idx']);
                        $cekCommand = $this->db->update('tbl_ep_sars_item', $params);
                        if ($cekCommand) {
                            $response['code'] = 200;
                            $response['message'] = "Set nilai sukses.";
                        } else {
                            $response['code'] = 403;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                        }
                    }
                } else {
                    $response['code'] = 408;
                    $response['message'] = "Ops. Ada variable tidak ditemukan.\nCoba ulangi kembali.";
                }
            } else {
                $response['code'] = 409;
                $response['message'] = "Ops. Method tidak diizinkan.\nCoba ulangi kembali.";
            }
        } else {
            $response['code'] = 410;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
        }
        echo json_encode($response);
    }


    function hapus()
    {
        if (isAdminLogin()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['idx'])) {
                    $idx = $this->input->post('idx', true);
                    if ($idx == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    } else {
                        $datFile = $this->db->query("SELECT files_upload FROM tbl_ep_sars_item_doc WHERE ep_sars_item_idx='$idx'");
                        foreach ($datFile->result_array() as $files) {
                            $files_delete = realpath(APPPATH . "../uploads/$files[files_upload]");
                            @unlink($files_delete);
                        }

                        $cekCommand = $this->db->query("DELETE FROM tbl_ep_sars_item WHERE idx = '$idx'");
                        if ($cekCommand) {
                            $this->db->query("DELETE FROM tbl_ep_sars_item_doc WHERE ep_sars_item_idx = '$idx'");
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
                $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
            }
        } else {
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

    function hapus_dokumen()
    {
        if (isAdminLogin()) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['idx'])) {
                    $idx = $this->input->post('idx', true);
                    if ($idx == "") {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Query empty! Coba ulangi kembali.";
                    } else {
                        $datFile = $this->db->query("SELECT files_upload FROM tbl_ep_sars_item_doc WHERE idx='$idx'");
                        foreach ($datFile->result_array() as $files) {
                            $files_delete = realpath(APPPATH . "../uploads/$files[files_upload]");
                            @unlink($files_delete);
                        }

                        $cekCommand = $this->db->query("DELETE FROM tbl_ep_sars_item_doc WHERE idx = '$idx'");
                        if ($cekCommand) {
                            $response['code'] = 200;
                            $response['message'] = "Hapus dokumen sukses.";
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
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah! Silahkan login kembali";
        }
        echo json_encode($response);
    }

    function doc_viewer()
    {
        $this->load->view('doc_element_penilaian/preview');
    }
}
