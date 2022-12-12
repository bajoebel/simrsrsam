$(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
	$("#s_diagnosa").autocomplete({
		source: function(request, response) {
			$.ajax({
				url: base_url+"vclaim/referensi/diagnosa",
				dataType: "JSON",
				method: "GET",
				data: {
					param: request.term
				},
				success: function(data) {
					console.clear();
					console.log(data);
					var fk = data.response.diagnosa;
					// console.log(diagnosa);
					response(fk.slice(0, 15));
				},
				error: function(jqXHR, ajaxOption, errorThrown) {
					console.log(errorThrown);
				}
			});
		},
		minLength: 2,
		focus: function(event, ui) {
			$("#s_icd").val(ui.item['kode']);
			$("#s_diagnosa").val(ui.item['nama']);
			$("#s_diagnosa").removeClass("ui-autocomplete-loading");
			return false;
		},
		select: function(event, ui) {
			$("#s_icd").val(ui.item['kode']);
			$("#s_diagnosa").val(ui.item['nama']);
			$("#s_diagnosa").removeClass("ui-autocomplete-loading");
			return false;
		}
	})
	.autocomplete("instance")._renderItem = function(table, item) {
		return $("<tr class='autocomplete'>")
			.append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
			.appendTo(table);
	};

    $("#p_diagnosa").autocomplete({
		source: function(request, response) {
			$.ajax({
				url: base_url+"vclaim/referensi/diagnosa",
				dataType: "JSON",
				method: "GET",
				data: {
					param: request.term
				},
				success: function(data) {
					console.clear();
					console.log(data);
					var fk = data.response.diagnosa;
					// console.log(diagnosa);
					response(fk.slice(0, 15));
				},
				error: function(jqXHR, ajaxOption, errorThrown) {
					console.log(errorThrown);
				}
			});
		},
		minLength: 2,
		focus: function(event, ui) {
			$("#p_icd").val(ui.item['kode']);
			$("#p_diagnosa").val(ui.item['nama']);
			$("#p_diagnosa").removeClass("ui-autocomplete-loading");
			return false;
		},
		select: function(event, ui) {
			$("#p_icd").val(ui.item['kode']);
			$("#p_diagnosa").val(ui.item['nama']);
			$("#p_diagnosa").removeClass("ui-autocomplete-loading");
			return false;
		}
	})
	.autocomplete("instance")._renderItem = function(table, item) {
		return $("<tr class='autocomplete'>")
			.append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
			.appendTo(table);
	};

    $("#nmprocedure").autocomplete({
		source: function(request, response) {
			$.ajax({
				url: base_url+"vclaim/referensi/procedure",
				dataType: "JSON",
				method: "GET",
				data: {
					param: request.term
				},
				success: function(data) {
					console.clear();
					console.log(data);
					var fk = data.response.procedure;
					// console.log(diagnosa);
					response(fk.slice(0, 15));
				},
				error: function(jqXHR, ajaxOption, errorThrown) {
					console.log(errorThrown);
				}
			});
		},
		minLength: 3,
		focus: function(event, ui) {
			$("#procedure").val(ui.item['kode']);
			$("#nmprocedure").val(ui.item['nama']);
			$("#nmprocedure").removeClass("ui-autocomplete-loading");
			return false;
		},
		select: function(event, ui) {
			$("#procedure").val(ui.item['kode']);
			$("#nmprocedure").val(ui.item['nama']);
			$("#nmprocedure").removeClass("ui-autocomplete-loading");
			return false;
		}
	})
	.autocomplete("instance")._renderItem = function(table, item) {
		return $("<tr class='autocomplete'>")
			.append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
			.appendTo(table);
	};
});
function riwayatRujukanKhusus(){
    var bulan=$('#bulan').val();
	var tahun=$('#tahun').val()
	var url = url_call_back+"/vclaim/rujukan/listrujukankhusus/"+bulan+"/"+tahun;
	$.ajax({
	    url     : url,
	    type    : "GET",
	    dataType: "json",
	    data    :  {},
        beforeSend: function() {
            // setting a timeout
            // $(placeholder).addClass('loading');
            $('#btncari').prop('disabled',true);
            $('#iconcari').removeClass('fa-search');
            $('#iconcari').addClass('fa-spinner fa-spin');
        },
	    success : function(data){
	        if(data.metaData.code==200){
	            var histori    = data.response.rujukan;
	            var jmlData=histori.length;
	            var table   = "";
	            //Create Tabel
	            for(var i=0; i<jmlData;i++){
					table+='<tr>'+
                        '<td>'+histori[i].idrujukan+'</td>'+
                        '<td>'+histori[i].norujukan+'</td>'+
                        '<td>'+histori[i].nokapst+'</td>'+
                        '<td>'+histori[i].nmpst+'</td>';
					table+='<td>'+histori[i].diagppk+'</td>';
                    table+='<td>'+histori[i].kelasRawat+'</td>'+
                        '<td>'+histori[i].tglrujukan_awal+'</td>'+
                        '<td>'+histori[i].tglrujukan_berakhir+'</td>'+
                        '<td><a href="#" class="btn btn-primary btn-sm" onclick="hapusRujukanKhusus(\''+histori[i].idrujukan+'\',\''+histori[i].norujukan+'\')"> <span class="fa fa-search"></span> Detail</a></td>'+
                    '</tr>';
	            }
				$('#getdata').html(table);
				// var faskes=$('#r-faskes').val();
	        }else{
				$('#getdata').html('<tr><td colspan="9">Tidak Ada Data</td></tr>');
				tampilkanPesan('warning',data.metaData.message)
			}
	    },
        error: function(xhr) { // if error occured
            tampilkanPesan('error',xhr.responseText);
            $('#btncari').prop('disabled',false);
            $('#iconcari').removeClass('fa-spinner fa-spin');
            $('#iconcari').addClass('fa-search');
            // $(placeholder).append(xhr.statusText + xhr.responseText);
            // $(placeholder).removeClass('loading');
        },
        complete: function() {
            $('#btncari').prop('disabled',false);
            $('#iconcari').removeClass('fa-spinner fa-spin');
            $('#iconcari').addClass('fa-search');
        },
	});
}
function addRujukanKhusus(){
    $('#rujukankhusus').modal('show')
}
function buatRujukanKhusus(){
    var noRujukan=$('#noRujukan').val();
    var icdp=$('#p_icd').val();
    var procedure=$('#procedure').val();
    if(noRujukan=="" || icdp=="" || procedure==""){
        if(noRujukan=="") $('#err_noRujukan').html("No Rujukan Tidak Boleh Kosong")
    }
}
function cariSep(){
    var noKartu=$('#noKartu').val();
	var tglMulai=$('#tglMulai').val()
    var tglSelesai=$('#tglSelesai').val()
	var url = url_call_back+"/vclaim/monitoring/historipelayanan/"+noKartu+"/"+tglMulai+"/"+tglSelesai;
	$.ajax({
	    url     : url,
	    type    : "GET",
	    dataType: "json",
	    data    :  {},
	    success : function(data){
	        if(data.metaData.code==200){
	            var histori    = data.response.histori;
	            var jmlData=histori.length;
	            var table   = "";
	            //Create Tabel
	            for(var i=0; i<jmlData;i++){
					table+='<tr>'+
                        '<td>'+histori[i].noSep+'</td>'+
                        '<td>'+histori[i].tglSep+'</td>'+
                        '<td>'+histori[i].namaPeserta+'</td>'+
                        '<td>'+histori[i].poli+'</td>';
                    if(histori[i].jnsPelayanan==1) table+='<td>Rawat Inap</td>';
                    else table+='<td>Rawat Jalan</td>';
                    table+='<td>'+histori[i].kelasRawat+'</td>'+
                        '<td>'+histori[i].noRujukan+'</td>'+
                        '<td>'+histori[i].ppkPelayanan+'</td>'+
                        '<td>'+histori[i].diagnosa+'</td>'+
                        '<td>'+histori[i].tglPlgSep+'</td>'+
                        '<td><a href="'+base_url+'vclaim/sep/detail/'+histori[i].noSep+'" class="btn btn-primary btn-sm"> <span class="fa fa-search"></span> Detail</a></td>'+
                    '</tr>';
	            }
				$('#getdata').html(table);
				// var faskes=$('#r-faskes').val();
	        }else{
				tampilkanPesan(data.metaData.message)
			}
	    }
	});
}

