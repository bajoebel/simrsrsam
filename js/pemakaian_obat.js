function urldecode(str) {
    return decodeURIComponent((str + '').replace(/%(?![\da-f]{2})/gi, function () {
        return '%25'
    }).replace(/\+/g, '%20'))
}
function getBarangjual(start = 0) {
    var cara_bayar = $('#ID_CARA_BAYAR').val();
    var show = $('#show_barang').val();
    var keyword = $('#keyword').val();
    var lokasi = $('#KDLOKASI').val();
    
    if (keyword.length > 1) {
        $('#list-temp').hide();
        if (show == 0) {
            $('#barang').show();
            $('#show_barang').val("1");
            
        }else{
            $('#list-temp').show();
        }
    }
    var qkode = $('#qkode').val();
    var qnama = $('#qnama').val();
    var qsatuan = $('#qsatuan').val();
    var qkategori = $('#qkategori').val();
    if (lokasi == "") {
        var url = base_url + "search/barang?start=" + start + "&kode=" + qkode + "&nama=" + qnama + "&satuan=" + qsatuan + "&kategori=" + qkategori + "&keyword=" + keyword;
        console.log(url);
    } else {
        var url = base_url + "search/barang/" + lokasi + "?start=" + start + "&kode=" + qkode + "&nama=" + qnama + "&satuan=" + qsatuan + "&kategori=" + qkategori + "&keyword=" + keyword;
        console.log(url);
    }
    var bg = "";
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: { get_param: 'value' },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            $('#jmldata').val(data["row_count"]);
            if (data["status"] == true) {
                var barang = data["data"];
                var jmlData = barang.length;
                var limit = data["limit"]
                var tabel = "";
                //Create Tabel
                for (var i = 0; i < jmlData; i++) {
                    start++;
                    if (parseInt(barang[i]["JSTOK"]) <= 0) bg = "style='background:#e70f0f; color:#fff'"; else bg = "";
                    tabel += '<tr onclick=\'setBarangJual("' + barang[i]["KDBRG"] + '","' + barang[i]["NMBRG"] + '","' + barang[i]["NMSATUAN"] + '","' + barang[i]["NMKTBRG"] + '","' + barang[i]["JSTOK"] + '","' + barang[i]["HJUAL"] + '")\' ' + bg + '>';
                    tabel += "<td>" + barang[i]["KDBRG"] + "</td>";
                    tabel += "<td>" + barang[i]["NMBRG"] + "</td>";
                    tabel += "<td>" + barang[i]["JSTOK"] + " <b>" + barang[i]["NMSATUAN"] + "</b></td>";
                    tabel += "<td>" + barang[i]["NMKTBRG"] + "</td>";

                    //if(cara_bayar>1 || cara_bayar<7) tabel+="<td class='text-right'>Rp. "+barang[i]["HMODAL"]+"</td>";
                    //else tabel+="<td class='text-right'>Rp. "+barang[i]["HJUAL"]+"</td>";
                    tabel += "<td class='text-right'>Rp. " + barang[i]["HJUAL"] + "</td>";
                    tabel += '<td class=\'text-right\'>';
                    tabel += '<button type=\'button\' class=\'btn btn-success btn-xs\' id="pilih' + i + '" onclick=\'setBarangJual("' + barang[i]["KDBRG"] + '","' + barang[i]["NMBRG"] + '","' + barang[i]["NMSATUAN"] + '","' + barang[i]["NMKTBRG"] + '","' + barang[i]["JSTOK"] + '","' + barang[i]["HJUAL"] + '")\'><span class=\'fa fa-check\' ></span></button>';
                    tabel += '</td>';
                    tabel += "</tr>";
                }
                $('#data-barang').html(tabel);
                //Create Pagination
                if (data["row_count"] <= limit) {
                    $('#pagination').html("");
                } else {
                    var pagination = "";
                    var btnIdx = "";
                    jmlPage = Math.ceil(data["row_count"] / limit);
                    offset = data["start"] % limit;
                    curIdx = Math.ceil((data["start"] / data["limit"]) + 1);
                    prev = (curIdx - 2) * data["limit"];
                    next = (curIdx) * data["limit"];

                    var curSt = (curIdx * data["limit"]) - jmlData;
                    var st = start;
                    var btn = "btn-default";
                    var lastSt = (jmlPage * data["limit"]) - jmlData
                    var btnFirst = "<button class='btn btn-default btn-sm' type='button' onclick='getBarangjual(0,\"" + lokasi + "\")'><span class='fa fa-angle-double-left'></span></button>";
                    if (curIdx > 1) {
                        var prevSt = ((curIdx - 1) * data["limit"]) - jmlData;
                        btnFirst += "<button class='btn btn-default btn-sm' type='button' onclick='getBarangjual(" + prevSt + ",\"" + lokasi + "\")'><span class='fa fa-angle-left'></span></button>";
                    }

                    var btnLast = "";
                    if (curIdx < jmlPage) {
                        var nextSt = ((curIdx + 1) * data["limit"]) - jmlData;
                        btnLast += "<button class='btn btn-default btn-sm' type='button' onclick='getBarangjual(" + nextSt + ",\"" + lokasi + "\")'><span class='fa fa-angle-right'></span></button>";
                    }
                    btnLast += "<button class='btn btn-default btn-sm' type='button' onclick='getBarangjual(" + lastSt + ",\"" + lokasi + "\")'><span class='fa fa-angle-double-right'></span></button>";

                    if (jmlPage >= 5) {
                        if (curIdx >= 2) {
                            var idx_start = curIdx - 1;
                            var idx_end = idx_start + 4;
                            if (idx_end >= jmlPage) idx_end = jmlPage;
                        } else {
                            var idx_start = 1;
                            var idx_end = 5;
                        }
                        for (var j = idx_start; j <= idx_end; j++) {
                            st = (j * data["limit"]) - jmlData;
                            if (curSt == st) btn = "btn-success"; else btn = "btn-default";
                            btnIdx += "<button class='btn " + btn + " btn-sm' type='button' onclick='getBarangjual(" + st + ",\"" + lokasi + "\")'>" + j + "</button>";
                        }
                    } else {
                        for (var j = 1; j <= jmlPage; j++) {
                            st = (j * data["limit"]) - jmlData;
                            if (curSt == st) btn = "btn-success"; else btn = "btn-default";
                            btnIdx += "<button class='btn " + btn + " btn-sm' type='button' onclick='getBarangjual(" + st + ",\"" + lokasi + "\")'>" + j + "</button>";
                        }
                    }
                    pagination += btnFirst + btnIdx + btnLast;
                    $('#pagination').html("Showing 11 to 20 of 1234 " + '<div class="btn-group">' + pagination + "</div>");
                }
            }
        }
    });
}


function cariBarang(start = 0, lokasi = "") {

    var show = $('#show_barang').val();
    //kosongkanObjTemp();
    if (show == 0) {
        $('#barang').show();
        $('#show_barang').val("1");
        $('#qkode').val("");
        $('#qnama').val("");
        $('#qbarang').val("");
        $('#qsatuan').val("");
        $('#qkategori').val("");
        $('#qkode').focus();
        getBarang(start, lokasi);
    } else {
        $('#barang').hide();
        $('#show_barang').val("0");
    }
}

function pilihLokasi(idx,nama){
    $('#KDLOKASI').val(idx);
    $('#NMLOKASI').val(nama);
    $('#namalokasi').html(nama);
    $('.small-box').removeClass('bg-green');
    $('.small-box').addClass('bg-red');
    $('#shorcut' + idx).removeClass('bg-red');
    $('#shorcut'+idx).addClass('bg-green');
    
    //alert(jns_layanan);
    $('#transaksi').show();
    var jns_layanan = $('#JNS_LAYANAN').val();
    if (jns_layanan == "RI") $('#pagi').focus();
    else $('#NORESEP').focus();
}
function getBarang(start = 0, lokasi = "") {
    var show = $('#show_barang').val();
    var keyword = $('#keyword').val();
    if (keyword.length > 1) {
        if (show == 0) {
            $('#barang').show();
            $('#show_barang').val("1");
        }
    }
    var qkode = $('#qkode').val();
    var qnama = $('#qnama').val();
    var qsatuan = $('#qsatuan').val();
    var qkategori = $('#qkategori').val();
    if (lokasi == "") {
        var url = base_url + "search/barang?start=" + start + "&kode=" + qkode + "&nama=" + qnama + "&satuan=" + qsatuan + "&kategori=" + qkategori + "&keyword=" + keyword;
        console.log(url);
    } else {
        var url = base_url + "search/barang/" + lokasi + "?start=" + start + "&kode=" + qkode + "&nama=" + qnama + "&satuan=" + qsatuan + "&kategori=" + qkategori + "&keyword=" + keyword;
        console.log(url);
    }

    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: { get_param: 'value' },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            $('#jmldata').val(data["row_count"]);
            if (data["status"] == true) {
                var barang = data["data"];
                var jmlData = barang.length;
                var limit = data["limit"]
                var tabel = "";
                //Create Tabel
                for (var i = 0; i < jmlData; i++) {
                    start++;
                    if (lokasi == "") tabel += '<tr onclick=\'setBarang("' + barang[i]["KDBRG"] + '","' + barang[i]["NMBRG"] + '","' + barang[i]["NMSATUAN"] + '","' + barang[i]["NMKTBRG"] + '")\' >';
                    else tabel += '<tr onclick=\'setBarangmutasi("' + barang[i]["KDBRG"] + '","' + barang[i]["NMBRG"] + '","' + barang[i]["NMSATUAN"] + '","' + barang[i]["JSTOK"] + '")\' >';
                    tabel += "<td>" + barang[i]["KDBRG"] + "</td>";
                    tabel += "<td>" + barang[i]["NMBRG"] + "</td>";
                    tabel += "<td>" + barang[i]["NMSATUAN"] + "</td>";
                    if (lokasi == "") tabel += "<td>" + barang[i]["NMKTBRG"] + "</td>";
                    else tabel += "<td>" + barang[i]["JSTOK"] + "</td>";
                    tabel += '<td class=\'text-right\'>';
                    if (lokasi == "") tabel += '<button type=\'button\' class=\'btn btn-success btn-xs\' id="pilih' + i + '" onclick=\'setBarang("' + barang[i]["KDBRG"] + '","' + barang[i]["NMBRG"] + '","' + barang[i]["NMSATUAN"] + '","' + barang[i]["NMKTBRG"] + '")\'><span class=\'fa fa-check\' ></span></button>';
                    else tabel += '<button type=\'button\' class=\'btn btn-success btn-xs\' id="pilih' + i + '" onclick=\'setBarangmutasi("' + barang[i]["KDBRG"] + '","' + barang[i]["NMBRG"] + '","' + barang[i]["NMSATUAN"] + '","' + barang[i]["JSTOK"] + '")\'><span class=\'fa fa-check\' ></span></button>';
                    tabel += '</td>';
                    tabel += "</tr>";
                }
                $('#data-barang').html(tabel);
                //Create Pagination
                if (data["row_count"] <= limit) {
                    $('#pagination').html("");
                } else {
                    var pagination = "";
                    var btnIdx = "";
                    jmlPage = Math.ceil(data["row_count"] / limit);
                    offset = data["start"] % limit;
                    curIdx = Math.ceil((data["start"] / data["limit"]) + 1);
                    prev = (curIdx - 2) * data["limit"];
                    next = (curIdx) * data["limit"];

                    var curSt = (curIdx * data["limit"]) - jmlData;
                    var st = start;
                    var btn = "btn-default";
                    var lastSt = (jmlPage * data["limit"]) - jmlData
                    var btnFirst = "<button class='btn btn-default btn-sm' type='button' onclick='getBarang(0)'><span class='fa fa-angle-double-left'></span></button>";
                    if (curIdx > 1) {
                        var prevSt = ((curIdx - 1) * data["limit"]) - jmlData;
                        btnFirst += "<button class='btn btn-default btn-sm' type='button' onclick='getBarang(" + prevSt + ")'><span class='fa fa-angle-left'></span></button>";
                    }

                    var btnLast = "";
                    if (curIdx < jmlPage) {
                        var nextSt = ((curIdx + 1) * data["limit"]) - jmlData;
                        btnLast += "<button class='btn btn-default btn-sm' type='button' onclick='getBarang(" + nextSt + ")'><span class='fa fa-angle-right'></span></button>";
                    }
                    btnLast += "<button class='btn btn-default btn-sm' type='button' onclick='getBarang(" + lastSt + ")'><span class='fa fa-angle-double-right'></span></button>";

                    if (jmlPage >= 5) {
                        if (curIdx >= 2) {
                            var idx_start = curIdx - 1;
                            var idx_end = idx_start + 4;
                            if (idx_end >= jmlPage) idx_end = jmlPage;
                        } else {
                            var idx_start = 1;
                            var idx_end = 5;
                        }
                        for (var j = idx_start; j <= idx_end; j++) {
                            st = (j * data["limit"]) - jmlData;
                            if (curSt == st) btn = "btn-success"; else btn = "btn-default";
                            btnIdx += "<button class='btn " + btn + " btn-sm' type='button' onclick='getBarang(" + st + ")'>" + j + "</button>";
                        }
                    } else {
                        for (var j = 1; j <= jmlPage; j++) {
                            st = (j * data["limit"]) - jmlData;
                            if (curSt == st) btn = "btn-success"; else btn = "btn-default";
                            btnIdx += "<button class='btn " + btn + " btn-sm' type='button' onclick='getBarang(" + st + ")'>" + j + "</button>";
                        }
                    }
                    pagination += btnFirst + btnIdx + btnLast;
                    $('#pagination').html("Showing 11 to 20 of 1234 " + '<div class="btn-group">' + pagination + '</div>');
                }
            }
        }
    });
}

