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
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" />
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
            width: 50%;
            float: right;
            font-size: 12px;
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
            height: 70px;
        }

        .info {
            float: left;
            padding-top: 10px;
            font-size: 10px;
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
            width:100%;
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
        .olcostum {
        counter-reset: item;
        margin-left: -14px;
        padding-left: 0;
        }
        .ol28{
            margin-left: -28px;
        }
        .licostum {
        display: block;
        margin-bottom: .5em;
        margin-left: 3em;
        }
        .licostum::before {
        display: inline-block;
        content: counter(item) ") ";
        counter-increment: item;
        width: 2em;
        margin-left: -2em;
        }
        .baris {
            margin-right: 0px;
            margin-left: 0px;
            width:800px;
        }
        .labelidentitas {
            float:left;
            width: 200px;
        }
        .keteranganidentitas {
            float:left;
            width: 500px;
        }
        canvas{
            border:1px solid #ccc;
            border-collapse:collapse;
            
        }
    </style>
</head>

<body style="text-align:justify;">
<div class="row">
    <div class="col-md-12">
        <div class="container" style="margin-top:20px; border: 1px solid #ccc; border-collapse:collapse;padding:0px;">
            <ul class="nav nav-tabs nav-pills">
                <li class="active"><a data-toggle="tab" href="#home">Tanda Tangan</a></li>
                <li><a data-toggle="tab" href="#menu1">Dokumen Persetujuan Umum (<b><i>general Consent</i></b>)</a></li>
                <li><a data-toggle="tab" href="#menu2">Dokumen Hak Dan Kewajiban Pasien</a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p style="font-weight:bold;font-size:18pt;"><?= ($selaku=="pasien") ? "Tanda Tangan Pasien" : "Tanda Tangan Keluarga Pasien" ?> </p><br>
                            <canvas id="signature-pasien" class="signature-pad" width=400 height=200></canvas>
                            <p style="font-weight:bold;font-size:18pt;"><?= $namattd ?></p>
                            <input type="hidden" name="id" id="id" value="<?= $id ?>">
                            <input type="hidden" name="nomr_pasien" id="nomr_pasien" value="<?= $nomr ?>">
                            <input type="hidden" name="nama_pasien" id="nama_pasien" value="<?= $nama ?>">
                            <input type="hidden" name="namattd" id="namattd" value="<?= $namattd ?>">
                            <input type="hidden" name="hubkeluarga" id="hubkeluarga" value="<?= ($selaku=="pasien") ? "Diri Sendiri" : $selaku ?>">
                            <input type="hidden" name="hubkeluargalain" id="hubkeluargalain" value="<?= $selaku_lainnya ?>">
                        </div>
                        <!-- <div class="col-md-6 text-center">
                            <h3>TTD Petugas</h3><br>
                            <canvas id="signature-petugas" class="signature-pad1" width=400 height=200></canvas>
                        </div> -->
                        <div class="col-md-12 text-center" >
                            <div style="border-top:1px solid #ccc; padding:10px;">
                                <button id="save" class="btn btn-primary">Save</button>
                                <button id="clear" class="btn btn-danger" >Clear</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12" >
                            <div style="padding:10px;">
                                <table style="width:180mm;" border="0">
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
                                                                <td>: <?= $nomr ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nama Lengkap</td>
                                                                <td>: <?= $nama ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tempat / Tanggal Lahir</td>
                                                                <td>: <?= $tempat_lahir ."/".longDate($tanggal_lahir) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jenis Kelamin</td>
                                                                <td>: <?= ($jk==1) ? "Laki-Laki": "Perempuan";?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                
                                                <table style="width:180mm;">
                                                    <tr>
                                                        <td colspan="3" style="text-align:center;"><h3 style="font-family: Cambria,Georgia,serif;">Persetujuan Umum (General Consent)</h3></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan='3'><b>PASIEN DAN ATAU WALI DIMINTA MEMBACA, MEMAHAMI DAN MENGISI INFORMASI BERIKUT</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <p>Yang Bertanda tangan dibawah ini :
                                                                <div class="baris">
                                                                    <div class="labelidentitas">Nama </div>
                                                                    <div class="keteranganidentitas">: <?= $namattd ?></div>
                                                                </div>
                                                                <br>
                                                                <div class="baris">
                                                                    <div class="labelidentitas">Tempat / Tgl Lahir / Jenis Kelamin </div>
                                                                    <div class="keteranganidentitas">: <?php ($jkttd==1) ? $jekel="Laki-Laki": $jekel="Perempuan"; ?><?= $tempat_lahirttd ."/".longDate($tanggal_lahirttd) ." / " .$jekel ?></div>
                                                                </div>
                                                                <br>
                                                                <div class="baris">
                                                                    <div class="labelidentitas">Alamat </div>
                                                                    <div class="keteranganidentitas">: <?= $alamatttd ?></div>
                                                                </div>
                                                                <br>
                                                                <div class="baris">
                                                                    <div class="labelidentitas">Nomor Telpon </div>
                                                                    <div class="keteranganidentitas">: <?= $phonettd ?></div>
                                                                </div>
                                                            </p>    
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan='3'>Selaku (<?= $selaku_lainnya=="" ? $selaku : $selaku_lainnya ?>) dengan ini menyatakan persetujuan : </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan='3'>
                                                            <ol style="margin-left:-30px;">
                                                                <li><b>PERSETUJUAN UNTUK PERAWATAN DAN PENGOBATAN</b>
                                                                    <ol class="olcostum">
                                                                        <li class="licostum">Saya mengetahui bahwa saya memiliki kondisi yang membutuhkan perawatan medis, saya mengizinkan dokter dan profesional kesehatan lainnya untuk melakukan prosedur dignostik dan untuk memberikan pengobatan medis seperti yang diperlukan dalam penilaian profesional mereka.</li>
                                                                        <li class="licostum">Saya sadar bahwa praktik kedokteran bukanlah ilmu pasti dan saya mengakui bahwa tidak ada jaminan atas hasil apapun, terhadap perawatan prosedur atau pemeriksaan apapun yang dilakukan kepada saya</li>
                                                                        <li class="licostum">Saya mengetahui bahwa RSUD Dr. Achmad Mochtar Bukittinggi merupakan Rumah Sakit yang dipakai untuk Pendidikan. Karena itu, saya menyetujui bila mahasiswa kedokteran dan profesi kesehatan lain berpartisipasi dalam perawatan saya, sepanjang dibawah supervise oleh supervisornya.</li>
                                                                    </ol>
                                                                </li>
                                                                <li><b>KEINGINAN PRIVASI</b>
                                                                    <p>Saya <?= ($izinbesuk==1)?" Mengizinkan ":"Tidak Mengizinkan" ?>* Rumah Sakit Memberi akses bagi : Keluarga serta orang yang akan menengok /menemui saya.
                                                                    <?php if(!empty($privasi_list)){ ?>
                                                                    <br>Saya menginginkan privasi khusus berupa:
                                                                    <ol class="ol28">
                                                                    <?php 
                                                                    $arrpriv=explode(';',$privasi_list);
                                                                    foreach ($arrpriv as $p) {
                                                                        ?>
                                                                        <li><?= $p ?></li>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    </ol>
                                                                    <?php } ?>
                                                                    </p>
                                                                </li>
                                                                <li><b>PERSETUJUAN PELEPASAN INFORMASI</b>
                                                                    <ul class="ol28">
                                                                        <li>Saya memahami informasi yang ada di dalam diri saya termasuk diagnosis, hasil laboratorium dan hasil tes diagnosis yang akan digunakan untuk perawatan medis, RSUD Dr Achmad Mochtar Bukittinggi akan menjamin kerahasiannya.</li>
                                                                        <li>Saya memberi wewenang kepada RSUD Dr Achmad Mochtar Bukittinggi untuk memberikan informasi tentang rahasia kedokteran saya bila diperlukan untuk memproses klaim asuransi dan atau lembaga pemerintah lainya.</li>
                                                                        <li>Saya memberi wewenang kepada RSUD Dr Achmad Mochtar Bukittinggi untuk memberikan (informasi / tidak)* tentang diagnosis, hasil pelayanan dan pengobatan saya kepada<br>
                                                                        <?php if(!empty($terbatas_list)){ ?>
                                                                        <?= ($terbatas==1)?"&#9745;" : "&#9744" ?>Terbatas Pada (sebutkan nama):
                                                                        <ol>
                                                                            <?php 
                                                                            $arrbatas=explode(";",$terbatas_list);
                                                                            foreach ($arrbatas as $a ) {
                                                                                ?>
                                                                                <li><?= $a ?></li>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </ol>
                                                                        <?php } ?>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li><b>INFORMASI TATA TERTIB BAGI PASIEN,PENGUNJUNG DAN PENUNGGU PASIEN</b>
                                                                    <br>Saya telah menerima informasi tentang peraturan yang diberlakukan oleh Rumah Sakit dan saya beserta keluarga bersedia untuk mematuhinya, termasuk akan mematuhi jam berkunjung pasien sesuai dengan aturan di Rumah Sakit.
                                                                </li>
                                                                <li><b>INFORMASI BIAYA</b>
                                                                    <br>Sebagai peserta JKN/IKS saya bersedia mengurus jaminan rawat inap dalam waktu 3 hari kerja (terhitung mulai pasien masuk) dan apabila saya tidak mengurus dalam waktu tersebut diatas, saya bersedia terdaftar sebagai pasien Umum/Pribadi. Saya memahami tentang informasi biaya pengobatan atau biaya tindakanyang dijelaskan oleh petugas Rumah Sakit.
                                                                </li>
                                                            </ol>
                                                            
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
                                                            <td><?= ($selaku_lainnya == "") ? $selaku : $selaku_lainnya ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td height="50px" class="ttdpasien">
                                                                <?php 
                                                                if(!empty($ttd)) {
                                                                    ?>
                                                                    <img src="<?= $ttd ?>" alt="" style="height:70px">
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>( <?= $namattd  ?> )</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="petugas">
                                                    <table style="margin-top:0px">
                                                        <tr>
                                                            <td>Bukittinggi, <?php echo longDate(date('Y-m-d')) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Petugas Admission</td>
                                                        </tr>
                                                        <tr>
                                                            <td height="50px" id="ttdpetugas">
                                                                
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>( <?= getNmLengkap($users_id) ?> )</td>
                                                        </tr>
                                                    </table>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <div id="menu2" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12" >
                            <div style="padding:10px;">
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
                                                                <td>: <?= $nomr ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nama Lengkap</td>
                                                                <td>: <?= $nama ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tempat / Tanggal Lahir</td>
                                                                <td>: <?= $tempat_lahir ."/".longDate($tanggal_lahir) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jenis Kelamin</td>
                                                                <td>: <?= ($jk==1) ?"Laki-Laki": "Perempuan";?></td>
                                                            </tr>
                                                        </table>
                                                        <!-- <table>
                                                            <tr>
                                                                <td>No.Rekam Medis</td>
                                                                <td>: </td>
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
                                                        </table> -->
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
                                                            <td>Bukittinggi, <?php echo longDate(date('Y-m-d')) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Saya telah memahami hak dan kewajiban pasien<br><?= $selaku ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td height="50px" class="ttdpasien"><?php 
                                                            if(!empty($ttd)) {
                                                                ?>
                                                                <img src="<?= $ttd ?>" alt="" style="height:70px">
                                                                <?php
                                                            }
                                                            ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td >
                                                                
                                                                ( <?= $namattd ?> )
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div id="sign" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Masukkan PIN</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="hidden" class="form-control" name="id" id="id" value="<?= $id ?>">
                            <input type="password" class="form-control" name="pin" id="pin" placeholder="Masukkan PIN">
                            <div class="input-group-btn">
                            <button class="btn btn-primary" type="button" onclick="signGC()">
                                <i class="glyphicon glyphicon-certificate"></i> Sign
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
    <script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/qrcodejs/qrcode.js"></script>
    <script>
        <?php if(!empty($ttd)){?>
        // var canvas = document.getElementById("signature-pasien");
        // var ctx = canvas.getContext("2d");

        // var data =  "<?= $ttd ?>";
        
        // ctx.drawImage(data, 0, 0);
        <?php } ?>
        var signaturePad = new SignaturePad(document.getElementById('signature-pasien'), {
            backgroundColor: 'rgba(255, 255, 255, 0)',
            penColor: 'rgb(0, 0, 0)'
        });
        // var signaturePad1 = new SignaturePad(document.getElementById('signature-petugas'), {
        //     backgroundColor: 'rgba(255, 255, 255, 0)',
        //     penColor: 'rgb(0, 0, 0)'
        // });
        var saveButton = document.getElementById('save');
        var cancelButton = document.getElementById('clear');

        saveButton.addEventListener('click', function (event) {
            var pasien = signaturePad.toDataURL('image/png');
            var ttdpasien=`<img src="`+pasien+`" style="height:70px;" alt="">`;
            $('.ttdpasien').html(ttdpasien)
            formData={
                id: $('#id').val(),
                nomr_pasien: $('#nomr_pasien').val(),
                nama_pasien: $('#nama_pasien').val(),
                namattd: $('#namattd').val(),
                hubkeluarga: $('#hubkeluarga').val(),
                ttd:pasien
            }

            $.ajax({
                url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/simpanttd' ?>",
                type: "POST",
                data: formData,
                dataType: "JSON",
                beforeSend  : function(){
                    $('#save').prop("disabled",true);
                    $('#save').html('<i class="fa fa-spinner fa-spin"></i> Proses...')
                },
                success: function(data) {
                    
                },
                error: function(xhr) { // if error occured
                    // tampilkanPesan('error',xhr.responseText)
                    console.clear();
                    console.log(xhr.responseText);
                    alert('Error')
                    $('#save').prop("disabled",false);
                    $('#save').html('Save')
                },
                complete: function() {
                    $('#save').prop("disabled",false);
                    $('#save').html('Save')
                }
            });
        });

        cancelButton.addEventListener('click', function (event) {
            signaturePad.clear();
        });
        <?php if(!empty($signPetugas)) { ?>
        var code = "<?= $signPetugas ?>";
        var qrcode = new QRCode(document.getElementById("ttdpetugas"), {
            text: code,
            width: 80,
            height: 80,
            colorDark : "#000",
            colorLight : "#fff",
        });
        <?php } else{ ?>
            var button=`<button class="btn btn-primary" id="btnSignPetugas" type="button" onclick="signPetugas()">Sign</button>`;
            $('#ttdpetugas').html(button)
        <?php } ?>
        function signPetugas(){
            $('#sign').modal('show');
        }
        function signGC(){
            formData={
                id: $('#id').val(),
                pin: $('#pin').val()
            }

            $.ajax({
                url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/signgc' ?>",
                type: "POST",
                data: formData,
                dataType: "JSON",
                beforeSend  : function(){
                    $('#btnSign').prop("disabled",true);
                    $('#btnSign').html('<i class="fa fa-spinner fa-spin"></i> Proses...')
                },
                success: function(data) {
                    if (data.status==true) {
                        $('#ttdpetugas').html("")
                        var qrcode = new QRCode(document.getElementById("ttdpetugas"), {
                            text: data.data,
                            width: 80,
                            height: 80,
                            colorDark : "#000",
                            colorLight : "#fff",
                        });
                    }else{
                        alert(data.message)
                    }
                },
                error: function(xhr) { // if error occured
                    // tampilkanPesan('error',xhr.responseText)
                    console.clear();
                    console.log(xhr.responseText);
                    // alert('Error')
                    $('#sign').prop("disabled",false);
                    $('#sign').html('<i class="glyphicon glyphicon-certificate"></i>Sign')
                },
                complete: function() {
                    $('#sign').prop("disabled",false);
                    $('#sign').html('<i class="glyphicon glyphicon-certificate"></i> Sign')
                }
            });
        }
    </script>
    
</body>

</html>