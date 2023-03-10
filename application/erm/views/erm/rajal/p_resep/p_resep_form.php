<style>
    .tab-content{
        /* border: 1px solid #ddd; */
        /* border-collapse:collapse; */
        padding: 10px;
        background: #fff;
    }
    .error-message{
        color:#dd4b39;
    }
    .form-control {
        margin-bottom:10px;
    }
</style>
<?php 
$permintaan_resep = getPermintaanResep($detail->idx) ;
if (!$permintaan_resep) { ?>
    <div class="row">
        <div class="col-md-12">
            <form action="" id="form-permintaan-resep" metode="POST">
                <input type="hidden" name="idx_pr" id="idx_pr" value="<?=$detail->idx?>">
                <input type="hidden" name="nomr_pr"  value="<?=$detail->nomr?>">
                <input type="hidden" name="nama_pr"  value="<?=$detail->nama_pasien?>">
                <input type="hidden" name="id_daftar_pr"  value="<?=$detail->id_daftar?>">
                <input type="hidden" name="reg_unit_pr"  value="<?=$detail->reg_unit?>">
                <input type="hidden" name="dpjp_pr"  value="<?=$detail->dokterJaga?>">
                <input type="hidden" name="dpjp_name_pr"  value="<?=$detail->namaDokterJaga?>">
                <input type="hidden" name="id_daftar_pr" value="<?=$detail->id_daftar?>">
                <input type="hidden" name="reg_unit_pr" value="<?=$detail->reg_unit?>">
                <input type="hidden" name="id_ruanglama_pr" value="<?=$detail->id_ruanglama?>">
                <input type="hidden" name="nama_ruang_pr" value="<?=$detail->nama_ruang?>">
                <fieldset>
                    <div class="form-group row" style="margin-bottom:20px !important">
                        <label for="" class="col-md-2 control-label">Pilihan Nama Obat</label>
                        <div class="col-md-10">
                            <select name="obat_pr" id="obat_pr" class="form-control" style="width:100%;">
                           
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div id="pilihan_obat">
                        <input type="hidden" id="rj_p_resep_pr" name="rj_p_resep_pr">
                        <div class="form-group row">
                            <label for="" class="col-md-2 control-label">Nama Obat</label>
                            <div class="col-md-10">
                            <input type="text" name="nama_obat_pr" id="nama_obat_pr" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-2 control-label">Jenis Obat</label>
                            <div class="col-md-4">
                                <select type="text" name="jenis_obat_pr" id="jenis_obat_pr" class="form-control">
                                    <option value="non racikan">Non Racikan</option>
                                    <option value="racikan 1">Racikan 1</option>
                                    <option value="racikan 2">Racikan 2</option>
                                    <option value="racikan 3">Racikan 3</option>
                                    <option value="racikan 4">Racikan 4</option>
                                    <option value="racikan 5">Racikan 5</option>
                                    <option value="racikan 6">Racikan 6</option>
                                    <option value="racikan 6">Racikan 6</option>
                                    <option value="racikan 7">Racikan 7</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select type="text" name="takaran_obat_pr" id="takaran_obat_pr" class="form-control">
                                    <option value="">Pilih Takaran</option>
                                    <option value="0.125">1/8 - 0.125</option>
                                    <option value="0.25">2/8 - 0.25</option>
                                    <option value="0.375">3/8 - 0.375</option>
                                    <option value="0.5">4/8 - 0.5</option>
                                    <option value="0.625">5/8 - 0.625</option>
                                    <option value="0.75">6/8 - 0.75</option>
                                    <option value="0.875">7/8 - 0.875</option>
                                    <option value="1">1 - 1</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-2 control-label">Nama Generik</label>
                            <div class="col-md-10">
                            <input type="text" name="generik_pr" id="generik_pr" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-2 control-label">Satuan</label>
                            <div class="col-md-10">
                            <input type="text" name="satuan_pr" id="satuan_pr" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-2 control-label">Aturan Pakai</label>
                            <div class="col-md-10">
                                <textarea name="aturan_pr" id="aturan_pr" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <hr/>
                <div class="form-group">
                    <div class="col-sm-12">
                    <button type="button" class="btn btn-primary"  id="permintaan-resep-btn"><span id="icon_buatpermintaan" class="fa fa-save"></span> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } ?>

