$(document).ready(function () {
	$('.datepicker').datepicker({
		format: 'yyyy-mm-dd',
		autoclose: true
	});
	// $("#r-ppkDirujuk").autocomplete({
	// 	source: function(request, response) {
	// 		var faskes=$('#r-faskes').val();
	// 		$.ajax({
	// 			url: base_url+"vclaim/referensi/faskes/"+faskes,
	// 			dataType: "JSON",
	// 			method: "GET",
	// 			data: {
	// 				param: request.term
	// 			},
	// 			success: function(data) {
	// 				console.clear();
	// 				console.log(data);
	// 				var fk = data.response.faskes;
	// 				// console.log(diagnosa);
	// 				response(fk.slice(0, 15));
	// 			},
	// 			error: function(jqXHR, ajaxOption, errorThrown) {
	// 				console.log(errorThrown);
	// 			}
	// 		});
	// 	},
	// 	minLength: 2,
	// 	focus: function(event, ui) {
	// 		$("#ppkDirujuk").val(ui.item['kode']);
	// 		$("#r-ppkDirujuk").val(ui.item['nama']);
	// 		$("#r-ppkDirujuk").removeClass("ui-autocomplete-loading");
	// 		return false;
	// 	},
	// 	select: function(event, ui) {
	// 		$("#ppkDirujuk").val(ui.item['kode']);
	// 		$("#r-ppkDirujuk").val(ui.item['nama']);
	// 		$("#r-ppkDirujuk").removeClass("ui-autocomplete-loading");
	// 		spesialistiRujukan()
	// 		return false;
	// 	}
	// })
	// .autocomplete("instance")._renderItem = function(table, item) {
	// 	return $("<tr class='autocomplete'>")
	// 		.append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
	// 		.appendTo(table);
	// };
	// $("#r-diagRujukan").autocomplete({
	// 	source: function(request, response) {
	// 		$.ajax({
	// 			url: base_url+"/vclaim/referensi/diagnosa",
	// 			dataType: "JSON",
	// 			method: "GET",
	// 			data: {
	// 				param: request.term
	// 			},
	// 			success: function(data) {
	// 				console.clear();
	// 				console.log(data);
	// 				var diagnosa = data.response.diagnosa;
	// 				console.log(diagnosa);
	// 				response(diagnosa.slice(0, 15));
	// 			},
	// 			error: function(jqXHR, ajaxOption, errorThrown) {
	// 				console.log(errorThrown);
	// 			}
	// 		});
	// 	},
	// 	minLength: 2,
	// 	focus: function(event, ui) {
	// 		$("#diagRujukan").val(ui.item['kode']);
	// 		$("#r-diagRujukan").val(ui.item['nama']);
	// 		$("#r-diagRujukan").removeClass("ui-autocomplete-loading");
	// 		return false;
	// 	},
	// 	select: function(event, ui) {
	// 		$("#diagRujukan").val(ui.item['kode']);
	// 		$("#r-diagRujukan").val(ui.item['nama']);
	// 		$("#r-diagRujukan").removeClass("ui-autocomplete-loading");
	// 		return false;
	// 	}
	// })
	// .autocomplete("instance")._renderItem = function(table, item) {
	// 	return $("<tr class='autocomplete'>")
	// 		.append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
	// 		.appendTo(table);
	// };
	// $("#e-txtnmdiagnosa").autocomplete({
	// 	source: function(request, response) {
	// 		$.ajax({
	// 			url: base_url+"vclaim/referensi/diagnosa",
	// 			dataType: "JSON",
	// 			method: "GET",
	// 			data: {
	// 				param: request.term
	// 			},
	// 			success: function(data) {
	// 				console.clear();
	// 				console.log(data);
	// 				var diagnosa = data.response.diagnosa;
	// 				console.log(diagnosa);
	// 				response(diagnosa.slice(0, 15));
	// 			},
	// 			error: function(jqXHR, ajaxOption, errorThrown) {
	// 				console.log(errorThrown);
	// 			}
	// 		});
	// 	},
	// 	minLength: 2,
	// 	focus: function(event, ui) {
	// 		$("#e-diagAwal").val(ui.item['kode']);
	// 		$("#e-txtnmdiagnosa").val(ui.item['nama']);
	// 		$("#e-txtnmdiagnosa").removeClass("ui-autocomplete-loading");
	// 		return false;
	// 	},
	// 	select: function(event, ui) {
	// 		$("#e-diagAwal").val(ui.item['kode']);
	// 		$("#e-txtnmdiagnosa").val(ui.item['nama']);
	// 		$("#e-txtnmdiagnosa").removeClass("ui-autocomplete-loading");
	// 		return false;
	// 	}
	// })
	// .autocomplete("instance")._renderItem = function(table, item) {
	// 	return $("<tr class='autocomplete'>")
	// 		.append("<td style='width:100px'>" + item['kode'] + "</td><td style='width:300px'>" + item['nama'] + "</td>")
	// 		.appendTo(table);
	// };
});

