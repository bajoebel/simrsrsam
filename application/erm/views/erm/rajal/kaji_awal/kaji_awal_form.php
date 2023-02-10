<style>
    .custom-input {
        padding: 5px 5px;
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
<!-- <?php print_r($detail) ?> -->
<input type="hidden" name="idx_ka" value="<?= $detail->idx ?>">
<input type="hidden" name="nomr_ka" value="<?= $detail->nomr ?>">
<input type="hidden" name="nama_ka" value="<?= $detail->nama_pasien ?>">
<input type="hidden" name="user_daftar_ka" value="<?= $detail->user_daftar ?>">
<input type="hidden" name="cppt_id_ka" value="">

<div class="form-group row">
    <div class="col-md-6">
        <label for="nama_ttd">Poliklinik </label>
        <select name="poli_ka" id="poli_ka" class="form-control select2" style="width:100%">
            <option value="">== Pilih ==</option>
            <?php foreach ($ruang as $r) { ?>
                <option value="<?= $r->idx ?>"><?= $r->ruang ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-md-6">
        <label for="nama_ttd">DPJP </label>
        <select name="dpjp_ka" id="dpjp_ka" class="form-control select2" style="width:100%">
            <option value="">== Pilih ==</option>
            <?php foreach ($dpjp as $r) { ?>
                <option value="<?= $r->NRP ?>"><?= $r->pgwNama ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6">
        <label for="nama_ttd">Tanggal </label>
        <input type="date" class="form-control" name="tgl_ka" placeholder="Enter Text...." value="<?= date("Y-m-d") ?>">
    </div>
    <div class="col-md-6">
        <label for="nama_ttd">Jam </label>
        <input type="time" class="form-control" name="jam_ka" placeholder="Enter Text...." value="<?= date("h:i") ?>">
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
        <label class="radio-inline">
            <input type="radio" name="tiba_ka" class="tiba_ka" value="jalan">Jalan
        </label>
        <label class="radio-inline">
            <input type="radio" name="tiba_ka" class="tiba_ka" value="kursi roda">Kursi Roda
        </label>
        <label class="radio-inline">
            <input type="radio" name="tiba_ka" class="tiba_ka" value="brankar">Brankar
        </label>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label for="nama_ttd">Rujukan</label>
    </div>
    <div class="col-md-8">
        <label class="radio-inline">
            <input type="radio" name="rujukan_ka" value="puskesmas">Puskesmas
        </label>
        <label class="radio-inline">
            <input type="radio" name="rujukan_ka" value="bidan">Bidan
        </label>
        <label class="radio-inline">
            <input type="radio" name="rujukan_ka" class="rujukan_ka_lainnya" value="lainnya">Lainnya.... <input type="text" name="rujukan_lainnya_ka" class='custom-input' placeholder="Enter Text...." readonly>
        </label>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <h4 class="text-center"><b>Alasan Masuk</b></h4>
    </div>
    <div class="col-md-12">
        <label for="keluhan_ka" class="text-blue">a. Keluhan Utama </label>
        <input type="text" class="form-control" name="keluhan_ka" id="keluhan_ka" placeholder="Enter Text....">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label for="" class="text-blue">b. Riwayat Kesehatan / Pengobatan / Perawatan Sebelumnya </label><br>
    </div>
    <div class="col-md-3">
        <label for="">Pernah Dirawat</label>
        <select name="dirawat_ka" id="dirawat_ka" class="form-control form-control-sm">
            <option value="">== Pilih ==</option>
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="">&nbsp;Kalau Ya Kapan</label>
        <input type="text" name="kapan_dirawat_ka" id="kapan_dirawat_ka" class="form-control" placeholder="Diisi dengan text" readonly>
    </div>
    <div class="col-md-3">
        <label for="">&nbsp;Kalau Ya Dimana</label>
        <input type="text" name="dimana_dirawat_ka" id="dimana_dirawat_ka" id="input" class="form-control" placeholder="Enter lainnya....." readonly>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        <label for="">&nbsp;Diagnosis</label>
        <input type="text" name="diagnosis_ka" id="diagnosis_ka" class="form-control" placeholder="Enter lainnya.....">
    </div>
    <div class="col-md-6">
        <!-- default implant 0 -->
        <label for=""><input type="checkbox" name="implant_ka" id="implant_ka" value="1">&nbsp; Alat Implant Yang terpasang</label>
        Jika Ya Sebutkan <input type="text" name="implant_detail_ka" id="implant_detail_ka" class="form-control" placeholder="Sebutkan di sini" readonly>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label for="nama_ttd" class="text-blue">c. Riwayat Penyakit Dahulu </label><br>
    </div>
    <div class="col-md-4">
        <label for="">&nbsp;Pilih Bisa Lebih Dari 1</label>
        <select class="form-control select2" name="riwayat_sakit_ka[]" id="riwayat_sakit_ka" multiple="multiple" data-placeholder="Riwayat Penyakit Dahulu..." style="width: 100%;">
            <option value="asma">Asma</option>
            <option value="jantung">Jantung</option>
            <option value="hipertensi">Hipertensi</option>
            <option value="dm">DM</option>
            <option value="tiroid">Tiroid</option>
            <option value="epilepsi">Epilepsi</option>
            <option value="tidak ada">Tidak Ada</option>
        </select>
    </div>
    <div class="col-md-4">
        <label for="">Riwayat Operasi</label> <input type="checkbox" name="riwayat_operasi_cek_ka" id="riwayat_operasi_cek_ka"> <small>Ceklist Jika Ya</small>
        <input type="text" name="riwayat_operasi_ka" id="riwayat_operasi_ka" class="form-control" value="tidak ada" readonly>
    </div>
    <div class="col-md-4">
        <label for="">Operasi Tahun</label>
        <select class="form-control" name="riwayat_operasi_tahun_ka" id="riwayat_operasi_tahun_ka" disabled>
            <option value="0000">Select Year</option>
            <?php $years = range(date('Y'), 1970);
            foreach ($years as $year) : ?>
                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label for="riwayat_sakit_keluarga" class="text-blue">d. Riwayat Penyakit Keluarga </label>
        <select class="form-control select2" name="riwayat_sakit_keluarga_ka[]" id="riwayat_sakit_keluarga_ka" multiple="multiple" data-placeholder="Riwayat Penyakit Keluarga..." style="width: 100%;">
            <option value="kanker">Kanker</option>
            <option value="penyakit hati">Penyakit Hati</option>
            <option value="hipertensi">Hipertensi</option>
            <option value="dm">DM</option>
            <option value="penyakit ginjal">Penyakit Ginjal</option>
            <option value="penyakit jiwa">Penyakit Jiwa</option>
            <option value="kelainan bawaan">Kelainan Bawaan</option>
            <option value="hamil kembar">Hamil Kembar</option>
            <option value="tbc">TBC</option>
            <option value="epilepsi">Epilepsi</option>
            <option value="alergi">Alergi</option>
            <option value="lain-lain">Lain-lain</option>
            <option value="tidak ada">Tidak Ada</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label for="nama_ttd" class="text-blue">e. Riwayat Psikososial dan Spiritual </label><br>
    </div>
    <div class="col-md-6">
        <label for="nama_ttd" class="text-green">&nbsp;a) Status Psikologis <small>Bisa diisi lainnya</small> </label>
        <select class="form-control select2-tag" name="riwayat_psikologis_ka[]" id="riwayat_psikologis_ka" multiple="multiple" data-placeholder="Riwayat Penyakit Dahulu..." style="width: 100%;">
            <option value="cemas">Cemas</option>
            <option value="takut">Takut</option>
            <option value="marah">Marah</option>
            <option value="sedih">Sedih</option>
            <option value="kecendrungan bunuh diri">Kecendrungan Bunuh Diri</option>
            <option value="lainnya">Lainnya...</option>
            <option value="tidak ada">Tidak Ada</option>

        </select>
    </div>
    <div class="col-md-12">
        <label for="nama_ttd" class="text-green">&nbsp;b) Status Mental</label>
        <div class="checkbox" style="margin-top: 0;">
            <label><input type="checkbox" name="status_mental_sadar_ka" value="1">Sadar dan orientasi baik</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="status_mental_prilaku_ka" value="">Ada masalah prilaku, Sebutkan <input type="text" class="custom-input w-300" name="status_mental_prilaku_detail_ka" readonly></label>
        </div>
        <div class="checkbox">
            <label class="mt-1"><input type="checkbox" name="status_mental_keras_ka" value="1">Perilaku kekerasan yang dialami pasien sebelumnya <input type="text" name="status_mental_keras_detail_ka" class="custom-input w-300" readonly></label>
        </div>
    </div>
    <div class="col-md-12">
        <label for="nama_ttd" class="text-green">&nbsp;c) Kultural</label>
    </div>
    <div class="col-md-4">
        <label>Hubungan pasien dengan anggota keluarga </label><br>
        <label class="radio-inline"><input type="radio" name="kultural_ka" value="1" checked> Baik</label>
        <label class="radio-inline"><input type="radio" name="kultural_ka" value="0"> Tidak Baik</label>
    </div>
    <div class="col-md-8">
        <label for="">Kerabat terdekat yang dapat dihubungi</label>
        <div class="row">
            <div class="col-xs-4">
                Nama :
                <input type="text" name="kultural_nama_ka" id="kultural_nama_ka" class="form-control" placeholder="">
            </div>
            <div class="col-xs-4">
                Hubungan :
                <input type="text" name="kultural_hubungan_ka" id="kultural_hubungan_ka" class="form-control" placeholder="">
            </div>
            <div class="col-xs-4">
                Telepon :
                <input type="text" name="kultural_phone_ka" id="kultural_phone_ka" class="form-control" placeholder="">
            </div>
        </div>
    </div>
    <div class="col-md-12" style="margin-top:5px">
        <label for="">Nilai-nilai dan kepercayaan yang dianut oleh pasien</label>
        <input type="text" name="nilai_kepercayaan_ka" id="nilai_kepercayaan_ka" class="form-control" placeholder="">
    </div>
    <div class="col-md-6">
        <label for="nama_ttd" class="text-green">&nbsp;d) Status Ekonomi dan Sosial </label>
        <select class="form-control select2-tag" name="status_ekonomi_ka[]" id="status_ekonomi_ka" multiple="multiple" data-placeholder="Status Ekonomi Sosial..." style="width: 100%;">
            <option name="asuransi">Asuransi</option>
            <option name="jaminan">Jaminan</option>
            <option name="biaya sendiri">Biaya sendiri</option>
            <option name="lainnya">Lainnya...</option>
        </select>
    </div>
    <div class="col-md-12">
        <label for="nama_ttd" class="text-green">e) Status Spiritual </label>
        <div class="row">
            <div class="col-md-6">
                Kegiatan Keagamaan yang biasa dilakukan :
                <input type="text" name="spiritual_biasa_ka" id="spiritual_biasa_ka" class="form-control" value="tidak ada">
            </div>
            <div class="col-md-6">
                Kegiatan spiritual yang dibutuhkan selama perawatan :
                <input type="text" name="spiritual_butuh_ka" id="spiritual_butuh_ka" class="form-control" value="tidak ada">
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <label for="nama_ttd" class="text-green">&nbsp;f) Budaya dan nilai-nilai yang di anut </label>
        <input type="text" name="budaya_ka" id="budaya_ka" class="form-control" value="tidak ada">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label for="nama_ttd" class="text-blue">f. Riwayat Alergi </label>
    </div>
    <div class="col-md-12">
        <label for="nama_ttd" class="col-md-2">a. Obat </label>
        <label class="col-sm-2 radio-inline"> <input type="radio" name="obat_ka" value="0">Tidak</label>
        <label class="col-sm-2 radio-inline"> <input type="radio" name="obat_ka" value="1">Ya Sebutkan </label>
        <label for="nama_ttd" class="col-md-2"><input type="text" name="obat_detail_ka" class='custom-input' readonly> </label>
    </div>
    <div class="col-md-12">
        <label for="nama_ttd" class="col-md-2">b. Makanan </label>
        <label class="col-sm-2 radio-inline"> <input type="radio" name="makanan_ka" value="0">Tidak</label>
        <label class="col-sm-2 radio-inline"> <input type="radio" name="makanan_ka" value="1">Ya Sebutkan </label>
        <label for="nama_ttd" class="col-md-2"><input type="text" class='custom-input' name="makanan_detail_ka" readonly> </label>
    </div>
    <div class="col-md-12">
        <label for="nama_ttd" class="col-md-2">b. Lain-lain </label>
        <label for="nama_ttd" class="col-md-2"><input type="text" class='custom-input' name="riwayat_lain_ka"> </label>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label for="nama_ttd" class="text-blue">g. Skrining Nyeri </label>
    </div>
    <div class="col-md-12">
        <label for="nama_ttd" class="col-md-2">Nyeri </label>
        <label class="col-sm-2 radio-inline"> <input type="radio" name="nyeri_ka" value="tidak ada nyeri">Tidak ada nyeri</label>
        <label class="col-sm-2 radio-inline"> <input type="radio" name="nyeri_ka" value="nyeri akut">Nyeri Akut</label>
        <label class="col-sm-2 radio-inline"> <input type="radio" name="nyeri_ka" value="nyeri kronis">Nyeri Kronis</label>
    </div>
