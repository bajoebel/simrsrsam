<div class="tab-content">
    <div class="tab-pane" id="tab_1">
        <!-- surat masuk rawat jalan -->
        <div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Form Input Surat Masuk Rawat Jalan</h3>
                <div class="box-tools pull-right">
                    <a href="<?= base_url() . "erm.php/rajal/masuk_rajal/" . $detail->idx ?>" class='btn btn-sm btn-default' data-toggle="tooltip" data-placement="top" title="Preview" target="_blank">
                        <i class='fa fa-print'></i>
                    </a>
                </div>
            </div>
            <div class="box-body">

            </div>
        </div>
    </div>
    <div class="tab-pane" id="tab_2">
        <!-- persetujuan umum -->
        <div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
                <i class="ion ion-clipboard"></i>

                <h3 class="box-title">Form Input Persetujuan Umum</h3>

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
    <div class="tab-pane active" id="tab_3">
        <div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Form Input Kajian Awal Keperawatan</h3>
                <div class="box-tools pull-right">
                    <button class='btn btn-sm btn-default' data-toggle="tooltip" data-placement="top" title="Preview" onclic="preview()">
                        <i class='fa fa-print'></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <?php $this->load->view("erm/rajal/kaji_awal/kaji_awal_form") ?>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="tab_4">
        <div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Form Input Kajian Awal Medis</h3>
                <div class="box-tools pull-right">
                    <button class='btn btn-sm btn-default' data-toggle="tooltip" data-placement="top" title="Preview" onclic="preview()">
                        <i class='fa fa-print'></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                form kajian awal keperawatan
            </div>
        </div>
    </div>
    <div class="tab-pane" id="tab_5">
        <div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Form Input Perkembangan Pasien Terintegrasi</h3>
                <div class="box-tools pull-right">
                    <button class='btn btn-sm btn-default' data-toggle="tooltip" data-placement="top" title="Preview" onclic="preview()">
                        <i class='fa fa-print'></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                form kajian awal keperawatan
            </div>
        </div>
    </div>
    <div class="tab-pane" id="tab_6">
        <div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Form Input Informasi Pasien dan Keluarga</h3>
                <div class="box-tools pull-right">
                    <button class='btn btn-sm btn-default' data-toggle="tooltip" data-placement="top" title="Preview" onclic="preview()">
                        <i class='fa fa-print'></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                form kajian awal keperawatan
            </div>
        </div>
    </div>
</div>