function editSep(nosep){
	$.ajax({
	    url     : base_url+'vclaim/sep/edit/'+nosep,
	    type    : "POST",
	    dataType: "json",
	    data    : {get_param : 'value'},
	    success : function(data){
			console.log(data)
			// alert(data.jnsPelayanan);
			$('#e-noSep').val(data.noSep);
			
			if(data.jnsPelayanan=='R.Jalan'){
				getdpjp(2,data.tglSep,data.tujuan,data.dpjpLayan);
				$('#e-klsRawatHak').val(3);
				$('#e-klsRawatNaik').val("");
				$('#e-pembiayaan').val("");
				$('#e-penanggungJawab').val("");
				$('.divKelasRawat').hide();
				$('#divPoli').show();
			}else{
				// $('#e-klsRawatNaik').val(data.klsRawatHak);
				getdpjp(1,data.tglSep,data.tujuan,data.dpjpLayan);
				$('#e-klsRawatHak').val(data.klsRawatHak);
				$('#e-klsRawatKet').val("Kelas "+ data.klsRawatHak);
				if(data.klsRawatNaik==0) var naik=""; else var naik=data.klsRawatNaik;
				if(data.pembiayaan==0) var pembiayaan=""; else pembiayaan=data.pembiayaan;
				// alert(data.klsRawatNaik);
				if(parseInt(data.klsRawatNaik)>0){
					// alert('Naik Kelas')
					$("#e-naikKelas").prop('checked', true);
				}else{
					$("#e-naikKelas").prop('checked', false);
				}
				e_naik()
				$('#e-klsRawatNaik').val(naik);
				$('#e-pembiayaan').val(pembiayaan);
				getPj();
				// alert(data.penanggungJawab)
				// $('#e-penanggungJawab').val(data.penanggungJawab);
				$('.divKelasRawat').show();
				$('#divPoli').hide();
			}
			
			$('#e-noMR').val(data.noMr);
			
			// $('#e-tujuan').val(data.tujuan);
			// alert(data.tujuan);
			$('#e-catatan').val(data.catatan);
			
			// $('#tgl_lahir').val(tgl[2] +"-" +tgl[1]+"-"+tgl[0]);
			// $('#e-diagAwal').val(data.diagAwal);
			if(data.eksekutif==1) $("#e-eksekutif").prop('checked', true);
			else $("#e-eksekutif").prop('checked', false);
			// alert(data.cob)
			if(data.cob==1) $("#e-cob").prop('checked', true);
			else $("#e-cob").prop('checked', false);
			if(data.tujuan=='MAT'){
				$('#e-divkatarak').show();
				if(data.eksekutif==1) $("e-katarak").prop('checked', true);
				else $("e-katarak").prop('checked', false);
			}else{
				$('#e-divkatarak').hide();
			}
			
			$('#e-tujuan').val(data.tujuan);
			$('#e-txtnmpoli').val(data.poli);
			$('#e-lakaLantas').val(data.lakaLantas);
			$('#e-tglKejadian').val(data.tglKejadian);
			$('#e-keterangan').val(data.keterangan);
			$('#e-suplesi').val(data.suplesi);
			$('#e-noSepSuplesi').val(data.noSepSuplesi);
			$('#e-kdPropinsi').val(data.kdPropinsi);
			$('#e-kdKabupaten').val(data.kdKabupaten);
			$('#e-kdKecamatan').val(data.kdKecamatan);
			$('#tglSep').val(data.tglSep);
			var diagnosa=data.diagnosa;
			var diagAwal=diagnosa.split(" - ");
			$('#e-diagAwal').val(diagAwal[0]);
			$('#e-txtnmdiagnosa').val(data.diagnosa);
			$('#e-dpjpLayan').val(data.dpjpLayan);
			$('#e-noTelp').val(data.noTelp);
			$('#editsep').modal('show');
	    }
	});
}

