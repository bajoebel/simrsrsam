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
        <form role="form" id='form-data-kaji-awal' method="post">
            <div class="box box-success">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Form Input Kajian Awal Keperawatan</h3>
                    <div class="box-tools pull-right">
                        
                    </div>
                </div>
                <div class="box-body">
                    <?php $this->load->view("erm/rajal/kaji_awal/kaji_awal_form") ?>
                </div>
                <div class="box-footer">
                    <?= ($detail->status_erm!=1)?" <button type='form' class='btn btn-primary'>Simpan</button>":"" ?>
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
                        <button class='btn btn-sm btn-default' data-toggle="tooltip" data-placement="top" title="Preview" onclick="preview()">
                            <i class='fa fa-print'></i>
                        </button>
                    </div>
                </div>

                <div class="box-body">
                    <?php $this->load->view("erm/rajal/kaji_awal_medis/kaji_awal_medis_form") ?>
                </div>
                <div class="box-footer">
                    <!-- <button type="form" class="btn btn-primary">Simpan</button> -->
                    <?= ($detail->status_erm!=1)?" <button type='form' class='btn btn-primary'>Simpan</button>":"" ?>
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
                        <button class='btn btn-sm btn-default' data-toggle="tooltip" data-placement="top" title="Preview" onclick="preview()">
                            <i class='fa fa-print'></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <?php $this->load->view("erm/rajal/kembang_pasien/kembang_pasien_form") ?>
                </div>
                <div class="box-footer">
                    <?= ($detail->status_erm!=1)?" <button type='form' class='btn btn-primary'>Simpan</button>":"" ?>
                    <!-- <button type="form" class="btn btn-primary">Simpan</button> -->
                </div>
            </div>
        </form>
    </div>
    <div class="tab-pane <?= $ta[6] ?>" id="tab_6">
        <div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Form Input Informasi Pasien dan Keluarga</h3>
                <div class="box-tools pull-right">
                    <button class='btn btn-sm btn-default' data-toggle="tooltip" data-placement="top" title="Preview" onclick="preview()">
                        <i class='fa fa-print'></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <?php $this->load->view("erm/rajal/informasi_edukasi/informasi_edukasi_form") ?>
            </div>
            <!-- <div class="box-footer"> -->
            <!-- <button type="form" class="btn btn-primary pull-right">Selanjutnya</button> -->
            <!-- </div> -->
        </div>
    </div>
</div>