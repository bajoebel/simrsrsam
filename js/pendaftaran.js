function getWilayah(start) {
	var prov = $('#prov').val();
	var kab = $('#kab').val();
	var kec = $('#kec').val();
	var kel = $('#kel').val();
	var kwn = $('#kewarganegaraan').val();
	//alert(kwn);
	//alert(this);
	if (kwn == "") {
		$('.groupKewarganegaraan').hide();
	} else if (kwn == "WNI") {
		$('#wilayah').show();
		$('.groupKewarganegaraan').hide();
		$('.groupWNI').show();
		//+"&kec="kec+"&kel="+kel
		var url = base_url + "/patch/getWilayah?start=" + start + "&prov=" + prov + "&kab=" + kab + "&kec=" + kec + "&kel=" + kel;
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
				//// console.clear();
				if (data["status"] == true) {
					var wilayah = data["data"];
					var jmlData = wilayah.length;
					var limit = data["limit"]
					var tabel = "";
					//Create Tabel
					for (var i = 0; i < jmlData; i++) {
						start++;
						tabel += "<tr>";
						tabel += "<td>" + wilayah[i]["provinsi"] + "</td>";
						tabel += "<td>" + wilayah[i]["kabkota"] + " " + wilayah[i]["nama_kabkota"] + "</td>";
						tabel += "<td>" + wilayah[i]["kecamatan"] + "</td>";
						tabel += "<td>" + wilayah[i]["desa"] + "</td>";
						tabel += '<td class=\'text-right\'>';
						tabel += '<button type=\'button\' class=\'btn btn-success btn-xs\' id="pilih' + i + '" onclick=\'setWilayah("' + wilayah[i]["provinsi"] + '","' + wilayah[i]["kabkota"] + ' ' + wilayah[i]["nama_kabkota"] + '","' + wilayah[i]["kecamatan"] + '","' + wilayah[i]["desa"] + '")\'><span class=\'fa fa-check\' ></span></button>';
						tabel += '</td>';
						tabel += "</tr>";
					}
					$('#data-wilayah').html(tabel);
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
						var btnFirst = "<button class='btn btn-default btn-sm' type='button' onclick='getWilayah(0)'><span class='fa fa-angle-double-left'></span></button>";
						if (curIdx > 1) {
							var prevSt = ((curIdx - 1) * data["limit"]) - jmlData;
							btnFirst += "<button class='btn btn-default btn-sm' type='button' onclick='getWilayah(" + prevSt + ")'><span class='fa fa-angle-left'></span></button>";
						}

						var btnLast = "";
						if (curIdx < jmlPage) {
							var nextSt = ((curIdx + 1) * data["limit"]) - jmlData;
							btnLast += "<button class='btn btn-default btn-sm' type='button' onclick='getWilayah(" + nextSt + ")'><span class='fa fa-angle-right'></span></button>";
						}
						btnLast += "<button class='btn btn-default btn-sm' type='button' onclick='getWilayah(" + lastSt + ")'><span class='fa fa-angle-double-right'></span></button>";

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
								if (curSt == st) btn = "btn-success";
								else btn = "btn-default";
								btnIdx += "<button class='btn " + btn + " btn-sm' type='button' onclick='getWilayah(" + st + ")'>" + j + "</button>";
							}
						} else {
							for (var j = 1; j <= jmlPage; j++) {
								st = (j * data["limit"]) - jmlData;
								if (curSt == st) btn = "btn-success";
								else btn = "btn-default";
								btnIdx += "<button class='btn " + btn + " btn-sm' type='button' onclick='getWilayah(" + st + ")'>" + j + "</button>";
							}
						}
						pagination += btnFirst + btnIdx + btnLast;
						$('#pagination').html("Showing 11 to 20 of 1234 " + pagination);
					}
				}
			}
		});
	} else {
		$('#wilayah').hide();
		$('.groupKewarganegaraan').hide();
		$('.groupWNA').show();
	}

}

function pilihKWN() {
	var kwn = $('#kewarganegaraan').val();

	if (kwn == "") {
		$('.groupKewarganegaraan').hide();
	} else if (kwn == "WNI") {
		//alert(kwn);
		$('.groupKewarganegaraan').hide();
		$('.groupWNI').show();
	} else {
		//alert(kwn);
		$('.groupKewarganegaraan').hide();
		$('.groupWNA').show();
	}
}

function cariWilayah() {
	var s = $("#show_wilayah").val();
	//alert(s);


	if (s == "1") {
		$('#wilayah').hide();
		$("#show_wilayah").val("0");
	} else {
		$('#wilayah').show();
		getWilayah();
		$("#show_wilayah").val("1");
	}
}

function setWilayah(provinsi, kabkota, kecamatan, kelurahan) {
	$('#nama_provinsi').val(provinsi);
	$('#nama_kab_kota').val(kabkota);
	$('#nama_kecamatan').val(kecamatan);
	$('#nama_kelurahan').val(kelurahan);
	$('#data-wilayah').html("");
	$('#wilayah').hide();
	$('#alamat').focus();
}

function enter_noktp(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	//console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		return false;
	} else {
		if (evt.keyCode == 13) {
			ceknikbpjs();
			$('#no_bpjs').focus();
			$('#wilayah').hide();
		}
	}
	return true;
}

function enter_bpjs(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	//console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		return false;
	} else {
		if (evt.keyCode == 13) {
			ceknomorbpjs();
			$('#nama').focus();
		}
	}
	return true;
}

function enter_nama(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#tempat_lahir').focus();
	}
	return true;
}

function enter_pjalamat(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#pjPasienTelp').focus();
	}
	return true;
}

function enter_pjalamatonline(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#id_cara_bayar').focus();
	}
	return true;
}

function enter_alamatpengirim(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#id_ruang').focus();
	}
	return true;
}

function enter_tmplahir(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#tgl_lahir').focus();
	}
	return true;
}

function enter_tgllahir(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#pgwPria').focus();
	}
	return true;
}

function enter_pgwPria(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#agama').focus();
	}
	return true;
}

function enter_pgwWanita(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#agama').focus();
	}
	return true;
}

function enter_agama(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	var value = $('#agama').val();
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		if (value == '-') {
			alert("Agama Belum Dipilih");
			$('#agama').focus();
		} else {
			$('#kewarganegaraan').focus();
		}

	}
	return true;
}

function enter_kwn(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	var value = $('#kewarganegaraan').val();
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		if (value == '') {
			alert("Kewarganegaraan Belum Dipilih");
			$('#kewarganegaraan').focus();
		} else {
			if (value == "WNI") {
				//getWilayah(0);
				$('#btnCariwilayah').focus();
			} else {
				$('#nama_negara').focus();
			}

		}

	}
	return true;
}

function enter_prov(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#kab').focus();
	}
	return true;
}

function enter_kab(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#kec').focus();
	}
	return true;
}

function enter_kec(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#kel').focus();
	}
	return true;
}

function enter_kel(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#pilih0').focus();
	}
	return true;
}

function enter_pekerjaan(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#status_kawin').focus();
	}
	return true;
}

function enter_status(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#suku').focus();
	}
	return true;
}

function enter_suku(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#bahasa').focus();
	}
	return true;
}

function enter_bahasa(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		//alert(evt.keyCode);
		$('#no_telpon').focus();
	}
	return true;
}

function enter_notelp(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#penanggung_jawab').focus();
	}
	return true;
}

function enter_pj(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#no_penanggung_jawab').focus();
	}
	return true;
}

function enter_nopj(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#submit').focus();
	}
	return true;
}

//Untuk Pendaftaran Rawat Jalan
function enter_pjnama(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#pjPasienPekerjaan').focus();
	}
	return true;
}

function enter_pjnama_aprove(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#pjPasienTelp').focus();
	}
	return true;
}

function enter_pjumur(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#pjPasienPekerjaan').focus();
	}
	return true;
}

function enter_pjpekerjaan(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#pjPasienAlamat').focus();
	}
	return true;
}

function enter_pjtelp(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#pjPasienHubKel').focus();
	}
	return true;
}

function enter_pjhubungan(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#id_cara_bayar').focus();
	}
	return true;
}

function enter_pjhubungan_aprove(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#pjPasienUmur').focus();
	}
	return true;
}

function enter_ruangan(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		var jns_layanan = $('#jns_layanan').val();
		if (jns_layanan == "RI") {
			$('#id_kamar').focus();
		} else {
			$('#dokterJaga').focus();
		}

	}
	return true;
}

function enter_kamar(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		$('#dokterJaga').focus();
	}
	return true;
}

function enter_dokter(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		var jkn = $('#jkn').val();
		if (jkn == 1) {
			$('#no_jaminan').focus();
		} else {
			$('#daftar').focus();
		}

	}
	return true;
}

function enter_dokterpengirim(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		$('#id_kelas').focus();
	}
	return true;
}

function enter_kelas(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		$('#id_ruang').focus();
	}
	return true;
}

function enter_norujukan(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		var txtNorujuk = $('#txtNorujuk').val();
		if (txtNorujuk == "") {
			getListRujukan();
		} else {
			if ($('#jarkomdat').is(':checked')) {
				cekRujukan();
			}

			var id_rujuk = $('#id_rujuk').val();
			if (id_rujuk == 6) $('#no_suratkontrol').focus();
			else $('#pjPasienDikirimOleh').focus();
		}
	} else {
		var txtNorujuk = $('#txtNorujuk').val();
		if (txtNorujuk.length == 19) {
			var tombol = '<button type="button" id="cariRujukan" class="btn btn-default" onclick="periksaRujukan()">' +
				'<i class="fa fa-check" id="iconcariRujukan"></i> Cek Rujukan</button>'
			$('#aksirujukan').html(tombol);
		} else {
			var tombol = '<button type="button" id="cariRujukan" class="btn btn-default" onclick="getListRujukan()">' +
				'<i class="fa fa-search" id="iconcariRujukan"></i> Cari Rujukan</button>'
			$('#aksirujukan').html(tombol);
		}
	}
	return true;
}

function enter_nokontrol(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		var no_suratkontrol = $('#no_suratkontrol').val();
		if (no_suratkontrol == "") {
			getListKontrol();
		} else {
			$('#pjPasienDikirimOleh').focus();
		}
	} else {
		var no_suratkontrol = $('#no_suratkontrol').val();
		if (no_suratkontrol.length == 19) {
			var jns_layanan = $('#jns_layanan').val();
			if (jns_layanan == "RI") {
				var btn = '<button type="button" id="cariKontrol" class="btn btn-default" onclick="cekKontrol()">' +
					'<i class="fa fa-check"></i> Cek SPRI</button>';
			} else {
				var btn = '<button type="button" id="cariKontrol" class="btn btn-default" onclick="cekKontrol()">' +
					'<i class="fa fa-check" id="iconCariKontrol"></i> Cek Surat Kontrol</button>';
			}
			$('#btnKontrol').html(btn)
		} else {
			if (jns_layanan == "RI") {
				var btn = '<button type="button" id="cariKontrol" class="btn btn-default" onclick="getListKontrol()">' +
					'<i class="fa fa-search" id="iconCariKontrol"></i> Buat SPRI</button>';
			} else {
				var btn = '<button type="button" id="cariKontrol" class="btn btn-default" onclick="getListKontrol()">' +
					'<i class="fa fa-search" id="iconCariKontrol"></i> Cek Kontrol</button>';
			}

		}
	}
	return true;
}

function enter_spri(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		var no_suratkontrol = $('#noSurat').val();
		if (no_suratkontrol == "") {
			getListKontrol();
		} else {
			$('#pjPasienDikirimOleh').focus();
		}
	} else {
		var no_suratkontrol = $('#noSurat').val();
		if (no_suratkontrol.length == 19) {
			var jns_layanan = $('#jns_layanan').val();
			if (jns_layanan == "RI") {
				var btn = '<button type="button" id="cariKontrol" class="btn btn-default" onclick="cekKontrol()">' +
					'<i class="fa fa-check" id="iconCariKontrol"></i> Cek SPRI</button>';
			} else {
				var btn = '<button type="button" id="cariKontrol" class="btn btn-default" onclick="cekKontrol()">' +
					'<i class="fa fa-check" id="iconCariKontrol"></i> Cek Surat Kontrol</button>';
			}
			$('#btnKontrol').html(btn)
		} else {
			if (jns_layanan == "RI") {
				var btn = '<button type="button" id="cariKontrol" class="btn btn-default" onclick="getListKontrol()">' +
					'<i class="fa fa-search" id="iconCariKontrol"></i> Buat SPRI</button>';
			} else {
				var btn = '<button type="button" id="cariKontrol" class="btn btn-default" onclick="getListKontrol()">' +
					'<i class="fa fa-search" id="iconCariKontrol"></i> Cek Kontrol</button>';
			}

		}
	}
	return true;
}

function enter_rujukan(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		var faskes = $('#faskes').val();
		if (faskes == "0") {
			$('#id_ruang').focus()
		} else {
			$('#txtNorujuk').focus();
		}
	}
	return true;
}

function enter_pengirim(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		//// console.clear();
		//console.log(evt.keyCode);
		//alert("ENTER");
		var id_pengirim = $('#id_pengirim').val();
		//alert(id_rujuk);
		if (id_pengirim == 'Lainnya') $('#pjPasienDikirimOleh').focus();
		else $('#pjPasienAlmtPengirim').focus();
	}
	return true;
}

function enter_pengirim1(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		$('#pjPasienAlmtPengirim').focus();
	}
	return true;
}

function enter_carabayar(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		console.log(evt.keyCode);
		var jkn = $('#jkn').val();
		if (jkn == "1") {
			$('#no_bpjs').focus();

		} else {
			//alert(jkn);
			$('#id_rujuk').focus();
		}

	}
	return true;
}



function enter_nobpjs(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (evt.keyCode == 13) {
		//console.log(evt.keyCode);
		//alert("enter No BPJS");
		var jns_layanan = $('#jns_layanan').val();
		if (jns_layanan == "RI") {
			$("#dokter_pengirim").focus();
		} else {
			$('#id_rujuk').focus();
		}

		cekPeserta();
	}
	return true;
}

function cekPeserta() {
	var status_peserta = $('#status_peserta').val();
	// alert(status_peserta);
	if (status_peserta == "") {
		var nobpjs = $("#no_bpjs").val();
		var tgllayanan = $('#sekarang').val();
		var url = url_call_back + "/vclaim/peserta/nokartu/" + nobpjs + "/" + tgllayanan;
		$.ajax({
			url: url,
			type: "GET",
			dataType: "json",
			data: {
				get_param: 'value'
			},
			beforeSend: function () {
				$('#cekStatus').prop("disabled", true);
				$('#iconCekStatus').removeClass('fa fa-check')
				$('#iconCekStatus').addClass('fa fa-spinner fa-spin')
			},
			success: function (data) {
				console.log(data);
				if (data.metaData.code == 200) {
					$('#cbasalrujukan').val(data.response.asalFaskes);
					var x = data["response"];
					console.log(x);
					$('#status_peserta').val(x.peserta.statusPeserta.keterangan);
					$('#id_jenis_peserta').val("2." + x.peserta.jenisPeserta.kode);
					$('#jenis_peserta').val(x.peserta.jenisPeserta.keterangan);
					$('#kodeppk').val(x.peserta.provUmum.kdProvider);
					$('#namappk').val(x.peserta.provUmum.nmProvider);
					if (x.peserta.statusPeserta.keterangan != "AKTIF") {
						var nomr = $('#nomr').val();
						if (nomr == "") {
							var status = '<a id="cekStatus" href="Javascript:cekPeserta()"><i class="fa fa-remove" id="iconCekStatus"></i> ' + x.peserta.statusPeserta.keterangan + '</a>';
						} else {
							var status = '<a id="cekStatus" href="Javascript:cekPeserta()"><i class="fa fa-remove" id="iconCekStatus"></i> ' + x.peserta.statusPeserta.keterangan + '</a>';
						}

						tampilkanPesan('warning', "Status Peserta Dengan Atas Nama : " + x.peserta.nama + " dengan noKartu : " + x.peserta.noKartu + " " + x.peserta.statusPeserta.keterangan + " Silahkan lakukan pengurusan terlebih dahulu ke kantor BPJS");
					} else {
						var nomr = $('#nomr').val();
						if (nomr == "") {
							var status = '<a id="cekStatus" href="Javascript:cekPeserta()"><i class="fa fa-check" id="iconCekStatus"></i> ' + x.peserta.statusPeserta.keterangan + '</a>';
						} else {
							var status = '<a id="cekStatus" href="Javascript:cekPeserta()" ><i class="fa fa-check" id="iconCekStatus"></i> ' + x.peserta.statusPeserta.keterangan + '</a>';
						}
						var jns_layanan = $('#jns_layanan').val();
						if (jns_layanan == 'RI') {
							var nama = $('#nama_pasien').val();
							$('#hakKelasid').val(x.peserta.hakKelas.kode);
							$('#hakKelas').val(x.peserta.hakKelas.keterangan);
						} else var nama = $('#nama').val();
						var nik = $('#no_ktp').val();
						// console.clear();
						console.log(data);
						var nomr = $('#nomr').val();
						if (nomr == "") {
							$('#no_ktp').val(x.peserta.nik);
							$('#nama').val(x.peserta.nama);
							if (x.peserta.sex == "L") $("input[name=jns_kelamin][value=1]").prop('checked', true);
							else $("input[name=jns_kelamin][value=0]").prop('checked', true);
							var tgllahir = x.peserta.tglLahir;
							var tgl = tgllahir.split("-");
							// alert(tgl[2] +"-" +tgl[1]+"-"+tgl[0])
							$('#tgl_lahir').val(tgl[2] + "/" + tgl[1] + "/" + tgl[0]);
							// alert(tgllahir)
							// $('#tgl_lahir').val(tgllahir);
						} else {
							if (nama != x.peserta.nama || nik != x.peserta.nik) {
								tampilkanPesan('warning', 'Terjadi ketidaksamaan data peserta BPJS dengan Data Pasien di SIMRS untuk peserta dengan \n\nNoPeserta : ' + x.peserta.noKartu + "\nNIK : " + x.peserta.nik + "\nNama Peserta : " + x.peserta.nama);
							}
						}

					}

					$('#status').html(status);
					var jns_layanan = $('#jns_layanan').val();
					if (jns_layanan == "RI") {
						$("#dokter_pengirim").focus();
						$("#asalRujukan").val("2");
						var norujukan = $('#reg_unit').val();
						$("#noRujukan").val(norujukan);
						$('#id_kelas').val(x.peserta.hakKelas.kode);
						$("#klsRawatKet").val(x.peserta.hakKelas.keterangan);
						$('#divPoli').hide();
						$('#cbasalrujukan').val("2").trigger('change'); //asalRujukan
						$('#txtkdppkasalrujukan').val('0304R001');
						$('#txtppkasalrujukan').val("RS ACHMAD MOCHTAR BUKITTINGGI");
						// alert('getdpjp')
						$("#jnsPelayanan").val("1");
						getdpjp(1, sekarang);
					} else {
						$("#asalRujukan").val("1");
						$("#tglRujukan").val("");
						$("#jnsPelayanan").val("2");
						$('#cbasalrujukan').val("1").trigger('change'); //asalRujukan
						$("#ppkRujukan").val(x["peserta"]['provUmum']['kdProvider']);
						$('#txtkdppkasalrujukan').val(x["peserta"]['provUmum']['kdProvider']);
						$('#txtppkasalrujukan').val(x["peserta"]['provUmum']['nmProvider']);
					}
					// var x=data["response"];
					// console.log(x);
					// Untuk keperluan SEP
					var cobass = x["peserta"]["cob"]["nmAsuransi"];
					if (cobass == null || cobass == "") $('#cob').prop("checked", false);
					else $('#cob').prop("checked", true);

					$("#noKartu").val(x["peserta"]["noKartu"]);
					
					$("#klsRawat").val(x["peserta"]["hakKelas"]["kode"]);
					$("#noMR").val(x['peserta']['mr']['noMR']);


					$('#tujuan').val("");
					$('#txtnmpoli').val("");
					$('#txtnmpoli').prop("readonly", true);


					$('#noTelp').val(x["peserta"]["mr"]["noTelepon"]);

					$('#noSurat').val('');
					// Belum ditemukan
					$('#txtidkontrol').val('');
					$('#noSuratlama').val('');
					$('#txtpoliasalkontrol').val('');
					$('#txttglsepasalkontrol').val('');

					$('#txtnmdpjp').val('');
					$('#kodeDPJP').val('');

					$('#txttglsep').val(tgllayanan);

					$('#txtnmdiagnosa').val("");
					$('#diagAwal').val("");

					$('#noTelp').val(x['peserta']['mr']['noTelepon']);

					$('#catatan').val('');
					$('#lakaLantas').prop('selectedIndex', 0);


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
					$('#ppk').html("PPK Asal Peserta");
					if(x.peserta.informasi.prolanisPRB !=null){
						var warn='<div class="col-md-12" ><div class="col-md-12" ><br><div class="alert alert-warning">'+
						x.peserta.informasi.prolanisPRB +
						'</div></div></div>';
						$('#warningprb').html(warn);
					}else{
						$('#warningprb').html("");
					}
					$('.rajal').hide();
					// $('#mpop_sep').modal('show');
					// $('#mpop_sep').on('shown.bs.modal', function (e) {
					// 	var reg_unit = $('#reg_unit').val();
					// 	//alert(reg_unit);
					// 	var dokterJaga = $('#dokterJaga').val();
					// 	if(reg_unit=="") var namaDokter = $('#dokterJaga :selected').html();
					// 	else namaDokter = $('#namaDokterJaga').val();
					// 	$('#kodeDokter').val(dokterJaga);
					// 	$('#txtnmDokter').val(namaDokter);
					// })

					//alert("Ok");
				} else {
					tampilkanPesan('warning', data.metaData.message);
				}
			},
			error: function (xhr) { // if error occured
				console.log(xhr.status + ' ' + xhr.responseText);
				$('#error').modal('show');
				$('#xhr').html(xhr.responseText)
				$('#cekStatus').prop("disabled", false);
				$('#iconCekStatus').removeClass('fa fa-spinner fa-spin')
				$('#iconCekStatus').addClass('fa fa-search')
			},
			complete: function () {
				$('#cekStatus').prop("disabled", false);
				$('#iconCekStatus').removeClass('fa fa-spinner fa-spin')
				$('#iconCekStatus').addClass('fa fa-search')
			},
		});
	}

}

