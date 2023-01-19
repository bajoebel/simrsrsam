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
        h6,
        small {
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
            margin-top: 0px;
        }

        table tr td {
            font-family: Cambria, Georgia, serif;
            font-size: 12px;
        }

        table.main {
            width: 180mm;
            margin-top: 10px;
            margin-bottom: 10px;
            border-collapse: collapse;
            border: 1px solid #000
        }

        table.nyeri {
            width: 180mm;
            border-collapse: collapse;
        }

        table.nyeri td,
        table.nyeri tr {
            border: 1px solid #000;
            padding: 2px;
        }

        .content {
            width: 180mm;
        }

        .sign_in {
            display: flex;
            justify-content: space-between;
            padding: 0 10px;
        }

        .pasien {
            margin-right: 60px;
            text-align: left;
        }

        .nyeri {
            display: flex;
        }
    </style>
    <script src="<?php echo base_url() ?>js/remedis.js"></script>
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
                                    <td>: <?= $p->nomr ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>: <?= $p->nama ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>: <?= $p->tgl_lahir ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>: <?= jns_kelamin($p->jns_kelamin) ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <h3 style="font-family: Cambria,Georgia,serif;">PENGKAJIAN AWAL RAWAT JALAN TERINTEGRASI</h3>
                    <small style="display:block;margin-top:-10px">(Pengkajian ini dilengkapi dalam waktu 2 jam setelah pasien diperiksa)</small>
                    <p>I. PENGKAJIAN AWAL KEPERAWATAN</p>
                    <!-- <small style="display:block;margin-top:-10px;text-align:left">(Diisi oleh perawat dengan cara memberi tanda "&#9745;" pada kotak yang telah di sediakan)</small> -->
                    <table class='main'>
                        <tr>
                            <td style="border:1px solid #000">
                                <table style='width:100%'>
                                    <tr>
                                        <td width="10%">Poliklinik</td>
                                        <td width="40%">: <?= $k->poli_text ?></td>
                                        <td width="10%">Tanggal</td>
                                        <td width="40%">: <?= $k->tgl ?></td>
                                    </tr>
                                    <tr>
                                        <td width="10%">DPJP</td>
                                        <td width="40%">: <?= $k->dpjp_text ?></td>
                                        <td width="10%">Jam</td>
                                        <td width="40%">: <?= $k->jam ?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><b>Data Umum</b></td>
                        </tr>
                        <tr>
                            <td style="border:1px solid #000;">
                                <table style='width:100%'>
                                    <tr>
                                        <td width="25%">Tiba di Ruang Dengan Cara</td>
                                        <td width="5%">: </td>
                                        <td width="75%" >
                                            <?= $k->tiba?>
                                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=" 20%">Rujukan</td>
                                        <td width="5%">:</td>
                                        <td width="75%" >
                                           <?= $k->rujukan ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><b>Alasan Masuk</b></td>
                        </tr>
                        <tr>
                            <td style="border:1px solid #000">
                                <table>
                                    <tr>
                                        <td>
                                            <b>a. Keluhan Utama :</b> <?= $k->keluhan ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>b. Riwayat Kesehatan / Pengobatan / Perawatan Sebelumnya :</b>
                                            <br>
                                            <!-- <span>&nbsp;&nbsp;&nbsp;&nbsp;Pernah di rawat &#9744; Tidak &#9744; Ya, Kapan <?= str_pad(" ", 30, ".") ?> Dimana <?= str_pad(" ", 30, ".") ?> </span><br> -->
                                            <span>&nbsp;&nbsp;&nbsp;&nbsp;Pernah di rawat : <?=trueOrFalse($k->dirawat)?> <?= ($k->dirawat==1?", Kapan : $k->kapan_dirawat dimana : $k->dimana_dirawat":"")?> </span><br>
                                            <span>&nbsp;&nbsp;&nbsp;&nbsp;Diagnosis : <b><?= str_pad($k->diagnosis, 30, " ") ?> </b> <?=($k->implant==1)?"&#9745; Alat implant yang terpasang : <b>$k->implant_detail</b>":""?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>c. Riwayat Penyakit Dahulu</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            <!-- &nbsp;&nbsp;&nbsp;&nbsp;&#9744; Asma &#9744; Jantung &#9744; Hipertensi &#9744; DM &#9744; Tiroid &#9744; Epilepsi<br /> -->
                                            &nbsp;&nbsp;&nbsp;&nbsp; <?= arr_to_list($k->riwayat_sakit,"<span>&#9745; ","</span> ") ?><br />
                                            &nbsp;&nbsp;&nbsp;&nbsp;Riwayat operasi : <b><?= $k->riwayat_operasi ?></b> Tahun : <b> <?= $k->riwayat_operasi_tahun ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>d. Riwayat Penyakit Keluarga</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            &nbsp;&nbsp;&nbsp;&nbsp; <?= arr_to_list($k->riwayat_sakit_keluarga,"<span>&#9745; ","</span> ") ?><br />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>e. Riwayat Psikososial Dan Spiritual</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span style='margin-left:3mm'>a) Status Psikologis :</span><br>
                                            <span style='margin-left:6mm'>
                                                <?= arr_to_list($k->riwayat_psikologis,"<span>&#9745; ","</span> ") ?>
                                            </span><br>
                                            <!-- <span style='margin-left:6mm'>&#9744; Lain-lain, Sebutkan <?= str_pad(" ", 150, ".") ?></span><br/> -->
                                            <span style='margin-left:3mm'>b) Status Mental :</span><br>
                                            <?=($k->status_mental_sadar==1)?"<span style='margin-left:6mm'>&#9745; Sadar dan orientasi baik</span><br>":""?>
                                            <!-- <span style='margin-left:6mm'>&#9744; Ada masalah prilaku, sebutkan <?= str_pad(" ", 100, ".") ?></span><br> -->
                                            <?=($k->status_mental_prilaku==1)?"<span style='margin-left:6mm'>&#9745; Ada masalah prilaku, $k->status_mental_prilaku_detail</span><br>":""?>
                                            <!-- <span style='margin-left:6mm'>&#9744; Prilaku kekerasan yang dialami pasien <?= str_pad(" ", 100, ".") ?></span><br> -->
                                            <?=($k->status_mental_keras==1)?"<span style='margin-left:6mm'>&#9745; Ada masalah prilaku, $k->status_mental_keras_detail</span><br>":""?>
                                            <span style='margin-left:3mm'>c ) Kultural :</span><br>
                                            <!-- <span style='margin-left:6mm'><b>Hubungan pasien dengan anggota keluarga : </b> &#9744; Baik &#9744; Tidak Baik </span><br> -->
                                            <span style='margin-left:6mm'><b>Hubungan pasien dengan anggota keluarga : </b><?= ($k->kultural==1)?" &#9745; Baik" : " &#9745; Tidak Baik" ?></span><br>
                                            <span style='margin-left:6mm'><b>Kerabat terdekat yang dapat dihubungi </b></span><br />
                                            <span style='margin-left:6mm'>Nama : <b><?=$k->kultural_nama?></b> Hubungan : <b><?=$k->kultural_hubungan?></b> Telepon : <b><?=$k->kultural_phone?></b></span><br />
                                            <span style='margin-left:6mm'>Nilai-nilai dan kepercayaan yang dianut pasien : <?= $k->nilai_kepercayaan ?></span><br />
                                            <span style='margin-left:3mm'>d ) Status Sosial dan Ekonomi</span><br>
                                            <!-- <span style='margin-left:6mm'>&#9744; Asuransi &#9744; Jaminan &#9744; Biaya Sendiri &#9744; Lainnya, Sebutkan <?= str_pad(" ", 80, ".") ?> </span><br /> -->
                                            <span style='margin-left:6mm'>
                                                <?= arr_to_list($k->status_ekonomi,"<span>&#9745; ","</span> ") ?>
                                            </span><br />
                                            <span style='margin-left:3mm'>e ) Status Spiritual</span><br>
                                            <span style='margin-left:6mm'>Kegiatan keagamaan yang bisa dilakukan : <?= $k->spiritual_biasa ?></span><br>
                                            <span style='margin-left:6mm'>Kegiatan spiritual yang dibutuhkan selama perawatan : <?= $k->spiritual_butuh ?></span><br>
                                            <span style='margin-left:3mm'>f ) Budaya dan nilai-nilai yang dianut : <?= $k->budaya ?></span><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!-- <b>f. Riwayat alergi : </b> a. Obat <span style='margin-left:4mm'>&#9744; tidak</span><span style='margin-left:4mm'>&#9744; Ya Sebutkan: <?= str_pad(" ", 100, ".") ?></span><br /> -->
                                            <b>f. Riwayat alergi : </b> a. Obat <?= ($k->obat==0)?"<span style='margin-left:4mm'>&#9745; tidak</span>":"<span style='margin-left:4mm'>&#9745; Ya Sebutkan: $k->obat_detail</span>" ?><br />
                                            <!-- <span style='margin-left:25mm'></span>b. Makanan <span style='margin-left:4mm'>&#9744; tidak</span><span style='margin-left:4mm'>&#9744; Ya Sebutkan: <?= str_pad(" ", 80, ".") ?></span><br /> -->
                                            <span style='margin-left:25mm'></span>b. Makanan <?= ($k->makanan==0)?"<span style='margin-left:4mm'>&#9745; tidak</span>":"<span style='margin-left:4mm'>&#9745; Ya Sebutkan: $k->makanan_detail</span>" ?><br />
                                            <span style='margin-left:25mm'>Lain-lain : <?= $k->riwayat_lain ?></span><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>g. Skrining Nyeri : </b></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div style='width:80mm !important;height:45mm!important;border:1px solid black;margin-left:3mm;padding:1px;float:left'>
                                                <span style="margin-left:3mm"><b><?= $k->nyeri ?></b></span><br />
                                                <span>P (Profokatif/Penyebab) : <?= $k->quality ?></span><br>
                                                <span>Q (Quality/Gambaran Nyeri) : <?= $k->skala ?></span><br>
                                                <span>R (Region/Lokasi Nyeri) : <?= $k->region ?></span><br>
                                                <span>S (Skala Severitas) : <?= $k->nyeri ?></span><br>
                                                <span>T (Timing/Waktu Nyeri) :<?= $k->timing ?></span><br>
                                                Apakah nyeri yang dirasakan :
                                                <ul style="margin : 1px 0 0 -10px;">
                                                    <li>Menghalangi tidur malam anda : <b><?= trueOrFalse($k->tidur_malam) ?></b></li>
                                                    <li>Menghalangi anda beraktifitas : <b><?= trueOrFalse($k->halangan_aktivitas) ?></b></li>
                                                    <li>Sakit dirasakan setiak hari : <b><?= trueOrFalse($k->nyeri_sakit) ?></b></li>
                                                </ul>
                                            </div>
                                            <?php if ($k->metode==1 or $k->metode==2){ ?>
                                            <div style='width:85mm !important;height:45mm!important;border:1px solid black;margin-left:3mm;padding:1px;float:left'>
                                                <?php if ($k->metode==1){ ?>
                                                <span style='margin-left:10mm'>Dewasa Menggunakan Visual Analog Scale(VAS)</span><br>
                                                <span><img src="<?= base_url() . "assets/images/erm_images/vas.png" ?>" width="300mm"></span><br>
                                                <span style='margin-left:8mm'>Skor : <b><?= $k->skala_vas." - ".skalaVas($k->skala_vas)?></b></span><br>
                                                <?php }?>
                                                <?php if ($k->metode==2){ ?>
                                                    <span>Skrining nyeri anak-anak >3 Menggunakan Wong Barker Face Scale </span><br>
                                                    <span><img src="<?= base_url() . "assets/images/erm_images/bfs.png" ?>" height="50mm" width="300mm"></span></span>
                                                    <span style='margin-left:8mm'>Skor : <b><?= $k->skala_wbfs." - ".skalaWbfs($k->skala_wbfs)?></b></span><br>
                                                <?php }?>
                                            </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php 
                                    $wajah = ["Tidak ada ekspresi tertentu untuk senyuman","Menyiringai sekali-kali atau mengerutkan dahi, muram, ogah-ogahan","Dagu gemetar dan rahang diketap"];
                                    $leg = ["Posisi normal atau santai","Gelisah, resah dan tegang","Menendang dan menarik kaki"];
                                    $gerakan = ["Rebahan dengan tenang, posisi normal, bergerak dengan mudah","Menggeliat, maju mundur, tegang","Menekuk / posisi tubuh meringkuk, kaku dan menyentak"];
                                    $tangis = ["Tidak ada tangisan, terjaga atau tertidur","Mengerak / Merengek, gerukan sakali-kali","Menangis tersedu-sedu, menjerit, terisak-isak, menggerutu berulang-ulang"];
                                    $kemampuan = ["Senang, santai","Dapat ditenangkann dengan sentuhan, pelukan atau berbicara, dapat dialihkan",""];
                                    if ($k->metode==3){ ?>
                                    <tr>
                                        <td>
                                            <span>Skrining Nyeri Anak < 3 Tahun Menggunakan FLACC</span>
                                                    <table class='nyeri'>
                                                        <tr>
                                                            <td colspan="2">Kategori</td>
                                                            <td>Skor</td>
                                                        </tr>
                                                        <tr>
                                                            <td width='10%'>
                                                                Face (Wajah)
                                                            </td>
                                                            <td><?= $wajah[$k->wajah]?></td>
                                                            <td><?= $k->wajah ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Legs
                                                                (Ekstermitas)
                                                            </td>
                                                            <td><?= $leg[$k->leg]?></td>
                                                            <td><?= $k->leg ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Activity (Gerakan)
                                                            </td>
                                                            <td><?= $gerakan[$k->gerakan]?></td>
                                                            <td><?= $k->gerakan ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Cry (Tangisan)
                                                            </td>
                                                            <td><?= $tangis[$k->tangis]?></td>
                                                            <td><?= $k->tangis ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Consolability
                                                                (Kemampuan ditenangkan)
                                                            </td>
                                                            <td><?= $kemampuan[$k->kemampuan]?></td>
                                                            <td><?= $k->kemampuan ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align:center">
                                                                <b>Skor Total </b>
                                                            </td>
                                                            <td><?= $k->flacc_skor ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" style="text-align:center">
                                                                <span style='margin-left:10mm'>0 : nyeri</span>
                                                                <span style='margin-left:6mm'>1-3 : nyeri ringan</span>
                                                                <span style='margin-left:6mm'>4-6 : nyeri sedang</span>
                                                                <span style='margin-left:6mm'>7-10 : nyeri berat</span>
                                                            </td>
                                                            <td><?= $k->flacc_skor_detail ?></td>
                                                        </tr>
                                                    </table>
                                        </td>
                                    </tr>
                                    <?php }?>
                                    <tr>
                                        <td><b>h. Skrining Gizi Awal : </b></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table class="nyeri">
                                                <tr>
                                                    <td width="70%">
                                                        <b>1. Apakah pasien mengalami penurunan berat badan yang tidak direncanakan/tidak diinginkan dalam 6 bulan terakhir?</b>
                                                    </td>
                                                    <td>
                                                        <b>Skor Pasien</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&#9745; <?=$k->gizi_detail?></td>
                                                    <td>
                                                        <?=$k->gizi_value?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="70%">
                                                        <b>2. Apakah asupan makan pasien berkurang karena penurunan nafsu makan/kesulitan menerima makanan?</b>
                                                    </td>
                                                    <td>
                                                        <b>Skor Pasien</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&#9745; <?=$k->gizi_makan_detail?></td>
                                                    <td>
                                                       <?=$k->gizi_makan_value?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Total SKOR (Bilai skor >= 2, pasien berisiko malnutrisi, konsul ke ahli gizi)</td>
                                                    <td><?=$k->skor_gizi?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Adaptasi Strong Kids (nilai 1 setiap jawaban “ya”. Beresiko bila bilai lebih dari 1)<br />
                               <?= arr_to_list($k->strong_kids,"&#9745<span>","</span></br>") ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>I. Status Fungsional</b></td>
                        </tr>
                        <tr>
                            <td>
                                <span><b>Aktivitas dan Mobilisasi : (lampirkan formulir pengkajian status fungsional Barthel index)</b></span><br>
                                <!-- <span>&#9744; Mandiri &#9744; Perlu bantuan, sebutkan <?= str_pad(" ", 100, ".") ?></span><br> -->
                                <span>&#9745; <?= strtoupper($k->aktivitas) ?> - <?= $k->aktivitas_detail ?></span><br>
                                <span>(Bila ketergantungan penuh kolaborasi ke DPJP untuk konsul ke Rehabilitasi Medik) </span><br>
                                <span>Diberitahukan ke dokter &#9745; <?= trueOrFalse($k->aktivitas_info) ?> - <?= $k->aktivitas_info_detail ?> 
                            </td>
                        </tr>
                        <tr>
                            <td><b>J. Risiko Cidera/Jatuh</b></td>
                        </tr>
                        <tr>
                            <td>
                                <span style='margin-left:6mm'>
                                    &#9745; <?=trueOrFalse($k->jatuh)?> &nbsp;&nbsp;&nbsp;<?= ($k->jatuh==1)?"Risiko Jatuh : $k->jatuh_detail":"" ?>
                                </span><br />
                                <span style='margin-left:6mm'>
                                <?= ($k->jatuh_detail=="sedang" or $k->jatuh_detail=="tinggi" )?"dipasang gelang risiko jatuh warna kuning : ".trueOrFalse($k->gelang_risiko):"-" ?>
                                </span><br />
                                <span style="margin-left:6mm">
                                    Diberitahukan ke dokter : <?= trueOrFalse($k->risiko_info)?> <?=($k->risiko_info==1)?" , Jam  ".$k->risiko_info_detail:""?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><b>k. Pemeriksaan Umum dan Fisik</b></td>
                        </tr>
                        <tr>
                            <td>
                                <ol>
                                    <li>Keadaan umum <span style="margin-left:6mm">: &#9745; <?=$k->keadaan_umum?> </span></li>
                                    <li>Kesadaran <span style="margin-left:6mm">: &#9745; <?=$k->kesadaran_umum?></span> </li>
                                    <li>GCS <span style="margin-left:6mm">: E : <?= $k->gcs_e ?> M: <?= $k->gcs_m ?>  V: <?= $k->gcs_v ?></span></li>
                                    <li>
                                        TTV <span style="margin-left:6mm">: Sh <?= $k->ttv_sh ?> Nd <?= $k->ttv_nd ?> , Rr <?= $k->ttv_rr ?> SpO2 <?= $k->ttv_spo2 ?>, TD <?= $k->ttv_td ?> , Down Score <?= $k->ttv_ds ?></span></li>
                                    <li>Pemeriksaan <span style="margin-left:6mm">: Status generalis & status lokalis (inspeksi,palpasi,perkusi,auskulasi)<br>
                                            &nbsp;&nbsp;<?= $k->status_generalis ?>
                                    </li>
                                    <li>Pemeriksaan penunjang sebelum rawat inap : <?= ($k->penunjang_rad==1)?"&#9745; Radiologi, $k->penunjang_rad_detail ":"" ?><?= ($k->penunjang_lab==1)?"&#9745; Lab, $k->penunjang_lab_detail ":"" ?><?= ($k->penunjang_lain==1)?"&#9745; Lain-lain, $k->penunjang_lain_detail ":"" ?> </li>
                                    <li>Pemeriksaan penunjang (Laboratorium, Radiologi, dll) dilampirkan</li>
                                </ol>
                            </td>
                        </tr>
                        <tr>
                            <td><b>L. Kebutuhan Komunikasi dan Edukasi</b></td>
                        </tr>
                        <tr>
                            <td>
                                <span>Terdapat hambatan dalam pembelajaran : </span>
                                <?= ($k->komunikasi==0)?"&#9745;Tidak":"&#9745;Ya,".arr_to_list($k->komunikasi_detail,"<span>","</span>&nbsp;&nbsp;")." - ".$k->komunikasi_lain?><br/>
                                Dibutuhkan penerjemah : <?= ($k->komunikasi_penerjemah==0)?"&#9744;Tidak":"&#9745;Ya,".$k->komunikasi_penerjemah_detail?>&nbsp;&nbsp;&nbsp; Bahasa Isyarat : <?= trueOrFalse($k->komunikasi_isyarat)?>
                                
                                <br/>
                                <span>Kebutuhan edukasi (Pilih topik edukasi pada kotak yang tersedia) :</span><br>
                                <?= arr_to_list($k->kebutuhan_edukasi,"<span>","</span>&nbsp;&nbsp;") ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td><b>M. Diagnosa Keperawatan</b></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="box" style="width:100%;height:20mm"><?=$k->diagnosa_keperawatan?></div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>N. Tindakan Keperawatan</b></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="box" style="width:100%;height:20mm"><?=$k->tindakan_keperawatan?></div>
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
                                <td>Telah dijelaskan dan dipahami kepada <br><?= "&#9745".$k->dijelaskan?> <?= ($k->dijelaskan=="Keluarga")?", Hubungan $k->dijelaskan_hubungan":"" ?></td>
                            </tr>
                            <tr>
                                <td height="80px">
                                    <?php $ttd = getTtd($k->nomr); if ($ttd) { ?>
                                        <img src="" alt="">
                                    <?php } else { ?>
                                        &nbsp;
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>( <?= str_pad(($k->dijelaskan=="Pasien")?$d->nama_pasien:$k->dijelaskan_nama, 20, " ",STR_PAD_BOTH) ?> )</td>
                            </tr>
                            <tr>
                                <td>Nama lengkap pasien/keluarga</td>
                            </tr>
                        </table>
                    </div>
                    <div class="pasien">
                        <table style="margin-top:0px">
                            <tr>
                                <!-- <td>Tanggal <?= dateToIndo($k->tgl) ?> Jam <?= $k->jam ?></td> -->
                                <td>Tanggal <?=dateTimeDBtoIndo($k->updated_at) ?></td>
                            </tr>
                            <tr>
                                <td>Perawat yang melakukan pengkajian<br>&nbsp</td>
                            </tr>
                            <tr>
                                <td height="80px"><div id="qrcode_awal_rawat"></div></td>
                            </tr>
                            <tr>
                                <td>( <?= str_pad($k->perawat, 20, ".") ?> )</td>
                            </tr>
                            <tr>
                                <td>NIP.<?= getNip($k->perawat_id) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>
<!-- qrcode -->
<script src="<?php echo base_url() ?>assets/jquery/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/qrcodejs/qrcode.js"></script>
<script type="text/javascript">
    var code = "<?= $k->perawatSign?>";
    var qrcode = new QRCode(document.getElementById("qrcode_awal_rawat"), {
        text: code,
        width: 80,
        height: 80,
        colorDark : "#000",
        colorLight : "#fff",
    });
    $(`#qrcode_awal_rawat > img`).css({"margin":"auto"});
</script>
</html>