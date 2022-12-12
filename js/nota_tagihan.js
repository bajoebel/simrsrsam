function showJadwal(id_daftar, param) {
    //var param="";
    var link = base_url + "nota_tagihan/showjadwal/" + id_daftar + "?param=" + param;
    //alert(link);    
    $.ajax({
        url: link,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            console.log(data);
            if (data["status"] == true) {
                var jadwal = data["data"];
                var jmlData = jadwal.length;
                console.log(jmlData);
                //var limit   = data["limit"]
                var tabel = "";
                var start = 0;
                //Create Tabel

                if (jmlData > 0) {
                    for (var i = 0; i < jmlData; i++) {
                        start++;
                        tabel += "<tr>";
                        tabel += "<td>" + start + "</td>";
                        tabel += "<td>" + jadwal[i]["kodebooking"] + "</td>";
                        tabel += "<td>" + jadwal[i]["tanggaloperasi"] + " " + jadwal[i]["jamoperasi"] + "</td>";
                        tabel += "<td>" + jadwal[i]["jenistindakan"] + "</td>";
                        tabel += "<td>" + jadwal[i]["kelas_layanan"] + "</td>";
                        if (jadwal[i]["anestesi"] == 1) tabel += "<td>Anestesi Umum / Regional</td>";
                        else tabel += "<td>Tanpa Anestesi</td>";
                        tabel += "<td>" + jadwal[i]["layanan"] + "</td>";
                        tabel += "<td>" + jadwal[i]["diagnosa"] + "</td>";
                        if (jadwal[i]["cito"] == 1) tabel += "<td>Kasus Cito</td>";
                        else tabel += "<td>Bukan Kasus Cito</td>";
                        if (jadwal[i]["terlaksana"] == 1) tabel += "<td><button class='btn btn-success btn-xs'>Sudah Terlaksana</button></td>";
                        else tabel += "<td><button class='btn btn-danger btn-xs' onclick='laksanakanOperasi(\"" + jadwal[i]["idx"] + "\")'>Belum Terlaksana</button></td>";
                        if (jadwal[i]["terlaksana"] == 1) tabel += "<td><button class='btn btn-warning btn-xs' onclick='return false' disabled>Edit</button></td>";
                        else tabel += "<td><button class='btn btn-warning btn-xs' onclick='EditOperasi(\"" + jadwal[i]["idx"] + "\")'>Edit</button></td>";
                        tabel += "</tr>";
                    }

                } else {
                    tabel += "<tr><td colspan='10'>Data Belum ada</td></tr></table>";
                    addOperasi();
                }
                console.log("Tampilkan Jadwal Operasi");
                console.log(tabel);
                $('#data_jadwaloperasi').html(tabel);
            }
        }
    });
}



function addOperasi() {
    $('#tabel_operasi').hide();
    $('#form_operasi').show();

}

function tutupFormOperasi() {
    $('#tabel_operasi').show();
    $('#form_operasi').hide();
    clearText();
    showJadwal();
    getJadwalOperasi();
}

function getJadwalOperasi() {
    var tanggal = $('#tanggaloperasi').val();
    var url = base_url + "nota_tagihan/showjadwal/" + tanggal + "?param=tanggaloperasi";
    //alert(url);
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            if (data["status"] == true) {
                var jadwal = data["data"];
                var jmlData = jadwal.length;
                var limit = data["limit"]
                var tabel = "";
                //Create Tabel
                start = 0;
                if (jmlData > 0) {
                    for (var i = 0; i < jmlData; i++) {
                        start++;
                        tabel += "<tr>";
                        tabel += "<td>" + start + "</td>";
                        tabel += "<td>" + jadwal[i]["kodebooking"] + "</td>";
                        tabel += "<td>" + jadwal[i]["nomr"] + "</td>";
                        tabel += "<td>" + jadwal[i]["nama_pasien"] + "</td>";
                        tabel += "<td>" + jadwal[i]["jenistindakan"] + "</td>";
                        tabel += "<td>" + jadwal[i]["jamoperasi"] + "</td>";
                        if (jadwal[i]["terlaksana"] == 1) tabel += "<td><button class='btn btn-success btn-xs'>Sudah Terlaksana</button></td>";
                        else tabel += "<td><button class='btn btn-danger btn-xs'>Belum Terlaksana</button></td>";

                        tabel += "</tr>";
                        console.log("Row " + i + " ...");
                    }

                } else {
                    tabel += "<tr><td colspan='10'>Data Belum ada</td></tr></table>";
                    //addOperasi();
                }
                //console.log(tabel);
                //$('#list-jadwal').html("COBA");
                $('#list-jadwal').html(tabel);
            }
        }
    });
}

function getLayananOperasi() {
    var kelas = $('#op_kelasid').val();
    var anestesi = $('#anestesi:checked').val();
    var cito = $('#cito:checked').val();
    //alert(anestesi);
    if (anestesi != "1") anestesi = "0";
    if (cito != "1") cito = "0";
    var url = base_url + "nota_tagihan/getlayananoperasi/" + kelas + "/" + anestesi + "/" + cito;
    console.clear();
    console.log(url);
    //alert(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            if (data["status"] == true) {
                var layanan = data["data"];
                var jmlData = layanan.length;
                var option = "";
                for (var i = 0; i < jmlData; i++) {
                    option += "<option value='" + layanan[i]["idx"] + "'>" + layanan[i]["layanan"] + "(Rp. " + layanan[i]["tarif_layanan"] + ")" + "</option>"
                }
                $('#op_layanan').html(option);
            }
        }
    });
}

function simpanJadwalOperasi() {
    var url;
    url = base_url + "nota_tagihan/simpanjadwaloperasi";
    //var formData = new FormData($('#formJadwalOperasi')[0]);
    var anestesi = $('#anestesi:checked').val();
    var cito = $('#cito:checked').val();
    if (anestesi != "1") anestesi = "0";
    if (cito != "1") cito = "0";
    //var a = $('#op_dokterid').val();
    //alert(a); 
    //return false;
    var postData = {}
    postData["idx"] = $('#op_idx').val();
    postData["id_daftar"] = $('#op_id_daftar').val();
    postData["reg_unit"] = $('#op_reg_unit').val();
    postData["nomr"] = $('#op_nomr').val();
    postData["nama_pasien"] = $('#op_nama_pasien').val();
    postData["tempat_lahir"] = $('#op_tempat_lahir').val();
    postData["tgl_lahir"] = $('#op_tgl_lahir').val();
    postData["jns_kelamin"] = $('#op_jns_kelamin').val();
    postData["nopeserta"] = $('#op_nopeserta').val();
    postData["tanggaloperasi"] = $('#tanggaloperasi').val();
    postData["jamoperasi"] = $('#jamoperasi').val();
    postData["idjenistindakan"] = $('#op_idjenistindakan').val();
    postData["jenistindakan"] = $('#op_idjenistindakan :selected').html();
    postData["idkelas"] = $('#op_kelasid').val();
    postData["kelas_layanan"] = $('#op_kelasid :selected').html();
    postData["anestesi"] = anestesi;
    postData["idtarif"] = $('#op_layanan').val();
    postData["layanan"] = $('#op_layanan :selected').html();
    postData["id_dokter"] = $('#op_dokterid').val();
    postData["namadokter"] = $('#op_dokterid :selected').html();
    postData["diagnosa"] = $('#op_diagnosa').val();
    postData["polipengirim"] = $('#op_polipengirim').val();
    postData["namapolipengirim"] = $('#op_namapolipengirim').val();
    postData["kodepoli"] = $('#op_kodepoli').val();
    postData["namapoli"] = $('#op_namapoli').val();
    postData["cito"] = cito;
    console.log(postData);
    //return false;
    $.ajax({
        url: url,
        type: "POST",
        data: $.param(postData),
        dataType: 'JSON',
        success: function (data) {
            alert(data["message"]);
            if (data["status"] == true) {
                $('#tabel_operasi').show();
                $('#form_operasi').hide();
                
                showJadwal(postData["id_daftar"],'id_daftar');
                clearText();
                
            }
            getLayananOperasi();
            console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Gagal Menyimpan Data");
        }
    });
}

function clearText() {
    $('#op_idx').val("");
    $('#op_id_daftar').val("");
    $('#op_reg_unit').val("");
    $('#op_nomr').val("");
    $('#op_nama_pasien').val("");
    $('#op_tempat_lahir').val("");
    $('#op_tgl_lahir').val("");
    $('#op_jns_kelamin').val("");
    $('#op_nopeserta').val("");
    $('#tanggaloperasi').val("");
    $('#jamoperasi').val("");
    $('#op_idjenistindakan').val("");
    $('#op_kelasid').val("");
    $('#op_layanan').val("");
    $('#op_dokterid').val("");
    $('#op_diagnosa').val("");
    $('#op_polipengirim').val("");
    $('#op_namapolipengirim').val("");
    $('#op_kodepoli').val("");
    $('#op_namapoli').val("");
    $('#cito').prop("checked", false);
    $('#anestesi').prop("checked", false);
}

function getPoli() {
    var idpoli = $('#op_polipengirim').val();
    var url = base_url + "nota_tagihan/getpoli/" + idpoli;
    //console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //console.log(data);
            if (data["status"] == true) {
                poli = data["data"];
                $('#op_namapolipengirim').val(poli["ruang"]);
                $('#op_kodepoli').val(poli["kodejkn"]);
                $('#op_namapoli').val(poli["namapoli"]);
            }
        }
    });
}

function laksanakanOperasi(jadwalid) {
    var konfirmasi = confirm("Apakah Operasi benar sudah dilakukan");
    if (konfirmasi == true) {
        var postData = {}
        postData["idx"] = jadwalid;
        postData["terlaksana"] = 1;
        console.log(postData);
        var url = base_url + "nota_tagihan/laksanakan_operasi";
        $.ajax({
            url: url,
            type: "POST",
            data: $.param(postData),
            dataType: 'JSON',
            success: function (data) {
                showJadwal();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Gagal Menyimpan Data");
            }
        });
    }
}

function EditOperasi(jadwalid) {
    var url = base_url + "nota_tagihan/editoperasi/" + jadwalid;
    //console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //console.log(data);
            if (data["status"] == true) {
                jadwal = data["data"];
                var cito = jadwal["cito"];
                var anestesi = jadwal["anestesi"];
                var terlaksana = jadwal["terlaksana"];

                //alert(cito);
                if (cito == 1) $('#cito').prop("checked", true);
                if (anestesi == 1) $('#anestesi').prop("checked", true);
                $('#op_kelasid').val(jadwal["idkelas"]);
                getLayananOperasi();
                $('#tabel_operasi').hide();
                $('#form_operasi').show();
                $('#op_idx').val(jadwalid);
                $('#op_id_daftar').val(jadwal["id_daftar"]);
                $('#op_reg_unit').val(jadwal["reg_unit"]);
                $('#op_nomr').val(jadwal["nomr"]);
                $('#op_nama_pasien').val(jadwal["nama_pasien"]);
                $('#op_tempat_lahir').val(jadwal["tempat_lahir"]);
                $('#op_tgl_lahir').val(jadwal["tgl_lahir"]);
                $('#op_jns_kelamin').val(jadwal["jns_kelamin"]);
                $('#op_nopeserta').val(jadwal["nopeserta"]);
                $('#tanggaloperasi').val(jadwal["tanggaloperasi"]);
                $('#jamoperasi').val(jadwal["jamoperasi"]);
                $('#op_idjenistindakan').val(jadwal["idjenistindakan"]);

                $('#op_layanan').val(jadwal["idtarif"]);
                $('#op_dokterid').val(jadwal["id_dokter"]);
                $('#op_diagnosa').val(jadwal["diagnosa"]);
                $('#op_polipengirim').val(jadwal["polipengirim"]);
                $('#op_namapolipengirim').val(jadwal["namapolipengirim"]);
                $('#op_kodepoli').val(jadwal["kodepoli"]);
                $('#op_namapoli').val(jadwal["namapoli"]);
                getJadwalOperasi();
            }
        }
    });
}
function CetakHasilPemeriksaan(){
    var idjenis = $('#idjenis').val();
    var reg_unit=$('#reg_unit').val();
    window.open(base_url+'nota_tagihan/cetakhasilpemeriksaan/'+idjenis+"/"+reg_unit);
}
function setPemeriksaan(idjenis) {
    $('#idjenis').val(idjenis);
    $('.jenispemeriksaan').removeClass("active");
    $('#jenispemeriksaan' + idjenis).addClass("active");
    var nama = $('#x-jenispemeriksaan' + idjenis).html();
    $('#jenispemeriksaan').html(nama);
    $('#x-jenispemeriksaan').val(nama);
    $('#sub_pemeriksaan').html("");
    var reg_unit = $('#reg_unit').val();
    //alert(reg_unit);
    $('#tgl_pemeriksaan').val("");
    showPemeriksaan(reg_unit, idjenis);
    var idx_pendaftaran = $('#idx_pendaftaran').val();
    var reg_unit = $('#reg_unit').val();
    var url = base_url + "nota_tagihan/permintaan_pemeriksaan/" + idjenis + "/" + idx_pendaftaran + "/" + reg_unit;
    //console.clear();
    //alert(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            console.clear();
            console.log(data);
            if (data["status"] == true) {
                var periksa = data["data"];
                var jenis = data["jenis"];
                $('#template').val(jenis["template"]);

                var jmlData = periksa.length;
                var option = "<option value=''>Pilih Pemeriksaan</option>";
                for (var i = 0; i < jmlData; i++) {
                    option += "<option value='" + periksa[i]["id_pemeriksaan"] + "'>" + periksa[i]["nama_pemeriksaan"] + "</option>";
                }
                //alert(periksa[0]["idjenis"])
                $('#idsubjenis').val(periksa[0]["id_subjenispemeriksaan"]);
                $('#subjenis').val(periksa[0]["subjenispemeriksaan"]);
                $('#id_pemeriksaan').html(option);
            } else {
                $('#id_pemeriksaan').html("");
            }
        }
    });
}

