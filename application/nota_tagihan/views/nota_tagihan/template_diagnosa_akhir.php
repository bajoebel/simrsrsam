<style type="text/css">
    .loading {
      border: 16px solid #f3f3f3; /* Light grey */
      border-top: 16px solid #3498db; /* Blue */
      border-radius: 50%;
      width: 120px;
      height: 120px;
      animation: spin 2s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
</style>
<div class="box box-success">
    <div class="box-header">
        Diagnosa Akhir
    </div>
    <div class="row">
        <div class="loading" id="loading" style="display: none;"></div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <fieldset>
                    <legend>Diagnosa</legend>
                    <form method="POST" action="#" id="diagnosa_akhir">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-12 col-sm-12 col-xs-12 control-label">Diagnosa Utama</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="hidden" name="idx" id="idx" value="">
                                    <input type="hidden" name="id_daftar" id="id_daftar" value="<?= $detail->id_daftar; ?>">
                                    <input type="hidden" name="reg_unit" id="reg_unit" value="<?= $detail->reg_unit; ?>">
                                    <input type="hidden" name="idruang" id="idruang" value="<?= $detail->id_ruang; ?>">
                                    <input type="hidden" name="nama_ruang" id="nama_ruang" value="<?= $detail->nama_ruang; ?>">
                                    <textarea class="form-control" name="diagnosa_utama" id="diagnosa_utama"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-12 col-sm-12 col-xs-12 control-label">Diagnosa Sekunder</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control" name="diagnosa_sekunder" id="diagnosa_sekunder"></textarea>
                                    <span class="text-warning">Penting: Jika Lebih dari satu diagnosa sekunder pisahkan dengan koma (,)</span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
                        <button class="btn btn-primary" onclick="simpanDiagnosaAkhir()">Simpan</button>
                    </div>
                </fieldset>
            </div>
        </div>
        
    </div>
    <div class="box-footer text-right">
        
    </div>
</div>
<script type="text/javascript">
    var base_url = "<?= base_url() ."nota_tagihan.php/" ?>";
</script>
<script src="<?php echo base_url() ?>js/nota_tagihan.js"></script>
<script type="text/javascript">
    var idx= $('#idx').val();
    getDiagnosaAkhir("<?= $detail->id_daftar; ?>","<?= $detail->reg_unit; ?>");
</script>