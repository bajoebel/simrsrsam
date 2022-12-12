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
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter Kode BKK/Nama Rekanan" style="width: 250px"/>
                            <div class="input-group-btn">
                                <button type="button" id="btnKeyword" class="btn btn-primary">
                                    <i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width:40px">#</th>
                                <th style="width:100px">Kode BKK</th>
                                <th style="width:120px">Waktu Rekam</th>
                                <th style="width:100px">Tgl.Transaksi</th>
                                <th>Nama Rekanan</th>
                                <th style="width:120px">#</th>
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
    $('#btnKembali').click(function(){
        var url = '<?php echo base_url().'farmasi.php/barang_keluar_khusus' ?>';
        window.location.href = url;        
    });
    $('#btnTambah').click(function(){
        var a = "<?php echo $kLok ?>";
        var url = "<?php echo base_url().'farmasi.php/barang_keluar_khusus/tambah' ?>";
        window.location.href = url;        
    });
    $('#btnRefresh').click(function(){
        getTable();
    });
    $('#keyword').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            var a = $('#keyword').val();
            var b = "<?php echo $kLok ?>";
            $.ajax({
                url         : "<?php echo base_url().'farmasi.php/barang_keluar_khusus/getView' ?>",
                type        : "POST",
                data        : {sLike:a,kLok:b},
                beforeSend  : function(){
                    $('tbody#getdata').html("<tr><td colspan=6><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('tbody#getdata').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    $('tbody#getdata').html("<tr><td colspan=6>Data tidak ditemukan</td></tr>");
                    console.log(jqXHR.responseText);
                }
            });            
        }
    });
    $('#btnKeyword').click(function(){
        var a = $('#keyword').val();
        var b = "<?php echo $kLok ?>";
        $.ajax({
            url         : "<?php echo base_url().'farmasi.php/barang_keluar_khusus/getView' ?>",
            type        : "POST",
            data        : {sLike:a,kLok:b},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=6><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success : function(data){
                $('tbody#getdata').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                $('tbody#getdata').html("<tr><td colspan=6>Data tidak ditemukan</td></tr>");
                console.log(jqXHR.responseText);
            }
        });            
    });
});

function getTable(){
    var a = "<?php echo $kLok ?>";
    $.ajax({
        url         : "<?php echo base_url().'farmasi.php/barang_keluar_khusus/getView' ?>",
        type        : "POST",
        data        : {kLok:a},
        beforeSend  : function(){
            $('tbody#getdata').html("<tr><td colspan=6><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
        },
        success     : function(data){
            $('tbody#getdata').html(data);
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            $('tbody#getdata').html("<tr><td colspan=6>Data tidak ditemukan</td></tr>");
            console.log(jqXHR.responseText);
        }
    });            
}
function cetak(a){
    var url = '<?php echo base_url().'farmasi.php/barang_keluar_khusus/cetak?kode=' ?>'+a;
    openInNewTab(url);        
}
function openInNewTab(url) {
    var win = window.open(url, '_blank');
    win.focus();
} 
</script>