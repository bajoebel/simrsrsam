<div class="box box-success">
    <div class="box-header">
        Pindah Ruangan
    </div>
    <div class="row">
        <?php
        //print_r($pasien_pindah);
        if (empty($pasien_pindah)) {
            if ($pulang == 0) {
            ?>
                <div class="col-xs-6">

                    <form id="formPindahRanap" role="form" onsubmit="return false">
                        <div class="box-body">
                            <div class="col-md-12">
                                <?php
                                if (!empty($regibu)) {
                                    echo "
                                    <div class='alert alert-success'>Saat ini pasien berstatus sebagai pasien rawat gabung dengan ibu atas nama $regibu->nama_pasien dengan no registrasi unit $regibu->reg_unit 
                                    jika pasien dipindahkan keruangan lain maka status rawat inap pasien akan berubah menjadi rawat inap biasa, jika status pasien masih rawat gabung maka pemindahan pasien harus melalui pemindahan ibu</div>
                                    ";
                                }
                                if (!empty($reganak)) {
                                    echo "<div class='alert alert-success'>
                                    Pasien ini berstatus sebagai pasien rawat gabung dengan anak an :<ol>";
                                    foreach ($reganak as $ra) {
                                        echo "<li>$ra->nama_pasien ($ra->reg_unit)</li>";
                                    }
                                    echo "</ol>
                                    Jika pasien dipindahkan maka anak otomatis juga akan pindah</div>";
                                }
                                ?>
                                <input type="hidden" name="status_transaksi" id="status_transaksi" value="<?= $detail->status_transaksi ?>">
                                <input type="hidden" name="pr_id_daftar" id="pr_id_daftar" value="<?= $detail->id_daftar ?>">
                                <input type="hidden" name="pr_reg_unit" id="pr_reg_unit" value="<?= $detail->reg_unit; ?>">
                                <input type="hidden" name="pr_nomr" id="pr_nomr" value="<?= $detail->nomr; ?>">
                                <input type="hidden" name="pr_nama" id="pr_nama" value="<?= $detail->nama_pasien; ?>">
                                <input type="hidden" name="pr_ruang_pengirim" id="pr_ruang_pengirim" value="<?= $detail->id_ruang; ?>">
                                <input type="hidden" name="pr_nama_ruang_pengirim" id="pr_nama_ruang_pengirim" value="<?= $detail->nama_ruang; ?>">
                                <input type="hidden" name="pr_id_kamar_pengririm" id="pr_id_kamar_pengirim" value="<?= $detail->id_kamar; ?>">
                                <input type="hidden" name="pr_nama_kamar_pengirim" id="pr_nama_kamar_pengirim" value="<?= $detail->nama_kamar; ?>">
                                <div class="form-group">
                                    <label style="width: 100%">Pilih Kelas</label>
                                    <select name="pr_id_kelas" id="pr_id_kelas" class="form-control" style="width: 100%" onchange="getKamar()">
                                        <?php foreach ($getKelas->result_array() as $xRR) : ?>
                                            <option value="<?php echo $xRR['idx']; ?>"><?php echo $xRR['kelas_layanan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label style="width: 100%">Pilih Ruang Rawat Inap </label>
                                    <select name="pr_id_ruang" id="pr_id_ruang" class="form-control" style="width: 100%" onchange="getKamar()">
                                        <?php foreach ($getRuangPindah->result_array() as $xRR) : ?>
                                            <option value="<?php echo $xRR['idx']; ?>"><?php echo $xRR['ruang']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label style="width: 100%">Pilih Kamar</label>
                                    <select name="pr_id_kamar" id="pr_id_kamar" class="form-control" style="width: 100%">
                                        <option value="">Pilih Kamar</option>
                                        <?php foreach ($getKamar->result_array() as $xRR) : ?>
                                            <option value="<?php echo $xRR['id_kamar']; ?>"><?php echo $xRR['nama_kamar']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label style="width: 100%">Dokter Pengirim</label>
                                    <select name="pr_dokter_pengirim" id="pr_dokter_pengirim" class="form-control" style="width: 100%">
                                        <?php foreach ($getDokter->result_array() as $xDR) : ?>
                                            <option value="<?php echo $xDR['NRP']; ?>"><?php echo $xDR['pgwNama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label style="width: 100%">Informasi Tambahan</label>
                                    <textarea class="form-control" name="pr_keterangan" id="pr_keterangan" maxlength="255"></textarea>
                                </div>

                            </div>
                        </div>
                    </form>
                    <div class="box-footer text-right">

                        <button class="btn btn-success" id='simpanpindahranap' onclick="simpanPindahRanap()">Simpan</button>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Penting</h4>
                            Pasien Sudah Dipulangkan
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            if (!empty($pasien_pindah->idx_batal) || $pasien_pindah->id_ruang == $pasien_pindah->ruang_pengirim) {
                if ($pulang == 0) {
                ?>
                    <div class="col-xs-6">
                        <form id="formPindahRanap" role="form" onsubmit="return false">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <?php
                                    if (!empty($regibu)) {
                                        echo "
                                    <div class='alert alert-success'>Saat ini pasien berstatus sebagai pasien rawat gabung dengan ibu atas nama $regibu->nama_pasien dengan no registrasi unit $regibu->reg_unit 
                                    jika pasien dipindahkan keruangan lain maka status rawat inap pasien akan berubah menjadi rawat inap biasa, jika status pasien masih rawat gabung maka pemindahan pasien harus melalui pemindahan ibu</div>
                                    ";
                                    }
                                    if (!empty($reganak)) {
                                        echo "<div class='alert alert-success'>
                                    Pasien ini berstatus sebagai pasien rawat gabung dengan anak an :<ol>";
                                        foreach ($reganak as $ra) {
                                            echo "<li>$ra->nama_pasien ($ra->reg_unit)</li>";
                                        }
                                        echo "</ol>
                                    Jika pasien dipindahkan maka anak otomatis juga akan pindah</div>";
                                    }
                                    ?>
                                    <input type="hidden" name="status_transaksi" id="status_transaksi" value="<?= $detail->status_transaksi ?>">
                                    <input type="hidden" name="pr_id_daftar" id="pr_id_daftar" value="<?= $detail->id_daftar ?>">
                                    <input type="hidden" name="pr_reg_unit" id="pr_reg_unit" value="<?= $detail->reg_unit; ?>">
                                    <input type="hidden" name="pr_nomr" id="pr_nomr" value="<?= $detail->nomr; ?>">
                                    <input type="hidden" name="pr_nama" id="pr_nama" value="<?= $detail->nama_pasien; ?>">
                                    <input type="hidden" name="pr_ruang_pengirim" id="pr_ruang_pengirim" value="<?= $detail->id_ruang; ?>">
                                    <input type="hidden" name="pr_nama_ruang_pengirim" id="pr_nama_ruang_pengirim" value="<?= $detail->nama_ruang; ?>">
                                    <input type="hidden" name="pr_id_kamar_pengririm" id="pr_id_kamar_pengirim" value="<?= $detail->id_kamar; ?>">
                                    <input type="hidden" name="pr_nama_kamar_pengirim" id="pr_nama_kamar_pengirim" value="<?= $detail->nama_kamar; ?>">

                                    <div class="form-group">
                                        <label style="width: 100%">Pilih Kelas</label>
                                        <select name="pr_id_kelas" id="pr_id_kelas" class="form-control" style="width: 100%">
                                            <?php foreach ($getKelas->result_array() as $xRR) : ?>
                                                <option value="<?php echo $xRR['idx']; ?>"><?php echo $xRR['kelas_layanan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="width: 100%">Pilih Ruang Rawat Inap </label>
                                        <select name="pr_id_ruang" id="pr_id_ruang" class="form-control" style="width: 100%" onchange="getKamar()">
                                            <?php foreach ($getRuangPindah->result_array() as $xRR) : ?>
                                                <option value="<?php echo $xRR['idx']; ?>"><?php echo $xRR['ruang']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="width: 100%">Pilih Kamar</label>
                                        <select name="pr_id_kamar" id="pr_id_kamar" class="form-control" style="width: 100%">
                                            <option value="">Pilih Kamar</option>
                                            <?php foreach ($getKamar->result_array() as $xRR) : ?>
                                                <option value="<?php echo $xRR['id_kamar']; ?>"><?php echo $xRR['nama_kamar']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="width: 100%">Dokter Pengirim</label>
                                        <select name="pr_dokter_pengirim" id="pr_dokter_pengirim" class="form-control" style="width: 100%">
                                            <?php foreach ($getDokter->result_array() as $xDR) : ?>
                                                <option value="<?php echo $xDR['NRP']; ?>"><?php echo $xDR['pgwNama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="width: 100%">Informasi Tambahan</label>
                                        <textarea class="form-control" name="pr_keterangan" id="pr_keterangan" maxlength="255"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="box-footer text-right">
                            <button class="btn btn-success" id='simpanpindahranap' onclick="simpanPindahRanap()">Simpan</button>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> Penting</h4>
                                Pasien Sudah Dipulangkan
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead class="bg-green">
                            <tr>
                                <td>No</td>
                                <td>Ruang Tujuan</td>
                                <td>Dokter Pengirim</td>
                                <td>Keterangan</td>
                                <td>Status</td>
                                <td>#</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><?= $pasien_pindah->nama_ruang . "(" . $pasien_pindah->nama_kamar . ")"; ?></td>
                                <td><?= $pasien_pindah->nama_dokter_pengirim; ?></td>
                                <td><?= $pasien_pindah->keterangan; ?></td>
                                <td><?php if (empty($pasien_pindah->idx_response)) echo "Belum Disetujui";
                                    else echo "Sudah Disetujui"; ?></td>
                                <td class="text-right">
                                    <?php if (empty($pasien_pindah->idx_response)) echo "<button class='btn btn-danger' onclick='batal(\"" . $pasien_pindah->idx . "\")'>Batalkan</button>"; ?>
                                    <a href="<?= base_url() . "nota_tagihan.php/nota_tagihan/surat_rekomendasi_pindah_ruang/" . $pasien_pindah->idx;
                                                ?>" class="btn btn-success" target="_blank">Cetak Surat</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        <?php
            }
        } ?>
    </div>
</div>
<div id="formbatal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Batal Pindah</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="alasan">Alasan</label>
                        <input type="hidden" id="id_pindah_ranap" name="id_pindah_ranap">
                        <input type="hidden" id="id_daftar" name="id_daftar">
                        <input type="hidden" id="reg_unit" name="reg_unit">
                        <textarea name="alasan" id="alasan" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" onclick="BatalPindahRanap()">Batalkan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    function getKamar() {
        var idruang = $('#pr_id_ruang').val();
        var idkamar = $('#pr_id_kamar_pengirim').val();
        var kelasid = $('#pr_id_kelas').val();
        var url = "<?= base_url() . "nota_tagihan.php/nota_tagihan/kamar/"; ?>" + idruang + "/" + kelasid + "/" + idkamar;
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            beforeSend: function() {
                // setting a timeout
                $('#pr_id_kamar').html('');
            },
            success: function(data) {
                if (data["status"] == true) {
                    var r = data["data"];
                    var jmlData = r.length;
                    var row = "";
                    var isi_lk = 0;
                    var isi_pr = 0;
                    var terisi = 0;
                    for (var i = 0; i < jmlData; i++) {
                        isi_lk = parseInt(r[i]["terisi_lk"]);
                        isi_pr = parseInt(r[i]["terisi_pr"]);
                        terisi = isi_lk + isi_pr;
                        console.log(r[i]["nama_kamar"] + terisi);
                        if (terisi >= r[i]["jml_tt"]) row += "<option value='" + r[i]["id_kamar"] + "' disabled>" + r[i]["nama_kamar"] + "(Penuh)</option>";
                        else row += "<option value='" + r[i]["id_kamar"] + "'>" + r[i]["nama_kamar"] + "</option>";
                    }
                    $('#pr_id_kamar').html(row);
                    //console.log(row);
                } else {
                    alert(data["message"]);
                }
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                $('#btnUpdateNoBPJS').html("<i class='fa fa-save'></i> Update");
                console.log(jqXHR.responseText);
            }
        });
    }

    function simpanPindahRanap() {
        var kamar_pengirim = $('#pr_id_kamar_pengirim').val()
        var kamar_penerima = $('#pr_id_kamar').val();
        var status_transaksi = $('#status_transaksi').val();
        if (parseInt(status_transaksi) == 0) {
            alert("Pasien Belum Bisa Dipindahkan Sebelum Semua Tindakan Di unit ini diinput");
            return false;
        }
        if (kamar_pengirim == kamar_penerima) {
            alert("Kamar penerima tidak boleh sama dengan kamar pemgirim");
            return false;
        }
        var formdata = {}
        formdata['id_daftar'] = $('#pr_id_daftar').val();
        formdata['reg_unit'] = $('#pr_reg_unit').val();
        formdata['nomr'] = $('#pr_nomr').val();
        formdata['nama_pasien'] = $('#pr_nama').val();
        formdata['ruang_pengirim'] = $('#pr_ruang_pengirim').val();
        formdata['nama_ruang_pengirim'] = $('#pr_nama_ruang_pengirim').val();
        formdata['kamar_pengirim'] = $('#pr_id_kamar_pengirim').val();
        formdata['nama_kamar_pengirim'] = $('#pr_nama_kamar_pengirim').val();
        formdata['id_kelas'] = $('#pr_id_kelas').val();
        formdata['kelas_layanan'] = $('#pr_id_kelas :selected').html();
        formdata['id_ruang'] = $('#pr_id_ruang').val();
        formdata['nama_ruang'] = $('#pr_id_ruang :selected').html();
        formdata['id_kamar'] = $('#pr_id_kamar').val();
        formdata['nama_kamar'] = $('#pr_id_kamar :selected').html();
        formdata['dokter_pengirim'] = $('#pr_dokter_pengirim').val();
        formdata['nama_dokter_pengirim'] = $('#pr_dokter_pengirim :selected').html();
        formdata['keterangan'] = $('#pr_keterangan').val();

        $.ajax({
            url: "<?php echo base_url() . 'nota_tagihan.php/nota_tagihan/simpanPindahRanap' ?>",
            type: "POST",
            data: formdata,
            dataType: "JSON",
            beforeSend: function() {
                // setting a timeout
                $('#simpanpindahranap').prop('disabled', true);
            },
            success: function(data) {
                alert(data.message);
                if (data.code == 200) {
                    $('#modalPindahRanap').modal('hide');
                    location.reload();
                }
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            },
            complete: function() {
                $('#simpanpindahranap').prop('disabled', false);
            },
        });
    }

    function batal(idx) {
        var url = "<?= base_url() . "nota_tagihan.php/nota_tagihan/datapindah/"; ?>" + idx;
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                if (data["status"] == true) {
                    $('#formbatal').modal('show');
                    var row = data.data;
                    $('#id_daftar').val(row.id_daftar);
                    $('#reg_unit').val(row.reg_unit);
                    $('#id_pindah_ranap').val(row.idx);
                } else {
                    alert(data["message"]);
                }
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    }

    function BatalPindahRanap() {

        var formdata = {}
        formdata['id_daftar'] = $('#id_daftar').val();
        formdata['reg_unit'] = $('#reg_unit').val();
        formdata['id_pindah_ranap'] = $('#id_pindah_ranap').val();
        formdata['alasan'] = $('#alasan').val();
        $.ajax({
            url: "<?php echo base_url() . 'nota_tagihan.php/nota_tagihan/batalpindah' ?>",
            type: "POST",
            data: formdata,
            dataType: "JSON",
            success: function(data) {
                alert(data.message);
                if (data.status == true) {
                    $('#formbatal').modal('hide');
                    location.reload();
                } else {
                    alert(data.message);
                }
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    }
</script>