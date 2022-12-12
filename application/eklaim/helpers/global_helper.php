<?php
function getSkin($idx)
{
    $CI = &get_instance();
    $CI->db->where('idx', $idx);
    $cekQuery = $CI->db->get('tbl01_acc_modul');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['skin'];
    } else {
        return "";
    }
}
function getAppName()
{
    return "SIMRS-Klaim App";
}
function getAppLgName()
{
    return "<b>SIMRS-Klaim</b> App";
}
function getAppMnName()
{
    return "<b>SK</b>A";
}
function getRS()
{
    $CI = &get_instance();
    $cekQuery = $CI->db->get('tbl_instansi');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['nama_instansi'];
    } else {
        return "Company";
    }
}
function getLoginLogo()
{
    $CI = &get_instance();
    $cekQuery = $CI->db->get('tbl_instansi');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return base_url() . $res['logo_rs'];
    } else {
        return "";
    }
}

// Encryption Function
function inacbg_encrypt($data, $key)
{
    /// make binary representasion of $key
    $key = hex2bin($key);
    /// check key length, must be 256 bit or 32 bytes
    if (mb_strlen($key, "8bit") !== 32) {
        throw new Exception("Needs a 256-bit key!");
    }
    /// create initialization vector
    $iv_size = openssl_cipher_iv_length("aes-256-cbc");
    $iv = openssl_random_pseudo_bytes($iv_size); // dengan catatan dibawah
    /// encrypt
    $encrypted = openssl_encrypt($data, "aes-256-cbc", $key, OPENSSL_RAW_DATA, $iv);
    /// create signature, against padding oracle attacks
    $signature = mb_substr(hash_hmac("sha256", $encrypted, $key, true), 0, 10, "8bit");
    /// combine all, encode, and format
    $encoded = chunk_split(base64_encode($signature . $iv . $encrypted));
    return $encoded;
}
// Decryption Function
function inacbg_decrypt($str, $strkey)
{
    /// make binary representation of $key
    $key = hex2bin($strkey);
    /// check key length, must be 256 bit or 32 bytes
    if (mb_strlen($key, "8bit") !== 32) {
        throw new Exception("Needs a 256-bit key!");
    }
    /// calculate iv size
    $iv_size = openssl_cipher_iv_length("aes-256-cbc");
    /// breakdown parts
    $decoded = base64_decode($str);
    $signature = mb_substr($decoded, 0, 10, "8bit");
    $iv = mb_substr($decoded, 10, $iv_size, "8bit");
    $encrypted = mb_substr($decoded, $iv_size + 10, NULL, "8bit");
    /// check signature, against padding oracle attack
    $calc_signature = mb_substr(hash_hmac("sha256", $encrypted, $key, true), 0, 10, "8bit");
    if (!inacbg_compare($signature, $calc_signature)) {
        return "SIGNATURE_NOT_MATCH"; /// signature doesn't match
    }
    $decrypted = openssl_decrypt($encrypted, "aes-256-cbc", $key, OPENSSL_RAW_DATA, $iv);
    return $decrypted;
}
/// Compare Function
function inacbg_compare($a, $b)
{
    /// compare individually to prevent timing attacks
    /// compare length
    if (strlen($a) !== strlen($b)) return false;
    /// compare individual
    $result = 0;
    for ($i = 0; $i < strlen($a); $i++) {
        $result |= ord($a[$i]) ^ ord($b[$i]);
    }
    return $result == 0;
}
function claim_print()
{

    // contoh encryption key, bukan aktual
    $key = "49b596af9865503f148317dd1c37242b3505d47d3605354ce18c319129e130a3";
    // json query

    $json_request = <<<EOT
{
"metadata": {
"method": "claim_print"
},
"data": {
"nomor_sep": "0304R0010319V000128"
}
}
EOT;

    // membuat json juga dapat menggunakan json_encode:
    $ws_query["metadata"]["method"] = "claim_print";
    $ws_query["data"]["nomor_sep"] = "0304R0010319V000128";
    $json_request = json_encode($ws_query);

    // data yang akan dikirimkan dengan method POST adalah encrypted:
    $payload = inacbg_encrypt($json_request, $key);
    // tentukan Content-Type pada http header
    $header = array("Content-Type: application/x-www-form-urlencoded");
    // url server aplikasi E-Klaim,
    // silakan disesuaikan instalasi masing-masing
    $url = "http://192.168.5.2/E-Klaim/ws.php";
    // setup curl
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    // request dengan curl
    $response = curl_exec($ch);
    // terlebih dahulu hilangkan "----BEGIN ENCRYPTED DATA----\r\n"
    // dan hilangkan "----END ENCRYPTED DATA----\r\n" dari response
    $first  = strpos($response, "\n") + 1;
    $last   = strrpos($response, "\n") - 1;
    $response  = substr(
        $response,
        $first,
        strlen($response) - $first - $last
    );
    // decrypt dengan fungsi inacbg_decrypt
    $response = inacbg_decrypt($response, $key);
    // hasil decrypt adalah format json, ditranslate kedalam array
    $msg = json_decode($response, true);
    // variable data adalah base64 dari file pdf
    $pdf = base64_decode($msg["data"]);
    // hasilnya adalah berupa binary string $pdf, untuk disimpan:
    file_put_contents("klaim.pdf", $pdf);
    // atau untuk ditampilkan dengan perintah:
    header("Content-type:application/pdf");
    header("Content-Disposition:attachment;filename=klaim.pdf");
    echo $pdf;
}
function hostIP()
{
    $CI = &get_instance();
    $cekQuery = $CI->db->get('tbl_config');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['host_dest'];
    } else {
        return "";
    }
}
function keyValue()
{
    $CI = &get_instance();
    $cekQuery = $CI->db->get('tbl_config');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['key_value'];
    } else {
        return "";
    }
}

