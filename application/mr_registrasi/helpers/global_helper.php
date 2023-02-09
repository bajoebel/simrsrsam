<?php
function getData(
    $config = array(
        'function'      => 'getData',
        'url'           => 'controller/function/',
        'param'         => '',
        'field'         => array('field1', 'field2'),
        'variable'      => array('idx' => 'idx'),
        'start'         => 1,
        'limit'         => 10,
        'row_count'     => 10,
        'keyword_id'    => 'q',
        'limit_id'      => 'limit',
        'data_id'       => 'data',
        'page_id'       => 'pagination',
        'jquery'        => 'assets/bower_components/jquery/dist/jquery.js',
        'number'        => true,
        'action'        => true,
        'load'          => true,
        'action_button' => ''
    )
) {
    
    //Buat Header
    $colspan = count($config["field"]);
    if ($config["number"] == true) $colspan++;
    if ($config["action"] == true) $colspan++;
    $html = '';
    $html .= '
    function ' . $config["function"] . '(start){';
    $html .= "
        $('#start').val(start);";
    $html .= "
        var search = $('#" . $config["keyword_id"] . "').val();";
    $html .= "
        var limit = $('#" . $config["limit_id"] . "').val();";
    if(is_array($config["param_id"])){
        $param="";
        foreach ($config["param_id"] as $key => $value) {
            $html .= "
            var $key = $('#" . $value . "').val();";
            $param.= "+\"&$key=\" + $key";
        }
    }else{
        $html .= "
        var param = $('#" . $config["param_id"] . "').val();";
        $param="+\"&param=\" + param";
    }
    //$parameter="";
    //if(!empty($param)) $parameter.="+".$param;
    
    $html .= "
        var url = '" . base_url() . $config["url"] . "?keyword=' + search + \"&start=\" + start + \"&limit=\" + limit ".$param;
    $html .= "
        console.clear()";
    $html .= "
        console.log(url)";
    $html .= "
        $.ajax({
            url     : url,
            type    : \"GET\",
            dataType: \"json\",
            data    : {get_param : 'value'},
            beforeSend: function () {
                var tabel = \"<tr id='loading'><td colspan='" . $colspan . "'><b>Loading...</b></td></tr>\";
                $('#" . $config["data_id"] . "').html(tabel);
                $('#" . $config["page_id"] . "').html('');
            },";
    $html .= "
            success : function(data){
            //menghitung jumlah data
        
        if(data[\"status\"]==true){
            $('#" . $config["data_id"] . "').html('');
            var res    = data[\"data\"];
            var jmlData=res.length;
            var limit   = data[\"limit\"];
            var tabel   = \"\";
            //Create Tabel
            var no = (parseInt(start)*parseInt(limit))-parseInt(limit);
            var dari = no+1;
            var sampai = no+parseInt(limit);
            var desc = \"<button class='btn btn-default btn-sm' type='button'>Showing \"+ dari + \" To \" + sampai + \" of \" +data[\"row_count\"]+\"</button>\";
            for(var i=0; i<jmlData;i++){
                no++;
                tabel=\"<tr>\";";
    if ($config["number"] == true) $html .= "tabel+=\"<td>\"+no+\"</td>\";";
    $field = $config["field"];
    //$field = array('as', 'as');
    $jmldata = count($field);
    for ($i = 0; $i < $jmldata; $i++) {
        $exp = explode('{{', $field[$i]);
        $f = '';
        if (count($exp) > 1) {
            $f = $field[$i];
            $no = 0;
            foreach ($config["variable"] as $var => $val) {
                $no++;
                if ($no == 1) {
                    if (substr($f, 0, 1) == "=") $f = str_replace('{{' . $var . '}}', 'res[i]["' . $val . '"]', $f);
                    else $f = str_replace('{{' . $var . '}}', '+res[i]["' . $val . '"]+"', $f);
                }
                else {
                    if (substr($f, 0, 1) == "=") $f = $f = str_replace('{{' . $var . '}}', 'res[i]["' . $val . '"]', $f);
                    else $f = $f = str_replace('{{' . $var . '}}', '"+res[i]["' . $val . '"]+"', $f);
                }
                
            }
        } else {
            $f = "\"+res[i]['" . $field[$i] . "']+\"";
        }
        if (substr($f, 0, 1) == "=") {
            $f = str_replace("=","",$f);
            $html.= "tabel+=\"<td>\"+" . $f . "+\"</td>\";";
        }else{
            $html .= "
        tabel+=\"<td>" . $f . "</td>\";";
        }
        
    }
    if ($config['action'] == true) {
        $exp = explode('{{', $config["action_button"]);
        if (count($exp) > 1) {
            $no = 0;
            $ab = $config["action_button"];
            foreach ($config["variable"] as $var => $val) {
                $no++;
                $ab = $ab = str_replace('{{' . $var . '}}', '"+res[i]["' . $val . '"]+"', $ab);
            }
            //echo $ab;
        }else{
            $ab = $config["action_button"];
        }
        $html .= "
        tabel+=\"<td style='text-align:right;'>" . $ab . "</td>\";";
    }
    $html .= "tabel+=\"</tr>\";
                $('#" . $config["data_id"] . "').append(tabel);
            }
            //Create Pagination
            if(data[\"row_count\"]<=limit){
                $('#" . $config["page_id"] . "').html(\"\");
            }else{
                console.log(\"buat Pagination\");
                var pagination=\"\";
                var btnIdx=\"\";
                jmlPage = Math.ceil(data[\"row_count\"]/limit);
                offset  = data[\"start\"] % limit;
                /*curIdx  = Math.ceil((data[\"start\"]/data[\"limit\"])+1);
                prev    = (curIdx-2) * data[\"limit\"];
                next    = (curIdx) * data[\"limit\"];*/
    
                
                //var curSt=(curIdx*data[\"limit\"])-jmlData;
                //var mulai = start;
                var curIdx = start;
                var btn=\"btn-default\";
                //var lastSt=jmlPage;
                var btnFirst=\"<button class='btn btn-default btn-sm' onclick='" . $config['function'] . "(1)'><span class='fa fa-angle-double-left'></span></button>\";
                if (curIdx > 1) {
                    var prevSt=curIdx-1;
                    btnFirst+=\"<button class='btn btn-default btn-sm' onclick='" . $config['function'] . "(\"+prevSt+\")'><span class='fa fa-angle-left'></span></button>\";
                }
    
                var btnLast=\"\";
                if(curIdx<jmlPage){
                    var nextSt=curIdx+1;
                    btnLast+=\"<button class='btn btn-default btn-sm' onclick='" . $config['function'] . "(\"+nextSt+\")'><span class='fa fa-angle-right'></span></button>\";
                }
                console.log(curIdx);
                btnLast+=\"<button class='btn btn-default btn-sm' onclick='" . $config['function'] . "(\"+jmlPage+\")'><span class='fa fa-angle-double-right'></span></button>\";
                
                if(jmlPage>=5){
                    console.clear();
                    console.log('Jumlah Halaman > 5');
                    if(curIdx>=3){
                        console.log('Cur Idx >= 3');
                        var idx_start=curIdx - 2;
                        var idx_end=curIdx + 2;
                        if(idx_end>=jmlPage) idx_end=jmlPage;
                    }else{
                        var idx_start=1;
                        var idx_end=5;
                    }
                    for (var j = idx_start; j<=idx_end; j++) {
                        if(curIdx==j)  btn=\"btn-primary\"; else btn= \"btn-default\";
                        btnIdx+=\"<button class='btn \" +btn +\" btn-sm' onclick='" . $config['function'] . "(\"+ j +\")'>\" + j +\"</button>\";
                    }
                }else{
    
                    for (var j = 1; j<=jmlPage; j++) {
                        if(curIdx==j)  btn=\"btn-primary\"; else btn= \"btn-default\";
                        btnIdx+=\"<button class='btn \" +btn +\" btn-sm' onclick='" . $config['function'] . "(\"+ j +\")'>\" + j +\"</button>\";
                    }
                }
                pagination+=\"<div class='btn-group'>\"+desc+btnFirst + btnIdx + btnLast+\"</div>\";
                $('#" . $config["page_id"] . "').html(pagination);
            }
        }
    },
    complete : function(){
        //$('#loading').hide();
    }";
    $html .= "});";
    $html .= '}';
    if ($config["load"] == 1) $html .= $config['function'] . "(1)";
    return $html;
    //Buat Body

}

function encrypt_decrypt($action, $string, $output = false)
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'a4a072432557901f24bcca133d1410256f0fab06';
    $secret_id = '000001';
    // hash
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
function getSessionID()
{
    return session_id();
}
function getAppName()
{
    return "MR Registrasi App";
}
function getAppLgName()
{
    return "<b>MR Registrasi</b> App";
}
function getAppMnName()
{
    return "<b>MR-R</b>A";
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
function getNamaUserByID($nrp)
{
    $CI = &get_instance();
    $CI->db->where('NRP', $nrp);
    $cekQuery = $CI->db->get('tbl01_pegawai');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['pgwNama'];
    } else {
        return $nrp;
    }
}

function getNamaRuangByID($idx)
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
function getNamaKamarByID($idx)
{
    $CI = &get_instance();
    $CI->db->where('id_kamar', $idx);
    $cekQuery = $CI->db->get('tbl01_kamar');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['nama_kamar'];
    } else {
        return "";
    }
}
function getKelasByID($idx)
{
    $CI = &get_instance();
    $CI->db->where('idx', $idx);
    $cekQuery = $CI->db->get('tbl01_kelas_layanan');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['kelas_layanan'];
    } else {
        return "";
    }
}
function getCaraBayarByID($idx)
{
    $CI = &get_instance();
    $CI->db->where('idx', $idx);
    $cekQuery = $CI->db->get('tbl01_cara_bayar');
    if ($cekQuery->num_rows() > 0) {
        $res = $cekQuery->row_array();
        return $res['cara_bayar'];
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

function getPesertaByKartuBPJS($param1, $param2)
{
    $tglSEP = date("Y-M-d", strtotime($param2));
    $url = HOST_VC . "Peserta/nokartu/$param1/tglSEP/$tglSEP";
    return initCURL($url);
}
function getPesertaByKartuNIK($param1, $param2)
{
    $tglSEP = date("Y-M-d", strtotime($param2));
    $url = webServiceURL() . "Peserta/nik/$param1/tglSEP/$tglSEP";
    return initCURL($url);
}
function initCURL($url)
{
    $CI = &get_instance();
    $result = getResult();
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array($result));
    $json_response = curl_exec($curl);
    if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
    }
    curl_close($curl);
    if (!empty($error_msg)) {
        $error = array('metaData' => array('code' => 201, 'message' => $error_msg));
        $json_response = json_encode($error);
    }
    return $json_response;
}
function getResult()
{
    $data = getConsID();
    $tStamp = getTimestamp();
    $encodedSignature = getSignature();
    $result = "";
    $result .= "X-cons-id: " . $data . "\r\n";
    $result .= "X-timestamp: " . $tStamp . "\r\n";
    $result .= "X-signature: " . $encodedSignature;
    return $result;
}
function getConsID()
{
    return CONS_ID_VC;
}
function getScretID()
{
    return SECREET_ID_VC;
}
function webServiceURL()
{
    return HOST_VC;
}
function getTimestamp()
{
    $scretId = getConsID();
    $scretKey = getScretID();
    date_default_timezone_set('UTC');
    $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
    return $tStamp;
}
function getSignature()
{
    $scretId = getConsID();
    $scretKey = getScretID();
    date_default_timezone_set('UTC');
    $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
    $signature = hash_hmac('sha256', $scretId . "&" . $tStamp, $scretKey, true);
    $encodedSignature = base64_encode($signature);
    return $encodedSignature;
}
function longDate($tgl){
    $tgl=explode('-',$tgl);
    $bulan=array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
    return $tgl[2]." " .$bulan[intval($tgl[1])]." " .$tgl[0];
}

function isJSON($string){
    return is_string($string) && is_array(json_decode($string, true)) ? true : false;
}

function getField($field, $kondisi, $table)
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
function cekPersetujuan($idx) {
    $ci = get_instance();
    $ci->erm = $ci->load->database('erm', true);
    $data=$ci->erm->where('idx',$idx)->get('rj_setuju_umum')->row_array();
    return $data;
}
function cekEdukasi($idx) {
    $ci = get_instance();
    $ci->erm = $ci->load->database('erm', true);
    $data=$ci->erm->where('idx',$idx)->get('rj_iep')->row_array();
    return $data;
}