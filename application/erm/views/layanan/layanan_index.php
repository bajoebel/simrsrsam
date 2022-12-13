<style>
    .jkn{
        display:none;
    }
    .adarujukan{
        display:none;
    }
    .kontrolulang{
        display:none;
    }
    .faskesperujuk{
        display:none;
    }
    .jp{
        display:none;
    }
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
        overflow: scroll;
    }

    a.disabled {
        pointer-events: none;
        cursor: default;
    }
    .kotak{
        padding:10px;
        width:100%;
        border:1px #ccc solid;
        border-collapse:collapse;
        
    }
    .text-center{
        text-align:center;
    }
    .font60{
        font-size : 120pt;
    }
    .font10{
        font-size:10pt;
    }
    .font11{
        font-size:11pt;
    }
    .font12{
        font-size:12pt;
    }
    .font13{
        font-size:13pt;
    }

    .font14{
        font-size:14pt;
    }
    .font20{
        font-size:20pt;
    }
    .top10{
        margin-top:10px;
    }
    .top20{
        margin-top:20px;
    }
    .panel{
        border-radius:0px;
    }
    .panel-success{
        border-color:#1ABC9C;
    }
    .panel-success .panel-heading {
        background-color: #1ABC9C;
        color: #fff;
    }

body {
  background: #F1F3FA;
}

/* Profile container */
.profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 0px 0;
  background: #fff;
  border:1px solid #367fa9;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 35%;
  height: 35%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}
    
.profile-usermenu {
  margin-top: 0px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  /* padding: 20px; */
  background: #fff;
  min-height: 460px;
  /* border:1px solid #5b9bd1; */
}
.batas {
  margin-left: -5px;
  margin-right: -10px;
  height: 30px;
  width: 103%;
  background: #367fa9;
}
.text-error{
    color: #dd4b39  ;
}


