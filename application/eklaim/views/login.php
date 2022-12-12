<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo getAppName() ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
</head>
<style type="text/css">   
</style>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-box-body">
        <div class="login-logo">
            <img src="<?php echo getLoginLogo() ?>" alt="" width="100px">
            <br/>
            <span style="font-size: 16px;font-weight: bolder"><?php echo getRS() ?></span>
            <br/>
            <a href="#"><?php echo getAppLgName() ?></a>
        </div>
        <p class="login-box-msg">Aplikasi ini menggunakan cookies. Pastikan cookies browser anda dalam keadaan aktif. Setiap Cookies browser anda berubah, anda harus login ulang.</p>

        <form id="form1" method="post" onSubmit="return false">
            <div class="form-group has-feedback">
                <input name="username" type="text" class="form-control" placeholder="Enter User ID"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="userPass" type="password" class="form-control" placeholder="Enter password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            
            <div class="row">
                <div class="col-xs-6"></div>
                <div class="col-xs-6">    
                    <button type="button" id="submit" class="btn btn-danger btn-block btn-flat">
                        <span class="fa fa-key"></span> Sign In</button>
                </div>
        <!-- /.col -->
            </div>
        </form>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript">
$(function () {
    $('#submit').click(function(){
        var url = "<?php echo base_url().'' ?>";
        $.ajax({
            type    : "POST",
            url     : "<?php echo base_url().'index.php/login/logincek' ?>",
            data    : $('#form1').serialize(), 
            dataType: "JSON",
            success : function(data){
                if(data.error){
                    alert(data.message);                  
                }else{
                    var url = '<?php echo base_url().'index.php/admin' ?>';
                    location.href=url;
                }
            }
        });
    });
});
</script>

</body>
</html>