</div>
<div class="form-group row skrining_nyeri">
    <div class="col-md-3">
        <label for="">P (Profokatif/Penyebab)</label>
        <input type="text" name="profokatif_ka" id="profokatif_ka" class="form-control">
    </div>
    <div class="col-md-3">
        <label for="">Q (Quality/Gambaran Nyeri)</label>
        <input type="text" name="quality_ka" id="quality_ka" class="form-control">
    </div>
    <div class="col-md-3">
        <label for="">R (Region/Lokasi Nyeri)</label>
        <input type="text" name="region_ka" id="region_ka" class="form-control">
    </div>
    <div class="col-md-3">
        <label for="">S (Skala Severitas)</label>
        <input type="text" name="skala_ka" id="skala_ka" class="form-control">
    </div>
    <div class="col-md-3">
        <label for="">T (Timing/Waktu Nyeri)</label>
        <input type="text" name="timing_ka" id="timing_ka" class="form-control">
    </div>
    <div class="col-md-6">
        <label for="">Apakah Nyeri yang di rasakan : </label>
        <div class="row">
            <div class="col-md-6">Menghalangi tidur malam anda</div>
            <div class="col-md-6"><input type="radio" name="tidur_malam_ka" value="1"> Ya <input type="radio" name="tidur_malam_ka" value="0"> Tidak</div>
        </div>
        <div class="row">
            <div class="col-md-6">Menghalangi anda beraktifitas</div>
            <div class="col-md-6"><input type="radio" name="halangan_aktivitas_ka" value="1"> Ya <input type="radio" name="halangan_aktivitas_ka" value="0"> Tidak</div>
        </div>
        <div class="row">
            <div class="col-md-6">Sakit dirasakan setiap hari</div>
            <div class="col-md-6"><input type="radio" name="nyeri_sakit_ka" value="1"> Ya <input type="radio" name="nyeri_sakit_ka" value="0"> Tidak</div>
        </div>
    </div>

