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

    /* .modal-content {
        max-height: 600px;
        overflow-y: scroll:
    } */
    .modal-content {
        overflow-y: scroll;
        overflow-x: hidden;
        max-height: 95vh;
    }
    .input-group-btn {
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
    .form-group {
    margin-bottom: 5px;
    }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.css">
<script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery/css/jquery-ui.css">
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">Pasien Baru</div>

                <div class="box-body">

                    <form id="form1" class="form-horizontal" role="form" onsubmit="return false">
                        <?php 
                            if(!empty($kode_booking)){
                                ?>
                            <div class="col-md-3">
                                <div class="box box-primary">
                                    <div class="box-body box-profile">
                                        <img class="profile-user-img img-responsive img-circle" src="<?= base_url() ?>assets/images/male.png" alt="User profile picture">
                                    
                                        <h3 class="profile-username text-center"><?= $nama ?></h3>

                                        <p class="text-muted text-center"><?= $no_ktp ?></p>
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a title="Profile Peserta" href="#tab_11" data-toggle="tab" aria-expanded="true"><span class="fa fa-user"></span> Profile</a></li>
                                                                        </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_11">
                                                    <table class="table">
                                                        <tbody>
                                                        <tr>
                                                            <td><b>Kode Booking</b></td>
                                                            <td><?= $kode_booking ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>NIK</b></td>
                                                            <td><?= $no_ktp?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>No BPJS</b></td>
                                                            <td><?= $no_bpjs?></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><b>Nama</b></td>
                                                            <td><?= $nama ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>TTL</b></td>
                                                            <td><?= $tempat_lahir ?> / <?= $tgl_lahir ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Agama</b></td>
                                                            <td><?= $agama ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Suku</b></td>
                                                            <td><?= $nama_etnis ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Bahasa</b></td>
                                                            <td><?= $nama_bahasa ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Pendidikan</b></td>
                                                            <td><?= $nama_tk_pddkn ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Alamat</b></td>
                                                            <td>
                                                                <?= $alamat ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Kelurahan</b></td>
                                                            <td>
                                                                <?= $nama_kelurahan ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Kecamatan</b></td>
                                                            <td>
                                                                <?= $nama_kecamatan ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Kab/ Kota</b></td>
                                                            <td>
                                                                <?= $nama_kab_kota ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Provinsi</b></td>
                                                            <td>
                                                                <?= $nama_provinsi ?>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><b>No Telp</b></td>
                                                            <td><?= $no_telpon ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Penanggung Jawab</b></td>
                                                            <td><?= $penanggung_jawab?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Umur Penanggung Jawab</b></td>
                                                            <td><?= $umur_pj ?></td>
                                                        </tr>

                                                        <tr>
                                                            <td><b>No Penanggung Jawab</b></td>
                                                            <td><?= $no_penanggung_jawab ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Hub Keluarga</b></td>
                                                            <td><?= $hub_keluarga ?></td>
                                                        </tr>

                                                        <tr>
                                                            <td><b>Pekerjaan PJ</b></td>
                                                            <td><?= $pekerjaan_pj ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Nama Dkter</b></td>
                                                            <td><?= $nama_dokter ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Ruang</b></td>
                                                            <td><?= $grNama ?></td>
                                                        </tr>
                                                    </tbody></table>
                                                </div>
                                                                                            <!-- /.tab-content -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                                <?php
                            }
                            ?>
                        
                        <div class="col-md-9">
                            <fieldset>
                                <legend>Biodata Pasien</legend>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">No MR [<em>Kode Auto Generate</em>]</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="kodebooking" id="kodebooking" value="<?php if(!empty($kodebooking)) echo $kodebooking ?>">
                                        <input type="hidden" name="idx" id="idx" value="<?php echo $idx ?>">
                                        <input readonly type="text" class="form-control input-sm" name="nomr" id="nomr" value="<?php echo $nomr ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">No KTP (NIK / Passport)</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-sm" name="no_ktp" id="no_ktp" value="<?php echo $no_ktp ?>" onkeydown="enter_noktp(event)">
                                            <input type="hidden" name="sekarang" id="sekarang" value="<?= date('Y-m-d') ?>">
                                            <input type="hidden" name="booking" id="booking" value="">
                                                <!-- <div class="input-group-btn">
                                                    <button type="button" id="pesertajkn" class="btn btn-primary" onclick="ceknikbpjs(1)">
                                                        <i class="fa fa-search"></i> Cari Peserta JKN
                                                    </button>
                                                </div> -->
                                                <span class="input-group-addon statusjkn" id="status">
                                                <a id="cekStatus" href="Javascript:ceknikbpjs(1)"><i class="fa fa-search" id="iconCekStatus"></i> Cek</a>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label col-sm-3" >No BPJS (<em>Jika Pasien Peserta BPJS Kesehatan</em>)</label>
                                    <div class="col-sm-9">
                                    <div class="input-group">
                                        <input name="no_bpjs" id="no_bpjs" type="text" class="form-control input-sm" value="<?php echo $no_bpjs ?>">
                                        <span class="input-group-addon statusjkn" id="status">
                                                <a id="cekStatus" href="Javascript:ceknomorbpjs(1)"><i class="fa fa-search" id="iconCekStatus"></i> Cek</a>
                                        </span>
                                        
                                    </div>
                                    </div>
                                    <!--input type="text" class="form-control input-sm" name="no_bpjs" id="no_bpjs" value="<?php echo $no_bpjs ?>" onkeydown="enter_bpjs(event)"-->
                                </div>
                                <div class="form-group bpjs">
                                    <label  class="control-label col-sm-3" >Jenis Peserta (<em>Jika Pasien Peserta BPJS Kesehatan</em>)</label>
                                    <div class="col-sm-9">
                                    <div class="input-group">
                                        <input name="id_jenis_peserta" id="id_jenis_peserta" type="hidden" class="form-control input-sm" value="<?php echo $id_jenis_peserta ?>">
                                        <input name="jenis_peserta" id="jenis_peserta" type="text" class="form-control input-sm" value="<?php echo $jenis_peserta ?>" readonly>

                                        
                                    </div>
                                    </div>
                                    <!--input type="text" class="form-control input-sm" name="no_bpjs" id="no_bpjs" value="<?php echo $no_bpjs ?>" onkeydown="enter_bpjs(event)"-->
                                </div>
                                <div class="form-group bpjs">
                                    <label class="control-label col-sm-3" >PPK (<em>Jika Pasien Peserta BPJS Kesehatan</em>)</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input name="kodeppk" id="kodeppk" type="hidden" class="form-control input-sm" value="<?php echo $kodeppk ?>">
                                            <input name="namappk" id="namappk" type="text" class="form-control input-sm" value="<?php echo $namappk ?>" readonly>

                                            
                                        </div>
                                    </div>
                                    <!--input type="text" class="form-control input-sm" name="no_bpjs" id="no_bpjs" value="<?php echo $no_bpjs ?>" onkeydown="enter_bpjs(event)"-->
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" >Nama Pasien <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" name="nama" id="nama" value="<?php echo $nama ?>" onkeydown="enter_nama(event)">
                                    <div class="text-error" id="err_nama"></div>    
                                </div>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label col-sm-3" >Tempat Lahir / DOB <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-sm" name="tempat_lahir" id="tempat_lahir" value="<?php echo $tempat_lahir ?>">
                                        <div class="input-group-btn" style="width: 30%">
                                            <input type="text" class="form-control input-sm" name="tgl_lahir" id="tgl_lahir" placeholder="__/__/____" value="<?php if(!empty($tgl_lahir)) echo setDateInd($tgl_lahir) ?>">
                                        </div>
                                    </div>
                                    <div class="text-error" id="err_ttl"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" >Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="jns_kelamin"  class="form-control input-sm" id="jns_kelamin">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <!-- <option value="4" <?=  ($jns_kelamin == "4") ? "checked='checked'" : "" ?>>Tidak Mengisi</option>
                                            <option value="0" <?=  ($jns_kelamin == "0") ? "checked='checked'" : "" ?>>Tidak Diketahui</option> -->
                                            <option value="1" <?= ($jns_kelamin == "L" || $jns_kelamin == "1") ? "checked='checked'" : ""; ?>>Laki-Laki</option>
                                            <option value="2" <?= ($jns_kelamin == "P" || $jns_kelamin == "2") ? "checked='checked'" : "" ?>>Perempuan</option>
                                            <!-- <option value="3" <?=  ($jns_kelamin == "3") ? "checked='checked'" : "" ?>>Tidak Dapat Ditentukan</option> -->
                                        </select>
                                        <div class="text-error" id="err_jekel"></div>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" >Agama</label>
                                    <div class="col-sm-9">
                                    <select name="agama" id="agama" class="form-control input-sm">
                                        <?php foreach ($getAgama->result_array() as $xAG) : ?>
                                            <option  value="<?php echo $xAG['idx'] ?>" <?= (!empty($id_agama) ? ($id_agama == $xAG['idx'] ? "selected" : ''):'') ?>><?php echo $xAG['agama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Pendidikan</label>
                                    <div class="col-sm-9">
                                    <select name="form-control input-sm" id="pendidikan" class="form-control input-sm">
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
                                    <label class="control-label col-sm-3">Pekerjaan</label>
                                    <div class="<?php if($id_pekerjaan==5) echo 'col-md-4'; else echo "col-md-8"; ?>"  id="divpekerjaan">
                                        
                                        <select name="pekerjaan" id="pekerjaan" class="form-control input-sm" >
                                            <?php 
                                            foreach ($getPekerjaan->result() as $p ) {
                                                ?>
                                                <option value="<?= $p->pekerjaan_id?>" <?= (!empty($id_pekerjaan) ? ($id_pekerjaan == $p->pekerjaan_id ? "selected" : ''):'') ?>><?= $p->pekerjaan_nama ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    <!-- <input type="text" class="form-control input-sm" name="pekerjaan" id="pekerjaan" value="<?php echo $pekerjaan ?>"> -->
                                    </div>
                                    <div id="divlainnya" class="col-md-4" style="<?php if($id_pekerjaan==5) echo 'display: block;'; else echo "display: none;"; ?>">
                                        <input type="text" class="form-control input-sm" name="pekerjaanlain" id="pekerjaanlain" value="<?php echo (!empty($pekerjaan) ? $pekerjaan : '') ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Status</label>
                                    <div class="col-sm-9">
                                    <select name="status_kawin" id="status_kawin" class="form-control input-sm" >
                                        <option value="">Pilih</option>
                                        <?php foreach ($getStatus->result_array() as $xSk) : ?>
                                            <option <?= (!empty($id_status_kawin) ? ($id_status_kawin == $xSk['Id'] ? "selected" : ''):'') ?> value="<?php echo $xSk['Id'] ?>"><?php echo $xSk['status'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Etnis</label>
                                    <div class="col-sm-9">
                                    <select name="suku" id="suku" class="form-control input-sm" >
                                        <option value="">Pilih</option>
                                        <?php foreach ($getSuku->result_array() as $xSk) : ?>
                                            <option <?= (!empty($id_etnis) ? ($id_etnis == $xSk['idx'] ? "selected" : ''):'') ?>  value="<?php echo $xSk['idx'] ?>"><?php echo $xSk['nama_suku'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Bahasa</label>
                                    <div class="col-sm-9">
                                    <div class="input-group">
                                    <!-- <?= $id_bahasa ?> -->
                                    <select name="bahasa" id="bahasa" class="form-control input-sm" style="width:100%;">
                                        <?php foreach ($getBahasa->result_array() as $xBH) : ?> 
                                            <option <?php echo (!empty($id_bahasa) ? ($id_bahasa == $xBH['idx'] ? "selected='selected'" : ""):"") ?> value="<?php echo $xBH['idx'] ?>"><?php echo $xBH['bahasa'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="input-group-addon"><input type="checkbox" name="keterbatasanbahasa" id="keterbatasanbahasa">Keterbatasan Bahasa</span>
                                    </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-sm-3">No telp Rumah </label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" name="no_telpon" id="no_telpon" value="<?php echo (!empty($no_telpon) ? $no_telpon :"")?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">No HP <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" name="no_hp" id="no_hp" value="<?php echo (!empty($idx) ? $no_hp:"") ?>" >
                                    <div class="text-error" id="err_no_hp"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Nama Ibu Kandung <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" name="nama_ibu_kandung" id="nama_ibu_kandung" value="<?php echo (!empty($idx) ? $nama_ibu_kandung:"") ?>" >
                                    <div class="text-error" id="err_nama_ibu_kandung"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Kewarganegaraan <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                    <select name="kewarganegaraan" id="kewarganegaraan" class="form-control input-sm" onchange="pilihKWN()">
                                        <option <?php echo ($kewarganegaraan == "") ? "selected='selected'" : "" ?> value="">-- Pilih --</option>
                                        <option <?php echo ($kewarganegaraan == "WNI") ? "selected='selected'" : "" ?> value="WNI">WNI</option>
                                        <option <?php echo ($kewarganegaraan == "WNA") ? "selected='selected'" : "" ?> value="WNA">WNA</option>
                                    </select>
                                    <div class="text-error" id="err_kewarganegaraan"></div>
                                    </div>
                                </div>
                                <legend class="groupWNI groupKewarganegaraan">Alamat Sesuai KTP</legend>
                                <div class="form-group groupWNA groupKewarganegaraan">
                                    <label class="control-label col-sm-3">Negara <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="nama_negara" id="nama_negara" class="form-control input-sm" style="width: 100%">
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
                                    <label class="control-label col-sm-3">Provinsi <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                    <div class="input-group">
                                        
                                        <select name="nama_provinsi" id="nama_provinsi" class="form-control input-sm" style="width: 100%">
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
                                    <label class="control-label col-sm-3">Kabupaten / Kota <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="nama_kab_kota" id="nama_kab_kota" class="form-control input-sm" style="width: 100%">
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
                                    <label class="control-label col-sm-3">Kecamatan / Nagari <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                    <div class="input-group">
                                        
                                        <select name="nama_kecamatan" id="nama_kecamatan" class="form-control input-sm" style="width: 100%">
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
                                    <label class="control-label col-sm-3">Kelurahan / Jorong <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="nama_kelurahan" id="nama_kelurahan" class="form-control input-sm" style="width: 100%">
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
                                    <label class="control-label col-sm-3">Alamat <span style="color: red"> * </span></label>
                                    <div class="col-sm-3">
                                        <input type="text" name="alamat" id="alamat" class="form-control input-sm" placeholder="Jalan dan nomor rumah" value="<?= (!empty($alamat) ? $alamat: "")?>">
                                        <div class="text-error" id="err_alamat"></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control input-sm" name="rt" id="rt" placeholder="RT" value="<?= (!empty($rt) ? $rt: "")?>">
                                        <div class="text-error" id="err_rt"></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control input-sm" name="rw" id="rw" placeholder="RW" value="<?= (!empty($rw) ? $rw: "")?>">
                                        <div class="text-error" id="err_rw"></div>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control input-sm" id="kodepos" placeholder="Kode Pos" value="<?= (!empty($idx) ? $kodepos: "")?>">
                                        <div class="text-error" id="err_kodepos"></div>
                                    </div>
                                    
                                </div>

                                <div class="form-group groupWNI groupKewarganegaraan">
                                    <label class="control-label col-sm-3">&nbsp;</label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" name="domisilisesuaiktp" id="domisilisesuaiktp" value="1" onclick="cekDomisili()"> Domisili Sesuai KTP
                                    </div>
                                </div>
                                <legend class="domisili">Alamat Domisili</legend>
                                <div class="form-group domisili">
                                    <label class="control-label col-sm-3">Provinsi <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                    <div class="input-group">
                                        
                                        <select name="nama_provinsi_domisili" id="nama_provinsi_domisili" class="form-control input-sm" style="width: 100%">
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
                                    <label class="control-label col-sm-3">Kabupaten / Kota <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                    <div class="input-group">
                                        
                                        <select name="nama_kab_kota_domisili" id="nama_kab_kota_domisili" class="form-control input-sm" style="width: 100%">
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
                                    <label class="control-label col-sm-3">Kecamatan / Nagari <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                    <div class="input-group">
                                        
                                        <select name="nama_kecamatan_domisili" id="nama_kecamatan_domisili" class="form-control input-sm" style="width: 100%">
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
                                    <label class="control-label col-sm-3">Kelurahan / Jorong <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="nama_kelurahan_domisili" id="nama_kelurahan_domisili" class="form-control input-sm" style="width: 100%">
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
                                    <label class="control-label col-sm-3">Alamat Tempat Tinggal <span style="color: red"> * </span></label>
                                    <div class="col-sm-3">
                                        <input type="text" name="alamat_domisili" id="alamat_domisili" class="form-control input-sm" placeholder="Jalan dan nomor rumah" value="<?= (!empty($idx) ? $alamat_domisili: "")?>">
                                        <div class="text-error" id="err_alamat_domisili"></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control input-sm" id="rt_domisili" name="rt_domisili" placeholder="RT" value="<?= (!empty($idx) ? $rt_domisili: "")?>">
                                        <div class="text-error" id="err_rt_domisili"></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control input-sm" id="rw_domisili" name="rw_domisili" placeholder="RW" value="<?= (!empty($idx) ? $rw_domisili: "")?>">
                                        <div class="text-error" id="err_rw_domisili"></div>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control input-sm" id="kodepos_domisili" placeholder="Kode Pos" value="<?= (!empty($idx) ? $kodepos_domisili: "")?>">
                                        <div class="text-error" id="err_kodepos_domisili"></div>
                                    </div>
                                </div>

                                <legend>Penanggung Jawab</legend>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Penanggung Jawab <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" name="penanggung_jawab" id="penanggung_jawab" value="<?php echo $penanggung_jawab ?>">
                                        <div class="text-error" id="err_penanggung_jawab"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Umur <span style="color: red"> * </span></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control input-sm" name="umur_pj" id="umur_pj" value="<?= (!empty($umur_pj) ? $umur_pj: "")?>">
                                        <div class="text-error" id="err_umur_pj"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Pekerjaan Penanggung Jawab <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" name="pekerjaan_pj" id="pekerjaan_pj" value="<?= (!empty($pekerjaan_pj) ? $pekerjaan_pj: "")?>">
                                        <div class="text-error" id="err_pekerjaan_pj"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Alamat Penanggung Jawab <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" name="alamat_pj" id="alamat_pj" value="<?= (!empty($alamat_pj) ? $alamat_pj: "")?>">
                                        <div class="text-error" id="err_alamat_pj"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-sm-3">No HP / Telp Penanggung Jawab <span style="color: red"> * </span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" name="no_penanggung_jawab" id="no_penanggung_jawab" value="<?php echo $no_penanggung_jawab ?>">
                                        <div class="text-error" id="err_no_penanggung_jawab"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Hub Keluarga <span style="color: red"> * </span></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control input-sm" name="hub_keluarga" id="hub_keluarga" value="<?php echo $hub_keluarga ?>">
                                        <div class="text-error" id="err_hub_keluarga"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">&nbsp;</label>
                                    <div class="col-sm-9">
                                    <div class="input-group">
                                        <button type="button" class="btn btn-primary" id="kembali">
                                            <i class="glyphicon glyphicon-new-window"></i> Kembali</button>
                                        <button type="button" id="btnSimpan" class="btn btn-danger" id="submit" onclick="simpan()">
                                            <i class="glyphicon glyphicon-floppy-disk" id="iconSimpan"></i> Simpan</button>
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
    
</section>
<div class="modal fade" id="priview_pasien" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog" style="overflow-y: initial !important;  max-height:85%">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title" id="headSep">Profile Pasien</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <tr>
                                <td>Nomr</td>
                                <td  id="pr_nomr"></td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td  id="pr_no_ktp"></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td  id="pr_nama"></td>
                            </tr>
                            <tr>
                                <td>TTL</td>
                                <td  id="pr_ttl"></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td  id="pr_jns_kelamin"></td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td  id="pr_agama"></td>
                            </tr>
                            <tr>
                                <td>Pendidikan</td>
                                <td  id="pr_pendidikan"></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td  id="pr_pekerjaan"></td>
                            </tr>
                            <tr>
                                <td>Status Kawin</td>
                                <td  id="pr_status_kawin"></td>
                            </tr>
                            <tr>
                                <td>Etnis</td>
                                <td  id="pr_suku"></td>
                            </tr>
                            <tr>
                                <td>Bahasa</td>
                                <td  id="pr_bahasa"></td>
                            </tr>
                            <tr>
                                <td>Alamat Sesuai KTP</td>
                                <td  id="pr_alamatktp"></td>
                            </tr>
                            <tr>
                                <td>Alamat Domisili</td>
                                <td  id="pr_alamatdomisili"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button class="btn btn-danger" type="button" onclick="simpan(1)">Skip</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script type="text/javascript">
    var idx = '<?php echo $idx ?>';
    var xKewarganegaraan = '<?php echo $kewarganegaraan ?>';
    var xnama_negara = '<?php echo $nama_negara ?>';
    var xnama_provinsi = '<?php echo $nama_provinsi ?>';
    var xnama_kab_kota = '<?php echo $nama_kab_kota ?>';
    var xnama_kecamatan = '<?php echo $nama_kecamatan ?>';
    var xnama_kelurahan = '<?php echo $nama_kelurahan ?>';
    // alert(xKewarganegaraan);
    function simpan(skip=0) {
        if(skip==1) $('#priview_pasien').modal('hide');
        var kewarganegaraan=$('#kewarganegaraan').val();
        var id_provinsi=$('#nama_provinsi').val()
        var provinsi=$('#nama_provinsi :selected').html()
        var id_kab_kota=$('#nama_kab_kota').val()
        var nama_kab_kota=$('#nama_kab_kota :selected').html()
        var id_kecamatan=$('#nama_kecamatan').val()
        var nama_kecamatan=$('#nama_kecamatan :selected').html()
        var id_kelurahan=$('#nama_kelurahan').val()
        var nama_kelurahan=$('#nama_kelurahan :selected').html()
        var alamat=$('#alamat').val()
        var rt=$('#rt').val()
        var rw=$('#rw').val()
        var kodepos=$('#kodepos').val()
        var domisilisesuaiktp=$('#domisilisesuaiktp').prop("checked");
        if(domisilisesuaiktp==true) domisilisesuaiktp=1; else domisilisesuaiktp=0;
        var id_provinsi_d=$('#nama_provinsi_domisili').val()
        var provinsi_d=$('#nama_provinsi_domisili :selected').html()
        var id_kab_kota_d=$('#nama_kab_kota_domisili').val()
        var nama_kab_kota_d=$('#nama_kab_kota_domisili :selected').html()
        var id_kecamatan_d=$('#nama_kecamatan_domisili').val()
        var nama_kecamatan_d=$('#nama_kecamatan_domisili :selected').html()
        var id_kelurahan_d=$('#nama_kelurahan_domisili').val()
        var nama_kelurahan_d=$('#nama_kelurahan_domisili :selected').html()
        var alamat_d=$('#alamat_domisili').val()
        var rt_d=$('#rt_domisili').val()
        var rw_d=$('#rw_domisili').val()
        var kodepos_d=$('#kodepos_domisili').val()
        var id_negara=360
        var nama_negara='Indonesia';
        if(kewarganegaraan=="WNA"){
            id_negara=$('#nama_negara').val();
            nama_negara=$('#nama_negara :selected').html();
        }else{
            if(domisilisesuaiktp==1){
                id_provinsi_d=id_provinsi
                provinsi_d=provinsi
                id_kab_kota_d=id_kab_kota
                nama_kab_kota_d=nama_kab_kota
                id_kecamatan_d=id_kecamatan
                nama_kecamatan_d=nama_kecamatan
                id_kelurahan_d=id_kelurahan
                nama_kelurahan_d=nama_kelurahan
                alamat_d=alamat
                rt_d=rt
                rw_d=rw
                kodepos_d=kodepos
            }
        }
        var id_pekerjaan=$('#pekerjaan').val();
        if(id_pekerjaan==5) var nama_pekerjaan=$('#pekerjaanlain').val();
        else var nama_pekerjaan=$('#pekerjaan :selected').html();
        var jns_kelamin=$("#jns_kelamin").val();
        var hambatan_bahasa=$('#keterbatasanbahasa').prop('checked');
        if(hambatan_bahasa==true) hambatan_bahasa=1; else hambatan_bahasa=0;
        var formdata = {
            idx: $('#idx').val(),
            nomr: $('#nomr').val(),
            booking: $('#booking').val(),
            kodebooking: $('#kodebooking').val(),
            no_ktp: $('#no_ktp').val(),
            no_bpjs: $('#no_bpjs').val(),
            id_jenis_peserta: $('#id_jenis_peserta').val(),
            jenis_peserta: $('#jenis_peserta').val(),
            kodeppk: $('#kodeppk').val(),
            namappk: $('#namappk').val(),
            nama: $('#nama').val(),
            tempat_lahir: $('#tempat_lahir').val(),
            tgl_lahir: $('#tgl_lahir').val(),
            jns_kelamin: jns_kelamin,
            id_tk_pddkn: $('#pendidikan').val(),
            pendidikan: $('#pendidikan :selected').html(),
            id_pekerjaan: $('#pekerjaan').val(),
            pekerjaan: nama_pekerjaan,
            id_agama: $('#agama').val(),
            agama: $('#agama :selected').html(),
            id_status_kawin: $('#status_kawin').val(),
            status_kawin: $('#status_kawin :selected').html(),
            id_etnis: $('#suku').val(),
            suku: $('#suku :selected').html(),
            id_bahasa: $('#bahasa').val(),
            bahasa: $('#bahasa :selected').html(),
            hambatan_bahasa: hambatan_bahasa,
            no_telpon: $('#no_telpon').val(),
            no_hp: $('#no_hp').val(),
            nama_ibu_kandung: $('#nama_ibu_kandung').val(),
            kewarganegaraan: kewarganegaraan,
            id_provinsi: id_provinsi,
            nama_provinsi: provinsi,
            id_negara: id_negara,
            nama_negara: nama_negara,
            id_kab_kota: id_kab_kota,
            nama_kab_kota: nama_kab_kota,
            id_kecamatan: id_kecamatan,
            nama_kecamatan: nama_kecamatan,
            id_kelurahan: id_kelurahan,
            nama_kelurahan: nama_kelurahan,
            alamat:alamat,
            rt:rt,
            rw:rw,
            kodepos:kodepos,
            id_provinsi_domisili: id_provinsi_d,
            nama_provinsi_domisili: provinsi_d,
            id_kab_kota_domisili: id_kab_kota_d,
            nama_kab_kota_domisili: nama_kab_kota_d,
            id_kecamatan_domisili: id_kecamatan_d,
            nama_kecamatan_domisili: nama_kecamatan_d,
            id_kelurahan_domisili: id_kelurahan_d,
            nama_kelurahan_domisili: nama_kelurahan_d,
            alamat_domisili:alamat_d,
            rt_domisili:rt_d,
            rw_domisili:rw_d,
            kodepos_domisili:kodepos_d,
            penanggung_jawab:$('#penanggung_jawab').val(),
            umur_pj:$('#umur_pj').val(),
            pekerjaan_pj:$('#pekerjaan_pj').val(),
            alamat_pj:$('#alamat_pj').val(),
            no_penanggung_jawab:$('#no_penanggung_jawab').val(),
            hub_keluarga:$('#hub_keluarga').val(),
            skip:skip
        }
        console.clear();
        console.log(formdata);
        
        var x = confirm("Apakah anda yakin akan menyimpan data pasien ini?");
        if (x) {
                $.ajax({
                    url: "<?php echo base_url() . 'mr_registrasi.php/pasien_baru/simpan' ?>",
                    type: "POST",
                    data: formdata,
                    dataType: "JSON",
                    beforeSend: function () {
                        // alert('Test')
                        // console.clear();
                        console.log("Disabled Cari Rujukan")
                        $('#btnSimpan').prop("disabled", true);
                        $('#iconSimpan').removeClass('glyphicon glyphicon-floppy-disk')
                        $('#iconSimpan').addClass('fa fa-spinner fa-spin')
                    },
                    success: function(data) {
                        tampilkanPesan('Peringatan',data.message,'info');
                        if (data.code == 200) {
                            var jns_layanan = "<?= $jns_layanan ?>";
                            if (jns_layanan == 'rj') var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/daftar_rawat_jalan/' ?>' + data.nomr;
                            else if (jns_layanan == 'gd') var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/daftar_igd/' ?>' + data.nomr;
                            else var url = '<?php echo base_url() . 'mr_registrasi.php/pasien_baru/lihatDetail/' ?>' + data.nomr;
                            window.location.href = url;
                        } else if (data.code == 202) {
                            var url = '<?php echo base_url() . 'mr_registrasi.php/pasien_baru/lihatDetail/' ?>';
                            window.location.href = url;
                        } else if (data.code == 201) {
                            var url = '<?php echo base_url() . 'mr_registrasi.php/pasien_baru/lihatDetail/' ?>' + data.nomr;
                            window.location.href = url;
                        } else if(data.code==203){
                            $('#err_nama').html(data.error.nama);
                            if(data.error.tempat_lahir=="") $('#err_ttl').html(data.error.tgl_lahir);
                            else $('#err_ttl').html(data.error.tempat_lahir);
                            
                            $('#err_no_hp').html(data.error.no_hp);
                            $('#err_nama_ibu_kandung').html(data.error.nama_ibu_kandung);
                            $('#err_kewarganegaraan').html(data.error.kewarganegaraan);
                            $('#err_nama_negara').html(data.error.nama_negara);
                            $('#err_nama_provinsi').html(data.error.nama_provinsi);
                            $('#err_nama_kab_kota').html(data.error.nama_kab_kota);
                            $('#err_nama_kecamatan').html(data.error.nama_kecamatan);
                            $('#err_nama_kelurahan').html(data.error.nama_kelurahan);
                            $('#err_alamat').html(data.error.alamat);
                            $('#err_rt').html(data.error.rt);
                            $('#err_rw').html(data.error.rw);
                            $('#err_kodepos').html(data.error.kodepos);

                            $('#err_nama_provinsi_domisili').html(data.error.nama_provinsi_domisili);
                            $('#err_nama_kab_kota_domisili').html(data.error.nama_kab_kota_domisili);
                            $('#err_nama_kecamatan_domisili').html(data.error.nama_kecamatan_domisili);
                            $('#err_nama_kelurahan_domisili').html(data.error.nama_kelurahan_domisili);
                            $('#err_alamat_domisili').html(data.error.alamat_domisili);
                            $('#err_rt_domisili').html(data.error.rt_domisili);
                            $('#err_rw_domisili').html(data.error.rw_domisili);
                            $('#err_kodepos_domisili').html(data.error.kodepos_domisili);
                            $('#err_penanggung_jawab').html(data.error.penanggung_jawab);
                            $('#err_umur_pj').html(data.error.umur_pj);
                            $('#err_pekerjaan_pj').html(data.error.pekerjaan_pj);
                            $('#err_alamat_pj').html(data.error.alamat_pj);
                            $('#err_no_penanggung_jawab').html(data.error.no_penanggung_jawab);
                            $('#err_hub_keluarga').html(data.error.hub_keluarga);
                            $('#err_jekel').html(data.error.jns_kelamin);

                        } else if(data.code==204){
                            $('#priview_pasien').modal('show');
                            var daftar=`<a href='<?= base_url()?>mr_registrasi.php/registrasi/daftar_rawat_jalan/`+data.response.nomr+`' class='btn btn-default btn-xs' >`+data.response.nomr+`</a> *<i>Klik Nomr Untuk Mendaftarkan Pasien Sebagai pasien lama</i>`;
                            $('#pr_nomr').html(daftar);
                            $('#pr_no_ktp').html(data.response.no_ktp);
                            $('#pr_nama').html(data.response.nama);
                            $('#pr_ttl').html(data.response.tempat_lahir +" / "+data.response.tgl_lahir);
                            var jns_kelamin=(data.response.jns_kelamin=1 ? "laki-Laki":(data.response.jns_kelamin==2 ? "Perempuan":"-"))
                            $('#pr_jns_kelamin').html(jns_kelamin);
                            $('#pr_agama').html(data.response.agama);
                            $('#pr_pendidikan').html(data.response.pendidikan);
                            $('#pr_pekerjaan').html(data.response.pekerjaan);
                            $('#pr_status_kawin').html(data.response.status_kawin);
                            $('#pr_suku').html(data.response.suku);
                            $('#pr_bahasa').html(data.response.bahasa);
                            var alamat=data.response.alamat+
                            " RT "+data.response.rt+
                            " RW "+data.response.rw+
                            " Kel. "+data.response.nama_kelurahan+
                            " Kec. "+data.response.nama_kecamatan+
                            " Kab/Kota. "+data.response.nama_kab_kota+
                            " Prov. "+data.response.nama_provinsi+
                            " Kode Pos. "+data.response.kodepos;
                            var alamat_domisili=data.response.alamat_domisili+
                            " RT "+data.response.rt_domisili+
                            " RW "+data.response.rw_domisili+
                            " Kel. "+data.response.nama_kelurahan_domisili+
                            " Kec. "+data.response.nama_kecamatan_domisili+
                            " Kab/Kota. "+data.response.nama_kab_kota_domisili+
                            " Prov. "+data.response.nama_provinsi_domisili+
                            " Kode Pos. "+data.response.kodepos_domisili+
                            $('#pr_alamatktp').html(alamat);
                            $('#pr_alamatdomisili').html(alamat_domisili);
                        }
                    },
                    error: function (xhr) { // if error occured
                        $('#error').modal('show');
                        $('#popuperror').html("Error Saat Penyimpanan Pasien")
                        $('#xhr').html(xhr.responseText)
                        $('#btnSimpan').prop("disabled", false);
                        $('#iconSimpan').removeClass('fa fa-spinner fa-spin')
                        $('#iconSimpan').addClass('glyphicon glyphicon-floppy-disk')
                    },
                    complete: function () {
                        $('#btnSimpan').prop("disabled", false);
                        $('#iconSimpan').removeClass('fa fa-spinner fa-spin')
                        $('#iconSimpan').addClass('glyphicon glyphicon-floppy-disk')
                    },
                });
        }
    }

    function refreshNeg() {
        $.ajax({
            url: "<?php echo base_url() . 'mr_registrasi.php/pasien_baru/getNegara' ?>",
            dataType: "JSON",
            success: function(data) {
                var x = Object.keys(data);
                var xOption = "";
                xOption += '<option value="">------------ Pilih option ------------</option>\n';
                if (x.length > 0) {
                    for (i = 0; i < x.length; i++) {
                        xOption += '<option value="' + data[i]['idx'] + '">' + data[i]['nama_negara'] + '</option>\n';
                    }
                }
                $('#nama_negara').html(xOption);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert('Response : ' + thrownError);
            }
        });
    }

    function refreshProv() {
        $('#nama_provinsi').val('').trigger('change');
        $.ajax({
            url: "<?php echo base_url() . 'mr_registrasi.php/pasien_baru/getProv' ?>",
            dataType: "JSON",
            success: function(data) {
                var x = Object.keys(data);
                var xOption = "";
                xOption += '<option value="">------------ Pilih option ------------</option>\n';
                if (x.length > 0) {
                    for (i = 0; i < x.length; i++) {
                        xOption += '<option value="' + data[i]['idx'] + '">' + data[i]['nama_provinsi'] + '</option>\n';
                    }
                }
                $('#nama_provinsi').html(xOption);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert('Response : ' + thrownError);
            }
        });
    }

    function refreshKab() {
        $('#nama_kab_kota').val('').trigger('change');
        var a = $('#nama_provinsi').val();
        $.ajax({
            url: "<?php echo base_url() . 'mr_registrasi.php/pasien_baru/getKab' ?>",
            type: "POST",
            data: {
                nama_provinsi: a
            },
            dataType: "JSON",
            success: function(data) {
                var x = Object.keys(data);
                var xOption = "";
                xOption += '<option value="">------------ Pilih option ------------</option>\n';
                if (x.length > 0) {
                    for (i = 0; i < x.length; i++) {
                        xOption += '<option value="' + data[i]['idx'] + '">' + data[i]['nama_kab_kota'] + '</option>\n';
                    }
                }
                $('#nama_kab_kota').html(xOption);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert('Response : ' + thrownError);
            }
        });
    }

    function refreshKec() {
        $('#nama_kecamatan').val('').trigger('change');
        var a = $('#nama_kab_kota').val();
        $.ajax({
            url: "<?php echo base_url() . 'mr_registrasi.php/pasien_baru/getKec' ?>",
            type: "POST",
            data: {
                nama_kab_kota: a
            },
            dataType: "JSON",
            success: function(data) {
                var x = Object.keys(data);
                var xOption = "";
                xOption += '<option value="">------------ Pilih option ------------</option>\n';
                if (x.length > 0) {
                    for (i = 0; i < x.length; i++) {
                        xOption += '<option value="' + data[i]['idx'] + '">' + data[i]['nama_kecamatan'] + '</option>\n';
                    }
                }
                $('#nama_kecamatan').html(xOption);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert('Response : ' + thrownError);
            }
        });
    }

    function refreshKel() {
        $('#nama_kelurahan').val('').trigger('change');
        var a = $('#nama_kecamatan').val();
        $.ajax({
            url: "<?php echo base_url() . 'mr_registrasi.php/pasien_baru/getKel' ?>",
            type: "POST",
            data: {
                nama_kecamatan: a
            },
            dataType: "JSON",
            success: function(data) {
                var x = Object.keys(data);
                var xOption = "";
                xOption += '<option value="">------------ Pilih option ------------</option>\n';
                if (x.length > 0) {
                    for (i = 0; i < x.length; i++) {
                        xOption += '<option value="' + data[i]['idx'] + '">' + data[i]['nama_kelurahan'] + '</option>\n';
                    }
                }
                $('#nama_kelurahan').html(xOption);
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert('Response : ' + thrownError);
            }
        });
    }

    function addNeg() {
        $('#nama_negara').val('');
        $('#modalNegara').modal('show');
    }

    function simpanNegara() {
        var a = $('#nama_negara').val().trim();
        if (a == '') {
            alert('Nama negara tidak boleh kosong');
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'mr_registrasi.php/negara/simpan' ?>",
                type: "POST",
                data: {
                    idx: '',
                    nama_negara: a
                },
                dataType: "JSON",
                success: function(data) {
                    if (data.code == 200) {
                        refreshNeg();
                        $('#modalNegara').modal('hide');
                    } else {
                        alert(data.message);
                    }
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert('Response : ' + thrownError);
                }
            });
        }
    }

    function addProv() {
        $('#nama_provinsi').val('');
        $('#modalProvinsi').modal('show');
    }

    function simpanProvinsi() {
        var a = $('#nama_provinsi').val().trim();
        if (a == '') {
            alert('Nama provinsi tidak boleh kosong');
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'mr_registrasi.php/provinsi/simpan' ?>",
                type: "POST",
                data: {
                    idx: '',
                    nama_provinsi: a
                },
                dataType: "JSON",
                success: function(data) {
                    if (data.code == 200) {
                        refreshProv();

                        $('#modalProvinsi').modal('hide');
                    } else {
                        alert(data.message);
                    }
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert('Response : ' + thrownError);
                }
            });
        }
    }

    function addKab() {
        $('#nama_kab_kota').val('');
        $('#modalKabKota').modal('show');
    }

    function simpanKabKota() {
        var a = $('#nama_provinsi').val();
        var b = $('#nama_kab_kota').val().trim();
        if (a == '') {
            alert('Provinsi belum dipilih');
        } else if (b == '') {
            alert('Nama kabupaten / kota tidak boleh kosong');
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'mr_registrasi.php/kab_kota/simpan' ?>",
                type: "POST",
                data: {
                    idx: '',
                    nama_kab_kota: b,
                    nama_provinsi: a
                },
                dataType: "JSON",
                success: function(data) {
                    if (data.code == 200) {
                        refreshKab();
                        $('#modalKabKota').modal('hide');
                    } else {
                        alert(data.message);
                    }
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert('Response : ' + thrownError);
                }
            });
        }
    }

    function addKec() {
        $('#nama_kecamatan').val('');
        $('#modalKec').modal('show');
    }

    function simpanKec() {
        var a = $('#nama_provinsi').val();
        var b = $('#nama_kab_kota').val();
        var c = $('#nama_kecamatan').val().trim();
        if (a == '') {
            alert('Provinsi belum dipilih');
        } else if (b == '') {
            alert('Kabupaten / Kota belum dipilih');
        } else if (c == '') {
            alert('Nama kecamatan tidak boleh kosong');
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'mr_registrasi.php/kecamatan/simpan' ?>",
                type: "POST",
                data: {
                    idx: '',
                    nama_kecamatan: c,
                    nama_provinsi: a,
                    nama_kab_kota: b
                },
                dataType: "JSON",
                success: function(data) {
                    if (data.code == 200) {
                        refreshKec();
                        $('#modalKec').modal('hide');
                    } else {
                        alert(data.message);
                    }
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert('Response : ' + thrownError);
                }
            });
        }
    }

    function addKel() {
        $('#nama_kelurahan').val('');
        $('#modalKel').modal('show');
    }

    function simpanKel() {
        var a = $('#nama_provinsi').val();
        var b = $('#nama_kab_kota').val();
        var c = $('#nama_kecamatan').val();
        var d = $('#nama_kelurahan').val().trim();
        if (a == '') {
            alert('Provinsi belum dipilih');
        } else if (b == '') {
            alert('Kabupaten / Kota belum dipilih');
        } else if (c == '') {
            alert('Kecamatan belum dipilih');
        } else if (d == '') {
            alert('Nama kelurahan tidak boleh kosong');
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'mr_registrasi.php/kelurahan/simpan' ?>",
                type: "POST",
                data: {
                    idx: '',
                    nama_kelurahan: d,
                    nama_provinsi: a,
                    nama_kab_kota: b,
                    nama_kecamatan: c
                },
                dataType: "JSON",
                success: function(data) {
                    if (data.code == 200) {
                        refreshKel();
                        $('#modalKel').modal('hide');
                    } else {
                        alert(data.message);
                    }
                },
                error: function(xhr, ajaxOption, thrownError) {
                    alert('Response : ' + thrownError);
                }
            });
        }
    }

    function reg_rajal() {
        var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/rawat_jalan/' ?>';
        window.location.href = url;
    }
    var base_url = "<?php echo base_url() . "mr_registrasi.php"; ?>";
    var url_call_back = "<?php echo base_url() . "api.php/"; ?>";
    //alert(url);
</script>
<script src="<?php echo base_url() ?>js/pendaftaran.js"></script>