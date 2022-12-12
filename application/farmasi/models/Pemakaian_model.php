<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pemakaian_model extends CI_Model
{
    function getRiwayatKunjungan($limit, $start, $q, $jns_layanan = 'RJ')
    {
        //$this->db->select('id_daftar,nomr,no_ktp,nama_pasien, tempat_lahir, tgl_lahir,jns_kelamin,no_bpjs');
        $this->db->select('no_ktp,id_daftar,reg_unit,nomr,nama_pasien,jns_kelamin,no_bpjs,kelas_layanan,nama_ruang,rujukan');
        $this->db->where('jns_layanan', $jns_layanan);
        $this->db->group_start();
        $this->db->like('no_bpjs', $q);
        $this->db->or_like('nomr', $q);
        $this->db->or_like('id_daftar', $q);
        $this->db->or_like('no_ktp', $q);
        $this->db->or_like('nama_pasien', $q);
        $this->db->or_like('tempat_lahir', $q);
        $this->db->or_like('tgl_lahir', $q);
        $this->db->or_like('jns_kelamin', $q);
        $this->db->group_end();
        $this->db->limit($limit, $start);
        //if ($jns_layanan == "RJ" || $jns_layanan == "GD") $this->db->join("(SELECT id_daftar as id FROM tbl02_pendaftaran WHERE jns_layanan='RI') AS b","a.id_daftar = b.id","LEFT");
        //if ($jns_layanan == "RJ" || $jns_layanan == "GD") $this->db->where("id_daftar NOT IN (SELECT id_daftar FROM tbl02_pendaftaran WHERE jns_layanan='RI')");
        //elseif($jns_layanan=="RI") 
        //$this->db->where("jns_layanan", $jns_layanan);
        //$this->db->group_by('id_daftar');
        $this->db->order_by('idx', 'desc');
        return $this->db->get('tbl02_pendaftaran a')->result();
    }
    function countRiwayatKunjungan($q, $jns_layanan = 'RJ')
    {
        $this->db->select("count(1) as num_rows");
        $this->db->where('jns_layanan', $jns_layanan);
        $this->db->group_start();
        $this->db->like('no_bpjs', $q);
        $this->db->or_like('nomr', $q);
        $this->db->or_like('id_daftar', $q);
        $this->db->or_like('no_ktp', $q);
        $this->db->or_like('nama_pasien', $q);
        $this->db->or_like('tempat_lahir', $q);
        $this->db->or_like('tgl_lahir', $q);
        $this->db->or_like('jns_kelamin', $q);
        //$this->db->group_by('id_daftar');
        $this->db->group_end();
        //if ($jns_layanan == "RJ" || $jns_layanan == "GD") $this->db->join("(SELECT id_daftar as id FROM tbl02_pendaftaran WHERE jns_layanan='RI') AS b","a.id_daftar = b.id","LEFT");
        //if ($jns_layanan == "RJ" || $jns_layanan == "GD") $this->db->where("id_daftar NOT IN (SELECT id_daftar FROM tbl02_pendaftaran WHERE jns_layanan='RI')");
        return $this->db->get('tbl02_pendaftaran')->row()->num_rows;
    }
    function getKunjungan($reg_unit)
    {
        $this->db->where('reg_unit', $reg_unit);
        return $this->db->get('tbl02_pendaftaran')->row();
    }
    function getRuangAkses($KDLOKASI, $group)
    {
        $this->db->where('KDGRLOKASI', $group);
        $this->db->where("KDLOKASI", $KDLOKASI);
        return $this->db->get('tbl04_lokasi')->row();
    }

    function getDokter($keyword)
    {
        $this->db->where('dokter', 1);
        $this->db->group_start();
        $this->db->like('pgwNama', $keyword);
        $this->db->group_end();
        $this->db->join('tbl01_pegawai b', 'a.NRP=b.NRP');
        $this->db->group_by('a.NRP');
        return $this->db->get('tbl01_dokter a')->result();
    }
    function getBarang($keyword = "", $kode_lokasi = "")
    {
        if (empty($kode_lokasi)) {
            $this->db->select('tbl04_barang.KDBRG,NMBRG,KDSATUAN,NMSATUAN,KDKTBRG,NMKTBRG');
            $this->db->group_start();
            $this->db->like('KDBRG', $keyword);
            $this->db->or_like('NMBRG', $keyword);
            $this->db->or_like('NMSATUAN', $keyword);
            $this->db->or_like('NMKTBRG', $keyword);
            $this->db->group_end();
            return $this->db->get('tbl04_barang')->result();
        } else {
            $this->db->select('tbl04_barang.KDBRG,NMBRG,KDSATUAN,NMSATUAN,KDKTBRG,NMKTBRG,SUM(JSTOK) as JSTOK,KDLOKASI,(MAX(HMODAL)*1.2) AS HJUAL,HMODAL');
            $this->db->join('tbl04_barang', 'tbl04_barang.KDBRG=stok_barang_fifo.KDBRG');
            $this->db->where('KDLOKASI', $kode_lokasi);
            $this->db->group_start();
            $this->db->like('tbl04_barang.KDBRG', $keyword);
            $this->db->or_like('NMBRG', $keyword);
            $this->db->or_like('NMSATUAN', $keyword);
            $this->db->or_like('JSTOK', $keyword);
            $this->db->group_end();
            $this->db->group_by('stok_barang_fifo.KDBRG , stok_barang_fifo.KDLOKASI');
            $this->db->order_by("NMBRG");
            return $this->db->get('stok_barang_fifo')->result();
        }
    }

    function validateStok($KDLOKASI, $KDBRG, $JMLJUAL)
    {
        $this->db->select("SUM(JSTOK) AS JSTOK");
        $this->db->where("KDLOKASI", $KDLOKASI);
        $this->db->where('KDBRG', $KDBRG);
        $this->db->group_by('KDLOKASI,KDBRG');
        $row = $this->db->get('stok_barang_fifo')->row();
        if (empty($row)) return FALSE;
        else {
            if ($row->JSTOK < $JMLJUAL) return FALSE;
            else return TRUE;
        }
    }

    function insertMasterJual($data)
    {
        $insert = $this->db->insert('tbl04_penjualan', $data);
        if (!$insert) return false;
        else {
            $this->db->select('KDJL');
            $this->db->where('UEXEC', $data["UEXEC"]);
            $this->db->where('KDLOKASI', $data['KDLOKASI']);
            $this->db->where('NOMR', $data['NOMR']);
            $this->db->order_by('KDJL', 'DESC');
            $this->db->limit(1);
            return $this->db->get('tbl04_penjualan')->row()->KDJL;
        }
    }

    function loop_item(
        $KDJL,
        $KDBRG,
        $NMBRG,
        $KDLOKASI,
        $HJUAL,
        $JMLJUAL,
        $DISKON,
        $R,
        $SUBTOTAL,
        $AP,
        $AP_JENISOBAT,
        $AP_JMLHARI,
        $AP_JMLSATUAN,
        $AP_SATUAN,
        $AP_CARAPAKAI,
        $AP_WAKTUJML,
        $AP_WAKTUPAKAI,
        $AP_WAKTUKET,
        $AP_KET
    ) {
        $rqSTOK = $this->db->query("SELECT * FROM stok_barang_fifo 
            WHERE KDBRG = '$KDBRG' 
            AND KDLOKASI = '$KDLOKASI' 
            AND JSTOK > 0 ORDER BY TGLBELI ASC, TGLEXP ASC LIMIT 1")->row_array();

        if ($JMLJUAL < $rqSTOK['JSTOK']) {
            // Insert Item
            $params_item = array(
                'KDJL' => $KDJL,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'HJUAL' => $HJUAL,
                'JMLJUAL' => $JMLJUAL,
                'DISKON' => $DISKON,
                'R' => $R,
                'SUBTOTAL' => $SUBTOTAL,
                'AP' => $AP,
                'AP_JENISOBAT' => $AP_JENISOBAT,
                'AP_JMLHARI' => $AP_JMLHARI,
                'AP_JMLSATUAN' => $AP_JMLSATUAN,
                'AP_SATUAN' => $AP_SATUAN,
                'AP_CARAPAKAI' => $AP_CARAPAKAI,
                'AP_WAKTUJML' => $AP_WAKTUJML,
                'AP_WAKTUPAKAI' => $AP_WAKTUPAKAI,
                'AP_WAKTUKET' => $AP_WAKTUKET,
                'AP_KET' => $AP_KET,
                'AP_EXPDATE' => $rqSTOK['TGLEXP'],
                'JMLRET' => 0,
                'SISA' => $JMLJUAL
            );
            $this->db->insert('tbl04_penjualan_detail', $params_item);
            return 0;
        } elseif ($JMLJUAL > $rqSTOK['JSTOK']) {
            $params_item = array(
                'KDJL' => $KDJL,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'HJUAL' => $HJUAL,
                'JMLJUAL' => $rqSTOK['JSTOK'],
                'DISKON' => $DISKON,
                'R' => $R,
                'SUBTOTAL' => $SUBTOTAL,
                'AP' => $AP,
                'AP_JENISOBAT' => $AP_JENISOBAT,
                'AP_JMLHARI' => $AP_JMLHARI,
                'AP_JMLSATUAN' => $AP_JMLSATUAN,
                'AP_SATUAN' => $AP_SATUAN,
                'AP_CARAPAKAI' => $AP_CARAPAKAI,
                'AP_WAKTUJML' => $AP_WAKTUJML,
                'AP_WAKTUPAKAI' => $AP_WAKTUPAKAI,
                'AP_WAKTUKET' => $AP_WAKTUKET,
                'AP_KET' => $AP_KET,
                'AP_EXPDATE' => $rqSTOK['TGLEXP'],
                'JMLRET' => 0,
                'SISA' => $rqSTOK['JSTOK']
            );
            //return $params_item;
            $this->db->insert('tbl04_penjualan_detail', $params_item);
            $JMLJUAL = $JMLJUAL - $rqSTOK['JSTOK'];
            return $JMLJUAL;
        } elseif ($JMLJUAL = $rqSTOK['JSTOK']) {
            $params_item = array(
                'KDJL' => $KDJL,
                'KDBRG' => $KDBRG,
                'NMBRG' => $NMBRG,
                'HMODAL' => $rqSTOK['HMODAL'],
                'TGLBELI' => $rqSTOK['TGLBELI'],
                'HJUAL' => $HJUAL,
                'JMLJUAL' => $JMLJUAL,
                'DISKON' => $DISKON,
                'R' => $R,
                'SUBTOTAL' => $SUBTOTAL,
                'AP' => $AP,
                'AP_JENISOBAT' => $AP_JENISOBAT,
                'AP_JMLHARI' => $AP_JMLHARI,
                'AP_JMLSATUAN' => $AP_JMLSATUAN,
                'AP_SATUAN' => $AP_SATUAN,
                'AP_CARAPAKAI' => $AP_CARAPAKAI,
                'AP_WAKTUJML' => $AP_WAKTUJML,
                'AP_WAKTUPAKAI' => $AP_WAKTUPAKAI,
                'AP_WAKTUKET' => $AP_WAKTUKET,
                'AP_KET' => $AP_KET,
                'AP_EXPDATE' => $rqSTOK['TGLEXP'],
                'JMLRET' => 0,
                'SISA' => $JMLJUAL
            );
            $this->db->insert('tbl04_penjualan_detail', $params_item);
            return 0;
        }
    }

    function getHistori($reg_unit)
    {
        $this->db->where('REG_UNIT', $reg_unit);
        $this->db->order_by('KDJL', 'DESC');
        return $this->db->get('tbl04_penjualan')->result();
    }
    function getPegawai($keyword){
        $this->db->like('NRP', $keyword);
        $this->db->or_like('pgwNama', $keyword);
        return $this->db->get('tbl01_pegawai')->result();
    }
    function getMaster($KDJL){
        $this->db->where('KDJL',$KDJL);
        return $this->db->get('tbl04_penjualan')->row_array();
    }
    function getDetail($KDJL){
        $this->db->select("`KDJL`,`KDBRG`,`NMBRG`,`HMODAL`,`TGLBELI`,`HJUAL`,`JMLJUAL`,`DISKON`,`R`,`SUBTOTAL`,`AP`,
        `JMLRET`,`SISA`,`AP_JENISOBAT`,`AP_JMLHARI`,`AP_JMLSATUAN`,`AP_SATUAN`,`AP_CARAPAKAI`,`AP_WAKTUJML`,`AP_WAKTUPAKAI`,`AP_WAKTUKET`,`AP_KET`,
        `AP_EXPDATE`,NOW() AS AP_TGLMULAI,DATE_ADD(NOW(), INTERVAL JMLJUAL/AP_JMLHARI DAY) AS AP_TGLSELESAI");
        $this->db->where('KDJL',$KDJL);
        return $this->db->get('tbl04_penjualan_detail')->result_array();
    }
}
