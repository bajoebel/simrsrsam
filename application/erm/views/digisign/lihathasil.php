<?php 
if(!empty($pemeriksaan)){
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
    // $pemeriksaan = $this->nota_model->getPemeriksaanByJenis($p->idx_pendaftaran,$p->id_jenis_pemeriksaan);
    $no=0;
    foreach ($pemeriksaan as $j ) {
        ?>
        <input type="hidden" id="id_pemeriksaan<?= $j->id_pemeriksaan ?>" name="id_pemeriksaan<?= $p->id_jenis_pemeriksaan ?>[]" value="<?= $j->id_pemeriksaan ?>">
        <input type="hidden" id="nama_pemeriksaan<?= $j->id_pemeriksaan ?>" name="nama_pemeriksaan<?= $j->id_pemeriksaan ?>" value="<?= $j->nama_pemeriksaan ?>">
        <?php
        $subperiksa=$this->nota_model->listSubPemeriksaan($j->id_pemeriksaan);
        if(empty($subperiksa)){
            $s=$this->nota_model->getPemeriksaanByid($j->id_pemeriksaan);
            if($s->satuan=='-') $satuan = ""; else $satuan=$s->satuan;
            if($s->nilai_rujukan_lk=='-') $nilai_rujukan_lk = ""; else $nilai_rujukan_lk=$s->nilai_rujukan_lk;
            if($s->nilai_rujukan_pr=='-') $nilai_rujukan_pr = ""; else $nilai_rujukan_pr=$s->nilai_rujukan_pr;
            if($p->template=="DahakTB"){
                ?>
                <legend><?= $j->nama_pemeriksaan ?></legend>
                <input type='hidden' name='id_subpemeriksaan<?= $j->id_pemeriksaan ?>[]' id='id_subpemeriksaan<?= $j->id_pemeriksaan ?>1' value='0'>
                <input type='hidden' name='subpemeriksaan<?= $j->id_pemeriksaan ?>0' id='subpemeriksaan<?= $j->id_pemeriksaan ?>0' value='<?= $j->nama_pemeriksaan  ?>'>
                <input type='hidden' name='satuan<?= $j->id_pemeriksaan ?>0' id='satuan<?= $j->id_pemeriksaan ?>0' value='<?= $s->satuan ?>'>
                <input type='hidden' name='nilai_rujukan_lk<?= $j->id_pemeriksaan ?>0' id='nilai_rujukan_lk<?= $j->id_pemeriksaan ?>0' value='<?= $s->nilai_rujukan_lk ?>'>
                <input type='hidden' name='nilai_rujukan_pr<?= $j->id_pemeriksaan ?>0' id='nilai_rujukan_pr<?= $j->id_pemeriksaan ?>0' value='<?= $s->nilai_rujukan_pr ?>'>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Hasil Pemeriksaan:</label>
                    <div class="col-sm-10">
                        <input type="radio" name="hasil<?= $j->id_pemeriksaan ?>0" id="pos<?= $j->id_pemeriksaan ?>0" value="Pos"> Positif
                        <input type="radio" name="hasil<?= $j->id_pemeriksaan ?>0" id="pos<?= $j->id_pemeriksaan ?>0" value="Neg"> Negatif<br>
                        <span class="text-error" id="err_hasil<?= $p->id_jenis_pemeriksaan.$no ?>"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Tingkat Positif:</label>
                    <div class="col-sm-10">
                        <select name="tingkatpositif<?= $j->id_pemeriksaan ?>0" id="tingkat_positif<?= $j->id_pemeriksaan ?>0" class="form-control">
                            <option value="-">Pilih</option>    
                            <option value='+++'>+++</option>
                            <option value='++'>++</option>
                            <option value='+'>+</option>
                            <option value='1-9'>1-9</option>
                        </select>
                        <span class="text-error" id="err_tingkatpositif<?= $p->id_jenis_pemeriksaan.$no ?>"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Visual Dahak:</label>
                    <div class="col-sm-10">
                        <input type="checkbox" value="1" name="nanah_lendir<?= $j->id_pemeriksaan ?>0">Nanah Lendir &nbsp;
                        <input type="checkbox" value="1" name="bercak_darah<?= $j->id_pemeriksaan ?>0">Bercak Darah &nbsp;
                        <input type="checkbox" value="1" name="air_liur<?= $j->id_pemeriksaan ?>0">Air Liur
                    </div>
                </div>
                <?php
            }else if($p->template=="Radiologi"){
                ?>
                <legend><?= $j->nama_pemeriksaan ?></legend>
                <input type='hidden' name='id_subpemeriksaan<?= $j->id_pemeriksaan ?>[]' id='id_subpemeriksaan<?= $j->id_pemeriksaan ?>0' value='0'>
                <input type='hidden' name='subpemeriksaan<?= $j->id_pemeriksaan ?>0' id='subpemeriksaan<?= $j->id_pemeriksaan ?>0' value='<?= $j->nama_pemeriksaan  ?>'>
                <input type='hidden' name='satuan<?= $j->id_pemeriksaan ?>0' id='satuan<?= $j->id_pemeriksaan ?>0' value='<?= $s->satuan ?>'>
                <input type='hidden' name='nilai_rujukan_lk<?= $j->id_pemeriksaan ?>0' id='nilai_rujukan_lk<?= $j->id_pemeriksaan ?>0' value='<?= $s->nilai_rujukan_lk ?>'>
                <input type='hidden' name='nilai_rujukan_pr<?= $j->id_pemeriksaan ?>0' id='nilai_rujukan_pr<?= $j->id_pemeriksaan ?>0' value='<?= $s->nilai_rujukan_pr ?>'>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Proyeksi:</label>
                    <div class="col-sm-10">
                    <input type="text" name="proyeksi<?= $j->id_pemeriksaan ?>0" class="form-control" id="proyeksi<?= $j->id_pemeriksaan ?>0" value="">
                    <span class="text-error" id="err_proyeksi<?= $p->id_jenis_pemeriksaan.$no ?>"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Hasil Pemeriksaan <?= $j->nama_pemeriksaan  ?>:</label>
                    <div class="col-sm-10">
                    <textarea name="hasil<?= $j->id_pemeriksaan ?>0" id="hasil<?= $j->id_pemeriksaan ?>0" cols="30" rows="10" class="form-control"></textarea>
                    <span class="text-error" id="err_hasil<?= $j->id_pemeriksaan ?>0"></span>
                    </div>
                </div>
                <?php
            }else if($p->template=="Patologi"){
                ?>
                <input type='hidden' name='id_subpemeriksaan<?= $j->id_pemeriksaan ?>[]' id='id_subpemeriksaan<?= $j->id_pemeriksaan ?>0' value='0'>
                <input type='hidden' name='subpemeriksaan<?= $j->id_pemeriksaan ?>0' id='subpemeriksaan<?= $j->id_pemeriksaan ?>0' value='<?= $j->nama_pemeriksaan  ?>'>
                <input type='hidden' name='satuan<?= $j->id_pemeriksaan ?>0' id='satuan<?= $j->id_pemeriksaan ?>0' value='<?= $s->satuan ?>'>
                <input type='hidden' name='nilai_rujukan_lk<?= $j->id_pemeriksaan ?>0' id='nilai_rujukan_lk<?= $j->id_pemeriksaan ?>0' value='<?= $s->nilai_rujukan_lk ?>'>
                <input type='hidden' name='nilai_rujukan_pr<?= $j->id_pemeriksaan ?>0' id='nilai_rujukan_pr<?= $j->id_pemeriksaan ?>0' value='<?= $s->nilai_rujukan_pr ?>'>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email"><?= $j->nama_pemeriksaan  ?>:</label>
                    <div class="col-sm-10">
                    <textarea name="hasil<?= $j->id_pemeriksaan ?>0" id="hasil<?= $j->id_pemeriksaan ?>0" cols="30" rows="5" class="form-control"></textarea>
                    <span class="text-error" id="err_hasil<?= $p->id_jenis_pemeriksaan.$no ?>"></span>
                    </div>
                </div>
                <?php
            }else{
                ?>
                <input type='hidden' name='id_subpemeriksaan<?= $j->id_pemeriksaan ?>[]' id='id_subpemeriksaan<?= $j->id_pemeriksaan ?>0' value='0'>
                <input type='hidden' name='subpemeriksaan<?= $j->id_pemeriksaan ?>0' id='subpemeriksaan<?= $j->id_pemeriksaan ?>0' value='-'>
                <input type='hidden' name='satuan<?= $j->id_pemeriksaan ?>0' id='satuan<?= $j->id_pemeriksaan ?>0' value='<?= $s->satuan ?>'>
                <input type='hidden' name='nilai_rujukan_lk<?= $j->id_pemeriksaan ?>0' id='nilai_rujukan_lk<?= $j->id_pemeriksaan ?>0' value='<?= $s->nilai_rujukan_lk ?>'>
                <input type='hidden' name='nilai_rujukan_pr<?= $j->id_pemeriksaan ?>0' id='nilai_rujukan_pr<?= $j->id_pemeriksaan ?>0' value='<?= $s->nilai_rujukan_pr ?>'>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email"><?= $j->nama_pemeriksaan  ?>:</label>
                    <div class="col-sm-5">
                        <input type="text" name="hasil<?= $j->id_pemeriksaan ?>0" id="hasil<?= $j->id_pemeriksaan ?>0" class="form-control">
                        <span class="text-error" id="err_hasil<?= $p->id_jenis_pemeriksaan.$no ?>"></span>
                    </div>
                    <div class="col-md-5">
                            <?php 
                            if($s->satuan=='-') $satuan = ""; else $satuan=$s->satuan;
                            if($s->nilai_rujukan_lk=='-') $nilai_rujukan_lk = ""; else $nilai_rujukan_lk=$s->nilai_rujukan_lk;
                            if($s->nilai_rujukan_pr=='-') $nilai_rujukan_pr = ""; else $nilai_rujukan_pr=$s->nilai_rujukan_pr;
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
            $no++;
        }else{
            ?>
            <legend><?= $j->nama_pemeriksaan ?></legend>
            <?php
            
            foreach ($subperiksa as $s ) {
                if($p->template=="DahakTB"){
                }else if($p->template=="Patologi"){
                }else{
                    ?>
                    <input type='hidden' name='id_subpemeriksaan<?= $j->id_pemeriksaan ?>[]' id='id_subpemeriksaan<?= $s->sub_id  ?>' value='<?= $s->sub_id  ?>'>
                    <input type='hidden' name='subpemeriksaan<?= $j->id_pemeriksaan.$s->sub_id  ?>' id='subpemeriksaan<?= $s->sub_id  ?>' value='<?= $s->sub_pemeriksaan  ?>'>
                    <input type='hidden' name='satuan<?= $j->id_pemeriksaan.$s->sub_id  ?>' id='satuan<?= $s->sub_id  ?>' value='<?= $s->satuan ?>'>
                    <input type='hidden' name='nilai_rujukan_lk<?= $j->id_pemeriksaan.$s->sub_id  ?>' id='nilai_rujukan_lk<?= $s->sub_id  ?>' value='<?= $s->nilai_rujukan_lk ?>'>
                    <input type='hidden' name='nilai_rujukan_pr<?= $j->id_pemeriksaan.$s->sub_id  ?>' id='nilai_rujukan_pr<?= $s->sub_id  ?>' value='<?= $s->nilai_rujukan_pr ?>'>
                    <?php 
                    if($s->kontrol=="textarea") { ?>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email"><?= $s->sub_pemeriksaan ?>:</label>
                            <div class="col-md-10">
                                <textarea name="hasil<?= $j->id_pemeriksaan.$s->sub_id ?>" id="hasil<?= $j->id_pemeriksaan.$s->sub_id ?>" cols="30" rows="5" class="form-control"></textarea>
                                <span class="text-error" id="err_hasil<?= $p->id_jenis_pemeriksaan.$no ?>"></span>
                            </div>
                        </div>
                    <?php 
                    }else{
                        ?>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email"><?= $s->sub_pemeriksaan ?>:</label>
                            <div class="col-md-5">
                                <input type="text" name="hasil<?= $j->id_pemeriksaan.$s->sub_id ?>" id="hasil<?= $j->id_pemeriksaan.$s->sub_id ?>" class="form-control">
                                <span class="text-error" id="err_hasil<?= $p->id_jenis_pemeriksaan.$no ?>"></span>
                            </div>
                            <div class="col-md-5">
                                <?php 
                                if($s->satuan=='-') $satuan = ""; else $satuan=$s->satuan;
                                if($s->nilai_rujukan_lk=='-') $nilai_rujukan_lk = ""; else $nilai_rujukan_lk=$s->nilai_rujukan_lk;
                                if($s->nilai_rujukan_pr=='-') $nilai_rujukan_pr = ""; else $nilai_rujukan_pr=$s->nilai_rujukan_pr;

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
                $no++;
            }
        }
    }
}else{
    // print_r($p);
    $hasil=$this->digisign_model->getDetailHasilPemeriksaanPenunjang($p->id_jenis_pemeriksaan,$hasil[0]->reg_unit);
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
            $isvalid=$this->digisign_model->verifyData($hasil[0]->idhasil);
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
                echo "<br><legend>Hasil Pemeriksaan ".$p->jenis_pemeriksaan."</legend>";
            }else {
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
                        if ($h->namapemeriksaan != $h->subpemeriksaan) {
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
                    $no=0;
                    if ($namapemeriksaan != $h->namapemeriksaan) {
                        $no++;
                        if ($h->namapemeriksaan != $h->subpemeriksaan) {
                            ?>
                            <legend><?= $h->namapemeriksaan ?></legend>
                            <div class="row">
                                <div class="col-md-2"><?= $h->subpemeriksaan ?></div>
                                <div class="col-md-10">: <?= $h->hasil ?></div>
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class="row">
                                <div class="col-md-2"><?= $h->namapemeriksaan ?></div>
                                <div class="col-md-10">: <?= $h->hasil ?></div>
                            </div>
                            <?php
                        }
                    }else{
                        ?>
                            <div class="row">
                                <div class="col-md-2"><?= $h->subpemeriksaan ?></div>
                                <div class="col-md-10">: <?= $h->hasil ?></div>
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
                <input type="hidden" name="idx_hasil<?= $hasil[0]->idjenispemeriksaan ?>" id="idx_hasil<?= $hasil[0]->idjenispemeriksaan ?>" value="<?= $hasil[0]->idhasil ?>" />
                <input type="hidden" name="id_daftar<?= $hasil[0]->idjenispemeriksaan ?>" id="id_daftar<?= $hasil[0]->idjenispemeriksaan ?>" value="<?php echo $detail->id_daftar ?>" />
                <input type="hidden" name="idx_pendaftaran<?= $hasil[0]->idjenispemeriksaan ?>" id="idx_pendaftaran<?= $hasil[0]->idjenispemeriksaan ?>" value="<?php echo $detail->idx ?>" />
                <input type="hidden" name="reg_unit<?= $hasil[0]->idjenispemeriksaan ?>" id="reg_unit<?= $hasil[0]->idjenispemeriksaan ?>" value="<?php echo $detail->reg_unit ?>" />
                <input type="hidden" name="nomr<?= $hasil[0]->idjenispemeriksaan ?>" id="nomr<?= $hasil[0]->idjenispemeriksaan ?>" value="<?php echo $detail->nomr ?>" />
                <input type="hidden" name="nama_pasien<?= $hasil[0]->idjenispemeriksaan ?>" id="nama_pasien<?= $hasil[0]->idjenispemeriksaan ?>" value="<?php echo $detail->nama_pasien ?>" />
                <input type="hidden" name="umur<?= $hasil[0]->idjenispemeriksaan ?>" id="umur<?= $hasil[0]->idjenispemeriksaan ?>" value="<?= $hasil[0]->umur ?>" />
                <input type="hidden" name="idruangpengirim<?= $hasil[0]->idjenispemeriksaan ?>" id="idruangpengirim<?= $hasil[0]->idjenispemeriksaan ?>" value="<?= $detail->asal_ruang ?>">
                <input type="hidden" name="ruangpengirim<?= $hasil[0]->idjenispemeriksaan ?>" id="ruangpengirim<?= $hasil[0]->idjenispemeriksaan ?>" value="<?= $detail->nama_asal_ruang ?>">
                <input type="hidden" name="template<?= $hasil[0]->idjenispemeriksaan ?>" id="template<?= $hasil[0]->idjenispemeriksaan ?>" value="<?= $p->template ?>">
                <input type="hidden" name="idjenis<?= $hasil[0]->idjenispemeriksaan ?>" id="idjenis<?= $hasil[0]->idjenispemeriksaan ?>" value="<?= $hasil[0]->idjenispemeriksaan ?>">
                <input type="hidden" name="jenis_pemeriksaan<?= $hasil[0]->idjenispemeriksaan ?>" id="jenis_pemeriksaan<?= $hasil[0]->idjenispemeriksaan ?>" value="<?= $hasil[0]->jenispemeriksaan ?>">
                <input type="hidden" name="idsubjenis<?= $hasil[0]->idjenispemeriksaan ?>" id="idsubjenis<?= $hasil[0]->idjenispemeriksaan ?>" value="<?= $hasil[0]->idsubjenispemeriksaan?>">
                <input type="hidden" name="subjenis<?= $hasil[0]->idjenispemeriksaan ?>" id="subjenis<?= $hasil[0]->idjenispemeriksaan ?>" value="<?= $hasil[0]->subjenispemeriksaan ?>">
                <input type="hidden" name="diagnosa<?= $hasil[0]->idjenispemeriksaan ?>" id="diagnosa<?= $hasil[0]->idjenispemeriksaan ?>" value="<?= $hasil[0]->diagnosa ?>">
                <input type="hidden" name="jenispemeriksaan<?= $hasil[0]->idjenispemeriksaan ?>" id="x-jenispemeriksaan<?= $hasil[0]->idjenispemeriksaan ?>" value="<?php echo $hasil[0]->jenispemeriksaan ?>">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Tanggal Pemeriksaan:</label>
                    <div class="col-sm-10">
                        <input type="text" name="tgl_pemeriksaan<?= $hasil[0]->idjenispemeriksaan ?>" class="form-control tanggal" id="tgl_pemeriksaan<?= $hasil[0]->idjenispemeriksaan ?>" value="<?= $hasil[0]->tanggal_periksa ?>" required>
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
                        <span class="text-error" id="err_petugas<?= $hasil[0]->idjenispemeriksaan ?>"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Check All:<?php if($this->session->userdata('level')==4){ ?><input type="checkbox" name="validasipetugas" id="validasipetugas"  onclick="validasi('',<?= $hasil[0]->idhasil ?>,<?= $hasil[0]->idjenispemeriksaan ?>,<?= $detail->idx ?>)" value="1" <?php if($checkall==1) echo "checked"; ?>><?php } ?></label>
                    <div class="col-sm-10">&nbsp;</div>
                </div>
                
                <?php 
                
                $namapemeriksaan = "";
                $start = 0;
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
                                <label class="control-label col-sm-2" for="email">Hasil Pemeriksaan:</label>
                                <div class="col-sm-10">
                                    <input type="radio" name="hasil<?= $h->idx ?>" id="pos<?= $h->idx ?>" value="Pos" <?php if($h->hasil=="Pos") echo "checked"; ?>> Positif
                                    <input type="radio" name="hasil<?= $h->idx ?>" id="pos<?= $h->idx ?>" value="Neg" <?php if($h->hasil=="Neg") echo "checked"; ?>> Negatif<br>
                                    <span class="text-error" id="err_hasil<?= $h->idx ?>"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Tingkat Positif:</label>
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
                                <label class="control-label col-sm-2" for="email">Visual Dahak:</label>
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
                }elseif($jenis->template == "Radiologi"){
                    $no=0;
                    foreach ($hasil as $h ) {
                        if ($namapemeriksaan != $h->namapemeriksaan) {
                            $no++;
                            if ($h->idsubpemeriksaan > 0) {
                            ?>
                            <legend><?= $h->namapemeriksaan; ?></legend>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email"><?= $h->subpemeriksaan ?>:</label>
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
                                <label class="control-label col-sm-2" for="email"><?= $h->namapemeriksaan ?>:</label>
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
                                <label class="control-label col-sm-2" for="email"><?= $h->subpemeriksaan ?>:</label>
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
                            <label class="control-label col-sm-2" for="email"><?= $h->namapemeriksaan ?>:</label>
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
                            } else {
                            ?>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email"><?= $h->namapemeriksaan ?>:<?php if($this->session->userdata('level')==4){ ?><input type="checkbox" name="validasipetugas<?= $h->idx?>" id="validasipetugas<?= $h->idx?>"  onclick="validasi(<?= $h->idx ?>,<?= $h->idhasil ?>,<?= $h->idjenispemeriksaan ?>,<?= $detail->idx ?>)" value="1" <?php if($h->validasipetugas==1) echo "checked"; ?> ><?php } ?></label>
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
                }
            ?>
            <?php
        } 

        if(empty($hasil[0]->verifikator && $this->session->userdata('level')==3) ){
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
            <?php } 
        ?>
        <table class="identitas" style="border: 0px;">
            <tr style="border: 0px;">
                <td style="border: 0px;">
                    <?php 
                    if(empty($hasil[0]->verifikator)&& $this->session->userdata('level')==3){
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
                                        <button class="btn-primary btn-sm" id="btnsign" onclick="signHasilPenunjang('<?= $p->id_jenis_pemeriksaan ?>','<?= $hasil[0]->idhasil ?>','<?= $idxdaftar ?>')"><span class="fa fa-certificate" id="iconsign" ></span> Sign</button>
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
                                        <button class="btn-primary btn-sm" id="btnsign" onclick="signHasilPenunjang('<?= $p->id_jenis_pemeriksaan ?>','<?= $hasil[0]->idhasil ?>')"><span class="fa fa-certificate" id="iconsign" ></span> Sign</button>
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