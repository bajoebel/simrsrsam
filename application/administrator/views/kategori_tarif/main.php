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
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">    
    <div class="alert alert-danger alert-dismissible">
        <p>Data kategori tarif merupakan mapping tarif layanan RS sesuai standar BPJS Kesehatan.</p>
    </div>
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
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter Kategori Tarif" style="width: 200px"/>
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
                                <th>Kategori Tarif</th>
                                <th style="width: 150px">Aksi</th>
                            </tr>    
                        </thead>
                        <tbody id="getdata"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="formModalKategoriTarif">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Form Kategori Tarif</h4>
                </div>
                <div class="modal-body">
                    <form id="form1" role="form" onsubmit="return false">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="kategori_tarif">Kategori Tarif</label>
                                <input type="hidden" name="idx" id="idx">
                                <input type="text" class="form-control" name="kategori_tarif" id="kategori_tarif">
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
    $('#btnTambah').click(function(){
        $('#submit').html('Simpan');
        $('#idx').val('');
        $('#kategori_tarif').val('');
        $('#formModalKategoriTarif').modal('show');
    });
        $('input').focus(function(){
        return $(this).select();
    });
    $('#btnRefresh').click(function(){
        $('input').val('');
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/kategori_tarif/getView' ?>",
            type        : "POST",
            data        : {sLike:""},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=3><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
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
                url         : "<?php echo base_url().'administrator.php/kategori_tarif/getView' ?>",
                type        : "POST",
                data        : {sLike:$(this).val()},
                beforeSend  : function(){
                    $('tbody#getdata').html("<tr><td colspan=3><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
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
    $('#btn_keyword').click(function(){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/kategori_tarif/getView' ?>",
            type        : "POST",
            data        : {sLike:$('#keyword').val()},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=3><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
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
        url         : "<?php echo base_url().'administrator.php/kategori_tarif/getView' ?>",
        beforeSend  : function(){
            $('tbody#getdata').html("<tr><td colspan=3><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
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
    $('#idx').val(a);
    $('#kategori_tarif').val(b);
    $('#profId').val(c);
    $('#formModalKategoriTarif').modal("show");
}
function hapus(a){
    var x = confirm("Apakah anda yakin akan menghapus record ini?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/kategori_tarif/hapus' ?>",
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
function simpan(){
    var a = $('#kategori_tarif').val();
    if(a==""){
        alert('Ops. kategori tarif harus di isi.');
    }else{
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/kategori_tarif/simpan' ?>",
            type        : "POST",
            data        : $('#form1').serialize(),
            dataType    : "JSON",
            success     : function(data){
                alert(data.message);
                getTable();
                if(data.code==200){
                    $('#form1').find('input').val('');
                }else if(data.code==201){
                    $('#form1').find('input').val('');
                    $('#formModalKategoriTarif').modal('hide');
                }
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);
            }
        });
    }
}      
</script>