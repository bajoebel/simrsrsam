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
                                                    Status Rekam Medis<br/>
                                                    <span><?php echo status_erm($detail->status_erm) ?></span> <br /><br />
                                                    Aksi <br/>
                                                    <?php if ($detail->status_erm==1) {?>
                                                        <button class="btn btn-sm btn-danger" onclick="final('<?=$detail->idx?>',0,'Batalkan Final Rekam Medis')"><i class="fa fa-refresh" data-toggle="tooltip" title="Batalkan rekam medis" ></i></button>
                                                    <?php } else {?>
                                                        <button class="btn btn-sm btn-primary" onclick="final('<?=$detail->idx?>',1,'Final Rekam Medis')"><i class="fa fa-check" data-toggle="tooltip" title="Final rekam medis" ></i></button>
                                                    <?php } ?>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-print" data-toggle="tooltip" title="Cetak"></i></button>
                                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            <span class="caret"></span>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="#" data-pil="awal_rawat" data-idx="<?= $detail->idx ?>" data-nomr="<?=$detail->nomr?>" class="riwayat-form-link" >Kajian Awal Rawat</a></li>
                                                            <li><a href="#" data-pil="awal_medis" data-idx="<?= $detail->idx ?>" data-nomr="<?=$detail->nomr?>" class="riwayat-form-link" >Kajian Awal Medis</a></li>
                                                            <li><a href="#" data-pil="edukasi_pasien" data-idx="<?= $detail->idx ?>" data-nomr="<?=$detail->nomr?>" class="riwayat-form-link" >Edukasi Pasien</a></li>
                                                            <li><a href="#" data-pil="cppt" data-idx="<?= $detail->idx ?>" data-nomr="<?=$detail->nomr?>" class="riwayat-form-link" >CPPT</a></li>
                                                            <li><a href="#" data-pil="prmrj" data-idx="<?= $detail->idx ?>" data-nomr="<?=$detail->nomr?>" class="riwayat-form-link" >Profil Ringkas Medis Rawat Jalan</a></li>
                                                        </ul>
                                                    </div>
                                                    <button type="button" class="btn btn-sm btn-default" onclick="reloadPage()"><i class="fa fa-refresh"></i></button>
                                            </td>
                                            <td>
                                                <b>Hari/Tanggal Masuk</b><br />
                                                <?php echo DateToIndoDayTime($detail->tgl_masuk) ?> <br/><br/>
                                                <b>Riwayat</b><br/>
                                                <button class="btn btn-sm btn-success" onclick="riwayatRajal('<?= $detail->nomr ?>')"><i class="fa fa-history" data-toggle="tooltip" title="Tampilkan Riwayat" ></i></button>
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
                                <h5 class="box-title">Detail</h5>
                            </div>
                            <div class="box-body" id="riwayat">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8" style="padding:0 2px !important">
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
            <div class="modal-body" id="modal-riwayat-form-body" >

            </div>
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

        $('#table-prmrj').on('shown.bs.collapse', function () {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

        loadAwal()
    });
