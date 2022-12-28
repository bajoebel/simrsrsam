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
    <div class="box-body">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#pilk_1" data-toggle="tab" aria-expanded="true">Data Awal</a></li>
                <li class="active"><a href="#pilk_2" data-toggle="tab" aria-expanded="true">Pilihan Edukasi</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="#pilk_1">
                    <b>How to use:</b>

                    <p>Exactly like the original bootstrap tabs except you should use
                        the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
                    A wonderful serenity has taken possession of my entire soul,
                    like these sweet mornings of spring which I enjoy with my whole heart.
                    I am alone, and feel the charm of existence in this spot,
                    which was created for the bliss of souls like mine. I am so happy,
                    my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                    that I neglect my talents. I should be incapable of drawing a single stroke
                    at the present moment; and yet I feel that I never was a greater artist than now.
                </div>
                <div class="tab-pane active" id="#pilk_2">
                    <b>How to use:</b>

                    <p>Exactly like the original bootstrap tabs except you should use
                        the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
                    A wonderful serenity has taken possession of my entire soul,
                    like these sweet mornings of spring which I enjoy with my whole heart.
                    I am alone, and feel the charm of existence in this spot,
                    which was created for the bliss of souls like mine. I am so happy,
                    my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                    that I neglect my talents. I should be incapable of drawing a single stroke
                    at the present moment; and yet I feel that I never was a greater artist than now.
                </div>
            </div>
        </div>
        <input type="hidden" name="idx" value="<?= $detail->idx ?>">
        <input type="hidden" name="nomr" value="<?= $detail->nomr ?>">
        <b>Asesmen Kemampuan, Kemauan Belajar</b>
        <p class="text-blue">Pengkajiaan umum</p>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Bahasa</label>
                        <select class="form-control select2" name="bahasa_k[]" id="bahasa_k" multiple="multiple">
                            <option value="">Indonesia</option>
                            <option value="">Daerah</option>
                            <option value="">Isyarat</option>
                            <option value="">Lainnya...</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Bahasa daerah / lain-lain sebutkan</label>
                        <input type="text" class="form-control" name="bahasa_lainnya_k" id="bahasa_lainnya_k" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <label for="">Kebutuhan Penerjemah</label>
                <div class="radio">
                    <label for="" class="radio-inline">
                        <input type="radio" name="penerjemah_k">Ya
                    </label>
                    <label for="" class="radio-inline">
                        <input type="radio" name="penerjemah_k">Tidak
                    </label>
                </div>
            </div>
            <div class="col-md-3">
                <label for="">Agama</label>
                <select name="agama_k" id="agama_k" class="form-control">
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
                <select name="pendidikan_k" id="pendidikan_k" class="form-control">
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
                        <input type="radio" name="kesediaan_k" value="1">Bersedia
                    </label>
                    <label for="" class="radio-inline">
                        <input type="radio" name="kesediaan_k" value="0">Tidak Bersedia (alasan)
                    </label>
                    <label for="" class="radio-inline">
                        <input type="text" class="custom-input w-100" name="kesediaan_alasan_k" id="kesediaan_alasan_k" readonly>
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <label for="">Kemampuan Membaca</label>
                <div class="radio">
                    <label for="" class="radio-inline">
                        <input type="radio" name="baca_k" id="" value="1">Baik
                    </label>
                    <label for="" class="radio-inline">
                        <input type="radio" name="baca_k" id="" value="0">Kurang
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <label for="">Keyakinan dan Nilai-nilai</label>
                <input type="text" class="form-control" name="keyakinan_k" id="keyakinan_k" value="-">
            </div>
            <div class="col-md-4">
                <label for="">Keterbatasan Fisik dan Kognitif</label>
                <div class="row">
                    <div class="col-md-12">
                        <select name="terbatas_fisik_k[]" id="terbatas_fisik_k" class="form-control select2" multiple="multiple">
                            <option value="1">Tidak ada</option>
                            <option value="2">Penglihatan terganggu</option>
                            <option value="3">Pendengaran terganggu</option>
                            <option value="4">Gangguan bicara</option>
                            <option value="5">Fisik lemah</option>
                            <option value="6">Kognitif terbatas</option>
                            <option value="7">Lain-lain....</option>
                        </select>
                    </div>
                    <div class="col-md-12" style="margin-top:5px">
                        <input type="text" class='form-control' placeholder="lainnya..." name="terbatas_fisik_lain_k" id="terbatas_fisik_lain_k" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label for="">Hambatan Emosional dan Motivasi</label>
                <div class="row">
                    <div class="col-md-12">
                        <select name="hambatan_k[]" id="hambatan_k" class="form-control select2" multiple="multiple">
                            <option value="1">Tidak ada</option>
                            <option value="2">Penglihatan Terganggu</option>
                            <option value="3">Emosional Terganggu</option>
                            <option value="4">Lain-lain...</option>
                        </select>
                    </div>
                    <div class="col-md-12 mt-1">
                        <input type="text" class='form-control' name="hambatan_lain_k" id="hambatan_lain_k" placeholder="lainnya..." readonly>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-blue">Assesment Kebutuhan Edukasi</p>
        <div class="form-group row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-8">
                        <select name="kebutuhan_edukasi_k[]" id="kebutuhan_edukasi_k" class="form-control select2" multiple="multiple">
                            <option value="1">Asuhan Medis</option>
                            <option value="2">Asuhan Keperawatan</option>
                            <option value="3">Pengobatan</option>
                            <option value="4">Asuhan Gizi</option>
                            <option value="5">Manajemen nyeri</option>
                            <option value="6">Rehabilitasi</option>
                            <option value="7">Penggunaan alat-alat medis</option>
                            <option value="8">Hand Hygiene</option>
                            <option value="9">Rohani</option>
                            <option value="10">Pendaftaran dan Admisi</option>
                            <option value="11">Prosedur dan Perawatan</option>
                            <option value="12">Lain-lain</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="kebutuhan_edukasi_lain_k" id="kebutuhan_edukasi_lain_k" class="form-control" placeholder="Lainnya..." readonly>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-blue">Perencanaan Edukasi</p>
        <div class="form-group row">
            <div class="col-md-3">
                <label for="">Metode</label>
                <select name="metode_k" id="metode_k" class="form-control select2" multiple="multiple">
                    <option value="1">Diskusi</option>
                    <option value="2">Ceramah</option>
                    <option value="3">Demonstrasi</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="">Media</label>
                <select name="media_k" id="media_k" class="form-control select2" multiple="multiple">
                    <option value="1">Liflet</option>
                    <option value="2">Lembar Balik</option>
                    <option value="3">Audio Visual</option>
                    <option value="4">Lain-lain</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="">Sasaran Edukasi</label>
                <div class="row">
                    <div class="col-md-12">
                        <label class="radio-inline">
                            <input type="radio" name="sasaran_edukasi_k" value="1" checked>Pasien
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="sasaran_edukasi_k" value="2">Keluarga
                        </label>
                    </div>
                    <div class="col-md-12 mt-1">
                        <input type="text" name="hubungan_keluarga_k" id="hubungan_keluarga_k" class="form-control" placeholder="Hubungan keluarga ...." readonly>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</form>
