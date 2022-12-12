<style type="text/css">
input[readonly]{
    cursor: not-allowed;
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
            <?php echo $breadcrumbTitle ?> Secara Manual
        </div> 
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <a href="#" id="btnRefresh" class="btn btn-default">
                                <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                            <a href="#" id="btnKembali" class="btn btn-default">
                                <i class="glyphicon glyphicon-repeat"></i> Kembali</a>
                            <span id="Response"></span>
                        </h3>
                    </div>
                    
                    <div class="box-body">

<form id="form1" role="form" onsubmit="return false">
    <div class="col-md-6">
        <div class="form-group">
            <label>Kelas Layanan <span style="color: red"> * </span></label>
            <?php if ($kodekelas == ""): ?>
            <select name="kodekelas" id="kodekelas" class="form-control">
                <option value="">Pilih Kelas Layanan</option>
            </select>
            <input type="hidden" name="namakelas" id="namakelas" value="<?php echo $namakelas ?>">
            <?php else: ?>
            <input type="hidden" name="kodekelas" id="kodekelas" value="<?php echo $kodekelas ?>">
            <input readonly type="text" class="form-control" name="namakelas" id="namakelas" value="<?php echo $namakelas ?>" style="width: 300px"> 
            <?php endif ?>
        </div>   

        <div class="form-group">
            <label>Ruang Pelayanan <span style="color: red"> * </span></label>
            <?php if ($koderuang == ""): ?>
            <select name="koderuang" id="koderuang" class="form-control">
                <option value="">Pilih Ruang Pelayanan</option>
                <?php 
                    foreach ($dataruang->result_array() as $x): 
                ?>
                <option <?php 
                    echo ($koderuang==$x['grId']) ? "selected='selected'" : ""; 
                    ?> value="<?php echo $x['grId'] ?>"><?php echo $x['grNama'] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="namaruang" id="namaruang" value="<?php echo $namaruang ?>">
            <?php else: ?>
            <input type="hidden" name="koderuang" id="koderuang" value="<?php echo $koderuang ?>">
            <input readonly type="text" class="form-control" name="namaruang" id="namaruang" value="<?php echo $namaruang ?>" style="width: 300px">
            <?php endif ?>
        </div>    
          
        <div class="form-group">
            <label>Kapasitas <span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="kapasitas" id="kapasitas" value="<?php echo $kapasitas ?>" style="width: 300px" onkeypress="return isNumberKey(event)">
        </div> 
                        
        <div class="form-group">
            <label>Tersedia <span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="tersedia" id="tersedia" value="<?php echo $tersedia ?>" style="width: 300px" onkeypress="return isNumberKey(event)">
        </div> 

    </div>

    <div class="col-md-6">

        <div class="form-group">
            <label>Tersedia Pria <span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="tersediapria" id="tersediapria" value="<?php echo $tersediapria ?>" style="width: 300px" onkeypress="return isNumberKey(event)">
        </div> 
               
        <div class="form-group">
            <label>Tersedia Wanita <span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="tersediawanita" id="tersediawanita" value="<?php echo $tersediawanita ?>" style="width: 300px" onkeypress="return isNumberKey(event)">
        </div> 
 
        <div class="form-group">
            <label>Tersedia Pria Wanita <span style="color: red"> * </span></label>
            <input type="text" class="form-control" name="tersediapriawanita" id="tersediapriawanita" value="<?php echo $tersediapriawanita ?>" style="width: 300px" onkeypress="return isNumberKey(event)">
        </div>

        <div class="form-group">
            <label>&nbsp;</label>
            <div class="input-group">
                <button type="button" class="btn btn-danger" id="btnSubmit" onclick="simpan()">
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
</div>
<script type="text/javascript">
$(document).ready(function () { 
    getKelasRef();
    $('select').select2();
    $('.tanggal').datepicker({
      autoclose : true,
      format    : "dd/mm/yyyy"
    })
    $('input').focus(function(){
        return $(this).select();
    });
    $('#btnRefresh').click(function(){
        window.location.reload();
    });
    $('#btnKembali').click(function(){
        window.location.href = '<?php echo base_url().'index.php/ketersedian_kamar_rs' ?>';
    });

    function getKelasRef(){
        var kodekelas = "<?php echo $kodekelas ?>";
        var disabled = "<?php echo ($kodekelas=="") ? "" : "disabled"; ?>";        
        $.ajax({
            url         : "<?php echo base_url().'index.php/referensi_kamar/getView' ?>",
            dataType    : "JSON",
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=3>Loading... Please wait</td></tr>");
            },
            success : function(data){
                var x = data.response.list;
                console.log(x[0]['kodekelas']);
                var res = "<option "+disabled+" value=''>Pilih Kelas Layanan</option>";
                var a = "";
                for (var i=0 ; i <= x.length - 1; i++) {
                    a = (x[i]['kodekelas'] == kodekelas) ? "selected='selected'" : "";
                    res += "<option "+disabled+" "+a+" value='"+x[i]['kodekelas']+"'>";
                    res += x[i]['namakelas'];
                    res += "</option>";
                }
                $('#kodekelas').html(res);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                alert(jqXHR.responseText);
            }
        });            
    }
    $('#koderuang').change(function(){
        var a = $(this).val();
        var b = $('#koderuang').find(":selected").text();
        if (a=="") {
            $('#namaruang').val("");
        }else{
            $('#namaruang').val(b);
        }
    });
    $('#kodekelas').change(function(){
        var a = $(this).val();
        var b = $('#kodekelas').find(":selected").text();
        if (a=="") {
            $('#namakelas').val("");
        }else{
            $('#namakelas').val(b);
        }
    });

});

function simpan(){
    var a = $('#koderuang').val();
    var b = $('#namaruang').val();
    var c = $('#kodekelas').val();
    var d = $('#namakelas').val();
    var e = $('#kapasitas').val();
    var f = $('#tersedia').val();
    var g = $('#tersediapria').val();
    var h = $('#tersediawanita').val();
    var i = $('#tersediapriawanita').val();

    if (a=="" || b=="") {
        alert("Ruang belum dipilih. Silahkan pilih ruang pelayanan");
    }else if (c=="" || d=="") {
        alert("Kelas belum dipilih. Silahkan pilih kelas layanan");
    }else if (e=="") {
        alert("Kapasitas harus di isi");
        $("#kapasitas").focus();
    }else if (f=="") {
        alert("Tersedia harus di isi");
        $("#tersedia").focus();
    }else if (g=="") {
        alert("Tersedia pria harus di isi");
        $("#tersediapria").focus();
    }else if (h=="") {
        alert("Tersedia wanita harus di isi");
        $("#tersediawanita").focus();
    }else if (i=="") {
        alert("Tersedia pria wanita harus di isi");
        $("#tersediapriawanita").focus();
    }else{
        $.ajax({
            url         : "<?php echo base_url().'index.php/ketersedian_kamar_rs/simpan' ?>",
            type        : "POST",
            data        : $('#form1').serialize(),
            dataType    : "JSON",
            beforeSend  : function(){
                $("#btnSubmit").attr("disabled", true);
                $('span#Response').html("<i class='fa fa-refresh fa-spin'></i> Permintaan sedang diproses... Silahkan ditunggu");
            },
            success     : function(data){
                alert(data.message);
                $("#btnSubmit").attr("disabled", false);
                $('span#Response').html("");
                if (data.code == 200 || data.code == 201) {
                    window.location.href = '<?php echo base_url().'index.php/ketersedian_kamar_rs' ?>';
                }
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                $('span#Response').html("");
                $("#btnSubmit").attr("disabled", false);
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