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

    .modal-content {
        max-height: 600px;
        overflow: scroll;
    }

    a.disabled {
        pointer-events: none;
        cursor: default;
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?> <?php echo getPoliByID($ruangID) ?></h1>
</section>
<?php if (!empty($ruang)) { ?>
    <section class="content container-fluid">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Informasi</h4>
            Silahkan cari pasien yang melakukan tindakan / layanan di <?php echo getPoliByID($ruangID) ?>.
            Pasien yang tampil secara default adalah pasien yang terdaftar pada hari ini.
            <br />
            Untuk mencari pasien yang terdaftar pada hari lainnya,
            silahkan masukan No Registrasi RS / No Registrasi Unit <?php echo getPoliByID($ruangID) ?> / No MR Pasien
            <br />
            kemudian tekan enter atau klik tombol Cari Pasien
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            
                            <a href="#" id="btnRefresh" class="btn btn-default">
                                <i class="glyphicon glyphicon-refresh"></i> Refresh Untuk Lihat Kunjungan Hari Ini </a>
                            <?php if ($ruang->grid == 1) { ?>
                                <a href="<?= base_url() . "nota_tagihan.php/nota_tagihan/list_rujuk_internal?kLok=" . $ruangID; ?>" id="btnRefresh" class="btn btn-default">
                                    <i class="glyphicon glyphicon-bell"></i> Permintaan Rujuk Internal <span class="pull-right badge bg-aqua"><?= $notif ?></span>
                                    </span></a>
                            <?php } else if ($ruang->grid == 2) { ?>
                                <a href="<?= base_url() . "nota_tagihan.php/nota_tagihan/list_pindah_kamar?kLok=" . $ruangID; ?>" id="btnRefresh" class="btn btn-default">
                                    <i class="glyphicon glyphicon-bell"></i> Permintaan Pindah Kamar <span class="pull-right badge bg-aqua"><?= $notif ?></span>
                                    </span></a>
                            <?php } elseif ($ruang->grid == 3) { ?>
                                <a href="<?= base_url() . "nota_tagihan.php/nota_tagihan/list_permintaan_penunjang?kLok=" . $ruangID; ?>" id="btnRefresh" class="btn btn-default">
                                    <i class="glyphicon glyphicon-bell"></i> Permintaan Penunjang <span class="pull-right badge bg-aqua"><?= $notif ?></span></a>
                            <?php } ?>
                        </h3>

                        <div class="box-tools">
                            <!--div class="input-group input-group-sm">
                                <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter No Registrasi RS / No Registrasi Unit / No MR" style="width: 350px" />
                                <div class="input-group-btn">
                                    <button type="button" id="btnKeyword" class="btn btn-primary"><i class="fa fa-search"></i> Cari Pasien</button>
                                </div>
                            </div-->
                        </div>
                    </div>

                    <div class="box-body table-responsive">
                        <form id="form1" class="form-horizontal" onsubmit="return false" method="POST">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 col-xs-12 control-label">Periode</label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <span class="input-group-btn">
                                            <input type="text" class="form-control tanggal" name="tglAwal" id="tglAwal" value="<?= date('Y-m-d') ?>" placeholder="____-__-__" onchange="getPasien()">
                                        </span>
                                        <span class="input-group-btn">
                                            <input disabled="" type="text" class="form-control" value="s/d" style="text-align: center;border: none;">
                                        </span>
                                        <span class="input-group-btn">
                                            <input type="text" class="form-control tanggal" name="tglAkhir" value="<?= date('Y-m-d') ?>" id="tglAkhir" placeholder="____-__-__" onchange="getPasien()">
                                        </span>

                                        <span class="input-group-btn">
                                            <input type="text" class="form-control" name="keyword" value="" id="keyword" placeholder="Keyword" onkeydown="search(event)">
                                        </span>
                                        <span class="input-group-btn">
                                            <button type="button" id="btnKeyword" class="btn btn-primary">
                                                <i class="fa fa-search"></i> Cari</button>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </form>
                        <table class="table table-bordered">
                            <thead class="bg-green">
                                <tr>
                                    <th style="width: 60px">#</th>
                                    <th style="width: 100px">No.Reg RS</th>
                                    <th style="width: 120px">No.Reg Unit</th>
                                    <th style="width: 80px">Tgl.Masuk</th>
                                    <th style="width: 60px">No MR</th>
                                    <th>Nama Pasien</th>
                                    <th style="width: 80px">Tgl.Lahir</th>
                                    <th style="width: 80px">Jns.Kelamin</th>
                                    <th>Nama Dokter Jaga</th>
                                    <?php if ($ruang->grid == 2) echo "<th>Ruang / Kamar</th><th>Kelas</th>";
                                    else echo "<th>Poli</th>" ?>
                                    <th style="width: 100px">Mode Bayar</th>
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
<?php } else { ?>
    <section class="content container-fluid">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Informasi</h4>
            Maaf ruangan tidak ada
        </div>
    </section>

<?php } ?>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        getTable();
        $('input').focus(function() {
            return $(this).select();
        });
        $('.tanggal').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        })
        $('#btnKembali').click(function() {
            var url = '<?php echo base_url() . 'nota_tagihan.php/nota_tagihan' ?>';
            window.location.href = url;
        });
        $('#btnRefresh').click(function() {
            getTable();
            $('input').val('');
        });
        $('#keyword').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            var a = '<?php echo $ruangID ?>';
            var dari = $('#tglAwal').val();
            var sampai = $('#tglAkhir').val();
            var formdata = {
                ruangID: a,
                sLike: $('#keyword').val(),
                dari: dari,
                sampai: sampai
            }
            if (keycode == '13') {
                $.ajax({
                    url: "<?php echo base_url() . 'nota_tagihan.php/nota_tagihan/getView' ?>",
                    type: "POST",
                    data: formdata,
                    beforeSend: function() {
                        $('tbody#getdata').html("<tr><td colspan=10><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
                    },
                    success: function(data) {
                        $('tbody#getdata').html(data);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        $('tbody#getdata').html('<tr><td colspan=10>Data tidak ditemukan<td></tr>');
                        console.log(jqXHR.responseText);
                    }
                });
            }
        });
        $('#btnKeyword').click(function() {
            var a = '<?php echo $ruangID ?>';
            var dari = $('#tglAwal').val();
            var sampai = $('#tglAkhir').val();
            var formdata = {
                ruangID: a,
                sLike: $('#keyword').val(),
                dari: dari,
                sampai: sampai
            }
            $.ajax({
                url: "<?php echo base_url() . 'nota_tagihan.php/nota_tagihan/getView' ?>",
                type: "POST",
                data: formdata,
                beforeSend: function() {
                    $('tbody#getdata').html("<tr><td colspan=10><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
                },
                success: function(data) {
                    $('tbody#getdata').html(data);
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    $('tbody#getdata').html('<tr><td colspan=10>Data tidak ditemukan<td></tr>');
                    console.log(jqXHR.responseText);
                }
            });
        });

    });

    // Function
    function getTable() {
        var a = '<?php echo $ruangID ?>';
        var dari = $('#tglAwal').val();
        var sampai = $('#tglAkhir').val();
        $.ajax({
            url: "<?php echo base_url() . 'nota_tagihan.php/nota_tagihan/getView' ?>",
            type: "POST",
            data: {
                ruangID: a,
                dari: dari,
                sampai: sampai
            },
            beforeSend: function() {
                $('tbody#getdata').html("<tr><td colspan=10><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
            },
            success: function(data) {
                $('tbody#getdata').html(data);
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                $('tbody#getdata').html('<tr><td colspan=10>Data tidak ditemukan<td></tr>');
                console.log(jqXHR.responseText);
            }
        });
    }

    function pilihPasien(a, b) {
        //alert(a + b);
        var url = '<?php echo base_url() . 'nota_tagihan.php/nota_tagihan/entry_nota?idx=' ?>' + a + '&kLok=' + b;
        window.location.href = url;
    }
</script>