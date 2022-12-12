$(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
	$("#r-ppkDirujuk").autocomplete({
		source: function(request, response) {
			var faskes=$('#r-faskes').val();
			$.ajax({
				url: base_url+"vclaim/referensi/faskes/"+faskes,
				dataType: "JSON",
				method: "GET",
				data: {
					param: request.term
				},
				success: function(data) {
					console.clear();
					console.log(data);
					var fk = data.response.faskes;
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
			$("#ppkDirujuk").val(ui.item['kode']);
			$("#r-ppkDirujuk").val(ui.item['nama']);
			$("#r-ppkDirujuk").removeClass("ui-autocomplete-loading");
			return false;
		},
		select: function(event, ui) {
			$("#ppkDirujuk").val(ui.item['kode']);
			$("#r-ppkDirujuk").val(ui.item['nama']);
			$("#r-ppkDirujuk").removeClass("ui-autocomplete-loading");
			spesialistiRujukan()
			return false;
		}
	})
	.autocomplete("instance")._renderItem = function(table, item) {
		return $("<tr class='autocomplete'>")
			.append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
			.appendTo(table);
	};
	$("#r-diagRujukan").autocomplete({
		source: function(request, response) {
			$.ajax({
				url: base_url+"/vclaim/referensi/diagnosa",
				dataType: "JSON",
				method: "GET",
				data: {
					param: request.term
				},
				success: function(data) {
					console.clear();
					console.log(data);
					var diagnosa = data.response.diagnosa;
					console.log(diagnosa);
					response(diagnosa.slice(0, 15));
				},
				error: function(jqXHR, ajaxOption, errorThrown) {
					console.log(errorThrown);
				}
			});
		},
		minLength: 2,
		focus: function(event, ui) {
			$("#diagRujukan").val(ui.item['kode']);
			$("#r-diagRujukan").val(ui.item['nama']);
			$("#r-diagRujukan").removeClass("ui-autocomplete-loading");
			return false;
		},
		select: function(event, ui) {
			$("#diagRujukan").val(ui.item['kode']);
			$("#r-diagRujukan").val(ui.item['nama']);
			$("#r-diagRujukan").removeClass("ui-autocomplete-loading");
			return false;
		}
	})
	.autocomplete("instance")._renderItem = function(table, item) {
		return $("<tr class='autocomplete'>")
			.append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
			.appendTo(table);
	};
	$("#e-txtnmdiagnosa").autocomplete({
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
					var diagnosa = data.response.diagnosa;
					console.log(diagnosa);
					response(diagnosa.slice(0, 15));
				},
				error: function(jqXHR, ajaxOption, errorThrown) {
					console.log(errorThrown);
				}
			});
		},
		minLength: 2,
		focus: function(event, ui) {
			$("#e-diagAwal").val(ui.item['kode']);
			$("#e-txtnmdiagnosa").val(ui.item['nama']);
			$("#e-txtnmdiagnosa").removeClass("ui-autocomplete-loading");
			return false;
		},
		select: function(event, ui) {
			$("#e-diagAwal").val(ui.item['kode']);
			$("#e-txtnmdiagnosa").val(ui.item['nama']);
			$("#e-txtnmdiagnosa").removeClass("ui-autocomplete-loading");
			return false;
		}
	})
	.autocomplete("instance")._renderItem = function(table, item) {
		return $("<tr class='autocomplete'>")
			.append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
			.appendTo(table);
	};
});
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
		beforeSend: function() {
            // setting a timeout
            $('#btn').prop("disabled",true);
            $('#icon').removeClass('fa fa-search')
            $('#icon').addClass('fa fa-spinner spin')
        },
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
				tampilkanPesan('warning',data.metaData.message)
			}
	    },
		error: function(xhr) { // if error occured
            $('#error').modal('show');
			$('#xhr').html(xhr.responseText)
            $('#btn').prop("disabled",false);
            $('#icon').removeClass('fa fa-spinner spin')
            $('#icon').addClass('fa fa-search')
        },
        complete: function() {
            $('#btn').prop("disabled",false);
            $('#icon').removeClass('fa fa-spinner spin')
            $('#icon').addClass('fa fa-search')
        },
	});
}
function riwayatKunjungan(){
    var jnsLayanan=$('#jnsLayanan').val();
	var tgl=$('#tgl').val()
	var url = url_call_back+"/vclaim/monitoring/kunjungan/"+jnsLayanan+"/"+tgl;
	$.ajax({
	    url     : url,
	    type    : "GET",
	    dataType: "json",
	    data    :  {},
		beforeSend: function() {
            // setting a timeout
            $('#btnRiwayatKunjungan').prop("disabled",true);
            $('#iconbtnRiwayatKunjungan').removeClass('fa fa-search')
            $('#iconbtnRiwayatKunjungan').addClass('fa fa-spinner spin')
        },
	    success : function(data){
	        if(data.metaData.code==200){
	            var histori    = data.response.sep;
	            var jmlData=histori.length;
	            var table   = "";
	            //Create Tabel
	            for(var i=0; i<jmlData;i++){
					table+='<tr>'+
                        '<td>'+histori[i].noSep+'</td>'+
                        '<td>'+histori[i].tglSep+'</td>'+
                        '<td>'+histori[i].nama+'</td>'+
                        '<td>'+histori[i].poli+'</td>';
					table+='<td>'+histori[i].jnsPelayanan+'</td>';
                    table+='<td>'+histori[i].kelasRawat+'</td>'+
                        '<td>'+histori[i].noRujukan+'</td>'+
                        '<td>'+histori[i].diagnosa+'</td>'+
                        '<td>'+histori[i].tglPlgSep+'</td>'+
                        '<td><a href="'+base_url+'vclaim/sep/detail/'+histori[i].noSep+'" class="btn btn-primary btn-sm"> <span class="fa fa-search"></span> Detail</a></td>'+
                    '</tr>';
	            }
				$('#getdata').html(table);
				// var faskes=$('#r-faskes').val();
	        }else{
				$('#getdata').html('<tr><td colspan="10">Tidak Ada Data</td></tr>');
				tampilkanPesan('warning',data.metaData.message)
			}
	    },
		error: function(xhr) { // if error occured
            $('#error').modal('show');
			$('#xhr').html(xhr.responseText)
            $('#btnRiwayatKunjungan').prop("disabled",false);
            $('#iconbtnRiwayatKunjungan').removeClass('fa fa-spinner spin')
            $('#iconbtnRiwayatKunjungan').addClass('fa fa-search')
        },
        complete: function() {
            $('#btnRiwayatKunjungan').prop("disabled",false);
            $('#iconbtnRiwayatKunjungan').removeClass('fa fa-spinner spin')
            $('#iconbtnRiwayatKunjungan').addClass('fa fa-search')
        },
	});
}
function riwayatKlaim(){
    var jnsLayanan=$('#jnsLayanan').val();
	var tglpulang=$('#tglpulang').val()
	var statusklaim=$('#statusKlaim').val()
	var url = url_call_back+"/vclaim/monitoring/dataklaim/"+tglpulang+"/"+jnsLayanan+"/"+statusklaim;
	$.ajax({
	    url     : url,
	    type    : "GET",
	    dataType: "json",
	    data    :  {},
		beforeSend: function() {
            // setting a timeout
            $('#btn').prop("disabled",true);
            $('#icon').removeClass('fa fa-search')
            $('#icon').addClass('fa fa-spinner spin')
        },
	    success : function(data){
	        if(data.metaData.code==200){
	            var histori    = data.response.klaim;
	            var jmlData=histori.length;
	            var table   = "";
	            //Create Tabel
	            for(var i=0; i<jmlData;i++){
					table+='<tr>'+
                        '<td>'+histori[i].Inacbg.kode +" "+ histori[i].Inacbg.nama +'</td>'+
                        '<td>'+histori[i].biaya.byPengajuan+'</td>'+
                        '<td>'+histori[i].biaya.bySetujui+'</td>'+
                        '<td>'+histori[i].biaya.byTarifGruper+'</td>';
						'<td>'+histori[i].biaya.byTarifRS+'</td>';
						'<td>'+histori[i].biaya.byTopup+'</td>';
                        '<td>'+histori[i].kelasRawat+'</td>'+
                        '<td>'+histori[i].noFPK+'</td>'+
                        '<td>'+histori[i].noSEP+'</td>'+
						'<td>'+histori[i].peserta.nama+'</td>'+
						'<td>'+histori[i].peserta.noKartu+'</td>'+
						'<td>'+histori[i].peserta.noMR+'</td>'+
						'<td>'+histori[i].poli+'</td>'+
						'<td>'+histori[i].status+'</td>'+
						'<td>'+histori[i].tglPulang+'</td>'+
						'<td>'+histori[i].tglSep+'</td>'+
                    '</tr>';
	            }
				$('#getdata').html(table);
				// var faskes=$('#r-faskes').val();
	        }else{
				$('#getdata').html('<tr><td colspan="16">Tidak Ada Data</td></tr>');
				tampilkanPesan('warning',data.metaData.message)
			}
	    },
		error: function(xhr) { // if error occured
            $('#error').modal('show');
			$('#xhr').html(xhr.responseText)
            $('#btn').prop("disabled",false);
            $('#icon').removeClass('fa fa-spinner spin')
            $('#icon').addClass('fa fa-search')
        },
        complete: function() {
            $('#btn').prop("disabled",false);
            $('#icon').removeClass('fa fa-spinner spin')
            $('#icon').addClass('fa fa-search')
        },
	});
}
function riwayatKlaimJasaraharja(){
    var jnsLayanan=$('#jnsLayanan').val();
	var tglpulang=$('#tglMulai').val()
	var tglselesai=$('#tglSelesai').val()
	var url = url_call_back+"/vclaim/monitoring/dataklaimjasaraharja/"+jnsLayanan+"/"+tglpulang+"/"+tglselesai;
	$.ajax({
	    url     : url,
	    type    : "GET",
	    dataType: "json",
	    data    :  {},
		beforeSend: function() {
            // setting a timeout
            $('#btn').prop("disabled",true);
            $('#icon').removeClass('fa fa-search')
            $('#icon').addClass('fa fa-spinner spin')
        },
	    success : function(data){
	        if(data.metaData.code==200){
	            var histori    = data.response.jaminan;
	            var jmlData=histori.length;
	            var table   = "";
	            //Create Tabel
	            for(var i=0; i<jmlData;i++){
					// alert(histori[i].sep.noSEP)
					table+='<tr>'+
                        '<td>'+histori[i].jasaRaharja.tglKejadian +'</td>'+
                        '<td>'+histori[i].jasaRaharja.noRegister+'</td>'+
                        '<td>'+histori[i].jasaRaharja.ketStatusDijamin+'</td>'+
                        '<td>'+histori[i].jasaRaharja.ketStatusDikirim+'</td>'+
						'<td>'+histori[i].jasaRaharja.biayaDijamin+'</td>'+
						'<td>'+histori[i].jasaRaharja.plafon+'</td>'+
                        '<td>'+histori[i].jasaRaharja.jmlDibayar+'</td>'+
                        '<td>'+histori[i].jasaRaharja.resultsJasaRaharja+'</td>'+
                        '<td>'+histori[i].sep.noSEP+'</td>'+
						'<td>'+histori[i].sep.tglSEP+'</td>'+
						'<td>'+histori[i].sep.tglPlgSEP+'</td>'+
						'<td>'+histori[i].sep.noMr+'</td>'+
						'<td>'+histori[i].sep.jnsPelayanan+'</td>'+
						'<td>'+histori[i].sep.poli+'</td>'+
						'<td>'+histori[i].sep.diagnosa+'</td>'+
						'<td>'+histori[i].sep.peserta.noKartu+'</td>'+
						'<td>'+histori[i].sep.peserta.nama+'</td>'+
						'<td>'+histori[i].sep.peserta.noMR+'</td>'+
                    '</tr>';
	            }
				$('#getdata').html(table);
				// var faskes=$('#r-faskes').val();
	        }else{
				$('#getdata').html('<tr><td colspan="16">Tidak Ada Data</td></tr>');
				tampilkanPesan('warning',data.metaData.message)
			}
	    },
		error: function(xhr) { // if error occured
            $('#error').modal('show');
			$('#xhr').html(xhr.responseText)
            $('#btn').prop("disabled",false);
            $('#icon').removeClass('fa fa-spinner spin')
            $('#icon').addClass('fa fa-search')
        },
        complete: function() {
            $('#btn').prop("disabled",false);
            $('#icon').removeClass('fa fa-spinner spin')
            $('#icon').addClass('fa fa-search')
        },
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
function cekSep(){
	var nosep=$('#noSep').val();
	$.ajax({
	    url     : base_url+'vclaim/sep/cari/'+nosep,
	    type    : "POST",
	    dataType: "json",
	    data    : {get_param : 'value'},
		beforeSend: function() {
            // setting a timeout
            $('#btnCekSep').prop("disabled",true);
            $('#iconbtnCekSep').removeClass('fa fa-search')
            $('#iconbtnCekSep').addClass('fa fa-spinner spin')
        },
	    success : function(data){
			console.log(data)
			if(data.metaData.code==200){
				window.location.href=base_url+'vclaim/sep/detail/'+nosep;
			}else{
				tampilkanPesan('error',data.metaData.message);
			}
	    },
		error: function(xhr) { // if error occured
            $('#error').modal('show');
			$('#xhr').html(xhr.responseText)
            $('#btnCekSep').prop("disabled",false);
            $('#iconbtnCekSep').removeClass('fa fa-spinner spin')
            $('#iconbtnCekSep').addClass('fa fa-search')
        },
        complete: function() {
            $('#cekStatus').prop("disabled",false);
            $('#iconcekStatus').removeClass('fa fa-spinner spin')
            $('#iconcekStatus').addClass('fa fa-search')
        },
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
	// if(lakaLantas!=1) lakaLantas=0;
	if(eksekutif!=1) eksekutif=0;

	if(lakaLantas>0){
		// lakaLantas=1;
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
				updatePulangLokal();
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
function updatePulangLokal(){
	var formData = {
		noSep : $('#e-noSep').val(),
		statusPulang: $('#u-statusPulang').val(),
		namaStatusPulang: $('#u-statusPulang :selected').html(),
		noSuratMeninggal: $('#u-noSuratMeninggal').val(),
		tglMeninggal: $('#u-tglMeninggal').val(),
		tglPulang: $('#u-tglPulang').val(),
		noLPManual: $('#u-noLPManual').val()
	}
	console.clear();
	// console.log(formData);
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url         : url_call_back+"/vclaim/sep/updatepulanglokal",
		type        : "POST",
		data        : formData,
		dataType    : "JSON",
		success     : function(data){
			console.clear();
			console.log(data);
			if(data.metaData.code==200){
				tampilkanPesan('success',data.metaData.message);
				// updatePulangLokal();
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
				var disabled="";
				var keterangan="";
	            for(var i=0; i<jmlData;i++){
					// if(dokter[i]["kapasitas"]==0) {
					// 	disabled="disabled";
					// 	keterangan="(Tutup)"
					// }else{
					// 	if(dokter[i]["kapasitas"]<=dokter[i]['jumlahRujukan']){
					// 		// JIka kapasitas kecil atau sama dengan jumlah kunjungan
					// 		disabled="disabled";
					// 		keterangan="(Penuh)"
					// 	}else{
					// 		disabled="";
					// 		keterangan=""
					// 	}
					// }
					
					option+="<option value='"+dokter[i]["kodeSpesialis"]+"' "+disabled+" >"+dokter[i]["namaSpesialis"]+ " "+keterangan+"</option>";
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
				tampilkanPesan('success',data.metaData.message);
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
	var diagnosanama=$('#r-diagRujukan').val();
	var namapoliTujuan=$('#r-poliRujukan :selected').html();
	var namatujuanRujukan=$('#r-poliRujukan :selected').html();
	// tampilkanPesan('error','Diagnosa Awal : '+ diagnosanama+" Tujuan Poli "+ namapoliTujuan+" Tujuan Rujukan : " + namatujuanRujukan)
	var formData = {
		id_daftar : $('#id_daftar').val(),
		reg_unit : $('#reg_unit').val(),
		noRujukan 	: $('#r-noRujukan').val(),
		tglRujukan: $('#r-tglRujukan').val(),
        tglRencanaKunjungan:$('#r-tglRencanaKunjungan').val(),
        ppkDirujuk: $('#ppkDirujuk').val(),
		namappkDirujuk: $('#r-ppkDirujuk').val(),
        jnsPelayanan: jnsPelayanan,
        catatan: $('#r-catatan').val(),
        diagRujukan: $('#diagRujukan').val(),
		diagnosanama: diagnosanama,
        tipeRujukan: $('#r-tipeRujukan').val(),
        poliRujukan: $('#r-poliRujukan').val(),
		namapoliRujukan: namatujuanRujukan,
		
	}
	// alert('Nilai Diagnosa Awal '+formData['diagnosanama']);
	console.clear();
	console.log(formData);
	// return false
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url         : url_call_back+"/vclaim/rujukan/update",
		type        : "POST",
		data        : formData,
		dataType    : "JSON",
		success     : function(data){
			// console.clear();
			// console.log(data);
			if(data.metaData.code==200){
				// location.reload();
				updateRujukanLokal();
				// tampilkanPesan('success',data.metaData.message);
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
function hapusRujukan(norujukan=""){
	if(norujukan=="") var norujukan= $('#r-noRujukan').val()

	var url = url_call_back+"/vclaim/rujukan/hapus/"+norujukan;
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
				hapusRujukanLokal();
	            // tampilkanPesan('success',data.metaData.message)
				// var faskes=$('#r-faskes').val();
	        }else{
				tampilkanPesan('warning',data.metaData.message)
				// var poli=$('#txtnmpoli').val();
				// alert("Error saat pencarian data dokter "+ poli + ' karena ' +data.metaData.message)
			}
	    }
	});

}

function updateRujukanLokal(){
	var jnsPelayanan = $("input[name='jnsPelayanan']:checked").val();
	var diagnosanama=$('#r-diagRujukan').val();
	// var namapoliTujuan=$('#r-poliRujukan :selected').html();
	var namatujuanRujukan=$('#r-poliRujukan :selected').html();
	var formData = {
		id_daftar : $('#id_daftar').val(),
		reg_unit : $('#reg_unit').val(),
		noRujukan 	: $('#r-noRujukan').val(),
		tglRujukan: $('#r-tglRujukan').val(),
        tglRencanaKunjungan:$('#r-tglRencanaKunjungan').val(),
        ppkDirujuk: $('#ppkDirujuk').val(),
		namappkDirujuk: $('#r-ppkDirujuk').val(),
        jnsPelayanan: jnsPelayanan,
        catatan: $('#r-catatan').val(),
        diagRujukan: $('#diagRujukan').val(),
		diagnosanama: diagnosanama,
        tipeRujukan: $('#r-tipeRujukan').val(),
        poliRujukan: $('#r-poliRujukan').val(),
		namapoliRujukan: namatujuanRujukan,
	}
	console.clear();
	// console.log(formData);
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url         : url_call_back+"/vclaim/rujukan/updatelokal",
		type        : "POST",
		data        : formData,
		dataType    : "JSON",
		success     : function(data){
			console.clear();
			console.log(data);
			if(data.metaData.code==200){
				// location.reload();
				// updateRujukanLokal();
				tampilkanPesan('success',data.metaData.message);
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

function hapusRujukanLokal(norujukan=""){
	if(norujukan=="") var norujukan= $('#r-noRujukan').val()

	var url = url_call_back+"/vclaim/rujukan/hapuslokal/"+norujukan;
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
				// hapusRujukanLokal();
	            tampilkanPesan('success',data.metaData.message)
				// var faskes=$('#r-faskes').val();
	        }else{
				tampilkanPesan('warning',data.metaData.message)
				// var poli=$('#txtnmpoli').val();
				// alert("Error saat pencarian data dokter "+ poli + ' karena ' +data.metaData.message)
			}
	    }
	});

}

function lakalantas(){
	var lakalantas = $('#lakaLantas').val();
	if(lakalantas=="-") var kll=0;
	else var kll=parseInt(lakalantas);
	
	if(parseInt(kll)>0){
		$('#divJaminan').show();
		getProvinsi();
	}else{
		$('#divJaminan').hide();
	}
}
function getProvinsi(id='cbprovinsi'){
	var url= url_call_back+"/vclaim/referensi/propinsi";
	console.log(url);
	$.ajax({
	    url     : url,
	    type    : "GET",
	    dataType: "json",
	    data    : {get_param : 'value'},
	    success : function(data){
			if(data.metaData.code==200){
				var provinsi=data.response.list;
				var jmlData=provinsi.length;
				var option="<option value='-'>Pilih</option>";
				for(var i=0;i<jmlData;i++){
					option+="<option value='"+provinsi[i]["kode"]+"'>"+provinsi[i]["nama"]+"</option>";
				}
				
				$('#'+id).html(option);
			}
			
	    }
	});
	
}
function getKabupaten(id="cbkabupaten",idprov='cbprovinsi'){
	
	console.log(url);
	var provinsi=$('#'+idprov).val();
	// alert(provinsi);
	// alert("Get Kabupaten "+provinsi)
	var url= url_call_back+"/vclaim/referensi/kabupaten/"+provinsi;
	$.ajax({
	    url     : url,
	    type    : "POST",
	    dataType: "json",
	    data    : {param1: provinsi},
	    success : function(data){
			if(data.metaData.code==200){
				var provinsi=data.response.list;
				var jmlData=provinsi.length;
				var option="<option value=''>Pilih Kabupaten</option>";
				for(var i=0;i<jmlData;i++){
					option+="<option value='"+provinsi[i]["kode"]+"'>"+provinsi[i]["nama"]+"</option>";
				}
				$('#'+id).html(option);
			}
	    }
	});
}

function getKecamatan(id="cbkecamatan",id_kab="cbkabupaten"){
	
	var provinsi=$('#'+id_kab).val();
	// alert("Get Kecamatan "+provinsi)
	var url= url_call_back+"/vclaim/referensi/kecamatan/"+provinsi;
	console.log(url);
	$.ajax({
	    url     : url,
	    type    : "GET",
	    dataType: "json",
	    data    : {param: provinsi},
	    success : function(data){
			// console.clear();
			console.log("data kecamatan...");
			console.log(data);
			if(data.metaData.code==200){
				var provinsi=data.response.list;
				var jmlData=provinsi.length;
				var option="<option value=''>Pilih Kecamatan</option>";
				for(var i=0;i<jmlData;i++){
					option+="<option value='"+provinsi[i]["kode"]+"'>"+provinsi[i]["nama"]+"</option>";
				}
				$('#'+id).html(option);
			}
	    }
	});
}
function e_lakalantas(){
	var lakalantas = $('#e-lakaLantas').val();
	if(lakalantas=="-") var kll=0;
	else var kll=parseInt(lakalantas);
	
	if(parseInt(kll)>0){
		$('#e-divJaminan').show();
		getProvinsi('e-cbprovinsi');
	}else{
		$('#e-divJaminan').hide();
	}
}
function cekSuplesi(){
	// var sup=$('#suplesi:checked').val();
	if ($('#suplesi').prop('checked')) var sup=1;else var sup=0
	if(sup==1){
		$("#noSepSuplesi").prop("readonly", false)
	}else{
		$("#noSepSuplesi").prop("readonly", true)
	}
}
function e_cekSuplesi(){
	if ($('#e-suplesi').prop('checked')) var sup=1;else var sup=0
	// alert(sup)
	if(sup==1){
		$("#e-noSepSuplesi").prop("readonly", false)
	}else{
		$("#e-noSepSuplesi").prop("readonly", true)
	}
}

function batalkanSep(no_jaminan) {
	swal({
			title: "Konfirmasi",
			text: 'Apakah anda yakin akan membatalkan No Sep ' + no_jaminan + '?',
			type: "warning",
			showCancelButton: true,
			confirmButtonText: "Ya",
			cancelButtonText: "Tidak",
			closeOnConfirm: true,
			closeOnCancel: true
		},
		function(isConfirm) {
			if (isConfirm) {
				// var url_call_back = "<?= base_url() . "mr_registrasi.php/"; ?>";
				// var formdata = {
				//     param1: no_jaminan,
				//     param2: "<?= $this->session->userdata('get_uid') ?>",
				// }
				var url=url_call_back + "/vclaim/sep/hapus/"+no_jaminan;
				$.ajax({
					url: url,
					type: "GET",
					data: {get_param : 'value'},
					dataType: "JSON",
					success: function(data) {
						console.log(data);
						tampilkanPesan('warning', data.metaData.message);
					},
					error: function(jqXHR, ajaxOption, errorThrown) {
						console.log(jqXHR.responseText);
						// alert(url)
					}
				});
			}
		});
}
