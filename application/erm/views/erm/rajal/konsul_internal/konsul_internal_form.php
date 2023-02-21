<!-- <?= print_r($detail)?> -->
<div>
    <div class="form-group">
        <label for="unit_minta_ki" class="col-xs-3 control-label text-right">Unit Yang Meminta</label>
        <div class="col-xs-9 col-md-6">
            <input type="hidden" name="idx_ki" value="<?= $detail->idx ?>">
            <input type="hidden" name="nomr_ki" value="<?= $detail->nomr ?>">
            <input type="hidden" name="nama_ki" value="<?= $detail->nama_pasien ?>">
            <input type="hidden" name="id_daftar_ki" id="id_daftar_ki" value="<?= $detail->id_daftar ?>">
            <input type="hidden" name="reg_unit_ki" id="reg_unit_ki" value="<?= $detail->reg_unit ?>">
            <input type="hidden" class="form-control" id="unit_minta_id_ki" name="unit_minta_id_ki" value="<?=$detail->id_ruang?>">
            <input type="text" class="form-control" id="unit_minta_ki" name="unit_minta_ki" value="<?=$detail->nama_ruang?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="dpjp_minta_ki" class="col-xs-3 control-label text-right">Dokter Yang Meminta</label>
        <div class="col-xs-9 col-md-6">
        <select class="form-control select2" id="dpjp_minta_ki" name="dpjp_minta_ki" style="width:100%">
            <?php $list = getPegawai([1,2])->result();
                echo "<option value=''>Pilih Nama Dokter</option>";
                foreach ($list as $r) { ?>
                <option value="<?=$r->NRP?>"><?= $r->pgwNama ?></option>
            <?php } ?>
        </select>
        </div>
    </div>
    <div class="form-group">
        <label for="unit_diminta_id_ki" class="col-xs-3 control-label text-right">Unit/Sub Unit yang diminta</label>
        <div class="col-xs-9 col-md-6">
            <select class="form-control select2" id="unit_diminta_id_ki" name="unit_diminta_id_ki" style="width:100%">
                <?php $list = getRuang([1])->result();
                    echo "<option value=''>Pilih Nama Unit</option>";
                    foreach ($list as $r) { ?>
                    <option value="<?=$r->idx?>"><?= $r->ruang ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="dpjp_diminta_ki" class="col-xs-3 control-label text-right">Yth. T.S. Dr.(Konsulen) yang diminta</label>
        <div class="col-xs-9 col-md-6">
            <select class="form-control select2" id="dpjp_diminta_ki" name="dpjp_diminta_ki" style="width:100%">
                <?php $list = getPegawai([1,2])->result();
                    echo "<option value=''>Pilih Nama Dokter</option>";
                    foreach ($list as $r) { ?>
                    <option value="<?=$r->NRP?>"><?= $r->pgwNama ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="diagnosa_kerja_ki" class="col-xs-3 control-label text-right">Diagnosa Kerja</label>
        <div class="col-xs-9 col-md-6">
            <textarea name="diagnosa_kerja_ki" id="diagnosa_kerja_ki" class="form-control"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="iktisar_klinik_ki" class="col-xs-3 control-label text-right">Iktisar Klinik</label>
        <div class="col-xs-9 col-md-6">
            <textarea name="iktisar_klinik_ki" id="iktisar_klinik_ki" class="form-control"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="first_name" class="col-xs-3 control-label text-right">Terapi dan tindakan yang sudah diberikan</label>
        <div class="col-xs-9 col-md-6">
            <textarea name="terapi_tindakan_ki" id="terapi_tindakan_ki" class="form-control"  ></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="first_name" class="col-xs-3 control-label text-right">Konsulen diharapkan</label>
        <div class="col-xs-9 col-md-6">
            <label class="checkbox-inline">
                <input type="checkbox" name="konsul_harap_ki[]" value="Alih Rawat">Alih Rawat
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="konsul_harap_ki[]" value="Rawat Bersama">Rawat Bersama
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="konsul_harap_ki[]" value="Kosultasi Sewaktu">Kosultasi Sewaktu
            </label>
        </div>
    </div>
    <div class="form-group">
        <label for="first_name" class="col-xs-3 control-label text-right">Kembali Ke Dokter/Unit yang Meminta sebelum pengobatan</label>
        <div class="col-xs-9 col-md-6">
            <label class="radio-inline">
                <input type="radio" name="kembali_ki" value="1" checked>Ya
            </label>
            <label class="radio-inline">
                <input type="radio" name="kembali_ki" value="0">Tidak
            </label>
        </div>
    </div>
    <div class="form-group">
        <label for="first_name" class="col-xs-3 control-label text-right">Tanggal dan Jam</label>
        <div class="col-xs-4 col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <input type="date" name="tgl_ki" id="tgl_ki" class="form-control" value="<?=date("Y-m-d")?>">
                </div>
                <div class="col-md-6">
                    <input type="time" name="jam_ki" id="jam_ki" class="form-control" value="<?=date("h:i")?>">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-sign-konsul-internal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Generate Barcode</h4>
            </div>
            <form action="javascript:void(0)" id="form-sign-konsul-internal">
                <div class="modal-body">
                    <input type="hidden" name="sign_ki_idx" id="sign_ki_idx">
                    <input type="hidden" name="sign_ki_id" id="sign_ki_id">
                    <input type="hidden" name="sign_ki_nomr" id="sign_ki_nomr">
                    <input type="hidden" name="sign_ki_user" id="sign_ki_user">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="sign_pass_ki" id="sign_pass_ki" placeholder="Enter Password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="SaveSignKonsulInternal()">Generate Barcode</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var dpjp_id = "<?= $detail->dokterJaga?>";
    var ruang_id = "<?=$detail->id_ruang?>"
</script>
<script>
    $(document).ready(function () {
        $("#dpjp_minta_ki").val(dpjp_id).trigger("change");
        $(`#unit_diminta_id_ki option[value='${ruang_id}']`).remove();

         // insert konsul Internal
        $("#form-data-konsul-internal").on("submit", function(e) {
            if ($("#unit_diminta_id_ki").val() == "") {
                swal("Unit yang diminta wajib diisi");
                return false;
            }
            if ($("#dpjp_diminta_ki").val() == "") {
                swal("Dokter Yang diminta wajib diisi");
                return false;
            }
            if ($("#iktisar_klinik_ki").val() == "") {
                swal("Iktisar Klinik wajib diisi cc");
                return false;
            }
            if ($("#terapi_tindakan_ki").val() == "") {
                swal("Terapi Tindakan Wajib diisi");
                return false;
            }
            e.preventDefault();
            let data_form = $(this).serializeArray();
            var data_push = [
                {
                    "name": "dpjp_minta_text_ki",
                    "value": $("#dpjp_minta_ki :selected").text()
                },
                {
                    "name": "dpjp_diminta_text_ki",
                    "value": $("#dpjp_diminta_ki :selected").text()
                },
                {
                    "name": "unit_diminta_ki",
                    "value": $("#unit_diminta_id_ki :selected").text()
                },
            ]
            data_form = $.merge(data_form, data_push);
            // console.log(data_push,data_form)
            // return false;
            $.ajax({
                method: "POST",
                url: base_url + "rajal/insert_konsul_internal",
                data: data_form,
                dataType: "json",
                success: function(response) {
                    console.log(response)
                    swal({
                        title : "Success",
                        text : "Data berhasil ditambahkan"
                    },function(){
                       reloadPage();
                    })
                },
                error: function(e) {
                    console.log(e)
                }
            })
        })
    });

    function hapusKonsulInternal(idx,id) {
        var x = confirm("Yakin Ingin Hapus Data");
        if (x) {
            $.ajax({
                type: "GET",
                url: base_url + `rajal/delete_konsul_internal/${idx}/${id}`,
                data: "data",
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        getRiwayat(9, idx);
                        swal("Success", "Data Berhasil Di Hapus", "success");
                    } else {
                        swal("Failed", "Something Wrong", "error");
                    }
                },
                error: function(e) {
                    console.log(e.responseText);
                }
            });
        }
    }

    function editKonsulInternal(idx, id, nomr) {
        $.ajax({
            method : "POST",
            url: base_url + "rajal/edit_konsul_internal",
            data: {
                idx,id,nomr
            },
            dataType: "json",
            success: function (response) {
                const data = response.data
                $("#dpjp_diminta_ki").val(data.dpjp_diminta).trigger("change")
                $("#unit_diminta_id_ki").val(data.unit_diminta_id).trigger("change")
                $("#iktisar_klinik_ki").val(data.iktisar_klinik)
                $("#terapi_tindakan_ki").val(data.terapi_tindakan)
                $("[name='konsul_harap_ki[]']").val(data.konsul_harap?.split(";"))
                $("[name='kembali_ki']").prop("checked",false);
                $(`[name='kembali_ki'][value='${data.kembali}']`).prop("checked",true);
                $("#tgl_ki").val(data.tgl)
                $("#jam_ki").val(data.jam)
                $(".simpan-konsul-internal").text("Update")
                
            }
        });
    }

    function signKonsulInternal(idx, id, nomr, user) {
        $("#sign_ki_idx").val(idx)
        $("#sign_ki_id").val(id)
        $("#sign_ki_nomr").val(nomr)
        $("#sign_ki_user").val(user)
        $("#modal-sign-konsul-internal").modal("show")
    }

    function SaveSignKonsulInternal() {
        let idx = $("#sign_ki_idx").val();
        let id = $("#sign_ki_id").val();
        let nomr = $("#sign_ki_nomr").val();
        let dokter = $("#sign_ki_user").val();
        let pass = $("#sign_pass_ki").val();
        $.ajax({
            method: "POST",
            url: base_url + "signqrcode/sign_konsul_internal",
            data: {
                idx,id,nomr,dokter,pass
            },
            dataType: "json",
            success: function(response) {
                if (response.status) {
                    reloadPage()
                } else {
                    swal(response.msg)
                }
                 $("#modal-sign-konsul-internal").modal("hide")
                
                console.log(response)
            }
        }).done(function(data) {
            console.log(data)
        });
    }
</script>