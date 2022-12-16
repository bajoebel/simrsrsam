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
            width: 30%;
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
            justify-content: end;
        }

        .pasien {
            margin-right: 60px;
            text-align: left;
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
                        <div class='kode-form'>FORM RM 1.1.00.00 Rev. 02</div>
                        <div class='kode-pasien'>
                            <table>
                                <tr>
                                    <td>No.Rekam Medis</td>
                                    <td>:</td>
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
                </div>
                <div class="content">
                    <h3 style="font-family: Cambria,Georgia,serif;">HAK DAN KEWAJIBAN PASIEN RUMAH SAKIT</h3>
                    <table>
                        <tr>
                            <td><b><span style='text-decoration:underline;margin-left:20px'>HAK PASIEN(Permenkes No.4 tahun 2018) </span></b></td>
                        </tr>
                        <tr>
                            <td>
                                <ol>
                                    <li>Memperoleh informasi mengenai tata tertib dan peraturan yang berlaku di RumahSakit; </li>
                                    <li>Memperoleh informasi tentang hak dan kewajiban Pasien; </li>
                                    <li>Memperoleh layanan yang manusiawi, adil, jujur, dan tanpa diskriminasi; </li>
                                    <li>Memperoleh layanan kesehatan yang bermutu sesuai dengan standard profesi dan standard prosedur operasional; </li>
                                    <li>Memperoleh layanan yang efektif dan efisien sehingga Pasien terhindar dari kerugian fisik dan materi; </li>
                                    <li>Mengajukan pengaduan atas kualitas pelayanan yang didapatkan; </li>
                                    <li>Memilih dokter, dokter gigi, dan kelas perawatan sesuai dengan keinginannya dan peraturan yang berlaku di RumahSakit</li>
                                    <li>Meminta konsultasi tentang penyakit yang dideritanya kepada dokter lain yang mempunyai Surat Izin Praktik (SIP) baik di dalam maupun di luar RumahSakit; </li>
                                    <li>Mendapatkan privasi dan kerahasiaan penyakit yang diderita termasuk data medisnya; </li>
                                    <li>Mendapat informasi yang meliputi diagnosis dan tata cara tindakan medis, tujuan tindakan medis, alternative tindakan, risiko dan komplikasi yang mungkin terjadi, dan prognosis terhadap tindakan yang dilakukan serta perkiraan biaya pengobatan; </li>
                                    <li>Memberikan persetujuan atau menolak atas tindakan yang akan dilakukan oleh Tenaga Kesehatan terhadap penyakit yang dideritanya; </li>
                                    <li>Didampingi keluarganya dalam keadaan kritis; </li>
                                    <li>Menjalankan ibadah sesuai agama atau kepercayaan yang dianutnya selama hal itu tidak mengganggu Pasien lainnya; </li>
                                    <li>Memperoleh keamanan dan keselamatan dirinya selama dalam perawatan di Rumah Sakit; </li>
                                    <li>Mengajukan usul, saran, perbaikan atas perlakuan Rumah Sakit terhadap dirinya; </li>
                                    <li>Menolak pelayanan bimbingan rohani yang tidak sesuai dengan agama dan kepercayaan yang dianutnya; </li>
                                    <li>Menggugat dan / atau menuntut Rumah Sakit apabila Rumah Sakit diduga memberikan pelayanan yang tidak sesuai dengan standard baik secara perdata ataupun pidana; dan </li>
                                    <li>Mengeluhkan pelayanan RumahSakit yang tidak sesuai dengan standard pelayanan melalui media cetak dan elektronik sesuai dengan ketentuan peraturan perundang-undangan. </li>


                                </ol>
                            </td>
                        </tr>
                        <tr>
                            <td><b><span style='text-decoration:underline;margin-left:20px'>KEWAJIBAN PASIEN(Permenkes No.4 tahun 2018) </span></b></td>
                        </tr>
                        <tr>
                            <td>
                                <ol>
                                    <li>Mematuhi peraturan yang berlaku di Rumah Sakit; </li>
                                    <li>Menggunakan fasilitas Rumah Sakit secara bertanggung jawab; </li>
                                    <li>Menghormati hak Pasien lain, pengunjung dan hak Tenaga Kesehatan serta petugas lainnya yang bekerja di RumahSakit ;</li>
                                    <li>Memberikan informasi yang jujur, lengkap dan akurat sesuai dengan kemampuan dan pengetahuannya tentang masalah kesehatannya; </li>
                                    <li>Memberikan informasi mengenai kemampuan finansial dan jaminan kesehatan yang dimilikinya; </li>
                                    <li>Mematuhi rencana terapi yang direkomendasikan oleh Tenaga Kesehatan di Rumah Sakit dan disetujui oleh Pasien yang bersangkutan setelah mendapatkan penjelasan sesuai dengan ketentuan peraturan perundang-undangan; </li>
                                    <li>Menerima segala konsekuensi atas keputusan pribadinya untuk menolak rencana terapi yang direkomendasikan oleh Tenaga Kesehatan dan / atau tidak mematuhi petunjuk yang diberikan oleh Tenaga Kesehatan untuk penyembuhan penyakit atau masalah kesehatannya; dan </li>
                                    <li>Memberikan imbalan jasa atas pelayanan yang diterima. </li>
                                </ol>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="sign_in">
                    <div class="pasien">
                        <table style="margin-top:0px">
                            <tr>
                                <td>Bukittinggi, <?php echo DateToIndo(date('Y-m-d')) ?></td>
                            </tr>
                            <tr>
                                <td>Saya telah memahami hak dan kewajiban pasien<br>Pasien/Keluarga/Penanggung Jawab</td>
                            </tr>
                            <tr>
                                <td height="50px">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>( <?= str_pad(" ",70,".")?> )</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </td>
        </tr>
    </table>
</body>

</html>