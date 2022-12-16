<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('pendaftaran/list_riwayatranap');?>">Home</a>
				</li>
				<li class="active">Riwayat Pasien Rawat Inap</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1>
					RIWAYAT PASIEN RAWAT INAP
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<div class="widget-box">

						<div class="widget-body">
							<div class="widget-main">
							
								<div id="fuelux-wizard-container">
									<form class="form-horizontal" id="pendaftaran" name="pendaftaran" action="" method="POST">
										<div class="row">
												<div class="col-sm-6">
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">No MR:</label>
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="nomr" id="nomr" class="limited col-xs-12 col-sm-6" maxlength="10" placeholder="Pencarian NOMR"/>
																		<button id="cari" name="cari" type="button" class="btn btn-primary btn-sm" data-toggle="button">
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
																		<input type="text" name="ktp" id="ktp" class="col-xs-12 col-sm-9" readonly/>
																	</div>
																</div>
															</div>
			
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Nama Pasien:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="nama" id="nama" class="col-xs-12 col-sm-11" readonly/>
																	</div>
																</div>
															</div>
			
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tempat/Tgl Lahir:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="ttl" id="ttl" class="col-xs-12 col-sm-11" readonly/>
																	</div>
																</div>
															</div>
			
															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right">Jenis Kelamin:</label>
			
																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" name="jk" id="jk" class="col-xs-12 col-sm-5" readonly/>
																	</div>
																</div>
															</div>
												</div>
												
												<div class="col-xs-12">
												<div style="padding:3px;overflow-y:scroll;overflow-x:scroll;height:200px;border:1px solid grey" class="col-xs-12">
													<div class="clearfix">
															<div class="pull-right tableTools-container"></div>
													</div>
														<table class="table table-bordered table-hover">
															<thead>
																<tr>
																	<th class="center">NO</th>
																	<th class="center">NO REG</th>
																	<th class="center">TGL MASUK</th>
																	<th class="center">TGL KELUAR</th>
																	<th class="center">RUANG</th>
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
	
		$('.select2').css('width','300px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
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
					}else{
						$("#ktp").val("");
						$("#nama").val("");
						$("#ttl").val("");
						$("#jk").val("");
                        bootbox.alert(data.MESSAGE);
                    } 
				}
			}); 
			
			$.ajax({
                type : "POST",
                url  : "<?php echo base_url().'pendaftaran/get_riwayatranap'; ?>",
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
									+ "<td>" + response.pasien[a].tglmasuk + "</td>"
									+ "<td>" + response.pasien[a].tglkeluar + "</td>"
									+ "<td>" + response.pasien[a].ruang + "</td>"
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
		
	});
</script>