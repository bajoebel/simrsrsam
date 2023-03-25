<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Antrian_model extends CI_Model
{
    function lastAntrian($kdlokasi=""){
        return $this->db->select("a.*,b.nomr,b.reg_unit,b.id_daftar,b.namaDokterJaga,b.tgl_masuk,b.no_ktp,b.nama_pasien,a.idx as idx_daftar")
            ->where("aktiftaskid <=",4)
            ->where("antrianruang",$kdlokasi)
            ->where("tanggal",date('Y-m-d'))
            ->join("tbl02_pendaftaran b","a.id_daftar=b.id_daftar")
            ->get("tbl02_antrian a")
            ->row();
    }
    function getDokter($kdlokasi){
        return $this->db->where("antrianruang",$kdlokasi)
            ->where("tanggal",date('Y-m-d'))
            ->join("tbl01_pegawai","antriandokter=NRP")
            ->group_by("antriandokter")
            ->get("tbl02_antrian")
            ->result();
    }
    function getJadwal($lokasi,$dokter,$hari){
        return $this->db->where("jadwal_dokter_id",$dokter)
        ->where("jadwal_poly_id",$lokasi)
        ->where("jadwal_hari",$hari)
        ->get("tbl02_jadwal_dokter")
        ->row();
    }
    function getLastAntrean($poly,$dokter,$jenisantrean=1,$curent=""){
        $this->db->select("a.*,b.idx AS idx_daftar,b.reg_unit,b.tgl_masuk,b.nomr,b.no_ktp,b.nama_pasien,aktiftaskid AS taskid,jnsantrean,labelantrean");
        $this->db->join('tbl02_pendaftaran b','a.id_daftar=b.id_daftar','LEFT');
        $this->db->where("tanggal",date('Y-m-d'));
        $this->db->where('antriandokter',$dokter);
        $this->db->where('antrianruang',$poly);
        $this->db->where('aktiftaskid <=',4);
        $this->db->where('jnsantrean',$jenisantrean);
        if(!empty($curent)) $this->db->where('no_antrian_poly',$curent);
        $this->db->order_by('no_antrian_poly');
        $this->db->limit(1);
        return $this->db->get('tbl02_antrian a')->row();
    }
    function getListAntrean($poly,$dokter,$jenisantrean=1){
        $this->db->select("a.*,b.idx AS idx_daftar,b.reg_unit,b.tgl_masuk,b.nomr,b.no_ktp,b.nama_pasien,aktiftaskid AS taskid,jnsantrean,labelantrean");
        $this->db->join('tbl02_pendaftaran b','a.id_daftar=b.id_daftar','LEFT');
        $this->db->where("tanggal",date('Y-m-d'));
        $this->db->where('antriandokter',$dokter);
        $this->db->where('antrianruang',$poly);
        $this->db->where('aktiftaskid <=',4);
        $this->db->where('jnsantrean',$jenisantrean);
        $this->db->order_by('no_antrian_poly');
        return $this->db->get('tbl02_antrian a')->result();
    }
    function getAntreanPanggil($poly,$jenisantrean=1){
        $this->db->select("a.*,b.idx AS idx_daftar,b.reg_unit,b.tgl_masuk,b.nomr,b.no_ktp,
        b.nama_pasien,b.jns_kelamin,aktiftaskid AS taskid,jnsantrean,labelantrean,dokterJaga,namaDokterJaga");
        $this->db->join('tbl02_pendaftaran b','a.id_daftar=b.id_daftar');
        $this->db->where("tanggal",date('Y-m-d'));
        $this->db->where('antrianruang',$poly);
        $this->db->where('status_panggil',1);
        $this->db->where('aktiftaskid <=',4);
        $this->db->where('jnsantrean',$jenisantrean);
        $this->db->order_by('no_antrian_poly');
        $this->db->limit(1);
        return $this->db->get('tbl02_antrian a')->row();
    }
    function getJadwalDokter($poly,$dokter){
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
        $this->db->select("a.jadwal_id,jadwal_dokter_id,jadwal_poly_id,jadwal_hari,
        jadwal_jam_mulai,jadwal_jam_selesai,jadwal_checkin,jadwal_pekan,group,kuotajkn,
        kuotanonjkn,jadwal_status,NRP,NIP,pgwNama,iddokter,dokterjkn,spm");
        $this->db->where('jadwal_poly_id',$poly);
        $this->db->group_start();
        $this->db->where('jadwal_dokter_id',$dokter);
        $this->db->or_where('jadwal_dokter_id1',$dokter);
        $this->db->group_end();
        $this->db->where('jadwal_hari',$hari[$day]);
        $this->db->join('tbl01_pegawai b','jadwal_dokter_id=NRP');
        $this->db->join('tbl01_ruang c','jadwal_poly_id=c.idx');
        return $this->db->get('tbl02_jadwal_dokter a')->row();
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
    function jkn_request($data, $url,$token="",$auth=array()){
        $data_string = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if(empty($token)){
            if(empty($auth)){
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data_string)
                ));
            }else{
                // return $auth; exit;
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data_string),
                    'X-Username: ' .$auth['username'],
                    'X-Password: ' .$auth['password']
                ));
            }
            
        }else{
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string),
                'x-token: ' .$token
            ));
        }
        
        $result = curl_exec($ch);
        return $result;
    }

}