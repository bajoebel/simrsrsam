<style>
        /* @page {
            margin-left: 2mm;
            margin-top: 0mm;
            margin-right: 0mm;
            margin-bottom: 0mm;
            font-family: Cambria, Georgia, serif;
        } */

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: Cambria, Georgia, serif;
            text-align: center;
            width: 100%;
        }

        .wrap {
            font-family: Cambria, Georgia, serif;
            width:100%;
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
            /* width:100%; */
        }

        table tr td {
            font-family: Cambria, Georgia, serif;
            font-size: 12px;
        }

        /* .content {
            width: 100%;
        } */

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
            width:100%;
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
<table class="table" border="0" style="width:100%;">
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
                                                
                                                <table style="width:100%;">
                                                    <tr>
                                                        <td colspan="3" style="text-align:center;"><h3 style="font-family: Cambria,Georgia,serif;">Persetujuan Umum (General Consent)</h3></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan='3'><b>PASIEN DAN ATAU WALI DIMINTA MEMBACA, MEMAHAMI DAN MENGISI INFORMASI BERIKUT</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <p>Yang Bertanda tangan dibawah ini :
                                                                <div class="col-md-12">
                                                                    <div class="labelidentitas">Nama </div>
                                                                    <div class="keteranganidentitas">: <?= $namattd ?></div>
                                                                </div>
                                                                <br>
                                                                <div class="col-md-12">
                                                                    <div class="labelidentitas">Tempat / Tgl Lahir / Jenis Kelamin </div>
                                                                    <div class="keteranganidentitas">: <?php ($jkttd==1) ? $jekel="Laki-Laki": $jekel="Perempuan"; ?><?= $tempat_lahirttd ."/".longDate($tanggal_lahirttd) ." / " .$jekel ?></div>
                                                                </div>
                                                                <br>
                                                                <div class="col-md-12">
                                                                    <div class="labelidentitas">Alamat </div>
                                                                    <div class="keteranganidentitas">: <?= $alamatttd ?></div>
                                                                </div>
                                                                <br>
                                                                <div class="col-md-12">
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
                                                            <td>Petugas Admission

                                                                <input type="hidden" name="ttdkode" id="ttdkode" value="<?= (!empty($ttdpetugas)) ? $ttdpetugas : "" ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="50px" id="ttdpetugas">
                                                            <!-- <button class="btn btn-primary" id="btnSignPetugas" type="button" onclick="signPetugas()">Sign</button> -->
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