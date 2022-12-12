<style>
    div#pagination b{
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #337ab7;
        border-color: #337ab7;
    }
    div#pagination a{
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
        border-top-color: rgb(221, 221, 221);
        border-right-color: rgb(221, 221, 221);
        border-bottom-color: rgb(221, 221, 221);
        border-left-color: rgb(221, 221, 221);
    }
    .rataKanan{text-align: right;}
    .rataTengah{text-align: center;}
</style>       
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Informasi</h4>
        Data transaksi kwitansi pasien yang dibatalkan.
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="#" id="refresh" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                    </h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter No Kwitansi" style="width: 200px"/>
                            <div class="input-group-btn">
                                <button type="button" id="btnKeyword" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <tr>
                                    <th width="60px">#</th>
                                    <th width="100px">Kode Retur</th>
                                    <th width="120px">Tgl.Retur</th>
                                    <th width="100px">No.Kwitansi</th>
                                    <th>Alasan</th>
                                </tr>
                            </tr>    
                        </thead>
                        <tbody id="getdata"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
    getTable();
    $('input').focus(function(){return $(this).select();});
    $('#refresh').click(function(){
        $('#keyword').val("");
        getTable();
    });
    $('#keyword').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#btnKeyword').click();
        }
    });
    $('#btnKeyword').click(function(){
        var a = $("#keyword").val();
        $.ajax({
            url         : "<?php echo base_url().'kasir.php/kwitansi_batal/getView' ?>",
            type        : "POST",
            data        : {sLike:a},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=5><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success     : function(data){
                $('tbody#getdata').html(data);
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                $('tbody#getdata').html("<tr><td colspan=5>Data tidak ditemukan</td></tr>");
                alert(errorThrown);
            }
        });            
    });
});

function getTable(){
    $.ajax({
        url         : "<?php echo base_url().'kasir.php/kwitansi_batal/getView' ?>",
        beforeSend  : function(){
            $('tbody#getdata').html("<tr><td colspan=5><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
        },
        success     : function(data){
            $('tbody#getdata').html(data);
        },
        error   : function(jqXHR,ajaxOption,errorThrown){
            $('tbody#getdata').html("<tr><td colspan=5>Data tidak ditemukan</td></tr>");
            alert(errorThrown);
        }
    });            
}  
</script>
