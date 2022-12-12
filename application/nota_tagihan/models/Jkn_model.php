<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Jkn_model extends CI_Model{
    function getData($url,$header){
        // echo HOST_JKN.$url; exit;
        $curl = curl_init(HOST_JKN.$url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array($header));
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
    function postData($url, $header, $jsonData)
    {
        // $contentType = "application/x-www-form-urlencoded";
        // $consID = getConsID();
        // $tStamp = getTimestamp();
        // $encodedSignature = getSignature();

        // $result = "";
        // $result .= "Content-Type: " . $contentType . "\r\n";
        // $result .= "X-cons-id: " . $consID . "\r\n";
        // $result .= "X-timestamp: " . $tStamp . "\r\n";
        // $result .= "X-signature: " . $encodedSignature;

        $curl = curl_init(HOST_JKN.$url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array($header));
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
        $return = curl_exec($curl);
        // $json_response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);
        return $return;
    }
    function putData($url, $header, $jsonData)
    {
        // $contentType = "application/x-www-form-urlencoded";
        // $consID = getConsID();
        // $tStamp = getTimestamp();
        // $encodedSignature = getSignature();

        // $result = "";
        // $result .= "Content-Type: " . $contentType . "\r\n";
        // $result .= "X-cons-id: " . $consID . "\r\n";
        // $result .= "X-timestamp: " . $tStamp . "\r\n";
        // $result .= "X-signature: " . $encodedSignature;

        $curl = curl_init(HOST_JKN.$url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array($header));
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
        $return = curl_exec($curl);
        curl_close($curl);
        echo $return;
    }
    function deleteData($url, $header, $jsonData)
    {
        // $contentType = "application/x-www-form-urlencoded";
        // $consID = getConsID();
        // $tStamp = getTimestamp();
        // $encodedSignature = getSignature();

        // $result = "";
        // $result .= "Content-Type: " . $contentType . "\r\n";
        // $result .= "X-cons-id: " . $consID . "\r\n";
        // $result .= "X-timestamp: " . $tStamp . "\r\n";
        // $result .= "X-signature: " . $encodedSignature;

        $curl = curl_init(HOST_JKN.$url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array($header));
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
        $return = curl_exec($curl);
        curl_close($curl);
        echo $return;
    }
    function stringDecrypt($key, $string){
        // echo base64_decode($string); exit;
        $encrypt_method = 'AES-256-CBC';
        // hash
        $key_hash = hex2bin(hash('sha256', $key));
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);
        return $output;
    }
    function getRujukanOnline($noSep){
        $this->db->where('batal',0);
        $this->db->where('noSep',$noSep);
        return $this->db->get('tbl02_rujukanonline')->row();
    }
    function countRiwayatPengajuan(){
        return $this->db->get('tbl02_pengajuansep')->num_rows();
    }
    function jmlRiwayatPengajuan($start,$limit){
        $this->db->order_by('idx','desc');
        $this->db->limit($limit, $start);
        return $this->db->get('tbl02_pengajuansep')->result();
    }
    function getSuratKontrol($no){
        $this->db->where('noSuratKontrol',$no);
        return $this->db->get('tbl02_suratkontrol')->row();
    }
    function getSepLokal($nosep){
        $this->db->where('noSep',$nosep);
        return $this->db->get('tbl02_sep_response')->row();
    }
    function countDataJadwal($q=""){
        return $this->db->join('tbl01_pegawai b','jadwal_dokter_id=NRP')
            ->join('tbl01_ruang c','`jadwal_poly_id`= c.idx')
            ->like('jadwal_dokter_id',$q)
            ->or_like('dokterjkn',$q)
            ->or_like('pgwNama',$q)
            ->group_by('jadwal_dokter_id,jadwal_poly_id')
            ->order_by("jadwal_dokter_id, FIELD(jadwal_hari,'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu')")
            ->get('tbl02_jadwal_dokter a')->num_rows();
    }
    function getDataJadwal($limit=10, $mulai=0, $q=""){
        return $this->db->select("`jadwal_dokter_id` AS kodedokterrs,
        `dokterjkn` AS kodedokterjkn,jadwal_dokter_nama AS namadokter,jadwal_poly_id as kodepolirs,jadwal_subspesialis_jkn as kodepolijkn,jadwal_poly_nama as poliklinik,
        CONCAT('<ol>',GROUP_CONCAT(CONCAT('<li>',jadwal_poly_nama,' - ',jadwal_hari,' (',jadwal_jam_mulai,' - ',jadwal_jam_selesai,')</li>') SEPARATOR ' '),'</ol>') AS rincian_jadwal,
        GROUP_CONCAT(jadwal_hari) AS hari")
            ->like('jadwal_dokter_id',$q)
            ->or_like('dokterjkn',$q)
            ->or_like('jadwal_dokter_nama',$q)
            ->limit($limit, $mulai)
            ->group_by('jadwal_dokter_id, jadwal_poly_id')
            ->order_by("jadwal_dokter_id, FIELD(jadwal_hari,'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu')")
            ->get('tbl02_jadwal_dokter a')->result();
    }

    function getPoly(){
        return $this->db->where('grid',1)
        ->get('tbl01_ruang')->result();
    }
    // function getDokter($rid=""){
    //     return $this->db->where('dokter',1)
    //     ->where('b.idruang',$rid)
    //     ->join('tbl01_dokter b','a.NRP=b.NRP')
    //     ->get('tbl01_pegawai a')->result();
    // }
    function getJadwalDokter($poli,$dokter){
        return $this->db->select("*,(SELECT jadwal_jam_mulai FROM `tbl02_jadwal_dokter` WHERE jadwal_dokter_id=a.jadwal_dokter_id AND jadwal_poly_id=a.jadwal_poly_id AND jadwal_hari='Senin') AS jam_mulai_senin,
        (SELECT jadwal_jam_selesai FROM `tbl02_jadwal_dokter` WHERE jadwal_dokter_id=a.jadwal_dokter_id AND jadwal_poly_id=a.jadwal_poly_id AND jadwal_hari='Senin') AS jam_selesai_senin,
        (SELECT jadwal_jam_mulai FROM `tbl02_jadwal_dokter` WHERE jadwal_dokter_id=a.jadwal_dokter_id AND jadwal_poly_id=a.jadwal_poly_id AND jadwal_hari='Selasa') AS jam_mulai_selasa,
        (SELECT jadwal_jam_selesai FROM `tbl02_jadwal_dokter` WHERE jadwal_dokter_id=a.jadwal_dokter_id AND jadwal_poly_id=a.jadwal_poly_id AND jadwal_hari='Selasa') AS jam_selesai_selasa,
        (SELECT jadwal_jam_mulai FROM `tbl02_jadwal_dokter` WHERE jadwal_dokter_id=a.jadwal_dokter_id AND jadwal_poly_id=a.jadwal_poly_id AND jadwal_hari='Rabu') AS jam_mulai_rabu,
        (SELECT jadwal_jam_selesai FROM `tbl02_jadwal_dokter` WHERE jadwal_dokter_id=a.jadwal_dokter_id AND jadwal_poly_id=a.jadwal_poly_id AND jadwal_hari='Rabu') AS jam_selesai_rabu,
        (SELECT jadwal_jam_mulai FROM `tbl02_jadwal_dokter` WHERE jadwal_dokter_id=a.jadwal_dokter_id AND jadwal_poly_id=a.jadwal_poly_id AND jadwal_hari='Kamis') AS jam_mulai_kamis,
        (SELECT jadwal_jam_selesai FROM `tbl02_jadwal_dokter` WHERE jadwal_dokter_id=a.jadwal_dokter_id AND jadwal_poly_id=a.jadwal_poly_id AND jadwal_hari='Kamis') AS jam_selesai_kamis,
        (SELECT jadwal_jam_mulai FROM `tbl02_jadwal_dokter` WHERE jadwal_dokter_id=a.jadwal_dokter_id AND jadwal_poly_id=a.jadwal_poly_id AND jadwal_hari='Jumat') AS jam_mulai_jumat,
        (SELECT jadwal_jam_selesai FROM `tbl02_jadwal_dokter` WHERE jadwal_dokter_id=a.jadwal_dokter_id AND jadwal_poly_id=a.jadwal_poly_id AND jadwal_hari='Jumat') AS jam_selesai_jumat,
        (SELECT jadwal_jam_mulai FROM `tbl02_jadwal_dokter` WHERE jadwal_dokter_id=a.jadwal_dokter_id AND jadwal_poly_id=a.jadwal_poly_id AND jadwal_hari='Sabtu') AS jam_mulai_sabtu,
        (SELECT jadwal_jam_selesai FROM `tbl02_jadwal_dokter` WHERE jadwal_dokter_id=a.jadwal_dokter_id AND jadwal_poly_id=a.jadwal_poly_id AND jadwal_hari='Sabtu') AS jam_selesai_sabtu,
        (SELECT jadwal_jam_mulai FROM `tbl02_jadwal_dokter` WHERE jadwal_dokter_id=a.jadwal_dokter_id AND jadwal_poly_id=a.jadwal_poly_id AND jadwal_hari='Minggu') AS jam_mulai_minggu,
        (SELECT jadwal_jam_selesai FROM `tbl02_jadwal_dokter` WHERE jadwal_dokter_id=a.jadwal_dokter_id AND jadwal_poly_id=a.jadwal_poly_id AND jadwal_hari='Minggu') AS jam_selesai_minggu")
        ->where('jadwal_dokter_id',$dokter)
        ->where('jadwal_poly_id',$poli)
        ->group_by('jadwal_poly_id,jadwal_dokter_id')
        ->get('tbl02_jadwal_dokter a')->row();
    }
    function getDokterByNrp($nrp){
        return $this->db->where('nrp',$nrp)
            ->get('tbl01_pegawai')->row();
    }
    function cekjadwalpoli($kodedokter,$kodepoli,$hari){
        return $this->db->where('jadwal_dokter_id',$kodedokter)
            ->where('jadwal_poly_id',$kodepoli)
            ->where('jadwal_hari',$hari)
            ->get('tbl02_jadwal_dokter')->row();
    }   
    function getDokter($where){
        return $this->db->where_in('profId',$where)->get('tbl01_pegawai')->result();
    }
}