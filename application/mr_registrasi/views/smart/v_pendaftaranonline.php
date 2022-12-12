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

    /*.modal-content {
        max-height: 600px;
    }*/
    a.disabled {
        pointer-events: none;
        cursor: default;
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
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">

    <div class="alert alert-danger alert-dismissible">
        <p>Data Pendaftaran Online</p>
        
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-3">
                            <h3 class="box-title">Pasien Pendaftaran Online</h3>
                            <input type="hidden" id="x-token" name='x_token' value="<?= $token?>">
                            <input type="hidden" name="limit" id="limit" value='20'>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <input type="radio" name="filter" value="lama" checked onclick="getData(1)">Pasien Lama
                                <input type="radio" name="filter" value="baru" onclick="getData(1)">Pasien Baru
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <input type="date" class="form-control input-sm" name="tgl" id="tgl" placeholder="Tanggal" onchange="getData(1)" value="<?php echo date('Y-m-d'); ?>">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-sm"> <span class="fa fa-calendar"></span></button>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <select class="form-control input-sm" name="poly" id="poly" onchange="getData(1)">
                                <option value="">Pilih</option>
                                <?php
                                foreach ($poly as $p) {
                                ?>
                                    <option value="<?php echo $p->idx ?>"><?php echo $p->ruang; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" class="form-control input-sm" name="q" id="q" value="" placeholder="Search">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-sm" onclick="getData(1)">Search</button>
                                    <button class="btn btn-success btn-sm" onclick="download_excel()"> <span class="fa fa-file-excel-o "></span></button>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table id="simple-table" class="table table-bordered table-hover" style='color:#000000;'>
                        <thead class="bg-blue">
                            <th>No</th>
                            <th>Nomr</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Poly Tujuan</th>
                            <th>Tgl Rencana Kunj.</th>
                            <th>Rujukan</th>
                            <th>Batch Antrian</th>
                            <th>Estimasi</th>
                            <th>Dokter</th>
                            <th>Cara Bayar</th>
                            <th>Tgl Daftar</th>
                            <th>No BPJS</th>
                            <th>Aprove</th>
                        </thead>
                        <tbody id="data">

                        </tbody>
                    </table><br>&nbsp;
                    <div id="nav"></div>
                </div>
            </div>
        </div>
    </div>


</section>

<div class="modal fade" id="form_aprove" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg">
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
                        <div class="col-md-5">
                            <div class="row">
                                <div class="box box-widget widget-user-2">
                                    <div class="widget-user-header bg-green">
                                        <div class="widget-user-image" id="lbljekel">
                                            <img class="img-circle" src="<?= base_url() ?>assets/images/male.png" alt="" id="imgFemale">
                                        </div>
                                        <h4 class="widget-user-username" id="lblnama">FERDINAL </h4>
                                        <h5 class="widget-user-desc" id="lbltgllahir">SUNGAIPUA / 1983-07-14</h5>
                                        <h5 class="widget-user-desc" id="lblnik">0000148327029</h5>
                                    </div>
                                    <div class="box-body">
                                        <ul class="nav nav-stacked">
                                            <li id="lblpoly"></li>
                                            <li id="lblrujukan"></li>
                                            <li id="lblcarabayar"></li>
                                            <li id="lbldokter"></li>
                                            <li id="lblantrianloket"></li>
                                            <li id="lblantrianpoly"></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="box">
                                <!--div class="box-header with-border">
                                        
                                    </div-->

                                <div class="box-body">
                                    <form id="form" method="POST" class="form-horizontal" action="<?php echo base_url() . "mr_registrasi.php/online/aprove_pasien" ?>">
                                        <fieldset>
                                            <legend>Penanggung Jawab Pasien</legend>
                                            <!--Data Pasien-->
                                            <input type="hidden" name="nomr" id="nomr" value="">
                                            <input type="hidden" name="nama_pasien" id="nama_pasien" value="">
                                            <input type="hidden" name="no_ktp" id="no_ktp" value="">
                                            <input type="hidden" name="tempat_lahir" id="tempat_lahir" value="">
                                            <input type="hidden" name="tgl_lahir" id="tgl_lahir" value="">
                                            <input type="hidden" name="jns_kelamin" id="jns_kelamin" value="">
                                            <input type="hidden" name="status_kawin" id="status_kawin" value="">
                                            <input type="hidden" name="pekerjaan" id="pekerjaan" value="">
                                            <input type="hidden" name="agama" id="agama" value="">
                                            <input type="hidden" name="no_telpon" id="no_telpon" value="">
                                            <input type="hidden" name="kewarganegaraan" id="kewarganegaraan" value="">
                                            <input type="hidden" name="nama_negara" id="nama_negara" value="">
                                            <input type="hidden" name="nama_provinsi" id="nama_provinsi" value="">
                                            <input type="hidden" name="nama_kab_kota" id="nama_kab_kota" value="">
                                            <input type="hidden" name="nama_kecamatan" id="nama_kecamatan" value="">
                                            <input type="hidden" name="nama_kelurahan" id="nama_kelurahan" value="">
                                            <input type="hidden" name="suku" id="suku" value="">
                                            <input type="hidden" name="bahasa" id="bahasa" value="">
                                            <input type="hidden" name="alamat" id="alamat" value="">
                                            <input type="hidden" name="penanggung_jawab" id="penanggung_jawab" value="">
                                            <input type="hidden" name="no_penanggung_jawab" id="no_penanggung_jawab" value="">
                                            <input type="hidden" name="no_bpjs" id="no_bpjs" value="">

                                            <!--Data Pendaftaran-->
                                            <input type="hidden" name="daftar_id" id="daftar_id" value="">
                                            <input type="hidden" name="jns_layanan" id="jns_layanan" value="">
                                            <input type="hidden" name="tgl_masuk" id="tgl_masuk" value="">
                                            <input type="hidden" name="id_ruang" id="id_ruang" value="">
                                            <input type="hidden" name="nama_ruang" id="nama_ruang" value="">
                                            <input type="hidden" name="id_rujuk" id="id_rujuk" value="">
                                            <input type="hidden" name="rujukan" id="rujukan" value="">
                                            <input type="hidden" name="no_rujuk" id="no_rujuk" value="">
                                            <input type="hidden" name="id_cara_bayar" id="id_cara_bayar" value="">
                                            <input type="hidden" name="cara_bayar" id="cara_bayar" value="">
                                            <input type="hidden" name="id_dokter" id="id_dokter" value="">
                                            <input type="hidden" name="namaDokterJaga" id="namaDokterJaga" value="">

                                            <input type="hidden" name="antrian_poly" id="antrian_poly" value="">

                                            <div class="form-group">
                                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Nama</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input name="pjPasienNama" id="pjPasienNama" type="text" class="form-control" value="" onkeydown="enter_pjnama_aprove(event)">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Telp/HP</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input name="pjPasienTelp" id="pjPasienTelp" type="text" class="form-control" onkeydown="enter_pjtelp(event)">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Hubungan Keluarga</label>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <input name="pjPasienHubKel" id="pjPasienHubKel" type="text" class="form-control" onkeydown="enter_pjhubungan_aprove(event)">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Umur</label>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <input name="pjPasienUmur" id="pjPasienUmur" type="text" class="form-control" onkeydown="enter_pjumur(event)">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Pekerjaan</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input name="pjPasienPekerjaan" id="pjPasienPekerjaan" type="text" class="form-control" onkeydown="enter_pjpekerjaan(event)">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Alamat</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <textarea name="pjPasienAlamat" id="pjPasienAlamat" class="form-control" rows="2" maxlength="255"></textarea>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="adarujukan">
                                            <legend>Rujukan</legend>
                                            <div class="form-group ">
                                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Dikirim Oleh<br><em>Jika pasien rujukan</em></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12 pengirim" onkeydown="enter_pengirim(event)">

                                                    <select class="form-control" id="id_pengirim" name="id_pengirim" onchange="pilihPengirim()"></select>
                                                </div>
                                                <div class="pengirim" id="lainnya" style="display: none;"><input name="pjPasienDikirimOleh" id="pjPasienDikirimOleh" type="text" class="form-control" onkeydown="enter_pengirim1(event)"> </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">Alamat Pengirim<br><em>Jika pasien rujukan</em></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <textarea name="pjPasienAlmtPengirim" id="pjPasienAlmtPengirim" class="form-control" rows="2" maxlength="255"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group sep">
                                                <label class="col-md-4 col-sm-4 col-xs-12 control-label">No Jaminan (<em>SEP</em>)</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <div class="input-group">
                                                        <input name="no_jaminan" id="no_jaminan" type="text" class="form-control">
                                                        <span class="input-group-addon">
                                                            <input type="checkbox" id="chkIsJaminan" /> Format SEP
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>
                                        <!--input type="submit" name="simpan"-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/form-->
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCariRujukanPasien" onclick="aprovePasien()" class="btn btn-success">Aprove</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var base_url = "<?php echo base_url() . "mr_registrasi.php/"; ?>";
    
</script>