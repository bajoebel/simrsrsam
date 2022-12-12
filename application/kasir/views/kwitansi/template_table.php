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
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="">

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Data Kunjungan Pasien</h3>
                <div class="box-tools">

                </div>
            </div>
            <div class="box-body table-responsive">
                <div class="col-xs-12">

                    <div class="row">
                        <div class="col-md-11">
                            <form action="#" method="GET" onsubmit="return false">
                                <div class="input-group">
                                    <input type="text" name="q" id="q" class="form-control pull-right" onkeydown="enterKeywordKasir(event)" placeholder="Search">
                                    <span class="input-group-addon">
                                        <label>
                                            <input type="radio" name="jnslayanan" value="RJ" id="rajal" checked="" onclick="riwayatKunjungan(1)"> Rawat Jalan
                                        </label>&nbsp;
                                        <label><input type="radio" name="jnslayanan" value="RI" id="ranap" onclick="riwayatKunjungan(1)"> Rawat Inap</label>&nbsp;
                                        <label><input type="radio" name="jnslayanan" value="GD" id="igd" onclick="riwayatKunjungan(1)"> Gawat Darurat</label>&nbsp;
                                        <label><input type="checkbox" name="status_transaksi" value="1" id="status_transaksi" checked onclick="riwayatKunjungan(1)"> Finish Transaksi</label>&nbsp;
                                    </span>
                                </div>
                                <!--div class="input-group input-group-sm">
                                    <input type="hidden" name="start" id="start" value="0">
                                    <input type="text" name="q" id="q" class="form-control pull-right" onkeyup="riwayatKunjungan(1)" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default" onclick="riwayatKunjungan(1)"><i class="fa fa-search"></i></button>
                                        
                                    </div>
                                </div-->
                            </form>
                        </div>
                        <div class="col-md-1">
                            <div class="input-group">
                                <select class="form-control input-sm" name="limit" id="limit" onchange="riwayatKunjungan(1)">
                                    <option value="5">5</option>
                                    <option value="10" selected>10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <thead class="bg-green">
                                    <tr>
                                        <th style="width: 40px">#</th>
                                        <th style="width: 80px">NIK</th>
                                        <th style="width: 100px">No Reg RS</th>
                                        <th style="width: 100px">Reg Unit</th>
                                        <th style="width: 80px">No MR</th>
                                        <th style="width: 150px">Nama Pasien</th>
                                        <th style="width: 50px">Jekel</th>
                                        <th style="width: 80px">NO BPJS</th>
                                        <th style="width: 80px" class='ranap'>Kelas Layanan</th>
                                        <th style="width: 120px">Poliklinik / Ruang Rawat</th>
                                        <th style="width: 120px">Rujukan</th>
                                        <th style="width: 120px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="riwayat_kunjungan"></tbody>
                                <tbody id="loading"></tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="9" id="pagination"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/popper/popper.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/tooltip/tooltip.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script type="text/javascript">
    var base_url = "<?= base_url() . "kasir.php/" ?>";
</script>
<script src="<?php echo base_url() ?>js/kasir.js"></script>
<script type="text/javascript">
    riwayatKunjungan(1);
</script>