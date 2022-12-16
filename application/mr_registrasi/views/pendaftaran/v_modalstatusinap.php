<br />
<div class="form-horizontal">
	<div class="row">
		<div class="col-sm-12">
		<form method="post">
		<input type="hidden" name="admissi" id="admissi" value="<?php echo $admissi; ?>">
		<input type="hidden" name="noreg" id="noreg" value="<?php echo $noreg; ?>">
		<input type="hidden" name="kdpoli" id="kdpoli" value="<?php echo $ranap['asal_poli']; ?>">
		<input type="hidden" name="nomr" id="nomr" value="<?php echo $ranap['nomr']; ?>">
		<input type="hidden" name="nama" id="nama" value="<?php echo $ranap['nama_pasien']; ?>">
		<input type="hidden" name="jenkel" id="jenkel" value="<?php echo $ranap['jenis_kelamin']; ?>">
			<div class="form-group">
				<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tgl Keluar :</label>

				<div class="col-xs-12 col-sm-2">
					<div class="input-group">
						<input type="text" class="date-picker" data-date-format="yyyy-mm-dd" name="tgl" id="tgl"  value="<?php echo date("Y-m-d"); ?>" style='color:#000000;' readonly/>
						<span class="input-group-addon">
							<i class="ace-icon fa fa-calendar"></i>
						</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-xs-12 col-sm-3 no-padding-right">Status :</label>

				<div class="col-xs-12 col-sm-9">
					<div class="clearfix">
						<select style='color:#000000;' name="stat" id="stat" class="col-xs-12 col-sm-6">
							<option value="2">Pulang</option>
							<option value="3">Kabur</option>
							<option value="4">Rujuk RS Lain</option>
							<option value="5">Pindah Ruangan</option>
							<option value="6">Meninggal</option>
						</select>
					</div>
				</div>
			</div>
			<div class="hide" id="fpindah">
			<div class="form-group">
				<label class="control-label col-xs-12 col-sm-3 no-padding-right">Dokter Pengirim:</label>

				<div class="col-xs-12 col-sm-9">
				<div class="clearfix">
					<select class="select2" id="dokter" name="dokter" data-placeholder="Klik untuk memilih Dokter..." style='color:#000000;'>
					<option value="">-- Pilih Dokter --</option>
						<?php
						foreach($dokter as $dok){
						echo '<option value="'.$dok->id_dokter.'">'.$dok->nama_dokter.'</option>';
						}
						?>
					</select>
				</div>
				</div>
			</div>
			
			<div class="space-2"></div>
			
			<div class="form-group">
				<label class="control-label col-xs-12 col-sm-3 no-padding-right">Ruang Rawat:</label>

				<div class="col-xs-12 col-sm-9">
				<div class="clearfix">
					<select class="select2" id="ruang" name="ruang" data-placeholder="Klik untuk memilih Ruang Rawat..." style='color:#000000;'>
					<option value="">-- Pilih Ruang Rawat --</option>
						<?php
						foreach($ruang as $pol){
						echo '<option value="'.$pol->grId.'">'.$pol->grNama.'</option>';
						}
						?>
					</select>
					<input type="hidden" name="mapingruang" id="mapingruang" class="col-xs-12 col-sm-5" style='color:#000000;' readonly/>
				</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-xs-12 col-sm-3 no-padding-right">Kelas Rawat:</label>

				<div class="col-xs-12 col-sm-9">
				<div class="clearfix">
					<select class="select2" id="kelasrawat" name="kelasrawat" data-placeholder="Klik untuk memilih Kelas Rawat..." style='color:#000000;'>
					<option value="">-- Pilih Kelas Rawat --</option>
						<?php
						foreach($kelas as $kr){
						echo '<option value="'.$kr->kode_kelas.'">'.$kr->nama_kelas.'</option>';
						}
						?>
					</select>
				</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-xs-12 col-sm-3 no-padding-right">Kamar:</label>

				<div class="col-xs-12 col-sm-9">
				<div class="clearfix">
					<select class="select2" id="kamar" name="kamar" data-placeholder="Klik untuk memilih Kamar..." style='color:#000000;'>
					<option value="">-- Pilih Kamar --</option>
					</select>
				</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-xs-12 col-sm-3 no-padding-right">Tempat Tidur:</label>

				<div class="col-xs-12 col-sm-9">
				<div class="clearfix">
					<select class="select2" id="tt" name="tt" data-placeholder="Klik untuk memilih Tempat Tidur..." style='color:#000000;'>
					<option value="">-- Pilih Tempat Tidur --</option>
					</select>
				</div>
				</div>
			</div>
			</div>
		</form>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button name="simpan" id="simpan" class="btn btn-sm btn-primary">
		<i class="ace-icon fa fa-save"></i>
		Simpan
	</button>
