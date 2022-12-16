<div class="box box-success">
    <div class="box-header">
        List Rujukan Internal
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12" id='tabel_operasi'>
                <button class="btn btn-success btn-sm" onclick="rujukInternal()">Tambah</button>
                <table class="table table-bordered">
                    <thead class='bg-green'>
                        <tr>
                            <td>No</td>
                            <td>Ruang Poliklinik</td>
                            <td>Nama Dokter Pengirim</td>
                            <td>Keterangan</td>
                            <!--td>#</td-->
                        </tr>
                    </thead>
                    <tbody id="data_rujukan_internal">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRujukInternal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Form Rujuk Internal</h4>
            </div>
            <div class="modal-body">

                <form id="formRujukInternal" role="form" onsubmit="#">
                    <div class="box-body">
                        <div class="col-md-12">
                            <input type="hidden" name="ri_id_daftar" id="ri_id_daftar">
                            <input type="hidden" name="ri_reg_unit" id="ri_reg_unit">
                            <input type="hidden" name="ri_nomr" id="ri_nomr">
                            <input type="hidden" name="ri_nama" id="ri_nama">
                            <input type="hidden" name="ri_ruang_pengirim" id="ri_ruang_pengirim">
                            <input type="hidden" name="ri_nama_ruang_pengirim" id="ri_nama_ruang_pengirim">

                            <table>
                                <tr>
                                    <th class="w120">No.Reg RS </th>
                                    <th class="rataTengah w10">:</th>
                                    <th class="w150"><span id="riv_id_daftar"></span></th>
                                    <th class="w100">No.Reg Unit </th>
                                    <th class="rataTengah w10">:</th>
                                    <th><span id="riv_reg_unit"></span></th>
                                </tr>
                                <tr>
                                    <th>No.MR</th>
                                    <th class="rataTengah">:</th>
                                    <th><span id="riv_nomr"></span></th>

                                    <th>Nama Pasien</th>
                                    <th class="rataTengah">:</th>
                                    <th><span id="riv_nama"></span></th>
                                </tr>
                                <tr>
                                    <th>Ruang Pengirim</th>
                                    <th class="rataTengah">:</th>
                                    <th colspan="4"><span id="riv_ruang_pengirim"></span></th>
                                </tr>
                            </table>

                            <hr />

                            <div class="form-group">
                                <label style="width: 100%">Pilih Poli Rujukan Internal</label>
                                <select name="id_ruang_rujukan" id="id_ruang_rujukan" class="form-control" style="width: 350px">
                                    <?php foreach ($getRuangRujukan->result_array() as $xRR) : ?>
                                        <option value="<?php echo $xRR['idx']; ?>"><?php echo $xRR['ruang']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label style="width: 100%">Dokter Pengirim</label>
                                <select name="ri_dokter_pengirim" id="ri_dokter_pengirim" class="form-control" style="width: 350px">
                                    <?php foreach ($getDokter->result_array() as $xDR) : ?>
                                        <option value="<?php echo $xDR['NRP']; ?>"><?php echo $xDR['pgwNama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label style="width: 100%">Informasi Tambahan</label>
                                <textarea class="form-control" name="ri_keterangan" id="ri_keterangan" maxlength="255"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" id="submit" class="btn btn-primary" onclick="simpanRujukInternal()">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var base_url = "<?= base_url() . "nota_tagihan.php/" ?>";
</script>
<script src="<?php echo base_url() ?>js/nota_tagihan.js"></script>
<script type="text/javascript">
    getRujukanInternal('<?= $detail->reg_unit  ?>');
</script>