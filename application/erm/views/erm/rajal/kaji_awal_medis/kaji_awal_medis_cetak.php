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
            width: 35mm;
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

        table.penunjang {
            border-collapse: collapse;
            width: 100%;
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
                    <table style="margin-left:10mm">
                        <tr>
                            <td>
                                <b>II. ASESMEN AWAL MEDIS RAWAT JALAN</b><br />
                                <small><i>&nbsp;&nbsp;&nbsp;&nbsp;(Diisi oleh dokter dan dilengkapi dalam waktu 2 jam setelah pasien diperiksa</i></small>
                            </td>
                        <tr>
                        <tr>
                            <td>
                                <span>Tanggal : <?= dateToIndo($k->tgl) ?></span><span style="margin-left:4mm">Jam: <?= $k->jam ?> WIB</span>
                            </td>
                        </tr>
                    </table>
                    <table class="main">
                        <tr>
                            <td>
                                <span>ANAMNESIS : </span><?=($k->auto==1)?"<span style='margin-left:3mm'>&#9745; Auto</span>":""?></span><?=($k->allo==1)?"<span style='margin-left:3mm'>&#9745; Allo</span>":""?></span><br>
                                
                                <?php if ($k->auto==1) { ?><div style="height:20mm">
                                    Auto detail :<br/> <?=arr_to_list($k->auto_detail)?></br>
                                </div>
                                <?php } ?>
                                <?php if ($k->allo==1) { ?><div style="height:20mm">
                                    Allo detail : <br/><?=arr_to_list($k->allo_detail)?></br>
                                </div>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>Pemeriksaan Fisik : </span>
                                <table class="fisik">
                                    <tbody>
                                        <tr>
                                            <td>Td </td>
                                            <td>: <?= $k->td ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Nadi </td>
                                            <td>: <?= $k->nadi ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pernafasan </td>
                                            <td>: <?= $k->napas ?></td>
                                        </tr>
                                        <tr>
                                            <td>Suhu </td>
                                            <td>: <?= $k->suhu ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div style="height:20mm"><?= $k->fisik_detail?></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>DIAGNOSIS KERJA : </span>
                                <div style="height:10mm"><?= $k->diagnosis_kerja?></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>DIAGNOSIS BANDING : </span>
                                <div style="height:10mm"><?= $k->diagnosis_banding?></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>PEMERIKSAAN PENUNJANG : </span>
                                <?= $k->penunjang ?>
                                <div>
                                    <?php $penunjang_m = getPermintaanPenunjang($d->idx); 
                                        if ($penunjang_m) {?>
                                        <table class="penunjang" style="margin-bottom:5px">
                                            <tr>
                                                <td colspan="3">
                                                    PERMINTAAN PEMERIKSAAN PENUNJANG
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Pemeriksaan</td>
                                                <td>Detail Pemeriksaan</td>
                                                <td>Lampiran Pemeriksaan</td>
                                            </tr>
                                            <?php foreach ($penunjang_m as $pr) {
                                                $penunjang_detail = getPermintaanPenunjangDetail($pr->id)    
                                            ?>
                                                <tr>
                                                    <td><?= $pr->group_name ?></td>
                                                    <td>
                                                        <?php 
                                                            if ($penunjang_detail) {
                                                                foreach($penunjang_detail as $prd) { 
                                                        ?>
                                                                <?= $prd->tlTitle." : ".$prd->hasil ?><br/>
                                                        <?php }
                                                            } 
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?=$pr->hasil_upload?>" target="_blank">Lihat Disini</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table> 
                                     <?php } ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>THERAPI / TINDAKAN : </span>
                                <div><?= $k->terapi ?></div>
                                <?php $tindakan = getPermintaanTindakan($d->idx);
                                if ($tindakan) {
                                ?>
                                <table class="penunjang" >
                                    <tr>
                                        <td colspan="2">
                                            PERMINTAAN TINDAKAN
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Tindakan</td>
                                    </tr>
                                    <?php 
                                    $tindakan_detail =  getPermintaanTindakanDetailById($tindakan->id); 
                                    foreach($tindakan_detail as $td) {
                                    ?>
                                    <tr>
                                        <td><?= $td->tlTitle ?></td>
                                    </tr>
                                    <?php } ?>
                                </table> 
                                <?php } ?>
                                </br>
                                <?php $resep = getPermintaanResep($d->idx);
                                if ($resep) {
                                ?>
                                <table class="penunjang" >
                                    <tr>
                                        <td colspan="3">
                                            PERMINTAAN RESEP
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Obat</td>
                                        <td>Jenis Obat</td>
                                        <td>Aturan Pakai</td>
                                    </tr>
                                    <?php 
                                    $resep_detail =  getPermintaanResepDetailById($resep->id); 
                                    foreach($resep_detail as $rd) {
                                    ?>
                                    <tr>
                                        <td><?= $rd->nama_obat ?></td>
                                        <td><?= $rd->jenis_obat. " - ".$rd->takaran ?></td>
                                        <td><?= $rd->aturan_pakai ?></td>
                                    </tr>
                                    <?php } ?>
                                </table> 
                                <?php } ?>
                                <br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php if ($k->kontrol==1) { ?>
                                <span>KONTROL ULANG : &nbsp;&nbsp;&#9745;Kembali Kontrol </span><span style='margin-left:10mm;'>Hari/Tanggal: <?=DateToIndo($k->kontrol_tgl) ?> </span><span style='margin-left:3mm;'>Jam : <?=$k->kontrol_jam?></span><span> Poliklinik : <b><?= $k->kontrol_tujuan ?></b></span>
                                <?php } else { ?>
                                <span>Kontrol Ulang : Tidak</span>
                                <?php }?>
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
                                                    <!-- &#9744; Pasien &nbsp;&nbsp;&nbsp; &#9744; Keluarga, hubungan <?= str_pad(" ", 40, ".") ?> -->
                                                    <?= ($k->pj=="pasien")?" &#9745; ".$k->pj:" &#9745; ".$k->pj.", Hubungan ".$k->pj_detail ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="64px">
                                                <?php $ttd = getTtd($k->nomr); if ($ttd) { ?>
                                                    <img src="" alt="">
                                                <?php } else { ?>
                                                    &nbsp;
                                                <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>( <?= $k->pj_nama ?> )</td>
                                            </tr>
                                            <tr>
                                                <td><i>diisi nama lengkap pasien / keluarga</i></td>
                                            </tr>
                                        </table>
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
                                                    <div id="qrcode_awal_medis"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>( <?= $k->dokter ?> )</td>
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
<!-- qrcode -->
<script src="<?php echo base_url() ?>assets/jquery/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/qrcodejs/qrcode.js"></script>
<script type="text/javascript">
    var code = "<?= $k->dokterSign?>";
    var qrcode = new QRCode(document.getElementById("qrcode_awal_medis"), {
        text: code,
        width: 64,
        height: 64,
        colorDark : "#000",
        colorLight : "#fff",
    });
    $(`#qrcode_awal_medis > img`).css({"margin":"auto"});
</script>
</html>