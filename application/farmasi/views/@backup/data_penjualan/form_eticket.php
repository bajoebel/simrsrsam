<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="<?php echo get_asset() ?>css/uniform.css" />
<link rel="stylesheet" href="<?php echo get_asset() ?>css/select2.css" />
<style>
.table td.centerObj {text-align: center;}
.table td.rightObj {text-align: right;}
.table td{font-size: 0.9em;}
span{text-align: left;}
.inline_field{
    display: inline-table;
    width: 100%;
    border: 0px solid #000;
} 
.inline_field input[type=checkbox]+span:after{
    content: '%';
}
#percentEntry{
    margin-top: -2px;
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
.table th{font-size: 0.9em;}
div#pagination{float: right;}
.left{float: left;}
.right{
    float: right;
    text-align: right;
    z-index: -9999;
}
#searchTable{
     float: right;
     position: relative;
     top: 0px;
     z-index: 0;
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
.table.transObat td{
    padding: 0px;
    border: none;
    padding: 0px 8px;
}
.widget-box{border: none;}
.rataKanan{text-align: right;}
.select2-container{margin-bottom: 10px;}
.btn{
    font-family:Georgia, "Times New Roman", Times, serif;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #f5f5f5;
    background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) #b3b3b3;
    border-image: none;
    border-radius: 4px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
    color: #333333;
    cursor: pointer;
    display: inline-block;
    font-size: 14px;
    line-height: 20px;
    margin-bottom: 0;
    padding: 4px 12px;
    text-align: center;
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    vertical-align: middle;
}
a{
    text-decoration: none;
}
</style>

<div id="content">
    <div id="content-header">
        <?php echo get_breadcrumb() ?>  
        <h1>Cetak E-Ticket</h1>
    </div>
    
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="left span4">
                    <button type="button" onclick="location.href='<?php echo base_url().'data_penjualan' ?>'" class="btn">
                        <i class="icon-refresh"></i> Kembali</button>
                </div>
                
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                                       
                    <div class="widget-content nopadding">
                        
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td width="100px">No Inv</td>
                                <td width="10px" align="center">:</td>
                                <td width="350px"><?php echo $KDJL ?></td>
                                <td width="100px">No MR</td>
                                <td width="10px" align="center">:</td>
                                <td><?php echo $NOMR ?></td>
                            </tr>
                            <tr>
                                <td>Tgl Inv</td>
                                <td align="center">:</td>
                                <td><?php echo date('d-m-Y H:i',strtotime($DTJL)) ?></td>
                                <td>Pasien</td>
                                <td align="center">:</td>
                                <td><?php echo $NMPASIEN ?></td>
                            </tr>
                            <tr>
                                <td>Apotik</td>
                                <td align="center">:</td>
                                <td><?php echo $NMLOKASI ?></td>
                                <td colspan="3">&nbsp;</td>
                            </tr>
                        </table>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Obat / Alat Kesehatan</th>
                                <th>Aturan Pakai</th>
                                <th style="width: 200px">#</th>

                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                    foreach($dataPreview->result_array() as $x):           
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $x['KDBRG'] ?></td>
                                    <td><?php echo $x['NMBRG'] ?></td>
                                    <td><?php echo substr($x['AP'],2,strlen($x['AP']) - 2) ?></td>
                                    <td>
                                        <a href="#" onclick="printETicket('<?php echo $NOMR ?>',
                                                '<?php echo $NMPASIEN ?>',
                                                '<?php echo $DTJL ?>',
                                                '<?php echo $x['NMBRG'] ?>',
                                                '<?php echo $x['AP'] ?>'
                                                )" class="btn">Print E-Ticket</a>
                                        <a href="#" onclick="editAP('<?php echo $KDJL ?>','<?php echo $x['KDBRG'] ?>')" class="btn">Edit AP</a>
                                    </td>
                                </tr>
                                <?php
                                    endforeach; 
                                ?>

                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>            
    </div>
</div>

<style>
	frame.optionJns{overflow: hidden}
	div.inline-radio{clear: none;float:left}
	input.radio{float: left;clear: none;margin: 0px 5px 10px 2px;}
	label.radio-label{float: left;clear: none;display: block;padding: 2px 1em 0 0;}
