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
            <?php if ($kode_rs == ""): ?>
            <input type="text" class="form-control" name="kode_rs" id="kode_rs" value="<?php echo $kode_rs ?>" style="width: 300px">
            <?php else: ?>
            <input readonly type="text" class="form-control" name="kode_rs" id="kode_rs" value="<?php echo $kode_rs ?>" style="width: 300px">
            <?php endif ?>
        </div>    
          
        <div class="form-group">
            <label>Nama RS <span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="host_dest" id="host_dest" value="<?php echo $host_dest ?>"> 
        </div>   


    </div>

    <div class="col-md-6">

        <div class="form-group">
            <label>Key Value <span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="key_value" id="key_value" value="<?php echo $key_value ?>">
        </div> 

        <div class="form-group">
            <label>&nbsp;</label>
            <div class="input-group">
                <button type="button" class="btn btn-danger" onclick="simpan()">
                    <i class="glyphicon glyphicon-floppy-disk"></i> <?php echo ($kode_rs=="") ? "Simpan" : "Update" ?></button>
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
    $('input').focus(function(){
        return $(this).select();
    });
});

function simpan(){
    var a = $('#kode_rs').val();
    var b = $('#host_dest').val();
    var c = $('#key_value').val();

    if (a=="") {
        alert("Kode RS harus di isi");
        $("#kode_rs").focus();
    }else if (b=="") {
        alert("Nama RS harus di isi");
        $("#host_dest").focus();
    }else if (c=="") {
        alert("Consumer ID RS harus di isi");
        $("#key_value").focus();
    }else{
        $.ajax({
            url         : "<?php echo base_url().'index.php/setup_config/simpan' ?>",
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

</script>