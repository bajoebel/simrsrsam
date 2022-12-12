<?php
class Encrypt extends CI_Controller {
    public function __construct(){
        parent ::__construct();
        
    }
    function index(){
        $this->encrypt_decrypt();
    }
    function encrypt_decrypt($action, $string, $output = FALSE) {
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'a4a072432557901f24bcca133d1410256f0fab06';
        $secret_id = '000001';
    
        // hash
        $key = hash('sha256', $secret_key);
        
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_id), 0, 16);
    
        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }    
}

?>