function showPemeriksaan(reg_unit, idjenis) {
    var url = base_url + "nota_tagihan/showpemeriksaan/" + reg_unit + "/" + idjenis;
    //console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //console.clear();
            console.log(url);
            console.log(data);
            if (data["status"] == true) {
                periksa = data["data"];
                jenis = data["jenis"];
                $('#datapemeriksaan').show();
                $('#formpemeriksaan').hide();

                var jmlData = periksa.length;
                var start = 0;
                var namapemeriksaan = "";
                //alert(jenis["dahak"]);
                if (jenis["template"] == "DahakTB") {
                    var tabel = '<table class="table table-bordered">';
                    tabel += '<thead class="bg-green">';
                    tabel += '<tr>';
                    if (hak_verifikasi == 1) tabel += '<td rowspan="2" valign="center">Acc</td>';
                    else tabel += '<td rowspan="2" valign="center">NO</td>';
                    tabel += '<td rowspan="2" valign="center">Pemeriksaan</td>';
                    tabel += '<td rowspan="2">Hasil</td>';
                    tabel += '<td rowspan="2" valign="center">Tingkat Positif</td>';
                    tabel += '<td colspan="3" align="center">Visual Dahak</td>';
                    tabel += '<td rowspan="2" valign="center" style="width: 10px;">#</td>';
                    tabel += '</tr>';
                    tabel += '<tr>';
                    tabel += '<td>Nanah Lendir</td>';
                    tabel += '<td>Bercak Darah</td>';
                    tabel += '<td>Air Liur</td>';
                    tabel += '</tr>';
                    tabel += '</thead>';
                    tabel += '<tbody>';

                    for (var i = 0; i < jmlData; i++) {
                        if (namapemeriksaan != periksa[i]["namapemeriksaan"]) {
                            start++;
                            //console.log(idsubpemeriksaan);
                            if (periksa[i]["idsubpemeriksaan"] <= 0) {
                                //Tidak ada Sub Pemeriksaan
                                tabel += "<tr>";
                                if (hak_verifikasi == 1) {
                                    if (periksa[i]["dokterVerifikasi"] == "") tabel += "<td><input type='checkbox' name='verivikator' value='1' onclick='verifikasi(\"" + periksa[i]["idx"] + "\",\"1\",\"" + reg_unit + "\",\"" + idjenis + "\")' ></td>";
                                    else tabel += "<td><input type='checkbox' name='verivikator' value='1'  onclick='verifikasi(\"" + periksa[i]["idx"] + "\",\"0\",\"" + reg_unit + "\",\"" + idjenis + "\")' checked></td>"
                                }
                                else tabel += "<td>" + start + "</td>";
                                tabel += "<td>" + periksa[i]["namapemeriksaan"] + "</td>";
                                tabel += "<td>" + periksa[i]["hasil"] + "</td>";
                                tabel += "<td>" + periksa[i]["tingkatpositif"] + "</td>";
                                if (periksa[i]["nanah_lendir"] == 1) tabel += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                else tabel += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                if (periksa[i]["bercak_darah"] == 1) tabel += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                else tabel += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                if (periksa[i]["air_liur"] == 1) tabel += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                else tabel += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                tabel += "<td><button class='btn btn-danger btn-xs' onclick='hapusPemeriksaan(\"" + periksa[i]["reg_unit"] + "\",\"" + periksa[i]["idjenispemeriksaan"] + "\",\"" + periksa[i]["idpemeriksaan"] + "\")'>Hapus</button></td>";
                                tabel += "</tr>";
                            } else {
                                tabel += "<tr>";
                                //tabel += "<td>" + start + "</td>";
                                if (hak_verifikasi == 1) {
                                    if (periksa[i]["dokterVerifikasi"] == "") tabel += "<td><input type='checkbox' name='verivikator' value='1' onclick='verifikasi(\"" + periksa[i]["idx"] + "\",\"1\",\"" + reg_unit + "\",\"" + idjenis + "\")' ></td>";
                                    else tabel += "<td><input type='checkbox' name='verivikator' value='1'  onclick='verifikasi(\"" + periksa[i]["idx"] + "\",\"0\",\"" + reg_unit + "\",\"" + idjenis + "\")' checked></td>"
                                }
                                else tabel += "<td>" + start + "</td>";
                                tabel += "<td colspan='6'><b>" + periksa[i]["namapemeriksaan"] + "</b></td>";
                                tabel += "<td><button class='btn btn-danger btn-xs' onclick='hapusPemeriksaan(\"" + periksa[i]["reg_unit"] + "\",\"" + periksa[i]["idjenispemeriksaan"] + "\",\"" + periksa[i]["idpemeriksaan"] + "\")'>Hapus</button></td>";
                                tabel += "</tr>";

                                tabel += "<tr>";
                                tabel += "<td></td>";
                                tabel += "<td>" + periksa[i]["subpemeriksaan"] + "</td>";
                                tabel += "<td>" + periksa[i]["hasil"] + "</td>";
                                tabel += "<td>" + periksa[i]["tingkatpositif"] + "</td>";
                                if (periksa[i]["nanah_lendir"] == 1) tabel += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                else tabel += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                if (periksa[i]["bercak_darah"] == 1) tabel += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                else tabel += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                if (periksa[i]["air_liur"] == 1) tabel += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                else tabel += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                tabel += "</tr>";
                            }
                        } else {
                            tabel += "<tr>";
                            //tabel += "<td></td>";
                            if (hak_verifikasi == 1) {
                                if (periksa[i]["dokterVerifikasi"] == "") tabel += "<td><input type='checkbox' name='verivikator' value='1' onclick='verifikasi(\"" + periksa[i]["idx"] + "\",\"1\",\"" + reg_unit + "\",\"" + idjenis + "\")' ></td>";
                                else tabel += "<td><input type='checkbox' name='verivikator' value='1'  onclick='verifikasi(\"" + periksa[i]["idx"] + "\",\"0\",\"" + reg_unit + "\",\"" + idjenis + "\")' checked></td>"
                            }
                            else tabel += "<td>" + start + "</td>";
                            tabel += "<td>" + periksa[i]["subpemeriksaan"] + "</td>";
                            tabel += "<td>" + periksa[i]["hasil"] + "</td>";
                            tabel += "<td>" + periksa[i]["tingkatpositif"] + "</td>";
                            if (periksa[i]["nanah_lendir"] == 1) tabel += "<td class='text-center'><span class='fa fa-check'></span></td>";
                            else tabel += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                            if (periksa[i]["bercak_darah"] == 1) tabel += "<td class='text-center'><span class='fa fa-check'></span></td>";
                            else tabel += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                            if (periksa[i]["air_liur"] == 1) tabel += "<td class='text-center'><span class='fa fa-check'></span></td>";
                            else tabel += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                            tabel += "</tr>";
                        }
                        namapemeriksaan = periksa[i]["namapemeriksaan"];
                        /*
                        tabel+="<tr>";
                        tabel+="<td>"+start+"</td>";
                        tabel+="<td>"+periksa[i]["namapemeriksaan"]+"</td>";
                        
                        tabel+='<td class=\'text-right\'><div class="btn btn-group"><button type=\'button\' class=\'btn btn-success btn-xs\' onclick=\'edit("' +berkas[i]["id_berkas"] +'")\'><span class=\'fa fa-pencil\' ></span></button>';
                        tabel+='<button type=\'button\' class=\'btn btn-danger btn-xs\' onclick=\'hapus("' +berkas[i]["id_berkas"] +'")\'><span class=\'fa fa-remove\' ></span></div></td>';
                        tabel+="</tr>";
                        */
                    }
                    tabel += '</tbody>';
                    tabel += '</table>';
                } else if (jenis["template"] == "Patologi" || jenis["template"] == "Radiologi") {
                    var tabel = '<table class="table table-bordered">';
                    tabel += '<thead class="bg-green">';
                    tabel += '<tr>';
                    if (hak_verifikasi == 1) tabel += '<td rowspan="2" valign="center">Acc</td>';
                    else tabel += '<td rowspan="2" valign="center">NO</td>';
                    tabel += '<td rowspan="2" valign="center">Pemeriksaan</td>';
                    tabel += '<td rowspan="2">Hasil</td>';
                    tabel += '<td rowspan="2" valign="center" style="width: 10px;">#</td>';
                    tabel += '</tr>';

                    tabel += '</thead>';
                    tabel += '<tbody>';

                    for (var i = 0; i < jmlData; i++) {
                        if (namapemeriksaan != periksa[i]["namapemeriksaan"]) {
                            start++;
                            //console.log(idsubpemeriksaan);
                            if (periksa[i]["idsubpemeriksaan"] <= 0) {
                                //Tidak ada Sub Pemeriksaan
                                tabel += "<tr>";
                                //tabel += "<td>" + start + "</td>";
                                if (hak_verifikasi == 1) {
                                    if (periksa[i]["dokterVerifikasi"] == "") tabel += "<td><input type='checkbox' name='verivikator' value='1' onclick='verifikasi(\"" + periksa[i]["idx"] + "\",\"1\",\"" + reg_unit + "\",\"" + idjenis + "\")' ></td>";
                                    else tabel += "<td><input type='checkbox' name='verivikator' value='1'  onclick='verifikasi(\"" + periksa[i]["idx"] + "\",\"0\",\"" + reg_unit + "\",\"" + idjenis + "\")' checked></td>"
                                }
                                else tabel += "<td>" + start + "</td>";
                                tabel += "<td>" + periksa[i]["namapemeriksaan"] + "</td>";
                                tabel += "<td>" + periksa[i]["hasil"] + "</td>";
                                tabel += "<td><button class='btn btn-danger btn-xs' onclick='hapusPemeriksaan(\"" + periksa[i]["reg_unit"] + "\",\"" + periksa[i]["idjenispemeriksaan"] + "\",\"" + periksa[i]["idpemeriksaan"] + "\")'>Hapus</button></td>";
                                tabel += "</tr>";
                            } else {
                                tabel += "<tr>";
                                //tabel += "<td>" + start + "</td>";
                                if (hak_verifikasi == 1) {
                                    if (periksa[i]["dokterVerifikasi"] == "") tabel += "<td><input type='checkbox' name='verivikator' value='1' onclick='verifikasi(\"" + periksa[i]["idx"] + "\",\"1\",\"" + reg_unit + "\",\"" + idjenis + "\")' ></td>";
                                    else tabel += "<td><input type='checkbox' name='verivikator' value='1'  onclick='verifikasi(\"" + periksa[i]["idx"] + "\",\"0\",\"" + reg_unit + "\",\"" + idjenis + "\")' checked></td>"
                                }
                                else tabel += "<td>" + start + "</td>";
                                tabel += "<td colspan=2><b>" + periksa[i]["namapemeriksaan"] + "</b></td>";
                                tabel += "<td><button class='btn btn-danger btn-xs' onclick='hapusPemeriksaan(\"" + periksa[i]["reg_unit"] + "\",\"" + periksa[i]["idjenispemeriksaan"] + "\",\"" + periksa[i]["idpemeriksaan"] + "\")'>Hapus</button></td>";
                                tabel += "</tr>";

                                tabel += "<tr>";
                                tabel += "<td></td>";
                                tabel += "<td>" + periksa[i]["subpemeriksaan"] + "</td>";
                                tabel += "<td colspan=2>" + periksa[i]["hasil"] + "</td>";
                                tabel += "</tr>";
                            }
                        } else {
                            tabel += "<tr>";
                            tabel += "<td></td>";
                            tabel += "<td>" + periksa[i]["subpemeriksaan"] + "</td>";
                            tabel += "<td colspan=2>" + periksa[i]["hasil"] + "</td>";
                            tabel += "</tr>";
                        }
                        namapemeriksaan = periksa[i]["namapemeriksaan"];

                    }
                    tabel += '</tbody>';
                    tabel += '</table>';
                } else {
                    var tabel = '<table class="table table-bordered">';
                    tabel += '<thead class="bg-green">';
                    tabel += '<tr>';
                    if (hak_verifikasi == 1) tabel += '<td rowspan="2" valign="center">Acc</td>';
                    else tabel += '<td rowspan="2" valign="center">NO</td>';
                    tabel += '<td rowspan="2" valign="center">Pemeriksaan</td>';
                    tabel += '<td rowspan="2">Hasil</td>';
                    tabel += '<td rowspan="2" valign="center">Satuan</td>';
                    tabel += '<td colspan="2" align="center">Nilai Rujukan</td>';
                    tabel += '<td rowspan="2" valign="center" style="width: 10px;">#</td>';
                    tabel += '</tr>';
                    tabel += '<tr>';
                    tabel += '<td>Pria</td>';
                    tabel += '<td>Wanita</td>';
                    tabel += '</tr>';
                    tabel += '</thead>';
                    tabel += '<tbody>';

                    for (var i = 0; i < jmlData; i++) {
                        if (namapemeriksaan != periksa[i]["namapemeriksaan"]) {
                            start++;
                            //console.log(idsubpemeriksaan);
                            if (periksa[i]["idsubpemeriksaan"] <= 0) {
                                //Tidak ada Sub Pemeriksaan
                                tabel += "<tr>";
                                //tabel += "<td>" + start + "</td>";
                                if (hak_verifikasi == 1) {
                                    if (periksa[i]["dokterVerifikasi"] == "") tabel += "<td><input type='checkbox' name='verivikator' value='1' onclick='verifikasi(\"" + periksa[i]["idx"] + "\",\"1\",\"" + reg_unit + "\",\"" + idjenis + "\")' ></td>";
                                    else tabel += "<td><input type='checkbox' name='verivikator' value='1'  onclick='verifikasi(\"" + periksa[i]["idx"] + "\",\"0\",\"" + reg_unit + "\",\"" + idjenis + "\")' checked></td>"
                                }
                                else tabel += "<td>" + start + "</td>";
                                tabel += "<td>" + periksa[i]["namapemeriksaan"] + "</td>";
                                tabel += "<td>" + periksa[i]["hasil"] + "</td>";
                                tabel += "<td>" + periksa[i]["satuan"] + "</td>";
                                tabel += "<td>" + periksa[i]["rujukan_lk"] + "</td>";
                                tabel += "<td>" + periksa[i]["rujukan_pr"] + "</td>";
                                tabel += "<td><button class='btn btn-danger btn-xs' onclick='hapusPemeriksaan(\"" + periksa[i]["reg_unit"] + "\",\"" + periksa[i]["idjenispemeriksaan"] + "\",\"" + periksa[i]["idpemeriksaan"] + "\")'>Hapus</button></td>";
                                tabel += "</tr>";
                            } else {
                                tabel += "<tr>";
                                //tabel += "<td>" + start + "</td>";
                                if (hak_verifikasi == 1) {
                                    if (periksa[i]["dokterVerifikasi"] == "") tabel += "<td><input type='checkbox' name='verivikator' value='1' onclick='verifikasi(\"" + periksa[i]["idx"] + "\",\"1\",\"" + reg_unit + "\",\"" + idjenis + "\")' ></td>";
                                    else tabel += "<td><input type='checkbox' name='verivikator' value='1'  onclick='verifikasi(\"" + periksa[i]["idx"] + "\",\"0\",\"" + reg_unit + "\",\"" + idjenis + "\")' checked></td>"
                                }
                                else tabel += "<td>" + start + "</td>";
                                tabel += "<td colspan='5'><b>" + periksa[i]["namapemeriksaan"] + "</b></td>";
                                tabel += "<td><button class='btn btn-danger btn-xs' onclick='hapusPemeriksaan(\"" + periksa[i]["reg_unit"] + "\",\"" + periksa[i]["idjenispemeriksaan"] + "\",\"" + periksa[i]["idpemeriksaan"] + "\")'>Hapus</button></td>";
                                tabel += "</tr>";

                                tabel += "<tr>";
                                tabel += "<td></td>";
                                tabel += "<td>" + periksa[i]["subpemeriksaan"] + "</td>";
                                tabel += "<td>" + periksa[i]["hasil"] + "</td>";
                                tabel += "<td>" + periksa[i]["satuan"] + "</td>";
                                tabel += "<td>" + periksa[i]["rujukan_lk"] + "</td>";
                                tabel += "<td>" + periksa[i]["rujukan_pr"] + "</td>";
                                tabel += "</tr>";
                            }
                        } else {
                            tabel += "<tr>";
                            tabel += "<td></td>";
                            tabel += "<td>" + periksa[i]["subpemeriksaan"] + "</td>";
                            tabel += "<td>" + periksa[i]["hasil"] + "</td>";
                            tabel += "<td>" + periksa[i]["satuan"] + "</td>";
                            tabel += "<td>" + periksa[i]["rujukan_lk"] + "</td>";
                            tabel += "<td>" + periksa[i]["rujukan_pr"] + "</td>";
                            tabel += "</tr>";
                        }
                        namapemeriksaan = periksa[i]["namapemeriksaan"];
                        /*
                        tabel+="<tr>";
                        tabel+="<td>"+start+"</td>";
                        tabel+="<td>"+periksa[i]["namapemeriksaan"]+"</td>";
                        
                        tabel+='<td class=\'text-right\'><div class="btn btn-group"><button type=\'button\' class=\'btn btn-success btn-xs\' onclick=\'edit("' +berkas[i]["id_berkas"] +'")\'><span class=\'fa fa-pencil\' ></span></button>';
                        tabel+='<button type=\'button\' class=\'btn btn-danger btn-xs\' onclick=\'hapus("' +berkas[i]["id_berkas"] +'")\'><span class=\'fa fa-remove\' ></span></div></td>';
                        tabel+="</tr>";
                        */
                    }
                    tabel += '</tbody>';
                    tabel += '</table>';
                }

                $('#list_data_pemeriksaan').html(tabel);
            } else {
                $('#datapemeriksaan').hide();
                $('#formpemeriksaan').show();
            }
        }
    });
}

