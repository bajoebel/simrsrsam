<style>
    .back {
        border: 2px solid;
        border-collapse: collapse;
        border-color: #fff;
        border-radius: 100%;
        width: 50px;
        height: 50px;
        text-shadow: 3px 3px #000;
        font-size: 24pt;
        color: #fff;
        text-align: center;
        color: #fff;
        box-shadow: 2px 2px #000;
        float: left;
    }
    .form-control[readonly] {
        background-color : 	#F0F8FF;
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<section class="content container-fluid">
    <div class="row">
        <!-- <?php print_r($detail) ?> -->
        <div class="col-md-12">
            <!-- <?php print_r($detail) ?> -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="back">
                        <a href="<?= base_url() . "erm.php/erm" ?>">
                            <span class="fa fa-arrow-left"></span>
                        </a>
                    </div>
                    <div style="float:left;padding:10px 10px; font-size:18pt;">
                        Data Sosial Pasien
                    </div>
                </div>
                <div class="box-body box-profile">
                    <div class="row">
                        <h1 class="text-center"></h1>
                        <div class="col-md-2">
                            <img class="profile-user-img img-responsive img-circle" src="<?php if ($detail->jns_kelamin == '0') echo base_url() . "assets/images/female.png";
                                                                                            else echo base_url() . "assets/images/male.png"; ?>" alt="User profile picture">
                            <h3 class="profile-username text-center"><?= $detail->nama_pasien . "(" . $detail->nomr . ")" ?></h3>
                            <p class="text-muted text-center"><?= $detail->no_ktp ?></p>
                        </div>
                        <div class="col-md-5">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td colspan="5"><b>ALAMAT / TELPON</b><br><?= $pasien->alamat . "/" . $pasien->no_telpon; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tempat & Tgl Lahir</b></td>
                                        <td><b>Umur</b></td>
                                        <td><b>Sex</b></td>
                                        <td><b>Agama</b></td>
                                        <td><b>Pekerjaan</b></td>
                                    </tr>
                                    <tr>
                                        <td><?= $detail->tempat_lahir . " / " . longDate($detail->tgl_lahir) ?></td>
                                        <td><?= getUmur($detail->tgl_lahir, $detail->tgl_masuk) ?></td>
                                        <td><?= $detail->jns_kelamin ?></td>
                                        <td><?= $pasien->agama ?></td>
                                        <td><?= $pasien->pekerjaan ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-5">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <b>Sedang Dilayani di</b><br />
                                            <?php echo getPoliByID($detail->id_ruang) ?>
                                        </td>
                                        <td>
                                            <b>Dokter Penanggung Jawab</b><br />
                                            <?php echo $detail->namaDokterJaga; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Hari/Tanggal Masuk</b><br />
                                            <?php echo DateToIndoDayTime($detail->tgl_masuk) ?> <br/><br/>
                                        </td>
                                      
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header">
                    Detail Permintaan
                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <tr>
                            <td><b>Reg Unit</b></td>
                            <td>: <?= $konsul->reg_unit ?></td>
                        </tr>
                        <tr>
                            <td><b>ID Daftar</b></td>
                            <td>: <?= $konsul->id_daftar ?></td>
                        </tr>
                        <tr>
                            <td><b>Status Permintaan</b></td>
                            <td id="status_konsul">: <?= status_permintaan_konsul($konsul->status_form) ?></td>
                        </tr>
                        <tr>
                            <td><b>Unit Yang Meminta</b></td>
                            <td>: <?= $konsul->unit_minta ?></td>
                        </tr>
                        <tr>
                            <td width="30%">
                                <b>Dokter Yang Meminta</b>
                            </td>
                            <td width="70%">: <?= $konsul->dpjp_minta ?></td>
                        </tr>
                        <tr>
                            <td>
                                <b>Diagnosa Kerja</b>
                            </td>
                            <td>: <?=$konsul->diagnosa_kerja?></td>
                        </tr>
                        <tr>
                            <td>
                                <b>Iktisar Klinik</b>
                            </td>
                            <td>: <?=$konsul->iktisar_klinik?></td>
                        </tr>
                        <tr>
                            <td>
                                <b>Terapi dan tindakan yang sudah diberikan</b>
                            </td>
                            <td>: <?=$konsul->terapi_tindakan?></td>
                        </tr>
                        <tr>
                            <td>
                                <b>Konsulen diharapkan</b>
                            </td>
                            <td>: <?=arr_to_list($konsul->konsul_harap," <span>"," </span>")?></td>
                        </tr>
                        <tr>
                            <td>
                                <b>Kembali Ke Dokter yang meminta</b>
                            </td>
                            <td>: <?=trueOrFalse($konsul->kembali)?></td>
                        </tr>
                        <tr>
                            <td><b>Aksi</b></td>
                            <td>: 
                                <a href="<?=base_url("erm.php/rajal/konsul_internal/".$konsul->idx."/".$konsul->id)?>" target="_blank" ><button class="btn btn-sm btn-default"><i class="fa fa-print"></i></button></a>
                                <button type="button" data-idform="<?=$konsul->id?>" class="btn btn-sm btn-primary status-form"><i class="fa fa-check"></i></button>
                                <button type="button" data-idform="<?=$konsul->id?>" class="btn btn-sm bg-black status-qrcode"><i class="fa fa-qrcode"></i></button>
                            </td>
                        </tr>
                        
                    </table>
                </div>
                <div class="box-footer text-center">
                    
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="box box-success">
                <div class="box-header">
                    Permintaan Konsultasi
                </div>
                <form id='form-data-konsul-internal' class="form-horizontal">
                    <div class="box-body">   
                        <input type="hidden" name="id_ki" id="id_ki" value="<?= $konsul->id ?>">
                        <input type="hidden" name="idx_ki" value="<?= $detail->idx ?>">
                        <input type="hidden" name="nomr_ki" value="<?= $detail->nomr ?>">
                        <input type="hidden" name="nama_ki" value="<?= $detail->nama_pasien ?>">
                        <div class="form-group">
                            <label for="diagnosa_kerja_ki" class="col-xs-3 control-label text-right">Jawaban Konsultasi</label>
                            <div class="col-xs-9 col-md-6">
                                <textarea name="hasil_ki" id="hasil_ki" cols="30" rows="10" class="form-control"><?=$konsul->hasil_konsultasi?></textarea>
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
                    <div class="box-footer">
                        <div class="pull-right">
                            <?= ($detail->status_erm!=1)?" <button type='submit' class='btn btn-primary save-hasil'>Simpan</button>":"" ?>
                        </div>
                    </div>
                </form>   
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modal-form">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Status From</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="m_idform" id="m_idform">
                <select name="m_statusform" id="m_statusform" class="form-control">
                    <option value="2">Diproses</option>
                    <option value="3">Selesai</option>
                </select>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default modal-dismiss" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save-form">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-qrcode">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Status From</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="sign_ki_idx" id="sign_ki_idx" value="<?=$konsul->idx?>">
                <input type="hidden" name="sign_ki_id" id="sign_ki_id" value="<?=$konsul->id?>">
                <input type="hidden" name="sign_ki_nomr" id="sign_ki_nomr" value="<?=$konsul->nomr?>">
                <input type="hidden" name="sign_ki_user" id="sign_ki_user" value="<?=$konsul->dpjp_diminta_id?>">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="sign_pass_ki" id="sign_pass_ki" placeholder="Enter Password">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default modal-dismiss" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save-qrcode">Generate Qrcode</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $(".save-hasil").on("click",function(e){
            e.preventDefault();
            var id = $("#id_ki").val();
            var hasil = $("#hasil_ki").val();
            var tgl = $("#tgl_ki").val();
            var jam = $("#jam_ki").val();
            $.ajax({
                method : "POST",
                url: base_url+"konsul/insert_hasil_konsul",
                data: {
                    id :  id,
                    hasil :  hasil,
                    tgl :  tgl,
                    jam :  jam
                },
                dataType: "json",
                success: function (response) {
                    if (response.status) {
                        swal("Data Berhasil Di Update")
                        $("#status_konsul").html(" : "+response.status_konsul)
                    }
                    $("#modal-entry").modal("hide")
                }
            });
        })
        $(".save-form").on("click",function(){
            var id = $("#m_idform").val();
            var status = $("#m_statusform").val()
            $.ajax({
                method : "POST",
                url: base_url+"konsul/update_status_konsul",
                data: {
                    id :  id,
                    status : status
                },
                dataType: "json",
                success: function (response) {
                    console.log(response)
                    $("#status_konsul").html(" : "+response.status_konsul)
                    $("#modal-form").modal("hide")
                }
            });
        })
        $(".save-qrcode").on("click",function(){
            let idx = $("#sign_ki_idx").val();
            let id = $("#sign_ki_id").val();
            let nomr = $("#sign_ki_nomr").val();
            let dokter = $("#sign_ki_user").val();
            let pass = $("#sign_pass_ki").val();
          
            $.ajax({
                method: "POST",
                url: base_url + "signqrcode/sign_konsul_internal_jawab",
                data: {
                    "idx" : idx,
                    "id" : id,
                    "nomr" : nomr,
                    "dokter" : dokter,
                    "pass" : pass
                },
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        swal(response.msg)
                    } else {
                        swal(response.msg)
                    }
                    clearForm();
                    $("#modal-qrcode").modal("hide")
                    
                }
            }).done(function(data) {
                console.log(data)
            });
        })
        $(".status-form").click(function(){
            $("#modal-form").modal("show")
            $("#m_idform").val($(this).data('idform'))
        })
        $(".status-qrcode").click(function(){
            $("#modal-qrcode").modal("show")
            $("#m_idform").val($(this).data('idform'))
        })
    });

    function clearForm() {
        $("#sign_pass_ki").val("");
    }

</script>