<style>
    em {
        font-size: 10px
    }

    .input-group-addon {
        border: none;
    }

    .rightAlign {
        text-align: right;
    }

    .centerAlign {
        text-align: center;
    }

    .conversi {
        border: 1px solid #d2d6de
    }

    .w10 {
        width: 10px;
    }

    .w20 {
        width: 20px;
    }

    .w30 {
        width: 30px;
    }

    .w40 {
        width: 40px;
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

    .popup-pencarian {
        position: relative;
    }

    .content-pencarian {
        display: inherit;
        position: absolute;
        top: 0px;
        left: 0px;
        z-index: 5;
        width: 100%;
        /*min-height: 200px;*/
        /*max-height: 500px;*/
        /*min-width: 800px;*/
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

    @media (min-width: 768px) {
        .modal-xl {
            width: 90%;
            max-width: 1200px;
        }
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form id="form1" role="form" onsubmit="return false">
                <!--form id="form1" role="form" method="POST" action="<?= base_url() . "farmasi.php/trans_pembelian/simpan"; ?>"-->
                <div class="box box-success">
                    <div class="box-header with-border">Form Transaksi Pembelian Barang</div>
                    <div class="box-body">
                        <div class="col-md-3 col-xs-12">
                            <div class="box box-widget widget-user-2">
                                <div class="bg-aqua-active" style="padding:10px;border-radius:15px 15px 0px 0px">
                                    <h4 class="widget-user-username">Master Transaksi</h4>
                                </div>

                                <div class="box-body">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="list-group list-group-unbordered">
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-xs-4 text-right"><label>Pembayaran <span style="color: red"> * </span></div>
                                                            <div class="col-xs-8">
                                                                <select name="PEMBAYARAN" id="PEMBAYARAN" class="form-control">
                                                                    <option value="CASH">CASH</option>
                                                                    <option value="CREDIT">CREDIT</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-xs-4 text-right">
                                                                <label>Supllier <span style="color: red"> * </span></label>
                                                            </div>
                                                            <div class="col-xs-8">
                                                                <select name="KDSUPPLIER" id="KDSUPPLIER" class="form-control" style="width: 100%">
                                                                    <option value=""></option>
                                                                    <?php foreach ($datsupplier->result_array() as $x) : ?>
                                                                        <option value="<?php echo $x['KDSUPPLIER'] ?>"><?php echo $x['NMSUPPLIER'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-xs-4 text-right">
                                                                <label>No Faktur <span style="color: red"> * </span></label>
                                                            </div>
                                                            <div class="col-xs-8">
                                                                <input type="text" name="NOFAKTUR" id="NOFAKTUR" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-xs-4 text-right">
                                                                <label>Tanggal Faktur <span style="color: red"> * </span></label>
                                                            </div>
                                                            <div class="col-xs-8">
                                                                <input type="text" name="TGLFAKTUR" id="TGLFAKTUR" class="form-control tanggal" />
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-xs-4 text-right"><label>Tanggal Terima <span style="color: red"> * </span></label></div>
                                                            <div class="col-xs-8">
                                                                <input type="text" name="TGLTERIMA" id="TGLTERIMA" class="form-control tanggal" />
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-xs-4 text-right"><label>Tanggal Tempo <span style="color: red"> * </span></label></div>
                                                            <div class="col-xs-8">
                                                                <input type="text" name="JTEMPO" id="JTEMPO" class="form-control tanggal" />
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-xs-4 text-right"><label>Jenis <span style="color: red"> * </span></label></div>
                                                            <div class="col-xs-8">
                                                                <select name="JENIS_TRANS" id="JENIS_TRANS" class="form-control">
                                                                    <option value="1">NON PPN</option>
                                                                    <option value="2">PPN</option>
                                                                </select>
                                                                <input type="hidden" name="KDLOKASI" id="KDLOKASI" value="<?= $kLok; ?>">
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-9">
                            <div class="box box-success">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-xs-12">
                                                <div class="input-group input-group-sm col-sm-4">
                                                    <input type="hidden" name="jmldata" id="jmldata" value="" />
                                                    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Cari Barang" onkeyup="getBarang(0)" onkeydown="enter_keyword(event)" />
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-default" type="button" id="ADDBARANG1">
                                                            <i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Obat / Alkes</th>
                                                        <th width="120px">Harga Beli Item</th>
                                                        <th width="50px">Jml Item</th>
                                                        <th width="120px">Diskon</th>
                                                        <th width="120px">Diskon Global</th>
                                                        <th width="120px">PPN (Peritem)</th>
                                                        <th width="120px">HPP (Perpcs)</th>
                                                        <th width="120px">HJUAL (Perpcs)</th>
                                                        <th width="120px">Sub Total</th>
                                                        <th width="50px">#</th>
                                                    </tr>
                                                </thead>

                                                <tbody id="getTemp"></tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-7">&nbsp;</div>
                                        <div class="col-xs-5">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4 text-right"><label>Total Faktur </label></div>
                                                    <div class="col-xs-8">
                                                        <input readonly="" type="text" name="TOTFAKTUR" id="TOTFAKTUR" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal','groupSeparator': ',','autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4 text-right"><label>Total Diskon / Item </label></div>
                                                    <div class="col-xs-8">
                                                        <input readonly="" type="text" name="TOTDISKON_ITEM" id="TOTDISKON_ITEM" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal','groupSeparator': ',','autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" />
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4 text-right"><label>Diskon Global </label></div>
                                                    <div class="col-xs-8">
                                                        <input type="text" name="DISKON_GLOBAL" id="DISKON_GLOBAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal','groupSeparator': ',',  'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4 text-right"><label>Total PPN </label></div>
                                                    <div class="col-xs-8">
                                                        <input readonly type="text" name="TOTPPN" id="TOTPPN" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal','groupSeparator': ',', 'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4 text-right"><label>Ongkos Kirim </label></div>
                                                    <div class="col-xs-8">
                                                        <input type="text" name="ONGKIR" id="ONGKIR" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal','groupSeparator': ',',  'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4 text-right"><label>Keterangan </label></div>
                                                    <div class="col-xs-8">
                                                        <input type="text" name="KETBL" id="KETBL" class="form-control" value="">
                                                        <!--textarea class="form-control" name="KETBL" id="KETBL" rows="3"></textarea-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4 text-right"><label>Grand Total </label></div>
                                                    <div class="col-xs-8">
                                                        <input readonly type="text" name="GRANDTOT" id="GRANDTOT" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4 text-right"><label>&nbsp; </label></div>
                                                    <div class="col-xs-8 text-right">
                                                        <button type="button" id="kembali" class="btn btn-danger">
                                                            <i class="fa fa-external-link"></i> Kembali</button>
                                                        <button type="button" id="simpankonfirmasi" class="btn btn-success">
                                                            <i class="fa fa-floppy-o"></i> Simpan</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</section>

<div class="modal fade" id="modal_transaksi" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Transaksi Barang Masuk</h4>
            </div>
            <form id="form2" action="#" method="post" onsubmit="return false">
                <div class="modal-body">
                    <div class="container-fluid">
                        <!--form id="form" method="POST" action=""-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-2 text-right"><label>NAMA BARANG </label></div>
                                <div class="col-xs-4">
                                    <input type="hidden" name="KDBRG" id="KDBRG" value="">
                                    <input type="text" readonly name="NMBRG" id="NMBRG" class="form-control" value="">
                                    <!--input type="text" name="DISKON_GLOBAL" id="DISKON_GLOBAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'autoGroup': true,  'placeholder': '0'"/-->
                                </div>
                                <div class="col-xs-4">
                                    <b>HPP Sebelumnya : <span id='hpp'>Rp. </span></b>
                                    <input type="hidden" id='x-hpp' name='x-hpp'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-2 text-right"><label>TGL EXPIRE </label></div>
                                <div class="col-xs-4">
                                    <input type="text" name="EXPDATE" id="EXPDATE" class="form-control tanggal" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-2 text-right"><label>JMl BELI </label></div>
                                <div class="col-xs-4">
                                    <input type="text" name="JMLBELI_BOX" id="JMLBELI_BOX" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" />
                                </div>
                                <!--div class="col-xs-4">
                                    <input readonly type="text" name="JMLBELI" id="JMLBELI" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'"/>
                                </div-->
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-2 text-right"><label>KONVERSI </label></div>
                                <div class="col-xs-4">
                                    <input type="text" name="KONVERSI" id="KONVERSI" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" />
                                </div>
                                <div class="col-xs-2 text-right"><label>JML BELI(PCS) </label></div>
                                <div class="col-xs-4">
                                    <input readonly type="text" name="JMLBELI" id="JMLBELI" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-2 text-right"><label>HARGA BELI </label></div>
                                <div class="col-xs-4">
                                    <input type="text" name="HBELI_BOX" id="HBELI_BOX" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" />
                                </div>
                                <div class="col-xs-2 text-right"><label>HARGA BELI(PCS) </label></div>
                                <div class="col-xs-4">
                                    <input readonly type="text" name="HBELI" id="HBELI" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" />
                                </div>
                                <!--div class="col-xs-3">
                                    <input readonly type="hidden" name="HMODAL" id="HMODAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'"/>
                                </div-->
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-2 text-right"><label>DISKON (%)</label></div>
                                <div class="col-xs-4">
                                    <input type="text" name="P_DISKON" id="P_DISKON" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'" />
                                </div>
                                <div class="col-xs-2 text-right"><label>DISKON(Rp) </label></div>
                                <div class="col-xs-4">
                                    <input type="text" name="HDISKON" id="HDISKON" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal','groupSeparator': ',', 'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" />
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-2 text-right"><label>HARGA JUAL </label></div>
                                <div class="col-xs-4">
                                    <input type="text" name="HJUALBOX" id="HJUALBOX" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" />
                                </div>
                                <div class="col-xs-2 text-right"><label>HARGA JUAL(PCS) </label></div>
                                <div class="col-xs-4">
                                    <input type="text" name="HJUAL" id="HJUAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-2 text-right"><label>SUB TOTAL </label></div>
                                <div class="col-xs-4">

                                    <input type="text" name="SUBTOTAL" id="SUBTOTAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal','groupSeparator': ',', 'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-2 text-right"><label>PPN(10%) </label></div>
                                <div class="col-xs-4">
                                    <input type="hidden" name="PPN" id="PPN" value="0">
                                    <input type="text" name="JUMLAH_PPN" id="JUMLAH_PPN" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal','groupSeparator': ',', 'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" readonly />
                                </div>

                            </div>
                        </div>
                        <!--/form-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="simpanTemp" type="button" class="btn btn-danger">
                        <i class="fa fa-add"></i> Tambah</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_konfirmasi" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Konfirmasi Data Barang Masuk</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Obat / Alkes</th>
                            <th width="120px">Harga Beli Item</th>
                            <th width="50px">Jml Item</th>
                            <th width="120px">Diskon</th>
                            <th width="120px">Diskon Global</th>
                            <th width="120px">PPN (Peritem)</th>
                            <th width="120px">HPP (Perpcs)</th>
                            <th width="120px">HJUAL (Perpcs)</th>
                            <th width="120px">Sub Total</th>
                        </tr>
                    </thead>

                    <tbody id="getTempKonfirmasi"></tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8" class="text-right">Total Faktur</td>
                            <td>Rp. <span id="tf"></span></td>
                        </tr>
                        <tr>
                            <td colspan="8" class="text-right">Total Diskon / Item</td>
                            <td>Rp. <span id="tdi"></span></td>
                        </tr>
                        <tr>
                            <td colspan="8" class="text-right">Diskon Global</td>
                            <td>Rp. <span id="dg"></span></td>
                        </tr>
                        <tr>
                            <td colspan="8" class="text-right">Ongkos Kirim</td>
                            <td>Rp. <span id="ok"></span></td>
                        </tr>

                        <tr>
                            <td colspan="8" class="text-right">Grand Total</td>
                            <td>Rp. <span id="gt"></span></td>
                        </tr>
                        <tr>
                            <td colspan="9"><input type="checkbox" name="konfirmasi" id="konfirmasi" value="1"><label for="konfirmasi">Data Barang masuk sudah benar</label></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="simpan">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript">
    var base_url = "<?php echo base_url() . "farmasi.php/" ?>";
    $(document).ready(function() {
        $(".inputmask").inputmask();
        $('input,textarea').focus(function() {
            return $(this).select();
        });
        $('#KDSUPPLIER').select2({
            placeholder: "Pilih Supplier"
        });
        $('.tanggal').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        });
        $('.tanggal').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy"
        });
        $('#kembali').click(function() {
            var a = "<?php echo $kLok ?>";
            window.location.href = "<?php echo base_url() . 'farmasi.php/trans_pembelian' ?>";
        });
        $('#PEMBAYARAN').focus();

        function kosongkanObjEntry() {
            $('#PEMBAYARAN').prop("selectedIndex", 0);
            $('#KDSUPPLIER').val('').trigger('change');
            //$('#KDLOKASI').val('').trigger('change');
            $('#JENIS_TRANS').prop("selectedIndex", 1);
            $('#NOFAKTUR').val('');
            $('#TGLFAKTUR').val('');
            $('#TGLTERIMA').val('');
            $('#JTEMPO').val('');
            $('#TOTFAKTUR').val('0');
            $('#TOTDISKON_ITEM').val('0');
            $('#DISKON_GLOBAL').val('0');
            $('#TOTPPN').val('0');
            $('#ONGKIR').val('0');
            $('#GRANDTOT').val('0');
            $('#KETBL').val('');
        }

        function kosongkanObjTemp() {
            $('#KDBRG').val('');
            $('#NMBRG').val('');
            $('#EXPDATE').val('');
            $('#HBELI').val('0');
            $('#JMLBELI').val('0');
            $('#HBELI_BOX').val('0');
            $('#JMLBELI_BOX').val('0');
            $('#KONVERSI').val('0');
            $('#HDISKON').val('0');
            $('#P_DISKON').val('0');
            $('#SUBTOTAL').val('0');
            $('#HJUALBOX').val('0');
            $('#HJUAL').val('0');
            $('#HMODAL').val('0');
            $('#JUMLAH_PPN').val('0');
        }
        kosongkanObjEntry();
        kosongkanObjTemp();
        getTemp();
        emptyTemp();

        $('#PEMBAYARAN').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#KDSUPPLIER').focus();
            }
        });
        $('#NOFAKTUR').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#TGLFAKTUR').focus();
            }
        });
        $('#TGLFAKTUR').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#TGLTERIMA').focus();
            }
        });
        $('#TGLTERIMA').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#JTEMPO').focus();
            }
        });
        $('#JTEMPO').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#JENIS_TRANS').focus();
            }
        });

        $('#JENIS_TRANS').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#keyword').focus();
            }
        });


        $('#DISKON_GLOBAL').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#ONGKIR').focus();
            }
        });
        $('#ONGKIR').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#KETBL').focus();
            }
        });
        $('#KETBL').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#simpan').focus();
            }
        });
        $('#EXPDATE').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#JMLBELI_BOX').focus();
            }
        });
        $('#KONVERSI').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#HBELI_BOX').focus();
            }
        });
        $('#HBELI_BOX').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#P_DISKON').focus();
            }
        });
        $('#JMLBELI_BOX').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#KONVERSI').focus();
            }
        });
        $('#P_DISKON').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#HDISKON').focus();
            }
        });
        $('#HDISKON').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#HJUAL').focus();
            }
        });

        $('#HJUAL').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                //alert("Enter HJUAL");
                $('#simpanTemp').focus();
            }
        });

        $('#ADDBARANG').click(function() {
            kosongkanObjTemp();
            $('#keywordCariObat').val("");
            $('#getDataObatCari').html("<tr><td colspan=5>Klik atau Enter Pada textbox pencarian untuk menampilkan data</td></tr>");
            $("#formModal").modal("show");
        });

        function calcSummaryMain() {
            //console.clear();

            var x = $('#JENIS_TRANS').val();
            var a = $('#TOTFAKTUR').val().replace(',', '').replace(',', '').replace(',', '');
            var b = $('#TOTDISKON_ITEM').val().replace(',', '').replace(',', '').replace(',', '');
            var c = $('#DISKON_GLOBAL').val().replace(',', '').replace(',', '').replace(',', '');
            var d = $('#ONGKIR').val().replace(',', '').replace(',', '').replace(',', '');

            a = (a == '' || isNaN(a)) ? 0 : a;
            b = (b == '' || isNaN(b)) ? 0 : b;
            c = (c == '' || isNaN(c)) ? 0 : c;
            d = (d == '' || isNaN(d)) ? 0 : d;
            var e = parseFloat(a) - parseFloat(b) - parseFloat(c); //total faktur - total diskon per item - diskon global => grand total tanpa ppn
            e = (e == '' || isNaN(e)) ? 0 : e;
            console.log('Grand Total Tanpa PPN (e) = total faktur - totaldiskon peritem - diskon global  : ' + a + "-" + b + "-" + c + " = " + e);
            if (x == '1') {
                //non ppn
                var f = 0;
                var g = parseFloat(d) + parseFloat(e); // ongkir + grand total tanpa ppn
            } else {
                //ppn
                var f = parseFloat(e) * 10 / 100; // ppn = 10 % dari grand total tanpa ppn
                var g = parseFloat(d) + parseFloat(e) + parseFloat(f); //ongkir + grand total tanpa ppn + ppn
                console.log("Grand total = Ongkir + grand Total Tanpa PPN + PPN => " + d + "+" + e + "+" + f + "=" + g);
            }
            f = (f == '' || isNaN(f)) ? 0 : f;
            g = (g == '' || isNaN(g)) ? 0 : g;

            $('#TOTPPN').val(f);
            $('#GRANDTOT').val(g);
            console.log(g);
            getTemp();

        }
        $('#JENIS_TRANS').change(function() {
            calcSummaryMain()
        });
        $('#DISKON_GLOBAL').keypress(function(ev) {
            calcSummaryMain();
        });
        $('#DISKON_GLOBAL').keydown(function(ev) {
            calcSummaryMain();
        });
        $('#ONGKIR').keypress(function(ev) {
            calcSummaryMain();
        });
        $('#DISKON_GLOBAL').keydown(function(ev) {
            calcSummaryMain();
        });

        $('#btnKeywordCariObat').click(function() {
            var a = $('#keywordCariObat').val();
            $.ajax({
                url: "<?php echo base_url() . 'farmasi.php/trans_pembelian/getObat' ?>",
                type: "POST",
                data: {
                    keyword: a
                },
                beforeSend: function() {
                    $('tbody#getDataObatCari').html("<tr><td colspan=8><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success: function(data) {
                    $('tbody#getDataObatCari').html(data);
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    $('tbody#getDataObatCari').html('<tr><td colspan=8>Data tidak ditemukan</td></tr>');
                    console.log(errorThrown);
                },
                complete: function() {
                    var csrf = $('#csrf').val();
                    $('.csrf').val(csrf);
                }
            });
        });

        $('#keywordCariObat').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var a = $('#keywordCariObat').val();
                $.ajax({
                    url: "<?php echo base_url() . 'farmasi.php/trans_pembelian/getObat' ?>",
                    type: "POST",
                    data: {
                        keyword: a
                    },
                    beforeSend: function() {
                        $('tbody#getDataObatCari').html("<tr><td colspan=8><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                    },
                    success: function(data) {
                        $('tbody#getDataObatCari').html(data);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        $('tbody#getDataObatCari').html('<tr><td colspan=8>Data tidak ditemukan</td></tr>');
                        console.log(errorThrown);
                    },
                    complete: function() {
                        var csrf = $('#csrf').val();
                        $('.csrf').val(csrf);
                    }
                });
            }
        });

        function calcSummaryItem() {
            var a = $('#KONVERSI').val().replace(',', '').replace(',', '').replace(',', '');
            var b = $('#HBELI_BOX').val().replace(',', '').replace(',', '').replace(',', '');
            var c = $('#JMLBELI_BOX').val().replace(',', '').replace(',', '').replace(',', '');
            var JMLBELI_BOX = $('#JMLBELI_BOX').val();
            a = (a == '' || isNaN(a)) ? 0 : a;
            b = (b == '' || isNaN(b)) ? 0 : b;
            c = (c == '' || isNaN(c)) ? 0 : c;
            JMLBELI_BOX = (JMLBELI_BOX == '' || isNaN(JMLBELI_BOX)) ? 0 : JMLBELI_BOX;
            //var KONVERSI_PCS = parseFloat(JMLBELI_BOX)*parseFloat(a);
            //$('#KONVERSI_PCS').val(KONVERSI_PCS);


            var hargaBeliItem = parseFloat(b) / (parseFloat(a));
            hargaBeliItem = (hargaBeliItem == '' || isNaN(hargaBeliItem)) ? 0 : hargaBeliItem;
            $('#HBELI').val(hargaBeliItem);

            var jmlBeliItem = parseFloat(a) * parseFloat(c);
            jmlBeliItem = (jmlBeliItem == '' || isNaN(jmlBeliItem)) ? 0 : jmlBeliItem;
            $('#JMLBELI').val(jmlBeliItem);

            var d = $('#P_DISKON').val().replace(',', '').replace(',', '').replace(',', '');
            var e = $('#HBELI').val().replace(',', '').replace(',', '').replace(',', '');
            var f = $('#JMLBELI').val().replace(',', '').replace(',', '').replace(',', '');
            d = (d == '' || isNaN(d)) ? 0 : d;
            e = (e == '' || isNaN(e)) ? 0 : e;
            f = (f == '' || isNaN(f)) ? 0 : f;

            if (d == 0) {
                var g = $('#HDISKON').val().replace(',', '').replace(',', '').replace(',', '');
            } else {
                var nilaiDiskon = parseFloat(d) * parseFloat(e) * parseFloat(f) / 100;
                nilaiDiskon = (nilaiDiskon == '' || isNaN(nilaiDiskon)) ? 0 : nilaiDiskon;
                $('#HDISKON').val(nilaiDiskon);
                var g = $('#HDISKON').val().replace(',', '').replace(',', '').replace(',', '');
            }
            g = (g == '' || isNaN(g)) ? 0 : g;
            var HARGA_FIX_DISKON = (parseFloat(e) * parseFloat(f)) - parseFloat(g);
            console.log("-----------------Menghitung PPN-----------------");
            console.log("Hitung PPN 10% x HARGA FIX SETELAH DIKURANG DISKON");
            var PPN = $('#PPN').val();
            JUMLAH_PPN = parseFloat(PPN) * HARGA_FIX_DISKON;
            console.log("TOTAL PPN = 0.1 x " + HARGA_FIX_DISKON + " = " + PPN);
            console.log("PPN / PCS = TOTAL PPN / JML_BELI(PCS)");
            PPN_PCS = JUMLAH_PPN / f;
            console.log("PPN/PCS = " + JUMLAH_PPN + "/" + f + " = " + PPN_PCS);
            console.log("----------------Hasil PPN Didapatkan-------------");
            $('#JUMLAH_PPN').val(JUMLAH_PPN);

            console.log("-------------------------CARI HARGA FIX SETEKAH DIKURANG DISKON DAN DITAMBAH PPN-------------------------");
            var HARGA_FIX_PPN_DISC = HARGA_FIX_DISKON + JUMLAH_PPN;
            console.log("HARGA_FIX_PPN_DISC=HARGA_FIX_DISKON + PPN");
            console.log("HARGA_FIX_PPN_DISC=" + HARGA_FIX_DISKON + " + " + JUMLAH_PPN + "")
            console.log("-------------------------HARGA FIX SETEKAH DIKURANG DISKON DAN DITAMBAH PPN DIDAPAT-------------------------");

            console.log("---------------------MENCARI HARGA MODAL / PCS ---------------------");
            var HARGA_MODAL_PCS = HARGA_FIX_PPN_DISC / f;
            console.log("HARGA_MODAL_PCS=HARGA_FIX_PPN_DISC/JML_PCS");
            console.log("HARGA_MODAL_PCS=" + HARGA_FIX_PPN_DISC + "/" + f + " = " + HARGA_MODAL_PCS);
            $('#HMODAL').val(HARGA_MODAL_PCS);
            console.log("-------------------Harga Modal / PCS Didapatkan---------------------");

            console.log("------------------------Mencari Harga Jual / PCS------------------------------");
            var HARGA_JUAL = 1.2 * HARGA_MODAL_PCS;
            var HARGA_JUAL_BOX = HARGA_JUAL * parseFloat(a);
            console.log("HJUAL = 1.2 x HARGA MODAL / PCS");
            console.log("HJUAL = 1.2 x " + HARGA_MODAL_PCS + " = " + HARGA_JUAL);
            $('#HJUAL').val(parseFloat(HARGA_JUAL));
            $('#HJUALBOX').val(parseFloat(HARGA_JUAL_BOX));
            console.log("------------------------Harga Jual / PCS Didapatkan------------------------------");

            var subtotal = (parseFloat(e) * parseFloat(f)) - parseFloat(g);
            subtotal = (subtotal == '' || isNaN(subtotal)) ? 0 : subtotal;
            $('#SUBTOTAL').val(subtotal);
        }

        $('#KONVERSI').keypress(function(ev) {
            calcSummaryItem();
        });
        $('#KONVERSI').keydown(function(ev) {
            calcSummaryItem();
        });
        $('#HBELI_BOX').keypress(function(ev) {
            calcSummaryItem();
        });
        $('#HBELI_BOX').keydown(function(ev) {
            calcSummaryItem();
        });
        $('#JMLBELI_BOX').keypress(function(ev) {
            calcSummaryItem();
        });
        $('#JMLBELI_BOX').keydown(function(ev) {
            calcSummaryItem();
        });
        $('#P_DISKON').keypress(function(ev) {
            calcSummaryItem();
        });
        $('#P_DISKON').keydown(function(ev) {
            calcSummaryItem();
        });
        $('#HDISKON').keypress(function(ev) {
            calcSummaryItem();
        });
        $('#HDISKON').keydown(function(ev) {
            calcSummaryItem();
        });

        $("#simpanTemp").click(function() {
            var formItems = {};
            formItems['KDBRG'] = $('#KDBRG').val();
            formItems['NMBRG'] = $('#NMBRG').val();
            formItems['EXPDATE'] = $('#EXPDATE').val();
            formItems['HBELI'] = $('#HBELI').val();
            formItems['HJUAL'] = $('#HJUAL').val();
            formItems['JMLBELI'] = $('#JMLBELI').val();
            formItems['HDISKON'] = $('#HDISKON').val();
            formItems['SUBTOTAL'] = $('#SUBTOTAL').val();
            formItems['<?= $this->security->get_csrf_token_name(); ?>'] = $('#token').val()
            console.log(formItems);
            //return false;
            if (formItems['KDBRG'] == "") {
                $('#ADDBARANG').click();
            } else if (formItems['EXPDATE'] == "") {
                alert("Tanggal expire masih kosong");
                $('#EXPDATE').focus();
            } else if (formItems['HBELI'] == "" || formItems['HBELI'] == "0") {
                alert("Harga beli masih kosong");
                $('#HBELI').focus();
            } else if (formItems['JMLBELI'] == "" || formItems['JMLBELI'] == "0") {
                alert("Jumlah obat masuk masih kosong");
                $('#JMLBELI').focus();
            } else if (formItems['SUBTOTAL'] == "" || formItems['SUBTOTAL'] == "0") {
                alert("Sub Total masih kosong");
            } else {
                var hmodal = $('#HBELI').val().replace(',', '').replace(',', '').replace(',', '');
                var xhpp = $('#x-hpp').val();
                var selisih = parseFloat(hmodal) - parseFloat(xhpp);
                if (selisih != 0) {
                    swal({
                            title: "Apakah anda yakin data yang diinput sudah benar?",
                            text: "Karena terdapat selisih antara hmodal sebelumnya dengan hmodal sekarang sebesar Rp. " + selisih,
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Ya",
                            cancelButtonText: "Tidak",
                            closeOnConfirm: true,
                            closeOnCancel: true
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                $.ajax({
                                    url: "<?php echo base_url() . 'farmasi.php/trans_pembelian/simpanTemp' ?>",
                                    type: "POST",
                                    data: formItems,
                                    dataType: "JSON",
                                    success: function(data) {
                                        getTemp();
                                        $('.csrf').val(data.csrf);
                                        if (data.code == 200) {
                                            swal({
                                                    title: "Apakah masih ada data?",
                                                    text: "Klik ya jika masih ada data, dan tidak jika tidak ada data lagi",
                                                    type: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonText: "Ya",
                                                    cancelButtonText: "Tidak",
                                                    closeOnConfirm: true,
                                                    closeOnCancel: true
                                                },
                                                function(isConfirm) {
                                                    if (isConfirm) {
                                                        $('#keyword').focus();
                                                        $('#barang').hide();
                                                    } else {
                                                        $('#DISKON_GLOBAL').focus();
                                                        $('#barang').hide();
                                                    }
                                                }
                                            );
                                            kosongkanObjTemp();

                                            $("#modal_transaksi").modal("hide");
                                            //$('#ADDBARANG').click();
                                        } else {
                                            alert(data.message);
                                        }
                                    },
                                    error: function(xhr, ajaxOption, thrownError) {
                                        console.log('Response : ' + thrownError);
                                    }
                                });
                            } else {
                                swal("Batal", "Data Tidak jadi dihapus :)", "error");
                            }
                        }
                    );
                } else {
                    $.ajax({
                        url: "<?php echo base_url() . 'farmasi.php/trans_pembelian/simpanTemp' ?>",
                        type: "POST",
                        data: formItems,
                        dataType: "JSON",
                        success: function(data) {
                            getTemp();
                            $('.csrf').val(data.csrf);
                            if (data.code == 200) {
                                swal({
                                        title: "Apakah masih ada data?",
                                        text: "Klik ya jika masih ada data, dan tidak jika tidak ada data lagi",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonText: "Ya",
                                        cancelButtonText: "Tidak",
                                        closeOnConfirm: true,
                                        closeOnCancel: true
                                    },
                                    function(isConfirm) {
                                        if (isConfirm) {
                                            $('#keyword').focus();
                                            $('#barang').hide();
                                        } else {
                                            $('#DISKON_GLOBAL').focus();
                                            $('#barang').hide();
                                        }
                                    }
                                );

                                kosongkanObjTemp();

                                $("#modal_transaksi").modal("hide");
                                //$('#ADDBARANG').click();
                            } else {
                                tampilkanPesan('success', data.message);
                            }
                        },
                        error: function(xhr, ajaxOption, thrownError) {
                            console.log('Response : ' + thrownError);
                        }
                    });
                }

            }
        });

        $('#simpan').click(function() {
            if ($('#konfirmasi').prop('checked')) {
                var formdata = {}
                formdata['PEMBAYARAN'] = $('#PEMBAYARAN').val();
                formdata['KDSUPPLIER'] = $('#KDSUPPLIER').val();
                formdata['NMSUPPLIER'] = $('#KDSUPPLIER :selected').html();
                formdata['NOFAKTUR'] = $('#NOFAKTUR').val();
                formdata['TGLFAKTUR'] = $('#TGLFAKTUR').val();
                formdata['TGLTERIMA'] = $('#TGLTERIMA').val();
                formdata['JTEMPO'] = $('#JTEMPO').val();
                formdata['KDLOKASI'] = "<?php echo $kLok; ?>";
                formdata['NMLOKASI'] = "<?php echo getLokasiById($kLok); ?>";
                formdata['JENIS_TRANS'] = $('#JENIS_TRANS').val();
                formdata['TOTFAKTUR'] = ($('#TOTFAKTUR').val() == "") ? "0" : $('#TOTFAKTUR').val();
                formdata['TOTDISKON_ITEM'] = ($('#TOTDISKON_ITEM').val() == "") ? "0" : $('#TOTDISKON_ITEM').val();
                formdata['DISKON_GLOBAL'] = ($('#DISKON_GLOBAL').val() == "") ? "0" : $('#DISKON_GLOBAL').val();
                formdata['TOTPPN'] = ($('#TOTPPN').val() == "") ? "0" : $('#TOTPPN').val();
                formdata['ONGKIR'] = ($('#ONGKIR').val() == "") ? "0" : $('#ONGKIR').val();
                formdata['GRANDTOT'] = ($('#GRANDTOT').val() == "") ? "0" : $('#GRANDTOT').val();
                formdata['KETBL'] = $('#KETBL').val();
                formdata['<?= $this->security->get_csrf_token_name(); ?>'] = $('#token').val()
                if (formdata['KDSUPPLIER'] == "") {
                    alert("Supplier harus dipilih");
                    $('#KDSUPPLIER').focus();
                } else if (formdata['NOFAKTUR'] == "") {
                    alert("No Faktur tidak boleh kosong");
                    $('#NOFAKTUR').focus();
                } else if (formdata['TGLFAKTUR'] == "") {
                    alert("Tanggal Faktur tidak boleh kosong");
                    $('#TGLFAKTUR').focus();
                } else if (formdata['TGLTERIMA'] == "") {
                    alert("Tanggal Terima Faktur tidak boleh kosong");
                    $('#TGLTERIMA').focus();
                } else if (formdata['JTEMPO'] == "") {
                    alert("Jatuh Tempo tidak boleh kosong");
                    $('#JTEMPO').focus();
                } else if (formdata['KDLOKASI'] == "") {
                    alert("Lokasi barang tidak ditemukan. Silahkan refresh browser anda.");
                } else {
                    $.ajax({
                        url: "<?php echo base_url() . 'farmasi.php/trans_pembelian/simpan' ?>",
                        type: "POST",
                        data: formdata,
                        dataType: "JSON",
                        beforeSend: function() {
                            // setting a timeout
                            $('#simpan').prop('disabled', true);
                        },
                        success: function(data) {
                            tampilkanPesan('success', data.message);
                            $('.csrf').val(data.csrf);
                            console.clear();
                            console.log(data);
                            if (data.code == 200) {
                                kosongkanObjEntry();
                                kosongkanObjTemp();
                                getTemp();
                                $('#PEMBAYARAN').focus();
                                $("#modal_konfirmasi").modal("hide");
                            }
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(jqXHR.responseText);
                        },
                        complete: function() {
                            $('#simpan').prop('disabled', false);
                        },
                    });
                }
            } else {
                alert("Jika data yang diinput sudah benar klik checkbox data barang masuk sudah benar ");
                return false;
            }


        });
        $('#simpankonfirmasi').click(function() {
            $('#tf').html($('#TOTFAKTUR').val());
            $('#tdi').html($('#TOTDISKON_ITEM').val());
            $('#dg').html($('#DISKON_GLOBAL').val());
            $('#tppn').html($('#TOTPPN').val());
            $('#ok').html($('#ONGKIR').val());
            $('#gt').html($('#GRANDTOT').val());
            $("#modal_konfirmasi").modal("show");
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
                    NMSATUAN: "SATUAN",
                    NMKTBRG: "KATEGORI",
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
                    "<div class='col-xs-1'>" + item.KDBRG + "</div>" +
                    "<div class='col-xs-3'>" + item.NMBRG + "</div>" +
                    "<div class='col-xs-2'>" + item.NMSATUAN + "</div>" +
                    "<div class='col-xs-2'>" + item.NMKTBRG + "</div>" +
                    "</div>";
                $li.html($content);


                return $li.appendTo(ul);
            }

        });

        $("#keyword").cariobat({
            minLength: 1,
            source: function(request, response) {
                //var lokasi = $('#KDLOKASI').val();

                //var url = base_url + "search/barang/" + lokasi + "?start=0";
                var url = base_url + "search/barang?start=0";
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    data: {
                        keyword: request.term
                    },
                    success: function(data) {
                        var barang = data.data;
                        response(barang.slice(0, 15));
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
                $("#keyword").removeClass("ui-autocomplete-loading");
                setBarang(ui.item['KDBRG'], ui.item['NMBRG'], ui.item['NMSATUAN'], ui.item['NMKTBRG']);
                return false;
            }
        });

    });

    /*function getTemp(){
        $.ajax({
            url : "<?php echo base_url() . 'farmasi.php/trans_pembelian/getTemp' ?>",
            beforeSend  : function(){
                $('tbody#getTemp').html("<tr><td colspan=8><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success : function(data){
                $('tbody#getTemp').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                $('tbody#getTemp').html('<tr><td colspan=8>Data tidak ditemukan</td></tr>');
                console.log(jqXHR,responseText);
            }
        });
        
        $.ajax({
            url     : "<?php echo base_url() . 'farmasi.php/trans_pembelian/getTotalTemp' ?>",
            dataType:"JSON",
            success : function(data){
                var a = $('#ONGKIR').val().replace('.','').replace('.','').replace('.','').replace(',','.');
                var b = $('#DISKON_GLOBAL').val().replace('.','').replace('.','').replace('.','').replace(',','.');
                var x = $('#JENIS_TRANS').val();

                a = (a=='' || isNaN(a)) ? 0 : a;
                b = (b=='' || isNaN(b)) ? 0 : b;

                $('#TOTFAKTUR').val(data.TOTFAKTUR);
                $('#TOTDISKON_ITEM').val(data.TOTDISKON_ITEM);

                if(x == '1'){
                    var p = 0;
                }else{
                    var p = (parseFloat(data.TOTFAKTUR) - parseFloat(data.TOTDISKON_ITEM) - parseFloat(b)) * 10 / 100;
                }

                $('#TOTPPN').val(p);
                
                if(a == 0 || a == ""){
                    $('#GRANDTOT').val(parseFloat(data.TOTFAKTUR_NETTO) + parseFloat(p));
                }else{
                    $('#GRANDTOT').val(parseFloat(a) + parseFloat(data.TOTFAKTUR_NETTO) + parseFloat(p));
                }                
            },
            error : function(xhr, ajaxOption, thrownError){
                console.log('Response : ' + thrownError);
            }
        });
    }*/
    function currencyFormat(num) {
        //var myarr = num.split(".");
        //var n=parseFloat(myarr[0]);
        return 'Rp. ' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
    }

    function getTemp() {
        var url = base_url + "trans_pembelian/datatemp";
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            data: {
                get_param: 'value'
            },
            success: function(data) {
                //menghitung jumlah data
                console.clear();
                console.log(data);
                if (data["status"] == true) {
                    var temp = data["temp"];
                    var tot = data["tot"];
                    var jmlData = temp.length;
                    var tabel = "";
                    var konf = "";
                    var hbeli;
                    var hdiskon;
                    var subtotal;
                    var hpp = 0;
                    // var a = $('#ONGKIR').val().replace('.','').replace('.','').replace('.','').replace(',','.');
                    // var b = $('#DISKON_GLOBAL').val().replace('.','').replace('.','').replace('.','').replace(',','.');
                    var a = $('#ONGKIR').val().replace(',', '').replace(',', '').replace(',', '').replace(',', '');
                    var b = $('#DISKON_GLOBAL').val().replace(',', '').replace(',', '').replace(',', '').replace(',', '');
                    var x = $('#JENIS_TRANS').val();
                    //alert(a);

                    a = (a == '' || isNaN(a)) ? 0 : a;
                    b = (b == '' || isNaN(b)) ? 0 : b;

                    $('#TOTFAKTUR').val(tot.TOTFAKTUR);
                    $('#TOTDISKON_ITEM').val(tot.TOTDISKON_ITEM);

                    if (x == '1') {
                        //Jika Jenis Transaksi Non PPN
                        var p = 0;
                    } else {
                        //Jika Dengan PPN
                        var p = (parseFloat(tot.TOTFAKTUR) - parseFloat(tot.TOTDISKON_ITEM) - parseFloat(b)) * 10 / 100;
                        console.log("PPN : (" + parseFloat(tot.TOTFAKTUR) + "-" + parseFloat(tot.TOTDISKON_ITEM) + "-" + parseFloat(b) + ")" + " * 10 / 100 = " + p);
                    }

                    $('#TOTPPN').val(p);

                    if (a == 0 || a == "") {
                        //Jika Ongkir Kosong
                        var grandtot = parseFloat(tot.TOTFAKTUR_NETTO) - parseFloat(b) + parseFloat(p);
                        $('#GRANDTOT').val(grandtot);
                        //alert("Grand Tot : "+tot.TOTFAKTUR_NETTO+"-"+b+"+"+p+"="+grandtot);
                        console.clear();
                        console.log("Grand Tot = total netto - diskon global + ppn = " + tot.TOTFAKTUR_NETTO + "-" + b + "+" + p + "=" + grandtot);
                    } else {
                        //Jika Pakai Ongkir
                        grandtot = parseFloat(a) + parseFloat(tot.TOTFAKTUR_NETTO) - parseFloat(b) + parseFloat(p);
                        //alert("Grand Tot : "+a+"+"+tot.TOTFAKTUR_NETTO+"-"+b+"+"+p);
                        $('#GRANDTOT').val(grandtot);
                        console.log("Grand Tot = Ongkir + Total Faktur Bersih - Diskon Global + PPN = " + a + "+" + tot.TOTFAKTUR_NETTO + "-" + b + "+" + p);
                    }

                    //console.clear();
                    console.log("Menghitung HPP (Harga Pokok Penjualan)");
                    var ppnperitem;
                    var ppnperpcs;

                    var discglobalperitem;
                    var discglobalperpcs;
                    var diskonpcs = 0;
                    var ongkirperitem;
                    var ongkirperpcs;
                    var hppperpcs = 0;
                    var totharga = 0;
                    var detail = "";
                    //alert(data['message']);
                    //Create Tabel
                    /*detail+="\n+_______________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________";
                    detail+="\n| Nama Barang \t|Harga Beli(Perpcs)\t| Jumlah Beli (Pcs)\t|Total Harga \t| Diskon (Peritem)\t|Diskon (Perpcs)\t|Diskon Global(Peritem)\t|Diskon Global(Pepcs)\t|PPn (Peritem)\t|PPn(Perpcs)\t|Ongkir (Peritem)\t|Ongkir (Perpcs)\t|HPP Perpcs\t|Sub Total\t|";
                    detail+="\n+_______________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________";*/
                    for (var i = 0; i < jmlData; i++) {
                        hbeli = parseFloat(temp[i]["HBELI"]);
                        hdiskon = parseFloat(temp[i]["HDISKON"]);
                        subtotal = parseFloat(temp[i]["SUBTOTAL"]);
                        /*console.log("______Mencari Diskon Per Pcs "+temp[i]["NMBRG"]+" berdasarkan diskon peritem_______");
                        console.log("diskonperpcs = diskon / jml item");
                        diskonpcs = hdiskon/parseInt(temp[i]["JMLBELI"]);
                        console.log("diskonperpcs = "+hdiskon+" / "+temp[i]["JMLBELI"]+"="+diskonpcs);
                        diskonpcs = hdiskon/parseInt(temp[i]["JMLBELI"]);
                        console.log("diskonperpcs = "+hdiskon+" / "+temp[i]["JMLBELI"]+"="+diskonpcs);

                        console.log("\n\n______Mencari Diskon Per Item "+temp[i]["NMBRG"]+" berdasarkan diskon global_______");
                        console.log("discglobalperitem = (totalhargabeli / totalfaktur) x diskon global");
                        console.log("totalhargabeli=jumlahbeli*harga beli item");
                        console.log("Jadi Rumus Untuk mencari mencari diskon global peritem menjadi \n\n  discglobalperitem = ((jumlahbeli*harga beli item) / totalfaktur) x diskon global");
                        discglobalperitem=((parseInt(temp[i]["JMLBELI"])*hbeli)/parseFloat(tot.TOTFAKTUR))*parseFloat(b);
                        console.log("discglobalperitem = (("+temp[i]["JMLBELI"]+"*"+temp[i]["HBELI"]+") / "+tot.TOTFAKTUR+") x "+b+"="+discglobalperitem);

                        console.log("\n\n______Mencari Diskon Per Pcs "+temp[i]["NMBRG"]+" berdasarkan diskon Global_______");
                        console.log("discglobalperpcs = discglobalperitem/jumlah beli");
                        discglobalperpcs=discglobalperitem/parseInt(temp[i]["JMLBELI"]);
                        console.log("discglobalperpcs = "+discglobalperitem+"/"+temp[i]["JMLBELI"]+"="+discglobalperpcs);

                        console.log("\n\n______Mencari Ongkir Per Item "+temp[i]["NMBRG"]+"_______");
                        console.log("ongkirperitem = (totalhargabeli / totalfaktur) x Ongkir");
                        console.log("totalhargabeli=jumlahbeli*harga beli item");
                        console.log("Jadi Rumus Untuk mencari mencari Ongkir peritem menjadi \n\n  ongkirperitem = ((jumlahbeli*harga beli item) / totalfaktur) x Ongkir");
                        ongkirperitem=((parseInt(temp[i]["JMLBELI"])*hbeli)/parseFloat(tot.TOTFAKTUR))*parseFloat(a);
                        console.log("ongkirperitem = (("+temp[i]["JMLBELI"]+"*"+temp[i]["HBELI"]+") / "+tot.TOTFAKTUR+") x "+b+"="+ongkirperitem);

                        console.log("\n\n______Mencari Ongkir Per Pcs "+temp[i]["NMBRG"]+"_______");
                        console.log("ongkirperpcs = ongkirperitem/jumlah beli");
                        ongkirperpcs=ongkirperitem/parseInt(temp[i]["JMLBELI"]);
                        console.log("ongkirperpcs = "+ongkirperitem+"/"+temp[i]["JMLBELI"]+"="+ongkirperpcs);

                        console.log("\n\n______Mencari PPN Per Item "+temp[i]["NMBRG"]+"_______");
                        console.log("ppnperitem = (totalhargabeli / totalfaktur) x totalppn");
                        console.log("totalhargabeli=jumlahbeli*harga beli item");
                        console.log("Jadi Rumus Untuk mencari mencari PPN peritem menjadi \n\n  ppnperitem = ((jumlahbeli*harga beli item) / totalfaktur) x totalppn");
                        ppnperitem=((parseInt(temp[i]["JMLBELI"])*hbeli)/parseFloat(tot.TOTFAKTUR))*parseFloat(p);
                        console.log("ppnperitem = (("+temp[i]["JMLBELI"]+"*"+temp[i]["HBELI"]+") / "+tot.TOTFAKTUR+") x "+p+"="+ppnperitem);

                        console.log("\n\n______Mencari PPN Per Pcs "+temp[i]["NMBRG"]+"_______");
                        console.log("ppnperpcs = ppnperitem/jumlah beli");
                        ppnperpcs=ppnperitem/parseInt(temp[i]["JMLBELI"]);
                        console.log("ppnperpcs = "+ppnperitem+"/"+temp[i]["JMLBELI"]+"="+ppnperpcs);

                        console.log("\n\n______Mencari HPP Per Pcs "+temp[i]["NMBRG"]+"_______");
                        console.log("hppperpcs = hbeli-diskonperpcs-discglobalperpcs+ppnperpcs+ongkirperpcs");

                        hppperpcs = hbeli-diskonpcs-discglobalperpcs+ppnperpcs+ongkirperpcs;
                        console.log("hppperpcs = "+hbeli+"-"+diskonpcs+"-"+discglobalperpcs+"+"+ppnperpcs+"+"+ongkirperpcs+"="+hppperpcs);
                        totharga=parseInt(temp[i]["JMLBELI"])*hbeli;*/


                        //detail+="\n_____________________________________________________________________________________________________________________________________________________________________________________________________________";
                        /*detail+= "\n| "+temp[i]["NMBRG"] + "\t|"+currencyFormat(hbeli)+"\t|"+temp[i]["JMLBELI"]+"\t|"+currencyFormat(totharga)+"\t|"+currencyFormat(hdiskon)+"\t|"+currencyFormat(diskonpcs)+"\t|"+currencyFormat(discglobalperitem)+"\t|"+currencyFormat(discglobalperpcs)+"\t|"+currencyFormat(ppnperitem)+"\t|"+currencyFormat(ppnperpcs)+"\t|"+currencyFormat(ongkirperitem)+"\t|"+currencyFormat(ongkirperpcs)+"\t|"+currencyFormat(hppperpcs)+"\t|"+currencyFormat(subtotal)+"\t|";
                        detail+="\n________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________";*/

                        totharga = hbeli * parseFloat(temp[i]["JMLBELI"]);
                        discglobalperitem = totharga / parseFloat(tot.TOTFAKTUR) * parseFloat(b); //total harga / total faktur x total diskon global
                        ongkirperitem = totharga / parseFloat(tot.TOTFAKTUR) * parseFloat(a); //total harga / total faktur x total ongkir

                        if (x == "1") ppnperitem = 0;
                        else ppnperitem = (parseFloat(temp[i]["SUBTOTAL"]) - discglobalperitem) / 10;
                        hppperpcs = (parseFloat(temp[i]["SUBTOTAL"]) - discglobalperitem + ongkirperitem + ppnperitem) / parseFloat(temp[i]["JMLBELI"]);
                        hjual = 1.2 * hppperpcs;
                        tabel += "<tr>";
                        tabel += "<td>" + temp[i]["NMBRG"] + "</td>";
                        tabel += "<td>" + currencyFormat(hbeli) + "</td>";
                        tabel += "<td>" + temp[i]["JMLBELI"] + "</td>";
                        tabel += "<td>" + currencyFormat(hdiskon) + "</td>";
                        tabel += "<td>" + currencyFormat(discglobalperitem) + "</td>";
                        tabel += "<td>" + currencyFormat(ppnperitem) + "</td>";
                        tabel += "<td>" + currencyFormat(hppperpcs) + "</td>";
                        tabel += "<td>" + currencyFormat(hjual) + "</td>";
                        tabel += "<td>" + currencyFormat(subtotal) + "</td>";
                        tabel += '<td class=\'text-right\'>';
                        tabel += '<button type=\'button\' class=\'btn btn-danger btn-sm\' onclick=\'hapusTemp("' + temp[i]["IDX"] + '")\'><span class=\'fa fa-remove\' ></span> Hapus</button></td>';
                        tabel += "</tr>";

                        konf += "<tr>";
                        konf += "<td>" + temp[i]["NMBRG"] + "</td>";
                        konf += "<td>" + currencyFormat(hbeli) + "</td>";
                        konf += "<td>" + temp[i]["JMLBELI"] + "</td>";
                        konf += "<td>" + currencyFormat(hdiskon) + "</td>";
                        konf += "<td>" + currencyFormat(discglobalperitem) + "</td>";
                        konf += "<td>" + currencyFormat(ppnperitem) + "</td>";
                        konf += "<td>" + currencyFormat(hppperpcs) + "</td>";
                        konf += "<td>" + currencyFormat(hjual) + "</td>";
                        konf += "<td>" + currencyFormat(subtotal) + "</td>";
                        konf += "</tr>";
                    }
                    $('#getTemp').html(tabel);
                    $('#getTempKonfirmasi').html(konf);
                    /*console.log("\n\n________________________________Detail Perhitungan_______________________________________");
                    console.log(detail);*/

                }
            }
        });
    }

    function emptyTemp() {
        $.ajax({
            url: "<?php echo base_url() . 'farmasi.php/trans_pembelian/emptyTemp' ?>",
            success: function(data) {
                getTemp();
            },
            error: function(xhr, ajaxOption, thrownError) {
                console.log('Response : ' + thrownError);
            }
        });
    }

    function pilihObat(a, b) {
        $('#KDBRG').val(a);
        $('#NMBRG').val(urldecode(b));
        $('#EXPDATE').val("");
        $('#HBELI').val("0");
        $('#JMLBELI').val("0");
        $('#HDISKON').val("0");
        $('#P_DISKON').val("0");
        $('#SUBTOTAL').val("0");
        $('#formModal').modal('hide');
        $('#EXPDATE').focus();
    }

    function hapusTemp(a) {
        //alert(a);
        var message = "Apakah anda yakin akan menghapus data ini?";
        //alert(x);
        //return false;
        swal({
                title: "Konfirmasi",
                text: message,
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo base_url() . 'farmasi.php/trans_pembelian/hapusTemp' ?>",
                        type: "POST",
                        data: {
                            IDX: a
                        },
                        dataType: "JSON",
                        success: function(data) {
                            $('.csrf').val(data.csrf);
                            tampilkanPesan('success', data.message);
                            getTemp();
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(jqXHR.responseText);
                        }
                    });
                } else {
                    tampilkanPesan('warning', 'Data Tidak Jadi di hapus');
                }

            }
        );
    }

    function urlencode(str) {
        str = (str + '').toString();
        return encodeURIComponent(str)
            .replace(/!/g, '%21')
            .replace(/'/g, '%27')
            .replace(/\(/g, '%28')
            .replace(/\)/g, '%29')
            .replace(/\*/g, '%2A')
            .replace(/%20/g, '+');
    }

    function urldecode(str) {
        return decodeURIComponent((str + '').replace(/%(?![\da-f]{2})/gi, function() {
            return '%25'
        }).replace(/\+/g, '%20'))
    }
</script>

<script src="<?php echo base_url() ?>js/farmasi.js"></script>