<style>
    em {
        font-size: 10px
    }

    .input-group-addon {
        border: none;
    }

    .rightAlign {
        text-align: right;
    }

    .centerAlign {
        text-align: center;
    }

    .conversi {
        border: 1px solid #d2d6de
    }

    .w10 {
        width: 10px;
    }

    .w20 {
        width: 20px;
    }

    .w30 {
        width: 30px;
    }

    .w40 {
        width: 40px;
    }

    .w50 {
        width: 50px;
    }

    .w60 {
        width: 60px;
    }

    .w70 {
        width: 70px;
    }

    .w80 {
        width: 80px;
    }

    .w90 {
        width: 90px;
    }

    .w100 {
        width: 100px;
    }

    .w110 {
        width: 110px;
    }

    .w120 {
        width: 120px;
    }

    .w130 {
        width: 130px;
    }

    .w140 {
        width: 140px;
    }

    .w150 {
        width: 150px;
    }

    .w160 {
        width: 160px;
    }

    .w170 {
        width: 170px;
    }

    .w180 {
        width: 180px;
    }

    .w190 {
        width: 190px;
    }

    .w200 {
        width: 200px;
    }

    .w210 {
        width: 210px;
    }

    .w220 {
        width: 220px;
    }

    .w230 {
        width: 230px;
    }

    .w240 {
        width: 240px;
    }

    .w250 {
        width: 250px;
    }

    .wp70 {
        width: 70%;
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border"></div>
                <div class="box-body">

                    <form id="form1" role="form" onsubmit="return false">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" id="csrf" class="csrf" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <label>Nama Barang <span style="color: red"> * </span></label>
                                <input type="hidden" name="KDBRG" id="KDBRG" value="<?php echo $KDBRG ?>">
                                <input type="text" class="form-control" name="NMBRG" id="NMBRG" value="<?php echo $NMBRG ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Generik</label>
                                <input type="text" class="form-control" name="NMGENERIK" id="NMGENERIK" value="<?php echo $NMGENERIK ?>">
                            </div>
                            <div class="form-group">
                                <label>Satuan <span style="color: red"> * </span></label>
                                <select name="KDSATUAN" id="KDSATUAN" class="form-control" style="width: 100%">
                                    <option value=""></option>
                                    <?php foreach ($getSatuan->result_array() as $x) : ?>
                                        <option <?php echo ($KDSATUAN == $x['KDSATUAN']) ? "selected='selected'" : "" ?> value="<?php echo $x['KDSATUAN'] ?>"><?php echo $x['NMSATUAN'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kategori Barang <span style="color: red"> * </span></label>
                                <select name="KDKTBRG" id="KDKTBRG" class="form-control" style="width: 100%">
                                    <option value=""></option>
                                    <?php foreach ($getKatBrg->result_array() as $x) : ?>
                                        <option <?php echo ($KDKTBRG == $x['KDKTBRG']) ? "selected='selected'" : "" ?> value="<?php echo $x['KDKTBRG'] ?>"><?php echo $x['NMKTBRG'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Barang <span style="color: red"> * </span></label>
                                <select name="KDJENISBRG" id="KDJENISBRG" class="form-control" style="width: 100%">
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($getJnsBrg->result_array() as $x) : ?>
                                        <option <?php echo ($KDJENISBRG == $x['KDJENISBRG']) ? "selected='selected'" : "" ?> value="<?php echo $x['KDJENISBRG'] ?>"><?php echo $x['JENISBRG'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Markup (%) (<em>Harga Jual = Harga Beli * Markup</em>)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control w250 rightAlign" name="MARKUP" id="MARKUP" onkeypress="return isNumberKey(event)" value="<?php echo $MARKUP ?>">
                                    <div class="input-group-addon w200 rightAlign conversi">
                                        <span id="CONV_MARKUP" class="text-red">
                                            <?php echo number_format($MARKUP, 0, ',', '.'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Min Stock <span style="color: red"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control rightAlign" name="MINSTOK" id="MINSTOK" onkeypress="return isNumberKey(event)" value="<?php echo $MINSTOK ?>">
                                    <div class="input-group-addon w200 rightAlign conversi">
                                        <span id="CONV_MINSTOK" class="text-red">
                                            <?php echo number_format($MINSTOK, 0, ',', '.'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga Jual <span style="color: red"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control rightAlign" name="HJUAL" id="HJUAL" onkeypress="return isNumberKey(event)" value="<?php echo $HJUAL ?>">
                                    <div class="input-group-addon w200 rightAlign conversi">
                                        <span id="CONV_HJUAL" class="text-red">
                                            <?php echo number_format($HJUAL, 0, ',', '.'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Jumlah Maximum Tanggungan BPJS <span style="color: red"> (Diisi jika Obat Kronis) </span></label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control rightAlign" name="JUMLAH_MAXIMUM_TANGGUNGAN_BPJS" id="JUMLAH_MAXIMUM_TANGGUNGAN_BPJS" onkeypress="return isNumberKey(event)" value="<?php echo $JUMLAH_MAXIMUM_TANGGUNGAN_BPJS ?>" placeholder="Jumlah Obat Maximum">
                                    </div>
                                    <div class="col-md-9"><input type="text" class="form-control" id="AP" name="AP" value="<?= $AP ?>" placeholder="Aturan Pakai"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-primary" id="kembali">
                                        <i class="glyphicon glyphicon-new-window"></i> Kembali</button>
                                    <button type="button" class="btn btn-danger" id="submit" onclick="simpan()">
                                        <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var KDBRG = '<?php echo $KDBRG ?>';
        const formatter = new Intl.NumberFormat('id-ID');

        if (KDBRG == '') {
            $('#submit').html('<i class="glyphicon glyphicon-floppy-disk"></i> Simpan');
        } else {
            $('#submit').html('<i class="glyphicon glyphicon-floppy-disk"></i> Update');
        }
        $('.tanggal').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy"
        });
        $('input').keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });
        $('input,textarea').focus(function() {
            return this.select();
        });
        $('select').select2({
            placeholder: 'Pilih option'
        });
        $('#kembali').click(function() {
            var url = '<?php echo base_url() . 'farmasi.php/obat' ?>';
            window.location.href = url;
        });
        $('#MARKUP').keyup(function() {
            $('#CONV_MARKUP').html(formatter.format($(this).val()));
        });
        $('#MINSTOK').keyup(function() {
            $('#CONV_MINSTOK').html(formatter.format($(this).val()));
        });
        $('#HJUAL').keyup(function() {
            $('#CONV_HJUAL').html(formatter.format($(this).val()));
        });
    });

    function simpan() {
        var formdata = {}
        formdata['KDBRG'] = $('#KDBRG').val();
        formdata['NMBRG'] = $('#NMBRG').val();
        formdata['NMGENERIK'] = $('#NMGENERIK').val();
        formdata['KDSATUAN'] = $('#KDSATUAN').val();
        formdata['NMSATUAN'] = $('#KDSATUAN :selected').html();
        formdata['KDKTBRG'] = $('#KDKTBRG').val();
        formdata['NMKTBRG'] = $('#KDKTBRG :selected').html();
        formdata['KDJENISBRG'] = $('#KDJENISBRG').val();
        formdata['JENISBRG'] = $('#KDJENISBRG :selected').html();
        formdata['MARKUP'] = $('#MARKUP').val();
        formdata['MINSTOK'] = $('#MINSTOK').val();
        formdata['HJUAL'] = $('#HJUAL').val();
        formdata['AP'] = $('#AP').val();
        formdata['JUMLAH_MAXIMUM_TANGGUNGAN_BPJS'] = $('#JUMLAH_MAXIMUM_TANGGUNGAN_BPJS').val();
        formdata['csrf_token'] = $('#csrf').val();
        console.log(formdata);
        if (formdata['NMBRG'] == "") {
            alert('Ops. Nama barang harus di isi.');
            $('#NMBRG').focus();
        } else if (formdata['NMSATUAN'] == "") {
            alert('Ops. Satuan harus di pilih.');
            $('#KDSATUAN').focus();
        } else if (formdata['KDKTBRG'] == "") {
            alert('Ops. Kategori barang harus di pilih.');
            $('#KDKTBRG').focus();
        } else if (formdata['KDJENISBRG'] == "") {
            alert('Ops. Jenis barang harus di pilih.');
            $('#KDJENISBRG').focus();
        } else if (formdata['MARKUP'] == "" || formdata['MARKUP'] == "0") {
            alert('Ops. Markup tidak boleh kosong.');
            $('#MARKUP').focus();
        } else if (formdata['MINSTOK'] == "") {
            alert('Ops. Minimal stock harus di isi.');
            $('#MINSTOK').focus();
        } else if (formdata['HJUAL'] == "") {
            alert('Ops. Harga jual harus di isi.');
            $('#HJUAL').focus();
        } else {
            var x = confirm("Apakah anda yakin akan menyimpan data ini?");
            if (x) {
                $.ajax({
                    url: "<?php echo base_url() . 'farmasi.php/obat/simpan' ?>",
                    type: "POST",
                    data: formdata,
                    dataType: "JSON",
                    success: function(data) {
                        alert(data.message);
                        if (data.code == 200) {
                            $('#form1').find('input').val('');
                            $('#form1').find('textarea').val('');
                            $('#form1').find('select').val('').trigger('change');
                            $('#NMBRG').focus();
                        } else if (data.code == 201) {
                            var url = '<?php echo base_url() . 'farmasi.php/obat' ?>';
                            window.location.href = url;
                        }
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(jqXHR.responseText);
                    }
                });
            }
        }
    }

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>