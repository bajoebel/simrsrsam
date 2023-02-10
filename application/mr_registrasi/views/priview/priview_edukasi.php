<?php 
if(empty($iepdetail)){
    ?>
     <form class="form-horizontal" method="POST" id="edukasi" action="#">
        <input type="hidden" name="iepid" id="iepid" value="<?= (!empty($iep)) ? $iep['id']:"" ?>">
        <input type="hidden" name="eduidx" id="eduidx" value="<?= $pasien['idx'] ?>">
        <input type="hidden" name="edunama" id="edunama" value="<?= $pasien['nama'] ?>">
        <input type="hidden" name="edunomr" id="edunomr" value="<?= $pasien['nomr'] ?>">
        <div class="form-group">
            <label class="control-label col-sm-3" for="email">Bahasa:</label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-md-6">
                    <input type="checkbox" id="indonesia" name="bahasa[]" value="Indonesia" <?php if($pasien['id_bahasa']==1167 || $pasien['id_bahasa']==1239) echo "checked" ?>> Indonesia &nbsp;
                    </div>
                    <div class="col-md-6">
                    <input type="checkbox" id="indonesia" name="peterjemah" value="1"> Kebutuhan Peterjemah
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                    <input type="checkbox" id="daerah" name="bahasa[]" value="Daerah" <?php if($pasien['id_bahasa']!=1167 && $pasien['id_bahasa']!=1239) echo "checked" ?>> Daerah &nbsp;
                    </div>
                    <div class="col-md-9 daerahlain" style="<?php if($pasien['id_bahasa']!=1167 && $pasien['id_bahasa']!=1239) echo "display:block;"; else echo "display:none;" ?>">
                        <input type="text" name="daerahlain" id="daerahlain" class="form-control input-sm" value="<?= $pasien["bahasa"]?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <input type="checkbox" id="isyarat" name="bahasa[]" value="Isyarat"> Isyarat &nbsp;
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-3">
                    <input type="checkbox" id="lain" name="bahasa[]" value="Lain-Lain"> Lain Lain &nbsp;
                    </div>
                    <div class="col-md-6 daerahlain" style="display:none;">
                        <input type="text" name="bahasalain" id="bahasalain" class="form-control input-sm">
                    </div>
                </div>
            
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Agama Pasien:</label>
            <div class="col-sm-9">
                <input type="hidden" name="agama" id="agama" value="<?= $pasien['id_agama'] ?>">
                <input type="text" name="vagama" id="vagama" class="form-control" value="<?= $pasien['agama'] ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Pendidikan Pasien:</label>
            <div class="col-sm-9">
                <input type="hidden" name="pendidikan" id="pendidikan" value="<?= $pasien['id_tk_pddkn'] ?>">
                <input type="text" name="vpendidikan" id="vpendidikan" class="form-control" value="<?= $pasien['pendidikan'] ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Kesediaan Menerima Informasi:</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <span class="input-group-addon"><input type="checkbox" name="bersedia" id="bersedia" value="1" onclick="alasanLain()" checked> Bersedia Menerima Informasi</span>
                    <input type="text" class="form-control" name="alasantidakbersedia" id="alasantidakbersedia" placeholder="Alasan " readonly>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Kemampuan Membaca:</label>
            <div class="col-sm-9">
            <input type="radio" name="baca" id="baik" value="1"> Baik
            <input type="radio" name="baca" id="kurang" value="0"> Kurang
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Keyakinan Dan Nilai Nilai:</label>
            <div class="col-sm-9">
                <input type="text" name="keyakinan" id="keyakinan" class="form-control" value="" >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Keterbatasan Fisik Dan Kognitif:</label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-md-5">
                        <input type="checkbox" name="terbatas_fisik[]" id="bicara" value="Gangguan Bicara">Gangguan Bicara<br>
                        <input type="checkbox" name="terbatas_fisik[]" id="penglihatan" value="Penglihatan Terganggu">Penglihatan Terganggu<br>
                        <input type="checkbox" name="terbatas_fisik[]" id="pendengaran" value="Pendengaran Terganggu">Pendengaran Terganggu<br>
                    </div>
                    <div class="col-md-4">
                        <input type="checkbox" name="terbatas_fisik[]" id="bicara" value="Fisik Lemah">Fisik Lemah<br>
                        <input type="checkbox" name="terbatas_fisik[]" id="kognitif" value="Kognitif Terbatas">Kognitif Terbatas<br>
                    </div>
                    <div class="col-md-12">
                    <input type="checkbox" name="terbatas_fisik[]" id="lain" value="Lain Lain">Lain Lain <input type="text" name="terbatas_fisik_lain" id="terbatas_fisik_lain" class="hidden">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Hambatan Emosional Dan Motivasi:</label>
            <div class="col-md-9">
                <input type="checkbox" name="hambatan[]" id="kurangmotivasi" value="Motivasi Kurang">Motivasi Kurang<br>
                <input type="checkbox" name="hambatan[]" id="gangguanemosional" value="Emosional Terganggu">Emosional Terganggu<br>
                <input type="checkbox" name="hambatan[]" id="hambatanlainnya" value="Lain-Lain" onclick="showHambatanLain()">Lain Lain <input type="text" name="hambatanlain" class="hidden" id="hambatanlain">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Topik Edukasi:</label>
            <div class="col-md-4">
                <input type="checkbox" name="topiklist[]" id="hakpasien" value="Hak Hak Pasien">Hak-Hak Pasien<br>
                <input type="checkbox" name="topiklist[]" id="aturanumum" value="Aturan Umum Rumah Sakit">Aturan Umum Rumah Sakit<br>
                <input type="checkbox" name="topiklist[]" id="perkiraanbiaya" value="Perkiraan Biaya Rawatan">Perkiraan Biaya Rawatan<br>
                <input type="checkbox" name="topiklist[]" id="alasanpenundaanlayanan" value="Alasan Penundaan Layanan">Alasan Penundaan Layanan<br>
                <input type="checkbox" name="topiklist[]" id="alasanketerlambatan" value="Alasan Keterlambatan Pelayanan">Alasan Keterlambatan Pelayanan<br>
                <input type="checkbox" name="topiklist[]" id="informasirujukan" value="Informasi Rujukan">Informasi Rujukan<br>
                <input type="checkbox" name="topiklist[]" id="topiklainnya" value="Lain-Lain">Lain Lain<br>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label class="control-label col-sm-6" for="pwd">Metode Edukasi:</label>
                    <div class="col-md-6">
                        <input type="checkbox" name="metode[]" id="diskusi" value="Diskusi">Diskusi<br>
                        <input type="checkbox" name="metode[]" id="ceramah" value="Ceramah">Ceramah<br>
                        <input type="checkbox" name="metode[]" id="demonstrasi" value="Demonstrasi">Demonstrasi
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-6" for="pwd">Media:</label>
                    <div class="col-md-6">
                        <input type="checkbox" name="media[]" id="liflet" value="1">Liflet<br>
                        <input type="checkbox" name="media[]" id="lemberbalik" value="2">Lembar Balik<br>
                        <input type="checkbox" name="media[]" id="audiovisual" value="3">Audio Visual<br>
                        <input type="checkbox" name="media[]" id="medialainnya" value="4">Lainnya
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Sasaran Edukasi:</label>
            <div class="col-md-9">
                <input type="checkbox" name="sasaran[]" id="pasien" value="Pasien">Pasien&nbsp;&nbsp;
                <input type="checkbox" name="sasaran[]" id="keluarga" value="Keluarga Pasien" onclick="showKeluarga()">Keluarga Pasien 
                <input type="text" name="namakeluarga" class="hide" id="namakeluarga" value="<?= $pasien['pjPasienNama'] ?>">
                <input type="text" name="hubungan_keluarga" class="hide" id="hubungan_keluarga" value="<?= $pasien['pjPasienHubKel'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Evaluasi Awal:</label>
            <div class="col-md-9">
                <input type="radio" name="evaluasi_awal" id="evaawal1" value="1">Sudah Mengerti&nbsp;&nbsp;
                <input type="radio" name="evaluasi_awal" id="evaawal2" value="2">Re-Edukasi &nbsp;&nbsp;
                <input type="radio" name="evaluasi_awal" id="evaawal3" value="3">Re-Demonstrasi &nbsp;&nbsp;
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Evaluasi Lanjut:</label>
            <div class="col-md-9">
                <input type="radio" name="evaluasi_lanjut" id="evaawal1" value="1">Re-Edukasi&nbsp;&nbsp;
                <input type="radio" name="evaluasi_lanjut" id="evaawal2" value="2">Re-Demonstrasi&nbsp;&nbsp;
                <input type="radio" name="evaluasi_lanjut" id="evaawal3" value="3">Sudah Mengerti &nbsp;&nbsp;
            </div>
        </div>
        <!-- <div class="form-group">
            <div class="col-sm-offset-3 col-sm-10">
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            </div>
        </div> -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-10">
            <button type="button" onclick="simpanEdukasi()" class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
        </form> 
    <?php
}else{
    ?>
    <style>
        @page {
            margin-left: 1mm;
            margin-top: 0mm;
            margin-right: 1mm;
            margin-bottom: 0mm;
            font-family: Cambria, Georgia, serif;
        }

        * {
            font-family: Cambria, Georgia, serif;
            font-size: 11px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: Cambria, Georgia, serif;
            text-align: center;
            width: 180mm;
        }

        table {
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 2px 1px;
        }

        table.identitas {
            width: 70mm;
            margin-left: 10px;
        }

        table.indentitas,
        table.identitas td {
            border: 0 !important;
        }

        table.kajian {
            width: 150mm
        }

        table.kajian,
        table.kajian td {
            border: 0 !important;
        }

        table.rencana {
            width: 100%;
        }

        table.rencana td {
            font-size: 10px !important;
        }

        #kode-form {
            width: 297mm;
            display: flex;
            justify-content: end;
        }

        #kode-form div {
            border: 1px solid black;
            border-radius: 5px;
            padding: 2px;
        }


        .header {
            width: 80mm;
        }

        .title {
            width: 150mm;
        }

        .kode {
            width: 80mm;
        }

        .logo {
            float: left;
            margin-right: 10px;
        }

        .logo img {
            height: 50px;
            margin-left: 10px;
        }

        .asesmen {
            display: flex;
        }

        .edukasi {
            display: flex;
            justify-content: space-between;
        }
    </style>
    <div id="kode-form">
        <div>FORM RM 6.3.00 Rev 02</div>
    </div>
    <table width="297mm">
        <tr>
            <td>
                <div class="header">
                    <div class="logo">
                        <img src="<?php echo base_url() ?>assets/images/logo.png" />
                    </div>
                    <div class="info">
                        RSUD Dr. Achmad Mochtar Bukittinggi
                        <br />
                        Jl. Dr. A. Rivai Bukittinggi - 26114
                        <br />
                        Telp. (0752) 21720-21492-21831-21322
                        <br />
                        Fax. (0752) 21321
                    </div>
                </div>
            </td>
            <td>
                <div class="title">
                    <div style='font-size:16px !important;font-weight:bold; text-align:center'>CATATAN PEMBERIAN INFORMASI DAN EDUKASI<br>PASIEN DAN KELUARGA TERINTEGRASI</div>
                </div>
            </td>
            <td>
                <div class="kode">
                    <div class='kode-pasien'>
                        <table class='identitas'>
                            <tr>
                                <td width='50%'>No.Rekam Medis</td>
                                <td width='50%'>: <?= $pasien['nomr'] ?></td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>: <?= $pasien['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>: <?= DateToIndo($pasien['tgl_lahir']) ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: <?= jns_kelamin($pasien['jns_kelamin']) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='3'>
                Intruksi : Beri tanda Check &#9745; pada kotak yang sesuai dengan kondisi dan kebutuhan pasien, dan isi titik-titik dengan hasil asesmen yang sesuai
            </td>
        </tr>
        <tr>
            <td colspan='3'>
                <div style="text-align: center;font-weight:bold">
                    ASESMEN KEMAMPUAN, KEMAUAN BELAJAR
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='3'>
                <div class="asesmen">
                    <div class="asesmen1">
                        <b>Pengkajian Umum</b>
                        <table class="kajian">
                            <tr>
                                <td width='20%'>Bahasa Yang Digunakan</td>
                                <td>
                                    :
                                    <!-- <span>&#9744; Indonesia</span>
                                    <span style='margin-left:4mm'>&#9744; Daerah (sebutkan) <?= str_pad(" ", 30, ".") ?></span>
                                    <span style='margin-left:4mm'>&#9744; Isyarat</span>
                                    <span style='margin-left:4mm'>&#9744; Lain-lain <?= str_pad(" ", 30, ".") ?></span> -->
                                    <?= arr_to_list($iep['bahasa'], "<span style='margin-left:4mm'>&#9745;", "</span>"); ?>
                                    <?= ($iep['bahasa_lain'] != null) ? ", " . $iep['bahasa_lain'] : "-" ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Kebutuhan Penerjemah</td>
                                <td>
                                    :
                                    <span>&#9745; <?= trueOrFalse($iep['penerjemah']) ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Agama Pasien</td>
                                <td>
                                    :
                                    <span>&#9745; <?= agama($iep['agama']) ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Pendidikan Pasien</td>
                                <td>
                                    :
                                    <span>&#9745; <?= pendidikan($iep['pendidikan']) ?></span>

                                </td>
                            </tr>
                            <tr>
                                <td>Kesedian Menerima Informasi</td>
                                <td>
                                    :
                                    <span>&#9745; <?= ($iep['kesediaan'] == 1) ? "Bersedia" : "Tidak Bersedia, alasannya :" . $iep['kesediaan_alasan']  ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Kemampuan Membaca</td>
                                <td>
                                    :
                                    <span>&#9745; <?= ($iep['kesediaan'] == 1) ? "Baik" : "Kurang" ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Keyakinan dan Nilai-nilai</td>
                                <td>
                                    :
                                    <span>&#9745; <?= $iep['keyakinan'] ?></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="asesmen2">
                        <table class="kajian">
                            <tr>
                                <td>Keterbatasan Fisik dan Kognitif</td>
                                <td>
                                    <!-- <span>&#9744; Tidak ada</span><br />
                                    <span>&#9744; Penglihatan terganggu</span><br />
                                    <span>&#9744; Pendengaran terganggu</span><br /> -->
                                    <?= arr_to_list($iep['terbatas_fisik'], "<span> &#9745;", " </span>") ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Hambatan Emosional dan Motivasi</td>
                                <td>
                                    <!-- <span>&#9744; Tidak ada</span><br />
                                    <span>&#9744; Motivasi Kurang</span><br />
                                    <span>&#9744; Emosional Terganggu</span><br />
                                    <span>&#9744; Lain-lain <?= str_pad(" ", 30, ".") ?></span><br /> -->
                                    <?= arr_to_list($iep['hambatan'], "<span> &#9745;", " </span>") ?>
                                    <?= ($iep['hambatan_lain'] != null) ? "Lainnya..., " . $iep['hambatan_lain'] : "" ?>
                                </td>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='3'>
                <div>
                    <span>ASESMEN KEMAMPUAN, KEMAUAN BELAJAR <small>(lingkari nomor sesuai kebutuhan pasien)</small></span>
                    <!-- <span style="margin-left:10mm">&#9744; 1. Asuhan Medis</span>
                    <span style="margin-left:5mm">&#9744; 2. Asuhan Keperawatan</span>
                    <span style="margin-left:5mm">&#9744; 3. Pengobatan</span>
                    <span style="margin-left:5mm">&#9744; 4. Asuhan Gizi</span>
                    <span style="margin-left:5mm">&#9744; 5. Manajamen Nyeri</span>
                    <span style="margin-left:5mm">&#9744; 6. Rehabilitasi</span><br />
                    <span style="margin-left:5mm">&#9744; 7. Penggunaan alat-alat medis</span>
                    <span style="margin-left:5mm">&#9744; 9. Hand Hygiene</span>
                    <span style="margin-left:5mm">&#9744; 10. Rohani</span>
                    <span style="margin-left:5mm">&#9744; 11. Pendaftaran dan admisi</span>
                    <span style="margin-left:5mm">&#9744; 12. Prosedur dan perawatan</span> -->
                    <?= arr_to_list($iep['kebutuhan_edukasi'], "<span style='margin-left:5mm'>&#9745;", "</span>") ?>
                    <?= ($iep['kebutuhan_edukasi_lain'] != null) ? "Lainnya..., " . $iep['kebutuhan_edukasi_lain'] : "" ?>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='3'>
                <span>PERENCANAAN EDUKASI</span>
                <div class="edukasi">
                    <div class='metode'>
                        <span>Metode <small>(Ceklist Nomor berikut sesuai metode direncanakan)</small></span><br />
                        <!-- <span style="margin-left:5mm">1. Diskusi</span>
                        <span style="margin-left:5mm">2. Ceramah</span>
                        <span style="margin-left:5mm">3. Demontrasi</span> -->
                        <?= arr_to_list($iep['metode'], "<span style='margin-left:5mm'>&#9745;", "</span>") ?>
                    </div>
                    <div class='media'>
                        <span>Media <small>(ceklist Nomor berikut)</small></span><br />
                        <!-- <span style="margin-left:5mm">1. Liflet</span>
                        <span style="margin-left:5mm">2. Lembar Balik</span>
                        <span style="margin-left:5mm">3. Audio Visual</span>
                        <span style="margin-left:5mm">3. Lain-lain <?= str_pad(" ", 30, ".") ?></span> -->
                        <?= arr_to_list($iep['media'], "<span style='margin-left:5mm'>&#9745;", "</span>") ?>
                    </div>
                    <div class='sasaran'>
                        <span>Sasaran Edukasi <small>(Lingkari Nomor berikut)</small></span><br />
                        <?= arr_to_list($iep['sasaran_edukasi'], "<span style='margin-left:5mm'>&#9745;", "</span>") ?>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <table class="rencana">
                    <tr>
                        <td rowspan="2" style="text-align:center;width:10mm">TANGGAL/JAM</td>
                        <td rowspan="2" style="text-align:center;width:50mm">TOPIK EDUKASI</td>
                        <td rowspan="2" style="text-align:center;width:25mm">METODE</td>
                        <td rowspan=" 2" style="text-align:center;width:25mm">MEDIA EDUKASI</td>
                        <td colspan="2" style="text-align:center">SASARAN EDUKASI</td>
                        <td style="text-align:center">EVALUASI AWAL</td>
                        <td colspan="2" style="text-align:center">PEMBERI EDUKASI</td>
                        <td rowspan="2" style="text-align:center">VERIFIKASI(Pertanyaan Pasien/Keluarga)</td>
                        <td style="text-align:center">EVALUASI LANJUTAN</td>
                    </tr>
                    <tr>
                        <td style="text-align:center">Nama</td>
                        <td style="text-align:center">TTD</td>
                        <td style="text-align:center">
                            1. Sudah Mengerti<br />
                            2. Re-Edukasi<br />
                            3. Re-Demonstrasi<br />
                        </td>
                        <td style="text-align:center">NAMA</td>
                        <td style="text-align:center">TTD</td>
                        <!-- <td>Verifikasi (Pertanyaan Pasien/Keluarga)</td> -->
                        <td style="text-align:center">
                            1. Sudah Mengerti<br />
                            2. Re-Edukasi<br />
                            3. Re-Demonstrasi<br />
                        </td>
                    </tr>
                    <?php
                    $list =  $iepdetail;
                    foreach ($list as $rl) {
                    ?>
                        <tr>
                            <td><?= DateToIndo($rl['tgl']) . "/" . $rl['jam'] ?></td>
                            <td>
                                <b><?= ($rl->topik_title) ?></b><br>
                                <!-- &#9744; Hak-hak pasien<br>
                                &#9744; Aturan Umum RS<br>
                                &#9744; Perkiraan Biaya Rawatan<br>
                                &#9744; Alasan Penundaan Pelayanan<br>
                                &#9744; Informasi Rujukan<br>
                                &#9744; Lain-lain <?= str_pad(" ", 30, ".") ?><br> -->
                                <?= arr_to_list($rl['topik_list']) ?>
                            </td>
                            <td style="text-align:center">&nbsp;<?= $rl['metode'] ?></td>
                            <td style="text-align:center">&nbsp;<?= $rl['media'] ?></td>
                            <td style="text-align:center">&nbsp;<?= $rl['sasaran'] ?></td>
                            <td style="text-align:center">&nbsp;&#10004;</td>
                            <td style="text-align:center">&nbsp;<?= $rl['evaluasi_awal'] ?></td>
                            <td style="text-align:center">&nbsp;<?= $rl['pemberi_edukasi'] ?></td>
                            <td style="text-align:center">&nbsp;<div id="qrcode_epd_<?=$rl['id']?>"></div></td>
                            <td style="text-align:center">&nbsp;<?= $rl['verifikasi'] ?></td>
                            <td style="text-align:center">&nbsp;<?= $rl['evaluasi_lanjut'] ?></td>
                        </tr>
                         <!-- qrcode -->
                        <script type="text/javascript">
                            var id = "<?= $rl['id']?>";
                            var code = "<?= $rl['pemberiSign']?>";
                            if (code) {
                                var qrcode = new QRCode(document.getElementById("qrcode_epd_"+id), {
                                    text: code,
                                    width: 60,
                                    height: 60,
                                    colorDark : "#000",
                                    colorLight : "#fff",
                                });
                                $(`#qrcode_epd_${id} > img`).css({"margin":"auto"});
                            }
                        </script>
                    <?php } ?>
                </table>
            </td>
        </tr>
    </table>
    <?php
}
?>
<script>
    function alasanLain(){
        $('#alasan').prop('readonly',false); 
        var bersedia=$('#bersedia').prop('checked');
        // alert(bersedia);
        if(bersedia==true) {
            
            $('#alasantidakbersedia').prop('readonly',true); 
        }else {
            // alert("isi alasan")
            $('#alasantidakbersedia').prop('readonly',false);
        }
    }
    function showKeluarga(){
        $('#keluarga').prop('readonly',false); 
        var kel=$('#keluarga').prop('checked');
        // alert(bersedia);
        if(kel==true) {
            
            $('#namakeluarga').removeClass('hide'); 
        }else {
            // alert("isi alasan")
            $('#namakeluarga').addClass('hide');
        }
    }
</script>