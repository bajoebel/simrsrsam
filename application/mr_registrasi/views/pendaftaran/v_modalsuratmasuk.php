<form method="post">
<input type="hidden" name="mr" id="mr" value="<?php echo $cek['nomr']; ?>">
<input type="hidden" name="idx" id="idx" value="<?php echo $cek['id_daftar']; ?>">
<input type="hidden" name="idpoli" id="idpoli" value="<?php echo $cek['grId']; ?>">
<input type="hidden" name="tgl" id="tgl" value="<?php echo $cek['tgl']; ?>">

<input type="button" name="rj" id="rj" value="CETAK SURAT MASUK ( RAWAT JALAN )" class="btn btn-sm btn-info btn-block" />
<input type="button" name="registrasi" id="registrasi" value="CETAK REGISTRASI" class="btn btn-sm btn-info btn-block" />
<input type="button" name="sr" id="sr" value="SURAT REGISTRASI RAWAT JALAN" class="btn btn-sm btn-info btn-block" />
</form>

<script type="text/javascript">
    jQuery(function($) {
        $('#rj').click(function(){
            var nomr = $("#mr").val();
			var idx = $("#idx").val();
            var reqdata = "cetak_rj";
            var url = '<?php echo base_url() .'pendaftaran/cetaksuratmasuk/'; ?>'+idx+'/'+reqdata;
            window.open(url);
		});
        $('#registrasi').click(function(){
			var idx = $("#idx").val();
			var poli = $("#idpoli").val();
			var tgl = $("#tgl").val();
			var reqdata = "cetak_registrasi";
			var url = '<?php echo base_url() .'pendaftaran/cetak/'; ?>'+idx+'/'+reqdata+'/'+poli+'/'+tgl;
			window.open(url);
		});
		
		$('#sr').click(function(){
			var idx = $("#idx").val();
			var poli = $("#idpoli").val();
			var tgl = $("#tgl").val();
			var url = '<?php echo base_url() .'pendaftaran/cetak_sr/'; ?>'+idx+'/'+poli+'/'+tgl;
			window.open(url);
		});
    });
</script>