function verifikasi(idx,value, reg_unit, idjenis){
    var url = base_url + "nota_tagihan/verifikasi/"+idx+"/"+value;
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            showPemeriksaan(reg_unit, idjenis);
        }
    })
}
function simpanHasilPemeriksaan() {
    var url;
    url = base_url + "nota_tagihan/simpanhasilpemeriksaan";
    var formData = new FormData($('#formItem')[0]);
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function (data) {
            console.log(data);
            if (data["status"] == true) {
                setPemeriksaan(data["idjenis"]);
            } else {
                alert(data["message"]);
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error Saat Menyimpan");
        }
    });
}

function getSubpemeriksaan() {
    var id_pemeriksaan = $('#id_pemeriksaan').val();
    var namapemeriksaan = $('#id_pemeriksaan :selected').html();
    $('#namapemeriksaan').val(namapemeriksaan);
    //alert(namapemeriksaan);
    var template = $('#template').val();
    //alert(template);
    var url = base_url + "nota_tagihan/list_sub_pemeriksaan/" + id_pemeriksaan;
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //console.clear();
            console.log(url);
            console.log(data);
            //alert(data);
            if (data["status"] == true) {
                //Jika Ada SUb Pemeriksaan
                var sub_periksa = data["data"];
                console.log(sub_periksa);
                var jmlData = sub_periksa.length;
                //$('#tbdahak').val(sub_periksa[0]["dahak"]);
                //alert(sub_periksa[0]["dahak"]);
                if (template == 'DahakTB') {
                    var tabel = "<table class='table table-brdered'>";
                    tabel += "<thead class='bg-green'>";
                    tabel += "<tr>";
                    tabel += "<td rowspan='2'>Pemeriksaan</td>";
                    tabel += "<td rowspan='2'>Hasil</td>";
                    tabel += "<td rowspan='2'>Tingkat Positif</td>";
                    tabel += "<td colspan='3' class='text-center'>Visual Dahak</td>";
                    tabel += "</tr>";
                    tabel += "<tr>";
                    tabel += "<td class='text-center'>Nanah Lendir</td>";
                    tabel += "<td class='text-center'>Bercak Darah</td>";
                    tabel += "<td class='text-center'>Air Liur</td>";
                    tabel += "</tr>";
                    tabel += "</thead>";
                } else if (template == 'Patologi' || template == 'Radiologi') {
                    if (template == 'Radiologi') {
                        var control = "<div class='form-group'>";
                        control += "<div class='col-md-12'>";
                        control += "<label>Proyeksi</label>";
                        control += '<input type="text" name="proyeksi" class="form-control" id="proyeksi" value="">';
                        control += "</div>";
                        control += "</div>";
                        $('#khusus').html(control);

                    }
                    var tabel = "<table class='table table-brdered'>";
                    tabel += "<thead class='bg-green'>";
                    tabel += "<tr>";
                    tabel += "<td rowspan='2'>Pemeriksaan</td>";
                    tabel += "<td rowspan='2'>Hasil</td>";

                    tabel += "<td style='width:10px'>#</td>";

                    tabel += "</thead>";
                } else {
                    var tabel = "<table class='table table-brdered'>";
                    tabel += "<thead class='bg-green'>";
                    tabel += "<tr>";
                    tabel += "<td rowspan='2'>Pemeriksaan</td>";
                    tabel += "<td rowspan='2'>Hasil</td>";
                    tabel += "<td rowspan='2'>Satuan</td>";
                    tabel += "<td colspan=2>Nilai Rujukan</td>";
                    tabel += "<td style='width:10px'>#</td>";
                    tabel += "</tr>";
                    tabel += "<tr>";
                    tabel += "<td>Pria</td>";
                    tabel += "<td>Hasil</td>";
                    tabel += "</tr>";
                    tabel += "</thead>";
                }

                for (var i = 0; i < jmlData; i++) {
                    if (template == 'DahakTB') {
                        /*tabel+="<tr>";
                        tabel+="<td>"+sub_periksa[i]["sub_pemeriksaan"]+"</td>";
                        tabel+="<td>";
                        tabel+="<input type='text' class='form-control' name='hasil"+sub_periksa[i]["sub_id"]+"' > </td>";
                        tabel+="<td>"+sub_periksa[i]["satuan"]+"</td>";
                        tabel+="<td>"+sub_periksa[i]["nilai_rujukan_lk"]+"</td>";
                        tabel+="<td>"+sub_periksa[i]["nilai_rujukan_pr"]+"</td>";
                        tabel+="</tr>";*/

                        tabel += "<tr>";
                        tabel += "<td>" + sub_periksa[i]["sub_pemeriksaan"] + "</td>";
                        tabel += "<td>";
                        tabel += "<select class='form-control' name='hasil" + sub_periksa[i]["sub_id"] + "'>";
                        tabel += "<option value=''>Pilih Hasil</option>";
                        tabel += "<option value='Pos'>Positif</option>";
                        tabel += "<option value='Neg'>Negatif</option>";
                        tabel += "</select>";
                        tabel += "<input type='hidden' class='form-control' name='id_subpemeriksaan[]' id='id_subpemeriksaan' value='" + sub_periksa[i]["sub_id"] + "'>";
                        tabel += "<input type='hidden' class='form-control' name='subpemeriksaan" + sub_periksa[i]["sub_id"] + "' id='subpemeriksaan' value='" + sub_periksa[i]["sub_pemeriksaan"] + "'>";
                        tabel += "<input type='hidden' class='form-control' name='satuan" + sub_periksa[i]["sub_id"] + "' id='satuan' value='" + sub_periksa[i]["satuan"] + "'>";
                        tabel += "<input type='hidden' class='form-control' name='nilai_rujukan_lk" + sub_periksa[i]["sub_id"] + "' id='nilai_rujukan_lk' value='" + sub_periksa[i]["nilai_rujukan_lk"] + "'>";
                        tabel += "<input type='hidden' class='form-control' name='nilai_rujukan_pr" + sub_periksa[i]["sub_id"] + "' id='nilai_rujukan_pr' value='" + sub_periksa[i]["nilai_rujukan_pr"] + "'>";
                        tabel += "</td>";
                        tabel += "<td>";
                        tabel += "<select class='form-control' name='tingkat_positif" + sub_periksa[i]["sub_id"] + "'>";
                        tabel += "<option value='-'>-</option>";
                        tabel += "<option value='+++'>+++</option>";
                        tabel += "<option value='++'>++</option>";
                        tabel += "<option value='+'>+</option>";
                        tabel += "<option value='1-9'>1-9</option>";
                        tabel += "</select>";
                        tabel += "</td>";
                        tabel += "<td class='text-center'><input type='checkbox' value=1 name='nanah_lendir" + sub_periksa[i]["sub_id"] + "'></td>";
                        tabel += "<td class='text-center'><input type='checkbox' value=1 name='bercak_darah" + sub_periksa[i]["sub_id"] + "'></td>";
                        tabel += "<td class='text-center'><input type='checkbox' value=1 name='air_liur" + sub_periksa[i]["sub_id"] + "'></td>";
                        tabel += "</tr>";
                    } else if (template == 'Patologi' || template == 'Radiologi') {
                        tabel += "<tr>";
                        tabel += "<td>" + sub_periksa[i]["sub_pemeriksaan"] + "</td>";
                        tabel += "<td>";
                        tabel += "<input type='hidden' class='form-control' name='id_subpemeriksaan[]' id='id_subpemeriksaan' value='" + sub_periksa[i]["sub_id"] + "'>";
                        tabel += "<input type='hidden' class='form-control' name='subpemeriksaan" + sub_periksa[i]["sub_id"] + "' id='subpemeriksaan' value='" + sub_periksa[i]["sub_pemeriksaan"] + "'>";
                        tabel += "<input type='hidden' class='form-control' name='satuan" + sub_periksa[i]["sub_id"] + "' id='satuan' value='" + sub_periksa[i]["satuan"] + "'>";
                        tabel += "<input type='hidden' class='form-control' name='nilai_rujukan_lk" + sub_periksa[i]["sub_id"] + "' id='nilai_rujukan_lk' value='" + sub_periksa[i]["nilai_rujukan_lk"] + "'>";
                        tabel += "<input type='hidden' class='form-control' name='nilai_rujukan_pr" + sub_periksa[i]["sub_id"] + "' id='nilai_rujukan_pr' value='" + sub_periksa[i]["nilai_rujukan_pr"] + "'>";
                        tabel += "<textarea class='form-control' name='hasil" + sub_periksa[i]["sub_id"] + "' placeholder='" + sub_periksa[i]["sub_pemeriksaan"] + "'></textarea></td>";

                        tabel += "</tr>";
                    } else {
                        tabel += "<tr>";
                        tabel += "<td>" + sub_periksa[i]["sub_pemeriksaan"] + "</td>";
                        tabel += "<td>";
                        tabel += "<input type='hidden' class='form-control' name='id_subpemeriksaan[]' id='id_subpemeriksaan' value='" + sub_periksa[i]["sub_id"] + "'>";
                        tabel += "<input type='hidden' class='form-control' name='subpemeriksaan" + sub_periksa[i]["sub_id"] + "' id='subpemeriksaan' value='" + sub_periksa[i]["sub_pemeriksaan"] + "'>";
                        tabel += "<input type='hidden' class='form-control' name='satuan" + sub_periksa[i]["sub_id"] + "' id='satuan' value='" + sub_periksa[i]["satuan"] + "'>";
                        tabel += "<input type='hidden' class='form-control' name='nilai_rujukan_lk" + sub_periksa[i]["sub_id"] + "' id='nilai_rujukan_lk' value='" + sub_periksa[i]["nilai_rujukan_lk"] + "'>";
                        tabel += "<input type='hidden' class='form-control' name='nilai_rujukan_pr" + sub_periksa[i]["sub_id"] + "' id='nilai_rujukan_pr' value='" + sub_periksa[i]["nilai_rujukan_pr"] + "'>";

                        tabel += "<input type='text' class='form-control' name='hasil" + sub_periksa[i]["sub_id"] + "' > </td>";
                        tabel += "<td>" + sub_periksa[i]["satuan"] + "</td>";
                        tabel += "<td>" + sub_periksa[i]["nilai_rujukan_lk"] + "</td>";
                        tabel += "<td>" + sub_periksa[i]["nilai_rujukan_pr"] + "</td>";
                        tabel += "</tr>";
                    }

                }
                tabel += "</table>";
                $('#sub_pemeriksaan').html(tabel);

                //console.log(tabel);
            } else {
                var periksa = data["data"];
                //$('#tbdahak').val(periksa["dahak"]);
                if (template == 'DahakTB') {
                    //alert("dahak");
                    tabel = "<table class='table table-bordered'>";
                    tabel += "<thead class='bg-green'>";
                    tabel += "<tr>";
                    tabel += "<td rowspan='2'>Hasil</td>";
                    tabel += "<td rowspan='2'>Tingkat Positif</td>";
                    tabel += "<td colspan='3' class='text-center'>Visual Dahak</td>";
                    tabel += "</tr>";
                    tabel += "<tr>";
                    tabel += "<td class='text-center'>Nanah Lendir</td>";
                    tabel += "<td class='text-center'>Bercak Darah</td>";
                    tabel += "<td class='text-center'>Air Liur</td>";
                    tabel += "</tr>";
                    tabel += "</thead>";


                    tabel += "<tr>";
                    tabel += "<td>";
                    tabel += "<select class='form-control' name='hasil0'>";
                    tabel += "<option value=''>Pilih Hasil</option>";
                    tabel += "<option value='Pos'>Positif</option>";
                    tabel += "<option value='Neg'>Negatif</option>";
                    tabel += "</select>";
                    tabel += "</td>";
                    tabel += "<td>";
                    tabel += "<input type='hidden' class='form-control' name='id_subpemeriksaan[]' id='id_subpemeriksaan' value='0'>";
                    tabel += "<select class='form-control' name='tingkat_positif0'>";
                    tabel += "<option value='-'>-</option>";
                    tabel += "<option value='+++'>+++</option>";
                    tabel += "<option value='++'>++</option>";
                    tabel += "<option value='+'>+</option>";
                    tabel += "<option value='1-9'>1-9</option>";
                    tabel += "</select>";
                    tabel += "</td>";
                    tabel += "<td class='text-center'><input type='checkbox' value=1 name='nanah_lendir0'></td>";
                    tabel += "<td class='text-center'><input type='checkbox' value=1 name='bercak_darah0'></td>";
                    tabel += "<td class='text-center'><input type='checkbox' value=1 name='air_liur0'></td>";
                    tabel += "</tr>";
                    tabel += "</table>";

                } else if (template == 'Patologi' || template == 'Radiologi') {
                    tabel = "<table class='table table-bordered'>";
                    tabel += "<thead class='bg-green'>";
                    tabel += "<tr>";
                    tabel += "<td rowspan='2'>Hasil</td>";

                    tabel += "</tr>";

                    tabel += "</thead>";

                    tabel += "<tr>";
                    tabel += "<td>";
                    tabel += "<input type='hidden' class='form-control' name='id_subpemeriksaan[]' id='id_subpemeriksaan' value='0'>";
                    tabel += "<input type='hidden' class='form-control' name='subpemeriksaan0' id='subpemeriksaan' value='-'>";
                    tabel += "<input type='hidden' class='form-control' name='satuan0' id='satuan' value='" + periksa["satuan"] + "'>";
                    tabel += "<input type='hidden' class='form-control' name='nilai_rujukan_lk0' id='nilai_rujukan_lk' value='" + periksa["nilai_rujukan_lk"] + "'>";
                    tabel += "<input type='hidden' class='form-control' name='nilai_rujukan_pr0' id='nilai_rujukan_pr' value='" + periksa["nilai_rujukan_pr"] + "'>";
                    tabel += "<textarea class='form-control' name='hasil0' placeholder='Hasil'></textarea></td>";

                    tabel += "</tr>";
                    tabel += "</table>";
                } else {
                    tabel = "<table class='table table-bordered'>";
                    tabel += "<thead class='bg-green'>";
                    tabel += "<tr>";
                    tabel += "<td rowspan='2'>Hasil</td>";
                    tabel += "<td rowspan='2'>Satuan</td>";
                    tabel += "<td colspan=2>Nilai Rujukan</td>";
                    tabel += "</tr>";
                    tabel += "<tr>";
                    tabel += "<td>Pria</td>";
                    tabel += "<td>Hasil</td>";
                    tabel += "</tr>";
                    tabel += "</thead>";

                    tabel += "<tr>";
                    tabel += "<td>";
                    tabel += "<input type='hidden' class='form-control' name='id_subpemeriksaan[]' id='id_subpemeriksaan' value='0'>";
                    tabel += "<input type='hidden' class='form-control' name='subpemeriksaan0' id='subpemeriksaan' value='-'>";
                    tabel += "<input type='hidden' class='form-control' name='satuan0' id='satuan' value='" + periksa["satuan"] + "'>";
                    tabel += "<input type='hidden' class='form-control' name='nilai_rujukan_lk0' id='nilai_rujukan_lk' value='" + periksa["nilai_rujukan_lk"] + "'>";
                    tabel += "<input type='hidden' class='form-control' name='nilai_rujukan_pr0' id='nilai_rujukan_pr' value='" + periksa["nilai_rujukan_pr"] + "'>";

                    tabel += "<input type='text' class='form-control' name='hasil0' > </td>";
                    tabel += "<td>" + periksa["satuan"] + "</td>";
                    tabel += "<td>" + periksa["nilai_rujukan_lk"] + "</td>";
                    tabel += "<td>" + periksa["nilai_rujukan_pr"] + "</td>";
                    tabel += "</tr>";
                    tabel += "</table>";
                }

                //alert(periksa["nama_pemeriksaan"]);
                //$('#namapemeriksaan').val(namapemeriksaan);
                $('#sub_pemeriksaan').html(tabel);
                //$('#id_pemeriksaan').html("");
            }

        }
    });
}

