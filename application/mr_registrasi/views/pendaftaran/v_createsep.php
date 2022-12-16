<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('pendaftaran/create_sep');?>">Home</a>
				</li>
				<li class="active">Create SEP</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1>
					CREATE SEP
				</h1>
			</div><!-- /.page-header -->

							
			<div id="fuelux-wizard-container">
				<form class="form-horizontal" id="pendaftaran" name="pendaftaran" method="POST">
				<div class="row">
					<div class="col-sm-12">
						<div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">PESERTA</h4>
								
								<div class="widget-toolbar">
									<a href="#" data-action="collapse">
										<i class="ace-icon fa fa-chevron-up"></i>
									</a>
								</div>
								<div class="widget-toolbar">
									<label>
										<select id="rujukan" name="rujukan" class="col-xs-12 col-sm-12" style='color:#000000;'>
											<option value="0">-- Pilih Rujukan --</option>
											<option value="1">PCare</option>
											<option value="2">RUMAH SAKIT</option>
										</select>
									</label>
								</div>
							</div>
							<div class="widget-body">
								<br />
								<div class="row">
								<div class="col-sm-6">
								
								<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right">No Registrasi:</label>
									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="noreg" id="noreg" class="limited col-xs-12 col-sm-6" maxlength="10" value="<?php echo $noreg; ?>" style='color:#000000;'/>
											<button id="cari" name="cari" type="button" class="btn btn-primary btn-sm" data-toggle="button" data-loading-text="Loading...">
											<i class="ace-icon glyphicon glyphicon-search "></i>
											</button>
										</div>
									</div>
								</div>

								<div class="space-2"></div>
								
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tgl Registrasi:</label>

									<div class="col-xs-12 col-sm-5">
											<input type="text" name="tglreg" id="tglreg" class="col-xs-12 col-sm-12" style='color:#000000;' readonly/>
									</div>
									<div class="col-xs-12 col-sm-4">
											<label>
												<input name="pcob" id="pcob" value="1" type="checkbox" class="ace" />
												<span class="lbl"> Peserta COB</span>
											</label>
									</div>
								</div>
								
								<div class="space-2"></div>
								
								<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right">No MR:</label>
								<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="nomr" id="nomr" class="col-xs-12 col-sm-3" style='color:#000000;' readonly/>
											<input type="text" name="namap" id="namap" class="col-xs-12 col-sm-9" style='color:#000000;' readonly/>
										</div>
									</div>
								</div>
								
								<div class="space-2"></div>
								
								<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right">Jenis Perawatan:</label>
								<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<select id="jns_rawat" name="jns_rawat" class="col-xs-12 col-sm-4" style='color:#000000;'>
												<option value="2">RAWAT JALAN</option>
												<option value="1">RAWAT INAP</option>
											</select>
										</div>
									</div>
								</div>
								
								<div class="space-2"></div>
								
								<div class="form-group hide" id="tujuan">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tujuan/Poli:</label>

									<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="poli" id="poli" class="col-xs-12 col-sm-9" style='color:#000000;' readonly/>
										<input type="text" name="kdpoli" id="kdpoli" class="col-xs-12 col-sm-3" style='color:#000000;' readonly/>
										<input type="hidden" name="kdmapping" id="kdmapping" class="col-xs-12 col-sm-3" readonly/>
									</div>
									</div>
								</div>
								
								<div class="space-2"></div>
								
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right">Diagnosa:</label>

									<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" id="diagnosa" name="diagnosa" placeholder="Diagnosa penyakit" class="col-xs-12 col-sm-9" style='color:#000000;'/>
										<input type="text" name="code" id="code" placeholder="Code ICD" class="col-xs-12 col-sm-3" style='color:#000000;' readonly/>
									</div>
									</div>
								</div>
								
								<div class="space-2"></div>
								<hr />
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right">
											<input name="lakalantas" id="lakalantas" value="1" type="checkbox" class="ace" />
											<span class="lbl"> Penjamin KLL:</span>
									</label>

									<div class="col-xs-12 col-sm-9">
									<div class="checkbox hide" id="klp_ass">
										<label>
											<input name="jamin" value="1" type="checkbox" onclick="displayPenjamin(this.form)" class="ace" />
											<span class="lbl"> Jasa Raharja</span>
										</label>
										<label>
											<input name="jamin" value="2" type="checkbox" onclick="displayPenjamin(this.form)" class="ace" />
											<span class="lbl"> BPJS KTK</span>
										</label>
										<label>
											<input name="jamin" value="3" type="checkbox" onclick="displayPenjamin(this.form)" class="ace" />
											<span class="lbl"> TASPEN</span>
										</label>
										<label>
											<input name="jamin" value="4" type="checkbox" onclick="displayPenjamin(this.form)" class="ace" />
											<span class="lbl"> ASABRI</span>
										</label>
									</div>
									<input type="hidden" id="penjamin" name="penjamin" class="col-xs-12 col-sm-9" style='color:#000000;'/>
									</div>
									
								</div>
								<hr />
								<div class="form-group hide" id="lokej">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right">Lokasi Kejadian:</label>

									<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<textarea class="col-xs-12 col-sm-12" name="lokasi" id="lokasi"></textarea>
									</div>
									</div>
								</div>
								
								</div>
								<div class="col-sm-6">
								
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right">No Kartu BPJS:</label>

									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="nobpjs" id="nobpjs" class="col-xs-12 col-sm-6" style='color:#000000;'/>
											<button id="cek_kartu_jkn" name="cek_kartu_jkn" type="button" class="btn btn-primary btn-sm" data-toggle="button" data-loading-text="Loading...">
											<i class="ace-icon glyphicon glyphicon-search "></i>
											</button>
											<input type="text" name="keterangan" id="keterangan" class="col-xs-12 col-sm-3" style='color:#000000;' readonly/>
											
										</div>
									</div>
								</div>
								
								<div class="space-2"></div>
								
								<div class="row">
								<div class="col-sm-12">
									<div class="col-sm-offset-1 col-sm-11">
										<div class="tabbable">
											<ul class="nav nav-tabs" id="myTab">
												<li class="active">
													<a data-toggle="tab" href="#peserta">
														Peserta
														<i class="fa fa-user bigger-120"></i>
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#cob">
														COB
														<i class="fa fa-credit-card"></i>
													</a>
												</li>
											</ul>

											<div class="tab-content">
												<div id="peserta" class="tab-pane fade in active">
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right">No KTP:</label>
					
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="text" name="noktp" id="noktp" class="col-xs-12 col-sm-12" style='color:#000000;' data-loading-text="Please Wait..."/>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right">Nama:</label>
					
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="text" name="pasien" id="pasien" class="col-xs-12 col-sm-12" style='color:#000000;' readonly/>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tgl Lahir:</label>
					
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="text" name="tgllahir" id="tgllahir" class="col-xs-12 col-sm-12" style='color:#000000;' readonly/>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right">Gender:</label>
					
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="text" name="sex" id="sex" class="col-xs-12 col-sm-12" style='color:#000000;' readonly/>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right">Umur:</label>
					
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="text" name="umur" id="umur" class="col-xs-12 col-sm-12" style='color:#000000;' readonly/>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right">Jns Peserta:</label>
					
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="hidden" name="kdpeserta" id="kdpeserta" class="col-xs-12 col-sm-2" readonly/>
																<input type="text" name="jnspeserta" id="jnspeserta" class="col-xs-12 col-sm-12" style='color:#000000;' readonly/>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right">Kelas Rawat:</label>
					
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="hidden" name="kdkelas" id="kdkelas" class="col-xs-12 col-sm-4" readonly/>
																<input type="text" name="nmkelas" id="nmkelas" class="col-xs-12 col-sm-12" style='color:#000000;' readonly/>
															</div>
														</div>
													</div>
													<div class="row">
													<div class="col-sm-6">
													
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-6 no-padding-right">TMT:</label>
					
														<div class="col-xs-12 col-sm-6">
															<div class="clearfix">
																<input type="text" name="tmt" id="tmt" class="col-xs-12 col-sm-12" style='color:#000000;' readonly/>
															</div>
														</div>
													</div>
													
													</div>
													<div class="col-sm-6">
													
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-6 no-padding-right">TAT:</label>
					
														<div class="col-xs-12 col-sm-6">
															<div class="clearfix">
																<input type="text" name="tat" id="tat" class="col-xs-12 col-sm-12" style='color:#000000;' readonly/>
																<input type="hidden" name="tglcetak_kartu" id="tglcetak_kartu" class="col-xs-12 col-sm-11" style='color:#000000;' readonly/>
															</div>
														</div>
													</div>
													
													</div>
													</div>
												</div>

												<div id="cob" class="tab-pane fade">
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right">No Asuransi:</label>
					
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="text" name="noass" id="noass" class="col-xs-12 col-sm-12" style='color:#000000;' readonly/>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-3 no-padding-right">Nama Asuransi:</label>
					
														<div class="col-xs-12 col-sm-9">
															<div class="clearfix">
																<input type="text" name="asuransi" id="asuransi" class="col-xs-12 col-sm-12" style='color:#000000;' readonly/>
															</div>
														</div>
													</div>
													<div class="row">
													<div class="col-sm-6">
													
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-6 no-padding-right">TMT:</label>
					
														<div class="col-xs-12 col-sm-6">
															<div class="clearfix">
																<input type="text" name="cobtmt" id="cobtmt" class="col-xs-12 col-sm-12" style='color:#000000;' readonly/>
															</div>
														</div>
													</div>
													
													</div>
													<div class="col-sm-6">
													
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-6 no-padding-right">TAT:</label>
					
														<div class="col-xs-12 col-sm-6">
															<div class="clearfix">
																<input type="text" name="cobtat" id="cobtat" class="col-xs-12 col-sm-12" style='color:#000000;' readonly/>
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
								</div>
								
								<br />
								
								</div>
								</div>
								
							</div>
						</div>
					</div>
							
					<div class="col-sm-12">
						<div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">SURAT ELEGIBILITAS PESERTA</h4>

								<div class="widget-toolbar">
									<a href="#" data-action="collapse">
										<i class="ace-icon fa fa-chevron-up"></i>
									</a>
								</div>
							</div>
							<div class="widget-body">
								<br />
								
								<div class="row">
								<div class="col-sm-6">
								
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right">No Rujukan:</label>

									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="no_rujukan" id="no_rujukan" class="col-xs-12 col-sm-8" value="123456" style='color:#000000;' />
										</div>
									</div>
								</div>
								
								<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right">Asal Rujukan:</label>
								<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<select id="faskes" name="faskes" class="col-xs-12 col-sm-5" style='color:#000000;'>
												<option value="1">FASKES TINGKAT 1</option>
												<option value="2">FASKES TINGKAT 2</option>
											</select>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right">PPK Rujukan:</label>

									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="nmprovider" id="nmprovider" class="col-xs-12 col-sm-9" style='color:#000000;'/>
											<input type="text" name="kdprovider" id="kdprovider" class="col-xs-12 col-sm-3" style='color:#000000;' readonly/>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tgl Rujukan:</label>

									<div class="col-xs-12 col-sm-4">
										<div class="input-group">
											<input type="text" name="tgl_rujukan" id="tgl_rujukan" class="date-picker" value="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd" style='color:#000000;' readonly/>
											<span class="input-group-addon">
												<i class="ace-icon fa fa-calendar"></i>
											</span>
										</div>
									</div>
								</div>
								</div>
								
								<div class="col-sm-6">
								<div class="form-group hidden">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right">No SEP:</label>

									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="nosep" id="nosep" class="col-xs-12 col-sm-8" style='color:#000000;' readonly/>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tgl SEP:</label>

									<div class="col-xs-12 col-sm-4">
										<div class="input-group">
											<input type="text" name="tglsep" id="tglsep" value="<?php echo date("Y-m-d"); ?>" class="date-picker" data-date-format="yyyy-mm-dd" style='color:#000000;' readonly/>
											<span class="input-group-addon">
												<i class="ace-icon fa fa-calendar"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="phone">No Telp:</label>

									<div class="col-xs-12 col-sm-9">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="ace-icon fa fa-phone"></i>
											</span>
											<input type="text" id="telp" name="telp" onkeypress="return angka(event)" maxlength="13" style='color:#000000;'/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-3 no-padding-right">Catatan:</label>

									<div class="col-xs-12 col-sm-9">
										<div class="clearfix">
											<input type="text" name="ctt" id="ctt" class="col-xs-12 col-sm-11" style='color:#000000;' />
										</div>
									</div>
								</div>
								</div>
									<div class="col-xs-12">
									<div style="padding:3px;overflow-y:scroll;overflow-x:scroll;height:200px;border:1px solid grey" class="col-xs-12">
										<div class="clearfix">
												<div class="pull-right tableTools-container"></div>
										</div>
											<table class="table table-bordered table-hover" style='color:#000000;'>
												<thead>
													<tr>
														<th class="center">NO</th>
														<th class="center">NO SEP</th>
														<th class="center">TGL SEP</th>
														<th class="center">POLI</th>
														<th class="center">LAYANAN</th>
														<th class="center">DIAGNOSA</th>
														<th class="center" colspan="2">#</th>
													</tr>
												</thead>
												<tbody id="getdata">
												</tbody>
											</table>
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
				<button class="btn btn-primary" name="create" id="create" class="create" data-loading-text="Loading...">
					CREATE SEP
					<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
				</button>
			</div>
							
		</div><!-- /.page-content -->
	</div>
