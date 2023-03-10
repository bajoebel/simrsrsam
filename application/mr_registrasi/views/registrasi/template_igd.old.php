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
            height: 600px;
            white-space: nowrap
        }
    }

    .modal-content {
        /*max-height: 600px;*/
        max-width: 100%;
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

    .adarujukan {
        display: none;
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <form id="form1" class="form-horizontal" onSubmit="return false" method="POST">
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
                        }
                        ?>
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Data Pasien</legend>
                                <input type="hidden" name="reg_unit" id="reg_unit" value="">
                                <input type="hidden" name="provinsi" id="provinsi" value="<?= $nama_provinsi ?>">
                                <input type="hidden" name="kabupaten" id="kabupaten" value="<?= $nama_kab_kota ?>">
                                <input type="hidden" name="kecamatan" id="kecamatan" value="<?= $nama_kecamatan ?>">
                                <input type="hidden" name="kelurahan" id="kelurahan" value="<?= $nama_kelurahan ?>">
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">No MR / Nama Pasien</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <input readonly="" type="text" class="form-control" name="nomr" id="nomr" value="<?php echo $nomr; ?>">
                                            <span class="input-group-addon" style="width:250px">
                                                <?php echo $nama; ?>
                                                <input type="hidden" name="nama" id="nama" value="<?php echo $nama; ?>">
                                            </span>
                                            <span class="input-group-addon">
                                                <a href="#" onclick="editPasien('<?= $nomr ?>')"><span class="fa fa-pencil"></span> Edit</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">No KTP <label style="color:gray;font-size:x-small">(<em>NIK/Passport</em>)</label></label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <input readonly="" name="no_ktp" id="no_ktp" type="text" class="form-control" value="<?php echo $no_ktp; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Tempat/Tgl.Lahir</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
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
                                        <input type="hidden" name="jns_kelamin" id="jns_kelamin" value="<?php echo $jns_kelamin; ?>">
                                        <input readonly="" type="text" class="form-control" value="<?php echo ($jns_kelamin == '1') ? 'Laki-Laki' : 'Perempuan'; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">
                                        <label style="color:gray;font-size:x-small">(dd/mm/yyyy)</label> Tgl.Layanan</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group date">
                                            <input type="hidden" name="tgl_daftar" id="tgl_daftar" value="<?= $tgl_daftar ?>">
                                            <input readonly="" type="text" name="tgl_layanan" class="form-control" id="tgl_layanan">
                                            <input type="hidden" name="sekarang" id="sekarang" value="<?= date('Y-m-d') ?>">
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
                                            <input readonly="" name="jns_layanan" id="jns_layanan" type="text" class="form-control" value="GD">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Penanggung Jawab Pasien</legend>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Nama</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="pjPasienNama" id="pjPasienNama" type="text" class="form-control" value="<?php if (!empty($pj)) echo $pj->nama_penanggung_jawab;
                                                                                                                                else echo $penanggung_jawab; ?>" onkeydown="enter_pjnama(event)">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Pekerjaan</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="pjPasienPekerjaan" id="pjPasienPekerjaan" type="text" value="<?php if (!empty($pj)) echo $pj->pekerjaan; ?>" class="form-control" onkeydown="enter_pjpekerjaan(event)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Alamat</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" name="pjPasienAlamat" id="pjPasienAlamat" class="form-control" onkeydown="enter_pjalamat(event)" value="<?php if (!empty($pj)) echo $pj->alamat; ?>">

                                    </div>
                                </div>

                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Telp/HP</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input name="pjPasienTelp" id="pjPasienTelp" type="text" class="form-control" onkeydown="enter_pjtelp(event)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Hubungan Keluarga</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input name="pjPasienHubKel" id="pjPasienHubKel" type="text" class="form-control" onkeydown="enter_pjhubungan(event)">
                                </div>
                            </div>

                            <fieldset>
                                <legend>Informasi Pelayanan</legend>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Cara Bayar</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <select class="form-control" name="id_cara_bayar" id="id_cara_bayar" onkeydown="enter_carabayar(event)">
                                                <option value="">Pilih Cara Bayar</option>
                                                <?php foreach ($getCaraBayar->result_array() as $xCB) : ?>
                                                    <option value="<?php echo $xCB['idx'] ?>"><?php echo $xCB['cara_bayar'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <input type="hidden" name="jkn" id='jkn' value='0'>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group divRegCredit">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">No Peserta (<em>No BPJS</em>)</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <input type="hidden" name="status_peserta" id="status_peserta" value="">
                                            <input name="no_bpjs" id="no_bpjs" type="text" class="form-control" value="<?php echo $no_bpjs; ?>" onkeydown="enter_nobpjs(event)">
                                            <span class="input-group-addon">
                                                <a id="btnUpdateNoBPJS" href="Javascript:updateNoBPJS()"><i class="fa fa-save"></i> Update</a>
                                            </span>
                                            <span class="input-group-addon" id="status">
                                                <a id="cekStatus" href="Javascript:cekPeserta()"><i class="fa fa-search"></i> Cek</a>
                                            </span>
                                        </div>
                                    </div>
                                    <!--div class="col-md-2 col-sm-2 col-xs-12" id="status"></div-->
                                </div>
                                <div class="form-group divRegCredit">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Jenis Peserta</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <input type="hidden" name="id_jenis_peserta" id='id_jenis_peserta' value=''>
                                            <input type="text" name="jenis_peserta" id='jenis_peserta' class="form-control" readonly value=''>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Rujukan</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <select class="form-control" name="id_rujuk" id="id_rujuk" onkeydown="enter_rujukan(event)" onchange="getPengirim()">
                                                <option value="">Pilih Asal Rujukan</option>
                                                <?php foreach ($getRujukan->result_array() as $xR) : ?>
                                                    <option value="<?php echo $xR['idx'] ?>"><?php echo $xR['rujukan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <input type="hidden" id="faskes" name='faskes' value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group adarujukan">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">No Rujukan</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group ">
                                            <input type="text" id="txtNorujuk" name="txtNorujuk" class="form-control" placeholder="Enter Nomor Rujukan" onkeyup="enter_norujukan(event)">
                                            <input type="hidden" name="encryptdata" id='encryptdata' value=''>
                                            <div class="input-group-btn">
                                                <button type="button" id="cariRujukan" class="btn btn-default" <?php if (STATUS_VC == "0") echo "disabled";
                                                                                                                else echo 'onclick="getListRujukan()"' ?>>
                                                    <i class="fa fa-search"></i> Cari Rujukan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group adarujukan">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Dikirim Oleh<br><em>Jika pasien rujukan</em></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12 pengirim" onkeydown="enter_pengirim(event)">

                                        <?php
                                        if (STATUS_VC == "0") {
                                        ?>
                                            <select class="form-control" id="id_pengirim" name="id_pengirim" onchange="pilihPengirim()"></select>
                                        <?php
                                        } else {
                                        ?>
                                            <input type="hidden" name="id_pengirim" id="id_pengirim">
                                            <input type="text" name="pjPasienDikirimOleh" id="pjPasienDikirimOleh" class="form-control">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="pengirim" id="lainnya" style="display: none;"><input name="pjPasienDikirimOleh" id="pjPasienDikirimOleh" type="text" class="form-control" onkeydown="enter_pengirim1(event)"> </div>
                                </div>
                                <div class="form-group adarujukan">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Alamat Pengirim<br><em>Jika pasien rujukan</em></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <textarea name="pjPasienAlmtPengirim" id="pjPasienAlmtPengirim" class="form-control" rows="2" maxlength="255"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Tujuan Layanan</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <select class="form-control" name="id_ruang" id="id_ruang" onkeydown="enter_ruangan(event)" onchange="getDokter()">
                                                <option value="">Pilih Tujuan Layanan</option>
                                                <?php foreach ($getPoli->result_array() as $xP) : ?>
                                                    <option value="<?php echo $xP['idx'] ?>"><?php echo $xP['ruang'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Dokter</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <select class="form-control" name="dokterJaga" id="dokterJaga" onkeydown="enter_dokter(event)">
                                                <option value="">Pilih Dokter</option>

                                            </select>
                                            <input type="hidden" name="groupantri" id="groupantri" value="">
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

                                <!--div class="form-group divRegCredit">
                                    <div class="col-md-offset-4 col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                    <a id="btnCekSEP" href="Javascript:cekSEP()" class="btn btn-danger">Cek SEP (<em>JKN Bridging</em>)</a>
                                    
                                        </div>                                        
                                    </div>
                                </div-->
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-12">
                                        <div class="input-group">
                                            <button type="button" id="batal" class="btn btn-danger">
                                                <i class="fa fa-rotate-left"></i> Batal</button>
                                            <button type="button" id="daftar" class="btn btn-primary" <?php if ($ranap == 1) echo "disabled" ?>>
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
                                <th>Tujuan</th>
                                <th>Cara Bayar</th>
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

<div class="modal fade" id="formModalSEP" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Form SEP</h4>
            </div>
            <div class="modal-body">

                <form id="form1" class="form-horizontal" onsubmit="return false">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Pilih</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select name="optJnsRujukan" id="optJnsRujukan" class="form-control">
                                        <option value="1">Rujukan</option>
                                        <option value="2">Rujukan Manual</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-12 control-label"><em>(yyyy-mm-dd)</em> Tgl.Sep</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="input-group date">
                                        <input type="text" class="form-control datepicker" id="txtTanggal" placeholder="yyyy-mm-dd" maxlength="10">
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Asal Rujukan</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select name="optAsalRujukan" id="optAsalRujukan" class="form-control">
                                        <option value="1">Faskes Tingkat 1</option>
                                        <option value="2">Faskes Tingkat 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">No Rujukan</label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="no_rujuk" id="no_rujuk">
                                        <span class="input-group-btn">
                                            <button type="button" id="btnRujukanLain" class="btn btn-flat">
                                                <i class="fa fa-list"> No.Kartu</i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCariRujukanPasien" onclick="cariRujukanPasien()" class="btn btn-danger">Cari</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mpop_rujukan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg" style="overflow-y: initial !important">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">??</button>
                <h3 class="modal-title" id="headRujukan">Rujukan Faskes Tingkat 1</h3>
            </div>
            <div class="modal-body" style="height: 450px;overflow-y: auto;">
                <form class="form-horizontal">
                    <div class="form-group" id="divRujukanKartu">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">No.Kartu</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input class="form-control" id="txtrujukan_kartu" placeholder="ketik no.kartu" maxlength="13">
                        </div>
                    </div>
                    <div class="form-group" id="divRujukanTanggal" style="display: none;">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Tanggal</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="input-group date">
                                <input type="text" class="form-control datepicker" id="txtrujukan_tanggal" placeholder="yyyy-MM-dd" maxlength="10">
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar">
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 col-sm-3 col-xs-12"></div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <button class="btn btn-danger" id="btn_carirujukan" type="button" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Order"><i class="fa fa-search"></i> Cari</button>
                        </div>
                    </div>

                    <div id="tblPopup_Rujukan_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered" id="tblPopup_Rujukan" style="font-size: small; width: 100%;" role="grid" aria-describedby="tblPopup_Rujukan_info" width="100%" cellpadding="0">
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
                                    <tbody id="listRujukan">
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
                            <input type="hidden" name="ppkPelayanan" id="ppkPelayanan" value="0306R001">
                            <input type="hidden" name="jnsPelayanan" id="jnsPelayanan" value="2">
                            <input type="hidden" name="klsRawat" id="klsRawat" value="">
                            <!--input type="hidden" name="noMR" id="noMR" value=""-->
                            <input type="hidden" name="asalRujukan" id="asalRujukan" value="">
                            <input type="hidden" name="tglRujukan" id="tglRujukan" value="">
                            <input type="hidden" name="noRujukan" id="noRujukan" value="">
                            <input type="hidden" name="ppkRujukan" id="ppkRujukan" value="">


                            <!--label for="">Test</label>
                            <input type="text" id="txtkelamin" value="">
                            <input type="text" id="txtkdstatuspst" value="">
                            <input type="text" id="txtpisa" value="1">
                            <input type="text" id="txtkdklspst" value="3">
                            <input type="text" id="txtprsklaimsep">
                            <input type="text" id="txtppkasalpst" value="03130402">
                            <input type="text" id="txttmtpst" value="2016-09-16">
                            <input type="text" id="txtjnspst" value="14">
                            <input type="text" id="txtkdasu" value="">
                            <input type="text" id="txttmtasu" value="">
                            <input type="text" id="txttatasu" value="">
                            <input type="text" id="txtkdbu" value="00480003"-->
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
                                        <input type="text" class="form-control ui-autocomplete-input" id="txtnmDokter" placeholder="ketik nama dokter Yang menangini">
                                        <input type="hidden" id="kodeDokter" value="">
                                        <span class="text-error"></span>
                                    </div>
                                </div>
                                <div id="divRujukan">
                                    <div class="form-group rajal">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Asal Rujukan</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <select class="form-control" id="cbasalrujukan" disabled="">
                                                <option value="1">Faskes Tingkat 1</option>
                                                <option value="2">Faskes Tingkat 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group rajal">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" id="ppk">PPK Asal Rujukan <label style="color:red;font-size:small">*</label></label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control ui-autocomplete-input" id="txtppkasalrujukan" placeholder="ketik kode atau nama ppk asal rujukan min 3 karakter" disabled="">
                                            <input type="hidden" class="form-control" id="txtkdppkasalrujukan" value="">
                                        </div>
                                    </div>
                                    <div class="form-group rajal">
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
                                    <div class="form-group rajal">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">No. Rujukan <label style="color:red;font-size:small">*</label></label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" id="txtnorujukan" placeholder="ketik nomor rujukan" maxlength="19" disabled="">
                                        </div>
                                    </div>
                                </div>
                                <!-- kontrol -->
                                <div id="divkontrol " class='divkontrol rajal' style="display: block;">
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" id="lblkontrol">No.Surat Kontrol/SKDP <label style="color:red;font-size:small">*</label></label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" id="noSurat" placeholder="ketik nomor surat kontrol" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="6">
                                            <input type="hidden" id="txtidkontrol" value="1">
                                            <input type="hidden" id="noSuratlama" value="">
                                            <input type="hidden" id="txtpoliasalkontrol" value="HDL">
                                            <input type="hidden" id="txttglsepasalkontrol" value="2019-08-24">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">DPJP Pemberi Surat SKDP/SPRI <label style="color:red;font-size:small">*</label></label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control ui-autocomplete-input" id="txtnmdpjp" placeholder="ketik nama dokter DPJP Pemberi Surat SKDP/SPRI">
                                            <input type="hidden" id="kodeDPJP" value="">
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
                                <div class="form-group" id="divkatarak" style="display: none;">
                                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Katarak <input type="checkbox" id="chkkatarak" value="1"></label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <p class="text-muted well well-sm no-shadow">Centang Katarak <i class="fa fa-check"></i>, Jika Peserta Tersebut Mendapatkan Surat Perintah Operasi katarak</p>
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

<div class="modal fade" id="form_edit_pasien" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Form Edit Pasien</h4>
            </div>
            <div class="modal-body">

                <form id="x-form-edit" class="form-horizontal" onsubmit="return false">
                    <div class="box-body">
                        <!--form id="x-form1" role="form" onsubmit="return false"-->
                        <div class="col-md-6">
                            <div class="row">
                                <!--fieldset>
                                <legend>Data Pasien</legend-->
                                <div class="form-group">
                                    <div class="col-md-4"><label>No MR [<em>Kode Auto Generate</em>]</label> </div>
                                    <div class="col-md-8">
                                        <input type="hidden" name="idx" id="x-idx" value="">
                                        <input readonly type="text" class="form-control" name="nomr" id="x-nomr" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4"><label>No KTP (NIK / Passport)</label></div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="no_ktp" id="x-no_ktp" value="" onkeydown="enter_noktp(event)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>No BPJS (<em>Jika Pasien Peserta BPJS Kesehatan</em>)</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="no_bpjs" id="x-no_bpjs" value="" onkeydown="enter_bpjs(event)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Nama Pasien <span style="color: red"> * </span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="nama" id="x-nama" value="" onkeydown="enter_nama(event)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Tempat Lahir / DOB <span style="color: red"> * </span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group">

                                            <input type="text" class="form-control" name="tempat_lahir" id="x-tempat_lahir" value="" onkeydown="enter_tmplahir(event)">
                                            <div class="input-group-btn" style="width: 30%">
                                                <input type="text" class="form-control" name="tgl_lahir" id="x-tgl_lahir" placeholder="__/__/____" value="" onkeydown="enter_tgllahir(event)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <label class="">
                                                <input type="radio" name="jns_kelamin" id="x-pgwPria" value="1" style="position: relative;" onkeydown="enter_pgwPria(event)" /> Laki-Laki
                                            </label>
                                            &nbsp;&nbsp;&nbsp;
                                            <label class="">
                                                <input type="radio" name="jns_kelamin" id="x-pgwWanita" value="0" style="position: relative;" onkeydown="enter_pgwWanita(event)" /> Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Agama</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="agama" id="x-agama" class="form-control" onkeydown="enter_agama(event)">
                                            <?php foreach ($getAgama->result_array() as $xAG) : ?>
                                                <option value="<?php echo $xAG['agama'] ?>"><?php echo $xAG['agama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Kewarganegaraan <span style="color: red"> * </span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="kewarganegaraan" id="kewarganegaraan" class="form-control" onchange="pilihKWN()" onkeydown="enter_kwn(event)">
                                            <option value="">-- Pilih --</option>
                                            <option value="WNI">WNI</option>
                                            <option value="WNA">WNA</option>
                                        </select>
                                        <!--div id="wilayah" class="popup-pencarian"  style="display: none;">
                                            <div class="content-pencarian">
                                                <table class="table table-bordered">
                                                    <thead class="bg-green">
                                                        <tr>
                                                            <td>Provinsi</td>
                                                            <td>Kabupaten</td>
                                                            <td>Kecamatan</td>
                                                            <td>Kelurahan</td>
                                                            <td >#</td>
                                                        </tr>
                                                        
                                                    </thead>
                                                    <tbody>
                                                        <tr >
                                                            <td style="padding: 0px;"><input type="text" name="prov" id="prov" class="form-control input-sm" onkeyup="getWilayah(0)" onkeydown="enter_prov(event)"></td>
                                                            <td style="padding: 0px;"><input type="text" name="kab" id="kab" class="form-control input-sm" onkeyup="getWilayah(0)" onkeydown="enter_kab(event)"></td>
                                                            <td style="padding: 0px;"><input type="text" name="kec" id="kec" class="form-control input-sm" onkeyup="getWilayah(0)" onkeydown="enter_kec(event)"></td>
                                                            <td style="padding: 0px;" colspan="2"><input type="text" name="kel" id="kel" class="form-control input-sm" onkeyup="getWilayah(0)" onkeydown="enter_kel(event)"></td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody id="data-wilayah"></tbody>
                                                    <tfoot >
                                                        <tr>
                                                            <td colspan="5" style="text-align: right;"><div id="pagination"></div></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div-->
                                    </div>
                                </div>

                                <div class="form-group groupWNA groupKewarganegaraan">
                                    <div class="col-md-4">
                                        <label>Negara <span style="color: red"> * </span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <select name="nama_negara" id="nama_negara" class="form-control" style="width: 250px">
                                                <option value="">-- Pilih --</option>
                                                <?php foreach ($getNegara->result_array() as $xN) : ?>
                                                    <option value="<?php echo $xN['nama_negara'] ?>"><?php echo $xN['nama_negara'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="input-group-addon">
                                                <a class="btn btn-primary btn-xs" href="Javascript:refreshNeg()"><i class="fa fa-refresh"></i></a>
                                                <a class="btn btn-danger btn-xs" href="Javascript:addNeg()"><i class="fa fa-plus"></i></a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group groupWNI groupKewarganegaraan">
                                    <div class="col-md-4"><label>Provinsi <span style="color: red"> * </span></label></div>
                                    <div class="col-md-8">
                                        <div class="input-group input-group-sm">
                                            <input type="text" name="nama_provinsi" id="nama_provinsi" class="form-control" value="<?= $nama_provinsi ?>" readonly>
                                            <div class="input-group-btn">
                                                <button type="button" id="btnCariwilayah" class="btn btn-primary" onclick="cariWilayah()">
                                                    <i class="fa fa-search"></i></button>
                                            </div>
                                        </div>


                                        <div id="wilayah" class="popup-pencarian" style="display: none;">
                                            <input type="hidden" name="show_wilayah" id="show_wilayah" value="0">
                                            <div class="content-pencarian">
                                                <table class="table table-bordered">
                                                    <thead class="bg-green">
                                                        <tr>
                                                            <td>Provinsi</td>
                                                            <td>Kabupaten</td>
                                                            <td>Kecamatan</td>
                                                            <td>Kelurahan</td>
                                                            <td>#</td>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="padding: 0px;"><input type="text" name="prov" id="prov" class="form-control input-sm" onkeyup="getWilayah(0)" onkeydown="enter_prov(event)"></td>
                                                            <td style="padding: 0px;"><input type="text" name="kab" id="kab" class="form-control input-sm" onkeyup="getWilayah(0)" onkeydown="enter_kab(event)"></td>
                                                            <td style="padding: 0px;"><input type="text" name="kec" id="kec" class="form-control input-sm" onkeyup="getWilayah(0)" onkeydown="enter_kec(event)"></td>
                                                            <td style="padding: 0px;" colspan="2"><input type="text" name="kel" id="kel" class="form-control input-sm" onkeyup="getWilayah(0)" onkeydown="enter_kel(event)"></td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody id="data-wilayah"></tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="5" style="text-align: right;">
                                                                <div id="pagination"></div>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group groupWNI groupKewarganegaraan">
                                    <div class="col-md-4">
                                        <label>Kabupaten / Kota <span style="color: red"> * </span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="nama_kab_kota" id="nama_kab_kota" class="form-control" value="" readonly>
                                    </div>
                                </div>
                                <div class="form-group groupWNI groupKewarganegaraan">
                                    <div class="col-md-4">
                                        <label>Kecamatan / Nagari <span style="color: red"> * </span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="nama_kecamatan" id="nama_kecamatan" class="form-control" value="" readonly>
                                    </div>
                                </div>
                                <div class="form-group groupWNI groupKewarganegaraan">
                                    <div class="col-md-4">
                                        <label>Kelurahan / Jorong <span style="color: red"> * </span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="nama_kelurahan" id="nama_kelurahan" class="form-control" value="" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Alamat Tempat Tinggal <span style="color: red"> * </span></label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea name="alamat" id="alamat" class="form-control" rows="3"><?php //echo $alamat 
                                                                                                            ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <!--/fieldset-->
                        </div>
                        <div class="col-md-6">
                            <!-- Space 2-- >
                                  

                            <!--Space 3-->

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Pekerjaan</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="pekerjaan" id="x-pekerjaan" class="form-control" onkeydown="enter_pekerjaan(event)">
                                        <?php foreach ($getPekerjaan->result_array() as $xSk) : ?>
                                            <option value="<?php echo $xSk['pekerjaan_nama'] ?>"><?php echo $xSk['pekerjaan_nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="status_kawin" id="x-status_kawin" class="form-control" onkeydown="enter_status(event)">
                                        <option value="">Pilih</option>
                                        <?php foreach ($getStatus->result_array() as $xSk) : ?>
                                            <option value="<?php echo $xSk['status'] ?>"><?php echo $xSk['status'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Suku</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="suku" id="x-suku" class="form-control" onkeydown="enter_suku(event)">
                                        <option value="">Pilih</option>
                                        <?php foreach ($getSuku->result_array() as $xSk) : ?>
                                            <option value="<?php echo $xSk['nama_suku'] ?>"><?php echo $xSk['nama_suku'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Bahasa Daerah</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="bahasa" id="x-bahasa" class="form-control" onkeydown="enter_bahasa(event)">
                                        <?php foreach ($getBahasa->result_array() as $xBH) : ?>
                                            <option value="<?php echo $xBH['bahasa'] ?>"><?php echo $xBH['bahasa'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>No HP / Telp Pasien <span style="color: red"> * </span></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="no_telpon" id="x-no_telpon" value="" onkeydown="enter_notelp(event)">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>Penanggung Jawab <span style="color: red"> * </span></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="penanggung_jawab" id="x-penanggung_jawab" value="" onkeydown="enter_pj(event)">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>No HP / Telp Penanggung Jawab <span style="color: red"> * </span></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="no_penanggung_jawab" id="x-no_penanggung_jawab" value="" onkeydown="enter_nopj(event)">
                                </div>
                            </div>


                        </div>

                        <!--/form-->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCariRujukanPasien" onclick="simpanPasien()" class="btn btn-primary">Simpan Pasien</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
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
                            <div class="row" id="pilihfaskes" style="display:none">
                                <div class="col-md-12">
                                    <input type="radio" name="faskes" id="pcare" checked onclick="getListRujukan(1)">PCARE
                                    <input type="radio" name="faskes" id="rs" onclick="getListRujukan(2)">RUMAH SAKIT
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-bordered" id="tblPopup_Rujukan" style="font-size: small; width: 100%;" role="grid" aria-describedby="tblPopup_Rujukan_info" width="100%" cellpadding="0">
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
        $('#no_jaminan').inputmask(mask, {
            'placeholder': '<?php echo KODERS_VC ?>____V______'
        });
        // $('#pjPasienUmur').inputmask('9{1,3}');
        // $('#pjPasienTelp').inputmask('9{3,24}');
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
            $('#no_jaminan').inputmask(mask, {
                'placeholder': '<?php echo KODERS_VC ?>____V______'
            });
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

        getHistoryPasien();
        $('select').not('#optJnsRujukan').not('#optAsalRujukan').not('#lakaLantas').not('#cbprovinsi').not('#cbkabupaten').not('#cbkecamatan').not('#id_pengirim').not('#kewarganegaraan').not('#x-agama').not('#x-pekerjaan').not('#x-suku').not('#x-bahasa').not('#x-status_kawin').select2({
            placeholder: '-- Pilih --'
        });
        //$('select').not('#kewarganegaraan').not('#agama').not('#pekerjaan').not('#suku').not('#bahasa').not('#status_kawin').select2({placeholder:'------------ Pilih option ------------'});
        $('select').val('').trigger('change');

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        $('#txtTanggal').datepicker('setDate', today);

        $('#tgl_layanan').val('<?php echo date("d/m/Y") ?>');

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
        });
        $('#id_cara_bayar').trigger("change");
        //$(selector).trigger("change");
        $('#batal').click(function() {
            var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/gawat_darurat' ?>';
            window.location.href = url;
        });
        $('#daftar').click(function() {
            //alert($('#txtNorujuk').val());
            var formdata = {
                nomr: $('#nomr').val(),
                no_ktp: $('#no_ktp').val(),
                nama_pasien: $('#nama').val(),
                tempat_lahir: $('#tempat_lahir').val(),
                tgl_lahir: $('#tgl_lahir').val(),
                jns_kelamin: $('#jns_kelamin').val(),
                nama_provinsi: $('#provinsi').val(),
                nama_kab_kota: $('#kabupaten').val(),
                nama_kecamatan: $('#kecamatan').val(),
                nama_kelurahan: $('#kelurahan').val(),
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
                tgl_daftar: $('#tgl_daftar').val(),
                groupantri: $('#groupantri').val()
            }
            //console.log(formdata);
            //return false;
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
                        alert('Ops. Status Kepesertaan BPJS Tidak Diketahui');
                        return false
                    } else if ($('#status_peserta').val() != 'AKTIF') {
                        var status = $('#status_peserta').val();
                        alert('Ops. Status Kepesertaan BPJS ' + status + ' Tidak Dikeahui');
                        return false;
                    }
                }
                var x = confirm("Apakah anda yakin akan melanjutkan proses pendaftaran pasien ini?");
                if (x) {
                    $.ajax({
                        url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/daftar_rajal' ?>",
                        type: "POST",
                        data: formdata,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data);
                            if (data.code == 200) {
                                var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/reg_success_igd?uid=' ?>' + data.unikID;
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


        $('#btnRujukanLain').click(function() {
            var asalRujukan = $('#optAsalRujukan :selected').html();
            var nokartu = $('#no_bpjs').val();
            $('#headRujukan').html("Rujukan " + asalRujukan);
            $('#txtrujukan_kartu').val(nokartu);
            $('tbody#listRujukan').html('<tr class="odd"><td colspan="7" valign="top">No data available in table</td></tr>');
            $('#mpop_rujukan').modal('show');
        });

        $('#btn_carirujukan').click(function() {
            var a = $('#txtrujukan_kartu').val();
            var b = $('#optAsalRujukan').val();
            var fomrdata = {
                param1: a,
                param2: b
            }
            $.ajax({
                url: "<?php echo base_url() . 'api.php/vclaim/rujukan/listRujukanBerdasarkanNomorKartu' ?>",
                type: "POST",
                data: fomrdata,
                dataType: "JSON",
                beforeSend: function() {
                    $('tbody#listRujukan').html("<tr><td colspan=7><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
                },
                success: function(data) {
                    if (data.metaData.code == 200) {
                        var x = data.response.rujukan;
                        // alert(x.length);
                        var res = "";
                        var encodedString = "";
                        var dataForm = "";
                        /** */
                        for (var i = 0; i <= x.length - 1; i++) {
                            var noKunjungan = x[i]['noKunjungan'];
                            dataForm = JSON.stringify(x[i]);
                            encodedString = Base64.encode(dataForm);

                            res += "<tr>";
                            res += "<td>" + (i + 1) + "</td>";
                            res += "<td><button onclick=formGenerateSEP('" + encodedString + "') type='button' class='btn btnView btn-default btn-xs'>" + x[i]['noKunjungan'] + "</button></td>";
                            res += "<td>" + x[i]['tglKunjungan'] + "</td>";
                            res += "<td>" + x[i]['peserta']['noKartu'] + "</td>";
                            res += "<td>" + x[i]['peserta']['nama'] + "</td>";
                            res += "<td>" + x[i]['provPerujuk']['nama'] + "</td>";
                            res += "<td>" + x[i]['poliRujukan']['nama'] + "</td>";
                            res += "</tr>";
                        }
                        $('tbody#listRujukan').html(res);
                    } else {
                        alert(data.metaData.message);
                        $('tbody#listRujukan').html('<tr class="odd"><td colspan="7" valign="top">No data available in table</td></tr>');
                    }

                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        });
        $('#btnBatal').click(function() {
            $('#mpop_sep').modal('hide');
        });

        /*$("#icd").autocomplete({
            source: function( request, response ) {
                $.ajax( {
                    url     : "<?php echo base_url() . 'api.php/eklaim/main/getICD' ?>",
                    dataType: "JSON",
                    data    : {term: request.term},
                    success : function( data ) {
                        response(data.slice(0, 15));
                    },
                    error       : function(jqXHR,ajaxOption,errorThrown){
                        console.log(errorThrown);
                    }
                });
            },
            minLength: 2,
            focus: function(event,ui) {
                $("#kode_icd").val(ui.item['label']);
                $("#icd").val(ui.item['value']);
                $("#icd").removeClass("ui-autocomplete-loading");
                return false;
            },
            select: function(event,ui) {
                $("#kode_icd").val(ui.item['label']);
                $("#icd").val(ui.item['value']);
                $("#icd").removeClass("ui-autocomplete-loading");
                return false;
            }
        })
        .autocomplete("instance")._renderItem = function(table,item) {
          return $("<tr class='autocomplete'>")
            .append("<td style='width:100px'>" + item['label'] + "</td><td style='width:300px'>" + item['value'] + "</td>")
            .appendTo(table);
        };*/

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
                    if (parseInt(ui.item['tahun_lahir']) > 0) var umur = <?= date('Y') ?> - parseInt(ui.item['tahun_lahir']);
                    else var umur = "";
                    $("#pjPasienNama").val(ui.item['nama_penanggung_jawab']);
                    $("#pjPasienPekerjaan").val(ui.item['pekerjaan']);
                    $("#pjPasienUmur").val(umur);
                    $("#pjPasienAlamat").val(ui.item['alamat']);
                    $("#pjPasienTelp").val(ui.item['no_telp']);
                    $("#pjPasienHubKel").val(ui.item['hub_keluarga']);
                    $("#pjPasienNama").removeClass("ui-autocomplete-loading");
                    return false;
                },
                select: function(event, ui) {
                    if (parseInt(ui.item['tahun_lahir']) > 0) var umur = <?= date('Y') ?> - parseInt(ui.item['tahun_lahir']);
                    else var umur = "";
                    $("#pjPasienNama").val(ui.item['nama_penanggung_jawab']);
                    $("#pjPasienPekerjaan").val(ui.item['pekerjaan']);
                    $("#pjPasienUmur").val(umur);
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
        getPengirim();
        $('#id_ruang').on('select2:select', function(e) {
            $('#dokterJaga').focus();
        });
        $('#dokterJaga').on('select2:select', function(e) {
            var jkn = $('#jkn').val();
            if (jkn == 1) $('#no_jaminan').focus();
            else $('#daftar').focus();
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
                            $('.divRegCredit').hide();
                        } else {
                            $('.divRegCredit').show();
                            $('#chkIsJaminan').prop('disabled', false);
                            $("#cariRujukan").removeAttr('disabled');
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
            var url = base_url + "/patch/getpengirim/" + parseInt(id_rujuk);
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
                        $('#faskes').val(data["rujukan"]["id_faskes"]);
                        var jmlData = pengirim.length;
                        var option = "<option value=''>Pilih</option>";
                        //Create Tabel
                        for (var i = 0; i < jmlData; i++) {
                            option += "<option value='" + pengirim[i]["idx"] + "'>" + pengirim[i]["nama_pengirim"] + "</option>";
                        }
                        option += "<option value='Lainnya'>LAINNYA</option>";
                        $('#id_pengirim').html(option);
                        if (id_rujuk != 1) {
                            $('.adarujukan').show();
                        } else {
                            $('.adarujukan').hide();
                        }

                        if (data["rujukan"]["id_faskes"] == "0") {
                            $('#id_ruang').focus()
                        } else {
                            $('#txtNorujuk').focus();
                        }
                        //$('#pjPasienDikirimOleh').val("");
                        //$('#pjPasienAlmtPengirim').val("");	        
                    }
                }
            });
        });
    });

    function searchRujukan() {
        alert("cari");
    }

    /*function formSEP() {

        var encryptdata = $('#encryptdata').val();
        if (encryptdata == "") {
            var faskes = $('#faskes').val();
            var jenis_layanan = $('#jns_layanan').val();
            if (jenis_layanan == "RJ") {
                if (faskes == 0) {
                    tampilkanPesan('warning', "Pasien Rawat Jalan Harus Membawa Surat Rujukan Dari Faskes I Atau Faskes II");
                } else {
                    tampilkanPesan('error', "Rujukan Tidak Valid");
                }
            } else if (jenis_layanan == "GD") {
                if (faskes == 0) {
                    var nobpjs = $('#no_bpjs').val();
                    formSEPIGD(nobpjs, '<?= date('Y-m-d') ?>');
                } else {
                    tampilkanPesan('warning', "Rujukan Tidak Valid");
                }
            }
        } else {
            formGenerateSEP(encryptdata);

        }

    }*/


    function cariRujukanPasien() {
        var a = $('#no_rujuk').val();
        var b = $('#optAsalRujukan').val();
        var fomrdata = {
            param1: a, // No rujukan
            param2: b // Faskes Asal Rujukan
        }
        $.ajax({
            url: "<?php echo base_url() . 'api.php/vclaim/rujukan/rujukanBerdasarkanNomorRujukan' ?>",
            type: "POST",
            data: fomrdata,
            dataType: "JSON",
            beforeSend: function() {
                // $('#btnCariRujukanPasien').setattr('disabled','disabled');
                $('#btnCariRujukanPasien').prop("disabled", true); // Element(s) are now enabled.
                $('#btnCariRujukanPasien').html("<i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu");
            },
            success: function(data) {
                $('#btnCariRujukanPasien').prop("disabled", false); // Element(s) are now enabled.
                $('#btnCariRujukanPasien').html("Cari");
                if (data.metaData.code == 200) {
                    var x = data.response.rujukan;
                    var asalRujukan = $('#optAsalRujukan').val();
                    var tglSEP = $('#txtTanggal').val();
                    /** 
                    console.log(x.toSource());
                    alert(x['diagnosa']['nama']);
                    alert(x[0]['noKunjungan']);
                    */
                    // alert("myObject is " + x.toSource());
                    $('#cbasalrujukan').val(asalRujukan).trigger('change');
                    $('#txtnmpoli').val(x['poliRujukan']['nama']);
                    $('#txtkdpoli').val(x['poliRujukan']['kode']);
                    $('#txtkdppkasalrujukan').val(x['provPerujuk']['kode']);
                    $('#txtppkasalrujukan').val(x['provPerujuk']['nama']);
                    $('#txttglrujukan').val(x['tglKunjungan']);
                    $('#txtnorujukan').val(x['noKunjungan']);
                    $('#noSurat').val('');
                    $('#noSurat').val('');
                    // Belum ditemukan
                    $('#txtidkontrol').val('');
                    $('#noSuratlama').val('');
                    $('#txtpoliasalkontrol').val('');
                    $('#txttglsepasalkontrol').val('');

                    $('#txtnmdpjp').val('');
                    $('#kodeDPJP').val('');

                    $('#txttglsep').val(tglSEP);
                    $('#txtnomr').val(x['peserta']['mr']['noMR']);
                    $('#txtnomr').val(x['peserta']['mr']['noMR']);

                    $('#txtnmdiagnosa').val(x['diagnosa']['nama']);
                    $('#diagAwal').val(x['diagnosa']['kode']);

                    $('#noTelp').val(x['peserta']['mr']['noTelepon']);

                    $('#catatan').val('');
                    $('#lakaLantas').prop('selectedIndex', 1);


                    $('#lblnama').html(x['peserta']['nama']);
                    $('#lblnoka').html(x['peserta']['noKartu']);
                    $('#txtkelamin').val(x['peserta']['sex']);
                    $('#txtkdstatuspst').val(x['peserta']['statusPeserta']['kode']);

                    $('#lblnik').html(x['peserta']['nik']);
                    $('#lblnokartubapel').html('');
                    $('#lbltgllahir').html(x['peserta']['tglLahir']);
                    $('#lblpisa').html(x['peserta']['pisa']);
                    $('#lblfktp').html(x['peserta']['provUmum']['kdProvider'] + '-' + x['peserta']['provUmum']['nmProvider']);
                    $('#txtppkasalpst').html(x['peserta']['provUmum']['kdProvider']);
                    $('#lbltmt_tat').html(x['peserta']['tglTMT'] + '-' + x['peserta']['tglTAT']);
                    $('#txttmtpst').html(x['peserta']['tglTMT']);
                    $('#lblpeserta').html(x['peserta']['jenisPeserta']['keterangan']);
                    $('#txtjnspst').html(x['peserta']['jenisPeserta']['kode']);

                    $('#lblnoasu').html(x['peserta']['cob']['noAsuransi']);
                    $('#txtkdasu').html('');
                    $('#lblnmasu').html(x['peserta']['cob']['nmAsuransi']);
                    $('#lbltmt_tatasu').html(x['peserta']['cob']['tglTMT'] + ' s/d ' + x['peserta']['cob']['tglTAT']);
                    $('#lblnamabu').html('');
                    $('#txtkdbu').html('');

                    $('#mpop_rujukan').modal('hide');
                    // $('#formModalSEP').modal('hide');

                    $('#mpop_sep').modal('show');
                } else {
                    alert(data.metaData.message);
                }

            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                $('#btnCariRujukanPasien').prop("disabled", false); // Element(s) are now enabled.
                $('#btnCariRujukanPasien').html("Cari");
                console.log(jqXHR.responseText);
            }
        });
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
</script>
<script src="<?php echo base_url() ?>js/pendaftaran.js"></script>