function ceknikbpjs(pesan = 0) {

	console.log(url);
	// alert(alert)
	var nik = $("#no_ktp").val();

	var tgllayanan = $('#sekarang').val();
	var url = url_call_back + "/vclaim/peserta/nik/" + nik + "/" + tgllayanan;
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: {
			get_param: 'value'
		},
		success: function (data) {
			console.log(data);
			if (data.metaData.code == 200) {
				var x = data["response"];
				$('#no_bpjs').val(x.peserta.noKartu);
				$('#nama').val(x.peserta.nama);
				$('#no_telpon').val(x.peserta.mr.noTelepon);
				if (x.peserta.sex == 'P') {
					$("#pgwWanita").prop("checked", true);
				} else {
					$("#pgwPria").prop("checked", true);
				}
				$('#id_jenis_peserta').val("2." + x.peserta.jenisPeserta.kode);
				$('#jenis_peserta').val(x.peserta.jenisPeserta.keterangan);
				
				$('#kodeppk').val(x.peserta.provUmum.kdProvider);
				$('#namappk').val(x.peserta.provUmum.nmProvider);
				

				$('#e-id_jenis_peserta').val("2." + x.peserta.jenisPeserta.kode);
				$('#e-jenis_peserta').val(x.peserta.jenisPeserta.keterangan);
				$('#e-kodeppk').val(x.peserta.provUmum.kdProvider);
				$('#e-namappk').val(x.peserta.provUmum.nmProvider);
				var tgllahir = x.peserta.tglLahir;
				var tgl = tgllahir.split("-");
				$('#tgl_lahir').val(tgl[2] + "-" + tgl[1] + "-" + tgl[0]);
				// if (x.peserta.statusPeserta.kode == 0) $('#status').html('<a id="cekStatus" href="Javascript:cekPeserta()"><i class="fa fa-check">' + x.peserta.statusPeserta.keterangan + '</a>');
				// else $('#status').html('<a id="cekStatus" href="Javascript:cekPeserta()"><i class="fa fa-remove">' + x.peserta.statusPeserta.keterangan + '</a>');
				$('.statusjkn').html(x.peserta.statusPeserta.keterangan);
				if(pesan==1) tampilkanPesan('success', x.peserta.statusPeserta.keterangan);
				$('#tempat_lahir').focus();
			} else {
				$('#no_bpjs').focus();
				if (pesan == 1) tampilkanPesan('warning', data.metaData.message);
			}
		}
	});

}

function ceknomorbpjs(pesan = 0) {
	
	var nobpjs = $("#no_bpjs").val();
	var tgllayanan = $('#sekarang').val();
	var url = url_call_back + "/vclaim/peserta/nokartu/"+nobpjs+"/"+tgllayanan;
	console.log(url);
	// tampilkanPesan('warning',tgllayanan);
	$.ajax({
		url: url,
		type: "POST",
		dataType: "json",
		data: {
			param1: nobpjs,
			param2: tgllayanan
		},
		success: function (data) {
			console.log(data);
			if (data.metaData.code == 200) {
				var x = data["response"];
				$('#no_ktp').val(x.peserta.nik);
				$('#nama').val(x.peserta.nama);
				$('#no_telpon').val(x.peserta.mr.noTelepon);
				if (x.peserta.sex == 'P') {
					$("#pgwWanita").prop("checked", true);
				} else {
					$("#pgwPria").prop("checked", true);
				}
				var tgllahir = x.peserta.tglLahir;
				var tgl = tgllahir.split("-");
				$('#tgl_lahir').val(tgl[2] + "-" + tgl[1] + "-" + tgl[0]);
				$('.statusjkn').html(x.peserta.statusPeserta.keterangan);
				$('#id_jenis_peserta').val(x.peserta.jenisPeserta.kode)
				$('#jenis_peserta').val(x.peserta.jenisPeserta.keterangan)
				$('#kodeppk').val(x.peserta.provUmum.kdProvider)
				$('#namappk').val(x.peserta.provUmum.nmProvider)
				$('#tempat_lahir').focus();
			} else {
				$('#no_bpjs').focus();
				if (pesan == 1) tampilkanPesan('warning', data.metaData.message);
			}
		}
	});

}

function getDokter(id_ruang = "") {
	if (id_ruang == "") id_ruang = $('#id_ruang').val();
	var url = base_url + "/patch/getdokter/" + id_ruang;
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
			//// console.clear();
			console.log(url);
			if (data["status"] == true) {
				var dokter = data["data"];
				var jmlData = dokter.length;
				var limit = data["limit"]
				var option = "<option value=''>Pilih Dokter</option>";
				//Create Tabel
				var jns_layanan = $('#jns_layanan').val();
				// alert(jns_layanan);
				for (var i = 0; i < jmlData; i++) {
					// if(dokter[i]['did'] == null && jns_layanan=='RJ') var dis='disabled'; else dis='';
					// option+="<option value='"+dokter[i]["NRP"]+"' "+dis+">"+dokter[i]["pgwNama"]+"</option>";
					// if(dokter[i]['did'] == null && jns_layanan=='RJ') var dis='disabled'; else dis='';
					option += "<option value='" + dokter[i]["NRP"] + "'>" + dokter[i]["pgwNama"] + "</option>";
				}
				$('#dokterJaga').html(option);
			}
		}
	});
}

function getdpjp(param1 = "", param2 = "", param3 = "", dpjppilih = "") {
	// var jl=$('#jns_layanan').val();
	// if(param3=="IGD") param1=1;
	// else{
	// 	if(param1=="") param1 = $('#jnsPelayanan').val();
	// }
	if (param1 == "") param1 = $('#jnsPelayanan').val();
	if (param2 == "") param2 = $('#tglSep').val();
	if (param3 == "") param3 = $('#tujuan').val();
	var url = url_call_back + "/vclaim/referensi/dpjp/" + param1 + "/" + param2;
	// alert(url)
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: {
			spesialis: param3
		},
		success: function (data) {
			//menghitung jumlah data
			//// console.clear();
			//alert(param1 +" " +param2 + " " + param3);
			console.log(url);
			if (data.metaData.code == 200) {
				var dokter = data.response.list;
				var jmlData = dokter.length;
				var option = "<option value=''>Pilih Dokter</option>";
				//Create Tabel
				for (var i = 0; i < jmlData; i++) {
					if (dpjppilih == dokter[i]['kode']) option += "<option value='" + dokter[i]["kode"] + "' selected>" + dokter[i]["nama"] + "</option>";
					else option += "<option value='" + dokter[i]["kode"] + "' >" + dokter[i]["nama"] + "</option>";

				}
				$('#dpjpLayan').html(option);
				$('.dpjpLayan').html(option);
				$('#kodeDPJP').html(option);
			} else {
				var poli = $('#txtnmpoli').val();
				tampilkanPesan("warning", "Error saat pencarian data dokter " + poli + ' karena ' + data.metaData.message)
			}
		},
		error: function (xhr) { // if error occured
			$('#error').modal('show');
			$('#xhr').html(xhr.responseText)
		},
	});
}


function setDokter(id_dokter = "") {
	if (id_dokter == "") id_dokter = $('#id_dokter').val();
	var url = base_url + "/patch/setdokter/" + id_dokter;
	// console.clear();
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
			//// console.clear();
			console.log(url);
			if (data["status"] == true) {
				var dokter = data["data"];
				$('#dokterJaga').val(dokter["NRP"]);
			}
		}
	});
}

function getPengirim(id_rujuk = '') {
	if (id_rujuk == '') id_rujuk = $('#id_rujuk').val();
	var url = base_url + "/patch/getpengirim/" + id_rujuk;
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
			//// console.clear();
			console.log(url);
			if (data["status"] == true) {
				var pengirim = data["data"];
				$('#faskes').val(data["rujukan"]["id_faskes"]);
				var jmlData = pengirim.length;
				var option = "<option value=''>Pilih</option>";
				//Create Tabel
				for (var i = 0; i < jmlData; i++) {
					option += "<option value='" + pengirim[i]["idx"] + "'>" + pengirim[i]["nama_pengirim"] + "</option>";
				}
				option += "<option value='Lainnya'>LAINNYA</option>";
				$('#id_pengirim').html(option);
				if (id_rujuk != 1) {
					$('.adarujukan').show();
				} else {
					$('.adarujukan').hide();
				}
				//$('#pjPasienDikirimOleh').val("");
				//$('#pjPasienAlmtPengirim').val("");	        
			}
		}
	});
}

function pilihPengirim(id_pengirim = "") {
	if (id_pengirim == "") id_pengirim = $('#id_pengirim').val();
	var url = base_url + "/patch/pilihpengirim/" + id_pengirim;
	// console.clear();
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

			console.log(data);
			if (data["status"] == true) {

				var pengirim = data["data"];
				if (id_pengirim == 'Lainnya') {
					$('#pjPasienDikirimOleh').val('');
					$('#pjPasienAlmtPengirim').val('');
					$('.pengirim').removeClass("col-md-8");
					$('.pengirim').removeClass("col-sm-8");
					$('.pengirim').addClass("col-md-4");
					$('.pengirim').addClass("col-sm-4");
					$('#lainnya').show();
					$('#pjPasienDikirimOleh').focus();
				} else {
					$('#pjPasienDikirimOleh').val(pengirim["nama_pengirim"]);
					$('#pjPasienAlmtPengirim').val(pengirim["alamat_pengirim"]);
					$('.pengirim').removeClass("col-md-4");
					$('.pengirim').removeClass("col-sm-4");
					$('.pengirim').addClass("col-md-8");
					$('.pengirim').addClass("col-sm-8");
					$('#lainnya').hide();
				}

			} else {
				if (id_pengirim == 'Lainnya') {
					$('#pjPasienDikirimOleh').val('');
					$('#pjPasienAlmtPengirim').val('');
					$('.pengirim').removeClass("col-md-8");
					$('.pengirim').removeClass("col-sm-8");
					$('.pengirim').addClass("col-md-4");
					$('.pengirim').addClass("col-sm-4");
					$('#lainnya').show();
					$('#pjPasienDikirimOleh').focus();
				}
			}
		}
	});
}

function editPasien(nomr) {
	$('.groupKewarganegaraan').hide();
	$('#x-tgl_lahir').inputmask('dd/mm/yyyy', {
		'placeholder': 'dd/mm/yyyy'
	});
	$('#form_edit_pasien').modal('show');
	var url = base_url + "/registrasi/editpasien/" + nomr;
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
			//// console.clear();
			console.log(url);
			if (data["status"] == true) {
				var pasien = data["data"];
				//alert(pasien["idx"]);
				$('#x-idx').val(pasien["idx"]);
				$('#x-nomr').val(pasien["nomr"]);
				$('#x-no_ktp').val(pasien["no_ktp"]);
				$('#x-no_bpjs').val(pasien["no_bpjs"]);
				$('#x-nama').val(pasien["nama"]);
				$('#kewarganegaraan').val(pasien["kewarganegaraan"]);
				if (pasien["kewarganegaraan"] == 'WNI') {
					$('#wilayah').hide();
					$('.groupKewarganegaraan').hide();
					$('.groupWNI').show();
					$('#nama_provinsi').val(pasien["nama_provinsi"]);
					$('#nama_kab_kota').val(pasien["nama_kab_kota"]);
					$('#nama_kecamatan').val(pasien["nama_kecamatan"]);
					$('#nama_kelurahan').val(pasien["nama_kelurahan"]);
				} else {
					$('#wilayah').hide();
					$('.groupKewarganegaraan').show();
					$('.groupWNI').hide();
				}
				$('#x-tempat_lahir').val(pasien["tempat_lahir"]);
				//alert(pasien["tgl_lahir"]);
				var tgl = pasien['tgl_lahir'].split("-");
				//alert(tgl[0]);
				var tgl_lahir = tgl[2] + "/" + tgl[1] + "/" + tgl[0];
				$('#x-tgl_lahir').val(tgl_lahir);
				$('#alamat').val(pasien["alamat"]);
				$('#x-agama').val(pasien["agama"]);
				$('#x-pekerjaan').val(pasien["pekerjaan"]);
				$('#x-status_kawin').val(pasien["status_kawin"]);
				$('#x-suku').val(pasien["suku"]);
				$('#x-bahasa').val(pasien["bahasa"]);
				$('#x-no_telpon').val(pasien["no_telpon"]);
				$('#x-status_kawin').val(pasien["status_kawin"]);
				$('#x-penanggung_jawab').val(pasien["penanggung_jawab"]);
				$('#x-no_penanggung_jawab').val(pasien["no_penanggung_jawab"]);
				//alert($('#x-jns_kelamin').val());
				if (pasien["jns_kelamin"] == '1' || pasien["jns_kelamin"] == "L") $("#x-pgwPria").prop("checked", true);
				else $("#x-pgwWanita").prop("checked", true);
			}
		}
	});
}


// function simpanPasien() {
// 	//alert('Simpan');
// 	var a = $('#x-nama').val();
// 	var b = $('#x-tgl_lahir').val();
// 	var c = $('#kewarganegaraan').val();
// 	var d = $('#nama_negara').val();
// 	var e = $('#nama_provinsi').val();
// 	var f = $('#nama_kab_kota').val();
// 	var g = $('#nama_kecamatan').val();
// 	var h = $('#nama_kelurahan').val();
// 	var i = $('#alamat').val();
// 	var j = $('#x-no_telpon').val();
// 	var k = $('#penanggung_jawab').val();
// 	var l = $('#x-no_penanggung_jawab').val();
// 	if (a == "") {
// 		alert('Ops. nama pasien harus di isi.');
// 		$('#nama').focus();
// 	} else if (b == "") {
// 		alert('Ops. tanggal lahir harus di isi.');
// 		$('#tgl_lahir').focus();
// 	} else if (c == "") {
// 		alert('Ops. kewarganegaraan harus di pilih.');
// 		$('#kewarganegaraan').focus();
// 	} else if (c == "WNA" && d == "") {
// 		alert('Ops. negara harus di pilih.');
// 		$('#nama_negara').focus();
// 	} else if (c == "WNI" && e == "") {
// 		alert('Ops. provinsi harus di pilih.');
// 		$('#nama_provinsi').focus();
// 	} else if (c == "WNI" && f == "") {
// 		alert('Ops. kabupaten / kota harus di pilih.');
// 		$('#nama_kab_kota').focus();
// 	} else if (c == "WNI" && g == "") {
// 		alert('Ops. kecamatan harus di pilih.');
// 		$('#nama_kecamatan').focus();
// 	} else if (c == "WNI" && h == "") {
// 		alert('Ops. kelurahan harus di pilih.');
// 		$('#nama_kelurahan').focus();
// 	} else if (i == "") {
// 		alert('Ops. alamat harus di isi.');
// 		$('#alamat').focus();
// 	} else if (j == "") {
// 		alert('Ops. No HP / Telp pasien harus di isi.');
// 		$('#no_telpon').focus();
// 	} else if (k == "") {
// 		alert('Ops. Nama penanggung jawab harus di isi.');
// 		$('#penanggung_jawab').focus();
// 	} else if (l == "") {
// 		alert('Ops. No HP / Telp penanggung jawab harus di isi.');
// 		$('#no_penanggung_jawab').focus();
// 	} else {
// 		var x = confirm("Apakah anda yakin akan menyimpan data pasien ini?");
// 		if (x) {
// 			$.ajax({
// 				url: base_url + "/pasien_baru/simpan",
// 				type: "POST",
// 				data: $('#x-form-edit').serialize(),
// 				dataType: "JSON",
// 				success: function (data) {
// 					alert(data.message);
// 					window.location.reload();
// 				},
// 				error: function (jqXHR, ajaxOption, errorThrown) {
// 					console.log(jqXHR.responseText);
// 					alert(jqXHR.responseText);
// 				}
// 			});
// 		}
// 	}
// }