function getdpjp(param1="",param2="",param3="",dpjppilih="") {
	
	if(param1=="") param1 = $('#jnsPelayanan').val();
	if(param2=="")  param2 = $('#tglSep').val();
	if(param3=="")  param3 = $('#tujuan').val();
	var url = url_call_back+"/vclaim/referensi/dpjp/"+param1+"/"+param2;
	$.ajax({
	    url     : url,
	    type    : "GET",
	    dataType: "json",
	    data    :  {spesialis : param3},
	    success : function(data){
	        //menghitung jumlah data
			//console.clear();
			//alert(param1 +" " +param2 + " " + param3);
	        console.log(url);
	        if(data.metaData.code==200){
	            var dokter    = data.response.list;
	            var jmlData=dokter.length;
	            var option   = "<option value=''>Pilih Dokter</option>";
	            //Create Tabel
	            for(var i=0; i<jmlData;i++){
					if(dpjppilih==dokter[i]['kode']) option+="<option value='"+dokter[i]["kode"]+"' selected>"+dokter[i]["nama"]+"</option>";
					else option+="<option value='"+dokter[i]["kode"]+"' >"+dokter[i]["nama"]+"</option>";
	                
	            }
				$('#dpjpLayan').html(option);
				$('.dpjpLayan').html(option);
				$('#kodeDPJP').html(option);
	        }else{
				var poli=$('#txtnmpoli').val();
				alert("Error saat pencarian data dokter "+ poli + ' karena ' +data.metaData.message)
			}
	    }
	});
}
function e_naik(){
	// $('#naikKelas').prop("checked", true);
	if ($('#e-naikKelas').is(':checked')) {
		// alert("naik Kelas")
		var kelasRawat=$('#e-klsRawatHak').val();
		kelasRawatNaik=parseInt(kelasRawat)+1;
		// if(kelasRawat==3) var rekomendasi=4;
		// else if(kelasRawat==2) var rekomendasi=3;
		// else var rekomendasi == 2
		var kelasnaik='<div class="form-group">'+
		'<label class="col-md-3 col-sm-3 col-xs-12 control-label">Kelas Layanan</label>'+
		'<div class="col-md-9 col-sm-9 col-xs-12">'+
		'<select class="form-control" id="e-klsRawatNaik" name="klsRawatNaik" >';
		if(kelasRawatNaik==1) kelasnaik+="<option value='1' selected >VVIP</option>"; else kelasnaik+="<option value='1'>VVIP</option>";
		if(kelasRawatNaik==2) kelasnaik+="<option value='2' selected >VIP</option>"; else kelasnaik+="<option value='2'>VIP</option>";
		if(kelasRawatNaik==3) kelasnaik+="<option value='3' selected >Kelas 1</option>"; else  kelasnaik+="<option value='3'>Kelas 1</option>";
		if(kelasRawatNaik==4) kelasnaik+="<option value='4' selected >Kelas 2</option>"; else kelasnaik+="<option value='4'>Kelas 2</option>";
		if(kelasRawatNaik==5) kelasnaik+="<option value='5' selected >Kelas 3</option>"; else kelasnaik+="<option value='5'>Kelas 3</option>";
		if(kelasRawatNaik==6) kelasnaik+="<option value='6' selected >ICCU</option>"; else kelasnaik+="<option value='6'>ICCU</option>";
		if(kelasRawatNaik==7) kelasnaik+="<option value='7' selected >ICU</option>"; else kelasnaik+="<option value='7'>ICU</option>";
		kelasnaik+="</select>";
		kelasnaik+="</div></div>";

		kelasnaik+='<div class="form-group">'+
		'<label class="col-md-3 col-sm-3 col-xs-12 control-label">Pembiayaan</label>'+
		'<div class="col-md-9 col-sm-9 col-xs-12">'+
		'<select class="form-control" id="e-pembiayaan" name="pembiayaan" onchange="getPj()">';
		kelasnaik+="<option value='1'>Pribadi</option>";
		kelasnaik+="<option value='2'>Pemberi Kerja</option>";
		kelasnaik+="<option value='3'>Asuransi Kesehatan Tambahan</option>";
		kelasnaik+="</select>"+
		'<input type="hidden" name="penanggungJawab" id="e-penanggungJawab" value="Pribadi">';
		kelasnaik+="</div></div>";
		$('#e-divnaikkelas').show();
	}else{
		var kelasnaik='<input type="hidden" name="klsRawatNaik" id="e-klsRawatNaik" value="">'+
		'<input type="hidden" name="pembiayaan" id="e-pembiayaan" value="">'+
		'<input type="hidden" name="penanggungJawab" id="e-penanggungJawab" value="">';
		// alert("Tidak Naik Kelas")
		$('#e-divnaikkelas').hide();
	}
	$('#e-divnaikkelas').html(kelasnaik);
	

}
function updateSEP(){
	var eksekutif = $('#e-eksekutif:checked').val();
	var cob = $('#e-cob:checked').val();
	var katarak = $('#e-katarak:checked').val();
	var lakaLantas = $('#e-lakaLantas').val();
	if(cob!=1) cob=0;
	if(katarak!=1) katarak=0;
	if(lakaLantas!=1) lakaLantas=0;
	if(eksekutif!=1) eksekutif=0;

	if(lakaLantas>0){
		lakaLantas=1;
		var penjamin = $('#e-penjamin').val();
		var tglKejadian=$('#e-txtTglKejadian').val();
		var keterangan=$('#e-txtketkejadian').val();
		var suplesi=$('#e-suplesi:checked').val();
		if(suplesi!=1) suplesi=0;
		if(suplesi==1){
			var noSepSuplesi=$('#e-noSepSuplesi').val();
		}else {
			var noSepSuplesi="";
		}
		var kdPropinsi=$('#e-cbprovinsi').val();
		var kdKabupaten=$('#e-cbkabupaten').val();
		var kdKecamatan=$('#e-cbkecamatan').val();
	}else{
		var penjamin = "";
		var tglKejadian="";
		var keterangan="";
		var suplesi=0;
		var noSepSuplesi="";
		var kdPropinsi="";
		var kdKabupaten="";
		var kdKecamatan="";
	}
	
	// var klsRawat=$('#klsRawat').val();
	// alert(klsRawat);
	var formData = {
		idx : $('#e-idx').val(),
		noSep : $('#e-noSep').val(),
		klsRawatHak: $('#e-klsRawatHak').val(), //Baru
		klsRawatNaik: $('#e-klsRawatNaik').val(), //Baru
		pembiayaan: $('#e-pembiayaan').val(), //Baru
		penanggungJawab: $('#e-penanggungJawab').val(), //Baru
		noMR: $('#e-noMR').val(),
		catatan : $('#e-catatan').val(),
		diagAwal : $('#e-diagAwal').val(),
		diagnosa: $('#e-diagnosa').val(),
		tujuan : $('#e-tujuan').val(),
		poli : $('#e-txtnmpoli').val(),
		eksekutif : eksekutif,
		cob : cob,
		katarak : katarak,
		lakaLantas : lakaLantas,
		penjamin : penjamin,
		tglKejadian : tglKejadian,
		keterangan : keterangan,
		suplesi : suplesi,
		noSepSuplesi : noSepSuplesi, 
		kdPropinsi :kdPropinsi,
		kdKabupaten : kdKabupaten,
		kdKecamatan :kdKecamatan,
		dpjpLayan : $('#e-dpjpLayan').val(), //Baru
		namaDpjpLayan : $('#e-dpjpLayan :selected').html(), //Baru
		noTelp : $('#e-noTelp').val(),
		namaTujuan: $('#e-txtnmpoli').val(),
	}
	console.clear();
	// console.log(formData);
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url         : url_call_back+"/vclaim/sep/update",
		type        : "POST",
		data        : formData,
		dataType    : "JSON",
		success     : function(data){
			console.clear();
			console.log(data);
			if(data.metaData.code==200){
				tampilkanPesan('warning',data.metaData.message);
				$('#editsep').modal('hide');
			}else{
				//alert(data.metaData.message);
				tampilkanPesan('warning',data.metaData.message);
			}  
		},
		error       : function(jqXHR,ajaxOption,errorThrown){
			console.log(jqXHR.responseText);                    
		}
	});
}
function updateTglPulang(){
	var formData = {
		noSep : $('#e-noSep').val(),
		statusPulang: $('#u-statusPulang').val(),
		noSuratMeninggal: $('#u-noSuratMeninggal').val(),
		tglMeninggal: $('#u-tglMeninggal').val(),
		tglPulang: $('#u-tglPulang').val(),
		noLPManual: $('#u-noLPManual').val()
	}
	console.clear();
	// console.log(formData);
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url         : url_call_back+"/vclaim/sep/updatepulang",
		type        : "POST",
		data        : formData,
		dataType    : "JSON",
		success     : function(data){
			console.clear();
			console.log(data);
			if(data.metaData.code==200){
				tampilkanPesan('success',data.metaData.message);
				// $('#editsep').modal('hide');
			}else{
				//alert(data.metaData.message);
				tampilkanPesan('warning',data.metaData.message);
			}  
		},
		error       : function(jqXHR,ajaxOption,errorThrown){
			console.log(jqXHR.responseText);                    
		}
	});
}
function pilihStatusPulang(){
	$('#u-noSuratMeninggal').val("");
	$('#u-tglMeninggal').val("");
	var sp = $('#u-statusPulang').val();
	if(sp=="4"){
		$('#meninggal').show();
	}else{
		$('#meninggal').hide();
	}
	// $('#meninggal').html(meninggal);
}
function getPj(){
	var penanggungJawab = $('#e-pembiayaan :selected').html();
	// alert(penanggungJawab);
	$('#e-penanggungJawab').val(penanggungJawab);
}
function sepInternal(noSep){
	var url = url_call_back+"/vclaim/sep/internal/"+noSep;
	$.ajax({
	    url     : url,
	    type    : "GET",
	    dataType: "json",
	    data    :  {},
	    success : function(data){
			console.clear();
			console.log(data);
	        if(data.metaData.code==200){
	            var histori    = data.response.list;
	            var jmlData=histori.length;
	            var table   = "";
	            //Create Tabel
	            for(var i=0; i<jmlData;i++){
					table+='<tr>'+
                        '<td>'+histori[i].nosep+'</td>'+
                        '<td>'+histori[i].nosepref+'</td>'+
						'<td>'+histori[i].nosurat+'</td>'+
                        '<td>'+histori[i].tglrujukinternal+'</td>'+
                        '<td>'+histori[i].nmpoliasal+'</td>'+
						'<td>'+histori[i].nmtujuanrujuk+'</td>'+
                        '<td>'+histori[i].tglsep+'</td>'+
                        '<td>'+histori[i].nmdiag+'</td>'+
                        '<td><a href="#" class="btn btn-danger btn-sm" onclick="hapusInternal(\''+histori[i].nosep+'\',\''+histori[i].nosurat+'\',\''+histori[i].tglrujukinternal+'\',\''+histori[i].tujuanrujuk+'\')"> <span class="fa fa-remove"></span> Hapus Internal</a></td>'+
                    '</tr>';
	            }
				$('#datarujukinteral').html(table);
				// var faskes=$('#r-faskes').val();
	        }else{
				tampilkanPesan('warning',data.metaData.message)
			}
	    }
	});
}
function hapusInternal(noSep,noSurat,tglRujuk,tujuan){
	swal({
		title: "Konfirmasi",
		text: 'Apakah anda yakin akan menghapus Sep Internal dari ' + noSep + '?',
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Ya",
		cancelButtonText: "Tidak",
		closeOnConfirm: true,
		closeOnCancel: true
	},
	function(isConfirm) {
		if (isConfirm) {
			var url = url_call_back+"/vclaim/sep/hapusinternal/"+noSep+"/"+noSurat+"/"+tglRujuk+"/"+tujuan;
			$.ajax({
				url     : url,
				type    : "GET",
				dataType: "json",
				data    :  {},
				success : function(data){
					console.clear();
					console.log(data);
					if(data.metaData.code==200){
						sepInternal(noSep)
						tampilkanPesan('success',data.metaData.message)
					}else{
						tampilkanPesan('warning',data.metaData.message)
					}
				}
			});
		}
	})
	
}
function pilihTipeRujukan(){
	var tipeRujukan=$('#r-tipeRujukan').val();
	$('#r-ppkDirujuk').val("");
	$('#ppkDirujuk').html("");
	if(tipeRujukan==2){
		$('#r-poliRujukan').val("");
		$('.inputPoli').hide();
	}else{
		$('.inputPoli').show();
	}
}
function spesialistiRujukan(){
	var param1=$('#ppkDirujuk').val();
	var param2=$('#r-tglRencanaKunjungan').val()
	var url = url_call_back+"/vclaim/rujukan/spesialistik/"+param1+"/"+param2;
	$.ajax({
	    url     : url,
	    type    : "GET",
	    dataType: "json",
	    data    :  {},
	    success : function(data){
	        //menghitung jumlah data
			//console.clear();
			//alert(param1 +" " +param2 + " " + param3);
	        console.log(url);
	        if(data.metaData.code==200){
	            var dokter    = data.response.list;
	            var jmlData=dokter.length;
	            var option   = "<option value=''>Pilih Spesialistik</option>";
	            //Create Tabel
	            for(var i=0; i<jmlData;i++){
					option+="<option value='"+dokter[i]["kodeSpesialis"]+"' >"+dokter[i]["namaSpesialis"]+"</option>";
	            }
				$('#r-poliRujukan').html(option);
				// var faskes=$('#r-faskes').val();
	        }else{
				// var poli=$('#txtnmpoli').val();
				// alert("Error saat pencarian data dokter "+ poli + ' karena ' +data.metaData.message)
			}
	    }
	});

	
}

