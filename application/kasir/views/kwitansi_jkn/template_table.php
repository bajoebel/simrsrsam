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
        Data transaksi kwitansi pasien dengan jaminan layanan umum.
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="#" id="btnTambah" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                        <a href="#" id="refresh" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                    </h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" id="keywords" name="keywords" class="form-control pull-right" placeholder="Enter keywords" style="width: 200px"/>
                            <div class="input-group-btn">
                                <button type="button" id="btnKeyword" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <tr>
                                    <th width="60px">#</th>
                                    <th width="80px">Waktu Record</th>
                                    <th width="80px">No Inv</th>
                                    <th width="80px">No Reg RS</th>
                                    <th width="80px">No MR</th>
                                    <th>Nama Pasien</th>
                                    <th width="100px">Total Biaya</th>
                                    <th width="120px">Cara Bayar</th>
                                    <th style="width: 250px;text-align: center;">Action</th>
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

<div id="myModal" class="modal fade" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Retur Kwitansi</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row-fluid" style="margin-top: -10px">
                        <div class="span12">
                            <form action="#" method="get" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">No Kwitansi</label>
                                    <div class="controls">
    <input readonly="" type="text" name="sNoKwintansi" id="sNoKwintansi" class="form-control"/> 
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Alasan Retur</label>
                                    <div class="controls">
                        <textarea name="alasanRetur" id="alasanRetur" class="form-control"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="simpanRetur()">Retur Kwitansi</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="lampiranModal" class="modal fade" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cetak Lampiran Kwitansi</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row-fluid" style="margin-top: -10px">
                        <div class="span12">
                            <form action="#" method="get" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">No Kwitansi</label>
                                    <div class="box-tools">
                                        <div class="input-group">
<input readonly="" type="text" name="xNoKwintansi" id="xNoKwintansi" class="form-control" style="width: 200px"/> 
                                        </div>
                                    </div>

                                    <div class="controls">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">No MR / Nama Pasien</label>
                                    <div class="box-tools">
                                        <div class="input-group">
<input readonly="" type="text" name="xNoMR" id="xNoMR" class="form-control" style="width: 100px">
<input readonly="" type="text" name="xPsNama" id="xPsNama" class="form-control" style="width: 300px">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr/>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="30px">#</th>
                                        <th width="100px">No Nota</th>
                                        <th>Rawat Jalan / Rawat Inap / Penunjang / Lainnya</th>
                                        <th width="150px">Total Nota</th>
                                        <th width="50px">#</th>
                                    </tr>
                                </thead>
                                <tbody id="getdataLampiran"></tbody>
                            </table>
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
<script type="text/javascript">
$(document).ready(function () { 
    $('input,textarea').focus(function(){return $(this).select();});
    getTable();
    $('#btnTambah').click(function(){
        var url = '<?php echo base_url() ?>kasir.php/kwitansi_jkn/tambah';
        window.location.href = url;
    })
    $('#refresh').click(function(){
        $('#keywords').val("");
        getTable();
    });
    $('#keywords').keyup(function(ev){
        var event = ev.keyCode | ev.witch;
        if(event==13){
            $('#btnKeyword').click();
        }
    });
    $('#btnKeyword').click(function(){
        var a = $("#keywords").val();
        $.ajax({
            url         : "<?php echo base_url().'kasir.php/kwitansi_jkn/getView' ?>",
            type        : "POST",
            data        : {sLike:a},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success     : function(data){
                $('tbody#getdata').html(data);
                $('tr.resultDat').each(function(){
                    var a = $(this).data('id');
                    console.log(a);
                    $.ajax({
                        url         : "<?php echo base_url().'kasir.php/kwitansi_jkn/cekRetur' ?>",
                        type        : "POST",
                        data        : {no_kwitansi:a},
                        dataType    : "JSON",
                        success     : function(data){
                            if (data.code==200){
                                $('button#'+a).parent().append('<br/>Transaksi di Retur');
                                $('button#'+a).remove();
                            }
                        },
                        error       : function(jqXHR,ajaxOption,errorThrown){
                            console.log(jqXHR.responseText);
                        }
                    });
                });
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                $('tbody#getdata').html("<tr><td colspan=9>Data tidak ditemukan</td></tr>");
                console.log(jqXHR.responseText);
            }
        });            
    });
});

function getTable(){
    $.ajax({
        url         : "<?php echo base_url().'kasir.php/kwitansi_jkn/getView' ?>",
        beforeSend  : function(){
            $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
        },
        success     : function(data){
            $('tbody#getdata').html(data);
            $('tr.resultDat').each(function(){
                var a = $(this).data('id');
                console.log(a);
                $.ajax({
                    url         : "<?php echo base_url().'kasir.php/kwitansi_jkn/cekRetur' ?>",
                    type        : "POST",
                    data        : {no_kwitansi:a},
                    dataType    : "JSON",
                    success     : function(data){
                        if (data.code==200){
                            $('button#'+a).parent().append('<br/>Transaksi di Retur');
                            $('button#'+a).remove();
                        }
                    },
                    error       : function(jqXHR,ajaxOption,errorThrown){
                        console.log(jqXHR.responseText);
                    }
                });
            });
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            $('tbody#getdata').html("<tr><td colspan=9>Data tidak ditemukan</td></tr>");
            console.log(jqXHR.responseText);
        }
    });            
}
function printLampiran(a,b,c){
    $('#xNoKwintansi').val(a);
    $('#xNoMR').val(b);
    $('#xPsNama').val(decodeURI(c));        
    $.ajax({
        url : "<?php echo base_url().'kasir.php/kwitansi_jkn/getLampiranKwitansi' ?>",
        type : "POST",
        data : {no_kwitansi:a},
        beforeSend  : function(){
            $('tbody#getdataLampiran').html("<tr><td colspan=7><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('tbody#getdataLampiran').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);
        }
    });            
    $("#lampiranModal").modal( "show" );
}
function batal(a){
    $('#sNoKwintansi').val(a);
    $('#alasanRetur').val("");
    $("#myModal").modal( "show" );
}    
function simpanRetur(){
    var a = $('#sNoKwintansi').val();
    var b = $('#alasanRetur').val();
    if(a==""){
        alert('Ops. Anda tidak berhak meretur transaksi ini');
    }else if(b==""){
        alert('Alasan retur tidak boleh kosong');
    }else{
        var x = confirm("Apakah anda yakin akan meretur kwitansi ini?");
        if(x){
            $.ajax({
                url         : "<?php echo base_url().'kasir.php/kwitansi_jkn/returKwitansi' ?>",
                type        : "POST",
                data        : {no_kwitansi:a,alasan_retur:b},
                dataType    : "JSON",
                success     : function(data){
                    if(data.code==200){
                        alert(data.message);
                        window.location.reload();
                    }else{
                        alert(data.message);
                    }
                },
                error       : function(jqXHR,ajaxOption,errorThrown){
                    console.log(jqXHR.responseText);                    
                }
            });            
        }
    }
}       
</script>
