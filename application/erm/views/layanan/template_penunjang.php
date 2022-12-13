<div class="box box-success">
    <div class="box-header">
        List Permintaan Penunjang
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12" id='tabel_operasi'>
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
<div class="modal fade" id="modalPermintaanPenunjang" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Form Permintaan Penunjang</h4>
            </div>
            <div class="modal-body">
                <form id="formPemintaanPenunjang" role="form" onsubmit="#">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php //print_r($detail->id_daftar) 
                                ?>
                                <input type="hidden" name="pp_id_daftar" id="pp_id_daftar" value="<?= $detail->id_daftar; ?>">
                                <input type="hidden" name="pp_reg_unit" id="pp_reg_unit" value="<?= $detail->reg_unit; ?>">
                                <input type="hidden" name="pp_nomr" id="pp_nomr" value="<?= $detail->nomr ?>">
                                <input type="hidden" name="pp_nama" id="pp_nama" value="<?= $detail->nama_pasien ?>">
                                <input type="hidden" name="pp_ruang_pengirim" id="pp_ruang_pengirim" value="<?= $detail->id_ruang ?>">
                                <input type="hidden" name="pp_nama_ruang_pengirim" id="pp_nama_ruang_pengirim" value="<?= $detail->nama_ruang ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table style="width: 100%;">
                                            <tr>
                                                <th class="w120">No.Reg RS </th>
                                                <th class="rataTengah w10">: <?= $detail->id_daftar; ?></th>
                                                <th class="w150"><span id="ppv_id_daftar"></span></th>
                                                <th class="w100">No.Reg Unit </th>
                                                <th class="rataTengah w10">:<?= $detail->reg_unit; ?></th>
                                                <th><span id="ppv_reg_unit"></span></th>
                                            </tr>
                                            <tr>
                                                <th>No.MR</th>
                                                <th class="rataTengah">: <?= $detail->nomr; ?></th>
                                                <th><span id="ppv_nomr"></span></th>

                                                <th>Nama Pasien</th>
                                                <th class="rataTengah">: <?= $detail->nama_pasien; ?></th>
                                                <th><span id="ppv_nama"></span></th>
                                            </tr>
                                            <tr>
                                                <th>Ruang Pengirim</th>
                                                <th class="rataTengah">: <?= $detail->nama_ruang; ?></th>
                                                <th colspan="4"><span id="ppv_ruang_pengirim"></span></th>
                                            </tr>
                                        </table>
                                        <hr />
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <legend>Permintaan</legend>
                                            <div class="form-group">
                                                <label style="width: 100%">Pilih poli Rujukan Penunjang</label>
                                                <select name="id_penunjang" id="id_penunjang" class="form-control" onchange="getJenisPemeriksaan(0);hapusTindakan(0)">
                                                    <?php foreach ($getRuang as $xGR) : ?>
                                                        <option value="<?php echo $xGR->idx; ?>"><?php echo $xGR->ruang; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label style="width: 100%">Dokter Pengirim</label>
                                                <select name="dokter_pengirim" id="dokter_pengirim" class="form-control" style="width: 100%">
                                                    <?php foreach ($getDokter as $xDR) : ?>
                                                        <option value="<?php echo $xDR->NRP; ?>"><?php echo $xDR->pgwNama; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label style="width: 100%">Diagnosa</label>
                                                <textarea class="form-control" name="diagnosa" id="diagnosa" maxlength="255" height='50'></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label style="width: 100%">Keterangan</label>
                                                <textarea class="form-control" name="keterangan" id="keterangan" maxlength="255" height='50'></textarea>
                                            </div>

                                        </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                        <fieldset>
                                            <legend>Pemeriksaan</legend>
                                            <div class="form-group">
                                                <label for="jenis_pemeriksaan">JENIS PEMERIKSAAN</label>
                                                <select id='idjenispemeriksaan' class='form-control' name='idjenispemeriksaan' style='width:100%' onchange='getPemeriksaan(0)'></select>
                                            </div>
                                            <div id="subjenispemeriksaan"></div>
                                            <input type="hidden" id="template" name='template' value='0'>
                                            <div class='khusus' id="dahak" style="display:none">
                                                <div class="form-group">
                                                    <label for="alasanpemeriksaan">Alasaan Pemeriksaan</label><br>
                                                    <input type="radio" value='Diagnosa' name='alasanpemeriksaan' class='alasanpemeriksaan'> Diagnosa
                                                    <input type="radio" value='Follow Up Pengobatan' name='alasanpemeriksaan' class='alasanpemeriksaan'> Follow Up Pengobatan
                                                </div>
                                                <div class="form-group">
                                                    <label for="bulanke">Bulan Ke</label>
                                                    <input type="text" id='bulanke' name='bulanke' class='form-control'>
                                                </div>
                                            </div>

                                            <div class='khusus' id="patologi" style="display:none">
                                                <div class="form-group">
                                                    <label for="bulanke">Asal Jaringan</label>
                                                    <input type="text" id='asal_jaringan' name='asal_jaringan' class='form-control'>
                                                </div>
                                                <div class="form-group">
                                                    <label for="bulanke">Bahan Fiksasi</label>
                                                    <select class='form-control' name='bahan_fiksasi' id='bahan_fiksasi' style='width:100%'>
                                                        <option value="Formalin 10%">Formalin 10%</option>
                                                        <option value="Formalin buffer">Formalin Buffer</option>
                                                        <option value="Alkohol 96%">Alkohol 96%</option>
                                                        <option value="Alkohol 50%">Alkohol 50%</option>
                                                        <option value="Lain-Lain">Lain Lain</option>

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="bulanke">Haid Terakhir (Khusus pemeriksaan Kuretese Endometrum)</label>
                                                    <input type="text" id='haid_terakhir' name='haid_terakhir' class='form-control'>
                                                </div>
                                                <div class="form-group">
                                                    <label for="bulanke">Lokasi Jaringan</label>
                                                    <input type="text" id='lokasi_jaringan' name='lokasi_jaringan' class='form-control'>
                                                </div>
                                            </div>
                                            <div class='allow-scroll'>
                                                <table class="table table-bordered table-responsive" id='mytable'>
                                                    <thead>
                                                        <tr>
                                                            <th><input type="checkbox" name="pilihan" id="pilihan" value="1" onclick="getPemeriksaan(0)"></th>
                                                            <th>Pemeriksaan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="data-tindakan">

                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                        <tr>
                                                            <td colspan="2" id="pagination-tindakan"></td>
                                                        </tr>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                        <fieldset>
                                            <div id="list-tindakan"></div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" id="submit" class="btn btn-primary" onclick="simpanPermintaanPenunjang()">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var base_url = "<?= base_url() . "nota_tagihan.php/" ?>";
</script>
<script src="<?php echo base_url() ?>js/nota_tagihan.js"></script>
<script type="text/javascript">
    getPermintaanPenunjang('<?= $detail->reg_unit  ?>');
</script>