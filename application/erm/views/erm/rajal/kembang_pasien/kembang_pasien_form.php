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

    ul.wysihtml5-toolbar li a[title="Insert image"] {
        display: none;
    }
</style>
<form role="form" id='form-data-kaji-awal' method="post">
    <div class="box-body">
        <input type="hidden" name="idx_k" value="<?= $detail->idx ?>">
        <input type="hidden" name="nomr_k" value="<?= $detail->nomr ?>">
        <input type="hidden" name="nama_k" value="<?= $detail->nama_pasien ?>">
        <input type="hidden" name="user_daftar_k" value="<?= $detail->user_daftar ?>">
        <input type="hidden" name="id_kembang_pasien" id="id_kembang_pasien" value="">
        <div class="form-group row">
            <div class="col-md-2">
                <label for="">Tanggal</label>
                <input type="date" name="tgl_k" id="tgl_k" class="form-control" value="<?= date("Y-m-d") ?>">
            </div>
            <div class="col-md-2">
                <label for="">Jam</label>
                <input type="time" name="jam_k" id="jam_k" class="form-control" value="<?= date("h:i") ?>">
            </div>
            <div class="col-md-3">
                <label for="">Profesional</label>
                <select name="jenis_tenaga_medis_id_k" id="jenis_tenaga_medis_id_k" class="form-control">
                    <option value="">Pilih Profesional</option>
                    <?php foreach ($profesi as $pr) { ?>
                        <option value="<?= $pr->idx ?>"><?= $pr->profesi ?></option>
                    <?php } ?>
                    <!-- <option value="1">Dokter</option>
                    <option value="2">Anastesi</option>
                    <option value="3">Paramedis</option>
                    <option value="4">Apoteker</option>
                    <option value="5">Bidan</option>
                    <option value="6">Analis</option>
                    <option value="7">Penata Anastesi</option>
                    <option value="8">Nutrisionist</option> -->
                </select>
            </div>
            <div class="col-md-5">
                <label for="">Nama Profesional</label>
                <select name="tenaga_medis_id_k" id="tenaga_medis_id_k" class="form-control select2" style="width:100%">

                </select>
            </div>
        </div>
        <div class="form-group row">
            <b>Subyektif</b>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea name="subyektif_k" id="subyektif_k" id="" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <b>Obyektif</b>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea name="obyektif_k" id="obyektif_k" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <b>Assessment</b>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea name="assesment_k" id="assesment_k" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <b>Planning</b>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea name="planning_k" id="planning_k" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <b>Intruksi</b>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea name="instruksi_k" id="instruksi_k" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <!-- <div class="form-group row">
            <b>Review</b>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea name="review_k" id="review_k" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div> -->
    </div>
