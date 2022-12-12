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
        <h1>Transaksi Retur Mutasi BHP/BMHP</h1>
    </div>
    
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <form id="form1" action="#" method="post">
                        <table class="table table-striped transObat">
                            <tr>
                                <td width="150px">KODE MUTASI</td>
                                <td width="250px">
                                    <input type="hidden" name="KDMTBHP_RET" id="KDMTBHP_RET"/>
                                    <input readonly="" type="text" name="KDMTBHP" id="KDMTBHP" class="span12"/>
                                    <button class="btn" type="button" id="SEARCH_MUT" style="margin-left: -40px;position: absolute;">
                                        <i class="icon-search"></i></button>
                                </td>
                                <td rowspan="2">&nbsp;</td>
                                <td width="100px" rowspan="2">ALASAN</td>
                                <td rowspan="2">
                                    <textarea name="ALASAN_RET" id="ALASAN_RET" class="span12" rows="3"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>
                                    <button type="button" id="simpan" class="btn">
                                        <i class="icon-hdd"></i> Simpan</button>   
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
                                            <input readonly="" type="text" name="JMLMTBHP" id="JMLMTBHP" class="span12 rataKanan" />
                                        </th>
                                        <th>
                                            <input type="text" name="JMLRET" id="JMLRET" class="span12 rataKanan" onkeydown="return numbersFormat(this, event)" onkeyup="Javascript:curencyFormat(this)"/>
                                        </th>
                                        <th>
                                            <button id="SimpanTemp" type="button" class="btn" style="margin-top: -33px;">
                                                <i class="icon-plus"></i> Tambah</button>
                                        </th>
                                    </tr>
                                </form>
                                <tr>
                                    <th>Nama Obat / Alkes</th>
                                    <th width="120px">Satuan</th>
                                    <th width="110px">Jml Mutasi</th>
                                    <th width="100px">Jml Retur</th>
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
                                            <th width="120px">Jml Mutasi</th>
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

