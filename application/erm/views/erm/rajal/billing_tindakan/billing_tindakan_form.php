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
                <label for="dokter_id_bi" class="col-xs-3 control-label text-right">Profesional Pemberi Asuhan</label>
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
                    <input type="number" step="any" name="qty_bi" id="qty_bi" class="form-control" value="1" min="0">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-1 col-md-offset-3">
                    <button type="button" class="btn btn-primary" id="permintaan-billing-btn"><span id="icon_buatpermintaan" class="fa fa-save"></span> Simpan</button>
                </div>
            </div>
            <input type="hidden" name="tlid_bi" id="tlid_bi" value="">
            <input type="hidden" name="title_bi" id="title_bi" value="">
            <input type="hidden" name="sarana_bi" id="sarana_bi" value="">
            <input type="hidden" name="pelayanan_bi" id="pelayanan_bi" value="">
            <input type="hidden" name="layanan_bi" id="layanan_bi" value="">
            <input type="hidden" name="ruang_bi" id="ruang_bi" value="">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <table class="table" width="100%" id="table_tindakan_bi">
                <thead>
                    <tr class="bg-green text-white">
                        <th>#</th>
                        <th>Title</th>
                        <th>Tarif Layanan</th>
                        <th width="10%">Qty</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="detail_tindakan_bi">
                    <?php $getData = getBillingTindakanDetail($bt);
                    if ($getData->num_rows()>0) {
                        $no=1;foreach($getData->result() as $gt) {?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $gt->tlTitle." - ".$gt->grNama?></td>
                            <td><?= $gt->tarifLayanan ?></td>
                            <td><?= $gt->qty ?></td>
                            <td>
                                <button type="button" data-id="<?=$gt->id?>"  class="btn btn-xs btn-danger tindakan-hapus" ><i class="fa fa-trash"></td>
                            </td>
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

        $("#permintaan-billing-btn").on("click",function(){
            let data_form = {
                idx :  $("[name='idx_bi']").val(),
                nomr :  $("[name='nomr_bi']").val(),
                nama :  $("[name='nama_bi']").val(),
                id :  $("[name='id_bi']").val(),
                id_daftar :  $("#id_daftar_bi").val(),
                reg_unit :  $("#reg_unit_bi").val(),
                tlId :  $("#tlid_bi").val(),
                tlTitle :  $("#title_bi").val(),
                jasaSarana :  $("#sarana_bi").val(),
                jasaPelayanan :  $("#pelayanan_bi").val(),
                tarifLayanan :  $("#layanan_bi").val(),
                grNama :  $("#ruang_bi").val(),
                qty :  $("#qty_bi").val(),
                ppa_id : $("#dokter_id_bi").val(),
                ppa_name : $("#dokter_id_bi :selected").text(),
            }

            let url = base_url+"rajal/insert_billing_tindakan_detail";
            doAjax(data_form,url).then((data)=>{
                if (data.status) {
                    $("#detail_tindakan_bi").load(window.location + " #detail_tindakan_bi>*");
                }
            })
        })

        $("#tindakan_dokter_id_bi").on("change",function(){
            let id = $(this).val();
            let data_form = {id : id};
            let url = base_url+"rajal/get_billing_tindakan_detail";
            doAjax(data_form,url).then((data)=> {
                // console.log(data)
                fillTindakanBi(data)
            });
        })

        $(document).on("click",".tindakan-hapus",function (){
            let id = $(this).data('id');
            let data_form = {id}
            let url = base_url+"rajal/delete_billing_tindakan_detail";
            doAjax(data_form,url).then((data)=>{
                reloadBillingBi(data);
            })
        })

        const fillTindakanBi = (data) => {
            // console.log(data)
            $("#tlid_bi").val(data.tlId);
            $("#title_bi").val(data.tlTitle);
            $("#sarana_bi").val(data.jasaSarana);   
            $("#pelayanan_bi").val(data.jasaPelayanan);
            $("#layanan_bi").val(data.tarifLayanan);
            $("#ruang_bi").val(data.grNama);
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

        const reloadBillingBi = (data) => {
            if (data.status) {
                $("#detail_tindakan_bi").load(window.location + " #detail_tindakan_bi>*");
                $("#tindakan_ka_bi").load(window.location + " #tindakan_ka_bi>*");
            }
        }
    });
</script>