function kosongkanObjTemp() {
    $('#KDBRG').val('');
    $('#NMBRG').val('');
    $('#JSTOK').val('0');
    $('#HJUAL').val('0');
    $('#JMLJUAL').val('0');
    $('#sbm_pagi').val('');
    $('#sbm_siang').val('');
    $('#sbm_malam').val('');
    $('#stm_pagi').val('');
    $('#stm_siang').val('');
    $('#stm_malam').val('');
    $('#sbm_pagi').val('');
    $('#sbm_siang').val('');
    $('#malam').val('');
    $('#injeksi').val('');
    $('#mandiri').val('');
    $('#ap_injeksi').val('');
    $('#ap_mandiri').val('');
    $('#DISKON').val('0');
    $('#DISKON_P').val('0');
    //$('#R').val('750');
    $('#SUBTOTAL').val('0');
    $('#jenis_obat').val('1');
    $('#jmlHari').val('');
    $('#jmlSatuanAP').val('');
    $('#satuanAP').val('1');
    $('#cara_pakai').val('1');
    $('#waktu1').val('0');
    $('#waktu2').val('');
    $('#waktu3').val('');
    $('#keterangan').val('1'); 
    $('#expdate').val('');

    $('#setAturanPakai').html("Set AP");
}

function simpanTemp(){
    var JNS_LAYANAN = $('#JNS_LAYANAN').val();
    if(JNS_LAYANAN=="RI"){
        var JNSRESEP = $("input[name='JNSRESEP']:checked").val();
    }else{
        var JNSRESEP = "Resep Pulang";
    }
    
    var waktu1 = $('#waktu1').val();
    var wm = "";
    if (waktu1 == "0" || waktu1 == "") {
        wm = "";
    } else {
        wm = waktu1 + " Jam ";
    }
    var wm3 = "";
    var waktu3 = $('#waktu3').val();
    if (waktu3 == "") {
        wm3 = "";
    } else {
        wm3 = $('#waktu3 :selected').html() + ",";
    }
    //alert(wm3);
    var ket = "";
    var keterangan = $('#keterangan').val();
    if (keterangan == "" || keterangan == "Lainnya") {
        ket = "";
    } else {
        ket = $('#keterangan :selected').html();
    }
    if (JNSRESEP == 'Resep Pulang') {
        satuan_ap=$('#satuanAP').val() + "#" + $('#satuanAP :selected').html();
        if (ket == "Lainnya") ket = $('#keterangan :selected').html()
        if (parseInt(wm) == 0) wm = "";
        var ap_jmlhari = $('#jmlHari').val();
        var ap_jmlsatuan = $('#jmlSatuanAP').val();
        var ap_satuanap = $('#satuanAP :selected').html();
        if (ap_satuanap == 'Lainnya') ap_satuanap = $('#saplainnya').val();
        var ap_carapakai = $('#cara_pakai :selected').html();
        if (ap_carapakai == 'Lainnya') ap_carapakai = $('#cplainnya').val();
        var ap_rangewaktupakai = $('#waktu1').val(); //Berapa jam sebelum atau sesudah makan
        if(parseInt(ap_rangewaktupakai)==0) ap_rangewaktupakai=""; else ap_rangewaktupakai+=" Jam ";

        var ap_saatpakai = $('#waktu2 :selected').html();
        if (ap_saatpakai == 'Lainnya') ap_saatpakai = $('#wppakailainnya').val();
        var ap_keteranganwaktupakai = $('#waktu3 :selected').html();
        if (ap_keteranganwaktupakai == 'Lainnya') ap_keteranganwaktupakai = $('#wppakailainnya3').val();
        else if (ap_keteranganwaktupakai =='Pilih Waktu Pakai') ap_keteranganwaktupakai="";
        var ap_keterangan = $('#keterangan :selected').html();
        if (ap_keterangan == 'Lainnya') ap_keterangan = $('#ketlainnya').val();
        else if (ap_keterangan =='Pilih Keterangan') ap_keterangan="";
        var ap = ap_carapakai+" "+ ap_jmlhari + " x " + ap_jmlsatuan +" "+ ap_satuanap +" Sehari,";
        ap += ap_rangewaktupakai + ap_saatpakai +" " + ap_keteranganwaktupakai +" - "+ap_keterangan;
        

        /*var ap = $('#jmlHari').val() + " x Sehari, " + $('#jmlSatuanAP').val() + " " +
            $('#satuanAP :selected').html() + ", " + $('#cara_pakai :selected').html() + " " +
            wm + $('#waktu2 :selected').html() + ", " + wm3 + ket;*/
        var JMLJUAL = $('#JMLJUAL').val();
    } else {
        satuan_ap = $('#satuanAPharian').val() + "#" + $('#satuanAP :selected').html();
        var jns_obat = $('#jns_obat').val();
        var ap = '';
        var sbm_pagi = $('#sbm_pagi').val().replace(',', '').replace(',', '').replace(',', '');
        var sbm_siang = $('#sbm_siang').val().replace(',', '').replace(',', '').replace(',', '');
        var sbm_malam = $('#sbm_malam').val().replace(',', '').replace(',', '').replace(',', '');
        var stm_pagi = $('#stm_pagi').val().replace(',', '').replace(',', '').replace(',', '');
        var stm_siang = $('#stm_siang').val().replace(',', '').replace(',', '').replace(',', '');
        var stm_malam = $('#stm_malam').val().replace(',', '').replace(',', '').replace(',', '');
        var malam = $('#malam').val().replace(',', '').replace(',', '').replace(',', '');
        var mandiri = $('#mandiri').val().replace(',', '').replace(',', '').replace(',', '');
        var injeksi = $('#injeksi').val().replace(',', '').replace(',', '').replace(',', '');
        sbm_pagi = (sbm_pagi == '' || isNaN(sbm_pagi)) ? 0 : sbm_pagi;
        sbm_siang = (sbm_siang == '' || isNaN(sbm_pagi)) ? 0 : sbm_pagi;
        sbm_malam = (sbm_pagi == '' || isNaN(sbm_pagi)) ? 0 : sbm_pagi;
        stm_pagi = (stm_pagi == '' || isNaN(stm_pagi)) ? 0 : stm_pagi;
        stm_siang = (stm_siang == '' || isNaN(stm_siang)) ? 0 : stm_siang;
        stm_malam = (stm_malam == '' || isNaN(stm_malam)) ? 0 : stm_malam;
        malam = (malam == '' || isNaN(malam)) ? 0 : malam;
        mandiri = (mandiri == '' || isNaN(mandiri)) ? 0 : mandiri;
        injeksi = (injeksi == '' || isNaN(injeksi)) ? 0 : injeksi;
        if (jns_obat == 1) {
            var JMLJUAL = parseInt(sbm_pagi) + parseInt(sbm_siang) + parseInt(sbm_malam) + parseInt(stm_pagi) + parseInt(stm_siang) + parseInt(stm_malam) + parseInt(malam) ;
        } else if (jns_obat == 2) {
            var JMLJUAL = parseInt(mandiri);
            ap = $('#ap_mandiri').val();
        } else {
            var JMLJUAL = parseInt(injeksi);
            ap = $('#ap_injeksi').val();
        }
    }

    var formItems = {};
    formItems['KDBRG'] = $('#KDBRG').val();
    formItems['NMBRG'] = $('#NMBRG').val();
    formItems['JSTOK'] = $('#JSTOK').val();
    formItems['HJUAL'] = $('#HJUAL').val();
    formItems['JMLJUAL'] = JMLJUAL;
    formItems['DISKON'] = $('#DISKON').val();
    formItems['R'] = $('#R').val();
    formItems['SUBTOTAL'] = $('#SUBTOTAL').val();
    formItems['JNS_RESEP'] = JNSRESEP;
    formItems['AP'] = ap;
    
    formItems['SBM_PAGI'] =sbm_pagi
    formItems['SBM_SIANG'] = sbm_siang
    formItems['SBM_MALAM'] = sbm_malam
    formItems['STM_PAGI'] = stm_pagi
    formItems['STM_SIANG'] = stm_siang
    formItems['STM_MALAM'] = stm_malam
    formItems['MALAM'] = malam
    formItems['MANDIRI'] = mandiri
    formItems['INJEKSI'] = injeksi
    formItems['AP_MANDIRI'] = $('#ap_mandiri').val()
    formItems['AP_INJEKSI'] = $('#ap_injeksi').val()
    //$('#dokterJaga :selected').html()
    formItems['AP_JENISOBAT'] = $('#jenis_obat').val() + "#" + $('#jenis_obat :selected').html();
    formItems['AP_JMLHARI'] = $('#jmlHari').val();
    formItems['AP_JMLSATUAN'] = $('#jmlSatuanAP').val();
    formItems['AP_SATUAN'] = satuan_ap;
    var carapakai = $('#cara_pakai').val();
    if(parseInt(carapakai)>0) formItems['AP_CARAPAKAI'] = $('#cara_pakai').val() + "#" + $('#cara_pakai :selected').html();
    else formItems['AP_CARAPAKAI'] ="0#-";
    var waktujumlah = $('#waktu1').val();
    if (waktujumlah != "" || waktujumlah!='0') formItems['AP_WAKTUJML'] = $('#waktu1').val(); //Dalam Jam
    else formItems['AP_WAKTUJML'] = "";
    var waktupakai = $('#waktu2').val();
    if(waktupakai!="") formItems['AP_WAKTUPAKAI'] = $('#waktu2').val() + "#" + $('#waktu2 :selected').html();
    else formItems['AP_WAKTUPAKAI'] ="0#-";
    var waktuket = $('#waktu3').val();
    if (waktuket != "") formItems['AP_WAKTUKET'] = $('#waktu3').val() + "#" + $('#waktu3 :selected').html();
    else formItems['AP_WAKTUKET'] ="0#-";
    var keterangan = $('#keterangan').val();
    if (keterangan != "") formItems['AP_KET'] = $('#keterangan').val() + "#" + $('#keterangan :selected').html();
    else formItems['AP_KET'] = "0#-";
    formItems['AP_EXPDATE'] = $('#expdate').val();
    console.log(formItems);
    if (formItems['KDBRG'] == "") {
        $('#ADDBARANG').click();
    } else if (formItems['JSTOK'] == "" || formItems['JSTOK'] == "0") {
        alert("Stok tidak boleh kosong");
    } else if (formItems['HJUAL'] == "" || formItems['HJUAL'] == "0") {
        alert("Harga jual tidak boleh kosong");
    } else if (formItems['JMLJUAL'] == "" || formItems['JMLJUAL'] == "0") {
        alert("Jumlah jual masih kosong");
        $('#JMLJUAL').focus();
    } else if (formItems['R'] == "" || formItems['R'] == "0") {
        alert("Nilai R tidak boleh kosong. Silahkan refresh browser anda!");
    } else if (formItems['SUBTOTAL'] == "" || formItems['SUBTOTAL'] == "0") {
        alert("Subtotal tidak boleh kosong. Silahkan refresh browser anda!");
    } else {
        $.ajax({
            url: base_url+"pemakaian_obat/simpanTemp",
            type: "POST",
            data: formItems,
            dataType: "JSON",
            beforeSend: function () {
                // setting a timeout
                $('#simpanTemp').prop('disabled', true);
                //$('.divBlocking').show();
            },
            success: function (data) {
                
                getTemp();
                $('#temptable').show();
                if (data.code == 200) {
                    var masih = confirm("Apakah Masih ada data?");
                    if (masih == true) {
                        $('#keyword').focus();
                        $('#barang').hide();
                    } else {
                        $('#simpan').focus();
                        $('#barang').hide();
                    }
                    kosongkanObjTemp();
                    //$("#modal_transaksi").modal("hide");
                } else {
                    alert(data.message);
                }
            },
            error: function (xhr, ajaxOption, thrownError) {
                console.log('Response : ' + thrownError);
            },
            complete: function () {
                $('#simpanTemp').prop('disabled', false);
                //$('.divBlocking').hide();
            },
        });
    }
}

