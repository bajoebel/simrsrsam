<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo getAppName() ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.css"/>
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css"/>
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/select2/dist/css/select2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/skin-blue.css"/>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- Google Font Offline -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/fonts.googleapis/fonts.css" type="text/css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php echo $header; ?>

    <aside class="main-sidebar">
    <?php echo $nav_sidebar; ?>
    </aside>

    <div class="content-wrapper">

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
    .modal-content {max-height: 600px;}
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
    .w300{width: 300px;}
    .w350{width: 350px;}
    .w400{width: 400px;}
    .w450{width: 450px;}
    input{border: none;}
    #convNilai{font-size: 20px}
    table#titleRekap tr td{padding: 2px}
</style>
<section class="content-header">
    <h1><?php echo $contentTitle ?> </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $breadcrumbTitle ?></a></li>
        <li class="active">Index</li>
    </ol>
</section>

<section class="content container-fluid">
    
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Informasi</h4>
        Menyegerakan pengentrian data tagihan layanan dapat menghindari system menolak entrian tagihan pasien yang telah dipulangkan.
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
<div class="box-header with-border">
    <h3 class="box-title">
        <a href="#" id="btnKembali" class="btn btn-danger">
            <i class="glyphicon glyphicon-new-window"></i> Kembali</a>
        <a href="#" id="btnRefresh" class="btn btn-success">
            <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
        <a href="#" id="btnCetak" class="btn btn-danger">
            <i class="glyphicon glyphicon-print"></i> Cetak Rekap Pengembalian Status</a>
    </h3>
</div>


<div class="box-body table-responsive no-padding">
    <form id="formItem" action="#" method="post" onsubmit="return false">
    <div style="padding: 10px">
        <h4>
            <table id="titleRekap">
                <tr>
                    <td class="w120">Kode Rekap</td>
                    <td class="w10">:</td>
                    <td>
<input readonly="" type="text" class="form-control" name="txtIdKembali" id="txtIdKembali" value="<?php echo $idx ?>">
                    </td>
                </tr>
                <tr>
                    <td>Tgl.Rekap</td>
                    <td>:</td>
                    <td>
<input readonly="" type="text" class="form-control" name="txtTglRekap" id="txtTglRekap" value="<?php echo $tgl_kembali ?>">
                    </td>
                </tr>
            </table>
        </h4>
    </div>

    
    <table class="table table-bordered">
        <tr>
            <th class="w120">
                <input readonly="" type="text" class="form-control" name="txtNoRegRS" id="txtNoRegRS" placeholder="No.Reg RS">
                <input type="hidden" name="txtNoRegUnit" id="txtNoRegUnit">
            </th>
            <th class="w120">
                <input readonly="" type="text" class="form-control" name="txtNoMR" id="txtNoMR" placeholder="No.MR">
            </th>
            <th>
                <input type="text" class="form-control" name="txtNama" id="txtNama" placeholder="Enter No.Reg RS/No.MR/Nama">
            </th>
            <th class="w200">
                <input readonly="" type="text" class="form-control"name="txtRuang" id="txtRuang" placeholder="Tempat Layanan">
            </th>
            <th class="w120">
                <input readonly="" type="text" class="form-control tanggal"name="txtTglKembali" id="txtTglKembali">
            </th>
            <th class="w220">
                <input type="text" class="form-control" name="txtKeterangan" id="txtKeterangan" placeholder="Keterangan">
            </th>
            <th class="w60">
                <a href="#" onclick="simpanItemStatus()" class="btn btn-danger btn-block">
                    <i class="fa fa-floppy-o"></i></a>
            </th>
        </tr>
    </table>
    </form>
</div>

<div class="box-body table-responsive no-padding">
    <div id="divCariPasien" style="display: none;padding: 10px">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="5">
                        <button class="btn btn-danger" id="closeDivCariPasien">Tutup</button>
                    </th>
                </tr>
                <tr>
                    <th class="rataTengah w150">No. Reg RS</th>
                    <th class="rataTengah w100">No. MR</th>
                    <th class="">Nama Pasien</th>
                    <th class="rataTengah w200">Tempat Layanan</th>
                    <th class="rataTengah w250">Aksi</th>
                </tr>
            </thead>
            <tbody id="getPasien"></tbody>
        </table>
    </div>
