<style>
    .widget-report .widget-user-header {
        padding: 5px 10px;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
    }
</style>
<section class="content container-fluid">
    <div class="row">
        <?php echo $sub_menu; ?>

        <div class="col-md-6">
            <div class="box box-widget widget-report">
                <div class="widget-user-header bg-aqua-active">
                    <h3><?php echo $contentTitle ?></h3>
                </div>
                <div class="box-body">
                    <form id="form1" class="form-horizontal" action="#" method="post" onsubmit="return false">
                        <div class="col-md-3">Nama Pasien</div>
                        <div class="col-md-9">
                            <div class="input-group">
                                <span class="input-group-addon" style="width: 150px;">
                                    <input readonly="" type="text" name="NOMR" id="NOMR" class="form-control" />
                                </span>
                                <span class="input-group-addon">
                                    <button class="btn btn-primary btn-sm" type="button" id="SEARCH_PASIEN" tabindex="2">
                                        <i class="fa fa-seach"></i>Cari</button>
                                </span>
                                <span class="input-group-addon" style="width:150px">
                                    <input readonly="" type="text" name="NMPASIEN" id="NMPASIEN" class='form-control' />
                                </span>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-3">Tanggal Masuk</div>
                        <div class="col-md-9">
                            <input type="text" name="tglAwal" id="tglAwal" class="form-control tanggal" placeholder="__-__-____" />
                        </div>
                        <br>
                        <div class="col-md-3">Tanggal Keluar</div>
                        <div class="col-md-9">
                            <input type="text" name="tglAkhir" id="tglAkhir" class="form-control tanggal" placeholder="__-__-____" />
                        </div>
                        <br>
                        <div class="col-md-3">Jenis Pasien</div>
                        <div class="col-md-9">
                            <select name="KDJPASIEN" id="KDJPASIEN" class="form-control">
                                <?php foreach ($datjenis_pasien->result_array() as $y) { ?>
                                    <option value="<?php echo $y['idx'] ?>"><?php echo $y['cara_bayar'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>
                        <div class="col-md-3">Jenis Layanan</div>
                        <div class="col-md-9">
                            <select name="KDPELAYANAN" id="KDPELAYANAN" class='form-control'>
                                <option value="RJ">Rawat Jalan</option>
                                <option value="GD">Gawat Darurat</option>
                                <option value="RI">Rawat Inap</option>
                                <option value="PJ">Penunjang</option>
                            </select>
                        </div>
                        <div class="col-md-3">&nbsp</div>
                        <div class="col-md-9">
                            <button type="button" id="cetak" class="btn"><i class="icon-print"></i> Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div id="dialogPasien" class="modal fade" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cari Pasien</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="form1" action="#" method="get" class="form-horizontal" onsubmit="return false">
                            <div class="input-group ">
                                <input type="text" name="Keywords" id="Keywords" class="form-control" placeholder="Enter No MR atau Nama Pasien" />
                                <input type="hidden" name="encryptdata" id="encryptdata" value="">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default" onclick="cariKeywords()">
                                        <i class="fa fa-search"></i> Cari Rujukan</button>
                                </div>
                            </div>

                        </form>
                        <div style="border-style: double;height: 250px;padding: 2px;overflow: scroll;">
                            <table class="table table-bordered table-striped" style="font-size: 1.2em">
                                <thead>
                                    <tr>
                                        <th width="100px">No MR</th>
                                        <th>Nama Pasien</th>
                                        <th width="120px">Jenis Kelamin</th>
                                        <th width="120px">DOB</th>
                                        <th>Alamat</th>
                                        <th width="70px">#</th>
                                    </tr>
                                </thead>
                                <tbody id="getDataPasienCari"></tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
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
        $('.tanggal').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        });
        $('.tanggal').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy"
        });

        function setInput() {
            $('#NOMR').val('');
            $('#NMPASIEN').val('');
            $('#tglAwal').val('<?php echo date('d-m-Y'); ?>');
            $('#tglAkhir').val('<?php echo date('d-m-Y'); ?>');
            $('#KDJPASIEN').prop('selectedIndex', 0);
            $('#KDPELAYANAN').prop('selectedIndex', 0);
        }
        setInput();
        $('#SEARCH_PASIEN').click(function() {
            $('#NOMR').val("");
            $('#NMPASIEN').val("");

            $('#Keywords').val('');
            $('#getDataPasienCari').html("");
            $("#dialogPasien").modal("show");
        });
        $('#Keywords').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var a = $('#Keywords').val();
                $.ajax({
                    url: "<?php echo base_url() . 'farmasi.php/laporan_penjualan/getPasien' ?>",
                    type: "POST",
                    data: {
                        KEYWORDS: a
                    },
                    beforeSend: function() {
                        $('#getDataPasienCari').html("<tr><td colspan=6>Loading ... Please Wait</td></tr>");
                    },
                    success: function(data) {
                        $('#getDataPasienCari').html(data);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        alert(errorThrown);
                    }
                });
            }
        });

        $('#tglAwal').focus(function() {
            $(this).select()
        });
        $('#tglAkhir').focus(function() {
            $(this).select()
        });
        $('#tglAwal').blur(function() {
            var x = $(this).val();
            if (x == "") {
                $(this).val('<?php echo date('d-m-Y'); ?>');
            }
            if (x.length < 10) {
                $(this).val('<?php echo date('d-m-Y'); ?>');
            }
        });
        $('#tglAkhir').blur(function() {
            var x = $(this).val();
            if (x == "") {
                $(this).val('<?php echo date('d-m-Y'); ?>');
            }
            if (x.length < 10) {
                $(this).val('<?php echo date('d-m-Y'); ?>');
            }
        });
        $('#tglAwal').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#tglAkhir').focus();
            }
        });
        $('#tglAkhir').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#KDJPASIEN').focus();
            }
        });

        $('#cetak').click(function() {
            var a = $('#NOMR').val();
            var b = $('#tglAwal').val();
            var c = $('#tglAkhir').val();
            var d = $('#KDJPASIEN').val();
            var e = $('#KDPELAYANAN').val();
            openInNewTab("<?php echo base_url() . 'farmasi.php/laporan_penjualan/cetak_1?nmr=' ?>" + a + "&tAwal=" + b + "&tAkhir=" + c + "&kdj=" + d + "&kdp=" + e);
        });

        function openInNewTab(url) {
            var win = window.open(url, '_blank');
            win.focus();
        }
    });

    function cariKeywords() {
        var a = $('#Keywords').val();
        $.ajax({
            url: "<?php echo base_url() . 'farmasi.php/laporan_penjualan/getPasien' ?>",
            type: "POST",
            data: {
                KEYWORDS: a
            },
            beforeSend: function() {
                $('#getDataPasienCari').html("<tr><td colspan=6>Loading ... Please Wait</td></tr>");
            },
            success: function(data) {
                $('#getDataPasienCari').html(data);
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                alert(errorThrown);
            }
        });
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


    function setPasien(a, b) {
        $('#NOMR').val(a);
        $('#NMPASIEN').val(urldecode(b));
        $('#dialogPasien').modal('hide');
        $('#tglAwal').focus();
    }
</script>