<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="<?php echo base_url('pendaftaran/pasien_ol');?>">Home</a>
                </li>

                <li class="active">List Pasien Lama Online</li>
            </ul>
            </div>

            <div class="page-content">
                    <div class="page-header">
                            <h1>
                                    LIST PASIEN LAMA ONLINE
                            </h1>
                    </div><!-- /.page-header -->

                <div class="form-horizontal">
				<div class="row">
				<div class="col-xs-12">
					<div class="col-sm-6">
							<div class="form-group">
								<div class="col-xs-12 col-sm-5">
									<div class="input-group">
										<input type="text" name="tgl" id="tgl" class="date-picker" data-date-format="yyyy-mm-dd" value="<?php echo (!empty($_GET['tgl'])) ? $_GET['tgl'] : date("Y-m-d"); ?>" style='color:#000000;' readonly/>
										<span class="input-group-addon">
											<i class="ace-icon fa fa-calendar"></i>
										</span>
									</div>
								</div>
							</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
                        <div class="input-group">
                            <input type="text" name="kode" id="kode" class="limited col-sm-offset-6 col-xs-12 col-sm-6" maxlength="10" onkeypress="return hanyaAngka(event)" placeholder="Pencarian Kode Booking" style='color:#000000;' />
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
												<th class="center" colspan="2">#</th>
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
	function cetaktracer(a){
		var kode = a;
		var url = '<?php echo base_url() .'pendaftaran/cetakTracerOnline/'; ?>'+kode;
		window.open(url);
	}
	function daftaronline(a){
		var kode = a;
		location.href = "<?php echo base_url() .'pendaftaran/daftar/'; ?>"+kode;
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
		
		$('#kode').keydown(function(e){
            if($(this).val() !== ""){
                if(e.keyCode==13){
                    $('#cek').click();
                }
            }
        })
		
		$('#cek').click(function(){
			var btn = $(this);
			btn.button('loading')
			
			var kode = $("#kode").val();
			var tgl = $("#tgl").val();
			
			$.ajax({ 
				type	: 'POST',
				url		: "<?php echo base_url().'pendaftaran/get_listbooking'; ?>", 
				data	: "kode="+kode+"&tgl="+tgl, 
				dataType: "JSON", 
				success	: function(data){ 
						btn.button('reset')
						$('#getdata').html("");
						var jmlData = data.response;
						var jumlah = jmlData.length;
						
						buatTabel = "";
						for(a = 0; a < jumlah; a++){
							if(data.response[a].verifikasi=="1"){
								var ver = "Terdaftar";
							}else if(data.response[a].verifikasi=="2"){
								var ver = "Dibatalkan";
							}else{
								var ver = "Booked";
							}
							
							if(data.response[a].cara_berobat=="1"){
								var cara = "UMUM";
							}else if(data.response[a].cara_berobat=="2"){
								var cara = "BPJS";
							}else{
								var cara = "-";
							}
							buatTabel += "<tr>"
								+ "<td>" + (a+1) + "</td>"
								+ "<td>" + data.response[a].kode_booking + "</td>"
								+ "<td>" + cara + "</td>"
								+ "<td>" + data.response[a].nomr + "</td>"
								+ "<td>" + data.response[a].nama + "</td>"
								+ "<td>" + data.response[a].no_bpjs + "</td>"
								+ "<td>" + data.response[a].no_rujukan + "</td>"
								+ "<td>" + data.response[a].tgl_kontrol + "</td>"
								+ "<td>" + data.response[a].nohp + "</td>"
								+ "<td>" + data.response[a].grNama + "</td>"
								+ "<td>" + data.response[a].tgl_booking + "</td>"
								+ "<td>" + ver + "</td>"
								+ "<td>" + data.response[a].alasan_batal + "</td>"
								+ "<td class=center> <a onclick=\"cetaktracer('"+ data.response[a].kode_booking +"')\" data-rel='tooltip' data-placement='left' title='Cetak'> <i class='ace-icon fa fa-print bigger-130'></i> </a> </td>"
								+ "<td class=center> <a onclick=\"daftaronline('"+ data.response[a].kode_booking +"')\" data-rel='tooltip' data-placement='left' title='Daftar'> <i class='ace-icon fa fa-external-link bigger-130'></i> </a> </td>"
								+ "<tr/>";
						}
						$('#getdata').html(buatTabel);
						
										
					},
					error:function(xhr, ajaxOptions, thrownError){
						alert('Error Function : '+thrownError);
					}
							
			});
		});
		
		window.onload=function(){
			$('#cek').click();
		}
		
	});
</script>