function createRujukan(){
	var jnsPelayanan = $("input[name='jnsPelayanan']:checked").val();

	var formData = {
		id_daftar : $('#id_daftar').val(),
		reg_unit : $('#reg_unit').val(),
		noSep 	: $('#r-noSep').val(),
		tglRujukan: $('#r-tglRujukan').val(),
        tglRencanaKunjungan:$('#r-tglRencanaKunjungan').val(),
        ppkDirujuk: $('#ppkDirujuk').val(),
        jnsPelayanan: jnsPelayanan,
        catatan: $('#r-catatan').val(),
        diagRujukan: $('#diagRujukan').val(),
        tipeRujukan: $('#r-tipeRujukan').val(),
        poliRujukan: $('#r-poliRujukan').val(),
	}
	console.clear();
	// console.log(formData);
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url         : url_call_back+"/vclaim/rujukan/insert",
		type        : "POST",
		data        : formData,
		dataType    : "JSON",
		success     : function(data){
			console.clear();
			console.log(data);
			if(data.metaData.code==200){
				location.reload();
			}else{
				//alert(data.metaData.message);
				tampilkanPesan('warning',data.metaData.message);
			}  
		},
		error       : function(jqXHR,ajaxOption,errorThrown){
			console.log(jqXHR.responseText);                    
		}
	});
}

