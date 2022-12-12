<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Json_model extends CI_Model
{
    function getMenu($modul, $level, $ruang = "")
    {
        //Parameter menu idmodul, level, ruang
        /**
         * 1. Administrator Tabel
         * 2. 
         */

        //$ruang = $this->session->userdata('kdlokasi');
        //echo $ruang;exit;
        if ($modul == 3 || $modul == 4) {
            $menu = $this->load_menu($modul, $ruang); //echo $menu; exit;
            //echo $menu;exit;
            $arr_menu = explode(',', $menu);
            $this->db->where_in('a.idmenu', $arr_menu);
        }
        $this->db->where('b.status', 1);
        $this->db->where('idmodul', $modul);
        $this->db->where('idlevel', $level);
        $this->db->select("a.`idmenu`,b.`judul_menu`,b.`kode`,SUBSTRING_INDEX(b.`kode`, '.', 1) AS index_menu,
            SUBSTRING_INDEX(b.`kode`, '.', -1) AS sub_index_menu ,b.`file_index`,b.`file_kontrol`,a.`hak_aksi`,b.icon");
        $this->db->join('tbl01_acc_menu b', 'a.idmenu=b.idx');
        $this->db->order_by("CONVERT(SUBSTRING_INDEX(b.`kode`, '.', 1),UNSIGNED INTEGER) , CONVERT(SUBSTRING_INDEX(b.`kode`, '.', -1),UNSIGNED INTEGER)");
        return $this->db->get('tbl01_acc_hakakses a')->result();
    }
    function load_menu($modul, $ruang)
    {
        /*$table_user_modul=array(
                '3'=>'tbl01_users_nota_tagihan',
                '4'=>'tbl01_users_farmasi'
            );
            $lokasi = array(
                '3'=>'tbl01_ruang',
                '4'=>'tbl04_lokasi'
            );
            $join=array(
                '3'=>'tbl01_ruang.idx=tbl01_users_nota_tagihan.ruang_akses',
                '4'=>'tbl04_lokasi.KDLOKASI = tbl01_users_farmasi.ruang_akses'
            );
            $this->db->select('menu');
            $this->db->where('NRP',$this->session->userdata('get_uid'));
            $this->db->where('ruang_akses',$ruang);
            $this->db->join($lokasi[$modul],$join[$modul]);
            $data = $this->db->get($table_user_modul[$modul])->row();
            if(!empty($data)) return $data->menu;
            else return "";*/
        if ($modul == 3) {
            //Jika User Login DI Modul Nota Tagihan
            $this->db->select('b.menu');
            $this->db->where('a.idx', $ruang);
            $this->db->join('tbl01_group_ruang b', 'a.grid = b.idx');
            $data = $this->db->get('tbl01_ruang a')->row();
        } else {
            $this->db->select('menu');
            $this->db->where('KDLOKASI', $ruang);
            $data = $this->db->get('tbl04_lokasi')->row();
        }
        if (!empty($data)) return $data->menu;
        else return "";
    }

    function getBed(){
        $this->db->select("a.id_kamar,a.nama_kamar,a.id_ruang,a.nama_ruang,a.kelas_id,a.kelas_layanan,a.jml_tt,IFNULL(b.terisi_lk,0) AS terisi_lk,IFNULL(b.terisi_pr,0) AS terisi_pr ");
        $this->db->join('view_bedterisi b','a.id_kamar=b.id_kamar','LEFT');
        return $this->db->get('tbl01_kamar a')->result();
    }

    function getbedaplicare(){
        return $this->db->query("SELECT tabel1.*,IFNULL(tabel2.jml_terisi,0) AS jml_terisi,IFNULL(tabel2.terisi_perempuan,0) AS terisi_perempuan,IFNULL(tabel2.terisi_lakilaki,0) AS terisi_lakilaki,
        (CASE WHEN (jekel=1 AND jml_terisi IS NOT NULL) THEN kapasitas - jml_terisi WHEN(jekel=1 AND jml_terisi IS NULL) THEN kapasitas ELSE 0 END) AS tersediapria,
        (CASE WHEN (jekel=0 AND jml_terisi IS NOT NULL) THEN kapasitas - jml_terisi WHEN (jekel=0 AND jml_terisi IS NULL) THEN kapasitas ELSE 0 END) AS tersediawanita,
        (CASE WHEN (jekel=2 AND jml_terisi IS NOT NULL) THEN kapasitas - jml_terisi WHEN(jekel=2 AND jml_terisi IS NULL) THEN kapasitas ELSE 0 END) AS tersediapriawanita
        FROM
        (SELECT `idkelas_jkn` AS kodekelas,`kelas_jkn`,`id_ruang` AS koderuang,`nama_ruang` AS namaruang,SUM(`jml_tt`) AS kapasitas,`jekel` FROM tbl01_kamar WHERE status_kamar=1 AND status_publish=1 GROUP BY id_ruang,idkelas_jkn) AS tabel1
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
               AND (NOT(`a`.`reg_unit` IN(SELECT `d`.`reg_unit` FROM `tbl02_pindah_ranap` `d` 
               WHERE (`d`.`idx` IN(SELECT `g`.`id_pindah_ranap` FROM `tbl02_pindah_ranap_response` `g`) 
               AND (`d`.`ruang_pengirim` <> `d`.`id_ruang`))))))
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
