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

    .divRegCredit {
        display: none
    }

    a em {
        font-size: 10px;
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
                        if ($ranap == 0) {
                        ?>
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible">
                                    <p>Maaf pasien belum bisa didaftarkan karena masih terdaftar sebagai pasien rawat inap, silahkan hubungi kembali bagian ruangan untuk mengkonfirmasi kepulangan pasien</p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Data Pasien</legend>
                                <input type="hidden" name="provinsi" id="provinsi" value="<?= $nama_provinsi ?>">
                                <input type="hidden" name="kabupaten" id="kabupaten" value="<?= $nama_kab_kota ?>">
                                <input type="hidden" name="kecamatan" id="kecamatan" value="<?= $nama_kecamatan ?>">
                                <input type="hidden" name="kelurahan" id="kelurahan" value="<?= $nama_kelurahan ?>">
                                <input type="hidden" name="encryptdata" id='encryptdata' value=''>
                                <input type="hidden" name="txtTanggal" id="txtTanggal" value="<?=date('Y-m-d') ?>">

                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">No Registrasi RS</label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input readonly="" type="text" class="form-control" name="id_daftar" id="id_daftar" value="<?php echo $id_daftar; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">No Registrasi Unit</label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input readonly="" type="text" class="form-control" name="reg_unit" id="reg_unit" value="<?php echo $reg_unit; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">No KTP <label style="color:gray;font-size:x-small">(<em>NIK/Passport</em>)</label></label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="input-group">
                                            <input readonly="" type="text" name="no_ktp" id="no_ktp" class="form-control" value="<?php echo $no_ktp; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">No.MR / Nama Pasien</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <input readonly="" name="nomr" id="nomr" type="text" class="form-control" value="<?php echo $nomr; ?>">
                                            <input type="hidden" name="nama_pasien" id="nama_pasien" value="<?php echo $nama_pasien; ?>">
                                            <span class="input-group-addon" style="width: 200px;text-align: left;">
                                                <?php echo $nama_pasien; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Tempat/Tgl.Lahir</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <input type="hidden" name="tgl_daftar" id="tgl_daftar" value="<?= $tgl_daftar ?>">
                                            <input readonly="" type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?php echo $tempat_lahir; ?>">
                                            <input type="hidden" name="tgl_lahir" id="tgl_lahir" value="<?php echo $tgl_lahir; ?>">
                                            <span class="input-group-addon">
                                                <?php echo $tgl_lahir; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Jenis Kelamin</label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input readonly="" type="text" class="form-control" value="<?php echo ($jns_kelamin == '1') ? 'Laki-Laki' : 'Perempuan'; ?>">
                                        <input type="hidden" name="jns_kelamin" id="jns_kelamin" value="<?php echo $jns_kelamin; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Kiriman dari</label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input type="hidden" name="asal_ruang" id="asal_ruang" value="<?php echo $id_ruang; ?>">
                                        <input readonly="" type="text" name="nama_asal_ruang" id="nama_asal_ruang" class="form-control" value="<?php echo $nama_asal_ruang; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">
                                        <label style="color:gray;font-size:x-small">(dd/mm/yyyy)</label> Tgl.Layanan</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group date">
                                            <input readonly="" type="text" class="form-control" name="tgl_layanan" id="tgl_layanan">
                                            <input type="hidden" name="sekarang" id="sekarang" value="<?= date("Y-m-d") ?>">
                                            <span class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Jenis Layanan</label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="input-group">
                                            <input readonly="" name="jns_layanan" id="jns_layanan" type="text" class="form-control" value="RI">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Penanggung Jawab Pasien</legend>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Nama</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="pjPasienNama" id="pjPasienNama" type="text" class="form-control" value="<?php echo $pjPasienNama; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Umur</label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input name="pjPasienUmur" id="pjPasienUmur" type="text" class="form-control" value="<?php echo $pjPasienUmur; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Pekerjaan</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="pjPasienPekerjaan" id="pjPasienPekerjaan" type="text" class="form-control" value="<?php echo $pjPasienPekerjaan; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Alamat</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <textarea name="pjPasienAlamat" id="pjPasienAlamat" class="form-control" rows="2" maxlength="255"><?php echo $pjPasienAlamat; ?></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Telp/HP</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input name="pjPasienTelp" id="pjPasienTelp" type="text" class="form-control" value="<?php echo $pjPasienTelp; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Hubungan Keluarga</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input name="pjPasienHubKel" id="pjPasienHubKel" type="text" class="form-control" value="<?php echo $pjPasienHubKel; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Dikirim Oleh<br><em>Jika pasien rujukan</em></label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input name="pjPasienDikirimOleh" id="pjPasienDikirimOleh" type="text" class="form-control" value="<?php echo $pjPasienDikirimOleh; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Alamat Pengirim<br><em>Jika pasien rujukan</em></label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <textarea name="pjPasienAlmtPengirim" id="pjPasienAlmtPengirim" class="form-control" rows="2" maxlength="255"><?php echo $pjPasienAlmtPengirim; ?></textarea>
                                </div>
                            </div>

                            <fieldset>
                                <legend>Informasi Pelayanan</legend>

                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Cara Bayar</label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="input-group">
                                            <select class="form-control" name="id_cara_bayar" id="id_cara_bayar" style="width: 300px" onkeydown="enter_carabayar(event)">
                                                <?php foreach ($getCaraBayar->result_array() as $x) : ?>
                                                    <option value="<?php echo $x['idx'] ?>" <?php if ($id_cara_bayar == $x['idx']) echo "selected"; ?>><?php echo $x['cara_bayar'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <input type="hidden" name="jkn" id='jkn' value='0'>
                                            <input type="hidden" name="id_jenis_peserta" id='id_jenis_peserta' value=''>
                                            <input type="hidden" name="jenis_peserta" id='jenis_peserta' value=''>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group divRegCredit">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">No Peserta (<em>No BPJS</em>)</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group">
                                            <input name="no_bpjs" id="no_bpjs" type="text" class="form-control" value="<?php echo $no_bpjs; ?>" onkeydown="enter_nobpjs(event)">
                                            <span class="input-group-addon">
                                                <a id="btnUpdateNoBPJS" href="Javascript:updateNoBPJS()"><i class="fa fa-save"></i> Update</a>
                                            </span>
                                            <span class="input-group-addon" id="status">
                                                <a id="cekStatus" href="Javascript:cekPeserta()"><i class="fa fa-search"></i> Cek</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Dokter Pengirim</label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="input-group">
                                            <select class="form-control" name="dokter_pengirim" id="dokter_pengirim" style="width: 300px" onkeydown="enter_dokterpengirim(event)">
                                                <option value="">-- Pilih --</option>
                                                <?php foreach ($getDokter->result_array() as $xR) : ?>
                                                    <option value="<?php echo $xR['NRP'] ?>" <?php if ($dokterJaga == $xR['NRP']) echo "selected" ?>><?php echo $xR['pgwNama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Kelas Pelayanan</label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="input-group">
                                            <input type="hidden" id="hakKelasid" name="hakKelasid" value="">
                                            <input type="hidden" id="hakKelas" name="hakKelas" value="">
                                            <select class="form-control" name="id_kelas" id="id_kelas" style="width: 300px" onchange="getKamar()" onkeydown="enter_kelas(event)">
                                                <option value="">-- Pilih --</option>
                                                <?php foreach ($getKelas->result_array() as $xKl) : ?>
                                                    <option value="<?php echo $xKl['idx'] ?>"><?php echo $xKl['kelas_layanan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Ruang Perawatan</label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="input-group">
                                            <select class="form-control" name="id_ruang" id="id_ruang" style="width: 300px" onchange="getKamar()" onkeydown="enter_ruangan(event)">
                                                <option value="">-- Pilih --</option>
                                                <?php foreach ($getRuang->result_array() as $xP) : ?>
                                                    <option value="<?php echo $xP['idx'] ?>"><?php echo $xP['ruang'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Kamar Rawatan</label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="input-group">
                                            <select class="form-control" name="id_kamar" id="id_kamar" style="width: 300px" onkeydown="enter_kamar(event)">
                                                <option value="">-- Pilih --</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Dokter DPJP</label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="input-group">
                                            <select class="form-control" name="dokterJaga" id="dokterJaga" style="width: 300px" onkeydown="enter_dokter(event)">
                                                <option value="">-- Pilih --</option>
                                                <?php foreach ($getDokterjaga->result_array() as $xR) : ?>
                                                    <option value="<?php echo $xR['NRP'] ?>" <?php if ($dokterJaga == $xR['NRP']) echo "selected" ?>><?php echo $xR['pgwNama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <?php
                                if (STATUS_VC == "0") {
                                ?>
                                    <div class="form-group divRegCredit">
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">No Jaminan (<em>SEP</em>)</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="input-group">
                                                <input name="no_jaminan" id="no_jaminan" type="text" class="form-control">
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
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">No Jaminan (<em>SEP</em>)</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="input-group ">
                                                <input name="no_jaminan" id="no_jaminan" type="text" class="form-control" onkeydown="controlSEP(event)">
                                                <div class="input-group-btn" id='prosessep'>
                                                    <a href="Javascript:formSEP()" class="btn btn-danger">Create SEP (<em>Bridging</em>)</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-12">
                                        <div class="input-group">
                                            <button type="button" id="batal" class="btn btn-danger">
                                                <i class="fa fa-rotate-left"></i> Batal</button>
                                            <button type="button" id="daftar" class="btn btn-primary" <?php if ($ranap == 0) echo "disabled"; ?>>
                                                Daftar <i class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Riwayat berobat</h3>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
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
        </div>
    </div>
</section>
<div class="modal fade" id="mpop_sep" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg" style="overflow-y: initial !important;  max-height:85%">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="headRujukan">SEP Rawat Inap</h3>
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
                                                        <span class="fa fa-sort-numeric-asc"></span> <a title="NIK" class="pull-right-container" id="lblnik"></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="fa fa-credit-card"></span> <a title="No.Kartu Bapel JKK" class="pull-right-container" id="lblnokartubapel"></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="fa fa-calendar"></span> <a title="Tanggal Lahir" class="pull-right-container" id="lbltgllahir"></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="fa fa-user"></span> <a title="PISA" class="pull-right-container" id="lblpisa"></a>
                                                    </li>

                                                    <li class="list-group-item">
                                                        <span class="fa fa-hospital-o"></span> <a title="Hak Kelas Rawat" class="pull-right-container" id="lblhakkelas"></a>

                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="fa fa-stethoscope"></span> <a title="Faskes Tingkat 1" class="pull-right-container" id="lblfktp"></a>

                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="fa fa-calendar"></span> <a title="TMT dan TAT Peserta" class="pull-right-container" id="lbltmt_tat"></a>

                                                    </li>
                                                    <li class="list-group-item">
                                                        <span class="fa fa-calendar"></span> <a title="Jenis Peserta" class="pull-right-container" id="lblpeserta"></a>

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
                                                        <span class="fa fa-bank"></span> <a title="Nama Badan Usaha" class="pull-right-container" id="lblnamabu"></a>

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
                            <input type="hidden" name="idx" id="idx" value="">
                            <input type="hidden" name="noKartu" id="noKartu" value="">
                            <input type="hidden" name="jnsPelayanan" id="jnsPelayanan" value="1">
                            <!--input type="hidden" name="noMR" id="noMR" value=""-->
                            <input type="hidden" name="asalRujukan" id="asalRujukan" value="">
                            <input type="hidden" name="ppkRujukan" id="ppkRujukan" value="0306R001">



                            <div class="box-body">
                                <div class="row">
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
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Dokter Yang Melayani <label style="color:red;font-size:small">*</label></label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <!--input type="text" class="form-control ui-autocomplete-input" id="txtnmDokter" placeholder="ketik nama dokter Yang menangini">
                                            <input type="hidden" id="kodeDokter" value=""-->
                                            <select name="kodeDokter" id="kodeDokter" class="form-control" style="width: 100%;"></select>
                                            <span class="text-error"></span>
                                        </div>
                                    </div>
                                    <div id="divRujukan">
                                        <div class="form-group rajal">
                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Asal Rujukan</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select class="form-control" id="cbasalrujukan" name="cbasalrujukan" style="width:100%" disabled="">
                                                    <option value="1">Faskes Tingkat 1</option>
                                                    <option value="2">Faskes Tingkat 2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group rajal">
                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label" id="ppk">PPK Asal Rujukan <label style="color:red;font-size:small">*</label></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control ui-autocomplete-input" id="txtppkasalrujukan" placeholder="ketik kode atau nama ppk asal rujukan min 3 karakter" disabled="">
                                                <input type="hidden" class="form-control" name="ppkPelayanan" id="ppkPelayanan" value="0306R001">
                                                <input type="hidden" class="form-control" id="txtkdppkasalrujukan" value="0306R001">
                                            </div>
                                        </div>
                                        <div class="form-group rajal">
                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label"><label style="color:gray;font-size:x-small">(yyyy-mm-dd)</label> Tgl.Rujukan</label>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="input-group date">
                                                    <input type="text" class="form-control datepicker" name="tglRujukan" id="tglRujukan" placeholder="yyyy-MM-dd" maxlength="10" value="<?= date("Y-m-d") ?>">
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar">
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group rajal">
                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. Rujukan <label style="color:red;font-size:small">*</label></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" name="noRujukan" id="noRujukan" placeholder="ketik nomor rujukan" maxlength="19">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- kontrol -->
                                    <div id="divkontrol " class='divkontrol rajal' style="display: block;">
                                        <div class="form-group">
                                            <label class="col-md-3 col-sm-3 col-xs-12 control-label" id="lblkontrol">No.SPRI <label style="color:red;font-size:small">*</label></label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" id="noSurat" placeholder="ketik nomor surat Pengantar Rawat Inap" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6">
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
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end kontrol -->
                                    <div class="clearfix"></div <!-- sep -->
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label"><label style="color:gray;font-size:x-small">(yyyy-mm-dd)</label> Tgl. SEP</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="input-group date">
                                                <input type="text" class="form-control datepicker" id="txttglsep" placeholder="yyyy-MM-dd" maxlength="10">
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
                                            <select class="form-control" name="klsRawat" id="klsRawat" style="width:50%">
                                                <option value="1">Kelas 1</option>
                                                <option value="2">Kelas 2</option>
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
                                            <input type="text" class="form-control" id="noTelp" placeholder="ketik nomor telepon yang dapat dihubungi" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="15">
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
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Katarak <input type="checkbox" id="chkkatarak" value="1"></label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <p class="text-muted well well-sm no-shadow">Centang Katarak <i class="fa fa-check"></i>, Jika Peserta Tersebut Mendapatkan Surat Perintah Operasi katarak</p>
                                        </div>
                                    </div>

                                    <!--  lakalantas-->
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Status Kecelakaan <label style="color:red;font-size:small">*</label></label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select class="form-control " id="lakaLantas" onchange="lakalantas()" style="width:100%">
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
<!--script src="<?php //echo base_url() 
                ?>assets/bower_components/jquery/dist/jquery.js"></script-->
<script src="<?php echo base_url() ?>assets/jquery/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/jquery/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/popper/popper.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/tooltip/tooltip.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#id_cara_bayar').focus();
        var mask = "<?php echo KODERS_VC ?>9999V999999";
        $('#no_jaminan').val('');
        if ($('#chkIsJaminan').is(':checked')) {
            $('#no_jaminan').inputmask(mask, {
                'placeholder': '<?php echo KODERS_VC ?>____V______'
            });
        } else {
            $('#no_jaminan').inputmask('remove');
        }
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        $('#chkIsJaminan').click(function() {
            if ($('#chkIsJaminan').is(':checked')) {
                $('#no_jaminan').inputmask(mask, {
                    'placeholder': '<?php echo KODERS_VC ?>____V______'
                });
            } else {
                $('#no_jaminan').inputmask('remove');
            }
        });
        $('input').focus(function() {
            return $(this).select();
        })
        getHistoryPasien();
        $('#tgl_layanan').val('<?php echo date("d/m/Y") ?>');
        //$('select').select2({placeholder:'-- Pilih --'})
        $('#batal').click(function() {
            var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/rawat_inap' ?>';
            window.location.href = url;
        });

        //$('#id_cara_bayar').val(id_cara_bayar).trigger('change');
        caraBayar();
        $('#id_cara_bayar').change(function() {
            /*var x = $('#id_cara_bayar :selected').html();
            if (x == "Umum") {
                $('.divRegCredit').hide();
            }else if (x == "Kemitraan RS") {
                $('#no_jaminan').inputmask('remove');
                $('#chkIsJaminan').prop('disabled',true);
            }else{
                $('.divRegCredit').show();
                $('#chkIsJaminan').prop('disabled',false);
            }*/
            cekCarabayar();
        });
        $('#id_cara_bayar').trigger("change");
        $('#daftar').click(function() {
            var formdata = {
                id_daftar: $('#id_daftar').val(),
                reg_unit: $('#reg_unit').val(),
                nomr: $('#nomr').val(),
                no_ktp: $('#no_ktp').val(),
                nama_pasien: $('#nama_pasien').val(),
                tempat_lahir: $('#tempat_lahir').val(),
                tgl_lahir: $('#tgl_lahir').val(),
                jns_kelamin: $('#jns_kelamin').val(),
                nama_provinsi: $('#provinsi').val(),
                nama_kab_kota: $('#kabupaten').val(),
                nama_kecamatan: $('#kecamatan').val(),
                nama_kelurahan: $('#kelurahan').val(),
                asal_ruang: $('#asal_ruang').val(),
                nama_asal_ruang: $('#nama_asal_ruang').val(),
                tgl_layanan: $('#tgl_layanan').val(),
                jns_layanan: $('#jns_layanan').val(),
                pjPasienNama: $('#pjPasienNama').val(),
                pjPasienUmur: $('#pjPasienUmur').val(),
                pjPasienPekerjaan: $('#pjPasienPekerjaan').val(),
                pjPasienAlamat: $('#pjPasienAlamat').val(),
                pjPasienTelp: $('#pjPasienTelp').val(),
                pjPasienHubKel: $('#pjPasienHubKel').val(),
                pjPasienDikirimOleh: $('#pjPasienDikirimOleh').val(),
                pjPasienAlmtPengirim: $('#pjPasienAlmtPengirim').val(),
                dokter_pengirim: $('#dokter_pengirim').val(),
                nama_dokter_pengirim: $('#dokter_pengirim :selected').html(),
                dokterJaga: $('#dokterJaga').val(),
                namaDokterJaga: $('#dokterJaga :selected').html(),
                id_kamar: $('#id_kamar').val(),
                nama_kamar: $('#id_kamar :selected').html(),
                id_ruang: $('#id_ruang').val(),
                nama_ruang: $('#id_ruang :selected').html(),
                id_kelas: $('#id_kelas').val(),
                kelas_layanan: $('#id_kelas :selected').html(),
                id_cara_bayar: $('#id_cara_bayar').val(),
                cara_bayar: $('#id_cara_bayar :selected').html(),
                id_jenis_peserta: $('#id_jenis_peserta').val(),
                jenis_peserta: $('#jenis_peserta').val(),
                no_bpjs: $('#no_bpjs').val(),
                no_jaminan: $('#no_jaminan').val(),
                tgl_daftar: $('#tgl_daftar').val(),
                hakKelasid: $('#hakKelasid').val(),
                hakKelas: $('#hakKelas').val()
            }

            if (formdata['id_daftar'] == "") {
                alert('Ops. No Registrasi RS kosong. Coba ulangi lagi');
            } else if (formdata['reg_unit'] == "") {
                alert('Ops. No Registrasi Unit kosong. Coba ulangi lagi');
            } else if (formdata['nomr'] == "") {
                alert('Ops. No.MR tidak kosong. Coba ulangi lagi');
            } else if (formdata['asal_ruang'] == "") {
                alert('Ops. Asal poli kosong. Coba ulangi lagi');
            } else if (formdata['pjPasienNama'] == "") {
                alert('Ops. Nama penanggung jawab pasien tidak boleh kosong.');
                $('#pjPasienNama').focus()
            } else if (formdata['dokter_pengirim'] == "") {
                alert('Ops. Dokter pengirim harus di pilih.');
            } else if (formdata['id_ruang'] == "") {
                alert('Ops. Tujuan layanan harus di pilih.');
            } else if (formdata['id_kelas'] == "") {
                alert('Ops. Kelas pelayanan harus di pilih.');
            } else if (formdata['id_cara_bayar'] == "") {
                alert('Ops. Cara bayar harus di pilih.');
            } else if (formdata['dokterJaga'] == "") {
                alert('Ops. Dokter DPJP harus di pilih.');
            } else {
                var x = confirm("Apakah anda yakin akan melanjutkan proses pendaftaran pasien ini?");
                if (x) {
                    console.clear();
                    console.log(formdata);
                    $.ajax({
                        url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/daftar_ranap' ?>",
                        type: "POST",
                        data: formdata,
                        dataType: "JSON",
                        success: function(data) {
                            if (data.code == 200) {
                                var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/reg_success_ranap?uid=' ?>' + data.unikID;
                                window.location.href = url;
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
        });

        /***
         * Auto Complete
         */
        /*$("#txtnmpoli").autocomplete({
                source: function(request, response) {

                    $.ajax({
                        url: "<?php //echo base_url() . 'api.php/vclaim/referensi/poli' ?>",
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
        */
        /*$("#txtnmdpjp").autocomplete({
                source: function(request, response) {

                    $.ajax({
                        url: "<?php //echo base_url() . 'api.php/vclaim/referensi/dokter' ?>",
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
            */
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
    });

    function caraBayar() {
        var x = $('#id_cara_bayar :selected').html();
        if (x == "Umum") {
            $('.divRegCredit').hide();
        } else if (x == "Kemitraan RS") {
            $('#no_jaminan').inputmask('remove');
            $('#chkIsJaminan').prop('disabled', true);
        } else {
            $('.divRegCredit').show();
            $('#chkIsJaminan').prop('disabled', false);
        }
    }

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
        var titleNotif = "";
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
                        if (_e.trim() == 'Rawat Jalan') {
                            titleNotif = 'SEP ini bukan untuk Rawat Inap';
                            pesan = 'Tgl SEP : ' + _d + '\n' + 'SEP atas nama : ' + _a + '\n' + 'No Kartu : ' + _b + '\n' + 'No MR : ' + _c + '\n' + 'Jenis Pelayanan : ' + _e + '\n' + 'Jenis Peserta : ' + _f;
                            tampilkanPesan('error', pesan, titleNotif);
                        } else {
                            pesan = 'Tgl SEP : ' + _d + '\n' + 'SEP atas nama : ' + _a + '\n' + 'No Kartu : ' + _b + '\n' + 'No MR : ' + _c + '\n' + 'Jenis Pelayanan : ' + _e + '\n' + 'Jenis Peserta : ' + _f;
                            tampilkanPesan('success', pesan);
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

    function getKamar() {
        var idruang = $('#id_ruang').val();
        var kelasid = $('#id_kelas').val();
        var url = "<?= base_url() . "mr_registrasi.php/registrasi/kamar/"; ?>" + idruang + "/" + kelasid;
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                if (data["status"] == true) {
                    var r = data["data"];
                    var jmlData = r.length;
                    var row = "";
                    var isi_lk = 0;
                    var isi_pr = 0;
                    var terisi = 0;
                    for (var i = 0; i < jmlData; i++) {
                        isi_lk = parseInt(r[i]["terisi_lk"]);
                        isi_pr = parseInt(r[i]["terisi_pr"]);
                        terisi = isi_lk + isi_pr;
                        console.log(r[i]["nama_kamar"] + terisi);
                        if (terisi == r[i]["jml_tt"]) row += "<option value='" + r[i]["id_kamar"] + "' disabled>" + r[i]["nama_kamar"] + "(Penuh)</option>";
                        else row += "<option value='" + r[i]["id_kamar"] + "'>" + r[i]["nama_kamar"] + "</option>";
                    }
                    $('#id_kamar').html(row);
                } else {
                    alert(data["message"]);
                }
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                $('#btnUpdateNoBPJS').html("<i class='fa fa-save'></i> Update");
                console.log(jqXHR.responseText);
            }
        });
    }

    /*function formSEP() {

        var nobpjs = $('#no_bpjs').val();
        formSEPRANAP(nobpjs, '<?= date('Y-m-d') ?>');

    }*/

    function cekCarabayar() {
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
                        $('.divRegCredit').hide();
                    } else {
                        $('.divRegCredit').show();
                        $('#chkIsJaminan').prop('disabled', false);
                        $("#cariRujukan").removeAttr('disabled');
                    }
                } else {
                    $('#jkn').val("0")
                }
            }
        });
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

    // Define the string
    var string = 'Hello World!';

    // Encode the String
    var encodedString = Base64.encode(string);
    // console.log(encodedString); // Outputs: "SGVsbG8gV29ybGQh"

    // Decode the String
    var decodedString = Base64.decode(encodedString);
    // console.log(decodedString); // Outputs: "Hello World!"
    var base_url = "<?php echo base_url() . "mr_registrasi.php"; ?>";
    var url_call_back = "<?php echo base_url() . "api.php/"; ?>";
    var user = "<?= $this->session->userdata('get_uid') ?>";
    cekPeserta();
</script>
<script src="<?php echo base_url() ?>js/pendaftaran.js"></script>