<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('pendaftaran/list_jnslayanan');?>">Home</a>
				</li>
				<li class="active">Laporan Jenis Layanan / User</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div id="fuelux-wizard-container">
				<form class="form-horizontal" id="formkunjungan" name="formkunjungan" method="POST">
				<div class="row">
					<div class="col-sm-12">
						<div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title">LAPORAN JENIS LAYANAN / USER</h4>
							</div>
							<div class="widget-body">
								<br />
								<div class="row">
								<div class="col-sm-4">
								
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-4 no-padding-right">TGL. AWAL :</label>
									<div class="col-xs-12 col-sm-8">
										<div class="clearfix">
											<input type="text" name="tgl1" id="tgl1" class="date-picker" data-date-format="yyyy-mm-dd" style='color:#000000;' value="<?php echo date("Y-m-d"); ?>" readonly/>
											<input type="text" id="jam1" style="width:50px"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-4 no-padding-right">TGL. AKHIR :</label>
									<div class="col-xs-12 col-sm-8">
										<div class="clearfix">
											<input type="text" name="tgl2" id="tgl2" class="date-picker" data-date-format="yyyy-mm-dd" style='color:#000000;' value="<?php echo date("Y-m-d"); ?>" readonly/>
											<input type="text" id="jam2" style="width:50px"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-sm-offset-1 col-sm-11">
										<div class="clearfix">
											<button class="btn btn-sm btn-primary" name="cari" id="cari" type="button">
											CARI
											</button>
										</div>
									</div>
								</div>
								</div>
								
								<div class="col-sm-4">
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-4 no-padding-right">UNIT DAFTAR :</label>
									<div class="col-xs-12 col-sm-8">
										<div class="clearfix">
											<select class="select2" id="poli" name="poli" data-placeholder="Klik untuk memilih poli..." style='color:#000000;'>
											<option value="">-- Pilih Poli --</option>
												<?php
												foreach($poly as $pol){
												?>
												<option value="<?php echo $pol->grId ?>" <?php error_reporting(0);?>><?php echo $pol->grNama ?></option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-4 no-padding-right">JNS LAYANAN :</label>
									<div class="col-xs-12 col-sm-8">
										<div class="clearfix">
											<select id="layanan" name="layanan" style='color:#000000;'>
											<option value="1">UMUM</option>
											<option value="2">JKN</option>
											</select>
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
										<th class="center">NOREG</th>
										<th class="center">NOMR</th>
										<th class="center">NAMA</th>
										<th class="center">UNIT DAFTAR</th>
										<th class="center">TGL DAFTAR</th>
										<th class="center">USER</th>
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
		
		$('#jam1').mask('99:99');
		$('#jam2').mask('99:99');
		
		$('#cari').click(function(){
			
			var tgl1 = $("#tgl1").val();
			var tgl2 = $("#tgl2").val();
			var jam1 = $("#jam1").val();
			var jam2 = $("#jam2").val();
			var poli = $("#poli").val();
			var layanan = $("#layanan").val();
			
			if(tgl1=="" || tgl2==""){
				bootbox.alert("Periode tanggal tidak boleh kosong...");
				document.formkunjungan.tgl1.focus();
				return false;
			}
			if(jam1=="" || jam2==""){
				bootbox.alert("Jam tidak boleh kosong...");
				document.formkunjungan.jam1.focus();
				return false;
			}
			if(poli==""){
				bootbox.alert("Poli tidak boleh kosong...");
				document.formkunjungan.poli.focus();
				return false;
			}
			
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url().'pendaftaran/get_jnslayanan'; ?>",
				data : "tgl1="+tgl1+"&tgl2="+tgl2+"&jam1="+jam1+"&jam2="+jam2+"&poli="+poli+"&layanan="+layanan,
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
			var tgl1 = $("#tgl1").val();
			var tgl2 = $("#tgl2").val();
			var jam1 = $("#jam1").val();
			var jam2 = $("#jam2").val();
			var poli = $("#poli").val();
			var layanan = $("#layanan").val();
			
			var url = "<?php echo base_url() .'pendaftaran/cetak_jnslayanan?tgl1=' ?>"+tgl1+"&tgl2="+tgl2+"&jam1="+jam1+"&jam2="+jam2+"&poli="+poli+"&layanan="+layanan+"&req="+"cetak";
			window.open(url);
			
		});
		
		$("#export").click(function(){
			var tgl1 = $("#tgl1").val();
			var tgl2 = $("#tgl2").val();
			var jam1 = $("#jam1").val();
			var jam2 = $("#jam2").val();
			var poli = $("#poli").val();
			var layanan = $("#layanan").val();
			
			var url = "<?php echo base_url() .'pendaftaran/cetak_jnslayanan?tgl1=' ?>"+tgl1+"&tgl2="+tgl2+"&jam1="+jam1+"&jam2="+jam2+"&poli="+poli+"&layanan="+layanan+"&req="+"excel";
            window.open(url);
        });
		
});
	
</script>