function updatePasien() {
	var kewarganegaraan=$('#kewarganegaraan').val();
	var id_provinsi=$('#e-nama_provinsi').val()
	var provinsi=$('#e-nama_provinsi :selected').html()
	var id_kab_kota=$('#e-nama_kab_kota').val()
	var nama_kab_kota=$('#e-nama_kab_kota :selected').html()
	var id_kecamatan=$('#e-nama_kecamatan').val()
	var nama_kecamatan=$('#e-nama_kecamatan :selected').html()
	var id_kelurahan=$('#e-nama_kelurahan').val()
	var nama_kelurahan=$('#e-nama_kelurahan :selected').html()
	var alamat=$('#e-alamat').val()
	var rt=$('#e-rt').val()
	var rw=$('#e-rw').val()
	var kodepos=$('#e-kodepos').val()
	var domisilisesuaiktp=$('#e-domisilisesuaiktp').prop("checked");
	if(domisilisesuaiktp==true) domisilisesuaiktp=1; else domisilisesuaiktp=0;
	var id_provinsi_d=$('#e-nama_provinsi_domisili').val()
	var provinsi_d=$('#e-nama_provinsi_domisili :selected').html()
	var id_kab_kota_d=$('#e-nama_kab_kota_domisili').val()
	var nama_kab_kota_d=$('#e-nama_kab_kota_domisili :selected').html()
	var id_kecamatan_d=$('#e-nama_kecamatan_domisili').val()
	var nama_kecamatan_d=$('#e-nama_kecamatan_domisili :selected').html()
	var id_kelurahan_d=$('#e-nama_kelurahan_domisili').val()
	var nama_kelurahan_d=$('#e-nama_kelurahan_domisili :selected').html()
	var alamat_d=$('#e-alamat_domisili').val()
	var rt_d=$('#e-rt_domisili').val()
	var rw_d=$('#e-rw_domisili').val()
	var kodepos_d=$('#e-kodepos_domisili').val()
	var id_negara=360
	var nama_negara='Indonesia';
	if(kewarganegaraan=="WNA"){
		id_negara=$('#e-nama_negara').val();
		nama_negara=$('#e-nama_negara :selected').html();
	}else{
		if(domisilisesuaiktp==1){
			id_provinsi_d=id_provinsi
			provinsi_d=provinsi
			id_kab_kota_d=id_kab_kota
			nama_kab_kota_d=nama_kab_kota
			id_kecamatan_d=id_kecamatan
			nama_kecamatan_d=nama_kecamatan
			id_kelurahan_d=id_kelurahan
			nama_kelurahan_d=nama_kelurahan
			alamat_d=alamat
			rt_d=rt
			rw_d=rw
			kodepos_d=kodepos
		}
	}
	var id_pekerjaan=$('#e-pekerjaan').val();
	if(id_pekerjaan==5) var nama_pekerjaan=$('#e-pekerjaanlain').val();
	else var nama_pekerjaan=$('#e-pekerjaan :selected').html();
	var jns_kelamin=$("input[name='jns_kelamin']:checked").val();
	var hambatan_bahasa=$('#e-keterbatasanbahasa').prop('checked');
	if(hambatan_bahasa==true) hambatan_bahasa=1; else hambatan_bahasa=0;
	var formdata = {
		idx: $('#e-idx').val(),
		nomr: $('#e-nomr').val(),
		booking: $('#e-booking').val(),
		no_ktp: $('#e-no_ktp').val(),
		no_bpjs: $('#e-no_bpjs').val(),
		id_jenis_peserta: $('#e-id_jenis_peserta').val(),
		jenis_peserta: $('#e-jenis_peserta').val(),
		kodeppk: $('#e-kodeppk').val(),
		namappk: $('#e-namappk').val(),
		nama: $('#e-nama').val(),
		tempat_lahir: $('#e-tempat_lahir').val(),
		tgl_lahir: $('#e-tgl_lahir').val(),
		jns_kelamin: jns_kelamin,
		id_tk_pddkn: $('#e-pendidikan').val(),
		pendidikan: $('#e-pendidikan :selected').html(),
		id_pekerjaan: $('#e-pekerjaan').val(),
		pekerjaan: nama_pekerjaan,
		id_agama: $('#e-agama').val(),
		agama: $('#e-agama :selected').html(),
		id_status_kawin: $('#e-status_kawin').val(),
		status_kawin: $('#e-status_kawin :selected').html(),
		id_etnis: $('#e-suku').val(),
		suku: $('#e-suku :selected').html(),
		id_bahasa: $('#e-bahasa').val(),
		bahasa: $('#e-bahasa :selected').html(),
		hambatan_bahasa: hambatan_bahasa,
		no_telpon: $('#e-no_telpon').val(),
		no_hp: $('#e-no_hp').val(),
		nama_ibu_kandung: $('#e-nama_ibu_kandung').val(),
		kewarganegaraan: kewarganegaraan,
		id_provinsi: id_provinsi,
		nama_provinsi: provinsi,
		id_negara: id_negara,
		nama_negara: nama_negara,
		id_kab_kota: id_kab_kota,
		nama_kab_kota: nama_kab_kota,
		id_kecamatan: id_kecamatan,
		nama_kecamatan: nama_kecamatan,
		id_kelurahan: id_kelurahan,
		nama_kelurahan: nama_kelurahan,
		alamat:alamat,
		rt:rt,
		rw:rw,
		kodepos:kodepos,
		id_provinsi_domisili: id_provinsi_d,
		nama_provinsi_domisili: provinsi_d,
		id_kab_kota_domisili: id_kab_kota_d,
		nama_kab_kota_domisili: nama_kab_kota_d,
		id_kecamatan_domisili: id_kecamatan_d,
		nama_kecamatan_domisili: nama_kecamatan_d,
		id_kelurahan_domisili: id_kelurahan_d,
		nama_kelurahan_domisili: nama_kelurahan_d,
		alamat_domisili:alamat_d,
		rt_domisili:rt_d,
		rw_domisili:rw_d,
		kodepos_domisili:kodepos_d,
		penanggung_jawab:$('#e-penanggung_jawab').val(),
		umur_pj:$('#e-umur_pj').val(),
		pekerjaan_pj:$('#e-pekerjaan_pj').val(),
		alamat_pj:$('#e-alamat_pj').val(),
		no_penanggung_jawab:$('#e-no_penanggung_jawab').val(),
		hub_keluarga:$('#e-hub_keluarga').val()
	}
	console.clear();
	console.log(formdata);
	
	var x = confirm("Apakah anda yakin akan menyimpan data pasien ini?");
	if (x) {
			$.ajax({
				url: base_url+"pasien_baru/simpan",
				type: "POST",
				data: formdata,
				dataType: "JSON",
				success: function(data) {
					alert(data.message);
					
					if (data.code == 200 || data.code==201) {
						location.reload();
					}else if(data.code==203){
						$('#err_nama').html(data.error.nama);
						if(data.error.tempat_lahir=="") $('#err_ttl').html(data.error.tgl_lahir);
						else $('#err_ttl').html(data.error.tempat_lahir);
						
						$('#err_no_hp').html(data.error.no_hp);
						$('#err_nama_ibu_kandung').html(data.error.nama_ibu_kandung);
						$('#err_kewarganegaraan').html(data.error.kewarganegaraan);
						$('#err_nama_negara').html(data.error.nama_negara);
						$('#err_nama_provinsi').html(data.error.nama_provinsi);
						$('#err_nama_kab_kota').html(data.error.nama_kab_kota);
						$('#err_nama_kecamatan').html(data.error.nama_kecamatan);
						$('#err_nama_kelurahan').html(data.error.nama_kelurahan);
						$('#err_alamat').html(data.error.alamat);
						$('#err_rt').html(data.error.rt);
						$('#err_rw').html(data.error.rw);
						$('#err_kodepos').html(data.error.kodepos);

						$('#err_nama_provinsi_domisili').html(data.error.nama_provinsi_domisili);
						$('#err_nama_kab_kota_domisili').html(data.error.nama_kab_kota_domisili);
						$('#err_nama_kecamatan_domisili').html(data.error.nama_kecamatan_domisili);
						$('#err_nama_kelurahan_domisili').html(data.error.nama_kelurahan_domisili);
						$('#err_alamat_domisili').html(data.error.alamat_domisili);
						$('#err_rt_domisili').html(data.error.rt_domisili);
						$('#err_rw_domisili').html(data.error.rw_domisili);
						$('#err_kodepos_domisili').html(data.error.kodepos_domisili);
						$('#err_penanggung_jawab').html(data.error.penanggung_jawab);
						$('#err_umur_pj').html(data.error.umur_pj);
						$('#err_pekerjaan_pj').html(data.error.pekerjaan_pj);
						$('#err_alamat_pj').html(data.error.alamat_pj);
						$('#err_no_penanggung_jawab').html(data.error.no_penanggung_jawab);
						$('#err_hub_keluarga').html(data.error.hub_keluarga);

					}
				},
				error: function(jqXHR, ajaxOption, errorThrown) {
					console.log(jqXHR.responseText);
					alert(jqXHR.responseText);
				}
			});
	}
}
function getListRujukan(b = "") {
	var id_rujuk=$('#id_rujuk').val();
	if(id_rujuk!=7){
		var a = $('#no_bpjs').val();

		if (b == "") {
			$('#pilihfaskes').hide();
			b = $('#faskes').val();
			if (b == 1) $('#headRujukan').html("Rujukan Faskes Tingkat I");
			else if (b == 2) $('#headRujukan').html("Rujukan Faskes Tingkat II");
			else {
				b = 1;
				$('#faskes').val("1");
				$('#headRujukan').html("Cari Rujukan");
				$('#pilihfaskes').show();
			}

		} else {
			$('#faskes').val(b);
		}
		var fomrdata = {}
		// console.clear();
		console.log(fomrdata);
		//console.log(url_call_back + "vclaim/rujukan/listRujukanBerdasarkanNomorKartu");
		$.ajax({
			url: url_call_back + "/vclaim/rujukan/listrujukan/" + b + "/" + a,
			type: "GET",
			data: fomrdata,
			dataType: "JSON",
			beforeSend: function () {
				// alert('Test')
				// console.clear();
				console.log("Disabled Cari Rujukan")
				$('#cariRujukan').prop("disabled", true);
				$('#iconcariRujukan').removeClass('fa fa-search')
				$('#iconcariRujukan').addClass('fa fa-spinner fa-spin')
			},
			success: function (data) {

				if (data.metaData.code == 200) {
					$('#form-list-rujukan').modal('show');
					var x = data.response.rujukan;
					// alert(x.length);
					var res = "";
					var encodedString = "";
					var dataForm = "";
					/** */
					var sekarang = $('#sekarang').val();
					for (var i = 0; i <= x.length - 1; i++) {
						var noKunjungan = x[i]['noKunjungan'];
						dataForm = JSON.stringify(x[i]);
						encodedString = Base64.encode(dataForm);
						var tk = moment(x[i]['tglKunjungan'], 'YYYY-M-D');
						var sk = moment(sekarang, 'YYYY-M-D');
						var lama = sk.diff(tk, 'days');
						// alert(diffDays);
						res += "<tr>";
						res += "<td>" + (i + 1) + "</td>";
						if (lama > 90) res += "<td><button onclick=setRujukan('" + encodedString + "') type='button' class='btn btnView btn-default btn-xs' disabled>" + x[i]['noKunjungan'] + "</button></td>";
						else res += "<td><button onclick=setRujukan('" + encodedString + "') type='button' class='btn btnView btn-default btn-xs'>" + x[i]['noKunjungan'] + "</button></td>";
						res += "<td>" + x[i]['tglKunjungan'] + "</td>";
						res += "<td>" + x[i]['peserta']['noKartu'] + "</td>";
						res += "<td>" + x[i]['peserta']['nama'] + "</td>";
						res += "<td>" + x[i]['provPerujuk']['nama'] + "</td>";
						res += "<td>" + x[i]['poliRujukan']['nama'] + "</td>";
						if (lama > 90) res += "<td><span class='btn btn-danger btn-xs'>Expire</span></td>";
						else res += "<td><span class='btn btn-success btn-xs'>Aktif</span></td>";
						res += "</tr>";
					}
					$('tbody#list-data-rujukan').html(res);
				} else {
					tampilkanPesan('warning', data.metaData.message);
					$('tbody#list-data-rujukan').html('<tr class="odd"><td colspan="8" valign="top">No data available in table</td></tr>');
				}
			},
			error: function (xhr) { // if error occured

				$('#error').modal('show');
				$('#xhr').html(xhr.responseText)
				$('#cariRujukan').prop("disabled", false);
				$('#iconcariRujukan').removeClass('fa fa-spinner fa-spin')
				$('#iconcariRujukan').addClass('fa fa-search')
			},
			complete: function () {
				$('#cariRujukan').prop("disabled", false);
				$('#iconcariRujukan').removeClass('fa fa-spinner fa-spin')
				$('#iconcariRujukan').addClass('fa fa-search')
			},
		});
	}else{
		var nomr=$('#nomr').val();
		$.ajax({
			url: url_call_back + "/registrasi/riwayat/" + nomr,
			type: "GET",
			data: {},
			dataType: "JSON",
			beforeSend: function () {
				// alert('Test')
				// console.clear();
				console.log("Disabled Cari Rujukan")
				$('#cariRujukan').prop("disabled", true);
				$('#iconcariRujukan').removeClass('fa fa-search')
				$('#iconcariRujukan').addClass('fa fa-spinner fa-spin')
			},
			success: function (data) {
				if(data.status==true){
					var res=data.data;
					var row="";
					for (let i = 0; i < res.length; i++) {
						const ele = res[i];
						row+= "<tr>";
						row+= "<td>" + (i + 1) + "</td>";
						row+= "<td><button onclick=setRujukanInternal('" + ele.id_daftar + "','" + ele.no_jaminan + "') type='button' class='btn btnView btn-default btn-xs'>" + ele.id_daftar + "</button></td>";
						row+= "<td>" + ele.tgl_masuk + "</td>";
						row+= "<td>" + ele.no_bpjs + "</td>";
						row+= "<td>" + ele.nama_pasien + "</td>";
						row+= "<td>" + ele.ppkperujuk + "</td>";
						row+= "<td>" + ele.nama_ruang + "</td>";
						row+= "<td><span class='btn btn-success btn-xs'>Aktif</span></td>";
						row+= "</tr>";
					}
					$('tbody#list-data-rujukan').html(row);
					$('#form-list-rujukan').modal('show');
				}
			},
			error: function (xhr) { // if error occured

				$('#error').modal('show');
				$('#xhr').html(xhr.responseText)
				$('#cariRujukan').prop("disabled", false);
				$('#iconcariRujukan').removeClass('fa fa-spinner fa-spin')
				$('#iconcariRujukan').addClass('fa fa-search')
			},
			complete: function () {
				$('#cariRujukan').prop("disabled", false);
				$('#iconcariRujukan').removeClass('fa fa-spinner fa-spin')
				$('#iconcariRujukan').addClass('fa fa-search')
			},
		});
	}
	
}

function getListKontrol() {
	// console.clear();
	var status = $('#status_peserta').val()
	if (status == "") {
		tampilkanPesan('warning', 'Status Peserta Tidak DIketahui Silahkan Klik Tombol CEK');
		return false
	} else if (status == "AKTIF") {
		$('#form-list-kontrol').modal('show');
		var jnsKontrol = $('#jnsKontrol').val();
		resetFormKontrol();
		console.clear();
		// alert(jnsKontrol)
		if (jnsKontrol == 2) {
			$('.step').hide();
			$('#listkontrol').show();
			rencanaKontrolBpjs();
		} else {
			var noKartu = $('#no_bpjs').val();
			// alert(noKartu)
			$('.step').hide();
			$('#listkontrol').show();
			rencanaKontrolBpjs();
			$('#noSEP').val(noKartu);
		}
	} else {
		tampilkanPesan('warning', 'Pencarian / Pembuatan Surat Kontrol / SPRI tidak bisa dilanjutkan karena status peserta ' + status);
		return false
	}
}

function resetFormKontrol() {
	$('.step').hide();
	$('#listkontrol').show();
	$('#formkontrol')[0].reset();
	$('#tglRencanaKontrol').val("");
	$('#poliKontrol').html("");
	$('#kodeDokter').html("");
}

function rencanaKontrolBpjs() {
	var nokartu = $('#no_bpjs').val();
	var bulan = $('#bulan').val();
	var tahun = $('#tahun').val();
	$.ajax({
		url: url_call_back + "/vclaim/rencanakontrol/listrencanakontrol/"+nokartu+"/"+bulan+"/"+tahun+"/2",
		type: "GET",
		data: {
			get_param: 'value'
		},
		dataType: "JSON",
		beforeSend: function () {
			$('tbody#datakontrol').html("<tr><td colspan=4><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
		},
		success: function (data) {
			if(data.metaData.code==200){
				var res = '';
				if (data.response.list.length > 0) {
					for (var i = 0; i <= data.response.list.length - 1; i++) {

						res += "<tr>";
						res += "<td>" + (i + 1) + "</td>";
						if (data["response"]["list"][i]['jnsKontrol'] == 2) {
							res += "<td>Surat Kontrol</td>";
						} else {
							res += "<td>SPRI</td>";
						}
						res += "<td><button onclick=setKontrol('" + data["response"]["list"][i]['noSuratKontrol'] + "') type='button' class='btn btnView btn-default btn-xs'>" + data["response"]["list"][i].noSuratKontrol + "</button></td>";
						res += "<td>" + data["response"]["list"][i]['namaPoliTujuan'] + "</td>";
						res += "<td>" + data["response"]["list"][i]['namaDokter'] + "</td>";
						res += "<td>" + data["response"]["list"][i]['tglTerbitKontrol'] + "</td>";
						res += "<td>" + data["response"]["list"][i]['tglRencanaKontrol'] + "</td>";
						res += "<td>" + data["response"]["list"][i]['terbitSEP'] + "</td>";
						res += "</tr>";
					}
					var jnsKontrol = $('#jnsKontrol').val();
					// alert(jnsKontrol);
					if (jnsKontrol == 1) res += '<tr class="odd"><td colspan="4" valign="top">Untuk membuat surat kontrol baru klik <a href="#" onclick="formSPRI()">Disini</a></td></tr>';
					else res += '<tr class="odd"><td colspan="4" valign="top">Untuk membuat surat kontrol baru klik <a href="#" onclick="riwayatKunjungan()">Disini</a></td></tr>';
					$('tbody#datakontrol').html(res);
				} else {
					// alert(data.metaData.message);
					var jnsKontrol = $('#jnsKontrol').val();
					// alert(jnsKontrol)

					if (jnsKontrol == 1) res = '<tr class="odd"><td colspan="4" valign="top">Untuk membuat surat kontrol baru klik <a href="#" onclick="formSPRI()">Disini</a></td></tr>';
					else res = '<tr class="odd"><td colspan="4" valign="top">Untuk membuat surat kontrol baru klik <a href="#" onclick="riwayatKunjungan()">Disini</a></td></tr>';
					$('tbody#datakontrol').html(res);
				}
			}else{
				var jnsKontrol = $('#jnsKontrol').val();
					// alert(jnsKontrol)

					if (jnsKontrol == 1) res = '<tr class="odd"><td colspan="4" valign="top">Untuk membuat surat kontrol baru klik <a href="#" onclick="formSPRI()">Disini</a></td></tr>';
					else res = '<tr class="odd"><td colspan="4" valign="top">Untuk membuat surat kontrol baru klik <a href="#" onclick="riwayatKunjungan()">Disini</a></td></tr>';
					$('tbody#datakontrol').html(res);
			}
			
		},
		error: function (jqXHR, ajaxOption, errorThrown) {
			console.log(jqXHR.responseText);
		}
	});
}
function listRencanaKontrol(nobpjs='') {
	// alert("test");
	if(nobpjs=='') nobpjs = $('#no_bpjs').val();
	var bulan = $('#bulan').val();
	var tahun = $('#tahun').val();
	var url=url_call_back + "/vclaim/rencanakontrol/listrencanakontrol/"+nobpjs+"/"+bulan+"/"+tahun+"/2";
	// alert(url)
	if(nobpjs.length>=13){
		$.ajax({
			url: url_call_back + "/vclaim/rencanakontrol/listrencanakontrol/"+nobpjs+"/"+bulan+"/"+tahun+"/2",
			type: "GET",
			data: {
				get_param: 'value'
			},
			dataType: "JSON",
			beforeSend: function () {
				$('#rencanakontrol').html("<tr><td colspan=4><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
			},
			success: function (data) {
				// console.log(data);
				var row = '';
				if (data.metaData.code == 200 ) {
					var res=data.response.list;
					console.clear();
					console.log(res);
					// return false;
					// alert(res.length)
					// return false;
					for (let i = 0; i < res.length; i++) {
						const ele = res[i];
						console.log(ele);
						if (ele.jnsKontrol == 1) jnslayanan = 'Rawat Inap';
						else jnslayanan = 'Rawat Jalan';
						console.log(jnslayanan)
						row += '<li class="list-group-item">'+
							'<div class="row">'+
								'<div class="col-md-4">jenis Kontrol</div>'+
								'<div class="col-md-8">: ' + jnslayanan+ "</div>"+
							"</div>"+
							'<div class="row">'+
								'<div class="col-md-4">No Surat</div>'+
								'<div class="col-md-8">: ' + "<button onclick=setKontrol('" + ele.noSuratKontrol + "') type='button' class='btn btnView btn-default btn-xs'>" + ele.noSuratKontrol + "</button>"+ "</div>"+
							"</div>"+
							'<div class="row">'+
								'<div class="col-md-4">Nama Poli</div>'+
								'<div class="col-md-8">: ' + ele['namaPoliTujuan'] + "</button>"+ "</div>"+
							"</div>"+
							'<div class="row">'+
								'<div class="col-md-4">Tgl Terbit Kontrol</div>'+
								'<div class="col-md-8">: ' + ele['tglTerbitKontrol'] + "</button>"+ "</div>"+
							"</div>"+
							'<div class="row">'+
								'<div class="col-md-4">Tgl Rencana kontrok</div>'+
								'<div class="col-md-8">: ' + ele['tglRencanaKontrol'] + "</button>"+ "</div>"+
							"</div>";
					}
					// for (var i = 0; i <= res.length ; i++) {
					// 	if (res[i].jnsKontrol == 1) jnslayanan = 'Rawat Inap';
					// 	else jnslayanan = 'Rawat Jalan';
					// 	res += '<li class="list-group-item">'+
					// 		'<div class="row">'+
					// 			'<div class="col-md-4">jenis Kontrol</div>'+
					// 			'<div class="col-md-8">: ' + jnslayanan+ "</div>"+
					// 		"</div>"+
					// 		'<div class="row">'+
					// 			'<div class="col-md-4">No Surat</div>'+
					// 			'<div class="col-md-8">: ' + "<button onclick=setKontrol('" + res[i].noSuratKontrol + "') type='button' class='btn btnView btn-default btn-xs'>" + res[i].noSuratKontrol + "</button>"+ "</div>"+
					// 		"</div>"+
					// 		'<div class="row">'+
					// 			'<div class="col-md-4">Nama Poli</div>'+
					// 			'<div class="col-md-8">: ' + res[i]['namapoliKontrol'] + "</button>"+ "</div>"+
					// 		"</div>"+
					// 		'<div class="row">'+
					// 			'<div class="col-md-4">Tgl Terbit Kontrol</div>'+
					// 			'<div class="col-md-8">: ' + res[i]['tglTerbitKontrol'] + "</button>"+ "</div>"+
					// 		"</div>"+
					// 		'<div class="row">'+
					// 			'<div class="col-md-4">Tgl Rencana kontrok</div>'+
					// 			'<div class="col-md-8">: ' + res[i]['tglRencanaKontrol'] + "</button>"+ "</div>"+
					// 		"</div>";

						
					// }
					
					$('#rencanakontrol').html(row);
				} else {
					// alert(data.metaData.message);
					var jnsKontrol = $('#jnsKontrol').val();
					// alert(jnsKontrol)
	
					if (jnsKontrol == 1) res = '<tr class="odd"><td colspan="4" valign="top">Untuk membuat surat kontrol baru klik <a href="#" onclick="formSPRI()">Disini</a></td></tr>';
					else res = '<tr class="odd"><td colspan="4" valign="top">Untuk membuat surat kontrol baru klik <a href="#" onclick="riwayatKunjungan()">Disini</a></td></tr>';
					$('#rencanakontrol').html(res);
				}
			},
			error: function (jqXHR, ajaxOption, errorThrown) {
				$('#rencanakontrol').html(jqXHR.responseText)
				console.log(jqXHR.responseText);
			}
		});
	}else{
		tampilkanPesan('warning','No Kartu BPJS Tidak Valid')
	}
	
}
function rencanaKontrol(nobpjs='') {
	if(nobpjs=='') nobpjs = $('#no_bpjs').val();
	if(nobpjs.length>=13){
		$.ajax({
			url: url_call_back + "/vclaim/monitoring/permintaankontrol/" + nobpjs,
			type: "GET",
			data: {
				get_param: 'value'
			},
			dataType: "JSON",
			beforeSend: function () {
				$('tbody#datakontrol').html("<tr><td colspan=4><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
			},
			success: function (data) {
	
				var res = '';
				if (data.length > 0) {
					for (var i = 0; i <= data.length - 1; i++) {
	
						res += "<tr>";
						res += "<td>" + (i + 1) + "</td>";
						if (data[i]['jnsKontrol'] == 2) {
							res += "<td>Surat Kontrol</td>";
						} else {
							res += "<td>SPRI</td>";
						}
						res += "<td><button onclick=setKontrol('" + data[i].noSuratKontrol + "') type='button' class='btn btnView btn-default btn-xs'>" + data[i].noSuratKontrol + "</button></td>";
						res += "<td>" + data[i]['namapoliKontrol'] + "</td>";
						res += "<td>" + data[i]['namaDokter'] + "</td>";
						res += "</tr>";
					}
					var jnsKontrol = $('#jnsKontrol').val();
					// alert(jnsKontrol);
					if (jnsKontrol == 1) res += '<tr class="odd"><td colspan="4" valign="top">Untuk membuat surat kontrol baru klik <a href="#" onclick="formSPRI()">Disini</a></td></tr>';
					else res += '<tr class="odd"><td colspan="4" valign="top">Untuk membuat surat kontrol baru klik <a href="#" onclick="riwayatKunjungan()">Disini</a></td></tr>';
					$('tbody#datakontrol').html(res);
				} else {
					// alert(data.metaData.message);
					var jnsKontrol = $('#jnsKontrol').val();
					// alert(jnsKontrol)
	
					if (jnsKontrol == 1) res = '<tr class="odd"><td colspan="4" valign="top">Untuk membuat surat kontrol baru klik <a href="#" onclick="formSPRI()">Disini</a></td></tr>';
					else res = '<tr class="odd"><td colspan="4" valign="top">Untuk membuat surat kontrol baru klik <a href="#" onclick="riwayatKunjungan()">Disini</a></td></tr>';
					$('tbody#datakontrol').html(res);
				}
			},
			error: function (jqXHR, ajaxOption, errorThrown) {
				console.log(jqXHR.responseText);
			}
		});
	}else{
		tampilkanPesan('warning','No Kartu BPJS Tidak Valid')
	}
	
}

function riwayatKunjungan(a='') {
	// alert("riwayat Kunjungan")
	$('.step').hide();
	$('#riwayat').show();
	if(a=='') var a = $('#no_bpjs').val();
	var dari = $('#dari').val();
	var sampai = $('#sampai').val();
	if(a.length>=13){
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
						res += "<tr>";
						res += "<td>" + (i + 1) + "</td>";
						res += "<td>" + x[i]['tglSep'] + "</td>";
						if (x[i]['jnsPelayanan'] == 2) res += "<td>R. Jalan</td>";
						else res += "<td>R. Inap</td>";
						res += "<td>" + x[i]['noRujukan'] + "</td>";
						res += "<td><button onclick=setSep('" + x[i]['noSep'] + "') type='button' class='btn btnView btn-default btn-xs'>" + x[i]['noSep'] + "</button></td>";
						res += "<td>" + x[i]['poli'] + "</td>";
						res += "<td>" + x[i]['ppkPelayanan'] + "</td>";
						res += "<td>" + x[i]['diagnosa'] + "</td>";
						res += "</tr>";
					}
					$('tbody#datariwayat').html(res);
				} else {
					tampilkanPesan('warning', data.metaData.message);
					$('tbody#datariwayat').html('<tr class="odd"><td colspan="6" valign="top">No data available in table</td></tr>');
				}
			},
			error: function (jqXHR, ajaxOption, errorThrown) {
				console.log(jqXHR.responseText);
			}
		});
	}
	
}

