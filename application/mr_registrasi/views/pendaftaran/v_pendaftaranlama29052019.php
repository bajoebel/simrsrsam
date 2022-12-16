<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('pendaftaran/daftar');?>">Home</a>
				</li>
				<li class="active">Pendaftaran Pasien Rawat Jalan</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1>
					PENDAFTARAN PASIEN RAWAT JALAN
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<div class="widget-box">
						<div class="widget-header widget-header-blue widget-header-flat">
							<h4 class="widget-title lighter">Pendaftaran Pasien Baru / Lama</h4>
                            <div class="widget-toolbar" style="line-height: 17px;margin-top: 3px;">
                                <input type="text" name="no_registrasi" id="no_registrasi" style="width: 250px;color:#000000" placeholder="Entry No Registrasi Rawat Jalan"/>
                                <button type="button" id="cetakUlang" class="btn btn-sm btn-primary" style="line-height: 17px;margin-top: 0px;">Cetak Ulang</button>
                            </div>
							
                            <div class="widget-toolbar">
								<label>
									<select id="status" name="status" class="col-xs-12 col-sm-12" style='color:#000000;'>
										<option value="1">PENDAFTARAN</option>
										<option value="2">PASIEN BARU</option>
									</select>
								</label>
							</div>
						</div>

						<div class="widget-body">
							<div class="widget-main">
							
								<div id="fuelux-wizard-container">
									<form class="form-horizontal" id="pendaftaran" name="pendaftaran" action="<?php echo base_url('pendaftaran/simpanlama') ?>" method="POST" >
										<div class="row">
												<div class="col-sm-6">
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">No MR:</label>
																<div class="col-xs-12 col-sm-6">
																	<div class="clearfix">
																		<input type="text" name="nomr" id="nomr" onkeypress="return hanyaAngka(event)" class="limited col-xs-12 col-sm-10" maxlength="10" placeholder="Pencarian NOMR" style='color:#000000;'/>
																		<button id="cari" name="cari" type="button" class="btn btn-primary btn-sm" data-toggle="button" data-loading-text="Loading...">
																		<i class="ace-icon glyphicon glyphicon-search "></i>
																		</button>
																	</div>
																	<span id="span-loading">
																		<img src="<?php echo base_url('loader.gif') ?>" style="position: absolute;border: 0px solid #000;margin-top: -115px;margin-left: 210px; " />
																		Mohon Tunggu... Server sedang memeriksa Kode Booking
																	</span>
																</div>
																<input type="text" name="booking" id="booking" class="col-xs-12 col-sm-3" maxlength="8" placeholder="Enter Kode Booking" style='color:#000000;'/>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">No KTP:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="ktp" id="ktp" class="col-xs-12 col-sm-9" style='color:#000000;' readonly/>
																	</div>
																</div>
															</div>
			
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Nama Pasien:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="nama" id="nama" class="col-xs-12 col-sm-11 text-success" style='color:#000000;' readonly/>
																	</div>
																</div>
															</div>
			
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tempat/Tgl Lahir:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="ttl" id="ttl" class="col-xs-12 col-sm-11" style='color:#000000;' readonly/>
																	</div>
																</div>
															</div>
			
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Jenis Kelamin:</label>
			
																<div class="col-xs-12 col-sm-5">
																	<div class="clearfix">
																		<input type="text" name="jk" id="jk" class="col-xs-12 col-sm-11" style='color:#000000;' readonly/>
																	</div>
																</div>
																<div class="col-xs-12 col-sm-4 hide">
																	<label>
																		<input name="sdm" id="sdm" value="1" type="checkbox" class="ace" />
																		<span class="lbl"> Karyawan RSAM</span>
																	</label>
																</div>
															</div>
												</div>
												<div class="col-sm-6">
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tgl Registrasi:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="tglreg" id="tglreg" class="col-xs-12 col-sm-5" value="<?php echo date("Y/m/d H:i:s"); ?>" style='color:#000000;' readonly/>
																	</div>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tujuan Layanan:</label>
			
																<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	<select class="select2" id="tujuan" name="tujuan" data-placeholder="Klik untuk memilih Tujuan..." style='color:#000000;'>
																	<option value="">-- Pilih Tujuan Layanan --</option>
																		<?php
																		foreach($poly as $pol){
																		echo '<option value="'.$pol->grId.'">'.$pol->grNama.'</option>';
																		}
																		?>
																	</select>
																</div>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Rujukan:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<select id="rujukan" name="rujukan" class="col-xs-12 col-sm-7" style='color:#000000;'>
																		<option value="">-- Pilih Rujukan --</option>
																		<?php
																		foreach($rujukan as $rujuk){
																		echo '<option value="'.$rujuk->Id_rujukan.'">'.$rujuk->rujukan.'</option>';
																		}
																		?>
																	</select>
																</div>
															</div>
															
															<div class="form-group hide" id="tRujuk">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">No Rujukan:</label>
			
																<div class="col-xs-12 col-sm-4">
																	<div class="clearfix">
																		<input type="text"  maxlength="10" name="norujuk" id="norujuk" class="col-xs-12 col-sm-12" style='color:#000000;'/>
																	</div>
																</div>
																<div class="col-xs-12 col-sm-5">
																	<div class="clearfix"><span class="lbl" style="font-style:italic"> No.Rujukan berisi No.Registrasi sebelumnya*</span>
																	</div>
																</div>
															</div>
															
														</div>
												<div class="col-xs-12">
												<div style="padding:3px;overflow-y:scroll;overflow-x:scroll;height:200px;border:1px solid grey" class="col-xs-12">
														<table class="table table-bordered table-hover" style='color:#000000;'>
															<thead>
																<tr>
																	<th class="center">NO</th>
																	<th class="center">NO REG</th>
																	<th class="center">TGL REGISTRASI</th>
																	<th class="center">TUJUAN</th>
																	<th class="center">JNS BAYAR</th>
																	<th class="center">USER</th>
																</tr>
															</thead>
															<tbody id="getdata">
															</tbody>
														</table>
												</div>
												</div>
											</div>
									</form>
								</div>
								

								<hr />
								<span id="daftar-loading">
									<img src="<?php echo base_url('loader.gif') ?>" style="position: absolute;border: 0px solid #000;margin-top: -115px;margin-left: 210px; " />
									Mohon Tunggu... Server sedang memeriksa data
								</span>
								<div class="wizard-actions hide" id="tahap">
									<button class="btn btn-primary" name="daftar" id="daftar" class="daftar">
										DAFTAR
										<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
									</button>
								</div>
							</div><!-- /.widget-main -->
						</div><!-- /.widget-body -->
					</div>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div>
