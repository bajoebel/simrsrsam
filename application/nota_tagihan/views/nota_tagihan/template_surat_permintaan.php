<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Permintaan</title>
    <style type="text/css">
        body{
            margin:0;
        }
        .konten{
            width:210mm;
            height:279mm;
            padding-left: 15mm;
            padding-right: 15mm;
            /*border:1px #000 solid;
            border-collapse:collapse;*/
        }
        
        .header{
            border-bottom:2px #000 doble;
            border-collapse:collapse;
            border-bottom-style:double;
            padding:10px;
        }
        .left{
            float:left;
        }
        .right{
            text-align:center;
        }
        .images{
            width:100px;
        }
        .header1{
            font-size:18pt;
            font-weight:bold;
        }
        .header2{
            font-size:28pt;
            font-weight:bold;
        }
        .border{
            width:100%;
            border:1px #000 solid;
            border-collapse:collapse;
        }

        .judul{
            font-size:18pt;
            font-weight:bold;
            text-align:center;
            padding:30px 0px 30px 0px;
        }
        .isi{
            text-align:justify;
        }
        li{
            list-style-image: url('<?= base_url() ."assets/images/checkbox.png" ?>');
        }
    </style>
</head>
<body>
    <div class="konten">
        <div class="header">
            <div class="left">
            <img src="<?= base_url() ."assets/images/logopp.png" ?>" alt="Logo" class='images'> 
            </div>
            <div class="right">
            <div class='header1'>Pemerintah Kota Padang Panjang</div>
            <div class='header2'>RUMAH SAKIT UMUM DAERAH</div>
            <div class='header3'>Jl. Tabek Gadang Kel. Ganting - Gunung fax (0752) 82046 Kode Pos 27127<br>
            Website : rsud.padangpanjang.go.id - email: rsud.pp@padangpanjang.go.id</div>
            </div>
            
        </div>
        <div class="border"></div>
        <div class="judul"><u><?= $judul ?></u></div>
        <div class="isi">
            <?php 
            $tanggal = new DateTime($permintaan->tgl_lahir);

            // tanggal hari ini
            $today = new DateTime('today');
            
            // tahun
            $y = $today->diff($tanggal)->y;
            
            // bulan
            $m = $today->diff($tanggal)->m;
            
            // hari
            $d = $today->diff($tanggal)->d;
            $umur =  $y . " tahun " . $m . " bulan " . $d . " hari";

            $jenis = $this->nota_model->getJenisPemeriksaan($id_penunjang);
            //print_r($permintaan);
            $tindakan=$this->nota_model->getPermintaanTindakan($id_permintaan);
            //echo $id_penunjang;
                if($id_penunjang==49){
                   /** 
                    * Untuk Form Permintaan Radiologi 
                    */ 
                    ?>
                    <table style="width:100%">
                        <tr>
                            <td>Nama</td>
                            <td style="width:35%">: <?= $permintaan->nama_pasien; ?></td>
                            <td>No Registrasi</td>
                            <td style="width:35%">: <?= $permintaan->reg_unit; ?></td>
                        </tr>

                        <tr>
                            <td>Usia</td>
                            <td>: <?= $umur; ?></td>
                            <td>Tanggal Registrasi</td>
                            <td>: <?= $permintaan->tgl_minta; ?><td>
                        </tr>

                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>: <?php if($permintaan->jns_kelamin==1) echo "Laki-laki"; else echo "Wanita" ?></td>
                            <td>Dokter Pengirim</td>
                            <td>: <?= $permintaan->nama_dokter_pengirim; ?></td>
                        </tr>

                        
                        <tr>
                            <td>Alamat</td>
                            <td colsapan=3>: <?= $permintaan->alamat; ?></td>
                        </tr>

                        <tr>
                            <td colspan="4" style="text-align:center"><h3><b>List Permintaan Pemeriksaan radiologi</b></h3> </td>
                        </tr>
                        
                        
                    </table>
                    <table style="width:100%; ">
                    <?php 
                        //print_r($tindakan);
                            $jenispemeriksaan="";
                            $t="";
                            $i=0;
                            foreach ($tindakan as $p ) {
                                $mod=$i%3;
                                //echo "<br> INDEX : ".$mod;
                                if($jenispemeriksaan!=$p->jenispemeriksaan){
                                    if($i>0) {
                                        $t.="</li></td>";
                                        if($i%3==0)  {
                                            $t.="</td></tr><td valign='top'><b>".$p->jenispemeriksaan ."</b>" ;
                                            $t.="<ul><li>".$p->nama_pemeriksaan  ."</li>";  
                                        }
                                        else {
                                            $t.="</td><td valign='top'><b>".$p->jenispemeriksaan ."</b>";
                                            $t.="<ul><li>".$p->nama_pemeriksaan ."</li>";  
                                        }
                                    }
                                    else{
                                        $t.="<tr><td valign='top'><b>".$p->jenispemeriksaan ."</b>";
                                        $t.="<ul><li>".$p->nama_pemeriksaan ."</li>";  
                                    }
                                    $i++;                              
                                }else{
                                    $t.="<li>".$p->nama_pemeriksaan ."</li>";
                                }
                                
                                $jenispemeriksaan=$p->jenispemeriksaan;
                                
                            }
                            echo $t;
                        ?>
                    </table>

                    <table style="width:100%">
                    <tr>
                        <td style="text-align:right">
                        <p>Dokter Pengirim, <?= $this->nota_model->longdate($permintaan->tgl_minta) ?></p>
                        <br><br><br>
                        <?php 
                            if(empty($permintaan->nama_dokter_pengirim)) echo "<p>(.................................................)</p>";
                            else echo "<p>(".$permintaan->nama_dokter_pengirim.")</p>";
                        ?>
                        </td>
                        </tr>
                    </table>
                    <?php
                }else if($id_penunjang==50){
                    /**
                     * Untuk Form Permintaan Laboaratorium
                     */
                    ?>
                    <table style="width:100%">
                        <tr>
                            <td>Nama</td>
                            <td style="width:35%">: <?= $permintaan->nama_pasien; ?></td>
                            <td>No Registrasi</td>
                            <td style="width:35%">: <?= $permintaan->reg_unit; ?></td>
                        </tr>

                        <tr>
                            <td>Usia</td>
                            <td>: <?= $umur; ?></td>
                            <td>Tanggal Registrasi</td>
                            <td>: <?= $permintaan->tgl_minta; ?><td>
                        </tr>

                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>: <?php if($permintaan->jns_kelamin==1) echo "Laki-laki"; else echo "Wanita" ?></td>
                            <td>Dokter Pengirim</td>
                            <td>: <?= $permintaan->nama_dokter_pengirim; ?></td>
                        </tr>

                        
                        <tr>
                            <td>Alamat</td>
                            <td colsapan=3>: <?= $permintaan->alamat; ?></td>
                        </tr>

                        <tr>
                            <td colspan="4" style="text-align:center"><h3><b>List Permintaan Pemeriksaan Laboratorium</b></h3> </td>
                        </tr>
                        
                        
                    </table>
                    <table style="width:100%; ">
                    <?php 
                        //print_r($tindakan);
                            $jenispemeriksaan="";
                            $t="";
                            $i=0;
                            foreach ($tindakan as $p ) {
                                $mod=$i%3;
                                //echo "<br> INDEX : ".$mod;
                                if($jenispemeriksaan!=$p->jenispemeriksaan){
                                    if($i>0) {
                                        $t.="</li></td>";
                                        if($i%3==0)  {
                                            $t.="</td></tr><td valign='top'><b>".$p->jenispemeriksaan ."</b>" ;
                                            $t.="<ul><li>".$p->nama_pemeriksaan  ."</li>";  
                                        }
                                        else {
                                            $t.="</td><td valign='top'><b>".$p->jenispemeriksaan ."</b>";
                                            $t.="<ul><li>".$p->nama_pemeriksaan ."</li>";  
                                        }
                                    }
                                    else{
                                        $t.="<tr><td valign='top'><b>".$p->jenispemeriksaan ."</b>";
                                        $t.="<ul><li>".$p->nama_pemeriksaan ."</li>";  
                                    }
                                    $i++;                              
                                }else{
                                    $t.="<li>".$p->nama_pemeriksaan ."</li>";
                                }
                                
                                $jenispemeriksaan=$p->jenispemeriksaan;
                                
                            }
                            echo $t;
                        ?>
                    </table>

                    <table style="width:100%">
                    <tr>
                        <td style="text-align:right">
                        <p>Dokter Pengirim, <?= $this->nota_model->longdate($permintaan->tgl_minta) ?></p>
                        <br><br><br>
                        <?php 
                            if(empty($permintaan->nama_dokter_pengirim)) echo "<p>(.................................................)</p>";
                            else echo "<p>(".$permintaan->nama_dokter_pengirim.")</p>";
                        ?>
                        </td>
                        </tr>
                    </table>
                    <?php
                }else if($id_penunjang==51){
                    /**
                     * Untuk Form Permintaan Patologi Anatomi
                     */
                    //print_r($permintaan);
                    ?>
                    <table>
                        <tr>
                        <td style="width:200px;">Dokter Pengirim </td>
                        <td>: <?= $permintaan->nama_dokter_pengirim; ?></td>
                        </tr>
                        <tr>
                        <td>Rumah Sakit / Klinik </td>
                        <td>: RSUD Kota Padang Panjang</td>
                        </tr>
                        <tr>
                        <td>Poliklinik / Ruang </td>
                        <td>: <?= $permintaan->nama_ruang_pengirim; ?></td>
                        </tr>
                        <tr>
                        <td>No Telp </td>
                        <td>: </td>
                        </tr>

                        <tr>
                        <td colspan=2><p><b><u>Keterangan Pasien</u></b></p></td>
                        </tr>

                        <tr>
                        <td>Nama</td>
                        <td>: <?= $permintaan->nama_pasien; ?></td>
                        </tr>
                        <tr>
                        <td>Umur </td>
                        <td>:
                            <?php 
                            echo  $umur;
                            ?>
                        </td>
                        </tr>
                        <tr>
                        <td>Jenis Kelamin </td>
                        <td>: <?php if($permintaan->jns_kelamin==1) echo "Laki-laki"; else echo "Wanita" ?></td>
                        </tr>
                        <tr>
                        <td>No. RM/ Reg </td>
                        <td>: <?= $permintaan->nomr ?></td>
                        </tr>
                        <tr>
                        <td>Alamat </td>
                        <td>: <?= $permintaan->alamat ?></td>
                        </tr>
                        <tr>
                        <td>No Telpon</td>
                        <td>: <?= $permintaan->no_telpon; ?> </td>
                        </tr>

                        <tr>
                        <td colspan=2><p><b><u>Jenis Pemeriksaan</u></b></p></td>
                        </tr>
                        <tr>
                        <td colspan=2>
                        <ul>
                        <?php
                            
                            //print_r($jenis);
                            $jenis_pemeriksaan="";
                            $li="";
                            $i=0;
                            //print_r($permintaan);
                            foreach ($jenis as $j ) {
                                if($jenis_pemeriksaan!=$j->jenis_pemeriksaan){
                                    if($i>=0) $li.="</li>";
                                    //if($permintaan->jenis_pemeriksaan)
                                    $li .= "<li type='square'>" .$j->jenis_pemeriksaan ." : " .$j->sub_jenispemeriksaan;
                                }else{
                                    $li .= "," .$j->sub_jenispemeriksaan;
                                }
                                $jenis_pemeriksaan=$j->jenis_pemeriksaan;
                                $i++;
                            }
                            echo $li;
                        ?>
                        </ul>
                        </td>
                        </tr>
                        <tr>
                        <td colspan=2><p><b><u>Bahan Fiksasi</u></b></p></td>
                        </tr>
                        <tr>
                        <td colspan=2>
                        <ul>
                        <li type='square'>
                        <?php 
                        $fiks=array('Formalin 10%','Formalin buffer','Alkohol 96%','Alkohol 50%','Lain-Lain');
                        if($permintaan->bahan_fiksasi=="Formalin 10%") echo "Formalin 10% / <strike>Formalin Buffer</strike>/ <strike>Alkohol 96% </strike> / <strike>Alkohol 50% </strike> / <strike>Lain lain</strike>";
                        elseif($permintaan->bahan_fiksasi=="Formalin Buffer") echo "<strike>Formalin 10%</strike> / Formalin Buffer/ <strike>Alkohol 96% </strike> / <strike>Alkohol 50% </strike> / <strike>Lain lain</strike>";
                        elseif($permintaan->bahan_fiksasi=="Alkohol 96%") echo "<strike>Formalin 10%</strike> / <strike>Formalin Buffer</strike>/ Alkohol 96% / <strike>Alkohol 50% </strike> / <strike>Lain lain</strike>";
                        elseif($permintaan->bahan_fiksasi=="Alkohol 50%") echo "<strike>Formalin 10%</strike> / <strike>Formalin Buffer</strike>/ <strike>Alkohol 96% </strike> / Alkohol 50%  / <strike>Lain lain</strike>";
                        else echo "<strike>Formalin 10%</strike> / <strike>Formalin Buffer</strike>/ <strike>Alkohol 96% </strike> / <strike>Alkohol 50%</strike>  / Lain lain";
                        //print_r($permintaan);
                        ?>
                        </li>
                        </ul>
                        </td>
                        </tr>
                        <tr>
                        <td>Lokasi Jaringan </td>
                        <td > : <?= $permintaan->lokasi_jaringan; ?></td>
                        </tr>
                        <tr>
                        <td colspan=2><p><b><u>Keterangan Klinik</u></b></p></td>
                        </tr>
                        <tr>
                        <td>Diagnosa Klinik </td>
                        <td>: <?= $permintaan->diagnosa ?></td>
                        </tr>
                        <tr>
                        <td>Haid Terakhir</td>
                        <td>: <?= $permintaan->haid_terakhir; ?> </td>
                        </tr>
                        
                        <tr>
                        <td colspan=2><p>Pemeriksaan PA Sebelumnya : Ya/Tidak</p></td>
                        </tr>
                        <tr>
                        <td>Di</td>
                        <td>: ........................................ </td>
                        </tr>
                        <tr>
                        <td>No PA</td>
                        <td>: ........................................ </td>
                        </tr>
                        
                        <tr>
                        <td colspan="2" style="text-align:right">
                        <p>Dokter Pengirim, <?= $this->nota_model->longdate($permintaan->tgl_minta) ?></p>
                        <br><br><br>
                        <?php 
                            if(empty($permintaan->nama_dokter_pengirim)) echo "<p>(.................................................)</p>";
                            else echo "<p>(".$permintaan->nama_dokter_pengirim.")</p>";
                        ?>
                        </td>
                        </tr>
                    </table>
                    
                    
                    <?php
                }else if($id_penunjang==52){
                    /**
                     * Untuk Form Permintaan IDT
                     */
                    ?>
                    <table style="width:100%">
                        <tr>
                            <td>Nama</td>
                            <td style="width:35%">: <?= $permintaan->nama_pasien; ?></td>
                            <td>No Registrasi</td>
                            <td style="width:35%">: <?= $permintaan->reg_unit; ?></td>
                        </tr>

                        <tr>
                            <td>Usia</td>
                            <td>: <?= $umur; ?></td>
                            <td>Tanggal Registrasi</td>
                            <td>: <?= $permintaan->tgl_minta; ?><td>
                        </tr>

                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>: <?php if($permintaan->jns_kelamin==1) echo "Laki-laki"; else echo "Wanita" ?></td>
                            <td>Dokter Pengirim</td>
                            <td>: <?= $permintaan->nama_dokter_pengirim; ?></td>
                        </tr>

                        
                        <tr>
                            <td>Alamat</td>
                            <td colsapan=3>: <?= $permintaan->alamat; ?></td>
                        </tr>

                        <tr>
                            <td colspan="4" style="text-align:center"><h3><b>List Permintaan Pemeriksaan IDT</b></h3> </td>
                        </tr>
                        
                        
                    </table>
                    <table style="width:100%; ">
                    <?php 
                        //print_r($tindakan);
                            $jenispemeriksaan="";
                            $t="";
                            $i=0;
                            foreach ($tindakan as $p ) {
                                $mod=$i%3;
                                //echo "<br> INDEX : ".$mod;
                                if($jenispemeriksaan!=$p->jenispemeriksaan){
                                    if($i>0) {
                                        $t.="</li></td>";
                                        if($i%3==0)  {
                                            $t.="</td></tr><td valign='top'><b>".$p->jenispemeriksaan ."</b>" ;
                                            $t.="<ul><li>".$p->nama_pemeriksaan  ."</li>";  
                                        }
                                        else {
                                            $t.="</td><td valign='top'><b>".$p->jenispemeriksaan ."</b>";
                                            $t.="<ul><li>".$p->nama_pemeriksaan ."</li>";  
                                        }
                                    }
                                    else{
                                        $t.="<tr><td valign='top'><b>".$p->jenispemeriksaan ."</b>";
                                        $t.="<ul><li>".$p->nama_pemeriksaan ."</li>";  
                                    }
                                    $i++;                              
                                }else{
                                    $t.="<li>".$p->nama_pemeriksaan ."</li>";
                                }
                                
                                $jenispemeriksaan=$p->jenispemeriksaan;
                                
                            }
                            echo $t;
                        ?>
                    </table>

                    <table style="width:100%">
                    <tr>
                        <td style="text-align:right">
                        <p>Dokter Pengirim, <?= $this->nota_model->longdate($permintaan->tgl_minta) ?></p>
                        <br><br><br>
                        <?php 
                            if(empty($permintaan->nama_dokter_pengirim)) echo "<p>(.................................................)</p>";
                            else echo "<p>(".$permintaan->nama_dokter_pengirim.")</p>";
                        ?>
                        </td>
                        </tr>
                    </table>
                    <?php
                }
            ?>
        </div>
    </div>
    
</body>
</html>