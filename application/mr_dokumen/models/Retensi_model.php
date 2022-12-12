<?php
class Retensi_model extends CI_Model{
    function getPoly(){
        $this->db->where_not_in('grid',array('2'));
        return $this->db->get('tbl01_ruang')->result();
    }
    function getPasien($nomr){
        $this->db->where('nomr', $nomr);
        return $this->db->get('tbl01_pasien')->row();
    }
    function cekRetensi($nomr){
        $this->db->where('nomr', $nomr);
        $retensi=$this->db->get('tbl06_retensi');
        return $retensi;
    }

    function getRetensi($limit, $start = 0, $q = NULL) {
        $this->db->order_by('idx', 'DESC');
        $this->db->like('nomr', $q);
                $this->db->or_like('nama_pasien', $q);
                $this->db->or_like('tanggal_terakhir_berobat', $q);
                $this->db->or_like('grNama', $q);
                $this->db->or_like('rawat_terakhir', $q);
                $this->db->or_like('diagnosa', $q);
        $this->db->limit($limit, $start);
        return $this->db->get('tbl06_retensi')->result();
    }
    function countRetensi($q = NULL) {
        $this->db->like('nomr', $q);
                $this->db->or_like('nama_pasien', $q);
                $this->db->or_like('tanggal_terakhir_berobat', $q);
                $this->db->or_like('grNama', $q);
                $this->db->or_like('rawat_terakhir', $q);
                $this->db->or_like('diagnosa', $q);
        return $this->db->get('tbl06_retensi')->num_rows();
    }function get_wilayah($q="",$param="",$start=0,$limit=1){
        if(empty($param)){
            $this->db->like('desa', $q);
            $this->db->or_like('kecamatan',$q);
            $this->db->or_like('kabkota',$q);
            $this->db->or_like('nama_kabkota',$q);
        }else{
            $this->db->like($param,$q);
        }
        
        $this->db->order_by('provinsi');
        $this->db->limit($limit, $start);
        return $this->db->get('tbl01_wilayah')->result();
    }

    function count_wilayah($q="", $param=""){
        if(empty($param)){
            $this->db->like('desa', $q);
            $this->db->or_like('kecamatan',$q);
            $this->db->or_like('kabkota',$q);
            $this->db->or_like('nama_kabkota',$q);
        }else{
            $this->db->like($param,$q);
        }
        
        $this->db->order_by('provinsi');
        return $this->db->get('tbl01_wilayah')->num_rows();
    }


    function getImport($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by('idx', 'DESC');
        $this->db->like('nomr', $q);
        $this->db->or_like('id_daftar', $q);
        $this->db->or_like('reg_unit', $q);
        $this->db->or_like('nama_pasien', $q);
        $this->db->or_like('nama_ruang', $q);
        $this->db->limit($limit, $start);
        return $this->db->get('tbl02_pendaftaran_new')->result();
    }
    function countImport($q = NULL)
    {
        $this->db->like('nomr', $q);
        $this->db->or_like('id_daftar', $q);
        $this->db->or_like('reg_unit', $q);
        $this->db->or_like('nama_pasien', $q);
        $this->db->or_like('nama_ruang', $q);
        return $this->db->get('tbl02_pendaftaran_new')->num_rows();
    }
}