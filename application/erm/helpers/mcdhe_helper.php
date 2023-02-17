<?php

if (!function_exists('is_get')) {

    /**
     * If the method of request is GET return true else false.
     * 
     *  @return bool  */
    function is_get()
    {
        return (strtoupper($_SERVER['REQUEST_METHOD']) === 'GET')  ? true : false;
    }
}

if (!function_exists('input_print')) {

    /**
     * To print database inside a input field use this.
     * It will escape values such as ', " or other entities.
     * 
     *  @return mixed  */
    function input_print($str)
    {

        return htmlentities($str);
    }
}



if (!function_exists('set_custom_header')) {
    /**
     * It will setup custom header
     * 
     * @param mixed $custom_header to set css or any other thing to the header
     * @return void It will set value only nothing will be return.
     */
    function set_custom_header($file)
    {
        $str = '';
        $ci = &get_instance();
        $custom_header  = $ci->config->item('custom_header');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file as $item) {
                $custom_header[] = $item;
            }
            $ci->config->set_item('custom_header', $custom_header);
        } else {
            $str = $file;
            $custom_header[] = $str;
            $ci->config->set_item('custom_header', $custom_header);
        }
    }
}

if (!function_exists('get_custom_header')) {
    /**
     * It will get customer header if set up.
     * 
     *  @return void|string  */
    function get_custom_header()
    {
        $str = '';
        $ci = &get_instance();
        $custom_header  = $ci->config->item('custom_header');


        if (!is_array($custom_header)) {
            return;
        }

        foreach ($custom_header as $item) {
            $str .= $item . "
";
        }

        return $str;
    }
}

if (!function_exists('set_custom_footer')) {
    /**
     * It will setup custom footer
     * 
     * @param mixed $custom_footer to set js or any other thing to the footer
     * @return void It will set value only nothing will be return.
     */
    function set_custom_footer($file)
    {
        $str = '';
        $ci = &get_instance();
        $custom_footer  = $ci->config->item('custom_footer');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file as $item) {
                $custom_footer[] = $item;
            }
            $ci->config->set_item('custom_footer', $custom_footer);
        } else {
            $str = $file;
            $custom_footer[] = $str;
            $ci->config->set_item('custom_footer', $custom_footer);
        }
    }
}

if (!function_exists('get_custom_footer')) {
    /**
     * It will get customer footer if set up.
     * 
     *  @return void|string  */
    function get_custom_footer()
    {
        $str = '';
        $ci = &get_instance();
        $custom_footer  = $ci->config->item('custom_footer');

        if (!is_array($custom_footer)) {
            return;
        }

        foreach ($custom_footer as $item) {
            $str .= $item . "
";
        }

        return $str;
    }
}

function check_login()
{
    $ci = &get_instance();
    if (!$ci->session->has_userdata("is_login")) {
        $ci->session->set_flashdata('msg_error', 'Silahkan Login Terlebih Dahulu');
        redirect("auths");
    }
}

function cmb_dinamis($name, $table, $field, $pk, $selected = null, $extra = null)
{
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control' $extra>";
    $data = $ci->db->get($table)->result();
    $cmb .= "<option value=''> -- All --</option>";
    foreach ($data as $d) {
        $cmb .= "<option value='" . $d->$pk . "'";
        $cmb .= $selected == $d->$pk ? " selected='selected'" : '';
        $cmb .= ">" . strtoupper($d->$field) . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function igDate($datetime)
{
    $time_ago        = strtotime($datetime);
    $current_time    = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    $minutes = round($seconds / 60);       // value 60 is seconds
    $hours   = round($seconds / 3600);      // value 3600 is 60 minutes * 60 sec
    $days    = round($seconds / 86400);     // 86400 = 24*60*60;
    $weeks   = round($seconds / 604800);    // 7*24*60*60;
    $months  = round($seconds / 2629440);   // ((365+365+365+365+366)/5/12)*24*60*60
    $years   = round($seconds / 31553280);  // (365+365+365+365+366)/5*24*60*60

    if ($seconds <= 60) {
        return "baru saja";
    } elseif ($minutes <= 60) {
        if ($minutes == 1) {
            return "1 menit yang lalu";
        } else {
            return "$minutes menit yang lalu";
        }
    } elseif ($hours <= 24) {
        if ($hours == 1) {
            return "1 jam yang lalu";
        } else {
            return "$hours jam yang lalu";
        }
    } elseif ($days <= 7) {
        if ($days == 1) {
            return "kemarin";
        } else {
            return "$days hari yang lalu";
        }
    } elseif ($weeks <= 4.3) { //4.3 == 52/12
        if ($weeks == 1) {
            return "1 minggu yang lalu";
        } else {
            return "$weeks minggu yang lalu";
        }
    } elseif ($months <= 12) {
        if ($months == 1) {
            return "1 bulan yang lalu";
        } else {
            return "$months bulan yang lalu";
        }
    } else {
        if ($years == 1) {
            return "1 tahun yang lalu";
        } else {
            return "$years tahun yang lalu";
        }
    }
}

function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}

function DateToIndo($date)
{ // fungsi atau method untuk mengubah tanggal ke format indonesia
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
    $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
    $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
    // $result = $tgl . " " . $BulanIndo[(int)$bulan - 1] . " " . $tahun;
    if (checkdate($bulan, $tgl, $tahun)) {
        $result = $tgl . " " . $BulanIndo[(int)$bulan - 1] . " " . $tahun;
    } else {
        $result = "not valid date";
    }
    return ($result);
}

function DateToIndoDayTime($date)
{
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
    $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
    $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
    $time = substr($date, 11, 8);

    $day = date('D', strtotime($date));
    $dayList = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    );

    $result =  $dayList[$day] . " / " . $tgl . " " . $BulanIndo[(int)$bulan - 1] . " " . $tahun . " " . $time;
    return ($result);
}

