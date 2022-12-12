<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Nota_model extends CI_Model
{
    function getTindakanlimit($idruang, $limit, $start = 0, $q = NULL, $pilihan = 0, $id_daftar = "", $reg_unit = "")
    {
        if ($pilihan == 0) {
            $r = $this->db->query("SELECT id_pemeriksaan FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='$id_daftar' AND reg_unit='$reg_unit'")->result();
            foreach ($r as $res) {
                $idx[] = $res->id_pemeriksaan;
            }
            //if(empty($idx)) $idx=array();
            $this->db->join('tbl01_tarif_layanan', 'idtarif=idx');
            $this->db->where('idruang', $idruang);
            if (!empty($idx)) $this->db->where_not_in('idx', $idx);
            $this->db->group_start();
            $this->db->like('layanan', $q);
            $this->db->group_end();
            $this->db->limit($limit, $start);
            return $this->db->get('tbl01_tarif_ruang')->result();
        } else {
            $this->db->join('tbl01_tarif_layanan', 'id_tarif=idx');
            $this->db->where('id_daftar', $id_daftar);
            $this->db->where('reg_unit', $reg_unit);
            $this->db->group_start();
            $this->db->like('tbl01_tarif_layanan.layanan', $q);
            $this->db->group_end();
            //$this->db->limit($limit, $start);
            return $this->db->get('tbl02_temp_permintaan_tindakan_penunjang')->result();
        }
    }
    function countTindakan($idruang, $q = NULL, $pilihan = 0, $id_daftar = "", $reg_unit = "")
    {
        if ($pilihan == 0) {
            $r = $this->db->query("SELECT id_tarif FROM tbl02_temp_permintaan_tindakan_penunjang WHERE id_daftar='$id_daftar' AND reg_unit='$reg_unit'")->result();
            foreach ($r as $res) {
                $idx[] = $res->id_tarif;
            }
            //if(empty($idx)) $idx=array();
            $this->db->join('tbl01_tarif_layanan', 'idtarif=idx');
            $this->db->where('idruang', $idruang);
            if (!empty($idx)) $this->db->where_not_in('idx', $idx);
            $this->db->group_start();
            $this->db->like('tbl01_tarif_layanan.layanan', $q);
            $this->db->group_end();
            return $this->db->get('tbl01_tarif_ruang')->num_rows();
        } else {
            $this->db->join('tbl01_tarif_layanan', 'id_tarif=idx');
            $this->db->where('id_daftar', $id_daftar);
            $this->db->where('reg_unit', $reg_unit);
            $this->db->group_start();
            $this->db->like('tbl01_tarif_layanan.layanan', $q);
            $this->db->group_end();
            return $this->db->get('tbl02_temp_permintaan_tindakan_penunjang')->num_rows();
        }
    }

    function getTarif($limit = 0, $start = 0, $q, $jns_layanan, $id_ruang, $kelas_id, $all = 0)
    {
        if (!empty($jns_layanan)) {
            if ($jns_layanan == "PJ") $this->db->where_in('jns_layanan', array('PJ', 'RJ', 'RI'));
            else $this->db->where('jns_layanan', $jns_layanan);
        }

        if ($all == 0) {
            $this->db->group_start();
            if ($jns_layanan != "PJ")  $this->db->where('idruang', '0');
            if (!empty($id_ruang)) $this->db->or_where('idruang', $id_ruang);
            $this->db->group_end();
        }
        $this->db->group_start();
        $this->db->where('kelas_id', '0');
        if (!empty($kelas_id)) $this->db->or_where('kelas_id', $kelas_id);
        $this->db->group_end();
        $this->db->group_start();
        $this->db->like('layanan', $q);
        $this->db->or_like('kategori_tarif', $q);
        $this->db->group_end();
        $this->db->join('tbl01_tarif_layanan', 'tbl01_tarif_layanan.idx=tbl01_tarif_ruang.idtarif');
        $this->db->order_by("FIELD(kelas_id,'1','2','3','4','5') DESC");
        if ($limit > 0) $this->db->limit($limit, $start);
        return $this->db->get('tbl01_tarif_ruang');
    }

    function cekRuang($grid = 0)
    {
        $NRP = $this->session->userdata('get_uid');
        if (!empty($grid)) $sq = " AND grid='$grid' ";
        else $sq = "";
        $SQL = "SELECT * FROM tbl01_ruang 
            WHERE idx IN (SELECT ruang_akses FROM tbl01_users_nota_tagihan 
            WHERE NRP = '$NRP') $sq ORDER BY ruang";
        return $this->db->query("$SQL")->num_rows();
    }

    function getDokter($ruangid = "")
    {
        if (!empty($ruangid)) $this->db->where('idruang', $ruangid);
        $this->db->join('tbl01_pegawai', 'tbl01_pegawai.NRP=tbl01_dokter.NRP');
        return $this->db->get('tbl01_dokter');
    }
    function getPendaftaran($idx)
    {
        $this->db->where('idx', $idx);
        return $this->db->get('tbl02_pendaftaran')->row();
    }

    function getPendaftaranByRegunit($reg_unit)
    {
        $this->db->where('reg_unit', $reg_unit);
        return $this->db->get('tbl02_pendaftaran')->row();
    }
    function getDatapendaftaran($kondisi,$as='row')
    {
        $this->db->where($kondisi);
        $this->db->where("reg_unit NOT IN (SELECT reg_unit FROM tbl02_pindah_ranap WHERE ruang_pengirim !=id_ruang AND reg_unit NOT IN (SELECT reg_unit FROM tbl02_pindah_ranap_batal))");
        if($as=='row') return $this->db->get('tbl02_pendaftaran')->row();
        else return $this->db->get('tbl02_pendaftaran')->result();
    }
    function getPermintaanPindah($kondisi){
        $this->db->where($kondisi);
        $this->db->where("reg_unit NOT IN (SELECT reg_unit FROM tbl02_pindah_ranap_batal WHERE reg_unit NOT IN (SELECT reg_unit FROM tbl02_pindah_ranap_response))");
        return $this->db->get('tbl02_pindah_ranap')->result();
    }
    
    function getDiagnosa($idx)
    {
        $this->db->where('idx_pendaftaran', $idx);
        return $this->db->get('tbl03_diagnosa')->row();
    }
    //Action Diagnosa
    function setDiagnosa($data)
    {
        if (!empty($data["idx"])) {
            //Update Diagnosa
            $this->db->where('idx', $data["idx"]);
            $this->db->update('tbl03_diagnosa', $data);
            $id = $data["idx"];
        } else {
            //Insert Diagnosa
            $this->db->insert('tbl03_diagnosa', $data);
            $id = $this->db->insert_id();
        }
        return $id;
    }

    function getTgldaftar($nomr)
    {
        $this->db->select("DATE_FORMAT(tgl_daftar,'%Y-%m-%d') AS tgl_daftar");
        $this->db->where('nomr', $nomr);
        $res = $this->db->get('tbl01_pasien')->row();
        if (!empty($res)) return $res->tgl_daftar;
        else false;
    }
    function getPulang($id_daftar)
    {
        $this->db->where('a.id_daftar', $id_daftar);
        $this->db->where('a.jns_layanan','RI');
        $this->db->join('tbl02_pasien_pulang b','a.id_daftar=b.id_daftar AND a.jns_layanan=b.jns_layanan');
        return $this->db->get('tbl02_pendaftaran a')->row();
    }
    function cekStatusBatal($reg_unit){
        $data = $this->db->query("SELECT COUNT(*) as batal FROM tbl02_pendaftaran_batal WHERE reg_unit='$reg_unit'")->row();
        if($data){
            return $data->batal;
        }else{
            return false;
        }
    }
    function cekStatusPulang($reg_unit){
        $data = $this->db->query("SELECT COUNT(*) as pulang FROM tbl02_pasien_pulang WHERE reg_unit='$reg_unit'")->row();
        if ($data) {
            return $data->pulang;
        } else {
            return false;
        }
    }
    function cekStatusPindah($reg_unit)
    {
        $data = $this->db->query("SELECT COUNT(*) as pindah FROM tbl02_pindah_ranap WHERE reg_unit='$reg_unit' AND ruang_pengirim != id_ruang")->row();
        if ($data) {
            return $data->pindah;
        } else {
            return false;
        }
    }
    function cekRanap($id_daftar, $jns_layanan){
        $this->db->where('id_daftar', $id_daftar);
        $this->db->where('jns_layanan', $jns_layanan);
        return $this->db->get('tbl02_pendaftaran')->row();
    }
    function getPindah($reg_unit, $pengirim)
    {
        $this->db->select("a.*,b.idx as idx_response");
        $this->db->where('a.reg_unit', $reg_unit);
        $this->db->where('a.ruang_pengirim', $pengirim);
        $this->db->where("a.reg_unit NOT IN (SELECT c.reg_unit FROM tbl02_pindah_ranap_batal c)");
        $this->db->join('tbl02_pindah_ranap_response b','a.idx = b.id_pindah_ranap','LEFT');
        $this->db->order_by('idx', 'DESC');
        $this->db->limit(1);
        return $this->db->get('tbl02_pindah_ranap a')->row();
    }
    function getSuratRekomendasiPindah($idx){
        $this->db->select('b.*,a.nomr,a.no_ktp,a.no_bpjs,a.tempat_lahir,a.tgl_lahir,a.jns_kelamin');
        $this->db->where('b.idx', $idx);
        $this->db->join('tbl02_pindah_ranap b','a.reg_unit=b.reg_unit');
        return $this->db->get('tbl02_pendaftaran a')->row();
    }
    function getPolyAsal($id_daftar)
    {
        $this->db->select('id_ruang, nama_ruang');
        $this->db->where('id_daftar', $id_daftar);
        $this->db->group_start();
        $this->db->where('jns_layanan', 'RJ');
        $this->db->or_where('jns_layanan', 'GD');
        $this->db->group_end();
        $this->db->group_by('id_ruang');
        return $this->db->get('tbl02_pendaftaran')->result();
    }

    function getRuang($id)
    {
        $this->db->where('idx', $id);
        return $this->db->get('tbl01_ruang')->row();
    }
    function getNotif($jenis = "", $klok)
    {
        if ($jenis == "internal") {
            $row = $this->db->query("SELECT * FROM tbl02_rujuk_internal WHERE id_poli='$klok' AND idx NOT IN (SELECT id_rujuk_internal FROM tbl02_rujuk_internal_response);")->num_rows();
        } elseif ($jenis == "kamar") {
            $row = $this->db->query("SELECT * FROM tbl02_pindah_ranap a LEFT JOIN tbl02_pindah_ranap_batal b ON a.idx = b.id_pindah_ranap WHERE id_ruang='$klok' AND b.idx IS NULL AND a.idx NOT IN (SELECT id_pindah_ranap FROM tbl02_pindah_ranap_response)")->num_rows();
        } elseif ($jenis == "penunjang") {
            $row = $this->db->query("SELECT * FROM tbl02_permintaan_penunjang WHERE id_penunjang='$klok' AND idx NOT IN (SELECT id_permintaan_penunjang FROM tbl02_permintaan_penunjang_response)")->num_rows();
        }
        if (!empty($row)) return $row;
        else return false;
    }
    function updateKunjungan($data, $id_daftar, $reg_unit)
    {
        $this->db->where('id_daftar', $id_daftar);
        $this->db->where('reg_unit', $reg_unit);
        $this->db->update('tbl02_pendaftaran', $data);
    }

    function getLayanan($idruang, $kelasid)
    {
        $this->db->join('tbl01_tarif_layanan', 'idtarif=idx');
        $this->db->where('idruang', $idruang);
        $this->db->where('kelas_id', $kelasid);
        return $this->db->get("tbl01_tarif_ruang")->result();
    }

    function getlayananoperasi($kelasid, $anestesi, $cito)
    {
        $this->db->join('tbl01_tarif_layanan', 'idtarif=idx');
        $this->db->where('kelas_id', $kelasid);
        $this->db->where('anestesi', $anestesi);
        $this->db->where('cito', $cito);
        return $this->db->get("tbl01_tarif_operasi")->result();
    }

    function getJadwaloperasi($param = "", $param_val = "")
    {
        if (!empty($param)) $this->db->where($param, $param_val);
        return $this->db->get('tbl02_jadwaloperasi')->result();
    }

    function getPoli($idx = "")
    {
        $this->db->join('jkn_poli', 'kodepoli=kodejkn', 'left');
        if (!empty($idx)) $this->db->where('idx', $idx);
        if (!empty($idx)) return $this->db->get('tbl01_ruang')->row();
        else $this->db->get('tbl01_ruang')->result();
    }

    function insertJadwalOperasi($antrean)
    {
        $this->db->insert('tbl02_jadwaloperasi', $antrean);
        return $this->db->insert_id();
    }

    function updateJadwalOperasi($antrean, $idx)
    {
        $this->db->where('idx', $idx);
        $this->db->update('tbl02_jadwaloperasi', $antrean);
        return $idx;
    }

    function ws_token()
    {
        $param = array(
            'username'  => _USERNAME_WS,
            'password'  => _PASSWORD_WS
        );
        $data = $this->ws_antrean($param, "bpjs/get_token");
        $x = json_decode($data);
        return $x->response->token;
    }

    function ws_antrean($param, $url, $token = "")
    {
        //$data = array("name" => "Hagrid", "age" => "36");                                                                    
        $data_string = json_encode($param);
        $ch = curl_init(_URL_WS . $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (empty($token)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string)
            ));
        } else {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string),
                'X-Token: ' . $token
            ));
        }

        $result = curl_exec($ch);
        return $result;
    }
    function getBookingID()
    {
        //OP-201901-0001
        $tgl = date('Ym');
        $this->db->like('kodebooking', $tgl);
        $this->db->order_by('kodebooking', 'DESC');
        $res = $this->db->get("tbl02_jadwaloperasi")->row();
        if (empty($res)) {
            $kode = "OP-" . $tgl . "-0001";
        } else {
            $kode_terakhir = $res->kodebooking;
            $x = explode('-', $kode_terakhir);
            $y = intval($x[2]) + 1;
            $kode = "OP-" . $tgl . "-" . str_pad($y, 4, "0", STR_PAD_LEFT);
        }
        return $kode;
    }

    function getJadwalbyId($idx)
    {
        $this->db->where('tbl02_jadwaloperasi.idx', $idx);
        $this->db->join('tbl01_tarif_layanan', 'tbl01_tarif_layanan.idx=idtarif', 'left');
        return $this->db->get('tbl02_jadwaloperasi')->row();
    }

    function updateJadwal($data, $id)
    {
        $this->db->where('idx', $id);
        $this->db->update('tbl02_jadwaloperasi', $data);
        return true;
    }
    function insertNota($data)
    {
        $this->db->insert('tbl03_nota_detail', $data);
        return $this->db->insert_id();
    }

    function getTindakan($reg_unit)
    {
        $this->db->where('reg_unit', $reg_unit);
        return $this->db->get('tbl03_nota_detail')->result();
    }

    function getHasilPemeriksaan($reg_unit, $idlayanan)
    {
        $this->db->where('reg_unit', $reg_unit);
        $this->db->where('idlayanan', $idlayanan);
        return $this->db->get('tbl03_hasil_pemeriksaan_penunjang')->row();
    }

    function getHasilPemeriksaanByPasien($nomr, $idjenis)
    {
        $this->db->where('nomr', $nomr);
        $this->db->where('idjenispemeriksaan', $idjenis);
        $this->db->where('dokterVerifikasi <>', '');
        $this->db->order_by('reg_unit', 'desc');
        $this->db->order_by('idjenispemeriksaan');
        return $this->db->get('tbl03_hasil_pemeriksaan_penunjang')->result();
    }
    function simpanhasilpemeriksaan($data, $idx)
    {
        if (empty($idx)) {
            $this->db->insert('tbl03_hasil_pemeriksaan_penunjang', $data);
            $insert_id = $this->db->insert_id();
            if (empty($insert_id)) return "Gagal meninput data hasil pemeriksaan";
            else return "Berhasil Input Data Hasil Pemeriksaan ";
        } else {
            $this->db->where('idx', $idx);
            $this->db->update('tbl03_hasil_pemeriksaan_penunjang', $data);
            return "Data Hasil Labor Berhasil Diupdate";
        }
    }

    function getJenisPemeriksaan($id_penunjang)
    {
        $this->db->select("*, b.idx");
        $this->db->where('idpenunjang', $id_penunjang);
        $this->db->join('tbl01_jenis_pemeriksaan_sub a', 'a.idjenispemeriksaan=b.idx', 'left');
        $this->db->group_by('b.idx');
        return $this->db->get("tbl01_jenis_pemeriksaan b")->result();
    }

    function getPermintaanJenisPemeriksaan($idx_pendaftaran)
    {
        $this->db->where('idx_pendaftaran', $idx_pendaftaran);
        $this->db->group_by('id_jenis_pemeriksaan');
        return $this->db->get("tbl02_pemeriksaan_penunjang")->result();
    }
    function showPemeriksaan($reg_unit, $idjenis)
    {
        $this->db->where('idjenispemeriksaan', $idjenis);
        $this->db->where('reg_unit', $reg_unit);
        return $this->db->get('tbl03_hasil_pemeriksaan_penunjang')->result();
    }
    function listPemeriksaan($idjenis, $reg_unit = '')
    {
        $this->db->where('id_jenis_pemeriksaan', $idjenis);
        if (!empty($reg_unit)) $this->db->where("id_pemeriksaan NOT IN (SELECT id_pemeriksaan FROM tbl02_temp_permintaan_tindakan_penunjang WHERE reg_unit='" . $reg_unit . "')");
        return $this->db->get('tbl01_pemeriksaan')->result();
    }

    function permintaanPemeriksaan($idjenis, $idx_pendaftaran = '', $reg_unit = '')
    {
        $this->db->where('id_jenis_pemeriksaan', $idjenis);
        if (!empty($idx_pendaftaran)) $this->db->where("idx_pendaftaran", $idx_pendaftaran);
        if (!empty($reg_unit)) $this->db->where("id_pemeriksaan NOT IN(SELECT idpemeriksaan FROM tbl03_hasil_pemeriksaan_penunjang WHERE reg_unit='" . $reg_unit . "')");
        return $this->db->get('tbl02_pemeriksaan_penunjang')->result();
    }
    function listSubPemeriksaan($idperiksa)
    {
        $this->db->where('tbl01_pemeriksaan_sub.id_pemeriksaan', $idperiksa);
        $this->db->join('tbl01_pemeriksaan_sub', 'tbl01_pemeriksaan_sub.id_pemeriksaan=tbl01_pemeriksaan.id_pemeriksaan');
        return $this->db->get('tbl01_pemeriksaan')->result();
    }
    function getPemeriksaanByid($idperiksa)
    {
        $this->db->where('id_pemeriksaan', $idperiksa);
        return $this->db->get('tbl01_pemeriksaan')->row();
    }
    function simpanPemeriksaan($data)
    {
        $this->db->insert_batch('tbl03_hasil_pemeriksaan_penunjang', $data);
    }
    function getPemeriksaan($reg_unit, $idpemeriksaan)
    {
        $this->db->where('reg_unit', $reg_unit);
        $this->db->where('idpemeriksaan', $idpemeriksaan);
        return $this->db->get('tbl03_hasil_pemeriksaan_penunjang')->row();
    }

    function getRiwayatKunjungan($nomr, $limit, $start, $q)
    {
        $this->db->where('nomr', $nomr);
        $this->db->group_start();
        $this->db->like('tgl_masuk', $q);
        $this->db->or_like('jns_layanan', $q);
        $this->db->or_like('nama_ruang', $q);
        $this->db->group_end();
        $this->db->limit($limit, $start);
        $this->db->order_by('idx', 'desc');
        return $this->db->get('tbl02_pendaftaran')->result();
    }
    function countRiwayatKunjungan($nomr, $q)
    {
        $this->db->where('nomr', $nomr);
        $this->db->group_start();
        $this->db->like('tgl_masuk', $q);
        $this->db->or_like('jns_layanan', $q);
        $this->db->or_like('nama_ruang', $q);
        $this->db->group_end();
        return $this->db->get('tbl02_pendaftaran')->num_rows();
    }
    function getTagihan($id_daftar, $jkn)
    {
        /*$this->db->select('a.date_created,a.id_daftar,a.nomr,a.id_tarif,a.layanan,a.jasa_sarana,
            a.jasa_pelayanan,a.tarif_layanan,a.kategori_id,a.kelas_id,a.jml,a.sub_total_tarif,a.id_dokter,
            a.user_exec,COUNT(a.id_tarif) AS jmltindakan,SUM(a.sub_total_tarif) AS sub_total_tarif,b.id_ruang,b.nama_ruang,b.status_transaksi');
        $this->db->join('tbl02_pendaftaran b','b.reg_unit=a.reg_unit');
        $this->db->where('a.id_daftar',$id_daftar);
        $this->db->group_by('b.id_ruang,a.id_tarif');
        $this->db->order_by('b.tgl_masuk,a.reg_unit');
        return $this->db->get("tbl03_nota_detail a")->result();*/
        $this->db->where('a.id_daftar', $id_daftar);

        if ($jkn == 0) {
            $this->db->select("a.`id_daftar`,a.`nomr`,b.`kode_item` as reg_unit,b.`kode_item_detail` AS id_tarif, b.`deskripsi` AS layanan,item_sarana AS jasa_sarana, 
            item_pelayanan AS jasa_pelayanan, nilai_item AS tarif_layanan, b.`kategori_id`, c.`kategori_tarif`,b.`jml_item` AS jmltindakan, 
            b.`sub_total_item` AS sub_total_tarif,b.`kode_unit` AS id_ruang, b.`nama_unit` AS nama_ruang, a.`grand_total`,a.`tarif_bpjs`,
            a.`tarif_selisih_bayar`");
            $this->db->join('tbl05_kwitansi_detail_item b', 'a.`no_kwitansi` = b.`no_kwitansi`');
            $this->db->join('tbl01_kategori_tarif c', 'b.`kategori_id`=c.`idx`');
        } else {
            $this->db->select("a.`id_daftar`,a.`nomr`,b.`kode_item` as reg_unit,b.`kode_item_detail` AS id_tarif, b.`deskripsi` AS layanan,SUM(item_sarana) AS jasa_sarana, 
            SUM(item_pelayanan) AS jasa_pelayanan, SUM(nilai_item) AS tarif_layanan, b.`kategori_id`, c.`kategori_tarif`,b.`jml_item` AS jmltindakan, 
            SUM(b.`sub_total_item`) AS sub_total_tarif,b.`kode_unit` AS id_ruang, b.`nama_unit` AS nama_ruang, a.`grand_total`,a.`tarif_bpjs`,
            a.`tarif_selisih_bayar`");
            $this->db->join('tbl05_kwitansi_detail_item b', 'a.`no_kwitansi` = b.`no_kwitansi`');
            $this->db->join('tbl01_kategori_tarif c', 'b.`kategori_id`=c.`idx`');
            $this->db->group_by('b.kategori_id');
        }
        return $this->db->get("tbl05_kwitansi a")->result();
    }

    function getDiagnosaAkhir($iddaftar, $reg_unit)
    {
        $this->db->where('id_daftar', $iddaftar);
        $this->db->where('reg_unit', $reg_unit);
        return $this->db->get('tbl03_diagnosa_akhir')->row();
    }

    function getPemeriksaanPilihan($reg_unit)
    {
        $this->db->where('reg_unit', $reg_unit);
        $this->db->order_by('id_jenispemeriksaan');
        return  $this->db->get('tbl02_temp_permintaan_tindakan_penunjang')->result();
    }
    function getTemp($id_daftar, $reg_unit)
    {
        $this->db->where('id_daftar', $id_daftar);
        $this->db->where('reg_unit', $reg_unit);
        return $this->db->get('tbl02_temp_permintaan_tindakan_penunjang')->result();
    }
    function getPermintaan($id_permintaan)
    {
        $this->db->where('id_permintaan', $id_permintaan);
        return $this->db->get('tbl02_permintaan_tindakan_penunjang')->result();
    }

    function getPermintaanPenunjang($id_permintaan)
    {
        $this->db->where('idx', $id_permintaan);
        return $this->db->get('tbl02_permintaan_penunjang')->row();
    }

    function cekJenisPemeriksaan($idjenis)
    {
        $this->db->where('idx', $idjenis);
        return $this->db->get('tbl01_jenis_pemeriksaan')->row();
    }
    function subjenispemeriksaan($idjenis)
    {
        $this->db->where('idjenispemeriksaan', $idjenis);
        return $this->db->get('tbl01_jenis_pemeriksaan_sub')->result();
    }
    function data_permintaan_penunjang($reg_unit)
    {
        $this->db->where('reg_unit', $reg_unit);
        $this->db->where("reg_unit NOT IN (SELECT reg_unit FROM tbl02_permintaan_penunjang_batal)");
        return $this->db->get('tbl02_permintaan_penunjang')->result();
    }
    function data_rujukan_internal($reg_unit)
    {
        $this->db->where('reg_unit', $reg_unit);
        $this->db->where("reg_unit NOT IN (SELECT reg_unit FROM tbl02_rujuk_internal_batal)");
        return $this->db->get('tbl02_rujuk_internal')->result();
    }
    function getPermintaanByid($idx)
    {
        //$this->db->select("a.*, b.tgl_minta,b.ruang_pengirim,b.nama_ruang_pengirim,b.id_penunjang, b.nama_penunjang, b.dokter_pengirim,b.nama_dokter_pengirim,");
        $this->db->where('b.idx', $idx);
        $this->db->join('tbl02_pendaftaran a', 'a.reg_unit=b.reg_unit');
        $this->db->join('tbl01_pasien c', 'a.nomr=c.nomr');
        return $this->db->get('tbl02_permintaan_penunjang b')->row();
    }

    function longdate($tanggal)
    {
        $exp1 = explode(" ", $tanggal);
        $date = explode('-', $exp1[0]);

        //return $exp1[0];exit;
        if (count($date) < 3) {
            return "Invalid date";
        } else {
            $thn = $date[0];
            $bln = intval($date[1]);
            $tgl = $date[2];
            $bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
            return $tgl . " " . $bulan[$bln] . " " . $thn;
        }
    }

    function getPermintaanTindakan($idpermintaan)
    {
        $this->db->where('id_permintaan', $idpermintaan);
        $this->db->order_by('idjenispemeriksaan');
        return $this->db->get('tbl02_permintaan_tindakan_penunjang')->result();
    }
    function buatSuratKontrol($idruang)
    {
        $this->db->where('id_ruang', $idruang);
        $this->db->order_by('nomor_surat_kontrol', 'desc');
        $this->db->limit(1);
        $row = $this->db->get('tbl02_surat_kontrol_ulang')->row();
        if (empty($row)) return "000001";
        else {
            $kode = intval($row->nomor_surat_kontrol) + 1;
            return str_pad($kode, 6, '0', STR_PAD_LEFT);
        }
    }

    function getSuratKontrol($reg_unit)
    {
        $this->db->where('reg_unit', $reg_unit);
        return $this->db->get("tbl02_surat_kontrol_ulang")->row();
    }

    function getSuratRujukan($reg_unit)
    {
        $this->db->where('reg_unit', $reg_unit);
        return $this->db->get("tbl02_surat_rujukan")->row();
    }
    function pushNotification($reg_unit)
    {
        $this->db->where('reg_unit', $reg_unit);
        $row = $this->db->get('tbl02_pendaftaran')->row();
        if (!empty($row)) {
            if ($row->jns_layanan == 'RI') {
                //Notifikasi Unit klaim
                $pesan = "";
                if ($row->id_cara_bayar == 2) {
                    if (intval($row->id_kelas) != intval($row->hakKelasid)) {
                        $pesan = "Pasien atas nama " . $row->nama_pasien . " siap untuk dipulangkan, Tolong buatkan kwitansi pembayaran 
                        karena pasien merupakan pasien memiliki hak layanan " . $row->hakKelas . " tetapi mengambil layanan kelas " . $row->kelas_layanan;
                        $notify = array(
                            'notif_jenis'   => 'UK',
                            'notif_tujuan' => 0,
                            'notif_regunit' => $reg_unit,
                            'notif_jenislayanan' => 'RI',
                            'notif_ruangasal' => $row->id_ruang,
                            'notif_pesan' => $pesan,

                        );
                        $this->db->insert('tbl02_notifikasi_transaksi', $notify);
                    }
                }
            }
            //Notifikasi Ruang Layanan
            $this->db->where('id_daftar', $row->id_daftar);
            $this->db->where('status_transaksi', 0);
            $list = $this->db->get('tbl02_pendaftaran')->result();
            foreach ($list as $l) {
                $pesan = "Pasien atas nama " . $row->nama_pasien . " siap untuk dipulangkan, 
                Tolong inputkan semua tindakan dan layanan yang didapatkan pasien di ruangan 
                ini kemudian klik finish transaksi";
                $list_notify[] = array(
                    'notif_jenis'   => 'RG',
                    'notif_tujuan' => $l->id_ruang,
                    'notif_regunit' => $l->reg_unit,
                    'notif_jenislayanan' => $l->jns_layanan,
                    'notif_ruangasal' => $row->id_ruang,
                    'notif_pesan' => $pesan,
                );
            }
            if (!empty($list_notify)) {
                $this->db->insert_batch('tbl02_notifikasi_transaksi', $list_notify);
            }
        }
    }
    function getAkses($idlevel, $idmodul, $kodemenu)
    {
        $this->db->select('hak_aksi');
        $this->db->where('idlevel', $idlevel);
        $this->db->where('idmodul', $idmodul);
        $this->db->where('idmenu', $kodemenu);
        return $this->db->get('tbl01_acc_hakakses')->row()->hak_aksi;
    }

    function getCaraBayar($idx)
    {
        $this->db->where('idx', $idx);
        return $this->db->get('tbl01_cara_bayar')->row();
    }
    function cekKamar($id_kamar){
        $this->db->where('a.id_kamar',$id_kamar);
        $this->db->select("a.id_kamar,a.nama_kamar,a.id_ruang,a.nama_ruang,a.jml_tt,
            IFNULL(b.terisi_lk,0) AS terisi_lk,IFNULL(b.terisi_pr,0) AS terisi_pr");
        $this->db->where('a.status_kamar', 1);
        $this->db->join('view_bedterisi b', 'a.`id_kamar`=b.`id_kamar`', 'LEFT');
        return $this->db->get('tbl01_kamar a')->row();
    }
    function updatePendaftaran($data, $kondisi)
    {
        $this->db->where($kondisi);
        $this->db->update('tbl02_pendaftaran', $data);
    }
    function updateBed($id_kamar)
    {
        $this->db->where('id_kamar', $id_kamar);
        $row = $this->db->get('tbl01_kamar')->row();
        if ($row) {
            $data = array(
                'terisi_lk' => $row->terisi_lk,
                'terisi_pr' => $row->terisi_pr,
                'rawatgabung_lk' => $row->rawatgabung_lk,
                'rawatgabung_pr' => $row->rawatgabung_pr
            );
            $client_id = ONLINE_ID;
            $key = ONLINE_KEY;
            $param = array(
                'client_id' => $client_id,
                'client_secret_key' => $key,
                'id_kamar' => $id_kamar,
                'data' => $data
            );
            $respone = $this->request_online($param, ONLINE_CALL_BACK . "updatebed");
            return $respone;
        }
        
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

    function getDepo(){
        $this->db->where('KDGRLOKASI',1);
        return $this->db->get('tbl04_lokasi')->result();
    }
    
}