<!-- Modal -->
<div id="dialogMutasi" class="modal fade" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cari Transaksi Mutasi BHP/BMHP</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row-fluid" style="margin-top: -10px">
                        <div class="span12">
                            <form id="form1" action="#" method="get" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Lokasi Asal</label>
                                    <div class="controls">
                                        <select name="xLOKASI_ASAL" id="xLOKASI_ASAL" class="span4">
                                            <option value=""></option>
                                            <?php foreach($datlokasi->result_array() as $x): ?>
                                            <option value="<?php echo $x['KDLOKASI'] ?>"><?php echo $x['NMLOKASI'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        &nbsp;
                                        <button class="btn" type="button" onclick="cariLokasiAsal()">Cari Lokasi Asal</button>  
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Lokasi Tujuan</label>
                                    <div class="controls">
                                        <select name="xLOKASI_TUJUAN" id="xLOKASI_TUJUAN" class="span4">
                                            <option value=""></option>
                                            <?php foreach($datruangan->result_array() as $x): ?>
                                            <option value="<?php echo $x['KDRUANGAN'] ?>"><?php echo $x['NMRUANGAN'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        &nbsp;
                                        <button class="btn" type="button" onclick="cariLokasiTujuan()">Cari Lokasi Tujuan</button>  
                                    </div>
                                </div>
                            </form>
                            <div style="border-style: double;height: 250px;padding: 2px;overflow: scroll;">
                                <table class="table table-bordered table-striped" style="font-size: 1.2em">
                                    <thead>
                                        <tr>
                                            <th width="100px">Kode</th>
                                            <th>Tanggal</th>
                                            <th>Lokasi Asal</th>
                                            <th>Lokasi Tujuan</th>
                                            <th width="70px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody id="getDataMutasiCari"></tbody>
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
<script src="<?php echo get_asset() ?>jquery/jquery-ui.js"></script> 
<script src="<?php echo get_asset() ?>js/jquery.ui.custom.js"></script> 
<script src="<?php echo get_asset() ?>js/bootstrap.min.js"></script> 
<script src="<?php echo get_asset() ?>js/select2.min.js"></script> 
<script src="<?php echo get_asset() ?>js/maruti.js"></script> 
<script src="<?php echo get_asset() ?>js/defira.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#xLOKASI_ASAL').select2({placeholder:'Pilih Lokasi Tujuan Asal'});
    $('#xLOKASI_TUJUAN').select2({placeholder:'Pilih Lokasi Tujuan Mutasi'});
    
    function kosongkanObjEntry(){
        $('#KDMTBHP_RET').val('');
        $('#KDMTBHP').val('');
        $('#ALASAN_RET').val('');
    }
    function kosongkanObjTemp(){
        $('#KDBRG').val('');
        $('#NMBRG').val('');
        $('#NMSATUAN').val('');
        $('#JMLMTBHP').val('0');
        $('#JMLRET').val('0');
    }
    kosongkanObjEntry();
    kosongkanObjTemp();
    emptyTemp();
    function getTemp(){
        $.ajax({
            url : "<?php echo base_url().'retur_mutasi_bhp/getTemp' ?>",
            beforeSend  : function(){
                $('#getTemp').html("<tr><td colspan=5>Loading ... Please Wait</td></tr>");
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
            url     : "<?php echo base_url().'retur_mutasi_bhp/emptyTemp' ?>",
            success : function(data){
                getTemp(); 
            },
            error : function(xhr, ajaxOption, thrownError){
                alert('Response : ' + thrownError);
            }
        });                     
    }
    $('#SEARCH_MUT').click(function(){
        kosongkanObjTemp();
        emptyTemp();
        $('#xKDMTBHP').val("");
        $('#xLOKASI_ASAL').val('').trigger('change');
        $('#xLOKASI_TUJUAN').val('').trigger('change');
        $('#getDataMutasiCari').html("");
        $("#dialogMutasi").modal( "show" );            
    });
    $('#ADDBARANG').click(function(){
        var a = $('#KDMTBHP').val();
        if(a==""){
            alert("Silahkan pilih kode mutasi yang akan di retur");
            $('#SEARCH_MUT').click();
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
            var b = $('#KDMTBHP').val();
            $.ajax({
                url         : "<?php echo base_url().'retur_mutasi_bhp/getObat' ?>",
                type        : "POST",
                data        : {KDBRG:a,KDMTBHP:b},
                beforeSend  : function(){
                    $('#getDataObatCari').html("");
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
            var b = $('#KDMTBHP').val();
            $.ajax({
                url         : "<?php echo base_url().'retur_mutasi_bhp/getObat' ?>",
                type        : "POST",
                data        : {NMBRG:a,KDMTBHP:b},
                beforeSend  : function(){
                    $('#getDataObatCari').html("");
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
        window.location.href='<?php echo base_url('retur_mutasi_bhp') ?>';
    });     
    $("#SimpanTemp").click(function(){
        var a = $('#KDBRG').val();
        var b = $('#JMLRET').val();
        var c = $('#JMLMTBHP').val();
        if(a==""){
            alert("Nama obat / alat kesehatan masih kosong");
            $('#ADDBARANG').click();
        }else if(b=="" || b=="0"){
            alert("Jumlah retur masih kosong");
            $('#JMLRET').focus();
        }else if(parseFloat(c) < parseFloat(b)){
            alert("Jumlah retur tidak boleh lebih besar dari jumlah mutasi");
            $('#JMLRET').focus();
        }else{  
            $.ajax({
                url         : "<?php echo base_url().'retur_mutasi_bhp/simpanTemp' ?>",
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
        if(a==""){
            alert("Kode mutasi belum di pilih");
            $('#SEARCH_MUT').click();
        }else{
            $.ajax({
                url         : "<?php echo base_url().'retur_mutasi_bhp/simpan' ?>",
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
    $('#JMLRET').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#SimpanTemp').click();
        }
    });
});
</script>    
<script>    
/* Javascript */
function kosongkanObjTemp(){
    $('#KDBRG').val('');
    $('#NMBRG').val('');
    $('#NMSATUAN').val('');
    $('#JMLMTBHP').val('0');
    $('#JMLRET').val('0');
}
function cariKodeMutasi(){
    var a = $('#xKDMTBHP').val();
    $.ajax({
        url         : "<?php echo base_url().'retur_mutasi_bhp/getMutasi' ?>",
        type        : "POST",
        data        : {KDMTBHP:a},
        beforeSend  : function(){
            $('#getDataMutasiCari').html("<tr><td colspan=5>Loading ... Please Wait</td></tr>");
        },
        success : function(data){
            $('#getDataMutasiCari').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            alert(errorThrown);
        }
    });
}
function cariLokasiTujuan(){
    var a = $('#xLOKASI_TUJUAN').val();
    $.ajax({
        url         : "<?php echo base_url().'retur_mutasi_bhp/getMutasi' ?>",
        type        : "POST",
        data        : {KDRUANGAN:a},
        beforeSend  : function(){
            $('#getDataMutasiCari').html("<tr><td colspan=5>Loading ... Please Wait</td></tr>");
        },
        success : function(data){
            $('#getDataMutasiCari').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            alert(errorThrown);
        }
    });
}
function cariLokasiAsal(){
    var a = $('#xLOKASI_ASAL').val();
    $.ajax({
        url         : "<?php echo base_url().'retur_mutasi_bhp/getMutasi' ?>",
        type        : "POST",
        data        : {KDLOKASI:a},
        beforeSend  : function(){
            $('#getDataMutasiCari').html("<tr><td colspan=5>Loading ... Please Wait</td></tr>");
        },
        success : function(data){
            $('#getDataMutasiCari').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            alert(errorThrown);
        }
    });
}
function cariKodeObat(){
    var a = $('#xKDBRG').val();
    var b = $('#KDMTBHP').val();
    $.ajax({
        url         : "<?php echo base_url().'retur_mutasi_bhp/getObat' ?>",
        type        : "POST",
        data        : {KDBRG:a,KDMTBHP:b},
        beforeSend  : function(){
            $('#getDataObatCari').html("<tr><td colspan=5>Loading ... Please Wait</td></tr>");
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
    var b = $('#KDMTBHP').val();
    $.ajax({
        url         : "<?php echo base_url().'retur_mutasi_bhp/getObat' ?>",
        type        : "POST",
        data        : {NMBRG:a,KDMTBHP:b},
        beforeSend  : function(){
            $('#getDataObatCari').html("<tr><td colspan=5>Loading ... Please Wait</td></tr>");
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
    $('#JMLMTBHP').val(urldecode(d));
    $('#JMLRET').val("0");
    $('#dialog').modal('hide');
    $('#JMLRET').focus();
}
function setMutasi(a){
    $('#KDMTBHP').val(a);
    $('#dialogMutasi').modal('hide');
    $('#ALASAN_RMT').focus();
}
function getTemp(){
    $.ajax({
        url : "<?php echo base_url().'retur_mutasi_bhp/getTemp' ?>",
        beforeSend  : function(){
            $('#getTemp').html("<tr><td colspan=5>Loading ... Please Wait</td></tr>");
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
            url : "<?php echo base_url().'retur_mutasi_bhp/hapusTemp' ?>",
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
