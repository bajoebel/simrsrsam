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
<body class="hold-transition skin-blue sidebar-mini">
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
                <li class="active">Index</li>
            </ol>
        </section>

        <section class="content container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                        

                        <div class="box-body">
<div class="alert alert-danger alert-dismissible">
    <h4>Cari dan pilih pegawai yang akan di izinkan mengakses Administrator App </h4>
</div> 

<div class="box-header with-border">
    <h3 class="box-title">
        <a href="#" id="btnKembali" class="btn btn-default">
            <i class="glyphicon glyphicon-new-window"></i> Kembali</a>
    </h3>

    <div class="box-tools">
        <div class="input-group input-group-sm" style="width: 200px;">
            <input type="text" id="keywordAdminApp" name="keywordAdminApp" class="form-control pull-right" placeholder="Enter NRP / Nama" style="width: 200px"/>
            <div class="input-group-btn">
                <button type="button" id="btnKeywordAdminApp" class="btn btn-primary">
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
        <tbody id="getSelectAdminApp">
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
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<!-- Main Function -->
<script src="<?php echo base_url() ?>assets/js/function.js"></script>

<script type="text/javascript">
$(document).ready(function () { 
    getTableAdminApp();
    $('#btnKembali').click(function(){
        var url = '<?php echo base_url().'administrator.php/app_users' ?>';
        window.location.href = url;
    });
    $('#keywordAdminApp').keypress(function(ev){
        var keycode = (ev.keyCode ? ev.keyCode : ev.which);
        if (keycode == '13') {
            $.ajax({
                url         : "<?php echo base_url().'administrator.php/app_users/getSelectViewAdminApp' ?>",
                type        : "POST",
                data        : {sLike:$(this).val()},
                beforeSend  : function(){
                    $('tbody#getSelectAdminApp').html("<tr><td colspan=4>Loading... Please wait</td></tr>");
                },
                success : function(data){
                    $('tbody#getSelectAdminApp').html(data);
                },
                error : function(jqXHR,ajaxOption,errorThrown){
                    alert(jqXHR.responseText);
                }
            });            
        }
    });
    $('#btnKeywordAdminApp').click(function(){
        $.ajax({
            url         : "<?php echo base_url().'administrator.php/app_users/getSelectViewAdminApp' ?>",
            type        : "POST",
            data        : {sLike:$('#keywordAdminApp').val()},
            beforeSend  : function(){
                $('tbody#getSelectAdminApp').html("<tr><td colspan=4>Loading... Please wait</td></tr>");
            },
            success : function(data){
                $('tbody#getSelectAdminApp').html(data);
            },
            error : function(jqXHR,ajaxOption,errorThrown){
                alert(jqXHR.responseText);
            }
        });            
    });
    
});

function pilihAdminApp(a){
    $.ajax({
        url         : "<?php echo base_url().'administrator.php/app_users/pilihAdminApp' ?>",
        type        : "POST",
        data        : {NRP:a},
        dataType    : "JSON",
        success     : function(data){
            alert(data.message);    
            if(data.code==200){
                getTableAdminApp();
            }
        },
        error       : function(jqXHR,ajaxOption,errorThrown){
            console.log(jqXHR.responseText);                    
            alert(jqXHR.responseText);
        }
    });
}
// Function
function getTableAdminApp(){
    $.ajax({
        url         : "<?php echo base_url().'administrator.php/app_users/getSelectViewAdminApp' ?>",
        type        : "POST",
        data        : {sLike:""},
        beforeSend  : function(){
            $('tbody#getSelectAdminApp').html("<tr><td colspan=7>Loading... Please wait</td></tr>");
        },
        success : function(data){
            $('tbody#getSelectAdminApp').html(data);
        },
        error : function(jqXHR,ajaxOption,errorThrown){
            alert(jqXHR.responseText);
        }
    });            
}

   
</script>
</body>
</html>