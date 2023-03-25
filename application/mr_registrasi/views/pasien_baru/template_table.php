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
    }
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>

<section class="content container-fluid">
    
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p><i class="icon fa fa-info"></i> Data Pasien</p>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="#" id="btnRefresh" class="btn btn-default">
                            <i class="glyphicon glyphicon-refresh"></i> Refresh
                        </a>
                    </h3>

                    <div class="box-tools">
                        <div class="input-group" style="width: 250px;">
                            <span class="input-group-addon">
                            <label><input type="checkbox" id="rme" name="rme" value="1"> ERM</label>
                            </span>
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter No MR / No KTP / Nama Pasien Baru" style="width: 250px"/>
                            <div class="input-group-btn">
                                <button type="button" id="btnKeyword" class="btn btn-primary">
                                    <i class="fa fa-search"></i></button>
                                <button type="button" id="btnInquery" class="btn btn-primary">Inquery</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 100px">No.MR</th>
                                <th style="width: 100px">No KTP</th>
                                <th>Nama Pasien</th>
                                <th style="width: 80px">Jenis Kelamin</th>
                                <th style="width: 80px">DOB</th>
                                <th>Alamat</th>
                                <th style="width: 80px">Terdaftar</th>
                                <th style="width: 200px">Action</th>
                            </tr>    
                        </thead>
                        <tbody id="getdata">
                            <tr>
                                <td colspan="9">Silahkan Enter No.MR/No.KTP/Nama Pasien untuk mencari pasien</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- modal Inquery -->
<div class="modal fade" id="modalInquery" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pencarian Berdasarkan Filter</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Nama Pasien</td>
                        <td>
                            <input name="Inq_nama" id="Inq_nama" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>Tgl. Lahir</td>
                        <td>
                            <input name="Inq_dob" id="Inq_dob" class="form-control" style="width: 100px" placeholder="__/__/____" />
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="fa fa-power-off"></i> Tutup</button>

                            <button type="button" class="btn btn-danger" name="btnSearchInquery" id="btnSearchInquery">
                                <i class="fa fa-search"></i> Cari</button>
                        </td>
                    </tr>
                </table>
            </div>
            
        </div>
    </div>
</div>

<!-- modal cetak -->
<div class="modal fade" id="modalCetak" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <form id="formModalCetak" role="form" onsubmit="return false">
                    <input type="hidden" name="ctkNOMR" id="ctkNOMR" />
    <button class="btn btn-primary btn-block" onclick="cetakKartu()">Cetak Kartu</button>
    <button class="btn btn-primary btn-block" onclick="cetakStiker()">Cetak Stiker</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/popper/popper.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/tooltip/tooltip.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script type="text/javascript">
$(document).ready(function () { 
    $('input').focus(function(){
        return $(this).select();
    });
    $('#Inq_dob').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    $('#btnInquery').click(function(){
        $('#Inq_nama').val('');
        $('#Inq_dob').val('');
        $('#modalInquery').modal('show');
    });
    $('#Inq_nama').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            $('#Inq_dob').focus();
        }
    });
    $('#Inq_dob').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            $('#btnSearchInquery').click();
        }
    });
    $('#btnSearchInquery').click(function(){
        var a = $('#Inq_nama').val(); 
        var b = $('#Inq_dob').val();
        
        $.ajax({
            url         : "<?php echo base_url().'mr_registrasi.php/pasien_baru/getView' ?>",
            type        : "POST",
            data        : {keyNama:a,keyDob:b,method:'Inquery'},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=9>Loading... Please wait</td></tr>");
            },
            success : function(data){
                $('tbody#getdata').html(data);
                $('#modalInquery').modal('hide');
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);
            }
        });            
    });

    $('.tanggal').datepicker({
      autoclose : true,
      format    : "dd-mm-yyyy"
    })
    
    $('#btnTambah').click(function(){
        var url = '<?php echo base_url().'mr_registrasi.php/pasien_baru/tambah' ?>';
        window.location.href = url;
    });
    
    $('#btnRefresh').click(function(){
        window.location.reload();
    });


    $('#keyword').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            var x = $('#keyword').val();
            if(x == ''){
                alert('Keyword tidak boleh kosong');
                $(this).focus();
            }else{
                var c = $('#rme').prop('checked');
                var rme=c==true?1:0;
                $.ajax({
                    url         : "<?php echo base_url().'mr_registrasi.php/pasien_baru/getView' ?>",
                    type        : "POST",
                    data        : {sLike:$(this).val(),rme:rme},
                    beforeSend  : function(){
                        $('tbody#getdata').html("<tr><td colspan=3>Loading... Please wait</td></tr>");
                    },
                    success : function(data){
                        $('tbody#getdata').html(data);
                    },
                    error : function(jqXHR,ajaxOption,errorThrown){
                        console.log(jqXHR.responseText);
                    }
                });                            
            }
        }
    });
    $('#btnKeyword').click(function(){
        var x = $('#keyword').val();
        var c = $('#rme').prop('checked');
        var rme=c==true?1:0;
        var x = $('#keyword').val();
        if(x == ''){
            alert('Keyword tidak boleh kosong');
            $(this).focus();
        }else{
            $.ajax({
                url         : "<?php echo base_url().'mr_registrasi.php/pasien_baru/getView' ?>",
                type        : "POST",
                data        : {sLike:x,rme:rme},
                beforeSend  : function(){
                    $('tbody#getdata').html("<tr><td colspan=3>Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('tbody#getdata').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    console.log(jqXHR.responseText);
                }
            });                        
        }
    });
    $('#rme').click(function(){
        var c = $('#rme').prop('checked');
        var rme=c==true?1:0;
        // alert(rme);
        var x = $('#keyword').val();
        $.ajax({
            url         : "<?php echo base_url().'mr_registrasi.php/pasien_baru/getView' ?>",
            type        : "POST",
            data        : {sLike:x,rme:rme},
            beforeSend  : function(){
                $('tbody#getdata').html("<tr><td colspan=3>Loading... Please wait</td></tr>");
            },
            success : function(data){
                $('tbody#getdata').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);
            }
        });    
    });
    
});
getTable();

function getTable(){
    var c = $('#rme').prop('checked');
    var rme=c==true?1:0;
    // alert(rme);
    var x = $('#keyword').val();
    $.ajax({
        url : "<?php echo base_url().'mr_registrasi.php/pasien_baru/getView' ?>",
        type        : "POST",
        data        : {sLike:x,rme:rme},
        beforeSend  : function(){
            $('tbody#getdata').html("<tr><td colspan=9>Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('tbody#getdata').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);
        }
    });            
}

function history(a){
    var url = '<?php echo base_url().'mr_registrasi.php/pasien_baru/lihatDetail/' ?>' + a;
    window.location.href = url;
}
function edit(a){
    var url = '<?php echo base_url().'mr_registrasi.php/pasien_baru/tambah/' ?>' + a;
    window.location.href = url;
}
function cetak(a){
    $('#ctkNOMR').val(a);
    $('#modalCetak').modal('show');
}
function cetakKartu(){
    var a = $('#ctkNOMR').val();
    var url = '<?php echo base_url().'mr_registrasi.php/pasien_baru/cetakKartu?kode=' ?>' + a;
    openInNewTab(url);
}
function cetakStiker(){
    var a = $('#ctkNOMR').val();
    var url = '<?php echo base_url().'mr_registrasi.php/pasien_baru/cetakStiker?kode=' ?>' + a;
    openInNewTab(url);
}
function openInNewTab(url) {
    var win = window.open(url, '_blank');
    win.focus();
}  
</script>
</body>
</html>