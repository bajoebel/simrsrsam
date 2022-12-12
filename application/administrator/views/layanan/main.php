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
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter Bahasa Daerah" style="width: 200px" />
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
                                <th>Layanan</th>
                                <th>Kategori</th>
                                <th style="width: 150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="getdata"></tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" id="pagination"></td>
                            </tr>
                        </tfoot>
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

                    <form id="form1" role="form" onsubmit="return false">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Layanan</label>
                                    <input type="hidden" name="idx" id="idx">
                                    <input type="text" class="form-control" name="layanan" id="layanan">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori" id="kategori" class="form-control">
                                        <option value="0">-</option>
                                        <?php
                                        foreach ($kategori as $k) {
                                        ?>
                                            <option value="<?= $k->idx ?>"><?= $k->kategori_tarif; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
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
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        getTable(0);
        $('input').focus(function() {
            return $(this).select();
        });
        $('#btnTambah').click(function() {
            $('#submit').html('Simpan');
            $('#idx').val('');
            $('#bahasa').val('');
            $('#formModal').modal('show');
        });
        $('#btnRefresh').click(function() {
            $('input').val('');
            getTable(0);
        });
        $('#keyword').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                getTable(0);
            }
        });
        $('#btnKeyword').click(function() {
            getTable(0);
        });
    });

    function getTable(start = 0) {
        var keyword = $('#keyword').val();
        var url = "<?php echo base_url() . 'administrator.php/layanan/data?start=' ?>" + start + "&q=" + keyword;
        console.log(url);
        $.ajax({
            url: "<?php echo base_url() . 'administrator.php/layanan/data?start=' ?>" + start + "&q=" + keyword,
            type: "GET",
            dataType: "json",
            data: {
                get_param: 'value'
            },
            beforeSend: function() {
                $('tbody#getdata').html("<tr><td colspan=3><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
            },
            success: function(data) {
                if (data["status"] == true) {
                    var row = data["data"];
                    var jmlData = row.length;
                    var limit = data["limit"]
                    var tabel = "";
                    //Create Tabel
                    for (var i = 0; i < jmlData; i++) {
                        start++;
                        tabel += "<tr>";
                        tabel += "<td>" + start + "</td>";
                        tabel += "<td>" + row[i]["layanan"] + "</td>";
                        tabel += "<td>" + row[i]["kategori_tarif"] + "</td>";
                        tabel += '<td class=\'text-right\'><div class=\'btn-group\'><button type=\'button\' class=\'btn btn-success\' onclick=\'edit("' + row[i]["idx"] + '","' + row[i]["layanan"] + '","' + row[i]["kategori_id"] + '")\'><span class=\'fa fa-pencil\' ></span></button>';
                        tabel += '<button type=\'button\' class=\'btn btn-danger\' onclick=\'hapus("' + row[i]["idx"] + '")\'><span class=\'fa fa-remove\' ></span></div></td>';
                        tabel += "</tr>";
                    }
                    $('tbody#getdata').html(tabel);
                    //Create Pagination
                    if (data["row_count"] <= limit) {
                        $('#pagination').html("");
                    } else {
                        var pagination = "";
                        var btnIdx = "";
                        jmlPage = Math.ceil(data["row_count"] / limit);
                        offset = data["start"] % limit;
                        curIdx = Math.ceil((data["start"] / data["limit"]) + 1);
                        prev = (curIdx - 2) * data["limit"];
                        next = (curIdx) * data["limit"];

                        var curSt = (curIdx * data["limit"]) - jmlData;
                        var st = start;
                        var btn = "btn-default";
                        var lastSt = (jmlPage * data["limit"]) - jmlData
                        var btnFirst = "<button class='btn btn-default btn-sm' onclick='getTable(0)'><span class='fa fa-angle-double-left'></span></button>";
                        if (curIdx > 1) {
                            var prevSt = ((curIdx - 1) * data["limit"]) - jmlData;
                            btnFirst += "<button class='btn btn-default btn-sm' onclick='getTable(" + prevSt + ")'><span class='fa fa-angle-left'></span></button>";
                        }

                        var btnLast = "";
                        if (curIdx < jmlPage) {
                            var nextSt = ((curIdx + 1) * data["limit"]) - jmlData;
                            btnLast += "<button class='btn btn-default btn-sm' onclick='getTable(" + nextSt + ")'><span class='fa fa-angle-right'></span></button>";
                        }
                        btnLast += "<button class='btn btn-default btn-sm' onclick='getTable(" + lastSt + ")'><span class='fa fa-angle-double-right'></span></button>";

                        if (jmlPage >= 5) {
                            if (curIdx >= 3) {
                                var idx_start = curIdx - 2;
                                var idx_end = curIdx + 2;
                                if (idx_end >= jmlPage) idx_end = jmlPage;
                            } else {
                                var idx_start = 1;
                                var idx_end = 5;
                            }
                            for (var j = idx_start; j <= idx_end; j++) {
                                st = (j * data["limit"]) - jmlData;
                                if (curSt == st) btn = "btn-success";
                                else btn = "btn-default";
                                btnIdx += "<button class='btn " + btn + " btn-sm' onclick='getTable(" + st + ")'>" + j + "</button>";
                            }
                        } else {
                            for (var j = 1; j <= jmlPage; j++) {
                                st = (j * data["limit"]) - jmlData;
                                if (curSt == st) btn = "btn-success";
                                else btn = "btn-default";
                                btnIdx += "<button class='btn " + btn + " btn-sm' onclick='getTable(" + st + ")'>" + j + "</button>";
                            }
                        }
                        pagination += btnFirst + btnIdx + btnLast;
                        $('#pagination').html("<div class='btn-group'>" + pagination + "</div>");
                    }
                }

            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(errorThrown);
            }
        });
    }

    function edit(a, b, c) {
        $('#submit').html('Update');
        $('#idx').val(a);
        $('#layanan').val(b);
        $('#kategori').val(c);
        $('#formModal').modal("show");
    }

    function simpan() {
        var a = $('#layanan').val();
        if (a == "") {
            alert('Ops. Layanan harus di isi.');
        } else {
            var formdata = {
                idx: $('#idx').val(),
                layanan: $('#layanan').val(),
                kategori_id: $('#kategori').val(),
                kategori_tarif: $('#kategori :selected').html(),
            }
            console.log(formdata);
            $.ajax({
                url: "<?php echo base_url() . 'administrator.php/layanan/simpan' ?>",
                type: "POST",
                data: formdata,
                dataType: "JSON",
                success: function(data) {
                    if (data.status == true) {
                        alert(data.message);
                        $('#form1').find('input').val('');
                    } else {
                        alert(data.message);
                        $('#form1').find('input').val('');
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

    function hapus(a) {
        var x = confirm("Apakah anda yakin akan menghapus record ini?");
        if (x) {
            $.ajax({
                url: "<?php echo base_url() . 'administrator.php/layanan/hapus/' ?>" + a,
                type: "GET",
                data: {
                    get_param: 'value'
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
</script>