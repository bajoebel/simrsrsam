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
                            <li><a href="#tab_2" data-toggle="tab" onclick="getHasilPenunjang('<?= $detail->nomr ?>',1)">Pemeriksaan Penunjang</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Tagihan</a></li>
                            <li><a href="#tab_4" data-toggle="tab" onclick="riwayatPemakaianObat('<?= $detail->nomr ?>',1)">Riwayat Pemakaian Obat</a></li>
                            <!-- <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
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
                                            <td>DPJP</td>
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
                                <!-- <div class="row">
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
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <hr> -->
                                <input type="hidden" name="hstart" id="hstart" value="1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm">
                                            <input type="hidden" name="hstart" id="hstart" value="1">
                                            <input type="text" name="hq" id="hq" onkeyup="getHasilPenunjang('<?= $detail->nomr ?>',1)" class="form-control pull-right" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-default" onclick="getHasilPenunjang('<?= $detail->nomr ?>',1)"><i class="fa fa-search"></i></button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-right">
                                            <select class="" id="hlimit" name="hlimit" style="width: 60px" onchange="getHasilPenunjang('<?= $detail->nomr ?>',1)">
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

                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <thead class="bg-green">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Reg Unit</th>
                                                    <th>Ruang Pengirim</th>
                                                    <th>Diagnosa</th>
                                                    <th>Jenis Pemeriksaan</th>
                                                    <th>Status</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody id="hasilperiksa"></tbody>
                                            <tfoot id="pagination1"></tfoot>
                                        </table>
                                    </div>
                                </div>
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

                            <div class="tab-pane" id="tab_4">
                                <input type="hidden" name="start4" id="start4" value="0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-sm">
                                            <input type="hidden" name="start4" id="start4" value="1">
                                            <input type="text" name="q4" id="q4" onkeyup="riwayatPemakaianObat('<?= $detail->nomr ?>',1)" class="form-control pull-right" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-default" onclick="riwayatPemakaianObat('<?= $detail->nomr ?>',1)"><i class="fa fa-search"></i></button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-right">
                                            <select class="" id="limit4" name="limit4" style="width: 60px" onchange="riwayatPemakaianObat('<?= $detail->nomr ?>',1)">
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
                                            <td>Kode Transaksi</td>
                                            <td>Tanggal</td>
                                            <td>Ruangan / Poliklinik</td>
                                            <td>Dokter</td>
                                            <td>List Obat</td>
                                        </tr>
                                    </thead>
                                    <tbody id="data-obat"></tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6" id="pagination4"></td>
                                        </tr>
                                    </tfoot> 
                                </table>
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

<div id="hasilpemeriksaan" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="digisign-title">Hasil Pemeriksaan</h4>
            </div>
            <div class="modal-body">
                <div id="datahasil"></div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
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