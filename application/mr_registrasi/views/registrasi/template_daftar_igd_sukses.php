<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.css">
<script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery/css/jquery-ui.css">
<style>
    @media only screen and (max-width: 1360px) {
        .modal-content {
            overflow-y: scroll;
            overflow-x: hidden;
            height: 600px;
            white-space: nowrap
        }
    }

    .modal-content {

        overflow-y: scroll;
        overflow-x: hidden;
        max-height: 800px;
        white-space: nowrap
    }

    .modal-lg {
        min-width: 1200px;
    }

    .control[readonly] {
        background: #3c8dbc;
    }

    .ui-autocomplete-loading {
        background: white url("<?php echo base_url() ?>ui-anim_basic_16x16.gif") right center no-repeat;
    }

    .ui-autocomplete-input {
        border: none;
        font-size: 14px;
        border: 1px solid #DDD !important;
        /*z-index: 1511;*/
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
        width: 160px;
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
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Penting</h4>
        Registrasi yang telah dibatalkan tidak bisa dikembalikan.
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="box box-widget widget-user-2">
                <div class="widget-user-header bg-aqua-active">
                    <div class="widget-user-image">
                        <?php if ($jns_kelamin == "L") : ?>
                            <img class="img-circle" src="<?php echo base_url() . 'assets/images/male.png' ?>" alt="" id="imgMale">
                        <?php else : ?>
                            <img class="img-circle" src="<?php echo base_url() . 'assets/images/female.png' ?>" alt="" id="imgFemale">
                        <?php endif; ?>
                    </div>
                    <h4 class="widget-user-username"><?php echo $nama_pasien ?></h4>

                </div>
                <div class="box-body">
                    <div style="font-size: 23px;text-align: center;">
                        <span>No.MR : <?php echo $nomr ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-body no-padding">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Info Layanan</a></li>
                        <li><a data-toggle="tab" href="#menu1">Buat Rujukan Online</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 150px">No Registrasi RS</th>
                                    <th style="font-size: 20px">
                                        <div class="col-md-10" >
                                            <div id="sepiddaftar"><?php echo $id_daftar ?></div>
                                            
                                        </div>
                                        <div class="col-md-2 text-right">
                                            <a href="#" onclick="editKunjungan(<?= $idx ?>)"><span class="fa fa-pencil"></span></a>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Jenis Layanan</th>
                                    <th style="font-size: 20px"><?php echo $jns_layanan ?></th>
                                </tr>
                                <tr>
                                    <th>No Registrasi Unit</th>
                                    <th style="font-size: 20px"><?php echo $reg_unit ?></th>
                                </tr>
                                <tr>
                                    <th>Tempat/Tgl.Lahir</th>
                                    <th><?php echo $tempat_lahir . ', ' . date('d-m-Y', strtotime($tgl_lahir)) ?></th>
                                </tr>

                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <th><?php echo ($jns_kelamin == "1") ? "Laki-Laki" : "Perempuan" ?></th>
                                </tr>
                                <tr>
                                    <th>Tujuan Layanan</th>
                                    <th id="tujuan"><?php echo $nama_ruang ?></th>
                                </tr>
                                <tr>
                                    <th>Jaminan Layanan</th>
                                    <th><?php echo $cara_bayar ?></th>
                                </tr>
                                <tr>
                                    <th>No Jaminan Layanan</th>
                                    <th>
                                        <input type="hidden" name="reg_unit" id="reg_unit" value="<?= $reg_unit ?>">
                                        <input type="hidden" name="noantrian" id="noantrian" value="0">
                                        <input type="hidden" name="dokterJaga" id="dokterJaga" value="<?= $kodeDokter ?>">
                                        <input type="hidden" name="namaDokterJaga" id="namaDokterJaga" value="<?= $namaDokter ?>">
                                        <?php
                                        if (empty($no_jaminan)) {
                                        ?>
                                            <div class="input-group input-group-sm">
                                                <input type="text" id="no_jaminan" name="no_jaminan" class="form-control" placeholder="No Jaminan">

                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger btn-block" type="button" onclick="formSEPIGD('<?= $no_bpjs ?>','<?= date('Y-m-d'); ?>')"><i class="fa fa-plus"></i> Create SEP</button>
                                                    <!-- <button class="btn btn-danger btn-block" type="button" onclick="formSEP()"><i class="fa fa-plus"></i> Create SEP</button> -->
                                                </div>
                                            </div>
                                        <?php
                                        } else{
                                            ?>
                                            <button class="btn btn-default btn-sm" type='button' onclick='editSep("<?= $no_jaminan ?>")'><?= $no_jaminan ?></button>
                                            <?php
                                        }
                                            // echo $no_jaminan
                                        ?>
                                        
                                    </th>
                                </tr>

                            </table>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <?php 
                            if(empty($rujukanonline)){
                                ?>
                                <br>
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="#">
                                        <input type="hidden" name="id_daftar" id="id_daftar" value="<?= $id_daftar ?>">
                                        <input type="hidden" name="reg_unit" id="reg_unit" value="<?= $reg_unit ?>">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">No SEP:</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="r-noSep" name="r-noSep" placeholder="No SEP" value="<?= $no_jaminan ?>" <?php if(!empty($no_jaminan)) echo "readonly" ?>>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Tgl Rujukan:</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control datepicker" id="r-tglRujukan" name="r-tglRujukan" value="<?= date('Y-m-d') ?>" placeholder="Masukkan Tgl Rujukan">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Tgl Rencana Kunjungan:</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control datepicker" id="r-tglRencanaKunjungan" name="r-tglRencanaKunjungan" placeholder="Masukkan Tgl Rencana Kunjungan">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Tipe Rujukan:</label>
                                            <div class="col-sm-10">
                                                <select name="r-tipeRujukan" id="r-tipeRujukan" class="form-control" onchange="pilihTipeRujukan()">
                                                    <option value="0">Penuh</option>
                                                    <option value="1">Partial</option>
                                                    <option value="2">Balik (PRB)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Faskes:</label>
                                            <div class="col-sm-10">
                                                <select name="r-faskes" id="r-faskes" class="form-control" >
                                                    <option value="1">Faskes Tingkat 1</option>
                                                    <option value="2" selected>Faskes Tingkat 2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">PPK Dirujuk:</label>
                                            
                                            <input type="hidden" id="ppkDirujuk" name="ppkDirujuk"><div class="col-sm-10">
                                            <input type="text" class="form-control" id="r-ppkDirujuk" name="r-ppkDirujuk" placeholder="Masukkan PPK Dirujuk">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Jns Pelayanan:</label>
                                            <div class="col-sm-10">
                                            <input type="radio" name="jnsPelayanan" id="rj" value="2">R. Jalan
                                            <input type="radio" name="jnsPelayanan" id="gd" value="1">R. Inap
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Catatan:</label>
                                            <div class="col-sm-10">
                                            <textarea name="r-catatan" id="r-catatan" cols="30" rows="5" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Diagnosa Rujukan:</label>
                                            <div class="col-sm-10">
                                            <input type="hidden" class="form-control" id="diagRujukan" name="diagRujukan">
                                            <input type="text" class="form-control" id="r-diagRujukan" name="r-diagRujukan" placeholder="Masukkan Diagnosa">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group inputPoli">
                                            <label class="control-label col-sm-2" for="pwd">Poli Rujukan:</label>
                                            <div class="col-sm-10">
                                            <select name="r-poliRujukan" id="r-poliRujukan" class="form-control">
                                                <option value="">Pilih Poli</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                            <button type="button" class="btn btn-primary" onclick="createRujukan()">Buat Rujukan</button>
                                            </div>
                                        </div>
                                    </form> 
                                </div>
                                
                                <?php
                            }else{
                                ?>
                                <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 150px">No Registrasi RS</th>
                                            <th style="font-size: 20px"><?php echo $id_daftar ?></th>
                                        </tr>
                                        
                                        <tr>
                                            <th>No Registrasi Unit</th>
                                            <th style="font-size: 20px"><?php echo $reg_unit ?></th>
                                        </tr>
                                        <tr>
                                            <th>No Rujukan</th>
                                            <th style="font-size: 20px"><?php echo $rujukanonline->noRujukan ?></th>
                                        </tr>
                                        <tr>
                                            <th>RS Tujuan</th>
                                            <th><?php echo $rujukanonline->namatujuanRujukan ?></th>
                                        </tr>

                                        <tr>
                                            <th>Poliklinik Tujuan</th>
                                            <th><?= $rujukanonline->namapoliTujuan ?></th>
                                        </tr>
                                        <tr>
                                            <th>Diagnosa</th>
                                            <th><?php echo $rujukanonline->diagnosanama ?></th>
                                        </tr>
                                        <tr>
                                            <th>Jenis Layanan</th>
                                            <th><?php if($rujukanonline->jnsPelayanan==2) echo "R. Jalan"; else echo "R.Inap"; ?></th>
                                        </tr>
                                        </tr>
                                    </table>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-3">
            <div class="box box-success">
                <form role="form" method="post" action="#" onSubmit="return false">
                    <div class="box-body">
                        <a href="#" onClick="form_batal()" class="btn btn-danger btn-block">
                            <i class="fa fa-print"></i> <b>Registrasi Batal</b></a>
                        <?php
                        if ($jkn == 1) {
                            if (!empty($no_jaminan)) {
                        ?>      <button class="btn btn-danger btn-block" type="button" onclick="batalkanSep('<?= $no_jaminan ?>')"><i class="fa fa-remove"></i> Batalkan SEP</button>
                        <?php
                            }
                        }
                        ?>
                        <a href="#" onClick="print_kartu_berobat()" class="btn btn-success btn-block">
                            <i class="fa fa-print"></i> <b>Cetak Kartu Berobat</b></a>
                        <a href="#" onClick="print_reg_IGD()" class="btn btn-success btn-block">
                            <i class="fa fa-print"></i> <b>Cetak Registrasi IGD</b></a>
                        <a href="#" onClick="print_surat_reg_IGD()" class="btn btn-success btn-block">
                            <i class="fa fa-print"></i> <b>Surat Registrasi IGD</b></a>
                        <a href="#" onClick="print_surat_masuk_IGD()" class="btn btn-success btn-block">
                            <i class="fa fa-print"></i> <b>Surat Masuk IGD</b></a>
                        <?php
                        if ($jkn == 1) {
                            if (!empty($no_jaminan)) {
                            ?>
                                <!-- <a href="<?php //echo base_url() . "mr_registrasi.php/registrasi/sep/" . $no_jaminan ."/".$tgl_jaminan ?>" target="_blank" class="btn btn-warning btn-block">
                                    <i class="fa fa-print"></i> <b>Cetak SEP</b></a> -->
                                <button class="btn btn-warning btn-block" type="button" onclick="cetaksep('<?= $no_jaminan ?>','<?= $tgl_jaminan ?>','<?= $reg_unit ?>')"><i class="fa fa-print"></i> <b> Cetak SEP</button>
                                
                                
                            <?php
                            }
                        }
                        ?>
                        <?php
                        if ($jkn == 1) {
                            if (!empty($rujukanonline)) {
                        ?>
                                <a href="<?= base_url() . "mr_registrasi.php/registrasi/rujukan/" . $rujukanonline->noRujukan ?>" target="_blank" class="btn btn-default btn-block">
                                    <i class="fa fa-print"></i> <b>Cetak Rujukan</b></a>
                                <!-- <button class="btn btn-danger btn-block" type="button" onclick="batalkanSep('<?= $no_jaminan ?>')"><i class="fa fa-remove"></i> Batalkan SEP</button> -->
                        <?php
                            }
                        }
                        ?>
                        <a href="#" onClick="print_stiker()" class="btn btn-info btn-block">
                            <i class="fa fa-print"></i> <b>Cetak Stiker</b></a>
                        <a href="#" onClick="new_reg_igd()" class="btn btn-primary btn-block">
                            <i class="fa fa-edit"></i> <b>Registrasi IGD Baru</b></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="formModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Form Batal</h4>
            </div>
            <div class="modal-body">

                <form id="form1" role="form" onsubmit="return false">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>No Registrasi RS</label>
                                <input readonly type="text" class="form-control" name="id_daftar" id="b_id_daftar" value="<?php echo $id_daftar ?>">
                            </div>
                            <div class="form-group">
                                <label>No Registrasi Unit</label>
                                <input readonly type="text" class="form-control" name="reg_unit" id="reg_unit" value="<?php echo $reg_unit ?>">
                            </div>
                            <div class="form-group">
                                <label>Alasan</label>
                                <textarea class="form-control" name="alasan" id="alasan" rows="3" maxlength="255"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" id="submit" class="btn btn-danger" onclick="simpan_batal_daftar()">Proses Pembatalan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mpop_sep" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg" style="overflow-y: initial !important;  max-height:85%">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="headSep">SEP Gawat Darurat</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="theform" style="font-size:12px">
                    <div class="row">
                        <div class="col-md-3 col-xs-12">
                            <div class="box box-widget widget-user-2">
                                <div class="bg-aqua-active" style="padding:10px;border-radius:15px 15px 15px">
                                    <h4 id="lblnama"></h4>
                                    <p id="lblnoka"></p>

                                </div>

                                <div class="box-body">
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a title="Profile Peserta" href="#tab_1" data-toggle="tab"><span class="fa fa-user"></span></a></li>
                                            <li><a href="#tab_2" title="COB" data-toggle="tab"><span class="fa fa-building"></span></a></li>
                                            <li><a href="#tab_3" title="Riwayat" data-toggle="tab" onclick='riwayatKunjunganPeserta()'><span class="fa fa-list"></span></a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1">
                                                <ul class="list-group list-group-unbordered">
                                                    <li class="list-group-item">
                                                        <span class="fa fa-sort-numeric-asc"></span> <a title="NIK" class="pull-right-container" id="lblnik">1304121209680001</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="fa fa-credit-card"></span> <a title="No.Kartu Bapel JKK" class="pull-right-container" id="lblnokartubapel"></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="fa fa-calendar"></span> <a title="Tanggal Lahir" class="pull-right-container" id="lbltgllahir">1968-09-12</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="fa fa-user"></span> <a title="PISA" class="pull-right-container" id="lblpisa">Peserta</a>
                                                    </li>

                                                    <li class="list-group-item">
                                                        <span class="fa fa-hospital-o"></span> <a title="Hak Kelas Rawat" class="pull-right-container" id="lblhakkelas">Kelas 3</a>

                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="fa fa-stethoscope"></span> <a title="Faskes Tingkat 1" class="pull-right-container" id="lblfktp">03130402 - SITUJUH</a>

                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="fa fa-calendar"></span> <a title="TMT dan TAT Peserta" class="pull-right-container" id="lbltmt_tat">2016-09-16 s.d 2050-01-01</a>

                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="fa fa-calendar"></span> <a title="Jenis Peserta" class="pull-right-container" id="lblpeserta">PEKERJA MANDIRI</a>

                                                    </li>

                                                </ul>
                                            </div>
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="tab_2">
                                                <ul class="list-group list-group-unbordered">
                                                    <li class="list-group-item">
                                                        <span class="fa fa-sort-numeric-asc"></span> <a title="No. Asuransi" class="pull-right-container" id="lblnoasu"></a>

                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="fa fa-windows"></span> <a title="Nama Asuransi" class="pull-right-container" id="lblnmasu"></a>

                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="fa fa-calendar"></span> <a title="TMT dan TAT Asuransi" class="pull-right-container" id="lbltmt_tatasu"> s.d </a>

                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="fa fa-bank"></span> <a title="Nama Badan Usaha" class="pull-right-container" id="lblnamabu">PEKERJA MANDIRI KAB. LIMA PULUH KOTO</a>

                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" id="tab_3">
                                                <ul class="list-group list-group-unbordered" id="riwayatkunjungan">
                                                    <li class="list-group-item">
                                                    </li>
                                                </ul>
                                                <div id="divriwayatKK">
                                                    <button type="button" id="btnRiwayat" class="btn btn-default btn-xs btn-block" onclick="riwayatLain()"><span class="fa fa-th-list"></span> Riwayat Lain</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.tab-content -->
                                    </div>
                                    <div id="divriwayatKK" style="display: none;">
                                        <button type="button" id="btnRiwayatKK" class="btn btn-danger btn-block"><span class="fa fa-th-list"></span> Pasien Memiliki Riwayat KLL/KK/PAK <br><i>(klik lihat data)</i></button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-9 col-xs-12">
                            <input type="hidden" name="idx" id="idx" value="<?= $idx ?>">
                            <input type="hidden" name="noKartu" id="noKartu" value="">
                            <input type="hidden" name="ppkPelayanan" id="ppkPelayanan" value="<?= KODERS_VC ?>">
                            <input type="hidden" name="jnsPelayanan" id="jnsPelayanan" value="2">
                            <input type="hidden" name="klsRawat" id="klsRawat" value="">
                            <!-- Tidak Diisi Kerena SEP Rawat Jalan -->
                            <input type="hidden" name="klsRawatNaik" id="klsRawatNaik" value="">
                            <input type="hidden" name="pembiayaan" id="pembiayaan" value="">
                            <input type="hidden" name="penanggungJawab" id="penanggungJawab" value="">
                            <input type="hidden" name="nomr" id="nomr_sep" value="<?= $nomr ?>">
                            <!-- Informasi Rujukan -->
                            <input type="hidden" name="asalRujukan" id="asalRujukan" value="">
                            <!-- <input type="hidden" name="tglRujukan" id="tglRujukan" value=""> -->
                            <input type="hidden" name="jns_layanan" id="jns_layanan_sep" value="RJ">
                            


                            <div class="box-body">
                                <div>
                                    <label style="color:red;font-size:small">* Wajib Diisi</label>
                                </div>
                                
                                <div class="form-group" id="divPoli">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Spesialis/SubSpesialis <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <label><input type="checkbox" id="eksekutif" name="eksekutif" value="1"> Eksekutif</label>
                                            </span>
                                            <input type="text" class="form-control ui-autocomplete-input" id="txtnmpoli" maxlength="10" placeholder="ketik kode atau nama Spesialis/Subspesialis min 3 karakter">
                                            <input type="hidden" class="form-control" name="tujuan" id="tujuan" value="">
                                            <input type="hidden" class="form-control" name="tujuanRujukan" id="tujuanRujukan" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tujuan Kunjungan <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="form-control " id="tujuanKunj" name="tujuanKunj" style="width:100%" onchange="cekTujuanKunjungan()">
                                            <option value="-">-- Silahkan Pilih --</option>
                                            <option value="0" title="Normal" selected>Normal</option>
                                            <option value="1" title="Prosedur">Prosedur</option>
                                            <option value="2" title="Konsul Dokter">Konsul Dokter</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="prosedure"><input type='hidden' id='flagProcedure' name='flagProcedure' value=''></div>
                                <div id="penunjang"><input type='hidden' id='kdPenunjang' name='kdPenunjang' value=''></div>
                                <div id="asesmen"><input type='hidden' id='assesmentPel' name='assesmentPel' value=''></div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Dokter Yang Menangani <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <!--input type="text" class="form-control ui-autocomplete-input" id="txtnmDokter" placeholder="ketik nama dokter Yang menangini">
                                        <input type="hidden" id="kodeDokter" value=""-->
                                        <select name="dpjpLayan" id="dpjpLayan" class="form-control" style="width: 100%;">

                                        </select>
                                        <span class="text-error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">PPK Asal Rujukan <label style="color:red;font-size:small">*</label></label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="hidden" name="ppkRujukan" id="ppkRujukan" value="">
                                            <input type="text" class="form-control ui-autocomplete-input" id="txtppkasalrujukan" placeholder="ketik kode atau nama ppk asal rujukan min 3 karakter">
                                            <input type="hidden" class="form-control" id="txtkdppkasalrujukan" value="">
                                        </div>
                                    </div>
                                <div id="divRujukan">
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Asal Rujukan</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select class="form-control" id="cbasalrujukan" disabled="">
                                                <option value="1">Faskes Tingkat 1</option>
                                                <option value="2">Faskes Tingkat 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label"><label style="color:gray;font-size:x-small">(yyyy-mm-dd)</label> Tgl.Rujukan</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="input-group date">
                                                <input type="text" class="form-control datepicker" name='tglRujukan' id="tglRujukan" placeholder="yyyy-MM-dd" maxlength="10" readonly>
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar">
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. Rujukan <label style="color:red;font-size:small">*</label></label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" id="noRujukan" name="noRujukan" placeholder="ketik nomor rujukan" maxlength="19" readonly>
                                        </div>
                                    </div>
                                </div>
                                <!-- kontrol -->
                                <div id="divkontrol" class='divkontrol' style="display: block;">
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" id="lblkontrol">No.Surat Kontrol/SKDP <label style="color:red;font-size:small">*</label></label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" id="noSurat" maxlength="25" placeholder="ketik nomor surat kontrol" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6">
                                            <input type="hidden" id="txtidkontrol" value="1">
                                            <input type="hidden" id="noSuratlama" value="">
                                            <input type="hidden" id="txtpoliasalkontrol" value="HDL">
                                            <input type="hidden" id="txttglsepasalkontrol" value="2019-08-24">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">DPJP Pemberi Surat SKDP/SPRI <label style="color:red;font-size:small">*</label></label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <!--input type="text" class="form-control ui-autocomplete-input" id="txtnmdpjp" placeholder="ketik nama dokter DPJP Pemberi Surat SKDP/SPRI">
                                            <input type="hidden" id="kodeDPJP" value=""-->
                                            <select name="kodeDPJP" id="kodeDPJP" class="form-control" style="width: 100%;">

                                            </select><br>
                                            <!-- <span class="text-error">DPJP Tidak Boleh Kosong</span> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- end kontrol -->
                                <div class="clearfix"></div>
                                <!-- sep -->
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label"><label style="color:gray;font-size:x-small">(yyyy-mm-dd)</label> Tgl. SEP</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="input-group date">
                                            <input type="text" class="form-control datepicker" id="tglSep" name="tglSep" placeholder="yyyy-MM-dd" maxlength="10" value="<?= date('Y-m-d') ?>" readonly >
                                            <span class="input-group-addon">
                                                <span class="fa fa-calendar">
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. MR <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="noMr" name='noMr' placeholder="ketik nomor MR" maxlength="10">
                                            <span class="input-group-addon">
                                                <label><input type="checkbox" id="cob" name="cob" value='1'> Peserta COB</label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="divkelasrawat" style="display: none;">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Kelas Rawat</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="form-control" id="cbKelas">
                                            <option value="3">Kelas 3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Diagnosa <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" id="txtnmdiagnosa" maxlength="10" placeholder="ketik kode atau nama diagnosa min 3 karakter">
                                        <label id="lblDxSpesialistik" style="color: red; display: none;"></label>
                                        <input type="hidden" name="diagAwal" id="diagAwal" value="">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. Telepon <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" id="noTelp" name="noTelp" placeholder="ketik nomor telepon yang dapat dihubungi"  maxlength="15">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Catatan</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="form-control" id="catatan" rows="2" placeholder="ketik catatan apabila ada"></textarea>
                                    </div>
                                </div>
                                <!--  katarak-->
                                <div class="form-group" id="divkatarak">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label"> </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="checkbox" id="chkkatarak" value="1"> Katarak (Centang Katarak <i class="fa fa-check"></i>, Jika Peserta Tersebut Mendapatkan Surat Perintah Operasi katarak)

                                    </div>
                                </div>

                                <!--  lakalantas-->
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Status Kecelakaan <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="form-control " id="lakaLantas" onchange="lakalantas()">
                                            <option value="-">-- Silahkan Pilih --</option>
                                            <option value="0" title="Kasus bukan akibat kecelakaan lalu lintas dan kerja" selected>Bukan Kecelakaan</option>
                                            <option value="1" title="Kasus KLL Tidak Berhubungan dengan Pekerjaan">Kecelakaan LaluLintas dan Bukan Kecelakaan Kerja</option>
                                            <option value="2" title="1).Kasus KLL Berhubungan dengan Pekerjaan. 2).Kasus KLL Berangkat dari Rumah menuju tempat Kerja. 3).Kasus KLL Berangkat dari tempat Kerja menuju rumah.">Kecelakaan LaluLintas dan Kecelakaan Kerja</option>
                                            <option value="3" title="1).Kasus Kecelakaan Berhubungan dengan pekerjaan. 2).Kasus terjadi di tempat kerja.Kasus terjadi pada saat kerja.">Kecelakaan Kerja</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="divJaminanHistori" class="text-muted well well-sm no-shadow col-md-12 col-sm-12 col-xs-12" style="display: none;">
                                    <input type="hidden" id="txtkasuslaka" value="0">
                                    <input type="hidden" id="txtnosepjaminanhistori">
                                    <input type="hidden" id="txtnosepjaminanhistori2">
                                    <input type="hidden" id="txtkasuskejadian2">
                                    <input type="hidden" id="txtstatusdijamin">
                                    <p style="margin-top: 10px;" id="pketerangan"></p>
                                </div>
                                <div id="divJaminan" class="text-muted well well-sm no-shadow" style="display: none;">
                                    <div class="form-group" style="display: none;">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Penjamin</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select name="penjamin" id="penjamin" style="width:100%" >
                                            <option value="">Pilih Penjamin</option>
                                                <option value="1">Jasa raharja PT</option>
                                                <option value="2">BPJS Ketenagakerjaan</option>
                                                <option value="3">TASPEN PT</option>
                                                <option value="4">ASABRI PT</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tanggal Kejadian</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="input-group date">
                                                <input type="text" class="form-control datepicker" id="txtTglKejadian" name="tglKejadian" placeholder="yyyy-MM-dd" maxlength="10">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar">
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Suplesi</label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <label><input type="checkbox" id="suplesi" name="suplesi" value="1" onclick="cekSuplesi()"></label>
                                                </span>
                                                <input type="text" class="form-control" id="noSepSuplesi" name="noSepSuplesi" readonly placeholder="ketik nomor SEP Suplesi">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Lokasi Kejadian</label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">

                                            <select class="form-control" id="cbprovinsi" name="cbprovinsi" onchange="getKabupaten()">
                                                <option value="">-- Silahkan Pilih Propinsi --</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label"></label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <select class="form-control" id="cbkabupaten" onchange="getKecamatan()"></select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label"></label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <select class="form-control" id="cbkecamatan"></select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Keterangan Kejadian</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <textarea class="form-control" id="txtketkejadian" name="keterangan" rows="2" placeholder="ketik keterangan kejadian"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- end lakalantas-->
                                
                            </div>
                            <div class="box-footer">
                                <div id="divSimpan" style="display: block;">
                                    <button type="button" style="margin-left:10px;" id="btnSimpan" class="btn btn-success pull-right" onclick="createSEP()"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                                <button type="button" id="btnBatal" class="btn btn-danger pull-right">Batal</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editsep" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg" style="overflow-y: initial !important;  max-height:85%">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="headRujukan">Edit SEP Rawat Jalan</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="theform" style="font-size:12px">
                    <div class="row">
                        
                        <div class="col-md-12 col-xs-12">
                            <input type="hidden" name="idx" id="e-idx" value="<?= $idx ?>">
                            <input type="hidden" name="noKartu" id="e-noKartu" value="">
                            
                            <input type="hidden" name="ppkPelayanan" id="e-ppkPelayanan" value="0306R001">
                            <input type="hidden" name="jnsPelayanan" id="e-jnsPelayanan" value="2">
                            <!-- Baru -->
                            <input type="hidden" name="klsRawatHak" id="e-klsRawatHak" value="">
                            <input type="hidden" name="klsRawatNaik" id="e-klsRawatNaik" value="">
                            <input type="hidden" name="pembiayaan" id="e-pembiayaan" value="">
                            <input type="hidden" name="penanggungJawab" id="e-penanggungJawab" value="">
                            <!--input type="hidden" name="noMR" id="noMR" value=""-->
                            <input type="hidden" name="asalRujukan" id="e-asalRujukan" value="">
                            <input type="hidden" name="tglRujukan" id="e-tglRujukan" value="">
                            <input type="hidden" name="noRujukan" id="e-noRujukan" value="">
                            <input type="hidden" name="ppkRujukan" id="e-ppkRujukan" value="">


                            <div class="box-body">
                                <div>
                                    <label style="color:red;font-size:small">* Wajib Diisi</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">No Sep <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control ui-autocomplete-input" name="noSep" id="e-noSep" readonly>
                                        
                                        <span class="text-error"></span>
                                    </div>
                                </div>
                                <div class="form-group" id="divPoli">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Spesialis/SubSpesialis <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <label><input type="checkbox" id="e-eksekutif" value="1"> Eksekutif</label>
                                            </span>
                                            <input type="text" class="form-control ui-autocomplete-input" id="e-txtnmpoli" maxlength="10" placeholder="ketik kode atau nama Spesialis/Subspesialis min 3 karakter">
                                            <input type="hidden" class="form-control tujuan" id="e-tujuan" name='tujuan' value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Dokter Yang Menangani <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <!--input type="text" class="form-control ui-autocomplete-input" id="txtnmDokter" placeholder="ketik nama dokter Yang menangini">
                                        <input type="hidden" id="kodeDokter" value=""-->
                                        <select name="dpjpLayan" id="e-dpjpLayan" class="form-control dpjpLayan" style="width: 100%;"></select>
                                        <span class="text-error"></span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. MR <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="e-noMR" name='noMR' placeholder="ketik nomor MR" maxlength="10">
                                            <span class="input-group-addon">
                                                <label><input type="checkbox" id="e-cob" name="cob" value='1'> Peserta COB</label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="divkelasrawat" style="display: none;">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Kelas Rawat</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="form-control" id="e-cbKelas">
                                            <option value="3">Kelas 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Diagnosa <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" id="e-txtnmdiagnosa" maxlength="10" placeholder="ketik kode atau nama diagnosa min 3 karakter">
                                        <label id="lblDxSpesialistik" style="color: red; display: none;"></label>
                                        <input type="hidden" name="diagAwal" id="e-diagAwal" value="">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. Telepon <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" id="e-noTelp" placeholder="ketik nomor telepon yang dapat dihubungi" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="15">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Catatan</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="form-control" id="e-catatan" rows="2" placeholder="ketik catatan apabila ada"></textarea>
                                    </div>
                                </div>
                                <!--  katarak-->
                                <div class="form-group" id="e-divkatarak">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label"> </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="checkbox" id="e-chkkatarak" value="1"> Katarak (Centang Katarak <i class="fa fa-check"></i>, Jika Peserta Tersebut Mendapatkan Surat Perintah Operasi katarak)

                                    </div>
                                </div>

                                <!--  lakalantas-->
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Status Kecelakaan <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="form-control " id="e-lakaLantas" onchange="e_lakalantas()">
                                            <option value="-">-- Silahkan Pilih --</option>
                                            <option value="0" title="Kasus bukan akibat kecelakaan lalu lintas dan kerja" selected>Bukan Kecelakaan</option>
                                            <option value="1" title="Kasus KLL Tidak Berhubungan dengan Pekerjaan">Kecelakaan LaluLintas dan Bukan Kecelakaan Kerja</option>
                                            <option value="2" title="1).Kasus KLL Berhubungan dengan Pekerjaan. 2).Kasus KLL Berangkat dari Rumah menuju tempat Kerja. 3).Kasus KLL Berangkat dari tempat Kerja menuju rumah.">Kecelakaan LaluLintas dan Kecelakaan Kerja</option>
                                            <option value="3" title="1).Kasus Kecelakaan Berhubungan dengan pekerjaan. 2).Kasus terjadi di tempat kerja.Kasus terjadi pada saat kerja.">Kecelakaan Kerja</option>
                                        </select>

                                    </div>
                                </div>

                                <div id="divJaminanHistori" class="text-muted well well-sm no-shadow col-md-12 col-sm-12 col-xs-12" style="display: none;">
                                    <input type="hidden" id="e-txtkasuslaka" value="0">
                                    <input type="hidden" id="e-txtnosepjaminanhistori">
                                    <input type="hidden" id="e-txtnosepjaminanhistori2">
                                    <input type="hidden" id="e-txtkasuskejadian2">
                                    <input type="hidden" id="e-txtstatusdijamin">
                                    <p style="margin-top: 10px;" id="pketerangan"></p>
                                </div>
                                <div id="e-divJaminan" class="text-muted well well-sm no-shadow" style="display: none;">
                                    <div class="form-group"  style="display:none;">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Penjamin</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select name="penjamin" id="e-penjamin" style="width:100%" multiple>
                                                <option value="1">Jasa raharja PT</option>
                                                <option value="2">BPJS Ketenagakerjaan</option>
                                                <option value="3">TASPEN PT</option>
                                                <option value="4">ASABRI PT</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tanggal Kejadian</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="input-group date">
                                                <input type="text" class="form-control datepicker" id="e-txtTglKejadian" placeholder="yyyy-MM-dd" maxlength="10">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar">
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Suplesi</label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <label><input type="checkbox" id="e-suplesi" name="suplesi" value="1" onclick="e_cekSuplesi()"></label>
                                                </span>
                                                <input type="text" class="form-control" id="e-noSepSuplesi" name="noSepSuplesi" readonly placeholder="ketik nomor SEP Suplesi">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Lokasi Kejadian</label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">

                                            <select class="form-control" id="e-cbprovinsi" name="cbprovinsi" onchange="getKabupaten('e-cbkabupaten','e-cbprovinsi')">
                                                <option value="">-- Silahkan Pilih Propinsi --</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label"></label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <select class="form-control" id="e-cbkabupaten" onchange="getKecamatan('e-cbkecamatan','e-cbkabupaten')"></select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label"></label>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                            <select class="form-control" id="e-cbkecamatan"></select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Keterangan Kejadian</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <textarea class="form-control" id="e-txtketkejadian" rows="2" placeholder="ketik keterangan kejadian"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- end lakalantas-->

                            </div>
                            <div class="box-footer">
                                <div id="divSimpan" style="display: block;">
                                    <button type="button" style="margin-left:10px;" id="e-btnSimpan" class="btn btn-success pull-right" onclick="updateSEP()"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                                <button type="button" id="e-btnBatal" class="btn btn-danger pull-right">Batal</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="form-update-layanan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog" style="overflow-y: initial !important">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="headRujukan">Update Informasi Layanan</h3>
            </div>
            <div class="modal-body">
                <div id="loading"></div>
                <div id="layanan">
                    <form class="form-horizontal" name="upddatelayanan" id="updatelayanan">
                        <input type="hidden" name="id_ruang_asal" id="id_ruang_asal" value="<?= $id_ruang ?>">
                        <input type="hidden" name="uidx" id="uidx" value="<?= $idx ?>">
                        <input type="hidden" name="uid_daftar" id="uid_daftar" value="<?= $id_daftar ?>">
                        <input type="hidden" name="ujns_layanan" id="ujns_layanan" value="<?= $jns_layanan ?>">
                        <input type="hidden" name="ureg_unit" id="ureg_unit" value="<?= $reg_unit ?>">
                        <input type="hidden" name="utgl_masuk_lama" id="utgl_masuk_lama" value="<?= $tgl_masuk ?>">
                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tanggal Masuk</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="input-group">
                                    
                                    <input type="text" name="utgl_masuk" id="utgl_masuk" class="form-control datepicker" value="<?= $tgl_masuk ?>">
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tujuan Layanan</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="input-group">
                                    <select name="uid_ruang" id="uid_ruang" class="form-control" style="width: 100%;" onchange="getDokter2()">
                                    <option value=""></option>
                                    <?php 
                                    foreach ($poli as $p) {
                                        ?>
                                        <option value="<?= $p->idx ?>" <?php if($p->idx==$id_ruang) echo "selected" ?> ><?= $p->ruang ?></option>
                                        <?php
                                    }
                                    ?>
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Dokter</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                
                                <div class="input-group">
                                    <select name="udokterJaga" id="udokterJaga" class="form-control" style="width: 100%;">
                                    <option value=""></option>
                                    <?php 
                                    foreach ($dokter as $d ) {
                                        ?>
                                        <option value="<?= $d->NRP ?>" <?php if($d->NRP==$dokterJaga) echo "selected"; ?>><?= $d->pgwNama ?></option>
                                        <?php
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">No Sep</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="input-group">
                                    <input type="text" name="uno_jaminan" id="uno_jaminan" class="form-control" value="<?= $no_jaminan ?>">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">&nbsp;</label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="input-group">
                                    <button class="btn btn-primary" type="button" onclick="updateLayanan()">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    var base_url = "<?php echo base_url() . "mr_registrasi.php"; ?>";
    var url_call_back = "<?php echo base_url() . "api.php/"; ?>";
</script>
<script src="<?php echo base_url() ?>js/pendaftaran.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

    $('input,textarea').focus(function() {
        return this.select();
    });
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
    $('#batal').click(function() {
        var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/rawat_jalan' ?>';
        window.location.href = url;
    });
    $("#txtnmpoli").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "<?php echo base_url() . 'vclaim/referensi/poli' ?>",
                dataType: "JSON",
                method: "POST",
                data: {
                    param1: request.term
                },
                success: function(data) {
                    //console.log(data);
                    var poli = data.response.poli;
                    console.log(poli);
                    response(poli.slice(0, 15));
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(errorThrown);
                }
            });
        },
        minLength: 2,
        focus: function(event, ui) {
            $("#tujuan").val(ui.item['kode']);
            $("#txtnmpoli").val(ui.item['nama']);
            $("#txtnmpoli").removeClass("ui-autocomplete-loading");
            return false;
        },
        select: function(event, ui) {
            $("#tujuan").val(ui.item['kode']);
            $("#txtnmpoli").val(ui.item['nama']);
            $("#txtnmpoli").removeClass("ui-autocomplete-loading");
            return false;
        }
    })
    .autocomplete("instance")._renderItem = function(table, item) {
        return $("<tr class='autocomplete'>")
            .append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
            .appendTo(table);
    };

    $("#e-txtnmpoli").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "<?php echo base_url() . 'mr_registrasi.php/vclaim/referensi/poli' ?>",
                dataType: "JSON",
                method: "GET",
                data: {
                    param: request.term
                },
                success: function(data) {
                    //console.log(data);
                    var poli = data.response.poli;
                    console.log(poli);
                    response(poli.slice(0, 15));
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(errorThrown);
                }
            });
        },
        minLength: 2,
        focus: function(event, ui) {
            $("#e-tujuan").val(ui.item['kode']);
            $("#e-txtnmpoli").val(ui.item['nama']);
            $("#e-txtnmpoli").removeClass("ui-autocomplete-loading");
            return false;
        },
        select: function(event, ui) {
            $("#e-tujuan").val(ui.item['kode']);
            $("#e-txtnmpoli").val(ui.item['nama']);
            $("#e-txtnmpoli").removeClass("ui-autocomplete-loading");
            return false;
        }
    })
    .autocomplete("instance")._renderItem = function(table, item) {
        return $("<tr class='autocomplete'>")
            .append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
            .appendTo(table);
    };

    $("#txtnmdiagnosa").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "<?php echo base_url() . 'mr_registrasi.php/vclaim/referensi/diagnosa' ?>",
                dataType: "JSON",
                method: "GET",
                data: {
                    param: request.term
                },
                success: function(data) {
                    console.clear();
                    console.log(data);
                    var diagnosa = data.response.diagnosa;
                    console.log(diagnosa);
                    response(diagnosa.slice(0, 15));
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(errorThrown);
                }
            });
        },
        minLength: 2,
        focus: function(event, ui) {
            $("#diagAwal").val(ui.item['kode']);
            $("#txtnmdiagnosa").val(ui.item['nama']);
            $("#txtnmdiagnosa").removeClass("ui-autocomplete-loading");
            return false;
        },
        select: function(event, ui) {
            $("#diagAwal").val(ui.item['kode']);
            $("#txtnmdiagnosa").val(ui.item['nama']);
            $("#txtnmdiagnosa").removeClass("ui-autocomplete-loading");
            return false;
        }
    })
    .autocomplete("instance")._renderItem = function(table, item) {
        return $("<tr class='autocomplete'>")
            .append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
            .appendTo(table);
    };

    $("#e-txtnmdiagnosa").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "<?php echo base_url() . 'mr_registrasi.php/vclaim/referensi/diagnosa' ?>",
                dataType: "JSON",
                method: "GET",
                data: {
                    param: request.term
                },
                success: function(data) {
                    console.clear();
                    console.log(data);
                    var diagnosa = data.response.diagnosa;
                    console.log(diagnosa);
                    response(diagnosa.slice(0, 15));
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(errorThrown);
                }
            });
        },
        minLength: 2,
        focus: function(event, ui) {
            $("#e-diagAwal").val(ui.item['kode']);
            $("#e-txtnmdiagnosa").val(ui.item['nama']);
            $("#e-txtnmdiagnosa").removeClass("ui-autocomplete-loading");
            return false;
        },
        select: function(event, ui) {
            $("#e-diagAwal").val(ui.item['kode']);
            $("#e-txtnmdiagnosa").val(ui.item['nama']);
            $("#e-txtnmdiagnosa").removeClass("ui-autocomplete-loading");
            return false;
        }
    })
    .autocomplete("instance")._renderItem = function(table, item) {
        return $("<tr class='autocomplete'>")
            .append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
            .appendTo(table);
    };

    $("#r-diagRujukan").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "<?php echo base_url() . 'mr_registrasi.php/vclaim/referensi/diagnosa' ?>",
                dataType: "JSON",
                method: "GET",
                data: {
                    param: request.term
                },
                success: function(data) {
                    console.clear();
                    console.log(data);
                    var diagnosa = data.response.diagnosa;
                    console.log(diagnosa);
                    response(diagnosa.slice(0, 15));
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(errorThrown);
                }
            });
        },
        minLength: 2,
        focus: function(event, ui) {
            $("#diagRujukan").val(ui.item['kode']);
            $("#r-diagRujukan").val(ui.item['nama']);
            $("#r-diagRujukan").removeClass("ui-autocomplete-loading");
            return false;
        },
        select: function(event, ui) {
            $("#diagRujukan").val(ui.item['kode']);
            $("#r-diagRujukan").val(ui.item['nama']);
            $("#r-diagRujukan").removeClass("ui-autocomplete-loading");
            return false;
        }
    })
    .autocomplete("instance")._renderItem = function(table, item) {
        return $("<tr class='autocomplete'>")
            .append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
            .appendTo(table);
    };

    $("#r-ppkDirujuk").autocomplete({
        source: function(request, response) {
            var faskes=$('#r-faskes').val();
            $.ajax({
                url: "<?php echo base_url() . 'mr_registrasi.php/vclaim/referensi/faskes/' ?>"+faskes,
                dataType: "JSON",
                method: "GET",
                data: {
                    param: request.term
                },
                success: function(data) {
                    console.clear();
                    console.log(data);
                    var fk = data.response.faskes;
                    // console.log(diagnosa);
                    response(fk.slice(0, 15));
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(errorThrown);
                }
            });
        },
        minLength: 2,
        focus: function(event, ui) {
            $("#ppkDirujuk").val(ui.item['kode']);
            $("#r-ppkDirujuk").val(ui.item['nama']);
            $("#r-ppkDirujuk").removeClass("ui-autocomplete-loading");
            return false;
        },
        select: function(event, ui) {
            $("#ppkDirujuk").val(ui.item['kode']);
            $("#r-ppkDirujuk").val(ui.item['nama']);
            $("#r-ppkDirujuk").removeClass("ui-autocomplete-loading");
            spesialistiRujukan()
            return false;
        }
    })
    .autocomplete("instance")._renderItem = function(table, item) {
        return $("<tr class='autocomplete'>")
            .append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
            .appendTo(table);
    };
    <?php if(!empty($no_bpjs)){?>
        cekPeserta('<?= $no_bpjs ?>','<?= date('Y-m-d') ?>')
    <?php } ?>
});

    function form_batal() {
        $('#alasan').val("");
        $('#formModal').modal('show');
    }

    function simpan_batal_daftar() {
        var formdata = {
            id_daftar: $('#b_id_daftar').val(),
            reg_unit: $('#reg_unit').val(),
            alasan: $('#alasan').val()
        }
        console.log(formdata)
        $.ajax({
            url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/simpan_batal_daftar' ?>",
            type: "POST",
            data: formdata,
            dataType: "JSON",
            success: function(data) {
                alert(data.message);
                if (data.code == 200) {
                    var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi' ?>';
                    window.location.href = url;
                }
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    }

    function print_kartu_berobat() {
        var nomr = '<?php echo $nomr ?>';
        var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/cetakKartu?kode=' ?>' + nomr;
        openInNewTab(url);
    }

    function print_stiker() {
        var nomr = '<?php echo $nomr ?>';
        var url="http://192.168.2.100/cetak_stiker_mr/";
        // var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/cetakStiker?kode=' ?>' + nomr;
        openInNewTab(url);
    }

    function print_reg_IGD() {
        var reg_unit = '<?php echo encrypt_decrypt('encrypt', $reg_unit, true) ?>';
        var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/cetakRegIGD?kode=' ?>' + reg_unit;
        openInNewTab(url);
    }

    function print_surat_reg_IGD() {
        var reg_unit = '<?php echo encrypt_decrypt('encrypt', $reg_unit, true) ?>';
        var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/cetakSuratRegIGD?kode=' ?>' + reg_unit;
        openInNewTab(url);
    }

    function print_surat_masuk_IGD() {
        var reg_unit = '<?php echo $reg_unit ?>';
        var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/cetakSuratMasukIGD?kode=' ?>' + reg_unit;
        openInNewTab(url);
    }

    function new_reg_igd() {
        var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/gawat_darurat' ?>';
        window.location.href = url;
    }

    function openInNewTab(url) {
        var win = window.open(url, '_blank');
        win.focus();
    }

    function batalkanSep(no_jaminan) {
        swal({
                title: "Konfirmasi",
                text: 'Apakah anda yakin akan membatalkan No Sep ' + no_jaminan + '?',
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    var url_call_back = "<?= base_url() . "api.php/"; ?>";
                    var formdata = {
                        param1: no_jaminan,
                        param2: "<?= $this->session->userdata('get_uid') ?>",
                    }
                    $.ajax({
                        url: url_call_back + "vclaim/sep/hapusSEP",
                        type: "POST",
                        data: formdata,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data);
                            tampilkanPesan('warning', data.metaData.message);
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(jqXHR.responseText);
                        }
                    });
                }
            });
    }
    function editKunjungan(id){
        $.ajax({
            url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/editkunjungan/' ?>"+id,
            dataType: "JSON",
            method: "GET",
            data: {},
            success: function(data) {
                $('#form-update-layanan').modal('show');
                $('#uidx').val(data.data.idx);
                $('#uid_daftar').val(data.data.id_daftar);
                $('#uid_ruang').val(data.data.id_ruang);
                $('#udokterJaga').val(data.data.dokterJaga);
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(errorThrown);
            }
        });
    }
    function updateLayanan() {
        var formdata = {
            idx: $('#uidx').val(),
            id_daftar: $('#uid_daftar').val(),
            jns_layanan: $('#ujns_layanan').val(),
            reg_unit: $('#ureg_unit').val(),
            utgl_masuk_lama: $('#utgl_masuk_lama').val(),
            id_ruang_asal: $('#id_ruang_asal').val(),
            tgl_masuk: $('#utgl_masuk').val(),
            id_ruang: $('#uid_ruang').val(),
            nama_ruang: $('#uid_ruang :selected').html(),
            dokterJaga: $('#udokterJaga').val(),
            namaDokterJaga: $('#udokterJaga :selected').html(),
            no_jaminan: $('#uno_jaminan').val()
        }
        $.ajax({
            url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/updatelayanan' ?>",
            type: "POST",
            data: formdata,
            dataType: "JSON",
            success: function(data) {
                alert(data.message);
                if (data.status == true) {
                    var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/reg_success_igd?uid=' ?>' + data.unikID;
                    window.location.href = url;
                }
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    }
    
</script>
