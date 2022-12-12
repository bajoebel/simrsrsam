<style>
    div#pagination b {
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #337ab7;
        border-color: #337ab7;
    }

    div#pagination a {
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
        border-top-color: rgb(221, 221, 221);
        border-right-color: rgb(221, 221, 221);
        border-bottom-color: rgb(221, 221, 221);
        border-left-color: rgb(221, 221, 221);
    }

    .btn-group-wrap {
        text-align: center;
    }

    div.btn-group {
        margin: 0 auto;
        text-align: center;
        width: inherit;
        display: inline-block;
    }

    .btn-group {
        background-color: transparent;
        color: #333;
        display: block;
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size: 13px;
        height: 26px;
        line-height: 17px;
        margin-bottom: 0px;
        margin-left: 0px;
        margin-right: 0px;
        margin-top: 0px;
        position: relative;
        text-align: center;
        width: 100%;
    }

    .allow-scroll {
        position: relative;
        max-height: 300px;
        width: 100%;
        overflow-y: scroll;
    }

    .ui-autocomplete-loading {
        background: white url("<?php echo base_url() ?>ui-anim_basic_16x16.gif") right center no-repeat;
    }

    .ui-autocomplete-input {
        border: none;
        font-size: 14px;
        border: 1px solid #DDD !important;
        z-index: 1511;
        position: relative;
    }

    .ui-menu .ui-menu-item a {
        font-size: 12px;
    }

    .ui-autocomplete {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1510 !important;
        float: left;
        display: none;
        min-width: 160px;
        /*width: 160px;*/
        padding: 4px 0;
        margin: 2px 0 0 0;
        list-style: none;
        background-color: #ffffff;
        border-color: #ccc;
        border-color: rgba(0, 0, 0, 0.2);
        border-style: solid;
        border-width: 1px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding;
        background-clip: padding-box;
        *border-right-width: 2px;
        *border-bottom-width: 2px;
    }

    .ui-menu-item>a.ui-corner-all {
        display: block;
        padding: 3px 15px;
        clear: both;
        font-weight: normal;
        line-height: 18px;
        color: #555555;
        white-space: nowrap;
        text-decoration: none;
    }

    .ui-state-hover,
    .ui-state-active {
        color: #ffffff;
        text-decoration: none;
        background-color: #0088cc;
        border-radius: 0px;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        background-image: none;
    }

    /*.modal-content {min-height: 600px;}
    .rataTengah{text-align: center;}
    .rataKanan{text-align: right;}
    .f15{font-size: 15px;}
    .f20{font-size: 20px;}
    .f20{font-size: 20px;}
    .w10{width: 10px;}
    .w20{width: 20px;}
    .w30{width: 30px;}
    .w40{width: 40px;}
    .w50{width: 50px;}
    .w60{width: 60px;}
    .w70{width: 70px;}
    .w80{width: 80px;}
    .w90{width: 90px;}
    .w100{width: 100px;}
    .w110{width: 110px;}
    .w120{width: 120px;}
    .w130{width: 130px;}
    .w140{width: 140px;}
    .w150{width: 150px;}
    .w160{width: 160px;}
    .w170{width: 170px;}
    .w180{width: 180px;}
    .w190{width: 190px;}
    .w200{width: 200px;}
    .w210{width: 210px;}
    .w220{width: 220px;}
    .w230{width: 230px;}
    .w240{width: 240px;}
    .w250{width: 250px;}
    .w260{width: 260px;}
    .w270{width: 270px;}
    input{border: none;}
    #convNilai{font-size: 20px}*/
</style>
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<section class="content-header">
    <h1><?php echo $contentTitle ?> </h1>
