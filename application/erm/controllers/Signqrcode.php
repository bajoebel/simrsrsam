<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Signqrcode extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Rajal_model", "rajal");
        $this->load->model("Signqrcode_model", "signqrcode");
        date_default_timezone_set("Asia/Bangkok");
    }

    public function sign_konsul_internal() {
        $idx = $this->input->post("idx");
        $id = $this->input->post("id");
        $nomr = $this->input->post("nomr");
        $dokter = $this->input->post("dokter");
        $pass = $this->input->post("pass");
        $cek = cekPasswordUser($pass,$dokter);
        if (!$cek) {
            echo json_encode(["status"=>false,"msg"=> "Password pin salah"]);
            exit();
        }
        $param = [
            "id" => $id,
            "tabel" => "rj_konsul_internal",
            "dokter" => $dokter 
        ];
        $data = $this->rajal->getKonsulInternalById($nomr,$idx,$id);
        if ($data) {    
            $code = base64_encode(json_encode($param));
            $code_detail = base64_encode(json_encode($data));
            $update = $this->signqrcode->updateSignKonsulInternal($id,$code,$code_detail);
            echo json_encode(["status"=>true,"msg"=>"QRCODE berhasil di generate"]); 
        } else {
            echo json_encode(["status"=>false,"msg"=>"QRCODE gagal di generate"]); 
        }
    }

    public function sign_konsul_internal_jawab() {
        $idx = $this->input->post("idx");
        $id = $this->input->post("id");
        $nomr = $this->input->post("nomr");
        $dokter = $this->input->post("dokter");
        $pass = $this->input->post("pass");
        $cek = cekPasswordUser($pass,$dokter);
        if (!$cek) {
            echo json_encode(["status"=>false,"msg"=> "Password pin salah"]);
            exit();
        }
        $param = [
            "id" => $id,
            "tabel" => "rj_konsul_internal",
            "dokter" => $dokter 
        ];
        $data = $this->rajal->getKonsulInternalById($nomr,$idx,$id);
        if ($data) {    
            $code = base64_encode(json_encode($param));
            $code_detail = base64_encode(json_encode($data));
            $update = $this->signqrcode->updateSignKonsulInternalJawab($id,$code,$code_detail);
            echo json_encode(["status"=>true,"msg"=>"QRCODE berhasil di generate"]); 
        } else {
            echo json_encode(["status"=>false,"msg"=>"QRCODE gagal di generate"]); 
        }
    }
}