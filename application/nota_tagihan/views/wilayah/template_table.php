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
        <p>Data wilayah</p>
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
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter Nama wilayah" style="width: 200px"/>
                            <div class="input-group-btn">
                                <button type="button" id="btnKeyword" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Provinsi</th>
                                <th>Kab / Kota</th>
                                <th>Kecamatan</th>
                                <th>Desa / Kelurahan / Nagari</th>
                                <th style="width: 250px;text-align: center;">Action</th>
                            </tr>    
                        </thead>
                        <tbody id="getdata"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="formModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Form Entry</h4>
                </div>
                <div class="modal-body">
                    
                    <form id="form1" role="form" onsubmit="return false">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <input type="hidden" name="wilayah_id" id="wilayah_id">
                                    <input type="text" class="form-control" name="provinsi" id="provinsi">
                                </div>                        
                            </div>      
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kab / Kota</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control" name="kabkota" id="kabkota">
                                                <option value="Tidak Terdefinisi">Pilih</option>
                                                <option value="Kota">Kota</option>
                                                <option value="Kabupaten">Kabupaten</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="nama_kabkota" id="nama_kabkota">
                                        </div>
                                    </div>
                                </div>                       
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="text" class="form-control" name="kecamatan" id="kecamatan">
                                </div>                        
                            </div>     
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Kelurahan / Desa / Nagari</label>
                                    <input type="text" class="form-control" name="desa" id="desa">
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
    $('#btnTambah').click(function(){
        $('#submit').html('Simpan');
        $('#wilayah_id').val('');
        $('#provinsi').val('');
        $('#formModal').modal('show');
    });
    $('input').focus(function(){
        return $(this).select();
    });
    $('#btnRefresh').click(function(){
        $('input').val('');
        $.ajax({
            url : "<?php echo base_url().'mr_registrasi.php/wilayah/getView' ?>",
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
                url         : "<?php echo base_url().'mr_registrasi.php/wilayah/getView' ?>",
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
    $('#btnKeyword').click(function(){
        $.ajax({
            url         : "<?php echo base_url().'mr_registrasi.php/wilayah/getView' ?>",
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
        url         : "<?php echo base_url().'mr_registrasi.php/wilayah/getView' ?>",
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
function edit(a,b,c,d,e,f){
    $('#submit').html('Update');
    $('#wilayah_id').val(a);
    $('#provinsi').val(b);
    $('#kabkota').val(c);
    $('#nama_kabkota').val(d);
    $('#kecamatan').val(e);
    $('#desa').val(f);
    $('#formModal').modal("show");
}
function hapus(a){
    var x = confirm("Apakah anda yakin akan menghapus record ini?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'mr_registrasi.php/wilayah/hapus' ?>",
            type        : "POST",
            data        : {wilayah_id:a},
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
    var a = $('#provinsi').val();
    if(a==""){
        alert('Ops. nama wilayah harus di isi.');
    }else{
        $.ajax({
            url         : "<?php echo base_url().'mr_registrasi.php/wilayah/simpan' ?>",
            type        : "POST",
            data        : $('#form1').serialize(),
            dataType    : "JSON",
            success     : function(data){
                if(data.code==200){
                    alert(data.message);
                    $('#form1').find('input').val('');
                }else if(data.code==201){
                    alert(data.message);
                    $('#form1').find('input').val('');
                    $('#formModal').modal('hide');
                }else{
                    alert(data.message);
                }
                getTable();
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);
            }
        });
    }
}      
</script>
