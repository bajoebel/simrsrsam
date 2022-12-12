<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#sb" data-toggle="tab" aria-expanded="true">Laporan Sisa Stok Barang</a></li>
                    <li class=""><a href="#sa" onclick="getLaporanStokAwal(0)" data-toggle="tab" aria-expanded="false">Laporan Stok Awal</a></li>
                    <li class=""><a href="#ks" onclick="getKartuStok(0)" data-toggle="tab" aria-expanded="false">Kartu Stok</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="sb">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Lokasi</label>
                                <select name="sblokasi" id="sblokasi" class="form-control" onchange="getLaporanStok(0)">
                                    <option value="">Pilih Lokasi</option>
                                    <?php
                                    foreach ($lokasi as $lok) {
                                    ?>
                                        <option value="<?= $lok->KDLOKASI ?>"><?= $lok->NMLOKASI ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="">Jenis Barang</label>
                                <select name="sbjenis" id="sbjenis" class="form-control" onchange="getLaporanStok(0)">
                                    <option value="">Pilih Jenis</option>
                                    <?php
                                    foreach ($jenis as $row) {
                                    ?>
                                        <option value="<?= $row->KDJENISBRG ?>"><?= $row->JENISBRG ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="">Kategori Barang</label>
                                <select name="sbkategori" id="sbkategori" class="form-control" onchange="getLaporanStok()">
                                    <option value="">Pilih Kategori</option>
                                    <?php
                                    foreach ($kategori as $row) {
                                    ?>
                                        <option value="<?= $row->KDKTBRG ?>"><?= $row->NMKTBRG ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="">Keyword</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="sbkeyword" id="sbkeyword" class="form-control" placeholder="Keyword" onkeyup="getLaporanStok(0)" onkeydown="enter_keyword(event)">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button" id="search" onclick="getLaporanStok(0)">
                                            <i class="fa fa-search"></i></button>
                                        <button class="btn btn-success" type="button" id="print" onclick="printLaporanStok(0)">
                                            <i class="fa fa-print"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <hr>
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped">
                                    <thead class="bg-green" id="headerstok"></thead>
                                    <tbody id="datastok"></tbody>
                                    <tbody id="loading" style="display: none;">
                                        <tr id="loading">
                                            <td colspan="5"><b>Loading...</b></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="9" id="pagination">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="sa">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Lokasi</label>
                                <select name="salokasi" id="salokasi" class="form-control" onchange="getLaporanStokAwal(0)">
                                    <option value="">Pilih Lokasi</option>
                                    <?php
                                    foreach ($lokasi as $lok) {
                                    ?>
                                        <option value="<?= $lok->KDLOKASI ?>"><?= $lok->NMLOKASI ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="">Jenis Barang</label>
                                <select name="sajenis" id="sajenis" class="form-control" onchange="getLaporanStokAwal(0)">
                                    <option value="">Pilih Jenis</option>
                                    <?php
                                    foreach ($jenis as $row) {
                                    ?>
                                        <option value="<?= $row->KDJENISBRG ?>"><?= $row->JENISBRG ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="">Kategori Barang</label>
                                <select name="sakategori" id="sakategori" class="form-control" onchange="getLaporanStokAwal(0)">
                                    <option value="">Pilih Kategori</option>
                                    <?php
                                    foreach ($kategori as $row) {
                                    ?>
                                        <option value="<?= $row->KDKTBRG ?>"><?= $row->NMKTBRG ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="">Keyword</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="sakeyword" id="sakeyword" class="form-control" placeholder="Keyword" onkeyup="getLaporanStokAwal(0)" onkeydown="enter_keyword(event)">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button" id="search" onclick="getLaporanStokAwal(0)">
                                            <i class="fa fa-search"></i></button>
                                        <button class="btn btn-success" type="button" id="print" onclick="printLaporanStokAwal(0)">
                                            <i class="fa fa-print"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <hr>
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped">
                                    <thead class="bg-green" id="headerstoksa"></thead>
                                    <tbody id="datastoksa"></tbody>
                                    <tbody id="loading" style="display: none;">
                                        <tr id="loading">
                                            <td colspan="5"><b>Loading...</b></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="9" id="paginationsa">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="ks">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Lokasi</label>
                                <select name="kslokasi" id="kslokasi" class="form-control" onchange="getKartuStok(0)">
                                    <option value="">Pilih Lokasi</option>
                                    <?php
                                    foreach ($lokasi as $lok) {
                                    ?>
                                        <option value="<?= $lok->KDLOKASI ?>"><?= $lok->NMLOKASI ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="">Jenis Barang</label>
                                <select name="ksjenis" id="ksjenis" class="form-control" onchange="getKartuStok(0)">
                                    <option value="">Pilih Jenis</option>
                                    <?php
                                    foreach ($jenis as $row) {
                                    ?>
                                        <option value="<?= $row->KDJENISBRG ?>"><?= $row->JENISBRG ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="">Kategori Barang</label>
                                <select name="kskategori" id="kskategori" class="form-control" onchange="getKartuStok(0)">
                                    <option value="">Pilih Kategori</option>
                                    <?php
                                    foreach ($kategori as $row) {
                                    ?>
                                        <option value="<?= $row->KDKTBRG ?>"><?= $row->NMKTBRG ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="">Keyword</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="kskeyword" id="kskeyword" class="form-control" placeholder="Keyword" onkeyup="getKartuStok(0)" onkeydown="enter_keyword(event)">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button" id="search" onclick="getKartuStok(0)">
                                            <i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <hr>
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped">
                                    <thead class="bg-green" id="headerstokks"></thead>
                                    <tbody id="datastokks"></tbody>
                                    <tbody id="loading" style="display: none;">
                                        <tr id="loading">
                                            <td colspan="5"><b>Loading...</b></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="9" id="paginationks">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<div class="modal fade" id="modal_range" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Range Kartu Stok</h4>
            </div>

            <div class="modal-body">
                <form action="#" method="POST">
                    <input type="hidden" id="KDBRG" name="KDBRG" value="">
                    <div class="form-group">
                        <label>Dari:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name='dari' id="dari" class="form-control inputmask tanggal" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                        </div>
                        <!-- /.input group -->
                    </div>

                    <div class="form-group">
                        <label>Sampai :</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name='sampai' id="sampai" class="form-control inputmask tanggal" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                        </div>
                        <!-- /.input group -->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" onclick="PrintKartuStok()"><i class="fa fa-print"></i> Cetak</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var base_url = "<?php echo base_url() . "farmasi.php/" ?>";
</script>