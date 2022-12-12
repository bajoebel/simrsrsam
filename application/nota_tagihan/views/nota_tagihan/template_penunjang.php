<div class="box box-success">
    <div class="box-header">
        List Permintaan Penunjang
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12" id='tabel_operasi' >
                <button class="btn btn-success btn-sm" onclick="permintaanPenunjang()">Tambah</button>
                <table class="table table-bordered">
                    <thead class='bg-green'>
                        <tr>
                            <td>No</td>
                            <td>Ruang Penunjang</td>
                            <td>Nama Dokter Pengirim</td>
                            <td>Diagnosa</td>
                            <td>Keterangan</td>
                            <td>#</td>
                        </tr>
                    </thead>
                    <tbody id="data_permintaan_penunjang">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var base_url = "<?= base_url() ."nota_tagihan.php/" ?>";
</script>
<script src="<?php echo base_url() ?>js/nota_tagihan.js"></script>
<script type="text/javascript">
    getPermintaanPenunjang('<?= $detail->reg_unit  ?>');
</script>

