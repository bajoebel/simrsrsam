<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#sb" data-toggle="tab" aria-expanded="true">Laporan Rincian Pembelian Barang</a></li>
                    <li class=""><a href="#sa" onclick="getLaporanReturPembelian(0)" data-toggle="tab" aria-expanded="false">Laporan Return Pembelian</a></li>
                    <li class=""><a href="#ks" onclick="getHistoriPembelianBarang(0)" data-toggle="tab" aria-expanded="false">Histori Pembelian Barang</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="sb">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">Dari</label>
                                <div class="input-group ">
                                    <input type="text" name="sbdari" id="sbdari" class="form-control tanggal" onchange="getLaporanPembelian(0)" value="">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button" id="search">
                                            <i class="fa fa-calendar"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="">Sampai</label>
                                <div class="input-group ">
                                    <input type="text" name="sbsampai" id="sbsampai" class="form-control tanggal" onchange="getLaporanPembelian(0)" value="">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button" id="search">
                                            <i class="fa fa-calendar"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="">Lokasi</label>
                                <select name="sblokasi" id="sblokasi" class="form-control" onchange="getLaporanPembelian(0)">
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
                            <div class="col-md-2">
                                <label for="">Supplier</label>
                                <select name="sbsuplier" id="sbsuplier" class="form-control" onchange="getLaporanPembelian(0)">
                                    <option value="">Pilih Supplier</option>
                                    <?php
                                    foreach ($supplier as $lok) {
                                    ?>
                                        <option value="<?= $lok->KDSUPPLIER ?>"><?= $lok->NMSUPPLIER ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="">Jenis Barang</label>
                                <select name="sbjenis" id="sbjenis" class="form-control" onchange="getLaporanPembelian(0)">
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


                            <div class="col-md-2">
                                <label for="">Kategori Barang</label>
                                <div class="input-group ">
                                    <select name="sbkategori" id="sbkategori" class="form-control" onchange="getLaporanPembelian(0)">
                                        <option value="">Pilih Kategori</option>
                                        <?php
                                        foreach ($kategori as $row) {
                                        ?>
                                            <option value="<?= $row->KDKTBRG ?>"><?= $row->NMKTBRG ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button" id="search" onclick="getLaporanPembelian(0)">
                                            <i class="fa fa-search"></i></button>
                                        <button class="btn btn-success" type="button" id="print" onclick="printLaporanPembelian(0)">
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
                                <label for="">Dari</label>
                                <div class="input-group ">
                                    <input type="text" name="sadari" id="sadari" class="form-control tanggal" onchange="getLaporanReturPembelian(0)" value="">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button" id="search">
                                            <i class="fa fa-calendar"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="">Sampai</label>
                                <div class="input-group ">
                                    <input type="text" name="sasampai" id="sasampai" class="form-control tanggal" onchange="getLaporanReturPembelian(0)" value="">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button" id="search">
                                            <i class="fa fa-calendar"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="">Lokasi</label>
                                <select name="salokasi" id="salokasi" class="form-control" onchange="getLaporanReturPembelian(0)">
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
                                <label for="">Supplier</label>
                                <div class="input-group ">
                                    <select name="sasuplier" id="sasuplier" class="form-control" onchange="getLaporanReturPembelian(0)">
                                        <option value="">Pilih Supplier</option>
                                        <?php
                                        foreach ($supplier as $lok) {
                                        ?>
                                            <option value="<?= $lok->KDSUPPLIER ?>"><?= $lok->NMSUPPLIER ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger" type="button" id="search" onclick="getLaporanReturPembelian(0)">
                                            <i class="fa fa-search"></i></button>
                                        <button class="btn btn-success" type="button" id="print" onclick="printLaporanReturPembelian(0)">
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
                                <select name="kslokasi" id="kslokasi" class="form-control" onchange="getHistoriPembelianBarang(0)">
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
                                <select name="ksjenis" id="ksjenis" class="form-control" onchange="getHistoriPembelianBarang(0)">
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
                                <select name="kskategori" id="kskategori" class="form-control" onchange="getHistoriPembelianBarang(0)">
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
                                        <button class="btn btn-danger" type="button" id="search" onclick="getHistoriPembelianBarang(0)">
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
<div class="modal fade" id="modal_histori" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Histori Pembelian <span id="namabarang"></span> </h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead class="bg-green">
                            <tr>
                                <th>No</th>
                                <th>Tgl Terima</th>
                                <th>Lokasi Terima</th>
                                <th>Nama Supplier</th>
                                <th>Jumlah Masuk</th>
                            </tr>
                            </thead>
                            <tbody id="datahistori"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!--button class="btn btn-success" onclick="PrintKartuStok()"><i class="fa fa-print"></i> Cetak</button-->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var base_url = "<?php echo base_url() . "farmasi.php/" ?>";
</script>