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

    .custom-input:read-only {
        background-color: #eee;
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

    table.fisik tr,
    table.fisik td {
        padding: 5px 2px;
    }
</style>
<div class="box-body">
    <!-- <?php print_r($detail) ?> -->
    <input type="hidden" name="idx_m" value="<?= $detail->idx ?>">
    <input type="hidden" name="nomr_m" value="<?= $detail->nomr ?>">
    <input type="hidden" name="nama_m" value="<?= $detail->nama_pasien ?>">
    <input type="hidden" name="user_daftar_m" value="<?= $detail->user_daftar ?>">
    <input type="hidden" name="cppt_id_m" id="cppt_id_m" value="">
    <div class="form-group row">
        <div class="col-md-6">
            <label for="">Pilihan Panduan Praktek Klinik</label>
            <select name="panduan_m" id="panduan_m" class="form-control select2" style="width:100%">
                <option value="">==Silahkan Pilih==</option>
                <?php $panduan = getPanduanKlinik(); ?>
                <?php if ($panduan) {
                    foreach ($panduan as $pd) {?>
                    <option value="<?= $pd->kode ?>"><?= $pd->name?></option>
                 <?php }
                } ?>
            </select>
        </div>
         <div class="col-md-6">
            <label for="">Deskripsi</label>
            <textarea name="definisi_m" id="definisi_m" class="form-control" rows="5" readonly></textarea>
        </div>
    </div>
    <hr>
    <div id="tampil_awal_medis">
        <div class="form-group row">
            <div class="col-md-2">
                <label for="">Hari</label>
                <select name="hari_m" id="hari_m" class="form-control">
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
                <input type="date" name="tgl_m" id="tgl_m" class="form-control" value="<?= date("Y-m-d") ?>">
            </div>
            <div class="col-md-2">
                <label for="">Jam</label>
                <input type="time" name="jam_m" id="jam_m" class="form-control" value="<?= date("h:i")?>">
            </div>
        </div>
        <b>Anamnesis</b>
        <div class="form-group row">
            <div class="col-md-2">
                <input type="checkbox" name="auto_m" value="1" class="form-checkbox"> Auto
            </div>
            <div class="col-md-8">
                auto detail
                <select name="auto_detail_m[]" id="auto_detail_m" class="form-control select2" multiple="multiple" style="width:100%">
                    <?= $anamnesis = getPemeriksaan("anamnesis");
                    foreach ($anamnesis as $an) {?>
                        <option value="<?=$an->name?>"><?=$an->name?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                <input type="checkbox" name="allo_m" value="1" class="form-checkbox"> Allo
            </div>
            <div class="col-md-8">
                allo detail
                <select name="allo_detail_m[]" id="allo_detail_m" class="form-control select2" multiple="multiple" style="width:100%">
                    <?php foreach ($anamnesis as $an) {?>
                        <option value="<?=$an->name?>"><?=$an->name?></option>
                    <?php } ?>
            </select>
            </div>
        </div>
        <b>Pemerikasaan Fisik</b>
        <div class="form-group row">
            <div class="col-md-4">
                <table class="fisik">
                    <tr>
                        <td width="100px">TD</td>
                        <td><input type="text" name="td_m" id="td_m" class="custom-input w-100"></td>
                        <td>mmHG</td>
                    </tr>
                    <tr>
                        <td>Nadi</td>
                        <td><input type="text" name="nadi_m" id="nadi_m" class="custom-input w-50"></td>
                        <td>x/i</td>
                    </tr>
                    <tr>
                        <td>Pernapasan</td>
                        <td><input type="text" name="napas_m" id="napas_m" class="custom-input w-50"></td>
                        <td>x/i</td>
                    </tr>
                    <tr>
                        <td>Suhu</td>
                        <td><input type="text" name="suhu_m" id="suhu_m" class="custom-input w-50"></td>
                        <td>&deg;C</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <!-- <textarea name="fisik_detail_m" id="fisik_detail_m" rows="10" class="form-control"></textarea> -->
                <b>Detail pemeriksaan fisik</b>
                <select name="fisik_detail_m[]" id="fisik_detail_m" class="form-control select2-tag" style="width:100%" multiple="multiple">
                     <?php $fisik = getPemeriksaan("fisik");foreach ($fisik as $fs) {?>
                        <option value="<?=$fs->name?>"><?=$fs->name?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <b>Diagnosis Kerja</b>
        <div class="form-group row">
            <div class="col-md-12">
                <textarea name="diagnosis_kerja_m" id="diagnosis_kerja_m" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <b>Diagnosis Banding</b>
        <div class="form-group row">
            <div class="col-md-12">
                <textarea name="diagnosis_banding_m" id="diagnosis_banding_m" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <b>Pemeriksaan Penunjang</b>
        <div class="form-group row">
            <div class="col-md-12">
                <textarea name="penunjang_m" id="penunjang_m" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <b>Permintaan Pemeriksaan Penunjang</b> <a href="#tab_7" onclick="getRiwayat(7,<?= $d->idx ?>)" data-toggle="tab">Tambah Permintaan</a></br>
        <div class="form-group row">
            <div class="col-md-12">
                <?php $penunjang_m = getPermintaanPenunjang($d->idx); 
                if ($penunjang_m) {?>
                <table class="table table-bordered">
                    <tr class="bg-green text-white">
                        <td>Jenis Pemeriksaan</td>
                        <td>Detail Pemeriksaan</td>
                    </tr>
                    <?php foreach ($penunjang_m as $pr) {
                        $penunjang_detail = getPermintaanPenunjangDetail($pr->id)    
                    ?>
                        <tr>
                            <td><?= $pr->group_name ?></td>
                            <td>
                                <?php 
                                    if ($penunjang_detail) {
                                        foreach($penunjang_detail as $prd) { 
                                ?>
                                        <?= $prd->tlTitle." : ".$prd->hasil ?><br/>
                                <?php }
                                    } 
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table> 
                <?php } ?>
            </div>
        </div>
        <b>THERAPI/TINDAKAN</b>
        <div class="form-group row">
            <div class="col-md-12">
                <textarea name="terapi_m" id="terapi_m" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <b>Permintaan THERAPI</b> <a href="#tab_8" onclick="getRiwayat(8,<?= $d->idx ?>)" data-toggle="tab">Tambah Permintaan</a></br>
        <?php $resep = getPermintaanResep($d->idx);;
        if ($resep) {
        ?>
        <table class="table" >
            <tr class="bg-green text-white">
                <td colspan="2">
                    PERMINTAAN RESEP
                </td>
            </tr>
            <tr class="bg-green text-white">
                <td>Nama Obat</td>
                <td>Aturan Pakai</td>
            </tr>
            <?php 
            $resep_detail =  getPermintaanResepDetailById($resep->id); 
            foreach($resep_detail as $rd) {
            ?>
            <tr>
                <td><?= $rd->nama_obat ?></td>
                <td><?= $rd->aturan_pakai ?></td>
            </tr>
            <?php } ?>
        </table> 
        <?php } ?>
        <br/>
        <div class="form-group row">
            <div class="col-md-12">
                <label for="">Kontrol Ulang</label>
            </div>
            <div class="col-md-8" style="display:flex;justify-content: space-between;">
                <label class="checkbox-inline">
                    <input type="checkbox" name="kontrol_m" id="kontrol_m" value="1">Kembali Kontrol
                </label>
                <label for="" class="checkbox-inline">Hari/Tanggal</label>
                <label class="checkbox-inline">
                    <input type="date" name="kontrol_tanggal_m" id="kontrol_tanggal_m" class="form-control" placeholder="Tanggal...." readonly>
                </label>
                <label class="checkbox-inline">
                    <input type="time" name="kontrol_jam_m" id="kontrol_jam_m" class="form-control" placeholder="Jam...." readonly>
                </label>
                <label class="checkbox-inline">
                    Tujuan
                </label>
            </div>
            <div class="col-md-4">
                <select name="kontrol_tujuan_id_m" id="kontrol_tujuan_id_m" class="form-control select2-tag" style="width:100%" disabled >
                    <option value="">== Pilih ==</option>
                    <?php foreach ($ruang as $r) { ?>
                        <option value="<?= $r->idx ?>"><?= $r->ruang ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <label for="">Telah di jelaskan kepada</label>
                <label class="radio-inline">
                    <input type="radio" name="pj_m" value="pasien" checked>Pasien
                </label>
                <label class="radio-inline">
                    <input type="radio" name="pj_m" value="keluarga">Keluarga, Hubungan <input type="text" name="pj_detail_m" id="pj_detail_m" class="custom-input w-200" readonly>
                </label>
                <label for="">Nama</label>
                <input type="text" nama="pj_nama_m" id="pj_nama_m" class="custom-input w-200">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="">DPJP</label>
                <select name="dokter_id_m" id="dokter_id_m" class="form-control select2" style="width:100%">
                    <?php $list = getPegawai([1,2])->result();
                        echo "<option value=''>Pilih Nama Dokter</option>";
                        foreach ($list as $r) { ?>
                        <option value="<?=$r->NRP?>"><?= $r->pgwNama ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
</div>
<script>
    var idx = "<?= $detail->idx ?>";
    var id_ruang = <?= $detail->id_ruang ?>;
</script>
<script>
    $(document).ready(function() {
        // $("[name='auto_detail_m'],[name='allo_detail_m']").wysihtml5();
        // $("#tgl_m").on("change")

        CKEDITOR.replace("diagnosis_kerja_m")
        CKEDITOR.replace("diagnosis_banding_m")
        CKEDITOR.replace("penunjang_m")
        CKEDITOR.replace("terapi_m")

        $("#auto_detail_m").select2({
            disabled : true,
            tags : true
        });
        $("#allo_detail_m").select2({
            disabled : true,
            tags : true
        });

        // $("#tampil_awal_medis").hide();

        $("#dokter_id_m").val("<?=$detail->dokterJaga?>").trigger("change")
        // auto
        $("[name='auto_m']").change(function() {
            if ($(this).is(":checked")) {
                // $("#auto_detail_m").removeAttr("readonly").focus();
                $("#auto_detail_m").select2({
                    disabled : false,
                    tags : true
                });
            } else {
                // $("#auto_detail_m").attr('readonly', true).val("");
                $("#auto_detail_m").select2({
                    disabled : true,
                    tags : true
                });
            }
        });

        // allo
        $("[name='allo_m']").change(function() {
            if ($(this).is(":checked")) {
                $("#allo_detail_m").select2({
                    disabled : false
                });
            } else {
                 $("#allo_detail_m").select2({
                    disabled : true
                });
            }
        });

        // kontrol ulang
        $("[name='kontrol_m']").change(function() {
            if ($(this).is(":checked")) {
                $("#kontrol_tanggal_m").removeAttr("readonly").focus()
                $("#kontrol_jam_m").removeAttr("readonly")
                $("#kontrol_tujuan_id_m").removeAttr("disabled").val(id_ruang).trigger("change")
            } else {
                $("#kontrol_tanggal_m").attr('readonly', true).val("");
                $("#kontrol_jam_m").attr('readonly', true);
                $("#kontrol_tujuan_id_m").attr("disabled", true).val("").trigger("change")
            }
        });

        $("input[name=pj_m][value='keluarga']").click(function() {
            $("#pj_detail_m").removeAttr("readonly").focus();
            $("#pj_nama_m").val("");
        })
        
        $("input[name=pj_m][value='pasien']").click(function() {
            $("#pj_detail_m").attr("readonly", true).val("");
            $("#pj_nama_m").val("<?=$p->nama?>");
        })

        $("input[name=pj_m][value='pasien']").trigger("click")


        $("#td_m").inputmask({
            "mask": "999/99"
        });
        $("#nadi_m,#napas_m,#suhu_m").inputmask({
            "mask": "99"
        });

        $("#panduan_m").change(function (e) { 
            e.preventDefault();
            let kode = $(this).val();
            if (kode=="") {
                swal("Silahkan Pilih Panduan Terlebih Dahulu")
                $("#tampil_awal_medis").hide();
                return false;
            }
            $.ajax({
                url: base_url+"rajal/get_panduan_klinik",
                data: {
                    kode : kode,
                    idx : idx
                },
                method: "POST",
                dataType: "json",
                success: function (response) {
                    // console.log(response)
                    // if (response.status==true) {
                        let utama = response.utama;
                        let detail = response.detail;
                        let rawat = response.rawat;
                        $("#definisi_m").text(utama.definisi);
                        // var fisik_html = `<option value="">== Silahkan Pilih ==</option>`;
                        // var fisik = detail.filter((task)=> task.tipe="fisik");
                        // fisik.forEach(el => {
                        //     fisik_html+= `<option value="${el.name}">${el.name}<option>`;
                        // });
                        // $("#fisik_detail_m").html(fisik_html);
                        // var anamnesis_html = ``;
                        // var anamnesis = detail.filter((task)=> task.tipe="anamnesis")
                        //  anamnesis.forEach(el => {
                        //     anamnesis_html+= `<option value="${el.name}">${el.name}<option>`;
                        // });
                        // $("#fisik_detail_m").html(fisik_html);
                        // $("#auto_detail_m").html(anamnesis_html);
                        // $("#allo_detail_m").html(anamnesis_html);
                        var dk = utama.diagnosis_kerja||$("#panduan_m").select2('data')[0]['text'];
                        CKEDITOR.instances['diagnosis_kerja_m'].setData(dk)
                        // CKEDITOR.instances['diagnosis_banding_m'].setData(utama.diagnosis_banding)
                        // CKEDITOR.instances['penunjang_m'].setData(utama.pemeriksaan_penunjang)
                        // CKEDITOR.instances['terapi_m'].setData(utama.terapi)
                        
                        if (rawat) {
                            $("#td_m").val(rawat.ttv_td+"/"+rawat.ttv_ds);
                            $("#nadi_m").val(rawat.ttv_nd);
                            $("#napas_m").val(rawat.ttv_rr);
                            $("#suhu_m").val(rawat.ttv_sh);
                        } 
                        // else {
                        //     swal("Belum Ada Kajian Keperawatan");
                        // }
                      
                        $("#tampil_awal_medis").show();
                    // } 
                    // else {
                    //     swal("Referensi Tidak Ditemukan")
                    //     $("#definisi_m").text("");
                    //     CKEDITOR.instances['diagnosis_kerja_m'].setData("")
                    //     CKEDITOR.instances['diagnosis_banding_m'].setData("")
                    //     CKEDITOR.instances['penunjang_m'].setData("")
                    //     CKEDITOR.instances['terapi_m'].setData("")
                    //     $("#fisik_detail_m").html("");
                    //     $("#auto_detail_m").html("");
                    //     $("#allo_detail_m").html("");
                    // }
                },
                error : function (e) {
                    console.log(e)
                }
            });
        });

    });
</script>
<script>
   
</script>