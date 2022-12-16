<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Surat Kontrol</title>
    <style type="text/css">
        .konten {
            width: 210mm;
            height: 279mm;
            padding-left: 15mm;
            padding-right: 15mm;
            /*border:1px #000 solid;
    border-collapse:collapse;*/
        }

        .header {
            border-bottom: 2px #000 doble;
            border-collapse: collapse;
            border-bottom-style: double;
            padding: 10px;
        }

        .left {
            float: left;
        }

        .right {
            text-align: center;
        }

        .images {
            width: 100px;
        }

        .header1 {
            font-size: 18pt;
            font-weight: bold;
        }

        .header2 {
            font-size: 28pt;
            font-weight: bold;
        }

        .border {
            width: 100%;
            border: 1px #000 solid;
            border-collapse: collapse;
        }

        .judul {
            font-size: 18pt;
            font-weight: bold;
            text-align: center;
            padding: 30px 0px 30px 0px;
        }

        .isi {
            text-align: justify;
        }

        .pull-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="konten">
        <div class="header">
            <div class="left">
                <img src="<?= base_url() . "assets/images/logopp.png" ?>" alt="Logo" class='images'>
            </div>
            <div class="right">
                <div class='header1'>Pemerintah Kota Padang Panjang</div>
                <div class='header2'>RUMAH SAKIT UMUM DAERAH</div>
                <div class='header3'>Jl. Tabek Gadang Kel. Ganting - Gunung fax (0752) 82046 Kode Pos 27127<br>
                    Website : rsud.padangpanjang.go.id - email: rsud.pp@padangpanjang.go.id</div>
            </div>

        </div>
        <div class="border"></div>
        <div class="judul">
            <u><?= $judul ?></u><br>
            <?php
            $tgl_minta = explode(' ', $surat->tgl_minta);
            $tgl = explode('-', $tgl_minta[0]);
            $romawi = array('', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
            $bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
            ?>
            <?= "Nomor : " . $surat->idx . "/" . str_replace(' ', '', $surat->nama_ruang_pengirim . "/RSUD-PP/" . $romawi[intval($tgl[1])] . "-" . $tgl[0]) ?>
        </div>
        <div class="isi">
            <p>Kepada yth : Kepala Ruangan <?= $surat->nama_ruang ?></p>
            <p>Dengan Ini kami memindahkan pasien atas nama
            <table>
                <tr>
                    <td>Nama</td>
                    <td> : <?= $surat->nama_pasien; ?></td>
                </tr>
                <tr>
                    <td>Nomr</td>
                    <td> : <?= $surat->nomr; ?></td>
                </tr>
                <?php
                $jek = array('0' => 'Perempuan', 'P' => 'Perempuan', '1' => 'Laki-Laki', 'L' => 'Laki Laki');
                ?>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td> : <?= $jek[$surat->jns_kelamin]; ?></td>
                </tr>
            </table>
            <br>
            Yang mana sebelumnya dirawat di <?= $surat->nama_ruang_pengirim ?> akan di pindahkan ke <?= $surat->nama_ruang ?>
            </p>
            <p>Demikianlah surat ini dibuat, kepada bapak / ibu di ruangan <?= $surat->nama_ruang ?> mohon untuk ditindak lanjuti, Atas perhatiannya kami ucapkan terima kasih</p>
            <p></p>
            <p></p>
            <p class='pull-right'>
                Padang Panjang, <?= $tgl[2] . " " . $bulan[intval($tgl[1])] . " " . $tgl[0] ?><br>
                Kepala Ruangan <?= $surat->nama_ruang_pengirim ?>
            </p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p class='pull-right'>
                (.................................................................)
            </p>
        </div>
    </div>
    <script type="text/javascript">
        window.print();
        window.close();
    </script>
</body>

</html>