</div>

<div class="box-body table-responsive no-padding">
    <div class="divDetailItem" style="display: block">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="rataTengah w60">#</th>
                    <th class="rataTengah w100">No.Reg RS</th>
                    <th class="rataTengah w100">No.MR</th>
                    <th class="">Nama Pasien</th>
                    <th class="w200">Tempat Layanan</th>
                    <th class="rataTengah w100">Tgl.Pengembalian</th>
                    <th class="w250">Keterangan</th>
                    <th class="rataTengah w60">Aksi</th>
                </tr>
            </thead>
            <tbody id="getPengembalianStatus"></tbody>
        </table>
    </div>
</div>

            </div>
        </div>
    </div>  
</section>
        
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs"><?php echo getVersion(); ?></div>
        <?php echo getFooter(); ?>
    </footer>

    <div class="control-sidebar-bg"></div>
</div>


<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/bower_components/select2/dist/js/select2.full.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>assets/bower_components/inputmask/dist/jquery.inputmask.bundle.js"></script>

<!-- date-range-picker -->
<script src="<?php echo base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>

<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php //echo base_url().'assets/dist/js/demo.js' ?>"></script>
<!-- Main Function -->
<script src="<?php echo base_url() ?>assets/js/function.js"></script>

<script type="text/javascript">
$(document).ready(function () { 
    $('#txtTglKembali').val('<?php echo date('d/m/Y') ?>');
    var id_kembali = '<?php echo $idx ?>';
    $('#btnKembali').click(function(){
        var url = '<?php echo base_url().'mr_dokumen.php/status_kembali' ?>';
        window.location.href = url;    
    });
    $('#btnRefresh').click(function(){
        window.location.reload();    
    });
    $('#btnCetak').click(function(){
        var a = $('#txtIdKembali').val();
        if(a == ""){
            alert("Kode rekap tidak boleh kosong");
        }else{
            $.ajax({
                url         : "<?php echo base_url().'mr_dokumen.php/status_kembali/cekRekap' ?>",
                type        : "POST",
                data        : {id_kembali:a},
                dataType    : "JSON",
                success : function(data){
                    if(data.error){
                        alert(data.message);
                    }else{
                        var url = '<?php echo base_url().'mr_dokumen.php/status_kembali/cetak?kode=' ?>'+a;
                        window.open(url);  
                    }
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(jqXHR.responseText);
                }
            }); 
        }
    });
    $('.tanggal').datepicker({
      autoclose : true,
      format    : "dd/mm/yyyy"
    })
    getStatusKembali(id_kembali);
    $('input').focus(function(){
        return this.select();
    });
    $('#txtTglKembali').blur(function(){
        if($(this).val() == ""){
            $(this).val('<?php echo date('d/m/Y') ?>');
        }
    });
    $('#closeDivCariPasien').click(function(){
        $('#divCariPasien').hide();
    });
    $('#txtNama').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            var a = $(this).val();
            if(a == ""){
                alert("Keyword masih kosong");
                $('#txtNama').focus();
            }else{
                $.ajax({
                    url         : "<?php echo base_url().'mr_dokumen.php/status_kembali/getPasien' ?>",
                    type        : "POST",
                    data        : {sLike:a},
                    beforeSend  : function(){
                        $('tbody#getPasien').html("<tr><td colspan=10>Loading... Please wait</td></tr>");
                    },
                    success : function(data){
                        $('tbody#getPasien').html(data);
                        $('#divCariPasien').show();
                    },
                    error : function(jqXHR,ajaxOption,errorThrown){
                        alert(jqXHR.responseText);
                    }
                }); 
            } 
        }
    });
    $('#txtKeterangan').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            simpanItemStatus();
        }
    });
    
});
function getStatusKembali(a){
    $.ajax({
        url         : "<?php echo base_url().'mr_dokumen.php/status_kembali/getPengembalianStatus' ?>",
        type        : "POST",
        data        : {id_kembali:a},
        beforeSend  : function(){
            $('tbody#getPengembalianStatus').html("<tr><td colspan=10>Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('tbody#getPengembalianStatus').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            alert(jqXHR.responseText);
        }
    });            
}
function pilihKunjungan(a,b,c,d,e){
    $('#txtNoRegRS').val(a);
    $('#txtNoRegUnit').val(b);
    $('#txtNoMR').val(c);
    $('#txtNama').val(d);
    $('#txtRuang').val(e);
    $('#txtTglKembali').val('<?php echo date('d/m/Y') ?>');
    $('#txtKeterangan').focus();
}
function simpanItemStatus(){
    var a = $('#txtIdKembali').val();
    var b = $('#txtNoRegRS').val();
    var c = $('#txtNoRegUnit').val();
    var d = $('#txtNoMR').val();
    var e = $('#txtNama').val();
    var f = $('#txtRuang').val();
    var g = $('#txtTglKembali').val();
    var h = $('#txtKeterangan').val();
    if(a==""){
        alert('Ops. Kode rekap kosong. Tutup form dan coba ulangi kembali');
    }else if(b==""){
        alert('Ops. No.Reg RS kosong. Pastikan No.Reg RS anda tampil. atau pilih dokumen pasien kembali');
        $('#txtNama').focus();
    }else if(c==""){
        alert('Ops. No.Reg Unit kosong. Pastikan No.Reg Unit anda tampil. atau pilih dokumen pasien kembali');
        $('#txtNama').focus();
    }else if(d==""){
        alert('Ops. No.MR kosong. Pastikan No.MR anda tampil. atau pilih dokumen pasien kembali');
        $('#txtNama').focus();
    }else if(e==""){
        alert('Ops. Nama kosong. Pastikan Nama anda tampil. atau pilih dokumen pasien kembali');
        $('#txtNama').focus();
    }else if(f==""){
        alert('Ops. Lokasi pelayanan kosong. Pastikan lokasi layanan tampil. atau pilih dokumen pasien kembali');
        $('#txtNama').focus();
    }else if(g==""){
        alert('Ops. Tanggal pengembalian berkas kosong. Silahkan isi tanggal pengembalian berkas.');
        $('#txtTglKembali').focus();
    }else if(h==""){
        alert('Ops. Keterangan kosong. Silahkan isi keterangan.');
        $('#txtKeterangan').focus();
    }else{

var postData = {}
postData["id_kembali"] = a;
postData["id_daftar"] = b;
postData["reg_unit"] = c;
postData["nomr"] = d;
postData["tgl_kembali"] = g;
postData["keterangan"] = h;

        $.ajax({
            url         : "<?php echo base_url().'mr_dokumen.php/status_kembali/simpanItem' ?>",
            type        : "POST",
            data        : $.param( postData ),
            dataType    : "JSON",
            success     : function(data){
                $('#divCariPasien').hide();
                if(data.code==200){
                    getStatusKembali(a);
                    $('#txtNoRegRS').val('');
                    $('#txtNoRegUnit').val('');
                    $('#txtNoMR').val('');
                    $('#txtNama').val('');
                    $('#txtRuang').val('');
                    $('#txtTglKembali').val('<?php echo date('d/m/Y') ?>');
                    $('#txtKeterangan').val('');
                    $('#txtNama').focus();
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
}  
function cetakNota(a){
    var url = '<?php echo base_url().'mr_dokumen.php/status_kembali/cetak?kode=' ?>'+a;
    window.open(url);    
}
function hapusItem(a,b){
    var x = confirm("Apakah anda yakin akan menghapus item ini?");
    if(x){
        $.ajax({
            url         : "<?php echo base_url().'mr_dokumen.php/status_kembali/hapusItem' ?>",
            type        : "POST",
            data        : {idx:a},
            dataType    : "JSON",
            success : function(data){
                if(data.code == 200){
                    getStatusKembali(b);
                }else{
                    alert(data.message);
                }
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                alert(jqXHR.responseText);
            }
        }); 
    }
} 
</script>
</body>
</html>