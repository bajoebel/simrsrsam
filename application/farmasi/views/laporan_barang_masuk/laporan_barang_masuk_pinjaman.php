<style>
    .table td.centerObj {
        text-align: center;
    }

    .table td.rightObj {
        text-align: right;
    }

    .table td {
        font-size: 0.9em;
    }

    span {
        text-align: left;
    }

    .icon a {
        font-size: 0.9em;
    }

    body .modal {
        width: 80%;
        margin-left: -40%;
    }

    .modal-dialog {
        overflow-y: initial !important
    }

    .modal-body {
        max-height: calc(100vh - 250px);
        overflow-y: auto;
    }

    .table th {
        font-size: 0.9em;
    }

    div#pagination {
        float: right;
    }

    .left {
        float: left;
    }

    .right {
        float: right;
        text-align: right;
        z-index: -9999;
    }

    #searchTable {
        float: right;
        position: relative;
        top: 0px;
        z-index: 0;
    }

    div#searchTable input[type="text"] {
        background-color: #fff;
        border-left: 1px solid #e3ebed;
        border: 1px solid #e3ebed;
        border-radius: 0;
        line-height: 24px;
        font-size: 0.9em;
    }

    div#searchTable select {
        width: 200px;
        background-color: #fff;
        border-left: 1px solid #e3ebed;
        border: 1px solid #e3ebed;
        border-radius: 0;
        line-height: 24px;
        font-size: 0.9em;
    }

    #searchTable button#keywordButton {
        background-color: #2e363f;
        border: 0 none;
        margin-left: -5px;
        margin-top: -11px;
        padding: 5px 10px;
    }

    #searchTable button#Inquery {
        margin-left: 5px;
        margin-top: -11px;
    }

    #filter {
        margin-top: 5px;
        float: right;
        width: 100px;
    }

    .table.transObat td {
        padding: 0px;
        border: none;
        padding: 0px 8px;
    }

    .widget-box {
        border: none;
    }

    .rataKanan {
        text-align: right;
    }

    .select2-container {
        margin-bottom: 10px;
    }
</style>
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-widget widget-report">
                <div class="widget-user-header bg-aqua-active">
                    <h3><?php echo $contentTitle ?></h3>
                </div>

                <div class="box-body">
                    <h2>Laporan Pembelian</h2>
                    <form id="form1" action="#" method="post" onsubmit="return false">
                    <div class="form-group">
                        
                    </div>
                        <table style="width: auto">
                            <tr>
                                <td width="100px">Supplier</td>
                                <td width="10px"> : </td>
                                <td width="400px">
                                    <select name="KDSUPPLIER" id="KDSUPPLIER" class="form-control">
                                        <option value="ALL">-- Semua Supplier --</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Periode Awal</td>
                                <td> : </td>
                                <td>
                                    <input type="text" name="tglAwal" id="tglAwal" class='form-control tanggal' placeholder="____-__-__" style="width: 100px;" />
                                </td>
                            </tr>
                            <tr>
                                <td>Periode Akhir</td>
                                <td> : </td>
                                <td>
                                    <input type="text" name="tglAkhir" id="tglAkhir" class='form-control tanggal' placeholder="____-__-__" style="width: 100px;" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                                <td>
                                    <button type="button" id="cetak" class="btn"><i class="icon-print"></i> Cetak</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tglAwal').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        });
        $('#tglAkhir').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        });
        $('.tanggal').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy"
        });
        /*$('#tglAwal').datepicker({
            dateFormat: "dd-mm-yyyy",
            changeMonth: true,
            changeYear: true
        });
        $('#tglAkhir').datepicker({
            dateFormat: "dd-mm-yyyy",
            changeMonth: true,
            changeYear: true
        });*/

        $('#tglAwal').val('<?php echo date('d-m-Y'); ?>');
        $('#tglAkhir').val('<?php echo date('d-m-Y'); ?>');

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
                $('#cetak').click();
            }
        });
        $('#cetak').click(function() {
            var a = $('#tglAwal').val();
            var b = $('#tglAkhir').val();
            openInNewTab("<?php echo base_url() . 'laporan_barang_masuk/cetak_1?tAwal=' ?>" + a + "&tAkhir=" + b);
        });

        function openInNewTab(url) {
            var win = window.open(url, '_blank');
            win.focus();
        }
    });
</script>