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
                            <input readonly="" type="text" name="tglLayanan" id="tglLayanan" class="form-control" style="width: 110px" placeholder="dd/mm/yyyy" value="<?= date('d/m/Y') ?>" />

                            <span style="width: 10px">&nbsp;</span>

                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter No.MR / No.Reg RS" style="width: 250px" />
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
                                <th class="w10">No</th>
                                <th class="w100">No Reg RS</th>
                                <th>No <br>Antrian</th>
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

                <div class="box-footer">
                    <div id="pagination"></div>
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
                getTable();

            }
        });
        $('#btnKeyword').click(function() {
            var a = $('#keyword').val();
            if (a == "") {
                alert("Keyword masih kosong");
            } else {
                getTable();
            }
        });
        $('#id_ruang').change(function(e) {
            var a = $('#id_ruang').val();
            if (a == "") {
                e.preventDefault();
            } else {
                getTable();
            }
        });
        $('#tglLayanan').change(function(e) {
            var a = $('#tglLayanan').val();
            if (a == "") {
                e.preventDefault();
            } else {
                getTable();
            }
        });
        $('#state_trace').change(function(e) {
            var a = $('#state_trace').val();
            if (a == "") {
                e.preventDefault();
            } else {
                getTable();
            }
        });
    });

    // Function
    function getTable(start = 0) {
        var ruang = $('#id_ruang').val();
        var state = $('#state_trace').val();
        var tgl = $('#tglLayanan').val();
        var keyword = $('#keyword').val();
        var url = "<?php echo base_url() . 'mr_dokumen.php/online/getView?start='; ?>" + start + "&ruang=" + ruang + "&state=" + state + "&tgl=" + tgl + "&keyword=" + keyword;
        console.log(url)
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            data: {
                get_param: 'value'
            },

            beforeSend: function() {
                $('tbody#getdata').html("<tr><td colspan=8><i class='fa fa-spin fa-refresh'></i> Silahkan tunggu... Aplikasi sedang mengambil data.</td></tr>");
            },
            success: function(data) {
                if (data.status == true) {
                    //$('tbody#getdata').html(data.message);
                    var pasien = data["pasien"];
                    var start = data["start"];
                    var jmlData = pasien.length;
                    var row = "";
                    $('#getdata').html("");
                    var button = "";
                    for (var i = 0; i < jmlData; i++) {
                        start++;
                        if (pasien[i]["daftar_stateTrace"] == 0) {
                            status = "Status Belum Diproses";
                            button = '<button class="btn btn-danger" type="button" onclick="check(\'' + pasien[i]["daftar_id"] + '\')">' +
                                '<i class="fa fa-check"></i>' +
                                '</button>';
                        } else {
                            status = "Sudah Di proses";
                            button = '<button class="btn btn-danger" type="button" onclick="uncheck(\'' + pasien[i]["daftar_id"] + '\')">' +
                                '<i class="fa fa-minus"></i>' +
                                '</button>'
                        }
                        if (pasien[i]["KodeLoket"] == null) antrian = '<td>-</td>';
                        else antrian = '<td>' + pasien[i]["KodeLoket"] + "." + pasien[i]["antrian_loket"] + '</td>';
                        row = '<tr>' +
                            '<td>' + start + '</td>' +
                            '<td>' + pasien[i]["daftar_kode"] + '</td>' + antrian +
                            '<td>' + pasien[i]["daftar_tglkunjungan"] + '</td>' +
                            '<td>' + pasien[i]["daftar_nomr"] + '</td>' +
                            '<td>' + pasien[i]["nama"] + '</td>' +
                            '<td>' + pasien[i]["poly_nama"] + '</td>' +
                            '<td>' + status + '</td>' +
                            '<td>' +
                            '<div class="btn-group">' + button +
                            '<button class="btn btn-default" type="button" onclick="print(\'' + pasien[i]["daftar_id"] + '\')">' +
                            '<i class="fa fa-print"></i>' +
                            '</button></div>' +
                            '</td>'
                        '</tr>';
                        $('#getdata').append(row);
                    }

                    if (data["jmldata"] <= data["limit"]) {
                        $('#pagination').html("");
                    } else {
                        var pagination = "";
                        var btnIdx = "";
                        jmlPage = Math.ceil(data["jmldata"] / data["limit"]);
                        offset = data["start"] % data["limit"];
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

                        if (jmlPage >= 25) {
                            if (curIdx >= 20) {
                                var idx_start = curIdx - 20;
                                var idx_end = idx_start + 25;
                                if (idx_end >= jmlPage) idx_end = jmlPage;
                            } else {
                                var idx_start = 1;
                                var idx_end = 25;
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
                        $('#pagination').html('<div class="row"><div class="btn btn-group">' + pagination + '</div></div>');
                    }

                    //console.clear();
                    //console.log(jmlData);
                } else {
                    $('tbody#getdata').html("<tr><td colspan='8'>" + data.message + "</td></tr>");
                }

            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                $('tbody#getdata').html("<tr><td colspan=8>Ops. Data tidak ditemukan</td></tr>");
                console.log(jqXHR.responseText);
            }
        });

    }

    function check(a) {
        $.ajax({
            url: "<?php echo base_url() . 'mr_dokumen.php/online/updateState' ?>",
            type: "POST",
            data: {
                id_daftar: a
            },
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                if (data.status == 200) {
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
            url: "<?php echo base_url() . 'mr_dokumen.php/online/updateState2' ?>",
            type: "POST",
            data: {
                id_daftar: a
            },
            dataType: "JSON",
            success: function(data) {
                if (data.status == 200) {
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
            url: "<?php echo base_url() . 'mr_dokumen.php/online/updateState' ?>",
            type: "POST",
            data: {
                id_daftar: a
            },
            dataType: "JSON",
            success: function(data) {
                getTable();
                if (data.status == 200) {
                    window.open("<?php echo base_url() . 'mr_dokumen.php/online/setPrint?kode=' ?>" + a);
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