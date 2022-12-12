<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Vclaim_model extends CI_Model{
    function getData($url,$header){
        // echo HOST_VC.$url; exit;
        $curl = curl_init(HOST_VC.$url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array($header));
        $json_response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);
        if (!empty($error_msg)) {
            $error = array('metaData' => array('code' => 201, 'message' => $error_msg));
            $json_response = json_encode($error);
        }
        return $json_response;
    }
    function postData($url, $header, $jsonData)
    {
        // $contentType = "application/x-www-form-urlencoded";
        // $consID = getConsID();
        // $tStamp = getTimestamp();
        // $encodedSignature = getSignature();

        // $result = "";
        // $result .= "Content-Type: " . $contentType . "\r\n";
        // $result .= "X-cons-id: " . $consID . "\r\n";
        // $result .= "X-timestamp: " . $tStamp . "\r\n";
        // $result .= "X-signature: " . $encodedSignature;

        $curl = curl_init(HOST_VC.$url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array($header));
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
        $return = curl_exec($curl);
        // $json_response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);
        return $return;
    }
    function putData($url, $header, $jsonData)
    {
        // $contentType = "application/x-www-form-urlencoded";
        // $consID = getConsID();
        // $tStamp = getTimestamp();
        // $encodedSignature = getSignature();

        // $result = "";
        // $result .= "Content-Type: " . $contentType . "\r\n";
        // $result .= "X-cons-id: " . $consID . "\r\n";
        // $result .= "X-timestamp: " . $tStamp . "\r\n";
        // $result .= "X-signature: " . $encodedSignature;

        $curl = curl_init(HOST_VC.$url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array($header));
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
        $return = curl_exec($curl);
        curl_close($curl);
        echo $return;
    }
    function deleteData($url, $header, $jsonData)
    {
        // $contentType = "application/x-www-form-urlencoded";
        // $consID = getConsID();
        // $tStamp = getTimestamp();
        // $encodedSignature = getSignature();

        // $result = "";
        // $result .= "Content-Type: " . $contentType . "\r\n";
        // $result .= "X-cons-id: " . $consID . "\r\n";
        // $result .= "X-timestamp: " . $tStamp . "\r\n";
        // $result .= "X-signature: " . $encodedSignature;

        $curl = curl_init(HOST_VC.$url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array($header));
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
        $return = curl_exec($curl);
        curl_close($curl);
        echo $return;
    }
    function stringDecrypt($key, $string){
        // echo base64_decode($string); exit;
        $encrypt_method = 'AES-256-CBC';
        // hash
        $key_hash = hex2bin(hash('sha256', $key));
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);
        return $output;
    }
    function getRujukanOnline($noSep){
        $this->db->where('batal',0);
        $this->db->where('noSep',$noSep);
        return $this->db->get('tbl02_rujukanonline')->row();
    }
    function countRiwayatPengajuan(){
        return $this->db->get('tbl02_pengajuansep')->num_rows();
    }
    function jmlRiwayatPengajuan($start,$limit){
        $this->db->order_by('idx','desc');
        $this->db->limit($limit, $start);
        return $this->db->get('tbl02_pengajuansep')->result();
    }
    function getSuratKontrol($no){
        $this->db->where('noSuratKontrol',$no);
        return $this->db->get('tbl02_suratkontrol')->row();
    }
    function getSepLokal($nosep){
        $this->db->where('noSep',$nosep);
        return $this->db->get('tbl02_sep_response')->row();
    }
}