function getDay($date)
{
    $day = date('D', strtotime($date));
    $dayList = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    );
    return $dayList[$day];
}

function DateFormatIndo($date)
{ // fungsi atau method untuk mengubah tanggal ke format indonesia
    $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
    $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
    $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring	
    $result = $tgl . "-" . $bulan . "-" . $tahun;
    return ($result);
}

function dateTimeDBtoIndo($string){
    // contoh : 2019-01-30 10:20:20
    
    $bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];

    $date = explode(" ", $string)[0];
    $time = explode(" ", $string)[1];
    
    $tanggal = explode("-", $date)[2];
    $bulan = explode("-", $date)[1];
    $tahun = explode("-", $date)[0];
    
    

    return $tanggal . " " . $bulanIndo[abs($bulan)] . " " . $tahun . " " . $time;
}

function removeChar($arr)
{

    $str = str_replace(array(
        '\'', '"',
        ',', ';', '<', '>'
    ), ' ', $arr);
    return $str;
}
function arr_to_list($arr, $start = "<span>&nbsp;&nbsp;&nbsp;", $end = "</span><br/>")
{
    $arr_list = explode(";", $arr);
    $list = "";
    if (count($arr_list)>0) {
        for ($al = 0; $al < count($arr_list); $al++) {
            $list .=  $start . ($al + 1) . ". " . $arr_list[$al] . $end;
        }
    } else {
        $list .= "-<br/>";
    }
    return $list;
}

function get_list_ruang($tipe)
{
    if ($tipe == "RJ") {
        $tipe = "RAWAT JALAN";
    }

    if ($tipe == "RI") {
        $tipe = "RAWAT INAP";
    }

    $CI = &get_instance();
    $result = $CI->db
        ->where("grNama", $tipe)
        ->get("tbl01_ruang")
        ->result();
    return $result;
}

function get_list_dpjp()
{

    $CI = &get_instance();
    $result = $CI->db
        ->get("tbl01_pegawai")
        ->result();
    return $result;
}

function get_list_profesi($param=0)
{

    $CI = &get_instance();
    $result = $CI->db
        ->where("is_medis",1)
        ->get("tbl01_profesi")
        ->result();
    return $result;
}

function get_list_sdki()
{

    $CI = &get_instance();
    $db2 = $CI->load->database('dberm', TRUE);
    $result = $db2
        ->get("m_sdki")
        ->result();
    return $result;
}
function get_list_siki()
{

    $CI = &get_instance();
    $db2 = $CI->load->database('dberm', TRUE);
    $result = $db2
        ->order_by("kode asc")
        ->get("m_siki")
        ->result();
    return $result;
}
function get_list_slki()
{

    $CI = &get_instance();
    $db2 = $CI->load->database('dberm', TRUE);
    $result = $db2
        ->get("m_slki")
        ->result();
    return $result;
}

function trueOrFalse($param)
{
    switch ($param) {
        case '1':
            return "Ya";
            break;
        case '0':
            return "Tidak";
            break;
        default:
            return "-";
            break;
    }
}
function badOrGood($param)
{
    switch ($param) {
        case '1':
            return "Baik";
            break;
        case '0':
            return "Tidak Baik";
            break;
        default:
            return "-";
            break;
    }
}

function skalaVas($skor) {
    $result = "";
    if ($skor==0) {
        $result = "Tidak Nyeri";   
    } else if ($skor>=1 && $skor<=3) {
        $result = "Nyeri Ringan";   
    } else if ($skor>=4 && $skor<=6) {
        $result = "Nyeri Sedang";
    } else if ($skor>=7 && $skor<=10) {
        $result = "Nyeri Berat";
    };
    return $result;
}

