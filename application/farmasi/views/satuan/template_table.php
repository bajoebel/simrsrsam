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
                        <a href="#" id="btnTambah" class="btn btn-default">
                            <i class="glyphicon glyphicon-plus"></i> Tambah</a>
                        <a href="#" id="btnRefresh" class="btn btn-default">
                            <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                    </h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter Satuan" style="width: 200px" />
                            <div class="input-group-btn">
                                <button type="button" id="btnKeyword" class="btn btn-primary">
                                    <i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>Satuan</th>
                                <th style="width: 220px">#</th>
                            </tr>
                        </thead>
                        <tbody id="getdata"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="formModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Form Satuan</h4>
            </div>
            <div class="modal-body">

                <form id="form1" role="form" onsubmit="return false">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Satuan</label>
                                <input type="hidden" class="csrf" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <input type="hidden" name="KDSATUAN" id="KDSATUAN">
                                <input type="text" class="form-control" name="NMSATUAN" id="NMSATUAN">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" id="submit" class="btn btn-primary" onclick="simpan()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        getTable();
        $('input').focus(function() {
            return $(this).select();
        });
        $('#btnTambah').click(function() {
            $('#submit').html('Simpan');
            $('#KDSATUAN').val('');
            $('#NMSATUAN').val('');
            $('#formModal').modal('show');
        });
        $('#btnRefresh').click(function() {
            getTable();
        });
        $('#keyword').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                $.ajax({
                    url: "<?php echo base_url() . 'farmasi.php/satuan/getView' ?>",
                    type: "POST",
                    data: {
                        sLike: $(this).val(),
                        <?= $this->security->get_csrf_token_name(); ?>: $('#csrf').val()
                    },
                    beforeSend: function() {
                        $('tbody#getdata').html("<tr><td colspan=3><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                    },
                    success: function(data) {
                        $('tbody#getdata').html(data);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(errorThrown);
                    },
                    complete: function() {
                        var csrf = $('#csrf').val();
                        $('.csrf').val(csrf);
                    }
                });
            }
        });
        $('#btnKeyword').click(function() {
            $.ajax({
                url: "<?php echo base_url() . 'farmasi.php/satuan/getView' ?>",
                type: "POST",
                data: {
                    sLike: $('#keyword').val(),
                    <?= $this->security->get_csrf_token_name(); ?>: $('#csrf').val()
                },
                beforeSend: function() {
                    $('tbody#getdata').html("<tr><td colspan=3><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success: function(data) {
                    $('tbody#getdata').html(data);
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(errorThrown);
                },
                complete: function() {
                    var csrf = $('#csrf').val();
                    $('.csrf').val(csrf);
                }
            });
        });

    });

    // Function
    function getTable() {
        $.ajax({
            url: "<?php echo base_url() . 'farmasi.php/satuan/getView' ?>",
            beforeSend: function() {
                $('tbody#getdata').html("<tr><td colspan=2><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success: function(data) {
                $('tbody#getdata').html(data);
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(errorThrown);
            },
            complete: function() {
                var csrf = $('#csrf').val();
                $('.csrf').val(csrf);
            }
        });
    }

    function edit(a, b) {
        $('#submit').html('Update');
        $('#KDSATUAN').val(a);
        $('#NMSATUAN').val(b);
        $('#formModal').modal("show");
    }

    function hapus(a) {
        var x = confirm("Apakah anda yakin akan menghapus record ini?");
        var csrf = $('#csrf').val();
        console.log(csrf)
        if (x) {
            $.ajax({
                url: "<?php echo base_url() . 'farmasi.php/satuan/hapus' ?>",
                type: "POST",
                data: {
                    KDSATUAN: a,
                    <?= $this->security->get_csrf_token_name(); ?>: $('#csrf').val()
                },
                dataType: "JSON",
                success: function(data) {
                    alert(data.message);
                    getTable();
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        }
    }

    function simpan() {
        var a = $('#NMSATUAN').val();
        if (a == "") {
            alert('Ops. Satuan harus di isi.');
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'farmasi.php/satuan/simpan' ?>",
                type: "POST",
                data: $('#form1').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.code == 200) {
                        alert(data.message);
                        $('#form1').find('input').val('');
                    } else if (data.code == 201) {
                        alert(data.message);
                        $('#form1').find('input').val('');
                        $('#formModal').modal('hide');
                    } else {
                        alert(data.message);
                    }
                    getTable();
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        }
    }
</script>