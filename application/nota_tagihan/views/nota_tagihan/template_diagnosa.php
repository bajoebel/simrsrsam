<style type="text/css">
    .loading {
      border: 16px solid #f3f3f3; /* Light grey */
      border-top: 16px solid #3498db; /* Blue */
      border-radius: 50%;
      width: 120px;
      height: 120px;
      animation: spin 2s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
</style>
<div class="box box-success">
    <div class="box-header">
        Diagnosa Dan Terapi
    </div>
    <div class="row">
        <div class="loading" id="loading" style="display: none;"></div>
        <form method="POST" action="#" id="diagnosa">
            <div class="col-xs-12">
                <?php 
                //print_r($diagnosa);
                    if(!empty($diagnosa)){
                        $idx_diagnosa       = $diagnosa->idx;
                        $kasus_baru         = $diagnosa->kasus_baru;
                        $kunjungan_baru     = $diagnosa->kunjungan_baru;
                        $diag           = $diagnosa->diagnosa;
                        $terapi             = $diagnosa->terapi;
                        //echo $diagnosa; exit;
                        $tekanan_darah      = $diagnosa->tekanan_darah;
                        $golongan_darah     = $diagnosa->golongan_darah;
                        $berat_badan        = $diagnosa->berat_badan;
                        $tinggi_badan       = $diagnosa->tinggi_badan;
                    }else{
                        $idx_diagnosa       = "";
                        $kasus_baru         = "";
                        $kunjungan_baru     = "";
                        $terapi             = "";
                        $tekanan_darah      = "";
                        $golongan_darah     = "";
                        $berat_badan        = "";
                        $tinggi_badan       = "";
                        $diagnosa           = "";
                        $diag           = "";
                    }
                ?>
                <div class="col-xs-6">
                    <fieldset>
                        <legend>Diagnosa</legend>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-12 col-sm-12 col-xs-12 control-label">Diagnosa</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="hidden" name="idx" id="idx" value="<?= $idx_diagnosa ?>">
                                    <input type="hidden" name="idx_pendaftaran" id="idx_pendaftaran" value="<?= $idx ?>">
                                    <textarea class="form-control" name="diagnosa" id="diagnosa"><?= $diag ?></textarea>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="checkbox" name="kasus_baru" id="kasus_baru" value="1" <?php if($kasus_baru==1) echo "checked"; ?>>Kasus Baru
                                    <input type="checkbox" name="kunjungan_baru" id="kunjungan_baru" value="1" <?php if($kunjungan_baru==1) echo "checked"; ?>>Kunjungan Baru
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-xs-6">
                    <fieldset>
                        <legend>Terapi</legend>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-12 col-sm-12 col-xs-12 control-label">Terapi</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control" name="terapi" id="terapi"><?= $terapi ?></textarea>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="col-md-12 col-sm-12 col-xs-12 control-label">Tekanan Darah</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" name="tekanan_darah" id="tekanan_darah" class="form-control" value="<?= $tekanan_darah ?>">
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                            <label class="col-md-12 col-sm-12 col-xs-12 control-label">Golongan Darah</label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" name="golongan_darah" id="golongan_darah" class="form-control" value="<?= $golongan_darah ?>">
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-md-12 col-sm-12 col-xs-12 control-label">Berat Badan</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" name="berat_badan" id="berat_badan" class="form-control" value="<?= $berat_badan; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-md-12 col-sm-12 col-xs-12 control-label">Tinggi  Badan</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" name="tinggi_badan" id="tinggi_badan" class="form-control" value="<?= $tinggi_badan ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
    <div class="box-footer text-right">
        <button class="btn btn-primary" onclick="simpanDiagnosa()">Simpan</button>
    </div>
</div>