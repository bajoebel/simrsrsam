<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class wsLokal extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    function index(){
        echo "Web Service Lokal Actived";
    }
    function simpan(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(
                isset($_POST['koderuang']) && 
                isset($_POST['namaruang']) &&
                isset($_POST['kodekelas']) &&
                isset($_POST['namakelas']) &&
                isset($_POST['kapasitas']) &&
                isset($_POST['tersedia']) &&
                isset($_POST['tersediapria']) && 
                isset($_POST['tersediawanita']) && 
                isset($_POST['tersediapriawanita']) 
            ){
                $koderuang = trim($this->input->post('koderuang',true));
                $namaruang = trim($this->input->post('namaruang',true));
                $kodekelas = trim($this->input->post('kodekelas',true));
                $namakelas = trim($this->input->post('namakelas',true));
                $kapasitas = trim($this->input->post('kapasitas',true));
                $tersedia = trim($this->input->post('tersedia',true));
                $tersediapria = trim($this->input->post('tersediapria',true));
                $tersediawanita = trim($this->input->post('tersediawanita',true));
                $tersediapriawanita = trim($this->input->post('tersediapriawanita',true));

                $SQL = "SELECT * FROM tbl_ketersedian_kamar WHERE koderuang='$koderuang' AND kodekelas='$kodekelas'";
                $cek = $this->db->query("$SQL");
                if ($cek->num_rows() > 0) {
                    $params = array(
                        'kapasitas' => $kapasitas,
                        'tersedia' => $tersedia,
                        'tersediapria' => $tersediapria,
                        'tersediawanita' => $tersediawanita,
                        'tersediapriawanita' => $tersediapriawanita
                    );
                    $this->db->where('koderuang',  $koderuang);
                    $this->db->where('kodekelas',  $kodekelas);
                    $cekCommand = $this->db->update('tbl_ketersedian_kamar',$params); 
                    if($cekCommand){
                        $qParams = array(
                            'kodekelas' => $kodekelas,
                            'koderuang' => $koderuang,
                            'namaruang' => $namaruang,
                            'kapasitas' => $kapasitas,
                            'tersedia' => $tersedia,
                            'tersediapria' => $tersediapria,
                            'tersediawanita' => $tersediawanita,
                            'tersediapriawanita' => $tersediapriawanita
                        );
                        $response['code'] = 201;
                        $response['message'] = "Update data sukses.";
                    }else{
                        $response['code'] = 401;
                        $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                    }                            
                }else{
                    $params = array(
                        'koderuang' => $koderuang,
                        'namaruang' => $namaruang,
                        'kodekelas' => $kodekelas,
                        'namakelas' => $namakelas,
                        'kapasitas' => $kapasitas,
                        'tersedia' => $tersedia,
                        'tersediapria' => $tersediapria,
                        'tersediawanita' => $tersediawanita,
                        'tersediapriawanita' => $tersediapriawanita
                    );
                    $cekCommand = $this->db->insert('tbl_ketersedian_kamar',$params); 
                    if($cekCommand){
                        $response['code'] = 200;
                        $response['message'] = "Simpan data sukses";
                    }else{
                        $response['code'] = 402;
                        $response['message'] = "Ops. Query error! Silahkan hubungi administrator.";
                    }
                }
            }else{
                $response['code'] = 403;
                $response['message'] = "Ops. Variable tidak ditemukan. Coba ulangi kembali.";
            }
        }else{
            $response['code'] = 404;
            $response['message'] = "Ops. Method tidak diizinkan. Coba ulangi kembali.";
        }
        echo json_encode($response);
    }

    function get_kamar(){
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            $dataArr = $this->db->get('tbl_ketersedian_kamar');
            if ($dataArr->num_rows() > 0) {
                $resArr = $dataArr->result_array();
                $response['code'] = 200;
                $response['message'] = "";
                $response['list'] = $resArr;
            }else{
                $response['code'] = 401;
                $response['message'] = "Ops. Data tidak ditemukan. Periksa data anda";
            }
        }else{
            $response['code'] = 402;
            $response['message'] = "Ops. Method tidak diizinkan.";
        }
        echo json_encode($response);
    }

    function kirim_ketersedian_kamar(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(
                isset($_POST['kodekelas']) && 
                isset($_POST['koderuang']) && 
                isset($_POST['namaruang']) && 
                isset($_POST['kapasitas']) && 
                isset($_POST['tersedia']) && 
                isset($_POST['tersediapria']) && 
                isset($_POST['tersediawanita']) && 
                isset($_POST['tersediapriawanita']) 
            ){
                $kodekelas = trim($this->input->post('kodekelas',true));
                $koderuang = trim($this->input->post('koderuang',true));
                $namaruang = trim($this->input->post('namaruang',true));
                $kapasitas = trim($this->input->post('kapasitas',true));
                $tersedia = trim($this->input->post('tersedia',true));
                $tersediapria = trim($this->input->post('tersediapria',true));
                $tersediawanita = trim($this->input->post('tersediawanita',true));
                $tersediapriawanita = trim($this->input->post('tersediapriawanita',true));

                $params = array(
                    'kodekelas' => $kodekelas,
                    'koderuang' => $koderuang,
                    'namaruang' => $namaruang,
                    'kapasitas' => $kapasitas,
                    'tersedia' => $tersedia,
                    'tersediapria' => $tersediapria,
                    'tersediawanita' => $tersediawanita,
                    'tersediapriawanita' => $tersediapriawanita
                );
                $qUpdate = $this->updateBed(json_encode($params));   
                if ($qUpdate['code'] == 1){
                    $response['code'] = 201;
                    $response['message'] = array($qUpdate['code'],$qUpdate['message']);                                
                }else{
                    $qInsert = $this->createBed(json_encode($params));  
                    if ($qInsert['code'] == 1) {
                        $response['code'] = 200;
                        $response['message'] = array($qInsert['code'],$qInsert['message']);
                    }else{
                        $response['code'] = 401;
                        $response['message'] = array($qInsert['code'],$qInsert['message']);
                    }
                }
            }else{
                $response['code'] = 402;
                $response['message'] = "Ops. Data tidak ditemukan. Periksa data anda";
            }
        }else{
            $response['code'] = 403;
            $response['message'] = "Ops. Data tidak ditemukan. Periksa data anda";
        }
        echo json_encode($response);
    }
}
