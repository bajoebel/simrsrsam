<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('pendaftaran/daftar');?>">Home</a>
				</li>
				<li class="active">Pendaftaran Pasien Lama</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1>
					PENDAFTARAN PASIEN
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<div class="widget-box">
						<div class="widget-header widget-header-blue widget-header-flat">
							<h4 class="widget-title lighter">Pendaftaran Pasien Baru / Lama</h4>

							<div class="widget-toolbar">
								<label>
											<select id="status" name="status" class="col-xs-12 col-sm-12">
												<option value="1">PENDAFTARAN</option>
												<option value="2">PASIEN BARU</option>
											</select>
								</label>
							</div>
						</div>

						<div class="widget-body">
							<div class="widget-main">
							
								<div id="fuelux-wizard-container">
									<div>
										<ul class="steps">
											<li data-step="1" class="active">
												<span class="step">1</span>
												<span class="title">Data Pasien Lama</span>
											</li>

											<li data-step="2">
												<span class="step">2</span>
												<span class="title">Pendaftaran</span>
											</li>
										</ul>
									</div>

									<hr />
									<form class="form-horizontal" id="pendaftaran" name="pendaftaran" action="<?php echo base_url('pendaftaran/simpanlama') ?>" method="POST">
									<div class="step-content pos-rel">
										<div class="step-pane active" data-step="1">

												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">No MR:</label>
													<div class="col-xs-6 col-sm-2">
														<div class="input-group">
															<input type="text" name="nomr" id="nomr" onkeypress="return hanyaAngka(event)" class="limited" maxlength="10"/>
															<span class="input-group-addon" id="cari">
																<i class="ace-icon glyphicon glyphicon-search "></i>
															</span>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">No KTP:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="ktp" id="ktp" class="col-xs-12 col-sm-5" readonly/>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Nama Pasien:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="nama" id="nama" class="col-xs-12 col-sm-5" readonly/>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Tempat/Tgl Lahir:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="ttl" id="ttl" class="col-xs-12 col-sm-5" readonly/>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Jenis Kelamin:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="jk" id="jk" class="col-xs-12 col-sm-2" readonly/>
														</div>
													</div>
												</div>
										</div>

										<div class="step-pane" data-step="2">
												<div class="row">
												<div class="col-sm-6">
													<div class="widget-box">
														<div class="widget-body">
														
															<br />
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tgl Registrasi:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="tglreg" id="tglreg" class="col-xs-12 col-sm-5" value="<?php echo date("Y/m/d H:i:s"); ?>" readonly/>
																	</div>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tujuan Layanan:</label>
			
																<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	<select class="select2" id="tujuan" name="tujuan" data-placeholder="Klik untuk memilih Tujuan...">
																	<option value="">-- Pilih Tujuan Layanan --</option>
																		<?php
																		foreach($poly as $pol){
																		echo '<option value="'.$pol->Id_poli_ruang.'">'.$pol->nama_poli_ruang.'</option>';
																		}
																		?>
																	</select>
																</div>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Dokter:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<select class="select2" id="dokter" name="dokter" data-placeholder="Klik untuk memilih Dokter...">
																		</select>
																	</div>
																</div>
															</div>
															
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Rujukan:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<select id="rujukan" name="rujukan" class="col-xs-12 col-sm-5">
																		<option value="">-- Pilih Rujukan --</option>
																		<?php
																		foreach($rujukan as $rujuk){
																		echo '<option value="'.$rujuk->Id_rujukan.'">'.$rujuk->rujukan.'</option>';
																		}
																		?>
																	</select>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Cara Bayar:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div>
																		<label class="line-height-1 blue">
																			<input name="bayar" id="bayar" value="1" type="radio" class="ace bayar"/>
																			<span class="lbl"> Umum</span>
																		</label>
																	</div>
			
																	<div>
																		<label class="line-height-1 blue">
																			<input name="bayar" id="bayar" value="2" type="radio" class="ace bayar" />
																			<span class="lbl"> JKN</span>
																		</label>
																	</div>
																</div>
															</div>
															
														</div>
													</div>
												</div>
			
												<div class="col-sm-6">
												<div id="jkn" class="hide">
													<div class="widget-box">
														<div class="widget-header">
															<h4 class="widget-title">Cek BPJS</h4>
		
															<div class="widget-toolbar">
																<a href="#" data-action="collapse">
																	<i class="ace-icon fa fa-chevron-up"></i>
																</a>
															</div>
														</div>
														<div class="widget-body">
															<br />
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">No Kartu BPJS:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="nobpjs" id="nobpjs" class="col-xs-12 col-sm-6" />
																		<button id="cek_kartu_jkn" name="cek_kartu_jkn" type="button" class="btn btn-primary btn-sm" data-toggle="button">
																		<i class="ace-icon glyphicon glyphicon-search "></i>
																		</button>
																	</div>
																</div>
															</div>
															
															<hr />
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Keterangan:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="keterangan" id="keterangan" class="col-xs-12 col-sm-5" readonly/>
																	</div>
																</div>
															</div>
															
															<hr />
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">No KTP:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="noktp" id="noktp" class="col-xs-12 col-sm-9" readonly/>
																	</div>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Nama Pasien:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="pasien" id="pasien" class="col-xs-12 col-sm-9" readonly/>
																	</div>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tgl Lahir:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="tgllahir" id="tgllahir" class="col-xs-12 col-sm-5" readonly/>
																	</div>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Umur:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="umur" id="umur" class="col-xs-12 col-sm-9" readonly/>
																	</div>
																</div>
															</div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Gender:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="sex" id="sex" class="col-xs-12 col-sm-5" readonly/>
																	</div>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<hr />
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Kode Provider:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="kdprovider" id="kdprovider" class="col-xs-12 col-sm-9" readonly/>
																	</div>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Nama Provider:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="nmprovider" id="nmprovider" class="col-xs-12 col-sm-9" readonly/>
																	</div>
																</div>
															</div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Kode Cabang:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="kdcabang" id="kdcabang" class="col-xs-12 col-sm-9" readonly/>
																	</div>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Nama Cabang:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="nmcabang" id="nmcabang" class="col-xs-12 col-sm-9" readonly/>
																	</div>
																</div>
															</div>
															
															<hr />
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Kode:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="kdpeserta" id="kdpeserta" class="col-xs-12 col-sm-9" readonly/>
																	</div>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Jenis Peserta:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="jnspeserta" id="jnspeserta" class="col-xs-12 col-sm-9" readonly/>
																	</div>
																</div>
															</div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Kode Kelas:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="kdkelas" id="kdkelas" class="col-xs-12 col-sm-9" readonly/>
																	</div>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Nama Kelas:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="nmkelas" id="nmkelas" class="col-xs-12 col-sm-9" readonly/>
																	</div>
																</div>
															</div>
															
														</div>
													</div>
													</div>
												</div>
												
											</div>
												
										</div>
									</div>
									</form>
								</div>
								

								<hr />
								<div class="wizard-actions hide" id="tahap">
									<button class="btn btn-prev">
										<i class="ace-icon fa fa-arrow-left"></i>
										Prev
									</button>

									<button class="btn btn-success btn-next" data-last="Finish">
										Next
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
	
		$('[data-rel=tooltip]').tooltip();
	
		$('.select2').css('width','300px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		}); 
	
		$('#fuelux-wizard-container')
		.ace_wizard({
			//step: 2 //optional argument. wizard will jump to step "2" at first
			//buttons: '.wizard-actions:eq(0)'
		})
		.on('actionclicked.fu.wizard' , function(e, info){
			if(info.step == 1 && $('#status').val()=="1") {
			
			}
		})
		.on('finished.fu.wizard', function(e) {
			var umum = pendaftaran.bayar[0].checked;
			var jkn = pendaftaran.bayar[1].checked;
			
			if($('#layanan').val()==""){
				bootbox.alert("Silahkan pilih layanan...");
				document.pendaftaran.layanan.focus();
				return false;
        	}
			if($('#tujuan').val()==""){
				bootbox.alert("Silahkan pilih tujuan...");
				document.pendaftaran.tujuan.focus();
				return false;
        	}
			if($('#dokter').val()=="" && $('#layanan').val()=="GL02"){
				bootbox.alert("Dokter tujuan belum diisi...");
				document.pendaftaran.dokter.focus();
				return false;
        	}
			if(umum==false && jkn==false){
				bootbox.alert("Silahkan pilih tipe pembayaran...");
				return false;
        	}
			if($('#rujukan').val()==""){
				bootbox.alert("Silahkan pilih rujukan pasien...");
				document.pendaftaran.rujukan.focus();
				return false;
        	}
			if(confirm('Apa anda yakin melanjutkan proses pendaftaran...?')){
				document.pendaftaran.submit();
				return true;
            }
		})
		.on('stepclick.fu.wizard', function(e){
		});
	
		$('#status').click(function(){
			if($('#status').val()=="2" ) {
				window.location=("<?php echo base_url('pendaftaran/pendaftaran_baru');?>");
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
			var nomr_pasien = $("#nomr").val(); 
	 
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
					}else{
						$("#ktp").val("");
						$("#nama").val("");
						$("#ttl").val("");
						$("#jk").val("");
						$("#nobpjs").val("");
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
		//show datepicker when clicking on the icon
		.next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
		
		$('input.limited').inputlimiter({
			remText: '%n character%s remaining...',
			limitText: 'max allowed : %n.'
		});
		
		$('#tujuan').change(function(){
				$('#dokter').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
		});
		
		$('.bayar').click(function(){
			var val = jQuery(this).val();
			if(val == "2" ){
                $('#jkn').removeClass('hide');
			}else{
				$('#jkn').addClass('hide');
            }
		});
		
		$('#cek_kartu_jkn').click(function(){
            var nopeserta = $('#nobpjs').val();
            var reqdata = "rujukan";
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'pendaftaran/get_jkn'; ?>",
                data : "nopeserta="+nopeserta+"&reqdata="+reqdata,
                success:function(data){
                    var response =  eval("(" + data + ")");
                    if(response.metadata.code=='200'){
					
						if(response.response.peserta.sex=='L'){
                            $('#sex').val("Laki-laki");
                        }else{
                            $('#sex').val("Perempuan");
                        }
                        $('#no_kartu').val(response.response.peserta.noKartu);
                        $('#kdprovider').val(response.response.peserta.provUmum.kdProvider);
                        $('#nmprovider').val(response.response.peserta.provUmum.nmProvider);
                        $('#kdcabang').val(response.response.peserta.provUmum.kdCabang);
                        $('#nmcabang').val(response.response.peserta.provUmum.nmCabang);
                        $('#kdpeserta').val(response.response.peserta.jenisPeserta.kdJenisPeserta);
                        $('#jnspeserta').val(response.response.peserta.jenisPeserta.nmJenisPeserta);
                        $('#kdkelas').val(response.response.peserta.kelasTanggungan.kdKelas);
                        $('#nmkelas').val(response.response.peserta.kelasTanggungan.nmKelas);
                        $('#kode').val(response.response.peserta.statusPeserta.kode);
                        $('#keterangan').val(response.response.peserta.statusPeserta.keterangan);
						$('#noktp').val(response.response.peserta.nik);
						$('#pasien').val(response.response.peserta.nama);
						$('#tgllahir').val(response.response.peserta.tglLahir);
                        $('#umur').val(response.response.peserta.umur.umurSekarang);
                    }else{
                        bootbox.alert(response.metadata.message);
                    }                  
                },
                error:function(xhr, ajaxOptions, thrownError){
                    alert('Error Function : '+thrownError);
                }
            });
        }); 
		
	});
</script>