<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Patch_model extends CI_Model
{
    function getWilayah($start, $limit, $prov, $kab, $kec, $kel)
    {
        $this->db->order_by("FIELD(provinsi,'Riau','Jambi','Sumatera Barat') DESC, FIELD(nama_kabkota,'Padang Panjang')");
        $this->db->like('provinsi', $prov);
        $this->db->group_start();
        $this->db->like('kabkota', $kab);
        $this->db->or_like('nama_kabkota', $kab);
        $this->db->group_end();
        $this->db->like('kecamatan', $kec);
        $this->db->like('desa', $kel);
        $this->db->limit($limit, $start);
        return $this->db->get('tbl01_wilayah')->result();
    }
    function countWilayah($prov, $kab, $kec, $kel)
    {
        $this->db->like('provinsi', $prov);
        $this->db->group_start();
        $this->db->like('kabkota', $kab);
        $this->db->or_like('nama_kabkota', $kab);
        $this->db->group_end();
        $this->db->like('kecamatan', $kec);
        $this->db->like('desa', $kel);
        return $this->db->get('tbl01_wilayah')->num_rows();
    }

    
    public function get_nomr()
    {
        // $query = $this->db->query("SELECT MAX(CONCAT(SUBSTR(nomr,5,2),SUBSTR(nomr,3,2),SUBSTR(nomr,1,2))) as max_nomr FROM tbl01_pasien WHERE arc=0");
        $query = $this->db->query("SELECT MAX(nomr) as max_nomr FROM tbl01_pasien");
        $row = $query->row_array();
        $max_nomr = $row['max_nomr'];
        $kode_nomr = (int)$max_nomr + 1;
        $maxkode_nomr = sprintf("%06s",$kode_nomr);
        return $maxkode_nomr;
        
        // $max_nomr1 = (int) substr($max_nomr, 0, 6);
        // $kode_nomr = $max_nomr1 + 1;
        // $maxkode = sprintf("%06s", $kode_nomr);
        // $maxkode_nomr = substr($maxkode, 4, 2) . substr($maxkode, 2, 2) . substr($maxkode, 0, 2);
        // $cek = $this->cek_from_arc($maxkode_nomr);
        // if ($cek == true) {
        //     $this->db->query("UPDATE tbl01_pasien SET arc=0 WHERE nomr='$maxkode_nomr'");
        //     $nomr = $this->get_nomr();
        //     return $nomr;
        // } else {
        //     return $maxkode_nomr;
        // }

        //return $maxkode_nomr;
        //return $maxkode_nomr;
    }

    public function cek_from_arc($nomr)
    {
        $query = $this->db->query("SELECT nomr FROM tbl01_pasien WHERE arc=1 AND nomr='$nomr'")->row();
        if (empty($query)) {
            return false;
        } else {
            return true;
        }
    }

    function buat_nomr()
    {
        $nomr = $this->get_nomr();
        $cek = $this->cek_from_arc($nomr);
        //echo $cek ."<br>";
        if ($cek == true) {
            $this->db->query("UPDATE tbl01_pasien SET arc=0 WHERE nomr='$nomr'");
            $nomr = $this->buat_nomr();
            return $nomr;
        } else {
            return $nomr;
        }
    }
    function getdokter($idruang)
    {
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
        return $this->db->select("jadwal_dokter_id as NRP, jadwal_dokter_nama as pgwNama")
        ->where('jadwal_hari',$hari[$day])
        ->where('jadwal_poly_id',$idruang)
        ->get('tbl02_jadwal_dokter')->result();
    }

    function setdokter($iddokter)
    {
        $this->db->where('tbl01_pegawai.iddokter', $iddokter);
        return $this->db->get('tbl01_pegawai')->row();
    }
    function getpengirim($idrujuk)
    {
        $this->db->where('tbl01_pengirim.id_rujuk', $idrujuk);
        return $this->db->get('tbl01_pengirim')->result();
    }

    function pilihpengirim($idx)
    {
        $this->db->where('tbl01_pengirim.idx', $idx);
        return $this->db->get('tbl01_pengirim')->row();
    }
    function request_online($data, $url)
    {
        //$data = array("name" => "Hagrid", "age" => "36");                                                                    
        $data_string = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));
        $result = curl_exec($ch);
        return $result;
    }
    function get_field($field, $table, $key_field, $key_value)
    {
        $this->db->select($field);
        $this->db->from($table);
        $this->db->where($key_field, $key_value);
        $data = $this->db->get()->row();
        if (!empty($data)) return $data->$field;
        else return "";
    }
    function getIdwilayah($nama_provinsi, $nama_kab_kota, $nama_kecamatan, $nama_kelurahan)
    {
        $this->db->where('provinsi', $nama_provinsi);
        $this->db->where("CONCAT(kabkota,' ', nama_kabkota) = '$nama_kab_kota' ");
        $this->db->where("kecamatan", $nama_kecamatan);
        $this->db->where("desa", $nama_kelurahan);
        $data = $this->db->get('tbl01_wilayah')->row();
        if (!empty($data)) return $data->wilayah_id;
        else return "";
    }
    function get_cekdaftar($nomr, $tglreg, $tujuan)
    {
        return $this->db->select('id_daftar,grId,tgl_reg,nomr')
            ->from('tbl02_pendaftaran')
            ->where('nomr', $nomr)
            ->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d')", $tglreg)
            ->where('status_daftar', 0)
            ->where('id_ruang', $tujuan)->get();
    }

    function getAntrianpoly($id_ruang)
    {
        $this->db->select('no_antrian_poly');
        $this->db->where('id_ruang', $id_ruang);
        $this->db->where("DATE_FORMAT(tgl_masuk,'%Y-%m-%d')", date('Y-m-d'));
        $this->db->join('tbl02_antrian', 'tbl02_pendaftaran.id_daftar=tbl02_antrian.id_daftar', 'LEFT');
        $this->db->order_by('no_antrian_poly', 'DESC');
        $this->db->limit(1);
        $antrian_poly = $this->db->get('tbl02_pendaftaran')->row();
        if (!empty($antrian_poly)) {
            $antrian_lokal = $antrian_poly->no_antrian_poly;
        } else {
            $antrian_lokal = 0;
        }
        //Bandingkan antrian online dengan antrian lokal
        $antrian_baru = $antrian_lokal + 1;
        return $antrian_baru;
    }

    function getRujukanByid($idrujuk)
    {
        $this->db->where('idx', $idrujuk);
        return $this->db->get('tbl01_rujukan')->row();
    }
    function getPPKPengirim($idx)
    {
        $this->db->where('idx', $idx);
        return $this->db->get("tbl01_pengirim")->row();
    }
    function jmlData()
    {
        $this->db->group_by('id_ruang,idkelas_display');
        return $this->db->get('tbl01_kamar')->num_rows();
    }
    function getSetting()
    {
        return $this->db->get('tb_setting')->row();
    }
    function getCaraBayarByid($id){
        $this->db->where('idx',$id);
        return $this->db->get('tbl01_cara_bayar')->row();
    }

    function validasiPasien($nama,$tgllahir){
        return $this->db->where('nama',$nama)
        ->where('tgl_lahir',$tgllahir)
        ->get('tbl01_pasien')->row();
    }
    
}
