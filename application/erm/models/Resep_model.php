<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Resep_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
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
    /** Resep Obat */
}