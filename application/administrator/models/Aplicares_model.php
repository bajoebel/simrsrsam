<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Aplicares_model extends CI_Model{
    /**
     * Bridging BPJS
     */
    function http_request($url,$jsondata=""){
        if(empty($jsondata)){
            $result = $this->getResult();
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
        }else{
            
            $contentType = "application/json";
            $consID = CONS_ID_VC;
            $tStamp = $this->getTimestamp();
            $encodedSignature = $this->getSignature();

            $result = "";
            $result .= "Content-Type: " . $contentType . "\r\n";
            $result .= "X-cons-id: " . $consID . "\r\n";
            $result .= "X-timestamp: " . $tStamp . "\r\n";
            $result .= "X-signature: " . $encodedSignature;

            $curl = curl_init($url); 
            curl_setopt($curl, CURLOPT_HEADER, false); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE); 
            curl_setopt($curl, CURLOPT_HTTPHEADER,array($result));
            curl_setopt($curl, CURLOPT_POST, false); 
            curl_setopt($curl, CURLOPT_TIMEOUT, 30); 
            curl_setopt($curl, CURLOPT_POSTFIELDS, $jsondata); 
            $return = curl_exec($curl); 
            curl_close($curl);
            return $return;
            
        }
        
    }
    function getResult()
    {
        $data = CONS_ID_VC;
        $tStamp = $this->getTimestamp();
        $encodedSignature = $this->getSignature();
        $result = "";
        $result .= "X-cons-id: " . $data . "\r\n";
        $result .= "X-timestamp: " . $tStamp . "\r\n";
        $result .= "X-signature: " . $encodedSignature;
        return $result;
    }
    function getTimestamp()
    {
        $scretId = CONS_ID_VC;
        $scretKey = SECREET_ID_VC;
        date_default_timezone_set('UTC');
        $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
        return $tStamp;
    }
    function getSignature()
    {
        $scretId = CONS_ID_VC;
        $scretKey = SECREET_ID_VC;
        date_default_timezone_set('UTC');
        $tStamp = strval(time() - strtotime('1970-01-01 00:00:00'));
        $signature = hash_hmac('sha256', $scretId . "&" . $tStamp, $scretKey, true);
        $encodedSignature = base64_encode($signature);
        return $encodedSignature;
    }

    function getData($start,$limit)
    {
        $url = $this->webServiceURL() . "aplicaresws/rest/bed/read/".KODERS_VC."/$start/$limit";
        return $this->http_request($url);
    }

    function getKelas()
    {
        $url = $this->webServiceURL() . "aplicaresws/rest/ref/kelas";
        $res= $this->http_request($url);
        $arr=json_decode($res);
        if($arr->metadata->code==1){
            return $arr->response->list;
        }else{
            return array();
        }
    }
    function getDatars($start=0, $limit=10, $keyword=""){
        return $this->db->query("SELECT tabel1.*,IFNULL(tabel2.jml_terisi,0) AS jml_terisi,IFNULL(tabel2.terisi_perempuan,0) AS terisi_perempuan,IFNULL(tabel2.terisi_lakilaki,0) AS terisi_lakilaki,
        (CASE WHEN (jekel=1 AND jml_terisi IS NOT NULL) THEN kapasitas - jml_terisi WHEN(jekel=1 AND jml_terisi IS NULL) THEN kapasitas ELSE 0 END) AS tersediapria,
        (CASE WHEN (jekel=0 AND jml_terisi IS NOT NULL) THEN kapasitas - jml_terisi WHEN (jekel=0 AND jml_terisi IS NULL) THEN kapasitas ELSE 0 END) AS tersediawanita,
        (CASE WHEN (jekel=2 AND jml_terisi IS NOT NULL) THEN kapasitas - jml_terisi WHEN(jekel=2 AND jml_terisi IS NULL) THEN kapasitas ELSE 0 END) AS tersediapriawanita
        FROM
        (SELECT `idkelas_jkn` AS kodekelas,`kelas_jkn`,`id_ruang` AS koderuang,`nama_ruang` AS namaruang,SUM(`jml_tt`) AS kapasitas,`jekel` FROM tbl01_kamar WHERE status_kamar=1 GROUP BY id_ruang,idkelas_jkn) AS tabel1
        LEFT JOIN 
        (SELECT
          a.id_ruang,e.`idkelas_jkn` AS kodekelas,e.`kelas_jkn`,
          COUNT(`a`.`id_daftar`) AS `jml_terisi`,
          SUM((CASE WHEN ((`a`.`rawatgabung` = 0) AND ((`a`.`jns_kelamin` = '0') OR (`a`.`jns_kelamin` = 'P'))) THEN 1 ELSE 0 END)) AS `terisi_perempuan`,
          SUM((CASE WHEN ((`a`.`rawatgabung` = 0) AND ((`a`.`jns_kelamin` = '1') OR (`a`.`jns_kelamin` = 'L'))) THEN 1 ELSE 0 END)) AS `terisi_lakilaki`
        FROM (`tbl02_pendaftaran` `a`
           JOIN `tbl01_kamar` `e`
             ON ((`a`.`id_kamar` = `e`.`id_kamar`)))
        WHERE ((`a`.`jns_layanan` = 'RI')
               AND (`a`.`id_kamar` <> '0')
               AND (a.rawatgabung = 0)
               AND (NOT(`a`.`reg_unit` IN(SELECT `f`.`reg_unit` FROM `tbl02_pendaftaran_batal` `f`)))
               AND (NOT(`a`.`reg_unit` IN(SELECT `c`.`reg_unit` FROM `tbl02_pasien_pulang` `c`)))
               AND (NOT(`a`.`reg_unit` IN(SELECT `d`.`reg_unit` FROM `tbl02_pindah_ranap` `d` WHERE (`d`.`idx` IN(SELECT `e`.`id_pindah_ranap` FROM `tbl02_pindah_ranap_response` `e`) AND (`d`.`ruang_pengirim` <> `d`.`id_ruang`))))))
        GROUP BY `a`.`id_ruang`,`e`.`idkelas_jkn`) AS tabel2 ON tabel1.koderuang = tabel2.id_ruang AND tabel1.kodekelas=tabel2.kodekelas 
        WHERE tabel1.kelas_jkn LIKE '%$keyword%' OR namaruang LIKE '%$keyword%'
        GROUP BY `tabel1`.`koderuang`, tabel1.`kodekelas`
        ORDER BY `tabel1`.`koderuang`, tabel1.`kodekelas` LIMIT $start , $limit")->result();
    }

    function countDatars($keyword=""){
        return $this->db->query("SELECT tabel1.*,IFNULL(tabel2.jml_terisi,0) AS jml_terisi,IFNULL(tabel2.terisi_perempuan,0) AS terisi_perempuan,IFNULL(tabel2.terisi_lakilaki,0) AS terisi_lakilaki,
        (CASE WHEN (jekel=1 AND jml_terisi IS NOT NULL) THEN kapasitas - jml_terisi WHEN(jekel=1 AND jml_terisi IS NULL) THEN kapasitas ELSE 0 END) AS tersediapria,
        (CASE WHEN (jekel=0 AND jml_terisi IS NOT NULL) THEN kapasitas - jml_terisi WHEN (jekel=0 AND jml_terisi IS NULL) THEN kapasitas ELSE 0 END) AS tersediawanita,
        (CASE WHEN (jekel=2 AND jml_terisi IS NOT NULL) THEN kapasitas - jml_terisi WHEN(jekel=2 AND jml_terisi IS NULL) THEN kapasitas ELSE 0 END) AS tersediapriawanita
        FROM
        (SELECT `idkelas_jkn` AS kodekelas,`kelas_jkn`,`id_ruang` AS koderuang,`nama_ruang` AS namaruang,SUM(`jml_tt`) AS kapasitas,`jekel` FROM tbl01_kamar WHERE status_kamar=1 GROUP BY id_ruang,idkelas_jkn) AS tabel1
        LEFT JOIN 
        (SELECT
          a.id_ruang,e.`idkelas_jkn` AS kodekelas,e.`kelas_jkn`,
          COUNT(`a`.`id_daftar`) AS `jml_terisi`,
          SUM((CASE WHEN ((`a`.`rawatgabung` = 0) AND ((`a`.`jns_kelamin` = '0') OR (`a`.`jns_kelamin` = 'P'))) THEN 1 ELSE 0 END)) AS `terisi_perempuan`,
          SUM((CASE WHEN ((`a`.`rawatgabung` = 0) AND ((`a`.`jns_kelamin` = '1') OR (`a`.`jns_kelamin` = 'L'))) THEN 1 ELSE 0 END)) AS `terisi_lakilaki`
        FROM (`tbl02_pendaftaran` `a`
           JOIN `tbl01_kamar` `e`
             ON ((`a`.`id_kamar` = `e`.`id_kamar`)))
        WHERE ((`a`.`jns_layanan` = 'RI')
               AND (`a`.`id_kamar` <> '0')
               AND (a.rawatgabung = 0)
               AND (NOT(`a`.`reg_unit` IN(SELECT `f`.`reg_unit` FROM `tbl02_pendaftaran_batal` `f`)))
               AND (NOT(`a`.`reg_unit` IN(SELECT `c`.`reg_unit` FROM `tbl02_pasien_pulang` `c`)))
               AND (NOT(`a`.`reg_unit` IN(SELECT `d`.`reg_unit` FROM `tbl02_pindah_ranap` `d` WHERE (`d`.`idx` IN(SELECT `e`.`id_pindah_ranap` FROM `tbl02_pindah_ranap_response` `e`) AND (`d`.`ruang_pengirim` <> `d`.`id_ruang`))))))
        GROUP BY `a`.`id_ruang`,`e`.`idkelas_jkn`) AS tabel2 ON tabel1.koderuang = tabel2.id_ruang AND tabel1.kodekelas=tabel2.kodekelas 
        WHERE tabel1.kelas_jkn LIKE '%$keyword%' OR namaruang LIKE '%$keyword%'
        GROUP BY `tabel1`.`koderuang`, tabel1.`kodekelas`")->num_rows();
    }
    // function getKelas(){
    //     $url = $this->webServiceURL() . "aplicaresws/rest/ref/kelas";
    //     return $this->http_request($url);
    // }
    
    function getCURL($url=null){
        if ($url == null) {
            $url = $this->webServiceURL()."aplicaresws/rest/ref/kelas";
        }

        $result = $this->getResult();
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,array($result));
        $json_response = curl_exec($curl);        
        curl_close($curl);
        return $json_response;        
    }
    function webServiceURL(){
        return "http://api.bpjs-kesehatan.go.id/";
    }

    function getdatabed(){
        return $this->db->query("SELECT tabel1.*,IFNULL(tabel2.jml_terisi,0) AS jml_terisi,IFNULL(tabel2.terisi_perempuan,0) AS terisi_perempuan,IFNULL(tabel2.terisi_lakilaki,0) AS terisi_lakilaki,
        (CASE WHEN (jekel=1 AND jml_terisi IS NOT NULL) THEN kapasitas - jml_terisi WHEN(jekel=1 AND jml_terisi IS NULL) THEN kapasitas ELSE 0 END) AS tersediapria,
        (CASE WHEN (jekel=0 AND jml_terisi IS NOT NULL) THEN kapasitas - jml_terisi WHEN (jekel=0 AND jml_terisi IS NULL) THEN kapasitas ELSE 0 END) AS tersediawanita,
        (CASE WHEN (jekel=2 AND jml_terisi IS NOT NULL) THEN kapasitas - jml_terisi WHEN(jekel=2 AND jml_terisi IS NULL) THEN kapasitas ELSE 0 END) AS tersediapriawanita
        FROM
        (SELECT `idkelas_jkn` AS kodekelas,`kelas_jkn`,`id_ruang` AS koderuang,`nama_ruang` AS namaruang,SUM(`jml_tt`) AS kapasitas,`jekel` FROM tbl01_kamar WHERE status_kamar=1 GROUP BY id_ruang,idkelas_jkn) AS tabel1
        LEFT JOIN 
        (SELECT
          a.id_ruang,e.`idkelas_jkn` AS kodekelas,e.`kelas_jkn`,
          COUNT(`a`.`id_daftar`) AS `jml_terisi`,
          SUM((CASE WHEN ((`a`.`rawatgabung` = 0) AND ((`a`.`jns_kelamin` = '0') OR (`a`.`jns_kelamin` = 'P'))) THEN 1 ELSE 0 END)) AS `terisi_perempuan`,
          SUM((CASE WHEN ((`a`.`rawatgabung` = 0) AND ((`a`.`jns_kelamin` = '1') OR (`a`.`jns_kelamin` = 'L'))) THEN 1 ELSE 0 END)) AS `terisi_lakilaki`
        FROM (`tbl02_pendaftaran` `a`
           JOIN `tbl01_kamar` `e`
             ON ((`a`.`id_kamar` = `e`.`id_kamar`)))
        WHERE ((`a`.`jns_layanan` = 'RI')
               AND (`a`.`id_kamar` <> '0')
               AND (a.rawatgabung = 0)
               AND (NOT(`a`.`reg_unit` IN(SELECT `f`.`reg_unit` FROM `tbl02_pendaftaran_batal` `f`)))
               AND (NOT(`a`.`reg_unit` IN(SELECT `c`.`reg_unit` FROM `tbl02_pasien_pulang` `c`)))
               AND (NOT(`a`.`reg_unit` IN(SELECT `d`.`reg_unit` FROM `tbl02_pindah_ranap` `d` WHERE (`d`.`idx` IN(SELECT `e`.`id_pindah_ranap` FROM `tbl02_pindah_ranap_response` `e`) AND (`d`.`ruang_pengirim` <> `d`.`id_ruang`))))))
        GROUP BY `a`.`id_ruang`,`e`.`idkelas_jkn`) AS tabel2 ON tabel1.koderuang = tabel2.id_ruang AND tabel1.kodekelas=tabel2.kodekelas 
        GROUP BY `tabel1`.`koderuang`, tabel1.`kodekelas`
        ORDER BY `tabel1`.`koderuang`, tabel1.`kodekelas`")->result();
    }
    function requestKemkes($method="GET",$url="http://sirs.kemkes.go.id/fo/index.php/Fasyankes",$postData=array()){
        $id="1374013";
        $pass = "RSUD2020";
        $dt = new DateTime(null, new DateTimeZone("UTC"));
        $timestamp = $dt->getTimestamp();
        // $url = "http://sirs.kemkes.go.id/fo/index.php/Fasyankes";
        // $method = "PUT";
        // $postdata = array(
        //     'id_tt'=>1,
        //     "ruang"=>'Nama Ruang',
        //     "jumlah"=> "1",
        //     "terpakai"=>"0",
        //     "prepare"=>"0",
        //     "prepare_plan"=> "0",
        //     "covid"=>"0"
        // );
        $jsonData=json_encode($postData);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        if(!empty($postData)) curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("X-rs-id: ".$id,"X-Timestamp: ".$timestamp,"X-pass: ".$pass,"Content-type: application/json"));
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
    function getMapKemkes(){
        return $this->db->query("SELECT id_tt,ruang,jumlah_ruang,jumlah,IFNULL(terpakai,0) AS terpakai,0 AS antrian, 0 AS prepare, 0 AS prepare_plan,0 AS covid FROM
        (SELECT id_tt_kemkes AS id_tt,kelas_jkn,kelas_layanan,ruang_kemkes AS ruang,COUNT(id_ruang) AS jumlah_ruang,SUM(jml_tt) AS jumlah FROM `tbl01_kamar` 
        WHERE id_tt_kemkes IS NOT NULL AND status_publish=1 GROUP BY id_tt_kemkes) AS tabel1
        LEFT JOIN
        (SELECT b.id_tt_kemkes, COUNT(idx) AS terpakai FROM `tbl02_pendaftaran` a JOIN tbl01_kamar b ON a.id_kamar=b.id_kamar 
        WHERE id_tt_kemkes IS NOT NULL AND status_publish=1 AND a.reg_unit NOT IN (SELECT c.reg_unit FROM `tbl02_pendaftaran_batal` c)
        AND a.reg_unit NOT IN (SELECT d.reg_unit FROM `tbl02_pasien_pulang` d)
        AND a.reg_unit NOT IN (SELECT e.reg_unit FROM `tbl02_pindah_ranap`e WHERE e.`ruang_pengirim` <> e.`id_ruang` AND e.idx IN (SELECT f.`id_pindah_ranap` FROM `tbl02_pindah_ranap_response` f))
        GROUP BY id_tt_kemkes) AS tabel2 
        ON tabel1.id_tt=tabel2.id_tt_kemkes")->result();
    }
}