<div class="tab-content">
    <div class="tab-pane <?= $ta[1] ?>" id="tab_1">
        <!-- surat masuk rawat jalan -->
        <div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Preview Surat Masuk Rawat Jalan</h3>
                <div class="box-tools pull-right">
                    <a href="<?= base_url() . "erm.php/rajal/masuk_rajal/" . $detail->idx ?>" class='btn btn-sm btn-default' data-toggle="tooltip" data-placement="top" title="Preview" target="_blank">
                        <i class='fa fa-print'></i>
                    </a>
                </div>
            </div>
            <div class="box-body">
                <?php $data = ["d"=> $detail,"p"=>$pasien]; $this->load->view("erm/rajal/masuk_rj/masuk_rj_form",$data) ?>
            </div>
        </div>
    </div>
    <div class="tab-pane <?= $ta[2] ?>" id="tab_2">
        <!-- persetujuan umum -->
        <div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
                <i class="ion ion-clipboard"></i>

                <h3 class="box-title">Preview Persetujuan Umum</h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url() . "erm.php/rajal/setuju_umum/" . $detail->idx ?>" class='btn btn-sm btn-default' data-toggle="tooltip" data-placement="top" title="Preview" target="_blank">
                        <i class='fa fa-print'></i>
                    </a>
                </div>
            </div>
            <div class="box-body">
                <?php $this->load->view("erm/rajal/setuju_umum/setuju_umum_form") ?>
            </div>
        </div>
    </div>
    <div class="tab-pane <?= $ta[3] ?>" id="tab_3">
        <form id='form-data-kaji-awal' method="post">
            <div class="box box-success">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Form Input Kajian Awal Keperawatan</h3>
                    <div class="box-tools pull-right">

                        <?php if ($detail->status_erm!=1) { if ($ar=="") {?>
                            <button type="button" class="btn btn-sm btn-success" onclick="tambahAwalRawat()">Tambah Data</button>
                        <?php } ?>
                        <a href="#" class="btn btn-sm btn-warning riwayat-form-link" data-pil="riwayat_awal_rawat" data-idx="<?=$detail->idx?>" data-nomr="<?=$detail->nomr?>">Gunakan Riwayat Sebelumnya</a>
                        <?php } ?>
                    </div>
                </div>
                <div id="ar_preview">
                    <div class="box-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?=base_url('erm.php/rajal/kaji_awal/'.$ar.'/'.$detail->idx.'/'.$detail->nomr)?>"></iframe>
                        </div>
                    </div>
                </div>
                <div id="ar_form">
                    <div class="box-body">
                        <?php $this->load->view("erm/rajal/kaji_awal/kaji_awal_form") ?>
                    </div>
                    <div class="box-footer">
                        <?= ($detail->status_erm!=1)?" <button type='submit' class='btn btn-primary'>Simpan</button>":"" ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="tab-pane <?= $ta[4] ?>" id="tab_4">
        <form role="form" id='form-data-kaji-awal-medis' method="post">
            <div class="box box-success">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Form Input Kajian Awal Medis</h3>
                    <div class="box-tools pull-right">
                        <?php if ($detail->status_erm!=1) { if (!$am){?>
                            <button type="button" class="btn btn-sm btn-success" onclick="tambahAwalMedis()">Tambah Data</button>
                        <?php } else { ?>

                        <?php }?>
                        <a href="#" class="btn btn-sm btn-warning riwayat-form-link" data-pil="riwayat_awal_medis" data-idx="<?=$detail->idx?>" data-nomr="<?=$detail->nomr?>">Gunakan Riwayat Sebelumnya</a>
                        <?php } ?>
                    </div>
                </div>
                <div id="am_preview">
                    <div class="box-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?=base_url('erm.php/rajal/kaji_awal_medis/'.$am.'/'.$detail->idx.'/'.$detail->nomr)?>"></iframe>
                        </div>
                    </div>
                </div>
                <div id="am_form">
                    <div class="box-body">
                        <?php $this->load->view("erm/rajal/kaji_awal_medis/kaji_awal_medis_form") ?>
                    </div>
                    <div class="box-footer">
                        <!-- <button type="form" class="btn btn-primary">Simpan</button> -->
                        <?= ($detail->status_erm!=1)?" <button type='form' class='btn btn-primary'>Simpan</button>":"" ?>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
    <div class="tab-pane <?= $ta[5] ?>" id="tab_5">
        <form role="form" id='form-data-kembang-pasien' method="post">
            <div class="box box-success">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Form Input Perkembangan Pasien Terintegrasi</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-sm btn-warning" data-idx="<?=$detail->idx?>" data-nomr="<?=$detail->nomr?>" onclick="tampilKembangPasienAll(this.getAttribute('data-idx'),this.getAttribute('data-nomr'))">Tampil CPPT Keseluruhan</button>
                        <?php if ($detail->status_erm!=1) { if (!$kp){?>
                            <!-- <button type="button" class="btn btn-sm btn-success" onclick="tambahKembangPasien()">Tambah Data</button> -->
                        <?php } else { ?>

                        <?php }?>
                        <?php } ?>
                    </div>
                </div>
                <div id="kp_form">
                    <div class="box-body">
                        <?php $this->load->view("erm/rajal/kembang_pasien/kembang_pasien_form") ?>
                    </div>
                    <div class="box-footer">
                        <?= ($detail->status_erm!=1)?" <button type='form' class='btn btn-primary'>Simpan</button>":"" ?>
                        <!-- <button type="form" class="btn btn-primary">Simpan</button> -->
                    </div>
                </div>
                <div id="kp_preview">
                    <div class="box-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" id="kp_preview_frame" src="<?=base_url('erm.php/rajal/kembang_pasien/'.$kp.'/'.$detail->idx.'/'.$detail->nomr)?>"></iframe>
                        </div>
                    </div>
                </div>
            
            </div>
        </form>
    </div>
    <div class="tab-pane <?= $ta[6] ?>" id="tab_6">
        <!-- <form role="form" id='form-data-p-penunjang' method="post"> -->
            <div class="box box-success">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Form Input Informasi Pasien dan Keluarga</h3>
                </div>
                <div class="box-body">
                    <?php $this->load->view("erm/rajal/informasi_edukasi/informasi_edukasi_form") ?>
                </div>
                <!-- <div class="box-footer"> -->
                <!-- <button type="form" class="btn btn-primary pull-right">Selanjutnya</button> -->
                <!-- </div> -->
            </div>
        <!-- </form> -->
    </div>
    <div class="tab-pane <?= $ta[7] ?>" id="tab_7">
        <div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Form Input Permintaan Penunjang</h3>
                <a class="pull-right" href="#tab_4" data-toggle="tab" onclick="getRiwayat(4,<?= $detail->idx ?>)">Back To Kajian Awal Medis</a>
            </div>
            <div class="box-body">
                <?php $this->load->view("erm/rajal/p_penunjang/p_penunjang_form") ?>
            </div>
            <!-- <div class="box-footer"> -->
            <!-- <button type="form" class="btn btn-primary pull-right">Selanjutnya</button> -->
            <!-- </div> -->
        </div>
    </div>
    <div class="tab-pane <?= $ta[8] ?>" id="tab_8">
        <div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Form Input Permintaan Resep</h3>
                <a class="pull-right" href="#tab_4" data-toggle="tab" onclick="getRiwayat(4,<?= $detail->idx ?>)">Back To Kajian Awal Medis</a>
            </div>
            <div class="box-body">
                <?php $this->load->view("erm/rajal/p_resep/p_resep_form") ?>
            </div>
        </div>
    </div>
    <div class="tab-pane <?= $ta[9] ?>" id="tab_9">
        <form id='form-data-konsul-internal' method="post" class="form-horizontal">
            <div class="box box-success">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Form Konsul Internal</h3>
                    <div class="box-tools pull-right">

                    </div>
                </div>
                <div id="ki_form">
                    <div class="box-body">
                        <?php $this->load->view("erm/rajal/konsul_internal/konsul_internal_form") ?>
                    </div>
                    <div class="box-footer">
                        <?= ($detail->status_erm!=1)?" <button type='submit' class='btn btn-primary simpan-konsul-internal'>Simpan</button>":"" ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="tab-pane <?= $ta[10] ?>" id="tab_10">
        <form id='form-data-billing-tindakan' method="post" class="form-horizontal">
            <div class="box box-success">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">BIlling Tindakan</h3>
                    <div class="box-tools pull-right">
                    </div>
                </div>
                <div id="bt_form">
                    <div class="box-body">
                        <?php $this->load->view("erm/rajal/billing_tindakan/billing_tindakan_form") ?>
                    </div>
                    <div class="box-footer">
                        <!-- <?= ($detail->status_erm!=1)?" <button type='submit' class='btn btn-primary simpan-konsul-internal'>Proses To Billing</button>":"" ?> -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>