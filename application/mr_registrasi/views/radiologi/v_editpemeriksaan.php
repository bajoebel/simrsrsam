<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo $edit['id_tr_rad']; ?>">Home</a>
				</li>
				<li class="active">Edit Pemeriksaan Pasien</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1>
					PEMERIKSAAN PASIEN RADIOLOGI
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<div class="widget-box">
						<div class="widget-body">
							<div class="widget-main">
							
								<div id="fuelux-wizard-container">
									<form class="form-horizontal" id="editpemeriksaan" name="editpemeriksaan" action="<?php echo base_url('radiologi/editrad') ?>" method="POST">
										<input type="hidden" name="tgll" id="tgll" class="col-xs-12 col-sm-5" value="<?php echo $edit['tgl_lahir']; ?>"/>
										<?php
											if($edit['jns_kelamin'] == "L"){
												$jk = "LAKI - LAKI";
											}else{
												$jk = "PEREMPUAN";
											}
										?>
										<div class="row">
												<div class="col-sm-6">
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">No Foto:</label>
																<div class="col-xs-6 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="nofoto" id="nofoto" class="limited col-xs-12 col-sm-6" style='color:#000000;' value="<?php echo $edit['id_tr_rad']; ?>" readonly/>
																	</div>
																</div>
															</div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">No Registrasi:</label>
																<div class="col-xs-6 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="noreg" id="noreg" class="limited col-xs-12 col-sm-6" maxlength="10" style='color:#000000;' value="<?php echo $edit['id_daftar']; ?>" readonly/>
																	</div>
																</div>
															</div>
			
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">No MR:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="nomr" id="nomr" class="col-xs-12 col-sm-3" style='color:#000000;' value="<?php echo $edit['nomr']; ?>" readonly/>
																		<input type="text" name="nama" id="nama" class="col-xs-12 col-sm-9" style='color:#000000;' value="<?php echo $edit['nama']; ?>" readonly/>
																	</div>
																</div>
															</div>
			
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tempat/Tgl Lahir:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="ttl" id="ttl" class="col-xs-12 col-sm-11" style='color:#000000;' value="<?php echo $edit['tempat_lahir'].", ".$edit['tgl_lahir']; ?>" readonly/>
																	</div>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Umur:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="umur" id="umur" class="col-xs-12 col-sm-9" style='color:#000000;' readonly/>
																	</div>
																</div>
															</div>
			
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Jenis Kelamin:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="jk" id="jk" class="col-xs-12 col-sm-5" style='color:#000000;' value="<?php echo $jk; ?>" readonly/>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Bacaan Foto:</label>
			
																<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	<select class="select2" id="foto" name="foto" data-placeholder="Klik untuk memilih Bacaan Foto..." style='color:#000000;'>
																	<option value="">-- Pilih Bacaan Foto --</option>
																		<?php
																		foreach($bacaan as $baca){
																		?>
																		<option value="<?php echo $baca->id_foto; ?>" <?php if($edit['id_foto']== $baca->id_foto) echo "selected"; ?>> <?php echo $baca->foto; ?> </option>
																		<?php
																		}
																		?>
																	</select>
																</div>
																</div>
															</div>
													</div>
													<div class="col-sm-6">
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tgl Order:</label>
			
																<div class="col-xs-12 col-sm-2">
																	<div class="input-group">
																		<input type="text" name="tglorder" id="tglorder" class="date-picker" data-date-format="yyyy/mm/dd" value="<?php echo $edit['tanggal_order']; ?>" style='color:#000000;'  readonly/>
																	<span class="input-group-addon">
																		<i class="ace-icon fa fa-calendar"></i>
																	</span>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tgl Periksa:</label>
			
																<div class="col-xs-12 col-sm-2">
																	<div class="input-group">
																		<input type="text" name="tglreg" id="tglreg" class="date-picker" data-date-format="yyyy/mm/dd" value="<?php echo $edit['tanggal_diagnosa']; ?>" style='color:#000000;' readonly/>
																	<span class="input-group-addon">
																		<i class="ace-icon fa fa-calendar"></i>
																	</span>
																	</div>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">RS Pengirim:</label>
			
																<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	<select class="select2" id="rs" name="rs" style='color:#000000;'>
																		<?php
																		foreach($instansi as $rs){
																		?>
																		<option value="<?php echo $rs->id_instansi; ?>" <?php if($rs->id_instansi == $edit['id_instansi']) echo "selected"; ?> > <?php echo $rs->nama_instansi; ?></option>
																		<?php
																		}
																		?>
																	</select>
																</div>
																</div>
															</div>
															
															<div class="form-group hide" id="f_poli">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Poli / Ruang:</label>
			
																<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	<select class="select2" id="poli" name="poli" data-placeholder="Klik untuk memilih Poli/Ruang Rawat..." style='color:#000000;'>
																	<option value="">-- Pilih Ruang Rawat --</option>
																		<?php
																		foreach($poli as $pol){
																		?>
																		
																		<option value="<?php echo $pol->grId; ?>" <?php if($edit['grId']== $pol->grId) echo "selected"; ?>><?php echo $pol->grNama; ?></option>
																		<?php
																		}
																		?>
																	</select>
																</div>
																</div>
															</div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Dokter Pengirim:</label>
			
																<div class="col-xs-12 col-sm-9">
																<div class="clearfix hide" id="f_dokter">
																	<select class="select2" id="dokter" name="dokter" data-placeholder="Klik untuk memilih Dokter..." style='color:#000000;'>
																	<option value="">-- Pilih Dokter --</option>
																		<?php
																		foreach($dokter as $dok){
																		?>
																		<option value="<?php echo $dok->nama_dokter; ?>" <?php if($edit['dokter_meminta']== $dok->nama_dokter) echo "selected"; ?>><?php echo $dok->nama_dokter; ?></option>
																		<?php
																		}
																		?>
																	</select>
																</div>
																<div class="clearfix hide" id="f_dokter_luar">	
																	<input type="text" name="dokter_luar" id="dokter_luar" class="col-xs-12 col-sm-9" style='color:#000000;' value="<?php echo $edit['dokter_meminta']; ?>"/>
																</div>
																</div>
															</div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Diagnosa Klinis:</label>
			
																<div class="col-xs-12 col-sm-9">
																<div class="clearfix">
																	<select class="select2" id="dk" name="dk" style='color:#000000;'>
																	<?php
																		foreach($diagnosa as $dk){
																		?>
																		<option value="<?php echo $dk->id_diagnosa; ?>" <?php if($dk->id_diagnosa == $edit['id_diagnosa']) echo "selected"; ?> > <?php echo $dk->diagnosa_klinis; ?></option>
																	<?php
																	}
																	?>
																	</select>
																</div>
																</div>
															</div>
													</div>
													<div class="col-sm-9">
															<div id="bacaan"></div>
													</div>
											</div>
									
								</div>
								

								<hr />
								<div class="wizard-actions">
									<a href="<?php echo base_url('radiologi/list_pemeriksaan');?>" class="btn btn-default">
										CANCEL
									</a>
									<button class="btn btn-primary" name="edit" id="edit">
										EDIT
									</button>
								</div>
								</form>
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
		
		$('#edit').on('click', function(){
			
			if($('#rs').val()==""){
				bootbox.alert("Silahkan pilih Instansi Pengirim...");
				document.editpemeriksaan.rs.focus();
				return false;
        	}
			if($('#foto').val()==""){
				bootbox.alert("Silahkan pilih Foto Bacaan...");
				document.editpemeriksaan.foto.focus();
				return false;
        	}
			
			if(confirm('Apakah anda yakin ingin mengubah data pemeriksaan...?')){
				document.editpemeriksaan.submit();
				return true;
            }
		
		});
	
		$('#rs').on('change', function(){
			if($('#rs').val()=="1" ){
				$('#f_poli').removeClass('hide');
				$('#f_dokter').removeClass('hide');
				$('#f_dokter_luar').addClass('hide');
				$('#dokter_luar').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
			}else{
				$('#f_poli').addClass('hide');
				$('#f_dokter').addClass('hide');
				$('#f_dokter_luar').removeClass('hide');
				$('#poli').val("");
				$('#dokter').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
			}
		
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
		
		window.onload=function(){
			$('#f_poli').removeClass('hide');
			$('#f_dokter').removeClass('hide');
			
			var start	= new Date($('#tgll').val());
			var end		= new Date();
			var diff	= new Date(end - start);
			var year1	= start.getFullYear();
			var year2	= end.getFullYear();
			var month1	= start.getMonth();
			var month2	= end.getMonth();
			if(month1===0){
			month1++;
			month2++;
			}
			
			var month = (year2 - year1) * 12 + (month2 - month1);
			var tahun = parseInt(month / 12);
			var bulan = month - (tahun * 12);
			
			$('#umur').val(tahun +" Tahun "+ bulan +" Bulan ");
			
			if($('#rs').val()=="1" ){
				$('#f_poli').removeClass('hide');
				$('#f_dokter').removeClass('hide');
				$('#f_dokter_luar').addClass('hide');
				$('#dokter_luar').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
			}else{
				$('#f_poli').addClass('hide');
				$('#f_dokter').addClass('hide');
				$('#f_dokter_luar').removeClass('hide');
				$('#poli').val("");
				$('#dokter').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
			}
			
			var url = "<?php echo site_url('radiologi/add_edit_bacaan');?>/"+$("#nofoto").val();
			$('#bacaan').load(url);
		}
		
	});
</script>