<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rujukan extends CI_Controller {
    function __construct(){
        parent ::__construct();
        $this->load->helper('Vclaim');
    }
    function index(){      
        echo "Service Actived";       
    }
    
    function rujukanBerdasarkanNomorRujukan(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1']) && isset($_POST['param2'])){
                $param1 = $this->input->post('param1',true); // Nomor Rujukan
                $param2 = $this->input->post('param2',true); // 1.Faskes Tingkat 1, 2.Faskes Tingkat 2 
                if($param1 !== "" || $param2 !== ""){
                    if ($param2=="1") {
                        $response = rujukanBerdasarkanNomorRujukanPCare($param1); 
                    }else{
                        $response = rujukanBerdasarkanNomorRujukanRS($param1); 
                    }
                    $data=json_decode($response);
                    if($data->metaData->code==200){
                        // echo $response;exit;
                        $tgl_daftar= date_create($data->response->rujukan->tglKunjungan);
                        $sekarang=date_create(date('Y-m-d'));
                        $interval=$tgl_daftar->diff($sekarang);
                        if($interval->days>90) {
                            $x['metaData']['code'] = 201;
                            $x['metaData']['message'] = "Rujukan Tidak Berlaku Karena Sudah Lebih 90 Hari";
                            $x['response'] = null;
                            $x['lama']=$interval->days;
                            $x['tgl_daftar']=$data->response->rujukan->tglKunjungan;
                            $x['sekarang'] = date('Y-m-d');
                            $response = json_encode($x);
                        }
                    }else{
                        // echo $response
                        // $tgl_daftar= date_create('2021-07-09');
                        // $sekarang=date_create(date('Y-m-d'));
                        // $interval=$tgl_daftar->diff($sekarang);
                        // $x['metaData']['code'] = $data->metaData->code;
                        // $x['metaData']['message'] = $data->metaData->message;
                        // $x['response'] = null;
                        // $x['lama']=$interval->days;
                        // $x['tgl_daftar']='2021-07-09';
                        // $x['sekarang'] = date('Y-m-d');
                        // $response = json_encode($x);
                    }
                    
                    
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

    function rujukanBerdasarkanNomorKartu(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1']) && isset($_POST['param2'])){
                $param1 = $this->input->post('param1',true); // Nomor Kartu
                $param2 = $this->input->post('param2',true); // 1.Faskes Tingkat 1, 2.Faskes Tingkat 2 

                if($param1 !== "" || $param2 !== ""){
                    if ($param2=="1") {
                        $response = rujukanBerdasarkanNomorKartuPCare($param1); 
                    }else{
                        $response = rujukanBerdasarkanNomorKartuRS($param1); 
                    }
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

    function listRujukanBerdasarkanNomorKartu(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1']) && isset($_POST['param2'])){
                $param1 = $this->input->post('param1',true); // Nomor Kartu
                $param2 = $this->input->post('param2',true); // 1.Faskes Tingkat 1, 2.Faskes Tingkat 2 

                if($param1 !== "" || $param2 !== ""){
                    if ($param2=="1") {
                        $response = listRujukanBerdasarkanNomorKartuPCare($param1); 
                    }else{
                        $response = listRujukanBerdasarkanNomorKartuRS($param1); 
                    }
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

