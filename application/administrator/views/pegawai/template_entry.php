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
                <div class="box-header with-border"></div>

                <div class="box-body">

<form id="form1" role="form" onsubmit="return false">
    <div class="col-md-6">
        <div class="form-group">
            <label>NRP <span style="color: red"> * </span> [<em>Kode Auto Generate</em>]</label> 
            <input readonly="" type="text" class="form-control" name="NRP" id="NRP" value="<?php echo $NRP ?>">
        </div>   
        <div class="form-group">
            <label>NIP</label>
            <input type="text" class="form-control" name="NIP" id="NIP" value="<?php echo $NIP ?>">
        </div>   
        <div class="form-group">
            <label>Nama Pegawai <span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="pgwNama" id="pgwNama" value="<?php echo $pgwNama ?>">
        </div>   
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <div class="input-group">
                <label class="">
                    <input <?php echo ($pgwJenkel=="1") ? "checked='checked'" : "" ?> type="radio" name="pgwJenkel" id="pgwPria" value="1" style="position: relative;" /> Laki-Laki
                </label>
                &nbsp;&nbsp;&nbsp;
                <label class="">
                    <input <?php echo ($pgwJenkel=="0") ? "checked='checked'" : "" ?> type="radio" name="pgwJenkel" id="pgwWanita" value="0" style="position: relative;" /> Perempuan
                </label>

            </div>
            
        </div> 
        <div class="form-group">
            <label>Tempat Lahir / DOB <span style="color: red"> * </span></label>
            <div class="input-group">
                <input type="text" class="form-control" name="pgwTmpLahir" id="pgwTmpLahir" value="<?php echo $pgwTmpLahir ?>">
                <div class="input-group-btn" style="width: 30%">
                    <input readonly="" type="text" class="form-control" name="pgwTglLahir" id="pgwTglLahir" placeholder="__-__-____" value="<?php echo $pgwTglLahir ?>">
                </div>
            </div>
        </div> 
                        
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Agama</label>
            <select name="pgwAgama" id="pgwAgama" class="form-control">
                <?php foreach ($get_agama->result_array() as $xAG): ?>
                <option <?php echo ($pgwAgama==$xAG['agama']) ? "selected='selected'" : "" ?> value="<?php echo $xAG['agama'] ?>"><?php echo $xAG['agama'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Alamat</label> 
            <input type="text" class="form-control" name="pgwAlmt" id="pgwAlmt" value="<?php echo $pgwAlmt ?>">
        </div>   
        <div class="form-group">
            <label>No HP/Telp <span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="pgwTelp" id="pgwTelp" value="<?php echo $pgwTelp ?>">
        </div>   
        <div class="form-group">
            <label>Profesi</label>
            <select name="profId" id="profId" class="form-control">
                <?php foreach ($get_profesi->result_array() as $xPF): ?>
                <option <?php echo ($profId==$xPF['idx']) ? "selected='selected'" : "" ?> value="<?php echo $xPF['idx'] ?>"><?php echo $xPF['profesi'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>   
        <div class="form-group">
            <label>Status Users</label>
            <select name="userStatus" id="userStatus" class="form-control">
                <option <?php echo ($userStatus=='1') ? "selected='selected'" : "" ?> value="1">Aktif</option>
                <option <?php echo ($userStatus=='0') ? "selected='selected'" : "" ?> value="0">Tidak Aktif</option>
            </select>
        </div>   

        <div class="form-group">
            <label>&nbsp;</label>
            <div class="input-group">
                <button type="button" class="btn btn-primary" id="kembali"> 
                    <i class="glyphicon glyphicon-new-window"></i> Kembali</button>
                <button type="button" class="btn btn-danger" id="submit" onclick="simpan()">
                    <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
            </div>
        </div> 

    </div>  
</form> 
                    
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
      format    : "dd/mm/yyyy"
    });
    $('input').focus(function(){
        return $(this).select();
    });
    $('#kembali').click(function(){
        var url = '<?php echo base_url().'administrator.php/pegawai' ?>';
        window.location.href = url;
    });
});

function simpan(){
    var a = $('#pgwNama').val();
    var b = $('#pgwTglLahir').val();
    var c = $('#pgwTelp').val();
    if(a==""){
        alert('Ops. nama pegawai harus di isi.');
        $('#pgwNama').focus();
    }else if(b==""){
        alert('Ops. tanggal lahir harus di isi.');
        $('#pgwTglLahir').focus();
    }else if(c==""){
        alert('Ops. no telp harus di isi.');
        $('#pgwTelp').focus();
    }else{
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/pegawai/simpan' ?>",
            type        : "POST",
            data        : $('#form1').serialize(),
            dataType    : "JSON",
            success     : function(data){
                alert(data.message);
                if(data.code==200){
                    $('#NRP').val('');
                    $('#NIP').val('');
                    $('#pgwNama').val('');
                    $('#pgwPria').prop('checked',true);
                    $('#pgwTmpLahir').val('');
                    $('#pgwTglLahir').val('');
                    $('#pgwAgama').prop('selectedIndex',0);
                    $('#pgwAlmt').val('');
                    $('#pgwTelp').val('');
                    $('#profId').prop('selectedIndex',0);
                    $('#userStatus').prop('selectedIndex',0);
                }else if(data.code==201){
                    var url = '<?php echo base_url().'administrator.php/pegawai' ?>';
                    window.location.href = url;
                }  
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);                    
            }
        });
    }
} 
</script>