function tambahPemeriksaan() {
    $('#datapemeriksaan').hide();
    $('#formpemeriksaan').show();
    resetPemeriksaan();
}

function resetPemeriksaan() {

    $('#id_pemeriksaan').val("");
    $('#sub_pemeriksaan').html("");
}

function hapusPemeriksaan(reg_unit, idjenis, idpemeriksaan) {
    var konfirmasi = confirm("Apakah Anda akan menghapus hasil pemeriksaan ini");
    if (konfirmasi == true) {
        var url = base_url + "nota_tagihan/hapuspemeriksaan/" + reg_unit + "/" + idjenis + "/" + idpemeriksaan;
        console.log(url);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                alert(data["message"]);
                if (data["status"] == true) {
                    setPemeriksaan(idjenis);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Gagal Menghapus Hasil Pemeriksaan");
            }
        });
    }
}

function riwayatKunjungan(nomr, start) {
    $('#start').val(start);

    var search = $('#q').val();
    var limit = $('#limit').val();
    var active = "class='btn btn-primary btn-sm'";
    var url = base_url + "nota_tagihan/riwayat_kunjungan/" + nomr + "?q=" + search + "&start=" + start + "&limit=" + limit;
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //menghitung jumlah data

            if (data["status"] == true) {
                var kj = data["data"];
                var jmlData = kj.length;
                var limit = data["limit"]
                var tabel = "";
                //Create Tabel
                var mulai = start;
                for (var i = 0; i < jmlData; i++) {
                    tabel += "<tr>";
                    tabel += "<td>" + start + "</td>";
                    tabel += "<td>" + kj[i]["reg_unit"] + "</td>";
                    tabel += "<td>" + kj[i]["tgl_masuk"] + "</td>";
                    tabel += "<td>" + kj[i]["jns_layanan"] + "</td>";
                    tabel += "<td>" + kj[i]["nama_ruang"] + "</td>";
                    if (kj[i]["status_transaksi"] == "0") tabel += "<td class='text-center'><span class='btn btn-danger btn-xs'>Belum Selesai</span></td>";
                    else tabel += "<td class='text-center'><span class='btn btn-success btn-xs'>Sudah Selesai</span></td>";
                    tabel += "</tr>";
                    start++;
                }
                $('#data-kunjungan').html(tabel);
                //Create Pagination
                if (data["row_count"] <= limit) {
                    $('#pagination').html("");
                } else {
                    var pagination = "";
                    var btnIdx = "";
                    jmlPage = Math.ceil(data["row_count"] / limit);
                    offset = data["start"] % limit;
                    /*curIdx  = Math.ceil((data["start"]/data["limit"])+1);
                    prev    = (curIdx-2) * data["limit"];
                    next    = (curIdx) * data["limit"];*/


                    //var curSt=(curIdx*data["limit"])-jmlData;
                    var st = start;
                    var btn = "btn-default";
                    //var lastSt=jmlPage;
                    var btnFirst = "<button class='btn btn-default btn-sm' onclick='riwayatKunjungan('" + nomr + "',1)'><span class='fa fa-angle-double-left'></span></button>";
                    if (mulai > 1) {
                        var prevSt = mulai - 1;
                        btnFirst += "<button class='btn btn-default btn-sm' onclick='riwayatKunjungan('" + nomr + "'," + prevSt + ")'><span class='fa fa-angle-left'></span></button>";
                    }

                    var btnLast = "";
                    if (mulai < jmlPage) {
                        var nextSt = mulai + 1;
                        btnLast += "<button class='btn btn-default btn-sm' onclick='riwayatKunjungan(\"" + nomr + "\"," + nextSt + ")'><span class='fa fa-angle-right'></span></button>";
                    }

                    btnLast += "<button class='btn btn-default btn-sm' onclick='riwayatKunjungan(\"" + nomr + "\"," + jmlPage + ")'><span class='fa fa-angle-double-right'></span></button>";

                    if (mulai >= 5) {
                        if (curIdx >= 3) {
                            var idx_start = curIdx - 2;
                            var idx_end = idx_start + 2;
                            if (idx_end >= jmlPage) idx_end = jmlPage;
                        } else {
                            var idx_start = 1;
                            var idx_end = 5;
                        }
                        for (var j = idx_start; j <= idx_end; j++) {
                            if (mulai == j) btn = "btn-success";
                            else btn = "btn-default";
                            btnIdx += "<button class='btn " + btn + " btn-sm' onclick='riwayatKunjungan(\"" + nomr + "\"," + j + ")'>" + j + "</button>";
                        }
                    } else {
                        for (var j = 1; j <= jmlPage; j++) {
                            if (mulai == j) btn = "btn-success";
                            else btn = "btn-default";
                            btnIdx += "<button class='btn " + btn + " btn-sm' onclick='riwayatKunjungan(\"" + nomr + "\"," + j + ")'>" + j + "</button>";
                        }
                    }
                    pagination += btnFirst + btnIdx + btnLast;
                    $('#pagination').html(pagination);
                }
            }
        }
    });

}

function viewHasilPemeriksaan(nomr, idruang) {
    var url = base_url + "nota_tagihan/viewhasilpemeriksaan/" + nomr + "/" + idruang;
    $('.shorcut').removeClass("bg-red");
    $('.shorcut').addClass("bg-green");
    $('#shorcut' + idruang).removeClass("bg-green");
    $('#shorcut' + idruang).addClass("bg-red");
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            if (data["status"] == true) {
                //
                var jenis = data["jenispemeriksaan"];
                var jmlData = jenis.length;
                var jns = '<ul class="nav nav-stacked">';
                var def = "";
                var jenispemeriksaan = "";
                for (var i = 0; i < jmlData; i++) {
                    if (i == 0) {
                        def = jenis[i]["idx"];
                        jenispemeriksaan = jenis[i]["jenis_pemeriksaan"];
                        jns += '<li class="jenispemeriksaan active" id="jenispemeriksaan' + jenis[i]["idx"] + '"><a href="#" id="x-jenispemeriksaan' + jenis[i]["idx"] + '" onclick="getHasilPemeriksaan(\'' + nomr + '\',\'' + jenis[i]["idx"] + '\')">' + jenis[i]["jenis_pemeriksaan"] + ' </a></li>';
                    } else {
                        jns += '<li class="jenispemeriksaan" id="jenispemeriksaan' + jenis[i]["idx"] + '"><a href="#" id="x-jenispemeriksaan' + jenis[i]["idx"] + '" onclick="getHasilPemeriksaan(\'' + nomr + '\',\'' + jenis[i]["idx"] + '\')">' + jenis[i]["jenis_pemeriksaan"] + ' </a></li>';
                    }

                }
                jns += '</ul>';
                if (def != "") getHasilPemeriksaan(nomr, def);
                else $('#hasil_pemeriksaan').html("");
                $('#jenispemeriksaan').html(jns);
            }
        }
    });
}

