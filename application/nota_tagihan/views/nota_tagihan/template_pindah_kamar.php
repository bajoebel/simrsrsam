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
    <h1><?php echo $contentTitle ?> <?php echo getPoliByID($ruangID) ?></h1>
</section>

<section class="content container-fluid">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Informasi</h4>
        Silahkan cari pasien yang melakukan tindakan / layanan di <?php echo getPoliByID($ruangID) ?>.
        Pasien yang tampil secara default adalah pasien yang dikirim atas rujukan internal pada hari ini.
        Untuk mencari pasien yang terdaftar pada hari lainnya,
        silahkan masukan No Registrasi RS / No Registrasi Unit <?php echo getPoliByID($ruangID) ?> / No MR Pasien
        kemudian tekan enter atau klik tombol Cari Pasien
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="#" id="btnKembali" class="btn btn-default">
                            <i class="glyphicon glyphicon-new-window"></i> Kembali</a>
                        <a href="#" id="btnRefresh" class="btn btn-default">
                            <i class="glyphicon glyphicon-refresh"></i> Refresh Untuk Lihat Kunjungan Hari Ini</a>
                    </h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter No Registrasi RS / No MR" style="width: 350px" />
                            <div class="input-group-btn">
                                <button type="button" id="btnKeyword" class="btn btn-primary"><i class="fa fa-search"></i> Cari Pasien</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 60px">#</th>
                                <th style="width: 80px">Tgl.Minta</th>
                                <th style="width: 100px">No.Reg RS</th>
                                <th style="width: 120px">Unit Pengirim</th>
                                <th>Dokter Pengirim</th>
                                <th style="width: 60px">No MR</th>
                                <th>Nama Pasien</th>
                                <th>Keterangan</th>
                                <th style="width: 100px">Action</th>
                            </tr>
                        </thead>
                        <tbody id="getdata"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modalpindahkamar" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <form action="#" method="POST" id="form">

                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="box box-widget widget-user-2">
                                <div class="bg-aqua-active" style="padding:10px;border-radius:15px 15px 0px 0px">
                                    <div class="widget-user-image" id="lblimagejekel">
                                        <img class="img-circle" src="http://192.168.2.99/simrs/assets/images/female.png" alt="" id="imgFemale">
                                    </div>
                                    <h4 class="widget-user-username" id="lblnamapasien">RANI ALFIQIAH DS</h4>
                                    <p id="lblregunit" style="margin-left: 75px;">1374025006010001</p>
                                </div>

                                <div class="box-body">
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a title="Profile Peserta" href="#tab_1" data-toggle="tab"><span class="fa fa-user"></span></a></li>
                                        </ul>
                                        <form action="#" method="POST" id="form">
                                            <div class="tab-content" style="padding:0px;">
                                                <div class="tab-pane active" id="tab_1">
                                                    <input type="hidden" name="dokterPengirim" id="dokterPengirim">
                                                    <input type="hidden" name="id_daftar" id="id_daftar">
                                                    <input type="hidden" name="id_ruang" id="id_ruang">
                                                    <input type="hidden" name="idx" id="idx">
                                                    <input type="hidden" name="kamar_pengirim" id="kamar_pengirim">
                                                    <input type="hidden" name="kelas_layanan" id="kelas_layanan">
                                                    <input type="hidden" name="keterangan" id="keterangan">
                                                    <input type="hidden" name="nama_dokter_pengirim" id="nama_dokter_pengirim">
                                                    <input type="hidden" name="nama_kamar_pengirim" id="nama_kamar_pengirim">
                                                    <input type="hidden" name="nama_pasien" id="nama_pasien">
                                                    <input type="hidden" name="nama_ruang" id="nama_ruang">
                                                    <input type="hidden" name="nama_ruang_pengirim" id="nama_ruang_pengirim">
                                                    <input type="hidden" name="nomr" id="nomr">
                                                    <input type="hidden" name="reg_unit" id="reg_unit">
                                                    <input type="hidden" name="ruang_pengirim" id="ruang_pengirim">
                                                    <input type="hidden" name="tgl_minta" id="tgl_minta">
                                                    <ul class="list-group list-group-unbordered">
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-4">NOMR</div>
                                                                <div class="col-xs-8" id="lblnomr">: 393713</div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-4">NO. REGISTRASI</div>
                                                                <div class="col-xs-8" id="lbliddaftar">: 2021011882</div>
                                                            </div>
                                                        </li>

                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-4">KELAS LAYANAN</div>
                                                                <div class="col-xs-8" id="lblkelaslayanan">: Rawat Jalan</div>
                                                            </div>
                                                        </li>

                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-4">RUANG PEGIRIM</div>
                                                                <div class="col-xs-8" id="lblruangpengirim">: GIGI &amp; MULUT</div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-4">DOKTER PENGIRIM</div>
                                                                <div class="col-xs-8" id="lblnama_dokter_pengirim">: drg. ELSY GUSMAN</div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-4">RUANG PENERIMA</div>
                                                                <div class="col-xs-8" id="lblruangpenerima"></div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-4">KELAS LAYANAN</div>
                                                                <div class="col-xs-8">
                                                                    <select name="id_kelas" id="id_kelas" class="form-control" onchange="getKamar()">
                                                                        <option value="">Pilih Kelas</option>
                                                                        <?php
                                                                        foreach ($kelas as $k) {
                                                                        ?>
                                                                            <option value="<?= $k->idx ?>"><?= $k->kelas_layanan ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-4">KAMAR</div>
                                                                <div class="col-xs-8">
                                                                    <select name="id_kamar" id="id_kamar" class="form-control">
                                                                        <option value="">Pilih kamar</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <button class="btn btn-success btn-block" type="button" id='btnReg' onclick="registrasikan()">Registrasikan</button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        getTable();
        $('#btnKembali').click(function() {
            var url = '<?php echo base_url() . 'nota_tagihan.php/nota_tagihan/tambah?kLok=' . $ruangID ?>';
            window.location.href = url;
        });
        $('#btnRefresh').click(function() {
            $('#keyword').val('');
            window.location.reload();
        });
        $('#keyword').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            var a = '<?php echo $ruangID ?>';
            if (keycode == '13') {
                $.ajax({
                    url: "<?php echo base_url() . 'nota_tagihan.php/pindah_kamar/getView' ?>",
                    type: "POST",
                    data: {
                        ruangID: a,
                        sLike: $(this).val()
                    },
                    beforeSend: function() {
                        $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                    },
                    success: function(data) {
                        $('tbody#getdata').html(data);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(jqXHR.responseText);
                    }
                });
            }
        });
        $('#btnKeyword').click(function() {
            var a = '<?php echo $ruangID ?>';
            $.ajax({
                url: "<?php echo base_url() . 'nota_tagihan.php/pindah_kamar/getView' ?>",
                type: "POST",
                data: {
                    ruangID: a,
                    sLike: $('#keyword').val()
                },
                beforeSend: function() {
                    $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success: function(data) {
                    $('tbody#getdata').html(data);
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        });
        $("#modalpindahkamar").on('shown', function() {
            alert("I want this to appear after the modal has opened!");
        });
    });

    function getKamar() {
        var idruang = $('#id_ruang').val();
        var idkamar = "";
        var kelasid = $('#id_kelas').val();
        var url = "<?= base_url() . "nota_tagihan.php/nota_tagihan/kamar/"; ?>" + idruang + "/" + kelasid + "/" + idkamar;
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                if (data["status"] == true) {
                    var r = data["data"];
                    var jmlData = r.length;
                    var row = "";
                    var isi_lk = 0;
                    var isi_pr = 0;
                    var terisi = 0;
                    for (var i = 0; i < jmlData; i++) {
                        isi_lk = parseInt(r[i]["terisi_lk"]);
                        isi_pr = parseInt(r[i]["terisi_pr"]);
                        terisi = isi_lk + isi_pr;
                        console.log(r[i]["nama_kamar"] + terisi);
                        if (terisi == r[i]["jml_tt"]) row += "<option value='" + r[i]["id_kamar"] + "' disabled>" + r[i]["nama_kamar"] + "(Penuh)</option>";
                        else row += "<option value='" + r[i]["id_kamar"] + "'>" + r[i]["nama_kamar"] + "</option>";
                    }
                    $('#id_kamar').html(row);
                    //console.log(row);
                } else {
                    alert(data["message"]);
                }
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                $('#btnUpdateNoBPJS').html("<i class='fa fa-save'></i> Update");
                console.log(jqXHR.responseText);
            }
        });
    }

    // Function
    function getTable() {
        var a = '<?php echo $ruangID ?>';
        $.ajax({
            url: "<?php echo base_url() . 'nota_tagihan.php/pindah_kamar/getView' ?>",
            type: "POST",
            data: {
                ruangID: a
            },
            beforeSend: function() {
                $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success: function(data) {
                $('tbody#getdata').html(data);
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    }

    function registrasiPasien(a) {
        var xRuang = '<?php echo getRuangByID($ruangID) ?>';
        var b = '<?php echo $ruangID ?>';
        var x = confirm("Apakah anda yakin akan meregistrasikan pasien ini di " + xRuang + "?");
        if (x) {
            if (a == "") {
                alert('Ops. Id rujukan internal tidak ditemukan. coba ulangi lagi');
            } else if (b == "") {
                alert('Ops. Kode ruang tidak ditemukan. coba ulangi lagi');
            } else {
                var postData = {}
                postData["no_permintaan"] = a;
                postData["id_ruang"] = b;
                $.ajax({
                    url: "<?php echo base_url() . 'nota_tagihan.php/pindah_kamar/registrasiPasien' ?>",
                    type: "POST",
                    data: postData,
                    dataType: "JSON",
                    beforeSend: function() {
                        // setting a timeout
                        $('#btnReg'+a).prop('disabled', true);
                    },
                    success: function(data) {
                        if (data.code == 200) {
                            var url = '<?php echo base_url() . 'nota_tagihan.php/pindah_kamar/reg_success?uid=' ?>' + data.url;
                            window.location.href = url;
                        } else if (data.code == 201) {
                            console.log(data);
                            var y = confirm(data.message + "\nApakah anda ingin mendaftarkan pasien ini ke kamar lain");
                            if (y) {
                                $('#dokter_pengirim').val(data.data.dokter_pengirim);
                                $('#id_daftar').val(data.data.id_daftar);
                                $('#id_ruang').val(data.data.id_ruang);
                                $('#idx').val(data.data.idx);
                                $('#kamar_pengirim').val(data.data.kamar_pengirim);
                                $('#kelas_layanan').val(data.data.kelas_layanan);
                                $('#id_kelas').val(data.data.id_kelas);
                                $('#keterangan').val(data.data.keterangan);
                                $('#nama_dokter_pengirim').val(data.data.nama_dokter_pengirim);
                                $('#nama_kamar_pengirim').val(data.data.nama_kamar_pengirim);
                                $('#nama_pasien').val(data.data.nama_pasien);
                                $('#nama_ruang').val(data.data.nama_ruang);
                                $('#nama_ruang_pengirim').val(data.data.nama_ruang_pengirim);
                                $('#nomr').val(data.data.nomr);
                                $('#reg_unit').val(data.data.reg_unit);
                                $('#ruang_pengirim').val(data.data.ruang_pengirim);
                                $('#tgl_minta').val(data.data.tgl_minta);

                                $('#lblnomr').html(data.data.nomr);
                                $('#lblnamapasien').html(data.data.nama_pasien);
                                $('#lbliddaftar').html(data.data.id_daftar);
                                $('#lblregunit').html(data.data.reg_unit);
                                $('#lblkelaslayanan').html(data.data.kelas_layanan);
                                $('#lblruangpengirim').html(data.data.nama_ruang_pengirim + "(" + data.data.nama_kamar_pengirim + ")");
                                $('#lblruangpenerima').html(data.data.nama_ruang);
                                $('#lblnama_dokter_pengirim').html(data.data.nama_dokter_pengirim);
                                $('#modalpindahkamar').modal('show');
                            }

                            //alert('Pilih Kamar');
                        } else {
                            alert(data.message)
                        }
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(jqXHR.responseText);
                    },
                    complete: function() {
                        $('#btnReg'+a).prop('disabled', false);
                    },
                });
            }
        }

    }

    function registrasikan() {
        var postData = {}
        postData["no_permintaan"] = $('#idx').val();
        postData["id_ruang"] = $('#id_ruang').val();
        postData["id_kelas"] = $('#id_kelas').val();
        postData["kelas_layanan"] = $('#id_kelas :selected').html();
        postData["id_kamar"] = $('#id_kamar').val();
        postData["nama_kamar"] = $('#id_kamar :selected').html();
        $.ajax({
            url: "<?php echo base_url() . 'nota_tagihan.php/pindah_kamar/registrasikan' ?>",
            type: "POST",
            data: postData,
            dataType: "JSON",
            beforeSend: function() {
                // setting a timeout
                $('#btnReg').prop('disabled', true);
            },
            success: function(data) {
                if (data.code == 200) {
                    var url = '<?php echo base_url() . 'nota_tagihan.php/pindah_kamar/reg_success?uid=' ?>' + data.url;
                    window.location.href = url;
                } else if (data.code == 201) {
                    console.log(data);
                    var y = confirm(data.message + "\nApakah anda ingin mendaftarkan pasien ini ke kamar lain");
                    if (y) {
                        $('#dokter_pengirim').val(data.data.dokter_pengirim);
                        $('#id_daftar').val(data.data.id_daftar);
                        $('#id_ruang').val(data.data.id_ruang);
                        $('#idx').val(data.data.idx);
                        $('#kamar_pengirim').val(data.data.kamar_pengirim);
                        $('#kelas_layanan').val(data.data.kelas_layanan);
                        $('#id_kelas').val(data.data.id_kelas);

                        $('#keterangan').val(data.data.keterangan);
                        $('#nama_dokter_pengirim').val(data.data.nama_dokter_pengirim);
                        $('#nama_kamar_pengirim').val(data.data.nama_kamar_pengirim);
                        $('#nama_pasien').val(data.data.nama_pasien);
                        $('#nama_ruang').val(data.data.nama_ruang);
                        $('#nama_ruang_pengirim').val(data.data.nama_ruang_pengirim);
                        $('#nomr').val(data.data.nomr);
                        $('#reg_unit').val(data.data.reg_unit);
                        $('#ruang_pengirim').val(data.data.ruang_pengirim);
                        $('#tgl_minta').val(data.data.tgl_minta);

                        $('#lblnomr').html(data.data.nomr);
                        $('#lblnamapasien').html(data.data.nama_pasien);
                        $('#lbliddaftar').html(data.data.id_daftar);
                        $('#lblregunit').html(data.data.reg_unit);
                        $('#lblkelaslayanan').html(data.data.kelas_layanan);
                        $('#lblruangpengirim').html(data.data.nama_ruang_pengirim + "(" + data.data.nama_kamar_pengirim + ")");
                        $('#lblruangpenerima').html(data.data.nama_ruang);
                        $('#lblnama_dokter_pengirim').html(data.data.nama_dokter_pengirim);
                        $('#modalpindahkamar').modal('show');
                        getKamar();
                    }

                    //alert('Pilih Kamar');
                } else {
                    alert(data.message)
                }
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            },
            complete: function() {
                $('#btnReg').prop('disabled', false);
            },
        });
    }
</script>