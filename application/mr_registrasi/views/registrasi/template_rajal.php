<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.css">
<script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery/css/jquery-ui.css">
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
            height: 800px;
            white-space: nowrap
        }
    }

    .modal-content {

        overflow-y: scroll;
        overflow-x: hidden;
        max-height: 95vh;
        white-space: nowrap
    }

    .modal-lg {
        min-width: 1200px;
    }

    a.disabled {
        pointer-events: none;
        cursor: default;
    }

    .popup-pencarian {
        position: relative;
    }

    .content-pencarian {
        display: inherit;
        position: absolute;
        top: 0px;
        left: 0px;
        z-index: 1;
        width: 100%;
        /*max-height: 500px;*/
        min-width: 700px;
        /*padding:15px;*/
        background: #fefefe;
        font-size: .875em;
        border-radius: 5px;
        box-shadow: 0 1px 3px #ccc;
        border: 1px solid #ddd;
        /*overflow:hidden;*/
        /*overflow-y: scroll;*/
        background-color: #fefefe;
    }

    .divRegCredit {
        display: none
    }

    a em {
        font-size: 10px;
    }

    fieldset legend {
        text-transform: uppercase;
        font-weight: bolder;
    }
    .form-group {
    margin-bottom: 5px;
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

    .select2-container *:focus {
        outline: none;
        border: 1px solid #367fa9;
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs nav-pills">
                <li class="active"><a data-toggle="tab" href="#pendaftaran">Pendaftaran</a></li>
                <li><a data-toggle="tab" href="#editpasien">Edit Pasien</a></li>
                <li><a data-toggle="tab" href="#riwayatkunjunganpasien" onclick="getHistoryPasien()">Riwayat</a></li>
            </ul>

            <div class="tab-content">
                <div id="pendaftaran" class="tab-pane fade in active">
                    <section class="">
                        <div class="row">
                            <div class="col-md-3 col-xs-12">
                                <div class="box box-widget widget-user-2">
                                    <div class="bg-aqua-active" style="padding:10px;">
                                        <h4 id="lblnama"><?= $nama ?></h4>
                                        <p id="lblnoka"><?= $no_bpjs?></p>

                                    </div>

                                    <div class="box-body">
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a title="Profile Peserta" href="#tab_1" data-toggle="tab"><span class="fa fa-user"></span></a></li>
                                                <li><a href="#tab_2" title="Rujukan Online" data-toggle="tab" onclick="allrujukan(1); allrujukan(2)"><span class="fa fa-building"></span></a></li>
                                                <li><a href="#tab_3" title="Riwayat" data-toggle="tab" onclick='riwayatKunjunganPeserta()'><span class="fa fa-list"></span></a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_1">
                                                    <ul class="list-group list-group-unbordered">
                                                        <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-md-4">No MR </div>
                                                            <div class="col-md-8">: <?= $nomr ?></div>
                                                        </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-md-4">No KTP </div>
                                                            <div class="col-md-8">: <?= $no_ktp ?></div>
                                                        </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-md-4">Nama </div>
                                                            <div class="col-md-8">: <?= $nama ?></div>
                                                        </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-md-4">TTL </div>
                                                            <div class="col-md-8">: <?= $tempat_lahir ." / " .$tgl_lahir ?></div>
                                                        </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-md-4">Jns Kelamin </div>
                                                            <div class="col-md-8">: <?= ($jns_kelamin == '1' || $jns_kelamin == "L") ? 'Laki-Laki' : 'Perempuan'; ?></div>
                                                        </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-md-4">Tgl Layanan </div>
                                                            <div class="col-md-8">: <?= date('Y-m-d') ?></div>
                                                        </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-md-4">Tgl Layanan </div>
                                                            <div class="col-md-8">: RJ </div>
                                                        </div>
                                                        </li>
                                                        <!-- <li class="list-group-item">
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

                                                        </li> -->

                                                    </ul>
                                                </div>
                                                <!-- /.tab-pane -->
                                                <div class="tab-pane" id="tab_2">
                                                    <div id="tunggu"></div>
                                                    <ul class="list-group list-group-unbordered" id="list_rujukan_faskes1">
                                        
                                                    </ul>
                                                    <ul class="list-group list-group-unbordered" id="list_rujukan_faskes2">
                                                        
                                                    </ul>
                                                    <ul class="list-group list-group-unbordered" style="display: none;">
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
                            <div class="col-xs-9">
                                <div class="box">
                                    <ul class="nav nav-tabs nav-pills">
                                        <li class="registrasi registrasipasien active"><a data-toggle="tab" href="#registrasipasien">Registrasi Pasien</a></li>
                                        <li class="registrasi formcreatesep"><a data-toggle="tab" href="#formcreatesep">Create SEP BPJS</a></li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="registrasipasien" class="tab-pane registrasipasien registrasi fade in active">
                                            <form id="form1" class="form-horizontal" action="<?php echo base_url() . 'mr_registrasi.php/registrasi/daftar_rajal' ?>" method="POST">
                                                <div class="box-body">
                                                    <?php
                                                    //echo "Ranap : " .$ranap;
                                                    if (!empty($dpo)) {
                                                    ?>
                                                        <div class="col-md-12">
                                                            <div class="alert alert-warning alert-dismissible">
                                                                <p>Maaf pasien belum bisa didaftarkan karena masih terdaftar sebagai pasien DPO Karena <br>
                                                                <b><?= $dpo->keterangan  ?></b><br>
                                                                jika permasalahan pasien sudah selesai silahkan klik <a href="#" onclick="editDpo(<?= $dpo->Id ?>)">Disini</a> untuk m,engubah status dpo
                                                                </p>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }else{
                                                        // echo $status_pasien;
                                                        if(empty($status_lengkap)){
                                                            ?>
                                                            <div class="col-md-12">
                                                                <div class="alert alert-warning alert-dismissible">
                                                                    <p>Data pasien belum lengkap, untuk melengkapi data pasien silahkan buka tab edit pasien<br>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    
                                                    ?>
                                                    <div class="col-md-12">
                                                    <input type="hidden" name="kodebooking" id="kodebooking" value="<?= $kodebooking ?>">
                                                        <fieldset style="display: none;">
                                                            <legend>Data Pasien</legend>
                                                            <input type="hidden" name="provinsi" id="provinsi" value="<?= $nama_provinsi ?>">
                                                            <input type="hidden" name="kabupaten" id="kabupaten" value="<?= $nama_kab_kota ?>">
                                                            <input type="hidden" name="kecamatan" id="kecamatan" value="<?= $nama_kecamatan ?>">
                                                            <input type="hidden" name="kelurahan" id="kelurahan" value="<?= $nama_kelurahan ?>">
                                                            <input type="hidden" name="id_provinsi" id="id_provinsi" value="<?= $id_provinsi ?>">
                                                            <input type="hidden" name="id_kab_kota" id="id_kab_kota" value="<?= $id_kab_kota ?>">
                                                            <input type="hidden" name="id_kecamatan" id="id_kecamatan" value="<?= $id_kecamatan ?>">
                                                            <input type="hidden" name="id_kelurahan" id="id_kelurahan" value="<?= $id_kelurahan ?>">
                                                            <input type="hidden" name="alamatktp" id="alamatktp" value="<?= $alamat ?>">
                                                            <input type="hidden" name="rt" id="rt" value="<?= $rt ?>">
                                                            <input type="hidden" name="rw" id="rw" value="<?= $rw ?>">
                                                            <input type="hidden" name="kodepos" id="kodepos" value="<?= $kodepos ?>">

                                                            <input type="hidden" name="provinsi_domisili" id="provinsi_domisili" value="<?= $nama_provinsi_domisili ?>">
                                                            <input type="hidden" name="kabupaten_domisili" id="kabupaten_domisili" value="<?= $nama_kab_kota_domisili ?>">
                                                            <input type="hidden" name="kecamatan_domisili" id="kecamatan_domisili" value="<?= $nama_kecamatan_domisili ?>">
                                                            <input type="hidden" name="kelurahan_domisili" id="kelurahan_domisili" value="<?= $nama_kelurahan_domisili ?>">

                                                            <input type="hidden" name="id_provinsi_domisili" id="id_provinsi_domisili" value="<?= $id_provinsi_domisili ?>">
                                                            <input type="hidden" name="id_kab_kota_domisili" id="id_kab_kota_domisili" value="<?= $id_kab_kota_domisili ?>">
                                                            <input type="hidden" name="id_kecamatan_domisili" id="id_kecamatan_domisili" value="<?= $id_kecamatan_domisili ?>">
                                                            <input type="hidden" name="id_kelurahan_domisili" id="id_kelurahan_domisili" value="<?= $id_kelurahan_domisili ?>">
                                                            <input type="hidden" name="alamat_domisili" id="alamat_domisili" value="<?= $alamat_domisili ?>">
                                                            <input type="hidden" name="rt_domisili" id="rt_domisili" value="<?= $rt_domisili ?>">
                                                            <input type="hidden" name="rw_domisili" id="rw_domisili" value="<?= $rw_domisili ?>">
                                                            <input type="hidden" name="kodepos_domisili" id="kodepos_domisili" value="<?= $kodepos_domisili ?>">
                                                            <input type="hidden" name="pjPasienUmur" id="pjPasienUmur" value="<?= $umur_pj ?>">
                                                            
                                                            <input type="hidden" name="bulan" id="bulan" value="<?= date('m') ?>">
                                                            <input type="hidden" name="tahun" id="tahun" value="<?= date('Y') ?>">

                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No MR / Nama Pasien</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <div class="input-group">
                                                                        <input readonly="" type="text" class="form-control input-sm" name="nomr" id="nomr" value="<?php echo $nomr; ?>">
                                                                        <span class="input-group-addon" style="width:250px">
                                                                            <?php echo $nama; ?>
                                                                            <input type="hidden" name="nama" id="nama" value="<?php echo $nama; ?>">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No KTP <label style="color:gray;font-size:x-small">(<em>NIK/Passport</em>)</label></label>
                                                                <div class="col-md-5 col-sm-5 col-xs-12">
                                                                    <input readonly="" name="no_ktp" id="no_ktp" type="text" class="form-control input-sm" value="<?php echo $no_ktp; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tempat/Tgl.Lahir</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <div class="input-group">
                                                                        <input type="hidden" name="tgl_daftar" id="tgl_daftar" value="<?= $tgl_daftar ?>">
                                                                        <input readonly="" type="text" name="tempat_lahir" id="tempat_lahir" class="form-control input-sm" value="<?php echo $tempat_lahir; ?>">
                                                                        <input type="hidden" name="tgl_lahir" id="tgl_lahir" value="<?php echo $tgl_lahir; ?>">
                                                                        <span class="input-group-addon">
                                                                            <?php echo setDateInd($tgl_lahir); ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Alamat</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <input type="text" id="privalamat" name="privalamat" class="form-control input-sm" value="<?= $alamat ." RT ".$rt ." RW ".$rw ?>" readonly>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Jenis Kelamin</label>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <input type="hidden" name="jns_kelamin" id="jns_kelamin" value="<?php echo $jns_kelamin; ?>">
                                                                    <input readonly="" type="text" class="form-control input-sm" value="<?php echo ($jns_kelamin == '1' || $jns_kelamin == "L") ? 'Laki-Laki' : 'Perempuan'; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">
                                                                    <label style="color:gray;font-size:x-small">(dd/mm/yyyy)</label> Tgl.Layanan</label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="input-group date">
                                                                        <input readonly="" type="text" name="tgl_layanan" class="form-control input-sm" id="tgl_layanan">
                                                                        <input type="hidden" name="sekarang" id="sekarang" value="<?= date('Y-m-d') ?>">
                                                                        <span class="input-group-addon">
                                                                            <span class="fa fa-calendar"></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Jenis Layanan</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <div class="input-group">
                                                                        <input readonly="" name="jns_layanan" id="jns_layanan" type="text" class="form-control input-sm" value="RJ">
                                                                        <span class="input-group-addon">
                                                                            <input type="checkbox" name="sdm" id="sdm" value="1" <?php if($sdmrs==1) echo 'checked' ?>> SDM RS
                                                                        </span>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <legend>Informasi Pelayanan</legend>
                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Cara Bayar</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <div class="input-group">
                                                                        <select class="form-control input-sm select" name="id_cara_bayar" id="id_cara_bayar" onkeydown="enter_carabayar(event)">
                                                                            <option value=""></option>
                                                                            <?php foreach ($getCaraBayar->result_array() as $xCB) : ?>
                                                                                <option value="<?php echo $xCB['idx'] ?>"><?php echo $xCB['cara_bayar'] ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                        <input type="hidden" name="jkn" id='jkn' value='0'>


                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group divRegCredit">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No Peserta (<em>No BPJS</em>)</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <div class="input-group">
                                                                        <input name="no_bpjs" id="no_bpjs" type="text" class="form-control input-sm" value="<?php echo $no_bpjs; ?>" onkeydown="enter_nobpjs(event)">
                                                                        <input type="hidden" name="status_peserta" id="status_peserta" value="">
                                                                        <span class="input-group-addon">
                                                                            <a id="btnUpdateNoBPJS" href="Javascript:updateNoBPJS()"><i class="fa fa-save"></i> Update</a>
                                                                        </span>
                                                                        <span class="input-group-addon" id="status">
                                                                            <a id="cekStatus" href="Javascript:cekPeserta()"><i class="fa fa-search" id="iconCekStatus"></i> Cek</a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group" style="display: none;">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Jenis Peserta</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon" style="width:10px;padding:0px;">
                                                                            <input type="text" name="id_jenis_peserta" id='id_jenis_peserta' class='form-control input-sm' readonly value=''>
                                                                        </span>
                                                                        <span class="input-group-addon" style="width:90px;padding:0px;">
                                                                            <input type="text" name="jenis_peserta" id='jenis_peserta' class="form-control input-sm" readonly value=''>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">

                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Rujukan</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <div class="input-group">
                                                                        <select class="form-control input-sm select" name="id_rujuk" id="id_rujuk">
                                                                            <option value=""></option>
                                                                            <?php foreach ($getRujukan->result_array() as $xR) : ?>
                                                                                <option value="<?php echo $xR['idx'] ?>"><?php echo $xR['rujukan'] ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                        <!-- <input type="hidden" id="faskes" name='faskes' value="1"> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="faskesperujuk"></div>
                                                            <div class="form-group adarujukan">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No Rujukan</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <div class="input-group ">
                                                                        <input type="text" id="txtNorujuk" name="txtNorujuk" class="form-control input-sm" placeholder="Enter Nomor Rujukan" onkeyup="enter_norujukan(event)">
                                                                        <input type="hidden" name="encryptdata" id='encryptdata' value=''>
                                                                        <div class="input-group-btn" id="aksirujukan">
                                                                            <button type="button" id="cariRujukan" class="btn btn-default btn-sm" <?php if (STATUS_VC == "0") echo "disabled";
                                                                                                                                            else echo 'onclick="getListRujukan()"' ?>>
                                                                                <i class="fa fa-search" id="iconcariRujukan"></i> Cari Rujukan</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group kontrolulang">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No Surat Kontrol</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <div class="input-group ">
                                                                        <input type="text" id="no_suratkontrol" name="no_suratkontrol" class="form-control input-sm" placeholder="Enter Nomor Surat Kontrol" onkeyup="enter_nokontrol(event)">
                                                                        <input type="hidden" name="kd" id="kd">
                                                                        <input type="hidden" name="nd" id="nd">
                                                                        <div class="input-group-btn"  id="btnKontrol" >
                                                                            <button type="button" id="cariKontrol" class="btn btn-default" <?php if (STATUS_VC == "0") echo "disabled";
                                                                                                                                            else echo 'onclick="getListKontrol()"' ?>>
                                                                                <i class="fa fa-search" id="iconCariKontrol"></i> Cari Surat Kontrol</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group" style="display: none;">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Dikirim Oleh<br><em>Jika pasien rujukan</em></label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12 pengirim" onkeydown="enter_pengirim(event)">

                                                                    <?php
                                                                    if (STATUS_VC == "0") {
                                                                    ?>
                                                                        <select class="form-control input-sm" id="id_pengirim" name="id_pengirim" onchange="pilihPengirim()"></select>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <input type="hidden" name="id_pengirim" id="id_pengirim">
                                                                        <input type="text" name="pjPasienDikirimOleh" id="pjPasienDikirimOleh" class="form-control input-sm">
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="pengirim" id="lainnya" style="display: none;"><input name="pjPasienDikirimOleh" id="pjPasienDikirimOleh" type="text" class="form-control input-sm" onkeydown="enter_pengirim1(event)"> </div>
                                                            </div>
                                                            <div class="form-group" style="display: none;">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Alamat Pengirim<br><em>Jika pasien rujukan</em></label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <input type="text" class="form-control input-sm" name="pjPasienAlmtPengirim" id="pjPasienAlmtPengirim" onkeydown="enter_alamatpengirim(event)">
                                                                    <!--textarea name="pjPasienAlmtPengirim" id="pjPasienAlmtPengirim" class="form-control input-sm" rows="2" maxlength="255"></textarea-->
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tujuan Layanan</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <div class="input-group">
                                                                        <?php 
                                                                        // print_r($booking); 
                                                                        if(!empty($booking)){
                                                                            $id=getField('idx',array('grid_lama'=>$booking['grId']),'tbl01_ruang');
                                                                            // echo "ID    ".$id;
                                                                        }else $id="";
                                                                        ?>
                                                                        <select class="form-control input-sm select" name="id_ruang" id="id_ruang" onkeydown="enter_ruangan(event)" onchange="getDokter()">
                                                                            <option value=""></option>
                                                                            <?php foreach ($getPoli->result_array() as $xP) : ?>
                                                                                <option value="<?php echo $xP['idx'] ?>" <?php if($xP['idx']==$id) echo "selected" ?>><?php echo $xP['ruang'] ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Dokter</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <div class="input-group">
                                                                        <select class="form-control input-sm select" name="dokterJaga" id="dokterJaga" onkeydown="enter_dokter(event)">
                                                                            <option value="">Pilih Dokter</option>
                                                                            <?php 
                                                                            if(!empty($dokter)){
                                                                                foreach ($dokter as $d ) {
                                                                                    ?>
                                                                                    <option value="<?= $d->NRP ?>"><?= $d->pgwNama ?></option>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <input type="hidden" name="groupantri" id="groupantri" value="">
                                                                    <input type="hidden" name="kodepoli" id="kodepoli" value="">
                                                                    <input type="hidden" name="namapoli" id="namapoli" value="">
                                                                    <input type="hidden" name="kodedokter" id="kodedokter" value="">
                                                                    <input type="hidden" name="namadokter" id="namadokter" value="">
                                                                    <input type="hidden" name="jampraktek" id="jampraktek" value="">
                                                                    <input type="hidden" name="kuotajkn" id="kuotajkn" value="">
                                                                    <input type="hidden" name="kuotanonjkn" id="kuotanonjkn" value="">
                                                                </div>
                                                            </div>
                                                            <?php
                                                            if (STATUS_VC == "0") {
                                                            ?>
                                                                <div class="form-group divRegCredit">
                                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">No Jaminan (<em>SEP</em>)</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <div class="input-group">
                                                                            <input name="no_jaminan" id="no_jaminan" type="text" class="form-control input-sm">
                                                                            <input name="tgl_jaminan" id="tgl_jaminan" type="hidden" class="form-control input-sm" value='<?= date('Y-m-d')?>'>
                                                                            <span class="input-group-addon">
                                                                                <input type="checkbox" id="chkIsJaminan" value='1' checked /> Format SEP
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <div class="form-group divRegCredit">
                                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">No Jaminan (<em>SEP</em>)</label>
                                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                                        <div class="input-group ">
                                                                            <input name="no_jaminan" id="no_jaminan" type="text" class="form-control input-sm" onkeydown="controlSEP(event)">
                                                                            <input name="tgl_jaminan" id="tgl_jaminan" type="hidden" class="form-control input-sm"  value='<?= date('Y-m-d')?>'>
                                                                            <div class="input-group-btn" id='prosessep'>
                                                                                <!-- <a href="Javascript:formSEP()" id="btnCreateSep" class="btn btn-sm btn-danger"><span class="fa fa-plus" id="iconbtnCreateSep"></span> Create SEP (<em>Bridging</em>)</a> -->
                                                                                <a href="Javascript:showFormSEP()" id="btnCreateSep" class="btn btn-sm btn-danger"><span class="fa fa-plus" id="iconbtnCreateSep"></span> Create SEP (<em>Bridging</em>)</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">ICD</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <div class="input-group">
                                                                        <input type="hidden" name="kodeicd" id='kodeicd' class="form-control input-sm" value=''>
                                                                        <input type="text" name="nama_icd" id='nama_icd' class='form-control input-sm' value=''>
                                                                        <span class="input-group-addon">
                                                                            <input type="checkbox" name="c19" id="c19" value="1"> Covid 19
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--div class="form-group divRegCredit">
                                                                <div class="col-md-offset-4 col-md-8 col-sm-8 col-xs-12">
                                                                    <div class="input-group">
                                                                <a id="btnCekSEP" href="Javascript:cekSEP()" class="btn btn-danger">Cek SEP (<em>JKN Bridging</em>)</a>
                                                                
                                                                    </div>                                        
                                                                </div>
                                                            </div-->
                                                            
                                                        </fieldset>
                                                        <fieldset>
                                                            <legend>Penanggung Jawab Pasien</legend>
                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Nama</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <input name="pjPasienNama" id="pjPasienNama" type="text" class="form-control input-sm" value="<?= $penanggung_jawab ?>" onkeydown="enter_pjnama(event)">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Pekerjaan</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <input name="pjPasienPekerjaan" id="pjPasienPekerjaan" type="text" value="<?= $pekerjaan_pj ?>" class="form-control input-sm" onkeydown="enter_pjpekerjaan(event)">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Alamat</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                    <input type="text" name="pjPasienAlamat" id="pjPasienAlamat" class="form-control input-sm" onkeydown="enter_pjalamat(event)" value="<?= $alamat_pj ?>">

                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Telp/HP</label>
                                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                                <?php 
                                                                if (!empty($pj)) {
                                                                    $notelp = $pj->no_telp;
                                                                    if($notelp=="0{3,24}") $notelp="0";
                                                                }
                                                                else $notelp = $no_penanggung_jawab 
                                                                ?>
                                                                    <input name="pjPasienTelp" id="pjPasienTelp" type="text" value="<?= $no_penanggung_jawab ?>" class="form-control input-sm" onkeydown="enter_pjtelp(event)">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Hubungan Keluarga</label>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <input name="pjPasienHubKel" id="pjPasienHubKel" type="text" value="<?= $hub_keluarga ?>" class="form-control input-sm" onkeydown="enter_pjhubungan(event)">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-sm-offset-3 col-sm-12">
                                                                    <div class="input-group">
                                                                        <button type="button" id="batal" class="btn btn-danger">
                                                                            <i class="fa fa-rotate-left"></i> Batal</button>
                                                                        <button type="button" id="daftar" class="btn btn-primary" <?php if (!empty($dpo)) echo "disabled" ?>>
                                                                            Daftar <i class="fa fa-arrow-right" id="iconDaftar"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>

                                                    <!-- <div class="col-md-6">
                                                        

                                                        
                                                    </div> -->
                                                </div>
                                            </form>
                                        </div>
                                        <div id="formcreatesep" class="tab-pane formcreatesep registrasi">
                                            <form class="form-horizontal" id="theform" style="font-size:12px">
                                                <div class="row">
                                                    <div id="warningprb"></div>

                                                    <div class="col-md-12 col-xs-12">
                                                        <input type="hidden" name="idx" id="idx" value="">
                                                        <input type="hidden" name="noKartu" id="noKartu" value="<?= $no_bpjs ?>">
                                                        <input type="hidden" name="ppkPelayanan" id="ppkPelayanan" value="<?= KODERS_VC ?>">
                                                        <input type="hidden" name="jnsPelayanan" id="jnsPelayanan" value="2">
                                                        <input type="hidden" name="klsRawat" id="klsRawat" value="">
                                                        <!-- Tidak Diisi Kerena SEP Rawat Jalan -->
                                                        <input type="hidden" name="klsRawatNaik" id="klsRawatNaik" value="">
                                                        <input type="hidden" name="pembiayaan" id="pembiayaan" value="">
                                                        <input type="hidden" name="penanggungJawab" id="penanggungJawab" value="">
                                                        <input type="hidden" name="nomr" id="nomr_sep" value="<?= $nomr ?>">
                                                        <!-- Informasi Rujukan -->
                                                        
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
                                                                        <input type="text" class="form-control input-sm ui-autocomplete-input" id="txtnmpoli" maxlength="10" placeholder="ketik kode atau nama Spesialis/Subspesialis min 3 karakter">
                                                                        <input type="hidden" class="form-control input-sm" name="tujuan" id="tujuan" value="">
                                                                        <input type="hidden" class="form-control input-sm" name="tujuanRujukan" id="tujuanRujukan" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tujuan Kunjungan <label style="color:red;font-size:small">*</label></label>
                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                
                                                                    <select class="form-control input-sm " id="tujuanKunj" name="tujuanKunj" style="width:100%" onchange="cekTujuanKunjungan()">
                                                                        <option value="-">-- Silahkan Pilih --</option>
                                                                        <option value="0" title="Normal" selected>Normal</option>
                                                                        <option value="1" title="Prosedur">Prosedur</option>
                                                                        <option value="2" title="Konsul Dokter">Konsul Dokter</option>
                                                                    </select>
                                                                </div>
                                                            </div> -->
                                                            <input type="hidden" name="jmlsep" id="jmlsep" value="0">
                                                            <input type='hidden' id='tujuanKunj' name='tujuanKunj' value='0'>
                                                            <div id="prosedure1"><input type='hidden' id='flagProcedure' name='flagProcedure' value=''></div>
                                                            <div id="penunjang1"><input type='hidden' id='kdPenunjang' name='kdPenunjang' value=''></div>
                                                            <div id="asesmen1"><input type='hidden' id='assesmentPel' name='assesmentPel' value=''></div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Dokter Yang Menangani <label style="color:red;font-size:small">*</label></label>
                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                    <!--input type="text" class="form-control input-sm ui-autocomplete-input" id="txtnmDokter" placeholder="ketik nama dokter Yang menangini">
                                                                    <input type="hidden" id="kodeDokter" value=""-->
                                                                    <select name="dpjpLayan" id="dpjpLayan" class="form-control input-sm" style="width: 100%;">

                                                                    </select>
                                                                    <span class="text-error"></span>
                                                                </div>
                                                            </div>
                                                            <div id="divRujukan">
                                                                <div class="form-group">
                                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Asal Rujukan</label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <select class="form-control input-sm" id="cbasalrujukan" disabled="">
                                                                            <option value="1">Faskes Tingkat 1</option>
                                                                            <option value="2">Faskes Tingkat 2</option>
                                                                        </select>
                                                                        <input type="hidden" name="asalRujukan" id="asalRujukan" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">PPK Asal Rujukan <label style="color:red;font-size:small">*</label></label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input type="text" class="form-control input-sm ui-autocomplete-input" id="txtppkasalrujukan" placeholder="ketik kode atau nama ppk asal rujukan min 3 karakter" readonly="">
                                                                        <input type="hidden" class="form-control input-sm" id="txtkdppkasalrujukan" value="03050101">
                                                                        <input type="hidden" name="ppkRujukan" id="ppkRujukan" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label"><label style="color:gray;font-size:x-small">(yyyy-mm-dd)</label> Tgl.Rujukan</label>
                                                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                                                        <div class="input-group date">
                                                                            <input type="text" class="form-control input-sm datepicker" name='tglRujukan' id="tglRujukan" placeholder="yyyy-MM-dd" maxlength="10" readonly>
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
                                                                        <input type="text" class="form-control input-sm" id="noRujukan" name="noRujukan" placeholder="ketik nomor rujukan" maxlength="19" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- kontrol -->
                                                            <div id="divkontrol" class='divkontrol' style="display: block;">
                                                                
                                                                <div class="form-group">
                                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label" id="lblkontrol">No.Surat Kontrol/SKDP <label style="color:red;font-size:small">*</label></label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <div class="input-group ">
                                                                            <input type="text" class="form-control input-sm" id="noSurat" maxlength="25" placeholder="ketik nomor surat kontrol" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6">
                                                                            <input type="hidden" id="txtidkontrol" value="1">
                                                                            <input type="hidden" id="noSuratlama" value="">
                                                                            <input type="hidden" id="txtpoliasalkontrol" value="">
                                                                            <input type="hidden" id="txttglsepasalkontrol" value="">
                                                                            <div class="input-group-btn"  id="btnKontrol" >
                                                                                <button type="button" id="cariKontrol" class="btn btn-default" <?php if (STATUS_VC == "0") echo "disabled";
                                                                                                                                                else echo 'onclick="getListKontrol()"' ?>>
                                                                                    <i class="fa fa-search" id="iconCariKontrol"></i> Cari Surat Kontrol</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">DPJP Pemberi Surat SKDP/SPRI <label style="color:red;font-size:small">*</label></label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <!--input type="text" class="form-control input-sm ui-autocomplete-input" id="txtnmdpjp" placeholder="ketik nama dokter DPJP Pemberi Surat SKDP/SPRI">
                                                                        <input type="hidden" id="kodeDPJP" value=""-->
                                                                        <select name="kodeDPJP" id="kodeDPJP" class="form-control input-sm" style="width: 100%;">

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
                                                                        <input type="text" class="form-control input-sm datepicker" id="tglSep" name="tglSep" placeholder="yyyy-MM-dd" maxlength="10" value="<?= date('Y-m-d') ?>" readonly >
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
                                                                        <input type="text" class="form-control input-sm" id="noMr" name='noMr' placeholder="ketik nomor MR" maxlength="10">
                                                                        <span class="input-group-addon">
                                                                            <label><input type="checkbox" id="cob" name="cob" value='1'> Peserta COB</label>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group" id="divkelasrawat" style="display: none;">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Kelas Rawat</label>
                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                    <select class="form-control input-sm" id="cbKelas">
                                                                        <option value="3">Kelas 3</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Diagnosa <label style="color:red;font-size:small">*</label></label>
                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                    <input type="text" class="form-control input-sm" id="txtnmdiagnosa" maxlength="10" placeholder="ketik kode atau nama diagnosa min 3 karakter">
                                                                    <label id="lblDxSpesialistik" style="color: red; display: none;"></label>
                                                                    <input type="hidden" name="diagAwal" id="diagAwal" value="">
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. Telepon <label style="color:red;font-size:small">*</label></label>
                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                    <input type="text" class="form-control input-sm" id="noTelp" name="noTelp" placeholder="ketik nomor telepon yang dapat dihubungi"  maxlength="15">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Catatan</label>
                                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                                    <textarea class="form-control input-sm" id="catatan" rows="2" placeholder="ketik catatan apabila ada"></textarea>
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
                                                                    <select class="form-control input-sm " id="lakaLantas" onchange="lakalantas()">
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
                                                                            <input type="text" class="form-control input-sm datepicker" id="txtTglKejadian" name="tglKejadian" placeholder="yyyy-MM-dd" maxlength="10">
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
                                                                            <input type="text" class="form-control input-sm" id="noSepSuplesi" name="noSepSuplesi" readonly placeholder="ketik nomor SEP Suplesi">


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Lokasi Kejadian</label>
                                                                    <div class="col-md-7 col-sm-7 col-xs-12">

                                                                        <select class="form-control input-sm" id="cbprovinsi" name="cbprovinsi" onchange="getKabupaten()">
                                                                            <option value="">-- Silahkan Pilih Propinsi --</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label"></label>
                                                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                                                        <select class="form-control input-sm" id="cbkabupaten" onchange="getKecamatan()"></select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label"></label>
                                                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                                                        <select class="form-control input-sm" id="cbkecamatan"></select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Keterangan Kejadian</label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <textarea class="form-control input-sm" id="txtketkejadian" name="keterangan" rows="2" placeholder="ketik keterangan kejadian"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end lakalantas-->
                                                            
                                                        </div>
                                                        <div class="box-footer">
                                                            <div id="divSimpan" style="display: block;">
                                                                <button type="button" style="margin-left:10px;" id="btnSimpan" class="btn btn-success pull-right" onclick="asesmenSep()"><i class="fa fa-save"></i> Simpan</button>
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
                        </div>
                    </section>
                </div>
                <div id="editpasien" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-body table-responsive">
                                    <form id="formedit" class="form-horizontal" role="form" onsubmit="return false">
                                        
                                        <div class="col-md-8">
                                            <fieldset>
                                                <legend>Biodata Pasien</legend>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="email">No MR [<em>Kode Auto Generate</em>]</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" name="idx" id="e-idx" value="<?php echo $idx ?>">
                                                        <input readonly type="text" class="form-control input-sm" name="nomr" id="e-nomr" value="<?php echo $nomr ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">No KTP (NIK / Passport)</label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-sm" name="no_ktp" id="e-no_ktp" value="<?php echo $no_ktp ?>" onkeydown="enter_noktp(event)">
                                                            <input type="hidden" name="sekarang" id="e-sekarang" value="<?= date('Y-m-d') ?>">
                                                            <input type="hidden" name="booking" id="e-booking" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="control-label col-sm-4" >No BPJS (<em>Jika Pasien Peserta BPJS Kesehatan</em>)</label>
                                                    <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input name="no_bpjs" id="e-no_bpjs" type="text" class="form-control input-sm" value="<?php echo $no_bpjs ?>">
                                                        <!-- <span class="input-group-addon statusjkn" id="e-status">
                                                                <a id="e-cekStatus" href="Javascript:ceknomorbpjs(1)"><i class="fa fa-search" id="e-iconCekStatus"></i> Cek</a>
                                                        </span> -->
                                                        
                                                    </div>
                                                    </div>
                                                    <!--input type="text" class="form-control input-sm" name="no_bpjs" id="e-no_bpjs" value="<?php echo $no_bpjs ?>" onkeydown="enter_bpjs(event)"-->
                                                </div>
                                                <div class="form-group bpjs">
                                                    <label  class="control-label col-sm-4" >Jenis Peserta (<em>Jika Pasien Peserta BPJS Kesehatan</em>)</label>
                                                    <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input name="id_jenis_peserta" id="e-id_jenis_peserta" type="hidden" class="form-control input-sm" value="<?php echo $id_jenis_peserta ?>">
                                                        <input name="jenis_peserta" id="e-jenis_peserta" type="text" class="form-control input-sm" value="<?php echo $jenis_peserta ?>" readonly>

                                                        
                                                    </div>
                                                    </div>
                                                    <!--input type="text" class="form-control input-sm" name="no_bpjs" id="e-no_bpjs" value="<?php echo $no_bpjs ?>" onkeydown="enter_bpjs(event)"-->
                                                </div>
                                                <div class="form-group bpjs">
                                                    <label class="control-label col-sm-4" >PPK (<em>Jika Pasien Peserta BPJS Kesehatan</em>)</label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group">
                                                            <input name="kodeppk" id="e-kodeppk" type="hidden" class="form-control input-sm" value="<?php echo $kodeppk ?>">
                                                            <input name="namappk" id="e-namappk" type="text" class="form-control input-sm" value="<?php echo $namappk ?>" readonly>

                                                            
                                                        </div>
                                                    </div>
                                                    <!--input type="text" class="form-control input-sm" name="no_bpjs" id="e-no_bpjs" value="<?php echo $no_bpjs ?>" onkeydown="enter_bpjs(event)"-->
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" >Nama Pasien <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control input-sm" name="nama" id="e-nama" value="<?php echo $nama ?>" onkeydown="enter_nama(event)">
                                                    <div class="text-error" id="err_nama"></div>    
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="control-label col-sm-4" >Tempat Lahir / DOB <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control input-sm" name="tempat_lahir" id="e-tempat_lahir" value="<?php echo $tempat_lahir ?>" >
                                                        <div class="input-group-btn" style="width: 30%">
                                                            <input type="text" class="form-control input-sm" name="tgl_lahir" id="e-tgl_lahir" placeholder="__/__/____" value="<?php if(!empty($tgl_lahir)) echo setDateInd($tgl_lahir) ?>">
                                                        </div>
                                                    </div>
                                                    <div class="text-error" id="err_ttl"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" >Jenis Kelamin</label>
                                                    <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <select name="jns_kelamin"  class="form-control input-sm" id="e-jns_kelamin">
                                                            <option value="4" <?=  ($jns_kelamin == "4") ? "selected" : "" ?>>Tidak Mengisi</option>
                                                            <option value="0" <?=  ($jns_kelamin == "0") ? "selected" : "" ?>>Tidak Diketahui</option>
                                                            <option value="1" <?= ($jns_kelamin == "L" || $jns_kelamin == "1") ? "selected" : ""; ?>>Laki-Laki</option>
                                                            <option value="2" <?= ($jns_kelamin == "P" || $jns_kelamin == "2") ? "selected" : "" ?>>Perempuan</option>
                                                            <option value="3" <?=  ($jns_kelamin == "3") ? "selected" : "" ?>>Tidak Dapat Ditentukan</option>
                                                        </select>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" >Agama</label>
                                                    <div class="col-sm-8">
                                                    <select name="agama" id="e-agama" class="form-control input-sm">
                                                        <?php foreach ($getAgama->result_array() as $xAG) : ?>
                                                            <option  value="<?php echo $xAG['idx'] ?>" <?= (!empty($id_agama) ? ($id_agama == $xAG['idx'] ? "selected" : ''):'') ?>><?php echo $xAG['agama'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Pendidikan</label>
                                                    <div class="col-sm-8">
                                                    <select name="form-control input-sm" id="e-pendidikan" class="form-control input-sm">
                                                        <?php 
                                                        foreach ($pendidikan as $p ) {
                                                            ?>
                                                            <option value="<?= $p->id_tk_pddkn ?>" <?= (!empty($id_tk_pddkn) ? ($id_tk_pddkn == $p->id_tk_pddkn ? "selected" : ''):'') ?>><?= $p->nama_tk_pddkn ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                <?php if(empty($id_pekerjaan)) $id_pekerjaan="";?>
                                                    <label class="control-label col-sm-4">Pekerjaan</label>
                                                    <div class="<?php if($id_pekerjaan==5) echo 'col-md-4'; else echo "col-md-8"; ?>"  id="e-divpekerjaan">
                                                        
                                                        <select name="pekerjaan" id="e-pekerjaan" class="form-control input-sm" >
                                                            <?php 
                                                            foreach ($getPekerjaan->result() as $p ) {
                                                                ?>
                                                                <option value="<?= $p->pekerjaan_id?>" <?= (!empty($id_pekerjaan) ? ($id_pekerjaan == $p->pekerjaan_id ? "selected" : ''):'') ?>><?= $p->pekerjaan_nama ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    <!-- <input type="text" class="form-control input-sm" name="pekerjaan" id="e-pekerjaan" value="<?php echo $pekerjaan ?>"> -->
                                                    </div>
                                                    <div id="e-divlainnya" class="col-md-4" style="<?php if($id_pekerjaan==5) echo 'display: block;'; else echo "display: none;"; ?>">
                                                        <input type="text" class="form-control input-sm" name="pekerjaanlain" id="e-pekerjaanlain" value="<?php echo (!empty($pekerjaan) ? $pekerjaan : '') ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Status</label>
                                                    <div class="col-sm-8">
                                                    <select name="status_kawin" id="e-status_kawin" class="form-control input-sm" >
                                                        <option value="">Pilih</option>
                                                        <?php foreach ($getStatus->result_array() as $xSk) : ?>
                                                            <option <?= (!empty($id_status_kawin) ? ($id_status_kawin == $xSk['Id'] ? "selected" : ''):'') ?> value="<?php echo $xSk['Id'] ?>"><?php echo $xSk['status'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Etnis</label>
                                                    <div class="col-sm-8">
                                                    <select name="suku" id="e-suku" class="form-control input-sm" style="width: 100%;">
                                                        <option value="">Pilih</option>
                                                        <?php foreach ($getSuku->result_array() as $xSk) : ?>
                                                            <option <?= (!empty($id_etnis) ? ($id_etnis == $xSk['idx'] ? "selected" : ''):'') ?>  value="<?php echo $xSk['idx'] ?>"><?php echo $xSk['nama_suku'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Bahasa</label>
                                                    <div class="col-sm-8">
                                                    <div class="input-group">
                                                    <!-- <?= $id_bahasa ?> -->
                                                    <select name="bahasa" id="e-bahasa" class="form-control input-sm" style="width:100%;">
                                                        <?php foreach ($getBahasa->result_array() as $xBH) : ?> 
                                                            <option <?php echo (!empty($id_bahasa) ? ($id_bahasa == $xBH['idx'] ? "selected='selected'" : ""):"") ?> value="<?php echo $xBH['idx'] ?>"><?php echo $xBH['bahasa'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <span class="input-group-addon"><input type="checkbox" name="keterbatasanbahasa" id="e-keterbatasanbahasa">Keterbatasan Bahasa</span>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">No telp Rumah </label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control input-sm" name="no_telpon" id="e-no_telpon" value="<?php echo (!empty($no_telpon) ? $no_telpon :"")?>" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">No HP <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control input-sm" name="no_hp" id="e-no_hp" value="<?php echo (!empty($idx) ? $no_hp:"") ?>" >
                                                    <div class="text-error" id="err_no_hp"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Nama Ibu Kandung <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control input-sm" name="nama_ibu_kandung" id="e-nama_ibu_kandung" value="<?php echo (!empty($idx) ? $nama_ibu_kandung:"") ?>" >
                                                    <div class="text-error" id="err_nama_ibu_kandung"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Kewarganegaraan <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                    <select name="kewarganegaraan" id="kewarganegaraan" class="form-control input-sm" onchange="pilihKWN()">
                                                        <option <?php echo ($kewarganegaraan == "") ? "selected='selected'" : "" ?> value="">-- Pilih --</option>
                                                        <option <?php echo ($kewarganegaraan == "WNI") ? "selected='selected'" : "" ?> value="WNI">WNI</option>
                                                        <option <?php echo ($kewarganegaraan == "WNA") ? "selected='selected'" : "" ?> value="WNA">WNA</option>
                                                    </select>
                                                    <div class="text-error" id="err_kewarganegaraan"></div>
                                                    </div>
                                                </div>
                                                <legend class="groupWNI groupKewarganegaraan">Alamat Sesuai KTP</legend>
                                                <div class="form-group groupWNA groupKewarganegaraan" style="display: none;">
                                                    <label class="control-label col-sm-4">Negara <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <select name="nama_negara" id="e-nama_negara" class="form-control input-sm" style="width: 100%">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($getNegara->result_array() as $xN) : ?>
                                                                <option <?php echo ($nama_negara == $xN['idx']) ? "selected='selected'" : "" ?> value="<?php echo $xN['idx'] ?>"><?php echo $xN['nama_negara'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="text-error" id="err_nama_negara"></div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group groupWNI groupKewarganegaraan">
                                                    <label class="control-label col-sm-4">Provinsi <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                    <div class="input-group">
                                                        
                                                        <select name="nama_provinsi" id="e-nama_provinsi" class="form-control input-sm" style="width: 100%">
                                                            <option value="">--  Pilih --</option>
                                                            <?php foreach ($getProvinsi->result_array() as $xP) : ?>
                                                            <option value="<?php echo $xP['kode'] ?>" <?= (!empty($idx)? ($id_provinsi==$xP['kode'] ? "selected":""):"") ?>><?php echo $xP['nama'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="text-error" id="err_nama_provinsi"></div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="form-group groupWNI groupKewarganegaraan">
                                                    <label class="control-label col-sm-4">Kabupaten / Kota <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <select name="nama_kab_kota" id="e-nama_kab_kota" class="form-control input-sm" style="width: 100%">
                                                            <option value="">--  Pilih --</option>
                                                            <?php 
                                                            if(!empty($kab)){
                                                                foreach ($kab as $k ) {
                                                                    ?>
                                                                    <option value="<?= $k->kode ?>" <?= ($id_kab_kota==$k->kode) ? "selected" : ""; ?>><?= $k->nama ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="text-error" id="err_nama_kab_kota"></div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="form-group groupWNI groupKewarganegaraan">
                                                    <label class="control-label col-sm-4">Kecamatan / Nagari <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                    <div class="input-group">
                                                        
                                                        <select name="nama_kecamatan" id="e-nama_kecamatan" class="form-control input-sm" style="width: 100%">
                                                            <option value="">--  Pilih --</option>
                                                            <?php 
                                                            if(!empty($kec)){
                                                                foreach ($kec as $k ) {
                                                                    ?>
                                                                    <option value="<?= $k->kode ?>" <?= ($id_kecamatan==$k->kode) ? "selected" : ""; ?>><?= $k->nama ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="text-error" id="err_nama_kecamatan"></div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="form-group groupWNI groupKewarganegaraan">
                                                    <label class="control-label col-sm-4">Kelurahan / Jorong <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <select name="nama_kelurahan" id="e-nama_kelurahan" class="form-control input-sm" style="width: 100%">
                                                            <option value="">--  Pilih --</option>
                                                            <?php 
                                                            if(!empty($kel)){
                                                                foreach ($kel as $k ) {
                                                                    ?>
                                                                    <option value="<?= $k->kode ?>" <?= ($id_kelurahan==$k->kode) ? "selected" : ""; ?>><?= $k->nama ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="text-error" id="err_nama_kelurahan"></div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="form-group groupWNI groupKewarganegaraan">
                                                    <label class="control-label col-sm-4">Alamat <span style="color: red"> * </span></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="alamat" id="e-alamat" class="form-control input-sm" placeholder="Jalan dan nomor rumah" value="<?= (!empty($alamat) ? $alamat: "")?>">
                                                        <div class="text-error" id="err_alamat"></div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="text" class="form-control input-sm" name="rt" id="e-rt" placeholder="RT" value="<?= (!empty($rt) ? $rt: "")?>">
                                                        <div class="text-error" id="err_rt"></div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="text" class="form-control input-sm" name="rw" id="e-rw" placeholder="RW" value="<?= (!empty($rw) ? $rw: "")?>">
                                                        <div class="text-error" id="err_rw"></div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control input-sm" id="e-kodepos" placeholder="Kode Pos" value="<?= (!empty($idx) ? $kodepos: "")?>">
                                                        <div class="text-error" id="err_kodepos"></div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="form-group groupWNI groupKewarganegaraan">
                                                    <label class="control-label col-sm-4">&nbsp;</label>
                                                    <div class="col-sm-8">
                                                        <input type="checkbox" name="domisilisesuaiktp" id="e-domisilisesuaiktp" value="1" onclick="cekDomisili()"> Domisili Sesuai KTP
                                                    </div>
                                                </div>
                                                <legend class="domisili">Alamat Domisili</legend>
                                                <div class="form-group domisili">
                                                    <label class="control-label col-sm-4">Provinsi <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                    <div class="input-group">
                                                        
                                                        <select name="nama_provinsi_domisili" id="e-nama_provinsi_domisili" class="form-control input-sm" style="width: 100%">
                                                            <option value="">--  Pilih --</option>
                                                            <?php foreach ($getProvinsi->result_array() as $xP) : ?>
                                                            <option value="<?php echo $xP['kode'] ?>" <?= (!empty($idx)? ($id_provinsi_domisili==$xP['kode'] ? "selected":""):"") ?>><?php echo $xP['nama'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="text-error" id="err_nama_provinsi_domisili"></div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="form-group domisili">
                                                    <label class="control-label col-sm-4">Kabupaten / Kota <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                    <div class="input-group">
                                                        
                                                        <select name="nama_kab_kota_domisili" id="e-nama_kab_kota_domisili" class="form-control input-sm" style="width: 100%">
                                                            <option value="">--  Pilih --</option>
                                                            <?php 
                                                            if(!empty($kabdom)){
                                                                foreach ($kabdom as $k ) {
                                                                    ?>
                                                                    <option value="<?= $k->kode ?>" <?= ($id_kab_kota_domisili==$k->kode) ? "selected" : ""; ?>><?= $k->nama ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="text-error" id="err_nama_kab_kota_domisili"></div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="form-group domisili">
                                                    <label class="control-label col-sm-4">Kecamatan / Nagari <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                    <div class="input-group">
                                                        
                                                        <select name="nama_kecamatan_domisili" id="e-nama_kecamatan_domisili" class="form-control input-sm" style="width: 100%">
                                                            <option value="">--  Pilih --</option>
                                                            <?php 
                                                            if(!empty($kecdom)){
                                                                foreach ($kecdom as $k ) {
                                                                    ?>
                                                                    <option value="<?= $k->kode ?>" <?= ($id_kecamatan_domisili==$k->kode) ? "selected" : ""; ?>><?= $k->nama ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="text-error" id="err_nama_kecamatan_domisili"></div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="form-group domisili">
                                                    <label class="control-label col-sm-4">Kelurahan / Jorong <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <select name="nama_kelurahan_domisili" id="e-nama_kelurahan_domisili" class="form-control input-sm" style="width: 100%">
                                                            <option value="">--  Pilih --</option>
                                                            <?php 
                                                            if(!empty($keldom)){
                                                                foreach ($keldom as $k ) {
                                                                    ?>
                                                                    <option value="<?= $k->kode ?>" <?= ($id_kelurahan_domisili==$k->kode) ? "selected" : ""; ?>><?= $k->nama ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="text-error" id="err_nama_kelurahan_domisili"></div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="form-group domisili">
                                                    <label class="control-label col-sm-4">Alamat Tempat Tinggal <span style="color: red"> * </span></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="alamat_domisili" id="e-alamat_domisili" class="form-control input-sm" placeholder="Jalan dan nomor rumah" value="<?= (!empty($idx) ? $alamat_domisili: "")?>">
                                                        <div class="text-error" id="err_alamat_domisili"></div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="text" class="form-control input-sm" id="e-rt_domisili" name="rt_domisili" placeholder="RT" value="<?= (!empty($idx) ? $rt_domisili: "")?>">
                                                        <div class="text-error" id="err_rt_domisili"></div>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="text" class="form-control input-sm" id="e-rw_domisili" name="rw_domisili" placeholder="RW" value="<?= (!empty($idx) ? $rw_domisili: "")?>">
                                                        <div class="text-error" id="err_rw_domisili"></div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control input-sm" id="e-kodepos_domisili" placeholder="Kode Pos" value="<?= (!empty($idx) ? $kodepos_domisili: "")?>">
                                                        <div class="text-error" id="err_kodepos_domisili"></div>
                                                    </div>
                                                </div>

                                                <legend>Penanggung Jawab</legend>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Penanggung Jawab <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control input-sm" name="penanggung_jawab" id="e-penanggung_jawab" value="<?php echo $penanggung_jawab ?>">
                                                        <div class="text-error" id="err_penanggung_jawab"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Umur <span style="color: red"> * </span></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control input-sm" name="umur_pj" id="e-umur_pj" value="<?= (!empty($umur_pj) ? $umur_pj: "")?>">
                                                        <div class="text-error" id="err_umur_pj"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Pekerjaan Penanggung Jawab <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control input-sm" name="pekerjaan_pj" id="e-pekerjaan_pj" value="<?= (!empty($pekerjaan_pj) ? $pekerjaan_pj: "")?>">
                                                        <div class="text-error" id="err_pekerjaan_pj"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Alamat Penanggung Jawab <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control input-sm" name="alamat_pj" id="e-alamat_pj" value="<?= (!empty($alamat_pj) ? $alamat_pj: "")?>">
                                                        <div class="text-error" id="err_alamat_pj"></div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">No HP / Telp Penanggung Jawab <span style="color: red"> * </span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control input-sm" name="no_penanggung_jawab" id="e-no_penanggung_jawab" value="<?php echo $no_penanggung_jawab ?>">
                                                        <div class="text-error" id="err_no_penanggung_jawab"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">Hub Keluarga <span style="color: red"> * </span></label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control input-sm" name="hub_keluarga" id="e-hub_keluarga" value="<?php echo $hub_keluarga ?>">
                                                        <div class="text-error" id="err_hub_keluarga"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4">&nbsp;</label>
                                                    <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <button type="button" class="btn btn-primary" id="e-kembali">
                                                            <i class="glyphicon glyphicon-new-window"></i> Kembali</button>
                                                        <button type="button" id="e-btnSimpan" class="btn btn-danger" id="e-submit" onclick="updatePasien()">
                                                            <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                                                    </div>
                                                    </div>      
                                                </div>
                                            </fieldset>
                                            
                                            

                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="riwayatkunjunganpasien" class="tab-pane fade">
                    <section class="">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Riwayat berobat</h3>
                                        <div class="box-tools">

                                        </div>
                                    </div>
                                    <div class="box-body table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 50px">No</th>
                                                    <th style="width: 100px">No Registrasi</th>
                                                    <th style="width: 150px">No Unit Registrasi</th>
                                                    <th style="width: 120px">Tgl Registrasi</th>
                                                    <th style="width: 120px">DPJP</th>
                                                    <th>Tujuan</th>
                                                    <th>Cara Bayar</th>
                                                    <th>NO BPJS</th>
                                                    <th style="width: 150px">Jenis Layanan</th>
                                                    <th style="width: 150px">Users</th>
                                                </tr>
                                            </thead>
                                            <tbody id="getHistoryPasien"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>


</section>




<div class="modal fade" id="mpop_riwayat" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg" style="overflow-y: initial !important">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="closeRiwayat()">×</button>
                <h3 class="modal-title" id="headRiwayat">Riwayat Kunjungan</h3>
            </div>
            <div class="modal-body" style="height: 450px;overflow-y: auto;">
                <div class="row">
                        <div class="col-md-3">
                            <label for="Dari">Dari</label>
                            <input type="text" name="dari" id="r_dari" class="form-control input-sm datepicker" value="<?= date('Y-m')."-01" ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="Dari">Sampai</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="sampai" id="r_sampai" class="form-control input-sm datepicker" value="<?= date('Y-m-d') ?>">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" onclick="riwayatLain()"> <span class="fa fa-search"></span> Cari SEP</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Tgl SEP</td>
                                        <td>Jns Layanan</td>
                                        <td>No Rujukan</td>
                                        <td>No SEP</td>
                                        <td>Poli</td>
                                        <td>PPK Pelayan</td>
                                        <td>Diagnosa</td>
                                    </tr>
                                </thead>
                                <tbody id="datariwayatkunjungan"></tbody>
                            </table>
                        </div>
                    </div>
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
                <h3 class="modal-title" id="headSep">SEP Rawat Jalan</h3>
            </div>
            <div class="modal-body">
                
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
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="headRujukan">Rujukan Faskes Tingkat 1</h3>
            </div>
            <div class="modal-body">
                <div id="loading"></div>
                <div id="formlistrujukan">
                    <form class="form-horizontal">
                        <div id="tblPopup_Rujukan_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row" id="pilihfaskes" style="display:none;">
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
                                                <th>No.</th>
                                                <th>No.Rujukan</th>
                                                <th>Tgl.Rujukan</th>
                                                <th>No.Kartu</th>
                                                <th>Nama</th>
                                                <th>PPK Perujuk</th>
                                                <th>Sub/Spesialis</th>
                                                <th style="width:50px" >Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list-data-rujukan">
                                            <tr class="odd">
                                                <td colspan="8" valign="top">No data available in table</td>
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
                                    <td>Jenis Kontrol</td>
                                    <td>NO Surat Kontrol</td>
                                    <td>Poli</td>
                                    <td>Nama Dokter</td>
                                    <td>Tgl Buat</td>
                                    <td>Tgl Rencana Kontrol</td>
                                    <td>Terbit SEP</td>
                                </tr>
                                <tbody id="datakontrol"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class='step' id="riwayat" style="display:none;">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="Dari">Dari</label>
                            <input type="text" name="dari" id="dari" class="form-control input-sm datepicker" value="<?= date('Y-m')."-01" ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="Dari">Sampai</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="sampai" id="sampai" class="form-control input-sm datepicker" value="<?= date('Y-m-d') ?>">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" onclick="riwayatKunjungan()"> <span class="fa fa-search"></span> Cari SEP</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Tgl SEP</td>
                                        <td>Jenis Layanan</td>
                                        <td>No Rujukan</td>
                                        <td>No SEP</td>
                                        <td>Poli</td>
                                        <td>PPK Pelayan</td>
                                        <td>Diagnosa</td>
                                    </tr>
                                </thead>
                                <tbody id="datariwayat"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="step" id="formsuratkontrol" style="display:none;">
                    <form action="#"  class="form-horizontal" id="formkontrol">
                        <input type="hidden" name="jnsKontrol" id="jnsKontrol" value="2">
                        <input type="hidden" name="ktglRujukan" id="ktglRujukan" value="">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="email">No SEP:</label>
                            <div class="col-sm-6">
                            <input type="text" class="form-control input-sm" id="noSEP" name='noSEP' placeholder="Masukkan No SEP" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Tanggal Rencana Kontrol:</label>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm datepicker" id="tglRencanaKontrol" placeholder="Masukkan rencana kontrol" onchange="caripoliKontrol()">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" class="button"> <span class="fa fa-calendar" id="iconCariPoli"></span></button>
                                    </span>
                                </div>
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Poliklinik:</label>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <select name="poliKontrol" id="poliKontrol" class="form-control input-sm" onchange="dokterKontrol()" style="width:100%"></select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" class="button"> <span class="fa fa-hospital-o" id="iconCariDokter"></span></button>
                                    </span>
                                </div>
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Dokter:</label>
                            <div class="col-sm-6">
                                <div class="input-group">
                                <select name="kodeDokter" id="kodeDokter" class="form-control input-sm" style="width:100%"></select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" class="button"> <span class="fa fa-user-md" id="iconDokter"></span></button>
                                    </span>
                                </div>
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-6">
                            <button type="button" class="btn btn-primary" id="btnbuatkontrol" onclick='buatSuratKontrol()'><span id="iconkontrol" class="fa fa-save"></span> Buat Surat Kontrol</button>
                            <button type="button" class="btn btn-danger" onclick="resetFormKontrol()">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="asspel" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="headRujukan">Pilih ALasan kunjungan</h3>
            </div>
            <div class="modal-body">
            <select name="c-assesmentPel" id="c-assesmentPel" class="form-control input-sm" onchange="pilihAsesmen()">
                <option value="">Pilih alasan</option>
                <option value="1">Poli spesialis tidak tersedia pada hari sebelumnya</option>
                <option value="2">Jam Poli telah berakhir pada hari sebelumnya</option>
                <option value="3">Dokter Spesialis yang dimaksud tidak praktek pada hari sebelumnya</option>
                <option value="4">Atas Instruksi RS</option>
                <option value="5">Tujuan Kontrol</option>
            </select>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="asemenTujuanKunj" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg" style="overflow-y: initial !important">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="headRujukan">Asesmen Tujuan Kunjungan</h3>
            </div>
            <div class="modal-body">
                <h3 class="text-center">
                    <b>Apakah tujuan kunjungan anda ?</b>
                    </h3>
                <div class="row">
                    <div class="col-md-12">
                        <select name="asesmenTujuanKunjungan" id="asesmenTujuanKunjungan" class="form-control" onchange="pilihAsesmenTujuan()">
                            <option value="">Pilih Tujuan Kunjungan</option>
                            <option value="1">Procedure</option>
                            <option value="2">Tujuan Kontrol</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="asesmenProsedure" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg" style="overflow-y: initial !important">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="headRujukan">Asesmen Prosedure</h3>
            </div>
            <div class="modal-body">
                <h3 class="text-center">
                    <b>Pilih Jenis Prosedure !</b>
                    </h3>
                <div class="row">
                    <div class="col-md-12">
                        <select name="asesmenJenisProsedure" id="asesmenJenisProsedure" class="form-control" onchange="pilihAsesmenProsedure()">
                            <option value="">Pilih Jenis Prosedure</option>
                            <option value="0">Prosedure Tidak Berkelanjutan</option>
                            <option value="1">Prosedure Berkelanjutan</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="asesmenFalgProsedure" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg" style="overflow-y: initial !important">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="headRujukan">Pilih Poli Penunjang</h3>
            </div>
            <div class="modal-body">
                <h3 class="text-center">
                    <b>Silahkan Pilih Poli Penunjang !</b>
                    </h3>
                <div class="row">
                    <div class="col-md-12">
                        <select name="asesmenKdPenunjang" id="asesmenKdPenunjang" class="form-control" onchange="pilihKdPenunjang()">
                            <option value="">Pilih Poli Penunjang</option>
                            
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="asesmenTujuanLayanan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg" style="overflow-y: initial !important">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="headRujukan">Asesmen pelayanan</h3>
            </div>
            <div class="modal-body">
                <h3 class="text-center">
                    <b>Mengapa pelayanan ini tidak diselesaikan pada hari yang sama sebelumnya ?</b>
                    </h3>
                <div class="row">
                    <div class="col-md-12">
                        <select name="asesmenPelayanan" id="asesmenPelayanan" class="form-control" onchange="pilihAsesmenPelayanan()">
                            <option value="">Pilih </option>
                            <option value="1">Poli Spesialis tidak tersedia pada hari sebelumnya</option>
                            <option value="2">Jam poli telah berakhir pada hari sebelumnya</option>
                            <option value="3">Dokter spesialis dimaksud tidak praktek pada hari sebelumnya</option>
                            <option value="4">Atas instruksi rumah sakit</option>
                            <option value="5">Tujuan Kontrol</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="formdpo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Form Aprove</h4>
            </div>
            <div class="modal-body">

                <!--form id="form1" class="form-horizontal" onsubmit="return false"-->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="#" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-3 col-md-3 col-xs-12 control-label">Nomr</label>
                                    <div class="col-md-9 col-md-9 col-xs-12">
                                        <input type="hidden" name="Id" id="Id">
                                        <input name="dponomr" id="dponomr" type="text" class="form-control" value="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-md-3 col-xs-12 control-label">Nama</label>
                                    <div class="col-md-9 col-md-9 col-xs-12">
                                        <input name="dponama" id="dponama" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-md-3 col-xs-12 control-label">Keterangan</label>
                                    <div class="col-md-9 col-md-9 col-xs-12">
                                        <textarea name="dpoketerangan" id="dpoketerangan" cols="5" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 col-md-3 col-xs-12 control-label">&nbsp;</label>
                                    <div class="col-md-9 col-md-9 col-xs-12">
                                        <input type="checkbox" name="status_dpo" id="status_dpo" value="1"> Selesai
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>

                </div>
                <!--/form-->
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCariRujukanPasien" onclick="simpanDpo()" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/jquery/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/jquery/js/jquery-ui.min.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/popper/popper.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/tooltip/tooltip.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!--Auto Complete-->




<script type="text/javascript">
    $(document).ready(function() {
        $('.adarujukan').hide();
        $('.kontrolulang').hide()
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        var mask = "<?php echo KODERS_VC ?>9999V999999";
        $('#x-tgl_lahir').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        });
        $('#pjPasienNama').focus();
        $('input').focus(function() {
            return $(this).select();
        });
        $('#txtTanggal').inputmask('yyyy-mm-dd', {
            'placeholder': 'yyyy-mm-dd'
        });
        

        $.widget("custom.caridiagnosa", $.ui.autocomplete, {
            _create: function() {
                this._super();
                this.widget().menu("option", "items", "> li:not(.ui-autocomplete-header)");
            },
            _renderMenu(ul, items) {
                var self = this;
                ul.addClass("container");

                let header = {
                    kode: "Kode ICD",
                    nama: "Diagnosa",
                    isheader: true
                };
                self._renderItemData(ul, header);
                $.each(items, function(index, item) {
                    self._renderItemData(ul, item);
                });

            },
            _renderItemData(ul, item) {
                return this._renderItem(ul, item).data("ui-autocomplete-item", item);
            },
            _renderItem(ul, item) {
                var $li = $("<li class='ui-menu-item' role='presentation'></li>");
                if (item.isheader)
                    $li = $("<li class='ui-autocomplete-header' role='presentation'  style='font-weight:bold !important; width:100%'></li>");
                var $content = "<div class='col-md-12 ui-menu-item-wrapper'>" +
                    "<div class='col-md-2'>" + item.kode + "</div>" +
                    "<div class='col-md-10'>" + item.nama + "</div>" +
                    "</div>";
                $li.html($content);


                return $li.appendTo(ul);
            }

        });
        
        $("#nama_icd").caridiagnosa({
            source: function(request, response) {

                $.ajax({
                    url: "<?= base_url() ."mr_registrasi.php/"?>"+'vclaim/referensi/diagnosa',
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
                $("#kodeicd").val(ui.item['kode']);
                $("#nama_icd").val(ui.item['nama']);
                $("#nama_icd").removeClass("ui-autocomplete-loading");
                return false;
            },
            select: function(event, ui) {
                if(ui.item['kode']=="U07.1" || ui.item['kode']=="U07.2") $('#c19').prop("checked",true);
                else $('#c19').prop('checked',false);
                $("#kodeicd").val(ui.item['kode']);
                $("#nama_icd").val(ui.item['nama']);
                $("#nama_icd").removeClass("ui-autocomplete-loading");
                return false;
            }
        });
        $('#no_jaminan').val('');
        <?php
        if (STATUS_VC == "0") {
        ?>
            if ($('#chkIsJaminan').is(':checked')) {
                $('#no_jaminan').inputmask(mask, {
                    'placeholder': '<?php echo KODERS_VC ?>____V______'
                });
            } else {
                $('#no_jaminan').inputmask('remove');
            }
        <?php
        } else {
        ?>
            // $('#no_jaminan').inputmask(mask, {
            //     'placeholder': '<?php echo KODERS_VC ?>____V______'
            // });
        <?php
        }
        ?>


        $('#chkIsJaminan').click(function() {
            if ($('#chkIsJaminan').is(':checked')) {
                //alert('test');
                $('#no_jaminan').inputmask(mask, {
                    'placeholder': '<?php echo KODERS_VC ?>____V______'
                });
            } else {
                $('#no_jaminan').inputmask('remove');
            }
        });

        // getHistoryPasien();
        $('select').not('#optJnsRujukan')
        .not('#optAsalRujukan')
        .not('#lakaLantas')
        .not('#asesmenTujuanKunjungan')
        .not('#asesmenJenisProsedure')
        .not('#asesmenKdPenunjang')
        .not('#asesmenPelayanan')
        .not('#cbprovinsi')
        .not('#cbkabupaten')
        .not('#cbkecamatan')
        .not('#id_pengirim')
        .not('#kewarganegaraan')
        .not('#x-agama')
        .not('#x-pekerjaan')
        .not('#x-suku')
        .not('#x-bahasa')
        .not('#e-pendidikan')
        .not('#e-pekerjaan')
        .not('#e-status_kawin')
        .not('#e-agama')
        .not('#e-jns_kelamin')
        .not('#x-status_kawin').select2({
            placeholder: '-- Pilih --'
        });
        // $('select').not('#kewarganegaraan')
        // .not('#agama').not('#pekerjaan')
        // .not('#suku').not('#bahasa')
        // .not('#status_kawin')
        // .select2({placeholder:'------------ Pilih option ------------'});
        // $('select').val('').trigger('change');

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        $('#txtTanggal').datepicker('setDate', today);

        $('#tgl_layanan').val('<?php echo date("d/m/Y") ?>');

        $('#id_cara_bayar').change(function() {
            
        });

        $('#batal').click(function() {
            var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/rawat_jalan' ?>';
            window.location.href = url;
        });

        $('#daftar').click(function() {
            //alert($('#txtNorujuk').val());
            var c19=$('#c19').prop('checked');
            if(c19==true) c19=1; else c19=0;

            var sdm=$('#sdm').prop('checked');
            if(sdm==true) sdm=1; else sdm=0;
            var formdata = {
                kodepoli: $('#kodepoli').val(),
                namapoli: $('#namapoli').val(),
                kodedokter: $('#kodedokter').val(),
                namadokter: $('#namadokter').val(),
                jampraktek: $('#jampraktek').val(),
                kuotajkn: $('#kuotajkn').val(),
                kuotajkn: $('#kuotajkn').val(),
                kuotanonjkn: $('#kuotanonjkn').val(),
                no_ktp: $('#no_ktp').val(),
                nama_pasien: $('#nama').val(),
                tempat_lahir: $('#tempat_lahir').val(),
                tgl_lahir: $('#tgl_lahir').val(),
                nama_provinsi: $('#provinsi').val(),
                nama_kab_kota: $('#kabupaten').val(),
                nama_kecamatan: $('#kecamatan').val(),
                nama_kelurahan: $('#kelurahan').val(),
                jns_kelamin: $('#jns_kelamin').val(),
                tgl_layanan: $('#tgl_layanan').val(),
                jns_layanan: $('#jns_layanan').val(),
                pjPasienNama: $('#pjPasienNama').val(),
                pjPasienUmur: $('#pjPasienUmur').val(),
                pjPasienPekerjaan: $('#pjPasienPekerjaan').val(),
                pjPasienAlamat: $('#pjPasienAlamat').val(),
                pjPasienTelp: $('#pjPasienTelp').val(),
                pjPasienHubKel: $('#pjPasienHubKel').val(),
                pjidPengirim: $('#id_pengirim').val(),
                pjPasienDikirimOleh: $('#pjPasienDikirimOleh').val(),
                pjPasienAlmtPengirim: $('#pjPasienAlmtPengirim').val(),
                dokterJaga: $('#dokterJaga').val(),
                namaDokterJaga: $('#dokterJaga :selected').html(),
                id_ruang: $('#id_ruang').val(),
                nama_ruang: $('#id_ruang :selected').html(),
                id_rujuk: $('#id_rujuk').val(),
                no_rujuk: $('#txtNorujuk').val(),
                rujukan: $('#id_rujuk :selected').html(),
                id_cara_bayar: $('#id_cara_bayar').val(),
                cara_bayar: $('#id_cara_bayar :selected').html(),
                id_jenis_peserta: $('#id_jenis_peserta').val(),
                jenis_peserta: $('#jenis_peserta').val(),
                no_bpjs: $('#no_bpjs').val(),
                no_jaminan: $('#no_jaminan').val(),
                tgl_jaminan: $('#tgl_jaminan').val(),
                tgl_daftar: $('#tgl_daftar').val(),

                id_provinsi: $('#id_provinsi').val(),
                id_kab_kota: $('#id_kab_kota').val(),
                id_kecamatan: $('#id_kecamatan').val(),
                id_kelurahan: $('#id_kelurahan').val(),
                nama_provinsi: $('#provinsi').val(),
                nama_kab_kota: $('#kabupaten').val(),
                nama_kecamatan: $('#kecamatan').val(),
                nama_kelurahan: $('#kelurahan').val(),
                alamat: $('#alamatktp').val(),
                rt: $('#rt').val(),
                rw: $('#rw').val(),
                id_provinsi_domisili: $('#id_provinsi_domisili').val(),
                id_kab_kota_domisili: $('#id_kab_kota_domisili').val(),
                id_kecamatan_domisili: $('#id_kecamatan_domisili').val(),
                id_kelurahan_domisili: $('#id_kelurahan_domisili').val(),
                nama_provinsi_domisili: $('#provinsi_domisili').val(),
                nama_kab_kota_domisili: $('#kabupaten_domisili').val(),
                nama_kecamatan_domisili: $('#kecamatan_domisili').val(),
                nama_kelurahan_domisili: $('#kelurahan_domisili').val(),
                rt_domisili: $('#rt_domisili').val(),
                rw_domisili: $('#rw_domisili').val(),
                alamat_domisili: $('#alamat_domisili').val(),
                kodepos: $('#kodepos').val(),
                kodepos_domisili: $('#kodepos_domisili').val(),
                sdmrs: sdm,
                icdkode: $('#kodeicd').val(),
                icd:$('#nama_icd').val(),
                c19:c19,
            }
            if (formdata['nomr'] == "" || formdata['nama_pasien'] == "") {
                alert('Ops. No.MR tidak boleh kosong.');
            } else if (formdata['pjPasienNama'] == "") {
                alert('Ops. Nama penanggung jawab pasien tidak boleh kosong.');
                $('#pjPasienNama').focus()
            } else if (formdata['id_ruang'] == "") {
                alert('Ops. Tujuan layanan harus di pilih.');
            } else if (formdata['id_rujuk'] == "") {
                alert('Ops. Rujukan harus di pilih.');
            } else if (formdata['id_cara_bayar'] == "") {
                alert('Ops. Cara bayar harus di pilih.');
            } else {
                if ($('#jkn').val() == 1) {
                    if ($('#status_peserta').val() == '') {
                        // alert('Ops. Status Kepesertaan BPJS Tidak Dikeahui');
                        // return false
                    } else if ($('#status_peserta').val() != 'AKTIF') {
                        var status = $('#status_peserta').val();
                        // alert('Ops. Status Kepesertaan BPJS ' + status + ' Tidak Dikeahui');
                        // return false;
                    }
                }
                var x = confirm("Apakah anda yakin akan melanjutkan proses pendaftaran pasien ini?");
                if (x) {
                    $.ajax({
                        url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/daftar_rajal' ?>",
                        type: "POST",
                        data: formdata,
                        dataType: "JSON",
                        beforeSend  : function(){
                            $('#daftar').prop("disabled",true);
                            $('#daftar').html('<i class="fa fa-spinner fa-spin"></i> Proses...')
                        },
                        success: function(data) {
                            if (data.code == 200) {
                                var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/reg_success?uid=' ?>' + data.unikID;
                                window.location.href = url;
                            } else {
                                alert(data.message);
                            }
                        },
                        error: function(xhr) { // if error occured
                            tampilkanPesan('error',xhr.responseText)
                            $('#daftar').prop("disabled",false);
                            $('#daftar').html('Daftar <i class="fa fa-arrow-right"></i>')
                        },
                        complete: function() {
                            $('#daftar').prop("disabled",false);
                            $('#daftar').html('Daftar <i class="fa fa-arrow-right"></i>')
                        }
                    });
                }
            }
        });


        $('#btnRujukanLain').click(function() {
            var asalRujukan = $('#optAsalRujukan :selected').html();
            var nokartu = $('#no_bpjs').val();
            $('#headRujukan').html("Rujukan " + asalRujukan);
            $('#txtrujukan_kartu').val(nokartu);
            $('tbody#listRujukan').html('<tr class="odd"><td colspan="7" valign="top">No data available in table</td></tr>');
            $('#mpop_rujukan').modal('show');
        });

        
        $('#btnBatal').click(function() {
            $('#mpop_sep').modal('hide');
        });



        $("#txtnmpoli").autocomplete({
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
                        response(poli.slice(0, 25));
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
                var rujukanasal=$('#tujuanRujukan').val();
                if(rujukanasal!=ui.item['kode']){
                    $('#divkontrol').hide();
                }else{
                    $('#divkontrol').show();
                }
                $("#tujuan").val(ui.item['kode']);
                $("#txtnmpoli").val(ui.item['nama']);
                $("#txtnmpoli").removeClass("ui-autocomplete-loading");
                if(ui.item['kode']=='MAT') $('#divkatarak').show();
                else $('#divkatarak').hide();
                getdpjp();
                return false;
            }
        })
        .autocomplete("instance")._renderItem = function(table, item) {
            return $("<tr class='autocomplete'>")
                .append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
                .appendTo(table);
        };

        $("#txtppkasalrujukan").autocomplete({
            source: function(request, response) {
                var asalRujukan=$('#asalRujukan').val();
                $.ajax({
                    url: "<?php echo base_url() . 'mr_registrasi.php/vclaim/referensi/faskes/' ?>"+asalRujukan,
                    dataType: "JSON",
                    method: "GET",
                    data: {
                        param: request.term
                    },
                    success: function(data) {
                        console.log(data);
                        var dokter = data.response.faskes;
                        response(dokter.slice(0, 15));
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(errorThrown);
                    }
                });
            },
            minLength: 2,
            focus: function(event, ui) {
                $("#txtkdppkasalrujukan").val(ui.item['kode']);
                $("#txtppkasalrujukan").val(ui.item['nama']);
                $('#ppkRujukan').val(ui.item['kode']);
                $("#txtppkasalrujukan").removeClass("ui-autocomplete-loading");
                return false;
            },
            select: function(event, ui) {
                $("#txtkdppkasalrujukan").val(ui.item['kode']);
                $('#ppkRujukan').val(ui.item['kode']);
                $("#txtppkasalrujukan").val(ui.item['nama']);
                $("#txtppkasalrujukan").removeClass("ui-autocomplete-loading");
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

        $("#pjPasienNama").autocomplete({
            source: function(request, response) {
                console.clear();
                console.log("cari pasien...");
                var nomr = $('#nomr').val();
                $.ajax({
                    url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/getpj' ?>",
                    dataType: "JSON",
                    method: "POST",
                    data: {
                        param1: request.term,
                        param2: nomr
                    },
                    success: function(data) {
                        console.clear();
                        console.log(data);
                        var pj = data.data;
                        console.log(pj);
                        response(pj.slice(0, 15));
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(errorThrown);
                    }
                });
            },
            minLength: 0,
            focus: function(event, ui) {
                $("#pjPasienNama").val(ui.item['nama_penanggung_jawab']);
                $("#pjPasienPekerjaan").val(ui.item['pekerjaan']);
                $("#pjPasienAlamat").val(ui.item['alamat']);
                $("#pjPasienTelp").val(ui.item['no_telp']);
                $("#pjPasienHubKel").val(ui.item['hub_keluarga']);
                $("#pjPasienNama").removeClass("ui-autocomplete-loading");
                return false;
            },
            select: function(event, ui) {
                $("#pjPasienNama").val(ui.item['nama_penanggung_jawab']);
                $("#pjPasienPekerjaan").val(ui.item['pekerjaan']);
                $("#pjPasienAlamat").val(ui.item['alamat']);
                $("#pjPasienTelp").val(ui.item['no_telp']);
                $("#pjPasienHubKel").val(ui.item['hub_keluarga']);
                return false;
            }
        })
        .autocomplete("instance")._renderItem = function(table, item) {
            return $("<tr class='autocomplete'>")
                .append("<td style='width:300px'>" + item['nama_penanggung_jawab'] + "</td><td style='width:300px'>" + item['pekerjaan'] + "</td>")
                .appendTo(table);
        };

        // getPengirim();
        $('#id_ruang').on('select2:select', function(e) {
            $('#dokterJaga').focus();
        });
        $('#dokterJaga').on('select2:select', function(e) {
            var jkn = $('#jkn').val();
            if (jkn == 1) $('#no_jaminan').focus();
            else $('#daftar').focus();
            var dokter=$('#dokterJaga').val();
            var poly=$('#id_ruang').val();
            getJadwal(poly,dokter);
        });
        $('#id_cara_bayar').on('select2:select', function(e) {
            var carabayar = $('#id_cara_bayar').val();
            var url = "<?= base_url() . "mr_registrasi.php/registrasi/carabayar/" ?>" + carabayar;
            console.clear();
            console.log(url);

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: {
                    get_param: 'value'
                },
                success: function(data) {

                    console.log(data);

                    if (data["status"] == true) {
                        var x = data["data"]["jkn"];
                        $('#jkn').val(x);

                        if (x == "0" || x == "2") {
                            //alert(x);
                            //$("#cariRujukan").prop('disabled', false);
                            $("#cariRujukan").attr('disabled', 'disabled');
                            $('#cariKontrol').attr('disabled', 'disabled');
                            $('.divRegCredit').hide();
                        } else {
                            $('.divRegCredit').show();
                            $('#chkIsJaminan').prop('disabled', false);
                            $("#cariRujukan").removeAttr('disabled');
                            $("#cariKontrol").removeAttr('disabled');
                        }
                        if (x == "1") {
                            $('#no_bpjs').focus();

                        } else {
                            //alert(jkn);
                            $('#id_rujuk').focus();
                        }
                    } else {
                        $('#jkn').val("0")
                        $('#id_rujuk').focus();
                    }
                }
            });
        });
        $('#id_rujuk').on('select2:select', function(e) {
            //$('#no_jaminan').focus();
            id_rujuk = $('#id_rujuk').val();
            var url = "<?= base_url() ."mr_registrasi.php"?>" + "/patch/getpengirim/" + parseInt(id_rujuk);
            console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: {
                    get_param: 'value'
                },
                success: function(data) {
                    //menghitung jumlah data
                    //console.clear();
                    console.log(url);
                    if (data["status"] == true) {
                        var pengirim = data["data"];
                        // $('#faskes').val(data["rujukan"]["id_faskes"]);
                        var jmlData = pengirim.length;
                        var option = "<option value=''>Pilih</option>";
                        //Create Tabel
                        for (var i = 0; i < jmlData; i++) {
                            option += "<option value='" + pengirim[i]["idx"] + "'>" + pengirim[i]["nama_pengirim"] + "</option>";
                        }
                        option += "<option value='Lainnya'>LAINNYA</option>";
                        $('#id_pengirim').html(option);
                        // if (id_rujuk != 1) {
                        //     $('.adarujukan').show();
                        //     if(id_rujuk==6){
                        //         // jika pasien Kontrol Ulang
                        //         $('.kontrolulang').show();
                        //     }else $('.kontrolulang').hide();
                        // } else {
                        //     $('.adarujukan').hide();
                            
                        // }

                        if (data["rujukan"]["id_faskes"] == "0") {
                            var asal='<div class="form-group" style="">'+
                                '<label class="col-md-3 col-sm-3 col-xs-12 control-label">Faskes Perujuk<br></label>'+
                                '<div class="col-md-8 col-sm-8 col-xs-12">'+
                                    '<div class="input-group">'+
                                        '<input type="hidden" name="faskes" id="faskes" value="'+data["rujukan"]["id_faskes"]+'">'+
                                        '<input type="text" name="jenis_faskes" id="jenis_faskes" class="form-control input-sm" value="'+data['rujukan']['faskes']+'" readonly>'+
                                        '<span class="input-group-addon">'+
                                        '<input type="checkbox" value="1" name="jarkomdat" id="jarkomdat" onclick="cekJarkodat()" checked>Jarkomdat'+
                                        '</span>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                            $('#faskesperujuk').html(asal);
                            $('#id_ruang').focus();
                            $('.adarujukan').hide();
                        } else {
                            $('.adarujukan').show();
                            if(data["rujukan"]["id_faskes"] == "1" || data["rujukan"]["id_faskes"] == "2"){
                                var asal='<div class="form-group" style="">'+
                                '<label class="col-md-3 col-sm-3 col-xs-12 control-label">Faskes Perujuk<br></label>'+
                                '<div class="col-md-8 col-sm-8 col-xs-12">'+
                                    '<div class="input-group">'+
                                        '<input type="hidden" name="faskes" id="faskes" value="'+data["rujukan"]["id_faskes"]+'">'+
                                        '<input type="text" name="jenis_faskes" id="jenis_faskes" class="form-control input-sm" value="'+data['rujukan']['faskes']+'" readonly>'+
                                        '<span class="input-group-addon">'+
                                        '<input type="checkbox" value="1" name="jarkomdat" id="jarkomdat" onclick="cekJarkodat()" checked>Jarkomdat'+
                                        '</span>'+
                                    '</div>'+
                                '</div>'+
                                '</div>';
                                $('#faskesperujuk').html(asal);
                                $('#txtNorujuk').focus();
                            }else{
                                if(id_rujuk==4) {
                                    var faskes2 = "selected";
                                    $('.adarujukan').hide();
                                 } else {
                                     var faskes2="";
                                     $('.adarujukan').show();
                                 }
                                var asal='<div class="form-group" style="">'+
                                '<label class="col-md-3 col-sm-3 col-xs-12 control-label">Faskes Perujuk<br></label>'+
                                '<div class="col-md-8 col-sm-8 col-xs-12">'+
                                    '<div class="input-group">'+
                                    '<select class="form-control input-sm" name="faskes" id="faskes">'+
                                        '<option value="1">Faskes Tingkat 1</option>'+
                                        '<option value="2" '+faskes2+'>Faskes Tingkat 2</option>'+
                                    '</select>'+
                                        '<span class="input-group-addon">'+
                                        '<input type="checkbox" value="1" name="jarkomdat" id="jarkomdat" onclick="cekJarkodat()" checked>Jarkomdat'+
                                        '</span>'+
                                    '</div>'+
                                
                                '</div>'+
                                '</div>';
                                $('#faskesperujuk').html(asal);
                                

                            }
                        }
                        if(id_rujuk==4){
                            // jika pasien Kontrol Ulang
                            $('.kontrolulang').show();
                        }else $('.kontrolulang').hide();
                        $('#txtNorujuk').focus();
                        //$('#pjPasienDikirimOleh').val("");
                        //$('#pjPasienAlmtPengirim').val("");	        
                    }
                }
            });
        });
        
        $('#e-no_ktp').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-no_ktp').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value.length == 16) {
                    ceknikbpjs(0);
                } else{
                    alert("NIK yang anda masukkan tidak valid "+value.length);
                    $('#e-no_ktp').focus();
                }

            }
            return true;
        });
        $('#e-nama').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-nama').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                
                $('#e-tempat_lahir').focus();
            }
            return true;
        });
        $('#e-no_bpjs').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-no_bpjs').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value.length == 13) {
                    ceknomorbpjs(1);
                } 

            }
            return true;
        });
        $('#e-tempat_lahir').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-tempat_lahir').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("Tempat Lahir Belum Dipilih");
                    $('#e-tempat_lahir').focus();
                } else {
                    $('#e-tgl_lahir').focus();
                }

            }
            return true;
        });
        $('#e-tgl_lahir').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-tgl_lahir').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("Tanggal Lahir Belum Dipilih");
                    $('#e-tgl_lahir').focus();
                } else {
                    $('#e-pgwPria').focus();
                }

            }
            return true;
        });
        $('#kewarganegaraan').change(function() {
            var x = $(this).val();
            if (x == 'WNI') {
                $('.groupKewarganegaraan').hide();
                $('.groupWNI').show();
            } else if (x == 'WNA') {
                $('.groupKewarganegaraan').hide();
                $('.groupWNA').show();
            } else {
                $('.groupKewarganegaraan').hide();
            }
        });
        $('#e-pekerjaan').change(function() {
            var x = $(this).val();
            if (x == 5) {
                $('#e-divpekerjaan').removeClass('col-md-8')
                $('#e-divpekerjaan').addClass('col-md-4')
                $('#e-divlainnya').show();
            }else {
                $('#e-divpekerjaan').removeClass('col-md-4')
                $('#e-divpekerjaan').addClass('col-md-8')
                $('#e-divlainnya').hide();
            }
        });
        $('#e-agama').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-agama').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("Agama Belum Dipilih");
                    $('#e-agama').focus();
                } else {
                    $('#e-pendidikan').focus();
                }

            }
            return true;
        });
        $('#e-pendidikan').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-pendidikan').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("Pendidikan Belum Dipilih");
                    $('#e-pendidikan').focus();
                } else {
                    $('#e-pekerjaan').focus();
                }

            }
            return true;
        });
        $('#e-pendidikan').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-pendidikan').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("Pendidikan Belum Dipilih");
                    $('#e-pendidikan').focus();
                } else {
                    $('#e-pekerjaan').focus();
                }

            }
            return true;
        });
        $('#e-pekerjaan').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-pekerjaan').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("Pekerjaan masih Kosong");
                    $('#e-pekerjaan').focus();
                } else {
                    var x = $(this).val();
                    if (x == 5) {
                        $('#e-divpekerjaan').removeClass('col-md-8')
                        $('#e-divpekerjaan').addClass('col-md-4')
                        $('#e-divlainnya').show();
                        $('#e-pekerjaanlain').focus();
                    }else {
                        $('#e-divpekerjaan').removeClass('col-md-4')
                        $('#e-divpekerjaan').addClass('col-md-8')
                        $('#e-divlainnya').hide();
                        $('#e-status_kawin').focus();
                    }
                    
                }

            }
            return true;
        });
        $('#e-pekerjaanlain').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-pekerjaanlain').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("nama Pekerjaan masih Kosong");
                    $('#e-pekerjaanlain').focus();
                } else {
                    $('#e-status_kawin').focus();
                    // $("#status_kawin").select2('open');
                }

            }
            return true;
        });
        $('#e-status_kawin').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-status_kawin').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("Status kawin masih Kosong");
                    $('#e-status_kawin').focus();
                } else {
                    // $('#e-suku').focus();
                    $("#e-suku").select2('open');
                }

            }
            return true;
        });

        $('#e-suku').on('select2:select', function(e) {
            $("#bahasa").select2('open');
        });
        $('#e-bahasa').on('select2:select', function(e) {
            $("#keterbatasanbahasa").focus();
        });
        $('#e-keterbatasanbahasa').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-status_kawin').val();
            if (evt.keyCode == 13) {
                $('#e-no_telpon').focus();
            }
            return true;
        });
        $('#e-no_telpon').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-no_telpon').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("No telp masih Kosong");
                    $('#e-no_telpon').focus();
                } else {
                    $('#e-no_hp').focus();
                    // $("#kewarganegaraan").select2('open');
                }

            }
            return true;
        });
        $('#e-no_hp').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-no_hp').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("No HP masih Kosong");
                    $('#e-no_hp').focus();
                } else {
                    $('#e-nama_ibu_kandung').focus();
                    // $("#kewarganegaraan").select2('open');
                }

            }
            return true;
        });
        $('#e-jns_kelamin').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-jns_kelamin').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    $('#e-jns_kelamin').focus();
                } else {
                    $('#e-agama').focus();
                }

            }
            return true;
        });
        $('#e-nama_ibu_kandung').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-nama_ibu_kandung').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("Nama Ibu Kandung masih Kosong");
                    $('#e-nama_ibu_kandung').focus();
                } else {
                    $('#kewarganegaraan').focus();
                    // $("#kewarganegaraan").select2('open');
                }

            }
            return true;
        });
        $('#kewarganegaraan').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#kewarganegaraan').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("Kewarganegaraan Belum Dipilih");
                    $('#kewarganegaraan').focus();
                } else {
                    // alert(value)
                    if(value=="WNI") $("#nama_provinsi").select2('open');
                    else $("#nama_negara").select2('open');
                }

            }
            return true;
        });
        $('#e-nama_provinsi').on('select2:select', function(e) {
            var a = $('#e-nama_provinsi').val();
            $.ajax({
                type: "POST",
                url: base_url+"pasien_baru/getKab",
                data: {
                    nama_provinsi: a
                },
                success: function(data) {
                    var x = eval("(" + data + ")");
                    var xOption = "";

                    xOption += '<option value="">------------ Pilih option ------------</option>\n';
                    if (x.length > 0) {
                        for (i = 0; i < x.length; i++) {
                            xOption += '<option value="' + x[i]['kode'] + '">' + x[i]['nama'] + '</option>\n';
                        }
                    }
                    $('#e-nama_kab_kota').html(xOption);
                    $('#e-nama_kecamatan').html('<option value="">------------ Pilih option ------------</option>');
                    $('#e-nama_kelurahan').html('<option value="">------------ Pilih option ------------</option>');
                    
                },
                complete: function () {
                    // $('#e-nama_provinsi_domisili').triger('change');
                    $("#nama_kab_kota").select2('open');
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert('Response : ' + thrownError);
                }
            });
        });
        $('#e-nama_kab_kota').on('select2:select', function(e) {
            var a = $('#e-nama_kab_kota').val();
            $.ajax({
                type: "POST",
                url: base_url+"pasien_baru/getKec",
                data: {
                    nama_kab_kota: a
                },
                success: function(data) {
                    var x = eval("(" + data + ")");
                    var xOption = "";

                    xOption += '<option value="">------------ Pilih option ------------</option>\n';
                    if (x.length > 0) {
                        for (i = 0; i < x.length; i++) {
                            xOption += '<option value="' + x[i]['kode'] + '">' + x[i]['nama'] + '</option>\n';
                        }
                    }
                    $('#e-nama_kecamatan').html(xOption);
                    $('#e-nama_kelurahan').html('<option value="">------------ Pilih option ------------</option>');
                },
                complete: function () {
                    // $('#e-nama_provinsi_domisili').triger('change');
                    $("#nama_kecamatan").select2('open');
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert('Response : ' + thrownError);
                }
            });
        });
        $('#e-nama_kecamatan').on('select2:select', function(e) {
            var a = $('#e-nama_kecamatan').val();
            $.ajax({
                type: "POST",
                url: base_url+"pasien_baru/getKel",
                data: {
                    nama_kecamatan: a
                },
                success: function(data) {
                    var x = eval("(" + data + ")");
                    var xOption = "";

                    xOption += '<option value="">------------ Pilih option ------------</option>\n';
                    if (x.length > 0) {
                        for (i = 0; i < x.length; i++) {
                            xOption += '<option value="' + x[i]['kode'] + '">' + x[i]['nama'] + '</option>\n';
                        }
                    }
                    $('#e-nama_kelurahan').html(xOption);
                },
                complete: function () {
                    $("#nama_kelurahan").select2('open');
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert('Response : ' + thrownError);
                }
            });
        });
        $('#e-nama_kelurahan').on('select2:select', function(e) {
            $("#alamat").focus();
        });

        $('#e-alamat').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-alamat').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("Alamat masih kosong");
                    $('#e-alamat').focus();
                } else {
                    $('#e-rt').focus();
                }

            }
            return true;
        });

        $('#e-rt').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-rt').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("RT masih kosong");
                    $('#e-rt').focus();
                } else {
                    $('#e-rw').focus();
                }

            }
            return true;
        });
        $('#e-rw').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-rt').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("RT masih kosong");
                    $('#e-rw').focus();
                } else {
                    $('#e-kodepos').focus();
                }

            }
            return true;
        });
        $('#e-kodepos').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-kodepos').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("Kode Pos masih kosong");
                    $('#e-kodepos').focus();
                } else {
                    $('#e-domisilisesuaiktp').focus();
                }

            }
            return true;
        });
        $('#e-domisilisesuaiktp').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-domisilisesuaiktp').prop("checked");
            if (evt.keyCode == 13) {
                // alert(value)
                if(value==true){
                    $('.domisili').hide();
                    $('#e-penanggung_jawab').focus();
                    
                }else{
                    $('.domisili').show();
                    $('#e-nama_provinsi_domisili').select2('open');
                }
            }
            return true;
        });
        $('#e-nama_provinsi_domisili').on('select2:select', function(e) {
            var a = $('#e-nama_provinsi_domisili').val();
            $.ajax({
                type: "POST",
                url: base_url+"pasien_baru/getKab",
                data: {
                    nama_provinsi: a
                },
                success: function(data) {
                    var x = eval("(" + data + ")");
                    var xOption = "";

                    xOption += '<option value="">------------ Pilih option ------------</option>\n';
                    if (x.length > 0) {
                        for (i = 0; i < x.length; i++) {
                            xOption += '<option value="' + x[i]['kode'] + '">' + x[i]['nama'] + '</option>\n';
                        }
                    }
                    $('#e-nama_kab_kota_domisili').html(xOption);
                    $('#e-nama_kecamatan_domisili').html('<option value="">------------ Pilih option ------------</option>');
                    $('#e-nama_kelurahan_domisili').html('<option value="">------------ Pilih option ------------</option>');
                    
                },
                complete: function () {
                    // $('#e-nama_provinsi_domisili').triger('change');
                    $("#nama_kab_kota_domisili").select2('open');
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert('Response : ' + thrownError);
                }
            });

            

        });
        $('#e-nama_kab_kota_domisili').on('select2:select', function(e) {
            var a = $('#e-nama_kab_kota_domisili').val();
            $.ajax({
                type: "POST",
                url: base_url+"pasien_baru/getKec",
                data: {
                    nama_kab_kota: a
                },
                success: function(data) {
                    var x = eval("(" + data + ")");
                    var xOption = "";

                    xOption += '<option value="">------------ Pilih option ------------</option>\n';
                    if (x.length > 0) {
                        for (i = 0; i < x.length; i++) {
                            xOption += '<option value="' + x[i]['kode'] + '">' + x[i]['nama'] + '</option>\n';
                        }
                    }
                    $('#e-nama_kecamatan_domisili').html(xOption);
                    $('#e-nama_kelurahan_domisili').html('<option value="">------------ Pilih option ------------</option>');
                },
                complete: function () {
                    // $('#e-nama_provinsi_domisili').triger('change');
                    $("#nama_kecamatan_domisili").select2('open');
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert('Response : ' + thrownError);
                }
            });
        });
        $('#e-nama_kecamatan_domisili').on('select2:select', function(e) {
            var a = $('#e-nama_kecamatan_domisili').val();
            $.ajax({
                type: "POST",
                url: base_url+"pasien_baru/getKel",
                data: {
                    nama_kecamatan: a
                },
                success: function(data) {
                    var x = eval("(" + data + ")");
                    var xOption = "";

                    xOption += '<option value="">------------ Pilih option ------------</option>\n';
                    if (x.length > 0) {
                        for (i = 0; i < x.length; i++) {
                            xOption += '<option value="' + x[i]['kode'] + '">' + x[i]['nama'] + '</option>\n';
                        }
                    }
                    $('#e-nama_kelurahan_domisili').html(xOption);
                },
                complete: function () {
                    $("#nama_kelurahan_domisili").select2('open');
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert('Response : ' + thrownError);
                }
            });
            
        });
        $('#e-nama_kelurahan_domisili').on('select2:select', function(e) {
            $("#alamat_domisili").focus();
        });
        $('#e-alamat_domisili').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-alamat_domisili').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("Alamat masih kosong");
                    $('#e-alamat_domisili').focus();
                } else {
                    $('#e-rt_domisili').focus();
                }

            }
            return true;
        });

        $('#e-rt_domisili').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-rtdomisili').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("RT masih kosong");
                    $('#e-rt_domisili').focus();
                } else {
                    $('#e-rw_domisili').focus();
                }

            }
            return true;
        });
        $('#e-rw_domisili').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-rt').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("RW masih kosong");
                    $('#e-rw_domisili').focus();
                } else {
                    $('#e-kodepos_domisili').focus();
                }

            }
            return true;
        });
        $('#e-kodepos_domisili').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-kodepos_domisili').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("Kode Pos masih kosong");
                    $('#e-kodepos_domisili').focus();
                } else {
                    $('#e-penanggung_jawab').focus();
                }

            }
            return true;
        });
        $('#e-penanggung_jawab').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-penanggung_jawab').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("penanggung jawab masih kosong");
                    $('#e-penanggung_jawab').focus();
                } else {
                    $('#e-umur_pj').focus();
                }

            }
            return true;
        });
        $('#e-umur_pj').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-umur_pj').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("Umur penanggung jawab masih kosong");
                    $('#e-umur_pj').focus();
                } else {
                    $('#e-pekerjaan_pj').focus();
                }

            }
            return true;
        });
        $('#e-pekerjaan_pj').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-pekerjaan_pj').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("Pekerjaan penanggung jawab masih kosong");
                    $('#e-pekerjaan_pj').focus();
                } else {
                    $('#e-alamat_pj').focus();
                }

            }
            return true;
        });
        $('#e-alamat_pj').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-alamat_pj').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("Alamat penanggung jawab masih kosong");
                    $('#e-alamat_pj').focus();
                } else {
                    $('#e-no_penanggung_jawab').focus();
                }

            }
            return true;
        });
        $('#e-no_penanggung_jawab').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-no_penanggung_jawab').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("No penanggung jawab masih kosong");
                    $('#e-no_penanggung_jawab').focus();
                } else {
                    $('#e-hub_keluarga').focus();
                }

            }
            return true;
        });
        $('#e-hub_keluarga').keydown(function(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            var value = $('#e-hub_keluarga').val();
            if (evt.keyCode == 13) {
                console.log(evt.keyCode);
                if (value == '') {
                    alert("hubungan keluarga masih kosong");
                    $('#e-hub_keluarga').focus();
                } else {
                    $('#e-btnSimpan').focus();
                }

            }
            return true;
        });
    });

    function searchRujukan() {
        alert("cari");
    }





    // function cariRujukanPasien() {
    //     var a = $('#no_rujuk').val();
    //     var b = $('#optAsalRujukan').val();
    //     var fomrdata = {
    //         param1: a, // No rujukan
    //         param2: b // Faskes Asal Rujukan
    //     }
    //     $.ajax({
    //         url: "<?php echo base_url() . 'api.php/vclaim/rujukan/rujukanBerdasarkanNomorRujukan' ?>",
    //         type: "POST",
    //         data: fomrdata,
    //         dataType: "JSON",
    //         beforeSend: function() {
    //             // $('#btnCariRujukanPasien').setattr('disabled','disabled');
    //             $('#btnCariRujukanPasien').prop("disabled", true); // Element(s) are now enabled.
    //             $('#btnCariRujukanPasien').html("<i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu");
    //         },
    //         success: function(data) {
    //             $('#btnCariRujukanPasien').prop("disabled", false); // Element(s) are now enabled.
    //             $('#btnCariRujukanPasien').html("Cari");
    //             if (data.metaData.code == 200) {
    //                 var x = data.response.rujukan;
    //                 var asalRujukan = $('#optAsalRujukan').val();
    //                 var tglSEP = $('#txtTanggal').val();
    //                 /** 
    //                 console.log(x.toSource());
    //                 alert(x['diagnosa']['nama']);
    //                 alert(x[0]['noKunjungan']);
    //                 */
    //                 // alert("myObject is " + x.toSource());
    //                 $('#cbasalrujukan').val(asalRujukan).trigger('change');
    //                 $('#txtnmpoli').val(x['poliRujukan']['nama']);
    //                 $('#txtkdpoli').val(x['poliRujukan']['kode']);
    //                 $('#txtkdppkasalrujukan').val(x['provPerujuk']['kode']);
    //                 $('#txtppkasalrujukan').val(x['provPerujuk']['nama']);
    //                 $('#txttglrujukan').val(x['tglKunjungan']);
    //                 $('#txtnorujukan').val(x['noKunjungan']);
    //                 $('#noSurat').val('');
    //                 $('#noSurat').val('');
    //                 // Belum ditemukan
    //                 $('#txtidkontrol').val('');
    //                 $('#noSuratlama').val('');
    //                 $('#txtpoliasalkontrol').val('');
    //                 $('#txttglsepasalkontrol').val('');

    //                 $('#txtnmdpjp').val('');
    //                 $('#kodeDPJP').val('');

    //                 $('#txttglsep').val(tglSEP);
    //                 $('#txtnomr').val(x['peserta']['mr']['noMR']);
    //                 $('#txtnomr').val(x['peserta']['mr']['noMR']);

    //                 $('#txtnmdiagnosa').val(x['diagnosa']['nama']);
    //                 $('#diagAwal').val(x['diagnosa']['kode']);

    //                 $('#noTelp').val(x['peserta']['mr']['noTelepon']);

    //                 $('#catatan').val('');
    //                 $('#lakaLantas').prop('selectedIndex', 1);


    //                 $('#lblnama').html(x['peserta']['nama']);
    //                 $('#lblnoka').html(x['peserta']['noKartu']);
    //                 $('#txtkelamin').val(x['peserta']['sex']);
    //                 $('#txtkdstatuspst').val(x['peserta']['statusPeserta']['kode']);

    //                 $('#lblnik').html(x['peserta']['nik']);
    //                 $('#lblnokartubapel').html('');
    //                 $('#lbltgllahir').html(x['peserta']['tglLahir']);
    //                 $('#lblpisa').html(x['peserta']['pisa']);
    //                 $('#lblfktp').html(x['peserta']['provUmum']['kdProvider'] + '-' + x['peserta']['provUmum']['nmProvider']);
    //                 $('#txtppkasalpst').html(x['peserta']['provUmum']['kdProvider']);
    //                 $('#lbltmt_tat').html(x['peserta']['tglTMT'] + '-' + x['peserta']['tglTAT']);
    //                 $('#txttmtpst').html(x['peserta']['tglTMT']);
    //                 $('#lblpeserta').html(x['peserta']['jenisPeserta']['keterangan']);
    //                 $('#txtjnspst').html(x['peserta']['jenisPeserta']['kode']);

    //                 $('#lblnoasu').html(x['peserta']['cob']['noAsuransi']);
    //                 $('#txtkdasu').html('');
    //                 $('#lblnmasu').html(x['peserta']['cob']['nmAsuransi']);
    //                 $('#lbltmt_tatasu').html(x['peserta']['cob']['tglTMT'] + ' s/d ' + x['peserta']['cob']['tglTAT']);
    //                 $('#lblnamabu').html('');
    //                 $('#txtkdbu').html('');

    //                 $('#mpop_rujukan').modal('hide');
    //                 // $('#formModalSEP').modal('hide');

    //                 $('#mpop_sep').modal('show');
    //             } else {
    //                 alert(data.metaData.message);
    //             }

    //         },
    //         error: function(jqXHR, ajaxOption, errorThrown) {
    //             $('#btnCariRujukanPasien').prop("disabled", false); // Element(s) are now enabled.
    //             $('#btnCariRujukanPasien').html("Cari");
    //             console.log(jqXHR.responseText);
    //         }
    //     });
    // }

    function getHistoryPasien() {
        var nomr = '<?php echo $nomr ?>';
        $.ajax({
            url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/getHistoryPasien' ?>",
            type: "POST",
            data: {
                nomr: nomr
            },
            beforeSend: function() {
                $('tbody#getHistoryPasien').html("<tr><td colspan=7><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
            },
            success: function(data) {
                $('tbody#getHistoryPasien').html(data);
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                $('tbody#getHistoryPasien').html("<tr><td colspan=7>Data tidak ada</td></tr>");
                console.log(jqXHR.responseText);
            }
        });
    }

    function updateNoBPJS() {
        var a = '<?php echo $nomr ?>';
        var b = $('#no_bpjs').val();
        var formdata = {
            'nomr': a,
            'no_bpjs': b
        }
        if (a == "") {
            alert('No MR tidak boleh kosong');
        } else if (b == "") {
            alert('No Peserta atau No BPJS (Untuk Layanan BPJS) tidak boleh kosong');
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/updateNoBPJS' ?>",
                type: "POST",
                data: formdata,
                dataType: "JSON",
                beforeSend: function() {
                    $('#btnUpdateNoBPJS').html("<i class='fa fa-refresh fa-spin'></i> Processing");
                },
                success: function(data) {
                    $('#btnUpdateNoBPJS').html("<i class='fa fa-save'></i> Update");
                    alert(data.message);
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    $('#btnUpdateNoBPJS').html("<i class='fa fa-save'></i> Update");
                    console.log(jqXHR.responseText);
                }
            });
        }
    }

    function cekSEP() {
        var pesan = "";
        var a = $('#no_jaminan').val();
        var formdata = {
            'param1': a
        }
        if (a == "") {
            alert('No Jaminan atau No BPJS (Untuk Layanan BPJS) tidak boleh kosong');
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'api.php/vclaim/sep/cariSEP' ?>",
                type: "POST",
                data: formdata,
                dataType: "JSON",
                beforeSend: function() {
                    $('#btnCekSEP').addClass('disabled');
                    $('#btnCekSEP').html("<i class='fa fa-refresh fa-spin'></i> Processing");
                },
                success: function(data) {
                    $('#btnCekSEP').removeClass('disabled');
                    $('#btnCekSEP').html("Cek SEP (<em>JKN Bridging</em>)");

                    if (data.metaData.code == 200) {
                        var _a = data.response.peserta.nama;
                        var _b = data.response.peserta.noKartu;
                        var _c = data.response.peserta.noMr;
                        var _d = data.response.tglSep;
                        var _e = data.response.jnsPelayanan;
                        var _f = data.response.peserta.jnsPeserta;
                        if (_e.trim() == 'Rawat Inap') {
                            titleNotif = 'SEP ini bukan untuk Rawat Jalan';
                            pesan = 'Tgl SEP : ' + _d + '\n' + 'SEP atas nama : ' + _a + '\n' + 'No Kartu : ' + _b + '\n' + 'No MR : ' + _c + '\n' + 'Jenis Pelayanan : ' + _e + '\n' + 'Jenis Peserta : ' + _f;
                            tampilkanPesan('error', pesan, titleNotif);
                            $('#daftar').focus();
                        } else {
                            pesan = 'Tgl SEP : ' + _d + '\n' + 'SEP atas nama : ' + _a + '\n' + 'No Kartu : ' + _b + '\n' + 'No MR : ' + _c + '\n' + 'Jenis Pelayanan : ' + _e + '\n' + 'Jenis Peserta : ' + _f;
                            tampilkanPesan('success', pesan);
                            $('#daftar').focus();
                        }
                    } else if (data.metaData.code == 201) {
                        pesan = data.metaData.message;
                        tampilkanPesan('error', pesan);
                    } else {
                        pesan = data.metaData.code;
                        tampilkanPesan('error', pesan);
                    }
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    $('#btnCekSEP').removeClass('disabled');
                    $('#btnCekSEP').html("Cek SEP (<em>JKN Bridging</em>)");
                    console.log(jqXHR.responseText);
                }
            });
        }
    }

    function tampilkanPesan(a, b, c = "") {
        if (a == 'error') {
            swal({
                title: c,
                text: b,
                type: "error",
                confirmButtonColor: "#f00",
                confirmButtonText: "OK"
            });
        } else if (a == 'success') {
            swal({
                title: "Data SEP ditemukan",
                text: b,
                type: "success",
                confirmButtonColor: "#034a03",
                confirmButtonText: "OK"
            });
        } else if (a == 'warning') {
            swal({
                title: c,
                text: b,
                type: "warning",
                confirmButtonColor: "#034a03",
                confirmButtonText: "OK"
            });
        } else {
            alert(b);
        }
    }

    function cekDomisili(){
        var domisilisesuaiktp=$('#e-domisilisesuaiktp').prop('checked');
        if(domisilisesuaiktp==true) $('.domisili').hide();
        else $('.domisili').show();
    }
