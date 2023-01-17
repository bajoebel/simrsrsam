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
<form role="form" id='form-data-edukasi-pasien' method="post">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Data Awal</h3>
        </div>
        <div class="panel-body">
            <input type="hidden" name="idx_e" id="idx_e" value="<?= $detail->idx ?>">
            <input type="hidden" name="nomr_e" value="<?= $detail->nomr ?>">
            <input type="hidden" name="nama_e" value="<?= $detail->nama_pasien ?>">
            <input type="hidden" name="user_daftar_e" value="<?= $detail->user_daftar ?>">
            <b>Asesmen Kemampuan, Kemauan Belajar</b>
            <p class="text-blue">Pengkajiaan umum</p>
            <div class="form-group row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Bahasa</label>
                            <select class="form-control select2" name="bahasa_e[]" id="bahasa_e" multiple="multiple" style="width:100%">
                                <option value="Indonesia">Indonesia</option>
                                <option value="Daerah">Daerah</option>
                                <option value="Isyarat">Isyarat</option>
                                <option value="Lainnya...">Lainnya...</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="">Bahasa daerah / lain-lain sebutkan</label>
                            <input type="text" class="form-control" name="bahasa_lainnya_e" id="bahasa_lainnya_e" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="">Kebutuhan Penerjemah</label>
                    <div class="radio">
                        <label for="" class="radio-inline">
                            <input type="radio" name="penerjemah_e" value="1">Ya
                        </label>
                        <label for="" class="radio-inline">
                            <input type="radio" name="penerjemah_e" value="0" checked>Tidak
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="">Agama</label>
                    <select name="agama_e" id="agama_e" class="form-control">
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
                <div class="col-md-3">
                    <label for="">Pendidikan Pasien</label>
                    <select name="pendidikan_e" id="pendidikan_e" class="form-control">
                        <option value="0">Tidak sekolah</option>
                        <option value="1">SD</option>
                        <option value="2">SLTP sederajat</option>
                        <option value="3">SLTA sederajat</option>
                        <option value="4">D4</option>
                        <option value="5">S1</option>
                        <option value="6">S2</option>
                        <option value="7">S3</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Kesediaan Menerima Informasi</label>
                    <div class="radio">
                        <label for="" class="radio-inline">
                            <input type="radio" name="kesediaan_e" value="1" checked>Bersedia
                        </label>
                        <label for="" class="radio-inline">
                            <input type="radio" name="kesediaan_e" value="0">Tidak Bersedia (alasan)
                        </label>
                        <label for="" class="radio-inline">
                            <input type="text" class="custom-input w-100" name="kesediaan_alasan_e" id="kesediaan_alasan_e" readonly>
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="">Kemampuan Membaca</label>
                    <div class="radio">
                        <label for="" class="radio-inline">
                            <input type="radio" name="baca_e" id="" value="1" checked>Baik
                        </label>
                        <label for="" class="radio-inline">
                            <input type="radio" name="baca_e" id="" value="0">Kurang
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="">Keyakinan dan Nilai-nilai</label>
                    <input type="text" class="form-control" name="keyakinan_e" id="keyakinan_e" value="-">
                </div>
                <div class="col-md-4">
                    <label for="">Keterbatasan Fisik dan Kognitif</label>
                    <div class="row">
                        <div class="col-md-12">
                            <select name="terbatas_fisik_e[]" id="terbatas_fisik_e" class="form-control select2" multiple="multiple" style="width:100%">
                                <option value="Tidak ada">Tidak ada</option>
                                <option value="Penglihatan terganggu">Penglihatan terganggu</option>
                                <option value="Pendengaran terganggu">Pendengaran terganggu</option>
                                <option value="Gangguan bicara">Gangguan bicara</option>
                                <option value="Fisik lemah">Fisik lemah</option>
                                <option value="Kognitif terbatas">Kognitif terbatas</option>
                                <option value="Lain-lain....">Lain-lain....</option>
                            </select>
                        </div>
                        <div class="col-md-12" style="margin-top:5px">
                            <input type="text" class='form-control' placeholder="lainnya..." name="terbatas_fisik_lain_e" id="terbatas_fisik_lain_e" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="">Hambatan Emosional dan Motivasi</label>
                    <div class="row">
                        <div class="col-md-12">
                            <select name="hambatan_e[]" id="hambatan_e" class="form-control select2" multiple="multiple" style="width:100%">
                                <option value="Tidak ada">Tidak ada</option>
                                <option value="Penglihatan Terganggu">Penglihatan Terganggu</option>
                                <option value="Emosional Terganggu">Emosional Terganggu</option>
                                <option value="Lain-lain...">Lain-lain...</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-1">
                            <input type="text" class='form-control' name="hambatan_lain_e" id="hambatan_lain_e" placeholder="lainnya..." readonly>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-blue">Assesment Kebutuhan Edukasi</p>
            <div class="form-group row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-8">
                            <select name="kebutuhan_edukasi_e[]" id="kebutuhan_edukasi_e" class="form-control select2" multiple="multiple" style="width:100%">
                                <option value="Asuhan Medis">Asuhan Medis</option>
                                <option value="Asuhan Keperawatan">Asuhan Keperawatan</option>
                                <option value="Pengobatan">Pengobatan</option>
                                <option value="Pengobatan">Asuhan Gizi</option>
                                <option value="Manajemen nyeri">Manajemen nyeri</option>
                                <option value="Rehabilitasi">Rehabilitasi</option>
                                <option value="Penggunaan alat-alat medis">Penggunaan alat-alat medis</option>
                                <option value="Hand Hygiene">Hand Hygiene</option>
                                <option value="Rohani">Rohani</option>
                                <option value="Pendaftaran dan Admisi">Pendaftaran dan Admisi</option>
                                <option value="Prosedur dan Perawatan">Prosedur dan Perawatan</option>
                                <option value="Lain-lain">Lain-lain</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="kebutuhan_edukasi_lain_e" id="kebutuhan_edukasi_lain_e" class="form-control" placeholder="Lainnya..." readonly>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-blue">Perencanaan Edukasi</p>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="">Metode</label>
                    <select name="metode_e[]" id="metode_e" class="form-control select2" multiple="multiple" style="width:100%">
                        <option value="1-Diskusi">Diskusi</option>
                        <option value="2-Ceramah">Ceramah</option>
                        <option value="3-Demonstrasi">Demonstrasi</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">Media</label>
                    <select name="media_e[]" id="media_e" class="form-control select2" multiple="multiple" style="width:100%">
                        <option value="1-Liflet">Liflet</option>
                        <option value="2-Lembar Balik">Lembar Balik</option>
                        <option value="3-Audio Visual">Audio Visual</option>
                        <option value="4-Lain-lain">Lain-lain</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Sasaran Edukasi</label>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="radio-inline">
                                <input type="radio" name="sasaran_edukasi_e" value="pasien" checked>Pasien
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="sasaran_edukasi_e" value="keluarga">Keluarga
                            </label>
                        </div>
                        <div class="col-md-12 mt-1">
                            <input type="text" name="hubungan_keluarga_e" id="hubungan_keluarga_e" class="form-control" placeholder="Hubungan keluarga ...." readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
            <?= ($detail->status_erm!=1)?" <button type='form' class='btn btn-primary pull-right'>Simpan</button>":"" ?>

                <!-- <button type="form" class="btn btn-primary pull-right">Simpan</button> -->
            </div>
            <!-- <button class="btn btn-primary nextBtn pull-right" type="button">Next</button> -->
        </div>
    </div>
