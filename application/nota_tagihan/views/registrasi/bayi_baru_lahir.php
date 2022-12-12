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

    .modal-content {
        max-height: 600px;
    }

    .input-group-addon {
        border: none;
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
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border"><?php echo $contentTitle ?></div>

                <div class="box-body">

                    <form id="form" role="form" class="form-horizontal" onsubmit="return false">
                        <input type="hidden" name="nomr" id="nomr" value="">
                        <input type="hidden" name="no_ktp" id="no_ktp" value="">
                        <input type="hidden" name="pekerjaan" id="pekerjaan" value="BELUM BEKERJA">
                        <input type="hidden" name="status_kawin" id="status_kawin" value="2">
                        <input type="hidden" name="sekarang" id="sekarang" value="<?= date('Y-m-d') ?>">
                        <!--input name="no_bpjs" id="no_bpjs" type="hidden" value="0"-->
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Data Pasien</legend>

                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Nama Pasien <span style="color: red"> * </span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control" name="nama" id="nama" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Tempat Lahir / DOB <span style="color: red"> * </span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="">
                                            <div class="input-group-btn" style="width: 30%">
                                                <input type="text" class="form-control inputmask tanggal" name="tgl_lahir" id="tgl_lahir" placeholder="__/__/____" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Suku <span style="color: red"> * </span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control" name="nama_suku" id="nama_suku" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Jenis Kelamin</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <label class="">
                                            <input type="radio" name="jns_kelamin" id="pgwPria" value="1" style="position: relative;" /> Laki-Laki
                                        </label>
                                        &nbsp;&nbsp;&nbsp;
                                        <label class="">
                                            <input type="radio" name="jns_kelamin" id="pgwWanita" value="0" style="position: relative;" /> Perempuan
                                        </label>
                                    </div>
                                </div>
                                <!--div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Agama</label>
                                    <select name="agama" id="agama" class="form-control" onkeydown="enter_agama(event)">

                                    </select>
                                </div-->
                                <legend>Reservasi Rawat Inap Ibu</legend>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Nomr Ibu</label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="nomribu" id="nomribu" type="text" class="form-control" value="" placeholder="Masukkan Nomr / No Reg Unit Rawat Inap ibu">
                                        <input type="hidden" name="agama" id="agama">
                                        <input type="hidden" name="id_daftaribu" id="id_daftaribu">
                                        <input type="hidden" name="reg_unitibu" id="reg_unitibu">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Nama Ibu</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="nama_ibu" id="nama_ibu" type="text" class="form-control" value="" readonly placeholder="Nama Ibu">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Ruang Rawat Ibu</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="namaruangibu" id="namaruangibu" type="text" class="form-control" value="" readonly placeholder="Nama Ruang">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Kelas Layanan</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="kelas_layanan" id="kelas_layanan" type="text" class="form-control" value="" readonly placeholder="Kelas Layanan">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Kamar Rawat Ibu</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="namakamar" id="namakamar" type="text" class="form-control" value="" readonly placeholder="Nama Kamar">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">DPJP Ibu</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="dbjpibu" id="dbjpibu" type="text" class="form-control" value="" readonly placeholder="DPJP Ibu">
                                    </div>
                                </div>
                                <legend>Reservasi Bayi</legend>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">&nbsp;</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="rawatgabung" id="rawatgabung" type="checkbox" value="1"> <label for="rawat gabung">Rawat Gabung</label>
                                        <input name="masukigd" id="masukigd" type="checkbox" value="1"> <label for="Gawat Darurat">Masuk Dari IGD</label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset id="rawatgabungfull">
                                <legend>Reservasi Rawat Inap Bayi</legend>
                                <!--input type="hidden" name="id_cara_bayar" id="id_cara_bayar">
                                <input type="hidden" name="cara_bayar" id="cara_bayar"-->
                                <input type="hidden" name="jkn" id='jkn' value='0'>
                                <input type="hidden" name="id_jenis_peserta" id='id_jenis_peserta' value=''>
                                <input type="hidden" name="jenis_peserta" id='jenis_peserta' value=''>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Cara Bayar</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <select class="form-control" name="id_cara_bayar" id="id_cara_bayar">
                                                <option value="">Pilih Cara Bayar</option>
                                                <?php foreach ($getCaraBayar->result_array() as $x) : ?>
                                                    <option value="<?php echo $x['idx'] ?>"><?php echo $x['cara_bayar'] ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group divRegCredit" style="display: none;">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">No Peserta (<em>No BPJS</em>)</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <input name="no_bpjs" id="no_bpjs" type="text" class="form-control" value="" onkeydown="enter_nobpjs(event)">
                                            <input type="hidden" name="status_peserta" id="status_peserta" value="">

                                            <span class="input-group-btn" id="status">
                                                <a id="cekStatus" href="Javascript:cekPeserta()" class="btn btn-success"><i class="fa fa-search"></i> Cek</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group masukigd" style="display: none;">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Ruang Pengirim</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <select class="form-control" name="ruang_pengirim" id="ruang_pengirim" onchange="getDokter()">
                                                <option value="">-- Pilih --</option>
                                                <?php foreach ($getIgd->result_array() as $xR) : ?>
                                                    <option value="<?php echo $xR['idx'] ?>"><?php echo $xR['ruang'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group masukigd" style="display: none;">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Dokter Pengirim</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <select class="form-control" name="dokter_pengirim" id="dokter_pengirim">
                                                <option value="">-- Pilih --</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group rawatsendiri">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Kelas Pelayanan</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <input type="hidden" id="hakKelasid" name="hakKelasid" value="">
                                            <input type="hidden" id="hakKelas" name="hakKelas" value="">
                                            <select class="form-control" name="id_kelas" id="id_kelas" onchange="getKamar()">
                                                <option value="">-- Pilih --</option>
                                                <?php foreach ($getKelas->result_array() as $xKl) : ?>
                                                    <option value="<?php echo $xKl['idx'] ?>"><?php echo $xKl['kelas_layanan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group rawatsendiri">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Ruang Perawatan</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <select class="form-control" name="id_ruang" id="id_ruang" onchange="getKamar()">
                                                <option value="">-- Pilih --</option>
                                                <?php foreach ($getRuang->result_array() as $xP) : ?>
                                                    <option value="<?php echo $xP['idx'] ?>"><?php echo $xP['ruang'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group rawatsendiri">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Kamar Rawatan</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <select class="form-control" name="id_kamar" id="id_kamar">
                                                <option value="">-- Pilih --</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group rawatsendiri">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Dokter DPJP</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="input-group">
                                            <select class="form-control" name="dokterJaga" id="dokterJaga">
                                                <option value="">-- Pilih --</option>
                                                <?php foreach ($getDokterjaga->result_array() as $xR) : ?>
                                                    <option value="<?php echo $xR['NRP'] ?>"><?php echo $xR['pgwNama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <input name="no_jaminan" id="no_jaminan" type="hidden">
                            </fieldset>
                            <fieldset>
                                <legend>Penanggung Jawab Pasien</legend>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Nama</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="pjPasienNama" id="pjPasienNama" type="text" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Pekerjaan</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="pjPasienPekerjaan" id="pjPasienPekerjaan" type="text" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Alamat</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" name="pjPasienAlamat" id="pjPasienAlamat" class="form-control">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Telp/HP</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input name="pjPasienTelp" id="pjPasienTelp" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-sm-4 col-xs-12 control-label">Hubungan Keluarga</label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input name="pjPasienHubKel" id="pjPasienHubKel" type="text" class="form-control">
                                    </div>
                                </div>
                            </fieldset>

                        </div>
                    </form>

                </div>
                <div class="box-footer text-right">
                    <div class="col-md-12">
                        <button class="btn btn-success btn-sm" id="daftar" type="button"><i class="fa fa-check"></i> Daftar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.css">
<script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery/css/jquery-ui.css">