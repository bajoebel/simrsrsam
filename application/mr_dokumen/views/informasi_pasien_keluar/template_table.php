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
    <h1><?php echo $contentTitle ?> <?php echo getRuangByID($ruangID) ?></h1>
</section>
<section class="content container-fluid">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Informasi</h4>
        Silahkan cari pasien keluar dari <?php echo getPoliByID($ruangID) ?>. 
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="#" id="btnKembali" class="btn btn-default">
                            <i class="glyphicon glyphicon-new-window"></i> Kembali</a>
                        <a href="#" id="btnTambah" class="btn btn-default">
                            <i class="glyphicon glyphicon-plus"></i> Tambah Data Pasien Keluar</a>
                        <a href="#" id="btnRefresh" class="btn btn-default">
                            <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                    </h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" id="keywords" name="keywords" class="form-control pull-right" placeholder="Enter No Registrasi RS / No MR" style="width: 350px"/>
                            <div class="input-group-btn">
                                <button type="button" id="btnKeywords" class="btn btn-primary"><i class="fa fa-search"></i> Cari Pasien</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th style="width: 80px">Tgl.Keluar</th>
                                <th style="width: 100px">No.Reg RS/<br/>No.Reg Unit</th>
                                <th style="width: 200px">No.MR/<br/>Nama Pasien</th>
                                <th style="width: 50px">Jns.Kelamin</th>
                                <th>DPJP</th>
                                <th>Keadaan Keluar/<br/>Cara Keluar</th>
                                <th style="width: 100px">Action</th>
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
    $('#btnKembali').click(function(){
        var url = '<?php echo base_url().'mr_dokumen.php/informasi_pasien_keluar' ?>';
        window.location.href = url;
    });
    $('#btnTambah').click(function(){
        var a = '<?php echo $ruangID ?>';
        var url = '<?php echo base_url().'mr_dokumen.php/informasi_pasien_keluar/tambah?kLok=' ?>'+a;
        window.location.href = url;
    });
    $('#btnRefresh').click(function(){
        getTable();
    });
    $('#keywords').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        var a = '<?php echo $ruangID ?>';
        var b = $(this).val();
        if (keycode == '13') {
            $.ajax({
                url         : "<?php echo base_url().'mr_dokumen.php/informasi_pasien_keluar/getView' ?>",
                type        : "POST",
                data        : {ruangID:a,sLike:b},
                beforeSend  : function(){
                    $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('tbody#getdata').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(jqXHR.responseText);
                }
            });            
        }
    });
    $('#btnKeywords').click(function(){
        var a = '<?php echo $ruangID ?>';
        var b = $('#keywords').val();
        $.ajax({
            url         : "<?php echo base_url().'mr_dokumen.php/informasi_pasien_keluar/getView' ?>",
            type        : "POST",
            data        : {ruangID:a,sLike:b},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
            },
            success : function(data){
                $('tbody#getdata').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);
            }
        });            
    });
    
});

function getTable(){
    var a = '<?php echo $ruangID ?>';
    $.ajax({
        url         : "<?php echo base_url().'mr_dokumen.php/informasi_pasien_keluar/getView' ?>",
        type        : "POST",
        data        : {ruangID:a,sLike:''},
        beforeSend  : function(){
            $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('tbody#getdata').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);
        }
    });            
}

function batalPulang(a){
    var x = confirm("Apakah anda yakin akan membatalkan status pulang pasien ini ?");
    if(x){
        if(a==""){
            alert('Ops. Kode tidak ditemukan. coba ulangi lagi');
        }else{
            $.ajax({
                url     : "<?php echo base_url().'mr_dokumen.php/informasi_pasien_keluar/batalPulang' ?>",
                type    : "POST",
                data    : {idx:a},
                dataType: "JSON",
                success : function(data){
                    if(data.code == 200){
                        getTable();
                    }else{
                        alert(data.message)
                    }
                },
                error   : function(jqXHR,ajaxOption,errorThrown){
                    console.log(jqXHR.responseText);
                }
            });
        }
    }
}
</script>