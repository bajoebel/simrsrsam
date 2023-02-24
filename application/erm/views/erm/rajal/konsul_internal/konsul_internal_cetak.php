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
            margin-top: 0px;
        }

        table tr td {
            font-family: Cambria, Georgia, serif;
            font-size: 12px;
        }

        table.main {
            width: 180mm;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        table.main td {
            padding : 5px
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
                        <div class='kode-form'>FORM RM 3.1.00 Rev. 01</div>
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
                    <h3 style="font-family: Cambria,Georgia,serif;">Konsultasi Internal</h3>
                    <table class="main">
                        <tr>
                            <td width="50%"><b>Yth.T.S. DR. (Konsulen) yang diminta</b></td>
                            <td>: <?= $k->dpjp_diminta?></td>
                        </tr>
                        <tr>
                            <td><b>Unit/Sub Unit yang diminta</b></td>
                            <td>: <?= $k->unit_diminta?></td>
                        </tr>
                        <tr>
                            <td><b>Diagnosis Kerja</b></td>
                            <td>: <?= $k->diagnosa_kerja?></td>
                        </tr>
                        <tr>
                            <td><b>Iktisar Kinik</b></td>
                            <td>: <?= $k->iktisar_klinik?></td>
                        </tr>
                        <tr>
                            <td><b>Terapi dan tindakan yang sudah diberikan</b></td>
                            <td>: <?= $k->terapi_tindakan?></td>
                        </tr>
                        <tr>
                            <td><b>Konsulen diharapkan</b></td>
                            <td>:<?= arr_to_list($k->konsul_harap)?></td>
                        </tr>
                        <tr>
                            <td><b>Kembali ke dokter/unit yang meminta sebelum pengobatan</b></td>
                            <td>: <?= ($k->kembali==1)?"Ya":"Tidak"?></td>
                        </tr>
                        <tr>
                            <td><b>Tindakan untuk persetujuan terlebih dahulu<br/>Terima kasih atas advise dan kerjasamanya</b></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <div class="sign_in">
                    <div class="pasien">
                       
                    </div>
                    <div class="petugas">
                        <table class='footer' style="margin-top:0px">
                            <tr>
                                <td>Bukittinggi, <?php echo DateToIndo($k->tgl) ?></td>
                            </tr>
                            <tr>
                                <td style='text-align:center'>DPJP</td>
                            </tr>
                            <tr>
                                <td height="64px" >
                                    <div id="qrcode_dpjp_minta"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>( <?= $k->dpjp_minta ?> )</td>
                            </tr>
                            <tr>
                                <td><i>diisi nama lengkap beserta gelar</i></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <hr>
            </td>
        </tr>
        <tr>
            <td>
                <div class="content">
                    <h3 style="font-family: Cambria,Georgia,serif;">Jawaban Konsultasi</h3>
                    <table class="main">
                        <tr>
                            <td width="50%"><b>Yth.T.S. DR. (Konsulen) yang diminta</b></td>
                            <td>: <?= $k->dpjp_diminta?></td>
                        </tr>
                        <tr>
                            <td>Rincian Jawaban</td>
                            <td>: <?=$k->hasil_konsultasi?></td>
                        </tr>
                    </table>
                </div>
                <div class="sign_in">
                <div class="pasien">
                       
                       </div>
                       <div class="petugas">
                           <table class='footer' style="margin-top:0px">
                               <tr>
                                   <td>Bukittinggi, <?php echo DateToIndo($k->tgl) ?></td>
                               </tr>
                               <tr>
                                   <td style='text-align:center'>DPJP</td>
                               </tr>
                               <tr>
                                   <td height="64px" >
                                       <div id="qrcode_dpjp_diminta"></div>
                                   </td>
                               </tr>
                               <tr>
                                   <td>( <?= $k->dpjp_diminta ?> )</td>
                               </tr>
                               <tr>
                                   <td><i>diisi nama lengkap beserta gelar</i></td>
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
    var code = "<?= $k->dpjpMintaSign ?>";
    var qrcode = new QRCode(document.getElementById("qrcode_dpjp_minta"), {
        text: code,
        width: 80,
        height: 80,
        colorDark : "#000",
        colorLight : "#fff",
    });
</script>
<script type="text/javascript">
    var code = "<?= $k->dpjpDimintaSign ?>";
    var qrcode = new QRCode(document.getElementById("qrcode_dpjp_diminta"), {
        text: code,
        width: 80,
        height: 80,
        colorDark : "#000",
        colorLight : "#fff",
    });
</script>
</html>