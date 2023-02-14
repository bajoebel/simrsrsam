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
    return "E-Rekam Medis";
}
function getAppLgName()
{
    return "<b>E Rekam Medis</b>";
}
function getAppMnName()
{
    return "<b>ERM</b>";
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
        'nav_8' => ''
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
function encrypt_decrypt($action, $string, $output = false)
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'a4a072432557901f24bcca133d1410256f0fab06';
    $secret_id = '000001';
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_id), 0, 16);
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}
function getPoliByID($idx)
{
    $CI = &get_instance();
    $CI->db->where('idx', $idx);
    $cekQuery = $CI->db->get('tbl01_ruang');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['ruang'];
    } else {
        return "";
    }
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
function getNamaDokter($nrp = "")
{
    $CI = &get_instance();
    $CI->db->where('NRP', $nrp);
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
function getNamaUserByID($nrp)
{
    $CI = &get_instance();
    $CI->db->where('NRP', $nrp);
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
function getRegRsByRegUnitPendaftaran($idx)
{
    $CI = &get_instance();
    $CI->db->where('reg_unit', $idx);
    $cekQuery = $CI->db->get('tbl02_pendaftaran');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['id_daftar'];
    } else {
        return "";
    }
}
function getNomrByRegUnitPendaftaran($idx)
{
    $CI = &get_instance();
    $CI->db->where('reg_unit', $idx);
    $cekQuery = $CI->db->get('tbl02_pendaftaran');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['nomr'];
    } else {
        return "";
    }
}
function getNamaRuangByRegUnitPendaftaran($idx)
{
    $CI = &get_instance();
    $CI->db->where('reg_unit', $idx);
    $cekQuery = $CI->db->get('tbl02_pendaftaran');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['nama_ruang'];
    } else {
        return "";
    }
}
function getNamaPasienByRegUnitPendaftaran($idx)
{
    $CI = &get_instance();
    $CI->db->where('reg_unit', $idx);
    $cekQuery = $CI->db->get('tbl02_pendaftaran');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['nama_pasien'];
    } else {
        return "";
    }
}
function getJenisLayananByRegUnitPendaftaran($idx)
{
    $CI = &get_instance();
    $CI->db->where('reg_unit', $idx);
    $cekQuery = $CI->db->get('tbl02_pendaftaran');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['jns_layanan'];
    } else {
        return "";
    }
}
function getRuangByID($idx)
{
    $CI = &get_instance();
    $CI->db->where('idx', $idx);
    $cekQuery = $CI->db->get('tbl01_ruang');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['ruang'];
    } else {
        return "";
    }
}
function getKelasdByRegUnitPendaftaran($idx)
{
    $CI = &get_instance();
    $CI->db->where('reg_unit', $idx);
    $cekQuery = $CI->db->get('tbl02_pendaftaran');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['id_kelas'];
    } else {
        return "";
    }
}
function cekPermintaanPenunjang($idx)
{
    $CI = &get_instance();
    $CI->db->where('id_permintaan_penunjang', $idx);
    $cekQuery = $CI->db->get('tbl02_permintaan_penunjang_response');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        $response['ok'] = TRUE;
        $response['message'] = $res['reg_unit'];
    } else {
        $response['ok'] = FALSE;
        $response['message'] = NULL;
    }
    return $response;
}
function cekRujukInternal($idx)
{
    $CI = &get_instance();
    $CI->db->where('id_rujuk_internal', $idx);
    $cekQuery = $CI->db->get('tbl02_rujuk_internal_response');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        $response['ok'] = TRUE;
        $response['message'] = $res['reg_unit'];
    } else {
        $response['ok'] = FALSE;
        $response['message'] = NULL;
    }
    return $response;
}
function getDataPendaftaranByRegUnit($idx)
{
    $CI = &get_instance();
    $CI->db->where('reg_unit', $idx);
    $cekQuery = $CI->db->get('tbl02_pendaftaran');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res;
    } else {
        return "";
    }
}
function getField($field, $param, $param_val, $table)
{
    $CI = &get_instance();
    $CI->db->select($field);
    $CI->db->where($param, $param_val);
    $cekQuery = $CI->db->get($table)->row();
    if (empty($cekQuery)) {
        return "";
    } else {
        return $cekQuery->$field;
    }
}
function fieldData($field, $kondisi, $table)
{
    $CI = &get_instance();
    $CI->db->select($field);
    $CI->db->where($kondisi);
    $cekQuery = $CI->db->get($table)->row();
    if (empty($cekQuery)) {
        return "";
    } else {
        return $cekQuery->$field;
    }
}
function getDataPermintaanPenunjangById($idx)
{
    $CI = &get_instance();
    $CI->db->where('idx', $idx);
    $cekQuery = $CI->db->get('tbl02_permintaan_penunjang');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res;
    } else {
        return "";
    }
}
function getDataRujukInternalById($idx)
{
    $CI = &get_instance();
    $CI->db->where('idx', $idx);
    $cekQuery = $CI->db->get('tbl02_rujuk_internal');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res;
    } else {
        return "";
    }
}
function getUmur($dob, $dtnow)
{
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
    return $diff->y . ' Tahun, ' . $diff->m . ' Bulan, ' . $diff->d . ' Hari';
}
function getDays($startDate, $lastDate)
{
    $sDate = new DateTime($startDate);
    $lDate = new DateTime($lastDate);
    $diff = $lDate->diff($sDate);
    return $diff->days;
}
function getYears($startDate, $lastDate)
{
    $sDate = new DateTime($startDate);
    $lDate = new DateTime($lastDate);
    $diff = $lDate->diff($sDate);
    return $diff->y;
}
function getMonths($startDate, $lastDate)
{
    $sDate = new DateTime($startDate);
    $lDate = new DateTime($lastDate);
    $diff = $lDate->diff($sDate);
    return $diff->m;
}
function getDaysMod($startDate, $lastDate)
{
    $sDate = new DateTime($startDate);
    $lDate = new DateTime($lastDate);
    $diff = $lDate->diff($sDate);
    return $diff->d;
}