function cekKontrol() {
	var jenis = $('#jenis').val();
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
	$('#noSEP').val(noSEP);
	$('#formsuratkontrol').show();
}

function setSep(nosep) {

	if ($('#jarkomdat').is(':checked')) {
		$('.step').hide();
		$('#formsuratkontrol').show();
		$('#noSEP').val(nosep);
	} else {
		cekSep(nosep)
	}
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
				$('#txtNorujuk').val(data.response.provPerujuk.noRujukan)
				$('#id_pengirim').val(data.response.provPerujuk.kdProviderPerujuk)
				$('#pjPasienDikirimOleh').val(data.response.provPerujuk.nmProviderPerujuk)
				pilihPengirim(data.response.provPerujuk.kdProviderPerujuk);
				setTujuanLayanan(poli[0]);
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

function ListRujukan(b = "") {
	$('#form-list-rujukan').modal('show');
	var a = $('#no_bpjs').val();

	if (b == "") {
		$('#pilihfaskes').hide();
		b = $('#faskes').val();
		if (b == 1) $('#headRujukan').html("Rujukan Faskes Tingkat I");
		else if (b == 2) $('#headRujukan').html("Rujukan Faskes Tingkat II");
		else {
			b = 1;
			$('#faskes').val("1");
			$('#headRujukan').html("Cari Rujukan");
			$('#pilihfaskes').show();
		}

	} else {
		$('#faskes').val(b);
	}
	var fomrdata = {
		param1: a,
		param2: b
	}
	// console.clear();
	console.log(fomrdata);
	//console.log(url_call_back + "vclaim/rujukan/listRujukanBerdasarkanNomorKartu");
	$.ajax({
		url: url_call_back + "/vclaim/rujukan/listRujukanBerdasarkanNomorKartu",
		type: "POST",
		data: fomrdata,
		dataType: "JSON",
		beforeSend: function () {
			$('tbody#list-data-rujukan').html("<tr><td colspan=7><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
		},
		success: function (data) {

			if (data.metaData.code == 200) {
				var x = data.response.rujukan;
				// alert(x.length);
				var res = "";
				var encodedString = "";
				var dataForm = "";
				/** */
				for (var i = 0; i <= x.length - 1; i++) {
					var noKunjungan = x[i]['noKunjungan'];
					dataForm = JSON.stringify(x[i]);
					encodedString = Base64.encode(dataForm);

					res += "<tr>";
					res += "<td>" + (i + 1) + "</td>";
					res += "<td><button onclick=formGenerateSEP2('" + encodedString + "') type='button' class='btn btnView btn-default btn-xs'>" + x[i]['noKunjungan'] + "</button></td>";
					res += "<td>" + x[i]['tglKunjungan'] + "</td>";
					res += "<td>" + x[i]['peserta']['noKartu'] + "</td>";
					res += "<td>" + x[i]['peserta']['nama'] + "</td>";
					res += "<td>" + x[i]['provPerujuk']['nama'] + "</td>";
					res += "<td>" + x[i]['poliRujukan']['nama'] + "</td>";
					res += "</tr>";
				}
				$('tbody#list-data-rujukan').html(res);
			} else {
				alert(data.metaData.message);
				$('tbody#list-data-rujukan').html('<tr class="odd"><td colspan="7" valign="top">No data available in table</td></tr>');
			}
		},
		error: function (jqXHR, ajaxOption, errorThrown) {
			console.log(jqXHR.responseText);
		}
	});
}
function allrujukan(faskes=1){
    // var faskes=$('#faskes').val();
    var nobpjs=$('#no_bpjs').val()
	if(nobpjs.length>=13){
		$.ajax({
			url         : url_call_back+"/vclaim/rujukan/listrujukan/"+faskes+"/"+nobpjs,
			type        : "GET",
			data        : {},
			dataType    : "JSON",
			beforeSend: function() {
				// setting a timeout
				$('#tunggu').html("<i class='fa fa-refresh fa-spin' style='font-size:18pt'></i> Permintaan sedang diproses... Silahkan ditunggu");
				// $('#iconcariRujukan').removeClass('fa-search')
				// $('#iconcariRujukan').addClass('fa-spinner spin')
				// $(placeholder).addClass('loading');
			},
			success     : function(data){
				
				if(data.metaData.code==200){
					var table="";
					var x = data.response.rujukan;
					for (var i=0 ; i <= x.length-1; i++) {
						
						// if(histori[i].jnsPelayanan==1) jnslayanan='Rawat Inap';
						// else jnslayanan='Rawat Jalan';
						table+='<li class="list-group-item"><div class="row"><div class="col-md-4">No Rujukan </div><div class="col-md-8">: <button class="btn btn-default btn-xs" id="btnNoKunjungan'+x[i]['noKunjungan']+'" type="button" onclick="periksaRujukan(\''+x[i]['noKunjungan']+'\',\''+faskes+'\')">'+
						x[i]['noKunjungan']+"</button></div></div><div class='row'><div class='col-md-4'>Tgl Rujukan </div><div class='col-md-8'> : "+
						x[i]['tglKunjungan']+"</div></div><div class='row'><div class='col-md-4'>Prov Perujuk </div><div class='col-md-8'> : "+
						x[i]['provPerujuk']['nama']+"</div></div><div class='row'><div class='col-md-4'>Poli Perujuk </div><div class='col-md-8'> : "+
						x[i]['poliRujukan']['nama']+"</div></div><div class='row'><div class='col-md-4'>Keluhan </div><div class='col-md-8'> : "+
						x[i]['keluhan']+"</div></div><div class='row'><div class='col-md-4'>Diagnosa </div><div class='col-md-8'> : "+
						x[i]['diagnosa']['nama']+"</div></div>"+
						'</li>';
					}  
					if(faskes==1){
						$('#list_rujukan_faskes1').html(table);
					}else{
						$('#list_rujukan_faskes2').html(table);
					}
					
				}else{
					
					// tampilkanPesan('warning',data.metaData.message);
					// $('tbody#list-data-rujukan').html('<tr class="odd"><td colspan="8" valign="top">No data available in table</td></tr>');
				} 
			},
			error: function(xhr) { // if error occured
				$('#tunggu').html("")
				$('#error').modal('show');
				$('#xhr').html(xhr.responseText)
			},
			complete: function() {
				$('#tunggu').html("")
				// $('#cariRujukan').prop("disabled",false);
				// $('#iconcariRujukan').removeClass('fa-spinner spin')
				// $('#iconcariRujukan').addClass('fa-search')
			},
		});  
	}else{
		tampilkanPesan('warning', 'No BPJS tidak valid');
	}
    
}

function periksaRujukan(norujukan="",faskes=""){
	if(norujukan=="") norujukan=$('#txtNorujuk').val();
	if(faskes=="") faskes=$('#faskes').val();
	var jns_layanan=$('#jns_layanan').val();
	if(jns_layanan=="RI"){
		$('#noRujukan').val(norujukan);
	}else{
		$.ajax({
			url         : url_call_back+'/vclaim/rujukan/jmlsep/'+norujukan+'/'+faskes,
			type        : "GET",
			data        : {},
			dataType    : "JSON",
			beforeSend  : function(){
				$('#btnNoKunjungan'+norujukan).prop('disabled',true);
				$('#btnNoKunjungan'+norujukan).html("<i class='fa fa-refresh fa-spin' style='font-size:12pt'></i> Loading");
				
			},
			success     : function(data){
				// $('#loading').hide();
				// alert(data.metaData.message);
				
				$('#btnNoKunjungan'+norujukan).prop('disabled',false);
				$('#btnNoKunjungan'+norujukan).html(norujukan);  
				
				$('#jmlsep').val(data.response.jumlahSEP);
				viewRujukan(norujukan,faskes)
				if(data.metaData.code==200){
					if(data.response.jumlahSEP>0){
						$('#txtnmpoli').prop('readonly',false);
						$('#divkontrol').show();
					}else{
						$('#txtnmpoli').prop('readonly',true);
						$('#divkontrol').hide();
					}
					// cariRujukan(norujukan);
				}else{
					alert(data.metaData.message);
				} 
	
			},
			error       : function(jqXHR,ajaxOption,errorThrown){
				// $('#btnCariRujukanPasien').prop("disabled", false); // Element(s) are now enabled.
				// $('#btnCariRujukanPasien').html("Cari");
				console.log(jqXHR.responseText);               
				$('#btnNoKunjungan'+norujukan).prop('disabled',false);
				$('#btnNoKunjungan'+norujukan).html(norujukan);     
			}
		}); 
	}
	
	   
}
function setRujukanInternal(id_daftar,sep){
	$('#txtNorujuk').val(id_daftar);
	$('#no_jaminan').val(sep);
	$('#form-list-rujukan').modal('hide');
}
function setRujukan(encodedString) {
	var jsondata = Base64.decode(encodedString);
	// console.clear();
	// alert('test');
	console.clear();
	var x = JSON.parse(jsondata);
	console.log(x);
	$('#txtNorujuk').val(x.noKunjungan);
	$('#noRujukan').val(x.noKunjungan);
	$('#id_pengirim').val(x.provPerujuk.kode);
	$('#pjPasienDikirimOleh').val(x.provPerujuk.nama);
	$('#txtkdppkasalrujukan').val(x.provPerujuk.kode);
	$('#ppkRujukan').val(x.provPerujuk.kode);
	$('#txtppkasalrujukan').val(x.provPerujuk.nama);
	$('#kodeicd').val(x.diagnosa.kode);
	$('#nama_icd').val(x.diagnosa.nama);
	$('#diagAwal').val(x.diagnosa.kode);
	var nomr=$('#nomr').val();
	$('#noMr').val(nomr);
	$('#txtnmdiagnosa').val(x.diagnosa.nama);
	$('#tujuan').val(x.poliRujukan.kode);
	$('#tujuanRujukan').val(x.poliRujukan.kode);
	$('#txtnmpoli').val(x.poliRujukan.nama);
	$('#tglRujukan').val(x.tglKunjungan);
	if(x.provPerujuk.kode=="MAT") $('#divkatarak').show(); else $('#divkatarak').hide();
	$('#encryptdata').val(encodedString);
	var id_rujuk = $('#id_rujuk').val();
	if (id_rujuk == 6) $('#no_suratkontrol').focus();
	else $('#pjPasienDikirimOleh').focus();
	$('#form-list-rujukan').modal('hide');
	cekKunjungan(x.noKunjungan);
	pilihPengirim(x.provPerujuk.kode);
	setTujuanLayanan(x.poliRujukan.kode);
	var tombol = '<button type="button" id="cariRujukan" class="btn btn-default" onclick="periksaRujukan()">' +
		'<i class="fa fa-check" id="iconcariRujukan"></i> Cek Rujukan</button>'
	$('#aksirujukan').html(tombol);
	// alert(x.tglKunjungan);
	$('#ktglRujukan').val(x.tglKunjungan);
	periksaRujukan();
}
function showFormSEP(){
	$('.registrasi').removeClass('active');
	$('.formcreatesep').addClass('active');
}
function viewRujukan(norujukan="",faskes=2) {

	// var faskes = $('#faskes').val();
	// if(norujukan=="") norujukan = $('#txtNorujuk').val();
	$.ajax({
		url: url_call_back + '/vclaim/rujukan/norujuk/' + faskes + '/' + norujukan,
		type: "GET",
		data: {
			get_param: 'value'
		},
		dataType: "JSON",
		beforeSend: function () {
			// $('#cariRujukan').prop("disabled", true);
			// $('#iconcariRujukan').removeClass('fa fa-check')
			// $('#iconcariRujukan').addClass('fa fa-spinner fa-spin')
		},
		success: function (data) {
			// $('#loading').hide();
			// $('#formlistrujukan').show();
			if (data.metaData.code == 200) {
				var x = data.response.rujukan;
				// console.clear();
				console.log(data);
				$('#txtNorujuk').val(data.response.rujukan.noKunjungan);
				$('#cbasalrujukan').val(data.response.asalFaskes);
				$('#cbasalrujukan').val(data.response.asalFaskes).trigger('change');
				// trigger('change')
				$('#noRujukan').val(data.response.rujukan.noKunjungan);
				$('#diagAwal').val(data.response.rujukan.diagnosa.kode);
				$('#txtnmdiagnosa').val(data.response.rujukan.diagnosa.nama);
				$('#tujuan').val(data.response.rujukan.poliRujukan.kode);
				$('#tujuanRujukan').val(data.response.rujukan.poliRujukan.kode);
				$('#txtnmpoli').val(data.response.rujukan.poliRujukan.nama);
				$('#cbasalrujukan').val(data.response.asalFaskes);
				$('#asalRujukan').val(data.response.asalFaskes);
				$('#tglRujukan').val(data.response.rujukan.tglKunjungan);
				$('#ppkRujukan').val(data.response.rujukan.provPerujuk.kode)
				$('#txtkdppkasalrujukan').val(x.provPerujuk.kode);
				$('#txtppkasalrujukan').val(x.provPerujuk.nama);
				if(data.response.rujukan.poliRujukan.kode=="MAT"){
					$('#divkatarak').show();
				}else{
					$('#divkatarak').hide();
				}
				getdpjp();
			} else {
				tampilkanPesan('warning', data.metaData.message);
			}

		},
		error: function (xhr) { // if error occured
			console.log(xhr.responseText);
			$('#error').modal('show');
			$('#xhr').html(xhr.responseText)
			$('#cariRujukan').prop("disabled", false);
			$('#iconcariRujukan').removeClass('fa fa-spinner fa-spin')
			$('#iconcariRujukan').addClass('fa fa-check')
		},
		complete: function () {
			$('#cariRujukan').prop("disabled", false);
			$('#iconcariRujukan').removeClass('fa fa-spinner fa-spin')
			$('#iconcariRujukan').addClass('fa fa-check')
		},
	});
}

function cekRujukan(norujukan="") {

	var faskes = $('#faskes').val();
	if(norujukan=="") norujukan = $('#txtNorujuk').val();
	// alert(norujukan);
	$.ajax({
		url: url_call_back + '/vclaim/rujukan/norujuk/' + faskes + '/' + norujukan,
		type: "GET",
		data: {
			get_param: 'value'
		},
		dataType: "JSON",
		beforeSend: function () {
			$('#cariRujukan').prop("disabled", true);
			$('#iconcariRujukan').removeClass('fa fa-check')
			$('#iconcariRujukan').addClass('fa fa-spinner fa-spin')
		},
		success: function (data) {
			// $('#loading').hide();
			// $('#formlistrujukan').show();
			if (data.metaData.code == 200) {
				var x = data.response.rujukan;
				console.clear();
				console.log(data);
				$('#txtNorujuk').val(x.noKunjungan);
				$('#noRujukan').val(x.noKunjungan);
				$('#tujuan').val(x.poliRujukan.kode)
				$('#tujuanRujukan').val(x.poliRujukan.kode)
				$('#txtnmpoli').val(x.poliRujukan.nama)
				$('#cbasalrujukan').val(data.response.asalRujukan)
				$('#tglRujukan').val(x.tglKunjungan)
				$('#id_pengirim').val(x.provPerujuk.kode);
				$('#pjPasienDikirimOleh').val(x.provPerujuk.nama);
				// alert(x.poliRujukan.kode)
				getdpjp();
				var idrujuk = $('#id_rujuk').val();
				cekKunjungan(x.noKunjungan);
				pilihPengirim(x.provPerujuk.kode);
				setTujuanLayanan(x.poliRujukan.kode);
				dataForm = JSON.stringify(x);
				encodedString = Base64.encode(dataForm);
				$('#encryptdata').val(encodedString);
				$('#kodeicd').val(x.diagnosa.kode);
				$('#nama_icd').val(x.diagnosa.nama);
				// $('#form-list-rujukan').modal('hide');     
				var id_rujuk = $('#id_rujuk').val();
				if (id_rujuk == 6) $('#no_suratkontrol').focus();
				else $('#pjPasienDikirimOleh').focus();
			} else {
				tampilkanPesan('warning', data.metaData.message);
			}

		},
		error: function (xhr) { // if error occured
			console.log(xhr.responseText);
			$('#error').modal('show');
			$('#xhr').html(xhr.responseText)
			$('#cariRujukan').prop("disabled", false);
			$('#iconcariRujukan').removeClass('fa fa-spinner fa-spin')
			$('#iconcariRujukan').addClass('fa fa-check')
		},
		complete: function () {
			$('#cariRujukan').prop("disabled", false);
			$('#iconcariRujukan').removeClass('fa fa-spinner fa-spin')
			$('#iconcariRujukan').addClass('fa fa-check')
		},
	});
}

function cekKunjungan(norujuk) {
	var url = base_url + "/registrasi/cekkunjungan/" + norujuk;
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
			//// console.clear();
			console.log(url);
			// alert(data.data);
			if (data.status == true) {
				if (data.data > 0) {

					// $('#id_rujuk').val(6);
					var id_rujuk = $('#id_rujuk').val();
					if (id_rujuk != 6) {
						if (id_rujuk == 8) {
							$('.kontrolulang').hide()
						} else {
							$("#id_rujuk").select2("val", "6");
							$('#id_rujuk').val("6").trigger('change');
							$('.kontrolulang').show()
						}
					} else {
						$('.kontrolulang').show()
					}
				} else {
					// $('.kontrolulang').hide()
				}
			}
		}
	});
}

function setTujuanLayanan(kode) {
	if(kode!=''){
		var url = base_url + "registrasi/mapruang/" + kode;
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
				//// console.clear();
				console.log(url);
				if (data["status"] == true) {
					var id_ruang = $('#id_ruang').val();
					if (id_ruang != data["data"]["idx"]) $('#id_ruang').val(data["data"]["idx"]).trigger('change');
				}
			}
		});
	}
	
}

function controlSEP(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	//console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		return false;
	} else {
		if (evt.keyCode == 13) {
			var nosep = $('#no_jaminan').val();
			//alert(nosep.length);
			if (nosep.length == 19) {
				$('#prosessep').html('<a id="btnCekSEP" href="Javascript:cekSEP()" class="btn btn-danger">Cek SEP (<em>JKN Bridging</em>)</a>');
				cekSEP();
			} else {
				$('#prosessep').html('<a id="btnCreateSEP" href="Javascript:formSEP()" class="btn btn-danger">Create SEP (<em>Bridging</em>)</a>');
				formSEP();
			}
		}
	}
	return true;
}

function formSEP() {

	$('#pjPasienNama').removeClass("ui-autocomplete-input");
	var encryptdata = $('#encryptdata').val();
	//alert(encryptdata);
	if (encryptdata == "") {
		var faskes = $('#faskes').val();
		var jenis_layanan = $('#jns_layanan').val();

		if (jenis_layanan == "RJ") {
			if (faskes == 0) {
				// formGenerateSEP(encryptdata);
				var id_rujuk = $('#id_rujuk').val();
				if (id_rujuk == 4) {
					// alert("pasca Rawat Inap")
					formGenerateSEP('');
				} else {
					tampilkanPesan('warning', "Pasien Rawat Jalan Harus Membawa Surat Rujukan Dari Faskes I Atau Faskes II");
				}

			} else {
				var noRujuk = $('#txtNorujuk').val();
				if (noRujuk == "") {
					formGenerateSEP('');
				} else {
					if ($('#jarkomdat').is(':checked')) {
						// JIka Kunjungan Dengan Jarkomdat
						var id_rujuk = $('#id_rujuk').val();
						if (id_rujuk == 4) {
							formGenerateSEP('');
						} else tampilkanPesan('error', "Rujukan Tidak Valid Untuk faskes " + faskes);
					} else {
						formGenerateSEP('');
					}
				}
			}
		} else if (jenis_layanan == "GD") {

			if (faskes == 0) {
				// var nobpjs = $('#no_bpjs').val();
				// var tglSEP = $('#sekarang').val();
				// formSEPIGD(nobpjs, tglSEP);
				// alert("Form SEP")
				formGenerateSEP('');
			} else {
				tampilkanPesan('warning', "Rujukan Tidak Valid");

			}
		} else {
			// var nobpjs = $('#no_bpjs').val();
			//alert(nobpjs);
			// var tglSEP = $('#txtTanggal').val();
			// formSEPRANAP(nobpjs, tglSEP);
			formGenerateSEP('');
		}
		//alert("Rujukan Tidak Valid");

	} else {
		formGenerateSEP(encryptdata);
	}

}

