<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Resepapi extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model("apiresep_model","resep");
    }

    function get_resep() {
        $dari = "";
        $sampai = "";
        $response = [];
        if (!empty($_POST['uid']) && !empty($_POST['pass'])) {
            if ($_POST['uid']==API_UID && $_POST['pass']==API_PASS) {
                if (!empty($_POST['id'])) {
                    $id = $_POST['id'];
                    $data = $this->resep->getPermintaanResepById($id);
                } else {
                    $dari = $_POST['dari']?$_POST['dari']:"";
                    $sampai = $_POST['sampai']?$_POST['sampai']:"";
                    $data = $this->resep->getPermintaanResep($dari,$sampai);
                }
                $response = [
                    "status"=> 200,
                    "msg"=> "query success",
                    "data"=> $data
                ];
            } else {
                $response = [
                    "status"=> 403,
                    "msg"=> "The user is unauthorized to access the requested resource",
                ];
            }
        } else {
            $response = [
                "status"=> 400,
                "msg"=> "Bad Request",
            ];
        }
        header("Content-Type:application/json");
        echo json_encode($response);
    }

    function get_resep_detail() {
        $response = [];
        if (!empty($_POST['uid']) && !empty($_POST['pass'])) {
            if ($_POST['uid']==API_UID && $_POST['pass']==API_PASS) {
                $id = $_POST['id_resep'];
                $data_get = $this->resep->getPermintaanResepDetail($id);
                if ($data_get) {
                    $data = $data_get;
                } else {
                    $data = [];
                }
                $response = [
                    "status"=> 200,
                    "msg"=> "query success",
                    "data"=> $data
                ];
            } else {
                $response = [
                    "status"=> 403,
                    "msg"=> "The user is unauthorized to access the requested resource",
                ];
            }
          
        } else {
            $response = [
                "status"=> 400,
                "msg"=> "Bad Request",
            ];
        }
        header("Content-Type:application/json");
        echo json_encode($response);
    }

    function update_status_resep() {
        $response = [];
        if (!empty($_POST['uid']) && !empty($_POST['pass'])) {
            if ($_POST['uid']==API_UID && $_POST['pass']==API_PASS) {
                if (!empty($_POST["id"]) && !empty($_POST["status"])) {
                    $id = $_POST['id'];
                    $status = $_POST['status'];
                    $data_update = $this->resep->updatePermintaanResep($id,$status);
                } else {
                    $data_update = false;
                }
                if ($data_update) {
                    $response = [
                        "status"=> 200,
                        "msg"=> "Update data berhasil",
                    ];
                } else {
                    $response = [
                        "status"=> 204,
                        "msg"=> "nothing to update",
                    ];
                }
            } else {
                $response = [
                    "status"=> 403,
                    "msg"=> "The user is unauthorized to access the requested resource",
                ];
            }
          
        } else {
            $response = [
                "status"=> 400,
                "msg"=> "Bad Request",
            ];
        }
        header("Content-Type:application/json");
        echo json_encode($response);
    }

    


}