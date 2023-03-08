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
<div>
    <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#homePenunjang" aria-expanded="true">List Permintaan Penunjang</a></li>
        <li><a data-toggle="tab" href="#formPenunjang">Form Input</a></li>
    </ul>
    <div class="tab-content">
        <div id="homePenunjang" class="tab-pane fade in active">
            <div class="row">
                <div class="col-md-12" id="tabel_operasi">
                    <table class="table table-bordered">
                        <thead class="bg-green">
                            <tr>
                                <td>No</td>
                                <td>Ruang Penunjang</td>
                                <td>Nama Dokter Pengirim</td>
                                <td>Diagnosa</td>
                                <td>Keterangan</td>
                                <td width="150px">List Permintaan</td>
                                <td>Status Permintaan</td>
                                <td>#</td>
                            </tr>
                        </thead>
                        <tbody id="permintaan_penunjang">
                            <?php $no=1;foreach($pp->result() as $pp) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $pp->group_name?></td>
                                    <td><?= $pp->dpjp_name?></td>
                                    <td><?= $pp->diagnosa_klinik?></td>
                                    <td><?= $pp->keterangan?></td>
                                    <td><?= $pp->ringkasan_tindakan?></td>
                                    <td><?=status_permintaan_penunjang($pp->status_form)?></td>
                                    <td>
                                        <a href="<?= base_url("erm.php/rajal/permintaan_penunjang/$pp->idx/$pp->id")?>" target="_blank" type="button" class="btn btn-sm btn-default"><i class="fa fa-print"></i></a>
                                        <button type="button" class="btn btn-sm btn-default bg-black" onclick="signPermintaanPenunjang('<?=$pp->id?>','<?=$pp->idx?>','<?=$pp->dpjp?>')"><i class="fa fa-qrcode"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="deletePermintaanPenunjang('<?=$pp->id?>','<?=$pp->idx?>','<?=$pp->dpjp?>',<?=$pp->status_form?>)"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="formPenunjang" class="tab-pane fade">
            <div class="callout callout-warning">Form Permintaan Penunjang</div>
            <form action="" id="form-permintaan-penunjang" metode="POST">
                <input type="hidden" name="idx_pp"  value="<?=$detail->idx?>">
                <input type="hidden" name="nomr_pp"  value="<?=$detail->nomr?>">
                <input type="hidden" name="nama_pp"  value="<?=$detail->nama_pasien?>">
                <input type="hidden" name="id_daftar_pp"  value="<?=$detail->id_daftar?>">
                <input type="hidden" name="reg_unit_pp"  value="<?=$detail->reg_unit?>">
                <fieldset>
                    <legend>Informasi Klinis</legend>
                    <div class="form-group row">
                        <label class="col-md-2" for="email">Dokter Pengirim:</label>
                        <div class="col-md-10">
                            <select name="dpjp_pp" id="dpjp_pp" class="form-control">
                                <option value="<?=$detail->dokterJaga?>" selected><?= $detail->namaDokterJaga  ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-2">Diagnosa Klinik</label>
                        <div class="col-md-10">
                            <textarea name="diagnosa_pp" id="diagnosa_pp" class="form-control"></textarea>
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="" class="col-md-2 control-label">Keterangan</label>
                        <div class="col-md-10">
                            <textarea name="keterangan_pp" id="keterangan_pp" class="form-control"></textarea>
                        </div>
                    </div>
                    <legend>Jenis Pemeriksaan</legend>
                    <div class="form-group row">
                        <label for="" class="col-md-2 control-label">Jenis Pemeriksaan</label>
                        <div class="col-md-10">
                            <select name="pemeriksaan_pp" id="pemeriksaan_pp" class="form-control">
                                <option value="">==Pilih Pemeriksaan==</option>
                                <option value="GR039">Labor Klinik</option>
                                <option value="GR040">Labor Patologi Anatomi</option>
                                <option value="GR038">Radiologi</option>
                                <option value="GRO41">Rehab Medik</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-2 control-label">Pilihan Tindakan</label>
                        <div class="col-md-10" style="max-height:400px; overflow-y: scroll; ">
                            <select id="tindakan_pp" class="form-control select2" style="width:100%">
                               
                            </select>
                            
                            <table class="table">
                                <thead>
                                    <th>#</th>
                                    <th>Title - Group - Tarif</th>
                                </thead>
                                <tbody id="detail_tindakan_pp">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </fieldset>
                <hr/>
                <div class="form-group">
                    <div class="col-md-12">
                    <button type="submit" class="btn btn-primary"  id="permintaan-penujang-btn"><span id="icon_buatpermintaan" class="fa fa-save"></span> Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-sign-penunjang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Autentikasi QRCODE</h4>
            </div>
            <div class="modal-body">
                <div class="input-group input-group-sm">
                    <input type="password" name="sign_password" id="sign_password" class="form-control" placeholder="Enter Password">
                    <input type="hidden" name="sign_user" id="sign_user" class="form-control" >
                    <input type="hidden" name="sign_id" id="sign_id" class="form-control" >
                    
                    <span class="input-group-btn">
                    <button type="button" class="btn btn-info btn-flat" onclick="signPermintaanPenunjangAction()">Sign</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#pemeriksaan_pp").on("change",function() {
            let ruang = $(this).val();
            $.ajax({
                type: "POST",
                url: base_url+"rajal/get_tindakan_penunjang",
                data: {
                    ruang
                },
                dataType: "JSON",
                success: function (response) {
                    let data = response.data;
                    let html = ``;
                    html+=`<option value=''>==Pilih==</option>`;
                    html+=`<option value='nonlist'>Tidak Ada Dalam List</option>`;
                    data.forEach((item,index)=>{
                        // html+=`
                        //     <tr><td><input type="checkbox" name="tindakan_pp[]" value="${item.tlId}"></td>
                        //     <td>${item.tlTitle}</td>
                        //     <td>${group_lab(item.group)}</td>
                        //     <td>${item.tarifLayanan}</td>
                        //     </tr></div>`;
                        html+=`<option value='${item.tlId}'>${item.tlTitle} - ${group_lab(item.group)} - ${item.tarifLayanan}</option>`;
                    })
                    $("#tindakan_pp").html(html)

                },
                error : function (e) {
                    console.log(e);
                }
            });    
        })
        $("#tindakan_pp").on("change",function(){
            let item = $(this).val();
            let itemText= $("#tindakan_pp :selected").text();
            let htmlItem = ``;
            if (item=="") {
                swal("Silahkan Pilih Tindakan Terlebih Dahulu")
                return false;
            }

            if(item=="nonlist") {
                
                let p = prompt("Please enter your name");
                if (p) {
                    htmlItem+=`
                    <tr>
                        <td><input type="checkbox" name="tindakan_lain_pp[]" value="${p}" checked></td>
                        <td>${p}</td>
                        <td><button type="button" class="btn btn-xs btn-danger removeItem"><i class='fa fa-trash'></i></button></td>
                    </tr>`;
                }
                
            } else {
                htmlItem+=`
                <tr>
                    <td><input type="checkbox" name="tindakan_pp[]" value="${item}" checked></td>
                    <td>${itemText}</td>
                    <td><button type="button" class="btn btn-xs btn-danger " onclick="$(this).parent().parent().remove()"><i class='fa fa-trash'></i></button></td>
                </tr>`;
            }
            
            $("#detail_tindakan_pp").append(htmlItem);
        })

        // insert permintaan Penunjang
        $("#form-permintaan-penunjang").on("submit", function(e) {
            e.preventDefault();
            let data_form = $(this).serializeArray();
            var data_push = [{
                    "name": "dpjp_text_pp",
                    "value": $("#dpjp_pp :selected").text()
                },
                {
                    "name": "pemeriksaan_text_pp",
                    "value": $("#pemeriksaan_pp :selected").text()
                }
            ]
            data_form = $.merge(data_form, data_push);
            // console.log(data_form)
            // return false;
            $.ajax({
                method: "POST",
                url: base_url + "rajal/insert_permintaan_penunjang",
                data: data_form,
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        swal({
                            title: "Success",
                            text: "Data berhasil ditambahkan",
                            icon: "success",
                        },function(){
                            reloadPage();
                        });
                    }
                 
                },
                error: function(e) {
                    console.log(e)
                }
            });
        })


    });

    function group_lab(key) {
        switch (key) {
            case "A":
                return "HEMATOLOGI"
                break;
            case 'B':
                return "URINE"
            case 'C':
                return "FAECES"
            case 'D':
                return "SERULOGI"
            case 'E':
                return "KIMIA KLINIK"
            case 'F':
                return "SEROLOGI"
            case 'G':
                return "TEST NARKOBA"
            default:
                return "-"
                break;
        }
    }

    function deletePermintaanPenunjang(id,idx,dpjp,status) {
        let x = confirm("Yakin Ingin Hapus Data");
        if (x) {
             if (status==null || status==1) {
                $.ajax({
                    method : "POST",
                    url: base_url+"rajal/delete_permintaan_penunjang",
                    data: {
                        id : id,
                        idx : idx,
                        dpjp : dpjp,
                        status : status
                    },
                    dataType: "json",
                    success: function (response) {
                        reloadPage();
                    }
                });
            } else {
                swal("Permintaan Sudah Diproses bagian penunjang")
            }
        }
    }

    function signPermintaanPenunjang(id, idx, user) {
        $("#sign_id").val(id)
        $("#sign_user").val(user)
        $("#sign_password").val("");
        $("#modal-sign-penunjang").modal("show")
    }

    function signPermintaanPenunjangAction() {
        let id = $("#sign_id").val();
        let password = $("#sign_password").val();
        let user = $("#sign_user").val();
        if (id) {
            $.ajax({
                url: base_url + "rajal/sign_permintaan_penunjang",
                method: "post",
                data: {
                    id: id,
                    password: password,
                    user: user
                },
                dataType: "json",
                success: function(response) {
                    console.log(response)
                    swal(response.msg)
                    $("#modal-sign-penunjang").modal("hide")
                    $("#sign_id").val("")
                    $("#sign_user").val("")
                },
                error: function(e) {
                    console.log(e)
                }
            });
        } else {
            alert("id kosong")
        }
    }
</script>


