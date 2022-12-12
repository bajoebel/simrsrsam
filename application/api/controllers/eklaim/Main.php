<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller {
    function __construct(){
        parent ::__construct();
        $this->load->helper('Eklaim');
    }
    function index(){      
        echo "Service Actived";       
    }
    function search_diagnosis(){
        $response = null;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['param1'])){
                $param1 = $this->input->post('param1',true);
                if($param1 !== ""){
                    $params['metadata']['method'] = "search_diagnosis";
                    $params['data']['keyword'] = $param1;
                    $response = search_diagnosis($params); 
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
    function getICD(){
        // Specify domains from which requests are allowed
        header('Access-Control-Allow-Origin: *');
        // Specify which request methods are allowed
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        // Additional headers which may be sent along with the CORS request
        // The X-Requested-With header allows jQuery requests to go through
        header('Access-Control-Allow-Headers: X-Requested-With');
        // Set the age to 1 day ( 86400 ) to improve speed/caching.
        header('Access-Control-Max-Age: 86400');

        if(isset($_GET['term'])){
            $param1 = $this->input->get('term',true);
            $params['metadata']['method'] = "search_diagnosis";
            $params['data']['keyword'] = $param1;
            $response = search_diagnosis($params); 
            //echo $response; exit;
            $array = json_decode($response,true);
            if(!empty($array['response']['count'])){
                foreach ($array['response']['data'] as $key) {
                    $data[] = array("value" => $key[0], "label" => $key[1],"ada"=>1);
                }
            }else{
                //Cari Dari Data ICD Local
                $this->db->select('kode_icd as label, icd as value,1 as ada');
                $this->db->like('kode_icd',$param1);
                $this->db->or_like('icd',$param1);
                $data = $this->db->get('tbl01_icd')->result_array();
                $data[] = array("value" => 'lainnya', "label" => 'Lainnya', "ada" => 0);
            }
            
        }else{
            $data[]=array("value"=>null,"label"=>null);
        }
        echo json_encode($data);
    }

    function getDokter(){
        // Specify domains from which requests are allowed
        header('Access-Control-Allow-Origin: *');
        // Specify which request methods are allowed
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        // Additional headers which may be sent along with the CORS request
        // The X-Requested-With header allows jQuery requests to go through
        header('Access-Control-Allow-Headers: X-Requested-With');
        // Set the age to 1 day ( 86400 ) to improve speed/caching.
        header('Access-Control-Max-Age: 86400');

        if(isset($_GET['term'])){
            $param1 = $this->input->get('term',true);
            $params['metadata']['method'] = "search_diagnosis";
            $params['data']['keyword'] = $param1;
            $response = search_diagnosis($params); 
            $array = json_decode($response,true);
            foreach ($array['response']['data'] as $key) {
                $data[]=array("value"=>$key[0],"label"=>$key[1]);
            }
        }else{
            $data[]=array("value"=>null,"label"=>null);
        }
        echo json_encode($data);
    }
    function getProcedure(){
        // Specify domains from which requests are allowed
        header('Access-Control-Allow-Origin: *');
        // Specify which request methods are allowed
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        // Additional headers which may be sent along with the CORS request
        // The X-Requested-With header allows jQuery requests to go through
        header('Access-Control-Allow-Headers: X-Requested-With');
        // Set the age to 1 day ( 86400 ) to improve speed/caching.
        header('Access-Control-Max-Age: 86400');

        if(isset($_GET['term'])){
            $param1 = $this->input->get('term',true);
            $params['metadata']['method'] = "search_procedures";
            $params['data']['keyword'] = $param1;
            $response = search_diagnosis($params); 
            $array = json_decode($response,true);
            foreach ($array['response']['data'] as $key) {
                $data[]=array("value"=>$key[0],"label"=>$key[1]);
            }
        }else{
            $data[]=array("value"=>null,"label"=>null);
        }
        echo json_encode($data);
    }
}

