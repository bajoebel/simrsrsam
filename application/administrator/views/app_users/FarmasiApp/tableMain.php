<div id="FarmasiApp">
    <div class="post">
        <div class="box-header" style="background: #3c8dbc;color: #ffffff">
            <h4>Data pegawai yang diizinkan mengakses Aplikasi Farmasi</h4>
        </div>
        <div class="box-header with-border">
            <h3 class="box-title">
                <a href="#" id="btnTambahFarmasiApp" class="btn btn-default">
                    <i class="glyphicon glyphicon-plus"></i> Tambah</a>
                <a href="#" id="btnRefreshFarmasiApp" class="btn btn-default">
                    <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
            </h3>

            <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 200px;">
                    <input type="text" id="keywordFarmasiApp" name="keywordFarmasiApp" class="form-control pull-right" placeholder="Enter NRP / Nama" style="width: 200px"/>
                    <div class="input-group-btn">
                        <button type="button" id="btnKeywordFarmasiApp" class="btn btn-primary">
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
                <tbody id="getDataFarmasiApp"></tbody>
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
                                    <th>
                                        <input type="checkbox" name="chkAll" id="chkAll" />
                                    </th>
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
    getTableFarmasiApp();
    $('#btnTambahFarmasiApp').click(function(){
        var url = '<?php echo base_url().'administrator.php/app_users/tambahFarmasiApp' ?>';
        window.location.href = url;
    });
    $('#btnRefreshFarmasiApp').click(function(){
        $('#keywordFarmasiApp').val('');
        getTableFarmasiApp();
    });
    $('#keywordFarmasiApp').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            $.ajax({
                url         : "<?php echo base_url().'administrator.php/app_users/getViewFarmasiApp' ?>",
                type        : "POST",
                data        : {sLike:$(this).val()},
                beforeSend  : function(){
                    $('tbody#getDataFarmasiApp').html("<tr><td colspan=5>Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('tbody#getDataFarmasiApp').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(jqXHR.responseText);
                }
            });            
        }
    });
    $('#btnKeywordFarmasiApp').click(function(){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/app_users/getViewFarmasiApp' ?>",
            type        : "POST",
            data        : {sLike:$('#keywordFarmasiApp').val()}, 
            beforeSend  : function(){
                $('tbody#getDataFarmasiApp').html("<tr><td colspan=5>Loading... Please wait</td></tr>");
            },
            success : function(data){
                $('tbody#getDataFarmasiApp').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                alert(jqXHR.responseText);
            }
        });            
    });
    
});

// Admin App
function getTableFarmasiApp(){
    $.ajax({
        url : "<?php echo base_url().'administrator.php/app_users/getViewFarmasiApp' ?>",
        beforeSend  : function(){
            $('tbody#getDataFarmasiApp').html("<tr><td colspan=5>Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('tbody#getDataFarmasiApp').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            alert(jqXHR.responseText);
        }
    });            
}
function deleteFarmasiApp(a){
    var x = confirm("Apakah anda yakin akan menghapus record ini?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/app_users/hapusFarmasiApp' ?>",
            type        : "POST",
            data        : {idx:a},
            dataType    : "JSON",
            success     : function(data){
                alert(data.message);    
                if(data.code==200){
                    getTableFarmasiApp();
                }
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);                    
                alert(jqXHR.responseText);
            }
        });
    }
}


function getRuang(nrp){
    $('#NRP').val(nrp);
    $.ajax({
        url         : "<?php echo base_url().'administrator.php/app_users/getViewRuangFarmasiApp' ?>",
        type        : "POST",
        data        : {NRP:nrp},
        beforeSend  : function(){
            $('tbody#getDataRuang').html("<tr><td colspan=3>Loading... Please wait</td></tr>");
        },
        success     : function(data){
            $('tbody#getDataRuang').html(data);
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            alert(jqXHR.responseText);
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
        url         : "<?php echo base_url().'administrator.php/app_users/simpanRuangFarmasiApp' ?>",
        type        : "POST",
        data        : $('#form1').serialize(),
        dataType    : "JSON",
        success     : function(data){
            if(data.code == 200){
                getTableFarmasiApp();
                $('#formModal').modal('hide');   
            }else{
                alert(data.message);             
            }
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);                    
            alert(jqXHR.responseText);
        }
    });
}

function setLevelFarmasi(nrp,levelid){
    $.ajax({
        url: "<?php echo base_url().'administrator.php/app_users/setlevel' ?>",
        type: "POST",
        data: {
            nrp: nrp,
            levelid : levelid,
            modul   : 4
        },
        dataType: "JSON",
        success: function (data) {
            //alert(data.message);
            if (data.code == 200) {
                getTableFarmasiApp();
            }
        },
        error: function (jqXHR, ajaxOption, errorThrown) {
            console.log(jqXHR.responseText);
            alert(jqXHR.responseText);
        }
    });
}
</script>