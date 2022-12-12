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
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="#" id="btnTambah" class="btn btn-default">
                            <i class="glyphicon glyphicon-plus"></i> Tambah</a>
                        <a href="#" id="btnRefresh" class="btn btn-default">
                            <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                    </h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter NRP / Profesi / Nama Pegawai" style="width: 200px"/>
                            <div class="input-group-btn">
                                <button type="button" id="btn_keyword" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th style="width: 100px">NRP</th>
                                <th>Pegawai Nama</th>
                                <th style="width: 100px">Jenis Kelamin</th>
                                <th style="width: 100px">DOB</th>
                                <th style="width: 150px">Nama profesi</th>
                                <th>Alamat</th>
                                <th style="width: 100px">Telp</th>
                                <th style="width: 250px">Action</th>
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
    $('#pgwTglLahir').datepicker({
      autoclose : true,
      format    : "dd-mm-yyyy"
    })
    getTable();
    $('input').focus(function(){
        return $(this).select();
    });
    $('#btnTambah').click(function(){
        var url = '<?php echo base_url().'administrator.php/pegawai/tambah' ?>';
        window.location.href = url;
    });
    $('#btnRefresh').click(function(){
        window.location.reload();
    });
    $('#keyword').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            $.ajax({
                url         : "<?php echo base_url().'administrator.php/pegawai/getView' ?>",
                type        : "POST",
                data        : {sLike:$(this).val()},
                beforeSend  : function(){
                    $('tbody#getdata').html("<tr><td colspan=3>Loading... Please wait</td></tr>");
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
    $('#btn_keyword').click(function(){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/pegawai/getView' ?>",
            type        : "POST",
            data        : {sLike:$('#keyword').val()},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=3>Loading... Please wait</td></tr>");
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
    $.ajax({
        url : "<?php echo base_url().'administrator.php/pegawai/getView' ?>",
        beforeSend  : function(){
            $('tbody#getdata').html("<tr><td colspan=9>Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('tbody#getdata').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);
        }
    });            
}
function edit(a){
    var url = '<?php echo base_url().'administrator.php/pegawai/tambah/' ?>' + a;
    window.location.href = url;
}
function resetAdminApp(a){
    var x = confirm("Apakah anda yakin akan mereset password user ini ini?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/pegawai/resetAdminApp' ?>",
            type        : "POST",
            data        : {NRP:a},
            dataType    : "JSON",
            success     : function(data){
                alert(data.message);    
                if(data.code==200){
                    getTable();
                }
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);                    
            }
        });
    }
}
  
</script>
