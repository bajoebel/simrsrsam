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
                <div class="box-body">                     
                    <div class="alert alert-danger alert-dismissible">
                        <p>Cari dan pilih pegawai yang akan diizinkan mengakses Aplikasi Kasir</p>
                    </div> 

                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <a href="#" id="btnKembali" class="btn btn-default">
                                <i class="glyphicon glyphicon-new-window"></i> Kembali</a>
                        </h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 200px;">
                                <input type="text" id="keywordKasirApp" name="keywordKasirApp" class="form-control pull-right" placeholder="Enter NRP / Nama" style="width: 200px"/>
                                <div class="input-group-btn">
                                    <button type="button" id="btnKeywordKasirApp" class="btn btn-primary">
                                        <i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 100px">#</th>
                                    <th style="width: 100px">NRP</th>
                                    <th>Pegawai</th>
                                    <th>Jenis Kelamin</th>
                                    <th>DOB</th>
                                    <th>Profesi</th>
                                    <th style="width: 100px">Action</th>
                                </tr>    
                            </thead>
                            <tbody id="getSelectKasirApp">
                                <tr>
                                    <td colspan="7">Data kosong</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
        
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
    getTableKasirApp();
    $('#btnKembali').click(function(){
        var url = '<?php echo base_url().'administrator.php/app_users' ?>';
        window.location.href = url;
    });
    $('#keywordKasirApp').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            $.ajax({
                url         : "<?php echo base_url().'administrator.php/app_users/getSelectViewKasirApp' ?>",
                type        : "POST",
                data        : {sLike:$(this).val()},
                beforeSend  : function(){
                    $('tbody#getSelectKasirApp').html("<tr><td colspan=4>Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('tbody#getSelectKasirApp').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(jqXHR.responseText);
                }
            });            
        }
    });
    $('#btnKeywordKasirApp').click(function(){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/app_users/getSelectViewKasirApp' ?>",
            type        : "POST",
            data        : {sLike:$('#keywordKasirApp').val()},
            beforeSend  : function(){
                $('tbody#getSelectKasirApp').html("<tr><td colspan=4>Loading... Please wait</td></tr>");
            },
            success : function(data){
                $('tbody#getSelectKasirApp').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                alert(jqXHR.responseText);
            }
        });            
    });
    
});

function pilihKasirApp(a){
    $.ajax({
        url         : "<?php echo base_url().'administrator.php/app_users/pilihKasirApp' ?>",
        type        : "POST",
        data        : {NRP:a},
        dataType    : "JSON",
        success     : function(data){
            alert(data.message);    
            if(data.code==200){
                getTableKasirApp();
            }
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);                    
            alert(jqXHR.responseText);
        }
    });
}
// Function
function getTableKasirApp(){
    $.ajax({
        url         : "<?php echo base_url().'administrator.php/app_users/getSelectViewKasirApp' ?>",
        type        : "POST",
        data        : {sLike:""},
        beforeSend  : function(){
            $('tbody#getSelectKasirApp').html("<tr><td colspan=4>Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('tbody#getSelectKasirApp').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            alert(jqXHR.responseText);
        }
    });            
}   
</script>
