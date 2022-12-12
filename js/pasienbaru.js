$(document).ready(function() {
    $('#no_ktp').focus();
    $('#tgl_lahir').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
    });
    $('.groupWNA').hide();
    

    if (idx == '') {
        $('#submit').html('<i class="glyphicon glyphicon-floppy-disk"></i> Simpan');
    } else {
        $('#submit').html('<i class="glyphicon glyphicon-floppy-disk"></i> Update');
    }
    $('input').not('#tgl_lahir').keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
    $('input').focus(function() {
        return this.select();
    });
// alert(xKewarganegaraan)
    var xKewarganegaraan=$('#kewarganegaraan').val();
    var xnama_provinsi = $('#nama_provinsi').val();
    var xnama_kab_kota = $('#nama_kab_kota').val();
    var xnama_kecamatan = $('#nama_kecamatan').val();
    var xnama_kelurahan = $('#nama_kelurahan').val();
    if (xKewarganegaraan == '') {
        $('.groupKewarganegaraan').hide();
        //$('.groupKewarganegaraan').css('width','300px');
    } else if (xKewarganegaraan == 'WNI') {
        $('.groupKewarganegaraan').hide();
        $('.groupWNI').show();

        
    } else {
        $('.groupKewarganegaraan').hide();
        $('.groupWNA').show();
        //$('.groupKewarganegaraan').css('width','300px');
    }

    $('.tanggal').datepicker({
        autoclose: true,
        format: "dd/mm/yyyy"
    })
    $('select').not('#kewarganegaraan').not('#agama').not('#pendidikan').not('#pekerjaan').not('#status_kawin').not('#jns_kelamin').select2({
        placeholder: '------------ Pilih option ------------'
    });
    $('#no_ktp').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#no_ktp').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value.length == 16) {
                ceknikbpjs(1);
            } else{
                alert("NIK yang anda masukkan tidak valid "+value.length);
                $('#no_ktp').focus();
            }

        }
        return true;
    });
    $('#no_bpjs').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#no_bpjs').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value.length == 13) {
                ceknomorbpjs(1);
            } 

        }
        return true;
    });
    $('#tempat_lahir').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#tempat_lahir').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("Tempat Lahir Belum Dipilih");
                $('#tempat_lahir').focus();
            } else {
                $('#tgl_lahir').focus();
            }

        }
        return true;
    });
    $('#tgl_lahir').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#tgl_lahir').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("Tanggal Lahir Belum Dipilih");
                $('#tgl_lahir').focus();
            } else {
                $('#jns_kelamin').focus();
            }

        }
        return true;
    });
    $('#kewarganegaraan').change(function() {
        var x = $(this).val();
        if (x == 'WNI') {
            $('.groupKewarganegaraan').hide();
            $('.groupWNI').show();
        } else if (x == 'WNA') {
            $('.groupKewarganegaraan').hide();
            $('.groupWNA').show();
        } else {
            $('.groupKewarganegaraan').hide();
        }
    });
    $('#pekerjaan').change(function() {
        var x = $(this).val();
        if (x == 5) {
            $('#divpekerjaan').removeClass('col-md-8')
            $('#divpekerjaan').addClass('col-md-4')
            $('#divlainnya').show();
        }else {
            $('#divpekerjaan').removeClass('col-md-4')
            $('#divpekerjaan').addClass('col-md-8')
            $('#divlainnya').hide();
        }
    });
    $('#agama').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#agama').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("Agama Belum Dipilih");
                $('#agama').focus();
            } else {
                $('#pendidikan').focus();
            }

        }
        return true;
    });

    $('#jns_kelamin').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#jns_kelamin').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                $('#jns_kelamin').focus();
            } else {
                $('#agama').focus();
            }

        }
        return true;
    });
    $('#pendidikan').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#pendidikan').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("Pendidikan Belum Dipilih");
                $('#pendidikan').focus();
            } else {
                $('#pekerjaan').focus();
            }

        }
        return true;
    });
    $('#pendidikan').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#pendidikan').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("Pendidikan Belum Dipilih");
                $('#pendidikan').focus();
            } else {
                $('#pekerjaan').focus();
            }

        }
        return true;
    });
    $('#pekerjaan').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#pekerjaan').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("Pekerjaan masih Kosong");
                $('#pekerjaan').focus();
            } else {
                var x = $(this).val();
                if (x == 5) {
                    $('#divpekerjaan').removeClass('col-md-8')
                    $('#divpekerjaan').addClass('col-md-4')
                    $('#divlainnya').show();
                    $('#pekerjaanlain').focus();
                }else {
                    $('#divpekerjaan').removeClass('col-md-4')
                    $('#divpekerjaan').addClass('col-md-8')
                    $('#divlainnya').hide();
                    $('#status_kawin').focus();
                }
                
            }

        }
        return true;
    });
    $('#pekerjaanlain').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#pekerjaanlain').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("nama Pekerjaan masih Kosong");
                $('#pekerjaanlain').focus();
            } else {
                $('#status_kawin').focus();
                // $("#status_kawin").select2('open');
            }

        }
        return true;
    });
    $('#status_kawin').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#status_kawin').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("Status kawin masih Kosong");
                $('#status_kawin').focus();
            } else {
                // $('#suku').focus();
                $("#suku").select2('open');
            }

        }
        return true;
    });

    $('#suku').on('select2:select', function(e) {
        $("#bahasa").select2('open');
    });
    $('#bahasa').on('select2:select', function(e) {
        $("#keterbatasanbahasa").focus();
    });
    $('#keterbatasanbahasa').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#status_kawin').val();
        if (evt.keyCode == 13) {
            $('#no_telpon').focus();
        }
        return true;
    });
    $('#no_telpon').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#no_telpon').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("No telp masih Kosong");
                $('#no_telpon').focus();
            } else {
                $('#no_hp').focus();
                // $("#kewarganegaraan").select2('open');
            }

        }
        return true;
    });
    $('#no_hp').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#no_hp').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("No HP masih Kosong");
                $('#no_hp').focus();
            } else {
                $('#nama_ibu_kandung').focus();
                // $("#kewarganegaraan").select2('open');
            }

        }
        return true;
    });
    $('#nama_ibu_kandung').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#nama_ibu_kandung').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("Nama Ibu Kandung masih Kosong");
                $('#nama_ibu_kandung').focus();
            } else {
                $('#kewarganegaraan').focus();
                // $("#kewarganegaraan").select2('open');
            }

        }
        return true;
    });
    $('#kewarganegaraan').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#kewarganegaraan').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("Kewarganegaraan Belum Dipilih");
                $('#kewarganegaraan').focus();
            } else {
                // alert(value)
                if(value=="WNI") $("#nama_provinsi").select2('open');
                else $("#nama_negara").select2('open');
            }

        }
        return true;
    });
    $('#nama_provinsi').on('select2:select', function(e) {
        var a = $('#nama_provinsi').val();
        $.ajax({
            type: "POST",
            url: base_url+"pasien_baru/getKab",
            data: {
                nama_provinsi: a
            },
            success: function(data) {
                var x = eval("(" + data + ")");
                var xOption = "";
                xOption += '<option value="">------------ Pilih option ------------</option>\n';
                if (x.length > 0) {
                    for (i = 0; i < x.length; i++) {
                        xOption += '<option value="' + x[i]['kode'] + '">' + x[i]['nama'] + '</option>\n';
                    }
                }
                $('#nama_kab_kota').html(xOption);
                $('#nama_kecamatan').html('<option value="">------------ Pilih option ------------</option>');
                $('#nama_kelurahan').html('<option value="">------------ Pilih option ------------</option>');
                
            },
            complete: function () {
				// $('#nama_provinsi_domisili').triger('change');
                $("#nama_kab_kota").select2('open');
			},
            error: function(xhr, ajaxOption, thrownError) {
                alert('Response : ' + thrownError);
            }
        });
    });
    
    $('#nama_kab_kota').on('select2:select', function(e) {
        var a = $('#nama_kab_kota').val();
        $.ajax({
            type: "POST",
            url: base_url+"pasien_baru/getKec",
            data: {
                nama_kab_kota: a
            },
            success: function(data) {
                var x = eval("(" + data + ")");
                var xOption = "";

                xOption += '<option value="">------------ Pilih option ------------</option>\n';
                if (x.length > 0) {
                    for (i = 0; i < x.length; i++) {
                        xOption += '<option value="' + x[i]['kode'] + '">' + x[i]['nama'] + '</option>\n';
                    }
                }
                $('#nama_kecamatan').html(xOption);
                $('#nama_kelurahan').html('<option value="">------------ Pilih option ------------</option>');
            },
            complete: function () {
				// $('#nama_provinsi_domisili').triger('change');
                $("#nama_kecamatan").select2('open');
			},
            error: function(xhr, ajaxOption, thrownError) {
                alert('Response : ' + thrownError);
            }
        });
    });
    $('#nama_kecamatan').on('select2:select', function(e) {
        var a = $('#nama_kecamatan').val();
        $.ajax({
            type: "POST",
            url: base_url+"pasien_baru/getKel",
            data: {
                nama_kecamatan: a
            },
            success: function(data) {
                var x = eval("(" + data + ")");
                var xOption = "";

                xOption += '<option value="">------------ Pilih option ------------</option>\n';
                if (x.length > 0) {
                    for (i = 0; i < x.length; i++) {
                        xOption += '<option value="' + x[i]['kode'] + '">' + x[i]['nama'] + '</option>\n';
                    }
                }
                $('#nama_kelurahan').html(xOption);
            },
            complete: function () {
				$("#nama_kelurahan").select2('open');
			},
            error: function(xhr, ajaxOption, thrownError) {
                alert('Response : ' + thrownError);
            }
        });
    });
    $('#nama_kelurahan').on('select2:select', function(e) {
        $("#alamat").focus();
    });

    $('#alamat').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#alamat').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("Alamat masih kosong");
                $('#alamat').focus();
            } else {
                $('#rt').focus();
            }

        }
        return true;
    });

    $('#rt').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#rt').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("RT masih kosong");
                $('#rt').focus();
            } else {
                $('#rw').focus();
            }

        }
        return true;
    });
    $('#rw').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#rt').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("RT masih kosong");
                $('#rw').focus();
            } else {
                $('#kodepos').focus();
            }

        }
        return true;
    });
    $('#kodepos').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#kodepos').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("Kode Pos masih kosong");
                $('#kodepos').focus();
            } else {
                $('#domisilisesuaiktp').focus();
            }

        }
        return true;
    });
    $('#domisilisesuaiktp').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#domisilisesuaiktp').prop("checked");
        if (evt.keyCode == 13) {
            // alert(value)
            if(value==true){
                $('.domisili').hide();
                $('#penanggung_jawab').focus();
                
            }else{
                $('.domisili').show();
                $('#nama_provinsi_domisili').select2('open');
            }
        }
        return true;
    });
    $('#nama_provinsi_domisili').on('select2:select', function(e) {
        var a = $('#nama_provinsi_domisili').val();
        $.ajax({
            type: "POST",
            url: base_url+"pasien_baru/getKab",
            data: {
                nama_provinsi: a
            },
            success: function(data) {
                var x = eval("(" + data + ")");
                var xOption = "";

                xOption += '<option value="">------------ Pilih option ------------</option>\n';
                if (x.length > 0) {
                    for (i = 0; i < x.length; i++) {
                        xOption += '<option value="' + x[i]['kode'] + '">' + x[i]['nama'] + '</option>\n';
                    }
                }
                $('#nama_kab_kota_domisili').html(xOption);
                $('#nama_kecamatan_domisili').html('<option value="">------------ Pilih option ------------</option>');
                $('#nama_kelurahan_domisili').html('<option value="">------------ Pilih option ------------</option>');
                
            },
            complete: function () {
				// $('#nama_provinsi_domisili').triger('change');
                $("#nama_kab_kota_domisili").select2('open');
			},
            error: function(xhr, ajaxOption, thrownError) {
                alert('Response : ' + thrownError);
            }
        });

        

    });
    $('#nama_kab_kota_domisili').on('select2:select', function(e) {
        var a = $('#nama_kab_kota_domisili').val();
        $.ajax({
            type: "POST",
            url: base_url+"pasien_baru/getKec",
            data: {
                nama_kab_kota: a
            },
            success: function(data) {
                var x = eval("(" + data + ")");
                var xOption = "";

                xOption += '<option value="">------------ Pilih option ------------</option>\n';
                if (x.length > 0) {
                    for (i = 0; i < x.length; i++) {
                        xOption += '<option value="' + x[i]['kode'] + '">' + x[i]['nama'] + '</option>\n';
                    }
                }
                $('#nama_kecamatan_domisili').html(xOption);
                $('#nama_kelurahan_domisili').html('<option value="">------------ Pilih option ------------</option>');
            },
            complete: function () {
				// $('#nama_provinsi_domisili').triger('change');
                $("#nama_kecamatan_domisili").select2('open');
			},
            error: function(xhr, ajaxOption, thrownError) {
                alert('Response : ' + thrownError);
            }
        });
    });
    $('#nama_kecamatan_domisili').on('select2:select', function(e) {
        var a = $('#nama_kecamatan_domisili').val();
        $.ajax({
            type: "POST",
            url: base_url+"pasien_baru/getKel",
            data: {
                nama_kecamatan: a
            },
            success: function(data) {
                var x = eval("(" + data + ")");
                var xOption = "";

                xOption += '<option value="">------------ Pilih option ------------</option>\n';
                if (x.length > 0) {
                    for (i = 0; i < x.length; i++) {
                        xOption += '<option value="' + x[i]['kode'] + '">' + x[i]['nama'] + '</option>\n';
                    }
                }
                $('#nama_kelurahan_domisili').html(xOption);
            },
            complete: function () {
				$("#nama_kelurahan_domisili").select2('open');
			},
            error: function(xhr, ajaxOption, thrownError) {
                alert('Response : ' + thrownError);
            }
        });
        
    });
    $('#nama_kelurahan_domisili').on('select2:select', function(e) {
        $("#alamat_domisili").focus();
    });
    $('#alamat_domisili').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#alamat_domisili').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("Alamat masih kosong");
                $('#alamat_domisili').focus();
            } else {
                $('#rt_domisili').focus();
            }

        }
        return true;
    });

    $('#rt_domisili').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#rtdomisili').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("RT masih kosong");
                $('#rt_domisili').focus();
            } else {
                $('#rw_domisili').focus();
            }

        }
        return true;
    });
    $('#rw_domisili').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#rt').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("RW masih kosong");
                $('#rw_domisili').focus();
            } else {
                $('#kodepos_domisili').focus();
            }

        }
        return true;
    });
    $('#kodepos_domisili').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#kodepos_domisili').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("Kode Pos masih kosong");
                $('#kodepos_domisili').focus();
            } else {
                $('#penanggung_jawab').focus();
            }

        }
        return true;
    });
    $('#penanggung_jawab').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#penanggung_jawab').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("penanggung jawab masih kosong");
                $('#penanggung_jawab').focus();
            } else {
                $('#umur_pj').focus();
            }

        }
        return true;
    });
    $('#umur_pj').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#umur_pj').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("Umur penanggung jawab masih kosong");
                $('#umur_pj').focus();
            } else {
                $('#pekerjaan_pj').focus();
            }

        }
        return true;
    });
    $('#pekerjaan_pj').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#pekerjaan_pj').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("Pekerjaan penanggung jawab masih kosong");
                $('#pekerjaan_pj').focus();
            } else {
                $('#alamat_pj').focus();
            }

        }
        return true;
    });
    $('#alamat_pj').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#alamat_pj').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("Alamat penanggung jawab masih kosong");
                $('#alamat_pj').focus();
            } else {
                $('#no_penanggung_jawab').focus();
            }

        }
        return true;
    });
    $('#no_penanggung_jawab').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#no_penanggung_jawab').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("No penanggung jawab masih kosong");
                $('#no_penanggung_jawab').focus();
            } else {
                $('#hub_keluarga').focus();
            }

        }
        return true;
    });
    $('#hub_keluarga').keydown(function(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var value = $('#hub_keluarga').val();
        if (evt.keyCode == 13) {
            console.log(evt.keyCode);
            if (value == '') {
                alert("hubungan keluarga masih kosong");
                $('#hub_keluarga').focus();
            } else {
                $('#btnSimpan').focus();
            }

        }
        return true;
    });
    $('#kembali').click(function() {
        var url = base_url+'pasien_baru';
        window.location.href = url;
    });
    $('input,textarea').focus(function() {
        return this.select();
    });
    
});

function cekDomisili(){
    var domisilisesuaiktp=$('#domisilisesuaiktp').prop('checked');
    if(domisilisesuaiktp==true) $('.domisili').hide();
    else $('.domisili').show();
}