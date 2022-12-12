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

    fieldset legend {
        text-transform: uppercase;
        font-weight: bolder;
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
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">

    <div class="row">
        <div class="col-md-3">
            <div class="box box-widget widget-user-2">
                <div class="widget-user-header bg-green">
                    <div class="widget-user-image" id="lbljekel">
                        <?php
                        if ($pasien->jns_kelamin == "L" || $pasien->jns_kelamin == "1") echo "<img src='" . base_url() . "assets/images/male.png'>";
                        else echo "<img src='" . base_url() . "assets/images/female.png'>";
                        ?>
                    </div>
                    <h4 class="widget-user-username" id="lblnama"><?php echo $pendaftaran->nama_pasien ?></h4>
                    <h5 class="widget-user-desc" id="lbltgllahir"><?php echo $pendaftaran->tempat_lahir . " / " . setDateInd($pasien->tgl_lahir) ?></h5>
                    <h5 class="widget-user-desc" id="lblnik"><?php echo $pendaftaran->no_ktp ?></h5>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li id="lblpoly">
                            <div class="row">
                                <div class="col-md-4"><label for="nomr">Nomr</label> </div>
                                <div class="col-md-8"><label for="">: <?php echo $pendaftaran->nomr ?></label></div>
                            </div>
                        </li>
                        <li id="lblrujukan">
                            <div class="row">
                                <div class="col-md-4"><label for="nomr">Rujukan </label></div>
                                <div class="col-md-8"><label for="nomr">: <?php echo $pendaftaran->rujukan ?></label></div>
                            </div>
                        </li>
                        <li id="lblcarabayar">
                            <div class="row">
                                <div class="col-md-4"><label for="nomr">Cara Bayar</label> </div>
                                <div class="col-md-8"><label for="nomr">: <?php echo $pendaftaran->cara_bayar ?></label>
                                </div>
                            </div>
                        </li>
                        <li id="lbldokter">
                            <div class="row">
                                <div class="col-md-4"><label for="nomr">Dokter </label></div>
                                <div class="col-md-8"><label for="nomr">: <?php echo $pendaftaran->namaDokterJaga ?></label>
                                </div>
                            </div>
                        </li>
                        <li id="lblantrianloket">
                            <div class="row">
                                <div class="col-md-4"><label for="nomr">Batch Antrian </label></div>
                                <div class="col-md-8"><label for="nomr">: <?php echo $pendaftaran->jam_kunjunganLabel ?></label>
                                </div>
                            </div>
                        </li>
                        <li id="lblantrianpoly">
                            <div class="row">
                                <div class="col-md-4"><label for="nomr">Estimasi Pelayanan </label></div>
                                <div class="col-md-8"><label for="nomr">: <?php echo $pendaftaran->jam_kunjunganAntrian ?></label>
                                </div>
                            </div>
                        </li>
                        <li id="lblantrianpoly">
                            <div class="row">
                                <div class="col-md-4"><label for="nomr">Nomor Antrian </label></div>
                                <div class="col-md-8"><label for="nomr">: <?php echo $pendaftaran->label_antrian .".".$pendaftaran->nomor_daftar ?></label>
                                </div>
                            </div>
                        </li>
                        <li id="lblantrianpoly">
                            <div class="row">
                                <div class="col-md-4"><label for="nomr">Alamat </label></div>
                                <?php
                                $alamat = ucwords(strtolower($pasien->alamat));
                                if ($pasien->nama_kelurahan) $alamat .= " Kel. " . $pasien->nama_kelurahan;
                                if ($pasien->nama_kecamatan) $alamat .= " Kec. " . $pasien->nama_kecamatan;
                                if ($pasien->nama_kab_kota) $alamat .= $pasien->nama_kab_kota;
                                if ($pasien->nama_provinsi) $alamat .= " Prov. " . $pasien->nama_provinsi;
                                ?>
                                <div class="col-md-8"><label for="nomr">: <?php echo $alamat ?></label>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="box">
                <!--div class="box-header with-border">
                    
                </div-->

                <div class="box-body">
                    <form id="form" method="POST" class="form-horizontal" action="<?php echo base_url() . "mr_registrasi.php/smart/aprove_pasien" ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <legend>Penanggung Jawab Pasien</legend>
                                    <!--Data Pasien-->
                                    <input type="hidden" name="id_pasien" id="id_pasien" value="<?= $pasien->idx ?>">
                                    <input type="hidden" name="id_userdaftar" id="id_userdaftar" value="<?= $pasien->id_user ?>">
                                    <input type="hidden" name="id_pendaftaran_online" id="id_pendaftaran_online" value="<?= $pendaftaran->idx ?>">
                                    <input type="hidden" name="nomr" id="nomr" value="<?= $pendaftaran->nomr ?>">
                                    <input type="hidden" name="nama_pasien" id="nama_pasien" value="<?= $pendaftaran->nama_pasien ?>">
                                    <input type="hidden" name="no_ktp" id="no_ktp" value="<?= $pendaftaran->no_ktp ?>">
                                    <input type="hidden" name="tempat_lahir" id="tempat_lahir" value="<?= $pendaftaran->tempat_lahir ?>">
                                    <input type="hidden" name="tgl_lahir" id="tgl_lahir" value="<?= $pendaftaran->tgl_lahir ?>">
                                    <input type="hidden" name="jns_kelamin" id="jns_kelamin" value="<?= $pendaftaran->jns_kelamin ?>">
                                    <input type="hidden" name="status_kawin" id="status_kawin" value="<?= $pasien->status_kawin ?>">
                                    <input type="hidden" name="pekerjaan" id="pekerjaan" value="<?= $pasien->pekerjaan ?>">
                                    <input type="hidden" name="agama" id="agama" value="<?= $pasien->agama ?>">
                                    <input type="hidden" name="no_telpon" id="no_telpon" value="<?= $pasien->no_telpon ?>">
                                    <input type="hidden" name="kewarganegaraan" id="kewarganegaraan" value="<?= $pasien->kewarganegaraan ?>">
                                    <input type="hidden" name="nama_negara" id="nama_negara" value="<?= $pasien->nama_negara ?>">
                                    <input type="hidden" name="nama_provinsi" id="nama_provinsi" value="<?= $pasien->nama_provinsi ?>">
                                    <input type="hidden" name="nama_kab_kota" id="nama_kab_kota" value="<?= $pasien->nama_kab_kota ?>">
                                    <input type="hidden" name="nama_kecamatan" id="nama_kecamatan" value="<?= $pasien->nama_kecamatan ?>">
                                    <input type="hidden" name="nama_kelurahan" id="nama_kelurahan" value="<?= $pasien->nama_kelurahan ?>">
                                    <input type="hidden" name="suku" id="suku" value="<?= $pasien->suku ?>">
                                    <input type="hidden" name="bahasa" id="bahasa" value="<?= $pasien->bahasa ?>">
                                    <input type="hidden" name="alamat" id="alamat" value="<?= $pasien->alamat ?>">
                                    <input type="hidden" name="penanggung_jawab" id="penanggung_jawab" value="<?= $pasien->penanggung_jawab ?>">
                                    <input type="hidden" name="no_penanggung_jawab" id="no_penanggung_jawab" value="<?= $pasien->no_penanggung_jawab ?>">
                                    <input type="hidden" name="txtTanggal" id="txtTanggal" value="<?= date('Y-m-d') ?>">
                                    <input type="hidden" name="tgl_daftar" id="tgl_daftar" value="<?= $pasien->tgl_daftar ?>">
                                    <!--input type="hidden" name="no_bpjs" id="no_bpjs" value=""-->

                                    <!--Data Pendaftaran-->
                                    <input type="hidden" name="daftar_id" id="daftar_id" value="<?= $pendaftaran->id_daftar ?>">
                                    <input type="hidden" name="jns_layanan" id="jns_layanan" value="RJ">
                                    <input type="hidden" name="tgl_masuk" id="tgl_masuk" value="<?= $pendaftaran->tanggal_kunjungan ?>">
                                    <input type="hidden" name="no_rujuk" id="no_rujuk" value="<?= $pendaftaran->no_rujuk ?>">
                                    <input type="hidden" name="id_dokter" id="id_dokter" value="<?= $pendaftaran->dokterJaga ?>">
                                    <input type="hidden" name="namaDokterJaga" id="namaDokterJaga" value="<?= $pendaftaran->namaDokterJaga ?>">

                                    <input type="hidden" name="label_antrian" id="label_antrian" value="<?php echo $pendaftaran->label_antrian ?>">
                                    <input type="hidden" name="jam_kunjunganLabel" id="jam_kunjunganLabel" value="<?php echo $pendaftaran->jam_kunjunganLabel ?>">
                                    <input type="hidden" name="jam_kunjunganAntrian" id="jam_kunjunganAntrian" value="<?php echo $pendaftaran->jam_kunjunganAntrian ?>">
                                    <input type="hidden" name="jam_kunjungan" id="jam_kunjungan" value="<?php echo $pendaftaran->jam_kunjungan ?>">
                                    <input type="hidden" name="nomor_daftar" id="nomor_daftar" value="<?php echo $pendaftaran->nomor_daftar ?>">
                                    <div class="form-group">
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">Nama</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input name="pjPasienNama" id="pjPasienNama" type="text" class="form-control" value="<?php if (!empty($pj)) echo $pj->nama_penanggung_jawab;
                                                                                                                                    else $pasien->penanggung_jawab ?>" onkeydown="enter_pjnama_aprove(event)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">Telp/HP</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input name="pjPasienTelp" id="pjPasienTelp" type="text" class="form-control" value="<?php if (!empty($pj)) echo $pj->no_telp;
                                                                                                                                    else $pasien->no_penanggung_jawab ?>" onkeydown="enter_pjtelp(event)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">Hubungan Keluarga</label>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <input name="pjPasienHubKel" id="pjPasienHubKel" type="text" class="form-control" value="<?php if (!empty($pj)) echo $pj->hub_keluarga; ?>" onkeydown="enter_pjhubungan_aprove(event)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">Umur</label>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <?php if (!empty($pj)) {
                                                if (intval($pj->tahun_lahir)) $umur = date('Y') - $pj->tahun_lahir;
                                                else $umur = "";
                                            } else $umur = ""; ?>
                                            <input name="pjPasienUmur" id="pjPasienUmur" type="text" class="form-control" value="<?= $umur ?>" onkeydown="enter_pjumur(event)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">Pekerjaan</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input name="pjPasienPekerjaan" id="pjPasienPekerjaan" type="text" class="form-control" value="<?php if (!empty($pj)) echo $pj->pekerjaan ?>" onkeydown="enter_pjpekerjaan(event)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">Alamat</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" name="pjPasienAlamat" id="pjPasienAlamat" value="<?php if (!empty($pj)) echo $pj->alamat ?>" class="form-control" onkeydown="enter_pjalamatonline(event)">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <!--fieldset class="adarujukan">
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
                                                    <input type="checkbox" id="chkIsJaminan"/> Format SEP
                                                </span>
                                            </div>            
                                        </div>
                                    </div>    

                                </fieldset-->
                                <fieldset>
                                    <legend>Informasi Pelayanan</legend>
                                    <div class="form-group">
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">Cara Bayar</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="input-group">
                                                <input type="hidden" id="sekarang" name='sekarang' value="<?= date('Y-m-d') ?>">
                                                <?php
                                                $idcarabayar = $pendaftaran->id_cara_bayar;
                                                //echo $idcarabayar;

                                                if ($idcarabayar >= 2 && $idcarabayar <= 6) $idcarabayar = 2;
                                                $rowcb = $this->patch_model->getCaraBayarByid($idcarabayar);
                                                if (!empty($rowcb)) $jkn = $rowcb->jkn;
                                                else $jkn = "0";
                                                //echo $idcarabayar;
                                                //print_r($rowcb);
                                                //echo $jkn;
                                                ?>
                                                <select class="form-control" name="id_cara_bayar" id="id_cara_bayar" onkeydown="enter_carabayar(event)" style="width: 100%;">
                                                    <option value=""></option>
                                                    <?php foreach ($getCaraBayar as $xCB) : ?>
                                                        <option value="<?php echo $xCB['idx'] ?>" <?php if ($idcarabayar == $xCB['idx']) echo "selected"; ?>><?php echo $xCB['cara_bayar'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <input type="hidden" name="jkn" id='jkn' value='<?= $jkn  ?>'>

                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="status_peserta" id="status_peserta" value="">
                                    <div class="form-group divRegCredit" <?php if ($jkn == 1) echo "style='display:block'";
                                                                            else echo "style='display:none'" ?>>
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">No Peserta (<em>No BPJS</em>)</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="input-group">
                                                <input name="no_bpjs" id="no_bpjs" type="text" class="form-control" value="<?php echo $pendaftaran->no_bpjs;
                                                                                                                            ?>" onkeydown="enter_nobpjs(event)">
                                                <span class="input-group-addon">
                                                    <a id="btnUpdateNoBPJS" href="Javascript:updateNoBPJS()"><i class="fa fa-save"></i> Update</a>
                                                </span>
                                                <span class="input-group-addon" id="status">
                                                    <a id="cekStatus" href="Javascript:cekPeserta()"><i class="fa fa-search"></i> Cek</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group divRegCredit" <?php if ($jkn == 1) echo "style='display:block'";
                                                                            else echo "style='display:none'" ?>>
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">Jenis Peserta</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon" style="width:10px;padding:0px;">
                                                    <input type="text" name="id_jenis_peserta" id='id_jenis_peserta' class='form-control' readonly value=''>
                                                </span>
                                                <span class="input-group-addon" style="width:90px;padding:0px;">
                                                    <input type="text" name="jenis_peserta" id='jenis_peserta' class="form-control" readonly value=''>
                                                </span>
                                            </div>
                                            <div class="input-group">


                                            </div>
                                        </div>
                                    </div>
                                    <?php

                                    $id_rujuk = $pendaftaran->id_rujuk;
                                    if ($id_rujuk == 7) $id_rujuk = 6;
                                    //echo $id_rujuk;
                                    $rowir = $this->patch_model->getRujukanByid($id_rujuk);
                                    if (!empty($rowir)) $faskes = $rowir->id_faskes;
                                    else $faskes = 1;
                                    ?>
                                    <div class="form-group">
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">Rujukan</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="input-group">


                                                <select class="form-control select" name="id_rujuk" id="id_rujuk" onkeydown="enter_rujukan(event)" onchange="getPengirim()">
                                                    <option value=""></option>
                                                    <?php foreach ($getRujukan as $xR) : ?>
                                                        <option value="<?php echo $xR['idx'] ?>" <?php if ($id_rujuk == $xR['idx']) echo 'selected="selected"'; ?>><?php echo $xR['rujukan'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <!-- <input type="hidden" id="faskes" name='faskes' value="<?= $faskes ?>"> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div id="faskesperujuk">
                                        <?php 
                                        if($faskes==1){
                                            ?>
                                            <div class="form-group" style=""><label class="col-md-4 col-sm-4 col-xs-12 control-label">Faskes Perujuk<br></label><div class="col-md-8 col-sm-8 col-xs-12"><div class="input-group"><input type="hidden" name="faskes" id="faskes" value="1"><input type="text" name="jenis_faskes" id="jenis_faskes" class="form-control" value="Faskes Tingkat 1" readonly=""><span class="input-group-addon"><input type="checkbox" value="1" name="jarkomdat" id="jarkomdat" onclick="cekJarkodat()" checked="">Jarkomdat</span></div></div></div>
                                            <?php
                                        }elseif($faskes==2){
                                            ?>
                                            <div class="form-group" style=""><label class="col-md-4 col-sm-4 col-xs-12 control-label">Faskes Perujuk<br></label><div class="col-md-8 col-sm-8 col-xs-12"><div class="input-group"><input type="hidden" name="faskes" id="faskes" value="2"><input type="text" name="jenis_faskes" id="jenis_faskes" class="form-control" value="Faskes Tingkat 2" readonly=""><span class="input-group-addon"><input type="checkbox" value="1" name="jarkomdat" id="jarkomdat" onclick="cekJarkodat()" checked="">Jarkomdat</span></div></div></div>
                                            <?php
                                        }else{
                                            ?>
                                            <div class="form-group" style=""><label class="col-md-4 col-sm-4 col-xs-12 control-label">Faskes Perujuk<br></label><div class="col-md-8 col-sm-8 col-xs-12"><div class="input-group"><select class="form-control" name="faskes" id="faskes"><option value="1">Faskes Tingkat 1</option><option value="2">Faskes Tingkat 2</option></select><span class="input-group-addon"><input type="checkbox" value="1" name="jarkomdat" id="jarkomdat" onclick="cekJarkodat()" checked="">Jarkomdat</span></div></div></div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group adarujukan" <?php if ($faskes > 0) echo "style='display:none;'" ?>>
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">No Rujukan</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="input-group ">
                                                <input type="text" id="txtNorujuk" name="txtNorujuk" class="form-control" value="<?php echo $pendaftaran->no_rujuk ?>" placeholder="Enter Nomor Rujukan" onkeyup="enter_norujukan(event)">
                                                <input type="hidden" name="encryptdata" id='encryptdata' value=''>
                                                <div class="input-group-btn">
                                                    <button type="button" id="cariRujukan" class="btn btn-default" <?php if (STATUS_VC == "0") echo "disabled";
                                                                                                                    else echo 'onclick="getListRujukan()"' ?>>
                                                        <i class="fa fa-search"></i> Cari Rujukan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group kontrolulang" style="display:none">
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">No Surat Kontrol</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="input-group ">
                                                <input type="text" id="no_suratkontrol" name="no_suratkontrol" class="form-control" placeholder="Enter Nomor Surat Kontrol" onkeyup="enter_nokontrol(event)">
                                                <input type="hidden" name="kd" id="kd">
                                                <input type="hidden" name="nd" id="nd">
                                                <div class="input-group-btn">
                                                    <button type="button" id="cariKontrol" class="btn btn-default" <?php if (STATUS_VC == "0") echo "disabled";
                                                                                                                    else echo 'onclick="getListKontrol()"' ?>>
                                                        <i class="fa fa-search"></i> Cari Surat Kontrol</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group adarujukan" <?php if ($faskes > 0) echo "style='display:none;'" ?>>
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">Dikirim Oleh<br><em>Jika pasien rujukan</em></label>
                                        <div class="col-md-8 col-sm-8 col-xs-12 pengirim" onkeydown="enter_pengirim(event)">

                                            <?php
                                            if (STATUS_VC == "0") {
                                            ?>
                                                <select class="form-control select" id="id_pengirim" name="id_pengirim" onchange="pilihPengirim()"></select>
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
                                    <div class="form-group adarujukan" <?php if ($faskes > 0) echo "style='display:none;'" ?>>
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">Alamat Pengirim<br><em>Jika pasien rujukan</em></label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" name="pjPasienAlmtPengirim" id="pjPasienAlmtPengirim" class="form-control" onkeydown="enter_alamatpengirim(event)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">Tujuan Layanan</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="input-group">
                                                <select class="form-control select" name="id_ruang" id="id_ruang" onkeydown="enter_ruangan(event)" onchange="getDokter()">
                                                    <option value=""></option>
                                                    <?php foreach ($getPoli as $xP) : ?>
                                                        <option value="<?php echo $xP->idx ?>" <?php if ($pendaftaran->id_ruang == $xP->idx) echo "selected" ?>><?php echo $xP->ruang ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">Dokter</label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="input-group">
                                                <?php
                                                $dokter = $this->patch_model->getdokter($pendaftaran->id_ruang);
                                                //if($dokter)
                                                if (!empty($dokter)) {
                                                    //$dok = $this->patch_model->setdokter($pendaftaran->dokterJaga);
                                                    $nrpdokter = $pendaftaran->dokterJaga;
                                                } else {
                                                    //$dok = array();
                                                    $nrpdokter = "";
                                                }

                                                ?>
                                                <select class="form-control" name="dokterJaga" id="dokterJaga" onkeydown="enter_dokter(event)">
                                                    <option value="">Pilih Dokter</option>
                                                    <?php
                                                    foreach ($dokter as $d) {
                                                    ?>
                                                        <option value="<?= $d->NRP ?>" <?php if ($nrpdokter == $d->NRP) echo "selected"; ?>><?= $d->pgwNama ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if (STATUS_VC == "0") {
                                    ?>
                                        <div class="form-group divRegCredit" <?php if ($jkn == 1) echo "style='display:block'";
                                                                                else echo "style='display:none'";  ?>>
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
                                        <div class="form-group divRegCredit" <?php if ($jkn == 1) echo "style='display:block'";
                                                                                else echo "style='display:none'";  ?>>
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
                                                <button type="button" id="daftar" class="btn btn-primary" onclick="aprovePasien()">
                                                    Daftar <i class="fa fa-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <!--input type="submit" name="simpan"-->
                    </form>
                </div>
            </div>
        </div>
    </div>


</section>
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

<div class="modal fade" id="mpop_sep" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg" style="overflow-y: initial !important;  max-height:85%">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="headSep">SEP Rawat Jalan</h3>
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
                            <input type="hidden" name="idx" id="idx" value="">
                            <input type="hidden" name="noKartu" id="noKartu" value="">
                            <input type="hidden" name="ppkPelayanan" id="ppkPelayanan" value="0306R001">
                            <input type="hidden" name="jnsPelayanan" id="jnsPelayanan" value="2">
                            <input type="hidden" name="klsRawat" id="klsRawat" value="">
                            <!-- Tidak Diisi Kerena SEP Rawat Jalan -->
                            <input type="hidden" name="klsRawatNaik" id="klsRawatNaik" value="">
                            <input type="hidden" name="pembiayaan" id="pembiayaan" value="">
                            <input type="hidden" name="penanggungJawab" id="penanggungJawab" value="">
                            <input type="hidden" name="nomr" id="nomr_sep" value="<?= $pendaftaran->nomr ?>">
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
                                            <input type="hidden" name="asalRujukan" id="asalRujukan" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">PPK Asal Rujukan <label style="color:red;font-size:small">*</label></label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control ui-autocomplete-input" id="txtppkasalrujukan" placeholder="ketik kode atau nama ppk asal rujukan min 3 karakter" readonly="">
                                            <input type="hidden" class="form-control" id="txtkdppkasalrujukan" value="03050101">
                                            <input type="hidden" name="ppkRujukan" id="ppkRujukan" value="">
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
                                            <input type="text" class="form-control" id="noSurat" maxlength="25" placeholder="ketik nomor surat kontrol" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" maxlength="6">
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
                                    <td>Jenis Kontrol</td>
                                    <td>NO Surat Kontrol</td>
                                    <td>Poli</td>
                                    <td>Nama Dokter</td>
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
                            <input type="text" name="dari" id="dari" class="form-control datepicker" value="<?= date('Y-m')."-01" ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="Dari">Sampai</label>
                            <div class="input-group input-group-sm">
                                <input type="text" name="sampai" id="sampai" class="form-control datepicker" value="<?= date('Y-m-d') ?>">
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
                            <input type="text" class="form-control" id="noSEP" name='noSEP' placeholder="Masukkan No SEP" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="pwd">Tanggal Rencana Kontrol:</label>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" id="tglRencanaKontrol" placeholder="Masukkan rencana kontrol" onchange="caripoliKontrol()">
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
                                <select name="poliKontrol" id="poliKontrol" class="form-control" onchange="dokterKontrol()" style="width:100%"></select>
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
                                <select name="kodeDokter" id="kodeDokter" class="form-control" style="width:100%"></select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" class="button"> <span class="fa fa-user-md" id="iconDokter"></span></button>
                                    </span>
                                </div>
                            
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
<div class="modal fade" id="asspel" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="headRujukan">Pilih ALasan kunjungan</h3>
            </div>
            <div class="modal-body">
            <select name="c-assesmentPel" id="c-assesmentPel" class="form-control" onchange="pilihAsesmen()">
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
<script>
    var base_url = "<?php echo base_url() . "mr_registrasi.php"; ?>";
    var url_call_back = "<?php echo base_url() . "api.php/"; ?>"
</script>

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

        $('#no_jaminan').inputmask(mask, {
            'placeholder': '<?php echo KODERS_VC ?>____V______'
        });
        $('#pjPasienUmur').inputmask('9{1,3}');
        $('#pjPasienTelp').inputmask('9{3,24}');
        $('#no_jaminan').val('');
        $('.select').select2({
            placeholder: '-- Pilih --'
        });
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

        //getHistoryPasien();
        $('.select').not('#optJnsRujukan').not('#optAsalRujukan').not('#lakaLantas').not('#cbprovinsi').not('#cbkabupaten').not('#cbkecamatan').not('#dokterJaga').not("#id_ruang").not('#id_rujuk').not("#id_cara_bayar").not('#id_pengirim').not('#kewarganegaraan').not('#x-agama').not('#x-pekerjaan').not('#x-suku').not('#x-bahasa').not('#x-status_kawin').select2({
            placeholder: '-- Pilih --'
        });
        //$('select').not('#kewarganegaraan').not('#agama').not('#pekerjaan').not('#suku').not('#bahasa').not('#status_kawin').select2({placeholder:'------------ Pilih option ------------'});
        //$('select').val('').trigger('change');
        $('#id_cara_bayar').trigger('change');
        $('#id_rujuk').trigger('change');
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        //$('#tgl_layanan').val('<?php //echo date("d/m/Y") ?>');

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
            //console.clear();
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
        });

        $('#batal').click(function() {
            var url = '<?php echo base_url() . 'mr_registrasi.php/online' ?>';
            window.location.href = url;
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

        // $("#txtnmdpjp").autocomplete({
        //         source: function(request, response) {

        //             $.ajax({
        //                 url: "<?php echo base_url() . 'api.php/vclaim/referensi/dokter' ?>",
        //                 dataType: "JSON",
        //                 method: "POST",
        //                 data: {
        //                     param1: request.term
        //                 },
        //                 success: function(data) {
        //                     console.log(data);
        //                     var dokter = data.response.list;
        //                     response(dokter.slice(0, 15));
        //                 },
        //                 error: function(jqXHR, ajaxOption, errorThrown) {
        //                     console.log(errorThrown);
        //                 }
        //             });
        //         },
        //         minLength: 2,
        //         focus: function(event, ui) {
        //             $("#kodeDPJP").val(ui.item['kode']);
        //             $("#txtnmdpjp").val(ui.item['nama']);
        //             $("#txtnmdpjp").removeClass("ui-autocomplete-loading");
        //             return false;
        //         },
        //         select: function(event, ui) {
        //             $("#kodeDPJP").val(ui.item['kode']);
        //             $("#txtnmdpjp").val(ui.item['nama']);
        //             $("#txtnmdpjp").removeClass("ui-autocomplete-loading");
        //             return false;
        //         }
        //     })
            // .autocomplete("instance")._renderItem = function(table, item) {
            //     return $("<tr class='autocomplete'>")
            //         .append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
            //         .appendTo(table);
            // };

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

        //End Control
        $('#id_cara_bayar').change(function() {

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

                        if (x == "0" || x == "3") {
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
        });
        $('#id_ruang').on('select2:select', function(e) {
            $('#dokterJaga').focus();
        });
        $('#dokterJaga').on('select2:select', function(e) {
            var jkn = $('#jkn').val();
            if (jkn == 1) $('#no_jaminan').focus();
            else $('#daftar').focus();
            var dokter=$('#dokterJaga').val();
            var poly=$('#id_ruang').val();
            cekGroupAntri(poly,dokter);
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
            // alert("id rujuk")
            id_rujuk = $('#id_rujuk').val();
            var url = base_url + "/patch/getpengirim/" + parseInt(id_rujuk);
            // console.log(url);
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
                    console.log(data);
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
                        // alert(data["rujukan"]["id_faskes"])
                        if (data["rujukan"]["id_faskes"] == "0") {
                            var asal='<div class="form-group" style="">'+
                                '<label class="col-md-4 col-sm-4 col-xs-12 control-label">Faskes Perujuk<br></label>'+
                                '<div class="col-md-8 col-sm-8 col-xs-12">'+
                                    '<div class="input-group">'+
                                        '<input type="hidden" name="faskes" id="faskes" value="'+data["rujukan"]["id_faskes"]+'">'+
                                        '<input type="text" name="jenis_faskes" id="jenis_faskes" class="form-control" value="'+data['rujukan']['faskes']+'" readonly>'+
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
                                '<label class="col-md-4 col-sm-4 col-xs-12 control-label">Faskes Perujuk<br></label>'+
                                '<div class="col-md-8 col-sm-8 col-xs-12">'+
                                    '<div class="input-group">'+
                                        '<input type="hidden" name="faskes" id="faskes" value="'+data["rujukan"]["id_faskes"]+'">'+
                                        '<input type="text" name="jenis_faskes" id="jenis_faskes" class="form-control" value="'+data['rujukan']['faskes']+'" readonly>'+
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
                                '<label class="col-md-4 col-sm-4 col-xs-12 control-label">Faskes Perujuk<br></label>'+
                                '<div class="col-md-8 col-sm-8 col-xs-12">'+
                                    '<div class="input-group">'+
                                    '<select class="form-control" name="faskes" id="faskes">'+
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
                        if(id_rujuk==6 || id_rujuk==4){
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
                            console.log('data Penanggung Jawab ...');
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
        cekPeserta()
        
    });
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

    function formSEP() {
        /*$('#optJnsRujukan').prop('selectedIndex',0);
        $('#optAsalRujukan').prop('selectedIndex',0);
        $('#txtTanggal').val('<?php //echo date("Y-m-d") 
                                ?>');
        $('#no_rujuk').val('');
        $('#formModalSEP').modal('show');*/
        $('#pjPasienNama').removeClass("ui-autocomplete-input");
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
                    tampilkanPesan('success', "Tampilkan Form SEP IGD");
                } else {
                    tampilkanPesan('warning', "Rujukan Tidak Valid");
                }
            }
            //alert("Rujukan Tidak Valid");

        } else {
            formGenerateSEP(encryptdata);

        }

    }

</script>