var listItem = {};

function cariSep() {
	var noKartu = $('#noKartu').val();
	var tglMulai = $('#tglMulai').val()
	var tglSelesai = $('#tglSelesai').val()
	var url = url_call_back + "/vclaim/monitoring/historipelayanan/" + noKartu + "/" + tglMulai + "/" + tglSelesai;
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: {},
		success: function (data) {
			if (data.metaData.code == 200) {
				var histori = data.response.histori;
				var jmlData = histori.length;
				var table = "";
				//Create Tabel
				for (var i = 0; i < jmlData; i++) {
					table += '<tr>' +
						'<td>' + histori[i].noSep + '</td>' +
						'<td>' + histori[i].tglSep + '</td>' +
						'<td>' + histori[i].namaPeserta + '</td>' +
						'<td>' + histori[i].poli + '</td>';
					if (histori[i].jnsPelayanan == 1) table += '<td>Rawat Inap</td>';
					else table += '<td>Rawat Jalan</td>';
					table += '<td>' + histori[i].kelasRawat + '</td>' +
						'<td>' + histori[i].noRujukan + '</td>' +
						'<td>' + histori[i].ppkPelayanan + '</td>' +
						'<td>' + histori[i].diagnosa + '</td>' +
						'<td>' + histori[i].tglPlgSep + '</td>' +
						'<td><a href="' + base_url + 'vclaim/sep/detail/' + histori[i].noSep + '" class="btn btn-primary btn-sm"> <span class="fa fa-search"></span> Detail</a></td>' +
						'</tr>';
				}
				$('#getdata').html(table);
				// var faskes=$('#r-faskes').val();
			} else {
				tampilkanPesan(data.metaData.message)
			}
		}
	});
}

