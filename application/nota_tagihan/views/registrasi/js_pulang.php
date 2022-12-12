<script type="text/javascript">
    $(document).ready(function() {
        var id_ruang = '<?php echo $ruangID ?>';
        getHistoryPasien();
        $('.tanggal').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy"
        });
        $('input').focus(function() {
            return this.select();
        });
        $('#btnKembali').click(function() {
            var a = '<?php echo $ruangID ?>';
            var url = '<?php echo base_url() . 'mr_dokumen.php/informasi_pasien_keluar/data_informasi_pasien_keluar?kLok=' ?>' + a;
            window.location.href = url;
        });
        $('#btnBatal').click(function() {
            var a = '<?php echo $ruangID ?>';
            var url = '<?php echo base_url() . 'mr_dokumen.php/informasi_pasien_keluar/data_informasi_pasien_keluar?kLok=' ?>' + a;
            window.location.href = url;
        });
        $('#btnCariPasienLainnya').click(function() {
            $('#txtNomor').val('');
            $('#divCariPasien').show();
            $('#divTabelPendaftaranPasien').hide();
            $('#divDataPasien').hide();
            $('#txtNomor').focus();
        });

        $('#cariPasien').click(function() {
            var a = '<?php echo $ruangID ?>';
            var b = $('#txtNomor').val();
            if (a == "") {
                alert("Kode ruang tidak ditemukan. Silahkan pilih ruang yang akan memulangkan pasien");
            } else if (b == "") {
                alert("Nomor yang akan di cari masih kosong");
            } else {
                $.ajax({
                    url: "<?php echo base_url() . 'mr_dokumen.php/informasi_pasien_keluar/getViewDataKunjunganPasien' ?>",
                    type: "POST",
                    data: $('#formCariPasien').serialize(),
                    beforeSend: function() {
                        $('tbody#getDataKunjunganPasien').html("<tr><td colspan=7><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                    },
                    success: function(data) {
                        $('tbody#getDataKunjunganPasien').html(data);
                        $('#divTabelPendaftaranPasien').show();
                    },
                    error: function(jqXHR, ajaxOption, errorThrown) {
                        console.log(jqXHR.responseText);
                    }
                });
            }
        });

        $('#txtNomor').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                var a = '<?php echo $ruangID ?>';
                var b = $('#txtNomor').val();
                if (a == "") {
                    alert("Kode ruang tidak ditemukan. Silahkan pilih ruang yang akan memulangkan pasien");
                } else if (b == "") {
                    alert("Nomor yang akan di cari masih kosong");
                } else {
                    $.ajax({
                        url: "<?php echo base_url() . 'mr_dokumen.php/informasi_pasien_keluar/getViewDataKunjunganPasien' ?>",
                        type: "POST",
                        data: $('#formCariPasien').serialize(),
                        beforeSend: function() {
                            $('tbody#getDataKunjunganPasien').html("<tr><td colspan=7><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                        },
                        success: function(data) {
                            $('tbody#getDataKunjunganPasien').html(data);
                            $('#divTabelPendaftaranPasien').show();
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(jqXHR.responseText);
                        }
                    });
                }
            }
        });

        $('#id_cara_keluar').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                $('#dpjp').focus();
            }
        });

        $('#dpjp').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                var dpjp = $('#dpjp').val();
                if (dpjp == "") $('#dpjp').focus();
                else $('#id_keadaan_keluar').focus();
            }
        });

        $('#id_keadaan_keluar').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                var dpjp = $('#id_keadaan_keluar').val();
                if (dpjp == "") $('#id_keadaan_keluar').focus();
                else $('#jns_kunjungan').focus();
            }
        });
        $('#jns_kunjungan').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                var dpjp = $('#jns_kunjungan').val();
                if (dpjp == "") $('#jns_kunjungan').focus();
                else $('#id_cara_bayar').focus();
            }
        });
        $('#id_cara_bayar').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                var dpjp = $('#id_cara_bayar').val();
                if (dpjp == "") $('#id_cara_bayar').focus();
                else $('#no_bpjs').focus();
            }
        });
        $('#no_bpjs').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                var dpjp = $('#no_bpjs').val();
                if (dpjp == "") $('#no_bpjs').focus();
                else $('#no_jaminan').focus();
            }
        });
        $('#no_jaminan').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                var dpjp = $('#no_jaminan').val();
                if (dpjp == "") $('#no_jaminan').focus();
                else $('#id_tindakan_pelayanan').focus();
            }
        });
        $('#id_tindakan_pelayanan').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                var dpjp = $('#id_tindakan_pelayanan').val();
                if (dpjp == "") $('#id_tindakan_pelayanan').focus();
                else $('#kasus_penyakit').focus();
            }
        });
        $('#kasus_penyakit').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                var dpjp = $('#kasus_penyakit').val();
                if (dpjp == "") $('#kasus_penyakit').focus();
                else $('#kode_icd').focus();
            }
        });
        $('#kode_icd').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                var dpjp = $('#kode_icd').val();
                if (dpjp == "") $('#kode_icd').focus();
                else $('#icd').focus();
            }
        });
        $('#icd').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                var dpjp = $('#icd').val();
                if (dpjp == "") $('#icd').focus();
                else $('#dtd').focus();
            }
        });
        $('#dtd').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                var dpjp = $('#dtd').val();
                if (dpjp == "") $('#dtd').focus();
                else $('#grup_icd').focus();
            }
        });
        $('#grup_icd').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                var dpjp = $('#grup_icd').val();
                if (dpjp == "") $('#grup_icd').focus();
                else $('#kode_icd_sec').focus();
            }
        });
        $('#kode_icd_sec').keypress(function(ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                $('#submit').focus();
            }
        });
        $("#kode_icd").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?php echo base_url() . 'api.php/eklaim/main/getICD' ?>",
                        dataType: "JSON",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data.slice(0, 15));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#kode_icd").val(ui.item['label']);
                    $("#icd").val(ui.item['value']);
                    $("#kode_icd").removeClass("ui-autocomplete-loading");
                    return false;
                },
                select: function(event, ui) {
                    if (ui.item['ada'] == 1) {
                        $("#kode_icd").val(ui.item['label']);
                        $("#icd").val(ui.item['value']);
                    } else {
                        $("#kode_icd").val('');
                        $("#icd").val('');
                    }
                    $("#ada").val(ui.item['ada']);
                    $("#kode_icd").removeClass("ui-autocomplete-loading");
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['label'] + "</td><td style='width:300px'>" + item['value'] + "</td>")
                    .appendTo(table);
            };

        $("#icd").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?php echo base_url() . 'api.php/eklaim/main/getICD' ?>",
                        dataType: "JSON",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data.slice(0, 15));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#kode_icd").val(ui.item['label']);
                    $("#icd").val(ui.item['value']);
                    $("#icd").removeClass("ui-autocomplete-loading");
                    return false;
                },
                select: function(event, ui) {
                    if (ui.item['ada'] == 1) {
                        $("#kode_icd").val(ui.item['label']);
                        $("#icd").val(ui.item['value']);
                    } else {
                        $("#kode_icd").val('');
                        $("#icd").val('');
                    }
                    $("#ada").val(ui.item['ada']);

                    $("#icd").removeClass("ui-autocomplete-loading");
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['label'] + "</td><td style='width:300px'>" + item['value'] + "</td>")
                    .appendTo(table);
            };

        $("#dtd").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?php echo base_url() . 'mr_dokumen.php/informasi_pasien_keluar/getDTD' ?>",
                        dataType: "JSON",
                        data: {
                            term: request.term
                        },
                        type: "POST",
                        success: function(data) {
                            response(data.slice(0, 10));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#dtd").val(ui.item['DTD']);
                    $("#grup_icd").val(ui.item['Grup_ICD']);
                    $("#morbiditas").val(ui.item['Morbiditas']);
                    $("#kecelakaan").val(ui.item['kecelakaan']);
                    $("#viewkecelakaan").val((ui.item['kecelakaan'] == '1') ? 'Kecelakaan' : 'Bukan Kecelakaan');
                    return false;
                },
                select: function(event, ui) {
                    $("#dtd").val(ui.item['DTD']);
                    $("#grup_icd").val(ui.item['Grup_ICD']);
                    $("#morbiditas").val(ui.item['Morbiditas']);
                    $("#kecelakaan").val(ui.item['kecelakaan']);
                    $("#viewkecelakaan").val((ui.item['kecelakaan'] == '1') ? 'Kecelakaan' : 'Bukan Kecelakaan');
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['DTD'] + "</td><td style='width:100px'>" + item['Morbiditas'] + "</td><td style='width:100px'>" + item['Grup_ICD'] + "</td><td style='width:30px'>" + item['kecelakaan'] + "</td>")
                    .appendTo(table);
            };

        $("#grup_icd").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?php echo base_url() . 'mr_dokumen.php/informasi_pasien_keluar/getDTD' ?>",
                        dataType: "JSON",
                        data: {
                            term: request.term
                        },
                        type: "POST",
                        success: function(data) {
                            response(data.slice(0, 10));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#dtd").val(ui.item['DTD']);
                    $("#grup_icd").val(ui.item['Grup_ICD']);
                    $("#morbiditas").val(ui.item['Morbiditas']);
                    $("#kecelakaan").val(ui.item['kecelakaan']);
                    $("#viewkecelakaan").val((ui.item['kecelakaan'] == '1') ? 'Kecelakaan' : 'Bukan Kecelakaan');
                    return false;
                },
                select: function(event, ui) {
                    $("#dtd").val(ui.item['DTD']);
                    $("#grup_icd").val(ui.item['Grup_ICD']);
                    $("#morbiditas").val(ui.item['Morbiditas']);
                    $("#kecelakaan").val(ui.item['kecelakaan']);
                    $("#viewkecelakaan").val((ui.item['kecelakaan'] == '1') ? 'Kecelakaan' : 'Bukan Kecelakaan');
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['DTD'] + "</td><td style='width:100px'>" + item['Morbiditas'] + "</td><td style='width:100px'>" + item['Grup_ICD'] + "</td><td style='width:30px'>" + item['kecelakaan'] + "</td>")
                    .appendTo(table);
            };

        $("#kode_icd_sec").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?php echo base_url() . 'api.php/eklaim/main/getICD' ?>",
                        dataType: "JSON",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data.slice(0, 15));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#kode_icd_sec").removeClass("ui-autocomplete-loading");
                    return false;
                },
                select: function(event, ui) {
                    $("#kode_icd_sec").removeClass("ui-autocomplete-loading");
                    add_diagnosa(ui.item['label'], ui.item['value'], ui.item['ada']);
                    $('#kode_icd_sec').val("");
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['label'] + "</td><td style='width:300px'>" + item['value'] + "</td>")
                    .appendTo(table);
            };
    });

    function add_diagnosa(kode, icd, ada = 0) {
        var jml = $('#jml').val();
        var jml_icd = parseInt(jml) + 1;
        if (ada == 0) {
            kode = "";
            icd = "";
        }
        var control = '<div class="form-group" id="row' + jml + '">' +
            '<label class="col-md-2 control-label">&nbsp;</label>' +
            '<div class="col-md-3">' +
            '<input type="hidden" class="form-control" name="index_icd[]"  id="index_icd' + jml + '" value="' + jml + '">' +
            '<input type="hidden" class="form-control" name="ada' + jml + '"  id="ada' + jml + '" value="' + ada + '">' +
            '<input type="text" class="form-control" name="kode_icd_sec' + jml + '"  id="kode_icd_sec' + jml + '" value="' + kode + '">' +
            '</div>' +
            '<div class="col-md-7">' +
            '<div class="input-group input-group-sm">' +
            '<input type="text" class="form-control icd" name="icd_sec' + jml + '" id="icd_sec' + jml + '" value="' + icd + '">' +
            '<div class="input-group-btn">' +
            '<button type="button" id="btn_rem_diagnosa' + jml + '" class="btn btn-danger" onclick="remove_diagnosa(\'' + jml + '\')">' +
            '<i class="fa fa-trash"></i>' +
            '</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        $('#diagnosa_sekunder').append(control);
        $('#jml').val(jml_icd);

    }

    function getICD(idx) {
        $("#kode_icd_sec" + idx).autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?php echo base_url() . 'api.php/eklaim/main/getICD' ?>",
                        dataType: "JSON",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data.slice(0, 15));
                        },
                        error: function(jqXHR, ajaxOption, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                },
                minLength: 2,
                focus: function(event, ui) {
                    $("#kode_icd_sec" + idx).val(ui.item['label']);
                    $("#icd_sec" + idx).val(ui.item['value']);
                    $("#kode_icd_sec" + idx).removeClass("ui-autocomplete-loading");
                    return false;
                },
                select: function(event, ui) {
                    $("#kode_icd_sec" + idx).val(ui.item['label']);
                    $("#icd_sec" + idx).val(ui.item['value']);
                    $("#kode_icd_sec" + idx).removeClass("ui-autocomplete-loading");
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(table, item) {
                return $("<tr class='autocomplete'>")
                    .append("<td style='width:100px'>" + item['label'] + "</td><td style='width:300px'>" + item['value'] + "</td>")
                    .appendTo(table);
            };
    }

    function remove_diagnosa(kode) {
        $('#row' + kode).remove();
    }

    function dateIndo(today) {
        // 2008-04-01
        var date = today.substr(0, 10);
        var nDate = date.slice(8, 10) + '-' + date.slice(5, 7) + '-' + date.slice(0, 4);
        return nDate;
    }

    function dateEng(today) {
        var date = today.substr(0, 10);
        var nDate = date.slice(6, 10) + '-' + date.slice(3, 5) + '-' + date.slice(0, 2);
        return nDate;
    }

    function pilihPasien(a) {
        $.ajax({
            url: "<?php echo base_url() . 'mr_dokumen.php/informasi_pasien_keluar/getDataKunjunganPasien' ?>",
            type: "POST",
            data: {
                reg_unit: a
            },
            dataType: "JSON",
            success: function(data) {
                $('#id_daftar').val(data.id_daftar);
                $('#reg_unit').val(data.reg_unit);
                $('#nomr').val(data.nomr);
                $('#nama_pasien').val(data.nama_pasien);
                var jenkel = (data.jns_kelamin == '1') ? 'Laki-Laki' : 'Perempuan';
                $('#jns_kelamin').val(data.jns_kelamin);
                $('#v_jns_kelamin').val(jenkel);
                var tglLahir = dateIndo(data.tgl_lahir);
                $('#tgl_lahir').val(tglLahir);
                $('#id_ruang').val(data.id_ruang);
                $('#nama_ruang').val(data.nama_ruang);

                $('#jns_layanan').val(data.jns_layanan);
                $('#los').val((data.jns_layanan == 'RJ' || data.jns_layanan == 'GD') ? 1 : '');

                $('#id_kelas').val(data.id_kelas);
                $('#kelas_layanan').val(data.kelas_layanan);

                $('#umur').val(data.umur);
                var tglMasuk = dateIndo(data.tgl_masuk);
                $('#tgl_masuk').val(tglMasuk);
                $('#tgl_keluar').val((data.jns_layanan == 'RJ' || data.jns_layanan == 'GD') ? tglMasuk : '');

                $('#id_cara_bayar').val(data.id_cara_bayar);

                $('#no_bpjs').val(data.no_bpjs);
                $('#no_jaminan').val(data.no_jaminan);

                $('#id_cara_keluar').prop('selectedIndex', 0);
                $('#dpjp').val('').trigger('change');
                $('#id_keadaan_keluar').prop('selectedIndex', 0);
                $('#jns_kunjungan').prop('selectedIndex', 0);
                $('#kasus_penyakit').prop('selectedIndex', 0);
                $('#id_tindakan_pelayanan').val('').trigger('change');
                $('#kode_icd').val('');
                $('#icd').val('');
                $('#dtd').val('');
                $('#grup_icd').val('');
                $('#morbiditas').val('');
                $('#kecelakaan').val('');

                $('#divTabelPendaftaranPasien').hide();
                $('#divCariPasien').hide();
                $('#divDataPasien').show();
            },
            error: function(jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
        $('#tgl_masuk, #tgl_keluar').on('change textInput input', function() {
            if (($("#tgl_masuk").val() != "") && ($("#tgl_keluar").val() != "")) {
                var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                var firstDate = new Date(dateEng($("#tgl_masuk").val()));
                var secondDate = new Date(dateEng($("#tgl_keluar").val()));
                var diffDays = Math.round(Math.round((secondDate.getTime() - firstDate.getTime()) / (oneDay)));
                if (diffDays < 0) {
                    $("#los").val('');
                    $("#tgl_keluar").val('');
                    alert('Tanggal keluar tidak boleh lebih rendah dari tanggal masuk');
                } else {
                    $("#los").val(diffDays + 1);
                }
            }
        });
    }

    function simpan() {
        let icd = [];
        $("input[name='index_icd[]']").each(function(index) {
            var index_icd = $(this).val()
            icd.push({
                kode: $('#kode_icd_sec' + index_icd).val(),
                icd: $('#icd_sec' + index_icd).val(),
                ada: $('#ada' + index_icd).val()
            });
        });
        //console.log(icd);
        //return false;
        var formData = {};
        formData['id_daftar'] = $('#id_daftar').val();
        formData['reg_unit'] = $('#reg_unit').val();
        formData['nomr'] = $('#nomr').val();
        formData['nama_pasien'] = $('#nama_pasien').val();
        formData['jns_kelamin'] = $('#jns_kelamin').val();
        formData['tgl_lahir'] = $('#tgl_lahir').val();
        formData['umur'] = $('#umur').val();
        formData['id_ruang'] = $('#id_ruang').val();
        formData['nama_ruang'] = $('#nama_ruang').val();
        formData['los'] = $('#los').val();
        formData['id_kelas'] = $('#id_kelas').val();
        formData['kelas_layanan'] = $('#kelas_layanan').val();
        formData['tgl_masuk'] = $('#tgl_masuk').val();
        formData['tgl_keluar'] = $('#tgl_keluar').val();
        formData['id_cara_keluar'] = $('#id_cara_keluar').val();
        formData['cara_keluar'] = $('#id_cara_keluar :selected').html();
        formData['dpjp'] = $('#dpjp').val();
        formData['nama_dpjp'] = $('#dpjp :selected').html();
        formData['id_keadaan_keluar'] = $('#id_keadaan_keluar').val();
        formData['keadaan_keluar'] = $('#id_keadaan_keluar :selected').html();
        formData['kode_icd'] = $('#kode_icd').val();
        formData['icd'] = $('#icd').val();
        formData['ada'] = $('#ada').val();
        formData['dtd'] = $('#dtd').val();
        formData['grup_icd'] = $('#grup_icd').val();
        formData['morbiditas'] = $('#morbiditas').val();
        formData['kecelakaan'] = $('#kecelakaan').val();
        formData['jns_layanan'] = $('#jns_layanan').val();
        formData['jns_kunjungan'] = $('#jns_kunjungan').val();
        formData['kasus_penyakit'] = $('#kasus_penyakit').val();
        formData['id_cara_bayar'] = $('#id_cara_bayar').val();
        formData['cara_bayar'] = $('#id_cara_bayar :selected').html();
        formData['no_bpjs'] = $('#no_bpjs').val();
        formData['no_jaminan'] = $('#no_jaminan').val();
        formData['id_tindakan_pelayanan'] = $('#id_tindakan_pelayanan').val();
        formData['icd_sec'] = icd;
        formData['tindakan_pelayanan'] = $('#id_tindakan_pelayanan :selected').html();

        if (formData['id_daftar'] == "") {
            alert('Ops. No.Reg RS kosong. Silahkan pilih pasien dan pastikan No.Reg RS tampil');
        } else if (formData['tgl_masuk'] == "") {
            alert('Ops. Tanggal masuk kosong. Silahkan pilih pasien dan pastikan tanggal masuk tampil');
        } else if (formData['tgl_keluar'] == "") {
            alert('Ops. Tanggal keluar kosong. Silahkan isi tanggal keluar pasien');
            $('#tgl_keluar').focus();
        } else if (formData['nomr'] == "") {
            alert('Ops. No.MR kosong. Silahkan pilih pasien dan pastikan No.MR tampil');
        } else if (formData['id_cara_keluar'] == "") {
            alert('Ops. Cara keluar kosong. Silahkan pilih option cara keluar');
            $('#id_cara_keluar').focus();
        } else if (formData['dpjp'] == "") {
            alert('Ops. DPJP kosong. Silahkan pilih option Dokter Penanggung Jawab');
            $('#dpjp').focus();
        } else if (formData['id_tindakan_pelayanan'] == "") {
            alert('Ops. Tindakan pelayanan kosong.  Silahkan pilih option tindakan pelayanan.');
            $('#id_tindakan_pelayanan').focus();
        } else if (formData['kode_icd'] == "") {
            alert('Ops. Kode ICD kosong.  Silahkan isi Kode ICD.');
            $('#kode_icd').focus();
        } else if (formData['icd'] == "") {
            alert('Ops. ICD kosong.  Silahkan isi ICD.');
            $('#icd').focus();
        } else if (formData['dtd'] == "") {
            alert('Ops. No.DTD kosong.  Silahkan isi No.DTD.');
            $('#dtd').focus();
        } else if (formData['morbiditas'] == "") {
            alert('Ops. Morbiditas kosong.  Pastikan morbiditas terisi.');
            $('#dtd').focus();
        } else {
            $.ajax({
                url: "<?php echo base_url() . 'mr_registrasi.php/registrasi/simpan_informasi_pulang' ?>",
                type: "POST",
                data: formData,
                dataType: "JSON",
                success: function(data) {
                    alert(data.message);
                    if (data.code == 200) {
                        location.reload();
                    }
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
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
</script>