function cekPindahKamar($idx)
{
    $CI = &get_instance();
    $CI->db->where('id_pindah_ranap', $idx);
    $cekQuery = $CI->db->get('tbl02_pindah_ranap_response');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        $response['ok'] = TRUE;
        $response['message'] = $res['reg_unit'];
    } else {
        $response['ok'] = FALSE;
        $response['message'] = NULL;
    }
    return $response;
}
function getDataPindahRanapById($idx)
{
    $CI = &get_instance();
    $CI->db->where('idx', $idx);
    $cekQuery = $CI->db->get('tbl02_pindah_ranap');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res;
    } else {
        return "";
    }
}
function longDate($tanggal)
{
    $exp1 = explode(" ", $tanggal);
    $date = explode('-', $exp1[0]);

    //return $exp1[0];exit;
    if (count($date) < 3) {
        return "Invalid date";
    } else {
        $thn = $date[0];
        $bln = intval($date[1]);
        $tgl = $date[2];
        $bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        return $tgl . " " . $bulan[$bln] . " " . $thn;
    }
}
function hariIni(){
    $tgl=date('Y-m-d');
        $timestamp = strtotime($tgl);
        $day = date('D', $timestamp);
        $hari=array(
            'Sun'=>'Minggu',
            'Mon'=>'Senin',
            'Tue'=>'Selasa',
            'Wed'=>'Rabu',
            'Thu'=>'Kamis',
            'Fri'=>'Jumat',
            'Sat'=>'Sabtu'
        );
        return $hari[$day];
}
// function DateToIndo($date)
// { // fungsi atau method untuk mengubah tanggal ke format indonesia
//     $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
//     $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
//     $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
//     $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
//     // $result = $tgl . " " . $BulanIndo[(int)$bulan - 1] . " " . $tahun;
//     if (checkdate($bulan, $tgl, $tahun)) {
//         $result = $tgl . " " . $BulanIndo[(int)$bulan - 1] . " " . $tahun;
//     } else {
//         $result = "not valid date";
//     }
//     return ($result);
// }
// function arr_to_list($arr, $start = "<span>&nbsp;&nbsp;&nbsp;", $end = "</span><br/>")
// {
//     $arr_list = explode(";", $arr);
//     $list = "";
//     if (count($arr_list)>0) {
//         for ($al = 0; $al < count($arr_list); $al++) {
//             $list .=  $start . ($al + 1) . ". " . $arr_list[$al] . $end;
//         }
//     } else {
//         $list .= "-<br/>";
//     }
//     return $list;
// }
// function trueOrFalse($param)
// {
//     switch ($param) {
//         case '1':
//             return "Ya";
//             break;
//         case '0':
//             return "Tidak";
//             break;
//         default:
//             return "-";
//             break;
//     }
// }
