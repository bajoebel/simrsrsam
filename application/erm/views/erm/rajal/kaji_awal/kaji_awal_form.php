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

    .radio,
    .checkbox {
        margin: 5px 0;
    }
</style>
<form role="form" id='form-data-kaji-awal' method="post">
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
        <div class="col-md-12">
            <label for="nama_ttd" class="col-md-2">Nyeri </label>
            <label class="col-sm-2 radio-inline"> <input type="radio">Tidak ada nyeri</label>
            <label class="col-sm-2 radio-inline"> <input type="radio">Nyeri Akut</label>
            <label class="col-sm-2 radio-inline"> <input type="radio">Nyeri Kronis</label>
        </div>
        <div class="col-md-3">
            <label for="">P (Profokatif/Penyebab)</label>
            <input type="text" name="" id="" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="">Q (Quality/Gambaran Nyeri)</label>
            <input type="text" name="" id="" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="">R (Region/Lokasi Nyeri)</label>
            <input type="text" name="" id="" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="">S (Skala Severitas)</label>
            <input type="text" name="" id="" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="">T (Timing/Waktu Nyeri)</label>
            <input type="text" name="" id="" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="">Apakah Nyeri yang di rasakan : </label>
            <div class="row">
                <div class="col-md-6">Menghalangi tidur malam anda</div>
                <div class="col-md-6"><input type="radio" name="" id=""> Ya <input type="radio" name="" id=""> Tidak</div>
            </div>
            <div class="row">
                <div class="col-md-6">Menghalangi tidur malam anda</div>
                <div class="col-md-6"><input type="radio" name="" id=""> Ya <input type="radio" name="" id=""> Tidak</div>
            </div>
            <div class="row">
                <div class="col-md-6">Menghalangi tidur malam anda</div>
                <div class="col-md-6"><input type="radio" name="" id=""> Ya <input type="radio" name="" id=""> Tidak</div>
            </div>
        </div>

    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="nama_ttd" class="col-md-2">Metode </label>
            <label class="col-sm-3 radio-inline"> <input type="radio">Visual Analog Scale (VAS) dewasa</label>
            <label class="col-sm-3 radio-inline"> <input type="radio">Wong Barker Face Scale (WBFS) anak > 3 Tahun </label>
            <label class="col-sm-3 radio-inline"> <input type="radio">FLACC Anak < 3 Tahun</label>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2 control-label">Skala Nyeri</label>
        <div class="col-md-2">
            <input type="number" min="0" max="10" class="form-control">
        </div>
        <div class="col-md-8">
            <label for="">Metode VAS</label>
            <img src="<?= base_url() . "assets/images/erm_images/vas.png" ?>" width="100%" alt="">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-md-2 control-label">Skala Nyeri</label>
        <div class="col-md-2">
            <input type="number" min="0" max="10" class="form-control">
        </div>
        <div class="col-md-8">
            <label for="">Metode Wong Barker Face Scale</label>
            <img src="<?= base_url() . "assets/images/erm_images/bfs.png" ?>" width="100%" alt="">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="" class="col-md-4 control-label">Face Wajah</label>
                <div class="col-md-8">
                    <select name="" id="input" class="form-control">
                        <option value="0">Tidak Ada Ekspresi tertentu untuk senyuman</option>
                        <option value="1">Menyiringai sekali-kali atau mengerutkan dahi, muram, ogah-ogahan</option>
                        <option value="2">Dagu gemetar dan rahang diketap</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-4 control-label"> Legs (Ekstermitas)</label>
                <div class="col-md-8">
                    <select name="" id="input" class="form-control">
                        <option value="0">Posisi normal atau santai</option>
                        <option value="1">Gelisah, resah dan tegang</option>
                        <option value="2">Menendang dan menarik kaki</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-4 control-label"> Activity (Gerakan)</label>
                <div class="col-md-8">
                    <select name="" id="input" class="form-control">
                        <option value="0">Rebahan dengan tenang, posisi normal, bergerak dengan mudah</option>
                        <option value="1">Menggeliat, maju mundur, tegang</option>
                        <option value="2">Menekuk / posisi tubuh meringkuk, kaku dan menyentak</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-4 control-label"> Cry (Tangisan)</label>
                <div class="col-md-8">
                    <select name="" id="input" class="form-control">
                        <option value="0">Tidak ada tangisan,terjaga atau tertidur</option>
                        <option value="1">Mengerang / merengek, gerutan sekali-kali</option>
                        <option value="2">Mengangis tersedu-sedu, menjerit, terisak-isak, menggerutu berulang-ulang</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-4 control-label"> Consolability (Kemampuan ditenangkan)</label>
                <div class="col-md-8">
                    <select name="" id="input" class="form-control">
                        <option value="0">Senang, santai</option>
                        <option value="1">Dapat ditenangkann dengan sentuhan, pelukan atau berbicara, dapat dialihkan</option>
                        <option value="2">Sulit/tidak dapat ditenangkan dengan pelukan, sentuhan, atau distraksi</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h1>Total Skor</h1>
            <h1 class="text-green">0</h1>
            <h3>Tidak Nyeri</h3>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="" class="text-blue">g. Skrining Gizi Awal </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group row">
                <label for="" class="col-md-6 control-label"> Apakah pasien mengalami penurunan berat badan yang tidak direncanakan/tidak diinginkan dalam 6 bulan terakhir</label>
                <div class="col-md-6">
                    <select name="" id="input" class="form-control">
                        <option value="0">Tidak</option>
                        <option value="2">Tidak yakin (ada tanda : baju menjadi longgar)</option>
                        <optgroup label="Ya, ada penurunan BB sebanyak :">
                            <option value="1">1-5 kg</option>
                            <option value="2">6-10 kg</option>
                            <option value="3">11-15 kg</option>
                            <option value="4">15 kg</option>
                        </optgroup>
                        <option value="2">Tidak tahu berapa kg penurunannya</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-6 control-label"> Apakah asupan makan pasien berkurang karena penurunan nafsu makan/ kesulitan menerima makanan</label>
                <div class="col-md-6">
                    <select name="" id="input" class="form-control">
                        <option value="0">Tidak</option>
                        <option value="1">Ya</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h1>Total Skor</h1>
            <h1 class="text-green">0</h1>
            <p>Bila skor>=2, pasien berisiko malnutrisi, konsul ke Ahli Gizi</p>
        </div>
        <div class="col-md-12">
            <p>
                Adaptasi Strong Kids (nilai 1 setiap jawaban “ya”. Beresiko bila bilai lebih dari 1)<br />
                <input type="checkbox"> 1. Apakah pasien tampak kurus?<br />
                <input type="checkbox"> 2. Apakah terdapat penurunan BB selama satu bulan terakhir?<br />
                <input type="checkbox"> 3. Apakah ada diare >5x/hari atau muntah >3x/hari atau asupan turun dalam 1 minggu?<br>
                <input type="checkbox"> Apakah terdapat penyakit atau keadaan yang mengakibatkan pesien beresiko malnutrisi?<br>
            </p>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="" class="text-blue">i. Status fungsional </label><br>
            <p class="text-muted">&nbsp;&nbsp;&nbsp;Aktivitas dan Mobilisasi : (lampirkan formulir pengkajian status fungsional Bartel Index)</p>
        </div>
        <div class="col-md-12">
            <label class="radio-inline">
                <input type="radio" name="tiba_ka[]" value="jalan">Mandiri
            </label>
            <label class="radio-inline">
                <input type="radio" name="tiba_ka[]" value="kursi roda">Perlu Bantuan,sebutkan <input type="text" name="" id="" class="custom-input">
            </label>
            <label class="radio-inline">
                <input type="radio" name="tiba_ka[]" value="brankar"> Ketergantungan penuh
            </label>
        </div>
        <div class="col-md-12">
            <p class="text-muted">&nbsp;&nbsp;&nbsp;(Bila ketergantungan penuh kolaborasi ke DPJP untuk konsul ke rehabilitasi)</p>
            <label for="">&nbsp;&nbsp;&nbsp;Diberitahukan ke dokter</label>
            <label class="radio-inline">

            </label>
            <label class="radio-inline">
                <input type="radio" name="tiba_ka[]" value="kursi roda">Ya, Jam <input type="text" name="" id="" class="custom-input">
            </label>
            <label class="radio-inline">
                <input type="radio" name="tiba_ka[]" value="brankar"> Tidak
            </label>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="" class="text-blue">j. Risiko Cidera / Jatuh </label><br>
            <p class="text-muted">&nbsp;&nbsp;&nbsp;Aktivitas dan Mobilisasi : (lampirkan formulir pengkajian status fungsional Bartel Index)</p>
        </div>
        <div class="col-md-12">
            <label class="radio-inline">
                <input type="radio" name="tiba_ka[]" value="jalan">Tidak
            </label>
            <label class="radio-inline">
                <input type="radio" name="tiba_ka[]" value="jalan">Bila Ya, Risiko jatuh
            </label>
            <label for="">
                <select name="" id="" class="form-control">
                    <option value="">Rendah</option>
                    <option value="">Sedang</option>
                    <option value="">Tinggi</option>
                </select>
            </label><br />
            <label class="radio">
                Jika resiko jatuh sedang atau tinggi dipasang gelang risiko jatuh warna kuning
                <label class="radio-inline">
                    <input type="radio" name="tiba_ka[]" value="jalan">Ya
                </label>
                <label class="radio-inline">
                    <input type="radio" name="tiba_ka[]" value="jalan">Tidak
                </label>
            </label>
            <label class="radio">
                Diberitahukan ke dokter
                <label class="radio-inline">
                    <input type="radio" name="tiba_ka[]" value="jalan">Ya jam <input type="text" name="" id="" class="custom-input">
                </label>
                <label class="radio-inline">
                    <input type="radio" name="tiba_ka[]" value="jalan">Tidak
                </label>
            </label>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="" class="text-blue">k. Pemeriksaan Umum / Fisik </label><br>
        </div>
        <div class="col-md-3">
            <label for="">Keadaan Umum</label>
            <select name="" id="" class="form-control form-control-sm">
                <option value="">== Pilih ==</option>
                <option value="ya">Tampak Tidak Sehat</option>
                <option value="tidak">Tampak Sakit Ringan</option>
                <option value="tidak">Tampak Sakit Sedang</option>
                <option value="tidak">Tampak Sakit Berat</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="">Kesadaran</label>
            <select name="" id="" class="form-control form-control-sm">
                <option value="">== Pilih ==</option>
                <option value="ya">Kompos Mentis</option>
                <option value="tidak">Apatis</option>
                <option value="tidak">Somnolen</option>
                <option value="tidak">Soporo</option>
                <option value="tidak">Koma</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="">GCS</label>
            <div>
                E : <input type="number" name="" id="" class="custom-input w-50">
                M : <input type="text" name="" id="" class="custom-input w-50">
                V : <input type="text" name="" id="" class="custom-input w-50">
            </div>
        </div>
        <div class="col-md-12">
            <label for="">TTV</label>
            <div>
                Sh : <input type="number" name="" id="" class="custom-input w-50">
                Nd : <input type="number" name="" id="" class="custom-input w-50">
                Rr : <input type="number" name="" id="" class="custom-input w-50">
                Sp02 : <input type="number" name="" id="" class="custom-input w-50">
                TD : <input type="number" name="" id="" class="custom-input w-50">
                Down Score : <input type="number" name="" id="" class="custom-input w-50">
            </div>
        </div>
        <div class="col-md-12">
            <label for="">Pemeriksaan : Status generalis & status lokalis ( </label>
            <input type="text" name="" id="" class="form-control">
        </div>
        <div class="col-md-12">
            <label class="radio">
                Pemeriksaan penunjang sebelum rawat inap :
                <label class="checkbox-inline">
                    <input type="checkbox" name="tiba_ka[]" value="jalan">Radiologi<input type="text" name="" id="" class="custom-input">
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" name="tiba_ka[]" value="jalan">Lab<input type="text" name="" id="" class="custom-input">
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" name="tiba_ka[]" value="jalan">Lain-lain<input type="text" name="" id="" class="custom-input">
                </label>
            </label>
            <label class="radio">
                Pemeriksaan penunjang (Laboratorium, Radiologi, dll) dilampirkan
            </label>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="" class="text-blue">l. Kebutuhan Komunikasi dan Edukasi </label><br>
        </div>
        <div class="col-md-4">
            <label for="">Terdapat hambatan dalam pembelajaran</label>
            <select name="" id="" class="form-control">
                <option value="">Tidak</option>
                <option value="">Ya</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Jika Ya</label>
            <select name="" id="" class="form-control">
                <option value="">Pendengaran</option>
                <option value="">Budaya</option>
                <option value="">Penglihatan</option>
                <option value="">Emosi</option>
                <option value="">Kognitif</option>
                <option value="">Bahasa</option>
                <option value="">Fisik</option>
                <option value="">Lainnya</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Jika Ya Sebutkan</label>
            <input type="text" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="">Dibutuhkan Penerjemah</label>
            <select name="" id="" class="form-control">
                <option value="">==Pilih==</option>
                <option value="">Ya</option>
                <option value="">Tidak</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Jika Ya Sebutkan</label>
            <input type="text" name="" id="" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="">Bahasa Isyarat</label>
            <select name="" id="" class="form-control">
                <option value="">==Pilih==</option>
                <option value="">Ya</option>
                <option value="">Tidak</option>
            </select>
        </div>
        <div class="col-md-12">
            <label for="">Kebutuhan Edukasi (Pilih topik edukasi pada kotak yang tersedia)</label>
            <label class="checkbox-inline">
                <input type="checkbox" name="tiba_ka[]" value="jalan">Diagnosa dan manajemen penyakit
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="tiba_ka[]" value="jalan">Obat-obatan / Terapi
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="tiba_ka[]" value="jalan">Diet dan nutrisi
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="tiba_ka[]" value="jalan">Tindakan keperawatan sebutkan<input type="text" name="" id="" class="custom-input w-200">
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="tiba_ka[]" value="jalan">Rehabilitasi
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="tiba_ka[]" value="jalan">Manajemen nyeri
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="tiba_ka[]" value="jalan">Lain-lain sebutkan <input type="text" name="" id="" class="custom-input w-200">
            </label>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="">Diagnosa Keperawatan</label>
            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <label for="">Tindakan Keperawatan</label>
            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
    </div>
    <hr>
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

</form>