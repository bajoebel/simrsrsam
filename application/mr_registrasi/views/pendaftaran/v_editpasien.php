<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo $edit['nomr']; ?>">Home</a>
				</li>
				<li class="active">Edit Data <?php echo $edit['nama']; ?></li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1>
					EDIT DATA PASIEN
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<div class="widget-box">
						<div class="widget-body">
							<div class="widget-main">
							
								<div id="fuelux-wizard-container">
									<form class="form-horizontal" id="editpasien" name="editpasien" action="<?php echo base_url('pendaftaran/updatepasien') ?>" method="POST">
									<div class="step-content pos-rel">
										<div class="step-pane active">
												<div class="form-group">
												<input type="hidden" name="nomr" id="nomr" class="col-xs-12 col-sm-5" value="<?php echo $edit['nomr']; ?>"/>
												<input type="hidden" name="kabupaten" id="kabupaten" class="col-xs-12 col-sm-5" value="<?php echo $edit['id_kab_kota']; ?>"/>
												<input type="hidden" name="kecamatan" id="kecamatan" class="col-xs-12 col-sm-5" value="<?php echo $edit['id_kecamatan']; ?>"/>
												<input type="hidden" name="kelurahan" id="kelurahan" class="col-xs-12 col-sm-5" value="<?php echo $edit['id_kelurahan']; ?>"/>
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">No KTP:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="noktp" id="noktp" class="col-xs-12 col-sm-5" onkeypress="return hanyaAngka(event)" value="<?php echo $edit['no_ktp']; ?>" style='color:#000000;'/>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Nama Pasien:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="nama" id="nama" class="col-xs-12 col-sm-5" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $edit['nama']; ?>" style='color:#000000;'/>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Tempat Lahir:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="tl" id="tl" class="col-xs-12 col-sm-5" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $edit['tempat_lahir']; ?>" style='color:#000000;'/>
														</div>
													</div>
													
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Tgl Lahir:</label>

														<div class="col-xs-6 col-sm-2">
															<div class="input-group">
																<input type="text" name="tgll" id="tgll" class="date-picker" data-date-format="yyyy-mm-dd" value="<?php echo $edit['tgl_lahir']; ?>" style='color:#000000;'/>
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-calendar"></i>
																</span>
															</div>
														</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Umur:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" placeholder="0 Tahun 0 Bulan" name="umur" id="umur" class="col-xs-12 col-sm-3" style='color:#000000;' disabled />
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Jenis Kelamin:</label>

													<div class="col-xs-12 col-sm-9">
														<div>
															<label class="line-height-1 blue">
																<input name="jk" value="L" type="radio" class="ace" <?php if($edit['jns_kelamin']=="L") echo "checked"; ?>/>
																<span class="lbl"> Laki-laki</span>
															</label>
														</div>

														<div>
															<label class="line-height-1 blue">
																<input name="jk" value="P" type="radio" class="ace" <?php if($edit['jns_kelamin']=="P") echo "checked"; ?>/>
																<span class="lbl"> Perempuan</span>
															</label>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right" for="name">Agama:</label>

													<div class="col-xs-12 col-sm-2">
														<div class="clearfix">
															<select id="agama" name="agama" class="col-xs-12 col-sm-12" style='color:#000000;'>
																<option value="">------------------</option>
																<?php
																foreach($agama as $ag){
																?>
																<option value="<?php echo $ag->id_agama; ?>" <?php if($edit['id_agama']== $ag->id_agama) echo "selected"; ?>><?php echo $ag->agama; ?></option>
																<?php
																}
																?>
															</select>
														</div>
													</div>
													
													<label class="control-label col-xs-12 col-sm-1 no-padding-right" for="name">Etnis:</label>

													<div class="col-xs-12 col-sm-4">
														<div class="clearfix">
															<select id="etnis" name="etnis" class="select2" data-placeholder="Pilih Etnis..." style='color:#000000;'>
																<option value="">------------------</option>
																<?php
																foreach($etnis as $et){
																?>
																<option value="<?php echo $et->id_etnis; ?>" <?php if($edit['id_etnis']== $et->id_etnis) echo "selected"; ?>><?php echo $et->nama_etnis; ?></option>
																<?php
																}
																?>
															</select>
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right" for="name">Bahasa:</label>

													<div class="col-xs-12 col-sm-3">
														<div class="clearfix">
															<select id="bahasa" name="bahasa" class="select2" data-placeholder="Pilih Bahasa..." style='color:#000000;'>
																<option value="">------------------</option>
																<?php
																foreach($bahasa as $lg){
																?>
																<option value="<?php echo $lg->id_bahasa; ?>" <?php if($edit['id_bahasa']== $lg->id_bahasa) echo "selected"; ?>><?php echo $lg->nama_bahasa; ?></option>
																<?php
																}
																?>
															</select>
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Keterbatasan Bahasa:</label>

													<div class="col-xs-12 col-sm-5">
														<div>
															<label class="line-height-1 blue">
																<input name="batas" value="1" type="radio" class="ace" <?php if($edit['hambatan_bahasa']=="1") echo "checked"; ?>/>
																<span class="lbl"> Ya</span>
															</label>
														</div>

														<div>
															<label class="line-height-1 blue">
																<input name="batas" value="2" type="radio" class="ace" <?php if($edit['hambatan_bahasa']=="2") echo "checked"; ?>/>
																<span class="lbl"> Tidak</span>
															</label>
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right" for="name">Pendidikan:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<select id="pdd" name="pdd" class="select2" data-placeholder="Tingkat pendidikan..." style='color:#000000;'>
																<option value="">------------------</option>
																<?php
																foreach($pendidikan as $pdd){
																?>
																<option value="<?php echo $pdd->id_tk_pddkn; ?>" <?php if($edit['id_tk_pddkn']== $pdd->id_tk_pddkn) echo "selected"; ?>><?php echo $pdd->nama_tk_pddkn; ?></option>
																<?php
																}
																?>
															</select>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right" for="name">Pekerjaan:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" id="pekerjaan" name="pekerjaan" class="col-xs-12 col-sm-5" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $edit['pekerjaan']; ?>" style='color:#000000;'/>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right" for="phone">Telephone:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="ace-icon fa fa-phone"></i>
															</span>

															<input type="text" id="telp1" name="telp1" onkeypress="return hanyaAngka(event)" value="<?php echo $edit['no_telpon']; ?>" style='color:#000000;'/>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Kewarganegaraan:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<select id="kwn" name="kwn" class="col-xs-12 col-sm-2">
																<option value="" <?php if(empty($edit['id_negara']) && $edit['id_provinsi']=="0") echo "selected"; ?>>------------------</option>
																<option value="WNI" <?php if(empty($edit['id_negara']) && $edit['id_provinsi']!="0") echo "selected"; ?>>WNI</option>
																<option value="WNA" <?php if(!empty($edit['id_negara']) && $edit['id_provinsi']="0") echo "selected"; ?>>WNA</option>
															</select>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div id="wna" class="hide">
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right" for="state">Negara:</label>

													<div class="col-xs-12 col-sm-9">
														<select id="negara" name="negara" class="select2" data-placeholder="Klik untuk memilih Negara..." style='color:#000000;'>
															<option value="">Klik untuk memilih Negara...</option>
															<?php
															foreach($negara as $neg){
															?>
															<option value="<?php echo $neg->id_negara; ?>" <?php if($edit['id_negara']== $neg->id_negara) echo "selected"; ?>><?php echo $neg->nama_negara; ?></option>
															<?php
															}
															?>
														</select>
													</div>
												</div>
												</div>
												
												<div class="space-2"></div>
												
												<div id="almt" class="hide">
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Alamat:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<textarea class="col-xs-12 col-sm-6 limited" name="alamat" id="alamat" maxlength="50" onkeyup="this.value = this.value.toUpperCase()" style='color:#000000;'><?php echo $edit['alamat']; ?></textarea>
														</div>
													</div>
												</div>
												</div>

												<div class="space-2"></div>
												
												<div id="wni" class="hide">
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right" for="state">Provinsi:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
														<select class="select2" id="provinsi" name="provinsi" data-placeholder="Klik untuk memilih Provinsi..." style='color:#000000;'>
															<option value="">Klik untuk memilih Provinsi...</option>
															<?php
															foreach($provinsi as $prov){
															?>
                                                            <option value="<?php echo $prov->id_provinsi; ?>" <?php if($edit['id_provinsi']== $prov->id_provinsi) echo "selected"; ?>><?php echo $prov->nama_provinsi; ?></option>
															<?php
															}
															?>
														</select>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right" for="state">Kota/Kabupaten:</label>
													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
														<select class="select2" id="kota" name="kota" data-placeholder="Klik untuk memilih Kota/Kabupaten..." style='color:#000000;'>
                                                            <option value="<?php echo $edit['id_kab_kota']; ?>"><?php echo $edit['nama_kab_kota']; ?></option>
														</select>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right" for="state">Kecamatan:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
														<select class="select2" id="kec" name="kec" data-placeholder="Klik untuk memilih Kecamatan..." style='color:#000000;'>
														<option value="<?php echo $edit['id_kecamatan']; ?>"><?php echo $edit['nama_kecamatan']; ?></option>
														</select>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right" for="state">Desa/Kelurahan:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
														<select class="select2" id="desa" name="desa" data-placeholder="Klik untuk memilih Desa/Kelurahan..." style='color:#000000;'>
														<option value="<?php echo $edit['id_kelurahan']; ?>"><?php echo $edit['nama_kelurahan']; ?></option>
														</select>
														</div>
													</div>
												</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">No Kartu BPJS:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="nobpjs" id="nobpjs" class="col-xs-12 col-sm-5" onkeypress="return hanyaAngka(event)" value="<?php echo $edit['no_bpjs']; ?>" style='color:#000000;'/>
														</div>
													</div>
												</div>

												<div class="hr hr-dotted"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Penanggungjawab:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="tgjwb" id="tgjwb" class="col-xs-12 col-sm-5" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $edit['penanggung_jawab']; ?>" style='color:#000000;'/>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Telephone:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="ace-icon fa fa-phone"></i>
															</span>

															<input type="text" id="telp2" name="telp2" onkeypress="return hanyaAngka(event)" value="<?php echo $edit['no_penanggung_jawab']; ?>" style='color:#000000;'/>
														</div>
													</div>
												</div>
										</div>
									</div>
									</form>
								</div>
								

								<hr />
								<div class="wizard-actions">
									<a href="<?php echo base_url('pendaftaran/list_pasien');?>" class="btn btn-default">
										CANCEL
									</a>
									<button class="btn btn-primary" name="edit" id="edit" class="edit">
										EDIT
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
	  var charCode = (evt.which) ? evt.which : event.keyCode
	   if (charCode > 31 && (charCode < 48 || charCode > 57))

		return false;
	  return true;
	}
	
	jQuery(function($) {
	
		$('[data-rel=tooltip]').tooltip();
	
		 $('.select2').css('width','200px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		});
	
		$('#edit').on('click', function(){
				var lk = editpasien.jk[0].checked;
				var pr = editpasien.jk[1].checked;
			
				if($('#nama').val()==""){
					bootbox.alert("Nama pasien belum diisi...");
					document.editpasien.nama.focus();
					return false;
				}
				if($('#tl').val()==""){
					bootbox.alert("Tempat lahir belum diisi...");
					document.editpasien.tl.focus();
					return false;
				}
				if($('#tgll').val()==""){
					bootbox.alert("Tanggal lahir belum diisi...");
					document.editpasien.tgll.focus();
					return false;
				}
				if(lk==false && pr==false){
				bootbox.alert("Silahkan pilih jenis kelamin pasien...");
				return false;
				}
				if($('#agama').val()==""){
					bootbox.alert("Silahkan pilih agama pasien...");
					document.editpasien.agama.focus();
					return false;
				}
				if($('#pekerjaan').val()==""){
					bootbox.alert("Pekerjaan pasien belum diisi...");
					document.editpasien.pekerjaan.focus();
					return false;
				}
				if($('#telp1').val()==""){
					bootbox.alert("Telephone pasien belum diisi...");
					document.editpasien.telp1.focus();
					return false;
				}
				if($('#kwn').val()==""){
					bootbox.alert("Silahkan pilih kewarganegaraan pasien...");
					document.editpasien.kwn.focus();
					return false;
				}
				if($('#negara').val()=="" && $('#kwn').val()=="WNA"){
					bootbox.alert("Silahkan pilih negara pasien...");
					document.editpasien.negara.focus();
					return false;
				}
				if($('#alamat').val()==""){
					bootbox.alert("Alamat pasien belum diisi...");
					document.editpasien.alamat.focus();
					return false;
				}
				if($('#provinsi').val()=="" && $('#kwn').val()=="WNI"){
					bootbox.alert("Provinsi belum diisi...");
					document.editpasien.provinsi.focus();
					return false;
				}
				if($('#kota').val()=="" && $('#kwn').val()=="WNI"){
					bootbox.alert("Kota/Kabupaten belum diisi...");
					document.editpasien.alamat.focus();
					return false;
				}
				if($('#kec').val()=="" && $('#kwn').val()=="WNI"){
					bootbox.alert("Kecamatan belum diisi...");
					document.editpasien.alamat.focus();
					return false;
				}
				if($('#desa').val()=="" && $('#kwn').val()=="WNI"){
					bootbox.alert("Desa/Kelurahan belum diisi...");
					document.editpasien.desa.focus();
					return false;
				}
				if($('#tgjwb').val()==""){
					bootbox.alert("Penanggungjawab pasien belum diisi...");
					document.editpasien.tgjwb.focus();
					return false;
				}
				if($('#telp2').val()==""){
					bootbox.alert("Telephone penanggungjawab belum diisi...");
					document.editpasien.telp2.focus();
					return false;
				}
				if(confirm('Apa anda yakin melanjutkan edit data Pasien?')){
                document.editpasien.submit();
                return true;
            	}
		});
		
		$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
		});
		
		$('textarea.limited').inputlimiter({
			remText: '%n character%s remaining...',
			limitText: 'max allowed : %n.'
		});
		
		$('#kwn').on('change', function(){
			if($('#kwn').val()=="WNI" ){
                $('#wni').removeClass('hide');
                $('#almt').removeClass('hide');
				$('#wna').addClass('hide');
				$('#alamat').val("");
				$('#negara').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
			}else if($('#kwn').val()=="WNA" ){
				$('#wni').addClass('hide');
                $('#wna').removeClass('hide');
                $('#almt').removeClass('hide');
				$('#alamat').val("");
				$('#provinsi').val("");
				$('#kota').val("");
				$('#kec').val("");
				$('#desa').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
            }else{
				$('#wni').addClass('hide');
                $('#wna').addClass('hide');
                $('#almt').addClass('hide');
				$('#alamat').val("");
				$('#negara').val("");
				$('#provinsi').val("");
				$('#kota').val("");
				$('#kec').val("");
				$('#desa').val("");
            }
		});
		
		$('#provinsi').change(function(){
				$('#kota').val("");
				$('#kec').val("");
				$('#desa').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
		});
		
		$('#kota').change(function(){
				$('#kec').val("");
				$('#desa').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
		});
		
		$('#kec').change(function(){
				$('#desa').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
		});
		
		$('#tgll').on('change', function() {
			
			var start	= new Date(this.value);
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
			
        });
		
		window.onload=function(){
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
			
			if($('#kwn').val()=="WNI" ){
                $('#wni').removeClass('hide');
                $('#almt').removeClass('hide');
				$('#wna').addClass('hide');
			}else if($('#kwn').val()=="WNA" ){
				$('#wni').addClass('hide');
                $('#wna').removeClass('hide');
                $('#almt').removeClass('hide');
            }else{
				$('#wni').addClass('hide');
                $('#wna').addClass('hide');
                $('#almt').addClass('hide');
				$('#alamat').val("");
				$('#negara').val("");
				$('#provinsi').val("");
				$('#kota').val("");
				$('#kec').val("");
				$('#desa').val("");
            }
			
			var url1 = "<?php echo site_url('pendaftaran/add_ajax_kab');?>/"+$("#provinsi").val()+"/"+$("#kabupaten").val();
			$('#kota').load(url1);
			
			var url2 = "<?php echo site_url('pendaftaran/add_ajax_kec');?>/"+$("#kota").val()+"/"+$("#kecamatan").val();
			$('#kec').load(url2);
		
			var url3 = "<?php echo site_url('pendaftaran/add_ajax_des');?>/"+$("#kec").val()+"/"+$("#kelurahan").val();
			$('#desa').load(url3);
			
        }
		
		
	});
</script>