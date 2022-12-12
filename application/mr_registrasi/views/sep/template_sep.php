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

    tr.cancel {
        background: gray;
        color: #fff;
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
                <form id="form1" class="form-horizontal" onsubmit="return false" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-md-2 col-sm-2 col-xs-12 control-label">Periode</label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <span class="input-group-btn">
                                    <input type="text" class="form-control tanggal" name="tglAwal" id="tglAwal" value='<?= date('Y-m-d') ?>' placeholder="____-__-__" onchange="getPasien()">
                                </span>
                                <span class="input-group-btn">
                                    <input disabled="" type="text" class="form-control" value="s/d" style="text-align: center;border: none;">
                                </span>
                                <span class="input-group-btn">
                                    <input type="text" class="form-control tanggal" name="tglAkhir" value='<?= date('Y-m-d') ?>' id="tglAkhir" placeholder="____-__-__" onchange="getPasien()">
                                </span>
                                <span class="input-group-btn">
                                    <select class="form-control" name="jns_layanan" id="jns_layanan" onchange="getPasien()">
                                        <option value="">Pilih</option>
                                        <option value="RJ" selected>Rawat Jalan</option>
                                        <option value="GD">Gawat Darurat</option>
                                        <option value="RI">Rawat Inap</option>
                                    </select>
                                    <!--input disabled="" type="text" class="form-control" style="text-align: center;border: none;"-->
                                </span>
                                <span class="input-group-btn">
                                    <input type="text" class="form-control" name="q" value='' id="q" placeholder="Keyword" onkeydown="search(event)">
                                </span>
                                <span class="input-group-btn">
                                    <button type="button" id="cariPasien" class="btn btn-primary">
                                        <i class="fa fa-search"></i> Cari</button>
                                </span>
                            </div>

                        </div>
                    </div>
                </form>


                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <thead class='bg-blue'>
                            <tr>
                                <th style="width: 50px">#</th>
                                <th style="width: 60px">No MR</th>
                                <th>Nama Pasien</th>
                                <th style="width: 80px">No Reg RS</th>
                                <th style="width: 120px">No Reg Unit</th>
                                <th style="width: 100px">Tgl Registrasi</th>
                                <th>Tujuan</th>
                                <th style="width: 150px">Cara Bayar</th>
                                <th style="width: 80px">Jns Layanan</th>
                                <th style="width: 80px">Status<br />Register</th>
                                <th style="width: 150px">Users</th>
                                <th style="width: 80px">#</th>
                            </tr>
                        </thead>
                        <tbody id="getHistory">
                            <tr>
                                <td colspan="9">Data masih kosong</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        getPasien();
        $('.tanggal').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        })
        $('#cariPasien').click(function() {
            getPasien();
            /*var a = $('#tglAwal').val();
            var b = $('#tglAkhir').val();
            if(a == '' || b == ''){
                alert('Periode tanggal tidak boleh kosong');
            }else{*/

            //}
        });
    });

    function getPasien() {
        $.ajax({
            url: "<?php echo base_url() . 'mr_registrasi.php/sep/cari_pasien' ?>",
            type: "POST",
            data: $('#form1').serialize(),
            beforeSend: function() {
                $('#getHistory').html("<tr><td colspan=11><i class='fa fa-spin fa-refresh'></i> Silahkan ditunggu... Sedang menghubungi server.</td></tr>");
            },
            success: function(data) {
                $('#getHistory').html(data);
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    }

    function search(evt) {
        //alert("Cari Pasien")
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (evt.keyCode == 13) {
            //alert('ENter');
            getPasien();
        }
        return true;
    }
</script>