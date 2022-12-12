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
    .rataTengah{text-align: center;}
    .rataKanan{text-align: right;}
    .f15{font-size: 15px;}
    .f20{font-size: 20px;}
    .f20{font-size: 20px;}
    .w10{width: 10px;}
    .w50{width: 50px;}
    .w60{width: 60px;}
    .w70{width: 70px;}
    .w80{width: 80px;}
    .w90{width: 90px;}
    .w100{width: 100px;}
    .w110{width: 110px;}
    .w120{width: 120px;}
    .w130{width: 130px;}
    .w140{width: 140px;}
    .w150{width: 150px;}
    .w160{width: 160px;}
    .w170{width: 170px;}
    .w180{width: 180px;}
    .w190{width: 190px;}
    .w200{width: 200px;}
    .w210{width: 210px;}
    .w220{width: 220px;}
    .w230{width: 230px;}
    .w240{width: 240px;}
    .w250{width: 250px;}
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
</section>
<section class="content container-fluid">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Informasi</h4>
        Data pengembalian status pasien
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="#" id="btnTambah" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                        <a href="#" id="btnRefresh" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
                    </h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" id="keyword" name="keyword" class="form-control pull-right" placeholder="Enter Kode Rekap" style="width: 200px"/>
                            <div class="input-group-btn">
                                <button type="button" id="btn_keyword" class="btn btn-primary">
                                    <i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="w120 ">Kode</th>
                                <th class="w150 ">Tgl.Rekap</th>
                                <th class="">User Rekap</th>
                                <th class="w120 ">Jml Dokumen</th>
                                <th class="w250 ">Action</th>
                            </tr>    
                        </thead>
                        <tbody id="getdata"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function () { 
    getTable();
    $('.tanggal').datepicker({
      autoclose : true,
      format    : "dd/mm/yyyy"
    });
    $('#btnTambah').click(function(){
        var url = '<?php echo base_url().'mr_dokumen.php/status_kembali/tambah' ?>';
        window.location.href = url;
    });
    $('#btnRefresh').click(function(){
        getTable();
    });
    $('#keyword').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            $.ajax({
                url         : "<?php echo base_url().'mr_dokumen.php/status_kembali/getView' ?>",
                type        : "POST",
                data        : {sLike:$(this).val()},
                beforeSend  : function(){
                    $('tbody#getdata').html("<tr><td colspan=5><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('tbody#getdata').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(errorThrown);
                }
            });            
        }
    });
    $('#btn_keyword').click(function(){
        var a = $('#keyword').val();
        if(a == ""){
            alert("Keyword masih kosong");
        }else{
            $.ajax({
                url         : "<?php echo base_url().'mr_dokumen.php/status_kembali/getView' ?>",
                type        : "POST",
                data        : {sLike:a},
                beforeSend  : function(){
                    $('tbody#getdata').html("<tr><td colspan=5><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('tbody#getdata').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(errorThrown);
                }
            });
        }            
    });
    
});

// Function
function getTable(){
    $.ajax({
url : "<?php echo base_url().'mr_dokumen.php/status_kembali/getView' ?>", 
        beforeSend  : function(){
            $('tbody#getdata').html("<tr><td colspan=3><i class='fa fa-spin fa-refresh'></i> Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('tbody#getdata').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            alert(errorThrown);
        }
    });            
}
function edit(a){
    var url = '<?php echo base_url().'mr_dokumen.php/status_kembali/tambah/' ?>'+a;
    window.location.href = url;
}
function hapus(a){
    var x = confirm("Apakah anda yakin akan menghapus record ini?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'mr_dokumen.php/status_kembali/hapus' ?>",
            type        : "POST",
            data        : {idx:a},
            dataType    : "JSON",
            success     : function(data){
                alert(data.message);    
                if(data.code==200){
                    getTable();
                }
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);                    
                alert(jqXHR.responseText);
            }
        });
    }
}
function cetakNota(a){
    var url = '<?php echo base_url().'mr_dokumen.php/status_kembali/cetak?kode=' ?>'+a;
    window.open(url);    
}
</script>
