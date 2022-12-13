<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Digisign_model extends CI_Model
{
    function is_exist_sign($uid){
        return $this->db->where('kode',$uid)->get('tbl01_esign')->row();
    }
    function verifyaccess($uid,$pin){
        return $this->db->where('kode',$uid)
        ->where("pin",md5($pin))
        ->get('tbl01_esign')->row();
    }

    function verifyData($idhasil){
        $signdata=$this->db->where('idhasil',$idhasil)->get('tbl03_hasil_pemeriksaan_signdata')->row();
        // $result=decombase64($signdata->compresseddata);
        if(empty($signdata)) $verifikator=""; else $verifikator=$signdata->verifikator;
        $p =$this->db->select('token')->where('kode',$verifikator)->get('tbl01_esign')->row();
        
        
        // print_r($arr_p); exit;
        if(!empty($p)){
            // $p->pin;
            $arr_p = json_decode($this->encryption->decrypt($p->token));
            $result=$this->getHasilPemeriksaan($idhasil);
            $arrdata=Sign::validateSign($signdata->hashsign, $arr_p->pin , SIGN_KEY);
            $curres =json_encode($result);
            $signres=json_encode($arrdata['dokumen']['result']);
            if($curres==$signres) return "valid"; else return "invalid";
            // return $arrdata['dokumen']['result'][0]['idx'];
            // print_r($arrdata);
            // return array('pin'=>$p,'compresseddata'=>$signdata->compresseddata,'result'=>$result);
        }else{
            return false;
        }
        
    }

    function getHasilPemeriksaan($idhasil){
        return $this->db->select("a.`idx`,`tanggal_periksa`,`id_daftar`,`reg_unit`,`nomr`,`nama_pasien`,`umur`,`idruangpengirim`,`ruangpengirim`,`diagnosa`,
        `idjenispemeriksaan`,`jenispemeriksaan`,`idsubjenispemeriksaan`,`subjenispemeriksaan`,`petugaspemeriksa`,`nama_petugas`,
        `datecreate`,`userinput`,`userupdate`,`idhasil`,`idpemeriksaan`,`namapemeriksaan`,`proyeksi`,`idsubpemeriksaan`,`subpemeriksaan`,
        `hasil`,`tingkatpositif`,`nanah_lendir`,`bercak_darah`,`air_liur`,`satuan`,`rujukan_lk`,`rujukan_pr`,`lampiran`,`validator`,validasipetugas,`petugaspemeriksa`,`nama_petugas`")
        ->where('a.idx',$idhasil)
        ->join('tbl03_hasil_pemeriksaan_penunjang_detail b','a.idx=b.idhasil')
        ->order_by('idpemeriksaan,idsubpemeriksaan')
        ->get('tbl03_hasil_pemeriksaan_penunjang a')->result();
    }
    function getJenisPemeriksaanById($idjenis){
        $this->db->where('idx', $idjenis);
        return $this->db->get('tbl01_jenis_pemeriksaan')->row();
    }
    function permintaanPemeriksaan($idjenis, $idx_pendaftaran = '', $reg_unit = '')
    {
        $this->db->where('id_jenis_pemeriksaan', $idjenis);
        if (!empty($idx_pendaftaran)) $this->db->where("idx_pendaftaran", $idx_pendaftaran);
        if (!empty($reg_unit)) $this->db->where("id_pemeriksaan NOT IN(SELECT idpemeriksaan FROM tbl03_hasil_pemeriksaan_penunjang a JOIN tbl03_hasil_pemeriksaan_penunjang_detail b ON a.idx=b.idhasil WHERE reg_unit='" . $reg_unit . "')");
        return $this->db->get('tbl02_pemeriksaan_penunjang')->result();
    }
    function getDetailHasilPemeriksaanPenunjang($idjenis,$reg_unit){
        $this->db->where('idjenispemeriksaan', $idjenis);
        $this->db->where('reg_unit', $reg_unit);
        $this->db->join('tbl03_hasil_pemeriksaan_penunjang_detail b','a.idx=b.idhasil');
        $this->db->order_by('idpemeriksaan,idsubpemeriksaan');
        return $this->db->get('tbl03_hasil_pemeriksaan_penunjang a')->result();
    }
    function getDetailJenisPemeriksaan($idx_pendaftaran,$idjenis)
    {
        $this->db->where('idx_pendaftaran', $idx_pendaftaran);
        $this->db->where("a.id_jenis_pemeriksaan",$idjenis);
        // $this->db->where("id_pemeriksaan NOT IN (SELECT idpemeriksaan FROM tbl03_hasil_pemeriksaan_penunjang WHERE )");
        $this->db->join('tbl01_jenis_pemeriksaan b','b.idx=a.id_jenis_pemeriksaan');
        $this->db->group_by('id_jenis_pemeriksaan');
        return $this->db->get("tbl02_pemeriksaan_penunjang a")->row();
    }
    function getPendaftaran($idx)
    {
        $this->db->where('idx', $idx);
        return $this->db->get('tbl02_pendaftaran')->row();
    }
    function getAkses($idlevel, $idmodul, $kodemenu)
    {
        $this->db->select('hak_aksi');
        $this->db->where('idlevel', $idlevel);
        $this->db->where('idmodul', $idmodul);
        $this->db->where('idmenu', $kodemenu);
        return $this->db->get('tbl01_acc_hakakses')->row()->hak_aksi;
    }
    function encryption($data,$kunci){
        $result = '';
		$panjangdata = strlen($data);
		$panjangkunci = strlen($kunci);
        echo "Data Yang Akan Di enkripsi ".$data;
        echo "<br>Kunci Public : ".$kunci;

		for($i = 0; $i < $panjangdata; $i++) {
            echo "<br><br><br>Step ".$i;
			$char = substr($data, $i, 1);
            echo "<br> Char Ambil Karakter ke ". $i ." dari data = ".$char;
			$keychar = substr($kunci, ($i % $panjangkunci) - 1, 1);
            echo "<br> Keychar Ambil Karakter ke ". $i ."% panjangkey  dari Key = ".$keychar;
			$char = chr((ord($char) + ord($keychar)) % 128);
            echo "<br> Ubah char ($char) menjadi Ascii : ".ord($char);
            echo "<br> Ubah keychar ($keychar) menjadi Ascii : ".ord($keychar);
            $hasiljml=ord($char) + ord($keychar);
            echo "<br>Jumlahkan $char + $keychar : ".$hasiljml;
            $mod=$hasiljml%128;
            echo "<br>hasil Penjumlahan Char Dan Keychar di moduluskan dengan 128 : ".$mod;
            
			$result .= $char;
            echo "<br>Gabungkan Variabel Result dengan nilai char baru " .$result;
		}
        echo "<br><br><br>hasil Encrypsi : " .$result;
		// return $result;
    }
}