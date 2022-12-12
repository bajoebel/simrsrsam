<?php defined('BASEPATH') or exit('No direct script access allowed');
class Import extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
    }
    function index($limit = 20)
    {
        $data = $this->users_model->getImport($limit);
        //echo str_pad('1', 20, "0", STR_PAD_LEFT);
        //exit;
        if (!empty($data)) {
            $no = 0;
            foreach ($data as $row) {
                $no++;
                $kode = $this->users_model->getRegunit($row->jns_layanan, $row->format_tgl_masuk, $row->id_ruang);
                $this->db->query("UPDATE db_rspp.tbl02_pendaftaran SET reg_unit = '" . $kode['reg_unit'] . "', no_urut_unit='" . $kode["urut"] . "' WHERE idx='" . $row->idx . "'");
                echo "<br>" . $no . ". " . $kode['reg_unit'] . " An " . $row->nama_pasien;
            }
            header("Refresh:0");
        } else {
            echo "Mapping Kode Unit Sudah Selesai...";
        }

        //header('location:' . base_url() . "mr_registrasi.php/import/10");
    }
    function test()
    {
        echo date('Y-m-d H:i:s');
        header("Refresh:0");
    }
}
