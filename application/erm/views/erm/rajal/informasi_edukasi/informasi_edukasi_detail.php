<div class="box">
    <div class="box-body">
        <div class="table-responsive">
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" href='#modal-id'><i class="fa fa-plus"></i> Tambah</button>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tanggal/Jam</th>
                        <th>Topik Edukasi</th>
                        <th>Metode</th>
                        <th>Media</th>
                        <th>Sasaran</th>
                        <th>Evaluasi Awal</th>
                        <th>Pemberi Edukasi</th>
                        <th>Verifikasi</th>
                        <th>Evaluasi Lanjutan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-id">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail Edukasi</h4>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="">Tanggal</label>
                            <input type="date" name="" id="" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Jam</label>
                            <input type="time" name="" id="" class="form-control">
                        </div>
                        <div class="col-md-6">
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
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="">Pendaftaran Dan Admisi</label>
                            <select name="" id="" class="form-control select3" multiple="multiple">
                                <option value="1">Hak-hak pasien</option>
                                <option value="2">Aturan Umum RS</option>
                                <option value="3">Perkiraan Biaya Rawatan</option>
                                <option value="4">Alasan Penundaan Pelayanan</option>
                                <option value="5">Alasan Keterlambatan Pelayanan</option>
                                <option value="6">Informasi Rujukan</option>
                                <option value="7">lain-lain</option>
                            </select>
                        </div>

                        <!-- <div class="col-md-4">
                        <label for="">&nbsp;</label>
                        <input type="text" class="form-control mt-1" placeholder="lainnya..." readonly>
                    </div> -->
                    </div>
                    <div class="form-group hide">
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
                    </div>
                    <div class="form-group hide">
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
                    </div>
                    <div class="form-group hide">
                        <div class="col-md-4">
                            <label for="">Penggunaan Alat Medis</label>
                            <select name="" id="" class="form-control select2" multiple="multiple">
                                <option value="">Keamanan Alat</option>
                                <option value="">Efektivitas Alat</option>
                                <option value="">Lainnya...</option>
                            </select>
                            <input type="text" class="form-control mt-1" placeholder="lainnya...">
                        </div>
                    </div>
                    <div class="form-group hide">
                        <div class="col-md-4">
                            <label for="">Nyeri</label>
                            <select name="" id="" class="form-control select2" multiple="multiple">
                                <option value="">Manajemen Nyeri</option>
                                <option value="">Obat Nyeri</option>
                                <option value="">Lainnya...</option>
                            </select>
                            <input type="text" class="form-control mt-1" placeholder="lainnya...">
                        </div>
                    </div>
                    <div class="form-group hide">
                        <div class="col-md-4">
                            <label for="">Teknik-teknik Rehabilitasi (sebutkan)</label>
                            <select name="" id="" class="form-control select2" multiple="multiple">

                            </select>
                            <input type="text" class="form-control mt-1" placeholder="lainnya...">
                        </div>
                    </div>
                    <div class="form-group hide">
                        <div class="col-md-4">
                            <label for="">Diet Dan Nutrisi Yang Memadai</label>
                            <select name="" id="" class="form-control select2" multiple="multiple">

                            </select>
                            <input type="text" class="form-control mt-1" placeholder="lainnya...">
                        </div>
                    </div>
                    <div class="form-group hide">
                        <div class="col-md-6">
                            <select name="" id="" class="select2" multiple="multiple">
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
                        </div>
                    </div>
                    <div class="form-group hide">
                        <div class="col-md-6">
                            <input type="text" class="form-control mt-1" placeholder="lainnya...">
                        </div>
                    </div>
                    <div class="form-group hide">
                        <div class="col-md-4">
                            <label for="">Rohaniawan</label>
                            <select name="" id="" class="form-control select2" multiple="multiple">

                            </select>
                            <input type="text" class="form-control mt-1" placeholder="lainnya...">
                        </div>
                    </div>
                    <div class="form-group hide">
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
                    <div class="form-group">
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
                    <div class="form-group">
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
                </form>

            </div>
            <div class="modal-footer mt-1">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $(".select3").select2();
    });
</script>