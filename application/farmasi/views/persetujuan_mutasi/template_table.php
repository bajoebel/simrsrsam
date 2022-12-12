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
                        <!--a href="#" id="btnKembali" class="btn btn-default">
                            <i class="glyphicon glyphicon-new-window"></i> Kembali</a>
                        <a href="#" id="btnTambah" class="btn btn-default">
                            <i class="glyphicon glyphicon-plus"></i> Tambah</a>
                        <a href="#" id="btnRefresh" class="btn btn-default">
                            <i class="glyphicon glyphicon-refresh"></i> Refresh</a-->
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
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width:30px">#</th>
                                <th style="width:100px">Kode MT</th>
                                <th style="width:120px">Waktu Rekam</th>
                                <th style="width:120px">Tgl Mutasi</th>
                                <th>Asal Mutasi</th>
                                <th>Jumlah Item</th>
                                <th>Keterangan</th>
                                <th>Status Penerimaan</th>
                                <th style="width: 100px">#</th>
                            </tr>    
                        </thead>
                        <tbody id="getdata"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modal_persetujuan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Transaksi Persetujuan Mutasi</h4>
            </div>
            <form id="form2" action="#" method="post" onsubmit="return false">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <table class="table table-striped table-hover">
                            <thead class="bg-blue">
                                <th style="text-align: center;"><input type="checkbox" name="checkall" id="checkall" value="1" onclick="checkAll()"></th>
                                <th>KODE BARANG</th>
                                <th>NAMA BARANG</th>
                                <th style="text-align: right;">JUMLAH MUTASI</th>
                            </thead>
                            <tbody id="data-mutasi"></tbody>
                        </table>
                    </div>
                </div>  
            </div>
            </form>
            <div class="modal-footer">
                <button id="setujui" type="button" class="btn btn-danger" onclick="setujui()">
                                                    <i class="fa fa-add"></i> Setujui</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="modal_retur" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Transaksi Retur Mutasi <b><span id="tujuan"></span><b></h4>
            </div>
            <form id="form_mutasi_retur" action="<?= base_url() ."farmasi.php/persetujuan_mutasi/return_mutasi" ?>" method="post" >
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="form-group">
                            <label>Alasan Retur</label>
                            <input type="hidden" name="KDMT" id="KDMT" value="">
                            <input type="hidden" name="LOKASI_ASAL" id="LOKASI_ASAL" value="">
                            <input type="hidden" name="NAMA_LOKASI_ASAL" id="NAMA_LOKASI_ASAL" value="">
                            <input type="hidden" name="LOKASI_TUJUAN" id="LOKASI_TUJUAN" value="">
                            <input type="hidden" name="NAMA_LOKASI_TUJUAN" id="NAMA_LOKASI_TUJUAN" value="">
                            <textarea class="form-control" name="ALASAN_RET" id="ALASAN_RET"></textarea>
                        </div>

                        <div class="form-group">
                            <table class="table table-striped table-hover">
                                <thead class="bg-blue">
                                    <th style="text-align: center;">#</th>
                                    <th>KODE BARANG</th>
                                    <th>NAMA BARANG</th>
                                    <th style="text-align: right;">JUMLAH MUTASI</th>
                                    <th style="text-align: right;">SUDAH DIRETUR</th>
                                    <th style="text-align: right;">JML RETUR</th>

                                </thead>
                                <tbody id="data-retur"></tbody>
                            </table>
                            <!--input type="submit" name="simpan"-->
                        </div>
                    </div>
                </div>  
            </div>
            </form>
            <div class="modal-footer">
                <button id="setujui" type="button" class="btn btn-danger" onclick="addReturmutasi()"><i class="fa fa-add"></i> Return</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
    getTable();
    $('input').focus(function(){
        return $(this).select();
    });
    $('#btnKembali').click(function(){
        var url = '<?php echo base_url().'farmasi.php/persetujuan_mutasi' ?>';
        window.location.href = url;        
    });
    $('#btnTambah').click(function(){
        var a = "<?php echo $kLok ?>";
        var url = "<?php echo base_url().'farmasi.php/persetujuan_mutasi/tambah?kLok=' ?>"+a;
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
                url         : "<?php echo base_url().'farmasi.php/persetujuan_mutasi/getView' ?>",
                type        : "POST",
                data        : {sLike:a,kLok:b},
                beforeSend  : function(){
                    $('tbody#getdata').html("<tr><td colspan=10><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('tbody#getdata').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    $('tbody#getdata').html("<tr><td colspan=10>Data tidak ditemukan</td></tr>");
                    console.log(jqXHR.responseText);
                }
            });            
        }
    });
    $('#btnKeyword').click(function(){
        var a = $('#keyword').val();
        var b = "<?php echo $kLok ?>";
        $.ajax({
            url         : "<?php echo base_url().'farmasi.php/persetujuan_mutasi/getView' ?>",
            type        : "POST",
            data        : {sLike:a,kLok:b},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=10><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success : function(data){
                $('tbody#getdata').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                $('tbody#getdata').html("<tr><td colspan=10>Data tidak ditemukan</td></tr>");
                console.log(jqXHR.responseText);
            }
        });            
    });
});

function getTable(){
    var a = "<?php echo $kLok ?>";
    $.ajax({
        url         : "<?php echo base_url().'farmasi.php/persetujuan_mutasi/getView' ?>",
        type        : "POST",
        data        : {kLok:a},
        beforeSend  : function(){
            $('tbody#getdata').html("<tr><td colspan=10><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
        },
        success     : function(data){
            $('tbody#getdata').html(data);
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            $('tbody#getdata').html("<tr><td colspan=10>Data tidak ditemukan</td></tr>");
            console.log(jqXHR.responseText);
        }
    });            
}
function cetak(a){
    var url = '<?php echo base_url().'farmasi.php/persetujuan_mutasi/cetak?kode=' ?>'+a;
    openInNewTab(url);        
}
function openInNewTab(url) {
    var win = window.open(url, '_blank');
    win.focus();
} 
function checkAll(){
    var checkall = $('#checkall:checked').val();
    //alert(checkall);
    if(checkall=="1"){
        $('.STATUSPENERIMAAN').prop( "checked", true );
    }else {
        $('.STATUSPENERIMAAN').prop( "checked", false );
    }
}
var base_url="<?php echo base_url() ."farmasi.php/" ?>";

</script>

<script src="<?php echo base_url() ?>js/farmasi.js"></script>