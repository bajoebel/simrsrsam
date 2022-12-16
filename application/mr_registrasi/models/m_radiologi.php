<?php
class M_radiologi extends CI_Model{
    
    public function get_daftar() {
        $query = $this->db->query("SELECT MAX(id_tr_rad) as max_rad FROM t_radiologi"); 
        $row = $query->row_array();
        $num = $query->num_rows();
        $thn = date("Ym");
        if($num == 0){
            $no_daftar = $thn."00001";
        }else{
            $thn_sistem = substr($row['max_daftar'],0,6);
            if($thn > $thn_sistem){
                $nobaru = "1";
            }else{
                $nobaru = substr($row['max_daftar'],6,5)+1;
            }
            $max_iddaftar = sprintf("%05d",$nobaru);
            $no_daftar = $thn.$max_iddaftar;
        }
        
        return $no_daftar;
    }
    
    function get_nofoto($nofoto){
        return $this->db->select('id_tr_rad')
                        ->from('t_radiologi')
                        ->where('id_tr_rad',$nofoto);
    }
    
    function instansi(){
        return $this->db->select('*')
                        ->from('m_instansi')
                        ->get()->result();
    }
    function d_klinis(){
        return $this->db->select('*')
                        ->from('m_diagnosa_klinis')
                        ->get()->result();
    }
    function poli(){
        return $this->db->select('*')
                        ->from('group_ruang')
                        ->get()->result();
    }
    function dokter(){
        return $this->db->select('*')
                        ->from('m_dokter')
                        ->get()->result();
    }
    function bacaanFoto(){
        return $this->db->select('*')
                        ->from('m_bacaan_foto')
                        ->get()->result();
    }
    
    function list_pemeriksaan($number,$offset,$tgl,$nomr){
        $this->db->select('a.*,b.nomr,c.foto');
        $this->db->from('t_radiologi a');
        $this->db->join('t_pendaftaran b','a.id_daftar=b.id_daftar');
        $this->db->join('m_bacaan_foto c','a.id_foto=c.id_foto');
        if(!empty($tgl)) {
            $this->db->where('DATE(a.tanggal_diagnosa)',$tgl);
        }
        if(!empty($nomr)) {
            $this->db->where('b.nomr', $nomr);
        }
        $this->db->order_by('a.id_tr_rad', 'ASC');
        $this->db->limit($number,$offset);
        return $this->db->get()->result();
    }
    function jumlah_pemeriksaan($tgl,$nomr){
        $this->db->from('t_radiologi a');
        $this->db->join('t_pendaftaran b','a.id_daftar=b.id_daftar');
        if(!empty($tgl)) {
            $this->db->where('DATE(a.tanggal_diagnosa)',$tgl);
        }
        if(!empty($nomr)) {
            $this->db->where('b.nomr', $nomr);
        }
        return $this->db->count_all_results();
        
    }
    function get_rad($no_foto){
        return $this->db->select('a.*,b.id_cara_bayar,c.nomr,c.nama,c.tempat_lahir,c.tgl_lahir,c.jns_kelamin,d.nama_instansi,e.grNama,f.diagnosa_klinis')
                        ->from('t_radiologi a')
                        ->join('t_pendaftaran b','a.id_daftar=b.id_daftar')
                        ->join('m_pasien c','b.nomr=c.nomr')
                        ->join('m_instansi d','a.id_instansi=d.id_instansi')
                        ->join('group_ruang e','a.grId=e.grId','left')
                        ->join('m_diagnosa_klinis f','a.id_diagnosa=f.id_diagnosa','left')
                        ->where('a.id_tr_rad',$no_foto)
                        ->get()->row_array();
    }
    
    function rumah_sakit(){
        return $this->db->get('m_instansi')->result();
    }
    
    function diagnosa_klinis(){
        return $this->db->get('m_diagnosa_klinis')->result();
    }
}

