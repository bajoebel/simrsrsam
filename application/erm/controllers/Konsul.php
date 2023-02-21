<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Konsul extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Konsul_model","konsul");

    }

    public function insert_hasil_konsul() {
        $id = $this->input->post("id");
        $data = [
            "hasil_konsultasi" => $this->input->post("hasil"),
            "tgl_jawab" => $this->input->post("tgl"),
            "jam_jawab" => $this->input->post("jam"),
            "updated_at" => date("Y-m-d h:i:s"),
            "status_form" => 2
        ];
        $update = $this->konsul->insertHasilKonsul($id,$data);
        if ($update) {
            echo json_encode(["status"=>true,"status_konsul"=>status_permintaan_konsul(2)]);
        } else {
            echo json_encode(["status"=>false]);
        }
    }

    public function update_status_konsul() {
        $id = $this->input->post("id");
        $status = $this->input->post("status");
        $update = $this->konsul->updateStatusKonsulInternal($id,$status);
        if ($update) {
            echo json_encode(["status"=>true,"status_konsul"=>status_permintaan_konsul($status)]);
        } else {
            echo json_encode(["status"=>false,"id"=>$id]);
        }
    }
}