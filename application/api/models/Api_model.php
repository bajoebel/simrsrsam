<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Api_model extends CI_Model
{
    function cekPermition($username,$password){
        return $this->db->where('userstatus',1)
            ->where('username',$username)
            ->where('userpass',MD5($password))
            ->get('tbl01_users_api')->row();
    }
    function getPilihanDokter($kodejkn){
        $sekarang=date('Y-m-d');
        $tgl=longDate($sekarang);
        $hari=$tgl['hari'];
        $date = new DateTime($sekarang);
        $week = $date->format("W");
        if($week%2==0) $periode=2; else $periode=1;
        return $this->db->select("a.jadwal_id,a.jadwal_dokter_id,dokterjkn,b.pgwNama AS namadokter,a.jadwal_poly_id,kodejkn AS koderuangjkn,c.ruang, jadwal_hari,
        SUBSTRING_INDEX(jadwal_jam_mulai,':',2) AS jadwal_jam_mulai,SUBSTRING_INDEX(jadwal_jam_selesai,':',2) AS jadwal_jam_selesai,jadwal_pekan,foto,pgwJenkel as dokterjekel,jadwal_status")
            ->join("tbl01_pegawai b","a.jadwal_dokter_id=b.NRP")
            ->join("tbl01_ruang c","jadwal_poly_id=c.idx")
            ->where("c.kodejkn",$kodejkn)
            ->where('jadwal_hari',$hari)
            ->where_in('jadwal_pekan',array(0,$periode))
            ->where("jadwal_status","Aktif")
            ->get("`tbl02_jadwal_dokter` a")->result();
    }
    function getJadwalById($jadwalid){
        $jadwal =  $this->db->select("a.jadwal_id,a.jadwal_dokter_id,dokterjkn,b.pgwNama AS namadokter,a.jadwal_poly_id,kodejkn AS koderuangjkn,c.ruang, jadwal_hari,c.loketid,spm,KodeLoket,
        a.kuotajkn,a.kuotanonjkn,SUBSTRING_INDEX(jadwal_jam_mulai,':',2) AS jadwal_jam_mulai,SUBSTRING_INDEX(jadwal_jam_selesai,':',2) AS jadwal_jam_selesai,jadwal_pekan,foto,pgwJenkel as dokterjekel,jadwal_status")
            ->join("tbl01_pegawai b","a.jadwal_dokter_id=b.NRP")
            ->join("tbl01_ruang c","jadwal_poly_id=c.idx")
            ->join("tbl01_loket d","c.loketid=d.LoketID","LEFT")
            ->where('jadwal_id',$jadwalid)
            ->where("jadwal_status","Aktif")
            ->get("`tbl02_jadwal_dokter` a")->row();
        if(empty($jadwal)) return false;
        else{
            return $jadwal;
        }
    }
    function getKodeBooking($poliid){
        $sep="PB-".date('ymd')."-".STR_PAD($poliid,2,"0",STR_PAD_LEFT)."-";
        $last = $this->db->query("SELECT kodebooking FROM tbl02_antrian_admisi WHERE kodebooking LIKE '$sep%' ORDER BY kodebooking DESC LIMIT 1")->row();
        if(empty($last)) return $sep."0001";
        else{
            $expbooking=explode('-',$last->kodebooking);
            $intbooking=intval($expbooking[3])+1;
            return $sep.STR_PAD($intbooking,4,"0",STR_PAD_LEFT);
        }
    }
    function getAntreanAdmisi($kodeloket){
        $antrean=$this->db->where('labelantrean',$kodeloket)
        ->where('tanggal',date('Y-m-d'))
        ->order_by('no_antrian_admisi','DESC')
        ->get('tbl02_antrian_admisi')->row();
        if(empty($antrean)) return 1;
        else return intval($antrean->no_antrian_admisi) + 1;
    }
    function AntreanTerisi($koderuangjkn){
        $sekarang=date('Y-m-d');
        return $this->db->query("SELECT COUNT(idx) AS jmlantrean, SUM(jkn) AS terisijkn FROM `tbl02_antrian_admisi` WHERE tanggal='$sekarang'")->row();
    }
    function postData($url, $header, $jsonData)
    {
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
    function cekAntrian($nokartu,$koderuangjkn){
        return $this->db->where('nokartu',$nokartu)
        ->where('kodepolijkn',$koderuangjkn)
        ->where('tanggal',date('Y-m-d'))
        ->get('tbl02_antrian_admisi')->row();
    }
    function getPoliklinik(){
        $sekarang=date('Y-m-d');
        $tgl=longDate($sekarang);
        $hari=$tgl['hari'];
        $date = new DateTime($sekarang);
        $week = $date->format("W");
        if($week%2==0) $periode=2; else $periode=1;

        return $this->db->select("a.jadwal_id,`jadwal_dokter_id`,pgwNama AS namadokter,`ruang`,
        `jadwal_pekan`,`jadwal_status`,pgwJenkel AS jekeldokter,foto AS fotodokter,dokterjkn,
        `jadwal_hari`,b.idx AS ruang_id,`kodejkn`,`loketid`,`icon`,
        `jadwal_jam_mulai`,`jadwal_jam_selesai`,`jadwal_checkin`,`jadwal_pekan`,
        `kuotajkn`,`kuotanonjkn`,`status_ruang`,`spm`,COUNT(jadwal_dokter_id) AS jml")
        ->join("tbl01_ruang b","a.jadwal_poly_id=b.idx")
        ->join("tbl01_pegawai c","jadwal_dokter_id=NRP")
        ->where("jadwal_hari",$hari)
        ->where_in('jadwal_pekan',array(0,$periode))
        ->where("jadwal_status","Aktif")
        ->group_by("jadwal_poly_id")
        ->order_by("a.jadwal_id","DESC")
        ->get("`tbl02_jadwal_dokter` a")->result();
    }
    function getPasienByNomr($nomr){
        return $this->db->where('nomr',$nomr)->get('tbl01_pasien')->row();
    }
    function getPjByNomr($nomr){
        return $this->db->where('nomr',$nomr)
        ->order_by('nomr','DESC')
        ->get('tbl01_penanggung_jawab')->row();
    }
}