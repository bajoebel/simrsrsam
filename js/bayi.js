$(document).ready(function () {
    $(".inputmask").inputmask();
    
    $('.tanggal').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
    });
    $('.tanggal').datepicker({
        autoclose: true,
        format: "dd/mm/yyyy"
    });
    
    $('#nama').focus();

    $('#nama').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            nama = $('#nama').val();
            if (nomr == "") {
                $('#nama').focus();
            } else {
                $('#tempat_lahir').focus();
            }
            
        }
    });
    $('#tempat_lahir').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            $('#tgl_lahir').focus();
        }
    });
    $('#tgl_lahir').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            $('#nama_suku').focus();
        }
    });
    $('#nama_suku').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            $('#pgwPria').focus();
        }
    });
    $('#pgwPria').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            $('#pgwWanita').focus();
        }
    });
    $('#pgwWanita').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            $('#nomribu').focus();
        }
    });
    
    
    $('#nomribu').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            nomr = $('#nomribu').val();
            if (nomr == "") {
                $('#nomribu').focus();
            } else {
                $('#rawatgabung').focus();
            }
        }
    });
    $('#rawatgabung').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            $('#masukigd').focus();
        }
    });
    $('#rawatgabung').change(function (){
        var masukigd = $('#masukigd').prop('checked');
        if ($(this).prop('checked')) {
            if (masukigd == true) {
                //jika rawat gabung dan masuk dari igd
                //$('#rawatgabungfull').show()
                $('.masukigd').show(); 
                $('.rawatsendiri').hide();
            }else {
                //Jika Rawat Gabung Dan Tidak masuk igd
                $('.masukigd').hide(); 
                $('.rawatsendiri').hide();
                //$('#rawatgabungfull').hide()
            }
        } else {
            //$('#rawatgabungfull').show()
            if (masukigd == true) {
                //Jika masuk Lewat igd dan bukan rawat gabung
                $('.rawatsendiri').show();
                $('.masukigd').show(); 
                //$('#rawatgabungfull').show()
            }else {
                $('.rawatsendiri').show();
                $('.masukigd').hide(); 
                //$('#rawatgabungfull').show();
            }
            //$('.rawatsendiri').show();
        }
    });
    $('#masukigd').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            var rawatgabung = $('#rawatgabung').prop('checked');
            var masukigd = $('#masukigd').val();
            if(masukigd==true){
                if (rawatgabung == true) $('#ruang_pengirim').focus();
                else $('#id_cara_bayar').focus();
            }else{
                if (rawatgabung == true) $('#id_cara_bayar').focus();
                else $('#pjPasienNama').focus();
            }
            //$('#id_cara_bayar').focus();
        }
    });
    $('#id_cara_bayar').change(function () {
        
        var carabayar = $('#id_cara_bayar').val();
        var url = base_url + "registrasi/carabayar/" + carabayar;
        console.clear();
        console.log(url);

        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            data: {
                get_param: 'value'
            },
            success: function (data) {

                console.log(data);

                if (data["status"] == true) {
                    var x = data["data"]["jkn"];
                    $('#jkn').val(x);

                    if (x == "0" || x == "2") {

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
    });
    $('#id_cara_bayar').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            var masukigd = $('#masukigd').val();
            if (masukigd == true) $('#ruang_pengirim').focus();
            else $('#id_kelas').focus();
        }
    });
    $('#ruang_pengirim').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            $('#dokter_pengirim').focus();
        }
    });
    $('#dokter_pengirim').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            $('#id_kelas').focus();
        }
    });
    $('#id_kelas').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            $('#id_ruang').focus();
        }
    });
    $('#id_ruang').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            $('#id_kamar').focus();
        }
    });
    $('#id_kamar').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            $('#dokterJaga').focus();
        }
    });
    $('#dokterJaga').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            $('#pjPasienNama').focus();
        }
    });
    $('#pjPasienNama').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            $('#pjPasienPekerjaan').focus();
        }
    });
    $('#pjPasienPekerjaan').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            $('#pjPasienAlamat').focus();
        }
    });
    $('#pjPasienAlamat').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            $('#pjPasienTelp').focus();
        }
    });
    $('#pjPasienTelp').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            $('#pjPasienHubKel').focus();
        }
    });
    $('#pjPasienHubKel').keyup(function (ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            $('#daftar').focus();
        }
    });
    $('#masukigd').change(function () {
        var rawatgabung = $('#rawatgabung').prop('checked');
        if ($(this).prop('checked')) {
            if (rawatgabung == true) {
                //Jika masuk Lewat igd dan rawat gabung
                $('.masukigd').show(); 
                $('.rawatsendiri').hide();
                //$('#rawatgabungfull').show()
            }else {
                //Jika Masuk LEwat Igd Dan tidak rawat gabung
                $('.masukigd').show();
                $('.rawatsendiri').show();
                //$('#rawatgabungfull').show()
            }
            
        } else {
            if (rawatgabung == true) {
                //JIka Masuk tidak lewat igd dan rawat gabung
                $('.rawatsendiri').hide();
                $('.masukigd').hide(); 
                //$('#rawatgabungfull').hide()
            }else {
                //JIka tidak lewat Igd dan tidak rawat gabung
                $('.rawatsendiri').show();
                $('.masukigd').hide(); 
                //$('#rawatgabungfull').show()
            }
            //$('.rawatsendiri').show();
        }
    });
    //AUto Complete Mencari Data Suku
    $.widget("custom.carisuku", $.ui.autocomplete, {
        _create: function () {
            this._super();
            this.widget().menu("option", "items", "> li:not(.ui-autocomplete-header)");
        },
        _renderMenu(ul, items) {
            var self = this;
            ul.addClass("container");

            let header = {
                nama_suku: "Nama Suku",
                isheader: true
            };
            self._renderItemData(ul, header);
            $.each(items, function (index, item) {
                self._renderItemData(ul, item);
            });

        },
        _renderItemData(ul, item) {
            return this._renderItem(ul, item).data("ui-autocomplete-item", item);
        },
        _renderItem(ul, item) {
            var $li = $("<li class='ui-menu-item' role='presentation'></li>");
            if (item.isheader)
                $li = $("<li class='ui-autocomplete-header' role='presentation'  style='font-weight:bold !important;'></li>");
            var $content = "<div class='row ui-menu-item-wrapper'>" +
                "<div class='col-xs-2'>" + item.nama_suku + "</div>" +
                "</div>";
            $li.html($content);


            return $li.appendTo(ul);
        }

    });
    $("#nama_suku").carisuku({
        minLength: 1,
        source: function (request, response) {
            var url = base_url + "bayi/datasuku";
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: {
                    keyword: request.term
                },
                success: function (data) {
                    response(data.slice(0, 15));
                }
            });
        },
        focus: function (event, ui) {
            $("#nama_suku").removeClass("ui-autocomplete-loading");
            $('#nama_suku').val(ui.item['nama_suku']);
            return false;
        },
        select: function (event, ui) {
            $("#nama_suku").removeClass("ui-autocomplete-loading");
            $('#nama_suku').val(ui.item['nama_suku']);
            //setBarang(ui.item['KDBRG'], ui.item['NMBRG'], ui.item['NMSATUAN'], ui.item['NMKTBRG']);
            return false;
        }
    });
    //Auto Complete Mencari Data Reservasi Rawat Inap Ibu
    $.widget("custom.cariranap", $.ui.autocomplete, {
        _create: function () {
            this._super();
            this.widget().menu("option", "items", "> li:not(.ui-autocomplete-header)");
        },
        _renderMenu(ul, items) {
            var self = this;
            ul.addClass("container");

            let header = {
                nomr: "Nomr",
                tgl_masuk: "Tanggal Masuk",
                reg_unit: "Reg Unit",
                nama_pasien: "Nama Pasien",
                nama_ruang: "Ruangan",
                nama_kamar: "Kamar",
                kelas_layanan: "Kelas",
                isheader: true
            };
            self._renderItemData(ul, header);
            $.each(items, function (index, item) {
                self._renderItemData(ul, item);
            });

        },
        _renderItemData(ul, item) {
            return this._renderItem(ul, item).data("ui-autocomplete-item", item);
        },
        _renderItem(ul, item) {
            var $li = $("<li class='ui-menu-item' role='presentation'></li>");
            if (item.isheader)
                $li = $("<li class='ui-autocomplete-header' role='presentation'  style='font-weight:bold !important;'></li>");
            var $content = "<div class='row ui-menu-item-wrapper'>" +
                "<div class='col-xs-1'>" + item.nomr + "</div>" +
                "<div class='col-xs-2'>" + item.tgl_masuk + "</div>" +
                "<div class='col-xs-2'>" + item.reg_unit + "</div>" +
                "<div class='col-xs-2'>" + item.nama_pasien + "</div>" +
                "<div class='col-xs-2'>" + item.nama_ruang + "</div>" +
                "<div class='col-xs-2'>" + item.nama_kamar + "</div>" +
                "<div class='col-xs-1'>" + item.kelas_layanan + "</div>" +
                "</div>";
            $li.html($content);


            return $li.appendTo(ul);
        }

    });
    $("#nomribu").cariranap({
        minLength: 1,
        source: function (request, response) {
            var url = base_url + "bayi/kunjunganibu";
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                data: {
                    keyword: request.term
                },
                success: function (data) {
                    response(data.slice(0, 15));
                }
            });
        },
        focus: function (event, ui) {
            $("#nomribu").removeClass("ui-autocomplete-loading");
            return false;
        },
        select: function (event, ui) {
            $("#nomribu").removeClass("ui-autocomplete-loading");
            $('#nomribu').val(ui.item['nomr']);
            $('#id_daftaribu').val(ui.item['id_daftar']);
            $('#reg_unitibu').val(ui.item['reg_unit']);
            $('#nama_ibu').val(ui.item['nama_pasien']);
            $('#namaruangibu').val(ui.item['nama_ruang']);
            $('#namakamar').val(ui.item['nama_kamar']);
            $('#kelas_layanan').val(ui.item['kelas_layanan']);
            $('#dbjpibu').val(ui.item['namaDokterJaga']);
            $('#pjPasienNama').val(ui.item['pjPasienNama']); 
            $('#pjPasienPekerjaan').val(ui.item['pjPasienPekerjaan']);
            $('#pjPasienAlamat').val(ui.item['pjPasienAlamat']);
            $('#pjPasienTelp').val(ui.item['pjPasienTelp']);
            $('#id_cara_bayar').val(ui.item['id_cara_bayar']);

            //setBarang(ui.item['KDBRG'], ui.item['NMBRG'], ui.item['NMSATUAN'], ui.item['NMKTBRG']);
            return false;
        }
    });
    $('#daftar').click(function () {
        //alert("didaftarkan Segera");
        var simpan=false;
        var formdata = {
            nama_pasien: $('#nama').val(),
            tempat_lahir: $('#tempat_lahir').val(),
            tgl_lahir: $('#tgl_lahir').val(),
            nama_suku: $('#nama_suku').val(),
            nama_pasien: $('#nama').val(),
            tempat_lahir: $('#tempat_lahir').val(),
            tgl_lahir: $('#tgl_lahir').val(),
            jns_kelamin: $('#jns_kelamin').val(),
            reg_unitibu: $('#reg_unitibu').val(),
            pjPasienNama: $('#pjPasienNama').val(),
            pjPasienUmur: $('#pjPasienUmur').val(),
            pjPasienPekerjaan: $('#pjPasienPekerjaan').val(),
            pjPasienAlamat: $('#pjPasienAlamat').val(),
            pjPasienTelp: $('#pjPasienTelp').val(),
            pjPasienHubKel: $('#pjPasienHubKel').val(),
            pjPasienDikirimOleh: $('#pjPasienDikirimOleh').val(),
            pjPasienAlmtPengirim: $('#pjPasienAlmtPengirim').val(),
        }
        var rawatgabung = $('#rawatgabung').prop('checked');
        var masukigd = $('#masukigd').prop('checked');
        if (formdata['nama_pasien'] == "") {
            alert('Ops. Nama Pasien Masih Kosong. Coba ulangi lagi');
        } else if (formdata['tempat_lahir'] == "") {
            alert('Ops. Tempat Lahir kosong. Coba ulangi lagi');
        } else if (formdata['tgl_lahir'] == "") {
            alert('Ops. Tgl Lahir tidak kosong. Coba ulangi lagi');
        } else if (formdata['nama_suku'] == "") {
            alert('Ops. Nama Suku kosong. Coba ulangi lagi');
        } else if (formdata['reg_unitibu'] == "") {
            alert('Ops. Data Reservasi Rawat InapIbu Masih kosong. Coba ulangi lagi');
        } else if (formdata['pjPasienNama'] == "") {
            alert('Ops. Nama penanggung jawab pasien tidak boleh kosong.');
            $('#pjPasienNama').focus()
        } else {
            //alert(rawatgabung)
            if(rawatgabung==false){
                if ($('#id_ruang').val() == "") {
                    alert('Ops. Tujuan layanan harus di pilih.');
                } else if ($('#id_kelas').val() == "") {
                    alert('Ops. Kelas pelayanan harus di pilih.');
                } else if ($('#id_cara_bayar').val() == "") {
                    alert('Ops. Cara bayar harus di pilih.');
                } else if ($('#dokterJaga').val() == "") {
                    alert('Ops. Dokter DPJP harus di pilih.');
                } else{
                    if(masukigd==true){
                        if ($('#dokter_pengirim').val() == "") {
                            alert('Ops. Dokter pengirim harus di pilih.');
                        } else if ($('#ruang_pengirim').val() == "") {
                            alert('Ops. Ruang pengirim harus di pilih.');
                        } else{
                            simpan=true;
                        }
                    }else{
                        simpan=true;
                    }
                }
            }else{
                if (masukigd == true) {
                    if ($('#dokter_pengirim').val() == "") {
                        alert('Ops. Dokter pengirim harus di pilih.');
                    } else if ($('#ruang_pengirim').val() == "") {
                        alert('Ops. Ruang pengirim harus di pilih.');
                    }else{
                        simpan=true;
                    }
                }else{
                    simpan=true;
                }
            }

            if(simpan==true){
                var x = confirm("Apakah anda yakin akan melanjutkan proses pendaftaran pasien ini?");
                if (x) {
                    console.clear();
                    console.log(formdata);
                    var formData = new FormData($('#form')[0]);
                    $.ajax({
                        url: base_url + 'bayi/daftar_ranap',
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: "JSON",
                        success: function (data) {
                            if (data.code == 200) {
                                var url = base_url + 'registrasi/reg_success_ranap?uid=' + data.unikID;
                                window.location.href = url;
                            } else {
                                alert(data.message);
                            }
                        },
                        error: function (jqXHR, ajaxOption, errorThrown) {
                            console.log(jqXHR.responseText);
                        }
                    });
                }
            }
            
            
        }
    });
});
function cekPeserta() {
    var url = url_call_back + "/vclaim/peserta/nokartu";
    console.log(url);
    var nobpjs = $("#no_bpjs").val();
    var tgllayanan = $('#sekarang').val();
    $.ajax({
        url: url,
        type: "POST",
        dataType: "json",
        data: { param1: nobpjs, param2: tgllayanan },
        success: function (data) {
            console.log(data);
            if (data.metaData.code == 200) {
                var x = data["response"];
                console.log(x);
                $('#status_peserta').val(x.peserta.statusPeserta.keterangan);
                if (x.peserta.statusPeserta.keterangan != "AKTIF") {
                    var status = '<a id="cekStatus" href="Javascript:cekPeserta()"><i class="fa fa-remove"></i> ' + x.peserta.statusPeserta.keterangan + '</a>';
                    tampilkanPesan('warning', "Status Peserta Dengan Atas Nama : " + x.peserta.nama + " dengan noKartu : " + x.peserta.noKartu + " " + x.peserta.statusPeserta.keterangan + " Silahkan lakukan pengurusan terlebih dahulu ke kantor BPJS");
                } else {
                    var status = '<a id="cekStatus" href="Javascript:cekPeserta()"><i class="fa fa-check"></i> ' + x.peserta.statusPeserta.keterangan + '</a>';
                    var jns_layanan = $('#jns_layanan').val();
                    if (jns_layanan == 'RI') {
                        var nama = $('#nama_pasien').val();
                        $('#hakKelasid').val(x.peserta.hakKelas.kode);
                        $('#hakKelas').val(x.peserta.hakKelas.keterangan);
                    }
                    else var nama = $('#nama').val();
                    var nik = $('#no_ktp').val();
                    console.clear();
                    console.log(data);
                    if (nama != x.peserta.nama || nik != x.peserta.nik) {
                        tampilkanPesan('warning', 'Terjadi ketidaksamaan data peserta BPJS dengan Data Pasien di SIMRS untuk peserta dengan \n\nNoPeserta : ' + x.peserta.noKartu + "\nNIK : " + x.peserta.nik + "\nNama Peserta : " + x.peserta.nama);
                    }
                }


                $('#id_jenis_peserta').val(x.peserta.jenisPeserta.kode);
                $('#jenis_peserta').val(x.peserta.jenisPeserta.keterangan);
                $('#status').html(status);
                var jns_layanan = $('#jns_layanan').val();
                if (jns_layanan == "RI") {
                    $("#dokter_pengirim").focus();
                    $('#id_kelas').val(x.peserta.hakKelas.kode);
                }

                //alert("Ok");
            } else {
                tampilkanPesan('warning', data.metaData.message);
            }
        }
    });
}
function getKamar() {
    var idruang = $('#id_ruang').val();
    var kelasid = $('#id_kelas').val();
    var url = base_url +"registrasi/kamar/" + idruang + "/" + kelasid;
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        success: function (data) {
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
                    if (terisi == r[i]["jml_tt"]) row += "<option value='" + r[i]["id_kamar"] + "' disabled>" + r[i]["nama_kamar"] + "(Penuh)</option>";
                    else row += "<option value='" + r[i]["id_kamar"] + "'>" + r[i]["nama_kamar"] + "</option>";
                }
                $('#id_kamar').html(row);
            } else {
                alert(data["message"]);
            }
        },
        error: function (jqXHR, ajaxOption, errorThrown) {
            $('#btnUpdateNoBPJS').html("<i class='fa fa-save'></i> Update");
            console.log(jqXHR.responseText);
        }
    });
}

function getDokter(id_ruang = "") {
    if (id_ruang == "") id_ruang = $('#ruang_pengirim').val();
    var url = base_url + "patch/getdokter/" + id_ruang;
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: { get_param: 'value' },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            console.log(url);
            if (data["status"] == true) {
                var dokter = data["data"];
                var jmlData = dokter.length;
                var limit = data["limit"]
                var option = "<option value=''>Pilih Dokter</option>";
                //Create Tabel
                for (var i = 0; i < jmlData; i++) {
                    option += "<option value='" + dokter[i]["NRP"] + "'>" + dokter[i]["pgwNama"] + "</option>";
                }
                $('#dokter_pengirim').html(option);
            }
        }
    });
}