<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('radiologi/pemeriksaan');?>">Home</a>
				</li>
				<li class="active">Pemeriksaan Pasien</li>
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
									<form class="form-horizontal" id="pemeriksaan" name="pemeriksaan" action="<?php echo base_url('radiologi/simpanrad') ?>" method="POST" target="_blank">
										<div class="row">
												<div class="col-sm-6">
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">No Foto:</label>
																<div class="col-xs-6 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="nofoto" id="nofoto" class="limited col-xs-12 col-sm-6" style='color:#000000;'/>
																	</div>
																</div>
															</div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">No Registrasi:</label>
																<div class="col-xs-6 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="noreg" id="noreg" class="limited col-xs-12 col-sm-6" maxlength="10" style='color:#000000;'/>
																		<button id="cari" name="cari" type="button" class="btn btn-primary btn-sm" data-toggle="button" data-loading-text="Loading...">
																		<i class="ace-icon glyphicon glyphicon-search "></i>
																		</button>
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
																		<input type="text" name="jk" id="jk" class="col-xs-12 col-sm-5" style='color:#000000;' readonly/>
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
																		echo '<option value="'.$baca->id_foto.'">'.$baca->foto.'</option>';
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
																		<input type="text" name="tglorder" id="tglorder" class="date-picker" data-date-format="yyyy/mm/dd" value="<?php echo date("Y/m/d"); ?>" style='color:#000000;'  readonly/>
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
																		<input type="text" name="tglreg" id="tglreg" class="date-picker" data-date-format="yyyy/mm/dd" value="<?php echo date("Y/m/d"); ?>" style='color:#000000;' readonly/>
																	<span class="input-group-addon">
																		<i class="ace-icon fa fa-calendar"></i>
																	</span>
																	</div>
																</div>
															</div>
															
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">RS Pengirim:</label>
			
																<div class="col-xs-12 col-sm-7">
																<div class="clearfix">
																	<select class="select2" id="rs" name="rs" data-placeholder="Klik untuk memilih Rumah Sakit..." style='color:#000000;'>
														</select>
																</div>
																</div>
																<div class="col-xs-2 col-sm-2">
																	<div class="clearfix">
																	<button id="tm_rs" name="tm_rs" type="button" class="btn btn-primary btn-sm" data-toggle="button">
																	<i class="ace-icon glyphicon glyphicon-plus "></i>
																	</button>
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
																		echo '<option value="'.$pol->grId.'">'.$pol->grNama.'</option>';
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
																		echo '<option value="'.$dok->nama_dokter.'">'.$dok->nama_dokter.'</option>';
																		}
																		?>
																	</select>
																</div>
																<div class="clearfix hide" id="f_dokter_luar">	
																	<input type="text" name="dokter_luar" id="dokter_luar" class="col-xs-12 col-sm-9" style='color:#000000;'/>
																</div>
																</div>
															</div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Diagnosa Klinis:</label>
			
																<div class="col-xs-12 col-sm-7">
																<div class="clearfix">
																	<select class="select2" id="dk" name="dk" data-placeholder="Klik untuk memilih Diagnosa Klinis..." style='color:#000000;'>
																	</select>
																</div>
																</div>
																<div class="col-xs-2 col-sm-2">
																	<div class="clearfix">
																	<button id="tm_dk" name="tm_dk" type="button" class="btn btn-primary btn-sm" data-toggle="button">
																	<i class="ace-icon glyphicon glyphicon-plus "></i>
																	</button>
																	</div>
																</div>
															</div>
													</div>
													<div class="col-sm-9">
															<div id="bacaan"></div>
													</div>
											</div>
									</form>
								</div>
								

								<hr />
								<div class="wizard-actions hide" id="tahap">
									<button class="btn btn-primary" name="daftar" id="daftar" class="daftar">
										HASIL PEMERIKSAAN
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
<div id="modal-rs" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                    <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <span class="white">&times;</span>
                            </button>
                            TAMBAH DATA RUMAH SAKIT
                    </div>
            </div>

            <div class="modal-body no-padding">
			<br />
                <form class="form-horizontal">
					<div class="row">
						<div class="col-sm-12">
							
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-left">Rumah Sakit :</label>
								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="rm_sakit" id="rm_sakit" class="col-xs-12 col-sm-8" onkeyup="this.value = this.value.toUpperCase()" style='color:#000000;' />
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</form>
            </div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-primary" data-dismiss="modal" name="sm_rs" id="sm_rs">
					<i class="ace-icon fa fa-check"></i>
					Save
				</button>
			</div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div id="modal-dk" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                    <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <span class="white">&times;</span>
                            </button>
                            TAMBAH DATA DIAGNOSA KLINIS
                    </div>
            </div>

            <div class="modal-body no-padding">
			<br />
                <form class="form-horizontal">
					<div class="row">
						<div class="col-sm-12">
							
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-left">Diagnosa Klinis :</label>
								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="diagnosa" id="diagnosa" class="col-xs-12 col-sm-8" onkeyup="this.value = this.value.toUpperCase()" style='color:#000000;' />
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</form>
            </div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-primary" data-dismiss="modal" name="sm_dk" id="sm_dk">
					<i class="ace-icon fa fa-check"></i>
					Save
				</button>
			</div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
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
	
		$('.select2').css('width','310px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		});
		
		$('#tm_rs').click(function(){
			$('#rm_sakit').val("");
			$('#modal-rs').modal('show');
		});
		
		$('#tm_dk').click(function(){
			$('#diagnosa').val("");
			$('#modal-dk').modal('show');
		});
		
		$('#sm_rs').click(function(){
			var rs 		= $('#rm_sakit').val();
			if(rs ==""){
				alert("Data tidak dapat disimpan karena masih kosong...");
				return false;
			}
			$.ajax({
                type : "POST",
                url  : "<?php echo base_url().'radiologi/simpan_rs'; ?>",
                data : "rSakit="+rs,
                success:function(data){
                    var url = "<?php echo site_url('radiologi/add_ajax_rs');?>";
					$('#rs').load(url);
                },
                error:function(xhr, ajaxOptions, thrownError){
                    alert('Error Function : '+thrownError);
                }
            });
		});
		
		$('#sm_dk').click(function(){
			var dk 		= $('#diagnosa').val();
			if(dk ==""){
				alert("Data tidak dapat disimpan karena masih kosong...");
				return false;
			}
			$.ajax({
                type : "POST",
                url  : "<?php echo base_url().'radiologi/simpan_dk'; ?>",
                data : "dKlinis="+dk,
                success:function(data){
                    var url = "<?php echo site_url('radiologi/add_ajax_dk');?>";
					$('#dk').load(url);
                },
                error:function(xhr, ajaxOptions, thrownError){
                    alert('Error Function : '+thrownError);
                }
            });
		});
		
		$('#daftar').on('click', function(){
		
			var nofoto = $("#nofoto").val(); 
	 
			$.ajax({ 
				type	: 'POST',
				url		: "<?php echo base_url().'radiologi/no_foto'; ?>", 
				data	: "nofoto="+nofoto, 
				dataType: "JSON", 
				success	: function(data){ 
					console.log(data)
					if(data.MESSAGE=="OK"){
						if($('#nofoto').val()==""){
							bootbox.alert("No Foto tidak boleh kosong...");
							document.pemeriksaan.nofoto.focus();
							return false;
						}
						if($('#noreg').val()==""){
							bootbox.alert("Data pasien tidak boleh kosong...");
							document.pemeriksaan.noreg.focus();
							return false;
						}
						if($('#rs').val()==""){
							bootbox.alert("Silahkan pilih Instansi Pengirim...");
							document.pemeriksaan.rs.focus();
							return false;
						}
						if($('#foto').val()==""){
							bootbox.alert("Silahkan pilih Foto Bacaan...");
							document.pemeriksaan.foto.focus();
							return false;
						}
						
						if(confirm('Apa anda yakin ingin memproses data...?')){
							document.pemeriksaan.submit();
							window.location=("<?php echo base_url('radiologi/pemeriksaan');?>");
							return true;
						}
					}else{
                        bootbox.alert(data.MESSAGE);
                    } 
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
			var btn = $(this);
			btn.button('loading')
			
			var no_reg = $("#noreg").val(); 
	 
			$.ajax({ 
				type	: 'POST',
				url		: "<?php echo base_url().'radiologi/noreg_pasien'; ?>", 
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
						$('#tahap').removeClass('hide');
						
						var start	= new Date(data.TGLL);
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
			
						btn.button('reset')
					}else{
						$("#ktp").val("");
						$("#nomr").val("");
						$("#nama").val("");
						$("#ttl").val("");
						$("#jk").val("");
						$('#umur').val("");
						btn.button('reset')
                        bootbox.alert(data.MESSAGE);
                    } 
				}
			}); 
		});
		
		$('#rs').on('change', function(){
			if($('#rs').val()=="1" ){
				$('#f_poli').removeClass('hide');
				$('#f_dokter').removeClass('hide');
				$('#f_dokter_luar').addClass('hide');
				$('#dokter_luar').val("");
				$('.select2').css('width','310px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
			}else{
				$('#f_poli').addClass('hide');
				$('#f_dokter').addClass('hide');
				$('#f_dokter_luar').removeClass('hide');
				$('#poli').val("");
				$('#dokter').val("");
				$('.select2').css('width','310px').select2({allowClear:true})
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
			
			var url = "<?php echo site_url('radiologi/add_ajax_rs');?>";
			$('#rs').load(url);
			
			var url = "<?php echo site_url('radiologi/add_ajax_dk');?>";
			$('#dk').load(url);
		}
		
	});
</script>