</script>
<script type="text/javascript">
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

    function editDpo(id){
        var url = base_url + "dpo/edit/" + id;
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            data: {},
            success: function (data) {
                if(data.status==true){
                    $('#formdpo').modal('show');
                    $('#Id').val(data.data.Id)
                    $('#dponomr').val(data.data.nomr)
                    $('#dponama').val(data.data.nama)
                    $('#dpoketerangan').val(data.data.keterangan)
                    if(data.data.status_dpo==1)  $('#status_dpo').prop('checked',true);
                    else $('#status_dpo').prop('checked',false);
                    $('#dponomr').prop('readonly',true);
                    $('#dponama').prop('readonly',true);
                }else{
                    tampilkanPesan('error',data.message);
                }
            }
        });
    }
    function simpanDpo(){
        var url = base_url + "dpo/simpan";
        console.log(url);
        var st=$('#status_dpo').prop('checked');
        if(st==true) var status_dpo=1; else var status_dpo=0;
        $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: {
                'Id':$('#Id').val(),
                'nomr':$('#dponomr').val(),
                'nama':$('#dponama').val(),
                'keterangan':$('#dpoketerangan').val(),
                'status_dpo':status_dpo,
            },
            success: function (data) {
                if(data.status==true){
                    location.reload()
                }else{
                    tampilkanPesan('error',data.message);
                }
            }
        });
    }

    // Define the string
    var string = 'Hello World!';

    // Encode the String
    var encodedString = Base64.encode(string);
    // console.log(encodedString); // Outputs: "SGVsbG8gV29ybGQh"

    // Decode the String
    var decodedString = Base64.decode(encodedString);
    // console.log(decodedString); // Outputs: "Hello World!"
    // var base_url = "<?php echo base_url() . "mr_registrasi.php"; ?>";
    var url_call_back = "<?php echo base_url() . "mr_registrasi.php/"; ?>";
    var user = "<?= $this->session->userdata('get_uid') ?>";
</script>
<!-- <script src="<?php echo base_url() ?>js/pendaftaran.js"></script> -->