<?php $this->load->view("erm/rajal/informasi_edukasi/informasi_edukasi_detail") ?>

<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM

    });
</script>
<script>
    $(document).ready(function() {
        // $(".select2-tag").select2()
        $(".select2").select2({
            placeholder: 'Silahkan Pilih'
        });
        $(".select2-tag").select2({
            placeholder: 'Silahkan Pilih'
        });

        $('#bahasa_k').on('select2:select', function(e) {
            let value = e.params.data;
            if (value.text == "Lainnya...") {
                $("#bahasa_lainnya_k").removeAttr("readonly").focus();
            }
        });
        $('#bahasa_k').on('select2:unselect', function(e) {
            let value = e.params.data;
            if (value.text == "Lainnya...") {
                $("#bahasa_lainnya_k").attr("readonly", true).val("");
            }
        });
        $('input[type=radio][name=kesediaan_k]').change(function() {
            // console.log($(this).val() == 0)
            if ($(this).val() == 0) {
                $("[name='kesediaan_alasan_k']").removeAttr("readonly").focus();
            } else {
                $("[name='kesediaan_alasan_k']").attr("readonly", true).val("");
            }
        });
        $('#terbatas_fisik_k').on('select2:select', function(e) {
            let value = e.params.data;
            //console.log(value.id)
            if (value.id == 7) {
                $("#terbatas_fisik_lain_k").removeAttr("readonly").focus();
            }
        });
        $('#terbatas_fisik_k').on('select2:unselect', function(e) {
            let value = e.params.data;
            if (value.id == 7) {
                $("#terbatas_fisik_lain_k").attr("readonly", true).val("");
            }
        });

        $('#hambatan_k').on('select2:select', function(e) {
            let value = e.params.data;
            console.log(value.text)
            //console.log(value.id)
            if (value.text == "Lain-lain...") {
                $("#hambatan_lain_k").removeAttr("readonly").focus();
            }
        });
        $('#hambatan_k').on('select2:unselect', function(e) {
            let value = e.params.data;
            if (value.text == "Lain-lain...") {
                $("#hambatan_lain_k").attr("readonly", true).val("");
            }
        });

        $('#kebutuhan_edukasi_k').on('select2:select', function(e) {
            let value = e.params.data;
            console.log(value.id)
            //console.log(value.id)
            if (value.id == "12") {
                $("#kebutuhan_edukasi_lain_k").removeAttr("readonly").focus();
            }
        });
        $('#kebutuhan_edukasi_k').on('select2:unselect', function(e) {
            let value = e.params.data;
            if (value.id == "12") {
                $("#kebutuhan_edukasi_lain_k").attr("readonly", true).val("");
            }
        });

        $("[name='sasaran_edukasi_k']").on("click", function() {
            let value = $(this).val();
            if (value == 2) {
                $("#hubungan_keluarga_k").removeAttr("readonly").focus();
            } else {
                $("#hubungan_keluarga_k").attr("readonly", true).val("");
            }
        })
    });
</script>