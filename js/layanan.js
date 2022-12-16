
$(document).ready(function () {
    $('input').focus(function () {
        return $(this).select();
    });
    var jns_layanan=$('#jns_layanan').val();
    if(jns_layanan !='RI'){
        $('.tanggal').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        })
    }
    $('#q').keypress(function (ev) {
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            getData(1);
        }
    });
    $('#btnKeyword').click(function () {
        getData(1);
    });

    //Dari Template entry

    $('#tgl_masuk, #tgl_keluar').on('change textInput input', function () {
        if (($("#tgl_masuk").val() != "") && ($("#tgl_keluar").val() != "")) {
            var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
            var firstDate = new Date($("#tgl_masuk").val());
            var secondDate = new Date($("#tgl_keluar").val());
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

    $('.tanggal').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd"
    })
    //var reg_unit = '<?php echo $detail->reg_unit ?>';
    //getTableNotaItem(reg_unit);

    const formatter = new Intl.NumberFormat('id-ID');
    $('select').not('#id_penunjang').not('#id_kelas').not('#id_kamar').not('#pr_id_ruang').not('#pr_id_kamar').not('#lokasi').not('#jns_obat').not('#satuanAP').not('#cara_pakai').not('#waktu2').not('#waktu3').not('#keterangan').not('#op_idjenistindakan').not('#op_polipengirim').not('#op_kelasid').not('#op_layanan').not('#op_dokterid').not('#id_pemeriksaan').select2({
        placeholder: 'Pilih Option '
    });

    //$('select').not('#pr_id_ruang').not('#pr_id_kelas').not('#pr_id_kamar').select2({placeholder:'-- Pilih --'});

    $('#txtQty').keyup(function () {
        var a = $(this).val();
        var b = $('#txtTarif').val();
        calcTarif();
    });
    $('input').focus(function () {
        return this.select();
    });
    $('#closeDivCariTarif').click(function () {
        $('#divCariTarif').hide();
        $('#divDetailNota').show();
    });
    $('#txtTindakan').keypress(function (ev) {
        var a = $(this).val();
        var b = $('#cmbKelasTarif').val();
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);

        if (keycode == '13') {


            getData(0);
        }
    });
    $('#cmbKelasTarif').change(function (ev) {
        getData(0);
    });
    $('#txtQty').keypress(function (ev) {
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            simpanTindakan();
        }
    });

});
function tampilkanPesan(a,b,c=""){
    if (a=='error') {        
        swal({
            title: c,
            text: b,
            type: "error",
            confirmButtonColor: "#f00",
            confirmButtonText: "OK"
        });
    }else if(a=='success'){
        swal({
            title: "Memanggil Antrian",
            text: b,
            type: "success",
            confirmButtonColor: "#034a03",
            confirmButtonText: "OK"
        });
    }else if(a=='info'){
        swal({
            title: "Memanggil Antrian",
            text: b,
            type: "info",
            confirmButtonColor: "#034a03",
            confirmButtonText: "OK"
        });
    }else if(a=='warning'){
        swal({
            title: "Memanggil Antrian",
            text: b,
            type: "warning",
            confirmButtonColor: "#034a03",
            confirmButtonText: "OK"
        });
    }else{
        alert(b);
    }
}
function getDataTarif(start) {
    var a = $('#txtTindakan').val();
    var b = $('#cmbKelasTarif').val();
    var c = $('#jns_layanan').val();
    var d = $('#id_ruang').val();
    if ($('#alltarif').is(':checked')) var e = 1;
    else var e = 0;
    var url = base_url +'layanan/getTarif/' + start + "?sLike=" + a + "&kelas_id=" + b + "&jns_layanan=" + c + "&id_ruang=" + d + "&all=" + e;
    console.clear();
    console.log(url);
    //alert(url)ss
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        beforeSend: function () {
            $('#divDetailNota').hide();
            $('tbody#getTarif').html("<tr><td colspan=10>Loading... Please wait</td></tr>");
            console.log("menjalankan FUnction getData....");
        },
        success: function (data) {
            //$('tbody#getTarif').html(data);
            if (data["status"] == true) {
                var res = data["data"];
                var jmlData = res.length;
                var limit = data["limit"]
                var tabel = "";
                var start = data["start"];
                //Create Tabel
                for (var i = 0; i < jmlData; i++) {
                    start++;
                    tabel += "<tr>";
                    tabel += "<td>" + start + "</td>";
                    tabel += "<td>" + res[i]["layanan"] + "</td>";
                    tabel += "<td class='text-right'>Rp. " + res[i]["tarif_layanan"] + "</td>";
                    tabel += "<td>" + res[i]["kategori_tarif"] + "</td>";
                    tabel += "<td>" + res[i]["kelas_layanan"] + "</td>";
                    tabel += '<td class=\'text-right\'>';
                    tabel += '<button type=\'button\' class=\'btn btn-danger \' onclick=\'pilihTarif("' + res[i]["idx"] + '", "' + res[i]["layanan"] + '","' + res[i]["jasa_sarana"] + '","' + res[i]["jasa_pelayanan"] + '","' + res[i]["tarif_layanan"] + '","' + res[i]["kategori_id"] + '","' + res[i]["kelas_id"] + '")\'><span class=\'fa fa-check\' ></span> Pilih</button>';
                    tabel += '</td>';
                    tabel += "</tr>";
                }
                $('#getTarif').html(tabel);
                //Create Pagination
                if (data["row_count"] <= limit) {
                    $('#v-pagination').hide();
                    $('#pagination').html("");
                } else {
                    $('#v-pagination').show();
                    var pagination = "";
                    var btnIdx = "";
                    jmlPage = Math.ceil(data["row_count"] / limit);
                    offset = data["start"] % limit;
                    curIdx = Math.ceil((data["start"] / data["limit"]) + 1);
                    prev = (curIdx - 2) * data["limit"];
                    next = (curIdx) * data["limit"];

                    var curSt = (curIdx * data["limit"]) - data["limit"];
                    var st = start;
                    var btn = "btn-default";
                    var lastSt = (jmlPage * data["limit"]) - data["limit"]
                    var btnFirst = "<button class='btn btn-default btn-sm' onclick='getData(0)'><span class='fa fa-angle-double-left'></span></button>";
                    if (curIdx > 1) {
                        var prevSt = ((curIdx - 1) * data["limit"]) - data["limit"];
                        btnFirst += "<button class='btn btn-default btn-sm' onclick='getData(" + prevSt + ")'><span class='fa fa-angle-left'></span></button>";
                    }

                    var btnLast = "";
                    if (curIdx < jmlPage) {
                        var nextSt = ((curIdx + 1) * data["limit"]) - data["limit"];
                        btnLast += "<button class='btn btn-default btn-sm' onclick='getData(" + nextSt + ")'><span class='fa fa-angle-right'></span></button>";
                    }
                    btnLast += "<button class='btn btn-default btn-sm' onclick='getData(" + lastSt + ")'><span class='fa fa-angle-double-right'></span></button>";

                    if (jmlPage >= 25) {
                        if (curIdx >= 20) {
                            var idx_start = curIdx - 20;
                            var idx_end = idx_start + 25;
                            if (idx_end >= jmlPage) idx_end = jmlPage;
                        } else {
                            var idx_start = 1;
                            var idx_end = 25;
                        }
                        for (var j = idx_start; j <= idx_end; j++) {
                            st = (j * data["limit"]) - data["limit"];
                            if (curSt == st) btn = "btn-success";
                            else btn = "btn-default";
                            btnIdx += "<button class='btn " + btn + " btn-sm' onclick='getData(" + st + ")'>" + j + "</button>";
                        }
                    } else {
                        for (var j = 1; j <= jmlPage; j++) {
                            st = (j * data["limit"]) - data["limit"];
                            if (curSt == st) btn = "btn-success";
                            else btn = "btn-default";
                            btnIdx += "<button class='btn " + btn + " btn-sm' onclick='getData(" + st + ")'>" + j + "</button>";
                        }
                    }
                    console.log(curSt);
                    pagination += btnFirst + btnIdx + btnLast;
                    $('#pagination').html('<div class="btn-group">' +
                        pagination + '</div>');
                }
            }
            $('#divCariTarif').show();

        },
        error: function (jqXHR, ajaxOption, errorThrown) {
            $('#divDetailNota').show();
            console.log(jqXHR.responseText);
        }
    });
}
const formatter = new Intl.NumberFormat('id-ID');

