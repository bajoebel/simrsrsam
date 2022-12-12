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
function getSessionID()
{
    return session_id();
}
function getAppName()
{
    return "Administrator App";
}
function getAppLgName()
{
    return "<b>Administrator</b> App";
}
function getAppMnName()
{
    return "<b>AD</b>A";
}
function getCompany()
{
    return COMPANY_NAME;
}
function getRS()
{
    return COMPANY_NAME;
}
function getAddress1()
{
    return REPORT_ADDRESS_1;
}
function getAddress2()
{
    return REPORT_ADDRESS_2;
}
function getFooterRS()
{
    return FOOTER_APP;
}
function getVersion()
{
    return VERSION_APP;
}
function getFooter()
{
    return FOOTER_RS . " [" . getFooterRS() . "]";
}
function getLoginLogo()
{
    return base_url() . LOGO;
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
    $uid = $CI->session->userdata('get_uid');
    $CI->db->where('NRP', $uid);
    $cekQuery = $CI->db->get('tbl01_pegawai');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['pgwNama'];
    } else {
        return "";
    }
}
function getUserLogin()
{
    $CI = &get_instance();
    $uid = $CI->session->userdata('get_uid');
    $CI->db->where('NRP', $uid);
    $cekQuery = $CI->db->get('tbl01_pegawai');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['pgwNama'];
    } else {
        return "";
    }
}
function getTimeUserLogin()
{
    $CI = &get_instance();
    $uid = $CI->session->userdata('get_uid');
    $CI->db->where('NRP', $uid);
    $cekQuery = $CI->db->get('tbl01_pegawai');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['last_login'];
    } else {
        return "";
    }
}