function getTemp() {
    $('#temptable').show();
    $('#formobat').hide();
    $('#list-temp').show();
    $.ajax({
        url: base_url+"pemakaian_obat/getTemp",
        beforeSend: function () {
            $('tbody#getTemp').html("<tr><td colspan=5><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
        },
        success: function (data) {
            $('tbody#getTemp').html(data);
            getTotal();
        },
        error: function (jqXHR, ajaxOption, errorThrown) {
            $('tbody#getTemp').html('<tr><td colspan=5>Data tidak ditemukan</td></tr>');
            console.log(jqXHR.responseText);
        }
    });
}

function getTotal() {
    $.ajax({
        url: base_url+"pemakaian_obat/getTotalTemp",
        dataType: "JSON",
        beforeSend: function () {
            $('#GRANDTOTAL').val("0");
        },
        success: function (data) {
            $('#GRANDTOTAL').val(data.TOTAL);
        },
        error: function (jqXHR, ajaxOption, errorThrown) {
            $('#GRANDTOTAL').val("0");
            console.log(jqXHR.responseText);
        }
    });
}

function kosongkanObjEntry() {
    $('#REG_UNIT').val('');
    $('#NOMR').val('');
    $('#ID_DAFTAR').val('');
    $('#NMPASIEN').val('');
    $('#KDRUANGAN').val('');
    $('#NMRUANGAN').val('');
    $('#JNSLAYANAN').val('');
    $('#ID_CARA_BAYAR').val('');
    $('#CARA_BAYAR').val('');
    $('#KDDOKTER').val('').trigger('change');
    $('#NORESEP').val('');
    $('#TGLRESEP').val('');
    $('#TGLJUAL').val('');
    $('#KETJL').val('');
}

function emptyTemp() {
    $.ajax({
        url: base_url+"pemakaian_obat/emptyTemp",
        success: function (data) {
            getTemp();
        },
        error: function (jqXHR, ajaxOption, errorThrown) {
            console.log(jqXHR.responseText);
        }
    });
}

function simpanTransaksi(){
    var url = base_url+"pemakaian_obat/simpan";
    var jnslayanan = $('#JNS_LAYANAN').val();
    if(jnslayanan=="RI"){
        var jnsresep = $("input[name='JNSRESEP']:checked").val();
    }else var jnsresep = 'Resep Pulang';
    var formdata = {}
    formdata['REG_UNIT'] = $('#REG_UNIT').val();
    formdata['IDPENDAFTARAN'] = $('#IDPENDAFTARAN').val();
    formdata['ID_DAFTAR'] = $('#ID_DAFTAR').val();
    formdata['NOMR'] = $('#NOMR').val();
    formdata['NMPASIEN'] = $('#NMPASIEN').val();
    formdata['KDRUANGAN'] = $('#KDRUANGAN').val();
    formdata['NMRUANGAN'] = $('#NMRUANGAN').val();
    formdata['JNSLAYANAN'] = $('#JNS_LAYANAN').val();
    formdata['ID_CARA_BAYAR'] = $('#ID_CARA_BAYAR').val();
    formdata['CARA_BAYAR'] = $('#CARA_BAYAR').val();
    formdata['KDLOKASI'] = $('#KDLOKASI').val();
    formdata['NMLOKASI'] = $('#NMLOKASI').val();
    formdata['KDDOKTER'] = $('#KDDOKTER').val();
    formdata['NMDOKTER'] = $('#KDDOKTER').val();
    formdata['NORESEP'] = $('#NORESEP').val();
    formdata['TGLRESEP'] = $('#TGLRESEP').val();
    formdata['TGLJUAL'] = $('#TGLJUAL').val();
    formdata['KETJL'] = $('#KETJL').val();
    formdata['IDUSER'] = $('#IDUSER').val();
    formdata['JNSRESEP'] = jnsresep;
    console.clear();
    console.log(formdata);
    if (formdata['REG_UNIT'] == "") {
        alert("Registrasi unit tidak boleh kosong. Silahkan pilih data pendaftaran pasien");
    } else if (formdata['ID_DAFTAR'] == "") {
        alert("Registrasi RS tidak boleh kosong. Silahkan pilih data pendaftaran pasien");
    } else if (formdata['NOMR'] == "") {
        alert("No. MR tidak boleh kosong. Silahkan pilih data pendaftaran pasien");
    } else if (formdata['NMPASIEN'] == "") {
        alert("Nama Pasien tidak boleh kosong. Silahkan pilih data pendaftaran pasien");
    } else if (formdata['KDRUANGAN'] == "" || formdata['NMRUANGAN'] == "") {
        alert("Poli/Ruang tidak boleh kosong. Silahkan pilih data pendaftaran pasien");
    } else if (formdata['JNSLAYANAN'] == "") {
        alert("Jenis pelayanan tidak boleh kosong. Silahkan pilih data pendaftaran pasien");
    } else if (formdata['ID_CARA_BAYAR'] == "" || formdata['CARA_BAYAR'] == "") {
        alert("Jenis pasien tidak boleh kosong. Silahkan pilih data pendaftaran pasien");
    } else if (formdata['KDLOKASI'] == "" || formdata['NMLOKASI'] == "") {
        alert("Lokasi tidak ditemukan. Silahkan refresh browser anda");
    } else if (formdata['KDDOKTER'] == "") {
        alert("Dokter belum dipilih. Silahkan pilih dokter");
        $('#KDDOKTER').focus();
    } else if (formdata['NORESEP'] == "") {
        alert("No resep tidak boleh kosong");
        $('#NORESEP').focus();
    } else if (formdata['TGLRESEP'] == "") {
        alert("Tanggal resep tidak boleh kosong");
        $('#TGLRESEP').focus();
    } else if (formdata['TGLJUAL'] == "") {
        alert("Tanggal jual tidak boleh kosong");
        $('#TGLJUAL').focus();
    } else if (formdata['KDLOKASI'] == "") {
        alert("Lokasi Asal barang tidak ditemukan. Silahkan refresh browser anda.");
    } else {
        var formData = new FormData($('#form')[0]);
        console.clear();
        console.log(formData);
        $.ajax({
            url : url,
            type: "POST",
            data : formData,
            processData: false,
            contentType: false,
            dataType: 'JSON',
            beforeSend: function () {
                // setting a timeout
                $('.divBlocking').show();
                $('#simpan').prop('disabled', true);
            },
            success: function(data)
            {
                if (data.code == 200) {
                    //kosongkanObjEntry();
                    kosongkanObjTemp();
                    emptyTemp();
                    getTemp();
                    console.log(data);
                    //alert("berhasil Simpan");
                    swal({
                        title: "Peringatan",
                        text: data.message,
                        type: "warning",
                        timer: 5000
                    });
                    window.open(base_url+ 'pemakaian_obat/cetakTicket?kode=' + data.kdjl);
                } else {
                    //alert(data.message);
                    swal({
                        title: "Peringatan",
                        text: data.message,
                        type: "warning",
                        timer: 5000
                    });
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal({
                title: "Terjadi Kesalahan ",
                text: "Gagal Menyimpan Data",
                type: "error",
                timer: 5000
                });
            },
            complete: function () {
                $('#simpan').prop('disabled', false);
                $('.divBlocking').hide();
            },
        });
        }
}

/*function simpanTransaksi(){
    var jnslayanan = $('#JNS_LAYANAN').val();
    if(jnslayanan=="RI"){
        var jnsresep = $("input[name='JNSRESEP']:checked").val();
    }else var jnsresep = 'Resep Pulang';
    var formdata = {}
    formdata['REG_UNIT'] = $('#REG_UNIT').val();
    formdata['ID_DAFTAR'] = $('#ID_DAFTAR').val();
    formdata['NOMR'] = $('#NOMR').val();
    formdata['NMPASIEN'] = $('#NMPASIEN').val();
    formdata['KDRUANGAN'] = $('#KDRUANGAN').val();
    formdata['NMRUANGAN'] = $('#NMRUANGAN').val();
    formdata['JNSLAYANAN'] = $('#JNS_LAYANAN').val();
    formdata['ID_CARA_BAYAR'] = $('#ID_CARA_BAYAR').val();
    formdata['CARA_BAYAR'] = $('#CARA_BAYAR').val();
    formdata['KDLOKASI'] = $('#KDLOKASI').val();
    formdata['NMLOKASI'] = $('#NMLOKASI').val();
    formdata['KDDOKTER'] = $('#KDDOKTER').val();
    formdata['NMDOKTER'] = $('#KDDOKTER').val();
    formdata['NORESEP'] = $('#NORESEP').val();
    formdata['TGLRESEP'] = $('#TGLRESEP').val();
    formdata['TGLJUAL'] = $('#TGLJUAL').val();
    formdata['KETJL'] = $('#KETJL').val();
    formdata['JNSRESEP'] = jnsresep;
    console.clear();
    console.log(formdata);
    if (formdata['REG_UNIT'] == "") {
        alert("Registrasi unit tidak boleh kosong. Silahkan pilih data pendaftaran pasien");
    } else if (formdata['ID_DAFTAR'] == "") {
        alert("Registrasi RS tidak boleh kosong. Silahkan pilih data pendaftaran pasien");
    } else if (formdata['NOMR'] == "") {
        alert("No. MR tidak boleh kosong. Silahkan pilih data pendaftaran pasien");
    } else if (formdata['NMPASIEN'] == "") {
        alert("Nama Pasien tidak boleh kosong. Silahkan pilih data pendaftaran pasien");
    } else if (formdata['KDRUANGAN'] == "" || formdata['NMRUANGAN'] == "") {
        alert("Poli/Ruang tidak boleh kosong. Silahkan pilih data pendaftaran pasien");
    } else if (formdata['JNSLAYANAN'] == "") {
        alert("Jenis pelayanan tidak boleh kosong. Silahkan pilih data pendaftaran pasien");
    } else if (formdata['ID_CARA_BAYAR'] == "" || formdata['CARA_BAYAR'] == "") {
        alert("Jenis pasien tidak boleh kosong. Silahkan pilih data pendaftaran pasien");
    } else if (formdata['KDLOKASI'] == "" || formdata['NMLOKASI'] == "") {
        alert("Lokasi tidak ditemukan. Silahkan refresh browser anda");
    } else if (formdata['KDDOKTER'] == "") {
        alert("Dokter belum dipilih. Silahkan pilih dokter");
        $('#KDDOKTER').focus();
    } else if (formdata['NORESEP'] == "") {
        alert("No resep tidak boleh kosong");
        $('#NORESEP').focus();
    } else if (formdata['TGLRESEP'] == "") {
        alert("Tanggal resep tidak boleh kosong");
        $('#TGLRESEP').focus();
    } else if (formdata['TGLJUAL'] == "") {
        alert("Tanggal jual tidak boleh kosong");
        $('#TGLJUAL').focus();
    } else if (formdata['KDLOKASI'] == "") {
        alert("Lokasi Asal barang tidak ditemukan. Silahkan refresh browser anda.");
    } else {
        $.ajax({
            url: base_url+"pemakaian_obat/simpan",
            type: "POST",
            data: formdata,
            dataType: "JSON",
            beforeSend: function () {
                // setting a timeout
                $('#simpan').prop('disabled', true);
            },
            success: function (data) {
                if (data.code == 200) {
                    //kosongkanObjEntry();
                    kosongkanObjTemp();
                    emptyTemp();
                    getTemp();
                    console.log(data);
                    alert("berhasil Simpan");
                    window.open(base_url+ 'pemakaian_obat/cetakTicket?kode=' + data.message);
                } else {
                    alert(data.message);
                }
            },
            error: function (jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            },
            complete: function () {
                $('#simpan').prop('disabled', false);
            },
        });
    }
}*/

function enter_keyword(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    //console.log(charCode);
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        if (evt.keyCode == 13) {
            var jmldata = $('#jmldata').val();
            if (jmldata == 1) {
                $('#pilih0').focus();
            } else {
                $('#qkode').focus();
            }

        }
    }
    return true;
}
function enter_kode(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    //console.log(charCode);
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        if (evt.keyCode == 13) {
            var jmldata = $('#jmldata').val();
            if (jmldata == 1) {
                $('#pilih0').focus();
            } else {
                $('#qnama').focus();
            }
        }
    }
    return true;
}
function enter_nama(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    //console.log(charCode);
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        if (evt.keyCode == 13) {
            var jmldata = $('#jmldata').val();
            if (jmldata == 1) {
                $('#pilih0').focus();
            } else {
                $('#qsatuan').focus();
            }
        }
    }
    return true;
}
function enter_satuan(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    //console.log(charCode);
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        if (evt.keyCode == 13) {
            var jmldata = $('#jmldata').val();
            if (jmldata == 1) {
                $('#pilih0').focus();
            } else {
                $('#qkategori').focus();
            }
        }
    }
    return true;
}

