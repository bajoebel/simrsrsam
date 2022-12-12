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
    span#Response{font-size: 14px;margin-left: 20px}
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1><?php echo $contentTitle ?></h1>
        <ol class="breadcrumb">
            <li><a href="#">
                <i class="fa fa-dashboard"></i> <?php echo $breadcrumbTitle ?></a></li>
            <li class="active">Index</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Informasi</h4>
            <?php echo $breadcrumbTitle ?> menggunakan konsep Bridging System
        </div> 
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <span id="Response"></span>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align:right;vertical-align:middle">Filter By : </th>
                                    <th colspan="2">
                                        <select class="form-control" id="">
                                            <option value="NoREG">No Registrasi</option>
                                            <option value="NoSEP">No SEP</option>
                                        </select>
                                    </th>
                                    <th colspan="2">
                                        <input type="text" id="keyword" name="keyword" class="form-control"/>
                                    </th>
                                    <th>
                                        <button type="button" id="btn_keyword" class="btn btn-primary">
                                            <i class="fa fa-search"></i> Cari Faktur
                                        </button>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="width: 100px">No.Faktur</th>
                                    <th style="width: 100px">No.Reg</th>
                                    <th style="width: 80px">No.MR</th>
                                    <th style="width: 80px">No.BPJS</th>
                                    <th>Nama Pasien</th>
                                    <th style="width: 150px">Jenis Kelamin</th>
                                    <th style="width: 80px">Tgl.Lahir</th>
                                    <th style="width: 120px">#</th>
                                </tr>    
                            </thead>
                            <tbody id="getdata"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        
    </section>
</div>
<script type="text/javascript">
$(document).ready(function () { 
    $('#btnRefresh').click(function(){
        $('span#Response').html("");
        getTable();
    });
    $('#keyword').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            $.ajax({
                url         : "<?php echo base_url().'index.php/coding_grouping/getView' ?>",
                type        : "POST",
                data        : {sLike:$(this).val()},
                beforeSend  : function(){
                    $('tbody#getdata').html("<tr><td colspan=7>Loading... Please wait</td></tr>");
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
    $('#btn_keyword').click(function(){
        $.ajax({
            url         : "<?php echo base_url().'index.php/coding_grouping/getView' ?>",
            type        : "POST",
            data        : {sLike:$('#keyword').val()},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=7>Loading... Please wait</td></tr>");
            },
            success : function(data){
                $('tbody#getdata').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                alert(jqXHR.responseText);
            }
        });            
    });
    $('input').keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });
    $('input').focus(function(){
        return this.select();
    });
});

function getTable(){
    $.ajax({
        url         : "<?php echo base_url().'index.php/coding_grouping/getView' ?>",
        beforeSend  : function(){
            $('span#Response').html("<i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu");
            $('tbody#getdata').html("<tr><td colspan=11><i class='fa fa-refresh fa-spin'></i> Sedang menarik data... Silahkan ditunggu</td></tr>");
        },
        success : function(data){
            $('span#Response').html("");
            $('tbody#getdata').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            $('span#Response').html("");
            console.log(jqXHR.responseText);
        }
    });            
}


function edit(a,b){
    window.location.href = "<?php echo base_url().'index.php/coding_grouping/tambah/' ?>"+a+"/"+b;
}
function hapus(a,b){
    var x = confirm('Apakah anda yakin akan menghapus data ketersedian ini?');
    if (x) {
        $.ajax({
            url         : "<?php echo base_url().'index.php/coding_grouping/hapus' ?>",
            type        : "POST",
            data        : {koderuang:a,kodekelas:b},
            dataType    : "JSON",
            beforeSend  : function(){
                $('span#Response').html("<i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu");
            },
            success     : function(data){
                alert(data.message);
                getTable();
                $('span#Response').html("");
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                $('span#Response').html("");
                console.log(jqXHR.responseText);
            }
        });
    }
}


</script>