<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Search_model extends CI_Model
{
    function getBarang($start = 0, $limit = 10, $kode = "", $nama = "", $satuan = "", $kategori = "", $keyword = "", $kode_lokasi = "")
    {
        if (empty($kode_lokasi)) {
            $this->db->select('tbl04_barang.KDBRG,NMBRG,KDSATUAN,NMSATUAN,KDKTBRG,NMKTBRG');
            if (!empty($kode) || !empty($nama) || !empty($satuan) || !empty($kategori)) {
                $this->db->group_start();
                if (!empty($kode)) $this->db->like('KDBRG', $kode);
                if (!empty($nama)) $this->db->like('NMBRG', $nama);
                if (!empty($satuan)) $this->db->like('NMSATUAN', $satuan);
                if (!empty($kategori)) $this->db->like('NMKTBRG', $kode);
                $this->db->group_end();
            }

            $this->db->group_start();
            $this->db->like('KDBRG', $keyword);
            $this->db->or_like('NMBRG', $keyword);
            $this->db->or_like('NMSATUAN', $keyword);
            $this->db->or_like('NMKTBRG', $keyword);
            $this->db->group_end();
            $this->db->limit($limit, $start);
            return $this->db->get('tbl04_barang')->result();
        } else {
            $this->db->select('tbl04_barang.KDBRG,NMBRG,KDSATUAN,NMSATUAN,KDKTBRG,NMKTBRG,SUM(JSTOK) as JSTOK,KDLOKASI,(MAX(HMODAL)*1.2) AS HJUAL,HMODAL');
            $this->db->join('tbl04_barang', 'tbl04_barang.KDBRG=stok_barang_fifo.KDBRG');
            $this->db->where('KDLOKASI', $kode_lokasi);
            if (!empty($kode) || !empty($nama) || !empty($satuan) || !empty($kategori)) {
                $this->db->group_start();
                if (!empty($kode)) $this->db->like('tbl04_barang.KDBRG', $kode);
                if (!empty($nama)) $this->db->like('NMBRG', $nama);
                if (!empty($satuan)) $this->db->like('NMSATUAN', $satuan);
                if (!empty($kategori)) $this->db->like('JSTOK', $kode);
                $this->db->group_end();
            }

            $this->db->group_start();
            $this->db->like('tbl04_barang.KDBRG', $keyword);
            $this->db->or_like('NMBRG', $keyword);
            $this->db->or_like('NMSATUAN', $keyword);
            $this->db->or_like('JSTOK', $keyword);
            $this->db->group_end();
            $this->db->group_by('stok_barang_fifo.KDBRG , stok_barang_fifo.KDLOKASI');
            $this->db->order_by("NMBRG");
            $this->db->limit($limit, $start);
            return $this->db->get('stok_barang_fifo')->result();
        }
    }

    function countBarang($kode = "", $nama = "", $satuan = "", $kategori = "", $keyword = "", $kode_lokasi = "")
    {
        if (empty($kode_lokasi)) {
            if (!empty($kode) || !empty($nama) || !empty($satuan) || !empty($kategori)) {
                $this->db->group_start();
                if (!empty($kode)) $this->db->like('KDBRG', $kode);
                if (!empty($nama)) $this->db->like('NMBRG', $nama);
                if (!empty($satuan)) $this->db->like('NMSATUAN', $satuan);
                if (!empty($kategori)) $this->db->like('NMKTBRG', $kode);
                $this->db->group_end();
            }
            $this->db->select('tbl04_barang.KDBRG,NMBRG,KDSATUAN,NMSATUAN,KDKTBRG,NMKTBRG');
            $this->db->group_start();
            $this->db->like('KDBRG', $keyword);
            $this->db->or_like('NMBRG', $keyword);
            $this->db->or_like('NMSATUAN', $keyword);
            $this->db->or_like('NMKTBRG', $keyword);
            $this->db->group_end();

            return $this->db->get('tbl04_barang')->num_rows();
        } else {

            $this->db->select('tbl04_barang.KDBRG,NMBRG,KDSATUAN,NMSATUAN,KDKTBRG,NMKTBRG,SUM(JSTOK) as JSTOK');
            $this->db->join('tbl04_barang', 'tbl04_barang.KDBRG=stok_barang_fifo.KDBRG', 'LEFT');
            $this->db->where('KDLOKASI', $kode_lokasi);
            if (!empty($kode) || !empty($nama) || !empty($satuan) || !empty($kategori)) {
                $this->db->group_start();
                if (!empty($kode)) $this->db->like('tbl04_barang.KDBRG', $kode);
                if (!empty($nama)) $this->db->like('NMBRG', $nama);
                if (!empty($satuan)) $this->db->like('NMSATUAN', $satuan);
                if (!empty($kategori)) $this->db->like('JSTOK', $kode);
                $this->db->group_end();
            }
            $this->db->group_start();
            $this->db->like('tbl04_barang.KDBRG', $keyword);
            $this->db->or_like('NMBRG', $keyword);
            $this->db->or_like('NMSATUAN', $keyword);
            $this->db->or_like('JSTOK', $keyword);
            $this->db->group_end();
            $this->db->group_by('stok_barang_fifo.KDBRG , stok_barang_fifo.KDLOKASI');
            return $this->db->get('stok_barang_fifo')->num_rows();
        }
    }

    function getPasien($start = 0, $limit = 20, $tgl = "", $nomr = "", $iddaftar = "", $regunit = "", $nama = "", $ruang = "", $layanan = "RJ")
    {
        $this->db->select('*');
        if (!empty($tgl) || !empty($nomr) || !empty($iddaftar) || !empty($regunit) || !empty($nama) || !empty($ruang)) {
            $this->db->group_start();
            if (!empty($tgl)) $this->db->like('tgl_masuk', $tgl);
            if (!empty($nomr)) $this->db->like('tbl02_pendaftaran.nomr', $nomr);
            if (!empty($iddaftar)) $this->db->like('id_daftar', $iddaftar);
            if (!empty($regunit)) $this->db->like('reg_unit', $regunit);
            if (!empty($nama)) $this->db->like('nama_pasien', $nama);
            if (!empty($ruang)) $this->db->like('nama_ruang', $ruang);
            $this->db->group_end();
        }
        $this->db->join('tbl01_pasien', 'tbl01_pasien.nomr=tbl02_pendaftaran.nomr');
        $this->db->where('jns_layanan', $layanan);
        $this->db->limit($limit, $start);
        return $this->db->get('tbl02_pendaftaran')->result();
    }

    function countPasien($tgl = "", $nomr = "", $iddaftar = "", $regunit = "", $nama = "", $ruang = "", $layanan = "RJ")
    {
        $this->db->select('*');
        if (!empty($tgl) || !empty($nomr) || !empty($iddaftar) || !empty($regunit) || !empty($nama) || !empty($ruang)) {
            $this->db->group_start();
            if (!empty($tgl)) $this->db->like('tgl_masuk', $tgl);
            if (!empty($nomr)) $this->db->like('nomr', $nomr);
            if (!empty($iddaftar)) $this->db->like('id_daftar', $iddaftar);
            if (!empty($regunit)) $this->db->like('reg_unit', $regunit);
            if (!empty($nama)) $this->db->like('nama_pasien', $nama);
            if (!empty($ruang)) $this->db->like('nama_ruang', $ruang);
            $this->db->group_end();
        }
        $this->db->where('jns_layanan', $layanan);
        return $this->db->get('tbl02_pendaftaran')->num_rows();
    }

    function getSatuanpemakaian($jenis_obat)
    {
        $this->db->where('id_jenisobat', $jenis_obat);
        return $this->db->get('tbl04_ap_satuan')->result();
    }
    function getCarapakai($jenis_obat)
    {
        $this->db->order_by("FIELD(id_cara,7,1,2,3,4,5,6)");
        $this->db->where('id_jenisobat', $jenis_obat);
        return $this->db->get('tbl04_ap_carapakai')->result();
    }

    function getWaktupakai($periode = "0")
    {
        $this->db->where('periode', $periode);
        if($periode==0){
            $this->db->order_by("FIELD(waktuid,3,1,2) DESC");
            $this->db->order_by('waktuid');
        }else{
            $this->db->order_by("FIELD(waktuid,22,21) DESC");
            $this->db->order_by('waktuid');
        }
        
        return $this->db->get("tbl04_ap_waktupakai")->result();
    }
    function getKeterangan()
    {
        return $this->db->get("tbl04_ap_keterangan")->result();
    }
}
