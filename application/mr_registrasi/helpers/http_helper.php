<?php 
function httprequest($data, $url,$token="",$method="POST")
{                                                               
    $data_string = json_encode($data);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if(empty($token)){
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string),
            'X-Username: ' .USERNAME,
            'X-Password: ' .USERPASS
        ));
    }else{
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string),
            'X-Token: ' .$token
        ));
    }
    
    $result = curl_exec($ch);
    // echo $result; exit;
    if (curl_errno($ch)) {
        $result=json_encode(
            array(
                'metadata'=>array(
                    'code'=>'404',
                    'message'=>'Error Saat Mengakses Server Simrs'
                ),
                'response'=>curl_error($ch)
            )
        );
    }
    return $result;
}

function jknrequest($url,$jsonData,$method="GET"){
    date_default_timezone_set('UTC');
    $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'))-SELISIH_WAKTU;
    // Create Signature
    $signature = hash_hmac('sha256', CONS_ID_JKN."&".$tStamp, SECREET_ID_JKN, true);
    $encodedSignature = base64_encode($signature);
    // if(empty($tgl)) $tgl=date('Y-m-d');
    $contentType = "application/x-www-form-urlencoded";
    // Generate Header
    $header = "";
    $header .= "Content-Type: " . $contentType . "\r\n";
    $header .= "X-cons-id: " . CONS_ID_JKN . "\r\n";
    $header .= "X-timestamp: " . $tStamp . "\r\n";
    $header .= "X-signature: " . $encodedSignature ."\r\n";
    $header .= "user_key: ".KEY_JKN;

    $curl = curl_init(HOST_JKN.$url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array($header));
    if($method!="GET"){
        if($method!="POST") curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
    }
    $res = curl_exec($curl);
    if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
        $res = json_encode(array(
            'metadata'=>array(
                'code'=>201,
                'message'=>$error_msg
            )
        ));
    }
    // echo $res; exit;
    // echo HOST_JKN.$url;exit;
    if(isJSON($res)){
        $return=json_decode($res);
        if(!empty($return->response)){
            if($return->metadata->code==200){
                $data=stringDecryptJkn(CONS_ID_JKN.SECREET_ID_JKN.$tStamp,$return->response);
                $res=json_encode(array('metadata'=>$return->metadata,'response'=>json_decode(hasil($data))));
            }
        }
    }else{
        $html=$res;
        // echo $html; exit;
        $res=json_encode(array('metadata'=>array('code'=>208,'message'=>"Error Response Dari BPJS"),'response'=>$html));
    }
    curl_close($curl);
    return $res;
}
function stringDecryptJkn($key, $string){
    // echo base64_decode($string); exit;
    $encrypt_method = 'AES-256-CBC';
    // hash
    $key_hash = hex2bin(hash('sha256', $key));
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);
    return $output;
}
function jmlPasien($jkn=0){
    $CI = &get_instance();
    $CI->db->select("COUNT(idx) AS jml");
    $CI->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d')", date('Y-m-d'));
    $CI->db->where("status_pasien", 1);
    if($jkn==1) $CI->db->where('id_cara_bayar',2);
    else $CI->db->where('id_cara_bayar !=',2);
    $row = $CI->db->get('tbl02_pendaftaran')->row();
    return $row->jml;
}
?>