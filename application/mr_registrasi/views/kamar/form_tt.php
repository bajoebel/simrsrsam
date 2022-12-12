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
        <div class="col-xs-12 col-md-3">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h4>Data Tempat Tidur</h4>
                    <p>Kamar : <?= $datKamar['kamar_layanan'] ?></p>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>No Tempat Tidur</label>
                        <input type="hidden" id="idx">
                        <input type="text" class="form-control" id="no_tt">
                    </div>
                    <div class="form-group">
                        <label>Kondisi Tempat Tidur</label>
                        <select class="form-control" id="kondisi">
                            <option value="1">OK/Ready</option>
                            <option value="0">Rusak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="button" id="btnKembali" class="btn btn-primary">
                            <i class="fa fa-save"></i> Kembali
                        </button>

                        <button type="button" id="submit" class="btn btn-danger" onclick="simpan()">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-9">
            <div class="box box-success">
                <div class="box-header with-border">

                    <div class="col-lg-6 col-xs-12 mb-1">
                        <a href="#" id="btnRefresh" class="btn btn-default">
                            <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                    </div>
                    <div class="col-lg-6 col-xs-12 mb-1">
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2" style="width: 30px;text-align: center;">No</th>
                                <th rowspan="2" style="width: 120px;text-align: center;">ID. TT</th>
                                <th rowspan="2" style="width: 120px;text-align: center;">
                                    Kondisi
                                    <br/>
                                    Status
                                </th>
                                <th colspan="2" style="text-align: center;">Pengguna</th>
                                <th rowspan="2" style="width: 100px;text-align: center;">Action</th>
                            </tr>
                            <tr>
                                <th style="width: 120px;text-align: center;">
                                    No.Reg
                                    <br/>
                                    No.MR
                                </th>
                                <th style="text-align: center;">
                                    Nama
                                    <br/>
                                    Jns. Kelamin
                                </th>
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
    var kamarId = "<?= $datKamar['idx'] ?>";
    $(document).ready(function() {
        $('.modal').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        });

        getTable(kamarId);

        $('input').focus(function() {
            return $(this).select();
        });
        $('#btnRefresh').click(function() {
            $('#txtKeyword').val('');
            getTable(kamarId);
        });
        
        $('#btnKembali').click(function(){
            var url = "<?= base_url()."kamar" ?>";
            window.location.href = url;
        })

    });

    function getTable(a) {
        $.ajax({
            url: "<?php echo base_url() . 'kamar/getTt?kode=' ?>"+a,
            type: "GET",
            beforeSend: function() {
                $('.loading').modal('show');
                $('tbody#getdata').html("<tr><td colspan=6><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
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

    function edit(a, b, c) {
        $('#submit').html('Update');
        $('#idx').val(a);
        $('#no_tt').val(b);
        $('#kondisi').val(c);
    }

    function hapus(a) {
        var x = confirm("Apakah anda yakin akan menghapus record ini?");
        if (x) {
            var formdata = {};
            formdata['idx'] = a;
            $.ajax({
                url: "<?php echo base_url() . 'kamar/hapusTt' ?>",
                type: "POST",
                data: formdata,
                dataType: "JSON",
                success: function(data) {
                    alert(data.message);
                    if (data.code == 200) {
                        getTable(kamarId);
                    }
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        }
    }


    function simpan() {
        var formdata = {};
        formdata['idx'] = $('#idx').val();
        formdata['no_tt'] = $('#no_tt').val();
        formdata['kondisi'] = $('#kondisi').val();
        formdata['kamar_id'] = "<?= $datKamar['idx'] ?>";

        if (formdata['no_tt'] == "") {
            alert('Ops. Nomor/ID Tempat Tidur harus di isi.');
            $('#no_tt').focus();
        }else if(formdata['kondisi'] == ""){
            alert('Ops. Kondisi harus di isi.');
            $('#kondisi').focus();
        }else if(formdata['kamar_id'] == ""){
            alert('Ops. kamar tidak ditemukan.');
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'kamar/simpanTt' ?>",
                type: "POST",
                data: formdata,
                dataType: "JSON",
                success: function(data) {
                    alert(data.message);
                    if (data.code == 200 || data.code == 201) {
                        $('#idx').val('');
                        $('#no_tt').val('');
                        $('#kondisi').prop('selectedIndex',0);
                    }
                    getTable(kamarId);
                    $('#submit').html('Simpan');
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