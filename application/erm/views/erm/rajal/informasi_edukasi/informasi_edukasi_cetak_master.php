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
                                <td width='50%'>:</td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
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
                                    <span>&#9744; Indonesia</span>
                                    <span style='margin-left:4mm'>&#9744; Daerah (sebutkan) <?= str_pad(" ", 30, ".") ?></span>
                                    <span style='margin-left:4mm'>&#9744; Isyarat</span>
                                    <span style='margin-left:4mm'>&#9744; Lain-lain <?= str_pad(" ", 30, ".") ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Kebutuhan Penerjemah</td>
                                <td>
                                    :
                                    <span>&#9744; Ya</span>
                                    <span style='margin-left:4mm'>&#9744; Tidak</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Agama Pasien</td>
                                <td>
                                    :
                                    <span>&#9744; Islam</span>
                                    <span style='margin-left:4mm'>&#9744;Kristen</span>
                                    <span style='margin-left:4mm'>&#9744;Katolik</span>
                                    <span style='margin-left:4mm'>&#9744;Hindu</span>
                                    <span style='margin-left:4mm'>&#9744;Budha</span>
                                    <span style='margin-left:4mm'>&#9744;Konghocu</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Pendidikan Pasien</td>
                                <td>
                                    :
                                    <span>&#9744; SD</span>
                                    <span style='margin-left:4mm'>&#9744;SMP</span>
                                    <span style='margin-left:4mm'>&#9744;SMA</span>
                                    <span style='margin-left:4mm'>&#9744;PT</span>
                                    <span style='margin-left:4mm'>&#9744;Tidak Sekolah</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Kesedian Menerima Informasi</td>
                                <td>
                                    :
                                    <span>&#9744; Bersedia</span>
                                    <span style='margin-left:4mm'>&#9744;Tidak Bersedia (alasannya) <?= str_pad(" ", 30, ".") ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Kemampuan Membaca</td>
                                <td>
                                    :
                                    <span>&#9744; Baik</span>
                                    <span style='margin-left:4mm'>&#9744;Kurang</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Keyakinan dan Nilai-nilai</td>
                                <td>
                                    :
                                    <span>&#9744; <?= str_pad(" ", 30, ".") ?></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="asesmen2">
                        <table class="kajian">
                            <tr>
                                <td>Keterbatasan Fisik dan Kognitif</td>
                                <td>
                                    <span>&#9744; Tidak ada</span><br />
                                    <span>&#9744; Penglihatan terganggu</span><br />
                                    <span>&#9744; Pendengaran terganggu</span><br />
                                </td>
                                <td>
                                    <span>&#9744; Gangguan Bicara</span><br />
                                    <span>&#9744; Fisik Lemah</span><br />
                                    <span>&#9744; Kognitif terbatas</span><br />
                                    <span>&#9744; Lain-lain <?= str_pad(" ", 30, ".") ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Hambatan Emosional dan Motivasi</td>
                                <td>
                                    <span>&#9744; Tidak ada</span><br />
                                    <span>&#9744; Motivasi Kurang</span><br />
                                    <span>&#9744; Emosional Terganggu</span><br />
                                    <span>&#9744; Lain-lain <?= str_pad(" ", 30, ".") ?></span><br />
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
                    <span style="margin-left:10mm">&#9744; 1. Asuhan Medis</span>
                    <span style="margin-left:5mm">&#9744; 2. Asuhan Keperawatan</span>
                    <span style="margin-left:5mm">&#9744; 3. Pengobatan</span>
                    <span style="margin-left:5mm">&#9744; 4. Asuhan Gizi</span>
                    <span style="margin-left:5mm">&#9744; 5. Manajamen Nyeri</span>
                    <span style="margin-left:5mm">&#9744; 6. Rehabilitasi</span><br />
                    <span style="margin-left:5mm">&#9744; 7. Penggunaan alat-alat medis</span>
                    <span style="margin-left:5mm">&#9744; 9. Hand Hygiene</span>
                    <span style="margin-left:5mm">&#9744; 10. Rohani</span>
                    <span style="margin-left:5mm">&#9744; 11. Pendaftaran dan admisi</span>
                    <span style="margin-left:5mm">&#9744; 12. Prosedur dan perawatan</span>
                    <span style="margin-left:5mm">&#9744; 13. Lainnya <?= str_pad(" ", 30, ".") ?>(sebutkan)</span>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='3'>
                <span>PERENCANAAN EDUKASI</span>
                <div class="edukasi">
                    <div class='metode'>
                        <span>Metode <small>(Lingkari Nomor berikut sesuai metode direncanakan)</small></span><br />
                        <span style="margin-left:5mm">1. Diskusi</span>
                        <span style="margin-left:5mm">2. Ceramah</span>
                        <span style="margin-left:5mm">3. Demontrasi</span>
                    </div>
                    <div class='media'>
                        <span>Media <small>(Lingkari Nomor berikut)</small></span><br />
                        <span style="margin-left:5mm">1. Liflet</span>
                        <span style="margin-left:5mm">2. Lembar Balik</span>
                        <span style="margin-left:5mm">3. Audio Visual</span>
                        <span style="margin-left:5mm">3. Lain-lain <?= str_pad(" ", 30, ".") ?></span>
                    </div>
                    <div class='sasaran'>
                        <span>Sasaran Edukasi <small>(Lingkari Nomor berikut)</small></span><br />
                        <span style="margin-left:5mm">1. Pasien</span>
                        <span style="margin-left:5mm">2. Keluarga <?= str_pad(" ", 30, ".") ?></span>
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
                    <tr>
                        <td></td>
                        <td>
                            <b>PENDAFTARAN DAN ADMISI</b><br>
                            &#9744; Hak-hak pasien<br>
                            &#9744; Aturan Umum RS<br>
                            &#9744; Perkiraan Biaya Rawatan<br>
                            &#9744; Alasan Penundaan Pelayanan<br>
                            &#9744; Informasi Rujukan<br>
                            &#9744; Lain-lain <?= str_pad(" ", 30, ".") ?><br>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <b>DPJP/PPJM</b><br>
                            &#9744; Hasil Asesmen<br>
                            &#9744; Diagnona dan Rencana Asuhan<br>
                            &#9744; Proses Asuhan<br>
                            &#9744; Hasil Asuhan dan Pengobatan<br>
                            &#9744; Hasil Asuhan Yang Tidak Diharapkan<br>
                            &#9744; Asuhan Lanjutan di rumah<br>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            Resiko medis akibat asuhan medis yang belum lengkap (AMA dan APS)<br>
                            Lain-lain <?= str_pad(" ", 30, ".") ?>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <b>APOTEKER</b><br>
                            &#9744; Penggunaan Obat Efektif dan aman :<br>
                            Dosis<br>
                            Cara Makan<br>
                            Efek Samping<br>
                            Interaksi Obat<br>
                            Penyimpanan<br>
                            &#9744; lain-lain
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <b>DPJP/PPJA/PPA LAINNYA</b><br>
                            Penggunaan alat medis :<br>
                            Nama<br>
                            &#9744; Keamanan alat<br>
                            &#9744; Efektivitas Alat<br>
                            &#9744; Lain-lain <?= str_pad(" ", 30, ".") ?><br>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <b>Nyeri</b><br>
                            &#9744; Keamanan alat<br>
                            &#9744; Efektivitas Alat<br>
                            &#9744; Lain-lain <?= str_pad(" ", 30, ".") ?><br>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <b>Tekhnik-tekhnik Rehabilitasi (sebutkan)</b><br>
                            &#9744; <br>
                            &#9744; <br>
                            &#9744; <br>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <b>Diet Dan Nutrisi Yang Memadai</b><br>
                            &#9744; <br>
                            &#9744; <br>
                            &#9744; <br>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <b>Prosedur dan Perawatan</b><br>
                            &#9744; Cuci Tangan yang Benar <br>
                            &#9744; Penggunaan APD (masker,sarung tangan dll)<br>
                            &#9744; Mobilisasi/ROM<br>
                            &#9744; Batuk Efektif<br>
                            &#9744; Perawatan Metode Kangguru<br>
                            &#9744; Perawatan Bayi Baru Lahir<br>
                            &#9744; Pemberian makan melalui NGT<br>
                            &#9744; Perawatan luka<br>
                            &#9744; Inisiasi dan menyusui dini (IMD)<br>
                            &#9744; Asi Ekskusif<br>
                            &#9744; <?= str_pad(" ", 30, ".") ?><br>
                            &#9744; <?= str_pad(" ", 30, ".") ?><br>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <b>Rohaniawan</b><br>
                            &#9744; <br>
                            &#9744; <br>
                            &#9744; <br>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <b>PEMULANGAN PASIEN DAN ASUHAN LANJUTAN DI RUMAH</b><br>
                            &#9744; Jadwal kontrol ke Dokter <br>
                            &#9744; Dokumen yang dibawa pulang<br>
                            &#9744; Hasil Pemerikasaan Penunjang : Lab/RO<br>
                            &#9744; Rencana Pemerikasaan Penunjang : Lab/RO<br>
                            &#9744; Obat-obatan yang dibawa pulang<br>
                            &#9744; Penatalaksanaan Kesehatan di Rumah<br>
                            &#9744; Edukasi Asuhan Lanjutan<br>
                            <span style='margin-left:3mm'>&#9744; Perawatan luka</span><br>
                            <span style='margin-left:3mm'>&#9744; Dokter Keluarga</span><br>
                            <span style='margin-left:3mm'>&#9744; Home Care</span><br>
                            <span style='margin-left:3mm'>&#9744; Klinik Terdekat/Prakter Dokter Mandiri</span><br>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>