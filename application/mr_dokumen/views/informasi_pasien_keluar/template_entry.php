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

    .rataTengah {
        text-align: center;
    }

    .rataKanan {
        text-align: right;
    }

    .f20 {
        font-size: 20px;
    }

    .w10 {
        width: 10px;
    }

    .w50 {
        width: 50px;
    }

    .w60 {
        width: 60px;
    }

    .w70 {
        width: 70px;
    }

    .w80 {
        width: 80px;
    }

    .w90 {
        width: 90px;
    }

    .w100 {
        width: 100px;
    }

    .w110 {
        width: 110px;
    }

    .w120 {
        width: 120px;
    }

    .w130 {
        width: 130px;
    }

    .w140 {
        width: 140px;
    }

    .w150 {
        width: 150px;
    }

    .w160 {
        width: 160px;
    }

    .w170 {
        width: 170px;
    }

    .w180 {
        width: 180px;
    }

    .w190 {
        width: 190px;
    }

    .w200 {
        width: 200px;
    }

    .w210 {
        width: 210px;
    }

    .w220 {
        width: 220px;
    }

    .w230 {
        width: 230px;
    }

    .w240 {
        width: 240px;
    }

    .w250 {
        width: 250px;
    }

    input {
        border: none;
    }

    #convNilai {
        font-size: 20px
    }

    .ui-autocomplete-loading {
        background: white url("<?php echo base_url() ?>ui-anim_basic_16x16.gif") right center no-repeat;
    }

    .ui-autocomplete {
        position: absolute;
        z-index: 1000;
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

    tr.autocomplete td {
        border: 1px solid #f1f1f1;
        padding: 3px
    }

    table {
        border-collapse: collapse;
        table-layout: fixed;
    }

    td {
        white-space: normal !important;
        word-wrap: break-word;
    }
</style>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery/css/jquery-ui.css">

<section class="content-header">
    <h1><?php echo $contentTitle ?> <?php echo getRuangByID($ruangID) ?></h1>
</section>
<section class="content container-fluid">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Penting</h4>
        Menyegerakan entry data pasien keluar dapat membantu update informasi pasien.
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="box-body">
                        <!-- Form Pencarian Pasien -->
                        <div id="divCariPasien">
                            <form id="formCariPasien" class="form-horizontal" role="form" onsubmit="return false">
                                <input type="hidden" name="txtRuangID" id="txtRuangID" value="<?php echo $ruangID ?>" />
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 col-xs-12 control-label">Nomor</label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="txtNomor" id="txtNomor">
                                            <span class="input-group-addon">
                                                <label>
                                                    <input type="radio" name="rbnomor" value="nomr" id="rbNoMR" checked=""> No.MR</label>
                                                &nbsp;
                                                <label>
                                                    <input type="radio" name="rbnomor" value="reg_rs" id="rbRegRS"> No.Reg RS</label>
                                                &nbsp;
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-6">
                                        <div class="input-group">
                                            <button type="button" class="btn btn-danger" id="btnKembali">
                                                <i class="glyphicon glyphicon-new-window"></i> Kembali</button>
                                            <button type="button" id="cariPasien" class="btn btn-primary">
                                                <i class="glyphicon glyphicon-search"></i> Cari</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Tabel Pencarian Pendaftaran Pasien -->
                        <div id="divTabelPendaftaranPasien" style="display: none;padding: 10px">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="w100">No.Reg RS</th>
                                        <th class="w120">No.Reg Unit</th>
                                        <th class="w100">Tgl.Masuk</th>
                                        <th class="w100">No.MR</th>
                                        <th class="">Nama Pasien</th>
                                        <th class="w100">Tgl.Lahir</th>
                                        <th class="w100">Jenis Kelamin</th>
                                        <th class="rataTengah w100">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="getDataKunjunganPasien"></tbody>
                            </table>
                        </div>

                        <!-- Form Hasil Pencarian Pasien -->
                        <div id="divDataPasien" style="display: none;">
                            <div class="col-md-3 col-xs-12">
                                <div class="row">
                                    <div class="box box-widget widget-user-2">
                                        <div class="bg-aqua-active" style="padding:10px;border-radius:15px 15px 0px 0px">
                                            <div class="widget-user-image" id="lbljekel">
                                                <img class="img-circle" src="<?php echo base_url() . 'assets/images/male.png' ?>" alt="" id="imgMale">

                                            </div>
                                            <h4 class="widget-user-username" id="lbl_nama_pasien"></h4>
                                            <p id="lblnoka" style="margin-left: 75px;"></p>
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
                                                                    <div class="col-xs-8">: <span id="lblnomr"></span></div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="row">
                                                                    <div class="col-xs-4">TTL</div>
                                                                    <div class="col-xs-8">: <span id="lblttl"></span></div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="row">
                                                                    <div class="col-xs-4">NO. REGISTRASI</div>
                                                                    <div class="col-xs-8">: <span id="lbliddaftar"></span></div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="row">
                                                                    <div class="col-xs-4">NO. REG UNIT</div>
                                                                    <div class="col-xs-8">: <span id="lblreg_unit"></span></div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="row">
                                                                    <div class="col-xs-4">KELAS LAYANAN</div>
                                                                    <div class="col-xs-8">: <span id="lblkelaslayanan"></span></div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="row">
                                                                    <div class="col-xs-4">CARA BAYAR</div>
                                                                    <div class="col-xs-8">: <span id="lblcarabayar"></span></div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="row">
                                                                    <div class="col-xs-4">RUANG / POLI PENGIRIM</div>
                                                                    <div class="col-xs-8">: <span id="lblruang"></span></div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="row">
                                                                    <div class="col-xs-4">DPJP</div>
                                                                    <div class="col-xs-8">: <span id="lbldpjp"></span></div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9 col-xs-12">
                                <form id="form1" role="form" class="form-horizontal" onsubmit="return false">
                                    <!--div class="col-md-6">
                                        <div class="form-group">
                                            <label>No Registrasi RS/No.Registrasi Unit <span style="color: red"> * </span></label>
                                            <div class="input-group">
                                                <input readonly="" type="text" class="form-control" name="id_daftar" id="id_daftar">
                                                <div class="input-group-btn" style="width: 50%">
                                                    <input readonly="" type="text" class="form-control" name="reg_unit" id="reg_unit">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>No MR / Nama Pasien <span style="color: red"> * </span></label>
                                            <div class="input-group">
                                                <input readonly="" type="text" class="form-control" name="nomr" id="nomr">
                                                <div class="input-group-btn" style="width: 70%">
                                                    <input readonly="" type="text" class="form-control" name="nama_pasien" id="nama_pasien">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <div class="input-group col-md-6">
                                                <input readonly="" type="text" class="form-control" name="jns_kelamin" id="jns_kelamin">
                                                <div class="input-group-btn" style="width: 75%">
                                                    <input readonly="" type="text" class="form-control" id="v_jns_kelamin">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir/Umur <span style="color: red"> * </span></label>
                                            <div class="input-group col-md-9">
                                                <input readonly="" type="text" class="form-control" name="tgl_lahir" id="tgl_lahir">
                                                <div class="input-group-btn" style="width: 75%">
                                                    <input readonly="" type="text" class="form-control" name="umur" id="umur">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Ruang <span style="color: red"> * </span></label>
                                            <div class="input-group col-md-12">
                                                <input readonly="" type="text" class="form-control" name="id_ruang" id="id_ruang">
                                                <div class="input-group-btn" style="width: 75%">
                                                    <input readonly="" type="text" class="form-control" name="nama_ruang" id="nama_ruang">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Kelas Layanan <span style="color: red"> * </span> [<em>Jika Rawat Inap</em>]</label>
                                            <div class="input-group col-md-12">
                                                <input readonly="" type="text" class="form-control" name="id_kelas" id="id_kelas">
                                                <div class="input-group-btn" style="width: 75%">
                                                    <input readonly="" type="text" class="form-control" name="kelas_layanan" id="kelas_layanan">
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <div class="form-group">
                                            <label>Cara Keluar <span style="color: red"> * </span></label>
                                            <div class="input-group col-md-6">
                                                <select name="id_cara_keluar" id="id_cara_keluar" class="form-control" style="width: 300px">
                                                    <?php foreach ($getCaraKeluar->result_array() as $xCP) : ?>
                                                        <option value="<?php echo $xCP['idx'] ?>"><?php echo $xCP['cara_keluar'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Dokter Penanggung Jawab <span style="color: red"> * </span></label>
                                            <div class="input-group col-md-8">
                                                <select name="dpjp" id="dpjp" class="form-control" style="width: 300px">
                                                    <option value=""></option>
                                                    <?php foreach ($getDokter->result_array() as $xD) : ?>
                                                        <option value="<?php echo $xD['NRP'] ?>"><?php echo $xD['pgwNama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Keadaan Keluar <span style="color: red"> * </span></label>
                                            <div class="input-group col-md-8">
                                                <select name="id_keadaan_keluar" id="id_keadaan_keluar" class="form-control" style="width: 300px">
                                                    <?php foreach ($getKeadaanKeluar->result_array() as $xKK) : ?>
                                                        <option value="<?php echo $xKK['idx'] ?>"><?php echo $xKK['keadaan_keluar'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Jenis Kunjungan <span style="color: red"> * </span></label>
                                            <div class="input-group col-md-8">
                                                <select name="jns_kunjungan" id="jns_kunjungan" class="form-control" style="width: 300px">
                                                    <option value="0">Pasien Baru</option>
                                                    <option value="1">Pasien Lama</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Kasus Penyakit <span style="color: red"> * </span></label>
                                            <div class="input-group col-md-8">
                                                <select name="kasus_penyakit" id="kasus_penyakit" class="form-control" style="width: 300px">
                                                    <option value="0">Kasus Baru</option>
                                                    <option value="1">Kasus Lama</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label>Cara Bayar <span style="color: red"> * </span></label>
                                            <div class="input-group col-md-8">
                                                <select name="id_cara_bayar" id="id_cara_bayar" class="form-control" style="width: 300px">
                                                    <?php foreach ($getCaraBayar->result_array() as $xCB) : ?>
                                                        <option value="<?php echo $xCB['idx'] ?>"><?php echo $xCB['cara_bayar'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>No Kartu / No.Jaminan <span style="color: red"> * </span> [<em>Jika Cara Bayar Bukan Umum</em>]</label>
                                            <div class="input-group col-md-12">
                                                <input type="text" class="form-control" name="no_bpjs" id="no_bpjs">
                                                <div class="input-group-btn" style="width: 60%">
                                                    <input type="text" class="form-control" name="no_jaminan" id="no_jaminan">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Tindakan Pelayanan <span style="color: red"> * </span></label>
                                            <div class="input-group col-md-8">
                                                <select name="id_tindakan_pelayanan" id="id_tindakan_pelayanan" class="form-control" style="width: 300px">
                                                    <option value=""></option>
                                                    <?php foreach ($getJenisPelayanan->result_array() as $xJP) : ?>
                                                        <option value="<?php echo $xJP['idx'] ?>"><?php echo $xJP['jenis_pelayanan'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Kode ICD 10 <span style="color: red"> * </span> [<em>Bridging E-Klaim</em>]</label>
                                            <div class="input-group col-md-6">
                                                <input type="text" class="form-control" name="kode_icd" id="kode_icd">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>ICD 10 <span style="color: red"> * </span> [<em>Bridging E-Klaim</em>]</label>
                                            <div class="input-group col-md-12">
                                                <input type="text" class="form-control" name="icd" id="icd">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>DTD <span style="color: red"> * </span></label>
                                            <div class="input-group col-md-6">
                                                <input type="text" class="form-control" name="dtd" id="dtd">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Group ICD <span style="color: red"> * </span></label>
                                            <div class="input-group col-md-12">
                                                <input type="text" class="form-control" name="grup_icd" id="grup_icd">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Morbiditas <span style="color: red"> * </span></label>
                                            <div class="input-group col-md-12">
                                                <input readonly type="text" class="form-control" name="morbiditas" id="morbiditas">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Kecelakaan <span style="color: red"> * </span></label>
                                            <div class="input-group col-md-6">
                                                <input type="hidden" name="kecelakaan" id="kecelakaan">
                                                <input readonly type="text" class="form-control" id="viewkecelakaan">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <div class="input-group" id="btnExec">
                                                <button type="button" class="btn btn-primary" id="btnBatal">
                                                    <i class="glyphicon glyphicon-new-window"></i> Batal</button>
                                                <button type="button" class="btn btn-danger" id="submit" onclick="simpan()">
                                                    <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                                                <button type="button" class="btn btn-primary" id="btnCariPasienLainnya">
                                                    <i class="glyphicon glyphicon-search"></i> Cari Pasien Lainnya</button>
                                            </div>
                                        </div>
                                    </div-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" class="form-control" name="id_daftar" id="id_daftar" value="">
                                            <input type="hidden" class="form-control" name="reg_unit" id="reg_unit" value="">
                                            <input type="hidden" class="form-control" name="nomr" id="nomr" value="">
                                            <input type="hidden" class="form-control" name="nama_pasien" id="nama_pasien" value="">
                                            <input type="hidden" class="form-control" name="jns_kelamin" id="jns_kelamin" value="">
                                            <input type="hidden" class="form-control" id="v_jns_kelamin" value="">
                                            <input type="hidden" class="form-control" name="tgl_lahir" id="tgl_lahir" value="">
                                            <input type="hidden" class="form-control" name="umur" id="umur" value="">
                                            <input type="hidden" class="form-control" name="id_ruang" id="id_ruang" value="">
                                            <input type="hidden" class="form-control" name="nama_ruang" id="nama_ruang" value="">
                                            <input type="hidden" class="form-control" name="id_kelas" id="id_kelas" value="0">
                                            <input type="hidden" class="form-control" name="kelas_layanan" id="kelas_layanan" value="">

                                            <input type="hidden" class="form-control" name="jns_layanan" id="jns_layanan" value="">
                                            <!--div class="alert alert-warning alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                                                Sebelum pasien didaftarkan ke ruangan rawat inap silahkan Isi informasi data pasien keluar terlebih dahulu
                                            </div-->
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Tanggal Masuk / Tanggal Keluar <span style="color: red"> * </span></label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input readonly="" type="text" class="form-control" name="tgl_masuk" id="tgl_masuk">
                                                        <div class="input-group-btn" style="width: 50%">
                                                            <input readonly="" type="text" class="form-control tanggal" name="tgl_keluar" id="tgl_keluar" placeholder="__-__-____">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">LOS (Hari) / Jenis Layanan</label>
                                                <div class="col-md-6">
                                                    <div class="input-group ">
                                                        <input type="text" class="form-control" name="los" id="los">
                                                        <div class="input-group-btn" style="width: 50%">
                                                            <input readonly="" type="text" class="form-control" name="jns_layanan" id="jns_layanan">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Cara Keluar <span style="color: red"> * </span></label>
                                                <div class="col-md-3">
                                                    <select name="id_cara_keluar" id="id_cara_keluar" class="form-control">
                                                        <?php foreach ($getCaraKeluar->result_array() as $xCP) : ?>
                                                            <option value="<?php echo $xCP['idx'] ?>"><?php echo $xCP['cara_keluar'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Dokter Penanggung Jawab <span style="color: red"> * </span></label>
                                                <div class="col-md-3">

                                                    <select name="dpjp" id="dpjp" class="form-control" style="width: 100%;">
                                                        <option value=""></option>
                                                        <?php foreach ($getDokter->result_array() as $xD) : ?>
                                                            <option value="<?php echo $xD['NRP'] ?>"><?php echo $xD['pgwNama'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Keadaan Keluar <span style="color: red"> * </span></label>
                                                <div class="col-md-3">
                                                    <select name="id_keadaan_keluar" id="id_keadaan_keluar" class="form-control">
                                                        <?php foreach ($getKeadaanKeluar->result_array() as $xKK) : ?>
                                                            <option value="<?php echo $xKK['idx'] ?>"><?php echo $xKK['keadaan_keluar'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Jenis Kunjungan <span style="color: red"> * </span></label>
                                                <div class="col-md-3">

                                                    <select name="jns_kunjungan" id="jns_kunjungan" class="form-control">
                                                        <option value="0">Pasien Baru</option>
                                                        <option value="1">Pasien Lama</option>
                                                    </select>
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Cara Bayar <span style="color: red"> * </span></label>
                                                <div class="col-md-3">
                                                    <select name="id_cara_bayar" id="id_cara_bayar" class="form-control">
                                                        <?php foreach ($getCaraBayar->result_array() as $xCB) : ?>
                                                            <option value="<?php echo $xCB['idx'] ?>"><?php echo $xCB['cara_bayar'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">No Kartu / No.Jaminan <span style="color: red"> * </span> [<em>Jika Cara Bayar Bukan Umum</em>]</label>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name="no_bpjs" id="no_bpjs" value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name="no_jaminan" id="no_jaminan" value="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Tindakan Pelayanan <span style="color: red"> * </span></label>
                                                <div class="col-md-3">
                                                    <select name="id_tindakan_pelayanan" id="id_tindakan_pelayanan" class="form-control" style="width:100%">
                                                        <option value=""></option>
                                                        <?php foreach ($getJenisPelayanan->result_array() as $xJP) : ?>
                                                            <option value="<?php echo $xJP['idx'] ?>"><?php echo $xJP['jenis_pelayanan'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Kasus Penyakit <span style="color: red"> * </span></label>
                                                <div class="col-md-3">
                                                    <select name="kasus_penyakit" id="kasus_penyakit" class="form-control">
                                                        <option value="0">Kasus Baru</option>
                                                        <option value="1">Kasus Lama</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <fieldset>
                                                <legend>Diagnosa Utama</legend>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">ICD 10 <span style="color: red"> * </span> [<em>Bridging E-Klaim</em>]</label>
                                                    <div class="col-md-3">
                                                        <input type="hidden" name="ada" id="ada" value="0">
                                                        <input type="text" class="form-control ui-autocomplete-input" name="kode_icd" id="kode_icd" autocomplete="off">
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control ui-autocomplete-input" name="icd" id="icd" autocomplete="off">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">DTD <span style="color: red"> * </span></label>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control ui-autocomplete-input" name="dtd" id="dtd" autocomplete="off">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Group ICD <span style="color: red"> * </span></label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control ui-autocomplete-input" name="grup_icd" id="grup_icd" autocomplete="off">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Morbiditas <span style="color: red"> * </span></label>
                                                    <div class="col-md-8">
                                                        <input readonly type="text" class="form-control" name="morbiditas" id="morbiditas">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Kecelakaan <span style="color: red"> * </span></label>
                                                    <div class="col-md-6">
                                                        <input type="hidden" class="form-control" name="kecelakaan" id="kecelakaan" value="">
                                                        <input readonly type="text" class="form-control" id="viewkecelakaan">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Diagnosa Sekunder</legend>
                                                <div id="diagnosa_sekunder">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">ICD 10 <span style="color: red"> * </span> [<em>Diagnosa Sekunder</em>]</label>

                                                        <div class="col-md-10">
                                                            <input type="hidden" name="jml" id="jml" value="0">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control ui-autocomplete-input kode_icd_sec" name="kode_icd_sec" id="kode_icd_sec" autocomplete="off">
                                                                <div class="input-group-btn">
                                                                    <button type="button" id="btn_add_diagnosa" class="btn btn-default" onclick="add_diagnosa('','')">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                            </fieldset>

                                            <div class="form-group">
                                                <label class="col-md-2 ">&nbsp;</label>
                                                <div class="col-md-10">
                                                    <div class="input-group" id="btnExec">
                                                        <button type="button" class="btn btn-primary" id="btnBatal">
                                                            <i class="glyphicon glyphicon-new-window"></i> Batal</button>
                                                        <button type="button" class="btn btn-danger" id="submit" onclick="simpan()">
                                                            <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                                                        <button type="button" class="btn btn-primary" id="btnCariPasienLainnya">
                                                            <i class="glyphicon glyphicon-search"></i> Cari Pasien Lainnya</button>
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
            </div>
        </div>
</section>

<script src="<?php echo base_url() ?>assets/jquery/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/jquery/js/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var id_ruang = '<?php echo $ruangID ?>';
        $('#dpjp,#id_tindakan_pelayanan').select2({
            placeholder: 'Pilih Option'
        });
        $('.tanggal').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy"
        });
        $('input').focus(function() {
            return this.select();
        });
        $('#btnKembali').click(function() {
            var a = '<?php echo $ruangID ?>';
            var url = '<?php echo base_url() . 'mr_dokumen.php/informasi_pasien_keluar/data_informasi_pasien_keluar?kLok=' ?>' + a;
            window.location.href = url;
        });
        $('#btnBatal').click(function() {
            var a = '<?php echo $ruangID ?>';
            var url = '<?php echo base_url() . 'mr_dokumen.php/informasi_pasien_keluar/data_informasi_pasien_keluar?kLok=' ?>' + a;
            window.location.href = url;
        });
        $('#btnCariPasienLainnya').click(function() {
            $('#txtNomor').val('');
            $('#divCariPasien').show();
            $('#divTabelPendaftaranPasien').hide();
            $('#divDataPasien').hide();
            $('#txtNomor').focus();
        });

        $('#cariPasien').click(function() {
            var a = '<?php echo $ruangID ?>';
            var b = $('#txtNomor').val();
            if (a == "") {
                alert("Kode ruang tidak ditemukan. Silahkan pilih ruang yang akan memulangkan pasien");
            } else if (b == "") {
                alert("Nomor yang akan di cari masih kosong");
            } else {
                $.ajax({
                    url: "<?php echo base_url() . 'mr_dokumen.php/informasi_pasien_keluar/getViewDataKunjunganPasien' ?>",
                    type: "POST",
                    data: $('#formCariPasien').serialize(),
                    beforeSend: function() {
                        $('tbody#getDataKunjunganPasien').html("<tr><td colspan=7><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                    },
                    success: function(data) {
                        $('tbody#getDataKunjunganPasien').html(data);
                        $('#divTabelPendaftaranPasien').show();
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(jqXHR.responseText);
                    }
                });
            }
        });

        $('#txtNomor').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                var a = '<?php echo $ruangID ?>';
                var b = $('#txtNomor').val();
                if (a == "") {
                    alert("Kode ruang tidak ditemukan. Silahkan pilih ruang yang akan memulangkan pasien");
                } else if (b == "") {
                    alert("Nomor yang akan di cari masih kosong");
                } else {
                    $.ajax({
                        url: "<?php echo base_url() . 'mr_dokumen.php/informasi_pasien_keluar/getViewDataKunjunganPasien' ?>",
                        type: "POST",
                        data: $('#formCariPasien').serialize(),
                        beforeSend: function() {
                            $('tbody#getDataKunjunganPasien').html("<tr><td colspan=7><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                        },
                        success: function(data) {
                            $('tbody#getDataKunjunganPasien').html(data);
                            $('#divTabelPendaftaranPasien').show();
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(jqXHR.responseText);
                        }
                    });
                }
            }
        });

        $("#kode_icd").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?php echo base_url() . 'api.php/eklaim/main/getICD' ?>",
                        dataType: "JSON",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data.slice(0, 15));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#kode_icd").val(ui.item['label']);
                    $("#icd").val(ui.item['value']);
                    $("#kode_icd").removeClass("ui-autocomplete-loading");
                    return false;
                },
                select: function(event, ui) {
                    $("#kode_icd").val(ui.item['label']);
                    $("#icd").val(ui.item['value']);
                    $("#kode_icd").removeClass("ui-autocomplete-loading");
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['label'] + "</td><td style='width:300px'>" + item['value'] + "</td>")
                    .appendTo(table);
            };

        $("#icd").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?php echo base_url() . 'api.php/eklaim/main/getICD' ?>",
                        dataType: "JSON",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data.slice(0, 15));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#kode_icd").val(ui.item['label']);
                    $("#icd").val(ui.item['value']);
                    $("#icd").removeClass("ui-autocomplete-loading");
                    return false;
                },
                select: function(event, ui) {
                    $("#kode_icd").val(ui.item['label']);
                    $("#icd").val(ui.item['value']);
                    $("#icd").removeClass("ui-autocomplete-loading");
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['label'] + "</td><td style='width:300px'>" + item['value'] + "</td>")
                    .appendTo(table);
            };

        $("#dtd").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?php echo base_url() . 'mr_dokumen.php/informasi_pasien_keluar/getDTD' ?>",
                        dataType: "JSON",
                        data: {
                            term: request.term
                        },
                        type: "POST",
                        success: function(data) {
                            response(data.slice(0, 10));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#dtd").val(ui.item['DTD']);
                    $("#grup_icd").val(ui.item['Grup_ICD']);
                    $("#morbiditas").val(ui.item['Morbiditas']);
                    $("#kecelakaan").val(ui.item['kecelakaan']);
                    $("#viewkecelakaan").val((ui.item['kecelakaan'] == '1') ? 'Kecelakaan' : 'Bukan Kecelakaan');
                    return false;
                },
                select: function(event, ui) {
                    $("#dtd").val(ui.item['DTD']);
                    $("#grup_icd").val(ui.item['Grup_ICD']);
                    $("#morbiditas").val(ui.item['Morbiditas']);
                    $("#kecelakaan").val(ui.item['kecelakaan']);
                    $("#viewkecelakaan").val((ui.item['kecelakaan'] == '1') ? 'Kecelakaan' : 'Bukan Kecelakaan');
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['DTD'] + "</td><td style='width:100px'>" + item['Morbiditas'] + "</td><td style='width:100px'>" + item['Grup_ICD'] + "</td><td style='width:30px'>" + item['kecelakaan'] + "</td>")
                    .appendTo(table);
            };

        $("#grup_icd").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?php echo base_url() . 'mr_dokumen.php/informasi_pasien_keluar/getDTD' ?>",
                        dataType: "JSON",
                        data: {
                            term: request.term
                        },
                        type: "POST",
                        success: function(data) {
                            response(data.slice(0, 10));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#dtd").val(ui.item['DTD']);
                    $("#grup_icd").val(ui.item['Grup_ICD']);
                    $("#morbiditas").val(ui.item['Morbiditas']);
                    $("#kecelakaan").val(ui.item['kecelakaan']);
                    $("#viewkecelakaan").val((ui.item['kecelakaan'] == '1') ? 'Kecelakaan' : 'Bukan Kecelakaan');
                    return false;
                },
                select: function(event, ui) {
                    $("#dtd").val(ui.item['DTD']);
                    $("#grup_icd").val(ui.item['Grup_ICD']);
                    $("#morbiditas").val(ui.item['Morbiditas']);
                    $("#kecelakaan").val(ui.item['kecelakaan']);
                    $("#viewkecelakaan").val((ui.item['kecelakaan'] == '1') ? 'Kecelakaan' : 'Bukan Kecelakaan');
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['DTD'] + "</td><td style='width:100px'>" + item['Morbiditas'] + "</td><td style='width:100px'>" + item['Grup_ICD'] + "</td><td style='width:30px'>" + item['kecelakaan'] + "</td>")
                    .appendTo(table);
            };
        $("#kode_icd_sec").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?php echo base_url() . 'api.php/eklaim/main/getICD' ?>",
                        dataType: "JSON",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data.slice(0, 15));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#kode_icd_sec").removeClass("ui-autocomplete-loading");
                    return false;
                },
                select: function(event, ui) {
                    $("#kode_icd_sec").removeClass("ui-autocomplete-loading");
                    add_diagnosa(ui.item['label'], ui.item['value'], ui.item['ada']);
                    $('#kode_icd_sec').val("");
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['label'] + "</td><td style='width:300px'>" + item['value'] + "</td>")
                    .appendTo(table);
            };
    });

    function dateIndo(today) {
        // 2008-04-01
        var date = today.substr(0, 10);
        var nDate = date.slice(8, 10) + '-' + date.slice(5, 7) + '-' + date.slice(0, 4);
        return nDate;
    }

    function dateEng(today) {
        var date = today.substr(0, 10);
        var nDate = date.slice(6, 10) + '-' + date.slice(3, 5) + '-' + date.slice(0, 2);
        return nDate;
    }

    function pilihPasien(a) {
        $.ajax({
            url: "<?php echo base_url() . 'mr_dokumen.php/informasi_pasien_keluar/getDataKunjunganPasien' ?>",
            type: "POST",
            data: {
                reg_unit: a
            },
            dataType: "JSON",
            success: function(data) {
                if (data.jns_kelamin == '1' || data.jns_kelamin == "L") var img = "<img src='<?= base_url() ?>assets/images/male.png'/>";
                else var img = "<img src='<?= base_url() ?>assets/images/female.png'/>";
                $('#lbljekel').html(img);
                $('#lbl_nama_pasien').html(data.nama_pasien);
                $('#lblnoka').html(data.no_ktp);
                $('#lblnomr').html(data.nomr);
                var tglLahir = dateIndo(data.tgl_lahir);
                $('#lblttl').html(data.tempat_lahir + " / " + tglLahir);
                $('#lbliddaftar').html(data.id_daftar);
                $('#lblreg_unit').html(data.reg_unit);
                $('#lblkelaslayanan').html(data.kelas_layanan);
                $('#lblcarabayar').html(data.cara_bayar);
                $('#lblruang').html(data.nama_ruang);
                $('#lbldpjp').html(data.namaDokterJaga);

                $('#id_daftar').val(data.id_daftar);
                $('#reg_unit').val(data.reg_unit);
                $('#nomr').val(data.nomr);
                $('#nama_pasien').val(data.nama_pasien);
                var jenkel = (data.jns_kelamin == '1') ? 'Laki-Laki' : 'Perempuan';

                $('#jns_kelamin').val(data.jns_kelamin);
                $('#v_jns_kelamin').val(jenkel);

                $('#tgl_lahir').val(tglLahir);
                $('#id_ruang').val(data.id_ruang);
                $('#nama_ruang').val(data.nama_ruang);

                $('#jns_layanan').val(data.jns_layanan);
                $('#los').val((data.jns_layanan == 'RJ' || data.jns_layanan == 'GD') ? 1 : '');

                $('#id_kelas').val(data.id_kelas);
                $('#kelas_layanan').val(data.kelas_layanan);

                $('#umur').val(data.umur);
                var tglMasuk = dateIndo(data.tgl_masuk);
                $('#tgl_masuk').val(tglMasuk);
                $('#tgl_keluar').val((data.jns_layanan == 'RJ' || data.jns_layanan == 'GD') ? tglMasuk : '');

                $('#id_cara_bayar').val(data.id_cara_bayar);

                $('#no_bpjs').val(data.no_bpjs);
                $('#no_jaminan').val(data.no_jaminan);

                $('#id_cara_keluar').prop('selectedIndex', 0);
                $('#dpjp').val('').trigger('change');
                $('#id_keadaan_keluar').prop('selectedIndex', 0);
                $('#jns_kunjungan').prop('selectedIndex', 0);
                $('#kasus_penyakit').prop('selectedIndex', 0);
                $('#id_tindakan_pelayanan').val('').trigger('change');
                $('#kode_icd').val('');
                $('#icd').val('');
                $('#dtd').val('');
                $('#grup_icd').val('');
                $('#morbiditas').val('');
                $('#kecelakaan').val('');

                $('#divTabelPendaftaranPasien').hide();
                $('#divCariPasien').hide();
                $('#divDataPasien').show();
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
        $('#tgl_masuk, #tgl_keluar').on('change textInput input', function() {
            if (($("#tgl_masuk").val() != "") && ($("#tgl_keluar").val() != "")) {
                var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                var firstDate = new Date(dateEng($("#tgl_masuk").val()));
                var secondDate = new Date(dateEng($("#tgl_keluar").val()));
                var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
                if (diffDays < 0) {
                    $("#los").val('');
                    $("#tgl_keluar").val('');
                    alert('Tanggal keluar tidak boleh lebih rendah dari tanggal masuk');
                } else {
                    $("#los").val(diffDays + 1);
                }
            }
        });
    }

    /*function simpan() {
        var formData = {};
        formData['id_daftar'] = $('#id_daftar').val();
        formData['reg_unit'] = $('#reg_unit').val();
        formData['nomr'] = $('#nomr').val();
        formData['nama_pasien'] = $('#nama_pasien').val();
        formData['jns_kelamin'] = $('#jns_kelamin').val();
        formData['tgl_lahir'] = $('#tgl_lahir').val();
        formData['umur'] = $('#umur').val();
        formData['id_ruang'] = $('#id_ruang').val();
        formData['nama_ruang'] = $('#nama_ruang').val();
        formData['los'] = $('#los').val();
        formData['id_kelas'] = $('#id_kelas').val();
        formData['kelas_layanan'] = $('#kelas_layanan').val();
        formData['tgl_masuk'] = $('#tgl_masuk').val();
        formData['tgl_keluar'] = $('#tgl_keluar').val();
        formData['id_cara_keluar'] = $('#id_cara_keluar').val();
        formData['cara_keluar'] = $('#id_cara_keluar :selected').html();
        formData['dpjp'] = $('#dpjp').val();
        formData['nama_dpjp'] = $('#dpjp :selected').html();
        formData['id_keadaan_keluar'] = $('#id_keadaan_keluar').val();
        formData['keadaan_keluar'] = $('#id_keadaan_keluar :selected').html();
        formData['kode_icd'] = $('#kode_icd').val();
        formData['icd'] = $('#icd').val();
        formData['dtd'] = $('#dtd').val();
        formData['grup_icd'] = $('#grup_icd').val();
        formData['morbiditas'] = $('#morbiditas').val();
        formData['kecelakaan'] = $('#kecelakaan').val();
        formData['jns_layanan'] = $('#jns_layanan').val();
        formData['jns_kunjungan'] = $('#jns_kunjungan').val();
        formData['kasus_penyakit'] = $('#kasus_penyakit').val();
        formData['id_cara_bayar'] = $('#id_cara_bayar').val();
        formData['cara_bayar'] = $('#id_cara_bayar :selected').html();
        formData['no_bpjs'] = $('#no_bpjs').val();
        formData['no_jaminan'] = $('#no_jaminan').val();
        formData['id_tindakan_pelayanan'] = $('#id_tindakan_pelayanan').val();
        formData['tindakan_pelayanan'] = $('#id_tindakan_pelayanan :selected').html();

        if (formData['id_daftar'] == "") {
            alert('Ops. No.Reg RS kosong. Silahkan pilih pasien dan pastikan No.Reg RS tampil');
        } else if (formData['tgl_masuk'] == "") {
            alert('Ops. Tanggal masuk kosong. Silahkan pilih pasien dan pastikan tanggal masuk tampil');
        } else if (formData['tgl_keluar'] == "") {
            alert('Ops. Tanggal keluar kosong. Silahkan isi tanggal keluar pasien');
            $('#tgl_keluar').focus();
        } else if (formData['nomr'] == "") {
            alert('Ops. No.MR kosong. Silahkan pilih pasien dan pastikan No.MR tampil');
        } else if (formData['id_cara_keluar'] == "") {
            alert('Ops. Cara keluar kosong. Silahkan pilih option cara keluar');
            $('#id_cara_keluar').focus();
        } else if (formData['dpjp'] == "") {
            alert('Ops. DPJP kosong. Silahkan pilih option Dokter Penanggung Jawab');
            $('#dpjp').focus();
        } else if (formData['id_tindakan_pelayanan'] == "") {
            alert('Ops. Tindakan pelayanan kosong.  Silahkan pilih option tindakan pelayanan.');
            $('#id_tindakan_pelayanan').focus();
        } else if (formData['kode_icd'] == "") {
            alert('Ops. Kode ICD kosong.  Silahkan isi Kode ICD.');
            $('#kode_icd').focus();
        } else if (formData['icd'] == "") {
            alert('Ops. ICD kosong.  Silahkan isi ICD.');
            $('#icd').focus();
        } else if (formData['dtd'] == "") {
            alert('Ops. No.DTD kosong.  Silahkan isi No.DTD.');
            $('#dtd').focus();
        } else if (formData['morbiditas'] == "") {
            alert('Ops. Morbiditas kosong.  Pastikan morbiditas terisi.');
            $('#dtd').focus();
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'mr_dokumen.php/informasi_pasien_keluar/simpan' ?>",
                type: "POST",
                data: formData,
                dataType: "JSON",
                success: function(data) {
                    alert(data.message);
                    if (data.code == 200) {
                        $('#divCariPasien').show();
                        $('#divTabelPendaftaranPasien').hide();
                        $('#divDataPasien').hide();
                    }
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        }
    }
    */
    function simpan() {
        let icd = [];
        $("input[name='index_icd[]']").each(function(index) {
            var index_icd = $(this).val()
            icd.push({
                kode: $('#kode_icd_sec' + index_icd).val(),
                icd: $('#icd_sec' + index_icd).val(),
                ada: $('#ada' + index_icd).val()
            });
        });
        //console.log(icd);
        //return false;
        var formData = {};
        formData['id_daftar'] = $('#id_daftar').val();
        formData['reg_unit'] = $('#reg_unit').val();
        formData['nomr'] = $('#nomr').val();
        formData['nama_pasien'] = $('#nama_pasien').val();
        formData['jns_kelamin'] = $('#jns_kelamin').val();
        formData['tgl_lahir'] = $('#tgl_lahir').val();
        formData['umur'] = $('#umur').val();
        formData['id_ruang'] = $('#id_ruang').val();
        formData['nama_ruang'] = $('#nama_ruang').val();
        formData['los'] = $('#los').val();
        formData['id_kelas'] = $('#id_kelas').val();
        formData['kelas_layanan'] = $('#kelas_layanan').val();
        formData['tgl_masuk'] = $('#tgl_masuk').val();
        formData['tgl_keluar'] = $('#tgl_keluar').val();
        formData['id_cara_keluar'] = $('#id_cara_keluar').val();
        formData['cara_keluar'] = $('#id_cara_keluar :selected').html();
        formData['dpjp'] = $('#dpjp').val();
        formData['nama_dpjp'] = $('#dpjp :selected').html();
        formData['id_keadaan_keluar'] = $('#id_keadaan_keluar').val();
        formData['keadaan_keluar'] = $('#id_keadaan_keluar :selected').html();
        formData['kode_icd'] = $('#kode_icd').val();
        formData['icd'] = $('#icd').val();
        formData['ada'] = $('#ada').val();
        formData['dtd'] = $('#dtd').val();
        formData['grup_icd'] = $('#grup_icd').val();
        formData['morbiditas'] = $('#morbiditas').val();
        formData['kecelakaan'] = $('#kecelakaan').val();
        formData['jns_layanan'] = $('#jns_layanan').val();
        formData['jns_kunjungan'] = $('#jns_kunjungan').val();
        formData['kasus_penyakit'] = $('#kasus_penyakit').val();
        formData['id_cara_bayar'] = $('#id_cara_bayar').val();
        formData['cara_bayar'] = $('#id_cara_bayar :selected').html();
        formData['no_bpjs'] = $('#no_bpjs').val();
        formData['no_jaminan'] = $('#no_jaminan').val();
        formData['id_tindakan_pelayanan'] = $('#id_tindakan_pelayanan').val();
        formData['icd_sec'] = icd;
        formData['tindakan_pelayanan'] = $('#id_tindakan_pelayanan :selected').html();

        if (formData['id_daftar'] == "") {
            alert('Ops. No.Reg RS kosong. Silahkan pilih pasien dan pastikan No.Reg RS tampil');
        } else if (formData['tgl_masuk'] == "") {
            alert('Ops. Tanggal masuk kosong. Silahkan pilih pasien dan pastikan tanggal masuk tampil');
        } else if (formData['tgl_keluar'] == "") {
            alert('Ops. Tanggal keluar kosong. Silahkan isi tanggal keluar pasien');
            $('#tgl_keluar').focus();
        } else if (formData['nomr'] == "") {
            alert('Ops. No.MR kosong. Silahkan pilih pasien dan pastikan No.MR tampil');
        } else if (formData['id_cara_keluar'] == "") {
            alert('Ops. Cara keluar kosong. Silahkan pilih option cara keluar');
            $('#id_cara_keluar').focus();
        } else if (formData['dpjp'] == "") {
            alert('Ops. DPJP kosong. Silahkan pilih option Dokter Penanggung Jawab');
            $('#dpjp').focus();
        } else if (formData['id_tindakan_pelayanan'] == "") {
            alert('Ops. Tindakan pelayanan kosong.  Silahkan pilih option tindakan pelayanan.');
            $('#id_tindakan_pelayanan').focus();
        } else if (formData['kode_icd'] == "") {
            alert('Ops. Kode ICD kosong.  Silahkan isi Kode ICD.');
            $('#kode_icd').focus();
        } else if (formData['icd'] == "") {
            alert('Ops. ICD kosong.  Silahkan isi ICD.');
            $('#icd').focus();
        } else if (formData['dtd'] == "") {
            alert('Ops. No.DTD kosong.  Silahkan isi No.DTD.');
            $('#dtd').focus();
        } else if (formData['morbiditas'] == "") {
            alert('Ops. Morbiditas kosong.  Pastikan morbiditas terisi.');
            $('#dtd').focus();
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'mr_dokumen.php/informasi_pasien_keluar/simpan' ?>",
                type: "POST",
                data: formData,
                dataType: "JSON",
                success: function(data) {
                    alert(data.message);
                    location.reload();
                    $('#divCariPasien').show();
                    $('#divTabelPendaftaranPasien').hide();
                    $('#divDataPasien').hide();
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        }
    }

    function add_diagnosa(kode, icd, ada = 0) {
        var jml = $('#jml').val();
        var jml_icd = parseInt(jml) + 1;
        if (ada == 0) {
            kode = "";
            icd = "";
        }
        var control = '<div class="form-group" id="row' + jml + '">' +
            '<label class="col-md-2 control-label">&nbsp;</label>' +
            '<div class="col-md-3">' +
            '<input type="hidden" class="form-control" name="index_icd[]"  id="index_icd' + jml + '" value="' + jml + '">' +
            '<input type="hidden" class="form-control" name="ada' + jml + '"  id="ada' + jml + '" value="' + ada + '">' +
            '<input type="text" class="form-control" name="kode_icd_sec' + jml + '"  id="kode_icd_sec' + jml + '" value="' + kode + '">' +
            '</div>' +
            '<div class="col-md-7">' +
            '<div class="input-group input-group-sm">' +
            '<input type="text" class="form-control icd" name="icd_sec' + jml + '" id="icd_sec' + jml + '" value="' + icd + '">' +
            '<div class="input-group-btn">' +
            '<button type="button" id="btn_rem_diagnosa' + jml + '" class="btn btn-danger" onclick="remove_diagnosa(\'' + jml + '\')">' +
            '<i class="fa fa-trash"></i>' +
            '</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('#diagnosa_sekunder').append(control);
        $('#jml').val(jml_icd);

    }

    function remove_diagnosa(kode) {
        $('#row' + kode).remove();
    }
</script>