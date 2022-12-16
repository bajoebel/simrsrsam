<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="<?php echo base_url('pendaftaran/list_sep');?>">Home</a>
                </li>

                <li class="active">List Pasien SEP</li>
            </ul>
            </div>

            <div class="page-content">
                    <div class="page-header">
                            <h1>
                                    LIST PASIEN SEP
                            </h1>
                    </div><!-- /.page-header -->

                <div class="form-horizontal">
				<div class="row">
				<div class="col-xs-12">
					<div class="col-sm-6">
						<div class="form-group">
						<label class="control-label col-xs-12 col-sm-2 no-padding-left">Pasien :</label>
							<div class="col-xs-12 col-sm-10">
								<div class="clearfix">
									<input type="text" name="nama" id="nama" class="col-xs-6 col-sm-6" style='color:#000000;' readonly/>
									<input type="text" name="noktp" id="noktp" class="col-xs-6 col-sm-6" style='color:#000000;' readonly/>
								</div>
                        	</div>
						</div>
						
						<div class="form-group hide" id="t_bpjs">
						<label class="control-label col-xs-12 col-sm-2 no-padding-left">No BPJS :</label>
							<div class="col-xs-12 col-sm-10">
								<div class="clearfix">
									<input type="text" name="nobpjs" id="nobpjs" class="col-xs-6 col-sm-6" style='color:#000000;' />
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-sm-6">
						<div class="form-group">
                        <div class="input-group">
                            <input type="text" name="nomr" id="nomr" class="limited col-sm-offset-6 col-xs-12 col-sm-6" maxlength="10" onkeypress="return hanyaAngka(event)" placeholder="Pencarian NoMR" style='color:#000000;' value="<?php echo $nomr; ?>"/>
                            <span class="input-group-btn">
                                <button id="cek" name="cek" type="button" class="btn btn-primary btn-sm" data-toggle="button" data-loading-text="Loading...">
                                        <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                        Search
                                </button>
                            </span>
                        </div>
                        </div>
					</div>
					</div>
						
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="clearfix">
                                        <div class="pull-right tableTools-container"></div>
                                </div>
                               
                                <div style="padding:3px;overflow-y:scroll;overflow-x:scroll;height:330px;border:1px solid grey" class="col-xs-12">
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
						<div class="modal-footer hide" id="t_sep">
								<button class="btn btn-sm btn-danger" name="ceknosep" id="ceknosep" data-toggle="button">
									No. SEP tidak ditemukan
								</button>
						</div>
                            <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
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
								<input type="hidden" name="nosep_plg" id="nosep_plg" class="col-xs-12 col-sm-12" style='color:#000000;'/>
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
<div id="modal-reg" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                    <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <span class="white">&times;</span>
                            </button>
                            KONFIRMASI NOMOR REGISTRASI
                    </div>
            </div>

            <div class="modal-body no-padding">
			<br />
                <form class="form-horizontal">
					<div class="row">
						<div class="col-sm-12">
							
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-2 no-padding-left">No SEP :</label>

								<div class="col-xs-12 col-sm-10">
									<div class="clearfix">
										<input type="text" name="nosep" id="nosep" class="col-xs-12 col-sm-6" style='color:#000000;' readonly/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-2 no-padding-left">Pasien :</label>
								<div class="col-xs-12 col-sm-10">
									<div class="clearfix">
										<input type="text" name="pasien" id="pasien" class="col-xs-12 col-sm-6" style='color:#000000;' readonly/>
										<input type="text" name="nomr_pasien" id="nomr_pasien" class="col-xs-12 col-sm-3" style='color:#000000;' readonly/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-2 no-padding-left">Layanan :</label>
								<div class="col-xs-12 col-sm-10">
									<div class="clearfix">
										<input type="text" name="layanan" id="layanan" class="col-xs-12 col-sm-4" style='color:#000000;' readonly/>
										<input type="hidden" name="jns_layanan" id="jns_layanan" class="col-xs-12 col-sm-4" style='color:#000000;' readonly/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-2 no-padding-left">No REG :</label>
								<div class="col-xs-12 col-sm-10">
									<div class="clearfix">
										<select class="select2" id="noreg" name="noreg" data-placeholder="Klik untuk memilih No Registrasi Pasien..." style='color:#000000;'>
										<option value="">Klik untuk memilih No Registrasi Pasien...</option>
										</select>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</form>
            </div>
			<div class="modal-footer" id="tombol">
				<button class="btn btn-sm btn-primary hide" data-dismiss="modal" name="simpan" id="simpan">
					<i class="ace-icon fa fa-check"></i>
					Save
				</button>
				
				<button class="btn btn-sm btn-primary hide" data-dismiss="modal" name="edit" id="edit">
					<i class="ace-icon fa fa-check"></i>
					Update
				</button>
			</div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div id="modal-sep" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                    <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <span class="white">&times;</span>
                            </button>
                            CARI NO. SEP
                    </div>
            </div>

            <div class="modal-body no-padding">
			<br />
                <div class="form-horizontal">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-left">No SEP :</label>

								<div class="col-xs-12 col-sm-7">
									<div class="input-group">
										<input type="text" name="nosep_c" id="nosep_c" class="col-xs-12 col-sm-12" style='color:#000000;'/>
										<span class="input-group-btn">
											<button id="carinosep" name="carinosep" type="button" class="btn btn-primary btn-sm" data-toggle="button" data-dismiss="modal">
													<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
													Search
											</button>
										</span>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
    function hanyaAngka(evt) {
		$('#t_bpjs').addClass('hide');
		$('#t_sep').addClass('hide');
		$('#getdata').html("");
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		
		return false;
		return true;
	}
	jQuery(function($) {
        $('[data-rel=tooltip]').tooltip();
		
		$('.select2').css('width','450px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		}); 
		$(document).one('ajaxloadstart.page', function(e) {
			//in ajax mode, remove remaining elements before leaving page
			$('[class*=select2]').remove();
		});
        
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        })
		.next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
		
		$('#ceknosep').click(function(){
			$('#modal-sep').modal('show');
		});
		
		$('#nosep_c').keydown(function(e){
            if($(this).val() !== ""){
                if(e.keyCode==13){
                    $('#carinosep').click();
                }
            }
        })
		
		$('#carinosep').click(function(){
			var nosep= $('#nosep_c').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url().'pendaftaran/get_cetaksep'; ?>",
				data : "nosep="+nosep,
				dataType:"JSON",
				success:function(data){
					$('#getdata').html("");
					// var response =  eval("(" + data + ")");
					var response =  data;
					if(response.metaData.code=='200'){
						$('#nosep_c').val("");
						buatTabel = "";
								buatTabel += "<tr>"
								+ "<td>" + 1 + "</td>"
								+ "<td>" + response.response.noSep + "</td>"
								+ "<td>" + response.response.tglSep + "</td>"
								+ "<td>" + response.response.poli + "</td>"
								+ "<td>" + response.response.jnsPelayanan + "</td>"
								+ "<td>" + response.response.diagnosa + "</td>"
								+ "<td> <a onclick=\"nosepprint('"+ response.response.noSep +"','"+ response.response.jnsPelayanan +"')\" data-rel='tooltip' data-placement='left' title='Cetak'> <i class='ace-icon fa fa-print bigger-130'></i> </a> </td>"
								+ "<tr/>";
						
						$('#getdata').html(buatTabel);
					}else{
						alert(response.metadata.message);
					}                  
				},
				error:function(xhr, ajaxOptions, thrownError){
					alert('Error Function : '+thrownError);
				}
			});
		});
		
		$('#nomr').keydown(function(e){
            if($(this).val() !== ""){
                if(e.keyCode==13){
                    $('#cek').click();
                }
            }
        })
		
		$('#cek').click(function(){
			var btn = $(this);
			btn.button('loading')
			
			var nomr_pasien = $("#nomr").val();
			
			$.ajax({ 
				type	: 'POST',
				url		: "<?php echo base_url().'pendaftaran/nomr_pasien'; ?>", 
				data	: "nomr="+nomr_pasien, 
				dataType: "JSON", 
				success	: function(data){ 
					console.log(data)
					if(data.MESSAGE=="OK"){
						$("#nama").val(data.NAMA);
						$("#noktp").val('No. KTP - '+data.KTP);
						$("#nobpjs").val(data.NOBPJS);
						
						$('#nomr_pasien').val(nomr_pasien);
						$("#pasien").val(data.NAMA);
						
						var nopeserta = data.NOBPJS;
						btn.button('reset')
						$('#t_bpjs').removeClass('hide');
						$('#t_sep').removeClass('hide');
						
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
													+ "<td align=center> <a onclick=\"nosepprint('"+ response.list[a].nosep +"')\" data-rel='tooltip' data-placement='left' title='Cetak'> <i class='ace-icon fa fa-print bigger-130'></i> </a> </td>"
													+ <!-- "<td> <a onclick=\"nosephapus('"+ response.list[a].nosep +"')\" data-rel='tooltip' data-placement='left' title='Hapus'> <i class='ace-icon fa fa-remove bigger-130'></i> </a> </td>" -->
													<?php if($this->session->userdata("kualifikasi") == "1"){ ?>
													"<td> <a onclick=\"editreg('"+ response.list[a].nosep +"','"+ response.list[a].layanan +"')\" class='btn btn-sm btn-success btn-block'>Ubah Registrasi</a></td>"
													<?php }?>
											+ "<tr/>";
									}
									$('#getdata').html(buatTabel);  
													
								},
								error:function(xhr, ajaxOptions, thrownError){
									alert('Error Function : '+thrownError);
								}
							});
					}else{
						$("#nama").val(data.NAMA);
						$("#noktp").val("");
						$("#nobpjs").val("");
						btn.button('reset')
                        bootbox.alert(data.MESSAGE);
                    } 
				}
			});
		});
		
		$('#nobpjs').keydown(function(e){
            if($(this).val() !== ""){
                if(e.keyCode==13){
				var nomr_pasien = $("#nomr").val();
				var nopeserta = $('#nobpjs').val();
				$.ajax({
					type : "POST",
					url  : "<?php echo base_url().'pendaftaran/get_jkn'; ?>",
					data : "nopeserta="+nopeserta,
					success:function(data){
					$('#getdata').html("");
						var response =  eval("(" + data + ")");
						if(response.metaData.code=='200'){
							
							if($('#nomr').val() != response.response.peserta.mr.noMR){
								bootbox.alert("No Kartu BPJS tidak sama dengan NoMR Pasien...");
							}else{
							$.ajax({
								type : "POST",
								url  : "<?php echo base_url().'pendaftaran/get_riwayat'; ?>",
								data : "nopeserta="+nopeserta,
								success:function(data){
								//document.getElementsByTagName("table")[0].innerHTML = data;
								$('#getdata').html("");
								$('#nomr_pasien').val(nomr_pasien);
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
													+<!-- "<td> <a onclick=\"nosephapus('"+ response.list[a].nosep +"')\" data-rel='tooltip' data-placement='left' title='Hapus'> <i class='ace-icon fa fa-remove bigger-130'></i> </a> </td>" -->
											+ "<tr/>";
									}
									$('#getdata').html(buatTabel);  
													
								},
								error:function(xhr, ajaxOptions, thrownError){
									alert('Error Function : '+thrownError);
								}
							});
							}
							
						}else{
							bootbox.alert(response.metadata.message);
						}                  
					},
					error:function(xhr, ajaxOptions, thrownError){
						alert('Error Function : '+thrownError);
					}
				});
                }
            }
        });
		
		$('#simpan').click(function(){
			var nopeserta 	= $('#nobpjs').val();
			var nosep 		= $('#nosep').val();
			var nomr 		= $('#nomr_pasien').val();
			var noreg 		= $('#noreg').val();
			if(noreg == ""){
				bootbox.alert("No Registrasi tidak boleh kosong !!!");
				return false;
			}
			if($('#jns_layanan').val()=="Rawat Inap"){
				var layanan 	= 1;
			}else if($('#jns_layanan').val()=="Rawat Jalan"){
				var layanan 	= 2;
			}else{
				bootbox.alert("Jenis layanan tidak boleh kosong !!!");
				return false;
			}
			$.ajax({
                type : "POST",
                url  : "<?php echo base_url().'pendaftaran/simpan_regsep'; ?>",
                data : "nosep="+nosep+"&nomr="+nomr+"&layanan="+layanan+"&noreg="+noreg+"&nopeserta="+nopeserta,
                success:function(data){
						var cetak = '<?php echo base_url().'pendaftaran/cetak_sep/'; ?>'+nosep;
						window.open(cetak);                 
                },
                error:function(xhr, ajaxOptions, thrownError){
                    alert('Error Function : '+thrownError);
                }
            });
		});
		
		$('#edit').click(function(){
			var nopeserta 	= $('#nobpjs').val();
			var nosep 		= $('#nosep').val();
			var nomr 		= $('#nomr_pasien').val();
			var noreg 		= $('#noreg').val();
			if(noreg == ""){
				bootbox.alert("No Registrasi tidak boleh kosong !!!");
				return false;
			}
			if($('#jns_layanan').val()=="Rawat Inap"){
				var layanan 	= 1;
			}else if($('#jns_layanan').val()=="Rawat Jalan"){
				var layanan 	= 2;
			}else{
				bootbox.alert("Jenis layanan tidak boleh kosong !!!");
				return false;
			}
			$.ajax({
                type : "POST",
                url  : "<?php echo base_url().'pendaftaran/edit_regsep'; ?>",
                data : "nosep="+nosep+"&nomr="+nomr+"&layanan="+layanan+"&noreg="+noreg+"&nopeserta="+nopeserta,
                success:function(data){
						var cetak = '<?php echo base_url().'pendaftaran/cetak_sep/'; ?>'+nosep;
						window.open(cetak);                 
                },
                error:function(xhr, ajaxOptions, thrownError){
                    alert('Error Function : '+thrownError);
                }
            });
		});
		
		$('#update').click(function(){
			var nosep 	= $('#nosep_plg').val();
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
		
		$('input.limited').inputlimiter({
			remText: '%n character%s remaining...',
			limitText: 'max allowed : %n.'
		});
		
    });
	function nosepmodal(a){
		$('#modal-update').modal('show');
		$("#sepupdate").html(a);
		$("#nosep_plg").val(a);
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
								$('#cek').click();
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
	function nosepprint(a,b){
		var nomr = $('#nomr').val();
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
					 $('#noreg').html("");
						$('.select2').css('width','450px').select2({allowClear:true})
						.on('change', function(){
							$(this).closest('form').validate().element($(this));
						});
					 $('#nosep').val(a);
					 $('#layanan').val(b);
					 $('#jns_layanan').val(b);
					 $('#simpan').removeClass('hide');
		 			 $('#edit').addClass('hide');
					 var nomr_pasien = $("#nomr").val();
							$.ajax({
								type : "POST",
								url  : "<?php echo base_url().'pendaftaran/add_noreg'; ?>",
								data : "nomr="+nomr_pasien+"&jns_layanan="+b,
								success:function(data){
									var response =  eval("(" + data + ")");
									jmlData = response.jml;
									tampilNoreg = "";
									tampilNoreg += "<option value=''>"+" Pilih No Registrasi Pasien "+"</option>";
									for(a = 0; a < jmlData; a++){
											tampilNoreg += "<option value ='"+ response.suggestions[a].noreg +"'>"
											+response.suggestions[a].noreg+" - "+response.suggestions[a].ruang+" - (TGL REG. "+response.suggestions[a].tgl
											+")</option>";
									}
									$('#noreg').html(tampilNoreg);                
								},
								error:function(xhr, ajaxOptions, thrownError){
									alert('Error Function : '+thrownError);
								}
							});
					 $('#modal-reg').modal('show');
				}                  
			}
		});
	}
	function editreg(a,b){
		$('#noreg').html("");
			$('.select2').css('width','450px').select2({allowClear:true})
			.on('change', function(){
				$(this).closest('form').validate().element($(this));
			});
		if(b == 1){
			var jp = "Rawat Inap";
		}else{
			var jp = "Rawat Jalan";
		}
		 $('#nosep').val(a);
		 $('#layanan').val(jp);
		 $('#jns_layanan').val(jp);
		 $('#simpan').addClass('hide');
		 $('#edit').removeClass('hide');
		 var nomr_pasien = $("#nomr").val();
				$.ajax({
					type : "POST",
					url  : "<?php echo base_url().'pendaftaran/add_noreg'; ?>",
					data : "nomr="+nomr_pasien+"&jns_layanan="+jp,
					success:function(data){
						var response =  eval("(" + data + ")");
						jmlData = response.jml;
						tampilNoreg = "";
						tampilNoreg += "<option value=''>"+" Pilih No Registrasi Pasien "+"</option>";
						for(a = 0; a < jmlData; a++){
								tampilNoreg += "<option value ='"+ response.suggestions[a].noreg +"'>"
								+response.suggestions[a].noreg+" - "+response.suggestions[a].ruang+" - (TGL REG. "+response.suggestions[a].tgl
								+")</option>";
						}
						$('#noreg').html(tampilNoreg);                
					},
					error:function(xhr, ajaxOptions, thrownError){
						alert('Error Function : '+thrownError);
					}
				});
		 $('#modal-reg').modal('show');
	
	}
</script>