function enter_kategori(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    //console.log(charCode);
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        if (evt.keyCode == 13) {
            $('#pilih0').focus();
        }
    }
    return true;
}

function setBarang(kode, nama, satuan, kategori) {
    //alert(kode);
    var Supllier = $('#KDSUPPLIER').val();
    var NOFAKTUR = $('#NOFAKTUR').val();
    var TGLFAKTUR = $('#TGLFAKTUR').val();
    var TGLTERIMA = $('#TGLTERIMA').val();
    var JTEMPO = $('#JTEMPO').val();
    var PEMBAYARAN = $('#PEMBAYARAN').val();
    if (Supllier == "") {
        alert("Supplier Masih Kosong");
        $('#keyword').val("");
        $('#show_barang').val("0");
        $('#barang').hide();
        $('#KDSUPPLIER').select2('open');
        return false;
    }

    if (NOFAKTUR == "") {
        alert("No faktur Masih Kosong");
        $('#keyword').val("");
        $('#show_barang').val("0");
        $('#barang').hide();
        $('#NOFAKTUR').focus();
        return false;
    }

    if (TGLFAKTUR == "") {
        alert("Tanggal faktur Masih Kosong");
        $('#keyword').val("");
        $('#show_barang').val("0");
        $('#barang').hide();
        $('#TGLFAKTUR').focus();
        return false;
    }

    if (TGLTERIMA == "") {
        alert("Tanggal Terima Masih Kosong");
        $('#keyword').val("");
        $('#show_barang').val("0");
        $('#barang').hide();
        $('#TGLTERIMA').focus();
        return false;
    }

    if (PEMBAYARAN == "CREDIT") {
        if (JTEMPO == "") {
            alert("Tanggal faktur Masih Kosong");
            $('#keyword').val("");
            $('#show_barang').val("0");
            $('#barang').hide();
            $('#PEMBAYARAN').focus();
            return false;
        }

    }

    var JENIS_TRANS = $('#JENIS_TRANS').val();
    if (JENIS_TRANS == "2") $('#PPN').val("0.1"); else $('#PPN').val("0");
    $("#modal_transaksi").modal("show");
    $('#KDBRG').val(kode);
    $('#NMBRG').val(urldecode(nama));
    $('#JMLBELI_BOX').val("");
    $('#KONVERSI').val("");
    $('#HBELI_BOX').val("");
    $('#P_DISKON').val("");
    $('#HJUALBOX').val("");
    $('#EXPDATE').val("");
    $('#JMLBELI').val("");
    $('#HBELI').val("");
    $('#HDISKON').val("");
    $('#HJUAL').val("");
    $('#SUBTOTAL').val("");
    $('#JUMLAH_PPN').val("");
    setTimeout(function () { $('#EXPDATE').focus(); }, 500);
    $('#keyword').val("");
    cariBarang(0);
    $('#show_barang').val("0");
    $('#barang').hide();
}

function setBarangmutasi(kode, nama, satuan, stok) {
    var LOKASI_TUJUAN = $('#LOKASI_TUJUAN').val();
    var TGL_MUTASI = $('#TGL_MUTASI').val();

    if (LOKASI_TUJUAN == "") {
        alert("Lakasi Tujuan Masih Kosong");
        $('#keyword').val("");
        $('#show_barang').val("0");
        $('#barang').hide();
        $('#LOKASI_TUJUAN').select2('open');
        return false;
    }

    if (TGL_MUTASI == "") {
        alert("Tanggal Mutasi Masih Kosong");
        $('#keyword').val("");
        $('#show_barang').val("0");
        $('#barang').hide();
        $('#TGL_MUTASI').focus();
        return false;
    }

    $("#modal_transaksi").modal("show");
    $('#KDBRG').val(kode);
    $('#NMBRG').val(urldecode(nama));
    $('#JSTOK').val(stok);
    $('#NMSATUAN').val(satuan);
    $('#JMLMT').focus();
    setTimeout(function () { $('#JMLMT').focus(); }, 500);
    $('#JMLMT').val("");
}

function lihatDetailmutasi(kdmt) {
    $("#modal_persetujuan").modal("show");
    var start = 0;
    var url = base_url + "persetujuan_mutasi/detail_mutasi/" + kdmt;
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: { get_param: 'value' },
        success: function (data) {
            //menghitung jumlah data
            console.clear();
            if (data["status"] == true) {
                var barang = data["data"];
                //console.log(barang);
                var jmlData = barang.length;
                var limit = data["limit"]
                var tabel = "";
                //Create Tabel
                for (var i = 0; i < jmlData; i++) {
                    start++;
                    tabel += '<tr>';
                    if (barang[i]["STATUSPENERIMAAN"] == 1) {
                        tabel += "<td style='text-align:center'>";
                        tabel += "<input type='hidden' name='IDX[]' id='IDX" + barang[i]["IDX"] + "' value='" + barang[i]["IDX"] + "'>";
                        tabel += "<input type='hidden' name='KDBRG" + barang[i]["IDX"] + "' id='KDBRG" + barang[i]["IDX"] + "' value='" + barang[i]["KDBRG"] + "'>";
                        tabel += "<input type='hidden' name='KDMT" + barang[i]["IDX"] + "' id='KDMT" + barang[i]["IDX"] + "' value='" + barang[i]["KDMT"] + "'>";
                        tabel += "<input type='hidden' name='NMBRG" + barang[i]["IDX"] + "' id='NMBRG" + barang[i]["IDX"] + "' value='" + barang[i]["NMBRG"] + "'>";
                        tabel += "<input type='hidden' name='HMODAL" + barang[i]["IDX"] + "' id='HMODAL" + barang[i]["IDX"] + "' value='" + barang[i]["HMODAL"] + "'>";
                        tabel += "<input type='hidden' name='TGLBELI" + barang[i]["IDX"] + "' id='TGLBELI" + barang[i]["IDX"] + "' value='" + barang[i]["TGLBELI"] + "'>";
                        tabel += "<input type='hidden' name='JMLMT" + barang[i]["IDX"] + "' id='JMLMT" + barang[i]["IDX"] + "' value='" + barang[i]["JMLMT"] + "'>";
                        tabel += "<input type='checkbox' id='STATUSPENERIMAAN" + barang[i]["IDX"] + "' class='STATUSPENERIMAAN' value='1' onclick='return false' checked >";
                        tabel += "</td>";
                    }
                    else {
                        tabel += "<td style='text-align:center'>";
                        tabel += "<input type='hidden' name='IDX[]' id='IDX' value='" + barang[i]["IDX"] + "'>";
                        tabel += "<input type='hidden' name='KDBRG" + barang[i]["IDX"] + "' id='KDBRG' value='" + barang[i]["KDBRG"] + "'>";
                        tabel += "<input type='hidden' name='KDMT" + barang[i]["IDX"] + "' id='KDMT' value='" + barang[i]["KDMT"] + "'>";
                        tabel += "<input type='hidden' name='NMBRG" + barang[i]["IDX"] + "' id='NMBRG' value='" + barang[i]["NMBRG"] + "'>";
                        tabel += "<input type='hidden' name='HMODAL" + barang[i]["IDX"] + "' id='HMODAL' value='" + barang[i]["HMODAL"] + "'>";
                        tabel += "<input type='hidden' name='TGLBELI" + barang[i]["IDX"] + "' id='TGLBELI' value='" + barang[i]["TGLBELI"] + "'>";
                        tabel += "<input type='hidden' name='JMLMT" + barang[i]["IDX"] + "' id='JMLMT' value='" + barang[i]["JMLMT"] + "'>";
                        tabel += "<input type='checkbox' class='STATUSPENERIMAAN' id='STATUSPENERIMAAN" + barang[i]["IDX"] + "' name='STATUSPENERIMAAN" + barang[i]["IDX"] + "' value='1'>";
                        tabel += "</td>";
                    }
                    tabel += "<td>" + barang[i]["KDBRG"] + "</td>";
                    tabel += "<td>" + barang[i]["NMBRG"] + "</td>";
                    tabel += "<td style='text-align:right'>" + barang[i]["JMLMT"] + "</td>";

                    tabel += "</tr>";
                    //console.log(tabel);
                }
                $('#data-mutasi').html(tabel);

            }
        }
    });
}

