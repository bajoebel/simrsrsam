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

    .w260 {
        width: 260px;
    }

    .w270 {
        width: 270px;
    }

    .w280 {
        width: 280px;
    }

    .w290 {
        width: 290px;
    }

    .w300 {
        width: 300px;
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
                        <table class="table table-striped">
                            <tr>
                                <td width="150px">Rekanan Farmasi</td>
                                <td width="300px">
                                    <select name="KDREKANAN" id="KDREKANAN" class="form-control w300">
                                        <option value=""></option>
                                        <?php foreach ($datrekanan->result_array() as $x) : ?>
                                            <option value="<?php echo $x['KDREKANAN'] ?>"><?php echo $x['NMREKANAN'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td width="50px">&nbsp;</td>
                                <td width="100px">Tgl Terima</td>
                                <td>
                                    <input type="text" name="TGLTERIMA" id="TGLTERIMA" class="form-control tanggal w120" />
                                </td>
                            </tr>
                            <tr>
                                <td>No Bukti Transaksi</td>
                                <td>
                                    <input type="text" name="NOFAKTUR" id="NOFAKTUR" class="form-control" />
                                </td>
                                <td>&nbsp;</td>
                                <td>Keterangan</td>
                                <td rowspan="2">
                                    <textarea class="form-control" name="KETBMK" id="KETBMK" rows="3"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Tgl Bukti Transaksi</td>
                                <td>
                                    <input type="text" name="TGLFAKTUR" id="TGLFAKTUR" class="form-control tanggal w120" />
                                </td>
                                <td>&nbsp;</td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td colspan="7">
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
                                        <div class="input-group input-group-sm">
                                            <input type="text" name="EXPDATE" id="EXPDATE" class="form-control tanggal" />
                                        </div>
                                    </th>
                                    <th>
                                        <div class="input-group input-group-sm">
                                            <input type="text" name="HMODAL" id="HMODAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'" />
                                        </div>
                                    </th>
                                    <th>
                                        <div class="input-group input-group-sm">
                                            <input type="text" name="JMLMASUK" id="JMLMASUK" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'" />
                                        </div>
                                    </th>
                                    <th>
                                        <div class="input-group input-group-sm">
                                            <input readonly type="text" name="SUBTOTAL" id="SUBTOTAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'" />
                                        </div>
                                    </th>
                                    <th>
                                        <div class="input-group input-group-sm">
                                            <button id="simpanTemp" type="button" class="btn btn-danger">
                                                <i class="fa fa-add"></i> Tambah</button>
                                        </div>
                                    </th>
                                </tr>
                            </form>
                            <tr>
                                <th>Nama Obat / Alkes</th>
                                <th width="110px">Tgl Expire</th>
                                <th width="140px">Harga Modal Item</th>
                                <th width="80px">Jml Item</th>
                                <th width="140px">Sub Total</th>
                                <th width="80px">#</th>
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
                                <table class="table table-bordered table-striped" style="font-size: 1.2em">
                                    <thead>
                                        <tr>
                                            <th width="80px">Kode</th>
                                            <th>Nama Obat / Alkes</th>
                                            <th>Satuan</th>
                                            <th>Kategori</th>
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
        $('select').select2({
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
            window.location.href = "<?php echo base_url() . 'farmasi.php/barang_masuk_khusus/goForm?kLok=' ?>" + a;
        });

        function kosongkanObjEntry() {
            $('#KDREKANAN').val('').trigger('change');
            $('#NOFAKTUR').val('');
            $('#TGLFAKTUR').val('');
            $('#TGLTERIMA').val('');
            $('#KETBMK').val('');
        }

        function kosongkanObjTemp() {
            $('#KDBRG').val('');
            $('#NMBRG').val('');
            $('#EXPDATE').val('');
            $('#HMODAL').val('0');
            $('#JMLMASUK').val('0');
            $('#SUBTOTAL').val('0');
        }
        kosongkanObjEntry();
        kosongkanObjTemp();
        getTemp();
        emptyTemp();

        $('#NOFAKTUR').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#TGLFAKTUR').focus();
            }
        });
        $('#TGLFAKTUR').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#TGLTERIMA').focus();
            }
        });
        $('#TGLTERIMA').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#KETBMK').focus();
            }
        });


        $('#EXPDATE').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#HMODAL').focus();
            }
        });
        $('#HMODAL').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                $('#JMLMASUK').focus();
            }
        });
        $('#JMLMASUK').keyup(function(ev) {
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

        $('#btnKeywordCariObat').click(function() {
            var a = $('#keywordCariObat').val();
            $.ajax({
                url: "<?php echo base_url() . 'farmasi.php/barang_masuk_khusus/getObat' ?>",
                type: "POST",
                data: {
                    keyword: a
                },
                beforeSend: function() {
                    $('tbody#getDataObatCari').html("<tr><td colspan=6><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success: function(data) {
                    $('tbody#getDataObatCari').html(data);
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    $('tbody#getDataObatCari').html('<tr><td colspan=6>Data tidak ditemukan</td></tr>');
                    console.log(errorThrown);
                }
            });
        });

        $('#keywordCariObat').keyup(function(ev) {
            var event = ev.keyCode | ev.witch;
            if (event == 13) {
                var a = $('#keywordCariObat').val();
                $.ajax({
                    url: "<?php echo base_url() . 'farmasi.php/barang_masuk_khusus/getObat' ?>",
                    type: "POST",
                    data: {
                        keyword: a
                    },
                    beforeSend: function() {
                        $('tbody#getDataObatCari').html("<tr><td colspan=6><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                    },
                    success: function(data) {
                        $('tbody#getDataObatCari').html(data);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        $('tbody#getDataObatCari').html('<tr><td colspan=6>Data tidak ditemukan</td></tr>');
                        console.log(errorThrown);
                    },

                });
            }
        });

        function calcSummaryItem() {
            var a = $('#HMODAL').val().replace(',', '').replace(',', '').replace(',', '');
            var b = $('#JMLMASUK').val().replace(',', '').replace(',', '').replace(',', '');

            a = (a == '' || isNaN(a)) ? 0 : a;
            b = (b == '' || isNaN(b)) ? 0 : b;
            var c = parseFloat(a) * parseFloat(b);
            c = (c == '' || isNaN(c)) ? 0 : c;
            $('#SUBTOTAL').val(c);
        }

        $('#HMODAL').keypress(function(ev) {
            calcSummaryItem();
        });
        $('#HMODAL').keydown(function(ev) {
            calcSummaryItem();
        });
        $('#JMLMASUK').keypress(function(ev) {
            calcSummaryItem();
        });
        $('#JMLMASUK').keydown(function(ev) {
            calcSummaryItem();
        });

        $("#simpanTemp").click(function() {
            var formItems = {};
            formItems['KDBRG'] = $('#KDBRG').val();
            formItems['NMBRG'] = $('#NMBRG').val();
            formItems['EXPDATE'] = $('#EXPDATE').val();
            formItems['HMODAL'] = $('#HMODAL').val();
            formItems['JMLMASUK'] = $('#JMLMASUK').val();
            formItems['HDISKON'] = $('#HDISKON').val();
            formItems['SUBTOTAL'] = $('#SUBTOTAL').val();

            if (formItems['KDBRG'] == "") {
                $('#ADDBARANG').click();
            } else if (formItems['EXPDATE'] == "") {
                alert("Tanggal expire masih kosong");
                $('#EXPDATE').focus();
            } else if (formItems['HMODAL'] == "" || formItems['HMODAL'] == "0") {
                alert("Harga beli masih kosong");
                $('#HMODAL').focus();
            } else if (formItems['JMLMASUK'] == "" || formItems['JMLMASUK'] == "0") {
                alert("Jumlah obat masuk masih kosong");
                $('#JMLMASUK').focus();
            } else if (formItems['SUBTOTAL'] == "" || formItems['SUBTOTAL'] == "0") {
                alert("Sub Total masih kosong");
            } else {
                $.ajax({
                    url: "<?php echo base_url() . 'farmasi.php/barang_masuk_khusus/simpanTemp' ?>",
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
            formdata['KDREKANAN'] = $('#KDREKANAN').val();
            formdata['NMREKANAN'] = $('#KDREKANAN :selected').html();
            formdata['NOFAKTUR'] = $('#NOFAKTUR').val();
            formdata['TGLFAKTUR'] = $('#TGLFAKTUR').val();
            formdata['TGLTERIMA'] = $('#TGLTERIMA').val();
            formdata['KDLOKASI'] = "<?php echo $kLok; ?>";
            formdata['NMLOKASI'] = "<?php echo getLokasiById($kLok); ?>";
            formdata['KETBMK'] = $('#KETBMK').val();

            if (formdata['KDREKANAN'] == "") {
                alert("Rekanan harus dipilih");
                $('#KDREKANAN').focus();
            } else if (formdata['NOFAKTUR'] == "") {
                alert("No Bukti Transaksi tidak boleh kosong");
                $('#NOFAKTUR').focus();
            } else if (formdata['TGLFAKTUR'] == "") {
                alert("Tanggal Bukti Transaksi tidak boleh kosong");
                $('#TGLFAKTUR').focus();
            } else if (formdata['TGLTERIMA'] == "") {
                alert("Tanggal Terima tidak boleh kosong");
                $('#TGLTERIMA').focus();
            } else if (formdata['KDLOKASI'] == "") {
                alert("Lokasi barang tidak ditemukan. Silahkan refresh browser anda.");
            } else {
                $.ajax({
                    url: "<?php echo base_url() . 'farmasi.php/barang_masuk_khusus/simpan' ?>",
                    type: "POST",
                    data: formdata,
                    dataType: "JSON",
                    beforeSend: function() {
                        // setting a timeout
                        $('#simpan').prop('disabled', true);
                    },
                    success: function(data) {
                        alert(data.message);
                        if (data.code == 200) {
                            kosongkanObjEntry();
                            kosongkanObjTemp();
                            getTemp();
                        }
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(jqXHR.responseText);
                    },
                    complete: function() {
                        $('#simpan').prop('disabled', false);
                    },
                });
            }
        });
    });

    function getTemp() {
        $.ajax({
            url: "<?php echo base_url() . 'farmasi.php/barang_masuk_khusus/getTemp' ?>",
            beforeSend: function() {
                $('#getTemp').html("<tr><td colspan=6><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success: function(data) {
                $('#getTemp').html(data);
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                $('#getTemp').html('<tr><td colspan=6>Data tidak ditemukan</td></tr>');
                console.log(jqXHR, responseText);
            }
        });
    }

    function emptyTemp() {
        $.ajax({
            url: "<?php echo base_url() . 'farmasi.php/barang_masuk_khusus/emptyTemp' ?>",
            success: function(data) {
                getTemp();
            },
            error: function(xhr, ajaxOption, thrownError) {
                console.log('Response : ' + thrownError);
            }
        });
    }

    function pilihObat(a, b) {
        $('#KDBRG').val(a);
        $('#NMBRG').val(urldecode(b));
        $('#EXPDATE').val("");
        $('#HMODAL').val("0");
        $('#JMLMASUK').val("0");
        $('#SUBTOTAL').val("0");
        $('#formModal').modal('hide');
        $('#EXPDATE').focus();
    }

    function hapusTemp(a) {
        var x = confirm("Apakah anda yakin akan menghapus data ini?");
        if (x) {
            $.ajax({
                url: "<?php echo base_url() . 'farmasi.php/barang_masuk_khusus/hapusTemp' ?>",
                type: "POST",
                data: {
                    IDX: a
                },
                dataType: "JSON",
                success: function(data) {
                    alert(data.message);
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