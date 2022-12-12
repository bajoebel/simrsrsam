<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Smart_model extends CI_Model
{
    function getPoly($grid){
        $this->db->where('grid',$grid);
        return $this->db->get('tbl01_ruang')->result();
    }

    //Async Data
    function http_request($data, $url,$token="")
    {
        //$data = array("name" => "Hagrid", "age" => "36");                                                                    
        $data_string = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if(empty($token)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string)
            ));
        }else{
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string),
                'X-Token: ' .$token
            ));
        }
        
        $result = curl_exec($ch);
        return $result;
    }

    function getCaraBayar(){
        return $this->db->get('tbl01_cara_bayar')->result_array();
    }
    function getRujukan(){
        return $this->db->get('tbl01_rujukan')->result_array();
    }
    
}
