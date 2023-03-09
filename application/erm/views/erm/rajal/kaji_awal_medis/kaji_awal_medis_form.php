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
                <textarea name="diagnosis_kerja_m" id="diagnosis_kerja_m" rows="5" class="form-control">-</textarea>
            </div>
        </div>
        <b>Diagnosis Banding</b>
        <div class="form-group row">
            <div class="col-md-12">
                <textarea name="diagnosis_banding_m" id="diagnosis_banding_m" rows="5" class="form-control">-</textarea>
            </div>
        </div>
        <b>Pemeriksaan Penunjang</b>
        <div class="form-group row">
            <div class="col-md-12">
                <textarea name="penunjang_m" id="penunjang_m" rows="5" class="form-control">-</textarea>
            </div>
        </div>
        <b>Permintaan Pemeriksaan Penunjang</b> 
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
                <textarea name="terapi_m" id="terapi_m" rows="5" class="form-control">-</textarea>
            </div>
        </div>
        <div id="tindakan_ka_bi">
            <?php $tindakan = getPermintaanTindakan($d->idx);
            if ($tindakan) {
            ?>
            <table class="table" >
                <tr class="bg-green text-white">
                    <td colspan="2">
                        PERMINTAAN TINDAKAN
                    </td>
                </tr>
                <tr class="bg-green text-white">
                    <td>Nama Tindakan</td>
                    <td>Qty</td>
                </tr>
                <?php 
                $tindakan_detail =  getPermintaanTindakanDetailById($tindakan->id); 
                foreach($tindakan_detail as $td) {
                ?>
                <tr>
                    <td><?= $td->tlTitle ?></td>
                    <td><?= $td->qty ?></td>
                </tr>
                <?php } ?>
            </table> 
            <?php } ?>
        </div>
        </br>
        <?php $resep = getPermintaanResep($d->idx);;
        if ($resep) {
        ?>
        <table class="table" >
            <tr class="bg-green text-white">
                <td colspan="3">
                    PERMINTAAN RESEP
                </td>
            </tr>
            <tr class="bg-green text-white">
                <td>Nama Obat</td>
                <td>Jenis Obat</td>
                <td>Aturan Pakai</td>
            </tr>
            <?php 
            $resep_detail =  getPermintaanResepDetailById($resep->id); 
            foreach($resep_detail as $rd) {
            ?>
            <tr>
                <td><?= $rd->nama_obat ?></td>
                <td><?= $rd->jenis_obat. " - ".$rd->takaran ?></td>
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
    var id_ruang = "<?= $detail->id_ruang ?>";
    var id_table  = "<?= $am ?>";
</script>
<script>
    $(document).ready(function() {
        // $("[name='auto_detail_m'],[name='allo_detail_m']").wysihtml5();
        // $("#tgl_m").on("change")

        $("#tampil_awal_medis").show();

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
                    disabled : false,
                    tags : true
                });
            } else {
                 $("#allo_detail_m").select2({
                    disabled : true,
                    tags : true
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

        $("#panduan_m").on("change",function (e) { 
            e.preventDefault();
            let kode = $(this).val();
            // if (kode=="") {
            //     swal("Silahkan Pilih Panduan Terlebih Dahulu")
            //     $("#tampil_awal_medis").hide();
            //     return false;
            // }
            if (!id_table) {
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
                        else {
                            swal("Belum Ada Kajian Keperawatan");
                        }
                    
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
            } else {
                $("#tampil_awal_medis").show();
            }
           
        });


        // insert data kaji awal medis
        $("#form-data-kaji-awal-medis").on("submit", function(e) {
            e.preventDefault();
            if ($("#td_m").val() == "") {
                alert("TD wajib diisi");
                return false;
            }

            if ($("#nadi_m").val() == "") {
                alert("Nadi wajib diisi");
                return false;
            }

            if ($("#napas_m").val() == "") {
                alert("Nadi wajib diisi");
                return false;
            }

            if ($("#suhu_m").val() == "") {
                alert("Nadi wajib diisi");
                return false;
            }

            var diagnosis_kerja = CKEDITOR.instances['diagnosis_kerja_m'].getData().replace(/<[^>]*>/gi, '').length;
            if (!diagnosis_kerja) {
                alert("Diagnosis kerja wajib diisi");
                return false;
            }

            var penunjang = CKEDITOR.instances['penunjang_m'].getData().replace(/<[^>]*>/gi, '').length;
            if (!penunjang) {
                alert("Pemeriksaan penunjang wajib diisi");
                return false;
            }

            var banding = CKEDITOR.instances['diagnosis_banding_m'].getData().replace(/<[^>]*>/gi, '').length;
            if (!banding) {
                alert("Diagnosis Banding Wajib diisi");
                return false;
            }

            var terapi = CKEDITOR.instances['terapi_m'].getData().replace(/<[^>]*>/gi, '').length;
            if (!terapi) {
                alert("Terapi dan tindakan wajib diisi");
                return false;
            }

            if ($("#dokter_id_m").val() == "") {
                alert("DPJP wajib diisi");
                return false;
            }

            var data_form = $(this).serializeArray();
            var data_push = [{
                    name: "dokter_m",
                    value: $("#dokter_id_m option:selected").text()
                },
                {
                    name: "kontrol_tujuan_m",
                    value: $("#kontrol_tujuan_id_m option:selected").text()
                },
                {
                    name: "pj_nama_m",
                    value: $("#pj_nama_m").val()
                },
                {
                    name: "diagnosis_kerja_mt",
                    value: CKEDITOR.instances.diagnosis_kerja_m.getData()
                },
                {
                    name: "diagnosis_banding_mt",
                    value: CKEDITOR.instances.diagnosis_banding_m.getData()
                },
                {
                    name: "penunjang_mt",
                    value: CKEDITOR.instances.penunjang_m.getData()
                },
                {
                    name: "terapi_mt",
                    value: CKEDITOR.instances.terapi_m.getData()
                },
            ];
            data_form = $.merge(data_form, data_push)
            // console.log($("#pj_nama_m").val())
            // console.log(data_form);
            // return false;
            $.ajax({
                type: "POST",
                url: base_url + "/rajal/insert_kaji_awal_medis",
                data: data_form,
                dataType: "json",
                beforeSend: function() {
                    $(":submit").attr("disabled", true);
                },
                success: function(response) {
                    // console.log(response)
                    // return false;
                    swal("Success", "Data Berhasil Di Simpan", "success");
                    // $('#form-data-kaji-awal-medis')[0].reset();
                    // console.log(response);
                    $(":submit").attr("disabled", false);
                    getRiwayat(4, <?= $detail->idx ?>);
                    reloadPage();
                },
                error: function(e) {
                    console.log(e)
                }
            });
        })
    });

    function editAwalMedis(idx, id, nomr,stat) {
        $.ajax({
            type: "POST",
            url: base_url + "rajal/edit_awal_medis",
            data: {
                idx: idx,
                id: id,
                nomr: nomr
            },
            dataType: "JSON",
            success: function(response) {
                let data = response.data;
                

                $("#tampil_awal_medis").show()
                $("#cppt_id_m").val(data.cppt_id)
                $("#panduan_m").val(data.kode_m_pk).trigger("change");

                if (stat!=1) {
                    $("[name='hari_m']").val(data.hari)
                    $("[name='tgl_m']").val(data.tgl)
                    $("[name='jam_m']").val(data.jam)
                    $("[name='dokter_id_m']").val(data.dokter_id).trigger("change")
                }


                $("[name='td_m']").val(data.td)
                $("[name='nadi_m']").val(data.nadi)
                $("[name='napas_m']").val(data.napas)
                $("[name='suhu_m']").val(data.suhu)
                // $("[name='fisik_detail_m']").text(data.fisik_detail)
                $("[name='fisik_detail_m[]']").val(data.fisik_detail?.split(";")).trigger("change");
                CKEDITOR.instances['diagnosis_kerja_m'].setData(data.diagnosis_kerja)
                CKEDITOR.instances['diagnosis_banding_m'].setData(data.diagnosis_banding)
                CKEDITOR.instances['penunjang_m'].setData(data.penunjang)
                CKEDITOR.instances['terapi_m'].setData(data.terapi)
                $("[name='kontrol_m']").val(data.kontrol)
                $("[name='kontrol_tanggal_m']").val(data.kontrol_tgl)
                $("[name='kontrol_jam_m']").val(data.kontrol_jam)
                $("[name='kontrol_tujuan_id_m']").val(data.kontrol_tujuan_id).trigger("change")
                $("[name='pj_m']").val(data.pj)
                $("[name='pj_detail_m']").val(data.pj_detail)
                $("[name='pj_nama_m']").val(data.pj_nama)
                if (data.auto) {
                    let auto_detail = data.auto_detail?.split(";");
                    if (Array.isArray(auto_detail)) {
                        auto_detail.forEach((data)=>{
                            if ($("[name='auto_detail_m[]']").find("option[value='" + data + "']").length) {
                                $("[name='auto_detail_m[]']").val(data).trigger('change');
                            } else { 
                                var newOption = new Option(data, data, true, true);
                                $("[name='auto_detail_m[]']").append(newOption).trigger('change');
                            } 
                        });
                    }
                   
                    $("[name='auto_m']").prop("checked", true).trigger("change")
                    $("[name='auto_detail_m[]']").val(auto_detail).trigger("change");
                } else {
                    $("[name='auto_m']").prop("checked", false).trigger("change")
                    $("[name='auto_detail_m[]']").val(null).trigger("change");
                }
                if (data.allo) {
                    let allo_detail = data.allo_detail?.split(";");
                    if (Array.isArray(allo_detail)) {
                        allo_detail.forEach((data)=>{
                        // Set the value, creating a new option if necessary
                            if ($("[name='allo_detail_m[]']").find("option[value='" + data + "']").length) {
                                $("[name='allo_detail_m[]']").val(data).trigger('change');
                            } else { 
                                // Create a DOM Option and pre-select by default
                                var newOption = new Option(data, data, true, true);
                                // Append it to the select
                                $("[name='allo_detail_m[]']").append(newOption).trigger('change');
                            } 
                        });
                    }
                    $("[name='allo_m']").prop("checked", true).trigger("change")
                    $("[name='allo_detail_m[]']").val(allo_detail).trigger("change");
                } else {
                    $("[name='allo_m']").prop("checked", false).trigger("change")
                    $("[name='allo_detail_m[]']").val(null).trigger("change");
                }
                if (data.kontrol) {
                    $("[name='kontrol_m']").prop("checked", true).trigger("change")
                    $("[name='kontrol_tanggal_m']").val(data.kontrol_tgl)
                    $("[name='kontrol_jam_m']").val(data.kontrol_jam)
                } else {
                    $("[name='kontrol_m']").prop("checked", false).trigger("change")
                }

                swal("Silahkan Edit Data")
                $("#modal-riwayat-form").modal("hide")
                $("#am_form").removeClass("hide")
                $("#am_preview").addClass("hide")
            },
            error: function(e) {
                console.log(e)
            }
        });
    }

    function hapusAwalMedis(idx, id) {
        var x = confirm("Yakin Ingin Hapus Data");
        if (x) {
            $.ajax({
                type: "GET",
                url: base_url + `rajal/delete_kaji_awal_medis/${idx}/${id}`,
                data: "data",
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        getRiwayat(4, idx);
                        swal("Success", "Data Berhasil Di Hapus", "success");
                    } else {
                        swal("Failed", "Something Wrong", "error");
                    }
                    reloadPage();
                },
                error: function(e) {
                    console.log(e.responseText);
                }
            });
        }
    }

    function signAwalMedis(idx, id, nomr, dokter) {
        var x = prompt("Masukkan Password");
        if (x != null && x != "") {
            $.ajax({
                type: "post",
                url: base_url + "rajal/cekPin",
                data: {
                    x: x,
                    user: dokter
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == true) {
                        $.ajax({
                            type: "POST",
                            url: base_url + "rajal/sign_awal_medis",
                            data: {
                                idx: idx,
                                id: id,
                                nomr: nomr,
                                dokter: dokter
                            },
                            dataType: "JSON",
                            success: function(response) {
                                // console.log(response)
                                swal("QRCODE berhasil di generate")
                                reloadPage()
                            },
                            error: function(e) {
                                console.log(e.responseText)
                            }
                        });
                    } else {
                        alert("Pin Salah...");
                    }
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }

    }

    function tambahAwalMedis() {
        $("#am_preview").addClass("hide")
        $("#am_form").removeClass("hide")
    }

</script>
<script>
   
</script>