$(document).ready(function () {
    $('select').not('#jenis_obat').not('#satuanAP').not('#waktu2').not('#waktu3').not('#cara_pakai').select2({
        placeholder: 'Pilih Option '
    });
    console.clear();

    // $('select').not('#id_penunjang').not('#id_kelas').not('#id_kamar').not('#pr_id_ruang').not('#pr_id_kamar').not('#lokasi').not('#jns_obat').not('#satuanAP').not('#cara_pakai').not('#waktu2').not('#waktu3').not('#keterangan').not('#op_idjenistindakan').not('#op_polipengirim').not('#op_kelasid').not('#op_layanan').not('#op_dokterid').not('#id_pemeriksaan').select2({
    //     placeholder: 'Pilih Option '
    // });
    //alert("Select");
    $.widget("custom.cariobat", $.ui.autocomplete, {
        _create: function () {
            this._super();
            this.widget().menu("option", "items", "> li:not(.ui-autocomplete-header)");
        },
        _renderMenu(ul, items) {
            var self = this;
            ul.addClass("container");

            let header = {
                KDBRG: "KDBRG",
                NMBRG: "NMBRG",
                JSTOK: "STOK",
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
                "<div class='col-xs-2'>" + item.KDBRG + "</div>" +
                "<div class='col-xs-4'>" + item.NMBRG + "</div>" +
                "<div class='col-xs-2'>" + item.JSTOK + "</div>" +
                "</div>";
            $li.html($content);
            return $li.appendTo(ul);
        }

    });
    // create the autocomplete
    $("#keyword").cariobat({
        minLength: 1,
        source: function (request, response) {
            var kdlokasi = $('#lokasi').val();
            var url = base_url + "resep/cariobat/" + kdlokasi + "?start=0";
            console.log(url);
            $.ajax({
                url: url,
                dataType: "JSON",
                method: "POST",
                data: {
                    param1: request.term
                },
                success: function (data) {
                    console.log(data)
                    var barang = data.data;
                    response(barang.slice(0, 15));
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

            /*resetSapLainnya();
            resetCpLainnya();
            reseWpPakaiLainnya();
            reseWpPakaiLainnya3();
            reseKeterangan();*/
            $("#keyword").removeClass("ui-autocomplete-loading");
            
            //pilihObat(ui.item['KDBRG'], ui.item['NMBRG'], ui.item['NMSATUAN'], ui.item['NMKTBRG'], ui.item['JSTOK'], ui.item['HJUAL']);
            pilihObat(ui.item['KDBRG'], ui.item['NMBRG'], ui.item['JSTOK'], ui.item['HJUAL']);
            return false;
        },
    });
    $(".inputmask").inputmask();
    $('#jenis_obat').keyup(function(ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            var value = $('#jenis_obat').val();
            if (value == "") $('#jenis_obat').focus();
            else {
                $('#jmlHari').focus();
            }
        }
    });
    $('#jenis_obat').keyup(function(ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            var value = $('#jenis_obat').val();
            if (value == "") $('#jenis_obat').focus();
            else {
                $('#jmlHari').focus();
            }
        }
    });
    $('#jmlHari').change(function() {
        getWaktupakai();
    });
    $('#jmlHari').keyup(function(ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            var value = $('#jmlHari').val();
            if (value == "") $('#jmlHari').focus();
            else {
                $('#jmlSatuanAP').focus();
            }
        }
    });
    

    $('#jmlSatuanAP').keyup(function(ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            var value = $('#jmlSatuanAP').val();
            if (value == "") $('#jmlSatuanAP').focus();
            else {
                $('#satuanAP').focus();
            }
        }
    });

    $('#satuanAP').keyup(function(ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            var value = $('#satuanAP').val();
            if (value == "") $('#satuanAP').focus();
            else {
                $('#waktu1').focus();
            }
        }
    });

    $('#waktu1').keyup(function(ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            var value = $('#waktu1').val();
            if (value == "") $('#waktu1').focus();
            else {
                $('#waktu2').focus();
            }
        }
    });

    $('#waktu2').keyup(function(ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            var value = $('#waktu2').val();
            if (value == "") $('#waktu2').focus();
            else {
                $('#waktu3').focus();
            }
        }
    });

    $('#waktu3').keyup(function(ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            var value = $('#waktu3').val();
            if (value == "") $('#waktu3').focus();
            else {
                $('#keterangan').focus();
            }
        }
    });
    $('#keterangan').keyup(function(ev) {
        var event = ev.keyCode | ev.witch;
        if (event == 13) {
            var value = $('#keterangan').val();
            if (value == "") $('#keterangan').focus();
            else {
                $('#finish').focus();
            }
        }
    });
});

function pilihObat(kode, nama, stok) {
    if (parseInt(stok) <= 0) {
        alert("Maaf Stok " + nama + " Kosong");
        return false;
    }
    $('.step').hide();
    $('#step2').show();
    
    $('#KDBRG').val(kode);
    $('#NMBRG').val(nama);
    $('#JSTOK').val(stok);
    $('#JMLJUAL').focus();
    getSatuan();
    getCarapakai();
    getWaktupakai();
    getKeterangan();
    // $("#modal_transaksi").modal("show");
    // $('#modal_transaksi').on('shown.bs.modal', function (e) {
    //     // do something...
    //     $('#HJUAL').focus();
    //     console.clear();
    //     //getSatuan();
    //     //getCarapakai();
    //     //getWaktupakai();
    //     //getKeterangan();
    // });
    // $('#KDBRG').val(kode);
    // $('#NMBRG').val(urldecode(nama));
    // $('#JSTOK').val(parseFloat(stok));
    // $('#HJUAL').val(hargajual);
    // $('#keyword').val("");
    // //cariBarang(0);
    // $('#show_barang').val("0");
    // $('#barang').hide();
}
function Step1(){
    $('.step').hide();
    $('#step1').show();
    $('#keyword').val("");
    $('#keyword').focus();
}
function Step2(){
    $('.step').hide();
    $('#step2').show();
    // $('#JMLJUAL').val("");
    $('#JMLJUAL').focus();
}
function Step3(){
    
    var jmlJual=$('#JMLJUAL').val();
    
    if(jmlJual=="" || parseInt(jmlJual)<1){
        alert("Jumlah Jual Tidak Boleh Kosong")
        $('#JMLJUAL').focus();
    }else{
        $('.step').hide();
        $('#step3').show();
        $('#jmlHari').focus();
    }
    
}
function setLokasi(idlokasi,nmlokasi){
    // alert('lokasi');
    $('#lokasi').val(idlokasi);
    $('.lokasi').removeClass('bg-red');
    $('.lokasi').addClass('bg-green');
    $('#lokasi' + idlokasi).removeClass('bg-green');
    $('#lokasi' + idlokasi).addClass('bg-red');
    $('#formresep').show();
    $('#warning').html('<div class="panel panel-danger" style="padding:10px">Obat yang diresepkan harus diambil pasien di '+nmlokasi+'</div>')

}
function getWaktupakai() {
    var periode = $('#jmlHari').val();
    var url = base_url + "resep/waktu_pakai/" + periode;
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