function riwayatKontrol() {
	var param = $('#parameter').val();
	var tgl = $('#tgl').val()
	var tgl1 = $('#tgl1').val()
	var url = url_call_back + "/vclaim/rencanakontrol/listkontrol/" + param + "/" + tgl + "/" + tgl1;
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: {},
		beforeSend: function () {
			// setting a timeout
			$('#btn').prop("disabled", true);
			$('#icon').removeClass('fa fa-search')
			$('#icon').addClass('fa fa-spinner spin')
		},
		success: function (data) {
			if (data.metaData.code == 200) {
				listItem = data.response.list;
				var histori = data.response.list;
				var jmlData = histori.length;
				var table = "";
				//Create Tabel
				for (var i = 0; i < jmlData; i++) {
					table += '<tr>' +
						'<td>' + histori[i].noKartu + '</td>' +
						'<td>' + histori[i].noSuratKontrol + '</td>' +
						'<td>' + histori[i].jnsPelayanan + '</td>' +
						'<td>' + histori[i].namaJnsKontrol + '</td>';
					table += '<td>' + histori[i].tglRencanaKontrol + '</td>';
					table += '<td>' + histori[i].tglTerbitKontrol + '</td>' +
						'<td>' + histori[i].noSepAsalKontrol + '</td>' +
						'<td>' + histori[i].namaPoliAsal + '</td>' +
						'<td>' + histori[i].namaPoliTujuan + '</td>' +
						'<td>' + histori[i].tglSEP + '</td>' +
						'<td>' + histori[i].namaDokter + '</td>' +
						'<td>' + histori[i].nama + '</td>';
					if (histori[i].terbitSEP == "Sudah") table += '<td><span class="btn btn-success btn-xs">Sudah</span></td>';
					else table += '<td><span class="btn btn-danger btn-xs">Belum</span></td>';
					table += '<td>' +
						'<div class="btn-group">' +
						'<a href="' + base_url + 'vclaim/rencanakontrol/cetak/' + histori[i].noSuratKontrol + '" class="btn btn-default btn-xs" target="_blank" > <span class="fa fa-print" ></span> Cetak</a>' +
						'<button class="btn btn-warning btn-xs" type="button" onclick="editSurat(\'' + histori[i].noSuratKontrol + '\',\'' + histori[i].noKartu + '\')"> <span class="fa fa-pencil" ></span> Edit</button>' +
						'<button class="btn btn-danger btn-xs" type="button" onclick="hapusSurat(\'' + histori[i].noSuratKontrol + '\')"> <span class="fa fa-remove" ></span> Hapus</button>' +
						'</div></td>' +
						'</tr>';
				}
				$('#getdata').html(table);
				// var faskes=$('#r-faskes').val();
			} else {
				$('#getdata').html('<tr><td colspan="10">Tidak Ada Data</td></tr>');
				tampilkanPesan('warning', data.metaData.message)
			}
		},
		error: function (xhr) { // if error occured
			$('#error').modal('show');
			$('#xhr').html(xhr.responseText)
			$('#btn').prop("disabled", false);
			$('#icon').removeClass('fa fa-spinner spin')
			$('#icon').addClass('fa fa-search')
		},
		complete: function () {
			$('#btn').prop("disabled", false);
			$('#icon').removeClass('fa fa-spinner spin')
			$('#icon').addClass('fa fa-search')
		},
	});
}

function editSurat(nosurat = "", noKartu = "") {
	// alert(nosurat)
	if (nosurat == "") nosurat = $('#editSurat').val();
	$.ajax({
		url: base_url + 'vclaim/rencanakontrol/nosuratkontrol/' + nosurat,
		type: "GET",
		dataType: "json",
		data: {
			get_param: 'value'
		},
		beforeSend: function () {
			// setting a timeout
			$('#btn1').prop("disabled", true);
			$('#icon1').removeClass('fa fa-pencil')
			$('#icon1').addClass('fa fa-spinner spin')
		},
		success: function (data) {
			if (data.metaData.code == 200) {
				$('#u_noSuratKontrol').val(data.response.noSuratKontrol);
				// alert(data.response.jnsKontrol)
				if (data.response.jnsKontrol == 1) {
					// $('#sepkontrol').hide();
					$('#nomor').html('No Kartu <label style="color:red;font-size:small">*</label>')
					$('#u_noSep').prop('readonly', false)
					$('#u_noSep').val(noKartu);
					var nomor = noKartu;
				} else {
					// $('#sepkontrol').show();
					$('#nomor').html('No Sep <label style="color:red;font-size:small">*</label>')
					$('#u_noSep').prop('readonly', true)
					$('#u_noSep').val(data.response.sep.noSep);
					var nomor = data.response.sep.noSep;
				}

				$('#u_tglRencanaKontrol').val(data.response.tglRencanaKontrol);
				$('#u_jnsKontrol').val(data.response.jnsKontrol)
				if (nomor != "") {
					u_caripoliKontrol(data.response.jnsKontrol, nomor, data.response.poliTujuan, data.response.namaPoliTujuan)
				}

				u_dokterKontrol(data.response.jnsKontrol, data.response.poliTujuan)
				$('#u_poliKontrol').val(data.response.poliTujuan);
				$('#u_kodeDokter').val(data.response.kodeDokterPembuat);
				$('#formModal').modal('show');
			} else {
				tampilkanPesan('warning', data.metaData.message)
			}
			console.log(data)
			// alert(data.jnsPelayanan);


		},
		error: function (xhr) { // if error occured
			$('#error').modal('show');
			$('#xhr').html(xhr.responseText)
			$('#btn1').prop("disabled", false);
			$('#icon1').removeClass('fa fa-spinner spin')
			$('#icon1').addClass('fa fa-pencil')
		},
		complete: function () {
			$('#btn1').prop("disabled", false);
			$('#icon1').removeClass('fa fa-spinner spin')
			$('#icon1').addClass('fa fa-pencil')
		},
	});
}

