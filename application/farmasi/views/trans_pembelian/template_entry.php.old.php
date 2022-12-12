<style>
    em{font-size: 10px}
    .input-group-addon{border: none;}
    .rightAlign{text-align: right;}
    .centerAlign{text-align: center;}
    .conversi{border: 1px solid #d2d6de}
    .w10{width: 10px;}
    .w20{width: 20px;}
    .w30{width: 30px;}
    .w40{width: 40px;}
    .w50{width: 50px;}
    .w60{width: 60px;}
    .w70{width: 70px;}
    .w80{width: 80px;}
    .w90{width: 90px;}
    .w100{width: 100px;}
    .w110{width: 110px;}
    .w120{width: 120px;}
    .w130{width: 130px;}
    .w140{width: 140px;}
    .w150{width: 150px;}
    .w160{width: 160px;}
    .w170{width: 170px;}
    .w180{width: 180px;}
    .w190{width: 190px;}
    .w200{width: 200px;}
    .w210{width: 210px;}
    .w220{width: 220px;}
    .w230{width: 230px;}
    .w240{width: 240px;}
    .w250{width: 250px;}
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border"></div>
                <div class="box-body">

<form id="form1" role="form" onsubmit="return false">
    <table class="table table-striped">
        <tr>
            <td width="150px">PEMBAYARAN</td>
            <td width="250px">
                <select name="PEMBAYARAN" id="PEMBAYARAN" class="form-control">
                    <option value="CASH">CASH</option>
                    <option value="CREDIT">CREDIT</option>
                </select>
            </td>
            <td>&nbsp;</td>
            <td width="200px">JATUH TEMPO</td>
            <td width="250px">
                <input type="text" name="JTEMPO" id="JTEMPO" class="form-control tanggal"/>
            </td>
            <td>&nbsp;</td>
            <td width="150px">DISKON</td>
            <td width="300px">
                <input type="text" name="DISKON_GLOBAL" id="DISKON_GLOBAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"/>
            </td>
        </tr>
        <tr>
            <td>SUPPLIER</td>
            <td>
                <select name="KDSUPPLIER" id="KDSUPPLIER" class="form-control" style="width: 100%">
                    <option value=""></option>
                    <?php foreach($datsupplier->result_array() as $x): ?>
                        <option value="<?php echo $x['KDSUPPLIER'] ?>"><?php echo $x['NMSUPPLIER'] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>&nbsp;</td>
            <td>TOTAL FAKTUR</td>
            <td>
                <input readonly="" type="text" name="TOTFAKTUR" id="TOTFAKTUR" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"/>
            </td>
            <td>&nbsp;</td>
            <td>ONGKOS KIRIM</td>
            <td>
                <input type="text" name="ONGKIR" id="ONGKIR" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"/>
            </td>
        </tr>
        <tr>
            <td>NO FAKTUR</td>
            <td>
                <input type="text" name="NOFAKTUR" id="NOFAKTUR" class="form-control" />
            </td>
            <td>&nbsp;</td>
            <td>TOTAL DISKON PER ITEM</td>
            <td>
                <input readonly="" type="text" name="TOTDISKON_ITEM" id="TOTDISKON_ITEM" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"/>                                
            </td>
            <td>&nbsp;</td>
            <td>GRAND TOTAL</td>
            <td>
                <input readonly type="text" name="GRANDTOT" id="GRANDTOT" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"/>
            </td>
        </tr>
        <tr>
            <td>TGL FAKTUR</td>
            <td>
                <input type="text" name="TGLFAKTUR" id="TGLFAKTUR" class="form-control tanggal"/>
            </td>
            <td>&nbsp;</td>
            <td>JENIS</td>
            <td>
                <select name="JENIS_TRANS" id="JENIS_TRANS" class="form-control">
                    <option value="1">NON PPN</option>
                    <option value="2">PPN</option>
                </select>
            </td>
            <td>&nbsp;</td>
            <td>KETERANGAN</td>
            <td rowspan="2">
                <textarea class="form-control" name="KETBL" id="KETBL" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td>TGL TERIMA</td>
            <td>
                <input type="text" name="TGLTERIMA" id="TGLTERIMA" class="form-control tanggal" />
            </td>
            <td>&nbsp;</td>
            <td>TOTAL PPN</td>
            <td>
                <input readonly type="text" name="TOTPPN" id="TOTPPN" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"/>
            </td>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="7">
                <button type="button" id="kembali" class="btn btn-danger">
                    <i class="fa fa-external-link"></i> Kembali</button>                                                 
                <button type="button" id="simpan" class="btn btn-danger">
                    <i class="fa fa-floppy-o"></i> Simpan</button>   
            </td>
        </tr>
    </table>
</form> 
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">

<table class="table table-bordered table-striped">
    <thead>
        <form id="form2" action="#" method="post" onsubmit="return false">
            <tr>
                <th>&nbsp;</th>
                <th>
                    <span>Konversi</span>
                    <input type="text" name="KONVERSI" id="KONVERSI" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'"/>                                        
                </th>
                <th>
                    <span>Harga Beli </span>
                    <input type="text" name="HBELI_BOX" id="HBELI_BOX" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"/>                                        
                </th>
                <th>
                    <span>Jml Beli </span>
                    <input type="text" name="JMLBELI_BOX" id="JMLBELI_BOX" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'"/>                                        
                </th>
                <th>
                    <span>(%) Disc </span>
                    <input type="text" name="P_DISKON" id="P_DISKON" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"/>
                </th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <tr>
                <th>
                    <div class="input-group input-group-sm">
                        <input type="hidden" name="KDBRG" id="KDBRG"/>
                        <input readonly type="text" name="NMBRG" id="NMBRG" class="form-control"/>
                        <div class="input-group-btn">
                            <button class="btn btn-danger" type="button" id="ADDBARANG">
                                <i class="fa fa-search"></i></button>
                        </div>  
                    </div>  
                </th>
                <th>
                    <div class="input-group input-group-sm">
                        <input type="text" name="EXPDATE" id="EXPDATE" class="form-control tanggal" />
                    </div>  
                </th>
                <th>
                    <div class="input-group input-group-sm">
                        <input readonly type="text" name="HBELI" id="HBELI" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"/>
                    </div>  
                </th>
                <th>
                    <div class="input-group input-group-sm">
                        <input readonly type="text" name="JMLBELI" id="JMLBELI" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'"/>
                    </div>  
                </th>
                <th>
                    <div class="input-group input-group-sm">
                        <input type="text" name="HDISKON" id="HDISKON" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"/>
                    </div>  
                </th>
                <th>
                    <div class="input-group input-group-sm">
                        <input readonly type="text" name="SUBTOTAL" id="SUBTOTAL" class="form-control inputmask rightAlign" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"/>
                    </div>  
                </th>
                <th>
                    <div class="input-group input-group-sm">
                        <button id="simpanTemp" type="button" class="btn btn-danger">
                            <i class="fa fa-add"></i> Tambah</button>
                    </div>
                </th>
            </tr>
        </form>
        <tr>
            <th>Nama Obat / Alkes</th>
            <th width="110px">Tgl Expire</th>
            <th width="140px">Harga Beli Item</th>
            <th width="80px">Jml Item</th>
            <th width="110px">Diskon</th>
            <th width="140px">Sub Total</th>
            <th width="80px">#</th>
        </tr>
    </thead>
    
    <tbody id="getTemp"></tbody>
</table>



                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="formModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cari Obat / Alat Kesehatan</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row-fluid" style="margin-top: -10px">
                        <div class="span12">
                            <form id="form1" method="get" class="form-horizontal" onsubmit="return false">
                                <div class="control-group">
                                    <label class="control-label">Pencarian Data Obat / Alat Kesehatan</label>
<div class="input-group input-group-sm">
    <input type="text" name="keywordCariObat" id="keywordCariObat" class="form-control"/>
    <div class="input-group-btn">
        <button class="btn btn-danger" type="button" id="btnKeywordCariObat">
            <i class="fa fa-search"></i> Cari Kode / Nama Obat</button>
    </div>  
</div> 
                                </div>
                            </form>
                            <hr/>
                            <div style="border-style: double;height: 250px;padding: 2px;overflow: scroll;">
                                <table class="table table-bordered table-striped" style="font-size: 1.2em">
                                    <thead>
                                        <tr>
                                            <th width="80px">Kode</th>
                                            <th>Nama Obat / Alkes</th>
                                            <th>Satuan</th>
                                            <th>Kategori</th>
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

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
    $(".inputmask").inputmask();
    $('input,textarea').focus(function(){return $(this).select();});
    $('#KDSUPPLIER').select2({placeholder:"Pilih Supplier"});
    $('.tanggal').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
    $('.tanggal').datepicker({
        autoclose : true,
        format    : "dd/mm/yyyy"
    });   
    $('#kembali').click(function(){
        var a = "<?php echo $kLok ?>";
        window.location.href = "<?php echo base_url().'farmasi.php/trans_pembelian/goForm?kLok=' ?>"+a;
    });      

    function kosongkanObjEntry(){
        $('#PEMBAYARAN').prop("selectedIndex",0);
        $('#KDSUPPLIER').val('').trigger('change');
        $('#KDLOKASI').val('').trigger('change');
        $('#JENIS_TRANS').prop("selectedIndex",0);
        $('#NOFAKTUR').val('');
        $('#TGLFAKTUR').val('');
        $('#TGLTERIMA').val('');
        $('#JTEMPO').val('');
        $('#TOTFAKTUR').val('0');
        $('#TOTDISKON_ITEM').val('0');
        $('#DISKON_GLOBAL').val('0');
        $('#TOTPPN').val('0');
        $('#ONGKIR').val('0');
        $('#GRANDTOT').val('0');
        $('#KETBL').val('');
    }
    function kosongkanObjTemp(){
        $('#KDBRG').val('');
        $('#NMBRG').val('');
        $('#EXPDATE').val('');
        $('#HBELI').val('0');
        $('#JMLBELI').val('0');
        $('#HBELI_BOX').val('0');
        $('#JMLBELI_BOX').val('0');
        $('#KONVERSI').val('0');
        $('#HDISKON').val('0');
        $('#P_DISKON').val('0');
        $('#SUBTOTAL').val('0');
    }
    kosongkanObjEntry();
    kosongkanObjTemp();
    getTemp();
    emptyTemp();

    $('#NOFAKTUR').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#TGLFAKTUR').focus();
        }
    });
    $('#TGLFAKTUR').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#TGLTERIMA').focus();
        }
    });
    $('#TGLTERIMA').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#JTEMPO').focus();
        }
    });
    $('#JTEMPO').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#JENIS_TRANS').focus();
        }
    });
    $('#DISKON_GLOBAL').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#ONGKIR').focus();
        }
    });
    $('#ONGKIR').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#KETBL').focus();
        }
    });

    $('#EXPDATE').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#KONVERSI').focus();
        }
    });
    $('#KONVERSI').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#HBELI_BOX').focus();
        }
    });
    $('#HBELI_BOX').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#JMLBELI_BOX').focus();
        }
    });
    $('#JMLBELI_BOX').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#P_DISKON').focus();
        }
    });
    $('#P_DISKON').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#HDISKON').focus();
        }
    });
    $('#HDISKON').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#simpanTemp').click();
        }
    });

    $('#ADDBARANG').click(function(){
        kosongkanObjTemp();
        $('#keywordCariObat').val("");
        $('#getDataObatCari').html("<tr><td colspan=5>Klik atau Enter Pada textbox pencarian untuk menampilkan data</td></tr>");
        $("#formModal").modal("show");            
    });

    function calcSummaryMain(){
        var x = $('#JENIS_TRANS').val();
        var a = $('#TOTFAKTUR').val().replace(',','').replace(',','').replace(',','');
        var b = $('#TOTDISKON_ITEM').val().replace(',','').replace(',','').replace(',','');
        var c = $('#DISKON_GLOBAL').val().replace(',','').replace(',','').replace(',','');
        var d = $('#ONGKIR').val().replace(',','').replace(',','').replace(',','');
        
            a = (a=='' || isNaN(a)) ? 0 : a;
            b = (b=='' || isNaN(b)) ? 0 : b;
            c = (c=='' || isNaN(c)) ? 0 : c;
            d = (d=='' || isNaN(d)) ? 0 : d;
        var e = parseFloat(a) - parseFloat(b) - parseFloat(c);
            e = (e=='' || isNaN(e)) ? 0 : e;
        
        if(x=='1'){
            var f = 0;
            var g = parseFloat(d) + parseFloat(e) ;
        }else{
            var f = parseFloat(e) * 10 /100;
            var g = parseFloat(d) + parseFloat(e) + parseFloat(f);
        }
        f = (f=='' || isNaN(f)) ? 0 : f;
        g = (g=='' || isNaN(g)) ? 0 : g;

        $('#TOTPPN').val(f);
        $('#GRANDTOT').val(g);
    }
    $('#JENIS_TRANS').change(function(){
        calcSummaryMain()
    });
    $('#DISKON_GLOBAL').keypress(function(ev){
        calcSummaryMain();
    });
    $('#DISKON_GLOBAL').keydown(function(ev){
        calcSummaryMain();
    });
    $('#ONGKIR').keypress(function(ev){
        calcSummaryMain();
    });
    $('#DISKON_GLOBAL').keydown(function(ev){
        calcSummaryMain();
    });

    $('#btnKeywordCariObat').click(function(){
        var a = $('#keywordCariObat').val();
        $.ajax({
            url         : "<?php echo base_url().'farmasi.php/trans_pembelian/getObat' ?>",
            type        : "POST",
            data        : {keyword:a},
            beforeSend  : function(){
                $('tbody#getDataObatCari').html("<tr><td colspan=8><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success     : function(data){
                $('tbody#getDataObatCari').html(data);
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                $('tbody#getDataObatCari').html('<tr><td colspan=8>Data tidak ditemukan</td></tr>');
                console.log(errorThrown);
            }
        });
    });
    
    $('#keywordCariObat').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            var a = $('#keywordCariObat').val();
            $.ajax({
                url         : "<?php echo base_url().'farmasi.php/trans_pembelian/getObat' ?>",
                type        : "POST",
                data        : {keyword:a},
                beforeSend  : function(){
                    $('tbody#getDataObatCari').html("<tr><td colspan=8><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success     : function(data){
                    $('tbody#getDataObatCari').html(data);
                },
                error       : function(jqXHR,ajaxOption,errorThrown){
                    $('tbody#getDataObatCari').html('<tr><td colspan=8>Data tidak ditemukan</td></tr>');
                    console.log(errorThrown);
                }
            });
        }
    });
    
    function calcSummaryItem(){
        var a = $('#KONVERSI').val().replace(',','').replace(',','').replace(',','');
        var b = $('#HBELI_BOX').val().replace(',','').replace(',','').replace(',','');
        var c = $('#JMLBELI_BOX').val().replace(',','').replace(',','').replace(',','');
        a = (a=='' || isNaN(a)) ? 0 : a;
        b = (b=='' || isNaN(b)) ? 0 : b;
        c = (c=='' || isNaN(c)) ? 0 : c;

        var hargaBeliItem = parseFloat(b) / parseFloat(a);
        hargaBeliItem = (hargaBeliItem=='' || isNaN(hargaBeliItem)) ? 0 : hargaBeliItem;   
        $('#HBELI').val(hargaBeliItem);

        var jmlBeliItem = parseFloat(a) * parseFloat(c);
        jmlBeliItem = (jmlBeliItem=='' || isNaN(jmlBeliItem)) ? 0 : jmlBeliItem;  
        $('#JMLBELI').val(jmlBeliItem);

        var d = $('#P_DISKON').val().replace(',','').replace(',','').replace(',','');
        var e = $('#HBELI').val().replace(',','').replace(',','').replace(',','');
        var f = $('#JMLBELI').val().replace(',','').replace(',','').replace(',','');
        d = (d=='' || isNaN(d)) ? 0 : d;
        e = (e=='' || isNaN(e)) ? 0 : e;
        f = (f=='' || isNaN(f)) ? 0 : f;

        if (d==0) {
            var g = $('#HDISKON').val().replace(',','').replace(',','').replace(',','');
        }else{
            var nilaiDiskon = parseFloat(d) * parseFloat(e) * parseFloat(f) / 100;
            nilaiDiskon = (nilaiDiskon=='' || isNaN(nilaiDiskon)) ? 0 : nilaiDiskon;        
            $('#HDISKON').val(nilaiDiskon);
            var g = $('#HDISKON').val().replace(',','').replace(',','').replace(',','');
        }
        g = (g=='' || isNaN(g)) ? 0 : g;
        var subtotal = (parseFloat(e) * parseFloat(f)) - parseFloat(g);
        subtotal = (subtotal=='' || isNaN(subtotal)) ? 0 : subtotal;        
        $('#SUBTOTAL').val(subtotal);
    }

    $('#KONVERSI').keypress(function(ev){
        calcSummaryItem();
    });
    $('#KONVERSI').keydown(function(ev){
        calcSummaryItem();
    });
    $('#HBELI_BOX').keypress(function(ev){
        calcSummaryItem();
    });
    $('#HBELI_BOX').keydown(function(ev){
        calcSummaryItem();
    });
    $('#JMLBELI_BOX').keypress(function(ev){
        calcSummaryItem();
    });
    $('#JMLBELI_BOX').keydown(function(ev){
        calcSummaryItem();
    });
    $('#P_DISKON').keypress(function(ev){
        calcSummaryItem();
    });
    $('#P_DISKON').keydown(function(ev){
        calcSummaryItem();
    });
    $('#HDISKON').keypress(function(ev){
        calcSummaryItem();
    });
    $('#HDISKON').keydown(function(ev){
        calcSummaryItem();
    });

    $("#simpanTemp").click(function(){
        var formItems = {};
            formItems['KDBRG'] = $('#KDBRG').val();
            formItems['NMBRG'] = $('#NMBRG').val();
            formItems['EXPDATE'] = $('#EXPDATE').val();
            formItems['HBELI'] = $('#HBELI').val();
            formItems['JMLBELI'] = $('#JMLBELI').val();
            formItems['HDISKON'] = $('#HDISKON').val();
            formItems['SUBTOTAL'] = $('#SUBTOTAL').val();

        if(formItems['KDBRG']==""){
            $('#ADDBARANG').click();
        }else if(formItems['EXPDATE']==""){
            alert("Tanggal expire masih kosong");
            $('#EXPDATE').focus();
        }else if(formItems['HBELI']=="" || formItems['HBELI']=="0"){
            alert("Harga beli masih kosong");
            $('#HBELI').focus();
        }else if(formItems['JMLBELI']=="" || formItems['JMLBELI']=="0"){
            alert("Jumlah obat masuk masih kosong");
            $('#JMLBELI').focus();
        }else if(formItems['SUBTOTAL']=="" || formItems['SUBTOTAL']=="0"){
            alert("Sub Total masih kosong");
        }else{  
            $.ajax({
                url         : "<?php echo base_url().'farmasi.php/trans_pembelian/simpanTemp' ?>",
                type        : "POST",
                data        : formItems,
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
                    console.log('Response : ' + thrownError);
                }
            }); 
        }
    }); 

    $('#simpan').click(function(){
        var formdata = {}
            formdata['PEMBAYARAN'] = $('#PEMBAYARAN').val();
            formdata['KDSUPPLIER'] = $('#KDSUPPLIER').val();
            formdata['NMSUPPLIER'] = $('#KDSUPPLIER :selected').html();
            formdata['NOFAKTUR'] = $('#NOFAKTUR').val();
            formdata['TGLFAKTUR'] = $('#TGLFAKTUR').val();
            formdata['TGLTERIMA'] = $('#TGLTERIMA').val();
            formdata['JTEMPO'] = $('#JTEMPO').val();
            formdata['KDLOKASI'] = "<?php echo $kLok; ?>";
            formdata['NMLOKASI'] = "<?php echo getLokasiById($kLok); ?>";
            formdata['JENIS_TRANS'] = $('#JENIS_TRANS').val();
            formdata['TOTFAKTUR'] = ($('#TOTFAKTUR').val()=="") ? "0" : $('#TOTFAKTUR').val();
            formdata['TOTDISKON_ITEM'] = ($('#TOTDISKON_ITEM').val()=="") ? "0" : $('#TOTDISKON_ITEM').val();
            formdata['DISKON_GLOBAL'] = ($('#DISKON_GLOBAL').val()=="") ? "0" : $('#DISKON_GLOBAL').val();
            formdata['TOTPPN'] = ($('#TOTPPN').val()=="") ? "0" : $('#TOTPPN').val();
            formdata['ONGKIR'] = ($('#ONGKIR').val()=="") ? "0" : $('#ONGKIR').val();
            formdata['GRANDTOT'] = ($('#GRANDTOT').val()=="") ? "0" : $('#GRANDTOT').val();
            formdata['KETBL'] = $('#KETBL').val();
        
        if(formdata['KDSUPPLIER']==""){
            alert("Supplier harus dipilih");
            $('#KDSUPPLIER').focus();
        }else if(formdata['NOFAKTUR']==""){
            alert("No Faktur tidak boleh kosong");
            $('#NOFAKTUR').focus();
        }else if(formdata['TGLFAKTUR']==""){
            alert("Tanggal Faktur tidak boleh kosong");
            $('#TGLFAKTUR').focus();
        }else if(formdata['TGLTERIMA']==""){
            alert("Tanggal Terima Faktur tidak boleh kosong");
            $('#TGLTERIMA').focus();
        }else if(formdata['JTEMPO']==""){
            alert("Jatuh Tempo tidak boleh kosong");
            $('#JTEMPO').focus();
        }else if(formdata['KDLOKASI']==""){
            alert("Lokasi barang tidak ditemukan. Silahkan refresh browser anda.");
        }else{
            $.ajax({
                url         : "<?php echo base_url().'farmasi.php/trans_pembelian/simpan' ?>",
                type        : "POST",
                data        : formdata,
                dataType    : "JSON",
                success     : function(data){
                    alert(data.message);
                    if(data.code==200){
                        kosongkanObjEntry();
                        kosongkanObjTemp();
                        getTemp();
                    }
                },
                error       : function(jqXHR,ajaxOption,errorThrown){
                    console.log(jqXHR.responseText);
                }
            });
        }
    });
});

