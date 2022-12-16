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
    <div class="tab-pane active" id="tab_2">
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
                <form role="form" id='form-data-persetujuan' method="post">
                    <div class="box-body">
                        <input type="hidden" name="idx" value="<?= $detail->idx ?>">
                        <input type="hidden" name="nomr" value="<?= $detail->nomr ?>">
                        <div class="form-group">
                            <label for="nama_ttd">Nama <i class="ion ion-clipboard" data-toggle="tooltip" data-placement="right" title="Yang bertanda tangan (pasien/wali)"></i></label>
                            <input type="text" class="form-control" name="nama_ttd" id="nama_ttd" placeholder="Enter Text...." value="dheru">
                        </div>
                        <div class="form-group">
                            <label for="ttl">Tempat Tanggal Lahir</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="tempat_lahir_ttd" id="tempat_lahir_ttd" placeholder="Enter Tempat Lahir.." value="bukittinggi">
                                </div>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" name="tgl_lahir_ttd" id="tgl_lahir_ttd" placeholder="Enter Tanggal lahir" value="1992-09-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <div>
                                <input type="radio" name='jk_ttd' value="1" checked> Laki-laki
                                <input type="radio" name='jk_ttd' value="2"> Perempuan
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="" id="" name='alamat_ttd' class="form-control"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label for="alamat">Selaku</label>
                                    <select name="selaku" id="" class="form-control" required="required">
                                        <option value="pasien">Pasien</option>
                                        <option value="wali">Wali</option>
                                        <option value="orang tua">Orang Tua</option>
                                        <option value="keluarga">Keluarga</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">&nbsp;</label>
                                    <input type="text" name="lainnya" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="privasi">Keinginan Privasi <i class="ion ion-clipboard" data-toggle="tooltip" data-placement="right" title="Saya (mengizinkan/ tidak mengizinkan)* Rumah Sakit Memberi akses bagi : Keluarga serta orang yang akan menengok /menemui saya.
                             menginginkan privasi khusus berupa:"></i></label>
                            <div class="row">
                                <div class="col-md-6 fieldAdd">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="privasi[]" placeholder="Enter text.....">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="button" onclick="addmore(1)"><i class="fa fa-plus"></i></button>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="privasi">Terbatas Pada <i class="ion ion-clipboard" title="• Saya memahami informasi yang ada di dalam diri saya termasuk diagnosis, hasil laboratorium dan hasil tes diagnosis yang akan digunakan untuk perawatan medis, RSUD Dr Achmad Mochtar Bukittinggi akan menjamin kerahasiannya.
                            • Saya memberi wewenang kepada RSUD Dr Achmad Mochtar Bukittinggi untuk memberikan informasi tentang rahasia kedokteran saya bila diperlukan untuk memproses klaim asuransi dan atau lembaga pemerintah lainya.
                            • Saya memberi wewenang kepada RSUD Dr Achmad Mochtar Bukittinggi untuk memberikan (informasi / tidak)* tentang diagnosis, hasil pelayanan dan pengobatan saya kepada"></i></label>
                            <div class="row">
                                <div class="col-md-6 fieldAdd2">
                                    <div class="input-group">
                                        <span class="input-group-addon"> <input type="checkbox" aria-label="Checkbox for following text input" name="terbatas"> </span>
                                        <input type="text" class="form-control" name='terbatas_list[]' placeholder="Enter text.....">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="button" onclick="addmore(2)"><i class="fa fa-plus"></i></button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="form" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="tab_3">
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
                form kajian awal keperawatan
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