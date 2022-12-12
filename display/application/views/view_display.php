
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Display Ketersediaan Kamar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ."assets/" ?>components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <!--link rel="stylesheet" href="<?php //echo base_url() ."assets/" ?>components/font-awesome/css/font-awesome.min.css"-->
  <!-- Ionicons -->
  <!--link rel="stylesheet" href="<?php //echo base_url() ."assets/" ?>components/Ionicons/css/ionicons.min.css"-->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ."assets/" ?>css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downl
       oading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ."assets/" ?>css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
    .font16{
      font-size: 16pt;
    }
    .font18{
      font-size: 18pt;
      font-weight: bold;
    }
    .font24{
      font-size: 24pt;
      font-weight: bold;
    }
    .font32{
      font-size: 48pt;
      font-weight: bold;
      color:#00a65a;
      text-shadow: 2px 2px #6de37f;
    }
    .box-header > .fa, .box-header > .glyphicon, .box-header > .ion, .box-header .box-title {
      display: inline-block;
      font-size: 24pt;
      margin: 0;
      line-height: 1;
    }
    .lingkaran {
      border: solid #00a65a;
      border-style: solid;
      border-collapse: collapse;
      padding: 5px;
      width: 140px;
      height: 140px;
      border-radius: 100%;
      box-shadow: 3px 3px #6de37f;
      text-align: center;

    }
    .lingkaran {
      border: solid #00a65a;
      border-style: solid;
      border-collapse: collapse;
      padding: 5px;
      width: 140px;
      height: 140px;
      border-radius: 100%;
      box-shadow: 3px 3px #6de37f;
      text-align: center;

    }
    .tersedia{
      font-size: 25pt;
      width: 100%;
    }
    .kosong{
      background: #00a65a;color: #fff;text-align: center; 
    }
    .terisi{
      background: #dd4b39;color: #fff;text-align: center; 
    }
    .total{
      float: right;text-align: center;width: 20%;background-color: #fff; color:#090909;border-radius: 45% ;font-weight: bold; 
    }
    .bulat{
      border-radius: 100px;
      float: right;
      background-color: #fff;
      color: #000;
      padding: 2px;
      width: 120px;
      text-align: center;
    }
    .split_bulat{
      border-radius: 100px;
      float: right;
      background-color: #fff;
      color: #000;
      padding: 2px;
      width: 30%;
      text-align: center;
    }
    .nama_ruang{
      font-size: 20pt;text-align: left;padding: 5px;border-bottom: 1px solid #ceedee;font-weight: bold;
    }
    .split_nama_ruang{
      font-size: 20pt;text-align: left;padding: 5px;border-bottom: 1px solid #ceedee;
    }
    .total_ruang{
      float: right;border-radius: 90;font-size: 20pt;padding: 5px;border-bottom: 1px solid #ceedee;text-align: center;
    }
    .kelas{
      font-size: 18pt;padding: 5px;border-bottom: 1px solid #00a65a;font-weight: bold;
    }
    .split_kelas{
      font-size: 14pt;padding: 5px;border-bottom: 1px solid #00a65a;font-weight: bold;
    }
    .jumlah{
      font-size: 18pt;padding: 5px;border-bottom: 1px solid #fff;font-weight: bold;
    }
    .split_jumlah{
      font-size: 14pt;padding: 5px;
    }
    .shadow{
      box-shadow: 5px #ceedef;
    }
    #display{
      padding: 0px 0px;
    }
    .col-5{
      width: 20%;
      float: left;
      padding: 5px;
    }
  </style>

  <!-- Google Font -->
  <!--link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav" id="body-content" >
 
<div class="wrapper" >
  <header class="main-header">

    

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      
      <!-- Logo -->
      <div class="row">
        <div class="col-md-2">
          <a href="" class="logo" style="background-color: #00a65a;float: left;">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img src="<?php echo base_url() ."assets/img/stiker.png" ?>" style="height:50px;" ></span>
          </a>
        </div>
        <div class="col-md-8">
          <!--marquee--><h3 style="color: #fff;text-align: center;">Sistem Informasi Ketersediaan Tempat Tidur RSUD Padang Panjang</h3><!--/marquee-->
        </div>
        <div class="col-md-2 shadow">
            &nbsp;
        </div>
      </div>
    </nav>

  </header>
  <!--header class="main-header">
    <a href="index2.html" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
      <nav class="navbar navbar-static-top">
        <marquee><h3 style="color: #fff;">Sistem Informasi Ketersediaan Tempat Tidur RSUD Padang Panjang</h3></marquee>
      </nav>
  </header-->
  <!-- Full Width Column -->
  <div class="content-wrapper" style="background-color: #fff;">
    <div class="row"><div class="col-sm-12">&nbsp;</div></div>
    <?php echo $content ?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="row">
      <div class="col-sm-12">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2019 <a href="rsud.padangpanjang.go.id">RSUD Kota Padang Panjang</a>.</strong> All rights
        reserved. TEAM SIMRS RSUD Kota Padang Panjang
      </div>
        
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ."assets/" ?>components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ."assets/" ?>components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ."assets/" ?>components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<!--script src="<?php //echo base_url() ."assets/" ?>components/fastclick/lib/fastclick.js"></script-->
<!-- AdminLTE App -->
<script src="<?php echo base_url() ."assets/" ?>js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ."assets/" ?>js/demo.js"></script>
<?php if($this->uri->segment(1)==""||$this->uri->segment(1)=="display") { ?>
<script type="text/javascript">
  var elem = document.getElementById("body-content"); 
  
  elem.onclick = function() {
        req = elem.requestFullScreen || elem.webkitRequestFullScreen || elem.mozRequestFullScreen;
        req.call(elem);
  }
  
  
  </script>


<?php } ?>
</body>
</html>
