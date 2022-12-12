<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pembelian_model extends CI_Model
{
    function cekHpp($kdbrg, $kdlokasi)
    {
        $this->db->where('a.KDLOKASI', $kdlokasi);
        $this->db->where('a.KDBRG', $kdbrg);
        $this->db->where('JSTOK >', 0);
        $this->db->join('tbl04_barang b', 'a.KDBRG = b.KDBRG');
        $this->db->order_by('HMODAL', 'DESC');
        return $this->db->get('stok_barang_fifo a')->row();
    }
    function lock($kdbl)
    {
        $this->db->select("a.KDBL,b.KDBRG,a.KDLOKASI,DATE_FORMAT(a.TGLTERIMA,'%Y-%m-%d') as TGLBELI,b.EXPDATE,b.HMODAL");
        $this->db->where('a.KDBL', $kdbl);
        $this->db->join('tbl04_pembelian_detail b', 'a.KDBL = b.KDBL');
        $row = $this->db->get('tbl04_pembelian a')->result();
        foreach ($row as $r) {
            $update = array('LOCK_STATUS' => 1);
            $this->db->where('KDBRG', $r->KDBRG);
            $this->db->where('KDLOKASI', $r->KDLOKASI);
            $this->db->where('TGLBELI', $r->TGLBELI);
            $this->db->where('TGLEXP', $r->EXPDATE);
            $this->db->where('HMODAL', $r->HMODAL);
            $this->db->update('stok_barang_fifo', $update);
        }
        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = substr(str_shuffle($permitted_chars), 0, 10);
        $lockupdate = array('LOCK_STATUS' => 1, 'LOCK_PIN' => md5($pin));
        $this->db->where('KDBL', $kdbl);
        $updated = $this->db->update('tbl04_pembelian', $lockupdate);
        return $pin;
    }

    function unlock($kdbl)
    {
        $this->db->select("a.KDBL,b.KDBRG,a.KDLOKASI,DATE_FORMAT(a.TGLTERIMA,'%Y-%m-%d') as TGLBELI,b.EXPDATE,b.HMODAL");
        $this->db->where('a.KDBL', $kdbl);
        $this->db->join('tbl04_pembelian_detail b', 'a.KDBL = b.KDBL');
        $row = $this->db->get('tbl04_pembelian a')->result();
        foreach ($row as $r) {
            $update = array('LOCK_STATUS' => 0);
            $this->db->where('KDBRG', $r->KDBRG);
            $this->db->where('KDLOKASI', $r->KDLOKASI);
            $this->db->where('TGLBELI', $r->TGLBELI);
            $this->db->where('TGLEXP', $r->EXPDATE);
            $this->db->where('HMODAL', $r->HMODAL);
            $this->db->update('stok_barang_fifo', $update);
        }
        //$permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        //$pin = substr(str_shuffle($permitted_chars), 0, 10);

        $lockupdate = array('LOCK_STATUS' => 0, 'LOCK_PIN' => '');
        $this->db->where('KDBL', $kdbl);
        $updated = $this->db->update('tbl04_pembelian', $lockupdate);
        return $updated;
    }
    function getDetailpembelian($kdbl)
    {
        $this->db->where('KDBL', $kdbl);
        return $this->db->get('tbl04_pembelian_detail')->result();
    }
    function cleartemp()
    {
        $this->db->where('UEXEC', getUserID());
        $this->db->where('SESSION_ID', getSessionID());
        $this->db->delete('tbl04_temp_pembelian');
    }
    function insertBatchTemp($data)
    {
        $this->db->insert_batch('tbl04_temp_pembelian', $data);
    }
    function cekfaktur($idx, $pin)
    {
        $this->db->where('LOCK_PIN', md5($pin));
        $this->db->where('idx', $idx);
        $this->db->join('tbl04_pembelian_detail b', 'a.KDBL = b.KDBL');
        return $this->db->get('tbl04_pembelian a')->row();
    }
    function getTempByid($idx)
    {
        $this->db->where('IDX', $idx);
        return $this->db->get('tbl04_temp_pembelian')->row();
    }
    function cekStok($KDBRG, $KDLOKASI, $TGLMASUK, $EXPDATE, $HMODAL)
    {
        $this->db->select('SUM(JSTOK) AS JSTOK');
        $this->db->where('KDBRG', $KDBRG);
        $this->db->where('KDLOKASI', $KDLOKASI);
        $this->db->where('TGLBELI', $TGLMASUK);
        $this->db->where('TGLEXP', $EXPDATE);
        $this->db->where('HMODAL', $HMODAL);
        $data = $this->db->get('stok_barang_fifo')->row();
        if (!empty($data)) return $data->JSTOK;
        else return 0;
    }

    function updateTransaksi($data, $idx)
    {
        //Update data Transaksi
        $this->db->where('IDX', $idx);
        $this->db->update('tbl04_pembelian_detail', $data);
    }
}
