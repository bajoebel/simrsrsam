<?php defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('Smart_model');
    }
    function index()
    {
        $ses_state = $this->users_model->cek_session_id();
        if ($ses_state) {
            $y['info']=array();
            $x['header'] = $this->load->view('template/header', '', true);
            $z = setNav("nav_1");
            $x['nav_sidebar'] = $this->load->view('template/nav_sidebar', $z, true);
            $y['rj']='-';
            $y['ri']='-';
            $y['gd']='-';
            // $sekarang = date('Y-m-d');
            // $this->db->where('jns_layanan', 'RJ');
            // $this->db->where('DATE_FORMAT(tgl_masuk,"%Y-%m-%d")', $sekarang);
            // $y["rj"] = $this->db->get('tbl02_pendaftaran')->num_rows();

            // $this->db->where('jns_layanan', 'GD');
            // $this->db->where('DATE_FORMAT(tgl_masuk,"%Y-%m-%d")', $sekarang);
            // $y["gd"] = $this->db->get('tbl02_pendaftaran')->num_rows();

            // $this->db->where('jns_layanan', 'RI');
            // $this->db->where('DATE_FORMAT(tgl_masuk,"%Y-%m-%d")', $sekarang);
            // $y["ri"] = $this->db->get('tbl02_pendaftaran')->num_rows();
            $y['contentTitle'] = "Home";
            $x['content'] = $this->load->view('dashboard/main', $y, true);
            $this->load->view('template/theme', $x);
        } else {
            $sid = getSessionID();
            $url_login = base_url() . 'mr_registrasi.php/login?sid=' . $sid;
            echo "<script>alert('Ops. Sesi anda telah berubah! Silahkan login kembali');
            window.location.href = '$url_login';</script>";
        }
    }
}