</form>
<form role="form" id='form-data-edukasi-pasien-detail' method="post">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Topik Edukasi</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2">
                    <!-- <?= ($detail->status_erm!=1)?"<button type='button' class='btn btn-success' data-toggle='modal' href='#modal-edukasi-pasien'><i class='fa fa-plus-circle' aria-hidden='true'></i>Tambah</button>":"" ?> -->
                    <!-- <button type="button" class="btn btn-success" data-toggle="modal" href='#modal-edukasi-pasien'><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah</button> -->
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <!-- <select name="filter_e" id="filter_e" class="form-control">
                            <option value="">==filter==</option>

                        </select> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover" id="table-detail-edukasi-pasien">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal/Jam</th>
                                    <th>Topik Edukasi</th>
                                    <th>Metode</th>
                                    <th>Media</th>
                                    <th>Sasaran</th>
                                    <th>Evaluasi Awal</th>
                                    <th>Verifikasi</th>
                                    <th>Evaluasi Lanjutan</th>
                                    <th width="10%">Aksi</th>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <!-- <button type="button" class="btn btn-secondary nextBtn pull-left" onclick="batal()">Cancel</button> -->
                        <!-- <button type="form" class="btn btn-primary pull-right">Selesai</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="modal-edukasi-pasien">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="">Tanggal</label>
                        <input type="date" name="tgl_e" id="tgl_e" class="form-control" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="">Jam</label>
                        <input type="time" name="jam_e" id="jam_e" class="form-control" value="<?= date('h:i') ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="">Topik Edukasi</label>
                        <select name="topik_e" id="topik_e" class="form-control">

                            <option value="">=Pilih Topik=</option>
                            <option value="1">Pendaftaran Admisi</option>
                            <option value="2">DPJP/PPJA</option>
                            <option value="3">Apoteker</option>
                            <option value="4">Penggunaan Alat Medis</option>
                            <option value="5">Nyeri</option>
                            <option value="6">Teknik-Teknik Rehabilitasi</option>
                            <option value="7">Diet dan Nutrisi Yang Memadai</option>
                            <option value="8">Prosedur dan Perawatan</option>
                            <option value="9">Rohaniawan</option>
                            <option value="10">Pemulangan Pasien dan Asuhan Lanjutan di Rumah</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="pil">
                        <div class="col-md-4 item">
                            <label for="" class="topik-item topik-title">Judul Topik</label>
                            <select name="topik_list_e[]" id="topik_list_e" class="form-control select2-tag" style="width:100%" multiple="multiple">

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="metode_topik_e">Metode</label>
                                <select name="metode_topik_e" id="metode_topik_e" class="form-control">
                                    <option value="1">Diskusi</option>
                                    <option value="2">Ceramah</option>
                                    <option value="3">Demonstrasi</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="">Media</label>
                                <select name="media_topik_e" id="media_topik_e" class="form-control">
                                    <option value="1">Liflet</option>
                                    <option value="2">Lembar Balik</option>
                                    <option value="3">Audio Visual</option>
                                    <option value="4">Lain-lain</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="">Sasaran (nama)</label>
                                <input type="text" name="sasaran_topik_e" id="sasaran_topik_e" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Evaluasi Awal</label>
                                <select name="evaluasi_awal_e" id="evaluasi_awal_e" class="form-control">
                                    <option value="1">Sudah Mengerti</option>
                                    <option value="2">Re-Edukasi</option>
                                    <option value="3">Redemonstrasi</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="">Pemberi Edukasi (nama)</label>
                                <select name="pemberi_edukasi_e" id="pemberi_edukasi_e" class="form-control select2" style="width:100%">
                                    <?php $list = getPegawai([])->result();
                                        echo "<option value=''>Pilih Nama</option>";
                                        foreach ($list as $r) { ?>
                                        <option value="<?=$r->NRP?>"><?= $r->pgwNama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- <div class="col-md-12">
                                <label for="">Verifikasi</label>
                                <input type="text" name="verifikasi_e" id="verifikasi_e" class="form-control">
                            </div> -->
                            <div class="col-md-12">
                                <label for="">Evaluasi Lanjutan</label>
                                <select name="evaluasi_lanjut_e" id="evaluasi_lanjut_e" class="form-control">
                                    <option value="1">Sudah Mengerti</option>
                                    <option value="2">Re-Edukasi</option>
                                    <option value="3">Redemonstrasi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?= ($detail->status_erm!=1)?" <button type='form' class='btn btn-primary' onclick='simpan_detail()'>Save Change</button>":"" ?>

                <!-- <button type="button" class="btn btn-primary" onclick="simpan_detail()">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // $(".select2-tag").select2()
        $(".select2").select2({});
        $(".select2-tag").select2({
            tags: true,
        });

        $('#bahasa_e').on('select2:select', function(e) {
            let value = e.params.data;
            if (value.text == "Lainnya...") {
                $("#bahasa_lainnya_e").removeAttr("readonly").focus();
            }
        });
        $('#bahasa_e').on('select2:unselect', function(e) {
            let value = e.params.data;
            if (value.text == "Lainnya...") {
                $("#bahasa_lainnya_e").attr("readonly", true).val("");
            }
        });
        $('input[type=radio][name=kesediaan_e]').change(function() {
            // console.log($(this).val() == 0)
            if ($(this).val() == 0) {
                $("[name='kesediaan_alasan_e']").removeAttr("readonly").focus();
            } else {
                $("[name='kesediaan_alasan_e']").attr("readonly", true).val("");
            }
        });
        $('#terbatas_fisik_e').on('select2:select', function(e) {
            let value = e.params.data;
            //console.log(value.id)
            if (value.id == "Lain-lain....") {
                $("#terbatas_fisik_lain_e").removeAttr("readonly").focus();
            }
        });
        $('#terbatas_fisik_e').on('select2:unselect', function(e) {
            let value = e.params.data;
            if (value.id == "Lain-lain....") {
                $("#terbatas_fisik_lain_e").attr("readonly", true).val("");
            }
        });

        $('#hambatan_e').on('select2:select', function(e) {
            let value = e.params.data;
            console.log(value.text)
            //console.log(value.id)
            if (value.text == "Lain-lain...") {
                $("#hambatan_lain_e").removeAttr("readonly").focus();
            }
        });
        $('#hambatan_e').on('select2:unselect', function(e) {
            let value = e.params.data;
            if (value.text == "Lain-lain...") {
                $("#hambatan_lain_e").attr("readonly", true).val("");
            }
        });

        $('#kebutuhan_edukasi_e').on('select2:select', function(e) {
            let value = e.params.data;
            // console.log(value.id)
            //console.log(value.id)
            if (value.id == "Lain-lain") {
                $("#kebutuhan_edukasi_lain_e").removeAttr("readonly").focus();
            }
        });
        $('#kebutuhan_edukasi_e').on('select2:unselect', function(e) {
            let value = e.params.data;
            if (value.id == "Lain-lain") {
                $("#kebutuhan_edukasi_lain_e").attr("readonly", true).val("");
            }
        });

        $("[name='sasaran_edukasi_e']").on("click", function() {
            let value = $(this).val();
            if (value == "keluarga") {
                $("#hubungan_keluarga_e").removeAttr("readonly").focus();
            } else {
                $("#hubungan_keluarga_e").attr("readonly", true).val("");
            }
        })

        // dinamis topik edukasi
        $("#topik_e").on("change", function() {
            let val = $(this).val();
            $.ajax({
                type: "GET",
                url: base_url + "rajal/get_topik_list",
                data: {
                    "id": val
                },
                dataType: "html",
                success: function(response) {
                    // console.log(response)
                    $("#topik_list_e").html(response)
                    var text = $("#topik_e option:selected").text();
                    $(".topik-title").html(text)

                },
                error: function(e) {
                    console.log(e.responseText)
                }
            });
        });

        // tampil_awal();
        tampil_tabel();

    });

    function tampil_awal() {
        var idx = $("#idx_e").val();
        let id = localStorage.getItem("id_rj_iep_"+idx)
        if (id != null) {
            $("#form-data-edukasi-pasien:submit").attr("disabled", true);
            $("#id_rj_iep").val(localStorage.getItem("id_rj_iep_"+idx));
            $("#form-data-edukasi-pasien").addClass("hide");
            $("#form-data-edukasi-pasien-detail").removeClass("hide");
        }

    }

    function tampil_tabel() {
        // var idx = $("#idx_e").val();
        var id = $("#idx_e").val();
        // alert(id)
        if (id) {
            $.ajax({
                type: "GET",
                url: base_url + "rajal/get_edukasi_pasien_detail/" + id,
                data: "data",
                dataType: "html",
                success: function(response) {
                    $("#table-detail-edukasi-pasien tbody").html(response);
                }
            });
        }
       
    }

    function batal() {
        var idx = $("#idx_e").val();
        let id = localStorage.getItem("id_rj_iep_"+idx);

        localStorage.removeItem("id_rj_iep_"+idx)
        $("#form-data-edukasi-pasien-detail").addClass("hide");
        $("#form-data-edukasi-pasien").removeClass("hide");
        $("#form-data-edukasi-pasien:submit").attr("disabled", false);

        hapusEdukasiPasien(idx, id)
    }

    function simpan_detail() {
        let tgl = $("[name='tgl_e']").val();
        let jam = $("[name='jam_e']").val();
        let topik_id = $("[name='topik_e']").val();
        let topik_title = $("[name='topik_e'] option:selected").text();
        let topik_list = $("#topik_list_e").val();
        let metode = $("[name='metode_topik_e']").val();
        let media = $("[name='media_topik_e']").val();
        let sasaran = $("[name='sasaran_topik_e']").val();
        let evaluasi_awal = $("[name='evaluasi_awal_e']").val();
        let pemberi_edukasi_id = $("[name='pemberi_edukasi_e']").val();
        let pemberi_edukasi = $("[name='pemberi_edukasi_e'] option:selected").text();
        let verifikasi = $("[name='verifikasi_e']").val();
        let evaluasi_lanjut = $("[name='evaluasi_lanjut_e']").val();
        let user_daftar = "<?= $detail->user_daftar ?>";
        let id_rj_iep = $("[name='id_rj_iep']").val();
        // console.log(media);
        // return false;
        $.ajax({
            type: "POST",
            url: base_url + "rajal/insert_edukasi_pasien_detail",
            data: {
                tgl: tgl,
                jam: jam,
                topik_id: topik_id,
                topik_title: topik_title,
                topik_list: topik_list,
                metode: metode,
                media: media,
                sasaran: sasaran,
                evaluasi_awal: evaluasi_awal,
                pemberi_edukasi: pemberi_edukasi,
                pemberi_edukasi_id: pemberi_edukasi_id,
                verifikasi: verifikasi,
                evaluasi_lanjut: evaluasi_lanjut,
                user_daftar: user_daftar,
                id_rj_iep: id_rj_iep
            },
            dataType: "json",
            success: function(response) {
                $("#modal-edukasi-pasien").modal("hide")
                tampil_tabel();
            },
            error: function(e) {
                // console.log(e.responseText)
            }
        });
    }
</script>