</div>
<div class="form-group row skrining_nyeri">
    <div class="col-md-12">
        <label for="nama_ttd" class="col-md-2">Metode </label>
        <label class="col-sm-3 radio-inline"> <input type="radio" name="metode_ka" value="1">Visual Analog Scale (VAS) dewasa</label>
        <label class="col-sm-3 radio-inline"> <input type="radio" name="metode_ka" value="2">Wong Barker Face Scale (WBFS) anak > 3 Tahun </label>
        <label class="col-sm-3 radio-inline"> <input type="radio" name="metode_ka" value="3">FLACC Anak < 3 Tahun</label>
    </div>
</div>
<div class="form-group row skrining_nyeri" id="vas_pilih">
    <label for="" class="col-md-2 control-label">Skala Nyeri</label>
    <div class="col-md-2">
        <input type="number" min="0" max="10" name="skala_vas_ka" id="skala_vas_ka" class="form-control">
    </div>
    <div class="col-md-8">
        <label for="">Metode VAS</label>
        <img src="<?= base_url() . "assets/images/erm_images/vas.png" ?>" width="100%" alt="">
        <p><span>0 : Nyeri</span> <span style='margin-left:10px'>1-3 : Nyeri Ringan</span> <span style='margin-left:10px'> 4-6 : Nyeri Sedang</span> <span style='margin-left:10px'> 7-10:Nyeri Berat</span></p>
    </div>