function skalaWbfs($skor) {
    
    switch ($skor) {
        case '1':
            $result = "Tidak Nyeri";
            break;
        case '2':
            $result = "Sedikit Nyeri";
            break;
        case '3':
            $result = "Sedikit Lebih Nyeri";
            break;
        case '4':
            $result = "Lebih Nyeri";
            break;
        case '5':
            $result = "Sangat Nyeri";
            break;
        default:
            $result = "-";
            break;
    }
    return $result;
}

function getPegawai($arr=[]) {
    $CI = &get_instance();
    if (sizeof($arr) != 0) {
        $CI->db->where_in("profId",$arr);
    }
    return $CI->db->get("tbl01_pegawai");
}

function getRuang($arr=[]) {
    $CI = &get_instance();
    if (sizeof($arr) != 0) {
        $CI->db->where_in("grid",$arr);
    }
    return $CI->db->get("tbl01_ruang");
}

function getInfoDaftar($idx) {
    $ci = get_instance();
    return $ci->db->select("idx,id_daftar,reg_unit,tgl_masuk,")
    ->where("idx",$idx)
    ->get("tbl02_pendaftaran")
    ->row();
}

function gantiTagP($str) {
    return str_replace("<p>","",str_replace("</p>","<br/>",$str));
}

function cekPasswordUser($pass,$nrp) {
    $ci = get_instance();
    $cek = $ci->db->select("NRP")
    ->where(['NRP'=>$nrp,'userPasw'=>md5($pass)])
    ->get("tbl01_pegawai")
    ->num_rows();
    if ($cek>0) {
        return true;
    } else {
        return false;
    }
}

function getNip($nrp) {
    $ci = get_instance();
    $cek = $ci->db->select("NIP")
    ->where(['NRP'=>$nrp])
    ->get("tbl01_pegawai")
    ->row();
    if ($cek) {
        return $cek->NIP;
    } else {
        return "-";
    }
}

function getTtd($nomr) {
    $ci = get_instance();
    $cek = $ci->db->select("*")
    ->where(['nomr_pasien'=>$nomr])
    ->get("tbl01_pasien_ttd")
    ->row();
    if ($cek) {
        return $cek;
    } else {
        return false;
    }
}

function getAwalRawatByIdx($idx) {
    $ci = get_instance();
    $db2 = $ci->load->database('dberm', TRUE);
        return $db2
            ->select("*")
            ->where(["a.idx" => $idx])
            ->get("rj_awal_rawat a")
            ->row();
}

function tampilRawatByIdx($d) {
    $html ="<b>S :</b>";
    $html.="<b>Keluhan Utama</b> : ".$d->keluhan;
    $html.=", <b>Riwayat Kesehatan</b> : pernah dirawat - ".trueOrFalse($d->dirawat)." $d->kapan_dirawat $d->dimana_dirawat , Diagnosis : $d->diagnosis , Implant : ".trueOrFalse($d->implant)." $d->implant_detail";
    $html.=", <b>Riwayat Penyakit Dahulu</b> : ".arr_to_list($d->riwayat_sakit," "," ").",Riwayat operasi : ".trueOrFalse($d->riwayat_operasi_cek)." $d->riwayat_operasi $d->riwayat_operasi_tahun";
    $html.=", <b>Riwayat Penyakit Keluarga</b> : ".arr_to_list($d->riwayat_sakit_keluarga," "," ");
    $html.=", <b>Riwayat Alergi</b> : Obat :".trueOrFalse($d->obat)." $d->obat_detail Makanan : ".trueOrFalse($d->makanan)." $d->makanan_detail Lain-lain: ".$d->riwayat_lain;
    $html.="<br/><b>O :</b>";
    $html.="<b>status psikologis</b> : ".arr_to_list($d->riwayat_psikologis," "," ");
    $html.=", <b>status mental</b> : sadar dan orientasi baik :".trueOrFalse($d->status_mental_sadar).", ada masalah prilaku : ".trueOrFalse($d->status_mental_prilaku).", $d->status_mental_prilaku_detail".", Perilaku kekerasan yang dialami sebelumnya : ".trueOrFalse($d->status_mental_keras).", $d->status_mental_keras_detail";
    $html.=", <b>Skrining Nyeri</b> : ".$d->nyeri;
    if ($d->nyeri=="nyeri akut" || $d->nyeri=="nyeri kronis") {
        $html.="P: $d->profokatif Q: $d->quality R: $d->region S: $d->skala T: $d->timing";
        switch ($d->metode) {
            case '1':
                $html.=", Metode : Visual Analog Scale dengan Skala : $d->skala_vas";
                break;
            case '2':
                $html.=", Metode : Wong Barker Face Scale dengan Skala : $d->skala_wbfs";
                break;
            case '3':
                $html.=", Metode : FLACC dengan Skor: $d->flacc_skor";
                break;
            default:
                # code...
                break;
        }
    }
    $html.=", <b>Risiko Cidera / Jatuh</b> : ".trueOrFalse($d->jatuh)." - ".$d->jatuh_detail;
    $html.=", Gelang risiko kuning : ".trueOrFalse($d->gelang_risiko);
    $html.=", Gelang risiko kuning : ".trueOrFalse($d->gelang_risiko);
    $html.=", Diberitahukan ke dokter : ".trueOrFalse($d->risiko_info)." - ".$d->risiko_info_detail;
    $html.=", <b>Pemeriksaan Fisik</b> : ";
    $html.=", Keadaan Umum : ".$d->keadaan_umum;
    $html.=", Kesadaran : ".$d->kesadaran_umum;
    $html.=", GCS : E: $d->gcs_e M: $d->gcs_m V: $d->gcs_v";
    $html.=", TTV : Sh: $d->ttv_sh ,Nd: $d->ttv_nd ,Rr: $d->ttv_rr ,SpO2: $d->ttv_spo2 ,TD: $d->ttv_td ,Down Score: $d->ttv_ds";
    $html.=", Pemeriksaan : ".$d->status_generalis;
    $html.=", Penunjang : Radiologi : $d->penunjang_rad_detail Labor : $d->penunjang_lab_detail Lain-lain : $d->penunjang_lain_detail"."<br/>";
    $html.="<b>A :</b>";
    $html.="".arr_to_list($d->diagnosa_keperawatan,"","; ");
    $html.="<br/><b>P :</b>";
    $html.="".arr_to_list($d->tindakan_keperawatan,"","; ");
    return $html;
}