<script type="text/javascript">
	function hanyaAngka(evt) {
		$('#tahap').addClass('hide');
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		
		return false;
		return true;
	}
	
	jQuery(function($) {
		$('#rujukan').on('change', function(){
			if($('#rujukan').val()=="7" ){
				$('#tRujuk').removeClass('hide');
			}else{
				$('#tRujuk').addClass('hide');
				$("#norujuk").val("");
			}
		});
		
		$('#span-loading').hide();
		$('#daftar-loading').hide();
		
		$('[data-rel=tooltip]').tooltip();
	
		$('.select2').css('width','300px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		}); 
		
		$('#daftar').on('click', function(){
			$('#daftar-loading').show();
			$('#tahap').addClass('hide');
			if($('#nomr').val()==""){
				$('#daftar-loading').hide();
				$('#tahap').removeClass('hide');
				bootbox.alert("Data pasien tidak boleh kosong...");
				document.pendaftaran.nomr.focus();
				return false;
        	}
			if($('#tujuan').val()==""){
				$('#daftar-loading').hide();
				$('#tahap').removeClass('hide');
				bootbox.alert("Silahkan pilih tujuan...");
				document.pendaftaran.tujuan.focus();
				return false;
        	}
			if($('#rujukan').val()==""){
				$('#daftar-loading').hide();
				$('#tahap').removeClass('hide');
				bootbox.alert("Silahkan pilih rujukan pasien...");
				document.pendaftaran.rujukan.focus();
				return false;
        	}
			if($('#rujukan').val()=="7" && $('#norujuk').val()==""){
				$('#daftar-loading').hide();
				$('#tahap').removeClass('hide');
				bootbox.alert("No.Rujukan tidak boleh kosong...");
				document.pendaftaran.rujukan.focus();
				return false;
        	}
			
			var nomr 	= $('#nomr').val();
			var tujuan 	= $('#tujuan').val();
			var booking = $('#booking').val();
			var norujuk = $('#norujuk').val();
			var rujukan = $('#rujukan').val();
			$.ajax({ 
				type	: 'POST',
				url		: "<?php echo base_url().'pendaftaran/get_cekdaftar'; ?>", 
				data	: "noMr="+nomr+"&tujuan="+tujuan, 
				dataType: "JSON",
				success	: function(data){ 
					if(data.MESSAGE=="OK"){
						$('#daftar-loading').hide();
						$('#tahap').removeClass('hide');
						bootbox.alert("Pasien sudah terdaftar dengan tujuan pada hari yang sama...");
						document.pendaftaran.nomr.focus();
						return false;
					}else{
						if($('#rujukan').val()=="7"){
							$.ajax({
								type : "POST",
								url  : "<?php echo base_url().'pendaftaran/get_ceknorujuk'; ?>",
								data : "noMr="+nomr+"&norujuk="+norujuk,
								success:function(data){
										var response =  eval("(" + data + ")");
										if(response.PESAN=="OK"){
											var x = confirm("Apa anda yakin melanjutkan proses pendaftaran...?");
											if(x){
												if(booking == "") {
													document.pendaftaran.submit();
													return true;
												}else{
													$.ajax({
														type : "POST",
														url  : "<?php echo base_url().'pendaftaran/get_verifikasi'; ?>",
														data : "kode="+booking,
														success:function(data){
																document.pendaftaran.submit();
																return true;            
														},
														error:function(xhr, ajaxOptions, thrownError){
															alert('Error Function : '+thrownError);
														}
													});
												}
											}
											$('#daftar-loading').hide();
											$('#tahap').removeClass('hide');
										}else{
											$('#daftar-loading').hide();
											$('#tahap').removeClass('hide');
											bootbox.alert("No.Rujukan tidak sesuai dengan No.Registrasi sebelumnya...");
											document.pendaftaran.norujuk.focus();
											return false;
										}            
								},
								error:function(xhr, ajaxOptions, thrownError){
									alert('Error Function : '+thrownError);
								}
							});
						}else{
						var x = confirm("Apa anda yakin melanjutkan proses pendaftaran...?");
						if(x){
							if(booking == "") {
								document.pendaftaran.submit();
								return true;
							}else{
								$.ajax({
									type : "POST",
									url  : "<?php echo base_url().'pendaftaran/get_verifikasi'; ?>",
									data : "kode="+booking,
									success:function(data){
											document.pendaftaran.submit();
											return true;            
									},
									error:function(xhr, ajaxOptions, thrownError){
										alert('Error Function : '+thrownError);
									}
								});
							}
						}
							$('#daftar-loading').hide();
							$('#tahap').removeClass('hide');
						}
					}
				}
			});
		
		});
	
		$('#status').click(function(){
			if($('#status').val()=="2" ) {
				window.location=("<?php echo base_url('pendaftaran/pendaftaran_baru');?>");
			}
		});
		
		$('#booking').keydown(function(e){
			if($(this).val() !== ""){
                if(e.keyCode==13){
					$('#span-loading').show();
					var kode = $('#booking').val();
					
					$.ajax({ 
						type	: 'POST',
						url		: "<?php echo base_url().'pendaftaran/get_booking'; ?>", 
						data	: "kode="+kode, 
						dataType: "JSON",
						success	: function(data){ 
						var tglnow = "<?php echo date("Y-m-d") ?>";
							if(data.response.tgl_daftar !== tglnow){
								bootbox.alert("Kode Booking Exp...");
								$('#nomr').val('');
								$('#cari').click();
								$('#span-loading').hide();
							}else{
								$('#booking').val(data.response.kode_booking);
								$('#nomr').val(data.response.nomr);
								$('#tujuan').val(data.response.grId).change();
								$('#cari').click();
								$('#span-loading').hide();
							}
						},
						error:function(xhr, ajaxOptions, thrownError){
							alert('Error Function : '+thrownError);
							$('#span-loading').hide();
						}
					});
                }
			}
        });
		
		$('#nomr').keydown(function(e){
            if($(this).val() !== ""){
                if(e.keyCode==13){
                    $('#cari').click();
                }
            }
        })
		
		$('#cari').click(function(){
			var btn = $(this);
			btn.button('loading')
			
			var nomr_pasien = $("#nomr").val();
			if(nomr_pasien == ""){
				$('#getdata').html("");
				$("#ktp").val("");
				$("#nama").val("");
				$("#ttl").val("");
				$("#jk").val("");
				$("#nobpjs").val("");
				$('#tujuan').val("").change();
				$('#rujukan').val("").change();
				$("#norujuk").val("");
				btn.button('reset')
				return false;
			}
			$.ajax({ 
				type	: 'POST',
				url		: "<?php echo base_url().'pendaftaran/nomr_pasien'; ?>", 
				data	: "nomr="+nomr_pasien, 
				dataType: "JSON", 
				success	: function(data){ 
					console.log(data)
					if(data.MESSAGE=="OK"){
						$("#ktp").val(data.KTP);
						$("#nama").val(data.NAMA);
						$("#ttl").val(data.TL + ", " + data.TGLL);
						$("#jk").val(data.JK);
						$("#nobpjs").val(data.NOBPJS);
						$('#tahap').removeClass('hide');
						btn.button('reset')
						$.ajax({
							type : "POST",
							url  : "<?php echo base_url().'pendaftaran/get_riwayatkunjungan'; ?>",
							data : "nomr_pasien="+nomr_pasien,
							success:function(data){
							//document.getElementsByTagName("table")[0].innerHTML = data;
							$('#getdata').html("");
								var response =  eval("(" + data + ")");
								jmlData = response.jumlah;
								buatTabel = "";
								for(a = 0; a < jmlData; a++){
								if(response.pasien[a].jns_bayar=="2"){
								var bayar = "JKN";
								}else{
								var bayar = "UMUM";
								}
												buatTabel += "<tr>"
												+ "<td>" + (a+1) + "</td>"
												+ "<td>" + response.pasien[a].noreg + "</td>"
												+ "<td>" + response.pasien[a].tglreg + "</td>"
												+ "<td>" + response.pasien[a].tujuan + "</td>"
												+ "<td>" + bayar + "</td>"
												+ "<td>" + response.pasien[a].user + "</td>"
										+ "<tr/>";
								}
								$('#getdata').html(buatTabel);              
							},
							error:function(xhr, ajaxOptions, thrownError){
								alert('Error Function : '+thrownError);
							}
						});
					}else{
						$('#getdata').html("");
						$("#ktp").val("");
						$("#nama").val("");
						$("#ttl").val("");
						$("#jk").val("");
						$("#nobpjs").val("");
						$('#tujuan').val("").change();
						$('#rujukan').val("").change();
						$("#norujuk").val("");
						btn.button('reset')
                        bootbox.alert(data.MESSAGE);
                    } 
				}
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
		
        $('#cetakUlang').click(function(){
            var a = $('#no_registrasi').val();
			if(a == ""){
				bootbox.alert("No registrasi belum diisi...");
			}else{
    			location.href = '<?php echo base_url() .'pendaftaran/cetak_pendaftaran/'; ?>'+a;
			}
        });
	});
</script>