function initCURL($ws_query)
{
    $json_request = json_encode($ws_query);
    $payload = inacbg_encrypt($json_request, keyValue());
    $header = array("Content-Type: application/x-www-form-urlencoded");
    $url = hostIP();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    $response = curl_exec($ch);
    return $response;
}

function setNav($find_key)
{
    $array = array(
        'nav_1' => '',
        'nav_2' => '',
        'nav_3' => '',
        'nav_4' => '',
        'nav_5' => ''
    );
    foreach ($array as $key => $value) {
        if ($key == $find_key) {
            $array[$find_key] = 'active';
        } else {
            $array[$key] = '';
        }
    }
    return $array;
}
function selisihTanggal($tglAwal, $tglAkhir)
{
    $start_date = new DateTime("$tglAwal");
    $end_date = new DateTime("$tglAkhir");
    $interval = $start_date->diff($end_date);
    return $interval->days + 1;
}
function setDateEng($engDateFormat)
{
    $hari = substr($engDateFormat, 0, 2);
    $bln = substr($engDateFormat, 3, 2);
    $thn = substr($engDateFormat, 6, 4);
    return "$thn-$bln-$hari";
}
function setDateInd($engDateFormat)
{
    $hari = substr($engDateFormat, 8, 2);
    $bln = substr($engDateFormat, 5, 2);
    $thn = substr($engDateFormat, 0, 4);
    return "$hari/$bln/$thn";
}
function Terbilang($x)
{
    $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    if ($x < 12)
        return " " . $abil[$x];
    elseif ($x < 20)
        return Terbilang($x - 10) . "belas";
    elseif ($x < 100)
        return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
    elseif ($x < 200)
        return " seratus" . Terbilang($x - 100);
    elseif ($x < 1000)
        return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
    elseif ($x < 2000)
        return " seribu" . Terbilang($x - 1000);
    elseif ($x < 1000000)
        return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
    elseif ($x < 1000000000)
        return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
}
function getNmLengkap()
{
    $CI = &get_instance();
    $uid = $CI->session->userdata('isUserLogin');
    $CI->db->where('username', $uid);
    $cekQuery = $CI->db->get('tbl_users');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['nmLengkap'];
    } else {
        return "";
    }
}
function getUserLogin()
{
    $CI = &get_instance();
    $uid = $CI->session->userdata('isUserLogin');
    $CI->db->where('username', $uid);
    $cekQuery = $CI->db->get('tbl_users');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['nmLengkap'];
    } else {
        return "";
    }
}
function getTimeUserLogin()
{
    $CI = &get_instance();
    $uid = $CI->session->userdata('isUserLogin');
    $CI->db->where('username', $uid);
    $cekQuery = $CI->db->get('tbl_users');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['lastLogin'];
    } else {
        return "";
    }
}
function sessionID()
{
    return session_id();
}
function sessionID2()
{
    $CI = &get_instance();
    return $CI->session->userdata('session_id');
}