function group_lab($key) {
    switch ($key) {
        case "A":
            return "HEMATOLOGI";
            break;
        case 'B':
            return "URINE";
        case 'C':
            return "FAECES";
        case 'D':
            return "SERULOGI";
        case 'E':
            return "KIMIA KLINIK";
        case 'F':
            return "SEROLOGI";
        case 'G':
            return "TEST NARKOBA";
        default:
            return "-";
            break;
    }
}

function getPermintaanPenunjang($idx) {
    $ci = get_instance();
    $db2 = $ci->load->database('dberm', TRUE);
    return $db2
        ->select("*")
        ->where(["a.idx" => $idx])
        ->get("rj_p_penunjang a")
        ->result();
}

function getPermintaanPenunjangById($id) {
    $ci = get_instance();
    $db2 = $ci->load->database('dberm', TRUE);
    return $db2
        ->select("*")
        ->where(["a.id" => $id])
        ->get("rj_p_penunjang a")
        ->row();
}

function getPermintaanPenunjangDetail($id) {
    $ci = get_instance();
    $db2 = $ci->load->database('dberm', TRUE);
    return $db2
        ->select("*")
        ->where(["a.rj_p_penunjang_id" => $id])
        ->get("rj_p_penunjang_detail a")
        ->result();
}

function getPermintaanPenunjangDetailById($id) {
    $ci = get_instance();
    $db2 = $ci->load->database('dberm', TRUE);
    return $db2
        ->select("*")
        ->where(["a.id" => $id])
        ->get("rj_p_penunjang_detail a")
        ->row();
}

function getPanduanKlinik() {
    $ci = get_instance();
    $db2 = $ci->load->database('dberm', TRUE);
    return $db2
        ->select("*")
        ->get("m_pk a")
        ->result();
}

function getListObat() {
    $ci = get_instance();
    $db3 = $ci->load->database('dbfarmasi', TRUE);
    return $db3
        ->select("*")
        ->get("tbl04_barang a")
        ->result();
}

function getPermintaanResep($idx) {
    $ci = get_instance();
    $db2 = $ci->load->database('dberm', TRUE);
    return $db2
        ->select("*")
        ->where(["a.idx" => $idx])
        ->get("rj_p_resep a")
        ->row();
}

function getPermintaanResepDetailById($id) {
    $ci = get_instance();
    $db2 = $ci->load->database('dberm', TRUE);
    return $db2
        ->select("*")
        ->where(["rj_p_resep_id" => $id])
        ->get("rj_p_resep_detail a")
        ->result();
}

function getAlatMedis($tipe="") {
    $ci = get_instance();
    $db2 = $ci->load->database('dberm', TRUE);
    if ($tipe!="") {
        $db2->where("a.tipe",$tipe);
    }
    return $db2
        ->select("*")
        ->get("m_alat_medis a")->result();
}

function getPemeriksaan($tipe="") {
    $ci = get_instance();
    $db2 = $ci->load->database('dberm', TRUE);
    if ($tipe!="") {
        $db2->where("a.tipe",$tipe);
    }
    return $db2
        ->select("*")
        ->get("m_pk_detail a")->result();
}




/* End of file mcdhe_helper.php and path \application\helpers\mcdhe_helper.php */
