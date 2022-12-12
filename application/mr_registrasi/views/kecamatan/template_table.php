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
        <p>Data <?php echo $contentTitle ?></p>
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
                        <div class="input-group input-group-sm" style="width: 300px;">
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter nama provinsi / kota / kabupaten / kecamatan" style="width: 300px"/>
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
                                <th>Nama Kecamatan</th>
                                <th>Nama Kabupaten / Kota</th>
                                <th>Nama Provinsi</th>
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
                                    <label>Privinsi</label>
                                    <input type="hidden" name="idx" id="idx">
                                    <select class="form-control" name="id_provinsi" id="id_provinsi">
                                        <?php foreach ($datProvinsi->result_array() as $xDP): ?>
                                        <option value="<?php echo $xDP['idx'] ?>"><?php echo $xDP['nama_provinsi'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label>Kabupaten / Kota</label>
                                    <select class="form-control" name="id_kab_kota" id="id_kab_kota">
                                        <option value="">-- Pilih --</option>
                                    </select>
                                </div>                         
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="text" class="form-control" name="nama_kecamatan" id="nama_kecamatan">
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
    $('#id_provinsi').change(function(){
        var a = $('#id_provinsi').val();
        $.ajax({
            type    : "POST",
            url     : "<?php echo base_url().'mr_registrasi.php/kecamatan/getKab' ?>",
            data    : {id_provinsi:a},
            success : function(data){
                var x = eval("(" + data + ")");
                var xOption = "";
                $('#id_kab_kota').html(data);
                if(x.length > 0){
                    for(i = 0;i < x.length;i++){
                        xOption += '<option value="'+ x[i]['idx'] +'">' + x[i]['nama_kab_kota'] + '</option>\n';
                    }
                }else{
                    xOption += '<option value="">-- Pilih --</option>\n';
                }
                $('#id_kab_kota').html(xOption);
                $('#id_kab_kota').show();
            },
            error : function(xhr, ajaxOption, thrownError){
                alert('Response : ' + thrownError);
            }
        }); 
    });
    $('#btnTambah').click(function(){
        $('#submit').html('Simpan');
        $('#idx').val('');
        $('#id_provinsi').prop('selectedIndex',0);
        $('#id_provinsi').change();
        // $('#id_kab_kota').prop('selectedIndex',0);
        $('#nama_kecamatan').val('');
        $('#formModal').modal('show');
        $('#id_provinsi').change();
    });
    $('input').focus(function(){
        return $(this).select();
    });
    $('#btnRefresh').click(function(){
        $('input').val('');
        $.ajax({
            url         : "<?php echo base_url().'mr_registrasi.php/kecamatan/getView' ?>",
            type        : "POST",
            data        : {sLike:""},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=4><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
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
                url         : "<?php echo base_url().'mr_registrasi.php/kecamatan/getView' ?>",
                type        : "POST",
                data        : {sLike:$(this).val()},
                beforeSend  : function(){
                    $('tbody#getdata').html("<tr><td colspan=4><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
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
            url         : "<?php echo base_url().'mr_registrasi.php/kecamatan/getView' ?>",
            type        : "POST",
            data        : {sLike:$('#keyword').val()},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=4><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
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
        url         : "<?php echo base_url().'mr_registrasi.php/kecamatan/getView' ?>",
        beforeSend  : function(){
            $('tbody#getdata').html("<tr><td colspan=4><i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu</td></tr>");
        },
        success     : function(data){
            $('tbody#getdata').html(data);
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            console.log(errorThrown);
        }
    });            
}
function edit(a,b,c,d){
    $('#submit').html('Update');
    $('#idx').val(a);
    $('#nama_kecamatan').val(b);
    $('#id_provinsi option[value='+d+']').prop('selected',true);
    
    $.ajax({
        type    : "POST",
        url     : "<?php echo base_url().'mr_registrasi.php/kecamatan/getKab' ?>",
        data    : {id_provinsi:d},
        success : function(data){
            var x = eval("(" + data + ")");
            var xOption = "";
            $('#id_kab_kota').html(data);
            if(x.length > 0){
                for(i = 0;i < x.length;i++){
                    xSelect = (x[i]['idx'] == c) ? "selected='selected'" : "";
                    xOption += '<option '+xSelect+' value="'+ x[i]['idx'] +'">' + x[i]['nama_kab_kota'] + '</option>\n';
                }
            }else{
                xOption += '<option value="">-- Pilih --</option>\n';
            }
            $('#id_kab_kota').html(xOption);
        },
        error : function(xhr, ajaxOption, thrownError){
            console.log('Error Function : ' + thrownError);
        }
    });  
    
    $('#formModal').modal("show");
}


function hapus(a){
    var x = confirm("Apakah anda yakin akan menghapus record ini?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'mr_registrasi.php/kecamatan/hapus' ?>",
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
    var a = $('#idx').val();
    var b = $('#nama_kecamatan').val();
    var c = $('#id_kab_kota').val();
    var d = $('#id_kab_kota :selected').html();
    var e = $('#id_provinsi').val();
    var f = $('#id_provinsi :selected').html();
    var formdata = {
        idx : a,
        nama_kecamatan : b,
        id_kab_kota : c,
        nama_kab_kota : d,
        id_provinsi : e,
        nama_provinsi : f
    }

    if(b == ""){
        alert('Ops. nama kecamatan harus di isi.');
    }else if(c == ""){
        alert('Ops. Kabupaten / Kota harus dipilih.');
    }else if(e == ""){
        alert('Ops. Provinsi harus dipilih.');
    }else{
        $.ajax({
            url         : "<?php echo base_url().'mr_registrasi.php/kecamatan/simpan' ?>",
            type        : "POST",
            data        : formdata,
            dataType    : "JSON",
            success     : function(data){
                alert(data.message);
                if(data.code==200){
                    $('#form1').find('input').val('');
                }else if(data.code==201){
                    $('#form1').find('input').val('');
                    $('#id_kab_kota').prop('selectedIndex',0);
                    $('#id_provinsi').prop('selectedIndex',0);
                    $('#formModal').modal('hide');
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
