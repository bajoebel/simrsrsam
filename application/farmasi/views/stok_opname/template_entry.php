<style>
    em {
        font-size: 10px
    }

    .input-group-addon {
        border: none;
    }

    .rightAlign {
        text-align: right;
    }

    .centerAlign {
        text-align: center;
    }

    .conversi {
        border: 1px solid #d2d6de
    }

    .w10 {
        width: 10px;
    }

    .w20 {
        width: 20px;
    }

    .w30 {
        width: 30px;
    }

    .w40 {
        width: 40px;
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
                <div class="box-header with-border"></div>
                <div class="box-body">
                    <form id="form1" role="form" onsubmit="return false">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lokasi Obat <span style="color: red"> * </span></label>
                                <div class="input-group input-group-sm col-md-6">
                                    <input type="hidden" id="csrf_token" class="csrf" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                    <input type="hidden" name="KDLOKASI" id="KDLOKASI" value="<?php echo $kLok ?>">
                                    <input readonly type="text" class="form-control" name="NMLOKASI" id="NMLOKASI" value="<?php echo getLokasiById($kLok) ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Obat / Alat Kesehatan <span style="color: red"> * </span></label>
                                <div class="input-group input-group-sm">
                                    <input type="hidden" name="KDBRG" id="KDBRG">
                                    <input readonly="" type="text" class="form-control" name="NMBRG" id="NMBRG">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-primary" id="btnCariObat">
                                            <i class="fa fa-search"></i> Cari</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Stok <span style="color: red"> * </span></label>
                                <div class="input-group input-group-sm">
                                    <input readonly type="text" class="form-control rightAlign" name="JMLSTOK_DIKOREKSI" id="JMLSTOK_DIKOREKSI">
                                    <div class="input-group-addon w200 rightAlign conversi">
                                        <span id="CONV_JMLSTOK_DIKOREKSI" class="text-red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Real (SO) <span style="color: red"> * </span></label>
                                <div class="input-group input-group-sm ">
                                    <input type="text" class="form-control rightAlign" name="JMLREAL" id="JMLREAL" onkeypress="return isNumberKey(event)">
                                    <div class="input-group-addon w200 rightAlign conversi">
                                        <span id="CONV_JMLREAL" class="text-red"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jumlah Koreksi <span style="color: red"> * </span></label>
                                <div class="input-group input-group-sm ">
                                    <input readonly type="text" class="form-control rightAlign" name="JMLKOREKSI" id="JMLKOREKSI">
                                    <div class="input-group-addon w200 rightAlign conversi">
                                        <span id="CONV_JMLKOREKSI" class="text-red"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>No.Berita Acara (No.SO) <span style="color: red"> * </span></label>
                                <div class="input-group input-group-sm col-md-9">
                                    <input type="text" class="form-control" name="NOBUKTI" id="NOBUKTI">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alasan</label>
                                <textarea class="form-control input-group-sm" name="ALASAN" id="ALASAN" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-primary" id="btnKembali">
                                        <i class="glyphicon glyphicon-new-window"></i> Kembali</button>
                                    <button type="button" class="btn btn-danger" id="btnSubmit" onclick="simpan()">
                                        <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="formModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cari Obat / Alat Kesehatan</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row-fluid" style="margin-top: -10px">
                        <div class="span12">
                            <form id="form1" action="#" method="get" class="form-horizontal" onsubmit="return false">
                                <div class="control-group">
                                    <div style="margin-bottom: 10px;">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" name="sObat" id="sObat">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-primary" onclick="cariObat()">
                                                    <i class="fa fa-search"></i> Cari Kode / Nama</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div style="border-style: double;height: 250px;padding: 2px;overflow: scroll;">
                                <table class="table table-bordered" style="font-size: 1.0em">
                                    <thead>
                                        <tr>
                                            <th width="60px">No.Urut</th>
                                            <th>Nama Obat / Alkes</th>
                                            <th>Kode Obat</th>
                                            <th>Lokasi</th>
                                            <th width="120px">Jml Stok</th>
                                            <th width="70px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody id="getDataStok"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        const formatter = new Intl.NumberFormat('id-ID');
        $('input').keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });
        $('input,textarea').focus(function() {
            return this.select();
        });

        setAwal();

        function setAwal() {
            $('#KDBRG').val("");
            $('#NMBRG').val("");
            $('#JMLSTOK_DIKOREKSI').val("0");
            $('#JMLREAL').val("0");
            $('#JMLKOREKSI').val("0");
            $('#CONV_JMLSTOK_DIKOREKSI').html("0");
            $('#CONV_JMLREAL').html("0");
            $('#CONV_JMLKOREKSI').html("0");
            $('#NOBUKTI').val("");
            $('#ALASAN').val("");
        }
        $('#btnKembali').click(function() {
            var a = "<?php echo $kLok ?>";
            var url = "<?php echo base_url() . 'farmasi.php/stok_opname' ?>";
            window.location.href = url;
        });
        $('#btnCariObat').click(function() {
            var a = $('#KDLOKASI').val();
            if (a == "") {
                alert("Lokasi obat belum dipilih");
                $("#KDLOKASI").val().trigger("change");
            } else {
                $('#KDBRG').val("");
                $('#NMBRG').val("");
                $('#JMLSTOK_DIKOREKSI').val("0");
                $('#JMLREAL').val("0");
                $('#JMLKOREKSI').val("0");
                $('#CONV_JMLSTOK_DIKOREKSI').html("0");
                $('#CONV_JMLREAL').html("0");
                $('#CONV_JMLKOREKSI').html("0");
                $('#sObat').val("");
                $('#getDataStok').html("<tr><td colspan=5>Silahkan enter keyword untuk menampilkan data</td></tr>");
                $('#formModal').modal('show');
            }
        });
        $('#JMLREAL').blur(function() {
            var a = $(this).val();
            if (a == "") {
                $('#JMLREAL').val('0');
            }
        });
        $('#JMLREAL').focus(function() {
            $(this).select();
        });
        $('#JMLREAL').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#NOBUKTI').focus();
            }

            $('#CONV_JMLREAL').html(formatter.format($(this).val()));

            var x = parseFloat($('#JMLREAL').val()) - parseFloat($('#JMLSTOK_DIKOREKSI').val());
            if (isNaN(x)) {
                $('#JMLKOREKSI').val(0);
                $('#CONV_JMLKOREKSI').html(formatter.format(0));
            } else {
                $('#JMLKOREKSI').val(x);
                $('#CONV_JMLKOREKSI').html(formatter.format(x));
            }
        });

        $('#sObat').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var a = $(this).val();
                var b = $('#KDLOKASI').val();
                $.ajax({
                    url: "<?php echo base_url() . 'farmasi.php/stok_opname/getObat' ?>",
                    type: "POST",
                    data: {
                        KEYWORDS: a,
                        KDLOKASI: b,
                        <?= $this->security->get_csrf_token_name(); ?>: $('#csrf_token').val()
                    },
                    beforeSend: function() {
                        $('#getDataStok').html("<tr><td colspan=6>Silahkan ditunggu... Aplikasi sedang mencari data.</td></tr>");
                    },
                    success: function(data) {
                        $('#getDataStok').html(data);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        alert(errorThrown);
                    },
                    complete: function() {
                        var csrf = $('#csrf').val();
                        $('.csrf').val(csrf);
                    }
                });
            }
        });
    });

    const formatter = new Intl.NumberFormat('id-ID');
    var no_so = {
        '21': '001/FARMASI-RSAM/SO/01/2019',
        '22': '004/FARMASI-RSAM/SO/01/2019',
        '24': '002/FARMASI-RSAM/SO/01/2019',
        '25': '001/FARMASI-RSAM/SO/01/2019',
        '101': '003/FARMASI-RSAM/SO/01/2019',
        '17': '005/FARMASI-RSAM/SO/01/2019',
        '16': '006/FARMASI-RSAM/SO/01/2019',
        '18': '007/FARMASI-RSAM/SO/01/2019',
        '20': '008/FARMASI-RSAM/SO/01/2019',
        '19': '009/FARMASI-RSAM/SO/01/2019'
    }

    function getID(obj) {
        var a = obj.value;
        if (a !== "") {
            var x = no_so[a];
            if (typeof x === 'undefined') {
                $('#NOBUKTI').val('');
                $('#ALASAN').val('');
            } else {
                $('#NOBUKTI').val(no_so[a]);
                $('#ALASAN').val('Hasil Stok Opname 01 Januari 2019 - 04 Januari 2019');
            }
        }
    }

    function cariObat() {
        var a = $('#sObat').val();
        var b = $('#KDLOKASI').val();
        $.ajax({
            url: "<?php echo base_url() . 'farmasi.php/stok_opname/getObat' ?>",
            type: "POST",
            data: {
                KEYWORDS: a,
                KDLOKASI: b,
                <?= $this->security->get_csrf_token_name(); ?>: $('#csrf_token').val()
            },
            beforeSend: function() {
                $('#getDataStok').html("<tr><td colspan=6>Silahkan ditunggu... Aplikasi sedang mencari data.</td></tr>");
            },
            success: function(data) {
                $('#getDataStok').html(data);
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            },
            complete: function() {
                var csrf = $('#csrf').val();
                $('.csrf').val(csrf);
            }
        });
    }

    function setObat(a, b, c) {
        $('#KDBRG').val(a);
        $('#NMBRG').val(urldecode(b));
        $('#JMLSTOK_DIKOREKSI').val(urldecode(c));
        $('#CONV_JMLSTOK_DIKOREKSI').html(formatter.format(urldecode(c)));

        $('#JMLREAL').val('0');
        $('#CONV_JMLREAL').html(formatter.format(0));

        var x = parseFloat($('#JMLREAL').val()) - parseFloat($('#JMLSTOK_DIKOREKSI').val())
        $('#JMLKOREKSI').val(x);
        $('#CONV_JMLKOREKSI').html(formatter.format(x));
        $('#formModal').modal('hide');
        $('#JMLREAL').focus();
    }

    function simpan() {
        var a = $('#KDLOKASI').val();
        var c = $('#KDBRG').val();
        var d = $('#NMBRG').val();
        var e = $('#JMLSTOK_DIKOREKSI').val();
        var f = $('#JMLKOREKSI').val();
        var g = $('#JMLREAL').val();
        var h = $('#NOBUKTI').val();
        var i = $('#ALASAN').val();
        if (a == "") {
            alert('Ops. Lokasi obat / alat kesehatan tidak boleh kosong.\nPeriksa hak akses anda');
        } else if (c == "" || d == "") {
            alert('Ops. Barang masih kosong. Silahkan cari barang');
            $('#btnCariObat').click();
        } else if (e == "") {
            alert('Ops. Jumlah stok yang dikoreksi harus di isi.');
        } else if (f == "" || f == "0") {
            alert('Ops. Jumlah stok yang dikoreksi harus di isi atau tidak boleh nol');
        } else if (g == "" || isNaN(g)) {
            alert('Ops. Jumlah real harus di isi atau tidak boleh format selain angka(NaN)');
        } else if (h == "") {
            alert('Ops. No bukti harus di isi');
            $('#NOBUKTI').focus();
        } else if (i == "") {
            alert('Ops. Alasan harus di isi');
            $('#ALASAN').focus();
        } else {
            var x = confirm("Apakah anda yakin akan menyimpan data ini?");
            if (x) {
                $.ajax({
                    url: "<?php echo base_url() . 'farmasi.php/stok_opname/simpan' ?>",
                    type: "POST",
                    data: $('#form1').serialize(),
                    dataType: "JSON",
                    success: function(data) {
                        alert(data.message);
                        if (data.code == 200) {
                            $('#KDBRG').val("");
                            $('#NMBRG').val("");
                            $('#JMLSTOK_DIKOREKSI').val("0");
                            $('#CONV_JMLSTOK_DIKOREKSI').html("0");
                            $('#JMLREAL').val("0");
                            $('#CONV_JMLREAL').html("0");
                            $('#JMLKOREKSI').val("0");
                            $('#CONV_JMLKOREKSI').html("0");
                            $('#btnCariObat').click();
                        }
                        //alert(data.csrf);
                        $('.csrf').val(data.csrf);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(jqXHR.responseText);
                    }
                });
            }
        }
    }

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    function urlencode(str) {
        str = (str + '').toString();
        return encodeURIComponent(str)
            .replace(/!/g, '%21')
            .replace(/'/g, '%27')
            .replace(/\(/g, '%28')
            .replace(/\)/g, '%29')
            .replace(/\*/g, '%2A')
            .replace(/%20/g, '+');
    }

    function urldecode(str) {
        return decodeURIComponent((str + '').replace(/%(?![\da-f]{2})/gi, function() {
            return '%25'
        }).replace(/\+/g, '%20'))
    }
</script>