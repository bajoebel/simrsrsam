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
?>