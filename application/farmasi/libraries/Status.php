<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/* 
    Created on : 31/03/2017, 9:55:33 AM
    Author     : Dendi Ferdinal, S.Kom
*/

class Status{
    public function __construct(){
        return false;        
    }

    function generatePswd($length) {
        $charsCaps = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $chars = "abcdefghijklmnopqrstuvwxyz";
        $nums = "0123456789";
        //$symbols = "!@#$%^&*_=+-/€.?<>)";
        $symbols = "!@#$%^&*_=+-/.?<>)";

        $characters = $charsCaps . $chars . $nums . $symbols;
        //$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*_=+-/€.?<>)';        
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function getAccountBalance(){
        $CI =& get_instance();
        $CI->db->where('idx',1);
        $resData = $CI->db->get('tbl_sms_balance');
        if($resData->num_rows() > 0){
            $x = $resData->row_array();
            $getBalance = $x['sms_balance'];
        }else{
            $getBalance = 0;
        }
        return $getBalance;        
        
    }

    public function getUserIP(){
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['SERVER_ADDR'];
    
        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }
    
        return $ip;
    }
    
    function getTanggal($tgl){
        $getMonth = array(1=>"Jan","Feb","Mar","Apr","Mei","Jun","Jul","Aug","Sep","Okt","Nov","Des");
        //2017-06-30
        $thn = substr($tgl,0,4);
        $bln = substr($tgl,5,2);
        $today = substr($tgl,8,2);
        return  $today. ' ' . $getMonth[(int) $bln] . ' ' . $thn;
        
    }
    
    public function getTglFormatSystem($tgl){
        //09-03-2017
        $thn = substr($tgl,6,4);
        $bln = substr($tgl,3,2);
        $today = substr($tgl,0,2);
        return $thn . '-' . $bln . '-' . $today;
    }
}
