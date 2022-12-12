<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo getAppName() ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.css"/>
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css"/>
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/skin-green.css"/>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- Google Font Offline -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/fonts.googleapis/fonts.css" type="text/css">
</head>
<style type="text/css">
#btnStop{
    display: none;
}
</style>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
    <?php echo $header; ?>
    
    <aside class="main-sidebar">
        <?php echo $nav_sidebar; ?>
    </aside>
    
    <div class="content-wrapper">

<section class="content-header">
    <h1><?php echo $contentTitle ?></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $breadcrumbTitle ?></a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content container-fluid">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-info"></i> Informasi</h4>
        Proses ini hanya untuk menghilangkan stok minus dan memindahkan ke stok dengan harga modal dan tanggal expire terlama. 
    </div>

    <div class="row">
        <div class="col-lg-12 col-xs-6">

<button type="button" class="btn btn-default btn-lrg ajax" id="btnSubmit">
    <i class="fa fa-gear"></i> Proses Balance Stok Min</button>
<button type="button" class="btn btn-default btn-lrg ajax" id="btnKill">
    <i class="fa fa-gear"></i> Kill All Process</button>
        </div>

        
    </div>
</section>

    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs"><?php echo getVersion() ?></div>
        <?php echo getFooter() ?>
    </footer>

    <div class="control-sidebar-bg"></div>
</div>

<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    getdate();

    $('#btnSubmit').click(function(){
        $.ajax({
            url         : "<?php echo base_url().'farmasi.php/balance_stok_min/submit_balance' ?>",
            type        : "POST",
            data        : $('#form1').serialize(),
            dataType    : "JSON",
            beforeSend  : function(){
$('#btnSubmit').html('<i class="fa fa-spin fa-refresh"></i> Silahkan Tunggu... System sedang mengkoreksi stok');
$("#btnSubmit").prop('disabled', true); 
            },
            success     : function(data){
                alert(data.message);
$('#btnSubmit').html('<i class="fa fa-gear"></i> Proses Balance Stok Min');
$("#btnSubmit").prop('disabled', false); 
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);                    
$('#btnSubmit').html('<i class="fa fa-gear"></i> Proses Balance Stok Min');
$("#btnSubmit").prop('disabled', false); 
                alert(errorThrown);
            }
        });  
    });



    $('#btnKill').click(function(){
        $.ajax({
            url         : "<?php echo base_url().'farmasi.php/balance_stok_min/kill_process' ?>",
            type        : "POST",
            data        : $('#form1').serialize(),
            dataType    : "JSON",
            beforeSend  : function(){
$('#btnKill').html('<i class="fa fa-spin fa-refresh"></i> Silahkan Tunggu... System sedang menutup proses yang berjalan');
$("#btnKill").prop('disabled', true); 
            },
            success     : function(data){
                alert(data.message);
$('#btnKill').html('<i class="fa fa-gear"></i> Kill All Process');
$("#btnKill").prop('disabled', false); 
            },
            error       : function(jqXHR,ajaxOption,errorThrown){
                console.log(jqXHR.responseText);                    
$('#btnKill').html('<i class="fa fa-gear"></i> Kill All Process');
$("#btnKill").prop('disabled', false); 
                alert(errorThrown);
            }
        });  
    });    

});

function getdate() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    if (h < 10) {
        h = "0" + h;
    }
    if (m < 10) {
        m = "0" + m;
    }
    if (s < 10) {
        s = "0" + s;
    }

    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agus', 'Sep', 'Okt', 'Nov', 'Des'];
    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    var thisDay = date.getDay(),
        thisDay = myDays[thisDay];
    var yy = date.getYear();
    var year = (yy < 1000) ? yy + 1900 : yy;

    var tgl = ("&nbsp;" + thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
    var jam = (h + ":" + m + ":" + s + " WIB");
    $("#timer").html(tgl + ' ' + jam);
    setTimeout(function () { getdate() }, 1000);
}
</script>
</body>
</html>