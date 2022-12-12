<?php
function getSessionID(){
    return session_id();
}
function getUserID(){
    $CI =& get_instance();
    return $CI->session->userdata('get_uid');
}
function getAppName(){
    return "Dokumen & Laporan SIRS App";
}
function getAppLgName(){
    return "<b>Dokumen & Laporan</b>";
}
function getAppMnName(){
    return "<b>MR-D</b>A";
}
function getCompany(){
    return COMPANY_NAME;
}
function getRS(){
    return COMPANY_NAME;
}
function getAddress1(){
    return REPORT_ADDRESS_1;
}
function getAddress2(){
    return REPORT_ADDRESS_2;
}
function getFooterRS(){
    return FOOTER_APP;
}
function getVersion(){
    return VERSION_APP;
}
function getFooter(){
    return FOOTER_RS . " [" . getFooterRS() . "]";
}
function getLoginLogo(){
    return LOGO;
}

function setNav($find_key) {
    $array = array(
        'nav_1' => '',
        'nav_2' => '',
        'nav_3' => '',
        'nav_4' => '',
        'nav_5' => '',
        'nav_6' => '',
        'nav_7' => '',
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
function selisihTanggal($tglAwal,$tglAkhir){
    $start_date = new DateTime("$tglAwal");
    $end_date = new DateTime("$tglAkhir");
    $interval = $start_date->diff($end_date);
    return $interval->days + 1;
}
function setDateEng($engDateFormat){
    $hari = substr($engDateFormat, 0,2);
    $bln = substr($engDateFormat, 3,2);
    $thn = substr($engDateFormat, 6,4);
    return "$thn-$bln-$hari";
}
function setDateInd($engDateFormat){
    $hari = substr($engDateFormat, 8,2);
    $bln = substr($engDateFormat, 5,2);
    $thn = substr($engDateFormat, 0,4);
    return "$hari/$bln/$thn";
}
function Terbilang($x){
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
function getPoliByID($idx){
    $CI =& get_instance();
    $CI->db->where('idx',$idx);
    $cekQuery = $CI->db->get('tbl01_ruang');
    if($cekQuery->num_rows() > 0){
        $res = $cekQuery->row_array();
        return $res['ruang'];
    }else{
        return "";
    }    
}
function getRuangByID($idx){
    $CI =& get_instance();
    $CI->db->where('idx',$idx);
    $cekQuery = $CI->db->get('tbl01_ruang');
    if($cekQuery->num_rows() > 0){
        $res = $cekQuery->row_array();
        return $res['ruang'];
    }else{
        return "";
    }    
}
function getNmLengkap(){
    $CI =& get_instance();
    $uid = $CI->session->userdata('get_uid');
    $CI->db->where('NRP',$uid);
    $cekQuery = $CI->db->get('tbl01_pegawai');
    if($cekQuery->num_rows() > 0){
        $res = $cekQuery->row_array();
        return $res['pgwNama'];
    }else{
        return "";
    }
}
function getField($field,$where=array(),$table){
    $CI =& get_instance();
    // $uid = $CI->session->userdata('get_uid');
    $CI->db->select($field);
    $CI->db->where($where);
    $cekQuery = $CI->db->get($table);
    if($cekQuery->num_rows() > 0){
        $res = $cekQuery->row_array();
        return $res[$field];
    }else{
        return "";
    }
}
function getUserLogin(){
    $CI =& get_instance();
    $uid = $CI->session->userdata('get_uid');
    $CI->db->where('NRP',$uid);
    $cekQuery = $CI->db->get('tbl01_pegawai');
    if($cekQuery->num_rows() > 0){
        $res = $cekQuery->row_array();
        return $res['pgwNama'];
    }else{
        return "";
    }
}
function getTimeUserLogin(){
    $CI =& get_instance();
    $uid = $CI->session->userdata('get_uid');
    $CI->db->where('NRP',$uid);
    $cekQuery = $CI->db->get('tbl01_pegawai');
    if($cekQuery->num_rows() > 0){
        $res = $cekQuery->row_array();
        return $res['last_login'];
    }else{
        return "";
    }
}
function getNamaUserByID($nrp){
    $CI =& get_instance();
    $CI->db->where('NRP',$nrp);
    $cekQuery = $CI->db->get('tbl01_pegawai');
    if($cekQuery->num_rows() > 0){
        $res = $cekQuery->row_array();
        return $res['pgwNama'];
    }else{
        return "";
    }
}
function getUmur($dob,$dtnow){
    // Tanggal Lahir
    // $dob = "1992-05-22";
    // $dt = "1992-05-22";
    
    // Convert Ke Date Time
    $biday = new DateTime($dob);
    $today = new DateTime($dtnow);
    $diff = $today->diff($biday);
    
    // echo "Umur: ". $diff->y ." Tahun";
    // echo "Tahun: ".$diff->y.'<br />';   
    // echo "Bulan: ".$diff->m.'<br />';
    // echo "Hari: ".$diff->d.'<br />';
    return $diff->y.' Tahun, '.$diff->m.' Bulan, '.$diff->d.' Hari';
}
function getUmurEklaim($startDate,$lastDate){
    $sDate = new DateTime($startDate);
    $lDate = new DateTime($lastDate);
    $diff = $lDate->diff($sDate);
    $tahun = $diff->y;
    $bulan = $diff->m;
    $hari = $diff->d;
    if ($tahun !== 0) {
        return $tahun.' Tahun';
    }elseif($bulan !== 0){
        return $bulan.' Bulan';
    }else{
        return $hari.' Hari';
    }
}

function getDays($startDate,$lastDate){
    $sDate = new DateTime($startDate);
    $lDate = new DateTime($lastDate);
    $diff = $lDate->diff($sDate);
    return $diff->days;
}
function getYears($startDate,$lastDate){
    $sDate = new DateTime($startDate);
    $lDate = new DateTime($lastDate);
    $diff = $lDate->diff($sDate);
    return $diff->y;
}
function getMonths($startDate,$lastDate){
    $sDate = new DateTime($startDate);
    $lDate = new DateTime($lastDate);
    $diff = $lDate->diff($sDate);
    return $diff->m;
}
function getDaysMod($startDate,$lastDate){
    $sDate = new DateTime($startDate);
    $lDate = new DateTime($lastDate);
    $diff = $lDate->diff($sDate);
    return $diff->d;
}
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
