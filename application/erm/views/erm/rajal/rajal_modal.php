<!-- Kajian Awal Rawat -->
<?php if ($pil=="awal_rawat") { ?>
    
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Riwayat Kajian Awal Rawat</div>
            <div class="panel-body">
                
            </div>
            <!-- Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Daftar - Reg Unit</th>
                        <th>Tgl Masuk</th>
                        <th>Tgl & Jam RME</th>
                        <th>Perawat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;foreach($list as $r) { 
                        $d = getInfoDaftar($r->idx)
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d->id_daftar." - ".$d->reg_unit ?></td>
                        <td><?= $d->tgl_masuk ?></td>
                        <td><?=$r->tgl."/".$r->jam?></td>
                        <td><?=$r->perawat?></td>
                        <td>
                            <a href="<?= base_url("erm.php/rajal/kaji_awal/$r->id/$r->idx/$r->nomr")?>"  target="_blank" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Tampil Detail">
                                <i class="fa fa-print"></i>
                            </a>
                            <?= ($r->idx==$idx)?"<span class='badge bg-green'>current</span>":""?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
<?php } ?>

<!-- Kajian Awal Medis -->
<?php if ($pil == "awal_medis") { ?>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Riwayat Kajian Awal Medis</div>
            <div class="panel-body">
                
            </div>
            <!-- Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Daftar - Reg Unit</th>
                        <th>Tgl Masuk</th>
                        <th>Tgl & Jam RME</th>
                        <th>Dokter</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;foreach($list as $r) { 
                        $d = getInfoDaftar($r->idx)
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d->id_daftar." - ".$d->reg_unit ?></td>
                        <td><?= $d->tgl_masuk ?></td>
                        <td><?=$r->tgl."/".$r->jam?></td>
                        <td><?=$r->dokter?></td>
                        <td>
                            <a href="<?= base_url("erm.php/rajal/kaji_awal_medis/$r->id/$r->idx/$r->nomr")?>"  target="_blank" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Tampil Detail">
                                <i class="fa fa-print"></i>
                            </a>
                            <?= ($r->idx==$idx)?"<span class='badge bg-green'>current</span>":""?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>

<!-- Perkembangan Pasien Terintegrasi -->
<?php if ($pil == "cppt") { ?>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Riwayat Perkembangan Pasien Terintegrasi</div>
            <div class="panel-body">
                
            </div>
            <!-- Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Daftar - Reg Unit</th>
                        <th>Tgl Masuk</th>
                        <th>Tgl & Jam RME</th>
                        <th>Profesional</th>
                        <th>Nama Profesional</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;foreach($list as $r) { 
                        $d = getInfoDaftar($r->idx)
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d->id_daftar." - ".$d->reg_unit ?></td>
                        <td><?= $d->tgl_masuk ?></td>
                        <td><?=$r->tgl."/".$r->jam?></td>
                        <td><?=$r->jenis_tenaga_medis?></td>
                        <td><?=$r->tenaga_medis?></td>
                        <td>
                            <a href="<?= base_url("erm.php/rajal/kembang_pasien/$r->id/$r->idx/$r->nomr")?>"  target="_blank" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Tampil Detail">
                                <i class="fa fa-print"></i>
                            </a>
                            <?= ($r->idx==$idx)?"<span class='badge bg-green'>current</span>":""?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>

<!-- Perkembangan Pasien Terintegrasi -->
<?php if ($pil == "edukasi_pasien") { ?>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Riwayat Edukasi Pasien dan Keluarga</div>
            <div class="panel-body">
                
            </div>
            <!-- Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Daftar - Reg Unit</th>
                        <th>Tgl Masuk</th>
                        <th>Tgl & Jam RME</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;foreach($list as $r) { 
                        $d = getInfoDaftar($r->idx)
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d->id_daftar." - ".$d->reg_unit ?></td>
                        <td><?= $d->tgl_masuk ?></td>
                        <td><?=$r->updated_at?></td>
                        <td>
                            <a href="<?= base_url("erm.php/rajal/edukasi_pasien/$r->id/$r->idx/$r->nomr")?>"  target="_blank" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Tampil Detail">
                                <i class="fa fa-print"></i>
                            </a>
                            <?= ($r->idx==$idx)?"<span class='badge bg-green'>current</span>":""?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>

<!-- Profil Ringkas Medis Rawat Jalan (PRMRJ) -->
<?php if ($pil == "prmrj") { ?>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Profil Ringkas Medis Rawat Jalan (PRMRJ)</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="table-prmrj" class="table table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Catatan Informasi Pasien</th>
                                    <th>Nama / TTD DPJP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no =1;foreach ($list->result() as $r) { ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$r->tgl?></td>
                                    <td><?=$r->jam?></td>
                                    <td><?= "S : ".gantiTagP($r->subyektif)."O : ".gantiTagP($r->obyektif)."A : ".gantiTagP($r->assesment)."P : ".gantiTagP($r->planning)."I : ".gantiTagP($r->instruksi) ?></td>
                                    <td>
                                        <?= $r->tenaga_medis ?><br/>
                                        qrcode
                                    </td>
                                    <td> <button class="btn btn-xs btn-primary">Assign</button></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                var table = $("#table-prmrj").DataTable({
                    // ordering : false,
                    scrollY: '400px',
                    scrollCollapse: true,
                    paging: false, 
                });
            });
        </script>
    </div>
<?php } ?>
