<?php
class M_cetak extends CI_Model{
    function get_kartu($nomr){
        return $this->db->select('a.*,b.nama_negara,c.nama_provinsi,d.nama_kab_kota,e.nama_kecamatan,f.nama_kelurahan')
                        ->from('m_pasien a')
                        ->join('m_negara b','a.id_negara=b.id_negara','left')
                        ->join('m_provinsi c','a.id_provinsi=c.id_provinsi','left')
                        ->join('m_kab_kota d','a.id_kab_kota=d.id_kab_kota','left')
                        ->join('m_kecamatan e','a.id_kecamatan=e.id_kecamatan','left')
                        ->join('m_kelurahan f','a.id_kelurahan=f.id_kelurahan','left')
                        ->where('a.nomr',$nomr)
                        ->get()->row_array();
    }
    function get_stiker($nomr){
        return $this->db->select("a.*, YEAR(CURDATE()) - YEAR(a.tgl_lahir) AS Umur ")
                        ->from('m_pasien a')
                        ->where('a.nomr',$nomr)
                        ->get()->result();
    }
    function get_registrasi($nomr,$tglreg){
        if(!empty($tglreg)){
            $tgl    = $tglreg;
        }else{
            $tgl    = date("Y/m/d");
        }
        return $this->db->select("a.nomr,a.kir, a.grId, c.glId, b.nama as pasien, b.alamat, b.jns_kelamin as jk, c.grNama as poly, d.cara_bayar as carabayar, a.id_user as user, a.tgl_reg,a.noRujuk,b.tgl_lahir")
                        ->from('t_pendaftaran a')
                        ->join('m_pasien b','a.nomr=b.nomr')
                        ->join('group_ruang c','a.grId=c.grId')
                        ->join('m_cara_bayar d','a.id_cara_bayar=d.id_cara_bayar')
                        ->where('DATE(a.tgl_reg)',$tgl)
                        ->where('a.id_daftar',$nomr)
                        ->get()->row_array();
    }
    function get_antrian($poli,$tglreg){
        if(!empty($tglreg)){
            $tgl    = $tglreg;
        }else{
            $tgl    = date("Y/m/d");
        }
        return $this->db->select("*")
                        ->from('t_pendaftaran')
                        ->where('DATE(tgl_reg)',$tgl)
                        ->where('grId',$poli)
			->order_by('tgl_reg', 'ASC')
                        ->get()->result();
    }
    function get_suratmasukri($idx){
        return $this->db->select('i.*,a.id_admisi,a.id_daftar,date(a.tgl_masuk) as MASUK,time(a.tgl_masuk) as JAM,b.nama_negara,c.nama_provinsi,d.nama_kab_kota,e.nama_kecamatan,f.nama_kelurahan, g.agama,j.grNama,h.kir')
                        ->from('t_admissi_ranap a')
                        ->join('group_ruang j','a.grId=j.grId')
                        ->join('t_pendaftaran h','a.id_daftar=h.id_daftar')
                        ->join('m_pasien i','h.nomr=i.nomr')
                        ->join('m_negara b','i.id_negara=b.id_negara')
                        ->join('m_provinsi c','i.id_provinsi=c.id_provinsi')
                        ->join('m_kab_kota d','i.id_kab_kota=d.id_kab_kota')
                        ->join('m_kecamatan e','i.id_kecamatan=e.id_kecamatan')
                        ->join('m_kelurahan f','i.id_kelurahan=f.id_kelurahan')
                        ->join('m_agama g','i.id_agama=g.id_agama')
                        ->where('a.id_daftar',$idx)
                        ->order_by('a.tgl_masuk', 'DESC')
                        ->get()->row_array();
    }
    function get_suratmasukrj($idx){
        return $this->db->select('a.nomr,b.id_daftar,a.nama,a.tempat_lahir,a.tgl_lahir,a.jns_kelamin,j.agama,a.pekerjaan,
    a.no_ktp,a.no_telpon,a.alamat,a.id_negara,e.nama_negara,b.tgl_reg,a.no_bpjs,a.penanggung_jawab,a.no_penanggung_jawab,c.rujukan,
    f.nama_provinsi,g.nama_kab_kota,h.nama_kecamatan,i.nama_kelurahan,time(b.tgl_reg) as JAM,b.grId,k.nama_etnis,l.nama_bahasa,a.hambatan_bahasa,m.nama_tk_pddkn,a.umur_pj,a.alamat_pj,a.pekerjaan_pj,a.hub_keluarga')
                        ->from('t_pendaftaran b')
						->join('m_pasien a','a.nomr=b.nomr')
                        ->join('m_rujukan c','b.id_rujuk=c.Id_rujukan')
                        ->join('m_negara e','a.id_negara=e.id_negara')
                        ->join('m_provinsi f','a.id_provinsi=f.id_provinsi')
                        ->join('m_kab_kota g','a.id_kab_kota=g.id_kab_kota')
                        ->join('m_kecamatan h','a.id_kecamatan=h.id_kecamatan')
                        ->join('m_kelurahan i','a.id_kelurahan=i.id_kelurahan')
                        ->join('m_agama j','a.id_agama=j.id_agama')
						->join('m_etnis k','a.id_etnis=k.id_etnis','left')
						->join('m_bahasa l','a.id_bahasa=l.id_bahasa','left')
						->join('m_tk_pddkn m','a.id_tk_pddkn=m.id_tk_pddkn','left')
                        ->where('b.id_daftar',$idx)
                        ->get()->row_array();
    }
    
    function get_sep($nosep){
        return $this->db->select('a.noMr, b.nama as pasien, c.grNama as poly, a.id_daftar, a.NO_SEP as sep, a.noKartu, b.tgl_lahir, b.jns_kelamin, a.jnsPelayanan, e.tgl_reg, e.id_user, e.id_daftar, e.grId')
                        ->from('t_sep a')
                        ->join('m_pasien b','a.noMr=b.nomr')
                        ->join('t_pendaftaran e','a.id_daftar=e.id_daftar')
                        ->join('group_ruang c','e.grId=c.grId')
                        ->where('a.NO_SEP',$nosep)
                        ->get()->row_array();
    }
    // New Progress
    function get_registrasi2($noreg){
        return $this->db->select("a.nomr, a.grId, c.glId, b.nama as pasien, b.alamat, b.jns_kelamin, c.grNama as poly,d.cara_bayar as carabayar,a.id_user as user,a.tgl_reg,b.tgl_lahir,a.id_daftar")
                        ->from('t_pendaftaran a')
                        ->join('m_pasien b','a.nomr=b.nomr')
                        ->join('group_ruang c','a.grId=c.grId')
                        ->join('m_cara_bayar d','a.id_cara_bayar=d.id_cara_bayar')
                        ->where('a.id_daftar',$noreg)
                        ->get()->row_array();
    }

    function get_hasilrad($no_rad){
        return $this->db->select('a.*,b.id_cara_bayar,c.nomr,c.nama,c.tgl_lahir,c.jns_kelamin,d.nama_instansi,e.grNama,f.diagnosa_klinis')
                        ->from('t_radiologi a')
                        ->join('t_pendaftaran b','a.id_daftar=b.id_daftar')
                        ->join('m_pasien c','b.nomr=c.nomr')
                        ->join('m_instansi d','a.id_instansi=d.id_instansi')
                        ->join('group_ruang e','a.grId=e.grId','left')
                        ->join('m_diagnosa_klinis f','a.id_diagnosa=f.id_diagnosa','left')
                        ->where('a.id_tr_rad',$no_rad)
                        ->get()->row_array();
    }
}