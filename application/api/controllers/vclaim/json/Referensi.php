<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Referensi extends CI_Controller {
    public function __construct(){
        parent ::__construct();
        $this->load->helper('Vclaim');
    }
    public function index(){      
        echo "Service Actived";       
    }
    function diagnosa(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1'])){
                $param1 = $this->input->post('param1',true); // Kode atau Nama Diagnosa
                if($param1 !== ""){
                    $response = getDiagnosa($param1); 
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
    function poli(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1'])){
                $param1 = $this->input->post('param1',true);                
                if($param1 !== ""){
                    $response = getPoli($param1); //  Kode atau Nama Poli
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
    function faskes(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(
                isset($_POST['param1']) &&
                isset($_POST['param2'])
            ){
                $param1 = $this->input->post('param1',true); // nama atau kode faskes
                $param2 = $this->input->post('param2',true); // Jenis Faskes (1. Faskes 1, 2. Faskes 2/RS)
                if($param1 !== "" || $param2 !== ""){
                    $response = getFaskes($param1,$param2); 
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
    function dpjp(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(
                isset($_POST['param1']) &&
                isset($_POST['param2']) &&
                isset($_POST['param3'])
            ){
                $param1 = $this->input->post('param1',true); // Jenis Pelayanan (1. Rawat Inap, 2. Rawat Jalan)
                $param2 = $this->input->post('param2',true); // Tgl.Pelayanan/SEP (yyyy-mm-dd) 2019-05-10
                $param3 = $this->input->post('param3',true); // Kode Spesialis/Subspesialis (Ex:IGD)
                if($param1 !== "" || $param2 !== "" || $param3 !== ""){
                    $response = getDPJP($param1,$param2,$param3); 
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
    function provinsi(){
        echo getProvinsi();
    }
    function kabupaten(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1'])){
                $param1 = $this->input->post('param1',true); // Kode Propinsi
                if($param1 !== ""){
                    $response = getKabupaten($param1); 
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
    function kecamatan(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1'])){
                $param1 = $this->input->post('param1',true); // Kode Kabupaten
                if($param1 !== ""){
                    $response = getKecamatan($param1); 
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
    function procedure(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1'])){
                $param1 = $this->input->post('param1',true); // nama atau kode procedure
                if($param1 !== ""){
                    $response = getProcedure($param1); 
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
    function kelasrawat(){
        echo getKelasRawat();
    }
    function dokter(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1'])){
                $param1 = $this->input->post('param1',true); // nama dokter/DPJP
                if($param1 !== ""){
                    $response = getDokter($param1); 
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
    function spesialistik(){
        echo getSpesialistik(); 
    }
    function ruangrawat(){
        echo getRuangRawat(); 
    }
    function carakeluar(){
        echo getCaraKeluar(); 
    }
    function pascapulang(){
        echo getPascaPulang(); 
    }

}

