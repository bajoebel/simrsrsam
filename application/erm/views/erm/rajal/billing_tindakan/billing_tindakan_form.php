<div>
    <input type="hidden" name="id_bi" value="<?= $bt ?>">
    <input type="hidden" name="idx_bi" value="<?= $detail->idx ?>">
    <input type="hidden" name="nomr_bi" value="<?= $detail->nomr ?>">
    <input type="hidden" name="nama_bi" value="<?= $detail->nama_pasien ?>">
    <input type="hidden" name="id_daftar_bi" id="id_daftar_bi" value="<?= $detail->id_daftar ?>">
    <input type="hidden" name="reg_unit_bi" id="reg_unit_bi" value="<?= $detail->reg_unit ?>">
    <input type="hidden" class="form-control" id="unit_minta_id_bi" name="unit_minta_id_bi" value="<?=$detail->id_ruang?>">
    <div class="tab">
        <div id="dokter" class="tab-pane fade in active">
            <div class="form-group">
                <label for="dokter_id_bi" class="col-xs-3 control-label text-right">Nama Dokter</label>
                <div class="col-xs-9 col-md-6">
                    <select name="dokter_id_bi" id="dokter_id_bi" class="form-control select2" style="width:100%">
                        <?php $list = getPegawai([1,2])->result();
                            echo "<option value=''>Pilih Nama Dokter</option>";
                            foreach ($list as $r) { ?>
                            <option value="<?=$r->NRP?>"><?= $r->pgwNama ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="tindakan_dokter_id_bi" class="col-xs-3 control-label text-right">Pilihan Tindakan</label>
                <div class="col-xs-9 col-md-6">
                    <select name="tindakan_dokter_id_bi" id="tindakan_dokter_id_bi" class="form-control select2" style="width:100%">
                        <?php $list = getBillingTindakan(["PROF000003","PROF000002"])->result();
                        echo "<option value=''>Pilihan Tindakan</option>";
                        foreach ($list as $r) { ?>
                            <option value="<?= $r->tlId ?>"><?= $r->tlTitle ." - ".$r->grNama." - ".$r->tarifLayanan  ?></option>
                        <?php    }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="tindakan_dokter_id_bi" class="col-xs-3 control-label text-right">Qty</label>
                <div class="col-xs-9 col-md-1">
                    <input type="number" step="any" name="qty_bi[]" class="form-control" value="1" min="0">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-1 col-md-offset-3">
                    <button type="button" class="btn btn-primary" id="permintaan-billing-btn"><span id="icon_buatpermintaan" class="fa fa-save"></span> Simpan</button>
                </div>
            </div>
            <input type="hidden" name="tlid_bi" id="tlid_bi" name="" value="<?= $gt->tlId?>">
            <input type="hidden" name="title_bi" id="title_bi" name="" value="<?= $gt->tlTitle?>">
            <input type="hidden" name="sarana_bi" id="sarana_bi" name="" value="<?= $gt->jasaSarana?>">
            <input type="hidden" name="pelayanan_bi" id="pelayanan_bi" name="" value="<?= $gt->jasaPelayanan?>">
            <input type="hidden" name="layanan_bi" id="layanan_bi" name="" value="<?= $gt->jasaPelayanan?>">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <table class="table" width="100%">
                <thead>
                    <tr class="bg-green text-white">
                        <th>#</th>
                        <th>Title</th>
                        <th width="10%">Qty</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="detail_tindakan_bi">
                    <?php $getData = getBillingTindakanDetail($bt);
                    if ($getData->num_rows()>0) {
                        $no=1;foreach($getData->result() as $gt) {?>
                        <tr>
                            <input type="hidden" name="tlid_bi[]" name="" value="<?= $gt->tlId?>">
                            <input type="hidden" name="title_bi[]" name="" value="<?= $gt->tlTitle?>">
                            <input type="hidden" name="sarana_bi[]" name="" value="<?= $gt->jasaSarana?>">
                            <input type="hidden" name="pelayanan_bi[]" name="" value="<?= $gt->jasaPelayanan?>">
                            <input type="hidden" name="layanan_bi[]" name="" value="<?= $gt->jasaPelayanan?>">
                            <td><input type="checkbox" name="tindakan_bi[]" value="<?=$gt->tlId?>" checked="checked"></td>
                            <td><?= $gt->tlTitle." - ".$gt->tarifLayanan?></td>
                            <td><input type="number" step="any" name="qty_bi[]" class="form-control" value="<?=$gt->qty?>" min="0"></td>
                            <td><button type="button"  class="btn btn-xs btn-danger" onclick="$(this).parent().parent().remove()"><i class="fa fa-trash"></td></td>
                        </tr>
                       
                      <?php   }
                    }
                     ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#dokter_id_bi").val("<?=$detail->dokterJaga?>").trigger("change")
        $("#form-data-billing-tindakan").on("submit",function(e) {
            e.preventDefault();
            let url = base_url + "rajal/insert_billing_tindakan";
            let data_form = $(this).serializeArray();
            const response = addBillingBi(data_form,url);
            if (response.status) {
                console.log(response.msg)
                swal({
                    title: "",
                    text: "Data Berhasil Ditambahkan",
                    icon: "success",
                },function (){
                    reloadPage();
                });
            }
        });

        $("#tindakan_dokter_id_bi_s").on("change",function(){
            let id = $(this).val();
            let text = $("#tindakan_dokter_id_bi :selected").text();
            let ppa = $("#dokter_id_bi :selected").text();
            let data_form = {id : id};
            let url = base_url+"rajal/get_billing_tindakan_detail";
            doAjax(data_form,url).then((data)=> {
                $("#detail_tindakan_bi").append(addTindakanBi(data))
            });
        })

        $(".remove-item").on("click",function() {
            alert("Jalankan disini")
            $(this).parent().remove();
        })

        const addTindakanBi = (data) => {
            let html = `<tr>
                <input type="hidden" name="id_bi[]" name="" value="${data.tlId}">
                <input type="hidden" name="title_bi[]" name="" value="${data.tlTitle}">
                <input type="hidden" name="sarana_bi[]" name="" value="${data.jasaSarana}">
                <input type="hidden" name="pelayanan_bi[]" name="" value="${data.jasaPelayanan}">
                <input type="hidden" name="layanan_bi[]" name="" value="${data.tarifLayanan}">
                <td><input type="checkbox" name="tindakan_bi[]" value="${data.tlId}" checked="checked"></td>
                <td>${data.tlTitle} - ${data.tarifLayanan}</td>
                <td><input type="number" step="any" name="qty_bi[]" class="form-control" value="1" min="0"></td>
                <td><button type="button"  class="btn btn-xs btn-danger" onclick="$(this).parent().parent().remove()"><i class="fa fa-trash"></td>
            </tr>`;
            return html
        }

        const addBillingBi = (data_form,url,method="POST") => {
            try {
                const result =  $.ajax({
                    method: method,
                    url: url,
                    data: data_form,
                    dataType: "json",
                    async : false,
                    success : function (response) {

                    }
                }).responseText;
                return JSON.parse(result);
            }
            catch (err) {
                return JSON.parse(err)
            }
           
        }
    });
</script>