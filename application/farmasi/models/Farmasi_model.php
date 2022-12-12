<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Farmasi_model extends CI_Model
{

    function getTempbeli($uexec, $session_id)
    {
        $this->db->where('UEXEC', $uexec);
        $this->db->where('SESSION_ID', $session_id);
        return $this->db->get('tbl04_temp_pembelian')->result();
    }

    function getTotalTempbeli($uexec, $session_id)
    {
        $SQL = "SELECT IFNULL(SUM(HBELI * JMLBELI),0) AS TOTFAKTUR,
        IFNULL(SUM(HDISKON),0) AS TOTDISKON_ITEM,
        IFNULL(SUM(SUBTOTAL),0) AS TOTFAKTUR_NETTO
        FROM tbl04_temp_pembelian WHERE UEXEC = '$uexec'";
        $cek = $this->db->query("$SQL");
        if ($cek->num_rows() > 0) {
            $x = $cek->row_array();
            $params = array(
                'TOTFAKTUR' => $x['TOTFAKTUR'],
                'TOTDISKON_ITEM' => $x['TOTDISKON_ITEM'],
                'TOTFAKTUR_NETTO' => $x['TOTFAKTUR_NETTO']
            );
        } else {
            $params = array(
                'TOTFAKTUR' => 0,
                'TOTDISKON_ITEM' => 0,
                'TOTFAKTUR_NETTO' => 0
            );
        }
        return $params;
    }

    function getField($nama_field, $nama_tabel, $parameter_field, $parameter_value)
    {
        $this->db->select($nama_field);
        $this->db->where($parameter_field, $parameter_value);
        $row = $this->db->get($nama_tabel)->row();
        if (empty($row)) return "";
        else return $row->$nama_field;
    }
    function getListBarangByAp($KDJL, $AP)
    {
        $this->db->where('KDJL', $KDJL);
        $this->db->where('AP', $AP);
        return $this->db->get('tbl04_penjualan_detail')->result();
    }
}
