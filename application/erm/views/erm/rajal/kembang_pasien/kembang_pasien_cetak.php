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

        table.main {
            border-collapse: collapse;
        }

        table.main,
        table.main td {
            border: 1px solid #000
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
                    <h3 style="font-family: Cambria,Georgia,serif;">CATATAN PERKEMBANGAN TERINTEGRASI<br>RAWAT JALAN</h3>
                    <table class='main'>
                        <tr>
                            <td style='text-align:center'><b>Tanggal/Jam</b></td>
                            <td style='text-align:center'><b>Profesional Pemberi Asuhan (PPA)</b></td>
                            <td style='text-align:center'>
                                <b>Hasil Pemeriksaan,Analisis,Dan Tindak Lanjut Subjective, Objective, pengkajian/Penilaian, Planning (SOAP) / ADIME
                                    <small>Tulis, Baca, Konfirmasi (TbaK)</small></b>
                                (dituliskan dengan format SOAP, disertai dengan sasaran / target yang terukur, evaluasi hasil tatalaksana dituliskan dalam pengkajian, harap bubuhkan nama dan paraf pada setiap akhir catatan)
                            </td>
                            <td style='text-align:center'><b>Instruksi Tenaga Kesehatan Termasuk Pasca Bedah / Prosedur</b>
                                (Instruksi ditulis dengan rinci dan jelas)
                            </td>
                            <td style='text-align:center'>
                                <b>REVIEW & VERIFIKASI DPJP</b> (Bubuhkan Nama, Paraf, Tgl, Jam)
                                (DPJP harus membaca
                                seluruh Rencana Asuhan)
                            </td>
                        </tr>
                        <!-- <tr>
                            <td>
                                <div style="height:180mm">

                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr> -->
                        <?php foreach ($k->result() as $r) { ?>
                            <tr>
                                <td><?= dateToIndo($r->tgl)." / ".$r->jam ?></td>
                                <td><?= $r->jenis_tenaga_medis." - ".$r->tenaga_medis ?></td>
                                <td>
                                    <b>S</b> : <?= str_replace("<p>","",str_replace("</p>","<br/>",$r->subyektif)) ?>
                                    <b>O</b> : <?= str_replace("<p>","",str_replace("</p>","<br/>",$r->obyektif))?>
                                    <b>A</b> :<?= str_replace("<p>","",str_replace("</p>","<br/>",$r->assesment)) ?>
                                    <b>P</b>: <?= str_replace("<p>","",str_replace("</p>","<br/>",$r->planning)) ?>
                                </td>
                                <td>
                                    <?= $r->instruksi?>
                                </td>
                                <td>
                                    <?= $r->review?>
                                </td>
                            </tr>
                        <?php }?>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>