</div>
<div class="form-group row skrining_nyeri" id="wbfs_pilih">
    <label for="" class="col-md-2 control-label">Skala Nyeri</label>
    <div class="col-md-2">
        <input type="number" min="0" max="10" name="skala_wbfs_ka" id="skala_wbfs_ka" class="form-control">
    </div>
    <div class="col-md-8">
        <label for="">Metode Wong Barker Face Scale</label>
        <img src="<?= base_url() . "assets/images/erm_images/bfs.png" ?>" width="100%" alt="">
    </div>
</div>
<div class="row skrining_nyeri" id="flacc_pilih">
    <div class="col-md-6">
        <div class="form-group row">
            <label for="" class="col-md-4 control-label">Face Wajah</label>
            <div class="col-md-8">
                <select name="wajah_ka" id="wajah_ka" class="form-control">
                    <option value="0">Tidak Ada Ekspresi tertentu untuk senyuman</option>
                    <option value="1">Menyiringai sekali-kali atau mengerutkan dahi, muram, ogah-ogahan</option>
                    <option value="2">Dagu gemetar dan rahang diketap</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-4 control-label"> Legs (Ekstermitas)</label>
            <div class="col-md-8">
                <select name="leg_ka" id="leg_ka" class="form-control">
                    <option value="0">Posisi normal atau santai</option>
                    <option value="1">Gelisah, resah dan tegang</option>
                    <option value="2">Menendang dan menarik kaki</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-4 control-label"> Activity (Gerakan)</label>
            <div class="col-md-8">
                <select name="gerakan_ka" id="gerakan_ka" class="form-control">
                    <option value="0">Rebahan dengan tenang, posisi normal, bergerak dengan mudah</option>
                    <option value="1">Menggeliat, maju mundur, tegang</option>
                    <option value="2">Menekuk / posisi tubuh meringkuk, kaku dan menyentak</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-4 control-label"> Cry (Tangisan)</label>
            <div class="col-md-8">
                <select name="tangis_ka" id="tangis_ka" class="form-control">
                    <option value="0">Tidak ada tangisan,terjaga atau tertidur</option>
                    <option value="1">Mengerang / merengek, gerutan sekali-kali</option>
                    <option value="2">Mengangis tersedu-sedu, menjerit, terisak-isak, menggerutu berulang-ulang</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-4 control-label"> Consolability (Kemampuan ditenangkan)</label>
            <div class="col-md-8">
                <select name="kemampuan_ka" id="kemampuan_ka" class="form-control">
                    <option value="0">Senang, santai</option>
                    <option value="1">Dapat ditenangkann dengan sentuhan, pelukan atau berbicara, dapat dialihkan</option>
                    <option value="2">Sulit/tidak dapat ditenangkan dengan pelukan, sentuhan, atau distraksi</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h1>Total Skor</h1>
        <h1 class="text-green" id="skor_flacc">0</h1>
        <h3 id="skor_flacc_detail">0: tidak nyeri 1-3 nyeri ringan 4-6 : nyeri sedang 7-10 : nyeri berat</h3>
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
                <select name="gizi_ka" id="gizi_ka" class="form-control" placeholder="Silahkan Pilih....">
                    <option value="1">Tidak</option>
                    <option value="2">Tidak yakin (ada tanda : baju menjadi longgar)</option>
                    <optgroup label="Ya, ada penurunan BB sebanyak :">
                        <option value="3">1-5 kg</option>
                        <option value="4">6-10 kg</option>
                        <option value="5">11-15 kg</option>
                        <option value="6">15 kg</option>
                    </optgroup>
                    <option value="7">Tidak tahu berapa kg penurunannya</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-md-6 control-label"> Apakah asupan makan pasien berkurang karena penurunan nafsu makan/ kesulitan menerima makanan</label>
            <div class="col-md-6">
                <select name="gizi_makan_ka" id="gizi_makan_ka" class="form-control">
                    <option value="8">Tidak</option>
                    <option value="9">Ya</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <h1>Total Skor</h1>
        <h1 class="text-green" id="skor_gizi">0</h1>
        <p>Bila skor>=2, pasien berisiko malnutrisi, konsul ke Ahli Gizi</p>
    </div>
    <div class="col-md-12">
        <p>
            Adaptasi Strong Kids (nilai 1 setiap jawaban “ya”. Beresiko bila bilai lebih dari 1)<br />
            ceklis jika jawaban ya<br />
            <input type="checkbox" name="strong_kids_ka[]" value="pasien tampak kurus"> 1. Apakah pasien tampak kurus?<br />
            <input type="checkbox" name="strong_kids_ka[]" value="terdapat penurunan BB selama satu bulan terakhir"> 2. Apakah terdapat penurunan BB selama satu bulan terakhir?<br />
            <input type="checkbox" name="strong_kids_ka[]" value="ada diare">5x/hari atau muntah >3x/hari atau asupan turun dalam 1 minggu"> 3. Apakah ada diare >5x/hari atau muntah >3x/hari atau asupan turun dalam 1 minggu?<br>
            <input type="checkbox" name="strong_kids_ka[]" value="terdapat penyakit atau keadaan yang mengakibatkan pesien beresiko malnutrisi"> Apakah terdapat penyakit atau keadaan yang mengakibatkan pesien beresiko malnutrisi?<br>
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
            <input type="radio" name="aktivitas_ka" value="jalan">Mandiri
        </label>
        <label class="radio-inline">
            <input type="radio" name="aktivitas_ka" value="kursi roda">Perlu Bantuan,sebutkan <input type="text" name="aktivitas_detail_ka" id="aktivitas_detail_ka" class="custom-input" readonly>
        </label>
        <label class="radio-inline">
            <input type="radio" name="aktivitas_ka" value="brankar"> Ketergantungan penuh
        </label>
    </div>
    <div class="col-md-12">
        <p class="text-muted">&nbsp;&nbsp;&nbsp;(Bila ketergantungan penuh kolaborasi ke DPJP untuk konsul ke rehabilitasi)</p>
        <label for="">&nbsp;&nbsp;&nbsp;Diberitahukan ke dokter</label>
        <label class="radio-inline">

        </label>
        <label class="radio-inline">
            <input type="radio" name="aktivitas_info_ka" value="1">Ya, Jam <input type="text" name="aktivitas_info_detail_ka" id="aktivitas_info_detail_ka" class="custom-input" readonly>
        </label>
        <label class="radio-inline">
            <input type="radio" name="aktivitas_info_ka" value="0"> Tidak
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
            <input type="radio" name="jatuh_ka" value="0">Tidak
        </label>
        <label class="radio-inline">
            <input type="radio" name="jatuh_ka" value="1">Bila Ya, Risiko jatuh
        </label>
        <label for="">
            <select name="jatuh_detail_ka" id="jatuh_detail_ka" class="form-control" readonly>

            </select>
        </label><br />
        <label class="radio">
            Jika resiko jatuh sedang atau tinggi dipasang gelang risiko jatuh warna kuning
            <label class="radio-inline">
                <input type="radio" name="gelang_risiko_ka" value="1">Ya
            </label>
            <label class="radio-inline">
                <input type="radio" name="gelang_risiko_ka" value="0">Tidak
            </label>
        </label>
        <label class="radio">
            Diberitahukan ke dokter
            <label class="radio-inline">
                <input type="radio" name="risiko_info_ka" value="1">Ya jam <input type="time" name="risiko_info_detail_ka" id="risiko_info_detail_ka" class="custom-input w-200" readonly>
            </label>
            <label class="radio-inline">
                <input type="radio" name="risiko_info_ka" value="0">Tidak
            </label>
        </label>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label for="" class="text-blue">k. Pemeriksaan Umum / Fisik </label><br>
    </div>
    <div class="col-md-3">
        <label for="keadaan_umum">Keadaan Umum</label>
        <select name="keadaan_umum_ka" id="keadaan_umum_ka" class="form-control form-control-sm">
            <option value="">== Pilih ==</option>
            <option value="Tampak Tidak Sakit">Tampak Tidak Sakit</option>
            <option value="Tampak Sakit Ringan">Tampak Sakit Ringan</option>
            <option value="Tampak Sakit Sedang">Tampak Sakit Sedang</option>
            <option value="Tampak Sakit Berat">Tampak Sakit Berat</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="">Kesadaran</label>
        <select name="kesadaran_umum_ka" id="kesadaran_umum_ka" class="form-control form-control-sm">
            <option value="kesadaran_umum">== Pilih ==</option>
            <option value="Kompos Mentis">Kompos Mentis</option>
            <option value="Apatis">Apatis</option>
            <option value="Somnolen">Somnolen</option>
            <option value="Soporo">Soporo</option>
            <option value="Koma">Koma</option>
        </select>
    </div>
    <div class="col-md-12">
        <label for="">GCS</label>
        <div>
            E : <input type="number" name="gcs_e_ka" id="gcs_e_ka" min="0" max="4" class="custom-input w-50">
            M : <input type="number" name="gcs_m_ka" id="gcs_m_ka" min="0" max="6" class="custom-input w-50">
            V : <input type="number" name="gcs_v_ka" id="gcs_v_ka" min="0" max="6" class="custom-input w-50">
        </div>
    </div>
    <div class="col-md-12">
        <label for="">TTV</label>
        <div>
            Sh : <input type="number" step="any" name="ttv_sh_ka" id="ttv_sh_ka" class="custom-input w-100">
            Nd : <input type="number" name="ttv_nd_ka" id="ttv_nd_ka" class="custom-input w-100">
            Rr : <input type="number" name="ttv_rr_ka" id="ttv_rr_ka" class="custom-input w-100">
            Sp02 : <input type="number" name="ttv_spo2_ka" id="ttv_spo2_ka" class="custom-input w-50">
            TD : <input type="number" name="ttv_td_ka" id="ttv_td_ka" class="custom-input w-50">/<input type="number" name="ttv_ds_ka" id="ttv_ds_ka" class="custom-input w-50">
        </div>
    </div>
    <div class="col-md-12">
        <label for="status_generalis">Pemeriksaan : Status generalis & status lokalis (inspeksi, palpasi, perkusi, dan auskultasi)</label>
        <input type="text" name="status_generalis_ka" id="status_generalis_ka" class="form-control">
    </div>
    <div class="col-md-12">
        <label class="radio">
            Pemeriksaan penunjang sebelum rawat inap :
            <label class="checkbox-inline">
                <input type="checkbox" name="penunjang_rad_ka" value="1">Radiologi<input type="text" name="penunjang_rad_detail_ka" id="penunjang_rad_detail_ka" class="custom-input" readonly>
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="penunjang_lab_ka" value="1">Lab<input type="text" name="penunjang_lab_detail_ka" id="penunjang_lab_detail_ka" class="custom-input" readonly>
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="penunjang_lain_ka" value="1">Lain-lain<input type="text" name="penunjang_lain_detail_ka" id="penunjang_lain_detail_ka" class="custom-input" readonly>
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
        <select name="komunikasi_ka" id="komunikasi_ka" class="form-control">
            <option value="0">Tidak</option>
            <option value="1">Ya</option>
        </select>
    </div>
    <div class="col-md-4">
        <label for="">Jika Ya</label>
        <select name="komunikasi_detail_ka[]" id="komunikasi_detail_ka" class="form-control select2" multiple="multiple" style="width:100%" disabled>
            <option value="Pendengaran">Pendengaran</option>
            <option value="Budaya">Budaya</option>
            <option value="Penglihatan">Penglihatan</option>
            <option value="Emosi">Emosi</option>
            <option value="Kognitif">Kognitif</option>
            <option value="Bahasa">Bahasa</option>
            <option value="Fisik">Fisik</option>
            <option value="Lainnya">Lainnya</option>
        </select>
    </div>
    <div class="col-md-4">
        <label for="">Jika Ya Lainnya <small>tulis di sini</small></label>
        <input type="text" name="komunikasi_lain_ka" id="komunikasi_lain" class="form-control">
    </div>
    <div class="col-md-4">
        <label for="komunikasi_penerjemah_ka">Dibutuhkan Penerjemah</label>
        <select name="komunikasi_penerjemah_ka" id="komunikasi_penerjemah_ka" class="form-control">
            <option value="">==Pilih==</option>
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
        </select>
    </div>
    <div class="col-md-4">
        <label for="komunikasi_penerjemah_detail_ka">Jika Ya Sebutkan</label>
        <input type="text" name="komunikasi_penerjemah_detail_ka" id="komunikasi_penerjemah_detail_ka" class="form-control" readonly>
    </div>
    <div class="col-md-4">
        <label for="komunikasi_isyarat">Bahasa Isyarat</label>
        <select name="komunikasi_isyarat_ka" id="komunikasi_isyarat_ka" class="form-control">
            <option value="">==Pilih==</option>
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
        </select>
    </div>
    <div class="col-md-12">
        <label for="">Kebutuhan Edukasi (Pilih topik edukasi pada kotak yang tersedia)</label>
        <label class="checkbox-inline">
            <input type="checkbox" name="kebutuhan_edukasi_ka[]" value="Diagnosa dan manajemen penyakit">Diagnosa dan manajemen penyakit
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" name="kebutuhan_edukasi_ka[]" value="Obat-obatan / Terapi">Obat-obatan / Terapi
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" name="kebutuhan_edukasi_ka[]" value="Diet dan nutrisi">Diet dan nutrisi
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" name="kebutuhan_edukasi_ka[]" value="Tindakan keperawatan">Tindakan keperawatan sebutkan<input type="text" name="kebutuhan_edukasi_tindakan_ka" id="kebutuhan_edukasi_tindakan_ka" class="custom-input w-200" readonly>
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" name="kebutuhan_edukasi_ka[]" value="Rehabilitasi">Rehabilitasi
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" name="kebutuhan_edukasi_ka[]" value="Manajemen nyeri">Manajemen nyeri
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" name="kebutuhan_edukasi_ka[]" value="Lain-lain">Lain-lain sebutkan <input type="text" name="kebutuhan_edukasi_lain_ka" id="kebutuhan_edukasi_lain_ka" class="custom-input w-200" readonly>
        </label>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label for="diagnosa_keperawatan_ka">Diagnosa Keperawatan</label>
        <!-- <textarea name="diagnosa_keperawatan_ka" id="diagnosa_keperawatan_ka" cols="30" rows="10" class="form-control"></textarea> -->
        <select name="diagnosa_keperawatan_ka[]" id="diagnosa_keperawatan_ka" class="form-control select2" style="width:100%" multiple="multiple">
            <option value="">=Pilih=</option>
            <?php foreach ($sdki as $sd) { ?>
                <option value="<?= $sd->kode . "-" . $sd->name ?>"><?= $sd->kode . "-" . $sd->name ?></option>
            <?php }  ?>
        </select>
    </div>
    <div class="col-md-12">
        <label for="tindakan_keperawatan_ka">Tindakan Keperawatan</label>
        <!-- <textarea name="tindakan_keperawatan_ka" id="tindakan_keperawatan_ka" cols="30" rows="10" class="form-control"></textarea> -->
        <select name="tindakan_keperawatan_ka[]" id="tindakan_keperawatan_ka" class="form-control select2" style="width:100%" multiple="multiple">
            <option value="">=Pilih=</option>
            <?php foreach ($siki as $sk) { ?>
                <option value="<?= $sk->kode . "-" . $sk->intervensi ?>"><?= $sk->kode . "-" . $sk->intervensi ?></option>
            <?php }  ?>
        </select>
    </div>
    <div class="col-md-12">
        <label for="apd_ka">Pemakaian APD (Alat Pelindung Diri)</label>
        <!-- <textarea name="tindakan_keperawatan_ka" id="tindakan_keperawatan_ka" cols="30" rows="10" class="form-control"></textarea> -->
        <select name="apd_ka[]" id="apd_ka" class="form-control select2" style="width:100%" multiple="multiple">
            <option value="Tidak Ada">Tidak Ada</option>
            <?php
            $alat_medis_apd = getAlatMedis("apd");
            foreach ($alat_medis_apd as $apd) { ?>
                <option value="<?= $apd->name ?>"><?= $apd->name ?></option>
            <?php }  ?>
        </select>
    </div>
    <div class="col-md-12">
        <label for="apd_ka">Pemakaian BMHP (Barang Medis Habis Pakai)</label>
        <!-- <textarea name="tindakan_keperawatan_ka" id="tindakan_keperawatan_ka" cols="30" rows="10" class="form-control"></textarea> -->
        <select name="bmhp_ka[]" id="bmhp_ka" class="form-control select2" style="width:100%" multiple="multiple">
            <option value="Tidak Ada">Tidak Ada</option>
            <?php
            $alat_medis_apd = getAlatMedis("bmhp");
            foreach ($alat_medis_apd as $apd) { ?>
                <option value="<?= $apd->name ?>"><?= $apd->name ?></option>
            <?php }  ?>
        </select>
    </div>
