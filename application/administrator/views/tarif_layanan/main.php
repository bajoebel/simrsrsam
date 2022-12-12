<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery/css/jquery-ui.css">
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

    .ui-autocomplete-loading {
        background: white url("<?php echo base_url() ?>ui-anim_basic_16x16.gif") right center no-repeat;
    }

    .ui-autocomplete-input {
        border: none;
        font-size: 14px;
        border: 1px solid #DDD !important;
        /*z-index: 1511;*/
        position: relative;
    }

    .ui-menu .ui-menu-item a {
        font-size: 12px;
    }

    .ui-autocomplete {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1510 !important;
        float: left;
        display: none;
        min-width: 160px;
        width: 160px;
        padding: 4px 0;
        margin: 2px 0 0 0;
        list-style: none;
        background-color: #ffffff;
        border-color: #ccc;
        border-color: rgba(0, 0, 0, 0.2);
        border-style: solid;
        border-width: 1px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding;
        background-clip: padding-box;
        *border-right-width: 2px;
        *border-bottom-width: 2px;
    }

    .ui-menu-item>a.ui-corner-all {
        display: block;
        padding: 3px 15px;
        clear: both;
        font-weight: normal;
        line-height: 18px;
        color: #555555;
        white-space: nowrap;
        text-decoration: none;
    }

    .ui-state-hover,
    .ui-state-active {
        color: #ffffff;
        text-decoration: none;
        background-color: #0088cc;
        border-radius: 0px;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        background-image: none;
    }
</style>

