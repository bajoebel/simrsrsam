<form class="form-horizontal" id="formverifikasi" action="#">
    <input type="hidden" name="kode" id="kode" value="<?= $kode ?>">
    <input type="hidden" name="idjenis" value="<?= $idjenis ?>">
    <input type="hidden" name="idhasil" id="idhasil" value="<?= $idhasil ?>">
    <div class="form-group">
        <label class="control-label col-md-4" for="email">NIK:</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4" for="pwd">Nama:</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4" for="pwd">Email:</label>
        <div class="col-md-8">
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4" for="pwd">No HP:</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Masukkan No HP">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4" for="pwd">PIN:</label>
        <div class="col-md-8">
            <input type="password" class="form-control" id="pin" name="pin" placeholder="Masukkan Pin">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4" for="pwd">Konfirmasi PIN:</label>
        <div class="col-md-8">
            <input type="password" class="form-control" id="konfpin" name="konfpin" placeholder="Masukkan Ulang Pin">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-4 col-md-8">
        <button type="button" class="btn btn-primary" id="btnverifikasi" onclick="createToken()"><span class="fa fa-certificate" id="iconverifikasi"></span> Generate Token</button>
        </div>
    </div>
</form> 