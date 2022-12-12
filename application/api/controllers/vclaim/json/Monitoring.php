<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Monitoring extends CI_Controller {
    function __construct(){
        parent ::__construct();
        $this->load->helper('Vclaim');
    }
    
    function index(){      
        echo "Service Actived";       
    }

    function dataKunjungan(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1']) && isset($_POST['param2'])){
                $param1 = $this->input->post('param1',true); // Tanggal SEP format: yyyy-mm-dd
                $param2 = $this->input->post('param2',true); // Jenis Pelayanan (1. Inap 2. Jalan)

                if($param1 !== "" || $param2 !== ""){
                    $response = dataKunjungan($param1,$param2); 
                }else{
                    $x['metaData']['code'] = 201;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            }else{
                $x['metaData']['code'] = 201;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }

    function dataKlaim(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1']) && isset($_POST['param2'])){
                $param1 = $this->input->post('param1',true); // Tanggal Pulang format: yyyy-mm-dd
                $param2 = $this->input->post('param2',true); // Jenis Pelayanan (1. Inap 2. Jalan)
                $param3 = $this->input->post('param3',true); // Status Klaim (1. Proses Verifikasi 2. Pending Verifikasi 3. Klaim)

                if($param1 !== "" || $param2 !== "" || $param3 !== ""){
                    $response = dataKlaim($param1,$param2,$param3); 
                }else{
                    $x['metaData']['code'] = 201;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            }else{
                $x['metaData']['code'] = 201;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }
    
    function dataHistoriPelayananPeserta(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1']) && isset($_POST['param2']) && isset($_POST['param3'])){
                $param1 = $this->input->post('param1',true); // No.Kartu Peserta
                $param2 = $this->input->post('param2',true); // Tgl Mulai Pencarian (yyyy-mmdd)
                $param3 = $this->input->post('param3',true); // Tgl Akhir Pencarian (yyyy-mmdd)

                if($param1 !== "" || $param2 !== "" || $param3 !== ""){
                    $response = dataHistoriPelayananPeserta($param1,$param2,$param3); 
                }else{
                    $x['metaData']['code'] = 201;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            }else{
                $x['metaData']['code'] = 201;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }

    function dataKlaimJaminanJasaRaharja(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1']) && isset($_POST['param2'])){
                $param1 = $this->input->post('param1',true); // Tgl Mulai Pencarian (yyyy-mmdd)
                $param2 = $this->input->post('param2',true); // Tgl Akhir Pencarian (yyyy-mmdd)
                
                if($param1 !== "" || $param2 !== ""){
                    $response = dataKlaimJaminanJasaRaharja($param1,$param2); 
                }else{
                    $x['metaData']['code'] = 201;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            }else{
                $x['metaData']['code'] = 201;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }
}

