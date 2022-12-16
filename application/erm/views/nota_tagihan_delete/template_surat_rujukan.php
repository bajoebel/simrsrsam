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
                                <button type="button" class="btn btn-warning btn-sm" onclick="addSuratKontrol('<?= $pulang->idx ?>')" <?php if ($pulang->reg_unit != $detail->reg_unit) echo "disabled" ?>>
                                    <i class="fa fa-plus"></i> Buat Surat Kontrol
                                </button>
                            <?php
                            } elseif ($pulang->id_keadaan_keluar == 4) {
                            ?>
                                <button type='button' href="#" class="btn btn-warning btn-sm" onclick="addSuratRujukan('<?= $pulang->idx ?>')" <?php if ($pulang->reg_unit != $detail->reg_unit) echo "disabled" ?>>
                                    <i class="fa fa-plus"></i> Buat Surat Rujukan
                                    </a>
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
                                    if (empty($surat->noRujukan)) {
                                    ?>
                                        <a href="#" class="btn btn-warning btn-sm" onclick="return false">
                                            <i class="fa fa-circle-o-notch fa-spin"></i> Menunggu
                                        </a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="<?= base_url() . "nota_tagihan.php/nota_tagihan/cetak_surat_rujukan?reg_unit=" . $surat->reg_unit; ?>" class="btn btn-default btn-sm" onclick="cetkakSuratRujukan('<?= $pulang->idx ?>')">
                                            <i class="fa fa-print"></i> Cetak
                                        </a>
                            <?php
                                    }
                                }
                            }
                            ?>
                            <a href="#" class="btn btn-danger btn-sm" onclick="batalPulang('<?= $pulang->idx ?>')">
                                <i class="fa fa-ban"></i> Batal
                            </a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div id="form-surat-rujukan" style="display:none">
    <form id="form1" role="form" onsubmit="return false">

        <input type="hidden" class="form-control" name="id_daftar" id="id_daftar" value="<?= $detail->id_daftar ?>">
        <input type="hidden" class="form-control" name="reg_unit" id="reg_unit" value="<?= $detail->reg_unit ?>">
        <input type="hidden" class="form-control" name="nomr" id="nomr" value="<?= $detail->nomr ?>">
        <input type="hidden" class="form-control" name="nama" id="nama" value="<?= $detail->nama_pasien ?>">
        <input type="hidden" class="form-control" name="jns_kelamin" id="jns_kelamin" value="<?= $detail->jns_kelamin ?>">
        <input type="hidden" class="form-control" id="v_jns_kelamin" value="<?php if ($detail->jns_kelamin == "0") echo "Perempuan";
                                                                            else echo "Laki-Laki" ?>">
        <input type="hidden" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $detail->tgl_lahir; ?>">
        <input type="hidden" class="form-control" name="noKartu" id="noKartu" value="<?= $detail->no_bpjs; ?>">
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
                    <label>NO SEP<span style="color: red"> * </span></label>
                </div>

                <div class="input-group">
                    <input name="noSep" id="noSep" type="text" value="<?= $detail->no_jaminan ?>" class="form-control">
                    <span class="input-group-addon">
                        <input type="checkbox" id="chkIsJaminan" value='1' checked /> Format SEP
                    </span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    <label>Tanggal Rujukan<span style="color: red"> * </span></label>
                </div>

                <div class="input-group col-md-4 date">
                    <input type="text" class="form-control tanggal" name="tglRujukan" id="tglRujukan" value="" placeholder="__-__-____">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-4">
                    <label>Pelayanan<span style="color: red"> * </span></label>
                </div>
                <div class=" input-group col-md-8">

                    <select name="jnsPelayanan" id="jnsPelayanan" class="form-control" style="width:100%">
                        <option value="">Pilih Jenis Pelayanan</option>
                        <option value="1">Rawat Inap</option>
                        <option value="2">Rawat Jalan</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label>Tipe <span style="color: red"> * </span></label>
                </div>
                <div class=" input-group col-md-8">

                    <select name="tipeRujukan" id="tipeRujukan" class="form-control" style="width:100%">
                        <option value="">Pilih Tipe</option>
                        <option value="0">Penuh</option>
                        <option value="1">Partial</option>
                        <option value="2">Rujuk Balik</option>
                    </select>
                </div>
            </div>

            <!--div class="form-group">
                        <div class="col-md-4">
                            <label>ICD</label>
                        </div>

                        <div class="input-group col-md-8">
                            <input  type="text" class="form-control " name="icd" id="icd" value = "" placeholder="Kode ICD">
                        </div>
                    </div-->
            <div class="form-group">
                <div class="col-md-4">
                    <label>Dokter Perujuk<span style="color: red"> * </span></label>
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
                    <label>diagnosaDokter Dokter<span style="color: red"> * </span></label>
                </div>
                <div class=" input-group col-md-8">
                    <textarea name="diagnosaDokter" id="diagnosaDokter" class='form-control' placeholder="diagnosaDokter"></textarea>
                </div>
            </div>
            <div class="form-group" id="">
                <div class="col-md-4">
                    <label class="ccontrol-label">Dirujuk Ke <label style="color:red;font-size:small">*</label></label>
                </div>
                <div class="input-group col-md-8 col-sm-8 col-xs-12">
                    <input type="text" class="form-control ui-autocomplete-input" id="namappkDirujuk" maxlength="10" placeholder="ketik kode atau nama PPK Dirujuk min 3 karakter">
                    <input type="hidden" class="form-control" id="kodeppkDirujuk" value="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label>RuangPoli Perujuk<span style="color: red"> * </span></label>
                </div>
                <div class=" input-group col-md-8">

                    <select name="poliPerujuk" id="poliPerujuk" class="form-control" style="width:100%">
                        <option value="">Pilih Poli</option>
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
            <div class="form-group" id="">
                <div class="col-md-4">
                    <label class="ccontrol-label">Spesialis/SubSpesialis <label style="color:red;font-size:small">*</label></label>
                </div>
                <div class="input-group col-md-8 col-sm-8 col-xs-12">
                    <input type="text" class="form-control ui-autocomplete-input" id="namapoliRujukan" maxlength="10" placeholder="ketik kode atau nama Spesialis/Subspesialis min 3 karakter">
                    <input type="hidden" class="form-control" id="poliRujukan" value="">
                </div>
            </div>
            <!--div class="form-group">
                        <div class="col-md-4">
                            <label>Ruangan<span style="color: red"> * </span></label>
                        </div>
                        <div class=" input-group col-md-8">

                            <select name="id_ruang" id="id_ruang" class="form-control" style="width:100%">
                            <option value="">Pilih Ruangan</option>
                                <?php if ($detail->jns_layanan == "RJ") { ?>
                                <option value="<?= $detail->id_ruang; ?>" selected><?= $detail->namaPoliRujukan ?></option>
                                <?php
                                }
                                foreach ($ruang->result() as $r) {
                                ?>
                                    <option value="<?= $r->idx ?>" ><?= $r->ruang ?></option>
                                    <?php
                                }
                                    ?>
                            </select>
                        </div>
                    </div-->



            <div class="form-group">
                <div class="col-md-4">
                    <label>Terapi</label>
                </div>
                <div class=" input-group col-md-8">
                    <textarea name="terapi" id="terapi" class='form-control' placeholder="Terapi"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    <label>Catatan</label>
                </div>
                <div class=" input-group col-md-8">
                    <textarea name="catatan" id="catatan" class='form-control' placeholder="Catatan"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4">
                    <label>Tanggal Rencana Kunjungan<span style="color: red"> * </span></label>
                </div>

                <div class="input-group col-md-4 date">
                    <input type="text" class="form-control tanggal" name="tgl_rencana_kunjungan" id="tgl_rencana_kunjungan" value="" placeholder="__-__-____">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>




            <div class="form-group">
                <label>&nbsp;</label>
                <div class="input-group" id="btnExec">
                    <button type="button" class="btn btn-primary" id="btnBatal" onclick="cancelSuratRujukan()">
                        <i class="glyphicon glyphicon-new-window"></i> Batal</button>
                    <button type="button" class="btn btn-danger" id="submit" onclick="buatSuratRujukan()">
                        <i class="glyphicon glyphicon-floppy-disk"></i> Kirim Permintaan Surat Rujukan</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#namapoliRujukan").autocomplete({
                source: function(request, response) {

                    $.ajax({
                        url: "<?php echo base_url() . 'api.php/vclaim/referensi/poli' ?>",
                        dataType: "JSON",
                        method: "POST",
                        data: {
                            param1: request.term
                        },
                        success: function(data) {
                            //console.log(data);
                            var poli = data.response.poli;
                            console.log(poli);
                            response(poli.slice(0, 15));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#poliRujukan").val(ui.item['kode']);
                    $("#namapoliRujukan").val(ui.item['nama']);
                    $("#namapoliRujukan").removeClass("ui-autocomplete-loading");
                    return false;
                },
                select: function(event, ui) {
                    $("#poliRujukan").val(ui.item['kode']);
                    $("#namapoliRujukan").val(ui.item['nama']);
                    $("#namapoliRujukan").removeClass("ui-autocomplete-loading");
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
                    .appendTo(table);
            };

        $("#namappkDirujuk").autocomplete({
                source: function(request, response) {
                    var tipe = $('#tipeRujukan').val();
                    if (tipe == 2) var faskes = 1;
                    else var faskes = 2;
                    $.ajax({
                        url: "<?php echo base_url() . 'api.php/vclaim/referensi/faskes' ?>",
                        dataType: "JSON",
                        method: "POST",
                        data: {
                            param1: request.term,
                            param2: faskes
                        },
                        success: function(data) {
                            console.log(data);
                            var faskes = data.response.faskes;
                            response(faskes.slice(0, 15));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#kodeppkDirujuk").val(ui.item['kode']);
                    $("#namappkDirujuk").val(ui.item['nama']);
                    $("#namappkDirujuk").removeClass("ui-autocomplete-loading");
                    return false;
                },
                select: function(event, ui) {
                    $("#kodeppkDirujuk").val(ui.item['kode']);
                    $("#namappkDirujuk").val(ui.item['nama']);
                    $("#namappkDirujuk").removeClass("ui-autocomplete-loading");
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