</section>
<?php if (!empty($detail)) { ?>
    <section class="content container-fluid">

        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Penting</h4>
            <?php
            if ($pulang > 0) echo "Pasien ini sudah dipulangkan, Tidak bisa lagi menginputkan tindakan";
            else echo "Menyegerakan pengentrian data tagihan layanan dapat menghindari system menolak entrian tagihan pasien yang telah dipulangkan.";
            ?>
        </div>

        <div class="row">

            <!-- Panel Samping Kiri -->
            <div class="col-md-3">
                <div class="box box-widget widget-user-2">
                    <div class="widget-user-header bg-aqua-active">
                        <div class="widget-user-image">
                            <?php if ($detail->jns_kelamin == "1" || $detail->jns_kelamin == "L") : ?>
                                <img class="img-circle" src="<?php echo base_url() . 'assets/images/male.png' ?>" alt="" id="imgMale">
                            <?php else : ?>
                                <img class="img-circle" src="<?php echo base_url() . 'assets/images/female.png' ?>" alt="" id="imgFemale">
                            <?php endif; ?>
                        </div>
                        <?php
                        if ($detail->jns_layanan == "RI") $kamar = " (" . $detail->nama_kamar . ")";
                        else $kamar = '';
                        ?>
                        <h4 class="widget-user-username"><?php echo $detail->nama_pasien  ?></h4>
                    </div>
                    <div class="box-body">
                        <div style="font-size: 20px;">
                            <span><?php echo $detail->nama_ruang . $kamar ?></span>
                        </div>
                        <div style="font-size: 16px;">
                            <span>No.MR : <?php echo $detail->nomr ?></span>
                        </div>
                        <div style="font-size: 16px;">
                            <span>No.Reg RS : <?php echo $detail->id_daftar ?></span>
                        </div>
                        <div style="font-size: 16px;">
                            <span>No.Reg Unit : <?php echo $detail->reg_unit ?></span>
                        </div>
                        <div style="font-size: 16px;">
                            <span>Kelas Layanan : <?php echo ($detail->kelas_layanan == "") ? "Rawat Jalan" : "Kelas " . $detail->kelas_layanan ?></span>
                        </div>
                        <div style="font-size: 16px;">
                            <span>Jaminan Layanan : <?php echo $detail->cara_bayar ?></span>
                        </div>
                        <div style="font-size: 16px;margin-top:10px;">
                            <hr>
                            <ul class="nav nav-stacked">
                                <?php if (!empty($hakakses)) $arr_aksi = explode(',', $hakakses);
                                else $arr_aksi = array();
                                if (in_array(7, $arr_aksi)) {
                                ?>
                                    <li class="<?php if ($mod == "tindakan") echo "active"; ?>"><a href="<?php echo base_url() . "nota_tagihan.php/layanan/entry_nota?idx=" . $idx ;
                                                                                                            ?>">Tindakan </a></li>
                                <?php
                                }

                                if (in_array(8, $arr_aksi)) {
                                ?>
                                    <li class="<?php if ($mod == "penunjang") echo "active"; ?>"><a href="<?php if ($detail->status_transaksi == 0) echo  base_url() . "nota_tagihan.php/layanan/permintaan_penunjang?idx=" . $idx ;
                                                                                                            else echo "#";
                                                                                                            ?>">Permintaan Penunjang </a></li>
                                <?php
                                }

                                if (in_array(9, $arr_aksi)) {
                                ?>
                                    <li class="<?php if ($mod == "rujukan") echo "active"; ?>"><a href="<?php if ($detail->status_transaksi == 0) echo  base_url() . "nota_tagihan.php/layanan/rujukan_internal?idx=" . $idx;
                                                                                                        else echo "#";
                                                                                                        ?>">Rujukan Internal </a></li>
                                <?php
                                }
                                if (in_array(10, $arr_aksi)) {
                                ?>
                                    <li class="<?php if ($mod == "operasi") echo "active"; ?>"><a href="<?php if ($detail->status_transaksi == 0) echo  base_url() . "nota_tagihan.php/layanan/operasi?idx=" . $idx ;
                                                                                                        else echo "#";
                                                                                                        ?>">Operasi</a></li>
                                    <?php
                                }

                                if (in_array(11, $arr_aksi)) {
                                    if ($detail->jns_layanan == 'RJ' || $detail->jns_layanan == "GD") :
                                    ?>
                                        <li class="<?php if ($mod == "diagnosa") echo "active"; ?>"><a href="<?php echo base_url() . "nota_tagihan.php/layanan/diagnosa?idx=" . $idx;
                                                                                                                ?>">Diagnosa Dan Terapi </a></li>
                                    <?php
                                    endif;
                                }

                                if (in_array(14, $arr_aksi)) {
                                    if ($detail->jns_layanan == 'RI') :
                                    ?>
                                        <li class="<?php if ($mod == "diagnosa-akhir") echo "active"; ?>"><a href="#<?php echo base_url() . "nota_tagihan.php/layanan/diagnosa_akhir?idx=" . $idx ;
                                                                                                                    ?>">Diagnosa Akhir </a></li>
                                    <?php
                                    endif;
                                }

                                if (in_array(12, $arr_aksi)) {
                                    ?>
                                    <li class="<?php if ($mod == "histori") echo "active"; ?>"><a href="<?= base_url() . "nota_tagihan.php/layanan/histori?idx=" . $idx; ?>">Histori Pasien</a></li>
                                    <?php
                                }

                                if (in_array(15, $arr_aksi)) {
                                    if ($detail->jns_layanan == 'RI') :
                                    ?>
                                        <li class="<?php if ($mod == "pindah-ruang") echo "active"; ?>"><a href="<?= base_url() . "nota_tagihan.php/layanan/pindah_ruang?idx=" . $idx ?>">Pasien Pindah Ruang </a></li>
                                    <?php
                                    endif;
                                }

                                if (in_array(16, $arr_aksi)) {

                                    ?>
                                    <li class="<?php if ($mod == "hasil_labor") echo "active"; ?>"><a href="#<?php if ($detail->status_transaksi == 0) echo base_url() . "nota_tagihan.php/layanan/hasil_pemeriksaan?idx=" . $idx; 
                                                                                                                ?>">Hasil Pemeriksaan</a></li>
                                <?php
                                }
                                if (in_array(13, $arr_aksi)) {
                                ?>
                                    <li class="<?php if ($mod == "pasien-pulang") echo "active"; ?>"><a href="<?= base_url() . "nota_tagihan.php/layanan/pasien_pulang?idx=" . $idx . "&kLok=" . $ruangID; ?>">Pasien Keluar </a></li>
                                <?php
                                }
                                ?>
                            </ul>
                            <?php if ($detail->status_transaksi == 0) {
                            ?>
                                <a href="#" onclick="konfirmasi('<?php echo $detail->reg_unit ?>')" class="btn btn-danger btn-block"><span class='fa fa-remove'></span>Selesai Transaksi</a>
                            <?php
                            } else {
                            ?>
                                <button class="btn btn-success btn-block" onclick="unfinsihTransksi('<?php echo $detail->reg_unit ?>')"><i class="fa fa-check"></i> <b>Selesai Transaksi</b></button>
                            <?php
                            }
                            ?>
                            <a href="#" onclick="cetakNota('<?php echo $detail->reg_unit ?>')" class="btn btn-danger btn-block">
                                <i class="fa fa-print"></i> <b>Cetak Nota </b></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Panel Samping Kiri -->

            <!-- Start Panel Tengah -->
            <div class="col-md-9">
                <?php if (!empty($modul)) echo $modul; ?>

            </div>
        </div>

    </section>



    <div class="modal fade" id="modalKonfirmasi" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Form Rujuk Internal</h4>
            </div-->
                <div class="modal-body">
                    <div class="alert alert-warning alert-dismissible" style="font-size: 12pt; text-align: justify">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Penting</h4>
                        Pastikan semua tindakan untuk pasien sudah diinput karena
                        Dengan melakukan finish transaksi akan mengakibatkan system mengunci form untuk input tidakan <b>
                            <ol>
                                <li>Jika semua tindakan sudah diinput dan pasien diberi resep dokter yang harus diambil di apotek klik Ya</li>
                                <li>Jika semua tindakan sudah diinput dan pasien tidak diberikan resep dokter yang harus diambil di apotek Klik Tidak</li>
                                <li>Jika masih ada tindakan yang belum diinput klik Batal</li>
                            </ol>
                        </b>
                    </div>
                    <h2 class="text-center"><b><i>Apakah Pasien Diberikan resep dokter yang harus diambil di apotek?</i></b></h2>
                    <div class="btn-group-wrap">
                        <div class="btn-group" role="group">
                            <button class="btn btn-success" onclick="finsihTransksi('<?php echo $detail->reg_unit ?>', 1)">Ya</button>
                            <button class="btn btn-danger" onclick="finsihTransksi('<?php echo $detail->reg_unit ?>', 0)">Tidak</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type='text/javascript'>
        var base_url = "<?= base_url() . "nota_tagihan.php/"; ?>";
    </script>

    <script src="<?= base_url() . "js/nota_tagihan.js" ?>"></script>
    <script type="text/javascript">
        var a = '<?php echo $detail->id_daftar ?>';
        var b = '<?php echo $detail->reg_unit ?>';
        var c = '<?php echo $detail->nomr ?>';
        var d = '<?php echo $detail->id_ruang ?>';
        var e = '<?php echo $detail->nama_pasien ?>';
        var f = '<?php echo $detail->nama_ruang ?>';
        <?php $indexKelasID = ($detail->id_kelas == '') ? '2' : $detail->id_kelas;  ?>
        var idKelas = '<?php echo $indexKelasID ?>';
        /*Ditambahkan 28 Jan 2020 Oleh Wanhar Azri*/
    </script>

<?php } else { ?>
    <section class="content container-fluid">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Penting</h4>
            Maaf data kunjungan pasien tidak ditemukan
        </div>
    </section>
<?php } ?>