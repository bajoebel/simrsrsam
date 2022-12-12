<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Surat Kontrol</title>
    <style type="text/css">

.konten{
    width:210mm;
    height:279mm;
    padding-left: 15mm;
    padding-right: 15mm;
    /*border:1px #000 solid;
    border-collapse:collapse;*/
}

.header{
    border-bottom:2px #000 doble;
    border-collapse:collapse;
    border-bottom-style:double;
    padding:10px;
}
.left{
    float:left;
}
.right{
    text-align:center;
}
.images{
    width:100px;
}
.header1{
    font-size:18pt;
    font-weight:bold;
}
.header2{
    font-size:28pt;
    font-weight:bold;
}
.border{
    width:100%;
    border:1px #000 solid;
    border-collapse:collapse;
}

.judul{
    font-size:18pt;
    font-weight:bold;
    text-align:center;
    padding:30px 0px 30px 0px;
}
.isi{
    text-align:justify;
}
.pull-right{
    text-align:right;
}
            </style>
</head>
<body>
<div class="konten">
    <div class="header">
        <div class="left">
        <img src="<?= base_url() ."assets/images/logopp.png" ?>" alt="Logo" class='images'> 
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
    $tgl=explode('-',$surat->tgl_buat);
    $romawi = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');

    ?>
    <?= "Nomor : ".$surat->nomor_surat_kontrol ."/". str_replace(' ','',$surat->nama_ruang ."/RSUD-PP/" .$romawi[intval($tgl[1])] ."-" .$tgl[0]) ?>
    </div>
    <div class="isi">
        <table>
        <tr>
        <td>No.</td><td>: <?= $surat->nomor_surat_kontrol ?></td>
        </tr>
        <tr>
        <td>Nama</td><td>: <?= $surat->nama_pasien ?></td>
        </tr>
        <tr>
        <td>Diagnosa.</td><td>: <?= $surat->diagnosa ?></td>
        </tr>
        <tr>
        <td>Terapi </td><td>: <?= $surat->terapi ?></td>
        </tr>
        <tr>
        <td>Tanggal Rujukan.</td><td>: <?= $surat->tgl_rujukan ?></td>
        </tr>
        </table>
        <p>Belum Dapat dikembalikan ke fasilitas perujuk dengan alasan
        <ol>
        <?php 
            $alasan_kontrol=explode(',', $surat->alasan_kontrol);
            foreach ($alasan_kontrol as $a ) {
                echo "<li>".$a."</li>";
            }
            
        ?>
        
        </ol>
        </p>
        <p>Rencana tindakan lanjut yang akan dilakukan pada kunjungan berikutnya di <?= "<b>POLIKLINIK " .strtoupper($surat->nama_ruang)."</b>" ?> adalah
        <ol>
        <?php 
            $rencana_tindaklanjut=explode(',', $surat->rencana_tindaklanjut);
            foreach ($rencana_tindaklanjut as $r ) {
                echo "<li>".$r."</li>";
            }
            $tgl=explode('-',$surat->tgl_kontrol);
            $timestamp = strtotime($surat->tgl_kontrol);

            $d = date('D', $timestamp);
            $day=array(
                'Sun' => 'Minggu',
                'Mon' => 'Senin',
                'Tue' => 'Selasa',
                'Wed' => 'Rabu',
                'Thu' => 'Kamis',
                'Fri' => 'Jumat',
                'Sat' => 'sabtu'
            );
            $hari = $day[$d];
            $bulan = array('','Januari', 'Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
        ?>
        </ol>
        </p>
        <p><b>Surat keterangan ini digunakan untuk sekali kunjungan dengan diagnosa diatas Pada Tanggal : <?= $hari .", ".$tgl[2] ." " .$bulan[intval($tgl[1])] ." " . $tgl[0] ?></b></p>
        <p></p>
        <p></p>
        <p class='pull-right'>
            Padang Panjang, <?= $tgl[2] ." " .$bulan[intval($tgl[1])] ." " . $tgl[0] ?>
        </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p class='pull-right'>
        <?= $surat->nama_dokter ?>
        </p>
    </div>
</div>
<script type="text/javascript">
    window.print();
    window.close();
</script>
</body>
</html>