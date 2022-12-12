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
        <div class=" col-md-6 col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border"></div>
                <div class="box-body">
                    <form id="form1" role="form" onsubmit="return false">
                        <div class="form-group">
                            <label>Password lama <span style="color: red"> * </span></label> 
                            <input type="password" class="form-control" name="oldPass" id="oldPass">
                        </div>   
                        <div class="form-group">
                            <label>Password baru</label>
                            <input type="password" class="form-control" name="newPass" id="newPass">
                        </div>   
                        <div class="form-group">
                            <label>Ulangi password <span style="color: red"> * </span></label>
                            <input type="password" class="form-control" name="reNewPass" id="reNewPass">
                        </div> 
                        <div class="form-group">
                            <button type="button" class="btn btn-danger" id="ubahPass">Ubah Password</button>
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
    $('input').val('');
    $('#ubahPass').click(function(){
        var a = $('#oldPass').val();
        var b = $('#newPass').val();
        var c = $('#reNewPass').val();

        if(a==''){
            alert('Password lama tidak boleh kosong.');
            $('#oldPass').focus();
        }else if(b == ''){
            alert('Password baru tidak boleh kosong.');
            $('#newPass').focus();
        }else if(b != c){
            alert('Ulangi password harus sama dengan password baru.');
            $('#reNewPass').focus();
        }else{
            $.ajax({
                url         : "<?php echo base_url().'mr_dokumen.php/users/ubahPass' ?>",
                type        : "POST",
                data        : $('#form1').serialize(),
                dataType    : "JSON",
                success     : function(data){
                    if(data.code==200){
                        var url = '<?php echo base_url().'mr_dokumen.php/login/logout' ?>';
                        window.location.href = url;
                    }else{
                        alert(data.message);
                    }  
                },
                error       : function(jqXHR,ajaxOption,errorThrown){
                    console.log(jqXHR.responseText);
                }
            });            
        }
    });
});   
</script>