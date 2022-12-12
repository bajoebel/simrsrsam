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
                                <th>Modul</th>
                                <th>Level</th>
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
                                    <label>Modul</label>
                                    <select name="id_modul" id="id_modul" class="form-control">
                                        <option value="0">-</option>
                                        <?php
                                        foreach ($kategori as $k) {
                                        ?>
                                            <option value="<?= $k->idx ?>"><?= $k->nama_modul; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Level</label>
                                    <input type="hidden" name="idx" id="idx">
                                    <input type="text" class="form-control" name="level" id="level">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="checkbox" name="status" id="status" value="1" >Status
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

    <div class="modal fade" id="formModalAkses" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Hak Akses</h4>
                </div>
                <div class="modal-body">
                    <div id="formLevel"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="button" id="submit" class="btn btn-primary" onclick="simpanhakakses()">Simpan</button>
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
            $('#id_modul').val('');
            $('#status').prop( "checked", false);
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
        var url = "<?php echo base_url() . 'administrator.php/level/data?start=' ?>" + start + "&q=" + keyword;
        console.log(url);
        $.ajax({
            url: "<?php echo base_url() . 'administrator.php/level/data?start=' ?>" + start + "&q=" + keyword,
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
                        tabel += "<td>" + row[i]["nama_modul"] + "</td>";
                        tabel += "<td>" + row[i]["level"] + "</td>";
                        tabel += '<td class=\'text-right\'><div class=\'btn-group\'><button type=\'button\' class=\'btn btn-warning\' onclick=\'hakAkses("' + row[i]["idx"] + '","' + row[i]["id_modul"] + '","' + row[i]["level"] + '","' + row[i]["status"] + '")\'><span class=\'fa fa-bars\' ></span><button type=\'button\' class=\'btn btn-success\' onclick=\'edit("' + row[i]["idx"] + '","' + row[i]["id_modul"] + '","' + row[i]["level"] + '","' + row[i]["status"] + '")\'><span class=\'fa fa-pencil\' ></span></button>';
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

    function edit(a, b, c,d) {
        $('#submit').html('Update');
        $('#idx').val(a);
        $('#id_modul').val(b);
        $('#level').val(c);
        if(d=1) $('#status').prop( "checked", true );
        $('#formModal').modal("show");
    }

    function hakAkses(a, b) {
        var url =  "<?php echo base_url().'administrator.php/level/hakakses?level=' ?>"+a+"&modul="+b;
        console.log(url);
        $.ajax({
                url         :url,
                type        : "GET",
                dataType    : "HTML",
                beforeSend  : function(){
                    
                    $('#formLevel').html("Loading... Please wait");
                },
                success : function(data){
                    $('#formModalAkses').modal("show");
                    $('#formLevel').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(jqXHR.responseText);
                }
        });  
        
    }


    function simpan() {
        
        var a = $('#level').val();
        if (a == "") {
            alert('Ops. Level harus di isi.');
        } else {
            var formdata = {
                idx: $('#idx').val(),
                level: $('#level').val(),
                id_modul: $('#id_modul').val()
            }
            console.log(formdata);
            $.ajax({
                url: "<?php echo base_url() . 'administrator.php/level/simpan' ?>",
                type: "POST",
                data: formdata,
                dataType: "JSON",
                beforeSend  : function(){
                    $('#formLevel').html("Loading... Please wait");
                },
                success: function(data) {
                    if (data.status == true) {
                        alert(data.message);
                        $('#status').prop( "checked", false );
                        $('#form1').find('input').val('');
                    } else {
                        alert(data.message);
                        $('#status').prop( "checked", false );
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
                url: "<?php echo base_url() . 'administrator.php/level/hapus/' ?>" + a,
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

    function cekAllaksi(aksi, index_menu, sub_index){
        //if(index_menu=='0') 
        if ($('#menu' + aksi).is(':checked')) {
            if(sub_index==0) $('.submenu'+index_menu).prop( "checked", true );
            else $('.aksi'+aksi).prop( "checked", true );
        }
        else {
            if(sub_index==0) $('.submenu'+index_menu).prop( "checked", false );
            else $('.aksi'+aksi).prop( "checked", false );
        }
    }

    function simpanhakakses(){
    var url;
    url = "<?php echo base_url() . 'administrator.php/level/simpanhakakses' ?>";
    var formData = new FormData($('#formakses')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data : formData,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        beforeSend  : function(){
            $('#formLevel').html("Saving Data Please wait...");
        },
        success: function(data)
        {
            if(data["status"]==false){
                alert(data["message"]);
            }
            var a = data["level"];
            var b=data["modul"];
            hakAkses(a,b)
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert("Error saat penyimpan hak akses");
        }
    });
}
</script>