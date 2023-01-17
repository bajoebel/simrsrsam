<?php
$date = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Masuk Rawat Jalan</title>
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
     <script src="<?php echo base_url() ?>assets/jquery/js/jquery-3.3.1.min.js"></script>
    <!-- qrcode -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/qrcodejs/qrcode.js"></script>
</head>

<body>
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
                                <td width='50%'>: <?= $p->nomr ?></td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>: <?= $p->nama ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>: <?= DateToIndo($p->tgl_lahir) ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: <?= jns_kelamin($p->jns_kelamin) ?></td>
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
                                    <?= arr_to_list($k->bahasa, "<span style='margin-left:4mm'>&#9745;", "</span>"); ?>
                                    <?= ($k->bahasa_lain != null) ? ", " . $k->bahasa_lain : "-" ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Kebutuhan Penerjemah</td>
                                <td>
                                    :
                                    <span>&#9745; <?= trueOrFalse($k->penerjemah) ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Agama Pasien</td>
                                <td>
                                    :
                                    <span>&#9745; <?= agama($k->agama) ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Pendidikan Pasien</td>
                                <td>
                                    :
                                    <span>&#9745; <?= pendidikan($k->pendidikan) ?></span>

                                </td>
                            </tr>
                            <tr>
                                <td>Kesedian Menerima Informasi</td>
                                <td>
                                    :
                                    <span>&#9745; <?= ($k->kesediaan == 1) ? "Bersedia" : "Tidak Bersedia, alasannya :" . $k->kesediaan_alasan  ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Kemampuan Membaca</td>
                                <td>
                                    :
                                    <span>&#9745; <?= ($k->kesediaan == 1) ? "Baik" : "Kurang" ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Keyakinan dan Nilai-nilai</td>
                                <td>
                                    :
                                    <span>&#9745; <?= $k->keyakinan ?></span>
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
                                    <?= arr_to_list($k->terbatas_fisik, "<span> &#9745;", " </span>") ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Hambatan Emosional dan Motivasi</td>
                                <td>
                                    <!-- <span>&#9744; Tidak ada</span><br />
                                    <span>&#9744; Motivasi Kurang</span><br />
                                    <span>&#9744; Emosional Terganggu</span><br />
                                    <span>&#9744; Lain-lain <?= str_pad(" ", 30, ".") ?></span><br /> -->
                                    <?= arr_to_list($k->hambatan, "<span> &#9745;", " </span>") ?>
                                    <?= ($k->hambatan_lain != null) ? "Lainnya..., " . $k->hambatan_lain : "" ?>
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
                    <?= arr_to_list($k->kebutuhan_edukasi, "<span style='margin-left:5mm'>&#9745;", "</span>") ?>
                    <?= ($k->kebutuhan_edukasi_lain != null) ? "Lainnya..., " . $k->kebutuhan_edukasi_lain : "" ?>
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
                        <?= arr_to_list($k->metode, "<span style='margin-left:5mm'>&#9745;", "</span>") ?>
                    </div>
                    <div class='media'>
                        <span>Media <small>(ceklist Nomor berikut)</small></span><br />
                        <!-- <span style="margin-left:5mm">1. Liflet</span>
                        <span style="margin-left:5mm">2. Lembar Balik</span>
                        <span style="margin-left:5mm">3. Audio Visual</span>
                        <span style="margin-left:5mm">3. Lain-lain <?= str_pad(" ", 30, ".") ?></span> -->
                        <?= arr_to_list($k->media, "<span style='margin-left:5mm'>&#9745;", "</span>") ?>
                    </div>
                    <div class='sasaran'>
                        <span>Sasaran Edukasi <small>(Lingkari Nomor berikut)</small></span><br />
                        <?= arr_to_list($k->sasaran_edukasi, "<span style='margin-left:5mm'>&#9745;", "</span>") ?>
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
                    $db2 = $this->load->database('dberm', TRUE);
                    $list =  $db2->where(['id_rj_iep' => $k->id])
                        ->order_by("topik_id asc, tgl asc")
                        ->get("rj_iep_detail")->result();
                    foreach ($list as $rl) {
                    ?>
                        <tr>
                            <td><?= DateToIndo($rl->tgl) . "/" . $rl->jam ?></td>
                            <td>
                                <b><?= ($rl->topik_title) ?></b><br>
                                <!-- &#9744; Hak-hak pasien<br>
                                &#9744; Aturan Umum RS<br>
                                &#9744; Perkiraan Biaya Rawatan<br>
                                &#9744; Alasan Penundaan Pelayanan<br>
                                &#9744; Informasi Rujukan<br>
                                &#9744; Lain-lain <?= str_pad(" ", 30, ".") ?><br> -->
                                <?= arr_to_list($rl->topik_list) ?>
                            </td>
                            <td style="text-align:center">&nbsp;<?= $rl->metode ?></td>
                            <td style="text-align:center">&nbsp;<?= $rl->media ?></td>
                            <td style="text-align:center">&nbsp;<?= $rl->sasaran ?></td>
                            <td style="text-align:center">&nbsp;&#10004;</td>
                            <td style="text-align:center">&nbsp;<?= $rl->evaluasi_awal ?></td>
                            <td style="text-align:center">&nbsp;<?= $rl->pemberi_edukasi ?></td>
                            <td style="text-align:center">&nbsp;<div id="qrcode_epd_<?=$rl->id?>"></div></td>
                            <td style="text-align:center">&nbsp;<?= $rl->verifikasi ?></td>
                            <td style="text-align:center">&nbsp;<?= $rl->evaluasi_lanjut ?></td>
                        </tr>
                         <!-- qrcode -->
                        <script type="text/javascript">
                            var id = "<?= $rl->id?>";
                            var code = "<?= $rl->pemberiSign?>";
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
</body>
<script>

</script>
</html>