</style>
<div id="dialogAP" class="modal fade" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Set Aturan Pemakaian Obat</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row-fluid" style="margin-top: -10px">
                        <div class="span12">
							<div style="border:0px solid #000;margin-bottom:70px">
								<input type="hidden" name="KDJL" id="KDJL">
								<input type="hidden" name="KDBRG" id="KDBRG">
								<frame class="optionJns">
									<legend>Pilih Opsi Jenis Obat</legend>
									<div class="inline-radio">
										<label class="radio-label"><input type="radio" name="optJenis" id="obatDalam" value="1" class="radio" /> Obat Dalam</label>
										<label class="radio-label"><input type="radio" name="optJenis" id="obatLuar" value="2" class="radio" /> Obat Luar</label>
										<label class="radio-label"><input type="radio" name="optJenis" id="obatInjeksi" value="3" class="radio" /> Obat Injeksi</label>
									</div>
								</frame>
							</div>
							
							<div style="border:0px solid #000">
								<table width="100%" border="0">
									<tr style="">
										<th class="group_1" width="80px">Periode<br/>x Sehari</th>
										<th class="group_2" width="150px">Jumlah Satuan</th>
										<th class="group_2" width="300px">Waktu Makan (Jam)</th>
										<th class="group_2" width="200px">Keterangan</th>
										<th class="group_2" width="100px">#</th>
									</tr>
									<tr>
										<td align="center" class="group_1">
											<input type="text" name="jmlHari" id="jmlHari" style="text-align: center;width: 50px;"/> 
										</td>
										<td align="center" class="group_2">
											<input type="text" name="jmlSatuanAP" id="jmlSatuanAP" style="text-align: center;width: 50px;"/>
											<select name="satuanAP" id="satuanAP" style="width: 100px;">
												<option value="1">Tablet</option>
												<option value="2">Bungkus</option>
												<option value="3">Sdk Obat</option>
											</select>
										</td>
										<td align="center" class="group_2">
											<input type="text" name="waktu1" id="waktu1" style="text-align: center;width: 50px;"/> 
											<select name="waktu3" id="waktu2" style="width: 150px;">
												<option value="1">Sebelum Makan</option>
												<option value="2">Sesudah Makan</option>
												<option value="3">Sewaktu Makan</option>
											</select>
											<select name="waktu3" id="waktu3" style="width: 80px;">
												<option value="1">Pagi</option>
												<option value="2">Siang</option>
												<option value="3">Malam</option>
												<option value="4">Tiap 8 jam</option>
												<option value="5">Tiap 12 jam</option>
                                                <option value="6">Tiap 24 jam</option>
                                                <option value="7">Pagi - Malam</option>
                                                <option value="8">Pagi - Siang - Malam</option>
											</select>
										</td>
										<td align="center" class="group_2">
											<select name="keterangan" id="keterangan" style="width: 200px;">
												<option value="1">Dihabiskan</option>
												<option value="2">Bila mual atau muntah</option>
												<option value="3">Bila mencret</option>
												<option value="4">Bila demam</option>
												<option value="5">Bila sakit</option>
												<option value="6">Bila sesak</option>
												<option value="7">Bila batuk</option>
											</select>
										</td>
										<td align="left">
											<button class="btn" type="button" onclick="setAP()" style="margin-top: -13px;">Set Aturan Pakai</button> 
										</td>
									</tr>
								</table>
							</div>
							
                        </div>
                    </div>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo get_asset() ?>js/jquery.min.js"></script> 
<script src="<?php echo get_asset() ?>js/jquery.ui.custom.js"></script> 
<script src="<?php echo get_asset() ?>js/bootstrap.min.js"></script> 
<script src="<?php echo get_asset() ?>js/jquery.uniform.js"></script> 
<script src="<?php echo get_asset() ?>js/select2.min.js"></script> 
<script src="<?php echo get_asset() ?>js/jquery.dataTables.min.js"></script> 
<script src="<?php echo get_asset() ?>js/maruti.js"></script> 
<script src="<?php echo get_asset() ?>js/defira.js"></script>

<script>
$(document).ready(function(){
	$('select').prop('selectedIndex',0);
	$('#obatDalam').prop('checked',true);
	
	$('#obatDalam').click(function(){
		$('.group_1').show();
		$('.group_2').show();
	});
	$('#obatLuar').click(function(){
		$('.group_1').show();
		$('.group_2').hide();
	});
	$('#obatInjeksi').click(function(){
		$('.group_1').hide();
		$('.group_2').hide();
	});	
});

function printETicket(a,b,c,d,e){
    window.open('<?php echo base_url().'data_penjualan/eticket?nomr=' ?>'+a+'&nama='+b+'&tgl='+c+'&brg='+d+'&ap='+e);
}
function setAP(){
	var GR = $('input[type=radio]:checked').val();
	var setAP = "";
		
    var SAP = ['Tablet','Bungkus','Sendok Obat'];
    var WAP = ['Sebelum Makan','Sesudah Makan','Sewaktu Makan'];
    var WAP2 = ['Pagi','Siang','Malam','Tiap 8 jam','Tiap 12 jam','Tiap 24 jam','Pagi - Malam','Pagi - Siang - Malam'];
    var KAP = ['Dihabiskan','Bila mual atau muntah','Bila mencret','Bila demam','Bila sakit','Bila sesak','Bila batuk'];
    
    var a = $('#jmlHari').val();
    var b = $('#jmlSatuanAP').val();
    var c = $('#satuanAP').val();
    var d = $('#waktu1').val();
    var e = $('#waktu2').val();
    var f = $('#waktu3').val();
	
    var g = $('#keterangan').val();
    
	if(GR == "1"){
        var deskJam = "";
        deskJam = (d=="") ? "" : " Jam ";
		setAP = GR+','+a+' x Sehari,'+b+' '+SAP[c-1]+','+d+deskJam+WAP[e-1]+','+WAP2[f-1]+','+KAP[g-1];
	}else if(GR == "2"){
		setAP = GR+','+a+' x Sehari,Dioleskan tipis-tipis pada bagian yang sakit';
	}else if(GR == "3"){
		setAP = GR+',OBAT INJEKSI';
	}
	
    var KDJL = $('#KDJL').val();
    var KDBRG = $('#KDBRG').val();
    $.ajax({
        url         : "<?php echo base_url().'data_penjualan/updateAP' ?>",
        type        : "POST",
        data        : {KDJL:KDJL,KDBRG:KDBRG,AP:setAP},
        dataType    : "JSON",
        success     : function(data){
            if(data.code==200){
                $('#dialogAP').modal('hide');
                window.location.reload();
            }else{
                alert(data.message);
            }
        },
        error       : function(xhr, ajaxOption, thrownError){
            alert('Response : ' + thrownError);
        }
    });
}
function editAP(a,b){
    $('#KDJL').val(a);
    $('#KDBRG').val(b);

    $("#jmlHari").val("1");
    $("#jmlSatuanAP").val("1");
    $("#waktu1").val("1");
	
	$('#obatDalam').prop('checked',true);
	$('.group_1').show();
	$('.group_2').show();
	$('select').prop('selectedIndex',0);
    $("#dialogAP").modal( "show" );      
}

</script>

