<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Tindakan</a></li>
        <li><a href="#tab_2" data-toggle="tab">Asesmen Awal Medis</a></li>
        <li><a href="#tab_3" data-toggle="tab">Asesmen Awal Keperawatan</a></li>
        <li><a href="#tab_4" data-toggle="tab">Catatan Perkembangan Pasien</a></li>
        <li><a href="#tab_5" data-toggle="tab">Tindakan Asuhan Keperawatan</a></li>
        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div class="row detailnota" id="btntambah">
                <div class="col-md-12">
                    <?php if ($detail->status_transaksi <= 0) { ?>
                        <div class="row">

                            <?php
                            $indexKelasID = ($id_kelas == '') ? '2' : $id_kelas;
                            if ($jns_layanan == "RJ" || $jns_layanan == "GD" || $jns_layanan == "PJ") {
                            ?>
                                <input type="hidden" name="cmbKelasTarif" id="cmbKelasTarif" value="0">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Ketikkan Keyword Pencarian Tindakan">
                                        <span class="input-group-addon" style="width: 30%;">
                                            <label for=""><input type="checkbox" name="alltarif" id="alltarif" value="1" onclick="getData(0)">Tarif Semua Ruangan</label>
                                        </span>
                                    </div>

                                </div>
                            <?php
                            } else {
                            ?>

                                <div class="col-md-12">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-addon" style="width: 60%;">
                                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Ketikkan Keyword Pencarian Tindakan">
                                        </div>

                                        <div class="input-group-addon" style="width: 20%;">
                                            <select class="form-control" name="cmbKelasTarif" id="cmbKelasTarif">
                                                <?php
                                                foreach ($getKelasTarif->result_array() as $xKT) :
                                                    $obj = ($indexKelasID == $xKT['idx']) ? "selected='selected'" : "";
                                                ?>
                                                    <option <?php echo $obj ?> value="<?php echo $xKT['idx'] ?>">
                                                        <?php echo "Kelas " . $xKT['kelas_layanan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="input-group-addon" style="width: 20%;">
                                            <input type="checkbox" name="alltarif" id="alltarif" value="1" onclick="getData(0)">Tarif Semua Ruangan
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>


                        </div>

                        <!--button class="btn btn-success" onclick="addTindakan()"><i class="fa fa-plus"></i> Tambahkan Tindakan</button-->
                    <?php } ?>
                </div>
            </div>

            <div class="table-responsive">
                <div id="divCariTarif" style="display: none;padding: 10px">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="1">
                                    <button class="btn btn-danger" id="closeDivCariTarif">Tutup</button>
                                </th>
                                <th colspan="5">
                                    <?php
                                    $indexKelasID = ($id_kelas == '') ? '2' : $id_kelas;
                                    if ($jns_layanan == "RJ" || $jns_layanan == "GD" || $jns_layanan == "PJ") {
                                    ?>
                                        <input type="hidden" name="cmbKelasTarif" id="cmbKelasTarif" value="0">
                                    <?php
                                    } else {
                                    ?>
                                        <label>Ubah Kelas Tarif Ke : </label>
                                        <select class="form-control w150" name="cmbKelasTarif" id="cmbKelasTarif" style="width: 150px;">
                                            <?php
                                            foreach ($getKelasTarif->result_array() as $xKT) :
                                                $obj = ($indexKelasID == $xKT['idx']) ? "selected='selected'" : "";
                                            ?>
                                                <option <?php echo $obj ?> value="<?php echo $xKT['idx'] ?>">
                                                    <?php echo "Kelas " . $xKT['kelas_layanan'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <input type="checkbox" name="alltarif" id="alltarif" value="1" onclick="getData(0)">Tarif Semua Ruangan
                                    <?php
                                    }
                                    ?>

                                </th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th class="">Tindakan / Layanan</th>
                                <th class="rataTengah w150">Tarif</th>
                                <th class="rataTengah w200">Group Tarif BPJS</th>
                                <th class="rataTengah w100">Kelas</th>
                                <th class="rataTengah w100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="getTarif"></tbody>
                        <tbody>
                            <tr id='v-pagination'>
                                <td colspan="6" id="pagination"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" id="formaddnota" style="display: none;">
                <div class="col-md-12">
                    <form id="formItem" action="#" method="post" class="form-horizontal" onsubmit="return false">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Dokter / Petugas Pelaksana:</label>
                            <div class="col-sm-9">
                                <select class="form-control w200" name="cmbDokter" id="cmbDokter">
                                    <option value=""></option>
                                    <?php foreach ($getDokter->result_array() as $x) : ?>
                                        <option value="<?php echo $x['NRP'] ?>" <?php if ($x['NRP'] == $dokterJaga) echo "selected"; ?>><?php echo $x['pgwNama'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Layanan :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="txtTindakan" id="txtTindakan" placeholder="Enter tindakan / layanan">
                                <input type="hidden" name="id_daftar" id="id_daftar" value="<?php echo $id_daftar ?>" />
                                <input type="hidden" name="reg_unit" id="reg_unit" value="<?php echo $reg_unit ?>" />
                                <input type="hidden" name="nomr" id="nomr" value="<?php echo $nomr ?>" />
                                <input type="hidden" name="id_tarif" id="id_tarif" />
                                <input type="hidden" name="jasa_sarana" id="jasa_sarana" />
                                <input type="hidden" name="jasa_pelayanan" id="jasa_pelayanan" />
                                <input type="hidden" name="kategori_id" id="kategori_id" />
                                <input type="hidden" name="kelas_id" id="kelas_id" />
                                <input type="hidden" id='jns_layanan' name='jns_layanan' value="<?= $jns_layanan ?>">
                                <input type="hidden" id='id_ruang' name='id_ruang' value="<?= $id_ruang ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Tarif :</label>
                            <div class="col-sm-9">
                                <input readonly="" type="text" class="form-control rataKanan" name="txtTarif" id="txtTarif">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Jml Tindakan :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control rataKanan" onkeypress="return isNumberKey(event)" name="txtQty" id="txtQty">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Sub Total :</label>
                            <div class="col-sm-9">
                                <input readonly="" type="text" class="form-control rataKanan" name="txtSubTotal" id="txtSubTotal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">&nbsp;</label>
                            <div class="col-sm-9">
                                <a href="#" onclick="simpanTindakan()" class="btn btn-success ">
                                    <i class="fa fa-floppy-o"></i> Simpan</a>
                                <button class="btn btn-danger" onclick="batalTambah()">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row detailnota" id="detailnota">
                <div class="box-body table-responsive" id="divDetailNota">
                    <div style="display: block">
                        <input type="hidden" id="q" name="q">
                        <input type="hidden" id="limit" name="limit">
                        <input type="hidden" name="pulang" id="pulang" value="<?= $pulang ?>">
                        <table class="table table-bordered">
                            <thead class="bg-green">
                                <tr>
                                    <th class="rataTengah w20">#</th>
                                    <th class="rataTengah w250">Dokter / Petugas Pelaksana</th>
                                    <th class="rataTengah">Tindakan / Layanan</th>
                                    <th class="rataTengah w100">Tarif</th>
                                    <th class="rataTengah w60">Qty</th>
                                    <th class="rataTengah w100">Sub Total</th>
                                    <th class="rataTengah w60">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="getNotaItem"></tbody>
                            <tfoot id="pagination"></tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
            The European languages are members of the same family. Their separate existence is a myth.
            For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
            in their grammar, their pronunciation and their most common words. Everyone realizes why a
            new common language would be desirable: one could refuse to pay expensive translators. To
            achieve this, it would be necessary to have uniform grammar, pronunciation and more common
            words. If several languages coalesce, the grammar of the resulting language is more simple
            and regular than that of the individual languages.
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            It has survived not only five centuries, but also the leap into electronic typesetting,
            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
            sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
            like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
</div>