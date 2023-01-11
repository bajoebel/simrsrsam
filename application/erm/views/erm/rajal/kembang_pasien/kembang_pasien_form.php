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
                    <?php foreach($profesi as $pr) { ?>
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
        <div class="form-group row">
            <b>Review</b>
            <div class="form-group row">
                <div class="col-md-12">
                    <textarea name="review_k" id="review_k" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
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
        CKEDITOR.replace('review_k')

        // CKEDITOR.replace('#subyektif_k')
        $('#jenis_tenaga_medis_id_k').change(function() {
            pil = this.value;
            id = "";
            list_tenaga_medis(pil,id)
        })
    });
    function list_tenaga_medis(pil,id) {
        $.ajax({
            type: "POST",
            url: base_url+"rajal/get_tenaga_medis",
            data: {
                "pil" : pil
            },
            dataType: "json",
            success: function (response) {
                let data = response.data;
                let html =`<option value=''></option>`;
                $.each(data,function (k,v) {
                    // console.log(id+"--"+v.NRP);
                    if (id==v.NRP) {
                        // console.log("ini sama")
                        html+=`<option value="${v.NRP}" selected="selected">${v.pgwNama}</option>`;
                    } else {
                        html+=`<option value="${v.NRP}">${v.pgwNama}</option>`;
                    }
                })
                $("#tenaga_medis_id_k").html(html);
            }
        });
    }
</script>
</script>