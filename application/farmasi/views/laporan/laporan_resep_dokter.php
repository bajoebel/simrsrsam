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

        <div class="col-md-4">
            <div class="box box-widget widget-report">
                <div class="widget-user-header bg-aqua-active">
                    <h3><?php echo $contentTitle ?></h3>
                </div>
                <div class="box-body">
                    <form id="form1" action="#" class="form-horizontal" method="post" onsubmit="return false">
                        <div class="form-group">
                            <label for="periode awal" class="control-label col-md-3">Periode Awal</label>
                            <div class="col-md-9">
                                <input type="text" name="tglAwal" id="tglAwal" placeholder="__-__-____" class="form-control tanggal" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="periode awal" class="control-label col-md-3">Periode Akhir</label>
                            <div class="col-md-9">
                                <input type="text" name="tglAkhir" id="tglAkhir" placeholder="__-__-____" class="form-control tanggal" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="periode awal" class="control-label col-md-3">&nbsp;</label>
                            <div class="col-md-9">
                                <button type="button" id="cetak" class="btn"><i class="icon-print"></i> Cetak</button>
                            </div>
                        </div>
                        
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
        $('.tanggal').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        });
        $('.tanggal').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy"
        });

        function setInput() {
            $('#tglAwal').val('<?php echo date('d/m/Y'); ?>');
            $('#tglAkhir').val('<?php echo date('d/m/Y'); ?>');
        }
        setInput();
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
            openInNewTab("<?php echo base_url() . 'farmasi.php/laporan_penjualan/cetak_4?tAwal=' ?>" + a + "&tAkhir=" + b);
        });

        function openInNewTab(url) {
            var win = window.open(url, '_blank');
            win.focus();
        }
    });
</script>