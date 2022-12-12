<div id="NotaTagihanApp">
    <div class="post">
        <div class="box-header" style="background: #3c8dbc;color: #ffffff">
            <h4>Data pegawai yang diizinkan mengakses Aplikasi Nota Tagihan / Billing</h4>
        </div>
        <div class="box-header with-border">
            <h3 class="box-title">
                <a href="#" id="btnTambahNotaTagihanApp" class="btn btn-default">
                    <i class="glyphicon glyphicon-plus"></i> Tambah</a>
                <a href="#" id="btnRefreshNotaTagihanApp" class="btn btn-default">
                    <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
            </h3>

            <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 200px;">
                    <input type="text" id="keywordNotaTagihanApp" name="keywordNotaTagihanApp" class="form-control pull-right" placeholder="Enter NRP / Nama" style="width: 200px"/>
                    <div class="input-group-btn">
                        <button type="button" id="btnKeywordNotaTagihanApp" class="btn btn-primary">
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
                        <th>Hak Akses</th>
                        <th>Level</th>
                        <th style="width: 250px">Action</th>
                    </tr>    
                </thead>
                <tbody id="getDataNotaTagihanApp"></tbody>
            </table>
        </div>
    </div>        
</div>

<div class="modal fade" id="formModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pilih Ruang Akses</h4>
            </div>
            <div class="modal-body">
                
                <form id="form1" role="form" onsubmit="return false">
                    <div class="box-body">
                        <div class="col-md-12">
                            <input type="hidden" name="NRP" id="NRP" />
                            <table class="table table-bordered">
                                <thead>
                                    <th><input type="checkbox" name="chkAll" id="chkAll" /></th>
                                    <th># - Nama Ruang / Poli / Penunjang / Lainnya</th>
                                    <th>Group</th>
                                </thead>
                                <tbody id="getDataRuang"></tbody>
                            </table>
                        </div>                           
                    </div>
                </form>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" id="submit" class="btn btn-primary" onclick="simpanRuang()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function () { 
    getTableNotaTagihanApp();
    $('#btnTambahNotaTagihanApp').click(function(){
        var url = '<?php echo base_url().'administrator.php/app_users/tambahNotaTagihanApp' ?>';
        window.location.href = url;
    });
    $('#btnRefreshNotaTagihanApp').click(function(){
        $('#keywordNotaTagihanApp').val('');
        getTableNotaTagihanApp();
    });
    $('#keywordNotaTagihanApp').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            $.ajax({
                url         : "<?php echo base_url().'administrator.php/app_users/getViewNotaTagihanApp' ?>",
                type        : "POST",
                data        : {sLike:$(this).val()},
                beforeSend  : function(){
                    $('tbody#getDataNotaTagihanApp').html("<tr><td colspan=5>Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('tbody#getDataNotaTagihanApp').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    console.log(jqXHR.responseText);
                }
            });            
        }
    });
    $('#btnKeywordNotaTagihanApp').click(function(){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/app_users/getViewNotaTagihanApp' ?>",
            type        : "POST",
            data        : {sLike:$('#keywordNotaTagihanApp').val()},
            beforeSend  : function(){
                $('tbody#getDataNotaTagihanApp').html("<tr><td colspan=5>Loading... Please wait</td></tr>");
            },
            success : function(data){
                $('tbody#getDataNotaTagihanApp').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);
            }
        });            
    });
    
});

// Admin App
function getTableNotaTagihanApp(){
    $.ajax({
        url : "<?php echo base_url().'administrator.php/app_users/getViewNotaTagihanApp' ?>",
        beforeSend  : function(){
            $('tbody#getDataNotaTagihanApp').html("<tr><td colspan=5>Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('tbody#getDataNotaTagihanApp').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);
        }
    });            
}
function deleteNotaTagihanApp(a){
    var x = confirm("Apakah anda yakin akan menghapus record ini?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/app_users/hapusNotaTagihanApp' ?>",
            type        : "POST",
            data        : {NRP:a},
            dataType    : "JSON",
            success     : function(data){
                alert(data.message);    
                if(data.code==200){
                    getTableNotaTagihanApp();
                }
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);                    
            }
        });
    }
}
function getRuang(nrp){
    $('#NRP').val(nrp);
    $.ajax({
        url         : "<?php echo base_url().'administrator.php/app_users/getViewRuangNotaTagihanApp' ?>",
        type        : "POST",
        data        : {NRP:nrp},
        beforeSend  : function(){
            $('tbody#getDataRuang').html("<tr><td colspan=3>Loading... Please wait</td></tr>");
        },
        success     : function(data){
            $('tbody#getDataRuang').html(data);
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);
        }
    }); 
    $('#formModal').modal('show');
}
$('#chkAll').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    }else{
        $(':checkbox').each(function() {
            this.checked = false;                        
        });
    }
});
function simpanRuang(){
    $.ajax({
        url         : "<?php echo base_url().'administrator.php/app_users/simpanRuangNotaTagihanApp' ?>",
        type        : "POST",
        data        : $('#form1').serialize(),
        dataType    : "JSON",
        success     : function(data){
            getTableNotaTagihanApp();
            alert(data.message); 
            $('#formModal').modal('hide');   
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);                    
        }
    });
}
</script>