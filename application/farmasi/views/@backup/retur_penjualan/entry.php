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
.widget-box{border: none;}
.rataKanan{text-align: right;}
.select2-container{margin-bottom: 10px;}
</style>
<div id="content">
    <div id="content-header">
        <?php echo get_breadcrumb() ?>  
        <h1>Transaksi Retur Penjualan</h1>
    </div>
    
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <form id="form1" action="#" method="post">
                        <table class="table table-striped transObat">
                            <tr>
                                <td width="150px">PASIEN</td>
                                <td width="250px">
                                    <input readonly="" type="text" name="NOMR" id="NOMR" class="span12" tabindex="1"/>
                                    <button class="btn" type="button" id="SEARCH_ID" style="margin-left: -40px;position: absolute;" tabindex="2">
                                        <i class="icon-search"></i></button>
                                </td>
                                <td>&nbsp;</td>
                                <td width="150px">NAMA PASIEN</td>
                                <td>
                                    <input readonly="" type="text" name="NMPASIEN" id="NMPASIEN" class="span12" tabindex="3"/>
                                </td>
                                <td>&nbsp;</td>
                                <td width="150px">ALAMAT</td>
                                <td>
                                    <input readonly="" type="text" name="ALMTPASIEN" id="ALMTPASIEN" class="span12" tabindex="4"/>
                                </td>
                            </tr>
                            <tr>
                                <td>JENIS PELAYANAN</td>
                                <td>
                                    <select name="KDPELAYANAN" id="KDPELAYANAN" class="span12" tabindex="5">
                                        <?php foreach($datpelayanan->result_array() as $x): ?>
                                        <option value="<?php echo $x['KDPELAYANAN'] ?>"><?php echo $x['NMPELAYANAN'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>&nbsp;</td>
                                <td>TANGGAL MASUK</td>
                                <td>
                                    <input type="text" name="TGL_AWAL" id="TGL_AWAL" class="span6" placeholder="__-__-____" tabindex="6"/>
                                </td>
                                <td>&nbsp;</td>
                                <td>TANGGAL KELUAR</td>
                                <td>
                                    <input type="text" name="TGL_AKHIR" id="TGL_AKHIR" class="span7" placeholder="__-__-____" tabindex="7"/>
                                </td>
                            </tr>
                            <tr>
                                <td>LOKASI</td>
                                <td>
                                    <select name="KDLOKASI" id="KDLOKASI" class="span12" tabindex="8">
                                        <option value=""></option>
                                        <?php foreach($datlokasi->result_array() as $x): ?>
                                        <option value="<?php echo $x['KDLOKASI'] ?>"><?php echo $x['NMLOKASI'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>&nbsp;</td>
                                <td>ALASAN</td>
                                <td colspan="4">
                                    <input type="text" name="ALASAN_RET" id="ALASAN_RET" class="span12" placeholder="Enter Alasan Retur" tabindex="10"/>
                                </td>
                            </tr>
                            <tr>
                                <td>POLIKLINIK/RUANGAN</td>
                                <td>
                                    <select name="KDRUANGAN" id="KDRUANGAN" class="span12" tabindex="9">
                                        <option value=""></option>
                                        <?php foreach($datruangan->result_array() as $x): ?>
                                        <option value="<?php echo $x['KDRUANGAN'] ?>"><?php echo $x['NMRUANGAN'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>&nbsp;</td>
                                <td></td>
                                <td>
                                    <button type="button" id="simpan" class="btn" tabindex="1">
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
                                            <input readonly="" type="text" name="HJUAL" id="HJUAL" class="span12 rataKanan"/>
                                        </th>
                                        <th>
                                            <input readonly="" type="text" name="JMLJUAL" id="JMLJUAL" class="span12 rataKanan" />
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
                                    <th width="110px">Harga Jual</th>
                                    <th width="110px">Jml Jual</th>
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
                                            <th width="120px">Harga Jual</th>
                                            <th width="120px">Jml Jual</th>
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
<div id="dialogPasien" class="modal fade" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cari Pasien</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row-fluid" style="margin-top: -10px">
                        <div class="span12">
                            <form id="form1" action="#" method="get" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">No MR</label>
                                    <div class="controls">
                                        <input type="text" name="xNOMR" id="xNOMR" class="span4" placeholder="Enter No MR"/> 
                                        <button class="btn" type="button" onclick="cariKode()">Cari No MR</button>  
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Nama Pasien</label>
                                    <div class="controls">
                                        <input type="text" name="Keywords" id="Keywords" class="span4" placeholder="Enter Nama Pasien"/> 
                                        <button class="btn" type="button" onclick="cariKeywords()">Cari Nama Pasien</button>  
                                    </div>
                                </div>
                            </form>
                            <div style="border-style: double;height: 250px;padding: 2px;overflow: scroll;">
                                <table class="table table-bordered table-striped" style="font-size: 1.2em">
                                    <thead>
                                        <tr>
                                            <th width="100px">No MR</th>
                                            <th>Nama Pasien</th>
                                            <th width="120px">Jenis Kelamin</th>
                                            <th width="120px">DOB</th>
                                            <th>Alamat</th>
                                            <th width="70px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody id="getDataPasienCari"></tbody>
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
    $('#kembali').click(function(){
        window.location.href='<?php echo base_url('retur_penjualan') ?>';
    });
    $('#KDLOKASI').select2({placeholder : 'Pilih lokasi asal obat',openOnEnter:false});
    $('#KDRUANGAN').select2({placeholder : 'Pilih poliklinik / ruangan',openOnEnter:false});   
    $('#TGL_AWAL').mask("00-00-0000");
    $('#TGL_AKHIR').mask("00-00-0000");
    
    function kosongkanObjEntry(){
        $('#NOMR').val('');
        $('#NMPASIEN').val('');
        $('#ALMTPASIEN').val('');
        $('#KDPELAYANAN').prop('selectedIndex',0);
        $('#KDRUANGAN').val('').trigger('change');
        $('#KDLOKASI').val('').trigger('change');
        $('#TGL_AWAL').val('');
        $('#TGL_AKHIR').val('');
        $('#ALASAN_RET').val('');
    }
    function kosongkanObjTemp(){
        $('#KDBRG').val('');
        $('#NMBRG').val('');
        $('#NMSATUAN').val('');
        $('#HJUAL').val('0');
        $('#JMLJUAL').val('0');
        $('#JMLRET').val('0');
    }
    kosongkanObjEntry();
    kosongkanObjTemp();
    emptyTemp();
    //getTemp();
    function getTemp(){
        $.ajax({
            url : "<?php echo base_url().'retur_penjualan/getTemp' ?>",
            beforeSend  : function(){
                $('#getTemp').html('<tr><td colspan=10>Loading ... Please Wait</td></tr>');
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
            url     : "<?php echo base_url().'retur_penjualan/emptyTemp' ?>",
            success : function(data){
                getTemp(); 
            },
            error : function(xhr, ajaxOption, thrownError){
                alert('Response : ' + thrownError);
            }
        });                     
    }
    $('#SEARCH_ID').click(function(){
        kosongkanObjTemp();
        emptyTemp();
        $('#NOMR').val("");
        $('#NMPASIEN').val("");
        $('#ALMTPASIEN').val("");

        $('#xNOMR').val("");
        $('#Keywords').val('');
        $('#getDataPasienCari').html("");
        $("#dialogPasien").modal( "show" );            
    });
    $('#ADDBARANG').click(function(){
        var a = $('#NOMR').val();
        if(a==""){
            alert("Silahkan pilih pasien yang akan di retur");
            $('#SEARCH_ID').click();
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
            var b = $('#NOMR').val();
            var c = $('#KDPELAYANAN').val();
            var d = $('#KDLOKASI').val();
            var e = $('#KDRUANGAN').val();
            var f = $('#TGL_AWAL').val();
            var g = $('#TGL_AKHIR').val();
            $.ajax({
                url         : "<?php echo base_url().'retur_penjualan/getObat' ?>",
                type        : "POST",
                data        : {KDBRG:a,NOMR:b,KDPELAYANAN:c,KDLOKASI:d,KDRUANGAN:e,TGL_AWAL:f,TGL_AKHIR:g},
                beforeSend  : function(){
                    $('#getDataObatCari').html("<tr><td colspan=6>Loading ... Please Wait</td></tr>");
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
            var b = $('#NOMR').val();
            var c = $('#KDPELAYANAN').val();
            var d = $('#KDLOKASI').val();
            var e = $('#KDRUANGAN').val();
            var f = $('#TGL_AWAL').val();
            var g = $('#TGL_AKHIR').val();
            $.ajax({
                url         : "<?php echo base_url().'retur_penjualan/getObat' ?>",
                type        : "POST",
                data        : {NMBRG:a,NOMR:b,KDPELAYANAN:c,KDLOKASI:d,KDRUANGAN:e,TGL_AWAL:f,TGL_AKHIR:g},
                beforeSend  : function(){
                    $('#getDataObatCari').html("<tr><td colspan=6>Loading ... Please Wait</td></tr>");
                },
                success : function(data){
                    $('#getDataObatCari').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(jqXHR.responseText);
                }
            });
        }
    });
    $('#Keywords').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            var a = $(this).val();
            $.ajax({
                url         : "<?php echo base_url().'retur_penjualan/getPasien' ?>",
                type        : "POST",
                data        : {KEYWORDS:a},
                beforeSend  : function(){
                    $('#getDataPasienCari').html("<tr><td colspan=6>Loading ...</td></tr>");
                },
                success : function(data){
                    $('#getDataPasienCari').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(jqXHR.responseText);
                }
            });
        }
    });

    $('#TGL_AWAL').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#TGL_AKHIR').focus();
        }
    });
    $('#TGL_AKHIR').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#KDLOKASI').select2('open');
        }
    });
    $('#KDLOKASI').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#KDLOKASI').select2('open');
        }
    });
    $('#JMLRET').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        var x = $(this).val();
        if(x==""){
            $('#JMLRET').val("0");
        }
        if(event==13){
            $('#SimpanTemp').click();
        }
    });
    $("#SimpanTemp").click(function(){
        var a = $('#KDBRG').val();
        var b = $('#JMLRET').val();
        var c = $('#JMLJUAL').val();
        if(a==""){
            alert("Nama obat / alat kesehatan masih kosong");
            $('#ADDBARANG').click();
        }else if(b=="" || b=="0"){
            alert("Jumlah retur masih kosong");
            $('#JMLRET').focus();
        }else if(parseFloat(c) < parseFloat(b)){
            alert("Jumlah retur tidak boleh lebih besar dari jumlah jual");
            $('#JMLRET').focus();
        }else{  
            $.ajax({
                url         : "<?php echo base_url().'retur_penjualan/simpanTemp' ?>",
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
        var a = $('#KDJL').val();
        if(a==""){
            alert("Kode mutasi belum di pilih");
            $('#SEARCH_ID').click();
        }else{
            $.ajax({
                url         : "<?php echo base_url().'retur_penjualan/simpan' ?>",
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
});
</script>    

<script>    
function kosongkanObjTemp(){
    $('#KDBRG').val('');
    $('#NMBRG').val('');
    $('#NMSATUAN').val('');
    $('#JMLJUAL').val('0');
    $('#JMLRET').val('0');
}
function cariKode(){
    var a = $('#xNOMR').val();
    $.ajax({
        url         : "<?php echo base_url().'retur_penjualan/getPasien' ?>",
        type        : "POST",
        data        : {NOMR:a},
        beforeSend  : function(){
            $('#getDataPasienCari').html("<tr><td colspan=6>Loading ... Please Wait</td></tr>");
        },
        success : function(data){
            $('#getDataPasienCari').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            alert(errorThrown);
        }
    });
}
function cariKeywords(){
    var a = $('#Keywords').val();
    $.ajax({
        url         : "<?php echo base_url().'retur_penjualan/getPasien' ?>",
        type        : "POST",
        data        : {KEYWORDS:a},
        beforeSend  : function(){
            $('#getDataPasienCari').html("<tr><td colspan=6>Loading ... Please Wait</td></tr>");
        },
        success : function(data){
            $('#getDataPasienCari').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            alert(errorThrown);
        }
    });
}   
function cariKodeObat(){
    var a = $('#xKDBRG').val();
    var b = $('#NOMR').val();
    var c = $('#KDPELAYANAN').val();
    var d = $('#KDLOKASI').val();
    var e = $('#KDRUANGAN').val();
    var f = $('#TGL_AWAL').val();
    var g = $('#TGL_AKHIR').val();
    $.ajax({
        url         : "<?php echo base_url().'retur_penjualan/getObat' ?>",
        type        : "POST",
        data        : {KDBRG:a,NOMR:b,KDPELAYANAN:c,KDLOKASI:d,KDRUANGAN:e,TGL_AWAL:f,TGL_AKHIR:g},
        beforeSend  : function(){
            $('#getDataObatCari').html("<tr><td colspan=6>Loading ... Please Wait</td></tr>");
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
    var b = $('#NOMR').val();
    var c = $('#KDPELAYANAN').val();
    var d = $('#KDLOKASI').val();
    var e = $('#KDRUANGAN').val();
    var f = $('#TGL_AWAL').val();
    var g = $('#TGL_AKHIR').val();
    $.ajax({
        url         : "<?php echo base_url().'retur_penjualan/getObat' ?>",
        type        : "POST",
        data        : {NMBRG:a,NOMR:b,KDPELAYANAN:c,KDLOKASI:d,KDRUANGAN:e,TGL_AWAL:f,TGL_AKHIR:g},
        beforeSend  : function(){
            $('#getDataObatCari').html("<tr><td colspan=6>Loading ... Please Wait</td></tr>");
        },
        success : function(data){
            $('#getDataObatCari').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            alert(errorThrown);
        }
    });
}
function setObat(a,b,c,d,e){
    $('#KDBRG').val(a);
    $('#NMBRG').val(urldecode(b));
    $('#NMSATUAN').val(urldecode(c));
    $('#HJUAL').val(urldecode(d));
    $('#JMLJUAL').val(urldecode(e));
    $('#JMLRET').val("0");
    $('#dialog').modal('hide');
    $('#JMLRET').focus();
}
function setPasien(a,b,c){
    $('#NOMR').val(a);
    $('#NMPASIEN').val(urldecode(b));
    $('#ALMTPASIEN').val(urldecode(c));
    $('#dialogPasien').modal('hide');
    $('#KDPELAYANAN').focus();
}
function getTemp(){
    $.ajax({
        url         : "<?php echo base_url().'retur_penjualan/getTemp' ?>",
        beforeSend  : function(){
            $('#getTemp').html('<tr><td colspan=10>Loading ... Please Wait</td></tr>');
        },
        success     : function(data){
            $('#getTemp').html(data);
        },
        error       : function(xhr, ajaxOption, thrownError){
            alert('Response : ' + thrownError);
        }
    });  
}
function hapusTemp(a){
    var x = confirm("Apakah anda yakin akan menghapus data ini?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'retur_penjualan/hapusTemp' ?>",
            type        : "POST",
            data        : {IDX:a},
            dataType    : "JSON",
            success     : function(data){
                alert(data.message);
                getTemp();
            },
            error       : function(xhr, ajaxOption, thrownError){
                alert('Error Function : ' + thrownError);
            }
        });  
    }            
}
</script>
