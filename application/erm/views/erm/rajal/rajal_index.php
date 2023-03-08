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

    /* .modal-content {
        max-height: 600px;
        overflow: scroll;
    } */

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

    /* ul.wysihtml5-toolbar li a[title="Insert image"],
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
    } */
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<?php if (!empty($detail)) { ?>
    <input type="hidden" name="jns_layanan" id="jns_layanan" value="<?= $detail->jns_layanan ?>">
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
                                <p class="text-muted text-center"><?= $detail->id_daftar ?> <button class="btn btn-xs btn-default" onclick="copyText()"><i class="fa fa-clipboard" data-toggle="tooltip" title="Copy To Clipboard"></button></i></p>
                                <input type="hidden" id="copy_id_daftar" value="<?= $detail->id_daftar ?>">
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
                                            <td><?= jns_kelamin($detail->jns_kelamin) ?></td>
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
                                            <td colspan="5">
                                                <b>Sedang Dilayani di</b><br />
                                                <?php echo getPoliByID($detail->id_ruang) ?>
                                            </td>
                                            <td>
                                                <b>Dokter Penanggung Jawab</b><br />
                                                <?php echo $detail->namaDokterJaga; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <b>
                                                    Status Rekam Medis<br />
                                                    <span><?php echo status_erm($detail->status_erm) ?></span> <br /><br />
                                                    Aksi <br />
                                                    <?php if ($detail->status_erm == 1) { ?>
                                                        <button class="btn btn-sm btn-danger" onclick="final('<?= $detail->idx ?>',0,'Batalkan Final Rekam Medis')"><i class="fa fa-refresh" data-toggle="tooltip" title="Batalkan rekam medis"></i></button>
                                                    <?php } else { ?>
                                                        <button class="btn btn-sm btn-primary" onclick="final('<?= $detail->idx ?>',1,'Final Rekam Medis')"><i class="fa fa-check" data-toggle="tooltip" title="Final rekam medis"></i></button>
                                                    <?php } ?>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-print" data-toggle="tooltip" title="Cetak"></i></button>
                                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            <span class="caret"></span>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="#" data-pil="awal_rawat" data-idx="<?= $detail->idx ?>" data-nomr="<?= $detail->nomr ?>" class="riwayat-form-link">Kajian Awal Rawat</a></li>
                                                            <li><a href="#" data-pil="awal_medis" data-idx="<?= $detail->idx ?>" data-nomr="<?= $detail->nomr ?>" class="riwayat-form-link">Kajian Awal Medis</a></li>
                                                            <li><a href="#" data-pil="edukasi_pasien" data-idx="<?= $detail->idx ?>" data-nomr="<?= $detail->nomr ?>" class="riwayat-form-link">Edukasi Pasien</a></li>
                                                            <li><a href="#" data-pil="cppt" data-idx="<?= $detail->idx ?>" data-nomr="<?= $detail->nomr ?>" class="riwayat-form-link">CPPT</a></li>
                                                            <li><a href="#" data-pil="prmrj" data-idx="<?= $detail->idx ?>" data-nomr="<?= $detail->nomr ?>" class="riwayat-form-link">Profil Ringkas Medis Rawat Jalan</a></li>
                                                        </ul>
                                                    </div>
                                                    <button type="button" class="btn btn-sm btn-default" onclick="reloadPage()"><i class="fa fa-refresh"></i></button>
                                            </td>
                                            <td>
                                                <b>Hari/Tanggal Masuk</b><br />
                                                <?php echo DateToIndoDayTime($detail->tgl_masuk) ?> <br /><br />
                                                <b>Riwayat</b><br />
                                                <button class="btn btn-sm btn-success" onclick="riwayatRajal('<?= $detail->nomr ?>')"><i class="fa fa-history" data-toggle="tooltip" title="Tampilkan Riwayat"></i></button>
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
            <div class="col-sm-2 col-md-3">
                <div class="row">
                    <div class="col-md-12" style="padding-right:2px !important">
                        <div class="box box-success">
                            <div class="box-body">
                                <?php $this->load->view("erm/rajal/rajal_nav") ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-header ui-sortable-handle" style="cursor: move;">
                                <i class="ion ion-clipboard"></i>
                                <h5 class="box-title">Detail & Aksi</h5>
                            </div>
                            <div class="box-body" id="riwayat">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-10 col-md-9" style="padding:0 2px !important">
                <?php $this->load->view("erm/rajal/rajal_content") ?>
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

<div class="modal fade" id="modal-riwayat-rajal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Riwayat Rawat Jalan</h4>
            </div>
            <div class="modal-body" id="modal-riwayat-rajal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-riwayat-form">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="modal-riwayat-form-body">

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-sign-dpjp">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Review & Generate Barcode</h4>
            </div>
            <form action="javascript:void(0)" id="form-sign-dpjp">
                <div class="modal-body">
                    <input type="hidden" name="sign_dpjp_idx" id="sign_dpjp_idx">
                    <input type="hidden" name="sign_dpjp_id" id="sign_dpjp_id">
                    <input type="hidden" name="sign_dpjp_nomr" id="sign_dpjp_nomr">
                    <input type="hidden" name="sign_dpjp_user" id="sign_dpjp_user" value="<?=$detail->dokterJaga?>">
                    <div class="form-group">
                        <label for="">Nama Dokter</label>
                        <input type="text" name="sign_dpjp_user_name" id="sign_dpjp_user_name" class="form-control" value="<?=$detail->namaDokterJaga?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Review DPJP</label>
                        <textarea name="sign_dpjp_review" id="sign_dpjp_review" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="sign_dpjp_pass" id="sign_dpjp_pass" class="form-control" name="" id="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="SaveSignReviewDpjp()">Save & Generate Barcode</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // default ketika di load pertama kali
        let tab_aktif = localStorage.getItem("tab_aktif");
        if (tab_aktif) {
            // getRiwayat(tab_aktif, <?= $detail->idx ?>);
            $(`a[href='#tab_${tab_aktif}']`).trigger("click")
        } else {
            // getRiwayat(1, <?= $detail->idx ?>);
            $("a[href='#tab_1']").trigger("click")
        }

        $('#table-prmrj').on('shown.bs.collapse', function() {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

        loadAwal()
    });
</script>
<!-- script persetujuan umum -->
<script>
    $(document).ready(function() {
        $(".riwayat-form-link").on("click", function(e) {
            e.preventDefault();
            var pil = $(this).data("pil")
            var nomr = $(this).data("nomr")
            var idx = $(this).data("idx")
            $.ajax({
                type: "POSt",
                url: base_url + "rajal/get_riwayat_form",
                data: {
                    pil: pil,
                    nomr: nomr,
                    idx: idx
                },
                dataType: "html",
                success: function(response) {
                    $("#modal-riwayat-form").modal("show")
                    $("#modal-riwayat-form-body").html(response)
                },
                error: function(e) {
                    console.log(e.responseText)
                }
            });
        })

        $("#kembang-pasien-review-sign").on("submit", function(e) {
            e.preventDefault();
            alert("OK")
        })
    });


    function loadAwal() {
        $("#ar_form").addClass("hide")
        $("#am_form").addClass("hide")
        $("#kp_form").addClass("hide")
    }

    function reloadPage() {
        location.reload();
    }

    function tambahAwalMedis() {
        $("#am_preview").addClass("hide")
        $("#am_form").removeClass("hide")
    }

    function tambahKembangPasien() {
        $("#kp_preview").addClass("hide")
        $("#kp_form").removeClass("hide")
    }

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
                localStorage.setItem("tab_aktif", pil)
                $("#riwayat").html(response);
            },
            error: function(e) {
                console.log(e)
            }
        });
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

    function editAwalRawat(idx, id, nomr, stat) {
        $.ajax({
            type: "POST",
            url: base_url + "rajal/edit_kaji_awal",
            data: {
                idx: idx,
                id: id,
                nomr: nomr
            },
            dataType: "JSON",
            success: function(response) {
                // localStorage.setItem("response", JSON.stringify(response));
                // console.log(response)
                let data = response.data;
                responseAwalRawat(data, stat)
                swal("Silahkan Edit Data")
                $("#modal-riwayat-form").modal("hide")
                $("ar_form").removeClass("hide")
                $("#ar_preview").addClass("hide")
                $("#ar_form").removeClass("hide")
            },
            error: function(e) {
                console.log(e)
            }
        });
    }

    function responseAwalRawat(data, stat) {
        $("[name='cppt_id_ka']").val(data.cppt_id);
        $("[name='perawat_id_ka']").val(data.perawat_id).trigger("change");
        if (stat != 1) {
            $("[name='poli_ka']").val(data.poli).trigger("change");
            $("[name='dpjp_id_ka']").val(data.dpjp_id).trigger("change");
            $("[name='tanggal_ka']").val(data.tanggal);
            $("[name='jam_ka']").val(data.jam);
        }

        $(`[name='tiba_ka'][value='${data.tiba}']`).prop("checked", true)
        $(`[name='rujukan_ka'][value='${data.rujukan}']`).prop("checked", true)
        $("[name='rujukan_lainnya_ka']").val(data.rujukan_lainnya);
        $("[name='keluhan_ka']").val(data.keluhan);
        $("[name='dirawat_ka']").val(data.dirawat);
        $("[name='kapan_dirawat_ka']").val(data.kapan_dirawat);
        $("[name='dimana_dirawat_ka']").val(data.dimana_dirawat);
        $("[name='diagnosis_ka']").val(data.diagnosis);
        if (data.implant) {
            $("[name='implant_ka']").prop("checked", true)
            $("[name='implant_detail_ka']").prop("readonly", false)
        } else {
            $("[name='implant_ka']").prop("checked", false)
            $("[name='implant_detail_ka']").prop("readonly", true)
        }
        $("[name='implant_detail_ka']").val(data.implant_detail);
        if (data.riwayat_operasi_cek) {
            $("[name='riwayat_operasi_cek_ka']").prop("checked", true)
            $("[name='riwayat_operasi_ka']").prop("readonly", false)
            $("[name='riwayat_operasi_tahun_ka']").prop("disabled", false)
        } else {
            $("[name='riwayat_operasi_cek_ka']").prop("checked", false)
            $("[name='riwayat_operasi_ka']").prop("readonly", true)
            $("[name='riwayat_operasi_tahun_ka']").prop("disabled", true)
        }
        $("[name='riwayat_operasi_ka']").val(data.riwayat_operasi)
        $("[name='riwayat_operasi_tahun_ka']").val(data.riwayat_operasi_tahun)

        $("[name='riwayat_sakit_ka[]']").val(data.riwayat_sakit?.split(";")).trigger("change");
        $("[name='riwayat_sakit_keluarga_ka[]']").val(data.riwayat_sakit_keluarga?.split(";")).trigger("change");
        $("[name='riwayat_psikologis_ka[]']").val(data.riwayat_psikologis?.split(";")).trigger("change");
        (data.status_mental_sadar) ? $("[name='status_mental_sadar_ka']").prop("checked", true): "";
        (data.status_mental_prilaku) ? $("[name='status_mental_prilaku_ka']").prop("checked", true): "";
        (data.status_mental_keras) ? $("[name='status_mental_keras_ka']").prop("checked", true): "";
        $("[name='status_mental_prilaku_detail_ka']").val(data.status_mental_prilaku_detail)
        $("[name='status_mental_keras_detail_ka']").val(data.status_mental_keras_detail)
        $(`[name='kultural_ka'][value='${data.kultural}']`).prop("checked", true)
        $("[name='kultural_nama_ka']").val(data.kultural_nama);
        $("[name='kultural_hubungan_ka']").val(data.kultural_hubungan);
        $("[name='kultural_phone_ka']").val(data.kultural_phone);
        $("[name='nilai_kepercayaan_ka']").val(data.nilai_kepercayaan);
        $("[name='status_ekonomi_ka[]']").val(data.status_ekonomi?.split(";")).trigger("change");
        $("[name='spiritual_biasa_ka']").val(data.spiritual_biasa);
        $(`[name='obat_ka'][value='${data.obat}']`).prop("checked", true)
        $(`[name='makanan_ka'][value='${data.makanan}']`).prop("checked", true)
        $("[name='riwayat_lain_ka']").val(data.riwayat_lain);
        // strong kids
        var strong_kids = data.strong_kids?.split(";")
        if (strong_kids) {
            strong_kids.forEach((value, index) => {
                $(`[name='strong_kids_ka[]'][value='${value}']`).prop("checked", true)
            })
        }

        $(`[name='aktivitas_ka'][value='${data.aktivitas}']`).prop("checked", true)
        $("[name='akftivitas_detail_ka']").val(data.aktivitas_detail);
        $(`[name='aktivitas_info_ka'][value='${data.aktivitas_info}']`).prop("checked", true)
        $("[name='aktivitas_info_detail_ka']").val(data.aktivitas_info_detail);
        $(`[name='jatuh_ka'][value='${data.jatuh}']`).prop("checked", true)
        $(`[name='gelang_resiko_ka'][value='${data.gelang_resiko}']`).prop("checked", true)
        $(`[name='risiko_info_ka'][value='${data.risiko_info}']`).prop("checked", true)
        $("[name='risiko_info_detail_ka']").val(data.risiko_info_detail);
        $("[name='keadaan_umum_ka']").val(data.keadaan_umum);
        $("[name='kesadaran_umum_ka']").val(data.kesadaran_umum);
        $("[name='gcs_e_ka']").val(data.gcs_e);
        $("[name='gcs_m_ka']").val(data.gcs_m);
        $("[name='gcs_v_ka']").val(data.gcs_v);
        $("[name='ttv_sh_ka']").val(data.ttv_sh);
        $("[name='ttv_nd_ka']").val(data.ttv_nd);
        $("[name='ttv_rr_ka']").val(data.ttv_rr);
        $("[name='ttv_spo2_ka']").val(data.ttv_spo2);
        $("[name='ttv_td_ka']").val(data.ttv_td);
        $("[name='ttv_ds_ka']").val(data.ttv_ds);
        $("[name='status_generalis_ka']").val(data.status_generalis);
        $(`[name='penunjang_rad_ka'][value='${data.penunjang_rad}']`).prop("checked", true)
        $("[name='penunjang_rad_detail_ka']").val(data.penunjang_rad_detail);
        $(`[name='penunjang_lab_ka'][value='${data.penunjang_lab}']`).prop("checked", true)
        $("[name='penunjang_lab_detail_ka']").val(data.penunjang_lab_detail);
        $(`[name='penunjang_lain_ka'][value='${data.penunjang_lain}']`).prop("checked", true)
        $("[name='penunjang_lain_detail_ka']").val(data.penunjang_lain_detail);
        // kebutuhan edukasi
        var kebutuhan_edukasi = data.kebutuhan_edukasi?.split(";")
        if (kebutuhan_edukasi) {
            kebutuhan_edukasi.forEach((value, index) => {
                $(`[name='kebutuhan_edukasi_ka[]'][value='${value}']`).prop("checked", true)
            })
        }
        $("[name='kebutuhan_edukasi_tindakan_ka']").val(data.kebutuhan_edukasi_tindakan);
        $("[name='kebutuhan_edukasi_lain_ka']").val(data.kebutuhan_edukasi_lain);
        // CKEDITOR.instances['diagnosa_keperawatan_ka'].setData(data.diagnosa_keperawatan)
        // CKEDITOR.instances['tindakan_keperawatan_ka'].setData(data.tindakan_keperawatan)
        $("[name='diagnosa_keperawatan_ka[]']").val(data.diagnosa_keperawatan?.split(";")).trigger("change");
        $("[name='tindakan_keperawatan_ka[]']").val(data.tindakan_keperawatan?.split(";")).trigger("change");
        $("[name='apd_ka[]']").val(data.apd?.split(";")).trigger("change");
        $("[name='bmhp_ka[]']").val(data.bmhp?.split(";")).trigger("change");
        $(`[name='dijelaskan_ka'][value='${data.dijelaskan}']`).prop("checked", true);
        $("[name='dijelaskan_hubungan_ka']").val(data.dijelaskan_hubungan);
        $("[name='dijelaskan_nama_ka']").val(data.dijelaskan_nama);
        $("[name='perawat_id_ka']").val(data.perawat_id).trigger("change");
        $("[name='komunikasi_penerjemah_ka']").val(data.komunikasi_penerjemah)

        // skrining nyeri
        var nyeri = data.nyeri;
        $(`[name='nyeri_ka'][value='${nyeri}']`).prop("checked", true)
        if (nyeri != "tidak ada nyeri") {
            $(".skrining_nyeri").prop("hidden", false)
            $("[name='profokatif_ka']").val(data.profokatif);
            $("[name='quality_ka']").val(data.quality);
            $("[name='region_ka']").val(data.region);
            $("[name='skala_ka']").val(data.skala);
            $("[name='timing_ka']").val(data.timing);
            $(`[name='tidur_malam_ka'][value='${data.tidur_malam}']`).prop("checked", true)
            $(`[name='halangan_aktivitas_ka'][value='${data.halangan_aktivitas}']`).prop("checked", true)
            $(`[name='nyeri_sakit_ka'][value='${data.nyeri_sakit}']`).prop("checked", true)

            var metode = data.metode;
            $(`[name='metode_ka'][value='${metode}']`).prop("checked", true)
            if (metode == 1) {
                $("#vas_pilih").removeClass("hide")
                $("#wbfs_pilih").addClass("hide")
                $("#flacc_pilih").addClass("hide")
                $("[name='skala_vas_ka']").val(data.skala_vas);
            } else if (metode == 2) {
                $("#vas_pilih").addClass("hide")
                $("#wbfs_pilih").removeClass("hide")
                $("#flacc_pilih").addClass("hide")
                $("[name='skala_wbfs_ka']").val(data.skala_wbfs);
            } else if (metode == 3) {
                $("#vas_pilih").addClass("hide")
                $("#wbfs_pilih").addClass("hide")
                $("#flacc_pilih").removeClass("hide")
                $("[name='wajah_ka']").val(data.wajah);
                $("[name='leg_ka']").val(data.leg);
                $("[name='gerakan_ka']").val(data.gerakan);
                $("[name='kemampuan_ka']").val(data.kemampuan);
                $("#skor_flacc").text(data.flacc_skor)
            }
        } else {
            $(".skrining_nyeri").prop("hidden", true)
            $("[name='profokatif_ka']").val("tidak ada");
            $("[name='quality_ka']").val("tidak ada");
            $("[name='region_ka']").val("tidak ada");
            $("[name='skala_ka']").val("tidak ada");
            $("[name='timing_ka']").val("tidak ada");
            $(`[name='tidur_malam_ka'][value='${data.tidur_malam}']`).prop("checked", false)
            $(`[name='halangan_aktivitas_ka'][value='${data.halangan_aktivitas}']`).prop("checked", false)
            $(`[name='nyeri_sakit_ka'][value='${data.nyeri_sakit}']`).prop("checked", false)

        }

        // gizi
        $("[name='gizi_ka']").val(data.gizi).trigger("change")
        $("[name='gizi_makan_ka']").val(data.gizi_makan).trigger("change")
        $("#skor_gizi").text(data.skor_gizi)
    }

    function editEdukasiPasien(idx, id, nomr) {
        $.ajax({
            type: "POST",
            url: base_url + "rajal/edit_edukasi_pasien",
            data: {
                idx: idx,
                id: id,
                nomr: nomr
            },
            dataType: "JSON",
            success: function(response) {
                let data = response.data;
                console.log(data.penerjemah)
                $("#bahasa_e").val(data.bahasa.split(";")).trigger("change")
                $("#terbatas_fisik_e").val(data.terbatas_fisik.split(";")).trigger("change")
                $("#hambatan_e").val(data.hambatan.split(";")).trigger("change")
                $("#metode_e").val(data.metode.split(";")).trigger("change")
                $("#media_e").val(data.media.split(";")).trigger("change")
                $("#kebutuhan_edukasi_e").val(data.kebutuhan_edukasi.split(";")).trigger("change")
                $("#bahasa_lainnya").val(data.bahasa_lainnya)
                $(`input[name='penerjemah_e'][value='${data.penerjemah}']`).prop("checked", true)
                $(`input[name='kesediaan_e'][value='${data.kesediaan}']`).prop("checked", true)
                $(`input[name='sasaran_edukasi_e'][value='${data.sasaran_edukasi}']`).prop("checked", true)
                $("#pendidikan_e").val(data.pendidikan)
                $("#agama_e").val(data.agama)
                $("#kesediaan_alasan_e").val(data.kesediaan_alasan)
                $("#kebutuhan_edukasi_lain_e").val(data.kebutuhan_edukasi_lain)
                $("#keyakinan_e").val(data.keyakinan)
                $("#hubungan_keluarga_e").val(data.hubungan_keluarga)

            },
            error: function(e) {
                console.log(e)
            }
        });
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

    function signKembangPasienDpjp(idx, id, nomr, user) {
        $("[name='idDpjp']").val(id);
        $("[name='idxDpjp']").val(idx);
        $("[name='nomrDpjp']").val(nomr);
        $("[name='userDpjp']").val(user);
        $("#modal-kembang-pasien-review-form").modal("show")
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

    function final(id, status, msg = "") {
        var x = confirm(msg);
        // alert(id)
        // return false;
        if (x) {
            $.ajax({
                type: "POST",
                url: base_url + "rajal/set_final_rekam_medis",
                data: {
                    id: id,
                    status: status
                },
                dataType: "json",
                success: function(response) {
                    reloadPage()
                },
                error: function(e) {
                    e
                }
            });
        }
    }

    function riwayatRajal(nomr) {
        $.ajax({
            type: "POST",
            url: base_url + "rajal/get_riwayat_rajal",
            data: {
                nomr: nomr
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                var first = response.list[0];
                var table = `<dl>
                    <dt>Nama</dt>
                    <dd>${first.nama}</dd>
                    <dt>NOMR</dt>
                    <dd>${first.nomr}</dd>
                    <dt>Tgl lahir</dt>
                    <dd>${convertDateFromDBIndoFull(first.tgl_lahir)}</dd>
                </dl>`;
                table += `<div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tgl Masuk</th>
                                        <th>Dokter Jaga</th>
                                        <th>Status RME</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>`;
                $.each(response.list, function(k, v) {
                    table += `<tr>
                        <td>${v.tgl_masuk}</td>
                        <td>${v.namaDokterJaga}</td>
                        <td>${status_erm(v.status_erm)}</td>
                        <td><button class="btn btn-xs btn-default" onclick="pilih_pasien('${v.idx}')">Lihat</button></td>
                    </tr>`
                })

                table += `</tbody>
                            </table>
                        </div>`;
                if (response.status == true) {
                    $("#modal-riwayat-rajal-body").html(table);
                    $("#modal-riwayat-rajal").modal("show");
                }
            }
        });
    }

    function pilih_pasien(a) {
        //alert(a + b);
        var url = base_url + 'erm/detail?idx=' + a;
        // window.location.href = url;
        window.open(url, '_blank', "left=800,top=100,width=800,height=400");
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

    function assign_prmrj(id) {
        let pin = prompt("Enter Pin");
    }

    function cetak_prmrj(nomr) {
        window.open(base_url + "rajal/prmrj/" + nomr, "_blank")
    }

    function copyText() {
        var valueText = $("#copy_id_daftar").select().val();
        navigator.clipboard.writeText(valueText);
        alert("No Register '" + valueText + "' berhasil di salin" )
    }
</script>
       
       
<!--  -->