function getHasilPemeriksaan(nomr, idjenis) {
    $('.jenispemeriksaan').removeClass('active');
    $('#jenispemeriksaan' + idjenis).addClass('active');
    var url = base_url + "nota_tagihan/gethasilpemeriksaan/" + nomr + "/" + idjenis;
    console.log(url);
    //alert(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            if (data["status"] == true) {
                //
                var hasil = data["data"];
                var jenis = data["jenis"];

                var jmlData = hasil.length;
                var jns = '<table class="table table-bordered">';
                if (jenis["template"] == "DahakTB") {
                    jns += "<tr class='bg-green'>";
                    jns += "<td rowspan=2>NO</td>";
                    jns += "<td rowspan=2>Nama Pemeriksaan</td>";
                    jns += "<td rowspan=2>Tanggal Periksa</td>";
                    jns += "<td rowspan=2>Hasil</td>";
                    jns += "<td class='text-center' rowspan=2>Tingkat Positif</td>";
                    jns += "<td class='text-center' colspan=3 >Visual Dahak</td>";
                    jns += "</tr>";

                    jns += "<tr class='bg-green'>";
                    jns += "<td class='text-center'>Nanah Lendir</td>";
                    jns += "<td class='text-center'>Bercak Darah</td>";
                    jns += "<td class='text-center'>Air Liur</td>";
                    jns += "</tr>";
                    var def = "";
                    var reg_unit = "";
                    var idpemeriksaan = "";
                    if (jmlData > 0) {
                        for (var i = 0; i < jmlData; i++) {
                            nomor = i + 1;
                            if (i == 0) {
                                jns += "<tr>";
                                jns += "<td colspan=8><b>NO REG : " + hasil[i]['reg_unit'] + "</b></td>";
                                jns += "</tr>";

                                if (hasil[i]["idsubpemeriksaan"] == "0") {
                                    jns += "<tr>";
                                    jns += "<td>" + nomor + "</td>";
                                    jns += "<td>" + hasil[i]["namapemeriksaan"] + "</td>";
                                    jns += "<td>" + hasil[i]["tanggal_periksa"] + "</td>";
                                    jns += "<td>" + hasil[i]["hasil"] + "</td>";
                                    jns += "<td>" + hasil[i]["tingkatpositif"] + "</td>";
                                    if (hasil[i]["nanah_lendir"] == 1) jns += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                    else jns += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                    if (hasil[i]["bercak_darah"] == 1) jns += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                    else jns += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                    if (hasil[i]["air_liur"] == 1) jns += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                    else jns += "<td class='text-center'><span class='fa fa-remove'></span>";
                                    jns+="</td>";
                                } else {
                                    jns += "<tr>";
                                    jns += "<td colspan='4'><b>" + hasil[i]["namapemeriksaan"] + "</b></td>";
                                    jns += "</tr>";

                                    jns += "<tr>";
                                    jns += "<td>" + nomor + "</td>";
                                    jns += "<td>" + hasil[i]["subpemeriksaan"] + "</td>";
                                    jns += "<td>" + hasil[i]["tanggal_periksa"] + "</td>";
                                    jns += "<td>" + hasil[i]["hasil"] + "</td>";
                                    jns += "<td>" + hasil[i]["tingkatpositif"] + "</td>";
                                    if (hasil[i]["nanah_lendir"] == 1) jns += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                    else jns += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                    if (hasil[i]["bercak_darah"] == 1) jns += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                    else jns += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                    if (hasil[i]["air_liur"] == 1) jns += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                    else jns += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                    jns += "</tr>";
                                }
                                reg_unit = hasil[i]['reg_unit'];
                                idpemeriksaan = hasil[i]["idpemeriksaan"];
                                //def = hasil[i]["idx"];
                                //jenispemeriksaan = jenis[i]["jenis_pemeriksaan"];
                                //jns+='<li class="jenispemeriksaan active" id="jenispemeriksaan'+jenis[i]["idx"]+'"><a href="#" id="x-jenispemeriksaan'+jenis[i]["idx"]+'" onclick="setPemeriksaan(\''+jenis[i]["idx"]+'\')">'+jenis[i]["jenis_pemeriksaan"]+' </a></li>';
                            } else {
                                if (reg_unit != hasil[i]['reg_unit']) {
                                    jns += "<tr>";
                                    jns += "<td colspan=4><b>NO REG : " + hasil[i]['reg_unit'] + "</b></td>";
                                    jns += "</tr>";
                                }
                                if (hasil[i]["idsubpemeriksaan"] == "0") {
                                    jns += "<tr>";
                                    jns += "<td>" + nomor + "</td>";
                                    jns += "<td>" + hasil[i]["namapemeriksaan"] + "</td>";
                                    jns += "<td>" + hasil[i]["tanggal_periksa"] + "</td>";
                                    jns += "<td>" + hasil[i]["hasil"] + "</td>";
                                    jns += "<td>" + hasil[i]["tingkatpositif"] + "</td>";
                                    if (hasil[i]["nanah_lendir"] == 1) jns += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                    else jns += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                    if (hasil[i]["bercak_darah"] == 1) jns += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                    else jns += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                    if (hasil[i]["air_liur"] == 1) jns += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                    else jns += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                    jns += "</tr>";
                                } else {
                                    if (idpemeriksaan == hasil[i]["idpemeriksaan"]) {
                                        jns += "<tr>";
                                        jns += "<td>" + nomor + "</td>";
                                        jns += "<td>" + hasil[i]["subpemeriksaan"] + "</td>";
                                        jns += "<td>" + hasil[i]["tanggal_periksa"] + "</td>";
                                        jns += "<td>" + hasil[i]["hasil"] + "</td>";
                                        jns += "<td>" + hasil[i]["tingkatpositif"] + "</td>";
                                        if (hasil[i]["nanah_lendir"] == 1) jns += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                        else jns += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                        if (hasil[i]["bercak_darah"] == 1) jns += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                        else jns += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                        if (hasil[i]["air_liur"] == 1) jns += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                        else jns += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                        jns += "</tr>";
                                    } else {
                                        jns += "<tr>";
                                        jns += "<td colspan='4'><b>" + hasil[i]["namapemeriksaan"] + "</b></td>";
                                        jns += "</tr>";

                                        jns += "<tr>";
                                        jns += "<td>" + nomor + "</td>";
                                        jns += "<td>" + hasil[i]["subpemeriksaan"] + "</td>";
                                        jns += "<td>" + hasil[i]["tanggal_periksa"] + "</td>";
                                        jns += "<td>" + hasil[i]["hasil"] + "</td>";
                                        jns += "<td>" + hasil[i]["tingkatpositif"] + "</td>";
                                        if (hasil[i]["nanah_lendir"] == 1) jns += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                        else jns += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                        if (hasil[i]["bercak_darah"] == 1) jns += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                        else jns += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                        if (hasil[i]["air_liur"] == 1) jns += "<td class='text-center'><span class='fa fa-check'></span></td>";
                                        else jns += "<td class='text-center'><span class='fa fa-remove'></span></td>";
                                        jns += "</tr>";
                                    }

                                }
                                reg_unit = hasil[i]['reg_unit'];
                                idpemeriksaan = hasil[i]["idpemeriksaan"];
                                //jns+='<li class="jenispemeriksaan" id="jenispemeriksaan'+jenis[i]["idx"]+'"><a href="#" id="x-jenispemeriksaan'+jenis[i]["idx"]+'" onclick="setPemeriksaan(\''+jenis[i]["idx"]+'\')">'+jenis[i]["jenis_pemeriksaan"]+' </a></li>';
                            }

                        }
                    } else {
                        jns += '<tr><td colspan="7">Tidak Ada Hasil Pemeriksaan</td></tr>';
                    }
                } else if (jenis["template"] == "Patologi" || jenis["template"] == "Radiologi") {
                    jns += "<tr class='bg-green'>";
                    jns += "<td >NO</td>";

                    jns += "<td >Nama Pemeriksaan</td>";
                    jns += "<td>Tanggal Periksa</td>";
                    jns += "<td>Hasil</td>";
                    jns += "</tr>";
                    var def = "";
                    var reg_unit = "";
                    var idpemeriksaan = "";
                    if (jmlData > 0) {
                        for (var i = 0; i < jmlData; i++) {
                            nomor = i + 1;
                            if (i == 0) {
                                jns += "<tr>";
                                jns += "<td colspan=4><b>NO REG : " + hasil[i]['reg_unit'] + "</b></td>";
                                jns += "</tr>";

                                if (hasil[i]["idsubpemeriksaan"] == "0") {
                                    jns += "<tr>";
                                    jns += "<td>" + nomor + "</td>";
                                    jns += "<td>" + hasil[i]["namapemeriksaan"] + "</td>";
                                    jns += "<td>" + hasil[i]["tanggal_periksa"] + "</td>";
                                    jns += "<td>" + hasil[i]["hasil"] + "</td>";
                                    jns += "</tr>";
                                } else {
                                    jns += "<tr>";
                                    jns += "<td colspan='4'><b>" + hasil[i]["namapemeriksaan"] + "</b></td>";
                                    jns += "</tr>";

                                    jns += "<tr>";
                                    jns += "<td>" + nomor + "</td>";
                                    jns += "<td>" + hasil[i]["subpemeriksaan"] + "</td>";
                                    jns += "<td>" + hasil[i]["tanggal_periksa"] + "</td>";
                                    jns += "<td>" + hasil[i]["hasil"] + "</td>";
                                    jns += "</tr>";
                                }
                                reg_unit = hasil[i]['reg_unit'];
                                idpemeriksaan = hasil[i]["idpemeriksaan"];
                                //def = hasil[i]["idx"];
                                //jenispemeriksaan = jenis[i]["jenis_pemeriksaan"];
                                //jns+='<li class="jenispemeriksaan active" id="jenispemeriksaan'+jenis[i]["idx"]+'"><a href="#" id="x-jenispemeriksaan'+jenis[i]["idx"]+'" onclick="setPemeriksaan(\''+jenis[i]["idx"]+'\')">'+jenis[i]["jenis_pemeriksaan"]+' </a></li>';
                            } else {
                                if (reg_unit != hasil[i]['reg_unit']) {
                                    jns += "<tr>";
                                    jns += "<td colspan=4><b>NO REG : " + hasil[i]['reg_unit'] + "</b></td>";
                                    jns += "</tr>";
                                }
                                if (hasil[i]["idsubpemeriksaan"] == "0") {
                                    jns += "<tr>";
                                    jns += "<td>" + nomor + "</td>";
                                    jns += "<td>" + hasil[i]["namapemeriksaan"] + "</td>";
                                    jns += "<td>" + hasil[i]["tanggal_periksa"] + "</td>";
                                    jns += "<td>" + hasil[i]["hasil"] + "</td>";
                                    jns += "</tr>";
                                } else {
                                    if (idpemeriksaan == hasil[i]["idpemeriksaan"]) {
                                        jns += "<tr>";
                                        jns += "<td>" + nomor + "</td>";
                                        jns += "<td>" + hasil[i]["subpemeriksaan"] + "</td>";
                                        jns += "<td>" + hasil[i]["tanggal_periksa"] + "</td>";
                                        jns += "<td>" + hasil[i]["hasil"] + "</td>";
                                        jns += "</tr>";
                                    } else {
                                        jns += "<tr>";
                                        jns += "<td colspan='4'><b>" + hasil[i]["namapemeriksaan"] + "</b></td>";
                                        jns += "</tr>";

                                        jns += "<tr>";
                                        jns += "<td>" + nomor + "</td>";
                                        jns += "<td>" + hasil[i]["subpemeriksaan"] + "</td>";
                                        jns += "<td>" + hasil[i]["tanggal_periksa"] + "</td>";
                                        jns += "<td>" + hasil[i]["hasil"] + "</td>";
                                        jns += "</tr>";
                                    }

                                }
                                reg_unit = hasil[i]['reg_unit'];
                                idpemeriksaan = hasil[i]["idpemeriksaan"];
                                //jns+='<li class="jenispemeriksaan" id="jenispemeriksaan'+jenis[i]["idx"]+'"><a href="#" id="x-jenispemeriksaan'+jenis[i]["idx"]+'" onclick="setPemeriksaan(\''+jenis[i]["idx"]+'\')">'+jenis[i]["jenis_pemeriksaan"]+' </a></li>';
                            }

                        }
                    } else {
                        jns += '<tr><td colspan="7">Tidak Ada Hasil Pemeriksaan</td></tr>';
                    }
                } else {
                    jns += "<tr class='bg-green'>";
                    jns += "<td rowspan='2'>NO</td>";

                    jns += "<td rowspan='2'>Nama Pemeriksaan</td>";
                    jns += "<td rowspan='2'>Tanggal Periksa</td>";
                    jns += "<td rowspan='2'>Hasil</td>";
                    jns += "<td rowspan='2'>Satuan</td>";
                    jns += "<td colspan='2'>Rujukan</td>";
                    jns += "</tr>";

                    jns += "<tr class='bg-green'>";
                    jns += "<td>Pria</td>";
                    jns += "<td>Wanita</td>";
                    jns += "</tr>";

                    var def = "";
                    var reg_unit = "";
                    var idpemeriksaan = "";
                    if (jmlData > 0) {
                        for (var i = 0; i < jmlData; i++) {
                            nomor = i + 1;
                            if (i == 0) {
                                jns += "<tr>";
                                jns += "<td colspan=7><b>NO REG : " + hasil[i]['reg_unit'] + "</b></td>";
                                jns += "</tr>";

                                if (hasil[i]["idsubpemeriksaan"] == "0") {
                                    jns += "<tr>";
                                    jns += "<td>" + nomor + "</td>";
                                    jns += "<td>" + hasil[i]["namapemeriksaan"] + "</td>";
                                    jns += "<td>" + hasil[i]["tanggal_periksa"] + "</td>";
                                    jns += "<td>" + hasil[i]["hasil"] + "</td>";
                                    jns += "<td>" + hasil[i]["satuan"] + "</td>";
                                    jns += "<td>" + hasil[i]["rujukan_lk"] + "</td>";
                                    jns += "<td>" + hasil[i]["rujukan_pr"] + "</td>";
                                    jns += "</tr>";
                                } else {
                                    jns += "<tr>";
                                    jns += "<td colspan='6'><b>" + hasil[i]["namapemeriksaan"] + "</b></td>";
                                    jns += "</tr>";

                                    jns += "<tr>";
                                    jns += "<td>" + nomor + "</td>";
                                    jns += "<td>" + hasil[i]["subpemeriksaan"] + "</td>";
                                    jns += "<td>" + hasil[i]["tanggal_periksa"] + "</td>";
                                    jns += "<td>" + hasil[i]["hasil"] + "</td>";
                                    jns += "<td>" + hasil[i]["satuan"] + "</td>";
                                    jns += "<td>" + hasil[i]["rujukan_lk"] + "</td>";
                                    jns += "<td>" + hasil[i]["rujukan_pr"] + "</td>";
                                    jns += "</tr>";
                                }
                                reg_unit = hasil[i]['reg_unit'];
                                idpemeriksaan = hasil[i]["idpemeriksaan"];
                                //def = hasil[i]["idx"];
                                //jenispemeriksaan = jenis[i]["jenis_pemeriksaan"];
                                //jns+='<li class="jenispemeriksaan active" id="jenispemeriksaan'+jenis[i]["idx"]+'"><a href="#" id="x-jenispemeriksaan'+jenis[i]["idx"]+'" onclick="setPemeriksaan(\''+jenis[i]["idx"]+'\')">'+jenis[i]["jenis_pemeriksaan"]+' </a></li>';
                            } else {
                                if (reg_unit != hasil[i]['reg_unit']) {
                                    jns += "<tr>";
                                    jns += "<td colspan=7><b>NO REG : " + hasil[i]['reg_unit'] + "</b></td>";
                                    jns += "</tr>";
                                }
                                if (hasil[i]["idsubpemeriksaan"] == "0") {
                                    jns += "<tr>";
                                    jns += "<td>" + nomor + "</td>";
                                    jns += "<td>" + hasil[i]["namapemeriksaan"] + "</td>";
                                    jns += "<td>" + hasil[i]["tanggal_periksa"] + "</td>";
                                    jns += "<td>" + hasil[i]["hasil"] + "</td>";
                                    jns += "<td>" + hasil[i]["satuan"] + "</td>";
                                    jns += "<td>" + hasil[i]["rujukan_lk"] + "</td>";
                                    jns += "<td>" + hasil[i]["rujukan_pr"] + "</td>";
                                    jns += "</tr>";
                                } else {
                                    if (idpemeriksaan == hasil[i]["idpemeriksaan"]) {
                                        jns += "<tr>";
                                        jns += "<td>" + nomor + "</td>";
                                        jns += "<td>" + hasil[i]["subpemeriksaan"] + "</td>";
                                        jns += "<td>" + hasil[i]["tanggal_periksa"] + "</td>";
                                        jns += "<td>" + hasil[i]["hasil"] + "</td>";
                                        jns += "<td>" + hasil[i]["satuan"] + "</td>";
                                        jns += "<td>" + hasil[i]["rujukan_lk"] + "</td>";
                                        jns += "<td>" + hasil[i]["rujukan_pr"] + "</td>";
                                        jns += "</tr>";
                                    } else {
                                        jns += "<tr>";
                                        jns += "<td colspan='6'><b>" + hasil[i]["namapemeriksaan"] + "</b></td>";
                                        jns += "</tr>";

                                        jns += "<tr>";
                                        jns += "<td>" + nomor + "</td>";
                                        jns += "<td>" + hasil[i]["subpemeriksaan"] + "</td>";
                                        jns += "<td>" + hasil[i]["tanggal_periksa"] + "</td>";
                                        jns += "<td>" + hasil[i]["hasil"] + "</td>";
                                        jns += "<td>" + hasil[i]["satuan"] + "</td>";
                                        jns += "<td>" + hasil[i]["rujukan_lk"] + "</td>";
                                        jns += "<td>" + hasil[i]["rujukan_pr"] + "</td>";
                                        jns += "</tr>";
                                    }

                                }
                                reg_unit = hasil[i]['reg_unit'];
                                idpemeriksaan = hasil[i]["idpemeriksaan"];
                                //jns+='<li class="jenispemeriksaan" id="jenispemeriksaan'+jenis[i]["idx"]+'"><a href="#" id="x-jenispemeriksaan'+jenis[i]["idx"]+'" onclick="setPemeriksaan(\''+jenis[i]["idx"]+'\')">'+jenis[i]["jenis_pemeriksaan"]+' </a></li>';
                            }

                        }
                    } else {
                        jns += '<tr><td colspan="7">Tidak Ada Hasil Pemeriksaan</td></tr>';
                    }
                }

                jns += '</table>';
                $('#hasil_pemeriksaan').html(jns);
            }
        }
    });
}

