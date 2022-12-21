<style>
    .custom-input {
        padding: 2px 2px;
        margin: 0 2px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .custom-input:focus {
        border: 1px solid #555 !important;
    }

    .w-25 {
        width: 25px
    }

    .w-50 {
        width: 50px;
    }

    .w-100 {
        width: 100px;
    }

    .w-200 {
        width: 200px;
    }

    .w-300 {
        width: 300px;
    }

    .mt-1 {
        margin-top: 5px;
    }

    .ml-1 {
        margin-left: 5px;
    }

    .radio,
    .checkbox {
        margin: 5px 0;
    }
</style>
<form role="form" id='form-data-kaji-awal' method="post">
    <div class="box-body">
        <input type="hidden" name="idx" value="<?= $detail->idx ?>">
        <input type="hidden" name="nomr" value="<?= $detail->nomr ?>">
        <div class="form-group row">
            <div class="col-md-2">
                <label for="">Hari</label>
                <select name="" id="" class="form-control">
                    <option value="senin">Senin</option>
                    <option value="selasa">Selasa</option>
                    <option value="rabu">Rabu</option>
                    <option value="kamis">Kamis</option>
                    <option value="jumat">Jumat</option>
                    <option value="sabtu">Sabtu</option>
                    <option value="minggu">Minggu</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="">Tanggal</label>
                <input type="date" name="" id="" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="">Jam</label>
                <input type="time" name="" id="" class="form-control">
            </div>
        </div>
        <b>Anamnesis</b>
        <div class="form-group row">
            <div class="col-md-2">
                <input type="checkbox" class="form-checkbox"> Auto
            </div>
            <div class="col-md-8">
                auto detail
                <textarea name="" id="" rows="3" class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                <input type="checkbox" class="form-checkbox"> Allo
            </div>
            <div class="col-md-8">
                allo detail
                <textarea name="" id="" rows="3" class="form-control"></textarea>
            </div>
        </div>
        <b>Pemerikasaan Fisik</b>
        <div class="form-group row">
            <div class="col-md-4">
                <table>
                    <tr>
                        <td width="100px">TD</td>
                        <td><input type="text" name="" id="" class="custom-input"></td>
                        <td>mmHG</td>
                    </tr>
                    <tr>
                        <td>Nadi</td>
                        <td><input type="text" name="" id="" class="custom-input"></td>
                        <td>x/i</td>
                    </tr>
                    <tr>
                        <td>Pernapasan</td>
                        <td><input type="text" name="" id="" class="custom-input"></td>
                        <td>x/i</td>
                    </tr>
                    <tr>
                        <td>Suhu</td>
                        <td><input type="text" name="" id="" class="custom-input"></td>
                        <td>&deg;C</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <textarea name="" id="" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <b>Diagnosis Kerja</b>
        <div class="form-group row">
            <div class="col-md-12">
                <textarea name="" id="" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <b>Diagnosis Banding</b>
        <div class="form-group row">
            <div class="col-md-12">
                <textarea name="" id="" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <b>Pemeriksaan Penunjang</b>
        <div class="form-group row">
            <div class="col-md-12">
                <textarea name="" id="" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <b>THERAPI/TINDAKAN</b>
        <div class="form-group row">
            <div class="col-md-12">
                <textarea name="" id="" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <label for="">Kontrol Ulang</label>
            </div>
            <div class="col-md-12">
                <label class="checkbox-inline">
                    <input type="checkbox" name="rujukan_ka[]" value="puskesmas">Kembali Kontrol
                </label>
                <label for="" class="checkbox-inline">Hari/Tanggal</label>
                <label class="checkbox-inline">
                    <select name="" id="" class="form-control">
                        <option value="senin">Senin</option>
                        <option value="selasa">Selasa</option>
                        <option value="rabu">Rabu</option>
                        <option value="kamis">Kamis</option>
                        <option value="jumat">Jumat</option>
                        <option value="sabtu">Sabtu</option>
                        <option value="minggu">Sabtu</option>
                    </select>
                </label>
                <label class="checkbox-inline">
                    <input type="date" name="" id="" class="form-control" placeholder="Tanggal....">
                </label>
                <label class="checkbox-inline">
                    <input type="time" name="" id="" class="form-control" placeholder="Jam....">
                </label>
                <label class="checkbox-inline">
                    <select name="" id="" class="form-control">
                        <option value="senin">Ruang 1</option>
                        <option value="selasa">Ruang 2</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <label for="">Telah di jelaskan kepada</label>
                <label class="radio-inline">
                    <input type="radio" name="tiba_ka[]" value="jalan">Pasien
                </label>
                <label class="radio-inline">
                    <input type="radio" name="tiba_ka[]" value="jalan">Keluarga, Hubungan <input type="text" name="" id="" class="custom-input w-200">
                </label>
            </div>
        </div>
    </div>
</form>