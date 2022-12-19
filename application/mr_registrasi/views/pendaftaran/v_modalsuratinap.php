<form method="post">
<input type="hidden" name="mr" id="mr" value="<?php echo $cek['nomr']; ?>">
<input type="hidden" name="idx" id="idx" value="<?php echo $cek['id_daftar']; ?>">
<input type="hidden" name="idpoli" id="idpoli" value="<?php echo $cek['grId']; ?>">

<input type="button" name="ri" id="ri" value="CETAK SURAT MASUK ( RAWAT INAP )" class="btn btn-sm btn-info btn-block" />
<input type="button" name="registrasi" id="registrasi" value="CETAK REGISTRASI PASIEN INAP" class="btn btn-sm btn-info btn-block" />
</form>

<script type="text/javascript">
    jQuery(function($) {
        $('#ri').click(function(){
            var idx = $("#idx").val();
            var url = '<?php echo base_url() .'pendaftaran/cetaksuratmasukinap/'; ?>'+idx;
            window.open(url);
		});
        $('#registrasi').click(function(){
			var idx = $("#idx").val();
			var url = '<?php echo base_url() .'pendaftaran/cetakregistrasiinap/'; ?>'+idx;
			window.open(url);
		});
    });
</script>