</div>

<div id="modal-update" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                    <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <span class="white">&times;</span>
                            </button>
                            UPDATE TGL.PULANG ( <span id='sepupdate'> </span> )
                    </div>
            </div>

            <div class="modal-body no-padding">
			<br />
                <div class="form-horizontal">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label col-sm-offset-1 col-xs-12 col-sm-3 no-padding-left">Tgl.Pulang :</label>
								<input type="hidden" name="nosep_c" id="nosep_c" class="col-xs-12 col-sm-12" style='color:#000000;'/>
								<div class="col-xs-12 col-sm-4">
									<div class="input-group">
										<input type="text" name="tglplg" id="tglplg" class="date-picker" value="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd" style='color:#000000;' readonly/>
										<span class="input-group-addon">
											<i class="ace-icon fa fa-calendar"></i>
										</span>
									</div>
								</div>
										
							</div>
							<div class="modal-footer">
								<button class="btn btn-sm btn-primary" data-dismiss="modal" name="update" id="update">
									UPDATE
								</button>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div id="modal-pengajuan" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                    <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <span class="white">&times;</span>
                            </button>
                            PENGAJUAN PERSETUJUAN ( <span id='nokartubpjs'> </span> )
                    </div>
            </div>

            <div class="modal-body no-padding">
			<br />
                <div class="form-horizontal">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-left">Nama :</label>
								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="namaajukan" id="namaajukan" class="col-xs-6 col-sm-8" style='color:#000000;' readonly/>
									</div>
								</div>		
							</div>
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-left">Keterangan :</label>
								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<textarea name="ketajukan" id="ketajukan" style='color:#000000;' class="col-xs-11 col-sm-11"></textarea>
									</div>
								</div>		
							</div>
							<div class="modal-footer center">
								<button class="btn btn-sm btn-primary" data-dismiss="modal" name="ajukan" id="ajukan">
									AJUKAN
								</button>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div id="modal-setujui" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                    <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <span class="white">&times;</span>
                            </button>
                            PENGAJUAN PERSETUJUAN ( <span id='nokartubpjs'> </span> ) BERHASIL
                    </div>
            </div>

            <div class="modal-body no-padding">
			<br />
                <div class="form-horizontal">
					<div class="row">
						<div class="col-sm-12 center" >
								<button class="btn btn-sm btn-primary" data-dismiss="modal" name="setujui" id="setujui">
									AprovalSEP
								</button>
								<br /><br />
						</div>
					</div>
				</div>
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
	function angka(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		
		return false;
		return true;
	}
	
	function displayPenjamin(frm){   
	 	var selectedjamin= "";
		for (i = 0; i < frm.jamin.length; i++){ //menghitung jumlah panjang array
		  if (frm.jamin[i].checked){   
		   selectedjamin += frm.jamin[i].value;
		  }
		}
	 //memunculkan data di input id result yg isinya select buah
		document.getElementById("penjamin").value=selectedjamin.split("");
	}
	function nosepmodal(a){
		$('#modal-update').modal('show');
		$("#sepupdate").html(a);
		$("#nosep_c").val(a);
	}
	
	function nosepprint(a){
		$.ajax({
			type : "POST",
			url  : "<?php echo base_url().'pendaftaran/get_ceknosep'; ?>",
			data : "nosep="+a,
			success:function(data){
			var response =  eval("(" + data + ")");
				if(response.MESSAGE=="OK"){
					var sep = response.NOSEP;
					var cetak = '<?php echo base_url().'pendaftaran/cetak_sep/'; ?>'+sep;
					window.open(cetak);
				}else{
					bootbox.alert(response.MESSAGE); 
				}                  
			}
		});
	}
	
	function nosephapus(a){
		$.ajax({
			type : "POST",
			url  : "<?php echo base_url().'pendaftaran/get_ceknosep'; ?>",
			data : "nosep="+a,
			success:function(data){
			var response =  eval("(" + data + ")");
				if(response.MESSAGE=="OK"){
					var sep = response.NOSEP;
					$.ajax({
						type : "POST",
						url  : "<?php echo base_url().'pendaftaran/get_hapussep'; ?>",
						data : "sep="+sep,
						success:function(data){
						var response =  eval("(" + data + ")");
							if(response.metaData.code=='200'){
								bootbox.alert("SEP berhasil di hapus...");
								$('#cek_kartu_jkn').click();
							}else{
								bootbox.alert(response.metaData.message); 
							}                  
						}
					});
				}else{
					bootbox.alert(response.MESSAGE); 
				}                  
			}
		});
	}
	function kosong(){
	var tglnow = "<?php echo date("Y-m-d") ?>";
		$('#sex').val('');
		$('#keterangan').val('');
		$('#noktp').val('');
		$('#pasien').val('');
		$('#tgllahir').val('');
		$('#umur').val('');
		$('#kdpeserta').val('');
		$('#jnspeserta').val('');
		$('#kdkelas').val('');
		$('#nmkelas').val('');
		$('#tglcetak_kartu').val('');
		$('#tmt').val('');
		$('#tat').val('');
		$('#kdprovider').val('');
		$('#nmprovider').val('');
		$('#noass').val('');
		$('#asuransi').val('');
		$('#cobtmt').val('');
		$('#cobtat').val('');
		$('#diagnosa').val('');
		$('#code').val('');
		$('#no_rujukan').val('123456');
		$('#tgl_rujukan').val(tglnow);
		$('#faskes').val('1');
	}
	
	jQuery(function($) {
	
		$('[data-rel=tooltip]').tooltip();
	
		$('.select2').css('width','300px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		}); 
		
		$('#noreg').keydown(function(e){
            if($(this).val() !== ""){
                if(e.keyCode==13){
                    $('#cari').click();
                }
            }
        })
		
		$('#tglsep').change(function(){
			var tglnow = "<?php echo date("Y-m-d") ?>";
			var nopeserta = $('#nobpjs').val();
			var pasien = $('#pasien').val();
			if($('#tglsep').val() < tglnow){
				$('#modal-pengajuan').modal('show');
				$("#nokartubpjs").html(nopeserta);
				$("#namaajukan").val(pasien);
			}
        });
		
		$('#ajukan').click(function(){
            var nobpjs 	= $('#nobpjs').val();
			var tgl 	= $('#tglsep').val();
			var layanan = $('#jns_rawat').val();
			var ket 	= $('#ketajukan').val();
			
			$.ajax({
                type : "POST",
                url  : "<?php echo base_url().'pendaftaran/get_ajukan'; ?>",
                data : "nobpjs="+nobpjs+"&tgl="+tgl+"&layanan="+layanan+"&ket="+ket,
                success:function(data){
					var response =  eval("(" + data + ")");
					if(response.metaData.code=='200'){
						$('#modal-setujui').modal('show');
                    }else{
                        bootbox.alert(response.metaData.message);
                    } 
						                 
                },
                error:function(xhr, ajaxOptions, thrownError){
                    alert('Error Function : '+thrownError);
                }
            });
        });
		
		$('#setujui').click(function(){
            var nobpjs 	= $('#nobpjs').val();
			var tgl 	= $('#tglsep').val();
			var layanan = $('#jns_rawat').val();
			var ket 	= $('#ketajukan').val();
			
			$.ajax({
                type : "POST",
                url  : "<?php echo base_url().'pendaftaran/get_setujui'; ?>",
                data : "nobpjs="+nobpjs+"&tgl="+tgl+"&layanan="+layanan+"&ket="+ket,
                success:function(data){
					var response =  eval("(" + data + ")");
					if(response.metaData.code=='200'){
						bootbox.alert("Pengajuan berhasil disetujui. Silahkan create SEP...");
                    }else{
                        bootbox.alert(response.metaData.message);
                    } 
						                 
                },
                error:function(xhr, ajaxOptions, thrownError){
                    alert('Error Function : '+thrownError);
                }
            });
        });
		
		$('#cari').click(function(){
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
						$('#tahap').removeClass('hide');
						$("#nomr").val(data.NOMR);
						$("#namap").val(data.NAMA);
						$("#tglreg").val(data.TGLREG);
						$("#poli").val(data.POLI);
						$("#kdpoli").val(data.KDPOLI);
						$("#kdmapping").val(data.KDMAPPING);
						$("#nobpjs").val(data.NOBPJS);
						$("#telp").val(data.TELP);
						kosong();
						btn.button('reset')
					}else{
						$("#nomr").val("");
						$("#namap").val("");
						$("#tglreg").val("");
						$("#poli").val("");
						$("#kdpoli").val("");
						$("#kdmapping").val("");
						$("#nobpjs").val("");
						$("#telp").val("");
						kosong();
						btn.button('reset')
                        bootbox.alert(data.MESSAGE);
                    } 
				}
			}); 
		});
		
		$('#update').click(function(){
			var nosep 	= $('#nosep_c').val();
			var tgl 	= $('#tglplg').val();
			$.ajax({
                type : "POST",
                url  : "<?php echo base_url().'pendaftaran/get_updatetgl'; ?>",
                data : "nosep="+nosep+"&tgl="+tgl,
                success:function(data){
					var response =  eval("(" + data + ")");
					if(response.metaData.code=='200'){
						bootbox.alert("Tgl.Pulang berhasil di update...");
                    }else{
                        bootbox.alert(response.metaData.message);
                    } 
						                 
                },
                error:function(xhr, ajaxOptions, thrownError){
                    alert('Error Function : '+thrownError);
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
		
		$('#jns_rawat').on('change', function(){
			if($('#jns_rawat').val()=="2" ){
				$('#tujuan').removeClass('hide');
			}else{
				$('#tujuan').addClass('hide');
			}
		});
		
		$('#lakalantas').on('click', function(){
			if(this.checked == true){
				$('#klp_ass').removeClass('hide');
				$('#lokej').removeClass('hide');
			}
			if(this.checked == false){
				$('#klp_ass').addClass('hide');
				$('#lokej').addClass('hide');
				$('#lokasi').val('');
				$('#penjamin').val('');
				$('input[name=jamin]').attr('checked', false);
			}
		});
		
		$('#pcob').click(function(){
				if($('#noass').val() == ""){
					$.gritter.add({
						title: 'PERHATIAN',
						text: 'Peserta Tersebut Bukan Peserta COB',
						class_name: 'gritter-error'
					});
					$("#pcob").attr('checked', false);
				}
		});
		
		$('#nobpjs').keydown(function(e){
            if($(this).val() !== ""){
                if(e.keyCode==13){
                    $('#cek_kartu_jkn').click();
                }
            }
        })
		
		$('#cek_kartu_jkn').click(function(){
			var btn = $(this);
			btn.button('loading')
			
            var nopeserta = $('#nobpjs').val();
			
			if($('#nobpjs').val() == ''){
				bootbox.alert("No BPJS masih kosong...");
				btn.button('reset')
			}
			
			$.ajax({ 
				type	: 'POST',
				url		: "<?php echo base_url().'pendaftaran/get_cekdpo'; ?>", 
				data	: "nopeserta="+nopeserta, 
				dataType: "JSON",
				success	: function(data){ 
					if(data.NOBPJS == $('#nobpjs').val()){
						$.gritter.add({
							title: 'WARNING',
							text: 'Pasien Bermasalah (DPO)... Periksa Kembali.! <br>Keterangan : '+data.KET,
							class_name: 'gritter-error'
						});
					}
				}
			});
			
			if($('#rujukan').val() == '0'){
				$.ajax({
					type : "POST",
					url  : "<?php echo base_url().'pendaftaran/get_jkn'; ?>",
					data : "nopeserta="+nopeserta,
					success:function(data){
						var response =  eval("(" + data + ")");
						if(response.metaData.code=='200'){
							if(response.response.peserta.nama != $('#namap').val() ){
								bootbox.alert("Nama Pasien tidak valid dengan Nama Peserta BPJS, silahkan periksa kembali !!!");
							}
							if(response.response.peserta.sex=='L'){
								$('#sex').val("Laki-laki");
							}
							if(response.response.peserta.sex=='P'){
								$('#sex').val("Perempuan");
							}
							$('#keterangan').val(response.response.peserta.statusPeserta.keterangan);
							$('#noktp').val(response.response.peserta.nik);
							$('#pasien').val(response.response.peserta.nama);
							$('#tgllahir').val(response.response.peserta.tglLahir);
							$('#umur').val(response.response.peserta.umur.umurSekarang);
							$('#kdpeserta').val(response.response.peserta.jenisPeserta.kode);
							$('#jnspeserta').val(response.response.peserta.jenisPeserta.keterangan);
							$('#kdkelas').val(response.response.peserta.hakKelas.kode);
							$('#nmkelas').val(response.response.peserta.hakKelas.keterangan);
							$('#tglcetak_kartu').val(response.response.peserta.tglCetakKartu);
							$('#tmt').val(response.response.peserta.tglTMT);
							$('#tat').val(response.response.peserta.tglTAT);
							$('#kdprovider').val(response.response.peserta.provUmum.kdProvider);
							$('#nmprovider').val(response.response.peserta.provUmum.nmProvider);
							$('#noass').val(response.response.peserta.cob.noAsuransi);
							$('#asuransi').val(response.response.peserta.cob.nmAsuransi);
							$('#cobtmt').val(response.response.peserta.cob.tglTMT);
							$('#cobtat').val(response.response.peserta.cob.tglTAT);
							<!-- $("#telp").val(response.response.peserta.mr.noTelepon); -->
							$('#faskes').val('1');
							btn.button('reset')
						}else{
							btn.button('reset')
							bootbox.alert(response.metaData.message);
							kosong();
						}                  
					},
					error:function(xhr, ajaxOptions, thrownError){
						alert('Error Function : '+thrownError);
					}
				});
			}
			
			if($('#rujukan').val() == '1'){
				$.ajax({
					type : "POST",
					url  : "<?php echo base_url().'pendaftaran/get_pcare'; ?>",
					data : "nopeserta="+nopeserta,
					success:function(data){
						var response =  eval("(" + data + ")");
						if(response.metaData.code=='200'){
							if(response.response.rujukan.peserta.nama != $('#namap').val() ){
								bootbox.alert("Nama Pasien tidak valid dengan Nama Peserta BPJS, silahkan periksa kembali !!!");
							}
							if(response.response.rujukan.peserta.sex=='L'){
								$('#sex').val("Laki-laki");
							}
							if(response.response.rujukan.peserta.sex=='P'){
								$('#sex').val("Perempuan");
							}
							$('#keterangan').val(response.response.rujukan.peserta.statusPeserta.keterangan);
							$('#noktp').val(response.response.rujukan.peserta.nik);
							$('#pasien').val(response.response.rujukan.peserta.nama);
							$('#tgllahir').val(response.response.rujukan.peserta.tglLahir);
							$('#umur').val(response.response.rujukan.peserta.umur.umurSekarang);
							$('#kdpeserta').val(response.response.rujukan.peserta.jenisPeserta.kode);
							$('#jnspeserta').val(response.response.rujukan.peserta.jenisPeserta.keterangan);
							$('#kdkelas').val(response.response.rujukan.peserta.hakKelas.kode);
							$('#nmkelas').val(response.response.rujukan.peserta.hakKelas.keterangan);
							$('#tglcetak_kartu').val(response.response.rujukan.peserta.tglCetakKartu);
							$('#tmt').val(response.response.rujukan.peserta.tglTMT);
							$('#tat').val(response.response.rujukan.peserta.tglTAT);
							$('#kdprovider').val(response.response.rujukan.provPerujuk.kode);
							$('#nmprovider').val(response.response.rujukan.provPerujuk.nama);
							$('#noass').val(response.response.rujukan.peserta.cob.noAsuransi);
							$('#asuransi').val(response.response.rujukan.peserta.cob.nmAsuransi);
							$('#cobtmt').val(response.response.rujukan.peserta.cob.tglTMT);
							$('#cobtat').val(response.response.rujukan.peserta.cob.tglTAT);
							$('#diagnosa').val(response.response.rujukan.diagnosa.nama);
							$('#code').val(response.response.rujukan.diagnosa.kode);
							$('#no_rujukan').val(response.response.rujukan.noKunjungan);
							$('#tgl_rujukan').val(response.response.rujukan.tglKunjungan);
							$("#telp").val(response.response.rujukan.peserta.mr.noTelepon);
							$('#faskes').val('1');
							btn.button('reset')
						}else{
							btn.button('reset')
							bootbox.alert(response.metaData.message);
							kosong();
						}                  
					},
					error:function(xhr, ajaxOptions, thrownError){
						alert('Error Function : '+thrownError);
					}
				});
			}
			
			if($('#rujukan').val() == '2'){
				$.ajax({
					type : "POST",
					url  : "<?php echo base_url().'pendaftaran/get_rs'; ?>",
					data : "nopeserta="+nopeserta,
					success:function(data){
						var response =  eval("(" + data + ")");
						if(response.metaData.code=='200'){
							if(response.response.rujukan.peserta.nama != $('#namap').val() ){
								bootbox.alert("Nama Pasien tidak valid dengan Nama Peserta BPJS, silahkan periksa kembali !!!");
							}
							if(response.response.rujukan.peserta.sex=='L'){
								$('#sex').val("Laki-laki");
							}
							if(response.response.rujukan.peserta.sex=='P'){
								$('#sex').val("Perempuan");
							}
							$('#keterangan').val(response.response.rujukan.peserta.statusPeserta.keterangan);
							$('#noktp').val(response.response.rujukan.peserta.nik);
							$('#pasien').val(response.response.rujukan.peserta.nama);
							$('#tgllahir').val(response.response.rujukan.peserta.tglLahir);
							$('#umur').val(response.response.rujukan.peserta.umur.umurSekarang);
							$('#kdpeserta').val(response.response.rujukan.peserta.jenisPeserta.kode);
							$('#jnspeserta').val(response.response.rujukan.peserta.jenisPeserta.keterangan);
							$('#kdkelas').val(response.response.rujukan.peserta.hakKelas.kode);
							$('#nmkelas').val(response.response.rujukan.peserta.hakKelas.keterangan);
							$('#tglcetak_kartu').val(response.response.rujukan.peserta.tglCetakKartu);
							$('#tmt').val(response.response.rujukan.peserta.tglTMT);
							$('#tat').val(response.response.rujukan.peserta.tglTAT);
							$('#kdprovider').val(response.response.rujukan.provPerujuk.kode);
							$('#nmprovider').val(response.response.rujukan.provPerujuk.nama);
							$('#noass').val(response.response.rujukan.peserta.cob.noAsuransi);
							$('#asuransi').val(response.response.rujukan.peserta.cob.nmAsuransi);
							$('#cobtmt').val(response.response.rujukan.peserta.cob.tglTMT);
							$('#cobtat').val(response.response.rujukan.peserta.cob.tglTAT);
							$('#diagnosa').val(response.response.rujukan.diagnosa.nama);
							$('#code').val(response.response.rujukan.diagnosa.kode);
							$('#no_rujukan').val(response.response.rujukan.noKunjungan);
							$('#tgl_rujukan').val(response.response.rujukan.tglKunjungan);
							$("#telp").val(response.response.rujukan.peserta.mr.noTelepon);
							$('#faskes').val('2');
							btn.button('reset')
						}else{
							btn.button('reset')
							bootbox.alert(response.metaData.message);
							kosong();
						}                  
					},
					error:function(xhr, ajaxOptions, thrownError){
						alert('Error Function : '+thrownError);
					}
				});
			}
			
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'pendaftaran/get_riwayat'; ?>",
                data : "nopeserta="+nopeserta,
                success:function(data){
				//document.getElementsByTagName("table")[0].innerHTML = data;
					$('#getdata').html("");
                    var response =  eval("(" + data + ")");
					jmlData = response.jumlah;
					buatTabel = "";
					for(a = 0; a < jmlData; a++){
					if(response.list[a].layanan=="1"){
					var layanan = "Inap";
					var nosep	= "<a onclick=\"nosepmodal('"+ response.list[a].nosep +"')\" data-rel='tooltip' data-placement='left' title='Update Tgl.Pulang'>" + response.list[a].nosep + "</a>";
					}else{
					var layanan = "Jalan";
					var nosep	= response.list[a].nosep;
					}
									buatTabel += "<tr>"
									+ "<td>" + (a+1) + "</td>"
									+ "<td>" + nosep + "</td>"
									+ "<td>" + response.list[a].tglsep + "</td>"
									+ "<td>" + response.list[a].poli + "</td>"
									+ "<td>" + "Rawat - " + layanan + "</td>"
									+ "<td>" + response.list[a].kodediag + " - " + response.list[a].diag + "</td>"
									+ "<td> <a onclick=\"nosepprint('"+ response.list[a].nosep +"')\" data-rel='tooltip' data-placement='left' title='Cetak'> <i class='ace-icon fa fa-print bigger-130'></i> </a> </td>"
									+ <!--"<td> <a onclick=\"nosephapus('"+ response.list[a].nosep +"')\" data-rel='tooltip' data-placement='left' title='Hapus'> <i class='ace-icon fa fa-remove bigger-130'></i> </a> </td>"-->
							+ "<tr/>";
					}
					$('#getdata').html(buatTabel);
					                
                },
                error:function(xhr, ajaxOptions, thrownError){
                    alert('Error Function : '+thrownError);
                }
            });
        }); 
		
		$('#noktp').keydown(function(e){
            if($(this).val() !== ""){
                if(e.keyCode==13){
				   var btn = $(this);
				   btn.button('loading')
                   var noktp = $('#noktp').val();
					$.ajax({
						type : "POST",
						url  : "<?php echo base_url().'pendaftaran/get_nik'; ?>",
						data : "noktp="+noktp,
						success:function(data){
							var response =  eval("(" + data + ")");
							if(response.metaData.code=='200'){
								$('#nobpjs').val(response.response.peserta.noKartu);
								$('#noktp').val(response.response.peserta.nik);
								$('#cek_kartu_jkn').click();
								btn.button('reset')
							}else{
								btn.button('reset')
								bootbox.alert(response.metaData.message);
							}                  
						},
						error:function(xhr, ajaxOptions, thrownError){
							alert('Error Function : '+thrownError);
						}
					});
                }
            }
        });
		
		$('#nmprovider').autocomplete({
            serviceUrl: "<?php echo base_url();?>"+'pendaftaran/get_faskes/'+$('#faskes').val(),
			onSelect: function (suggestion) {
			  $('#kdprovider').val(suggestion.code);
          	}
        });
		
		
		
		$('#create').click(function(){
			if($('#noreg').val()==""){
				bootbox.alert("Data pendaftaran tidak boleh kosong...");
				document.pendaftaran.noreg.focus();
				return false;
        	}
			if($('#diagnosa').val()==""){
				bootbox.alert("Silahkan pilih diagnosa...");
				document.pendaftaran.diagnosa.focus();
				return false;
        	}
			if($('#no_rujukan').val()==""){
				bootbox.alert("No rujukan tidak boleh kosong...");
				document.pendaftaran.no_rujukan.focus();
				return false;
        	}
			if($('#tgl_rujukan').val()==""){
				bootbox.alert("Tgl rujukan tidak boleh kosong...");
				document.pendaftaran.tgl_rujukan.focus();
				return false;
        	}
			if($('#tglsep').val()==""){
				bootbox.alert("Tgl SEP tidak boleh kosong...");
				document.pendaftaran.tglsep.focus();
				return false;
        	}
			if($('#telp').val()==""){
				bootbox.alert("No Telephone tidak boleh kosong...");
				document.pendaftaran.telp.focus();
				return false;
        	}
			
			var btn = $(this);
			btn.button('loading')
			
			var nopeserta	= $('#nobpjs').val();
			var tglsep		= $('#tglsep').val();
			var jnslayanan 	= $('#jns_rawat').val();
			var kelas 		= $('#kdkelas').val();
			var nomr 		= $('#nomr').val();
			
			var asalfaskes	= $('#faskes').val();
			var tglrujukan	= $('#tgl_rujukan').val();
            var norujukan	= $('#no_rujukan').val();
			var ppkrujukan 	= $('#kdprovider').val();
			
			var catatan 	= $('#ctt').val();
			var diagnosa 	= $('#code').val();
			
			if($('#jns_rawat').val()=="2"){
				var poli 	= $('#kdpoli').val();
				var mapping = $('#kdmapping').val();
			}else{
				var poli 	= "-";
				var mapping = "-";
			}
			var cob			= $('input[name=pcob]:checked').val();
			if(cob=="1"){
				var pcob 	= "1";
			}else{
				var pcob 	= "0";
			}
			
			var laka		= $('input[name=lakalantas]:checked').val();
			if(laka=="1"){
				var kecelakaan 	= "1";
				var penjamin 	= $('#penjamin').val();
				var lokasi	 	= $('#lokasi').val();
			}else{
				var kecelakaan 	= "0";
				var penjamin 	= "";
				var lokasi	 	= "";
			}
			var telp		= $('#telp').val();
			
			var faskes		= $('#nmprovider').val();
			var jnspeserta	= $('#jnspeserta').val();
			var noreg		= $('#noreg').val();
			
			
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'pendaftaran/get_sep'; ?>",
                data : "noKartu="+nopeserta+"&tglSep="+tglsep+"&jnsPelayanan="+jnslayanan+"&klsRawat="+kelas+"&noMR="+nomr+"&asalRujukan="+asalfaskes+"&tglRujukan="+tglrujukan+"&noRujukan="+norujukan+"&ppkRujukan="+ppkrujukan+"&catatan="+catatan+"&diagAwal="+diagnosa+"&tujuan="+mapping+"&cob="+pcob+"&lakaLantas="+kecelakaan+"&penjamin="+penjamin+"&lokasiLaka="+lokasi+"&noTelp="+telp+"&poli="+poli+"&faskes="+faskes+"&jnspeserta="+jnspeserta+"&noreg="+noreg,
                success:function(data){
				 var response =  eval("(" + data + ")");
				 var tglnow = "<?php echo date("Y-m-d") ?>";
                    if(response.metaData.code=='200'){
                        $('#nosep').val(response.response.sep.noSep);
						var nosep = response.response.sep.noSep;
						var cetak = '<?php echo base_url().'pendaftaran/cetak_sep/'; ?>'+nosep;
						window.open(cetak);
						window.location=("<?php echo base_url('pendaftaran/daftar');?>");
						return true;
                    }else{
						btn.button('reset')
                        bootbox.alert(response.metaData.message);
                    }                  
                },
                error:function(xhr, ajaxOptions, thrownError){
                    alert('Error Function : '+thrownError);
                }
            });
			btn.button('reset')
		});
		
		$('#diagnosa').autocomplete({
            serviceUrl: "<?php echo base_url().'pendaftaran/get_diagnosa'; ?>",
			onSelect: function (suggestion) {
			  $('#code').val(suggestion.code);
          	}
        });
		
		window.onload=function(){
			$("#lakalantas").attr('checked', false);
			$('input[name=jamin]').attr('checked', false);
			$('#penjamin').val('');
			if($('#jns_rawat').val()=="2" ){
				$('#tujuan').removeClass('hide');
			}else{
				$('#tujuan').addClass('hide');
			}
		}
		
	});
</script>