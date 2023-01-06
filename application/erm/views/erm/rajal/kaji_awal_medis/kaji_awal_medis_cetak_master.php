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

        table.main {
            border-collapse: collapse;
            width: 180mm;
            padding: 1px;
        }

        table.main,
        table.main td {
            border: 1px solid #000;
        }

        table.fisik {
            width: 25mm
        }

        table.fisik,
        table.fisik td {
            border: none;
        }

        table.footer {
            width: 100%
        }

        table.footer,
        table.footer td {
            border: none;
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
                        <div class='kode-form'>FORM RM 02.03 Rev. 02</div>
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
                    <table style="margin-left:10mm">
                        <tr>
                            <td>
                                <b>II. ASESMEN AWAL MEDIS RAWAT JALAN</b><br />
                                <small><i>&nbsp;&nbsp;&nbsp;&nbsp;(Diisi oleh dokter dan dilengkapi dalam waktu 2 jam setelah pasien diperiksa</i></small>
                            </td>
                        <tr>
                        <tr>
                            <td>
                                <span>Tanggal : <?= str_pad(" ", 40, ".") ?></span><span style="margin-left:4mm">Jam: <?= str_pad(" ", 40, ".") ?> WIB</span>
                            </td>
                        </tr>
                    </table>
                    <table class="main">
                        <tr>
                            <td>
                                <span>ANAMNESIS : </span><span style='margin-left:3mm'>&#9744; Auto</span><span style='margin-left:10mm'>&#9744; Allo</span><br>
                                <div style="height:20mm"></div>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>Pemeriksaan Fisik : </span>
                                <table class="fisik">
                                    <tr>
                                        <td>Td </td>
                                        <td>: </td>
                                    </tr>
                                    <tr>
                                        <td>Nadi </td>
                                        <td>: </td>
                                    </tr>
                                    <tr>
                                        <td>Pernafasan </td>
                                        <td>: </td>
                                    </tr>
                                    <tr>
                                        <td>Suhu </td>
                                        <td>: </td>
                                    </tr>
                                </table>
                                <div style="height:20mm"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>DIAGNOSIS KERJA : </span>
                                <div style="height:10mm"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>DIAGNOSIS BANDING : </span>
                                <div style="height:10mm"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>PEMERIKSAAN PENUNJANG : </span>
                                <div style="height:20mm"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>THERAPI / TINDAKAN : </span>
                                <div style="height:20mm"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>KONTROL ULANG : &nbsp;&nbsp;&#9744;Kembali Kontrol </span><span style='margin-left:10mm;'>Hari/Tanggal:.........................</span><span style='margin-left:10mm;'>Jam : .........................</span><span> Poliklinik : </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="sign_in">
                                    <div class="pasien">
                                        <table class='footer' style="margin-top:0px">
                                            <tr>
                                                <td>Telah dijelaskan dan dipahami kepada</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    &#9744; Pasien &nbsp;&nbsp;&nbsp; &#9744; Keluarga, hubungan <?= str_pad(" ", 40, ".") ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="50px">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>( <?= str_pad(" ", 150, ".") ?> )</td>
                                            </tr>
                                            <tr>
                                                <td><i>diisi nama lengkap pasien / keluarga</i></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="petugas">
                                        <table class='footer' style="margin-top:0px">
                                            <tr>
                                                <td>Bukittinggi, <?php echo DateToIndo(date('Y-m-d')) ?></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center'>DPJP</td>
                                            </tr>
                                            <tr>
                                                <td height="50px">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>( <?= str_pad(" ", 150, ".") ?> )</td>
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
                </div>

            </td>
        </tr>
    </table>
</body>

</html>