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

        table {
            /*border-collapse: collapse;*/
            width: 100%;
        }

        .text-center {
            text-align: center;
        }

        /* table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        } */

        .table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .identitas {
            width: 100%;
            font-size: 10pt;
            padding: 5px 0;

        }

        .identitas,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
            border-collapse: collapse;
        }

        .bg-gray {
            background-color: #ccc5c582;
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

            <?php
            $tgl = explode('-', $hasil[0]->tanggal_periksa);
            $tgl_lahir = explode('-', $pasien->tgl_lahir);
            $romawi = array('', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
            $bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
            //print_r($hasil);
            ?>
            <?php // "Nomor : ".$surat->nomor_surat_kontrol ."/". str_replace(' ','',$surat->nama_ruang ."/RSUD-PP/" .$romawi[intval($tgl[1])] ."-" .$tgl[0]) 
            ?>
        </div>
        <div class="isi">
            <table class="identitas" style="border: 0px;">
                <tr style="border: 0px;">
                    <td style="border: 0px;">Nama</td>
                    <td style="border: 0px;">: <?= $hasil[0]->nama_pasien ?></td>
                    <td style="border: 0px;">Tgl Lahir</td>
                    <td style="border: 0px;">: <?= $tgl_lahir[2] . " " . $bulan[intval($tgl_lahir[1])] . " " . $tgl_lahir[0] ?></td>
                    <td style="border: 0px;">MR</td>
                    <td style="border: 0px;">: <?= $pasien->nomr ?></td>
                    <td style="border: 0px;">Status</td>
                    <td style="border: 0px;">: <?= $reg->cara_bayar ?></td>
                </tr>
                <tr>
                    <td style="border: 0px;">Alamat</td>
                    <td style="border: 0px;">: <?= $pasien->alamat ?></td>
                    <td style="border: 0px;">Umur</td>
                    <td style="border: 0px;">: </td>
                    <td style="border: 0px;">Ruang</td>
                    <td style="border: 0px;">: </td>
                    <td style="border: 0px;">Tgl Pengiriman</td>
                    <td style="border: 0px;">: </td>
                </tr>
                <tr>
                    <td style="border: 0px;">Pengirim.</td>
                    <td style="border: 0px;">: <?= $hasil[0]->ruangpengirim ?></td>
                    <td style="border: 0px;">Jekel</td>
                    <td style="border: 0px;">: </td>
                    <td style="border: 0px;">&nbsp;</td>
                    <td style="border: 0px;">&nbsp;</td>
                    <td style="border: 0px;">&nbsp;</td>
                    <td style="border: 0px;">&nbsp;</td>
                </tr>

            </table>
            <div class="judul"><?php echo $hasil[0]->jenispemeriksaan ?><br></div>
            <?php
            //echo $jenis->template;
            if ($jenis->template == 'DahakTB') {
                echo '<table class="table">';
                echo '<thead class="bg-gray">';
                echo '<tr>';
                echo '<td rowspan="2" class="col" valign="center">NO</td>';
                echo '<td rowspan="2" class="col" valign="center">Pemeriksaan</td>';
                echo '<td rowspan="2" class="col" >Hasil</td>';
                echo '<td rowspan="2" class="col" valign="center">Tingkat Positif</td>';
                echo '<td colspan="3" class="col" align="center">Visual Dahak</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td class="col text-center">Nanah Lendir</td>';
                echo '<td class="col text-center">Bercak Darah</td>';
                echo '<td class="col text-center">Air Liur</td>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
            }elseif($jenis->template == "Radiologi"|| $jenis->template == "Patologi" ){
                echo "";
            } else {
                echo '<table class="table">';
                echo '<thead class="bg-gray">';
                echo '<tr>';
                echo '<td rowspan="2" valign="center">NO</td>';
                echo '<td rowspan="2" valign="center">Pemeriksaan</td>';
                echo '<td rowspan="2">Hasil</td>';
                echo '<td rowspan="2" valign="center">Satuan</td>';
                echo '<td colspan="2" align="center">Nilai Rujukan</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Pria</td>';
                echo '<td>Wanita</td>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
            }
            $namapemeriksaan = "";
            $start = 0;

            if ($jenis->template == 'DahakTB') {
                foreach ($hasil as $h) {
                    if ($namapemeriksaan != $h->namapemeriksaan) {
                        $start++;
                        if ($h->idsubpemeriksaan <= 0) {
                            //Tidak ada Sub Pemeriksaan
                            echo "<td>" . $start . "</td>";
                            echo "<td>" . $h->namapemeriksaan . "</td>";
                            echo "<td>" . $h->hasil . "</td>";
                            echo "<td>" . $h->tingkatpositif . "</td>";
                            if ($h->nanah_lendir == 1) echo "<td class='text-center'>v</td>";
                            else echo "<td class='text-center'>x</td>";
                            if ($h->bercak_darah == 1) echo "<td class='text-center'>v</td>";
                            else echo "<td class='text-center'>x</td>";
                            if ($h->air_liur == 1) echo "<td class='text-center'>v</td>";
                            else echo "<td class='text-center'>x</td>";
                            echo "</tr>";
                        } else {
                            echo "<tr>";
                            echo "<td>" . $start . "</td>";
                            echo "<td colspan='6'><b>" . $h->namapemeriksaan . "</b></td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td></td>";
                            echo "<td>" . $h->subpemeriksaan . "</td>";
                            echo "<td>" . $h->hasil . "</td>";
                            echo "<td>" . $h->tingkatpositif . "</td>";
                            if ($h->nanah_lendir == 1) echo "<td class='text-center'>v</td>";
                            else echo "<td class='text-center'>x</td>";
                            if ($h->bercak_darah == 1) echo "<td class='text-center'>v</td>";
                            else echo "<td class='text-center'>x</td>";
                            if ($h->air_liur == 1) echo "<td class='text-center'>v</td>";
                            else echo "<td class='text-center'>x</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td>" . $h->subpemeriksaan . "</td>";
                        echo "<td>" . $h->hasil . "</td>";
                        echo "<td>" . $h->tingkatpositif . "</td>";
                        if ($h->nanah_lendir == 1) echo "<td class='text-center'>v</td>";
                        else echo "<td class='text-center'>x</td>";
                        if ($h->bercak_darah == 1) echo "<td class='text-center'>v</td>";
                        else echo "<td class='text-center'>x</td>";
                        if ($h->air_liur == 1) echo "<td class='text-center'>v</td>";
                        else echo "<td class='text-center'>x</td>";
                        echo "</tr>";
                    }
                }
            } elseif($jenis->template == "Radiologi" || $jenis->template == "Patologi"){
                //print_r($hasil);
                foreach ($hasil as $h ) {
                    if($jenis->template == "Radiologi") echo "<h3>Hasil Pemeriksaan Radiologi ".$h->namapemeriksaan."</h3>";
                    else echo "<h3>Hasil Pemeriksaan Patologi Anatomi ".$h->namapemeriksaan."</h3>";
                    echo "<p>".$h->hasil."</p>";
                }
                
            }else {

                $no = 0;
                foreach ($hasil as $h) {

                    # code...
                    if ($namapemeriksaan != $h->namapemeriksaan) {
                        $no++;
                        if ($h->idsubpemeriksaan > 0) {
            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td colspan="4"><?= $h->namapemeriksaan; ?></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><?= $h->subpemeriksaan ?></td>
                                <td><?= $h->hasil ?></td>
                                <td><?= $h->satuan ?></td>
                                <td><?= $h->rujukan_lk; ?></td>
                                <td><?= $h->rujukan_pr; ?></td>
                            </tr>
                        <?php
                        } else {
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $h->namapemeriksaan ?></td>
                                <td><?= $h->hasil ?></td>
                                <td><?= $h->satuan ?></td>
                                <td><?= $h->rujukan_lk; ?></td>
                                <td><?= $h->rujukan_pr; ?></td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td><?= $h->subpemeriksaan ?></td>
                            <td><?= $h->hasil ?></td>
                            <td><?= $h->satuan ?></td>
                            <td><?= $h->rujukan_lk; ?></td>
                            <td><?= $h->rujukan_pr; ?></td>
                        </tr>
            <?php
                    }
                    $namapemeriksaan = $h->namapemeriksaan;
                }
            }
            ?>
            </tbody>
            </table>
            <br>
            <table class="identitas" style="border: 0px;">
                <tr style="border: 0px;">
                    <td style="border: 0px;">
                        <p class='pull-right'>
                            Padang Panjang, <?= $tgl[2] . " " . $bulan[intval($tgl[1])] . " " . $tgl[0] ?>
                        </p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p class='pull-right'>
                            <?= $hasil[0]->nama_petugas ?>
                        </p>
                    </td>
                </tr>
            </table>


        </div>
    </div>
    <script type="text/javascript">
        //window.print();
        //window.close();
    </script>
</body>

</html>