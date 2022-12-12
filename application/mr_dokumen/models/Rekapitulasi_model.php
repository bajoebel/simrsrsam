<?php
class Rekapitulasi_model extends CI_Model{
    function data_kunjungan_pertanggal1($dari, $sampai,$group="", $urut=""){
        if(empty($group)){
            $order= "DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d')";
            $SQL="SELECT DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') AS tgl_kunjungan, COUNT(idx) AS jml_kunjungan FROM `tbl02_pendaftaran` 
            WHERE `tgl_masuk` >= '$dari' AND `tgl_masuk` <= '$sampai' AND (jns_layanan='RJ' OR jns_layanan='GD')  GROUP BY DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d')";
            if(!empty($urut)) $SQL .= "ORDER tgl_kunjungan BY $order $urut";
            return $this->db->query($SQL)->result();
        }elseif($group=="jenis"){
            //echo "JENIS";
            //if(!empty($order)) $this->db->order_by($order,$urut);
            $SQL="SELECT 
                tgl_kunjungan, 
                (SELECT COUNT(id_daftar) FROM t_pendaftaran WHERE t_pendaftaran.tgl_kunjungan=m_pasien.tgl_kunjungan) as pasien_baru,
                (SELECT COUNT(id_daftar) FROM t_pendaftaran JOIN group_ruang ON t_pendaftaran.grId=group_ruang.grId WHERE DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d')=m_pasien.tgl_kunjungan AND (glId='GL002' OR glId='GL003')) AS jml_kunjungan 
                FROM m_pasien 
                LEFT JOIN t_pendaftaran ON t_pendaftaran.nomr=m_pasien.nomr 
                JOIN group_ruang ON t_pendaftaran.grId=group_ruang.grId 
                WHERE tgl_kunjungan >= '$dari' AND tgl_kunjungan <= '$sampai'  AND (glId='GL002' OR glId='GL003')  
                GROUP BY tgl_kunjungan ";
            if(!empty($urut)) $SQL .= "ORDER BY tgl_kunjungan $urut";
            return $this->db->query($SQL)->result();
        }elseif($group=="poly"){
            //$poly=$this->get_poly();
            $field="";
            $tgl_mulai=date_create($dari);
            $tgl_sampai=date_create($sampai);
            $diff=date_diff($tgl_mulai,$tgl_sampai);
            $sub_query="(SELECT COUNT(id_daftar) FROM t_pendaftaran WHERE t_pendaftaran.grId = group_ruang.grId AND DATE_FORMAT(tgl_kunjungan,'%Y-%m-%d')='" .date_format($tgl_mulai,'Y-m-d') ."') AS '" .date_format($tgl_mulai,'Y-m-d') ."'";

            if($tgl_mulai!=$tgl_sampai) $sub_query.=",";
            for ($i=0; $i < $diff->days; $i++) { 
                date_add($tgl_mulai,date_interval_create_from_date_string("1 days"));
                $sub_query.="(SELECT COUNT(id_daftar) FROM t_pendaftaran WHERE t_pendaftaran.grId = group_ruang.grId AND DATE_FORMAT(tgl_kunjungan,'%Y-%m-%d')='" .date_format($tgl_mulai,'Y-m-d') ."') AS '" .date_format($tgl_mulai,'Y-m-d') ."'";
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
            //$SQL="SELECT tgl_kunjungan,COUNT(id_daftar) as jml_kunjungan";
            $SQL="SELECT DATE_FORMAT(t_pendaftaran.tgl_kunjungan, '%Y-%m-%d') AS tgl_kunjungan, $sub_query DATE_FORMAT(tgl_kunjungan, '%d %M %Y') as tgl_kunjungan
            FROM (`t_pendaftaran`) JOIN group_ruang ON t_pendaftaran.grId=group_ruang.grId JOIN m_cara_bayar ON t_pendaftaran.id_cara_bayar=m_cara_bayar.id_cara_bayar WHERE `tgl_kunjungan` >= '$dari' AND `tgl_kunjungan` <= '$sampai' AND (glId='GL002' OR glId='GL003')GROUP BY  DATE_FORMAT(tgl_kunjungan, '%d %M %Y') ORDER BY tgl_kunjungan ";
            return $this->db->query($SQL)->result();
        }
    }

    function data_kunjungan_pertanggal_old($dari, $sampai,$group="", $urut=""){
        if(empty($group)){
            $this->db->where_in('jns_layanan',array('RJ','GD'));
            $this->db->where('tgl_masuk >=', $dari);
            $this->db->where('tgl_masuk <=', $sampai);
            $this->db->select("DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') AS tgl_kunjungan, COUNT(idx) AS jml_kunjungan ");
            $this->db->group_by('stat_tgl');
            return $this->db->get('statistik_kunjungan')->result();
        }elseif($group=="jenis"){
            $this->db->join('group_ruang','stat_grId=grId');
            $this->db->select("stat_tgl as tgl_kunjungan, sum(stat_baru) as pasien_baru, sum(stat_lama) as pasien_lama,sum(stat_jml) as jml_kunjungan");
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
            $sub_query="(SELECT COUNT(id_daftar) FROM t_pendaftaran WHERE t_pendaftaran.grId = group_ruang.grId AND DATE_FORMAT(tgl_kunjungan,'%Y-%m-%d')='" .date_format($tgl_mulai,'Y-m-d') ."') AS '" .date_format($tgl_mulai,'Y-m-d') ."'";

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

            $this->db->select("$sub_query,a.stat_tgl as tgl_kunjungan");
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

            //$SQL="SELECT tgl_kunjungan,COUNT(id_daftar) as jml_kunjungan";
            /*$SQL="SELECT DATE_FORMAT(t_pendaftaran.tgl_kunjungan, '%Y-%m-%d') AS tgl_kunjungan, $sub_query DATE_FORMAT(tgl_kunjungan, '%d %M %Y') as tgl_kunjungan
            FROM (`t_pendaftaran`) JOIN group_ruang ON t_pendaftaran.grId=group_ruang.grId JOIN m_cara_bayar ON t_pendaftaran.id_cara_bayar=m_cara_bayar.id_cara_bayar WHERE `tgl_kunjungan` >= '$dari' AND `tgl_kunjungan` <= '$sampai' AND (glId='GL002' OR glId='GL003')GROUP BY  DATE_FORMAT(tgl_kunjungan, '%d %M %Y') ORDER BY tgl_kunjungan ";
            return $this->db->query($SQL)->result();*/
        }
    }
    function data_kunjungan_pertanggal($dari, $sampai,$group="", $layanan=""){
        if(empty($group)){
            $this->db->select("DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') AS tgl_kunjungan, COUNT(idx) AS jml_kunjungan");
            if(!empty($dari)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') >= ", $dari);
            if(!empty($sampai)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <= ", $sampai);
            if(!empty($layanan)) $this->db->where('jns_layanan', $layanan);
            $this->db->where("reg_unit NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)");
            $this->db->order_by('tgl_masuk');
            $this->db->group_by("DATE_FORMAT(tgl_masuk,'%d-%M-%Y')");
            return $this->db->get('tbl02_pendaftaran')->result();

        }elseif($group=="jenis"){
            $this->db->select("DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') AS tgl_kunjungan, COUNT(idx) AS jml_kunjungan,
            SUM(CASE WHEN DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') = DATE_FORMAT(`tgl_daftar`,'%Y-%m-%d')THEN 1 ELSE 0 END) AS `pasien_baru`,
            SUM(CASE WHEN DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <> DATE_FORMAT(`tgl_daftar`,'%Y-%m-%d')THEN 1 ELSE 0 END) AS `pasien_lama`,");
            if (!empty($dari)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') >= ", $dari);
            if (!empty($sampai)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <= ", $sampai);
            if (!empty($layanan)) $this->db->where('jns_layanan', $layanan);
            $this->db->where("reg_unit NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)");
            $this->db->order_by('tgl_masuk');
            $this->db->group_by("DATE_FORMAT(tgl_masuk,'%d-%M-%Y')");
            return $this->db->get('tbl02_pendaftaran')->result();


        }elseif($group=="poly"){
            
            $header=$this->getRuangrj($layanan);
            $sub_query="";
            foreach ($header as $h) {
                $grId='ruang_'.$h->idx;
                $sub[]= "SUM(CASE WHEN id_ruang = ".$h->idx." THEN 1 ELSE 0 END) AS `$grId`";
                
            }
            if(!empty($sub)) $sub_query=implode(',',$sub);
            else $sub_query="";
            $this->db->select("$sub_query,DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') as tgl_kunjungan, COUNT(idx) AS jml_kunjungan");
            if (!empty($dari)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') >= ", $dari);
            if (!empty($sampai)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <= ", $sampai);
            if (!empty($layanan)) $this->db->where('jns_layanan', $layanan);
            $this->db->where("reg_unit NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)");
            $this->db->group_by("DATE_FORMAT(tgl_masuk,'%d-%M-%Y')");
            $this->db->order_by('tgl_masuk');
            return $this->db->get('tbl02_pendaftaran')->result();
            //RSUD_PP@PL-LT22018
        }elseif($group=="carabayar"){
            $sub_query="";
            $carabayar=$this->get_carabayar();
            foreach ($carabayar as $c) {
                $cb="cara_".$c->idx;
                $sub[] = "SUM(CASE WHEN id_cara_bayar = " . $c->idx . " THEN 1 ELSE 0 END) AS `$cb`";
                //$sub_query.="(SELECT count(id_daftar) FROM t_pendaftaran WHERE DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') =DATE_FORMAT(tgl_kunjungan, '%Y-%m-%d') AND id_cara_bayar='" .$c->id_cara_bayar ."' ) as " ."COL_" .$c->id_cara_bayar .",";
                //$sub_query.="(SELECT SUM(c.stat_jml) FROM statistik_kunjungan c JOIN group_ruang d ON c.stat_grId=d.grId WHERE c.stat_tgl=a.stat_tgl AND c.stat_carabayar='$carabayar' AND (d.glId='GL002' OR d.glId='GL003')) AS COL_$carabayar ,";
            }
            if (!empty($sub)) $sub_query = implode(',', $sub);
            else $sub_query = "";
            $this->db->select("$sub_query,DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') as tgl_kunjungan, COUNT(idx) AS jml_kunjungan");
            if (!empty($dari)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') >= ", $dari);
            if (!empty($sampai)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <= ", $sampai);
            if (!empty($layanan)) $this->db->where('jns_layanan', $layanan);
            $this->db->where("reg_unit NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)");
            $this->db->group_by("DATE_FORMAT(tgl_masuk,'%d-%M-%Y')");
            $this->db->order_by('tgl_masuk');
            return $this->db->get('tbl02_pendaftaran')->result();

        }elseif($group=="wilayah"){
            $sub_query = "";
            $sub[] = "SUM(CASE WHEN nama_kab_kota = 'Kota Padang Panjang' THEN 1 ELSE 0 END) AS `dalam_kota`";
            $sub[] = "SUM(CASE WHEN nama_kab_kota <> 'Kota Padang Panjang' THEN 1 ELSE 0 END) AS `luar_kota`";
            $sub_query = implode(',', $sub);
            $this->db->select("$sub_query,DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') as tgl_kunjungan, COUNT(idx) AS jml_kunjungan");
            if (!empty($dari)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') >= ", $dari);
            if (!empty($sampai)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <= ", $sampai);
            if (!empty($layanan)) $this->db->where('jns_layanan', $layanan);
            $this->db->where("reg_unit NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)");
            $this->db->group_by("DATE_FORMAT(tgl_masuk,'%d-%M-%Y')");
            $this->db->order_by('tgl_masuk');
            return $this->db->get('tbl02_pendaftaran')->result();
        }
    }
    function data_kunjungan_perbulan($dari, $sampai, $group = "", $layanan = "")
    {
        $d = explode('/', $dari);
        $y = explode('/', $sampai);
        $dari = $d[1] . "-" . $d[0];
        $sampai = $y[1] . "-" . $y[0];
        if (empty($group)) {
            $this->db->select("DATE_FORMAT(`tgl_masuk`,'%Y-%m') as bulankunjungan, COUNT(idx) AS jml_kunjungan");
            if (!empty($dari)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m') >= ", $dari);
            if (!empty($sampai)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m') <= ", $sampai);
            if (!empty($layanan)) $this->db->where('jns_layanan', $layanan);
            $this->db->where(" reg_unit NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)");
            $this->db->order_by('tgl_masuk');
            $this->db->group_by("DATE_FORMAT(tgl_masuk,'%M-%Y')");
            return $this->db->get('tbl02_pendaftaran')->result();
        } elseif ($group == "jenis") {
            $this->db->select("DATE_FORMAT(`tgl_masuk`,'%Y-%m') as bulankunjungan, COUNT(idx) AS jml_kunjungan,
            SUM(CASE WHEN DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') = DATE_FORMAT(`tgl_daftar`,'%Y-%m-%d')THEN 1 ELSE 0 END) AS `pasien_baru`,
            SUM(CASE WHEN DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <> DATE_FORMAT(`tgl_daftar`,'%Y-%m-%d')THEN 1 ELSE 0 END) AS `pasien_lama`,");
            if (!empty($dari)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m') >= ", $dari);
            if (!empty($sampai)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m') <= ", $sampai);
            if (!empty($layanan)) $this->db->where('jns_layanan', $layanan);
            $this->db->where(" reg_unit NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)");
            $this->db->order_by('tgl_masuk');
            $this->db->group_by("DATE_FORMAT(tgl_masuk,'%M-%Y')");
            return $this->db->get('tbl02_pendaftaran')->result();
        } elseif ($group == "poly") {

            $header = $this->getRuangrj($layanan);
            $sub_query = "";
            foreach ($header as $h) {
                $grId = 'ruang_' . $h->idx;
                $sub[] = "SUM(CASE WHEN id_ruang = " . $h->idx . " THEN 1 ELSE 0 END) AS '$h->ruang'";
                // $sub[] = "SUM(CASE WHEN id_ruang = " . $h->idx . " THEN 1 ELSE 0 END) AS '$grId'";
            }
            if (!empty($sub)) $sub_query = implode(',', $sub);
            else $sub_query = "";
            // echo $sub_query; exit;
            $this->db->select("$sub_query,DATE_FORMAT(`tgl_masuk`,'%Y-%m') as bulankunjungan, COUNT(idx) AS jml_kunjungan");
            if (!empty($dari)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m') >= ", $dari);
            if (!empty($sampai)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m') <= ", $sampai);
            if (!empty($layanan)) $this->db->where('jns_layanan', $layanan);
            $this->db->where(" reg_unit NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)");
            $this->db->group_by("DATE_FORMAT(tgl_masuk,'%M-%Y')");
            $this->db->order_by('tgl_masuk');
            return $this->db->get('tbl02_pendaftaran')->result();
            //RSUD_PP@PL-LT22018
        } elseif ($group == "carabayar") {
            $sub_query = "";
            $carabayar = $this->get_jenisPeserta();
            foreach ($carabayar as $c) {
                $cb = "cara_" . $c->idx;
                $sub[] = "SUM(CASE WHEN jenis_peserta = '" . $c->cara_bayar . "' THEN 1 ELSE 0 END) AS `$cb`";
                //$sub_query.="(SELECT count(id_daftar) FROM t_pendaftaran WHERE DATE_FORMAT(`tgl_masuk`,'%Y-%m') =DATE_FORMAT(tgl_kunjungan, '%Y-%m') AND id_cara_bayar='" .$c->id_cara_bayar ."' ) as " ."COL_" .$c->id_cara_bayar .",";
                //$sub_query.="(SELECT SUM(c.stat_jml) FROM statistik_kunjungan c JOIN group_ruang d ON c.stat_grId=d.grId WHERE c.stat_tgl=a.stat_tgl AND c.stat_carabayar='$carabayar' AND (d.glId='GL002' OR d.glId='GL003')) AS COL_$carabayar ,";
            }
            if (!empty($sub)) $sub_query = implode(',', $sub);
            else $sub_query = "";
            $this->db->select("$sub_query,DATE_FORMAT(`tgl_masuk`,'%Y-%m') as bulankunjungan, COUNT(idx) AS jml_kunjungan");
            if (!empty($dari)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m') >= ", $dari);
            if (!empty($sampai)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m') <= ", $sampai);
            if (!empty($layanan)) $this->db->where('jns_layanan', $layanan);
            $this->db->where(" reg_unit NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)");
            $this->db->group_by("DATE_FORMAT(tgl_masuk,'%M-%Y')");
            $this->db->order_by('tgl_masuk');
            return $this->db->get('tbl02_pendaftaran')->result();
        } elseif ($group == "wilayah") {
            $sub_query = "";
            $sub[] = "SUM(CASE WHEN nama_kab_kota = 'Kota Padang Panjang' THEN 1 ELSE 0 END) AS `dalam_kota`";
            $sub[] = "SUM(CASE WHEN nama_kab_kota <> 'Kota Padang Panjang' THEN 1 ELSE 0 END) AS `luar_kota`";
            $sub_query = implode(',', $sub);
            $this->db->select("$sub_query,DATE_FORMAT(`tgl_masuk`,'%Y-%m') as bulankunjungan, COUNT(idx) AS jml_kunjungan");
            if (!empty($dari)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m') >= ", $dari);
            if (!empty($sampai)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y-%m') <= ", $sampai);
            if (!empty($layanan)) $this->db->where('jns_layanan', $layanan);
            $this->db->where(" reg_unit NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)");
            $this->db->group_by("DATE_FORMAT(tgl_masuk,'%M-%Y')");
            $this->db->order_by('tgl_masuk');
            return $this->db->get('tbl02_pendaftaran')->result();
        }
    }
    function data_kunjungan_pertahun($dari, $sampai, $group = "", $layanan = "")
    {
        
        if (empty($group)) {
            $this->db->select("DATE_FORMAT(`tgl_masuk`,'%Y') as tahunkunjungan, COUNT(idx) AS jml_kunjungan");
            if (!empty($dari)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y') >= ", $dari);
            if (!empty($sampai)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y') <= ", $sampai);
            if (!empty($layanan)) $this->db->where('jns_layanan', $layanan);
            $this->db->where(" reg_unit NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)");
            $this->db->order_by('tgl_masuk');
            $this->db->group_by("DATE_FORMAT(tgl_masuk,'%Y')");
            return $this->db->get('tbl02_pendaftaran')->result();
        } elseif ($group == "jenis") {
            $this->db->select("DATE_FORMAT(`tgl_masuk`,'%Y') as tahunkunjungan, COUNT(idx) AS jml_kunjungan,
            SUM(CASE WHEN DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') = DATE_FORMAT(`tgl_daftar`,'%Y-%m-%d')THEN 1 ELSE 0 END) AS `pasien_baru`,
            SUM(CASE WHEN DATE_FORMAT(`tgl_masuk`,'%Y-%m-%d') <> DATE_FORMAT(`tgl_daftar`,'%Y-%m-%d')THEN 1 ELSE 0 END) AS `pasien_lama`,");
            if (!empty($dari)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y') >= ", $dari);
            if (!empty($sampai)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y') <= ", $sampai);
            if (!empty($layanan)) $this->db->where('jns_layanan', $layanan);
            $this->db->where(" reg_unit NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)");
            $this->db->order_by('tgl_masuk');
            $this->db->group_by("DATE_FORMAT(tgl_masuk,'%Y')");
            return $this->db->get('tbl02_pendaftaran')->result();
        } elseif ($group == "poly") {

            $header = $this->getRuangrj($layanan);
            $sub_query = "";
            foreach ($header as $h) {
                $grId = 'ruang_' . $h->idx;
                $sub[] = "SUM(CASE WHEN id_ruang = " . $h->idx . " THEN 1 ELSE 0 END) AS `$grId`";
            }
            if (!empty($sub)) $sub_query = implode(',', $sub);
            else $sub_query = "";
            
            $this->db->select("$sub_query,DATE_FORMAT(`tgl_masuk`,'%Y') as tahunkunjungan, COUNT(idx) AS jml_kunjungan");
            if (!empty($dari)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y') >= ", $dari);
            if (!empty($sampai)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y') <= ", $sampai);
            if (!empty($layanan)) $this->db->where('jns_layanan', $layanan);
            $this->db->where(" reg_unit NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)");
            $this->db->group_by("DATE_FORMAT(tgl_masuk,'%Y')");
            $this->db->order_by('tgl_masuk');
            return $this->db->get('tbl02_pendaftaran')->result();
            //RSUD_PP@PL-LT22018
        } elseif ($group == "carabayar") {
            $sub_query = "";
            $carabayar = $this->get_jenisPeserta();
            foreach ($carabayar as $c) {
                $cb = "cara_" . $c->idx;
                $sub[] = "SUM(CASE WHEN jenis_peserta = '" . $c->cara_bayar . "' THEN 1 ELSE 0 END) AS `$cb`";
                //$sub_query.="(SELECT count(id_daftar) FROM t_pendaftaran WHERE DATE_FORMAT(`tgl_masuk`,'%Y') =DATE_FORMAT(tgl_kunjungan, '%Y-%m') AND id_cara_bayar='" .$c->id_cara_bayar ."' ) as " ."COL_" .$c->id_cara_bayar .",";
                //$sub_query.="(SELECT SUM(c.stat_jml) FROM statistik_kunjungan c JOIN group_ruang d ON c.stat_grId=d.grId WHERE c.stat_tgl=a.stat_tgl AND c.stat_carabayar='$carabayar' AND (d.glId='GL002' OR d.glId='GL003')) AS COL_$carabayar ,";
            }
            if (!empty($sub)) $sub_query = implode(',', $sub);
            else $sub_query = "";
            $this->db->select("$sub_query,DATE_FORMAT(`tgl_masuk`,'%Y') as tahunkunjungan, COUNT(idx) AS jml_kunjungan");
            if (!empty($dari)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y') >= ", $dari);
            if (!empty($sampai)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y') <= ", $sampai);
            if (!empty($layanan)) $this->db->where('jns_layanan', $layanan);
            $this->db->where(" reg_unit NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)");
            $this->db->group_by("DATE_FORMAT(tgl_masuk,'%Y')");
            $this->db->order_by('tgl_masuk');
            return $this->db->get('tbl02_pendaftaran')->result();
        } elseif ($group == "wilayah") {
            $sub_query = "";
            $sub[] = "SUM(CASE WHEN nama_kab_kota = 'Kota Padang Panjang' THEN 1 ELSE 0 END) AS `dalam_kota`";
            $sub[] = "SUM(CASE WHEN nama_kab_kota <> 'Kota Padang Panjang' THEN 1 ELSE 0 END) AS `luar_kota`";
            $sub_query = implode(',', $sub);
            $this->db->select("$sub_query,DATE_FORMAT(`tgl_masuk`,'%Y') as tahunkunjungan, COUNT(idx) AS jml_kunjungan");
            if (!empty($dari)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y') >= ", $dari);
            if (!empty($sampai)) $this->db->where("DATE_FORMAT(`tgl_masuk`,'%Y') <= ", $sampai);
            if (!empty($layanan)) $this->db->where('jns_layanan', $layanan);
            $this->db->where(" reg_unit NOT IN (SELECT reg_unit FROM tbl02_pendaftaran_batal)");
            $this->db->group_by("DATE_FORMAT(tgl_masuk,'%Y')");
            $this->db->order_by('tgl_masuk');
            return $this->db->get('tbl02_pendaftaran')->result();
        }
    }
    function getRuangrj($layanan){
        if(!empty($layanan)){
            if($layanan=="RJ")
            $this->db->where_in('grid', array(1,4));
            elseif($layanan=="GD") $this->db->where_in('grid', 4);
            elseif($layanan=="RI") $this->db->where_in('grid', 2);
            else $this->db->where_in('grid', 3);
        }
        $this->db->order_by('grId');
        return $this->db->get('tbl01_ruang')->result();
    }
    function get_carabayar(){
        return $this->db->get('tbl01_cara_bayar')->result();
    }

    function get_jenisPeserta(){
        $this->db->select('id_jenis_peserta as idx, jenis_peserta as cara_bayar');
        $this->db->group_by('jenis_peserta');
        return $this->db->get('tbl02_pendaftaran')->result();
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
        $this->db->where("DATE_FORMAT(tgl_kunjungan,'%Y-%m-%d')",$tgl);
        $this->db->where("grId",$grId);
        $this->db->where("id_cara_bayar",$id_cara_bayar);
        $this->db->where("DATE_FORMAT(tgl_kunjungan,'%Y-%m-%d')=m_pasien.tgl_kunjungan");
        $this->db->where("status_daftar","0");
        return $this->db->get("t_pendaftaran")->num_rows();
    }
    function getPasienlama($tgl,$grId,$id_cara_bayar){
        $this->db->join('m_pasien','t_pendaftaran.nomr=m_pasien.nomr');
        $this->db->where("DATE_FORMAT(tgl_kunjungan,'%Y-%m-%d')",$tgl);
        $this->db->where("grId",$grId);
        $this->db->where("id_cara_bayar",$id_cara_bayar);
        $this->db->where("DATE_FORMAT(tgl_kunjungan,'%Y-%m-%d')!=m_pasien.tgl_kunjungan");
        $this->db->where("status_daftar","0");
        return $this->db->get("t_pendaftaran")->num_rows();
    }
}