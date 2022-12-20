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

    .w-100 {
        width: 100px;
    }

    .w-200 {
        width: 200px;
    }

    .w-300 {
        width: 300px;
    }
</style>
<form role="form" id='form-data-persetujuan' method="post">
    <div class="box-body">
        <input type="hidden" name="idx" value="<?= $detail->idx ?>">
        <input type="hidden" name="nomr" value="<?= $detail->nomr ?>">
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label for="nama_ttd">Poliklinik </label>
            <input type="text" class="form-control" name="poli_ka" placeholder="Enter Text....">
        </div>
        <div class="col-md-6">
            <label for="nama_ttd">DPJP </label>
            <input type="text" class="form-control" name="dpjp_ka" placeholder="Enter Text....">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label for="nama_ttd">Tanggal </label>
            <input type="date" class="form-control" name="tanggal_ka" placeholder="Enter Text....">
        </div>
        <div class="col-md-6">
            <label for="nama_ttd">Jam </label>
            <input type="time" class="form-control" name="jam_ka" placeholder="Enter Text....">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <h4 class="text-center"><b>Data Umum</b></h4>
        </div>
        <div class="col-md-3">
            <label for="nama_ttd">Tiba di Ruang Dengan Cara</label>
        </div>
        <div class="col-md-4">
            <label class="checkbox-inline">
                <input type="checkbox" name="tiba_ka[]" value="jalan">Jalan
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="tiba_ka[]" value="kursi roda">Kursi Roda
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="tiba_ka[]" value="brankar">Brankar
            </label>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            <label for="nama_ttd">Rujukan</label>
        </div>
        <div class="col-md-8">
            <label class="checkbox-inline">
                <input type="checkbox" name="rujukan_ka[]" value="puskesmas">Puskesmas
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="rujukan_ka[]" value="bidan">Bidan
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="rujukan_ka[]" value="lainnya">Lainnya.... <input type="text" name="rukan_lainnya_ka" class='custom-input' placeholder="Enter Text....">
            </label>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <h4 class="text-center"><b>Alasan Masuk</b></h4>
        </div>
        <div class="col-md-12">
            <label for="nama_ttd" class="text-blue">a. Keluhan Utama </label>
            <input type="text" class="form-control" name="poli_ka" placeholder="Enter Text....">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="nama_ttd" class="text-blue">b. Riwayat Kesehatan / Pengobatan / Perawatan Sebelumnya </label><br>
        </div>
        <div class="col-md-3">
            <label for="">Pernah Dirawat</label>
            <select name="" id="" class="form-control form-control-sm">
                <option value="">== Pilih ==</option>
                <option value="ya">Ya</option>
                <option value="tidak">Tidak</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="">&nbsp;Kalau Ya Kapan</label>
            <input type="text" name="" id="input" class="form-control" placeholder="Enter lainnya....." readonly>
        </div>
        <div class="col-md-3">
            <label for="">&nbsp;Kalau Ya Dimana</label>
            <input type="text" name="" id="input" class="form-control" placeholder="Enter lainnya....." readonly>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            <label for="">&nbsp;Diagnosis</label>
            <input type="text" name="" id="input" class="form-control" placeholder="Enter lainnya.....">
        </div>
        <div class="col-md-6">
            <label for=""><input type="checkbox" name="" id="">&nbsp; Alat Implant Yang terpasang</label>
            Jika Ya Sebutkan <input type="text" name="" id="input" class="form-control" placeholder="Sebutkan di sini" readonly>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label for="">Riwayat Operasi</label>
            <input type="text" name="" id="input" class="form-control" placeholder="Enter lainnya.....">
        </div>
        <div class="col-md-4">
            <label for="">Operasi Tahun</label>
            <select class="form-control">
                <option>Select Year</option>
                <?php $years = range(date('Y'), 1970);
                foreach ($years as $year) : ?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="nama_ttd" class="text-blue">c. Riwayat Penyakit Dahulu </label><br>
        </div>
        <div class="col-md-4">
            <label for="">&nbsp;Pilih Bisa Lebih Dari 1</label>
            <select class="form-control select2" multiple="multiple" data-placeholder="Riwayat Penyakit Dahulu..." style="width: 100%;">
                <option>Asma</option>
                <option>Jantung</option>
                <option>Hipertensi</option>
                <option>DM</option>
                <option>Tiroid</option>
                <option>Epilepsi</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Riwayat Operasi</label>
            <input type="text" name="" id="input" class="form-control" placeholder="Enter lainnya.....">
        </div>
        <div class="col-md-4">
            <label for="">Operasi Tahun</label>
            <select class="form-control">
                <option>Select Year</option>
                <?php $years = range(date('Y'), 1970);
                foreach ($years as $year) : ?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="nama_ttd" class="text-blue">d. Riwayat Penyakit Keluarga </label>
            <select class="form-control select2" multiple="multiple" data-placeholder="Riwayat Penyakit Dahulu..." style="width: 100%;">
                <option>Kanker</option>
                <option>Penyakit Hati</option>
                <option>Hipertensi</option>
                <option>DM</option>
                <option>Penyakit Ginjal</option>
                <option>Penyakit Jiwa</option>
                <option>Kelainan Bawaan</option>
                <option>Hamil Kembar</option>
                <option>TBC</option>
                <option>Epilepsi</option>
                <option>Alergi</option>
                <option>Lain-lain</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="nama_ttd" class="text-blue">e. Riwayat Psikososial dan Spiritual </label><br>
        </div>
        <div class="col-md-6">
            <label for="nama_ttd" class="text-green">&nbsp;a) Status Psikologis </label>
            <select class="form-control select2" multiple="multiple" data-placeholder="Riwayat Penyakit Dahulu..." style="width: 100%;">
                <option>Cemas</option>
                <option>Takut</option>
                <option>Marah</option>
                <option>Sedih</option>
                <option>Kecendrungan Bunuh Diri</option>
                <option>Lainnya</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="nama_ttd">&nbsp;jika lainnya sebutkan</label>
            <input type="text" class="form-control  ">
        </div>
        <div class="col-md-12">
            <label for="nama_ttd" class="text-green">&nbsp;b) Status Mental</label>
            <div class="checkbox" style="margin-top: 0;">
                <label><input type="checkbox" value="">Sadar dan orientasi baik</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="">Ada masalah prilaku, Sebuatkan <input type="text" class="custom-input w-300"></label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" value="">Perilaku kekerasan yang dialami pasien sebelumnya <input type="text" class="custom-input w-300"></label>
            </div>
        </div>
        <div class="col-md-12">
            <label for="nama_ttd" class="text-green">&nbsp;c) Kultural</label>
        </div>
        <div class="col-md-4">
            <label>Hubungan pasien dengan anggota keluarga </label>
            <label class="radio-inline"><input type="radio" value=""> Baik</label>
            <label class="radio-inline"><input type="radio" value=""> Tidak Baik</label>
        </div>
        <div class="col-md-8">
            <label for="">Kerabat terdekat yang dapat dihubungi</label>
            <div class="row">
                <div class="col-xs-4">
                    Nama :
                    <input type="text" class="form-control" placeholder="">
                </div>
                <div class="col-xs-4">
                    Hubungan :
                    <input type="text" class="form-control" placeholder="">
                </div>
                <div class="col-xs-4">
                    Telepon :
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:5px">
            <label for="">Nilai-nilai dan kepercayaan yang dianut oleh pasien</label>
            <input type="text" class="form-control" placeholder="">
        </div>
        <div class="col-md-6">
            <label for="nama_ttd" class="text-green">&nbsp;d) Status Ekonomi dan Sosial </label>
            <select class="form-control select2" multiple="multiple" data-placeholder="Riwayat Penyakit Dahulu..." style="width: 100%;">
                <option>Asuransi</option>
                <option>Jaminan</option>
                <option>Biaya sendiri</option>
                <option>Lainnya...</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="nama_ttd">&nbsp;jika lainnya sebutkan</label>
            <input type="text" class="form-control  ">
        </div>
        <div class="col-md-12">
            <label for="nama_ttd" class="text-green">e) Status Spiritual </label>
            <div class="row">
                <div class="col-md-6">
                    Kegiatan Keagamaan yang biasa dilakukan :
                    <input type="text" class="form-control" placeholder="">
                </div>
                <div class="col-md-6">
                    Kegiatan spiritual yang dibutuhkan selama perawatan :
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <label for="nama_ttd" class="text-green">&nbsp;f) Budaya dan nilai-nilai yang di anut </label>
            <input type="text" class="form-control" placeholder="">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="nama_ttd" class="text-blue">f. Riwayat Alergi </label>
        </div>
        <div class="col-md-12">
            <label for="nama_ttd" class="col-md-2">a. Obat </label>
            <label class="col-sm-2 radio-inline"> <input type="radio">Tidak</label>
            <label class="col-sm-2 radio-inline"> <input type="radio">Ya Sebutkan </label>
            <label for="nama_ttd" class="col-md-2"><input type="text" class='custom-input'> </label>
        </div>
        <div class="col-md-12">
            <label for="nama_ttd" class="col-md-2">b. Makanan </label>
            <label class="col-sm-2 radio-inline"> <input type="radio">Tidak</label>
            <label class="col-sm-2 radio-inline"> <input type="radio">Ya Sebutkan </label>
            <label for="nama_ttd" class="col-md-2"><input type="text" class='custom-input'> </label>
        </div>
        <div class="col-md-12">
            <label for="nama_ttd" class="col-md-2">b. Lain-lain </label>
            <label for="nama_ttd" class="col-md-2"><input type="text" class='custom-input'> </label>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="nama_ttd" class="text-blue">g. Skrining Nyeri </label>
        </div>
    </div>
</form>