function caripoliKontrol(jnsKontrol = "", nomor = "", kode = "", poli = "") {
	var tampilkan = 0;
	var noSep = $('#noSep').val();

	if (jnsKontrol == "") {
		var tampilkan = 1;
		var jnsKontrol = $('#jnsKontrol').val();
	}
	if (nomor == "") {
		var tampilkan = 1;
		var nomor = $('#noSEP').val();
	}
	var tglRencanaKontrol = $('#tglRencanaKontrol').val();
	if (noSep == '') {
		if (jnsKontrol == 1) {
			tampilkanPesan('warning', 'No Kartu masih kosong');
			return false
		} else {
			tampilkanPesan('warning', 'No Sep masih kosong');
			return false
		}
	}
	$.ajax({
		url: base_url + 'vclaim/rencanakontrol/spesialistik/' + jnsKontrol + "/" + nomor + "/" + tglRencanaKontrol,
		type: "POST",
		dataType: "json",
		data: {
			get_param: 'value'
		},
		success: function (data) {
			if (data.metaData.code == 200) {
				var provinsi = data.response.list;
				var jmlData = provinsi.length;
				var option = "<option value=''>Pilih</option>";
				for (var i = 0; i < jmlData; i++) {
					if (kode == provinsi[i]["kodePoli"]) option += "<option value='" + provinsi[i]["kodePoli"] + "' selected>" + provinsi[i]["namaPoli"] + "</option>";
					else option += "<option value='" + provinsi[i]["kodePoli"] + "'>" + provinsi[i]["namaPoli"] + "</option>";
				}
				$('#poliKontrol').html(option);
			} else {
				if (tampilkan == 1) tampilkanPesan('warning', data.metaData.message)
				var option = "<option value='" + kode + "'>" + poli + "</option>";
				$('#poliKontrol').html(option);
			}
		}
	});

}

function u_caripoliKontrol(jnsKontrol = "", nomor = "", kode = "", poli = "") {
	var tampilkan = 0;
	var noSep = $('#u_noSep').val();

	if (jnsKontrol == "") {
		var tampilkan = 1;
		var jnsKontrol = $('#u_jnsKontrol').val();
	}
	if (nomor == "") {
		var tampilkan = 1;
		var nomor = $('#u_noSep').val();
	}
	var tglRencanaKontrol = $('#u_tglRencanaKontrol').val();
	if (noSep == '') {
		if (jnsKontrol == 1) {
			tampilkanPesan('warning', 'No Kartu masih kosong');
			return false
		} else {
			tampilkanPesan('warning', 'No Sep masih kosong');
			return false
		}
	}
	$.ajax({
		url: base_url + 'vclaim/rencanakontrol/spesialistik/' + jnsKontrol + "/" + nomor + "/" + tglRencanaKontrol,
		type: "POST",
		dataType: "json",
		data: {
			get_param: 'value'
		},
		success: function (data) {
			if (data.metaData.code == 200) {
				var provinsi = data.response.list;
				var jmlData = provinsi.length;
				var option = "<option value=''>Pilih</option>";
				for (var i = 0; i < jmlData; i++) {
					if (kode == provinsi[i]["kodePoli"]) option += "<option value='" + provinsi[i]["kodePoli"] + "' selected>" + provinsi[i]["namaPoli"] + "</option>";
					else option += "<option value='" + provinsi[i]["kodePoli"] + "'>" + provinsi[i]["namaPoli"] + "</option>";
				}
				$('#u_poliKontrol').html(option);
			} else {
				if (tampilkan == 1) tampilkanPesan('warning', data.metaData.message)
				var option = "<option value='" + kode + "'>" + poli + "</option>";
				$('#u_poliKontrol').html(option);
			}
		}
	});

}

function addKontrol() {
	resetFormKontrol()
	$('.step').hide();
	$('#jns_kontrol').show();
	$('#form-list-kontrol').modal('show')
}

