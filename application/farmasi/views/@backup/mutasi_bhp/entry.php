<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="<?php echo get_asset() ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo get_asset() ?>jquery/jquery-ui.css" />
<style>
.table td.centerObj {text-align: center;}
.table td.rightObj {text-align: right;}
.table td{font-size: 0.9em;}
span{text-align: left;}
.icon a{font-size: 0.9em;}
body .modal {width: 80%;margin-left:-40%;}
.modal-dialog{overflow-y: initial !important}
.modal-body{max-height: calc(100vh - 250px);overflow-y: auto;}
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
.widget-box{
    border: none;
}
.rataKanan{
    text-align: right;
}
.select2-container{
    margin-bottom: 10px;
}
</style>
<div id="content">
    <div id="content-header">
        <?php echo get_breadcrumb() ?>  
        <h1>Transaksi Data Mutasi/Transfer BHP/BMHP</h1>
    </div>
    
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <form id="form1" action="#" method="post">
                        <table class="table table-striped transObat">
                            <tr>
                                <td width="150px">ASAL OBAT BHP/BMHP</td>
                                <td width="300px">
                                    <select name="ASAL_OBAT" id="ASAL_OBAT" class="span12" tabindex="1">
                                        <option value=""></option>
                                        <?php foreach($datlokasi->result_array() as $x): ?>
                                            <option value="<?php echo $x['KDLOKASI'] ?>"><?php echo $x['NMLOKASI'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="hidden" name="KDMTBHP" id="KDMTBHP"/>
                                </td>
                                <td width="50px">&nbsp;</td>
                                <td width="150px">TANGGAL TRANSAKSI</td>
                                <td>
                                    <input type="text" name="DTMTBHP" id="DTMTBHP" style="width: 100px;" placeholder="__-__-____"  tabindex="3"/>
                                </td>
                            </tr>
                            <tr>
                                <td>TUJUAN MUTASI BHP</td>
                                <td>
                                    <select name="LOKASI_TUJUAN" id="LOKASI_TUJUAN" class="span12" tabindex="2">
                                        <option value=""></option>
                                        <?php foreach($datruangan->result_array() as $x): ?>
                                            <option value="<?php echo $x['KDRUANGAN'] ?>"><?php echo $x['NMRUANGAN'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>&nbsp;</td>
                                <td>KETERANGAN</td>
                                <td>
                                    <input type="text" name="KETMTBHP" id="KETMTBHP" class="span12"  tabindex="4"/>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <button type="button" id="simpan" class="btn">
                                        <i class="icon-hdd"></i> Simpan</button>
                                    <button type="button" id="batal" class="btn">
                                        <i class="icon-share-alt"></i> Batal</button>                                     
                                    <button type="button" id="kembali" class="btn">
                                        <i class="icon-share-alt"></i> Kembali</button>                                     
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
            
        <div class="row-fluid">            
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <form id="form2" action="#" method="post">
                                <tr>
                                    <th>
                                        <input type="hidden" name="KDBRG" id="KDBRG"/>
                                        <input readonly="" type="text" name="NMBRG" id="NMBRG" class="span12"/>
                                        <button class="btn" type="button" id="ADDBARANG" style="margin-left: -40px;position: absolute;">
                                            <i class="icon-search"></i></button>
                                    </th>
                                    <th>
                                        <input readonly="" type="text" name="NMSATUAN" id="NMSATUAN" class="span12"/>
                                    </th>
                                    <th>
                                        <input readonly="" type="text" name="JSTOK" id="JSTOK" class="span12 rataKanan" />
                                    </th>
                                    <th>
                                        <input type="text" name="JMLMTBHP" id="JMLMTBHP" class="span12 rataKanan" onkeydown="return numbersFormat(this, event)" onkeyup="Javascript:curencyFormat(this)"/>
                                    </th>
                                    <th>
                                        <button id="SimpanTemp" type="button" class="btn" style="margin-top: -33px;">
                                            <i class="icon-plus"></i> Tambah</button>
                                    </th>
                                </tr>
                                </form>
                                <tr>
                                    <th>Nama Obat / Alkes</th>
                                    <th width="110px">Satuan</th>
                                    <th width="110px">Stok</th>
                                    <th width="100px">Jumlah</th>
                                    <th width="120px">#</th>
                                </tr>
                            </thead>
                            <tbody id="getTemp"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<!-- Modal -->
<div id="dialog" class="modal fade" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cari Obat / Alat Kesehatan</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row-fluid" style="margin-top: -10px">
                        <div class="span12">
                            <form id="form1" action="#" method="get" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Kode Obat</label>
                                    <div class="controls">
                                        <input type="text" name="xKDBRG" id="xKDBRG" class="span6" placeholder="Enter Kode"/> 
                                        <button class="btn" type="button" onclick="cariKodeObat()">Cari Kode</button>  
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Nama Obat / Alat Kesehatan</label>
                                    <div class="controls">
                                        <input type="text" name="xNMBRG" id="xNMBRG" class="span6" placeholder="Enter Nama Obat / Alkes" />
                                        <button class="btn" type="button" onclick="cariNamaObat()">Cari Nama Obat / Alat Kesehatan</button>  
                                    </div>
                                </div>
                            </form>
                            <div style="border-style: double;height: 250px;padding: 2px;overflow: scroll;">
                                <table class="table table-bordered table-striped" style="font-size: 1.2em">
                                    <thead>
                                        <tr>
                                            <th width="80px">Kode</th>
                                            <th>Nama Obat / Alkes</th>
                                            <th>Satuan</th>
                                            <th width="120px">Stok</th>
                                            <th width="70px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody id="getDataObatCari"></tbody>
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
    $('#LOKASI_TUJUAN').select2({placeholder : "Pilih Lokasi Tujuan"});
    $('#ASAL_OBAT').select2({placeholder : "Pilih Asal Obat"});
    $('#DTMTBHP').mask("00-00-0000");
    function uangdes(number){
        var ce = number.toString().replace('.',',');
        var pisah = ce.split(',');
        var angka = parseFloat(pisah[0]);
        var UD = pisah[1] != undefined ? curencyFormat(angka) + ',' + ((pisah[1].length > 1) ? pisah[1].substr(0,2) : pisah[1]+'0')  : curencyFormat(angka) + ',00';  
        return UD;          
    }
    function format_number(number, prefix, thousand_separator, decimal_separator){
    	var decimal_separator = decimal_separator || ',',
    		regex		= new RegExp('[^' + decimal_separator + '\\d]', 'g'),
    		number_string = number.replace(regex, '').toString(),
    		split	  = number_string.split(decimal_separator),
    		result 	  = split[0]
            
    	result = split[1] != undefined ? result + decimal_separator + split[1] : result;
    	return prefix == undefined ? result : (result ? prefix + result : '');
    };
    function kosongkanObjEntry(){
        $('#ASAL_OBAT').val('').trigger('change').select2("enable");
        $('#LOKASI_TUJUAN').val('').trigger('change');
        $('#KDMTBHP').val('');
        $('#DTMTBHP').val('<?php echo date('d-m-Y') ?>');
        $('#KETMTBHP').val('');
    }
    function kosongkanObjTemp(){
        $('#KDBRG').val('');
        $('#NMBRG').val('');
        $('#NMSATUAN').val('');
        $('#JSTOK').val('0');
        $('#JMLMTBHP').val('0');
    }
    kosongkanObjEntry();
    kosongkanObjTemp();
    emptyTemp();
    function getTemp(){
        $.ajax({
            url : "<?php echo base_url().'mutasi_bhp/getTemp' ?>",
            beforeSend  : function(){
                $('#getTemp').html('<tr><td colspan=5>Loading ... Please wait</td></tr>');
            },
            success : function(data){
                $('#getTemp').html(data);
            },
            error : function(xhr, ajaxOption, thrownError){
                alert('Response : ' + thrownError);
            }
        });          
    }
    function emptyTemp(){
        $.ajax({
            url     : "<?php echo base_url().'mutasi_bhp/emptyTemp' ?>",
            success : function(data){
                getTemp(); 
            },
            error : function(xhr, ajaxOption, thrownError){
                alert('Response : ' + thrownError);
            }
        });                     
    }
    $('#DTMTBHP').focus(function(){
        $(this).select();
    });
    $('#DTMTBHP').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#KETMTBHP').focus();
        }
    });
    $('#KETMTBHP').focus(function(){
        $(this).select();
    });
    $('#KETMTBHP').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#ADDBARANG').click();
        }
    });
    $('#ASAL_OBAT').change(function(){
        $(this).select2("disable");
    });
    $('#batal').click(function(){
        $('#ASAL_OBAT').val('').trigger('change').select2("enable");
        emptyTemp();
    });
    $('#ADDBARANG').click(function(){
        var x = $('#ASAL_OBAT').val();
        if(x==""){
            alert('Asal obat belum dipilih');            
        }else{
            kosongkanObjTemp();
            $('#xKDBRG').val("");
            $('#xNMBRG').val("");
            $('#getDataObatCari').html("");
            $("#dialog").modal( "show" );            
        }
    });
    $('#xKDBRG').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            var a = $(this).val();
            var b = $('#ASAL_OBAT').val();
            $.ajax({
                url         : "<?php echo base_url().'mutasi_bhp/getObat' ?>",
                type        : "POST",
                data        : {KDBRG:a,KDLOKASI:b},
                beforeSend  : function(){
                    $('#getDataObatCari').html('<tr><td colspan=5>Loading ... Please wait</td></tr>');
                },
                success : function(data){
                    $('#getDataObatCari').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(errorThrown);
                }
            });
        }
    });
    $('#xNMBRG').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            var a = $(this).val();
            var b = $('#ASAL_OBAT').val();
            $.ajax({
                url         : "<?php echo base_url().'mutasi_bhp/getObat' ?>",
                type        : "POST",
                data        : {NMBRG:a,KDLOKASI:b},
                beforeSend  : function(){
                    $('#getDataObatCari').html('<tr><td colspan=5>Loading ... Please wait</td></tr>');
                },
                success : function(data){
                    $('#getDataObatCari').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(errorThrown);
                }
            });
        }
    });
    $('#kembali').click(function(){
        window.location.href='<?php echo base_url('mutasi_bhp') ?>';
    });
    $("#SimpanTemp").click(function(){
        var a = $('#KDBRG').val();
        var b = $('#JMLMTBHP').val().replace('.','').replace('.','').replace('.','');
        var c = $('#JSTOK').val().replace('.','').replace('.','').replace('.','');
        if(a==""){
            alert("Nama obat / alat kesehatan masih kosong");
            $('#ADDBARANG').click();
        }else if(b=="" || b=="0"){
            alert("Jumlah mutasi masih kosong");
            $('#JMLMTBHP').focus();
        }else if(parseFloat(b) > parseFloat(c)){
            alert("Jumlah mutasi tidak boleh lebih dari jumlah stok");
            $('#JMLMTBHP').focus();
        }else{  
            $.ajax({
                url         : "<?php echo base_url().'mutasi_bhp/simpanTemp' ?>",
                type        : "POST",
                data        : $('#form2').serialize(),
                dataType    : "JSON",
                success     : function(data){
                    getTemp();                        
                    if(data.code==200){
                        kosongkanObjTemp();
                        $('#ADDBARANG').click();
                    }else{
                        alert(data.message);
                    }
                },
                error       : function(xhr, ajaxOption, thrownError){
                    alert('Response : ' + thrownError);
                }
            }); 
        }
    });    
    $('#simpan').click(function(){
        var a = $('#KDMTBHP').val();
        var b = $('#LOKASI_TUJUAN').val();
        var c = $('#KETMTBHP').val();
        if(b==""){
            alert("Lokasi tujuan mutasi belum di pilih");
            $('#LOKASI_TUJUAN').focus();
        }else{
            $.ajax({
                url         : "<?php echo base_url().'mutasi_bhp/simpan' ?>",
                type        : "POST",
                data        : $('#form1').serialize(),
                dataType    : "JSON",
                success : function(data){
                    alert(data.message);
                    if(data.code==200){
                        kosongkanObjEntry();
                        kosongkanObjTemp();
                        getTemp();
                    }
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(errorThrown);
                }
            });
        }
    });
    $('#JMLMTBHP').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        var x = $(this).val().replace('.','').replace('.','').replace('.','');
        if(x==""){
            $('#JMLMTBHP').val("0");
        }
        if(event==13){
            $('#SimpanTemp').click();
        }
    });
});

