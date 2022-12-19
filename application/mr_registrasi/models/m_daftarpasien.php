<?php
class M_daftarpasien extends CI_Model{
    public function get_nomr() {
        $query = $this->db->query("SELECT MAX(nomr) as max_nomr FROM m_pasien"); 
        $row = $query->row_array();
        $max_nomr = $row['max_nomr']; 
        $max_nomr1 =(int) substr($max_nomr,0,6);
        $kode_nomr = $max_nomr1 +1;
        $maxkode_nomr = sprintf("%06s",$kode_nomr);
        return $maxkode_nomr;
    }
    
    public function get_daftar() {
        if(date("Y") == '2017'){
            $query = $this->db->query("SELECT MAX(id_daftar) as max_daftar FROM t_pendaftaran"); 
            $row = $query->row_array();
            $max_daftar = $row['max_daftar']; 
            $max_daftar1 =(int) substr($max_daftar,5,5);
            $iddaftar = $max_daftar1 +1;
            $max_iddaftar = sprintf("%05s",$iddaftar);
            $tahun = date("Y");
            $no_daftar = $tahun."-".$max_iddaftar;
        }else{
            $query = $this->db->query("SELECT MAX(id_daftar) as max_daftar FROM t_pendaftaran"); 
            $row = $query->row_array();
            $num = $query->num_rows();
            $thn = date("Y");
            $kode= substr($row['max_daftar'],0,5);
            if($num == 0 || $kode == $thn."-"){
                $no_daftar = $thn."000001";
            }else{
                $thn_sistem = substr($row['max_daftar'],0,4);
                if($thn > $thn_sistem){
                    $nobaru = "1";
                }else{
                    $nobaru = substr($row['max_daftar'],4,6)+1;
                }
                $max_iddaftar = sprintf("%06d",$nobaru);
                $no_daftar = $thn.$max_iddaftar;
            }
        }
        
        return $no_daftar;
    }
    
    public function get_daftarranap() {
        if(date("Y") == '2017'){
            $query = $this->db->query("SELECT MAX(id_admisi) as max_daftar FROM t_admissi_ranap"); 
            $row = $query->row_array();
            $max_daftar = $row['max_daftar']; 
            $max_daftar1 =(int) substr($max_daftar,3,5);
            $iddaftar = $max_daftar1 +1;
            $max_iddaftar = sprintf("%05s",$iddaftar);
            $code = "RI";
            $no_daftar = $code."-".$max_iddaftar;
        }else{
            $query = $this->db->query("SELECT MAX(id_admisi) as max_daftar FROM t_admissi_ranap"); 
            $row = $query->row_array();
            $num = $query->num_rows();
            $thn = date("y");
            $kode= substr($row['max_daftar'],0,3);
            if($num == 0 || $kode == "RI-"){
                $no_daftar = "RI".$thn."00001";
            }else{
                $thn_sistem = substr($row['max_daftar'],2,2);
                if($thn > $thn_sistem){
                    $nobaru = "1";
                }else{
                    $nobaru = substr($row['max_daftar'],4,5)+1;
                }
                $max_iddaftar = sprintf("%05d",$nobaru);
                $no_daftar = "RI".$thn.$max_iddaftar;
            }
        }
        
        return $no_daftar;
    }
    
    function get_cetak($daftar){
        return $this->db->select('a.id_daftar,a.nomr,b.nama,b.tempat_lahir,b.tgl_lahir,a.tgl_reg,a.id_user,c.grId,c.grNama,c.glId')
                        ->from('t_pendaftaran a')
                        ->join('m_pasien b','a.nomr=b.nomr')
                        ->join('group_ruang c','a.grId=c.grId')
                        ->where('a.id_daftar',$daftar)
                        ->get()->row_array();
    }
    
    function get_pasien($nomr){
        return $this->db->select('a.*,b.nama_negara,c.nama_provinsi,d.nama_kab_kota,e.nama_kecamatan,f.nama_kelurahan,g.agama')
                        ->from('m_pasien a')
                        ->join('m_negara b','a.id_negara=b.id_negara','left')
                        ->join('m_provinsi c','a.id_provinsi=c.id_provinsi','left')
                        ->join('m_kab_kota d','a.id_kab_kota=d.id_kab_kota','left')
                        ->join('m_kecamatan e','a.id_kecamatan=e.id_kecamatan','left')
                        ->join('m_kelurahan f','a.id_kelurahan=f.id_kelurahan','left')
                        ->join('m_agama g','a.id_agama=g.id_agama','left')
                        ->where('nomr',$nomr);
    }
    
