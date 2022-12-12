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
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<div class="row">
    <section class="invoice">
        <!-- title row -->
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="panel panel-warning">
                <div class="panel-body">
                    <?= $this->session->flashdata('message') ?>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> RSUD Kota Padang Panjang.
                    <small class="pull-right">Date: <?= $DTBL ?></small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong><?= $NMSUPPLIER ?>.</strong><br>
                    <?= $ALAMAT . "<br>" . $KOTA; ?>
                    Phone: <?= $CONTACTP ?><br>
                    Email: <?= $EMAIL ?>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong><?= COMPANY_NAME ?></strong><br>
                    <?= REPORT_ADDRESS_1 ?><br>
                    Phone: <?= REPORT_ADDRESS_2 ?><br>
                    Email: <?= EMAIL ?>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <form action="#" method="POST">
                    <b>No Faktur #<?= $NOFAKTUR ?></b>
                    <div class="input-group ">
                        <input type="hidden" name="faktur_lama" id="faktur_lama" value="<?php echo $NOFAKTUR ?>">
                        <input type="hidden" name="KDBL" id="KDBL" value="<?php echo $KDBL ?>">
                        <input type="text" id="NOFAKTUR" name="NOFAKTUR" class="form-control pull-right" placeholder="No Faktur Baru" value="<?php echo $NOFAKTUR ?>">
                        <div class="input-group-btn">
                            <button type="button" id="btnUpdate" class="btn btn-primary" onclick="updateNoFaktur()">
                                <i class="fa fa-floppy-o"></i> Update</button>
                            <?php
                            if ($LOCK == 0) {
                            ?>
                                <button class="btn btn-success" type="button" onclick="lock('<?= $KDBL ?>')"><i class="fa fa-unlock-alt"></i></button>
                            <?php
                            } else {
                            ?>
                                <button class="btn btn-danger" type="button" onclick="unlock('<?= $KDBL ?>')"><i class="fa fa-lock"></i></button>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </form>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Tgl EXP</th>
                            <th class='text-right'>Harga Beli</th>
                            <th class='text-right'>Jumlah Beli</th>
                            <th class='text-right'>Stok</th>
                            <th class='text-right'>Diskon</th>
                            <th class='text-right'>Diskon Global / Item</th>
                            <th class='text-right'>Ongkir / Item</th>
                            <th class='text-right'>PPN / Item <?= $JENIS_TRANS ?></th>
                            <th class='text-right'>HPP</th>
                            <th class='text-right'>Sub Total</th>
                            <?php if ($LOCK == 1) echo "<th class='text-right'>#</th>" ?>
                        </tr>
                    </thead>
                    <tbody id='getTemp'>
                        <?php
                        $grandtotal = 0;
                        foreach ($detail as $d) {
                            $grandtotal += $d->SUBTOTAL;
                            $totfaktur = $TOTFAKTUR;
                            $totalharga = $d->JMLBELI * $d->HBELI;
                            $disc_global_peritem = ($totalharga / $totfaktur) * $DISKON_GLOBAL;
                            $ongkir_per_item = ($totalharga / $totfaktur) * $ONGKIR;
                            if ($JENIS_TRANS == 2) {
                                $ppn_peritem = ($d->SUBTOTAL - $d->HDISKON - $disc_global_peritem) / 10;
                            } else {
                                $ppn_peritem = 0;
                            }
                            $hpp_perpcs = ($d->SUBTOTAL - $d->HDISKON - $disc_global_peritem + $ongkir_per_item + $ppn_peritem) / $d->JMLBELI;

                            $JSTOK = $this->pembelian_model->cekStok($d->KDBRG, $KDLOKASI, $TGLMASUK, $d->EXPDATE, $d->HMODAL)
                            /*if (x == "1") ppnperitem = 0;
                        else ppnperitem = (parseFloat(temp[i]["SUBTOTAL"]) - discglobalperitem) / 10;
                        hppperpcs = (parseFloat(temp[i]["SUBTOTAL"]) - discglobalperitem + ongkirperitem + ppnperitem) / parseFloat(temp[i]["JMLBELI"]);
                        hjual = 1.2 * hppperpcs;*/
                        ?>
                            <tr>
                                <td><button class="btn btn-success btn-sm" type='button' onclick="showLog('<?= $d->IDX ?>','<?= $d->KDBRG ?>','<?= $d->HMODAL ?>','<?= $d->EXPDATE ?>','<?= $d->HBELI ?>','<?= $d->TGLBELI ?>')"><span class='fa fa-plus icon' id="icon<?= $d->IDX ?>"></span></button></td>
                                <td><?= $d->KDBRG; ?></td>
                                <td><?= $d->NMBRG; ?></td>
                                <td><?= $d->EXPDATE; ?></td>
                                <td class='text-right'>Rp. <?= number_format($d->HBELI, 2, ',', '.') ?></td>
                                <td class='text-right'><?= $d->JMLBELI  ?></td>
                                <td class='text-right'><?= $JSTOK ?></td>
                                <td class='text-right'>Rp. <?= number_format($d->HDISKON, 2, ',', '.') ?></td>
                                <td class='text-right'>Rp. <?= number_format($disc_global_peritem, 2, ',', '.') ?></td>
                                <td class='text-right'>Rp. <?= number_format($ongkir_per_item, 2, ',', '.') ?></td>
                                <td class='text-right'>Rp. <?= number_format($ppn_peritem, 2, ',', '.') ?></td>
                                <td class='text-right'>Rp. <?= number_format($hpp_perpcs, 2, ',', '.') . "/" . number_format($d->HMODAL, 2, ',', '.') ?></td>
                                <td class='text-right'>Rp. <?= number_format($d->SUBTOTAL, 2, ',', '.') ?>
                                    <input type="hidden" name="show<?= $d->IDX ?>" id="show<?= $d->IDX ?>" value='0'></td>
                                <?php if ($LOCK == 1) echo "<th class='text-right'><button type='button' class = 'btn btn-danger' onclick='editFaktur(\"" . $d->IDX . "\",\"" . $d->KDBL . "\")'><span class = 'fa fa-pencil'></span></button></th>" ?>
                            </tr>

                            <tr>
                                <td colspan="8" class='detail' id="detail<?= $d->IDX ?>" style="display: none;padding-left:50px;">
                                    <table class='table table-bordered'>
                                        <tr class='bg-green'>
                                            <td>NOREFF</td>
                                            <td>TGL TRANS</td>
                                            <td>JENIS TRANSAKSI</td>
                                            <td>DESKRIPSI</td>
                                            <td>JUMLAH BARANG</td>
                                            <td>SISA</td>
                                        </tr>
                                        <tbody id="detail_data<?= $d->IDX ?>"></tbody>
                                    </table>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">

            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Total</th>
                            <td class='pull-right'>Rp. <?= number_format($grandtotal, 2, ',', '.') ?>

                                <input type="hidden" id="TOTFAKTUR" name="TOTFAKTUR" value="<?= $TOTFAKTUR ?>">
                            </td>
                        </tr>
                        <tr>
                            <th style="width:50%">Total Diskon</th>
                            <td class='pull-right'>Rp. <?= number_format($TOTDISKON_ITEM, 2, ',', '.') ?>
                                <input type="hidden" id="TOTDISKON_ITEM" name="TOTDISKON_ITEM" value="<?= $TOTDISKON_ITEM ?>">
                            </td>
                        </tr>
                        <tr>
                            <th style="width:50%">Diskon Global</th>
                            <td class='pull-right'>Rp. <?= number_format($DISKON_GLOBAL, 2, ',', '.') ?>

                                <input type="hidden" id="DISKON_GLOBAL" name="DISKON_GLOBAL" value="<?= $DISKON_GLOBAL ?>">

                            </td>

                        </tr>
                        <tr>
                            <th style="width:50%">Total PPN</th>
                            <td class='pull-right'>Rp. <?= number_format($TOTPPN, 2, ',', '.') ?>
                                <input type="hidden" id="JENIS_TRANS" name="JENIS_TRANS" value="<?= $JENIS_TRANS ?>">
                                <input type="hidden" id="TOTPPN" name="TOTPPN" value="<?= $TOTPPN ?>">
                            </td>
                        </tr>
                        <tr>
                            <th style="width:50%">Ongkir</th>
                            <td class='pull-right'>Rp. <?= number_format($ONGKIR, 2, ',', '.') ?>
                                <input type="hidden" id="ONGKIR" name="ONGKIR" value="<?= $ONGKIR ?>">
                            </td>
                        </tr>
                        <tr>
                            <th style="width:50%">Grand Total</th>
                            <td class='pull-right'>Rp. <?= number_format($GRANDTOT, 2, ',', '.') ?>
                                <input type="hidden" id="GRANDTOT" name="GRANDTOT" value="<?= $GRANDTOT ?>">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <!--div class="col-xs-12">
                <a href="" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                <button type="button" class="btn btn-success pull-right">
                    <i class="fa fa-credit-card"></i> Submit Payment
                </button>
                <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-download"></i> Generate PDF
                </button>
            </div-->
        </div>
    </section>
</div>

<div class="modal fade" id="modal_edit_transaksi" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog ">
        <div class="modal-content modal-xs">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Transaksi</h4>
            </div>

            <div class="modal-body">
                <div id="pin">
                    <form id="form_pin" action="#" method="post" onsubmit="return false">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-warning">
                                    <div class="panel-body">
                                        Untuk mengedit transaksi masukkan PIN, jika anda belum memiliki PIN Silahkan minta kepada admin farmasi
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <div class="input-group ">
                                        <input type="hidden" name="PINIDX" id="PINIDX" value="">
                                        <input type="hidden" name="PINKDBL" id="PINKDBL" value="<?= $KDBL ?>">
                                        <input type="hidden" name="PINKDLOKASI" id="PINKDLOKASI" value="<?= $KDLOKASI ?>">
                                        <input type="hidden" name="TGLTERIMA" id="TGLTERIMA" value="<?= $TGLMASUK ?>">
                                        <input type="password" id="PIN" name="PIN" class="form-control pull-right" placeholder="Masukkan PIN" value="">
                                        <div class="input-group-btn">
                                            <button class="btn btn-success" type="button" onclick="cekPin()"><i class="fa fa-unlock-alt"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
                <form id="form2" action="#" method="post" style="display: none;" onsubmit="return false">
                    <div class="container-fluid">
                        <!--form id="form" method="POST" action=""-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4 text-right"><label>NAMA BARANG </label></div>
                                <div class="col-xs-8">
                                    <input type="hidden" name="IDX" id="IDX" value="">
                                    <input type="hidden" name="KDBRG" id="KDBRG" value="">
                                    <input type="hidden" name="KDBL" id="KDBL" value="<?= $KDBL ?>">
                                    <input type="hidden" name="KDLOKASI" id="KDLOKASI" value="<?= $KDLOKASI ?>">
                                    <input type="hidden" name="TGLMASUK" id="TGLMASUK" value="<?= $TGLTERIMA ?>">
                                    <input type="hidden" name="KDLOKASI" id="KDLOKASi" value="<?= $KDLOKASI ?>">
                                    <input type="text" readonly name="NMBRG" id="NMBRG" class="form-control" value="">
                                    <!--input type="text" name="DISKON_GLOBAL" id="DISKON_GLOBAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'autoGroup': true,  'placeholder': '0'"/-->
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4 text-right"><label>TGL EXPIRE </label></div>
                                <div class="col-xs-8">
                                    <input type="hidden" name="OLDEXPDATE" id="OLDEXPDATE" class="form-control" value="" />
                                    <input type="text" name="EXPDATE" id="EXPDATE" class="form-control tanggal" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4 text-right"><label>JMl BELI (PCS) </label></div>
                                <div class="col-xs-8">
                                    <input type="hidden" name="OLDJMLBELI" id="OLDJMLBELI" value="" />
                                    <input type="text" name="JMLBELI" id="JMLBELI" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4 text-right"><label>HARGA BELI (PCS)</label></div>
                                <div class="col-xs-8">
                                    <input type="hidden" name="OLDHBELI" id="OLDHBELI" value="" />
                                    <input type="text" name="HBELI" id="HBELI" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4 text-right"><label>DISKON (Rp)</label></div>
                                <div class="col-xs-8">
                                    <input type="hidden" name="OLDHDISKON" id="OLDHDISKON" value="" />
                                    <input type="text" name="HDISKON" id="HDISKON" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal','groupSeparator': ',', 'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" />
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4 text-right"><label>HARGA MODAL (PCS)</label></div>
                                <div class="col-xs-8">
                                    <input type="hidden" name="OLDHMODAL" id="OLDHMODAL" value='' />
                                    <input type="text" readonly name="HMODAL" id="HMODAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" />
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4 text-right"><label>HARGA JUAL (PCS)</label></div>
                                <div class="col-xs-8">

                                    <input type="text" readonly name="HJUAL" id="HJUAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4 text-right"><label>SUB TOTAL </label></div>
                                <div class="col-xs-8">
                                    <input type="text" name="SUBTOTAL" id="SUBTOTAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal','groupSeparator': ',', 'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4 text-right"><label>PPN(10%) </label></div>
                                <div class="col-xs-8">
                                    <input type="hidden" name="PPN" id="PPN" value="0.1">
                                    <input type="text" name="JUMLAH_PPN" id="JUMLAH_PPN" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal','groupSeparator': ',', 'autoGroup': true, 'digits': 4, 'digitsOptional': false, 'placeholder': '0'" readonly />
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4 text-right"><label>STOK </label></div>
                                <div class="col-xs-8">
                                    <input type="text" name="JSTOK" id="JSTOK" class="form-control inputmask rightAlign" readonly />
                                </div>

                            </div>
                        </div>
                        <!--/form-->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="update" onclick="update()" disabled>Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript">
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

        $('#EXPDATE').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#JMLBELI').focus();
            }
        });

        $('#JMLBELI').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#HBELI').focus();
            }
        });
        $('#HBELI').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#HDISKON').focus();
            }
        });
        $('#HDISKON').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#update').focus();
            }
        });
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

        $('#JMLBELI').keypress(function(ev) {
            calcSummaryItem();
        });

        $('#JMLBELI').keydown(function(ev) {
            calcSummaryItem();
        });

        $('#HDISKON').keypress(function(ev) {
            calcSummaryItem();
        });

        $('#HDISKON').keydown(function(ev) {
            calcSummaryItem();
        });

        $('#HBELI').keypress(function(ev) {
            calcSummaryItem();
        });
        $('#HBELI').keydown(function(ev) {
            calcSummaryItem();
        });
    });

    function currencyFormat(num) {
        //var myarr = num.split(".");
        //var n=parseFloat(myarr[0]);
        return 'Rp. ' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
    }

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
    }

    function calcSummaryItem() {
        console.clear();
        var hbeli = $('#HBELI').val().replace(',', '').replace(',', '').replace(',', '');
        var jbeli = $('#JMLBELI').val().replace(',', '').replace(',', '').replace(',', '');
        //var hargaBeliItem = parseFloat(hbeli);
        //hargaBeliItem = (hargaBeliItem == '' || isNaN(hargaBeliItem)) ? 0 : hargaBeliItem;
        //$('#HBELI').val(hargaBeliItem);

        var jmlBeliItem = parseFloat(jbeli);
        jmlBeliItem = (jmlBeliItem == '' || isNaN(jmlBeliItem)) ? 0 : jmlBeliItem;
        $('#JMLBELI').val(jmlBeliItem);
        hbeli = (hbeli == '' || isNaN(hbeli)) ? 0 : hbeli;
        jbeli = (jbeli == '' || isNaN(jbeli)) ? 0 : jbeli;
        var g = $('#HDISKON').val().replace(',', '').replace(',', '').replace(',', '');
        g = (g == '' || isNaN(g)) ? 0 : g;
        console.log("Diketahui : ")
        console.log('HBELI(PCS) = ' + hbeli);
        console.log('JBELI(PCS) = ' + jbeli);
        console.log('DISKON (ITEM) = ' + g);

        var HARGA_FIX_DISKON = (parseFloat(hbeli) * parseFloat(jbeli)) - parseFloat(g);

        console.log("")
        console.log("_______________Mencari HBELI(Item)_______________")
        console.log("")
        console.log('HBELI(Item) = ( HBELI(PCS)) x JBELI(PCS) ) - DISKON (Item)');
        console.log('HBELI(Item) = ' + hbeli + ' x ' + jbeli + ') - ' + g + '');
        console.log('HBELI(Item) = ' + HARGA_FIX_DISKON + '');

        var PPN = $('#PPN').val();
        JUMLAH_PPN = parseFloat(PPN) * HARGA_FIX_DISKON;
        $('#JUMLAH_PPN').val(JUMLAH_PPN);
        console.log("_______________Menghitung PPN(Item)_______________");
        console.log("PPN(Item) = 0.1 x HBELI(Item)");
        console.log("PPN(Item) = 0.1 x " + HARGA_FIX_DISKON);
        console.log('PPN(Item) = ' + JUMLAH_PPN);
        console.log("_______________Menghitung PPN(Pcs)_______________");
        console.log("PPN(Pcs) = PPN(Item) / JML_BELI(PCS)");
        PPN_PCS = JUMLAH_PPN / jbeli;
        console.log("PPN(Pcs) = " + JUMLAH_PPN + "/" + jbeli)
        console.log("PPN(Pcs) = " + PPN_PCS);

        console.log("_______________Menghitung HPP(Item)_______________");
        var HARGA_FIX_PPN_DISC = HARGA_FIX_DISKON + JUMLAH_PPN;
        console.log("HPP(Item)= HBELI(Item) + PPN(Item)");
        console.log("HPP(Item)=" + HARGA_FIX_DISKON + " + " + JUMLAH_PPN)
        console.log("HPP(Item)=" + HARGA_FIX_PPN_DISC)

        console.log("_______________Menghitung HPP(Pcs)_______________");
        var HARGA_MODAL_PCS = HARGA_FIX_PPN_DISC / jbeli;
        console.log("HPP(Pcs)=HPP(Item)/JBELI(PCS)");
        console.log("HPP(Pcs)=" + HARGA_FIX_PPN_DISC + "/" + jbeli);
        console.log("HPP(Pcs)=" + HARGA_MODAL_PCS);
        $('#HMODAL').val(HARGA_MODAL_PCS);

        console.log("_______________Menghitung HJUAL(Pcs)_______________");
        var HARGA_JUAL = 1.2 * HARGA_MODAL_PCS;
        console.log("HJUAL(Pcs) = 1.2 x HPP(Pcs)");
        console.log("HJUAL(Pcs) = 1.2 x " + HARGA_MODAL_PCS + " = " + HARGA_JUAL);
        console.log("HJUAL(Pcs) = " + HARGA_JUAL);
        $('#HJUAL').val(parseFloat(HARGA_JUAL));
        console.log("_______________Menghitung SUBTOTAL_______________");
        console.log("SUBTOTAL(Item) = HBELI(Item)");
        console.log("SUBTOTAL(Item) = " + HARGA_FIX_DISKON);
        var subtotal = (parseFloat(hbeli) * parseFloat(jbeli)) - parseFloat(g);
        subtotal = (subtotal == '' || isNaN(subtotal)) ? 0 : subtotal;
        $('#SUBTOTAL').val(subtotal);
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

    var base_url = "<?php echo base_url() . "farmasi.php/" ?>";

    function update() {
        var url;
        url = base_url + "trans_pembelian/update_transaksi";
        var formData = new FormData($('#form2')[0]);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'JSON',
            success: function(data) {
                if (data["status"] == 200) {
                    tampilkanPesan('success', data['message']);
                } else {
                    tampilkanPesan('warning', data['message']);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal({
                    title: "Terjadi Kesalahan ",
                    text: "Gagal Menyimpan Data",
                    type: "error",
                    timer: 5000
                });
            }
        });
    }

    function getTemp() {
        var url = "<?= base_url() . "farmasi.php/"; ?>" + "trans_pembelian/datatemp";
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
                //menghitung jumlah data
                console.clear();
                console.log(data);
                if (data["status"] == true) {
                    var temp = data["temp"];
                    var tot = data["tot"];
                    var jmlData = temp.length;
                    var tabel = "";
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
                    var no = 0;
                    for (var i = 0; i < jmlData; i++) {
                        no++;
                        hbeli = parseFloat(temp[i]["HBELI"]);
                        hdiskon = parseFloat(temp[i]["HDISKON"]);
                        subtotal = parseFloat(temp[i]["SUBTOTAL"]);

                        totharga = hbeli * parseFloat(temp[i]["JMLBELI"]);
                        discglobalperitem = totharga / parseFloat(tot.TOTFAKTUR) * parseFloat(b);
                        ongkirperitem = totharga / parseFloat(tot.TOTFAKTUR) * parseFloat(a);
                        if (x == "1") ppnperitem = 0;
                        else ppnperitem = (parseFloat(temp[i]["SUBTOTAL"]) - discglobalperitem) / 10;
                        hppperpcs = (parseFloat(temp[i]["SUBTOTAL"]) - discglobalperitem + ongkirperitem + ppnperitem) / parseFloat(temp[i]["JMLBELI"]);
                        hjual = 1.2 * hppperpcs;
                        tabel += "<tr>";
                        tabel += "<td>" + no + "</td>";
                        tabel += "<td>" + temp[i]["KDBRG"] + "</td>";
                        tabel += "<td>" + temp[i]["NMBRG"] + "</td>";
                        tabel += "<td>" + temp[i]["EXPDATE"] + "</td>";
                        tabel += "<td class='text-right'>" + currencyFormat(hbeli) + "</td>";
                        tabel += "<td class='text-right'>" + temp[i]["JMLBELI"] + "</td>";
                        tabel += "<td class='text-right'>" + currencyFormat(hdiskon) + "</td>";
                        //tabel += "<td>" + currencyFormat(discglobalperitem) + "</td>";
                        //tabel += "<td>" + currencyFormat(ppnperitem) + "</td>";
                        //tabel += "<td>" + currencyFormat(hppperpcs) + "</td>";
                        //tabel += "<td>" + currencyFormat(hjual) + "</td>";
                        tabel += "<td class='text-right'>" + currencyFormat(subtotal) + "</td>";
                        tabel += '<td class=\'text-right\'>';
                        tabel += '<button type=\'button\' class=\'btn btn-danger btn-sm\' onclick=\'editFaktur("' + temp[i]["IDX"] + '")\'><span class=\'fa fa-pencil\' ></span> Edit</button></td>';
                        tabel += "</tr>";
                    }
                    $('#getTemp').html(tabel);
                }
            }
        });
    }
    <?php
    //if ($LOCK == 1) echo "getTemp()";
    ?>
</script>

<script src="<?php echo base_url() ?>js/farmasi.js"></script>