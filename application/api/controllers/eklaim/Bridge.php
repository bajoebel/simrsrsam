<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bridge extends CI_Controller {
    function __construct(){
        parent ::__construct();
        $this->load->helper('Eklaim');
    }

    function index(){      
        echo "Service Actived";       
    }

    function new_claim(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(
                isset($_POST['noKartu']) && 
                isset($_POST['noSep']) && 
                isset($_POST['noMr']) && 
                isset($_POST['nama']) && 
                isset($_POST['tglLahir']['tglLahir']) && 
                isset($_POST['peserta']['kelamin'])
            ){
                $x['metadata']['method'] = "new_claim";

                $x['data']['nomor_kartu']= $this->input->post('peserta',true)['noKartu'];
                $x['data']['nomor_sep']= $this->input->post('noSep',true);
                $x['data']['nomor_rm']= $this->input->post('peserta',true)['noMr'];
                $x['data']['nama_pasien']= $this->input->post('peserta',true)['nama'];
                $x['data']['tgl_lahir']= $this->input->post('peserta',true)['tglLahir'];
                $x['data']['gender']= $this->input->post('peserta',true)['kelamin'];
                
                if(
                    $x['metadata']['method'] !== "" || 
                    $x['data']['nomor_kartu'] !== "" || 
                    $x['data']['nomor_sep'] !== "" || 
                    $x['data']['nomor_rm'] !== "" || 
                    $x['data']['nama_pasien'] !== "" || 
                    $x['data']['tgl_lahir'] !== "" || 
                    $x['data']['gender'] !== ""
                ){
                    // $response = json_encode($x);
                    $response = initJSON(json_encode($x)); 
                    if ($response['metadata']['code'] == 200) {
                        $x['data']['idx'] = null;
                        $x['data']['no_kwitansi'] = $this->input->post('no_kwitansi',true);
                    }
                }else{
                    $x['metaData']['code'] = 401;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            }else{
                $x['metaData']['code'] = 402;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 403;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }

    function delete_patient(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(
                isset($_POST['peserta']['noKartu']) && 
                isset($_POST['noSep']) && 
                isset($_POST['peserta']['noMr']) && 
                isset($_POST['peserta']['nama']) && 
                isset($_POST['peserta']['tglLahir']) && 
                isset($_POST['peserta']['kelamin'])
            ){
                $x['metadata']['method'] = "new_claim";

                $x['data']['nomor_kartu']= $this->input->post('noKartu',true);
                $x['data']['nomor_sep']= $this->input->post('nomor_sep',true);
                $x['data']['nomor_rm']= $this->input->post('nomor_rm',true);
                $x['data']['nama_pasien']= $this->input->post('nama_pasien',true);
                $x['data']['tgl_lahir']= $this->input->post('tgl_lahir',true);
                $x['data']['gender']= $this->input->post('gender',true);
                
                if(
                    $x['metadata']['method'] !== "" || 
                    $x['data']['nomor_kartu'] !== "" || 
                    $x['data']['nomor_sep'] !== "" || 
                    $x['data']['nomor_rm'] !== "" || 
                    $x['data']['nama_pasien'] !== "" || 
                    $x['data']['tgl_lahir'] !== "" || 
                    $x['data']['gender'] !== ""
                ){
                    $response = initJSON(json_encode($x)); 
                }else{
                    $x['metaData']['code'] = 401;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            }else{
                $x['metaData']['code'] = 402;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        }else{
            $x['metaData']['code'] = 403;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }
    

    function cariSEP(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1'])){
                $param1 = $this->input->post('param1',true); // Nomor SEP
                if($param1 !== ""){
                    $response = cariSEP($param1); 
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

    function hapusSEP(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1']) && isset($_POST['param2'])){
                $nosep = $this->input->post('param1',true); // Nomor SEP
                $user = $this->input->post('param2',true); // user pembuat SEP

                if($nosep !== ""){
                    $x['request']['t_sep']['noKartu'] = $nosep;
                    $x['request']['t_sep']['user'] = $user;
                    $response = hapusSEP(json_encode($x)); 
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

