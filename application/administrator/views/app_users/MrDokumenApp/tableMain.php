<div id="MrDokumenApp">
    <div class="post">
        <div class="box-header" style="background: #3c8dbc;color: #ffffff">
            <h4>Data pegawai yang diizinkan mengakses Aplikasi MR Dokumen</h4>
        </div>
        <div class="box-header with-border">
            <h3 class="box-title">
                <a href="#" id="btnTambahMrDokumenApp" class="btn btn-default">
                    <i class="glyphicon glyphicon-plus"></i> Tambah</a>
                <a href="#" id="btnRefreshMrDokumenApp" class="btn btn-default">
                    <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
            </h3>

            <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 200px;">
                    <input type="text" id="keywordMrDokumenApp" name="keywordMrDokumenApp" class="form-control pull-right" placeholder="Enter NRP / Nama" style="width: 200px"/>
                    <div class="input-group-btn">
                        <button type="button" id="btnKeywordMrDokumenApp" class="btn btn-primary">
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
                        <th>Level</th>
                        <th style="width: 100px">Action</th>
                    </tr>    
                </thead>
                <tbody id="getDataMrDokumenApp"></tbody>
            </table>
        </div>
    </div>        
</div>

<script type="text/javascript">
$(document).ready(function () { 
    getTableMrDokumenApp();
    $('#btnTambahMrDokumenApp').click(function(){
        var url = '<?php echo base_url().'administrator.php/app_users/tambahMrDokumenApp' ?>';
        window.location.href = url;
    });
    $('#btnRefreshMrDokumenApp').click(function(){
        $('#keywordMrDokumenApp').val('');
        getTableMrDokumenApp();
    });
    $('#keywordMrDokumenApp').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            $.ajax({
                url         : "<?php echo base_url().'administrator.php/app_users/getViewMrDokumenApp' ?>",
                type        : "POST",
                data        : {sLike:$(this).val()},
                beforeSend  : function(){
                    $('tbody#getDataMrDokumenApp').html("<tr><td colspan=4>Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('tbody#getDataMrDokumenApp').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(jqXHR.responseText);
                }
            });            
        }
    });
    $('#btnKeywordMrDokumenApp').click(function(){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/app_users/getViewMrDokumenApp' ?>",
            type        : "POST",
            data        : {sLike:$('#keywordMrDokumenApp').val()},
            beforeSend  : function(){
                $('tbody#getDataMrDokumenApp').html("<tr><td colspan=4>Loading... Please wait</td></tr>");
            },
            success : function(data){
                $('tbody#getDataMrDokumenApp').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                alert(jqXHR.responseText);
            }
        });            
    });
    
});

// Admin App
function getTableMrDokumenApp(){
    $.ajax({
        url : "<?php echo base_url().'administrator.php/app_users/getViewMrDokumenApp' ?>",
        beforeSend  : function(){
            $('tbody#getDataMrDokumenApp').html("<tr><td colspan=4>Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('tbody#getDataMrDokumenApp').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            alert(jqXHR.responseText);
        }
    });            
}
function deleteMrDokumenApp(a){
    var x = confirm("Apakah anda yakin akan menghapus record ini?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/app_users/hapusMrDokumenApp' ?>",
            type        : "POST",
            data        : {idx:a},
            dataType    : "JSON",
            success     : function(data){
                alert(data.message);    
                if(data.code==200){
                    getTableMrDokumenApp();
                }
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);                    
                alert(jqXHR.responseText);
            }
        });
    }
}

</script>