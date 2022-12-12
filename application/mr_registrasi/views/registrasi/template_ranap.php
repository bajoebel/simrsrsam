<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.css">
<script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
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

    a.disabled {
        pointer-events: none;
        cursor: default;
    }

    .ui-autocomplete-loading {
        background: white url("<?php echo base_url() ?>ui-anim_basic_16x16.gif") right center no-repeat;
    }

    .ui-autocomplete-input {
        border: none;
        font-size: 14px;
        border: 1px solid #DDD !important;
        z-index: 1000;
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

    .divRegCredit {
        display: none
    }

    a em {
        font-size: 10px;
    }

    .ui-autocomplete-loading {
        background: white url("<?php echo base_url() ?>ui-anim_basic_16x16.gif") right center no-repeat;
    }

    .ui-autocomplete {
        position: absolute;
        z-index: 20000;
        cursor: default;
        padding: 0;
        margin-top: 2px;
        list-style: none;
        background-color: #ffffff;
        border: 1px solid #ccc;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .ui-autocomplete>li {
        padding: 3px 10px;
    }

    .ui-autocomplete>li.ui-state-focus {
        background-color: #3399FF;
        color: #ffffff;
    }

    .ui-helper-hidden-accessible {
        display: none;
    }

    fieldset legend {
        text-transform: uppercase;
        font-weight: bolder;
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">

            <div class="box box-success">
                <form id="form1" class="form-horizontal" onsubmit="return false" method="POST">
                    <div class="box-body">
                        <?php
                        //echo "Ranap : " .$ranap;
                        if ($ranap == 1) {
                        ?>
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible">
                                    <p>Maaf pasien belum bisa didaftarkan karena masih terdaftar sebagai pasien rawat inap di <?= $ruangranap ?>, silahkan hubungi kembali bagian ruangan untuk mengkonfirmasi kepulangan pasien</p>
                                </div>
                            </div>
                        <?php
                        }else{
                            if($reservasi>0){
                                ?>
                                <div class="col-md-12">
                                    <div class="alert alert-danger alert-dismissible">
                                        <p>Maaf reservasi rawat jalan / IGD ini sudah digunakan sebelumnya silahkan daftarkan kembali reservasi rawat jalan / igd yang baru </p>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <div class="col-md-3 col-xs-12">
                            <div class="row">
                                <div class="box box-widget widget-user-2">
                                    <div class="bg-aqua-active" style="padding:10px;border-radius:15px 15px 0px 0px">
                                        <div class="widget-user-image">
                                            <?php if ($jns_kelamin == "1" || $jns_kelamin == "L") : ?>
                                                <img class="img-circle" src="<?php echo base_url() . 'assets/images/male.png' ?>" alt="" id="imgMale">
                                            <?php else : ?>
                                                <img class="img-circle" src="<?php echo base_url() . 'assets/images/female.png' ?>" alt="" id="imgFemale">
                                            <?php endif; ?>
                                        </div>
                                        <h4 class="widget-user-username"><?php echo $nama_pasien  ?></h4>
                                        <p id="lblnoka" style="margin-left: 75px;"><?php echo $no_ktp  ?></p>
                                    </div>

                                    <div class="box-body">
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a title="Profile Peserta" href="#tab_1" data-toggle="tab">
                                                        <span class="fa fa-user"></span></a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" style="padding:0px;">
                                                <div class="tab-pane active" id="tab_1">

                                                    <ul class="list-group list-group-unbordered">
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-4">NOMR</div>
                                                                <div class="col-xs-8">: <?= $nomr; ?></div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-4">TTL</div>
                                                                <div class="col-xs-8">: <?= $tempat_lahir . " - " . $tgl_lahir; ?></div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-4">NO. REGISTRASI</div>
                                                                <div class="col-xs-8">: <?= $id_daftar; ?></div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-4">NO. REG UNIT</div>
                                                                <div class="col-xs-8">: <?= $reg_unit; ?></div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-4">KELAS LAYANAN</div>
                                                                <div class="col-xs-8">: <?php echo ($kelas_layanan == "") ? "Rawat Jalan" : "Kelas " . $kelas_layanan ?></div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-4">CARA BAYAR</div>
                                                                <div class="col-xs-8">: <?= $cara_bayar; ?></div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-4">RUANG / POLI PENGIRIM</div>
                                                                <div class="col-xs-8">: <?= $nama_ruang; ?></div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-4">DPJP</div>
                                                                <div class="col-xs-8">: <?= $namaDokterJaga; ?></div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="divriwayatKK" style="display: none;">
                                            <button type="button" id="btnRiwayatKK" class="btn btn-danger btn-block"><span class="fa fa-th-list"></span> Pasien Memiliki Riwayat KLL/KK/PAK <br><i>(klik lihat data)</i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-md-9 col-xs-12">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="true">Admisi Rawat Inap</a></li>
                                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Riwayat Kunjungan</a></li>

                                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php if (!empty($form_admisi)) echo $form_admisi ?>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_3">
                                        <table class="table table-bordered">
                                            <thead class="bg-green">
                                                <tr>
                                                    <th style="width: 80px">No</th>
                                                    <th style="width: 150px">No Registrasi</th>
                                                    <th style="width: 150px">No Unit Registrasi</th>
                                                    <th style="width: 120px">Tgl Registrasi</th>
                                                    <th>Tujuan</th>
                                                    <th>Cara Bayar</th>
                                                    <th style="width: 150px">Jns Pelayanan</th>
                                                    <th style="width: 150px">Users</th>
                                                </tr>
                                            </thead>
                                            <tbody id="getHistoryPasien"></tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="mpop_sep" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg" style="overflow-y: initial !important;  max-height:85%">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="headSep">SEP Rawat Inap</h3>
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
                            <input type="hidden" name="idx" id="idx" value="">
                            <input type="hidden" name="noKartu" id="noKartu" value="">
                            <input type="hidden" name="ppkPelayanan" id="ppkPelayanan" value="<?= KODERS_VC ?>">
                            <input type="hidden" name="jnsPelayanan" id="jnsPelayanan" value="1">
                            
                            <!-- Tidak Diisi Kerena SEP Rawat Jalan -->
                            
                            <input type="hidden" name="nomr" id="nomr_sep" value="<?= $nomr ?>">
                            <!-- Informasi Rujukan -->
                            <input type="hidden" name="asalRujukan" id="asalRujukan" value="">
                            <!-- <input type="hidden" name="tglRujukan" id="tglRujukan" value=""> -->
                            <input type="hidden" name="jns_layanan" id="jns_layanan_sep" value="RJ">
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
                                            <input type="hidden" class="form-control" id="txtkdppkasalrujukan" value="<?= KODERS_VC ?>">
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
                                    <div class="form-group norujukan">
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
                                <div class="form-group" class="divKelasRawat" id="divkelasrawat">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Hak Kelas</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        
                                        <div class="input-group">
                                        <input type="hidden" name="klsRawat" id="klsRawat" class="form-control" value="">
                                            <input type="text" name="klsRawatKet" id="klsRawatKet" class="form-control" readonly value="">
                                            <span class="input-group-addon">
                                                <label><input type="checkbox" id="naikKelas" name="naikKelas" value="1" onclick="naik()"> Naik Kelas</label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="divKelasRawat" id="divnaikkelas" style="display:none">
                                    <input type="hidden" name="klsRawatNaik" id="klsRawatNaik" value="">
                                    <input type="hidden" name="pembiayaan" id="pembiayaan" value="">
                                    <input type="hidden" name="penanggungJawab" id="penanggungJawab" value="">
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

<div class="modal fade" id="form-list-kontrol" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg" style="overflow-y: initial !important">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="headRujukan">Surat Kontrol</h3>
            </div>
            <div class="modal-body">
                <div class="step" id="listkontrol" >
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <tr>
                                    <td>No</td>
                                    <th>Jns Kontrol</th>
                                    <td>NO Surat Kontrol</td>
                                    <td>Poli</td>
                                    <td>Nama Dokter</td>
                                    <td>Terbit SEP</td>
                                </tr>
                                <tbody id="datakontrol"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="step" id="formsuratkontrol" style="display:none;">
                    <form action="#"  class="form-horizontal" id="formkontrol">
                        <input type="hidden" name="jnsKontrol" id="jnsKontrol" value="1">
                        <input type="hidden" name="ktglRujukan" id="ktglRujukan" value="">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="email">No Kartu:</label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control" id="noSEP" name='noSEP' placeholder="Masukkan No SEP" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Tanggal Rencana Kontrol:</label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control datepicker" id="tglRencanaKontrol" placeholder="Masukkan rencana kontrol" onkeyup="caripoliKontrol()" onchange="caripoliKontrol()">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Poliklinik:</label>
                            <div class="col-sm-6">
                            <select name="poliKontrol" id="poliKontrol" class="form-control" onchange="dokterKontrol()" style="width:100%"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Dokter:</label>
                            <div class="col-sm-6">
                            <select name="kodeDokter" id="kodeDokter" class="form-control" style="width:100%"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-6">
                            <button type="button" class="btn btn-primary" onclick='buatSuratKontrol()'>Buat Surat Kontrol</button>
                            <button type="button" class="btn btn-danger" onclick="resetFormKontrol()">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="form-list-kontrol1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg" style="overflow-y: initial !important">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="headRujukan">Surat Kontrol</h3>
            </div>
            <div class="modal-body">
                    <form action="#"  class="form-horizontal" id="formkontrol">
                        <input type="hidden" name="jnsKontrol" id="jnsKontrol" value="1">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="email">No Kartu:</label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control" id="noSEP" name='noSEP' placeholder="Masukkan No SEP" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Tanggal Rencana Kontrol:</label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control datepicker" id="tglRencanaKontrol" placeholder="Masukkan rencana kontrol" onkeyup="caripoliKontrol()" onchange="caripoliKontrol()">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Poli Kontrol:</label>
                            <div class="col-sm-6">
                            <select name="poliKontrol" id="poliKontrol" class="form-control" onchange="dokterKontrol()" style="width:100%"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Dokter:</label>
                            <div class="col-sm-6">
                            <select name="kodeDokter" id="kodeDokter" class="form-control" style="width:100%"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-6">
                            <button type="button" class="btn btn-primary" onclick='buatSuratKontrol()'>Buat SPRI</button>
                            <button type="button" class="btn btn-danger" onclick="resetFormKontrol()">Batal</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div> -->
<!--script src="<?php //echo base_url() 
                ?>assets/bower_components/jquery/dist/jquery.js"></script-->
<script src="<?php echo base_url() ?>assets/jquery/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/jquery/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/popper/popper.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/tooltip/tooltip.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<?php if (!empty($js_lib)) echo $js_lib ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('select')
            .not('#dokter_pengirim')
            .not('#id_kelas')
            .not('#id_kamar')
            .select2({
                'placeholder':'Pilih Opsi'
            });
    });

    // Create Base64 Object
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

    // Define the string
    var string = 'Hello World!';

    // Encode the String
    var encodedString = Base64.encode(string);
    // console.log(encodedString); // Outputs: "SGVsbG8gV29ybGQh"

    // Decode the String
    var decodedString = Base64.decode(encodedString);
    // console.log(decodedString); // Outputs: "Hello World!"
    var base_url = "<?php echo base_url() . "mr_registrasi.php"; ?>";
    var url_call_back = "<?php echo base_url() . "mr_registrasi.php/"; ?>";
    var user = "<?= $this->session->userdata('get_uid') ?>";
    // cekPeserta();
</script>
<script src="<?php echo base_url() ?>js/pendaftaran.js"></script>