function formGenerateSEP(a = '') {
	if (a == "") {
		// alert("tidak ada rujukan")
		// alert(a);
		// Jika tidak ada Rujukan Online
		var nomr = $("#nomr").val();
		$('#nomr_sep').val(nomr);
		$('#noMr').val(nomr)

		$('#tglRujukan').prop("readonly", false);
		// $('#noRujukan').prop("readonly", false);


		var tujuan = $('#tujuan').val();
		if (tujuan == "MAT") $('#divkatarak').show();
		else $('#divkatarak').hide();
		var jns_layanan = $('#jns_layanan').val();

		$('#divkontrol').hide();
		if (jns_layanan == 'GD') {
			// $("#txtnmpoli").prop("readonly", true);
			var tgllayanan = $('#sekarang').val();
			$('#tujuan').val("IGD");
			$('#txtnmpoli').val("INSTALASI GAWAT DARURAT");
			$('#divRujukan').hide();
			$('#tglRujukan').val(tgllayanan);
			var ppkRujukan = $('#ppkRujukan').val();
			if (ppkRujukan == "") $('#txtppkasalrujukan').prop('readonly', false);
			else $('#txtppkasalrujukan').prop('readonly', true);
			$('#mpop_sep').modal('show');
			$('#mpop_sep').on('shown.bs.modal', function (e) {
				$('#noSurat').show();
				getdpjp();

			})
		} else if (jns_layanan == "RI") {
			var no_suratkontrol = $('#no_suratkontrol').val();
			if (no_suratkontrol == '') {
				tampilkanPesan('warning', 'No SPRI Masih Kosong')
				return false;
			} else {
				$('#noSurat').val(no_suratkontrol)
				var rujukan = $('#reg_unit').val();
				// alert(rujukan);
				var url = url_call_back + "/vclaim/rencanakontrol/nosuratkontrol/" + no_suratkontrol;
				console.log("7. " + url);

				$.ajax({
					url: url,
					type: "GET",
					dataType: "json",
					data: {
						get_param: 'value'
					},
					success: function (data) {
						console.log("1." + data);
						if (data.metaData.code == 200) {
							var tgllayanan = $('#sekarang').val();
							$('#divkelasrawat').show();
							// $('.norujukan').hide();
							$("#asalRujukan").val("2");
							$("#tglRujukan").val("");
							$("#noRujukan").val(rujukan);
							$('#noRujukan').prop('readonly', false);
							$("#ppkRujukan").val('0304R001');
							// var tujuan=$('#tujuan').val();

							$('#tujuan').val("");
							$('#txtnmpoli').val("");
							$('#txtnmpoli').prop("readonly", true);

							if (data.response.poliTujuan == "MAT") $('#divkatarak').show();
							else $('#divkatarak').hide();

							$('#divPoli').hide();
							$('#cbasalrujukan').val("2").trigger('change'); //asalRujukan
							$('#txtkdppkasalrujukan').val('0304R001');
							$('#txtppkasalrujukan').val("RS ACHMAD MOCHTAR BUKITTINGGI");
							// $('#noSurat').val('');
							// Belum ditemukan
							$('#txtidkontrol').val('');
							$('#noSuratlama').val('');
							$('#txtpoliasalkontrol').val('');
							$('#txttglsepasalkontrol').val('');
							$('#txtnmdpjp').val('');
							$('#kodeDPJP').val('');
							$('#txttglsep').val(tgllayanan);
							$('#txtnmdiagnosa').val("");
							$('#diagAwal').val("");

							$('#divkelasrawat').show();
							$('#divRujukan').show();
							$('#divkontrol').show();
							$("#jnsPelayanan").val("1");
							// $('.rajal').show();
							$('#mpop_sep').modal('show');
							$('#mpop_sep').on('shown.bs.modal', function (e) {
								// getdpjp();
								// alert(data.jnsKontrol);
								getdpjp(data.response.jnsKontrol, data.response.tglRencanaKontrol, data.response.poliTujuan, data.response.kodeDokter);
							})
						} else {
							tampilkanPesan('warning', data.metaData.message)
						}
					}
				});
			}

		} else {
			var id_rujuk = $('#id_rujuk').val();
			var noRujuk = $('#txtNorujuk').val();
			// alert(id_rujuk)
			if (id_rujuk == 6 || id_rujuk == 4) {
				// Jika jarkomdat dan kontrolulang
				var no_suratkontrol = $('#no_suratkontrol').val();
				if (no_suratkontrol == "") {

					// $('#asalRujukan').val(1);
					// $('#cbasalrujukan').val("1").trigger('change'); //asalRujukan
					// $('#txtppkasalrujukan').prop("readonly",false);
					// $("#txtnmpoli").prop("readonly", false);
					// $('#mpop_sep').modal('show');
					tampilkanPesan('warning', 'No Surat Kontrol Masih Kosong');
					// $("#ppkRujukan").val('0304R001');

				} else {
					$('#noSurat').val(no_suratkontrol)
					var url = url_call_back + "/vclaim/rencanakontrol/nosuratkontrol/" + no_suratkontrol;
					console.log("2." + url);

					$.ajax({
						url: url,
						type: "GET",
						dataType: "json",
						data: {
							get_param: 'value'
						},
						beforeSend: function () {
							$('#btnCreateSep').prop("disabled", true);
							$('#iconbtnCreateSep').removeClass('fa fa-plus')
							$('#iconbtnCreateSep').addClass('fa fa-spinner fa-spin')
						},
						success: function (data) {
							console.log("3." + data);
							if (data.metaData.code == 200) {
								var tgllayanan = $('#sekarang').val();
								if (id_rujuk == 6) $('#tujuanKunj').val(2);
								else $('#asesmen').hide();
								cekTujuanKunjungan()
								$("#tglRujukan").val(data.response.sep.provPerujuk.tglRujukan);
								if (id_rujuk == 6) $("#noRujukan").val(data.response.sep.provPerujuk.noRujukan);
								else $("#noRujukan").val(data.response.sep.noSep);
								$("#ppkRujukan").val(data.response.sep.provPerujuk.kdProviderPerujuk);
								// var tujuan=$('#tujuan').val();

								$('#tujuan').val(data.response.poliTujuan);
								$('#txtnmpoli').val(data.response.namaPoliTujuan);
								$('#txtnmpoli').prop("readonly", false);

								if (data.response.poliTujuan == "MAT") $('#divkatarak').show();
								else $('#divkatarak').hide();

								$('#divPoli').show();
								var faskes = $('#faskes').val();
								// alert(faskes);
								$('#cbasalrujukan').val(faskes).trigger('change'); //asalRujukan
								$('#asalRujukan').val(faskes);
								$('#txtkdppkasalrujukan').val(data.response.sep.provPerujuk.kdProviderPerujuk);
								$('#txtppkasalrujukan').val(data.response.sep.provPerujuk.nmProviderPerujuk);

								// $('#noSurat').val('');
								// Belum ditemukan
								$('#txtidkontrol').val('');
								$('#noSuratlama').val('');
								$('#txtpoliasalkontrol').val('');
								$('#txttglsepasalkontrol').val('');
								$('#txttglsep').val(tgllayanan);
								var diagnosa = data.response.sep.diagnosa;
								var diagAwal = diagnosa.split(" - ");
								$('#txtnmdiagnosa').val(diagAwal[1]);
								$('#diagAwal').val(diagAwal[0]);
								$('#divkelasrawat').hide();
								$('#divRujukan').show();
								$('#divkontrol').show();
								$("#jnsPelayanan").val(data.response.jnsKontrol);
								$('#mpop_sep').modal('show');
								$('#mpop_sep').on('shown.bs.modal', function (e) {
									getdpjp(data.response.jnsKontrol, data.response.tglRencanaKontrol, data.response.poliTujuan, data.response.kodeDokter);
								})
							} else {
								tampilkanPesan('warning', data.metaData.message)
							}
						},
						error: function (xhr) { // if error occured
							console.log(xhr.responseText);
							$('#error').modal('show');
							$('#xhr').html(xhr.responseText)
							$('#btnCreateSep').prop("disabled", false);
							$('#iconbtnCreateSep').removeClass('fa fa-spinner fa-spin')
							$('#iconbtnCreateSep').addClass('fa fa-plus')
						},
						complete: function () {
							$('#btnCreateSep').prop("disabled", false);
							$('#iconbtnCreateSep').removeClass('fa fa-spinner fa-spin')
							$('#iconbtnCreateSep').addClass('fa fa-plus')
						}
					});
				}
			} else {
				// alert(id_rujuk);
				if(id_rujuk==7) $("#txtnmpoli").prop("readonly", false);
				else $("#txtnmpoli").prop("readonly", true);
				if ($('#jarkomdat').is(':checked')) {
					// JIka Kunjungan Dengan Jarkomdat
					if (noRujuk == "") {
						tampilkanPesan('warning', 'No Rujukan Tidak boleh kosong')
						return false
					} else {
						// tampilkanPesan('warning','Disiko')
						// return false;
					}
				} else {
					// formGenerateSEP('');
					var faskes = $('#faskes').val();
					// var noKartu=$('#')
					var noRujuk = $('#txtNorujuk').val();
					$('#noRujukan').val(noRujuk);
					$('#asalRujukan').val(faskes);
					$('#cbasalrujukan').val(faskes).trigger('change'); //asalRujukan
					$('#txtppkasalrujukan').prop("readonly", false);
					$("#txtnmpoli").prop("readonly", false);
					$('#mpop_sep').modal('show');
				}
			}
		}
	} else {
		
		var decodedString = Base64.decode(a);
		console.log(decodedString);
		var x = JSON.parse(decodedString);
		var asalRujukan = $('#faskes').val();
		var tglSEP = $('#txtTanggal').val();
		console.log(x);
		var nomr = $('#nomr').val();
		var id_rujuk = $('#id_rujuk').val();
		$("#txtnmpoli").prop("readonly", false);

		if (id_rujuk == "") {
			$('#noSurat').val('');
			tampilkanPesan('warning', "Asal Rujukan Masih Kosong");
			return false;
		} else if (id_rujuk == 6) {
			$('.divkontrol').show();
			// var noSurat=$('#no_suratkontrol').val();
			// // alert(noSurat);
			// $("#txtnmpoli").prop("readonly", true);
			// $('#noSurat').val(noSurat);
			var no_suratkontrol = $('#no_suratkontrol').val();
			if (no_suratkontrol == "") {
				// tampilkanPesan('warning', 'No Surat Kontrol Masih Kosong');
				$('#mpop_sep').modal('show');
				$('#mpop_sep').on('shown.bs.modal', function (e) {
					getdpjp();
				})
			}
			else {
				// alert('periksa kontrol');
				// return false;
				$('#noSurat').val(no_suratkontrol)
				var url = url_call_back + "/vclaim/rencanakontrol/nosuratkontrol/" + no_suratkontrol;
				console.log("4." + url);

				$.ajax({
					url: url,
					type: "GET",
					dataType: "json",
					data: {
						get_param: 'value'
					},
					success: function (data) {
						console.log(data);
						if (data.metaData.code == 200) {
							var tgllayanan = $('#sekarang').val();
							// $("#noRujukan").prop("readonly", false);
							// $('#txtppkasalrujukan').prop("readonly",false)
							$('#tujuanKunj').val(2);
							cekTujuanKunjungan()
							$("#tglRujukan").val(data.response.sep.provPerujuk.tglRujukan);
							$("#noRujukan").val(data.response.sep.provPerujuk.noRujukan);
							$("#ppkRujukan").val(data.response.sep.provPerujuk.kdProviderPerujuk);
							// var tujuan=$('#tujuan').val();
							$('#noMr').val(nomr)
							$('#tujuan').val(data.response.poliTujuan);
							$('#txtnmpoli').val(data.response.namaPoliTujuan);
							$('#txtnmpoli').prop("readonly", false);

							if (data.response.poliTujuan == "MAT") $('#divkatarak').show();
							else $('#divkatarak').hide();

							$('#divPoli').show();
							var faskes = $('#faskes').val();
							$('#cbasalrujukan').val(faskes).trigger('change'); //asalRujukan
							$('#asalRujukan').val(faskes);
							$('#txtkdppkasalrujukan').val(data.response.sep.provPerujuk.kdProviderPerujuk);
							// 1. Cek
							// $('#txtppkasalrujukan').val(data.response.sep.provPerujuk.nmProviderPerujuk);
							$('#txtppkasalrujukan').val("");
							// $('#noSurat').val('');
							// Belum ditemukan
							$('#txtidkontrol').val('');
							$('#noSuratlama').val('');
							$('#txtpoliasalkontrol').val('');
							$('#txttglsepasalkontrol').val('');
							$('#txttglsep').val(tgllayanan);
							var diagnosa = data.response.sep.diagnosa;
							var diagAwal = diagnosa.split(" - ");
							$('#txtnmdiagnosa').val(diagAwal[1]);
							$('#diagAwal').val(diagAwal[0]);
							$('#divkelasrawat').hide();
							$('#divRujukan').show();
							$('#divkontrol').show();
							$("#jnsPelayanan").val(data.response.jnsKontrol);
							$('#mpop_sep').modal('show');
							$('#mpop_sep').on('shown.bs.modal', function (e) {
								getdpjp(data.response.jnsKontrol, data.response.tglRencanaKontrol, data.response.poliTujuan, data.response.kodeDokter);
							})
						} else {
							tampilkanPesan('warning', data.metaData.message)
						}
					}
				});
			}

		} else {
			$('#noSurat').val('');
			$('.divkontrol').hide();
			var jenis_layanan = $('#jns_layanan').val();
			if (jenis_layanan == "RJ" && id_rujuk != 7) {
				$("#txtnmpoli").prop("readonly", true);
			}
			var cobass = x["peserta"]["cob"]["nmAsuransi"];
			if (cobass == null || cobass == "") $('#cob').prop("checked", false);
			else $('#cob').prop("checked", true);
			$("#noKartu").val(x["peserta"]["noKartu"]);
			$("#jnsPelayanan").val("2");
			$("#klsRawat").val(x["peserta"]["hakKelas"]["kode"]);
			var nomr = $("#nomr").val();
			// alert(nomr);
			$('#nomr_sep').val(nomr);
			// if(x['peserta']['mr']['noMR']==null) $("#noMr").val(nomr);
			// else $("#noMr").val(x['peserta']['mr']['noMr']);
			$('#noMr').val(nomr)
			$("#asalRujukan").val(asalRujukan);
			$("#tglRujukan").val(x["tglKunjungan"]);
			$("#noRujukan").val(x["noKunjungan"]);
			$("#ppkRujukan").val(x["provPerujuk"]["kode"]);

			/** 
			console.log(x.toSource());
			alert(x['diagnosa']['nama']);
			alert(x[0]['noKunjungan']);
			*/


			// alert("myObject is " + x.toSource());
			$('#cbasalrujukan').val(asalRujukan).trigger('change'); //asalRujukan
			$('#txtnmpoli').val(x['poliRujukan']['nama']);
			$('#tujuan').val(x['poliRujukan']['kode']);
			$('#tujuanRujukan').val(x['poliRujukan']['kode']);
			var tujuan = x['poliRujukan']['kode'];
			if (tujuan == "MAT") $('#divkatarak').show();
			else $('#divkatarak').hide();
			$('#txtkdppkasalrujukan').val(x['provPerujuk']['kode']);
			$('#txtppkasalrujukan').val(x['provPerujuk']['nama']);
			$('#tglKunjungan').val(x['tglKunjungan']);
			// $('#txtnorujukan').val(x['noKunjungan']);

			// Belum ditemukan
			$('#txtidkontrol').val('');
			$('#noSuratlama').val('');
			$('#txtpoliasalkontrol').val('');
			$('#txttglsepasalkontrol').val('');

			$('#txtnmdpjp').val('');
			$('#kodeDPJP').val('');

			$('#txttglsep').val(tglSEP);

			$('#txtnmdiagnosa').val(x['diagnosa']['nama']);
			$('#diagAwal').val(x['diagnosa']['kode']);
			console.log(x)
			$('#noTelp').val(x['peserta']['mr']['noTelepon']);

			$('#catatan').val('');
			$('#lakaLantas').prop('selectedIndex', 0);


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
			$('#ppk').html("PPK Asal Rujukan");
			$('#mpop_sep').modal('show');
			$('#mpop_sep').on('shown.bs.modal', function (e) {
				$('#noSurat').show();
				getdpjp();
			})
		}
	}

}

function formGenerateSEP2(a) {
	var decodedString = Base64.decode(a);
	var x = JSON.parse(decodedString);
	var asalRujukan = $('#faskes').val();
	var tglSEP = $('#txtTanggal').val();
	console.log(x);
	//var nomr=$('#nomr').val();
	var id_rujuk = $('#id_rujuk').val();
	if (id_rujuk == "") {
		tampilkanPesan('warning', "Asal Rujukan Masih Kosong");
		return false;
	} else if (id_rujuk == 6) {
		$('.divkontrol').show();
	} else {
		$('.divkontrol').hide();
	}


	var cobass = x["peserta"]["cob"]["nmAsuransi"];
	if (cobass == null || cobass == "") $('#cob').prop("checked", false);
	else $('#cob').prop("checked", true);
	$("#noKartu").val(x["peserta"]["noKartu"]);
	$("#jnsPelayanan").val("2");
	$("#klsRawat").val(x["peserta"]["hakKelas"]["kode"]);
	$("#noMR").val(x['peserta']['mr']['noMR']);
	$("#asalRujukan").val(asalRujukan);
	$("#tglRujukan").val(x["tglKunjungan"]);
	$("#noRujukan").val(x["noKunjungan"]);
	$("#ppkRujukan").val(x["provPerujuk"]["kode"]);

	/** 
	console.log(x.toSource());
	alert(x['diagnosa']['nama']);
	alert(x[0]['noKunjungan']);
	*/


	// alert("myObject is " + x.toSource());
	$('#cbasalrujukan').val(asalRujukan).trigger('change'); //asalRujukan
	$('#txtnmpoli').val(x['poliRujukan']['nama']);
	$('#tujuan').val(x['poliRujukan']['kode']);
	var tujuan = x['poliRujukan']['kode'];
	if (tujuan == "MAT") $('#divkatarak').show();
	else $('#divkatarak').hide();
	$('#txtkdppkasalrujukan').val(x['provPerujuk']['kode']);
	$('#txtppkasalrujukan').val(x['provPerujuk']['nama']);
	// $('#tglKunjungan').val(x['tglKunjungan']);
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

	$('#txttglsep').val(tglSEP);

	$('#txtnmdiagnosa').val(x['diagnosa']['nama']);
	$('#diagAwal').val(x['diagnosa']['kode']);

	$('#noTelp').val(x['peserta']['mr']['noTelepon']);

	$('#catatan').val('');
	$('#lakaLantas').prop('selectedIndex', 0);


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
	$('#ppk').html("PPK Asal Rujukan");
	//$('#mpop_rujukan').modal('hide');
	// $('#formModalSEP').modal('hide');
	$('#form-list-rujukan').modal('hide');
	$('#mpop_sep').modal('show');
	$('#mpop_sep').on('shown.bs.modal', function (e) {
		$('#noSurat').show();
		getdpjp();
	})
}

function formSEPIGD(nobpjs, tgllayanan) {
	// var url= url_call_back+"/vclaim/peserta/nokartu";
	var url = url_call_back + "/vclaim/peserta/nokartu/" + nobpjs + "/" + tgllayanan;
	console.log(url);

	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: {
			param1: nobpjs,
			param2: tgllayanan
		},
		success: function (data) {
			console.log(data);
			if (data.metaData.code == 200) {
				var x = data["response"];
				console.log(x);
				var cobass = x["peserta"]["cob"]["nmAsuransi"];
				if (cobass == null || cobass == "") $('#cob').prop("checked", false);
				else $('#cob').prop("checked", true);

				$("#noKartu").val(x["peserta"]["noKartu"]);
				$("#jnsPelayanan").val("2");
				$("#klsRawat").val(x["peserta"]["hakKelas"]["kode"]);
				// alert(x['peserta']['mr']['noMR']);
				$("#noMr").val(x['peserta']['mr']['noMR']);
				$("#asalRujukan").val("2");
				$("#tglRujukan").val("");
				$("#noRujukan").val("");
				$("#ppkRujukan").val(x["peserta"]['provUmum']['kdProvider']);
				$('#tujuan').val("IGD");
				$('#txtnmpoli').val("INSTALASI GAWAT DARURAT");
				$('#txtnmpoli').prop("readonly", true);
				$('#cbasalrujukan').val("1").trigger('change'); //asalRujukan

				$('#txtkdppkasalrujukan').val(x["peserta"]['provUmum']['kdProvider']);
				$('#txtppkasalrujukan').val(x["peserta"]['provUmum']['nmProvider']);
				$('#noTelp').val(x["peserta"]["mr"]["noTelepon"]);

				$('#noSurat').val('');
				// Belum ditemukan
				$('#txtidkontrol').val('');
				$('#noSuratlama').val('');
				$('#txtpoliasalkontrol').val('');
				$('#txttglsepasalkontrol').val('');

				$('#txtnmdpjp').val('');
				$('#kodeDPJP').val('');

				$('#txttglsep').val(tgllayanan);

				$('#txtnmdiagnosa').val("");
				$('#diagAwal').val("");

				$('#noTelp').val(x['peserta']['mr']['noTelepon']);

				$('#catatan').val('');
				$('#lakaLantas').prop('selectedIndex', 0);


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
				$('#ppk').html("PPK Asal Peserta");
				$('.rajal').hide();
				$('#mpop_sep').modal('show');
				var tgllayanan = $('#sekarang').val();

				$('#divRujukan').hide();
				$('#divkontrol').hide();
				$('#divkatarak').hide();
				$('#tglRujukan').val(tgllayanan);
				// var ppkRujukan=$('#ppkRujukan').val();
				// if(ppkRujukan=="") $('#txtppkasalrujukan').prop('readonly',false);
				// else  $('#txtppkasalrujukan').prop('readonly',true);
				$('#mpop_sep').modal('show');
				$('#mpop_sep').on('shown.bs.modal', function (e) {
					$('#noSurat').show();
					getdpjp();

				})
			} else {
				tampilkanPesan('warning', data.metaData.message);
			}
		}
	});
}

function formSEPRANAP() {
	var tgllayanan = $('#sekarang').val();
	$('#divkelasrawat').show();
	$('.rajal').show();
	$("#asalRujukan").val("2");
	$("#tglRujukan").val("");
	$("#noRujukan").val("");
	$("#ppkRujukan").val('0304R001');
	$('#tujuan').val("");
	$('#txtnmpoli').val("");
	$('#txtnmpoli').prop("readonly", true);
	$('#divPoli').hide();
	$('#cbasalrujukan').val("2").trigger('change'); //asalRujukan
	$('#txtkdppkasalrujukan').val('0304R001');
	$('#txtppkasalrujukan').val("RS ACHMAD MOCHTAR BUKITTINGGI");
	$('#noSurat').val('');
	// Belum ditemukan
	$('#txtidkontrol').val('');
	$('#noSuratlama').val('');
	$('#txtpoliasalkontrol').val('');
	$('#txttglsepasalkontrol').val('');
	$('#txtnmdpjp').val('');
	$('#kodeDPJP').val('');
	$('#txttglsep').val(tgllayanan);
	$('#txtnmdiagnosa').val("");
	$('#diagAwal').val("");
	$('#mpop_sep').modal('show');
	$('#mpop_sep').on('shown.bs.modal', function (e) {
		getdpjp();
	})
}

