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
                    <h3 style="font-family: Cambria,Georgia,serif;">PENGKAJIAN AWAL RAWAT JALAN TERINTEGRASI</h3>
                    <small style="display:block;margin-top:-10px">(Pengkajian ini dilengkapi dalam waktu 2 jam setelah pasien diperiksa)</small>
                    <p>I. PENGKAJIAN AWAL KEPERAWATAN</p>
                    <small style="display:block;margin-top:-10px;text-align:left">(Diisi oleh perawat dengan cara memberi tanda "&#9745;" pada kotak yang telah di sediakan)</small>
                    <table class='main'>
                        <tr>
                            <td style="border:1px solid #000">
                                <table style='width:100%'>
                                    <tr>
                                        <td width="10%">Poliklinik</td>
                                        <td width="40%">:</td>
                                        <td width="10%">Tanggal</td>
                                        <td width="40%">:</td>
                                    </tr>
                                    <tr>
                                        <td width="10%">DPJP</td>
                                        <td width="40%">:</td>
                                        <td width="10%">Jam</td>
                                        <td width="40%">:</td>
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
                                        <td width=" 20%">Tiba di ruang dengan cara</td>
                                        <td width="5%">:</td>
                                        <td width="75%" style="display: flex;justify-content:space-around">
                                            <span>&#9744; Jalan </span>
                                            <span>&#9744; Kursi Roda </span>
                                            <span>&#9744; Brankar </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=" 20%">Rujukan</td>
                                        <td width="5%">:</td>
                                        <td width="75%" style="display: flex;justify-content:space-around">
                                            <span>&#9744; Puskesmas </span>
                                            <span>&#9744; Bidan </span>
                                            <span>&#9744; Lainnya <?= str_pad(" ", 30, ".") ?> </span>
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
                                            <b>a. Keluhan Utama :</b> <?= str_pad(" ", 150, ".") ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>b. Riwayat Kesehatan / Pengobatan / Perawatan Sebelumnya :</b>
                                            <br>
                                            <span>&nbsp;&nbsp;&nbsp;&nbsp;Pernah di rawat &#9744; Tidak &#9744; Ya, Kapan <?= str_pad(" ", 30, ".") ?> Dimana <?= str_pad(" ", 30, ".") ?> </span><br>
                                            <span>&nbsp;&nbsp;&nbsp;&nbsp;Diagnosis <?= str_pad(" ", 30, ".") ?> &#9744; Alat implant yang terpasang, sebutkan <?= str_pad(" ", 30, ".") ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>c. Riwayat Penyakit Dahulu</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            &nbsp;&nbsp;&nbsp;&nbsp;&#9744; Asma &#9744; Jantung &#9744; Hipertensi &#9744; DM &#9744; Tiroid &#9744; Epilepsi<br />
                                            &nbsp;&nbsp;&nbsp;&nbsp;Riwayat operasi <?= str_pad(" ", 80, ".") ?> Tahun <?= str_pad(" ", 30, ".") ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>d. Riwayat Penyakit Keluarga</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            &nbsp;&nbsp;&nbsp;&nbsp;&#9744; Kanker &#9744; Penyakit Hati &#9744; Hipertensi &#9744; DM &#9744; Penyakit Ginjal &#9744; Penyakit Jiwa &#9744; Kelainan Bawaan &#9744; Hamil Kembar &#9744; TBC <br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&#9744; Epilepsi &#9744; Alergi &#9744; Lain - lain
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
                                                &#9744; Cemas &#9744; Takut &#9744; Marah &#9744; Sedih &#9744; Kecendrungan Bunuh Diri
                                            </span><br>
                                            <span style='margin-left:6mm'>&#9744; Lain-lain, Sebutkan <?= str_pad(" ", 150, ".") ?></span>
                                            <span style='margin-left:3mm'>b) Status Mental :</span><br>
                                            <span style='margin-left:6mm'>&#9744; Sadar dan orientasi baik</span><br>
                                            <span style='margin-left:6mm'>&#9744; Ada masalah prilaku, sebutkan <?= str_pad(" ", 100, ".") ?></span><br>
                                            <span style='margin-left:6mm'>&#9744; Prilaku kekerasan yang dialami pasien <?= str_pad(" ", 100, ".") ?></span><br>
                                            <span style='margin-left:3mm'>c ) Kultural :</span><br>
                                            <span style='margin-left:6mm'><b>Hubungan pasien dengan anggota keluarga </b> &#9744; Baik &#9744; Tidak Baik </span><br>
                                            <span style='margin-left:6mm'><b>Kerabat terdekat yang dapat dihubungi </b></span><br />
                                            <span style='margin-left:6mm'>Nama : <?= str_pad(" ", 100, ".") ?> Hubungan : <?= str_pad(" ", 60, ".") ?> Telepon : <?= str_pad(" ", 80, ".") ?></span><br />
                                            <span style='margin-left:6mm'>Nilai-nilai dan kepercayaan yang dianut pasien </span><br />
                                            <span style='margin-left:3mm'>d ) Status Sosial dan Ekonomi</span><br>
                                            <span style='margin-left:6mm'>&#9744; Asuransi &#9744; Jaminan &#9744; Biaya Sendiri &#9744; Lainnya, Sebutkan <?= str_pad(" ", 80, ".") ?> </span><br />
                                            <span style='margin-left:3mm'>e ) Status Spiritual</span><br>
                                            <span style='margin-left:6mm'>Kegiatan keagamaan yang bisa dilakukan : <?= str_pad(" ", 100, ".") ?></span><br>
                                            <span style='margin-left:6mm'>Budaya dan nilai-nilai yang di anut : <?= str_pad(" ", 100, ".") ?></span><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>f. Riwayat alergi : </b> a. Obat <span style='margin-left:4mm'>&#9744; tidak</span><span style='margin-left:4mm'>&#9744; Ya Sebutkan: <?= str_pad(" ", 100, ".") ?></span><br />
                                            <span style='margin-left:25mm'></span>b. Makanan <span style='margin-left:4mm'>&#9744; tidak</span><span style='margin-left:4mm'>&#9744; Ya Sebutkan: <?= str_pad(" ", 80, ".") ?></span><br />
                                            <span style='margin-left:25mm'>Lain-lain <?= str_pad(" ", 80, ".") ?></span><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>g. Skrining Nyeri : </b></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div style='width:80mm !important;height:45mm!important;border:1px solid black;margin-left:3mm;padding:1px;float:left'>
                                                <span style="margin-left:3mm">Tidak ada nyeri &nbsp;&nbsp;&nbsp; Nyeri Akut &nbsp;&nbsp;&nbsp; Nyeri Kronis</span><br />
                                                <span>P (Profokatif/Penyebab) : <?= str_pad(" ", 60, ".") ?></span><br>
                                                <span>Q (Quality/Gambaran Nyeri) : <?= str_pad(" ", 60, ".") ?></span><br>
                                                <span>R (Region/Lokasi Nyeri) : <?= str_pad(" ", 60, ".") ?></span><br>
                                                <span>S (Skala Severitas) : <?= str_pad(" ", 60, ".") ?></span><br>
                                                <span>T (Timing/Waktu Nyeri) : <?= str_pad(" ", 60, ".") ?></span><br>
                                                Apakah nyeri yang dirasakan :
                                                <ul style="margin : 1px 0 0 -10px;">
                                                    <li>Menghalangi tidur malam anda</li>
                                                    <li>Menghalangi anda beraktifitas</li>
                                                    <li>Sakit dirasakan setiak hari</li>
                                                </ul>
                                            </div>
                                            <div style='width:85mm !important;height:45mm!important;border:1px solid black;margin-left:3mm;padding:1px;float:left'>
                                                <span style='margin-left:10mm'>Dewasa Menggunakan Visual Analog Scale(VAS)</span><br>
                                                <span><img src="<?= base_url("assets/images/erm_images/vas.png") ?>" width="300mm"></span><br>
                                                <span style='margin-left:8mm'>Tidak nyeri</span><br>
                                                <span>Skrining nyeri anak-anak >3 Menggunakan Wong Barker Face Scale </span><br>
                                                <span><img src="<?= base_url("assets/images/erm_images/bfs.png") ?>" height="50mm" width="300mm"></span></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span>Skrining Nyeri Anak < 3 Tahun Menggunakan FLACC</span>
                                                    <table class='nyeri'>
                                                        <tr>
                                                            <td colspan="2">Kategori</td>
                                                            <td>Nilai</td>
                                                            <td>Skor</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3" width='10%'>
                                                                Face (Wajah)
                                                            </td>
                                                            <td>Tidak ada ekspresi tertentu untuk senyuman</td>
                                                            <td>0</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Menyiringai sekali-kali atau mengerutkan dahi, muram, ogah-ogahan</td>
                                                            <td>1</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dagu gemetar dan rahang diketap</td>
                                                            <td>2</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">
                                                                Legs
                                                                (Ekstermitas)
                                                            </td>
                                                            <td>Posisi normal atau santai</td>
                                                            <td>0</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gelisah, resah dan tegang</td>
                                                            <td>1</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Menendang dan menarik kaki</td>
                                                            <td>2</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">
                                                                Activity (Gerakan)
                                                            </td>
                                                            <td>Rebahan dengan tenang, posisi normal, bergerak dengan mudah</td>
                                                            <td>0</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Menggeliat, maju mundur, tegang</td>
                                                            <td>1</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Menekuk / posisi tubuh meringkuk, kaku dan menyentak</td>
                                                            <td>2</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">
                                                                Cry (Tangisan)
                                                            </td>
                                                            <td>Tidak ada tangisan, terjaga atau tertidur</td>
                                                            <td>0</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mengerak / Merengek, gerukan sakali-kali</td>
                                                            <td>1</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Menangis tersedu-sedu, menjerit, terisak-isak, menggerutu berulang-ulang</td>
                                                            <td>2</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="3">
                                                                Consolability
                                                                (Kemampuan ditenangkan)
                                                            </td>
                                                            <td>Senang, santai</td>
                                                            <td>0</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dapat ditenangkann dengan sentuhan, pelukan atau berbicara, dapat dialihkan</td>
                                                            <td>1</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sulit/tidak dapat ditenangkan dengan pelukan, sentuhan, atau distraksi</td>
                                                            <td>2</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" style="text-align:center">
                                                                <b>Skor Total</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" style="text-align:center">
                                                                <span style='margin-left:10mm'>0 : nyeri</span>
                                                                <span style='margin-left:10mm'>0 : nyeri</span>
                                                                <span style='margin-left:6mm'>1-3 : nyeri ringan</span>
                                                                <span style='margin-left:6mm'>4-6 : nyeri sedang</span>
                                                                <span style='margin-left:6mm'>7-10 : nyeri berat</span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                        </td>
                                    </tr>
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
                                                        <b>Skor</b>
                                                    </td>
                                                    <td>
                                                        <b>Skor Pasien</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&#9744; Tidak</td>
                                                    <td>0</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>&#9744; Tidak Yakin (ada tanda : baju menjadi longgar)</td>
                                                    <td>2</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>&#9744; Ya, ada penurunan BB sebanyak : </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><span style='margin-left:5mm'>&#9744; 1-5 kg</span></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><span style='margin-left:5mm'>&#9744; 6-10 kg</span></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><span style='margin-left:5mm'>&#9744; 11-15 kg</span></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><span style='margin-left:5mm'>&#9744; > 15 kg</span></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>&#9744; Tidak tahu berapa kg penurunannya</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td width="70%">
                                                        <b>2. Apakah asupan makan pasien berkurang karena penurunan nafsu makan/kesulitan menerima makanan?</b>
                                                    </td>
                                                    <td>
                                                        <b>Skor</b>
                                                    </td>
                                                    <td>
                                                        <b>Skor Pasien</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&#9744; Tidak</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>&#9744; Ya</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td width="70%">
                                                        <b>TOTAL SKOR (Bila skor≥2, pasien berisiko malnutrisi, konsul ke Ahli Gizi)</b>
                                                    </td>
                                                    <td>
                                                        <b></b>
                                                    </td>
                                                    <td>
                                                        <b></b>
                                                    </td>
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
                                1. Apakah pasien tampak kurus?<br />
                                2. Apakah terdapat penurunan BB selama satu bulan terakhir?<br />
                                3. Apakah ada diare >5x/hari atau muntah >3x/hari atau asupan turun dalam 1 minggu?<br>
                                Apakah terdapat penyakit atau keadaan yang mengakibatkan pesien beresiko malnutrisi?<br>
                            </td>
                        </tr>
                        <tr>
                            <td><b>I. Status Fungsional</b></td>
                        </tr>
                        <tr>
                            <td>
                                <span><b>Aktivitas dan Mobilisasi : (lampirkan formulir pengkajian status fungsional Barthel index)</b></span><br>
                                <span>&#9744; Mandiri &#9744; Perlu bantuan, sebutkan <?= str_pad(" ", 100, ".") ?></span><br>
                                <span>(Bila ketergantungan penuh kolaborasi ke DPJP untuk konsul ke Rehabilitasi Medik) </span><br>
                                <span>Diberitahukan ke dokter &#9744; Ya, pukul <?= str_pad(" ", 40, ".") ?></span> &#9744; Tidak
                            </td>
                        </tr>
                        <tr>
                            <td><b>J. Risiko Cidera/Jatuh</b></td>
                        </tr>
                        <tr>
                            <td>
                                <span style='margin-left:6mm'>
                                    &#9744; Tidak &#9744; Ya &nbsp;&nbsp;&nbsp;Bila ya, Risiko Jatuh : Rendah/Sedang/Tinggi
                                </span><br />
                                <span style='margin-left:6mm'>
                                    Jika risiko jatuh sedang atau tinggi dipasang gelang risiko jatuh warna kuning &#9744;Ya &nbsp;&nbsp;&nbsp; &#9744; Tidak
                                </span><br />
                                <span style="margin-left:6mm">
                                    Diberitahukan ke dokter &#9744; Ya, jam <?= str_pad(" ", 30, ".") ?> &#9744; Tidak
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><b>k. Pemeriksaan Umum dan Fisik</b></td>
                        </tr>
                        <tr>
                            <td>
                                <ol>
                                    <li>Keadaan umum <span style="margin-left:6mm">: &#9744; Tampak tidak sakit &#9744; Tampak sakit ringan &#9744; Tampak sakit sedang &#9744; tampak sakit berat</span></li>
                                    <li>Kesadaran <span style="margin-left:6mm">: &#9744; Kompos mentis &#9744; Apatis &#9744; Somnolen &#9744; Soporo &#9744; koma</span> </li>
                                    <li>GCS <span style="margin-left:6mm">: E :<?= str_pad(" ", 30, "_") ?> M:<?= str_pad(" ", 30, "_") ?>V:<?= str_pad(" ", 30, "_") ?></span></li>
                                    <li>
                                        TTV <span style="margin-left:6mm">: Sh <?= str_pad(" ", 30, "_") ?> Nd<?= str_pad(" ", 30, "_") ?> , Rr<?= str_pad(" ", 30, "_") ?>SpO2<?= str_pad(" ", 30, "_") ?>, TD<?= str_pad(" ", 30, "_") ?> , Down Score <?= str_pad(" ", 30, "_") ?></span></li>
                                    <li>Pemeriksaan <span style="margin-left:6mm">: Status generalis & status lokalis (inspeksi,palpasi,perkusi,auskultasi)<br>
                                            <?= str_pad(" ", 150, "_") ?><br>
                                            <?= str_pad(" ", 150, "_") ?>
                                    </li>
                                    <li>Pemeriksaan penunjang sebelum rawat inap : &#9744; Radiologi,<?= str_pad(" ", 30, "_") ?> &#9744; Lab<?= str_pad(" ", 30, "_") ?> &#9744; Lain-lain <?= str_pad(" ", 30, "_") ?></li>
                                    <li>Pemeriksaan penunjang (Laboratorium, Radiologi, dll) dilampirkan</li>
                                </ol>
                            </td>
                        </tr>
                        <tr>
                            <td><b>L. Kebutuhan Komunikasi dan Edukasi</b></td>
                        </tr>
                        <tr>
                            <td>
                                <span>Terdapat hambatan dalam pembelajaran : </span><br>
                                <span>&#9744;Tidak &nbsp;&nbsp;&nbsp;&nbsp;&#9744; Ya, Jika Ya : &#9744; Pendengaran &#9744; Penglihatan &#9744; Kognitif &#9744; Fisik</span><br>
                                <span style="margin-left:34mm">&#9744; Budaya &#9744; Emosi &#9744; Bahasa &#9744; Lainnya <?= str_pad(" ", 30, ".") ?></span>
                                <span>Dibutuhkan penerjemah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#9744; Tidak &nbsp;&nbsp;&#9744; Ya, Sebutkan <?= str_pad(" ", 30, ".") ?>Bahasa Isyarat : &#9744; Tidak &#9744; Ya</span>
                                <span>Kebutuhan edukasi (Pilih topik edukasi pada kotak yang tersedia) :</span><br>
                                &#9744; Diagnosa dan manajemen penyakit &#9744; Obat – obatan / Terapi &#9744; Diet dan nutrisi <br />
                                &#9744; Tindakan keperawatan <?= str_pad(" ", 30, ".") ?> &#9744; Rehabilitasi &#9744; Manajemen Nyeri <br />
                                &#9744; Lain-lain, Sebutkan <?= str_pad(" ", 30, ".") ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>M. Diagnosa Keperawatan</b></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="box" style="width:100%;height:20mm"></div>
                            </td>
                        </tr>
                        <tr>
                            <td><b>N. Tindakan Keperawatan</b></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="box" style="width:100%;height:20mm"></div>
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
                                <td>Telah dijelaskan dan dipahami kepada <br>&#9744; Pasien &nbsp;&nbsp;&nbsp;&#9744;Keluarga, Hubungan <?= str_pad(" ", 20, ".") ?></td>
                            </tr>
                            <tr>
                                <td height="50px">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>( <?= str_pad(" ", 100, ".") ?> )</td>
                            </tr>
                            <tr>
                                <td>diisi nama lengkap pasien/keluarga</td>
                            </tr>
                        </table>
                    </div>
                    <div class="pasien">
                        <table style="margin-top:0px">
                            <tr>
                                <td>Tanggal <?= str_pad(" ", 30, ".") ?> Jam <?= str_pad(" ", 30, ".") ?></td>
                            </tr>
                            <tr>
                                <td>Perawat yang melakukan pengkajian<br>&nbsp</td>
                            </tr>
                            <tr>
                                <td height="50px">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>( <?= str_pad(" ", 100, ".") ?> )</td>
                            </tr>
                            <tr>
                                <td>Diisi nama lengkap dan gelar</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>