function getNota(id_daftar, jkn) {
    var url = base_url + "nota_tagihan/data_tagihan/" + id_daftar +"/"+ jkn;
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
            //menghitung jumlah data
            //console.clear();
            console.log(data);
            if (data["status"] == true) {
                var nota = data["data"];
                var jmlData = nota.length;
                var tabel = "";
                var nomor = 0;
                if (jmlData > 0) {
                    var nama_ruang = "KOSONG ";
                    var grandtotal = 0;
                    if(jkn==0){
                        for (var i = 0; i < jmlData; i++) {
                            nomor = i + 1;
                            grandtotal += parseFloat(nota[i]["sub_total_tarif"]);
                            //alert(i+" "+nama_ruang + " = " + nota[i]["nama_ruang"]);
                            if (i == 0) {
                                tabel += "<tr><td colspan=5><b>" + nota[i]["nama_ruang"] + "</b></td></tr>";
                                tabel += "<tr>";
                                tabel += "<td>" + nomor + "</td>";
                                tabel += "<td>" + nota[i]["layanan"] + "</td>";
                                tabel += "<td class='text-right'>Rp. " + formatter.format(nota[i]["tarif_layanan"]) + "</td>";
                                tabel += "<td class='text-right'>" + nota[i]["jmltindakan"] + "</td>";
                                tabel += "<td class='text-right'>Rp. " + formatter.format(nota[i]["sub_total_tarif"]) + "</td>";
                                tabel += "</tr>";

                                nama_ruang = nota[i]["nama_ruang"];
                            } else {
                                if (nama_ruang != nota[i]["nama_ruang"]) {
                                    //alert("header: "+i+" " + nota[i]["nama_ruang"]);
                                    tabel += "<tr><td colspan=5><b>" + nota[i]["nama_ruang"] + "</b></td></tr>";
                                    tabel += "<tr>";
                                    tabel += "<td>" + nomor + "</td>";
                                    tabel += "<td>" + nota[i]["layanan"] + "</td>";
                                    tabel += "<td class='text-right'>Rp. " + formatter.format(nota[i]["tarif_layanan"]) + "</td>";
                                    tabel += "<td class='text-right'>" + nota[i]["jmltindakan"] + "</td>";
                                    tabel += "<td class='text-right'>Rp. " + formatter.format(nota[i]["sub_total_tarif"]) + "</td>";
                                    tabel += "</tr>";

                                    nama_ruang = nota[i]["nama_ruang"];
                                } else {
                                    tabel += "<tr>";
                                    tabel += "<td>" + nomor + "</td>";
                                    tabel += "<td>" + nota[i]["layanan"] + "</td>";
                                    tabel += "<td class='text-right'>Rp. " + formatter.format(nota[i]["tarif_layanan"]) + "</td>";
                                    tabel += "<td class='text-right'>" + nota[i]["jmltindakan"] + "</td>";
                                    tabel += "<td class='text-right'>Rp. " + formatter.format(nota[i]["sub_total_tarif"]) + "</td>";
                                    tabel += "</tr>";

                                    nama_ruang = nota[i]["nama_ruang"];
                                }


                            }
                            //alert(nama_ruang + " = " + nota[i]["nama_ruang"]);

                        }
                        tabel += '<tr><td colspan="4"><b>Grand Total</b></td><td class="text-right"><b>Rp. ' + formatter.format(grandtotal) + '</b></td></tr>';
                    }else{
                        if (nota[0]["tarif_selisih_bayar"]>0){
                            tabel += '<tr>' +
                                '<td> 1</td >' +
                                '<td>Selish Bayar</td>' +
                                '<td class="text-right">Rp. ' + nota[0]["tarif_selisih_bayar"] + '</td>' +
                                '</tr>'
                        }
                        
                    }
                    
                    
                } else {
                    
                    tabel += '<tr><td colspan="5">Kwitansi Belum Dibuat</td></tr>';
                }
                $('#nota_tagihan').html(tabel);
            }
        }
    });
}

function simpanDiagnosaAkhir() {
    var url;
    url = base_url + "nota_tagihan/simpandiagnosaakhir";
    var formData = new FormData($('#diagnosa_akhir')[0]);
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function (data) {
            console.log(data);
            alert(data['message']);
            if (data["status"] == true) {
                getDiagnosaAkhir(data["idx"]);
            } else {
                alert(data["message"]);
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Error Saat Menyimpan");
        }
    });
}

function getDiagnosaAkhir(iddaftar, reg_unit) {
    var url = base_url + "nota_tagihan/data_diagnosa_akhir/" + iddaftar + "/" + reg_unit;
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            if (data["status"] == true) {
                $('#idx').val(data['data']['idx']);
                $('#diagnosa_utama').val(data['data']['diagnosa_utama']);
                $('#diagnosa_sekunder').val(data['data']['diagnosa_sekunder']);
            }
        }
    });
}
/**
 * Funtion Untuk Pemeriksaan Penunjang
 */

function getTindakan(start = 0) {
    var id_penunjang = $('#id_penunjang').val();
    var q = $('#keyword-tindakan').val();
    var pilihan = $('#pilihan:checked').val();
    var id_daftar = $('#pp_id_daftar').val();
    var reg_unit = $('#pp_reg_unit').val();
    if (pilihan != 1) pilihan = 0;
    //alert(pilihan);
    var url = base_url + "nota_tagihan/tindakan/" + id_penunjang + "?start=" + start + "&q=" + q + "&pilihan=" + pilihan + "&id_daftar=" + id_daftar + "&reg_unit=" + reg_unit;
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            console.log(url);
            if (data["status"] == true) {
                var row = data["data"];
                var jmlData = row.length;
                var limit = data["limit"]
                var tabel = "";
                //Create Tabel
                for (var i = 0; i < jmlData; i++) {
                    start++;
                    tabel += "<tr>";
                    if (pilihan == 1) {
                        tabel += "<td><input type='checkbox' value='" + row[i]["idtarif"] + "' onclick='setPermintaantindakan(\"" + row[i]["idtarif"] + "\")' name='idtarif" + row[i]["idtarif"] + "' id='idtarif" + row[i]["idtarif"] + "' checked></td>";
                    } else {
                        tabel += "<td><input type='checkbox' value='" + row[i]["idtarif"] + "' onclick='setPermintaantindakan(\"" + row[i]["idtarif"] + "\")' name='idtarif" + row[i]["idtarif"] + "' id='idtarif" + row[i]["idtarif"] + "'></td>";
                    }


                    tabel += "<td>" + row[i]["layanan"] + "</td>";

                    tabel += "</tr>";
                }
                $('#data-tindakan').html(tabel);
                //Create Pagination
                if (data["row_count"] <= limit) {
                    $('#pagination-tindakan').html("");
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
                    var btnFirst = "<button class='btn btn-default btn-sm' onclick='getTindakan(0)'><span class='fa fa-angle-double-left'></span></button>";
                    if (curIdx > 1) {
                        var prevSt = ((curIdx - 1) * data["limit"]) - jmlData;
                        btnFirst += "<button class='btn btn-default btn-sm' onclick='getTindakan(" + prevSt + ")'><span class='fa fa-angle-left'></span></button>";
                    }

                    var btnLast = "";
                    if (curIdx < jmlPage) {
                        var nextSt = ((curIdx + 1) * data["limit"]) - jmlData;
                        btnLast += "<button class='btn btn-default btn-sm' onclick='getTindakan(" + nextSt + ")'><span class='fa fa-angle-right'></span></button>";
                    }
                    btnLast += "<button class='btn btn-default btn-sm' onclick='getTindakan(" + lastSt + ")'><span class='fa fa-angle-double-right'></span></button>";

                    if (jmlPage >= 5) {
                        if (curIdx >= 3) {
                            var idx_start = curIdx - 2;
                            var idx_end = idx_start + 5;
                            if (idx_end >= jmlPage) idx_end = jmlPage;
                        } else {
                            var idx_start = 1;
                            var idx_end = 5;
                        }
                        for (var j = idx_start; j <= idx_end; j++) {
                            st = (j * data["limit"]) - jmlData;
                            if (curSt == st) btn = "btn-success";
                            else btn = "btn-default";
                            btnIdx += "<button class='btn " + btn + " btn-sm' onclick='getTindakan(" + st + ")'>" + j + "</button>";
                        }
                    } else {
                        for (var j = 1; j <= jmlPage; j++) {
                            st = (j * data["limit"]) - jmlData;
                            if (curSt == st) btn = "btn-success";
                            else btn = "btn-default";
                            btnIdx += "<button class='btn " + btn + " btn-sm' onclick='getTindakan(" + st + ")'>" + j + "</button>";
                        }
                    }
                    pagination += btnFirst + btnIdx + btnLast;
                    $('#pagination-tindakan').html(pagination);
                }
            }
        }
    });
}

