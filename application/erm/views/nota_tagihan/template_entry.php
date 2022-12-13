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
                            <?php if ($detail->jns_kelamin == "1") : ?>
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
                        <hr>
                        <fieldset>
                            <legend>Informasi Pasien</legend>
                            <div style="font-size: 16px;">
                                <div class="row">
                                    <div class="col-xs-4">Nomr</div>
                                    <div class="col-xs-8">: <?php echo $detail->nomr ?></div>
                                </div>

                            </div>
                            <div style="font-size: 16px;">
                                <div class="row">
                                    <div class="col-xs-4">No.Reg RS</div>
                                    <div class="col-xs-8">: <?php echo $detail->id_daftar ?></div>
                                </div>
                            </div>
                            <div style="font-size: 16px;">
                                <div class="row">
                                    <div class="col-xs-4">No.Reg Unit</div>
                                    <div class="col-xs-8">: <?php echo $detail->reg_unit ?></div>
                                </div>
                            </div>
                            <div style="font-size: 16px;">
                                <div class="row">
                                    <div class="col-xs-4">Kelas Layanan</div>
                                    <div class="col-xs-8">: <?php echo ($detail->kelas_layanan == "") ? "Rawat Jalan" : "Kelas " . $detail->kelas_layanan ?></div>
                                </div>
                            </div>
                            <div style="font-size: 16px;">
                                <div class="row">
                                    <div class="col-xs-4">Cara Bayar</div>
                                    <div class="col-xs-8">: <?php echo $detail->cara_bayar ?></div>
                                </div>
                            </div>

                            <div style="font-size: 16px;">
                                <div class="row">
                                    <div class="col-xs-4">Dokter</div>
                                    <div class="col-xs-8">: <?php echo $detail->namaDokterJaga ?></div>
                                </div>
                            </div>
                        </fieldset>

                        <div style="font-size: 16px;margin-top:10px;">
                            <hr>
                            <ul class="nav nav-stacked">
                                <?php if (!empty($hakakses)) $arr_aksi = explode(',', $hakakses);
                                else $arr_aksi = array();
                                if (in_array(7, $arr_aksi)) {
                                ?>
                                    <li class="<?php if ($mod == "tindakan") echo "active"; ?>"><a href="<?php echo base_url() . "nota_tagihan.php/nota_tagihan/entry_nota?idx=" . $idx . "&kLok=" . $ruangID;?>">Tindakan </a></li>
                                <?php
                                }
                                ?>
                                <!-- <li class="<?php if ($mod == "erm") echo "active"; ?>"><a href="<?php echo base_url() . "nota_tagihan.php/erm?idx=" . $idx;?>">E Rekam Medis </a></li> -->
                                <?php
                                if (in_array(8, $arr_aksi)) {
                                ?>
                                    <li class="<?php if ($mod == "penunjang") echo "active"; ?>"><a href="<?php if ($detail->status_transaksi == 0) echo  base_url() . "nota_tagihan.php/nota_tagihan/permintaan_penunjang?idx=" . $idx . "&kLok=" . $ruangID; else echo "#";?>">Permintaan Penunjang </a></li>
                                <?php
                                }

                                if (in_array(9, $arr_aksi)) {
                                ?>
                                    <li class="<?php if ($mod == "rujukan") echo "active"; ?>"><a href="<?php if ($detail->status_transaksi == 0) echo  base_url() . "nota_tagihan.php/nota_tagihan/rujukan_internal?idx=" . $idx . "&kLok=" . $ruangID; else echo "#";?>">Rujukan Internal </a></li>
                                <?php
                                }
                                if (in_array(10, $arr_aksi)) {
                                ?>
                                    <li class="<?php if ($mod == "operasi") echo "active"; ?>"><a href="<?php if ($detail->status_transaksi == 0) echo  base_url() . "nota_tagihan.php/nota_tagihan/operasi?idx=" . $idx . "&kLok=" . $ruangID;else echo "#"; ?>">Operasi </a></li>
                                    <?php
                                }

                                if (in_array(11, $arr_aksi)) {
                                    if ($detail->jns_layanan == 'RJ' || $detail->jns_layanan == "GD") :
                                    ?>
                                        <li class="<?php if ($mod == "diagnosa") echo "active"; ?>"><a href="<?php echo base_url() . "nota_tagihan.php/nota_tagihan/diagnosa?idx=" . $idx . "&kLok=" . $ruangID; ?>">Diagnosa Dan Terapi </a></li>
                                    <?php
                                    endif;
                                }

                                if (in_array(14, $arr_aksi)) {
                                    if ($detail->jns_layanan == 'RI') :
                                    ?>
                                        <li class="<?php if ($mod == "diagnosa-akhir") echo "active"; ?>"><a href="<?php echo base_url() . "nota_tagihan.php/nota_tagihan/diagnosa_akhir?idx=" . $idx . "&kLok=" . $ruangID;?>">Diagnosa Akhir </a></li>
                                    <?php
                                    endif;
                                }
                                ?>
                                <!-- <li class="<?php if ($mod == "informasi-medis") echo "active"; ?>"><a href="<?php echo base_url() . "nota_tagihan.php/nota_tagihan/informasimedis?idx=" . $idx . "&kLok=" . $ruangID;?>">Informasi Medis </a></li> -->
                                <?php
                                if (in_array(12, $arr_aksi)) {
                                    ?>
                                    <li class="<?php if ($mod == "histori") echo "active"; ?>"><a href="<?= base_url() . "nota_tagihan.php/nota_tagihan/histori?idx=" . $idx . "&kLok=" . $ruangID; ?>">Histori Pasien</a></li>
                                    <?php
                                }

                                if (in_array(15, $arr_aksi)) {
                                    if ($detail->jns_layanan == 'RI') :
                                    ?>
                                        <li class="<?php if ($mod == "pindah-ruang") echo "active"; ?>"><a href="<?= base_url() . "nota_tagihan.php/nota_tagihan/pindah_ruang?idx=" . $idx . "&kLok=" . $ruangID; ?>">Pasien Pindah Ruang </a></li>
                                    <?php
                                    endif;
                                }

                                if (in_array(16, $arr_aksi)) {

                                    ?>
                                    <li class="<?php if ($mod == "hasil_labor") echo "active"; ?>"><a href="<?php if ($detail->status_transaksi == 0) echo base_url() . "nota_tagihan.php/nota_tagihan/hasil_pemeriksaan?idx=" . $idx . "&kLok=" . $ruangID; 
                                    ?>">Hasil Pemeriksaan</a></li>
                                <?php
                                }
                                if (in_array(18, $arr_aksi)) {

                                ?>
                                    <li class="<?php if ($mod == "resep") echo "active"; ?>"><a href="<?= base_url() . "nota_tagihan.php/nota_tagihan/resep?idx=" . $idx ?>">Resep </a></li>
                                <?php
                                }
                                ?>
                                
                                <?php
                                if (in_array(13, $arr_aksi)) {
                                ?>
                                    <li class="<?php if ($mod == "pasien-pulang") echo "active"; ?>"><a href="<?= base_url() . "nota_tagihan.php/nota_tagihan/pasien_pulang?idx=" . $idx . "&kLok=" . $ruangID; ?>">Pasien Keluar </a></li>
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

    <div class="modal fade" id="modalPermintaanPenunjang" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Form Permintaan Penunjang</h4>
                </div>
                <div class="modal-body">
                    <form id="formPemintaanPenunjang" role="form" onsubmit="#">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="pp_id_daftar" id="pp_id_daftar">
                                    <input type="hidden" name="pp_reg_unit" id="pp_reg_unit">
                                    <input type="hidden" name="pp_nomr" id="pp_nomr">
                                    <input type="hidden" name="pp_nama" id="pp_nama">
                                    <input type="hidden" name="pp_ruang_pengirim" id="pp_ruang_pengirim">
                                    <input type="hidden" name="pp_nama_ruang_pengirim" id="pp_nama_ruang_pengirim">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table>
                                                <tr>
                                                    <th class="w120">No.Reg RS </th>
                                                    <th class="rataTengah w10">:</th>
                                                    <th class="w150"><span id="ppv_id_daftar"></span></th>
                                                    <th class="w100">No.Reg Unit </th>
                                                    <th class="rataTengah w10">:</th>
                                                    <th><span id="ppv_reg_unit"></span></th>
                                                </tr>
                                                <tr>
                                                    <th>No.MR</th>
                                                    <th class="rataTengah">:</th>
                                                    <th><span id="ppv_nomr"></span></th>

                                                    <th>Nama Pasien</th>
                                                    <th class="rataTengah">:</th>
                                                    <th><span id="ppv_nama"></span></th>
                                                </tr>
                                                <tr>
                                                    <th>Ruang Pengirim</th>
                                                    <th class="rataTengah">:</th>
                                                    <th colspan="4"><span id="ppv_ruang_pengirim"></span></th>
                                                </tr>
                                            </table>
                                            <hr />
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <legend>Permintaan</legend>
                                                <div class="form-group">
                                                    <label style="width: 100%">Pilih poliRujukan Penunjang</label>
                                                    <select name="id_penunjang" id="id_penunjang" class="form-control" onchange="getJenisPemeriksaan(0);hapusTindakan(0)">
                                                        <?php foreach ($getRuang->result_array() as $xGR) : ?>
                                                            <option value="<?php echo $xGR['idx']; ?>"><?php echo $xGR['ruang']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label style="width: 100%">Dokter Pengirim</label>
                                                    <select name="dokter_pengirim" id="dokter_pengirim" class="form-control" style="width: 100%">
                                                        <?php foreach ($getDokter->result_array() as $xDR) : ?>
                                                            <option value="<?php echo $xDR['NRP']; ?>"><?php echo $xDR['pgwNama']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label style="width: 100%">Diagnosa</label>
                                                    <textarea class="form-control" name="diagnosa" id="diagnosa" maxlength="255" height='50'></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label style="width: 100%">Keterangan</label>
                                                    <textarea class="form-control" name="keterangan" id="keterangan" maxlength="255" height='50'></textarea>
                                                </div>

                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <legend>Pemeriksaan</legend>
                                                <div class="form-group">
                                                    <label for="jenis_pemeriksaan">JENIS PEMERIKSAAN</label>
                                                    <select id='idjenispemeriksaan' class='form-group' name='idjenispemeriksaan' style='width:100%' onchange='getPemeriksaan(0)'></select>
                                                </div>
                                                <div id="subjenispemeriksaan"></div>
                                                <input type="hidden" id="template" name='template' value='0'>
                                                <div class='khusus' id="dahak" style="display:none">
                                                    <div class="form-group">
                                                        <label for="alasanpemeriksaan">Alasaan Pemeriksaan</label><br>
                                                        <input type="radio" value='Diagnosa' name='alasanpemeriksaan' class='alasanpemeriksaan'> Diagnosa
                                                        <input type="radio" value='Follow Up Pengobatan' name='alasanpemeriksaan' class='alasanpemeriksaan'> Follow Up Pengobatan
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bulanke">Bulan Ke</label>
                                                        <input type="text" id='bulanke' name='bulanke' class='form-control'>
                                                    </div>
                                                </div>

                                                <div class='khusus' id="patologi" style="display:none">
                                                    <div class="form-group">
                                                        <label for="bulanke">Asal Jaringan</label>
                                                        <input type="text" id='asal_jaringan' name='asal_jaringan' class='form-control'>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bulanke">Bahan Fiksasi</label>
                                                        <select class='form-control' name='bahan_fiksasi' id='bahan_fiksasi' style='width:100%'>
                                                            <option value="Formalin 10%">Formalin 10%</option>
                                                            <option value="Formalin buffer">Formalin Buffer</option>
                                                            <option value="Alkohol 96%">Alkohol 96%</option>
                                                            <option value="Alkohol 50%">Alkohol 50%</option>
                                                            <option value="Lain-Lain">Lain Lain</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bulanke">Haid Terakhir (Khusus pemeriksaan Kuretese Endometrum)</label>
                                                        <input type="text" id='haid_terakhir' name='haid_terakhir' class='form-control'>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bulanke">Lokasi Jaringan</label>
                                                        <input type="text" id='lokasi_jaringan' name='lokasi_jaringan' class='form-control'>
                                                    </div>
                                                </div>
                                                <div class='allow-scroll'>
                                                    <table class="table table-bordered table-responsive" id='mytable'>
                                                        <thead>
                                                            <tr>
                                                                <th><input type="checkbox" name="pilihan" id="pilihan" value="1" onclick="getPemeriksaan(0)"></th>
                                                                <th>Pemeriksaan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="data-tindakan">

                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                            <tr>
                                                                <td colspan="2" id="pagination-tindakan"></td>
                                                            </tr>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset>
                                                <div id="list-tindakan"></div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="button" id="submit" class="btn btn-primary" onclick="simpanPermintaanPenunjang()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalRujukInternal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Form Rujuk Internal</h4>
                </div>
                <div class="modal-body">

                    <form id="formRujukInternal" role="form" onsubmit="#">
                        <div class="box-body">
                            <div class="col-md-12">
                                <input type="hidden" name="ri_id_daftar" id="ri_id_daftar">
                                <input type="hidden" name="ri_reg_unit" id="ri_reg_unit">
                                <input type="hidden" name="ri_nomr" id="ri_nomr">
                                <input type="hidden" name="ri_nama" id="ri_nama">
                                <input type="hidden" name="ri_ruang_pengirim" id="ri_ruang_pengirim">
                                <input type="hidden" name="ri_nama_ruang_pengirim" id="ri_nama_ruang_pengirim">

                                <table>
                                    <tr>
                                        <th class="w120">No.Reg RS </th>
                                        <th class="rataTengah w10">:</th>
                                        <th class="w150"><span id="riv_id_daftar"></span></th>
                                        <th class="w100">No.Reg Unit </th>
                                        <th class="rataTengah w10">:</th>
                                        <th><span id="riv_reg_unit"></span></th>
                                    </tr>
                                    <tr>
                                        <th>No.MR</th>
                                        <th class="rataTengah">:</th>
                                        <th><span id="riv_nomr"></span></th>

                                        <th>Nama Pasien</th>
                                        <th class="rataTengah">:</th>
                                        <th><span id="riv_nama"></span></th>
                                    </tr>
                                    <tr>
                                        <th>Ruang Pengirim</th>
                                        <th class="rataTengah">:</th>
                                        <th colspan="4"><span id="riv_ruang_pengirim"></span></th>
                                    </tr>
                                </table>

                                <hr />

                                <div class="form-group">
                                    <label style="width: 100%">Pilih Poli Rujukan Internal</label>
                                    <select name="id_ruang_rujukan" id="id_ruang_rujukan" class="form-control" style="width: 350px">
                                        <?php foreach ($getRuangRujukan->result_array() as $xRR) : ?>
                                            <option value="<?php echo $xRR['idx']; ?>"><?php echo $xRR['ruang']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label style="width: 100%">Dokter Pengirim</label>
                                    <select name="ri_dokter_pengirim" id="ri_dokter_pengirim" class="form-control" style="width: 350px">
                                        <?php foreach ($getDokter->result_array() as $xDR) : ?>
                                            <option value="<?php echo $xDR['NRP']; ?>"><?php echo $xDR['pgwNama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label style="width: 100%">Informasi Tambahan</label>
                                    <textarea class="form-control" name="ri_keterangan" id="ri_keterangan" maxlength="255"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="button" id="submit" class="btn btn-primary" onclick="simpanRujukInternal()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

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
    <?php 
    // print_r($antrean);
    if(!empty($antrean)){
        $lastTask=$this->nota_model->lastTask($antrean->id_daftar);
        // echo "last";
        // print_r($lastTask);
        if(empty($lastTask)){
            $showpopup=1;
            ?>
            <div class="modal fade" id="modalWaktulayanan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="alert alert-success alert-dismissible" style="font-size: 12pt; text-align: justify">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-info"></i> Informasi Penting</h4>
                                Sistem ini terintegrasi dengan BPJS Kesehatan, untuk pencatatan waktu layan pasien
                                <b>
                                    <ol>
                                        <li>Jika pasien sudah mulai dilayani klik Ya</li>
                                        <li>Jika pasien belum mulai dilayani Klik Abaikan</li>
                                    </ol>
                                </b>
                            </div>
                            <table class="table">
                                <tr>
                                    <td>Kode booking</td><td>: <?= $antrean->kodebooking ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td><td>: <?= $antrean->tanggal ?></td>
                                </tr>
                                <tr>
                                    <td>NoAntrian</td><td>: <?= $antrean->no_antrian_poly ?></td>
                                </tr>
                                <tr>
                                    <td>Jam Mulai Dilayani</td><td>: <?= date('H:i:s') ?></td>
                                </tr>
                            </table>
                            <form action="#" id="formwaktu" method="POST">
                                    <input type="hidden" name="id_daftar" id="xid_daftar" value="<?= $antrean->id_daftar ?>">
                                    <input type="hidden" name="kodebooking" id="xkodebooking" value="<?= $antrean->kodebooking ?>">
                                    <input type="hidden" name="taskid" id="xtaskid" value="4">
                            </form>
                            <h2 class="text-center"><b><i>Apakah Pasien Sudah hadir dan mulai dilayani ?</i></b></h2>
                            <div class="btn-group-wrap">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-success" onclick="updateWaktuLayan()"><span class="fa fa-check"></span> Ya</button>
                                    <button type="button" class="btn btn-default" onclick="skip()">Abaikan</button>
                                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Abaikan</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }else{
            if($lastTask->taskid <= 3){
                $showpopup=1;
                ?>
                <div class="modal fade" id="modalWaktulayanan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="alert alert-success alert-dismissible" style="font-size: 12pt; text-align: justify">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-info"></i> Informasi Penting</h4>
                                    Sistem ini terintegrasi dengan BPJS Kesehatan, untuk pencatatan waktu layan pasien
                                    <b>
                                        <ol>
                                            <li>Jika pasien sudah mulai dilayani klik Ya</li>
                                            <li>Jika pasien belum mulai dilayani Klik Abaikan</li>
                                        </ol>
                                    </b>
                                </div>
                                <table class="table">
                                    <tr>
                                        <td>Kode booking</td><td>: <?= $antrean->kodebooking ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td><td>: <?= $antrean->tanggal ?></td>
                                    </tr>
                                    <tr>
                                        <td>NoAntrian</td><td>: <?= $antrean->no_antrian_poly ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jam Mulai Dilayani</td><td>: <?= date('H:i:s') ?></td>
                                    </tr>
                                </table>
                                <form action="#" id="formwaktu" method="POST">
                                    <input type="hidden" name="id_daftar" id="xid_daftar" value="<?= $antrean->id_daftar ?>">
                                    <input type="hidden" name="kodebooking" id="xkodebooking" value="<?= $antrean->kodebooking ?>">
                                    <input type="hidden" name="taskid" id="xtaskid" value="4">
                                </form>
                                <h2 class="text-center"><b><i>Apakah Pasien Sudah hadir dan mulai dilayani ?</i></b></h2>
                                <div class="btn-group-wrap">
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-success" onclick="updateWaktuLayan()">Ya</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Abaikan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }else $showpopup=0;
        }
    } ?>
    

    <script src="<?= base_url() . "js/nota_tagihan.js" ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            
            $('#tgl_masuk, #tgl_keluar').on('change textInput input', function() {
                if (($("#tgl_masuk").val() != "") && ($("#tgl_keluar").val() != "")) {
                    var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                    var firstDate = new Date($("#tgl_masuk").val());
                    var secondDate = new Date($("#tgl_keluar").val());
                    var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
                    if (diffDays < 0) {
                        $("#los").val('');
                        $("#tgl_keluar").val('');
                        alert('Tanggal keluar tidak boleh lebih rendah dari tanggal masuk');
                    } else {
                        $("#los").val(diffDays + 1);
                    }
                }
            });

            $('.tanggal').datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
            })
            var reg_unit = '<?php echo $detail->reg_unit ?>';
            getTableNotaItem(reg_unit);

            const formatter = new Intl.NumberFormat('id-ID');
            $('select').not('#id_penunjang').not('#pr_id_ruang').not('#pr_id_kamar').not('#lokasi').not('#jns_obat').not('#satuanAP').not('#cara_pakai').not('#waktu2').not('#waktu3').not('#keterangan').not('#op_idjenistindakan').not('#op_polipengirim').not('#op_kelasid').not('#op_layanan').not('#op_dokterid').not('#id_pemeriksaan').select2({
                placeholder: 'Pilih Option '
            });

            //$('select').not('#pr_id_ruang').not('#pr_id_kelas').not('#pr_id_kamar').select2({placeholder:'-- Pilih --'});

            $('#txtQty').keyup(function() {
                var a = $(this).val();
                var b = $('#txtTarif').val();
                calcTarif();
            });
            $('input').focus(function() {
                return this.select();
            });
            $('#closeDivCariTarif').click(function() {
                $('#divCariTarif').hide();
                $('#divDetailNota').show();
            });
            $('#txtTindakan').keypress(function(ev) {
                var a = $(this).val();
                var b = $('#cmbKelasTarif').val();
                var keycode = (ev.keyCode ? ev.keyCode : ev.which);

                if (keycode == '13') {


                    getData(0);
                }
            });
            $('#cmbKelasTarif').change(function(ev) {

                getData(0);
            });
            $('#txtQty').keypress(function(ev) {
                var keycode = (ev.keyCode ? ev.keyCode : ev.which);
                if (keycode == '13') {
                    simpanTindakan();
                }
            });
        });
        function skip(){
            window.location.href=base_url+"nota_tagihan";
        }
        function getData(start) {
            var a = $('#txtTindakan').val();
            var b = $('#cmbKelasTarif').val();
            var c = $('#jns_layanan').val();
            var d = $('#id_ruang').val();
            if ($('#alltarif').is(':checked')) var e = 1;
            else var e = 0;
            var url = "<?php echo base_url() . 'nota_tagihan.php/nota_tagihan/getTarif/'; ?>" + start + "?sLike=" + a + "&kelas_id=" + b + "&jns_layanan=" + c + "&id_ruang=" + d + "&all=" + e;
            console.clear();
            console.log(url);
            //alert(url)
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: {
                    get_param: 'value'
                },
                beforeSend: function() {
                    $('#divDetailNota').hide();
                    $('tbody#getTarif').html("<tr><td colspan=10>Loading... Please wait</td></tr>");
                    console.log("menjalankan FUnction getData....");
                },
                success: function(data) {
                    //$('tbody#getTarif').html(data);
                    if (data["status"] == true) {
                        var res = data["data"];
                        var jmlData = res.length;
                        var limit = data["limit"]
                        var tabel = "";
                        var start = data["start"];
                        //Create Tabel
                        for (var i = 0; i < jmlData; i++) {
                            start++;
                            tabel += "<tr>";
                            tabel += "<td>" + start + "</td>";
                            tabel += "<td>" + res[i]["layanan"] + "</td>";
                            tabel += "<td class='text-right'>Rp. " + res[i]["tarif_layanan"] + "</td>";
                            tabel += "<td>" + res[i]["kategori_tarif"] + "</td>";
                            tabel += "<td>" + res[i]["kelas_layanan"] + "</td>";
                            tabel += '<td class=\'text-right\'>';
                            tabel += '<button type=\'button\' class=\'btn btn-danger \' onclick=\'pilihTarif("' + res[i]["idx"] + '", "' + res[i]["layanan"] + '","' + res[i]["jasa_sarana"] + '","' + res[i]["jasa_pelayanan"] + '","' + res[i]["tarif_layanan"] + '","' + res[i]["kategori_id"] + '","' + res[i]["kelas_id"] + '")\'><span class=\'fa fa-check\' ></span> Pilih</button>';
                            tabel += '</td>';
                            tabel += "</tr>";
                        }
                        $('#getTarif').html(tabel);
                        //Create Pagination
                        if (data["row_count"] <= limit) {
                            $('#v-pagination').hide();
                            $('#pagination').html("");
                        } else {
                            $('#v-pagination').show();
                            var pagination = "";
                            var btnIdx = "";
                            jmlPage = Math.ceil(data["row_count"] / limit);
                            offset = data["start"] % limit;
                            curIdx = Math.ceil((data["start"] / data["limit"]) + 1);
                            prev = (curIdx - 2) * data["limit"];
                            next = (curIdx) * data["limit"];

                            var curSt = (curIdx * data["limit"]) - data["limit"];
                            var st = start;
                            var btn = "btn-default";
                            var lastSt = (jmlPage * data["limit"]) - data["limit"]
                            var btnFirst = "<button class='btn btn-default btn-sm' onclick='getData(0)'><span class='fa fa-angle-double-left'></span></button>";
                            if (curIdx > 1) {
                                var prevSt = ((curIdx - 1) * data["limit"]) - data["limit"];
                                btnFirst += "<button class='btn btn-default btn-sm' onclick='getData(" + prevSt + ")'><span class='fa fa-angle-left'></span></button>";
                            }

                            var btnLast = "";
                            if (curIdx < jmlPage) {
                                var nextSt = ((curIdx + 1) * data["limit"]) - data["limit"];
                                btnLast += "<button class='btn btn-default btn-sm' onclick='getData(" + nextSt + ")'><span class='fa fa-angle-right'></span></button>";
                            }
                            btnLast += "<button class='btn btn-default btn-sm' onclick='getData(" + lastSt + ")'><span class='fa fa-angle-double-right'></span></button>";

                            if (jmlPage >= 25) {
                                if (curIdx >= 20) {
                                    var idx_start = curIdx - 20;
                                    var idx_end = idx_start + 25;
                                    if (idx_end >= jmlPage) idx_end = jmlPage;
                                } else {
                                    var idx_start = 1;
                                    var idx_end = 25;
                                }
                                for (var j = idx_start; j <= idx_end; j++) {
                                    st = (j * data["limit"]) - data["limit"];
                                    if (curSt == st) btn = "btn-success";
                                    else btn = "btn-default";
                                    btnIdx += "<button class='btn " + btn + " btn-sm' onclick='getData(" + st + ")'>" + j + "</button>";
                                }
                            } else {
                                for (var j = 1; j <= jmlPage; j++) {
                                    st = (j * data["limit"]) - data["limit"];
                                    if (curSt == st) btn = "btn-success";
                                    else btn = "btn-default";
                                    btnIdx += "<button class='btn " + btn + " btn-sm' onclick='getData(" + st + ")'>" + j + "</button>";
                                }
                            }
                            console.log(curSt);
                            pagination += btnFirst + btnIdx + btnLast;
                            $('#pagination').html('<div class="btn-group">' +
                                pagination + '</div>');
                        }
                    }
                    $('#divCariTarif').show();

                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    $('#divDetailNota').show();
                    console.log(jqXHR.responseText);
                }
            });
        }
        const formatter = new Intl.NumberFormat('id-ID');

        function calcTarif() {
            var a = $('#txtTarif').val().replace('.', '').replace('.', '').replace('.', '');
            var b = $('#txtQty').val();
            a = (a == '' || isNaN(a)) ? 0 : a;
            b = (b == '' || isNaN(b)) ? 0 : b;
            var c = parseFloat(a) * parseFloat(b);
            $('#txtSubTotal').val(formatter.format(c));
        }

        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return true;
        }

        function getTableTarif() {
            var a = $('#txtTindakan').val();
            var b = $('#cmbKelasTarif').val();
            var jl = $('#jns_layanan').val();
            var r = $('#id_ruang').val();
            $.ajax({
                url: "<?php echo base_url() . 'nota_tagihan.php/nota_tagihan/getTarif' ?>",
                type: "POST",
                data: {
                    sLike: a,
                    kelas_id: b,
                    jns_layanan: jl,
                    id_ruang: r
                },
                beforeSend: function() {
                    $('tbody#getTarif').html("<tr><td colspan=10>Loading... Please wait</td></tr>");
                    console.log("getTableTarif");
                },
                success: function(data) {
                    $('tbody#getTarif').html(data);

                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        }

        function getTableNotaItem(a) {
            $.ajax({
                url: "<?php echo base_url() . 'nota_tagihan.php/nota_tagihan/getNotaItem' ?>",
                type: "POST",
                data: {
                    reg_unit: a
                },
                beforeSend: function() {
                    $('tbody#getNotaItem').html("<tr><td colspan=10>Loading... Please wait</td></tr>");
                },
                success: function(data) {
                    $('tbody#getNotaItem').html(data);
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        }

        function pilihTarif(a, b, c, d, e, f, g) {
            <?php $indexKelasID = ($detail->id_kelas == '') ? '2' : $detail->id_kelas;  ?>
            var idKelas = '<?php echo $indexKelasID ?>';
            var cekKelas = false;
            //alert(g);
            if (idKelas == g || g == "0") {
                cekKelas = true;
            } else {
                //alert(g +"!="+idKelas);
                var x = confirm("Kelas tarif tidak sama dengan Kelas Layanan yang digunakan Pasien !\nApakah anda tetap lanjutkan proses ini?");
                if (x) {
                    cekKelas = true;
                }

            }
            if (cekKelas) {
                $('#id_tarif').val(a);
                $('#txtTindakan').val(b);
                $('#jasa_sarana').val(c);
                $('#jasa_pelayanan').val(d);
                $('#txtTarif').val(formatter.format(e));
                $('#kategori_id').val(f);
                $('#kelas_id').val(g);
                $('#divCariTarif').hide();
                $('#txtQty').focus();
            }
            $('#divDetailNota').show();
        }

        function simpanTindakan() {
            var b = $('#id_daftar').val();
            var c = $('#reg_unit').val();
            var d = $('#nomr').val();
            var e = $('#id_tarif').val();
            var f = $('#txtTindakan').val();
            var g = $('#jasa_sarana').val();
            var h = $('#jasa_pelayanan').val();
            var i = $('#txtTarif').val().replace('.', '').replace('.', '').replace('.', '');
            var j = $('#txtQty').val();
            var k = $('#kategori_id').val();
            var l = $('#kelas_id').val();
            var n = $('#txtSubTotal').val().replace('.', '').replace('.', '');
            var o = $('#cmbDokter').val();
            if (b == "") {
                alert('Ops. No.Reg RS kosong. Pastikan No.Reg RS anda tampil. atau refresh kembali browser anda');
            } else if (c == "") {
                alert('Ops. No.Reg Unit kosong. Pastikan No.Reg Unit anda tampil. atau refresh kembali browser anda');
            } else if (d == "") {
                alert('Ops. No.MR kosong. Pastikan No.MR anda tampil. atau refresh kembali browser anda');
            } else if (e == "") {
                alert('Ops. Kode tarif kosong. Coba ulangi entri tindakan atau refresh kembali browser anda');
            } else if (f == "") {
                alert('Ops. Tindak atau layanan kosong. Coba ulangi entri tindakan atau refresh kembali browser anda');
            } else if (i == "" || b == "0" || isNaN(i)) {
                alert('Ops. Pastikan tarif terisi dengan benar.');
            } else if (j == "" || j == "0" || isNaN(j)) {
                alert('Ops. Pastikan jumlah tindakan terisi dengan benar.');
                $('#txtQty').focus();
            } else if (k == "") {
                alert('Ops. Group tarif BPJS kosong. Pastikan Group tarif BPJS terisi dengan baik pada master tarif.');
            } else if (l == "") {
                alert('Ops. Kelas layanan kosong. Pastikan Kelas layanan terisi dengan baik pada master tarif.');
            } else {

                var postData = {}
                postData["id_daftar"] = b;
                postData["reg_unit"] = c;
                postData["nomr"] = d;
                postData["id_tarif"] = e;
                postData["layanan"] = f;
                postData["jasa_sarana"] = g;
                postData["jasa_pelayanan"] = h;
                postData["tarif_layanan"] = i;
                postData["jml"] = j;
                postData["kategori_id"] = k;
                postData["kelas_id"] = l;
                postData["sub_total_tarif"] = n;
                postData["id_dokter"] = o;

                $.ajax({
                    url: "<?php echo base_url() . 'nota_tagihan.php/nota_tagihan/simpanItem' ?>",
                    type: "POST",
                    data: $.param(postData),
                    dataType: "JSON",
                    success: function(data) {
                        if (data.code == 200) {
                            getTableNotaItem(c);
                            $('#id_tarif').val('');
                            $('#txtTindakan').val('');
                            $('#jasa_sarana').val('0');
                            $('#jasa_pelayanan').val('0');
                            $('#txtTarif').val('0');
                            $('#txtQty').val('0');
                            $('#txtSubTotal').val('0');
                            $('#kategori_id').val('');
                            $('#kelas_id').val('');
                            //$('#cmbDokter').val('').trigger('change');
                            $('#txtTindakan').focus();
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(jqXHR.responseText);
                    }
                });
            }
        }

        function simpanDiagnosa() {
            var url;
            url = "<?= base_url(); ?>" + "nota_tagihan.php/nota_tagihan/simpan_diagnosa";
            var formData = new FormData($('#diagnosa')[0]);
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'JSON',
                beforeSend: function() {
                    // Handle the beforeSend event
                    $('#loading').show();
                },
                success: function(data) {
                    $('#loading').hide();
                    if (data["status"] == true) {
                        alert(data["message"]);
                        location.reload();
                    } else {
                        alert(data["message"]);
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#loading').hide();
                    alert("gagal Menyimpan Data");
                }
            });
        }

        function kembali(a) {
            var url = '<?php echo base_url() . 'nota_tagihan.php/nota_tagihan/tambah?kLok=' ?>' + a;
            window.location.href = url;
        }

        function cetakNota(a) {
            var url = '<?php echo base_url() . 'nota_tagihan.php/nota_tagihan/cetak?kode=' ?>' + a;
            window.open(url);
        }

        function hapusItem(a, b) {
            var pulang = $('#pulang').val();
            //alert(pulang);
            if (pulang <= 0) {
                var x = confirm("Apakah anda yakin akan menghapus item ini?");
                if (x) {
                    $.ajax({
                        url: "<?php echo base_url() . 'nota_tagihan.php/nota_tagihan/hapusItem' ?>",
                        type: "POST",
                        data: {
                            idx: a
                        },
                        dataType: "JSON",
                        success: function(data) {

                            if (data.code == 200) {
                                getTableNotaItem(b);
                            } else {
                                alert(data.message);
                            }
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(jqXHR.responseText);
                        }

                    });
                }
            } else {
                alert("Maaf Pasien yang sudah dipulangkan, dan transaksi sudah tidak bisa dihapus");
            }

        }

        function permintaanPenunjang() {
            var a = '<?php echo $detail->id_daftar ?>';
            var b = '<?php echo $detail->reg_unit ?>';
            var c = '<?php echo $detail->nomr ?>';
            var d = '<?php echo $detail->id_ruang ?>';
            var e = '<?php echo $detail->nama_pasien ?>';
            var f = '<?php echo $detail->nama_ruang ?>';

            $('#pp_id_daftar').val(a);
            $('#ppv_id_daftar').html(a);

            $('#pp_reg_unit').val(b);
            $('#ppv_reg_unit').html(b);

            $('#pp_nomr').val(c);
            $('#ppv_nomr').html(c);

            $('#pp_nama').val(e);
            $('#ppv_nama').html(e);

            $('#pp_ruang_pengirim').val(d);
            $('#pp_nama_ruang_pengirim').val(f);

            $('#ppv_ruang_pengirim').html(f);

            $('#id_penunjang').prop('selectedIndex', 0);
            $('#dokter_pengirim').prop('selectedIndex', 0);

            $('#keterangan').val('');
            $('#modalPermintaanPenunjang').modal('show');
            hapusTindakan(0);

            getTindakan(0);
            listTindakan(0);
            getJenisPemeriksaan();
        }



        function rujukInternal() {
            var a = '<?php echo $detail->id_daftar ?>';
            var b = '<?php echo $detail->reg_unit ?>';
            var c = '<?php echo $detail->nomr ?>';
            var d = '<?php echo $detail->id_ruang ?>';
            var e = '<?php echo $detail->nama_pasien ?>';
            var f = '<?php echo $detail->nama_ruang ?>';

            $('#ri_id_daftar').val(a);
            $('#riv_id_daftar').html(a);

            $('#ri_reg_unit').val(b);
            $('#riv_reg_unit').html(b);

            $('#ri_nomr').val(c);
            $('#riv_nomr').html(c);

            $('#ri_nama').val(e);
            $('#riv_nama').html(e);

            $('#ri_ruang_pengirim').val(d);
            $('#ri_nama_ruang_pengirim').val(f);
            $('#riv_ruang_pengirim').html(f);

            $('#id_ruang_rujukan').prop('selectedIndex', 0);
            $('#ri_dokter_pengirim').prop('selectedIndex', 0);

            $('#ri_keterangan').val('');
            $('#modalRujukInternal').modal('show');
        }

        function simpanRujukInternal() {
            var formdata = {}
            formdata['id_daftar'] = $('#ri_id_daftar').val();
            formdata['reg_unit'] = $('#ri_reg_unit').val();
            formdata['nomr'] = $('#ri_nomr').val();
            formdata['nama_pasien'] = $('#ri_nama').val();
            formdata['ruang_pengirim'] = $('#ri_ruang_pengirim').val();
            formdata['nama_ruang_pengirim'] = $('#ri_nama_ruang_pengirim').val();
            formdata['id_poli'] = $('#id_ruang_rujukan').val();
            formdata['nama_poli'] = $('#id_ruang_rujukan :selected').html();
            formdata['dokter_pengirim'] = $('#ri_dokter_pengirim').val();
            formdata['nama_dokter_pengirim'] = $('#ri_dokter_pengirim :selected').html();
            formdata['keterangan'] = $('#ri_keterangan').val();
            $.ajax({
                url: "<?php echo base_url() . 'nota_tagihan.php/nota_tagihan/simpanRujukInternal' ?>",
                type: "POST",
                data: formdata,
                dataType: "JSON",
                success: function(data) {
                    alert(data.message);
                    if (data.code == 200) {
                        $('#modalRujukInternal').modal('hide');
                    }
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        }

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