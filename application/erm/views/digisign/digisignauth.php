<form class="form-horizontal" id="formverifikasi" action="#">
    <input type="hidden" name="kode" id="kode" value="<?= $kode ?>">
    <input type="hidden" name="idjenis" id="idjenis" value="<?= $idjenis ?>">
    <input type="hidden" name="idhasil" id="idhasil" value="<?= $idhasil ?>">
    <input type="hidden" name="idxdaftar" id="idxdaftar" value="<?= $idxdaftar ?>">
    <div class="form-group">
        <div class="col-md-12">
            <div class="input-group input-group-sm">
                <input type="password" name="pin" id="pin" class="form-control pull-right" value="" placeholder="Masukkan PIN">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-primary" id="btnverifikasi" onclick="verifikasiHasil()"><i class="fa fa-certificate" id="iconverifikasi"></i> Proses</button>
                </div>
            </div>
        </div>
        
    </div>
</form>