function setujui() {
    var url = base_url + "persetujuan_mutasi/setujui";
    //alert('url');
    var formData = new FormData($('#form2')[0]);
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function (data) {
            if (data["status"] == true) {
                if (data["error"] == true) {
                    alert(data["message"]);
                } else {
                    $('#modal_persetujuan').modal('hide');
                    alert(data["message"]);
                }
                getTable();
            }
            else {
                alert(data["message"])
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Gagal Menyimpan Data")
        }
    });
}

function returMutasi(kdmt) {
    $('#modal_retur').modal('show');
    var start = 0;
    var url = base_url + "persetujuan_mutasi/detail_mutasi/" + kdmt;
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: { get_param: 'value' },
        success: function (data) {
            //menghitung jumlah data
            console.clear();
            if (data["status"] == true) {
                var barang = data["data"];
                console.log(barang);
                var jmlData = barang.length;
                var limit = data["limit"]
                var tabel = "";
                //Create Tabel
                if (jmlData > 0) {
                    $('#KDMT').val(barang[0]["KDMT"]);
                    $('#LOKASI_TUJUAN').val(barang[0]["LOKASI_ASAL"]);
                    $('#NAMA_LOKASI_TUJUAN').val(barang[0]["NAMA_LOKASI_ASAL"]);
                    $('#LOKASI_ASAL').val(barang[0]["LOKASI_TUJUAN"]);
                    $('#NAMA_LOKASI_ASAL').val(barang[0]["NAMA_LOKASI_TUJUAN"]);
                    $('#tujuan').html("Dari " + barang[0]["NAMA_LOKASI_TUJUAN"] + " Ke " + barang[0]["NAMA_LOKASI_ASAL"]);
                    for (var i = 0; i < jmlData; i++) {
                        start++;
                        tabel += '<tr>';
                        if (barang[i]["STATUSPENERIMAAN"] == 1) {
                            tabel += "<td style='text-align:center'>";
                            tabel += "<input type='hidden' name='IDX[]' id='IDX" + barang[i]["IDX"] + "' value='" + barang[i]["IDX"] + "'>";
                            tabel += "<input type='hidden' name='KDBRG" + barang[i]["IDX"] + "' id='KDBRG" + barang[i]["IDX"] + "' value='" + barang[i]["KDBRG"] + "'>";
                            tabel += "<input type='hidden' name='KDMT" + barang[i]["IDX"] + "' id='KDMT" + barang[i]["IDX"] + "' value='" + barang[i]["KDMT"] + "'>";
                            tabel += "<input type='hidden' name='NMBRG" + barang[i]["IDX"] + "' id='NMBRG" + barang[i]["IDX"] + "' value='" + barang[i]["NMBRG"] + "'>";
                            tabel += "<input type='hidden' name='HMODAL" + barang[i]["IDX"] + "' id='HMODAL" + barang[i]["IDX"] + "' value='" + barang[i]["HMODAL"] + "'>";
                            tabel += "<input type='hidden' name='TGLBELI" + barang[i]["IDX"] + "' id='TGLBELI" + barang[i]["IDX"] + "' value='" + barang[i]["TGLBELI"] + "'>";
                            tabel += "<input type='hidden' name='JMLMT" + barang[i]["IDX"] + "' id='JMLMT" + barang[i]["IDX"] + "' value='" + barang[i]["JMLMT"] + "'>";
                            tabel += "<input type='hidden' name='SUDAHRETUR" + barang[i]["IDX"] + "' id='SUDAHRETUR" + barang[i]["IDX"] + "' value='" + barang[i]["JMLRET"] + "'>";
                            tabel += start;
                            tabel += "</td>";
                        }

                        tabel += "<td>" + barang[i]["KDBRG"] + "</td>";
                        tabel += "<td>" + barang[i]["NMBRG"] + "</td>";
                        tabel += "<td style='text-align:right'>" + barang[i]["JMLMT"] + "</td>";
                        tabel += "<td style='text-align:right'>" + barang[i]["JMLRET"] + "</td>";
                        tabel += "<td style='text-align:right; width:200px;'>";
                        tabel += "<input type='number' class='form-control input-sm' name='JMLRET" + barang[i]["IDX"] + "' id='JMLRET" + barang[i]["IDX"] + "' value='0' data-inputmask=\"'alias': 'decimal',  'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'\" onkeyup='validasiMutasi(\"" + barang[i]["IDX"] + "\")'>";
                        tabel += "</td>";
                        tabel += "</tr>";
                        //console.log(tabel);
                    }
                } else {
                    tabel += "<tr><td colspan=''>Data Tidak ada</td></tr>"
                }

                $('#data-retur').html(tabel);

            }
        }
    });
}

function validasiMutasi(idx) {
    //alert(idx);
    var SUDAHRETUR = $('#SUDAHRETUR' + idx).val();
    var JMLMT = $('#JMLMT' + idx).val();
    var SISA = parseInt(JMLMT) - parseInt(SUDAHRETUR);
    var JMLRET = $('#JMLRET' + idx).val();
    //alert("JMLRET : " +JMLRET + " SISA : " + SISA);
    if (parseInt(JMLRET) > SISA) {
        alert("Jumlah Retur Tidak boleh melebihi jumlah mutasi")
        $('#JMLRET' + idx).val("0");
    }
    return false;
}
function addReturmutasi() {
    var url = base_url + "persetujuan_mutasi/return_mutasi";
    //alert(url);
    var formData = new FormData($('#form_mutasi_retur')[0]);
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function (data) {
            if (data["status"] == true) {
                if (data["error"] == true) {
                    alert(data["message"]);
                } else {
                    $('#modal_retur').modal('hide');
                    alert(data["message"]);
                }
                getTable();
            }
            else {
                alert(data["message"])
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Gagal Meretur Mutasi")
        }
    });
}

function lihatDetailreturmutasi(kdmt_ret) {
    $("#modal_persetujuan").modal("show");
    var start = 0;
    var url = base_url + "retur_trans_mutasi/detail_retur_mutasi/" + kdmt_ret;
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: { get_param: 'value' },
        success: function (data) {
            //menghitung jumlah data
            console.clear();
            if (data["status"] == true) {
                var barang = data["data"];
                //console.log(barang);
                var jmlData = barang.length;
                var limit = data["limit"]
                var tabel = "";
                //Create Tabel
                for (var i = 0; i < jmlData; i++) {
                    start++;
                    tabel += '<tr>';
                    if (barang[i]["STATUSPERSETUJUAN"] == 1) {
                        tabel += "<td style='text-align:center'>";
                        tabel += "<input type='hidden' name='IDX[]' id='IDX" + barang[i]["IDX"] + "' value='" + barang[i]["IDX"] + "'>";
                        tabel += "<input type='hidden' name='KDBRG" + barang[i]["IDX"] + "' id='KDBRG" + barang[i]["IDX"] + "' value='" + barang[i]["KDBRG"] + "'>";
                        tabel += "<input type='hidden' name='KDMT_RET" + barang[i]["IDX"] + "' id='KDMT_RET" + barang[i]["IDX"] + "' value='" + barang[i]["KDMT_RET"] + "'>";
                        tabel += "<input type='hidden' name='NMBRG" + barang[i]["IDX"] + "' id='NMBRG" + barang[i]["IDX"] + "' value='" + barang[i]["NMBRG"] + "'>";
                        tabel += "<input type='hidden' name='HMODAL" + barang[i]["IDX"] + "' id='HMODAL" + barang[i]["IDX"] + "' value='" + barang[i]["HMODAL"] + "'>";
                        tabel += "<input type='hidden' name='TGLBELI" + barang[i]["IDX"] + "' id='TGLBELI" + barang[i]["IDX"] + "' value='" + barang[i]["TGLBELI"] + "'>";
                        tabel += "<input type='hidden' name='JMLRET" + barang[i]["IDX"] + "' id='JMLRET" + barang[i]["IDX"] + "' value='" + barang[i]["JMLRET"] + "'>";
                        tabel += "<input type='checkbox' id='STATUSPERSETUJUAN" + barang[i]["IDX"] + "' class='STATUSPERSETUJUAN' value='1' name='STATUSPERSETUJUAN" + barang[i]["IDX"] + "' onclick='return false' checked >";
                        tabel += "</td>";
                    }
                    else {
                        tabel += "<td style='text-align:center'>";
                        tabel += "<input type='hidden' name='IDX[]' id='IDX' value='" + barang[i]["IDX"] + "'>";
                        tabel += "<input type='hidden' name='KDBRG" + barang[i]["IDX"] + "' id='KDBRG' value='" + barang[i]["KDBRG"] + "'>";
                        tabel += "<input type='hidden' name='KDMT_RET" + barang[i]["IDX"] + "' id='KDMT_RET' value='" + barang[i]["KDMT_RET"] + "'>";
                        tabel += "<input type='hidden' name='NMBRG" + barang[i]["IDX"] + "' id='NMBRG' value='" + barang[i]["NMBRG"] + "'>";
                        tabel += "<input type='hidden' name='HMODAL" + barang[i]["IDX"] + "' id='HMODAL' value='" + barang[i]["HMODAL"] + "'>";
                        tabel += "<input type='hidden' name='TGLBELI" + barang[i]["IDX"] + "' id='TGLBELI' value='" + barang[i]["TGLBELI"] + "'>";
                        tabel += "<input type='hidden' name='JMLRET" + barang[i]["IDX"] + "' id='JMLRET' value='" + barang[i]["JMLRET"] + "'>";
                        tabel += "<input type='checkbox' class='STATUSPERSETUJUAN' id='STATUSPERSETUJUAN" + barang[i]["IDX"] + "' name='STATUSPERSETUJUAN" + barang[i]["IDX"] + "' value='1'>";
                        tabel += "</td>";
                    }
                    tabel += "<td>" + barang[i]["KDBRG"] + "</td>";
                    tabel += "<td>" + barang[i]["NMBRG"] + "</td>";
                    tabel += "<td style='text-align:right'>" + barang[i]["JMLRET"] + "</td>";

                    tabel += "</tr>";
                    //console.log(tabel);
                }
                $('#data-mutasi').html(tabel);

            }
        }
    });
}

function setujuiRetur() {
    var url = base_url + "retur_trans_mutasi/setujui";
    //alert('url');
    var formData = new FormData($('#form2')[0]);
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function (data) {
            if (data["status"] == true) {
                if (data["error"] == true) {
                    alert(data["message"]);
                } else {
                    $('#modal_persetujuan').modal('hide');
                    alert(data["message"]);
                }
                getTable();
            }
            else {
                alert(data["message"])
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Gagal Menyimpan Data")
        }
    });
}

/*Pencarian Pasien Untuk modul penjualan*/
function cariPasien(start = 0) {

    var show = $('#show_pasien').val();
    //kosongkanObjTemp();
    if (show == 0) {
        $('#pasien').show();
        $('#show_pasien').val("1");
        $('#qtgl').val("");
        $('#qnomr').val("");
        $('#qiddaftar').val("");
        $('#qregunit').val("");
        $('#qnama').val("");
        $('#qruang').val("");
        $('#qtgl').focus();
        getPasien(start);
    } else {
        $('#pasien').hide();
        $('#show_pasien').val("0");
    }
}

