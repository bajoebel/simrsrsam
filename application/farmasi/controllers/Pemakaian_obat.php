<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemakaian_obat extends CI_Controller
{
    //

    function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('pemakaian_model');
    }

    function index()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $y['index_menu'] = 7;
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_7");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['contentTitle'] = "Dashboard";
            $x['content'] = $this->load->view('pemakaian/view_list_pasien', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $url_login = base_url() . 'farmasi.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
                window.location.href = '$url_login';</script>";
        }
    }
    function detail($reg_unit)
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $z = setNav("nav_7");
            $ruang = $this->pemakaian_model->getRuangAkses($this->session->userdata('kdlokasi'), 1);
            if (!empty($ruang)) {
                $data = array(
                    'contentTitle'  => "Detail Pasien",
                    'detail'        => $this->pemakaian_model->getKunjungan($reg_unit),
                    'ruangAkses'    => $ruang,
                    'histori'       => $this->pemakaian_model->getHistori($reg_unit)
                );

                $theme = array(
                    'header'        => $this->load->view('template/header', '', true),
                    'nav_sidebar'   => $this->load->view('template/nav_sidebar', $z, true),
                    'content'       => $this->load->view('pemakaian/view_detail_pasien', $data, true),
                    'index_menu'    => 7
                );
                $this->load->view('template/theme', $theme); 
            } else {
                header("location:" . base_url() . "farmasi.php/pemakaian_obat");
            }
        } else {
            $url_login = base_url() . 'farmasi.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
                window.location.href = '$url_login';</script>";
        }
    }
    function bebas(){
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $y['index_menu'] = 7;
            $y["ruangAkses"] = $this->pemakaian_model->getRuangAkses($this->session->userdata('kdlokasi'), 1);
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_7");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['contentTitle'] = "Dashboard";
            $x['content'] = $this->load->view('pemakaian/form_penjualan_bebas', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $url_login = base_url() . 'farmasi.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
                window.location.href = '$url_login';</script>";
        }
    }
    function dokter()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $keyword = $this->input->post('param1');
            $data = $this->pemakaian_model->getDokter($keyword);
            $response = array('status' => true, 'message' => 'OK', 'data' => $data);
        } else {
            $response = array('status' => false, 'message' => 'Data Tidak Ditemukan');
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    function pegawai()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $keyword = $this->input->post('param1');
            $data = $this->pemakaian_model->getPegawai($keyword);
            $response = array('status' => true, 'message' => 'OK', 'data' => $data);
        } else {
            $response = array('status' => false, 'message' => 'Data Tidak Ditemukan');
        }
        header('Content-Type:application/json');
        echo json_encode($response);
    }
    //Data Json
    function riwayat_kunjungan()
    {
        $ses_state = $this->users_model->cek_session_id();
        $start = intval($this->input->get("start"));
        $limit = intval($this->input->get("limit"));
        $q = $this->input->get("q");
        $jns_layanan = $this->input->get('jns');
        //echo $jns_layanan; exit;
        if ($ses_state) {
            $mulai = ($start * $limit) - $limit;
            $row_count = $this->pemakaian_model->countRiwayatKunjungan($q, $jns_layanan);
            $data = $this->pemakaian_model->getRiwayatKunjungan($limit, $mulai, $q, $jns_layanan);

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

    function simpanTemp()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['KDBRG']) &&
                    isset($_POST['NMBRG']) &&
                    isset($_POST['JSTOK']) &&
                    isset($_POST['HJUAL']) &&
                    isset($_POST['JMLJUAL']) &&
                    isset($_POST['DISKON']) &&
                    isset($_POST['R']) &&
                    isset($_POST['SUBTOTAL']) &&
                    isset($_POST['AP'])
                ) {

                    $params = array(
                        'KDBRG'     => trim($this->input->post('KDBRG', true)),
                        'NMBRG' => trim($this->input->post('NMBRG', true)),
                        'JSTOK' => str_replace(",", "", trim($this->input->post('JSTOK', true))),
                        'HJUAL' => str_replace(",", "", trim($this->input->post('HJUAL', true))),
                        'JMLJUAL' => str_replace(",", "", trim($this->input->post('JMLJUAL', true))),
                        'DISKON' => str_replace(",", "", trim($this->input->post('DISKON', true))),
                        'R' => str_replace(",", "", trim($this->input->post('R', true))),
                        'SUBTOTAL' => str_replace(",", "", trim($this->input->post('SUBTOTAL', true))),
                        'JNS_RESEP' => trim($this->input->post('JNS_RESEP', true)),
                        'AP' => trim($this->input->post('AP', true)),
                        'AP_JENISOBAT' => trim($this->input->post('AP_JENISOBAT', true)),
                        'AP_JMLHARI' => trim($this->input->post('AP_JMLHARI', true)),
                        'AP_JMLSATUAN' => trim($this->input->post('AP_JMLSATUAN', true)),
                        'AP_SATUAN' => trim($this->input->post('AP_SATUAN', true)),
                        'AP_CARAPAKAI' => trim($this->input->post('AP_CARAPAKAI', true)),
                        'AP_WAKTUJML' => trim($this->input->post('AP_WAKTUJML', true)),
                        'AP_WAKTUPAKAI' => trim($this->input->post('AP_WAKTUPAKAI', true)),
                        'AP_WAKTUKET' => trim($this->input->post('AP_WAKTUKET', true)),
                        'AP_KET' => trim($this->input->post('AP_KET', true)),
                        'UEXEC' => getUserID()
                    );

                    if (
                        $params['KDBRG'] == "" ||
                        $params['NMBRG'] == "" ||
                        $params['JSTOK'] == "" ||
                        $params['HJUAL'] == "" ||
                        $params['JMLJUAL'] == "" ||
                        $params['R'] == "" ||
                        $params['SUBTOTAL'] == ""
                    ) {
                        $x['code'] = 401;
                        $x['message'] = "Ops. Masih ada data yang kosong. Silahkan lengkapi data.";
                    } elseif ($params['JMLJUAL'] > $params['JSTOK']) {
                        $x['code'] = 402;
                        $x['message'] = "Ops. Jumlah jual tidak boleh lebih besar dari jumlah stok.";
                    } else {
                        if ($params["JNS_RESEP"] == "Resep Harian") {
                            //$jns_obat = trim($this->input->post('jns_obat', true));

                            $SBM_PAGI = str_replace(",", "", trim($this->input->post("SBM_PAGI")));
                            $SBM_SIANG = str_replace(",", "", trim($this->input->post("SBM_SIANG")));
                            $SBM_MALAM = str_replace(",", "", trim($this->input->post("SBM_MALAM")));
                            $STM_PAGI = str_replace(",", "", trim($this->input->post("STM_PAGI")));
                            $STM_SIANG = str_replace(",", "", trim($this->input->post("STM_SIANG")));
                            $STM_MALAM = str_replace(",", "", trim($this->input->post("STM_MALAM")));
                            $MALAM = str_replace(",", "", trim($this->input->post("MALAM")));
                            $DISKON = str_replace(",", "", trim($this->input->post('DISKON', true)));
                            $MANDIRI = str_replace(",", "", trim($this->input->post("MANDIRI")));
                            $INJEKSI = str_replace(",", "", trim($this->input->post('INJEKSI', true)));
                            $AP_MANDIRI = trim($this->input->post("AP_MANDIRI"));
                            $AP_INJEKSI = trim($this->input->post("AP_INJEKSI"));
                            $JMLJUAL = str_replace(",", "", trim($this->input->post('JMLJUAL', true)));
                            $SUBTOTAL = str_replace(",", "", trim($this->input->post('SUBTOTAL', true)));

                            $ARR_AP = array(
                                array('AP' => 'Sebelum Makan Pagi', 'JML' => $SBM_PAGI),
                                array('AP' => 'Sebelum Makan Siang', 'JML' => $SBM_SIANG),
                                array('AP' => 'Sebelum Makan Malam', 'JML' => $SBM_MALAM),
                                array('AP' => 'Setelah Makan Pagi', 'JML' => $STM_PAGI),
                                array('AP' => 'Setelah Makan Siang', 'JML' => $STM_SIANG),
                                array('AP' => 'Setelah Makan Malam', 'JML' => $STM_MALAM),
                                array('AP' => 'Malam Jam 22:00', 'JML' => $MALAM),
                                array('AP' => $AP_MANDIRI, 'JML' => $MANDIRI),
                                array('AP' => $AP_INJEKSI, 'JML' => $INJEKSI)
                            );
                            foreach ($ARR_AP as $a) {
                                if ($a["JML"] > 0) {
                                    $SUB = $a["JML"] / $JMLJUAL * $SUBTOTAL;
                                    $DISC = $a["JML"] / $JMLJUAL * $DISKON;
                                    $batch[] = array(
                                        'KDBRG'     => trim($this->input->post('KDBRG', true)),
                                        'NMBRG' => trim($this->input->post('NMBRG', true)),
                                        'JSTOK' => str_replace(",", "", trim($this->input->post('JSTOK', true))),
                                        'HJUAL' => str_replace(",", "", trim($this->input->post('HJUAL', true))),
                                        'JMLJUAL' => $a["JML"],
                                        'DISKON' => $DISC,
                                        'R' => str_replace(",", "", trim($this->input->post('R', true))),
                                        'SUBTOTAL' => $SUB,
                                        'JNS_RESEP' => trim($this->input->post('JNS_RESEP', true)),
                                        'AP' =>  $a["AP"],
                                        'AP_JENISOBAT' => "",
                                        'AP_JMLHARI' => "",
                                        'AP_JMLSATUAN' => "",
                                        'AP_SATUAN' => trim($this->input->post('AP_SATUAN', true)),
                                        'AP_CARAPAKAI' => "",
                                        'AP_WAKTUJML' => "",
                                        'AP_WAKTUPAKAI' => "",
                                        'AP_WAKTUKET' => "",
                                        'AP_KET' => "",
                                        'UEXEC' => getUserID()
                                    );
                                }
                            }
                            if (empty($batch)) {
                                $x['code'] = 400;
                                $x['message'] = 'Barang Belum Dipilih';
                            } else {
                                $this->db->where('KDBRG', $params['KDBRG']);
                                $this->db->where('UEXEC', getUserID());
                                $resData = $this->db->get('tbl04_temp_penjualan');
                                if ($resData->num_rows() > 0) {
                                    //delete temp
                                    $this->db->where('KDBRG', $params['KDBRG']);
                                    $this->db->where('UEXEC', getUserID());
                                    $this->db->delete('tbl04_temp_penjualan');
                                }
                                $cek = $this->db->insert_batch('tbl04_temp_penjualan', $batch);
                                if ($cek) {
                                    $x['code'] = 200;
                                    $x['message'] = 'Apakah Masih Ada barang?';
                                } else {
                                    $x['code'] = 402;
                                    $x['message'] = 'Query insert not success';
                                }
                            }
                        } else {
                            $this->db->where('KDBRG', $params['KDBRG']);
                            $this->db->where('UEXEC', getUserID());
                            $resData = $this->db->get('tbl04_temp_penjualan');
                            if ($resData->num_rows() > 0) {
                                $this->db->where('KDBRG', $params['KDBRG']);
                                $this->db->where('UEXEC', getUserID());
                                $cek = $this->db->update('tbl04_temp_penjualan', $params);
                                if ($cek) {
                                    $x['code'] = 201;
                                    $x['message'] = 'Update Sukses';
                                } else {
                                    $x['code'] = 402;
                                    $x['message'] = 'Query update not success';
                                }
                            } else {
                                $cek = $this->db->insert('tbl04_temp_penjualan', $params);
                                if ($cek) {
                                    $x['code'] = 200;
                                    $x['message'] = 'Simpan Sukses';
                                } else {
                                    $x['code'] = 403;
                                    $x['message'] = 'Query simpan not success';
                                }
                            }
                        }
                    }
                } else {
                    $x['code'] = 404;
                    $x['message'] = "Ops. Variable tidak ditemukan.\nCoba ulangi kembali.";
                }
            } else {
                $x['code'] = 405;
                $x['message'] = "Ops. Method tidak ditemukan.\nCoba ulangi kembali.";
            }
        } else {
            $x['code'] = 406;
            $x['message'] = 'Sesi anda telah habis. Silahkan login kembali';
        }
        echo json_encode($x);
    }

    function hapusTemp()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->where('KDBRG', $_POST['IDX']);
            $this->db->where('UEXEC', getUserID());
            $cek = $this->db->delete('tbl04_temp_penjualan');
            if ($cek) {
                $x['code'] = 200;
                $x['message'] = 'Delete Sukses';
            } else {
                $x['code'] = 401;
                $x['message'] = 'Query delete not success';
            }
        } else {
            $x['code'] = 402;
            $x['message'] = 'Sesi anda telah habis. Silahkan login kembali';
        }
        echo json_encode($x);
    }

    function getTemp()
    {
        $UEXEC = getUserID();
        $SQL = "SELECT *,SUM(JMLJUAL) AS JMLJUAL, 
        SUM((CASE WHEN (AP= 'Sebelum Makan Pagi') THEN JMLJUAL ELSE 0 END)) AS `SBM_PAGI`,
        SUM((CASE WHEN (AP= 'Sebelum Makan Siang') THEN JMLJUAL ELSE 0 END)) AS `SBM_SIANG`,
        SUM((CASE WHEN (AP= 'Sebelum Makan Malam') THEN JMLJUAL ELSE 0 END)) AS `SBM_MALAM`,
        SUM((CASE WHEN (AP= 'Setelah Makan Pagi') THEN JMLJUAL ELSE 0 END)) AS `STM_PAGI`,
        SUM((CASE WHEN (AP= 'Setelah Makan Siang') THEN JMLJUAL ELSE 0 END)) AS `STM_SIANG`,
        SUM((CASE WHEN (AP= 'Setelah Makan Malam') THEN JMLJUAL ELSE 0 END)) AS `STM_MALAM`,
        SUM((CASE WHEN (AP= 'Malam Jam 22:00') THEN JMLJUAL ELSE 0 END)) AS `MALAM`,
        SUM(SUBTOTAL) AS SUBTOTAL, SUM(DISKON) AS DISKON FROM tbl04_temp_penjualan WHERE UEXEC = '$UEXEC' GROUP BY KDBRG ";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('trans_penjualan/get_temp', $x);
    }

    function getTotalTemp()
    {
        $UEXEC = getUserID();
        $SQL = "SELECT IFNULL(SUM((JMLJUAL * HJUAL) - DISKON + R),0) AS GT  FROM tbl04_temp_penjualan 
        WHERE UEXEC = '$UEXEC'";
        $cek = $this->db->query("$SQL");
        if ($cek->num_rows() > 0) {
            $x = $cek->row_array();
            $params['TOTAL'] = $x['GT'];
        } else {
            $params['TOTAL'] = 0;
        }
        echo json_encode($params);
    }

    function emptyTemp()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->where('UEXEC', getUserID());
            $cek = $this->db->delete('tbl04_temp_penjualan');
            if ($cek) {
                $x['code'] = 200;
                $x['message'] = 'Delete Sukses';
            } else {
                $x['code'] = 401;
                $x['message'] = 'Query delete not success';
            }
        } else {
            $x['code'] = 402;
            $x['message'] = 'Sesi anda telah habis. Silahkan login kembali';
        }
        echo json_encode($x);
    }

    function simpan()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (true) {
                    $params = array(
                        'KDJL'          => '',
                        'DTJL'          => date('Y-m-d H:i:s'),
                        'IDPENDAFTARAN' => trim($this->input->post('IDPENDAFTARAN', true)),
                        'IDUSER'        => trim($this->input->post('IDUSER', true)),
                        'REG_UNIT'      => trim($this->input->post('REG_UNIT', true)),
                        'ID_DAFTAR'     => trim($this->input->post('ID_DAFTAR', true)),
                        'NOMR'          => trim($this->input->post('NOMR', true)),
                        'NMPASIEN'      => trim($this->input->post('NMPASIEN', true)),
                        'KDRUANGAN'     => trim($this->input->post('KDRUANGAN', true)),
                        'NMRUANGAN'     => trim($this->input->post('NMRUANGAN', true)),
                        'JNSLAYANAN'    => trim($this->input->post('JNS_LAYANAN', true)),
                        'ID_CARA_BAYAR' => trim($this->input->post('ID_CARA_BAYAR', true)),
                        'CARA_BAYAR'    => trim($this->input->post('CARA_BAYAR', true)),
                        'KDLOKASI'      => trim($this->input->post('KDLOKASI', true)),
                        'NMLOKASI'      => trim($this->input->post('NMLOKASI', true)),
                        'KDDOKTER'      => trim($this->input->post('KDDOKTER', true)),
                        'NMDOKTER'      => trim($this->input->post('NMDOKTER', true)),
                        'NORESEP'       => trim($this->input->post('NORESEP', true)),
                        'TGLRESEP'      => setDateEng(trim($this->input->post('TGLRESEP', true))),
                        'TGLJUAL'       => setDateEng(trim($this->input->post('TGLJUAL', true))),
                        'KETJL'         => trim($this->input->post('KETJL', true)),
                        'JNSRESEP'      => trim($this->input->post('JNSRESEP', true)),
                        'UEXEC'         => getUserID()
                    );

                    if (
                        $params['REG_UNIT'] == "" ||
                        $params['ID_DAFTAR'] == "" ||
                        $params['NOMR'] == "" ||
                        $params['NMPASIEN'] == "" ||
                        $params['KDRUANGAN'] == "" ||
                        $params['NMRUANGAN'] == "" ||
                        $params['JNSLAYANAN'] == "" ||
                        $params['ID_CARA_BAYAR'] == "" ||
                        $params['CARA_BAYAR'] == "" ||
                        $params['KDLOKASI'] == "" ||
                        $params['NMLOKASI'] == "" ||
                        $params['KDDOKTER'] == "" ||
                        $params['NMDOKTER'] == "" ||
                        $params['NORESEP'] == "" ||
                        $params['TGLRESEP'] == "" ||
                        $params['TGLJUAL'] == ""
                    ) {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Masih ada data yang kosong. Silahkan lengkapi data.";
                        $response['param'] = $params;
                    } else {
                        //Get Barang
                        $KDLOKASI = $this->input->post('KDLOKASI');
                        $KDBRG = $this->input->post('KDBRG');

                        if (empty($KDBRG)) {
                            $response['code'] = 404;
                            $response['message'] = "Ops. Item barang masih kosong.";
                        } else {
                            //Validasi Stok
                            $validStok = TRUE;
                            foreach ($KDBRG as $K) {
                                $JMLJUAL = $this->input->post('JMLJUAL' . $K);
                                $validStok = $this->pemakaian_model->validateStok($params['KDLOKASI'], $K, $JMLJUAL);
                                if (!$validStok) {
                                    $NMBRG = $this->input->post('NMBRG' . $K);
                                    break;
                                }
                            }

                            if (!$validStok) {
                                //Jika Stok Mencukupi
                                $response['code'] = 201;
                                $response['message'] = 'Obat ' . $NMBRG . ' tidak bisa dimutasi.' . chr(10) . 'Jumlah obat tidak mencukupi';
                            } else {
                                //Insert Data ke tbl04_penjualan
                                $KDJUAL = $this->pemakaian_model->insertMasterJual($params);
                                if ($KDJUAL) {
                                    $no = 0;
                                    //Tampungkan data ke variabel $batch
                                    foreach ($KDBRG as $K) {
                                        $no++;
                                        $KDJL = $KDJUAL;
                                        $KDBRG = $K;
                                        $NMBRG = $this->input->post('NMBRG' . $K);
                                        $HJUAL = $this->input->post('HJUAL' . $K);
                                        $JMLJUAL = $this->input->post('JMLJUAL' . $K);
                                        $DISKON = $this->input->post('DISKON' . $K);
                                        $R = $this->input->post('R' . $K);
                                        $SUBTOTAL = $this->input->post('SUBTOTAL' . $K);
                                        $AP = $this->input->post('AP' . $K);
                                        $AP_JENISOBAT = $this->input->post('AP_JENISOBAT' . $K);
                                        $AP_JMLHARI = $this->input->post('AP_JMLHARI' . $K);
                                        $AP_JMLSATUAN = $this->input->post('AP_JMLSATUAN' . $K);
                                        $AP_SATUAN = $this->input->post('AP_SATUAN' . $K);
                                        $AP_CARAPAKAI = $this->input->post('AP_CARAPAKAI' . $K);
                                        $AP_WAKTUJML = $this->input->post('AP_WAKTUJML' . $K);
                                        $AP_WAKTUPAKAI = $this->input->post('AP_WAKTUPAKAI' . $K);
                                        $AP_WAKTUKET = $this->input->post('AP_WAKTUKET' . $K);
                                        $AP_KET = $this->input->post('AP_KET' . $K);
                                        $JNS_RESEP = $this->input->post('JNS_RESEP' . $K);
                                        //$this->loop_item($KDJL, $KDBRG, $NMBRG, $KDLOKASI, $HJUAL, $JMLJUAL, $DISKON, $R, $SUBTOTAL, $AP, $AP_JENISOBAT, $AP_JMLHARI, $AP_JMLSATUAN, $AP_SATUAN, $AP_CARAPAKAI, $AP_WAKTUJML, $AP_WAKTUPAKAI, $AP_WAKTUKET, $AP_KET);
                                        if ($JNS_RESEP == "Resep Harian") {
                                            $SBM_PAGI = intval($this->input->post('SBM_PAGI' . $K));
                                            $SBM_SIANG = intval($this->input->post('SBM_SIANG' . $K));
                                            $SBM_MALAM = intval($this->input->post('SBM_MALAM' . $K));
                                            $STM_PAGI = intval($this->input->post('STM_PAGI' . $K));
                                            $STM_SIANG = intval($this->input->post('STM_SIANG' . $K));
                                            $STM_MALAM = intval($this->input->post('STM_MALAM' . $K));
                                            $MALAM = intval($this->input->post('MALAM' . $K));
                                            if ($SBM_PAGI > 0) $AP_HARIAN[] = array('AP' => 'Sebelum Makan Pagi', 'JML' => $SBM_PAGI);
                                            if ($SBM_SIANG > 0) $AP_HARIAN[] = array('AP' => 'Sebelum Makan Siang', 'JML' => $SBM_SIANG);
                                            if ($SBM_MALAM > 0) $AP_HARIAN[] = array('AP' => 'Sebelum Makan Malam', 'JML' => $SBM_MALAM);
                                            if ($STM_PAGI > 0) $AP_HARIAN[] = array('AP' => 'Setelah Makan Pagi', 'JML' => $STM_PAGI);
                                            if ($STM_SIANG > 0) $AP_HARIAN[] = array('AP' => 'Setelah Makan Siang', 'JML' => $STM_SIANG);
                                            if ($STM_MALAM > 0) $AP_HARIAN[] = array('AP' => 'Setelah Makan Malam', 'JML' => $STM_MALAM);
                                            if ($MALAM > 0) $AP_HARIAN[] = array('AP' => 'Malam Jam 22:00', 'JML' => $MALAM);
                                            $tot = $SBM_PAGI + $SBM_SIANG + $SBM_MALAM + $STM_PAGI + $STM_SIANG + $STM_MALAM + $MALAM;
                                            if ($JMLJUAL > $tot)  $AP_HARIAN[] = array('AP' => $AP, 'JML' => $JMLJUAL);

                                            //print_r($AP_HARIAN);
                                            //exit;


                                            if (!empty($AP_HARIAN)) {
                                                foreach ($AP_HARIAN as $APH) {
                                                    $JMLJUAL = $this->pemakaian_model->loop_item($KDJL, $K, $NMBRG, $KDLOKASI, $HJUAL, $APH["JML"], $DISKON, $R, $SUBTOTAL, $APH["AP"], $AP_JENISOBAT, $AP_JMLHARI, $AP_JMLSATUAN, $AP_SATUAN, $AP_CARAPAKAI, $AP_WAKTUJML, $AP_WAKTUPAKAI, $AP_WAKTUKET, $AP_KET);
                                                    while ($JMLJUAL > 0) {
                                                        $JMLJUAL = $this->pemakaian_model->loop_item($KDJL, $K, $NMBRG, $KDLOKASI, $HJUAL, $JMLJUAL, $DISKON, $R, $SUBTOTAL, $APH["AP"], $AP_JENISOBAT, $AP_JMLHARI, $AP_JMLSATUAN, $AP_SATUAN, $AP_CARAPAKAI, $AP_WAKTUJML, $AP_WAKTUPAKAI, $AP_WAKTUKET, $AP_KET);
                                                    }
                                                }
                                                unset($AP_HARIAN);
                                            } else {
                                                unset($AP_HARIAN);
                                            }
                                        } else {
                                            $JMLJUAL = $this->pemakaian_model->loop_item($KDJL, $K, $NMBRG, $KDLOKASI, $HJUAL, $JMLJUAL, $DISKON, $R, $SUBTOTAL, $AP, $AP_JENISOBAT, $AP_JMLHARI, $AP_JMLSATUAN, $AP_SATUAN, $AP_CARAPAKAI, $AP_WAKTUJML, $AP_WAKTUPAKAI, $AP_WAKTUKET, $AP_KET);
                                            while ($JMLJUAL > 0) {
                                                $JMLJUAL = $this->pemakaian_model->loop_item($KDJL, $K, $NMBRG, $KDLOKASI, $HJUAL, $JMLJUAL, $DISKON, $R, $SUBTOTAL, $AP, $AP_JENISOBAT, $AP_JMLHARI, $AP_JMLSATUAN, $AP_SATUAN, $AP_CARAPAKAI, $AP_WAKTUJML, $AP_WAKTUPAKAI, $AP_WAKTUKET, $AP_KET);
                                            }
                                        }
                                    }

                                    if (!empty($KDBRG)) {
                                        $this->db->where('UEXEC', getUserID());
                                        $this->db->delete('tbl04_temp_penjualan');
                                        //Jika Resep Pulang dan 
                                        $IDUSER=$this->input->post('IDUSER');
                                        $sendresep=array();
                                        if($JNS_RESEP=="Resep Pulang" && !empty($IDUSER) && SMART_STATUS==1 ){
                                            //Kirim Data Transaksi Ke server Online
                                            $token=$this->session->userdata('token');
                                            $this->load->model('Smart_model');
                                            $request=array(
                                                'master'=>$this->pemakaian_model->getMaster($KDJL),
                                                'detail'=>$this->pemakaian_model->getDetail($KDJL)
                                            );
                                            $sendresep = $this->Smart_model->http_request($request,SMART_CALL_BACK ."sim/obat/insert",$token);

                                            //Update Status Berobat
                                            $request=array(
                                                'param'=>array(
                                                    'idx' => $this->input->post('IDPENDAFTARAN', true),
                                                ),
                                                'data'=>array(
                                                    'status_berobat'=>'Mendapatkan Obat'
                                                )
                                            );
                                            $updatestatus = $this->Smart_model->http_request($request,SMART_CALL_BACK ."sim/pendaftaran/update",$token);
                                        }
                                        $response['code'] = 200;
                                        $response['kdjl'] = $KDJL;
                                        $response['request']=$sendresep;
                                        $response['message'] = "Berhasil Simpan Data";
                                    } else {
                                        $response['code'] = 202;
                                        $response['message'] = 'Data Obat Masi Kosong';
                                    }
                                } else {
                                    $response['code'] = 202;
                                    $response['message'] = 'Gagal Menyimpan Data Transaksi Pemakaian Obat';
                                }
                            }
                        }
                    }
                } else {
                    $response['code'] = 405;
                    $response['message'] = "Ops. Variable tidak ditemukan.\nCoba ulangi kembali.";
                }
            } else {
                $response['code'] = 406;
                $response['message'] = "Ops. Method tidak ditemukan.\nCoba ulangi kembali.";
            }
        } else {
            $response['code'] = 407;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function loop_item(
        $KDJL,
        $KDBRG,
        $NMBRG,
        $KDLOKASI,
        $HJUAL,
        $JMLJUAL,
        $DISKON,
        $R,
        $SUBTOTAL,
        $AP,
        $AP_JENISOBAT,
        $AP_JMLHARI,
        $AP_JMLSATUAN,
        $AP_SATUAN,
        $AP_CARAPAKAI,
        $AP_WAKTUJML,
        $AP_WAKTUPAKAI,
        $AP_WAKTUKET,
        $AP_KET
    ) {

        $rqSTOK = $this->db->query("SELECT * FROM stok_barang_fifo 
            WHERE KDBRG = '$KDBRG' 
            AND KDLOKASI = '$KDLOKASI' 
            AND JSTOK > 0 ORDER BY TGLBELI ASC, TGLEXP ASC LIMIT 1")->row_array();

        if ($JMLJUAL < $rqSTOK['JSTOK']) {
            // Insert Item
            $params_item = array(
                'KDJL' => $KDJL,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'HJUAL' => $HJUAL,
                'JMLJUAL' => $JMLJUAL,
                'DISKON' => $DISKON,
                'R' => $R,
                'SUBTOTAL' => $SUBTOTAL,
                'AP' => $AP,
                'AP_JENISOBAT' => $AP_JENISOBAT,
                'AP_JMLHARI' => $AP_JMLHARI,
                'AP_JMLSATUAN' => $AP_JMLSATUAN,
                'AP_SATUAN' => $AP_SATUAN,
                'AP_CARAPAKAI' => $AP_CARAPAKAI,
                'AP_WAKTUJML' => $AP_WAKTUJML,
                'AP_WAKTUPAKAI' => $AP_WAKTUPAKAI,
                'AP_WAKTUKET' => $AP_WAKTUKET,
                'AP_KET' => $AP_KET,
                'AP_EXPDATE' => $rqSTOK['TGLEXP'],
                'JMLRET' => 0,
                'SISA' => $JMLJUAL
            );
            $this->db->insert('tbl04_penjualan_detail', $params_item);
        } elseif ($JMLJUAL > $rqSTOK['JSTOK']) {
            $params_item = array(
                'KDJL' => $KDJL,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'HJUAL' => $HJUAL,
                'JMLJUAL' => $rqSTOK['JSTOK'],
                'DISKON' => $DISKON,
                'R' => $R,
                'SUBTOTAL' => $SUBTOTAL,
                'AP' => $AP,
                'AP_JENISOBAT' => $AP_JENISOBAT,
                'AP_JMLHARI' => $AP_JMLHARI,
                'AP_JMLSATUAN' => $AP_JMLSATUAN,
                'AP_SATUAN' => $AP_SATUAN,
                'AP_CARAPAKAI' => $AP_CARAPAKAI,
                'AP_WAKTUJML' => $AP_WAKTUJML,
                'AP_WAKTUPAKAI' => $AP_WAKTUPAKAI,
                'AP_WAKTUKET' => $AP_WAKTUKET,
                'AP_KET' => $AP_KET,
                'AP_EXPDATE' => $rqSTOK['TGLEXP'],
                'JMLRET' => 0,
                'SISA' => $rqSTOK['JSTOK']
            );
            $this->db->insert('tbl04_penjualan_detail', $params_item);
            $JMLJUAL = $JMLJUAL - $rqSTOK['JSTOK'];
            $this->loop_item(
                $KDJL,
                $KDBRG,
                $NMBRG,
                $KDLOKASI,
                $HJUAL,
                $JMLJUAL,
                $DISKON,
                $R,
                $SUBTOTAL,
                $AP,
                $AP_JENISOBAT,
                $AP_JMLHARI,
                $AP_JMLSATUAN,
                $AP_SATUAN,
                $AP_CARAPAKAI,
                $AP_WAKTUJML,
                $AP_WAKTUPAKAI,
                $AP_WAKTUKET,
                $AP_KET
            );
        } elseif ($JMLJUAL = $rqSTOK['JSTOK']) {
            $params_item = array(
                'KDJL' => $KDJL,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'HJUAL' => $HJUAL,
                'JMLJUAL' => $JMLJUAL,
                'DISKON' => $DISKON,
                'R' => $R,
                'SUBTOTAL' => $SUBTOTAL,
                'AP' => $AP,
                'AP_JENISOBAT' => $AP_JENISOBAT,
                'AP_JMLHARI' => $AP_JMLHARI,
                'AP_JMLSATUAN' => $AP_JMLSATUAN,
                'AP_SATUAN' => $AP_SATUAN,
                'AP_CARAPAKAI' => $AP_CARAPAKAI,
                'AP_WAKTUJML' => $AP_WAKTUJML,
                'AP_WAKTUPAKAI' => $AP_WAKTUPAKAI,
                'AP_WAKTUKET' => $AP_WAKTUKET,
                'AP_KET' => $AP_KET,
                'AP_EXPDATE' => $rqSTOK['TGLEXP'],
                'JMLRET' => 0,
                'SISA' => $JMLJUAL
            );
            $this->db->insert('tbl04_penjualan_detail', $params_item);
        }
    }

    /*function loop_item(
        $KDJL,
        $KDBRG,
        $NMBRG,
        $KDLOKASI,
        $HJUAL,
        $JMLJUAL,
        $DISKON,
        $R,
        $SUBTOTAL,
        $AP,
        $AP_JENISOBAT,
        $AP_JMLHARI,
        $AP_JMLSATUAN,
        $AP_SATUAN,
        $AP_CARAPAKAI,
        $AP_WAKTUJML,
        $AP_WAKTUPAKAI,
        $AP_WAKTUKET,
        $AP_KET,
        $START =0
    ) {
        $rqSTOK = $this->db->query("SELECT * FROM stok_barang_fifo 
            WHERE KDBRG = '$KDBRG' 
            AND KDLOKASI = '$KDLOKASI' 
            AND JSTOK > 0 ORDER BY TGLBELI ASC, TGLEXP ASC LIMIT $START, 1")->row_array();

        if ($JMLJUAL < $rqSTOK['JSTOK']) {
            // Insert Item
            $params_item = array(
                'KDJL' => $KDJL,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'HJUAL' => $HJUAL,
                'JMLJUAL' => $JMLJUAL,
                'DISKON' => $DISKON,
                'R' => $R,
                'SUBTOTAL' => $SUBTOTAL,
                'AP' => $AP,
                'AP_JENISOBAT' => $AP_JENISOBAT,
                'AP_JMLHARI' => $AP_JMLHARI,
                'AP_JMLSATUAN' => $AP_JMLSATUAN,
                'AP_SATUAN' => $AP_SATUAN,
                'AP_CARAPAKAI' => $AP_CARAPAKAI,
                'AP_WAKTUJML' => $AP_WAKTUJML,
                'AP_WAKTUPAKAI' => $AP_WAKTUPAKAI,
                'AP_WAKTUKET' => $AP_WAKTUKET,
                'AP_KET' => $AP_KET,
                'AP_EXPDATE' => $rqSTOK['TGLEXP'],
                'JMLRET' => 0,
                'SISA' => $JMLJUAL
            );
            return array('offset'=>0,'start'=>0, 'data'=> $params_item) ;
            //$this->db->insert('tbl04_penjualan_detail', $params_item);
        } elseif ($JMLJUAL > $rqSTOK['JSTOK']) {
            $params_item = array(
                'KDJL' => $KDJL,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'HJUAL' => $HJUAL,
                'JMLJUAL' => $rqSTOK['JSTOK'],
                'DISKON' => $DISKON,
                'R' => $R,
                'SUBTOTAL' => $SUBTOTAL,
                'AP' => $AP,
                'AP_JENISOBAT' => $AP_JENISOBAT,
                'AP_JMLHARI' => $AP_JMLHARI,
                'AP_JMLSATUAN' => $AP_JMLSATUAN,
                'AP_SATUAN' => $AP_SATUAN,
                'AP_CARAPAKAI' => $AP_CARAPAKAI,
                'AP_WAKTUJML' => $AP_WAKTUJML,
                'AP_WAKTUPAKAI' => $AP_WAKTUPAKAI,
                'AP_WAKTUKET' => $AP_WAKTUKET,
                'AP_KET' => $AP_KET,
                'AP_EXPDATE' => $rqSTOK['TGLEXP'],
                'JMLRET' => 0,
                'SISA' => $rqSTOK['JSTOK']
            );
            //return $params_item;
            //$this->db->insert('tbl04_penjualan_detail', $params_item);
            $JMLJUAL = $JMLJUAL - $rqSTOK['JSTOK'];
            $START++;
            return array('offset' => $JMLJUAL, 'start'=>$START, 'data' => $params_item);
            /*$this->loop_item(
                $KDJL,
                $KDBRG,
                $NMBRG,
                $KDLOKASI,
                $HJUAL,
                $JMLJUAL,
                $DISKON,
                $R,
                $SUBTOTAL,
                $AP,
                $AP_JENISOBAT,
                $AP_JMLHARI,
                $AP_JMLSATUAN,
                $AP_SATUAN,
                $AP_CARAPAKAI,
                $AP_WAKTUJML,
                $AP_WAKTUPAKAI,
                $AP_WAKTUKET,
                $AP_KET
            );
        } elseif ($JMLJUAL = $rqSTOK['JSTOK']) {
            $params_item = array(
                'KDJL' => $KDJL,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'HJUAL' => $HJUAL,
                'JMLJUAL' => $JMLJUAL,
                'DISKON' => $DISKON,
                'R' => $R,
                'SUBTOTAL' => $SUBTOTAL,
                'AP' => $AP,
                'AP_JENISOBAT' => $AP_JENISOBAT,
                'AP_JMLHARI' => $AP_JMLHARI,
                'AP_JMLSATUAN' => $AP_JMLSATUAN,
                'AP_SATUAN' => $AP_SATUAN,
                'AP_CARAPAKAI' => $AP_CARAPAKAI,
                'AP_WAKTUJML' => $AP_WAKTUJML,
                'AP_WAKTUPAKAI' => $AP_WAKTUPAKAI,
                'AP_WAKTUKET' => $AP_WAKTUKET,
                'AP_KET' => $AP_KET,
                'AP_EXPDATE' => $rqSTOK['TGLEXP'],
                'JMLRET' => 0,
                'SISA' => $JMLJUAL
            );
            //$this->db->insert('tbl04_penjualan_detail', $params_item);
            return array('offset' => 0, 'start'=>0,'data' => $params_item);
        }
    }*/

    function cetakTicket()
    {
        $KDJL = (isset($_GET['kode'])) ? $_GET['kode'] : "";
        $SQL_MAIN = "SELECT * FROM tbl04_penjualan WHERE KDJL = '$KDJL'";
        $cek = $this->db->query("$SQL_MAIN");
        if ($cek->num_rows() > 0) {
            $res = $cek->row_array();
            $y['KDJL'] = $res['KDJL'];
            $y['DTJL'] = $res['DTJL'];
            $y['REG_UNIT'] = $res['REG_UNIT'];
            $y['ID_DAFTAR'] = $res['ID_DAFTAR'];
            $y['NOMR'] = $res['NOMR'];
            $y['NMPASIEN'] = $res['NMPASIEN'];
            $y['KDRUANGAN'] = $res['KDRUANGAN'];
            $y['NMRUANGAN'] = $res['NMRUANGAN'];
            $y['JNSLAYANAN'] = $res['JNSLAYANAN'];
            $y['ID_CARA_BAYAR'] = $res['ID_CARA_BAYAR'];
            $y['CARA_BAYAR'] = $res['CARA_BAYAR'];
            $y['KDLOKASI'] = $res['KDLOKASI'];
            $y['NMLOKASI'] = $res['NMLOKASI'];
            $y['KDDOKTER'] = $res['KDDOKTER'];
            $y['NMDOKTER'] = $res['NMDOKTER'];
            $y['NORESEP'] = $res['NORESEP'];
            $y['TGLRESEP'] = $res['TGLRESEP'];
            $y['TGLJUAL'] = $res['TGLJUAL'];
            $y['JNS_RESEP'] = $res['JNSRESEP'];
            $y['KETJL'] = $res['KETJL'];
            if ($res['JNSRESEP'] == 'Resep Harian') {
                $SQL = "SELECT *,MAX(AP_EXPDATE) as AP_EXPDATE FROM tbl04_penjualan_detail
                WHERE KDJL = '$KDJL' GROUP BY AP ORDER BY FIELD(AP,'Sebelum Makan Pagi','Sebelum Makan Siang','Sebelum Makan Malam','Setelah Makan Pagi','Setelah Makan Siang','Setelah Makan Malam')";
            } else {
                $SQL = "SELECT *,SUM(JMLJUAL) AS JMLJUAL,MAX(AP_EXPDATE) as AP_EXPDATE FROM tbl04_penjualan_detail
                WHERE KDJL = '$KDJL' GROUP BY KDBRG ORDER BY NMBRG";
            }

            $y['dataPreview'] =  $this->db->query("$SQL");

            $this->load->view('pemakaian_obat/print_eticket_group', $y);
        } else {
            echo "<script>
                alert('Maaf! Data tidak ditemukan');
                history.back();
            </script>";
        }
    }

    function barang($kode_lokasi = "")
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $param1 = $this->input->post('param1');
            $data = $this->pemakaian_model->getBarang($param1, $kode_lokasi);
            $list = array(
                'status'    => true,
                'message'   => "OK",
                'data'     => $data,
            );
            header('Content-Type: application/json');
            echo json_encode($list);
        } else {
            $list = array(
                'status'    => false,
                'message'   => "Session Expired",
                'start'     => 0,
                'row_count' => 0,
                'limit'     => 0,
                'data'     => array(),
            );
            header('Content-Type: application/json');
            echo json_encode($list);
        }
    }
}
