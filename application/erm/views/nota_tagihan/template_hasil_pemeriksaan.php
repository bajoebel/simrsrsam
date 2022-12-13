<style>
    .tab-content{
        border:1px solid #ccc;
        border-collapse:collapse;
        padding:10px;
    }
    .header {
            border-bottom: 2px #000 doble;
            border-collapse: collapse;
            border-bottom-style: double;
            padding: 10px;
        }

        .left {
            float: left;
        }

        .right {
            text-align: center;
        }

        .images {
            width: 100px;
        }

        .header1 {
            font-size: 18pt;
            font-weight: bold;
        }

        .header2 {
            font-size: 28pt;
            font-weight: bold;
        }
        .identitas {
            width: 100%;
            font-size: 10pt;
            padding: 5px 0;

        }
        .identitas,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
            border-collapse: collapse;
        }
        .judul {
            font-size: 18pt;
            font-weight: bold;
            text-align: center;
            padding: 30px 0px 30px 0px;
        }
        .text-error{
            color:#dd4b39;
        }
        
</style>
<?php
$arr_akses = explode(',', $hakakses);
if (in_array(17, $arr_akses)) {
    $hak_verifikasi = 1;
}else{
    $hak_verifikasi = 0;
}
?>
<div style="background:#fff;">
    <ul class="nav nav-pills">
        <?php 
        // print_r($jenispemeriksaan);
        if(!empty($jenispemeriksaan)){
            $no=0;
            foreach ($jenispemeriksaan as $p ) {
                if($no==0) $active="active"; else $active="";
                ?>
                <li class="<?= $active ?>"><a data-toggle="tab" href="#pemeriksaan<?= $p->id_jenis_pemeriksaan ?>"><?= $p->jenis_pemeriksaan ?></a></li>
                <?php
                $no++;
            }
        }
        ?>
    </ul>

    <div class="tab-content">
        <?php 
        $def="";
        if(!empty($jenispemeriksaan)){
            $no=0;
            foreach ($jenispemeriksaan as $p ) {
                $def=$p->id_jenis_pemeriksaan;
                if($no==0) $active="active"; else $active="";
                ?>
                <div id="pemeriksaan<?= $p->id_jenis_pemeriksaan ?>" class="tab-pane fade in <?= $active ?>">
                    <div id="formpemeriksaan<?= $p->id_jenis_pemeriksaan ?>">
                        <form id="form<?= $p->id_jenis_pemeriksaan ?>" class="form-horizontal" action="#" method="post" enctype="multipart/form-data" onsubmit="return false">
                            
                            <fieldset id="showhasil<?= $p->id_jenis_pemeriksaan ?>">
                                <?php 
                                $pemeriksaan=$this->nota_model->permintaanPemeriksaan($p->id_jenis_pemeriksaan,$p->idx_pendaftaran,$detail->reg_unit);
                                // print_r($pemeriksaan);exit;
                                if(!empty($pemeriksaan)){
                                    // Pemeriksaan dari tbl02_pemeriksaan_penunjang, berisi list pemeriksaan yang diinginkan saat melakukan permintaan  
                                    ?>
                                    <legend>Hasil Pemeriksaan <b><?= $p->jenis_pemeriksaan ?></b></legend>
                                    <input type="hidden" name="idx_hasil<?= $p->id_jenis_pemeriksaan ?>" id="idx_hasil<?= $p->id_jenis_pemeriksaan ?>" value="" />
                                    <input type="hidden" name="id_daftar<?= $p->id_jenis_pemeriksaan ?>" id="id_daftar<?= $p->id_jenis_pemeriksaan ?>" value="<?php echo $detail->id_daftar ?>" />
                                    <input type="hidden" name="idx_pendaftaran<?= $p->id_jenis_pemeriksaan ?>" id="idx_pendaftaran<?= $p->id_jenis_pemeriksaan ?>" value="<?php echo $detail->idx ?>" />
                                    <input type="hidden" name="reg_unit<?= $p->id_jenis_pemeriksaan ?>" id="reg_unit<?= $p->id_jenis_pemeriksaan ?>" value="<?php echo $detail->reg_unit ?>" />
                                    <input type="hidden" name="nomr<?= $p->id_jenis_pemeriksaan ?>" id="nomr<?= $p->id_jenis_pemeriksaan ?>" value="<?php echo $detail->nomr ?>" />
                                    <input type="hidden" name="nama_pasien<?= $p->id_jenis_pemeriksaan ?>" id="nama_pasien<?= $p->id_jenis_pemeriksaan ?>" value="<?php echo $detail->nama_pasien ?>" />
                                    <?php
                                    $tgllahir = new DateTime($detail->tgl_lahir);
                                    $sekarang = new DateTime('today');
                                    $y = $sekarang->diff($tgllahir)->y;
                                    $m = $sekarang->diff($tgllahir)->m;
                                    $d = $sekarang->diff($tgllahir)->d;
                                    ?>
                                    <input type="hidden" name="umur<?= $p->id_jenis_pemeriksaan ?>" id="umur<?= $p->id_jenis_pemeriksaan ?>" value="<?= $y . " Tahun " . $m . " Bulan " . $d . " Hari" ?>" />
                                    <input type="hidden" name="idruangpengirim<?= $p->id_jenis_pemeriksaan ?>" id="idruangpengirim<?= $p->id_jenis_pemeriksaan ?>" value="<?= $detail->asal_ruang ?>">
                                    <input type="hidden" name="ruangpengirim<?= $p->id_jenis_pemeriksaan ?>" id="ruangpengirim<?= $p->id_jenis_pemeriksaan ?>" value="<?= $detail->nama_asal_ruang ?>">
                                    <input type="hidden" name="template<?= $p->id_jenis_pemeriksaan ?>" id="template<?= $p->id_jenis_pemeriksaan ?>" value="<?= $p->template ?>">
                                    <input type="hidden" name="idjenis<?= $p->id_jenis_pemeriksaan ?>" id="idjenis<?= $p->id_jenis_pemeriksaan ?>" value="<?= $def ?>">
                                    <input type="hidden" name="jenis_pemeriksaan<?= $p->id_jenis_pemeriksaan ?>" id="jenis_pemeriksaan<?= $p->id_jenis_pemeriksaan ?>" value="<?= $p->jenis_pemeriksaan ?>">
                                    <input type="hidden" name="idsubjenis<?= $p->id_jenis_pemeriksaan ?>" id="idsubjenis<?= $p->id_jenis_pemeriksaan ?>" value="">
                                    <input type="hidden" name="subjenis<?= $p->id_jenis_pemeriksaan ?>" id="subjenis<?= $p->id_jenis_pemeriksaan ?>" value="">
                                    <input type="hidden" name="diagnosa<?= $p->id_jenis_pemeriksaan ?>" id="diagnosa<?= $p->id_jenis_pemeriksaan ?>" value="<?= $diagnosa ?>">
                                    <input type="hidden" name="jenispemeriksaan<?= $p->id_jenis_pemeriksaan ?>" id="x-jenispemeriksaan<?= $p->id_jenis_pemeriksaan ?>" value="<?php echo $p->jenis_pemeriksaan ?>">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Tanggal Pemeriksaan:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="tgl_pemeriksaan<?= $p->id_jenis_pemeriksaan ?>" class="form-control tanggal" id="tgl_pemeriksaan<?= $p->id_jenis_pemeriksaan ?>" value="" required>
                                            <span class="text-error" id="err_tglperiksa<?= $p->id_jenis_pemeriksaan ?>"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Petugas Pemeriksa:</label>
                                        <div class="col-sm-10">
                                            <select id='petugaspemeriksa<?= $p->id_jenis_pemeriksaan ?>' name="petugaspemeriksa<?= $p->id_jenis_pemeriksaan ?>" class="form-control" style='width:100%' required>
                                                <option value="">Pilih Pemeriksaan</option>
                                                <?php
                                                foreach ($getDokter->result() as $petugas) {
                                                ?>
                                                    <option value="<?= $petugas->NRP ?>"><?= $petugas->pgwNama; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <span class="text-error" id="err_petugas<?= $p->id_jenis_pemeriksaan ?>"></span>
                                        </div>
                                    </div>
                                    <?php 
                                    if($p->template=="DahakTB"){
                                        ?>
<!-- Start Header Jika Template Pemeriksaan Dahak Tb -->
                                        <div class="row">
                                            <div class="col-md-2 col-lg-2 col-xs-2 text-right"><b>Spesimen Dahak</b></div>
                                            <div class="col-md-2 col-lg-2 col-xs-2"><b>Hasil</b></div>
                                            <div class="col-md-2 col-lg-2 col-xs-2"><b>Tingkat positif</b></div>
                                            <div class="col-md-6 col-lg-6 col-xs-6"><b>Visual Dahak</b></div>
                                        </div>
                                        <hr>
<!-- End Header Jika Template Pemeriksaan Dahak Tb -->
                                        <?php
                                    }
                                    // $pemeriksaan = $this->nota_model->getPemeriksaanByJenis($p->idx_pendaftaran,$p->id_jenis_pemeriksaan);
                                    $no=0;
                                    // print_r($pemeriksaan);
                                    $id_pemeriksaan="";
                                    foreach ($pemeriksaan as $j ) {
                                        // echo "ID PEMERIKSAAN ".$j->nama_pemeriksaan ." JENIS PEMERIKSAAN ".$j->subjenispemeriksaan."<br>";
                                        if($id_pemeriksaan!= $j->id_pemeriksaan && $j->nama_pemeriksaan != $j->subjenispemeriksaan){
                                            ?>
                                            <legend><?= $j->nama_pemeriksaan?></legend>
                                            <?php
                                        }
                                        if($p->template=="DahakTB"){
                                            ?>
<!-- Start Dahak Tb -->
                                            <div class="row">
                                                <div class="col-md-2 col-lg-2 col-xs-2 text-right">
                                                    <input type="hidden" id="idx<?= $j->idx?>" name="idx[]" value="<?= $j->idx ?>">
                                                    <input type="hidden" id="id_pemeriksaan<?= $j->idx ?>" name="id_pemeriksaan<?= $j->idx ?>" value="<?= $j->id_pemeriksaan ?>">
                                                    <input type="hidden" id="nama_pemeriksaan<?= $j->idx ?>" name="nama_pemeriksaan<?= $j->idx ?>" value="<?= $j->nama_pemeriksaan ?>">
                                                    <input type='hidden' name='id_subpemeriksaan<?= $j->idx ?>' id='id_subpemeriksaan<?= $j->idx  ?>' value='<?= $j->id_subjenispemeriksaan  ?>'>
                                                    <input type='hidden' name='subpemeriksaan<?= $j->idx  ?>' id='subpemeriksaan<?= $j->idx  ?>' value='<?= $j->subjenispemeriksaan  ?>'>
                                                    <input type='hidden' name='satuan<?= $j->idx  ?>' id='satuan<?= $j->idx  ?>' value='<?= $j->satuan ?>'>
                                                    <input type='hidden' name='nilai_rujukan_lk<?= $j->idx  ?>' id='nilai_rujukan_lk<?= $j->idx  ?>' value='<?= $j->nilai_rujukan_lk ?>'>
                                                    <input type='hidden' name='nilai_rujukan_pr<?= $j->idx  ?>' id='nilai_rujukan_pr<?= $j->idx  ?>' value='<?= $j->nilai_rujukan_pr ?>'>
                                                    <b><?= $j->nama_pemeriksaan?></b>
                                                </div>
                                                <div class="col-md-2 col-lg-2 col-xs-2">
                                                    <input type="radio" name="hasil<?= $j->idx ?>" id="pos<?= $j->idx ?>" value="Pos"> Positif
                                                    <input type="radio" name="hasil<?= $j->idx ?>" id="neg<?= $j->idx ?>" value="Neg"> Negatif<br>
                                                    <span class="text-error" id="err_hasil<?= $j->idx ?>"></span>
                                                </div>
                                                <div class="col-md-2 col-lg-2 col-xs-2">
                                                    <select name="tingkatpositif<?= $j->idx ?>" id="tingkat_positif<?= $j->idx ?>" class="form-control" style="width:100%">
                                                        <option value="-">Pilih</option>    
                                                        <option value='+++'>+++</option>
                                                        <option value='++'>++</option>
                                                        <option value='+'>+</option>
                                                        <option value='1-9'>1-9</option>
                                                    </select>
                                                    <span class="text-error" id="err_tingkatpositif<?= $j->idx ?>"></span>  
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-xs-6">
                                                    <input type="checkbox" value="1" name="nanah_lendir<?= $j->idx ?>">Nanah Lendir &nbsp;
                                                    <input type="checkbox" value="1" name="bercak_darah<?= $j->idx ?>">Bercak Darah &nbsp;
                                                    <input type="checkbox" value="1" name="air_liur<?= $j->idx ?>">Air Liur
                                                </div>
                                            </div>
                                            <hr>
<!-- End Dahak Tb -->
                                            <?php
                                        }else{?>
                                            <input type="hidden" id="idx<?= $j->idx?>" name="idx[]" value="<?= $j->idx ?>">
                                            <input type="hidden" id="id_pemeriksaan<?= $j->idx ?>" name="id_pemeriksaan<?= $j->idx ?>" value="<?= $j->id_pemeriksaan ?>">
                                            <input type="hidden" id="nama_pemeriksaan<?= $j->idx ?>" name="nama_pemeriksaan<?= $j->idx ?>" value="<?= $j->nama_pemeriksaan ?>">
                                            <input type='hidden' name='id_subpemeriksaan<?= $j->idx ?>' id='id_subpemeriksaan<?= $j->idx  ?>' value='<?= $j->id_subjenispemeriksaan  ?>'>
                                            <input type='hidden' name='subpemeriksaan<?= $j->idx  ?>' id='subpemeriksaan<?= $j->idx  ?>' value='<?= $j->subjenispemeriksaan  ?>'>
                                            <input type='hidden' name='satuan<?= $j->idx  ?>' id='satuan<?= $j->idx  ?>' value='<?= $j->satuan ?>'>
                                            <input type='hidden' name='nilai_rujukan_lk<?= $j->idx  ?>' id='nilai_rujukan_lk<?= $j->idx  ?>' value='<?= $j->nilai_rujukan_lk ?>'>
                                            <input type='hidden' name='nilai_rujukan_pr<?= $j->idx  ?>' id='nilai_rujukan_pr<?= $j->idx  ?>' value='<?= $j->nilai_rujukan_pr ?>'>
                                            <?php 
                                            if($j->kontrol=="textarea") { ?>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="email"><?= $j->subjenispemeriksaan ?>:</label>
                                                    <div class="col-md-10">
                                                        <textarea name="hasil<?= $j->idx ?>" id="hasil<?= $j->idx ?>" cols="30" rows="5" class="form-control"></textarea>
                                                        <span class="text-error" id="err_hasil<?= $p->id_jenis_pemeriksaan.$no ?>"></span>
                                                    </div>
                                                </div>
                                            <?php 
                                            }else{
                                                ?>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="email"><?= $j->subjenispemeriksaan ?>:</label>
                                                    <div class="col-md-5">
                                                        <input type="text" name="hasil<?= $j->idx ?>" id="hasil<?= $j->idx ?>" class="form-control">
                                                        <span class="text-error" id="err_hasil<?= $p->id_jenis_pemeriksaan.$no ?>"></span>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <?php 
                                                        if($j->satuan=='-') $satuan = ""; else $satuan=$j->satuan;
                                                        if($j->nilai_rujukan_lk=='-') $nilai_rujukan_lk = ""; else $nilai_rujukan_lk=$j->nilai_rujukan_lk;
                                                        if($j->nilai_rujukan_pr=='-') $nilai_rujukan_pr = ""; else $nilai_rujukan_pr=$j->nilai_rujukan_pr;
                                                        
                                                        ?>
                                                        <ol>
                                                            <?php 
                                                            if(!empty($nilai_rujukan_lk)) echo "<li><i>Nilai Rujukan Laki Laki $nilai_rujukan_lk $satuan</i></li>";
                                                            if(!empty($nilai_rujukan_pr)) echo "<li><i>Nilai Rujukan Perempuan $nilai_rujukan_pr $satuan</i></li>"; 
                                                            ?>
                                                        </ol>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        
                                        $id_pemeriksaan= $j->id_pemeriksaan;
                                    }
                                    if($p->template=="DahakTB") echo "</table>";
                                    ?>
                                    <div class="form-group" <?php if($this->session->userdata('level')==4) echo "display:none;"; ?>>
                                        <label class="control-label col-sm-2" for="email">Kesimpulan / Kesan :</label>
                                        <div class="col-md-10">
                                            <textarea name="kesan<?= $p->id_jenis_pemeriksaan ?>" id="kesan<?= $p->id_jenis_pemeriksaan ?>" cols="30" rows="5" class="form-control"></textarea>
                                            <span class="text-error" id="err_kesan<?= $p->id_jenis_pemeriksaan ?>"></span>
                                        </div>
                                    </div>
                                    <?php
                                }else{
                                    $hasil=$this->nota_model->getDetailHasilPemeriksaanPenunjang($p->id_jenis_pemeriksaan,$detail->reg_unit);
                                    $isvalid=$this->digisign_model->verifyData($hasil[0]->idhasil);
                                    // print_r($hasil);
                                    ?>
                                    <div id="info<?= $hasil[0]->idhasil ?>">
                                    <?php
                                    $arr_akses = explode(',', $hakakses);
                                    if (in_array(17, $arr_akses)) {
                                        if(empty($hasil[0]->verifikator)){
                                            // echo $hasil[0]->verifikator;
                                            ?>
                                            <div class="callout callout-warning">Hasil Pemeriksaan Belum diverifikasi oleh dokter silahkan klik tombol Sign Di pojok Kanan Bawah untuk melakukan verifikasi</div>
                                            <?php
                                        }else{
                                            
                                            if($isvalid=="valid"){
                                            ?>
                                                <div class="callout callout-success">Hasil Pemeriksaan Sudah diverifikasi oleh dokter silahkan klik <b><a href="<?= base_url() ."nota_tagihan.php/nota_tagihan/cetakhasil/".$hasil[0]->idhasil;?>">Disini</a></b> Untuk Mencetak Hasil Pemeriksaan </div>
                                            <?php
                                            }else{
                                                ?>
                                                <div class="callout callout-danger">Telah terjadi perubahan antara data sekarang dengan data yang diverifikasi sebelumnya jika data ini sudag benar silahkan lakukan verifikasi ulang dengan cara klik tombol Sign di pojok kanan bawah</div>
                                            <?php
                                            }
                                            
                                        }
                                    }else{
                                        if(empty($hasil[0]->verifikator)){
                                            ?>
                                            <div class="callout callout-warning">Hasil Pemeriksaan Belum diverifikasi oleh dokter</div>
                                            <?php
                                        }else{
                                            ?>
                                            <div class="callout callout-success">Hasil Pemeriksaan Sudah diverifikasi oleh dokter silahkan klik <b><a href="<?= base_url() ."nota_tagihan.php/nota_tagihan/cetakhasil/".$hasil[0]->idhasil;?>">Disini</a></b> Untuk Mencetak Hasil Pemeriksaan </div>
                                            <?php
                                        }
                                    }
                                    $jenis=$this->nota_model->getJenisPemeriksaanById($p->id_jenis_pemeriksaan);
                                    ?>
                                    </div>
                                    <div class="header">
                                        <div class="left">
                                            <img src="<?= base_url() . "assets/images/logopp.png" ?>" alt="Logo" class='images'>
                                        </div>
                                        <div class="right">
                                            <div class='header1'>Pemerintah Kota Padang Panjang</div>
                                            <div class='header2'>RUMAH SAKIT UMUM DAERAH</div>
                                            <div class='header3'>Jl. Tabek Gadang Kel. Ganting - Gunung fax (0752) 82046 Kode Pos 27127<br>
                                                Website : rsud.padangpanjang.go.id - email: rsud.pp@padangpanjang.go.id</div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="isi" id="isi">
                                        <table class="identitas" style="border: 0px;">
                                            <tr style="border: 0px;">
                                                <td style="border: 0px;font-weight:bold;">Nama</td>
                                                <td style="border: 0px;">: <?= $detail->nama_pasien ?></td>
                                                <td style="border: 0px;font-weight:bold;">Tgl Lahir</td>
                                                <td style="border: 0px;">: <?= longDate($detail->tgl_lahir) ?></td>
                                                <td style="border: 0px;font-weight:bold;">MR</td>
                                                <td style="border: 0px;">: <?= $detail->nomr ?></td>
                                                <td style="border: 0px;font-weight:bold;">Status</td>
                                                <td style="border: 0px;">: <?= $detail->cara_bayar ?></td>
                                            </tr>
                                            <tr>
                                                <td style="border: 0px;font-weight:bold;">Alamat</td>
                                                <td style="border: 0px;max-width:250px;">: <?= "Kel. ".$detail->nama_kelurahan ." Kec. " .$detail->nama_kecamatan ."".$detail->nama_kab_kota ." Prov " .$detail->nama_provinsi ?></td>
                                                <td style="border: 0px;font-weight:bold;">Umur</td>
                                                <td style="border: 0px;">: <?= getUmur($detail->tgl_lahir,$detail->tgl_masuk) ?></td>
                                                <td style="border: 0px;font-weight:bold;">Ruang</td>
                                                <td style="border: 0px;">: <?= $detail->nama_ruang ?></td>
                                                <td style="border: 0px;font-weight:bold;">Tgl Pengiriman</td>
                                                <td style="border: 0px;">: <?= $detail->tgl_masuk ?></td>
                                            </tr>
                                            <tr>
                                                <td style="border: 0px;font-weight:bold;">Pengirim.</td>
                                                <td style="border: 0px;">: <?= $detail->nama_asal_ruang ?></td>
                                                <td style="border: 0px;font-weight:bold;">Jenis Kelamin</td>
                                                <td style="border: 0px;">: <?= ($detail->jns_kelamin=="0")? "Perempuan":"laki-Laki" ?></td>
                                                <td style="border: 0px;">&nbsp;</td>
                                                <td style="border: 0px;">&nbsp;</td>
                                                <td style="border: 0px;">&nbsp;</td>
                                                <td style="border: 0px;">&nbsp;</td>
                                            </tr>

                                        </table>
                                        <?php
                                        if(!empty($hasil[0]->verifikator) && $isvalid=="valid"){
                                            if ($jenis->template == 'DahakTB') {
                                                echo '<div class="judul">'.$p->jenis_pemeriksaan.'<br></div>';
                                                echo '<table class="table">';
                                                echo '<thead class="bg-gray">';
                                                echo '<tr>';
                                                echo '<td rowspan="2" class="col" valign="center">NO</td>';
                                                echo '<td rowspan="2" class="col" valign="center">Pemeriksaan</td>';
                                                echo '<td rowspan="2" class="col" >Hasil</td>';
                                                echo '<td rowspan="2" class="col" valign="center">Tingkat Positif</td>';
                                                echo '<td colspan="3" class="col" align="center">Visual Dahak</td>';
                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '<td class="col text-center">Nanah Lendir</td>';
                                                echo '<td class="col text-center">Bercak Darah</td>';
                                                echo '<td class="col text-center">Air Liur</td>';
                                                echo '</tr>';
                                                echo '</thead>';
                                                echo '<tbody>';
                                            }elseif($jenis->template == "Radiologi"){
                                                echo '<div class="judul">'.$p->jenis_pemeriksaan.'<br></div>';
                                            }elseif($jenis->template == "Patologi"){
                                                echo '<br><legend>Hasil Pemeriksaan '.$p->jenis_pemeriksaan.'<br></legend>';
                                            } else {
                                                echo '<div class="judul">'.$p->jenis_pemeriksaan.'<br></div>';
                                                echo '<table class="table">';
                                                echo '<thead class="bg-gray">';
                                                echo '<tr>';
                                                echo '<td rowspan="2" valign="center">NO</td>';
                                                echo '<td rowspan="2" valign="center">Pemeriksaan</td>';
                                                echo '<td rowspan="2">Hasil</td>';
                                                echo '<td rowspan="2" valign="center">Satuan</td>';
                                                echo '<td colspan="2" align="center">Nilai Rujukan</td>';
                                                echo '</tr>';
                                                echo '<tr>';
                                                echo '<td>Pria</td>';
                                                echo '<td>Wanita</td>';
                                                echo '</tr>';
                                                echo '</thead>';
                                                echo '<tbody>';
                                            }
                                            $namapemeriksaan = "";
                                            $start = 0;
                                            if ($jenis->template == 'DahakTB') {
                                                foreach ($hasil as $h) {
                                                    if ($namapemeriksaan != $h->namapemeriksaan) {
                                                        $start++;
                                                        if ($h->idsubpemeriksaan <= 0) {
                                                            //Tidak ada Sub Pemeriksaan
                                                            echo "<tr>";
                                                            echo "<td>" . $start . "</td>";
                                                            echo "<td>" . $h->namapemeriksaan . "</td>";
                                                            echo "<td>" . $h->hasil . "</td>";
                                                            echo "<td>" . $h->tingkatpositif . "</td>";
                                                            if ($h->nanah_lendir == 1) echo "<td class='text-center'>v</td>";
                                                            else echo "<td class='text-center'>x</td>";
                                                            if ($h->bercak_darah == 1) echo "<td class='text-center'>v</td>";
                                                            else echo "<td class='text-center'>x</td>";
                                                            if ($h->air_liur == 1) echo "<td class='text-center'>v</td>";
                                                            else echo "<td class='text-center'>x</td>";
                                                            echo "</tr>";
                                                        } else {
                                                            echo "<tr>";
                                                            echo "<td>" . $start . "</td>";
                                                            echo "<td colspan='6'><b>" . $h->namapemeriksaan . "</b></td>";
                                                            echo "</tr>";
                                                            echo "<tr>";
                                                            echo "<td></td>";
                                                            echo "<td>" . $h->subpemeriksaan . "</td>";
                                                            echo "<td>" . $h->hasil . "</td>";
                                                            echo "<td>" . $h->tingkatpositif . "</td>";
                                                            if ($h->nanah_lendir == 1) echo "<td class='text-center'>v</td>";
                                                            else echo "<td class='text-center'>x</td>";
                                                            if ($h->bercak_darah == 1) echo "<td class='text-center'>v</td>";
                                                            else echo "<td class='text-center'>x</td>";
                                                            if ($h->air_liur == 1) echo "<td class='text-center'>v</td>";
                                                            else echo "<td class='text-center'>x</td>";
                                                            echo "</tr>";
                                                        }
                                                        echo '</tbody></table>';
                                                    } else {
                                                        echo "<tr>";
                                                        echo "<td></td>";
                                                        echo "<td>" . $h->subpemeriksaan . "</td>";
                                                        echo "<td>" . $h->hasil . "</td>";
                                                        echo "<td>" . $h->tingkatpositif . "</td>";
                                                        if ($h->nanah_lendir == 1) echo "<td class='text-center'>v</td>";
                                                        else echo "<td class='text-center'>x</td>";
                                                        if ($h->bercak_darah == 1) echo "<td class='text-center'>v</td>";
                                                        else echo "<td class='text-center'>x</td>";
                                                        if ($h->air_liur == 1) echo "<td class='text-center'>v</td>";
                                                        else echo "<td class='text-center'>x</td>";
                                                        echo "</tr>";
                                                    }
                                                }
                                            } elseif($jenis->template == "Radiologi"){
                                                foreach ($hasil as $h ) {
                                                    if ($namapemeriksaan != $h->namapemeriksaan) {
                                                        $no++;
                                                        if ($h->idsubpemeriksaan > 0) {
                                                            ?>
                                                            <legend><?= $h->namapemeriksaan ?></legend>
                                                            <div class="row">
                                                                <div class="col-md-3"><?= $h->subpemeriksaan ?></div>
                                                                <div class="col-md-9">: <?= $h->hasil ?></div>
                                                            </div>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-md-3"><?= $h->namapemeriksaan ?></div>
                                                                <div class="col-md-9">: <?= $h->hasil ?></div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                            <div class="row">
                                                                <div class="col-md-3"><?= $h->subpemeriksaan ?></div>
                                                                <div class="col-md-9">: <?= $h->hasil ?></div>
                                                            </div>
                                                            <?php
                                                    }
                                                    $namapemeriksaan = $h->namapemeriksaan;
                                                    // if($jenis->template == "Radiologi") echo "<h3>Hasil Pemeriksaan Radiologi ".$h->namapemeriksaan."</h3>";
                                                    // else echo "<h3>Hasil Pemeriksaan Patologi Anatomi ".$h->namapemeriksaan."</h3>";
                                                    // echo "<p>".$h->hasil."</p>";
                                                }
                                            }else if($jenis->template == "Patologi"){
                                                foreach ($hasil as $h ) {
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                        <div class="col-md-2" style="padding:10px"><?= $h->namapemeriksaan ?></div>
                                                        <div class="col-md-1" style="padding:10px;text-align:right;">:</div>
                                                        <div class="col-md-9" style="padding:10px;text-align:justify;"><?= $h->hasil ?></div>
                                                        </div>
                                                        
                                                    </div>
                                                    <?php
                                                }
                                            }else {
                                                $no = 0;
                                                foreach ($hasil as $h) {
                                                    if ($namapemeriksaan != $h->namapemeriksaan) {
                                                        $no++;
                                                        if ($h->namapemeriksaan != $h->subpemeriksaan) {
                                                            ?>
                                                            <tr>
                                                                <td><?= $no; ?></td>
                                                                <td colspan="5"><?= $h->namapemeriksaan; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td><?= $h->subpemeriksaan ?></td>
                                                                <td><?= $h->hasil ?></td>
                                                                <td><?= $h->satuan ?></td>
                                                                <td><?= $h->rujukan_lk; ?></td>
                                                                <td><?= $h->rujukan_pr; ?></td>
                                                            </tr>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <tr>
                                                                <td><?= $no; ?></td>
                                                                <td><?= $h->namapemeriksaan ?></td>
                                                                <td><?= $h->hasil ?></td>
                                                                <td><?= $h->satuan ?></td>
                                                                <td><?= $h->rujukan_lk; ?></td>
                                                                <td><?= $h->rujukan_pr; ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td><?= $h->subpemeriksaan ?></td>
                                                            <td><?= $h->hasil ?></td>
                                                            <td><?= $h->satuan ?></td>
                                                            <td><?= $h->rujukan_lk; ?></td>
                                                            <td><?= $h->rujukan_pr; ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    $namapemeriksaan = $h->namapemeriksaan;
                                                }
                                                echo '</tbody></table>';
                                            }
                                            ?>
                                            <br>
                                            <?php 
                                        } else{ 
                                            $tgllahir = new DateTime($detail->tgl_lahir);
                                            $sekarang = new DateTime('today');
                                            $y = $sekarang->diff($tgllahir)->y;
                                            $m = $sekarang->diff($tgllahir)->m;
                                            $d = $sekarang->diff($tgllahir)->d;
                                            ?>
                                            <hr>
                                            <legend>Hasil Pemeriksaan <b><?= $hasil[0]->jenispemeriksaan ?></b></legend>
                                                <!-- <form action="#" class="form-horizontal" id="update"> -->
                                                <?php 
                                                    $idjenispemeriksaan=$hasil[0]->idjenispemeriksaan;
                                                    $umur=$hasil[0]->umur;
                                                    $jenispemeriksaan=$hasil[0]->jenispemeriksaan;
                                                    $hasil1=$hasil[0];
                                                    // echo "ID JENIS PEMERIKSAAN : ".$hasil[0]->umur; 
                                                ?>
                                                <input type="hidden" name="idx_hasil<?= $hasil[0]->idjenispemeriksaan ?>" id="idx_hasil<?= $hasil[0]->idjenispemeriksaan ?>" value="<?= $hasil[0]->idhasil ?>" />
                                                <input type="hidden" name="id_daftar<?php echo $idjenispemeriksaan ?>" id="id_daftar<?php echo $idjenispemeriksaan ?>" value="<?php echo $detail->id_daftar ?>" />
                                                <input type="hidden" name="idx_pendaftaran<?= $idjenispemeriksaan ?>" id="idx_pendaftaran<?= $idjenispemeriksaan ?>" value="<?php echo $detail->idx ?>" />
                                                <input type="hidden" name="reg_unit<?= $idjenispemeriksaan ?>" id="reg_unit<?= $idjenispemeriksaan ?>" value="<?php echo $detail->reg_unit ?>" />
                                                <input type="hidden" name="nomr<?= $idjenispemeriksaan ?>" id="nomr<?= $idjenispemeriksaan ?>" value="<?php echo $detail->nomr ?>" />
                                                <input type="hidden" name="nama_pasien<?= $idjenispemeriksaan ?>" id="nama_pasien<?= $idjenispemeriksaan ?>" value="<?php echo $detail->nama_pasien ?>" />
                                                <input type="hidden" name="umur<?= $idjenispemeriksaan ?>" id="umur<?= $idjenispemeriksaan ?>" value="<?= $umur ?>" />
                                                <input type="hidden" name="idruangpengirim<?= $idjenispemeriksaan ?>" id="idruangpengirim<?= $idjenispemeriksaan ?>" value="<?= $detail->asal_ruang ?>">
                                                <input type="hidden" name="ruangpengirim<?= $idjenispemeriksaan ?>" id="ruangpengirim<?= $idjenispemeriksaan ?>" value="<?= $detail->nama_asal_ruang ?>">
                                                <input type="hidden" name="template<?= $idjenispemeriksaan ?>" id="template<?= $idjenispemeriksaan ?>" value="<?= $p->template ?>">
                                                <input type="hidden" name="idjenis<?= $idjenispemeriksaan ?>" id="idjenis<?= $idjenispemeriksaan ?>" value="<?= $def ?>">
                                                <input type="hidden" name="jenis_pemeriksaan<?= $idjenispemeriksaan ?>" id="jenis_pemeriksaan<?= $idjenispemeriksaan ?>" value="<?= $jenispemeriksaan ?>">
                                                <input type="hidden" name="idsubjenis<?= $idjenispemeriksaan ?>" id="idsubjenis<?= $idjenispemeriksaan ?>" value="">
                                                <input type="hidden" name="subjenis<?= $idjenispemeriksaan ?>" id="subjenis<?= $idjenispemeriksaan ?>" value="">
                                                <input type="hidden" name="diagnosa<?= $idjenispemeriksaan ?>" id="diagnosa<?= $idjenispemeriksaan ?>" value="<?= $diagnosa ?>">
                                                <input type="hidden" name="jenispemeriksaan<?= $idjenispemeriksaan ?>" id="x-jenispemeriksaan<?= $idjenispemeriksaan ?>" value="<?php echo $jenispemeriksaan ?>">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="email">Tanggal Pemeriksaan:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="tgl_pemeriksaan<?= $hasil[0]->idjenispemeriksaan ?>" class="form-control tanggal" id="tgl_pemeriksaan<?= $hasil1->idjenispemeriksaan ?>" value="<?= $hasil[0]->tanggal_periksa ?>" required>
                                                        <span class="text-error" id="err_tglperiksa<?= $hasil[0]->idjenispemeriksaan ?>"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="email">Petugas Pemeriksa:</label>
                                                    <div class="col-sm-10">
                                                        <select id='petugaspemeriksa<?= $hasil[0]->idjenispemeriksaan ?>' name="petugaspemeriksa<?= $p->id_jenis_pemeriksaan ?>" class="form-control" style='width:100%' required>
                                                            <option value="">Pilih Pemeriksaan</option>
                                                            <?php
                                                            foreach ($getDokter->result() as $petugas) {
                                                            ?>
                                                                <option value="<?= $petugas->NRP ?>" <?php if($petugas->NRP==$hasil[0]->petugaspemeriksa) echo "selected"; ?>><?= $petugas->pgwNama; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <span class="text-error" id="err_petugas<?= $idjenispemeriksaan ?>"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="email">Check All:<?php if($this->session->userdata('level')==4){ ?><input type="checkbox" name="validasipetugas" id="validasipetugas"  onclick="validasi('',<?= $hasil[0]->idhasil ?>,<?= $hasil[0]->idjenispemeriksaan ?>,<?= $detail->idx ?>)" value="1" ><?php } ?></label>
                                                    <div class="col-sm-10">&nbsp;</div>
                                                </div>
                                                <?php 
                                                
                                                $namapemeriksaan = "";
                                                $start = 0;
                                                // print_r($jenis);
                                                if ($jenis->template == 'DahakTB') {
                                                    foreach ($hasil as $h) {
                                                        if ($namapemeriksaan != $h->namapemeriksaan) {
                                                            $start++;
                                                            ?>
                                                            <input type="hidden" name="indexhasil<?= $h->idjenispemeriksaan?>[]" id="indexhasil<?= $h->idx ?>" value="<?= $h->idx ?>">
                                                            <legend><?= $h->namapemeriksaan ?></legend>
                                                            <input type='hidden' name='id_subpemeriksaan<?= $h->idx ?>[]' id='id_subpemeriksaan<?= $h->idx ?>' value='<?= $h->idsubpemeriksaan ?>'>
                                                            <input type='hidden' name='subpemeriksaan<?= $h->idx ?>' id='subpemeriksaan<?= $h->idx ?>' value='<?= $h->subpemeriksaan  ?>'>
                                                            <input type='hidden' name='satuan<?= $h->idx ?>' id='satuan<?= $h->idx ?>' value='<?= $h->satuan ?>'>
                                                            <input type='hidden' name='nilai_rujukan_lk<?= $h->idx ?>' id='nilai_rujukan_lk<?= $h->idx ?>' value='<?= $h->rujukan_lk ?>'>
                                                            <input type='hidden' name='nilai_rujukan_pr<?= $h->idx ?>' id='nilai_rujukan_pr<?= $h->idx ?>' value='<?= $h->rujukan_pr ?>'>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="email">Hasil Pemeriksaan:<?php if($this->session->userdata('level')==4){ ?><input type="checkbox" name="validasipetugas<?= $h->idx?>" id="validasipetugas<?= $h->idx?>"  onclick="validasi(<?= $h->idx ?>,<?= $h->idhasil ?>,<?= $h->idjenispemeriksaan ?>,<?= $detail->idx ?>)"value="1" <?php if($h->validasipetugas==1) echo "checked"; ?> ><?php } ?></label>
                                                                <div class="col-sm-10">
                                                                    <input type="radio" name="hasil<?= $h->idx ?>" id="pos<?= $h->idx ?>" value="Pos" <?php if($h->hasil=="Pos") echo "checked"; ?>> Positif
                                                                    <input type="radio" name="hasil<?= $h->idx ?>" id="pos<?= $h->idx ?>" value="Neg" <?php if($h->hasil=="Neg") echo "checked"; ?>> Negatif<br>
                                                                    <span class="text-error" id="err_hasil<?= $h->idx ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="email">Tingkat Positif:<?php if($this->session->userdata('level')==4){ ?><input type="checkbox" name="validasipetugas<?= $h->idx?>" id="validasipetugas<?= $h->idx?>"  onclick="validasi(<?= $h->idx ?>,<?= $h->idhasil ?>,<?= $h->idjenispemeriksaan ?>,<?= $detail->idx ?>)"value="1" <?php if($h->validasipetugas==1) echo "checked"; ?> ><?php } ?></label>
                                                                <div class="col-sm-10">
                                                                    <select name="tingkatpositif<?= $h->idx ?>" id="tingkat_positif<?= $h->idx ?>" class="form-control">
                                                                        <option value="-">Pilih</option>    
                                                                        <option value='+++' <?php if($h->tingkatpositif=="+++") echo "selected"; ?>>+++</option>
                                                                        <option value='++' <?php if($h->tingkatpositif=="++") echo "selected"; ?>>++</option>
                                                                        <option value='+' <?php if($h->tingkatpositif=="+") echo "selected"; ?>>+</option>
                                                                        <option value='1-9' <?php if($h->tingkatpositif=="1-9") echo "selected"; ?>>1-9</option>
                                                                    </select>
                                                                    <span class="text-error" id="err_tingkatpositif<?= $h->idx ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="email">Visual Dahak<?php if($this->session->userdata('level')==4){ ?><input type="checkbox" name="validasipetugas<?= $h->idx?>" id="validasipetugas<?= $h->idx?>"  onclick="validasi(<?= $h->idx ?>,<?= $h->idhasil ?>,<?= $h->idjenispemeriksaan ?>,<?= $detail->idx ?>)"value="1" <?php if($h->validasipetugas==1) echo "checked"; ?> ><?php } ?>:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="checkbox" value="1" name="nanah_lendir<?= $h->idx ?>" <?php if($h->nanah_lendir=="1") echo "checked"; ?>>Nanah Lendir &nbsp;
                                                                    <input type="checkbox" value="1" name="bercak_darah<?= $h->idx ?>" <?php if($h->bercak_darah=="1") echo "checked"; ?>>Bercak Darah &nbsp;
                                                                    <input type="checkbox" value="1" name="air_liur<?= $h->idx ?>" <?php if($h->air_liur=="1") echo "checked"; ?>>Air Liur
                                                                </div>
                                                            </div>
                                                            <?php
                                                            // echo '</tbody></table>';
                                                        } else {
                                                            ?>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="email">Hasil Pemeriksaan:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="radio" name="hasil<?= $h->idx ?>0" id="pos<?= $h->idx ?>" value="Pos"> Positif
                                                                    <input type="radio" name="hasil<?= $h->idx ?>0" id="pos<?= $h->idx ?>" value="Neg"> Negatif<br>
                                                                    <span class="text-error" id="err_hasil<?= $h->idx ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="email">Tingkat Positif:</label>
                                                                <div class="col-sm-10">
                                                                    <select name="tingkatpositif<?= $h->idx ?>" id="tingkat_positif<?= $h->idx ?>" class="form-control">
                                                                        <option value="-">Pilih</option>    
                                                                        <option value='+++'>+++</option>
                                                                        <option value='++'>++</option>
                                                                        <option value='+'>+</option>
                                                                        <option value='1-9'>1-9</option>
                                                                    </select>
                                                                    <span class="text-error" id="err_tingkatpositif<?= $h->idx ?>"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="email">Visual Dahak:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="checkbox" value="1" name="nanah_lendir<?= $h->idx ?>">Nanah Lendir &nbsp;
                                                                    <input type="checkbox" value="1" name="bercak_darah<?= $h->idx ?>">Bercak Darah &nbsp;
                                                                    <input type="checkbox" value="1" name="air_liur<?= $h->idx ?>">Air Liur
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                } elseif($jenis->template == "Radiologi"){
                                                    foreach ($hasil as $h ) {
                                                        if ($namapemeriksaan != $h->namapemeriksaan) {
                                                            $no++;
                                                            if ($h->idsubpemeriksaan > 0) {
                                                                ?>
                                                                <legend><?= $h->namapemeriksaan; ?></legend>
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-2" for="email"><?= $h->subpemeriksaan ?><?php if($this->session->userdata('level')==4){ ?><input type="checkbox" name="validasipetugas<?= $h->idx?>" id="validasipetugas<?= $h->idx?>"  onclick="validasi(<?= $h->idx ?>,<?= $h->idhasil ?>,<?= $h->idjenispemeriksaan ?>,<?= $detail->idx ?>)"value="1" <?php if($h->validasipetugas==1) echo "checked"; ?> ><?php } ?>:</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="hidden" name="indexhasil<?= $h->idjenispemeriksaan?>[]" id="indexhasil<?= $h->idx ?>" value="<?= $h->idx ?>">
                                                                        <input type="hidden" name="subpemeriksaan<?= $h->idjenispemeriksaan?>[]" id="subpemeriksaan<?= $h->idx ?>" value="<?= $h->subpemeriksaan ?>">
                                                                        <textarea name="hasil<?= $h->idx ?>" id="hasil<?= $h->idx ?>" cols="30" rows="5" class="form-control"><?= $h->hasil ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-2" for="email"><?= $h->namapemeriksaan ?><?php if($this->session->userdata('level')==4){ ?><input type="checkbox" name="validasipetugas<?= $h->idx?>" id="validasipetugas<?= $h->idx?>"  onclick="validasi(<?= $h->idx ?>,<?= $h->idhasil ?>,<?= $h->idjenispemeriksaan ?>,<?= $detail->idx ?>)"value="1" <?php if($h->validasipetugas==1) echo "checked"; ?> ><?php } ?>:</label>
                                                                    <div class="col-sm-10">
                                                                    <input type="hidden" name="indexhasil<?= $h->idjenispemeriksaan?>[]" id="indexhasil<?= $h->idx ?>" value="<?= $h->idx ?>">
                                                                        <textarea name="hasil<?= $h->idx ?>" id="hasil<?= $h->idx ?>" cols="30" rows="5" class="form-control"><?= $h->hasil ?></textarea>
                                                                    </div>
                                                                </div>
                                                                
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="email"><?= $h->subpemeriksaan ?><?php if($this->session->userdata('level')==4){ ?><input type="checkbox" name="validasipetugas<?= $h->idx?>" id="validasipetugas<?= $h->idx?>"  onclick="validasi(<?= $h->idx ?>,<?= $h->idhasil ?>,<?= $h->idjenispemeriksaan ?>,<?= $detail->idx ?>)"value="1" <?php if($h->validasipetugas==1) echo "checked"; ?> ><?php } ?>:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="hidden" name="indexhasil<?= $h->idjenispemeriksaan?>[]" id="indexhasil<?= $h->idx ?>" value="<?= $h->idx ?>">
                                                                    <textarea name="hasil<?= $h->idx ?>" id="hasil<?= $h->idx ?>" cols="30" rows="5" class="form-control"><?= $h->hasil ?></textarea>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        $namapemeriksaan = $h->namapemeriksaan;
                                                    }
                                                }else if($jenis->template == "Patologi"){
                                                    foreach ($hasil as $h ) {
                                                        ?>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2" for="email"><?= $h->namapemeriksaan ?><?php if($this->session->userdata('level')==4){ ?><input type="checkbox" name="validasipetugas<?= $h->idx?>" id="validasipetugas<?= $h->idx?>"  onclick="validasi(<?= $h->idx ?>,<?= $h->idhasil ?>,<?= $h->idjenispemeriksaan ?>,<?= $detail->idx ?>)"value="1" <?php if($h->validasipetugas==1) echo "checked"; ?> ><?php } ?>:</label>
                                                            <div class="col-sm-10">
                                                                <input type="hidden" name="indexhasil<?= $h->idjenispemeriksaan?>[]" id="indexhasil<?= $h->idx ?>" value="<?= $h->idx ?>">
                                                                <textarea name="hasil<?= $h->idx ?>" id="hasil<?= $h->idx ?>" class="form-control" cols="30" rows="5"><?= $h->hasil ?></textarea>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }else {
                                                    $no = 0;
                                                    foreach ($hasil as $h) {
                                                        if ($namapemeriksaan != $h->namapemeriksaan) {
                                                            $no++;
                                                            if ($h->namapemeriksaan != $h->subpemeriksaan) {
                                                                ?>
                                                                <legend><?= $h->namapemeriksaan; ?></legend>
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-2" for="email"><?= $h->subpemeriksaan ?>:<?php if($this->session->userdata('level')==4){ ?><input type="checkbox" name="validasipetugas<?= $h->idx?>" id="validasipetugas<?= $h->idx?>"  onclick="validasi(<?= $h->idx ?>,<?= $h->idhasil ?>,<?= $h->idjenispemeriksaan ?>,<?= $detail->idx ?>)" value="1" <?php if($h->validasipetugas==1) echo "checked"; ?> ><?php } ?> </label>
                                                                    <div class="col-sm-5">
                                                                    <input type="hidden" name="subpemeriksaan<?= $h->idjenispemeriksaan?>[]" id="subpemeriksaan<?= $h->idx ?>" value="<?= $h->subpemeriksaan ?>">
                                                                        <input type="hidden" name="indexhasil<?= $h->idjenispemeriksaan?>[]" id="indexhasil<?= $h->idx ?>" value="<?= $h->idx ?>">
                                                                        <input type="text" class="form-control" name="hasil<?= $h->idx ?>" id="hasil<?= $h->idx ?>" value="<?= $h->hasil ?>" placeholder="Masukkan Hasil Pemeriksaan">
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <?php 
                                                                        if($h->satuan=='-') $satuan = ""; else $satuan=$h->satuan;
                                                                        if($h->rujukan_lk=='-') $nilai_rujukan_lk = ""; else $nilai_rujukan_lk=$h->rujukan_lk;
                                                                        if($h->rujukan_pr=='-') $nilai_rujukan_pr = ""; else $nilai_rujukan_pr=$h->rujukan_pr;
                                                                        if(!empty($nilai_rujukan_lk)|| !empty($nilai_rujukan_pr)) echo "Nilai Rujukan"; 
                                                                        ?>
                                                                        <ol>
                                                                            <?php 
                                                                            if(!empty($nilai_rujukan_lk)) echo "<li><i>Laki Laki<b> $nilai_rujukan_lk $satuan</i></b></li>";
                                                                            if(!empty($nilai_rujukan_pr)) echo "<li><i>Perempuan<b> $nilai_rujukan_pr $satuan</i></b></li>"; 
                                                                            ?>
                                                                        </ol>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-2" for="email"><?= $h->subpemeriksaan ?>: <?php if($this->session->userdata('level')==4){ ?><input type="checkbox" name="validasipetugas<?= $h->idx?>" id="validasipetugas<?= $h->idx?>"  onclick="validasi(<?= $h->idx ?>,<?= $h->idhasil ?>,<?= $h->idjenispemeriksaan ?>,<?= $detail->idx ?>)"value="1" <?php if($h->validasipetugas==1) echo "checked"; ?> ><?php }  ?></label>
                                                                    <div class="col-sm-5">
                                                                        <input type="hidden" name="subpemeriksaan<?= $h->idjenispemeriksaan?>[]" id="subpemeriksaan<?= $h->idx ?>" value="<?= $h->subpemeriksaan ?>">
                                                                        <input type="hidden" name="indexhasil<?= $h->idjenispemeriksaan?>[]" id="indexhasil<?= $h->idx ?>" value="<?= $h->idx ?>">
                                                                        <input type="text" class="form-control" name="hasil<?= $h->idx ?>" id="hasil<?= $h->idx ?>" value="<?= $h->hasil ?>" placeholder="Masukkan Hasil Pemeriksaan">
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <?php 
                                                                        if($h->satuan=='-') $satuan = ""; else $satuan=$h->satuan;
                                                                        if($h->rujukan_lk=='-') $nilai_rujukan_lk = ""; else $nilai_rujukan_lk=$h->rujukan_lk;
                                                                        if($h->rujukan_pr=='-') $nilai_rujukan_pr = ""; else $nilai_rujukan_pr=$h->rujukan_pr;
                                                                        if(!empty($nilai_rujukan_lk)|| !empty($nilai_rujukan_pr)) echo "<b>Nilai Rujukan : </b>"; 
                                                                        if($nilai_rujukan_lk!=$nilai_rujukan_pr){
                                                                            ?>
                                                                            <ol>
                                                                                <?php 
                                                                                if(!empty($nilai_rujukan_lk)) echo "<li><i>Laki Laki<b> $nilai_rujukan_lk $satuan</i></b></li>";
                                                                                if(!empty($nilai_rujukan_pr)) echo "<li><i>Perempuan<b> $nilai_rujukan_pr $satuan</i></b></li>"; 
                                                                                ?>
                                                                            </ol>
                                                                            <?php
                                                                        }else{
                                                                            echo "<i>".$nilai_rujukan_lk."</i>";
                                                                        }
                                                                        ?>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" for="email"><?= $h->subpemeriksaan ?>:<?php if($this->session->userdata('level')==4){ ?><input type="checkbox" name="validasipetugas<?= $h->idx?>" id="validasipetugas<?= $h->idx?>"  onclick="validasi(<?= $h->idx ?>,<?= $h->idhasil ?>,<?= $h->idjenispemeriksaan ?>,<?= $detail->idx ?>)" value="1" <?php if($h->validasipetugas==1) echo "checked"; ?>><?php } ?></label>
                                                                <div class="col-sm-5">
                                                                <input type="hidden" name="subpemeriksaan<?= $h->idjenispemeriksaan?>[]" id="subpemeriksaan<?= $h->idx ?>" value="<?= $h->subpemeriksaan ?>">
                                                                    <input type="hidden" name="indexhasil<?= $h->idjenispemeriksaan?>[]" id="indexhasil<?= $h->idx ?>" value="<?= $h->idx ?>">
                                                                    <input type="text" class="form-control" name="hasil<?= $h->idx ?>" id="hasil<?= $h->idx ?>" value="<?= $h->hasil ?>" placeholder="Masukkan Hasil Pemeriksaan">
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <?php 
                                                                    if($h->satuan=='-') $satuan = ""; else $satuan=$h->satuan;
                                                                    if($h->rujukan_lk=='-') $nilai_rujukan_lk = ""; else $nilai_rujukan_lk=$h->rujukan_lk;
                                                                    if($h->rujukan_pr=='-') $nilai_rujukan_pr = ""; else $nilai_rujukan_pr=$h->rujukan_pr;
                                                                    if(!empty($nilai_rujukan_lk)|| !empty($nilai_rujukan_pr)) echo "Nilai Rujukan"; 
                                                                    ?>
                                                                    <ol>
                                                                        <?php 
                                                                        if(!empty($nilai_rujukan_lk)) echo "<li><i>Laki Laki<b> $nilai_rujukan_lk $satuan</i></b></li>";
                                                                        if(!empty($nilai_rujukan_pr)) echo "<li><i>Perempuan<b> $nilai_rujukan_pr $satuan</i></b></li>"; 
                                                                        ?>
                                                                    </ol>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        $namapemeriksaan = $h->namapemeriksaan;
                                                    }
                                                    // echo '</tbody></table>';
                                                }
                                            ?>
                                            <!-- </form> -->
                                            <?php
                                        } 

                                        if(empty($hasil[0]->verifikator) ){
                                        ?>
                                            <div class="form-group" <?php if($this->session->userdata('level')==4) echo "style='display:none;'"; ?>>
                                                <label class="control-label col-sm-2" for="email">Kesimpulan / Kesan :</label>
                                                <div class="col-md-10">
                                                    <textarea name="kesan<?= $hasil[0]->idhasil ?>" id="kesan<?= $hasil[0]->idjenispemeriksaan ?>" cols="30" rows="5" class="form-control"><?= $hasil[0]->kesan ?></textarea>
                                                    <span class="text-error" id="err_kesan<?= $hasil[0]->idhasil ?>"></span>
                                                </div>
                                            </div>
                                        <?php } else{ ?>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="email">Kesimpulan / Kesan :</label>
                                                <div class="col-md-10">
                                                    <?= $hasil[0]->kesan ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <table class="identitas" style="border: 0px;">
                                            <tr style="border: 0px;">
                                                <td style="border: 0px;">
                                                    <?php 
                                                    
                                                    if(empty($hasil[0]->verifikator) && $this->session->userdata('level')==3){
                                                        ?>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p class="pull-right">Padang Panjang <?= longDate($hasil[0]->tanggal_periksa) ?></p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="col-md-12">
                                                                <button class="btn btn-primary" id="btnhasil<?= $p->id_jenis_pemeriksaan ?>" onclick="updateHasilPemeriksaanPenunjang(<?= $p->id_jenis_pemeriksaan ?>)"><span class="fa fa-save" id="iconhasil<?= $p->id_jenis_pemeriksaan ?>"></span> Update</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div id="qrcode<?= $hasil[0]->idhasil ?>">
                                                                    <div class="col-md-12 ">
                                                                        <p class="pull-right">
                                                                        <button class="btn-primary btn-sm" id="btnsign" onclick="signHasilPenunjang('<?= $p->id_jenis_pemeriksaan ?>','<?= $hasil[0]->idhasil ?>','<?= $detail->idx ?>')"><span class="fa fa-certificate" id="iconsign" ></span> Sign</button>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }else{
                                                        if(!empty($hasil[0]->verifikator) && $isvalid=="valid"){
                                                        ?>
                                                        <div class="col-md-12">
                                                            <p class='pull-right'>
                                                                Padang Panjang, <?= longDate($hasil[0]->tanggal_periksa) ?>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p class='pull-right'>
                                                            <img src="<?= base_url()."nota_tagihan.php/digisign/qr?data=".$hasil[0]->token ?>" />
                                                            </p>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p class='pull-right'>
                                                                <?= getNamaDokter($hasil[0]->verifikator) ?>
                                                            </p><br>
                                                        </div>
                                                        <?php 
                                                        } else{?>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="col-md-12">
                                                                <button class="btn btn-primary" id="btnhasil<?= $p->id_jenis_pemeriksaan ?>" onclick="updateHasilPemeriksaanPenunjang(<?= $p->id_jenis_pemeriksaan ?>)"><span class="fa fa-save" id="iconhasil<?= $p->id_jenis_pemeriksaan ?>"></span> Update</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div id="qrcode<?= $hasil[0]->idhasil ?>">
                                                                    <!-- <div class="col-md-12 ">
                                                                        <p class="pull-right">
                                                                        <button class="btn-primary btn-sm" id="btnsign" onclick="signHasilPenunjang('<?= $p->id_jenis_pemeriksaan ?>','<?= $hasil[0]->idhasil ?>','<?= $detail->idx ?>')"><span class="fa fa-certificate" id="iconsign" ></span> Sign</button>
                                                                        </p>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php 
                                                        } 
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <?php 
                                } 
                                ?>
                            </fieldset>
                        </form>
                        <?php if(!empty($pemeriksaan)){ ?>
                        <hr>
                        <div class="form-group btnsimpanhasil<?= $p->id_jenis_pemeriksaan ?>">
                            <button class="btn btn-primary" id="btnhasil<?= $p->id_jenis_pemeriksaan ?>" onclick="simpanHasilPemeriksaanPenunjang(<?= $p->id_jenis_pemeriksaan ?>)"><span class="fa fa-save" id="iconhasil<?= $p->id_jenis_pemeriksaan ?>"></span> Simpan</button>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <?php
                $no++;
            }
        }
        ?>
        
    </div>
</div>
<div id="digisign" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="digisign-title">DigiSign</h4>
            </div>
            <div class="modal-body">
                <div id="digisign-form"></div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var base_url = "<?= base_url() . "nota_tagihan.php/" ?>";
    var hak_verifikasi  = "<?= $hak_verifikasi ?>";
</script>
<script src="<?php echo base_url() ?>js/nota_tagihan.js"></script>
<script type="text/javascript">
    //showPemeriksaan("<?= $detail->reg_unit ?>","<?= $def ?>");
    setPemeriksaan("<?= $def ?>");
</script>