</script>
<!-- script persetujuan umum -->
<script>
    $(document).ready(function() {
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

        // insert data kaji awal keperawatan
        $("#form-data-kaji-awal").on("submit", function(e) {
            e.preventDefault();
            // alert($("[name='tiba_ka']:checked").val()==undefined);
            // return false;
            if ($("[name='tiba_ka']:checked").val()==undefined) {
                swal("Tiba di ruangan wajib di isi");
                return false;
            }
            if ($("[name='rujukan_ka']:checked").val()==undefined) {
                swal("Rujukan Wajib Diisi");
                return false;
            }

            if ($("#keluhan_ka").val()=="") {
                swal("Keluhan Waji Di ISI");
                return false;
            }
            
            if ($("#dirawat_ka").val()=="") {
                swal("Riwayat rawat wajib diisi");
                return false;
            }

            if ($("#diagnosis_ka").val()=="") {
                swal("Riwayat Diagnosis wajib diisi");
                return false;
            }

            if ($("#riwayat_sakit_ka").val()=="") {
                swal("Riwayat penyakit dahulu wajib diisi");
                return false;
            }

            if ($("#riwayat_sakit_keluarga_ka").val()=="") {
                swal("Riwayat penyakit keluarga dahulu wajib diisi");
                return false;
            }

            if ($("#riwayat_psikologis_ka").val()=="") {
                swal("Riwayat psikologis wajib diisi");
                return false;
            }

            if ($("[name='kultural_ka']:checked").val()==undefined) {
                swal("Hubungan pasien dan keluarga Wajib Diisi");
                return false;
            }

            if ($("#status_ekonomi_ka").val()=="") {
                swal("Status ekonomi pasien wajib diisi");
                return false;
            }

            if ($("[name='obat_ka']:checked").val()==undefined) {
                swal("Riwayat alergi obat Wajib Diisi");
                return false;
            }

            if ($("[name='makanan_ka']:checked").val()==undefined) {
                swal("Riwayat alergi makanan Wajib Diisi");
                return false;
            }

            if ($("[name='nyeri_ka']:checked").val()==undefined) {
                swal("Skrining nyeri Wajib Diisi");
                return false;
            }

            if ($("[name='aktivitas_ka']:checked").val()==undefined) {
                swal("Status fungsional Wajib Diisi");
                return false;
            }

            if ($("[name='jatuh_ka']:checked").val()==undefined) {
                swal("Resiko Jatuh Wajib Diisi");
                return false;
            }

            if ($("#keadaan_umum_ka").val()=="") {
                swal("Keadaan umum pasien wajib diisi");
                return false;
            }

            if ($("#kesadaran_umum_ka").val()=="") {
                swal("Kesadaran pasien wajib diisi");
                return false;
            }

            if ($("#gcs_e_ka").val()=="" && $("#gcs_m_ka").val()=="" && $("#gcs_v_ka").val()=="" ) {
                swal("GCS wajib diisi semua");
                return false;
            }

            if ($("#ttv_sh_ka").val()=="" && $("#ttv_nd_ka").val()=="" && $("#ttv_rr_ka").val()=="" && $("#ttv_spo2_ka").val()=="" && $("#ttv_td_ka").val()=="" && $("#ttv_ds_ka").val()=="") {
                swal("TTV wajib diisi semua");
                return false;
            }

            if ($("#status_generalis_ka").val()=="") {
                swal("Status generalis wajib diisi");
                return false;
            }

            if ($("#komunikasi_ka").val()=="") {
                swal("Hambatan dalam pemberlajaran wajib diisi");
                return false;
            }

            if ($("#komunikasi_penerjemah_ka").val()=="") {
                swal("Kebutuhan penerjemah wajib diisi");
                return false;
            }

            if ($("[name='jatuh_ka']:checked").val()==undefined) {
                swal("Kebutuhan edukasi Wajib Diisi");
                return false;
            }

            if ($("#diagnosa_keperawatan_ka").val()=="") {
                swal("Diagnosa keperawatan wajib diisi");
                return false;
            }
            if ($("#tindakan_keperawatan_ka").val()=="") {
                swal("Tindakan keperawatan wajib diisi");
                return false;
            }


            if ($("#perawat_id_ka").val()=="") {
                swal("Perawat Yang Melakukan Kajian Wajib Di isi");
                return false;
            }

            var data_form = $(this).serializeArray();
            var data_push = [{
                    "name": "dpjp_text_ka",
                    "value": $("#dpjp_ka").select2("data")[0].text
                }, {
                    "name": "poli_text_ka",
                    "value": $("#poli_ka").select2("data")[0].text
                }, {
                    "name": "flacc_skor_ka",
                    "value": parseInt($("#skor_flacc").text())
                }, {
                    "name": "flacc_skor_detail_ka",
                    "value": $("#skor_flacc_detail").text()
                }, {
                    "name": "skor_gizi_ka",
                    "value": parseInt($("#skor_gizi").text())
                }, {
                    "name": "gizi_detail_ka",
                    "value": $("#gizi_ka option:selected").text()
                }, {
                    "name": "gizi_makan_detail_ka",
                    "value": $("#gizi_makan_ka option:selected").text()
                }, {
                    "name": "gizi_makan_value_ka",
                    "value": source_gizi($("#gizi_makan_ka").val()).value
                }, {
                    "name": "gizi_value_ka",
                    "value": source_gizi($("#gizi_ka").val()).value
                }, {
                    "name": "perawat_ka",
                    "value": $("#perawat_id_ka option:selected").text()
                },
                // {
                //     name : "diagnosa_keperawatan_kat",
                //     value : CKEDITOR.instances.diagnosa_keperawatan_ka.getData()
                // },
                // {
                //     name : "tindakan_keperawatan_kat",
                //     value : CKEDITOR.instances.tindakan_keperawatan_ka.getData()
                // }
            ];
            data_form = $.merge(data_form, data_push)
            // console.log(data_push)
            // console.log(data_form);
            // return false;
            $.ajax({
                type: "POST",
                url: base_url + "/rajal/insert_kaji_awal",
                data: data_form,
                dataType: "json",
                beforeSend: function() {
                    $(":submit").attr("disabled", true);
                },
                success: function(response) {
                    swal("Success", "Data Berhasil Di Simpan", "success");
                    // console.log(response);
                    // $('#form-data-kaji-awal')[0].reset();
                    // console.log(response);
                    $(":submit").attr("disabled", false);
                    getRiwayat(3, <?= $detail->idx ?>);
                    setTimeout(() => {
                        reload_page()
                    }, 2000); 
                    $("#ar_preview").removeClass("hide")
                    $("#ar_form").addClass("hide")
                },
                error: function(e) {
                    console.log(e)
                }
            });
        })

        // insert data kaji awal medis
        $("#form-data-kaji-awal-medis").on("submit", function(e) {
            e.preventDefault();
            if ($("#td_m").val()=="") {
                alert("TD wajib diisi");
                return false;
            }

            if ($("#nadi_m").val()=="") {
                alert("Nadi wajib diisi");
                return false;
            }

            if ($("#napas_m").val()=="") {
                alert("Nadi wajib diisi");
                return false;
            }

            if ($("#suhu_m").val()=="") {
                alert("Nadi wajib diisi");
                return false;
            }

            var diagnosis_kerja = CKEDITOR.instances['diagnosis_kerja_m'].getData().replace(/<[^>]*>/gi, '').length;
            if (!diagnosis_kerja) {
                alert("Diagnosis kerja wajib diisi");
                return false;
            }

            var penunjang = CKEDITOR.instances['penunjang_m'].getData().replace(/<[^>]*>/gi, '').length;
            if (!penunjang) {
                alert("Pemeriksaan penunjang wajib diisi");
                return false;
            }

            var banding = CKEDITOR.instances['diagnosis_banding_m'].getData().replace(/<[^>]*>/gi, '').length;
            if (!banding) {
                alert("Pemeriksaan penunjang wajib diisi");
                return false;
            }

            var terapi = CKEDITOR.instances['terapi_m'].getData().replace(/<[^>]*>/gi, '').length;
            if (!terapi) {
                alert("Terapi dan tindakan wajib diisi");
                return false;
            }

            if ($("#dokter_id_m").val()=="") {
                alert("DPJP wajib diisi");
                return false;
            }

            var data_form = $(this).serializeArray();
            var data_push = [{
                    name: "dokter_m",
                    value: $("#dokter_id_m option:selected").text()
                },
                {
                    name: "kontrol_tujuan_m",
                    value: $("#kontrol_tujuan_id_m option:selected").text()
                },
                {
                    name : "pj_nama_m",
                    value : $("#pj_nama_m").val()
                },
                {
                    name : "diagnosis_kerja_mt",
                    value : CKEDITOR.instances.diagnosis_kerja_m.getData()
                },
                {
                    name : "diagnosis_banding_mt",
                    value : CKEDITOR.instances.diagnosis_banding_m.getData()
                },
                {
                    name : "penunjang_mt",
                    value : CKEDITOR.instances.penunjang_m.getData()
                },
                {
                    name : "terapi_mt",
                    value : CKEDITOR.instances.terapi_m.getData()
                },
            ];
            data_form = $.merge(data_form, data_push)
            // console.log($("#pj_nama_m").val())
            // console.log(data_form);
            // return false;
            $.ajax({
                type: "POST",
                url: base_url + "/rajal/insert_kaji_awal_medis",
                data: data_form,
                dataType: "json",
                beforeSend: function() {
                    $(":submit").attr("disabled", true);
                },
                success: function(response) {
                    // console.log(response)
                    // return false;
                    swal("Success", "Data Berhasil Di Simpan", "success");
                    // $('#form-data-kaji-awal-medis')[0].reset();
                    // console.log(response);
                    $(":submit").attr("disabled", false);
                    getRiwayat(4, <?= $detail->idx ?>);
                    reloadPage();
                },
                error: function(e) {
                    console.log(e)
                }
            });
        })

        // insert perkembangan pasien terintegrasi
        $("#form-data-kembang-pasien").on("submit", function(e) {
            e.preventDefault();
            if ($("#jenis_tenaga_medis_id_k").val()=="") {
                alert("Profesional wajib diisi")
                return false;
            }
            if ($("#tenaga_medis_id_k").val()=="") {
                alert("Nama Profesional wajib diisi")
                return false;
            }

            // var subyektif = CKEDITOR.instances['subyektif_k'].getData().replace(/<[^>]*>/gi, '').length;
            // if (!subyektif) {
            //     alert("Subyektif wajib diisi")
            //     return false;
            // }
            // var obyektif = CKEDITOR.instances['obyektif_k'].getData().replace(/<[^>]*>/gi, '').length;
            // if (!obyektif) {
            //     alert("Obyektif wajib diisi")
            //     return false;
            // }
            // var assesment = CKEDITOR.instances['assesment_k'].getData().replace(/<[^>]*>/gi, '').length;
            // if (!assesment) {
            //     alert("Assesment wajib diisi")
            //     return false;
            // }
            // var planning = CKEDITOR.instances['planning_k'].getData().replace(/<[^>]*>/gi, '').length;
            // if (!planning) {
            //     alert("planning wajib diisi")
            //     return false;
            // }
            // var instruksi = CKEDITOR.instances['instruksi_k'].getData().replace(/<[^>]*>/gi, '').length;
            // if (!instruksi) {
            //     alert("intruksi wajib diisi")
            //     return false;
            // }
            // var review = CKEDITOR.instances['review_k'].getData().replace(/<[^>]*>/gi, '').length;
            // if (!review) {
            //     alert("review wajib diisi")
            //     return false;
            // }
            var data_form = $(this).serializeArray();
            var data_push = [{
                    name: "jenis_tenaga_medis_k",
                    value: $("#jenis_tenaga_medis_id_k option:selected").text()
                },
                {
                    name: "tenaga_medis_k",
                    value: $("#tenaga_medis_id_k option:selected").text()
                },
                {
                    name : "subyektif_kt",
                    value : CKEDITOR.instances.subyektif_k.getData()
                },{
                    name : "obyektif_kt",
                    value : CKEDITOR.instances.obyektif_k.getData()
                },
                {
                    name : "assesment_kt",
                    value : CKEDITOR.instances.assesment_k.getData()
                },
                {
                    name : "planning_kt",
                    value : CKEDITOR.instances.planning_k.getData()
                },
                {
                    name : "instruksi_kt",
                    value : CKEDITOR.instances.instruksi_k.getData()
                },
                {
                    name : "review_kt",
                    value : CKEDITOR.instances.review_k.getData()
                },
            ];
            data_form = $.merge(data_form, data_push)
            // console.log(data_form);
            // return false;
            $.ajax({
                type: "POST",
                url: base_url + "/rajal/insert_kembang_pasien",
                data: data_form,
                dataType: "json",
                beforeSend: function() {
                    $(":submit").attr("disabled", true);
                },
                success: function(response) {
                    swal("Success", "Data Berhasil Di Simpan", "success");
                    // console.log(response);
                    resetKembangPasien()
                    // $('#subyektif_k,#obyektif_k,#assesment_k,#planning_k,#instruksi_k,#review_k').text("")
                    // console.log(response);
                    $(":submit").attr("disabled", false);
                    getRiwayat(5, <?= $detail->idx ?>);
                    reloadPage();
                },
                error: function(e) {
                    console.log(e)
                }
            });
        })

        // insert perkembangan pasien terintegrasi
        $("#form-data-edukasi-pasien").on("submit", function(e) {
            e.preventDefault();
            var data_form = $(this).serializeArray();
            var idx = $("#idx_e").val()
            // console.log(data_form);
            // return false;
            $.ajax({
                type: "POST",
                url: base_url + "/rajal/insert_edukasi_pasien",
                data: data_form,
                dataType: "json",
                beforeSend: function() {
                    $("#form-data-edukasi-pasien:submit").attr("disabled", true);
                },
                success: function(response) {
                    // localStorage.setItem("id_rj_iep_"+idx, response.id);
                    // $("#id_rj_iep").val(localStorage.getItem("id_rj_iep_"+idx));
                    // $("#form-data-edukasi-pasien").addClass("hide");
                    // $("#form-data-edukasi-pasien-detail").removeClass("hide");
                    swal("Success", "Data Berhasil Di Simpan", "success");
                    // console.log(response);
                    // $('#form-data-edukasi-pasien')[0].reset();
                    // console.log(response);
                    $(":submit").attr("disabled", false);
                    getRiwayat(6, <?= $detail->idx ?>);
                },
                error: function(e) {
                    console.log(e)
                }
            });
        })

        // inser permintaan Penunjang
        $("#form-permintaan-penunjang").on("submit",function(e) {
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
            data_form = $.merge(data_form,data_push);
            // console.log(data_form)
            // return false;
            $.ajax({
                method: "POST",
                url: base_url+"rajal/insert_permintaan_penunjang",
                data: data_form,
                dataType: "json",
                success: function (response) {
                    reloadPage();
                },
                error : function (e) {
                    console.log(e)
                }
            });
        })

        $(".riwayat-form-link").on("click",function(e) {
            e.preventDefault();
            var pil = $(this).data("pil")
            var nomr = $(this).data("nomr")
            var idx = $(this).data("idx")
            $.ajax({
                type: "POSt",
                url: base_url+"rajal/get_riwayat_form",
                data: {
                    pil:pil,
                    nomr : nomr,
                    idx : idx
                },
                dataType: "html",
                success: function (response) {
                    $("#modal-riwayat-form").modal("show")
                    $("#modal-riwayat-form-body").html(response)
                },
                error : function(e) {
                    console.log(e.responseText)
                }
            });
        })

        $("#kembang-pasien-review-sign").on("submit",function (e) {
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
    function tambahAwalRawat() {
        $("#ar_preview").addClass("hide")
        $("#ar_form").removeClass("hide")
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
                localStorage.setItem("tab_aktif",pil)
                $("#riwayat").html(response);
            },
            error: function(e) {
                console.log(e)
            }
        });
    }

    function editAwalMedis(idx,id,nomr) {
        $.ajax({
            type: "POST",
            url: base_url+"rajal/edit_awal_medis",
            data: {
                idx : idx,
                id : id,
                nomr : nomr
            },
            dataType: "JSON",
            success: function (response) {
                let data = response.data;
                // console.log(data.kontrol_tgl)

                $("#tampil_awal_medis").show()
                $("#panduan_m").val(data.kode_m_pk).trigger("change");
                $("[name='hari_m']").val(data.hari)
                $("[name='tgl_m']").val(data.tgl)
                $("[name='jam_m']").val(data.jam)
                $("[name='auto_detail_m']").val(data.auto_detail)
                $("[name='allo_m']").val(data.allo)
                $("[name='allo_detail_m']").val(data.allo_detail)
                $("[name='td_m']").val(data.td)
                $("[name='nadi_m']").val(data.nadi)
                $("[name='napas_m']").val(data.napas)
                $("[name='suhu_m']").val(data.suhu)
                $("[name='fisik_detail_m']").text(data.fisik_detail)
                CKEDITOR.instances['diagnosis_kerja_m'].setData(data.diagnosis_kerja)
                CKEDITOR.instances['diagnosis_banding_m'].setData(data.diagnosis_banding)
                // CKEDITOR.instances['penunjang_m'].setData(data.penunjang)
                CKEDITOR.instances['terapi_m'].setData(data.terapi)
                $("[name='kontrol_m']").val(data.kontrol)
                $("[name='kontrol_tanggal_m']").val(data.kontrol_tgl)
                $("[name='kontrol_jam_m']").val(data.kontrol_jam)
                $("[name='kontrol_tujuan_id_m']").val(data.kontrol_tujuan_id).trigger("change")
                $("[name='pj_m']").val(data.pj)
                $("[name='pj_detail_m']").val(data.pj_detail)
                $("[name='pj_nama_m']").val(data.pj_nama)
                $("[name='dokter_id_m']").val(data.dokter_id).trigger("change")
                if (data.auto) {
                    $("[name='auto_m']").prop("checked",true).trigger("change")
                } else {
                    $("[name='auto_m']").prop("checked",false).trigger("change")
                }
                if (data.allo) {
                    $("[name='allo_m']").prop("checked",true).trigger("change")
                } else {
                    $("[name='allo_m']").prop("checked",false).trigger("change")
                }
                if (data.kontrol) {
                    $("[name='kontrol_m']").prop("checked",true).trigger("change")
                    $("[name='kontrol_tanggal_m']").val(data.kontrol_tgl)
                    $("[name='kontrol_jam_m']").val(data.kontrol_jam)
                } else {
                    $("[name='kontrol_m']").prop("checked",false).trigger("change")
                }

                

                swal("Silahkan Edit Data")
                $("#am_form").removeClass("hide")
                $("#am_preview").addClass("hide")
            },
            error: function (e) {
                console.log(e)
            }
        });
    }

    function editKembangPasien(idx,id,nomr) {
        $.ajax({
            type: "POST",
            url: base_url+"rajal/edit_kembang_pasien",
            data: {
                idx : idx,
                id : id,
                nomr : nomr
            },
            dataType: "JSON",
            success: function (response) {
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
                CKEDITOR.instances['review_k'].setData(data.review)

                list_tenaga_medis(data.jenis_tenaga_medis_id,data.tenaga_medis_id);
                $("#kp_form").removeClass("hide")
                $("#kp_preview").addClass("hide")
                swal("Silahkan Edit Data")
            },
            error: function (e) {
                console.log(e)
            }
        });
    }

    function editAwalRawat(idx,id,nomr) {
        $.ajax({
            type: "POST",
            url: base_url+"rajal/edit_kaji_awal",
            data: {
                idx : idx,
                id : id,
                nomr : nomr
            },
            dataType: "JSON",
            success: function (response) {
                // localStorage.setItem("response", JSON.stringify(response));
                // console.log(response)
                let data = response.data;
                responseAwalRawat(data)
                swal("Silahkan Edit Data")
                $("#modal-riwayat-form").modal("hide")
                $("ar_form").removeClass("hide")
                $("#ar_preview").addClass("hide")
                $("#ar_form").removeClass("hide")
            },
            error: function (e) {
                console.log(e)
            }
        });
    }

    function responseAwalRawat(data) {
        $("[name='cppt_id_m']").val(data.cppt_id);
        $("[name='poli_ka']").val(data.poli).trigger("change");
        $("[name='perawat_id_ka']").val(data.perawat_id).trigger("change");
        $("[name='dpjp_id_ka']").val(data.dpjp_id).trigger("change");
        $("[name='tanggal_ka']").val(data.tanggal);
        $("[name='jam_ka']").val(data.jam);
        $(`[name='tiba_ka'][value='${data.tiba}']`).prop("checked",true)
        $(`[name='rujukan_ka'][value='${data.rujukan}']`).prop("checked",true)
        $("[name='rujukan_lainnya_ka']").val(data.rujukan_lainnya);
        $("[name='keluhan_ka']").val(data.keluhan);
        $("[name='dirawat_ka']").val(data.dirawat);
        $("[name='kapan_dirawat_ka']").val(data.kapan_dirawat);
        $("[name='dimana_dirawat_ka']").val(data.dimana_dirawat);
        $("[name='diagnosis_ka']").val(data.diagnosis);
        if (data.implant) {
            $("[name='implant_ka']").prop("checked",true)
            $("[name='implant_detail_ka']").prop("readonly",false)
        } else {
            $("[name='implant_ka']").prop("checked",false)
            $("[name='implant_detail_ka']").prop("readonly",true)
        }
        $("[name='implant_detail_ka']").val(data.implant_detail);
        if (data.riwayat_operasi_cek) {
            $("[name='riwayat_operasi_cek_ka']").prop("checked",true)
            $("[name='riwayat_operasi_ka']").prop("readonly",false)
            $("[name='riwayat_operasi_tahun_ka']").prop("disabled",false)
        } else {
            $("[name='riwayat_operasi_cek_ka']").prop("checked",false)
            $("[name='riwayat_operasi_ka']").prop("readonly",true)
            $("[name='riwayat_operasi_tahun_ka']").prop("disabled",true)
        }
        $("[name='riwayat_operasi_ka']").val(data.riwayat_operasi)
        $("[name='riwayat_operasi_tahun_ka']").val(data.riwayat_operasi_tahun)

        $("[name='riwayat_sakit_ka[]']").val(data.riwayat_sakit?.split(";")).trigger("change");
        $("[name='riwayat_sakit_keluarga_ka[]']").val(data.riwayat_sakit_keluarga?.split(";")).trigger("change");
        $("[name='riwayat_psikologis_ka[]']").val(data.riwayat_psikologis?.split(";")).trigger("change");
        (data.status_mental_sadar)?$("[name='status_mental_sadar_ka']").prop("checked",true):"";
        (data.status_mental_prilaku)?$("[name='status_mental_prilaku_ka']").prop("checked",true):"";
        (data.status_mental_keras)?$("[name='status_mental_keras_ka']").prop("checked",true):"";
        $("[name='status_mental_prilaku_detail_ka']").val(data.status_mental_prilaku_detail)
        $("[name='status_mental_keras_detail_ka']").val(data.status_mental_keras_detail)
        $(`[name='kultural_ka'][value='${data.kultural}']`).prop("checked",true)
        $("[name='kultural_nama_ka']").val(data.kultural_nama);
        $("[name='kultural_hubungan_ka']").val(data.kultural_hubungan);
        $("[name='kultural_phone_ka']").val(data.kultural_phone);
        $("[name='nilai_kepercayaan_ka']").val(data.nilai_kepercayaan);
        $("[name='status_ekonomi_ka[]']").val(data.status_ekonomi?.split(";")).trigger("change");
        $("[name='spiritual_biasa_ka']").val(data.spiritual_biasa);
        $(`[name='obat_ka'][value='${data.obat}']`).prop("checked",true)
        $(`[name='makanan_ka'][value='${data.makanan}']`).prop("checked",true)
        $("[name='riwayat_lain_ka']").val(data.riwayat_lain);
        // strong kids
        var strong_kids = data.strong_kids?.split(";")
        if (strong_kids) {
            strong_kids.forEach((value,index)=>{
                $(`[name='strong_kids_ka[]'][value='${value}']`).prop("checked",true)
            })
        }
        
        $(`[name='aktivitas_ka'][value='${data.aktivitas}']`).prop("checked",true)
        $("[name='akftivitas_detail_ka']").val(data.aktivitas_detail);
        $(`[name='aktivitas_info_ka'][value='${data.aktivitas_info}']`).prop("checked",true)
        $("[name='aktivitas_info_detail_ka']").val(data.aktivitas_info_detail);
        $(`[name='jatuh_ka'][value='${data.jatuh}']`).prop("checked",true)
        $(`[name='gelang_resiko_ka'][value='${data.gelang_resiko}']`).prop("checked",true)
        $(`[name='risiko_info_ka'][value='${data.risiko_info}']`).prop("checked",true)
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
        $(`[name='penunjang_rad_ka'][value='${data.penunjang_rad}']`).prop("checked",true)
        $("[name='penunjang_rad_detail_ka']").val(data.penunjang_rad_detail);
        $(`[name='penunjang_lab_ka'][value='${data.penunjang_lab}']`).prop("checked",true)
        $("[name='penunjang_lab_detail_ka']").val(data.penunjang_lab_detail);
        $(`[name='penunjang_lain_ka'][value='${data.penunjang_lain}']`).prop("checked",true)
        $("[name='penunjang_lain_detail_ka']").val(data.penunjang_lain_detail);
        // kebutuhan edukasi
        var kebutuhan_edukasi = data.kebutuhan_edukasi?.split(";")
        if (kebutuhan_edukasi) {
            kebutuhan_edukasi.forEach((value,index)=>{
                $(`[name='kebutuhan_edukasi_ka[]'][value='${value}']`).prop("checked",true)
            })
        }
        $("[name='kebutuhan_edukasi_tindakan_ka']").val(data.kebutuhan_edukasi_tindakan);
        $("[name='kebutuhan_edukasi_lain_ka']").val(data.kebutuhan_edukasi_lain);
        // CKEDITOR.instances['diagnosa_keperawatan_ka'].setData(data.diagnosa_keperawatan)
        // CKEDITOR.instances['tindakan_keperawatan_ka'].setData(data.tindakan_keperawatan)
        $("[name='diagnosa_keperawatan_ka[]']").val(data.diagnosa_keperawatan?.split(";")).trigger("change");
        $("[name='tindakan_keperawatan_ka[]']").val(data.tindakan_keperawatan?.split(";")).trigger("change");
        $(`[name='dijelaskan_ka'][value='${data.dijelaskan}']`).prop("checked",true);
        $("[name='dijelaskan_hubungan_ka']").val(data.dijelaskan_hubungan);
        $("[name='dijelaskan_nama_ka']").val(data.dijelaskan_nama);
        $("[name='perawat_id_ka']").val(data.perawat_id).trigger("change");
        $("[name='komunikasi_penerjemah_ka']").val(data.komunikasi_penerjemah)
        
        // skrining nyeri
        var nyeri = data.nyeri;
        $(`[name='nyeri_ka'][value='${nyeri}']`).prop("checked",true)
        if (nyeri!="tidak ada nyeri") {
            $(".skrining_nyeri").prop("hidden",false)
            $("[name='profokatif_ka']").val(data.profokatif);
            $("[name='quality_ka']").val(data.quality);
            $("[name='region_ka']").val(data.region);
            $("[name='skala_ka']").val(data.skala);
            $("[name='timing_ka']").val(data.timing);
            $(`[name='tidur_malam_ka'][value='${data.tidur_malam}']`).prop("checked",true)
            $(`[name='halangan_aktivitas_ka'][value='${data.halangan_aktivitas}']`).prop("checked",true)
            $(`[name='nyeri_sakit_ka'][value='${data.nyeri_sakit}']`).prop("checked",true)

            var metode = data.metode;
            $(`[name='metode_ka'][value='${metode}']`).prop("checked",true)
            if (metode==1)  {
                $("#vas_pilih").removeClass("hide")
                $("#wbfs_pilih").addClass("hide")
                $("#flacc_pilih").addClass("hide")
                $("[name='skala_vas_ka']").val(data.skala_vas);
            } else if (metode==2) {
                $("#vas_pilih").addClass("hide")
                $("#wbfs_pilih").removeClass("hide")
                $("#flacc_pilih").addClass("hide")
                $("[name='skala_wbfs_ka']").val(data.skala_wbfs);
            } else if (metode==3) {
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
            $(".skrining_nyeri").prop("hidden",true)
            $("[name='profokatif_ka']").val("tidak ada");
            $("[name='quality_ka']").val("tidak ada");
            $("[name='region_ka']").val("tidak ada");
            $("[name='skala_ka']").val("tidak ada");
            $("[name='timing_ka']").val("tidak ada");
            $(`[name='tidur_malam_ka'][value='${data.tidur_malam}']`).prop("checked",false)
            $(`[name='halangan_aktivitas_ka'][value='${data.halangan_aktivitas}']`).prop("checked",false)
            $(`[name='nyeri_sakit_ka'][value='${data.nyeri_sakit}']`).prop("checked",false)
            
        }

        // gizi
        $("[name='gizi_ka']").val(data.gizi).trigger("change")
        $("[name='gizi_makan_ka']").val(data.gizi_makan).trigger("change")
        $("#skor_gizi").text(data.skor_gizi)
    }

    function editEdukasiPasien(idx,id,nomr) {
        $.ajax({
            type: "POST",
            url: base_url+"rajal/edit_edukasi_pasien",
            data: {
                idx : idx,
                id : id,
                nomr : nomr
            },
            dataType: "JSON",
            success: function (response) {
                let data = response.data;
                console.log(data.penerjemah)
                $("#bahasa_e").val(data.bahasa.split(";")).trigger("change")
                $("#terbatas_fisik_e").val(data.terbatas_fisik.split(";")).trigger("change")
                $("#hambatan_e").val(data.hambatan.split(";")).trigger("change")
                $("#metode_e").val(data.metode.split(";")).trigger("change")
                $("#media_e").val(data.media.split(";")).trigger("change")
                $("#kebutuhan_edukasi_e").val(data.kebutuhan_edukasi.split(";")).trigger("change")
                $("#bahasa_lainnya").val(data.bahasa_lainnya)
                $(`input[name='penerjemah_e'][value='${data.penerjemah}']`).prop("checked",true)
                $(`input[name='kesediaan_e'][value='${data.kesediaan}']`).prop("checked",true)
                $(`input[name='sasaran_edukasi_e'][value='${data.sasaran_edukasi}']`).prop("checked",true)
                $("#pendidikan_e").val(data.pendidikan)
                $("#agama_e").val(data.agama)
                $("#kesediaan_alasan_e").val(data.kesediaan_alasan)
                $("#kebutuhan_edukasi_lain_e").val(data.kebutuhan_edukasi_lain)
                $("#keyakinan_e").val(data.keyakinan)
                $("#hubungan_keluarga_e").val(data.hubungan_keluarga)
                
            },
            error: function (e) {
                console.log(e)
            }
        });
    }

    function hapusAwalRawat(idx, id) {
        var x = confirm("Yakin Ingin Hapus Data");
        if (x) {
            $.ajax({
                type: "GET",
                url: base_url + `rajal/delete_kaji_awal/${idx}/${id}`,
                data: "data",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status) {
                        getRiwayat(3, idx);
                        swal("Success", "Data Berhasil Di Hapus", "success");
                        reloadPage()
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

    function hapusAwalMedis(idx, id) {
        var x = confirm("Yakin Ingin Hapus Data");
        if (x) {
            $.ajax({
                type: "GET",
                url: base_url + `rajal/delete_kaji_awal_medis/${idx}/${id}`,
                data: "data",
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        getRiwayat(4, idx);
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

    function hapusKembangPasien(idx, id) {
        var x = confirm("Yakin Ingin Hapus Data");
        if (x) {
            $.ajax({
                type: "GET",
                url: base_url + `rajal/delete_kembang_pasien/${idx}/${id}`,
                data: "data",
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        getRiwayat(5, idx);
                        swal("Success", "Data Berhasil Di Hapus", "success");
                    } else {
                        swal("Failed", "Something Wrong", "error");
                    }
                    reloadPage();
                },
                error: function(e) {
                    console.log(e.responseText);
                }
            });
        }
    }

    function hapusEdukasiPasien(idx, id) {
        var x = confirm("Yakin Ingin Hapus Data");
        if (x) {
            $.ajax({
                type: "GET",
                url: base_url + `rajal/delete_edukasi_pasien/${idx}/${id}`,
                data: "data",
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        getRiwayat(6, idx);
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

    function hapusEdukasiPasienDetail(id) {
        var x = confirm("Yakin Ingin Hapus Data Detail");
        if (x) {
            $.ajax({
                type: "GET",
                url: base_url + `rajal/delete_edukasi_pasien_detail/${id}`,
                data: "data",
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        // getRiwayat(6, idx);
                        tampil_tabel();
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

    function signAwalMedis(idx,id,nomr,dokter) {
        var x = prompt("Masukkan Password");
        if (x!=null && x!="") {
            $.ajax({
                type: "post",
                url: base_url+"rajal/cekPin",
                data: {
                    x : x,
                    user : dokter
                },
                dataType: "json",
                success: function (response) {
                    if (response.status == true ) {
                        $.ajax({
                            type: "POST",
                            url: base_url+"rajal/sign_awal_medis",
                            data: {
                                idx : idx,
                                id : id,
                                nomr : nomr,
                                dokter : dokter
                            },
                            dataType: "JSON",
                            success: function (response) {
                                // console.log(response)
                                swal("QRCODE berhasil di generate")
                                reloadPage()
                            },
                            error : function (e) {
                                console.log(e.responseText)
                            }
                        });
                    } else {
                        alert("Pin Salah...");
                    }
                },
                error : function (e) {
                    console.log(e)
                }
            });
        }
        
    }

    function signKembangPasien(idx,id,nomr,user) {
        var x = prompt("Masukkan Password");
        if (x!=null && x!="") {
            $.ajax({
                type: "post",
                url: base_url+"rajal/cekPin",
                data: {
                    x : x,
                    user : user
                },
                dataType: "json",
                success: function (response) {
                    if (response.status == true ) {
                        $.ajax({
                            type: "POST",
                            url: base_url+"rajal/sign_kembang_pasien",
                            data: {
                                idx : idx,
                                id : id,
                                nomr : nomr,
                                user : user
                            },
                            dataType: "JSON",
                            success: function (response) {
                                reloadPage();
                            },
                            error : function (e) {
                                console.log(e.responseText)
                            }
                        });
                    } else {
                        alert("Pin Salah...");
                    }
                },
                error : function (e) {
                    console.log(e)
                }
            });
        }
    }

    function signKembangPasienDpjp(idx,id,nomr,user) {
        $("[name='idDpjp']").val(id);
        $("[name='idxDpjp']").val(idx);
        $("[name='nomrDpjp']").val(nomr);
        $("[name='userDpjp']").val(user);
        $("#modal-kembang-pasien-review-form").modal("show")
    }

    function signEdukasiPasienDetail(id,user) {
        // $("#modal-psw-e").modal("show")
        // console.log(user)
        // return false;
        var x = prompt("Masukkan Password");
        if (x!=null && x!="") {
            $.ajax({
                type: "post",
                url: base_url+"rajal/cekPin",
                data: {
                    x : x,
                    user : user
                },
                dataType: "json",
                success: function (response) {
                    if (response.status == true ) {
                        $.ajax({
                            type: "POST",
                            url: base_url+"rajal/sign_edukasi_pasien_detail",
                            data: {
                                id : id,
                                user : user
                            },
                            dataType: "JSON",
                            success: function (response) {
                                tampil_tabel();
                                console.log(response)
                            },
                            error : function (e) {
                                console.log(e.responseText)
                            }
                        });
                    } else {
                        alert("Pin Salah...");
                    }
                },
                error : function (e) {
                    console.log(e)
                }
            });
        }
    }

    function signEdukasiPasienDetailSasaran(id) {
        
    }
    
    function signAwalRawat(idx,id,nomr,user) {
        var x = prompt("Masukkan Password");
        if (x!=null) {
            $.ajax({
                type: "post",
                url: base_url+"rajal/cekPin",
                data: {
                    x : x,
                    user : user
                },
                dataType: "json",
                success: function (response) {
                    if (response.status == true ) {
                        $.ajax({
                            type: "POST",
                            url: base_url+"rajal/sign_awal_rawat",
                            data: {
                                idx : idx,
                                id : id,
                                nomr : nomr,
                                user : user
                            },
                            dataType: "JSON",
                            success: function (response) {
                                alert("QRCODE Berhasi di generate")
                                // console.log(response)
                            },
                            error : function (e) {
                                // console.log(e.responseText)
                            }
                        });
                    } else {
                        alert("Pin Salah...");
                    }
                },
                error : function (e) {
                    console.log(e)
                }
            });
        }
     
    }

    function signPermintaanPenunjang(id,idx,user) {
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
                url: base_url+"rajal/sign_permintaan_penunjang",
                method: "post",
                data: {
                    id : id,
                    password : password,
                    user : user
                },
                dataType: "json",
                success: function (response) {
                    console.log(response)
                    swal(response.msg)
                    $("#modal-sign-penunjang").modal("hide")
                    $("#sign_id").val("")
                    $("#sign_user").val("")
                },
                error : function (e) {
                    console.log(e)
                }
            });
        } else {
            alert("id kosong")
        }
    }

    function final(id,status,msg="") {
        var x = confirm(msg);
        // alert(id)
        // return false;
        if (x) {
            $.ajax({
                type: "POST",
                url: base_url+"rajal/set_final_rekam_medis",
                data: {
                    id : id,
                    status: status
                },
                dataType: "json",
                success: function (response) {
                    reloadPage()
                },
                error : function (e) {
                    e
                }
            });
        }
    }

    function riwayatRajal(nomr) {
        $.ajax({
            type: "POST",
            url: base_url+"rajal/get_riwayat_rajal",
            data: {
                nomr : nomr
            },
            dataType: "json",
            success: function (response) {
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
                $.each(response.list,function (k,v) {
                    table+=`<tr>
                        <td>${v.tgl_masuk}</td>
                        <td>${v.namaDokterJaga}</td>
                        <td>${status_erm(v.status_erm)}</td>
                        <td><button class="btn btn-xs btn-default" onclick="pilih_pasien('${v.idx}')">Lihat</button></td>
                    </tr>`
                })

                table+= `</tbody>
                            </table>
                        </div>`;
                if (response.status==true) {
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
        window.open(url,'_blank',"left=800,top=100,width=800,height=400");
    }

    function resetKembangPasien() {
        $('#form-data-kembang-pasien')[0].reset();
        CKEDITOR.instances['subyektif_k'].setData('');
        CKEDITOR.instances['obyektif_k'].setData('');
        CKEDITOR.instances['assesment_k'].setData('');
        CKEDITOR.instances['planning_k'].setData('');
        CKEDITOR.instances['instruksi_k'].setData('');
        CKEDITOR.instances['review_k'].setData('');
        $("[name='id_kembang_pasien']").val("");
        $("[name='tenaga_medis_id_k']").val("");
        $("[name='tenaga_medis_id_k']").val("");
    }

    function assign_prmrj(id) {
        let pin = prompt("Enter Pin");
    }

    function cetak_prmrj(nomr) {
        window.open(base_url+"rajal/prmrj/"+nomr,"_blank")
    } 
</script>
<!--  -->