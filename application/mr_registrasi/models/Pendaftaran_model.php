<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pendaftaran_model extends CI_Model
{

    function getPPKPengirim($idx)
    {
        $this->db->where('idx', $idx);
        return $this->db->get("tbl01_pengirim")->row();
    }
    public function getIdDaftar() {
        if(date("Y") == '2017'){
            $query = $this->db->query("SELECT MAX(id_daftar) as max_daftar FROM tbl02_pendaftaran"); 
            $row = $query->row_array();
            $max_daftar = $row['max_daftar']; 
            $max_daftar1 =(int) substr($max_daftar,5,5);
            $iddaftar = $max_daftar1 +1;
            $max_iddaftar = sprintf("%05s",$iddaftar);
            $tahun = date("Y");
            $no_daftar = $tahun."-".$max_iddaftar;
        }else{
            $query = $this->db->query("SELECT MAX(id_daftar) as max_daftar FROM tbl02_pendaftaran"); 
            $row = $query->row_array();
            $num = $query->num_rows();
            $thn = date("Y");
            $kode= substr($row['max_daftar'],0,5);
            if($num == 0 || $kode == $thn."-"){
                $no_daftar = $thn."000001";
            }else{
                $thn_sistem = substr($row['max_daftar'],0,4);
                if($thn > $thn_sistem){
                    $nobaru = "1";
                }else{
                    $nobaru = substr($row['max_daftar'],4,6)+1;
                }
                $max_iddaftar = sprintf("%06d",$nobaru);
                $no_daftar = $thn.$max_iddaftar;
            }
        }
        
        return $no_daftar;
    }

    public function get_daftarranap() {
        if(date("Y") == '2017'){
            $query = $this->db->query("SELECT MAX(id_admisi) as max_daftar FROM tbl02_pendaftaran"); 
            $row = $query->row_array();
            $max_daftar = $row['max_daftar']; 
            $max_daftar1 =(int) substr($max_daftar,3,5);
            $iddaftar = $max_daftar1 +1;
            $max_iddaftar = sprintf("%05s",$iddaftar);
            $code = "RI";
            $no_daftar = $code."-".$max_iddaftar;
        }else{
            $query = $this->db->query("SELECT MAX(id_admisi) as max_daftar FROM tbl02_pendaftaran"); 
            $row = $query->row_array();
            $num = $query->num_rows();
            $thn = date("y");
            $kode= substr($row['max_daftar'],0,3);
            if($num == 0 || $kode == "RI-"){
                $no_daftar = "RI".$thn."00001";
            }else{
                $thn_sistem = substr($row['max_daftar'],2,2);
                if($thn > $thn_sistem){
                    $nobaru = "1";
                }else{
                    $nobaru = substr($row['max_daftar'],4,5)+1;
                }
                $max_iddaftar = sprintf("%05d",$nobaru);
                $no_daftar = "RI".$thn.$max_iddaftar;
            }
        }
        
        return $no_daftar;
    }

    function cariSEP($param1)
    {
        /*
            Method   : GET
            Format   : JSON
            Content-Type: Application/x-www-form-urlencoded
            */
        $url = HOST_VC . "SEP/$param1";
        return $this->initCURL($url);
    }
    function cariRujukan($param1, $faskes = 1)
    {
        if ($faskes == 1) $url = HOST_VC . "Rujukan/$param1";
        else $url = HOST_VC . "Rujukan/RS/$param1";
        return $this->initCURL($url);
    }
    function cariSEPLokal($nosep,$tgl)
    {
        $this->db->order_by('idx','desc');
        $this->db->where('tglSep',$tgl);
        $this->db->where('noSep', $nosep);
        return $this->db->get('tbl02_sep_response')->row();
    }

    function initCURL($url)
    {
        //$CI =& get_instance();
        $result = $this->getResult();
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array($result));
        $json_response = curl_exec($curl);
        curl_close($curl);
        return $json_response;
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

    function getRuang($kondisi){
        $this->db->where($kondisi);
        $this->db->order_by('ruang');
        return $this->db->get('tbl01_ruang');
    }
    function getTenagaMedis($kondisi=array()){
        if(!empty($kondisi)) $this->db->where($kondisi);
        $this->db->select("tbl01_dokter.NRP,tbl01_pegawai.pgwNama");
        $this->db->join('tbl01_pegawai', 'tbl01_dokter.NRP=tbl01_pegawai.NRP');
        return $this->db->get('tbl01_dokter');
    }
    function getJenis($kondisi=array()){
        if (!empty($kondisi)) $this->db->where($kondisi);
        return $this->db->get('tbl01_jenisruang');
    }
    function getKelas($kondisi=array()){
        if (!empty($kondisi)) $this->db->where($kondisi);
        return $this->db->get('tbl01_kelas_layanan');
    }
    function getCaraBayar($kondisi=array()){
        if (!empty($kondisi)) $this->db->where($kondisi);
        return $this->db->get('tbl01_cara_bayar');
    }
    function getSuku($q=""){
        $this->db->like('nama_suku',$q);
        return $this->db->get('tbl01_suku')->result();
    }
    function getKunjungan($keyword){
        $this->db->where('jns_layanan','RI');
        $this->db->where('tgl_masuk >',_TGL_LOUNCHING);
        $this->db->where('reg_unit NOT IN (SELECT reg_unit FROM tbl02_pindah_ranap WHERE ruang_pengirim != id_ruang)');
        $this->db->where('reg_unit NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)');
        $this->db->where('reg_unit NOT IN (SELECT reg_unit FROM tbl02_pasien_pulang)');
        $this->db->group_start();
        $this->db->like('nomr',$keyword);
        $this->db->or_like('reg_unit', $keyword);
        $this->db->or_like('id_daftar', $keyword);
        $this->db->or_like('nama_pasien', $keyword);
        $this->db->or_like('nama_ruang', $keyword);
        $this->db->or_like('nama_kamar', $keyword);
        $this->db->group_end();
        return $this->db->get('tbl02_pendaftaran')->result();
    }
    function getKunjunganByUnit($reg_unit){
        $this->db->where('reg_unit',$reg_unit);
        $this->db->join('tbl01_pasien b','a.nomr=b.nomr');
        return $this->db->get('tbl02_pendaftaran a')->row();
    }
    function insertPendaftaran($data){
        $this->db->insert('tbl02_pendaftaran',$data);
        $insert_id=$this->db->insert_id();
        if($insert_id){
            $this->db->where('idx',$insert_id);
            return $this->db->get('tbl02_pendaftaran')->row();
        }else{
            return array();
        }
    }
    function updatePendaftaran($data,$reg_unit){
        $this->db->where('reg_unit',$reg_unit);
        $this->db->update('tbl02_pendaftaran',$data);
    }
    function cek_koneksi(){
        $this->online = $this->load->database('online', true);
        return $this->db->get('rekap_kunjungan_v2')->result();
    }
    function hitStatistik($data){
        
        /**
         * 'tgl_kunjungan'
            'ruangid'
            'nama_ruang'
            'id_cara_bayar'
            'cara_bayar'
            'provinsi'
            'kabupaten'
            'kecamatan'
            'kelurahan'
            'jumlah_kunjungan'
            'pasien_baru'
            'pasien_lama'
            'dalam_kota'
            'luar_kota'
            'laki_laki'
            'perempuan'
         */
        $kondisi=array(
            'ruangid'=> $data['ruangid'],
            'id_cara_bayar'=> $data['id_cara_bayar'],
            'provinsi'=> $data['provinsi'],
            'kabupaten'=> $data['kabupaten'],
            'kecamatan'=> $data['kecamatan'],
            'kelurahan'=> $data['kelurahan'],
            'tgl_kunjungan'=> $data['tgl_kunjungan']
        );
        //$this->online = $this->load->database('online', true);
        $this->db->where($kondisi);
        $cek=$this->db->get('rekap_kunjungan_v2');
        if($cek->num_rows()>0){
            //Update 
            $d=$cek->row();
            $jumlah_kunjungan=intval($d->jumlah_kunjungan)+intval($data['jumlah_kunjungan']);
            $pasien_baru = intval($d->pasien_baru)+intval($data['pasien_baru']);
            $pasien_lama = intval($d->pasien_lama)+intval($data['pasien_lama']);
            $dalam_kota = intval($d->dalam_kota)+intval($data['dalam_kota']);
            $luar_kota = intval($d->luar_kota)+intval($data['luar_kota']);
            $laki_laki = intval($d->laki_laki)+intval($data['laki_laki']);
            $perempuan = intval($d->perempuan)+intval($data['perempuan']);
            $update=array(
                'jumlah_kunjungan'=>$jumlah_kunjungan,
                'pasien_baru'=>$pasien_baru,
                'pasien_lama'=>$pasien_lama,
                'dalam_kota'=>$dalam_kota,
                'luar_kota'=>$luar_kota,
                'laki_laki'=>$laki_laki,
                'perempuan'=>$perempuan
            );
            $this->db->where($kondisi);
            $this->db->update('rekap_kunjungan_v2',$update);
        }else{
            $this->db->insert('rekap_kunjungan_v2',$data);
        }
        // //Hitstatistik online
        // $client_id = ONLINE_ID;
        // $key = ONLINE_KEY;
        // $param = array(
        //     'client_id' => $client_id,
        //     'client_secret_key' => $key,
        //     'data'=>$data
        // );
        // $respone = $this->request_online($param, ONLINE_CALL_BACK . "hitstatistik");
        // return $respone;
    }
    // function request_online($data, $url)
    // {
    //     //$data = array("name" => "Hagrid", "age" => "36");                                                                    
    //     $data_string = json_encode($data);
    //     $ch = curl_init($url);
    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //         'Content-Type: application/json',
    //         'Content-Length: ' . strlen($data_string)
    //     ));
    //     $result = curl_exec($ch);
    //     return $result;
    // }

    function updateBed($id_kamar){
        $this->db->where('id_kamar',$id_kamar);
        $row=$this->db->get('view_bedterisi')->row();
        if($row){
            $data=array(
                'terisi_lk'=>$row->terisi_lk,
                'terisi_pr' => $row->terisi_pr,
                'rawatgabung_lk' => $row->rg_lakilaki,
                'rawatgabung_pr' => $row->rg_perempuan
            );
            // $client_id = ONLINE_ID;
            // $key = ONLINE_KEY;
            // $param = array(
            //     'client_id' => $client_id,
            //     'client_secret_key' => $key,
            //     'id_kamar'=>$id_kamar,
            //     'data' => $data
            // );
            // $respone = $this->request_online($param, ONLINE_CALL_BACK . "updatebed");
            // return $respone;
        }
    }

    function createAntrian($group,$ruangid,$nrpdokter){
        $sekarang=date('Y-m-d');
        $row = $this->db->query("SELECT * FROM (SELECT `label`,`name`,`jam`,`tersedia` FROM `tb02_config_batch` WHERE `groupid`=$group) AS batch
        LEFT JOIN (SELECT `label_antrian`, `ruangid`,`ruang`, `nrpdokter`,pgwNama AS namaDokter,`nomor_antrian`,COUNT(nomor_antrian) AS jml_terisi,MAX(nomor_antrian) AS antrian_tertinggi 
        FROM `tbl02_antrianv2` a JOIN `tbl01_ruang` b ON a.`ruangid`=b.`idx` JOIN `tbl01_pegawai` c ON a.`nrpdokter`=c.NRP WHERE ruangid=$ruangid AND nrpdokter='$nrpdokter' AND tgl_kunjungan='$sekarang'
        GROUP BY label_antrian) AS antrian ON batch.label=antrian.label_antrian WHERE jml_terisi < tersedia OR jml_terisi IS NULL ORDER BY label LIMIT 1")->row();
        if(empty($row)){
            $data=array();
        }else{
            //1 batch dietapkan 1 jam, 
            $nomor_antrian= $row->antrian_tertinggi+1;
            $lama_pelayanan=60/$row->tersedia; // lama pelayanan didapatkan dari 60 menit dibagi dengan jml kuota dalam 1 jam
            $durasi = $lama_pelayanan * $nomor_antrian;
            $start = strtotime($row->label_antrian);
            $estimasi = date("H:i:s", strtotime('+'.$durasi.' minutes', $start));
            $data=array(
                'jam_kunjunganLabel'=>$row->name,
                'jam_kunjunganAntrian'=>$estimasi, // Estimasi Pelayanan
                'label_antrian'=>$row->label, // Jam mulai antrian pada batch antrian
                'nomor_antrian'=>$nomor_antrian
            );
        }
        return $data;
    }

    function getJadwal($poly,$dokter){
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
        $this->db->where('jadwal_poly_id',$poly);
        $this->db->where('jadwal_dokter_id',$dokter);
        $this->db->where('jadwal_hari',$hari[$day]);
        return $this->db->get('tbl02_jadwal_dokter')->row();
    }
    function countAtm($sekarang,$poly,$q){
        $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d')", $sekarang);
        if(!empty($poly)) $this->db->where("id_ruang",$poly);
        $this->db->group_start();
        $this->db->like('nomr',$q);
        $this->db->or_like('no_ktp',$q);
        $this->db->or_like('nama_pasien',$q);
        $this->db->or_like('tempat_lahir',$q);
        $this->db->or_like('tgl_lahir',$q);
        $this->db->or_like('nama_ruang',$q);
        $this->db->or_like('namaDokterJaga',$q);
        $this->db->group_end();
        $this->db->join('tbl02_antrianv2 b','a.idx=b.id_pendaftaranonline','LEFT');
        return $this->db->get('tbl02_pendaftaran_atm a')->num_rows();
    }
    function getAtm($sekarang,$poly,$q,$start,$limit){
        $this->db->select("a.*,b.*,a.idx, c.idx as terdaftar");
        $this->db->where("DATE_FORMAT(a.tgl_masuk,'%Y-%m-%d')", $sekarang);
        if(!empty($poly)) $this->db->where("a.id_ruang",$poly);
        $this->db->group_start();
        $this->db->like('a.nomr',$q);
        $this->db->or_like('a.no_ktp',$q);
        $this->db->or_like('a.nama_pasien',$q);
        $this->db->or_like('a.tempat_lahir',$q);
        $this->db->or_like('a.tgl_lahir',$q);
        $this->db->or_like('a.nama_ruang',$q);
        $this->db->or_like('a.namaDokterJaga',$q);
        $this->db->group_end();
        $this->db->join('tbl02_antrianv2 b','a.idx=b.id_pendaftaranonline','LEFT');
        $this->db->join('tbl02_pendaftaran c','a.idx=c.id_pendaftaranonline','LEFT');
        $this->db->limit($limit, $start);
        return $this->db->get('tbl02_pendaftaran_atm a')->result();
    }
    function getPendaftaranAtm($id){
        $this->db->where('idx',$id);
        return $this->db->get('tbl02_pendaftaran_atm')->row();
    }
    function getRujukanOnline($noSep){

        $this->db->where('noSep',$noSep);
        return $this->db->get('tbl02_rujukanonline')->row();
    }
    function getRiwayat($nomr){
        return $this->db->select("id_daftar,tgl_masuk,no_bpjs,nama_pasien,
        'RSAM Bukittinggi' AS ppkperujuk ,nama_ruang,no_rujuk,no_jaminan")
        ->where('nomr',$nomr)
        ->order_by('idx',"desc")
        ->limit(10)
        ->get('tbl02_pendaftaran')->result();
    }
    function getRegUnit($tglmasuk,$idruang,$jns_layanan){
        $ruang=STR_PAD($idruang,3,"0",STR_PAD_LEFT);
        $sep=$this->db->query("SELECT CONCAT('$jns_layanan','-',DATE_FORMAT('$tglmasuk','%y%m%d'),'-','$ruang','-') AS sep")->row();
        $separator=$sep->sep;

        $reg=$this->db->select("reg_unit,no_urut_unit")
        ->like('reg_unit',$separator)
        ->order_by('no_urut_unit','DESC')
        ->limit(1)
        ->get('tbl02_pendaftaran')
        ->row();
        if(empty($reg)) {
            return array(
                "reg_unit"=>$separator."0001",
                "no_urut"=>"0001"
            );
        }else{
            $nourut=intval($reg->no_urut_unit)+1;
            return array(
                "reg_unit"=>$separator .STR_PAD($nourut,4,"0",STR_PAD_LEFT),
                "no_urut"=>STR_PAD($nourut,4,"0",STR_PAD_LEFT)
            );

        }
    }
    function simpanGeneralConsent($data){
        $this->erm = $this->load->database('erm', true);
        $this->erm->insert('rj_setuju_umum',$data);
        return $this->erm->insert_id();
    }
    function updateGeneralConsent($data,$id){
        $this->erm = $this->load->database('erm', true);
        $this->db->where('id',$id);
        $this->erm->update('rj_setuju_umum',$data);
        return $this->erm->insert_id();
    }
    function getPasienAnjungan($poly="",$tgl,$filter,$q,$start,$limit){
        if(!empty($poly)) $this->db->where("id_ruang",$poly);
        $this->db->select("idx,nomr,id_daftar,reg_unit,no_ktp,nama_pasien,nama_ruang,tgl_masuk,tgl_daftar,rujukan,namaDokterJaga,cara_bayar,no_bpjs");
        if($filter=="baru") $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = tgl_daftar");
        else $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d') != tgl_daftar");
        $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d')",$tgl);
        $this->db->where("user_daftar",'Anjungan Mandiri');
        $this->db->group_start();
        $this->db->like('nomr',$q);
        $this->db->or_like('no_ktp',$q);
        $this->db->or_like('no_bpjs',$q);
        $this->db->or_like('nama_pasien',$q);
        $this->db->or_like('tempat_lahir',$q);
        $this->db->or_like('namaDokterJaga',$q);
        $this->db->group_end();
        $this->db->limit($limit,$start);
        return $this->db->get('tbl02_pendaftaran')->result();
    }
    function countPasienAnjungan($poly="",$tgl,$filter,$q){
        $this->db->select("COUNT(idx) AS jml");
        if(!empty($poly)) $this->db->where("id_ruang",$poly);
        if($filter=="baru") $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d') = tgl_daftar");
        else $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d') != tgl_daftar");
        $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d')",$tgl);
        $this->db->where("user_daftar",'Anjungan Mandiri');
        $this->db->group_start();
        $this->db->like('nomr',$q);
        $this->db->or_like('no_ktp',$q);
        $this->db->or_like('no_bpjs',$q);
        $this->db->or_like('nama_pasien',$q);
        $this->db->or_like('tempat_lahir',$q);
        $this->db->or_like('namaDokterJaga',$q);
        $this->db->group_end();
        $res= $this->db->get('tbl02_pendaftaran')->row();
        return $res->jml;
    }
    // function getJadwal(){

    // }
}
