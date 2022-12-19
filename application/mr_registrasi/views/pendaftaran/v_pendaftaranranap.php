<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('pendaftaran/daftar_ranap');?>">Home</a>
				</li>
				<li class="active">Pendaftaran Pasien Rawat Inap</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1>
					PENDAFTARAN PASIEN RAWAT INAP
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<div class="widget-box">
						<div class="widget-body">
							<div class="widget-main">
							
								<div id="fuelux-wizard-container">
									<form class="form-horizontal" id="pendaftaran" name="pendaftaran" action="<?php echo base_url('pendaftaran/simpanranap') ?>" method="POST" target="_blank">
										<div class="row">
												<div class="col-sm-6">
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">No Registrasi:</label>
																<div class="col-xs-6 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="noreg" id="noreg" value="<?php echo $noreg; ?>" class="limited col-xs-12 col-sm-6" maxlength="10" style='color:#000000;'/>
																		<button id="cari" name="cari" type="button" class="btn btn-primary btn-sm" data-toggle="button" data-loading-text="Loading...">
																		<i class="ace-icon glyphicon glyphicon-search "></i>
																		</button>
																	</div>
																</div>
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
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">No MR:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="nomr" id="nomr" class="col-xs-12 col-sm-3" style='color:#000000;' readonly/>
																		<input type="text" name="nama" id="nama" class="col-xs-12 col-sm-9" style='color:#000000;' readonly/>
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
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="jk" id="jk" class="col-xs-12 col-sm-5" style='color:#000000;' readonly/>
																		<input type="hidden" name="jenkel" id="jenkel" class="col-xs-12 col-sm-5" style='color:#000000;' readonly/>
																	</div>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Kiriman dari:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="poli" id="poli" class="col-xs-12 col-sm-11" style='color:#000000;' readonly/>
																		<input type="hidden" name="kdpoli" id="kdpoli" class="col-xs-12 col-sm-11" readonly/>
																	</div>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Status Pasien:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="stts" id="stts" class="col-xs-12 col-sm-5" style='color:#000000;' readonly/>
																	</div>
																</div>
															</div>
												</div>
												<div class="col-sm-6">
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tgl Masuk:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="tglreg" id="tglreg" class="col-xs-12 col-sm-5" value="<?php echo date("Y/m/d H:i:s"); ?>" style='color:#000000;' readonly/>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Diagnosa:</label>
							
																<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	<input type="text" id="diagnosa" name="diagnosa" placeholder="Diagnosa penyakit" class="col-xs-12 col-sm-9" style='color:#000000;'/>
																	<input type="text" name="code" id="code" placeholder="Code ICD" class="col-xs-12 col-sm-3" style='color:#000000;' />
																</div>
																</div>
															</div>
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Dokter Pengirim:</label>
			
																<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	<select class="select2" id="dokter" name="dokter" data-placeholder="Klik untuk memilih Dokter..." style='color:#000000;'>
																	<option value="">-- Pilih Dokter --</option>
																		<?php
																		foreach($dokter as $dok){
																		echo '<option value="'.$dok->id_dokter.'">'.$dok->nama_dokter.'</option>';
																		}
																		?>
																	</select>
																</div>
																</div>
															</div>
															
															<div class="space-2"></div>
