<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('pendaftaran/pendaftaran_baru');?>">Home</a>
				</li>
				<li class="active">Pendaftaran Pasien Baru</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1>
					PENDAFTARAN PASIEN BARU
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<div class="widget-box">
						<div class="widget-header widget-header-blue widget-header-flat">
							<h4 class="widget-title lighter">Pendaftaran Pasien Baru / Lama</h4>

							<div class="widget-toolbar">
								<label>
											<select id="status" name="status" class="col-xs-12 col-sm-12" style='color:#000000;'>
												<option value="2">PASIEN BARU</option>
												<option value="1">PENDAFTARAN</option>
											</select>
								</label>
							</div>
						</div>

						<div class="widget-body">
							<div class="widget-main">
							
								<div id="fuelux-wizard-container">
									<form class="form-horizontal" id="pendaftaran" name="pendaftaran" action="<?php echo base_url('pendaftaran/simpanbaru') ?>" method="POST" target="_blank">
									<input type="hidden" name="kabupaten" id="kabupaten" class="col-xs-12 col-sm-5" value="<?php echo $edit['id_kab_kota']; ?>"/>
									<input type="hidden" name="kecamatan" id="kecamatan" class="col-xs-12 col-sm-5" value="<?php echo $edit['id_kecamatan']; ?>"/>
									<input type="hidden" name="kelurahan" id="kelurahan" class="col-xs-12 col-sm-5" value="<?php echo $edit['id_kelurahan']; ?>"/>
									<input type="hidden" name="tujuan" id="tujuan" class="col-xs-12 col-sm-5" value="<?php echo $edit['grId']; ?>"/>
									<div class="step-content pos-rel">
										<div class="step-pane active">
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">No KTP:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="noktp" id="noktp" class="col-xs-12 col-sm-5" onkeypress="return hanyaAngka(event)" style='color:#000000;' value="<?php echo $edit['no_ktp']; ?>"/>
															<input type="text" name="booking" id="booking" class="col-xs-12 col-sm-3" maxlength="9" placeholder="Enter Kode Booking" style='color:#000000;' value="<?php echo $edit['kode_booking']; ?>"/>
														</div>
													</div>
													
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Nama Pasien:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="nama" id="nama" class="col-xs-12 col-sm-5" onkeyup="this.value = this.value.toUpperCase()" style='color:#000000;' value="<?php echo $edit['nama']; ?>"/>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Tempat Lahir:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="tl" id="tl" class="col-xs-12 col-sm-5" onkeyup="this.value = this.value.toUpperCase()" style='color:#000000;' value="<?php echo $edit['tempat_lahir']; ?>"/>
														</div>
													</div>
													
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Tgl Lahir:</label>

														<div class="col-xs-6 col-sm-2">
															<div class="input-group">
																<input type="text" name="tgll" id="tgll" class="date-picker" data-date-format="yyyy-mm-dd" style='color:#000000;' value="<?php echo $edit['tgl_lahir']; ?>" style='color:#000000;'/>
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
																<input name="jk" value="L" type="radio" class="ace jk" <?php if($edit['jns_kelamin']=="L") echo "checked"; ?>/>
																<span class="lbl"> Laki-laki</span>
															</label>
														</div>

														<div>
															<label class="line-height-1 blue">
																<input name="jk" value="P" type="radio" class="ace jk" <?php if($edit['jns_kelamin']=="P") echo "checked"; ?>/>
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
												</div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right" for="name">Etnis:</label>

													<div class="col-xs-12 col-sm-3">
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
															<input type="text" id="pekerjaan" name="pekerjaan" class="col-xs-12 col-sm-5" onkeyup="this.value = this.value.toUpperCase()" style='color:#000000;' value="<?php echo $edit['pekerjaan']; ?>"/>
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

															<input type="text" id="telp1" name="telp1" onkeypress="return hanyaAngka(event)" maxlength="13" style='color:#000000;' value="<?php echo $edit['no_telpon']; ?>"/>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Kewarganegaraan:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<select id="kwn" name="kwn" class="col-xs-12 col-sm-2" style='color:#000000;'>
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

													<div class="col-xs-12 col-sm-4">
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
													<div class="col-xs-2 col-sm-1">
														<div class="clearfix">
														<button id="tm_prov" name="tm_prov" type="button" class="btn btn-primary btn-sm" data-toggle="button">
														<i class="ace-icon glyphicon glyphicon-plus "></i>
														</button>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right" for="state">Kota/Kabupaten:</label>

													<div class="col-xs-12 col-sm-4">
														<div class="clearfix">
														<select class="select2" id="kota" name="kota" data-placeholder="Klik untuk memilih Kota/Kabupaten..." style='color:#000000;'>
                                                            <option value="<?php echo $edit['id_kab_kota']; ?>"><?php echo $edit['nama_kab_kota']; ?></option>
														</select>
														</div>
													</div>
													<div class="col-xs-2 col-sm-1">
														<div class="clearfix">
														<button id="tm_kota" name="tm_kota" type="button" class="btn btn-primary btn-sm" data-toggle="button">
														<i class="ace-icon glyphicon glyphicon-plus "></i>
														</button>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right" for="state">Kecamatan:</label>

													<div class="col-xs-12 col-sm-4">
														<div class="clearfix">
														<select class="select2" id="kec" name="kec" data-placeholder="Klik untuk memilih Kecamatan..." style='color:#000000;'>
														<option value="<?php echo $edit['id_kecamatan']; ?>"><?php echo $edit['nama_kecamatan']; ?></option>
														</select>
														</div>
													</div>
													<div class="col-xs-2 col-sm-1">
														<div class="clearfix">
														<button id="tm_kec" name="tm_kec" type="button" class="btn btn-primary btn-sm" data-toggle="button">
														<i class="ace-icon glyphicon glyphicon-plus "></i>
														</button>
														</div>
													</div>
												</div>

												<div class="space-2"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right" for="state">Desa/Kelurahan:</label>

													<div class="col-xs-12 col-sm-4">
														<div class="clearfix">
														<select class="select2" id="desa" name="desa" data-placeholder="Klik untuk memilih Desa/Kelurahan..." style='color:#000000;'>
														<option value="<?php echo $edit['id_kelurahan']; ?>"><?php echo $edit['nama_kelurahan']; ?></option>
														</select>
														</div>
													</div>
													<div class="col-xs-2 col-sm-1">
														<div class="clearfix">
														<button id="tm_desa" name="tm_desa" type="button" class="btn btn-primary btn-sm" data-toggle="button">
														<i class="ace-icon glyphicon glyphicon-plus "></i>
														</button>
														</div>
													</div>
												</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">No Kartu BPJS:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="nobpjs" id="nobpjs" class="col-xs-12 col-sm-5" onkeypress="return hanyaAngka(event)" style='color:#000000;' value="<?php echo $edit['no_bpjs']; ?>"/>
														</div>
													</div>
												</div>

												<div class="hr hr-dotted"></div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Penanggungjawab:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="tgjwb" id="tgjwb" class="col-xs-12 col-sm-5" onkeyup="this.value = this.value.toUpperCase()" style='color:#000000;' value="<?php echo $edit['penanggung_jawab']; ?>"/>
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Umur P.jawab:</label>

													<div class="col-xs-12 col-sm-5">
														<div class="clearfix">
															<input type="text" name="umur_pj" id="umur_pj" class="col-xs-12 col-sm-1" onkeypress="return hanyaAngka(event)" style='color:#000000;' value="<?php echo $edit['umur_pj']; ?>"/>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Pekerjaan P.jawab:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="pekerjaan_pj" id="pekerjaan_pj" class="col-xs-12 col-sm-5" onkeyup="this.value = this.value.toUpperCase()" style='color:#000000;' value="<?php echo $edit['pekerjaan_pj']; ?>"/>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Alamat P.jawab:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="alamat_pj" id="alamat_pj" class="col-xs-12 col-sm-5" onkeyup="this.value = this.value.toUpperCase()" style='color:#000000;' value="<?php echo $edit['alamat_pj']; ?>"/>
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

															<input type="text" id="telp2" name="telp2" onkeypress="return hanyaAngka(event)" maxlength="13" style='color:#000000;'/value="<?php echo $edit['no_penanggung_jawab']; ?>">
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-xs-12 col-sm-2 no-padding-right">Hub.Keluarga:</label>

													<div class="col-xs-12 col-sm-9">
														<div class="clearfix">
															<input type="text" name="hubungan" id="hubungan" class="col-xs-12 col-sm-5" onkeyup="this.value = this.value.toUpperCase()" style='color:#000000;' value="<?php echo $edit['hub_keluarga']; ?>"/>
														</div>
													</div>
												</div>
										</div>
									</div>
									</form>
								</div>
								

								<hr />
								<div class="wizard-actions">
									<button class="btn btn-primary" name="simpan" id="simpan" class="simpan">
										SIMPAN
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
<div id="modal-prov" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                    <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <span class="white">&times;</span>
                            </button>
                            TAMBAH DATA PROVINSI
                    </div>
            </div>

            <div class="modal-body no-padding">
			<br />
                <form class="form-horizontal">
					<div class="row">
						<div class="col-sm-12">
							
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-left">Provinsi :</label>
								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="tx_prov" id="tx_prov" class="col-xs-12 col-sm-6" onkeyup="this.value = this.value.toUpperCase()" style='color:#000000;' />
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</form>
            </div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-primary" data-dismiss="modal" name="sm_prov" id="sm_prov">
					<i class="ace-icon fa fa-check"></i>
					Save
				</button>
			</div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div id="modal-kota" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                    <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <span class="white">&times;</span>
                            </button>
                            TAMBAH DATA KOTA/KABUPATEN
                    </div>
            </div>

            <div class="modal-body no-padding">
			<br />
                <form class="form-horizontal">
					<div class="row">
						<div class="col-sm-12">
							
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-left">Kota/Kabupaten :</label>
								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="tx_kota" id="tx_kota" class="col-xs-12 col-sm-6" onkeyup="this.value = this.value.toUpperCase()" style='color:#000000;' />
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</form>
            </div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-primary" data-dismiss="modal" name="sm_kota" id="sm_kota">
					<i class="ace-icon fa fa-check"></i>
					Save
				</button>
			</div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div id="modal-kec" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                    <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <span class="white">&times;</span>
                            </button>
                            TAMBAH DATA KECAMATAN
                    </div>
            </div>

            <div class="modal-body no-padding">
			<br />
                <form class="form-horizontal">
					<div class="row">
						<div class="col-sm-12">
							
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-left">Kecamatan :</label>
								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="tx_kec" id="tx_kec" class="col-xs-12 col-sm-6" onkeyup="this.value = this.value.toUpperCase()" style='color:#000000;' />
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</form>
            </div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-primary" data-dismiss="modal" name="sm_kec" id="sm_kec">
					<i class="ace-icon fa fa-check"></i>
					Save
				</button>
			</div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div id="modal-desa" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                    <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <span class="white">&times;</span>
                            </button>
                            TAMBAH DATA DESA/KELURAHAN
                    </div>
            </div>

            <div class="modal-body no-padding">
			<br />
                <form class="form-horizontal">
					<div class="row">
						<div class="col-sm-12">
							
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-left">Desa/Kelurahan :</label>
								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="tx_desa" id="tx_desa" class="col-xs-12 col-sm-6" onkeyup="this.value = this.value.toUpperCase()" style='color:#000000;' />
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</form>
            </div>
			<div class="modal-footer">
				<button class="btn btn-sm btn-primary" data-dismiss="modal" name="sm_desa" id="sm_desa">
					<i class="ace-icon fa fa-check"></i>
					Save
				</button>
			</div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
	function hanyaAngka(evt) {
	  var charCode = (evt.which) ? evt.which : event.keyCode
	   if (charCode > 31 && (charCode < 48 || charCode > 57))

		return false;
	  return true;
	}
	
	function umur(a) {
			
		var start	= new Date(a);
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
	}
	
	jQuery(function($) {
		$('#span-loading').hide();
		
		$('[data-rel=tooltip]').tooltip();
	
		 $('.select2').css('width','300px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		});
		
		$('#booking').keydown(function(e){
			if($(this).val() !== ""){
                if(e.keyCode==13){
					var kode = $('#booking').val();
					window.location=("<?php echo base_url('pendaftaran/get_booking_baru');?>/"+kode);
                }
			}
        });
		
		$('#tm_prov').click(function(){
			$('#tx_prov').val("");
			$('#modal-prov').modal('show');
		});
		
		$('#sm_prov').click(function(){
			var prov 		= $('#tx_prov').val();
			if(prov ==""){
				alert("Data tidak dapat disimpan karena masih kosong...");
				return false;
			}
			$.ajax({
                type : "POST",
                url  : "<?php echo base_url().'pendaftaran/simpan_prov'; ?>",
                data : "prov="+prov,
                success:function(data){
						var url = "<?php echo site_url('pendaftaran/add_ajax_prov');?>";
						$('#provinsi').load(url);               
                },
                error:function(xhr, ajaxOptions, thrownError){
                    alert('Error Function : '+thrownError);
                }
            });
		});
		
		$('#tm_kota').click(function(){
			$('#tx_kota').val("");
			$('#modal-kota').modal('show');
		});
		
		$('#sm_kota').click(function(){
			var prov 		= $('#provinsi').val();
			var kota 		= $('#tx_kota').val();
			
			if(prov ==""){
				alert("Provinsi belum dipilih...");
				return false;
			}
			if(kota ==""){
				alert("Data tidak dapat disimpan karena masih kosong...");
				return false;
			}
			$.ajax({
                type : "POST",
                url  : "<?php echo base_url().'pendaftaran/simpan_kota'; ?>",
                data : "kota="+kota+"&prov="+prov,
                success:function(data){
						var url = "<?php echo site_url('pendaftaran/add_ajax_kab');?>/"+prov;
						$('#kota').load(url);               
                },
                error:function(xhr, ajaxOptions, thrownError){
                    alert('Error Function : '+thrownError);
                }
            });
		});
		
		$('#tm_kec').click(function(){
			$('#tx_kec').val("");
			$('#modal-kec').modal('show');
		});
		
		$('#sm_kec').click(function(){
			var kota 		= $('#kota').val();
			var kec 		= $('#tx_kec').val();
			
			if(kota ==""){
				alert("Kota/Kabupaten belum dipilih...");
				return false;
			}
			if(kec ==""){
				alert("Data tidak dapat disimpan karena masih kosong...");
				return false;
			}
			$.ajax({
                type : "POST",
                url  : "<?php echo base_url().'pendaftaran/simpan_kec'; ?>",
                data : "kota="+kota+"&kec="+kec,
                success:function(data){
						var url = "<?php echo site_url('pendaftaran/add_ajax_kec');?>/"+kota;
						$('#kec').load(url);               
                },
                error:function(xhr, ajaxOptions, thrownError){
                    alert('Error Function : '+thrownError);
                }
            });
		});
		
		$('#tm_desa').click(function(){
			$('#tx_desa').val("");
			$('#modal-desa').modal('show');
		});
		
		$('#sm_desa').click(function(){
			var kec 		= $('#kec').val();
			var desa 		= $('#tx_desa').val();
			
			if(kec ==""){
				alert("Kecamatan belum dipilih...");
				return false;
			}
			if(desa ==""){
				alert("Data tidak dapat disimpan karena masih kosong...");
				return false;
			}
			$.ajax({
                type : "POST",
                url  : "<?php echo base_url().'pendaftaran/simpan_desa'; ?>",
                data : "desa="+desa+"&kec="+kec,
                success:function(data){
						var url = "<?php echo site_url('pendaftaran/add_ajax_des');?>/"+kec;
						$('#desa').load(url);               
                },
                error:function(xhr, ajaxOptions, thrownError){
                    alert('Error Function : '+thrownError);
                }
            });
		});
	
		$('#simpan').on('click', function(){
				var lk = pendaftaran.jk[0].checked;
				var pr = pendaftaran.jk[1].checked;
				
				var Y = pendaftaran.batas[0].checked;
				var N = pendaftaran.batas[1].checked;
			
				if($('#nama').val()==""){
					bootbox.alert("Nama pasien belum diisi...");
					document.pendaftaran.nama.focus();
					return false;
				}
				if($('#tl').val()==""){
					bootbox.alert("Tempat lahir belum diisi...");
					document.pendaftaran.tl.focus();
					return false;
				}
				if($('#tgll').val()==""){
					bootbox.alert("Tanggal lahir belum diisi...");
					document.pendaftaran.tgll.focus();
					return false;
				}
				if(lk==false && pr==false){
				bootbox.alert("Silahkan pilih jenis kelamin pasien...");
				return false;
				}
				if($('#agama').val()==""){
					bootbox.alert("Silahkan pilih agama pasien...");
					document.pendaftaran.agama.focus();
					return false;
				}
				if($('#etnis').val()==""){
					bootbox.alert("Silahkan pilih etnis...");
					document.pendaftaran.etnis.focus();
					return false;
				}
				if($('#bahasa').val()==""){
					bootbox.alert("Silahkan pilih bahasa...");
					document.pendaftaran.bahasa.focus();
					return false;
				}
				if(Y==false && N==false){
				bootbox.alert("Silahkan pilih keterbatasan bahasa...");
				return false;
				}
				if($('#pdd').val()==""){
					bootbox.alert("Silahkan pilih tingkat pendidikan pasien...");
					document.pendaftaran.pdd.focus();
					return false;
				}
				if($('#pekerjaan').val()==""){
					bootbox.alert("Pekerjaan pasien belum diisi...");
					document.pendaftaran.pekerjaan.focus();
					return false;
				}
				if($('#telp1').val()==""){
					bootbox.alert("Telephone pasien belum diisi...");
					document.pendaftaran.telp1.focus();
					return false;
				}
				if($('#kwn').val()==""){
					bootbox.alert("Silahkan pilih kewarganegaraan pasien...");
					document.pendaftaran.kwn.focus();
					return false;
				}
				if($('#negara').val()=="" && $('#kwn').val()=="WNA"){
					bootbox.alert("Silahkan pilih negara pasien...");
					document.pendaftaran.negara.focus();
					return false;
				}
				if($('#alamat').val()==""){
					bootbox.alert("Alamat pasien belum diisi...");
					document.pendaftaran.alamat.focus();
					return false;
				}
				if($('#provinsi').val()=="" && $('#kwn').val()=="WNI"){
					bootbox.alert("Provinsi belum diisi...");
					document.pendaftaran.provinsi.focus();
					return false;
				}
				if($('#kota').val()=="" && $('#kwn').val()=="WNI"){
					bootbox.alert("Kota/Kabupaten belum diisi...");
					document.pendaftaran.alamat.focus();
					return false;
				}
				if($('#kec').val()=="" && $('#kwn').val()=="WNI"){
					bootbox.alert("Kecamatan belum diisi...");
					document.pendaftaran.alamat.focus();
					return false;
				}
				if($('#desa').val()=="" && $('#kwn').val()=="WNI"){
					bootbox.alert("Desa/Kelurahan belum diisi...");
					document.pendaftaran.desa.focus();
					return false;
				}
				if($('#tgjwb').val()==""){
					bootbox.alert("Penanggungjawab pasien belum diisi...");
					document.pendaftaran.tgjwb.focus();
					return false;
				}
				if($('#telp2').val()==""){
					bootbox.alert("Telephone penanggungjawab belum diisi...");
					document.pendaftaran.telp2.focus();
					return false;
				}
				if(confirm('Apa anda yakin melanjutkan proses simpan pendaftaran?')){
                document.pendaftaran.submit();
				window.location=("<?php echo base_url('pendaftaran/daftar');?>");
                return true;
            	}
		});
	
		$('#status').click(function(){
			if($('#status').val()=="1" ) {
				window.location=("<?php echo base_url('pendaftaran/daftar');?>");
			}
		});
		
		$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
		})
		.next().on(ace.click_event, function(){
			$(this).prev().focus();
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
			umur(this.value);					
		});
		
		window.onload=function(){
			var a = $('#tgll').val();
			umur(a);
			
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