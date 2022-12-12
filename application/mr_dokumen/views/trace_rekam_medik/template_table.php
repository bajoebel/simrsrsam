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

    .rataTengah {
        text-align: center;
    }

    .rataKanan {
        text-align: right;
    }

    .f15 {
        font-size: 15px;
    }

    .f20 {
        font-size: 20px;
    }

    .f20 {
        font-size: 20px;
    }

    .w10 {
        width: 10px;
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
                <div class="box-header with-border">
                    <div class="box-title">
                        <select name="id_ruang" id="id_ruang" class="form-control w250">
                            <option value=""></option>
                            <option value="ALL">Semua Lokasi Pelayanan</option>
                            <?php foreach ($datRuang->result_array() as $x) : ?>
                                <option value="<?php echo $x['idx'] ?>"><?php echo $x['ruang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="state_trace" id="state_trace" class="form-control w200">
                            <option value="ALL">Semua Status</option>
                            <option value="0">Belum di proses</option>
                            <option value="1">Telah di proses</option>
                        </select>
                    </div>

                    <a href="#" id="btnRefresh" class="btn btn-danger">
                        <i class="glyphicon glyphicon-refresh"></i> Refresh</a>

                    <div class="box-tools" style="margin-top: 5px">
                        <div class="input-group">
                            <input readonly="" type="text" name="tglLayanan" id="tglLayanan" class="form-control" style="width: 110px" placeholder="dd/mm/yyyy" />

                            <span style="width: 10px">&nbsp;</span>

                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter No.MR / No.Reg RS" style="width: 250px" />
                            <div class="input-group-btn">
                                <button type="button" id="btnKeyword" class="btn btn-primary">
                                    <i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <hr />

                <div class="box-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="w100">No Reg RS</th>
                                <th class="w120">No Reg Unit</th>
                                <th class="w100">Waktu<br />Registrasi</th>
                                <th class="">No.MR</th>
                                <th class="">Nama Pasien</th>
                                <th class="">Tempat Layanan</th>
                                <th class="">Status</th>
                                <th class="w150">Action</th>
                            </tr>
                        </thead>
                        <tbody id="getdata">
                            <tr>
                                <td colspan=8>Data Masih kosong</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    // var myVar = setInterval(getTable, 5000);

    $(document).ready(function() {
        $('select').select2({
            placeholder: 'Pilih Lokasi Layanan'
        });
        getTable();
        $('#tglLayanan').val('<?php echo date('d/m/Y') ?>')
        $('#tglLayanan').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy"
        });
        $('#btnRefresh').click(function() {
            $('select').val('').trigger('change');
            getTable();
        });
        $('#keyword').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                $.ajax({
                    url: "<?php echo base_url() . 'mr_dokumen.php/trace_rekam_medik/getView' ?>",
                    type: "POST",
                    data: {
                        sLike: $(this).val()
                    },
                    beforeSend: function() {
                        $('tbody#getdata').html("<tr><td colspan=8><i class='fa fa-spin fa-refresh'></i> Silahkan tunggu... Aplikasi sedang mengambil data.</td></tr>");
                    },
                    success: function(data) {
                        $('tbody#getdata').html(data);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        $('tbody#getdata').html("<tr><td colspan=8>Ops. Data tidak ditemukan</td></tr>");
                        console.log(jqXHR.responseText);
                    }
                });
            }
        });
        $('#btnKeyword').click(function() {
            var a = $('#keyword').val();
            if (a == "") {
                alert("Keyword masih kosong");
            } else {
                $.ajax({
                    url: "<?php echo base_url() . 'mr_dokumen.php/trace_rekam_medik/getView' ?>",
                    type: "POST",
                    data: {
                        sLike: a
                    },
                    beforeSend: function() {
                        $('tbody#getdata').html("<tr><td colspan=8><i class='fa fa-spin fa-refresh'></i> Silahkan tunggu... Aplikasi sedang mengambil data.</td></tr>");
                    },
                    success: function(data) {
                        $('tbody#getdata').html(data);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        $('tbody#getdata').html("<tr><td colspan=8>Ops. Data tidak ditemukan</td></tr>");
                        console.log(jqXHR.responseText);
                    }
                });
            }
        });
        $('#id_ruang').change(function(e) {
            var a = $('#id_ruang').val();
            if (a == "") {
                e.preventDefault();
            } else {
                $.ajax({
                    url: "<?php echo base_url() . 'mr_dokumen.php/trace_rekam_medik/getView' ?>",
                    type: "POST",
                    data: {
                        id_ruang: a
                    },
                    beforeSend: function() {
                        $('tbody#getdata').html("<tr><td colspan=8><i class='fa fa-spin fa-refresh'></i> Silahkan tunggu... Aplikasi sedang mengambil data.</td></tr>");
                    },
                    success: function(data) {
                        $('tbody#getdata').html(data);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        $('tbody#getdata').html("<tr><td colspan=8>Ops. Data tidak ditemukan</td></tr>");
                        console.log(jqXHR.responseText);
                    }
                });
            }
        });
        $('#tglLayanan').change(function(e) {
            var a = $('#tglLayanan').val();
            if (a == "") {
                e.preventDefault();
            } else {
                $.ajax({
                    url: "<?php echo base_url() . 'mr_dokumen.php/trace_rekam_medik/getView' ?>",
                    type: "POST",
                    data: {
                        tglLayanan: a
                    },
                    beforeSend: function() {
                        $('tbody#getdata').html("<tr><td colspan=8><i class='fa fa-spin fa-refresh'></i> Silahkan tunggu... Aplikasi sedang mengambil data.</td></tr>");
                    },
                    success: function(data) {
                        $('tbody#getdata').html(data);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        $('tbody#getdata').html("<tr><td colspan=8>Ops. Data tidak ditemukan</td></tr>");
                        console.log(jqXHR.responseText);
                    }
                });
            }
        });
        $('#state_trace').change(function(e) {
            var a = $('#state_trace').val();
            if (a == "") {
                e.preventDefault();
            } else {
                $.ajax({
                    url: "<?php echo base_url() . 'mr_dokumen.php/trace_rekam_medik/getView' ?>",
                    type: "POST",
                    data: {
                        state_trace: a
                    },
                    beforeSend: function() {
                        $('tbody#getdata').html("<tr><td colspan=8><i class='fa fa-spin fa-refresh'></i> Silahkan tunggu... Aplikasi sedang mengambil data.</td></tr>");
                    },
                    success: function(data) {
                        $('tbody#getdata').html(data);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        $('tbody#getdata').html("<tr><td colspan=8>Ops. Data tidak ditemukan</td></tr>");
                        console.log(jqXHR.responseText);
                    }
                });
            }
        });
    });

    // Function
    function getTable() {
        var formdata = {};
        if ($('#id_ruang').val() !== "") {
            formdata['id_ruang'] = $('#id_ruang').val();
        }
        if ($('#state_trace').val() !== "") {
            formdata['state_trace'] = $('#state_trace').val();
        }
        if ($('#tglLayanan').val() !== "") {
            formdata['tglLayanan'] = $('#tglLayanan').val();
        }
        if ($('#keyword').val() !== "") {
            formdata['keyword'] = $('#keyword').val();
        }

        $.ajax({
            url: "<?php echo base_url() . 'mr_dokumen.php/trace_rekam_medik/getView' ?>",
            type: "POST",
            data: formdata,
            beforeSend: function() {
                $('tbody#getdata').html("<tr><td colspan=8><i class='fa fa-spin fa-refresh'></i> Silahkan tunggu... Aplikasi sedang mengambil data.</td></tr>");
            },
            success: function(data) {
                $('tbody#getdata').html(data);
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                $('tbody#getdata').html("<tr><td colspan=8>Ops. Data tidak ditemukan</td></tr>");
                console.log(jqXHR.responseText);
            }
        });
        //setTimeout(function () { getTable() }, 10000);               
    }

    function check(a) {
        $.ajax({
            url: "<?php echo base_url() . 'mr_dokumen.php/trace_rekam_medik/updateState' ?>",
            type: "POST",
            data: {
                idx: a
            },
            dataType: "JSON",
            success: function(data) {
                if (data.code == 200) {
                    getTable();
                } else {
                    alert(data.message);
                }
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    }

    function uncheck(a) {
        $.ajax({
            url: "<?php echo base_url() . 'mr_dokumen.php/trace_rekam_medik/updateState2' ?>",
            type: "POST",
            data: {
                idx: a
            },
            dataType: "JSON",
            success: function(data) {
                if (data.code == 200) {
                    getTable();
                } else {
                    alert(data.message);
                }
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    }

    function print(a) {
        $.ajax({
            url: "<?php echo base_url() . 'mr_dokumen.php/trace_rekam_medik/updateState3' ?>",
            type: "POST",
            data: {
                reg_unit: a
            },
            dataType: "JSON",
            success: function(data) {
                getTable();
                if (data.code == 200) {
                    //window.open("<?php echo base_url() . 'mr_dokumen.php/trace_rekam_medik/setPrint?kode=' ?>"+a);
                    <?php if (!empty(LOCAL_PRINT)) { ?>
                        window.open("<?php echo LOCAL_PRINT . 'printer/tracert/' ?>" + a);
                    <?php } else { ?>
                        window.open("<?php echo base_url() . 'mr_dokumen.php/trace_rekam_medik/setPrint?kode=' ?>" + a);
                    <?php } ?>
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