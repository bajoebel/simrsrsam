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

        .kode-form {
            text-align : right;
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

        table tr td,
        table tr th {
            font-family: Cambria, Georgia, serif;
            font-size: 12px;
        }

        table.main {
            border-collapse: collapse;
            width:100%;
        }
        
        table.main,
        table.main td {
            border: 1px solid #000;
            font-size: 10px !important;
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
                        <div class='kode-form'>FORM RM 02.05 Rev. 02</div>
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
                    <h3 style="font-family: Cambria,Georgia,serif;">Profil Ringkas Medis Rawat Jalan (PRMRJ)</h3>
                    <table class='main'>
                        <tr>
                            <td style='text-align:center'><b>No</b></td>
                            <td style='text-align:center;width:10%'><b>Tanggal</b></td>
                            <td style='text-align:center'><b>Jam</b></td>
                            <td style='text-align:center;width:60%'>
                                <b>Catatan Informasi  Pasien</b><br/>
                                <small>(Diagnosa, Tindakan, Rencana Tindak Lanjut</small>
                            </td>
                            <td style='text-align:center'><b>Nama / TTD DPJP</b></td>
                        </tr>
                        <?php $no =1;foreach ($k->result() as $r) { ?>
                        <tr>
                            <td style='text-align:center;'><?=$no++?></td>
                            <td style='text-align:center;'><?=dateToIndo($r->tgl)?></td>
                            <td style='text-align:center;'><?=$r->jam?></td>
                            <td>
                                <?= ($r->diagnosis_kerja!="")?"Diagnosis Kerja : ($r->dokter) ".gantiTagP($r->diagnosis_kerja):""?>
                                <?=  ($r->terapi!="")?"Terapi dan Tindakan : ".gantiTagP($r->terapi):""?>
                                <?= "S : ".gantiTagP($r->subyektif)."O : ".gantiTagP($r->obyektif)."A : ".gantiTagP($r->assesment)."P : ".gantiTagP($r->planning)."I : ".gantiTagP($r->instruksi) ?></td>
                            <td>
                                <?= $r->tenaga_medis ?><br/>
                                qrcode
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>