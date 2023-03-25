<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo getAppName() ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="<?php echo base_url().'favicon.png' ?>">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/fonts.googleapis/fonts.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/square/blue.css">
    <!--[if lt IE 9]>
    <script src="<?php echo base_url() ?>assets/js/html5shiv.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/respond.min.js"></script>
    <![endif]-->
    <link href="<?php echo base_url() ?>assets/bower_components/fonts.googleapis/fonts.css" type="text/css" rel="stylesheet" >
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-box-body">
        <div class="login-logo">
            <img src="<?php echo LOGO ?>" alt="" width="70px">
            <br/>
            <span style="font-size: 16px;font-weight: bolder"><?php echo COMPANY_NAME ?></span>
            <br/>
            <a href="#"><?php echo getAppLgName() ?></a>
        </div>
        <p class="login-box-msg">Aplikasi ini menggunakan cookies. Pastikan cookies browser anda dalam keadaan aktif. Setiap Cookies browser anda berubah, anda harus login ulang.</p>

        <form id="form1" method="post" onSubmit="return false">
            <div id="statusimport"></div>
            <div class="form-group has-feedback">
                <input name="userID" type="text" class="form-control" placeholder="Enter User ID"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="password" type="password" class="form-control" placeholder="Enter password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            
            <div class="row">
                <div class="col-xs-6">
                    <button type="button" onclick="toBeranda()" class="btn btn-success btn-block btn-flat">
                        <span class="fa fa-building"></span> Halaman Utama</button>
                </div>
                <div class="col-xs-6">    
                    <button type="button" onclick="toLogin()" id="btnLogin" class="btn btn-danger btn-block btn-flat">
                        <span class="fa fa-key" id="iconBtnLogin"></span> Sign In</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	importantrian();
});

function toBeranda(){
    window.location.href = '<?php echo base_url() ?>';
}
function toLogin(){
    $.ajax({
        type    : "POST",
        url     : "<?php echo base_url().'mr_registrasi.php/login/cek' ?>",
        data    : $('#form1').serialize(), 
        dataType: "JSON",
        success : function(data){
            if(data.error){
                location.href=data.message;
            }else{
                alert(data.message);                  
            }
        }
    });
}

function importantrian(){
    $.ajax({
        type    : "GET",
        url     : "<?php echo base_url().'mr_registrasi.php/login/importantrian' ?>",
        data    : {}, 
        dataType: "JSON",
        beforeSend: function() {
            // setting a timeout
            $('#btnLogin').prop("disabled",true);
            $('#iconBtnLogin').removeClass("fa fa-key")
            $('#iconBtnLogin').addClass("fa fa-spinner fa-spin")
            var pesan=`<div class="callout callout-success">Proses Pengambilan Antrian</div>`;
            $("#statusimport").html(pesan);
        },
        success : function(data){
            if(data.status==true){
                var pesan=`<div class="callout callout-success">`+data.message+`</div>`;
                $('#statusimport').html(pesan);
            }else{
                var pesan=`<div class="callout callout-danger">`+data.message+`</div>`;
                $('#statusimport').html(pesan);
            }
        },
        error: function(xhr) { // if error occured
            $('#btnLogin').prop("disabled",false);
            $('#iconBtnLogin').removeClass("fa fa-spinner fa-spin")
            $('#iconBtnLogin').addClass("fa fa-key")
        },
        complete: function() {
            $('#btnLogin').prop("disabled",false);
            $('#iconBtnLogin').removeClass("fa fa-spinner fa-spin")
            $('#iconBtnLogin').addClass("fa fa-key")
        },
    });
}
</script>
</body>
</html>
