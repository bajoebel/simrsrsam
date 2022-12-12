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
                        <a href="#" id="btnTambah" class="btn btn-primary">
                            <i class="glyphicon glyphicon-plus"></i> Tambah</a>
                        <a href="#" id="btnRefresh" class="btn btn-default">
                            <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                    </div>
                    <div class="col-lg-6 col-xs-12 mb-1">
                        <div class="input-group input-group-sm">
                            <input type="text" id="txtKeyword" class="form-control" placeholder="Enter kamar layanan" />
                            <div class="input-group-btn">
                                <button type="button" id="btnKeyword" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2" style="width: 30px;text-align: center;">No</th>
                                <th rowspan="2">Kamar Rawat</th>
                                <th rowspan="2" style="width: 120px;text-align: center;">Ruang Rawat</th>
                                <th rowspan="2" style="width: 100px;text-align: center;">Kelas</th>
                                <th rowspan="2" style="width: 100px;text-align: center;">SMF</th>
                                <th colspan="4" style="text-align: center;">Informasi Ketersedian Tempat Tidur</th>
                                <th rowspan="2" style="width: 100px;text-align: center;">Action</th>
                            </tr>
                            <tr>
                                <th style="width: 100px;text-align: center;">Total TT</th>
                                <th style="width: 100px;text-align: center;">Rusak</th>
                                <th style="width: 100px;text-align: center;">Tersedia</th>
                                <th style="width: 120px;text-align: center;">Terisi</th>
                            </tr>
                        </thead>
                        <tbody id="getdata"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Form Entry</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kamar Rawat</label>
                                <input type="hidden" id="idx">
                                <input type="text" class="form-control" id="kamar_layanan">
                            </div>
                            <div class="form-group">
                                <label>Ruang Rawat</label>
                                <select class="form-control" id="ruang_id">
                                    <?php
                                    foreach ($datRuang->result_array() as $xRuang):
                                    ?>
                                    <option value="<?= $xRuang['idx'] ?>"><?= $xRuang['ruang_layanan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kelas Rawat</label>
                                <select class="form-control" id="kelas_id">
                                    <?php
                                    foreach ($datKelas->result_array() as $xKelas):
                                    ?>
                                    <option value="<?= $xKelas['idx'] ?>"><?= $xKelas['kelas_layanan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>SMF</label>
                                <select class="form-control" id="smf_id">
                                    <?php
                                    foreach ($datSmf->result_array() as $xSmf):
                                    ?>
                                    <option value="<?= $xSmf['idx'] ?>"><?= $xSmf['nama_smf'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="button" id="submit" class="btn btn-primary" onclick="simpan()">Simpan</button>
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
            $('#submit').html('Simpan');
            $('#idx').val('');
            $('#kamar_layanan').val('');
            $('#ruang_id').prop('selectedIndex',0);
            $('#kelas_id').prop('selectedIndex',0);
            $('#smf_id').prop('selectedIndex',0);
            $('#formModal').modal('show');
        });
        $('input').focus(function() {
            return $(this).select();
        });
        $('#btnRefresh').click(function() {
            $('#txtKeyword').val('');
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
        var formdata = {};
        formdata['sLike'] = $('#txtKeyword').val();

        $.ajax({
            url: "<?php echo base_url() . 'kamar/getView' ?>",
            type: "POST",
            data: formdata,
            beforeSend: function() {
                $('.loading').modal('show');
                $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
            },
            success: function(data) {
                $('.loading').modal('hide');
                $('tbody#getdata').html(data);
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                $('.loading').modal('hide');
                console.log(errorThrown);
            }
        });
    }

    function edit(a, b, c, d, e) {
        $('#submit').html('Update');
        $('#idx').val(a);
        $('#kamar_layanan').val(b);
        $('#ruang_id').val(c);
        $('#kelas_id').val(d);
        $('#smf_id').val(e);
        $('#formModal').modal("show");
    }

    function hapus(a) {
        var x = confirm("Apakah anda yakin akan menghapus record ini?");
        if (x) {
            var formdata = {};
            formdata['idx'] = a;
            $.ajax({
                url: "<?php echo base_url() . 'kamar/hapus' ?>",
                type: "POST",
                data: formdata,
                dataType: "JSON",
                success: function(data) {
                    alert(data.message);
                    if (data.code == 200) {
                        getTable();
                    }
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        }
    }

    function infoTempatTidur(a){
        var url = "<?= base_url()."kamar/infoTT?kode=" ?>"+a;
        window.location.href = url;    
    }

    function simpan() {
        var formdata = {};
        formdata['idx'] = $('#idx').val();
        formdata['kamar_layanan'] = $('#kamar_layanan').val();
        formdata['ruang_id'] = $('#ruang_id').val();
        formdata['kelas_id'] = $('#kelas_id').val();
        formdata['smf_id'] = $('#smf_id').val();

        if (formdata['kamar_layanan'] == "") {
            alert('Ops. kamar Layanan harus di isi.');
            $('#kamar_layanan').focus();
        }else if(formdata['ruang_id'] == ""){
            alert('Ops. Ruang Rawat harus di pilih.');
            $('#ruang_id').focus();
        }else if(formdata['kelas_id'] == ""){
            alert('Ops. Kelas Rawat harus di pilih.');
            $('#kelas_id').focus();
        }else if(formdata['smf_id'] == ""){
            alert('Ops. SMF harus di pilih.');
            $('#smf_id').focus();
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'kamar/simpan' ?>",
                type: "POST",
                data: formdata,
                dataType: "JSON",
                success: function(data) {
                    alert(data.message);
                    if (data.code == 200) {
                        $('#idx').val('');
                        $('#kamar_layanan').val('');
                        $('#kelas_id').prop('selectedIndex',0);
                        $('#smf_id').prop('selectedIndex',0);
                    } else if (data.code == 201) {
                        $('#formModal').modal('hide');
                    }
                    getTable();
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        }
    }

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>