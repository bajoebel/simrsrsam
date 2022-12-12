<?php
class Rekapitulasi_model extends CI_Model{
    function data_kunjungan_pertanggal1($dari, $sampai,$group="", $urut=""){
        if(empty($group)){
            $order= "DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d')";
            $SQL="SELECT DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') AS tgl_reg, COUNT(idx) AS jml_kunjungan FROM `tbl02_pendaftaran` 
            WHERE `tgl_masuk` >= '$dari' AND `tgl_masuk` <= '$sampai' AND (jns_layanan='RJ' OR jns_layanan='GD')  GROUP BY DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d')";
            if(!empty($urut)) $SQL .= "ORDER tgl_reg BY $order $urut";
            return $this->db->query($SQL)->result();
        }elseif($group=="jenis"){
            //echo "JENIS";
            //if(!empty($order)) $this->db->order_by($order,$urut);
            $SQL="SELECT 
                tgl_daftar, 
                (SELECT COUNT(id_daftar) FROM t_pendaftaran WHERE t_pendaftaran.tgl_reg=m_pasien.tgl_daftar) as pasien_baru,
                (SELECT COUNT(id_daftar) FROM t_pendaftaran JOIN group_ruang ON t_pendaftaran.grId=group_ruang.grId WHERE DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d')=m_pasien.tgl_daftar AND (glId='GL002' OR glId='GL003')) AS jml_kunjungan 
                FROM m_pasien 
                LEFT JOIN t_pendaftaran ON t_pendaftaran.nomr=m_pasien.nomr 
                JOIN group_ruang ON t_pendaftaran.grId=group_ruang.grId 
                WHERE tgl_daftar >= '$dari' AND tgl_daftar <= '$sampai'  AND (glId='GL002' OR glId='GL003')  
                GROUP BY tgl_daftar ";
            if(!empty($urut)) $SQL .= "ORDER BY tgl_daftar $urut";
            return $this->db->query($SQL)->result();
        }elseif($group=="poly"){
            //$poly=$this->get_poly();
            $field="";
            $tgl_mulai=date_create($dari);
            $tgl_sampai=date_create($sampai);
            $diff=date_diff($tgl_mulai,$tgl_sampai);
            $sub_query="(SELECT COUNT(id_daftar) FROM t_pendaftaran WHERE t_pendaftaran.grId = group_ruang.grId AND DATE_FORMAT(tgl_reg,'%Y-%m-%d')='" .date_format($tgl_mulai,'Y-m-d') ."') AS '" .date_format($tgl_mulai,'Y-m-d') ."'";

            if($tgl_mulai!=$tgl_sampai) $sub_query.=",";
            for ($i=0; $i < $diff->days; $i++) { 
                date_add($tgl_mulai,date_interval_create_from_date_string("1 days"));
                $sub_query.="(SELECT COUNT(id_daftar) FROM t_pendaftaran WHERE t_pendaftaran.grId = group_ruang.grId AND DATE_FORMAT(tgl_reg,'%Y-%m-%d')='" .date_format($tgl_mulai,'Y-m-d') ."') AS '" .date_format($tgl_mulai,'Y-m-d') ."'";
                if($diff->days-1!=$i) $sub_query.=",";
                //$header_tgl.="<th>" .$this->rekapitulasi_model->format_indo(date_format($tgl_mulai,'Y-m-d')) ."</th>";
            }
            /*foreach ($poly as $p) {
                $field ."(SELECT count(id_daftar) FROM t_pendaftaran WHERE )";
            }*/
            $SQL="SELECT grNama, $sub_query FROM group_ruang WHERE glId='GL002' OR glId='GL003'";
            return $this->db->query($SQL)->result();
            //RSUD_PP@PL-LT22018
        }elseif($group=="carabayar"){
            $sub_query="";
            $carabayar=$this->get_carabayar();
            foreach ($carabayar as $c) {
                $sub_query.="(SELECT count(id_daftar) FROM t_pendaftaran WHERE DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') =DATE_FORMAT(tgl_kunjungan, '%Y-%m-%d') AND id_cara_bayar='" .$c->id_cara_bayar ."' ) as " ."COL_" .$c->id_cara_bayar .",";
            }
            //$SQL="SELECT tgl_daftar,COUNT(id_daftar) as jml_kunjungan";
            $SQL="SELECT DATE_FORMAT(t_pendaftaran.tgl_reg, '%Y-%m-%d') AS tgl_kunjungan, $sub_query DATE_FORMAT(tgl_reg, '%d %M %Y') as tgl_reg
            FROM (`t_pendaftaran`) JOIN group_ruang ON t_pendaftaran.grId=group_ruang.grId JOIN m_cara_bayar ON t_pendaftaran.id_cara_bayar=m_cara_bayar.id_cara_bayar WHERE `tgl_reg` >= '$dari' AND `tgl_reg` <= '$sampai' AND (glId='GL002' OR glId='GL003')GROUP BY  DATE_FORMAT(tgl_reg, '%d %M %Y') ORDER BY tgl_reg ";
            return $this->db->query($SQL)->result();
        }
    }

    function data_kunjungan_pertanggal_old($dari, $sampai,$group="", $urut=""){
        if(empty($group)){
            $this->db->where_in('jns_layanan',array('RJ','GD'));
            $this->db->where('tgl_masuk >=', $dari);
            $this->db->where('tgl_masuk <=', $sampai);
            $this->db->select("DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') AS tgl_reg, COUNT(idx) AS jml_kunjungan ");
            $this->db->group_by('stat_tgl');
            return $this->db->get('statistik_kunjungan')->result();
        }elseif($group=="jenis"){
            $this->db->join('group_ruang','stat_grId=grId');
            $this->db->select("stat_tgl as tgl_reg, sum(stat_baru) as pasien_baru, sum(stat_lama) as pasien_lama,sum(stat_jml) as jml_kunjungan");
            //$this->db->where('glId','GL002');
            //$this->db->or_where('glId','GL003');
            $this->db->where("(glId='GL002' OR glId='GL003')",null);
            $this->db->where('stat_tgl >=', $dari);
            $this->db->where('stat_tgl <=', $sampai);
            $this->db->group_by('stat_tgl');
            return $this->db->get('statistik_kunjungan')->result();

        }elseif($group=="poly"){
            //$poly=$this->get_poly();
            /*$field="";
            $tgl_mulai=date_create($dari);
            $tgl_sampai=date_create($sampai);
            $diff=date_diff($tgl_mulai,$tgl_sampai);
            $sub_query="(SELECT COUNT(id_daftar) FROM t_pendaftaran WHERE t_pendaftaran.grId = group_ruang.grId AND DATE_FORMAT(tgl_reg,'%Y-%m-%d')='" .date_format($tgl_mulai,'Y-m-d') ."') AS '" .date_format($tgl_mulai,'Y-m-d') ."'";

            if($tgl_mulai!=$tgl_sampai) $sub_query.=",";
            for ($i=0; $i < $diff->days; $i++) { 
                date_add($tgl_mulai,date_interval_create_from_date_string("1 days"));
                $sub_query.="(SELECT sum(stat_jml) FROM statistik_kunjungan WHERE stat_grId = group_ruang.grId AND stat_tgl='" .date_format($tgl_mulai,'Y-m-d') ."') AS '" .date_format($tgl_mulai,'Y-m-d') ."'";
                if($diff->days-1!=$i) $sub_query.=",";
            }
            
            $SQL="SELECT grNama, $sub_query FROM group_ruang WHERE glId='GL002' OR glId='GL003'";
            return $this->db->query($SQL)->result();
            $group_ruang=$this->getRuangrj();*/
            $header=$this->getRuangrj();
            $sub_query="";
            foreach ($header as $h) {
                $grId=$h->grId;
                //$sub_query="(SELECT SUM(a.stat_jml) FROM statistik_kunjungan a WHERE a.stat_tgl = b.stat_tgl)";
                $sub_query.="(SELECT SUM(c.stat_jml) FROM statistik_kunjungan c WHERE c.stat_tgl=a.stat_tgl AND c.stat_grId='$grId') AS $grId ,";
            }
            $this->db->select("$sub_query,stat_tgl");
            //$this->db->select('stat_tgl, grId,grNama,sum(stat_jml) as jml_kunjungan');
            $this->db->join('group_ruang b','a.stat_grId=b.grId');
            //$this->db->where('glId','GL002');
            //$this->db->or_where('glId','GL003');
            $this->db->where("(glId='GL002' OR glId='GL003')",null);
            $this->db->where('stat_tgl >=', $dari);
            $this->db->where('stat_tgl <=', $sampai);
            $this->db->group_by('stat_tgl');
            //$this->db->group_by('stat_grId');
            return $this->db->get('statistik_kunjungan a')->result();
            //RSUD_PP@PL-LT22018
        }elseif($group=="carabayar"){
            $sub_query="";
            $carabayar=$this->get_carabayar();
            foreach ($carabayar as $c) {
                $carabayar=$c->id_cara_bayar;
                //$sub_query.="(SELECT count(id_daftar) FROM t_pendaftaran WHERE DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') =DATE_FORMAT(tgl_kunjungan, '%Y-%m-%d') AND id_cara_bayar='" .$c->id_cara_bayar ."' ) as " ."COL_" .$c->id_cara_bayar .",";
                $sub_query.="(SELECT SUM(c.stat_jml) FROM statistik_kunjungan c JOIN group_ruang d ON c.stat_grId=d.grId WHERE c.stat_tgl=a.stat_tgl AND c.stat_carabayar='$carabayar' AND (d.glId='GL002' OR d.glId='GL003')) AS COL_$carabayar ,";
            }

            $this->db->select("$sub_query,a.stat_tgl as tgl_daftar");
            //$this->db->select('stat_tgl, grId,grNama,sum(stat_jml) as jml_kunjungan');
            $this->db->join('group_ruang b','a.stat_grId=b.grId');
            //$this->db->where('glId','GL002');
            //$this->db->or_where('glId','GL003');
            $this->db->where("(glId='GL002' OR glId='GL003')",null);
            $this->db->where('stat_tgl >=', $dari);
            $this->db->where('stat_tgl <=', $sampai);
            $this->db->group_by('stat_tgl');
            //$this->db->group_by('stat_grId');
            return $this->db->get('statistik_kunjungan a')->result();

            //$SQL="SELECT tgl_daftar,COUNT(id_daftar) as jml_kunjungan";
            /*$SQL="SELECT DATE_FORMAT(t_pendaftaran.tgl_reg, '%Y-%m-%d') AS tgl_kunjungan, $sub_query DATE_FORMAT(tgl_reg, '%d %M %Y') as tgl_reg
            FROM (`t_pendaftaran`) JOIN group_ruang ON t_pendaftaran.grId=group_ruang.grId JOIN m_cara_bayar ON t_pendaftaran.id_cara_bayar=m_cara_bayar.id_cara_bayar WHERE `tgl_reg` >= '$dari' AND `tgl_reg` <= '$sampai' AND (glId='GL002' OR glId='GL003')GROUP BY  DATE_FORMAT(tgl_reg, '%d %M %Y') ORDER BY tgl_reg ";
            return $this->db->query($SQL)->result();*/
        }
    }
    function data_kunjungan_pertanggal($dari, $sampai,$group="", $urut=""){
        if(empty($group)){
            /*$this->db->select("DATE_FORMAT(tgl_reg,'%d %M %Y') as tgl_kunjungan, COUNT(id_daftar) AS jml_kunjungan");
            $this->db->where('status_daftar',0);
            $this->db->group_by("DATE_FORMAT(tgl_reg,'%d %M %Y')");
            return $this->db->get('t_pendaftaran')->result();*/
            return $this->db->query("SELECT DATE_FORMAT(tgl_reg,'%d %M %Y') as tgl_kunjungan, COUNT(id_daftar) AS jml_kunjungan FROM t_pendaftaran WHERE status_daftar=0 AND tgl_reg>'$dari' AND tgl_reg<='$sampai' GROUP BY DATE_FORMAT(tgl_reg,'%d %M %Y')")->result();
        }elseif($group=="jenis"){
            $this->db->join('group_ruang','stat_grId=grId');
            $this->db->select("stt_tgl as tgl_reg, sum(stat_baru) as pasien_baru, sum(stat_lama) as pasien_lama,sum(stat_jml) as jml_kunjungan");
            //$this->db->where('glId','GL002');
            //$this->db->or_where('glId','GL003');
            $this->db->where("(glId='GL002' OR glId='GL003')",null);
            $this->db->where('stat_tgl >=', $dari);
            $this->db->where('stat_tgl <=', $sampai);
            $this->db->group_by('stat_tgl');
            return $this->db->get('statistik_kunjungan')->result();

        }elseif($group=="poly"){
            //$poly=$this->get_poly();
            /*$field="";
            $tgl_mulai=date_create($dari);
            $tgl_sampai=date_create($sampai);
            $diff=date_diff($tgl_mulai,$tgl_sampai);
            $sub_query="(SELECT COUNT(id_daftar) FROM t_pendaftaran WHERE t_pendaftaran.grId = group_ruang.grId AND DATE_FORMAT(tgl_reg,'%Y-%m-%d')='" .date_format($tgl_mulai,'Y-m-d') ."') AS '" .date_format($tgl_mulai,'Y-m-d') ."'";

            if($tgl_mulai!=$tgl_sampai) $sub_query.=",";
            for ($i=0; $i < $diff->days; $i++) { 
                date_add($tgl_mulai,date_interval_create_from_date_string("1 days"));
                $sub_query.="(SELECT sum(stat_jml) FROM statistik_kunjungan WHERE stat_grId = group_ruang.grId AND stat_tgl='" .date_format($tgl_mulai,'Y-m-d') ."') AS '" .date_format($tgl_mulai,'Y-m-d') ."'";
                if($diff->days-1!=$i) $sub_query.=",";
            }
            
            $SQL="SELECT grNama, $sub_query FROM group_ruang WHERE glId='GL002' OR glId='GL003'";
            return $this->db->query($SQL)->result();
            $group_ruang=$this->getRuangrj();*/
            $header=$this->getRuangrj();
            $sub_query="";
            foreach ($header as $h) {
                $grId=$h->grId;
                //$sub_query="(SELECT SUM(a.stat_jml) FROM statistik_kunjungan a WHERE a.stat_tgl = b.stat_tgl)";
                $sub_query.="(SELECT SUM(c.stat_jml) FROM statistik_kunjungan c WHERE c.stat_tgl=a.stat_tgl AND c.stat_grId='$grId') AS $grId ,";
            }
            $this->db->select("$sub_query,stat_tgl");
            //$this->db->select('stat_tgl, grId,grNama,sum(stat_jml) as jml_kunjungan');
            $this->db->join('group_ruang b','a.stat_grId=b.grId');
            //$this->db->where('glId','GL002');
            //$this->db->or_where('glId','GL003');
            $this->db->where("(glId='GL002' OR glId='GL003')",null);
            $this->db->where('stat_tgl >=', $dari);
            $this->db->where('stat_tgl <=', $sampai);
            $this->db->group_by('stat_tgl');
            //$this->db->group_by('stat_grId');
            return $this->db->get('statistik_kunjungan a')->result();
            //RSUD_PP@PL-LT22018
        }elseif($group=="carabayar"){
            $sub_query="";
            $carabayar=$this->get_carabayar();
            foreach ($carabayar as $c) {
                $carabayar=$c->id_cara_bayar;
                //$sub_query.="(SELECT count(id_daftar) FROM t_pendaftaran WHERE DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') =DATE_FORMAT(tgl_kunjungan, '%Y-%m-%d') AND id_cara_bayar='" .$c->id_cara_bayar ."' ) as " ."COL_" .$c->id_cara_bayar .",";
                $sub_query.="(SELECT SUM(c.stat_jml) FROM statistik_kunjungan c JOIN group_ruang d ON c.stat_grId=d.grId WHERE c.stat_tgl=a.stat_tgl AND c.stat_carabayar='$carabayar' AND (d.glId='GL002' OR d.glId='GL003')) AS COL_$carabayar ,";
            }

            $this->db->select("$sub_query,a.stat_tgl as tgl_daftar");
            //$this->db->select('stat_tgl, grId,grNama,sum(stat_jml) as jml_kunjungan');
            $this->db->join('group_ruang b','a.stat_grId=b.grId');
            //$this->db->where('glId','GL002');
            //$this->db->or_where('glId','GL003');
            $this->db->where("(glId='GL002' OR glId='GL003')",null);
            $this->db->where('stat_tgl >=', $dari);
            $this->db->where('stat_tgl <=', $sampai);
            $this->db->group_by('stat_tgl');
            //$this->db->group_by('stat_grId');
            return $this->db->get('statistik_kunjungan a')->result();

            //$SQL="SELECT tgl_daftar,COUNT(id_daftar) as jml_kunjungan";
            /*$SQL="SELECT DATE_FORMAT(t_pendaftaran.tgl_reg, '%Y-%m-%d') AS tgl_kunjungan, $sub_query DATE_FORMAT(tgl_reg, '%d %M %Y') as tgl_reg
            FROM (`t_pendaftaran`) JOIN group_ruang ON t_pendaftaran.grId=group_ruang.grId JOIN m_cara_bayar ON t_pendaftaran.id_cara_bayar=m_cara_bayar.id_cara_bayar WHERE `tgl_reg` >= '$dari' AND `tgl_reg` <= '$sampai' AND (glId='GL002' OR glId='GL003')GROUP BY  DATE_FORMAT(tgl_reg, '%d %M %Y') ORDER BY tgl_reg ";
            return $this->db->query($SQL)->result();*/
        }
    }
    function getRuangrj(){
        $this->db->where('glId','GL002');
        $this->db->or_where('glId','GL003');
        $this->db->order_by('grId');
        return $this->db->get('group_ruang')->result();
    }
    function get_carabayar(){
        return $this->db->get('m_cara_bayar')->result();
    }
    function get_poly(){
        $this->db->where('glId','GL002');
        $this->db->where('glId','GL003');
        return $this->db->get('group_ruang')->result();
    }
    function format_indo($tgl){
        $t=explode('-', $tgl);
        $b=array(
            '01'=>"Januari",
            '02'=>"Februari",
            '03'=>"Maret",
            '04'=>"April",
            '05'=>"Mei",
            '06'=>"Juni",
            '07'=>"Juli",
            '08'=>"Agustus",
            '09'=>"September",
            '10'=>"Oktober",
            '11'=>"November",
            '12'=>"Desember",
        );
        $hasil=$t[2] ." " .$b[$t[1]] ." " .$t[0];
        return $hasil;
    }
    function singkronisasi($dari,$sampai){
        if(empty($dari) OR empty($sampai)){
            return $this->db->get('view_statistik')->result();
        }else{
            $this->db->where('tanggal >= ' ,$dari);
            $this->db->where('tanggal <= ', $sampai);
            return $this->db->get('view_statistik')->result();
        }
    }
    function cek_data($tgl,$grId,$id_cara_bayar){
        $this->db->where('stat_tgl',$tgl);
        $this->db->where('stat_grId',$grId);
        $this->db->where('stat_carabayar',$id_cara_bayar);
        return $this->db->get('statistik_kunjungan')->row();
    }
    function getPasienbaru($tgl,$grId,$id_cara_bayar){
        $this->db->join('m_pasien','t_pendaftaran.nomr=m_pasien.nomr');
        $this->db->where("DATE_FORMAT(tgl_reg,'%Y-%m-%d')",$tgl);
        $this->db->where("grId",$grId);
        $this->db->where("id_cara_bayar",$id_cara_bayar);
        $this->db->where("DATE_FORMAT(tgl_reg,'%Y-%m-%d')=m_pasien.tgl_daftar");
        $this->db->where("status_daftar","0");
        return $this->db->get("t_pendaftaran")->num_rows();
    }
    function getPasienlama($tgl,$grId,$id_cara_bayar){
        $this->db->join('m_pasien','t_pendaftaran.nomr=m_pasien.nomr');
        $this->db->where("DATE_FORMAT(tgl_reg,'%Y-%m-%d')",$tgl);
        $this->db->where("grId",$grId);
        $this->db->where("id_cara_bayar",$id_cara_bayar);
        $this->db->where("DATE_FORMAT(tgl_reg,'%Y-%m-%d')!=m_pasien.tgl_daftar");
        $this->db->where("status_daftar","0");
        return $this->db->get("t_pendaftaran")->num_rows();
    }
}