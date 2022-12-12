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

    .rightAlign {
        text-align: right;
    }

    .centerAlign {
        text-align: center;
    }

    tr.odd {
        background: #e1e1e1
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
                    <h3 class="box-title">
                        <a href="#" id="btnRefresh" class="btn btn-default">
                            <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                    </h3>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th colspan="3">
                                    <div class="pull-right">
                                        <span>Lokasi Obat : </span>
                                        <select name="KDLOKASI" id="KDLOKASI" class="form-control">
                                            <option value=""></option>
                                            <?php foreach ($datLokasi->result_array() as $x) : ?>
                                                <option value="<?php echo $x['KDLOKASI'] ?>"><?php echo $x['NMLOKASI'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </th>
                                <th colspan="3">

                                    <div class="pull-right">
                                        <div class="input-group" style="width: 200px;">
                                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter Nama Obat / Alkes" style="width: 250px" />
                                            <div class="input-group-btn">
                                                <button type="button" id="btnKeyword" class="btn btn-primary">
                                                    <i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                </th>
                            </tr>
                            <tr>
                                <th width="30px">No</th>
                                <th>Nama Stok Obat / Alkes</th>
                                <th width="50px">Kode</th>
                                <th>Satuan</th>
                                <th width="80px">Jml Stok</th>
                                <th>Lokasi Obat</th>
                            </tr>
                        </thead>
                        <tbody id="getdata"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        getTable();
        $('input').focus(function() {
            return $(this).select();
        });
        $('#btnRefresh').click(function() {
            $('#KDLOKASI').val('').trigger('change');
            getTable();
        });
        $('#KDLOKASI').select2({
            placeholder: 'Pilih Lokasi Obat'
        }).val('').trigger('change');
        $('#KDLOKASI').change(function() {
            var a = $("#KDLOKASI").val();
            if (a !== "") {
                var b = $("#keyword").val();
                $.ajax({
                    url: "<?php echo base_url() . 'farmasi.php/stok_lokasi/getView' ?>",
                    type: "POST",
                    data: {
                        sLike: b,
                        KDLOKASI: a
                    },
                    beforeSend: function() {
                        $('tbody#getdata').html("<tr><td colspan=6>Loading ... Please Wait</td></tr>");
                    },
                    success: function(data) {
                        $('tbody#getdata').html(data);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(jqXHR.responseText);
                    }
                });

            }
        });
        $('#keyword').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                var a = $('#keyword').val();
                var b = $("#KDLOKASI").val();
                $.ajax({
                    url: "<?php echo base_url() . 'farmasi.php/stok_lokasi/getView' ?>",
                    type: "POST",
                    data: {
                        sLike: a,
                        KDLOKASI: b
                    },
                    beforeSend: function() {
                        $('tbody#getdata').html("<tr><tdcolspan=6><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                    },
                    success: function(data) {
                        $('tbody#getdata').html(data);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        $('tbody#getdata').html("<tr><tdcolspan=6>Data tidak ditemukan</td></tr>");
                        console.log(jqXHR.responseText);
                    }
                });
            }
        });
        $('#btnKeyword').click(function() {
            var a = $('#keyword').val();
            var b = $("#KDLOKASI").val();
            $.ajax({
                url: "<?php echo base_url() . 'farmasi.php/stok_lokasi/getView' ?>",
                type: "POST",
                data: {
                    sLike: a,
                    KDLOKASI: b
                },
                beforeSend: function() {
                    $('tbody#getdata').html("<tr><tdcolspan=6><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success: function(data) {
                    $('tbody#getdata').html(data);
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    $('tbody#getdata').html("<tr><tdcolspan=6>Data tidak ditemukan</td></tr>");
                    console.log(jqXHR.responseText);
                }
            });
        });
    });

    function getTable() {
        $.ajax({
            url: "<?php echo base_url() . 'farmasi.php/stok_lokasi/getView' ?>",
            type: "POST",
            beforeSend: function() {
                $('tbody#getdata').html("<tr><tdcolspan=6><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success: function(data) {
                $('tbody#getdata').html(data);
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                $('tbody#getdata').html("<tr><tdcolspan=6>Data tidak ditemukan</td></tr>");
                console.log(jqXHR.responseText);
            }
        });
    }
</script>