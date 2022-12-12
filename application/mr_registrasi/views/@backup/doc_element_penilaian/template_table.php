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

    a {
        cursor: pointer;
    }

    .form-control[readonly] {
        cursor: not-allowed;
    }

    td.td-responsive button {
        margin: 2px;
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
                    <div class="row mb-2">
                        <div class="col-lg-6 col-xs-12 mb-1">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file"></i> Standar Akreditasi
                                </div>
                                <select id="sars_id" class="form-control">
                                    <option value="">Pilih Standar Akreditasi</option>
                                    <?php foreach ($datSARS->result_array() as $x) : ?>
                                        <option value="<?= (int)$x['idx'] ?>"><?= (int)$x['idx'] . ". " . $x['sars'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 col-xs-12 mb-1">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file"></i> Element Penilaian
                                </div>
                                <select id="ep_sars_id" class="form-control">
                                    <option value="">Pilih Element Penilaian</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <?php
                    $datUser = getUserById(getUID());
                    ?>

                    <div class="row">
                        <div class="col-lg-4 col-xs-12 mb-1">
                            <?php if ($datUser['level'] == "administrator") : ?>
                                <a href="#" id="btnTambah" class="btn btn-default">
                                    <i class="glyphicon glyphicon-plus"></i> Tambah</a>
                            <?php endif;  ?>
                            <a href="#" id="btnRefresh" class="btn btn-default">
                                <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                        </div>

                        <div class="col-lg-8 col-xs-12 mb-1">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-search"></i> Cari Point EP
                                </div>
                                <input type="text" id="txtKeyword" name="txtKeyword" class="form-control" placeholder="Enter Keyword" />
                                <div class="input-group-btn">
                                    <button type="button" id="btnKeyword" class="btn btn-primary">
                                        <i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 30px">No</th>
                                <th>Point Element Penilaian</th>
                                <th style="width: 300px;">Dokumen</th>
                                <th style="width: 60px;">Nilai</th>
                                <th style="width: 120px;text-align: center;">#</th>
                            </tr>
                        </thead>
                        <tbody id="getdata">
                            <tr>
                                <td colspan="7">Silahkan pilih Standar Akreditasi dan Element Penilaian untuk menampilkan data.</td>
                            </tr>
                        </tbody>
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
                <small>Mohon ditunggu... Permintaan sedang diproses</small>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDokumen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <form id="form1" role="form" method="POST" enctype="multipart/form-data" onsubmit="return false">
                            <div class="form-group">
                                <label class="control-label">Jenis Dokumen</label>
                                <input type="hidden" name="idx" id="idx" />
                                <select class="form-control" name="jns_dokumen" id="jns_dokumen">
                                    <option value="1">Regulasi</option>
                                    <option value="2">Dokumen Bukti</option>
                                    <option value="3">Dokumen Lainnya</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Upload Files <em class="text-red">(.pdf)</em></label>
                                <input type="file" name="files_upload" id="files_upload">
                            </div>

                            <div class="form-group">
                                <button id="btnUpload" type="button" class="btn btn-danger pull-right">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalNilai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="control-label">Set Nilai EP <em class="text-red">*</em></label>
                            <input type="hidden" name="nilai_idx" id="nilai_idx" />
                            <select class="form-control" name="nilai" id="nilai">
                                <option value="0">0</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btnSetNilai" type="button" class="btn btn-danger">Set Nilai</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.modal').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        });
        $('#sars_id').prop('selectedIndex', 0);

        $('#btnTambah').click(function() {
            var a = $('#sars_id').val();
            var b = $('#ep_sars_id').val();
            if (a == "") {
                alert('Ops. Standar Akreditasi Rumah Sakit harus dipilih')
            } else if (b == "") {
                alert('Ops. Element Penilaian harus dipilih')
            } else {
                var url = "<?php echo base_url() . 'doc_element_penilaian/tambah?sars_id=' ?>" + a + '&ep_sars_id=' + b;
                window.location.href = url;
            }
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

        $('#sars_id').change(function() {
            getTable();
            var a = $('#sars_id').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'doc_element_penilaian/getElementPenilaian' ?>",
                data: {
                    sars_id: a
                },
                success: function(data) {
                    var x = eval("(" + data + ")");
                    var xOption = "";
                    // $('#ep_sars_id').html(data);
                    xOption += '<option value="">Pilih Element Penilaian</option>\n';
                    if (x.length > 0) {
                        for (i = 0; i < x.length; i++) {
                            xOption += '<option value="' + x[i]['idx'] + '">' + x[i]['ep_sars'] + '</option>\n';
                        }
                    }
                    $('#ep_sars_id').html(xOption);
                    $('#ep_sars_id').show();
                },
                error: function(xhr, ajaxOption, thrownError) {
                    console.log('Response : ' + thrownError);
                }
            });
        });

        $('#ep_sars_id').change(function() {
            getTable();
        });

        $('#btnUpload').click(function(evt) {
            evt.preventDefault();

            var formdata = new FormData($('#form1').get(0));
            formdata.append('idx', $('#idx').val());
            formdata.append('jns_dokumen', $('#jns_dokumen').val());
            formdata.append('files_upload', $('#files_upload')[0].files[0]);

            $.ajax({
                url: "<?php echo base_url() . 'doc_element_penilaian/upload_dokumen' ?>",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                async: false,
                dataType: "JSON",
                beforeSend: function() {
                    $('#loading').modal('show');
                },
                success: function(data) {
                    alert(data.message);
                    $('#loading').modal('hide');
                    if (data.code == 200) {
                        getTable();
                        $('#modalDokumen').modal('hide');
                    }
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    $('#loading').modal('hide');
                    console.log(jqXHR.responseText);
                }
            });
        });

        $('#btnSetNilai').click(function() {
            var formdata = {};
            formdata['idx'] = $('#nilai_idx').val();
            formdata['nilai'] = $('#nilai').val();
            $.ajax({
                url: "<?php echo base_url() . 'doc_element_penilaian/set_nilai' ?>",
                type: "POST",
                data: formdata,
                dataType: "JSON",
                beforeSend: function() {
                    $('#loading').modal('show');
                },
                success: function(data) {
                    $('#loading').modal('hide');
                    alert(data.message);
                    if (data.code == 200) {
                        getTable();
                        $('#modalNilai').modal('hide');
                    }
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    $('#loading').modal('hide');
                    console.log(jqXHR.responseText);
                }
            });
        });

    });

    // Function
    function getTable() {
        var formdata = {};
        formdata['sars_id'] = $('#sars_id').val();
        formdata['ep_sars_id'] = $('#ep_sars_id').val();
        formdata['sLike'] = $('#txtKeyword').val();
        $.ajax({
            url: "<?php echo base_url() . 'doc_element_penilaian/getView' ?>",
            type: "POST",
            data: formdata,
            beforeSend: function() {
                // $('.loading').modal('show');
                $('tbody#getdata').html("<tr><td colspan=5><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success: function(data) {
                // $('.loading').modal('hide');
                $('tbody#getdata').html(data);
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                // $('.loading').modal('hide');
                console.log(jqXHR.responseText);
            }
        });
    }

    function lihat(source) {
        var url = "<?php echo base_url() . 'doc_element_penilaian/doc_viewer?source=' ?>" + source;
        window.open(url);
    }

    function tambah_dokumen(a) {
        $('#idx').val(a);
        $('#files_upload').val('');
        $('#jns_dokumen').prop('selectedIndex', 0);
        $('#modalDokumen').modal('show');
    }

    function set_nilai(a) {
        $('#nilai_idx').val(a);
        $('#nilai').prop('selectedIndex', 0);
        $('#modalNilai').modal('show');
    }

    function edit(c) {
        var a = $('#sars_id').val();
        var b = $('#ep_sars_id').val();
        if (a == "") {
            alert('Ops. Standar Akreditasi Rumah Sakit harus dipilih')
        } else if (b == "") {
            alert('Ops. Element Penilaian harus dipilih')
        } else {
            var url = "<?php echo base_url() . 'doc_element_penilaian/tambah?sars_id=' ?>" + a + '&ep_sars_id=' + b + '&idx=' + c;
            window.location.href = url;
        }
    }

    function hapus(a) {
        var x = confirm("Apakah anda yakin akan menghapus record ini?");
        if (x) {
            $.ajax({
                url: "<?php echo base_url() . 'doc_element_penilaian/hapus' ?>",
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
    }

    function hapus_dokumen(a) {
        var x = confirm("Apakah anda yakin akan menghapus dokumen ini?");
        if (x) {
            $.ajax({
                url: "<?php echo base_url() . 'doc_element_penilaian/hapus_dokumen' ?>",
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
    }
</script>