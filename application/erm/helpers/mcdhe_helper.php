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

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
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

function object_to_array($data)
{
    if (is_array($data) || is_object($data))
    {
        $result = [];
        foreach ($data as $key => $value)
        {
            $result[$key] = (is_array($value) || is_object($value)) ? object_to_array($value) : $value;
        }
        return $result;
    }
    return $data;
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
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

function getListObat($searchTerm="") {
    $ci = get_instance();
    $db3 = $ci->load->database('dbfarmasi', TRUE);
    $db3->select("*");
    if ($searchTerm!="") {
        $db3->like('NMBRG',$searchTerm);
    }
    return $db3->get("tbl04_barang a")
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

function getKonsulInternalById($nomr,$idx,$id) {
    $ci = get_instance();
    $db2 = $ci->load->database('dberm', TRUE);
    $db2->where(["nomr"=>$nomr,"idx"=>$idx,"id"=>$id]);
    return $db2->get("rj_konsul_internal")->row();
}

function getBillingTindakan($kelompok) {
    $ci = get_instance();
    // $grid = $ci->session->userdata("grRuang");
    $db3 = $ci->load->database('dbsimrs', TRUE);
    $db3->select("a.*,b.grNama");
    if (is_array($kelompok)) {
        $db3->group_start();
        $db3->where_in("a.profId",$kelompok);
        $db3->group_end();
        $db3->where(["a.is_aktif"=>1,"a.klId"=>"KL02"]);
    } else {
        $db3->where(["a.is_aktif"=>1,"a.profId"=>$kelompok]);
    }
    $db3->join("group_ruang b","a.grId=b.grId");
    return $db3->get("tarif_layanan a");
}

function getBillingTindakanId($id) {
    $ci = get_instance();
    $db3 = $ci->load->database('dbsimrs', TRUE);
    $db3->select("a.*,b.grNama");
    $db3->where("tlId",$id);
    $db3->join("group_ruang b","a.grId=b.grId");
    return $db3->get("tarif_layanan a")->row();
}

function getBillingTindakanDetail($id) {
    $ci = get_instance();
    $db2 = $ci->load->database('dberm', TRUE);
    $db2->where("a.rj_billing_id",$id);
    return $db2->get("rj_billing_detail a");
}

function getPermintaanTindakan($idx) {
    $ci = get_instance();
    $db2 = $ci->load->database('dberm', TRUE);
    $db2->where("a.idx",$idx);
    return $db2->get("rj_billing a")->row();
}

function getPermintaanTindakanDetailById($id) {
    $ci = get_instance();
    $db2 = $ci->load->database('dberm', TRUE);
    $db2->where("a.rj_billing_id",$id);
    return $db2->get("rj_billing_detail a")->result();
}






/* End of file mcdhe_helper.php and path \application\helpers\mcdhe_helper.php */