    function get_kunjungan($iddaftar){
        return $this->db->select('a.nomr,a.no_telpon,a.nama,a.jns_kelamin,a.tempat_lahir,a.tgl_lahir,a.alamat,a.no_bpjs,b.status_daftar,b.id_daftar,b.tgl_reg,b.grId,c.grNama,c.glId,d.cara_bayar,b.id_user,e.gr_mapping')
                        ->from('t_pendaftaran b')
                        ->join('m_pasien a','a.nomr=b.nomr')
                        ->join('group_ruang c','b.grId=c.grId')
                        ->join('m_cara_bayar d','b.id_cara_bayar=d.id_cara_bayar')
                        ->join('m_ruang_mapping e','b.grId=e.grId','left')
                        ->where('id_daftar',$iddaftar);
    }
    
    function get_rawat($idadmisi){
        return $this->db->select('a.*,b.nomr,c.nama,c.jns_kelamin,c.tempat_lahir,c.tgl_lahir,e.cara_bayar,d.grNama,f.nama_kelas,g.nama_kamar,h.no_bed')
                        ->from('t_admissi_ranap a')
                        ->join('t_pendaftaran b','a.id_daftar=b.id_daftar')
                        ->join('m_pasien c','b.nomr=c.nomr')
                        ->join('group_ruang d','a.grId=d.grId')
                        ->join('m_cara_bayar e','b.id_cara_bayar=e.id_cara_bayar')
			->join('m_kelas_rawat f','a.kode_kelas=f.kode_kelas','LEFT')
			->join('m_kamar g','a.id_kamar=g.id_kamar','LEFT')
			->join('m_detail_tt h','a.id_tt=h.id_tt','LEFT')
                        ->where('a.id_admisi',$idadmisi);
    }
    
    function list_datapasien($number,$offset,$nama,$nomr,$tgll){
        $this->db->select('nomr,nama,tgl_lahir,alamat,jns_kelamin,tgl_daftar');
        $this->db->from('m_pasien');
        if(!empty($nama)) {
            $this->db->like('nama', $nama);
        }
        if(!empty($nomr)) {
            $this->db->where('nomr', $nomr);
        }
        if(!empty($tgll)) {
            $this->db->where('tgl_lahir', $tgll);
        }
        $this->db->order_by('nomr', 'DESC');
        $this->db->limit($number,$offset);
        return $this->db->get()->result();
    }
    
    function jumlah_data($nama,$nomr,$tgll){
        $this->db->from('m_pasien');
        if(!empty($nama)) {
            $this->db->like('nama', $nama);
        }
        if(!empty($nomr)) {
            $this->db->where('nomr', $nomr);
        }
        if(!empty($tgll)) {
            $this->db->where('tgl_lahir', $tgll);
        }
        return $this->db->count_all_results();
    }

    function list_datadpo($number,$offset,$nomr){
        $this->db->select('*');
        $this->db->from('m_dpo_rs');
        if(!empty($nomr)) {
            $this->db->where('nomr', $nomr);
        }
        $this->db->order_by('tgl_entri_dpo', 'DESC');
        $this->db->limit($number,$offset);
        return $this->db->get()->result();
    }
	
    function jumlah_dpo($nomr){
        $this->db->from('m_dpo_rs');
        if(!empty($nomr)) {
            $this->db->where('nomr', $nomr);
        }
        return $this->db->count_all_results();
    }
    
    function list_datasep($nosep){
        $this->db->select('NO_SEP,id_daftar,jnsPelayanan');
        $this->db->from('t_sep');
        $this->db->where('NO_SEP', $nosep);
        return $this->db->get();
    }
    
    function list_kunjungan($number,$offset,$tgl,$nomr,$poli){
        $this->db->select('a.id_daftar,a.nomr,a.tgl_reg,a.grId,a.status_daftar,c.grNama,c.glId');
        $this->db->from('t_pendaftaran a');
        $this->db->join('group_ruang c','a.grId=c.grId');
        if(!empty($tgl)) {
            $this->db->where('DATE(a.tgl_reg)',$tgl);
        }
        if(!empty($nomr)) {
            $this->db->where('a.nomr', $nomr);
        }
        if(!empty($poli)) {
            $this->db->where('a.grId', $poli);
        }
        $this->db->order_by('a.id_daftar', 'ASC');
        $this->db->limit($number,$offset);
        return $this->db->get()->result();
    }
    function jumlah_kunjungan($tgl,$nomr,$poli){
        $this->db->from('t_pendaftaran');
        if(!empty($tgl)) {
            $this->db->where('DATE(tgl_reg)',$tgl);
        }
        if(!empty($nomr)) {
            $this->db->where('nomr', $nomr);
        }
        if(!empty($poli)) {
            $this->db->where('grId', $poli);
        }
        return $this->db->count_all_results();
        
    }
    