</div>
<hr />
<div class="form-group row">
    <div class="col-md-12">
        <label for="">Telah di jelaskan kepada</label>
        <label class="radio-inline">
            <input type="radio" name="dijelaskan_ka" value="Pasien" checked>Pasien
        </label>
        <label class="radio-inline">
            <input type="radio" name="dijelaskan_ka" value="Keluarga">Keluarga, Hubungan <input type="text" name="dijelaskan_hubungan_ka" id="dijelaskan_hubungan_ka" class="custom-input w-200" readonly> Nama <input type="text" name="dijelaskan_nama_ka" id="dijelaskan_nama_ka" class="custom-input w-200" value="<?= $detail->nama_pasien ?>" readonly>
        </label>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6">
        <label for="">Perawat Yang Melakukan Kajian</label>
        <select name="perawat_id_ka" id="perawat_id_ka" class="form-control select2" style="width:100%">
            <?php $list = getPegawai([3, 4])->result();
            echo "<option value=''>Pilih Nama Perawat</option>";
            foreach ($list as $r) { ?>
                <option value="<?= $r->NRP ?>"><?= $r->pgwNama ?></option>
            <?php    }
            ?>
        </select>
    </div>
</div>
<script>
    var nama = "<?= $detail->nama_pasien ?> ";
    var ruang = "<?= $detail->id_ruang ?>";
    var dokter = "<?= $detail->dokterJaga ?>";
