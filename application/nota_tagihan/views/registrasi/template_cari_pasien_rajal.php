<style>
    div#pagination b {
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #337ab7;
        border-color: #337ab7;
    }

    div#pagination a {
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
        border-top-color: rgb(221, 221, 221);
        border-right-color: rgb(221, 221, 221);
        border-bottom-color: rgb(221, 221, 221);
        border-left-color: rgb(221, 221, 221);
    }

    .modal-content {
        max-height: 600px;
        overflow: scroll;
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="input-group input-group-sm">
                                <div class="input-group-btn">
                                    <button type="button" id="btn_pasien_baru" class="btn btn-primary">
                                        <i class="fa fa-medkit"></i> Pasien Baru
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group input-group-sm">
                                <input type="text" id="txtRegUnit" name="txtRegUnit" class="form-control" placeholder="Enter Nomor Registrasi Unit Rawat Jalan"  />

                                <div class="input-group-btn">
                                    <button type="button" id="btn_cetul_regunit" class="btn btn-primary">
                                        <i class="fa fa-search"></i> Cari Registrasi Unit Rajal
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!--div class="box-tools">

                    </div-->
                </div>
                <form id="form1" class="form-horizontal" onSubmit="return false" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-md-2 col-sm-2 col-xs-12 control-label">Nomor</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="txtNokartu" id="txtNokartu" placeholder="ketik nomor">
                                    <span class="input-group-addon">
                                        <label><input type="radio" name="rbnomor" value="nomr" id="rbkartunomr" checked=""> No MR</label>
                                        &nbsp;
                                        <label><input type="radio" name="rbnomor" value="bpjs" id="rbkartubpjs"> BPJS</label>
                                        &nbsp;
                                        <label><input type="radio" name="rbnomor" value="nik" id="rbkartunik"> NIK(eKTP)</label>

                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-3">
                                <div class="input-group">
                                    <button type="button" id="cariPasien" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/popper/popper.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/tooltip/tooltip.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#txtRegUnit').inputmask('AA-999999-99-9999', {
            'placeholder': '__-______-__-____'
        });
        $('#txtNokartu').keydown(function(e) {
            if (e.keyCode == 13) {
                var a = $('#txtNokartu').val();
                if (a == '') {
                    alert('Nomor identitas pasien tidak boleh kosong');
                } else {
                    $.ajax({
                        url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/cari_pasien' ?>",
                        type: "POST",
                        data: $('#form1').serialize(),
                        dataType: "JSON",
                        success: function(data) {
                            if (data.code == 200) {
                                var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/daftar_rawat_jalan/' ?>' + data.message;
                                window.location.href = url;
                            } else {
                                alert(data.message);
                            }
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            alert(jqXHR.responseText);
                        }
                    });
                }

            }
        });
        
        $('#btn_pasien_baru').click(function() {
            var url = '<?php echo base_url() . 'mr_registrasi.php/pasien_baru/tambah?jns=rj' ?>';
            window.location.href = url;
        });
        $('#txtRegUnit').keydown(function(e) {
            if (e.keyCode == 13) {
                var a = $('#txtRegUnit').val();
                if (a == '') {
                    alert('Nomor Registrasi Unit Rawat Jalan masih kosong');
                } else {
                    $.ajax({
                        url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/cekRegUnit' ?>",
                        type: "POST",
                        data: {
                            regUnitRajal: a
                        },
                        dataType: "JSON",
                        success: function(data) {
                            if (data.code == 200) {
                                var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/reg_success?uid=' ?>' + data.unikID;
                                window.location.href = url;
                            } else {
                                alert(data.message);
                            }
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(jqXHR.responseText);
                        }
                    });
                }
            }
        });
        $('#btn_cetul_regunit').click(function() {
            var a = $('#txtRegUnit').val();
            if (a == '') {
                alert('Nomor Registrasi Unit Rawat Jalan masih kosong');
            } else {
                $.ajax({
                    url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/cekRegUnit' ?>",
                    type: "POST",
                    data: {
                        regUnitRajal: a
                    },
                    dataType: "JSON",
                    success: function(data) {
                        if (data.code == 200) {
                            var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/reg_success?uid=' ?>' + data.unikID;
                            window.location.href = url;
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(jqXHR.responseText);
                    }
                });
            }
        });

        $('#cariPasien').click(function() {
            var a = $('#txtNokartu').val();
            if (a == '') {
                alert('Nomor identitas pasien tidak boleh kosong');
            } else {
                $.ajax({
                    url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/cari_pasien' ?>",
                    type: "POST",
                    data: $('#form1').serialize(),
                    dataType: "JSON",
                    success: function(data) {
                        if (data.code == 200) {
                            var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/daftar_rawat_jalan/' ?>' + data.message;
                            window.location.href = url;
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(jqXHR.responseText);
                    }
                });
            }
        });

    });
</script>