<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.css">
<script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery/css/jquery-ui.css">
<style>
    /*.modal-content {
        max-height: 600px;
    }*/
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
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
        <h4><i class="icon fa fa-ban"></i> Penting</h4>
        Registrasi yang telah dibatalkan tidak bisa dikembalikan.
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="box box-widget widget-user-2">
                <div class="widget-user-header bg-aqua-active">
                    <div class="widget-user-image">
                        <?php if ($jns_kelamin == "1" || $jns_kelamin == 'L') : ?>
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
                <div class="box-header with-border"></div>
                <div class="box-body table-responsive">
                    <input type="hidden" id="no_bpjs" name="no_bpjs" value="<?= $no_bpjs; ?>">
                    <input type="hidden" id="id_rujuk" name="id_rujuk" value="<?= $id_rujuk; ?>">
                    <input type="hidden" id="faskes" name="faskes" value="<?php if ($id_rujuk == 2) echo "1";
                                                                            elseif ($id_rujuk == 3) echo "2";
                                                                            else echo "0"; ?>">
                    <input type="hidden" id="txtTanggal" name="txtTanggal" value="<?= date('Y-m-d'); ?>">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 150px">No Registrasi RS</th>
                            <th style="font-size: 20px"><?php echo $id_daftar ?></th>
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
                            <th><?php echo $nama_ruang ?></th>
                        </tr>
                        <tr>
                            <th>Jaminan Layanan</th>
                            <th><?php echo $cara_bayar ?></th>
                        </tr>
                        <tr>
                            <th>Batch Antrian</th>
                            <th><?php echo $batch ?></th>
                        </tr>
                        <tr>
                            <th>Estimasi</th>
                            <th><?php echo $estimasi ?></th>
                        </tr>
                        <tr>
                            <th>No Antrian Poly</th>
                            <th><?php echo $no_antrian_poly ?></th>
                        </tr>
                        <tr>
                            <th>No Jaminan Layanan</th>
                            <th>
                                <?php
                                if (empty($no_jaminan)) {
                                ?>
                                    <div class="input-group input-group-sm">
                                        <input type="text" id="no_jaminan" name="no_jaminan" class="form-control" placeholder="No Jaminan">

                                        <div class="input-group-btn">
                                            <button class="btn btn-danger btn-block" type="button" onclick="ListRujukan()"><i class="fa fa-plus"></i> Create SEP</button>
                                        </div>

                                    </div>
                                <?php
                                } else
                                    echo $no_jaminan
                                ?>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="box box-success">
                <form role="form" method="post" action="#" onSubmit="return false">
                    <div class="box-body">
                        <a href="#" onClick="form_batal()" class="btn btn-danger btn-block">
                            <i class="fa fa-print"></i> <b>Registrasi Batal</b></a>
                        <a href="#" onClick="print_kartu_berobat()" class="btn btn-success btn-block">
                            <i class="fa fa-print"></i> <b>Cetak Kartu Berobat</b></a>
                        <a href="#" onClick="print_reg_rajal()" class="btn btn-success btn-block">
                            <i class="fa fa-print"></i> <b>Cetak Registrasi Rawat Jalan</b></a>
                        <a href="#" onClick="print_surat_reg_rajal()" class="btn btn-success btn-block">
                            <i class="fa fa-print"></i> <b>Surat Registrasi Rawat Jalan</b></a>
                        <a href="#" onClick="print_surat_masuk_rajal()" class="btn btn-success btn-block">
                            <i class="fa fa-print"></i> <b>Surat Masuk Rawat Jalan</b></a>
                        <?php
                        if ($jkn == 1) {
                            if (!empty($no_jaminan)) {
                        ?>
                                <a href="<?= base_url() . "mr_registrasi.php/registrasi/sep/" . $no_jaminan ?>" target="_blank" class="btn btn-warning btn-block">
                                    <i class="fa fa-print"></i> <b>Cetak SEP</b></a>
                                <button class="btn btn-danger btn-block" type="button" onclick="batalkanSep('<?= $no_jaminan ?>')"><i class="fa fa-remove"></i> Batalkan SEP</button>
                        <?php
                            }
                        }
                        ?>
                        <a href="#" onClick="print_stiker()" class="btn btn-info btn-block">
                            <i class="fa fa-print"></i> <b>Cetak Stiker</b></a>
                        <a href="#" onClick="new_reg_rajal()" class="btn btn-primary btn-block">
                            <i class="fa fa-edit"></i> <b>Registrasi Rawat Jalan Baru</b></a>
                        <a href="<?= base_url() . "mr_registrasi.php/smart" ?>" class="btn btn-warning btn-block">
                            <i class="fa fa-globe"></i> <b>Aprove Pendaftaran Online</b></a>
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
                                <input readonly type="text" class="form-control" name="id_daftar" id="id_daftar" value="<?php echo $id_daftar ?>">
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
                <button type="button" class="close" data-dismiss="modal">??</button>
                <h3 class="modal-title" id="headRujukan">SEP Rawat Jalan</h3>
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
                            <input type="hidden" name="ppkPelayanan" id="ppkPelayanan" value="0306R001">
                            <input type="hidden" name="jnsPelayanan" id="jnsPelayanan" value="2">
                            <input type="hidden" name="klsRawat" id="klsRawat" value="">
                            <!--input type="hidden" name="noMR" id="noMR" value=""-->
                            <input type="hidden" name="asalRujukan" id="asalRujukan" value="">
                            <input type="hidden" name="tglRujukan" id="tglRujukan" value="">
                            <input type="hidden" name="noRujukan" id="noRujukan" value="">
                            <input type="hidden" name="ppkRujukan" id="ppkRujukan" value="">


                            <div class="box-body">
                                <div>
                                    <label style="color:red;font-size:small">* Wajib Diisi</label>
                                </div>
                                <div class="form-group" id="divPoli">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Spesialis/SubSpesialis <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <label><input type="checkbox" id="eksekutif" value="1"> Eksekutif</label>
                                            </span>
                                            <input type="text" class="form-control ui-autocomplete-input" id="txtnmpoli" maxlength="10" placeholder="ketik kode atau nama Spesialis/Subspesialis min 3 karakter">
                                            <input type="hidden" class="form-control" id="tujuan" value="HDL">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Dokter Yang Menangani <label style="color:red;font-size:small">*</label></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <!--input type="text" class="form-control ui-autocomplete-input" id="txtnmDokter" placeholder="ketik nama dokter Yang menangini">
                                        <input type="hidden" id="kodeDokter" value=""-->
                                        <select name="kodeDokter" id="kodeDokter" class="form-control" style="width: 100%;"></select>
                                        <span class="text-error"></span>
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
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">PPK Asal Rujukan <label style="color:red;font-size:small">*</label></label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control ui-autocomplete-input" id="txtppkasalrujukan" placeholder="ketik kode atau nama ppk asal rujukan min 3 karakter" disabled="">
                                            <input type="hidden" class="form-control" id="txtkdppkasalrujukan" value="03050101">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label"><label style="color:gray;font-size:x-small">(yyyy-mm-dd)</label> Tgl.Rujukan</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="input-group date">
                                                <input type="text" class="form-control datepicker" id="txttglrujukan" placeholder="yyyy-MM-dd" maxlength="10" disabled="">
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
                                            <input type="text" class="form-control" id="txtnorujukan" placeholder="ketik nomor rujukan" maxlength="19" disabled="">
                                        </div>
                                    </div>
                                </div>
                                <!-- kontrol -->
                                <div id="divkontrol" class='divkontrol' style="display: block;">
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" id="lblkontrol">No.Surat Kontrol/SKDP <label style="color:red;font-size:small">*</label></label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" id="noSurat" maxlength="6" placeholder="ketik nomor surat kontrol" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" maxlength="6">
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
                                            <select name="kodeDPJP" id="kodeDPJP" class="form-control" style="width: 100%;"></select>
                                            <span class="text-error">DPJP Tidak Boleh Kosong</span>
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
                                            <input type="text" class="form-control datepicker" id="txttglsep" placeholder="yyyy-MM-dd" maxlength="10" disabled="">
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
                                            <input type="text" class="form-control" id="noMR" name='noMR' placeholder="ketik nomor MR" maxlength="10">
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
                                        <input type="text" class="form-control" id="noTelp" placeholder="ketik nomor telepon yang dapat dihubungi" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" maxlength="15">
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
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Penjamin</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select name="penjamin" id="penjamin" style="width:100%" multiple>
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
                                                <input type="text" class="form-control datepicker" id="txtTglKejadian" placeholder="yyyy-MM-dd" maxlength="10">
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
                                            <textarea class="form-control" id="txtketkejadian" rows="2" placeholder="ketik keterangan kejadian"></textarea>
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
<!-- Modal List Rujukan -->
<div class="modal fade" id="form-list-rujukan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg" style="overflow-y: initial !important">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">??</button>
                <h3 class="modal-title" id="headRujukan">Rujukan Faskes Tingkat 1</h3>
            </div>
            <div class="modal-body">
                <div id="loading"></div>
                <div id="formlistrujukan">
                    <form class="form-horizontal">
                        <div id="tblPopup_Rujukan_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row" id="pilihfaskes" style="display=none">
                                <div class="col-md-12">
                                    <input type="radio" name="faskes" id="pcare" checked onclick="getListRujukan(1)">PCARE
                                    <input type="radio" name="faskes" id="rs" onclick="getListRujukan(2)">RUMAH SAKIT
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-bordered" id="tblPopup_Rujukan" style="font-size: small; width : 100%" role="grid" aria-describedby="tblPopup_Rujukan_info" width="100%" cellpadding="0">
                                        <thead>
                                            <tr role="row">
                                                <th tabindex="0" rowspan="1" colspan="1" style="width: 0px;">No.</th>
                                                <th tabindex="0" rowspan="1" colspan="1" style="width: 0px;">No.Rujukan</th>
                                                <th tabindex="0" rowspan="1" colspan="1" style="width: 0px;">Tgl.Rujukan</th>
                                                <th tabindex="0" rowspan="1" colspan="1" style="width: 0px;">No.Kartu</th>
                                                <th tabindex="0" rowspan="1" colspan="1" style="width: 0px;">Nama</th>
                                                <th tabindex="0" rowspan="1" colspan="1" style="width: 0px;">PPK Perujuk</th>
                                                <th tabindex="0" rowspan="1" colspan="1" style="width: 0px;">Sub/Spesialis</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list-data-rujukan">
                                            <tr class="odd">
                                                <td colspan="7" valign="top">No data available in table</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div id="tblPopup_Rujukan_processing" class="dataTables_processing" style="display: none;">Processing...</div>
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
    var Base64 = {
        _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
        encode: function(e) {
            var t = "";
            var n, r, i, s, o, u, a;
            var f = 0;
            e = Base64._utf8_encode(e);
            while (f < e.length) {
                n = e.charCodeAt(f++);
                r = e.charCodeAt(f++);
                i = e.charCodeAt(f++);
                s = n >> 2;
                o = (n & 3) << 4 | r >> 4;
                u = (r & 15) << 2 | i >> 6;
                a = i & 63;
                if (isNaN(r)) {
                    u = a = 64
                } else if (isNaN(i)) {
                    a = 64
                }
                t = t + this._keyStr.charAt(s) + this._keyStr.charAt(o) + this._keyStr.charAt(u) + this._keyStr.charAt(a)
            }
            return t
        },
        decode: function(e) {
            var t = "";
            var n, r, i;
            var s, o, u, a;
            var f = 0;
            e = e.replace(/[^A-Za-z0-9\+\/\=]/g, "");
            while (f < e.length) {
                s = this._keyStr.indexOf(e.charAt(f++));
                o = this._keyStr.indexOf(e.charAt(f++));
                u = this._keyStr.indexOf(e.charAt(f++));
                a = this._keyStr.indexOf(e.charAt(f++));
                n = s << 2 | o >> 4;
                r = (o & 15) << 4 | u >> 2;
                i = (u & 3) << 6 | a;
                t = t + String.fromCharCode(n);
                if (u != 64) {
                    t = t + String.fromCharCode(r)
                }
                if (a != 64) {
                    t = t + String.fromCharCode(i)
                }
            }
            t = Base64._utf8_decode(t);
            return t
        },
        _utf8_encode: function(e) {
            e = e.replace(/\r\n/g, "\n");
            var t = "";
            for (var n = 0; n < e.length; n++) {
                var r = e.charCodeAt(n);
                if (r < 128) {
                    t += String.fromCharCode(r)
                } else if (r > 127 && r < 2048) {
                    t += String.fromCharCode(r >> 6 | 192);
                    t += String.fromCharCode(r & 63 | 128)
                } else {
                    t += String.fromCharCode(r >> 12 | 224);
                    t += String.fromCharCode(r >> 6 & 63 | 128);
                    t += String.fromCharCode(r & 63 | 128)
                }
            }
            return t
        },
        _utf8_decode: function(e) {
            var t = "";
            var n = 0;
            var r = c1 = c2 = 0;
            while (n < e.length) {
                r = e.charCodeAt(n);
                if (r < 128) {
                    t += String.fromCharCode(r);
                    n++
                } else if (r > 191 && r < 224) {
                    c2 = e.charCodeAt(n + 1);
                    t += String.fromCharCode((r & 31) << 6 | c2 & 63);
                    n += 2
                } else {
                    c2 = e.charCodeAt(n + 1);
                    c3 = e.charCodeAt(n + 2);
                    t += String.fromCharCode((r & 15) << 12 | (c2 & 63) << 6 | c3 & 63);
                    n += 3
                }
            }
            return t
        }
    }
    $(document).ready(function() {

        $('input,textarea').focus(function() {
            return this.select();
        });
        $('#batal').click(function() {
            var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/rawat_jalan' ?>';
            window.location.href = url;
        });
        $("#txtnmpoli").autocomplete({
                source: function(request, response) {

                    $.ajax({
                        url: "<?php echo base_url() . 'api.php/vclaim/referensi/poli' ?>",
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

        $("#txtnmdpjp").autocomplete({
                source: function(request, response) {

                    $.ajax({
                        url: "<?php echo base_url() . 'api.php/vclaim/referensi/dokter' ?>",
                        dataType: "JSON",
                        method: "POST",
                        data: {
                            param1: request.term
                        },
                        success: function(data) {
                            console.log(data);
                            var dokter = data.response.list;
                            response(dokter.slice(0, 15));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#kodeDPJP").val(ui.item['kode']);
                    $("#txtnmdpjp").val(ui.item['nama']);
                    $("#txtnmdpjp").removeClass("ui-autocomplete-loading");
                    return false;
                },
                select: function(event, ui) {
                    $("#kodeDPJP").val(ui.item['kode']);
                    $("#txtnmdpjp").val(ui.item['nama']);
                    $("#txtnmdpjp").removeClass("ui-autocomplete-loading");
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
                    .appendTo(table);
            };

        $("#txtnmDokter").autocomplete({
                source: function(request, response) {

                    $.ajax({
                        url: "<?php echo base_url() . 'api.php/vclaim/referensi/dokter' ?>",
                        dataType: "JSON",
                        method: "POST",
                        data: {
                            param1: request.term
                        },
                        success: function(data) {
                            console.log(data);
                            var dokter = data.response.list;
                            response(dokter.slice(0, 15));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#kodeDokter").val(ui.item['kode']);
                    $("#txtnmDokter").val(ui.item['nama']);
                    $("#txtnmDokter").removeClass("ui-autocomplete-loading");
                    return false;
                },
                select: function(event, ui) {
                    $("#kodeDokter").val(ui.item['kode']);
                    $("#txtnmDokter").val(ui.item['nama']);
                    $("#txtnmDokter").removeClass("ui-autocomplete-loading");
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
                        url: "<?php echo base_url() . 'api.php/vclaim/referensi/diagnosa' ?>",
                        dataType: "JSON",
                        method: "POST",
                        data: {
                            param1: request.term
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

    });

    function form_batal() {
        $('#alasan').val("");
        $('#formModal').modal('show');
    }

    function simpan_batal_daftar() {
        var formdata = {
            id_daftar: $('#id_daftar').val(),
            reg_unit: $('#reg_unit').val(),
            alasan: $('#alasan').val()
        }
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
        var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/cetakStiker?kode=' ?>' + nomr;
        openInNewTab(url);
    }

    function print_reg_rajal() {
        var reg_unit = '<?php echo encrypt_decrypt('encrypt', $reg_unit, true) ?>';
        var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/cetakRegRajal?kode=' ?>' + reg_unit;
        openInNewTab(url);
    }

    function print_surat_reg_rajal() {
        var reg_unit = '<?php echo encrypt_decrypt('encrypt', $reg_unit, true) ?>';
        var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/cetakSuratRegRajal?kode=' ?>' + reg_unit;
        openInNewTab(url);
    }

    function print_surat_masuk_rajal() {
        var reg_unit = '<?php echo $reg_unit ?>';
        var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/cetakSuratMasukRajal?kode=' ?>' + reg_unit;
        openInNewTab(url);
    }

    function new_reg_rajal() {
        var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/rawat_jalan' ?>';
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
    var base_url = "<?php echo base_url() . "mr_registrasi.php"; ?>";
    var url_call_back = "<?php echo base_url() . "api.php/"; ?>";
</script>
<script src="<?php echo base_url() ?>js/pendaftaran.js"></script>