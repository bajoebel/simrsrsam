<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="<?php echo get_asset() ?>css/select2.css" />
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
        <h1>Retur Mutasi BHP/BMHP</h1>
    </div>
    
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="left span4">
                    <button type="button" onclick="location.href='<?php echo base_url() ?>retur_mutasi_bhp/tambah'" class="btn">
                        <i class="icon-plus"></i> Tambah Data</button>
                    <button type="button" id="refresh" class="btn">
                        <i class="icon-refresh"></i> Refresh</button>
                </div>
                <div id="searchTable" class="right span8">
                    <input type="text" class="" placeholder="Enter Lokasi Obat/Tujuan Mutasi ..." name="keywordText" id="keywordText"/>
                    <button type="button" id="keywordButton" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> 
                        <h5>Retur Mutasi BHP/BMHP</h5>
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
                                    <th width="150px">Waktu Rekam</th>
                                    <th width="150px">Kode Retur</th>
                                    <th width="150px">Kode MT BHP</th>
                                    <th>Lokasi Obat</th>
                                    <th>Tujuan Mutasi</th>
                                    <th width="120px">#</th>
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

<script src="<?php echo get_asset() ?>js/jquery.min.js"></script> 
<script src="<?php echo get_asset() ?>js/jquery.ui.custom.js"></script> 
<script src="<?php echo get_asset() ?>js/bootstrap.min.js"></script> 
<script src="<?php echo get_asset() ?>js/select2.min.js"></script> 
<script src="<?php echo get_asset() ?>js/maruti.js"></script> 
<script src="<?php echo get_asset() ?>js/defira.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$('#keywordFilter').select2();
    $('#keywordFilter').val('').trigger('change');
    getTable();
    function getTable(){
        $.ajax({
            url     : "<?php echo base_url().'retur_mutasi_bhp/getView' ?>",
            beforeSend  : function(){
                $('tbody#getData').html("<tr><td colspan=6>Loading ... Please Wait</td></tr>");
            },
            success : function(data){
                $('tbody#getData').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                alert(errorThrown);
            }
        });            
    }

    $('#refresh').click(function(){
        $('#keywordFilter').val('').trigger('change');
        $('#keywordText').val("");
        window.location.reload();
    });
                
    $('#keywordFilter').change(function(){
        var a = $("#keywordFilter").val();
        var b = $("#keywordText").val();
        $.ajax({
            url : "<?php echo base_url().'retur_mutasi_bhp/getView' ?>",
            type : "POST",
            data : {sFilter:a,sLike:b},
            beforeSend  : function(){
                $('tbody#getData').html("<tr><td colspan=6>Loading ... Please Wait</td></tr>");
            },
            success : function(data){
                $('tbody#getData').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
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
        $.ajax({
            url : "<?php echo base_url().'retur_mutasi_bhp/getView' ?>",
            type : "POST",
            data : {sFilter:a,sLike:b},
            beforeSend  : function(){
                $('tbody#getData').html("<tr><td colspan=6>Loading ... Please Wait</td></tr>");
            },
            success : function(data){
                $('tbody#getData').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                alert(errorThrown);
            }
        });            
    });
});

function cetak(a){
    window.location.href = '<?php echo base_url().'retur_mutasi_bhp/cetak?kode=' ?>'+a;
} 
</script>
