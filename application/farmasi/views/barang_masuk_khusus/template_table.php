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
    .rightAlign{text-align: right;}
    .centerAlign{text-align: center;}
</style>       
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<section class="content container-fluid">    
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="#" id="btnKembali" class="btn btn-default">
                            <i class="glyphicon glyphicon-new-window"></i> Kembali</a>
                        <a href="#" id="btnTambah" class="btn btn-default">
                            <i class="glyphicon glyphicon-plus"></i> Tambah</a>
                        <a href="#" id="btnRefresh" class="btn btn-default">
                            <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                    </h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter nama barang" style="width: 200px"/>
                            <div class="input-group-btn">
                                <button type="button" id="btnKeyword" class="btn btn-primary">
                                    <i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="120px">Waktu Rekam</th>
                                <th>Nama Rekanan</th>
                                <th width="120px">No Bukti</th>
                                <th width="100px">Tgl Bukti</th>
                                <th width="100px">Tgl Terima</th>
                                <th width="150px">Lokasi Obat</th>
                                <th width="150px">#</th>
                            </tr>   
                        </thead>
                        <tbody id="getdata"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modalRet" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Form Retur Transaksi</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row-fluid" style="margin-top: -10px">
                        <form id="form1" action="#" method="get" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Nomor Transaksi</label>
                                <div class="controls">
                                    <input type="text" name="KDBMK" id="KDBMK" class="form-control"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Alasan</label>
                                <div class="controls">
                                    <textarea name="ALASAN" id="ALASAN" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">&nbsp;</label>
                                <div class="controls">
                                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">
                                        <i class="fa fa-power-off"></i> Tutup</button>
                                    <button type="button" class="btn btn-danger" onclick="submitRetur()">
                                        <i class="fa fa-save"></i> Retur Transaksi</button>  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    getTable();
    $('input').focus(function(){
        return $(this).select();
    });
    $('#btnKembali').click(function(){
        var url = '<?php echo base_url().'farmasi.php/barang_masuk_khusus' ?>';
        window.location.href = url;        
    });
    $('#btnTambah').click(function(){
        //var a = "<?php echo $kLok ?>";
        var url = "<?php echo base_url().'farmasi.php/barang_masuk_khusus/tambah' ?>";
        window.location.href = url;        
    });
    $('#btnRefresh').click(function(){
        getTable();
    });
    
    $('#keywordFilter').change(function(){
        var a = $("#keywordFilter").val();
        var b = $("#keywordText").val();
        $.ajax({
            url : "<?php echo base_url().'farmasi.php/barang_masuk_khusus/getView' ?>",
            type : "POST",
            data : {sFilter:a,sLike:b},
            beforeSend  : function(){
                $('#getdata').html("<tr><td colspan=7><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success : function(data){
                $('#getdata').html(data);
                $('tr.resultDat').each(function(){
                    var a = $(this).data('id');
                    $.ajax({
                        url         : "<?php echo base_url().'farmasi.php/barang_masuk_khusus/cekRetur' ?>",
                        type        : "POST",
                        data        : {KDBMK:a},
                        dataType    : "JSON",
                        success     : function(data){
                            if (data.code==200){
                                $('button#'+a).parent('.btnAksi').append('<br/>Transaksi di Retur');
                                $('button#'+a).remove();
                            }
                        },
                        error       : function(jqXHR,ajaxOption,errorThrown){
                            console.log(jqXHR.responseText);
                        }
                    });
                });
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                $('#getdata').html("<tr><td colspan=7>Data tidak ditemukan</td></tr>");
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
            url : "<?php echo base_url().'farmasi.php/barang_masuk_khusus/getView' ?>",
            type : "POST",
            data : {sFilter:a,sLike:b},
            beforeSend  : function(){
                $('#getdata').html("<tr><td colspan=7><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success : function(data){
                $('#getdata').html(data);
                $('tr.resultDat').each(function(){
                    var a = $(this).data('id');
                    $.ajax({
                        url         : "<?php echo base_url().'farmasi.php/barang_masuk_khusus/cekRetur' ?>",
                        type        : "POST",
                        data        : {KDBMK:a},
                        dataType    : "JSON",
                        success     : function(data){
                            if (data.code==200){
                                $('button#'+a).parent('.btnAksi').append('<br/>Transaksi di Retur');
                                $('button#'+a).remove();
                            }
                        },
                        error       : function(jqXHR,ajaxOption,errorThrown){
                            console.log(jqXHR.responseText);
                        }
                    });
                });
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                $('#getdata').html("<tr><td colspan=7>Data tidak ditemukan</td></tr>");
                console.log(jqXHR.responseText);  
            }
        });            
    });
});

function getTable(){
    var a = "<?php echo $kLok; ?>";
    $.ajax({
        url : "<?php echo base_url().'farmasi.php/barang_masuk_khusus/getView' ?>",
        type : "POST",
        data : {kLok:a},
        beforeSend  : function(){
            $('#getdata').html("<tr><td colspan=7><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('#getdata').html(data);
            $('tr.resultDat').each(function(){
                var a = $(this).data('id');
                $.ajax({
                    url         : "<?php echo base_url().'farmasi.php/barang_masuk_khusus/cekRetur' ?>",
                    type        : "POST",
                    data        : {KDBMK:a},
                    dataType    : "JSON",
                    success     : function(data){
                        if (data.code==200){
                            $('button#'+a).parent('.btnAksi').append('<br/>Transaksi di Retur');
                            $('button#'+a).remove();
                        }
                    },
                    error       : function(jqXHR,ajaxOption,errorThrown){
                        console.log(jqXHR.responseText);
                    }
                });
            });
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            $('#getdata').html("<tr><td colspan=7>Data tidak ditemukan</td></tr>");
            console.log(jqXHR.responseText);  
        }
    });            
}

function cetak(a){
    window.open('<?php echo base_url().'farmasi.php/barang_masuk_khusus/cetak?kode=' ?>'+a);
} 
function batal(a,b){
    var x = confirm("Apakah anda yakin akan membatalkan transaksi ini?");
    if(x){

        $('#KDBMK').val(a);
        $('#ALASAN').val('');
        $('#modalRet').modal('show');
    }
}
function submitRetur(){
    var a = $('#KDBMK').val();
    var b = $('#ALASAN').val();
    $.ajax({
        url         : "<?php echo base_url().'farmasi.php/barang_masuk_khusus/batalRecord' ?>",
        type        : "POST",
        data        : {KDBMK:a,ALASAN:b},
        dataType    : "JSON",
        success     : function(data){
            if(data.code==401){
                alert(data.message);
            }else{
                alert(data.message);
                $('#modalRet').modal('hide');
                getTable();
            }
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);
        }
    });            
}
</script>
