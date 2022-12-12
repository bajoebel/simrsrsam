<?php
class Laporan_model extends CI_Model
{
    function getLokasi()
    {
        return $this->db->get('tbl04_lokasi')->result();
    }
    function getJenis()
    {
        return $this->db->get('tbl04_jenis_barang')->result();
    }
    function getKategori()
    {
        return $this->db->get('tbl04_kategori_barang')->result();
    }

    function getSupplier()
    {
        return $this->db->get('tbl04_supplier')->result();
    }

    function field($field, $param_field, $param_val, $table)
    {
        $this->db->select($field);
        $this->db->where($param_field, $param_val);
        $data = $this->db->get($table)->row();
        if (!empty($data)) return $data->$field;
        else return "";
    }
    //Data Sisa Stok
    function getDataStok($limit, $start, $lokasi, $jenis, $kategori, $keyword)
    {
        $this->db->select('*, SUM(JSTOK) AS JSTOK, datediff(TGLEXP, current_date()) as selisih');
        if (!empty($lokasi)) $this->db->where('a.KDLOKASI', $lokasi);
        if (!empty($jenis)) $this->db->where('b.KDJENISBRG', $jenis);
        if (!empty($kategori)) $this->db->where('b.KDKTBRG', $kategori);
        if (!empty($limit)) {
            $this->db->group_start();
            $this->db->like('a.KDBRG', $keyword);
            $this->db->or_like('b.NMBRG', $keyword);
            $this->db->or_like('NMGENERIK', $keyword);
            $this->db->or_like('NMSATUAN', $keyword);
            $this->db->or_like('NMKTBRG', $keyword);
            $this->db->or_like('JENISBRG', $keyword);
            $this->db->group_end();
        }
        $this->db->join('tbl04_barang b', 'a.KDBRG = b.KDBRG');
        $this->db->join('tbl04_lokasi c', 'a.KDLOKASI = c.KDLOKASI');
        $this->db->group_by('a.KDLOKASI,a.KDBRG,a.TGLBELI,a.TGLEXP,a.HMODAL');
        if (!empty($limit)) $this->db->limit($limit, $start);
        if (empty($lokasi)) $this->db->order_by('a.KDLOKASI, a.KDBRG');
        return $this->db->get('stok_barang_fifo a')->result();
    }
    function countDataStok($lokasi, $jenis, $kategori, $keyword)
    {
        if (!empty($lokasi)) $this->db->where('a.KDLOKASI', $lokasi);
        if (!empty($jenis)) $this->db->where('b.KDJENISBRG', $jenis);
        if (!empty($kategori)) $this->db->where('b.KDKTBRG', $kategori);
        if (!empty($limit)) {
            $this->db->group_start();
            $this->db->like('a.KDBRG', $keyword);
            $this->db->or_like('b.NMBRG', $keyword);
            $this->db->or_like('NMGENERIK', $keyword);
            $this->db->or_like('NMSATUAN', $keyword);
            $this->db->or_like('NMKTBRG', $keyword);
            $this->db->or_like('JENISBRG', $keyword);
            $this->db->group_end();
        }
        $this->db->join('tbl04_barang b', 'a.KDBRG = b.KDBRG');
        $this->db->join('tbl04_lokasi c', 'a.KDLOKASI = c.KDLOKASI');
        $this->db->group_by('a.KDLOKASI,a.KDBRG,a.TGLBELI,a.TGLEXP,a.HMODAL');

        return $this->db->get('stok_barang_fifo a')->num_rows();
    }

