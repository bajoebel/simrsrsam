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
        <p>Set Dokter Poliklinik/IGD</p>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="col-sm-6 col-xs-12">
                        <a href="#" id="btnTambah" class="btn btn-default">
                            <i class="glyphicon glyphicon-plus"></i> Tambah</a>
                        <a href="#" id="btnRefresh" class="btn btn-default">
                            <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                    </div>

                    <div class="col-sm-6 col-xs-12">
                        <div class="input-group input-group-sm">
                            <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Enter Keyword"/>
                            <div class="input-group-btn">
                                <button type="button" id="btnKeyword" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 30px;text-align: center;">No</th>
                                <th style="width: 100px;text-align: center;">NRP</th>
                                <th>Nama Dokter</th>
                                <th>Nama Poli/IGD</th>
                                <th>Profesi</th>
                                <th style="width: 120px;text-align: center;">Action</th>
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
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Dokter</label>
                                <input type="hidden" name="id" id="id">
                                <select class="form-control" id="NRP" style="width:100%">
                                    <option value="">Pilih Dokter</option>
                                    <?php foreach ($datPegawai->result_array() as $xP): ?>
                                    <option value="<?= $xP['NRP'] ?>"><?= $xP['pgwNama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>                        
                            <div class="form-group">
                                <label>Poli/IGD</label>
                                <select class="form-control" id="idruang" style="width:100%">
                                    <option value="">Pilih Poli/IGD</option>
                                    <?php foreach ($datRuang->result_array() as $xR): ?>
                                    <option value="<?= $xR['idx'] ?>"><?= $xR['ruang'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                
                            </div>   
                            <div class="form-group">
                                <label>Profesi</label>
                                <select class="form-control" name="dokter" id="dokter">
                                    <option value="1">Dokter</option>
                                    <option value="0">Perawat/Bidan</option>
                                </select>
                            </div>   
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
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
    getTable();
    $('select').not('#dokter').select2();
    $('#btnTambah').click(function(){
        $('#submit').html('Simpan');
        $('#id').val('');
        $('#NRP').val('').trigger('change');
        $('#idruang').val('').trigger('change');
        $('#dokter').prop('selectedIndex',0);
        $('#formModal').modal('show');
    });
    $('input').focus(function(){
        return $(this).select();
    });
    $('#btnRefresh').click(function(){
        $('#keyword').val('');
        getTable();
    });
    $('#keyword').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            getTable();           
        }
    });
    $('#btnKeyword').click(function(){
        getTable(); 
    });
    
});

function getTable(){
    var a = $('#keyword').val();
    $.ajax({
        url         : "<?php echo base_url().'administrator.php/set_dokter_ruang/getView' ?>",
        type        : "POST",
        data        : {sLike:a},
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
function edit(a,b,c,d){
    $('#submit').html('Update');
    $('#id').val(a);
    $('#NRP').val(b).trigger('change');
    $('#idruang').val(c).trigger('change');
    $('#dokter option[value='+d+']').prop('selected',true);
    $('#formModal').modal("show");
}
function hapus(a){
    var x = confirm("Apakah anda yakin akan menghapus record ini?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/set_dokter_ruang/hapus' ?>",
            type        : "POST",
            data        : {id:a},
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
    var a = $('#id').val();
    var b = $('#NRP').val();
    var c = $('#idruang').val();
    var d = $('#dokter').val();

    var formdata = {}
    formdata['id'] = $('#id').val();
    formdata['NRP'] = $('#NRP').val();
    formdata['idruang'] = $('#idruang').val();
    formdata['dokter'] = $('#dokter').val();


    if(formdata['NRP']==""){
        alert('Ops. Pegawai harus di pilih.');
    }else if(formdata['idruang']==""){
        alert('Ops. Poli/IGD harus di pilih.');
    }else{
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/set_dokter_ruang/simpan' ?>",
            type        : "POST",
            data        : formdata,
            dataType    : "JSON",
            success     : function(data){
                alert(data.message);
                if(data.code==200){
                    $('#form1').find('input').val('');
                }else if(data.code==201){
                    $('#form1').find('input').val('');
                    $('#NRP').prop('selectedIndex',0);
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
