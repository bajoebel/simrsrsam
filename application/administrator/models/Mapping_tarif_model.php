<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Mapping_tarif_model extends CI_Model
{
    public $table = 'tbl01_layanan';
    public $key = 'idx';
    public $order = 'DESC';
    function __construct()
    {
        parent::__construct();
    }
    function getLayanan()
    {
        $this->db->order_by($this->key, $this->order);
        return $this->db->get($this->table)->result();
    }
    function getLayananlimit($limit, $start = 0, $q = NULL, $ruang = null)
    {
        //$this->db->order_by('tbl01_tarif_layanan.idx', $this->order);
        if ($ruang == "OP") {
            $this->db->select("*,tbl01_tarif_operasi.id");
            $this->db->order_by('tbl01_tarif_layanan.layanan,tbl01_tarif_layanan.kelas_id');
            $this->db->group_start();
            $this->db->like('layanan', $q);
            $this->db->or_like('kelas_layanan', $q);
            $this->db->group_end();
            $this->db->join('tbl01_tarif_layanan', 'idtarif=tbl01_tarif_layanan.idx');
            $this->db->limit($limit, $start);
            return $this->db->get('tbl01_tarif_operasi')->result();
        } else {
            $this->db->select("*,tbl01_tarif_ruang.id");
            $this->db->order_by('tbl01_tarif_layanan.layanan,tbl01_tarif_layanan.kelas_id');
            $this->db->where('idruang', $ruang);
            $this->db->group_start();
            $this->db->like('layanan', $q);
            $this->db->or_like('kelas_layanan', $q);
            $this->db->group_end();
            $this->db->join('tbl01_tarif_layanan', 'idtarif=tbl01_tarif_layanan.idx');
            $this->db->limit($limit, $start);
            return $this->db->get('tbl01_tarif_ruang')->result();
        }
    }
    function getDataLayananlimit($limit, $start = 0, $q = NULL, $ruang = null, $jenis = '')
    {
        if ($ruang == "OP") {
            $this->db->order_by('tbl01_tarif_layanan.layanan,tbl01_tarif_layanan.kelas_id');
            $this->db->where('jns_layanan', $jenis);
            $this->db->where("idx NOT IN (SELECT idtarif FROM tbl01_tarif_operasi)");
            $this->db->group_start();
            $this->db->like('layanan', $q);
            $this->db->or_like('kelas_layanan', $q);
            $this->db->group_end();
            $this->db->limit($limit, $start);
            return $this->db->get('tbl01_tarif_layanan')->result();
        } else {
            $this->db->order_by('tbl01_tarif_layanan.layanan,tbl01_tarif_layanan.kelas_id');
            $this->db->where('jns_layanan', $jenis);
            $this->db->where("idx NOT IN (SELECT idtarif FROM tbl01_tarif_ruang WHERE idruang=$ruang)");
            $this->db->group_start();
            $this->db->like('layanan', $q);
            $this->db->or_like('kelas_layanan', $q);
            $this->db->group_end();
            $this->db->limit($limit, $start);
            return $this->db->get('tbl01_tarif_layanan')->result();
        }
    }
    function mapTarif($idtarif, $idruang)
    {
        $this->db->where('idx', $idtarif);
        $row = $this->db->get('tbl01_tarif_layanan')->row();
        if (!empty($row)) {
            if($idruang=="OP"){
                $data = array( 'idtarif' => $row->idx, 'idlayanan' => $row->idxlayanan);
                $this->db->insert('tbl01_tarif_ruang', $data);
                $insert_id = $this->db->insert_id();
                if($insert_id) return true;
                else return false;
            }else{
                $data = array('idruang' => $idruang, 'idtarif' => $row->idx, 'idlayanan' => $row->idxlayanan);
                $this->db->insert('tbl01_tarif_ruang', $data);
                $insert_id = $this->db->insert_id();
                if ($insert_id) return true;
                else return false;
            }
            
        } else {
            return false;
        }
    }
    function countLayanan($q = NULL, $ruang = NULL)
    {
        if ($ruang == "OP") {
            $this->db->where("idx NOT IN (SELECT idtarif FROM tbl01_tarif_operasi)");
            $this->db->group_start();
            $this->db->like('layanan', $q);
            $this->db->or_like('kelas_layanan', $q);
            $this->db->group_end();
            return $this->db->get('tbl01_tarif_layanan')->num_rows();
        } else {
            $this->db->where('idruang', $ruang);
            $this->db->group_start();
            $this->db->like('layanan', $q);
            $this->db->or_like('kelas_layanan', $q);
            $this->db->group_end();
            $this->db->join('tbl01_tarif_layanan', 'idtarif=tbl01_tarif_layanan.idx');
            return $this->db->get('tbl01_tarif_ruang')->num_rows();
        }
    }

    function countDataLayanan($q = NULL, $ruang = NULL, $jenis = "")
    {
        if ($ruang == "OP") {
            $this->db->where("idx NOT IN (SELECT idtarif FROM tbl01_tarif_operasi)");
            $this->db->group_start();
            $this->db->like('layanan', $q);
            $this->db->or_like('kelas_layanan', $q);
            $this->db->group_end();
            return $this->db->get('tbl01_tarif_layanan')->num_rows();
        } else {
            $this->db->where('jns_layanan', $jenis);
            $this->db->where("idx NOT IN (SELECT idtarif FROM tbl01_tarif_ruang WHERE idruang=$ruang)");
            $this->db->group_start();
            $this->db->like('layanan', $q);
            $this->db->or_like('kelas_layanan', $q);
            $this->db->group_end();
            return $this->db->get('tbl01_tarif_layanan')->num_rows();
        }
    }
    function getKategori()
    {
        return $this->db->get('tbl01_kategori_tarif')->result();
    }
    function getRuang()
    {
        $this->db->where('status_ruang', 1);
        return $this->db->get('tbl01_ruang')->result();
    }

    public function insertLayanan($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function deleteLayanan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl01_tarif_ruang');
    }
    public function deleteLayananoperasi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl01_tarif_operasi');
    }
    public function getMapping_tarif_by_id($id)
    {
        $this->db->where($this->key, $id);
        return $this->db->get($this->table)->row();
    }
    function updateLayanan($data, $id)
    {
        $this->db->where($this->key, $id);
        $this->db->update($this->table, $data);
    }
}
