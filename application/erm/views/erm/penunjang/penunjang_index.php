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
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header">
                    Detail Permintaan
                </div>
                <div class="box-body">
                    <table class="table table-hover">
                        <tr>
                            <td><b>Reg Unit</b></td>
                            <td>: <?= $penunjang->reg_unit ?></td>
                        </tr>
                        <tr>
                            <td><b>ID Daftar</b></td>
                            <td>: <?= $penunjang->id_daftar ?></td>
                        </tr>
                        <tr>
                            <td><b>Status Permintaan</b></td>
                            <td id="status_permintaan">: <?= status_permintaan_penunjang($penunjang->status_form) ?></td>
                        </tr>
                        <tr>
                            <td><b>Group</b></td>
                            <td>: <?= $penunjang->group_name ?></td>
                        </tr>
                        <tr>
                            <td><b>Aksi</b></td>
                            <td>: <a href="<?=base_url("erm.php/rajal/permintaan_penunjang/".$penunjang->idx."/".$penunjang->id)?>" target="_blank" ><button class="btn btn-sm btn-default"><i class="fa fa-print"></i></button></a>
                                <button type="button" data-idform="<?=$penunjang->id?>" class="btn btn-sm btn-primary status-form"><i class="fa fa-check"></i></button>
                            </td>
                        </tr>
                        
                    </table>
                </div>
                <div class="box-footer text-center">
                    
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header">
                    List Permintaan
                </div>
                <div class="box-body">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr class="bg-green text-white">
                                <th>No</th>
                                <th>Kode</th>
                                <th>Name</th>
                                <th>Tarif Layanan</th>
                                <th>Hasil</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;foreach($penunjang_detail as $pd) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $pd->tlId ?></td>
                                <td><?= $pd->tlTitle ?></td>
                                <td><?= $pd->tarifLayanan ?></td>
                                <td id="hasil_<?=$pd->id?>"><?= $pd->hasil ?></td>
                                <td>
                                    <button data-id="<?= $pd->id ?>" data-name="<?=$pd->tlTitle ?>" class="btn btn-sm btn-primary entry-hasil"><i class="fa fa-edit"></i></button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-entry">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Entri Hasil Pemeriksaan</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="m_id" id="m_id">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="m_name" id="m_name" class="form-control" readonly >
                </div>
                <div class="form-group">
                    <label for="">Hasil</label>
                   <textarea name="m_hasil" id="m_hasil" class="form-control"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default modal-dismiss" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary save-hasil">Save changes</button>
            </div>
        </div>
    </div>
</div>
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


<script>
    $(document).ready(function () {
        $(".entry-hasil").on("click",function() {
            clear();
            var id = $(this).data("id")
            var name = $(this).data("name")

            $("#m_id").val(id)
            $("#m_name").val(name)
            $("#modal-entry").modal("show")
        })

        $(".modal-dismiss").on("click",function(){
            clear();
        })

        $(".save-hasil").on("click",function(){
            var id = $("#m_id").val();
            var hasil = $("#m_hasil").val();
           
            $.ajax({
                method : "POST",
                url: base_url+"penunjang/insert_hasil_penunjang",
                data: {
                    id :  id,
                    hasil :  hasil,
                },
                dataType: "json",
                success: function (response) {
                    console.log(id)
                    if (response.status) {
                        $("#hasil_"+id).html(hasil)
                    }
                    $("#modal-entry").modal("hide")
                    clear();
                }
            });
        })
         $(".save-form").on("click",function(){
            var id = $("#m_idform").val();
            var status = $("#m_statusform").val()
            $.ajax({
                method : "POST",
                url: base_url+"penunjang/update_status_permintaan",
                data: {
                    id :  id,
                    status : status
                },
                dataType: "json",
                success: function (response) {
                    $("#status_permintaan").html(" : "+response.status_permintaan)
                    $("#modal-form").modal("hide")
                    clear();
                }
            });
        })
        $(".status-form").click(function(){
            $("#modal-form").modal("show")
            $("#m_idform").val($(this).data('idform'))
        })
    });

    function clear() {
        $("#m_id").val("")
        $("#m_name").val("")
        $("#m_hasil").text("")
        $("#m_statusform").val("");
        $("#m_idform").val("");
    }
    
</script>