    function list_rawat($number,$offset,$tgl,$nomr,$ruang){
         $this->db->select('a.*,b.nomr,b.id_rujuk,c.grNama,c.glId,d.nama_dokter');
        $this->db->from('t_admissi_ranap a');
        $this->db->join('t_pendaftaran b','a.id_daftar=b.id_daftar','LEFT');
        $this->db->join('group_ruang c','a.grId=c.grId','LEFT');
		$this->db->join('m_dokter d','a.DPJP=d.id_dokter','LEFT');
        if(!empty($tgl)) {
            $this->db->where('DATE(a.tgl_masuk)',$tgl);
        }
        if(!empty($nomr)) {
            $this->db->where('b.nomr', $nomr);
        }
        if(!empty($ruang)) {
            $this->db->where('a.grId', $ruang);
        }
        $this->db->order_by('a.id_admisi', 'ASC');
        $this->db->limit($number,$offset);
        return $this->db->get()->result();
    }
    function jumlah_rawat($tgl,$nomr,$ruang){
        $this->db->from('t_admissi_ranap a');
        $this->db->join('t_pendaftaran b','a.id_daftar=b.id_daftar');
        if(!empty($tgl)) {
            $this->db->where('DATE(a.tgl_masuk)',$tgl);
        }
        if(!empty($nomr)) {
            $this->db->where('b.nomr', $nomr);
        }
        if(!empty($ruang)) {
            $this->db->where('a.grId', $ruang);
        }
        return $this->db->count_all_results();
        
    }
    function list_rawatruang($number,$offset,$nomr,$ruang){
        $this->db->select('a.*,c.grNama,c.glId');
        $this->db->from('t_admissi_ranap a');
        $this->db->join('group_ruang c','a.grId=c.grId');
        if(!empty($nomr)) {
            $this->db->where('a.nomr', $nomr);
        }
        if(!empty($ruang)) {
            $this->db->where('a.grId', $ruang);
        }
	$this->db->where('a.status_ranap', '0');
	$this->db->where('a.id_tt !=', '');
        $this->db->order_by('a.id_admisi', 'ASC');
        $this->db->limit($number,$offset);
        return $this->db->get()->result();
    }
	function jumlah_rawatruang($nomr,$ruang){
        $this->db->from('t_admissi_ranap a');
        if(!empty($nomr)) {
            $this->db->where('a.nomr', $nomr);
        }
        if(!empty($ruang)) {
            $this->db->where('a.grId', $ruang);
        }
	$this->db->where('a.status_ranap', '0');
	$this->db->where('a.id_tt !=', '');
        return $this->db->count_all_results();
        
    }
    function list_riwayatsep($nopeserta){
        $this->db->select('a.*,b.grNama,c.jenis_penyakit');
        $this->db->from('t_sep a');
        $this->db->join('group_ruang b','a.poliTujuan=b.grId','LEFT');
        $this->db->join('icd c','a.diagAwal=c.icd_code','LEFT');
        $this->db->where('a.noKartu', $nopeserta);
        $this->db->order_by('a.tglSep', 'DESC');
        $this->db->limit(10);
        return $this->db->get();
    }
    
    function list_riwayatrj($nomr){
        $this->db->select('a.*,c.grNama,c.glId');
        $this->db->from('t_pendaftaran a');
        $this->db->join('group_ruang c','a.grId=c.grId');
        if(!empty($nomr)) {
            $this->db->where('a.nomr', $nomr);
            $this->db->where_in('a.status_daftar', array('0','2'));
        }
        $this->db->order_by('a.id_daftar', 'DESC');
        return $this->db->get();
    }
    
    function list_riwayatri($nomr){
        $this->db->select('a.*,b.nomr,b.id_cara_bayar,c.grNama,c.glId');
        $this->db->from('t_admissi_ranap a');
        $this->db->join('t_pendaftaran b','a.id_daftar=b.id_daftar');
        $this->db->join('group_ruang c','a.grId=c.grId');
        $this->db->where('b.nomr', $nomr);
        $this->db->where('a.status_ranap !=','1');
        $this->db->order_by('a.id_admisi', 'ASC');
        return $this->db->get();
    }
    
