<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Peserta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('Vclaim');
    }
    function index()
    {
        echo "Service Actived";
    }
    function nokartu()
    {
        $response = null;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['param1']) && isset($_POST['param2'])) {
                $param1 = $this->input->post('param1', true); // Nomor Kartu
                $param2 = $this->input->post('param2', true); // Tanggal Pelayanan/SEP - format : yyyy-MM-dd 

                if ($param1 !== "" || $param2 !== "") {
                    $response = getPesertaByKartuBPJS($param1, $param2);
                } else {
                    $x['metaData']['code'] = 201;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            } else {
                $x['metaData']['code'] = 201;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        } else {
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }

    function cekpeserta($param1)
    {
        $response = null;
        $param2 = date('Y-m-d'); // Tanggal Pelayanan/SEP - format : yyyy-MM-dd 

        if ($param1 !== "" || $param2 !== "") {
            $response = getPesertaByKartuBPJS($param1, $param2);
        } else {
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Variable masih ada yang kosong";
            $x['response'] = null;
            $response = json_encode($x);
        }
        header('Content-Type: application/json');
        echo $response;
    }
    function cekbridging()
    {
        $response = getPesertaByKartuBPJS('0001334104007', date('Y-m-d'));
        echo $response;
    }
    function nik()
    {
        $response = null;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['param1']) && isset($_POST['param2'])) {
                $param1 = $this->input->post('param1', true); // Nomor Kartu
                $param2 = $this->input->post('param2', true); // Tanggal Pelayanan/SEP - format : yyyy-MM-dd 
                if ($param1 !== "" || $param2 !== "") {
                    $response = getPesertaByKartuNIK($param1, $param2);
                } else {
                    $x['metaData']['code'] = 201;
                    $x['metaData']['message'] = "Variable masih ada yang kosong";
                    $x['response'] = null;
                    $response = json_encode($x);
                }
            } else {
                $x['metaData']['code'] = 201;
                $x['metaData']['message'] = "Variable tidak diketahui";
                $x['response'] = null;
                $response = json_encode($x);
            }
        } else {
            $x['metaData']['code'] = 201;
            $x['metaData']['message'] = "Method tidak diketahui";
            $x['response'] = null;
            $response = json_encode($x);
        }
        echo $response;
    }
}
