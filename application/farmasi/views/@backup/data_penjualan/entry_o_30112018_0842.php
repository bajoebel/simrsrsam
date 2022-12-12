<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="<?php echo get_asset() ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo get_asset() ?>jquery/jquery-ui.css" />
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
</style>
<div id="content">
    <div id="content-header">
        <?php echo get_breadcrumb() ?>  
        <h1>Transaksi Penjualan</h1>
    </div>
    
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <form id="form1" action="#" method="post">
                        <table class="table table-striped transObat">
                            <tr>
                                <td width="140px">PASIEN</td>
                                <td width="275px">
                                    <input readonly="" type="text" name="NOMR" id="NOMR" class="span12"/>
                                    <button class="btn" type="button" id="SEARCH_PASIEN" style="margin-left: -40px;position: absolute;">
                                        <i class="icon-search"></i></button>
                                </td>
                                <td>&nbsp;</td>
                                <td width="140px">NAMA PASIEN</td>
                                <td width="275px">
                                    <input readonly="" type="text" name="NMPASIEN" id="NMPASIEN" class="span12" />
                                </td>
                                <td>&nbsp;</td>
                                <td width="140px">ALAMAT PASIEN</td>
                                <td width="275px">
                                    <input readonly="" type="text" name="ALMTPASIEN" id="ALMTPASIEN" class="span12"/>
                                </td>
                            </tr>
                            <tr>
                                <td>LOKASI</td>
                                <td>
                                    <select name="KDLOKASI" id="KDLOKASI" class="span12">
                                        <option value=""></option>
                                        <?php foreach($datlokasi->result_array() as $x): ?>
                                            <option value="<?php echo $x['KDLOKASI'] ?>"><?php echo $x['NMLOKASI'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>&nbsp;</td>
                                <td>JENIS PASIEN</td>
                                <td>
                                    <select name="KDJPASIEN" id="KDJPASIEN" class="span12">
                                        <?php foreach($datjenis->result_array() as $x): ?>
                                            <option value="<?php echo $x['KDJPASIEN'] ?>"><?php echo $x['NMJPASIEN'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>&nbsp;</td>
                                <td>TOTAL</td>
                                <td>
                                    <input readonly="" type="text" name="TOTAL" id="TOTAL" class="span12 rataKanan" />
                                </td>
                            </tr>
                            <tr>
                                <td>POLIKLINIK/RUANGAN</td>
                                <td>
                                    <select name="KDRUANGAN" id="KDRUANGAN" class="span12">
                                        <option value=""></option>
                                        <?php foreach($datruangan->result_array() as $x): ?>
                                            <option value="<?php echo $x['KDRUANGAN'] ?>"><?php echo $x['NMRUANGAN'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>&nbsp;</td>
                                <td>DOKTER</td>
                                <td>
                                    <select name="KDDOKTER" id="KDDOKTER" class="span12">
                                        <option value=""></option>
                                        <?php foreach($datdokter->result_array() as $x): ?>
                                            <option value="<?php echo $x['KDDOKTER'] ?>"><?php echo $x['NMDOKTER'] ?></option>
                                        <?php endforeach; ?>
                                    </select>                                    
                                </td>
                                <td>&nbsp;</td>
                                <td>NILAI R</td>
                                <td>
                                    <input readonly="" type="text" name="nilaiR" id="nilaiR" class="span12 rataKanan"/>                                    
                                </td>
                                
                            </tr>
                            <tr>
                                <td>NO RESEP</td>
                                <td>
                                    <input type="text" name="NORESEP" id="NORESEP" class="span12" />
                                </td>
                                <td>&nbsp;</td>
                                <td>PELAYANAN</td>
                                <td>
                                    <select name="KDPELAYANAN" id="KDPELAYANAN" class="span12">
                                        <?php foreach($datpelayanan->result_array() as $x): ?>
                                            <option value="<?php echo $x['KDPELAYANAN'] ?>"><?php echo $x['NMPELAYANAN'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>&nbsp;</td>
                                <td>GRAND TOTAL</td>
                                <td>
                                    <input readonly="" type="text" name="GRANDTOT" id="GRANDTOT" class="span12 rataKanan" />
                                </td>
                            </tr>
                            <tr>
                                <td>TANGGAL RESEP</td>
                                <td>
                                    <input type="text" name="TGLRESEP" id="TGLRESEP" class="span6" placeholder="__-__-____"/>                                 
                                </td>
                                <td>&nbsp;</td>
                                <td>KETERANGAN</td>
                                <td>
                                    <input type="text" name="KETJL" id="KETJL" class="span12" />                           
                                </td>
                                <td>&nbsp;</td>
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
                        <form id="form2" action="#" method="post">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th><input type="text" name="P_DISKON" id="P_DISKON" class="span8 rataKanan"/> %</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <input type="hidden" name="KDBRG" id="KDBRG"/>
                                            <input readonly="" type="text" name="NMBRG" id="NMBRG" class="span12"/>
                                            <button class="btn" type="button" id="ADDBARANG" style="margin-left: -40px;position: absolute;">
                                                <i class="icon-search"></i></button>
                                        </th>
                                        <th>
                                            <input readonly="" type="text" name="JSTOK" id="JSTOK" class="span12 rataKanan" />
                                        </th>
                                        <th>
                                            <input type="text" name="HJUAL" id="HJUAL" class="span12 rataKanan" onkeydown="return numbersFormat(this, event)" onkeyup="Javascript:curencyFormat(this)"/>
                                        </th>
                                        <th>
                                            <input type="text" name="JMLJUAL" id="JMLJUAL" class="span12 rataKanan" onkeydown="return numbersFormat(this, event)" onkeyup="Javascript:curencyFormat(this)"/>
                                        </th>
                                        <th>
                                            <input type="text" name="DISKON" id="DISKON" class="span12 rataKanan"/>
                                        </th>
                                        <th>
                                            <input readonly="" type="text" name="SUBTOTAL" id="SUBTOTAL" class="span12 rataKanan" onkeydown="return numbersFormat(this, event)" onkeyup="Javascript:curencyFormat(this)"/>
                                        </th>
                                        <th>
                                            <input type="text" name="PAKAI" id="PAKAI" class="span12 rataKanan" onkeydown="return numbersFormat(this, event)" onkeyup="Javascript:curencyFormat(this)"/>
                                        </th>
                                        <th>
                                            <input type="checkbox" name="KRONIS" id="KRONIS" style="margin-top: -33px;"/>
                                        </th>
                                        <th>
                                            <button id="SimpanTemp" type="button" class="btn" style="margin-top: -33px;">
                                                <i class="icon-plus"></i> Tambah</button>
                                        </th>
                                    </tr>
                                    
                                    <tr>
                                        <th>Nama Obat / Alkes</th>
                                        <th width="80px">Stok</th>
                                        <th width="110px">Harga Jual</th>
                                        <th width="60px">Jumlah</th>
                                        <th width="100px">Diskon</th>
                                        <th width="110px">Total</th>
                                        <th width="80px">Pemakaian (hari)</th>
                                        <th width="50px">Kronis</th>
                                        <th width="120px">#</th>
                                    </tr>
                                </thead>
                                <tbody id="getTemp"></tbody>
                            </table>
                        </form>
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

<div id="dialogPasien" class="modal fade" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cari Data Pasien</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row-fluid" style="margin-top: -10px">
                        <div class="span12">
                            <form id="form1" action="#" method="get" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">No MR</label>
                                    <div class="controls">
                                        <input type="text" name="xNoMR" id="xNoMR" class="span6" placeholder="Enter No MR"/> 
                                        <button class="btn" type="button" onclick="cariNoMR()">Cari No MR</button>  
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Nama Pasien</label>
                                    <div class="controls">
                                        <input type="text" name="xNMPASIEN" id="xNMPASIEN" class="span6" placeholder="Enter Nama Pasien" />
                                        <button class="btn" type="button" onclick="cariNamaPasien()">Cari Nama Pasien</button>  
                                    </div>
                                </div>
                            </form>
                            <div style="border-style: double;height: 250px;padding: 2px;overflow: scroll;">
                                <table class="table table-bordered table-striped" style="font-size: 1.2em">
                                    <thead>
                                        <tr>
                                            <th width="80px">No MR</th>
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
    $('#TGLRESEP').mask("00-00-0000");
    $('#P_DISKON').mask("##0,00",{reverse:true});
    $('#DISKON').mask("###.###.###.##0,00",{reverse:true});
    $('#KDLOKASI').select2({placeholder : "Pilih Lokasi"}).val('').trigger('change');
    $('#KDRUANGAN').select2({placeholder : "Pilih Ruangan"}).val('').trigger('change');
    $('#KDDOKTER').select2({placeholder : "Pilih Dokter"}).val('').trigger('change');
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
        $('#KDJPASIEN').prop("selectedIndex",0);
        $('#KDPELAYANAN').prop("selectedIndex",0);
        $('#KDLOKASI').val('').trigger('change');
        $('#KDRUANGAN').val('').trigger('change');
        $('#KDDOKTER').val('').trigger('change');
        $('#NOMR').val('');
        $('#NMPASIEN').val('');
        $('#ALMTPASIEN').val('');
        $('#KETJL').val('');
        $('#NORESEP').val('');
        $('#TGLRESEP').val('<?php echo date('d-m-Y') ?>');
        $('#TOTAL').val('0,00');
        $('#nilaiR').val('0,00');
        $('#GRANDTOT').val('0,00');
    }
    function kosongkanObjTemp(){
        $('#KDBRG').val('');
        $('#NMBRG').val('');
        $('#JSTOK').val('0');
        $('#HJUAL').val('0');
        $('#JMLJUAL').val('0');
        $('#P_DISKON').val('0,00');
        $('#DISKON').val('0,00');
        $('#SUBTOTAL').val('0,00');
        $('#PAKAI').val('0');
        $('#KRONIS').prop('checked',false);
    }
    kosongkanObjEntry();
    kosongkanObjTemp();
    emptyTemp();
    //getTemp();
    function getTemp(){
        $.ajax({
            url : "<?php echo base_url().'data_penjualan/getTemp' ?>",
            beforeSend  : function(){
                $('#getTemp').html('');
            },
            success : function(data){
                $('#getTemp').html(data);
            },
            error : function(xhr, ajaxOption, thrownError){
                alert('Response : ' + thrownError);
            }
        });
        $.ajax({
            url     : "<?php echo base_url().'data_penjualan/getTotalTemp' ?>",
            dataType: "JSON",
            success : function(data){
                $('#TOTAL').val(uangdes(data.TOTAL));                
                $('#nilaiR').val(uangdes(data.TOTAL_R));                
                $('#GRANDTOT').val(uangdes(data.GRANDTOTAL));
            },
            error : function(xhr, ajaxOption, thrownError){
                alert('Response : ' + thrownError);
            }
        });         
    }
    function emptyTemp(){
        $.ajax({
            url     : "<?php echo base_url().'data_penjualan/emptyTemp' ?>",
            type    : "POST",
            data    : {UEXEC:"<?php echo getUserID() ?>"},
            dataType: "JSON",
            beforeSend : function(data){
                $('#getTemp').html('<tr><td colspan=10>Loading ... Please Wait </td></tr>');
            },
            success : function(data){
		        console.log(data);
                getTemp(); 
            },
            error : function(xhr, ajaxOption, thrownError){
                alert('Response : ' + thrownError);
            }
        });                     
    }   
    
    $('#ADDBARANG').click(function(){
        var a = $('#KDLOKASI').val();
        if(a == ""){
            alert("Lokasi Obat belum dipilih");
        }else{
            kosongkanObjTemp();
            $('#xKDBRG').val("");
            $('#xNMBRG').val("");
            $('#getDataObatCari').html("");
            $("#dialog").modal( "show" );      
            $('#xNMBRG').focus();
        }
    });
    $('#xKDBRG').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            var a = $(this).val();
            var b = $('#KDLOKASI').val();
            $.ajax({
                url         : "<?php echo base_url().'data_penjualan/getObat' ?>",
                type        : "POST",
                data        : {KDBRG:a,KDLOKASI:b},
                beforeSend  : function(){
                    $('#getDataObatCari').html("<tr><td colspan=6>Loading ...</td></tr>");
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
            var b = $('#KDLOKASI').val();
            $.ajax({
                url         : "<?php echo base_url().'data_penjualan/getObat' ?>",
                type        : "POST",
                data        : {NMBRG:a,KDLOKASI:b},
                beforeSend  : function(){
                    $('#getDataObatCari').html("<tr><td colspan=6>Loading ...</td></tr>");
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

    $('#SEARCH_PASIEN').click(function(){
        $('#NOMR').val("");
        $('#NMPASIEN').val("");
        $('#ALMTPASIEN').val("");
        
        $('#xNoMR').val("");
        $('#xNMPASIEN').val("");
        $('#getDataPasienCari').html("");
        $("#dialogPasien").modal( "show" ); 
        $('#xNMPASIEN').focus();   
    });
    $('#xNoMR').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            var a = $(this).val();
            $.ajax({
                url         : "<?php echo base_url().'data_penjualan/getPasien' ?>",
                type        : "POST",
                data        : {NOMR:a},
                beforeSend  : function(){
                    $('#getDataPasienCari').html("<tr><td colspan=6>Loading ...</td></tr>");
                },
                success : function(data){
                    $('#getDataPasienCari').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(errorThrown);
                }
            });
        }
    });
    $('#xNMPASIEN').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            var a = $(this).val();
            $.ajax({
                url         : "<?php echo base_url().'data_penjualan/getPasien' ?>",
                type        : "POST",
                data        : {NMPASIEN:a},
                beforeSend  : function(){
                    $('#getDataPasienCari').html("<tr><td colspan=6>Loading ...</td></tr>");
                },
                success : function(data){
                    $('#getDataPasienCari').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(errorThrown);
                }
            });
        }
    });
    $('#kembali').click(function(){
        window.location.href='<?php echo base_url('data_penjualan') ?>';
    });
    $('#NORESEP').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#TGLRESEP').focus();
        }
    }); 
    $('#TGLRESEP').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#ADDBARANG').click();
        }
    }); 
    $('#HJUAL').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        var x = $(this).val();
        if(x==""){
            $('#HJUAL').val("0");
        }
        if(event==13){
            $('#JMLJUAL').focus();
        }
    }); 
    $('#JMLJUAL').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        var x = $(this).val();

        if(x==""){
            var a = 0;
            $('#JMLJUAL').val('0');
        }else{
            var a = $('#JMLJUAL').val().replace('.','').replace('.','').replace('.','').replace(',','.');
        }
        var b = $('#HJUAL').val().replace('.','').replace('.','').replace('.','').replace(',','.');
        var c = $('#DISKON').val().replace('.','').replace('.','').replace('.','').replace(',','.');

        var d = (parseFloat(a) * parseFloat(b)) - parseFloat(c);
        $('#SUBTOTAL').val(uangdes(d));
        
        if(event==13){
            $('#DISKON').focus();
        }
    });
    $('#DISKON').focus(function(){
        $(this).val('');
        $('#P_DISKON').val('0,00');
        
        var a = $('#JMLJUAL').val().replace('.','').replace('.','').replace('.','');
        var b = $('#HJUAL').val().replace('.','').replace('.','').replace('.','').replace(',','.');
        var d = parseFloat(a) * parseFloat(b);
        
        $('#SUBTOTAL').val(uangdes(d));        
    }); 
    $('#DISKON').blur(function(){
        var x = $(this).val();
        if(x==""){
            $('#DISKON').val("0,00");
        }
    });
    $('#DISKON').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        var x = $(this).val();
        var a = $('#JMLJUAL').val().replace('.','').replace('.','').replace('.','');
        var b = $('#HJUAL').val().replace('.','').replace('.','').replace('.','').replace(',','.');

        if(x==""){
            var c = 0;
        }else{
            var c = $('#DISKON').val().replace('.','').replace('.','').replace('.','').replace(',','.');
        }
        var d = (parseFloat(a) * parseFloat(b)) - parseFloat(c);
        $('#SUBTOTAL').val(uangdes(d));
        if(event==13){
            $('#PAKAI').focus();
        }
    }); 
    
    $('#P_DISKON').focus(function(){
        $(this).val('');
        $('#DISKON').val('0,00');

        var a = $('#JMLJUAL').val().replace('.','').replace('.','').replace('.','');
        var b = $('#HJUAL').val().replace('.','').replace('.','').replace('.','').replace(',','.');
        var d = parseFloat(a) * parseFloat(b);
        
        $('#SUBTOTAL').val(uangdes(d));        
    }); 
    $('#P_DISKON').blur(function(){
        var x = $(this).val();
        if(x==""){
            $('#P_DISKON').val("0,00");
        }
    });
    $('#P_DISKON').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        var x = $(this).val();

        var a = $('#JMLJUAL').val().replace('.','').replace('.','').replace('.','');
        var b = $('#HJUAL').val().replace('.','').replace('.','').replace('.','').replace(',','.');

        if(x==""){
            var c = 0;
            $('#DISKON').val(uangdes(c));
        }else{
            var y = $('#P_DISKON').val().replace('.','').replace('.','').replace('.','').replace(',','.');
            var c = (parseFloat(a) * parseFloat(b) * parseFloat(y) / 100);
            $('#DISKON').val(uangdes(c));
        }

        var d = (parseFloat(a) * parseFloat(b)) - parseFloat(c);
        $('#SUBTOTAL').val(uangdes(d));
        if(event==13){
            $('#PAKAI').focus();
        }
    }); 
        
    $('#PAKAI').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        var x = $(this).val();
        if(x==""){
            $('#PAKAI').val("0");
        }
    });     
    $("#SimpanTemp").click(function(){
        var a = $('#KDBRG').val();
        var b = $('#JSTOK').val().replace('.','').replace('.','').replace('.','');
        var c = $('#HJUAL').val();
        var d = $('#JMLJUAL').val().replace('.','').replace('.','').replace('.','');
        var e = $('#PAKAI').val();
        var f = $('#NOMR').val();
        
        if(f==""){
            alert("Maaf !\nPasien belum di pilih");
            $('#SEARCH_PASIEN').click();
        }else if(a==""){
            alert("Nama obat / alat kesehatan masih kosong");
            $('#KDBRG').focus();
        }else if(b=="" || b=="0"){
            alert("Jumlah stok masih kosong");
            $('#JSTOK').focus();
        }else if(c=="" || c=="0"){
            alert("Harga Jual masih kosong");
            $('#HJUAL').focus();
        }else if(d=="" || d=="0"){
            alert("Jumlah jual masih kosong");
            $('#JMLJUAL').focus();
        }else if(parseFloat(d) > parseFloat(b)){
            alert("Jumlah jual tidak boleh lebih banyak dari stok");
            $('#JMLJUAL').focus();
        }else if(e=="" || e=="0"){
            alert("Hari Pemakaian Obat masih kosong");
            $('#PAKAI').focus();
        }else{  
            $.ajax({
                url         : "<?php echo base_url().'data_penjualan/cekPOB' ?>",
                type        : "POST",
                data        : {KDBRG:a,NOMR:f},
                dataType    : "JSON",
                success     : function(q){
                    if(q.code){
                        var x = confirm("Obat ini telah pernah diberikan pada tanggal faktur " + q.data.TGLFAKTUR + "\n" + "dengan tanggal resep " + q.data.TGLRESEP + "\nApakah anda yakin akan tetap menambahkan obat ini?");
                    }else{
                        x = true;
                    }
                    
                    if(x){
                        $.ajax({
                            url         : "<?php echo base_url().'data_penjualan/simpanTemp' ?>",
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
                            error       : function(jqXHR, ajaxOption, thrownError){
                                alert('Response : ' + thrownError);
                            }
                        }); 
                    }
                },
                error       : function(xhr, ajaxOption, thrownError){
                    alert('Response : ' + thrownError);
                }
            }); 
        }
    }); 
    $('#simpan').click(function(){
        var a = $('#NOMR').val();
        var b = $('#KDLOKASI').val();
        var c = $('#KDRUANGAN').val();
        var d = $('#KDDOKTER').val();
        if(a==""){
            alert("Data pasien tidak boleh kosong");
            $('#NOMR').focus();
        }else if(b==""){
            alert("Lokasi stok obat belum di pilih");
        }else if(c==""){
            alert("Poliklinik atau ruangan belum di pilih");
        }else if(d==""){
            alert("Dokter belum di pilih");
        }else{
            $.ajax({
                url         : "<?php echo base_url().'data_penjualan/simpan' ?>",
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
    $('#JSTOK').val('0');
    $('#HJUAL').val('0');
    $('#JMLJUAL').val('0');
    $('#P_DISKON').val('0,00');
    $('#DISKON').val('0,00');
    $('#SUBTOTAL').val('0,00');
    $('#PAKAI').val("0");
    $('#setAturanPakai').html("Set Aturan Pakai");
    $('#SUBTOTAL').val("0");
    $('#KRONIS').prop("checked",false);
}
function cariNoMR(){
    var a = $('#xNoMR').val();
    $.ajax({
        url         : "<?php echo base_url().'data_penjualan/getPasien' ?>",
        type        : "POST",
        data        : {NOMR:a},
        beforeSend  : function(){
            $('#getDataPasienCari').html("<tr><td colspan=6>Loading ...</td></tr>");
        },
        success : function(data){
            $('#getDataPasienCari').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            alert(errorThrown);
        }
    });
}
function cariNamaPasien(){
    var a = $('#xNMPASIEN').val();
    $.ajax({
        url         : "<?php echo base_url().'data_penjualan/getPasien' ?>",
        type        : "POST",
        data        : {NMPASIEN:a},
        beforeSend  : function(){
            $('#getDataPasienCari').html("<tr><td colspan=6>Loading ...</td></tr>");
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
    var b = $('#KDLOKASI').val();
    $.ajax({
        url         : "<?php echo base_url().'data_penjualan/getObat' ?>",
        type        : "POST",
        data        : {KDBRG:a,KDLOKASI:b},
        beforeSend  : function(){
            $('#getDataObatCari').html("<tr><td colspan=6>Loading ...</td></tr>");
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
    var b = $('#KDLOKASI').val();
    $.ajax({
        url         : "<?php echo base_url().'data_penjualan/getObat' ?>",
        type        : "POST",
        data        : {NMBRG:a,KDLOKASI:b},
        beforeSend  : function(){
            $('#getDataObatCari').html("<tr><td colspan=6>Loading ...</td></tr>");
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
    $('#JSTOK').val(uangdes(urldecode(c)));
    $('#HJUAL').val(uangdes(urldecode(d)));
    $('#JMLJUAL').val("0");
    $('#P_DISKON').val("0,00");
    $('#DISKON').val("0,00");
    $('#SUBTOTAL').val("0,00");
    $('#PAKAI').val("0");
    $('#setAturanPakai').html("Set Aturan Pakai");
    $('#KRONIS').prop("checked",false);
    $('#dialog').modal('hide');
    $('#JMLJUAL').focus();
}
function setPasien(a,b,c){
    $('#NOMR').val(urldecode(a));
    $('#NMPASIEN').val(urldecode(b));
    $('#ALMTPASIEN').val(urldecode(c));
    $('#dialogPasien').modal('hide');
}
function setTemp(a,b,c,d,e,f,g,h,i){
    $('#KDBRG').val(a);
    $('#NMBRG').val(urldecode(b));
    $('#HJUAL').val(uangdes(urldecode(c)));
    $('#JMLJUAL').val(curencyFormat(urldecode(d)));
    $('#P_DISKON').val("0,00");
    $('#DISKON').val(uangdes(urldecode(e)));
    $('#SUBTOTAL').val(uangdes(urldecode(f)));
    $('#PAKAI').val(curencyFormat(urldecode(g)));
    if(urldecode(h)==""){
        $('#setAturanPakai').html("Set Aturan Pakai");
    }else{
        $('#setAturanPakai').html(urldecode(i));
    }
    if(urldecode(i)=="0"){
        $('#KRONIS').prop("checked",false);
    }else{
        $('#KRONIS').prop("checked",true);
    }
    $('#JMLJUAL').focus();
}
function getTemp(){
    $.ajax({
        url : "<?php echo base_url().'data_penjualan/getTemp' ?>",
        beforeSend  : function(){
            $('#getTemp').html('');
        },
        success : function(data){
            $('#getTemp').html(data);
        },
        error : function(xhr, ajaxOption, thrownError){
            alert('Response : ' + thrownError);
        }
    });
    $.ajax({
        url     : "<?php echo base_url().'data_penjualan/getTotalTemp' ?>",
        dataType:"JSON",
        success : function(data){
            $('#TOTAL').val(uangdes(data.TOTAL));                
            $('#nilaiR').val(uangdes(data.TOTAL_R));                
            $('#GRANDTOT').val(uangdes(data.GRANDTOTAL));
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
            url : "<?php echo base_url().'data_penjualan/hapusTemp' ?>",
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
    }else{
        return false;            
    }              
}

function setAP(){
    var GR = $('input[type=radio]:checked').val();
	var setAP = "";
		
    var SAP = ['Tablet','Bungkus','Sendok Obat'];
    var WAP = ['Sebelum Makan','Sesudah Makan','Sewaktu Makan'];
    var WAP2 = ['Pagi','Siang','Malam','Tiap 8 jam','Tiap 12 jam','Tiap 24 jam'];
    var KAP = ['Dihabiskan','Bila mual atau muntah','Bila mencret','Bila demam','Bila sakit','Bila sesak','Bila batuk'];
    
    var a = $('#jmlHari').val();
    var b = $('#jmlSatuanAP').val();
    var c = $('#satuanAP').val();
    var d = $('#waktu1').val();
    var e = $('#waktu2').val();
    var f = $('#waktu3').val();
	
    var g = $('#keterangan').val();
    
	if(GR == "1"){
		setAP = GR+','+a+' x Sehari,'+b+' '+SAP[c-1]+','+d+' Jam '+WAP[e-1]+','+WAP2[f-1]+','+KAP[g-1];
	}else if(GR == "2"){
		setAP = GR+','+a+' x Sehari,Dioleskan tipis-tipis pada bagian yang sakit';
	}else if(GR == "3"){
		setAP = GR+',OBAT INJEKSI';
	}
    
    $('#setAturanPakai').html(setAP);
    $('#setAP').val(setAP);
    $('#dialogAP').modal('hide');
}
$(document).ready(function(){
	$('#satuanAP').prop('selectedIndex',0);
	$('#waktu2').prop('selectedIndex',0);
	$('#waktu3').prop('selectedIndex',0);
	$('#keterangan').prop('selectedIndex',0);
	
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
</script>