<div class="form-group">
															<label class="control-label col-xs-12 col-sm-3 no-padding-right">DPJP:</label>
			
																<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	<select class="select2" id="dpjp" name="dpjp" data-placeholder="Klik untuk memilih DPJP..." style='color:#000000;'>
																	<option value="">-- Pilih Dokter --</option>
																		<?php
																		foreach($dokter as $dok){
																		echo '<option value="'.$dok->id_dokter.'">'.$dok->nama_dokter.'</option>';
																		}
																		?>
																	</select>
																</div>
																</div>
															</div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Ruang Rawat:</label>
			
																<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	<select class="select2" id="ruang" name="ruang" data-placeholder="Klik untuk memilih Ruang Rawat..." style='color:#000000;'>
																	<option value="">-- Pilih Ruang Rawat --</option>
																		<?php
																		foreach($ruang as $pol){
																		echo '<option value="'.$pol->grId.'">'.$pol->grNama.'</option>';
																		}
																		?>
																	</select>
																	<input type="hidden" name="mapingruang" id="mapingruang" class="col-xs-12 col-sm-5" style='color:#000000;' readonly/>
																</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Kelas Rawat:</label>
			
																<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	<select class="select2" id="kelasrawat" name="kelasrawat" data-placeholder="Klik untuk memilih Kelas Rawat..." style='color:#000000;'>
																	<option value="">-- Pilih Kelas Rawat --</option>
																		<?php
																		foreach($kelas as $kr){
																		echo '<option value="'.$kr->kode_kelas.'">'.$kr->nama_kelas.'</option>';
																		}
																		?>
																	</select>
																</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Kamar:</label>
			
																<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	<select class="select2" id="kamar" name="kamar" data-placeholder="Klik untuk memilih Kamar..." style='color:#000000;'>
																	<option value="">-- Pilih Kamar --</option>
																	</select>
																</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tempat Tidur:</label>
			
																<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	<select class="select2" id="tt" name="tt" data-placeholder="Klik untuk memilih Tempat Tidur..." style='color:#000000;'>
																	<option value="">-- Pilih Tempat Tidur --</option>
																	</select>
																</div>
																</div>
															</div>
															
														</div>
											</div>
									</form>
								</div>
								

								<hr />
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
	
		$('[data-rel=tooltip]').tooltip();
	
		$('.select2').css('width','300px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		}); 
		
		$("#ruang").change(function (){
			if($('#noreg').val()==""){
				$("#mapingruang").val("");
				$("#ruang").val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
				bootbox.alert("Data pasien tidak boleh kosong...");
				document.pendaftaran.noreg.focus();
				return false;
        	}
				var ruang = $("#ruang").val(); 
				$("#mapingruang").val("");
				$('#kelasrawat').val("");
				$('#kamar').val("");
				$('#tt').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
				
			$.ajax({ 
				type	: 'POST',
				url		: "<?php echo base_url().'pendaftaran/ruangmaping'; ?>", 
				data	: "ruang="+ruang, 
				dataType: "JSON", 
				success	: function(data){ 
					console.log(data)
					if(data.MESSAGE=="OK"){
						$("#mapingruang").val(data.MAPING);
						var url = "<?php echo site_url('pendaftaran/add_ajax_kamar');?>/"+$("#kelasrawat").val()+"/"+ruang;
						$('#kamar').load(url);
						
						var url2 = "<?php echo site_url('pendaftaran/add_ajax_tt');?>/"+$('#kamar').val();
						$('#tt').load(url2);
						return false;
					} 
				}
			}); 
			
		});
		
		$("#kelasrawat").change(function (){
			if($('#noreg').val()==""){
				$('#kelasrawat').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
				bootbox.alert("Data pasien tidak boleh kosong...");
				document.pendaftaran.noreg.focus();
				return false;
        	}
				$('#kamar').val("");
				$('#tt').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
				
				var url = "<?php echo site_url('pendaftaran/add_ajax_kamar');?>/"+$(this).val()+"/"+$("#ruang").val();
				$('#kamar').load(url);
				
				var url2 = "<?php echo site_url('pendaftaran/add_ajax_tt');?>/"+$('#kamar').val();
				$('#tt').load(url2);
				return false;
			
        });
		
		$("#kamar").change(function (){
			if($('#noreg').val()==""){
				$('#kamar').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
				bootbox.alert("Data pasien tidak boleh kosong...");
				document.pendaftaran.noreg.focus();
				return false;
        	}
			
			var kamar = $('#kamar').val();
			$.ajax({ 
				type	: 'POST',
				url		: "<?php echo base_url().'pendaftaran/cek_kamar'; ?>", 
				data	: "kamar="+kamar, 
				dataType: "JSON", 
				success	: function(data){ 
					if(kamar == '33' || kamar == '34' || kamar == '71' || kamar == '108' || kamar == '127' || kamar == '35' || kamar == '49' || kamar == '57' || kamar == '72' || kamar == '122' || kamar == '32' || kamar == '48' || kamar == '56' || kamar == '70' || kamar == '121' || kamar == '126' || kamar == '128' || kamar == '130' || kamar == '131'){
						
						if((parseInt(data.JUMTOT) >= parseInt(data.JUMBED)) && (parseInt(data.JUMBED) != 0)){
							$('#kamar').val("");
							$('.select2').css('width','300px').select2({allowClear:true})
							.on('change', function(){
								$(this).closest('form').validate().element($(this));
							});
							bootbox.alert("Kamar sudah penuh");
							return false;
						}else{
							return true;
						}
						
					}else{
						if(data.JUML > 0 && $('#jenkel').val() == "P"){
							$('#kamar').val("");
							$('.select2').css('width','300px').select2({allowClear:true})
							.on('change', function(){
								$(this).closest('form').validate().element($(this));
							});
							bootbox.alert("Kamar sudah terisi pasien laki-laki");
							return false;
						}else if(data.JUMP > 0 && $('#jenkel').val() == "L"){
							$('#kamar').val("");
							$('.select2').css('width','300px').select2({allowClear:true})
							.on('change', function(){
								$(this).closest('form').validate().element($(this));
							});
							bootbox.alert("Kamar sudah terisi pasien perempuan");
							return false;
						}else if((parseInt(data.JUMTOT) >= parseInt(data.JUMBED)) && (parseInt(data.JUMBED) != 0)){
							$('#kamar').val("");
							$('.select2').css('width','300px').select2({allowClear:true})
							.on('change', function(){
								$(this).closest('form').validate().element($(this));
							});
							bootbox.alert("Kamar sudah penuh");
							return false;
						}else{
							return true;
						}
					} 
				}
			});
				$('#tt').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
				
				var url = "<?php echo site_url('pendaftaran/add_ajax_tt');?>/"+$(this).val();
				$('#tt').load(url);
				return false;
			
        });
		
		$('#daftar').on('click', function(){
			var a = $('#noreg').val();
			$.ajax({
				type : 'POST',
				url : '<?php echo base_url().'pendaftaran/cek_inap'; ?>',
				data :  'noreg='+ a,
				success : function(data){
				var response =  eval("(" + data + ")");
					if(response.MESSAGE=="OK"){
						if($('#noreg').val()==""){
							bootbox.alert("Data pasien tidak boleh kosong...");
							document.pendaftaran.noreg.focus();
							return false;
						}
						if($('#code').val()==""){
							bootbox.alert("Silahkan pilih code icd...");
							document.pendaftaran.code.focus();
							return false;
						}
						if($('#dokter').val()==""){
							bootbox.alert("Silahkan pilih Dokter Pengirim...");
							document.pendaftaran.dokter.focus();
							return false;
						}
						if($('#ruang').val()==""){
							bootbox.alert("Silahkan pilih Ruang Rawat...");
							document.pendaftaran.ruang.focus();
							return false;
						}

						/**
						if($('#kelasrawat').val()==""){
							bootbox.alert("Silahkan pilih Kelas Rawat...");
							document.pendaftaran.kelasrawat.focus();
							return false;
						}
						if($('#kamar').val()==""){
							bootbox.alert("Silahkan pilih Kamar Rawat...");
							document.pendaftaran.kamar.focus();
							return false;
						}
						if($('#tt').val()==""){
							bootbox.alert("Silahkan pilih Tempat Tidur Rawat...");
							document.pendaftaran.tt.focus();
							return false;
						}
						*/
						
						if(confirm('Apa anda yakin melanjutkan proses pendaftaran...?')){
							document.pendaftaran.submit();
							window.location=("<?php echo base_url('pendaftaran/list_rawatinap');?>");
							return true;
						}
					}else{
						bootbox.alert(response.MESSAGE);
					}
				},
				error:function(xhr, ajaxOptions, thrownError){
					alert('Error Function : '+thrownError);
				}
			});
		
		});
	
		$('#noreg').keydown(function(e){
            if($(this).val() !== ""){
                if(e.keyCode==13){
                    $('#cari').click();
                }
            }
        })
		
		$('#cari').click(function(){
			$("#ruang").val("");
			$("#mapingruang").val("");
			$('#kelasrawat').val("");
			$('#kamar').val("");
			$('#tt').val("");
			$('.select2').css('width','300px').select2({allowClear:true})
			.on('change', function(){
				$(this).closest('form').validate().element($(this));
			});
				
			var btn = $(this);
			btn.button('loading')
			
			var no_reg = $("#noreg").val(); 
	 
			$.ajax({ 
				type	: 'POST',
				url		: "<?php echo base_url().'pendaftaran/noreg_pasien'; ?>", 
				data	: "noreg="+no_reg, 
				dataType: "JSON", 
				success	: function(data){ 
					console.log(data)
					if(data.MESSAGE=="OK"){
						$("#ktp").val(data.KTP);
						$("#nomr").val(data.NOMR);
						$("#nama").val(data.NAMA);
						$("#ttl").val(data.TL + ", " + data.TGLL);
						$("#jk").val(data.JK);
						$("#jenkel").val(data.JENKEL);
						$("#poli").val(data.POLI);
						$("#kdpoli").val(data.KDPOLI);
						$("#stts").val(data.BAYAR);
						$('#tahap').removeClass('hide');
						btn.button('reset')
					}else{
						$("#ktp").val("");
						$("#nomr").val("");
						$("#nama").val("");
						$("#ttl").val("");
						$("#jk").val("");
						$("#jenkel").val("");
						$("#poli").val("");
						$("#kdpoli").val("");
						$("#stts").val("");
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

	$('#diagnosa').autocomplete({
            serviceUrl: "<?php echo base_url().'pendaftaran/get_diag'; ?>",
			onSelect: function (suggestion) {
			  $('#code').val(suggestion.code);
          	}
        });
		
	$('#code').autocomplete({
            serviceUrl: "<?php echo base_url().'pendaftaran/get_code'; ?>",
			onSelect: function (suggestion) {
			  $('#diagnosa').val(suggestion.diagnosa);
          	}
        });
		
	});
</script>