<script type="text/javascript">
    $(document).ready(function() {

        $('#id_cara_bayar').focus();
        var mask = "<?php echo KODERS_VC ?>9999V999999";
        $('#no_jaminan').val('');
        if ($('#chkIsJaminan').is(':checked')) {
            $('#no_jaminan').inputmask(mask, {
                'placeholder': '<?php echo KODERS_VC ?>____V______'
            });
        } else {
            $('#no_jaminan').inputmask('remove');
        }
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        $('#chkIsJaminan').click(function() {
            if ($('#chkIsJaminan').is(':checked')) {
                $('#no_jaminan').inputmask(mask, {
                    'placeholder': '<?php echo KODERS_VC ?>____V______'
                });
            } else {
                $('#no_jaminan').inputmask('remove');
            }
        });
        $('input').focus(function() {
            return $(this).select();
        })
        getHistoryPasien();
        $('#tgl_layanan').val('<?php echo date("d/m/Y") ?>');
        //$('select').select2({placeholder:'-- Pilih --'})
        $('#batal').click(function() {
            var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/rawat_inap' ?>';
            window.location.href = url;
        });

        //$('#id_cara_bayar').val(id_cara_bayar).trigger('change');
        caraBayar();
        $('#id_cara_bayar').change(function() {
            /*var x = $('#id_cara_bayar :selected').html();
            if (x == "Umum") {
                $('.divRegCredit').hide();
            }else if (x == "Kemitraan RS") {
                $('#no_jaminan').inputmask('remove');
                $('#chkIsJaminan').prop('disabled',true);
            }else{
                $('.divRegCredit').show();
                $('#chkIsJaminan').prop('disabled',false);
            }*/
            cekCarabayar();
        });
        $('#id_cara_bayar').trigger("change");
        $('#daftar').click(function() {
            var c19=$('#c19').prop('checked');
            if(c19==true) c19=1; else c19=0;
            var sdm=$('#sdmrs').val();

            var formdata = {
                id_daftar: $('#id_daftar').val(),
                reg_unit: $('#reg_unit').val(),
                nomr: $('#nomr').val(),
                no_ktp: $('#no_ktp').val(),
                nama_pasien: $('#nama_pasien').val(),
                tempat_lahir: $('#tempat_lahir').val(),
                tgl_lahir: $('#tgl_lahir').val(),
                jns_kelamin: $('#jns_kelamin').val(),
                nama_provinsi: $('#provinsi').val(),
                nama_kab_kota: $('#kabupaten').val(),
                nama_kecamatan: $('#kecamatan').val(),
                nama_kelurahan: $('#kelurahan').val(),
                asal_ruang: $('#asal_ruang').val(),
                nama_asal_ruang: $('#nama_asal_ruang').val(),
                tgl_layanan: $('#tgl_layanan').val(),
                jns_layanan: $('#jns_layanan').val(),
                pjPasienNama: $('#pjPasienNama').val(),
                pjPasienUmur: $('#pjPasienUmur').val(),
                pjPasienPekerjaan: $('#pjPasienPekerjaan').val(),
                pjPasienAlamat: $('#pjPasienAlamat').val(),
                pjPasienTelp: $('#pjPasienTelp').val(),
                pjPasienHubKel: $('#pjPasienHubKel').val(),
                pjPasienDikirimOleh: $('#pjPasienDikirimOleh').val(),
                pjPasienAlmtPengirim: $('#pjPasienAlmtPengirim').val(),
                dokter_pengirim: $('#dokter_pengirim').val(),
                nama_dokter_pengirim: $('#dokter_pengirim :selected').html(),
                dokterJaga: $('#dokterJaga').val(),
                namaDokterJaga: $('#dokterJaga :selected').html(),
                id_kamar: $('#id_kamar').val(),
                nama_kamar: $('#id_kamar :selected').html(),
                id_ruang: $('#id_ruang').val(),
                nama_ruang: $('#id_ruang :selected').html(),
                id_kelas: $('#id_kelas').val(),
                kelas_layanan: $('#id_kelas :selected').html(),
                id_cara_bayar: $('#id_cara_bayar').val(),
                cara_bayar: $('#id_cara_bayar :selected').html(),
                id_jenis_peserta: $('#id_jenis_peserta').val(),
                jenis_peserta: $('#jenis_peserta').val(),
                no_bpjs: $('#no_bpjs').val(),
                no_jaminan: $('#no_jaminan').val(),
                tgl_daftar: $('#tgl_daftar').val(),
                hakKelasid: $('#hakKelasid').val(),
                hakKelas: $('#hakKelas').val(),

                id_provinsi: $('#id_provinsi').val(),
                id_kab_kota: $('#id_kab_kota').val(),
                id_kecamatan: $('#id_kecamatan').val(),
                id_kelurahan: $('#id_kelurahan').val(),
                nama_provinsi: $('#provinsi').val(),
                nama_kab_kota: $('#kabupaten').val(),
                nama_kecamatan: $('#kecamatan').val(),
                nama_kelurahan: $('#kelurahan').val(),
                alamat: $('#alamatktp').val(),
                
                rt: $('#rt').val(),
                rw: $('#rw').val(),
                id_provinsi_domisili: $('#id_provinsi_domisili').val(),
                id_kab_kota_domisili: $('#id_kab_kota_domisili').val(),
                id_kecamatan_domisili: $('#id_kecamatan_domisili').val(),
                id_kelurahan_domisili: $('#id_kelurahan_domisili').val(),
                nama_provinsi_domisili: $('#provinsi_domisili').val(),
                nama_kab_kota_domisili: $('#kabupaten_domisili').val(),
                nama_kecamatan_domisili: $('#kecamatan_domisili').val(),
                nama_kelurahan_domisili: $('#kelurahan_domisili').val(),
                rt_domisili: $('#rt_domisili').val(),
                rw_domisili: $('#rw_domisili').val(),
                alamat_domisili: $('#alamat_domisili').val(),
                kodepos: $('#kodepos').val(),
                kodepos_domisili: $('#kodepos_domisili').val(),
                sdmrs: sdm,
                icdkode: $('#kodeicd').val(),
                icd:$('#nama_icd').val(),
                c19:c19,
            }

            if (formdata['id_daftar'] == "") {
                alert('Ops. No Registrasi RS kosong. Coba ulangi lagi');
            } else if (formdata['reg_unit'] == "") {
                alert('Ops. No Registrasi Unit kosong. Coba ulangi lagi');
            } else if (formdata['nomr'] == "") {
                alert('Ops. No.MR tidak kosong. Coba ulangi lagi');
            } else if (formdata['id_kelas'] == "") {
                alert('Ops. Kamar Rawatan Masih kosong. Coba ulangi lagi');
            } else if (formdata['asal_ruang'] == "") {
                alert('Ops. Asal poli kosong. Coba ulangi lagi');
            } else if (formdata['dokter_pengirim'] == "") {
                alert('Ops. Dokter Pengirim kosong. Coba ulangi lagi');
            } else if (formdata['dokterJaga'] == "") {
                alert('Ops. Dokter DPJP / Dokter Jaga kosong. Coba ulangi lagi');
            } else if (formdata['id_ruang'] == "") {
                alert('Ops. Ruang rawatan Masih kosong. Coba ulangi lagi');
            } else if (formdata['pjPasienNama'] == "") {
                alert('Ops. Nama penanggung jawab pasien tidak boleh kosong.');
                $('#pjPasienNama').focus()
            } else if (formdata['dokter_pengirim'] == "") {
                alert('Ops. Dokter pengirim harus di pilih.');
            } else if (formdata['id_ruang'] == "") {
                alert('Ops. Tujuan layanan harus di pilih.');
            } else if (formdata['id_kelas'] == "") {
                alert('Ops. Kelas pelayanan harus di pilih.');
            } else if (formdata['id_cara_bayar'] == "") {
                alert('Ops. Cara bayar harus di pilih.');
            } else if (formdata['dokterJaga'] == "") {
                alert('Ops. Dokter DPJP harus di pilih.');
            } else {
                if ($('#jkn').val() == 1) {
                    if ($('#status_peserta').val() == '') {
                        alert('Ops. Status Kepesertaan BPJS Tidak Dikeahui');
                        return false
                    } else if ($('#status_peserta').val() != 'AKTIF') {
                        var status = $('#status_peserta').val();
                        alert('Ops. Status Kepesertaan BPJS ' + status + ' Tidak Dikeahui');
                        return false;
                    }
                }
                var x = confirm("Apakah anda yakin akan melanjutkan proses pendaftaran pasien ini?");
                if (x) {
                    console.clear();
                    console.log(formdata);
                    $.ajax({
                        url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/daftar_ranap' ?>",
                        type: "POST",
                        data: formdata,
                        dataType: "JSON",
                        success: function(data) {
                            if (data.code == 200) {
                                var url = '<?php echo base_url() . 'mr_registrasi.php/registrasi/reg_success_ranap?uid=' ?>' + data.unikID;
                                window.location.href = url;
                            } else {
                                alert(data.message);
                            }
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(jqXHR.responseText);
                        }
                    });
                }
            }
        });

        /***
         * Auto Complete
         */
        /*$("#txtnmpoli").autocomplete({
                source: function(request, response) {

                    $.ajax({
                        url: "<?php //echo base_url() . 'api.php/vclaim/referensi/poli' 
                                ?>",
                        dataType: "JSON",
                        method: "POST",
                        data: {
                            param1: request.term
                        },
                        success: function(data) {
                            //console.log(data);
                            var poli = data.response.poli;
                            console.log(poli);
                            response(poli.slice(0, 15));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#tujuan").val(ui.item['kode']);
                    $("#txtnmpoli").val(ui.item['nama']);
                    $("#txtnmpoli").removeClass("ui-autocomplete-loading");
                    return false;
                },
                select: function(event, ui) {
                    $("#tujuan").val(ui.item['kode']);
                    $("#txtnmpoli").val(ui.item['nama']);
                    $("#txtnmpoli").removeClass("ui-autocomplete-loading");
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
                    .appendTo(table);
            };
        */
        /*$("#txtnmdpjp").autocomplete({
                source: function(request, response) {

                    $.ajax({
                        url: "<?php //echo base_url() . 'api.php/vclaim/referensi/dokter' 
                                ?>",
                        dataType: "JSON",
                        method: "POST",
                        data: {
                            param1: request.term
                        },
                        success: function(data) {
                            console.log(data);
                            var dokter = data.response.list;
                            response(dokter.slice(0, 15));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#kodeDPJP").val(ui.item['kode']);
                    $("#txtnmdpjp").val(ui.item['nama']);
                    $("#txtnmdpjp").removeClass("ui-autocomplete-loading");
                    return false;
                },
                select: function(event, ui) {
                    $("#kodeDPJP").val(ui.item['kode']);
                    $("#txtnmdpjp").val(ui.item['nama']);
                    $("#txtnmdpjp").removeClass("ui-autocomplete-loading");
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
                    .appendTo(table);
            };
            */
        $("#txtnmdiagnosa").autocomplete({
                source: function(request, response) {

                    $.ajax({
                        url: "<?php echo base_url() . 'mr_registrasi.php/vclaim/referensi/diagnosa' ?>",
                        dataType: "JSON",
                        method: "GET",
                        data: {
                            param: request.term
                        },
                        success: function(data) {
                            console.clear();
                            console.log(data);
                            var diagnosa = data.response.diagnosa;
                            console.log(diagnosa);
                            response(diagnosa.slice(0, 15));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#diagAwal").val(ui.item['kode']);
                    $("#txtnmdiagnosa").val(ui.item['nama']);
                    $("#txtnmdiagnosa").removeClass("ui-autocomplete-loading");
                    return false;
                },
                select: function(event, ui) {
                    $("#diagAwal").val(ui.item['kode']);
                    $("#txtnmdiagnosa").val(ui.item['nama']);
                    $("#txtnmdiagnosa").removeClass("ui-autocomplete-loading");
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
                    .appendTo(table);
            };

        $("#txtnmDokter").autocomplete({
                source: function(request, response) {

                    $.ajax({
                        url: "<?php echo base_url() . 'api.php/vclaim/referensi/dokter' ?>",
                        dataType: "JSON",
                        method: "POST",
                        data: {
                            param1: request.term
                        },
                        success: function(data) {
                            console.log(data);
                            var dokter = data.response.list;
                            response(dokter.slice(0, 15));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#kodeDokter").val(ui.item['kode']);
                    $("#txtnmDokter").val(ui.item['nama']);
                    $("#txtnmDokter").removeClass("ui-autocomplete-loading");
                    return false;
                },
                select: function(event, ui) {
                    $("#kodeDokter").val(ui.item['kode']);
                    $("#txtnmDokter").val(ui.item['nama']);
                    $("#txtnmDokter").removeClass("ui-autocomplete-loading");
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
                    .appendTo(table);
            };
    });

    function caraBayar() {
        var x = $('#id_cara_bayar :selected').html();
        if (x == "Umum") {
            $('.divRegCredit').hide();
        } else if (x == "Kemitraan RS") {
            $('#no_jaminan').inputmask('remove');
            $('#chkIsJaminan').prop('disabled', true);
        } else {
            $('.divRegCredit').show();
            $('#chkIsJaminan').prop('disabled', false);
        }
    }

    function getHistoryPasien() {
        var nomr = '<?php echo $nomr ?>';
        $.ajax({
            url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/getHistoryPasien' ?>",
            type: "POST",
            data: {
                nomr: nomr
            },
            beforeSend: function() {
                $('tbody#getHistoryPasien').html("<tr><td colspan=7><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
            },
            success: function(data) {
                $('tbody#getHistoryPasien').html(data);
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                $('tbody#getHistoryPasien').html("<tr><td colspan=7>Data tidak ada</td></tr>");
                console.log(jqXHR.responseText);
            }
        });
    }

    function updateNoBPJS() {
        var a = '<?php echo $nomr ?>';
        var b = $('#no_bpjs').val();
        var formdata = {
            'nomr': a,
            'no_bpjs': b
        }
        if (a == "") {
            alert('No MR tidak boleh kosong');
        } else if (b == "") {
            alert('No Peserta atau No BPJS (Untuk Layanan BPJS) tidak boleh kosong');
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/updateNoBPJS' ?>",
                type: "POST",
                data: formdata,
                dataType: "JSON",
                beforeSend: function() {
                    $('#btnUpdateNoBPJS').html("<i class='fa fa-refresh fa-spin'></i> Processing");
                },
                success: function(data) {
                    $('#btnUpdateNoBPJS').html("<i class='fa fa-save'></i> Update");
                    alert(data.message);
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    $('#btnUpdateNoBPJS').html("<i class='fa fa-save'></i> Update");
                    console.log(jqXHR.responseText);
                }
            });
        }
    }

    function cekSEP() {
        var pesan = "";
        var titleNotif = "";
        var a = $('#no_jaminan').val();
        var formdata = {
            'param1': a
        }
        if (a == "") {
            alert('No Jaminan atau No BPJS (Untuk Layanan BPJS) tidak boleh kosong');
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'api.php/vclaim/sep/cariSEP' ?>",
                type: "POST",
                data: formdata,
                dataType: "JSON",
                beforeSend: function() {
                    $('#btnCekSEP').addClass('disabled');
                    $('#btnCekSEP').html("<i class='fa fa-refresh fa-spin'></i> Processing");
                },
                success: function(data) {
                    $('#btnCekSEP').removeClass('disabled');
                    $('#btnCekSEP').html("Cek SEP (<em>JKN Bridging</em>)");

                    if (data.metaData.code == 200) {
                        var _a = data.response.peserta.nama;
                        var _b = data.response.peserta.noKartu;
                        var _c = data.response.peserta.noMr;
                        var _d = data.response.tglSep;
                        var _e = data.response.jnsPelayanan;
                        var _f = data.response.peserta.jnsPeserta;
                        if (_e.trim() == 'Rawat Jalan') {
                            titleNotif = 'SEP ini bukan untuk Rawat Inap';
                            pesan = 'Tgl SEP : ' + _d + '\n' + 'SEP atas nama : ' + _a + '\n' + 'No Kartu : ' + _b + '\n' + 'No MR : ' + _c + '\n' + 'Jenis Pelayanan : ' + _e + '\n' + 'Jenis Peserta : ' + _f;
                            tampilkanPesan('error', pesan, titleNotif);
                        } else {
                            pesan = 'Tgl SEP : ' + _d + '\n' + 'SEP atas nama : ' + _a + '\n' + 'No Kartu : ' + _b + '\n' + 'No MR : ' + _c + '\n' + 'Jenis Pelayanan : ' + _e + '\n' + 'Jenis Peserta : ' + _f;
                            tampilkanPesan('success', pesan);
                        }
                    } else if (data.metaData.code == 201) {
                        pesan = data.metaData.message;
                        tampilkanPesan('error', pesan);
                    } else {
                        pesan = data.metaData.code;
                        tampilkanPesan('error', pesan);
                    }
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    $('#btnCekSEP').removeClass('disabled');
                    $('#btnCekSEP').html("Cek SEP (<em>JKN Bridging</em>)");
                    console.log(jqXHR.responseText);
                }
            });
        }
    }

    function tampilkanPesan(a, b, c = "") {
        if (a == 'error') {
            swal({
                title: c,
                text: b,
                type: "error",
                confirmButtonColor: "#f00",
                confirmButtonText: "OK"
            });
        } else if (a == 'success') {
            swal({
                title: "Data SEP ditemukan",
                text: b,
                type: "success",
                confirmButtonColor: "#034a03",
                confirmButtonText: "OK"
            });
        } else if (a == 'warning') {
            swal({
                title: c,
                text: b,
                type: "warning",
                confirmButtonColor: "#034a03",
                confirmButtonText: "OK"
            });
        } else {
            alert(b);
        }
    }

    function getKamar() {
        var idruang = $('#id_ruang').val();
        var kelasid = $('#id_kelas').val();
        var url = "<?= base_url() . "mr_registrasi.php/registrasi/kamar/"; ?>" + idruang + "/" + kelasid;
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                if (data["status"] == true) {
                    var r = data["data"];
                    var jmlData = r.length;
                    var row = "";
                    var isi_lk = 0;
                    var isi_pr = 0;
                    var terisi = 0;
                    for (var i = 0; i < jmlData; i++) {
                        isi_lk = parseInt(r[i]["terisi_lk"]);
                        isi_pr = parseInt(r[i]["terisi_pr"]);
                        terisi = isi_lk + isi_pr;
                        console.log(r[i]["nama_kamar"] + terisi);
                        if (terisi >= r[i]["jml_tt"]) row += "<option value='" + r[i]["id_kamar"] + "' disabled>" + r[i]["nama_kamar"] + "(Penuh)</option>";
                        else row += "<option value='" + r[i]["id_kamar"] + "'>" + r[i]["nama_kamar"] + "</option>";
                    }
                    $('#id_kamar').html(row);
                } else {
                    alert(data["message"]);
                }
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                $('#btnUpdateNoBPJS').html("<i class='fa fa-save'></i> Update");
                console.log(jqXHR.responseText);
            }
        });
    }

    /*function formSEP() {

        var nobpjs = $('#no_bpjs').val();
        formSEPRANAP(nobpjs, '<?= date('Y-m-d') ?>');

    }*/

    function cekCarabayar() {
        var carabayar = $('#id_cara_bayar').val();
        var url = "<?= base_url() . "mr_registrasi.php/registrasi/carabayar/" ?>" + carabayar;
        console.clear();
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            data: {
                get_param: 'value'
            },
            success: function(data) {

                console.log(data);

                if (data["status"] == true) {
                    var x = data["data"]["jkn"];
                    $('#jkn').val(x);

                    if (x == "0" || x == "2") {
                        //alert(x);
                        //$("#cariRujukan").prop('disabled', false);
                        $("#cariRujukan").attr('disabled', 'disabled');
                        $('.divRegCredit').hide();
                    } else {
                        $('.divRegCredit').show();
                        $('#chkIsJaminan').prop('disabled', false);
                        $("#cariRujukan").removeAttr('disabled');
                    }
                } else {
                    $('#jkn').val("0")
                }
            }
        });
    }
</script>