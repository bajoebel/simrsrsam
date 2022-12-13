<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo getAppName() ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
    <link rel="shortcut icon" href="<?php echo base_url().'favicon.png' ?>">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/skin-blue.css"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="<?php echo base_url() ?>assets/bower_components/fonts.googleapis/fonts.css" type="text/css" rel="stylesheet" >
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php echo $header; ?>
    
    <aside class="main-sidebar">
        <?php echo $nav_sidebar; ?>
    </aside>
    
    <div class="content-wrapper">
        <?php echo $content ?>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs"><?php echo getVersion() ?></div>
        <?php echo getFooter() ?>
    </footer>

    <div class="control-sidebar-bg"></div>
</div>

<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    getdate();
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