function enter_tgl(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    //console.log(charCode);
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        if (evt.keyCode == 13) {
            var jmldata = $('#jmldatap').val();
            if (jmldata == 1) {
                $('#pilihp0').focus();
            } else {
                $('#qnomr').focus();
            }
        }
    }
    return true;
}
function enter_nomr(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    //console.log(charCode);
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        if (evt.keyCode == 13) {
            var jmldata = $('#jmldatap').val();
            if (jmldata == 1) {
                $('#pilihp0').focus();
            } else {
                $('#qiddaftar').focus();
            }
        }
    }
    return true;
}

function enter_iddaftar(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    //console.log(charCode);
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        if (evt.keyCode == 13) {
            var jmldata = $('#jmldatap').val();
            if (jmldata == 1) {
                $('#pilihp0').focus();
            } else {
                $('#qregunit').focus();
            }
        }
    }
    return true;
}

function enter_regunit(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    //console.log(charCode);
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        if (evt.keyCode == 13) {
            var jmldata = $('#jmldatap').val();
            if (jmldata == 1) {
                $('#pilihp0').focus();
            } else {
                $('#qnamapasien').focus();
            }
        }
    }
    return true;
}

function enter_namapasien(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    //console.log(charCode);
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        if (evt.keyCode == 13) {
            var jmldata = $('#jmldatap').val();
            if (jmldata == 1) {
                $('#pilihp0').focus();
            } else {
                $('#qruang').focus();
            }
        }
    }
    return true;
}

function enter_ruang(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    //console.log(charCode);
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        if (evt.keyCode == 13) {
            var jmldata = $('#jmldatap').val();
            $('#pilihp0').focus();
        }
    }
    return true;
}

function enter_noresep(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    //console.log(charCode);
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        if (evt.keyCode == 13) {
            $('#TGLRESEP').focus();
        }
    }
    return true;
}

function enter_tglresep(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    //console.log(charCode);
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        if (evt.keyCode == 13) {
            $('#keyword').focus();
        }
    }
    return true;
}

function getPasien(start = 0, lokasi = "") {
    var show = $('#show_barang').val();

    var keyword = $('#keyword').val();
    if (keyword.length > 1) {
        if (show == 0) {
            $('#barang').show();
            $('#show_barang').val("1");
        }
    }
    var mulai = start + 1;
    var qtanggal = $('#qtgl').val();
    var qnomr = $('#qnomr').val();
    var qiddaftar = $('#qiddaftar').val();
    var qregunit = $('#qregunit').val();
    var qnama = $('#qnama').val();
    var qruang = $('#qruang').val();
    var qlayanan = $("input[name='KDPELAYANAN']:checked").val();
    //alert(qlayanan);
    var url = base_url + "search/pasien?start=" + start + "&tgl=" + qtanggal + "&nomr=" + qnomr + "&iddaftar=" + qiddaftar + "&regunit=" + qregunit + "&nama=" + qnama + "&ruang=" + qruang + "&layanan=" + qlayanan;
    console.log(url);

    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: { get_param: 'value' },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            $('#jmldatap').val(data["row_count"]);
            if (data["status"] == true) {
                var barang = data["data"];
                var jmlData = barang.length;
                var limit = data["limit"]
                var tabel = "";
                //Create Tabel
                for (var i = 0; i < jmlData; i++) {
                    start++;
                    tabel += '<tr onclick=\'setPasien("' + barang[i]["nomr"] + '","' + barang[i]["id_daftar"] + '","' + barang[i]["reg_unit"] + '","' + barang[i]["nama_pasien"] + '","' + barang[i]["alamat"] + '","' + barang[i]["id_ruang"] + '","' + barang[i]["nama_ruang"] + '","' + barang[i]["dokterJaga"] + '","' + barang[i]["namaDokterJaga"] + '","' + barang[i]["id_cara_bayar"] + '","' + barang[i]["cara_bayar"] + '")\' >';
                    tabel += "<td>" + barang[i]["tgl_masuk"] + "</td>";
                    tabel += "<td>" + barang[i]["nomr"] + "</td>";
                    tabel += "<td>" + barang[i]["id_daftar"] + "</td>";
                    tabel += "<td>" + barang[i]["reg_unit"] + "</td>";
                    tabel += "<td>" + barang[i]["nama_pasien"] + " (" + barang[i]["alamat"] + ")" + "</td>";
                    tabel += "<td>" + barang[i]["nama_ruang"] + "</td>";
                    tabel += '<td class=\'text-right\'>';
                    tabel += '<button type=\'button\' class=\'btn btn-success btn-xs\' id="pilihp' + i + '"  onclick=\'setPasien("' + barang[i]["nomr"] + '","' + barang[i]["id_daftar"] + '","' + barang[i]["reg_unit"] + '","' + barang[i]["nama_pasien"] + '","' + barang[i]["alamat"] + '","' + barang[i]["id_ruang"] + '","' + barang[i]["nama_ruang"] + '","' + barang[i]["dokterJaga"] + '","' + barang[i]["namaDokterJaga"] + '","' + barang[i]["id_cara_bayar"] + '","' + barang[i]["cara_bayar"] + '")\'><span class=\'fa fa-check\' ></span></button>';
                    tabel += '</td>';
                    tabel += "</tr>";
                }
                $('#data-pasien').html(tabel);
                //Create Pagination
                if (data["row_count"] <= limit) {
                    $('#page-pasien').html("");
                } else {
                    var pagination = "";
                    var btnIdx = "";
                    jmlPage = Math.ceil(data["row_count"] / limit);
                    offset = data["start"] % limit;
                    curIdx = Math.ceil((data["start"] / data["limit"]) + 1);
                    prev = (curIdx - 2) * data["limit"];
                    next = (curIdx) * data["limit"];

                    var curSt = (curIdx * data["limit"]) - jmlData;
                    var st = start;
                    var btn = "btn-default";
                    var lastSt = (jmlPage * data["limit"]) - jmlData
                    var btnFirst = "<button class='btn btn-default btn-sm' type='button' onclick='getPasien(0)'><span class='fa fa-angle-double-left'></span></button>";
                    if (curIdx > 1) {
                        var prevSt = ((curIdx - 1) * data["limit"]) - jmlData;
                        btnFirst += "<button class='btn btn-default btn-sm' type='button' onclick='getPasien(" + prevSt + ")'><span class='fa fa-angle-left'></span></button>";
                    }

                    var btnLast = "";
                    if (curIdx < jmlPage) {
                        var nextSt = ((curIdx + 1) * data["limit"]) - jmlData;
                        btnLast += "<button class='btn btn-default btn-sm' type='button' onclick='getPasien(" + nextSt + ")'><span class='fa fa-angle-right'></span></button>";
                    }
                    btnLast += "<button class='btn btn-default btn-sm' type='button' onclick='getPasien(" + lastSt + ")'><span class='fa fa-angle-double-right'></span></button>";

                    if (jmlPage >= 5) {
                        if (curIdx >= 2) {
                            var idx_start = curIdx - 1;
                            var idx_end = idx_start + 4;
                            if (idx_end >= jmlPage) idx_end = jmlPage;
                        } else {
                            var idx_start = 1;
                            var idx_end = 5;
                        }
                        for (var j = idx_start; j <= idx_end; j++) {
                            st = (j * data["limit"]) - jmlData;
                            if (curSt == st) btn = "btn-success"; else btn = "btn-default";
                            btnIdx += "<button class='btn " + btn + " btn-sm' type='button' onclick='getPasien(" + st + ")'>" + j + "</button>";
                        }
                    } else {
                        for (var j = 1; j <= jmlPage; j++) {
                            st = (j * data["limit"]) - jmlData;
                            if (curSt == st) btn = "btn-success"; else btn = "btn-default";
                            btnIdx += "<button class='btn " + btn + " btn-sm' type='button' onclick='getPasien(" + st + ")'>" + j + "</button>";
                        }
                    }
                    pagination += btnFirst + btnIdx + btnLast;
                    $('#page-pasien').html("Showing " + mulai + " to " + start + " of " + data["row_count"] + " " + pagination);
                }
            }
        }
    });
}

function setPasien1(a, b, c, d, e, f, g, h, i, j, k) {
    $('#NOMR').val(a);
    $('#ID_DAFTAR').val(b);
    $('#REG_UNIT').val(urldecode(c));
    $('#NMPASIEN').val(urldecode(d));
    $('#ALMTPASIEN').val(urldecode(e));
    $('#KDRUANGAN').val(f);
    $('#NMRUANGAN').val(urldecode(g));
    $('#KDDOKTER').val(h);
    $('#NMDOKTER').val(urldecode(i));
    $('#KDJPASIEN').val(urldecode(j));
    $('#JNSPASIEN').val(urldecode(k));
    //alert(k);
    $('#pasien').hide();
    $('#show_pasien').val("0");
    $('#qtgl').val("");
    $('#qnomr').val("");
    $('#qiddaftar').val("");
    $('#qregunit').val("");
    $('#qnama').val("");
    $('#qruang').val("");
    $('#NORESEP').focus();
    /* onclick=\'setPasien(
    "' +barang[i]["nomr"] +'",
    "' +barang[i]["id_daftar"] +'",
    "' +barang[i]["reg_unit"] +'",
    "' +barang[i]["nama_pasien"] +',
    "' +barang[i]["alamat"] +',
    "' +barang[i]["id_ruang"] +',
    "' +barang[i]["nama_ruang"] +'",
    "' +barang[i]["dokterJaga"] +',
    "' +barang[i]["namaDokterJaga"] +'")\'*/

}

function cariBarangjual(start = 0, lokasi = "") {

    var show = $('#show_barang').val();
    //kosongkanObjTemp();
    if (show == 0) {
        $('#barang').show();
        $('#show_barang').val("1");
        $('#qkode').val("");
        $('#qnama').val("");
        $('#qbarang').val("");
        $('#qsatuan').val("");
        $('#qkategori').val("");
        $('#qkode').focus();
        $('#list-temp').hide();
        getBarangjual(start, lokasi);
    } else {
        $('#barang').hide();
        $('#list-temp').show();
        $('#show_barang').val("0");
    }
}


