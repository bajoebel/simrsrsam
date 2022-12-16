<?php
$data['id_negara'] = 0;
$date = date("Y-m-d");

if ($data['id_negara'] == 0) {
    $neg = "INDONESIA";
} else {
    $neg = $data['nama_negara'];
}
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
            height: 120px;
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
            padding: 5px;
            border: 1px solid #000;
            border-radius: 5px 5px 5px;
            float: right;
            font-size: 15px;
            font-weight: bold;
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
            font-size: 14px;
            margin-top: 10px;
        }

        table tr td {
            font-family: Cambria, Georgia, serif;
            font-size: 14px;
        }

        .content {
            width: 180mm;
        }

        .sign_in {
            margin-left: 100mm;
        }

        .sign_in table {
            text-align: center;
            margin-top: 50px;
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
                        FORM RM 02.00 Rev. 00
                    </div>
                </div>
                <div class="content">
                    <h3 style="font-family: Cambria,Georgia,serif;">SURAT MASUK RAWAT JALAN</h3>
                    <table>
                        <tr>
                            <td id="info">Nomor Rekam Medis</td>
                            <td id="spasi">: </td>
                            <td>
                                <?= $c["1"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Nama Pasien </strong></td>
                            <td>:</td>
                            <td>
                                <strong> <?= $c["2"] ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td>Tempat/Tanggal Lahir </td>
                            <td>: </td>
                            <td>
                                <?= $c["3"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>
                                <?= $c["4"] ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Kebangsaan</td>
                            <td>:</td>
                            <td>
                                <?= $c["5"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td>
                                <?= $c["6"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td>
                                <?= $c["7"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat Kantor</td>
                            <td>:</td>
                            <td> <?= $c["8"] ?></td>
                        </tr>
                        <tr>
                            <td>No. KTP</td>
                            <td>:</td>
                            <td>
                                <?= $c["9"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>No. Telp/HP</td>
                            <td>:</td>
                            <td>
                                <?= $c["10"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">Alamat Rumah</td>
                            <td valign="top">:</td>
                            <td>
                                <?= $c["11"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Kunjungan</td>
                            <td>:</td>
                            <td>
                                <?= $c["12"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Jam</td>
                            <td>:</td>
                            <td>
                                <?= $c["13"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" height="50px" valign="bottom"><strong>Penanggung Jawab Pasien</strong></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>
                                <?= $c["14"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Umur</td>
                            <td>:</td>
                            <td>
                                <?= $c["15"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td>
                                <?= $c["16"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>
                                <?= $c["17"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>No.Telp/HP</td>
                            <td>:</td>
                            <td>
                                <?= $c["18"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Hub Keluarga</td>
                            <td>:</td>
                            <td>
                                <?= $c["19"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Dikirim Oleh</td>
                            <td>:</td>
                            <td>
                                <?= $c["20"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat Pengirim</td>
                            <td>:</td>
                            <td>
                                <?= $c["21"] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Dokter Jaga</td>
                            <td>:</td>
                            <td>
                                <?= $c["22"] ?>
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="sign_in">
                    <table>
                        <tr>
                            <td>Bukittinggi, <?php echo DateToIndo(date('Y-m-d')) ?></td>
                        </tr>
                        <tr>
                            <td>Petugas Rekam Medis</td>
                        </tr>
                        <tr>
                            <td height="50px">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>( ............................... )</td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>