</script>
<script>
    var today = new Date();
    var priorDate = new Date(new Date().setDate(today.getDate() + 30));
    console.log(priorDate)
</script>
<script>
    $(document).ready(function() {
        // $('#diagnosa_keperawatan_ka,#tindakan_keperawatan_ka').wysihtml5()
        // CKEDITOR.replace('diagnosa_keperawatan_ka')
        // CKEDITOR.replace('tindakan_keperawatan_ka')

        $("#poli_ka").val(ruang);
        $("#dpjp_ka").val(dokter);

        $(".skrining_nyeri").prop("hidden", true);
        $("#vas_pilih,#wbfs_pilih,#flacc_pilih").prop("hidden", true)

        $("[name='rujukan_ka']").change(function() {
            if (this.value == 'lainnya') {
                $("[name='rujukan_lainnya_ka']").removeAttr("readonly").focus();
            } else {
                $("[name='rujukan_lainnya_ka']").prop('readonly', true).val("");
            }
        })

        $("[name='obat_ka']").change(function() {
            if (this.value == 1) {
                $("[name='obat_detail_ka']").removeAttr("readonly").focus();
            } else {
                $("[name='obat_detail_ka']").prop('readonly', true).val("");
            }
        })

        $("[name='kebutuhan_edukasi_ka[]']").change(function() {
            if (this.value == "Tindakan keperawatan") {
                $("[name='kebutuhan_edukasi_tindakan_ka']").removeAttr("readonly").focus();
            }
            if (this.value == "Lain-lain") {
                $("[name='kebutuhan_edukasi_lain_ka']").removeAttr("readonly").focus();
            }
        })

        $("[name='makanan_ka']").change(function() {
            if (this.value == 1) {
                $("[name='makanan_detail_ka']").removeAttr("readonly").focus();
            } else {
                $("[name='makanan_detail_ka']").prop('readonly', true).val("");
            }
        })

        // skrining nyeri



        $("[name='dirawat_ka']").change(function() {
            let val = $(this).val();
            if (val == 1) {
                $("[name='kapan_dirawat_ka']").removeAttr("readonly required").focus()
                $("[name='dimana_dirawat_ka']").removeAttr("readonly required")
            } else {
                $("[name='kapan_dirawat_ka']").attr({
                    "readonly": true,
                    "required": true
                }).val("")
                $("[name='dimana_dirawat_ka']").attr({
                    readonly: true,
                    "required": true
                }).val("")
            }
        })
        $("[name='implant_ka']").change(function() {
            if ($(this).is(":checked")) {
                $("[name='implant_detail_ka']").removeAttr("readonly").focus();
            } else {
                $("[name='implant_detail_ka']").attr('readonly', true).val("");
            }
        })
        // $("#vas_pilih,#wbfs_pilih,#flacc_pilih").hide();

        $("[name='riwayat_operasi_cek_ka']").change(function() {
            if ($(this).is(":checked")) {
                $("[name='riwayat_operasi_ka']").removeAttr("readonly").val("").focus();
                $("[name='riwayat_operasi_tahun_ka']").prop("disabled", false);
            } else {
                $("[name='riwayat_operasi_ka']").attr('readonly', true).val("tidak ada");
                $("[name='riwayat_operasi_tahun_ka']").prop("disabled", true).val("0000");
            }
        })

        $("#gizi_ka,#gizi_makan_ka").change(function() {
            hitung_skor_gizi()
        })

        $('input[type=radio][name=aktivitas_ka]').change(function() {
            if ($(this).val() == 'kursi roda') {
                $("[name='aktivitas_detail_ka']").removeAttr("readonly").focus();
            } else {
                $("[name='aktivitas_detail_ka']").attr("readonly", true).val("");
            }
        });
        $('input[type=radio][name=aktivitas_info_ka]').change(function() {
            if ($(this).val() == 1) {
                $("[name='aktivitas_info_detail_ka']").removeAttr("readonly").focus();
            } else {
                $("[name='aktivitas_info_detail_ka']").attr("readonly", true).val("");
            }
        });
        $('input[type=radio][name=jatuh_ka]').change(function() {
            let kosong = `
                    <option value="">==Pilih==</option>
                  
            `;
            let isi = `
            <option value="rendah">Rendah</option>
                    <option value="sedang">Sedang</option>
                    <option value="tinggi">Tinggi</option>
            `;
            if ($(this).val() == 1) {
                $("[name='jatuh_detail_ka']").removeAttr("readonly").html(isi);
            } else {
                $("[name='jatuh_detail_ka']").attr("readonly", true).html(kosong);
            }
        });
        $('input[type=radio][name=risiko_info_ka]').change(function() {
            if ($(this).val() == 1) {
                $("[name='risiko_info_detail_ka']").removeAttr("readonly").focus();
            } else {
                $("[name='risiko_info_detail_ka']").attr("readonly", true).val("");
            }
        });
        $('input[type=checkbox][name=penunjang_rad_ka]').change(function() {
            if (this.checked) {
                $("[name='penunjang_rad_detail_ka']").removeAttr("readonly").focus();
            } else {
                $("[name='penunjang_rad_detail_ka']").attr("readonly", true).val("");
            }
        });
        $('input[type=checkbox][name=penunjang_lab_ka]').change(function() {
            if (this.checked) {
                $("[name='penunjang_lab_detail_ka']").removeAttr("readonly").focus();
            } else {
                $("[name='penunjang_lab_detail_ka']").attr("readonly", true).val("");
            }
        });
        $('input[type=checkbox][name=penunjang_lain_ka]').change(function() {
            if (this.checked) {
                $("[name='penunjang_lain_detail_ka']").removeAttr("readonly").focus();
            } else {
                $("[name='penunjang_lain_detail_ka']").attr("readonly", true).val("");
            }
        });

        $('input[type=checkbox][name=status_mental_keras_ka]').change(function() {
            if (this.checked) {
                $("[name='status_mental_keras_detail_ka']").removeAttr("readonly").focus();
            } else {
                $("[name='status_mental_keras_detail_ka']").attr("readonly", true).val("");
            }
        });

        $('input[type=checkbox][name=status_mental_prilaku_ka]').change(function() {
            if (this.checked) {
                $("[name='status_mental_prilaku_detail_ka']").removeAttr("readonly").focus();
            } else {
                $("[name='status_mental_prilaku_detail_ka']").attr("readonly", true).val("");
            }
        });

        $('[name=komunikasi_penerjemah_ka]').change(function() {
            // console.log(this.value)
            if ($(this).val() == 1) {
                $("[name='komunikasi_penerjemah_detail_ka']").removeAttr("readonly").focus();
            } else {
                $("[name='komunikasi_penerjemah_detail_ka']").attr("readonly", true).val("");
            }
        });

        $('[name=komunikasi_ka]').change(function() {
            // console.log(this.value)
            if ($(this).val() == 1) {
                $("[name='komunikasi_detail_ka[]']").select2().prop("disabled", false);
            } else {
                $("[name='komunikasi_detail_ka[]']").select2().prop("disabled", true);
                $("[name='komunikasi_detail_ka[]']").val(null).trigger("change");
            }
        });

        $("#wajah_ka,#leg_ka,#gerakan_ka,#tangis_ka,#kemampuan_ka").change(function() {
            hitung_flacc();
        });
        $('[name=dijelaskan_ka]').on("click", function() {
            // console.log(this.value)
            if ($(this).val() == "Keluarga") {
                $("[name='dijelaskan_hubungan_ka']").removeAttr("readonly").focus();
                $("[name='dijelaskan_nama_ka']").removeAttr("readonly").val("");
            } else {
                $("[name='dijelaskan_hubungan_ka']").attr("readonly", true).val("");
                $("[name='dijelaskan_nama_ka']").attr("readonly", true).val(nama);
            }
        });

        $("[name='metode_ka']").change(function() {
            if (this.value == 1) {
                $("#vas_pilih").prop("hidden", false)
                $("#wbfs_pilih").prop("hidden", true)
                $("#flacc_pilih").prop("hidden", true)
            } else if (this.value == 2) {
                $("#vas_pilih").prop("hidden", true)
                $("#wbfs_pilih").prop("hidden", false)
                $("#flacc_pilih").prop("hidden", true)
            } else if (this.value == 3) {
                $("#vas_pilih").prop("hidden", true)
                $("#wbfs_pilih").prop("hidden", true)
                $("#flacc_pilih").prop("hidden", false)
            }
        });

        $("[name='nyeri_ka']").on("change", function() {
            if (this.value != "tidak ada nyeri") {
                $(".skrining_nyeri").prop("hidden", false)
                $("#vas_pilih,#wbfs_pilih,#flacc_pilih").prop("hidden", true)
            } else {
                $(".skrining_nyeri").prop("hidden", true)
            }
        })

    });

    function hitung_skor_gizi() {
        let a = $("#gizi_ka").val()
        let b = $("#gizi_makan_ka").val()
        let sum = source_gizi(a).value + source_gizi(b).value;
        $("#skor_gizi").text(sum)
    }


    function hitung_flacc() {
        let f = $("#wajah_ka").val();
        let l = $("#leg_ka").val();
        let g = $("#gerakan_ka").val();
        let t = $("#tangis_ka").val();
        let k = $("#kemampuan_ka").val();
        let sum = parseFloat(f) + parseFloat(l) + parseFloat(g) + parseFloat(t) + parseFloat(k);
        let text = "";
        if (sum == 0) {
            text = "Tidak Nyeri";
        } else if (sum >= 1 && sum <= 3) {
            text = "Nyeri Ringan";
        } else if (sum >= 4 && sum <= 6) {
            text = "Nyeri Sedang"
        } else if (sum >= 7 && sum <= 10) {
            text = "Nyeri Berat"
        } else {
            text = "0: tidak nyeri 1-3 nyeri ringan 4-6 : nyeri sedang 7-10 : nyeri berat"
        }
        $("#skor_flacc").text(sum)
        $("#skor_flacc_detail").text(text)
    }
</script>