<div class="row" style="margin-top:20px">
    <div class="col-md-12" id="tabel_operasi">
        <table class="table table-bordered">
            <thead class="bg-green">
                <tr>
                    <td>No</td>
                    <td>Kode Obat</td>
                    <td>Nama Obat</td>
                    <td>Satuan</td>
                    <td>Jenis Obat</td>
                    <td>Aturan Pakai</td>
                    <td>#</td>
                </tr>
            </thead>
            <tbody id="permintaan_resep">
                <?php $no =1;foreach($pr as $prd) { ?>
                    <tr id="prd_<?=$prd->id?>">
                        <td><?= $no++ ?></td>
                        <td><?= $prd->kode_obat ?></td>
                        <td><?= $prd->nama_obat ?></td>
                        <td><?= $prd->satuan ?></td>
                        <td><?= $prd->jenis_obat." - ".$prd->takaran ?></td>
                        <td><?= $prd->aturan_pakai ?></td>
                        <td>
                            <?php if (!$permintaan_resep) { ?>
                            <button type="button" class="btn btn-xs btn-danger" onclick="hapusObat(<?=$prd->id?>)"><i class="fa fa-trash"></i></button>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <?php if (!$permintaan_resep) { ?>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <button type="button" class="btn btn-primary"  id="permintaan-resep-ajukan-btn"><span class="fa fa-save"></span> Ajukan Ke Farmasi</button>
                    </td>
                </tr>
            </tfoot>
            <?php } else { ?>
            <tfoot>
                <tr>
                    <td>Dokter Pengirim</td>
                    <td colspan="5"><?= $permintaan_resep->dpjp_name ?></td>
                </tr>
                <tr>
                    <td>Status Pengajuan</td>
                    <input type="hidden" id="status_form_pr" name="status_form_pr" value="<?=$permintaan_resep->status_form?>">
                    <td colspan="5"><?= status_permintaan_resep($permintaan_resep->status_form) ?></td>
                </tr>
                <tr>
                    <td colspan="6">
                        <button type="button" class="btn btn-primary" data-idx="<?=$detail->idx?>"  id="permintaan-resep-batal-btn"><span class="fa fa-refresh"></span> Batalkan Pengajuan</button>
                        <a href="<?= base_url("erm.php/rajal/resep/".$detail->idx)?>" target="_blank" type="button" class="btn btn-default" ><span class="fa fa-print"></span> Cetak Resep</a>
                    </td>
                </tr>
               
            </tfoot>
            <?php } ?>
        </table>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#obat_pr").select2({
            ajax: { 
                url: base_url+"rajal/get_pilihan_obat",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            },
            placeholder : "Pilih Obat"
        })
        $("#pilihan_obat").hide();
     
        $("#obat_pr").on("change",function(){
            let pil = $(this).val();
            if (pil=='nonlist') {
                $("#pilihan_obat").show()
                $("#nama_obat_pr").prop("readonly",false).val("")
                $("#nama_obat_pr").focus()
                $("#generik_pr").prop("readonly",false).val("")
                $("#satuan_pr").prop("readonly",false).val("")
            } else {
                $.ajax({
                    url: base_url+"rajal/get_resep",
                    data: {
                        "id" : $(this).val(),
                        "idx" : $("#idx_pr").val()
                    },
                    method : "POST",
                    dataType: "JSON",
                    success: function (response) {
                        let data = response.data;
                        // console.log(response)
                        // console.log(data)
                        if (response.status==true) {
                            $("#pilihan_obat").show();
                            $("#nama_obat_pr").prop("readonly",true).val(data.NMBRG)
                            $("#generik_pr").prop("readonly",true).val(data.NMGENERIK)
                            $("#satuan_pr").prop("readonly",true).val(data.NMSATUAN)
                            $("#rj_p_resep_pr").val(response.id_resep)
                        }
                    }
                });
            }
           
        })

        $("#permintaan-resep-btn").on("click",function(){
            let nama_obat = $("#nama_obat_pr").val();
            let idx = $("#idx_pr").val();
            let kode_obat = $("#obat_pr").val();
            let satuan = $("#satuan_pr").val()
            let aturan_pakai = $("#aturan_pr").val()
            let jenis_obat = $("#jenis_obat_pr").val()
            let takaran = $("#takaran_obat_pr").val()
            if (nama_obat=="") {
                swal("Pilih obat terlebih dahulu")
                return false;
            }
            $.ajax({
                url: base_url+"rajal/insert_resep",
                method : "POST",
                data: {
                    idx : idx,
                    rj_p_resep_id : $("#rj_p_resep_pr").val(),
                    nama_obat : nama_obat,
                    kode_obat : kode_obat,
                    satuan : satuan,
                    aturan_pakai : aturan_pakai,
                    jenis_obat : jenis_obat,
                    takaran : takaran
                },
                dataType: "JSON",
                success: function (response) {
                    console.log(response)
                    if (response.status) {
                        let html = `
                            <tr id="prd_${response.id}">
                                <td>-</td>
                                <td>${kode_obat}</td>
                                <td>${nama_obat}</td>
                                <td>${satuan}</td>
                                <td>${jenis_obat} - ${takaran}</td>
                                <td>${aturan_pakai}</td>
                                <td><button type="button" class="btn btn-xs btn-danger" onclick="hapusObat('${response.id}')"><i class="fa fa-trash"></i></button></td>
                            </tr>
                        `;
                        $("#permintaan_resep").append(html);
                        swal("Data Berhasil Ditambahkan")
                    }
                }
            });
        })

        $("#permintaan-resep-ajukan-btn").on("click",function(){
            let data_form = $("#form-permintaan-resep").serializeArray();
            // console.log(data_form);
            // return false;
            $.ajax({
                url: base_url + "rajal/ajukan_permintaan_resep",
                method : "POST",
                data: data_form,
                dataType: "json",
                success: function (response) {
                    reloadPage();
                    // if (response.status) {
                    //     swal("Data Berhasil Di Ajukan").
                    // }
                }
            });
        })

        $("#permintaan-resep-batal-btn").on("click",function(){
            let status = $("#status_form_pr").val();
            if (status==2 || status==3) {
                swal("Status sudah di proses bagian farmasi")
                return false;
            }
            let idx = $(this).data("idx");
            $.ajax({
                url: base_url + "rajal/batalkan_permintaan_resep",
                method : "POST",
                data: {
                    idx : idx
                },
                dataType: "json",
                success: function (response) {
                    if (response.status) {
                        reloadPage();
                    }
                }
            });
        })
    });

    function hapusObat(id) {
        $.ajax({
            method : "POST",
            url: base_url+ "rajal/hapus_obat",
            data: {
                id : id
            },
            dataType: "json",
            success: function (response) {
                console.log(response)
                if (response.status) {
                    $("#prd_"+id).hide(500)
                }
            },
            error : function (e) {
                console.log(e.responseText)
            }
        });
    }
</script>