function riwayatKunjungan() {
	$('.step').hide();
	$('#riwayat').show();
	var a = $('#no_bpjs').val();
	var dari = $('#dari').val();
	var sampai = $('#sampai').val();
	$.ajax({
		url: url_call_back + "/vclaim/monitoring/historipelayanan/" + a + "/" + dari + "/" + sampai,
		type: "GET",
		data: {
			get_param: 'value'
		},
		dataType: "JSON",
		beforeSend: function () {
			$('tbody#datariwayat').html("<tr><td colspan=7><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
		},
		success: function (data) {

			if (data.metaData.code == 200) {
				var x = data.response.histori;
				// alert(x.length);
				var res = "";
				// var encodedString = "";
				// var dataForm = "";
				/** */
				for (var i = 0; i <= x.length - 1; i++) {
					// var noKunjungan = x[i]['noKunjungan'];
					// 	dataForm = JSON.stringify(x[i]);
					// 	encodedString = Base64.encode(dataForm);

					res += "<tr>";
					res += "<td>" + (i + 1) + "</td>";
					// res += "<td><button onclick=setRujukan('"+noKunjungan+"','"+encodedString+"','"+b+"') type='button' class='btn btnView btn-default btn-xs'>" + x[i]['noKunjungan'] + "</button></td>";
					res += "<td>" + x[i]['tglSep'] + "</td>";
					res += "<td>" + x[i]['noRujukan'] + "</td>";
					// if ($('#jarkomdat').is(':checked')) {
					// 	// JIka Kunjungan Dengan Jarkomdat
					// 	tampilkanPesan('error', "Rujukan Tidak Valid");
					// }else{
					// 	formGenerateSEP('');
					// }
					res += "<td><button onclick=setSep('" + x[i]['noSep'] + "') type='button' class='btn btnView btn-default btn-xs'>" + x[i]['noSep'] + "</button></td>";
					// res += "<td>" + x[i]['noSep'] + "</td>";
					res += "<td>" + x[i]['poli'] + "</td>";
					res += "<td>" + x[i]['ppkPelayanan'] + "</td>";
					res += "<td>" + x[i]['diagnosa'] + "</td>";
					res += "</tr>";
				}
				$('tbody#datariwayat').html(res);
			} else {
				alert(data.metaData.message);
				$('tbody#datariwayat').html('<tr class="odd"><td colspan="6" valign="top">No data available in table</td></tr>');
			}
		},
		error: function (jqXHR, ajaxOption, errorThrown) {
			console.log(jqXHR.responseText);
		}
	});
}

function setSep(nosep) {

	// if ($('#jarkomdat').is(':checked')) {
	// 	$('.step').hide();
	// 	$('#formsuratkontrol').show();
	// 	$('#noSEP').val(nosep);
	// }else{
	// 	cekSep(nosep)
	// }
	cekSep(nosep)
}

function cekSep(nosep) {
	$.ajax({
		url: url_call_back + "/vclaim/rencanakontrol/sep/" + nosep,
		type: "GET",
		data: {},
		dataType: "JSON",
		beforeSend: function () {
			// $('tbody#list-data-rujukan').html("<tr><td colspan=7><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
		},
		success: function (data) {
			if (data.metaData.code == 200) {
				// alert(data.metaData.message)
				$('.step').hide();
				$('#formsuratkontrol').show();
				$('#noSEP').val(nosep);
				let text = data.response.poli;
				const poli = text.split(" - ");
				var option = '<option value="">Pilih</option><option value="' + poli[0] + '">' + poli[1] + '</option>';
				$('#poliKontrol').html(option);
				// $('#txtNorujuk').val(data.response.provPerujuk.noRujukan)
				// $('#id_pengirim').val(data.response.provPerujuk.kdProviderPerujuk)
				// $('#pjPasienDikirimOleh').val(data.response.provPerujuk.nmProviderPerujuk)
				// pilihPengirim(data.response.provPerujuk.kdProviderPerujuk);
				// setTujuanLayanan(poli[0]);
				// alert(poli[0])
			} else {
				alert(data.metaData.message);
			}
		},
		error: function (jqXHR, ajaxOption, errorThrown) {
			console.log(jqXHR.responseText);
		}
	});
}

function dokterKontrol(jnsKontrol = "", poli = "") {
	if (jnsKontrol == "") var jnsKontrol = $('#jnsKontrol').val();
	if (poli == "") var poli = $('#poliKontrol').val();
	var tglRencanaKontrol = $('#tglRencanaKontrol').val();
	$.ajax({
		url: base_url + 'vclaim/rencanakontrol/dokter/' + jnsKontrol + "/" + poli + "/" + tglRencanaKontrol,
		type: "POST",
		dataType: "json",
		data: {
			get_param: 'value'
		},
		success: function (data) {
			if (data.metaData.code == 200) {
				var provinsi = data.response.list;
				var jmlData = provinsi.length;
				var option = "<option value=''>Pilih</option>";
				for (var i = 0; i < jmlData; i++) {
					option += "<option value='" + provinsi[i]["kodeDokter"] + "'>" + provinsi[i]["namaDokter"] + "</option>";
				}
				$('#kodeDokter').html(option);
			}
		}
	});
}

function u_dokterKontrol(jnsKontrol = "", poli = "") {
	if (jnsKontrol == "") var jnsKontrol = $('#u_jnsKontrol').val();
	if (poli == "") var poli = $('#u_poliKontrol').val();
	var tglRencanaKontrol = $('#u_tglRencanaKontrol').val();
	$.ajax({
		url: base_url + 'vclaim/rencanakontrol/dokter/' + jnsKontrol + "/" + poli + "/" + tglRencanaKontrol,
		type: "POST",
		dataType: "json",
		data: {
			get_param: 'value'
		},
		success: function (data) {
			if (data.metaData.code == 200) {
				var provinsi = data.response.list;
				var jmlData = provinsi.length;
				var option = "<option value=''>Pilih</option>";
				for (var i = 0; i < jmlData; i++) {
					option += "<option value='" + provinsi[i]["kodeDokter"] + "'>" + provinsi[i]["namaDokter"] + "</option>";
				}
				$('#u_kodeDokter').html(option);
			}
		}
	});
}

function hapusSurat(nosurat) {
	swal({
			title: "Konfirmasi",
			text: 'Apakah anda yakin akan Surat Kontrol Dengan No ' + nosurat + '?',
			type: "warning",
			showCancelButton: true,
			confirmButtonText: "Ya",
			cancelButtonText: "Tidak",
			closeOnConfirm: true,
			closeOnCancel: true
		},
		function (isConfirm) {
			if (isConfirm) {
				var url = url_call_back + "/vclaim/rencanakontrol/hapus/" + nosurat;
				$.ajax({
					url: url,
					type: "GET",
					dataType: "json",
					data: {},
					success: function (data) {
						console.clear();
						console.log(data);
						if (data.metaData.code == 200) {
							riwayatKontrol()
							hapusLokal(nosurat)
							tampilkanPesan('success', data.metaData.message)
						} else {
							tampilkanPesan('warning', data.metaData.message)
						}
					}
				});
			}
		})
}

function hapusLokal(nosurat) {
	var url = url_call_back + "/vclaim/rencanakontrol/hapuslokal/" + nosurat;
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: {},
		success: function (data) {
			console.clear();
			console.log(data);
			if (data.metaData.code == 200) {
				// riwayatKontrol()
				tampilkanPesan('success', data.metaData.message)
			} else {
				tampilkanPesan('warning', data.metaData.message)
			}
		}
	});
}

