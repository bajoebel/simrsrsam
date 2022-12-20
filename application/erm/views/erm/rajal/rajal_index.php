<style>
    div#pagination b {
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #337ab7;
        border-color: #337ab7;
    }

    div#pagination a {
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
        border-top-color: rgb(221, 221, 221);
        border-right-color: rgb(221, 221, 221);
        border-bottom-color: rgb(221, 221, 221);
        border-left-color: rgb(221, 221, 221);
    }

    .modal-content {
        max-height: 600px;
        overflow: scroll;
    }

    a.disabled {
        pointer-events: none;
        cursor: default;
    }

    .kotak {
        padding: 10px;
        width: 100%;
        border: 1px #ccc solid;
        border-collapse: collapse;

    }

    .text-center {
        text-align: center;
    }

    .font60 {
        font-size: 120pt;
    }

    .font10 {
        font-size: 10pt;
    }

    .font11 {
        font-size: 11pt;
    }

    .font12 {
        font-size: 12pt;
    }

    .font13 {
        font-size: 13pt;
    }

    .font14 {
        font-size: 14pt;
    }

    .font20 {
        font-size: 20pt;
    }

    .top10 {
        margin-top: 10px;
    }

    .top20 {
        margin-top: 20px;
    }

    .panel {
        border-radius: 0px;
    }

    .panel-success {
        border-color: #1ABC9C;
    }

    .panel-success .panel-heading {
        background-color: #1ABC9C;
        color: #fff;
    }

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

    .kembali {
        color: #fff;
    }

    ul.wysihtml5-toolbar li a[title="Insert image"],
    ul.wysihtml5-toolbar li a[title="CTRL+B"],
    ul.wysihtml5-toolbar li a[title="CTRL+I"],
    ul.wysihtml5-toolbar li a[title="CTRL+U"],
    ul.wysihtml5-toolbar li a[title="CTRL+S"],
    ul.wysihtml5-toolbar li a[title="Unordered list"],
    ul.wysihtml5-toolbar li a[title="Outdent"],
    ul.wysihtml5-toolbar li a[title="Indent"],
    ul.wysihtml5-toolbar li a[title="Insert link"],
    ul.wysihtml5-toolbar li a[data-wysihtml5-command="formatBlock"],
    ul.wysihtml5-toolbar li a[data-wysihtml5-command="formatBlock"],
    ul.wysihtml5-toolbar li.dropdown {
        display: none;
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?> <?php echo getPoliByID($detail->id_ruang) ?></h1>
</section>
<?php if (!empty($detail)) { ?>
    <input type="hidden" name="jns_layanan" id="jns_layanan" value="<?= $detail->jns_layanan ?>">
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                    <div class="box-body box-profile" style="max-height: 300px; overflow-y: scroll; ">
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
                                            <td colspan="5"><b>Detail Kunjungan</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2" style="padding-right:2px !important">
                <div class="box box-success">
                    <div class="box-body">
                        <?php $this->load->view("erm/rajal/rajal_nav") ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="padding:0 2px !important">
                <?php $this->load->view("erm/rajal/rajal_content") ?>
            </div>
            <div class="col-md-4" style="padding:0 2px !important">
                <div class="box box-success">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="ion ion-clipboard"></i>
                        <h5 class="box-title">Riwayat Sebelumnya</h5>
                    </div>
                    <div class="box-body" id="riwayat">

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
} else { ?>
    <section class="content container-fluid">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Informasi</h4>
            Maaf Data Tidak Tersedia
        </div>
    </section>

<?php } ?>
<script>

</script>
<script>
    $(document).ready(function() {
        // default ketika di load pertama kali
        getRiwayat(3, <?= $detail->idx ?>);
        $(".select2").select2();
    });
</script>
<!-- script persetujuan umum -->
<script>
    $(document).ready(function() {
        $("[name='terbatas']").change(function() {
            if ($(this).is(":checked")) {
                $("#terbatas_list").removeAttr("readonly")
            } else {
                $("#terbatas_list").attr('readonly', true);
            }
        });
        $(".fieldAdd").on('click', '.removeMore', function(e) {
            $(this).parent().parent('div').remove();
        })
        $(".fieldAdd2").on('click', '.removeMore2', function(e) {
            $(this).parent().parent('div').remove();
        })

        // insert data persetujuan umum
        $("#form-data-persetujuan").on("submit", function(e) {
            e.preventDefault();
            var data_form = $(this).serialize();
            $.ajax({
                type: "POST",
                url: base_url + "/rajal/insert_setuju_umum",
                data: data_form,
                dataType: "json",
                beforeSend: function() {
                    $(":submit").attr("disabled", true);
                },
                success: function(response) {
                    $(":submit").attr("disabled", false);
                    $('#form-data-persetujuan')[0].reset();
                    getRiwayat(2, <?= $detail->idx ?>);
                    // console.log(response);
                },
                error: function(e) {
                    console.log(e)
                }
            });
        })

        // select option lainnya
        $("[name='selaku']").on("change", function() {
            let p = $(this).val();
            if (p == 'lainnya') {
                $("[name='lainnya']").prop("readonly", false).focus();

            } else {
                $("[name='lainnya']").prop("readonly", true)
            }
        })
    });

    function getRiwayat(pil, idx) {
        $.ajax({
            type: "post",
            url: base_url + "/erm/riwayat",
            data: {
                pil: pil,
                idx: idx
            },
            dataType: "html",
            beforeSend: function() {
                $("#riwayat").html(`<div class="overlay">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>`);
            },
            success: function(response) {
                $("#riwayat").html(response);
            },
            error: function(e) {
                console.log(e)
            }
        });
    }

    function addmore(pil) {
        var maxField = 10;

        if (pil == 1) {
            var x = 1;
            var fieldHtml = `<div class="input-group" style="margin-top:2px">
                            <input type="text" class="form-control" name="privasi[]" placeholder="Enter text.....">
                            <span class="input-group-btn">
                                <button class="btn btn-danger removeMore" type="button"><i class="fa fa-trash"></i></button>
                            </span>
                        </div>`;
            if (x < maxField) {
                x++;
                $(".fieldAdd").append(fieldHtml);
            }
        }

        if (pil == 2) {
            var y = 1;
            var fieldHtml2 = `<div class="input-group" style="margin-top:2px">
            <input type="text" class="form-control" name="privasi[]" placeholder="Enter text.....">
            <span class="input-group-btn">
            <button class="btn btn-danger removeMore2" type="button"><i class="fa fa-trash"></i></button>
            </span>
            </div>`;
            if (y < maxField) {
                $(".fieldAdd2").append(fieldHtml2);
                y++;
            }
        }
    }

    function hapusSetujuUmum(idx, id) {
        $.ajax({
            type: "GET",
            url: base_url + `rajal/delete_setuju_umum/${idx}/${id}`,
            data: "data",
            dataType: "json",
            success: function(response) {
                if (response.status) {
                    getRiwayat(2, idx);
                }
            },
            error: function(e) {
                console.log(e.responseText);
            }
        });
    }
</script>
<!--  -->
<script>

</script>