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

    .modal .modal-dialog {
        min-height: calc(100vh - 60px);
        display: flex;
        flex-direction: column;
        justify-content: center;
        overflow: auto;
    }

    @media(max-width: 768px) {
        .modal .modal-dialog {
            min-height: calc(100vh - 20px);
        }

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
                    <div class="col-lg-6 col-xs-12 mb-1">
                        <a href="#" id="btnTambah" class="btn btn-default">
                            <i class="glyphicon glyphicon-plus"></i> Tambah</a>
                        <a href="#" id="btnRefresh" class="btn btn-default">
                            <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                    </div>

                    <div class="col-lg-6 col-xs-12 mb-1">
                        <div class="input-group input-group-sm">
                            <input type="text" id="txtKeyword" class="form-control" placeholder="Enter Nama Lengkap" />
                            <div class="input-group-btn">
                                <button type="button" id="btnKeyword" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="box-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 50px">No</th>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>User Level</th>
                                <th>Terakhir Login</th>
                                <th>User Status</th>
                                <th style="width: 250px;text-align: center;">Ubah Status</th>
                                <th style="width: 120px;text-align: center;">Edit</th>
                            </tr>
                        </thead>
                        <tbody id="getdata"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade loading" id="loading" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 99999;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center">
                <i class="fa fa-refresh fa-spin"></i>
                <br>
                <small>Mohon ditunggu... Permintaan sedang diproses</small>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.modal').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        });
        getTable();
        $('#btnTambah').click(function() {
            var url = "<?php echo base_url() . 'users/tambah' ?>";
            window.location.href = url;
        });
        $('#btnRefresh').click(function() {
            getTable();
        });
        $('#txtKeyword').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                getTable();
            }
        });
        $('#btnKeyword').click(function() {
            getTable();
        });

    });

    function getTable() {
        var formdata = {}
        formdata['sLike'] = $('#txtKeyword').val();
        $.ajax({
            url: "<?php echo base_url() . 'users/getView' ?>",
            type: "POST",
            data: formdata,
            beforeSend: function() {
                $('.loading').modal('show');
                $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success: function(data) {
                $('.loading').modal('hide');
                $('tbody#getdata').html(data);
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                $('.loading').modal('hide');
                $('tbody#getdata').html("<tr><td colspan=9>" + jqXHR.responseText + "</td></tr>");
                console.log(jqXHR.responseText);
            }
        });
    }

    function setNonAktif(a) {
        $.ajax({
            url: "<?php echo base_url() . 'users/setNonAktif' ?>",
            type: "POST",
            data: {
                idx: a
            },
            dataType: "JSON",
            success: function(data) {
                getTable();
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    }

    function setAktif(a) {
        $.ajax({
            url: "<?php echo base_url() . 'users/setAktif' ?>",
            type: "POST",
            data: {
                idx: a
            },
            dataType: "JSON",
            success: function(data) {
                getTable();
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    }

    function reset(a) {
        var x = confirm('Apakah anda yakin mereset password user ini?');
        if (x) {
            $.ajax({
                url: "<?php echo base_url() . 'users/resetPasw' ?>",
                type: "POST",
                data: {
                    idx: a
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
        };
    }
</script>