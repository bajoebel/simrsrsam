
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Display Pemanggilan Antrean Poliklinik</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ."assets/" ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ."assets/" ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ."assets/" ?>dist/css/skins/_all-skins.min.css">
  <style type="text/css">
    .kotak{
        padding:10px;
        width:100%;
        border:1px #ccc solid;
        border-collapse:collapse;
        
    }
    .text-center{
        text-align:center;
    }
    .font60{
        font-size : 220pt;
    }
    .font10{
        font-size:10pt;
    }
    .font11{
        font-size:11pt;
    }
    .font12{
        font-size:12pt;
    }
    .font13{
        font-size:13pt;
    }

    .font14{
        font-size:14pt;
    }
    .font20{
        font-size:20pt;
    }
    .top10{
        margin-top:10px;
    }
    .top20{
        margin-top:20px;
    }
    .panel{
        border-radius:0px;
    }
    .panel-success{
        border-color:#00a65a;
    }
    .panel-success .panel-heading {
        background-color: #00a65a;
        color: #fff;
    }
    .center {
      margin: 0 20px 20px 0;
      position: absolute;
      top: 50%;
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
      width: 100%;
      /* border: 1px solid #ccc; */
      padding: 10px;
    }
  </style>
</head>
<body class="hold-transition skin-green layout-top-nav" id="body-content" >
 
<div class="wrapper" >
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="row">
        <div class="col-md-2">
          <a href="" class="logo" style="background-color: #00a65a;float: left;">
            <span class="logo-mini"><b>A</b>LT</span>
            <span class="logo-lg"><img src="<?php echo base_url() ."assets/images/stiker.png" ?>" style="height:50px;" ></span>
          </a>
        </div>
        <div class="col-md-8">
          <!--marquee--><h3 style="color: #fff;text-align: center;">Sistem Informasi Pemanggilan Antrean Poliklinik</h3><!--/marquee-->
        </div>
        <div class="col-md-2 shadow">
            &nbsp;
        </div>
      </div>
    </nav>

  </header>
  
  <div class="content-wrapper" style="background-color: #fff;">
    <div class="row"><div class="col-sm-12">&nbsp;</div></div>
    <?php echo $content ?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="row">
      <div class="col-sm-12" style="text-align:center">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; <?= date('Y') ?> <a href="rsud.padangpanjang.go.id">RSUD Kota Padang Panjang</a>.</strong> All rights
        reserved. TEAM SIMRS RSUD Kota Padang Panjang
      </div>
        
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ."assets/" ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ."assets/" ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ."assets/" ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<!--script src="<?php //echo base_url() ."assets/" ?>bower_components/fastclick/lib/fastclick.js"></script-->
<!-- AdminLTE App -->
<script src="<?php echo base_url() ."assets/" ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ."assets/" ?>dist/js/demo.js"></script>
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
