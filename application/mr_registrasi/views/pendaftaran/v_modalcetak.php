<?php
$nomr   = $this->input->post("rowid");
?>
<form method="post">
<input type="hidden" name="mr" id="mr" value="<?php echo $nomr; ?>">
<input type="button" name="kartu" id="kartu" value="CETAK KARTU" class="btn btn-sm btn-info btn-block" />
<input type="button" name="stiker" id="stiker" value="CETAK STIKER" class="btn btn-sm btn-info btn-block" />
</form>

<script type="text/javascript">
    jQuery(function($) {
        $('#kartu').click(function(){
            var nomr = $("#mr").val();
            var reqdata = "cetak_kartu";
            var url = '<?php echo base_url() .'pendaftaran/cetak/'; ?>'+nomr+'/'+reqdata;
            window.open(url);
        });
        $('#stiker').click(function(){
            var nomr = $("#mr").val();
            var reqdata = "cetak_stiker";
            var url = '<?php echo base_url() .'pendaftaran/cetak/'; ?>'+nomr+'/'+reqdata;
            window.open(url);
		});
    });
</script>