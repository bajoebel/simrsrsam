<?php 
// print_r($p);
error_reporting(0);
$detail=$this->nota_model->getPendaftaranByRegunit($hasil[0]["reg_unit"]);
$jenis=$this->nota_model->getJenisPemeriksaanById($hasil[0]["idjenispemeriksaan"]);
// echo $jenis->template;
// print_r($jenis);
?>
<html>
    <head>
        <title>Laporan</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.css" />
        <style>
        .tab-content{
            border:1px solid #ccc;
            border-collapse:collapse;
            padding:10px;
        }
        .header {
                border-bottom: 2px #000 doble;
                border-collapse: collapse;
                border-bottom-style: double;
                padding: 10px;
                font-size: 8pt;
                display:flex;
            }

            .left {
                float: left;
                /* border: 1px solid #ccc;
                border-collapse:collapse; */
                width:13%;
            }
            

            .right {
                float:left;
                text-align: center;
                /* border: 1px solid #ccc;
                border-collapse:collapse; */
                width:85%;
            }

            .images {
                width: 100px;
            }

            .header1 {
                font-size: 12pt;
                font-weight: bold;
            }

            .header2 {
                font-size: 14pt;
                font-weight: bold;
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
            .judul {
                font-size: 18pt;
                font-weight: bold;
                text-align: center;
                padding: 30px 0px 30px 0px;
            }
            .text-error{
                color:#dd4b39;
            }
            .isi{
                font-size:8pt;
            }
            .table{
                font-size:8pt;
            }
        </style>
    </head>
    <body>
        <div id="info<?= $hasil[0]['idx'] ?>">

        </div>
        <div class="container">
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
        <br>
        <div class="isi" id="isi">
            <table class="identitas" style="border: 0px;">
                <tr style="border: 0px;">
                    <td style="border: 0px;font-weight:bold;font-size:8pt">Nama</td>
                    <td style="border: 0px;font-size:8pt;">: <?= $detail->nama_pasien ?></td>
                    <td style="border: 0px;font-weight:bold;font-size:8pt;">Tgl Lahir</td>
                    <td style="border: 0px;font-size:8pt;">: <?= longDate($detail->tgl_lahir) ?></td>
                    <td style="border: 0px;font-weight:bold;font-size:8pt;">MR</td>
                    <td style="border: 0px;font-size:8pt;">: <?= $detail->nomr ?></td>
                    <td style="border: 0px;font-weight:bold;font-size:8pt;">Status</td>
                    <td style="border: 0px;font-size:8pt;">: <?= $detail->cara_bayar ?></td>
                </tr>
                <tr>
                    <td style="border: 0px;font-weight:bold;font-size:8pt;">Alamat</td>
                    <td style="border: 0px;max-width:250px;font-size:8pt;">: <?= "Kel. ".$detail->nama_kelurahan ." Kec. " .$detail->nama_kecamatan ."".$detail->nama_kab_kota ." Prov " .$detail->nama_provinsi ?></td>
                    <td style="border: 0px;font-weight:bold;font-size:8pt;">Umur</td>
                    <td style="border: 0px;font-size:8pt;">: <?= getUmur($detail->tgl_lahir,$detail->tgl_masuk) ?></td>
                    <td style="border: 0px;font-weight:bold;font-size:8pt;">Ruang</td>
                    <td style="border: 0px;font-size:8pt;">: <?= $detail->nama_ruang ?></td>
                    <td style="border: 0px;font-weight:bold;font-size:8pt;">Tgl Pengiriman</td>
                    <td style="border: 0px;font-size:8pt;">: <?= $detail->tgl_masuk ?></td>
                </tr>
                <tr>
                    <td style="border: 0px;font-weight:bold;font-size:8pt;">Pengirim.</td>
                    <td style="border: 0px;font-size:8pt;">: <?= $detail->nama_asal_ruang ?></td>
                    <td style="border: 0px;font-weight:bold;font-size:8pt;">Jenis Kelamin</td>
                    <td style="border: 0px;font-size:8pt;">: <?= ($detail->jns_kelamin=="0")? "Perempuan":"laki-Laki" ?></td>
                    <td style="border: 0px;font-size:8pt;">&nbsp;</td>
                    <td style="border: 0px;font-size:8pt;">&nbsp;</td>
                    <td style="border: 0px;font-size:8pt;">&nbsp;</td>
                    <td style="border: 0px;font-size:8pt;">&nbsp;</td>
                </tr>

            </table>
            
            <?php
            if(!empty($verifikator)){
                if ($jenis->template == 'DahakTB') {
                    echo '<div class="judul">'.$p->jenis_pemeriksaan.'<br></div>';
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
                }elseif($jenis->template == "Radiologi"){
                    echo '<div class="judul">'.$hasil[0]['jenispemeriksaan'].'<br></div>';
                }elseif($jenis->template == "Patologi"){
                    echo "<br><legend>Hasil Pemeriksaan ".$hasil[0]['jenispemeriksaan']."</legend>";
                }else {
                    echo '<div class="judul">'.$hasil[0]['jenispemeriksaan'].'<br></div>';
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
                        if ($namapemeriksaan != $h['namapemeriksaan']) {
                            $start++;
                            if ($h->idsubpemeriksaan <= 0) {
                                //Tidak ada Sub Pemeriksaan
                                echo "<tr>";
                                echo "<td>" . $start . "</td>";
                                echo "<td>" . $h['namapemeriksaan'] . "</td>";
                                echo "<td>" . $h['hasil'] . "</td>";
                                echo "<td>" . $h['tingkatpositif'] . "</td>";
                                if ($h['nanah_lendir'] == 1) echo "<td class='text-center'>v</td>";
                                else echo "<td class='text-center'>x</td>";
                                if ($h['bercak_darah'] == 1) echo "<td class='text-center'>v</td>";
                                else echo "<td class='text-center'>x</td>";
                                if ($h['air_liur'] == 1) echo "<td class='text-center'>v</td>";
                                else echo "<td class='text-center'>x</td>";
                                echo "</tr>";
                            } else {
                                echo "<tr>";
                                echo "<td>" . $start . "</td>";
                                echo "<td colspan='6'><b>" . $h['namapemeriksaan'] . "</b></td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td></td>";
                                echo "<td>" . $h['subpemeriksaan'] . "</td>";
                                echo "<td>" . $h['hasil'] . "</td>";
                                echo "<td>" . $h['tingkatpositif'] . "</td>";
                                if ($h['nanah_lendir'] == 1) echo "<td class='text-center'>v</td>";
                                else echo "<td class='text-center'>x</td>";
                                if ($h['bercak_darah'] == 1) echo "<td class='text-center'>v</td>";
                                else echo "<td class='text-center'>x</td>";
                                if ($h['air_liur'] == 1) echo "<td class='text-center'>v</td>";
                                else echo "<td class='text-center'>x</td>";
                                echo "</tr>";
                            }
                            echo '</tbody></table>';
                        } else {
                            echo "<tr>";
                            echo "<td></td>";
                            echo "<td>" . $h['subpemeriksaan'] . "</td>";
                            echo "<td>" . $h['hasil'] . "</td>";
                            echo "<td>" . $h['tingkatpositif'] . "</td>";
                            if ($h['nanah_lendir'] == 1) echo "<td class='text-center'>v</td>";
                            else echo "<td class='text-center'>x</td>";
                            if ($h['bercak_darah'] == 1) echo "<td class='text-center'>v</td>";
                            else echo "<td class='text-center'>x</td>";
                            if ($h['air_liur'] == 1) echo "<td class='text-center'>v</td>";
                            else echo "<td class='text-center'>x</td>";
                            echo "</tr>";
                        }
                    }
                } elseif($jenis->template == "Radiologi"){
                    foreach ($hasil as $h ) {
                        $no=0;
                        if ($namapemeriksaan != $h['namapemeriksaan']) {
                            $no++;
                            if ($h['idsubpemeriksaan'] > 0) {
                                ?>
                                <legend><?= $h['namapemeriksaan'] ?></legend>
                                <div class="row">
                                    <div class="col-md-2"><?= $h['subpemeriksaan'] ?></div>
                                    <div class="col-md-10">: <?= $h['hasil'] ?></div>
                                </div>
                                <?php
                            }else{
                                ?>
                                <div class="row">
                                    <div class="col-md-2"><?= $h['namapemeriksaan'] ?></div>
                                    <div class="col-md-10">: <?= $h['hasil'] ?></div>
                                </div>
                                <?php
                            }
                        }else{
                            ?>
                                <div class="row">
                                    <div class="col-md-2"><?= $h['subpemeriksaan'] ?></div>
                                    <div class="col-md-10">: <?= $h['hasil'] ?></div>
                                </div>
                                <?php
                        }
                        $namapemeriksaan = $h['namapemeriksaan'];
                        // if($jenis->template == "Radiologi") echo "<h3>Hasil Pemeriksaan Radiologi ".$h['namapemeriksaan']."</h3>";
                        // else echo "<h3>Hasil Pemeriksaan Patologi Anatomi ".$h['namapemeriksaan']."</h3>";
                        // echo "<p>".$h['hasil']."</p>";
                    }
                }else if($jenis->template == "Patologi"){
                    foreach ($hasil as $h ) {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="col-md-2" style="padding:10px"><?= $h['namapemeriksaan'] ?></div>
                            <div class="col-md-1" style="padding:10px;text-align:right;">:</div>
                            <div class="col-md-9" style="padding:10px;text-align:justify;"><?= $h['hasil'] ?></div>
                            </div>
                            
                        </div>
                        <?php
                    }
                }else {
                    $no = 0;
                    foreach ($hasil as $h) {
                        if ($namapemeriksaan != $h['namapemeriksaan']) {
                            $no++;
                            if ($h->idsubpemeriksaan > 0) {
                                ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td colspan="5"><?= $h['namapemeriksaan']; ?></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><?= $h['subpemeriksaan'] ?></td>
                                    <td><?= $h['hasil'] ?></td>
                                    <td><?= $h['satuan'] ?></td>
                                    <td><?= $h['rujukan_lk']; ?></td>
                                    <td><?= $h['rujukan_pr']; ?></td>
                                </tr>
                            <?php
                            } else {
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $h['namapemeriksaan'] ?></td>
                                    <td><?= $h['hasil'] ?></td>
                                    <td><?= $h['satuan'] ?></td>
                                    <td><?= $h['rujukan_lk']; ?></td>
                                    <td><?= $h['rujukan_pr']; ?></td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td>&nbsp;</td>
                                <td><?= $h['subpemeriksaan'] ?></td>
                                <td><?= $h['hasil'] ?></td>
                                <td><?= $h['satuan'] ?></td>
                                <td><?= $h['rujukan_lk']; ?></td>
                                <td><?= $h['rujukan_pr']; ?></td>
                            </tr>
                        <?php
                        }
                        $namapemeriksaan = $h['namapemeriksaan'];
                        // if($no==6) break;
                    }
                    echo '</tbody></table>';
                }
                ?>
                <br>
                <?php 
            } 
            ?>
            <table class="identitas" style="border: 0px;">
                <tr style="border: 0px;">
                    <td style="border: 0px;">
                        <?php 
                        
                            if(!empty($verifikator) ){
                            ?>
                            <div class="col-md-12">
                                <p class='pull-right'>
                                Padang Panjang, <?= longDate($hasil[0]['tanggal_periksa']) ?>
                                </p>
                            </div>
                            <div class="col-md-12">
                                <p class='pull-right'>
                                <img src="<?= base_url()."nota_tagihan.php/digisign/qr?data=".$token ?>" />
                                </p>
                            </div>
                            <div class="col-md-12">
                                <p class='pull-right'>
                                <?= getNamaDokter($verifikator) ?>
                                </p><br>
                            </div>
                            <?php 
                            } 
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        </div>
        
    </body>
</html>
