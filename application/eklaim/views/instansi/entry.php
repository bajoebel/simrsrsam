<style type="text/css">
input[readonly]{
    cursor: not-allowed;
}
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
            <h4><i class="icon fa fa-info"></i> Informasi <?php echo $breadcrumbTitle ?></h4>
        </div> 
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    
                    <div class="box-body">

<form id="form1" role="form" onsubmit="return false">
    <div class="col-md-6">
        <div class="form-group">
            <label>Kode RS <span style="color: red"> * </span></label>
            <?php if ($kode_instansi == ""): ?>
            <input type="text" class="form-control" name="kode_instansi" id="kode_instansi" value="<?php echo $kode_instansi ?>" style="width: 300px">
            <?php else: ?>
            <input readonly type="text" class="form-control" name="kode_instansi" id="kode_instansi" value="<?php echo $kode_instansi ?>" style="width: 300px">
            <?php endif ?>
        </div>    
          
        <div class="form-group">
            <label>Nama RS <span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="nama_instansi" id="nama_instansi" value="<?php echo $nama_instansi ?>"> 
        </div>   

        <div class="form-group">
            <label>Alamat RS <span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="alamat_instansi" id="alamat_instansi" value="<?php echo $alamat_instansi ?>">
        </div> 
                        
        <div class="form-group">
            <label>Kabupaten/Kota <span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="kab_kota" id="kab_kota" value="<?php echo $kab_kota ?>">
        </div> 
                        
        <div class="form-group">
            <label>Kode Pos <span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="kode_pos" id="kode_pos" value="<?php echo $kode_pos ?>">
        </div> 
                        
        <div class="form-group">
            <label>No Telp RS<span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?php echo $no_telp ?>">
        </div> 
                        

    </div>

    <div class="col-md-6">

        <div class="form-group">
            <label>No Fax RS<span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="no_fax" id="no_fax" value="<?php echo $no_fax ?>">
        </div> 

        <div class="form-group">
            <label>Email RS<span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="email" id="email" value="<?php echo $email ?>">
        </div> 
               
        <div class="form-group">
            <label>Direktur RS<span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="direktur" id="direktur" value="<?php echo $direktur ?>">
        </div> 
 
        <div class="form-group">
            <label>Pemilik RS <span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="pemilik_rs" id="pemilik_rs" value="<?php echo $pemilik_rs ?>">
        </div>

        <div class="form-group">
            <label>Kelas RS <span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="kelas_rs" id="kelas_rs" value="<?php echo $kelas_rs ?>">
        </div>

        <div class="form-group">
            <label>Jenis RS <span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="jenis_rs" id="jenis_rs" value="<?php echo $jenis_rs ?>">
        </div>

        <div class="form-group">
            <label>&nbsp;</label>
            <div class="input-group">
                <button type="button" class="btn btn-danger" onclick="simpan()">
                    <i class="glyphicon glyphicon-floppy-disk"></i> <?php echo ($kode_instansi=="") ? "Simpan" : "Update" ?></button>
            </div>
        </div> 
    </div> 
     
</form> 
                    
                    </div>

                </div>
            </div>
        </div>
        
        
    </section>
</div>
<script type="text/javascript">
$(document).ready(function () { 
    $('.tanggal').datepicker({
      autoclose : true,
      format    : "dd/mm/yyyy"
    })
    $('input').focus(function(){
        return $(this).select();
    });
});


function simpan(){
    var a = $('#kode_instansi').val();
    var b = $('#nama_instansi').val();
    var c = $('#alamat_instansi').val();
    var d = $('#kab_kota').val();
    var e = $('#kode_pos').val();
    var f = $('#no_telp').val();
    var g = $('#no_fax').val();
    var h = $('#email').val();
    var i = $('#direktur').val();

    if (a=="") {
        alert("Kode instansi harus di isi");
        $("#kode_instansi").focus();
    }else if (b=="") {
        alert("Nama instansi harus di isi");
        $("#nama_instansi").focus();
    }else if (c=="") {
        alert("Alamat instansi harus di isi");
        $("#alamat_instansi").focus();
    }else if (d=="") {
        alert("Kabupaten/Kota harus di isi");
        $("#kab_kota").focus();
    }else if (e=="") {
        alert("Kode pos harus di isi");
        $("#kode_pos").focus();
    }else if (f=="") {
        alert("Nomor telepon harus di isi");
        $("#no_telp").focus();
    }else if (g=="") {
        alert("Nomor fax  harus di isi");
        $("#no_fax").focus();
    }else if (h=="") {
        alert("Email harus di isi");
        $("#email").focus();
    }else if (i=="") {
        alert("Nama direktur harus di isi");
        $("#direktur").focus();
    }else{
        $.ajax({
            url         : "<?php echo base_url().'index.php/instansi/simpan' ?>",
            type        : "POST",
            data        : $('#form1').serialize(),
            dataType    : "JSON",
            beforeSend  : function(){
                $('span#Response').html("<i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu");
            },
            success     : function(data){
                alert(data.message);
                $('span#Response').html("");
                window.location.reload();
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                $('span#Response').html("");
                console.log(jqXHR.responseText);
            }
        });
    }
}
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>