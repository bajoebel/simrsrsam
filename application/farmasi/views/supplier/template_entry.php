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
                                <label>Nama Supplier (PBF) <span style="color: red"> * </span></label>
                                <input type="hidden" id="csrf" class="csrf" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <input type="hidden" name="KDSUPPLIER" id="KDSUPPLIER" value="<?php echo $KDSUPPLIER ?>">
                                <input type="text" class="form-control" name="NMSUPPLIER" id="NMSUPPLIER" value="<?php echo $NMSUPPLIER ?>">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="ALAMAT" id="ALAMAT" rows="3"><?php echo $ALAMAT ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Kota</label>
                                <input type="text" class="form-control" name="KOTA" id="KOTA" value="<?php echo $KOTA ?>">
                            </div>
                            <div class="form-group">
                                <label>NPWP</label>
                                <input type="text" class="form-control" name="NPWP" id="NPWP" value="<?php echo $NPWP ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kontak <span style="color: red"> * </span></label>
                                <input type="text" class="form-control" name="CONTACTP" id="CONTACTP" value="<?php echo $CONTACTP ?>">
                            </div>
                            <div class="form-group">
                                <label>Telp / Fax <span style="color: red"> * </span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="TELP" id="TELP" value="<?php echo $TELP ?>" onkeypress="return isNumberKey(event)" style="width: 200px" />
                                    <input type="text" class="form-control" name="FAKS" id="FAKS" value="<?php echo $FAKS ?>" onkeypress="return isNumberKey(event)" style="width: 200px" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="EMAIL" id="EMAIL" value="<?php echo $EMAIL ?>">
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
        var KDSUPPLIER = '<?php echo $KDSUPPLIER ?>';
        if (KDSUPPLIER == '') {
            $('#submit').html('<i class="glyphicon glyphicon-floppy-disk"></i> Simpan');
        } else {
            $('#submit').html('<i class="glyphicon glyphicon-floppy-disk"></i> Update');
        }
        $('input').keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });

        $('input,textarea').focus(function() {
            return this.select();
        });
        $('#kembali').click(function() {
            var url = '<?php echo base_url() . 'farmasi.php/supplier' ?>';
            window.location.href = url;
        });
    });

    function simpan() {
        var a = $('#NMSUPPLIER').val();
        var b = $('#ALAMAT').val();
        var c = $('#KOTA').val();
        var d = $('#NPWP').val();
        var e = $('#CONTACTP').val();
        var f = $('#TELP').val();
        var g = $('#FAKS').val();
        var h = $('#EMAIL').val();
        if (a == "") {
            alert('Ops. Nama Supplier harus di isi.');
            $('#NMSUPPLIER').focus();
        } else if (e == "") {
            alert('Ops. Kontak supplier harus di isi.');
            $('#CONTACTP').focus();
        } else if (f == "") {
            alert('Ops. No telp harus di isi.');
            $('#TELP').focus();
        } else {
            var x = confirm("Apakah anda yakin akan menyimpan data ini?");
            if (x) {
                $.ajax({
                    url: "<?php echo base_url() . 'farmasi.php/supplier/simpan' ?>",
                    type: "POST",
                    data: $('#form1').serialize(),
                    dataType: "JSON",
                    success: function(data) {
                        alert(data.message);
                        if (data.code == 200) {
                            $('#form1').find('input').val('');
                            $('#form1').find('textarea').val('');
                            $('#NMSUPPLIER').focus();
                        } else if (data.code == 201) {
                            var url = '<?php echo base_url() . 'farmasi.php/supplier' ?>';
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