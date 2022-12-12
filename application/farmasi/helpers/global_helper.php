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
function getUserID()
{
    $CI = &get_instance();
    return $CI->session->userdata('get_uid');
}
function getAppName()
{
    return "Farmasi RS App";
}
function getAppLgName()
{
    return "<b>Farmasi RS</b> App";
}
function getAppMnName()
{
    return "<b>F</b>RS";
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
function get_asset()
{
    return base_url() . "assets/";
}
function getLoginLogo()
{
    return LOGO;
}
function setNav($find_key)
{
    $array = array(
        'nav_1' => '',
        'nav_2' => '',
        'nav_3' => '',
        'nav_4' => '',
        'nav_5' => '',
        'nav_6' => '',
        'nav_7' => '',
        'nav_8' => '',
        'nav_9' => '',
        'nav_10' => ''
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
function getNmLengkapById($idx)
{
    $CI = &get_instance();
    $CI->db->where('NRP', $idx);
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
function getSatuanById($idx)
{
    $CI = &get_instance();
    $CI->db->where('KDSATUAN', $idx);
    $cekQuery = $CI->db->get('tbl04_satuan');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['NMSATUAN'];
    } else {
        return "";
    }
}
function getKatBrgById($idx)
{
    $CI = &get_instance();
    $CI->db->where('KDKTBRG', $idx);
    $cekQuery = $CI->db->get('tbl04_kategori_barang');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['NMKTBRG'];
    } else {
        return "";
    }
}
function getJenisBrgById($idx)
{
    $CI = &get_instance();
    $CI->db->where('KDJENISBRG', $idx);
    $cekQuery = $CI->db->get('tbl04_jenis_barang');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['JENISBRG'];
    } else {
        return "";
    }
}
function getLokasiUser()
{
    $CI = &get_instance();
    $uid = $CI->session->userdata('get_uid');
    $CI->db->where('NRP', $uid);
    $cekQuery = $CI->db->get('tbl01_users_farmasi');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['ruang_akses'];
    } else {
        return "";
    }
}
function getLokasiById($idx)
{
    $CI = &get_instance();
    $CI->db->where('KDLOKASI', $idx);
    $cekQuery = $CI->db->get('tbl04_lokasi');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['NMLOKASI'];
    } else {
        return "";
    }
}
function getSupplierById($idx)
{
    $CI = &get_instance();
    $CI->db->where('KDSUPPLIER', $idx);
    $cekQuery = $CI->db->get('tbl04_supplier');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['NMSUPPLIER'];
    } else {
        return "";
    }
}
function getObatById($idx)
{
    $CI = &get_instance();
    $CI->db->where('KDBRG', $idx);
    $cekQuery = $CI->db->get('tbl04_barang');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['NMBRG'];
    } else {
        return "";
    }
}
function getSatuanObatById($idx)
{
    $CI = &get_instance();
    $CI->db->where('KDBRG', $idx);
    $cekQuery = $CI->db->get('tbl04_barang');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['NMSATUAN'];
    } else {
        return "";
    }
}
function getTransBeli($KDBL)
{
    $CI = &get_instance();
    $CI->db->where('KDBL', $KDBL);
    $cekQuery = $CI->db->get('tbl04_pembelian');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res;
    } else {
        return "";
    }
}
function getTransBMK($KDBMK)
{
    $CI = &get_instance();
    $CI->db->where('KDBMK', $KDBMK);
    $cekQuery = $CI->db->get('tbl04_barang_masuk_khusus');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res;
    } else {
        return "";
    }
}
function getTotTrans($KDJL)
{
    // $SQL = "SELECT IFNULL(SUM((SISA * HJUAL) - IF(SISA=0,0,DISKON) + IF(SISA=0,0,R)),0) AS GT FROM tbl04_penjualan_detail WHERE KDJL='$KDJL'";
    $SQL = "SELECT IFNULL(SUM((JMLJUAL * HJUAL) - DISKON + R),0) AS GT 
    FROM tbl04_penjualan_detail WHERE KDJL='$KDJL'";

    $CI = &get_instance();
    $cekQuery = $CI->db->query("$SQL");
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['GT'];
    } else {
        return "0";
    }
}
function getKetNota($params)
{
    $getKetNota = array(
        "SA" => "Stok Awal",
        "KS" => "Koreksi Stok",
        "JL" => "Penjualan / Pemakaian Pasien",
        "RJL" => "Retur Penjualan",
        "MT" => "Mutasi / Transfer Barang",
        "RMT" => "Retur Mutasi / Transfer Barang",
        "BL" => "Pembelian Barang",
        "RBL" => "Retur Pembelian Barang",
        "MTB" => "Mutasi / Transfer Barang BHP",
        "RMTB" => "Retur Mutasi / Transfer Barang BHP",
        "BMK" => "Barang Masuk Khusus",
        "RBMK" => "Retur Barang Masuk Khusus",
        "BKK" => "Barang Keluar Khusus",
        "RBKK" => "Retur Barang Keluar Khusus"
    );
    return  $getKetNota[$params];
}