function setBarangJual(kode, nama, satuan, kategori, stok, hargajual) {
    var REG_UNIT = $('#REG_UNIT').val();
    var ID_DAFTAR = $('#ID_DAFTAR').val();
    var NOMR = $('#NOMR').val();
    var NMPASIEN = $('#NMPASIEN').val();
    var NMRUANGAN = $('#NMRUANGAN').val();
    var JNSLAYANAN = $('#JNSLAYANAN').val();
    var CARA_BAYAR = $('#CARA_BAYAR').val();
    var KDDOKTER = $('#KDDOKTER').val();
    var NMRUANGAN = $('#NMRUANGAN').val();
    var NORESEP = $('#NORESEP').val();
    var TGLRESEP = $('#TGLRESEP').val();
    var TGLJUAL = $('#TGLJUAL').val();
    
    if (REG_UNIT == "") {
        alert("Data Pasien Masih Kosong");
        $('#keyword').val("");
        $('#show_barang').val("0");
        $('#barang').hide();
        $('#keyword').val("");
        $('#keyword').focus();
        return false;
    }

    if (KDDOKTER == "") {
        alert("Dokter Masih Kosong");
        $('#keyword').val("");
        $('#show_barang').val("0");
        $('#barang').hide();
        $('#KDDOKTER').focus();
        return false;
    }

    if (NORESEP == "") {
        alert("No Resep Masih Kosong");
        $('#keyword').val("");
        $('#show_barang').val("0");
        $('#barang').hide();
        $('#NORESEP').focus();
        return false;
    }

    if (TGLRESEP == "") {
        alert("Tanggal Resep Masih Kosong");
        $('#keyword').val("");
        $('#show_barang').val("0");
        $('#barang').hide();
        $('#TGLRESEP').focus();
        return false;
    }
    if (TGLJUAL == "") {
        alert("Tanggal Jual Masih Kosong");
        $('#keyword').val("");
        $('#show_barang').val("0");
        $('#barang').hide();
        $('#TGLJUAL').focus();
        return false;
    }

    if (parseInt(stok) <= 0) {
        alert("Maaf Stok " + nama + " Kosong");
        return false;
    }
    $('#formobat').show();
    
    console.clear();
    getSatuan();
    getCarapakai();
    getWaktupakai();
    getKeterangan();
    $('#KDBRG').val(kode);
    $('#NMBRG').val(urldecode(nama));
    $('#JSTOK').val(parseFloat(stok));
    $('#HJUAL').val(hargajual);
    $('#keyword').val("");
    //cariBarang(0);
    $('#show_barang').val("0");
    $('#barang').hide();

    $('#formobat').show();
    $('#temptable').hide();

    var jns_layanan=$('#JNS_LAYANAN').val();
    //alert(jns_layanan);

    if(jns_layanan=="RI"){
        var jns_resep = $("input[name='JNSRESEP']:checked").val();

        if (jns_resep=='Resep Pulang') {
            $('#aturanpakai').show();
            $('#obatharian').hide();
            $('#obatpulang').show();
        }else {
            $('#aturanpakai').hide();
            $('#obatharian').show();
            $('#obatpulang').hide();
        }
        
    }else{
        $('#aturanpakai').show();
        $('#obatharian').hide();
        $('#obatpulang').show();
    }
    $('#JMLJUAL').focus();
    /*
    $("#modal_transaksi").modal("show");
    $('#modal_transaksi').on('shown.bs.modal', function (e) {
        // do something...
        $('#HJUAL').focus();
        console.clear();
        getSatuan();
        getCarapakai();
        getWaktupakai();
        getKeterangan();
    });
    $('#KDBRG').val(kode);
    $('#NMBRG').val(urldecode(nama));
    $('#JSTOK').val(parseFloat(stok));
    $('#HJUAL').val(hargajual);
    $('#keyword').val("");
    //cariBarang(0);
    $('#show_barang').val("0");
    $('#barang').hide();*/
}
function calcSummary() {
    var a = $('#HJUAL').val().replace(',', '').replace(',', '').replace(',', '');
    var jns = $("input[name='JNSRESEP']:checked").val();
    //alert(jns);
    if (jns =="Resep Harian") {
        var sbm_pagi = $('#sbm_pagi').val().replace(',', '').replace(',', '').replace(',', '');
        var sbm_siang = $('#sbm_siang').val().replace(',', '').replace(',', '').replace(',', '');
        var sbm_malam = $('#sbm_malam').val().replace(',', '').replace(',', '').replace(',', '');
        var stm_pagi = $('#stm_pagi').val().replace(',', '').replace(',', '').replace(',', '');
        var stm_siang = $('#stm_siang').val().replace(',', '').replace(',', '').replace(',', '');
        var stm_malam = $('#stm_malam').val().replace(',', '').replace(',', '').replace(',', '');
        var malam = $('#malam').val().replace(',', '').replace(',', '').replace(',', '');
        var injeksi = $('#injeksi').val().replace(',', '').replace(',', '').replace(',', '');
        var mandiri = $('#mandiri').val().replace(',', '').replace(',', '').replace(',', '');
        sbm_pagi = (sbm_pagi == '' || isNaN(sbm_pagi)) ? 0 : sbm_pagi;
        sbm_siang = (sbm_siang == '' || isNaN(sbm_pagi)) ? 0 : sbm_pagi;
        sbm_malam = (sbm_pagi == '' || isNaN(sbm_pagi)) ? 0 : sbm_pagi;
        stm_pagi = (stm_pagi == '' || isNaN(stm_pagi)) ? 0 : stm_pagi;
        stm_siang = (stm_siang == '' || isNaN(stm_siang)) ? 0 : stm_siang;
        stm_malam = (stm_malam == '' || isNaN(stm_malam)) ? 0 : stm_malam;
        
        malam = (malam == '' || isNaN(malam)) ? 0 : malam;
        injeksi = (injeksi == '' || isNaN(injeksi)) ? 0 : injeksi;
        mandiri = (mandiri == '' || isNaN(mandiri)) ? 0 : mandiri;
        var b = parseInt(sbm_pagi) + parseInt(sbm_siang) + parseInt(sbm_malam) + parseInt(stm_pagi) + parseInt(stm_siang) + parseInt(stm_malam) + parseInt(malam)+ parseInt(injeksi)+ parseInt(mandiri);
        //alert(b);
    }
    else{
        var b = $('#JMLJUAL').val().replace(',', '').replace(',', '').replace(',', '');
    }
    
    var c = $('#DISKON_P').val().replace(',', '').replace(',', '').replace(',', '');
    var d = $('#R').val().replace(',', '').replace(',', '').replace(',', '');

    a = (a == '' || isNaN(a)) ? 0 : a;
    b = (b == '' || isNaN(b)) ? 0 : b;
    c = (c == '' || isNaN(c)) ? 0 : c;
    d = (d == '' || isNaN(d)) ? 0 : d;

    var totBruto = parseFloat(a) * parseFloat(b);
    totBruto = (totBruto == '' || isNaN(totBruto)) ? 0 : totBruto;

    if (c == '' || c == '0') {

        var e = $('#DISKON').val().replace(',', '').replace(',', '').replace(',', '');
        e = (e == '' || isNaN(e)) ? 0 : e;

    } else {
        var e = parseFloat(totBruto) * parseFloat(c) / 100;
        e = (e == '' || isNaN(e)) ? 0 : e;
        $('#DISKON').val(e);
    }

    var f = parseFloat(totBruto) + parseFloat(d) - parseFloat(e);
    f = (f == '' || isNaN(f)) ? 0 : f;

    $('#SUBTOTAL').val(f);
}
function hapusTemp(a) {
    var x = confirm("Apakah anda yakin akan menghapus data ini?");
    if (x) {
        $.ajax({
            url: base_url+"pemakaian_obat/hapusTemp",
            type: "POST",
            data: {
                IDX: a
            },
            dataType: "JSON",
            success: function (data) {
                alert(data.message);
                getTemp();
            },
            error: function (jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    }
}
function closeForm(){
    $('#formobat').hide();
    $('#temptable').show();
    $('#list-temp').show();
    $('#keyword').focus();
}
function getSatuan() {
    var jenis_obat = $('#jenis_obat').val();
    var url = base_url + "search/satuan_pemakaian/" + jenis_obat;
    $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data["status"] == true) {
                var satuan = data["data"];
                var jmlData = satuan.length;
                var option = "";
                for (var i = 0; i < jmlData; i++) {
                    option += "<option value='" + satuan[i]["id_satuan"] + "'>" + satuan[i]["nama_satuan"] + "</option>";
                }
                option += "<option value='Lainnya'>Lainnya</option>";
                $('#satuanAP').html(option);
            } else {
                alert(data["message"]);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {

        }
    });
} 
function getCarapakai() {
    var jenis_obat = $('#jenis_obat').val();
    var url = base_url + "search/cara_pakai/" + jenis_obat;
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data["status"] == true) {
                var satuan = data["data"];
                var jmlData = satuan.length;
                var option = "";
                for (var i = 0; i < jmlData; i++) {
                    option += "<option value='" + satuan[i]["id_cara"] + "'>" + satuan[i]["cara_pakai"] + "</option>";
                }
                option += "<option value='Lainnya'>Lainnya</option>";
                $('#cara_pakai').html(option);
            } else {
                alert(data["message"]);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {

        }
    });
}
function getWaktupakai() {
    var periode = $('#jmlHari').val();
    var url = base_url + "search/waktu_pakai/" + periode;
    //console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data["status"] == true) {
                var waktu1 = data["waktu1"];
                //console.log(waktu1);
                var jmlData1 = waktu1.length;
                var option1 = "";
                for (var i = 0; i < jmlData1; i++) {
                    option1 += "<option value='" + waktu1[i]["waktuid"] + "'>" + waktu1[i]["waktu_pakai"] + "</option>";
                }
                option1 += "<option value='Lainnya'>Lainnya</option>";
                $('#waktu2').html(option1);

                var waktu2 = data["waktu2"];
                //console.log(waktu2);
                var jmlData2 = waktu2.length;
                var option2 = "<option value=''>Pilih Waktu Pakai</option>";
                for (var j = 0; j < jmlData2; j++) {
                    option2 += "<option value='" + waktu2[j]["waktuid"] + "'>" + waktu2[j]["waktu_pakai"] + "</option>";
                }
                option2 += "<option value='Lainnya'>Lainnya</option>";
                $('#waktu3').html(option2);

            } else {
                alert(data["message"]);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {

        }
    });
}
function getKeterangan() {
    
    var url = base_url + "search/keterangan";
    console.clear();
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data["status"] == true) {
                var keterangan = data["data"];
                var jmlData = keterangan.length;
                var option = "<option value=''>Pilih Keterangan</option>";
                for (var i = 0; i < jmlData; i++) {
                    option += "<option value='" + keterangan[i]["keteranganid"] + "'>" + keterangan[i]["keterangan"] + "</option>";
                }
                option += "<option value='Lainnya'>Lainnya</option>";
                $('#keterangan').html(option);
            } else {
                alert(data["message"]);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {

        }
    });
}
function showLog(idx, kdbrg, hmodal, expdate, hbeli, tglbeli) {
    var show_status = $('#show' + idx).val();
    if (show_status == "0") {
        $('#show' + idx).val("1");
        $('.detail').hide();
        $('#detail' + idx).show();
        $('.icon').removeClass('fa-minus');
        $('.icon').addClass('fa-plus');
        $('#icon' + idx).removeClass("fa-plus");
        $('#icon' + idx).addClass("fa-minus");
        var url = base_url + "trans_pembelian/getlog?kdbrg=" + kdbrg + "&hmodal=" + hmodal + "&expdate=" + expdate + "&hbeli=" + hbeli + "&tglbeli=" + tglbeli;
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                if (data["status"] == true) {
                    var log = data["log"];
                    var jmlData = log.length;
                    var tabel = "";
                    var jenis_transaksi = "";
                    var jmlbrg = 0;
                    jnstrans = "";
                    var sisa = 0;
                    var sisa_disini = 0;
                    var sisa_barang = 0;
                    var kdlokasi = "";
                    var KDLTSTART = "";
                    var desc = "";
                    var nama_lokasi = log[0]["NMLOKASI"];
                    for (var i = 0; i < jmlData; i++) {
                        if (i == 0) KDLTSTART = log[i]["KDLT"];
                        if (kdlokasi == "") kdlokasi = log[i]["KDLOKASI"];
                        sisa_barang = getSisa(kdbrg, hmodal, expdate, hbeli, tglbeli, KDLTSTART, log[i]["KDLT"], log[i]["KDLOKASI"]);
                        if (kdlokasi != log[i]["KDLOKASI"]) {
                            sisa = getSisa(kdbrg, hmodal, expdate, hbeli, tglbeli, KDLTSTART, log[i]["KDLT"], log[i]["KDLOKASI"]);
                            //return false;
                            //sisa = 0;
                        } else {
                            sisa_disini += parseInt(log[i]["JMASUK"]);
                        }
                        if (log[i]["JTRANS"] == "BL") {
                            jenis_transaksi = "Pembelian Barang ";
                            jmlbrg = log[i]["JMASUK"];
                            //sisa = parseInt(log[i]["JMASUK"]);
                            sisa = parseInt(sisa_disini);
                            desc = "Masuk Ke " + log[i]["NMLOKASI"];
                            //sisa_disini=sisa;

                        } else if (log[i]["JTRANS"] == "MT") {
                            if (log[i]["JMASUK"] > 0) {
                                jenis_transaksi = "Mutasi Barang ";
                                jmlbrg = log[i]["JMASUK"];
                                sisa += parseInt(log[i]["JMASUK"]);
                                desc = "Masuk Ke " + log[i]["NMLOKASI"];
                                //sisa+=parseInt(sisa_disini);
                            } else {
                                jenis_transaksi = "Mutasi Barang ";
                                jmlbrg = log[i]["JKELUAR"];
                                sisa_disini -= parseInt(log[i]["JKELUAR"]);
                                sisa = sisa_disini;
                                desc = "Keluar Dari " + log[i]["NMLOKASI"];
                            }

                        } else if (log[i]["JTRANS"] == "JL") {
                            jenis_transaksi = "Penjualan Barang";
                            jmlbrg = log[i]["JKELUAR"];
                            sisa -= parseInt(log[i]["JKELUAR"]);
                            desc = "Keluar Dari " + log[i]["NMLOKASI"];
                        }
                        if (nama_lokasi == log[i]["NMLOKASI"]) var style = 'bg-yellow'; else var style = "";
                        tabel += "<tr class='" + style + "'>"
                            + "<td>" + log[i]["NOREFF"] + "</td >"
                            + "<td>" + log[i]["DTTRANS"] + "</td >"
                            + "<td>" + jenis_transaksi + "</td >"
                            + "<td>" + desc + "</td>"
                            + "<td>" + jmlbrg + "</td>"
                            + "<td>" + sisa_barang + "</td>"
                            + "</tr >";
                        kdlokasi = log[i]["KDLOKASI"];
                    }

                    $('#detail_data' + idx).html(tabel);
                } else {
                    alert(data["message"]);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    } else {
        $('#icon' + idx).removeClass("fa-minus");
        $('#icon' + idx).addClass("fa-plus");
        $('#show' + idx).val("0");
        $('#detail' + idx).hide();
    }

}

function getSisa(kdbrg, hmodal, expdate, hbeli, tglbeli, KDLTSTART, KDLTSTOP, lokasi) {
    var url = base_url + "trans_pembelian/getlogsisa?kdbrg=" + kdbrg + "&hmodal=" + hmodal + "&expdate=" + expdate + "&hbeli=" + hbeli + "&tglbeli=" + tglbeli + "&dari=" + KDLTSTART + "&sampai=" + KDLTSTOP + "&lokasi=" + lokasi;
    console.log(url);
    var sisa = 0;
    $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        async: false,
        success: function (data) {

            sisa = parseInt(data["log"]["SISA"]);
            console.log(data["log"]["SISA"]);
        }
    });
    return sisa;
}
function updateNoFaktur() {
    var url = base_url + "trans_pembelian/updatenofaktur";
    var formItems = {};
    formItems['faktur_lama'] = $('#faktur_lama').val();
    formItems['faktur_baru'] = $('#NOFAKTUR').val();
    formItems['kdbl'] = $('#KDBL').val();
    console.log(formItems);
    $.ajax({
        url: url,
        type: "POST",
        data: formItems,
        dataType: "JSON",
        success: function (data) {
            alert(data.message)
        },
        error: function (xhr, ajaxOption, thrownError) {
            console.log('Response : ' + thrownError);
        }
    });
}