</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?> <?php echo getPoliByID($ruangID) ?></h1>
</section>
<?php if (!empty($ruang)) {
    if ($ruang->grid == 1) $jns_layanan = 'RJ';
    elseif ($ruang->grid == 2) $jns_layanan = 'RI';
    elseif ($ruang->grid == 3) $jns_layanan = 'PJ';
    else $jns_layanan = 'GD';
?>
    <input type="hidden" name="jns_layanan" id="jns_layanan" value="<?= $jns_layanan ?>">
    <section class="content container-fluid">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Informasi</h4>
            Silahkan cari pasien yang melakukan tindakan / layanan di <?php echo getPoliByID($ruangID) ?>.
            Pasien yang tampil secara default adalah pasien yang terdaftar pada hari ini.
            <br />
            Untuk mencari pasien yang terdaftar pada hari lainnya,
            silahkan masukan No Registrasi RS / No Registrasi Unit <?php echo getPoliByID($ruangID) ?> / No MR Pasien
            <br />
            kemudian tekan enter atau klik tombol Cari Pasien
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="ruang_id" id="ruang_id" value="<?= $this->session->userdata('kdlokasi'); ?>">
                <input type="hidden" name="nama_ruang" id="nama_ruang" value="<?= getRuangByID($this->session->userdata('kdlokasi')); ?>">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <?php 
                        if($ruang->grid==1){
                            ?>
                            <li class="active"><a href="#tab_3" data-toggle="tab">Antrean Pasien</a></li>
                            <li><a href="#tab_1" data-toggle="tab">Data Kunjungan</a></li>
                            <?php
                        }else if($ruang->grid==3){
                            ?>
                            <li class="active"><a href="#daftar" data-toggle="tab">Daftar</a></li>
                            <li class=""><a href="#tab_1" data-toggle="tab">Data Kunjungan</a></li>
                            <?php
                        }else{
                            ?>
                            <li class="active"><a href="#tab_1" data-toggle="tab">Data Kunjungan</a></li>
                            <?php
                        }
                        ?>
                        
                        <li><a href="#tab_2" data-toggle="tab" onclick="getPermintaan(1)"><?php if ($ruang->grid == 1) echo "Permintaan Rujuk Internal<span class='pull-right badge bg-aqua'>" . $notif . "</span>";
                            elseif ($ruang->grid == 2) echo "Permintaan Pindah Kamar<span class='pull-right badge bg-aqua'>" . $notif . "</span>";
                            elseif ($ruang->grid == 3) echo "Permintaan Penunjang<span class='pull-right badge bg-aqua'>" . $notif . "</span>" ?></a></li>
                        <?php
                        if ($ruang->grid == 2) {
                        ?>
                            <li><a href="#tab_3" data-toggle="tab" onclick="riwayatPindah(1)">Riwayat Pemindahan Pasien</a></li>
                            <li><a href="#tab_4" data-toggle="tab" onclick="riwayatPulang(1)">Riwayat Pemulangan Pasien</a></li>
                        <?php
                        }
                        ?>
                        
                    </ul>
                    <div class="tab-content">
                        <?php if($ruang->grid==3) {
                            $carabayar=$this->Layanan_model->getCaraBayar("PJ");
                            $rujukan=$this->Layanan_model->getRujukan(2);
                            ?>
                            <div class="tab-pane active" id="daftar">
                                <div class="row daftar" id="formpencarian">
                                    <form class="form-horizontal" id="formcari" method="POST" onsubmit="return false">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <legend>Informasi Pasien</legend>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">Nomr / NIK / NoBPJS:</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group input-group-sm">
                                                            <!-- enter_nobpjs(event) -->
                                                            <input type="text" name="cari" id="cari" class="form-control pull-right" value="" placeholder="Masukkan Nomr / NIK / No BPJS"  onkeydown="getPasien(event)">
                                                            <div class="input-group-btn">
                                                                <button type="button" class="btn btn-primary" onclick="cariPasien()"><i class="fa fa-search"></i> Cari Pasien</button>
                                                                <!-- <button type="button" class="btn btn-info"><i class="fa fa-plus" onclick="pasienBaru()"></i> Pasien Baru</button> -->
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">No KTP:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                    <input type="text" class="form-control pasien" id="no_ktp" name="no_ktp" placeholder="Masukkan NIK">
                                                    <span class='text-error' id="err_no_ktp"></span>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="nomr" name="nomr">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">Nama Pasien:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control pasien" id="nama_pasien" name="nama_pasien" placeholder="Masukka Nama pasien">
                                                        <span class='text-error' id="err_nama_pasien"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">Tempat / Tgl Lahir:</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                                        <input type="text" class="form-control pasien" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                                                        <span class='text-error' id="err_tempat_lahir"></span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                                        <input type="text" class="form-control pasien tanggal" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tgl Lahir">
                                                        <span class='text-error' id="err_tgl_lahir"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">Jekel:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9" id="v-jenis_kelamin">
                                                        <select name="jns_kelamin" id="jns_kelamin" class="form-control pasien" aria-placeholder="Pilih Jenis Kelamin">
                                                            <option value="">Pilih Jenis kelamin</option>
                                                            <option value="1">Laki-Laki</option>
                                                            <option value="0">Perempuan</option>
                                                        </select>
                                                        <span class='text-error' id="err_jns_kelamin"></span>
                                                    </div>
                                                    
                                                </div>

                                                
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">Kelurahan:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control pasien" id="nama_kelurahan" name="nama_kelurahan" placeholder="Masukkan nama kelurahan">
                                                        <span class='text-error' id="err_nama_kelurahan"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">Nama Kecamatan:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control pasien" id="nama_kecamatan" name="nama_kecamatan" placeholder="Masukkan nama kecamatan">
                                                        <span class='text-error' id="err_nama_kecamatan"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">Nama Kab Kota:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control pasien" id="nama_kab_kota" name="nama_kab_kota" placeholder="Masukkan nama kab kota">
                                                        <span class='text-error' id="err_nama_kab_kota"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">Nama Provinsi:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control pasien" id="nama_provinsi" name="nama_provinsi" placeholder="Masukkan nama provinsi">
                                                        <span class='text-error' id="err_nama_provinsi"></span>
                                                    </div>
                                                </div>
                                                <legend>Penanggung Jawab</legend>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Nama</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input name="pjPasienNama" id="pjPasienNama" type="text" class="form-control" placeholder="Masukkan nama penanggung Jawab" value="" onkeydown="enter_pjnama(event)">
                                                        <span class='text-error' id="err_pjPasienNama"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Pekerjaan</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input name="pjPasienPekerjaan" id="pjPasienPekerjaan" type="text" value="" class="form-control"  placeholder="Masukkan pekerjaan penanggung jawab" onkeydown="enter_pjpekerjaan(event)">
                                                        <span class='text-error' id="err_pjPasienPekerjaan"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Alamat</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" name="pjPasienAlamat" id="pjPasienAlamat" class="form-control" placeholder="masukkan Alamat penanggung jawab" onkeydown="enter_pjalamat(event)" value="">
                                                        <span class='text-error' id="err_pjPasienAlamat"></span>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <legend>Informasi Layanan</legend>
                                                <input type="hidden" name="sekarang" id="sekarang" value="<?= date('Y-m-d')?>">
                                                <input type="hidden" id="jns_layanan" name="jns_layanan" value="PJ">
                                                <input type="hidden" id="tgl_daftar" name="tgl_daftar" value="<?= date('Y-m-d') ?>">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">Cara Bayar:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <select name="id_cara_bayar" id="id_cara_bayar" class="form-control" style="width:100%" onchange="getCaraBayar()">
                                                        <?php 
                                                        foreach ($carabayar as $c) {
                                                            ?>
                                                            <option value="<?= $c->idx ?>"><?= $c->cara_bayar ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                        </select>
                                                        <span class='text-error' id="err_cara_bayar"></span>
                                                        <input type="hidden" name="jkn" id='jkn' value=''>
                                                    </div>
                                                </div>
                                                <div class="form-group jkn">
                                                    <label class="control-label col-sm-3" for="pwd">No BPJS:</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <div class="input-group">
                                                            <input name="no_bpjs" id="no_bpjs" type="text" class="form-control" value="" onkeydown="enter_nobpjs(event)">
                                                            <input type="hidden" name="status_peserta" id="status_peserta" value="">
                                                            <span class="input-group-addon">
                                                                <a id="btnUpdateNoBPJS" href="Javascript:updateNoBPJS()"><i class="fa fa-save"></i> Update</a>
                                                            </span>
                                                            <span class="input-group-addon" id="status"><a id="cekStatus" href="Javascript:cekPeserta()"><i class="fa-check fa fa-search" id="iconCekStatus"></i> Cek</a></span>
                                                        </div>
                                                        <span class='text-error' id="err_no_bpjs"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group jp">
                                                    <label class="control-label col-sm-3">Jenis Peserta</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" style="width:10px;padding:0px;">
                                                                <input type="text" name="id_jenis_peserta" id='id_jenis_peserta' class='form-control' readonly value='1.1'>
                                                            </span>
                                                            <span class="input-group-addon" style="width:90px;padding:0px;">
                                                                <input type="text" name="jenis_peserta" id='jenis_peserta' class="form-control" readonly value='Umum'>
                                                            </span>
                                                        </div>
                                                        <span class='text-error' id="err_id_jenis_peserta"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Rujukan</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <div class="input-group">
                                                            <select class="form-control select" name="id_rujuk" id="id_rujuk" style="width:100%" onchange="getRujukan()">
                                                                <option value=""></option>
                                                                <?php 
                                                                foreach ($rujukan as $r ) {
                                                                    ?>
                                                                    <option value="<?= $r->idx ?>"><?= $r->rujukan ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <span class='text-error' id="err_rujukan"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="faskesperujuk" class="faskesperujuk">
                                                    <div class="form-group" >
                                                        <label class="control-label col-sm-3">Faskes Perujuk<br></label>
                                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                                            <div class="input-group">
                                                                <input type="hidden" name="faskes" id="faskes" value="1">
                                                                <input type="text" name="jenis_faskes" id="jenis_faskes" class="form-control" value="Faskes Tingkat 1" readonly="">
                                                                <span class="input-group-addon">
                                                                    <input type="checkbox" value="1" name="jarkomdat" id="jarkomdat" onclick="cekJarkodat()" checked="">Jarkomdat
                                                                </span>
                                                            </div>
                                                            <span class='text-error' id="err_jenis_faskes"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group adarujukan">
                                                    <label class="control-label col-sm-3">No Rujukan</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <div class="input-group ">
                                                            <input type="text" id="no_rujuk" name="no_rujuk" class="form-control" value="" placeholder="Masukkan Nomor Rujukan" onkeyup="enter_norujukan(event)">
                                                            <input type="hidden" name="encryptdata" id='encryptdata' value=''>
                                                            
                                                        </div>
                                                        <span class='text-error' id="err_no_rujuk"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group kontrolulang">
                                                    <label class="control-label col-sm-3">No Surat Kontrol</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <div class="input-group ">
                                                            <input type="text" id="no_suratkontrol" name="no_suratkontrol" class="form-control" placeholder="Enter Nomor Surat Kontrol" onkeyup="enter_nokontrol(event)">
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
                                                <div class="form-group adarujukan" >
                                                    <label class="control-label col-sm-3">Dikirim Oleh<br><em>Jika pasien rujukan</em></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9 pengirim">

                                                        <?php
                                                        if (STATUS_VC == "0") {
                                                        ?>
                                                            <select class="form-control" id="id_pengirim" name="id_pengirim" onchange="pilihPengirim()"></select>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <input type="hidden" name="id_pengirim" id="id_pengirim">
                                                            <input type="text" name="pjPasienDikirimOleh" id="pjPasienDikirimOleh" class="form-control" placeholder="Masukkan Nama PPK Perujuk">
                                                        <?php
                                                        }
                                                        ?>
                                                        <span class='text-error' id="err_no_rujuk"></span>
                                                    </div>
                                                    <!-- <div class="pengirim" id="lainnya" style="display: block;"><input name="pjPasienDikirimOleh" id="pjPasienDikirimOleh" type="text" class="form-control" placeholder="Nama PPK perujuk" onkeydown="enter_pengirim1(event)"> </div> -->
                                                </div>
                                                <div class="form-group adarujukan">
                                                    <label class="control-label col-sm-3">Alamat Pengirim<br><em>Jika pasien rujukan</em></label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <input type="text" class="form-control" name="pjPasienAlmtPengirim" id="pjPasienAlmtPengirim" placeholder="Masukkan Alamat PPK Perujuk" onkeydown="enter_alamatpengirim(event)">
                                                        <!--textarea name="pjPasienAlmtPengirim" id="pjPasienAlmtPengirim" class="form-control" rows="2" maxlength="255"></textarea-->
                                                    </div>
                                                </div>
                                                <input type="hidden" id="id_ruang" name="id_ruang" value="<?= $this->session->userdata('kdlokasi') ?>">
                                                <input type="hidden" id="nama_ruang" name="nama_ruang" value="<?= getPoliByID($this->session->userdata('kdlokasi')) ?>">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Dokter</label>
                                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                                        <div class="input-group">
                                                            <select class="form-control select" name="dokterJaga" id="dokterJaga" onkeydown="enter_dokter(event)"  style="width:100%">
                                                                <option value="">Pilih Dokter</option>
                                                                <?php 
                                                                $dokter=$getDokter->result();
                                                                foreach ($dokter as $d ) {
                                                                    ?>
                                                                    <option value="<?= $d->NRP ?>" ><?= $d->pgwNama ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <span class='text-error' id="err_namaDokterJaga"></span>
                                                        <input type="hidden" name="groupantri" id="groupantri" value="">
                                                    </div>
                                                </div>

                                                <div class="form-group jkn">
                                                        <label class="control-label col-sm-3">No Jaminan (<em>SEP</em>)</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                                            <div class="input-group">
                                                                <input name="no_jaminan" id="no_jaminan" type="text" class="form-control" placeholder="Masukkan No SEP">
                                                                <input name="tgl_jaminan" id="tgl_jaminan" type="hidden" class="form-control" value='<?= date('Y-m-d')?>'>
                                                                <!-- <span class="input-group-addon">
                                                                    <input type="checkbox" id="chkIsJaminan" value='1' checked /> Format SEP
                                                                </span> -->
                                                            </div>
                                                            <span class='text-error' id="err_no_jaminan"></span>
                                                        </div>
                                                </div>
                                                <legend>Informasi Klinis</legend>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="email">Dokter Pengirim:</label>
                                                    <div class="col-sm-9">
                                                        <input type="hidden" name="dokter_pengirim" id="dokter_pengirim" class="form-control">
                                                        <input type="text" name="nama_dokter_pengirim" id="nama_dokter_pengirim" class="form-control">
                                                        <span class='text-error' id="err_nama_dokter_pengirim"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="pwd">Diagnosa Klinik:</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" name="diagnosa" id="diagnosa" maxlength="255" height='50'></textarea>
                                                        <span class="text-error" id="err_diagnosa"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3" for="pwd">Keterangan:</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" name="keterangan" id="keterangan" maxlength="255" height='50'></textarea>
                                                        <span class="text-error" id="err_keterangan"></span>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset>
                                                <legend>Jenis Pemeriksaan <span class="text-error" id="err_id_jenis_pemeriksaan"></span></legend>
                                                <ul class="nav nav-pills">
                                                    <?php 
                                                    $kdlokasi=$this->session->userdata('kdlokasi');
                                                    $jenis=$this->nota_model->getJenisPemeriksaan($kdlokasi);
                                                    // print_r($jenis);
                                                    $no=0;
                                                    foreach ($jenis as $j ) {
                                                        if($no==0) echo '<li class="active"><a data-toggle="tab" href="#jenis'.$j->idx.'">'.$j->jenis_pemeriksaan.'</a></li>';
                                                        else echo '<li class=""><a data-toggle="tab" href="#jenis'.$j->idx.'">'.$j->jenis_pemeriksaan.'</a></li>';
                                                        $no++;
                                                    }
                                                    ?>
                                                </ul> 
                                                <div class="tab-content" style="border: 1px solid #ddd; border-collapse:collapse;padding-top:10px;">
                                                    <?php 
                                                    $no=0;
                                                    foreach ($jenis as $j ) {
                                                        $variable=$this->nota_model->getListPemeriksaan($j->idx);
                                                        $subpemeriksaan=$this->nota_model->getSubPemeriksaan($j->idx);
                                                        if($no==0) $active="active"; else $active="";
                                                        ?>
                                                            <div id="jenis<?= $j->idx ?>" class="tab-pane fade in <?= $active ?>">
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-2" for="pwd">&nbsp;</label>
                                                                    <div class="col-sm-10">
                                                                    <input type="checkbox" name="id_jenis_pemeriksaan[]" id="id_jenis_pemeriksaan<?= $j->idx ?>" value="<?= $j->idx ?>" onclick="enabledForm(<?= $j->idx ?>)"> Buat Permintaan <?= $j->jenis_pemeriksaan ?>
                                                                    <input type="hidden" name="jenis_pemeriksaan<?= $j->idx?>" id="jenis_pemeriksaan<?= $j->idx ?>" value="<?= $j->jenis_pemeriksaan ?>" onclick="enabledForm(<?= $j->idx ?>)"> Buat Permintaan <?= $j->jenis_pemeriksaan ?>
                                                                    </div>
                                                                </div>
                                                                <div id="subjenispemeriksaan<?= $j->idx ?>">
                                                                <?php 
                                                                if(!empty($subpemeriksaan)){
                                                                    ?>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-sm-2" for="pwd">Sub Jenis Pemeriksaan:</label>
                                                                        <div class="col-sm-10">
                                                                        <select class="form-control kontrol<?= $j->idx ?>" name="idsubjenispemeriksaan<?= $j->idx?>" id="idsubjenispemeriksaan<?= $j->idx?>" style="width:100%" onchange="subJenisPemeriksaan(<?= $j->idx ?>)" disabled>
                                                                            <?php 
                                                                            foreach ($subpemeriksaan as $s ) {
                                                                                ?>
                                                                                <option value="<?= $s->idx ?>"><?= $s->sub_jenispemeriksaan ?></option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <input type="hidden" name="idsubjenispemeriksaan<?= $j->idx?>" id="idsubjenispemeriksaan<?= $j->idx?>" value="">
                                                                    <?php
                                                                }
                                                                ?>
                                                                </div>
                                                                <input type="hidden" id="template<?= $j->idx ?>" name='template<?= $j->idx ?>' value='<?= $j->template ?>'>
                                                                <?php if($j->template=="DahakTB"){
                                                                    ?>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-sm-2" for="pwd">Alasan Pemeriksaan:</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="radio" class="kontrol<?= $j->idx ?>" value='Diagnosa' name='alasanpemeriksaan<?= $j->idx ?>' id='diagnosa<?= $j->idx ?>' disabled> Diagnosa
                                                                            <input type="radio" class="kontrol<?= $j->idx ?>" value='Follow Up Pengobatan' name='alasanpemeriksaan<?= $j->idx ?>' id='fup<?= $j->idx ?>' disabled> Follow Up Pengobatan
                                                                            <br><span class="error-message" id="err_alasanpemeriksaan<?= $r->idx ?>"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-sm-2" for="pwd">Bulan Ke:</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" id='bulanke<?= $j->idx ?>' name='bulanke<?= $j->idx ?>' class='form-control kontrol<?= $j->idx ?>' disabled >    
                                                                            <span class="error-message" id="err_bulanke<?= $r->idx ?>"></span>    
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                } 
                                                                if($j->template=="Patologi"){
                                                                    ?>
                                                                    <div class="form-group" id="Kuretasi<?= $j->idx ?>" style="display:none;">
                                                                        <label class="control-label col-sm-2" for="pwd">Haid Terakhir:</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" id='haid_terakhir<?= $j->idx ?>' name='haid_terakhir<?= $j->idx ?>' class='form-control kontrol<?= $j->idx ?>' disabled>
                                                                            <span class="error-message" id="err_haid_terakhir<?= $r->idx ?>"></span>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <input type="hidden" name="semua_variabel<?= $j->idx ?>" id="semua_variabel<?= $j->idx?>" value="<?= $j->semua_variabel ?>">
                                                                <?php if($j->semua_variabel==0){ ?>
                                                                    <div class="error-message err_variable_pemeriksaan" id="err_variable_pemeriksaan<?= $r->idx ?>"></div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-sm-2" for="pwd">Variable Pemeriksaan:</label>
                                                                        <div class="col-sm-10">
                                                                            <div class='allow-scroll1'>
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                    <input type="checkbox" class="kontrol<?= $j->idx ?>" name="cekall<?= $j->idx ?>" id="cekall<?= $j->idx ?>" onclick="centangSemua(<?= $j->idx ?>)" disabled> Pilih Semua
                                                                                    </div>
                                                                                    <hr>
                                                                                <?php 
                                                                                $jmldata=count($variable);
                                                                                if($jmldata>3) $ukuran='col-md-4'; else $ukuran="col-md-12";
                                                                                foreach ($variable as $v ) {
                                                                                    ?>
                                                                                    <div class="<?= $ukuran ?>">
                                                                                        <input type="checkbox" value="<?= $v->id_pemeriksaan?>" class="id_pemeriksaan<?= $j->idx ?> kontrol<?= $j->idx ?>" name="id_pemeriksaan<?= $j->idx ?>[]" id="id_pemeriksaan<?= $v->id_pemeriksaan?>" disabled> <?= $v->nama_pemeriksaan ?>
                                                                                        <input type="hidden" name="nama_pemeriksaan<?= $v->id_pemeriksaan?>" id="nama_pemeriksaan<?= $v->id_pemeriksaan?>" value="<?= $v->nama_pemeriksaan?>">        
                                                                                    </div>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                </div>
                                                                            </div>    
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                            <?php
                                                        $no++;
                                                    }
                                                    ?>
                                                </div>
                                                <hr>    
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                    <button type="button" class="btn btn-primary" onclick="simpanPendaftaran()">Daftar</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </form> 
                                </div>
                            </div>
                        <?php } ?>
                        <div class="tab-pane <?php if($ruang->grid!=1 && $ruang->grid !=3) echo "active" ?>" id="tab_1">
                            <div class="row">
                                <div class="">
                                    <?php if ($ruang->grid == 2) { ?>
                                        <div class="col-md-11">
                                            <div class="input-group input-group-sm">
                                                <input type="hidden" id="start" name="start" value="1">
                                                <input type="text" name="q" id="q" class="form-control pull-right" value="" placeholder="Search" onkeyup="getPasienSaatini(1)">
                                                <input type="hidden" value="param">
                                                <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <select name="limit" id="limit" class="form-control input-sm" onchange="getPasienSaatini(1)">
                                                <option value="10">10</option>
                                                <option value="20" selected>20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                    <?php } else { ?>
                                        <form id="form1" onsubmit="return false" method="POST">
                                            <div class="form-group">
                                                <label class="col-md-2 col-sm-2 col-xs-12 control-label text-right">Periode</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <span class="input-group-btn">
                                                        <input type="text" class="form-control tanggal" name="tglAwal" id="tglAwal" value="<?= date('Y-m-d') ?>" onkeyup="getPasienSaatini(1)" placeholder="____-__-__" onchange="getPasienSaatini(1)">
                                                    </span>
                                                    <span class="input-group-btn">
                                                        <input disabled="" type="text" class="form-control" value="s/d" style="text-align: center;border: none;">
                                                    </span>
                                                    <span class="input-group-btn">
                                                        <input type="text" class="form-control tanggal" name="tglAkhir" value="<?= date('Y-m-d') ?>" id="tglAkhir" onkeyup="getPasienSaatini(1)" placeholder="____-__-__" onchange="getPasienSaatini(1)">
                                                    </span>

                                                    <span class="input-group-btn">
                                                        <input type="text" class="form-control" name="q" value="" id="q" placeholder="Keyword" onkeyup="getPasienSaatini(1)">
                                                    </span>
                                                    <span class="input-group-btn">
                                                        <button type="button" id="btnKeyword" class="btn btn-primary">
                                                            <i class="fa fa-search"></i> Cari</button>
                                                    </span>
                                                </div>
                                                
                                                <div class="col-md-1">
                                                    <select name="limit" id="limit" class="form-control input-sm" onchange="getData(1)">
                                                        <option value="10">10</option>
                                                        <option value="20">20</option>
                                                        <option value="30">30</option>
                                                        <option value="40">40</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="bg-green">
                                            <tr>
                                                <th style="width: 60px">#</th>
                                                <th style="width: 100px">No.Reg RS</th>
                                                <th style="width: 120px">No.Reg Unit</th>
                                                <th style="width: 80px">Tgl.Masuk</th>
                                                <th style="width: 60px">No MR</th>
                                                <th>Nama Pasien</th>
                                                <th style="width: 80px">Tgl.Lahir</th>
                                                <th style="width: 80px">Jns.Kelamin</th>
                                                <th>Nama Dokter Jaga</th>
                                                <?php if ($ruang->grid == 2) echo "<th>Ruang / Kamar</th><th>Kelas</th>";
                                                else echo "<th>Poli</th>" ?>
                                                <th style="width: 100px">Mode Bayar</th>
                                                <th>Status</th>
                                                <th style="width: 100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="data"></tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="14" id="pagination"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="input-group input-group-sm">
                                        <input type="hidden" id="start" name="start" value="1">
                                        <input type="text" name="q1" id="q1" class="form-control pull-right" value="" placeholder="Search" onkeyup="getPermintaan(1)">
                                        <input type="hidden" value="param1">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <select name="limit1" id="limit1" class="form-control input-sm" onchange="getPermintaan(1)" style="width: 100%;">
                                        <option value="10">10</option>
                                        <option value="20" selected>20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <?php
                            if ($ruang->grid == 1) {
                            ?>
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-green">
                                                <tr>
                                                    <th style="width: 60px">#</th>
                                                    <th style="width: 100px">No.Reg RS</th>
                                                    <th style="width: 120px">No.Reg Unit</th>
                                                    <th>Tgl Minta</th>
                                                    <th style="width: 60px">No MR</th>

                                                    <th>Nama Pasien</th>
                                                    <th>Ruang Pengirim</th>
                                                    <th>Dokter Pengirim</th>
                                                    <th style="width: 100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data1"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="14" id="pagination1"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            <?php
                            } elseif ($ruang->grid == 2) {
                            ?>
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-green">
                                                <tr>
                                                    <th style="width: 60px">#</th>
                                                    <th style="width: 100px">No.Reg RS</th>
                                                    <th style="width: 120px">No.Reg Unit</th>
                                                    <th>Tgl Minta</th>
                                                    <th style="width: 60px">No MR</th>
                                                    <th>Nama Pasien</th>
                                                    <th>Ruang Pengirim</th>
                                                    <th>Dokter Pengirim</th>
                                                    <th style="width: 100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data1"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="14" id="pagination1"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            <?php
                                //echo "Permintaan Pindah Kamar<span class='pull-right badge bg-aqua'>" . $notif . "</span>";
                            } elseif ($ruang->grid == 3) {
                            ?>
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-green">
                                                <tr>
                                                    <th style="width: 60px">#</th>
                                                    <th style="width: 100px">No.Reg RS</th>
                                                    <th style="width: 120px">No.Reg Unit</th>
                                                    <th>Tgl Minta</th>
                                                    <th style="width: 60px">No MR</th>

                                                    <th>Nama Pasien</th>
                                                    <th>Ruang Pengirim</th>
                                                    <th>Dokter Pengirim</th>
                                                    <th style="width: 100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data1"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="14" id="pagination1"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            <?php
                            } ?>
                        </div>
                        <?php
                        if ($ruang->grid == 2) {
                        ?>
                            <div class="tab-pane" id="tab_3">
                                <div class="row">
                                    <div class="">
                                        <div class="col-md-11">
                                            <form action="#" method="get">
                                                <div class="input-group input-group-sm">
                                                    <input type="hidden" id="start2" name="start1" value="1">
                                                    <input type="text" name="q2" id="q2" class="form-control pull-right" value="" onkeyup="riwayatPindah(1)" placeholder="Search">
                                                    <input type="hidden" value="param2">
                                                    <div class="input-group-btn">
                                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-1">
                                            <select name="limit2" id="limit2" class="form-control input-sm" onchange="riwayatPindah(1)">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-green">
                                                <tr>
                                                    <th style="width: 60px">#</th>
                                                    <th style="width: 100px">No.Reg RS</th>
                                                    <th style="width: 120px">No.Reg Unit</th>
                                                    <th>Tgl Minta</th>
                                                    <th style="width: 60px">No MR</th>
                                                    <th>Nama Pasien</th>
                                                    <th>Ruang Tujuan</th>
                                                    <th>Dokter Pengirim</th>
                                                    <th>Response</th>
                                                    <th style="width: 100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data2"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="15" id="pagination2"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_4">
                                <div class="row">
                                    <div class="">
                                        <div class="col-md-11">
                                            <form action="#" method="get">
                                                <div class="input-group input-group-sm">
                                                    <input type="hidden" id="start3" name="start1" value="1">
                                                    <input type="text" name="q3" id="q3" class="form-control pull-right" value="" onkeyup="riwayatPulang(1)" placeholder="Search">
                                                    <input type="hidden" value="param3">
                                                    <div class="input-group-btn">
                                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-1">
                                            <select name="limit3" id="limit3" class="form-control input-sm" onchange="riwayatPulang(1)">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-green">
                                                <tr>
                                                    <th style="width: 60px">#</th>
                                                    <th style="width: 100px">No.Reg RS</th>
                                                    <th style="width: 120px">No.Reg Unit</th>
                                                    <th>Tgl Keluar</th>
                                                    <th>Lama Rawat</th>
                                                    <th style="width: 60px">No MR</th>
                                                    <th>Nama Pasien</th>
                                                    <th>Ruangan</th>
                                                    <th>Cara Keluar</th>
                                                    <th>Keadaan Keluar</th>

                                                    <th style="width: 100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data3"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="15" id="pagination3"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }else if($ruang->grid==1){
                            ?>
                            <div class="tab-pane active" id="tab_3">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel panel-success">
                                            <div class="panel-heading text-center">NOMOR ANTREAN</div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="kotak font60 text-center" id="v-nomorAntri">
                                                            <?php if(!empty($lastantrean)) {
if(empty($lastantrean->labelantrean)) echo $lastantrean->no_antrian_poly;
else echo $lastantrean->labelantrean.".".$lastantrean->no_antrian_poly; 
                                                            }else {
echo "Kosong"; 
                                                            }    
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 top10">
                                                        <div class="kotak text-center">
                                                            <div class="font10"><b>Dokter</b></div>
                                                            <div class="font14" id="v-namadokter"><?php if(!empty($antreandokter)) echo $antreandokter[0]->namaDokterJaga ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 top10">
                                                        <div class="kotak text-center">
                                                            <div class="font10"><b>Poli Tujuan</b></div>
                                                            <div class="font14"><?= getPoliByID($ruangID) ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 top10">
                                                        <div class="kotak text-center">
                                                            <div class="font10"><b>No Rekam Medis</b></div>
                                                            <div class="font14" id="v-nomr"><?php if(!empty($lastantrean)) echo $lastantrean->nomr; else echo "-"; ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 top10">
                                                        <div class="kotak text-center">
                                                            <div class="font10"><b>Waktu Daftar</b></div>
                                                            <div class="font14" id="v-waktudaftar"><?php if(!empty($lastantrean)) echo $lastantrean->tgl_masuk; else echo "-"; ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 top10">
                                                        <div class="kotak text-center">
                                                            <div class="font10"><b>Waktu Panggil</b></div>
                                                            <div class="font14" id='v-waktupanggil'><?= date('Y-m-d H:i:s') ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 top10">
                                                        <div class="kotak text-center">
                                                            <div class="font10"><b>NIK</b></div>
                                                            <div class="font14" id="v-nik"><?php if(!empty($lastantrean)) echo $lastantrean->no_ktp; else echo "-"; ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 top10">
                                                        <div class="kotak text-center">
                                                            <div class="font10"><b>Nama</b></div>
                                                            <div class="font14" id="v-nama"><?php if(!empty($lastantrean)) echo $lastantrean->nama_pasien; else echo "-"; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 table-responsive">
                                        <audio id="bell" src="<?= base_url() ."assets/sound/Airport_Bell.mp3"; ?>"  ></audio>
                                        <audio id="suarabelnomorurut" src="<?= base_url() ."assets/sound/noantri.mp3"; ?>"  ></audio>
                                        <audio id="suarabelsuarabelloket" src="<?= base_url() ."assets/sound/diloket.mp3"; ?>"  ></audio>
                                        <audio id="belas" src="<?= base_url() ."assets/sound/belas.mp3"; ?>"  ></audio>
                                        <audio id="sebelas" src="<?= base_url() ."assets/sound/sebelas.mp3"; ?>"  ></audio>
                                        <audio id="puluh" src="<?= base_url() ."assets/sound/puluh.mp3"; ?>"  ></audio>
                                        <audio id="sepuluh" src="<?= base_url() ."assets/sound/sepuluh.mp3"; ?>"  ></audio>
                                        <audio id="ratus" src="<?= base_url() ."assets/sound/ratus.mp3"; ?>"  ></audio>
                                        <audio id="seratus" src="<?= base_url() ."assets/sound/seratus.mp3"; ?>"  ></audio>
                                        <audio id="angka0" src="<?= base_url() ."assets/sound/g0.mp3"; ?>"  ></audio>
                                        <audio id="angka1" src="<?= base_url() ."assets/sound/g1.mp3"; ?>"  ></audio>
                                        <audio id="angka2" src="<?= base_url() ."assets/sound/g2.mp3"; ?>"  ></audio>
                                        <audio id="angka3" src="<?= base_url() ."assets/sound/g3.mp3"; ?>"  ></audio>
                                        <audio id="angka4" src="<?= base_url() ."assets/sound/g4.mp3"; ?>"  ></audio>
                                        <audio id="angka5" src="<?= base_url() ."assets/sound/g5.mp3"; ?>"  ></audio>
                                        <audio id="angka6" src="<?= base_url() ."assets/sound/g6.mp3"; ?>"  ></audio>
                                        <audio id="angka7" src="<?= base_url() ."assets/sound/g7.mp3"; ?>"  ></audio>
                                        <audio id="angka8" src="<?= base_url() ."assets/sound/g8.mp3"; ?>"  ></audio>
                                        <audio id="angka9" src="<?= base_url() ."assets/sound/g9.mp3"; ?>"  ></audio>
                                        <audio id="puluhan0" src="<?= base_url() ."assets/sound/g0.mp3"; ?>"  ></audio>
                                        <audio id="puluhan1" src="<?= base_url() ."assets/sound/g1.mp3"; ?>"  ></audio>
                                        <audio id="puluhan2" src="<?= base_url() ."assets/sound/g2.mp3"; ?>"  ></audio>
                                        <audio id="puluhan3" src="<?= base_url() ."assets/sound/g3.mp3"; ?>"  ></audio>
                                        <audio id="puluhan4" src="<?= base_url() ."assets/sound/g4.mp3"; ?>"  ></audio>
                                        <audio id="puluhan5" src="<?= base_url() ."assets/sound/g5.mp3"; ?>"  ></audio>
                                        <audio id="puluhan6" src="<?= base_url() ."assets/sound/g6.mp3"; ?>"  ></audio>
                                        <audio id="puluhan7" src="<?= base_url() ."assets/sound/g7.mp3"; ?>"  ></audio>
                                        <audio id="puluhan8" src="<?= base_url() ."assets/sound/g8.mp3"; ?>"  ></audio>
                                        <audio id="puluhan9" src="<?= base_url() ."assets/sound/g9.mp3"; ?>"  ></audio>
                                        <audio id="ratusan0" src="<?= base_url() ."assets/sound/g0.mp3"; ?>"  ></audio>
                                        <audio id="ratusan1" src="<?= base_url() ."assets/sound/g1.mp3"; ?>"  ></audio>
                                        <audio id="ratusan2" src="<?= base_url() ."assets/sound/g2.mp3"; ?>"  ></audio>
                                        <audio id="ratusan3" src="<?= base_url() ."assets/sound/g3.mp3"; ?>"  ></audio>
                                        <audio id="ratusan4" src="<?= base_url() ."assets/sound/g4.mp3"; ?>"  ></audio>
                                        <audio id="ratusan5" src="<?= base_url() ."assets/sound/g5.mp3"; ?>"  ></audio>
                                        <audio id="ratusan6" src="<?= base_url() ."assets/sound/g6.mp3"; ?>"  ></audio>
                                        <audio id="ratusan7" src="<?= base_url() ."assets/sound/g7.mp3"; ?>"  ></audio>
                                        <audio id="ratusan8" src="<?= base_url() ."assets/sound/g8.mp3"; ?>"  ></audio>
                                        <audio id="A" src="<?= base_url() ."assets/sound/abjad/A.mp3"; ?>"  ></audio>
                                        <audio id="B" src="<?= base_url() ."assets/sound/abjad/B.mp3"; ?>"  ></audio>
                                        <audio id="C" src="<?= base_url() ."assets/sound/abjad/C.mp3"; ?>"  ></audio>
                                        <audio id="D" src="<?= base_url() ."assets/sound/abjad/D.mp3"; ?>"  ></audio>
                                        <audio id="E" src="<?= base_url() ."assets/sound/abjad/E.mp3"; ?>"  ></audio>
                                        <audio id="F" src="<?= base_url() ."assets/sound/abjad/F.mp3"; ?>"  ></audio>
                                        <audio id="G" src="<?= base_url() ."assets/sound/abjad/G.mp3"; ?>"  ></audio>
                                        <audio id="H" src="<?= base_url() ."assets/sound/abjad/H.mp3"; ?>"  ></audio>
                                        <audio id="I" src="<?= base_url() ."assets/sound/abjad/I.mp3"; ?>"  ></audio>
                                        <audio id="J" src="<?= base_url() ."assets/sound/abjad/J.mp3"; ?>"  ></audio>
                                        <audio id="K" src="<?= base_url() ."assets/sound/abjad/K.mp3"; ?>"  ></audio>
                                        <audio id="L" src="<?= base_url() ."assets/sound/abjad/L.mp3"; ?>"  ></audio>
                                        <audio id="M" src="<?= base_url() ."assets/sound/abjad/M.mp3"; ?>"  ></audio>
                                        <audio id="N" src="<?= base_url() ."assets/sound/abjad/M.mp3"; ?>"  ></audio>
                                        <audio id="O" src="<?= base_url() ."assets/sound/abjad/O.mp3"; ?>"  ></audio>
                                        <audio id="P" src="<?= base_url() ."assets/sound/abjad/P.mp3"; ?>"  ></audio>
                                        <audio id="Q" src="<?= base_url() ."assets/sound/abjad/Q.mp3"; ?>"  ></audio>
                                        <audio id="R" src="<?= base_url() ."assets/sound/abjad/R.mp3"; ?>"  ></audio>
                                        <audio id="S" src="<?= base_url() ."assets/sound/abjad/S.mp3"; ?>"  ></audio>
                                        <audio id="T" src="<?= base_url() ."assets/sound/abjad/T.mp3"; ?>"  ></audio>
                                        <audio id="U" src="<?= base_url() ."assets/sound/abjad/U.mp3"; ?>"  ></audio>
                                        <audio id="V" src="<?= base_url() ."assets/sound/abjad/V.mp3"; ?>"  ></audio>
                                        <audio id="W" src="<?= base_url() ."assets/sound/abjad/W.mp3"; ?>"  ></audio>
                                        <audio id="X" src="<?= base_url() ."assets/sound/abjad/X.mp3"; ?>"  ></audio>
                                        <audio id="Y" src="<?= base_url() ."assets/sound/abjad/Y.mp3"; ?>"  ></audio>
                                        <audio id="Z" src="<?= base_url() ."assets/sound/abjad/Z.mp3"; ?>"  ></audio>
                                        <audio id="poliklinik" src="<?= base_url() ."assets/sound/poliklinik.mp3"; ?>"  ></audio>
                                        <audio id="ruang" src="<?= base_url() ."assets/sound/p".$this->session->userdata('kdlokasi').".mp3"; ?>"  ></audio>
                                        <form class="form-horizontal kotak" name="kotak" id="form" action="#">
                                            <input type="hidden" name="id_daftar" id="id_daftar" value="<?php if(!empty($lastantrean)) echo $lastantrean->id_daftar ?>">
                                            <input type="hidden" name="kodebooking" id="kodebooking" value="<?php if(!empty($lastantrean)) echo $lastantrean->kodebooking ?>">
                                            <input type="hidden" name="reg_unit" id="reg_unit" value="<?php if(!empty($lastantrean)) echo $lastantrean->reg_unit ?>">
                                            <input type="hidden" name="labelantrean" id="labelantrean" value="<?php if(!empty($lastantrean)) echo $lastantrean->labelantrean ?>">
                                            <input type="hidden" name="taskid" id="taskid" value="4">
                                            <input type="hidden" name="idxdaftar" id="idx_daftar" value="<?php if(!empty($lastantrean)) echo $lastantrean->idx_daftar ?>">
                                            <div class="form-group">
                                                <label class="control-label col-sm-3" for="email">Antrean:</label>
                                                <div class="col-sm-9">
                                                <input type="radio" id="normal" name="antrean" checked value="1" onclick="getLastAntrean()"> Normal
                                                <input type="radio" id="prioritas" name="antrean" value="2" onclick="getLastAntrean()"> Prioritas
                                                <input type="radio" id="lewati" name="antrean" value="3" onclick="getLastAntrean()"> Lewati
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-3" for="pwd">Poli:</label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control" id="pwd" placeholder="Enter Poly" value="<?php echo getPoliByID($ruangID) ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-3" for="pwd">Dokter:</label>
                                                <div class="col-sm-9">
                                                    <?php 
                                                    if(count($antreandokter)==1){
                                                        ?>
                                                        <input type="hidden" name="dokter" id="dokterJaga" value="<?= $antreandokter[0]->dokterJaga?>">
                                                        <input type="text" class="form-control" id="pwd" name="namaDokterJaga" placeholder="Enter Dokter" value="<?= $antreandokter[0]->namaDokterJaga ?>" readonly>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <select name="dokterJaga" style="width:100%" id="dokterJaga" class="form-control" onchange="getLastAntrean()">
                                                            <?php 
                                                            foreach ($antreandokter as $a ) {
?>
<option value="<?= $a->dokterJaga ?>"><?= $a->namaDokterJaga ?></option>
<?php
                                                            }?>
                                                        </select>
                                                        <?php
                                                    }
                                                    ?>
                                                    
                                                </div>
                                            </div>
                                            <div id="v-nomorantrean">
                                            <input type="hidden" name="nomorantri" id="nomorantri" class="form-control pull-right" value="<?php if(!empty($lastantrean)) echo $lastantrean->no_antrian_poly; else echo "0"; ?>">
                                            </div>
                                            <!-- <div class="form-group">
                                                <label class="control-label col-sm-3" for="pwd">Nomor Antrian:</label>
                                                <div class="col-sm-10">
                                                    <select name="nomorantri" id="nomorantri" class="form-control">
                                                        <option value="">Pilih Nomor Antrian</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9" id="btnpanggil">
                                                    <?php 
                                                    if(!empty($lastantrean)){
                                                        if($lastantrean->status_panggil==1){
                                                            if($lastantrean->taskid==4){
?>
<button type="button" class="btn btn-danger btn-sm btn-block" id="btnPanggil" disabled><span class="fa fa-ticket" id="iconPanggil" ></span> Pasien Sedang Dilayani</button>
<?php
                                                            }else{
?>
<button type="button" class="btn btn-warning btn-sm btn-block" onclick="panggil()" id="btnPanggil"><span class="fa fa-ticket" id="iconPanggil"></span> Panggil Ulang</button>
<?php
                                                            }
                                                            ?>
                                                            
                                                            
                                                            <div class="row top10">
<div class="col-md-6">
<button type="button" class="btn btn-success btn-sm btn-block" onclick="mulaiLayan()" id="btnMulailayan"><span id="iconMulaiLayan" class="fa fa-check"></span> Mulai Layani</button>
</div>
<div class="col-md-6"><button type="button" class="btn btn-info btn-sm btn-block" onclick="skip()" <?php if($lastantrean->taskid==4) echo "disabled"; ?>><span class="fa fa-arrow-right " ></span> Skip</button></div>
                                                            
                                                            </div> 
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <button type="button" class="btn btn-success btn-sm btn-block" onclick="panggil()"><span class="fa fa-ticket"></span> Panggil Berikutnya</button>
                                                            <div class="row top10">

<div class="col-md-6"><button type="button" class="btn btn-info btn-sm btn-block" onclick="skip()" <?php if($lastantrean->taskid==4) echo "disabled"; ?>><span class="fa fa-arrow-right " ></span> Lewati</button></div>
<div class="col-md-6">
<button type="button" class="btn btn-danger btn-sm btn-block" onclick="batalAntrean()"><span id="iconbatak" class="fa fa-remove"></span> Batal</button>
</div>
                                                            </div> 
                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                        <button type="button" class="btn btn-danger btn-sm btn-block" disabled><span class="fa fa-ticket"></span> Antrean Habis</button>
                                                        <?php
                                                    }
                                                    ?>
                                                
                                                </div>
                                            </div>
                                        </form> 

                                        <div class="kotak top20">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="font20">
                                                        <?= getPoliByID($ruangID) ?>
                                                    </div>
                                                    <div class="font10" id="v-dokterjuga">
                                                        <?php if(!empty($antreandokter)) echo $antreandokter[0]->namaDokterJaga ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <!-- <?php print_r($jadwal)?> -->
                                                    <div class="font20">
                                                        <?= $jadwal->jadwal_jam_mulai ." - ". $jadwal->jadwal_jam_selesai ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="<?= base_url()."nota_tagihan.php/display" ?>" target="_blank" class='btn btn-primary btn-block' >Buka Display Antrean</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>

    </section>

    <!--Modal-->
    <div id="formbatal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Batal Pindah</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="alasan">Alasan</label>
                            <input type="hidden" id="id_pindah_ranap" name="id_pindah_ranap">
                            <input type="hidden" id="id_daftar" name="id_daftar">
                            <input type="hidden" id="reg_unit" name="reg_unit">
                            <textarea name="alasan" id="alasan" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" onclick="BatalPindahRanap()">Batalkan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <?php if ($jns_layanan == 'RJ') {
    ?>
        <div class="modal fade" id="modal_rujukan_internal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-green">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Daftarkan Pasien</h3>
                    </div>

                    <div class="modal-body form">
                        <form class="form-horizontal" method="POST" id="form" action="#" enctype="multipart/form-data">
                            <div class="box-body">
                                <input type="hidden" name="no_permintaan" id="ri_no_permintaan" value="">
                                <input type="hidden" name="id_daftar" id="ri_id_daftar" value="">
                                <input type="hidden" name="rag_unit" id="ri_reg_unit" value="">
                                <input type="hidden" name="nomr" id="ri_nomr" value="">
                                <input type="hidden" name="nama_pasien" id="ri_nama_pasien" value="">
                                <input type="hidden" name="ruang_pengirim" id="ri_ruang_pengirim" value="">
                                <input type="hidden" name="nama_ruang_pengirim" id="ri_nama_ruang_pengirim" value="">
                                <input type="hidden" name="id_poli" id="ri_id_poli" value="">
                                <input type="hidden" name="nama_poli" id="ri_nama_poli" value="">
                                <input type="hidden" name="dokter_pengirim" id="ri_dokter_pengirim" value="">
                                <input type="hidden" name="nama_dokter_pengirim" id="ri_nama_dokter_pengirim" value="">
                                <input type="hidden" name="keterangan" id="ri_keterangan" value="">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Dokter Jaga</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="dokterJaga" name="dokterJaga" style="width: 100%;">
                                            <option value="">Pilih</option>
                                            <?php

                                            foreach ($getDokter->result() as $d) {
                                            ?>
                                                <option value="<?= $d->NRP ?>"><?= $d->pgwNama; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <span class ext-error" id="err_dokterJaga"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" id="btnSave" onclick="daftarkanPasien()" class="btn btn-success">Daftarkan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div>

        <div id="modalbatalantrean" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Batalkan Antrean</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning alert-dismissible text-center">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Sistem ini terintegrasi dengan JKN Antrean, jika antrean di batalkan maka kunjungan hari ini juga akan otomatis dibatalkan pada server antrean JKN dan juga dibatalkan pada SIMRS 
                            <h3 class='text-center'><i class="icon fa fa-question-circle "></i><br>Apakah Anda Yakin Akan Membatalkan bookingan antrean ini ?</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="alasan">Keterangan</label>
                                <input type="hidden" id="btlkodebooking" name="btlkodebooking">
                                <input type="hidden" id="btlid_daftar" name="btlid_daftar">
                                <input type="hidden" id="btlreg_unit" name="btlreg_unit">
                                <textarea name="btlketerangan" id="btlketerangan" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" id="btnBatalAntrean" onclick="batalkanAntrean()"><span id="iconBatalAntrean" class="fa fa-remove"></span> Batalkan</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    <?php
    } elseif ($jns_layanan == "PJ") {
    ?>
        <div class="modal fade" id="persetujuanRegistrasi" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Form Persetujuan Penunjang</h4>
                    </div>
                    <div class="modal-body">

                        <form id="formPenunjang" role="form" action="<?= base_url() . "nota_tagihan.php/permintaan_penunjang/registrasiPasien" ?>" method="POST">
                            <div class="box-body">
                                <div class="row">
                                    <div class="row">
                                        <input type="hidden" name="no_permintaan" id="no_permintaan">
                                        <input type="hidden" name="id_ruang" id="id_ruang" value="<?php echo $ruangID ?>">
                                        <input type="hidden" name="jmldata" id="jmldata" value="">
                                        <div class="form-group">
                                            <div class="col-md-12"><label style="width: 100%">Pilih Dokter / Petugas</label></div>
                                            <div class="col-md-12">
                                                <select name="dokterJaga" id="dokterJaga" class="form-control" style="width: 100%;">
                                                    <?php
                                                    foreach ($getDokter->result() as $res) {
                                                    ?>
                                                        <option value="<?= $res->NRP; ?>"><?= $res->pgwNama ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12"><label>Permintaan Tindakan</label> </div>
                                            <div class="col-md-12">
                                                <table class="table table-bordered">
                                                    <thead class="bg-blue">
                                                        <th>No</th>
                                                        <th>Layanan</th>
                                                    </thead>
                                                    <tbody id="permintaan-tindakan"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="button" id="submit" class="btn btn-primary" onclick="registrasiPasienPermintaanPenunjang()">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } elseif ($jns_layanan == "RI") {
    ?>
        <div class="modal fade" id="modalpindahkamar" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <form action="#" method="POST" id="form">

                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <div class="box box-widget widget-user-2">
                                        <div class="bg-aqua-active" style="padding:10px;border-radius:15px 15px 0px 0px">
                                            <div class="widget-user-image" id="lblimagejekel">
                                                <img class="img-circle" src="<?= base_url() ?>assets/images/female.png" alt="" id="imgFemale">
                                            </div>
                                            <h4 class="widget-user-username" id="lblnamapasien">RANI ALFIQIAH DS</h4>
                                            <p id="lblregunit" style="margin-left: 75px;">1374025006010001</p>
                                        </div>

                                        <div class="box-body">
                                            <div class="nav-tabs-custom">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a title="Profile Peserta" href="#tab_1" data-toggle="tab"><span class="fa fa-user"></span></a></li>
                                                </ul>
                                                <form action="#" method="POST" id="form">
                                                    <div class="tab-content" style="padding:0px;">
                                                        <div class="tab-pane active" id="tab_1">
                                                            <input type="hidden" name="dokterPengirim" id="dokterPengirim">
                                                            <input type="hidden" name="id_daftar" id="id_daftar">
                                                            <input type="hidden" name="id_ruang" id="id_ruang">
                                                            <input type="hidden" name="idx" id="idx">
                                                            <input type="hidden" name="kamar_pengirim" id="kamar_pengirim">
                                                            <input type="hidden" name="kelas_layanan" id="kelas_layanan">
                                                            <input type="hidden" name="keterangan" id="keterangan">
                                                            <input type="hidden" name="nama_dokter_pengirim" id="nama_dokter_pengirim">
                                                            <input type="hidden" name="nama_kamar_pengirim" id="nama_kamar_pengirim">
                                                            <input type="hidden" name="nama_pasien" id="nama_pasien">
                                                            <input type="hidden" name="nama_ruang" id="nama_ruang">
                                                            <input type="hidden" name="nama_ruang_pengirim" id="nama_ruang_pengirim">
                                                            <input type="hidden" name="nomr" id="nomr">
                                                            <input type="hidden" name="reg_unit" id="reg_unit">
                                                            <input type="hidden" name="ruang_pengirim" id="ruang_pengirim">
                                                            <input type="hidden" name="tgl_minta" id="tgl_minta">
                                                            <ul class="list-group list-group-unbordered">
<li class="list-group-item">
    <div class="row">
        <div class="col-xs-4">NOMR</div>
        <div class="col-xs-8" id="lblnomr">: 393713</div>
    </div>
</li>
<li class="list-group-item">
    <div class="row">
        <div class="col-xs-4">NO. REGISTRASI</div>
        <div class="col-xs-8" id="lbliddaftar">: 2021011882</div>
    </div>
</li>

<li class="list-group-item">
    <div class="row">
        <div class="col-xs-4">KELAS LAYANAN</div>
        <div class="col-xs-8" id="lblkelaslayanan">: Rawat Jalan</div>
    </div>
</li>

<li class="list-group-item">
    <div class="row">
        <div class="col-xs-4">RUANG PEGIRIM</div>
        <div class="col-xs-8" id="lblruangpengirim">: GIGI &amp; MULUT</div>
    </div>
</li>
<li class="list-group-item">
    <div class="row">
        <div class="col-xs-4">DOKTER PENGIRIM</div>
        <div class="col-xs-8" id="lblnama_dokter_pengirim">: drg. ELSY GUSMAN</div>
    </div>
</li>
<li class="list-group-item">
    <div class="row">
        <div class="col-xs-4">RUANG PENERIMA</div>
        <div class="col-xs-8" id="lblruangpenerima"></div>
    </div>
</li>
<li class="list-group-item">
    <div class="row">
        <div class="col-xs-4">KELAS LAYANAN</div>
        <div class="col-xs-8">
            <select name="id_kelas" id="id_kelas" class="form-control" onchange="getKamar()" style="width: 100%;">
                <option value="">Pilih Kelas</option>
                <?php
                foreach ($kelas as $k) {
                ?>
                    <option value="<?= $k->idx ?>"><?= $k->kelas_layanan ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
</li>
<li class="list-group-item">
    <div class="row">
        <div class="col-xs-4">KAMAR</div>
        <div class="col-xs-8">
            <select name="id_kamar" id="id_kamar" class="form-control" style="width: 100%;">
                <option value="">Pilih kamar</option>
            </select>
        </div>
    </div>
</li>
<li class="list-group-item">
    <div class="row">
        <div class="col-xs-12">
            <button class="btn btn-success btn-block" id="terima" type="button" onclick="registrasikan()">Registrasikan</button>
        </div>
    </div>
</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    <?php
    }
} else { ?>
    <section class="content container-fluid">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Informasi</h4>
            Maaf ruangan tidak ada
        </div>
    </section>

<?php } ?>