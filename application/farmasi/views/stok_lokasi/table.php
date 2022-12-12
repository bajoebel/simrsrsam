<link rel="stylesheet" href="<?php echo get_asset() ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo get_asset() ?>jquery/jquery-ui.css" />
<style>
.table td.centerObj {text-align: center;}
.table td.rightObj {text-align: right;}
.table td{font-size: 0.9em;}
.icon a{font-size: 0.9em;}
body .modal {width: 80%;/* respsonsive width */margin-left:-40%;/*width/2)*/}
.modal-dialog{overflow-y: initial !important}
.modal-body{max-height: calc(100vh - 250px);overflow-y: auto;}
.table th{font-size: 0.9em;}
div#pagination{float: right;}
div#pagination b{background: #000;color: #FFF;}
.left{float: left;}
.right{float: right;text-align: right;}
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
#searchTable button{
    background-color: #2e363f;
    border: 0 none;
    margin-left: -5px;
    margin-top: -11px;
    padding: 5px 10px;
}
#filter{margin-top: 5px;float: right;width: 100px;}
.select2-dropdown {z-index: 19001;}
.rataKanan{text-align: right;}
</style>
<div id="content">
    <div id="content-header">
        <?php echo get_breadcrumb() ?>  
        <h1>Data Stok Obat / Alkes Per Gudang Obat</h1>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="left span4">
                    <button type="button" id="refresh" class="btn"><i class="icon-retweet"></i> Refresh</button>
                </div>
                <div id="searchTable" class="right span8">
                    <div style="text-align: left;display: inline;">
                        <span>Lokasi Obat : </span>
                        <select name="KDLOKASI" id="KDLOKASI" style="width: 300px;">
                            <option value=""></option>
                            <?php foreach($datLokasi->result_array() as $x): ?>
                            <option value="<?php echo $x['KDLOKASI'] ?>"><?php echo $x['NMLOKASI'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div style="text-align: left;display: inline;">
                        <input type="text" class="" placeholder="Enter nama obat / alkes ..." name="keywordText" id="keywordText"/>
                        <button type="button" id="keywordButton" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> 
                        <h5>Data Stok Obat / Alkes</h5>
                        <div id="filter">
                            <select name="keywordFilter" id="keywordFilter">
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="30">30</option>
                                <option value="35">35</option>
                                <option value="40">40</option>
                                <option value="45">45</option>
                                <option value="50">50</option>
                            </select>                    
                        </div>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Nama Stok Obat / Alkes</th>
                                    <th width="50px">Kode</th>
                                    <th>Satuan</th>
                                    <th width="80px">Jumlah Stok</th>
                                    <th width="150px">Lokasi Obat</th>
                                </tr>
                            </thead>
                            <tbody id="getData"></tbody>
                        </table>
                    </div>
                </div>
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
	$('#keywordFilter').select2().val('10').trigger('change');
    getTable();
    function getTable(){
        $.ajax({
            url     : "<?php echo base_url().'stok_lokasi/getView' ?>",
            type    : "POST",
            beforeSend  : function(){
                $('tbody#getData').html("<tr><td colspan=6>Loading ... Please Wait</td></tr>");
            },
            success : function(data){
                $('tbody#getData').html(data);
            },
            error   : function(jqXHR,ajaxOption,errorThrown){
                alert(errorThrown);
            }
        });            
    }
    $('#KDLOKASI').change(function(){
        var a = $("#keywordFilter").val();
        var b = $("#keywordText").val();
        var c = $("#KDLOKASI").val();
        $.ajax({
            url         : "<?php echo base_url().'stok_lokasi/getView' ?>",
            type        : "POST",
            data        : {sFilter:a,sLike:b,KDLOKASI:c},
            beforeSend  : function(){
                $('tbody#getData').html("<tr><td colspan=6>Loading ... Please Wait</td></tr>");
            },
            success     : function(data){
                $('tbody#getData').html(data);
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);
            }
        });            
    }); 
    $('#refresh').click(function(){
        $('#keywordFilter').val('').trigger('change');
        $('#KDLOKASI').val('').trigger('change');
        $('#keywordText').val("");
        window.location.reload();
    });           
    $('#keywordFilter').change(function(){
        var a = $("#keywordFilter").val();
        var b = $("#keywordText").val();
        var c = $("#KDLOKASI").val();
        $.ajax({
            url         : "<?php echo base_url().'stok_lokasi/getView' ?>",
            type        : "POST",
            data        : {sFilter:a,sLike:b,KDLOKASI:c},
            beforeSend  : function(){
                $('tbody#getData').html("<tr><td colspan=6>Loading ... Please Wait</td></tr>");
            },
            success     : function(data){
                $('tbody#getData').html(data);
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);
            }
        });            
    });
    $('#keywordText').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#keywordButton').click();
        }
    });
    $('#keywordButton').click(function(){
        var a = $("#keywordFilter").val();
        var b = $("#keywordText").val();
        var c = $("#KDLOKASI").val();
        $.ajax({
            url         : "<?php echo base_url().'stok_lokasi/getView' ?>",
            type        : "POST",
            data        : {sFilter:a,sLike:b,KDLOKASI:c},
            beforeSend  : function(){
                $('tbody#getData').html("<tr><td colspan=6>Loading ... Please Wait</td></tr>");
            },
            success     : function(data){
                $('tbody#getData').html(data);
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                alert(jqXHR.responseText);
            }
        });            
    });
});
</script>