    function getDataKartuStok($limit, $start, $lokasi, $jenis, $kategori, $keyword)
    {
        $this->db->select('*, SUM(JSTOK) AS JSTOK, datediff(TGLEXP, current_date()) as selisih');
        if (!empty($lokasi)) $this->db->where('a.KDLOKASI', $lokasi);
        if (!empty($jenis)) $this->db->where('b.KDJENISBRG', $jenis);
        if (!empty($kategori)) $this->db->where('b.KDKTBRG', $kategori);
        if (!empty($limit)) {
            $this->db->group_start();
            $this->db->like('a.KDBRG', $keyword);
            $this->db->or_like('b.NMBRG', $keyword);
            $this->db->or_like('NMGENERIK', $keyword);
            $this->db->or_like('NMSATUAN', $keyword);
            $this->db->or_like('NMKTBRG', $keyword);
            $this->db->or_like('JENISBRG', $keyword);
            $this->db->group_end();
        }
        $this->db->join('tbl04_barang b', 'a.KDBRG = b.KDBRG');
        $this->db->join('tbl04_lokasi c', 'a.KDLOKASI = c.KDLOKASI');
        $this->db->group_by('a.KDLOKASI,a.KDBRG');
        if (!empty($limit)) $this->db->limit($limit, $start);
        if (empty($lokasi)) $this->db->order_by('a.KDLOKASI, a.KDBRG');
        return $this->db->get('stok_barang_fifo a')->result();
    }
    function countDataKartuStok($lokasi, $jenis, $kategori, $keyword)
    {
        if (!empty($lokasi)) $this->db->where('a.KDLOKASI', $lokasi);
        if (!empty($jenis)) $this->db->where('b.KDJENISBRG', $jenis);
        if (!empty($kategori)) $this->db->where('b.KDKTBRG', $kategori);
        if (!empty($limit)) {
            $this->db->group_start();
            $this->db->like('a.KDBRG', $keyword);
            $this->db->or_like('b.NMBRG', $keyword);
            $this->db->or_like('NMGENERIK', $keyword);
            $this->db->or_like('NMSATUAN', $keyword);
            $this->db->or_like('NMKTBRG', $keyword);
            $this->db->or_like('JENISBRG', $keyword);
            $this->db->group_end();
        }
        $this->db->join('tbl04_barang b', 'a.KDBRG = b.KDBRG');
        $this->db->join('tbl04_lokasi c', 'a.KDLOKASI = c.KDLOKASI');
        $this->db->group_by('a.KDLOKASI,a.KDBRG');

        return $this->db->get('stok_barang_fifo a')->num_rows();
    }
    //Stok Awal
    function getDataStokAwal($limit, $start, $lokasi, $jenis, $kategori, $keyword)
    {
        $this->db->select('*, SUM(JMLSTOK) AS JSTOK');
        if (!empty($lokasi)) $this->db->where('a.KDLOKASI', $lokasi);
        if (!empty($jenis)) $this->db->where('b.KDJENISBRG', $jenis);
        if (!empty($kategori)) $this->db->where('b.KDKTBRG', $kategori);
        $this->db->group_start();
        $this->db->like('a.KDBRG', $keyword);
        $this->db->or_like('a.NOSA', $keyword);
        $this->db->or_like('a.TGLSA', $keyword);
        $this->db->or_like('b.NMBRG', $keyword);
        $this->db->or_like('NMGENERIK', $keyword);
        $this->db->or_like('NMSATUAN', $keyword);
        $this->db->or_like('NMKTBRG', $keyword);
        $this->db->or_like('JENISBRG', $keyword);
        $this->db->group_end();
        $this->db->join('tbl04_barang b', 'a.KDBRG = b.KDBRG');
        $this->db->join('tbl04_lokasi c', 'a.KDLOKASI = c.KDLOKASI');
        $this->db->group_by('a.KDLOKASI,a.KDBRG,a.HMODAL, a.EXPDATE');
        if (!empty($limit)) $this->db->limit($limit, $start);
        if (empty($lokasi)) $this->db->order_by('a.KDLOKASI, a.KDBRG');
        return $this->db->get('tbl04_stok_awal a')->result();
    }
    function countDataStokAwal($lokasi, $jenis, $kategori, $keyword)
    {
        if (!empty($lokasi)) $this->db->where('a.KDLOKASI', $lokasi);
        if (!empty($jenis)) $this->db->where('b.KDJENISBRG', $jenis);
        if (!empty($kategori)) $this->db->where('b.KDKTBRG', $kategori);
        $this->db->group_start();
        $this->db->like('a.KDBRG', $keyword);
        $this->db->or_like('a.NOSA', $keyword);
        $this->db->or_like('a.TGLSA', $keyword);
        $this->db->or_like('b.NMBRG', $keyword);
        $this->db->or_like('NMGENERIK', $keyword);
        $this->db->or_like('NMSATUAN', $keyword);
        $this->db->or_like('NMKTBRG', $keyword);
        $this->db->or_like('JENISBRG', $keyword);
        $this->db->group_end();
        $this->db->join('tbl04_barang b', 'a.KDBRG = b.KDBRG');
        $this->db->join('tbl04_lokasi c', 'a.KDLOKASI = c.KDLOKASI');
        $this->db->group_by('a.KDLOKASI,a.KDBRG,a.HMODAL, a.EXPDATE');

        return $this->db->get('tbl04_stok_awal a')->num_rows();
    }
    //Data Penjualan
    function getDataPembelian($limit, $start, $lokasi, $jenis, $kategori, $supplier, $dari, $sampai, $keyword)
    {
        $this->db->select('*, SUM(JMLBELI) AS JSTOK');
        if (!empty($lokasi)) $this->db->where('a.KDLOKASI', $lokasi);
        if (!empty($jenis)) $this->db->where('c.KDJENISBRG', $jenis);
        if (!empty($kategori)) $this->db->where('c.KDKTBRG', $kategori);
        if (!empty($supplier)) $this->db->where('a.KDSUPPLIER', $supplier);
        if (!empty($dari) && !empty($sampai)) {
            $this->db->where('a.TGLFAKTUR >= ', $dari);
            $this->db->where('a.TGLFAKTUR <= ', $sampai);
        }
        if (!empty($limit)) {
            $this->db->group_start();
            $this->db->like('b.KDBRG', $keyword);
            $this->db->or_like('b.NMBRG', $keyword);
            $this->db->or_like('NMGENERIK', $keyword);
            $this->db->or_like('NMSATUAN', $keyword);
            $this->db->or_like('NMKTBRG', $keyword);
            $this->db->or_like('JENISBRG', $keyword);
            $this->db->group_end();
        }
        $this->db->join('tbl04_pembelian_detail b', 'a.KDBL=b.KDBL');
        $this->db->join('tbl04_barang c', 'b.KDBRG = c.KDBRG');
        $this->db->group_by('a.KDBL,b.KDBRG');
        if (!empty($limit)) $this->db->limit($limit, $start);
        $this->db->order_by('a.KDBL, b.KDBRG');
        return $this->db->get('tbl04_pembelian a')->result();
    }
    function countDataPembelian($lokasi, $jenis, $kategori, $supplier, $dari, $sampai, $keyword)
    {
        if (!empty($lokasi)) $this->db->where('a.KDLOKASI', $lokasi);
        if (!empty($jenis)) $this->db->where('c.KDJENISBRG', $jenis);
        if (!empty($kategori)) $this->db->where('c.KDKTBRG', $kategori);
        if (!empty($supplier)) $this->db->where('a.KDSUPPLIER', $supplier);
        if (!empty($dari) && !empty($sampai)) {
            $this->db->where('a.TGLFAKTUR >= ', $dari);
            $this->db->where('a.TGLFAKTUR <= ', $sampai);
        }
        $this->db->group_start();
        $this->db->like('b.KDBRG', $keyword);
        $this->db->or_like('b.NMBRG', $keyword);
        $this->db->or_like('NMGENERIK', $keyword);
        $this->db->or_like('NMSATUAN', $keyword);
        $this->db->or_like('NMKTBRG', $keyword);
        $this->db->or_like('JENISBRG', $keyword);
        $this->db->group_end();
        $this->db->join('tbl04_pembelian_detail b', 'a.KDBL=b.KDBL');
        $this->db->join('tbl04_barang c', 'b.KDBRG = c.KDBRG');
        $this->db->group_by('a.KDBL,b.KDBRG');

        return $this->db->get('tbl04_pembelian a')->num_rows();
    }
    //Data Retur Pembelian
    function getDataReturPembelian($limit, $start, $lokasi, $jenis, $kategori, $supplier, $dari, $sampai, $keyword)
    {
        $this->db->select('*, SUM(JMLRET) AS JSTOK');
        if (!empty($lokasi)) $this->db->where('a.KDLOKASI', $lokasi);
        if (!empty($jenis)) $this->db->where('c.KDJENISBRG', $jenis);
        if (!empty($kategori)) $this->db->where('c.KDKTBRG', $kategori);
        if (!empty($supplier)) $this->db->where('a.KDSUPPLIER', $supplier);
        if (!empty($dari) && !empty($sampai)) {
            $this->db->where('a.TGLTERIMA >= ', $dari);
            $this->db->where('a.TGLTERIMA <= ', $sampai);
        }
        if (!empty($limit)) {
            $this->db->group_start();
            $this->db->like('b.KDBRG', $keyword);
            $this->db->or_like('b.NMBRG', $keyword);
            $this->db->or_like('NMGENERIK', $keyword);
            $this->db->or_like('NMSATUAN', $keyword);
            $this->db->or_like('NMKTBRG', $keyword);
            $this->db->or_like('JENISBRG', $keyword);
            $this->db->group_end();
        }
        $this->db->join('tbl04_pembelian a','a.KDBL=d.KDBL');
        $this->db->join('tbl04_pembelian_batal_detail b', 'd.KDBL_RET=b.KDBL_RET');
        $this->db->join('tbl04_barang c', 'b.KDBRG = c.KDBRG');
        $this->db->group_by('d.KDBL_RET,b.KDBRG');
        if (!empty($limit)) $this->db->limit($limit, $start);
        $this->db->order_by('d.KDBL_RET, b.KDBRG');
        return $this->db->get('tbl04_pembelian_batal d')->result();
    }
    function countDataReturPembelian($lokasi, $jenis, $kategori, $supplier, $dari, $sampai, $keyword){
        if (!empty($lokasi)) $this->db->where('a.KDLOKASI', $lokasi);
        if (!empty($jenis)) $this->db->where('c.KDJENISBRG', $jenis);
        if (!empty($kategori)) $this->db->where('c.KDKTBRG', $kategori);
        if (!empty($supplier)) $this->db->where('a.KDSUPPLIER', $supplier);
        if (!empty($dari) && !empty($sampai)) {
            $this->db->where('a.TGLTERIMA >= ', $dari);
            $this->db->where('a.TGLTERIMA <= ', $sampai);
        }
        if (!empty($limit)) {
            $this->db->group_start();
            $this->db->like('b.KDBRG', $keyword);
            $this->db->or_like('b.NMBRG', $keyword);
            $this->db->or_like('NMGENERIK', $keyword);
            $this->db->or_like('NMSATUAN', $keyword);
            $this->db->or_like('NMKTBRG', $keyword);
            $this->db->or_like('JENISBRG', $keyword);
            $this->db->group_end();
        }
        $this->db->join('tbl04_pembelian a', 'a.KDBL=d.KDBL');
        $this->db->join('tbl04_pembelian_batal_detail b', 'd.KDBL_RET=b.KDBL_RET');
        $this->db->join('tbl04_barang c', 'b.KDBRG = c.KDBRG');
        $this->db->group_by('d.KDBL_RET,b.KDBRG');
        return $this->db->get('tbl04_pembelian_batal d')->num_rows();
    }
    function getHistoriPembelian($kode){
        $this->db->select('a.*,sum(JMLBELI) as JMLBELI,b.NMBRG');
        $this->db->where('KDBRG', $kode);
        $this->db->join('tbl04_pembelian_detail b','a.KDBL = b.KDBL');
        $this->db->group_by('a.KDBL,b.KDBRG');
        return $this->db->get('tbl04_pembelian a')->result();
    }
}