function buatSuratKontrol() {
	var jnsKontrol = $('#jnsKontrol').val();
	var noSEP = $('#noSEP').val();
	var tglRencanaKontrol = $('#tglRencanaKontrol').val();
	var poliKontrol = $('#poliKontrol').val();
	var namapoliKontrol = $('#poliKontrol :selected').html();
	var kodeDokter = $('#kodeDokter').val();
	var namaDokter = $('#kodeDokter :selected').html();

	var formData = {
		jnsKontrol: jnsKontrol,
		noSEP: noSEP,
		tglRencanaKontrol: tglRencanaKontrol,
		poliKontrol: poliKontrol,
		namapoliKontrol: namapoliKontrol,
		kodeDokter: kodeDokter, //Dokter yang menangani
		namaDokter: namaDokter, //Nama Dokter yang menangani
	}
	console.clear();
	// console.log(formData);
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url: url_call_back + "/vclaim/rencanakontrol/insert",
		type: "POST",
		data: formData,
		dataType: "JSON",
		success: function (data) {
			console.clear();
			console.log(data);
			if (data.metaData.code == 200) {
				riwayatKontrol()
				if (jnsKontrol == 2) {
					// Surat Kontrol Rawat Jalan
					var sk = data.response.noSuratKontrol;
				} else {
					var sk = data.response.noSPRI;
				}
				window.open(base_url + "vclaim/rencanakontrol/cetak/" + sk);
				// $('#no_suratkontrol').val(sk);
				$('#form-list-kontrol').modal('hide');
			} else {
				//alert(data.metaData.message);
				tampilkanPesan('warning', data.metaData.message);
			}
		},
		error: function (jqXHR, ajaxOption, errorThrown) {
			console.log(jqXHR.responseText);
		}
	});
}