/* Javascript */
function uangdes(number){
    var ce = number.toString().replace('.',',');
    var pisah = ce.split(',');
    var angka = parseFloat(pisah[0]);
    var UD = pisah[1] != undefined ? curencyFormat(angka) + ',' + ((pisah[1].length > 1) ? pisah[1].substr(0,2) : pisah[1]+'0')  : curencyFormat(angka) + ',00';  
    return UD;          
}
function format_number(number, prefix, thousand_separator, decimal_separator){
	var decimal_separator = decimal_separator || ',',
		regex		= new RegExp('[^' + decimal_separator + '\\d]', 'g'),
		number_string = number.replace(regex, '').toString(),
		split	  = number_string.split(decimal_separator),
		result 	  = split[0]
        
	result = split[1] != undefined ? result + decimal_separator + split[1] : result;
	return prefix == undefined ? result : (result ? prefix + result : '');
};

function kosongkanObjTemp(){
    $('#KDBRG').val('');
    $('#NMBRG').val('');
    $('#NMSATUAN').val('');
    $('#JSTOK').val('0');
    $('#JMLMTBHP').val('0');
}
function cariKodeObat(){
    var a = $('#xKDBRG').val();
    var b = $('#ASAL_OBAT').val();    
    $.ajax({
        url         : "<?php echo base_url().'mutasi_bhp/getObat' ?>",
        type        : "POST",
        data        : {KDBRG:a,KDLOKASI:b},
        beforeSend  : function(){
            $('#getDataObatCari').html('<tr><td colspan=5>Loading ... Please wait</td></tr>');
        },
        success : function(data){
            $('#getDataObatCari').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            alert(errorThrown);
        }
    });
}
function cariNamaObat(){
    var a = $('#xNMBRG').val();
    var b = $('#ASAL_OBAT').val(); 
    $.ajax({
        url         : "<?php echo base_url().'mutasi_bhp/getObat' ?>",
        type        : "POST",
        data        : {NMBRG:a,KDLOKASI:b},
        beforeSend  : function(){
            $('#getDataObatCari').html('<tr><td colspan=5>Loading ... Please wait</td></tr>');
        },
        success : function(data){
            $('#getDataObatCari').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            alert(errorThrown);
        }
    });
}
function setObat(a,b,c,d){
    $('#KDBRG').val(a);
    $('#NMBRG').val(urldecode(b));
    $('#NMSATUAN').val(urldecode(c));
    $('#JSTOK').val(curencyFormat(urldecode(d)));
    $('#JMLMTBHP').val("0");
    $('#dialog').modal('hide');
    $('#JMLMTBHP').focus();
}
function getTemp(){
    $.ajax({
        url : "<?php echo base_url().'mutasi_bhp/getTemp' ?>",
        beforeSend  : function(){
            $('#getTemp').html('<tr><td colspan=5>Loading ... Please wait</td></tr>');
        },
        success : function(data){
            $('#getTemp').html(data);
        },
        error : function(xhr, ajaxOption, thrownError){
            alert('Response : ' + thrownError);
        }
    });  
}
function hapusTemp(a){
    var x = confirm("Apakah anda yakin akan menghapus data ini?");
    if(x){
        $.ajax({
            url : "<?php echo base_url().'mutasi_bhp/hapusTemp' ?>",
            type : "POST",
            data : {IDX:a},
            dataType : "JSON",
            success : function(data){
                alert(data.message);
                getTemp();
            },
            error : function(xhr, ajaxOption, thrownError){
                alert('Error Function : ' + thrownError);
            }
        });  
    }             
}
</script>
