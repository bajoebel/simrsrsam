<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="<?php echo base_url('pendaftaran/jadwal_dokter');?>">Home</a>
                </li>

                <li class="active">List Jadwal Dokter</li>
            </ul>
            </div>

            <div class="page-content">
                    <div class="page-header">
                            <h1>
                                    LIST JADWAL DOKTER
                            </h1>
                    </div><!-- /.page-header -->

                <div class="row">
                    <form class="form-horizontal" name="kunjungan" action="<?php echo site_url('pendaftaran/jadwal_dokter'); ?>" method="GET">
					<div class="col-sm-6">
							<div class="form-group">
								<div class="col-xs-12 col-sm-6">
									<div class="clearfix">
										<select class="select2" id="poli" name="poli" data-placeholder="Klik untuk memilih poli..." style='color:#000000;' onchange="this.form.submit()">
										<option value="">-- Pilih Poli --</option>
											<?php
											foreach($poly as $pol){
											?>
											<option value="<?php echo $pol->grId ?>" <?php error_reporting(0); if($_GET['poli']==$pol->grId) echo "selected"; ?>><?php echo $pol->grNama ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
							</div>
					</div>
                    </form>
					<div class="col-sm-6">
						<div class="form-group" align="right">
							<button class="btn btn-primary btn-sm" id="setJadwal" data-toggle="button" data-loading-text="Loading...">
									SET JADWAL DOKTER PENDAFTARAN ONLINE
							</button>
						</div>
					</div>
					
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="clearfix">
                                        <div class="pull-right tableTools-container"></div>
                                </div>
                               

                                    <!-- div.table-responsive -->

                                    <!-- div.dataTables_borderWrap -->
                                <div>
                                    <table class="table table-striped table-bordered table-hover" style='color:#000000;' id="tabel_jadwal">
                                        <thead>
                                            <tr>
                                                <th class="center">NO</th>
                                                <th class="center">DOKTER</th>
                                                <th class="center">POLIKLINIK</th>
                                                <th class="center">SENIN</th>
                                                <th class="center">SELASA</th>
                                                <th class="center">RABU</th>
                                                <th class="center">KAMIS</th>
                                                <th class="center">JUMAT</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
											if(!empty($_GET['poli'])){
                                            $no = ($this->uri->segment('3') + 1) - 1;
                                            foreach ($dokter as $p){
                                            $no++;
											?>
                                            <tr>
                                            <td class="center"><?php echo $no ?></td>
                                            <td><?php echo $p->nama_dokter ?></td>
                                            <td><?php echo $p->grNama ?></td>
                                            <td class="center"><input id="senin<?php echo $no; ?>" type="checkbox" onclick="upJadwal_1(<?php echo $p->id_dokter ?>,<?php echo $no; ?>)" <?php if($p->senin == "1") echo "checked" ?>/></td>
                                            <td class="center"><input id="selasa<?php echo $no; ?>" type="checkbox" onclick="upJadwal_2(<?php echo $p->id_dokter ?>,'<?php echo $no; ?>')" <?php if($p->selasa == "1") echo "checked" ?>/></td>
                                            <td class="center"><input id="rabu<?php echo $no; ?>" type="checkbox" onclick="upJadwal_3(<?php echo $p->id_dokter ?>,'<?php echo $no; ?>')" <?php if($p->rabu == "1") echo "checked" ?>/></td>
                                            <td class="center"><input id="kamis<?php echo $no; ?>" type="checkbox" onclick="upJadwal_4(<?php echo $p->id_dokter ?>,'<?php echo $no; ?>')" <?php if($p->kamis == "1") echo "checked" ?>/></td>
                                            <td class="center"><input id="jumat<?php echo $no; ?>" type="checkbox" onclick="upJadwal_5(<?php echo $p->id_dokter ?>,'<?php echo $no; ?>')" <?php if($p->jumat == "1") echo "checked" ?>/></td>
                                            </tr>
											<?php
                                            }
                                            echo"<tr>
                                            <td align='right' colspan='8'>Jumlah Dokter : $jumlah Orang</td>
                                            </tr>";
											}else{
                                            echo"<tr>
                                            <td align='center' colspan='8'><h3> .: SILAHKAN LAKUKAN PENCARIAN :. </h3></td>
                                            </tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <?php 
										if(!empty($_GET['poli'])){
										
                                        echo $this->pagination->create_links();
										
										}
                                        ?>
                                    </div>
                                    	
                                </div>
                            </div>
                        </div>
                            <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
    </div>
</div>      

<script type="text/javascript">
    jQuery(function($) {
        $('[data-rel=tooltip]').tooltip();
		
		$('.select2').css('width','230px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		}); 
        
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        })
	
		$('#setJadwal').click(function(){
			var btn = $(this);
			btn.button('loading')
            var a = "SET JADWAL";
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url().'pendaftaran/setJadwal'; ?>",
				data : "id="+a,
				success:function(data){
				var response =  eval("(" + data + ")");
					if(response.MESSAGE=="OK"){
						btn.button('reset')
						bootbox.alert("Jadwal Dokter Pendaftaran Online berhasil di ubah");
					}else{
						btn.button('reset')
						bootbox.alert("Terjadi kesalahan saat proses data"); 
					}                  
				}
			});
        });
    });
	function upJadwal_1(a,no){
		var jadwal	= "Senin";
		var hari	= document.getElementById("senin"+no);
		if(hari.checked == true){
			var senin	= "1";
		}else{
			var senin	= "0";
		}
		$.ajax({
			type : "POST",
			url  : "<?php echo base_url().'pendaftaran/simpanJadwal'; ?>",
			data : "id="+a+"&hari1="+senin+"&jadwal="+jadwal,
			success:function(data){
			var response =  eval("(" + data + ")");
				if(response.MESSAGE=="OK"){
					
				}else{
					bootbox.alert(response.MESSAGE); 
				}                  
			}
		});	
	}
	function upJadwal_2(a,no){
		var jadwal	= "Selasa";
		var hari	= document.getElementById("selasa"+no);
		if(hari.checked == true){
			var selasa	= "1";
		}else{
			var selasa	= "0";
		}
		$.ajax({
			type : "POST",
			url  : "<?php echo base_url().'pendaftaran/simpanJadwal'; ?>",
			data : "id="+a+"&hari2="+selasa+"&jadwal="+jadwal,
			success:function(data){
			var response =  eval("(" + data + ")");
				if(response.MESSAGE=="OK"){
					
				}else{
					bootbox.alert(response.MESSAGE); 
				}                  
			}
		});	
	}
	function upJadwal_3(a,no){
		var jadwal	= "Rabu";
		var hari	= document.getElementById("rabu"+no);
		if(hari.checked == true){
			var rabu	= "1";
		}else{
			var rabu	= "0";
		}
		$.ajax({
			type : "POST",
			url  : "<?php echo base_url().'pendaftaran/simpanJadwal'; ?>",
			data : "id="+a+"&hari3="+rabu+"&jadwal="+jadwal,
			success:function(data){
			var response =  eval("(" + data + ")");
				if(response.MESSAGE=="OK"){
					
				}else{
					bootbox.alert(response.MESSAGE); 
				}                  
			}
		});	
	}
	function upJadwal_4(a,no){
		var jadwal	= "Kamis";
		var hari	= document.getElementById("kamis"+no);
		if(hari.checked == true){
			var kamis	= "1";
		}else{
			var kamis	= "0";
		}
		$.ajax({
			type : "POST",
			url  : "<?php echo base_url().'pendaftaran/simpanJadwal'; ?>",
			data : "id="+a+"&hari4="+kamis+"&jadwal="+jadwal,
			success:function(data){
			var response =  eval("(" + data + ")");
				if(response.MESSAGE=="OK"){
					
				}else{
					bootbox.alert(response.MESSAGE); 
				}                  
			}
		});	
	}
	function upJadwal_5(a,no){
		var jadwal	= "Jumat";
		var hari	= document.getElementById("jumat"+no);
		if(hari.checked == true){
			var jumat	= "1";
		}else{
			var jumat	= "0";
		}
		$.ajax({
			type : "POST",
			url  : "<?php echo base_url().'pendaftaran/simpanJadwal'; ?>",
			data : "id="+a+"&hari5="+jumat+"&jadwal="+jadwal,
			success:function(data){
			var response =  eval("(" + data + ")");
				if(response.MESSAGE=="OK"){
					
				}else{
					bootbox.alert(response.MESSAGE); 
				}                  
			}
		});	
	}
	
</script>