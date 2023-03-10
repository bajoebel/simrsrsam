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
                    <th>Action</th>
                </tr>
                <?php $no = 1;
                foreach ($list as $r) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $r->nama ?></td>
                        <td><?= $r->created_at ?></td>
                        <td>
                            <a href="<?= base_url() . 'erm.php/rajal/setuju_umum/' . $r->idx . "/" . $r->id ?>" class='btn btn-xs btn-default' data-toggle="tooltip" data-placement="top" title="Preview" target="_blank"> <i class='fa fa-print'></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php } else if ($pil == 3) { ?>
    <!-- Kajian awal keperawatan -->
    <div class="">
    <?php $no = 1;
        foreach ($list as $r) : ?>
            <div class="panel box box-success">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#ar_<?=$r->id?>" class="collapsed" aria-expanded="false">
                            <?= DateToIndo($r->tgl) . " - " . $r->jam. " - ". $r->perawat ?>
                        </a>
                    </h4>
                </div>
                <div id="ar_<?=$r->id?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        
                    </div>
                    <div class="box-footer text-center">
                        <a href="<?= base_url("erm.php/rajal/kaji_awal/$r->id/$r->idx/$r->nomr")?>"  target="_blank" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Tampil Detail">
                            <i class="fa fa-print"></i>
                        </a>
                        <?php if($detail->status_erm!=1) { ?>
                        <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id ?>" data-nomr="<?=$r->nomr?>" class='btn btn-sm btn-primary' onclick="editAwalRawat(this.getAttribute('data-idx'),this.getAttribute('data-id'),this.getAttribute('data-nomr'))" data-toggle="tooltip" data-placement="top" title="Edit"> <i class='fa fa-edit'></i>
                        </button>
                        <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id ?>" class='btn btn-sm btn-danger' onclick="hapusAwalRawat(this.getAttribute('data-idx'),this.getAttribute('data-id'))" data-toggle="tooltip" data-placement="top" title="Hapus"> <i class='fa fa-trash'></i>
                        </button>
                        <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id  ?>" data-nomr="<?=$r->nomr?>" data-perawat="<?=$r->perawat_id?>" class='btn btn-sm bg-black' onclick="signAwalRawat(this.getAttribute('data-idx'),this.getAttribute('data-id'),this.getAttribute('data-nomr'),this.getAttribute('data-perawat'))" data-toggle="tooltip" data-placement="top" title="Assign Form"> <i class='fa fa-qrcode'></i>
                        </button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
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
                            <?= strtoupper($r->hari) . " - " . DateToIndo($r->tgl) . " - " . $r->jam." - ".$r->dokter ?>
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        
                    </div>
                    <div class="box-footer text-center">
                        <a href="<?= base_url("erm.php/rajal/kaji_awal_medis/$r->id/$r->idx/$r->nomr")?>"  target="_blank" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Tampil Detail">
                            <i class="fa fa-print"></i>
                        </a>
                        <?php if($detail->status_erm!=1) { ?>
                        <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id ?>" data-nomr="<?=$r->nomr?>" class='btn btn-sm btn-primary' onclick="editAwalMedis(this.getAttribute('data-idx'),this.getAttribute('data-id'),this.getAttribute('data-nomr'))" data-toggle="tooltip" data-placement="top" title="Edit Data"> <i class='fa fa-edit'></i>
                        </button>
                        <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id ?>" class='btn btn-sm btn-danger' onclick="hapusAwalMedis(this.getAttribute('data-idx'),this.getAttribute('data-id'))" data-toggle="tooltip" data-placement="top" title="Hapus"> <i class='fa fa-trash'></i>
                        </button>
                        <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id  ?>" data-nomr="<?=$r->nomr?>" data-dokter="<?=$r->dokter_id?>" class='btn btn-sm bg-black' onclick="signAwalMedis(this.getAttribute('data-idx'),this.getAttribute('data-id'),this.getAttribute('data-nomr'),this.getAttribute('data-dokter'))" data-toggle="tooltip" data-placement="top" title="Assign Form"> <i class='fa fa-qrcode'></i>
                        </button>
                        <?php } ?>
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
                        <a data-toggle="collapse" data-parent="#accordion" href="#kb_<?=$r->id?>" class="collapsed" aria-expanded="false">
                            <?= DateToIndo($r->tgl) . " - " . $r->jam . " - " . $r->jenis_tenaga_medis . " - " . $r->tenaga_medis ?>
                        </a>
                    </h4>
                </div>
                <div id="kb_<?=$r->id?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        
                    </div>
                    <div class="box-footer text-center">
                        <a href="<?= base_url("erm.php/rajal/kembang_pasien/$r->id/$r->idx/$r->nomr")?>"  target="_blank" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Tampil Detail">
                            <i class="fa fa-print"></i>
                        </a>
                        <?php if($detail->status_erm!=1) { ?>
                        <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id ?>" data-nomr="<?=$r->nomr?>" class='btn btn-sm btn-primary' onclick="editKembangPasien(this.getAttribute('data-idx'),this.getAttribute('data-id'),this.getAttribute('data-nomr'))" data-toggle="tooltip" data-placement="top" title="Edit"> <i class='fa fa-edit'></i>
                        </button>
                        <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id ?>" class='btn btn-sm btn-danger' onclick="hapusKembangPasien(this.getAttribute('data-idx'),this.getAttribute('data-id'))" data-toggle="tooltip" data-placement="top" title="Hapus"> <i class='fa fa-trash'></i>
                        </button>
                        <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id  ?>" data-nomr="<?=$r->nomr?>" data-tenagamedis="<?=$r->tenaga_medis_id?>" class='btn btn-sm bg-black' onclick="signKembangPasien(this.getAttribute('data-idx'),this.getAttribute('data-id'),this.getAttribute('data-nomr'),this.getAttribute('data-tenagamedis'))" data-toggle="tooltip" data-placement="top" title="Assign Form"> <i class="fa fa-qrcode"></i></button>
                        </button>
                        <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id  ?>" data-nomr="<?=$r->nomr?>" data-tenagamedis="<?=$r->tenaga_medis_id?>" class='btn btn-sm btn-default' onclick="signReviewDpjp(this.getAttribute('data-idx'),this.getAttribute('data-id'),this.getAttribute('data-nomr'),this.getAttribute('data-tenagamedis'))" data-toggle="tooltip" data-placement="top" title="Assign Form"> Assign DPJP</button>
                        </button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php } else if ($pil == 6) { ?>
    <div class="" style="max-height: 800px; overflow-y: auto; ">
        <?php $no = 1;
        foreach ($list as $r) : ?>
            <input type="text" class="hidden" name="id_rj_iep" id="id_rj_iep" value="<?=$r->id?>">
            <div class="panel box box-success">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                            <?= DateToIndo($r->created_at) ?>
                        </a>
                    </h4>
                    <?php if($detail->status_erm!=1) { ?>
                        <button type='button' class='btn btn-sm btn-success pull-right' data-toggle='modal' href='#modal-edukasi-pasien'><i class='fa fa-plus-circle' aria-hidden='true'></i>Tambah Topik Edukasi</button>
                    <?php } ?>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        <strong>Bahasa Yang Digunakan</strong>
                        <p><?= arr_to_list($r->bahasa, "<span>&nbsp;&nbsp;&nbsp;", "</span>") ?></p>
                        <strong>Kebutuhan Penerjemah</strong>
                        <p><?= trueOrFalse($r->penerjemah) ?></p>
                        <strong>Agama</strong>
                        <p><?= agama($r->agama) ?></p>
                        <strong>Pendidikan Pasien</strong>
                        <p><?= pendidikan($r->pendidikan) ?></p>
                        <strong>Keterbatasan Fisik dan kognitif</strong>
                        <p><?= arr_to_list($r->terbatas_fisik, "<span>&nbsp;&nbsp;&nbsp;", "</span>") ?></p>
                        <strong>Hambatan emosional dan motivasi</strong>
                        <p><?= arr_to_list($r->hambatan, "<span>&nbsp;&nbsp;&nbsp;", "</span>") ?></p>
                        <strong>Assessment Kebutuhan Edukasi</strong>
                        <p><?= arr_to_list($r->kebutuhan_edukasi, "<span>&nbsp;&nbsp;&nbsp;", "</span>") ?></p>
                        <strong>Perencanaan Edukasi (Metode)</strong>
                        <p><?= arr_to_list($r->metode, "<span>&nbsp;&nbsp;&nbsp;", "</span>") ?></p>
                        <strong>Perencanaan Edukasi (Media)</strong>
                        <p><?= arr_to_list($r->media, "<span>&nbsp;&nbsp;&nbsp;", "</span>") ?></p>
                        <strong>Perencanaan Edukasi (Sasaran Edukasi)</strong>
                       
                        <p><?=$r->sasaran_edukasi?><?=($r->sasaran_edukasi=="keluarga")?", hubungan : $r->hubungan_keluarga":""?></p>
                    </div>
                    <div class="box-footer">
                        <a href="<?= base_url("erm.php/rajal/edukasi_pasien/$r->id/$r->idx/$r->nomr")?>"  target="_blank" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Tampil Detail">
                            <i class="fa fa-print"></i>
                        </a>
                        <?php if($detail->status_erm!=1) { ?>
                        <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id ?>" data-nomr="<?=$r->nomr?>" class='btn btn-sm btn-primary' onclick="editEdukasiPasien(this.getAttribute('data-idx'),this.getAttribute('data-id'),this.getAttribute('data-nomr'))" data-toggle="tooltip" data-placement="top" title="Edit"> <i class='fa fa-edit'></i>
                        </button>
                        <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id ?>" class='btn btn-sm btn-danger' onclick="hapusEdukasiPasien(this.getAttribute('data-idx'),this.getAttribute('data-id'))" data-toggle="tooltip" data-placement="top" title="Hapus"> <i class='fa fa-trash'></i>
                        </button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php } else if ($pil==9) {?>
     <!-- <p><?php print_r($list) ?></p> -->
    <!-- Perkembangan Pasien Terintegrasi -->
    <div class="" style="max-height: 600px; overflow-y: auto; ">
        <?php $no = 1;
        foreach ($list as $r) : ?>
            <div class="panel box box-success">
                <div class="box-header with-border">
                    <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#ki_<?=$r->id?>" class="collapsed" aria-expanded="false">
                            <?= DateToIndo($r->tgl) . " - " . $r->jam . " - " . $r->unit_diminta . " - " . $r->dpjp_diminta ?>
                        </a>
                    </h4>
                </div>
                <div id="ki_<?=$r->id?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        <strong>Unit Yang Meminta</strong>
                        <p><?= $r->unit_minta ?></p>
                        <strong>Dokter Yang Meminta</strong>
                        <p><?= $r->dpjp_minta ?></p>
                        <strong>Ikhtisar Klinik</strong>
                        <p><?= $r->iktisar_klinik ?></p>
                        <strong>Terapi Tindakan Yang Diharapkan</strong>
                        <p><?= $r->terapi_tindakan ?></p>
                        <strong>Konsulen Di Harapkan</strong>
                        <p><?= arr_to_list($r->konsul_harap, "<span>&nbsp;&nbsp;&nbsp;", "</span>") ?></p>
                        <strong>Kembali Ke Dokter/Unit yang Meminta Sebelum Pengobatan</strong>
                        <p><?= ($r->kembali)?"Ya":"Tidak" ?></p>
                        <strong>Status Form</strong>
                        <p><?= status_permintaan_konsul($r->status_form) ?></p>
                    </div>
                    <div class="box-footer text-center">
                        <a href="<?= base_url("erm.php/rajal/konsul_internal/$r->id/$r->idx/$r->nomr")?>"  target="_blank" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Tampil Detail">
                            <i class="fa fa-print"></i>
                        </a>
                        <?php if($detail->status_erm!=1) { ?>
                            <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id ?>" data-nomr="<?=$r->nomr?>" class='btn btn-sm btn-primary' onclick="editKonsulInternal(this.getAttribute('data-idx'),this.getAttribute('data-id'),this.getAttribute('data-nomr'))" data-toggle="tooltip" data-placement="top" title="Edit"> <i class='fa fa-edit'></i>
                            </button>
                            <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id ?>" class='btn btn-sm btn-danger' onclick="hapusKonsulInternal(this.getAttribute('data-idx'),this.getAttribute('data-id'))" data-toggle="tooltip" data-placement="top" title="Hapus"> <i class='fa fa-trash'></i>
                            </button>
                            <button data-idx="<?= $r->idx ?>" data-id="<?= $r->id  ?>" data-nomr="<?=$r->nomr?>" data-dokter="<?=$r->dpjp_minta_id?>" class='btn btn-sm bg-black' onclick="signKonsulInternal(this.getAttribute('data-idx'),this.getAttribute('data-id'),this.getAttribute('data-nomr'),this.getAttribute('data-dokter'))" data-toggle="tooltip" data-placement="top" title="Assign Form"> <i class='fa fa-qrcode'></i>
                            </button>
                        <?php } ?>
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