<style>
    .widget-report .widget-user-header {
        padding: 5px 10px;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
    }
</style>
<section class="content container-fluid">
    <div class="row">
        <?= $sub_menu ?>
        <div class="col-md-4">
            <div class="box box-widget widget-report">
                <div class="widget-user-header bg-aqua-active">
                    <h3><?php echo $contentTitle ?></h3>
                </div>
                <div class="box-body">
                    <form id="form1" action="#" method="post" class="form-horizontal" onsubmit="return false">
                        <div class="form-group">
                            <label for="" class="label-control col-md-3">Lokasi Obat</label>
                            <div class="col-md-9">
                                <select name="KDLOKASI" id="KDLOKASI" class="form-control">
                                    <option value=""></option>
                                    <?php foreach ($datlokasi->result_array() as $x) { ?>
                                        <option value="<?php echo $x['KDLOKASI'] ?>"><?php echo $x['NMLOKASI'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="label-control col-md-3">Jenis Pasien</label>
                            <div class="col-md-9">
                                <select name="KDPELAYANAN" id="KDPELAYANAN" class="form-control" >
                                    <option value="RJ">Rawat Jalan</option>
                                    <option value="RI">Rawat Inap</option>
                                    <option value="GD">Gawat Darurat</option>
                                    <option value="PJ">Penunjang</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control col-md-3">Periode Awal</label>
                            <div class="col-md-9"><input type="text" name="tglAwal" id="tglAwal" placeholder="__-__-____" class="form-control tanggal" /></div>
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control col-md-3">Periode Akhir</label>
                            <div class="col-md-9">
                                <input type="text" name="tglAkhir" id="tglAkhir" placeholder="__-__-____" class="form-control tanggal" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="label-control col-md-3">&nbsp;</label>
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
        $('#KDLOKASI').select2({
            placeholder: 'Silahkan Pilih Lokasi Obat'
        });

        function setInput() {
            $('#KDLOKASI').val('').trigger('change');
            $('#tglAwal').val('<?php echo date('d-m-Y'); ?>');
            $('#tglAkhir').val('<?php echo date('d-m-Y'); ?>');
        }
        setInput();

        $('#tglAwal').focus(function() {
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
        $('#tglAwal').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#tglAkhir').focus();
            }
        });

        $('#tglAkhir').focus(function() {
            $(this).select()
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
        $('#tglAkhir').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#cetak').click();
            }
        });

        $('#cetak').click(function() {
            var a = $('#KDLOKASI').val();
            var b = $('#tglAwal').val();
            var c = $('#tglAkhir').val();
            var d = $('#KDPELAYANAN').val();
            openInNewTab("<?php echo base_url() . 'farmasi.php/laporan_penjualan/cetak_7?kode=' ?>" + a + "&tAwal=" + b + "&tAkhir=" + c + "&layanan=" + d);
        });

        function openInNewTab(url) {
            var win = window.open(url, '_blank');
            win.focus();
        }
    });
</script>