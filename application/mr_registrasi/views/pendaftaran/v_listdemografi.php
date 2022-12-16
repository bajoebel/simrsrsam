<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('pendaftaran/list_demografi');?>">Home</a>
				</li>
				<li class="active">Laporan Demografi</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div id="fuelux-wizard-container">
				<form class="form-horizontal" id="formdemografi" name="formdemografi" method="POST">
				<div class="row">
					<div class="col-sm-12">
						<div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">DEMOGRAFI</h4>
							</div>
							<div class="widget-body">
								<br />
								<div class="row">
								<div class="col-sm-12">
								
								<div class="form-group">
									
									<label class="control-label col-xs-12 col-sm-offset-4 col-sm-2 no-padding-right">Tgl AWAL :</label>
									<div class="col-xs-12 col-sm-2">
										<div class="clearfix">
											<input type="text" name="tglAwal" id="tglAwal" class="date-picker" data-date-format="yyyy-mm-dd" style='color:#000000;' value="<?php echo date("Y-m-d"); ?>" readonly/>
										</div>
									</div>
									
									<label class="control-label col-xs-12 col-sm-1 no-padding-right">Tgl AKHIR :</label>
									<div class="col-xs-12 col-sm-2">
										<div class="clearfix">
											<input type="text" name="tglAkhir" id="tglAkhir" class="date-picker" data-date-format="yyyy-mm-dd" style='color:#000000;' value="<?php echo date("Y-m-d"); ?>" readonly/>
										</div>
									</div>
									
									<div class="col-xs-12 col-sm-1">
										<button class="btn btn-sm btn-primary" name="cari" id="cari" type="button">
											CARI
										</button>
									</div>
								</div>
								
								</div>
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-4">
									<h4 class="widget-title">Hambatan Bahasa</h4>
											<table class="table table-bordered table-hover" style='color:#000000;'>
												<thead>
													<tr>
														<th class="center">ADA</th>
														<th class="center">TIDAK</th>
													</tr>
												</thead>
												<tbody id="getHambatan"></tbody>
											</table>
									</div>
									
									<div class="col-sm-4">
									<div style="padding:3px;overflow-y:scroll;overflow-x:scroll;height:400px;border:1px solid grey" class="col-xs-12">
											<table class="table table-bordered table-hover" style='color:#000000;'>
												<thead>
													<tr>
														<th class="center">NO</th>
														<th class="center">BAHASA</th>
														<th class="center">JUMLAH</th>
													</tr>
												</thead>
												<tbody id="getBahasa"></tbody>
											</table>
									</div>
									</div>
									
									<div class="col-sm-4">
									<div style="padding:3px;overflow-y:scroll;overflow-x:scroll;height:400px;border:1px solid grey" class="col-xs-12">
											<table class="table table-bordered table-hover" style='color:#000000;'>
												<thead>
													<tr>
														<th class="center">NO</th>
														<th class="center">ETNIS</th>
														<th class="center">JUMLAH</th>
													</tr>
												</thead>
												<tbody id="getEtnis"></tbody>
											</table>
									</div>
									</div>
									
									</div>
								</div>
				</div>	
				</form>
			</div>
							
		</div><!-- /.page-content -->
	</div>
</div>

<script type="text/javascript">
jQuery(function($) {
		$('[data-rel=tooltip]').tooltip();
	
		$('.select2').css('width','200px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		}); 
		
		$(document).one('ajaxloadstart.page', function(e) {
			//in ajax mode, remove remaining elements before leaving page
			$('[class*=select2]').remove();
		});
		
		$('.date-picker').css('width','150px').datepicker({
					autoclose: true,
					todayHighlight: true
		})
		//show datepicker when clicking on the icon
		.next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
		
		$('#cari').click(function(){
			
			var tglAwal = $("#tglAwal").val();
			var tglAkhir = $("#tglAkhir").val();
			
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url().'pendaftaran/get_hambatanbahasa'; ?>",
				data : "tglAwal="+tglAwal+"&tglAkhir="+tglAkhir,
				beforeSend  : function(){
					$('tbody#getHambatan').html("<tr><td colspan=5>Loading... Please wait</td></tr>");
				},
				success     : function(data){
					$('tbody#getHambatan').html(data);
				},
				error       : function(jqXHR,ajaxOption,errorThrown){
					alert(errorThrown);
				}
			});
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url().'pendaftaran/get_bahasa'; ?>",
				data : "tglAwal="+tglAwal+"&tglAkhir="+tglAkhir,
				beforeSend  : function(){
					$('tbody#getBahasa').html("<tr><td colspan=5>Loading... Please wait</td></tr>");
				},
				success     : function(data){
					$('tbody#getBahasa').html(data);
				},
				error       : function(jqXHR,ajaxOption,errorThrown){
					alert(errorThrown);
				}
			});
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url().'pendaftaran/get_etnis'; ?>",
				data : "tglAwal="+tglAwal+"&tglAkhir="+tglAkhir,
				beforeSend  : function(){
					$('tbody#getEtnis').html("<tr><td colspan=5>Loading... Please wait</td></tr>");
				},
				success     : function(data){
					$('tbody#getEtnis').html(data);
				},
				error       : function(jqXHR,ajaxOption,errorThrown){
					alert(errorThrown);
				}
			});
			
		});
});
	
</script>