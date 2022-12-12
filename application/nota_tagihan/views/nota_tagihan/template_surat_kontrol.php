<div class="col-md-12" id="data-pulang">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 30px">#</th>
                <th style="width: 80px">Tgl.Keluar</th>
                <th style="width: 100px">No.Reg RS/<br>No.Reg Unit</th>
                <th style="width: 200px">No.MR/<br>Nama Pasien</th>
                <th style="width: 50px">Jns.Kelamin</th>
                <th>DPJP</th>
                <th>Keadaan Keluar/<br>Cara Keluar</th>
                <th style="width: 100px">Cara Bayar</th>
                <th style="">Action</th>
            </tr>
        </thead>
        <tbody id="getdata">
            <tr>
                <td>1</td>
                <td><?= $pulang->tgl_keluar ?></td>
                <td><?= $pulang->id_daftar ?>/<br><?= $pulang->reg_unit ?></td>
                <td><?= $pulang->nomr ?>/<br><?= $pulang->nama_pasien ?></td>
                <td><?php if ($pulang->jns_kelamin == 1) echo "Laki-Laki";
                    echo "Perempuan" ?></td>
                <td><?= $pulang->nama_dpjp ?></td>
                <td><?= $pulang->cara_keluar ?>/<br><?= $pulang->keadaan_keluar ?></td>
                <td><?= $pulang->cara_bayar ?></td>
                <td>
                    <div class="btn-group">
                        <?php if (empty($surat)) {
                            if ($pulang->id_keadaan_keluar == 1) {
                        ?>
                                <button href="#" class="btn btn-warning btn-sm" onclick="addSuratKontrol('<?= $pulang->idx ?>')" <?php if ($pulang->reg_unit != $detail->reg_unit) echo "disabled" ?>>
                                    <i class="fa fa-plus"></i> Buat Surat Kontrol
                                </button>
                            <?php
                            } elseif ($pulang->id_keadaan_keluar == 4) {
                            ?>
                                <button href="#" class="btn btn-warning btn-sm" onclick="addSuratRujukan('<?= $pulang->idx ?>')" <?php if ($pulang->reg_unit != $detail->reg_unit) echo "disabled" ?>>
                                    <i class="fa fa-plus"></i> Buat Surat Rujukan
                                </button>
                            <?php
                            }
                        } else {
                            if ($pulang->id_keadaan_keluar == 1) {
                            ?>
                                <a href="<?= base_url() . "nota_tagihan.php/nota_tagihan/cetak_surat_kontrol?reg_unit=" . $surat->reg_unit; ?>" class="btn btn-default btn-sm" target="_blank">
                                    <i class="fa fa-print"></i> Cetak
                                </a>
                            <?php
                            } elseif ($pulang->id_keadaan_keluar == 4) {
                            ?>
                                <a href="#" class="btn btn-default btn-sm" onclick="cetkakSuratRujukan('<?= $pulang->idx ?>')">
                                    <i class="fa fa-print"></i> Cetak
                                </a>
                        <?php
                            }
                        }
                        ?>
                        <button type='button' class="btn btn-danger btn-sm" onclick="batalPulang('<?= $pulang->idx ?>')" <?php if ($pulang->reg_unit != $detail->reg_unit) echo "disabled" ?>>
                            <i class="fa fa-ban"></i> Batal
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="row" id="form-surat-kontrol" style="display:none;">
    <div class="col-md-12">
        <form id="form1" role="form" onsubmit="return false">
            <input type="hidden" class="form-control" name="id_daftar" id="id_daftar" value="<?= $detail->id_daftar ?>">
            <input type="hidden" class="form-control" name="reg_unit" id="reg_unit" value="<?= $detail->reg_unit ?>">
            <input type="hidden" class="form-control" name="nomr" id="nomr" value="<?= $detail->nomr ?>">
            <input type="hidden" class="form-control" name="nama_pasien" id="nama_pasien" value="<?= $detail->nama_pasien ?>">
            <input type="hidden" class="form-control" name="jns_kelamin" id="jns_kelamin" value="<?= $detail->jns_kelamin ?>">
            <input type="hidden" class="form-control" id="v_jns_kelamin" value="<?php if ($detail->jns_kelamin == "0") echo "Perempuan";
                                                                                else echo "Laki-Laki" ?>">
            <input type="hidden" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $detail->tgl_lahir; ?>">
            <?php
            $tgl_lahir     = new DateTime($detail->tgl_lahir);
            $sekarang     = new DateTime('today');
            $umur         = $sekarang->diff($tgl_lahir);
            ?>
            <input type="hidden" class="form-control" name="umur" id="umur" value="<?= $umur->y . " Tahun " . $umur->m . " Bulan " . $umur->d . " Hari";  ?>">
            <input type="hidden" class="form-control" name="x-id_ruang" id="x-id_ruang" value="<?= $detail->id_ruang ?>">
            <input type="hidden" class="form-control" name="x-nama_ruang" id="x-nama_ruang" value="<?= $detail->nama_ruang; ?>">
            <input type="hidden" class="form-control" name="id_kelas" id="id_kelas" value="<?= $detail->id_kelas ?>">
            <input type="hidden" class="form-control" name="kelas_layanan" id="kelas_layanan" value="<?= $detail->kelas_layanan; ?>">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-4">
                        <label>Tanggal Kontrol Ulang<span style="color: red"> * </span></label>
                    </div>

                    <div class="input-group col-md-4 date">
                        <input type="text" class="form-control tanggal" name="tgl_kontrol" id="tgl_kontrol" value="" placeholder="__-__-____">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-4">
                        <label>Dokter<span style="color: red"> * </span></label>
                    </div>
                    <div class=" input-group col-md-8">

                        <select name="iddokter" id="iddokter" class="form-control" style="width:100%">
                            <option value="">Pilih Dokter</option>
                            <?php
                            foreach ($dokter->result() as $d) {
                            ?>
                                <option value="<?= $d->NRP ?>" <?php if ($detail->dokterJaga == $d->NRP) echo "selected" ?>><?= $d->pgwNama ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4">
                        <label>Ruangan<span style="color: red"> * </span></label>
                    </div>
                    <div class=" input-group col-md-8">

                        <select name="id_ruang" id="id_ruang" class="form-control" style="width:100%">
                            <option value="">Pilih Ruangan</option>
                            <?php if ($detail->jns_layanan == "RJ") { ?>
                                <option value="<?= $detail->id_ruang; ?>" selected><?= $detail->nama_ruang ?></option>
                            <?php
                            }
                            foreach ($ruang->result() as $r) {
                            ?>
                                <option value="<?= $r->idx ?>"><?= $r->ruang ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4">
                        <label>ICD</label>
                    </div>

                    <div class="input-group col-md-8">
                        <input type="text" class="form-control " name="icd" id="icd" value="" placeholder="Kode ICD">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4">
                        <label>Diagnosa<span style="color: red"> * </span></label>
                    </div>
                    <div class=" input-group col-md-8">
                        <textarea name="diagnosa" id="diagnosa" class='form-control' placeholder="Diagnosa"></textarea>
                        <span class='text-warning'>Pisahkan Dengan Koma (,)</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4">
                        <label>Terapi</label>
                    </div>
                    <div class=" input-group col-md-8">
                        <textarea name="terapi" id="terapi" class='form-control' placeholder="Terapi"></textarea>
                        <span class='text-warning'>Pisahkan Dengan Koma (,)</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4">
                        <label>Tanggal Rujukan<span style="color: red"> * </span></label>
                    </div>

                    <div class="input-group col-md-4 date">
                        <input type="text" class="form-control tanggal" name="tgl_rujukan" id="tgl_rujukan" value="" placeholder="__-__-____">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4">
                        <label>Alasan Kontrol<span style="color: red"> * </span></label>
                    </div>
                    <div class=" input-group col-md-8">
                        <textarea name="alasan_kontrol" id="alasan_kontrol" class='form-control' placeholder="Alasan Kontrol"></textarea>
                        <span class='text-warning'>Pisahkan Dengan Koma (,)</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <label>Rencana Tindak Lanjut<span style="color: red"> * </span></label>
                    </div>
                    <div class=" input-group col-md-8">
                        <textarea name="rencana_tindak_lanjut" id="rencana_tindak_lanjut" class='form-control' placeholder="Rencana Tindak Lanjut"></textarea>
                        <span class='text-warning'>Pisahkan Dengan Koma (,)</span>
                    </div>
                </div>



                <div class="form-group ">
                    <label class='col-md-4'>&nbsp;</label>
                    <div class="input-group col-md-8" id="btnExec">
                        <button type="button" class="btn btn-primary" id="btnBatal" onclick="cancelSuratKontrol()">
                            <i class="glyphicon glyphicon-new-window"></i> Batal</button>
                        <button type="button" class="btn btn-danger" id="submit" onclick="buatSuratKontrol()">
                            <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#icd").autocomplete({
                source: function(request, response) {

                    $.ajax({
                        url: "<?php echo base_url() . 'api.php/vclaim/referensi/diagnosa' ?>",
                        dataType: "JSON",
                        method: "POST",
                        data: {
                            param1: request.term
                        },
                        success: function(data) {
                            console.clear();
                            console.log(data);
                            var diagnosa = data.response.diagnosa;
                            console.log(diagnosa);
                            response(diagnosa.slice(0, 15));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#icd").val(ui.item['kode']);
                    $("#diagnosa").val(ui.item['nama']);
                    $("#icd").removeClass("ui-autocomplete-loading");
                    return false;
                },
                select: function(event, ui) {
                    $("#icd").val(ui.item['kode']);
                    $("#diagnosa").val(ui.item['nama']);
                    $("#icd").removeClass("ui-autocomplete-loading");
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
                    .appendTo(table);
            };
    });
</script>