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
        overflow: scroll;
    }

    a.disabled {
        pointer-events: none;
        cursor: default;
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
                        <li class="active"><a href="#tab_1" data-toggle="tab">Data Kunjungan</a></li>
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
                        <div class="tab-pane active" id="tab_1">
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