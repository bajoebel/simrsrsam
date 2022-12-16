<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="<?php echo base_url('pendaftaran/list_online');?>">Home</a>
                </li>

                <li class="active">Laporan Pendaftaran Online</li>
            </ul>
            </div>

            <div class="page-content">
                    <div class="page-header">
                            <h1>
                                    PASIEN LAMA ONLINE
                            </h1>
                    </div><!-- /.page-header -->

                <div class="form-horizontal">
				<div class="row">
				<div class="col-xs-12">
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
							<button class="btn btn-sm btn-primary" name="cari" id="cari" type="button" data-toggle="button" data-loading-text="Loading...">
								CARI
							</button>
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
												<th class="center">KODE BOOKING</th>
												<th class="center">CARA BEROBAT</th>
												<th class="center">NOMR</th>
												<th class="center">NAMA</th>
												<th class="center">NO BPJS</th>
												<th class="center">NO RUJUKAN</th>
												<th class="center">TGL KONTROL</th>
												<th class="center">NO HP</th>
												<th class="center">TUJUAN</th>
												<th class="center">TGL BOOKING</th>
												<th class="center">STATUS</th>
												<th class="center">ALASAN</th>
											</tr>
										</thead>
										<tbody id="getdata">
										</tbody>
									</table>
                                </div>
                            </div>
                        </div>
                            <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
					
                </div><!-- /.row -->
				</div>
				<hr />
					<div>
						<button class="btn btn-primary" name="cetak" id="cetak">
							CETAK
						</button>
					</div>
            </div><!-- /.page-content -->
    </div>
</div>  

<script type="text/javascript">
    function hanyaAngka(evt) {
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
		
		$('#cari').click(function(){
			var btn = $(this);
			btn.button('loading')
			
			var tgl1 = $("#tglAwal").val();
			var tgl2 = $("#tglAkhir").val();
			
			$.ajax({ 
				type	: 'POST',
				url		: "<?php echo base_url().'pendaftaran/get_laponline'; ?>", 
				data	: "tgl1="+tgl1+"&tgl2="+tgl2, 
				
				beforeSend  : function(){
					btn.button('reset')
					$('tbody#getdata').html("<tr><td colspan=13>Loading... Please wait</td></tr>");
				},
				success     : function(data){
					btn.button('reset')
					$('tbody#getdata').html(data);
				},
				error       : function(jqXHR,ajaxOption,errorThrown){
					btn.button('reset')
					alert(errorThrown);
				}
							
			});
		});
		$('#cetak').click(function(){
			var tglAwal = $("#tglAwal").val();
			var tglAkhir = $("#tglAkhir").val();
			
			var url = "<?php echo base_url() .'pendaftaran/cetak_laponline?tglAwal=' ?>"+tglAwal+"&tglAkhir="+tglAkhir+"&req="+"cetak";
			window.open(url);
			
		});
		
	});
</script>