function updateSuratKontrol() {
	var noSuratKontrol = $('#noSuratKontrol').val();
	swal({
			title: "Konfirmasi",
			text: 'Apakah anda yakin akan mengedit surat kontrol ' + noSuratKontrol + '?',
			type: "warning",
			showCancelButton: true,
			confirmButtonText: "Ya",
			cancelButtonText: "Tidak",
			closeOnConfirm: true,
			closeOnCancel: true
		},
		function (isConfirm) {
			if (isConfirm) {
				var jnsKontrol = $('#u_jnsKontrol').val();
				var noSEP = $('#u_noSEP').val();
				var tglRencanaKontrol = $('#u_tglRencanaKontrol').val();
				var poliKontrol = $('#u_poliKontrol').val();
				var namapoliKontrol = $('#u_poliKontrol :selected').html();
				var kodeDokter = $('#u_kodeDokter').val();
				var namaDokter = $('#u_kodeDokter :selected').html();
				var noSuratKontrol = $('#u_noSuratKontrol').val();

				var formData = {
					jnsKontrol: jnsKontrol,
					noSEP: noSEP,
					tglRencanaKontrol: tglRencanaKontrol,
					poliKontrol: poliKontrol,
					namapoliKontrol: namapoliKontrol,
					kodeDokter: kodeDokter, //Dokter yang menangani
					namaDokter: namaDokter, //Nama Dokter yang menangani,
					noSuratKontrol: noSuratKontrol
				}
				// var url = url_call_back+"/vclaim/rencanakontrol/hapus/"+nosurat;
				$.ajax({
					url: url_call_back + "/vclaim/rencanakontrol/update",
					type: "POST",
					data: formData,
					dataType: "JSON",
					success: function (data) {
						console.clear();
						console.log(data);
						if (data.metaData.code == 200) {
							riwayatKontrol()
							$('#formModal').modal('hide');
							tampilkanPesan('success', data.metaData.message)
						} else {
							tampilkanPesan('warning', data.metaData.message)
						}
					}
				});
			}
		})
}

function cekKontrol() {
	var jenis = $('#jenis').val();
	var tglRK = "<?= date('Y-m-d') ?>";
	console.clear();
	console.log(tglRK);
	$('#jnsKontrol').val(jenis)
	if (jenis == 1) {
		// SPRI
		formSPRI();
	} else {
		riwayatKunjungan();
	}
}

function formSPRI() {
	$('.step').hide();
	var noSEP = $('#no_bpjs').val();
	var tglRK = "<?= date('Y-m-d') ?>";
	console.clear();
	console.log(tglRK);
	$('#noSEP').val(noSEP);
	$('#tglRencanaKontrol').val(tglRK);
	$('#formsuratkontrol').show();
}

function resetFormKontrol() {
	$('.step').hide();
	$('#jns_kontrol').show();
	$('#formkontrol')[0].reset();
	$('#tglRencanaKontrol').val("");
	$('#poliKontrol').html("");
	$('#kodeDokter').html("");
}