function setPermintaantindakan(id_pemeriksaan) {
    var pilihan = parseInt($('#id_pemeriksaan' + id_pemeriksaan + ':checked').val());
    var idsubjenis = $('#idsubjenispemeriksaan').val();
    var subjenis = $('#idsubjenispemeriksaan :selected').html();
    //alert(subjenis);
    if (pilihan > 0) {
        var formdata = {}
        formdata['id_daftar'] = $('#pp_id_daftar').val();
        formdata['reg_unit'] = $('#pp_reg_unit').val();
        formdata['id_jenispemeriksaan'] = $('#idjenispemeriksaan').val();
        formdata['jenis_pemeriksaan'] = $('#idjenispemeriksaan :selected').html();
        formdata['id_subjenispemeriksaan'] = idsubjenis;
        formdata['subjenispemeriksaan'] = subjenis;
        formdata['id_pemeriksaan'] = id_pemeriksaan;
        formdata['nama_pemeriksaan'] = $('#nama_pemeriksaan' + id_pemeriksaan).html();
        console.clear();
        console.log(formdata);
        $.ajax({
            url: base_url + 'nota_tagihan/setPermintaantindakan',
            type: "POST",
            data: formdata,
            dataType: "JSON",
            success: function (data) {
                //alert(data.message);
                getPemeriksaan(0);
                pemeriksaanPilihan();
                console.clear();
                console.log(formdata);
            },
            error: function (jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    } else {

    }

}

function pemeriksaanPilihan() {
    var id_penunjang = $('#id_penunjang').val();
    var q = '';
    var pilihan = $('#pilihan:checked').val();
    var id_daftar = $('#pp_id_daftar').val();
    var reg_unit = $('#pp_reg_unit').val();
    if (pilihan != 1) pilihan = 0;

    var url = base_url + "nota_tagihan/pemeriksaan_pilihan/" + reg_unit;
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            console.log(url);
            if (data["status"] == true) {
                var row = data["data"];
                var jmlData = row.length;
                var limit = data["limit"];
                var tabel = "";

                tabel += '<div class="row">'
                //Create Tabel
                var jenispemeriksaan = "";
                for (var i = 0; i < jmlData; i++) {
                    //start++;
                    if (i == 0) {
                        tabel += '<div class="col-md-12"><legend>' + row[i]["jenis_pemeriksaan"] + '</legend></div>';
                    } else {
                        if (jenispemeriksaan != row[i]['id_jenispemeriksaan']) {
                            tabel += '<div class="col-md-12" style="margin-top:20px;"><legend>' + row[i]["jenis_pemeriksaan"] + '</legend></div>';
                        }
                    }
                    tabel += "<div class='col-xs-3'>";
                    tabel += "<input type='checkbox' value='" + row[i]["id_pemeriksaan"] + "' name='pemeriksaan[]' id='pemeriksaan" + row[i]["id_pemeriksaan"] + "' checked onclick='hapusTindakan(\"" + row[i]["idtemp"] + "\")'><b> " + row[i]["nama_pemeriksaan"] + "</b>";
                    tabel += "</div>";
                    jenispemeriksaan = row[i]["id_jenispemeriksaan"];
                }
                tabel += "</div>";
                console.log("...");
                console.log(tabel);
                $('#list-tindakan').html(tabel);

            }
        }
    });
}


function listTindakan(start = 0) {
    var id_penunjang = $('#id_penunjang').val();
    var q = "";
    var id_daftar = $('#pp_id_daftar').val();
    var reg_unit = $('#pp_reg_unit').val();
    var url = base_url + "nota_tagihan/tindakan/" + id_penunjang + "?start=" + start + "&q=" + q + "&pilihan=1&id_daftar=" + id_daftar + "&reg_unit=" + reg_unit;
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            console.log(url);
            if (data["status"] == true) {
                var row = data["data"];
                var jmlData = row.length;
                var limit = data["limit"];
                var tabel = "<table class='table table-bordered'>";
                //Create Tabel
                var tindakan = "";
                for (var i = 0; i < jmlData; i++) {
                    start++;
                    tabel += "<tr>";
                    tabel += "<td><input type='checkbox' value='" + row[i]["id_tarif"] + "' name='tindakan[]' id='tindakan" + row[i]["id_tarif"] + "' checked onclick='hapusTindakan(\"" + row[i]["idtemp"] + "\")'></td>";
                    tabel += "<td>" + row[i]["layanan"] + "</td>";
                    tabel += "</tr>";
                    if (i == jmlData - 1) tindakan += row[i]["id_tarif"];
                    else tindakan += row[i]["id_tarif"] + ",";
                }
                tabel += "</table>";
                tabel += "<input type='hidden' name='layanan' id='layanan' value='" + tindakan + "'>";
                $('#list-tindakan').html(tabel);

            }
        }
    });
}

function hapusTindakan(idtemp) {
    var url = base_url + "nota_tagihan/hapustemptindakan/" + idtemp;
    //console.clear();
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //menghitung jumlah data
            getPemeriksaan(0);
            pemeriksaanPilihan(0);
        }
    });
}

