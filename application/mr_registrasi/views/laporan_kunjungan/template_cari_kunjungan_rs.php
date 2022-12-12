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

    table#tabelCariKunjungan tr td {
        padding: 2px
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
                    <form id="form1" class="form-horizontal" onsubmit="return false" method="POST">
                        <table id="tabelCariKunjungan">
                            <tr>
                                <td class="w150">Tanggal Kunjungan</td>
                                <td class="w10">:</td>
                                <td class="w150">
                                    <input type="text" readonly="" class="form-control tanggal" name="tglAwal" id="tglAwal" placeholder="____-__-__">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                                <td colspan="2">
                                    <button type="button" id="cariPasien" class="btn btn-primary">
                                        <i class="fa fa-search"></i> Cari</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="box-body table-responsive no-padding">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 60px">#</th>
                                    <th style="width: 80px">No MR</th>
                                    <th>Nama Pasien</th>
                                    <th style="width: 150px">No Reg RS</th>
                                    <th style="width: 150px">Tgl. Registrasi</th>
                                    <th>Alamat</th>
                                    <th>Cara Bayar</th>
                                </tr>
                            </thead>
                            <tbody id="getHistory">
                                <tr>
                                    <td colspan="5">Data masih kosong</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.tanggal').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        })
        $('#cariPasien').click(function() {
            var a = $('#tglAwal').val();
            if (a == '') {
                alert('Tanggal kunjungan tidak boleh kosong');
            } else {
                $.ajax({
                    url: "<?php echo base_url() . 'mr_registrasi.php/laporan_kunjungan/cari_kunjungan_rs' ?>",
                    type: "POST",
                    data: {
                        tglAwal: a
                    },
                    beforeSend: function() {
                        $('tbody#getHistory').html("<tr><td colspan=5><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
                    },
                    success: function(data) {
                        $('tbody#getHistory').html(data);
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        $('tbody#getHistory').html('<tr><td colspan="5">Data masih kosong</td></tr>');
                        alert(jqXHR.responseText);
                    }
                });
            }
        });
    });
</script>