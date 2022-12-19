<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('pendaftaran/list_harianranap');?>">Home</a>
				</li>
				<li class="active">Daftar Harian Pasien</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div id="fuelux-wizard-container">
				<form class="form-horizontal" id="formkunjungan" name="formkunjungan" method="POST">
				<div class="row">
					<div class="col-sm-12">
						<div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">DAFTAR HARIAN PASIEN RAWAT INAP</h4>
							</div>
							<div class="widget-body">
								<br />
								<div class="row">
								<div class="col-sm-12">
								
								<div class="form-group">
									
									<label class="control-label col-xs-12 col-sm-1 no-padding-right">TANGGAL :</label>
									<div class="col-xs-12 col-sm-3">
										<div class="clearfix">
											<input type="text" name="tgl" id="tgl" class="date-picker" data-date-format="yyyy-mm-dd" style='color:#000000;' value="<?php echo date("Y-m-d"); ?>" readonly/>
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
					</div>
					<div class="col-xs-12">
					<div style="padding:3px;overflow-y:scroll;overflow-x:scroll;height:350px;border:1px solid grey" class="col-xs-12">
							<table class="table table-bordered table-hover" style='color:#000000;'>
								<thead>
									<tr>
										<th class="center">NO</th>
										<th class="center">NOMR</th>
										<th class="center">NAMA</th>
										<th class="center">NO HP</th>
										<th class="center">DIAGNOSA</th>
										<th class="center">USIA</th>
										<th class="center">TGL MASUK</th>
										<th class="center">DPJP</th>
										<th class="center">UNIT PELAYANAN</th>
									</tr>
								</thead>
								<tbody id="getData"></tbody>
							</table>
					</div>
					</div>
				</div>	
				</form>
			</div>
								

			<hr />
			<div>
				<button class="btn btn-primary" name="cetak" id="cetak">
					CETAK
				</button>
				<button class="btn btn-default" name="export" id="export">
					EXCEL
				</button>
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
			
			var tgl = $("#tgl").val();
			
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url().'pendaftaran/get_harianranap'; ?>",
				data : "tgl="+tgl,
				beforeSend  : function(){
					$('tbody#getData').html("<tr><td colspan=7>Loading... Please wait</td></tr>");
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
			var tgl = $("#tgl").val();
			
			var url = "<?php echo base_url() .'pendaftaran/cetak_harianranap?tgl=' ?>"+tgl+"&req="+"cetak";
			window.open(url);
			
		});
		
		$("#export").click(function(){
			var tgl = $("#tgl").val();
			
			var url = "<?php echo base_url() .'pendaftaran/cetak_harianranap?tgl=' ?>"+tgl+"&req="+"excel";
            window.open(url);
        });
		
});
	
</script>