function calcTarif() {
    var a = $('#txtTarif').val().replace('.', '').replace('.', '').replace('.', '');
    var b = $('#txtQty').val();
    a = (a == '' || isNaN(a)) ? 0 : a;
    b = (b == '' || isNaN(b)) ? 0 : b;
    var c = parseFloat(a) * parseFloat(b);
    $('#txtSubTotal').val(formatter.format(c));
}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return true;
}

function getTableTarif() {
    var a = $('#txtTindakan').val();
    var b = $('#cmbKelasTarif').val();
    var jl = $('#jns_layanan').val();
    var r = $('#id_ruang').val();
    $.ajax({
        url: base_url+"layanan/getTarif",
        type: "POST",
        data: {
            sLike: a,
            kelas_id: b,
            jns_layanan: jl,
            id_ruang: r
        },
        beforeSend: function () {
            $('tbody#getTarif').html("<tr><td colspan=10>Loading... Please wait</td></tr>");
            console.log("getTableTarif");
        },
        success: function (data) {
            $('tbody#getTarif').html(data);

        },
        error: function (jqXHR, ajaxOption, errorThrown) {
            console.log(jqXHR.responseText);
        }
    });
}

function getTableNotaItem(a) {
    $.ajax({
        url: base_url+"layanan/getNotaItem",
        type: "POST",
        data: {
            reg_unit: a
        },
        beforeSend: function () {
            $('tbody#getNotaItem').html("<tr><td colspan=10>Loading... Please wait</td></tr>");
        },
        success: function (data) {
            $('tbody#getNotaItem').html(data);
        },
        error: function (jqXHR, ajaxOption, errorThrown) {
            console.log(jqXHR.responseText);
        }
    });
}

function pilihTarif(a, b, c, d, e, f, g) {
            
    var cekKelas = false;
    //alert(g);
    if (idKelas == g || g == "0") {
        cekKelas = true;
    } else {
        //alert(g +"!="+idKelas);
        var x = confirm("Kelas tarif tidak sama dengan Kelas Layanan yang digunakan Pasien !\nApakah anda tetap lanjutkan proses ini?");
        if (x) {
            cekKelas = true;
        }

    }
    if (cekKelas) {
        $('#id_tarif').val(a);
        $('#txtTindakan').val(b);
        $('#jasa_sarana').val(c);
        $('#jasa_pelayanan').val(d);
        $('#txtTarif').val(formatter.format(e));
        $('#kategori_id').val(f);
        $('#kelas_id').val(g);
        $('#divCariTarif').hide();
        $('#txtQty').focus();
    }
    $('#divDetailNota').show();
}

