<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('pendaftaran/pendaftaran');?>">Home</a>
				</li>
				<li class="active">Cetak Pendaftaran</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1>
					PENDAFTARAN PASIEN BERHASIL
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<div class="widget-box">
						<div class="widget-header widget-header-blue widget-header-flat">
							<h4 class="widget-title lighter">Data Pasien</h4>
						</div>

						<div class="widget-body">
							<div class="widget-main">
							
								<div id="fuelux-wizard-container">
									<form class="form-horizontal" id="cetak_kartu" name="cetak_kartu" action="" method="POST">
									<input type="hidden" name="nomr" id="nomr" value="<?php echo $cetak['nomr']; ?>">
									<input type="hidden" name="idx" id="idx" value="<?php echo $cetak['id_daftar']; ?>">
                                    <input type="hidden" name="idpoli" id="idpoli" value="<?php echo $cetak['grId']; ?>">
									
                                    <div class="form-group">
										<div class="col-xs-12 col-sm-8">
										<table class="table table-striped table-hover" width="100%">
											<tr>
												<td width="30%">No Registrasi</td>
												<td>:</td>
												<td><?php echo $cetak['id_daftar']; ?></td>
											</tr>
											<tr>
												<td>Tgl Registrasi</td>
												<td>:</td>
												<td><?php echo $cetak['tgl_reg']; ?></td>
											</tr>
											<tr>
												<td>No MR</td>
												<td>:</td>
												<td><?php echo $cetak['nomr']; ?></td>
											</tr>
											<tr>
												<td>Nama</td>
												<td>:</td>
												<td><?php echo $cetak['nama']; ?></td>
											</tr>
											<tr>
												<td>Tempat/Tgl Lahir</td>
												<td>:</td>
												<td><?php echo $cetak['tempat_lahir'].", ".$cetak['tgl_lahir']; ?></td>
											</tr>
											<tr>
												<td>Tujuan</td>
												<td>:</td>
												<td><?php echo $cetak['grNama']; ?></td>
											</tr>
											<tr>
												<td>No SEP</td>
												<td>:</td>
												<td>
                                                    <input type="text" name="noSEP" id="noSEP" style="color: #000;" />
                                                    <!--<button type="button" id="simpanSEP" class="btn btn-sm btn-danger">SIMPAN SEP</button>-->
                                                    <button type="button" name="cek_n_cetak" id="cek_n_cetak" class="btn btn-sm btn-primary">CEK & CETAK SEP REG</button>
                                                </td>
											</tr>
                                            <tr>
                                                <td colspan="3">
                                                    <span id="span-loading">
                                                        <img src="<?php echo base_url('loader.gif') ?>" style="position: absolute;border: 0px solid #000;margin-top: -115px;margin-left: 350px; " />
                                                        Mohon... Tunggu. Server sedang memeriksa SEP ke Server BPJS
                                                    </span>
                                                </td>
                                            </tr>
										</table>
										</div>
										<div class="col-xs-12 col-sm-4">
											<input type="button" name="kartu" id="kartu" value="CETAK KARTU" class="btn btn-sm btn-primary btn-block" />
											<input type="button" name="registrasi" id="registrasi" value="CETAK REGISTRASI" class="btn btn-sm btn-primary btn-block" />
											<input type="button" name="rj" id="rj" value="CETAK SURAT MASUK ( RAWAT JALAN/IGD )" class="btn btn-sm btn-primary btn-block" />
											<input type="button" name="sr" id="sr" value="SURAT REGISTRASI RAWAT JALAN" class="btn btn-sm btn-primary btn-block" />
											<input type="button" name="stiker" id="stiker" value="CETAK STIKER" class="btn btn-sm btn-primary btn-block" />
                                            <a href="<?php echo base_url('pendaftaran/create_sep/'.$cetak['id_daftar']);?>" class="btn btn-sm btn-danger btn-block">CREATE SEP</a>
											<a href="<?php echo base_url('pendaftaran/daftar');?>" class="btn btn-sm btn-success btn-block">OK</a>
										</div>
										
									</div>
									</form>
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
jQuery(function($) {
    $('#span-loading').hide();
	$('#kartu').click(function(){
		var nomr = $("#nomr").val();
		var reqdata = "cetak_kartu";
		var url = '<?php echo base_url() .'pendaftaran/cetak/'; ?>'+nomr+'/'+reqdata;
		window.open(url);
	});
	$('#registrasi').click(function(){
		var idx = $("#idx").val();
        var poli = $("#idpoli").val();
		var reqdata = "cetak_registrasi";
		var url = '<?php echo base_url() .'pendaftaran/cetak/'; ?>'+idx+'/'+reqdata+'/'+poli;
		window.open(url);
	});
	$('#rj').click(function(){
		var nomr = $("#mr").val();
		var idx = $("#idx").val();
		var reqdata = "cetak_rj";
		var url = '<?php echo base_url() .'pendaftaran/cetaksuratmasuk/'; ?>'+idx+'/'+reqdata;
		window.open(url);
	});
	$('#sr').click(function(){
		var idx = $("#idx").val();
        var poli = $("#idpoli").val();
		var url = '<?php echo base_url() .'pendaftaran/cetak_sr/'; ?>'+idx+'/'+poli;
		window.open(url);
	});
	$('#stiker').click(function(){
		var nomr = $("#nomr").val();
		var reqdata = "cetak_stiker";
		var url = '<?php echo base_url() .'pendaftaran/cetak/'; ?>'+nomr+'/'+reqdata;
		window.open(url);
	});
	
	$('#simpanSEP').click(function(){
		var formdata = {}
			formdata['NO_SEP'] = $('#noSEP').val();
			formdata['id_daftar'] = '<?php echo $cetak['id_daftar'] ?>';
			formdata['noMr'] = '<?php echo $cetak['nomr'] ?>';
			formdata['jnsPelayanan'] = '2';

		if (formdata['NO_SEP']=="") {
			alert("No SEP Tidak boleh kosong");
		}else if(formdata['id_daftar']==""){
			alert("No Registrasi Tidak boleh kosong");
		}else if(formdata['noMr']==""){
			alert("No MR Tidak boleh kosong");
		}else if(formdata['jnsPelayanan']==""){
			alert("Jenis Pelayanan Tidak boleh kosong");
		}else{
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url().'pendaftaran/simpan_sep_rj'; ?>",
				data : formdata,
				dataType : "JSON",
				success:function(data){
					alert(data.message)
				},
				error:function(jqXhr, ajaxOptions, thrownError){
					alert('Error Function : '+jqXhr.responseText);
				}
			});
		}
	});

    $('#cek_n_cetak').click(function(){
        $('#span-loading').show();
        var a = $('#noSEP').val().trim();
		var b = '<?php echo $cetak['id_daftar'] ?>';
		var c = '<?php echo $cetak['nomr'] ?>';
		var d = 2;
        $.ajax({
            url         : '<?php echo base_url() .'pendaftaran/get_ceknosep'; ?>',
            type        : 'POST',
            data        : {nosep:a},
            dataType    : 'JSON',
            success     : function(data){
                $('#span-loading').hide(); 
				 
                if(data.MESSAGE=="OK"){
					if(data.LAYANAN == "1"){
						bootbox.alert("Tidak bisa mencetak SEP R.Inap...");
					}else if(data.NOREG == b && data.LAYANAN == "2"){
						var sep = data.NOSEP;
						var cetak = '<?php echo base_url().'pendaftaran/cetak_sep/'; ?>'+sep;
						window.open(cetak);
					}else{
						bootbox.alert("No Registrasi tidak cocok dengan No.SEP...");
					}
				}else{
					$.ajax({
						type : "POST",
						url  : "<?php echo base_url().'pendaftaran/get_cetaksep'; ?>",
						data : "nosep="+a,
						dataType: "JSON",
						success:function(data){
							console.log(data);
							// console.log(data.metaData.code);
							// console.log(data.response.noSep);
							var response =  data;  
							if(response.metaData.code=='200'){
								if(response.response.jnsPelayanan == "Rawat Inap"){
									bootbox.alert("Tidak bisa mencetak SEP R.Inap...");
								}else{
									if(response.response.peserta.noMr == c){
										$.ajax({
											type : "POST",
											url  : "<?php echo base_url().'pendaftaran/simpan_regsep'; ?>",
											data : "nosep="+a+"&nomr="+c+"&layanan="+d+"&noreg="+b,
											success:function(data){
													var cetak = '<?php echo base_url().'pendaftaran/cetak_sep/'; ?>'+a;
													window.open(cetak);                 
											},
											error:function(xhr, ajaxOptions, thrownError){
												alert('Error Function : '+thrownError);
											}
										});
									}else{
										var x = confirm("No MR tidak sama dengan yang anda entrikan pada aplikasi V-Claim\nApakah anda tetap mencetak SEP dan Register?");
										if(x){
											$.ajax({
												type : "POST",
												url  : "<?php echo base_url().'pendaftaran/simpan_regsep'; ?>",
												data : "nosep="+a+"&nomr="+c+"&layanan="+d+"&noreg="+b,
												success:function(data){
														var cetak = '<?php echo base_url().'pendaftaran/cetak_sep/'; ?>'+a;
														window.open(cetak);                 
												},
												error:function(xhr, ajaxOptions, thrownError){
													alert('Error Function : '+thrownError);
												}
											});
										}       
									}       
								}
							}else{
								alert(x.message);
							}     

							/**
							var response =  eval("(" + data + ")");  

							if(response.metaData.code=='200'){
								if(response.response.jnsPelayanan == "Rawat Inap"){
									bootbox.alert("Tidak bisa mencetak SEP R.Inap...");
								}else{
									if(response.response.peserta.noMr == c){
										$.ajax({
											type : "POST",
											url  : "<?php echo base_url().'pendaftaran/simpan_regsep'; ?>",
											data : "nosep="+a+"&nomr="+c+"&layanan="+d+"&noreg="+b,
											success:function(data){
													var cetak = '<?php echo base_url().'pendaftaran/cetak_sep/'; ?>'+a;
													window.open(cetak);                 
											},
											error:function(xhr, ajaxOptions, thrownError){
												alert('Error Function : '+thrownError);
											}
										});
									}else{
										var x = confirm("No MR tidak sama dengan yang anda entrikan pada aplikasi V-Claim\nApakah anda tetap mencetak SEP dan Register?");
										if(x){
											$.ajax({
												type : "POST",
												url  : "<?php echo base_url().'pendaftaran/simpan_regsep'; ?>",
												data : "nosep="+a+"&nomr="+c+"&layanan="+d+"&noreg="+b,
												success:function(data){
														var cetak = '<?php echo base_url().'pendaftaran/cetak_sep/'; ?>'+a;
														window.open(cetak);                 
												},
												error:function(xhr, ajaxOptions, thrownError){
													alert('Error Function : '+thrownError);
												}
											});
										}       
									}       
								}
							}else{
								alert(x.message);
							}        
							 */         
						},
						error:function(xhr, ajaxOptions, thrownError){
							alert('Error Function : '+thrownError);
						}
					});
				}
            },
            error   : function(jqXHR,ajaxOption,errorThrown){
                alert('Response : '+errorThrown);
                $('#span-loading').hide();    
            }
        });
    });
	
});

</script>
