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
                        <table class="table table-bordered">
                            <tr>
                                <td class="w120">Nama Rekanan</td>
                                <td class="w250">
                                    <div class="input-group-sm">
                                        <select name="KDREKANAN" id="KDREKANAN" class="form-control">
                                            <?php foreach ($datrekanan->result_array() as $x) : ?>
                                                <option value="<?php echo $x['KDREKANAN'] ?>"><?php echo $x['NMREKANAN'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </td>
                                <td class="w120">Keterangan</td>
                                <td rowspan="2">
                                    <textarea name="KETBKK" id="KETBKK" class="form-control" rows="2"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Tgl.Transaksi</td>
                                <td>
                                    <div class="input-group-sm">
                                        <input type="text" name="TGLTRANSAKSI" id="TGLTRANSAKSI" class="form-control tanggal w120" />
                                    </div>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td colspan="3">
                                    <button type="button" id="kembali" class="btn btn-danger">
                                        <i class="fa fa-external-link"></i> Kembali</button>
                                    <button type="button" id="simpan" class="btn btn-danger">
                                        <i class="fa fa-floppy-o"></i> Simpan</button>
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <form id="form2" action="#" method="post" onsubmit="return false">
                                <tr>
                                    <th>
                                        <div class="input-group input-group-sm">
                                            <input type="hidden" name="KDBRG" id="KDBRG" />
                                            <input readonly type="text" name="NMBRG" id="NMBRG" class="form-control" />
                                            <div class="input-group-btn">
                                                <button class="btn btn-danger" type="button" id="ADDBARANG">
                                                    <i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="input-group-sm">
                                            <input readonly type="text" name="NMSATUAN" id="NMSATUAN" class="form-control" />
                                        </div>
                                    </th>
                                    <th>
                                        <div class="input-group-sm">
                                            <input readonly type="text" name="JSTOK" id="JSTOK" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" />
                                        </div>
                                    </th>
                                    <th>
                                        <div class="input-group-sm">
                                            <input type="text" name="JMLKELUAR" id="JMLKELUAR" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" />
                                        </div>
                                    </th>
                                    <th>
                                        <div class="input-group-sm">
                                            <button id="simpanTemp" type="button" class="btn btn-danger">
                                                <i class="fa fa-add"></i> Tambah</button>
                                        </div>
                                    </th>
                                </tr>
                            </form>
                            <tr>
                                <th>Nama Obat / Alkes</th>
                                <th width="150px">Satuan</th>
                                <th width="110px">Stok</th>
                                <th width="110px">Jumlah</th>
                                <th width="120px">#</th>
                            </tr>
                        </thead>

                        <tbody id="getTemp"></tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="formModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cari Obat / Alat Kesehatan</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row-fluid" style="margin-top: -10px">
                        <div class="span12">
                            <form id="form1" method="get" class="form-horizontal" onsubmit="return false">
                                <div class="control-group">
                                    <label class="control-label">Pencarian Data Obat / Alat Kesehatan</label>
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="keywordCariObat" id="keywordCariObat" class="form-control" />
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger" type="button" id="btnKeywordCariObat">
                                                <i class="fa fa-search"></i> Cari Kode / Nama Obat</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr />
                            <div style="border-style: double;height: 250px;padding: 2px;overflow: scroll;">
                                <table class="table table-bordered table-striped" style="font-size: 1.0em">
                                    <thead>
                                        <tr>
                                            <th width="80px">Kode</th>
                                            <th>Nama Obat / Alkes</th>
                                            <th>Satuan</th>
                                            <th>Stok</th>
                                            <th width="70px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody id="getDataObatCari"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".inputmask").inputmask();
        $('input,textarea').focus(function() {
            return $(this).select();
        });
        $('#KDREKANAN').select2({
            placeholder: "Pilih option"
        });
        $('.tanggal').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        });
        $('.tanggal').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy"
        });

        $('#kembali').click(function() {
            var a = "<?php echo $kLok ?>";
            window.location.href = "<?php echo base_url() . 'farmasi.php/barang_keluar_khusus' ?>";
        });

        function kosongkanObjEntry() {
            $('#KDREKANAN').val('').trigger('change');
            $('#TGLTRANSAKSI').val('');
            $('#KETBKK').val('');
        }

        function kosongkanObjTemp() {
            $('#KDBRG').val('');
            $('#NMBRG').val('');
            $('#NMSATUAN').val('');
            $('#JSTOK').val('0');
            $('#JMLKELUAR').val('0');
        }

        kosongkanObjEntry();
        kosongkanObjTemp();
        getTemp();
        emptyTemp();

        $('#btnKeywordCariObat').click(function() {
            var a = $('#keywordCariObat').val();
            var b = "<?php echo $kLok ?>";
            $.ajax({
                url: "<?php echo base_url() . 'farmasi.php/barang_keluar_khusus/getObat' ?>",
                type: "POST",
                data: {
                    keyword: a,
                    KDLOKASI: b
                },
                beforeSend: function() {
                    $('#getDataObatCari').html("<tr><td colspan=5><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success: function(data) {
                    $('#getDataObatCari').html(data);
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    $('#getDataObatCari').html('<tr><td colspan=5>Data tidak ditemukan</td></tr>');
                    console.log(errorThrown);
                }
            });
        });

        $('#keywordCariObat').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var a = $('#keywordCariObat').val();
                var b = "<?php echo $kLok ?>";
                $.ajax({
                    url: "<?php echo base_url() . 'farmasi.php/barang_keluar_khusus/getObat' ?>",
                    type: "POST",
                    data: {
                        keyword: a,
                        KDLOKASI: b
                    },
                    beforeSend: function() {
                        $('#getDataObatCari').html("<tr><td colspan=5><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                    },
                    success: function(data) {
                        $('#getDataObatCari').html(data);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        $('#getDataObatCari').html('<tr><td colspan=5>Data tidak ditemukan</td></tr>');
                        console.log(errorThrown);
                    }
                });
            }
        });


        $("#simpanTemp").click(function() {
            var formItems = {};
            formItems['KDBRG'] = $('#KDBRG').val();
            formItems['NMBRG'] = $('#NMBRG').val();
            formItems['JSTOK'] = $('#JSTOK').val();
            formItems['NMSATUAN'] = $('#NMSATUAN').val();
            formItems['JMLKELUAR'] = $('#JMLKELUAR').val();

            if (formItems['KDBRG'] == "") {
                $('#ADDBARANG').click();
            } else if (formItems['JSTOK'] == "" || formItems['JSTOK'] == "0") {
                alert("Stok tidak boleh kosong");
            } else if (formItems['JMLKELUAR'] == "" || formItems['JMLKELUAR'] == "0") {
                alert("Jumlah barang keluar masih kosong");
                $('#JMLKELUAR').focus();
            } else {
                $.ajax({
                    url: "<?php echo base_url() . 'farmasi.php/barang_keluar_khusus/simpanTemp' ?>",
                    type: "POST",
                    data: formItems,
                    dataType: "JSON",
                    success: function(data) {
                        getTemp();
                        if (data.code == 200) {
                            kosongkanObjTemp();
                            $('#ADDBARANG').click();
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function(xhr, ajaxOption, thrownError) {
                        console.log('Response : ' + thrownError);
                    }
                });
            }
        });

        $('#simpan').click(function() {
            var formdata = {}
            formdata['KDLOKASI'] = "<?php echo $kLok; ?>";
            formdata['NMLOKASI'] = "<?php echo getLokasiById($kLok); ?>";
            formdata['KDREKANAN'] = $('#KDREKANAN').val();
            formdata['NMREKANAN'] = $('#KDREKANAN :selected').html();
            formdata['TGLTRANSAKSI'] = $('#TGLTRANSAKSI').val();
            formdata['KETBKK'] = $('#KETBKK').val();

            if (formdata['KDREKANAN'] == "") {
                alert("Rekanan belum dipilih. Silahkan pilih rekanan");
                $('#KDREKANAN').focus();
            } else if (formdata['TGLTRANSAKSI'] == "") {
                alert("Tanggal transaksi tidak boleh kosong");
                $('#TGLTRANSAKSI').focus();
            } else if (formdata['KDLOKASI'] == "") {
                alert("Lokasi Asal barang tidak ditemukan. Silahkan refresh browser anda.");
            } else {
                $.ajax({
                    url: "<?php echo base_url() . 'farmasi.php/barang_keluar_khusus/simpan' ?>",
                    type: "POST",
                    data: formdata,
                    dataType: "JSON",
                    beforeSend: function() {
                        // setting a timeout
                        $('#simpan').prop('disabled', true);
                    },
                    success: function(data) {
                        if (data.code == 200) {
                            kosongkanObjEntry();
                            kosongkanObjTemp();
                            getTemp();
                            window.open('<?php echo base_url() . 'farmasi.php/barang_keluar_khusus/cetak?kode=' ?>' + data.message);
                        } else {
                            alert(data.message);
                        }
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(jqXHR.responseText);
                    },
                    complete: function() {
                        $('#simpan').prop('disabled', false);
                    }
                });
            }
        });

        $('#TGLTRANSAKSI').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#KETBKK').focus();
            }
        });


        $('#JMLKELUAR').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#simpanTemp').click();
            }
        });


        $('#ADDBARANG').click(function() {
            kosongkanObjTemp();
            $('#keywordCariObat').val("");
            $('#getDataObatCari').html("<tr><td colspan=5>Klik atau Enter Pada textbox pencarian untuk menampilkan data</td></tr>");
            $("#formModal").modal("show");
        });
    });

    function getTemp() {
        $.ajax({
            url: "<?php echo base_url() . 'farmasi.php/barang_keluar_khusus/getTemp' ?>",
            beforeSend: function() {
                $('tbody#getTemp').html("<tr><td colspan=5><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success: function(data) {
                $('tbody#getTemp').html(data);
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                $('tbody#getTemp').html('<tr><td colspan=5>Data tidak ditemukan</td></tr>');
                console.log(jqXHR.responseText);
            }
        });
    }

    function emptyTemp() {
        $.ajax({
            url: "<?php echo base_url() . 'farmasi.php/barang_keluar_khusus/emptyTemp' ?>",
            success: function(data) {
                getTemp();
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    }

    function pilihObat(a, b, c, d) {
        $('#KDBRG').val(a);
        $('#NMBRG').val(urldecode(b));
        $('#NMSATUAN').val(c);
        $('#JSTOK').val(d);
        $('#JMLKELUAR').val("0");
        $('#formModal').modal('hide');
        $('#JMLKELUAR').focus();
    }

    function hapusTemp(a) {
        var x = confirm("Apakah anda yakin akan menghapus data ini?");
        if (x) {
            $.ajax({
                url: "<?php echo base_url() . 'farmasi.php/barang_keluar_khusus/hapusTemp' ?>",
                type: "POST",
                data: {
                    IDX: a
                },
                dataType: "JSON",
                success: function(data) {
                    getTemp();
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        }
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