</form>
<script>
    $(document).ready(function() {
        // $('#subyektif_k,#obyektif_k,#assesment_k,#planning_k,#instruksi_k,#review_k').wysihtml5()
        CKEDITOR.replace('subyektif_k')
        CKEDITOR.replace('obyektif_k')
        CKEDITOR.replace('assesment_k')
        CKEDITOR.replace('planning_k')
        CKEDITOR.replace('instruksi_k')
        // CKEDITOR.replace('review_k')

        // CKEDITOR.replace('#subyektif_k')
        $('#jenis_tenaga_medis_id_k').change(function() {
            pil = this.value;
            id = "";
            list_tenaga_medis(pil, id)
        })

        // insert perkembangan pasien terintegrasi
        $("#form-data-kembang-pasien").on("submit", function(e) {
            e.preventDefault();
            if ($("#jenis_tenaga_medis_id_k").val() == "") {
                alert("Profesional wajib diisi")
                return false;
            }
            if ($("#tenaga_medis_id_k").val() == "") {
                alert("Nama Profesional wajib diisi")
                return false;
            }

            // var subyektif = CKEDITOR.instances['subyektif_k'].getData().replace(/<[^>]*>/gi, '').length;
            // if (!subyektif) {
            //     alert("Subyektif wajib diisi")
            //     return false;
            // }
            // var obyektif = CKEDITOR.instances['obyektif_k'].getData().replace(/<[^>]*>/gi, '').length;
            // if (!obyektif) {
            //     alert("Obyektif wajib diisi")
            //     return false;
            // }
            // var assesment = CKEDITOR.instances['assesment_k'].getData().replace(/<[^>]*>/gi, '').length;
            // if (!assesment) {
            //     alert("Assesment wajib diisi")
            //     return false;
            // }
            // var planning = CKEDITOR.instances['planning_k'].getData().replace(/<[^>]*>/gi, '').length;
            // if (!planning) {
            //     alert("planning wajib diisi")
            //     return false;
            // }
            // var instruksi = CKEDITOR.instances['instruksi_k'].getData().replace(/<[^>]*>/gi, '').length;
            // if (!instruksi) {
            //     alert("intruksi wajib diisi")
            //     return false;
            // }
            // var review = CKEDITOR.instances['review_k'].getData().replace(/<[^>]*>/gi, '').length;
            // if (!review) {
            //     alert("review wajib diisi")
            //     return false;
            // }
            var data_form = $(this).serializeArray();
            var data_push = [{
                    name: "jenis_tenaga_medis_k",
                    value: $("#jenis_tenaga_medis_id_k option:selected").text()
                },
                {
                    name: "tenaga_medis_k",
                    value: $("#tenaga_medis_id_k option:selected").text()
                },
                {
                    name: "subyektif_kt",
                    value: CKEDITOR.instances.subyektif_k.getData()
                }, {
                    name: "obyektif_kt",
                    value: CKEDITOR.instances.obyektif_k.getData()
                },
                {
                    name: "assesment_kt",
                    value: CKEDITOR.instances.assesment_k.getData()
                },
                {
                    name: "planning_kt",
                    value: CKEDITOR.instances.planning_k.getData()
                },
                {
                    name: "instruksi_kt",
                    value: CKEDITOR.instances.instruksi_k.getData()
                },
                // {
                //     name: "review_kt",
                //     value: CKEDITOR.instances.review_k.getData()
                // },
            ];
            data_form = $.merge(data_form, data_push)
            // console.log(data_form);
            // return false;
            $.ajax({
                type: "POST",
                url: base_url + "/rajal/insert_kembang_pasien",
                data: data_form,
                dataType: "json",
                beforeSend: function() {
                    $(":submit").attr("disabled", true);
                },
                success: function(response) {
                    swal("Success", "Data Berhasil Di Simpan", "success");
                    // console.log(response);
                    resetKembangPasien()
                    // $('#subyektif_k,#obyektif_k,#assesment_k,#planning_k,#instruksi_k,#review_k').text("")
                    // console.log(response);
                    $(":submit").attr("disabled", false);
                    getRiwayat(5, <?= $detail->idx ?>);
                    reloadPage();
                },
                error: function(e) {
                    console.log(e)
                }
            });
        })

    });

    function list_tenaga_medis(pil, id) {
        $.ajax({
            type: "POST",
            url: base_url + "rajal/get_tenaga_medis",
            data: {
                "pil": pil
            },
            dataType: "json",
            success: function(response) {
                let data = response.data;
                let html = `<option value=''></option>`;
                $.each(data, function(k, v) {
                    // console.log(id+"--"+v.NRP);
                    if (id == v.NRP) {
                        // console.log("ini sama")
                        html += `<option value="${v.NRP}" selected="selected">${v.pgwNama}</option>`;
                    } else {
                        html += `<option value="${v.NRP}">${v.pgwNama}</option>`;
                    }
                })
                $("#tenaga_medis_id_k").html(html);
            }
        });
    }

    function signKembangPasien(idx, id, nomr, user) {
        var x = prompt("Masukkan Password");
        if (x != null && x != "") {
            $.ajax({
                type: "post",
                url: base_url + "rajal/cekPin",
                data: {
                    x: x,
                    user: user
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == true) {
                        $.ajax({
                            type: "POST",
                            url: base_url + "rajal/sign_kembang_pasien",
                            data: {
                                idx: idx,
                                id: id,
                                nomr: nomr,
                                user: user
                            },
                            dataType: "JSON",
                            success: function(response) {
                                reloadPage();
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

    function hapusKembangPasien(idx, id) {
        var x = confirm("Yakin Ingin Hapus Data");
        if (x) {
            $.ajax({
                type: "GET",
                url: base_url + `rajal/delete_kembang_pasien/${idx}/${id}`,
                data: "data",
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        getRiwayat(5, idx);
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
    function tambahKembangPasien() {
        $("#kp_preview").addClass("hide")
        $("#kp_form").removeClass("hide")
    }
    
    function editKembangPasien(idx, id, nomr) {
        $.ajax({
            type: "POST",
            url: base_url + "rajal/edit_kembang_pasien",
            data: {
                idx: idx,
                id: id,
                nomr: nomr
            },
            dataType: "JSON",
            success: function(response) {
                let data = response.data;
                $("[name='id_kembang_pasien']").val(data.id);
                $("[name='tgl_k']").val(data.tgl);
                $("[name='jam_k']").val(data.jam);
                $("[name='jenis_tenaga_medis_id_k']").val(data.jenis_tenaga_medis_id);
                //$("[name='tenaga_medis_id_k']").val(data.tenaga_medis_id).trigger("change");
                // $("subyektif_k").text(data.subyektif);
                CKEDITOR.instances['subyektif_k'].setData(data.subyektif)
                CKEDITOR.instances['obyektif_k'].setData(data.obyektif)
                CKEDITOR.instances['assesment_k'].setData(data.assesment)
                CKEDITOR.instances['planning_k'].setData(data.planning)
                CKEDITOR.instances['instruksi_k'].setData(data.instruksi)
                // CKEDITOR.instances['review_k'].setData(data.review)

                list_tenaga_medis(data.jenis_tenaga_medis_id, data.tenaga_medis_id);
                $("#kp_form").removeClass("hide")
                $("#kp_preview").addClass("hide")
                swal("Silahkan Edit Data")
            },
            error: function(e) {
                console.log(e)
            }
        });
    }

    function signKembangPasienDpjp(idx, id, nomr, user) {
        $("[name='idDpjp']").val(id);
        $("[name='idxDpjp']").val(idx);
        $("[name='nomrDpjp']").val(nomr);
        $("[name='userDpjp']").val(user);
        $("#modal-kembang-pasien-review-form").modal("show")
    }

    function signReviewDpjp(idx, id, nomr, user) {
        $("#sign_dpjp_idx").val(idx)
        $("#sign_dpjp_id").val(id)
        $("#sign_dpjp_nomr").val(nomr)
        // $("#sign_dpjp_user").val(user)
        $("#modal-sign-dpjp").modal("show")
    }

    function SaveSignReviewDpjp() {
        var form_data = $("#form-sign-dpjp").serializeArray()
        if ($("#sign_dpjp_review").val() == "") {
            swal("Review Wajib Diisi")
            return false;
        }
        if ($("#sign_dpjp_pass").val() == "") {
            swal("Password Wajib Diisi")
            return false;
        }
        $.ajax({
            method: "POST",
            url: base_url + "rajal/sign_review_dpjp",
            data: form_data,
            dataType: "json",
            success: function(response) {
                if (response.status) {
                    reloadPage()
                } else {
                    swal(response.msg)
                }
                 $("#modal-sign-dpjp").modal("hide")
                
                console.log(response)
            }
        }).done(function(data) {
            console.log(data)
        });
    }

    function resetKembangPasien() {
        $('#form-data-kembang-pasien')[0].reset();
        CKEDITOR.instances['subyektif_k'].setData('');
        CKEDITOR.instances['obyektif_k'].setData('');
        CKEDITOR.instances['assesment_k'].setData('');
        CKEDITOR.instances['planning_k'].setData('');
        CKEDITOR.instances['instruksi_k'].setData('');
        // CKEDITOR.instances['review_k'].setData('');
        $("[name='id_kembang_pasien']").val("");
        $("[name='tenaga_medis_id_k']").val("");
        $("[name='tenaga_medis_id_k']").val("");
    }
</script>