    function negara(){
        return $this->db->get('m_negara')->result();
    }
    function provinsi(){
        return $this->db->get('m_provinsi')->result();
    }
    function agama(){
        return $this->db->get('m_agama')->result();
    }
	function etnis(){
        return $this->db->get('m_etnis')->result();
    }
	function bahasa(){
        return $this->db->get('m_bahasa')->result();
    }
	function pendidikan(){
        return $this->db->get('m_tk_pddkn')->result();
    }
    function poly(){
        return $this->db->select('*')
                        ->from('group_ruang')
                        ->where('glId',"GL002")
                        ->or_where('glId',"GL003")
                        ->get()->result();
    }
    function ruang(){
        return $this->db->select('*')
                        ->from('group_ruang')
                        ->where('glId',"GL001")
                        ->get()->result();
    }
	function kelas_rawat(){
        return $this->db->select('*')
                        ->from('m_kelas_rawat')
                        ->get()->result();
    }
    function dokter(){
        return $this->db->select('*')
                        ->from('m_dokter')
                        ->get()->result();
    }
    function rujukan(){
        return $this->db->select('*')
                        ->from('m_rujukan')
                        ->order_by('rujukan', 'ASC')
                        ->get()->result();
    }
    
    function get_diagnosa(){
        return $this->db->select('icd_code,jenis_penyakit')
                        ->from('icd');
    }
    
    function get_modalkunjungan($noreg){
        return $this->db->select('id_daftar,nomr,grId,date(tgl_reg) as tgl')
                        ->from('t_pendaftaran')
                        ->where('id_daftar',$noreg)
                        ->get()->row_array();
    }
    
    function get_ceknoregri($nomr){
        return $this->db->select('a.id_daftar,a.tgl_masuk as tgl_reg,c.grNama')
                        ->from('t_admissi_ranap a')
                        ->join('t_pendaftaran b','a.id_daftar=b.id_daftar')
                        ->join('group_ruang c','a.grId=c.grId')
                        ->where('b.nomr',$nomr)
                        ->order_by('a.id_admisi', 'DESC')
                        ->limit(50)->get();
    }
    
    function get_ceknoregrj($nomr){
        return $this->db->select('a.id_daftar,a.grId,a.tgl_reg,b.grNama')
                        ->from('t_pendaftaran a')
                        ->join('group_ruang b','a.grId=b.grId','left')
                        ->where('a.nomr',$nomr)
                        ->order_by('id_daftar', 'DESC')
                        ->limit(50)->get();
    }
    
    function get_cekdpo($nobpjs){
        return $this->db->from('m_dpo')
                        ->where('no_kartu',$nobpjs)->get();
    }
    
    function get_cekdaftar($nomr,$tglreg,$tujuan){
        return $this->db->select('id_daftar,grId,tgl_reg,nomr')
                        ->from('t_pendaftaran')
                        ->where('nomr',$nomr)
                        ->where('DATE(tgl_reg)',$tglreg)
						->where('status_daftar',0)
						->where('grId !=','GR022')
                        ->where('grId',$tujuan)->get();
    }
    
    function get_cekrujuk($nomr,$norujuk){
        return $this->db->select('*')
                        ->from('t_pendaftaran')
                        ->where('nomr',$nomr)
						->where('status_daftar !=',1)
                        ->where('id_daftar',$norujuk)->get();
    }
	
    function getCeksep($nosep){
        return $this->db->select('*')
                        ->from('t_sep')
                        ->where('NO_SEP',$nosep);
    }
	
   function get_dataadmissi($admissi){
        return $this->db->select('*')
                        ->from('t_admissi_ranap')
                        ->where('id_admisi',$admissi)->get();
    }
    function list_jadwaldokter($number,$offset,$poli){
        $this->db->select('a.*,b.grNama');
        $this->db->from('m_dokter a');
        $this->db->join('group_ruang b','a.kode_ruang=b.grId');
        if(!empty($poli)) {
            $this->db->where('a.kode_ruang', $poli);
        }
        $this->db->order_by('a.kode_ruang', 'ASC');
        $this->db->limit($number,$offset);
        return $this->db->get()->result();
    }
    function jumlah_jadwal($poli){
        $this->db->from('m_dokter');
        if(!empty($poli)) {
            $this->db->where('kode_ruang', $poli);
        }
        return $this->db->count_all_results();
    }
}