function simpanPulang() {
    var id_daftar = $('#id_daftar').val();
    var url = base_url + "nota_tagihan/cek_kwitansi/" + id_daftar;
    console.log(url);
    $.ajax({
        url: base_url + "nota_tagihan/cek_kwitansi/" + id_daftar,
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            if (data["status"] == 1) {
                simpanPasienPulang();
            } else if (data["status"] == 2) {
                swal({
                        title: "Apakah Anda Yakin?",
                        text: data["message"],
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Ya, Saya Yakin!",
                        cancelButtonText: "Tidak, Tolong Batalkan!",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            simpanPasienPulang();
                        } else {
                            swal("Batal", "Data Tidak jadi disimpan :)", "error");
                        }
                    });
            }else{
                swal({
                    title: "Peringatan..!",
                    text: data["message"],
                    type: "warning",
                    timer: 5000
                });
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            swal({
                title: "Terjadi Kesalahan..!",
                text: "Gagal Saat Pengambilan data",
                type: "error",
                timer: 5000
            });
        }
    });

}
function showMessage(title,message,type){
    swal({
        title: title,
        text: message,
        type: type,
        timer: 5000
    });
}
function simpanPasienPulang() {
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
    formData['jns_layanan'] = $('#jns_layanan').val();
    formData['jns_kunjungan'] = $('#jns_kunjungan').val();
    formData['kasus_penyakit'] = $('#kasus_penyakit').val();
    formData['id_cara_bayar'] = $('#id_cara_bayar').val();
    formData['cara_bayar'] = $('#id_cara_bayar :selected').html();
    formData['no_bpjs'] = $('#no_bpjs').val();
    formData['no_jaminan'] = $('#no_jaminan').val();
    formData['id_tindakan_pelayanan'] = $('#id_tindakan_pelayanan').val();
    formData['tindakan_pelayanan'] = $('#id_tindakan_pelayanan :selected').html();

    if (formData['id_daftar'] == "") {
        showMessage('Peringatan', 'Ops. No.Reg RS kosong. Silahkan pilih pasien dan pastikan No.Reg RS tampil', 'warning');
        //alert('Ops. No.Reg RS kosong. Silahkan pilih pasien dan pastikan No.Reg RS tampil');
    } else if (formData['tgl_masuk'] == "") {
        showMessage('Peringatan', 'Ops. Tanggal masuk kosong. Silahkan pilih pasien dan pastikan tanggal masuk tampil', 'warning');
        //alert('Ops. Tanggal masuk kosong. Silahkan pilih pasien dan pastikan tanggal masuk tampil');
    } else if (formData['tgl_keluar'] == "") {
        showMessage('Peringatan', 'Ops. Tanggal pulang kosong. Silahkan isi tanggal pulang pasien', 'warning');
        //alert('Ops. Tanggal pulang kosong. Silahkan isi tanggal pulang pasien');
        $('#tgl_keluar').focus();
    } else if (formData['nomr'] == "") {
        showMessage('Peringatan', 'Ops. No.MR kosong. Silahkan pilih pasien dan pastikan No.MR tampil', 'warning');
        //alert('Ops. No.MR kosong. Silahkan pilih pasien dan pastikan No.MR tampil');
    } else if (formData['id_cara_keluar'] == "") {
        showMessage('Peringatan', 'Ops. Cara keluar kosong. Silahkan pilih option cara keluar', 'warning');
        //alert('Ops. Cara keluar kosong. Silahkan pilih option cara keluar');
        $('#id_cara_keluar').focus();
    } else if (formData['dpjp'] == "") {
        showMessage('Peringatan', 'Ops. DPJP kosong. Silahkan pilih option Dokter Penanggung Jawab', 'warning');
        //alert('Ops. DPJP kosong. Silahkan pilih option Dokter Penanggung Jawab');
        $('#dpjp').focus();
    } else if (formData['id_tindakan_pelayanan'] == "") {
        showMessage('Peringatan', 'Ops. Tindakan pelayanan kosong.  Silahkan pilih option tindakan pelayanan.', 'warning');
        //alert('Ops. Tindakan pelayanan kosong.  Silahkan pilih option tindakan pelayanan.');
        $('#id_tindakan_pelayanan').focus();
    } else {
        $.ajax({
            url: base_url + 'nota_tagihan/simpan_pulang',
            type: "POST",
            data: formData,
            dataType: "JSON",
            success: function (data) {
                alert(data.message);
                if (data.code == 200) {
                    $('#divCariPasien').show();
                    $('#divTabelPendaftaranPasien').hide();
                    $('#divDataPasien').hide();
                    window.location.href=base_url + "nota_tagihan/ranap";
                    //location.reload()
                }
            },
            error: function (jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    }
}

function addSuratKontrol() {
    $('#data-pulang').hide();
    $('#form-surat-kontrol').show();
}

function cancelSuratKontrol() {
    $('#data-pulang').show();
    $('#form-surat-kontrol').hide();
}

function addSuratRujukan() {
    $('#data-pulang').hide();
    $('#form-surat-rujukan').show();
}

function cancelSuratRujukan() {
    $('#data-pulang').show();
    $('#form-surat-rujukan').hide();
}

function batalPulang(a) {
    var x = confirm("Apakah anda yakin akan membatalkan status pulang pasien ini ?");
    if (x) {
        if (a == "") {
            alert('Ops. Kode tidak ditemukan. coba ulangi lagi');
        } else {
            $.ajax({
                url: base_url + "pasien_pulang/batalPulang",
                type: "POST",
                data: {
                    idx: a
                },
                dataType: "JSON",
                success: function (data) {
                    if (data.code == 200) {
                        location.reload();
                    } else {
                        tampilkanPesan('error', data.message)
                    }
                },
                error: function (jqXHR, ajaxOption, errorThrown) {
                    console.log(jqXHR.responseText);
                }
            });
        }
    }
}

function buatSuratKontrol() {
    var formData = {};
    formData['id_daftar'] = $('#id_daftar').val();
    formData['reg_unit'] = $('#reg_unit').val();
    formData['nomr'] = $('#nomr').val();
    formData['nama_pasien'] = $('#nama_pasien').val();
    formData['jns_kelamin'] = $('#jns_kelamin').val();
    formData['tgl_lahir'] = $('#tgl_lahir').val();
    formData['kodeicd'] = $('#icd').val();
    formData['diagnosa'] = $('#diagnosa').val();
    formData['terapi'] = $('#terapi').val();
    formData['tgl_rujukan'] = $('#tgl_rujukan').val();
    formData['alasan_kontrol'] = $('#alasan_kontrol').val();
    formData['rencana_tindak_lanjut'] = $('#rencana_tindak_lanjut').val();
    formData['id_ruang'] = $('#id_ruang').val();
    formData['nama_ruang'] = $('#id_ruang :selected').html();
    formData['iddokter'] = $('#iddokter').val();
    formData['nama_dokter'] = $('#iddokter :selected').html();
    formData['tgl_kontrol'] = $('#tgl_kontrol').val();
    if (formData['id_daftar'] == "") {
        alert('Ops. No.Reg RS kosong. Silahkan pilih pasien dan pastikan No.Reg RS tampil');
    } else if (formData['tgl_kontrol'] == "") {
        alert('Ops. Tanggal kontrol Masih Kosong');
    } else if (formData['diagnosa'] == "") {
        alert('Ops. Diagnosa kosong. Silahkan isi diagnosa pasien');
        $('#diagnosa').focus();
    } else if (formData['nomr'] == "") {
        alert('Ops. No.MR kosong. Silahkan pilih pasien dan pastikan No.MR tampil');
    } else {
        $.ajax({
            url: base_url + 'nota_tagihan/buat_surat_kontrol',
            type: "POST",
            data: formData,
            dataType: "JSON",
            success: function (data) {
                alert(data.message);
                if (data.code == 200) {
                    location.reload();
                }
            },
            error: function (jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    }
}

function buatSuratRujukan() {
    var formData = {};
    formData['noSep'] = $('#noSep').val();
    formData['tglRujukan'] = $('#tglRujukan').val();
    formData['jnsPelayanan'] = $('#jnsPelayanan').val();
    formData['tipeRujukan'] = $('#tipeRujukan').val();
    formData['diagnosaDokter'] = $('#diagnosaDokter').val();
    formData['poliRujukan'] = $('#poliRujukan').val();
    formData['namaPoliRujukan'] = $('#namapoliRujukan').val();
    formData['kodeppkDirujuk'] = $('#kodeppkDirujuk').val();
    formData['namappkDirujuk'] = $('#namappkDirujuk').val();
    formData['terapi'] = $('#terapi').val();
    formData['tglRencanaKunjungan'] = $('#tgl_rencana_kunjungan').val();
    formData['id_daftar'] = $('#id_daftar').val();
    formData['reg_unit'] = $('#reg_unit').val();
    formData['noMr'] = $('#nomr').val();
    formData['nama'] = $('#nama').val();
    formData['kelamin'] = $('#jns_kelamin').val();
    formData['noKartu'] = $('#noKartu').val();
    formData['iddokter'] = $('#iddokter').val();
    formData['catatan'] = $('#catatan').val();
    formData['poliPerujuk'] = $('#poliPerujuk').val();
    formData['namaPoliPerujuk'] = $('#poliPerujuk :selected').html();
    formData['nama_dokter'] = $('#iddokter :selected').html();
    if (formData['id_daftar'] == "") {
        alert('Ops. No.Reg RS kosong. Silahkan pilih pasien dan pastikan No.Reg RS tampil');
    } else if (formData['tglRencanaKunjungan'] == "") {
        alert('Ops. Tanggal Rencana kunjungan Masih Kosong');
    } else if (formData['diagnosa'] == "") {
        alert('Ops. Diagnosa kosong. Silahkan isi diagnosa pasien');
        $('#diagnosa').focus();
    } else if (formData['nomr'] == "") {
        alert('Ops. No.MR kosong. Silahkan pilih pasien dan pastikan No.MR tampil');
    } else {
        $.ajax({
            url: base_url + 'nota_tagihan/buat_surat_rujukan',
            type: "POST",
            data: formData,
            dataType: "JSON",
            success: function (data) {
                alert(data.message);
                if (data.code == 200) {
                    location.reload();
                }
            },
            error: function (jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    }
}

function konfirmasi(reg_unit) {
    $('#modalKonfirmasi').modal('show');
}

function finsihTransksi(reg_unit, ada_obat = 0) {

    //if(confirm('Dengan melakukan finish transaksi \nakan mengakibatkan system mengunci form input tindakan\napakah anda yakin semua tindakan sudah diinputkan?')){
    var url = base_url + 'nota_tagihan/finsihTransksi/' + reg_unit + "/" + ada_obat;
    console.log(url);
    $.ajax({
        url: base_url + 'nota_tagihan/finsihTransksi/' + reg_unit + "/" + ada_obat,
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            //alert(data.message);
            if (data.code == 200) {
                location.reload();
            } else {
                alert(data.message);
            }
        },
        error: function (jqXHR, ajaxOption, errorThrown) {
            console.log(jqXHR.responseText);
        }
    });
    //}
}

function unfinsihTransksi(reg_unit) {
    if (confirm('Apakah anda akan mengubah transaksi, Transaksi hanya bisa diubah jika kwitansi belum dicetak?')) {
        $.ajax({
            url: base_url + 'nota_tagihan/unfinsihTransksi/' + reg_unit,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                alert(data.message);
                if (data.code == 200) {
                    location.reload();
                }
            },
            error: function (jqXHR, ajaxOption, errorThrown) {
                console.log(jqXHR.responseText);
            }
        });
    }
}

function getJenisPemeriksaan() {
    var id_penunjang = $('#id_penunjang').val();
    var q = $('#keyword-tindakan').val();
    var pilihan = $('#pilihan:checked').val();
    var id_daftar = $('#pp_id_daftar').val();
    var reg_unit = $('#pp_reg_unit').val();
    if (pilihan != 1) pilihan = 0;
    //alert(pilihan);
    var url = base_url + "nota_tagihan/jenispemeriksaan/" + id_penunjang;
    console.log(url);
    //alert(url);
    $.ajax({
        async: false,
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            console.log(url);
            if (data["status"] == true) {
                var row = data["data"];
                var jmlData = row.length;
                var limit = data["limit"]
                var tabel = "";
                var option = "";
                //Create Tabel
                for (var i = 0; i < jmlData; i++) {
                    //

                    option += "<option value='" + row[i]["idx"] + "'>" + row[i]["jenis_pemeriksaan"] + "</option>";
                }
                getPemeriksaan(row[0]["idx"]);

                $('#idjenispemeriksaan').html(option);
                //Create Pagination

            }

        }
    });
}


function getPemeriksaan(idjenis = 0) {
    if (idjenis == 0) idjenis = $('#idjenispemeriksaan').val();

    var q = $('#keyword-tindakan').val();
    var pilihan = $('#pilihan:checked').val();
    var id_daftar = $('#pp_id_daftar').val();
    var reg_unit = $('#pp_reg_unit').val();
    if (pilihan != 1) pilihan = 0;
    //alert(pilihan);

    var url = base_url + "nota_tagihan/pemeriksaan/" + idjenis + "/" + reg_unit + "?pilihan=" + pilihan;
    //console.clear();
    //alert(url);
    console.log(url);
    //alert(url);
    $.ajax({
        async: false,
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            console.log(url);
            getSubJenispemeriksaan();
            if (data["status"] == true) {
                var row = data["data"];
                var jmlData = row.length;
                var limit = data["limit"];
                var tabel = "<table class='table table-bordered'>";
                var konfirm = false;
                var simpan = 0;
                if (pilihan == 1) {
                    konfirm = confirm("Apakah anda ingin memilih semua pemeriksaan ");
                    if (!konfirm) {
                        $("#pilihan").prop("checked", false);
                        setTimeout(getPemeriksaan(0), 500);
                        return false;
                    } else {
                        simpan = 1;
                    }
                }
                /**
                 * memunculkan form dahak
                 */
                cekJenisPemeriksaan(idjenis);

                //Create Tabel
                for (var i = 0; i < jmlData; i++) {
                    //if(simpan==1) setPermintaantindakan(row[i]["id_pemeriksaan"]);
                    tabel += "<tr>";
                    if (pilihan == 1) {
                        tabel += "<td><input type='checkbox' value='" + row[i]["id_pemeriksaan"] + "' onclick='setPermintaantindakan(\"" + row[i]["id_pemeriksaan"] + "\")' name='id_pemeriksaan" + row[i]["id_pemeriksaan"] + "' id='id_pemeriksaan" + row[i]["id_pemeriksaan"] + "' checked></td>";
                    } else {
                        tabel += "<td><input type='checkbox' value='" + row[i]["id_pemeriksaan"] + "' onclick='setPermintaantindakan(\"" + row[i]["id_pemeriksaan"] + "\")' name='id_pemeriksaan" + row[i]["id_pemeriksaan"] + "' id='id_pemeriksaan" + row[i]["id_pemeriksaan"] + "'></td>";
                    }
                    tabel += "<td><span id='nama_pemeriksaan" + row[i]["id_pemeriksaan"] + "'>" + row[i]["nama_pemeriksaan"] + "</span></td>";
                    tabel += "</tr>";
                }
                tabel += "</table>";
                $('#data-tindakan').html(tabel);
                //console.clear();


                if (simpan == 1) {
                    for (var j = 0; j < jmlData; j++) {
                        setPermintaantindakan(row[j]["id_pemeriksaan"])
                    }
                    $("#pilihan").prop("checked", false);
                    getPemeriksaan(0);
                    return false;
                }

            }



        }
    });
}

function getSubJenispemeriksaan() {
    var jenis = $('#idjenispemeriksaan').val();
    var url = base_url + "nota_tagihan/subjenispemeriksaan/" + jenis;
    //console.clear();
    //console.log(url);
    $.ajax({
        async: false,
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            //console.log(url);

            if (data["status"] == true) {
                var sub = data["data"];
                var jmlData = sub.length;
                //alert(jmlData);
                var controlsub = "";
                if (jmlData > 0) {
                    controlsub += '<div class="form-group">';
                    controlsub += '<label>SUB JENIS PEMERIKSAAN</label>'
                    controlsub += "<select class='form-control' name='idsubjenispemeriksaan' id='idsubjenispemeriksaan'>";
                    for (var i = 0; i < jmlData; i++) {
                        controlsub += "<option value='" + sub[i]["idx"] + "'>" + sub[i]["sub_jenispemeriksaan"] + "</option>";
                    }
                    controlsub += "</select>";
                    controlsub += '</div>';
                } else {
                    controlsub += "<input type='hidden' name='idsubpemeriksaan' id='idsubpemeriksaan' value='0'>"
                }
                $('#subjenispemeriksaan').html(controlsub);
            }
        }
    });
}

function cekJenisPemeriksaan(idjenis) {
    var url = base_url + "nota_tagihan/cekpemeriksaan/" + idjenis;
    ////console.clear();
    //console.log(url);
    $.ajax({
        async: false,
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            //console.log(url);
            if (data["status"] == true) {
                var row = data["data"];
                $('#template').val(row["template"]);
                $('.khusus').hide();
                if (row["template"] == "DahakTB") {
                    $('#dahak').show();
                } else if (row["template"] == "Patologi") {
                    $('#patologi').show();
                } else if (row["template"] == "Radiologi") {
                    $('#radiologi').show();
                } else {
                    $('#dahak').hide();
                }
            }
        }
    });
}

function getPermintaanPenunjang(reg_unit) {
    var url = base_url + "nota_tagihan/data_permintaan_penunjang/" + reg_unit;
    $.ajax({
        async: false,
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            if (data["status"] == true) {
                var sub = data["data"];
                var jmlData = sub.length;
                var tabel = "";
                var no = 1;
                //alert(jmlData);
                if (jmlData > 0) {
                    for (var i = 0; i < jmlData; i++) {
                        tabel += "<tr>";
                        tabel += "<td>" + no + "</td>";
                        tabel += "<td>" + sub[i]["nama_penunjang"] + "</td>";
                        tabel += "<td>" + sub[i]["nama_dokter_pengirim"] + "</td>";
                        tabel += "<td>" + sub[i]["diagnosa"] + "</td>";
                        tabel += "<td>" + sub[i]["keterangan"] + "</td>";
                        tabel += "<td><a target='_blank' href='" + base_url + "nota_tagihan/surat_permintaan/" + sub[i]["idx"] + "' class='btn btn-default btn-xs'><span class='fa fa-print'></span> Cetak Surat Permintaan</a></td>";
                        tabel += "</tr>";
                        no++;
                    }
                } else {
                    tabel += "<tr>";
                    tabel += "<td colspan=5>Data Tidak Ada</td>";
                    tabel += "</tr>";
                }

            } else {
                tabel += "<tr>";
                tabel += "<td colspan=5>" + data["message"] + "</td>";
                tabel += "</tr>";
            }
            $('#data_permintaan_penunjang').html(tabel);
        }
    });

}

function getRujukanInternal(reg_unit) {
    var url = base_url + "nota_tagihan/data_rujukan_internal/" + reg_unit;
    console.log(url);
    $.ajax({
        async: false,
        url: url,
        type: "GET",
        dataType: "json",
        data: {
            get_param: 'value'
        },
        success: function (data) {
            if (data["status"] == true) {
                var sub = data["data"];
                var jmlData = sub.length;
                var tabel = "";
                var no = 1;
                //alert(jmlData);
                if (jmlData > 0) {
                    for (var i = 0; i < jmlData; i++) {
                        tabel += "<tr>";
                        tabel += "<td>" + no + "</td>";
                        tabel += "<td>" + sub[i]["nama_poli"] + "</td>";
                        tabel += "<td>" + sub[i]["nama_dokter_pengirim"] + "</td>";
                        tabel += "<td>" + sub[i]["keterangan"] + "</td>";
                        //tabel += "<td><a target='_blank' href='" + base_url + "nota_tagihan/surat_permintaan/" + sub[i]["idx"] + "' class='btn btn-default btn-xs'><span class='fa fa-print'></span> Cetak Surat Permintaan</a></td>";
                        tabel += "</tr>";
                        no++;
                    }
                } else {
                    tabel += "<tr>";
                    tabel += "<td colspan=5>Data Tidak Ada</td>";
                    tabel += "</tr>";
                }

            } else {
                tabel += "<tr>";
                tabel += "<td colspan=5>" + data["message"] + "</td>";
                tabel += "</tr>";
            }
            $('#data_rujukan_internal').html(tabel);
        }
    });

}


function simpanPermintaanPenunjang() {
    var template = $('#template').val();
    var alasan_pemeriksaan = "diagnosa";
    var bulanke = "";
    var asal_jaringan = "";
    var bahan_fiksasi = "";
    var haid_terakhir = "";
    var lokasi_jaringan = "";
    if (template == "DahakTB") {
        alasan_pemeriksaan = $("input[name='alasanpemeriksaan']:checked").val();
        bulanke = $('#bulanke').val();
    } else if (template == "Patologi") {
        asal_jaringan = $('#asal_jaringan').val();
        bahan_fiksasi = $('#bahan_fiksasi').val();
        haid_terakhir = $('#haid_terakhir').val();
        lokasi_jaringan = $('#lokasi_jaringan').val();
    }
    var formdata = {}
    formdata['id_daftar'] = $('#pp_id_daftar').val();
    formdata['reg_unit'] = $('#pp_reg_unit').val();
    formdata['nomr'] = $('#pp_nomr').val();
    formdata['nama_pasien'] = $('#pp_nama').val();
    formdata['ruang_pengirim'] = $('#pp_ruang_pengirim').val();
    formdata['nama_ruang_pengirim'] = $('#pp_nama_ruang_pengirim').val();
    formdata['id_penunjang'] = $('#id_penunjang').val();
    formdata['nama_penunjang'] = $('#id_penunjang :selected').html();
    formdata['dokter_pengirim'] = $('#dokter_pengirim').val();
    formdata['nama_dokter_pengirim'] = $('#dokter_pengirim :selected').html();
    formdata['keterangan'] = $('#keterangan').val();
    formdata['diagnosa'] = $('#diagnosa').val();
    formdata['template'] = $('#template').val();
    formdata['idsubjenispemeriksaan'] = $('#idsubjenispemeriksaan').val();
    formdata['subjenispemeriksaan'] = $('#idsubjenispemeriksaan :selected').html();
    formdata['asal_jaringan'] = asal_jaringan;
    formdata['bahan_fiksasi'] = bahan_fiksasi;
    formdata['haid_terakhir'] = haid_terakhir;
    formdata['lokasi_jaringan'] = lokasi_jaringan;
    formdata['alasanpemeriksaan'] = alasan_pemeriksaan;
    formdata['bulanke'] = bulanke;
    $.ajax({
        url: base_url + "nota_tagihan/simpanPermintaanPenunjang",
        type: "POST",
        data: formdata,
        dataType: "JSON",
        success: function (data) {
            alert(data.message);
            if (data.code == 200) {
                $('#modalPermintaanPenunjang').modal('hide');
                var reg_unit = $('#pp_reg_unit').val();
                getPermintaanPenunjang(reg_unit);
            }
        },
        error: function (jqXHR, ajaxOption, errorThrown) {
            console.log(jqXHR.responseText);
        }
    });
}

function lokasi(idlokasi,nmlokasi){
    // alert('lokasi');
    $('#lokasi').val(idlokasi);
    $('.lokasi').removeClass('bg-red');
    $('.lokasi').addClass('bg-green');
    $('#lokasi' + idlokasi).removeClass('bg-green');
    $('#lokasi' + idlokasi).addClass('bg-red');
    $('#formresep').show();
    $('#warning').html('<div class="panel panel-danger" style="padding:10px">Obat yang diresepkan harus diambil pasien di '+nmlokasi+'</div>')

}