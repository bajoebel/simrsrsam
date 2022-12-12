<style>
    div#pagination b{
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #337ab7;
        border-color: #337ab7;
    }
    div#pagination a{
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
        border-top-color: rgb(221, 221, 221);
        border-right-color: rgb(221, 221, 221);
        border-bottom-color: rgb(221, 221, 221);
        border-left-color: rgb(221, 221, 221);
    }
    .rataTengah{text-align: center;}
    .rataKanan{text-align: right;}
    .f15{font-size: 15px;}
    .f20{font-size: 20px;}
    .f20{font-size: 20px;}
    .w10{width: 10px;}
    .w50{width: 50px;}
    .w60{width: 60px;}
    .w70{width: 70px;}
    .w80{width: 80px;}
    .w90{width: 90px;}
    .w100{width: 100px;}
    .w110{width: 110px;}
    .w120{width: 120px;}
    .w130{width: 130px;}
    .w140{width: 140px;}
    .w150{width: 150px;}
    .w160{width: 160px;}
    .w170{width: 170px;}
    .w180{width: 180px;}
    .w190{width: 190px;}
    .w200{width: 200px;}
    .w210{width: 210px;}
    .w220{width: 220px;}
    .w230{width: 230px;}
    .w240{width: 240px;}
    .w250{width: 250px;}
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="box-title"><button type="button" class='btn btn-primary btn-sm' style="line-height: 17px;margin-top: 0px;" onclick="tambah()">TAMBAH</button></div>
					<div class="box-tools" style="margin-top: 5px"> 
						<div class="input-group input-group-sm">
							<input type="text" name="q" id="q" style="width: 250px;color:#000000" placeholder="Masukkan Keyword" onkeyup="getRetensi(0)" />
							<div class="input-group-btn">
								<button type="button" id="cetakUlang" class="btn btn-sm btn-primary" style="line-height: 17px;margin-top: 0px;" onclick="getRetensi(0)">Cari</button>
								<button class="btn btn-success btn-sm" type="button" onclick="exportExcel()">Download</button>
							</div>
						</div>
					</div>
				</div>

				<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<span id="messege"></span>
						<form class="form-horizontal" id="pendaftaran" name="pendaftaran" action="<?php echo base_url('pendaftaran/simpan_pendaftaran') ?>" method="POST" onsubmit="return false">
							<div class="row">
								<div class="col-xs-5" id="form" style="display:none">
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">No MR:</label>
										<div class="col-xs-12 col-sm-6">
											<div class="input-group input-group-sm">
												<input type="text" name="nomr" id="nomr" onkeypress="return hanyaAngka(event)" class="limited form-control input-sm" maxlength="6" placeholder="Pencarian NOMR" style='color:#000000;' />
												<div class="input-group-btn">
												<button id="cari" name="cari" type="button" class="btn btn-primary btn-sm" data-toggle="button" data-loading-text="Loading...">
													<i class="ace-icon fa fa-search "></i>
												</button>
												</div>
											</div>
										
											<span id="span-loading">
												<img src="<?php echo base_url('loader.gif') ?>" style="position: absolute;border: 0px solid #000;margin-top: -115px;margin-left: 210px; " />
												Mohon Tunggu... Server sedang memeriksa Kode Booking
											</span>
										</div>
									</div>

									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Nama Pasien:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" name="nama" id="nama" class="col-xs-12 col-sm-11 text-success" style='color:#000000;' />
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tanggal Terakhir Berobat:</label>
										<div class="col-xs-12 col-sm-5">
											<div class="clearfix">
												<div class="input-group">
													<input type="text" name="terakhir_berobat" id="terakhir_berobat" class="form-control datepicker input-sm" data-date-format="yyyy-mm-dd" value="" />
													<span class="input-group-addon">
														<i class="ace-icon fa fa-calendar"></i>
													</span>
												</div>
											</div>
										</div>
									</div>


									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tujuan Poly Terakhir:</label>

										<div class="col-xs-12 col-sm-6">
											<div class="clearfix">
												<select class="form-control input-sm" id="tujuan" name="tujuan" data-placeholder="Klik untuk memilih Tujuan..." style='color:#000000;' onkeypress="set_focus(event,'terakhir_dirawat')">
													<option value="">-- Pilih Tujuan Layanan --</option>
													<?php
													foreach ($poly as $pol) {
														echo '<option value="' . $pol->grId . '">' . $pol->ruang . '</option>';
													}
													?>
												</select>
											</div>
										</div>
									</div>

									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tanggal Terakhir Dirawat:</label>
										<div class="col-xs-12 col-sm-5">
											<div class="clearfix">
												<div class="input-group">
													<input type="text" name="terakhir_dirawat" id="terakhir_dirawat" class="form-control datepicker input-sm" data-date-format="yyyy-mm-dd" value="" />
													<span class="input-group-addon">
														<i class="ace-icon fa fa-calendar"></i>
													</span>
												</div>
											</div>
										</div>
									</div>

									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Diagnosa Terakhir:</label>
										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" name="diagnosa_terakhir" id="diagnosa_terakhir" class="form-control input-sm" value="" />
											</div>
										</div>
									</div>
									<div class="space-2"></div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">&nbsp;</label>
										<div class="col-xs-12 col-sm-9">
											<button class="btn btn-primary btn-sm" type='button' name="simpan" id="simpan" class="simpan">
												<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												SIMPAN

											</button>
											<button type='button' class="btn btn-danger btn-sm" name="batal" id="batal" class="batal" onclick="kembali()">
												<i class="fa fa-remove"></i>
												BATAL

											</button>
										</div>
									</div>
								</div>

								<div class="col-xs-12" id="tabel">
										<table class="table table-bordered table-hover" style='color:#000000;'>
											<thead>
												<tr>
													<th class="center">NO</th>
													<th class="center">NOMR</th>
													<th class="center">NAMA PASIEN</th>
													<th class="center">TGL BEROBAT TERAKHIR</th>
													<th class="center">POLY TUJUAN TERAKHIR</th>
													<th class="center">RAWAT TERAKHIR</th>
													<th class="center">DIAGNOSA TERAKHIR</th>
													<th>AKSI</th>
												</tr>
											</thead>
											<tbody id="getdata"></tbody>
											<tfoot>
												<tr>
													<td colspan='7' id="pagination"></td>
												</tr>
											</tfoot>
										</table>
								</div>
							</div>
							<!--input type="submit" name="simpan" value="SIMPAN"-->
						</form>
						</div>
					</div>
				</div>
			</div>

			
		</div>
	</div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript">
	var base_url = "<?= base_url() ?>";
	var Base64 = {
		_keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
		encode: function(e) {
			var t = "";
			var n, r, i, s, o, u, a;
			var f = 0;
			e = Base64._utf8_encode(e);
			while (f < e.length) {
				n = e.charCodeAt(f++);
				r = e.charCodeAt(f++);
				i = e.charCodeAt(f++);
				s = n >> 2;
				o = (n & 3) << 4 | r >> 4;
				u = (r & 15) << 2 | i >> 6;
				a = i & 63;
				if (isNaN(r)) {
					u = a = 64
				} else if (isNaN(i)) {
					a = 64
				}
				t = t + this._keyStr.charAt(s) + this._keyStr.charAt(o) + this._keyStr.charAt(u) + this._keyStr.charAt(a)
			}
			return t
		},
		decode: function(e) {
			var t = "";
			var n, r, i;
			var s, o, u, a;
			var f = 0;
			e = e.replace(/[^A-Za-z0-9\+\/\=]/g, "");
			while (f < e.length) {
				s = this._keyStr.indexOf(e.charAt(f++));
				o = this._keyStr.indexOf(e.charAt(f++));
				u = this._keyStr.indexOf(e.charAt(f++));
				a = this._keyStr.indexOf(e.charAt(f++));
				n = s << 2 | o >> 4;
				r = (o & 15) << 4 | u >> 2;
				i = (u & 3) << 6 | a;
				t = t + String.fromCharCode(n);
				if (u != 64) {
					t = t + String.fromCharCode(r)
				}
				if (a != 64) {
					t = t + String.fromCharCode(i)
				}
			}
			t = Base64._utf8_decode(t);
			return t
		},
		_utf8_encode: function(e) {
			e = e.replace(/\r\n/g, "\n");
			var t = "";
			for (var n = 0; n < e.length; n++) {
				var r = e.charCodeAt(n);
				if (r < 128) {
					t += String.fromCharCode(r)
				} else if (r > 127 && r < 2048) {
					t += String.fromCharCode(r >> 6 | 192);
					t += String.fromCharCode(r & 63 | 128)
				} else {
					t += String.fromCharCode(r >> 12 | 224);
					t += String.fromCharCode(r >> 6 & 63 | 128);
					t += String.fromCharCode(r & 63 | 128)
				}
			}
			return t
		},
		_utf8_decode: function(e) {
			var t = "";
			var n = 0;
			var r = c1 = c2 = 0;
			while (n < e.length) {
				r = e.charCodeAt(n);
				if (r < 128) {
					t += String.fromCharCode(r);
					n++
				} else if (r > 191 && r < 224) {
					c2 = e.charCodeAt(n + 1);
					t += String.fromCharCode((r & 31) << 6 | c2 & 63);
					n += 2
				} else {
					c2 = e.charCodeAt(n + 1);
					c3 = e.charCodeAt(n + 2);
					t += String.fromCharCode((r & 15) << 12 | (c2 & 63) << 6 | c3 & 63);
					n += 3
				}
			}
			return t
		}
	}

	$(document).ready(function () { 
		getRetensi(0);
		$('.datepicker').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        });
		$('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
		$('#terakhir_berobat').keydown(function(e) {
			console.log(e.keyCode);
			if (e.keyCode == 13 || e.keyCode == 40) {
				$('#tujuan').focus();
			}
		});

		$('#tujuan').keydown(function(e) {
			console.log(e);
			if (e.keyCode == 13 || e.keyCode == 40) {
				$('#terakhir_dirawat').focus();
			} else if (e.keyCode == 38) {
				$('#terakhir_berobat').focus();
			}
		});



		$('#nama').keydown(function(e) {
			if ($(this).val() !== "") {
				if (e.keyCode == 13 || e.keyCode == 40) {
					$('#terakhir_berobat').focus();
				}
			} else if (e.keyCode == 38) {
				$('#nomr').focus();
			}
		});
		$('#terakhir_dirawat').keydown(function(e) {
			if (e.keyCode == 13 || e.keyCode == 40) {
				$('#diagnosa_terakhir').focus();
			} else if (e.keyCode == 38) {
				$('#tujuan').focus();
			}
		});

		$('#diagnosa_terakhir').keydown(function(e) {
			console.log(e);
			if (e.keyCode == 13 || e.keyCode == 40) {
				$('#simpan').focus();
			} else if (e.keyCode == 38) {
				$('#terakhir_dirawat').focus();
			}
		});

		$("input").on("change", function() {
			this.setAttribute(
				"data-date",
				moment(this.value, "YYYY-MM-DD")
				.format(this.getAttribute("data-date-format"))
			)
		}).trigger("change");

		$('#span-loading').hide();

		$('[data-rel=tooltip]').tooltip();


		$('#simpan').on('click', function() {
			if ($('#nomr').val() == "") {
				bootbox.alert("Data pasien tidak boleh kosong...");
				document.pendaftaran.nomr.focus();
				return false;
			}

			var nomr = $('#nomr').val();
			//alert(nomr);
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url() . 'mr_dokumen.php/retensi/ceknomr'; ?>",
				data: "nomr=" + nomr,
				dataType: "JSON",
				success: function(data) {
					if (data.status == false) {
						//bootbox.alert("Pasien sudah terdaftar dengan tujuan pada hari yang sama...");
						var pesan = '<div class="alert alert-danger" role="alert">' + data.message + '</div><br>';
						$('#messege').html(pesan);
						$('#nomr')
						return false;
					} else {
						var x = confirm("Apa anda yakin melanjutkan proses retensi...?");
						if (x) {
							simpan_retensi();
							return true;
						}
					}
				}
			});

		});

		$('#nomr').keydown(function(e) {
			//if($(this).val() !== ""){
			if (e.keyCode == 13) {
				//alert('cari');
				$('#cari').click();
			}
			//}
		});



		$('#cari').click(function() {
			var btn = $(this);


			var nomr_pasien = $("#nomr").val();
			if (nomr_pasien == "") {

				$("#nama").val("");
				btn.button('reset')
				$('#data_pasien').html("");
				$('#q').val("");
				$('#nav').html("");
				$('#pasien_baru').html('Pasien Baru');
				$('#cari_pasien').modal('show');

				setTimeout(focus_q, 500);

				return false;
			}
			var url = "<?php echo base_url() . 'mr_dokumen.php/retensi/ceknomr'; ?>";
			console.log(url);
			$.ajax({
				type: 'POST',
				url: url,
				data: "nomr=" + nomr_pasien,
				dataType: "JSON",
				beforeSend: function() {
					btn.button('loading');
				},
				success: function(data) {
					console.log(data)
					if (data.message == "OK") {
						$("#nama").val(data.pasien.nama);
						$('#tahap').removeClass('hide');
						$('#terakhir_berobat').val("");
						$('#tujuan').val("");
						$('#terakhir_dirawat').val("");
						$('#diagnosa_terakhir').val("");
						$('#terakhir_berobat').focus();
						btn.button('reset')

					} else if (data.message == "Pasien sudah diretensi") {
						var x = confirm(data.message + "\nApa anda ingin mengubah data retensi...?");
						if (x) {
							$('#nomr').val(data.pasien.nomr);
							$('#nama').val(data.pasien.nama_pasien);
							$('#terakhir_berobat').val(data.pasien.tanggal_terakhir_berobat);
							$('#tujuan').val(data.pasien.grId);
							$('#terakhir_dirawat').val(data.pasien.rawat_terakhir);
							$('#diagnosa_terakhir').val(data.pasien.diagnosa);
							$('#terakhir_berobat').focus();
						} else {
							resetForm();
						}
						btn.button('reset');
						return true;
					} else {
						$("#nama").val("");
						$('#pasien_baru').html('Pasien Baru');
						btn.button('reset')
						//bootbox.alert(data.message);
						$("#nama").focus();
						return false;
					}
				},
				error: function(xhr) { // if error occured
					alert("Error occured.please try again");
					btn.button('reset');
				},
			});
		});

		$(document).one('ajaxloadstart.page', function(e) {
			//in ajax mode, remove remaining elements before leaving page
			$('[class*=select2]').remove();
		});

		$('.date-picker').datepicker({
			autoclose: true,
			todayHighlight: true
		})

		$('input.limited').inputlimiter({
			remText: '%n character%s remaining...',
			limitText: 'max allowed : %n.'
		});

		$('#cetakUlang').click(function() {
			var a = $('#no_registrasi').val();
			if (a == "") {
				bootbox.alert("No registrasi belum diisi...");
			} else {
				location.href = '<?php echo base_url() . 'pendaftaran/cetak_pendaftaran/'; ?>' + a;
			}
		});
	});

	function set_focus(evt, id) {
		var charCode = (evt.which) ? evt.which : event.keyCode;
		if ($(this).val() !== "") {
			if (charCode == 13) {
				var data = $(this).val();
				document.getElementById(id).focus();
				return true;
			}
		}

	}

	function tambah() {
		$('#form').show();
		$('#tabel').removeClass('col-xs-12');
		$('#tabel').addClass('col-xs-7');
		$('#nomr').focus();
		resetForm();
	}

	function kembali() {
		$('#form').hide();
		$('#tabel').removeClass('col-xs-7');
		$('#tabel').addClass('col-xs-12');
	}

	function getRetensi(start = 0) {
		var q = $('#q').val();
		$.ajax({
			url: "<?php echo base_url() . 'mr_dokumen.php/retensi/data?q='; ?>" + q + "&start=" + start,
			type: "GET",
			dataType: "json",
			data: {
				get_param: 'value'
			},
			success: function(data) {
				//document.getElementsByTagName("table")[0].innerHTML = data;
				$('#getdata').html("");
				var start = data.start;
				var limit = data.limit;
				var row_count = data.row_count;
				var limit = data.limit;
				var pasien = data.data;
				jmlData = pasien.length;
				buatTabel = "";
				var mulai = start;
				for (a = 0; a < jmlData; a++) {
					mulai++;
					buatTabel += "<tr>" +
						"<td>" + mulai + "</td>" +
						"<td>" + pasien[a].nomr + "</td>" +
						"<td>" + pasien[a].nama_pasien + "</td>" +
						"<td>" + pasien[a].tanggal_terakhir_berobat + "</td>" +
						"<td>" + pasien[a].grNama + "</td>" +
						"<td>" + pasien[a].rawat_terakhir + "</td>" +
						"<td>" + pasien[a].diagnosa + "</td>" +
						"<td><button class='btn btn-danger btn-sm' type='button' onclick='hapusRetensi(\"" + pasien[a]["idx"] + "\")'><span class='fa fa-remove'></span></button></td>" +
						"<tr/>";
				}
				$('#getdata').html(buatTabel);

				/**
				Buat Paginasi
				 */

				if (row_count <= limit) {
					$('#pagination').html("");
				} else {
					var pagination = "";
					var btnIdx = "";
					jmlPage = Math.ceil(row_count / limit);
					offset = start % limit;
					curIdx = Math.ceil((start / limit) + 1);
					prev = (curIdx - 2) * limit;
					next = (curIdx) * limit;

					var curSt = (curIdx * limit) - limit;
					var st = start;
					var btn = "btn-default";
					var lastSt = (jmlPage * limit) - limit
					var btnFirst = "<button class='btn btn-default btn-sm' onclick='getRetensi(0)'><span class='fa fa-angle-double-left'></span></button>";
					if (curIdx > 1) {
						var prevSt = ((curIdx - 1) * limit) - limit;
						btnFirst += "<button class='btn btn-default btn-sm' onclick='getRetensi(" + prevSt + ")'><span class='fa fa-angle-left'></span></button>";
					}

					var btnLast = "";
					if (curIdx < jmlPage) {
						var nextSt = ((curIdx + 1) * limit) - limit;
						btnLast += "<button class='btn btn-default btn-sm' onclick='getRetensi(" + nextSt + ")'><span class='fa fa-angle-right'></span></button>";
					}
					btnLast += "<button class='btn btn-default btn-sm' onclick='getRetensi(" + lastSt + ")'><span class='fa fa-angle-double-right'></span></button>";

					if (jmlPage >= 10) {
						if (curIdx >= 8) {
							var idx_start = curIdx - 8;
							var idx_end = idx_start + 10;
							if (idx_end >= jmlPage) idx_end = jmlPage;
						} else {
							var idx_start = 1;
							var idx_end = 10;
						}
						for (var j = idx_start; j <= idx_end; j++) {
							st = (j * limit) - jmlData;
							if (curSt == st) btn = "btn-success";
							else btn = "btn-default";
							btnIdx += "<button class='btn " + btn + " btn-sm' onclick='getRetensi(" + st + ")'>" + j + "</button>";
						}
					} else {
						for (var j = 1; j <= jmlPage; j++) {
							st = (j * limit) - jmlData;
							if (curSt == st) btn = "btn-success";
							else btn = "btn-default";
							btnIdx += "<button class='btn " + btn + " btn-sm' onclick='getRetensi(" + st + ")'>" + j + "</button>";
						}
					}
					pagination += btnFirst + btnIdx + btnLast;
					$('#pagination').html(pagination);
				}

				return true;
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert('Error Function : ' + thrownError);
				return false;
			}
		});
	}

	function exportExcel() {
		var url = "<?php echo base_url() . 'mr_dokumen.php/retensi/excel'; ?>";
		window.location = url;
		
	}

	function cari_pasien(start) {
		var search;
		var url;
		search = $('#q').val();
		url = "<?php echo base_url() . "mr_dokumen.php/retensi/pasien?q="; ?>" + search + "&start=" + start
		console.log(url);
		//alert(url);
		$.ajax({
			url: url,
			type: "GET",
			dataType: "json",
			data: {
				get_param: 'value'
			},
			success: function(data) {
				//menghitung jumlah data
				console.log(data);
				jmlData = data.length;
				var row_count = data.row_count;
				//variabel untuk menampung tabel yang akan digenerasikan
				//buatTabel = "";
				pagination = "";
				row = 0;
				var limit = data.limit;
				var start = data.start;
				pagination_count = 0;
				idx = 1;
				cur_idx = 0;
				next = limit;
				prev = 0;

				pagination_count = row_count / limit;
				sisa = start % limit;
				cur_idx = start / limit;
				cur_idx = Math.ceil(cur_idx);
				prev = (cur_idx - 2) * limit;
				next = (cur_idx) * limit;
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
						pagination += "<nav><ul class='pagination' style='margin-top:0px'><li><a class='btn btn-primary' >Record Count : " + row_count + "</a></li><li " + active + "><a  onclick='cari_pasien(" + idx + ")'>First</a></li>";
						if (next <= row - sisa) pagination += "<li " + active + "><a onclick='cari_pasien(" + next + ")'>Next</a></li>";
						if (num == cur_idx) active = "class='active'";
						else active = "";
						pagination += "<li " + active + "><a onclick='cari_pasien(" + idx + ")'>" + num + "</a></li>";
					} else if (i > 0 && i < paging - 1) {
						if (num >= min && num <= max) {
							idx = (limit * i) + 1;
							if (num == cur_idx) active = "class='active'";
							else active = "";
							pagination += "<li " + active + "><a onclick='cari_pasien(" + idx + ")'>" + num + "</a></li>";
						}

					} else {
						idx = (limit * i) + 1;
						if (num == cur_idx) active = "class='active'";
						else active = "";
						pagination = pagination + "<li " + active + "><a onclick='cari_pasien(" + idx + ")'>" + num + "</a></li>";
						if (prev >= 0) pagination += "<li><a onclick='view(" + prev + ")'>Prev</a></li>";
						pagination += "<li><a onclick='cari_pasien(" + idx + ")'>Last</a></li></ul></nav>";
					}
					if (idx == cur_idx) active = "class='active'";
					else active = "";
				}
				//document.getElementById("nav").innerHTML = pagination;
				//document.getElementById('asesi').innerHTML = data["tabel"];
				$('#nav').html(pagination);
				$('#data_pasien').html(data['tabel']);
			}
		});
	}

	function get_wilayah(start) {
		var search;
		var url;
		search = $('#q_wilayah').val();
		var param = $('#param').val();
		url = "<?php echo base_url() . "mr_dokumen.php/retensi/wilayah?q="; ?>" + search + "&start=" + start + "&param=" + param;
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

				pagination_count = row_count / limit;
				sisa = start % limit;
				cur_idx = start / limit;
				cur_idx = Math.ceil(cur_idx);
				prev = (cur_idx - 2) * limit;
				next = (cur_idx) * limit;
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
						pagination += "<nav><ul class='pagination' style='margin-top:0px'><li><a class='btn btn-primary' >Record Count : " + row_count + "</a></li><li " + active + "><a  onclick='get_wilayah(" + idx + ")'>First</a></li>";
						if (next <= row - sisa) pagination += "<li " + active + "><a onclick='cari_pasien(" + next + ")'>Next</a></li>";
						if (num == cur_idx) active = "class='active'";
						else active = "";
						pagination += "<li " + active + "><a onclick='get_wilayah(" + idx + ")'>" + num + "</a></li>";
					} else if (i > 0 && i < paging - 1) {
						if (num >= min && num <= max) {
							idx = (limit * i) + 1;
							if (num == cur_idx) active = "class='active'";
							else active = "";
							pagination += "<li " + active + "><a onclick='get_wilayah(" + idx + ")'>" + num + "</a></li>";
						}

					} else {
						idx = (limit * i) + 1;
						if (num == cur_idx) active = "class='active'";
						else active = "";
						pagination = pagination + "<li " + active + "><a onclick='get_wilayah(" + idx + ")'>" + num + "</a></li>";
						if (prev >= 0) pagination += "<li><a onclick='get_wilayah(" + prev + ")'>Prev</a></li>";
						pagination += "<li><a onclick='get_wilayah(" + idx + ")'>Last</a></li></ul></nav>";
					}
					if (idx == cur_idx) active = "class='active'";
					else active = "";
				}
				//document.getElementById("nav").innerHTML = pagination;
				//document.getElementById('asesi').innerHTML = data["tabel"];
				$('#nav_wilayah').html(pagination);
				$('#data_wilayah').html(data['tabel']);
			}
		});
	}



	function get_pasien(nomr) {
		$('#nomr').val(nomr);
		$('#cari_pasien').modal('hide');
		$('#cari').click();
	}

	function hanyaAngka(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode

		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;

		return true;
	}



	function checkValue(str, max) {
		if (str.charAt(0) !== '0' || str == '00') {
			var num = parseInt(str);
			if (isNaN(num) || num <= 0 || num > max) num = 1;
			str = num > parseInt(max.toString().charAt(0)) && num.toString().length == 1 ? '0' + num : num.toString();
		};
		return str;
	};

	function auto_focus() {
		$('#x-noktp').focus();
	}

	function focus_q() {
		$('#q').focus();
	}

	function focus_q_wilayah() {
		$('#q_wilayah').focus();
	}

	function simpan_retensi() {
		var url;
		url = "<?php echo base_url() .'mr_dokumen.php/retensi/simpan_retensi'; ?>";
		console.log(url);
		var grid = $('#tujuan').val();
		if (grid == "") var grNama = "";
		else var grNama = $('#tujuan :selected').html();
		var fomrdata = {
			nomr: $('#nomr').val(),
			nama_pasien: $('#nama').val(),
			tanggal_terakhir_berobat: $('#terakhir_berobat').val(),
			grId: grid,
			grNama: grNama,
			rawat_terakhir: $('#terakhir_dirawat').val(),
			diagnosa: $('#diagnosa_terakhir').val(),
		}
		// ajax adding data to database
		$.ajax({
			url: url,
			type: "POST",
			data: fomrdata,
			dataType: 'JSON',
			success: function(data) {
				//if success close modal and reload ajax table
				$('#nomr').focus();
				console.clear();
				console.log(data);
				alert(data.message);
				if (data.status == true) {
					getRetensi(0);
					resetForm();
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert(url);
			}
		});
	}

	function resetForm() {
		$('#nomr').val("");
		$('#nama').val("");
		$('#terakhir_berobat').val("");
		$('#tujuan').val("");
		$('#terakhir_dirawat').val("");
		$('#diagnosa_terakhir').val("");
	}

	function cari_wilayah() {
		var id = $('#show').val();
		if (id == 0) {
			$('#wilayah').hide();
			$('#show').val("1");
		} else {
			$('#wilayah').show();
			$('#show').val("0");
			get_wilayah(0);
			$('#q_wilayah').focus();
			//setTimeout(focus_q_wilayah,500);
		}

	}

	function enter_suku(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode;
		//alert(charCode);
		if (charCode == 13) {
			cari_bahasa();
			return true;
		}
	}

	function escape_bahasa(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode;
		//alert(charCode);
		if (charCode == 13) {
			//$('#bahasa').hide();
			$('#idx_bahasa1').focus();
			return true;
		}
	}

	function enter_wilayah(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode;
		//alert(charCode);
		if (charCode == 13) {
			//$('#bahasa').hide();
			$('#idx_wilayah1').focus();
			return true;
		}
	}

	function cari_bahasa() {

		var id = $('#show_b').val();
		if (id == 0) {
			$('#bahasa').hide();
			$('#show_b').val("1");
		} else {
			$('#bahasa').show();
			$('#show_b').val("0");
			get_bahasa(0);
			$('#q_bahasa').focus();
			//setTimeout(focus_q_wilayah,500);
		}

	}

	function set_wilayah(id_prov, id_kab, id_kec, id_kel, id_wilayah) {

		$('#provinsi').val(id_prov);
		$('#kota').val(id_kab);
		$('#kec').val(id_kec);
		$('#desa').val(id_kel);
		$('#id_wilayah').val(id_wilayah);
		$('#wilayah').hide();
		$('#x-nobpjs').focus();
	}

	function set_bahasa(id, bahasa) {
		$('#id_bahasa').val(id);
		$('#x-bahasa').val(bahasa);
		$('#bahasa').hide();
		$('#kwn').focus();
	}

	function kosongkan() {
		$('#nomr').val("");
		$('#ktp').val("");
		$('#nama').val("");
		$('#ttl').val("");
		$('#jk').val("");
		$('#alamat').val("");
		$('#x-umur').val("");
		//$('#tujuan').select2("val","");
		//$('#dokter').select2("val","");
		$('#tujuan').val("");
		$('#dokter').val("");
		$('#bayar').val("");
		$('#rujukan').val("");
		$('#norujuk').val("");
	}

	function hapusRetensi(idx) {
		var r = confirm("Yakin data ini akan dihapus");
		if (r == true) {
			$.ajax({
				url: "<?php echo base_url() . 'mr_dokumen.php/retensi/hapus/'; ?>" + idx,
				type: "GET",
				dataType: "json",
				data: {
					get_param: 'value'
				},
				success: function(data) {
					alert(data.message);
					getRetensi(0);
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert('Error Function : ' + thrownError);
					return false;
				}
			});
		}
	}
</script>
<script src="<?php echo base_url() ?>assets/js/pendaftaran.js"></script>
<div id="cari_pasien" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Cari Pasien</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">&nbsp;</div>
					<div class="col-sm-6 text-right">
						<div class="input-group">
							<input type="text" class="form-control input-sm" style="width:100%" name="q" id="q" value="" placeholder="Masukkan Nama / NIK" onkeypress="cari_pasien(0)">
							<span class="input-group-btn">
								<button class="btn btn-primary btn-sm" onclick="cari_pasien(0)">Search</button>
							</span>
						</div>
						
					</div>

					<div class="col-sm-12">
						<table id="simple-table" class="table table-bordered table-hover" style='color:#000000;'>
							<thead>
								<tr>
									<th class="center">NO KTP</th>
									<th class="center">NAMA PASIEN</th>
									<th class="center">TEMPAT/TGL LAHIR</th>
									<th class="center">JENIS KELAMIN</th>
									<th class="center">ALAMAT</th>
									<th width="100px">#</th>
								</tr>
							</thead>
							<tbody id="data_pasien">
								<tr>
									<td align='center' colspan='5'>
<h3> .: SILAHKAN LAKUKAN PENCARIAN :. </h3>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="5">
<div id="nav"></div>
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>



<div id="modal-rujukan" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					DATA RUJUKAN
				</div>
			</div>

			<div class="modal-body no-padding">
				<!--div class="row"-->
				<div class="col-md-12" style="display: none;" id="f_jrujukan">
					<div class="form-group">
						<input type="radio" name="j_rujukan" id="pcare" value="2" onclick="cari_rujukan()" checked> PCARE
						<input type="radio" name="j_rujukan" id="rs" value="3" onclick="cari_rujukan()"> RUMAH SAKIT
					</div>
				</div>
				<div class="col-md-12">
					<div id="data_rujukan"></div>
				</div>
				<!--/div-->

			</div>
			<div class="modal-footer">
				<!--button class="btn btn-sm btn-primary" data-dismiss="modal" name="sm_prov" id="sm_prov">
					<i class="ace-icon fa fa-check"></i>
					Save
				</button-->
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>