<?php
defined('BASEPATH') or exit('No direct script access allowed');
class trans_pembelian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->perPage = 10;
        $this->offset = 0;
        $this->uri_segment = 3;

        $this->load->library('ajax_page');
        $this->load->model('users_model');
        $this->load->model('pembelian_model');
    }
    function index()
    {
        /*$ses_state = $this->users_model->cek_session_id();
        if($ses_state){
            $x['header'] = $this->load->view('template/header','',true);
            $z = setNav("nav_5");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar',$z,true);

            /**
            * Note : Tambahkan Set Lokasi (Yang Akses Pembelian) 
            * Kode Lokasi Manual 2. Gudang
            */
        /*$UID = $this->session->userdata('get_uid');
            $SQL = "SELECT * FROM tbl04_lokasi WHERE KDLOKASI IN(SELECT ruang_akses 
            FROM tbl01_users_farmasi WHERE NRP = '$UID')
            AND KDGRLOKASI='2'";

            $y['contentTitle'] = "Transaksi Barang Masuk (Pembelian)";        
            $y['getRuang'] = $this->db->query("$SQL");
            $jmlruang=$y['getRuang']->num_rows();
            if($jmlruang==1) {
                $kdlok=$y['getRuang']->row()->KDLOKASI;
                header('location:'.base_url() ."farmasi.php/trans_pembelian/goForm?kLok=" .$kdlok);
            }else{
                $x['content'] = $this->load->view('trans_pembelian/template_ruang',$y,true);
                $this->load->view('template/theme',$x);
            }

            
        }else{
            $url_login = base_url().'mr_registrasi.php/login?sid='.getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }*/

        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        if ($ses_state) {
            if ($this->session->userdata('kdlokasi')) {
                $y['kLok'] = $this->session->userdata('kdlokasi');
                if ($y['kLok'] == "") {
                    echo "<script>alert('Ops. Lokasi tidak ditemukan.');history.back();</script>";
                } else {
                    $x['header'] = $this->load->view('template/header', '', true);
                    $z = setNav("nav_5");
                    $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
                    $y['index_menu'] = 5;
                    $y['contentTitle'] = "Transaksi Barang Masuk (Pembelian)";
                    $y['contentTitle'] .= "<br/>Lokasi : " . getLokasiById($y['kLok']);
                    $x['content'] = $this->load->view('trans_pembelian/template_table', $y, true);
                    $this->load->view('template/theme', $x);
                }
            } else {
                echo "<script>alert('Ops. Variable tidak ditemukan.');history.back();</script>";
            }
        } else {
            $url_login = base_url() . 'farmasi.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }

    function goForm()
    {
        $ses_state = $this->users_model->cek_session_id();
        $this->session->unset_userdata('sPage');
        $this->session->unset_userdata('sLike');
        if ($ses_state) {
            if (isset($_GET['kLok'])) {
                $y['kLok'] = $this->input->get('kLok', true);
                if ($y['kLok'] == "") {
                    echo "<script>alert('Ops. Lokasi tidak ditemukan.');history.back();</script>";
                } else {
                    $x['header'] = $this->load->view('template/header', '', true);
                    $z = setNav("nav_5");
                    $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
                    $y['index_menu'] = 5;
                    $y['contentTitle'] = "Transaksi Barang Masuk (Pembelian)";
                    $y['contentTitle'] .= "<br/>Lokasi : " . getLokasiById($y['kLok']);
                    $x['content'] = $this->load->view('trans_pembelian/template_table', $y, true);
                    $this->load->view('template/theme', $x);
                }
            } else {
                echo "<script>alert('Ops. Variable tidak ditemukan.');history.back();</script>";
            }
        } else {
            $url_login = base_url() . 'farmasi.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
    function cekRetur($KDBL)
    {
        //$KDBL = (isset($_POST['KDBL'])) ? $this->input->post('KDBL',true) : "";
        $this->db->where('KDBL', $KDBL);
        $resQuery = $this->db->get('tbl04_pembelian_batal');
        if ($resQuery->num_rows() > 0) {
            $response['code'] = 200;
        } else {
            $response['code'] = 201;
        }
        //$response['csrf'] = $this->security->get_csrf_hash();    
        echo json_encode($response);
    }
    function getView()
    {
        if (isset($_POST['page'])) :
            $offset = $this->input->post('page');
            $this->session->set_userdata('sPage', $offset);
        else :
            $offset = ($this->session->userdata('sPage')) ? $this->session->userdata('sPage') : 0;
        endif;

        $KDLOKASI = (isset($_POST['kLok'])) ? $this->input->post('kLok', true) : "";
        $limit = $this->perPage;
        $condition = "WHERE KDLOKASI='$KDLOKASI' ";
        if (isset($_POST['sLike'])) {
            $offset = 0;
            $sLike = $this->db->escape_str($this->input->post('sLike', true));
            $condition .= "AND (KDBL LIKE '%$sLike%' OR NMSUPPLIER LIKE '%$sLike%' OR  NMLOKASI LIKE '%$sLike%')";
            $this->session->set_userdata('sLike', $sLike);
        } else {
            if ($this->session->userdata('sLike')) {
                $sLike = $this->session->userdata('sLike');
                $condition .= "AND (KDBL LIKE '%$sLike%' OR NMSUPPLIER LIKE '%$sLike%' OR  NMLOKASI LIKE '%$sLike%')";
            }
        }

        $SQL = "SELECT * FROM tbl04_pembelian $condition ORDER BY KDBL DESC";
        //echo $offset;
        $SQL_Count = $this->db->query("$SQL");
        $totalRec = $SQL_Count->num_rows();
        $config['target']      = 'tbody#getdata';
        $config['kdlokasi']    = $KDLOKASI;
        $config['uri_segment']  = $this->uri_segment;
        $config['base_url']    = base_url() . 'farmasi.php/trans_pembelian/getView';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $limit;
        $this->ajax_page->initialize($config);

        $x['offset'] = $offset;
        $x['SQL'] = $this->db->query("$SQL LIMIT $offset,$limit");
        echo "$SQL LIMIT $offset,$limit";
        $this->load->view('trans_pembelian/get_data', $x);
    }

    function tambah()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_5");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

            $idx = (isset($_GET['idx'])) ? $this->input->get('idx', true) : "";
            if ($idx == "") {
            } else {
                $queSQL = "SELECT * FROM tbl04_pembelian JOIN tbl04_supplier  ON tbl04_pembelian.KDSUPPLIER = tbl04_supplier.KDSUPPLIER  WHERE KDBL = '$idx'";
                $cekSQL = $this->db->query("$queSQL");
                if ($cekSQL->num_rows() > 0) {
                    $resSQL = $cekSQL->row_array();
                    //print_r($resSQL);exit;
                    $y['KDBL'] = $resSQL['KDBL'];
                    $y['NMSUPPLIER'] = $resSQL['NMSUPPLIER'];
                    $y['ALAMAT'] = $resSQL['ALAMAT'];
                    $y['KOTA'] = $resSQL['KOTA'];
                    $y['NPWP'] = $resSQL['NPWP'];
                    $y['CONTACTP'] = $resSQL['CONTACTP'];
                    $y['TELP'] = $resSQL['TELP'];
                    $y['FAKS'] = $resSQL['FAKS'];
                    $y['EMAIL'] = $resSQL['EMAIL'];
                } else {
                    $y['KDBL'] = "";
                    $y['NMSUPPLIER'] = "";
                    $y['ALAMAT'] = "";
                    $y['KOTA'] = "";
                    $y['NPWP'] = "";
                    $y['CONTACTP'] = "";
                    $y['TELP'] = "";
                    $y['FAKS'] = "";
                    $y['EMAIL'] = "";
                }
            }
            $y['index_menu'] = 5;
            $y['kLok'] = ($this->session->userdata('kdlokasi')) ? $this->session->userdata('kdlokasi') : "";
            $y['contentTitle'] = "Entry Transaksi Barang Masuk (Pembelian)";
            $y['datsupplier'] = $this->db->get('tbl04_supplier');
            $x['content'] = $this->load->view('trans_pembelian/template_entry', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $url_login = base_url() . 'farmasi.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }
    function detail($idx = "")
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $y['index_menu'] = 5;
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_5");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);

            //$idx = (isset($_GET['idx'])) ? $this->input->get('idx', true) : "";
            if ($idx == "") {
            } else {
                //$queSQL = "SELECT * FROM tbl04_pembelian WHERE KDBL = '$idx'";
                $queSQL = "SELECT *, DATE_FORMAT(DTBL,'%Y-%m-%d') as TGLMASUK FROM tbl04_pembelian LEFT JOIN tbl04_supplier  ON tbl04_pembelian.KDSUPPLIER = tbl04_supplier.KDSUPPLIER  WHERE KDBL = '$idx'";

                $cekSQL = $this->db->query("$queSQL");
                //echo $cekSQL->num_rows();
                //exit;
                if ($cekSQL->num_rows() > 0) {
                    $resSQL = $cekSQL->row_array();
                    $y['KDBL'] = $resSQL['KDBL'];
                    $y['NOFAKTUR'] = $resSQL['NOFAKTUR'];
                    $y["DTBL"] = $resSQL['DTBL'];

                    $y['NMSUPPLIER'] = $resSQL['NMSUPPLIER'];
                    $y['ALAMAT'] = $resSQL['ALAMAT'];
                    $y['KOTA'] = $resSQL['KOTA'];
                    $y['NPWP'] = $resSQL['NPWP'];
                    $y['CONTACTP'] = $resSQL['CONTACTP'];
                    $y['TELP'] = $resSQL['TELP'];
                    $y['FAKS'] = $resSQL['FAKS'];
                    $y['EMAIL'] = $resSQL['EMAIL'];
                    $y['LOCK'] = $resSQL['LOCK_STATUS'];
                    $y['TOTFAKTUR'] = $resSQL['TOTFAKTUR'];
                    $y['JENIS_TRANS'] = $resSQL['JENIS_TRANS'];
                    $y['TOTDISKON_ITEM'] = $resSQL['TOTDISKON_ITEM'];
                    $y['DISKON_GLOBAL'] = $resSQL['DISKON_GLOBAL'];
                    $y['TOTPPN'] = $resSQL['TOTPPN'];
                    $y['ONGKIR'] = $resSQL['ONGKIR'];
                    $y['GRANDTOT'] = $resSQL['GRANDTOT'];
                    $y['KDLOKASI'] = $resSQL['KDLOKASI'];
                    $y["TGLMASUK"] = $resSQL['TGLMASUK'];
                    $y['TGLTERIMA'] = $resSQL['TGLTERIMA'];
                    $y['detail'] = $this->pembelian_model->getDetailpembelian($resSQL['KDBL']);
                } else {
                    $y['KDBL'] = "";
                    $y['NOFAKTUR'] = "";
                    $y["DTBL"] = "";
                    $y['NMSUPPLIER'] = "";
                    $y['ALAMAT'] = "";
                    $y['KOTA'] = "";
                    $y['NPWP'] = "";
                    $y['CONTACTP'] = "";
                    $y['TELP'] = "";
                    $y['FAKS'] = "";
                    $y['EMAIL'] = "";
                    $y['LOCK'] = "";
                    $y['TOTFAKTUR'] = '';
                    $y['TOTDISKON_ITEM'] = '';
                    $y['DISKON_GLOBAL'] = '';
                    $y['TOTPPN'] = '';
                    $y['ONGKIR'] = '';
                    $y['GRANDTOT'] = '';
                    $y['KDLOKASI'] = "";
                    $y["TGLMASUK"] = '';
                    $y['TGLTERIMA'] = "";
                }
            }
            $y['kLok'] = (isset($_GET['kLok'])) ? $this->input->get('kLok', true) : "";
            $y['contentTitle'] = "Detail Transaksi Barang Masuk (Pembelian)";
            $x['content'] = $this->load->view('trans_pembelian/template_detail', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $url_login = base_url() . 'mr_registrasi.php/login?sid=' . getSessionID();
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login'
            </script>";
        }
    }
    function getlog()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $kdbrg = $this->input->get('kdbrg');
            $hmodal = $this->input->get('hmodal');
            $expdate = $this->input->get('expdate');
            $tglbeli = $this->input->get('tglbeli');
            $this->db->where('tbl04_log_transaksi.KDBRG', $kdbrg);
            $this->db->where('HMODAL', $hmodal);
            $this->db->where('TGLEXP', $expdate);
            $this->db->where('TGLBELI', $tglbeli);
            $this->db->where('DTTRANS >= ', $tglbeli);
            $this->db->order_by('KDLT');
            $this->db->join('tbl04_lokasi', 'tbl04_lokasi.KDLOKASI=tbl04_log_transaksi.KDLOKASI');
            $log = $this->db->get('tbl04_log_transaksi')->result();
            if (empty($log)) {
                $response = array('status' => false, 'message' => 'Transaksi Tidak Ditemukan');
                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                $response = array('status' => true, 'message' => 'OK', 'log' => $log);
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }
    }
    function getlogsisa()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $kdbrg = $this->input->get('kdbrg');
            $hmodal = $this->input->get('hmodal');
            $expdate = $this->input->get('expdate');
            $tglbeli = $this->input->get('tglbeli');
            $tgltrans = $this->input->get('tgltrans');
            $lokasi = $this->input->get('lokasi');
            $KDLTSTART = $this->input->get('dari');
            $KDLTSTOP = $this->input->get('sampai');
            $this->db->select('SUM(JMASUK)-SUM(JKELUAR) AS SISA');
            $this->db->where('tbl04_log_transaksi.KDBRG', $kdbrg);
            $this->db->where('HMODAL', $hmodal);
            $this->db->where('TGLEXP', $expdate);
            $this->db->where('TGLBELI', $tglbeli);
            $this->db->where('KDLT >= ', $KDLTSTART);
            $this->db->where('KDLT <= ', $KDLTSTOP);
            $this->db->where('KDLOKASI', $lokasi);
            $this->db->order_by('KDLT');
            $log = $this->db->get('tbl04_log_transaksi')->row();
            if (empty($log)) {
                $response = array('status' => false, 'message' => 'Transaksi Tidak Ditemukan');
                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                $response = array('status' => true, 'message' => 'OK', 'log' => $log);
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }
    }
    function getTemp()
    {
        $this->db->where('UEXEC', getUserID());
        $this->db->where('SESSION_ID', getSessionID());
        $x['SQL'] = $this->db->get('tbl04_temp_pembelian');
        $this->load->view('trans_pembelian/get_temp', $x);
    }
    function getTotalTemp()
    {
        $UEXEC = getUserID();
        $SQL = "SELECT IFNULL(SUM(HBELI * JMLBELI),0) AS TOTFAKTUR,
        IFNULL(SUM(HDISKON),0) AS TOTDISKON_ITEM,
        IFNULL(SUM(SUBTOTAL),0) AS TOTFAKTUR_NETTO
        FROM tbl04_temp_pembelian WHERE UEXEC = '$UEXEC'";
        $cek = $this->db->query("$SQL");
        if ($cek->num_rows() > 0) {
            $x = $cek->row_array();
            $params = array(
                'TOTFAKTUR' => $x['TOTFAKTUR'],
                'TOTDISKON_ITEM' => $x['TOTDISKON_ITEM'],
                'TOTFAKTUR_NETTO' => $x['TOTFAKTUR_NETTO']
            );
        } else {
            $params = array(
                'TOTFAKTUR' => 0,
                'TOTDISKON_ITEM' => 0,
                'TOTFAKTUR_NETTO' => 0
            );
        }
        echo json_encode($params);
    }

    /** Function untuk menampilkan data temp json*/
    function datatemp()
    {
        $this->load->model('farmasi_model');
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $response = array(
                'status'    => true,
                'message'   => 'Load Data...',
                'temp'  => $this->farmasi_model->getTempbeli(getUserID(), getSessionID()),
                'tot'   => $this->farmasi_model->getTotalTempbeli(getUserID(), getSessionID())
            );
        } else {
            $response = array('status' => true, 'message' => 'Maaf anda tidak punya akses');
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }


    function getObat()
    {
        $keyword = (isset($_POST['keyword'])) ? $this->input->post('keyword', true) : "";
        $SQL = "SELECT * FROM tbl04_barang WHERE KDBRG LIKE '%$keyword%' OR NMBRG LIKE '%$keyword%' 
        ORDER BY NMBRG LIMIT 20";
        $x['SQL'] = $this->db->query("$SQL");
        $this->load->view('trans_pembelian/getObat_cari', $x);
    }
    function simpanTemp()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['KDBRG']) &&
                    isset($_POST['NMBRG']) &&
                    isset($_POST['EXPDATE']) &&
                    isset($_POST['HBELI']) &&
                    isset($_POST['JMLBELI']) &&
                    isset($_POST['HDISKON']) &&
                    isset($_POST['SUBTOTAL'])
                ) {
                    $params = array(
                        'KDBRG' => trim($this->input->post('KDBRG', true)),
                        'NMBRG' => trim($this->input->post('NMBRG', true)),
                        'EXPDATE' => setDateEng(trim($this->input->post('EXPDATE', true))),
                        'HBELI' => str_replace(",", "", trim($this->input->post('HBELI', true))),
                        'JMLBELI' => str_replace(",", "", trim($this->input->post('JMLBELI', true))),
                        'HDISKON' => str_replace(",", "", trim($this->input->post('HDISKON', true))),
                        'SUBTOTAL' => str_replace(",", "", trim($this->input->post('SUBTOTAL', true))),
                        'UEXEC' => getUserID(),
                        'SESSION_ID' => getSessionID()
                    );

                    if ($params['KDBRG'] == "") {
                        $response['code'] = 402;
                        $response['message'] = "Ops. Obat/Alkes tidak boleh kosong.\nCoba ulangi kembali.";
                        $response['csrf'] = $this->security->get_csrf_hash();
                    } elseif ($params['HBELI'] == "") {
                        $response['code'] = 402;
                        $response['message'] = "Ops. Harga Beli tidak boleh kosong.\nCoba ulangi kembali.";
                        $response['csrf'] = $this->security->get_csrf_hash();
                    } elseif ($params['JMLBELI'] == "") {
                        $response['code'] = 402;
                        $response['message'] = "Ops. Jumlah Beli tidak boleh kosong.\nCoba ulangi kembali.";
                        $response['csrf'] = $this->security->get_csrf_hash();
                    } else {
                        $this->db->where('KDBRG', $params['KDBRG']);
                        $this->db->where('UEXEC', getUserID());
                        $resData = $this->db->get('tbl04_temp_pembelian');
                        if ($resData->num_rows() > 0) {
                            $this->db->where('KDBRG', $params['KDBRG']);
                            $this->db->where('UEXEC', getUserID());
                            $this->db->update('tbl04_temp_pembelian', $params);
                            $response = array(
                                'code'    => 200,
                                'message' => 'Update Sukses'
                            );
                            $response['csrf'] = $this->security->get_csrf_hash();
                        } else {
                            $this->db->insert('tbl04_temp_pembelian', $params);
                            $response = array(
                                'code'    => 200,
                                'message' => 'Simpan Sukses'
                            );
                            $response['csrf'] = $this->security->get_csrf_hash();
                        }
                    }
                } else {
                    $response['code'] = 402;
                    $response['message'] = "Ops. Variable tidak ditemukan.\nCoba ulangi kembali.";
                    $response['csrf'] = $this->security->get_csrf_hash();
                }
            } else {
                $response['code'] = 402;
                $response['message'] = "Ops. Method tidak ditemukan.\nCoba ulangi kembali.";
                $response['csrf'] = $this->security->get_csrf_hash();
            }
        } else {
            $response['code'] = 404;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
            $response['csrf'] = $this->security->get_csrf_hash();
        }
        echo json_encode($response);
    }

    function simpan()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (
                    isset($_POST['PEMBAYARAN']) &&
                    isset($_POST['KDSUPPLIER']) &&
                    isset($_POST['NMSUPPLIER']) &&
                    isset($_POST['NOFAKTUR']) &&
                    isset($_POST['TGLFAKTUR']) &&
                    isset($_POST['TGLTERIMA']) &&
                    isset($_POST['JTEMPO']) &&
                    isset($_POST['KDLOKASI']) &&
                    isset($_POST['NMLOKASI']) &&
                    isset($_POST['JENIS_TRANS']) &&
                    isset($_POST['TOTFAKTUR']) &&
                    isset($_POST['TOTDISKON_ITEM']) &&
                    isset($_POST['DISKON_GLOBAL']) &&
                    isset($_POST['TOTPPN']) &&
                    isset($_POST['ONGKIR']) &&
                    isset($_POST['GRANDTOT']) &&
                    isset($_POST['KETBL'])
                ) {
                    $params = array(
                        'KDBL'          => '',
                        'PEMBAYARAN'    => trim($this->input->post('PEMBAYARAN', true)),
                        'KDSUPPLIER'    => trim($this->input->post('KDSUPPLIER', true)),
                        'NMSUPPLIER'    => trim($this->input->post('NMSUPPLIER', true)),
                        'NOFAKTUR'      => trim($this->input->post('NOFAKTUR', true)),
                        'TGLFAKTUR'     => setDateEng(trim($this->input->post('TGLFAKTUR', true))),
                        'TGLTERIMA'     => setDateEng(trim($this->input->post('TGLTERIMA', true))),
                        'JTEMPO'        => setDateEng(trim($this->input->post('JTEMPO', true))),
                        'KDLOKASI'      => trim($this->input->post('KDLOKASI', true)),
                        'NMLOKASI'      => trim($this->input->post('NMLOKASI', true)),
                        'JENIS_TRANS'   => trim($this->input->post('JENIS_TRANS', true)),
                        'TOTFAKTUR'     => str_replace(",", "", trim($this->input->post('TOTFAKTUR', true))),
                        'TOTDISKON_ITEM' => str_replace(",", "", trim($this->input->post('TOTDISKON_ITEM', true))),
                        'DISKON_GLOBAL' => str_replace(",", "", trim($this->input->post('DISKON_GLOBAL', true))),
                        'TOTPPN'        => str_replace(",", "", trim($this->input->post('TOTPPN', true))),
                        'ONGKIR'        => str_replace(",", "", trim($this->input->post('ONGKIR', true))),
                        'GRANDTOT'      => str_replace(",", "", trim($this->input->post('GRANDTOT', true))),
                        'KETBL'         => trim($this->input->post('KETBL', true)),
                        'UEXEC'         => getUserID()
                    );

                    if (
                        $params['PEMBAYARAN'] == "" ||
                        $params['KDSUPPLIER'] == "" ||
                        $params['NMSUPPLIER'] == "" ||
                        $params['NOFAKTUR'] == "" ||
                        $params['TGLFAKTUR'] == "" ||
                        $params['TGLTERIMA'] == "" ||
                        $params['JTEMPO'] == "" ||
                        $params['KDLOKASI'] == "" ||
                        $params['NMLOKASI'] == "" ||
                        $params['JENIS_TRANS'] == "" ||
                        $params['TOTFAKTUR'] == "" ||
                        $params['TOTDISKON_ITEM'] == "" ||
                        $params['DISKON_GLOBAL'] == "" ||
                        $params['TOTPPN'] == "" ||
                        $params['ONGKIR'] == "" ||
                        $params['GRANDTOT'] == ""
                    ) {
                        $response['code'] = 401;
                        $response['message'] = "Ops. Masih ada data yang kosong. Silahkan lengkapi data.";
                        $response['csrf'] = $this->security->get_csrf_hash();
                    } else {
                        $this->db->where('UEXEC', getUserID());
                        $cek = $this->db->get('tbl04_temp_pembelian');
                        if ($cek->num_rows() > 0) {
                            $cekData = "SELECT * FROM tbl04_pembelian WHERE NOFAKTUR = '$params[NOFAKTUR]' 
                            AND KDSUPPLIER = '$params[KDSUPPLIER]' 
                            AND KDBL NOT IN(SELECT KDBL FROM tbl04_pembelian_batal)";

                            $cekFaktur = $this->db->query("$cekData");
                            if ($cekFaktur->num_rows() > 0) {
                                $response['code'] = 402;
                                $response['message'] = "Data faktur untuk supplier ini telah ada" . chr(10) . "Cek kembali No Faktur Anda!";
                                $response['csrf'] = $this->security->get_csrf_hash();
                            } else {
                                $cekCommand = $this->db->insert('tbl04_pembelian', $params);
                                if ($cekCommand) {
                                    // Update Piutang Supplier Where Metode Pembayaran Kredit
                                    if ($params['PEMBAYARAN'] == 'CREDIT') {
                                        $sqlUpdateSaldoSupplier = "UPDATE tbl04_supplier SET SALDO = SALDO + $params[GRANDTOT] 
                                        WHERE KDSUPPLIER = '$params[KDSUPPLIER]'";
                                        $this->db->query("$sqlUpdateSaldoSupplier");
                                    }
                                    // Get Kode Pembelian
                                    $this->db->where('UEXEC', getUserID());
                                    $this->db->where('NOFAKTUR', $params['NOFAKTUR']);
                                    $this->db->where('KDSUPPLIER', $params['KDSUPPLIER']);
                                    $this->db->order_by('KDBL', 'DESC');
                                    $this->db->limit(1);
                                    $rsBeli = $this->db->get('tbl04_pembelian')->row_array();
                                    $KDBL = $rsBeli['KDBL'];

                                    $sqlItemBeli = "SELECT * FROM tbl04_temp_pembelian WHERE UEXEC='" . getUserID() . "'";
                                    $resItem = $this->db->query("$sqlItemBeli")->result_array();
                                    foreach ($resItem as $item) {
                                        /*$SUBTOTAL = $item['SUBTOTAL']; //199200
                                        $JMLBELI = $item['JMLBELI']; //200
                                        $nDiskon = $SUBTOTAL/($params['TOTFAKTUR']-$params['TOTDISKON_ITEM'])*$params['DISKON_GLOBAL']; //199200/(4999160-0)*0
                                        $nOngkir = $SUBTOTAL/($params['TOTFAKTUR']-$params['TOTDISKON_ITEM'])*$params['ONGKIR'];
                                        //199200/(4999160-0)*0
                                        $nPPN_Item = ($SUBTOTAL - $nDiskon) * $params['TOTPPN'];
                                        //(199200-0)*499916
                                        $HMODAL = ($SUBTOTAL - $nDiskon + $nOngkir + $nPPN_Item) / $JMLBELI;*/

                                        $SUBTOTAL = $item['SUBTOTAL'] + $item['HDISKON'];
                                        $JMLBELI = $item['JMLBELI'];
                                        $nDiskonGlobalItem = ($SUBTOTAL / $params['TOTFAKTUR']) * $params['DISKON_GLOBAL'];
                                        $nOngkir = ($SUBTOTAL / $params['TOTFAKTUR']) * $params['ONGKIR'];
                                        //$nPPN_Item = ($SUBTOTAL/$params['TOTFAKTUR']) * $params['TOTPPN'];
                                        if ($params["JENIS_TRANS"] == 1) $nPPN_Item = 0;
                                        else  $nPPN_Item = ($item["SUBTOTAL"] - $nDiskonGlobalItem) / 10;


                                        $HMODAL = ($SUBTOTAL - $item['HDISKON'] - $nDiskonGlobalItem + $nOngkir + $nPPN_Item) / $JMLBELI;
                                        $HJUAL = 1.2 * $HMODAL;
                                        $dataItem = array(
                                            'KDBL' => $KDBL,
                                            'KDBRG' => $item['KDBRG'],
                                            'NMBRG' => $item['NMBRG'],
                                            'EXPDATE' => $item['EXPDATE'],
                                            'HBELI' => $item['HBELI'],
                                            'JMLBELI' => $JMLBELI,
                                            'HDISKON' => $item['HDISKON'],
                                            'SUBTOTAL' => $SUBTOTAL,
                                            'HMODAL' => $HMODAL,
                                            'TGLBELI' => $params['TGLFAKTUR']
                                        );
                                        $hjual_baru[] = array(
                                            'KDBRG' => $item['KDBRG'],
                                            'HJUAL' => $HJUAL,
                                        );
                                        $d[] = array('nOnkir' => $nOngkir, 'nDiskon' => $nDiskonGlobalItem, 'nPPN' => $nPPN_Item, 'hModal' => $HMODAL);
                                        $this->db->insert('tbl04_pembelian_detail', $dataItem);
                                    }

                                    $this->db->update_batch('tbl04_barang', $hjual_baru, 'KDBRG');
                                    $this->db->query("DELETE FROM tbl04_temp_pembelian WHERE UEXEC='" . getUserID() . "'");

                                    $response['code'] = 200;
                                    $response['message'] = "Simpan data sukses.";
                                    $response['data']   = $d;
                                    $response['csrf'] = $this->security->get_csrf_hash();
                                } else {
                                    $response['code'] = 403;
                                    $response['message'] = "Ops. Query error! Silahkan hubungi farmasi.";
                                    $response['csrf'] = $this->security->get_csrf_hash();
                                }
                            }
                        } else {
                            $response['code'] = 404;
                            $response['message'] = "Ops. Item barang masih kosong.";
                            $response['csrf'] = $this->security->get_csrf_hash();
                        }
                    }
                } else {
                    $response['code'] = 405;
                    $response['message'] = "Ops. Variable tidak ditemukan.\nCoba ulangi kembali.";
                    $response['csrf'] = $this->security->get_csrf_hash();
                }
            } else {
                $response['code'] = 406;
                $response['message'] = "Ops. Method tidak ditemukan.\nCoba ulangi kembali.";
                $response['csrf'] = $this->security->get_csrf_hash();
            }
        } else {
            $response['code'] = 407;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
            $response['csrf'] = $this->security->get_csrf_hash();
        }
        echo json_encode($response);
    }

    function update_transaksi()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $KDBRG = $this->input->post('KDBRG');
            $IDX = $this->input->post('IDX');
            $KDLOKASI = $this->input->post('KDLOKASI');
            $TGLMASUK = $this->input->post('TGLMASUK');

            $oldupdate = array(
                'EXPDATE'   => $this->input->post('OLDEXPDATE'),
                'HBELI'     => $this->input->post('OLDHBELI'),
                'JMLBELI'   => $this->input->post('OLDJMLBELI'),
                'HDISKON'   => $this->input->post('OLDHDISKON'),
                'SUBTOTAL'  => $this->input->post('OLDSUBTOTAL'),
                'HMODAL'    => $this->input->post('OLDHMODAL'),
            );
            $update = array(
                'EXPDATE'   => setDateEng(trim($this->input->post('EXPDATE', true))),
                'HBELI'     => str_replace(",", "", trim($this->input->post('HBELI', true))),
                'JMLBELI'   => str_replace(",", "", trim($this->input->post('JMLBELI', true))),
                'HDISKON'   => str_replace(",", "", trim($this->input->post('HDISKON', true))),
                'SUBTOTAL'  => str_replace(",", "", trim($this->input->post('SUBTOTAL', true))),
                'HMODAL'    => str_replace(",", "", trim($this->input->post('HMODAL', true))),
            );


            $SISA = $this->pembelian_model->cekStok($KDBRG, $KDLOKASI, $TGLMASUK, $oldupdate["EXPDATE"], $oldupdate["HMODAL"]);


            //Cek apakah barang sudah berkurang dari jumlah masuk 
            if ($SISA >= $oldupdate["JMLBELI"]) {
                // Jika Stok Barang Masih Belum berkurang
                // Kurangi Sejumlah Stok lama kemudian tambahkan stok barang baru
                // Insert Log
                //Update detail Transaksi
                $this->pembelian_model->updateTransaksi($update, $IDX);
                $log[] = array(
                    'KDBRG'     => $this->input->post('KDBRG'),
                    'HMODAL'    => $this->input->post('OLDHMODAL'),
                    'TGLEXP'    => $this->input->post('OLDEXPDATE'),
                    'TGLBELI'   => $this->input->post('TGLMASUK'),
                    'NOREFF'    => $this->input->post('KDBL'),
                    'DTTRANS'   => $this->input->post('KDBRG'),
                    'JTRANS'    => 'UT',
                    'KDLOKASI'  => $this->input->post('KDLOKASI'),
                    'JMASUK'    => 0,
                    'JKELUAR'   => $this->input->post('OLDJMLBELI'),
                    'UEXEC'     => getUserID()
                );
                $log[] = array(
                    'KDBRG'     => $this->input->post('KDBRG'),
                    'HMODAL'    => str_replace(",", "", trim($this->input->post('HMODAL', true))),
                    'TGLEXP'    => setDateEng(trim($this->input->post('EXPDATE', true))),
                    'TGLBELI'   => $this->input->post('TGLMASUK'),
                    'NOREFF'    => $this->input->post('KDBL'),
                    'DTTRANS'   => $this->input->post('KDBRG'),
                    'JTRANS'    => 'UT',
                    'KDLOKASI'  => $this->input->post('KDLOKASI'),
                    'JMASUK'    => str_replace(",", "", trim($this->input->post('JMLBELI', true))),
                    'JKELUAR'   => 0,
                    'UEXEC'     => getUserID()
                );
                $this->db->insert_batch('tbl04_log_transaksi', $log);
                $response['code'] = 200;
                $response['message'] = "Transaksi berhasil di update";
            } else {
                // Jika sudah berkurang
                // Kurangi stok sejumlah sisa
                /*$log[] = array(
                    'KDBRG'     => $this->input->post('KDBRG'),
                    'HMODAL'    => $this->input->post('OLDHMODAL'),
                    'TGLEXP'    => $this->input->post('OLDEXPDATE'),
                    'TGLBELI'   => $this->input->post('TGLMASUK'),
                    'NOREFF'    => $this->input->post('KDBL'),
                    'DTTRANS'   => date('Y-m-d'),
                    'JTRANS'    => 'UT',
                    'KDLOKASI'  => $this->input->post('KDLOKASI'),
                    'JMASUK'    => 0,
                    'JKELUAR'   => $SISA,
                    'UEXEC'     => getUserID()
                );
                //Tambahkan Sejumlah barang masuk
                $JMLKELUAR = $oldupdate["JMLBELI"] - $SISA;
                $JMLBELI = str_replace(",", "", trim($this->input->post('JMLBELI', true))) - $JMLKELUAR;
                $log[] = array(
                    'KDBRG'     => $this->input->post('KDBRG'),
                    'HMODAL'    => str_replace(",", "", trim($this->input->post('HMODAL', true))),
                    'TGLEXP'    => setDateEng(trim($this->input->post('EXPDATE', true))),
                    'TGLBELI'   => $this->input->post('TGLMASUK'),
                    'NOREFF'    => $this->input->post('KDBL'),
                    'DTTRANS'   => date('Y-m-d'),
                    'JTRANS'    => 'UT',
                    'KDLOKASI'  => $this->input->post('KDLOKASI'),
                    'JMASUK'    => $JMLBELI,
                    'JKELUAR'   => 0,
                    'UEXEC'     => getUserID()
                );
                $this->db->insert_batch('tbl04_log_transaksi', $log);*/
                $response['code'] = 201;
                $response['message'] = "Maaf Barang Tidak bisa di update karena barang sudah dimutasi";
            }

            //Jika Sisa Barang  0 
        } else {
            $response['code'] = 407;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
            $response['csrf'] = $this->security->get_csrf_hash();
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    function cetak()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (isset($_GET['kode'])) {
                if ($_GET['kode'] == "") {
                    echo "<script>alert('Ops. Data tidak boleh kosong. Silahkan coba kembali');
                    window.history.back();
                    </script>";
                } else {
                    $queCommand = "SELECT * FROM tbl04_pembelian WHERE KDBL = '$_GET[kode]'";
                    $cekCommand = $this->db->query("$queCommand");
                    if ($cekCommand->num_rows() > 0) {
                        $x = $cekCommand->row_array();
                        $this->db->where('KDBL', $_GET['kode']);
                        $x['dataPreview'] = $this->db->get('tbl04_pembelian_detail');
                        $this->load->view('trans_pembelian/print_preview', $x);
                    } else {
                        echo "<script>alert('Ops. Data tidak ditemukan. Silahkan coba kembali');
                        window.history.back();</script>";
                    }
                }
            } else {
                echo "<script>alert('Ops. Kode request tidak ditemukan. Silahkan coba kembali');
                window.history.back();
                </script>";
            }
        } else {
            echo "<script>alert('Ops. Ada kesalahan request. Silahkan coba kembali');
            window.history.back();
            </script>";
        }
    }
    function hapusTemp()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['IDX'])) {
                    $IDX = $this->input->post('IDX', true);
                    if ($IDX == "") {
                        $response['code'] = 402;
                        $response['message'] = "Ops. Data tidak boleh kosong.";
                        $response['csrf'] = $this->security->get_csrf_hash();
                    } else {
                        $this->db->where('IDX', $IDX);
                        $cekCommand = $this->db->delete('tbl04_temp_pembelian');
                        if ($cekCommand) {
                            $response['code'] = 200;
                            $response['message'] = "Delete Sukses";
                            $response['csrf'] = $this->security->get_csrf_hash();
                        } else {
                            $response['code'] = 401;
                            $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                            $response['csrf'] = $this->security->get_csrf_hash();
                        }
                    }
                } else {
                    $response['code'] = 403;
                    $response['message'] = "Ops. Variable tidak ditemukan.\nCoba ulangi kembali.";
                    $response['csrf'] = $this->security->get_csrf_hash();
                }
            } else {
                $response['code'] = 404;
                $response['message'] = "Ops. Method tidak ditemukan.\nCoba ulangi kembali.";
                $response['csrf'] = $this->security->get_csrf_hash();
            }
        } else {
            $response['code'] = 405;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
            $response['csrf'] = $this->security->get_csrf_hash();
        }
        echo json_encode($response);
    }
    function emptyTemp()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $this->db->where('UEXEC', getUserID());
            $cekCommand = $this->db->delete('tbl04_temp_pembelian');
            if ($cekCommand) {
                $response['code'] = 200;
                $response['message'] = "Pengosongan Temporary Pembelian Sukses";
            } else {
                $response['code'] = 401;
                $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
            }
        } else {
            $response['code'] = 402;
            $response['message'] = "Ops. Sesi anda telah berubah!\nSilahkan login kembali";
        }
        $response['csrf'] = $this->security->get_csrf_hash();
        echo json_encode($response);
    }


    /**
     * Batal
     */
    function batalRecord()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) :
            $validStok = TRUE;
            $UEXEC = getUserID();
            $KDBL = $_POST['KDBL'];
            $this->db->where('KDBL', $_POST['KDBL']);
            $resBL = $this->db->get('tbl04_pembelian')->row_array();
            $resItem = $this->db->query("SELECT * FROM tbl04_pembelian_detail WHERE KDBL='$KDBL'")->result_array();

            foreach ($resItem as $item) {
                $cek = $this->db->query("SELECT * FROM stok_barang_fifo 
                WHERE KDLOKASI='$resBL[KDLOKASI]' AND TGLBELI='$resBL[TGLTERIMA]'
                AND KDBRG='$item[KDBRG]' AND HMODAL=$item[HMODAL] AND JSTOK>=$item[JMLBELI]");
                if (!($cek->num_rows() > 0)) {
                    $validStok = FALSE;
                    $NMBRG = $item['NMBRG'];
                    break;
                }
            }

            if ($validStok) {
                // Update Saldo Utang Suppliyer Jika Kredit
                if ($resBL['PEMBAYARAN'] == 'CREDIT') {
                    $sqlUpdateSupplier = "UPDATE tbl04_supplier SET SALDO=SALDO-$resBL[GRANDTOT] 
                    WHERE KDSUPPLIER=$resBL[KDSUPPLIER]";
                    $this->db->query("$sqlUpdateSupplier");
                }

                $dataItem = array(
                    'KDBL' => $KDBL,
                    'ALASAN' => $_POST['ALASAN'],
                    'UEXEC' => $UEXEC
                );
                $this->db->insert('tbl04_pembelian_batal', $dataItem);

                $this->db->where('UEXEC', $UEXEC);
                $this->db->where('KDBL', $KDBL);
                $res_Batal_Beli = $this->db->get('tbl04_pembelian_batal')->row_array();
                $KDBL_RET = $res_Batal_Beli['KDBL_RET'];

                foreach ($resItem as $itemOP) {
                    // Insert Item Batal
                    $params_batal = array(
                        'KDBL_RET' => $KDBL_RET,
                        'KDBRG' => $itemOP['KDBRG'],
                        'NMBRG' => $itemOP['NMBRG'],
                        'HMODAL' => $itemOP['HMODAL'],
                        'TGLBELI' => $itemOP['TGLBELI'],
                        'TGLEXP' => $itemOP['EXPDATE'],
                        'JMLRET' => $itemOP['JMLBELI']
                    );
                    $this->db->insert('tbl04_pembelian_batal_detail', $params_batal);
                }

                $params = array(
                    'code' => 200,
                    'message'   => 'Retur Transaksi Pembelian Success',
                    'csrf'  => $this->security->get_csrf_hash()
                );
                //$response['csrf'] = $this->security->get_csrf_hash();    
            } else {
                $params = array(
                    'code'    => 201,
                    'message' => 'Obat ' . $NMBRG . ' tidak bisa diretur.' . chr(10) . 'Jumlah obat telah berkurang',
                    'csrf'  => $this->security->get_csrf_hash()
                );
            }
        else :
            $params = array(
                'code' => 401,
                'message'   => 'Sesi Anda Telah Berakhir. Silahkan Login Kembali',
                'csrf'  => $this->security->get_csrf_hash()
            );
        endif;
        header('Content-Type: application/json');
        echo json_encode($params);
    }

    function updatenofaktur()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) :
            $nofaktur = $this->input->post('faktur_baru');

            if (!empty($nofaktur)) {
                $data = array('NOFAKTUR' => $this->input->post('faktur_baru'));
                $this->db->where('KDBL', $this->input->post('kdbl'));
                $this->db->update('tbl04_pembelian', $data);
                $params = array(
                    'code' => 200,
                    'message'   => 'NO Faktur Berhasil Di Update'
                );
            } else {
                $params = array(
                    'code' => 201,
                    'message'   => 'NO Faktur Baru Masih Kosong'
                );
            }

        else :
            $params = array(
                'code' => 401,
                'message'   => 'Sesi Anda Telah Berakhir. Silahkan Login Kembali'
            );
        endif;
        header('Content-Type: application/json');
        echo json_encode($params);
    }
    function cekhpp($kdbrg)
    {
        $data = $this->pembelian_model->cekHpp($kdbrg, $this->session->userdata('kdlokasi'));
        if (!empty($data)) {
            $res = array('status' => true, 'hpp' => $data->HMODAL);
        } else {
            $res = array('status' => false, 'hpp' => 0);
        }
        header('Content-Type: application/json');
        echo json_encode($res);
    }
    function lock($kdjl)
    {
        $pin = $this->pembelian_model->lock($kdjl);
        $res = array('status' => true, 'message' => 'Data faktur sudah bisa diedit dengan memasukkan pin ' . $pin);
        $this->session->set_flashdata('message', 'Data faktur sudah bisa diedit dengan memasukkan pin <br><b>' . $pin . "</b>");
        header('Content-Type: application/json');
        echo json_encode($res);
    }

    function unlock($kdjl)
    {
        $pin = $this->pembelian_model->unlock($kdjl);
        $res = array('status' => true, 'message' => 'Data faktur tidak bisa lagi diedit');
        $this->session->set_flashdata('message',  'Data faktur tidak bisa lagi diedit');
        header('Content-Type: application/json');
        echo json_encode($res);
    }
    function cekpin()
    {
        $idx = $this->input->post('IDX');
        $pin = $this->input->post('PIN');
        $kdbl = $this->input->post('KDBL');
        $KDLOKASI = $this->input->post('KDLOKASI');
        $TGLTERIMA = $this->input->post('TGLTERIMA');
        $row = $this->pembelian_model->cekfaktur($idx, $pin);
        if ($row) {
            //$row_temp = $this->pembelian_model->getTempByid($idx);
            $JSTOK = $this->pembelian_model->cekStok($row->KDBRG, $row->KDLOKASI, $row->TGLTERIMA, $row->EXPDATE, $row->HMODAL);
            $res = array('status' => true, 'message' => 'Silahkan melakukan edit transaksi', 'data' => $row, 'JSTOK' => $JSTOK);
        } else {
            $res = array('status' => false, 'message' => 'Pin yang anda masukkan salah, Silahkan hubungi admin farmasi untuk mendapatkan pin yang baru');
        }
        header('Content-Type: application/json');
        echo json_encode($res);
    }
}