function formSEPRANAP1(nobpjs, tgllayanan) {
	var url = url_call_back + "/vclaim/peserta/nokartu";
	console.log(url);

	$.ajax({
		url: url,
		type: "POST",
		dataType: "json",
		data: {
			param1: nobpjs,
			param2: tgllayanan
		},
		success: function (data) {
			console.log(data);
			if (data.metaData.code == 200) {
				var x = data["response"];
				console.log(x);
				var cobass = x["peserta"]["cob"]["nmAsuransi"];
				if (cobass == null || cobass == "") $('#cob').prop("checked", false);
				else $('#cob').prop("checked", true);

				$("#noKartu").val(x["peserta"]["noKartu"]);
				$("#jnsPelayanan").val("1");
				$("#klsRawat").val(x["peserta"]["hakKelas"]["kode"]).trigger("change");
				$("#noMR").val(x['peserta']['mr']['noMR']);
				$("#asalRujukan").val("2");
				$("#tglRujukan").val("");
				$("#noRujukan").val("");
				$("#ppkRujukan").val('0304R001');
				$('#tujuan').val("");
				$('#txtnmpoli').val("");
				$('#txtnmpoli').prop("readonly", true);
				$('#divPoli').hide();
				$('#cbasalrujukan').val("2").trigger('change'); //asalRujukan

				$('#txtkdppkasalrujukan').val('0304R001');
				$('#txtppkasalrujukan').val("RS ACHMAD MOCHTAR BUKITTINGGI");
				$('#noTelp').val(x["peserta"]["mr"]["noTelepon"]);

				$('#noSurat').val('');
				// Belum ditemukan
				$('#txtidkontrol').val('');
				$('#noSuratlama').val('');
				$('#txtpoliasalkontrol').val('');
				$('#txttglsepasalkontrol').val('');

				$('#txtnmdpjp').val('');
				$('#kodeDPJP').val('');

				$('#txttglsep').val(tgllayanan);

				$('#txtnmdiagnosa').val("");
				$('#diagAwal').val("");

				$('#noTelp').val(x['peserta']['mr']['noTelepon']);

				$('#catatan').val('');
				$('#lakaLantas').prop('selectedIndex', 0);


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
				$('#divkelasrawat').show();
				$('.rajal').show();
				$('#mpop_sep').modal('show');
				$('#mpop_sep').on('shown.bs.modal', function (e) {
					getdpjp();
				})
			}
		}
	});
}

function getProvinsi(id = 'cbprovinsi', pilih = '') {
	var url = url_call_back + "/vclaim/referensi/propinsi";
	console.log(url);
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: {
			get_param: 'value'
		},
		success: function (data) {
			if (data.metaData.code == 200) {
				var provinsi = data.response.list;
				var jmlData = provinsi.length;
				var option = "<option value='-'>Pilih</option>";
				for (var i = 0; i < jmlData; i++) {
					if (pilih == provinsi[i]["kode"]) option += "<option value='" + provinsi[i]["kode"] + "' selected>" + provinsi[i]["nama"] + "</option>";
					else option += "<option value='" + provinsi[i]["kode"] + "'>" + provinsi[i]["nama"] + "</option>";
				}

				$('#' + id).html(option);
			}

		}
	});

}

function getKabupaten(id = "cbkabupaten", idprov = 'cbprovinsi', pilih = '') {

	console.log(url);
	var provinsi = $('#' + idprov).val();
	// alert(provinsi);
	// alert("Get Kabupaten "+provinsi)
	var url = url_call_back + "/vclaim/referensi/kabupaten/" + provinsi;
	$.ajax({
		url: url,
		type: "POST",
		dataType: "json",
		data: {
			param1: provinsi
		},
		success: function (data) {
			if (data.metaData.code == 200) {
				var provinsi = data.response.list;
				var jmlData = provinsi.length;
				var option = "<option value=''>Pilih Kabupaten</option>";
				for (var i = 0; i < jmlData; i++) {
					if (pilih == provinsi[i]["kode"]) option += "<option value='" + provinsi[i]["kode"] + "' selected>" + provinsi[i]["nama"] + "</option>";
					else option += "<option value='" + provinsi[i]["kode"] + "'>" + provinsi[i]["nama"] + "</option>";
					// option+="<option value='"+provinsi[i]["kode"]+"'>"+provinsi[i]["nama"]+"</option>";
				}
				$('#' + id).html(option);
			}
		}
	});
}

function getKecamatan(id = "cbkecamatan", id_kab = "cbkabupaten", pilih = '') {

	var provinsi = $('#' + id_kab).val();
	// alert("Get Kecamatan "+provinsi)
	var url = url_call_back + "/vclaim/referensi/kecamatan/" + provinsi;
	console.log(url);
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: {
			param: provinsi
		},
		success: function (data) {
			// // console.clear();
			console.log("data kecamatan...");
			console.log(data);
			if (data.metaData.code == 200) {
				var provinsi = data.response.list;
				var jmlData = provinsi.length;
				var option = "<option value=''>Pilih Kecamatan</option>";
				for (var i = 0; i < jmlData; i++) {
					if (pilih == provinsi[i]["kode"]) option += "<option value='" + provinsi[i]["kode"] + "' selected>" + provinsi[i]["nama"] + "</option>";
					else option += "<option value='" + provinsi[i]["kode"] + "'>" + provinsi[i]["nama"] + "</option>";
					// option+="<option value='"+provinsi[i]["kode"]+"'>"+provinsi[i]["nama"]+"</option>";
				}
				$('#' + id).html(option);
			}
		}
	});
}

function lakalantas() {
	var lakalantas = $('#lakaLantas').val();
	if (lakalantas == "-") var kll = 0;
	else var kll = parseInt(lakalantas);

	if (parseInt(kll) > 0) {
		$('#divJaminan').show();
		getProvinsi();
	} else {
		$('#divJaminan').hide();
	}
}

function e_lakalantas() {
	var lakalantas = $('#e-lakaLantas').val();
	if (lakalantas == "-") var kll = 0;
	else var kll = parseInt(lakalantas);

	if (parseInt(kll) > 0) {
		$('#e-divJaminan').show();
		getProvinsi('e-cbprovinsi');
	} else {
		$('#e-divJaminan').hide();
	}
}

function cekSuplesi() {
	// var sup=$('#suplesi:checked').val();
	if ($('#suplesi').prop('checked')) var sup = 1;
	else var sup = 0
	if (sup == 1) {
		$("#noSepSuplesi").prop("readonly", false)
	} else {
		$("#noSepSuplesi").prop("readonly", true)
	}
}

function e_cekSuplesi() {
	if ($('#e-suplesi').prop('checked')) var sup = 1;
	else var sup = 0
	// alert(sup)
	if (sup == 1) {
		$("#e-noSepSuplesi").prop("readonly", false)
	} else {
		$("#e-noSepSuplesi").prop("readonly", true)
	}
}

function cekTujuanKunjungan() {
	var tujuanKunj = $('#tujuanKunj').val();
	if (tujuanKunj == 0) {
		var prosedure = "<input type='hidden' id='flagProcedure' name='flagProcedure' value=''> "
		$('#prosedure').html(prosedure);

		var penunjang = "<input type='hidden' id='kdPenunjang' name='kdPenunjang' value=''> "
		$('#penunjang').html(penunjang);
		var jns_layanan = $('#jns_layanan').val();
		if (jns_layanan == "GD") {
			var asesmen = "<input type='hidden' id='assesmentPel' name='assesmentPel' value=''>";
		} else {
			var asesmen = "<div class=\"form-group\">" +
				"<label class=\"col-md-3 col-sm-3 col-xs-12 control-label\">Asesmen <label style=\"color:red;font-size:small\">*</label></label>" +
				"<div class=\"col-md-9 col-sm-9 col-xs-12\">" +
				"<select id='assesmentPel' name='assesmentPel' class='form-control'>" +
				"<option value=''>Pilih</option>" +
				"<option value='1'>Poli spesialis tidak tersedia pada hari sebelumnya</option>" +
				"<option value='2'>Jam Poli telah berakhir pada hari sebelumnya</option>" +
				"<option value='3'>Dokter Spesialis yang dimaksud tidak praktek pada hari sebelumnya</option>" +
				"<option value='4'>Atas Instruksi RS</option>" +
				"<option value='5'>Tujuan Kontrol</option>" +
				"</select></div></div>";
		}

		// var asesmen="<input type='hidden' id='assesmentPel' name='assesmentPel' value=''> "
		$('#asesmen').html(asesmen);
		$('.divkontrol').hide();
	} else if (tujuanKunj == 1) {
		var prosedure = "<div class=\"form-group\">" +
			"<label class=\"col-md-3 col-sm-3 col-xs-12 control-label\">Flag Prosedure <label style=\"color:red;font-size:small\">*</label></label>" +
			"<div class=\"col-md-9 col-sm-9 col-xs-12\">" +
			"<select name='flagProcedure' id='flagProcedure' class='form-control'>" +
			"<option value=''>Tidak Ada</option>" +
			"<option value='0'>Prosedur Tidak Berkelanjutan</option>" +
			"<option value='1'>Prosedur dan Terapi Berkelanjutan</option>" +
			"</select></div></div>";
		$('#prosedure').html(prosedure);
		var penunjang = "<div class=\"form-group\">" +
			"<label class=\"col-md-3 col-sm-3 col-xs-12 control-label\">Penunjang <label style=\"color:red;font-size:small\">*</label></label>" +
			"<div class=\"col-md-9 col-sm-9 col-xs-12\">" +
			"<select name='kdPenunjang' id='kdPenunjang' class='form-control'>" +
			"<option value=''>Tidak Ada</option>" +
			"<option value='1'>Radioterapi</option>" +
			"<option value='2'>Kemoterapi</option>" +
			"<option value='3'>Rehabilitasi Medik</option>" +
			"<option value='4'>Rehabilitasi Psikososial</option>" +
			"<option value='5'>Rehabilitasi Psikososial</option>" +
			"<option value='6'>Pelayanan Gigi</option>" +
			"<option value='7'>Laboratorium</option>" +
			"<option value='8'>USG</option>" +
			"<option value='9'>Farmasi</option>" +
			"<option value='10'>Lain-Lain</option>" +
			"<option value='11'>MRI</option>" +
			"<option value='12'>HEMODIALISA</option>" +
			"</select></div></div>";
		$('#penunjang').html(penunjang);

		var asesmen = "<input type='hidden' id='assesmentPel' name='assesmentPel' value=''> "
		$('#asesmen').html(asesmen);
		var tujuan = $('#tujuan').val();
		var tujuanRujukan = $('#tujuanRujukan').val();
		if (tujuan == tujuanRujukan) {
			$('.divkontrol').show();
		} else $('.divkontrol').hide();
		// if(tujuanKunj==2){
		// 	var asesmen="<div class=\"form-group\">"+
		// 	"<label class=\"col-md-3 col-sm-3 col-xs-12 control-label\">Asesmen <label style=\"color:red;font-size:small\">*</label></label>"+
		// 	"<div class=\"col-md-9 col-sm-9 col-xs-12\">"+
		// 	"<select name='assesmentPel' id='assesmentPel' class='form-control'>"+
		// 	"<option value=''>Tidak Ada</option>"+
		// 	"<option value='1'>Poli spesialis tidak tersedia pada hari sebelumnya</option>"+
		// 	"<option value='2'>Jam Poli telah berakhir pada hari sebelumnya</option>"+
		// 	"<option value='3'>Dokter Spesialis yang dimaksud tidak praktek pada hari sebelumnya</option>"+
		// 	"<option value='4'>Atas Instruksi RS</option>"+
		// 	"<option value='5'>Tujuan Kontrol</option>"+
		// 	"</select></div></div>";
		// 	// var asesmen="<input type='hidden' id='assesmentPel' name='assesmentPel' value=''> "
		// 	$('#asesmen').html(asesmen);
		// }else{
		// 	var asesmen="<div class=\"form-group\">"+
		// 	"<label class=\"col-md-3 col-sm-3 col-xs-12 control-label\">Asesmen Pel <label style=\"color:red;font-size:small\">*</label></label>"+
		// 	"<div class=\"col-md-9 col-sm-9 col-xs-12\">"+
		// 	"<select name='assesmentPel' id='assesmentPel' class='form-control'>"+
		// 	"<option value=''>Tidak Ada</option>"+
		// 	"<option value='1'>Poli spesialis tidak tersedia pada hari sebelumnya</option>"+
		// 	"<option value='2'>Jam Poli telah berakhir pada hari sebelumnya</option>"+
		// 	"<option value='3'>Dokter Spesialis yang dimaksud tidak praktek pada hari sebelumnya</option>"+
		// 	"<option value='4'>Atas Instruksi RS</option>"+
		// 	"<option value='5'>Tujuan Kontrol</option>"+
		// 	"</select></div></div>";
		// 	// var asesmen="<input type='hidden' id='assesmentPel' name='assesmentPel' value=''> "
		// 	$('#asesmen').html(asesmen);
		// }
	} else {
		// alert(tujuanKunj)
		$('#asesmen').show();
		var prosedure = "<input type='hidden' id='flagProcedure' name='flagProcedure' value=''> "
		$('#prosedure').html(prosedure);

		var penunjang = "<input type='hidden' id='kdPenunjang' name='kdPenunjang' value=''> "
		$('#penunjang').html(penunjang);

		var asesmen = "<div class=\"form-group\">" +
			"<label class=\"col-md-3 col-sm-3 col-xs-12 control-label\">Asesmen <label style=\"color:red;font-size:small\">*</label></label>" +
			"<div class=\"col-md-9 col-sm-9 col-xs-12\">" +
			"<select name='assesmentPel' id='assesmentPel' class='form-control'>" +
			"<option value=''>Tidak Ada</option>" +
			"<option value='1'>Poli spesialis tidak tersedia pada hari sebelumnya</option>" +
			"<option value='2'>Jam Poli telah berakhir pada hari sebelumnya</option>" +
			"<option value='3'>Dokter Spesialis yang dimaksud tidak praktek pada hari sebelumnya</option>" +
			"<option value='4'>Atas Instruksi RS</option>" +
			"<option value='5'>Tujuan Kontrol</option>" +
			"</select></div></div>";
		// var asesmen="<input type='hidden' id='assesmentPel' name='assesmentPel' value=''> "
		$('#asesmen').html(asesmen);
		$('.divkontrol').show();
	}
}

function createSEP() {
	var eksekutif = $('#eksekutif:checked').val();
	var cob = $('#cob:checked').val();
	var katarak = $('#katarak:checked').val();
	var lakaLantas = $('#lakaLantas').val();
	if (cob != 1) cob = 0;
	if (katarak != 1) katarak = 0;
	// if(lakaLantas!=1) lakaLantas=0;
	if (eksekutif != 1) eksekutif = 0;
	if (lakaLantas == "") {
		// alert(lakaLantas)
		tampilkanPesan('warning', 'Status Kecelakaan Masih Kosong, silahkan pilih Bukan Kecelakaan, Kecelakaan LaluLintas dan Bukan Kecelakaan Kerja, Kecelakaan LaluLintas dan Kecelakaan Kerja, Kecelakaan Kerja')
		return false
	}
	if (lakaLantas > 0) {
		// lakaLantas=1;
		var penjamin = $('#penjamin').val();
		var tglKejadian = $('#txtTglKejadian').val();
		var keterangan = $('#txtketkejadian').val();
		var suplesi = $('#suplesi:checked').val();
		if (suplesi != 1) suplesi = 0;
		if (suplesi == 1) {
			var noSepSuplesi = $('#noSepSuplesi').val();
		} else {
			var noSepSuplesi = "";
		}
		var kdPropinsi = $('#cbprovinsi').val();
		var kdKabupaten = $('#cbkabupaten').val();
		var kdKecamatan = $('#cbkecamatan').val();
	} else {
		var penjamin = "";
		var tglKejadian = "";
		var keterangan = "";
		var suplesi = 0;
		var noSepSuplesi = "";
		var kdPropinsi = "";
		var kdKabupaten = "";
		var kdKecamatan = "";

	}
	var jns_layanan = $('#jns_layanan').val();
	if (jns_layanan == "RJ" || jns_layanan == "RI") {
		var kodeDPJP = $('#kodeDPJP').val();
		var namaDPJP = $('#kodeDPJP :selected').html();
		var kodeDokter = $('#kodeDokter').val();
		var namaDokter = $('#kodeDokter :selected').html();
	} else {
		var kodeDPJP = $('#kodeDPJP').val();
		var namaDPJP = $('#txtnmdpjp').val();
		var kodeDokter = $('#kodeDokter').val();
		var namaDokter = $('#txtnmDokter').val();
	}
	if (jns_layanan == "RJ") {
		var noRujukan = $('#noRujukan').val();
		if (noRujukan == "") {
			tampilkanPesan('warning', "No Rujukan Tidak Boleh Kosong");
			return false;
		}
		var tujuan = $('#tujuan').val();
		var tujuanRujukan = $('#tujuanRujukan').val();
		if (tujuan == tujuanRujukan) {
			var tujuanKunj = $('#tujuanKunj').val();
			if (tujuanKunj == 2) {
				var no_surat = $('#noSurat').val();
				if (no_surat == "") {
					tampilkanPesan('warning', 'No Surat Kontrol Tidak Boleh Kosong');
					return false;
				}
				var assesmentPel = $('#assesmentPel').val();
				if (assesmentPel == "") {
					$('#asspel').modal('show');
					return false;
				}
				var kodeDPJP = $('#kodeDPJP').val();
				if (kodeDPJP == "") {
					tampilkanPesan('warning', 'Dokter DPJP Tidak Boleh Kosong');
					return false;
				}
			}

		}
	}
	var dpjpLayan = $('#dpjpLayan').val();
	if (dpjpLayan == "") {
		tampilkanPesan('warning', "Dpjp Yang Melayani Tidak Boleh Kosong");
		return false;
	}
	// var klsRawat=$('#klsRawat').val();
	// alert(klsRawat);
	var formData = {
		idx: $('#idx').val(),
		noKartu: $('#noKartu').val(),
		tglSep: $('#tglSep').val(),
		ppkPelayanan: $('#ppkPelayanan').val(),
		jnsPelayanan: $('#jnsPelayanan').val(),
		klsRawatHak: $('#klsRawat').val(), //Baru
		klsRawatNaik: $('#klsRawatNaik').val(), //Baru
		pembiayaan: $('#pembiayaan').val(), //Baru
		penanggungJawab: $('#penanggungJawab').val(), //Baru
		noMR: $('#noMr').val(),
		asalRujukan: $('#asalRujukan').val(),
		tglRujukan: $('#tglRujukan').val(),
		noRujukan: $('#noRujukan').val(),
		ppkRujukan: $('#ppkRujukan').val(),
		catatan: $('#catatan').val(),
		diagAwal: $('#diagAwal').val(),
		tujuan: $('#tujuan').val(),
		eksekutif: eksekutif,
		cob: cob,
		katarak: katarak,
		lakaLantas: lakaLantas,
		penjamin: penjamin,
		tglKejadian: tglKejadian,
		keterangan: keterangan,
		suplesi: suplesi,
		noSepSuplesi: noSepSuplesi,
		kdPropinsi: kdPropinsi,
		kdKabupaten: kdKabupaten,
		kdKecamatan: kdKecamatan,
		tujuanKunj: $('#tujuanKunj').val(), //Baru
		flagProcedure: $('#flagProcedure').val(), //Baru
		kdPenunjang: $('#kdPenunjang').val(), //Baru
		assesmentPel: $('#assesmentPel').val(), //Baru
		noSurat: $('#noSurat').val(),
		kodeDPJP: kodeDPJP,
		dpjpLayan: $('#dpjpLayan').val(), //Baru
		namaDpjpLayan: $('#dpjpLayan :selected').html(), //Baru
		noTelp: $('#noTelp').val(),
		namaTujuan: $('#txtnmpoli').val(),
		kodeDokter: kodeDokter, //Dokter yang menangani
		namaDokter: namaDokter, //Nama Dokter yang menangani
		namaPpkRujukan: $('#txtppkasalrujukan').val(),
		namaDPJP: namaDPJP
	}
	// console.clear();
	// console.log(formData);
	// return false;
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url: url_call_back + "/vclaim/sep/insert",
		type: "POST",
		data: formData,
		dataType: "JSON",
		beforeSend: function () {
			$('#btnSimpan').prop('disabled',true);
			$('#iconSep').removeClass('fa fa-save')
			$('#iconSep').addClass('fa fa-spinner fa-spin')
		},
		success: function (data) {
			// console.clear();
			console.log(data);
			if (data.metaData.code == 200) {
				$('#no_jaminan').val(data.response.sep.noSep);
				$('#tgl_jaminan').val(data.response.sep.tglSep);
				$('#mpop_sep').modal('hide');
				var idx =$('#idx').val();
				if(idx>0) {
					cetaksep(data.response.sep.noSep,data.response.sep.tglSep);
					location.reload();
				}else{
					var jns_layanan=$('#jns_layanan').val();
					if(jns_layanan=='RJ'){
						$('.registrasi').removeClass('active');
						$('.registrasipasien').addClass('active');
					}
				}
				
			} else {
				//alert(data.metaData.message);
				tampilkanPesan('warning', data.metaData.message);
			}
		},
		error: function (xhr) { // if error occured
			console.log(xhr.responseText);
			$('#error').modal('show');
			$('#xhr').html(xhr.responseText)
			$('#btnSimpan').prop('disabled',false);
			$('#iconSep').removeClass('fa fa-spinner fa-spin')
			$('#iconSep').addClass('fa fa-save')
		},
		complete: function () {
			$('#btnSimpan').prop('disabled',false);
			$('#iconSep').removeClass('fa fa-spinner fa-spin')
			$('#iconSep').addClass('fa save')
		},
	});
}

