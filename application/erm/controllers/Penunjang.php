<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Penunjang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Penunjang_model","penunjang");
    }
    public function insert_hasil_penunjang() {
        $id = $this->input->post("id");
        $hasil = $this->input->post("hasil");
        $update = $this->penunjang->insertHasilPenunjang($id,$hasil);
        if ($update) {
            echo json_encode(["status"=>true]);
        } else {
            echo json_encode(["status"=>false]);
        }
    }

    public function update_status_permintaan() {
        $id = $this->input->post("id");
        $status = $this->input->post("status");
        $update = $this->penunjang->updateStatusPermintaanPenunjang($id,$status);
        if ($update) {
            echo json_encode(["status"=>true,"status_permintaan"=>status_permintaan_penunjang($status)]);
        } else {
            echo json_encode(["status"=>false,"id"=>$id]);
        }
    }

}