function updateRujukan(){
	var jnsPelayanan = $("input[name='jnsPelayanan']:checked").val();

	var formData = {
		id_daftar : $('#id_daftar').val(),
		reg_unit : $('#reg_unit').val(),
		noRujukan 	: $('#r-noRujukan').val(),
		tglRujukan: $('#r-tglRujukan').val(),
        tglRencanaKunjungan:$('#r-tglRencanaKunjungan').val(),
        ppkDirujuk: $('#ppkDirujuk').val(),
        jnsPelayanan: jnsPelayanan,
        catatan: $('#r-catatan').val(),
        diagRujukan: $('#diagRujukan').val(),
        tipeRujukan: $('#r-tipeRujukan').val(),
        poliRujukan: $('#r-poliRujukan').val(),
	}
	console.clear();
	// console.log(formData);
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url         : url_call_back+"/vclaim/rujukan/update",
		type        : "POST",
		data        : formData,
		dataType    : "JSON",
		success     : function(data){
			console.clear();
			console.log(data);
			if(data.metaData.code==200){
				// location.reload();
			}else{
				//alert(data.metaData.message);
				tampilkanPesan('warning',data.metaData.message);
			}  
		},
		error       : function(jqXHR,ajaxOption,errorThrown){
			console.log(jqXHR.responseText);                    
		}
	});
}