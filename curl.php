<?php

$url = "https://rsachmadmochtar.net/api";
// $data_string = json_encode("");
// $ch = curl_init($url);
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// $result = curl_exec($ch);
// // echo $result; exit;
// if (curl_errno($ch)) {
//     $result = json_encode(
//         array(
//             'metadata' => array(
//                 'code' => '404',
//                 'message' => 'Error Saat Mengakses Server Simrs'
//             ),
//             'response' => curl_error($ch)
//         )
//     );
// }
// echo $result;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, TRUE);
curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$head = curl_exec($ch);
echo $head;
// $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
