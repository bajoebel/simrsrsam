<div class="box box-success">
    <div class="table-responsive">
        <?php if($detail->status_transaksi<=0) { ?>
        <form id="formItem" action="#" method="post" onsubmit="return false">
            <table class="table table-bordered">
                <tr>
                    <th class="w200">
                        <select class="form-control w200" name="cmbDokter" id="cmbDokter">
                            <option value=""></option>
                            <?php foreach ($getDokter->result_array() as $x): ?>
                            <option value="<?php echo $x['NRP'] ?>"
                                <?php if($x['NRP']==$dokterJaga) echo "selected"; ?>><?php echo $x['pgwNama'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </th>
                    <th>
                        <input type="hidden" name="id_daftar" id="id_daftar" value="<?php echo $id_daftar ?>" />
                        <input type="hidden" name="reg_unit" id="reg_unit" value="<?php echo $reg_unit ?>" />
                        <input type="hidden" name="nomr" id="nomr" value="<?php echo $nomr ?>" />
                        <input type="hidden" name="id_tarif" id="id_tarif" />
                        <input type="text" class="form-control" name="txtTindakan" id="txtTindakan"
                            placeholder="Enter tindakan / layanan">
                        <input type="hidden" name="jasa_sarana" id="jasa_sarana" />
                        <input type="hidden" name="jasa_pelayanan" id="jasa_pelayanan" />
                        <input type="hidden" name="kategori_id" id="kategori_id" />
                        <input type="hidden" name="kelas_id" id="kelas_id" />
                        <input type="hidden" id='jns_layanan' name='jns_layanan' value="<?= $jns_layanan ?>">
                        <input type="hidden" id='id_ruang' name='id_ruang' value="<?= $id_ruang ?>">
                    </th>
                    <th class="w120">
                        <input readonly="" type="text" class="form-control rataKanan" name="txtTarif" id="txtTarif">
                    </th>
                    <th class="w80">
                        <input type="text" class="form-control rataKanan" onkeypress="return isNumberKey(event)"
                            name="txtQty" id="txtQty">
                    </th>
                    <th class="w120">
                        <input readonly="" type="text" class="form-control rataKanan" name="txtSubTotal"
                            id="txtSubTotal">
                    </th>
                    <th class="w60">
                        <a href="#" onclick="simpanTindakan()" class="btn btn-danger btn-block">
                         <i class="fa fa-floppy-o"></i></a>
                    </th>
                </tr>
            </table>
        </form>
        <?php } ?>
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
                            $indexKelasID = ($id_kelas=='') ? '2' : $id_kelas; 
                            if($jns_layanan=="RJ" || $jns_layanan=="GD" || $jns_layanan=="PJ"){
                            ?>
                            <input type="hidden" name="cmbKelasTarif" id="cmbKelasTarif" value="0">
                            <?php
                            }else{
                            ?>
                            <label>Ubah Kelas Tarif Ke : </label>
                            <select class="form-control w150" name="cmbKelasTarif" id="cmbKelasTarif" style="width: 150px;">
                                <?php 
                                foreach ($getKelasTarif->result_array() as $xKT): 
                                    $obj = ($indexKelasID == $xKT['idx']) ? "selected='selected'" : ""; 
                                ?>
                                <option <?php echo $obj ?> value="<?php echo $xKT['idx'] ?>">
                                    <?php echo "Kelas ".$xKT['kelas_layanan'] ?></option>
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

    <div class="box-body table-responsive" id="divDetailNota">
        <div style="display: block">
            <input type="hidden" name="pulang" id="pulang" value="<?= $pulang ?>">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="rataTengah w20">#</th>
                        <th class="rataTengah w250">Dokter Pelaksana</th>
                        <th class="rataTengah">Tindakan / Layanan</th>
                        <th class="rataTengah w100">Tarif</th>
                        <th class="rataTengah w60">Qty</th>
                        <th class="rataTengah w100">Sub Total</th>
                        <th class="rataTengah w60">Aksi</th>
                    </tr>
                </thead>
                <tbody id="getNotaItem"></tbody>
            </table>
        </div>
    </div>
</div>