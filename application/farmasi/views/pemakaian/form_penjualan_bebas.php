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
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="row">

        <div class="col-md-12 col-xs-12">
            <div class="box box-success">
                <div class="box-body">
                    <div class="row">

                        <?php

                        ?>
                        <div class="col-md-12">

                            <fieldset>
                                <?php
                                if (!empty($ruangAkses)) {
                                    $lokasi = $ruangAkses->NMLOKASI;
                                } else $lokasi = "";
                                ?>
                                <div class="divBlocking" *ngIf="blockContent" style="display:none">
                                    <div class="center">
                                        <span class="fa fa-spinner fa-spin"></span>
                                    </div>
                                </div>
                                <legend>Transaksi <b><span id="namalokasi"><?= $lokasi ?></span></b></legend>
                                <div id="transaksi" <?php if (empty($ruangAkses)) echo "style='display:none'"; ?>>
                                    <form action="<?= base_url() . "farmasi.php/pemakaian_obat/simpan"; ?>" method="POST" id="form" class="form-horizontal">
                                        <?php
                                        if (!empty($ruangAkses)) {
                                        ?>
                                            <input type="hidden" name="KDLOKASI" id="KDLOKASI" value="<?= $ruangAkses->KDLOKASI ?>">
                                            <input type="hidden" name="NMLOKASI" id="NMLOKASI" value="<?= $ruangAkses->NMLOKASI ?>">
                                            <input type="hidden" name="REG_UNIT" id="REG_UNIT" value="-">
                                            <input type="hidden" name="ID_DAFTAR" id="ID_DAFTAR" value="-">
                                            <input type="hidden" name="NOMR" id="NOMR" value="-">
                                            <input type="hidden" name="KDRUANGAN" id="KDRUANGAN" value="-">
                                            <input type="hidden" name="NMRUANGAN" id="NMRUANGAN" value="-">
                                            <input type="hidden" name="JNS_LAYANAN" id="JNS_LAYANAN" value="PJ">
                                            <input type="hidden" name="ID_CARA_BAYAR" id="ID_CARA_BAYAR" value="1">
                                            <input type="hidden" name="CARA_BAYAR" id="CARA_BAYAR" value="Umum">
                                            <input type="hidden" name="KDDOKTER" id="KDDOKTER" value="-">
                                            <input type="hidden" class="form-control" name="NORESEP" id="NORESEP" value="-">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="hidden" name="JNSRESEP" id="JNSRESEP" value="Resep Pulang">

                                                    <div class="form-group">
                                                        <label for="No resep" class="col-md-3 control-label">Nama Pasien</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="NMPASIEN" id="NMPASIEN">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="No resep" class="col-md-3 control-label">Nama Dokter</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="NMDOKTER" id="NMDOKTER" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Tanggal Resep" class="col-md-3 control-label">Tanggal Resep</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group date">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                                <input type="text" name="TGLRESEP" class="form-control pull-right tanggal" id="TGLRESEP">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Tanggal Resep" class="col-md-3 control-label">Tanggal Jual</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group date">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                                <input type="text" name="TGLJUAL" id="TGLJUAL" class="form-control pull-right tanggal" id="datepicker">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="No resep" class="col-md-3 control-label">Keterangan</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="KETJL" id="KETJL">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="temptable">
                                                <legend>Detail Transaksi</legend>

                                                <div class="form-group">
                                                    <!--div class="col-xs-2"><label>Barang <span style="color: red"> * </span></label></div-->
                                                    <div class="col-xs-12">
                                                        <div class="input-group input-group-sm col-sm-4">
                                                            <input type="hidden" name="jmldata" id="jmldata" value="1748">
                                                            <!--input type="text" name="keyword" id="keyword" class="form-control" placeholder="Cari Barang" onkeyup="getBarangjual(0)" onkeydown="enter_keyword(event)" -->
                                                            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Cari Barang">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-danger" type="button" id="ADDBARANG1" onclick="cariBarangjual(0,'1')"><i class="fa fa-search"></i></button>
                                                            </div>
                                                        </div>
                                                        <div id="barang" class="popup-pencarian" style="display:none">
                                                            <div class="content-pencarian">
                                                                <input type="hidden" name="show_barang" id="show_barang" value="0">
                                                                <table class="table table-bordered table-striped table-hover">
                                                                    <thead class="bg-green">
                                                                        <tr>
                                                                            <td>Kode Obat</td>
                                                                            <td>Nama Obat / Alkes</td>
                                                                            <td>Stok</td>
                                                                            <td>Kategori</td>
                                                                            <td>Harga Jual &amp;</td>
                                                                            <td>#</td>
                                                                        </tr>

                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="padding: 0px;"><input type="text" name="qkode" id="qkode" class="form-control input-sm" onkeyup="getBarangjual(0,'1')" onkeydown="enter_kode(event)" placeholder="Masukkan Kode"></td>
                                                                            <td style="padding: 0px;"><input type="text" name="qnama" id="qnama" class="form-control input-sm" onkeyup="getBarangjual(0,'1')" onkeydown="enter_nama(event)" placeholder="Masukan Nama Barang"></td>
                                                                            <td style="padding: 0px;"><input type="text" name="qsatuan" id="qsatuan" class="form-control input-sm" onkeyup="getBarangjual(0,'1')" onkeydown="enter_satuan(event)" placeholder="Masukkan satuan"></td>
                                                                            <td style="padding: 0px;"><input type="text" name="qkategori" id="qkategori" class="form-control input-sm" onkeyup="getBarangjual(0,'1')" onkeydown="enter_kategori(event)" placeholder="Masukkan Kategori"></td>
                                                                            <td colspan="2"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <tbody id="data-barang">

                                                                    </tbody>
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

                                                <table class="table table-bordered table-striped" id="list-temp">
                                                    <thead class="bg-green">
                                                        <tr>
                                                            <th>Nama Obat / Alkes</th>
                                                            <th>Stok</th>
                                                            <th>Harga Jual</th>
                                                            <th>Jumlah</th>
                                                            <th>Diskon</th>
                                                            <th>R</th>
                                                            <th>Total</th>
                                                            <th>Aturan Pakai</th>
                                                            <th width="50px">#</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody id="getTemp">
                                                        <tr>
                                                            <td colspan="9">Data tidak ditemukan</td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="7" style="text-align: right;"><b>Grand Total</b></td>
                                                            <td colspan="2">
                                                                <div class="input-group-sm">
                                                                    <input readonly="" type="text" name="GRANDTOTAL" id="GRANDTOTAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="form-group">
                                                    <div class="">
                                                        <div class="col-xs-12 text-right">
                                                            <!--input type="submit" value="Simpan" id="test"-->
                                                            <button type="button" class="btn btn-primary" id="simpan">Simpan</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                            echo "Anda Tidak Punya Hak Akses";
                                        }
                                        ?>


                                    </form>
                                    <div class="row">
                                        <div id="formobat" style="display: none;">
                                            <div class="container-fluid">
                                                <form id="form2" action="#" method="post" onsubmit="return false">
                                                    <div class="row">
                                                        <!--form id="form" method="POST" action=""-->
                                                        <div class="col-md-6" id="databarang">
                                                            <fieldset>
                                                                <legend>Data Barang</legend>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-xs-3 text-right"><label>Nama Barang </label></div>
                                                                        <div class="col-xs-9">

                                                                            <input type="hidden" name="KDBRG" id="KDBRG" value="">
                                                                            <input type="text" readonly name="NMBRG" id="NMBRG" class="form-control" value="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-xs-3 text-right"><label>Stok </label></div>
                                                                        <div class="col-xs-9">
                                                                            <div class="input-group-sm">
                                                                                <input readonly type="text" name="JSTOK" id="JSTOK" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-xs-3 text-right"><label>Harga Jual </label></div>
                                                                        <div class="col-xs-9">
                                                                            <div class="input-group-sm">
                                                                                <input type="text" name="HJUAL" id="HJUAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group" id="obatpulang">
                                                                    <div class="row">
                                                                        <div class="col-xs-3 text-right"><label>Jumlah </label></div>
                                                                        <div class="col-xs-9">
                                                                            <div class="input-group-sm">
                                                                                <input type="text" name="JMLJUAL" id="JMLJUAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div id="obatharian" style="display: none;">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xs-3 text-right"><label>Jenis Obat <span style="color: red"> * </span></label></div>
                                                                            <div class="col-xs-9">
                                                                                <select name="jns_obat" id="jns_obat" class="form-control">
                                                                                    <option value="1" selected>Obat Dalam</option>
                                                                                    <option value="2">Obat Mandiri</option>
                                                                                    <option value="3">Obat Injeksi</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="jns_obat obatdalam">
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-xs-3 text-right"><label>Sebelum Makan</label></div>
                                                                                <div class="col-xs-3">
                                                                                    <input type="text" name="sbm_pagi" id="sbm_pagi" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;" placeholder="Pagi">
                                                                                </div>
                                                                                <div class="col-xs-3">
                                                                                    <input type="text" name="sbm_siang" id="sbm_siang" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;" placeholder="Siang">
                                                                                </div>
                                                                                <div class="col-xs-3">
                                                                                    <input type="text" name="sbm_malam" id="sbm_malam" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;" placeholder="Malam">
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-xs-3 text-right"><label>Setelah Makan</label></div>
                                                                                <div class="col-xs-3">
                                                                                    <input type="text" name="stm_pagi" id="stm_pagi" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;" placeholder="Pagi">
                                                                                </div>
                                                                                <div class="col-xs-3">
                                                                                    <input type="text" name="stm_siang" id="stm_siang" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;" placeholder="Siang">
                                                                                </div>
                                                                                <div class="col-xs-3">
                                                                                    <input type="text" name="stm_malam" id="stm_malam" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;" placeholder="Malam">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-xs-3 text-right"><label>Malam</label></div>
                                                                                <div class="col-xs-3">
                                                                                    <input type="text" name="malam" id="malam" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;" placeholder="Jam 22:00">
                                                                                </div>
                                                                                <div class="col-xs-3">
                                                                                    <select name="satuanAPharian" id="satuanAPharian" class="form-control">
                                                                                        <option value="1">Tablet</option>
                                                                                        <option value="2">Bungkus</option>
                                                                                        <option value="3">Sdk Obat</option>
                                                                                        <option value="4">Kapsul</option>
                                                                                        <option value="5">Unit</option>
                                                                                        <option value="6">CC</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    <div class="jns_obat obatinjeksi" style="display: none;">
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-xs-3 text-right"><label>Obat Injeksi</label></div>
                                                                                <div class="col-xs-3">
                                                                                    <input type="text" name="injeksi" id="injeksi" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;" placeholder="Obat Injeksi">
                                                                                </div>
                                                                                <div class="col-xs-6">
                                                                                    <input type="text" name="ap_injeksi" id="ap_injeksi" class="form-control" placeholder="Aturan Pakai Obat Injeksi">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="jns_obat obatmandiri" style="display: none;">
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-xs-3 text-right"><label>Obat Mandiri</label></div>
                                                                                <div class="col-xs-3">
                                                                                    <input type="text" name="mandiri" id="mandiri" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;" placeholder="Obat mandiri">
                                                                                </div>
                                                                                <div class="col-xs-6">
                                                                                    <input type="text" name="ap_mandiri" id="ap_mandiri" class="form-control" placeholder="Aturan Pakai Obat Mandiri">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <!--div class="form-group">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-3 text-right"><label>Diskon </label></div>
                                                                                        <div class="col-xs-4">
                                                                                            <div class="input-group input-group-sm">
                                                                                                <input type="text" name="DISKON_P" id="DISKON_P" maxlength="3" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;">
                                                                                                <div class="input-group-btn input-group-sm">
                                                                                                    <button class="btn btn-sm">%</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-xs-5">
                                                                                            <div class="input-group-sm">
                                                                                                <input type="text" name="DISKON" id="DISKON" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;">
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div-->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-xs-3 text-right"><label>R </label></div>
                                                                        <div class="col-xs-9">
                                                                            <div class="input-group-sm">
                                                                                <input type="hidden" name="DISKON_P" id="DISKON_P" value="0">
                                                                                <input type="hidden" name="DISKON" id="DISKON" value="0">
                                                                                <input readonly="" type="text" name="R" id="R" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;" value="<?= NILAI_R ?>">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-xs-3 text-right"><label>Total </label></div>
                                                                        <div class="col-xs-9">
                                                                            <div class="input-group-sm">
                                                                                <input readonly="" type="text" name="SUBTOTAL" id="SUBTOTAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-6" id="aturanpakai">
                                                            <fieldset>
                                                                <legend>Aturan Pakai</legend>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-xs-3 text-right"><label>Jenis Obat <span style="color: red"> * </span></label></div>
                                                                        <div class="col-xs-9">
                                                                            <select name="jenis_obat" id="jenis_obat" class="form-control">
                                                                                <option value="1">Obat Dalam</option>
                                                                                <option value="2">Obat Luar</option>
                                                                                <option value="3">Obat Injeksi</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="group_1">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xs-3 text-right">
                                                                                <label>Periode (... X Sehari) <span style="color: red"> * </span></label>
                                                                            </div>
                                                                            <div class="col-xs-3">
                                                                                <input type="text" name="jmlHari" id="jmlHari" class="form-control" />
                                                                            </div>
                                                                            <div class="col-xs-3">
                                                                                <input type="text" name="jmlSatuanAP" id="jmlSatuanAP" class="form-control" />
                                                                            </div>
                                                                            <div class="col-xs-3">
                                                                                <div id="sap">
                                                                                    <select name="satuanAP" id="satuanAP" class="form-control">
                                                                                        <option value="1">Tablet</option>
                                                                                        <option value="2">Bungkus</option>
                                                                                        <option value="3">Sdk Obat</option>
                                                                                        <option value="4">Kapsul</option>
                                                                                        <option value="5">Unit</option>
                                                                                        <option value="6">CC</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div id="saplain" style="display: none;">
                                                                                    <div class="input-group">
                                                                                        <input type="text" name="saplainnya" id="saplainnya" class="form-control">
                                                                                        <div class="input-group-btn">
                                                                                            <button class="btn btn-danger" type="button" id="resetsaplainnya" onclick="resetSapLainnya()"><i class="fa fa-remove"></i></button>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xs-3 text-right">
                                                                                <label>Cara Pakai <span style="color: red"> * </span></label>
                                                                            </div>

                                                                            <div class="col-xs-9">
                                                                                <div id="cp">
                                                                                    <select name="cara_pakai" id="cara_pakai" class="form-control">

                                                                                    </select>
                                                                                </div>
                                                                                <div id="cplain" style="display: none;">
                                                                                    <div class="input-group">
                                                                                        <input type="text" name="cplainnya" id="cplainnya" class="form-control">
                                                                                        <div class="input-group-btn">
                                                                                            <button class="btn btn-danger" type="button" id="resetsaplainnya" onclick="resetCpLainnya()"><i class="fa fa-remove"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xs-3 text-right">
                                                                                <label>Waktu Pakai <span style="color: red"> * </span></label>
                                                                            </div>
                                                                            <div class="col-xs-3">
                                                                                <input type="text" name="waktu1" id="waktu1" class="form-control" />
                                                                            </div>
                                                                            <div class="col-xs-6">
                                                                                <div id="wppakai">
                                                                                    <select name="waktu3" id="waktu2" class="form-control">
                                                                                        <option value="1">Sebelum Makan</option>
                                                                                        <option value="2">Sesudah Makan</option>
                                                                                        <option value="3">Sewaktu Makan</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div id="wppakailain" style="display: none;">
                                                                                    <div class="input-group">
                                                                                        <input type="text" name="wppakailainnya" id="wppakailainnya" class="form-control">
                                                                                        <div class="input-group-btn">
                                                                                            <button class="btn btn-danger" type="button" id="resetwplainnya" onclick="reseWpPakaiLainnya()"><i class="fa fa-remove"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xs-3 text-right">
                                                                                <label>Keterangan Waktu Pakai <span style="color: red"> * </span></label>
                                                                            </div>
                                                                            <div class="col-xs-9">
                                                                                <div class="" id="wppakai3">
                                                                                    <select name="waktu3" id="waktu3" class="form-control">
                                                                                        <option value="1">Pagi</option>
                                                                                        <option value="2">Siang</option>
                                                                                        <option value="3">Malam</option>
                                                                                        <option value="4">Tiap 8 jam</option>
                                                                                        <option value="5">Tiap 12 jam</option>
                                                                                        <option value="6">Tiap 24 jam</option>
                                                                                        <option value="7">Pagi - Malam</option>
                                                                                        <option value="8">Pagi - Siang - Malam</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div id="wppakailain3" style="display: none;">
                                                                                    <div class="input-group">
                                                                                        <input type="text" name="wppakailainnya3" id="wppakailainnya3" class="form-control">
                                                                                        <div class="input-group-btn">
                                                                                            <button class="btn btn-danger" type="button" id="resetwplainnya3" onclick="reseWpPakaiLainnya3()"><i class="fa fa-remove"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xs-3 text-right">
                                                                                <label>Keterangan <span style="color: red"> * </span></label>
                                                                            </div>

                                                                            <div class="col-xs-9">
                                                                                <div id="ket">
                                                                                    <select name="keterangan" id="keterangan" class="form-control">

                                                                                    </select>
                                                                                </div>


                                                                                <div id="ketlain" style="display: none;">
                                                                                    <div class="input-group">
                                                                                        <input type="text" name="ketlainnya" id="ketlainnya" class="form-control">
                                                                                        <div class="input-group-btn">
                                                                                            <button class="btn btn-danger" type="button" id="resetketeranganlain" onclick="reseKeterangan()"><i class="fa fa-remove"></i></button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </fieldset>
                                                        </div>



                                                        <!--/form-->
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-3">&nbsp;</div>
                                                                <div class="col-md-9">

                                                                    <button id="simpanTemp" type="button" class="btn btn-success">
                                                                        <i class="fa fa-add"></i> Tambah</button>
                                                                    <button type="button" class="btn btn-danger" onclick="closeForm()">Close</button>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </fieldset>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/popper/popper.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/tooltip/tooltip.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        //kosongkanObjEntry();
        $(".inputmask").inputmask();
        kosongkanObjTemp();
        getTemp();
        emptyTemp();
        var jns_layanan = $('#JNS_LAYANAN').val();
        //alert(jns_layanan);
        if (jns_layanan == "RI") $('#pagi').focus();
        else $('#NORESEP').focus();

        $('.tanggal').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        });
        $('.tanggal').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy"
        });

        //event
        $('#NMPASIEN').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {

                var value = $('#NOMR').val();
                if (value == "") $('#NMPASIEN').focus();
                else {
                    $('#NMDOKTER').focus();
                }
            }
        });

        $('#NMDOKTER').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#TGLRESEP').focus();
            }
        });

        $('#TGLRESEP').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {

                var value = $('#TGLRESEP').val();
                if (value == "") $('#TGLRESEP').focus();
                else {
                    $('#TGLJUAL').focus();
                }
            }
        });

        $('#TGLJUAL').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {

                var value = $('#TGLJUAL').val();
                if (value == "") $('#TGLJUAL').focus();
                else {
                    $('#KETJL').focus();
                }
            }
        });

        $('#KETJL').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#keyword').focus();
            }
        });

        $('#jenis_obat').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var value = $('#jenis_obat').val();
                if (value == "") $('#jenis_obat').focus();
                else {
                    $('#jmlHari').focus();
                }
            }
        });
        $('#jenis_obat').change(function() {
            var jo = $('#jenis_obat').val();
            if (jo == 3) {
                $('#group_1').hide();
            } else {
                $('#group_1').show();
                getSatuan();
                getCarapakai();
                getWaktupakai();
            }

        });

        $('#jns_obat').change(function() {
            var jo = $('#jns_obat').val();
            $('.jns_obat').hide();
            if (jo == 1) {
                $('.obatdalam').show();
            } else if (jo == 2) {
                $('.obatmandiri').show();
            } else {
                $('.obatinjeksi').show();
            }

        });

        $('#jmlHari').change(function() {
            getWaktupakai();
        });

        $('#HJUAL').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var value = $('#HJUAL').val();
                if (value == "") $('#HJUAL').focus();
                else {
                    var jns_layanan = $('#JNS_LAYANAN').val();
                    if (jns_layanan == "RI") {
                        var jns = $("input[name='JNSRESEP']:checked").val();
                        if (jns == 'Resep Pulang') {
                            $('#JMLJUAL').focus();
                        } else {
                            $('#jns_obat').focus();
                        }
                    } else {
                        $('#JMLJUAL').focus();
                    }


                }
            }
        });

        $('#jns_obat').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var jns_obat = $('#jns_obat').val();

                if (jns_obat == 1) $('#sbm_pagi').focus();
                else if (jns_obat == 2) $('#mandiri').focus();
                else $('#injeksi').focus();

            }
        });



        $('#sbm_pagi').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#sbm_siang').focus();
            }
        });

        $('#sbm_siang').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#sbm_malam').focus();
            }
        });

        $('#sbm_malam').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#stm_pagi').focus();
            }
        });

        $('#stm_pagi').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#stm_siang').focus();
            }
        });
        $('#stm_siang').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#stm_malam').focus();
            }
        });
        $('#stm_malam').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#malam').focus();
            }
        });
        $('#malam').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#satuanAPharian').focus();
            }
        });
        $('#satuanAPharian').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#simpanTemp').focus();
            }
        });
        $('#injeksi').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#ap_injeksi').focus();
            }
        });
        $('#mandiri').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#ap_mandiri').focus();
            }
        });
        $('#ap_mandiri').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#simpanTemp').focus();
            }
        });
        $('#ap_injeksi').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#simpanTemp').focus();
            }
        });

        $('#JMLJUAL').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var value = $('#JMLJUAL').val();
                if (value == "" || value == "0") $('#JMLJUAL').focus();
                else {
                    $('#jenis_obat').focus();
                }
            }
        });

        $('#DISKON_P').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#DISKON').focus();
            }
        });



        $('#DISKON').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var jns_layanan = $('#JNS_LAYANAN').val();
                if (jns_layanan == "RI") {
                    var jns = $("input[name='JNSRESEP']:checked").val();
                    if (jns == 'Resep Pulang') {
                        $('#jenis_obat').focus();
                        $('#jenis_obat').trigger('change');
                    } else {
                        $('#simpanTemp').focus();

                    }
                } else {
                    $('#jenis_obat').focus();
                }

            }
        });

        $('#waktupakai').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#simpanTemp').focus();
            }
        });



        $('#jmlHari').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var value = $('#jmlHari').val();
                if (value == "") $('#jmlHari').focus();
                else {
                    $('#jmlSatuanAP').focus();
                    //alert('focus')
                }
            }
        });

        $('#jmlSatuanAP').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var value = $('#jmlSatuanAP').val();
                if (value == "") $('#jmlSatuanAP').focus();
                else {
                    $('#satuanAP').focus();
                }
            }
        });

        $('#satuanAP').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var value = $('#satuanAP').val();
                if (value == "") $('#satuanAP').focus();
                else {
                    if (value == 'Lainnya') {
                        $('#sap').hide();
                        $('#saplain').show();
                        $('#saplainnya').focus();
                    } else {
                        $('#cara_pakai').focus();
                    }
                }
            }
        });
        $('#saplainnya').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#cara_pakai').focus();
            }
        });
        $('#cplainnya').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#waktu1').focus();
            }
        });
        $('#wppakailainnya').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#waktu3').focus();
            }
        });
        $('#wppakailainnya3').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#keterangan').focus();
            }
        });
        $('#ketlainnya').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#simpanTemp').focus();
            }
        });
        $('#cara_pakai').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var value = $('#cara_pakai').val();
                if (value == "") $('#cara_pakai').focus();
                else {
                    if (value == 'Lainnya') {
                        $('#cp').hide();
                        $('#cplain').show();
                        $('#cplainnya').focus();
                    } else {
                        $('#waktu1').focus();
                    }

                }
            }
        });

        $('#waktu1').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var value = $('#waktu1').val();
                if (value == "") $('#waktu1').focus();
                else {

                    $('#waktu2').focus();
                }
            }
        });

        $('#waktu2').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var value = $('#waktu2').val();
                if (value == "") $('#waktu2').focus();
                else {
                    if (value == 'Lainnya') {
                        $('#wppakai').hide();
                        $('#wppakailain').show();
                        $('#wppakailainnya').focus();
                    } else {
                        $('#waktu3').focus();
                    }
                    //$('#waktu3').focus();
                }
            }
        });

        $('#waktu3').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var value = $('#waktu3').val();
                //alert(value);
                if (value == 'Lainnya') {
                    $('#wppakai3').hide();
                    $('#wppakailain3').show();
                    $('#wppakailainnya3').focus();
                } else {
                    $('#keterangan').focus();
                }

            }
        });

        $('#keterangan').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var value = $('#keterangan').val();
                if (value == 'Lainnya') {
                    $('#ket').hide();
                    $('#ketlain').show();
                    $('#ketlainnya').focus();
                } else {
                    $('#simpanTemp').focus();
                }

            }
        });

        $("#simpanTemp").click(function() {
            simpanTemp();
        });

        $('#HJUAL').keypress(function(ev) {
            calcSummary();
        });
        $('#sbm_pagi').keypress(function(ev) {
            calcSummary();
        });
        $('#sbm_siang').keypress(function(ev) {
            calcSummary();
        });
        $('#sbm_malam').keypress(function(ev) {
            calcSummary();
        });
        $('#stm_pagi').keypress(function(ev) {
            calcSummary();
        });
        $('#stm_siang').keypress(function(ev) {
            calcSummary();
        });
        $('#stm_malam').keypress(function(ev) {
            calcSummary();
        });
        $('#malam').keypress(function(ev) {
            calcSummary();
        });
        $('#JMLJUAL').keypress(function(ev) {
            calcSummary();
        });
        $('#injeksi').keypress(function(ev) {
            calcSummary();
        });
        $('#mandiri').keypress(function(ev) {
            calcSummary();
        });
        $('#DISKON_P').keypress(function(ev) {
            var a = $(this).val();
            if (parseFloat(a) > 100) {
                $('#DISKON_P').val(a.substring(1, a.length - 1));
                return $(this).select();
            }
            calcSummary();

        });
        $('#DISKON').keypress(function(ev) {
            calcSummary();
        });
        $('#simpan').click(function() {
            simpanTransaksi();
        });


        // CREATE WIDGET CARI OBAT AUTOCOMPLETE
        $.widget("custom.caripasien", $.ui.autocomplete, {
            _create: function() {
                this._super();
                this.widget().menu("option", "items", "> li:not(.ui-autocomplete-header)");
            },
            _renderMenu(ul, items) {
                var self = this;
                ul.addClass("container");

                let header = {
                    NRP: "KODE",
                    pgwNama: "NAMA PASIEN",
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
                    $li = $("<li class='ui-autocomplete-header' role='presentation'  style='font-weight:bold !important;'></li>");
                var $content = "<div class='row ui-menu-item-wrapper'>" +
                    "<div class='col-xs-2'>" + item.NRP + "</div>" +
                    "<div class='col-xs-10'>" + item.pgwNama + "</div>" +
                    "</div>";
                $li.html($content);


                return $li.appendTo(ul);
            }

        });

        $.widget("custom.cariobat", $.ui.autocomplete, {
            _create: function() {
                this._super();
                this.widget().menu("option", "items", "> li:not(.ui-autocomplete-header)");
            },
            _renderMenu(ul, items) {
                var self = this;
                ul.addClass("container");

                let header = {
                    KDBRG: "KDBRG",
                    NMBRG: "NMBRG",
                    JSTOK: "STOK",
                    NMKTBRG: "KATEGORI",
                    HJUAL: "HARGA",
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
                    $li = $("<li class='ui-autocomplete-header' role='presentation'  style='font-weight:bold !important;'></li>");
                var $content = "<div class='row ui-menu-item-wrapper'>" +
                    "<div class='col-xs-2'>" + item.KDBRG + "</div>" +
                    "<div class='col-xs-4'>" + item.NMBRG + "</div>" +
                    "<div class='col-xs-2'>" + item.JSTOK + "</div>" +
                    "<div class='col-xs-2'>" + item.NMKTBRG + "</div>" +
                    "<div class='col-xs-2'>" + item.HJUAL + "</div>" +
                    "</div>";
                $li.html($content);


                return $li.appendTo(ul);
            }

        });

        $.widget("custom.caridokter", $.ui.autocomplete, {
            _create: function() {
                this._super();
                this.widget().menu("option", "items", "> li:not(.ui-autocomplete-header)");
            },
            _renderMenu(ul, items) {
                var self = this;
                ul.addClass("container");

                let header = {
                    NRP: "KODE",
                    pgwNama: "NAMA DOKTER",
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
                    $li = $("<li class='ui-autocomplete-header' role='presentation'  style='font-weight:bold !important;'></li>");
                var $content = "<div class='row ui-menu-item-wrapper'>" +
                    "<div class='col-xs-2'>" + item.NRP + "</div>" +
                    "<div class='col-xs-10'>" + item.pgwNama + "</div>" +
                    "</div>";
                $li.html($content);


                return $li.appendTo(ul);
            }

        });
        // create the autocomplete
        $("#keyword").cariobat({
            minLength: 1,
            source: function(request, response) {
                var kdlokasi = $('#KDLOKASI').val();
                var url = "<?= base_url() . "farmasi.php/pemakaian_obat/barang/" ?>" + kdlokasi + "?start=0";
                console.log(url);
                $.ajax({
                    url: "<?= base_url() . "farmasi.php/pemakaian_obat/barang/" ?>" + kdlokasi + "?start=0",
                    dataType: "JSON",
                    method: "POST",
                    data: {
                        param1: request.term
                    },
                    success: function(data) {
                        console.log(data)
                        var barang = data.data;
                        response(barang.slice(0, 15));
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(errorThrown);
                    }
                });
            },
            focus: function(event, ui) {
                /*$("#KDDOKTER").val(ui.item['NRP']);
                $("#NMDOKTER").val(ui.item['pgwNama']);*/
                $("#keyword").removeClass("ui-autocomplete-loading");
                return false;
            },
            select: function(event, ui) {
                /*$("#KDDOKTER").val(ui.item['NRP']);
                $("#NMDOKTER").val(ui.item['pgwNama']);*/

                resetSapLainnya();
                resetCpLainnya();
                reseWpPakaiLainnya();
                reseWpPakaiLainnya3();
                reseKeterangan();
                $("#keyword").removeClass("ui-autocomplete-loading");
                setBarangJual(ui.item['KDBRG'], ui.item['NMBRG'], ui.item['NMSATUAN'], ui.item['NMKTBRG'], ui.item['JSTOK'], ui.item['HJUAL']);
                return false;
            }
        });

        $("#NMDOKTER").caridokter({
            minLength: 1,
            source: function(request, response) {
                $.ajax({
                    url: "<?= base_url() . "farmasi.php/pemakaian_obat/dokter" ?>",
                    dataType: "JSON",
                    method: "POST",
                    data: {
                        param1: request.term
                    },
                    success: function(data) {
                        console.log(data)
                        var dokter = data.data;
                        response(dokter.slice(0, 15));
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(errorThrown);
                    }
                });
            },
            minLength: 2,
            focus: function(event, ui) {
                $("#KDDOKTER").val(ui.item['NRP']);
                $("#NMDOKTER").val(ui.item['pgwNama']);
                $("#NMDOKTER").removeClass("ui-autocomplete-loading");
                return false;
            },
            select: function(event, ui) {
                $("#KDDOKTER").val(ui.item['NRP']);
                $("#NMDOKTER").val(ui.item['pgwNama']);
                $("#NMDOKTER").removeClass("ui-autocomplete-loading");
                return false;
            }
        });

        $("#NMPASIEN").caripasien({
            minLength: 1,
            source: function(request, response) {
                var kdlokasi = $('#KDLOKASI').val();
                var url = "<?= base_url() . "farmasi.php/pemakaian_obat/pegawai?start=0" ?>";
                console.log(url);
                $.ajax({
                    url: url,
                    dataType: "JSON",
                    method: "POST",
                    data: {
                        param1: request.term
                    },
                    success: function(data) {
                        console.log(data)
                        var barang = data.data;
                        response(barang.slice(0, 15));
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(errorThrown);
                    }
                });
            },
            minLength: 1,
            focus: function(event, ui) {
                /*$("#KDDOKTER").val(ui.item['NRP']);
                $("#NMDOKTER").val(ui.item['pgwNama']);*/
                $("#NMPASIEN").removeClass("ui-autocomplete-loading");
                return false;
            },
            select: function(event, ui) {

                $('#REG_UNIT').val("-");
                $('#ID_DAFTAR').val("-");
                $('#NOMR').val(ui.item["NRP"]);
                $('#NMPASIEN').val(ui.item["pgwNama"]);
                $('#KDRUANGAN').val("-");
                $('#NMRUANGAN').val("-");
                $('#JNS_LAYANAN').val("PJ");
                $('#ID_CARA_BAYAR').val("1");
                $('#CARA_BAYAR').val("Umum");
                $('#KDDOKTER').val("-");
                //setBarangJual(ui.item['KDBRG'], ui.item['NMBRG'], ui.item['NMSATUAN'], ui.item['NMKTBRG'], ui.item['JSTOK'], ui.item['HJUAL']);

                $("#q").removeClass("ui-autocomplete-loading");
                return false;
            }
        });
        // get a handle on it's UI view
        //var autocomplete_handle = autocomplete.data("ui-autocomplete");
    });




    var base_url = "<?= base_url() . "farmasi.php/"; ?>";
</script>
<script src="<?php echo base_url() ?>js/pemakaian_obat.js"></script>