function updateSEPSIM() {
	
	var formData = {
		idx: $('#idx').val(),
		no_jaminan: $('#no_jaminan').val()
	}
	// console.clear();
	// console.log(formData);
	// return false;
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url: url_call_back + "/vclaim/sep/updateseppendaftaran",
		type: "POST",
		data: formData,
		dataType: "JSON",
		beforeSend: function () {
			$('#btnSimpan').prop('disabled',true);
			$('#iconSep').removeClass('fa fa-save')
			$('#iconSep').addClass('fa fa-spinner fa-spin')
		},
		success: function (data) {
			// console.clear();
			location.reload();
		},
		error: function (xhr) { // if error occured
			console.log(xhr.responseText);
			$('#error').modal('show');
			$('#xhr').html(xhr.responseText)
			$('#btnSimpan').prop('disabled',false);
			$('#iconSep').removeClass('fa fa-spinner fa-spin')
			$('#iconSep').addClass('fa fa-save')
		},
		complete: function () {
			$('#btnSimpan').prop('disabled',false);
			$('#iconSep').removeClass('fa fa-spinner fa-spin')
			$('#iconSep').addClass('fa save')
		},
	});
}
function asesmenSep(){
	var jmlsep=$('#jmlsep').val();
	$('#asesmenTujuanKunjungan').val("");
	$('#asesmenJenisProsedure').val("");
	$('#asesmenKdPenunjang').val("");
	$('#asesmenPelayanan').val("");
	if(jmlsep>0){
		var tujuan = $('#tujuan').val();
		var tujuanRujukan = $('#tujuanRujukan').val();
		var tglRujukan=$('#tglRujukan').val();
		var tglSep=$('#tglSep').val();
		if(tglRujukan==tglSep){
			if(tujuan==tujuanRujukan){
				$('#asesmenProsedure').modal('show');
				return false;
			}
		}else{
			if(tujuan==tujuanRujukan && jmlsep>0){
				$('#asemenTujuanKunj').modal('show');
				var option='<option value="">Pilih </option>'+
				'<option value="1">Poli Spesialis tidak tersedia pada hari sebelumnya</option>'+
				'<option value="2">Jam poli telah berakhir pada hari sebelumnya</option>'+
				'<option value="3">Dokter spesialis dimaksud tidak praktek pada hari sebelumnya</option>'+
				'<option value="4">Atas instruksi rumah sakit</option>'+
				'<option value="5">Tujuan Kontrol</option>';
				$('#asesmenPelayanan').html(option);
				return false;
			}else{
				$('#asesmenTujuanLayanan').modal('show');
				var option='<option value="">Pilih </option>'+
				'<option value="1">Poli Spesialis tidak tersedia pada hari sebelumnya</option>'+
				'<option value="2">Jam poli telah berakhir pada hari sebelumnya</option>'+
				'<option value="3">Dokter spesialis dimaksud tidak praktek pada hari sebelumnya</option>'+
				'<option value="4">Atas instruksi rumah sakit</option>';
				$('#asesmenPelayanan').html(option);
			}
		}
	}else{
		createSEP();
	}
	
}
function detail(reg_unit = "") {

	if (reg_unit == '') {
		alert('Nomor Registrasi Unit Rawat Jalan masih kosong');
	} else {
		$.ajax({
			url: base_url + "registrasi/cekRegUnitIGD",
			type: "POST",
			data: {
				regUnitRajal: reg_unit
			},
			dataType: "JSON",
			success: function (data) {
				if (data.code == 200) {
					var url = base_url + 'mr_registrasi.php/registrasi/reg_success_igd?uid=' + data.unikID;
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

function cetakUlang(reg_unit = "") {
	$.ajax({
		url: base_url + "mr_registrasi.php/registrasi/cetakulang",
		type: "POST",
		data: {
			reg_unit: reg_unit
		},
		dataType: "JSON",
		success: function (data) {
			// console.clear();
			console.log(data);
			if (data.code == 200) {
				var url = data.url
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

function cekGroupAntri(poly, dokter) {
	var url = base_url + "registrasi/jadwaldokter/" + poly + "/" + dokter;
	console.log(url);
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: {
			get_param: 'value'
		},
		success: function (data) {
			if (data.status == true) {
				$('#groupantri').val(data.data.group)
			} else {
				$('#groupantri').val("")
			}

		}
	});
}

function caripoliKontrol() {
	var jnsKontrol = $('#jnsKontrol').val();
	var nomor = $('#noSEP').val();
	// var tglRujukan=$('#tglRujukan').val();
	// alert(tglRujukan);
	var tglRencanaKontrol = $('#tglRencanaKontrol').val();
	$.ajax({
		url: base_url + 'vclaim/rencanakontrol/spesialistik/' + jnsKontrol + "/" + nomor + "/" + tglRencanaKontrol,
		type: "GET",
		dataType: "json",
		data: {
			get_param: 'value'
		},
		beforeSend: function () {
			$('#iconCariDokter').removeClass('fa fa-hospital-o')
			$('#iconCariDokter').addClass('fa fa-spinner fa-spin')
		},
		success: function (data) {
			if (data.metaData.code == 200) {
				var provinsi = data.response.list;
				var jmlData = provinsi.length;
				var option = "<option value=''>Pilih</option>";
				for (var i = 0; i < jmlData; i++) {
					option += "<option value='" + provinsi[i]["kodePoli"] + "'>" + provinsi[i]["namaPoli"] + "</option>";
				}
				$('#poliKontrol').html(option);
			} else {
				tampilkanPesan('warning', data.metaData.message)
			}
		},
		error: function (xhr) { // if error occured
			console.log(xhr.responseText);
			$('#error').modal('show');
			$('#xhr').html(xhr.responseText)
			$('#iconCariDokter').removeClass('fa fa-spinner fa-spin')
			$('#iconCariDokter').addClass('fa fa-hospital-o')
		},
		complete: function () {
			$('#iconCariDokter').removeClass('fa fa-spinner fa-spin')
			$('#iconCariDokter').addClass('fa fa-hospital-o')
		},
	});

}

function dokterKontrol() {
	var jnsKontrol = $('#jnsKontrol').val();
	var poli = $('#poliKontrol').val();
	var tglRencanaKontrol = $('#tglRencanaKontrol').val();
	$.ajax({
		url: base_url + 'vclaim/rencanakontrol/dokter/' + jnsKontrol + "/" + poli + "/" + tglRencanaKontrol,
		type: "GET",
		dataType: "json",
		data: {
			get_param: 'value'
		},
		beforeSend: function () {
			$('#iconDokter').removeClass('fa fa-user-md')
			$('#iconDokter').addClass('fa fa-spinner fa-spin')
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
			} else {
				tampilkanPesan('warning', data.metaData.message);
			}
		},
		error: function (xhr) { // if error occured
			console.log(xhr.responseText);
			$('#error').modal('show');
			$('#xhr').html(xhr.responseText)
			// $('#cariRujukan').prop("disabled",false);
			$('#iconDokter').removeClass('fa fa-spinner fa-spin')
			$('#iconDokter').addClass('fa fa-user-md')
		},
		complete: function () {
			// $('#cariRujukan').prop("disabled",false);
			$('#iconDokter').removeClass('fa fa-spinner fa-spin')
			$('#iconDokter').addClass('fa fa-user-md')
		},
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
	// console.clear();
	// console.log(formData);
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url: url_call_back + "/vclaim/rencanakontrol/insert",
		type: "POST",
		data: formData,
		dataType: "JSON",
		beforeSend: function () {
			$('#btnbuatkontrol').prop("disabled", true);
			$('#iconkontrol').removeClass('fa fa-save')
			$('#iconkontrol').addClass('fa fa-spinner fa-spin')
		},
		success: function (data) {
			// console.clear();
			console.log(data);
			if (data.metaData.code == 200) {
				if (jnsKontrol == 2) {
					// Surat Kontrol Rawat Jalan
					var sk = data.response.noSuratKontrol;
				} else {
					var sk = data.response.noSPRI;
				}

				// $('#no_suratkontrol').val(sk);
				setKontrol(sk)
				$('#form-list-kontrol').modal('hide');
				window.open(base_url + "vclaim/rencanakontrol/cetak/" + sk);
			} else {
				//alert(data.metaData.message);
				tampilkanPesan('warning', data.metaData.message);
			}
		},
		error: function (xhr) { // if error occured
			console.log(xhr.responseText);
			$('#error').modal('show');
			$('#xhr').html(xhr.responseText)
			$('#btnbuatkontrol').prop("disabled", false);
			$('#iconkontrol').removeClass('fa fa-spinner fa-spin')
			$('#iconkontrol').addClass('fa fa-save')
		},
		complete: function () {
			$('#btnbuatkontrol').prop("disabled", false);
			$('#iconkontrol').removeClass('fa fa-spinner fa-spin')
			$('#iconkontrol').addClass('fa fa-save')
		}
	});
}

function setKontrol(no) {
	var idx = $('#idx').val();
	if (idx == '') {
		$('#no_suratkontrol').val(no);
		$('#noSurat').val(no);
	}
	else $('#noSurat').val(no);
	var url = url_call_back + "/vclaim/rencanakontrol/nosuratkontrol/" + no;
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: {
			get_param: 'value'
		},
		beforeSend: function () {
			// $('#btnbuatkontrol').prop("disabled",true);
			// $('#iconkontrol').removeClass('fa fa-save')
			// $('#iconkontrol').addClass('fa fa-spinner fa-spin')
		},
		success: function (data) {
			console.log("5. " + data);
			if (data.metaData.code == 200) {
				if(data.response.jnsKontrol==2){
					$("#tglRujukan").val(data.response.sep.provPerujuk.tglRujukan);
					
					
					$("#ppkRujukan").val(data.response.sep.provPerujuk.kdProviderPerujuk);
					// var tujuan=$('#tujuan').val();
					var nomr=$('#nomr').val();
					if(nomr!=null) $('#noMr').val(nomr)
					$('#tujuan').val(data.response.poliTujuan);
					$('#txtnmpoli').val(data.response.namaPoliTujuan);
					$('#txtnmpoli').prop("readonly", false);

					if (data.response.poliTujuan == "MAT") $('#divkatarak').show();
					else $('#divkatarak').hide();
					$('#divPoli').show();
					var faskes = data.response.sep.provPerujuk.asalRujukan;
					if(faskes==null) faskes=$('#faskes').val();
					$('#cbasalrujukan').val(faskes).trigger('change'); //asalRujukan
					$('#asalRujukan').val(faskes);
					$('#txtkdppkasalrujukan').val(data.response.sep.provPerujuk.kdProviderPerujuk);
					$('#txtppkasalrujukan').val(data.response.sep.provPerujuk.nmProviderPerujuk);
					// 1. Cek
					// $('#txtppkasalrujukan').val(data.response.sep.provPerujuk.nmProviderPerujuk);
					// $('#txtppkasalrujukan').val("");
					// $('#noSurat').val('');
					// Belum ditemukan
					$('#txtidkontrol').val('');
					$('#noSuratlama').val('');
					$('#txtpoliasalkontrol').val('');
					$('#txttglsepasalkontrol').val('');
					// $('#txttglsep').val(tgllayanan);
					var diagnosa = data.response.sep.diagnosa;
					var diagAwal = diagnosa.split(" - ");
					$('#txtnmdiagnosa').val(diagAwal[1]);
					$('#diagAwal').val(diagAwal[0]);
					$('#divkelasrawat').hide();
					$('#divRujukan').show();
					$('#divkontrol').show();
					$("#jnsPelayanan").val(data.response.jnsKontrol);
					// alert(data.response.sep.jnsPelayanan);
					if(data.response.sep.jnsPelayanan=='Rawat Inap'){
						// Jika Kunjungan Pertama Pasc Rawat Inap
						$("#noRujukan").val(data.response.sep.noSep);
					}else{
						$("#noRujukan").val(data.response.sep.provPerujuk.noRujukan);
					}
					getdpjp();
					// $('#txtNorujuk').val(data.response.sep.provPerujuk.noRujukan);
					
					// $('#id_pengirim').val(data.response.sep.provPerujuk.kdProviderPerujuk);
					// $('#pjPasienDikirimOleh').val(data.response.sep.provPerujuk.nmProviderPerujuk);
					// $('#tglRujukan').val(data.response.sep.provPerujuk.tglRujukan)
					// $('#noRujukan').val(data.response.sep.provPerujuk.noRujukan);
					// $('#txtkdppkasalrujukan').val(data.response.sep.provPerujuk.kdProviderPerujuk);
					// $('#txtppkasalrujukan').val(data.response.sep.provPerujuk.nmProviderPerujuk);
					// $('#cbasalrujukan').val(data.response.sep.provPerujuk.asalRujukan);
					// $('#tujuan').val(data.response.poliTujuan);
					// $('#txtnmpoli').val(data.response.namaPoliTujuan);
					// $('#divkelasrawat').hide();
					// $('#divPoli').show();
				}else{
					$('#divkelasrawat').show();
					$('#divPoli').hide();
					$('#tujuan').val('');
					$('#txtnmpoli').val('');
				}
				$('#dpjpLayan').val(data.response.kodeDokter);
				$('#kodeDPJP').val(data.response.kodeDokter);
				$('#tglSep').val(data.response.tglRencanaKontrol);
				if(data.response.sep.provPerujuk.noRujukan==null) $('#tglRujukan').val(data.response.tglRencanaKontrol);
				else $('#tglRujukan').val(data.response.sep.provPerujuk.tglRujukan)
			} else {
				tampilkanPesan('warning', data.metaData.message)
			}
		},
		error: function (xhr) { // if error occured
			console.log(xhr.responseText);
			$('#error').modal('show');
			$('#xhr').html(xhr.responseText)
		},
		complete: function () {
			// $('#btnbuatkontrol').prop("disabled",false);
			// $('#iconkontrol').removeClass('fa fa-spinner fa-spin')
			// $('#iconkontrol').addClass('fa fa-save')
		}
	});
	$('#form-list-kontrol').modal('hide');
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
		function (isConfirm) {
			if (isConfirm) {
				// var url_call_back = "<?= base_url() . "mr_registrasi.php/"; ?>";
				// var formdata = {
				//     param1: no_jaminan,
				//     param2: "<?= $this->session->userdata('get_uid') ?>",
				// }
				var url = url_call_back + "/vclaim/sep/hapus/" + no_jaminan;
				$.ajax({
					url: url,
					type: "GET",
					data: {
						get_param: 'value'
					},
					dataType: "JSON",
					success: function (data) {
						console.log(data);
						tampilkanPesan('warning', data.metaData.message);
					},
					error: function (jqXHR, ajaxOption, errorThrown) {
						console.log(jqXHR.responseText);
						// alert(url)
					}
				});
			}
		});
}

function editSep(nosep) {
	$.ajax({
		url: base_url + 'vclaim/sep/edit/' + nosep,
		type: "POST",
		dataType: "json",
		data: {
			get_param: 'value'
		},
		success: function (data) {
			console.log(data)
			getdpjp(data.jns_pelayanan, data.tglSep, data.tujuan, data.dpjpLayan);
			$('#e-noSep').val(data.noSep);
			if (data.jnsPelayanan == 'R.Jalan') {
				$('#e-klsRawatHak').val(3);
				$('#e-klsRawatNaik').val("");
				$('#e-pembiayaan').val("");
				$('#e-penanggungJawab').val("");
			} else {
				// $('#e-klsRawatNaik').val(data.klsRawatHak);
				$('#e-klsRawatHak').val(data.klsRawatHak);
				$('#e-klsRawatKet').val("Kelas " + data.klsRawatHak);
				if (data.klsRawatNaik == 0) var naik = "";
				else var naik = data.klsRawatNaik;
				if (data.pembiayaan == 0) var pembiayaan = "";
				else pembiayaan = data.pembiayaan;
				// alert(data.klsRawatNaik);
				if (parseInt(data.klsRawatNaik) > 0) {
					// alert('Naik Kelas')
					$("#e-naikKelas").prop('checked', true);
				} else {
					$("#e-naikKelas").prop('checked', false);
				}
				e_naik()
				$('#e-klsRawatNaik').val(naik);
				$('#e-pembiayaan').val(pembiayaan);
				$('#e-penanggungJawab').val(data.penanggungJawab);
			}

			$('#e-noMR').val(data.noMr);

			// $('#e-tujuan').val(data.tujuan);
			// alert(data.tujuan);
			$('#e-catatan').val(data.catatan);

			// $('#tgl_lahir').val(tgl[2] +"-" +tgl[1]+"-"+tgl[0]);
			// $('#e-diagAwal').val(data.diagAwal);
			if (data.eksekutif == 1) $("#e-eksekutif").prop('checked', true);
			else $("#e-eksekutif").prop('checked', false);
			// alert(data.cob)
			if (data.cob == 1) $("#e-cob").prop('checked', true);
			else $("#e-cob").prop('checked', false);
			if (data.tujuan == 'MAT') {
				$('#e-divkatarak').show();
				if (data.eksekutif == 1) $("e-katarak").prop('checked', true);
				else $("e-katarak").prop('checked', false);
			} else {
				$('#e-divkatarak').hide();
			}

			$('#e-tujuan').val(data.tujuan);
			$('#e-txtnmpoli').val(data.poli);
			$('#e-lakaLantas').val(data.lakaLantas);
			$('#e-txtTglKejadian').val(data.tglKejadian);
			$('#e-txtketkejadian').val(data.keterangan);
			if (data.suplesi == 1) $('#e-suplesi').prop('checked', true);
			else $('#e-suplesi').prop('checked', false);
			// $('#e-suplesi').val(data.suplesi);
			// e_lakalantas();
			if (data.lakaLantas > 0) {
				$('#e-divJaminan').show();
				getProvinsi('e-cbprovinsi', data.kdPropinsi);
				getKabupaten('e-cbkabupaten', data.kdPropinsi, data.kdKabupaten)
				getKecamatan('e-cbkecamatan', data.kdKabupaten, data.kdKecamatan)
			} else {
				$('#e-divJaminan').hide();
			}

			$('#e-noSepSuplesi').val(data.noSepSuplesi);
			// $('#e-kdPropinsi').val(data.kdPropinsi);
			// $('#e-kdKabupaten').val(data.kdKabupaten);
			// $('#e-kdKecamatan').val(data.kdKecamatan);
			$('#tglSep').val(data.tglSep);
			var diagnosa = data.diagnosa;
			var diagAwal = diagnosa.split(" - ");
			$('#e-diagAwal').val(diagAwal[0]);
			$('#e-txtnmdiagnosa').val(data.diagnosa);
			$('#e-dpjpLayan').val(data.dpjpLayan);
			$('#e-noTelp').val(data.noTelp);

			$('#editsep').modal('show');
		}
	});
}

function updateSEP() {
	var eksekutif = $('#e-eksekutif:checked').val();
	var cob = $('#e-cob:checked').val();
	var katarak = $('#e-katarak:checked').val();
	var lakaLantas = $('#e-lakaLantas').val();
	if (cob != 1) cob = 0;
	if (katarak != 1) katarak = 0;
	if (lakaLantas != 1) lakaLantas = 0;
	if (eksekutif != 1) eksekutif = 0;

	if (lakaLantas > 0) {
		lakaLantas = 1;
		var penjamin = $('#e-penjamin').val();
		var tglKejadian = $('#e-txtTglKejadian').val();
		var keterangan = $('#e-txtketkejadian').val();
		var suplesi = $('#e-suplesi:checked').val();
		if (suplesi != 1) suplesi = 0;
		if (suplesi == 1) {
			var noSepSuplesi = $('#e-noSepSuplesi').val();
		} else {
			var noSepSuplesi = "";
		}
		var kdPropinsi = $('#e-cbprovinsi').val();
		var kdKabupaten = $('#e-cbkabupaten').val();
		var kdKecamatan = $('#e-cbkecamatan').val();
	} else {
		var penjamin = "";
		var tglKejadian = "";
		var keterangan = "";
		var suplesi = 0;
		var noSepSuplesi = "";
		var kdPropinsi = "";
		var kdKabupaten = "";
		var kdKecamatan = "";
	}

	// var klsRawat=$('#klsRawat').val();
	// alert(klsRawat);
	var formData = {
		idx: $('#e-idx').val(),
		noSep: $('#e-noSep').val(),
		klsRawatHak: $('#e-klsRawatHak').val(), //Baru
		klsRawatNaik: $('#e-klsRawatNaik').val(), //Baru
		pembiayaan: $('#e-pembiayaan').val(), //Baru
		penanggungJawab: $('#e-penanggungJawab').val(), //Baru
		noMR: $('#e-noMR').val(),
		catatan: $('#e-catatan').val(),
		diagAwal: $('#e-diagAwal').val(),
		diagnosa: $('#e-diagnosa').val(),
		tujuan: $('#e-tujuan').val(),
		poli: $('#e-txtnmpoli').val(),
		eksekutif: eksekutif,
		cob: cob,
		katarak: katarak,
		lakaLantas: lakaLantas,
		penjamin: penjamin,
		tglKejadian: tglKejadian,
		keterangan: keterangan,
		suplesi: suplesi,
		noSepSuplesi: noSepSuplesi,
		kdPropinsi: kdPropinsi,
		kdKabupaten: kdKabupaten,
		kdKecamatan: kdKecamatan,
		dpjpLayan: $('#e-dpjpLayan').val(), //Baru
		namaDpjpLayan: $('#e-dpjpLayan :selected').html(), //Baru
		noTelp: $('#e-noTelp').val(),
		namaTujuan: $('#e-txtnmpoli').val(),
	}
	// console.clear();
	// console.log(formData);
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url: url_call_back + "/vclaim/sep/update",
		type: "POST",
		data: formData,
		dataType: "JSON",
		success: function (data) {
			// console.clear();
			console.log(data);
			if (data.metaData.code == 200) {
				tampilkanPesan('warning', data.metaData.message);
				$('#editsep').modal('hide');
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

function naik() {
	// $('#naikKelas').prop("checked", true);
	if ($('#naikKelas').is(':checked')) {
		// alert("naik Kelas")
		var kelasRawat = $('#klsRawat').val();
		kelasRawatNaik = parseInt(kelasRawat) + 1;
		// if(kelasRawat==3) var rekomendasi=4;
		// else if(kelasRawat==2) var rekomendasi=3;
		// else var rekomendasi == 2
		var kelasnaik = '<div class="form-group">' +
			'<label class="col-md-3 col-sm-3 col-xs-12 control-label">Kelas Layanan</label>' +
			'<div class="col-md-9 col-sm-9 col-xs-12">' +
			'<select class="form-control" id="klsRawatNaik" name="klsRawatNaik" >';
		if (kelasRawatNaik == 1) kelasnaik += "<option value='1' selected >VVIP</option>";
		else kelasnaik += "<option value='1'>VVIP</option>";
		if (kelasRawatNaik == 2) kelasnaik += "<option value='2' selected >VIP</option>";
		else kelasnaik += "<option value='2'>VIP</option>";
		if (kelasRawatNaik == 3) kelasnaik += "<option value='3' selected >Kelas 1</option>";
		else kelasnaik += "<option value='3'>Kelas 1</option>";
		if (kelasRawatNaik == 4) kelasnaik += "<option value='4' selected >Kelas 2</option>";
		else kelasnaik += "<option value='4'>Kelas 2</option>";
		if (kelasRawatNaik == 5) kelasnaik += "<option value='5' selected >Kelas 3</option>";
		else kelasnaik += "<option value='5'>Kelas 3</option>";
		if (kelasRawatNaik == 6) kelasnaik += "<option value='6' selected >ICCU</option>";
		else kelasnaik += "<option value='6'>ICCU</option>";
		if (kelasRawatNaik == 7) kelasnaik += "<option value='7' selected >ICU</option>";
		else kelasnaik += "<option value='7'>ICU</option>";
		kelasnaik += "</select>";
		kelasnaik += "</div></div>";

		kelasnaik += '<div class="form-group">' +
			'<label class="col-md-3 col-sm-3 col-xs-12 control-label">Pembiayaan</label>' +
			'<div class="col-md-9 col-sm-9 col-xs-12">' +
			'<select class="form-control" id="pembiayaan" name="pembiayaan" onchange="getPj()">';
		kelasnaik += "<option value='1'>Pribadi</option>";
		kelasnaik += "<option value='2'>Pemberi Kerja</option>";
		kelasnaik += "<option value='3'>Asuransi Kesehatan Tambahan</option>";
		kelasnaik += "</select>" +
			'<input type="hidden" name="penanggungJawab" id="penanggungJawab" value="Pribadi">';
		kelasnaik += "</div></div>";
		$('#divnaikkelas').show();
	} else {
		var kelasnaik = '<input type="hidden" name="klsRawatNaik" id="klsRawatNaik" value="">' +
			'<input type="hidden" name="pembiayaan" id="pembiayaan" value="">' +
			'<input type="hidden" name="penanggungJawab" id="penanggungJawab" value="">';
		// alert("Tidak Naik Kelas")
		$('#divnaikkelas').hide();
	}
	$('#divnaikkelas').html(kelasnaik);


}

function e_naik() {
	// $('#naikKelas').prop("checked", true);
	if ($('#e-naikKelas').is(':checked')) {
		// alert("naik Kelas")
		var kelasRawat = $('#e-klsRawatHak').val();
		kelasRawatNaik = parseInt(kelasRawat) + 1;
		// if(kelasRawat==3) var rekomendasi=4;
		// else if(kelasRawat==2) var rekomendasi=3;
		// else var rekomendasi == 2
		var kelasnaik = '<div class="form-group">' +
			'<label class="col-md-3 col-sm-3 col-xs-12 control-label">Kelas Layanan</label>' +
			'<div class="col-md-9 col-sm-9 col-xs-12">' +
			'<select class="form-control" id="e-klsRawatNaik" name="klsRawatNaik" >';
		if (kelasRawatNaik == 1) kelasnaik += "<option value='1' selected >VVIP</option>";
		else kelasnaik += "<option value='1'>VVIP</option>";
		if (kelasRawatNaik == 2) kelasnaik += "<option value='2' selected >VIP</option>";
		else kelasnaik += "<option value='2'>VIP</option>";
		if (kelasRawatNaik == 3) kelasnaik += "<option value='3' selected >Kelas 1</option>";
		else kelasnaik += "<option value='3'>Kelas 1</option>";
		if (kelasRawatNaik == 4) kelasnaik += "<option value='4' selected >Kelas 2</option>";
		else kelasnaik += "<option value='4'>Kelas 2</option>";
		if (kelasRawatNaik == 5) kelasnaik += "<option value='5' selected >Kelas 3</option>";
		else kelasnaik += "<option value='5'>Kelas 3</option>";
		if (kelasRawatNaik == 6) kelasnaik += "<option value='6' selected >ICCU</option>";
		else kelasnaik += "<option value='6'>ICCU</option>";
		if (kelasRawatNaik == 7) kelasnaik += "<option value='7' selected >ICU</option>";
		else kelasnaik += "<option value='7'>ICU</option>";
		kelasnaik += "</select>";
		kelasnaik += "</div></div>";

		kelasnaik += '<div class="form-group">' +
			'<label class="col-md-3 col-sm-3 col-xs-12 control-label">Pembiayaan</label>' +
			'<div class="col-md-9 col-sm-9 col-xs-12">' +
			'<select class="form-control" id="e-pembiayaan" name="pembiayaan" onchange="getPj()">';
		kelasnaik += "<option value='1'>Pribadi</option>";
		kelasnaik += "<option value='2'>Pemberi Kerja</option>";
		kelasnaik += "<option value='3'>Asuransi Kesehatan Tambahan</option>";
		kelasnaik += "</select>" +
			'<input type="hidden" name="penanggungJawab" id="e-penanggungJawab" value="Pribadi">';
		kelasnaik += "</div></div>";
		$('#e-divnaikkelas').show();
	} else {
		var kelasnaik = '<input type="hidden" name="klsRawatNaik" id="e-klsRawatNaik" value="">' +
			'<input type="hidden" name="pembiayaan" id="e-pembiayaan" value="">' +
			'<input type="hidden" name="penanggungJawab" id="e-penanggungJawab" value="">';
		// alert("Tidak Naik Kelas")
		$('#e-divnaikkelas').hide();
	}
	$('#e-divnaikkelas').html(kelasnaik);


}

function getPj() {
	var penanggungJawab = $('#e-pembiayaan :selected').html();

	$('#e-penanggungJawab').val(penanggungJawab);
}

function pilihTipeRujukan() {
	var tipeRujukan = $('#r-tipeRujukan').val();
	$('#r-ppkDirujuk').val("");
	$('#ppkDirujuk').html("");
	if (tipeRujukan == 2) {
		$('#r-poliRujukan').val("");
		$('.inputPoli').hide();
		$('#rj').prop('checked', true);
		$('#r-ppkDirujuk').prop('readonly', true);
		var noSep = $('#r-noSep').val();
		var url = url_call_back + "/vclaim/rencanakontrol/sep/" + noSep;
		$.ajax({
			url: url,
			type: "GET",
			data: {
				get_param: 'value'
			},
			dataType: "JSON",
			success: function (data) {
				if (data.metaData.code == 200) {
					$('#r-faskes').val(1);
					$('#ppkDirujuk').val(data.response.provUmum.kdProvider);
					$('#r-ppkDirujuk').val(data.response.provUmum.nmProvider);
				}
			},
			error: function (jqXHR, ajaxOption, errorThrown) {
				console.log(jqXHR.responseText);
				// alert(url)
			}
		});

	} else {
		$('.inputPoli').show();
		$('#rj').prop('checked', false);
		$('#r-ppkDirujuk').prop('readonly', false);
	}
}

function spesialistiRujukan() {
	var param1 = $('#ppkDirujuk').val();
	var param2 = $('#r-tglRencanaKunjungan').val()
	var url = url_call_back + "/vclaim/rujukan/spesialistik/" + param1 + "/" + param2;
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: {},
		success: function (data) {
			//menghitung jumlah data
			//// console.clear();
			//alert(param1 +" " +param2 + " " + param3);
			console.log(url);
			if (data.metaData.code == 200) {
				var dokter = data.response.list;
				var jmlData = dokter.length;
				var option = "<option value=''>Pilih Spesialistik</option>";
				//Create Tabel
				for (var i = 0; i < jmlData; i++) {
					option += "<option value='" + dokter[i]["kodeSpesialis"] + "' >" + dokter[i]["namaSpesialis"] + "</option>";
				}
				$('#r-poliRujukan').html(option);
				// var faskes=$('#r-faskes').val();
			} else {
				// var poli=$('#txtnmpoli').val();
				// alert("Error saat pencarian data dokter "+ poli + ' karena ' +data.metaData.message)
			}
		}
	});
}

function createRujukan() {
	var jnsPelayanan = $("input[name='jnsPelayanan']:checked").val();

	var formData = {
		id_daftar: $('#id_daftar').val(),
		reg_unit: $('#reg_unit').val(),
		noSep: $('#r-noSep').val(),
		tglRujukan: $('#r-tglRujukan').val(),
		tglRencanaKunjungan: $('#r-tglRencanaKunjungan').val(),
		ppkDirujuk: $('#ppkDirujuk').val(),
		jnsPelayanan: jnsPelayanan,
		catatan: $('#r-catatan').val(),
		diagRujukan: $('#diagRujukan').val(),
		tipeRujukan: $('#r-tipeRujukan').val(),
		poliRujukan: $('#r-poliRujukan').val(),
	}
	// console.clear();
	// console.log(formData);
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url: url_call_back + "/vclaim/rujukan/insert",
		type: "POST",
		data: formData,
		dataType: "JSON",
		success: function (data) {
			// console.clear();
			console.log(data);
			if (data.metaData.code == 200) {
				location.reload();
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

function pilihAsesmen() {
	var pilih = $('#c-assesmentPel').val();
	$('#assesmentPel').val(pilih);
	$('#asspel').modal('hide');
}

function cekJarkodat() {
	if ($('#jarkomdat').is(':checked')) {
		$("#cariRujukan").prop('disabled', false);
		$('#txtNorujuk').focus();
	} else {
		$("#cariRujukan").prop('disabled', true);
		$('#txtNorujuk').focus();
	}
}

function riwayatKunjunganPeserta(tglMulai = '', tglSelesai = '') {
	var noKartu = $('#noKartu').val();
	// var tglMulai=$('#tglMulai').val()
	// var tglSelesai=$('#tglSelesai').val()
	if(noKartu.length>=13){
		if (tglMulai == '' || tglSelesai == '') var url = url_call_back + "/vclaim/monitoring/historipelayanan/" + noKartu;
		else var url = url_call_back + "/vclaim/monitoring/historipelayanan/" + noKartu + "/" + tglMulai + "/" + tglSelesai;
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
						if (histori[i].jnsPelayanan == 1) jnslayanan = 'Rawat Inap';
						else jnslayanan = 'Rawat Jalan';
						table += '<li class="list-group-item">'+
							'<div class="row">'+
							'<div class="col-md-4">No Sep </div>'+
							'<div class="col-md-8">: <a href="' + base_url + 'vclaim/sep/detail/' + histori[i].noSep + '" class="btn btn-default btn-xs" target="_blank">' +
							histori[i].noSep + "</a>"+
							"</div></div><div class='row'>"+
							"<div class='col-md-4'>Tgl Sep </div><div class='col-md-8'> : " +
							histori[i].tglSep + "</div></div><div class='row'><div class='col-md-4'>No Rujukan </div><div class='col-md-8'> : " +
							histori[i].noRujukan + "</div></div><div class='row'><div class='col-md-4'>Jns Layanan </div><div class='col-md-8'> : " +
							jnslayanan + "</div></div><div class='row'><div class='col-md-4'>Poli </div><div class='col-md-8'> : " +
							histori[i].poli + "</div></div><div class='row'><div class='col-md-4'>PPK Pelayan </div><div class='col-md-8'> : " +
							histori[i].ppkPelayanan + "</div></div><div class='row'><div class='col-md-4'>Diagnosa </div><div class='col-md-8'> : " +
							histori[i].diagnosa + "</div></div>" +
							'</li>';

					}
					// alert(table)
					$('#riwayatkunjungan').html(table);
					// var faskes=$('#r-faskes').val();
				} else {
					$('#riwayatkunjungan').html('<div class="alert alert-danger">' + data.metaData.message + '</div>')
				}
			}
		});
	}else{
		tampilkanPesan('warning','NoKartu Tidak Valid');
	}
	
}

function riwayatLain() {
	var a = $('#no_bpjs').val();
	var dari = $('#r_dari').val();
	var sampai = $('#r_sampai').val();
	$.ajax({
		url: url_call_back + "/vclaim/monitoring/historipelayanan/" + a + "/" + dari + "/" + sampai,
		type: "GET",
		data: {
			get_param: 'value'
		},
		dataType: "JSON",
		beforeSend: function () {
			$('tbody#datariwayatkunjungan').html("<tr><td colspan=7><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
		},
		success: function (data) {
			$('#mpop_sep').modal('hide');
			$('#mpop_riwayat').modal('show');
			if (data.metaData.code == 200) {
				var x = data.response.histori;
				// alert(x.length);
				var res = "";
				// var encodedString = "";
				// var dataForm = "";
				/** */

				for (var i = 0; i <= x.length - 1; i++) {
					res += "<tr>";
					res += "<td>" + (i + 1) + "</td>";
					res += "<td>" + x[i]['tglSep'] + "</td>";
					if (x[i]['jnsPelayanan'] == 2) res += "<td>R. Jalan</td>";
					else res += "<td>R. Inap</td>";
					res += "<td>" + x[i]['noRujukan'] + "</td>"; // <a href="'+base_url+'vclaim/sep/detail/'+histori[i].noSep+'" class="btn btn-default btn-xs" target="_blank">
					res += "<td>" + '<a href="' + base_url + 'vclaim/sep/detail/' + x[i]['noSep'] + '" class="btn btn-default btn-xs" target="_blank">' + x[i]['noSep'] + "</a></td>";
					res += "<td>" + x[i]['poli'] + "</td>";
					res += "<td>" + x[i]['ppkPelayanan'] + "</td>";
					res += "<td>" + x[i]['diagnosa'] + "</td>";
					res += "</tr>";
				}
				$('tbody#datariwayatkunjungan').html(res);
			} else {
				tampilkanPesan('warning', data.metaData.message);
				$('tbody#datariwayatkunjungan').html('<tr class="odd"><td colspan="6" valign="top">No data available in table</td></tr>');
			}
		},
		error: function (jqXHR, ajaxOption, errorThrown) {
			console.log(jqXHR.responseText);
		}
	});
}

function closeRiwayat() {
	$('#mpop_sep').modal('show');
	$('#mpop_riwayat').modal('hide');
}

function cekKontrol() {
	var noSurat = $('#noSurat').val();
	var rujukan = $('#reg_unit').val();
	var url = base_url + "vclaim/rencanakontrol/nosuratkontrol/" + noSurat;
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: {
			get_param: 'value'
		},
		beforeSend: function () {
			// setting a timeout
			$('#cariKontrol').prop("disabled", true);
			$('#iconCariKontrol').removeClass('fa fa-check')
			$('#iconCariKontrol').addClass('fa fa-spinner spin')
		},
		success: function (data) {
			console.log("6. " + data);
			if (data.metaData.code == 200) {
				var tgllayanan = $('#sekarang').val();
				$('#divkelasrawat').show();
				// $('.norujukan').hide();
				$("#asalRujukan").val("2");
				$("#tglRujukan").val("");
				$("#noRujukan").val(rujukan);
				$('#noRujukan').prop('readonly', false);
				$("#ppkRujukan").val('0304R001');
				// var tujuan=$('#tujuan').val();

				$('#tujuan').val("");
				$('#txtnmpoli').val("");
				$('#txtnmpoli').prop("readonly", true);

				if (data.response.poliTujuan == "MAT") $('#divkatarak').show();
				else $('#divkatarak').hide();

				$('#divPoli').hide();
				$('#cbasalrujukan').val("2").trigger('change'); //asalRujukan
				$('#txtkdppkasalrujukan').val('0304R001');
				$('#txtppkasalrujukan').val("RS ACHMAD MOCHTAR BUKITTINGGI");
				// $('#noSurat').val('');
				// Belum ditemukan
				$('#txtidkontrol').val('');
				$('#noSuratlama').val('');
				$('#txtpoliasalkontrol').val('');
				$('#txttglsepasalkontrol').val('');
				$('#txtnmdpjp').val('');
				$('#kodeDPJP').val('');
				$('#txttglsep').val(tgllayanan);
				$('#txtnmdiagnosa').val("");
				$('#diagAwal').val("");

				$('#divkelasrawat').show();
				$('#divRujukan').show();
				$('#divkontrol').show();
				$("#jnsPelayanan").val("1");
				getdpjp(data.response.jnsKontrol, data.response.tglRencanaKontrol, data.response.poliTujuan, data.response.kodeDokter);
			} else {
				tampilkanPesan('warning', data.metaData.message)
			}
		},
		error: function (xhr) { // if error occured
			$('#error').modal('show');
			$('#xhr').html(xhr.responseText)
			$('#cariKontrol').prop("disabled", false);
			$('#iconCariKontrol').removeClass('fa fa-spinner spin')
			$('#iconCariKontrol').addClass('fa fa-check')
		},
		complete: function () {
			$('#cariKontrol').prop("disabled", false);
			$('#iconCariKontrol').removeClass('fa fa-spinner spin')
			$('#iconCariKontrol').addClass('fa fa-check')
		},
	});
}

function pilihAsesmenTujuan(){
	var asesmenTujuanKunjungan=$('#asesmenTujuanKunjungan').val();
	$('#tujuanKunj').val(asesmenTujuanKunjungan);
	$('#asemenTujuanKunj').modal('hide');
	if(asesmenTujuanKunjungan==1){
		// Munculkan Popup asesmen Prosedure
		$('#asesmenProsedure').modal('show')
	}else{
		// Munculkan Pop up AsesmenPelayanan
		$('#asesmenTujuanLayanan').modal('show')
	}
}
function pilihAsesmenPelayanan(){
	var asesmenPelayanan=$('#asesmenPelayanan').val();
	$('#assesmentPel').val(asesmenPelayanan);
	$('#asesmenTujuanLayanan').modal('hide');
	createSEP();
}
function pilihAsesmenProsedure(){
	var asesmenJenisProsedure=$('#asesmenJenisProsedure').val();
	$('#flagProcedure').val(asesmenJenisProsedure)
	if(asesmenJenisProsedure==0){
		$('#asesmenProsedure').modal('hide')
		$('#asesmenFalgProsedure').modal('show')
		
		// Prosedure tidak berkelanjutan
		
		var option="<option value=''>Pilih Poli</option>"
		+"<option value='7'>Laboratorium</option>"
		+"<option value='8'>USG</option>"
		+"<option value='9'>Farmasi</option>"
		+"<option value='10'>Lain-Lain</option>"
		+"<option value='11'>MRI</option>"
		$('#asesmenKdPenunjang').html(option);
		
	}else if(asesmenJenisProsedure==1){
		$('#asesmenProsedure').modal('hide')
		$('#asesmenFalgProsedure').modal('show')
		var option="<option value=''>Pilih Poli</option>"
		+"<option value='1'>Radioterapi</option>"
		+"<option value='2'>Kemoterapi</option>"
		+"<option value='3'>Rehabilitasi Medik</option>"
		+"<option value='4'>Rehabilitasi Psikososial</option>"
		+"<option value='5'>Transfusi Darah</option>"
		+"<option value='6'>Pelayanan Gigi</option>"
		$('#asesmenKdPenunjang').html(option);
	}else{
		return false;
	}
}
function pilihKdPenunjang(){
	var asesmenKdPenunjang=$('#asesmenKdPenunjang').val();
	$('#kdPenunjang').val(asesmenKdPenunjang);
	$('#asesmenFalgProsedure').modal('hide');
	createSEP();
}

function updateDpo(nomr){
	$.ajax({
		url: base_url+"registrasi/datadpo/"+nomr,
		type: "GET",
		dataType: "json",
		data: {
			get_param: 'value'
		},
		beforeSend: function () {
			// setting a timeout
			// $('#cariKontrol').prop("disabled", true);
			// $('#iconCariKontrol').removeClass('fa fa-check')
			// $('#iconCariKontrol').addClass('fa fa-spinner spin')
		},
		success: function (data) {
			if(data.status==true){
				$('#popupdpo').modal('show');
				$('#dponomr').val(data.data.nomr)
				$('#dponama').val(data.data.nama)
				$('#dpoketerangan').val(data.data.keterangan)
			}
		},
		error: function (xhr) { // if error occured
			$('#error').modal('show');
			$('#xhr').html(xhr.responseText)
			
		},
		complete: function () {
			// $('#cariKontrol').prop("disabled", false);
			// $('#iconCariKontrol').removeClass('fa fa-spinner spin')
			// $('#iconCariKontrol').addClass('fa fa-check')
		},
	});
}
function updateStatusDpo(){
	var statusdpo=$('#dpostatus').prop('checked');
	// alert(statusdpo)
    if(statusdpo==true) statusdpo=1; else statusdpo=0;
    var formData={
        'nomr':$('#dponomr').val(),
        'keterangan':$('#dpoketerangan').val(),
        'status_dpo':statusdpo
    }

	$.ajax({
        url: url_call_back + "/registrasi/updatestatusdpo",
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function (data) {
            // console.clear();
            console.log(data);
            if (data.status == true) {
                tampilkanPesan('success', data.message);
                location.reload();
            } else {
                //alert(data.metaData.message);
                tampilkanPesan('warning', data.message);
            }
        },
        error: function (jqXHR, ajaxOption, errorThrown) {
            console.log(jqXHR.responseText);
        }
    });
}