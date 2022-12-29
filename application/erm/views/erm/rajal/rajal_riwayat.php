<?php if ($pil == 1) { ?>
    <!-- surat masuk rawat jalan -->
    <div class="" style="max-height: 450px; overflow-y: scroll; ">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Tujuan</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
                <?php $no = 1;
                foreach ($list as $r) :
                    if ($r->jns_layanan == $jns_layanan) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $r->nama_ruang ?></td>
                            <td><?= $r->tgl_masuk ?></td>

                            <td>
                                <a href="<?= base_url() . "erm.php/rajal/masuk_rajal/" . $r->idx ?>" class='btn btn-sm btn-default' data-toggle="tooltip" data-placement="top" title="Preview" target="_blank"> <i class='fa fa-print'></i>
                                </a>
                            </td>
                        </tr>
                <?php endif;
                endforeach; ?>
            </tbody>
        </table>
    </div>

<?php } else if ($pil == 2) { ?>
    <!-- Persetujuan umum -->
    <div class="" style="max-height: 450px; overflow-y: scroll; ">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php $no = 1;
                foreach ($list as $r) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $r->nama ?></td>
                        <td><?= $r->created_at ?></td>
                        <td>
                            <?php
                            if ($r->status == 1) {
                                echo "<span class='badge bg-green'>Approved</span>";
                            } else {
                                echo "<span class='badge '>Waiting</span>";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?= base_url() . 'erm.php/rajal/setuju_umum/' . $r->idx . "/" . $r->id ?>" class='btn btn-xs btn-default' data-toggle="tooltip" data-placement="top" title="Preview" target="_blank"> <i class='fa fa-print'></i>
                            </a>
                            <?php  ?>
                            <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id ?>" class='btn btn-xs btn-danger' onclick="hapusSetujuUmum(this.getAttribute('data-idx'),this.getAttribute('data-id'))" data-toggle="tooltip" data-placement="top" title="Hapus"> <i class='fa fa-trash'></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php } else if ($pil == 3) { ?>
    <!-- Kajian awal keperawatan -->
    <div class="" style="max-height: 450px; overflow-y: scroll; ">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Poliklinik</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

            </tbody>
        </table>
    </div>
<?php } else if ($pil == 4) { ?>
    <!-- <p><?php print_r($list) ?></p> -->
    <!-- Kajian awal medis -->
    <div class="" style="max-height: 600px; overflow-y: auto; ">
        <?php $no = 1;
        foreach ($list as $r) : ?>
            <div class="panel box box-success">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                            <?= strtoupper($r->hari) . " - " . DateToIndo($r->tgl) . " - " . $r->jam ?>
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        <strong>Anamnesis</strong><br />
                        <p>Auto - <?= $r->auto_detail ?></p>
                        <p>Allo - <?= $r->allo_detail ?></p>
                        <strong>Pemeriksaan Fisik</strong><br />
                        <p>TD: <?= $r->td ?>mmHg - Nadi: <?= $r->nadi ?> x/i - Pernapasan : <?= $r->napas ?> x/i - Suhu: <?= $r->suhu ?>C</p>
                        <strong>Diagnosisi Kerja</strong><br />
                        <p><?= $r->diagnosis_kerja ?></p>
                        <strong>Diagnosisi Banding</strong><br />
                        <p><?= $r->diagnosis_banding ?></p>
                        <strong>Pemeriksaan Penunjang</strong><br />
                        <p><?= $r->penunjang ?></p>
                        <strong>Therapi / Tindakan</strong><br />
                        <p><?= $r->terapi ?></p>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Tampil Detail">
                            <i class="fa fa-print"></i>
                        </button>
                        <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id ?>" class='btn btn-sm btn-danger' onclick="hapusKembangPasien(this.getAttribute('data-idx'),this.getAttribute('data-id'))" data-toggle="tooltip" data-placement="top" title="Hapus"> <i class='fa fa-trash'></i>
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php } else if ($pil == 5) { ?>
    <!-- <p><?php print_r($list) ?></p> -->
    <!-- Perkembangan Pasien Terintegrasi -->
    <div class="" style="max-height: 600px; overflow-y: auto; ">
        <?php $no = 1;
        foreach ($list as $r) : ?>
            <div class="panel box box-success">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                            <?= DateToIndo($r->tgl) . " - " . $r->jam . " - " . $r->jenis_tenaga_medis . " - " . $r->nama_tenaga_medis ?>
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        <strong>Subyektif</strong><br />
                        <p><?= $r->subyektif ?></p>
                        <strong>Subyektif</strong><br />
                        <p><?= $r->obyektif ?></p>
                        <strong>Assessment</strong><br />
                        <p><?= $r->assesment ?></p>
                        <strong>Planning</strong><br />
                        <p><?= $r->assesment ?></p>
                        <strong>Instruksi</strong><br />
                        <p><?= $r->assesment ?></p>
                        <strong>Review</strong><br />
                        <p><?= $r->review ?></p>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Tampil Detail">
                            <i class="fa fa-print"></i>
                        </button>
                        <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id ?>" class='btn btn-sm btn-danger' onclick="hapusKembangPasien(this.getAttribute('data-idx'),this.getAttribute('data-id'))" data-toggle="tooltip" data-placement="top" title="Hapus"> <i class='fa fa-trash'></i>
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php } else if ($pil == 6) { ?>
    <div class="" style="max-height: 600px; overflow-y: auto; ">
        <?php $no = 1;
        foreach ($list as $r) : ?>
            <div class="panel box box-success">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                            <?= DateToIndo($r->created_at) ?>
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        <strong>Bahasa Yang Digunakan</strong>
                        <p><?= arr_to_list($r->bahasa, "<span>&nbsp;&nbsp;&nbsp;", "</span>") ?></p>
                        <strong>Kembutuhan Penerjemah</strong>
                        <p><?= trueOrFalse($r->penerjemah) ?></p>
                        <strong>Agama</strong>
                        <p><?= agama($r->agama) ?></p>
                        <strong>Pendidikan Pasien</strong>
                        <p><?= pendidikan($r->pendidikan) ?></p>
                        <strong>Keterbatasn Fisik</strong>
                        <p><?= arr_to_list($r->terbatas_fisik, "<span>&nbsp;&nbsp;&nbsp;", "</span>") ?></p>
                        <strong>Hambatan</strong>
                        <p><?= arr_to_list($r->hambatan, "<span>&nbsp;&nbsp;&nbsp;", "</span>") ?></p>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Tampil Detail">
                            <i class="fa fa-print"></i>
                        </button>
                        <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id ?>" class='btn btn-sm btn-danger' onclick="hapusEdukasiPasien(this.getAttribute('data-idx'),this.getAttribute('data-id'))" data-toggle="tooltip" data-placement="top" title="Hapus"> <i class='fa fa-trash'></i>
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php } else { ?>
    <div class="alert alert-danget">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Belum ada riwayat ditemukan
    </div>

<?php } ?>