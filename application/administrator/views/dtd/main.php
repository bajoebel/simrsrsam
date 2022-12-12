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
    td {
      white-space: normal !important; 
      word-wrap: break-word;  
    }
    table {table-layout: fixed;}
    input[readonly]{
        cursor: not-allowed;
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
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter DTD" style="width: 200px"/>
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
                                <th style="width: 50px">#</th>
                                <th style="width: 100px">DTD</th>
                                <th style="width: 300px">Group ICD</th>
                                <th>Golongan Sebab Penyakit (Morbiditas)</th>
                                <th style="width: 100px">Penyebab<br/>Kecelakaan</th>
                                <th style="width: 150px">Aksi</th>
                            </tr>    
                        </thead>
                        <tbody id="getdata"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="formModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Form Entry</h4>
                </div>
                <div class="modal-body">
                    <form id="form1" role="form" onsubmit="return false">
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No.DTD</label>
                                    <input type="text" class="form-control" name="DTD" id="DTD">
                                </div>                        

                                <div class="form-group">
                                    <label>Golongan Sebab Penyakit (Morbiditas)</label>
                                    <input type="text" class="form-control" name="Morbiditas" id="Morbiditas">
                                </div>                                             

                                <div class="form-group">
                                    <label>Penyebab Kecelakaan</label>
                                    <select class="form-control" name="kecelakaan" id="kecelakaan">
                                        <option value="0">Bukan Penyebab Kecelakaan</option>
                                        <option value="1">Penyebab Kecelakaan</option>
                                    </select>
                                </div>                        
                            </div>                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Group ICD</label>
                                    <textarea class="form-control" name="Grup_ICD" id="Grup_ICD" rows="7"></textarea>
                                </div>                        
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="button" id="submit" class="btn btn-primary" onclick="simpan()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
    getTable();
    $('input,textarea').focus(function(){
        return $(this).select();
    });
    $('#btnTambah').click(function(){
        $('#submit').html('Simpan');
        $('#DTD').val('');
        $('#DTD').removeAttr('readonly');
        $('#Grup_ICD').val('');
        $('#Morbiditas').val('');
        $('#kecelakaan').val('0');
        $('#formModal').modal('show');
    });
    $('#btnRefresh').click(function(){
        $('input').val('');
        $.ajax({
            url : "<?php echo base_url().'administrator.php/dtd/getView' ?>",
            type        : "POST",
            data        : {sLike:""},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=6><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
            },
            success : function(data){
                $('tbody#getdata').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                console.log(errorThrown);
            }
        });
    });
    $('#keyword').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            $.ajax({
                url         : "<?php echo base_url().'administrator.php/dtd/getView' ?>",
                type        : "POST",
                data        : {sLike:$(this).val()},
                beforeSend  : function(){
                    $('tbody#getdata').html("<tr><td colspan=6><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
                },
                success : function(data){
                    $('tbody#getdata').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    console.log(errorThrown);
                }
            });            
        }
    });
    $('#btnKeyword').click(function(){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/dtd/getView' ?>",
            type        : "POST",
            data        : {sLike:$('#keyword').val()},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=6><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
            },
            success : function(data){
                $('tbody#getdata').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                console.log(errorThrown);
            }
        });            
    });
});

function getTable(){
    $.ajax({
        url : "<?php echo base_url().'administrator.php/dtd/getView' ?>",
        beforeSend  : function(){
            $('tbody#getdata').html("<tr><td colspan=6><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
        },
        success : function(data){
            $('tbody#getdata').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            console.log(errorThrown);
        }
    });            
}

function edit(a,b,c,d){
    $('#submit').html('Update');
    $('#DTD').val(a);
    $('#DTD').attr('readonly','readonly');
    $('#Grup_ICD').val(b);
    $('#Morbiditas').val(c);
    $('#kecelakaan').val(d);
    $('#formModal').modal("show");
}

function simpan(){
    var paramsData = {};
        paramsData['Aksi'] = $('#submit').html();
        paramsData['DTD'] = $('#DTD').val();
        paramsData['Grup_ICD'] = $('#Grup_ICD').val();
        paramsData['Morbiditas'] = $('#Morbiditas').val();
        paramsData['kecelakaan'] = $('#kecelakaan').val();

    if(paramsData['DTD']==""){
        alert('Ops. No.DTD harus di isi.');
    }else{
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/dtd/simpan' ?>",
            type        : "POST",
            data        : paramsData,
            dataType    : "JSON",
            success     : function(data){
                if(data.code==200){
                    alert(data.message);
                    $('#form1').find('input').val('');
                    $('#form1').find('textarea').val('');
                    getTable();
                }else if(data.code==201){
                    alert(data.message);
                    $('#form1').find('input').val('');
                    $('#form1').find('textarea').val('');
                    $('#formModal').modal('hide');
                    getTable();
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
function hapus(a){
    var x = confirm("Apakah anda yakin akan menghapus record ini?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/dtd/hapus' ?>",
            type        : "POST",
            data        : {idx:a},
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