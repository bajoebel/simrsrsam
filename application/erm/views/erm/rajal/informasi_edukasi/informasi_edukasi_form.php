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
                        <input type="text" class='form-control' placeholder="lainnya...">
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
            <div class="col-md-3">
                <label for="">Metode</label>
                <select name="" id="" class="form-control select2" multiple="multiple">
                    <option value="">Diskusi</option>
                    <option value="">Ceramah</option>
                    <option value="">Demonstrasi</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="">Media</label>
                <select name="" id="" class="form-control select2" multiple="multiple">
                    <option value="">Diskusi</option>
                    <option value="">Ceramah</option>
                    <option value="">Demonstrasi</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="">Media</label>
                <div class="row">
                    <div class="col-md-6">
                        <select name="" id="" class="form-control select2" multiple="multiple">
                            <option value="">Pasien</option>
                            <option value="">Keluarga</option>
                            <option value="">Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Lainnya.....">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <label for="">Tanggal</label>
                <input type="date" name="" id="" class="form-control">
            </div>
            <div class="col-md-2">
                <label for="">Jam</label>
                <input type="time" name="" id="" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="">Topik Edukasi</label>
                <select name="" id="" class="form-control">
                    <option value="1">Pendaftaran dan Admisi</option>
                    <option value="2">DPJP/PPJA</option>
                    <option value="3">Apoteker</option>
                    <option value="4">Penggunaan Alat Medis</option>
                    <option value="5">Nyeri</option>
                    <option value="6">Teknik - Teknik Rehabilitasi</option>
                    <option value="7">Diet Dan Nutrisi Yang Memadai</option>
                    <option value="8">Prosedur dan Perawatan</option>
                    <option value="9">Rohaniawan</option>
                    <option value="10">Pemulangan Pasien dan Asuhan Lanjutan di Rumah</option>
                </select>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <?php $t = 8;
            if ($t == 1) { ?>
                <div class="col-md-4">
                    <label for="">Pendaftaran Dan Admisi</label>
                    <select name="" id="" class="form-control select2" multiple="multiple">
                        <option value="">Hak-hak pasien</option>
                        <option value="">Aturan Umum RS</option>
                        <option value="">Perkiraan Biaya Rawatan</option>
                        <option value="">Alasan Penundaan Pelayanan</option>
                        <option value="">Alasan Keterlambatan Pelayanan</option>
                        <option value="">Informasi Rujukan</option>
                        <option value="">lain-lain</option>
                    </select>
                    <input type="text" class="form-control mt-1" placeholder="lainnya...">
                </div>
            <?php } else if ($t == 2) { ?>
                <div class="col-md-4">
                    <label for="">DPJP/PPJA</label>
                    <select name="" id="" class="form-control select2" multiple="multiple">
                        <option value="">Hak-hak pasien</option>
                        <option value="">Aturan Umum RS</option>
                        <option value="">Perkiraan Biaya Rawatan</option>
                        <option value="">Alasan Penundaan Pelayanan</option>
                        <option value="">Alasan Keterlambatan Pelayanan</option>
                        <option value="">Informasi Rujukan</option>
                        <option value="">lain-lain</option>
                    </select>
                    <input type="text" class="form-control mt-1" placeholder="lainnya...">
                </div>
            <?php } else if ($t == 3) { ?>
                <div class="col-md-4">
                    <label for="">Apoteker</label>
                    <select name="" id="" class="form-control select2" multiple="multiple">
                        <option value="">
                            Penggunaan Obat Efektif dan aman <br />
                            Dosis <br />
                            Cara Makan <br />
                            Efek Samping Obat <br />
                            Interaksi Obat <br />
                            Penyimpanan <br />
                        </option>
                        <option value="">Lainnya...</option>
                    </select>
                    <input type="text" class="form-control mt-1" placeholder="lainnya...">
                </div>
            <?php } else if ($t == 4) { ?>
                <div class="col-md-4">
                    <label for="">Penggunaan Alat Medis</label>
                    <select name="" id="" class="form-control select2" multiple="multiple">
                        <option value="">Keamanan Alat</option>
                        <option value="">Efektivitas Alat</option>
                        <option value="">Lainnya...</option>
                    </select>
                    <input type="text" class="form-control mt-1" placeholder="lainnya...">
                </div>
            <?php } else if ($t == 5) { ?>
                <div class="col-md-4">
                    <label for="">Nyeri</label>
                    <select name="" id="" class="form-control select2" multiple="multiple">
                        <option value="">Manajemen Nyeri</option>
                        <option value="">Obat Nyeri</option>
                        <option value="">Lainnya...</option>
                    </select>
                    <input type="text" class="form-control mt-1" placeholder="lainnya...">
                </div>
            <?php } else if ($t == 6) { ?>
                <div class="col-md-4">
                    <label for="">Teknik-teknik Rehabilitasi (sebutkan)</label>
                    <select name="" id="" class="form-control select2" multiple="multiple">

                    </select>
                    <input type="text" class="form-control mt-1" placeholder="lainnya...">
                </div>
            <?php } else if ($t == 7) { ?>
                <div class="col-md-4">
                    <label for="">Diet Dan Nutrisi Yang Memadai</label>
                    <select name="" id="" class="form-control select2" multiple="multiple">

                    </select>
                    <input type="text" class="form-control mt-1" placeholder="lainnya...">
                </div>
            <?php } else if ($t == 8) { ?>
                <div class="col-md-4">
                    <label for="">Prosedur Perawatan</label>
                    <select name="" id="" class="form-control select2" multiple="multiple">
                        <option value="">Cuci Tangan yang Benar</option>
                        <option value="">Penggunaan APD (masker, sarung tangan, dll)</option>
                        <option value="">Mobilisasi/ROM</option>
                        <option value="">Batuk Efektif</option>
                        <option value="">Perawatan Metode Kangguru</option>
                        <option value="">Perawatan Bayi Baru Lahir</option>
                        <option value="">Pemberian makan melalui NGT</option>
                        <option value="">Perawatan luka</option>
                        <option value="">Inisiasi menyusui dini</option>
                        <option value="">Asi Eklusif</option>
                    </select>
                    <input type="text" class="form-control mt-1" placeholder="lainnya...">
                </div>
            <?php } else if ($t == 9) { ?>
                <div class="col-md-4">
                    <label for="">Rohaniawan</label>
                    <select name="" id="" class="form-control select2" multiple="multiple">

                    </select>
                    <input type="text" class="form-control mt-1" placeholder="lainnya...">
                </div>
            <?php } else if ($t == 10) { ?>
                <div class="col-md-4">
                    <label for="">Pemulangan Pasien dan Asuhan Lanjutan Di Rumah</label>
                    <select name="" id="" class="form-control select2" multiple="multiple">
                        <option value="">Jadwal Kontrol ke Dokter</option>
                        <option value="">Dokumen yang di bawa pulang</option>
                        <option value="">Hasil pemeriksaan penunjang : Lab/RO</option>
                        <option value="">Rencana pemeriksaan penunjang : Lab/RO</option>
                        <option value="">Obat-obatan yang dibawa pulang</option>
                        <option value="">Penatalaksanaan Kesehatan di Rumah</option>
                        <option value="">Edukasi Lanjutan (Puskesmas)</option>
                        <option value="">Edukasi Lanjutan (Dokter Keluarga)</option>
                        <option value="">Edukasi Lanjutan (Home Care)</option>
                        <option value="">Edukasi Lanjutan (Klinik Terdekat/Prakter Dokter Mandiri)</option>
                    </select>
                    <input type="text" class="form-control mt-1" placeholder="lainnya...">
                </div>
            <?php } ?>

        </div>
        <div class="form-group">
            <div class="col-md-4">
                <label for="">Metode</label>
                <select name="" id="" class="form-control">
                    <option value="1">Diskusi</option>
                    <option value="2">Ceramah</option>
                    <option value="3">Demonstrasi</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="">Media Edukasi</label>
                <select name="" id="" class="form-control">
                    <option value="1">Diet</option>
                    <option value="2">Lembar Balik</option>
                    <option value="3">Audio Visual</option>
                    <option value="4">Lain-lain</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="">Sasaran Edukasi</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="">Evaluasi Awal</label>
                <select name="" id="" class="form-control">
                    <option value="">Sudah Mengerti</option>
                    <option value="">Re-edukasi</option>
                    <option value="">Re-Demonstrasi</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="">Pemberi Edukasi</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="">Evaluasi Lanjutan</label>
                <select name="" id="" class="form-control">
                    <option value="">Sudah Mengerti</option>
                    <option value="">Re-edukasi</option>
                    <option value="">Re-Demonstrasi</option>
                </select>
            </div>
        </div>
    </div>
</form>