function getTemp(){
    $.ajax({
        url : "<?php echo base_url().'farmasi.php/trans_pembelian/getTemp' ?>",
        beforeSend  : function(){
            $('tbody#getTemp').html("<tr><td colspan=8><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('tbody#getTemp').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            $('tbody#getTemp').html('<tr><td colspan=8>Data tidak ditemukan</td></tr>');
            console.log(jqXHR,responseText);
        }
    });
    
    $.ajax({
        url     : "<?php echo base_url().'farmasi.php/trans_pembelian/getTotalTemp' ?>",
        dataType:"JSON",
        success : function(data){
            var a = $('#ONGKIR').val().replace('.','').replace('.','').replace('.','').replace(',','.');
            var b = $('#DISKON_GLOBAL').val().replace('.','').replace('.','').replace('.','').replace(',','.');
            var x = $('#JENIS_TRANS').val();

            a = (a=='' || isNaN(a)) ? 0 : a;
            b = (b=='' || isNaN(b)) ? 0 : b;

            $('#TOTFAKTUR').val(data.TOTFAKTUR);
            $('#TOTDISKON_ITEM').val(data.TOTDISKON_ITEM);

            if(x == '1'){
                var p = 0;
            }else{
                var p = (parseFloat(data.TOTFAKTUR) - parseFloat(data.TOTDISKON_ITEM) - parseFloat(b)) * 10 / 100;
            }

            $('#TOTPPN').val(p);
            
            if(a == 0 || a == ""){
                $('#GRANDTOT').val(parseFloat(data.TOTFAKTUR_NETTO) + parseFloat(p));
            }else{
                $('#GRANDTOT').val(parseFloat(a) + parseFloat(data.TOTFAKTUR_NETTO) + parseFloat(p));
            }                
        },
        error : function(xhr, ajaxOption, thrownError){
            console.log('Response : ' + thrownError);
        }
    });
}
function emptyTemp(){
    $.ajax({
        url     : "<?php echo base_url().'farmasi.php/trans_pembelian/emptyTemp' ?>",
        success : function(data){
            getTemp(); 
        },
        error : function(xhr, ajaxOption, thrownError){
            console.log('Response : ' + thrownError);
        }
    });                     
}
function pilihObat(a,b){
    $('#KDBRG').val(a);
    $('#NMBRG').val(urldecode(b));
    $('#EXPDATE').val("");
    $('#HBELI').val("0");
    $('#JMLBELI').val("0");
    $('#HDISKON').val("0");
    $('#P_DISKON').val("0");
    $('#SUBTOTAL').val("0");
    $('#formModal').modal('hide');
    $('#EXPDATE').focus();
}

function hapusTemp(a){
    var x = confirm("Apakah anda yakin akan menghapus data ini?");
    if(x){
        $.ajax({
            url     : "<?php echo base_url().'farmasi.php/trans_pembelian/hapusTemp' ?>",
            type    : "POST",
            data    : {IDX:a},
            dataType: "JSON",
            success : function(data){
                alert(data.message);
                getTemp();
            },
            error   : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);
            }
        });  
    }              
}

function urlencode(str) {
  str = (str + '').toString();
  return encodeURIComponent(str)
    .replace(/!/g, '%21')
    .replace(/'/g, '%27')
    .replace(/\(/g, '%28')
    .replace(/\)/g, '%29')
    .replace(/\*/g, '%2A')
    .replace(/%20/g, '+');
}
function urldecode(str) {
    return decodeURIComponent((str + '').replace(/%(?![\da-f]{2})/gi, function () {
          return '%25'
    }).replace(/\+/g, '%20'))
}
</script>