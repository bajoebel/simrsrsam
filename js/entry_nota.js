const formatter = new Intl.NumberFormat('id-ID');
$(document).ready(function () {
    //kosongkanObjEntry();
    // CREATE WIDGET CARI OBAT AUTOCOMPLETE
    $.widget("custom.caritindakan", $.ui.autocomplete, {
        _create: function () {
            this._super();
            this.widget().menu("option", "items", "> li:not(.ui-autocomplete-header)");
        },
        _renderMenu(ul, items) {
            var self = this;
            ul.addClass("container");

            let header = {
                layanan: "Layanan",
                kelas_layanan: "Kelas Layanan",
                tarif_layanan: "Tarif (Rp)",
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
            var $content = "<div class='row ui-menu-item-wrapper' style='padding:3px 10px'>" +
                "<div class='col-xs-5'>" + item.layanan + "</div>" +
                "<div class='col-xs-2'>" + item.kelas_layanan + "</div>" +
                "<div class='col-xs-3 text-right'>Rp. " + item.tarif_layanan + "</div>" +
                "</div>";
            $li.html($content);


            return $li.appendTo(ul);
        }

    });
    $("#keyword").caritindakan({
        minLength: 0,
        source: function (request, response) {
            var kelas = $('#cmbKelasTarif').val();
            var layanan = $('#jns_layanan').val();
            var id_ruang = $('#id_ruang').val();
            //var alltarif = $('#alltarif').val();
            if ($('#alltarif').is(":checked")) {
                var all = 1;
            }else{
                var all = 0;
            }
            
            var url = base_url + "layanan/caritindakan?kelas_id=" + kelas + "&jns_layanan=" + layanan + "&id_ruang=" + id_ruang + "&all=" + all;
            console.log(url);
            $.ajax({
                url: url,
                dataType: "JSON",
                method: "GET",
                data: {
                    param1: request.term
                },
                success: function (data) {
                    console.log(data)
                    var tarif = data;
                    response(tarif.slice(0, 20));
                },
                error: function (jqXHR, ajaxOption, errorThrown) {
                    console.log(errorThrown);
                }
            });
        },
        focus: function (event, ui) {
            /*$("#KDDOKTER").val(ui.item['NRP']);
            $("#NMDOKTER").val(ui.item['pgwNama']);*/
            $("#keyword").removeClass("ui-autocomplete-loading");
            return false;
        },
        select: function (event, ui) {
            /*$("#KDDOKTER").val(ui.item['NRP']);
            $("#NMDOKTER").val(ui.item['pgwNama']);*/
            $('#keyword').val("");
            //$('#cmbKelasTarif').val(ui.item['kelas_id']);
            $('#txtTindakan').val(ui.item['layanan']);
            $('#id_tarif').val(ui.item['idtarif']);
            $('#jasa_sarana').val(ui.item['jasa_sarana']);
            $('#jasa_pelayanan').val(ui.item['jasa_pelayanan']);
            $('#kategori_id').val(ui.item['kategori_id']);
            $('#kelas_id').val(ui.item['kelas_id']);
            $('#txtTarif').val(formatter.format(ui.item['tarif_layanan']));
            addTindakan();
            return false;
        }
    });
    $('#txtQty').keyup(function () {
        var a = $(this).val();
        var b = $('#txtTarif').val();
        calcTarif();
    });
    $('input').focus(function () {
        return this.select();
    });
});

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return true;
}
function hapusNota(idx){
    var pulang = $('#pulang').val();
    //alert(pulang);
    if (pulang <= 0) {
        var x = confirm("Apakah anda yakin akan menghapus item ini?");
        if (x) {
            $.ajax({
                url: base_url+ 'layanan/hapusnota',
                type: "GET",
                data: {
                    idx: idx
                },
                dataType: "JSON",
                success: function (data) {

                    if (data.status == true) {
                        getNota(0);
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
function addTindakan(){
    $('.detailnota').hide();
    $('#formaddnota').show();
}
function batalTambah(){
    $('.detailnota').show();
    $('#formaddnota').hide();
}
function calcTarif() {
    var a = $('#txtTarif').val().replace('.', '').replace('.', '').replace('.', '');
    var b = $('#txtQty').val();
    a = (a == '' || isNaN(a)) ? 0 : a;
    b = (b == '' || isNaN(b)) ? 0 : b;
    var c = parseFloat(a) * parseFloat(b);
    $('#txtSubTotal').val(formatter.format(c));
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
            url: base_url+'layanan/simpanItem',
            type: "POST",
            data: $.param(postData),
            dataType: "JSON",
            success: function (data) {
                if (data.code == 200) {
                    getNota(1);
                    $('#id_tarif').val('');
                    $('#txtTindakan').val('');
                    $('#jasa_sarana').val('0');
                    $('#jasa_pelayanan').val('0');
                    $('#txtTarif').val('0');
                    $('#txtQty').val('0');
                    $('#txtSubTotal').val('0');
                    $('#kategori_id').val('');
                    $('#kelas_id').val('');
                    $('.detailnota').show();
                    $('#formaddnota').hide();
                    //$('#cmbDokter').val('').trigger('change');
                    $('#keyword').focus();

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
/**Permintaan Penunjang */

function permintaanPenunjang() {
    //var a = $('#id_daftar').val();
    //var b = $('#reg_unit').val();;
    //var c = $('#nomr').val();
    //var d = $('#id_ruang').val();
    //var e = $('#nama_pasien').val();
    //var f = $('#nama_ruang').val();

    /*$('#pp_id_daftar').val(a);
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
    */
    $('#id_penunjang').prop('selectedIndex', 0);
    $('#dokter_pengirim').prop('selectedIndex', 0);

    $('#keterangan').val('');
    $('#modalPermintaanPenunjang').modal('show');
    hapusTindakan(0);

    getTindakan(0);
    listTindakan(0);
    getJenisPemeriksaan();
}
function getPemeriksaan(idjenis = 0) {
    if (idjenis == 0) idjenis = $('#idjenispemeriksaan').val();

    var q = $('#keyword-tindakan').val();
    var pilihan = $('#pilihan:checked').val();
    var id_daftar = $('#pp_id_daftar').val();
    var reg_unit = $('#pp_reg_unit').val();
    if (pilihan != 1) pilihan = 0;
    //alert(pilihan);

    var url = base_url + "layanan/pemeriksaan/" + idjenis + "/" + reg_unit + "?pilihan=" + pilihan;
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
    var url = base_url + "layanan/subjenispemeriksaan/" + jenis;
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