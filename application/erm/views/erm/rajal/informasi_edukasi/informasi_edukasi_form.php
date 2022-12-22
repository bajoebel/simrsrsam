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
        <b>Asesmen Kemampuan, Kemauan Belajar</b>
        <p class="text-blue">Pengkajiaan umum</p>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Bahasa</label>
                        <select class="form-control select2-tag">
                            <option>Indonesia</option>
                            <option>Daerah</option>
                            <option>Isyarat</option>
                            <option>Lainnya...</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <label for="">Bahasa daerah / lain-lain sebutkan</label>
                        <input type="text" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <label for="">Kebutuhan Penerjemah</label>
                <div class="radio">
                    <label for="" class="radio-inline">
                        <input type="radio" name="">Ya
                    </label>
                    <label for="" class="radio-inline">
                        <input type="radio" name="">Tidak
                    </label>
                </div>
            </div>
            <div class="col-md-3">
                <label for="">Agama</label>
                <select name="" id="" class="form-control">
                    <option value="1">Islam</option>
                    <option value="2">Kristen (Protestan)</option>
                    <option value="3">Katholik</option>
                    <option value="4">Hindu</option>
                    <option value="5">Budha</option>
                    <option value="6">Konghocu</option>
                    <option value="7">Penghayat</option>
                    <option value="8">Lain-lain</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="">Pendidikan Pasien</label>
                <select name="" id="" class="form-control">
                    <option value="1">Islam</option>
                    <option value="2">Kristen (Protestan)</option>
                    <option value="3">Katholik</option>
                    <option value="4">Hindu</option>
                    <option value="5">Budha</option>
                    <option value="6">Konghocu</option>
                    <option value="7">Penghayat</option>
                    <option value="8">Lain-lain</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="">Kesediaan Menerima Informasi</label>
                <div class="radio">
                    <label for="" class="radio-inline">
                        <input type="radio" name="">Bersedia
                    </label>
                    <label for="" class="radio-inline">
                        <input type="radio" name="">Tidak Bersedia (alasan)
                    </label>
                    <label for="" class="radio-inline">
                        <input type="text" class="custom-input w-100">
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <label for="">Kemampuan Membaca</label>
                <div class="radio">
                    <label for="" class="radio-inline">
                        <input type="radio" name="">Ya
                    </label>
                    <label for="" class="radio-inline">
                        <input type="radio" name="">Tidak
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <label for="">Keyakinan dan Nilai-nilai</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="">Keterbatasan Fisik dan Kognitif</label>
                <div class="row">
                    <div class="col-md-6">
                        <select name="" id="" class="form-control">
                            <option value="1">Tidak ada</option>
                            <option value="2">Penglihatan terganggu</option>
                            <option value="3">Pendengaran terganggu</option>
                            <option value="3">Gangguan bicara</option>
                            <option value="3">Fisik lemah</option>
                            <option value="3">Kognitif terbatas</option>
                            <option value="3">Lain-lain....</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class='custom-input' placeholder="lainnya...">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label for="">Hambatan Emosional dan Motivasi</label>
                <div class="row">
                    <div class="col-md-6">
                        <select name="" id="" class="form-control">
                            <option value="1">Tidak ada</option>
                            <option value="2">Motivasi Kurang</option>
                            <option value="3">Emosional Terganggu</option>
                            <option value="3">Lain-lain...</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class='custom-input' placeholder="lainnya...">
                    </div>
                </div>
            </div>
        </div>
        <p class="text-blue">Assesment Kebutuhan Edukasi</p>
        <div class="form-group row">
            <div class="col-md-8">
                <label for="">Pilih Lebih Dari Satu</label>
                <div class="row">
                    <div class="col-md-8">
                        <select name="" id="" name="satu[]" class="form-control select2" multiple="multiple">
                            <option value="">Asuhan Medis</option>
                            <option value="">Asuhan Keperawatan</option>
                            <option value="">Pengobatan</option>
                            <option value="">Asuhan Gizi</option>
                            <option value="">Manajemen nyeri</option>
                            <option value="">Rehabilitasi</option>
                            <option value="">Penggunaan alat-alat medis</option>
                            <option value="">Hand Hygiene</option>
                            <option value="">Rohani</option>
                            <option value="">Pendaftaran dan Admisi</option>
                            <option value="">Prosedur dan Perawatan</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="" id="" class="form-control" placeholder="Lainnya...">
                    </div>
                </div>
            </div>
        </div>
        <p class="text-blue">Perencanaan Edukasi</p>
        <div class="form-group row">
        </div>
    </div>
</form>