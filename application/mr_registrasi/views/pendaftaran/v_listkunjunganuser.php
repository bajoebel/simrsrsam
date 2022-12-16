<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('pendaftaran/list_kunjungan_user');?>">Home</a>
				</li>
				<li class="active">Laporan Kunjungan Peruser</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div id="fuelux-wizard-container">
				<form class="form-horizontal" id="formkunjungan" name="formkunjungan" method="POST">
				<div class="row">
					<div class="col-sm-12">
						<div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">KUNJUNGAN PASIEN PERUSER</h4>
							</div>
							<div class="widget-body">
								<br />
								<div class="row">
									<div class="col-sm-4">
									
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-4 no-padding-right">Tgl AWAL :</label>
										<div class="col-xs-12 col-sm-8">
											<div class="clearfix">
												<input type="text" name="tglAwal" id="tglAwal" class="date-picker" data-date-format="yyyy-mm-dd" style='color:#000000;' value="<?php echo date("Y-m-d"); ?>"/>
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-4 no-padding-right">Tgl AKHIR :</label>
										<div class="col-xs-12 col-sm-8">
											<div class="clearfix">
												<input type="text" name="tglAkhir" id="tglAkhir" class="date-picker" data-date-format="yyyy-mm-dd" style='color:#000000;' value="<?php echo date("Y-m-d"); ?>"/>
											</div>
										</div>
									</div>
									<hr />
									<div class="col-xs-12 col-sm-12">
										<button class="btn btn-primary" name="cari" id="cari" type="button">
											CARI
										</button>
										<button class="btn btn-default" name="cetak" id="cetak">
											CETAK
										</button>
									</div>
									
									</div>
									
									<div class="col-sm-8">
									<div style="padding:3px;overflow-y:scroll;overflow-x:scroll;height:400px;border:1px solid grey" class="col-xs-12">
											<table class="table table-bordered table-hover" style='color:#000000;'>
												<thead>
													<tr>
														<th class="center">NO</th>
														<th class="center">NAMA USER</th>
														<th class="center">RAWAT JALAN</th>
														<th class="center">RAWAT INAP</th>
														<th class="center">JUMLAH</th>
													</tr>
												</thead>
												<tbody id="getData"></tbody>
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
				url  : "<?php echo base_url().'pendaftaran/get_kunjunganuser'; ?>",
				data : "tglAwal="+tglAwal+"&tglAkhir="+tglAkhir,
				beforeSend  : function(){
					$('tbody#getData').html("<tr><td colspan=5>Loading... Please wait</td></tr>");
				},
				success     : function(data){
					$('tbody#getData').html(data);
				},
				error       : function(jqXHR,ajaxOption,errorThrown){
					alert(errorThrown);
				}
			});
		});
		
		$('#cetak').click(function(){
			var tglAwal = $("#tglAwal").val();
			var tglAkhir = $("#tglAkhir").val();
			var url = "<?php echo base_url() .'pendaftaran/cetak_kunjunganuser?tglAwal=' ?>"+tglAwal+"&tglAkhir="+tglAkhir;
			window.open(url);
			
		});
});
	
</script>