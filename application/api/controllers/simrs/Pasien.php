<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pasien extends CI_Controller {
    public function __construct(){
        parent ::__construct();
        $this->load->model('Api_model');
    }

    function cekpasien(){
        $read       = json_decode(file_get_contents("php://input"));
        $headers    = getallheaders();
        $username   = $headers["X-Username"];
        $password   = $headers["X-Password"];
        $permition=$this->Api_model->cekPermition($username,$password);
        if($permition){
            $nomr=$read->nomr;
            $pasien = $this->Api_model->getPasienByNomr($nomr);
            $pj=$this->Api_model->getPjByNomr($nomr);
            if(empty($pasien)){
                $response=array(
                    'metadata'=>array(
                        'code'	=> 201,
                        'message'	=> "Data Pasien Tidak Ditemukan, Silahkan ambil antrean pasien baru"
                    ),
                );
            }else{
                $response=array(
                    'metadata'=>array(
                        'code'	=> 200,
                        'message'	=> "Data pasien ditemukan, silahkan lanjutkan"
                    ),
                    'response'=>array('pasien'=>$pasien,'pj'=>$pj)
                );
                
            }
        }else{
            $response=array(
                'metadata'=>array(
                    'code'	=> 201,
	                'message'	=> "Maaf Username Atau Password Anda Salah"
                )
	        );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}