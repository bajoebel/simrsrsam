function getData1(start) {
    var search;
    var url;
    var poly = $('#poly').val();
    var tgl = $('#tgl').val();
    search = $('#q').val();
    if ($('input:radio[name=filter]').is(':checked')) {
        var filter = $('input[name=filter]:checked').val();
    } else {
        var filter = "";
    }
    url = base_url+ "smart/getdata?q=" + search + "&start=" + start + "&poly=" + poly + "&tgl=" + tgl + "&filter=" + filter;
    //alert(url);
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function(data) {
            //menghitung jumlah data
            jmlData = data.length;

            //variabel untuk menampung tabel yang akan digenerasikan
            //buatTabel = "";
            pagination = "";
            row = 0;
            limit = 0;
            start = 0;
            pagination_count = 0;
            idx = 1;
            cur_idx = 0;
            next = limit;
            prev = 0;

            pagination_count = data["row_count"] / data["limit"];
            sisa = data["start"] % data["limit"];
            cur_idx = data["start"] / data["limit"];
            cur_idx = Math.ceil(cur_idx);
            prev = (cur_idx - 2) * data["limit"];
            next = (cur_idx) * data["limit"];
            paging = Math.ceil(pagination_count);
            if (cur_idx <= 2) {
                min = 0;
                max = 3;
            } else {
                min = cur_idx - 2;
                max = cur_idx + 2;
            }
            for (i = 0; i < paging; i++) {
                active = '';
                num = i + 1;
                if (i == 0) {
                    pagination += "<nav><ul class='pagination' style='margin-top:0px'><li><a class='btn btn-primary' >Record Count : " + data["row_count"] + "</a></li><li " + active + "><a  onclick='cari_pasien(" + idx + ")'>First</a></li>";
                    if (next <= row - sisa) pagination += "<li " + active + "><a onclick='cari_pasien(" + next + ")'>Next</a></li>";
                    if (num == cur_idx) active = "class='active'";
                    else active = "";
                    pagination += "<li " + active + "><a onclick='cari_pasien(" + idx + ")'>" + num + "</a></li>";
                } else if (i > 0 && i < paging - 1) {
                    if (num >= min && num <= max) {
                        idx = (data["limit"] * i) + 1;
                        if (num == cur_idx) active = "class='active'";
                        else active = "";
                        pagination += "<li " + active + "><a onclick='cari_pasien(" + idx + ")'>" + num + "</a></li>";
                    }

                } else {
                    idx = (data["limit"] * i) + 1;
                    if (num == cur_idx) active = "class='active'";
                    else active = "";
                    pagination = pagination + "<li " + active + "><a onclick='cari_pasien(" + idx + ")'>" + num + "</a></li>";
                    if (prev >= 0) pagination += "<li><a onclick='view(" + prev + ")'>Prev</a></li>";
                    pagination += "<li><a onclick='cari_pasien(" + idx + ")'>Last</a></li></ul></nav>";
                }
                if (idx == cur_idx) active = "class='active'";
                else active = "";
            }
            console.log(data["row_count"]);
            console.log(data["limit"]);
            if (data["row_count"] <= data["limit"]) pagination = "";
            //document.getElementById("nav").innerHTML = pagination;
            //document.getElementById('asesi').innerHTML = data["tabel"];
            $('#nav').html(pagination);
            $('#data').html(data['tabel']);
        }
    });
}
function getData(start){
    //$('#start').val(start);
    var search = $('#q').val();
    var limit = $('#limit').val();
    var poly = $('#poly').val();
    var tgl = $('#tgl').val();
    search = $('#q').val();
    if ($('input:radio[name=filter]').is(':checked')) {
        var filter = $('input[name=filter]:checked').val();
    } else {
        var filter = "";
    }
    url = base_url+ "smart/getdata?q=" + search + "&start=" + start + "&poly=" + poly + "&tgl=" + tgl + "&filter=" + filter;
    //alert(url);
    console.clear()
    console.log(url)
    $.ajax({
        url     : url,
        type    : "GET",
        dataType: "json",
        data    : {get_param : 'value'},
        beforeSend: function () {
            var tabel = "<tr id='loading'><td colspan='11'><b>Loading...</b></td></tr>";
            $('#data').html(tabel);
            $('#pagination').html('');
        },
        success : function(data){
        //menghitung jumlah data
    
            if(data["code"]==200){
                $('#data').html('');
                var res    = data["data"];
                var jmlData=res.length;
                var limit   = data["limit"];
                var tabel   = "";
                //Create Tabel
                var no = (parseInt(start)*parseInt(limit))-parseInt(limit);
                // alert(start);
                var dari = no+1;
                var sampai = no+parseInt(limit);
                var desc = "<button class='btn btn-default btn-sm' type='button'>Showing "+ dari + " To " + sampai + " of " +data["row_count"]+"</button>";
                for(var i=0; i<jmlData;i++){
                    no++;
                    tabel="<tr>";tabel+="<td>"+no+"</td>";
                    tabel+="<td>"+res[i]['nomr']+"</td>";
                    tabel+="<td>"+res[i]['no_ktp']+"</td>";
                    tabel+="<td>"+res[i]["nama_pasien"]+"</td>";
                    tabel+="<td>"+res[i]['nama_ruang']+"</td>";
                    tabel+="<td>"+res[i]['tanggal_kunjungan']+"</td>";
                    tabel+="<td>"+res[i]['rujukan']+"</td>";
                    tabel+="<td>"+res[i]['jam_kunjunganLabel']+"</td>";
                    tabel+="<td>"+res[i]['jam_kunjunganAntrian']+"</td>";
                    tabel+="<td>"+res[i]['namaDokterJaga']+"</td>";
                    tabel+="<td>"+res[i]['cara_bayar']+"</td>";
                    tabel+="<td>"+res[i]['tanggal_daftar']+"</td>";
                    tabel+="<td>"+res[i]['no_bpjs']+"</td>";
                    tabel+="<td style='text-align:right;'><div class='btn-group'>"
                    + "<a href='"+base_url+"smart/detail/"+res[i]["idx"]+"' class='btn btn-danger btn-sm'><span class='fa fa-search'></span> Detail</a></div></td>";
                    tabel+="</tr>";
                    $('#data').append(tabel);
                }
                //Create Pagination
                if(data["row_count"]<=limit){
                    $('#pagination').html("");
                }else{
                    console.log("buat Pagination");
                    var pagination="";
                    var btnIdx="";
                    jmlPage = Math.ceil(data["row_count"]/limit);
                    offset  = data["start"] % limit;
                    
                    var curIdx = start;
                    var btn="btn-default";
                    //var lastSt=jmlPage;
                    var btnFirst="<button class='btn btn-default btn-sm' onclick='getData(1)'><span class='fa fa-angle-double-left'></span></button>";
                    if (curIdx > 1) {
                        var prevSt=curIdx-1;
                        btnFirst+="<button class='btn btn-default btn-sm' onclick='getData("+prevSt+")'><span class='fa fa-angle-left'></span></button>";
                    }

                    var btnLast="";
                    if(curIdx<jmlPage){
                        var nextSt=curIdx+1;
                        btnLast+="<button class='btn btn-default btn-sm' onclick='getData("+nextSt+")'><span class='fa fa-angle-right'></span></button>";
                    }
                    console.log(curIdx);
                    btnLast+="<button class='btn btn-default btn-sm' onclick='getData("+jmlPage+")'><span class='fa fa-angle-double-right'></span></button>";
                    
                    if(jmlPage>=5){
                        console.clear();
                        console.log('Jumlah Halaman > 5');
                        if(curIdx>=3){
                            console.log('Cur Idx >= 3');
                            var idx_start=curIdx - 2;
                            var idx_end=curIdx + 2;
                            if(idx_end>=jmlPage) idx_end=jmlPage;
                        }else{
                            var idx_start=1;
                            var idx_end=5;
                        }
                        for (var j = idx_start; j<=idx_end; j++) {
                            if(curIdx==j)  btn="btn-primary"; else btn= "btn-default";
                            btnIdx+="<button class='btn " +btn +" btn-sm' onclick='getData("+ j +")'>" + j +"</button>";
                        }
                    }else{

                        for (var j = 1; j<=jmlPage; j++) {
                            if(curIdx==j)  btn="btn-primary"; else btn= "btn-default";
                            btnIdx+="<button class='btn " +btn +" btn-sm' onclick='getData("+ j +")'>" + j +"</button>";
                        }
                    }
                    pagination+="<div class='btn-group'>"+desc+btnFirst + btnIdx + btnLast+"</div>";
                    $('#pagination').html(pagination);
                }
            }
        },
        complete : function(){
            //$('#loading').hide();
        }
    });
}
function aprove(id) {

    var url = base_url + "smart/aprove/" + id;
    $.ajax({
        url: base_url + "smart/aprove/" + id,
        type: "POST",
        dataType: "JSON",
        success: function(data) {
            if (data['code'] == 200) {
                $('#form_aprove').modal('show');
                //alert(data["pasien"]["jns_kelamin"]);
                if (data["pasien"]["jns_kelamin"] == "L") {
                    var img = "<img  class='img-circle' src='<?php echo base_url(); ?>assets/images/male.png" + "' />";
                } else {
                    var img = "<img class='img-circle' src='<?php echo base_url(); ?>assets/images/female.png" + "' />"
                }
                $('#lbljekel').html(img);
                $('#lblnama').html(data["pasien"]["nama_pasien"]);
                $('#lbltgllahir').html(data["pasien"]["tempat_lahir"] + " / " + data["pasien"]["tgl_lahir"]);
                $('#lblnik').html(data["pasien"]["no_ktp"]);
                $('#lblpoly').html("<div class='row'><div class='col-md-4'>Poliklinik</div><div class='col-md-8'>: " + data["pasien"]["nama_ruang"] + "</div></div>");
                $('#lblrujukan').html("<div class='row'><div class='col-md-4'>Rujukan</div><div class='col-md-8'>: " + data["pasien"]["rujukan"] + "</div></div>");
                $('#lblcarabayar').html("<div class='row'><div class='col-md-4'>Cara Bayar</div><div class='col-md-8'>: " + data["pasien"]["cara_bayar"] + "</div></div>");
                $('#lbldokter').html("<div class='row'><div class='col-md-4'>Dokter</div><div class='col-md-8'>: " + data["pasien"]["namaDokterJaga"] + "</div></div>");
                $('#lblantrianloket').html("<div class='row'><div class='col-md-4'>Antrian Loket</div><div class='col-md-8'>: " + data["pasien"]["antrian_loket"] + "</div></div>");
                $('#lblantrianpoly').html("<div class='row'><div class='col-md-4'>Antrian Poly</div><div class='col-md-8'>: " + data["pasien"]["log_antrianpoly"] + "</div></div>");

                /*Data Pasien*/
                $('#daftar_id').val(data["pasien"]["daftar_id"]);
                $('#nomr').val(data["pasien"]["nomr"]);
                $('#nama_pasien').val(data["pasien"]["nama_pasien"]);
                $('#no_ktp').val(data["pasien"]["no_ktp"]);
                $('#tempat_lahir').val(data["pasien"]["tempat_lahir"]);
                $('#tgl_lahir').val(data["pasien"]["tgl_lahir"]);
                $('#jns_kelamin').val(data["pasien"]["jns_kelamin"]);
                $('#status_kawin').val(data["pasien"]["status_kawin"]);
                $('#pekerjaan').val(data["pasien"]["pekerjaan"]);
                $('#no_telpon').val(data["pasien"]["no_telpon"]);
                $('#kewarganegaraan').val(data["pasien"]["kewarganegaraan"]);
                $('#nama_negara').val(data["pasien"]["nama_negara"]);
                $('#nama_provinsi').val(data["pasien"]["nama_provinsi"]);
                $('#nama_kab_kota').val(data["pasien"]["nama_kab_kota"]);
                $('#nama_kecamatan').val(data["pasien"]["nama_kecamatan"]);
                $('#nama_kelurahan').val(data["pasien"]["nama_kelurahan"]);
                $('#suku').val(data["pasien"]["suku"]);
                $('#bahasa').val(data["pasien"]["bahasa"]);
                $('#alamat').val(data["pasien"]["alamat"]);
                $('#penanggung_jawab').val(data["pasien"]["penanggung_jawab"]);
                $('#no_penanggung_jawab').val(data["pasien"]["no_penanggung_jawab"]);
                $('#no_bpjs').val(data["pasien"]["no_bpjs"]);
                $('#jns_layanan').val(data["pasien"]["jns_layanan"]);
                $('#tgl_masuk').val(data["pasien"]["tgl_masuk"]);
                $('#id_ruang').val(data["pasien"]["id_ruang"]);
                $('#nama_ruang').val(data["pasien"]["nama_ruang"]);
                $('#id_rujuk').val(data["pasien"]["id_rujuk"]);
                $('#rujukan').val(data["pasien"]["rujukan"]);
                $('#no_rujuk').val(data["pasien"]["no_rujuk"]);
                $('#id_cara_bayar').val(data["pasien"]["id_cara_bayar"]);
                $('#cara_bayar').val(data["pasien"]["cara_bayar"]);
                $('#id_dokter').val(data["pasien"]["id_dokter"]);
                $('#namaDokterJaga').val(data["pasien"]["namaDokterJaga"]);
                $('#antrian_poly').val(data["pasien"]["log_antrianpoly"]);
                if (data["pasien"]["id_cara_bayar"] > 1) {
                    $('.sep').show();
                } else {
                    $('#no_jaminan').val("");
                    $('.sep').hide();
                }
                $('#pjPasienNama').val(data["pasien"]["penanggung_jawab"]);
                $('#pjPasienTelp').val(data["pasien"]["no_penanggung_jawab"]);
                $('#pjPasienHubKel').val("");
                $('#pjPasienUmur').val("");
                $('#pjPasienPekerjaan').val("");
                $('#pjPasienAlamat').val("");
                $('#id_pengirim').val("");
                $('#pjPasienAlmtPengirim').val("");
                $('#no_jaminan').val("");
                $('#pjPasienHubKel').focus();
                getPengirim();
                //alert(data["message"]);
            } else {
                alert(data["message"])
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert(url);
            //$.Notify({style: {background: 'red', color: 'white'}, content: "Tidak Bisa Menghapus Data"});
        }
    });

}

function aprovePasien() {
    // var formData = new FormData($('#form')[0]);
    // console.clear();
    // console.log(formData['nama_pasien']);
    var formData = {
        id_pasien: $('#id_pasien').val(),
        nomr: $('#nomr').val(),
        no_ktp: $('#no_ktp').val(),
        nama_pasien: $('#nama_pasien').val(),
        tempat_lahir: $('#tempat_lahir').val(),
        tgl_lahir: $('#tgl_lahir').val(),
        nama_provinsi: $('#nama_provinsi').val(),
        nama_kab_kota: $('#nama_kab_kota').val(),
        nama_kecamatan: $('#nama_kecamatan').val(),
        nama_kelurahan: $('#nama_kelurahan').val(),
        jns_kelamin: $('#jns_kelamin').val(),
        status_kawin: $('#status_kawin').val(),
        pekerjaan: $('#pekerjaan').val(),
        agama: $('#agama').val(),
        no_telpon: $('#no_telpon').val(),
        kewarganegaraan: $('#kewarganegaraan').val(),
        nama_negara: $('#nama_negara').val(),
        suku: $('#suku').val(),
        bahasa: $('#bahasa').val(),
        alamat: $('#alamat').val(),
        penanggung_jawab: $('#penanggung_jawab').val(),
        no_penanggung_jawab: $('#no_penanggung_jawab').val(),
        tgl_layanan: $('#tgl_layanan').val(),
        jns_layanan: $('#jns_layanan').val(),
        pjPasienNama: $('#pjPasienNama').val(),
        pjPasienUmur: $('#pjPasienUmur').val(),
        pjPasienPekerjaan: $('#pjPasienPekerjaan').val(),
        pjPasienAlamat: $('#pjPasienAlamat').val(),
        pjPasienTelp: $('#pjPasienTelp').val(),
        pjPasienHubKel: $('#pjPasienHubKel').val(),
        pjidPengirim: $('#id_pengirim').val(),
        pjPasienDikirimOleh: $('#pjPasienDikirimOleh').val(),
        pjPasienAlmtPengirim: $('#pjPasienAlmtPengirim').val(),
        dokterJaga: $('#dokterJaga').val(),
        namaDokterJaga: $('#dokterJaga :selected').html(),
        id_ruang: $('#id_ruang').val(),
        nama_ruang: $('#id_ruang :selected').html(),
        id_rujuk: $('#id_rujuk').val(),
        no_rujuk: $('#txtNorujuk').val(),
        rujukan: $('#id_rujuk :selected').html(),
        id_cara_bayar: $('#id_cara_bayar').val(),
        cara_bayar: $('#id_cara_bayar :selected').html(),
        id_jenis_peserta: $('#id_jenis_peserta').val(),
        jenis_peserta: $('#jenis_peserta').val(),
        no_bpjs: $('#no_bpjs').val(),
        no_jaminan: $('#no_jaminan').val(),
        tgl_daftar: $('#tgl_daftar').val(),
        daftar_id: $('#daftar_id').val(),
        label_antrian: $('#label_antrian').val(),
        jam_kunjunganLabel: $('#jam_kunjunganLabel').val(),
        jam_kunjunganAntrian: $('#jam_kunjunganAntrian').val(),
        jam_kunjungan: $('#jam_kunjungan').val(),
        nomor_antrian: $('#nomor_daftar').val(),
        id_pendaftaranonline: $('#id_pendaftaran_online').val(),
        id_userdaftar: $('#id_userdaftar').val(),
    }
    console.clear();
    console.log(formData);
    //alert(formData['id_pendaftaranonline']);
    //return false;
    if (formData['nama_pasien'] == "") {
        alert('Ops. Nama Pasien tidak boleh kosong.');
    } else if (formData['pjPasienNama'] == "") {
        alert('Ops. Nama penanggung jawab pasien tidak boleh kosong.');
        $('#pjPasienNama').focus()
    } else if (formData['id_ruang'] == "") {
        alert('Ops. Tujuan layanan harus di pilih.');
    } else if (formData['id_rujuk'] == "") {
        alert('Ops. Rujukan harus di pilih.');
    } else if (formData['id_cara_bayar'] == "") {
        alert('Ops. Cara bayar harus di pilih.');
    } else {
        var tgl_kunjungan = $('#tgl_masuk').val();
        //var sekarang = "<?php echo date('Y-m-d'); ?>";
        //alert(tgl_kunjungan + " = " + sekarang);
        if (tgl_kunjungan == sekarang) {
            var x = confirm("Apakah anda yakin akan melanjutkan proses pendaftaran pasien ini?");
            if (x) {
                
                $.ajax({
                    url: base_url+"smart/aprove_pasien",
                    type: "POST",
                    data: formData,
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.code == 200) {
                            var url = base_url+ 'smart/reg_success?uid='+ data.unikID;
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
        } else {
            alert("Maaf Kunjungan ini tidak bisa di aprove \nKarena rencana kunjungan pasien bukan hari ini ");
        }
    }
}

function download_excel() {
    var search;
    var url;
    var poly = $('#poly').val();
    var tgl = $('#tgl').val();
    search = $('#q').val();
    url = base_url+"smart/data_excel?q="; + search + "&start=0&poly=" + poly + "&tgl=" + tgl
    window.open(url);
}

function formSEP() {
    /*$('#optJnsRujukan').prop('selectedIndex',0);
    $('#optAsalRujukan').prop('selectedIndex',0);
    $('#txtTanggal').val('<?php //echo date("Y-m-d") 
                            ?>');
    $('#no_rujuk').val('');
    $('#formModalSEP').modal('show');*/
    $('#pjPasienNama').removeClass("ui-autocomplete-input");
    var encryptdata = $('#encryptdata').val();
    if (encryptdata == "") {
        var faskes = $('#faskes').val();
        var jenis_layanan = $('#jns_layanan').val();
        if (jenis_layanan == "RJ") {
            if (faskes == 0) {
                tampilkanPesan('warning', "Pasien Rawat Jalan Harus Membawa Surat Rujukan Dari Faskes I Atau Faskes II");
            } else {
                tampilkanPesan('error', "Rujukan Tidak Valid");
            }
        } else if (jenis_layanan == "GD") {
            if (faskes == 0) {
                tampilkanPesan('success', "Tampilkan Form SEP IGD");
            } else {
                tampilkanPesan('warning', "Rujukan Tidak Valid");
            }
        }
        //alert("Rujukan Tidak Valid");

    } else {
        formGenerateSEP(encryptdata);

    }

}

function cariRujukanPasien() {
    var a = $('#no_rujuk').val();
    var b = $('#optAsalRujukan').val();
    var fomrdata = {
        param1: a, // No rujukan
        param2: b // Faskes Asal Rujukan
    }
    $.ajax({
        url: url_call_back+"vclaim/rujukan/rujukanBerdasarkanNomorRujukan",
        type: "POST",
        data: fomrdata,
        dataType: "JSON",
        beforeSend: function() {
            // $('#btnCariRujukanPasien').setattr('disabled','disabled');
            $('#btnCariRujukanPasien').prop("disabled", true); // Element(s) are now enabled.
            $('#btnCariRujukanPasien').html("<i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu");
        },
        success: function(data) {
            $('#btnCariRujukanPasien').prop("disabled", false); // Element(s) are now enabled.
            $('#btnCariRujukanPasien').html("Cari");
            if (data.metaData.code == 200) {
                var x = data.response.rujukan;
                var asalRujukan = $('#optAsalRujukan').val();
                var tglSEP = $('#txtTanggal').val();
                /** 
                console.log(x.toSource());
                alert(x['diagnosa']['nama']);
                alert(x[0]['noKunjungan']);
                */
                // alert("myObject is " + x.toSource());
                $('#cbasalrujukan').val(asalRujukan).trigger('change');
                $('#txtnmpoli').val(x['poliRujukan']['nama']);
                $('#txtkdpoli').val(x['poliRujukan']['kode']);
                $('#txtkdppkasalrujukan').val(x['provPerujuk']['kode']);
                $('#txtppkasalrujukan').val(x['provPerujuk']['nama']);
                $('#txttglrujukan').val(x['tglKunjungan']);
                $('#txtnorujukan').val(x['noKunjungan']);
                $('#noSurat').val('');
                $('#noSurat').val('');
                // Belum ditemukan
                $('#txtidkontrol').val('');
                $('#noSuratlama').val('');
                $('#txtpoliasalkontrol').val('');
                $('#txttglsepasalkontrol').val('');

                $('#txtnmdpjp').val('');
                $('#kodeDPJP').val('');

                $('#txttglsep').val("<?= date('Y-m-d') ?>");
                $('#txtnomr').val(x['peserta']['mr']['noMR']);
                $('#txtnomr').val(x['peserta']['mr']['noMR']);

                $('#txtnmdiagnosa').val(x['diagnosa']['nama']);
                $('#diagAwal').val(x['diagnosa']['kode']);

                $('#noTelp').val(x['peserta']['mr']['noTelepon']);

                $('#catatan').val('');
                $('#lakaLantas').prop('selectedIndex', 1);


                $('#lblnama').html(x['peserta']['nama']);
                $('#lblnoka').html(x['peserta']['noKartu']);
                $('#txtkelamin').val(x['peserta']['sex']);
                $('#txtkdstatuspst').val(x['peserta']['statusPeserta']['kode']);

                $('#lblnik').html(x['peserta']['nik']);
                $('#lblnokartubapel').html('');
                $('#lbltgllahir').html(x['peserta']['tglLahir']);
                $('#lblpisa').html(x['peserta']['pisa']);
                $('#lblfktp').html(x['peserta']['provUmum']['kdProvider'] + '-' + x['peserta']['provUmum']['nmProvider']);
                $('#txtppkasalpst').html(x['peserta']['provUmum']['kdProvider']);
                $('#lbltmt_tat').html(x['peserta']['tglTMT'] + '-' + x['peserta']['tglTAT']);
                $('#txttmtpst').html(x['peserta']['tglTMT']);
                $('#lblpeserta').html(x['peserta']['jenisPeserta']['keterangan']);
                $('#txtjnspst').html(x['peserta']['jenisPeserta']['kode']);

                $('#lblnoasu').html(x['peserta']['cob']['noAsuransi']);
                $('#txtkdasu').html('');
                $('#lblnmasu').html(x['peserta']['cob']['nmAsuransi']);
                $('#lbltmt_tatasu').html(x['peserta']['cob']['tglTMT'] + ' s/d ' + x['peserta']['cob']['tglTAT']);
                $('#lblnamabu').html('');
                $('#txtkdbu').html('');

                $('#mpop_rujukan').modal('hide');
                // $('#formModalSEP').modal('hide');

                $('#mpop_sep').modal('show');
            } else {
                alert(data.metaData.message);
            }

        },
        error: function(jqXHR, ajaxOption, errorThrown) {
            $('#btnCariRujukanPasien').prop("disabled", false); // Element(s) are now enabled.
            $('#btnCariRujukanPasien').html("Cari");
            console.log(jqXHR.responseText);
        }
    });
}

function updateNoBPJS() {
    var a = $('#nomr').val();
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
            url: base_url+"registrasi/updateNoBPJS",
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
    var a = $('#no_jaminan').val();
    var formdata = {
        'param1': a
    }
    if (a == "") {
        alert('No Jaminan atau No BPJS (Untuk Layanan BPJS) tidak boleh kosong');
    } else {
        $.ajax({
            url: url_call_back+"vclaim/sep/cariSEP",
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
                    if (_e.trim() == 'Rawat Inap') {
                        titleNotif = 'SEP ini bukan untuk Rawat Jalan';
                        pesan = 'Tgl SEP : ' + _d + '\n' + 'SEP atas nama : ' + _a + '\n' + 'No Kartu : ' + _b + '\n' + 'No MR : ' + _c + '\n' + 'Jenis Pelayanan : ' + _e + '\n' + 'Jenis Peserta : ' + _f;
                        tampilkanPesan('error', pesan, titleNotif);
                        $('#daftar').focus();
                    } else {
                        pesan = 'Tgl SEP : ' + _d + '\n' + 'SEP atas nama : ' + _a + '\n' + 'No Kartu : ' + _b + '\n' + 'No MR : ' + _c + '\n' + 'Jenis Pelayanan : ' + _e + '\n' + 'Jenis Peserta : ' + _f;
                        tampilkanPesan('success', pesan);
                        $('#daftar').focus();
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