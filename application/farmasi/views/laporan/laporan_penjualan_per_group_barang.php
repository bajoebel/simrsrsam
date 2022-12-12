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
    </div>
    
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3">
                <div class="btn-icon-pg">
                    <?php echo $sub_menu; ?>
                </div>
            </div>
            <div class="span9">
                <h2>Laporan Penjualan Per Group Barang</h2>
                <form id="form1" action="#" method="post" onsubmit="return false">
                <table style="width: 700px;">
                    <tr>
                        <td>Group Barang</td>
                        <td> : </td>
                        <td>
                            <select name="KDGRBRG" id="KDGRBRG" style="width: 350px;">
                                <option value=""></option>
                                <?php foreach($datgroup_barang->result_array() as $x){ ?>
                                <option value="<?php echo $x['KDGRBRG'] ?>"><?php echo $x['NMGRBRG'] ?></option>
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
    $('#KDGRBRG').select2({placeholder:'Silahkan Pilih Group Barang'});
    function setInput(){
        $('#KDGRBRG').val('').trigger('change');
        $('#tglAwal').val('<?php echo date('d-m-Y'); ?>');
        $('#tglAkhir').val('<?php echo date('d-m-Y'); ?>');
    }
    setInput();

    $('#tglAwal').focus(function(){$(this).select()});
    $('#tglAwal').blur(function(){
        var x = $(this).val();
        if(x==""){
            $(this).val('<?php echo date('d-m-Y'); ?>');
        }
        if(x.length < 10){
            $(this).val('<?php echo date('d-m-Y'); ?>');
        }
    });
    $('#tglAwal').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#tglAkhir').focus();
        }
    });

    $('#tglAkhir').focus(function(){$(this).select()});
    $('#tglAkhir').blur(function(){
        var x = $(this).val();
        if(x==""){
            $(this).val('<?php echo date('d-m-Y'); ?>');
        }
        if(x.length < 10){
            $(this).val('<?php echo date('d-m-Y'); ?>');
        }
    });
    $('#tglAkhir').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#cetak').click();
        }
    });
    
    $('#cetak').click(function(){
        var a = $('#KDGRBRG').val();
        var b = $('#tglAwal').val();
        var c = $('#tglAkhir').val();
        openInNewTab("<?php echo base_url().'laporan_penjualan/cetak_5?kode=' ?>"+a+"&tAwal="+b+"&tAkhir="+c);
    });
    function openInNewTab(url) {
        var win = window.open(url, '_blank');
        win.focus();
    }
});

</script>

   