<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="alert alert-danger alert-dismissible">
        <p>Data tarif layanan RS sesuai Peraturan Gubernur Sumatera Barat</p>
    </div>
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
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter Tindakan/Kategori/Kelas" style="width: 400px" />
                            <div class="input-group-btn">
                                <button type="button" id="btn_keyword" class="btn btn-primary">
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
                                <th>Tindakan / Layanan</th>
                                <th style="width: 70px">Jasa Sarana</th>
                                <th style="width: 70px">Jasa Pelayanan</th>
                                <th style="width: 70px">Tarif Layanan</th>
                                <th style="width: 120px">Kategori Tarif</th>
                                <th style="width: 100px">Kelas Layanan</th>
                                <th style="width: 200px">Keterangan</th>
                                <th style="width: 100px">#</th>
                            </tr>
                        </thead>
                        <tbody id="getdata"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Form Tarif Layanan</h4>
                </div>
                <div class="modal-body">

                    <form id="form1" role="form" onsubmit="return false">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tindakan / Layanan</label>
                                        <input type="hidden" name="idx" id="idx">
                                        <input type="hidden" name="idxlayanan" id="idxlayanan">
                                        <input type="text" class="form-control" name="layanan" id="layanan">
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori Tarif</label>
                                        <select name="kategori_id" id="kategori_id" class="form-control" style="width: 100%">
                                            <option value="0">-</option>
                                            <?php foreach ($datkategoritarif->result_array() as $x2) {
                                                echo "<option value='$x2[idx]'>$x2[kategori_tarif]</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Layanan</label>
                                        <select name="jns_layanan" id="jns_layanan" class="form-control" style="width: 100%" onchange="listTarif()">
                                            <option value="RJ">Rawat Jalan</option>
                                            <option value="GD">Gawat Darurat</option>
                                            <option value="PJ">Penunjang</option>
                                            <option value="RI">Rawat Inap</option>
                                            <option value="OP">Operasi</option>
                                        </select>
                                    </div>
                                    <!--div class="form-group">
                                        <label>Kelas Layanan</label>
                                        <select name="kelas_id" id="kelas_id" class="form-control" style="width: 100%" onchange="getTarif()">
                                            <option value="0" selected>Non Kelas</option>
                                            <?php //foreach ($datkelaslayanan->result_array() as $x3) {
                                            //echo "<option value='$x3[idx]'>$x3[kelas_layanan]</option>";
                                            //} 
                                            ?>
                                        </select>
                                    </div-->

                                </div>
                                <div class="col-md-6">
                                    <!--div class="form-group">
                                    <label>Jasa Sarana</label>
                                        <input type="text" class="form-control inputmask" name="jasa_sarana" id="jasa_sarana" maxlength="15" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;">
                                    </div>
                                    <div class="form-group">
                                        <label>Jasa Pelayanan</label>
                                        <input type="text" class="form-control inputmask" name="jasa_pelayanan" id="jasa_pelayanan" maxlength="15" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;">
                                    </div>
                                    <div class="form-group">
                                        <label>Tarif Layanan</label>
                                        <input readonly="" type="text" class="form-control inputmask" name="tarif_layanan" id="tarif_layanan" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" style="text-align: right;">
                                    </div-->
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="keterangan" id="keterangan" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="list-tarif"></div>
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

<script src="<?php //echo base_url() 
                ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/jquery/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/jquery/js/jquery-ui.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        getTable();
        /*
        $('#kategori_id').select2({
            placeholder: "Pilih Kategori Tarif"
        });
        $('#kelas_id').select2({
            placeholder: "Pilih Kelas Layanan"
        });
        */
        $(".inputmask").inputmask();
        $('#datepicker').datepicker({
            autoclose: true
        });
        $('input').focus(function() {
            return $(this).select();
        });
        $('#btnRefresh').click(function() {
            $('input').val('');
            $.ajax({
                url: "<?php echo base_url() . 'administrator.php/tarif_layanan/getView' ?>",
                type: "POST",
                data: {
                    sLike: ""
                },
                beforeSend: function() {
                    $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
                },
                success: function(data) {
                    $('tbody#getdata').html(data);
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(errorThrown);
                }
            });
        });

        $('#btnTambah').click(function() {
            $('#submit').html('Simpan');
            $('#idx').val('');
            $('#idxlayanan').val('');
            $('#layanan').val('');
            $('#jasa_sarana').val('0');
            $('#jasa_pelayanan').val('0');
            $('#tarif_layanan').val('0');
            $('#jns_layanan').val('RJ');
            $('#kategori_id').val('').trigger('change');
            $('#kelas_id').val('').trigger('change');
            listTarif();
            $('#formModal').modal('show');
        });
        $('#keyword').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                $.ajax({
                    url: "<?php echo base_url() . 'administrator.php/tarif_layanan/getView' ?>",
                    type: "POST",
                    data: {
                        sLike: $(this).val()
                    },
                    beforeSend: function() {
                        $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
                    },
                    success: function(data) {
                        $('tbody#getdata').html(data);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(errorThrown);
                    }
                });
            }
        });
        $('#btn_keyword').click(function() {
            $.ajax({
                url: "<?php echo base_url() . 'administrator.php/tarif_layanan/getView' ?>",
                type: "POST",
                data: {
                    sLike: $('#keyword').val()
                },
                beforeSend: function() {
                    $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
                },
                success: function(data) {
                    $('tbody#getdata').html(data);
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(errorThrown);
                }
            });
        });

        $('#jasa_sarana').keyup(function() {
            var a = $('#jasa_sarana').val();
            var b = $('#jasa_pelayanan').val();
            sumTarif(a, b);
        });
        $('#jasa_pelayanan').keyup(function() {
            var a = $('#jasa_sarana').val();
            var b = $('#jasa_pelayanan').val();
            sumTarif(a, b);
        });
        //Auto Complete
        $("#layanan").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?php echo base_url() . 'administrator.php/tarif_layanan/layanan/' ?>",
                        dataType: "JSON",
                        method: "POST",
                        data: {
                            param1: request.term
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.status == true) {
                                var layanan = data.data;
                                response(layanan.slice(0, 15));
                            }

                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    console.log(ui);
                    //$("#idx").val(ui.item['idx']);
                    $("#idxlayanan").val(ui.item['idx']);
                    $("#layanan").val(ui.item['layanan']);
                    $("#kategori_id").val(ui.item['kategori_id']);
                    //alert(ui.item['kategori_id']);
                    $("#layanan").removeClass("ui-autocomplete-loading");
                    listTarif();
                    return false;
                },
                select: function(event, ui) {
                    //$("#idx").val(ui.item['idx']);
                    $("#idxlayanan").val(ui.item['idx']);
                    $("#layanan").val(ui.item['layanan']);
                    $("#kategori_id").val(ui.item['kategori_id']);
                    $("#layanan").removeClass("ui-autocomplete-loading");
                    listTarif();
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:300px'>" + item['layanan'] + "</td><td style='width:300px'>" + item['kategori_tarif'] + "</td>")
                    .appendTo(table);
            };
    });

    function sumTarif(a, b) {
        var c = parseFloat(a.replace(',', '').replace(',', '').replace(',', '')) + parseFloat(b.replace(',', '').replace(',', '').replace(',', ''));
        $('#tarif_layanan').val(c);
    }

    function getTable() {
        $.ajax({
            url: "<?php echo base_url() . 'administrator.php/tarif_layanan/getView' ?>",
            beforeSend: function() {
                $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
            },
            success: function(data) {
                $('tbody#getdata').html(data);
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(errorThrown);
            }
        });
    }

    function getTarif() {
        var idlayanan = $('#idxlayanan').val();
        var kelas = $('#kelas_id').val();
        var url = "<?php echo base_url() . 'administrator.php/tarif_layanan/tarif/' ?>" + idlayanan + "/" + kelas;
        console.clear();
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            data: {
                get_param: 'value'
            },
            success: function(data) {
                //menghitung jumlah data

                console.log(data);
                if (data.code == 200) {
                    $('#idx').val(data.data.idx);
                    $('#jasa_sarana').val(data.data.jasa_sarana);
                    $('#jasa_pelayanan').val(data.data.jasa_pelayanan);
                    $('#tarif_layanan').val(data.data.tarif_layanan);
                    $('#keterangan').val(data.data.keterangan);
                } else if (data.code == 201) {
                    $('#idx').val("");
                    $('#jasa_sarana').val("0");
                    $('#jasa_pelayanan').val("0");
                    $('#tarif_layanan').val("0");
                    $('#keterangan').val("");
                } else {
                    alert(data.message);
                }
            }
        });
    }

    function listTarif() {
        var idlayanan = $('#idxlayanan').val();
        var jns_layanan = $('#jns_layanan').val();
        var url = "<?php echo base_url() . 'administrator.php/tarif_layanan/listtarif/' ?>" + idlayanan + "?jns=" + jns_layanan;
        console.clear();
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            async: false,
            data: {
                get_param: 'value'
            },
            success: function(data) {
                //menghitung jumlah data

                console.log(data);

                var tarif = data.data;
                var kelas = data.kelas;
                var jmlKelas = kelas.length;
                var jmlData = tarif.length
                console.log(tarif);
                if (jns_layanan == "OP") {
                    var control = '<table class="table">' +
                        '<tr>' +
                        '<th>Kelas</th>' +
                        '<th>Jasa Operator</th>' +
                        '<th>Jasa Anestesi</th>' +
                        '<th>Jasa Perawat</th>' +
                        '<th>Jasa Sarana</th>' +
                        '<th>Tarif Layanan</th>' +
                        '</tr>';
                } else {
                    var control = '<table class="table">' +
                        '<tr>' +
                        '<th>Kelas</th>' +
                        '<th>Jasa Sarana</th>' +
                        '<th>Jasa Pelayanan</th>' +
                        '<th>Tarif Layanan</th>' +
                        '</tr>';
                }

                if (data.code == 200) {
                    for (var i = 0; i < jmlData; i++) {
                        if (jns_layanan == "OP") {
                            control += '<tr>' +
                                '<td>' + tarif[i]['kelas_layanan'] +
                                '<input type="hidden" name="idx_tarif' + tarif[i]['kelas_id'] + '" id="idx_tarif' + tarif[i]['kelas_id'] + '" value="' + tarif[i]['idx'] + '">' +
                                '<input type="hidden" name="kelas_id[]" id="kelas_id' + tarif[i]['kelas_id'] + '" value="' + tarif[i]['kelas_id'] + '">' +
                                '<input type="hidden" name="kelas_layanan' + tarif[i]['kelas_id'] + '" id="kelas_layanan' + tarif[i]['kelas_id'] + '" value="' + tarif[i]['kelas_layanan'] + '">' +
                                '</td>' +
                                '<td>' +
                                '<input type="hidden" name="jasa_pelayanan' + tarif[i]['kelas_id'] + '" id="jasa_pelayanan' + tarif[i]['kelas_id'] + '" value="0">' +
                                '<input type="text" class="form-control inputmask" name="jasa_operator' + tarif[i]['kelas_id'] + '" id="jasa_operator' + tarif[i]['kelas_id'] + '" value="' + tarif[i]['jasa_operator'] + '" maxlength="15" onkeyup="hitungTarif(' + tarif[i]['kelas_id'] + ')" style="text-align: right;">' +
                                '</td>' +
                                '<td>' +
                                '<input type="hidden" name="jasa_pelayanan' + tarif[i]['kelas_id'] + '" id="jasa_pelayanan' + tarif[i]['kelas_id'] + '" value="' + tarif[i]['jasa_pelayanan'] + '" >' +
                                '<input type="text" class="form-control inputmask" name="jasa_anestesi' + tarif[i]['kelas_id'] + '" id="jasa_anestesi' + tarif[i]['kelas_id'] + '" value="' + tarif[i]['jasa_anestesi'] + '" maxlength="15" onkeyup="hitungTarif(' + tarif[i]['kelas_id'] + ')" style="text-align: right;">' +
                                '</td>' +
                                '<td>' +
                                '<input type="text" class="form-control inputmask" name="jasa_perawat' + tarif[i]['kelas_id'] + '" id="jasa_perawat' + tarif[i]['kelas_id'] + '" value="' + tarif[i]['jasa_perawat'] + '" maxlength="15" onkeyup="hitungTarif(' + tarif[i]['kelas_id'] + ')" style="text-align: right;">' +
                                '</td>' +
                                '<td>' +
                                '<input type="text" class="form-control inputmask" name="jasa_sarana' + tarif[i]['kelas_id'] + '" id="jasa_sarana' + tarif[i]['kelas_id'] + '" value="' + tarif[i]['jasa_sarana'] + '" maxlength="15" onkeyup="hitungTarif(' + tarif[i]['kelas_id'] + ')" style="text-align: right;">' +
                                '</td>' +
                                '<td><input readonly="" type="text" class="form-control inputmask" name="tarif_layanan' + tarif[i]['kelas_id'] + '" id="tarif_layanan' + tarif[i]['kelas_id'] + '" value="' + tarif[i]['tarif_layanan'] + '"  style="text-align: right;"></td>' +
                                '</tr>';
                        } else {
                            control += '<tr>' +
                                '<td>' + tarif[i]['kelas_layanan'] +
                                '<input type="hidden" name="idx_tarif' + tarif[i]['kelas_id'] + '" id="idx_tarif' + tarif[i]['kelas_id'] + '" value="' + tarif[i]['idx'] + '">' +
                                '<input type="hidden" name="kelas_id[]" id="kelas_id' + tarif[i]['kelas_id'] + '" value="' + tarif[i]['kelas_id'] + '">' +
                                '<input type="hidden" name="kelas_layanan' + tarif[i]['kelas_id'] + '" id="kelas_layanan' + tarif[i]['kelas_id'] + '" value="' + tarif[i]['kelas_layanan'] + '">' +
                                '<input type="hidden" name="jasa_operator' + tarif[i]['kelas_id'] + '" id="jasa_operator' + tarif[i]['kelas_id'] + '" value="0" >' +
                                '<input type="hidden" name="jasa_anestesi' + tarif[i]['kelas_id'] + '" id="jasa_anestesi' + tarif[i]['kelas_id'] + '" value="0" >' +
                                '<input type="hidden" name="jasa_perawat' + tarif[i]['kelas_id'] + '" id="jasa_perawat' + tarif[i]['kelas_id'] + '" value="0" >' +
                                '</td>' +
                                '<td><input type="text" class="form-control inputmask" name="jasa_sarana' + tarif[i]['kelas_id'] + '" id="jasa_sarana' + tarif[i]['kelas_id'] + '" value="' + tarif[i]['jasa_sarana'] + '" maxlength="15" onkeyup="hitungTarif(' + tarif[i]['kelas_id'] + ')"  style="text-align: right;"></td>' +
                                '<td><input type="text" class="form-control inputmask" name="jasa_pelayanan' + tarif[i]['kelas_id'] + '" id="jasa_pelayanan' + tarif[i]['kelas_id'] + '" value="' + tarif[i]['jasa_pelayanan'] + '" maxlength="15" onkeyup="hitungTarif(' + tarif[i]['kelas_id'] + ')" style="text-align: right;"></td>' +
                                '<td><input readonly="" type="text" class="form-control inputmask" name="tarif_layanan' + tarif[i]['kelas_id'] + '" id="tarif_layanan' + tarif[i]['kelas_id'] + '" value="' + tarif[i]['tarif_layanan'] + '"  style="text-align: right;"></td>' +
                                '</tr>';
                        }

                    }
                    if (jmlKelas > 0) {
                        for (var j = 0; j < jmlKelas; j++) {
                            if (jns_layanan == 'OP') {
                                control += '<tr>' +
                                    '<td>' + kelas[j]['kelas_layanan'] +
                                    '<input type="hidden" name="idx_tarif' + kelas[j]['idx'] + '" id="kelas_id' + kelas[j]['idx'] + '" value="">' +
                                    '<input type="hidden" name="kelas_id[]" id="kelas_id' + kelas[j]['idx'] + '" value="' + kelas[j]['idx'] + '">' +
                                    '<input type="hidden" name="kelas_layanan' + kelas[j]['idx'] + '" id="kelas_layanan' + kelas[j]['idx'] + '" value="' + kelas[j]['kelas_layanan'] + '">' +
                                    '</td>' +

                                    '<td>' +
                                    '<input type="hidden" name="jasa_pelayanan' + kelas[j]['idx'] + '" id="jasa_pelayanan' + kelas[j]['idx'] + '" value="0" >' +
                                    '<input type="text" class="form-control inputmask" name="jasa_operator' + kelas[j]['idx'] + '" id="jasa_operator' + kelas[j]['idx'] + '" value="" maxlength="15" onkeyup="hitungTarif(' + kelas[j]['idx'] + ')" style="text-align: right;">' +
                                    '</td>' +
                                    '<td>' +
                                    '<input type="text" class="form-control inputmask" name="jasa_anestesi' + kelas[j]['idx'] + '" id="jasa_anestesi' + kelas[j]['idx'] + '" value="" maxlength="15" onkeyup="hitungTarif(' + kelas[j]['idx'] + ')" style="text-align: right;">' +
                                    '</td>' +
                                    '<td>' +
                                    '<input type="text" class="form-control inputmask" name="jasa_perawat' + kelas[j]['idx'] + '" id="jasa_perawat' + kelas[j]['idx'] + '" value="" maxlength="15" onkeyup="hitungTarif(' + kelas[j]['idx'] + ')" style="text-align: right;">' +
                                    '</td>' +
                                    '<td>' +
                                    '<input type="text" class="form-control inputmask" name="jasa_sarana' + kelas[j]['idx'] + '" id="jasa_sarana' + kelas[j]['idx'] + '" value="" maxlength="15" onkeyup="hitungTarif(' + kelas[j]['idx'] + ')" style="text-align: right;">' +
                                    '</td>' +
                                    '<td><input readonly="" type="text" class="form-control inputmask" name="tarif_layanan' + kelas[j]['idx'] + '" id="tarif_layanan' + kelas[j]['idx'] + '" value=""  style="text-align: right;"></td>' +

                                    '</tr>';
                            } else {
                                control += '<tr>' +
                                    '<td>' + kelas[j]['kelas_layanan'] +
                                    '<input type="hidden" name="idx_tarif' + kelas[j]['idx'] + '" id="kelas_id' + kelas[j]['idx'] + '" value="">' +
                                    '<input type="hidden" name="kelas_id[]" id="kelas_id' + kelas[j]['idx'] + '" value="' + kelas[j]['idx'] + '">' +
                                    '<input type="hidden" name="kelas_layanan' + kelas[j]['idx'] + '" id="kelas_layanan' + kelas[j]['idx'] + '" value="' + kelas[j]['kelas_layanan'] + '">' +
                                    '<input type="hidden" name="jasa_operator' + kelas[j]['idx'] + '" id="jasa_operator' + kelas[j]['idx'] + '" value="0">' +
                                    '<input type="hidden" name="jasa_anestesi' + kelas[j]['idx'] + '" id="jasa_anestesi' + kelas[j]['idx'] + '" value="0">' +
                                    '<input type="hidden" name="jasa_perawat' + kelas[j]['idx'] + '" id="jasa_perawat' + kelas[j]['idx'] + '" value="0">' +
                                    '</td>' +
                                    '<td><input type="text" class="form-control inputmask" name="jasa_sarana' + kelas[j]['idx'] + '" id="jasa_sarana' + kelas[j]['idx'] + '" value="" maxlength="15" onkeyup="hitungTarif(' + kelas[j]['idx'] + ')" style="text-align: right;"></td>' +
                                    '<td><input type="text" class="form-control inputmask" name="jasa_pelayanan' + kelas[j]['idx'] + '" id="jasa_pelayanan' + kelas[j]['idx'] + '" value="" maxlength="15" onkeyup="hitungTarif(' + kelas[j]['idx'] + ')" style="text-align: right;"></td>' +
                                    '<td><input readonly="" type="text" class="form-control inputmask" name="tarif_layanan' + kelas[j]['idx'] + '" id="tarif_layanan' + kelas[j]['idx'] + '" value=""  style="text-align: right;"></td>' +
                                    '</tr>';
                            }

                        }
                    } else {
                        if ((jns_layanan != "RI" || jns_layanan == "OP") && jmlData == 0) {
                            control += '<tr>' +
                                '<td>Non Kelas' +
                                '<input type="hidden" name="idx_tarif0" id="kelas_id0" value="">' +
                                '<input type="hidden" name="kelas_id[]" id="kelas_id0" value="0">' +
                                '<input type="hidden" name="jasa_operator0" id="jasa_operator0" value="0">' +
                                '<input type="hidden" name="jasa_anestesi0" id="jasa_anestesi0" value="0">' +
                                '<input type="hidden" name="jasa_perawat0" id="jasa_perawat0" value="0">' +
                                '<input type="hidden" name="kelas_layanan0" id="kelas_layanan0" value="Non Kelas">' +
                                '</td>' +
                                '<td><input type="text" class="form-control inputmask" name="jasa_sarana0" id="jasa_sarana0" value="" maxlength="15" onkeyup="hitungTarif(0)" style="text-align: right;"></td>' +
                                '<td><input type="text" class="form-control inputmask" name="jasa_pelayanan0" id="jasa_pelayanan0" value="" maxlength="15" onkeyup="hitungTarif(0)" style="text-align: right;"></td>' +
                                '<td><input readonly="" type="text" class="form-control inputmask" name="tarif_layanan0" id="tarif_layanan0" value=""  style="text-align: right;"></td>' +
                                '</tr>';
                        }
                    }

                }
                control += '</table>';
                $('#list-tarif').html(control);
                /*if (data.code == 200) {

                    $('#idx').val(data.data.idx);
                    $('#jasa_sarana').val(data.data.jasa_sarana);
                    $('#jasa_pelayanan').val(data.data.jasa_pelayanan);
                    $('#tarif_layanan').val(data.data.tarif_layanan);
                    $('#keterangan').val(data.data.keterangan);
                } else if (data.code == 201) {
                    $('#idx').val("");
                    $('#jasa_sarana').val("0");
                    $('#jasa_pelayanan').val("0");
                    $('#tarif_layanan').val("0");
                    $('#keterangan').val("");
                } else {
                    alert(data.message);
                }*/
            }
        });
    }

    function hitungTarif(idkelas) {
        var jasa_sarana = $('#jasa_sarana' + idkelas).val();
        if (jasa_sarana == "") jasa_pelayanan = 0;
        var jasa_pelayanan = $('#jasa_pelayanan' + idkelas).val();
        if (jasa_pelayanan == "") jasa_pelayanan = 0;

        var jasa_operator = $('#jasa_operator' + idkelas).val();
        if (jasa_operator == "") jasa_operator = 0;

        var jasa_anestesi = $('#jasa_anestesi' + idkelas).val();
        if (jasa_anestesi == "") jasa_anestesi = 0;

        var jasa_perawat = $('#jasa_perawat' + idkelas).val();
        if (jasa_perawat == "") jasa_perawat = 0;
        console.log(jasa_sarana);
        console.log(jasa_pelayanan);
        var tarif_layanan = parseInt(jasa_sarana) + parseInt(jasa_pelayanan) + parseInt(jasa_operator) + parseInt(jasa_anestesi) + parseInt(jasa_perawat);
        $('#tarif_layanan' + idkelas).val(tarif_layanan);
    }

    function edit(a, b, c, d, e, f) {
        $('#submit').html('Update');
        $('#idx').val(a);
        $('#layanan').val(b);
        $('#idxlayanan').val(c);
        $('#kategori_id').val(d).trigger('change');
        $('#keterangan').val(e);
        $('#jns_layanan').val(f);
        listTarif();
        $('#formModal').modal("show");
    }

    function hapus(a) {
        var x = confirm("Apakah anda yakin akan menghapus record ini?");
        if (x) {
            $.ajax({
                url: "<?php echo base_url() . 'administrator.php/tarif_layanan/hapus' ?>",
                type: "POST",
                data: {
                    idx: a
                },
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

    function simpan() {
        var a = $('#idx').val();
        var b = $('#layanan').val();
        /*var c = $('#jasa_sarana').val();
        var d = $('#jasa_pelayanan').val();
        var e = $('#tarif_layanan').val();*/
        var f = $('#kategori_id').val();
        var g = $('#kategori_id :selected').html();
        /*var h = $('#kelas_id').val();
        var i = $('#kelas_id :selected').html();*/
        var j = $('#keterangan').val();
        var k = $('#idxlayanan').val();

        /*var formdata = {
            idx: a,
            layanan: b,
            jasa_sarana: c,
            jasa_pelayanan: d,
            tarif_layanan: e,
            kategori_id: f,
            kategori_tarif: g,
            kelas_id: h,
            kelas_layanan: i,
            keterangan: j,
            idx_layanan: k
        }*/
        var formData = new FormData($('#form1')[0]);

        if (b == "") {
            alert('Ops. tindakan / layanan harus di isi.');
        } else if (f == "" || f == null || g == "" || g == undefined) {
            alert('Ops. Kategori tarif belum dipilih.');
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'administrator.php/tarif_layanan/simpan' ?>",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'JSON',
                success: function(data) {
                    //alert(data.code);
                    console.clear();
                    //console.log(data.update);
                    //console.log(data.insert);
                    if (data.code == 200) {
                        //console.log(data);
                        alert(data.message);
                        $('#form1').find('input').val('');
                        $('#form1').find('textarea').val('');
                        $('#form1').find('select').val('').trigger('change');
                        $('#layanan').focus();
                        $('#jns_layanan').val("PJ");
                    }
                    /*else if (data.code == 201) {
                                           alert(data.message);
                                           $('#form1').find('input').val('');
                                           $('#form1').find('textarea').val('');
                                           $('#form1').find('select').val('').trigger('change');
                                           //$('#formModal').modal('hide');
                                           $('#layanan').focus();
                                           getTable();
                                       }*/
                    else {
                        alert(data.message);
                        $('#layanan').focus();
                    }
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        }
    }
</script>