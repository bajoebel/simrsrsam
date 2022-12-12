<?php
defined('BASEPATH') or exit('No direct script access allowed');
class kwitansi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
        $this->load->model('kwitansi_model');
    }
    public function index()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $y['index_menu'] = 3;
            $this->session->unset_userdata('sLike');
            $this->session->unset_userdata('sPage');
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_7");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['contentTitle'] = "Kwitansi";
            $x['content'] = $this->load->view('kwitansi/template_table', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $url_login = base_url() . 'kasir.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }

    function riwayat_kunjungan()
    {
        $ses_state = $this->users_model->cek_session_id();
        $start = intval($this->input->get("start"));
        $limit = intval($this->input->get("limit"));
        $status = intval($this->input->get("status"));
        $q = $this->input->get("q");
        $jns_layanan = $this->input->get('jns');
        //echo $jns_layanan; exit;
        if ($ses_state) {
            $mulai = ($start * $limit) - $limit;
            $row_count = $this->kwitansi_model->countRiwayatKunjungan($q, $jns_layanan, $status);
            $data = $this->kwitansi_model->getRiwayatKunjungan($limit, $mulai, $q, $jns_layanan, $status);

            $response = array(
                'status'    => true,
                'message'   => "OK",
                'start'     => $start,
                'row_count' => $row_count,
                'limit'     => $limit,
                'data'      => $data,
            );
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }

    function cek_kwitansi($id_daftar)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->where('id_daftar', $id_daftar);
            $data = $this->db->get('tbl05_kwitansi')->num_rows();
        } else {
            $data = 0;
        }
        header('Content-Type:application/json');
        echo json_encode($data);
    }

    function detail($reg_unit)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $z = setNav("nav_7");
            $x['index_menu'] = 3;
            $detail = $this->kwitansi_model->getKunjungan($reg_unit);
            $tgl_masuk = $this->kwitansi_model->getTglMasuk($detail->id_daftar, $detail->jns_layanan);
            if ($detail->jns_layanan == 'RI') $diagnosa = $this->kwitansi_model->getDiagnosaAkhir($detail->id_daftar);
            else $diagnosa = $this->kwitansi_model->getDiagnisa($detail->reg_unit);
            $data = array(
                'header'        => $this->load->view('template/header', '', true),
                'nav_sidebar'   => $this->load->view('template/nav_sidebar', $z, true),
                'contentTitle'  => "Detail Kwitansi",
                'dokter'        => $this->kwitansi_model->getDokter(),
                'carabayar'     => $this->kwitansi_model->getCarabayar(),
                'diagnosa_akhir' => $diagnosa,
                'cek_nota'      => $this->kwitansi_model->cekNota($detail->id_daftar),
                'kwitansi'      => $this->kwitansi_model->getKwitansi($detail->id_daftar),
                'detail'        => $detail,
                'tgl_masuk'     => $tgl_masuk
            );
            $x['content'] = $this->load->view('kwitansi/template_detail', $data, true);
            $this->load->view('template/theme', $x);
        } else {
            $url_login = base_url() . 'kasir.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function selisih_bayar($no_kwitansi)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->where('no_kwitansi', $no_kwitansi);
            $x = $this->db->get('tbl05_kwitansi')->row_array();
            $this->load->view('kwitansi/invoice_selisih_bayar', $x);
        } else {
            $url_login = base_url() . 'kasir.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }

    function umum($kode)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($kode == "") {
                echo "<script>alert('Ops. No. Invoice tidak boleh kosong');
                    window.close();</script>";
            } else {
                $this->db->where('no_kwitansi', $kode);
                $cek = $this->db->get('tbl05_kwitansi');
                if ($cek->num_rows() > 0) {
                    $x = $cek->row_array();
                    $this->db->select('*,SUM(jml_item) as jml_item, SUM(sub_total_item) as sub_total_item');
                    $this->db->where('no_kwitansi', $kode);
                    $this->db->group_by('kode_item_detail');
                    $this->db->order_by('kode_item');
                    $x['datDetail'] = $this->db->get('tbl05_kwitansi_detail_item');
                    $this->load->view('kwitansi/invoice_v2', $x);
                } else {
                    echo "<script>alert('Ops. No. Invoice $kode tidak ditemukan');
                        window.close();</script>";
                }
            }
        } else {
            $url_login = base_url() . 'kasir.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function jkn($kode)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($kode == "") {
                echo "<script>alert('Ops. No. Invoice tidak boleh kosong');
                    window.close();</script>";
            } else {
                $this->db->where('no_kwitansi', $kode);
                $cek = $this->db->get('tbl05_kwitansi');
                if ($cek->num_rows() > 0) {
                    $x = $cek->row_array();

                    $qItem = "SELECT a.*,IFNULL(SUM(b.sub_total_item),0) AS sub_total 
                        FROM tbl01_kategori_tarif a LEFT JOIN 
                        (SELECT * FROM tbl05_kwitansi_detail_item WHERE no_kwitansi='$kode') b 
                        ON a.idx=b.kategori_id GROUP BY a.idx ORDER BY a.idx ASC";
                    $x['datDetail'] = $this->db->query("$qItem");
                    $this->load->view('kwitansi/invoice_jkn', $x);
                } else {
                    echo "<script>alert('Ops. No. Invoice $kode tidak ditemukan');
                        window.close();</script>";
                }
            }
        } else {
            $url_login = base_url() . 'kasir.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }

    function data_tagihan($id_daftar)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $nota = $this->kwitansi_model->getNota($id_daftar);
            $obat = $this->kwitansi_model->getFarmasi($id_daftar);
            $response = array(
                'status'    => true,
                'message'   => "OK",
                'nota'      => $nota,
                'obat'      => $obat
            );
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali");
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    function simpan_kwitansi()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {

            $id_daftar = $this->input->post('id_daftar');
            $cek = $this->kwitansi_model->cekTransaksi($id_daftar);
            $unfinish = $cek->unfinish_transaksi;
            $jmlresep = $cek->pakai_resep;
            if ($jmlresep > 0) {
                $diambil = $this->kwitansi_model->cekTransaksiFarmasi($id_daftar);
                $sisa_resep = $jmlresep - $diambil;
                $unfinish += $sisa_resep;
            }

            if ($unfinish > 0) {
                $response = array('status' => false, 'message' => "Maaf Transaksi yang terkait dengan kunjungan ini belum lengkap", 'lihat_transaksi' => 1, 'id_daftar' => $id_daftar, 'unfinish' => $unfinish);
            } else {
                $status_bayar = $this->input->post('status_bayar');
                if ($status_bayar == 1) $status_bayar = 1;
                else $status_bayar = 0;
                $kwitansi = array(
                    'id_daftar' => $this->input->post('id_daftar'),
                    'nomr' => $this->input->post('nomr'),
                    'nama_pasien' => $this->input->post('nama_pasien'),
                    'jns_kelamin' => $this->input->post('jns_kelamin'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'umur' => $this->input->post('umur'),
                    'id_cara_bayar' => $this->input->post('id_cara_bayar'),
                    'cara_bayar' => $this->input->post('cara_bayar'),
                    'no_bpjs'   => $this->input->post('no_bpjs'),
                    'no_sep'    => $this->input->post('no_sep'),
                    'tgl_masuk' => $this->input->post('tgl_masuk'),
                    'tgl_keluar' => $this->input->post('tgl_keluar'),
                    'dpjp'      => $this->input->post('dpjp'),
                    'nama_dpjp' => $this->input->post('nama_dpjp'),
                    'total_tagihan' => $this->input->post('total_tagihan'),
                    'biaya_lainnya' => 0,
                    'grand_total' => $this->input->post('total_tagihan'),
                    'tarif_bpjs' => $this->input->post('tarif_bpjs'),
                    'tarif_selisih_bayar' => $this->input->post('tarif_selisih_bayar'),
                    'status_pembayaran'  => $status_bayar,
                    'userExec' => getUserID(),
                    'session_id' => getSessionID()
                );
                $no_kwitansi = $this->kwitansi_model->insertKwitansi($kwitansi);
                $nomor = $this->input->post('nomor');
                //Simpan Detail
                $data_detail = $this->kwitansi_model->insertNotaDetail($id_daftar, $no_kwitansi);
                $data_farmasi = $this->kwitansi_model->insertFarmasiDetail($id_daftar, $no_kwitansi);
                $response = array('status' => true, 'message' => "Kwitansi Berhasil Dibuat", 'kwitansi' => $kwitansi, 'detail' => $data_detail, 'farmasi' => $data_farmasi);
            }
        } else {
            $response = array('status' => false, 'message' => "Ops. Sesi anda telah berubah! Silahkan login kembali", 'lihat_transaksi' => 0);
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function carabayar($id)
    {
        $this->db->where('idx', $id);
        $res = $this->db->get('tbl01_cara_bayar')->row();
        if (empty($res)) {
            $response = array('status' => false, 'message' => 'Data Tidak Ditemukan');
        } else {
            $response = array('status' => true, 'message' => 'OK', 'data' => $res);
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function getdpjp($id)
    {
        //$this->db->where('idx', $id);
        //$res=$this->db->get('tbl01_cara_bayar')->row();
        $res = $this->kwitansi_model->getDoker($id);
        if (empty($res)) {
            $response = array('status' => false, 'message' => 'Data Tidak Ditemukan');
        } else {
            $response = array('status' => true, 'message' => 'OK', 'data' => $res);
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function gettransaksi($id_daftar)
    {
        $res = $this->kwitansi_model->getTransaksi($id_daftar);
        if (empty($res)) {
            $response = array('status' => false, 'message' => 'Data Tidak Ditemukan');
        } else {
            $response = array('status' => true, 'message' => 'OK', 'data' => $res);
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function cekfarmasi($reg_unit)
    {
        $res = $this->kwitansi_model->cekfarmasi($reg_unit);
        $response = array('status' => true, 'message' => 'OK', 'data' => $res);
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
