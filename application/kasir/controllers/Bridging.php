<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bridging extends CI_Controller {
    public function __construct(){
        parent ::__construct();
    }
    function index(){
        $this->full_signature();
    }
    function get_sep(){
        $nosep = $this->uri->segment(3);
        $url = "https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/SEP/$nosep";
        
        $data = $this->getConsID();
        $tStamp = $this->getTimestamp();
        $encodedSignature = $this->getSignature();
        $result = "";
        $result .= "X-cons-id: " . $data . "\r\n";
        $result .= "X-timestamp: " . $tStamp . "\r\n";
        $result .= "X-signature: " . $encodedSignature;
        

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array($result));
        $json_response = curl_exec($curl);        
        curl_close($curl);
        return $json_response; 
    } 

    function getResult(){
        $data = $this->getConsID();
        $tStamp = $this->getTimestamp();
        $encodedSignature = $this->getSignature();
        $result = "";
        $result .= "X-cons-id: " . $data . "\r\n";
        $result .= "X-timestamp: " . $tStamp . "\r\n";
        $result .= "X-signature: " . $encodedSignature;
        return $result;
    }
    function initCURL($url){
        $result = $this->getResult();
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array($result));
        $json_response = curl_exec($curl);        
        curl_close($curl);
        return $json_response;        
    }
    function getsep(){
        $nosep = $this->uri->segment(3);
        $url = $this->urlGetSEP($nosep);
        //$result = $this->getResult();
        echo $this->initCURL($url);
    } 
    function urlGetSEP($param1){
        return "https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/SEP/$param1";
    }

    function urlCekKartuBPJS($param1,$param2){
        return "https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/Peserta/nokartu/$param1/tglSEP/$param2";
    }
    function urlCekKartuNIK($param1,$param2){
        return "https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/Peserta/nik/$param1/tglSEP/$param2";
    }
    
    function urlGetDiagnosa($param1){
        return "https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/referensi/diagnosa/$param1";
    }
    function urlGetProcedure($param1){
        return "https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/referensi/procedure/$param1";
    }

    function getDiagnosa(){
        $param1 = $this->uri->segment(3);
        $url = $this->urlGetDiagnosa($param1);
        echo $this->initCURL($url);
    } 
    function getProcedure(){
        $param1 = $this->uri->segment(3);
        $url = $this->urlGetProcedure($param1);
        echo $this->initCURL($url);
    } 
    function cekKartuBPJS(){
        $param1 = $this->uri->segment(3);
        $param2 = date("Y-M-d",strtotime($this->uri->segment(4)));
        $url = $this->urlCekKartuBPJS($param1,$param2);
        echo $this->initCURL($url);
    } 
    function cekKartuNIK(){
        $param1 = $this->uri->segment(3);
        $param2 = date("Y-M-d",strtotime($this->uri->segment(4)));
        $url = $this->urlCekKartuNIK($param1,$param2);
        echo $this->initCURL($url);
    } 
     


    function full_signature(){
        $data = "20419";//20419 - 9wXA881141
        $secretKey = "9wXA881141";//1000 - 7789
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
        $result = "";
        $result .= "X-cons-id: " . $data . "\r\n";
        $result .= "X-timestamp: " . $tStamp . "\r\n";
        $result .= "X-signature: " . $encodedSignature;
        echo "<textarea rows=4 style=width:500px;border:none;margin:100px auto>$result</textarea>";
    }
    
    function getSignature($cons_id=null,$cons_scret=null){
        $scretId = $this->getConsID();
        $scretKey = $this->getScretID();
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $scretId."&".$tStamp, $scretKey, true);
        $encodedSignature = base64_encode($signature);
        return $encodedSignature;
    }
    function getTimestamp(){
        $scretId = $this->getConsID();
        $scretKey = $this->getScretID();
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        return $tStamp;
    }

    function getConsID(){return "20419";}
    function getScretID(){return "9wXA881141";}

    function sampleGetSep(){
        $nosep = "0304R0011218V004388";
        $data = "20419";//20419 - 9wXA881141
        $secretKey = "9wXA881141";//1000 - 7789
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
        $tgl=date("Y-m-d H:i:s");
        #$ip = "http://api.asterix.co.id/SepWebRest/peserta/";
        #$ip = "http://172.162.121.6:85/WsLokalRest/Peserta/peserta/";
        #$ip = "http://172.162.121.6:8082/SepLokalRest/peserta/0001151420883";
        $ip = "https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/SEP/";
        $url = $ip."$nosep";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array("X-cons-id: $data\r\n" . "X-timestamp: $tStamp\r\n" . "X-signature: $encodedSignature"));
        $json_response = curl_exec($curl);        
        curl_close($curl);
        
        $response = json_decode($json_response, true);
        
        $code = $response['metaData']['code'];
        echo "<pre>";
        echo "<code>";
        echo $json_response;
        echo "</code>";
        echo "</pre>";
    }  
    function variable(){
        #Cari Faskes Lanjutan
        #GET https://vclaim.bpjs-kesehatan.go.id/VClaim/Referensi/getFaskesbyJns?nama=rid&jns=1
        
        #Cari Faskes Lanjutan 
        #GET https://vclaim.bpjs-kesehatan.go.id/VClaim/Referensi/getFaskesbyJns?nama=ridha&jns=1

        #Cek SEP Pasca Rawat Inap 
        #GET https://vclaim.bpjs-kesehatan.go.id/VClaim/SEP/getInfoSepPascaInap?noka=0001266093461&tglsep=2018-12-22
        /* 
        params
        noka    0001266093461
        tglsep  2018-12-22
        */

        #Cek SEP Pasca Rawat Inap 
        #GET https://vclaim.bpjs-kesehatan.go.id/VClaim/Peserta/getPeserta_1?noka=0001266093461&tgl=2018-12-22&jenpel=2&kartu=0
        /* 
        params
        noka    0001266093461
        tgl 2018-12-22
        jenpel  2
        kartu   0
        */

        #Cek Tagihan Tunggakan 
        #GET https://vclaim.bpjs-kesehatan.go.id/VClaim/Peserta/getTagihanTunggakan?noka=0001266093461&tgl=2018-12-22&jnspeserta=10
        /* 
        params
        noka    0001266093461
        tgl 2018-12-22
        jnspeserta  10
        */
    }
    function get_jkn(){
        $nopeserta = $_POST['nopeserta'];
        $data = "20419";//20419 - 9wXA881141
        $secretKey = "9wXA881141";//1000 - 7789
        date_default_timezone_set('UTC');
        $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $data."&".$tStamp, $secretKey, true);
        $encodedSignature = base64_encode($signature);
        $tgl=date("Y-M-d");
        #$ip = "http://api.asterix.co.id/SepWebRest/peserta/";
        #$ip = "http://172.162.121.6:85/WsLokalRest/Peserta/peserta/";
        #$ip = "http://172.162.121.6:8082/SepLokalRest/peserta/0001151420883";
        $ip = "http://api.bpjs-kesehatan.go.id:8080/VClaim-rest/Peserta/nokartu/$nopeserta/tglSEP/$tgl";
        
        $curl = curl_init($ip);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array("Accept: application/json\r\n" . "X-cons-id: $data\r\n" . "X-Timestamp: $tStamp\r\n" . "X-Signature: $encodedSignature"));
        //curl_setopt($curl, CURLOPT_GET, true);
        $json_response = curl_exec($curl);        
        curl_close($curl);
        echo $json_response;
          
    }
}

?>