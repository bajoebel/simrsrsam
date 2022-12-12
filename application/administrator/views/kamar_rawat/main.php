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
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter nama kamar rawat inap" style="width: 200px"/>
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
                                <th>Nama Kamar</th>
                                <th style="width: 100px">Kelas Layanan</th>
                                <th style="width: 200px">Nama Ruang</th>
                                <th style="width: 100px">Jumlah Bed</th>
                                <th style="width: 100px">Rusak</th>
                                <th style="width: 100px">Layak</th>
                                <th style="width: 100px">Kosong</th>
                                <th style="width: 100px">Terisi</th>
                                <th style="width: 150px">#</th>
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
                    <h4 class="modal-title" id="myModalLabel">Form Kamar Rawat Inap</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="col-md-12">
                            <form id="form1" role="form" onsubmit="return false">
                                <div class="form-group">
                                    <label for="nama_kamar">Nama Kamar Rawat</label>
                                    <input type="hidden" name="idx" id="idx">
                                    <input type="text" class="form-control" name="nama_kamar" id="nama_kamar">
                                </div>                        
                                <div class="form-group">
                                    <label for="id_kelas">Kelas Layanan</label>
                                    <select name="id_kelas" id="id_kelas" class="form-control">
                                        <?php foreach ($get_kelas_layanan->result_array() as $xKL): ?>
                                        <option value="<?php echo $xKL['idx'] ?>"><?php echo $xKL['kelas_layanan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_ruang">Ruangan</label>
                                    <select name="id_ruang" id="id_ruang" class="form-control">
                                        <?php foreach ($get_ruang->result_array() as $xRG): ?>
                                        <option value="<?php echo $xRG['idx'] ?>"><?php echo $xRG['ruang'].' - ['.$xRG['grid'].']' ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div> 
                            </form>                       
                        </div>                           
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="button" id="submit" class="btn btn-primary" onclick="simpan()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bedTableModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Form Kamar Rawat Inap</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="col-md-3">
                            <form id="form2" role="form" onsubmit="return false">
                                <div class="form-group">
                                    <label for="BT_nama_kamar">Nama Kamar</label>
                                    <input type="hidden" name="id_kamar" id="id_kamar">
                                    <input readonly="" type="text" class="form-control" name="BT_nama_kamar" id="BT_nama_kamar">
                                </div>                                      
                                <div class="form-group">
                                    <label for="nomor_bed">No Bed</label>
                                    <input type="text" class="form-control" name="nomor_bed" id="nomor_bed">
                                </div>                        
                                <div class="form-group">
                                    <label for="nomor_bed">Status Bed</label>
                                    <select name="status_bed" id="status_bed" class="form-control">
                                        <option value="Kosong">Kosong</option>
                                        <option value="Terisi">Terisi</option>
                                        <option value="Rusak">Rusak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" onclick="simpanBed()">Simpan</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                </div>
                            </form>                       
                        </div> 
                        <div class="col-md-9">
                            <div style="border-style: solid;max-height: 350px;padding: 2px 10px;overflow: scroll;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 100px">#</th>
                                            <th>No Bed</th>
                                            <th style="width: 150px">Status</th>
                                            <th style="width: 60px">Aksi</th>
                                        </tr>    
                                    </thead>
                                    <tbody id="getdatabed"></tbody>
                                </table>   
                            </div>
                                                 
                        </div>                          
                    </div>
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
    })
    $('#btnTambah').click(function(){
        $('#submit').html('Simpan');
        $('#idx').val('');
        $('#nama_kamar').val('');
        $('#id_kelas').prop('selectedIndex',0);
        $('#id_ruang').prop('selectedIndex',0);
        $('#formModal').modal('show');
    });
    $('#btnRefresh').click(function(){
        $('input').val('');
        $.ajax({
            url : "<?php echo base_url().'administrator.php/kamar_rawat/getView' ?>",
            type        : "POST",
            data        : {sLike:""},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
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
                url         : "<?php echo base_url().'administrator.php/kamar_rawat/getView' ?>",
                type        : "POST",
                data        : {sLike:$(this).val()},
                beforeSend  : function(){
                    $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
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
            url         : "<?php echo base_url().'administrator.php/kamar_rawat/getView' ?>",
            type        : "POST",
            data        : {sLike:$('#keyword').val()},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
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
        url : "<?php echo base_url().'administrator.php/kamar_rawat/getView' ?>",
        beforeSend  : function(){
            $('tbody#getdata').html("<tr><td colspan=9><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
        },
        success : function(data){
            $('tbody#getdata').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);
        }
    });            
}
function getTableBed(a){
    $.ajax({
        url : "<?php echo base_url().'administrator.php/kamar_rawat/getBed' ?>",
        type: "POST",
        data: {id_kamar:a},
        beforeSend  : function(){
            $('tbody#getdata').html("<tr><td colspan=4><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
        },
        success : function(data){
            $('tbody#getdatabed').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);
        }
    });            
}

function edit(a,b,c,d){
    $('#submit').html('Update');
    $('#idx').val(a);
    $('#nama_kamar').val(b);
    $('#id_kelas option[value='+c+']').prop('selected',true);
    $('#id_ruang option[value='+d+']').prop('selected',true);
    $('#formModal').modal("show");
}
function set_bed(a,b){
    $('#submit').html('Update');
    $('#id_kamar').val(a);
    $('#BT_nama_kamar').val(b);
    getTableBed(a);
    $('#bedTableModal').modal("show");
}
function hapus(a){
    var x = confirm("Apakah anda yakin akan menghapus record ini?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/kamar_rawat/hapus' ?>",
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
function hapusBed(a){
    var x = confirm("Apakah anda yakin akan menghapus record ini?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/kamar_rawat/hapusBed' ?>",
            type        : "POST",
            data        : {idx:a},
            dataType    : "JSON",
            success     : function(data){
                alert(data.message);    
                if(data.code==200){
                    getTableBed(a);
                }
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);
            }
        });
    }
}
function simpan(){
    var a = $('#ruang').val();
    if(a==""){
        alert('Ops. jenis layanan harus di isi.');
    }else{
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/kamar_rawat/simpan' ?>",
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
function simpanBed(){
    var a = $('#id_kamar').val();
    if(a==""){
        alert('Ops. ada kesalahan pada nama kamar! Silahkan tutup form dan coba lagi.\nUntuk info hubungi administrator');
    }else{
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/kamar_rawat/simpanBed' ?>",
            type        : "POST",
            data        : $('#form2').serialize(),
            dataType    : "JSON",
            success     : function(data){
                if(data.code==200){
                    alert(data.message);
                    $('#form2').find('#nomor_bed').val('');
                    $('#form2').find('#status_bed').prop('selectedIndex',0);
                }else if(data.code==201){
                    alert(data.message);
                    $('#form2').find('input').val('');
                    $('#formModal').modal('hide');
                }else{
                    alert(data.message);
                }
                getTableBed(a);
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);                    
            }
        });
    }
}      
</script>