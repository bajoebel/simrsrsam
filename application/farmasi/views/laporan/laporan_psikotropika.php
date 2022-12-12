<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="<?php echo get_asset() ?>css/uniform.css" />
<link rel="stylesheet" href="<?php echo get_asset() ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo get_asset() ?>jquery/jquery-ui.css" />
<style>
.table td.centerObj {
    text-align: center;
}
.table td.rightObj {
    text-align: right;
}
.table td{
    font-size: 0.9em;
}
span{
    text-align: left;
}
.icon a{
    font-size: 0.9em;
}
body .modal {
    width: 80%; /* respsonsive width */
    margin-left:-40%; /* width/2) */ 
}
.modal-dialog{
      overflow-y: initial !important
}
.modal-body{
    max-height: calc(100vh - 250px);
    overflow-y: auto;
}
.table th{
    font-size: 0.9em;
}
div#pagination{
    float: right;
}
div#pagination a{
    border: ;
}
.left{
    float: left;
}
.right{
    float: right;
    text-align: right;
}
#searchTable{
     float: right;
     position: relative;
     top: 0px;
     z-index: 1;
}
div#searchTable input[type="text"]{
    background-color: #fff;
    border-left: 1px solid #e3ebed;
    border: 1px solid #e3ebed;
    border-radius: 0;
    line-height: 24px;
    font-size: 0.9em;
}
div#searchTable select{
    width: 200px;
    background-color: #fff;
    border-left: 1px solid #e3ebed;
    border: 1px solid #e3ebed;
    border-radius: 0;
    line-height: 24px;
    font-size: 0.9em;
}
#searchTable button#keywordButton{
    background-color: #2e363f;
    border: 0 none;
    margin-left: -5px;
    margin-top: -11px;
    padding: 5px 10px;
}
#searchTable button#Inquery{
    margin-left: 5px;
    margin-top: -11px;
}
#filter{
    margin-top: 5px;
    float: right;
    width: 100px;
}
</style>

<div id="content">
    <div id="content-header">
        <?php echo get_breadcrumb() ?>  
        <h1>Laporan Narkotika dan Psikotropika</h1>
    </div>
    
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                    <form id="form1" action="#" method="post" onsubmit="return false">
					<table style="width: 700px;">
						<tr>
							<td>Lokasi</td>
							<td> : </td>
							<td>
								<select name="KDLOKASI" id="KDLOKASI" style="width: 250px;">
									<option value=""></option>
									<option value="ALL">-- Semua Lokasi --</option>
									<?php foreach($datlokasi->result_array() as $y){ ?>
									<option value="<?php echo $y['KDLOKASI'] ?>"><?php echo $y['NMLOKASI'] ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Periode Awal</td>
							<td> : </td>
							<td>
								<input type="text" name="tglAwal" id="tglAwal" placeholder="__-__-____" style="width: 100px;"/>
							</td>
						</tr>
						<tr>
							<td>Periode Akhir</td>
							<td> : </td>
							<td>
								<input type="text" name="tglAkhir" id="tglAkhir" placeholder="__-__-____" style="width: 100px;"/>
							</td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
							<td>
								<button type="button" id="cetak" class="btn"><i class="icon-print"></i> Cetak</button>
								<button type="button" id="export" class="btn">Export</button>
							</td>
						</tr>
					</table>
					</form>
            </div>
        </div>            
    </div>
</div>

<script src="<?php echo get_asset() ?>jquery/jquery.js"></script> 
<script src="<?php echo get_asset() ?>jquery/jquery.mask.js"></script>
<script src="<?php echo get_asset() ?>jquery/jquery-ui.js"></script> 
<script src="<?php echo get_asset() ?>js/jquery.ui.custom.js"></script> 
<script src="<?php echo get_asset() ?>js/bootstrap.min.js"></script> 
<script src="<?php echo get_asset() ?>js/select2.min.js"></script> 
<script src="<?php echo get_asset() ?>js/maruti.js"></script> 
<script src="<?php echo get_asset() ?>js/defira.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('#KDLOKASI').select2({placeholder:'Pilih Lokasi Obat'}).val('').trigger('change');
	$('#tglAwal').datepicker({
        dateFormat : "dd-mm-yy",
        changeMonth: true,
        changeYear : true
    });
    $('#tglAkhir').datepicker({
        dateFormat : "dd-mm-yy",
        changeMonth: true,
        changeYear : true
    });
    $('#cetak').click(function(){
        var a = $('#KDLOKASI').val();
		var b = $('#tglAwal').val();
        var c = $('#tglAkhir').val();
		var d = 'cetak';
        openInNewTab("<?php echo base_url().'laporan_psikotropika/cetak_lap?kLok=' ?>"+a+"&tAwal="+b+"&tAkhir="+c+"&st="+d);
    });
	$('#export').click(function(){
        var a = $('#KDLOKASI').val();
		var b = $('#tglAwal').val();
        var c = $('#tglAkhir').val();
		var d = 'export';
        openInNewTab("<?php echo base_url().'laporan_psikotropika/cetak_lap?kLok=' ?>"+a+"&tAwal="+b+"&tAkhir="+c+"&st="+d);
    });
    function openInNewTab(url) {
        var win = window.open(url, '_blank');
        win.focus();
    }
});

</script>