const formatter = new Intl.NumberFormat('id-ID');
function riwayatKunjungan(start, aksi = '') {
    $('#start').val(start);
    var search = $('#q').val();
    var limit = $('#limit').val();
    var active = "class='btn btn-primary btn-sm'";
    var jns = $("input[name='jnslayanan']:checked").val();

    var url = base_url + "pemakaian_obat/riwayat_kunjungan?q=" + search + "&start=" + start + "&limit=" + limit + "&jns=" + jns;
    //alert(url);
    console.clear();
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: { get_param: 'value' },
        beforeSend: function () {
            // setting a timeout
            console.clear();
            console.log('before Send');

            var tabel = "<tr id='loading'><td colspan='5'><b>Loading...</b></td></tr>";
            $('#riwayat_kunjungan').html("");
            $('#loading').show();
            $('#loading').html(tabel);
            $('#pagination').html('');
        },
        success: function (data) {
            //menghitung jumlah data

            if (data["status"] == true) {
                var kj = data["data"];
                var jmlData = kj.length;
                var limit = data["limit"];
                var tabel = "";
                //Create Tabel
                var no = (parseInt(start) * parseInt(limit)) - parseInt(limit);
                var dari = no + 1;
                var sampai = dari + parseInt(limit);
                var desc = "<button class='btn btn-default btn-sm' type='button'>Showing " + dari + " To " + sampai + " of " + data["row_count"] + "</button>";
                var kwitansi = "";
                var hakKelas;
                for (var i = 0; i < jmlData; i++) {
                    no++;
                    //kwitansi = cekKwitansi(kj[i]["id_daftar"]);
                    console.log("Hak Kelas : " + kj[i]["hakKelas"] + " Kelas Layanan : " + kj[i]["hakKelas"]);
                    if (aksi == "") tabel = "<tr>"; else tabel += "<tr>";
                    tabel = "<td>" + no + "</td>";
                    tabel += "<td>" + kj[i]["no_ktp"] + "</td>";
                    tabel += "<td>" + kj[i]["id_daftar"] + "</td>";
                    tabel += "<td>" + kj[i]["reg_unit"] + "</td>";
                    tabel += "<td>" + kj[i]["nomr"] + "</td>";
                    tabel += "<td>" + kj[i]["nama_pasien"] + "</td>";
                    if (kj[i]["jns_kelamin"] == "P" || kj[i]["jns_kelamin"] == "0") tabel += "<td>Perempuan</td>";
                    else tabel += "<td>Laki Laki</td>";
                    tabel += "<td>" + kj[i]["no_bpjs"] + "</td>";
                    if (kj[i]["jns_layanan"] != "RI") {
                        tabel += "<td class='ranap'>-</td>";
                    } else {
                        if (kj[i]["hakKelasid"] != null) {
                            hakKelas = parseInt(kj[i]["hakKelasid"]);
                            if (kj[i]["id_kelas"] == hakKelas) tabel += "<td class='ranap'>" + kj[i]["kelas_layanan"] + "</td>";
                            else tabel += "<td class='ranap'>" + kj[i]["kelas_layanan"] + " (Naik Kelas dari " + kj[i]["hakKelas"] + ")</td>"
                        } else {
                            tabel += "<td class='ranap'>" + kj[i]["kelas_layanan"] + " </td>"
                        }

                    }

                    tabel += "<td>" + kj[i]["nama_ruang"] + "</td>";
                    tabel += "<td>" + kj[i]["rujukan"] + "</td>";
                    tabel += "<td style='text-align:right;'><a href='" + base_url + "pemakaian_obat/detail/" + kj[i]["reg_unit"] + "' class='btn btn-danger btn-sm'><span class='fa fa-search'></span>&nbsp; Detail</a></td>";
                    tabel += "</tr>";
                    if (aksi == "") $('#riwayat_kunjungan').append(tabel);
                    alert("append");
                }
                //if (aksi != "") $('#riwayat_kunjungan').html(tabel)
                //Create Pagination
                if (data["row_count"] <= limit) {
                    $('#pagination').html("");
                } else {
                    console.log("buat Pagination");
                    var pagination = "";
                    var btnIdx = "";
                    jmlPage = Math.ceil(data["row_count"] / limit);
                    offset = data["start"] % limit;
                    /*curIdx  = Math.ceil((data["start"]/data["limit"])+1);
                    prev    = (curIdx-2) * data["limit"];
                    next    = (curIdx) * data["limit"];*/


                    //var curSt=(curIdx*data["limit"])-jmlData;
                    //var mulai = start;
                    var curIdx = start;
                    var btn = "btn-default";
                    //var lastSt=jmlPage;
                    var btnFirst = "<button class='btn btn-default btn-sm' onclick='riwayatKunjungan(1)'><span class='fa fa-angle-double-left'></span></button>";
                    if (curIdx > 1) {
                        var prevSt = curIdx - 1;
                        btnFirst += "<button class='btn btn-default btn-sm' onclick='riwayatKunjungan(" + prevSt + ")'><span class='fa fa-angle-left'></span></button>";
                    }

                    var btnLast = "";
                    if (curIdx < jmlPage) {
                        var nextSt = curIdx + 1;
                        btnLast += "<button class='btn btn-default btn-sm' onclick='riwayatKunjungan(" + nextSt + ")'><span class='fa fa-angle-right'></span></button>";
                    }
                    console.log(curIdx);
                    btnLast += "<button class='btn btn-default btn-sm' onclick='riwayatKunjungan(" + jmlPage + ")'><span class='fa fa-angle-double-right'></span></button>";

                    if (jmlPage >= 5) {
                        console.clear();
                        console.log('Jumlah Halaman > 5');
                        if (curIdx >= 3) {
                            console.log('Cur Idx >= 3');
                            var idx_start = curIdx - 2;
                            var idx_end = curIdx + 2;
                            if (idx_end >= jmlPage) idx_end = jmlPage;
                        } else {
                            var idx_start = 1;
                            var idx_end = 5;
                        }
                        for (var j = idx_start; j <= idx_end; j++) {
                            if (curIdx == j) btn = "btn-success"; else btn = "btn-default";
                            btnIdx += "<button class='btn " + btn + " btn-sm' onclick='riwayatKunjungan(" + j + ")'>" + j + "</button>";
                        }
                    } else {

                        for (var j = 1; j <= jmlPage; j++) {
                            if (curIdx == j) btn = "btn-success"; else btn = "btn-default";
                            btnIdx += "<button class='btn " + btn + " btn-sm' onclick='riwayatKunjungan(" + j + ")'>" + j + "</button>";
                        }
                    }
                    pagination += "<div class='btn-group'>" + desc + btnFirst + btnIdx + btnLast + "</div>";
                    $('#pagination').html(pagination);
                }
            }
        },
        complete: function () {
            $('#loading').hide();
        }
    });

}

function resetSapLainnya(){
    $('#saplain').hide();
    $('#sap').show();
    $('#satuanAP').focus();
    $('#saplainnya').val("");
}

function resetCpLainnya(){
    $('#cplain').hide();
    $('#cp').show();
    $('#cara_pakai').focus();
    $('#cplainnya').val("");
}
function reseWpPakaiLainnya() {
    $('#wppakailain').hide();
    $('#wppakai').show();
    $('#waktu2').focus();
    $('#wppakailainnya').val("");
}
function reseWpPakaiLainnya3() {
    $('#wppakailain3').hide();
    $('#wppakai3').show();
    $('#waktu3').focus();
    $('#wppakailainnya3').val("");
}

function reseKeterangan() {
    $('#ketlain').hide();
    $('#ket').show();
    $('#keterangan').focus();
    $('#ketlainnya').val("");
}