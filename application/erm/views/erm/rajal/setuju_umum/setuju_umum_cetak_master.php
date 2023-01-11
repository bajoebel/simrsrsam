<?php
$date = date("Y-m-d");
// print_r($c);
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
            margin-left: 2mm;
            margin-top: 0mm;
            margin-right: 0mm;
            margin-bottom: 0mm;
            font-family: Cambria, Georgia, serif;
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

        .wrap {
            font-family: Cambria, Georgia, serif;
            width: 180mm;
            height: 140px;
        }

        .header {
            border-bottom: 0px solid #000;
            height: 10px;
            float: left;
            font-weight: bold;
        }

        .kode {
            margin-top: 10px;
            margin-right: 50px;
            width: 40%;
            float: right;
            font-size: 13px;
            font-weight: bold;
        }

        .kode-form,
        .kode-pasien {
            margin-bottom: 5px;
            padding: 5px;
            border: 1px solid #000;
            border-radius: 5px 5px 5px;
        }

        .kode-pasien>table {
            margin-top: 0px !important;
        }

        .logo {
            float: left;
            margin-right: 10px;
        }

        .logo img {
            height: 90px;
        }

        .info {
            float: left;
            padding-top: 20px;
            font-size: 13px;
        }

        #info {
            width: 230px;
        }

        #spasi {
            width: 5px;
        }

        table {
            font-family: Cambria, Georgia, serif;
            font-size: 12px;
            margin-top: 10px;
        }

        table tr td {
            font-family: Cambria, Georgia, serif;
            font-size: 12px;
        }

        .content {
            width: 180mm;
        }

        .sign_in {
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>

<body>
    <table width="210mm" border="0">
        <tr>
            <td>
                <div class="wrap">
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
                    <div class="kode">
                        <div class='kode-form'>FORM RM 1.1.00 Rev. 02</div>
                        <div class='kode-pasien'>
                            <table>
                                <tr>
                                    <td>No.Rekam Medis</td>
                                    <td>: <?= $c[1] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>: <?= $c[2] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>: <?= $c[3] ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>: <?= $c[4] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <h3 style="font-family: Cambria,Georgia,serif;">Persetujuan Umum (General Consent)</h3>
                    <table>
                        <tr>
                            <td colspan='3'><b>PASIEN DAN ATAU WALI DIMINTA MEMBACA, MEMAHAMI DAN MENGISI INFORMASI BERIKUT</b></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table style="margin-top:0">
                                    <tr>
                                        <td>Yang Bertanda Tangan Di Bawah Ini</td>
                                        <td>: <?= $c[5] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Tanggal Lahir / Jenis Kelamin</td>
                                        <td>: <?= $c[6] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>: <?= $c[7] ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. Telp</td>
                                        <td>: <?= $c[8] ?></td>
                                    </tr>
                                </table>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan='3'>Selaku (<?= $c[9] ?>) dengan ini menyatakan persetujuan : </td>
                        </tr>
                        <tr>
                            <td colspan='3'>
                                <b>1. PERSETUJUAN UNTUK PERAWATAN DAN PENGOBATAN</b>
                                <br />
                                <span>&nbsp;&nbsp; 1) Saya mengetahui bahwa saya memiliki kondisi yang membutuhkan perawatan medis, saya mengizinkan dokter dan profesional kesehatan lainnya untuk melakukan prosedur dignostik dan untuk memberikan pengobatan medis seperti yang diperlukan dalam penilaian profesional mereka.</span>
                                <br />
                                <span>&nbsp;&nbsp; 2) Saya sadar bahwa praktik kedokteran bukanlah ilmu pasti dan saya mengakui bahwa tidak ada jaminan atas hasil apapun, terhadap perawatan prosedur atau pemeriksaan apapun yang dilakukan kepada saya.</span>
                                <br>
                                <span>&nbsp;&nbsp; 3) Saya mengetahui bahwa RSUD Dr. Achmad Mochtar Bukittinggi merupakan Rumah Sakit yang dipakai untuk Pendidikan. Karena itu, saya menyetujui bila mahasiswa kedokteran dan profesi kesehatan lain berpartisipasi dalam perawatan saya, sepanjang dibawah supervise oleh supervisornya.</span>
                                <br>
                                <b>2. KEINGINAN PRIVASI</b>
                                <br />
                                <span>&nbsp;&nbsp;&nbsp;&nbsp;Saya (mengizinkan/ tidak mengizinkan)* Rumah Sakit Memberi akses bagi : Keluarga serta orang yang akan menengok /menemui saya.</span>
                                <br />
                                <span>&nbsp;&nbsp;&nbsp;Saya menginginkan privasi khusus berupa:</span>
                                <br>
                                <!-- <span>&nbsp;&nbsp;&nbsp;1 <?= str_pad(" ", 30, ".") ?></span>
                                <br>
                                <span>&nbsp;&nbsp;&nbsp;2 <?= str_pad(" ", 30, ".") ?></span> -->
                                <?= $c[10] ?>
                                <!-- <br> -->
                                <b>3. PERSETUJUAN PELEPASAN INFORMASI</b>
                                <br />
                                <span>&nbsp;&nbsp;&nbsp;• Saya memahami informasi yang ada di dalam diri saya termasuk diagnosis, hasil laboratorium dan hasil tes diagnosis yang akan digunakan untuk perawatan medis, RSUD Dr Achmad Mochtar Bukittinggi akan menjamin kerahasiannya. </span>
                                <br />
                                <span>&nbsp;&nbsp;&nbsp;• Saya memberi wewenang kepada RSUD Dr Achmad Mochtar Bukittinggi untuk memberikan informasi tentang rahasia kedokteran saya bila diperlukan untuk memproses klaim asuransi dan atau lembaga pemerintah lainya.</span>
                                <br />
                                <span>&nbsp;&nbsp;&nbsp;• Saya memberi wewenang kepada RSUD Dr Achmad Mochtar Bukittinggi untuk memberikan (informasi / tidak)* tentang diagnosis, hasil pelayanan dan pengobatan saya kepada</span>
                                <br />
                                <span>&nbsp;&nbsp;<?= $c[11] ?>Terbatas Pada (sebutkan nama):</span>
                                <br>
                                <!-- <span>&nbsp;&nbsp;&nbsp;1 <?= str_pad(" ", 30, ".") ?></span>
                                <br>
                                <span>&nbsp;&nbsp;&nbsp;2 <?= str_pad(" ", 30, ".") ?></span>
                                <br> -->
                                <?= $c[12] ?>
                                <b>4. INFORMASI TATA TERTIB BAGI PASIEN,PENGUNJUNG DAN PENUNGGU PASIEN</b>
                                <br />
                                <span>&nbsp;&nbsp;&nbsp;Saya telah menerima informasi tentang peraturan yang diberlakukan oleh Rumah Sakit dan saya beserta keluarga bersedia untuk mematuhinya, termasuk akan mematuhi jam berkunjung pasien sesuai dengan aturan di Rumah Sakit.</span>
                                <br>
                                <b>5. INFORMASI BIAYA</b>
                                <br />
                                <span>&nbsp;&nbsp;&nbsp;Sebagai peserta JKN/IKS saya bersedia mengurus jaminan rawat inap dalam waktu 3 hari kerja (terhitung mulai pasien masuk) dan apabila saya tidak mengurus dalam waktu tersebut diatas, saya bersedia terdaftar sebagai pasien Umum/Pribadi. Saya memahami tentang informasi biaya pengobatan atau biaya tindakanyang dijelaskan oleh petugas Rumah Sakit.</span>
                                <br>
                            </td>
                        <tr>
                            <td colspan="3" style="text-align: center;"><b>Tanda Tangan</b></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <span>Dengan tanda tangan saya di bawah ini, saya menyatakan bahwa saya telah memahami item pada Persetujuan Umum/General Consent. </span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="sign_in">
                    <div class="pasien">
                        <table style="margin-top:0px">
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?= ($c[13] == "") ? str_pad("dfsd", 40, ".") : $c[13] ?> dari Pasien</td>
                            </tr>
                            <tr>
                                <td height="50px">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>( <?= ($c[14] == "") ? str_pad(" ", 40, ".") : $c[14]  ?> )</td>
                            </tr>
                        </table>
                    </div>
                    <div class="petugas">
                        <table style="margin-top:0px">
                            <tr>
                                <td>Bukittinggi, <?php echo DateToIndo(date('Y-m-d')) ?></td>
                            </tr>
                            <tr>
                                <td>Petugas Admission</td>
                            </tr>
                            <tr>
                                <td height="50px">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>( <?= ($c[15] == "") ? str_pad(" ", 40, ".") : $c[15]  ?> )</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </td>
        </tr>
    </table>
</body>

</html>