</div>
<script type="text/javascript">
    jQuery(function($) {
		$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
		})
		.next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
		
		$('.modal .select2').css('width','300px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		});
		
		$("#stat").change(function (){
			if($("#stat").val() == '5'){
				$('#fpindah').removeClass('hide');
			}else{
				$('#fpindah').addClass('hide');
			}
		});
		
		$("#ruang").change(function (){
			
				var ruang = $("#ruang").val(); 
				$("#mapingruang").val("");
				$('#kelasrawat').val("");
				$('#kamar').val("");
				$('#tt').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
				
			$.ajax({ 
				type	: 'POST',
				url		: "<?php echo base_url().'pendaftaran/ruangmaping'; ?>", 
				data	: "ruang="+ruang, 
				dataType: "JSON", 
				success	: function(data){ 
					console.log(data)
					if(data.MESSAGE=="OK"){
						$("#mapingruang").val(data.MAPING);
						var url = "<?php echo site_url('pendaftaran/add_ajax_kamar');?>/"+$("#kelasrawat").val()+"/"+ruang;
						$('#kamar').load(url);
						
						var url2 = "<?php echo site_url('pendaftaran/add_ajax_tt');?>/"+$('#kamar').val();
						$('#tt').load(url2);
						return false;
					} 
				}
			}); 
			
		});
		
		$("#kelasrawat").change(function (){
			
				$('#kamar').val("");
				$('#tt').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
				
				var url = "<?php echo site_url('pendaftaran/add_ajax_kamar');?>/"+$(this).val()+"/"+$("#ruang").val();
				$('#kamar').load(url);
				
				var url2 = "<?php echo site_url('pendaftaran/add_ajax_tt');?>/"+$('#kamar').val();
				$('#tt').load(url2);
				return false;
			
        });
		
		$("#kamar").change(function (){
			
			var kamar = $('#kamar').val();
			$.ajax({ 
				type	: 'POST',
				url		: "<?php echo base_url().'pendaftaran/cek_kamar'; ?>", 
				data	: "kamar="+kamar, 
				dataType: "JSON", 
				success	: function(data){ 
					console.log(data)
					if(kamar == '33' || kamar == '34' || kamar == '71' || kamar == '108' || kamar == '127' || kamar == '35' || kamar == '49' || kamar == '57' || kamar == '72' || kamar == '122' || kamar == '32' || kamar == '48' || kamar == '56' || kamar == '70' || kamar == '121' || kamar == '126' || kamar == '128' || kamar == '130' || kamar == '131'){
						if((parseInt(data.JUMTOT) >= parseInt(data.JUMBED)) && (parseInt(data.JUMBED) != 0)){
							$('#kamar').val("");
							$('.select2').css('width','300px').select2({allowClear:true})
							.on('change', function(){
								$(this).closest('form').validate().element($(this));
							});
							bootbox.alert("Kamar sudah penuh");
							return false;
						}else{
							return true;
						}
					}else{
						if(data.JUML > 0 && $('#jenkel').val() == "P"){
							$('#kamar').val("");
							$('.select2').css('width','300px').select2({allowClear:true})
							.on('change', function(){
								$(this).closest('form').validate().element($(this));
							});
							bootbox.alert("Kamar sudah terisi pasien laki-laki");
							return false;
						}else if(data.JUMP > 0 && $('#jenkel').val() == "L"){
							$('#kamar').val("");
							$('.select2').css('width','300px').select2({allowClear:true})
							.on('change', function(){
								$(this).closest('form').validate().element($(this));
							});
							bootbox.alert("Kamar sudah terisi pasien perempuan");
							return false;
						}else if((parseInt(data.JUMTOT) >= parseInt(data.JUMBED)) && (parseInt(data.JUMBED) != 0)){
							$('#kamar').val("");
							$('.select2').css('width','300px').select2({allowClear:true})
							.on('change', function(){
								$(this).closest('form').validate().element($(this));
							});
							bootbox.alert("Kamar sudah penuh");
							return false;
						}else{
							return true;
						}
					} 
				}
			});
				$('#tt').val("");
				$('.select2').css('width','300px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				});
				
				var url = "<?php echo site_url('pendaftaran/add_ajax_tt');?>/"+$(this).val();
				$('#tt').load(url);
				return false;
			
        });
		
        $('#simpan').click(function(){
			var admissi = $('#admissi').val();
			var noreg 	= $('#noreg').val();
			var tgl 	= $('#tgl').val();
			var stat 	= $('#stat').val();
			var ruang 	= $('#ruang').val();
			var nomr 	= $('#nomr').val();
			var nama 	= $('#nama').val();
			var jenkel 	= $('#jenkel').val();
			var dokter 	= $('#dokter').val();
			var asal 	= $('#kdpoli').val();
			var kelasrawat 	= $('#kelasrawat').val();
			var mapingruang = $('#mapingruang').val();
			var kamar 	= $('#kamar').val();
			var tt 		= $('#tt').val();
			if(confirm('Apa anda yakin untuk mengubah status rawat inap?')){
				$.ajax({
					type : 'POST',
					url : '<?php echo base_url().'pendaftaran/pindah_ranap'; ?>',
					data :  'admissi='+ admissi+'&tgl='+ tgl+'&stat='+ stat,
					success : function(data){
					var response =  eval("(" + data + ")");
						if(response.MESSAGE=="OK"){
							if(stat=='5'){
								$.ajax({
									type : "POST",
									url  : "<?php echo base_url().'pendaftaran/simpanpindah'; ?>",
									data : 'noreg='+ noreg+'&ruang='+ruang+'&tgl='+ tgl+'&dokter='+ dokter+'&asal='+ asal+'&nomr='+ nomr+'&nama='+ nama+'&jenkel='+ jenkel+'&kelasrawat='+ kelasrawat+'&mapingruang='+ mapingruang+'&kamar='+ kamar+'&tt='+ tt,
									success:function(data){  
										var reg = '<?php echo base_url() .'pendaftaran/list_pasienruang'; ?>';
										window.location=(reg);
										return true;      
									},
									error:function(xhr, ajaxOptions, thrownError){
										alert('Error Function : '+thrownError);
									}
								});
							}else{
								var reg = '<?php echo base_url() .'pendaftaran/list_pasienruang'; ?>';
								window.location=(reg);
								return true;
							}
						}else{
							bootbox.alert(response.MESSAGE);
						}
					},
					error:function(xhr, ajaxOptions, thrownError){
						alert('Error Function : '+thrownError);
					}
				});
			}
		});
    });
</script>