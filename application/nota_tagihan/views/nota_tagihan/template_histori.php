<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Histori Pasien</h3>
    </div>
    <div class="box-body">
        <div class="">
            <div class="row">
                <section class="content container-fluid">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Riwayat Kunjungan</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Pemeriksaan Penunjang</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Tagihan</a></li>

                            <!--li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li-->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <input type="hidden" name="start" id="start" value="0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm">
                                            <input type="hidden" name="start" id="start" value="1">
                                            <input type="text" name="q" id="q" onkeyup="riwayatKunjungan('<?= $detail->nomr ?>',1)" class="form-control pull-right" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-default" onclick="riwayatKunjungan('<?= $detail->nomr ?>',1)"><i class="fa fa-search"></i></button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-right">
                                            <select class="" id="limit" name="limit" style="width: 60px" onchange="riwayatKunjungan('<?= $detail->nomr ?>',1)">
                                                <option value="5">5</option>
                                                <option value="10" selected>10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                                <option value="0">All</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <table class="table table-bordered">
                                    <thead class="bg-green">
                                        <tr>
                                            <td style="width: 50px">No</td>
                                            <td>Reg Unit</td>
                                            <td>Tanggal Kunjungan</td>
                                            <td>Jenis Layanan</td>
                                            <td>Ruangan / Poliklinik</td>
                                            <td>Status Transaksi</td>
                                        </tr>
                                    </thead>
                                    <tbody id="data-kunjungan"></tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" id="pagination"></td>
                                        </tr>
                                    </tfoot> 
                                </table>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <div class="row">
                                    <?php
                                    foreach ($getRuang->result() as $r) {
                                    ?>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="info-box" onclick="viewHasilPemeriksaan('<?= $detail->nomr ?>','<?= $r->idx ?>')">
                                                <span class="info-box-icon shorcut bg-green" id="shorcut<?= $r->idx ?>"><i class="fa <?= $r->icon ?>"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text"><?= $r->ruang; ?></span>
                                                    <span class="info-box-number"><small></small></span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                            <!-- /.info-box -->
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div id="jenispemeriksaan"></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div id="hasil_pemeriksaan"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-warning alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon fa fa-ban"></i> Penting</h4>
                                            Tagihan yang muncul disini adalh tagihan berdasarkan PERDA. untuk pasien JKN Bisa jadi tagihannya akan berbeda dengan tagihan yang ada disini
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <thead class="bg-green">
                                                <?php if ($jkn == 0) { ?>
                                                    <tr>
                                                        <td>NO</td>
                                                        <td>ITEM TRANSAKSI</td>
                                                        <td class="text-right">TARIF</td>
                                                        <td class="text-right">JUMLAH</td>
                                                        <td class="text-right">NILAI TRANSAKSI (RP)</td>
                                                    </tr>
                                                <?php } else { ?>
                                                    <tr>
                                                        <td>NO</td>
                                                        <td>TRANSAKSI</td>
                                                        <td class="text-right">NILAI TRANSAKSI (RP)</td>
                                                    </tr>
                                                <?php } ?>
                                            </thead>
                                            <tbody id="nota_tagihan"></tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                </section>


            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    var base_url = "<?= base_url() . "nota_tagihan.php/" ?>";
</script>
<script src="<?php echo base_url() ?>js/nota_tagihan.js"></script>
<script type="text/javascript">
    riwayatKunjungan("<?= $detail->nomr ?>", 1);
    getNota("<?= $detail->id_daftar; ?>", "<?= $jkn; ?>");
</script>