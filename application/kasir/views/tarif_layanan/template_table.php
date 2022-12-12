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
    .modal-content {
        max-height: 600px;
        overflow: scroll;
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Informasi</h4>
        Data Tarif Layanan
    </div>    
    
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="#" id="btnRefresh" class="btn btn-default">
                            <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                    </h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter Layanan / Group Tarif BPJS / Kelas Layanan" style="width: 350px"/>
                            <div class="input-group-btn">
                                <button type="button" id="btnKeyword" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th style="width: 60px">#</th>
                                <th>Layanan</th>
                                <th style="width: 120px">Jasa Sarana</th>
                                <th style="width: 120px">Jasa Prasarana</th>
                                <th style="width: 150px">Tarif Layanan</th>
                                <th>Group Tarif BPJS</th>
                                <th style="width: 120px">Kelas Layanan</th>
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
    $('input').focus(function(){
        return $(this).select();
    });
    $('#btnRefresh').click(function(){
        getTable();
    });
    $('#keyword').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            var a = $('#keyword').val();
            $.ajax({
                url         : "<?php echo base_url().'kasir.php/tarif_layanan/getView' ?>",
                type        : "POST",
                data        : {sLike:a},
                beforeSend  : function(){
                    $('tbody#getdata').html("<tr><td colspan=7><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('tbody#getdata').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    console.log(jqXHR.responseText);
                }
            });            
        }
    });
    $('#btnKeyword').click(function(){
        var a = $('#keyword').val();
        $.ajax({
            url         : "<?php echo base_url().'kasir.php/tarif_layanan/getView' ?>",
            type        : "POST",
            data        : {sLike:a},
            beforeSend  : function(){
                $('#getdata').html("<tr><td colspan=7><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success : function(data){
                $('#getdata').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);
            }
        });            
    });
    
});
function getTable(){
    $.ajax({
        url : "<?php echo base_url().'kasir.php/tarif_layanan/getView' ?>",
        beforeSend  : function(){
            $('tbody#getdata').html("<tr><td colspan=7><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('tbody#getdata').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);
        }
    });            
}

</script>
</body>
</html>