function simpanTindakan() {
    var b = $('#id_daftar').val();
    var c = $('#reg_unit').val();
    var d = $('#nomr').val();
    var e = $('#id_tarif').val();
    var f = $('#txtTindakan').val();
    var g = $('#jasa_sarana').val();
    var h = $('#jasa_pelayanan').val();
    var i = $('#txtTarif').val().replace('.', '').replace('.', '').replace('.', '');
    var j = $('#txtQty').val();
    var k = $('#kategori_id').val();
    var l = $('#kelas_id').val();
    var n = $('#txtSubTotal').val().replace('.', '').replace('.', '');
    var o = $('#cmbDokter').val();
    if (b == "") {
        alert('Ops. No.Reg RS kosong. Pastikan No.Reg RS anda tampil. atau refresh kembali browser anda');
    } else if (c == "") {
        alert('Ops. No.Reg Unit kosong. Pastikan No.Reg Unit anda tampil. atau refresh kembali browser anda');
    } else if (d == "") {
        alert('Ops. No.MR kosong. Pastikan No.MR anda tampil. atau refresh kembali browser anda');
    } else if (e == "") {
        alert('Ops. Kode tarif kosong. Coba ulangi entri tindakan atau refresh kembali browser anda');
    } else if (f == "") {
        alert('Ops. Tindak atau layanan kosong. Coba ulangi entri tindakan atau refresh kembali browser anda');
    } else if (i == "" || b == "0" || isNaN(i)) {
        alert('Ops. Pastikan tarif terisi dengan benar.');
    } else if (j == "" || j == "0" || isNaN(j)) {
        alert('Ops. Pastikan jumlah tindakan terisi dengan benar.');
        $('#txtQty').focus();
    } else if (k == "") {
        alert('Ops. Group tarif BPJS kosong. Pastikan Group tarif BPJS terisi dengan baik pada master tarif.');
    } else if (l == "") {
        alert('Ops. Kelas layanan kosong. Pastikan Kelas layanan terisi dengan baik pada master tarif.');
    } else {

        var postData = {}
        postData["id_daftar"] = b;
        postData["reg_unit"] = c;
        postData["nomr"] = d;
        postData["id_tarif"] = e;
        postData["layanan"] = f;
        postData["jasa_sarana"] = g;
        postData["jasa_pelayanan"] = h;
        postData["tarif_layanan"] = i;
        postData["jml"] = j;
        postData["kategori_id"] = k;
        postData["kelas_id"] = l;
        postData["sub_total_tarif"] = n;
        postData["id_dokter"] = o;

        $.ajax({
            url: base_url +'layanan/simpanItem',
            type: "POST",
            data: $.param(postData),
            dataType: "JSON",
            success: function (data) {
                if (data.code == 200) {
                    getTableNotaItem(c);
                    $('#id_tarif').val('');
                    $('#txtTindakan').val('');
                    $('#jasa_sarana').val('0');
                    $('#jasa_pelayanan').val('0');
                    $('#txtTarif').val('0');
                    $('#txtQty').val('0');
                    $('#txtSubTotal').val('0');
                    $('#kategori_id').val('');
                    $('#kelas_id').val('');
                    //$('#cmbDokter').val('').trigger('change');
                    $('#txtTindakan').focus();
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

function simpanDiagnosa() {
    var url;
    url = base_url +"layanan/simpan_diagnosa";
    var formData = new FormData($('#diagnosa')[0]);
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        beforeSend: function () {
            // Handle the beforeSend event
            $('#loading').show();
        },
        success: function (data) {
            $('#loading').hide();
            if (data["status"] == true) {
                alert(data["message"]);
                location.reload();
            } else {
                alert(data["message"]);
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            $('#loading').hide();
            alert("gagal Menyimpan Data");
        }
    });
}

function kembali(a) {
    var url = base_url +'layanan/tambah?kLok='+a;
    window.location.href = url;
}

function cetakNota(a) {
    var url = base_url + 'layanan/cetak?kode='+a; ;
    window.open(url);
}

function hapusItem(a, b) {
    var pulang = $('#pulang').val();
    //alert(pulang);
    if (pulang <= 0) {
        var x = confirm("Apakah anda yakin akan menghapus item ini?");
        if (x) {
            $.ajax({
                url: base_url +"layanan/hapusItem",
                type: "POST",
                data: {
                    idx: a
                },
                dataType: "JSON",
                success: function (data) {

                    if (data.code == 200) {
                        getTableNotaItem(b);
                    } else {
                        alert(data.message);
                    }
                },
                error: function (jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }

            });
        }
    } else {
        alert("Maaf Pasien yang sudah dipulangkan, dan transaksi sudah tidak bisa dihapus");
    }

}

function permintaanPenunjang() {
    

    $('#pp_id_daftar').val(a);
    $('#ppv_id_daftar').html(a);

    $('#pp_reg_unit').val(b);
    $('#ppv_reg_unit').html(b);

    $('#pp_nomr').val(c);
    $('#ppv_nomr').html(c);

    $('#pp_nama').val(e);
    $('#ppv_nama').html(e);

    $('#pp_ruang_pengirim').val(d);
    $('#pp_nama_ruang_pengirim').val(f);

    $('#ppv_ruang_pengirim').html(f);

    $('#id_penunjang').prop('selectedIndex', 0);
    $('#dokter_pengirim').prop('selectedIndex', 0);

    $('#keterangan').val('');
    $('#modalPermintaanPenunjang').modal('show');
    hapusTindakan(0);

    getTindakan(0);
    listTindakan(0);
    getJenisPemeriksaan();
}

function rujukInternal() {
    

    $('#ri_id_daftar').val(a);
    $('#riv_id_daftar').html(a);

    $('#ri_reg_unit').val(b);
    $('#riv_reg_unit').html(b);

    $('#ri_nomr').val(c);
    $('#riv_nomr').html(c);

    $('#ri_nama').val(e);
    $('#riv_nama').html(e);

    $('#ri_ruang_pengirim').val(d);
    $('#ri_nama_ruang_pengirim').val(f);
    $('#riv_ruang_pengirim').html(f);

    $('#id_ruang_rujukan').prop('selectedIndex', 0);
    $('#ri_dokter_pengirim').prop('selectedIndex', 0);

    $('#ri_keterangan').val('');
    $('#modalRujukInternal').modal('show');
}

function simpanRujukInternal() {
    var formdata = {}
    formdata['id_daftar'] = $('#ri_id_daftar').val();
    formdata['reg_unit'] = $('#ri_reg_unit').val();
    formdata['nomr'] = $('#ri_nomr').val();
    formdata['nama_pasien'] = $('#ri_nama').val();
    formdata['ruang_pengirim'] = $('#ri_ruang_pengirim').val();
    formdata['nama_ruang_pengirim'] = $('#ri_nama_ruang_pengirim').val();
    formdata['id_poli'] = $('#id_ruang_rujukan').val();
    formdata['nama_poli'] = $('#id_ruang_rujukan :selected').html();
    formdata['dokter_pengirim'] = $('#ri_dokter_pengirim').val();
    formdata['nama_dokter_pengirim'] = $('#ri_dokter_pengirim :selected').html();
    formdata['keterangan'] = $('#ri_keterangan').val();
    $.ajax({
        url: base_url + 'layanan/simpanRujukInternal',
        type: "POST",
        data: formdata,
        dataType: "JSON",
        success: function (data) {
            alert(data.message);
            if (data.code == 200) {
                $('#modalRujukInternal').modal('hide');
            }
            getRujukanInternal(formdata['reg_unit']);
        },
        error: function (jqXHR, ajaxOption, errorThrown) {
            console.log(jqXHR.responseText);
        }
    });
}

function pilih(a) {
    //alert(a + b);
    var url = base_url + 'layanan/entry_nota?idx='+ a;
    window.location.href = url;
}

function pilihPasien(a) {
    //alert(a + b);
    var url = base_url + 'erm/detail?idx=' + a;
    window.location.href = url;
}

/** Registrasi Pindah Kamar */
function registrasiPasien(a) {
    var xRuang = $('#nama_ruang').val();
    var b = $('#ruang_id').val();
    var x = confirm("Apakah anda yakin akan meregistrasikan pasien ini di " + xRuang + "?");
    if (x) {
        if (a == "") {
            alert('Ops. Id rujukan internal tidak ditemukan. coba ulangi lagi');
        } else if (b == "") {
            alert('Ops. Kode ruang tidak ditemukan. coba ulangi lagi');
        } else {
            var postData = {}
            postData["no_permintaan"] = a;
            postData["id_ruang"] = b;
            console.log(postData);
            $.ajax({
                url: base_url +'layanan/registrasipindahkamar',
                type: "POST",
                data: postData,
                dataType: "JSON",
                beforeSend: function() {
                    // setting a timeout
                    $('#terima'+a).prop('disabled', true);
                },
                success: function (data) {
                    if (data.code == 200) {
                        var url = base_url +'layanan/reg_success?uid=' + data.url;
                        window.location.href = url;
                    } else if (data.code == 201) {
                        console.log(data);
                        var y = confirm(data.message + "\nApakah anda ingin mendaftarkan pasien ini ke kamar lain");
                        if (y) {
                            $('#dokter_pengirim').val(data.data.dokter_pengirim);
                            $('#id_daftar').val(data.data.id_daftar);
                            $('#id_ruang').val(data.data.id_ruang);
                            $('#idx').val(data.data.idx);
                            $('#kamar_pengirim').val(data.data.kamar_pengirim);
                            $('#kelas_layanan').val(data.data.kelas_layanan);
                            $('#id_kelas').val(data.data.id_kelas);
                            $('#keterangan').val(data.data.keterangan);
                            $('#nama_dokter_pengirim').val(data.data.nama_dokter_pengirim);
                            $('#nama_kamar_pengirim').val(data.data.nama_kamar_pengirim);
                            $('#nama_pasien').val(data.data.nama_pasien);
                            $('#nama_ruang').val(data.data.nama_ruang);
                            $('#nama_ruang_pengirim').val(data.data.nama_ruang_pengirim);
                            $('#nomr').val(data.data.nomr);
                            $('#reg_unit').val(data.data.reg_unit);
                            $('#ruang_pengirim').val(data.data.ruang_pengirim);
                            $('#tgl_minta').val(data.data.tgl_minta);

                            $('#lblnomr').html(data.data.nomr);
                            $('#lblnamapasien').html(data.data.nama_pasien);
                            $('#lbliddaftar').html(data.data.id_daftar);
                            $('#lblregunit').html(data.data.reg_unit);
                            $('#lblkelaslayanan').html(data.data.kelas_layanan);
                            $('#lblruangpengirim').html(data.data.nama_ruang_pengirim + "(" + data.data.nama_kamar_pengirim + ")");
                            $('#lblruangpenerima').html(data.data.nama_ruang);
                            $('#lblnama_dokter_pengirim').html(data.data.nama_dokter_pengirim);
                            getKamar();
                            $('#modalpindahkamar').modal('show');
                        }

                        //alert('Pilih Kamar');
                    } else {
                        alert(data.message)
                    }
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                },
                complete: function() {
                    $('#terima'+a).prop('disabled', false);
                },
            });
        }
    }
}
function registrasikan() {
    var postData = {}
    postData["no_permintaan"] = $('#idx').val();
    postData["id_ruang"] = $('#id_ruang').val();
    postData["id_kelas"] = $('#id_kelas').val();
    postData["kelas_layanan"] = $('#id_kelas :selected').html();
    postData["id_kamar"] = $('#id_kamar').val();
    postData["nama_kamar"] = $('#id_kamar :selected').html();
    $.ajax({
        url: base_url + 'layanan/registrasikan',
        type: "POST",
        data: postData,
        dataType: "JSON",
        beforeSend: function() {
            // setting a timeout
            $('#terima').prop('disabled', true);
        },
        success: function (data) {
            if (data.code == 200) {
                var url = base_url + 'layanan/reg_success?uid=' + data.url;
                window.location.href = url;
            } else if (data.code == 201) {
                console.log(data);
                var y = confirm(data.message + "\nApakah anda ingin mendaftarkan pasien ini ke kamar lain");
                if (y) {
                    $('#dokter_pengirim').val(data.data.dokter_pengirim);
                    $('#id_daftar').val(data.data.id_daftar);
                    $('#id_ruang').val(data.data.id_ruang);
                    $('#idx').val(data.data.idx);
                    $('#kamar_pengirim').val(data.data.kamar_pengirim);
                    $('#kelas_layanan').val(data.data.kelas_layanan);
                    $('#id_kelas').val(data.data.id_kelas);

                    $('#keterangan').val(data.data.keterangan);
                    $('#nama_dokter_pengirim').val(data.data.nama_dokter_pengirim);
                    $('#nama_kamar_pengirim').val(data.data.nama_kamar_pengirim);
                    $('#nama_pasien').val(data.data.nama_pasien);
                    $('#nama_ruang').val(data.data.nama_ruang);
                    $('#nama_ruang_pengirim').val(data.data.nama_ruang_pengirim);
                    $('#nomr').val(data.data.nomr);
                    $('#reg_unit').val(data.data.reg_unit);
                    $('#ruang_pengirim').val(data.data.ruang_pengirim);
                    $('#tgl_minta').val(data.data.tgl_minta);

                    $('#lblnomr').html(data.data.nomr);
                    $('#lblnamapasien').html(data.data.nama_pasien);
                    $('#lbliddaftar').html(data.data.id_daftar);
                    $('#lblregunit').html(data.data.reg_unit);
                    $('#lblkelaslayanan').html(data.data.kelas_layanan);
                    $('#lblruangpengirim').html(data.data.nama_ruang_pengirim + "(" + data.data.nama_kamar_pengirim + ")");
                    $('#lblruangpenerima').html(data.data.nama_ruang);
                    $('#lblnama_dokter_pengirim').html(data.data.nama_dokter_pengirim);
                    $('#modalpindahkamar').modal('show');
                    getKamar();
                }

                //alert('Pilih Kamar');
            } else {
                alert(data.message)
            }
        },
        error: function (jqXHR, ajaxOption, errorThrown) {
            console.log(jqXHR.responseText);
        },
        complete: function() {
            $('#terima').prop('disabled', false);
        },
    });
}
/**Registrasi Pasien Rujuk nternal */
function registrasiPasienRujukInternal(a) {
    var xRuang = $('#nama_ruang').val();
    var b = $('#ruang_id').val();
    var x = confirm("Apakah anda yakin akan meregistrasikan pasien ini di " + xRuang + "?");
    if (x) {
        if (a == "") {
            alert('Ops. Id rujukan internal tidak ditemukan. coba ulangi lagi');
        } else if (b == "") {
            alert('Ops. Kode ruang tidak ditemukan. coba ulangi lagi');
        } else {
            var url = base_url+"rujuk_internal/detail_rujukan/" + a;
            console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    $('#modal_rujukan_internal').modal('show');
                    $('#ri_no_permintaan').val(data["idx"]);
                    $('#ri_id_daftar').val(data["id_daftar"]);
                    $('#ri_reg_unit').val(data["reg_unit"]);
                    $('#ri_nomr').val(data["nomr"]);
                    $('#ri_nama_pasien').val(data["nama_pasien"]);
                    $('#ri_ruang_pengirim').val(data["ruang_pengirim"]);
                    $('#ri_nama_ruang_pengirim').val(data["nama_ruang_pengirim"]);
                    $('#ri_id_poli').val(data["id_poli"]);
                    $('#ri_nama_poli').val(data["nama_poli"]);
                    $('#ri_dokter_pengirim').val(data["dokter_pengirim"]);
                    $('#ri_nama_dokter_pengirim').val(data["nama_dokter_pengirim"]);
                    $('#ri_keterangan').val(data["keterangan"]);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Gagal Saat Pengambilan data");
                }
            });
            
        }
    }

}
/**Registrasi Pasien permintaan Penunjang */
function persetujuanRegistrasi(a) {
    $('#no_permintaan').val(a);
    var b = $('#ruang_id').val();
    $('#ruangid').val(b);
    permintaanTindakan(a);
    $('#persetujuanRegistrasi').modal('show');
}
function permintaanTindakan(a) {
    var url = base_url+"layanan/tindakan/"+ a;
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: { get_param: 'value' },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            $('#jmldata').val(data["row_count"]);
            //alert(data["row_count"]);

            if (data["status"] == true) {
                var tindakan = data["data"];
                console.log(tindakan);
                var jmlData = tindakan.length;
                var tabel = "";
                var start = 0;
                //Create Tabel
                var id_jenis = '';
                for (var i = 0; i < jmlData; i++) {
                    start++;
                    if (id_jenis != tindakan[i]["idjenispemeriksaan"]) {
                        tabel += '<tr >';
                        tabel += "<td colspan='2'><b>" + tindakan[i]["jenispemeriksaan"] + "</b></td>";
                        tabel += "</tr>";
                    }
                    tabel += '<tr >';
                    tabel += "<td>" + start + "</td>";
                    tabel += "<td>" + tindakan[i]["nama_pemeriksaan"] + "</td>";
                    tabel += "</tr>";
                    id_jenis = tindakan[i]["idjenispemeriksaan"];
                }
                $('#permintaan-tindakan').html(tabel);

            }
        }
    });
}
function registrasiPasienPermintaanPenunjang() {
    var a = $('#no_permintaan').val();
    var xRuang = $('#nama_ruang').val();
    var b = $('#ruang_id').val();
    var c = $('#dokterJaga').val();
    var d = $('#dokterJaga :selected').html();
    var e = "";
    
    var x = confirm("Apakah anda yakin akan meregistrasikan pasien ini di " + xRuang + "?");
    if (x) {
        if (a == "") {
            alert('Ops. Id permintaan penunjang tidak ditemukan. coba ulangi lagi');
        } else if (b == "") {
            alert('Ops. Kode ruang tidak ditemukan. coba ulangi lagi');
        } else {
            
            var formData = new FormData($('#formPenunjang')[0]);
            $.ajax({
                url: base_url + "layanan/registrasiPasienpp",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'JSON',
                success: function (data) {
                    if (data.code == 200) {
                        console.clear();
                        console.log(data);
                        var url = base_url + 'layanan/entry_nota?idx=' + data.idx;
                        window.location.href = url;
                    } else {
                        alert(data.message)
                    }
                },
                error: function (jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        }
    }
}

function batal(idx) {
    var url = base_url + "layanan/datapindah/" + idx;
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data["status"] == true) {
                $('#formbatal').modal('show');
                var row = data.data;
                $('#id_daftar').val(row.id_daftar);
                $('#reg_unit').val(row.reg_unit);
                $('#id_pindah_ranap').val(row.idx);
            } else {
                alert(data["message"]);
            }
        },
        error: function (jqXHR, ajaxOption, errorThrown) {
            console.log(jqXHR.responseText);
        }
    });
}
function BatalPindahRanap() {

    var formdata = {}
    formdata['id_daftar'] = $('#id_daftar').val();
    formdata['reg_unit'] = $('#reg_unit').val();
    formdata['id_pindah_ranap'] = $('#id_pindah_ranap').val();
    formdata['alasan'] = $('#alasan').val();
    $.ajax({
        url:  base_url+"layanan/batalpindah",
        type: "POST",
        data: formdata,
        dataType: "JSON",
        success: function (data) {
            alert(data.message);
            if (data.status == true) {
                $('#formbatal').modal('hide');
                riwayatPindah(1);
                //location.reload();
            } else {
                alert(data.message);
            }
        },
        error: function (jqXHR, ajaxOption, errorThrown) {
            console.log(jqXHR.responseText);
        }
    });
}
function batalPulang(a) {
    var x = confirm("Apakah anda yakin akan membatalkan status pulang pasien ini ?");
    if (x) {
        if (a == "") {
            alert('Ops. Kode tidak ditemukan. coba ulangi lagi');
        } else {
            $.ajax({
                url: base_url+"layanan/batalPulang",
                type: "POST",
                data: { idx: a },
                dataType: "JSON",
                success: function (data) {
                    if (data.code == 200) {
                        riwayatPulang(1);
                    } else {
                        alert(data.message)
                    }
                },
                error: function (jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        }
    }
}

function daftarkanPasien() {
    var a = $('#ri_no_permintaan').val();
    var b = $('#ruang_id').val();
    var c = $('#dokterJaga').val();
    var d = $('#dokterJaga :selected').html();
    if (a == '') {
        alert("No Permintaan Masih Kosong");
        return false;
    }
    if (b == '') {
        alert("Ruangan tidak diketahui");
        return false;
    }
    if(c=='') {
        alert("Dokter Belum Dipilih");
        return  false;
    }
    if (d == '') {
        alert("Dokter Belum Dipilih");
        return false;
    }
    var postData = {}
    postData["no_permintaan"] = a;
    postData["id_ruang"] = b;
    postData["dokterJaga"] = c;
    postData["namaDokterJaga"] = d;
    console.clear();
    console.log(postData);
    $.ajax({
        url: base_url + 'layanan/registrasiPasien',
        type: "POST",
        data: postData,
        dataType: "JSON",
        success: function (data) {
            if (data.code == 200) {
                var url = base_url + 'layanan/entry_nota?idx=' + data.idx ;
                window.location.href = url;
            } else {
                console.log(data)
                alert(data.message)
            }
        },
        error: function (jqXHR, ajaxOption, errorThrown) {
            console.log(jqXHR.responseText);
        }
    });
}

function getKamar() {
    var idruang = $('#id_ruang').val();
    var kelasid = $('#id_kelas').val();
    var url = base_url + "erm/kamar/" + idruang + "/" + kelasid;
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        beforeSend: function () {
            // setting a timeout
            $('#id_kamar').html('');;
        },
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
                    if (terisi >= r[i]["jml_tt"]) row += "<option value='" + r[i]["id_kamar"] + "' disabled>" + r[i]["nama_kamar"] + "(Penuh)</option>";
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

function ulangi(){
    var nomorantri=$('#nomorantri').val();
    var panggil=parseInt(nomorantri)
    bunyi(panggil)
    tampilkanPesan('info','Nomor Antrian '+panggil+" dipanggil...")
}
function panggil(){
    // var nomorantri=$('#nomorantri').val();
    // var panggil=parseInt(nomorantri)+1;
    // $('#nomorantri').val(panggil);
    var url = base_url + "erm/panggilantrean";
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        beforeSend: function () {
            // setting a timeout
            $('#btnPanggil').prop("disabled",true);
			$('#iconPanggil').removeClass('fa fa-arrow-right')
			$('#iconPanggil').addClass('fa fa-spinner fa-spin')
        },
        success: function (data) {
            if (data.status == true) {
                $('#nomorantri').val(data.no_antrian_poly)
                bunyi(data.no_antrian_poly)
                // tampilkanPesan('success',data["message"]);
                tampilkanPesan('info','Nomor Antrian '+data.no_antrian_poly+" dipanggil...")
            } else {
                tampilkanPesan('error',data["message"]);
            }
        },
        error: function(xhr) { // if error occured
				
            // $('#error').modal('show');
            // $('#xhr').html(xhr.responseText)
            $('#btnPanggil').prop("disabled",false);
            $('#iconPanggil').removeClass('fa fa-spinner fa-spin')
            $('#iconPanggil').addClass('fa fa-arrow-right')
        },
        complete: function() {
            $('#btnPanggil').prop("disabled",false);
            $('#iconPanggil').removeClass('fa fa-spinner fa-spin')
            $('#iconPanggil').addClass('fa fa-arrow-right')
        },
    });

    // bunyi(panggil)
    
}
function bunyi(panggil){
    totalwaktu=0;
    //MAINKAN SUARA NOMOR URUT
    setTimeout(function() {
        document.getElementById('bell').pause();
        document.getElementById('bell').currentTime=0;
        document.getElementById('bell').play();
    }, totalwaktu);
    totalwaktu=50;

    var bell = document.getElementById("bell");
    bell.onended = function() {
        setTimeout(function() {
            document.getElementById('suarabelnomorurut').pause();
            document.getElementById('suarabelnomorurut').currentTime=0;
            document.getElementById('suarabelnomorurut').play();
        }, totalwaktu);
    }
    var suarabelnomorurut = document.getElementById("suarabelnomorurut");
    if(panggil<10){
        suarabelnomorurut.onended = function() {
            setTimeout(function() {
                document.getElementById('angka'+panggil).pause();
                document.getElementById('angka'+panggil).currentTime=0;
                document.getElementById('angka'+panggil).play();
            }, totalwaktu);
        }
        var selesai = document.getElementById('angka'+panggil);
    } else if(panggil==10){
        suarabelnomorurut.onended = function() {
            setTimeout(function() {
                document.getElementById('sepuluh').pause();
                document.getElementById('sepuluh').currentTime=0;
                document.getElementById('sepuluh').play();
            }, totalwaktu);
        }
        var selesai = document.getElementById('sepuluh');
    }else if(panggil==11){
        suarabelnomorurut.onended = function() {
            setTimeout(function() {
                document.getElementById('sebelas').pause();
                document.getElementById('sebelas').currentTime=0;
                document.getElementById('sebelas').play();
            }, totalwaktu);
        }
        var selesai = document.getElementById('sebelas');
    }else if(panggil<20){
        var angka=panggil%10;
        suarabelnomorurut.onended = function() {
            setTimeout(function() {
                document.getElementById('angka'+angka).pause();
                document.getElementById('angka'+angka).currentTime=0;
                document.getElementById('angka'+angka).play();
            }, totalwaktu);
        }
        var angka1=document.getElementById('angka'+angka);
        angka1.onended = function() {
            setTimeout(function() {
                document.getElementById('belas').pause();
                document.getElementById('belas').currentTime=0;
                document.getElementById('belas').play();
            }, totalwaktu);
        }
        var selesai = document.getElementById('belas');
    }else if(panggil<100){
        var mod10=panggil%10;
        // alert (mod10)
        if(mod10==0){
            var angka=panggil/10;
            suarabelnomorurut.onended = function() {
                setTimeout(function() {
                    document.getElementById('angka'+angka).pause();
                    document.getElementById('angka'+angka).currentTime=0;
                    document.getElementById('angka'+angka).play();
                }, totalwaktu);
            }
            var angka1=document.getElementById('angka'+angka);
            angka1.onended = function() {
                setTimeout(function() {
                    document.getElementById('puluh').pause();
                    document.getElementById('puluh').currentTime=0;
                    document.getElementById('puluh').play();
                }, totalwaktu);
            }
            var selesai = document.getElementById('puluh');
        }else{
            var angka=(panggil-mod10)/10;
            suarabelnomorurut.onended = function() {
                setTimeout(function() {
                    document.getElementById('angka'+angka).pause();
                    document.getElementById('angka'+angka).currentTime=0;
                    document.getElementById('angka'+angka).play();
                }, totalwaktu);
                
            }
            var angka1=document.getElementById('angka'+angka);
            angka1.onended = function() {
                setTimeout(function() {
                    document.getElementById('puluh').pause();
                    document.getElementById('puluh').currentTime=0;
                    document.getElementById('puluh').play();
                }, totalwaktu);
            }

            var angka2=document.getElementById('puluh');
            angka2.onended = function() {
                setTimeout(function() {
                    document.getElementById('puluhan'+mod10).pause();
                    document.getElementById('puluhan'+mod10).currentTime=0;
                    document.getElementById('puluhan'+mod10).play();
                }, totalwaktu);
            }
            var selesai = document.getElementById('puluhan'+mod10);
        }
    }else if(panggil==100){
        suarabelnomorurut.onended = function() {
            setTimeout(function() {
                document.getElementById('seratus').pause();
                document.getElementById('seratus').currentTime=0;
                document.getElementById('seratus').play();
            }, totalwaktu);
        }
        var selesai = document.getElementById('seratus');
    }else if(panggil<1000){
        var mod100=panggil%100;
        if(mod100==0){
            var angka=panggil/100;
            if(panggil<200){
                suarabelnomorurut.onended = function() {
                    setTimeout(function() {
                        document.getElementById('seratus').pause();
                        document.getElementById('seratus').currentTime=0;
                        document.getElementById('seratus').play();
                    }, totalwaktu);
                }
                var selesai=document.getElementById('seratus');
            }else{
                suarabelnomorurut.onended = function() {
                    setTimeout(function() {
                        document.getElementById('angka'+angka).pause();
                        document.getElementById('angka'+angka).currentTime=0;
                        document.getElementById('angka'+angka).play();
                    }, totalwaktu);
                }
                var angka1=document.getElementById('angka'+angka);
                angka1.onended = function() {
                    setTimeout(function() {
                        document.getElementById('ratus').pause();
                        document.getElementById('ratus').currentTime=0;
                        document.getElementById('ratus').play();
                    }, totalwaktu);
                }
                var selesai = document.getElementById('ratus');
            }

            
        }else{
            if(panggil<200){
                suarabelnomorurut.onended = function() {
                    setTimeout(function() {
                        document.getElementById('seratus').pause();
                        document.getElementById('seratus').currentTime=0;
                        document.getElementById('seratus').play();
                    }, totalwaktu);
                }
                var ratus=document.getElementById('seratus');
            }else{
                var angka=(panggil-mod100)/100;
                suarabelnomorurut.onended = function() {
                    setTimeout(function() {
                        document.getElementById('angka'+angka).pause();
                        document.getElementById('angka'+angka).currentTime=0;
                        document.getElementById('angka'+angka).play();
                    }, totalwaktu);
                }
                var angka1=document.getElementById('angka'+angka);
                angka1.onended = function() {
                    setTimeout(function() {
                        document.getElementById('ratus').pause();
                        document.getElementById('ratus').currentTime=0;
                        document.getElementById('ratus').play();
                    }, totalwaktu);
                }
                var ratus=document.getElementById('ratus');
            }
            // alert(mod100)
            if(mod100<10){
                
                ratus.onended = function() {
                    setTimeout(function() {
                        document.getElementById('ratusan'+mod100).pause();
                        document.getElementById('ratusan'+mod100).currentTime=0;
                        document.getElementById('ratusan'+mod100).play();
                    }, totalwaktu);
                }
                var selesai = document.getElementById('ratusan'+mod100);
            }else if(mod100==10){
                // var ratus=document.getElementById('ratus');
                ratus.onended = function() {
                    setTimeout(function() {
                        document.getElementById('sepuluh').pause();
                        document.getElementById('sepuluh').currentTime=0;
                        document.getElementById('sepuluh').play();
                    }, totalwaktu);
                }
                var selesai = document.getElementById('sepuluh');
            }else if(mod100==11){
                // var ratus=document.getElementById('ratus');
                ratus.onended = function() {
                    setTimeout(function() {
                        document.getElementById('sebelas').pause();
                        document.getElementById('sebelas').currentTime=0;
                        document.getElementById('sebelas').play();
                    }, totalwaktu);
                }
                var selesai = document.getElementById('sebelas');
            }else if(mod100<20){
                var angkaratusan=parseInt(mod100)%10;
                // var ratus=document.getElementById('ratus');
                ratus.onended = function() {
                    setTimeout(function() {
                        document.getElementById('ratusan'+angkaratusan).pause();
                        document.getElementById('ratusan'+angkaratusan).currentTime=0;
                        document.getElementById('ratusan'+angkaratusan).play();
                    }, totalwaktu);
                }
                var belas=document.getElementById('ratusan'+angkaratusan);
                belas.onended = function() {
                    setTimeout(function() {
                        document.getElementById('belas').pause();
                        document.getElementById('belas').currentTime=0;
                        document.getElementById('belas').play();
                    }, totalwaktu);
                }
                var selesai = document.getElementById('belas');
            }else{
                var mod10=mod100%10;
                // var ratus=document.getElementById('ratus');
                var angkaratusan=(mod100-mod10)/10;
                if(mod10==0){
                    // alert(angkaratusan)
                    ratus.onended = function() {
                        setTimeout(function() {
                            document.getElementById('ratusan'+angkaratusan).pause();
                            document.getElementById('ratusan'+angkaratusan).currentTime=0;
                            document.getElementById('ratusan'+angkaratusan).play();
                        }, totalwaktu);
                    }
                    var puluh=document.getElementById('ratusan'+angkaratusan);
                    puluh.onended = function() {
                        setTimeout(function() {
                            document.getElementById('puluh').pause();
                            document.getElementById('puluh').currentTime=0;
                            document.getElementById('puluh').play();
                        }, totalwaktu);
                    }
                    var selesai = document.getElementById('puluh');
                }else{
                    ratus.onended = function() {
                        setTimeout(function() {
                            document.getElementById('ratusan'+angkaratusan).pause();
                            document.getElementById('ratusan'+angkaratusan).currentTime=0;
                            document.getElementById('ratusan'+angkaratusan).play();
                        }, totalwaktu);
                    }
                    var puluh=document.getElementById('ratusan'+angkaratusan);
                    puluh.onended = function() {
                        setTimeout(function() {
                            document.getElementById('puluh').pause();
                            document.getElementById('puluh').currentTime=0;
                            document.getElementById('puluh').play();
                        }, totalwaktu);
                    }
                    var angka=document.getElementById('puluh');
                    angka.onended = function() {
                        setTimeout(function() {
                            document.getElementById('angka'+mod10).pause();
                            document.getElementById('angka'+mod10).currentTime=0;
                            document.getElementById('angka'+mod10).play();
                        }, totalwaktu);
                    }
                    var selesai=document.getElementById('angka'+mod10);
                }
                
            }
        }
    }

    selesai.onended = function() {
        setTimeout(function() {
            document.getElementById('poliklinik').pause();
            document.getElementById('poliklinik').currentTime=0;
            document.getElementById('poliklinik').play();
        }, totalwaktu);
    }

    var ruang = document.getElementById('poliklinik');
    ruang.onended = function() {
        setTimeout(function() {
            document.getElementById('ruang').pause();
            document.getElementById('ruang').currentTime=0;
            document.getElementById('ruang').play();
        }, totalwaktu);
    }
}