<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    .modal-content {
        max-height: 600px;
        overflow: scroll;
    }

    .widget-report .widget-user-header {
        padding: 5px 10px;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
    }
</style>
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-widget widget-report">
                <div class="widget-user-header bg-aqua-active">
                    <h3><?php echo $contentTitle ?></h3>
                </div>

                <div class="box-body">
                    <form id="form1" action="#" method="post" onsubmit="return false">
                        <table style="width: 100%;">
                            <tr>
                                <td>Lokasi</td>
                                <td> : </td>
                                <td>
                                    <select name="KDLOKASI" id="KDLOKASI" style="width: 250px;">
                                        <option value=""></option>
                                        <option value="ALL">-- Semua Lokasi --</option>
                                        <?php foreach ($datlokasi->result_array() as $y) { ?>
                                            <option value="<?php echo $y['KDLOKASI'] ?>"><?php echo $y['NMLOKASI'] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Periode Awal</td>
                                <td> : </td>
                                <td>
                                    <input type="text" name="tglAwal" id="tglAwal" class='form-control tanggal' placeholder="__-__-____" />
                                </td>
                            </tr>
                            <tr>
                                <td>Periode Akhir</td>
                                <td> : </td>
                                <td>
                                    <input type="text" name="tglAkhir" id="tglAkhir" class='form-control tanggal' placeholder="__-__-____" />
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
        $('#KDLOKASI').select2({
            placeholder: 'Pilih Lokasi Obat'
        }).val('').trigger('change');
        $('.tanggal').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        });
        $('.tanggal').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy"
        });
        $('#cetak').click(function() {
            var a = $('#KDLOKASI').val();
            var b = $('#tglAwal').val();
            var c = $('#tglAkhir').val();
            var d = 'cetak';
            openInNewTab("<?php echo base_url() . 'farmasi.php/laporan_pembelian/cetak_lap?kLok=' ?>" + a + "&tAwal=" + b + "&tAkhir=" + c + "&st=" + d);
        });

        function openInNewTab(url) {
            var win = window.open(url, '_blank');
            win.focus();
        }
    });
</script>